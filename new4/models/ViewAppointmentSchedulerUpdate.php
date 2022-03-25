<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewAppointmentSchedulerUpdate extends ViewAppointmentScheduler
{
    use MessagesTrait;

    // Page ID
    public $PageID = "update";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_appointment_scheduler';

    // Page object name
    public $PageObjName = "ViewAppointmentSchedulerUpdate";

    // Rendering View
    public $RenderingView = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName()
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl()
    {
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;
        global $UserTable;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (view_appointment_scheduler)
        if (!isset($GLOBALS["view_appointment_scheduler"]) || get_class($GLOBALS["view_appointment_scheduler"]) == PROJECT_NAMESPACE . "view_appointment_scheduler") {
            $GLOBALS["view_appointment_scheduler"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_appointment_scheduler');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("view_appointment_scheduler"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "ViewAppointmentSchedulerView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['id'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
    }

    // Lookup data
    public function lookup()
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = Post("field");
        $lookup = $this->Fields[$fieldName]->Lookup;

        // Get lookup parameters
        $lookupType = Post("ajax", "unknown");
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal")) {
            $searchValue = Post("sv", "");
            $pageSize = Post("recperpage", 10);
            $offset = Post("start", 0);
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = Param("q", "");
            $pageSize = Param("n", -1);
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
            $start = Param("start", -1);
            $start = is_numeric($start) ? (int)$start : -1;
            $page = Param("page", -1);
            $page = is_numeric($page) ? (int)$page : -1;
            $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        }
        $userSelect = Decrypt(Post("s", ""));
        $userFilter = Decrypt(Post("f", ""));
        $userOrderBy = Decrypt(Post("o", ""));
        $keys = Post("keys");
        $lookup->LookupType = $lookupType; // Lookup type
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = Post("v" . $i, "");
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        $lookup->toJson($this); // Use settings from current page
    }
    public $FormClassName = "ew-horizontal ew-form ew-update-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $RecKeys;
    public $Disabled;
    public $UpdateCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->Visible = false;
        $this->patientID->setVisibility();
        $this->patientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Purpose->setVisibility();
        $this->PatientType->setVisibility();
        $this->Referal->setVisibility();
        $this->start_date->setVisibility();
        $this->DoctorName->setVisibility();
        $this->HospID->setVisibility();
        $this->end_date->setVisibility();
        $this->DoctorID->setVisibility();
        $this->DoctorCode->setVisibility();
        $this->Department->setVisibility();
        $this->AppointmentStatus->setVisibility();
        $this->status->setVisibility();
        $this->scheduler_id->setVisibility();
        $this->text->setVisibility();
        $this->appointment_status->setVisibility();
        $this->PId->setVisibility();
        $this->SchEmail->setVisibility();
        $this->appointment_type->setVisibility();
        $this->Notified->setVisibility();
        $this->Notes->setVisibility();
        $this->paymentType->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->createdBy->setVisibility();
        $this->createdDateTime->setVisibility();
        $this->PatientTypee->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->patientID);
        $this->setupLookupOptions($this->Referal);
        $this->setupLookupOptions($this->DoctorName);
        $this->setupLookupOptions($this->WhereDidYouHear);
        $this->setupLookupOptions($this->PatientTypee);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-update-form ew-horizontal";

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Try to load keys from list form
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        if (Post("action") !== null && Post("action") !== "") {
            // Get action
            $this->CurrentAction = Post("action");
            $this->loadFormValues(); // Get form values

            // Validate form
            if (!$this->validateForm()) {
                $this->CurrentAction = "show"; // Form error, reset action
                if (!$this->hasInvalidFields()) { // No fields selected
                    $this->setFailureMessage($Language->phrase("NoFieldSelected"));
                }
            }
        } else {
            $this->loadMultiUpdateValues(); // Load initial values to form
        }
        if (count($this->RecKeys) <= 0) {
            $this->terminate("ViewAppointmentSchedulerList"); // No records selected, return to list
            return;
        }
        if ($this->isUpdate()) {
                if ($this->updateRows()) { // Update Records based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
                    }
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
                } else {
                    $this->restoreFormValues(); // Restore form values
                }
        }

        // Render row
        $this->RowType = ROWTYPE_EDIT; // Render edit
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Load initial values to form if field values are identical in all selected records
    protected function loadMultiUpdateValues()
    {
        $this->CurrentFilter = $this->getFilterFromRecordKeys();

        // Load recordset
        if ($rs = $this->loadRecordset()) {
            $i = 1;
            while (!$rs->EOF) {
                if ($i == 1) {
                    $this->patientID->setDbValue($rs->fields['patientID']);
                    $this->patientName->setDbValue($rs->fields['patientName']);
                    $this->MobileNumber->setDbValue($rs->fields['MobileNumber']);
                    $this->Purpose->setDbValue($rs->fields['Purpose']);
                    $this->PatientType->setDbValue($rs->fields['PatientType']);
                    $this->Referal->setDbValue($rs->fields['Referal']);
                    $this->start_date->setDbValue($rs->fields['start_date']);
                    $this->DoctorName->setDbValue($rs->fields['DoctorName']);
                    $this->HospID->setDbValue($rs->fields['HospID']);
                    $this->end_date->setDbValue($rs->fields['end_date']);
                    $this->DoctorID->setDbValue($rs->fields['DoctorID']);
                    $this->DoctorCode->setDbValue($rs->fields['DoctorCode']);
                    $this->Department->setDbValue($rs->fields['Department']);
                    $this->AppointmentStatus->setDbValue($rs->fields['AppointmentStatus']);
                    $this->status->setDbValue($rs->fields['status']);
                    $this->scheduler_id->setDbValue($rs->fields['scheduler_id']);
                    $this->text->setDbValue($rs->fields['text']);
                    $this->appointment_status->setDbValue($rs->fields['appointment_status']);
                    $this->PId->setDbValue($rs->fields['PId']);
                    $this->SchEmail->setDbValue($rs->fields['SchEmail']);
                    $this->appointment_type->setDbValue($rs->fields['appointment_type']);
                    $this->Notified->setDbValue($rs->fields['Notified']);
                    $this->Notes->setDbValue($rs->fields['Notes']);
                    $this->paymentType->setDbValue($rs->fields['paymentType']);
                    $this->WhereDidYouHear->setDbValue($rs->fields['WhereDidYouHear']);
                    $this->createdBy->setDbValue($rs->fields['createdBy']);
                    $this->createdDateTime->setDbValue($rs->fields['createdDateTime']);
                    $this->PatientTypee->setDbValue($rs->fields['PatientTypee']);
                } else {
                    if (!CompareValue($this->patientID->DbValue, $rs->fields['patientID'])) {
                        $this->patientID->CurrentValue = null;
                    }
                    if (!CompareValue($this->patientName->DbValue, $rs->fields['patientName'])) {
                        $this->patientName->CurrentValue = null;
                    }
                    if (!CompareValue($this->MobileNumber->DbValue, $rs->fields['MobileNumber'])) {
                        $this->MobileNumber->CurrentValue = null;
                    }
                    if (!CompareValue($this->Purpose->DbValue, $rs->fields['Purpose'])) {
                        $this->Purpose->CurrentValue = null;
                    }
                    if (!CompareValue($this->PatientType->DbValue, $rs->fields['PatientType'])) {
                        $this->PatientType->CurrentValue = null;
                    }
                    if (!CompareValue($this->Referal->DbValue, $rs->fields['Referal'])) {
                        $this->Referal->CurrentValue = null;
                    }
                    if (!CompareValue($this->start_date->DbValue, $rs->fields['start_date'])) {
                        $this->start_date->CurrentValue = null;
                    }
                    if (!CompareValue($this->DoctorName->DbValue, $rs->fields['DoctorName'])) {
                        $this->DoctorName->CurrentValue = null;
                    }
                    if (!CompareValue($this->HospID->DbValue, $rs->fields['HospID'])) {
                        $this->HospID->CurrentValue = null;
                    }
                    if (!CompareValue($this->end_date->DbValue, $rs->fields['end_date'])) {
                        $this->end_date->CurrentValue = null;
                    }
                    if (!CompareValue($this->DoctorID->DbValue, $rs->fields['DoctorID'])) {
                        $this->DoctorID->CurrentValue = null;
                    }
                    if (!CompareValue($this->DoctorCode->DbValue, $rs->fields['DoctorCode'])) {
                        $this->DoctorCode->CurrentValue = null;
                    }
                    if (!CompareValue($this->Department->DbValue, $rs->fields['Department'])) {
                        $this->Department->CurrentValue = null;
                    }
                    if (!CompareValue($this->AppointmentStatus->DbValue, $rs->fields['AppointmentStatus'])) {
                        $this->AppointmentStatus->CurrentValue = null;
                    }
                    if (!CompareValue($this->status->DbValue, $rs->fields['status'])) {
                        $this->status->CurrentValue = null;
                    }
                    if (!CompareValue($this->scheduler_id->DbValue, $rs->fields['scheduler_id'])) {
                        $this->scheduler_id->CurrentValue = null;
                    }
                    if (!CompareValue($this->text->DbValue, $rs->fields['text'])) {
                        $this->text->CurrentValue = null;
                    }
                    if (!CompareValue($this->appointment_status->DbValue, $rs->fields['appointment_status'])) {
                        $this->appointment_status->CurrentValue = null;
                    }
                    if (!CompareValue($this->PId->DbValue, $rs->fields['PId'])) {
                        $this->PId->CurrentValue = null;
                    }
                    if (!CompareValue($this->SchEmail->DbValue, $rs->fields['SchEmail'])) {
                        $this->SchEmail->CurrentValue = null;
                    }
                    if (!CompareValue($this->appointment_type->DbValue, $rs->fields['appointment_type'])) {
                        $this->appointment_type->CurrentValue = null;
                    }
                    if (!CompareValue($this->Notified->DbValue, $rs->fields['Notified'])) {
                        $this->Notified->CurrentValue = null;
                    }
                    if (!CompareValue($this->Notes->DbValue, $rs->fields['Notes'])) {
                        $this->Notes->CurrentValue = null;
                    }
                    if (!CompareValue($this->paymentType->DbValue, $rs->fields['paymentType'])) {
                        $this->paymentType->CurrentValue = null;
                    }
                    if (!CompareValue($this->WhereDidYouHear->DbValue, $rs->fields['WhereDidYouHear'])) {
                        $this->WhereDidYouHear->CurrentValue = null;
                    }
                    if (!CompareValue($this->createdBy->DbValue, $rs->fields['createdBy'])) {
                        $this->createdBy->CurrentValue = null;
                    }
                    if (!CompareValue($this->createdDateTime->DbValue, $rs->fields['createdDateTime'])) {
                        $this->createdDateTime->CurrentValue = null;
                    }
                    if (!CompareValue($this->PatientTypee->DbValue, $rs->fields['PatientTypee'])) {
                        $this->PatientTypee->CurrentValue = null;
                    }
                }
                $i++;
                $rs->moveNext();
            }
            $rs->close();
        }
    }

    // Set up key value
    protected function setupKeyValues($key)
    {
        $keyFld = $key;
        if (!is_numeric($keyFld)) {
            return false;
        }
        $this->id->OldValue = $keyFld;
        return true;
    }

    // Update all selected rows
    protected function updateRows()
    {
        global $Language;
        $conn = $this->getConnection();
        $conn->beginTransaction();

        // Get old records
        $this->CurrentFilter = $this->getFilterFromRecordKeys(false);
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAll($sql);

        // Update all rows
        $key = "";
        foreach ($this->RecKeys as $reckey) {
            if ($this->setupKeyValues($reckey)) {
                $thisKey = $reckey;
                $this->SendEmail = false; // Do not send email on update success
                $this->UpdateCount += 1; // Update record count for records being updated
                $updateRows = $this->editRow(); // Update this row
            } else {
                $updateRows = false;
            }
            if (!$updateRows) {
                break; // Update failed
            }
            if ($key != "") {
                $key .= ", ";
            }
            $key .= $thisKey;
        }

        // Check if all rows updated
        if ($updateRows) {
            $conn->commit(); // Commit transaction

            // Get new records
            $rsnew = $conn->fetchAll($sql);
        } else {
            $conn->rollback(); // Rollback transaction
        }
        return $updateRows;
    }

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'patientID' first before field var 'x_patientID'
        $val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
        if (!$this->patientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientID->Visible = false; // Disable update for API request
            } else {
                $this->patientID->setFormValue($val);
            }
        }
        $this->patientID->MultiUpdate = $CurrentForm->getValue("u_patientID");

        // Check field name 'patientName' first before field var 'x_patientName'
        $val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
        if (!$this->patientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientName->Visible = false; // Disable update for API request
            } else {
                $this->patientName->setFormValue($val);
            }
        }
        $this->patientName->MultiUpdate = $CurrentForm->getValue("u_patientName");

        // Check field name 'MobileNumber' first before field var 'x_MobileNumber'
        $val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
        if (!$this->MobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->MobileNumber->setFormValue($val);
            }
        }
        $this->MobileNumber->MultiUpdate = $CurrentForm->getValue("u_MobileNumber");

        // Check field name 'Purpose' first before field var 'x_Purpose'
        $val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
        if (!$this->Purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Purpose->Visible = false; // Disable update for API request
            } else {
                $this->Purpose->setFormValue($val);
            }
        }
        $this->Purpose->MultiUpdate = $CurrentForm->getValue("u_Purpose");

        // Check field name 'PatientType' first before field var 'x_PatientType'
        $val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
        if (!$this->PatientType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientType->Visible = false; // Disable update for API request
            } else {
                $this->PatientType->setFormValue($val);
            }
        }
        $this->PatientType->MultiUpdate = $CurrentForm->getValue("u_PatientType");

        // Check field name 'Referal' first before field var 'x_Referal'
        $val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
        if (!$this->Referal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Referal->Visible = false; // Disable update for API request
            } else {
                $this->Referal->setFormValue($val);
            }
        }
        $this->Referal->MultiUpdate = $CurrentForm->getValue("u_Referal");

        // Check field name 'start_date' first before field var 'x_start_date'
        $val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
        if (!$this->start_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_date->Visible = false; // Disable update for API request
            } else {
                $this->start_date->setFormValue($val);
            }
            $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
        }
        $this->start_date->MultiUpdate = $CurrentForm->getValue("u_start_date");

        // Check field name 'DoctorName' first before field var 'x_DoctorName'
        $val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
        if (!$this->DoctorName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorName->Visible = false; // Disable update for API request
            } else {
                $this->DoctorName->setFormValue($val);
            }
        }
        $this->DoctorName->MultiUpdate = $CurrentForm->getValue("u_DoctorName");

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }
        $this->HospID->MultiUpdate = $CurrentForm->getValue("u_HospID");

        // Check field name 'end_date' first before field var 'x_end_date'
        $val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
        if (!$this->end_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_date->Visible = false; // Disable update for API request
            } else {
                $this->end_date->setFormValue($val);
            }
            $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
        }
        $this->end_date->MultiUpdate = $CurrentForm->getValue("u_end_date");

        // Check field name 'DoctorID' first before field var 'x_DoctorID'
        $val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
        if (!$this->DoctorID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorID->Visible = false; // Disable update for API request
            } else {
                $this->DoctorID->setFormValue($val);
            }
        }
        $this->DoctorID->MultiUpdate = $CurrentForm->getValue("u_DoctorID");

        // Check field name 'DoctorCode' first before field var 'x_DoctorCode'
        $val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
        if (!$this->DoctorCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorCode->Visible = false; // Disable update for API request
            } else {
                $this->DoctorCode->setFormValue($val);
            }
        }
        $this->DoctorCode->MultiUpdate = $CurrentForm->getValue("u_DoctorCode");

        // Check field name 'Department' first before field var 'x_Department'
        $val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
        if (!$this->Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Department->Visible = false; // Disable update for API request
            } else {
                $this->Department->setFormValue($val);
            }
        }
        $this->Department->MultiUpdate = $CurrentForm->getValue("u_Department");

        // Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
        $val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
        if (!$this->AppointmentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AppointmentStatus->Visible = false; // Disable update for API request
            } else {
                $this->AppointmentStatus->setFormValue($val);
            }
        }
        $this->AppointmentStatus->MultiUpdate = $CurrentForm->getValue("u_AppointmentStatus");

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }
        $this->status->MultiUpdate = $CurrentForm->getValue("u_status");

        // Check field name 'scheduler_id' first before field var 'x_scheduler_id'
        $val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
        if (!$this->scheduler_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scheduler_id->Visible = false; // Disable update for API request
            } else {
                $this->scheduler_id->setFormValue($val);
            }
        }
        $this->scheduler_id->MultiUpdate = $CurrentForm->getValue("u_scheduler_id");

        // Check field name 'text' first before field var 'x_text'
        $val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
        if (!$this->text->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->text->Visible = false; // Disable update for API request
            } else {
                $this->text->setFormValue($val);
            }
        }
        $this->text->MultiUpdate = $CurrentForm->getValue("u_text");

        // Check field name 'appointment_status' first before field var 'x_appointment_status'
        $val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
        if (!$this->appointment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_status->Visible = false; // Disable update for API request
            } else {
                $this->appointment_status->setFormValue($val);
            }
        }
        $this->appointment_status->MultiUpdate = $CurrentForm->getValue("u_appointment_status");

        // Check field name 'PId' first before field var 'x_PId'
        $val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
        if (!$this->PId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PId->Visible = false; // Disable update for API request
            } else {
                $this->PId->setFormValue($val);
            }
        }
        $this->PId->MultiUpdate = $CurrentForm->getValue("u_PId");

        // Check field name 'SchEmail' first before field var 'x_SchEmail'
        $val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
        if (!$this->SchEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SchEmail->Visible = false; // Disable update for API request
            } else {
                $this->SchEmail->setFormValue($val);
            }
        }
        $this->SchEmail->MultiUpdate = $CurrentForm->getValue("u_SchEmail");

        // Check field name 'appointment_type' first before field var 'x_appointment_type'
        $val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
        if (!$this->appointment_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_type->Visible = false; // Disable update for API request
            } else {
                $this->appointment_type->setFormValue($val);
            }
        }
        $this->appointment_type->MultiUpdate = $CurrentForm->getValue("u_appointment_type");

        // Check field name 'Notified' first before field var 'x_Notified'
        $val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
        if (!$this->Notified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notified->Visible = false; // Disable update for API request
            } else {
                $this->Notified->setFormValue($val);
            }
        }
        $this->Notified->MultiUpdate = $CurrentForm->getValue("u_Notified");

        // Check field name 'Notes' first before field var 'x_Notes'
        $val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
        if (!$this->Notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notes->Visible = false; // Disable update for API request
            } else {
                $this->Notes->setFormValue($val);
            }
        }
        $this->Notes->MultiUpdate = $CurrentForm->getValue("u_Notes");

        // Check field name 'paymentType' first before field var 'x_paymentType'
        $val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
        if (!$this->paymentType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->paymentType->Visible = false; // Disable update for API request
            } else {
                $this->paymentType->setFormValue($val);
            }
        }
        $this->paymentType->MultiUpdate = $CurrentForm->getValue("u_paymentType");

        // Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
        $val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
        if (!$this->WhereDidYouHear->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhereDidYouHear->Visible = false; // Disable update for API request
            } else {
                $this->WhereDidYouHear->setFormValue($val);
            }
        }
        $this->WhereDidYouHear->MultiUpdate = $CurrentForm->getValue("u_WhereDidYouHear");

        // Check field name 'createdBy' first before field var 'x_createdBy'
        $val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
        if (!$this->createdBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdBy->Visible = false; // Disable update for API request
            } else {
                $this->createdBy->setFormValue($val);
            }
        }
        $this->createdBy->MultiUpdate = $CurrentForm->getValue("u_createdBy");

        // Check field name 'createdDateTime' first before field var 'x_createdDateTime'
        $val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
        if (!$this->createdDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdDateTime->Visible = false; // Disable update for API request
            } else {
                $this->createdDateTime->setFormValue($val);
            }
            $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        }
        $this->createdDateTime->MultiUpdate = $CurrentForm->getValue("u_createdDateTime");

        // Check field name 'PatientTypee' first before field var 'x_PatientTypee'
        $val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
        if (!$this->PatientTypee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientTypee->Visible = false; // Disable update for API request
            } else {
                $this->PatientTypee->setFormValue($val);
            }
        }
        $this->PatientTypee->MultiUpdate = $CurrentForm->getValue("u_PatientTypee");

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->patientID->CurrentValue = $this->patientID->FormValue;
        $this->patientName->CurrentValue = $this->patientName->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->Purpose->CurrentValue = $this->Purpose->FormValue;
        $this->PatientType->CurrentValue = $this->PatientType->FormValue;
        $this->Referal->CurrentValue = $this->Referal->FormValue;
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
        $this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->end_date->CurrentValue = $this->end_date->FormValue;
        $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
        $this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
        $this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
        $this->text->CurrentValue = $this->text->FormValue;
        $this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
        $this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
        $this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
        $this->Notified->CurrentValue = $this->Notified->FormValue;
        $this->Notes->CurrentValue = $this->Notes->FormValue;
        $this->paymentType->CurrentValue = $this->paymentType->FormValue;
        $this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
        $this->createdBy->CurrentValue = $this->createdBy->FormValue;
        $this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
        $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        $this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
    }

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->patientID->setDbValue($row['patientID']);
        $this->patientName->setDbValue($row['patientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->PatientType->setDbValue($row['PatientType']);
        $this->Referal->setDbValue($row['Referal']);
        if (array_key_exists('EV__Referal', $row)) {
            $this->Referal->VirtualValue = $row['EV__Referal']; // Set up virtual field value
        } else {
            $this->Referal->VirtualValue = ""; // Clear value
        }
        $this->start_date->setDbValue($row['start_date']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->end_date->setDbValue($row['end_date']);
        $this->DoctorID->setDbValue($row['DoctorID']);
        $this->DoctorCode->setDbValue($row['DoctorCode']);
        $this->Department->setDbValue($row['Department']);
        $this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
        $this->status->setDbValue($row['status']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->text->setDbValue($row['text']);
        $this->appointment_status->setDbValue($row['appointment_status']);
        $this->PId->setDbValue($row['PId']);
        $this->SchEmail->setDbValue($row['SchEmail']);
        $this->appointment_type->setDbValue($row['appointment_type']);
        $this->Notified->setDbValue($row['Notified']);
        $this->Notes->setDbValue($row['Notes']);
        $this->paymentType->setDbValue($row['paymentType']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->createdBy->setDbValue($row['createdBy']);
        $this->createdDateTime->setDbValue($row['createdDateTime']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['patientID'] = null;
        $row['patientName'] = null;
        $row['MobileNumber'] = null;
        $row['Purpose'] = null;
        $row['PatientType'] = null;
        $row['Referal'] = null;
        $row['start_date'] = null;
        $row['DoctorName'] = null;
        $row['HospID'] = null;
        $row['end_date'] = null;
        $row['DoctorID'] = null;
        $row['DoctorCode'] = null;
        $row['Department'] = null;
        $row['AppointmentStatus'] = null;
        $row['status'] = null;
        $row['scheduler_id'] = null;
        $row['text'] = null;
        $row['appointment_status'] = null;
        $row['PId'] = null;
        $row['SchEmail'] = null;
        $row['appointment_type'] = null;
        $row['Notified'] = null;
        $row['Notes'] = null;
        $row['paymentType'] = null;
        $row['WhereDidYouHear'] = null;
        $row['createdBy'] = null;
        $row['createdDateTime'] = null;
        $row['PatientTypee'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // patientID

        // patientName

        // MobileNumber

        // Purpose

        // PatientType

        // Referal

        // start_date

        // DoctorName

        // HospID

        // end_date

        // DoctorID

        // DoctorCode

        // Department

        // AppointmentStatus

        // status

        // scheduler_id

        // text

        // appointment_status

        // PId

        // SchEmail

        // appointment_type

        // Notified

        // Notes

        // paymentType

        // WhereDidYouHear

        // createdBy

        // createdDateTime

        // PatientTypee
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // patientID
            $curVal = trim(strval($this->patientID->CurrentValue));
            if ($curVal != "") {
                $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
                if ($this->patientID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->patientID->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                        $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                    } else {
                        $this->patientID->ViewValue = $this->patientID->CurrentValue;
                    }
                }
            } else {
                $this->patientID->ViewValue = null;
            }
            $this->patientID->ViewCustomAttributes = "";

            // patientName
            $this->patientName->ViewValue = $this->patientName->CurrentValue;
            $this->patientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // PatientType
            if (strval($this->PatientType->CurrentValue) != "") {
                $this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
            } else {
                $this->PatientType->ViewValue = null;
            }
            $this->PatientType->ViewCustomAttributes = "";

            // Referal
            if ($this->Referal->VirtualValue != "") {
                $this->Referal->ViewValue = $this->Referal->VirtualValue;
            } else {
                $curVal = trim(strval($this->Referal->CurrentValue));
                if ($curVal != "") {
                    $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
                    if ($this->Referal->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->Referal->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                            $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                        } else {
                            $this->Referal->ViewValue = $this->Referal->CurrentValue;
                        }
                    }
                } else {
                    $this->Referal->ViewValue = null;
                }
            }
            $this->Referal->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
            $this->start_date->ViewCustomAttributes = "";

            // DoctorName
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
                if ($this->DoctorName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DoctorName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                        $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                    } else {
                        $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
                    }
                }
            } else {
                $this->DoctorName->ViewValue = null;
            }
            $this->DoctorName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
            $this->end_date->ViewCustomAttributes = "";

            // DoctorID
            $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
            $this->DoctorID->ViewCustomAttributes = "";

            // DoctorCode
            $this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
            $this->DoctorCode->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // AppointmentStatus
            $this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
            $this->AppointmentStatus->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->status->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // scheduler_id
            $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->ViewValue = $this->text->CurrentValue;
            $this->text->ViewCustomAttributes = "";

            // appointment_status
            $this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
            $this->appointment_status->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // SchEmail
            $this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
            $this->SchEmail->ViewCustomAttributes = "";

            // appointment_type
            if (strval($this->appointment_type->CurrentValue) != "") {
                $this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
            } else {
                $this->appointment_type->ViewValue = null;
            }
            $this->appointment_type->ViewCustomAttributes = "";

            // Notified
            if (strval($this->Notified->CurrentValue) != "") {
                $this->Notified->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Notified->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Notified->ViewValue = null;
            }
            $this->Notified->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // paymentType
            $this->paymentType->ViewValue = $this->paymentType->CurrentValue;
            $this->paymentType->ViewCustomAttributes = "";

            // WhereDidYouHear
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
                if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->WhereDidYouHear->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                            $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                        }
                    } else {
                        $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                    }
                }
            } else {
                $this->WhereDidYouHear->ViewValue = null;
            }
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // createdBy
            $this->createdBy->ViewValue = $this->createdBy->CurrentValue;
            $this->createdBy->ViewCustomAttributes = "";

            // createdDateTime
            $this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
            $this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
            $this->createdDateTime->ViewCustomAttributes = "";

            // PatientTypee
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
                if ($this->PatientTypee->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PatientTypee->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientTypee->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
                    } else {
                        $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
                    }
                }
            } else {
                $this->PatientTypee->ViewValue = null;
            }
            $this->PatientTypee->ViewCustomAttributes = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";
            $this->patientID->TooltipValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";
            $this->patientName->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";
            $this->PatientType->TooltipValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";
            $this->Referal->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";
            $this->DoctorName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";
            $this->end_date->TooltipValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";
            $this->DoctorID->TooltipValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";
            $this->DoctorCode->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";
            $this->AppointmentStatus->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";
            $this->text->TooltipValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";
            $this->appointment_status->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";
            $this->SchEmail->TooltipValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";
            $this->appointment_type->TooltipValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";
            $this->Notified->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";
            $this->paymentType->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
            $this->PatientTypee->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // patientID
            $this->patientID->EditCustomAttributes = "";
            $curVal = trim(strval($this->patientID->CurrentValue));
            if ($curVal != "") {
                $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
            } else {
                $this->patientID->ViewValue = $this->patientID->Lookup !== null && is_array($this->patientID->Lookup->Options) ? $curVal : null;
            }
            if ($this->patientID->ViewValue !== null) { // Load from cache
                $this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
                if ($this->patientID->ViewValue == "") {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->patientID->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                    $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                } else {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->patientID->EditValue = $arwrk;
            }
            $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

            // patientName
            $this->patientName->EditAttrs["class"] = "form-control";
            $this->patientName->EditCustomAttributes = "";
            if (!$this->patientName->Raw) {
                $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
            }
            $this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
            $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // PatientType
            $this->PatientType->EditCustomAttributes = "";
            $this->PatientType->EditValue = $this->PatientType->options(false);
            $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

            // Referal
            $this->Referal->EditCustomAttributes = "";
            $curVal = trim(strval($this->Referal->CurrentValue));
            if ($curVal != "") {
                $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
            } else {
                $this->Referal->ViewValue = $this->Referal->Lookup !== null && is_array($this->Referal->Lookup->Options) ? $curVal : null;
            }
            if ($this->Referal->ViewValue !== null) { // Load from cache
                $this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
                if ($this->Referal->ViewValue == "") {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Referal->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                    $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                } else {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Referal->EditValue = $arwrk;
            }
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // DoctorName
            $this->DoctorName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            } else {
                $this->DoctorName->ViewValue = $this->DoctorName->Lookup !== null && is_array($this->DoctorName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DoctorName->ViewValue !== null) { // Load from cache
                $this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
                if ($this->DoctorName->ViewValue == "") {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DoctorName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                    $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                } else {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DoctorName->EditValue = $arwrk;
            }
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // HospID

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // DoctorID
            $this->DoctorID->EditAttrs["class"] = "form-control";
            $this->DoctorID->EditCustomAttributes = "";
            $this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
            $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

            // DoctorCode
            $this->DoctorCode->EditAttrs["class"] = "form-control";
            $this->DoctorCode->EditCustomAttributes = "";
            if (!$this->DoctorCode->Raw) {
                $this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
            }
            $this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
            $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // AppointmentStatus
            $this->AppointmentStatus->EditAttrs["class"] = "form-control";
            $this->AppointmentStatus->EditCustomAttributes = "";
            if (!$this->AppointmentStatus->Raw) {
                $this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
            }
            $this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
            $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            $this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->EditAttrs["class"] = "form-control";
            $this->text->EditCustomAttributes = "";
            if (!$this->text->Raw) {
                $this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
            }
            $this->text->EditValue = HtmlEncode($this->text->CurrentValue);
            $this->text->PlaceHolder = RemoveHtml($this->text->caption());

            // appointment_status
            $this->appointment_status->EditAttrs["class"] = "form-control";
            $this->appointment_status->EditCustomAttributes = "";
            if (!$this->appointment_status->Raw) {
                $this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
            }
            $this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
            $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // SchEmail
            $this->SchEmail->EditAttrs["class"] = "form-control";
            $this->SchEmail->EditCustomAttributes = "";
            if (!$this->SchEmail->Raw) {
                $this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
            }
            $this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
            $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

            // appointment_type
            $this->appointment_type->EditCustomAttributes = "";
            $this->appointment_type->EditValue = $this->appointment_type->options(false);
            $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

            // Notified
            $this->Notified->EditCustomAttributes = "";
            $this->Notified->EditValue = $this->Notified->options(false);
            $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // paymentType
            $this->paymentType->EditAttrs["class"] = "form-control";
            $this->paymentType->EditCustomAttributes = "";
            if (!$this->paymentType->Raw) {
                $this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
            }
            $this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
            $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditCustomAttributes = "";
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            } else {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== null && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : null;
            }
            if ($this->WhereDidYouHear->ViewValue !== null) { // Load from cache
                $this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->WhereDidYouHear->EditValue = $arwrk;
            }
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // createdBy

            // createdDateTime

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
            } else {
                $this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== null && is_array($this->PatientTypee->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientTypee->ViewValue !== null) { // Load from cache
                $this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PatientTypee->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PatientTypee->EditValue = $arwrk;
            }
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

            // Edit refer script

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;
        $updateCnt = 0;
        if ($this->patientID->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->patientName->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->MobileNumber->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Purpose->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->PatientType->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Referal->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->start_date->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->DoctorName->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->HospID->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->end_date->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->DoctorID->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->DoctorCode->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Department->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->AppointmentStatus->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->status->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->scheduler_id->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->text->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->appointment_status->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->PId->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->SchEmail->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->appointment_type->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Notified->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Notes->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->paymentType->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->WhereDidYouHear->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->createdBy->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->createdDateTime->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->PatientTypee->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($updateCnt == 0) {
            return false;
        }

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->patientID->Required) {
            if ($this->patientID->MultiUpdate != "" && !$this->patientID->IsDetailKey && EmptyValue($this->patientID->FormValue)) {
                $this->patientID->addErrorMessage(str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
            }
        }
        if ($this->patientName->Required) {
            if ($this->patientName->MultiUpdate != "" && !$this->patientName->IsDetailKey && EmptyValue($this->patientName->FormValue)) {
                $this->patientName->addErrorMessage(str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if ($this->MobileNumber->MultiUpdate != "" && !$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->Purpose->Required) {
            if ($this->Purpose->MultiUpdate != "" && !$this->Purpose->IsDetailKey && EmptyValue($this->Purpose->FormValue)) {
                $this->Purpose->addErrorMessage(str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
            }
        }
        if ($this->PatientType->Required) {
            if ($this->PatientType->MultiUpdate != "" && $this->PatientType->FormValue == "") {
                $this->PatientType->addErrorMessage(str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
            }
        }
        if ($this->Referal->Required) {
            if ($this->Referal->MultiUpdate != "" && !$this->Referal->IsDetailKey && EmptyValue($this->Referal->FormValue)) {
                $this->Referal->addErrorMessage(str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
            }
        }
        if ($this->start_date->Required) {
            if ($this->start_date->MultiUpdate != "" && !$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
            }
        }
        if ($this->start_date->MultiUpdate != "") {
            if (!CheckEuroDate($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
            }
        }
        if ($this->DoctorName->Required) {
            if ($this->DoctorName->MultiUpdate != "" && !$this->DoctorName->IsDetailKey && EmptyValue($this->DoctorName->FormValue)) {
                $this->DoctorName->addErrorMessage(str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if ($this->HospID->MultiUpdate != "" && !$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->end_date->Required) {
            if ($this->end_date->MultiUpdate != "" && !$this->end_date->IsDetailKey && EmptyValue($this->end_date->FormValue)) {
                $this->end_date->addErrorMessage(str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
            }
        }
        if ($this->end_date->MultiUpdate != "") {
            if (!CheckEuroDate($this->end_date->FormValue)) {
                $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
            }
        }
        if ($this->DoctorID->Required) {
            if ($this->DoctorID->MultiUpdate != "" && !$this->DoctorID->IsDetailKey && EmptyValue($this->DoctorID->FormValue)) {
                $this->DoctorID->addErrorMessage(str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
            }
        }
        if ($this->DoctorCode->Required) {
            if ($this->DoctorCode->MultiUpdate != "" && !$this->DoctorCode->IsDetailKey && EmptyValue($this->DoctorCode->FormValue)) {
                $this->DoctorCode->addErrorMessage(str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
            }
        }
        if ($this->Department->Required) {
            if ($this->Department->MultiUpdate != "" && !$this->Department->IsDetailKey && EmptyValue($this->Department->FormValue)) {
                $this->Department->addErrorMessage(str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
            }
        }
        if ($this->AppointmentStatus->Required) {
            if ($this->AppointmentStatus->MultiUpdate != "" && !$this->AppointmentStatus->IsDetailKey && EmptyValue($this->AppointmentStatus->FormValue)) {
                $this->AppointmentStatus->addErrorMessage(str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if ($this->status->MultiUpdate != "" && $this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->scheduler_id->Required) {
            if ($this->scheduler_id->MultiUpdate != "" && !$this->scheduler_id->IsDetailKey && EmptyValue($this->scheduler_id->FormValue)) {
                $this->scheduler_id->addErrorMessage(str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
            }
        }
        if ($this->text->Required) {
            if ($this->text->MultiUpdate != "" && !$this->text->IsDetailKey && EmptyValue($this->text->FormValue)) {
                $this->text->addErrorMessage(str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
            }
        }
        if ($this->appointment_status->Required) {
            if ($this->appointment_status->MultiUpdate != "" && !$this->appointment_status->IsDetailKey && EmptyValue($this->appointment_status->FormValue)) {
                $this->appointment_status->addErrorMessage(str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
            }
        }
        if ($this->PId->Required) {
            if ($this->PId->MultiUpdate != "" && !$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if ($this->PId->MultiUpdate != "") {
            if (!CheckInteger($this->PId->FormValue)) {
                $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
            }
        }
        if ($this->SchEmail->Required) {
            if ($this->SchEmail->MultiUpdate != "" && !$this->SchEmail->IsDetailKey && EmptyValue($this->SchEmail->FormValue)) {
                $this->SchEmail->addErrorMessage(str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
            }
        }
        if ($this->appointment_type->Required) {
            if ($this->appointment_type->MultiUpdate != "" && $this->appointment_type->FormValue == "") {
                $this->appointment_type->addErrorMessage(str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
            }
        }
        if ($this->Notified->Required) {
            if ($this->Notified->MultiUpdate != "" && $this->Notified->FormValue == "") {
                $this->Notified->addErrorMessage(str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
            }
        }
        if ($this->Notes->Required) {
            if ($this->Notes->MultiUpdate != "" && !$this->Notes->IsDetailKey && EmptyValue($this->Notes->FormValue)) {
                $this->Notes->addErrorMessage(str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
            }
        }
        if ($this->paymentType->Required) {
            if ($this->paymentType->MultiUpdate != "" && !$this->paymentType->IsDetailKey && EmptyValue($this->paymentType->FormValue)) {
                $this->paymentType->addErrorMessage(str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
            }
        }
        if ($this->WhereDidYouHear->Required) {
            if ($this->WhereDidYouHear->MultiUpdate != "" && $this->WhereDidYouHear->FormValue == "") {
                $this->WhereDidYouHear->addErrorMessage(str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
            }
        }
        if ($this->createdBy->Required) {
            if ($this->createdBy->MultiUpdate != "" && !$this->createdBy->IsDetailKey && EmptyValue($this->createdBy->FormValue)) {
                $this->createdBy->addErrorMessage(str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
            }
        }
        if ($this->createdDateTime->Required) {
            if ($this->createdDateTime->MultiUpdate != "" && !$this->createdDateTime->IsDetailKey && EmptyValue($this->createdDateTime->FormValue)) {
                $this->createdDateTime->addErrorMessage(str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
            }
        }
        if ($this->PatientTypee->Required) {
            if ($this->PatientTypee->MultiUpdate != "" && !$this->PatientTypee->IsDetailKey && EmptyValue($this->PatientTypee->FormValue)) {
                $this->PatientTypee->addErrorMessage(str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // patientID
            $this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, null, $this->patientID->ReadOnly || $this->patientID->MultiUpdate != "1");

            // patientName
            $this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, null, $this->patientName->ReadOnly || $this->patientName->MultiUpdate != "1");

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly || $this->MobileNumber->MultiUpdate != "1");

            // Purpose
            $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, $this->Purpose->ReadOnly || $this->Purpose->MultiUpdate != "1");

            // PatientType
            $this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, null, $this->PatientType->ReadOnly || $this->PatientType->MultiUpdate != "1");

            // Referal
            $this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, null, $this->Referal->ReadOnly || $this->Referal->MultiUpdate != "1");

            // start_date
            $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), null, $this->start_date->ReadOnly || $this->start_date->MultiUpdate != "1");

            // DoctorName
            $this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, null, $this->DoctorName->ReadOnly || $this->DoctorName->MultiUpdate != "1");

            // end_date
            $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), null, $this->end_date->ReadOnly || $this->end_date->MultiUpdate != "1");

            // DoctorID
            $this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, null, $this->DoctorID->ReadOnly || $this->DoctorID->MultiUpdate != "1");

            // DoctorCode
            $this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, null, $this->DoctorCode->ReadOnly || $this->DoctorCode->MultiUpdate != "1");

            // Department
            $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, $this->Department->ReadOnly || $this->Department->MultiUpdate != "1");

            // AppointmentStatus
            $this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, null, $this->AppointmentStatus->ReadOnly || $this->AppointmentStatus->MultiUpdate != "1");

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly || $this->status->MultiUpdate != "1");

            // text
            $this->text->setDbValueDef($rsnew, $this->text->CurrentValue, null, $this->text->ReadOnly || $this->text->MultiUpdate != "1");

            // appointment_status
            $this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, null, $this->appointment_status->ReadOnly || $this->appointment_status->MultiUpdate != "1");

            // PId
            $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, $this->PId->ReadOnly || $this->PId->MultiUpdate != "1");

            // SchEmail
            $this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, null, $this->SchEmail->ReadOnly || $this->SchEmail->MultiUpdate != "1");

            // appointment_type
            $this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, null, $this->appointment_type->ReadOnly || $this->appointment_type->MultiUpdate != "1");

            // Notified
            $this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, null, $this->Notified->ReadOnly || $this->Notified->MultiUpdate != "1");

            // Notes
            $this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, null, $this->Notes->ReadOnly || $this->Notes->MultiUpdate != "1");

            // paymentType
            $this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, null, $this->paymentType->ReadOnly || $this->paymentType->MultiUpdate != "1");

            // WhereDidYouHear
            $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, $this->WhereDidYouHear->ReadOnly || $this->WhereDidYouHear->MultiUpdate != "1");

            // PatientTypee
            $this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, null, $this->PatientTypee->ReadOnly || $this->PatientTypee->MultiUpdate != "1");

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewAppointmentSchedulerList"), "", $this->TableVar, true);
        $pageId = "update";
        $Breadcrumb->add("update", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                case "x_patientID":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_PatientType":
                    break;
                case "x_Referal":
                    break;
                case "x_DoctorName":
                    break;
                case "x_status":
                    break;
                case "x_appointment_type":
                    break;
                case "x_Notified":
                    break;
                case "x_WhereDidYouHear":
                    break;
                case "x_PatientTypee":
                    break;
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
        if ($type == 'success') {
            //$msg = "your success message";
        } elseif ($type == 'failure') {
            //$msg = "your failure message";
        } elseif ($type == 'warning') {
            //$msg = "your warning message";
        } else {
            //$msg = "your message";
        }
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }
}

<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewEtUpdate extends ViewEt
{
    use MessagesTrait;

    // Page ID
    public $PageID = "update";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_et';

    // Page object name
    public $PageObjName = "ViewEtUpdate";

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

        // Table object (view_et)
        if (!isset($GLOBALS["view_et"]) || get_class($GLOBALS["view_et"]) == PROJECT_NAMESPACE . "view_et") {
            $GLOBALS["view_et"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_et');
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
                $doc = new $class(Container("view_et"));
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
                    if ($pageName == "ViewEtView") {
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
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->TiDNo->setVisibility();
        $this->id->Visible = false;
        $this->EmbryoNo->setVisibility();
        $this->Stage->setVisibility();
        $this->FertilisationDate->setVisibility();
        $this->Day->setVisibility();
        $this->Grade->setVisibility();
        $this->Incubator->setVisibility();
        $this->Catheter->setVisibility();
        $this->Difficulty->setVisibility();
        $this->Easy->setVisibility();
        $this->Comments->setVisibility();
        $this->Doctor->setVisibility();
        $this->Embryologist->setVisibility();
        $this->hideFieldsForAddEdit();
        $this->RIDNo->Required = false;
        $this->TiDNo->Required = false;

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

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
            $this->terminate("ViewEtList"); // No records selected, return to list
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
                    $this->RIDNo->setDbValue($rs->fields['RIDNo']);
                    $this->PatientName->setDbValue($rs->fields['PatientName']);
                    $this->TiDNo->setDbValue($rs->fields['TiDNo']);
                    $this->EmbryoNo->setDbValue($rs->fields['EmbryoNo']);
                    $this->Stage->setDbValue($rs->fields['Stage']);
                    $this->FertilisationDate->setDbValue($rs->fields['FertilisationDate']);
                    $this->Day->setDbValue($rs->fields['Day']);
                    $this->Grade->setDbValue($rs->fields['Grade']);
                    $this->Incubator->setDbValue($rs->fields['Incubator']);
                    $this->Catheter->setDbValue($rs->fields['Catheter']);
                    $this->Difficulty->setDbValue($rs->fields['Difficulty']);
                    $this->Easy->setDbValue($rs->fields['Easy']);
                    $this->Comments->setDbValue($rs->fields['Comments']);
                    $this->Doctor->setDbValue($rs->fields['Doctor']);
                    $this->Embryologist->setDbValue($rs->fields['Embryologist']);
                } else {
                    if (!CompareValue($this->RIDNo->DbValue, $rs->fields['RIDNo'])) {
                        $this->RIDNo->CurrentValue = null;
                    }
                    if (!CompareValue($this->PatientName->DbValue, $rs->fields['PatientName'])) {
                        $this->PatientName->CurrentValue = null;
                    }
                    if (!CompareValue($this->TiDNo->DbValue, $rs->fields['TiDNo'])) {
                        $this->TiDNo->CurrentValue = null;
                    }
                    if (!CompareValue($this->EmbryoNo->DbValue, $rs->fields['EmbryoNo'])) {
                        $this->EmbryoNo->CurrentValue = null;
                    }
                    if (!CompareValue($this->Stage->DbValue, $rs->fields['Stage'])) {
                        $this->Stage->CurrentValue = null;
                    }
                    if (!CompareValue($this->FertilisationDate->DbValue, $rs->fields['FertilisationDate'])) {
                        $this->FertilisationDate->CurrentValue = null;
                    }
                    if (!CompareValue($this->Day->DbValue, $rs->fields['Day'])) {
                        $this->Day->CurrentValue = null;
                    }
                    if (!CompareValue($this->Grade->DbValue, $rs->fields['Grade'])) {
                        $this->Grade->CurrentValue = null;
                    }
                    if (!CompareValue($this->Incubator->DbValue, $rs->fields['Incubator'])) {
                        $this->Incubator->CurrentValue = null;
                    }
                    if (!CompareValue($this->Catheter->DbValue, $rs->fields['Catheter'])) {
                        $this->Catheter->CurrentValue = null;
                    }
                    if (!CompareValue($this->Difficulty->DbValue, $rs->fields['Difficulty'])) {
                        $this->Difficulty->CurrentValue = null;
                    }
                    if (!CompareValue($this->Easy->DbValue, $rs->fields['Easy'])) {
                        $this->Easy->CurrentValue = null;
                    }
                    if (!CompareValue($this->Comments->DbValue, $rs->fields['Comments'])) {
                        $this->Comments->CurrentValue = null;
                    }
                    if (!CompareValue($this->Doctor->DbValue, $rs->fields['Doctor'])) {
                        $this->Doctor->CurrentValue = null;
                    }
                    if (!CompareValue($this->Embryologist->DbValue, $rs->fields['Embryologist'])) {
                        $this->Embryologist->CurrentValue = null;
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

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
            }
        }
        $this->RIDNo->MultiUpdate = $CurrentForm->getValue("u_RIDNo");

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }
        $this->PatientName->MultiUpdate = $CurrentForm->getValue("u_PatientName");

        // Check field name 'TiDNo' first before field var 'x_TiDNo'
        $val = $CurrentForm->hasValue("TiDNo") ? $CurrentForm->getValue("TiDNo") : $CurrentForm->getValue("x_TiDNo");
        if (!$this->TiDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TiDNo->Visible = false; // Disable update for API request
            } else {
                $this->TiDNo->setFormValue($val);
            }
        }
        $this->TiDNo->MultiUpdate = $CurrentForm->getValue("u_TiDNo");

        // Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
        $val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
        if (!$this->EmbryoNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryoNo->Visible = false; // Disable update for API request
            } else {
                $this->EmbryoNo->setFormValue($val);
            }
        }
        $this->EmbryoNo->MultiUpdate = $CurrentForm->getValue("u_EmbryoNo");

        // Check field name 'Stage' first before field var 'x_Stage'
        $val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
        if (!$this->Stage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Stage->Visible = false; // Disable update for API request
            } else {
                $this->Stage->setFormValue($val);
            }
        }
        $this->Stage->MultiUpdate = $CurrentForm->getValue("u_Stage");

        // Check field name 'FertilisationDate' first before field var 'x_FertilisationDate'
        $val = $CurrentForm->hasValue("FertilisationDate") ? $CurrentForm->getValue("FertilisationDate") : $CurrentForm->getValue("x_FertilisationDate");
        if (!$this->FertilisationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FertilisationDate->Visible = false; // Disable update for API request
            } else {
                $this->FertilisationDate->setFormValue($val);
            }
            $this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
        }
        $this->FertilisationDate->MultiUpdate = $CurrentForm->getValue("u_FertilisationDate");

        // Check field name 'Day' first before field var 'x_Day'
        $val = $CurrentForm->hasValue("Day") ? $CurrentForm->getValue("Day") : $CurrentForm->getValue("x_Day");
        if (!$this->Day->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day->Visible = false; // Disable update for API request
            } else {
                $this->Day->setFormValue($val);
            }
        }
        $this->Day->MultiUpdate = $CurrentForm->getValue("u_Day");

        // Check field name 'Grade' first before field var 'x_Grade'
        $val = $CurrentForm->hasValue("Grade") ? $CurrentForm->getValue("Grade") : $CurrentForm->getValue("x_Grade");
        if (!$this->Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade->Visible = false; // Disable update for API request
            } else {
                $this->Grade->setFormValue($val);
            }
        }
        $this->Grade->MultiUpdate = $CurrentForm->getValue("u_Grade");

        // Check field name 'Incubator' first before field var 'x_Incubator'
        $val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
        if (!$this->Incubator->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator->Visible = false; // Disable update for API request
            } else {
                $this->Incubator->setFormValue($val);
            }
        }
        $this->Incubator->MultiUpdate = $CurrentForm->getValue("u_Incubator");

        // Check field name 'Catheter' first before field var 'x_Catheter'
        $val = $CurrentForm->hasValue("Catheter") ? $CurrentForm->getValue("Catheter") : $CurrentForm->getValue("x_Catheter");
        if (!$this->Catheter->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Catheter->Visible = false; // Disable update for API request
            } else {
                $this->Catheter->setFormValue($val);
            }
        }
        $this->Catheter->MultiUpdate = $CurrentForm->getValue("u_Catheter");

        // Check field name 'Difficulty' first before field var 'x_Difficulty'
        $val = $CurrentForm->hasValue("Difficulty") ? $CurrentForm->getValue("Difficulty") : $CurrentForm->getValue("x_Difficulty");
        if (!$this->Difficulty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Difficulty->Visible = false; // Disable update for API request
            } else {
                $this->Difficulty->setFormValue($val);
            }
        }
        $this->Difficulty->MultiUpdate = $CurrentForm->getValue("u_Difficulty");

        // Check field name 'Easy' first before field var 'x_Easy'
        $val = $CurrentForm->hasValue("Easy") ? $CurrentForm->getValue("Easy") : $CurrentForm->getValue("x_Easy");
        if (!$this->Easy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Easy->Visible = false; // Disable update for API request
            } else {
                $this->Easy->setFormValue($val);
            }
        }
        $this->Easy->MultiUpdate = $CurrentForm->getValue("u_Easy");

        // Check field name 'Comments' first before field var 'x_Comments'
        $val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
        if (!$this->Comments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Comments->Visible = false; // Disable update for API request
            } else {
                $this->Comments->setFormValue($val);
            }
        }
        $this->Comments->MultiUpdate = $CurrentForm->getValue("u_Comments");

        // Check field name 'Doctor' first before field var 'x_Doctor'
        $val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
        if (!$this->Doctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Doctor->Visible = false; // Disable update for API request
            } else {
                $this->Doctor->setFormValue($val);
            }
        }
        $this->Doctor->MultiUpdate = $CurrentForm->getValue("u_Doctor");

        // Check field name 'Embryologist' first before field var 'x_Embryologist'
        $val = $CurrentForm->hasValue("Embryologist") ? $CurrentForm->getValue("Embryologist") : $CurrentForm->getValue("x_Embryologist");
        if (!$this->Embryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Embryologist->Visible = false; // Disable update for API request
            } else {
                $this->Embryologist->setFormValue($val);
            }
        }
        $this->Embryologist->MultiUpdate = $CurrentForm->getValue("u_Embryologist");

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
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->TiDNo->CurrentValue = $this->TiDNo->FormValue;
        $this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
        $this->Stage->CurrentValue = $this->Stage->FormValue;
        $this->FertilisationDate->CurrentValue = $this->FertilisationDate->FormValue;
        $this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
        $this->Day->CurrentValue = $this->Day->FormValue;
        $this->Grade->CurrentValue = $this->Grade->FormValue;
        $this->Incubator->CurrentValue = $this->Incubator->FormValue;
        $this->Catheter->CurrentValue = $this->Catheter->FormValue;
        $this->Difficulty->CurrentValue = $this->Difficulty->FormValue;
        $this->Easy->CurrentValue = $this->Easy->FormValue;
        $this->Comments->CurrentValue = $this->Comments->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->Embryologist->CurrentValue = $this->Embryologist->FormValue;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->TiDNo->setDbValue($row['TiDNo']);
        $this->id->setDbValue($row['id']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->FertilisationDate->setDbValue($row['FertilisationDate']);
        $this->Day->setDbValue($row['Day']);
        $this->Grade->setDbValue($row['Grade']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->Catheter->setDbValue($row['Catheter']);
        $this->Difficulty->setDbValue($row['Difficulty']);
        $this->Easy->setDbValue($row['Easy']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Embryologist->setDbValue($row['Embryologist']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['TiDNo'] = null;
        $row['id'] = null;
        $row['EmbryoNo'] = null;
        $row['Stage'] = null;
        $row['FertilisationDate'] = null;
        $row['Day'] = null;
        $row['Grade'] = null;
        $row['Incubator'] = null;
        $row['Catheter'] = null;
        $row['Difficulty'] = null;
        $row['Easy'] = null;
        $row['Comments'] = null;
        $row['Doctor'] = null;
        $row['Embryologist'] = null;
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

        // RIDNo

        // PatientName

        // TiDNo

        // id

        // EmbryoNo

        // Stage

        // FertilisationDate

        // Day

        // Grade

        // Incubator

        // Catheter

        // Difficulty

        // Easy

        // Comments

        // Doctor

        // Embryologist
        if ($this->RowType == ROWTYPE_VIEW) {
            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // TiDNo
            $this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
            $this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
            $this->TiDNo->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

            // Stage
            $this->Stage->ViewValue = $this->Stage->CurrentValue;
            $this->Stage->ViewCustomAttributes = "";

            // FertilisationDate
            $this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
            $this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
            $this->FertilisationDate->ViewCustomAttributes = "";

            // Day
            if (strval($this->Day->CurrentValue) != "") {
                $this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
            } else {
                $this->Day->ViewValue = null;
            }
            $this->Day->ViewCustomAttributes = "";

            // Grade
            if (strval($this->Grade->CurrentValue) != "") {
                $this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
            } else {
                $this->Grade->ViewValue = null;
            }
            $this->Grade->ViewCustomAttributes = "";

            // Incubator
            $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
            $this->Incubator->ViewCustomAttributes = "";

            // Catheter
            $this->Catheter->ViewValue = $this->Catheter->CurrentValue;
            $this->Catheter->ViewCustomAttributes = "";

            // Difficulty
            if (strval($this->Difficulty->CurrentValue) != "") {
                $this->Difficulty->ViewValue = $this->Difficulty->optionCaption($this->Difficulty->CurrentValue);
            } else {
                $this->Difficulty->ViewValue = null;
            }
            $this->Difficulty->ViewCustomAttributes = "";

            // Easy
            if (strval($this->Easy->CurrentValue) != "") {
                $this->Easy->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Easy->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Easy->ViewValue->add($this->Easy->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Easy->ViewValue = null;
            }
            $this->Easy->ViewCustomAttributes = "";

            // Comments
            $this->Comments->ViewValue = $this->Comments->CurrentValue;
            $this->Comments->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // Embryologist
            $this->Embryologist->ViewValue = $this->Embryologist->CurrentValue;
            $this->Embryologist->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // TiDNo
            $this->TiDNo->LinkCustomAttributes = "";
            $this->TiDNo->HrefValue = "";
            $this->TiDNo->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // FertilisationDate
            $this->FertilisationDate->LinkCustomAttributes = "";
            $this->FertilisationDate->HrefValue = "";
            $this->FertilisationDate->TooltipValue = "";

            // Day
            $this->Day->LinkCustomAttributes = "";
            $this->Day->HrefValue = "";
            $this->Day->TooltipValue = "";

            // Grade
            $this->Grade->LinkCustomAttributes = "";
            $this->Grade->HrefValue = "";
            $this->Grade->TooltipValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";
            $this->Incubator->TooltipValue = "";

            // Catheter
            $this->Catheter->LinkCustomAttributes = "";
            $this->Catheter->HrefValue = "";
            $this->Catheter->TooltipValue = "";

            // Difficulty
            $this->Difficulty->LinkCustomAttributes = "";
            $this->Difficulty->HrefValue = "";
            $this->Difficulty->TooltipValue = "";

            // Easy
            $this->Easy->LinkCustomAttributes = "";
            $this->Easy->HrefValue = "";
            $this->Easy->TooltipValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";
            $this->Comments->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";

            // Embryologist
            $this->Embryologist->LinkCustomAttributes = "";
            $this->Embryologist->HrefValue = "";
            $this->Embryologist->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            $this->PatientName->EditValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // TiDNo
            $this->TiDNo->EditAttrs["class"] = "form-control";
            $this->TiDNo->EditCustomAttributes = "";
            $this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
            $this->TiDNo->EditValue = FormatNumber($this->TiDNo->EditValue, 0, -2, -2, -2);
            $this->TiDNo->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->EditAttrs["class"] = "form-control";
            $this->EmbryoNo->EditCustomAttributes = "";
            $this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

            // Stage
            $this->Stage->EditAttrs["class"] = "form-control";
            $this->Stage->EditCustomAttributes = "";
            $this->Stage->EditValue = $this->Stage->CurrentValue;
            $this->Stage->ViewCustomAttributes = "";

            // FertilisationDate
            $this->FertilisationDate->EditAttrs["class"] = "form-control";
            $this->FertilisationDate->EditCustomAttributes = "";
            $this->FertilisationDate->EditValue = $this->FertilisationDate->CurrentValue;
            $this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->EditValue, 0);
            $this->FertilisationDate->ViewCustomAttributes = "";

            // Day
            $this->Day->EditAttrs["class"] = "form-control";
            $this->Day->EditCustomAttributes = "";
            if (strval($this->Day->CurrentValue) != "") {
                $this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
            } else {
                $this->Day->EditValue = null;
            }
            $this->Day->ViewCustomAttributes = "";

            // Grade
            $this->Grade->EditAttrs["class"] = "form-control";
            $this->Grade->EditCustomAttributes = "";
            if (strval($this->Grade->CurrentValue) != "") {
                $this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
            } else {
                $this->Grade->EditValue = null;
            }
            $this->Grade->ViewCustomAttributes = "";

            // Incubator
            $this->Incubator->EditAttrs["class"] = "form-control";
            $this->Incubator->EditCustomAttributes = "";
            $this->Incubator->EditValue = $this->Incubator->CurrentValue;
            $this->Incubator->ViewCustomAttributes = "";

            // Catheter
            $this->Catheter->EditAttrs["class"] = "form-control";
            $this->Catheter->EditCustomAttributes = "";
            if (!$this->Catheter->Raw) {
                $this->Catheter->CurrentValue = HtmlDecode($this->Catheter->CurrentValue);
            }
            $this->Catheter->EditValue = HtmlEncode($this->Catheter->CurrentValue);
            $this->Catheter->PlaceHolder = RemoveHtml($this->Catheter->caption());

            // Difficulty
            $this->Difficulty->EditAttrs["class"] = "form-control";
            $this->Difficulty->EditCustomAttributes = "";
            $this->Difficulty->EditValue = $this->Difficulty->options(true);
            $this->Difficulty->PlaceHolder = RemoveHtml($this->Difficulty->caption());

            // Easy
            $this->Easy->EditCustomAttributes = "";
            $this->Easy->EditValue = $this->Easy->options(false);
            $this->Easy->PlaceHolder = RemoveHtml($this->Easy->caption());

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            if (!$this->Comments->Raw) {
                $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
            }
            $this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
            $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // Embryologist
            $this->Embryologist->EditAttrs["class"] = "form-control";
            $this->Embryologist->EditCustomAttributes = "";
            if (!$this->Embryologist->Raw) {
                $this->Embryologist->CurrentValue = HtmlDecode($this->Embryologist->CurrentValue);
            }
            $this->Embryologist->EditValue = HtmlEncode($this->Embryologist->CurrentValue);
            $this->Embryologist->PlaceHolder = RemoveHtml($this->Embryologist->caption());

            // Edit refer script

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // TiDNo
            $this->TiDNo->LinkCustomAttributes = "";
            $this->TiDNo->HrefValue = "";
            $this->TiDNo->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // FertilisationDate
            $this->FertilisationDate->LinkCustomAttributes = "";
            $this->FertilisationDate->HrefValue = "";
            $this->FertilisationDate->TooltipValue = "";

            // Day
            $this->Day->LinkCustomAttributes = "";
            $this->Day->HrefValue = "";
            $this->Day->TooltipValue = "";

            // Grade
            $this->Grade->LinkCustomAttributes = "";
            $this->Grade->HrefValue = "";
            $this->Grade->TooltipValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";
            $this->Incubator->TooltipValue = "";

            // Catheter
            $this->Catheter->LinkCustomAttributes = "";
            $this->Catheter->HrefValue = "";

            // Difficulty
            $this->Difficulty->LinkCustomAttributes = "";
            $this->Difficulty->HrefValue = "";

            // Easy
            $this->Easy->LinkCustomAttributes = "";
            $this->Easy->HrefValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

            // Embryologist
            $this->Embryologist->LinkCustomAttributes = "";
            $this->Embryologist->HrefValue = "";
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
        if ($this->RIDNo->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->PatientName->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->TiDNo->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->EmbryoNo->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Stage->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->FertilisationDate->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Day->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Grade->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Incubator->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Catheter->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Difficulty->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Easy->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Comments->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Doctor->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($this->Embryologist->multiUpdateSelected()) {
            $updateCnt++;
        }
        if ($updateCnt == 0) {
            return false;
        }

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->RIDNo->Required) {
            if ($this->RIDNo->MultiUpdate != "" && !$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if ($this->PatientName->MultiUpdate != "" && !$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->TiDNo->Required) {
            if ($this->TiDNo->MultiUpdate != "" && !$this->TiDNo->IsDetailKey && EmptyValue($this->TiDNo->FormValue)) {
                $this->TiDNo->addErrorMessage(str_replace("%s", $this->TiDNo->caption(), $this->TiDNo->RequiredErrorMessage));
            }
        }
        if ($this->EmbryoNo->Required) {
            if ($this->EmbryoNo->MultiUpdate != "" && !$this->EmbryoNo->IsDetailKey && EmptyValue($this->EmbryoNo->FormValue)) {
                $this->EmbryoNo->addErrorMessage(str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
            }
        }
        if ($this->Stage->Required) {
            if ($this->Stage->MultiUpdate != "" && !$this->Stage->IsDetailKey && EmptyValue($this->Stage->FormValue)) {
                $this->Stage->addErrorMessage(str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
            }
        }
        if ($this->FertilisationDate->Required) {
            if ($this->FertilisationDate->MultiUpdate != "" && !$this->FertilisationDate->IsDetailKey && EmptyValue($this->FertilisationDate->FormValue)) {
                $this->FertilisationDate->addErrorMessage(str_replace("%s", $this->FertilisationDate->caption(), $this->FertilisationDate->RequiredErrorMessage));
            }
        }
        if ($this->Day->Required) {
            if ($this->Day->MultiUpdate != "" && !$this->Day->IsDetailKey && EmptyValue($this->Day->FormValue)) {
                $this->Day->addErrorMessage(str_replace("%s", $this->Day->caption(), $this->Day->RequiredErrorMessage));
            }
        }
        if ($this->Grade->Required) {
            if ($this->Grade->MultiUpdate != "" && !$this->Grade->IsDetailKey && EmptyValue($this->Grade->FormValue)) {
                $this->Grade->addErrorMessage(str_replace("%s", $this->Grade->caption(), $this->Grade->RequiredErrorMessage));
            }
        }
        if ($this->Incubator->Required) {
            if ($this->Incubator->MultiUpdate != "" && !$this->Incubator->IsDetailKey && EmptyValue($this->Incubator->FormValue)) {
                $this->Incubator->addErrorMessage(str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
            }
        }
        if ($this->Catheter->Required) {
            if ($this->Catheter->MultiUpdate != "" && !$this->Catheter->IsDetailKey && EmptyValue($this->Catheter->FormValue)) {
                $this->Catheter->addErrorMessage(str_replace("%s", $this->Catheter->caption(), $this->Catheter->RequiredErrorMessage));
            }
        }
        if ($this->Difficulty->Required) {
            if ($this->Difficulty->MultiUpdate != "" && !$this->Difficulty->IsDetailKey && EmptyValue($this->Difficulty->FormValue)) {
                $this->Difficulty->addErrorMessage(str_replace("%s", $this->Difficulty->caption(), $this->Difficulty->RequiredErrorMessage));
            }
        }
        if ($this->Easy->Required) {
            if ($this->Easy->MultiUpdate != "" && $this->Easy->FormValue == "") {
                $this->Easy->addErrorMessage(str_replace("%s", $this->Easy->caption(), $this->Easy->RequiredErrorMessage));
            }
        }
        if ($this->Comments->Required) {
            if ($this->Comments->MultiUpdate != "" && !$this->Comments->IsDetailKey && EmptyValue($this->Comments->FormValue)) {
                $this->Comments->addErrorMessage(str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
            }
        }
        if ($this->Doctor->Required) {
            if ($this->Doctor->MultiUpdate != "" && !$this->Doctor->IsDetailKey && EmptyValue($this->Doctor->FormValue)) {
                $this->Doctor->addErrorMessage(str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
            }
        }
        if ($this->Embryologist->Required) {
            if ($this->Embryologist->MultiUpdate != "" && !$this->Embryologist->IsDetailKey && EmptyValue($this->Embryologist->FormValue)) {
                $this->Embryologist->addErrorMessage(str_replace("%s", $this->Embryologist->caption(), $this->Embryologist->RequiredErrorMessage));
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

            // Catheter
            $this->Catheter->setDbValueDef($rsnew, $this->Catheter->CurrentValue, null, $this->Catheter->ReadOnly || $this->Catheter->MultiUpdate != "1");

            // Difficulty
            $this->Difficulty->setDbValueDef($rsnew, $this->Difficulty->CurrentValue, null, $this->Difficulty->ReadOnly || $this->Difficulty->MultiUpdate != "1");

            // Easy
            $this->Easy->setDbValueDef($rsnew, $this->Easy->CurrentValue, null, $this->Easy->ReadOnly || $this->Easy->MultiUpdate != "1");

            // Comments
            $this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, null, $this->Comments->ReadOnly || $this->Comments->MultiUpdate != "1");

            // Doctor
            $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, $this->Doctor->ReadOnly || $this->Doctor->MultiUpdate != "1");

            // Embryologist
            $this->Embryologist->setDbValueDef($rsnew, $this->Embryologist->CurrentValue, null, $this->Embryologist->ReadOnly || $this->Embryologist->MultiUpdate != "1");

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewEtList"), "", $this->TableVar, true);
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
                case "x_Day":
                    break;
                case "x_Grade":
                    break;
                case "x_Difficulty":
                    break;
                case "x_Easy":
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

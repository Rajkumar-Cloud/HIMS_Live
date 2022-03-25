<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class HrLeavetypesDelete extends HrLeavetypes
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'hr_leavetypes';

    // Page object name
    public $PageObjName = "HrLeavetypesDelete";

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

        // Table object (hr_leavetypes)
        if (!isset($GLOBALS["hr_leavetypes"]) || get_class($GLOBALS["hr_leavetypes"]) == PROJECT_NAMESPACE . "hr_leavetypes") {
            $GLOBALS["hr_leavetypes"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_leavetypes');
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
                $doc = new $class(Container("hr_leavetypes"));
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
            SaveDebugMessage();
            Redirect(GetUrl($url));
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
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->name->setVisibility();
        $this->supervisor_leave_assign->setVisibility();
        $this->employee_can_apply->setVisibility();
        $this->apply_beyond_current->setVisibility();
        $this->leave_accrue->setVisibility();
        $this->carried_forward->setVisibility();
        $this->default_per_year->setVisibility();
        $this->carried_forward_percentage->setVisibility();
        $this->carried_forward_leave_availability->setVisibility();
        $this->propotionate_on_joined_date->setVisibility();
        $this->send_notification_emails->setVisibility();
        $this->leave_group->setVisibility();
        $this->leave_color->setVisibility();
        $this->max_carried_forward_amount->setVisibility();
        $this->HospID->setVisibility();
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

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("HrLeavetypesList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
                }
            } else { // Delete failed
                if (IsApi()) {
                    $this->terminate();
                    return;
                }
                $this->CurrentAction = "show"; // Display record
            }
        }
        if ($this->isShow()) { // Load records for display
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("HrLeavetypesList"); // Return to list
                return;
            }
        }

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
        $this->name->setDbValue($row['name']);
        $this->supervisor_leave_assign->setDbValue($row['supervisor_leave_assign']);
        $this->employee_can_apply->setDbValue($row['employee_can_apply']);
        $this->apply_beyond_current->setDbValue($row['apply_beyond_current']);
        $this->leave_accrue->setDbValue($row['leave_accrue']);
        $this->carried_forward->setDbValue($row['carried_forward']);
        $this->default_per_year->setDbValue($row['default_per_year']);
        $this->carried_forward_percentage->setDbValue($row['carried_forward_percentage']);
        $this->carried_forward_leave_availability->setDbValue($row['carried_forward_leave_availability']);
        $this->propotionate_on_joined_date->setDbValue($row['propotionate_on_joined_date']);
        $this->send_notification_emails->setDbValue($row['send_notification_emails']);
        $this->leave_group->setDbValue($row['leave_group']);
        $this->leave_color->setDbValue($row['leave_color']);
        $this->max_carried_forward_amount->setDbValue($row['max_carried_forward_amount']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['name'] = null;
        $row['supervisor_leave_assign'] = null;
        $row['employee_can_apply'] = null;
        $row['apply_beyond_current'] = null;
        $row['leave_accrue'] = null;
        $row['carried_forward'] = null;
        $row['default_per_year'] = null;
        $row['carried_forward_percentage'] = null;
        $row['carried_forward_leave_availability'] = null;
        $row['propotionate_on_joined_date'] = null;
        $row['send_notification_emails'] = null;
        $row['leave_group'] = null;
        $row['leave_color'] = null;
        $row['max_carried_forward_amount'] = null;
        $row['HospID'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->default_per_year->FormValue == $this->default_per_year->CurrentValue && is_numeric(ConvertToFloatString($this->default_per_year->CurrentValue))) {
            $this->default_per_year->CurrentValue = ConvertToFloatString($this->default_per_year->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // name

        // supervisor_leave_assign

        // employee_can_apply

        // apply_beyond_current

        // leave_accrue

        // carried_forward

        // default_per_year

        // carried_forward_percentage

        // carried_forward_leave_availability

        // propotionate_on_joined_date

        // send_notification_emails

        // leave_group

        // leave_color

        // max_carried_forward_amount

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // name
            $this->name->ViewValue = $this->name->CurrentValue;
            $this->name->ViewCustomAttributes = "";

            // supervisor_leave_assign
            if (strval($this->supervisor_leave_assign->CurrentValue) != "") {
                $this->supervisor_leave_assign->ViewValue = $this->supervisor_leave_assign->optionCaption($this->supervisor_leave_assign->CurrentValue);
            } else {
                $this->supervisor_leave_assign->ViewValue = null;
            }
            $this->supervisor_leave_assign->ViewCustomAttributes = "";

            // employee_can_apply
            if (strval($this->employee_can_apply->CurrentValue) != "") {
                $this->employee_can_apply->ViewValue = $this->employee_can_apply->optionCaption($this->employee_can_apply->CurrentValue);
            } else {
                $this->employee_can_apply->ViewValue = null;
            }
            $this->employee_can_apply->ViewCustomAttributes = "";

            // apply_beyond_current
            if (strval($this->apply_beyond_current->CurrentValue) != "") {
                $this->apply_beyond_current->ViewValue = $this->apply_beyond_current->optionCaption($this->apply_beyond_current->CurrentValue);
            } else {
                $this->apply_beyond_current->ViewValue = null;
            }
            $this->apply_beyond_current->ViewCustomAttributes = "";

            // leave_accrue
            if (strval($this->leave_accrue->CurrentValue) != "") {
                $this->leave_accrue->ViewValue = $this->leave_accrue->optionCaption($this->leave_accrue->CurrentValue);
            } else {
                $this->leave_accrue->ViewValue = null;
            }
            $this->leave_accrue->ViewCustomAttributes = "";

            // carried_forward
            if (strval($this->carried_forward->CurrentValue) != "") {
                $this->carried_forward->ViewValue = $this->carried_forward->optionCaption($this->carried_forward->CurrentValue);
            } else {
                $this->carried_forward->ViewValue = null;
            }
            $this->carried_forward->ViewCustomAttributes = "";

            // default_per_year
            $this->default_per_year->ViewValue = $this->default_per_year->CurrentValue;
            $this->default_per_year->ViewValue = FormatNumber($this->default_per_year->ViewValue, 2, -2, -2, -2);
            $this->default_per_year->ViewCustomAttributes = "";

            // carried_forward_percentage
            $this->carried_forward_percentage->ViewValue = $this->carried_forward_percentage->CurrentValue;
            $this->carried_forward_percentage->ViewValue = FormatNumber($this->carried_forward_percentage->ViewValue, 0, -2, -2, -2);
            $this->carried_forward_percentage->ViewCustomAttributes = "";

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->ViewValue = $this->carried_forward_leave_availability->CurrentValue;
            $this->carried_forward_leave_availability->ViewValue = FormatNumber($this->carried_forward_leave_availability->ViewValue, 0, -2, -2, -2);
            $this->carried_forward_leave_availability->ViewCustomAttributes = "";

            // propotionate_on_joined_date
            if (strval($this->propotionate_on_joined_date->CurrentValue) != "") {
                $this->propotionate_on_joined_date->ViewValue = $this->propotionate_on_joined_date->optionCaption($this->propotionate_on_joined_date->CurrentValue);
            } else {
                $this->propotionate_on_joined_date->ViewValue = null;
            }
            $this->propotionate_on_joined_date->ViewCustomAttributes = "";

            // send_notification_emails
            if (strval($this->send_notification_emails->CurrentValue) != "") {
                $this->send_notification_emails->ViewValue = $this->send_notification_emails->optionCaption($this->send_notification_emails->CurrentValue);
            } else {
                $this->send_notification_emails->ViewValue = null;
            }
            $this->send_notification_emails->ViewCustomAttributes = "";

            // leave_group
            $this->leave_group->ViewValue = $this->leave_group->CurrentValue;
            $this->leave_group->ViewValue = FormatNumber($this->leave_group->ViewValue, 0, -2, -2, -2);
            $this->leave_group->ViewCustomAttributes = "";

            // leave_color
            $this->leave_color->ViewValue = $this->leave_color->CurrentValue;
            $this->leave_color->ViewCustomAttributes = "";

            // max_carried_forward_amount
            $this->max_carried_forward_amount->ViewValue = $this->max_carried_forward_amount->CurrentValue;
            $this->max_carried_forward_amount->ViewValue = FormatNumber($this->max_carried_forward_amount->ViewValue, 0, -2, -2, -2);
            $this->max_carried_forward_amount->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // name
            $this->name->LinkCustomAttributes = "";
            $this->name->HrefValue = "";
            $this->name->TooltipValue = "";

            // supervisor_leave_assign
            $this->supervisor_leave_assign->LinkCustomAttributes = "";
            $this->supervisor_leave_assign->HrefValue = "";
            $this->supervisor_leave_assign->TooltipValue = "";

            // employee_can_apply
            $this->employee_can_apply->LinkCustomAttributes = "";
            $this->employee_can_apply->HrefValue = "";
            $this->employee_can_apply->TooltipValue = "";

            // apply_beyond_current
            $this->apply_beyond_current->LinkCustomAttributes = "";
            $this->apply_beyond_current->HrefValue = "";
            $this->apply_beyond_current->TooltipValue = "";

            // leave_accrue
            $this->leave_accrue->LinkCustomAttributes = "";
            $this->leave_accrue->HrefValue = "";
            $this->leave_accrue->TooltipValue = "";

            // carried_forward
            $this->carried_forward->LinkCustomAttributes = "";
            $this->carried_forward->HrefValue = "";
            $this->carried_forward->TooltipValue = "";

            // default_per_year
            $this->default_per_year->LinkCustomAttributes = "";
            $this->default_per_year->HrefValue = "";
            $this->default_per_year->TooltipValue = "";

            // carried_forward_percentage
            $this->carried_forward_percentage->LinkCustomAttributes = "";
            $this->carried_forward_percentage->HrefValue = "";
            $this->carried_forward_percentage->TooltipValue = "";

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->LinkCustomAttributes = "";
            $this->carried_forward_leave_availability->HrefValue = "";
            $this->carried_forward_leave_availability->TooltipValue = "";

            // propotionate_on_joined_date
            $this->propotionate_on_joined_date->LinkCustomAttributes = "";
            $this->propotionate_on_joined_date->HrefValue = "";
            $this->propotionate_on_joined_date->TooltipValue = "";

            // send_notification_emails
            $this->send_notification_emails->LinkCustomAttributes = "";
            $this->send_notification_emails->HrefValue = "";
            $this->send_notification_emails->TooltipValue = "";

            // leave_group
            $this->leave_group->LinkCustomAttributes = "";
            $this->leave_group->HrefValue = "";
            $this->leave_group->TooltipValue = "";

            // leave_color
            $this->leave_color->LinkCustomAttributes = "";
            $this->leave_color->HrefValue = "";
            $this->leave_color->TooltipValue = "";

            // max_carried_forward_amount
            $this->max_carried_forward_amount->LinkCustomAttributes = "";
            $this->max_carried_forward_amount->HrefValue = "";
            $this->max_carried_forward_amount->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }
        if ($deleteRows) {
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("HrLeavetypesList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
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
                case "x_supervisor_leave_assign":
                    break;
                case "x_employee_can_apply":
                    break;
                case "x_apply_beyond_current":
                    break;
                case "x_leave_accrue":
                    break;
                case "x_carried_forward":
                    break;
                case "x_propotionate_on_joined_date":
                    break;
                case "x_send_notification_emails":
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
}

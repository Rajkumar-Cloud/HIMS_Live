<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresIndicationstableDelete extends PresIndicationstable
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_indicationstable';

    // Page object name
    public $PageObjName = "PresIndicationstableDelete";

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

        // Table object (pres_indicationstable)
        if (!isset($GLOBALS["pres_indicationstable"]) || get_class($GLOBALS["pres_indicationstable"]) == PROJECT_NAMESPACE . "pres_indicationstable") {
            $GLOBALS["pres_indicationstable"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_indicationstable');
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
                $doc = new $class(Container("pres_indicationstable"));
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
            $key .= @$ar['Sno'];
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
            $this->Sno->Visible = false;
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
        $this->Sno->setVisibility();
        $this->Genericname->setVisibility();
        $this->Indications->setVisibility();
        $this->Category->setVisibility();
        $this->Min_Age->setVisibility();
        $this->Min_Days->setVisibility();
        $this->Max_Age->setVisibility();
        $this->Max_Days->setVisibility();
        $this->_Route->setVisibility();
        $this->Form->setVisibility();
        $this->Min_Dose_Val->setVisibility();
        $this->Min_Dose_Unit->setVisibility();
        $this->Max_Dose_Val->setVisibility();
        $this->Max_Dose_Unit->setVisibility();
        $this->Frequency->setVisibility();
        $this->Duration->setVisibility();
        $this->DWMY->setVisibility();
        $this->Contraindications->setVisibility();
        $this->RecStatus->setVisibility();
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
            $this->terminate("PresIndicationstableList"); // Prevent SQL injection, return to list
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
                $this->terminate("PresIndicationstableList"); // Return to list
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
        $this->Sno->setDbValue($row['Sno']);
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Indications->setDbValue($row['Indications']);
        $this->Category->setDbValue($row['Category']);
        $this->Min_Age->setDbValue($row['Min_Age']);
        $this->Min_Days->setDbValue($row['Min_Days']);
        $this->Max_Age->setDbValue($row['Max_Age']);
        $this->Max_Days->setDbValue($row['Max_Days']);
        $this->_Route->setDbValue($row['Route']);
        $this->Form->setDbValue($row['Form']);
        $this->Min_Dose_Val->setDbValue($row['Min_Dose_Val']);
        $this->Min_Dose_Unit->setDbValue($row['Min_Dose_Unit']);
        $this->Max_Dose_Val->setDbValue($row['Max_Dose_Val']);
        $this->Max_Dose_Unit->setDbValue($row['Max_Dose_Unit']);
        $this->Frequency->setDbValue($row['Frequency']);
        $this->Duration->setDbValue($row['Duration']);
        $this->DWMY->setDbValue($row['DWMY']);
        $this->Contraindications->setDbValue($row['Contraindications']);
        $this->RecStatus->setDbValue($row['RecStatus']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Sno'] = null;
        $row['Genericname'] = null;
        $row['Indications'] = null;
        $row['Category'] = null;
        $row['Min_Age'] = null;
        $row['Min_Days'] = null;
        $row['Max_Age'] = null;
        $row['Max_Days'] = null;
        $row['Route'] = null;
        $row['Form'] = null;
        $row['Min_Dose_Val'] = null;
        $row['Min_Dose_Unit'] = null;
        $row['Max_Dose_Val'] = null;
        $row['Max_Dose_Unit'] = null;
        $row['Frequency'] = null;
        $row['Duration'] = null;
        $row['DWMY'] = null;
        $row['Contraindications'] = null;
        $row['RecStatus'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->Min_Dose_Val->FormValue == $this->Min_Dose_Val->CurrentValue && is_numeric(ConvertToFloatString($this->Min_Dose_Val->CurrentValue))) {
            $this->Min_Dose_Val->CurrentValue = ConvertToFloatString($this->Min_Dose_Val->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Max_Dose_Val->FormValue == $this->Max_Dose_Val->CurrentValue && is_numeric(ConvertToFloatString($this->Max_Dose_Val->CurrentValue))) {
            $this->Max_Dose_Val->CurrentValue = ConvertToFloatString($this->Max_Dose_Val->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Sno

        // Genericname

        // Indications

        // Category

        // Min_Age

        // Min_Days

        // Max_Age

        // Max_Days

        // Route

        // Form

        // Min_Dose_Val

        // Min_Dose_Unit

        // Max_Dose_Val

        // Max_Dose_Unit

        // Frequency

        // Duration

        // DWMY

        // Contraindications

        // RecStatus
        if ($this->RowType == ROWTYPE_VIEW) {
            // Sno
            $this->Sno->ViewValue = $this->Sno->CurrentValue;
            $this->Sno->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
            $this->Genericname->ViewCustomAttributes = "";

            // Indications
            $this->Indications->ViewValue = $this->Indications->CurrentValue;
            $this->Indications->ViewCustomAttributes = "";

            // Category
            $this->Category->ViewValue = $this->Category->CurrentValue;
            $this->Category->ViewCustomAttributes = "";

            // Min_Age
            $this->Min_Age->ViewValue = $this->Min_Age->CurrentValue;
            $this->Min_Age->ViewValue = FormatNumber($this->Min_Age->ViewValue, 0, -2, -2, -2);
            $this->Min_Age->ViewCustomAttributes = "";

            // Min_Days
            $this->Min_Days->ViewValue = $this->Min_Days->CurrentValue;
            $this->Min_Days->ViewCustomAttributes = "";

            // Max_Age
            $this->Max_Age->ViewValue = $this->Max_Age->CurrentValue;
            $this->Max_Age->ViewValue = FormatNumber($this->Max_Age->ViewValue, 0, -2, -2, -2);
            $this->Max_Age->ViewCustomAttributes = "";

            // Max_Days
            $this->Max_Days->ViewValue = $this->Max_Days->CurrentValue;
            $this->Max_Days->ViewCustomAttributes = "";

            // Route
            $this->_Route->ViewValue = $this->_Route->CurrentValue;
            $this->_Route->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // Min_Dose_Val
            $this->Min_Dose_Val->ViewValue = $this->Min_Dose_Val->CurrentValue;
            $this->Min_Dose_Val->ViewValue = FormatNumber($this->Min_Dose_Val->ViewValue, 2, -2, -2, -2);
            $this->Min_Dose_Val->ViewCustomAttributes = "";

            // Min_Dose_Unit
            $this->Min_Dose_Unit->ViewValue = $this->Min_Dose_Unit->CurrentValue;
            $this->Min_Dose_Unit->ViewCustomAttributes = "";

            // Max_Dose_Val
            $this->Max_Dose_Val->ViewValue = $this->Max_Dose_Val->CurrentValue;
            $this->Max_Dose_Val->ViewValue = FormatNumber($this->Max_Dose_Val->ViewValue, 2, -2, -2, -2);
            $this->Max_Dose_Val->ViewCustomAttributes = "";

            // Max_Dose_Unit
            $this->Max_Dose_Unit->ViewValue = $this->Max_Dose_Unit->CurrentValue;
            $this->Max_Dose_Unit->ViewCustomAttributes = "";

            // Frequency
            $this->Frequency->ViewValue = $this->Frequency->CurrentValue;
            $this->Frequency->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewValue = FormatNumber($this->Duration->ViewValue, 0, -2, -2, -2);
            $this->Duration->ViewCustomAttributes = "";

            // DWMY
            $this->DWMY->ViewValue = $this->DWMY->CurrentValue;
            $this->DWMY->ViewCustomAttributes = "";

            // Contraindications
            $this->Contraindications->ViewValue = $this->Contraindications->CurrentValue;
            $this->Contraindications->ViewCustomAttributes = "";

            // RecStatus
            $this->RecStatus->ViewValue = $this->RecStatus->CurrentValue;
            $this->RecStatus->ViewCustomAttributes = "";

            // Sno
            $this->Sno->LinkCustomAttributes = "";
            $this->Sno->HrefValue = "";
            $this->Sno->TooltipValue = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";
            $this->Genericname->TooltipValue = "";

            // Indications
            $this->Indications->LinkCustomAttributes = "";
            $this->Indications->HrefValue = "";
            $this->Indications->TooltipValue = "";

            // Category
            $this->Category->LinkCustomAttributes = "";
            $this->Category->HrefValue = "";
            $this->Category->TooltipValue = "";

            // Min_Age
            $this->Min_Age->LinkCustomAttributes = "";
            $this->Min_Age->HrefValue = "";
            $this->Min_Age->TooltipValue = "";

            // Min_Days
            $this->Min_Days->LinkCustomAttributes = "";
            $this->Min_Days->HrefValue = "";
            $this->Min_Days->TooltipValue = "";

            // Max_Age
            $this->Max_Age->LinkCustomAttributes = "";
            $this->Max_Age->HrefValue = "";
            $this->Max_Age->TooltipValue = "";

            // Max_Days
            $this->Max_Days->LinkCustomAttributes = "";
            $this->Max_Days->HrefValue = "";
            $this->Max_Days->TooltipValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";
            $this->_Route->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Min_Dose_Val
            $this->Min_Dose_Val->LinkCustomAttributes = "";
            $this->Min_Dose_Val->HrefValue = "";
            $this->Min_Dose_Val->TooltipValue = "";

            // Min_Dose_Unit
            $this->Min_Dose_Unit->LinkCustomAttributes = "";
            $this->Min_Dose_Unit->HrefValue = "";
            $this->Min_Dose_Unit->TooltipValue = "";

            // Max_Dose_Val
            $this->Max_Dose_Val->LinkCustomAttributes = "";
            $this->Max_Dose_Val->HrefValue = "";
            $this->Max_Dose_Val->TooltipValue = "";

            // Max_Dose_Unit
            $this->Max_Dose_Unit->LinkCustomAttributes = "";
            $this->Max_Dose_Unit->HrefValue = "";
            $this->Max_Dose_Unit->TooltipValue = "";

            // Frequency
            $this->Frequency->LinkCustomAttributes = "";
            $this->Frequency->HrefValue = "";
            $this->Frequency->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // DWMY
            $this->DWMY->LinkCustomAttributes = "";
            $this->DWMY->HrefValue = "";
            $this->DWMY->TooltipValue = "";

            // Contraindications
            $this->Contraindications->LinkCustomAttributes = "";
            $this->Contraindications->HrefValue = "";
            $this->Contraindications->TooltipValue = "";

            // RecStatus
            $this->RecStatus->LinkCustomAttributes = "";
            $this->RecStatus->HrefValue = "";
            $this->RecStatus->TooltipValue = "";
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
                $thisKey .= $row['Sno'];
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresIndicationstableList"), "", $this->TableVar, true);
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

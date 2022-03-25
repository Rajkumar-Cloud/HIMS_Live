<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class QaqcrecordEndrologyDelete extends QaqcrecordEndrology
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'qaqcrecord_endrology';

    // Page object name
    public $PageObjName = "QaqcrecordEndrologyDelete";

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

        // Table object (qaqcrecord_endrology)
        if (!isset($GLOBALS["qaqcrecord_endrology"]) || get_class($GLOBALS["qaqcrecord_endrology"]) == PROJECT_NAMESPACE . "qaqcrecord_endrology") {
            $GLOBALS["qaqcrecord_endrology"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'qaqcrecord_endrology');
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
                $doc = new $class(Container("qaqcrecord_endrology"));
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
        $this->Date->setVisibility();
        $this->LN2_Level->setVisibility();
        $this->LN2_Checked->setVisibility();
        $this->Incubator_Temp->setVisibility();
        $this->Incubator_Cleaned->setVisibility();
        $this->LAF_MG->setVisibility();
        $this->LAF_Cleaned->setVisibility();
        $this->REF_Temp->setVisibility();
        $this->REF_Cleaned->setVisibility();
        $this->Heating_Temp->setVisibility();
        $this->Heating_Cleaned->setVisibility();
        $this->Createdby->setVisibility();
        $this->CreatedDate->setVisibility();
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
            $this->terminate("QaqcrecordEndrologyList"); // Prevent SQL injection, return to list
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
                $this->terminate("QaqcrecordEndrologyList"); // Return to list
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
        $this->Date->setDbValue($row['Date']);
        $this->LN2_Level->setDbValue($row['LN2_Level']);
        $this->LN2_Checked->setDbValue($row['LN2_Checked']);
        $this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
        $this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
        $this->LAF_MG->setDbValue($row['LAF_MG']);
        $this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
        $this->REF_Temp->setDbValue($row['REF_Temp']);
        $this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
        $this->Heating_Temp->setDbValue($row['Heating_Temp']);
        $this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
        $this->Createdby->setDbValue($row['Createdby']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Date'] = null;
        $row['LN2_Level'] = null;
        $row['LN2_Checked'] = null;
        $row['Incubator_Temp'] = null;
        $row['Incubator_Cleaned'] = null;
        $row['LAF_MG'] = null;
        $row['LAF_Cleaned'] = null;
        $row['REF_Temp'] = null;
        $row['REF_Cleaned'] = null;
        $row['Heating_Temp'] = null;
        $row['Heating_Cleaned'] = null;
        $row['Createdby'] = null;
        $row['CreatedDate'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->LN2_Level->FormValue == $this->LN2_Level->CurrentValue && is_numeric(ConvertToFloatString($this->LN2_Level->CurrentValue))) {
            $this->LN2_Level->CurrentValue = ConvertToFloatString($this->LN2_Level->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Incubator_Temp->FormValue == $this->Incubator_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Incubator_Temp->CurrentValue))) {
            $this->Incubator_Temp->CurrentValue = ConvertToFloatString($this->Incubator_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LAF_MG->FormValue == $this->LAF_MG->CurrentValue && is_numeric(ConvertToFloatString($this->LAF_MG->CurrentValue))) {
            $this->LAF_MG->CurrentValue = ConvertToFloatString($this->LAF_MG->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->REF_Temp->FormValue == $this->REF_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->REF_Temp->CurrentValue))) {
            $this->REF_Temp->CurrentValue = ConvertToFloatString($this->REF_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Heating_Temp->FormValue == $this->Heating_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Heating_Temp->CurrentValue))) {
            $this->Heating_Temp->CurrentValue = ConvertToFloatString($this->Heating_Temp->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Date

        // LN2_Level

        // LN2_Checked

        // Incubator_Temp

        // Incubator_Cleaned

        // LAF_MG

        // LAF_Cleaned

        // REF_Temp

        // REF_Cleaned

        // Heating_Temp

        // Heating_Cleaned

        // Createdby

        // CreatedDate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // LN2_Level
            $this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
            $this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
            $this->LN2_Level->ViewCustomAttributes = "";

            // LN2_Checked
            if (strval($this->LN2_Checked->CurrentValue) != "") {
                $this->LN2_Checked->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LN2_Checked->ViewValue = null;
            }
            $this->LN2_Checked->ViewCustomAttributes = "";

            // Incubator_Temp
            $this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
            $this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
            $this->Incubator_Temp->ViewCustomAttributes = "";

            // Incubator_Cleaned
            if (strval($this->Incubator_Cleaned->CurrentValue) != "") {
                $this->Incubator_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Incubator_Cleaned->ViewValue = null;
            }
            $this->Incubator_Cleaned->ViewCustomAttributes = "";

            // LAF_MG
            $this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
            $this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
            $this->LAF_MG->ViewCustomAttributes = "";

            // LAF_Cleaned
            if (strval($this->LAF_Cleaned->CurrentValue) != "") {
                $this->LAF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LAF_Cleaned->ViewValue = null;
            }
            $this->LAF_Cleaned->ViewCustomAttributes = "";

            // REF_Temp
            $this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
            $this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
            $this->REF_Temp->ViewCustomAttributes = "";

            // REF_Cleaned
            if (strval($this->REF_Cleaned->CurrentValue) != "") {
                $this->REF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->REF_Cleaned->ViewValue = null;
            }
            $this->REF_Cleaned->ViewCustomAttributes = "";

            // Heating_Temp
            $this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
            $this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
            $this->Heating_Temp->ViewCustomAttributes = "";

            // Heating_Cleaned
            if (strval($this->Heating_Cleaned->CurrentValue) != "") {
                $this->Heating_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Heating_Cleaned->ViewValue = null;
            }
            $this->Heating_Cleaned->ViewCustomAttributes = "";

            // Createdby
            $this->Createdby->ViewValue = $this->Createdby->CurrentValue;
            $this->Createdby->ViewCustomAttributes = "";

            // CreatedDate
            $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
            $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
            $this->CreatedDate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";
            $this->LN2_Level->TooltipValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";
            $this->LN2_Checked->TooltipValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";
            $this->Incubator_Temp->TooltipValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";
            $this->Incubator_Cleaned->TooltipValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";
            $this->LAF_MG->TooltipValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";
            $this->LAF_Cleaned->TooltipValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";
            $this->REF_Temp->TooltipValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";
            $this->REF_Cleaned->TooltipValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";
            $this->Heating_Temp->TooltipValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";
            $this->Heating_Cleaned->TooltipValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";
            $this->Createdby->TooltipValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
            $this->CreatedDate->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("QaqcrecordEndrologyList"), "", $this->TableVar, true);
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
                case "x_LN2_Checked":
                    break;
                case "x_Incubator_Cleaned":
                    break;
                case "x_LAF_Cleaned":
                    break;
                case "x_REF_Cleaned":
                    break;
                case "x_Heating_Cleaned":
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

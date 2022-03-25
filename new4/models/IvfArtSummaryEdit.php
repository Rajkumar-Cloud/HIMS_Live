<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfArtSummaryEdit extends IvfArtSummary
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_art_summary';

    // Page object name
    public $PageObjName = "IvfArtSummaryEdit";

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ivf_art_summary)
        if (!isset($GLOBALS["ivf_art_summary"]) || get_class($GLOBALS["ivf_art_summary"]) == PROJECT_NAMESPACE . "ivf_art_summary") {
            $GLOBALS["ivf_art_summary"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_art_summary');
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
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("ivf_art_summary"));
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
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
                    if ($pageName == "IvfArtSummaryView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $HashValue; // Hash Value
    public $DisplayRecords = 1;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecordCount;

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
        $this->id->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Spermorigin->setVisibility();
        $this->IndicationforART->setVisibility();
        $this->DateofICSI->setVisibility();
        $this->Origin->setVisibility();
        $this->Status->setVisibility();
        $this->Method->setVisibility();
        $this->pre_Concentration->setVisibility();
        $this->pre_Motility->setVisibility();
        $this->pre_Morphology->setVisibility();
        $this->post_Concentration->setVisibility();
        $this->post_Motility->setVisibility();
        $this->post_Morphology->setVisibility();
        $this->NumberofEmbryostransferred->setVisibility();
        $this->Embryosunderobservation->setVisibility();
        $this->EmbryoDevelopmentSummary->setVisibility();
        $this->EmbryologistSignature->setVisibility();
        $this->IVFRegistrationID->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->ICSIDetails->setVisibility();
        $this->DateofET->setVisibility();
        $this->Reasonfornotranfer->setVisibility();
        $this->EmbryosCryopreserved->setVisibility();
        $this->LegendCellStage->setVisibility();
        $this->ConsultantsSignature->setVisibility();
        $this->Name->setVisibility();
        $this->M2->setVisibility();
        $this->Mi2->setVisibility();
        $this->ICSI->setVisibility();
        $this->IVF->setVisibility();
        $this->M1->setVisibility();
        $this->GV->setVisibility();
        $this->_Others->setVisibility();
        $this->Normal2PN->setVisibility();
        $this->Abnormalfertilisation1N->setVisibility();
        $this->Abnormalfertilisation3N->setVisibility();
        $this->NotFertilized->setVisibility();
        $this->Degenerated->setVisibility();
        $this->SpermDate->setVisibility();
        $this->Code1->setVisibility();
        $this->Day1->setVisibility();
        $this->CellStage1->setVisibility();
        $this->Grade1->setVisibility();
        $this->State1->setVisibility();
        $this->Code2->setVisibility();
        $this->Day2->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade2->setVisibility();
        $this->State2->setVisibility();
        $this->Code3->setVisibility();
        $this->Day3->setVisibility();
        $this->CellStage3->setVisibility();
        $this->Grade3->setVisibility();
        $this->State3->setVisibility();
        $this->Code4->setVisibility();
        $this->Day4->setVisibility();
        $this->CellStage4->setVisibility();
        $this->Grade4->setVisibility();
        $this->State4->setVisibility();
        $this->Code5->setVisibility();
        $this->Day5->setVisibility();
        $this->CellStage5->setVisibility();
        $this->Grade5->setVisibility();
        $this->State5->setVisibility();
        $this->TidNo->setVisibility();
        $this->RIDNo->setVisibility();
        $this->Volume->setVisibility();
        $this->Volume1->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total->setVisibility();
        $this->Total1->setVisibility();
        $this->Total2->setVisibility();
        $this->Progressive->setVisibility();
        $this->Progressive1->setVisibility();
        $this->Progressive2->setVisibility();
        $this->NotProgressive->setVisibility();
        $this->NotProgressive1->setVisibility();
        $this->NotProgressive2->setVisibility();
        $this->Motility2->setVisibility();
        $this->Morphology2->setVisibility();
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
        $this->setupLookupOptions($this->ConsultantsSignature);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey(Post($this->OldKeyName), $this->isShow());
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Load recordset
            if ($this->isShow()) {
                // Load current record
                $loaded = $this->loadRow();
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("IvfArtSummaryList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfArtSummaryList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'ARTCycle' first before field var 'x_ARTCycle'
        $val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
        if (!$this->ARTCycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCycle->Visible = false; // Disable update for API request
            } else {
                $this->ARTCycle->setFormValue($val);
            }
        }

        // Check field name 'Spermorigin' first before field var 'x_Spermorigin'
        $val = $CurrentForm->hasValue("Spermorigin") ? $CurrentForm->getValue("Spermorigin") : $CurrentForm->getValue("x_Spermorigin");
        if (!$this->Spermorigin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Spermorigin->Visible = false; // Disable update for API request
            } else {
                $this->Spermorigin->setFormValue($val);
            }
        }

        // Check field name 'IndicationforART' first before field var 'x_IndicationforART'
        $val = $CurrentForm->hasValue("IndicationforART") ? $CurrentForm->getValue("IndicationforART") : $CurrentForm->getValue("x_IndicationforART");
        if (!$this->IndicationforART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IndicationforART->Visible = false; // Disable update for API request
            } else {
                $this->IndicationforART->setFormValue($val);
            }
        }

        // Check field name 'DateofICSI' first before field var 'x_DateofICSI'
        $val = $CurrentForm->hasValue("DateofICSI") ? $CurrentForm->getValue("DateofICSI") : $CurrentForm->getValue("x_DateofICSI");
        if (!$this->DateofICSI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofICSI->Visible = false; // Disable update for API request
            } else {
                $this->DateofICSI->setFormValue($val);
            }
            $this->DateofICSI->CurrentValue = UnFormatDateTime($this->DateofICSI->CurrentValue, 7);
        }

        // Check field name 'Origin' first before field var 'x_Origin'
        $val = $CurrentForm->hasValue("Origin") ? $CurrentForm->getValue("Origin") : $CurrentForm->getValue("x_Origin");
        if (!$this->Origin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Origin->Visible = false; // Disable update for API request
            } else {
                $this->Origin->setFormValue($val);
            }
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
            }
        }

        // Check field name 'pre_Concentration' first before field var 'x_pre_Concentration'
        $val = $CurrentForm->hasValue("pre_Concentration") ? $CurrentForm->getValue("pre_Concentration") : $CurrentForm->getValue("x_pre_Concentration");
        if (!$this->pre_Concentration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pre_Concentration->Visible = false; // Disable update for API request
            } else {
                $this->pre_Concentration->setFormValue($val);
            }
        }

        // Check field name 'pre_Motility' first before field var 'x_pre_Motility'
        $val = $CurrentForm->hasValue("pre_Motility") ? $CurrentForm->getValue("pre_Motility") : $CurrentForm->getValue("x_pre_Motility");
        if (!$this->pre_Motility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pre_Motility->Visible = false; // Disable update for API request
            } else {
                $this->pre_Motility->setFormValue($val);
            }
        }

        // Check field name 'pre_Morphology' first before field var 'x_pre_Morphology'
        $val = $CurrentForm->hasValue("pre_Morphology") ? $CurrentForm->getValue("pre_Morphology") : $CurrentForm->getValue("x_pre_Morphology");
        if (!$this->pre_Morphology->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pre_Morphology->Visible = false; // Disable update for API request
            } else {
                $this->pre_Morphology->setFormValue($val);
            }
        }

        // Check field name 'post_Concentration' first before field var 'x_post_Concentration'
        $val = $CurrentForm->hasValue("post_Concentration") ? $CurrentForm->getValue("post_Concentration") : $CurrentForm->getValue("x_post_Concentration");
        if (!$this->post_Concentration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->post_Concentration->Visible = false; // Disable update for API request
            } else {
                $this->post_Concentration->setFormValue($val);
            }
        }

        // Check field name 'post_Motility' first before field var 'x_post_Motility'
        $val = $CurrentForm->hasValue("post_Motility") ? $CurrentForm->getValue("post_Motility") : $CurrentForm->getValue("x_post_Motility");
        if (!$this->post_Motility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->post_Motility->Visible = false; // Disable update for API request
            } else {
                $this->post_Motility->setFormValue($val);
            }
        }

        // Check field name 'post_Morphology' first before field var 'x_post_Morphology'
        $val = $CurrentForm->hasValue("post_Morphology") ? $CurrentForm->getValue("post_Morphology") : $CurrentForm->getValue("x_post_Morphology");
        if (!$this->post_Morphology->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->post_Morphology->Visible = false; // Disable update for API request
            } else {
                $this->post_Morphology->setFormValue($val);
            }
        }

        // Check field name 'NumberofEmbryostransferred' first before field var 'x_NumberofEmbryostransferred'
        $val = $CurrentForm->hasValue("NumberofEmbryostransferred") ? $CurrentForm->getValue("NumberofEmbryostransferred") : $CurrentForm->getValue("x_NumberofEmbryostransferred");
        if (!$this->NumberofEmbryostransferred->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NumberofEmbryostransferred->Visible = false; // Disable update for API request
            } else {
                $this->NumberofEmbryostransferred->setFormValue($val);
            }
        }

        // Check field name 'Embryosunderobservation' first before field var 'x_Embryosunderobservation'
        $val = $CurrentForm->hasValue("Embryosunderobservation") ? $CurrentForm->getValue("Embryosunderobservation") : $CurrentForm->getValue("x_Embryosunderobservation");
        if (!$this->Embryosunderobservation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Embryosunderobservation->Visible = false; // Disable update for API request
            } else {
                $this->Embryosunderobservation->setFormValue($val);
            }
        }

        // Check field name 'EmbryoDevelopmentSummary' first before field var 'x_EmbryoDevelopmentSummary'
        $val = $CurrentForm->hasValue("EmbryoDevelopmentSummary") ? $CurrentForm->getValue("EmbryoDevelopmentSummary") : $CurrentForm->getValue("x_EmbryoDevelopmentSummary");
        if (!$this->EmbryoDevelopmentSummary->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryoDevelopmentSummary->Visible = false; // Disable update for API request
            } else {
                $this->EmbryoDevelopmentSummary->setFormValue($val);
            }
        }

        // Check field name 'EmbryologistSignature' first before field var 'x_EmbryologistSignature'
        $val = $CurrentForm->hasValue("EmbryologistSignature") ? $CurrentForm->getValue("EmbryologistSignature") : $CurrentForm->getValue("x_EmbryologistSignature");
        if (!$this->EmbryologistSignature->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryologistSignature->Visible = false; // Disable update for API request
            } else {
                $this->EmbryologistSignature->setFormValue($val);
            }
        }

        // Check field name 'IVFRegistrationID' first before field var 'x_IVFRegistrationID'
        $val = $CurrentForm->hasValue("IVFRegistrationID") ? $CurrentForm->getValue("IVFRegistrationID") : $CurrentForm->getValue("x_IVFRegistrationID");
        if (!$this->IVFRegistrationID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IVFRegistrationID->Visible = false; // Disable update for API request
            } else {
                $this->IVFRegistrationID->setFormValue($val);
            }
        }

        // Check field name 'InseminatinTechnique' first before field var 'x_InseminatinTechnique'
        $val = $CurrentForm->hasValue("InseminatinTechnique") ? $CurrentForm->getValue("InseminatinTechnique") : $CurrentForm->getValue("x_InseminatinTechnique");
        if (!$this->InseminatinTechnique->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminatinTechnique->Visible = false; // Disable update for API request
            } else {
                $this->InseminatinTechnique->setFormValue($val);
            }
        }

        // Check field name 'ICSIDetails' first before field var 'x_ICSIDetails'
        $val = $CurrentForm->hasValue("ICSIDetails") ? $CurrentForm->getValue("ICSIDetails") : $CurrentForm->getValue("x_ICSIDetails");
        if (!$this->ICSIDetails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ICSIDetails->Visible = false; // Disable update for API request
            } else {
                $this->ICSIDetails->setFormValue($val);
            }
        }

        // Check field name 'DateofET' first before field var 'x_DateofET'
        $val = $CurrentForm->hasValue("DateofET") ? $CurrentForm->getValue("DateofET") : $CurrentForm->getValue("x_DateofET");
        if (!$this->DateofET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofET->Visible = false; // Disable update for API request
            } else {
                $this->DateofET->setFormValue($val);
            }
        }

        // Check field name 'Reasonfornotranfer' first before field var 'x_Reasonfornotranfer'
        $val = $CurrentForm->hasValue("Reasonfornotranfer") ? $CurrentForm->getValue("Reasonfornotranfer") : $CurrentForm->getValue("x_Reasonfornotranfer");
        if (!$this->Reasonfornotranfer->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reasonfornotranfer->Visible = false; // Disable update for API request
            } else {
                $this->Reasonfornotranfer->setFormValue($val);
            }
        }

        // Check field name 'EmbryosCryopreserved' first before field var 'x_EmbryosCryopreserved'
        $val = $CurrentForm->hasValue("EmbryosCryopreserved") ? $CurrentForm->getValue("EmbryosCryopreserved") : $CurrentForm->getValue("x_EmbryosCryopreserved");
        if (!$this->EmbryosCryopreserved->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryosCryopreserved->Visible = false; // Disable update for API request
            } else {
                $this->EmbryosCryopreserved->setFormValue($val);
            }
        }

        // Check field name 'LegendCellStage' first before field var 'x_LegendCellStage'
        $val = $CurrentForm->hasValue("LegendCellStage") ? $CurrentForm->getValue("LegendCellStage") : $CurrentForm->getValue("x_LegendCellStage");
        if (!$this->LegendCellStage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LegendCellStage->Visible = false; // Disable update for API request
            } else {
                $this->LegendCellStage->setFormValue($val);
            }
        }

        // Check field name 'ConsultantsSignature' first before field var 'x_ConsultantsSignature'
        $val = $CurrentForm->hasValue("ConsultantsSignature") ? $CurrentForm->getValue("ConsultantsSignature") : $CurrentForm->getValue("x_ConsultantsSignature");
        if (!$this->ConsultantsSignature->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ConsultantsSignature->Visible = false; // Disable update for API request
            } else {
                $this->ConsultantsSignature->setFormValue($val);
            }
        }

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
        }

        // Check field name 'M2' first before field var 'x_M2'
        $val = $CurrentForm->hasValue("M2") ? $CurrentForm->getValue("M2") : $CurrentForm->getValue("x_M2");
        if (!$this->M2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->M2->Visible = false; // Disable update for API request
            } else {
                $this->M2->setFormValue($val);
            }
        }

        // Check field name 'Mi2' first before field var 'x_Mi2'
        $val = $CurrentForm->hasValue("Mi2") ? $CurrentForm->getValue("Mi2") : $CurrentForm->getValue("x_Mi2");
        if (!$this->Mi2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mi2->Visible = false; // Disable update for API request
            } else {
                $this->Mi2->setFormValue($val);
            }
        }

        // Check field name 'ICSI' first before field var 'x_ICSI'
        $val = $CurrentForm->hasValue("ICSI") ? $CurrentForm->getValue("ICSI") : $CurrentForm->getValue("x_ICSI");
        if (!$this->ICSI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ICSI->Visible = false; // Disable update for API request
            } else {
                $this->ICSI->setFormValue($val);
            }
        }

        // Check field name 'IVF' first before field var 'x_IVF'
        $val = $CurrentForm->hasValue("IVF") ? $CurrentForm->getValue("IVF") : $CurrentForm->getValue("x_IVF");
        if (!$this->IVF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IVF->Visible = false; // Disable update for API request
            } else {
                $this->IVF->setFormValue($val);
            }
        }

        // Check field name 'M1' first before field var 'x_M1'
        $val = $CurrentForm->hasValue("M1") ? $CurrentForm->getValue("M1") : $CurrentForm->getValue("x_M1");
        if (!$this->M1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->M1->Visible = false; // Disable update for API request
            } else {
                $this->M1->setFormValue($val);
            }
        }

        // Check field name 'GV' first before field var 'x_GV'
        $val = $CurrentForm->hasValue("GV") ? $CurrentForm->getValue("GV") : $CurrentForm->getValue("x_GV");
        if (!$this->GV->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GV->Visible = false; // Disable update for API request
            } else {
                $this->GV->setFormValue($val);
            }
        }

        // Check field name 'Others' first before field var 'x__Others'
        $val = $CurrentForm->hasValue("Others") ? $CurrentForm->getValue("Others") : $CurrentForm->getValue("x__Others");
        if (!$this->_Others->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Others->Visible = false; // Disable update for API request
            } else {
                $this->_Others->setFormValue($val);
            }
        }

        // Check field name 'Normal2PN' first before field var 'x_Normal2PN'
        $val = $CurrentForm->hasValue("Normal2PN") ? $CurrentForm->getValue("Normal2PN") : $CurrentForm->getValue("x_Normal2PN");
        if (!$this->Normal2PN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Normal2PN->Visible = false; // Disable update for API request
            } else {
                $this->Normal2PN->setFormValue($val);
            }
        }

        // Check field name 'Abnormalfertilisation1N' first before field var 'x_Abnormalfertilisation1N'
        $val = $CurrentForm->hasValue("Abnormalfertilisation1N") ? $CurrentForm->getValue("Abnormalfertilisation1N") : $CurrentForm->getValue("x_Abnormalfertilisation1N");
        if (!$this->Abnormalfertilisation1N->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormalfertilisation1N->Visible = false; // Disable update for API request
            } else {
                $this->Abnormalfertilisation1N->setFormValue($val);
            }
        }

        // Check field name 'Abnormalfertilisation3N' first before field var 'x_Abnormalfertilisation3N'
        $val = $CurrentForm->hasValue("Abnormalfertilisation3N") ? $CurrentForm->getValue("Abnormalfertilisation3N") : $CurrentForm->getValue("x_Abnormalfertilisation3N");
        if (!$this->Abnormalfertilisation3N->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormalfertilisation3N->Visible = false; // Disable update for API request
            } else {
                $this->Abnormalfertilisation3N->setFormValue($val);
            }
        }

        // Check field name 'NotFertilized' first before field var 'x_NotFertilized'
        $val = $CurrentForm->hasValue("NotFertilized") ? $CurrentForm->getValue("NotFertilized") : $CurrentForm->getValue("x_NotFertilized");
        if (!$this->NotFertilized->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NotFertilized->Visible = false; // Disable update for API request
            } else {
                $this->NotFertilized->setFormValue($val);
            }
        }

        // Check field name 'Degenerated' first before field var 'x_Degenerated'
        $val = $CurrentForm->hasValue("Degenerated") ? $CurrentForm->getValue("Degenerated") : $CurrentForm->getValue("x_Degenerated");
        if (!$this->Degenerated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Degenerated->Visible = false; // Disable update for API request
            } else {
                $this->Degenerated->setFormValue($val);
            }
        }

        // Check field name 'SpermDate' first before field var 'x_SpermDate'
        $val = $CurrentForm->hasValue("SpermDate") ? $CurrentForm->getValue("SpermDate") : $CurrentForm->getValue("x_SpermDate");
        if (!$this->SpermDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SpermDate->Visible = false; // Disable update for API request
            } else {
                $this->SpermDate->setFormValue($val);
            }
            $this->SpermDate->CurrentValue = UnFormatDateTime($this->SpermDate->CurrentValue, 0);
        }

        // Check field name 'Code1' first before field var 'x_Code1'
        $val = $CurrentForm->hasValue("Code1") ? $CurrentForm->getValue("Code1") : $CurrentForm->getValue("x_Code1");
        if (!$this->Code1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code1->Visible = false; // Disable update for API request
            } else {
                $this->Code1->setFormValue($val);
            }
        }

        // Check field name 'Day1' first before field var 'x_Day1'
        $val = $CurrentForm->hasValue("Day1") ? $CurrentForm->getValue("Day1") : $CurrentForm->getValue("x_Day1");
        if (!$this->Day1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1->Visible = false; // Disable update for API request
            } else {
                $this->Day1->setFormValue($val);
            }
        }

        // Check field name 'CellStage1' first before field var 'x_CellStage1'
        $val = $CurrentForm->hasValue("CellStage1") ? $CurrentForm->getValue("CellStage1") : $CurrentForm->getValue("x_CellStage1");
        if (!$this->CellStage1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage1->Visible = false; // Disable update for API request
            } else {
                $this->CellStage1->setFormValue($val);
            }
        }

        // Check field name 'Grade1' first before field var 'x_Grade1'
        $val = $CurrentForm->hasValue("Grade1") ? $CurrentForm->getValue("Grade1") : $CurrentForm->getValue("x_Grade1");
        if (!$this->Grade1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade1->Visible = false; // Disable update for API request
            } else {
                $this->Grade1->setFormValue($val);
            }
        }

        // Check field name 'State1' first before field var 'x_State1'
        $val = $CurrentForm->hasValue("State1") ? $CurrentForm->getValue("State1") : $CurrentForm->getValue("x_State1");
        if (!$this->State1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State1->Visible = false; // Disable update for API request
            } else {
                $this->State1->setFormValue($val);
            }
        }

        // Check field name 'Code2' first before field var 'x_Code2'
        $val = $CurrentForm->hasValue("Code2") ? $CurrentForm->getValue("Code2") : $CurrentForm->getValue("x_Code2");
        if (!$this->Code2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code2->Visible = false; // Disable update for API request
            } else {
                $this->Code2->setFormValue($val);
            }
        }

        // Check field name 'Day2' first before field var 'x_Day2'
        $val = $CurrentForm->hasValue("Day2") ? $CurrentForm->getValue("Day2") : $CurrentForm->getValue("x_Day2");
        if (!$this->Day2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2->Visible = false; // Disable update for API request
            } else {
                $this->Day2->setFormValue($val);
            }
        }

        // Check field name 'CellStage2' first before field var 'x_CellStage2'
        $val = $CurrentForm->hasValue("CellStage2") ? $CurrentForm->getValue("CellStage2") : $CurrentForm->getValue("x_CellStage2");
        if (!$this->CellStage2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage2->Visible = false; // Disable update for API request
            } else {
                $this->CellStage2->setFormValue($val);
            }
        }

        // Check field name 'Grade2' first before field var 'x_Grade2'
        $val = $CurrentForm->hasValue("Grade2") ? $CurrentForm->getValue("Grade2") : $CurrentForm->getValue("x_Grade2");
        if (!$this->Grade2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade2->Visible = false; // Disable update for API request
            } else {
                $this->Grade2->setFormValue($val);
            }
        }

        // Check field name 'State2' first before field var 'x_State2'
        $val = $CurrentForm->hasValue("State2") ? $CurrentForm->getValue("State2") : $CurrentForm->getValue("x_State2");
        if (!$this->State2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State2->Visible = false; // Disable update for API request
            } else {
                $this->State2->setFormValue($val);
            }
        }

        // Check field name 'Code3' first before field var 'x_Code3'
        $val = $CurrentForm->hasValue("Code3") ? $CurrentForm->getValue("Code3") : $CurrentForm->getValue("x_Code3");
        if (!$this->Code3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code3->Visible = false; // Disable update for API request
            } else {
                $this->Code3->setFormValue($val);
            }
        }

        // Check field name 'Day3' first before field var 'x_Day3'
        $val = $CurrentForm->hasValue("Day3") ? $CurrentForm->getValue("Day3") : $CurrentForm->getValue("x_Day3");
        if (!$this->Day3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3->Visible = false; // Disable update for API request
            } else {
                $this->Day3->setFormValue($val);
            }
        }

        // Check field name 'CellStage3' first before field var 'x_CellStage3'
        $val = $CurrentForm->hasValue("CellStage3") ? $CurrentForm->getValue("CellStage3") : $CurrentForm->getValue("x_CellStage3");
        if (!$this->CellStage3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage3->Visible = false; // Disable update for API request
            } else {
                $this->CellStage3->setFormValue($val);
            }
        }

        // Check field name 'Grade3' first before field var 'x_Grade3'
        $val = $CurrentForm->hasValue("Grade3") ? $CurrentForm->getValue("Grade3") : $CurrentForm->getValue("x_Grade3");
        if (!$this->Grade3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade3->Visible = false; // Disable update for API request
            } else {
                $this->Grade3->setFormValue($val);
            }
        }

        // Check field name 'State3' first before field var 'x_State3'
        $val = $CurrentForm->hasValue("State3") ? $CurrentForm->getValue("State3") : $CurrentForm->getValue("x_State3");
        if (!$this->State3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State3->Visible = false; // Disable update for API request
            } else {
                $this->State3->setFormValue($val);
            }
        }

        // Check field name 'Code4' first before field var 'x_Code4'
        $val = $CurrentForm->hasValue("Code4") ? $CurrentForm->getValue("Code4") : $CurrentForm->getValue("x_Code4");
        if (!$this->Code4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code4->Visible = false; // Disable update for API request
            } else {
                $this->Code4->setFormValue($val);
            }
        }

        // Check field name 'Day4' first before field var 'x_Day4'
        $val = $CurrentForm->hasValue("Day4") ? $CurrentForm->getValue("Day4") : $CurrentForm->getValue("x_Day4");
        if (!$this->Day4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4->Visible = false; // Disable update for API request
            } else {
                $this->Day4->setFormValue($val);
            }
        }

        // Check field name 'CellStage4' first before field var 'x_CellStage4'
        $val = $CurrentForm->hasValue("CellStage4") ? $CurrentForm->getValue("CellStage4") : $CurrentForm->getValue("x_CellStage4");
        if (!$this->CellStage4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage4->Visible = false; // Disable update for API request
            } else {
                $this->CellStage4->setFormValue($val);
            }
        }

        // Check field name 'Grade4' first before field var 'x_Grade4'
        $val = $CurrentForm->hasValue("Grade4") ? $CurrentForm->getValue("Grade4") : $CurrentForm->getValue("x_Grade4");
        if (!$this->Grade4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade4->Visible = false; // Disable update for API request
            } else {
                $this->Grade4->setFormValue($val);
            }
        }

        // Check field name 'State4' first before field var 'x_State4'
        $val = $CurrentForm->hasValue("State4") ? $CurrentForm->getValue("State4") : $CurrentForm->getValue("x_State4");
        if (!$this->State4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State4->Visible = false; // Disable update for API request
            } else {
                $this->State4->setFormValue($val);
            }
        }

        // Check field name 'Code5' first before field var 'x_Code5'
        $val = $CurrentForm->hasValue("Code5") ? $CurrentForm->getValue("Code5") : $CurrentForm->getValue("x_Code5");
        if (!$this->Code5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code5->Visible = false; // Disable update for API request
            } else {
                $this->Code5->setFormValue($val);
            }
        }

        // Check field name 'Day5' first before field var 'x_Day5'
        $val = $CurrentForm->hasValue("Day5") ? $CurrentForm->getValue("Day5") : $CurrentForm->getValue("x_Day5");
        if (!$this->Day5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5->Visible = false; // Disable update for API request
            } else {
                $this->Day5->setFormValue($val);
            }
        }

        // Check field name 'CellStage5' first before field var 'x_CellStage5'
        $val = $CurrentForm->hasValue("CellStage5") ? $CurrentForm->getValue("CellStage5") : $CurrentForm->getValue("x_CellStage5");
        if (!$this->CellStage5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage5->Visible = false; // Disable update for API request
            } else {
                $this->CellStage5->setFormValue($val);
            }
        }

        // Check field name 'Grade5' first before field var 'x_Grade5'
        $val = $CurrentForm->hasValue("Grade5") ? $CurrentForm->getValue("Grade5") : $CurrentForm->getValue("x_Grade5");
        if (!$this->Grade5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade5->Visible = false; // Disable update for API request
            } else {
                $this->Grade5->setFormValue($val);
            }
        }

        // Check field name 'State5' first before field var 'x_State5'
        $val = $CurrentForm->hasValue("State5") ? $CurrentForm->getValue("State5") : $CurrentForm->getValue("x_State5");
        if (!$this->State5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State5->Visible = false; // Disable update for API request
            } else {
                $this->State5->setFormValue($val);
            }
        }

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
            }
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }

        // Check field name 'Volume1' first before field var 'x_Volume1'
        $val = $CurrentForm->hasValue("Volume1") ? $CurrentForm->getValue("Volume1") : $CurrentForm->getValue("x_Volume1");
        if (!$this->Volume1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume1->Visible = false; // Disable update for API request
            } else {
                $this->Volume1->setFormValue($val);
            }
        }

        // Check field name 'Volume2' first before field var 'x_Volume2'
        $val = $CurrentForm->hasValue("Volume2") ? $CurrentForm->getValue("Volume2") : $CurrentForm->getValue("x_Volume2");
        if (!$this->Volume2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume2->Visible = false; // Disable update for API request
            } else {
                $this->Volume2->setFormValue($val);
            }
        }

        // Check field name 'Concentration2' first before field var 'x_Concentration2'
        $val = $CurrentForm->hasValue("Concentration2") ? $CurrentForm->getValue("Concentration2") : $CurrentForm->getValue("x_Concentration2");
        if (!$this->Concentration2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration2->Visible = false; // Disable update for API request
            } else {
                $this->Concentration2->setFormValue($val);
            }
        }

        // Check field name 'Total' first before field var 'x_Total'
        $val = $CurrentForm->hasValue("Total") ? $CurrentForm->getValue("Total") : $CurrentForm->getValue("x_Total");
        if (!$this->Total->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total->Visible = false; // Disable update for API request
            } else {
                $this->Total->setFormValue($val);
            }
        }

        // Check field name 'Total1' first before field var 'x_Total1'
        $val = $CurrentForm->hasValue("Total1") ? $CurrentForm->getValue("Total1") : $CurrentForm->getValue("x_Total1");
        if (!$this->Total1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total1->Visible = false; // Disable update for API request
            } else {
                $this->Total1->setFormValue($val);
            }
        }

        // Check field name 'Total2' first before field var 'x_Total2'
        $val = $CurrentForm->hasValue("Total2") ? $CurrentForm->getValue("Total2") : $CurrentForm->getValue("x_Total2");
        if (!$this->Total2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total2->Visible = false; // Disable update for API request
            } else {
                $this->Total2->setFormValue($val);
            }
        }

        // Check field name 'Progressive' first before field var 'x_Progressive'
        $val = $CurrentForm->hasValue("Progressive") ? $CurrentForm->getValue("Progressive") : $CurrentForm->getValue("x_Progressive");
        if (!$this->Progressive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Progressive->Visible = false; // Disable update for API request
            } else {
                $this->Progressive->setFormValue($val);
            }
        }

        // Check field name 'Progressive1' first before field var 'x_Progressive1'
        $val = $CurrentForm->hasValue("Progressive1") ? $CurrentForm->getValue("Progressive1") : $CurrentForm->getValue("x_Progressive1");
        if (!$this->Progressive1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Progressive1->Visible = false; // Disable update for API request
            } else {
                $this->Progressive1->setFormValue($val);
            }
        }

        // Check field name 'Progressive2' first before field var 'x_Progressive2'
        $val = $CurrentForm->hasValue("Progressive2") ? $CurrentForm->getValue("Progressive2") : $CurrentForm->getValue("x_Progressive2");
        if (!$this->Progressive2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Progressive2->Visible = false; // Disable update for API request
            } else {
                $this->Progressive2->setFormValue($val);
            }
        }

        // Check field name 'NotProgressive' first before field var 'x_NotProgressive'
        $val = $CurrentForm->hasValue("NotProgressive") ? $CurrentForm->getValue("NotProgressive") : $CurrentForm->getValue("x_NotProgressive");
        if (!$this->NotProgressive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NotProgressive->Visible = false; // Disable update for API request
            } else {
                $this->NotProgressive->setFormValue($val);
            }
        }

        // Check field name 'NotProgressive1' first before field var 'x_NotProgressive1'
        $val = $CurrentForm->hasValue("NotProgressive1") ? $CurrentForm->getValue("NotProgressive1") : $CurrentForm->getValue("x_NotProgressive1");
        if (!$this->NotProgressive1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NotProgressive1->Visible = false; // Disable update for API request
            } else {
                $this->NotProgressive1->setFormValue($val);
            }
        }

        // Check field name 'NotProgressive2' first before field var 'x_NotProgressive2'
        $val = $CurrentForm->hasValue("NotProgressive2") ? $CurrentForm->getValue("NotProgressive2") : $CurrentForm->getValue("x_NotProgressive2");
        if (!$this->NotProgressive2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NotProgressive2->Visible = false; // Disable update for API request
            } else {
                $this->NotProgressive2->setFormValue($val);
            }
        }

        // Check field name 'Motility2' first before field var 'x_Motility2'
        $val = $CurrentForm->hasValue("Motility2") ? $CurrentForm->getValue("Motility2") : $CurrentForm->getValue("x_Motility2");
        if (!$this->Motility2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Motility2->Visible = false; // Disable update for API request
            } else {
                $this->Motility2->setFormValue($val);
            }
        }

        // Check field name 'Morphology2' first before field var 'x_Morphology2'
        $val = $CurrentForm->hasValue("Morphology2") ? $CurrentForm->getValue("Morphology2") : $CurrentForm->getValue("x_Morphology2");
        if (!$this->Morphology2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Morphology2->Visible = false; // Disable update for API request
            } else {
                $this->Morphology2->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
        $this->Spermorigin->CurrentValue = $this->Spermorigin->FormValue;
        $this->IndicationforART->CurrentValue = $this->IndicationforART->FormValue;
        $this->DateofICSI->CurrentValue = $this->DateofICSI->FormValue;
        $this->DateofICSI->CurrentValue = UnFormatDateTime($this->DateofICSI->CurrentValue, 7);
        $this->Origin->CurrentValue = $this->Origin->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->pre_Concentration->CurrentValue = $this->pre_Concentration->FormValue;
        $this->pre_Motility->CurrentValue = $this->pre_Motility->FormValue;
        $this->pre_Morphology->CurrentValue = $this->pre_Morphology->FormValue;
        $this->post_Concentration->CurrentValue = $this->post_Concentration->FormValue;
        $this->post_Motility->CurrentValue = $this->post_Motility->FormValue;
        $this->post_Morphology->CurrentValue = $this->post_Morphology->FormValue;
        $this->NumberofEmbryostransferred->CurrentValue = $this->NumberofEmbryostransferred->FormValue;
        $this->Embryosunderobservation->CurrentValue = $this->Embryosunderobservation->FormValue;
        $this->EmbryoDevelopmentSummary->CurrentValue = $this->EmbryoDevelopmentSummary->FormValue;
        $this->EmbryologistSignature->CurrentValue = $this->EmbryologistSignature->FormValue;
        $this->IVFRegistrationID->CurrentValue = $this->IVFRegistrationID->FormValue;
        $this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
        $this->ICSIDetails->CurrentValue = $this->ICSIDetails->FormValue;
        $this->DateofET->CurrentValue = $this->DateofET->FormValue;
        $this->Reasonfornotranfer->CurrentValue = $this->Reasonfornotranfer->FormValue;
        $this->EmbryosCryopreserved->CurrentValue = $this->EmbryosCryopreserved->FormValue;
        $this->LegendCellStage->CurrentValue = $this->LegendCellStage->FormValue;
        $this->ConsultantsSignature->CurrentValue = $this->ConsultantsSignature->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->M2->CurrentValue = $this->M2->FormValue;
        $this->Mi2->CurrentValue = $this->Mi2->FormValue;
        $this->ICSI->CurrentValue = $this->ICSI->FormValue;
        $this->IVF->CurrentValue = $this->IVF->FormValue;
        $this->M1->CurrentValue = $this->M1->FormValue;
        $this->GV->CurrentValue = $this->GV->FormValue;
        $this->_Others->CurrentValue = $this->_Others->FormValue;
        $this->Normal2PN->CurrentValue = $this->Normal2PN->FormValue;
        $this->Abnormalfertilisation1N->CurrentValue = $this->Abnormalfertilisation1N->FormValue;
        $this->Abnormalfertilisation3N->CurrentValue = $this->Abnormalfertilisation3N->FormValue;
        $this->NotFertilized->CurrentValue = $this->NotFertilized->FormValue;
        $this->Degenerated->CurrentValue = $this->Degenerated->FormValue;
        $this->SpermDate->CurrentValue = $this->SpermDate->FormValue;
        $this->SpermDate->CurrentValue = UnFormatDateTime($this->SpermDate->CurrentValue, 0);
        $this->Code1->CurrentValue = $this->Code1->FormValue;
        $this->Day1->CurrentValue = $this->Day1->FormValue;
        $this->CellStage1->CurrentValue = $this->CellStage1->FormValue;
        $this->Grade1->CurrentValue = $this->Grade1->FormValue;
        $this->State1->CurrentValue = $this->State1->FormValue;
        $this->Code2->CurrentValue = $this->Code2->FormValue;
        $this->Day2->CurrentValue = $this->Day2->FormValue;
        $this->CellStage2->CurrentValue = $this->CellStage2->FormValue;
        $this->Grade2->CurrentValue = $this->Grade2->FormValue;
        $this->State2->CurrentValue = $this->State2->FormValue;
        $this->Code3->CurrentValue = $this->Code3->FormValue;
        $this->Day3->CurrentValue = $this->Day3->FormValue;
        $this->CellStage3->CurrentValue = $this->CellStage3->FormValue;
        $this->Grade3->CurrentValue = $this->Grade3->FormValue;
        $this->State3->CurrentValue = $this->State3->FormValue;
        $this->Code4->CurrentValue = $this->Code4->FormValue;
        $this->Day4->CurrentValue = $this->Day4->FormValue;
        $this->CellStage4->CurrentValue = $this->CellStage4->FormValue;
        $this->Grade4->CurrentValue = $this->Grade4->FormValue;
        $this->State4->CurrentValue = $this->State4->FormValue;
        $this->Code5->CurrentValue = $this->Code5->FormValue;
        $this->Day5->CurrentValue = $this->Day5->FormValue;
        $this->CellStage5->CurrentValue = $this->CellStage5->FormValue;
        $this->Grade5->CurrentValue = $this->Grade5->FormValue;
        $this->State5->CurrentValue = $this->State5->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->Volume1->CurrentValue = $this->Volume1->FormValue;
        $this->Volume2->CurrentValue = $this->Volume2->FormValue;
        $this->Concentration2->CurrentValue = $this->Concentration2->FormValue;
        $this->Total->CurrentValue = $this->Total->FormValue;
        $this->Total1->CurrentValue = $this->Total1->FormValue;
        $this->Total2->CurrentValue = $this->Total2->FormValue;
        $this->Progressive->CurrentValue = $this->Progressive->FormValue;
        $this->Progressive1->CurrentValue = $this->Progressive1->FormValue;
        $this->Progressive2->CurrentValue = $this->Progressive2->FormValue;
        $this->NotProgressive->CurrentValue = $this->NotProgressive->FormValue;
        $this->NotProgressive1->CurrentValue = $this->NotProgressive1->FormValue;
        $this->NotProgressive2->CurrentValue = $this->NotProgressive2->FormValue;
        $this->Motility2->CurrentValue = $this->Motility2->FormValue;
        $this->Morphology2->CurrentValue = $this->Morphology2->FormValue;
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
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Spermorigin->setDbValue($row['Spermorigin']);
        $this->IndicationforART->setDbValue($row['IndicationforART']);
        $this->DateofICSI->setDbValue($row['DateofICSI']);
        $this->Origin->setDbValue($row['Origin']);
        $this->Status->setDbValue($row['Status']);
        $this->Method->setDbValue($row['Method']);
        $this->pre_Concentration->setDbValue($row['pre_Concentration']);
        $this->pre_Motility->setDbValue($row['pre_Motility']);
        $this->pre_Morphology->setDbValue($row['pre_Morphology']);
        $this->post_Concentration->setDbValue($row['post_Concentration']);
        $this->post_Motility->setDbValue($row['post_Motility']);
        $this->post_Morphology->setDbValue($row['post_Morphology']);
        $this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
        $this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
        $this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
        $this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
        $this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->ICSIDetails->setDbValue($row['ICSIDetails']);
        $this->DateofET->setDbValue($row['DateofET']);
        $this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
        $this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
        $this->LegendCellStage->setDbValue($row['LegendCellStage']);
        $this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
        $this->Name->setDbValue($row['Name']);
        $this->M2->setDbValue($row['M2']);
        $this->Mi2->setDbValue($row['Mi2']);
        $this->ICSI->setDbValue($row['ICSI']);
        $this->IVF->setDbValue($row['IVF']);
        $this->M1->setDbValue($row['M1']);
        $this->GV->setDbValue($row['GV']);
        $this->_Others->setDbValue($row['Others']);
        $this->Normal2PN->setDbValue($row['Normal2PN']);
        $this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
        $this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
        $this->NotFertilized->setDbValue($row['NotFertilized']);
        $this->Degenerated->setDbValue($row['Degenerated']);
        $this->SpermDate->setDbValue($row['SpermDate']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Day1->setDbValue($row['Day1']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->State1->setDbValue($row['State1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->Day2->setDbValue($row['Day2']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->State2->setDbValue($row['State2']);
        $this->Code3->setDbValue($row['Code3']);
        $this->Day3->setDbValue($row['Day3']);
        $this->CellStage3->setDbValue($row['CellStage3']);
        $this->Grade3->setDbValue($row['Grade3']);
        $this->State3->setDbValue($row['State3']);
        $this->Code4->setDbValue($row['Code4']);
        $this->Day4->setDbValue($row['Day4']);
        $this->CellStage4->setDbValue($row['CellStage4']);
        $this->Grade4->setDbValue($row['Grade4']);
        $this->State4->setDbValue($row['State4']);
        $this->Code5->setDbValue($row['Code5']);
        $this->Day5->setDbValue($row['Day5']);
        $this->CellStage5->setDbValue($row['CellStage5']);
        $this->Grade5->setDbValue($row['Grade5']);
        $this->State5->setDbValue($row['State5']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total->setDbValue($row['Total']);
        $this->Total1->setDbValue($row['Total1']);
        $this->Total2->setDbValue($row['Total2']);
        $this->Progressive->setDbValue($row['Progressive']);
        $this->Progressive1->setDbValue($row['Progressive1']);
        $this->Progressive2->setDbValue($row['Progressive2']);
        $this->NotProgressive->setDbValue($row['NotProgressive']);
        $this->NotProgressive1->setDbValue($row['NotProgressive1']);
        $this->NotProgressive2->setDbValue($row['NotProgressive2']);
        $this->Motility2->setDbValue($row['Motility2']);
        $this->Morphology2->setDbValue($row['Morphology2']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ARTCycle'] = null;
        $row['Spermorigin'] = null;
        $row['IndicationforART'] = null;
        $row['DateofICSI'] = null;
        $row['Origin'] = null;
        $row['Status'] = null;
        $row['Method'] = null;
        $row['pre_Concentration'] = null;
        $row['pre_Motility'] = null;
        $row['pre_Morphology'] = null;
        $row['post_Concentration'] = null;
        $row['post_Motility'] = null;
        $row['post_Morphology'] = null;
        $row['NumberofEmbryostransferred'] = null;
        $row['Embryosunderobservation'] = null;
        $row['EmbryoDevelopmentSummary'] = null;
        $row['EmbryologistSignature'] = null;
        $row['IVFRegistrationID'] = null;
        $row['InseminatinTechnique'] = null;
        $row['ICSIDetails'] = null;
        $row['DateofET'] = null;
        $row['Reasonfornotranfer'] = null;
        $row['EmbryosCryopreserved'] = null;
        $row['LegendCellStage'] = null;
        $row['ConsultantsSignature'] = null;
        $row['Name'] = null;
        $row['M2'] = null;
        $row['Mi2'] = null;
        $row['ICSI'] = null;
        $row['IVF'] = null;
        $row['M1'] = null;
        $row['GV'] = null;
        $row['Others'] = null;
        $row['Normal2PN'] = null;
        $row['Abnormalfertilisation1N'] = null;
        $row['Abnormalfertilisation3N'] = null;
        $row['NotFertilized'] = null;
        $row['Degenerated'] = null;
        $row['SpermDate'] = null;
        $row['Code1'] = null;
        $row['Day1'] = null;
        $row['CellStage1'] = null;
        $row['Grade1'] = null;
        $row['State1'] = null;
        $row['Code2'] = null;
        $row['Day2'] = null;
        $row['CellStage2'] = null;
        $row['Grade2'] = null;
        $row['State2'] = null;
        $row['Code3'] = null;
        $row['Day3'] = null;
        $row['CellStage3'] = null;
        $row['Grade3'] = null;
        $row['State3'] = null;
        $row['Code4'] = null;
        $row['Day4'] = null;
        $row['CellStage4'] = null;
        $row['Grade4'] = null;
        $row['State4'] = null;
        $row['Code5'] = null;
        $row['Day5'] = null;
        $row['CellStage5'] = null;
        $row['Grade5'] = null;
        $row['State5'] = null;
        $row['TidNo'] = null;
        $row['RIDNo'] = null;
        $row['Volume'] = null;
        $row['Volume1'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total'] = null;
        $row['Total1'] = null;
        $row['Total2'] = null;
        $row['Progressive'] = null;
        $row['Progressive1'] = null;
        $row['Progressive2'] = null;
        $row['NotProgressive'] = null;
        $row['NotProgressive1'] = null;
        $row['NotProgressive2'] = null;
        $row['Motility2'] = null;
        $row['Morphology2'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        $this->OldRecordset = null;
        $validKey = $this->OldKey != "";
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
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

        // ARTCycle

        // Spermorigin

        // IndicationforART

        // DateofICSI

        // Origin

        // Status

        // Method

        // pre_Concentration

        // pre_Motility

        // pre_Morphology

        // post_Concentration

        // post_Motility

        // post_Morphology

        // NumberofEmbryostransferred

        // Embryosunderobservation

        // EmbryoDevelopmentSummary

        // EmbryologistSignature

        // IVFRegistrationID

        // InseminatinTechnique

        // ICSIDetails

        // DateofET

        // Reasonfornotranfer

        // EmbryosCryopreserved

        // LegendCellStage

        // ConsultantsSignature

        // Name

        // M2

        // Mi2

        // ICSI

        // IVF

        // M1

        // GV

        // Others

        // Normal2PN

        // Abnormalfertilisation1N

        // Abnormalfertilisation3N

        // NotFertilized

        // Degenerated

        // SpermDate

        // Code1

        // Day1

        // CellStage1

        // Grade1

        // State1

        // Code2

        // Day2

        // CellStage2

        // Grade2

        // State2

        // Code3

        // Day3

        // CellStage3

        // Grade3

        // State3

        // Code4

        // Day4

        // CellStage4

        // Grade4

        // State4

        // Code5

        // Day5

        // CellStage5

        // Grade5

        // State5

        // TidNo

        // RIDNo

        // Volume

        // Volume1

        // Volume2

        // Concentration2

        // Total

        // Total1

        // Total2

        // Progressive

        // Progressive1

        // Progressive2

        // NotProgressive

        // NotProgressive1

        // NotProgressive2

        // Motility2

        // Morphology2
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ARTCycle
            if (strval($this->ARTCycle->CurrentValue) != "") {
                $this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
            } else {
                $this->ARTCycle->ViewValue = null;
            }
            $this->ARTCycle->ViewCustomAttributes = "";

            // Spermorigin
            if (strval($this->Spermorigin->CurrentValue) != "") {
                $this->Spermorigin->ViewValue = $this->Spermorigin->optionCaption($this->Spermorigin->CurrentValue);
            } else {
                $this->Spermorigin->ViewValue = null;
            }
            $this->Spermorigin->ViewCustomAttributes = "";

            // IndicationforART
            $this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
            $this->IndicationforART->ViewCustomAttributes = "";

            // DateofICSI
            $this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
            $this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 7);
            $this->DateofICSI->ViewCustomAttributes = "";

            // Origin
            if (strval($this->Origin->CurrentValue) != "") {
                $this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
            } else {
                $this->Origin->ViewValue = null;
            }
            $this->Origin->ViewCustomAttributes = "";

            // Status
            if (strval($this->Status->CurrentValue) != "") {
                $this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
            } else {
                $this->Status->ViewValue = null;
            }
            $this->Status->ViewCustomAttributes = "";

            // Method
            if (strval($this->Method->CurrentValue) != "") {
                $this->Method->ViewValue = $this->Method->optionCaption($this->Method->CurrentValue);
            } else {
                $this->Method->ViewValue = null;
            }
            $this->Method->ViewCustomAttributes = "";

            // pre_Concentration
            $this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
            $this->pre_Concentration->ViewCustomAttributes = "";

            // pre_Motility
            $this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
            $this->pre_Motility->ViewCustomAttributes = "";

            // pre_Morphology
            $this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
            $this->pre_Morphology->ViewCustomAttributes = "";

            // post_Concentration
            $this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
            $this->post_Concentration->ViewCustomAttributes = "";

            // post_Motility
            $this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
            $this->post_Motility->ViewCustomAttributes = "";

            // post_Morphology
            $this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
            $this->post_Morphology->ViewCustomAttributes = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
            $this->NumberofEmbryostransferred->ViewCustomAttributes = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
            $this->Embryosunderobservation->ViewCustomAttributes = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
            $this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
            $this->EmbryologistSignature->ViewCustomAttributes = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
            $this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
            $this->IVFRegistrationID->ViewCustomAttributes = "";

            // InseminatinTechnique
            if (strval($this->InseminatinTechnique->CurrentValue) != "") {
                $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
            } else {
                $this->InseminatinTechnique->ViewValue = null;
            }
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // ICSIDetails
            $this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
            $this->ICSIDetails->ViewCustomAttributes = "";

            // DateofET
            if (strval($this->DateofET->CurrentValue) != "") {
                $this->DateofET->ViewValue = $this->DateofET->optionCaption($this->DateofET->CurrentValue);
            } else {
                $this->DateofET->ViewValue = null;
            }
            $this->DateofET->ViewCustomAttributes = "";

            // Reasonfornotranfer
            if (strval($this->Reasonfornotranfer->CurrentValue) != "") {
                $this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->optionCaption($this->Reasonfornotranfer->CurrentValue);
            } else {
                $this->Reasonfornotranfer->ViewValue = null;
            }
            $this->Reasonfornotranfer->ViewCustomAttributes = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
            $this->EmbryosCryopreserved->ViewCustomAttributes = "";

            // LegendCellStage
            $this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
            $this->LegendCellStage->ViewCustomAttributes = "";

            // ConsultantsSignature
            $curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
            if ($curVal != "") {
                $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
                if ($this->ConsultantsSignature->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ConsultantsSignature->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ConsultantsSignature->Lookup->renderViewRow($rswrk[0]);
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
                    } else {
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
                    }
                }
            } else {
                $this->ConsultantsSignature->ViewValue = null;
            }
            $this->ConsultantsSignature->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // M2
            $this->M2->ViewValue = $this->M2->CurrentValue;
            $this->M2->ViewCustomAttributes = "";

            // Mi2
            $this->Mi2->ViewValue = $this->Mi2->CurrentValue;
            $this->Mi2->ViewCustomAttributes = "";

            // ICSI
            $this->ICSI->ViewValue = $this->ICSI->CurrentValue;
            $this->ICSI->ViewCustomAttributes = "";

            // IVF
            $this->IVF->ViewValue = $this->IVF->CurrentValue;
            $this->IVF->ViewCustomAttributes = "";

            // M1
            $this->M1->ViewValue = $this->M1->CurrentValue;
            $this->M1->ViewCustomAttributes = "";

            // GV
            $this->GV->ViewValue = $this->GV->CurrentValue;
            $this->GV->ViewCustomAttributes = "";

            // Others
            $this->_Others->ViewValue = $this->_Others->CurrentValue;
            $this->_Others->ViewCustomAttributes = "";

            // Normal2PN
            $this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
            $this->Normal2PN->ViewCustomAttributes = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
            $this->Abnormalfertilisation1N->ViewCustomAttributes = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
            $this->Abnormalfertilisation3N->ViewCustomAttributes = "";

            // NotFertilized
            $this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
            $this->NotFertilized->ViewCustomAttributes = "";

            // Degenerated
            $this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
            $this->Degenerated->ViewCustomAttributes = "";

            // SpermDate
            $this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
            $this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
            $this->SpermDate->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Day1
            if (strval($this->Day1->CurrentValue) != "") {
                $this->Day1->ViewValue = $this->Day1->optionCaption($this->Day1->CurrentValue);
            } else {
                $this->Day1->ViewValue = null;
            }
            $this->Day1->ViewCustomAttributes = "";

            // CellStage1
            if (strval($this->CellStage1->CurrentValue) != "") {
                $this->CellStage1->ViewValue = $this->CellStage1->optionCaption($this->CellStage1->CurrentValue);
            } else {
                $this->CellStage1->ViewValue = null;
            }
            $this->CellStage1->ViewCustomAttributes = "";

            // Grade1
            if (strval($this->Grade1->CurrentValue) != "") {
                $this->Grade1->ViewValue = $this->Grade1->optionCaption($this->Grade1->CurrentValue);
            } else {
                $this->Grade1->ViewValue = null;
            }
            $this->Grade1->ViewCustomAttributes = "";

            // State1
            if (strval($this->State1->CurrentValue) != "") {
                $this->State1->ViewValue = $this->State1->optionCaption($this->State1->CurrentValue);
            } else {
                $this->State1->ViewValue = null;
            }
            $this->State1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // Day2
            if (strval($this->Day2->CurrentValue) != "") {
                $this->Day2->ViewValue = $this->Day2->optionCaption($this->Day2->CurrentValue);
            } else {
                $this->Day2->ViewValue = null;
            }
            $this->Day2->ViewCustomAttributes = "";

            // CellStage2
            if (strval($this->CellStage2->CurrentValue) != "") {
                $this->CellStage2->ViewValue = $this->CellStage2->optionCaption($this->CellStage2->CurrentValue);
            } else {
                $this->CellStage2->ViewValue = null;
            }
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade2
            if (strval($this->Grade2->CurrentValue) != "") {
                $this->Grade2->ViewValue = $this->Grade2->optionCaption($this->Grade2->CurrentValue);
            } else {
                $this->Grade2->ViewValue = null;
            }
            $this->Grade2->ViewCustomAttributes = "";

            // State2
            if (strval($this->State2->CurrentValue) != "") {
                $this->State2->ViewValue = $this->State2->optionCaption($this->State2->CurrentValue);
            } else {
                $this->State2->ViewValue = null;
            }
            $this->State2->ViewCustomAttributes = "";

            // Code3
            $this->Code3->ViewValue = $this->Code3->CurrentValue;
            $this->Code3->ViewCustomAttributes = "";

            // Day3
            if (strval($this->Day3->CurrentValue) != "") {
                $this->Day3->ViewValue = $this->Day3->optionCaption($this->Day3->CurrentValue);
            } else {
                $this->Day3->ViewValue = null;
            }
            $this->Day3->ViewCustomAttributes = "";

            // CellStage3
            if (strval($this->CellStage3->CurrentValue) != "") {
                $this->CellStage3->ViewValue = $this->CellStage3->optionCaption($this->CellStage3->CurrentValue);
            } else {
                $this->CellStage3->ViewValue = null;
            }
            $this->CellStage3->ViewCustomAttributes = "";

            // Grade3
            if (strval($this->Grade3->CurrentValue) != "") {
                $this->Grade3->ViewValue = $this->Grade3->optionCaption($this->Grade3->CurrentValue);
            } else {
                $this->Grade3->ViewValue = null;
            }
            $this->Grade3->ViewCustomAttributes = "";

            // State3
            if (strval($this->State3->CurrentValue) != "") {
                $this->State3->ViewValue = $this->State3->optionCaption($this->State3->CurrentValue);
            } else {
                $this->State3->ViewValue = null;
            }
            $this->State3->ViewCustomAttributes = "";

            // Code4
            $this->Code4->ViewValue = $this->Code4->CurrentValue;
            $this->Code4->ViewCustomAttributes = "";

            // Day4
            if (strval($this->Day4->CurrentValue) != "") {
                $this->Day4->ViewValue = $this->Day4->optionCaption($this->Day4->CurrentValue);
            } else {
                $this->Day4->ViewValue = null;
            }
            $this->Day4->ViewCustomAttributes = "";

            // CellStage4
            if (strval($this->CellStage4->CurrentValue) != "") {
                $this->CellStage4->ViewValue = $this->CellStage4->optionCaption($this->CellStage4->CurrentValue);
            } else {
                $this->CellStage4->ViewValue = null;
            }
            $this->CellStage4->ViewCustomAttributes = "";

            // Grade4
            if (strval($this->Grade4->CurrentValue) != "") {
                $this->Grade4->ViewValue = $this->Grade4->optionCaption($this->Grade4->CurrentValue);
            } else {
                $this->Grade4->ViewValue = null;
            }
            $this->Grade4->ViewCustomAttributes = "";

            // State4
            if (strval($this->State4->CurrentValue) != "") {
                $this->State4->ViewValue = $this->State4->optionCaption($this->State4->CurrentValue);
            } else {
                $this->State4->ViewValue = null;
            }
            $this->State4->ViewCustomAttributes = "";

            // Code5
            $this->Code5->ViewValue = $this->Code5->CurrentValue;
            $this->Code5->ViewCustomAttributes = "";

            // Day5
            if (strval($this->Day5->CurrentValue) != "") {
                $this->Day5->ViewValue = $this->Day5->optionCaption($this->Day5->CurrentValue);
            } else {
                $this->Day5->ViewValue = null;
            }
            $this->Day5->ViewCustomAttributes = "";

            // CellStage5
            if (strval($this->CellStage5->CurrentValue) != "") {
                $this->CellStage5->ViewValue = $this->CellStage5->optionCaption($this->CellStage5->CurrentValue);
            } else {
                $this->CellStage5->ViewValue = null;
            }
            $this->CellStage5->ViewCustomAttributes = "";

            // Grade5
            if (strval($this->Grade5->CurrentValue) != "") {
                $this->Grade5->ViewValue = $this->Grade5->optionCaption($this->Grade5->CurrentValue);
            } else {
                $this->Grade5->ViewValue = null;
            }
            $this->Grade5->ViewCustomAttributes = "";

            // State5
            if (strval($this->State5->CurrentValue) != "") {
                $this->State5->ViewValue = $this->State5->optionCaption($this->State5->CurrentValue);
            } else {
                $this->State5->ViewValue = null;
            }
            $this->State5->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // Progressive
            $this->Progressive->ViewValue = $this->Progressive->CurrentValue;
            $this->Progressive->ViewCustomAttributes = "";

            // Progressive1
            $this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
            $this->Progressive1->ViewCustomAttributes = "";

            // Progressive2
            $this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
            $this->Progressive2->ViewCustomAttributes = "";

            // NotProgressive
            $this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
            $this->NotProgressive->ViewCustomAttributes = "";

            // NotProgressive1
            $this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
            $this->NotProgressive1->ViewCustomAttributes = "";

            // NotProgressive2
            $this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
            $this->NotProgressive2->ViewCustomAttributes = "";

            // Motility2
            $this->Motility2->ViewValue = $this->Motility2->CurrentValue;
            $this->Motility2->ViewCustomAttributes = "";

            // Morphology2
            $this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
            $this->Morphology2->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Spermorigin
            $this->Spermorigin->LinkCustomAttributes = "";
            $this->Spermorigin->HrefValue = "";
            $this->Spermorigin->TooltipValue = "";

            // IndicationforART
            $this->IndicationforART->LinkCustomAttributes = "";
            $this->IndicationforART->HrefValue = "";
            $this->IndicationforART->TooltipValue = "";

            // DateofICSI
            $this->DateofICSI->LinkCustomAttributes = "";
            $this->DateofICSI->HrefValue = "";
            $this->DateofICSI->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // pre_Concentration
            $this->pre_Concentration->LinkCustomAttributes = "";
            $this->pre_Concentration->HrefValue = "";
            $this->pre_Concentration->TooltipValue = "";

            // pre_Motility
            $this->pre_Motility->LinkCustomAttributes = "";
            $this->pre_Motility->HrefValue = "";
            $this->pre_Motility->TooltipValue = "";

            // pre_Morphology
            $this->pre_Morphology->LinkCustomAttributes = "";
            $this->pre_Morphology->HrefValue = "";
            $this->pre_Morphology->TooltipValue = "";

            // post_Concentration
            $this->post_Concentration->LinkCustomAttributes = "";
            $this->post_Concentration->HrefValue = "";
            $this->post_Concentration->TooltipValue = "";

            // post_Motility
            $this->post_Motility->LinkCustomAttributes = "";
            $this->post_Motility->HrefValue = "";
            $this->post_Motility->TooltipValue = "";

            // post_Morphology
            $this->post_Morphology->LinkCustomAttributes = "";
            $this->post_Morphology->HrefValue = "";
            $this->post_Morphology->TooltipValue = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
            $this->NumberofEmbryostransferred->HrefValue = "";
            $this->NumberofEmbryostransferred->TooltipValue = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->LinkCustomAttributes = "";
            $this->Embryosunderobservation->HrefValue = "";
            $this->Embryosunderobservation->TooltipValue = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
            $this->EmbryoDevelopmentSummary->HrefValue = "";
            $this->EmbryoDevelopmentSummary->TooltipValue = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->LinkCustomAttributes = "";
            $this->EmbryologistSignature->HrefValue = "";
            $this->EmbryologistSignature->TooltipValue = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->LinkCustomAttributes = "";
            $this->IVFRegistrationID->HrefValue = "";
            $this->IVFRegistrationID->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // ICSIDetails
            $this->ICSIDetails->LinkCustomAttributes = "";
            $this->ICSIDetails->HrefValue = "";
            $this->ICSIDetails->TooltipValue = "";

            // DateofET
            $this->DateofET->LinkCustomAttributes = "";
            $this->DateofET->HrefValue = "";
            $this->DateofET->TooltipValue = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->LinkCustomAttributes = "";
            $this->Reasonfornotranfer->HrefValue = "";
            $this->Reasonfornotranfer->TooltipValue = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->LinkCustomAttributes = "";
            $this->EmbryosCryopreserved->HrefValue = "";
            $this->EmbryosCryopreserved->TooltipValue = "";

            // LegendCellStage
            $this->LegendCellStage->LinkCustomAttributes = "";
            $this->LegendCellStage->HrefValue = "";
            $this->LegendCellStage->TooltipValue = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->LinkCustomAttributes = "";
            $this->ConsultantsSignature->HrefValue = "";
            $this->ConsultantsSignature->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // M2
            $this->M2->LinkCustomAttributes = "";
            $this->M2->HrefValue = "";
            $this->M2->TooltipValue = "";

            // Mi2
            $this->Mi2->LinkCustomAttributes = "";
            $this->Mi2->HrefValue = "";
            $this->Mi2->TooltipValue = "";

            // ICSI
            $this->ICSI->LinkCustomAttributes = "";
            $this->ICSI->HrefValue = "";
            $this->ICSI->TooltipValue = "";

            // IVF
            $this->IVF->LinkCustomAttributes = "";
            $this->IVF->HrefValue = "";
            $this->IVF->TooltipValue = "";

            // M1
            $this->M1->LinkCustomAttributes = "";
            $this->M1->HrefValue = "";
            $this->M1->TooltipValue = "";

            // GV
            $this->GV->LinkCustomAttributes = "";
            $this->GV->HrefValue = "";
            $this->GV->TooltipValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";
            $this->_Others->TooltipValue = "";

            // Normal2PN
            $this->Normal2PN->LinkCustomAttributes = "";
            $this->Normal2PN->HrefValue = "";
            $this->Normal2PN->TooltipValue = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation1N->HrefValue = "";
            $this->Abnormalfertilisation1N->TooltipValue = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation3N->HrefValue = "";
            $this->Abnormalfertilisation3N->TooltipValue = "";

            // NotFertilized
            $this->NotFertilized->LinkCustomAttributes = "";
            $this->NotFertilized->HrefValue = "";
            $this->NotFertilized->TooltipValue = "";

            // Degenerated
            $this->Degenerated->LinkCustomAttributes = "";
            $this->Degenerated->HrefValue = "";
            $this->Degenerated->TooltipValue = "";

            // SpermDate
            $this->SpermDate->LinkCustomAttributes = "";
            $this->SpermDate->HrefValue = "";
            $this->SpermDate->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Day1
            $this->Day1->LinkCustomAttributes = "";
            $this->Day1->HrefValue = "";
            $this->Day1->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // State1
            $this->State1->LinkCustomAttributes = "";
            $this->State1->HrefValue = "";
            $this->State1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // Day2
            $this->Day2->LinkCustomAttributes = "";
            $this->Day2->HrefValue = "";
            $this->Day2->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // State2
            $this->State2->LinkCustomAttributes = "";
            $this->State2->HrefValue = "";
            $this->State2->TooltipValue = "";

            // Code3
            $this->Code3->LinkCustomAttributes = "";
            $this->Code3->HrefValue = "";
            $this->Code3->TooltipValue = "";

            // Day3
            $this->Day3->LinkCustomAttributes = "";
            $this->Day3->HrefValue = "";
            $this->Day3->TooltipValue = "";

            // CellStage3
            $this->CellStage3->LinkCustomAttributes = "";
            $this->CellStage3->HrefValue = "";
            $this->CellStage3->TooltipValue = "";

            // Grade3
            $this->Grade3->LinkCustomAttributes = "";
            $this->Grade3->HrefValue = "";
            $this->Grade3->TooltipValue = "";

            // State3
            $this->State3->LinkCustomAttributes = "";
            $this->State3->HrefValue = "";
            $this->State3->TooltipValue = "";

            // Code4
            $this->Code4->LinkCustomAttributes = "";
            $this->Code4->HrefValue = "";
            $this->Code4->TooltipValue = "";

            // Day4
            $this->Day4->LinkCustomAttributes = "";
            $this->Day4->HrefValue = "";
            $this->Day4->TooltipValue = "";

            // CellStage4
            $this->CellStage4->LinkCustomAttributes = "";
            $this->CellStage4->HrefValue = "";
            $this->CellStage4->TooltipValue = "";

            // Grade4
            $this->Grade4->LinkCustomAttributes = "";
            $this->Grade4->HrefValue = "";
            $this->Grade4->TooltipValue = "";

            // State4
            $this->State4->LinkCustomAttributes = "";
            $this->State4->HrefValue = "";
            $this->State4->TooltipValue = "";

            // Code5
            $this->Code5->LinkCustomAttributes = "";
            $this->Code5->HrefValue = "";
            $this->Code5->TooltipValue = "";

            // Day5
            $this->Day5->LinkCustomAttributes = "";
            $this->Day5->HrefValue = "";
            $this->Day5->TooltipValue = "";

            // CellStage5
            $this->CellStage5->LinkCustomAttributes = "";
            $this->CellStage5->HrefValue = "";
            $this->CellStage5->TooltipValue = "";

            // Grade5
            $this->Grade5->LinkCustomAttributes = "";
            $this->Grade5->HrefValue = "";
            $this->Grade5->TooltipValue = "";

            // State5
            $this->State5->LinkCustomAttributes = "";
            $this->State5->HrefValue = "";
            $this->State5->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // Progressive
            $this->Progressive->LinkCustomAttributes = "";
            $this->Progressive->HrefValue = "";
            $this->Progressive->TooltipValue = "";

            // Progressive1
            $this->Progressive1->LinkCustomAttributes = "";
            $this->Progressive1->HrefValue = "";
            $this->Progressive1->TooltipValue = "";

            // Progressive2
            $this->Progressive2->LinkCustomAttributes = "";
            $this->Progressive2->HrefValue = "";
            $this->Progressive2->TooltipValue = "";

            // NotProgressive
            $this->NotProgressive->LinkCustomAttributes = "";
            $this->NotProgressive->HrefValue = "";
            $this->NotProgressive->TooltipValue = "";

            // NotProgressive1
            $this->NotProgressive1->LinkCustomAttributes = "";
            $this->NotProgressive1->HrefValue = "";
            $this->NotProgressive1->TooltipValue = "";

            // NotProgressive2
            $this->NotProgressive2->LinkCustomAttributes = "";
            $this->NotProgressive2->HrefValue = "";
            $this->NotProgressive2->TooltipValue = "";

            // Motility2
            $this->Motility2->LinkCustomAttributes = "";
            $this->Motility2->HrefValue = "";
            $this->Motility2->TooltipValue = "";

            // Morphology2
            $this->Morphology2->LinkCustomAttributes = "";
            $this->Morphology2->HrefValue = "";
            $this->Morphology2->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            $this->ARTCycle->EditValue = $this->ARTCycle->options(true);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // Spermorigin
            $this->Spermorigin->EditAttrs["class"] = "form-control";
            $this->Spermorigin->EditCustomAttributes = "";
            $this->Spermorigin->EditValue = $this->Spermorigin->options(true);
            $this->Spermorigin->PlaceHolder = RemoveHtml($this->Spermorigin->caption());

            // IndicationforART
            $this->IndicationforART->EditAttrs["class"] = "form-control";
            $this->IndicationforART->EditCustomAttributes = "";
            if (!$this->IndicationforART->Raw) {
                $this->IndicationforART->CurrentValue = HtmlDecode($this->IndicationforART->CurrentValue);
            }
            $this->IndicationforART->EditValue = HtmlEncode($this->IndicationforART->CurrentValue);
            $this->IndicationforART->PlaceHolder = RemoveHtml($this->IndicationforART->caption());

            // DateofICSI
            $this->DateofICSI->EditAttrs["class"] = "form-control";
            $this->DateofICSI->EditCustomAttributes = "";
            $this->DateofICSI->EditValue = HtmlEncode(FormatDateTime($this->DateofICSI->CurrentValue, 7));
            $this->DateofICSI->PlaceHolder = RemoveHtml($this->DateofICSI->caption());

            // Origin
            $this->Origin->EditAttrs["class"] = "form-control";
            $this->Origin->EditCustomAttributes = "";
            $this->Origin->EditValue = $this->Origin->options(true);
            $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            $this->Status->EditValue = $this->Status->options(true);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            $this->Method->EditValue = $this->Method->options(true);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // pre_Concentration
            $this->pre_Concentration->EditAttrs["class"] = "form-control";
            $this->pre_Concentration->EditCustomAttributes = "";
            if (!$this->pre_Concentration->Raw) {
                $this->pre_Concentration->CurrentValue = HtmlDecode($this->pre_Concentration->CurrentValue);
            }
            $this->pre_Concentration->EditValue = HtmlEncode($this->pre_Concentration->CurrentValue);
            $this->pre_Concentration->PlaceHolder = RemoveHtml($this->pre_Concentration->caption());

            // pre_Motility
            $this->pre_Motility->EditAttrs["class"] = "form-control";
            $this->pre_Motility->EditCustomAttributes = "";
            if (!$this->pre_Motility->Raw) {
                $this->pre_Motility->CurrentValue = HtmlDecode($this->pre_Motility->CurrentValue);
            }
            $this->pre_Motility->EditValue = HtmlEncode($this->pre_Motility->CurrentValue);
            $this->pre_Motility->PlaceHolder = RemoveHtml($this->pre_Motility->caption());

            // pre_Morphology
            $this->pre_Morphology->EditAttrs["class"] = "form-control";
            $this->pre_Morphology->EditCustomAttributes = "";
            if (!$this->pre_Morphology->Raw) {
                $this->pre_Morphology->CurrentValue = HtmlDecode($this->pre_Morphology->CurrentValue);
            }
            $this->pre_Morphology->EditValue = HtmlEncode($this->pre_Morphology->CurrentValue);
            $this->pre_Morphology->PlaceHolder = RemoveHtml($this->pre_Morphology->caption());

            // post_Concentration
            $this->post_Concentration->EditAttrs["class"] = "form-control";
            $this->post_Concentration->EditCustomAttributes = "";
            if (!$this->post_Concentration->Raw) {
                $this->post_Concentration->CurrentValue = HtmlDecode($this->post_Concentration->CurrentValue);
            }
            $this->post_Concentration->EditValue = HtmlEncode($this->post_Concentration->CurrentValue);
            $this->post_Concentration->PlaceHolder = RemoveHtml($this->post_Concentration->caption());

            // post_Motility
            $this->post_Motility->EditAttrs["class"] = "form-control";
            $this->post_Motility->EditCustomAttributes = "";
            if (!$this->post_Motility->Raw) {
                $this->post_Motility->CurrentValue = HtmlDecode($this->post_Motility->CurrentValue);
            }
            $this->post_Motility->EditValue = HtmlEncode($this->post_Motility->CurrentValue);
            $this->post_Motility->PlaceHolder = RemoveHtml($this->post_Motility->caption());

            // post_Morphology
            $this->post_Morphology->EditAttrs["class"] = "form-control";
            $this->post_Morphology->EditCustomAttributes = "";
            if (!$this->post_Morphology->Raw) {
                $this->post_Morphology->CurrentValue = HtmlDecode($this->post_Morphology->CurrentValue);
            }
            $this->post_Morphology->EditValue = HtmlEncode($this->post_Morphology->CurrentValue);
            $this->post_Morphology->PlaceHolder = RemoveHtml($this->post_Morphology->caption());

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->EditAttrs["class"] = "form-control";
            $this->NumberofEmbryostransferred->EditCustomAttributes = "";
            if (!$this->NumberofEmbryostransferred->Raw) {
                $this->NumberofEmbryostransferred->CurrentValue = HtmlDecode($this->NumberofEmbryostransferred->CurrentValue);
            }
            $this->NumberofEmbryostransferred->EditValue = HtmlEncode($this->NumberofEmbryostransferred->CurrentValue);
            $this->NumberofEmbryostransferred->PlaceHolder = RemoveHtml($this->NumberofEmbryostransferred->caption());

            // Embryosunderobservation
            $this->Embryosunderobservation->EditAttrs["class"] = "form-control";
            $this->Embryosunderobservation->EditCustomAttributes = "";
            if (!$this->Embryosunderobservation->Raw) {
                $this->Embryosunderobservation->CurrentValue = HtmlDecode($this->Embryosunderobservation->CurrentValue);
            }
            $this->Embryosunderobservation->EditValue = HtmlEncode($this->Embryosunderobservation->CurrentValue);
            $this->Embryosunderobservation->PlaceHolder = RemoveHtml($this->Embryosunderobservation->caption());

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->EditAttrs["class"] = "form-control";
            $this->EmbryoDevelopmentSummary->EditCustomAttributes = "";
            if (!$this->EmbryoDevelopmentSummary->Raw) {
                $this->EmbryoDevelopmentSummary->CurrentValue = HtmlDecode($this->EmbryoDevelopmentSummary->CurrentValue);
            }
            $this->EmbryoDevelopmentSummary->EditValue = HtmlEncode($this->EmbryoDevelopmentSummary->CurrentValue);
            $this->EmbryoDevelopmentSummary->PlaceHolder = RemoveHtml($this->EmbryoDevelopmentSummary->caption());

            // EmbryologistSignature
            $this->EmbryologistSignature->EditAttrs["class"] = "form-control";
            $this->EmbryologistSignature->EditCustomAttributes = "";
            if (!$this->EmbryologistSignature->Raw) {
                $this->EmbryologistSignature->CurrentValue = HtmlDecode($this->EmbryologistSignature->CurrentValue);
            }
            $this->EmbryologistSignature->EditValue = HtmlEncode($this->EmbryologistSignature->CurrentValue);
            $this->EmbryologistSignature->PlaceHolder = RemoveHtml($this->EmbryologistSignature->caption());

            // IVFRegistrationID
            $this->IVFRegistrationID->EditAttrs["class"] = "form-control";
            $this->IVFRegistrationID->EditCustomAttributes = "";
            $this->IVFRegistrationID->EditValue = HtmlEncode($this->IVFRegistrationID->CurrentValue);
            $this->IVFRegistrationID->PlaceHolder = RemoveHtml($this->IVFRegistrationID->caption());

            // InseminatinTechnique
            $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
            $this->InseminatinTechnique->EditCustomAttributes = "";
            $this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(true);
            $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

            // ICSIDetails
            $this->ICSIDetails->EditAttrs["class"] = "form-control";
            $this->ICSIDetails->EditCustomAttributes = "";
            if (!$this->ICSIDetails->Raw) {
                $this->ICSIDetails->CurrentValue = HtmlDecode($this->ICSIDetails->CurrentValue);
            }
            $this->ICSIDetails->EditValue = HtmlEncode($this->ICSIDetails->CurrentValue);
            $this->ICSIDetails->PlaceHolder = RemoveHtml($this->ICSIDetails->caption());

            // DateofET
            $this->DateofET->EditAttrs["class"] = "form-control";
            $this->DateofET->EditCustomAttributes = "";
            $this->DateofET->EditValue = $this->DateofET->options(true);
            $this->DateofET->PlaceHolder = RemoveHtml($this->DateofET->caption());

            // Reasonfornotranfer
            $this->Reasonfornotranfer->EditAttrs["class"] = "form-control";
            $this->Reasonfornotranfer->EditCustomAttributes = "";
            $this->Reasonfornotranfer->EditValue = $this->Reasonfornotranfer->options(true);
            $this->Reasonfornotranfer->PlaceHolder = RemoveHtml($this->Reasonfornotranfer->caption());

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->EditAttrs["class"] = "form-control";
            $this->EmbryosCryopreserved->EditCustomAttributes = "";
            if (!$this->EmbryosCryopreserved->Raw) {
                $this->EmbryosCryopreserved->CurrentValue = HtmlDecode($this->EmbryosCryopreserved->CurrentValue);
            }
            $this->EmbryosCryopreserved->EditValue = HtmlEncode($this->EmbryosCryopreserved->CurrentValue);
            $this->EmbryosCryopreserved->PlaceHolder = RemoveHtml($this->EmbryosCryopreserved->caption());

            // LegendCellStage
            $this->LegendCellStage->EditAttrs["class"] = "form-control";
            $this->LegendCellStage->EditCustomAttributes = "";
            if (!$this->LegendCellStage->Raw) {
                $this->LegendCellStage->CurrentValue = HtmlDecode($this->LegendCellStage->CurrentValue);
            }
            $this->LegendCellStage->EditValue = HtmlEncode($this->LegendCellStage->CurrentValue);
            $this->LegendCellStage->PlaceHolder = RemoveHtml($this->LegendCellStage->caption());

            // ConsultantsSignature
            $this->ConsultantsSignature->EditCustomAttributes = "";
            $curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
            if ($curVal != "") {
                $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
            } else {
                $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->Lookup !== null && is_array($this->ConsultantsSignature->Lookup->Options) ? $curVal : null;
            }
            if ($this->ConsultantsSignature->ViewValue !== null) { // Load from cache
                $this->ConsultantsSignature->EditValue = array_values($this->ConsultantsSignature->Lookup->Options);
                if ($this->ConsultantsSignature->ViewValue == "") {
                    $this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->ConsultantsSignature->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ConsultantsSignature->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ConsultantsSignature->Lookup->renderViewRow($rswrk[0]);
                    $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
                } else {
                    $this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->ConsultantsSignature->EditValue = $arwrk;
            }
            $this->ConsultantsSignature->PlaceHolder = RemoveHtml($this->ConsultantsSignature->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // M2
            $this->M2->EditAttrs["class"] = "form-control";
            $this->M2->EditCustomAttributes = "";
            if (!$this->M2->Raw) {
                $this->M2->CurrentValue = HtmlDecode($this->M2->CurrentValue);
            }
            $this->M2->EditValue = HtmlEncode($this->M2->CurrentValue);
            $this->M2->PlaceHolder = RemoveHtml($this->M2->caption());

            // Mi2
            $this->Mi2->EditAttrs["class"] = "form-control";
            $this->Mi2->EditCustomAttributes = "";
            if (!$this->Mi2->Raw) {
                $this->Mi2->CurrentValue = HtmlDecode($this->Mi2->CurrentValue);
            }
            $this->Mi2->EditValue = HtmlEncode($this->Mi2->CurrentValue);
            $this->Mi2->PlaceHolder = RemoveHtml($this->Mi2->caption());

            // ICSI
            $this->ICSI->EditAttrs["class"] = "form-control";
            $this->ICSI->EditCustomAttributes = "";
            if (!$this->ICSI->Raw) {
                $this->ICSI->CurrentValue = HtmlDecode($this->ICSI->CurrentValue);
            }
            $this->ICSI->EditValue = HtmlEncode($this->ICSI->CurrentValue);
            $this->ICSI->PlaceHolder = RemoveHtml($this->ICSI->caption());

            // IVF
            $this->IVF->EditAttrs["class"] = "form-control";
            $this->IVF->EditCustomAttributes = "";
            if (!$this->IVF->Raw) {
                $this->IVF->CurrentValue = HtmlDecode($this->IVF->CurrentValue);
            }
            $this->IVF->EditValue = HtmlEncode($this->IVF->CurrentValue);
            $this->IVF->PlaceHolder = RemoveHtml($this->IVF->caption());

            // M1
            $this->M1->EditAttrs["class"] = "form-control";
            $this->M1->EditCustomAttributes = "";
            if (!$this->M1->Raw) {
                $this->M1->CurrentValue = HtmlDecode($this->M1->CurrentValue);
            }
            $this->M1->EditValue = HtmlEncode($this->M1->CurrentValue);
            $this->M1->PlaceHolder = RemoveHtml($this->M1->caption());

            // GV
            $this->GV->EditAttrs["class"] = "form-control";
            $this->GV->EditCustomAttributes = "";
            if (!$this->GV->Raw) {
                $this->GV->CurrentValue = HtmlDecode($this->GV->CurrentValue);
            }
            $this->GV->EditValue = HtmlEncode($this->GV->CurrentValue);
            $this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

            // Others
            $this->_Others->EditAttrs["class"] = "form-control";
            $this->_Others->EditCustomAttributes = "";
            if (!$this->_Others->Raw) {
                $this->_Others->CurrentValue = HtmlDecode($this->_Others->CurrentValue);
            }
            $this->_Others->EditValue = HtmlEncode($this->_Others->CurrentValue);
            $this->_Others->PlaceHolder = RemoveHtml($this->_Others->caption());

            // Normal2PN
            $this->Normal2PN->EditAttrs["class"] = "form-control";
            $this->Normal2PN->EditCustomAttributes = "";
            if (!$this->Normal2PN->Raw) {
                $this->Normal2PN->CurrentValue = HtmlDecode($this->Normal2PN->CurrentValue);
            }
            $this->Normal2PN->EditValue = HtmlEncode($this->Normal2PN->CurrentValue);
            $this->Normal2PN->PlaceHolder = RemoveHtml($this->Normal2PN->caption());

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->EditAttrs["class"] = "form-control";
            $this->Abnormalfertilisation1N->EditCustomAttributes = "";
            if (!$this->Abnormalfertilisation1N->Raw) {
                $this->Abnormalfertilisation1N->CurrentValue = HtmlDecode($this->Abnormalfertilisation1N->CurrentValue);
            }
            $this->Abnormalfertilisation1N->EditValue = HtmlEncode($this->Abnormalfertilisation1N->CurrentValue);
            $this->Abnormalfertilisation1N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation1N->caption());

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->EditAttrs["class"] = "form-control";
            $this->Abnormalfertilisation3N->EditCustomAttributes = "";
            if (!$this->Abnormalfertilisation3N->Raw) {
                $this->Abnormalfertilisation3N->CurrentValue = HtmlDecode($this->Abnormalfertilisation3N->CurrentValue);
            }
            $this->Abnormalfertilisation3N->EditValue = HtmlEncode($this->Abnormalfertilisation3N->CurrentValue);
            $this->Abnormalfertilisation3N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation3N->caption());

            // NotFertilized
            $this->NotFertilized->EditAttrs["class"] = "form-control";
            $this->NotFertilized->EditCustomAttributes = "";
            if (!$this->NotFertilized->Raw) {
                $this->NotFertilized->CurrentValue = HtmlDecode($this->NotFertilized->CurrentValue);
            }
            $this->NotFertilized->EditValue = HtmlEncode($this->NotFertilized->CurrentValue);
            $this->NotFertilized->PlaceHolder = RemoveHtml($this->NotFertilized->caption());

            // Degenerated
            $this->Degenerated->EditAttrs["class"] = "form-control";
            $this->Degenerated->EditCustomAttributes = "";
            if (!$this->Degenerated->Raw) {
                $this->Degenerated->CurrentValue = HtmlDecode($this->Degenerated->CurrentValue);
            }
            $this->Degenerated->EditValue = HtmlEncode($this->Degenerated->CurrentValue);
            $this->Degenerated->PlaceHolder = RemoveHtml($this->Degenerated->caption());

            // SpermDate
            $this->SpermDate->EditAttrs["class"] = "form-control";
            $this->SpermDate->EditCustomAttributes = "";
            $this->SpermDate->EditValue = HtmlEncode(FormatDateTime($this->SpermDate->CurrentValue, 8));
            $this->SpermDate->PlaceHolder = RemoveHtml($this->SpermDate->caption());

            // Code1
            $this->Code1->EditAttrs["class"] = "form-control";
            $this->Code1->EditCustomAttributes = "";
            if (!$this->Code1->Raw) {
                $this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
            }
            $this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
            $this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

            // Day1
            $this->Day1->EditAttrs["class"] = "form-control";
            $this->Day1->EditCustomAttributes = "";
            $this->Day1->EditValue = $this->Day1->options(true);
            $this->Day1->PlaceHolder = RemoveHtml($this->Day1->caption());

            // CellStage1
            $this->CellStage1->EditAttrs["class"] = "form-control";
            $this->CellStage1->EditCustomAttributes = "";
            $this->CellStage1->EditValue = $this->CellStage1->options(true);
            $this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

            // Grade1
            $this->Grade1->EditAttrs["class"] = "form-control";
            $this->Grade1->EditCustomAttributes = "";
            $this->Grade1->EditValue = $this->Grade1->options(true);
            $this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

            // State1
            $this->State1->EditAttrs["class"] = "form-control";
            $this->State1->EditCustomAttributes = "";
            $this->State1->EditValue = $this->State1->options(true);
            $this->State1->PlaceHolder = RemoveHtml($this->State1->caption());

            // Code2
            $this->Code2->EditAttrs["class"] = "form-control";
            $this->Code2->EditCustomAttributes = "";
            if (!$this->Code2->Raw) {
                $this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
            }
            $this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
            $this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

            // Day2
            $this->Day2->EditAttrs["class"] = "form-control";
            $this->Day2->EditCustomAttributes = "";
            $this->Day2->EditValue = $this->Day2->options(true);
            $this->Day2->PlaceHolder = RemoveHtml($this->Day2->caption());

            // CellStage2
            $this->CellStage2->EditAttrs["class"] = "form-control";
            $this->CellStage2->EditCustomAttributes = "";
            $this->CellStage2->EditValue = $this->CellStage2->options(true);
            $this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

            // Grade2
            $this->Grade2->EditAttrs["class"] = "form-control";
            $this->Grade2->EditCustomAttributes = "";
            $this->Grade2->EditValue = $this->Grade2->options(true);
            $this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

            // State2
            $this->State2->EditAttrs["class"] = "form-control";
            $this->State2->EditCustomAttributes = "";
            $this->State2->EditValue = $this->State2->options(true);
            $this->State2->PlaceHolder = RemoveHtml($this->State2->caption());

            // Code3
            $this->Code3->EditAttrs["class"] = "form-control";
            $this->Code3->EditCustomAttributes = "";
            if (!$this->Code3->Raw) {
                $this->Code3->CurrentValue = HtmlDecode($this->Code3->CurrentValue);
            }
            $this->Code3->EditValue = HtmlEncode($this->Code3->CurrentValue);
            $this->Code3->PlaceHolder = RemoveHtml($this->Code3->caption());

            // Day3
            $this->Day3->EditAttrs["class"] = "form-control";
            $this->Day3->EditCustomAttributes = "";
            $this->Day3->EditValue = $this->Day3->options(true);
            $this->Day3->PlaceHolder = RemoveHtml($this->Day3->caption());

            // CellStage3
            $this->CellStage3->EditAttrs["class"] = "form-control";
            $this->CellStage3->EditCustomAttributes = "";
            $this->CellStage3->EditValue = $this->CellStage3->options(true);
            $this->CellStage3->PlaceHolder = RemoveHtml($this->CellStage3->caption());

            // Grade3
            $this->Grade3->EditAttrs["class"] = "form-control";
            $this->Grade3->EditCustomAttributes = "";
            $this->Grade3->EditValue = $this->Grade3->options(true);
            $this->Grade3->PlaceHolder = RemoveHtml($this->Grade3->caption());

            // State3
            $this->State3->EditAttrs["class"] = "form-control";
            $this->State3->EditCustomAttributes = "";
            $this->State3->EditValue = $this->State3->options(true);
            $this->State3->PlaceHolder = RemoveHtml($this->State3->caption());

            // Code4
            $this->Code4->EditAttrs["class"] = "form-control";
            $this->Code4->EditCustomAttributes = "";
            if (!$this->Code4->Raw) {
                $this->Code4->CurrentValue = HtmlDecode($this->Code4->CurrentValue);
            }
            $this->Code4->EditValue = HtmlEncode($this->Code4->CurrentValue);
            $this->Code4->PlaceHolder = RemoveHtml($this->Code4->caption());

            // Day4
            $this->Day4->EditAttrs["class"] = "form-control";
            $this->Day4->EditCustomAttributes = "";
            $this->Day4->EditValue = $this->Day4->options(true);
            $this->Day4->PlaceHolder = RemoveHtml($this->Day4->caption());

            // CellStage4
            $this->CellStage4->EditAttrs["class"] = "form-control";
            $this->CellStage4->EditCustomAttributes = "";
            $this->CellStage4->EditValue = $this->CellStage4->options(true);
            $this->CellStage4->PlaceHolder = RemoveHtml($this->CellStage4->caption());

            // Grade4
            $this->Grade4->EditAttrs["class"] = "form-control";
            $this->Grade4->EditCustomAttributes = "";
            $this->Grade4->EditValue = $this->Grade4->options(true);
            $this->Grade4->PlaceHolder = RemoveHtml($this->Grade4->caption());

            // State4
            $this->State4->EditAttrs["class"] = "form-control";
            $this->State4->EditCustomAttributes = "";
            $this->State4->EditValue = $this->State4->options(true);
            $this->State4->PlaceHolder = RemoveHtml($this->State4->caption());

            // Code5
            $this->Code5->EditAttrs["class"] = "form-control";
            $this->Code5->EditCustomAttributes = "";
            if (!$this->Code5->Raw) {
                $this->Code5->CurrentValue = HtmlDecode($this->Code5->CurrentValue);
            }
            $this->Code5->EditValue = HtmlEncode($this->Code5->CurrentValue);
            $this->Code5->PlaceHolder = RemoveHtml($this->Code5->caption());

            // Day5
            $this->Day5->EditAttrs["class"] = "form-control";
            $this->Day5->EditCustomAttributes = "";
            $this->Day5->EditValue = $this->Day5->options(true);
            $this->Day5->PlaceHolder = RemoveHtml($this->Day5->caption());

            // CellStage5
            $this->CellStage5->EditAttrs["class"] = "form-control";
            $this->CellStage5->EditCustomAttributes = "";
            $this->CellStage5->EditValue = $this->CellStage5->options(true);
            $this->CellStage5->PlaceHolder = RemoveHtml($this->CellStage5->caption());

            // Grade5
            $this->Grade5->EditAttrs["class"] = "form-control";
            $this->Grade5->EditCustomAttributes = "";
            $this->Grade5->EditValue = $this->Grade5->options(true);
            $this->Grade5->PlaceHolder = RemoveHtml($this->Grade5->caption());

            // State5
            $this->State5->EditAttrs["class"] = "form-control";
            $this->State5->EditCustomAttributes = "";
            $this->State5->EditValue = $this->State5->options(true);
            $this->State5->PlaceHolder = RemoveHtml($this->State5->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            if (!$this->Volume->Raw) {
                $this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
            }
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

            // Volume1
            $this->Volume1->EditAttrs["class"] = "form-control";
            $this->Volume1->EditCustomAttributes = "";
            if (!$this->Volume1->Raw) {
                $this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
            }
            $this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
            $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

            // Volume2
            $this->Volume2->EditAttrs["class"] = "form-control";
            $this->Volume2->EditCustomAttributes = "";
            if (!$this->Volume2->Raw) {
                $this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
            }
            $this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
            $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

            // Concentration2
            $this->Concentration2->EditAttrs["class"] = "form-control";
            $this->Concentration2->EditCustomAttributes = "";
            if (!$this->Concentration2->Raw) {
                $this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
            }
            $this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
            $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

            // Total
            $this->Total->EditAttrs["class"] = "form-control";
            $this->Total->EditCustomAttributes = "";
            if (!$this->Total->Raw) {
                $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
            }
            $this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
            $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

            // Total1
            $this->Total1->EditAttrs["class"] = "form-control";
            $this->Total1->EditCustomAttributes = "";
            if (!$this->Total1->Raw) {
                $this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
            }
            $this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
            $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

            // Total2
            $this->Total2->EditAttrs["class"] = "form-control";
            $this->Total2->EditCustomAttributes = "";
            if (!$this->Total2->Raw) {
                $this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
            }
            $this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
            $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

            // Progressive
            $this->Progressive->EditAttrs["class"] = "form-control";
            $this->Progressive->EditCustomAttributes = "";
            if (!$this->Progressive->Raw) {
                $this->Progressive->CurrentValue = HtmlDecode($this->Progressive->CurrentValue);
            }
            $this->Progressive->EditValue = HtmlEncode($this->Progressive->CurrentValue);
            $this->Progressive->PlaceHolder = RemoveHtml($this->Progressive->caption());

            // Progressive1
            $this->Progressive1->EditAttrs["class"] = "form-control";
            $this->Progressive1->EditCustomAttributes = "";
            if (!$this->Progressive1->Raw) {
                $this->Progressive1->CurrentValue = HtmlDecode($this->Progressive1->CurrentValue);
            }
            $this->Progressive1->EditValue = HtmlEncode($this->Progressive1->CurrentValue);
            $this->Progressive1->PlaceHolder = RemoveHtml($this->Progressive1->caption());

            // Progressive2
            $this->Progressive2->EditAttrs["class"] = "form-control";
            $this->Progressive2->EditCustomAttributes = "";
            if (!$this->Progressive2->Raw) {
                $this->Progressive2->CurrentValue = HtmlDecode($this->Progressive2->CurrentValue);
            }
            $this->Progressive2->EditValue = HtmlEncode($this->Progressive2->CurrentValue);
            $this->Progressive2->PlaceHolder = RemoveHtml($this->Progressive2->caption());

            // NotProgressive
            $this->NotProgressive->EditAttrs["class"] = "form-control";
            $this->NotProgressive->EditCustomAttributes = "";
            if (!$this->NotProgressive->Raw) {
                $this->NotProgressive->CurrentValue = HtmlDecode($this->NotProgressive->CurrentValue);
            }
            $this->NotProgressive->EditValue = HtmlEncode($this->NotProgressive->CurrentValue);
            $this->NotProgressive->PlaceHolder = RemoveHtml($this->NotProgressive->caption());

            // NotProgressive1
            $this->NotProgressive1->EditAttrs["class"] = "form-control";
            $this->NotProgressive1->EditCustomAttributes = "";
            if (!$this->NotProgressive1->Raw) {
                $this->NotProgressive1->CurrentValue = HtmlDecode($this->NotProgressive1->CurrentValue);
            }
            $this->NotProgressive1->EditValue = HtmlEncode($this->NotProgressive1->CurrentValue);
            $this->NotProgressive1->PlaceHolder = RemoveHtml($this->NotProgressive1->caption());

            // NotProgressive2
            $this->NotProgressive2->EditAttrs["class"] = "form-control";
            $this->NotProgressive2->EditCustomAttributes = "";
            if (!$this->NotProgressive2->Raw) {
                $this->NotProgressive2->CurrentValue = HtmlDecode($this->NotProgressive2->CurrentValue);
            }
            $this->NotProgressive2->EditValue = HtmlEncode($this->NotProgressive2->CurrentValue);
            $this->NotProgressive2->PlaceHolder = RemoveHtml($this->NotProgressive2->caption());

            // Motility2
            $this->Motility2->EditAttrs["class"] = "form-control";
            $this->Motility2->EditCustomAttributes = "";
            if (!$this->Motility2->Raw) {
                $this->Motility2->CurrentValue = HtmlDecode($this->Motility2->CurrentValue);
            }
            $this->Motility2->EditValue = HtmlEncode($this->Motility2->CurrentValue);
            $this->Motility2->PlaceHolder = RemoveHtml($this->Motility2->caption());

            // Morphology2
            $this->Morphology2->EditAttrs["class"] = "form-control";
            $this->Morphology2->EditCustomAttributes = "";
            if (!$this->Morphology2->Raw) {
                $this->Morphology2->CurrentValue = HtmlDecode($this->Morphology2->CurrentValue);
            }
            $this->Morphology2->EditValue = HtmlEncode($this->Morphology2->CurrentValue);
            $this->Morphology2->PlaceHolder = RemoveHtml($this->Morphology2->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";

            // Spermorigin
            $this->Spermorigin->LinkCustomAttributes = "";
            $this->Spermorigin->HrefValue = "";

            // IndicationforART
            $this->IndicationforART->LinkCustomAttributes = "";
            $this->IndicationforART->HrefValue = "";

            // DateofICSI
            $this->DateofICSI->LinkCustomAttributes = "";
            $this->DateofICSI->HrefValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // pre_Concentration
            $this->pre_Concentration->LinkCustomAttributes = "";
            $this->pre_Concentration->HrefValue = "";

            // pre_Motility
            $this->pre_Motility->LinkCustomAttributes = "";
            $this->pre_Motility->HrefValue = "";

            // pre_Morphology
            $this->pre_Morphology->LinkCustomAttributes = "";
            $this->pre_Morphology->HrefValue = "";

            // post_Concentration
            $this->post_Concentration->LinkCustomAttributes = "";
            $this->post_Concentration->HrefValue = "";

            // post_Motility
            $this->post_Motility->LinkCustomAttributes = "";
            $this->post_Motility->HrefValue = "";

            // post_Morphology
            $this->post_Morphology->LinkCustomAttributes = "";
            $this->post_Morphology->HrefValue = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
            $this->NumberofEmbryostransferred->HrefValue = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->LinkCustomAttributes = "";
            $this->Embryosunderobservation->HrefValue = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
            $this->EmbryoDevelopmentSummary->HrefValue = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->LinkCustomAttributes = "";
            $this->EmbryologistSignature->HrefValue = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->LinkCustomAttributes = "";
            $this->IVFRegistrationID->HrefValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";

            // ICSIDetails
            $this->ICSIDetails->LinkCustomAttributes = "";
            $this->ICSIDetails->HrefValue = "";

            // DateofET
            $this->DateofET->LinkCustomAttributes = "";
            $this->DateofET->HrefValue = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->LinkCustomAttributes = "";
            $this->Reasonfornotranfer->HrefValue = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->LinkCustomAttributes = "";
            $this->EmbryosCryopreserved->HrefValue = "";

            // LegendCellStage
            $this->LegendCellStage->LinkCustomAttributes = "";
            $this->LegendCellStage->HrefValue = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->LinkCustomAttributes = "";
            $this->ConsultantsSignature->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // M2
            $this->M2->LinkCustomAttributes = "";
            $this->M2->HrefValue = "";

            // Mi2
            $this->Mi2->LinkCustomAttributes = "";
            $this->Mi2->HrefValue = "";

            // ICSI
            $this->ICSI->LinkCustomAttributes = "";
            $this->ICSI->HrefValue = "";

            // IVF
            $this->IVF->LinkCustomAttributes = "";
            $this->IVF->HrefValue = "";

            // M1
            $this->M1->LinkCustomAttributes = "";
            $this->M1->HrefValue = "";

            // GV
            $this->GV->LinkCustomAttributes = "";
            $this->GV->HrefValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";

            // Normal2PN
            $this->Normal2PN->LinkCustomAttributes = "";
            $this->Normal2PN->HrefValue = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation1N->HrefValue = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation3N->HrefValue = "";

            // NotFertilized
            $this->NotFertilized->LinkCustomAttributes = "";
            $this->NotFertilized->HrefValue = "";

            // Degenerated
            $this->Degenerated->LinkCustomAttributes = "";
            $this->Degenerated->HrefValue = "";

            // SpermDate
            $this->SpermDate->LinkCustomAttributes = "";
            $this->SpermDate->HrefValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";

            // Day1
            $this->Day1->LinkCustomAttributes = "";
            $this->Day1->HrefValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";

            // State1
            $this->State1->LinkCustomAttributes = "";
            $this->State1->HrefValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";

            // Day2
            $this->Day2->LinkCustomAttributes = "";
            $this->Day2->HrefValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";

            // State2
            $this->State2->LinkCustomAttributes = "";
            $this->State2->HrefValue = "";

            // Code3
            $this->Code3->LinkCustomAttributes = "";
            $this->Code3->HrefValue = "";

            // Day3
            $this->Day3->LinkCustomAttributes = "";
            $this->Day3->HrefValue = "";

            // CellStage3
            $this->CellStage3->LinkCustomAttributes = "";
            $this->CellStage3->HrefValue = "";

            // Grade3
            $this->Grade3->LinkCustomAttributes = "";
            $this->Grade3->HrefValue = "";

            // State3
            $this->State3->LinkCustomAttributes = "";
            $this->State3->HrefValue = "";

            // Code4
            $this->Code4->LinkCustomAttributes = "";
            $this->Code4->HrefValue = "";

            // Day4
            $this->Day4->LinkCustomAttributes = "";
            $this->Day4->HrefValue = "";

            // CellStage4
            $this->CellStage4->LinkCustomAttributes = "";
            $this->CellStage4->HrefValue = "";

            // Grade4
            $this->Grade4->LinkCustomAttributes = "";
            $this->Grade4->HrefValue = "";

            // State4
            $this->State4->LinkCustomAttributes = "";
            $this->State4->HrefValue = "";

            // Code5
            $this->Code5->LinkCustomAttributes = "";
            $this->Code5->HrefValue = "";

            // Day5
            $this->Day5->LinkCustomAttributes = "";
            $this->Day5->HrefValue = "";

            // CellStage5
            $this->CellStage5->LinkCustomAttributes = "";
            $this->CellStage5->HrefValue = "";

            // Grade5
            $this->Grade5->LinkCustomAttributes = "";
            $this->Grade5->HrefValue = "";

            // State5
            $this->State5->LinkCustomAttributes = "";
            $this->State5->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";

            // Progressive
            $this->Progressive->LinkCustomAttributes = "";
            $this->Progressive->HrefValue = "";

            // Progressive1
            $this->Progressive1->LinkCustomAttributes = "";
            $this->Progressive1->HrefValue = "";

            // Progressive2
            $this->Progressive2->LinkCustomAttributes = "";
            $this->Progressive2->HrefValue = "";

            // NotProgressive
            $this->NotProgressive->LinkCustomAttributes = "";
            $this->NotProgressive->HrefValue = "";

            // NotProgressive1
            $this->NotProgressive1->LinkCustomAttributes = "";
            $this->NotProgressive1->HrefValue = "";

            // NotProgressive2
            $this->NotProgressive2->LinkCustomAttributes = "";
            $this->NotProgressive2->HrefValue = "";

            // Motility2
            $this->Motility2->LinkCustomAttributes = "";
            $this->Motility2->HrefValue = "";

            // Morphology2
            $this->Morphology2->LinkCustomAttributes = "";
            $this->Morphology2->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->ARTCycle->Required) {
            if (!$this->ARTCycle->IsDetailKey && EmptyValue($this->ARTCycle->FormValue)) {
                $this->ARTCycle->addErrorMessage(str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
            }
        }
        if ($this->Spermorigin->Required) {
            if (!$this->Spermorigin->IsDetailKey && EmptyValue($this->Spermorigin->FormValue)) {
                $this->Spermorigin->addErrorMessage(str_replace("%s", $this->Spermorigin->caption(), $this->Spermorigin->RequiredErrorMessage));
            }
        }
        if ($this->IndicationforART->Required) {
            if (!$this->IndicationforART->IsDetailKey && EmptyValue($this->IndicationforART->FormValue)) {
                $this->IndicationforART->addErrorMessage(str_replace("%s", $this->IndicationforART->caption(), $this->IndicationforART->RequiredErrorMessage));
            }
        }
        if ($this->DateofICSI->Required) {
            if (!$this->DateofICSI->IsDetailKey && EmptyValue($this->DateofICSI->FormValue)) {
                $this->DateofICSI->addErrorMessage(str_replace("%s", $this->DateofICSI->caption(), $this->DateofICSI->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DateofICSI->FormValue)) {
            $this->DateofICSI->addErrorMessage($this->DateofICSI->getErrorMessage(false));
        }
        if ($this->Origin->Required) {
            if (!$this->Origin->IsDetailKey && EmptyValue($this->Origin->FormValue)) {
                $this->Origin->addErrorMessage(str_replace("%s", $this->Origin->caption(), $this->Origin->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
            }
        }
        if ($this->pre_Concentration->Required) {
            if (!$this->pre_Concentration->IsDetailKey && EmptyValue($this->pre_Concentration->FormValue)) {
                $this->pre_Concentration->addErrorMessage(str_replace("%s", $this->pre_Concentration->caption(), $this->pre_Concentration->RequiredErrorMessage));
            }
        }
        if ($this->pre_Motility->Required) {
            if (!$this->pre_Motility->IsDetailKey && EmptyValue($this->pre_Motility->FormValue)) {
                $this->pre_Motility->addErrorMessage(str_replace("%s", $this->pre_Motility->caption(), $this->pre_Motility->RequiredErrorMessage));
            }
        }
        if ($this->pre_Morphology->Required) {
            if (!$this->pre_Morphology->IsDetailKey && EmptyValue($this->pre_Morphology->FormValue)) {
                $this->pre_Morphology->addErrorMessage(str_replace("%s", $this->pre_Morphology->caption(), $this->pre_Morphology->RequiredErrorMessage));
            }
        }
        if ($this->post_Concentration->Required) {
            if (!$this->post_Concentration->IsDetailKey && EmptyValue($this->post_Concentration->FormValue)) {
                $this->post_Concentration->addErrorMessage(str_replace("%s", $this->post_Concentration->caption(), $this->post_Concentration->RequiredErrorMessage));
            }
        }
        if ($this->post_Motility->Required) {
            if (!$this->post_Motility->IsDetailKey && EmptyValue($this->post_Motility->FormValue)) {
                $this->post_Motility->addErrorMessage(str_replace("%s", $this->post_Motility->caption(), $this->post_Motility->RequiredErrorMessage));
            }
        }
        if ($this->post_Morphology->Required) {
            if (!$this->post_Morphology->IsDetailKey && EmptyValue($this->post_Morphology->FormValue)) {
                $this->post_Morphology->addErrorMessage(str_replace("%s", $this->post_Morphology->caption(), $this->post_Morphology->RequiredErrorMessage));
            }
        }
        if ($this->NumberofEmbryostransferred->Required) {
            if (!$this->NumberofEmbryostransferred->IsDetailKey && EmptyValue($this->NumberofEmbryostransferred->FormValue)) {
                $this->NumberofEmbryostransferred->addErrorMessage(str_replace("%s", $this->NumberofEmbryostransferred->caption(), $this->NumberofEmbryostransferred->RequiredErrorMessage));
            }
        }
        if ($this->Embryosunderobservation->Required) {
            if (!$this->Embryosunderobservation->IsDetailKey && EmptyValue($this->Embryosunderobservation->FormValue)) {
                $this->Embryosunderobservation->addErrorMessage(str_replace("%s", $this->Embryosunderobservation->caption(), $this->Embryosunderobservation->RequiredErrorMessage));
            }
        }
        if ($this->EmbryoDevelopmentSummary->Required) {
            if (!$this->EmbryoDevelopmentSummary->IsDetailKey && EmptyValue($this->EmbryoDevelopmentSummary->FormValue)) {
                $this->EmbryoDevelopmentSummary->addErrorMessage(str_replace("%s", $this->EmbryoDevelopmentSummary->caption(), $this->EmbryoDevelopmentSummary->RequiredErrorMessage));
            }
        }
        if ($this->EmbryologistSignature->Required) {
            if (!$this->EmbryologistSignature->IsDetailKey && EmptyValue($this->EmbryologistSignature->FormValue)) {
                $this->EmbryologistSignature->addErrorMessage(str_replace("%s", $this->EmbryologistSignature->caption(), $this->EmbryologistSignature->RequiredErrorMessage));
            }
        }
        if ($this->IVFRegistrationID->Required) {
            if (!$this->IVFRegistrationID->IsDetailKey && EmptyValue($this->IVFRegistrationID->FormValue)) {
                $this->IVFRegistrationID->addErrorMessage(str_replace("%s", $this->IVFRegistrationID->caption(), $this->IVFRegistrationID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IVFRegistrationID->FormValue)) {
            $this->IVFRegistrationID->addErrorMessage($this->IVFRegistrationID->getErrorMessage(false));
        }
        if ($this->InseminatinTechnique->Required) {
            if (!$this->InseminatinTechnique->IsDetailKey && EmptyValue($this->InseminatinTechnique->FormValue)) {
                $this->InseminatinTechnique->addErrorMessage(str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
            }
        }
        if ($this->ICSIDetails->Required) {
            if (!$this->ICSIDetails->IsDetailKey && EmptyValue($this->ICSIDetails->FormValue)) {
                $this->ICSIDetails->addErrorMessage(str_replace("%s", $this->ICSIDetails->caption(), $this->ICSIDetails->RequiredErrorMessage));
            }
        }
        if ($this->DateofET->Required) {
            if (!$this->DateofET->IsDetailKey && EmptyValue($this->DateofET->FormValue)) {
                $this->DateofET->addErrorMessage(str_replace("%s", $this->DateofET->caption(), $this->DateofET->RequiredErrorMessage));
            }
        }
        if ($this->Reasonfornotranfer->Required) {
            if (!$this->Reasonfornotranfer->IsDetailKey && EmptyValue($this->Reasonfornotranfer->FormValue)) {
                $this->Reasonfornotranfer->addErrorMessage(str_replace("%s", $this->Reasonfornotranfer->caption(), $this->Reasonfornotranfer->RequiredErrorMessage));
            }
        }
        if ($this->EmbryosCryopreserved->Required) {
            if (!$this->EmbryosCryopreserved->IsDetailKey && EmptyValue($this->EmbryosCryopreserved->FormValue)) {
                $this->EmbryosCryopreserved->addErrorMessage(str_replace("%s", $this->EmbryosCryopreserved->caption(), $this->EmbryosCryopreserved->RequiredErrorMessage));
            }
        }
        if ($this->LegendCellStage->Required) {
            if (!$this->LegendCellStage->IsDetailKey && EmptyValue($this->LegendCellStage->FormValue)) {
                $this->LegendCellStage->addErrorMessage(str_replace("%s", $this->LegendCellStage->caption(), $this->LegendCellStage->RequiredErrorMessage));
            }
        }
        if ($this->ConsultantsSignature->Required) {
            if (!$this->ConsultantsSignature->IsDetailKey && EmptyValue($this->ConsultantsSignature->FormValue)) {
                $this->ConsultantsSignature->addErrorMessage(str_replace("%s", $this->ConsultantsSignature->caption(), $this->ConsultantsSignature->RequiredErrorMessage));
            }
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->M2->Required) {
            if (!$this->M2->IsDetailKey && EmptyValue($this->M2->FormValue)) {
                $this->M2->addErrorMessage(str_replace("%s", $this->M2->caption(), $this->M2->RequiredErrorMessage));
            }
        }
        if ($this->Mi2->Required) {
            if (!$this->Mi2->IsDetailKey && EmptyValue($this->Mi2->FormValue)) {
                $this->Mi2->addErrorMessage(str_replace("%s", $this->Mi2->caption(), $this->Mi2->RequiredErrorMessage));
            }
        }
        if ($this->ICSI->Required) {
            if (!$this->ICSI->IsDetailKey && EmptyValue($this->ICSI->FormValue)) {
                $this->ICSI->addErrorMessage(str_replace("%s", $this->ICSI->caption(), $this->ICSI->RequiredErrorMessage));
            }
        }
        if ($this->IVF->Required) {
            if (!$this->IVF->IsDetailKey && EmptyValue($this->IVF->FormValue)) {
                $this->IVF->addErrorMessage(str_replace("%s", $this->IVF->caption(), $this->IVF->RequiredErrorMessage));
            }
        }
        if ($this->M1->Required) {
            if (!$this->M1->IsDetailKey && EmptyValue($this->M1->FormValue)) {
                $this->M1->addErrorMessage(str_replace("%s", $this->M1->caption(), $this->M1->RequiredErrorMessage));
            }
        }
        if ($this->GV->Required) {
            if (!$this->GV->IsDetailKey && EmptyValue($this->GV->FormValue)) {
                $this->GV->addErrorMessage(str_replace("%s", $this->GV->caption(), $this->GV->RequiredErrorMessage));
            }
        }
        if ($this->_Others->Required) {
            if (!$this->_Others->IsDetailKey && EmptyValue($this->_Others->FormValue)) {
                $this->_Others->addErrorMessage(str_replace("%s", $this->_Others->caption(), $this->_Others->RequiredErrorMessage));
            }
        }
        if ($this->Normal2PN->Required) {
            if (!$this->Normal2PN->IsDetailKey && EmptyValue($this->Normal2PN->FormValue)) {
                $this->Normal2PN->addErrorMessage(str_replace("%s", $this->Normal2PN->caption(), $this->Normal2PN->RequiredErrorMessage));
            }
        }
        if ($this->Abnormalfertilisation1N->Required) {
            if (!$this->Abnormalfertilisation1N->IsDetailKey && EmptyValue($this->Abnormalfertilisation1N->FormValue)) {
                $this->Abnormalfertilisation1N->addErrorMessage(str_replace("%s", $this->Abnormalfertilisation1N->caption(), $this->Abnormalfertilisation1N->RequiredErrorMessage));
            }
        }
        if ($this->Abnormalfertilisation3N->Required) {
            if (!$this->Abnormalfertilisation3N->IsDetailKey && EmptyValue($this->Abnormalfertilisation3N->FormValue)) {
                $this->Abnormalfertilisation3N->addErrorMessage(str_replace("%s", $this->Abnormalfertilisation3N->caption(), $this->Abnormalfertilisation3N->RequiredErrorMessage));
            }
        }
        if ($this->NotFertilized->Required) {
            if (!$this->NotFertilized->IsDetailKey && EmptyValue($this->NotFertilized->FormValue)) {
                $this->NotFertilized->addErrorMessage(str_replace("%s", $this->NotFertilized->caption(), $this->NotFertilized->RequiredErrorMessage));
            }
        }
        if ($this->Degenerated->Required) {
            if (!$this->Degenerated->IsDetailKey && EmptyValue($this->Degenerated->FormValue)) {
                $this->Degenerated->addErrorMessage(str_replace("%s", $this->Degenerated->caption(), $this->Degenerated->RequiredErrorMessage));
            }
        }
        if ($this->SpermDate->Required) {
            if (!$this->SpermDate->IsDetailKey && EmptyValue($this->SpermDate->FormValue)) {
                $this->SpermDate->addErrorMessage(str_replace("%s", $this->SpermDate->caption(), $this->SpermDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SpermDate->FormValue)) {
            $this->SpermDate->addErrorMessage($this->SpermDate->getErrorMessage(false));
        }
        if ($this->Code1->Required) {
            if (!$this->Code1->IsDetailKey && EmptyValue($this->Code1->FormValue)) {
                $this->Code1->addErrorMessage(str_replace("%s", $this->Code1->caption(), $this->Code1->RequiredErrorMessage));
            }
        }
        if ($this->Day1->Required) {
            if (!$this->Day1->IsDetailKey && EmptyValue($this->Day1->FormValue)) {
                $this->Day1->addErrorMessage(str_replace("%s", $this->Day1->caption(), $this->Day1->RequiredErrorMessage));
            }
        }
        if ($this->CellStage1->Required) {
            if (!$this->CellStage1->IsDetailKey && EmptyValue($this->CellStage1->FormValue)) {
                $this->CellStage1->addErrorMessage(str_replace("%s", $this->CellStage1->caption(), $this->CellStage1->RequiredErrorMessage));
            }
        }
        if ($this->Grade1->Required) {
            if (!$this->Grade1->IsDetailKey && EmptyValue($this->Grade1->FormValue)) {
                $this->Grade1->addErrorMessage(str_replace("%s", $this->Grade1->caption(), $this->Grade1->RequiredErrorMessage));
            }
        }
        if ($this->State1->Required) {
            if (!$this->State1->IsDetailKey && EmptyValue($this->State1->FormValue)) {
                $this->State1->addErrorMessage(str_replace("%s", $this->State1->caption(), $this->State1->RequiredErrorMessage));
            }
        }
        if ($this->Code2->Required) {
            if (!$this->Code2->IsDetailKey && EmptyValue($this->Code2->FormValue)) {
                $this->Code2->addErrorMessage(str_replace("%s", $this->Code2->caption(), $this->Code2->RequiredErrorMessage));
            }
        }
        if ($this->Day2->Required) {
            if (!$this->Day2->IsDetailKey && EmptyValue($this->Day2->FormValue)) {
                $this->Day2->addErrorMessage(str_replace("%s", $this->Day2->caption(), $this->Day2->RequiredErrorMessage));
            }
        }
        if ($this->CellStage2->Required) {
            if (!$this->CellStage2->IsDetailKey && EmptyValue($this->CellStage2->FormValue)) {
                $this->CellStage2->addErrorMessage(str_replace("%s", $this->CellStage2->caption(), $this->CellStage2->RequiredErrorMessage));
            }
        }
        if ($this->Grade2->Required) {
            if (!$this->Grade2->IsDetailKey && EmptyValue($this->Grade2->FormValue)) {
                $this->Grade2->addErrorMessage(str_replace("%s", $this->Grade2->caption(), $this->Grade2->RequiredErrorMessage));
            }
        }
        if ($this->State2->Required) {
            if (!$this->State2->IsDetailKey && EmptyValue($this->State2->FormValue)) {
                $this->State2->addErrorMessage(str_replace("%s", $this->State2->caption(), $this->State2->RequiredErrorMessage));
            }
        }
        if ($this->Code3->Required) {
            if (!$this->Code3->IsDetailKey && EmptyValue($this->Code3->FormValue)) {
                $this->Code3->addErrorMessage(str_replace("%s", $this->Code3->caption(), $this->Code3->RequiredErrorMessage));
            }
        }
        if ($this->Day3->Required) {
            if (!$this->Day3->IsDetailKey && EmptyValue($this->Day3->FormValue)) {
                $this->Day3->addErrorMessage(str_replace("%s", $this->Day3->caption(), $this->Day3->RequiredErrorMessage));
            }
        }
        if ($this->CellStage3->Required) {
            if (!$this->CellStage3->IsDetailKey && EmptyValue($this->CellStage3->FormValue)) {
                $this->CellStage3->addErrorMessage(str_replace("%s", $this->CellStage3->caption(), $this->CellStage3->RequiredErrorMessage));
            }
        }
        if ($this->Grade3->Required) {
            if (!$this->Grade3->IsDetailKey && EmptyValue($this->Grade3->FormValue)) {
                $this->Grade3->addErrorMessage(str_replace("%s", $this->Grade3->caption(), $this->Grade3->RequiredErrorMessage));
            }
        }
        if ($this->State3->Required) {
            if (!$this->State3->IsDetailKey && EmptyValue($this->State3->FormValue)) {
                $this->State3->addErrorMessage(str_replace("%s", $this->State3->caption(), $this->State3->RequiredErrorMessage));
            }
        }
        if ($this->Code4->Required) {
            if (!$this->Code4->IsDetailKey && EmptyValue($this->Code4->FormValue)) {
                $this->Code4->addErrorMessage(str_replace("%s", $this->Code4->caption(), $this->Code4->RequiredErrorMessage));
            }
        }
        if ($this->Day4->Required) {
            if (!$this->Day4->IsDetailKey && EmptyValue($this->Day4->FormValue)) {
                $this->Day4->addErrorMessage(str_replace("%s", $this->Day4->caption(), $this->Day4->RequiredErrorMessage));
            }
        }
        if ($this->CellStage4->Required) {
            if (!$this->CellStage4->IsDetailKey && EmptyValue($this->CellStage4->FormValue)) {
                $this->CellStage4->addErrorMessage(str_replace("%s", $this->CellStage4->caption(), $this->CellStage4->RequiredErrorMessage));
            }
        }
        if ($this->Grade4->Required) {
            if (!$this->Grade4->IsDetailKey && EmptyValue($this->Grade4->FormValue)) {
                $this->Grade4->addErrorMessage(str_replace("%s", $this->Grade4->caption(), $this->Grade4->RequiredErrorMessage));
            }
        }
        if ($this->State4->Required) {
            if (!$this->State4->IsDetailKey && EmptyValue($this->State4->FormValue)) {
                $this->State4->addErrorMessage(str_replace("%s", $this->State4->caption(), $this->State4->RequiredErrorMessage));
            }
        }
        if ($this->Code5->Required) {
            if (!$this->Code5->IsDetailKey && EmptyValue($this->Code5->FormValue)) {
                $this->Code5->addErrorMessage(str_replace("%s", $this->Code5->caption(), $this->Code5->RequiredErrorMessage));
            }
        }
        if ($this->Day5->Required) {
            if (!$this->Day5->IsDetailKey && EmptyValue($this->Day5->FormValue)) {
                $this->Day5->addErrorMessage(str_replace("%s", $this->Day5->caption(), $this->Day5->RequiredErrorMessage));
            }
        }
        if ($this->CellStage5->Required) {
            if (!$this->CellStage5->IsDetailKey && EmptyValue($this->CellStage5->FormValue)) {
                $this->CellStage5->addErrorMessage(str_replace("%s", $this->CellStage5->caption(), $this->CellStage5->RequiredErrorMessage));
            }
        }
        if ($this->Grade5->Required) {
            if (!$this->Grade5->IsDetailKey && EmptyValue($this->Grade5->FormValue)) {
                $this->Grade5->addErrorMessage(str_replace("%s", $this->Grade5->caption(), $this->Grade5->RequiredErrorMessage));
            }
        }
        if ($this->State5->Required) {
            if (!$this->State5->IsDetailKey && EmptyValue($this->State5->FormValue)) {
                $this->State5->addErrorMessage(str_replace("%s", $this->State5->caption(), $this->State5->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if ($this->Volume1->Required) {
            if (!$this->Volume1->IsDetailKey && EmptyValue($this->Volume1->FormValue)) {
                $this->Volume1->addErrorMessage(str_replace("%s", $this->Volume1->caption(), $this->Volume1->RequiredErrorMessage));
            }
        }
        if ($this->Volume2->Required) {
            if (!$this->Volume2->IsDetailKey && EmptyValue($this->Volume2->FormValue)) {
                $this->Volume2->addErrorMessage(str_replace("%s", $this->Volume2->caption(), $this->Volume2->RequiredErrorMessage));
            }
        }
        if ($this->Concentration2->Required) {
            if (!$this->Concentration2->IsDetailKey && EmptyValue($this->Concentration2->FormValue)) {
                $this->Concentration2->addErrorMessage(str_replace("%s", $this->Concentration2->caption(), $this->Concentration2->RequiredErrorMessage));
            }
        }
        if ($this->Total->Required) {
            if (!$this->Total->IsDetailKey && EmptyValue($this->Total->FormValue)) {
                $this->Total->addErrorMessage(str_replace("%s", $this->Total->caption(), $this->Total->RequiredErrorMessage));
            }
        }
        if ($this->Total1->Required) {
            if (!$this->Total1->IsDetailKey && EmptyValue($this->Total1->FormValue)) {
                $this->Total1->addErrorMessage(str_replace("%s", $this->Total1->caption(), $this->Total1->RequiredErrorMessage));
            }
        }
        if ($this->Total2->Required) {
            if (!$this->Total2->IsDetailKey && EmptyValue($this->Total2->FormValue)) {
                $this->Total2->addErrorMessage(str_replace("%s", $this->Total2->caption(), $this->Total2->RequiredErrorMessage));
            }
        }
        if ($this->Progressive->Required) {
            if (!$this->Progressive->IsDetailKey && EmptyValue($this->Progressive->FormValue)) {
                $this->Progressive->addErrorMessage(str_replace("%s", $this->Progressive->caption(), $this->Progressive->RequiredErrorMessage));
            }
        }
        if ($this->Progressive1->Required) {
            if (!$this->Progressive1->IsDetailKey && EmptyValue($this->Progressive1->FormValue)) {
                $this->Progressive1->addErrorMessage(str_replace("%s", $this->Progressive1->caption(), $this->Progressive1->RequiredErrorMessage));
            }
        }
        if ($this->Progressive2->Required) {
            if (!$this->Progressive2->IsDetailKey && EmptyValue($this->Progressive2->FormValue)) {
                $this->Progressive2->addErrorMessage(str_replace("%s", $this->Progressive2->caption(), $this->Progressive2->RequiredErrorMessage));
            }
        }
        if ($this->NotProgressive->Required) {
            if (!$this->NotProgressive->IsDetailKey && EmptyValue($this->NotProgressive->FormValue)) {
                $this->NotProgressive->addErrorMessage(str_replace("%s", $this->NotProgressive->caption(), $this->NotProgressive->RequiredErrorMessage));
            }
        }
        if ($this->NotProgressive1->Required) {
            if (!$this->NotProgressive1->IsDetailKey && EmptyValue($this->NotProgressive1->FormValue)) {
                $this->NotProgressive1->addErrorMessage(str_replace("%s", $this->NotProgressive1->caption(), $this->NotProgressive1->RequiredErrorMessage));
            }
        }
        if ($this->NotProgressive2->Required) {
            if (!$this->NotProgressive2->IsDetailKey && EmptyValue($this->NotProgressive2->FormValue)) {
                $this->NotProgressive2->addErrorMessage(str_replace("%s", $this->NotProgressive2->caption(), $this->NotProgressive2->RequiredErrorMessage));
            }
        }
        if ($this->Motility2->Required) {
            if (!$this->Motility2->IsDetailKey && EmptyValue($this->Motility2->FormValue)) {
                $this->Motility2->addErrorMessage(str_replace("%s", $this->Motility2->caption(), $this->Motility2->RequiredErrorMessage));
            }
        }
        if ($this->Morphology2->Required) {
            if (!$this->Morphology2->IsDetailKey && EmptyValue($this->Morphology2->FormValue)) {
                $this->Morphology2->addErrorMessage(str_replace("%s", $this->Morphology2->caption(), $this->Morphology2->RequiredErrorMessage));
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

            // ARTCycle
            $this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, null, $this->ARTCycle->ReadOnly);

            // Spermorigin
            $this->Spermorigin->setDbValueDef($rsnew, $this->Spermorigin->CurrentValue, null, $this->Spermorigin->ReadOnly);

            // IndicationforART
            $this->IndicationforART->setDbValueDef($rsnew, $this->IndicationforART->CurrentValue, null, $this->IndicationforART->ReadOnly);

            // DateofICSI
            $this->DateofICSI->setDbValueDef($rsnew, UnFormatDateTime($this->DateofICSI->CurrentValue, 7), null, $this->DateofICSI->ReadOnly);

            // Origin
            $this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, null, $this->Origin->ReadOnly);

            // Status
            $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, $this->Status->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // pre_Concentration
            $this->pre_Concentration->setDbValueDef($rsnew, $this->pre_Concentration->CurrentValue, null, $this->pre_Concentration->ReadOnly);

            // pre_Motility
            $this->pre_Motility->setDbValueDef($rsnew, $this->pre_Motility->CurrentValue, null, $this->pre_Motility->ReadOnly);

            // pre_Morphology
            $this->pre_Morphology->setDbValueDef($rsnew, $this->pre_Morphology->CurrentValue, null, $this->pre_Morphology->ReadOnly);

            // post_Concentration
            $this->post_Concentration->setDbValueDef($rsnew, $this->post_Concentration->CurrentValue, null, $this->post_Concentration->ReadOnly);

            // post_Motility
            $this->post_Motility->setDbValueDef($rsnew, $this->post_Motility->CurrentValue, null, $this->post_Motility->ReadOnly);

            // post_Morphology
            $this->post_Morphology->setDbValueDef($rsnew, $this->post_Morphology->CurrentValue, null, $this->post_Morphology->ReadOnly);

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->setDbValueDef($rsnew, $this->NumberofEmbryostransferred->CurrentValue, null, $this->NumberofEmbryostransferred->ReadOnly);

            // Embryosunderobservation
            $this->Embryosunderobservation->setDbValueDef($rsnew, $this->Embryosunderobservation->CurrentValue, null, $this->Embryosunderobservation->ReadOnly);

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->setDbValueDef($rsnew, $this->EmbryoDevelopmentSummary->CurrentValue, null, $this->EmbryoDevelopmentSummary->ReadOnly);

            // EmbryologistSignature
            $this->EmbryologistSignature->setDbValueDef($rsnew, $this->EmbryologistSignature->CurrentValue, null, $this->EmbryologistSignature->ReadOnly);

            // IVFRegistrationID
            $this->IVFRegistrationID->setDbValueDef($rsnew, $this->IVFRegistrationID->CurrentValue, 0, $this->IVFRegistrationID->ReadOnly);

            // InseminatinTechnique
            $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, $this->InseminatinTechnique->ReadOnly);

            // ICSIDetails
            $this->ICSIDetails->setDbValueDef($rsnew, $this->ICSIDetails->CurrentValue, null, $this->ICSIDetails->ReadOnly);

            // DateofET
            $this->DateofET->setDbValueDef($rsnew, $this->DateofET->CurrentValue, null, $this->DateofET->ReadOnly);

            // Reasonfornotranfer
            $this->Reasonfornotranfer->setDbValueDef($rsnew, $this->Reasonfornotranfer->CurrentValue, null, $this->Reasonfornotranfer->ReadOnly);

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->setDbValueDef($rsnew, $this->EmbryosCryopreserved->CurrentValue, null, $this->EmbryosCryopreserved->ReadOnly);

            // LegendCellStage
            $this->LegendCellStage->setDbValueDef($rsnew, $this->LegendCellStage->CurrentValue, null, $this->LegendCellStage->ReadOnly);

            // ConsultantsSignature
            $this->ConsultantsSignature->setDbValueDef($rsnew, $this->ConsultantsSignature->CurrentValue, null, $this->ConsultantsSignature->ReadOnly);

            // Name
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // M2
            $this->M2->setDbValueDef($rsnew, $this->M2->CurrentValue, null, $this->M2->ReadOnly);

            // Mi2
            $this->Mi2->setDbValueDef($rsnew, $this->Mi2->CurrentValue, null, $this->Mi2->ReadOnly);

            // ICSI
            $this->ICSI->setDbValueDef($rsnew, $this->ICSI->CurrentValue, null, $this->ICSI->ReadOnly);

            // IVF
            $this->IVF->setDbValueDef($rsnew, $this->IVF->CurrentValue, null, $this->IVF->ReadOnly);

            // M1
            $this->M1->setDbValueDef($rsnew, $this->M1->CurrentValue, null, $this->M1->ReadOnly);

            // GV
            $this->GV->setDbValueDef($rsnew, $this->GV->CurrentValue, null, $this->GV->ReadOnly);

            // Others
            $this->_Others->setDbValueDef($rsnew, $this->_Others->CurrentValue, null, $this->_Others->ReadOnly);

            // Normal2PN
            $this->Normal2PN->setDbValueDef($rsnew, $this->Normal2PN->CurrentValue, null, $this->Normal2PN->ReadOnly);

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->setDbValueDef($rsnew, $this->Abnormalfertilisation1N->CurrentValue, null, $this->Abnormalfertilisation1N->ReadOnly);

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->setDbValueDef($rsnew, $this->Abnormalfertilisation3N->CurrentValue, null, $this->Abnormalfertilisation3N->ReadOnly);

            // NotFertilized
            $this->NotFertilized->setDbValueDef($rsnew, $this->NotFertilized->CurrentValue, null, $this->NotFertilized->ReadOnly);

            // Degenerated
            $this->Degenerated->setDbValueDef($rsnew, $this->Degenerated->CurrentValue, null, $this->Degenerated->ReadOnly);

            // SpermDate
            $this->SpermDate->setDbValueDef($rsnew, UnFormatDateTime($this->SpermDate->CurrentValue, 0), null, $this->SpermDate->ReadOnly);

            // Code1
            $this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, null, $this->Code1->ReadOnly);

            // Day1
            $this->Day1->setDbValueDef($rsnew, $this->Day1->CurrentValue, null, $this->Day1->ReadOnly);

            // CellStage1
            $this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, null, $this->CellStage1->ReadOnly);

            // Grade1
            $this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, null, $this->Grade1->ReadOnly);

            // State1
            $this->State1->setDbValueDef($rsnew, $this->State1->CurrentValue, null, $this->State1->ReadOnly);

            // Code2
            $this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, null, $this->Code2->ReadOnly);

            // Day2
            $this->Day2->setDbValueDef($rsnew, $this->Day2->CurrentValue, null, $this->Day2->ReadOnly);

            // CellStage2
            $this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, null, $this->CellStage2->ReadOnly);

            // Grade2
            $this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, null, $this->Grade2->ReadOnly);

            // State2
            $this->State2->setDbValueDef($rsnew, $this->State2->CurrentValue, null, $this->State2->ReadOnly);

            // Code3
            $this->Code3->setDbValueDef($rsnew, $this->Code3->CurrentValue, null, $this->Code3->ReadOnly);

            // Day3
            $this->Day3->setDbValueDef($rsnew, $this->Day3->CurrentValue, null, $this->Day3->ReadOnly);

            // CellStage3
            $this->CellStage3->setDbValueDef($rsnew, $this->CellStage3->CurrentValue, null, $this->CellStage3->ReadOnly);

            // Grade3
            $this->Grade3->setDbValueDef($rsnew, $this->Grade3->CurrentValue, null, $this->Grade3->ReadOnly);

            // State3
            $this->State3->setDbValueDef($rsnew, $this->State3->CurrentValue, null, $this->State3->ReadOnly);

            // Code4
            $this->Code4->setDbValueDef($rsnew, $this->Code4->CurrentValue, null, $this->Code4->ReadOnly);

            // Day4
            $this->Day4->setDbValueDef($rsnew, $this->Day4->CurrentValue, null, $this->Day4->ReadOnly);

            // CellStage4
            $this->CellStage4->setDbValueDef($rsnew, $this->CellStage4->CurrentValue, null, $this->CellStage4->ReadOnly);

            // Grade4
            $this->Grade4->setDbValueDef($rsnew, $this->Grade4->CurrentValue, null, $this->Grade4->ReadOnly);

            // State4
            $this->State4->setDbValueDef($rsnew, $this->State4->CurrentValue, null, $this->State4->ReadOnly);

            // Code5
            $this->Code5->setDbValueDef($rsnew, $this->Code5->CurrentValue, null, $this->Code5->ReadOnly);

            // Day5
            $this->Day5->setDbValueDef($rsnew, $this->Day5->CurrentValue, null, $this->Day5->ReadOnly);

            // CellStage5
            $this->CellStage5->setDbValueDef($rsnew, $this->CellStage5->CurrentValue, null, $this->CellStage5->ReadOnly);

            // Grade5
            $this->Grade5->setDbValueDef($rsnew, $this->Grade5->CurrentValue, null, $this->Grade5->ReadOnly);

            // State5
            $this->State5->setDbValueDef($rsnew, $this->State5->CurrentValue, null, $this->State5->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // RIDNo
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, $this->RIDNo->ReadOnly);

            // Volume
            $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, $this->Volume->ReadOnly);

            // Volume1
            $this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, null, $this->Volume1->ReadOnly);

            // Volume2
            $this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, null, $this->Volume2->ReadOnly);

            // Concentration2
            $this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, null, $this->Concentration2->ReadOnly);

            // Total
            $this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, null, $this->Total->ReadOnly);

            // Total1
            $this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, null, $this->Total1->ReadOnly);

            // Total2
            $this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, null, $this->Total2->ReadOnly);

            // Progressive
            $this->Progressive->setDbValueDef($rsnew, $this->Progressive->CurrentValue, null, $this->Progressive->ReadOnly);

            // Progressive1
            $this->Progressive1->setDbValueDef($rsnew, $this->Progressive1->CurrentValue, null, $this->Progressive1->ReadOnly);

            // Progressive2
            $this->Progressive2->setDbValueDef($rsnew, $this->Progressive2->CurrentValue, null, $this->Progressive2->ReadOnly);

            // NotProgressive
            $this->NotProgressive->setDbValueDef($rsnew, $this->NotProgressive->CurrentValue, null, $this->NotProgressive->ReadOnly);

            // NotProgressive1
            $this->NotProgressive1->setDbValueDef($rsnew, $this->NotProgressive1->CurrentValue, null, $this->NotProgressive1->ReadOnly);

            // NotProgressive2
            $this->NotProgressive2->setDbValueDef($rsnew, $this->NotProgressive2->CurrentValue, null, $this->NotProgressive2->ReadOnly);

            // Motility2
            $this->Motility2->setDbValueDef($rsnew, $this->Motility2->CurrentValue, null, $this->Motility2->ReadOnly);

            // Morphology2
            $this->Morphology2->setDbValueDef($rsnew, $this->Morphology2->CurrentValue, null, $this->Morphology2->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfArtSummaryList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
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
                case "x_ARTCycle":
                    break;
                case "x_Spermorigin":
                    break;
                case "x_Origin":
                    break;
                case "x_Status":
                    break;
                case "x_Method":
                    break;
                case "x_InseminatinTechnique":
                    break;
                case "x_DateofET":
                    break;
                case "x_Reasonfornotranfer":
                    break;
                case "x_ConsultantsSignature":
                    break;
                case "x_Day1":
                    break;
                case "x_CellStage1":
                    break;
                case "x_Grade1":
                    break;
                case "x_State1":
                    break;
                case "x_Day2":
                    break;
                case "x_CellStage2":
                    break;
                case "x_Grade2":
                    break;
                case "x_State2":
                    break;
                case "x_Day3":
                    break;
                case "x_CellStage3":
                    break;
                case "x_Grade3":
                    break;
                case "x_State3":
                    break;
                case "x_Day4":
                    break;
                case "x_CellStage4":
                    break;
                case "x_Grade4":
                    break;
                case "x_State4":
                    break;
                case "x_Day5":
                    break;
                case "x_CellStage5":
                    break;
                case "x_Grade5":
                    break;
                case "x_State5":
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

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
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

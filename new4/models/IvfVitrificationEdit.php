<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfVitrificationEdit extends IvfVitrification
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_vitrification';

    // Page object name
    public $PageObjName = "IvfVitrificationEdit";

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

        // Table object (ivf_vitrification)
        if (!isset($GLOBALS["ivf_vitrification"]) || get_class($GLOBALS["ivf_vitrification"]) == PROJECT_NAMESPACE . "ivf_vitrification") {
            $GLOBALS["ivf_vitrification"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_vitrification');
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
                $doc = new $class(Container("ivf_vitrification"));
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
                    if ($pageName == "IvfVitrificationView") {
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
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->TiDNo->setVisibility();
        $this->vitrificationDate->setVisibility();
        $this->PrimaryEmbryologist->setVisibility();
        $this->SecondaryEmbryologist->setVisibility();
        $this->EmbryoNo->setVisibility();
        $this->FertilisationDate->setVisibility();
        $this->Day->setVisibility();
        $this->Grade->setVisibility();
        $this->Incubator->setVisibility();
        $this->Tank->setVisibility();
        $this->Canister->setVisibility();
        $this->Gobiet->setVisibility();
        $this->CryolockNo->setVisibility();
        $this->CryolockColour->setVisibility();
        $this->Stage->setVisibility();
        $this->thawDate->setVisibility();
        $this->thawPrimaryEmbryologist->setVisibility();
        $this->thawSecondaryEmbryologist->setVisibility();
        $this->thawET->setVisibility();
        $this->thawReFrozen->setVisibility();
        $this->thawAbserve->setVisibility();
        $this->thawDiscard->setVisibility();
        $this->Catheter->setVisibility();
        $this->Difficulty->setVisibility();
        $this->Easy->setVisibility();
        $this->Comments->setVisibility();
        $this->Doctor->setVisibility();
        $this->Embryologist->setVisibility();
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
                    $this->terminate("IvfVitrificationList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfVitrificationList") {
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

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'TiDNo' first before field var 'x_TiDNo'
        $val = $CurrentForm->hasValue("TiDNo") ? $CurrentForm->getValue("TiDNo") : $CurrentForm->getValue("x_TiDNo");
        if (!$this->TiDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TiDNo->Visible = false; // Disable update for API request
            } else {
                $this->TiDNo->setFormValue($val);
            }
        }

        // Check field name 'vitrificationDate' first before field var 'x_vitrificationDate'
        $val = $CurrentForm->hasValue("vitrificationDate") ? $CurrentForm->getValue("vitrificationDate") : $CurrentForm->getValue("x_vitrificationDate");
        if (!$this->vitrificationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitrificationDate->Visible = false; // Disable update for API request
            } else {
                $this->vitrificationDate->setFormValue($val);
            }
            $this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
        }

        // Check field name 'PrimaryEmbryologist' first before field var 'x_PrimaryEmbryologist'
        $val = $CurrentForm->hasValue("PrimaryEmbryologist") ? $CurrentForm->getValue("PrimaryEmbryologist") : $CurrentForm->getValue("x_PrimaryEmbryologist");
        if (!$this->PrimaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrimaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->PrimaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'SecondaryEmbryologist' first before field var 'x_SecondaryEmbryologist'
        $val = $CurrentForm->hasValue("SecondaryEmbryologist") ? $CurrentForm->getValue("SecondaryEmbryologist") : $CurrentForm->getValue("x_SecondaryEmbryologist");
        if (!$this->SecondaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SecondaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->SecondaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
        $val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
        if (!$this->EmbryoNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryoNo->Visible = false; // Disable update for API request
            } else {
                $this->EmbryoNo->setFormValue($val);
            }
        }

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

        // Check field name 'Day' first before field var 'x_Day'
        $val = $CurrentForm->hasValue("Day") ? $CurrentForm->getValue("Day") : $CurrentForm->getValue("x_Day");
        if (!$this->Day->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day->Visible = false; // Disable update for API request
            } else {
                $this->Day->setFormValue($val);
            }
        }

        // Check field name 'Grade' first before field var 'x_Grade'
        $val = $CurrentForm->hasValue("Grade") ? $CurrentForm->getValue("Grade") : $CurrentForm->getValue("x_Grade");
        if (!$this->Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade->Visible = false; // Disable update for API request
            } else {
                $this->Grade->setFormValue($val);
            }
        }

        // Check field name 'Incubator' first before field var 'x_Incubator'
        $val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
        if (!$this->Incubator->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator->Visible = false; // Disable update for API request
            } else {
                $this->Incubator->setFormValue($val);
            }
        }

        // Check field name 'Tank' first before field var 'x_Tank'
        $val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
        if (!$this->Tank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tank->Visible = false; // Disable update for API request
            } else {
                $this->Tank->setFormValue($val);
            }
        }

        // Check field name 'Canister' first before field var 'x_Canister'
        $val = $CurrentForm->hasValue("Canister") ? $CurrentForm->getValue("Canister") : $CurrentForm->getValue("x_Canister");
        if (!$this->Canister->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Canister->Visible = false; // Disable update for API request
            } else {
                $this->Canister->setFormValue($val);
            }
        }

        // Check field name 'Gobiet' first before field var 'x_Gobiet'
        $val = $CurrentForm->hasValue("Gobiet") ? $CurrentForm->getValue("Gobiet") : $CurrentForm->getValue("x_Gobiet");
        if (!$this->Gobiet->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gobiet->Visible = false; // Disable update for API request
            } else {
                $this->Gobiet->setFormValue($val);
            }
        }

        // Check field name 'CryolockNo' first before field var 'x_CryolockNo'
        $val = $CurrentForm->hasValue("CryolockNo") ? $CurrentForm->getValue("CryolockNo") : $CurrentForm->getValue("x_CryolockNo");
        if (!$this->CryolockNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CryolockNo->Visible = false; // Disable update for API request
            } else {
                $this->CryolockNo->setFormValue($val);
            }
        }

        // Check field name 'CryolockColour' first before field var 'x_CryolockColour'
        $val = $CurrentForm->hasValue("CryolockColour") ? $CurrentForm->getValue("CryolockColour") : $CurrentForm->getValue("x_CryolockColour");
        if (!$this->CryolockColour->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CryolockColour->Visible = false; // Disable update for API request
            } else {
                $this->CryolockColour->setFormValue($val);
            }
        }

        // Check field name 'Stage' first before field var 'x_Stage'
        $val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
        if (!$this->Stage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Stage->Visible = false; // Disable update for API request
            } else {
                $this->Stage->setFormValue($val);
            }
        }

        // Check field name 'thawDate' first before field var 'x_thawDate'
        $val = $CurrentForm->hasValue("thawDate") ? $CurrentForm->getValue("thawDate") : $CurrentForm->getValue("x_thawDate");
        if (!$this->thawDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawDate->Visible = false; // Disable update for API request
            } else {
                $this->thawDate->setFormValue($val);
            }
            $this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
        }

        // Check field name 'thawPrimaryEmbryologist' first before field var 'x_thawPrimaryEmbryologist'
        $val = $CurrentForm->hasValue("thawPrimaryEmbryologist") ? $CurrentForm->getValue("thawPrimaryEmbryologist") : $CurrentForm->getValue("x_thawPrimaryEmbryologist");
        if (!$this->thawPrimaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawPrimaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->thawPrimaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'thawSecondaryEmbryologist' first before field var 'x_thawSecondaryEmbryologist'
        $val = $CurrentForm->hasValue("thawSecondaryEmbryologist") ? $CurrentForm->getValue("thawSecondaryEmbryologist") : $CurrentForm->getValue("x_thawSecondaryEmbryologist");
        if (!$this->thawSecondaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawSecondaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->thawSecondaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'thawET' first before field var 'x_thawET'
        $val = $CurrentForm->hasValue("thawET") ? $CurrentForm->getValue("thawET") : $CurrentForm->getValue("x_thawET");
        if (!$this->thawET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawET->Visible = false; // Disable update for API request
            } else {
                $this->thawET->setFormValue($val);
            }
        }

        // Check field name 'thawReFrozen' first before field var 'x_thawReFrozen'
        $val = $CurrentForm->hasValue("thawReFrozen") ? $CurrentForm->getValue("thawReFrozen") : $CurrentForm->getValue("x_thawReFrozen");
        if (!$this->thawReFrozen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawReFrozen->Visible = false; // Disable update for API request
            } else {
                $this->thawReFrozen->setFormValue($val);
            }
        }

        // Check field name 'thawAbserve' first before field var 'x_thawAbserve'
        $val = $CurrentForm->hasValue("thawAbserve") ? $CurrentForm->getValue("thawAbserve") : $CurrentForm->getValue("x_thawAbserve");
        if (!$this->thawAbserve->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawAbserve->Visible = false; // Disable update for API request
            } else {
                $this->thawAbserve->setFormValue($val);
            }
        }

        // Check field name 'thawDiscard' first before field var 'x_thawDiscard'
        $val = $CurrentForm->hasValue("thawDiscard") ? $CurrentForm->getValue("thawDiscard") : $CurrentForm->getValue("x_thawDiscard");
        if (!$this->thawDiscard->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawDiscard->Visible = false; // Disable update for API request
            } else {
                $this->thawDiscard->setFormValue($val);
            }
        }

        // Check field name 'Catheter' first before field var 'x_Catheter'
        $val = $CurrentForm->hasValue("Catheter") ? $CurrentForm->getValue("Catheter") : $CurrentForm->getValue("x_Catheter");
        if (!$this->Catheter->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Catheter->Visible = false; // Disable update for API request
            } else {
                $this->Catheter->setFormValue($val);
            }
        }

        // Check field name 'Difficulty' first before field var 'x_Difficulty'
        $val = $CurrentForm->hasValue("Difficulty") ? $CurrentForm->getValue("Difficulty") : $CurrentForm->getValue("x_Difficulty");
        if (!$this->Difficulty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Difficulty->Visible = false; // Disable update for API request
            } else {
                $this->Difficulty->setFormValue($val);
            }
        }

        // Check field name 'Easy' first before field var 'x_Easy'
        $val = $CurrentForm->hasValue("Easy") ? $CurrentForm->getValue("Easy") : $CurrentForm->getValue("x_Easy");
        if (!$this->Easy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Easy->Visible = false; // Disable update for API request
            } else {
                $this->Easy->setFormValue($val);
            }
        }

        // Check field name 'Comments' first before field var 'x_Comments'
        $val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
        if (!$this->Comments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Comments->Visible = false; // Disable update for API request
            } else {
                $this->Comments->setFormValue($val);
            }
        }

        // Check field name 'Doctor' first before field var 'x_Doctor'
        $val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
        if (!$this->Doctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Doctor->Visible = false; // Disable update for API request
            } else {
                $this->Doctor->setFormValue($val);
            }
        }

        // Check field name 'Embryologist' first before field var 'x_Embryologist'
        $val = $CurrentForm->hasValue("Embryologist") ? $CurrentForm->getValue("Embryologist") : $CurrentForm->getValue("x_Embryologist");
        if (!$this->Embryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Embryologist->Visible = false; // Disable update for API request
            } else {
                $this->Embryologist->setFormValue($val);
            }
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
        $this->vitrificationDate->CurrentValue = $this->vitrificationDate->FormValue;
        $this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
        $this->PrimaryEmbryologist->CurrentValue = $this->PrimaryEmbryologist->FormValue;
        $this->SecondaryEmbryologist->CurrentValue = $this->SecondaryEmbryologist->FormValue;
        $this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
        $this->FertilisationDate->CurrentValue = $this->FertilisationDate->FormValue;
        $this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
        $this->Day->CurrentValue = $this->Day->FormValue;
        $this->Grade->CurrentValue = $this->Grade->FormValue;
        $this->Incubator->CurrentValue = $this->Incubator->FormValue;
        $this->Tank->CurrentValue = $this->Tank->FormValue;
        $this->Canister->CurrentValue = $this->Canister->FormValue;
        $this->Gobiet->CurrentValue = $this->Gobiet->FormValue;
        $this->CryolockNo->CurrentValue = $this->CryolockNo->FormValue;
        $this->CryolockColour->CurrentValue = $this->CryolockColour->FormValue;
        $this->Stage->CurrentValue = $this->Stage->FormValue;
        $this->thawDate->CurrentValue = $this->thawDate->FormValue;
        $this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
        $this->thawPrimaryEmbryologist->CurrentValue = $this->thawPrimaryEmbryologist->FormValue;
        $this->thawSecondaryEmbryologist->CurrentValue = $this->thawSecondaryEmbryologist->FormValue;
        $this->thawET->CurrentValue = $this->thawET->FormValue;
        $this->thawReFrozen->CurrentValue = $this->thawReFrozen->FormValue;
        $this->thawAbserve->CurrentValue = $this->thawAbserve->FormValue;
        $this->thawDiscard->CurrentValue = $this->thawDiscard->FormValue;
        $this->Catheter->CurrentValue = $this->Catheter->FormValue;
        $this->Difficulty->CurrentValue = $this->Difficulty->FormValue;
        $this->Easy->CurrentValue = $this->Easy->FormValue;
        $this->Comments->CurrentValue = $this->Comments->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->Embryologist->CurrentValue = $this->Embryologist->FormValue;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->TiDNo->setDbValue($row['TiDNo']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
        $this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->FertilisationDate->setDbValue($row['FertilisationDate']);
        $this->Day->setDbValue($row['Day']);
        $this->Grade->setDbValue($row['Grade']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Canister->setDbValue($row['Canister']);
        $this->Gobiet->setDbValue($row['Gobiet']);
        $this->CryolockNo->setDbValue($row['CryolockNo']);
        $this->CryolockColour->setDbValue($row['CryolockColour']);
        $this->Stage->setDbValue($row['Stage']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
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
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['TiDNo'] = null;
        $row['vitrificationDate'] = null;
        $row['PrimaryEmbryologist'] = null;
        $row['SecondaryEmbryologist'] = null;
        $row['EmbryoNo'] = null;
        $row['FertilisationDate'] = null;
        $row['Day'] = null;
        $row['Grade'] = null;
        $row['Incubator'] = null;
        $row['Tank'] = null;
        $row['Canister'] = null;
        $row['Gobiet'] = null;
        $row['CryolockNo'] = null;
        $row['CryolockColour'] = null;
        $row['Stage'] = null;
        $row['thawDate'] = null;
        $row['thawPrimaryEmbryologist'] = null;
        $row['thawSecondaryEmbryologist'] = null;
        $row['thawET'] = null;
        $row['thawReFrozen'] = null;
        $row['thawAbserve'] = null;
        $row['thawDiscard'] = null;
        $row['Catheter'] = null;
        $row['Difficulty'] = null;
        $row['Easy'] = null;
        $row['Comments'] = null;
        $row['Doctor'] = null;
        $row['Embryologist'] = null;
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

        // RIDNo

        // PatientName

        // TiDNo

        // vitrificationDate

        // PrimaryEmbryologist

        // SecondaryEmbryologist

        // EmbryoNo

        // FertilisationDate

        // Day

        // Grade

        // Incubator

        // Tank

        // Canister

        // Gobiet

        // CryolockNo

        // CryolockColour

        // Stage

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawReFrozen

        // thawAbserve

        // thawDiscard

        // Catheter

        // Difficulty

        // Easy

        // Comments

        // Doctor

        // Embryologist
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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

            // vitrificationDate
            $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
            $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
            $this->vitrificationDate->ViewCustomAttributes = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
            $this->PrimaryEmbryologist->ViewCustomAttributes = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
            $this->SecondaryEmbryologist->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

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

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Canister
            $this->Canister->ViewValue = $this->Canister->CurrentValue;
            $this->Canister->ViewCustomAttributes = "";

            // Gobiet
            $this->Gobiet->ViewValue = $this->Gobiet->CurrentValue;
            $this->Gobiet->ViewCustomAttributes = "";

            // CryolockNo
            $this->CryolockNo->ViewValue = $this->CryolockNo->CurrentValue;
            $this->CryolockNo->ViewCustomAttributes = "";

            // CryolockColour
            $this->CryolockColour->ViewValue = $this->CryolockColour->CurrentValue;
            $this->CryolockColour->ViewCustomAttributes = "";

            // Stage
            $this->Stage->ViewValue = $this->Stage->CurrentValue;
            $this->Stage->ViewCustomAttributes = "";

            // thawDate
            $this->thawDate->ViewValue = $this->thawDate->CurrentValue;
            $this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
            $this->thawDate->ViewCustomAttributes = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
            $this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
            $this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

            // thawET
            $this->thawET->ViewValue = $this->thawET->CurrentValue;
            $this->thawET->ViewCustomAttributes = "";

            // thawReFrozen
            $this->thawReFrozen->ViewValue = $this->thawReFrozen->CurrentValue;
            $this->thawReFrozen->ViewCustomAttributes = "";

            // thawAbserve
            $this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
            $this->thawAbserve->ViewCustomAttributes = "";

            // thawDiscard
            $this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
            $this->thawDiscard->ViewCustomAttributes = "";

            // Catheter
            $this->Catheter->ViewValue = $this->Catheter->CurrentValue;
            $this->Catheter->ViewCustomAttributes = "";

            // Difficulty
            $this->Difficulty->ViewValue = $this->Difficulty->CurrentValue;
            $this->Difficulty->ViewCustomAttributes = "";

            // Easy
            $this->Easy->ViewValue = $this->Easy->CurrentValue;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";
            $this->vitrificationDate->TooltipValue = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->LinkCustomAttributes = "";
            $this->PrimaryEmbryologist->HrefValue = "";
            $this->PrimaryEmbryologist->TooltipValue = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->LinkCustomAttributes = "";
            $this->SecondaryEmbryologist->HrefValue = "";
            $this->SecondaryEmbryologist->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

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

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";
            $this->Canister->TooltipValue = "";

            // Gobiet
            $this->Gobiet->LinkCustomAttributes = "";
            $this->Gobiet->HrefValue = "";
            $this->Gobiet->TooltipValue = "";

            // CryolockNo
            $this->CryolockNo->LinkCustomAttributes = "";
            $this->CryolockNo->HrefValue = "";
            $this->CryolockNo->TooltipValue = "";

            // CryolockColour
            $this->CryolockColour->LinkCustomAttributes = "";
            $this->CryolockColour->HrefValue = "";
            $this->CryolockColour->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";
            $this->thawDate->TooltipValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";
            $this->thawPrimaryEmbryologist->TooltipValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";
            $this->thawSecondaryEmbryologist->TooltipValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";
            $this->thawET->TooltipValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";
            $this->thawReFrozen->TooltipValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";
            $this->thawAbserve->TooltipValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";
            $this->thawDiscard->TooltipValue = "";

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
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // TiDNo
            $this->TiDNo->EditAttrs["class"] = "form-control";
            $this->TiDNo->EditCustomAttributes = "";
            $this->TiDNo->EditValue = HtmlEncode($this->TiDNo->CurrentValue);
            $this->TiDNo->PlaceHolder = RemoveHtml($this->TiDNo->caption());

            // vitrificationDate
            $this->vitrificationDate->EditAttrs["class"] = "form-control";
            $this->vitrificationDate->EditCustomAttributes = "";
            $this->vitrificationDate->EditValue = HtmlEncode(FormatDateTime($this->vitrificationDate->CurrentValue, 8));
            $this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->PrimaryEmbryologist->EditCustomAttributes = "";
            if (!$this->PrimaryEmbryologist->Raw) {
                $this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
            }
            $this->PrimaryEmbryologist->EditValue = HtmlEncode($this->PrimaryEmbryologist->CurrentValue);
            $this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->SecondaryEmbryologist->EditCustomAttributes = "";
            if (!$this->SecondaryEmbryologist->Raw) {
                $this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
            }
            $this->SecondaryEmbryologist->EditValue = HtmlEncode($this->SecondaryEmbryologist->CurrentValue);
            $this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

            // EmbryoNo
            $this->EmbryoNo->EditAttrs["class"] = "form-control";
            $this->EmbryoNo->EditCustomAttributes = "";
            if (!$this->EmbryoNo->Raw) {
                $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
            }
            $this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
            $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

            // FertilisationDate
            $this->FertilisationDate->EditAttrs["class"] = "form-control";
            $this->FertilisationDate->EditCustomAttributes = "";
            $this->FertilisationDate->EditValue = HtmlEncode(FormatDateTime($this->FertilisationDate->CurrentValue, 8));
            $this->FertilisationDate->PlaceHolder = RemoveHtml($this->FertilisationDate->caption());

            // Day
            $this->Day->EditAttrs["class"] = "form-control";
            $this->Day->EditCustomAttributes = "";
            $this->Day->EditValue = $this->Day->options(true);
            $this->Day->PlaceHolder = RemoveHtml($this->Day->caption());

            // Grade
            $this->Grade->EditAttrs["class"] = "form-control";
            $this->Grade->EditCustomAttributes = "";
            $this->Grade->EditValue = $this->Grade->options(true);
            $this->Grade->PlaceHolder = RemoveHtml($this->Grade->caption());

            // Incubator
            $this->Incubator->EditAttrs["class"] = "form-control";
            $this->Incubator->EditCustomAttributes = "";
            if (!$this->Incubator->Raw) {
                $this->Incubator->CurrentValue = HtmlDecode($this->Incubator->CurrentValue);
            }
            $this->Incubator->EditValue = HtmlEncode($this->Incubator->CurrentValue);
            $this->Incubator->PlaceHolder = RemoveHtml($this->Incubator->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Canister
            $this->Canister->EditAttrs["class"] = "form-control";
            $this->Canister->EditCustomAttributes = "";
            if (!$this->Canister->Raw) {
                $this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
            }
            $this->Canister->EditValue = HtmlEncode($this->Canister->CurrentValue);
            $this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

            // Gobiet
            $this->Gobiet->EditAttrs["class"] = "form-control";
            $this->Gobiet->EditCustomAttributes = "";
            if (!$this->Gobiet->Raw) {
                $this->Gobiet->CurrentValue = HtmlDecode($this->Gobiet->CurrentValue);
            }
            $this->Gobiet->EditValue = HtmlEncode($this->Gobiet->CurrentValue);
            $this->Gobiet->PlaceHolder = RemoveHtml($this->Gobiet->caption());

            // CryolockNo
            $this->CryolockNo->EditAttrs["class"] = "form-control";
            $this->CryolockNo->EditCustomAttributes = "";
            if (!$this->CryolockNo->Raw) {
                $this->CryolockNo->CurrentValue = HtmlDecode($this->CryolockNo->CurrentValue);
            }
            $this->CryolockNo->EditValue = HtmlEncode($this->CryolockNo->CurrentValue);
            $this->CryolockNo->PlaceHolder = RemoveHtml($this->CryolockNo->caption());

            // CryolockColour
            $this->CryolockColour->EditAttrs["class"] = "form-control";
            $this->CryolockColour->EditCustomAttributes = "";
            if (!$this->CryolockColour->Raw) {
                $this->CryolockColour->CurrentValue = HtmlDecode($this->CryolockColour->CurrentValue);
            }
            $this->CryolockColour->EditValue = HtmlEncode($this->CryolockColour->CurrentValue);
            $this->CryolockColour->PlaceHolder = RemoveHtml($this->CryolockColour->caption());

            // Stage
            $this->Stage->EditAttrs["class"] = "form-control";
            $this->Stage->EditCustomAttributes = "";
            if (!$this->Stage->Raw) {
                $this->Stage->CurrentValue = HtmlDecode($this->Stage->CurrentValue);
            }
            $this->Stage->EditValue = HtmlEncode($this->Stage->CurrentValue);
            $this->Stage->PlaceHolder = RemoveHtml($this->Stage->caption());

            // thawDate
            $this->thawDate->EditAttrs["class"] = "form-control";
            $this->thawDate->EditCustomAttributes = "";
            $this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
            $this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->thawPrimaryEmbryologist->EditCustomAttributes = "";
            if (!$this->thawPrimaryEmbryologist->Raw) {
                $this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
            }
            $this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
            $this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->thawSecondaryEmbryologist->EditCustomAttributes = "";
            if (!$this->thawSecondaryEmbryologist->Raw) {
                $this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
            }
            $this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
            $this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

            // thawET
            $this->thawET->EditAttrs["class"] = "form-control";
            $this->thawET->EditCustomAttributes = "";
            if (!$this->thawET->Raw) {
                $this->thawET->CurrentValue = HtmlDecode($this->thawET->CurrentValue);
            }
            $this->thawET->EditValue = HtmlEncode($this->thawET->CurrentValue);
            $this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

            // thawReFrozen
            $this->thawReFrozen->EditAttrs["class"] = "form-control";
            $this->thawReFrozen->EditCustomAttributes = "";
            if (!$this->thawReFrozen->Raw) {
                $this->thawReFrozen->CurrentValue = HtmlDecode($this->thawReFrozen->CurrentValue);
            }
            $this->thawReFrozen->EditValue = HtmlEncode($this->thawReFrozen->CurrentValue);
            $this->thawReFrozen->PlaceHolder = RemoveHtml($this->thawReFrozen->caption());

            // thawAbserve
            $this->thawAbserve->EditAttrs["class"] = "form-control";
            $this->thawAbserve->EditCustomAttributes = "";
            if (!$this->thawAbserve->Raw) {
                $this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
            }
            $this->thawAbserve->EditValue = HtmlEncode($this->thawAbserve->CurrentValue);
            $this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

            // thawDiscard
            $this->thawDiscard->EditAttrs["class"] = "form-control";
            $this->thawDiscard->EditCustomAttributes = "";
            if (!$this->thawDiscard->Raw) {
                $this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
            }
            $this->thawDiscard->EditValue = HtmlEncode($this->thawDiscard->CurrentValue);
            $this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

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
            if (!$this->Difficulty->Raw) {
                $this->Difficulty->CurrentValue = HtmlDecode($this->Difficulty->CurrentValue);
            }
            $this->Difficulty->EditValue = HtmlEncode($this->Difficulty->CurrentValue);
            $this->Difficulty->PlaceHolder = RemoveHtml($this->Difficulty->caption());

            // Easy
            $this->Easy->EditAttrs["class"] = "form-control";
            $this->Easy->EditCustomAttributes = "";
            if (!$this->Easy->Raw) {
                $this->Easy->CurrentValue = HtmlDecode($this->Easy->CurrentValue);
            }
            $this->Easy->EditValue = HtmlEncode($this->Easy->CurrentValue);
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // TiDNo
            $this->TiDNo->LinkCustomAttributes = "";
            $this->TiDNo->HrefValue = "";

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->LinkCustomAttributes = "";
            $this->PrimaryEmbryologist->HrefValue = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->LinkCustomAttributes = "";
            $this->SecondaryEmbryologist->HrefValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";

            // FertilisationDate
            $this->FertilisationDate->LinkCustomAttributes = "";
            $this->FertilisationDate->HrefValue = "";

            // Day
            $this->Day->LinkCustomAttributes = "";
            $this->Day->HrefValue = "";

            // Grade
            $this->Grade->LinkCustomAttributes = "";
            $this->Grade->HrefValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";

            // Gobiet
            $this->Gobiet->LinkCustomAttributes = "";
            $this->Gobiet->HrefValue = "";

            // CryolockNo
            $this->CryolockNo->LinkCustomAttributes = "";
            $this->CryolockNo->HrefValue = "";

            // CryolockColour
            $this->CryolockColour->LinkCustomAttributes = "";
            $this->CryolockColour->HrefValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";

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

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->TiDNo->Required) {
            if (!$this->TiDNo->IsDetailKey && EmptyValue($this->TiDNo->FormValue)) {
                $this->TiDNo->addErrorMessage(str_replace("%s", $this->TiDNo->caption(), $this->TiDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TiDNo->FormValue)) {
            $this->TiDNo->addErrorMessage($this->TiDNo->getErrorMessage(false));
        }
        if ($this->vitrificationDate->Required) {
            if (!$this->vitrificationDate->IsDetailKey && EmptyValue($this->vitrificationDate->FormValue)) {
                $this->vitrificationDate->addErrorMessage(str_replace("%s", $this->vitrificationDate->caption(), $this->vitrificationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->vitrificationDate->FormValue)) {
            $this->vitrificationDate->addErrorMessage($this->vitrificationDate->getErrorMessage(false));
        }
        if ($this->PrimaryEmbryologist->Required) {
            if (!$this->PrimaryEmbryologist->IsDetailKey && EmptyValue($this->PrimaryEmbryologist->FormValue)) {
                $this->PrimaryEmbryologist->addErrorMessage(str_replace("%s", $this->PrimaryEmbryologist->caption(), $this->PrimaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->SecondaryEmbryologist->Required) {
            if (!$this->SecondaryEmbryologist->IsDetailKey && EmptyValue($this->SecondaryEmbryologist->FormValue)) {
                $this->SecondaryEmbryologist->addErrorMessage(str_replace("%s", $this->SecondaryEmbryologist->caption(), $this->SecondaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->EmbryoNo->Required) {
            if (!$this->EmbryoNo->IsDetailKey && EmptyValue($this->EmbryoNo->FormValue)) {
                $this->EmbryoNo->addErrorMessage(str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
            }
        }
        if ($this->FertilisationDate->Required) {
            if (!$this->FertilisationDate->IsDetailKey && EmptyValue($this->FertilisationDate->FormValue)) {
                $this->FertilisationDate->addErrorMessage(str_replace("%s", $this->FertilisationDate->caption(), $this->FertilisationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->FertilisationDate->FormValue)) {
            $this->FertilisationDate->addErrorMessage($this->FertilisationDate->getErrorMessage(false));
        }
        if ($this->Day->Required) {
            if (!$this->Day->IsDetailKey && EmptyValue($this->Day->FormValue)) {
                $this->Day->addErrorMessage(str_replace("%s", $this->Day->caption(), $this->Day->RequiredErrorMessage));
            }
        }
        if ($this->Grade->Required) {
            if (!$this->Grade->IsDetailKey && EmptyValue($this->Grade->FormValue)) {
                $this->Grade->addErrorMessage(str_replace("%s", $this->Grade->caption(), $this->Grade->RequiredErrorMessage));
            }
        }
        if ($this->Incubator->Required) {
            if (!$this->Incubator->IsDetailKey && EmptyValue($this->Incubator->FormValue)) {
                $this->Incubator->addErrorMessage(str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
            }
        }
        if ($this->Tank->Required) {
            if (!$this->Tank->IsDetailKey && EmptyValue($this->Tank->FormValue)) {
                $this->Tank->addErrorMessage(str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
            }
        }
        if ($this->Canister->Required) {
            if (!$this->Canister->IsDetailKey && EmptyValue($this->Canister->FormValue)) {
                $this->Canister->addErrorMessage(str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
            }
        }
        if ($this->Gobiet->Required) {
            if (!$this->Gobiet->IsDetailKey && EmptyValue($this->Gobiet->FormValue)) {
                $this->Gobiet->addErrorMessage(str_replace("%s", $this->Gobiet->caption(), $this->Gobiet->RequiredErrorMessage));
            }
        }
        if ($this->CryolockNo->Required) {
            if (!$this->CryolockNo->IsDetailKey && EmptyValue($this->CryolockNo->FormValue)) {
                $this->CryolockNo->addErrorMessage(str_replace("%s", $this->CryolockNo->caption(), $this->CryolockNo->RequiredErrorMessage));
            }
        }
        if ($this->CryolockColour->Required) {
            if (!$this->CryolockColour->IsDetailKey && EmptyValue($this->CryolockColour->FormValue)) {
                $this->CryolockColour->addErrorMessage(str_replace("%s", $this->CryolockColour->caption(), $this->CryolockColour->RequiredErrorMessage));
            }
        }
        if ($this->Stage->Required) {
            if (!$this->Stage->IsDetailKey && EmptyValue($this->Stage->FormValue)) {
                $this->Stage->addErrorMessage(str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
            }
        }
        if ($this->thawDate->Required) {
            if (!$this->thawDate->IsDetailKey && EmptyValue($this->thawDate->FormValue)) {
                $this->thawDate->addErrorMessage(str_replace("%s", $this->thawDate->caption(), $this->thawDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->thawDate->FormValue)) {
            $this->thawDate->addErrorMessage($this->thawDate->getErrorMessage(false));
        }
        if ($this->thawPrimaryEmbryologist->Required) {
            if (!$this->thawPrimaryEmbryologist->IsDetailKey && EmptyValue($this->thawPrimaryEmbryologist->FormValue)) {
                $this->thawPrimaryEmbryologist->addErrorMessage(str_replace("%s", $this->thawPrimaryEmbryologist->caption(), $this->thawPrimaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->thawSecondaryEmbryologist->Required) {
            if (!$this->thawSecondaryEmbryologist->IsDetailKey && EmptyValue($this->thawSecondaryEmbryologist->FormValue)) {
                $this->thawSecondaryEmbryologist->addErrorMessage(str_replace("%s", $this->thawSecondaryEmbryologist->caption(), $this->thawSecondaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->thawET->Required) {
            if (!$this->thawET->IsDetailKey && EmptyValue($this->thawET->FormValue)) {
                $this->thawET->addErrorMessage(str_replace("%s", $this->thawET->caption(), $this->thawET->RequiredErrorMessage));
            }
        }
        if ($this->thawReFrozen->Required) {
            if (!$this->thawReFrozen->IsDetailKey && EmptyValue($this->thawReFrozen->FormValue)) {
                $this->thawReFrozen->addErrorMessage(str_replace("%s", $this->thawReFrozen->caption(), $this->thawReFrozen->RequiredErrorMessage));
            }
        }
        if ($this->thawAbserve->Required) {
            if (!$this->thawAbserve->IsDetailKey && EmptyValue($this->thawAbserve->FormValue)) {
                $this->thawAbserve->addErrorMessage(str_replace("%s", $this->thawAbserve->caption(), $this->thawAbserve->RequiredErrorMessage));
            }
        }
        if ($this->thawDiscard->Required) {
            if (!$this->thawDiscard->IsDetailKey && EmptyValue($this->thawDiscard->FormValue)) {
                $this->thawDiscard->addErrorMessage(str_replace("%s", $this->thawDiscard->caption(), $this->thawDiscard->RequiredErrorMessage));
            }
        }
        if ($this->Catheter->Required) {
            if (!$this->Catheter->IsDetailKey && EmptyValue($this->Catheter->FormValue)) {
                $this->Catheter->addErrorMessage(str_replace("%s", $this->Catheter->caption(), $this->Catheter->RequiredErrorMessage));
            }
        }
        if ($this->Difficulty->Required) {
            if (!$this->Difficulty->IsDetailKey && EmptyValue($this->Difficulty->FormValue)) {
                $this->Difficulty->addErrorMessage(str_replace("%s", $this->Difficulty->caption(), $this->Difficulty->RequiredErrorMessage));
            }
        }
        if ($this->Easy->Required) {
            if (!$this->Easy->IsDetailKey && EmptyValue($this->Easy->FormValue)) {
                $this->Easy->addErrorMessage(str_replace("%s", $this->Easy->caption(), $this->Easy->RequiredErrorMessage));
            }
        }
        if ($this->Comments->Required) {
            if (!$this->Comments->IsDetailKey && EmptyValue($this->Comments->FormValue)) {
                $this->Comments->addErrorMessage(str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
            }
        }
        if ($this->Doctor->Required) {
            if (!$this->Doctor->IsDetailKey && EmptyValue($this->Doctor->FormValue)) {
                $this->Doctor->addErrorMessage(str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
            }
        }
        if ($this->Embryologist->Required) {
            if (!$this->Embryologist->IsDetailKey && EmptyValue($this->Embryologist->FormValue)) {
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

            // RIDNo
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, $this->RIDNo->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // TiDNo
            $this->TiDNo->setDbValueDef($rsnew, $this->TiDNo->CurrentValue, 0, $this->TiDNo->ReadOnly);

            // vitrificationDate
            $this->vitrificationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitrificationDate->CurrentValue, 0), null, $this->vitrificationDate->ReadOnly);

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->setDbValueDef($rsnew, $this->PrimaryEmbryologist->CurrentValue, null, $this->PrimaryEmbryologist->ReadOnly);

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->setDbValueDef($rsnew, $this->SecondaryEmbryologist->CurrentValue, null, $this->SecondaryEmbryologist->ReadOnly);

            // EmbryoNo
            $this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, null, $this->EmbryoNo->ReadOnly);

            // FertilisationDate
            $this->FertilisationDate->setDbValueDef($rsnew, UnFormatDateTime($this->FertilisationDate->CurrentValue, 0), null, $this->FertilisationDate->ReadOnly);

            // Day
            $this->Day->setDbValueDef($rsnew, $this->Day->CurrentValue, null, $this->Day->ReadOnly);

            // Grade
            $this->Grade->setDbValueDef($rsnew, $this->Grade->CurrentValue, null, $this->Grade->ReadOnly);

            // Incubator
            $this->Incubator->setDbValueDef($rsnew, $this->Incubator->CurrentValue, null, $this->Incubator->ReadOnly);

            // Tank
            $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, $this->Tank->ReadOnly);

            // Canister
            $this->Canister->setDbValueDef($rsnew, $this->Canister->CurrentValue, null, $this->Canister->ReadOnly);

            // Gobiet
            $this->Gobiet->setDbValueDef($rsnew, $this->Gobiet->CurrentValue, null, $this->Gobiet->ReadOnly);

            // CryolockNo
            $this->CryolockNo->setDbValueDef($rsnew, $this->CryolockNo->CurrentValue, null, $this->CryolockNo->ReadOnly);

            // CryolockColour
            $this->CryolockColour->setDbValueDef($rsnew, $this->CryolockColour->CurrentValue, null, $this->CryolockColour->ReadOnly);

            // Stage
            $this->Stage->setDbValueDef($rsnew, $this->Stage->CurrentValue, null, $this->Stage->ReadOnly);

            // thawDate
            $this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), null, $this->thawDate->ReadOnly);

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, null, $this->thawPrimaryEmbryologist->ReadOnly);

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, null, $this->thawSecondaryEmbryologist->ReadOnly);

            // thawET
            $this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, null, $this->thawET->ReadOnly);

            // thawReFrozen
            $this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, null, $this->thawReFrozen->ReadOnly);

            // thawAbserve
            $this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, null, $this->thawAbserve->ReadOnly);

            // thawDiscard
            $this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, null, $this->thawDiscard->ReadOnly);

            // Catheter
            $this->Catheter->setDbValueDef($rsnew, $this->Catheter->CurrentValue, null, $this->Catheter->ReadOnly);

            // Difficulty
            $this->Difficulty->setDbValueDef($rsnew, $this->Difficulty->CurrentValue, null, $this->Difficulty->ReadOnly);

            // Easy
            $this->Easy->setDbValueDef($rsnew, $this->Easy->CurrentValue, null, $this->Easy->ReadOnly);

            // Comments
            $this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, null, $this->Comments->ReadOnly);

            // Doctor
            $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, $this->Doctor->ReadOnly);

            // Embryologist
            $this->Embryologist->setDbValueDef($rsnew, $this->Embryologist->CurrentValue, null, $this->Embryologist->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfVitrificationList"), "", $this->TableVar, true);
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
                case "x_Day":
                    break;
                case "x_Grade":
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

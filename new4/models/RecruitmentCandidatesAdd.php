<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class RecruitmentCandidatesAdd extends RecruitmentCandidates
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'recruitment_candidates';

    // Page object name
    public $PageObjName = "RecruitmentCandidatesAdd";

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

        // Table object (recruitment_candidates)
        if (!isset($GLOBALS["recruitment_candidates"]) || get_class($GLOBALS["recruitment_candidates"]) == PROJECT_NAMESPACE . "recruitment_candidates") {
            $GLOBALS["recruitment_candidates"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_candidates');
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
                $doc = new $class(Container("recruitment_candidates"));
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
                    if ($pageName == "RecruitmentCandidatesView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

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
        $this->first_name->setVisibility();
        $this->last_name->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->gender->setVisibility();
        $this->marital_status->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->_email->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->cv_title->setVisibility();
        $this->cv->setVisibility();
        $this->cvtext->setVisibility();
        $this->industry->setVisibility();
        $this->profileImage->setVisibility();
        $this->head_line->setVisibility();
        $this->objective->setVisibility();
        $this->work_history->setVisibility();
        $this->education->setVisibility();
        $this->skills->setVisibility();
        $this->referees->setVisibility();
        $this->linkedInUrl->setVisibility();
        $this->linkedInData->setVisibility();
        $this->totalYearsOfExperience->setVisibility();
        $this->totalMonthsOfExperience->setVisibility();
        $this->htmlCVData->setVisibility();
        $this->generatedCVFile->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
        $this->expectedSalary->setVisibility();
        $this->preferedPositions->setVisibility();
        $this->preferedJobtype->setVisibility();
        $this->preferedCountries->setVisibility();
        $this->tags->setVisibility();
        $this->notes->setVisibility();
        $this->calls->setVisibility();
        $this->age->setVisibility();
        $this->hash->setVisibility();
        $this->linkedInProfileLink->setVisibility();
        $this->linkedInProfileId->setVisibility();
        $this->facebookProfileLink->setVisibility();
        $this->facebookProfileId->setVisibility();
        $this->twitterProfileLink->setVisibility();
        $this->twitterProfileId->setVisibility();
        $this->googleProfileLink->setVisibility();
        $this->googleProfileId->setVisibility();
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
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $this->setKey(Post($this->OldKeyName));
            $postBack = true;
        } else {
            // Load key values from QueryString
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $this->CopyRecord = !EmptyValue($this->OldKey);
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("RecruitmentCandidatesList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "RecruitmentCandidatesList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "RecruitmentCandidatesView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->first_name->CurrentValue = null;
        $this->first_name->OldValue = $this->first_name->CurrentValue;
        $this->last_name->CurrentValue = null;
        $this->last_name->OldValue = $this->last_name->CurrentValue;
        $this->nationality->CurrentValue = null;
        $this->nationality->OldValue = $this->nationality->CurrentValue;
        $this->birthday->CurrentValue = null;
        $this->birthday->OldValue = $this->birthday->CurrentValue;
        $this->gender->CurrentValue = null;
        $this->gender->OldValue = $this->gender->CurrentValue;
        $this->marital_status->CurrentValue = null;
        $this->marital_status->OldValue = $this->marital_status->CurrentValue;
        $this->address1->CurrentValue = null;
        $this->address1->OldValue = $this->address1->CurrentValue;
        $this->address2->CurrentValue = null;
        $this->address2->OldValue = $this->address2->CurrentValue;
        $this->city->CurrentValue = null;
        $this->city->OldValue = $this->city->CurrentValue;
        $this->country->CurrentValue = null;
        $this->country->OldValue = $this->country->CurrentValue;
        $this->province->CurrentValue = null;
        $this->province->OldValue = $this->province->CurrentValue;
        $this->postal_code->CurrentValue = null;
        $this->postal_code->OldValue = $this->postal_code->CurrentValue;
        $this->_email->CurrentValue = null;
        $this->_email->OldValue = $this->_email->CurrentValue;
        $this->home_phone->CurrentValue = null;
        $this->home_phone->OldValue = $this->home_phone->CurrentValue;
        $this->mobile_phone->CurrentValue = null;
        $this->mobile_phone->OldValue = $this->mobile_phone->CurrentValue;
        $this->cv_title->CurrentValue = null;
        $this->cv_title->OldValue = $this->cv_title->CurrentValue;
        $this->cv->CurrentValue = null;
        $this->cv->OldValue = $this->cv->CurrentValue;
        $this->cvtext->CurrentValue = null;
        $this->cvtext->OldValue = $this->cvtext->CurrentValue;
        $this->industry->CurrentValue = null;
        $this->industry->OldValue = $this->industry->CurrentValue;
        $this->profileImage->CurrentValue = null;
        $this->profileImage->OldValue = $this->profileImage->CurrentValue;
        $this->head_line->CurrentValue = null;
        $this->head_line->OldValue = $this->head_line->CurrentValue;
        $this->objective->CurrentValue = null;
        $this->objective->OldValue = $this->objective->CurrentValue;
        $this->work_history->CurrentValue = null;
        $this->work_history->OldValue = $this->work_history->CurrentValue;
        $this->education->CurrentValue = null;
        $this->education->OldValue = $this->education->CurrentValue;
        $this->skills->CurrentValue = null;
        $this->skills->OldValue = $this->skills->CurrentValue;
        $this->referees->CurrentValue = null;
        $this->referees->OldValue = $this->referees->CurrentValue;
        $this->linkedInUrl->CurrentValue = null;
        $this->linkedInUrl->OldValue = $this->linkedInUrl->CurrentValue;
        $this->linkedInData->CurrentValue = null;
        $this->linkedInData->OldValue = $this->linkedInData->CurrentValue;
        $this->totalYearsOfExperience->CurrentValue = null;
        $this->totalYearsOfExperience->OldValue = $this->totalYearsOfExperience->CurrentValue;
        $this->totalMonthsOfExperience->CurrentValue = null;
        $this->totalMonthsOfExperience->OldValue = $this->totalMonthsOfExperience->CurrentValue;
        $this->htmlCVData->CurrentValue = null;
        $this->htmlCVData->OldValue = $this->htmlCVData->CurrentValue;
        $this->generatedCVFile->CurrentValue = null;
        $this->generatedCVFile->OldValue = $this->generatedCVFile->CurrentValue;
        $this->created->CurrentValue = null;
        $this->created->OldValue = $this->created->CurrentValue;
        $this->updated->CurrentValue = null;
        $this->updated->OldValue = $this->updated->CurrentValue;
        $this->expectedSalary->CurrentValue = null;
        $this->expectedSalary->OldValue = $this->expectedSalary->CurrentValue;
        $this->preferedPositions->CurrentValue = null;
        $this->preferedPositions->OldValue = $this->preferedPositions->CurrentValue;
        $this->preferedJobtype->CurrentValue = null;
        $this->preferedJobtype->OldValue = $this->preferedJobtype->CurrentValue;
        $this->preferedCountries->CurrentValue = null;
        $this->preferedCountries->OldValue = $this->preferedCountries->CurrentValue;
        $this->tags->CurrentValue = null;
        $this->tags->OldValue = $this->tags->CurrentValue;
        $this->notes->CurrentValue = null;
        $this->notes->OldValue = $this->notes->CurrentValue;
        $this->calls->CurrentValue = null;
        $this->calls->OldValue = $this->calls->CurrentValue;
        $this->age->CurrentValue = null;
        $this->age->OldValue = $this->age->CurrentValue;
        $this->hash->CurrentValue = null;
        $this->hash->OldValue = $this->hash->CurrentValue;
        $this->linkedInProfileLink->CurrentValue = null;
        $this->linkedInProfileLink->OldValue = $this->linkedInProfileLink->CurrentValue;
        $this->linkedInProfileId->CurrentValue = null;
        $this->linkedInProfileId->OldValue = $this->linkedInProfileId->CurrentValue;
        $this->facebookProfileLink->CurrentValue = null;
        $this->facebookProfileLink->OldValue = $this->facebookProfileLink->CurrentValue;
        $this->facebookProfileId->CurrentValue = null;
        $this->facebookProfileId->OldValue = $this->facebookProfileId->CurrentValue;
        $this->twitterProfileLink->CurrentValue = null;
        $this->twitterProfileLink->OldValue = $this->twitterProfileLink->CurrentValue;
        $this->twitterProfileId->CurrentValue = null;
        $this->twitterProfileId->OldValue = $this->twitterProfileId->CurrentValue;
        $this->googleProfileLink->CurrentValue = null;
        $this->googleProfileLink->OldValue = $this->googleProfileLink->CurrentValue;
        $this->googleProfileId->CurrentValue = null;
        $this->googleProfileId->OldValue = $this->googleProfileId->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'first_name' first before field var 'x_first_name'
        $val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
        if (!$this->first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->first_name->Visible = false; // Disable update for API request
            } else {
                $this->first_name->setFormValue($val);
            }
        }

        // Check field name 'last_name' first before field var 'x_last_name'
        $val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
        if (!$this->last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->last_name->Visible = false; // Disable update for API request
            } else {
                $this->last_name->setFormValue($val);
            }
        }

        // Check field name 'nationality' first before field var 'x_nationality'
        $val = $CurrentForm->hasValue("nationality") ? $CurrentForm->getValue("nationality") : $CurrentForm->getValue("x_nationality");
        if (!$this->nationality->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nationality->Visible = false; // Disable update for API request
            } else {
                $this->nationality->setFormValue($val);
            }
        }

        // Check field name 'birthday' first before field var 'x_birthday'
        $val = $CurrentForm->hasValue("birthday") ? $CurrentForm->getValue("birthday") : $CurrentForm->getValue("x_birthday");
        if (!$this->birthday->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->birthday->Visible = false; // Disable update for API request
            } else {
                $this->birthday->setFormValue($val);
            }
            $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        }

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'marital_status' first before field var 'x_marital_status'
        $val = $CurrentForm->hasValue("marital_status") ? $CurrentForm->getValue("marital_status") : $CurrentForm->getValue("x_marital_status");
        if (!$this->marital_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->marital_status->Visible = false; // Disable update for API request
            } else {
                $this->marital_status->setFormValue($val);
            }
        }

        // Check field name 'address1' first before field var 'x_address1'
        $val = $CurrentForm->hasValue("address1") ? $CurrentForm->getValue("address1") : $CurrentForm->getValue("x_address1");
        if (!$this->address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->address1->Visible = false; // Disable update for API request
            } else {
                $this->address1->setFormValue($val);
            }
        }

        // Check field name 'address2' first before field var 'x_address2'
        $val = $CurrentForm->hasValue("address2") ? $CurrentForm->getValue("address2") : $CurrentForm->getValue("x_address2");
        if (!$this->address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->address2->Visible = false; // Disable update for API request
            } else {
                $this->address2->setFormValue($val);
            }
        }

        // Check field name 'city' first before field var 'x_city'
        $val = $CurrentForm->hasValue("city") ? $CurrentForm->getValue("city") : $CurrentForm->getValue("x_city");
        if (!$this->city->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->city->Visible = false; // Disable update for API request
            } else {
                $this->city->setFormValue($val);
            }
        }

        // Check field name 'country' first before field var 'x_country'
        $val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
        if (!$this->country->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->country->Visible = false; // Disable update for API request
            } else {
                $this->country->setFormValue($val);
            }
        }

        // Check field name 'province' first before field var 'x_province'
        $val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
        if (!$this->province->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->province->Visible = false; // Disable update for API request
            } else {
                $this->province->setFormValue($val);
            }
        }

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'email' first before field var 'x__email'
        $val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
        if (!$this->_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_email->Visible = false; // Disable update for API request
            } else {
                $this->_email->setFormValue($val);
            }
        }

        // Check field name 'home_phone' first before field var 'x_home_phone'
        $val = $CurrentForm->hasValue("home_phone") ? $CurrentForm->getValue("home_phone") : $CurrentForm->getValue("x_home_phone");
        if (!$this->home_phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->home_phone->Visible = false; // Disable update for API request
            } else {
                $this->home_phone->setFormValue($val);
            }
        }

        // Check field name 'mobile_phone' first before field var 'x_mobile_phone'
        $val = $CurrentForm->hasValue("mobile_phone") ? $CurrentForm->getValue("mobile_phone") : $CurrentForm->getValue("x_mobile_phone");
        if (!$this->mobile_phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile_phone->Visible = false; // Disable update for API request
            } else {
                $this->mobile_phone->setFormValue($val);
            }
        }

        // Check field name 'cv_title' first before field var 'x_cv_title'
        $val = $CurrentForm->hasValue("cv_title") ? $CurrentForm->getValue("cv_title") : $CurrentForm->getValue("x_cv_title");
        if (!$this->cv_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cv_title->Visible = false; // Disable update for API request
            } else {
                $this->cv_title->setFormValue($val);
            }
        }

        // Check field name 'cv' first before field var 'x_cv'
        $val = $CurrentForm->hasValue("cv") ? $CurrentForm->getValue("cv") : $CurrentForm->getValue("x_cv");
        if (!$this->cv->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cv->Visible = false; // Disable update for API request
            } else {
                $this->cv->setFormValue($val);
            }
        }

        // Check field name 'cvtext' first before field var 'x_cvtext'
        $val = $CurrentForm->hasValue("cvtext") ? $CurrentForm->getValue("cvtext") : $CurrentForm->getValue("x_cvtext");
        if (!$this->cvtext->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cvtext->Visible = false; // Disable update for API request
            } else {
                $this->cvtext->setFormValue($val);
            }
        }

        // Check field name 'industry' first before field var 'x_industry'
        $val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
        if (!$this->industry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->industry->Visible = false; // Disable update for API request
            } else {
                $this->industry->setFormValue($val);
            }
        }

        // Check field name 'profileImage' first before field var 'x_profileImage'
        $val = $CurrentForm->hasValue("profileImage") ? $CurrentForm->getValue("profileImage") : $CurrentForm->getValue("x_profileImage");
        if (!$this->profileImage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profileImage->Visible = false; // Disable update for API request
            } else {
                $this->profileImage->setFormValue($val);
            }
        }

        // Check field name 'head_line' first before field var 'x_head_line'
        $val = $CurrentForm->hasValue("head_line") ? $CurrentForm->getValue("head_line") : $CurrentForm->getValue("x_head_line");
        if (!$this->head_line->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->head_line->Visible = false; // Disable update for API request
            } else {
                $this->head_line->setFormValue($val);
            }
        }

        // Check field name 'objective' first before field var 'x_objective'
        $val = $CurrentForm->hasValue("objective") ? $CurrentForm->getValue("objective") : $CurrentForm->getValue("x_objective");
        if (!$this->objective->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->objective->Visible = false; // Disable update for API request
            } else {
                $this->objective->setFormValue($val);
            }
        }

        // Check field name 'work_history' first before field var 'x_work_history'
        $val = $CurrentForm->hasValue("work_history") ? $CurrentForm->getValue("work_history") : $CurrentForm->getValue("x_work_history");
        if (!$this->work_history->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->work_history->Visible = false; // Disable update for API request
            } else {
                $this->work_history->setFormValue($val);
            }
        }

        // Check field name 'education' first before field var 'x_education'
        $val = $CurrentForm->hasValue("education") ? $CurrentForm->getValue("education") : $CurrentForm->getValue("x_education");
        if (!$this->education->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->education->Visible = false; // Disable update for API request
            } else {
                $this->education->setFormValue($val);
            }
        }

        // Check field name 'skills' first before field var 'x_skills'
        $val = $CurrentForm->hasValue("skills") ? $CurrentForm->getValue("skills") : $CurrentForm->getValue("x_skills");
        if (!$this->skills->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->skills->Visible = false; // Disable update for API request
            } else {
                $this->skills->setFormValue($val);
            }
        }

        // Check field name 'referees' first before field var 'x_referees'
        $val = $CurrentForm->hasValue("referees") ? $CurrentForm->getValue("referees") : $CurrentForm->getValue("x_referees");
        if (!$this->referees->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->referees->Visible = false; // Disable update for API request
            } else {
                $this->referees->setFormValue($val);
            }
        }

        // Check field name 'linkedInUrl' first before field var 'x_linkedInUrl'
        $val = $CurrentForm->hasValue("linkedInUrl") ? $CurrentForm->getValue("linkedInUrl") : $CurrentForm->getValue("x_linkedInUrl");
        if (!$this->linkedInUrl->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->linkedInUrl->Visible = false; // Disable update for API request
            } else {
                $this->linkedInUrl->setFormValue($val);
            }
        }

        // Check field name 'linkedInData' first before field var 'x_linkedInData'
        $val = $CurrentForm->hasValue("linkedInData") ? $CurrentForm->getValue("linkedInData") : $CurrentForm->getValue("x_linkedInData");
        if (!$this->linkedInData->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->linkedInData->Visible = false; // Disable update for API request
            } else {
                $this->linkedInData->setFormValue($val);
            }
        }

        // Check field name 'totalYearsOfExperience' first before field var 'x_totalYearsOfExperience'
        $val = $CurrentForm->hasValue("totalYearsOfExperience") ? $CurrentForm->getValue("totalYearsOfExperience") : $CurrentForm->getValue("x_totalYearsOfExperience");
        if (!$this->totalYearsOfExperience->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->totalYearsOfExperience->Visible = false; // Disable update for API request
            } else {
                $this->totalYearsOfExperience->setFormValue($val);
            }
        }

        // Check field name 'totalMonthsOfExperience' first before field var 'x_totalMonthsOfExperience'
        $val = $CurrentForm->hasValue("totalMonthsOfExperience") ? $CurrentForm->getValue("totalMonthsOfExperience") : $CurrentForm->getValue("x_totalMonthsOfExperience");
        if (!$this->totalMonthsOfExperience->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->totalMonthsOfExperience->Visible = false; // Disable update for API request
            } else {
                $this->totalMonthsOfExperience->setFormValue($val);
            }
        }

        // Check field name 'htmlCVData' first before field var 'x_htmlCVData'
        $val = $CurrentForm->hasValue("htmlCVData") ? $CurrentForm->getValue("htmlCVData") : $CurrentForm->getValue("x_htmlCVData");
        if (!$this->htmlCVData->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->htmlCVData->Visible = false; // Disable update for API request
            } else {
                $this->htmlCVData->setFormValue($val);
            }
        }

        // Check field name 'generatedCVFile' first before field var 'x_generatedCVFile'
        $val = $CurrentForm->hasValue("generatedCVFile") ? $CurrentForm->getValue("generatedCVFile") : $CurrentForm->getValue("x_generatedCVFile");
        if (!$this->generatedCVFile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->generatedCVFile->Visible = false; // Disable update for API request
            } else {
                $this->generatedCVFile->setFormValue($val);
            }
        }

        // Check field name 'created' first before field var 'x_created'
        $val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
        if (!$this->created->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->created->Visible = false; // Disable update for API request
            } else {
                $this->created->setFormValue($val);
            }
            $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        }

        // Check field name 'updated' first before field var 'x_updated'
        $val = $CurrentForm->hasValue("updated") ? $CurrentForm->getValue("updated") : $CurrentForm->getValue("x_updated");
        if (!$this->updated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->updated->Visible = false; // Disable update for API request
            } else {
                $this->updated->setFormValue($val);
            }
            $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
        }

        // Check field name 'expectedSalary' first before field var 'x_expectedSalary'
        $val = $CurrentForm->hasValue("expectedSalary") ? $CurrentForm->getValue("expectedSalary") : $CurrentForm->getValue("x_expectedSalary");
        if (!$this->expectedSalary->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->expectedSalary->Visible = false; // Disable update for API request
            } else {
                $this->expectedSalary->setFormValue($val);
            }
        }

        // Check field name 'preferedPositions' first before field var 'x_preferedPositions'
        $val = $CurrentForm->hasValue("preferedPositions") ? $CurrentForm->getValue("preferedPositions") : $CurrentForm->getValue("x_preferedPositions");
        if (!$this->preferedPositions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->preferedPositions->Visible = false; // Disable update for API request
            } else {
                $this->preferedPositions->setFormValue($val);
            }
        }

        // Check field name 'preferedJobtype' first before field var 'x_preferedJobtype'
        $val = $CurrentForm->hasValue("preferedJobtype") ? $CurrentForm->getValue("preferedJobtype") : $CurrentForm->getValue("x_preferedJobtype");
        if (!$this->preferedJobtype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->preferedJobtype->Visible = false; // Disable update for API request
            } else {
                $this->preferedJobtype->setFormValue($val);
            }
        }

        // Check field name 'preferedCountries' first before field var 'x_preferedCountries'
        $val = $CurrentForm->hasValue("preferedCountries") ? $CurrentForm->getValue("preferedCountries") : $CurrentForm->getValue("x_preferedCountries");
        if (!$this->preferedCountries->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->preferedCountries->Visible = false; // Disable update for API request
            } else {
                $this->preferedCountries->setFormValue($val);
            }
        }

        // Check field name 'tags' first before field var 'x_tags'
        $val = $CurrentForm->hasValue("tags") ? $CurrentForm->getValue("tags") : $CurrentForm->getValue("x_tags");
        if (!$this->tags->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->tags->Visible = false; // Disable update for API request
            } else {
                $this->tags->setFormValue($val);
            }
        }

        // Check field name 'notes' first before field var 'x_notes'
        $val = $CurrentForm->hasValue("notes") ? $CurrentForm->getValue("notes") : $CurrentForm->getValue("x_notes");
        if (!$this->notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->notes->Visible = false; // Disable update for API request
            } else {
                $this->notes->setFormValue($val);
            }
        }

        // Check field name 'calls' first before field var 'x_calls'
        $val = $CurrentForm->hasValue("calls") ? $CurrentForm->getValue("calls") : $CurrentForm->getValue("x_calls");
        if (!$this->calls->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->calls->Visible = false; // Disable update for API request
            } else {
                $this->calls->setFormValue($val);
            }
        }

        // Check field name 'age' first before field var 'x_age'
        $val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
        if (!$this->age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->age->Visible = false; // Disable update for API request
            } else {
                $this->age->setFormValue($val);
            }
        }

        // Check field name 'hash' first before field var 'x_hash'
        $val = $CurrentForm->hasValue("hash") ? $CurrentForm->getValue("hash") : $CurrentForm->getValue("x_hash");
        if (!$this->hash->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->hash->Visible = false; // Disable update for API request
            } else {
                $this->hash->setFormValue($val);
            }
        }

        // Check field name 'linkedInProfileLink' first before field var 'x_linkedInProfileLink'
        $val = $CurrentForm->hasValue("linkedInProfileLink") ? $CurrentForm->getValue("linkedInProfileLink") : $CurrentForm->getValue("x_linkedInProfileLink");
        if (!$this->linkedInProfileLink->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->linkedInProfileLink->Visible = false; // Disable update for API request
            } else {
                $this->linkedInProfileLink->setFormValue($val);
            }
        }

        // Check field name 'linkedInProfileId' first before field var 'x_linkedInProfileId'
        $val = $CurrentForm->hasValue("linkedInProfileId") ? $CurrentForm->getValue("linkedInProfileId") : $CurrentForm->getValue("x_linkedInProfileId");
        if (!$this->linkedInProfileId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->linkedInProfileId->Visible = false; // Disable update for API request
            } else {
                $this->linkedInProfileId->setFormValue($val);
            }
        }

        // Check field name 'facebookProfileLink' first before field var 'x_facebookProfileLink'
        $val = $CurrentForm->hasValue("facebookProfileLink") ? $CurrentForm->getValue("facebookProfileLink") : $CurrentForm->getValue("x_facebookProfileLink");
        if (!$this->facebookProfileLink->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->facebookProfileLink->Visible = false; // Disable update for API request
            } else {
                $this->facebookProfileLink->setFormValue($val);
            }
        }

        // Check field name 'facebookProfileId' first before field var 'x_facebookProfileId'
        $val = $CurrentForm->hasValue("facebookProfileId") ? $CurrentForm->getValue("facebookProfileId") : $CurrentForm->getValue("x_facebookProfileId");
        if (!$this->facebookProfileId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->facebookProfileId->Visible = false; // Disable update for API request
            } else {
                $this->facebookProfileId->setFormValue($val);
            }
        }

        // Check field name 'twitterProfileLink' first before field var 'x_twitterProfileLink'
        $val = $CurrentForm->hasValue("twitterProfileLink") ? $CurrentForm->getValue("twitterProfileLink") : $CurrentForm->getValue("x_twitterProfileLink");
        if (!$this->twitterProfileLink->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->twitterProfileLink->Visible = false; // Disable update for API request
            } else {
                $this->twitterProfileLink->setFormValue($val);
            }
        }

        // Check field name 'twitterProfileId' first before field var 'x_twitterProfileId'
        $val = $CurrentForm->hasValue("twitterProfileId") ? $CurrentForm->getValue("twitterProfileId") : $CurrentForm->getValue("x_twitterProfileId");
        if (!$this->twitterProfileId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->twitterProfileId->Visible = false; // Disable update for API request
            } else {
                $this->twitterProfileId->setFormValue($val);
            }
        }

        // Check field name 'googleProfileLink' first before field var 'x_googleProfileLink'
        $val = $CurrentForm->hasValue("googleProfileLink") ? $CurrentForm->getValue("googleProfileLink") : $CurrentForm->getValue("x_googleProfileLink");
        if (!$this->googleProfileLink->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->googleProfileLink->Visible = false; // Disable update for API request
            } else {
                $this->googleProfileLink->setFormValue($val);
            }
        }

        // Check field name 'googleProfileId' first before field var 'x_googleProfileId'
        $val = $CurrentForm->hasValue("googleProfileId") ? $CurrentForm->getValue("googleProfileId") : $CurrentForm->getValue("x_googleProfileId");
        if (!$this->googleProfileId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->googleProfileId->Visible = false; // Disable update for API request
            } else {
                $this->googleProfileId->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->first_name->CurrentValue = $this->first_name->FormValue;
        $this->last_name->CurrentValue = $this->last_name->FormValue;
        $this->nationality->CurrentValue = $this->nationality->FormValue;
        $this->birthday->CurrentValue = $this->birthday->FormValue;
        $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->marital_status->CurrentValue = $this->marital_status->FormValue;
        $this->address1->CurrentValue = $this->address1->FormValue;
        $this->address2->CurrentValue = $this->address2->FormValue;
        $this->city->CurrentValue = $this->city->FormValue;
        $this->country->CurrentValue = $this->country->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->_email->CurrentValue = $this->_email->FormValue;
        $this->home_phone->CurrentValue = $this->home_phone->FormValue;
        $this->mobile_phone->CurrentValue = $this->mobile_phone->FormValue;
        $this->cv_title->CurrentValue = $this->cv_title->FormValue;
        $this->cv->CurrentValue = $this->cv->FormValue;
        $this->cvtext->CurrentValue = $this->cvtext->FormValue;
        $this->industry->CurrentValue = $this->industry->FormValue;
        $this->profileImage->CurrentValue = $this->profileImage->FormValue;
        $this->head_line->CurrentValue = $this->head_line->FormValue;
        $this->objective->CurrentValue = $this->objective->FormValue;
        $this->work_history->CurrentValue = $this->work_history->FormValue;
        $this->education->CurrentValue = $this->education->FormValue;
        $this->skills->CurrentValue = $this->skills->FormValue;
        $this->referees->CurrentValue = $this->referees->FormValue;
        $this->linkedInUrl->CurrentValue = $this->linkedInUrl->FormValue;
        $this->linkedInData->CurrentValue = $this->linkedInData->FormValue;
        $this->totalYearsOfExperience->CurrentValue = $this->totalYearsOfExperience->FormValue;
        $this->totalMonthsOfExperience->CurrentValue = $this->totalMonthsOfExperience->FormValue;
        $this->htmlCVData->CurrentValue = $this->htmlCVData->FormValue;
        $this->generatedCVFile->CurrentValue = $this->generatedCVFile->FormValue;
        $this->created->CurrentValue = $this->created->FormValue;
        $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        $this->updated->CurrentValue = $this->updated->FormValue;
        $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
        $this->expectedSalary->CurrentValue = $this->expectedSalary->FormValue;
        $this->preferedPositions->CurrentValue = $this->preferedPositions->FormValue;
        $this->preferedJobtype->CurrentValue = $this->preferedJobtype->FormValue;
        $this->preferedCountries->CurrentValue = $this->preferedCountries->FormValue;
        $this->tags->CurrentValue = $this->tags->FormValue;
        $this->notes->CurrentValue = $this->notes->FormValue;
        $this->calls->CurrentValue = $this->calls->FormValue;
        $this->age->CurrentValue = $this->age->FormValue;
        $this->hash->CurrentValue = $this->hash->FormValue;
        $this->linkedInProfileLink->CurrentValue = $this->linkedInProfileLink->FormValue;
        $this->linkedInProfileId->CurrentValue = $this->linkedInProfileId->FormValue;
        $this->facebookProfileLink->CurrentValue = $this->facebookProfileLink->FormValue;
        $this->facebookProfileId->CurrentValue = $this->facebookProfileId->FormValue;
        $this->twitterProfileLink->CurrentValue = $this->twitterProfileLink->FormValue;
        $this->twitterProfileId->CurrentValue = $this->twitterProfileId->FormValue;
        $this->googleProfileLink->CurrentValue = $this->googleProfileLink->FormValue;
        $this->googleProfileId->CurrentValue = $this->googleProfileId->FormValue;
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
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->gender->setDbValue($row['gender']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->_email->setDbValue($row['email']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->cv_title->setDbValue($row['cv_title']);
        $this->cv->setDbValue($row['cv']);
        $this->cvtext->setDbValue($row['cvtext']);
        $this->industry->setDbValue($row['industry']);
        $this->profileImage->setDbValue($row['profileImage']);
        $this->head_line->setDbValue($row['head_line']);
        $this->objective->setDbValue($row['objective']);
        $this->work_history->setDbValue($row['work_history']);
        $this->education->setDbValue($row['education']);
        $this->skills->setDbValue($row['skills']);
        $this->referees->setDbValue($row['referees']);
        $this->linkedInUrl->setDbValue($row['linkedInUrl']);
        $this->linkedInData->setDbValue($row['linkedInData']);
        $this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
        $this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
        $this->htmlCVData->setDbValue($row['htmlCVData']);
        $this->generatedCVFile->setDbValue($row['generatedCVFile']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->expectedSalary->setDbValue($row['expectedSalary']);
        $this->preferedPositions->setDbValue($row['preferedPositions']);
        $this->preferedJobtype->setDbValue($row['preferedJobtype']);
        $this->preferedCountries->setDbValue($row['preferedCountries']);
        $this->tags->setDbValue($row['tags']);
        $this->notes->setDbValue($row['notes']);
        $this->calls->setDbValue($row['calls']);
        $this->age->setDbValue($row['age']);
        $this->hash->setDbValue($row['hash']);
        $this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
        $this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
        $this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
        $this->facebookProfileId->setDbValue($row['facebookProfileId']);
        $this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
        $this->twitterProfileId->setDbValue($row['twitterProfileId']);
        $this->googleProfileLink->setDbValue($row['googleProfileLink']);
        $this->googleProfileId->setDbValue($row['googleProfileId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['first_name'] = $this->first_name->CurrentValue;
        $row['last_name'] = $this->last_name->CurrentValue;
        $row['nationality'] = $this->nationality->CurrentValue;
        $row['birthday'] = $this->birthday->CurrentValue;
        $row['gender'] = $this->gender->CurrentValue;
        $row['marital_status'] = $this->marital_status->CurrentValue;
        $row['address1'] = $this->address1->CurrentValue;
        $row['address2'] = $this->address2->CurrentValue;
        $row['city'] = $this->city->CurrentValue;
        $row['country'] = $this->country->CurrentValue;
        $row['province'] = $this->province->CurrentValue;
        $row['postal_code'] = $this->postal_code->CurrentValue;
        $row['email'] = $this->_email->CurrentValue;
        $row['home_phone'] = $this->home_phone->CurrentValue;
        $row['mobile_phone'] = $this->mobile_phone->CurrentValue;
        $row['cv_title'] = $this->cv_title->CurrentValue;
        $row['cv'] = $this->cv->CurrentValue;
        $row['cvtext'] = $this->cvtext->CurrentValue;
        $row['industry'] = $this->industry->CurrentValue;
        $row['profileImage'] = $this->profileImage->CurrentValue;
        $row['head_line'] = $this->head_line->CurrentValue;
        $row['objective'] = $this->objective->CurrentValue;
        $row['work_history'] = $this->work_history->CurrentValue;
        $row['education'] = $this->education->CurrentValue;
        $row['skills'] = $this->skills->CurrentValue;
        $row['referees'] = $this->referees->CurrentValue;
        $row['linkedInUrl'] = $this->linkedInUrl->CurrentValue;
        $row['linkedInData'] = $this->linkedInData->CurrentValue;
        $row['totalYearsOfExperience'] = $this->totalYearsOfExperience->CurrentValue;
        $row['totalMonthsOfExperience'] = $this->totalMonthsOfExperience->CurrentValue;
        $row['htmlCVData'] = $this->htmlCVData->CurrentValue;
        $row['generatedCVFile'] = $this->generatedCVFile->CurrentValue;
        $row['created'] = $this->created->CurrentValue;
        $row['updated'] = $this->updated->CurrentValue;
        $row['expectedSalary'] = $this->expectedSalary->CurrentValue;
        $row['preferedPositions'] = $this->preferedPositions->CurrentValue;
        $row['preferedJobtype'] = $this->preferedJobtype->CurrentValue;
        $row['preferedCountries'] = $this->preferedCountries->CurrentValue;
        $row['tags'] = $this->tags->CurrentValue;
        $row['notes'] = $this->notes->CurrentValue;
        $row['calls'] = $this->calls->CurrentValue;
        $row['age'] = $this->age->CurrentValue;
        $row['hash'] = $this->hash->CurrentValue;
        $row['linkedInProfileLink'] = $this->linkedInProfileLink->CurrentValue;
        $row['linkedInProfileId'] = $this->linkedInProfileId->CurrentValue;
        $row['facebookProfileLink'] = $this->facebookProfileLink->CurrentValue;
        $row['facebookProfileId'] = $this->facebookProfileId->CurrentValue;
        $row['twitterProfileLink'] = $this->twitterProfileLink->CurrentValue;
        $row['twitterProfileId'] = $this->twitterProfileId->CurrentValue;
        $row['googleProfileLink'] = $this->googleProfileLink->CurrentValue;
        $row['googleProfileId'] = $this->googleProfileId->CurrentValue;
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

        // first_name

        // last_name

        // nationality

        // birthday

        // gender

        // marital_status

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // email

        // home_phone

        // mobile_phone

        // cv_title

        // cv

        // cvtext

        // industry

        // profileImage

        // head_line

        // objective

        // work_history

        // education

        // skills

        // referees

        // linkedInUrl

        // linkedInData

        // totalYearsOfExperience

        // totalMonthsOfExperience

        // htmlCVData

        // generatedCVFile

        // created

        // updated

        // expectedSalary

        // preferedPositions

        // preferedJobtype

        // preferedCountries

        // tags

        // notes

        // calls

        // age

        // hash

        // linkedInProfileLink

        // linkedInProfileId

        // facebookProfileLink

        // facebookProfileId

        // twitterProfileLink

        // twitterProfileId

        // googleProfileLink

        // googleProfileId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // nationality
            $this->nationality->ViewValue = $this->nationality->CurrentValue;
            $this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // gender
            if (strval($this->gender->CurrentValue) != "") {
                $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // cv_title
            $this->cv_title->ViewValue = $this->cv_title->CurrentValue;
            $this->cv_title->ViewCustomAttributes = "";

            // cv
            $this->cv->ViewValue = $this->cv->CurrentValue;
            $this->cv->ViewCustomAttributes = "";

            // cvtext
            $this->cvtext->ViewValue = $this->cvtext->CurrentValue;
            $this->cvtext->ViewCustomAttributes = "";

            // industry
            $this->industry->ViewValue = $this->industry->CurrentValue;
            $this->industry->ViewCustomAttributes = "";

            // profileImage
            $this->profileImage->ViewValue = $this->profileImage->CurrentValue;
            $this->profileImage->ViewCustomAttributes = "";

            // head_line
            $this->head_line->ViewValue = $this->head_line->CurrentValue;
            $this->head_line->ViewCustomAttributes = "";

            // objective
            $this->objective->ViewValue = $this->objective->CurrentValue;
            $this->objective->ViewCustomAttributes = "";

            // work_history
            $this->work_history->ViewValue = $this->work_history->CurrentValue;
            $this->work_history->ViewCustomAttributes = "";

            // education
            $this->education->ViewValue = $this->education->CurrentValue;
            $this->education->ViewCustomAttributes = "";

            // skills
            $this->skills->ViewValue = $this->skills->CurrentValue;
            $this->skills->ViewCustomAttributes = "";

            // referees
            $this->referees->ViewValue = $this->referees->CurrentValue;
            $this->referees->ViewCustomAttributes = "";

            // linkedInUrl
            $this->linkedInUrl->ViewValue = $this->linkedInUrl->CurrentValue;
            $this->linkedInUrl->ViewCustomAttributes = "";

            // linkedInData
            $this->linkedInData->ViewValue = $this->linkedInData->CurrentValue;
            $this->linkedInData->ViewCustomAttributes = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
            $this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalYearsOfExperience->ViewCustomAttributes = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
            $this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalMonthsOfExperience->ViewCustomAttributes = "";

            // htmlCVData
            $this->htmlCVData->ViewValue = $this->htmlCVData->CurrentValue;
            $this->htmlCVData->ViewCustomAttributes = "";

            // generatedCVFile
            $this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
            $this->generatedCVFile->ViewCustomAttributes = "";

            // created
            $this->created->ViewValue = $this->created->CurrentValue;
            $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
            $this->created->ViewCustomAttributes = "";

            // updated
            $this->updated->ViewValue = $this->updated->CurrentValue;
            $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
            $this->updated->ViewCustomAttributes = "";

            // expectedSalary
            $this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
            $this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
            $this->expectedSalary->ViewCustomAttributes = "";

            // preferedPositions
            $this->preferedPositions->ViewValue = $this->preferedPositions->CurrentValue;
            $this->preferedPositions->ViewCustomAttributes = "";

            // preferedJobtype
            $this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
            $this->preferedJobtype->ViewCustomAttributes = "";

            // preferedCountries
            $this->preferedCountries->ViewValue = $this->preferedCountries->CurrentValue;
            $this->preferedCountries->ViewCustomAttributes = "";

            // tags
            $this->tags->ViewValue = $this->tags->CurrentValue;
            $this->tags->ViewCustomAttributes = "";

            // notes
            $this->notes->ViewValue = $this->notes->CurrentValue;
            $this->notes->ViewCustomAttributes = "";

            // calls
            $this->calls->ViewValue = $this->calls->CurrentValue;
            $this->calls->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
            $this->age->ViewCustomAttributes = "";

            // hash
            $this->hash->ViewValue = $this->hash->CurrentValue;
            $this->hash->ViewCustomAttributes = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
            $this->linkedInProfileLink->ViewCustomAttributes = "";

            // linkedInProfileId
            $this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
            $this->linkedInProfileId->ViewCustomAttributes = "";

            // facebookProfileLink
            $this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
            $this->facebookProfileLink->ViewCustomAttributes = "";

            // facebookProfileId
            $this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
            $this->facebookProfileId->ViewCustomAttributes = "";

            // twitterProfileLink
            $this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
            $this->twitterProfileLink->ViewCustomAttributes = "";

            // twitterProfileId
            $this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
            $this->twitterProfileId->ViewCustomAttributes = "";

            // googleProfileLink
            $this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
            $this->googleProfileLink->ViewCustomAttributes = "";

            // googleProfileId
            $this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
            $this->googleProfileId->ViewCustomAttributes = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // cv_title
            $this->cv_title->LinkCustomAttributes = "";
            $this->cv_title->HrefValue = "";
            $this->cv_title->TooltipValue = "";

            // cv
            $this->cv->LinkCustomAttributes = "";
            $this->cv->HrefValue = "";
            $this->cv->TooltipValue = "";

            // cvtext
            $this->cvtext->LinkCustomAttributes = "";
            $this->cvtext->HrefValue = "";
            $this->cvtext->TooltipValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";
            $this->industry->TooltipValue = "";

            // profileImage
            $this->profileImage->LinkCustomAttributes = "";
            $this->profileImage->HrefValue = "";
            $this->profileImage->TooltipValue = "";

            // head_line
            $this->head_line->LinkCustomAttributes = "";
            $this->head_line->HrefValue = "";
            $this->head_line->TooltipValue = "";

            // objective
            $this->objective->LinkCustomAttributes = "";
            $this->objective->HrefValue = "";
            $this->objective->TooltipValue = "";

            // work_history
            $this->work_history->LinkCustomAttributes = "";
            $this->work_history->HrefValue = "";
            $this->work_history->TooltipValue = "";

            // education
            $this->education->LinkCustomAttributes = "";
            $this->education->HrefValue = "";
            $this->education->TooltipValue = "";

            // skills
            $this->skills->LinkCustomAttributes = "";
            $this->skills->HrefValue = "";
            $this->skills->TooltipValue = "";

            // referees
            $this->referees->LinkCustomAttributes = "";
            $this->referees->HrefValue = "";
            $this->referees->TooltipValue = "";

            // linkedInUrl
            $this->linkedInUrl->LinkCustomAttributes = "";
            $this->linkedInUrl->HrefValue = "";
            $this->linkedInUrl->TooltipValue = "";

            // linkedInData
            $this->linkedInData->LinkCustomAttributes = "";
            $this->linkedInData->HrefValue = "";
            $this->linkedInData->TooltipValue = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->LinkCustomAttributes = "";
            $this->totalYearsOfExperience->HrefValue = "";
            $this->totalYearsOfExperience->TooltipValue = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->LinkCustomAttributes = "";
            $this->totalMonthsOfExperience->HrefValue = "";
            $this->totalMonthsOfExperience->TooltipValue = "";

            // htmlCVData
            $this->htmlCVData->LinkCustomAttributes = "";
            $this->htmlCVData->HrefValue = "";
            $this->htmlCVData->TooltipValue = "";

            // generatedCVFile
            $this->generatedCVFile->LinkCustomAttributes = "";
            $this->generatedCVFile->HrefValue = "";
            $this->generatedCVFile->TooltipValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";
            $this->created->TooltipValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";
            $this->updated->TooltipValue = "";

            // expectedSalary
            $this->expectedSalary->LinkCustomAttributes = "";
            $this->expectedSalary->HrefValue = "";
            $this->expectedSalary->TooltipValue = "";

            // preferedPositions
            $this->preferedPositions->LinkCustomAttributes = "";
            $this->preferedPositions->HrefValue = "";
            $this->preferedPositions->TooltipValue = "";

            // preferedJobtype
            $this->preferedJobtype->LinkCustomAttributes = "";
            $this->preferedJobtype->HrefValue = "";
            $this->preferedJobtype->TooltipValue = "";

            // preferedCountries
            $this->preferedCountries->LinkCustomAttributes = "";
            $this->preferedCountries->HrefValue = "";
            $this->preferedCountries->TooltipValue = "";

            // tags
            $this->tags->LinkCustomAttributes = "";
            $this->tags->HrefValue = "";
            $this->tags->TooltipValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";
            $this->notes->TooltipValue = "";

            // calls
            $this->calls->LinkCustomAttributes = "";
            $this->calls->HrefValue = "";
            $this->calls->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // hash
            $this->hash->LinkCustomAttributes = "";
            $this->hash->HrefValue = "";
            $this->hash->TooltipValue = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->LinkCustomAttributes = "";
            $this->linkedInProfileLink->HrefValue = "";
            $this->linkedInProfileLink->TooltipValue = "";

            // linkedInProfileId
            $this->linkedInProfileId->LinkCustomAttributes = "";
            $this->linkedInProfileId->HrefValue = "";
            $this->linkedInProfileId->TooltipValue = "";

            // facebookProfileLink
            $this->facebookProfileLink->LinkCustomAttributes = "";
            $this->facebookProfileLink->HrefValue = "";
            $this->facebookProfileLink->TooltipValue = "";

            // facebookProfileId
            $this->facebookProfileId->LinkCustomAttributes = "";
            $this->facebookProfileId->HrefValue = "";
            $this->facebookProfileId->TooltipValue = "";

            // twitterProfileLink
            $this->twitterProfileLink->LinkCustomAttributes = "";
            $this->twitterProfileLink->HrefValue = "";
            $this->twitterProfileLink->TooltipValue = "";

            // twitterProfileId
            $this->twitterProfileId->LinkCustomAttributes = "";
            $this->twitterProfileId->HrefValue = "";
            $this->twitterProfileId->TooltipValue = "";

            // googleProfileLink
            $this->googleProfileLink->LinkCustomAttributes = "";
            $this->googleProfileLink->HrefValue = "";
            $this->googleProfileLink->TooltipValue = "";

            // googleProfileId
            $this->googleProfileId->LinkCustomAttributes = "";
            $this->googleProfileId->HrefValue = "";
            $this->googleProfileId->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // nationality
            $this->nationality->EditAttrs["class"] = "form-control";
            $this->nationality->EditCustomAttributes = "";
            $this->nationality->EditValue = HtmlEncode($this->nationality->CurrentValue);
            $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

            // birthday
            $this->birthday->EditAttrs["class"] = "form-control";
            $this->birthday->EditCustomAttributes = "";
            $this->birthday->EditValue = HtmlEncode(FormatDateTime($this->birthday->CurrentValue, 8));
            $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

            // gender
            $this->gender->EditCustomAttributes = "";
            $this->gender->EditValue = $this->gender->options(false);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // marital_status
            $this->marital_status->EditCustomAttributes = "";
            $this->marital_status->EditValue = $this->marital_status->options(false);
            $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

            // address1
            $this->address1->EditAttrs["class"] = "form-control";
            $this->address1->EditCustomAttributes = "";
            if (!$this->address1->Raw) {
                $this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
            }
            $this->address1->EditValue = HtmlEncode($this->address1->CurrentValue);
            $this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

            // address2
            $this->address2->EditAttrs["class"] = "form-control";
            $this->address2->EditCustomAttributes = "";
            if (!$this->address2->Raw) {
                $this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
            }
            $this->address2->EditValue = HtmlEncode($this->address2->CurrentValue);
            $this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

            // city
            $this->city->EditAttrs["class"] = "form-control";
            $this->city->EditCustomAttributes = "";
            if (!$this->city->Raw) {
                $this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
            }
            $this->city->EditValue = HtmlEncode($this->city->CurrentValue);
            $this->city->PlaceHolder = RemoveHtml($this->city->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->CurrentValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            $this->province->EditValue = HtmlEncode($this->province->CurrentValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // email
            $this->_email->EditAttrs["class"] = "form-control";
            $this->_email->EditCustomAttributes = "";
            if (!$this->_email->Raw) {
                $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
            }
            $this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
            $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

            // home_phone
            $this->home_phone->EditAttrs["class"] = "form-control";
            $this->home_phone->EditCustomAttributes = "";
            if (!$this->home_phone->Raw) {
                $this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
            }
            $this->home_phone->EditValue = HtmlEncode($this->home_phone->CurrentValue);
            $this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

            // mobile_phone
            $this->mobile_phone->EditAttrs["class"] = "form-control";
            $this->mobile_phone->EditCustomAttributes = "";
            if (!$this->mobile_phone->Raw) {
                $this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
            }
            $this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->CurrentValue);
            $this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

            // cv_title
            $this->cv_title->EditAttrs["class"] = "form-control";
            $this->cv_title->EditCustomAttributes = "";
            if (!$this->cv_title->Raw) {
                $this->cv_title->CurrentValue = HtmlDecode($this->cv_title->CurrentValue);
            }
            $this->cv_title->EditValue = HtmlEncode($this->cv_title->CurrentValue);
            $this->cv_title->PlaceHolder = RemoveHtml($this->cv_title->caption());

            // cv
            $this->cv->EditAttrs["class"] = "form-control";
            $this->cv->EditCustomAttributes = "";
            if (!$this->cv->Raw) {
                $this->cv->CurrentValue = HtmlDecode($this->cv->CurrentValue);
            }
            $this->cv->EditValue = HtmlEncode($this->cv->CurrentValue);
            $this->cv->PlaceHolder = RemoveHtml($this->cv->caption());

            // cvtext
            $this->cvtext->EditAttrs["class"] = "form-control";
            $this->cvtext->EditCustomAttributes = "";
            $this->cvtext->EditValue = HtmlEncode($this->cvtext->CurrentValue);
            $this->cvtext->PlaceHolder = RemoveHtml($this->cvtext->caption());

            // industry
            $this->industry->EditAttrs["class"] = "form-control";
            $this->industry->EditCustomAttributes = "";
            $this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
            $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

            // profileImage
            $this->profileImage->EditAttrs["class"] = "form-control";
            $this->profileImage->EditCustomAttributes = "";
            if (!$this->profileImage->Raw) {
                $this->profileImage->CurrentValue = HtmlDecode($this->profileImage->CurrentValue);
            }
            $this->profileImage->EditValue = HtmlEncode($this->profileImage->CurrentValue);
            $this->profileImage->PlaceHolder = RemoveHtml($this->profileImage->caption());

            // head_line
            $this->head_line->EditAttrs["class"] = "form-control";
            $this->head_line->EditCustomAttributes = "";
            $this->head_line->EditValue = HtmlEncode($this->head_line->CurrentValue);
            $this->head_line->PlaceHolder = RemoveHtml($this->head_line->caption());

            // objective
            $this->objective->EditAttrs["class"] = "form-control";
            $this->objective->EditCustomAttributes = "";
            $this->objective->EditValue = HtmlEncode($this->objective->CurrentValue);
            $this->objective->PlaceHolder = RemoveHtml($this->objective->caption());

            // work_history
            $this->work_history->EditAttrs["class"] = "form-control";
            $this->work_history->EditCustomAttributes = "";
            $this->work_history->EditValue = HtmlEncode($this->work_history->CurrentValue);
            $this->work_history->PlaceHolder = RemoveHtml($this->work_history->caption());

            // education
            $this->education->EditAttrs["class"] = "form-control";
            $this->education->EditCustomAttributes = "";
            $this->education->EditValue = HtmlEncode($this->education->CurrentValue);
            $this->education->PlaceHolder = RemoveHtml($this->education->caption());

            // skills
            $this->skills->EditAttrs["class"] = "form-control";
            $this->skills->EditCustomAttributes = "";
            $this->skills->EditValue = HtmlEncode($this->skills->CurrentValue);
            $this->skills->PlaceHolder = RemoveHtml($this->skills->caption());

            // referees
            $this->referees->EditAttrs["class"] = "form-control";
            $this->referees->EditCustomAttributes = "";
            $this->referees->EditValue = HtmlEncode($this->referees->CurrentValue);
            $this->referees->PlaceHolder = RemoveHtml($this->referees->caption());

            // linkedInUrl
            $this->linkedInUrl->EditAttrs["class"] = "form-control";
            $this->linkedInUrl->EditCustomAttributes = "";
            $this->linkedInUrl->EditValue = HtmlEncode($this->linkedInUrl->CurrentValue);
            $this->linkedInUrl->PlaceHolder = RemoveHtml($this->linkedInUrl->caption());

            // linkedInData
            $this->linkedInData->EditAttrs["class"] = "form-control";
            $this->linkedInData->EditCustomAttributes = "";
            $this->linkedInData->EditValue = HtmlEncode($this->linkedInData->CurrentValue);
            $this->linkedInData->PlaceHolder = RemoveHtml($this->linkedInData->caption());

            // totalYearsOfExperience
            $this->totalYearsOfExperience->EditAttrs["class"] = "form-control";
            $this->totalYearsOfExperience->EditCustomAttributes = "";
            $this->totalYearsOfExperience->EditValue = HtmlEncode($this->totalYearsOfExperience->CurrentValue);
            $this->totalYearsOfExperience->PlaceHolder = RemoveHtml($this->totalYearsOfExperience->caption());

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->EditAttrs["class"] = "form-control";
            $this->totalMonthsOfExperience->EditCustomAttributes = "";
            $this->totalMonthsOfExperience->EditValue = HtmlEncode($this->totalMonthsOfExperience->CurrentValue);
            $this->totalMonthsOfExperience->PlaceHolder = RemoveHtml($this->totalMonthsOfExperience->caption());

            // htmlCVData
            $this->htmlCVData->EditAttrs["class"] = "form-control";
            $this->htmlCVData->EditCustomAttributes = "";
            $this->htmlCVData->EditValue = HtmlEncode($this->htmlCVData->CurrentValue);
            $this->htmlCVData->PlaceHolder = RemoveHtml($this->htmlCVData->caption());

            // generatedCVFile
            $this->generatedCVFile->EditAttrs["class"] = "form-control";
            $this->generatedCVFile->EditCustomAttributes = "";
            if (!$this->generatedCVFile->Raw) {
                $this->generatedCVFile->CurrentValue = HtmlDecode($this->generatedCVFile->CurrentValue);
            }
            $this->generatedCVFile->EditValue = HtmlEncode($this->generatedCVFile->CurrentValue);
            $this->generatedCVFile->PlaceHolder = RemoveHtml($this->generatedCVFile->caption());

            // created
            $this->created->EditAttrs["class"] = "form-control";
            $this->created->EditCustomAttributes = "";
            $this->created->EditValue = HtmlEncode(FormatDateTime($this->created->CurrentValue, 8));
            $this->created->PlaceHolder = RemoveHtml($this->created->caption());

            // updated
            $this->updated->EditAttrs["class"] = "form-control";
            $this->updated->EditCustomAttributes = "";
            $this->updated->EditValue = HtmlEncode(FormatDateTime($this->updated->CurrentValue, 8));
            $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

            // expectedSalary
            $this->expectedSalary->EditAttrs["class"] = "form-control";
            $this->expectedSalary->EditCustomAttributes = "";
            $this->expectedSalary->EditValue = HtmlEncode($this->expectedSalary->CurrentValue);
            $this->expectedSalary->PlaceHolder = RemoveHtml($this->expectedSalary->caption());

            // preferedPositions
            $this->preferedPositions->EditAttrs["class"] = "form-control";
            $this->preferedPositions->EditCustomAttributes = "";
            $this->preferedPositions->EditValue = HtmlEncode($this->preferedPositions->CurrentValue);
            $this->preferedPositions->PlaceHolder = RemoveHtml($this->preferedPositions->caption());

            // preferedJobtype
            $this->preferedJobtype->EditAttrs["class"] = "form-control";
            $this->preferedJobtype->EditCustomAttributes = "";
            if (!$this->preferedJobtype->Raw) {
                $this->preferedJobtype->CurrentValue = HtmlDecode($this->preferedJobtype->CurrentValue);
            }
            $this->preferedJobtype->EditValue = HtmlEncode($this->preferedJobtype->CurrentValue);
            $this->preferedJobtype->PlaceHolder = RemoveHtml($this->preferedJobtype->caption());

            // preferedCountries
            $this->preferedCountries->EditAttrs["class"] = "form-control";
            $this->preferedCountries->EditCustomAttributes = "";
            $this->preferedCountries->EditValue = HtmlEncode($this->preferedCountries->CurrentValue);
            $this->preferedCountries->PlaceHolder = RemoveHtml($this->preferedCountries->caption());

            // tags
            $this->tags->EditAttrs["class"] = "form-control";
            $this->tags->EditCustomAttributes = "";
            $this->tags->EditValue = HtmlEncode($this->tags->CurrentValue);
            $this->tags->PlaceHolder = RemoveHtml($this->tags->caption());

            // notes
            $this->notes->EditAttrs["class"] = "form-control";
            $this->notes->EditCustomAttributes = "";
            $this->notes->EditValue = HtmlEncode($this->notes->CurrentValue);
            $this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

            // calls
            $this->calls->EditAttrs["class"] = "form-control";
            $this->calls->EditCustomAttributes = "";
            $this->calls->EditValue = HtmlEncode($this->calls->CurrentValue);
            $this->calls->PlaceHolder = RemoveHtml($this->calls->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            $this->age->EditValue = HtmlEncode($this->age->CurrentValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // hash
            $this->hash->EditAttrs["class"] = "form-control";
            $this->hash->EditCustomAttributes = "";
            if (!$this->hash->Raw) {
                $this->hash->CurrentValue = HtmlDecode($this->hash->CurrentValue);
            }
            $this->hash->EditValue = HtmlEncode($this->hash->CurrentValue);
            $this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

            // linkedInProfileLink
            $this->linkedInProfileLink->EditAttrs["class"] = "form-control";
            $this->linkedInProfileLink->EditCustomAttributes = "";
            if (!$this->linkedInProfileLink->Raw) {
                $this->linkedInProfileLink->CurrentValue = HtmlDecode($this->linkedInProfileLink->CurrentValue);
            }
            $this->linkedInProfileLink->EditValue = HtmlEncode($this->linkedInProfileLink->CurrentValue);
            $this->linkedInProfileLink->PlaceHolder = RemoveHtml($this->linkedInProfileLink->caption());

            // linkedInProfileId
            $this->linkedInProfileId->EditAttrs["class"] = "form-control";
            $this->linkedInProfileId->EditCustomAttributes = "";
            if (!$this->linkedInProfileId->Raw) {
                $this->linkedInProfileId->CurrentValue = HtmlDecode($this->linkedInProfileId->CurrentValue);
            }
            $this->linkedInProfileId->EditValue = HtmlEncode($this->linkedInProfileId->CurrentValue);
            $this->linkedInProfileId->PlaceHolder = RemoveHtml($this->linkedInProfileId->caption());

            // facebookProfileLink
            $this->facebookProfileLink->EditAttrs["class"] = "form-control";
            $this->facebookProfileLink->EditCustomAttributes = "";
            if (!$this->facebookProfileLink->Raw) {
                $this->facebookProfileLink->CurrentValue = HtmlDecode($this->facebookProfileLink->CurrentValue);
            }
            $this->facebookProfileLink->EditValue = HtmlEncode($this->facebookProfileLink->CurrentValue);
            $this->facebookProfileLink->PlaceHolder = RemoveHtml($this->facebookProfileLink->caption());

            // facebookProfileId
            $this->facebookProfileId->EditAttrs["class"] = "form-control";
            $this->facebookProfileId->EditCustomAttributes = "";
            if (!$this->facebookProfileId->Raw) {
                $this->facebookProfileId->CurrentValue = HtmlDecode($this->facebookProfileId->CurrentValue);
            }
            $this->facebookProfileId->EditValue = HtmlEncode($this->facebookProfileId->CurrentValue);
            $this->facebookProfileId->PlaceHolder = RemoveHtml($this->facebookProfileId->caption());

            // twitterProfileLink
            $this->twitterProfileLink->EditAttrs["class"] = "form-control";
            $this->twitterProfileLink->EditCustomAttributes = "";
            if (!$this->twitterProfileLink->Raw) {
                $this->twitterProfileLink->CurrentValue = HtmlDecode($this->twitterProfileLink->CurrentValue);
            }
            $this->twitterProfileLink->EditValue = HtmlEncode($this->twitterProfileLink->CurrentValue);
            $this->twitterProfileLink->PlaceHolder = RemoveHtml($this->twitterProfileLink->caption());

            // twitterProfileId
            $this->twitterProfileId->EditAttrs["class"] = "form-control";
            $this->twitterProfileId->EditCustomAttributes = "";
            if (!$this->twitterProfileId->Raw) {
                $this->twitterProfileId->CurrentValue = HtmlDecode($this->twitterProfileId->CurrentValue);
            }
            $this->twitterProfileId->EditValue = HtmlEncode($this->twitterProfileId->CurrentValue);
            $this->twitterProfileId->PlaceHolder = RemoveHtml($this->twitterProfileId->caption());

            // googleProfileLink
            $this->googleProfileLink->EditAttrs["class"] = "form-control";
            $this->googleProfileLink->EditCustomAttributes = "";
            if (!$this->googleProfileLink->Raw) {
                $this->googleProfileLink->CurrentValue = HtmlDecode($this->googleProfileLink->CurrentValue);
            }
            $this->googleProfileLink->EditValue = HtmlEncode($this->googleProfileLink->CurrentValue);
            $this->googleProfileLink->PlaceHolder = RemoveHtml($this->googleProfileLink->caption());

            // googleProfileId
            $this->googleProfileId->EditAttrs["class"] = "form-control";
            $this->googleProfileId->EditCustomAttributes = "";
            if (!$this->googleProfileId->Raw) {
                $this->googleProfileId->CurrentValue = HtmlDecode($this->googleProfileId->CurrentValue);
            }
            $this->googleProfileId->EditValue = HtmlEncode($this->googleProfileId->CurrentValue);
            $this->googleProfileId->PlaceHolder = RemoveHtml($this->googleProfileId->caption());

            // Add refer script

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";

            // cv_title
            $this->cv_title->LinkCustomAttributes = "";
            $this->cv_title->HrefValue = "";

            // cv
            $this->cv->LinkCustomAttributes = "";
            $this->cv->HrefValue = "";

            // cvtext
            $this->cvtext->LinkCustomAttributes = "";
            $this->cvtext->HrefValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";

            // profileImage
            $this->profileImage->LinkCustomAttributes = "";
            $this->profileImage->HrefValue = "";

            // head_line
            $this->head_line->LinkCustomAttributes = "";
            $this->head_line->HrefValue = "";

            // objective
            $this->objective->LinkCustomAttributes = "";
            $this->objective->HrefValue = "";

            // work_history
            $this->work_history->LinkCustomAttributes = "";
            $this->work_history->HrefValue = "";

            // education
            $this->education->LinkCustomAttributes = "";
            $this->education->HrefValue = "";

            // skills
            $this->skills->LinkCustomAttributes = "";
            $this->skills->HrefValue = "";

            // referees
            $this->referees->LinkCustomAttributes = "";
            $this->referees->HrefValue = "";

            // linkedInUrl
            $this->linkedInUrl->LinkCustomAttributes = "";
            $this->linkedInUrl->HrefValue = "";

            // linkedInData
            $this->linkedInData->LinkCustomAttributes = "";
            $this->linkedInData->HrefValue = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->LinkCustomAttributes = "";
            $this->totalYearsOfExperience->HrefValue = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->LinkCustomAttributes = "";
            $this->totalMonthsOfExperience->HrefValue = "";

            // htmlCVData
            $this->htmlCVData->LinkCustomAttributes = "";
            $this->htmlCVData->HrefValue = "";

            // generatedCVFile
            $this->generatedCVFile->LinkCustomAttributes = "";
            $this->generatedCVFile->HrefValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";

            // expectedSalary
            $this->expectedSalary->LinkCustomAttributes = "";
            $this->expectedSalary->HrefValue = "";

            // preferedPositions
            $this->preferedPositions->LinkCustomAttributes = "";
            $this->preferedPositions->HrefValue = "";

            // preferedJobtype
            $this->preferedJobtype->LinkCustomAttributes = "";
            $this->preferedJobtype->HrefValue = "";

            // preferedCountries
            $this->preferedCountries->LinkCustomAttributes = "";
            $this->preferedCountries->HrefValue = "";

            // tags
            $this->tags->LinkCustomAttributes = "";
            $this->tags->HrefValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";

            // calls
            $this->calls->LinkCustomAttributes = "";
            $this->calls->HrefValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";

            // hash
            $this->hash->LinkCustomAttributes = "";
            $this->hash->HrefValue = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->LinkCustomAttributes = "";
            $this->linkedInProfileLink->HrefValue = "";

            // linkedInProfileId
            $this->linkedInProfileId->LinkCustomAttributes = "";
            $this->linkedInProfileId->HrefValue = "";

            // facebookProfileLink
            $this->facebookProfileLink->LinkCustomAttributes = "";
            $this->facebookProfileLink->HrefValue = "";

            // facebookProfileId
            $this->facebookProfileId->LinkCustomAttributes = "";
            $this->facebookProfileId->HrefValue = "";

            // twitterProfileLink
            $this->twitterProfileLink->LinkCustomAttributes = "";
            $this->twitterProfileLink->HrefValue = "";

            // twitterProfileId
            $this->twitterProfileId->LinkCustomAttributes = "";
            $this->twitterProfileId->HrefValue = "";

            // googleProfileLink
            $this->googleProfileLink->LinkCustomAttributes = "";
            $this->googleProfileLink->HrefValue = "";

            // googleProfileId
            $this->googleProfileId->LinkCustomAttributes = "";
            $this->googleProfileId->HrefValue = "";
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
        if ($this->first_name->Required) {
            if (!$this->first_name->IsDetailKey && EmptyValue($this->first_name->FormValue)) {
                $this->first_name->addErrorMessage(str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
            }
        }
        if ($this->last_name->Required) {
            if (!$this->last_name->IsDetailKey && EmptyValue($this->last_name->FormValue)) {
                $this->last_name->addErrorMessage(str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
            }
        }
        if ($this->nationality->Required) {
            if (!$this->nationality->IsDetailKey && EmptyValue($this->nationality->FormValue)) {
                $this->nationality->addErrorMessage(str_replace("%s", $this->nationality->caption(), $this->nationality->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->nationality->FormValue)) {
            $this->nationality->addErrorMessage($this->nationality->getErrorMessage(false));
        }
        if ($this->birthday->Required) {
            if (!$this->birthday->IsDetailKey && EmptyValue($this->birthday->FormValue)) {
                $this->birthday->addErrorMessage(str_replace("%s", $this->birthday->caption(), $this->birthday->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->birthday->FormValue)) {
            $this->birthday->addErrorMessage($this->birthday->getErrorMessage(false));
        }
        if ($this->gender->Required) {
            if ($this->gender->FormValue == "") {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->marital_status->Required) {
            if ($this->marital_status->FormValue == "") {
                $this->marital_status->addErrorMessage(str_replace("%s", $this->marital_status->caption(), $this->marital_status->RequiredErrorMessage));
            }
        }
        if ($this->address1->Required) {
            if (!$this->address1->IsDetailKey && EmptyValue($this->address1->FormValue)) {
                $this->address1->addErrorMessage(str_replace("%s", $this->address1->caption(), $this->address1->RequiredErrorMessage));
            }
        }
        if ($this->address2->Required) {
            if (!$this->address2->IsDetailKey && EmptyValue($this->address2->FormValue)) {
                $this->address2->addErrorMessage(str_replace("%s", $this->address2->caption(), $this->address2->RequiredErrorMessage));
            }
        }
        if ($this->city->Required) {
            if (!$this->city->IsDetailKey && EmptyValue($this->city->FormValue)) {
                $this->city->addErrorMessage(str_replace("%s", $this->city->caption(), $this->city->RequiredErrorMessage));
            }
        }
        if ($this->country->Required) {
            if (!$this->country->IsDetailKey && EmptyValue($this->country->FormValue)) {
                $this->country->addErrorMessage(str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
            }
        }
        if ($this->province->Required) {
            if (!$this->province->IsDetailKey && EmptyValue($this->province->FormValue)) {
                $this->province->addErrorMessage(str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->province->FormValue)) {
            $this->province->addErrorMessage($this->province->getErrorMessage(false));
        }
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->_email->Required) {
            if (!$this->_email->IsDetailKey && EmptyValue($this->_email->FormValue)) {
                $this->_email->addErrorMessage(str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
            }
        }
        if ($this->home_phone->Required) {
            if (!$this->home_phone->IsDetailKey && EmptyValue($this->home_phone->FormValue)) {
                $this->home_phone->addErrorMessage(str_replace("%s", $this->home_phone->caption(), $this->home_phone->RequiredErrorMessage));
            }
        }
        if ($this->mobile_phone->Required) {
            if (!$this->mobile_phone->IsDetailKey && EmptyValue($this->mobile_phone->FormValue)) {
                $this->mobile_phone->addErrorMessage(str_replace("%s", $this->mobile_phone->caption(), $this->mobile_phone->RequiredErrorMessage));
            }
        }
        if ($this->cv_title->Required) {
            if (!$this->cv_title->IsDetailKey && EmptyValue($this->cv_title->FormValue)) {
                $this->cv_title->addErrorMessage(str_replace("%s", $this->cv_title->caption(), $this->cv_title->RequiredErrorMessage));
            }
        }
        if ($this->cv->Required) {
            if (!$this->cv->IsDetailKey && EmptyValue($this->cv->FormValue)) {
                $this->cv->addErrorMessage(str_replace("%s", $this->cv->caption(), $this->cv->RequiredErrorMessage));
            }
        }
        if ($this->cvtext->Required) {
            if (!$this->cvtext->IsDetailKey && EmptyValue($this->cvtext->FormValue)) {
                $this->cvtext->addErrorMessage(str_replace("%s", $this->cvtext->caption(), $this->cvtext->RequiredErrorMessage));
            }
        }
        if ($this->industry->Required) {
            if (!$this->industry->IsDetailKey && EmptyValue($this->industry->FormValue)) {
                $this->industry->addErrorMessage(str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
            }
        }
        if ($this->profileImage->Required) {
            if (!$this->profileImage->IsDetailKey && EmptyValue($this->profileImage->FormValue)) {
                $this->profileImage->addErrorMessage(str_replace("%s", $this->profileImage->caption(), $this->profileImage->RequiredErrorMessage));
            }
        }
        if ($this->head_line->Required) {
            if (!$this->head_line->IsDetailKey && EmptyValue($this->head_line->FormValue)) {
                $this->head_line->addErrorMessage(str_replace("%s", $this->head_line->caption(), $this->head_line->RequiredErrorMessage));
            }
        }
        if ($this->objective->Required) {
            if (!$this->objective->IsDetailKey && EmptyValue($this->objective->FormValue)) {
                $this->objective->addErrorMessage(str_replace("%s", $this->objective->caption(), $this->objective->RequiredErrorMessage));
            }
        }
        if ($this->work_history->Required) {
            if (!$this->work_history->IsDetailKey && EmptyValue($this->work_history->FormValue)) {
                $this->work_history->addErrorMessage(str_replace("%s", $this->work_history->caption(), $this->work_history->RequiredErrorMessage));
            }
        }
        if ($this->education->Required) {
            if (!$this->education->IsDetailKey && EmptyValue($this->education->FormValue)) {
                $this->education->addErrorMessage(str_replace("%s", $this->education->caption(), $this->education->RequiredErrorMessage));
            }
        }
        if ($this->skills->Required) {
            if (!$this->skills->IsDetailKey && EmptyValue($this->skills->FormValue)) {
                $this->skills->addErrorMessage(str_replace("%s", $this->skills->caption(), $this->skills->RequiredErrorMessage));
            }
        }
        if ($this->referees->Required) {
            if (!$this->referees->IsDetailKey && EmptyValue($this->referees->FormValue)) {
                $this->referees->addErrorMessage(str_replace("%s", $this->referees->caption(), $this->referees->RequiredErrorMessage));
            }
        }
        if ($this->linkedInUrl->Required) {
            if (!$this->linkedInUrl->IsDetailKey && EmptyValue($this->linkedInUrl->FormValue)) {
                $this->linkedInUrl->addErrorMessage(str_replace("%s", $this->linkedInUrl->caption(), $this->linkedInUrl->RequiredErrorMessage));
            }
        }
        if ($this->linkedInData->Required) {
            if (!$this->linkedInData->IsDetailKey && EmptyValue($this->linkedInData->FormValue)) {
                $this->linkedInData->addErrorMessage(str_replace("%s", $this->linkedInData->caption(), $this->linkedInData->RequiredErrorMessage));
            }
        }
        if ($this->totalYearsOfExperience->Required) {
            if (!$this->totalYearsOfExperience->IsDetailKey && EmptyValue($this->totalYearsOfExperience->FormValue)) {
                $this->totalYearsOfExperience->addErrorMessage(str_replace("%s", $this->totalYearsOfExperience->caption(), $this->totalYearsOfExperience->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->totalYearsOfExperience->FormValue)) {
            $this->totalYearsOfExperience->addErrorMessage($this->totalYearsOfExperience->getErrorMessage(false));
        }
        if ($this->totalMonthsOfExperience->Required) {
            if (!$this->totalMonthsOfExperience->IsDetailKey && EmptyValue($this->totalMonthsOfExperience->FormValue)) {
                $this->totalMonthsOfExperience->addErrorMessage(str_replace("%s", $this->totalMonthsOfExperience->caption(), $this->totalMonthsOfExperience->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->totalMonthsOfExperience->FormValue)) {
            $this->totalMonthsOfExperience->addErrorMessage($this->totalMonthsOfExperience->getErrorMessage(false));
        }
        if ($this->htmlCVData->Required) {
            if (!$this->htmlCVData->IsDetailKey && EmptyValue($this->htmlCVData->FormValue)) {
                $this->htmlCVData->addErrorMessage(str_replace("%s", $this->htmlCVData->caption(), $this->htmlCVData->RequiredErrorMessage));
            }
        }
        if ($this->generatedCVFile->Required) {
            if (!$this->generatedCVFile->IsDetailKey && EmptyValue($this->generatedCVFile->FormValue)) {
                $this->generatedCVFile->addErrorMessage(str_replace("%s", $this->generatedCVFile->caption(), $this->generatedCVFile->RequiredErrorMessage));
            }
        }
        if ($this->created->Required) {
            if (!$this->created->IsDetailKey && EmptyValue($this->created->FormValue)) {
                $this->created->addErrorMessage(str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->created->FormValue)) {
            $this->created->addErrorMessage($this->created->getErrorMessage(false));
        }
        if ($this->updated->Required) {
            if (!$this->updated->IsDetailKey && EmptyValue($this->updated->FormValue)) {
                $this->updated->addErrorMessage(str_replace("%s", $this->updated->caption(), $this->updated->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->updated->FormValue)) {
            $this->updated->addErrorMessage($this->updated->getErrorMessage(false));
        }
        if ($this->expectedSalary->Required) {
            if (!$this->expectedSalary->IsDetailKey && EmptyValue($this->expectedSalary->FormValue)) {
                $this->expectedSalary->addErrorMessage(str_replace("%s", $this->expectedSalary->caption(), $this->expectedSalary->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->expectedSalary->FormValue)) {
            $this->expectedSalary->addErrorMessage($this->expectedSalary->getErrorMessage(false));
        }
        if ($this->preferedPositions->Required) {
            if (!$this->preferedPositions->IsDetailKey && EmptyValue($this->preferedPositions->FormValue)) {
                $this->preferedPositions->addErrorMessage(str_replace("%s", $this->preferedPositions->caption(), $this->preferedPositions->RequiredErrorMessage));
            }
        }
        if ($this->preferedJobtype->Required) {
            if (!$this->preferedJobtype->IsDetailKey && EmptyValue($this->preferedJobtype->FormValue)) {
                $this->preferedJobtype->addErrorMessage(str_replace("%s", $this->preferedJobtype->caption(), $this->preferedJobtype->RequiredErrorMessage));
            }
        }
        if ($this->preferedCountries->Required) {
            if (!$this->preferedCountries->IsDetailKey && EmptyValue($this->preferedCountries->FormValue)) {
                $this->preferedCountries->addErrorMessage(str_replace("%s", $this->preferedCountries->caption(), $this->preferedCountries->RequiredErrorMessage));
            }
        }
        if ($this->tags->Required) {
            if (!$this->tags->IsDetailKey && EmptyValue($this->tags->FormValue)) {
                $this->tags->addErrorMessage(str_replace("%s", $this->tags->caption(), $this->tags->RequiredErrorMessage));
            }
        }
        if ($this->notes->Required) {
            if (!$this->notes->IsDetailKey && EmptyValue($this->notes->FormValue)) {
                $this->notes->addErrorMessage(str_replace("%s", $this->notes->caption(), $this->notes->RequiredErrorMessage));
            }
        }
        if ($this->calls->Required) {
            if (!$this->calls->IsDetailKey && EmptyValue($this->calls->FormValue)) {
                $this->calls->addErrorMessage(str_replace("%s", $this->calls->caption(), $this->calls->RequiredErrorMessage));
            }
        }
        if ($this->age->Required) {
            if (!$this->age->IsDetailKey && EmptyValue($this->age->FormValue)) {
                $this->age->addErrorMessage(str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->age->FormValue)) {
            $this->age->addErrorMessage($this->age->getErrorMessage(false));
        }
        if ($this->hash->Required) {
            if (!$this->hash->IsDetailKey && EmptyValue($this->hash->FormValue)) {
                $this->hash->addErrorMessage(str_replace("%s", $this->hash->caption(), $this->hash->RequiredErrorMessage));
            }
        }
        if ($this->linkedInProfileLink->Required) {
            if (!$this->linkedInProfileLink->IsDetailKey && EmptyValue($this->linkedInProfileLink->FormValue)) {
                $this->linkedInProfileLink->addErrorMessage(str_replace("%s", $this->linkedInProfileLink->caption(), $this->linkedInProfileLink->RequiredErrorMessage));
            }
        }
        if ($this->linkedInProfileId->Required) {
            if (!$this->linkedInProfileId->IsDetailKey && EmptyValue($this->linkedInProfileId->FormValue)) {
                $this->linkedInProfileId->addErrorMessage(str_replace("%s", $this->linkedInProfileId->caption(), $this->linkedInProfileId->RequiredErrorMessage));
            }
        }
        if ($this->facebookProfileLink->Required) {
            if (!$this->facebookProfileLink->IsDetailKey && EmptyValue($this->facebookProfileLink->FormValue)) {
                $this->facebookProfileLink->addErrorMessage(str_replace("%s", $this->facebookProfileLink->caption(), $this->facebookProfileLink->RequiredErrorMessage));
            }
        }
        if ($this->facebookProfileId->Required) {
            if (!$this->facebookProfileId->IsDetailKey && EmptyValue($this->facebookProfileId->FormValue)) {
                $this->facebookProfileId->addErrorMessage(str_replace("%s", $this->facebookProfileId->caption(), $this->facebookProfileId->RequiredErrorMessage));
            }
        }
        if ($this->twitterProfileLink->Required) {
            if (!$this->twitterProfileLink->IsDetailKey && EmptyValue($this->twitterProfileLink->FormValue)) {
                $this->twitterProfileLink->addErrorMessage(str_replace("%s", $this->twitterProfileLink->caption(), $this->twitterProfileLink->RequiredErrorMessage));
            }
        }
        if ($this->twitterProfileId->Required) {
            if (!$this->twitterProfileId->IsDetailKey && EmptyValue($this->twitterProfileId->FormValue)) {
                $this->twitterProfileId->addErrorMessage(str_replace("%s", $this->twitterProfileId->caption(), $this->twitterProfileId->RequiredErrorMessage));
            }
        }
        if ($this->googleProfileLink->Required) {
            if (!$this->googleProfileLink->IsDetailKey && EmptyValue($this->googleProfileLink->FormValue)) {
                $this->googleProfileLink->addErrorMessage(str_replace("%s", $this->googleProfileLink->caption(), $this->googleProfileLink->RequiredErrorMessage));
            }
        }
        if ($this->googleProfileId->Required) {
            if (!$this->googleProfileId->IsDetailKey && EmptyValue($this->googleProfileId->FormValue)) {
                $this->googleProfileId->addErrorMessage(str_replace("%s", $this->googleProfileId->caption(), $this->googleProfileId->RequiredErrorMessage));
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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // first_name
        $this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", false);

        // last_name
        $this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, "", false);

        // nationality
        $this->nationality->setDbValueDef($rsnew, $this->nationality->CurrentValue, null, false);

        // birthday
        $this->birthday->setDbValueDef($rsnew, UnFormatDateTime($this->birthday->CurrentValue, 0), null, false);

        // gender
        $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, false);

        // marital_status
        $this->marital_status->setDbValueDef($rsnew, $this->marital_status->CurrentValue, null, false);

        // address1
        $this->address1->setDbValueDef($rsnew, $this->address1->CurrentValue, null, false);

        // address2
        $this->address2->setDbValueDef($rsnew, $this->address2->CurrentValue, null, false);

        // city
        $this->city->setDbValueDef($rsnew, $this->city->CurrentValue, null, false);

        // country
        $this->country->setDbValueDef($rsnew, $this->country->CurrentValue, null, false);

        // province
        $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, false);

        // postal_code
        $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, false);

        // email
        $this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, null, false);

        // home_phone
        $this->home_phone->setDbValueDef($rsnew, $this->home_phone->CurrentValue, null, false);

        // mobile_phone
        $this->mobile_phone->setDbValueDef($rsnew, $this->mobile_phone->CurrentValue, null, false);

        // cv_title
        $this->cv_title->setDbValueDef($rsnew, $this->cv_title->CurrentValue, "", false);

        // cv
        $this->cv->setDbValueDef($rsnew, $this->cv->CurrentValue, null, false);

        // cvtext
        $this->cvtext->setDbValueDef($rsnew, $this->cvtext->CurrentValue, null, false);

        // industry
        $this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, null, false);

        // profileImage
        $this->profileImage->setDbValueDef($rsnew, $this->profileImage->CurrentValue, null, false);

        // head_line
        $this->head_line->setDbValueDef($rsnew, $this->head_line->CurrentValue, null, false);

        // objective
        $this->objective->setDbValueDef($rsnew, $this->objective->CurrentValue, null, false);

        // work_history
        $this->work_history->setDbValueDef($rsnew, $this->work_history->CurrentValue, null, false);

        // education
        $this->education->setDbValueDef($rsnew, $this->education->CurrentValue, null, false);

        // skills
        $this->skills->setDbValueDef($rsnew, $this->skills->CurrentValue, null, false);

        // referees
        $this->referees->setDbValueDef($rsnew, $this->referees->CurrentValue, null, false);

        // linkedInUrl
        $this->linkedInUrl->setDbValueDef($rsnew, $this->linkedInUrl->CurrentValue, null, false);

        // linkedInData
        $this->linkedInData->setDbValueDef($rsnew, $this->linkedInData->CurrentValue, null, false);

        // totalYearsOfExperience
        $this->totalYearsOfExperience->setDbValueDef($rsnew, $this->totalYearsOfExperience->CurrentValue, null, false);

        // totalMonthsOfExperience
        $this->totalMonthsOfExperience->setDbValueDef($rsnew, $this->totalMonthsOfExperience->CurrentValue, null, false);

        // htmlCVData
        $this->htmlCVData->setDbValueDef($rsnew, $this->htmlCVData->CurrentValue, null, false);

        // generatedCVFile
        $this->generatedCVFile->setDbValueDef($rsnew, $this->generatedCVFile->CurrentValue, null, false);

        // created
        $this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), null, false);

        // updated
        $this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), null, false);

        // expectedSalary
        $this->expectedSalary->setDbValueDef($rsnew, $this->expectedSalary->CurrentValue, null, false);

        // preferedPositions
        $this->preferedPositions->setDbValueDef($rsnew, $this->preferedPositions->CurrentValue, null, false);

        // preferedJobtype
        $this->preferedJobtype->setDbValueDef($rsnew, $this->preferedJobtype->CurrentValue, null, false);

        // preferedCountries
        $this->preferedCountries->setDbValueDef($rsnew, $this->preferedCountries->CurrentValue, null, false);

        // tags
        $this->tags->setDbValueDef($rsnew, $this->tags->CurrentValue, null, false);

        // notes
        $this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, null, false);

        // calls
        $this->calls->setDbValueDef($rsnew, $this->calls->CurrentValue, null, false);

        // age
        $this->age->setDbValueDef($rsnew, $this->age->CurrentValue, null, false);

        // hash
        $this->hash->setDbValueDef($rsnew, $this->hash->CurrentValue, null, false);

        // linkedInProfileLink
        $this->linkedInProfileLink->setDbValueDef($rsnew, $this->linkedInProfileLink->CurrentValue, null, false);

        // linkedInProfileId
        $this->linkedInProfileId->setDbValueDef($rsnew, $this->linkedInProfileId->CurrentValue, null, false);

        // facebookProfileLink
        $this->facebookProfileLink->setDbValueDef($rsnew, $this->facebookProfileLink->CurrentValue, null, false);

        // facebookProfileId
        $this->facebookProfileId->setDbValueDef($rsnew, $this->facebookProfileId->CurrentValue, null, false);

        // twitterProfileLink
        $this->twitterProfileLink->setDbValueDef($rsnew, $this->twitterProfileLink->CurrentValue, null, false);

        // twitterProfileId
        $this->twitterProfileId->setDbValueDef($rsnew, $this->twitterProfileId->CurrentValue, null, false);

        // googleProfileLink
        $this->googleProfileLink->setDbValueDef($rsnew, $this->googleProfileLink->CurrentValue, null, false);

        // googleProfileId
        $this->googleProfileId->setDbValueDef($rsnew, $this->googleProfileId->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        $addRow = false;
        if ($insertRow) {
            try {
                $addRow = $this->insert($rsnew);
            } catch (\Exception $e) {
                $this->setFailureMessage($e->getMessage());
            }
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("RecruitmentCandidatesList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
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
                case "x_gender":
                    break;
                case "x_marital_status":
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

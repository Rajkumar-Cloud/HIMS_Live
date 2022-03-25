<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEtChartEdit extends IvfEtChart
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_et_chart';

    // Page object name
    public $PageObjName = "IvfEtChartEdit";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

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

    // Messages
    private $message = "";
    private $failureMessage = "";
    private $successMessage = "";
    private $warningMessage = "";

    // Get message
    public function getMessage()
    {
        return $_SESSION[SESSION_MESSAGE] ?? $this->message;
    }

    // Set message
    public function setMessage($v)
    {
        AddMessage($this->message, $v);
        $_SESSION[SESSION_MESSAGE] = $this->message;
    }

    // Get failure message
    public function getFailureMessage()
    {
        return $_SESSION[SESSION_FAILURE_MESSAGE] ?? $this->failureMessage;
    }

    // Set failure message
    public function setFailureMessage($v)
    {
        AddMessage($this->failureMessage, $v);
        $_SESSION[SESSION_FAILURE_MESSAGE] = $this->failureMessage;
    }

    // Get success message
    public function getSuccessMessage()
    {
        return $_SESSION[SESSION_SUCCESS_MESSAGE] ?? $this->successMessage;
    }

    // Set success message
    public function setSuccessMessage($v)
    {
        AddMessage($this->successMessage, $v);
        $_SESSION[SESSION_SUCCESS_MESSAGE] = $this->successMessage;
    }

    // Get warning message
    public function getWarningMessage()
    {
        return $_SESSION[SESSION_WARNING_MESSAGE] ?? $this->warningMessage;
    }

    // Set warning message
    public function setWarningMessage($v)
    {
        AddMessage($this->warningMessage, $v);
        $_SESSION[SESSION_WARNING_MESSAGE] = $this->warningMessage;
    }

    // Clear message
    public function clearMessage()
    {
        $this->message = "";
        $_SESSION[SESSION_MESSAGE] = "";
    }

    // Clear failure message
    public function clearFailureMessage()
    {
        $this->failureMessage = "";
        $_SESSION[SESSION_FAILURE_MESSAGE] = "";
    }

    // Clear success message
    public function clearSuccessMessage()
    {
        $this->successMessage = "";
        $_SESSION[SESSION_SUCCESS_MESSAGE] = "";
    }

    // Clear warning message
    public function clearWarningMessage()
    {
        $this->warningMessage = "";
        $_SESSION[SESSION_WARNING_MESSAGE] = "";
    }

    // Clear messages
    public function clearMessages()
    {
        $this->clearMessage();
        $this->clearFailureMessage();
        $this->clearSuccessMessage();
        $this->clearWarningMessage();
    }

    // Show message
    public function showMessage()
    {
        $hidden = true;
        $html = "";
        // Message
        $message = $this->getMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($message, "");
        }
        if ($message != "") { // Message in Session, display
            if (!$hidden) {
                $message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
            }
            $html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($warningMessage, "warning");
        }
        if ($warningMessage != "") { // Message in Session, display
            if (!$hidden) {
                $warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
            }
            $html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($successMessage, "success");
        }
        if ($successMessage != "") { // Message in Session, display
            if (!$hidden) {
                $successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
            }
            $html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $errorMessage = $this->getFailureMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($errorMessage, "failure");
        }
        if ($errorMessage != "") { // Message in Session, display
            if (!$hidden) {
                $errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
            }
            $html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        echo '<div class="ew-message-dialog' . ($hidden ? ' d-none' : '') . '">' . $html . '</div>';
    }

    // Get message as array
    public function getMessages()
    {
        $ar = [];
        // Message
        $message = $this->getMessage();
        if ($message != "") { // Message in Session, display
            $ar["message"] = $message;
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if ($warningMessage != "") { // Message in Session, display
            $ar["warningMessage"] = $warningMessage;
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if ($successMessage != "") { // Message in Session, display
            $ar["successMessage"] = $successMessage;
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $failureMessage = $this->getFailureMessage();
        if ($failureMessage != "") { // Message in Session, display
            $ar["failureMessage"] = $failureMessage;
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        return $ar;
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

        // Initialize
        $GLOBALS["Page"] = &$this;
        $this->TokenTimeout = SessionTimeoutTime();

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ivf_et_chart)
        if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
            $GLOBALS["ivf_et_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
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
        global $ExportFileName, $TempImages, $DashboardReport;

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
                $doc = new $class(Container("ivf_et_chart"));
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
                    if ($pageName == "IvfEtChartView") {
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
        if (!array_key_exists($fieldName, $this->Fields)) {
            return false;
        }
        $lookupField = $this->Fields[$fieldName];
        $lookup = $lookupField->Lookup;
        if ($lookup === null) {
            return false;
        }

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
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Consultant->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->PreTreatment->setVisibility();
        $this->Hysteroscopy->setVisibility();
        $this->EndometrialScratching->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->CYCLETYPE->setVisibility();
        $this->HRTCYCLE->setVisibility();
        $this->OralEstrogenDosage->setVisibility();
        $this->VaginalEstrogen->setVisibility();
        $this->GCSF->setVisibility();
        $this->ActivatedPRP->setVisibility();
        $this->ERA->setVisibility();
        $this->UCLcm->setVisibility();
        $this->DATEOFSTART->setVisibility();
        $this->DATEOFEMBRYOTRANSFER->setVisibility();
        $this->DAYOFEMBRYOTRANSFER->setVisibility();
        $this->NOOFEMBRYOSTHAWED->setVisibility();
        $this->NOOFEMBRYOSTRANSFERRED->setVisibility();
        $this->DAYOFEMBRYOS->setVisibility();
        $this->CRYOPRESERVEDEMBRYOS->setVisibility();
        $this->Code1->setVisibility();
        $this->Code2->setVisibility();
        $this->CellStage1->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade1->setVisibility();
        $this->Grade2->setVisibility();
        $this->ProcedureRecord->setVisibility();
        $this->Medicationsadvised->setVisibility();
        $this->PostProcedureInstructions->setVisibility();
        $this->PregnancyTestingWithSerumBetaHcG->setVisibility();
        $this->ReviewDate->setVisibility();
        $this->ReviewDoctor->setVisibility();
        $this->TidNo->setVisibility();
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
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Load key from Form
                if ($CurrentForm->hasValue("x_id")) {
                    $this->id->setFormValue($CurrentForm->getValue("x_id"));
                }
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
                    $this->terminate("IvfEtChartList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfEtChartList") {
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
            $this->toClientVar(["tableCaption"], ["caption", "Required", "IsInvalid", "Raw"]);

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Rendering event
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

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
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

        // Check field name 'Consultant' first before field var 'x_Consultant'
        $val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
        if (!$this->Consultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Consultant->Visible = false; // Disable update for API request
            } else {
                $this->Consultant->setFormValue($val);
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

        // Check field name 'IndicationForART' first before field var 'x_IndicationForART'
        $val = $CurrentForm->hasValue("IndicationForART") ? $CurrentForm->getValue("IndicationForART") : $CurrentForm->getValue("x_IndicationForART");
        if (!$this->IndicationForART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IndicationForART->Visible = false; // Disable update for API request
            } else {
                $this->IndicationForART->setFormValue($val);
            }
        }

        // Check field name 'PreTreatment' first before field var 'x_PreTreatment'
        $val = $CurrentForm->hasValue("PreTreatment") ? $CurrentForm->getValue("PreTreatment") : $CurrentForm->getValue("x_PreTreatment");
        if (!$this->PreTreatment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreTreatment->Visible = false; // Disable update for API request
            } else {
                $this->PreTreatment->setFormValue($val);
            }
        }

        // Check field name 'Hysteroscopy' first before field var 'x_Hysteroscopy'
        $val = $CurrentForm->hasValue("Hysteroscopy") ? $CurrentForm->getValue("Hysteroscopy") : $CurrentForm->getValue("x_Hysteroscopy");
        if (!$this->Hysteroscopy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Hysteroscopy->Visible = false; // Disable update for API request
            } else {
                $this->Hysteroscopy->setFormValue($val);
            }
        }

        // Check field name 'EndometrialScratching' first before field var 'x_EndometrialScratching'
        $val = $CurrentForm->hasValue("EndometrialScratching") ? $CurrentForm->getValue("EndometrialScratching") : $CurrentForm->getValue("x_EndometrialScratching");
        if (!$this->EndometrialScratching->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndometrialScratching->Visible = false; // Disable update for API request
            } else {
                $this->EndometrialScratching->setFormValue($val);
            }
        }

        // Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
        $val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
        if (!$this->TrialCannulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TrialCannulation->Visible = false; // Disable update for API request
            } else {
                $this->TrialCannulation->setFormValue($val);
            }
        }

        // Check field name 'CYCLETYPE' first before field var 'x_CYCLETYPE'
        $val = $CurrentForm->hasValue("CYCLETYPE") ? $CurrentForm->getValue("CYCLETYPE") : $CurrentForm->getValue("x_CYCLETYPE");
        if (!$this->CYCLETYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CYCLETYPE->Visible = false; // Disable update for API request
            } else {
                $this->CYCLETYPE->setFormValue($val);
            }
        }

        // Check field name 'HRTCYCLE' first before field var 'x_HRTCYCLE'
        $val = $CurrentForm->hasValue("HRTCYCLE") ? $CurrentForm->getValue("HRTCYCLE") : $CurrentForm->getValue("x_HRTCYCLE");
        if (!$this->HRTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HRTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->HRTCYCLE->setFormValue($val);
            }
        }

        // Check field name 'OralEstrogenDosage' first before field var 'x_OralEstrogenDosage'
        $val = $CurrentForm->hasValue("OralEstrogenDosage") ? $CurrentForm->getValue("OralEstrogenDosage") : $CurrentForm->getValue("x_OralEstrogenDosage");
        if (!$this->OralEstrogenDosage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OralEstrogenDosage->Visible = false; // Disable update for API request
            } else {
                $this->OralEstrogenDosage->setFormValue($val);
            }
        }

        // Check field name 'VaginalEstrogen' first before field var 'x_VaginalEstrogen'
        $val = $CurrentForm->hasValue("VaginalEstrogen") ? $CurrentForm->getValue("VaginalEstrogen") : $CurrentForm->getValue("x_VaginalEstrogen");
        if (!$this->VaginalEstrogen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VaginalEstrogen->Visible = false; // Disable update for API request
            } else {
                $this->VaginalEstrogen->setFormValue($val);
            }
        }

        // Check field name 'GCSF' first before field var 'x_GCSF'
        $val = $CurrentForm->hasValue("GCSF") ? $CurrentForm->getValue("GCSF") : $CurrentForm->getValue("x_GCSF");
        if (!$this->GCSF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GCSF->Visible = false; // Disable update for API request
            } else {
                $this->GCSF->setFormValue($val);
            }
        }

        // Check field name 'ActivatedPRP' first before field var 'x_ActivatedPRP'
        $val = $CurrentForm->hasValue("ActivatedPRP") ? $CurrentForm->getValue("ActivatedPRP") : $CurrentForm->getValue("x_ActivatedPRP");
        if (!$this->ActivatedPRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ActivatedPRP->Visible = false; // Disable update for API request
            } else {
                $this->ActivatedPRP->setFormValue($val);
            }
        }

        // Check field name 'ERA' first before field var 'x_ERA'
        $val = $CurrentForm->hasValue("ERA") ? $CurrentForm->getValue("ERA") : $CurrentForm->getValue("x_ERA");
        if (!$this->ERA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ERA->Visible = false; // Disable update for API request
            } else {
                $this->ERA->setFormValue($val);
            }
        }

        // Check field name 'UCLcm' first before field var 'x_UCLcm'
        $val = $CurrentForm->hasValue("UCLcm") ? $CurrentForm->getValue("UCLcm") : $CurrentForm->getValue("x_UCLcm");
        if (!$this->UCLcm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UCLcm->Visible = false; // Disable update for API request
            } else {
                $this->UCLcm->setFormValue($val);
            }
        }

        // Check field name 'DATEOFSTART' first before field var 'x_DATEOFSTART'
        $val = $CurrentForm->hasValue("DATEOFSTART") ? $CurrentForm->getValue("DATEOFSTART") : $CurrentForm->getValue("x_DATEOFSTART");
        if (!$this->DATEOFSTART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATEOFSTART->Visible = false; // Disable update for API request
            } else {
                $this->DATEOFSTART->setFormValue($val);
            }
            $this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 0);
        }

        // Check field name 'DATEOFEMBRYOTRANSFER' first before field var 'x_DATEOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DATEOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DATEOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DATEOFEMBRYOTRANSFER");
        if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATEOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DATEOFEMBRYOTRANSFER->setFormValue($val);
            }
            $this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 0);
        }

        // Check field name 'DAYOFEMBRYOTRANSFER' first before field var 'x_DAYOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DAYOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DAYOFEMBRYOTRANSFER");
        if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOTRANSFER->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTHAWED' first before field var 'x_NOOFEMBRYOSTHAWED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTHAWED") ? $CurrentForm->getValue("NOOFEMBRYOSTHAWED") : $CurrentForm->getValue("x_NOOFEMBRYOSTHAWED");
        if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTHAWED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTHAWED->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTRANSFERRED' first before field var 'x_NOOFEMBRYOSTRANSFERRED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTRANSFERRED") ? $CurrentForm->getValue("NOOFEMBRYOSTRANSFERRED") : $CurrentForm->getValue("x_NOOFEMBRYOSTRANSFERRED");
        if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTRANSFERRED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTRANSFERRED->setFormValue($val);
            }
        }

        // Check field name 'DAYOFEMBRYOS' first before field var 'x_DAYOFEMBRYOS'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOS") ? $CurrentForm->getValue("DAYOFEMBRYOS") : $CurrentForm->getValue("x_DAYOFEMBRYOS");
        if (!$this->DAYOFEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOS->setFormValue($val);
            }
        }

        // Check field name 'CRYOPRESERVEDEMBRYOS' first before field var 'x_CRYOPRESERVEDEMBRYOS'
        $val = $CurrentForm->hasValue("CRYOPRESERVEDEMBRYOS") ? $CurrentForm->getValue("CRYOPRESERVEDEMBRYOS") : $CurrentForm->getValue("x_CRYOPRESERVEDEMBRYOS");
        if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CRYOPRESERVEDEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->CRYOPRESERVEDEMBRYOS->setFormValue($val);
            }
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

        // Check field name 'Code2' first before field var 'x_Code2'
        $val = $CurrentForm->hasValue("Code2") ? $CurrentForm->getValue("Code2") : $CurrentForm->getValue("x_Code2");
        if (!$this->Code2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code2->Visible = false; // Disable update for API request
            } else {
                $this->Code2->setFormValue($val);
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

        // Check field name 'CellStage2' first before field var 'x_CellStage2'
        $val = $CurrentForm->hasValue("CellStage2") ? $CurrentForm->getValue("CellStage2") : $CurrentForm->getValue("x_CellStage2");
        if (!$this->CellStage2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage2->Visible = false; // Disable update for API request
            } else {
                $this->CellStage2->setFormValue($val);
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

        // Check field name 'Grade2' first before field var 'x_Grade2'
        $val = $CurrentForm->hasValue("Grade2") ? $CurrentForm->getValue("Grade2") : $CurrentForm->getValue("x_Grade2");
        if (!$this->Grade2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade2->Visible = false; // Disable update for API request
            } else {
                $this->Grade2->setFormValue($val);
            }
        }

        // Check field name 'ProcedureRecord' first before field var 'x_ProcedureRecord'
        $val = $CurrentForm->hasValue("ProcedureRecord") ? $CurrentForm->getValue("ProcedureRecord") : $CurrentForm->getValue("x_ProcedureRecord");
        if (!$this->ProcedureRecord->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureRecord->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureRecord->setFormValue($val);
            }
        }

        // Check field name 'Medicationsadvised' first before field var 'x_Medicationsadvised'
        $val = $CurrentForm->hasValue("Medicationsadvised") ? $CurrentForm->getValue("Medicationsadvised") : $CurrentForm->getValue("x_Medicationsadvised");
        if (!$this->Medicationsadvised->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicationsadvised->Visible = false; // Disable update for API request
            } else {
                $this->Medicationsadvised->setFormValue($val);
            }
        }

        // Check field name 'PostProcedureInstructions' first before field var 'x_PostProcedureInstructions'
        $val = $CurrentForm->hasValue("PostProcedureInstructions") ? $CurrentForm->getValue("PostProcedureInstructions") : $CurrentForm->getValue("x_PostProcedureInstructions");
        if (!$this->PostProcedureInstructions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PostProcedureInstructions->Visible = false; // Disable update for API request
            } else {
                $this->PostProcedureInstructions->setFormValue($val);
            }
        }

        // Check field name 'PregnancyTestingWithSerumBetaHcG' first before field var 'x_PregnancyTestingWithSerumBetaHcG'
        $val = $CurrentForm->hasValue("PregnancyTestingWithSerumBetaHcG") ? $CurrentForm->getValue("PregnancyTestingWithSerumBetaHcG") : $CurrentForm->getValue("x_PregnancyTestingWithSerumBetaHcG");
        if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PregnancyTestingWithSerumBetaHcG->Visible = false; // Disable update for API request
            } else {
                $this->PregnancyTestingWithSerumBetaHcG->setFormValue($val);
            }
        }

        // Check field name 'ReviewDate' first before field var 'x_ReviewDate'
        $val = $CurrentForm->hasValue("ReviewDate") ? $CurrentForm->getValue("ReviewDate") : $CurrentForm->getValue("x_ReviewDate");
        if (!$this->ReviewDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReviewDate->Visible = false; // Disable update for API request
            } else {
                $this->ReviewDate->setFormValue($val);
            }
            $this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
        }

        // Check field name 'ReviewDoctor' first before field var 'x_ReviewDoctor'
        $val = $CurrentForm->hasValue("ReviewDoctor") ? $CurrentForm->getValue("ReviewDoctor") : $CurrentForm->getValue("x_ReviewDoctor");
        if (!$this->ReviewDoctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReviewDoctor->Visible = false; // Disable update for API request
            } else {
                $this->ReviewDoctor->setFormValue($val);
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
        $this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
        $this->PreTreatment->CurrentValue = $this->PreTreatment->FormValue;
        $this->Hysteroscopy->CurrentValue = $this->Hysteroscopy->FormValue;
        $this->EndometrialScratching->CurrentValue = $this->EndometrialScratching->FormValue;
        $this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
        $this->CYCLETYPE->CurrentValue = $this->CYCLETYPE->FormValue;
        $this->HRTCYCLE->CurrentValue = $this->HRTCYCLE->FormValue;
        $this->OralEstrogenDosage->CurrentValue = $this->OralEstrogenDosage->FormValue;
        $this->VaginalEstrogen->CurrentValue = $this->VaginalEstrogen->FormValue;
        $this->GCSF->CurrentValue = $this->GCSF->FormValue;
        $this->ActivatedPRP->CurrentValue = $this->ActivatedPRP->FormValue;
        $this->ERA->CurrentValue = $this->ERA->FormValue;
        $this->UCLcm->CurrentValue = $this->UCLcm->FormValue;
        $this->DATEOFSTART->CurrentValue = $this->DATEOFSTART->FormValue;
        $this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 0);
        $this->DATEOFEMBRYOTRANSFER->CurrentValue = $this->DATEOFEMBRYOTRANSFER->FormValue;
        $this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 0);
        $this->DAYOFEMBRYOTRANSFER->CurrentValue = $this->DAYOFEMBRYOTRANSFER->FormValue;
        $this->NOOFEMBRYOSTHAWED->CurrentValue = $this->NOOFEMBRYOSTHAWED->FormValue;
        $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = $this->NOOFEMBRYOSTRANSFERRED->FormValue;
        $this->DAYOFEMBRYOS->CurrentValue = $this->DAYOFEMBRYOS->FormValue;
        $this->CRYOPRESERVEDEMBRYOS->CurrentValue = $this->CRYOPRESERVEDEMBRYOS->FormValue;
        $this->Code1->CurrentValue = $this->Code1->FormValue;
        $this->Code2->CurrentValue = $this->Code2->FormValue;
        $this->CellStage1->CurrentValue = $this->CellStage1->FormValue;
        $this->CellStage2->CurrentValue = $this->CellStage2->FormValue;
        $this->Grade1->CurrentValue = $this->Grade1->FormValue;
        $this->Grade2->CurrentValue = $this->Grade2->FormValue;
        $this->ProcedureRecord->CurrentValue = $this->ProcedureRecord->FormValue;
        $this->Medicationsadvised->CurrentValue = $this->Medicationsadvised->FormValue;
        $this->PostProcedureInstructions->CurrentValue = $this->PostProcedureInstructions->FormValue;
        $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = $this->PregnancyTestingWithSerumBetaHcG->FormValue;
        $this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
        $this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
        $this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->PreTreatment->setDbValue($row['PreTreatment']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->ERA->setDbValue($row['ERA']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
        $this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
        $this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
        $this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
        $this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['Consultant'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['PreTreatment'] = null;
        $row['Hysteroscopy'] = null;
        $row['EndometrialScratching'] = null;
        $row['TrialCannulation'] = null;
        $row['CYCLETYPE'] = null;
        $row['HRTCYCLE'] = null;
        $row['OralEstrogenDosage'] = null;
        $row['VaginalEstrogen'] = null;
        $row['GCSF'] = null;
        $row['ActivatedPRP'] = null;
        $row['ERA'] = null;
        $row['UCLcm'] = null;
        $row['DATEOFSTART'] = null;
        $row['DATEOFEMBRYOTRANSFER'] = null;
        $row['DAYOFEMBRYOTRANSFER'] = null;
        $row['NOOFEMBRYOSTHAWED'] = null;
        $row['NOOFEMBRYOSTRANSFERRED'] = null;
        $row['DAYOFEMBRYOS'] = null;
        $row['CRYOPRESERVEDEMBRYOS'] = null;
        $row['Code1'] = null;
        $row['Code2'] = null;
        $row['CellStage1'] = null;
        $row['CellStage2'] = null;
        $row['Grade1'] = null;
        $row['Grade2'] = null;
        $row['ProcedureRecord'] = null;
        $row['Medicationsadvised'] = null;
        $row['PostProcedureInstructions'] = null;
        $row['PregnancyTestingWithSerumBetaHcG'] = null;
        $row['ReviewDate'] = null;
        $row['ReviewDoctor'] = null;
        $row['TidNo'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("id")) != "") {
            $this->id->OldValue = $this->getKey("id"); // id
        } else {
            $validKey = false;
        }

        // Load old record
        $this->OldRecordset = null;
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

        // Name

        // ARTCycle

        // Consultant

        // InseminatinTechnique

        // IndicationForART

        // PreTreatment

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // ERA

        // UCLcm

        // DATEOFSTART

        // DATEOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // Code1

        // Code2

        // CellStage1

        // CellStage2

        // Grade1

        // Grade2

        // ProcedureRecord

        // Medicationsadvised

        // PostProcedureInstructions

        // PregnancyTestingWithSerumBetaHcG

        // ReviewDate

        // ReviewDoctor

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // PreTreatment
            $this->PreTreatment->ViewValue = $this->PreTreatment->CurrentValue;
            $this->PreTreatment->ViewCustomAttributes = "";

            // Hysteroscopy
            $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
            $this->Hysteroscopy->ViewCustomAttributes = "";

            // EndometrialScratching
            $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->CurrentValue;
            $this->EndometrialScratching->ViewCustomAttributes = "";

            // TrialCannulation
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
            $this->TrialCannulation->ViewCustomAttributes = "";

            // CYCLETYPE
            $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->CurrentValue;
            $this->CYCLETYPE->ViewCustomAttributes = "";

            // HRTCYCLE
            $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
            $this->HRTCYCLE->ViewCustomAttributes = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->CurrentValue;
            $this->OralEstrogenDosage->ViewCustomAttributes = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
            $this->VaginalEstrogen->ViewCustomAttributes = "";

            // GCSF
            $this->GCSF->ViewValue = $this->GCSF->CurrentValue;
            $this->GCSF->ViewCustomAttributes = "";

            // ActivatedPRP
            $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->CurrentValue;
            $this->ActivatedPRP->ViewCustomAttributes = "";

            // ERA
            $this->ERA->ViewValue = $this->ERA->CurrentValue;
            $this->ERA->ViewCustomAttributes = "";

            // UCLcm
            $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
            $this->UCLcm->ViewCustomAttributes = "";

            // DATEOFSTART
            $this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
            $this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 0);
            $this->DATEOFSTART->ViewCustomAttributes = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
            $this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 0);
            $this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
            $this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
            $this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
            $this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
            $this->DAYOFEMBRYOS->ViewCustomAttributes = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
            $this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // CellStage1
            $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
            $this->CellStage1->ViewCustomAttributes = "";

            // CellStage2
            $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade1
            $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
            $this->Grade1->ViewCustomAttributes = "";

            // Grade2
            $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
            $this->Grade2->ViewCustomAttributes = "";

            // ProcedureRecord
            $this->ProcedureRecord->ViewValue = $this->ProcedureRecord->CurrentValue;
            $this->ProcedureRecord->ViewCustomAttributes = "";

            // Medicationsadvised
            $this->Medicationsadvised->ViewValue = $this->Medicationsadvised->CurrentValue;
            $this->Medicationsadvised->ViewCustomAttributes = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->ViewValue = $this->PostProcedureInstructions->CurrentValue;
            $this->PostProcedureInstructions->ViewCustomAttributes = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
            $this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

            // ReviewDate
            $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
            $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
            $this->ReviewDate->ViewCustomAttributes = "";

            // ReviewDoctor
            $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
            $this->ReviewDoctor->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // PreTreatment
            $this->PreTreatment->LinkCustomAttributes = "";
            $this->PreTreatment->HrefValue = "";
            $this->PreTreatment->TooltipValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";
            $this->Hysteroscopy->TooltipValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";
            $this->EndometrialScratching->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";
            $this->CYCLETYPE->TooltipValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";
            $this->HRTCYCLE->TooltipValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";
            $this->OralEstrogenDosage->TooltipValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";
            $this->VaginalEstrogen->TooltipValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";
            $this->GCSF->TooltipValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";
            $this->ActivatedPRP->TooltipValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";
            $this->ERA->TooltipValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";
            $this->UCLcm->TooltipValue = "";

            // DATEOFSTART
            $this->DATEOFSTART->LinkCustomAttributes = "";
            $this->DATEOFSTART->HrefValue = "";
            $this->DATEOFSTART->TooltipValue = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->HrefValue = "";
            $this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";
            $this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";
            $this->NOOFEMBRYOSTHAWED->TooltipValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
            $this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";
            $this->DAYOFEMBRYOS->TooltipValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
            $this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // ProcedureRecord
            $this->ProcedureRecord->LinkCustomAttributes = "";
            $this->ProcedureRecord->HrefValue = "";
            $this->ProcedureRecord->TooltipValue = "";

            // Medicationsadvised
            $this->Medicationsadvised->LinkCustomAttributes = "";
            $this->Medicationsadvised->HrefValue = "";
            $this->Medicationsadvised->TooltipValue = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->LinkCustomAttributes = "";
            $this->PostProcedureInstructions->HrefValue = "";
            $this->PostProcedureInstructions->TooltipValue = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
            $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
            $this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";
            $this->ReviewDate->TooltipValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";
            $this->ReviewDoctor->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
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

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            if (!$this->ARTCycle->Raw) {
                $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
            }
            $this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // InseminatinTechnique
            $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
            $this->InseminatinTechnique->EditCustomAttributes = "";
            if (!$this->InseminatinTechnique->Raw) {
                $this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
            }
            $this->InseminatinTechnique->EditValue = HtmlEncode($this->InseminatinTechnique->CurrentValue);
            $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

            // IndicationForART
            $this->IndicationForART->EditAttrs["class"] = "form-control";
            $this->IndicationForART->EditCustomAttributes = "";
            if (!$this->IndicationForART->Raw) {
                $this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
            }
            $this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
            $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

            // PreTreatment
            $this->PreTreatment->EditAttrs["class"] = "form-control";
            $this->PreTreatment->EditCustomAttributes = "";
            if (!$this->PreTreatment->Raw) {
                $this->PreTreatment->CurrentValue = HtmlDecode($this->PreTreatment->CurrentValue);
            }
            $this->PreTreatment->EditValue = HtmlEncode($this->PreTreatment->CurrentValue);
            $this->PreTreatment->PlaceHolder = RemoveHtml($this->PreTreatment->caption());

            // Hysteroscopy
            $this->Hysteroscopy->EditAttrs["class"] = "form-control";
            $this->Hysteroscopy->EditCustomAttributes = "";
            if (!$this->Hysteroscopy->Raw) {
                $this->Hysteroscopy->CurrentValue = HtmlDecode($this->Hysteroscopy->CurrentValue);
            }
            $this->Hysteroscopy->EditValue = HtmlEncode($this->Hysteroscopy->CurrentValue);
            $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

            // EndometrialScratching
            $this->EndometrialScratching->EditAttrs["class"] = "form-control";
            $this->EndometrialScratching->EditCustomAttributes = "";
            if (!$this->EndometrialScratching->Raw) {
                $this->EndometrialScratching->CurrentValue = HtmlDecode($this->EndometrialScratching->CurrentValue);
            }
            $this->EndometrialScratching->EditValue = HtmlEncode($this->EndometrialScratching->CurrentValue);
            $this->EndometrialScratching->PlaceHolder = RemoveHtml($this->EndometrialScratching->caption());

            // TrialCannulation
            $this->TrialCannulation->EditAttrs["class"] = "form-control";
            $this->TrialCannulation->EditCustomAttributes = "";
            if (!$this->TrialCannulation->Raw) {
                $this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
            }
            $this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
            $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

            // CYCLETYPE
            $this->CYCLETYPE->EditAttrs["class"] = "form-control";
            $this->CYCLETYPE->EditCustomAttributes = "";
            if (!$this->CYCLETYPE->Raw) {
                $this->CYCLETYPE->CurrentValue = HtmlDecode($this->CYCLETYPE->CurrentValue);
            }
            $this->CYCLETYPE->EditValue = HtmlEncode($this->CYCLETYPE->CurrentValue);
            $this->CYCLETYPE->PlaceHolder = RemoveHtml($this->CYCLETYPE->caption());

            // HRTCYCLE
            $this->HRTCYCLE->EditAttrs["class"] = "form-control";
            $this->HRTCYCLE->EditCustomAttributes = "";
            if (!$this->HRTCYCLE->Raw) {
                $this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
            }
            $this->HRTCYCLE->EditValue = HtmlEncode($this->HRTCYCLE->CurrentValue);
            $this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

            // OralEstrogenDosage
            $this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
            $this->OralEstrogenDosage->EditCustomAttributes = "";
            if (!$this->OralEstrogenDosage->Raw) {
                $this->OralEstrogenDosage->CurrentValue = HtmlDecode($this->OralEstrogenDosage->CurrentValue);
            }
            $this->OralEstrogenDosage->EditValue = HtmlEncode($this->OralEstrogenDosage->CurrentValue);
            $this->OralEstrogenDosage->PlaceHolder = RemoveHtml($this->OralEstrogenDosage->caption());

            // VaginalEstrogen
            $this->VaginalEstrogen->EditAttrs["class"] = "form-control";
            $this->VaginalEstrogen->EditCustomAttributes = "";
            if (!$this->VaginalEstrogen->Raw) {
                $this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
            }
            $this->VaginalEstrogen->EditValue = HtmlEncode($this->VaginalEstrogen->CurrentValue);
            $this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

            // GCSF
            $this->GCSF->EditAttrs["class"] = "form-control";
            $this->GCSF->EditCustomAttributes = "";
            if (!$this->GCSF->Raw) {
                $this->GCSF->CurrentValue = HtmlDecode($this->GCSF->CurrentValue);
            }
            $this->GCSF->EditValue = HtmlEncode($this->GCSF->CurrentValue);
            $this->GCSF->PlaceHolder = RemoveHtml($this->GCSF->caption());

            // ActivatedPRP
            $this->ActivatedPRP->EditAttrs["class"] = "form-control";
            $this->ActivatedPRP->EditCustomAttributes = "";
            if (!$this->ActivatedPRP->Raw) {
                $this->ActivatedPRP->CurrentValue = HtmlDecode($this->ActivatedPRP->CurrentValue);
            }
            $this->ActivatedPRP->EditValue = HtmlEncode($this->ActivatedPRP->CurrentValue);
            $this->ActivatedPRP->PlaceHolder = RemoveHtml($this->ActivatedPRP->caption());

            // ERA
            $this->ERA->EditAttrs["class"] = "form-control";
            $this->ERA->EditCustomAttributes = "";
            if (!$this->ERA->Raw) {
                $this->ERA->CurrentValue = HtmlDecode($this->ERA->CurrentValue);
            }
            $this->ERA->EditValue = HtmlEncode($this->ERA->CurrentValue);
            $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

            // UCLcm
            $this->UCLcm->EditAttrs["class"] = "form-control";
            $this->UCLcm->EditCustomAttributes = "";
            if (!$this->UCLcm->Raw) {
                $this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
            }
            $this->UCLcm->EditValue = HtmlEncode($this->UCLcm->CurrentValue);
            $this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

            // DATEOFSTART
            $this->DATEOFSTART->EditAttrs["class"] = "form-control";
            $this->DATEOFSTART->EditCustomAttributes = "";
            $this->DATEOFSTART->EditValue = HtmlEncode(FormatDateTime($this->DATEOFSTART->CurrentValue, 8));
            $this->DATEOFSTART->PlaceHolder = RemoveHtml($this->DATEOFSTART->caption());

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DATEOFEMBRYOTRANSFER->EditCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->EditValue = HtmlEncode(FormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 8));
            $this->DATEOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATEOFEMBRYOTRANSFER->caption());

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOTRANSFER->Raw) {
                $this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            }
            $this->DAYOFEMBRYOTRANSFER->EditValue = HtmlEncode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            $this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTHAWED->Raw) {
                $this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            }
            $this->NOOFEMBRYOSTHAWED->EditValue = HtmlEncode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            $this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTRANSFERRED->Raw) {
                $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            }
            $this->NOOFEMBRYOSTRANSFERRED->EditValue = HtmlEncode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            $this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOS->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOS->Raw) {
                $this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
            }
            $this->DAYOFEMBRYOS->EditValue = HtmlEncode($this->DAYOFEMBRYOS->CurrentValue);
            $this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
            $this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
            if (!$this->CRYOPRESERVEDEMBRYOS->Raw) {
                $this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            }
            $this->CRYOPRESERVEDEMBRYOS->EditValue = HtmlEncode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            $this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

            // Code1
            $this->Code1->EditAttrs["class"] = "form-control";
            $this->Code1->EditCustomAttributes = "";
            if (!$this->Code1->Raw) {
                $this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
            }
            $this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
            $this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

            // Code2
            $this->Code2->EditAttrs["class"] = "form-control";
            $this->Code2->EditCustomAttributes = "";
            if (!$this->Code2->Raw) {
                $this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
            }
            $this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
            $this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

            // CellStage1
            $this->CellStage1->EditAttrs["class"] = "form-control";
            $this->CellStage1->EditCustomAttributes = "";
            if (!$this->CellStage1->Raw) {
                $this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
            }
            $this->CellStage1->EditValue = HtmlEncode($this->CellStage1->CurrentValue);
            $this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

            // CellStage2
            $this->CellStage2->EditAttrs["class"] = "form-control";
            $this->CellStage2->EditCustomAttributes = "";
            if (!$this->CellStage2->Raw) {
                $this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
            }
            $this->CellStage2->EditValue = HtmlEncode($this->CellStage2->CurrentValue);
            $this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

            // Grade1
            $this->Grade1->EditAttrs["class"] = "form-control";
            $this->Grade1->EditCustomAttributes = "";
            if (!$this->Grade1->Raw) {
                $this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
            }
            $this->Grade1->EditValue = HtmlEncode($this->Grade1->CurrentValue);
            $this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

            // Grade2
            $this->Grade2->EditAttrs["class"] = "form-control";
            $this->Grade2->EditCustomAttributes = "";
            if (!$this->Grade2->Raw) {
                $this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
            }
            $this->Grade2->EditValue = HtmlEncode($this->Grade2->CurrentValue);
            $this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

            // ProcedureRecord
            $this->ProcedureRecord->EditAttrs["class"] = "form-control";
            $this->ProcedureRecord->EditCustomAttributes = "";
            $this->ProcedureRecord->EditValue = HtmlEncode($this->ProcedureRecord->CurrentValue);
            $this->ProcedureRecord->PlaceHolder = RemoveHtml($this->ProcedureRecord->caption());

            // Medicationsadvised
            $this->Medicationsadvised->EditAttrs["class"] = "form-control";
            $this->Medicationsadvised->EditCustomAttributes = "";
            $this->Medicationsadvised->EditValue = HtmlEncode($this->Medicationsadvised->CurrentValue);
            $this->Medicationsadvised->PlaceHolder = RemoveHtml($this->Medicationsadvised->caption());

            // PostProcedureInstructions
            $this->PostProcedureInstructions->EditAttrs["class"] = "form-control";
            $this->PostProcedureInstructions->EditCustomAttributes = "";
            $this->PostProcedureInstructions->EditValue = HtmlEncode($this->PostProcedureInstructions->CurrentValue);
            $this->PostProcedureInstructions->PlaceHolder = RemoveHtml($this->PostProcedureInstructions->caption());

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->EditAttrs["class"] = "form-control";
            $this->PregnancyTestingWithSerumBetaHcG->EditCustomAttributes = "";
            if (!$this->PregnancyTestingWithSerumBetaHcG->Raw) {
                $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = HtmlDecode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
            }
            $this->PregnancyTestingWithSerumBetaHcG->EditValue = HtmlEncode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
            $this->PregnancyTestingWithSerumBetaHcG->PlaceHolder = RemoveHtml($this->PregnancyTestingWithSerumBetaHcG->caption());

            // ReviewDate
            $this->ReviewDate->EditAttrs["class"] = "form-control";
            $this->ReviewDate->EditCustomAttributes = "";
            $this->ReviewDate->EditValue = HtmlEncode(FormatDateTime($this->ReviewDate->CurrentValue, 8));
            $this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

            // ReviewDoctor
            $this->ReviewDoctor->EditAttrs["class"] = "form-control";
            $this->ReviewDoctor->EditCustomAttributes = "";
            if (!$this->ReviewDoctor->Raw) {
                $this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
            }
            $this->ReviewDoctor->EditValue = HtmlEncode($this->ReviewDoctor->CurrentValue);
            $this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";

            // PreTreatment
            $this->PreTreatment->LinkCustomAttributes = "";
            $this->PreTreatment->HrefValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";

            // DATEOFSTART
            $this->DATEOFSTART->LinkCustomAttributes = "";
            $this->DATEOFSTART->HrefValue = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->HrefValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";

            // ProcedureRecord
            $this->ProcedureRecord->LinkCustomAttributes = "";
            $this->ProcedureRecord->HrefValue = "";

            // Medicationsadvised
            $this->Medicationsadvised->LinkCustomAttributes = "";
            $this->Medicationsadvised->HrefValue = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->LinkCustomAttributes = "";
            $this->PostProcedureInstructions->HrefValue = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
            $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
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
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->ARTCycle->Required) {
            if (!$this->ARTCycle->IsDetailKey && EmptyValue($this->ARTCycle->FormValue)) {
                $this->ARTCycle->addErrorMessage(str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->InseminatinTechnique->Required) {
            if (!$this->InseminatinTechnique->IsDetailKey && EmptyValue($this->InseminatinTechnique->FormValue)) {
                $this->InseminatinTechnique->addErrorMessage(str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
            }
        }
        if ($this->IndicationForART->Required) {
            if (!$this->IndicationForART->IsDetailKey && EmptyValue($this->IndicationForART->FormValue)) {
                $this->IndicationForART->addErrorMessage(str_replace("%s", $this->IndicationForART->caption(), $this->IndicationForART->RequiredErrorMessage));
            }
        }
        if ($this->PreTreatment->Required) {
            if (!$this->PreTreatment->IsDetailKey && EmptyValue($this->PreTreatment->FormValue)) {
                $this->PreTreatment->addErrorMessage(str_replace("%s", $this->PreTreatment->caption(), $this->PreTreatment->RequiredErrorMessage));
            }
        }
        if ($this->Hysteroscopy->Required) {
            if (!$this->Hysteroscopy->IsDetailKey && EmptyValue($this->Hysteroscopy->FormValue)) {
                $this->Hysteroscopy->addErrorMessage(str_replace("%s", $this->Hysteroscopy->caption(), $this->Hysteroscopy->RequiredErrorMessage));
            }
        }
        if ($this->EndometrialScratching->Required) {
            if (!$this->EndometrialScratching->IsDetailKey && EmptyValue($this->EndometrialScratching->FormValue)) {
                $this->EndometrialScratching->addErrorMessage(str_replace("%s", $this->EndometrialScratching->caption(), $this->EndometrialScratching->RequiredErrorMessage));
            }
        }
        if ($this->TrialCannulation->Required) {
            if (!$this->TrialCannulation->IsDetailKey && EmptyValue($this->TrialCannulation->FormValue)) {
                $this->TrialCannulation->addErrorMessage(str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
            }
        }
        if ($this->CYCLETYPE->Required) {
            if (!$this->CYCLETYPE->IsDetailKey && EmptyValue($this->CYCLETYPE->FormValue)) {
                $this->CYCLETYPE->addErrorMessage(str_replace("%s", $this->CYCLETYPE->caption(), $this->CYCLETYPE->RequiredErrorMessage));
            }
        }
        if ($this->HRTCYCLE->Required) {
            if (!$this->HRTCYCLE->IsDetailKey && EmptyValue($this->HRTCYCLE->FormValue)) {
                $this->HRTCYCLE->addErrorMessage(str_replace("%s", $this->HRTCYCLE->caption(), $this->HRTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->OralEstrogenDosage->Required) {
            if (!$this->OralEstrogenDosage->IsDetailKey && EmptyValue($this->OralEstrogenDosage->FormValue)) {
                $this->OralEstrogenDosage->addErrorMessage(str_replace("%s", $this->OralEstrogenDosage->caption(), $this->OralEstrogenDosage->RequiredErrorMessage));
            }
        }
        if ($this->VaginalEstrogen->Required) {
            if (!$this->VaginalEstrogen->IsDetailKey && EmptyValue($this->VaginalEstrogen->FormValue)) {
                $this->VaginalEstrogen->addErrorMessage(str_replace("%s", $this->VaginalEstrogen->caption(), $this->VaginalEstrogen->RequiredErrorMessage));
            }
        }
        if ($this->GCSF->Required) {
            if (!$this->GCSF->IsDetailKey && EmptyValue($this->GCSF->FormValue)) {
                $this->GCSF->addErrorMessage(str_replace("%s", $this->GCSF->caption(), $this->GCSF->RequiredErrorMessage));
            }
        }
        if ($this->ActivatedPRP->Required) {
            if (!$this->ActivatedPRP->IsDetailKey && EmptyValue($this->ActivatedPRP->FormValue)) {
                $this->ActivatedPRP->addErrorMessage(str_replace("%s", $this->ActivatedPRP->caption(), $this->ActivatedPRP->RequiredErrorMessage));
            }
        }
        if ($this->ERA->Required) {
            if (!$this->ERA->IsDetailKey && EmptyValue($this->ERA->FormValue)) {
                $this->ERA->addErrorMessage(str_replace("%s", $this->ERA->caption(), $this->ERA->RequiredErrorMessage));
            }
        }
        if ($this->UCLcm->Required) {
            if (!$this->UCLcm->IsDetailKey && EmptyValue($this->UCLcm->FormValue)) {
                $this->UCLcm->addErrorMessage(str_replace("%s", $this->UCLcm->caption(), $this->UCLcm->RequiredErrorMessage));
            }
        }
        if ($this->DATEOFSTART->Required) {
            if (!$this->DATEOFSTART->IsDetailKey && EmptyValue($this->DATEOFSTART->FormValue)) {
                $this->DATEOFSTART->addErrorMessage(str_replace("%s", $this->DATEOFSTART->caption(), $this->DATEOFSTART->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DATEOFSTART->FormValue)) {
            $this->DATEOFSTART->addErrorMessage($this->DATEOFSTART->getErrorMessage(false));
        }
        if ($this->DATEOFEMBRYOTRANSFER->Required) {
            if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DATEOFEMBRYOTRANSFER->FormValue)) {
                $this->DATEOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DATEOFEMBRYOTRANSFER->caption(), $this->DATEOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DATEOFEMBRYOTRANSFER->FormValue)) {
            $this->DATEOFEMBRYOTRANSFER->addErrorMessage($this->DATEOFEMBRYOTRANSFER->getErrorMessage(false));
        }
        if ($this->DAYOFEMBRYOTRANSFER->Required) {
            if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DAYOFEMBRYOTRANSFER->FormValue)) {
                $this->DAYOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOTRANSFER->caption(), $this->DAYOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTHAWED->Required) {
            if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTHAWED->FormValue)) {
                $this->NOOFEMBRYOSTHAWED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTHAWED->caption(), $this->NOOFEMBRYOSTHAWED->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTRANSFERRED->Required) {
            if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTRANSFERRED->FormValue)) {
                $this->NOOFEMBRYOSTRANSFERRED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTRANSFERRED->caption(), $this->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage));
            }
        }
        if ($this->DAYOFEMBRYOS->Required) {
            if (!$this->DAYOFEMBRYOS->IsDetailKey && EmptyValue($this->DAYOFEMBRYOS->FormValue)) {
                $this->DAYOFEMBRYOS->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOS->caption(), $this->DAYOFEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->CRYOPRESERVEDEMBRYOS->Required) {
            if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey && EmptyValue($this->CRYOPRESERVEDEMBRYOS->FormValue)) {
                $this->CRYOPRESERVEDEMBRYOS->addErrorMessage(str_replace("%s", $this->CRYOPRESERVEDEMBRYOS->caption(), $this->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->Code1->Required) {
            if (!$this->Code1->IsDetailKey && EmptyValue($this->Code1->FormValue)) {
                $this->Code1->addErrorMessage(str_replace("%s", $this->Code1->caption(), $this->Code1->RequiredErrorMessage));
            }
        }
        if ($this->Code2->Required) {
            if (!$this->Code2->IsDetailKey && EmptyValue($this->Code2->FormValue)) {
                $this->Code2->addErrorMessage(str_replace("%s", $this->Code2->caption(), $this->Code2->RequiredErrorMessage));
            }
        }
        if ($this->CellStage1->Required) {
            if (!$this->CellStage1->IsDetailKey && EmptyValue($this->CellStage1->FormValue)) {
                $this->CellStage1->addErrorMessage(str_replace("%s", $this->CellStage1->caption(), $this->CellStage1->RequiredErrorMessage));
            }
        }
        if ($this->CellStage2->Required) {
            if (!$this->CellStage2->IsDetailKey && EmptyValue($this->CellStage2->FormValue)) {
                $this->CellStage2->addErrorMessage(str_replace("%s", $this->CellStage2->caption(), $this->CellStage2->RequiredErrorMessage));
            }
        }
        if ($this->Grade1->Required) {
            if (!$this->Grade1->IsDetailKey && EmptyValue($this->Grade1->FormValue)) {
                $this->Grade1->addErrorMessage(str_replace("%s", $this->Grade1->caption(), $this->Grade1->RequiredErrorMessage));
            }
        }
        if ($this->Grade2->Required) {
            if (!$this->Grade2->IsDetailKey && EmptyValue($this->Grade2->FormValue)) {
                $this->Grade2->addErrorMessage(str_replace("%s", $this->Grade2->caption(), $this->Grade2->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureRecord->Required) {
            if (!$this->ProcedureRecord->IsDetailKey && EmptyValue($this->ProcedureRecord->FormValue)) {
                $this->ProcedureRecord->addErrorMessage(str_replace("%s", $this->ProcedureRecord->caption(), $this->ProcedureRecord->RequiredErrorMessage));
            }
        }
        if ($this->Medicationsadvised->Required) {
            if (!$this->Medicationsadvised->IsDetailKey && EmptyValue($this->Medicationsadvised->FormValue)) {
                $this->Medicationsadvised->addErrorMessage(str_replace("%s", $this->Medicationsadvised->caption(), $this->Medicationsadvised->RequiredErrorMessage));
            }
        }
        if ($this->PostProcedureInstructions->Required) {
            if (!$this->PostProcedureInstructions->IsDetailKey && EmptyValue($this->PostProcedureInstructions->FormValue)) {
                $this->PostProcedureInstructions->addErrorMessage(str_replace("%s", $this->PostProcedureInstructions->caption(), $this->PostProcedureInstructions->RequiredErrorMessage));
            }
        }
        if ($this->PregnancyTestingWithSerumBetaHcG->Required) {
            if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey && EmptyValue($this->PregnancyTestingWithSerumBetaHcG->FormValue)) {
                $this->PregnancyTestingWithSerumBetaHcG->addErrorMessage(str_replace("%s", $this->PregnancyTestingWithSerumBetaHcG->caption(), $this->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage));
            }
        }
        if ($this->ReviewDate->Required) {
            if (!$this->ReviewDate->IsDetailKey && EmptyValue($this->ReviewDate->FormValue)) {
                $this->ReviewDate->addErrorMessage(str_replace("%s", $this->ReviewDate->caption(), $this->ReviewDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReviewDate->FormValue)) {
            $this->ReviewDate->addErrorMessage($this->ReviewDate->getErrorMessage(false));
        }
        if ($this->ReviewDoctor->Required) {
            if (!$this->ReviewDoctor->IsDetailKey && EmptyValue($this->ReviewDoctor->FormValue)) {
                $this->ReviewDoctor->addErrorMessage(str_replace("%s", $this->ReviewDoctor->caption(), $this->ReviewDoctor->RequiredErrorMessage));
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
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // RIDNo
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, $this->RIDNo->ReadOnly);

            // Name
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // ARTCycle
            $this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, null, $this->ARTCycle->ReadOnly);

            // Consultant
            $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, $this->Consultant->ReadOnly);

            // InseminatinTechnique
            $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, $this->InseminatinTechnique->ReadOnly);

            // IndicationForART
            $this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, null, $this->IndicationForART->ReadOnly);

            // PreTreatment
            $this->PreTreatment->setDbValueDef($rsnew, $this->PreTreatment->CurrentValue, null, $this->PreTreatment->ReadOnly);

            // Hysteroscopy
            $this->Hysteroscopy->setDbValueDef($rsnew, $this->Hysteroscopy->CurrentValue, null, $this->Hysteroscopy->ReadOnly);

            // EndometrialScratching
            $this->EndometrialScratching->setDbValueDef($rsnew, $this->EndometrialScratching->CurrentValue, null, $this->EndometrialScratching->ReadOnly);

            // TrialCannulation
            $this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, null, $this->TrialCannulation->ReadOnly);

            // CYCLETYPE
            $this->CYCLETYPE->setDbValueDef($rsnew, $this->CYCLETYPE->CurrentValue, null, $this->CYCLETYPE->ReadOnly);

            // HRTCYCLE
            $this->HRTCYCLE->setDbValueDef($rsnew, $this->HRTCYCLE->CurrentValue, null, $this->HRTCYCLE->ReadOnly);

            // OralEstrogenDosage
            $this->OralEstrogenDosage->setDbValueDef($rsnew, $this->OralEstrogenDosage->CurrentValue, null, $this->OralEstrogenDosage->ReadOnly);

            // VaginalEstrogen
            $this->VaginalEstrogen->setDbValueDef($rsnew, $this->VaginalEstrogen->CurrentValue, null, $this->VaginalEstrogen->ReadOnly);

            // GCSF
            $this->GCSF->setDbValueDef($rsnew, $this->GCSF->CurrentValue, null, $this->GCSF->ReadOnly);

            // ActivatedPRP
            $this->ActivatedPRP->setDbValueDef($rsnew, $this->ActivatedPRP->CurrentValue, null, $this->ActivatedPRP->ReadOnly);

            // ERA
            $this->ERA->setDbValueDef($rsnew, $this->ERA->CurrentValue, null, $this->ERA->ReadOnly);

            // UCLcm
            $this->UCLcm->setDbValueDef($rsnew, $this->UCLcm->CurrentValue, null, $this->UCLcm->ReadOnly);

            // DATEOFSTART
            $this->DATEOFSTART->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFSTART->CurrentValue, 0), null, $this->DATEOFSTART->ReadOnly);

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 0), null, $this->DATEOFEMBRYOTRANSFER->ReadOnly);

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->setDbValueDef($rsnew, $this->DAYOFEMBRYOTRANSFER->CurrentValue, null, $this->DAYOFEMBRYOTRANSFER->ReadOnly);

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTHAWED->CurrentValue, null, $this->NOOFEMBRYOSTHAWED->ReadOnly);

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTRANSFERRED->CurrentValue, null, $this->NOOFEMBRYOSTRANSFERRED->ReadOnly);

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->setDbValueDef($rsnew, $this->DAYOFEMBRYOS->CurrentValue, null, $this->DAYOFEMBRYOS->ReadOnly);

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->setDbValueDef($rsnew, $this->CRYOPRESERVEDEMBRYOS->CurrentValue, null, $this->CRYOPRESERVEDEMBRYOS->ReadOnly);

            // Code1
            $this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, null, $this->Code1->ReadOnly);

            // Code2
            $this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, null, $this->Code2->ReadOnly);

            // CellStage1
            $this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, null, $this->CellStage1->ReadOnly);

            // CellStage2
            $this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, null, $this->CellStage2->ReadOnly);

            // Grade1
            $this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, null, $this->Grade1->ReadOnly);

            // Grade2
            $this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, null, $this->Grade2->ReadOnly);

            // ProcedureRecord
            $this->ProcedureRecord->setDbValueDef($rsnew, $this->ProcedureRecord->CurrentValue, null, $this->ProcedureRecord->ReadOnly);

            // Medicationsadvised
            $this->Medicationsadvised->setDbValueDef($rsnew, $this->Medicationsadvised->CurrentValue, null, $this->Medicationsadvised->ReadOnly);

            // PostProcedureInstructions
            $this->PostProcedureInstructions->setDbValueDef($rsnew, $this->PostProcedureInstructions->CurrentValue, null, $this->PostProcedureInstructions->ReadOnly);

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->setDbValueDef($rsnew, $this->PregnancyTestingWithSerumBetaHcG->CurrentValue, null, $this->PregnancyTestingWithSerumBetaHcG->ReadOnly);

            // ReviewDate
            $this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), null, $this->ReviewDate->ReadOnly);

            // ReviewDoctor
            $this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, null, $this->ReviewDoctor->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    $editRow = $this->update($rsnew, "", $rsold);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfEtChartList"), "", $this->TableVar, true);
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

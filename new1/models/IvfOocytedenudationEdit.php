<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOocytedenudationEdit extends IvfOocytedenudation
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_oocytedenudation';

    // Page object name
    public $PageObjName = "IvfOocytedenudationEdit";

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

        // Table object (ivf_oocytedenudation)
        if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
            $GLOBALS["ivf_oocytedenudation"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_oocytedenudation');
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
                $doc = new $class(Container("ivf_oocytedenudation"));
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
                    if ($pageName == "IvfOocytedenudationView") {
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
        $this->ResultDate->setVisibility();
        $this->Surgeon->setVisibility();
        $this->AsstSurgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AnaestheiaType->setVisibility();
        $this->PrimaryEmbryologist->setVisibility();
        $this->SecondaryEmbryologist->setVisibility();
        $this->OPUNotes->setVisibility();
        $this->NoOfFolliclesRight->setVisibility();
        $this->NoOfFolliclesLeft->setVisibility();
        $this->NoOfOocytes->setVisibility();
        $this->RecordOocyteDenudation->setVisibility();
        $this->DateOfDenudation->setVisibility();
        $this->DenudationDoneBy->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->TidNo->setVisibility();
        $this->ExpFollicles->setVisibility();
        $this->SecondaryDenudationDoneBy->setVisibility();
        $this->OocyteOrgin->setVisibility();
        $this->patient1->setVisibility();
        $this->patient2->setVisibility();
        $this->OocytesDonate1->setVisibility();
        $this->OocytesDonate2->setVisibility();
        $this->ETDonate->setVisibility();
        $this->OocyteType->setVisibility();
        $this->MIOocytesDonate1->setVisibility();
        $this->MIOocytesDonate2->setVisibility();
        $this->SelfMI->setVisibility();
        $this->SelfMII->setVisibility();
        $this->patient3->setVisibility();
        $this->patient4->setVisibility();
        $this->OocytesDonate3->setVisibility();
        $this->OocytesDonate4->setVisibility();
        $this->MIOocytesDonate3->setVisibility();
        $this->MIOocytesDonate4->setVisibility();
        $this->SelfOocytesMI->setVisibility();
        $this->SelfOocytesMII->setVisibility();
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
                    $this->terminate("IvfOocytedenudationList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfOocytedenudationList") {
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

        // Check field name 'ResultDate' first before field var 'x_ResultDate'
        $val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
        if (!$this->ResultDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultDate->setFormValue($val);
            }
            $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        }

        // Check field name 'Surgeon' first before field var 'x_Surgeon'
        $val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
        if (!$this->Surgeon->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Surgeon->Visible = false; // Disable update for API request
            } else {
                $this->Surgeon->setFormValue($val);
            }
        }

        // Check field name 'AsstSurgeon' first before field var 'x_AsstSurgeon'
        $val = $CurrentForm->hasValue("AsstSurgeon") ? $CurrentForm->getValue("AsstSurgeon") : $CurrentForm->getValue("x_AsstSurgeon");
        if (!$this->AsstSurgeon->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AsstSurgeon->Visible = false; // Disable update for API request
            } else {
                $this->AsstSurgeon->setFormValue($val);
            }
        }

        // Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
        $val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
        if (!$this->Anaesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anaesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anaesthetist->setFormValue($val);
            }
        }

        // Check field name 'AnaestheiaType' first before field var 'x_AnaestheiaType'
        $val = $CurrentForm->hasValue("AnaestheiaType") ? $CurrentForm->getValue("AnaestheiaType") : $CurrentForm->getValue("x_AnaestheiaType");
        if (!$this->AnaestheiaType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnaestheiaType->Visible = false; // Disable update for API request
            } else {
                $this->AnaestheiaType->setFormValue($val);
            }
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

        // Check field name 'OPUNotes' first before field var 'x_OPUNotes'
        $val = $CurrentForm->hasValue("OPUNotes") ? $CurrentForm->getValue("OPUNotes") : $CurrentForm->getValue("x_OPUNotes");
        if (!$this->OPUNotes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPUNotes->Visible = false; // Disable update for API request
            } else {
                $this->OPUNotes->setFormValue($val);
            }
        }

        // Check field name 'NoOfFolliclesRight' first before field var 'x_NoOfFolliclesRight'
        $val = $CurrentForm->hasValue("NoOfFolliclesRight") ? $CurrentForm->getValue("NoOfFolliclesRight") : $CurrentForm->getValue("x_NoOfFolliclesRight");
        if (!$this->NoOfFolliclesRight->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfFolliclesRight->Visible = false; // Disable update for API request
            } else {
                $this->NoOfFolliclesRight->setFormValue($val);
            }
        }

        // Check field name 'NoOfFolliclesLeft' first before field var 'x_NoOfFolliclesLeft'
        $val = $CurrentForm->hasValue("NoOfFolliclesLeft") ? $CurrentForm->getValue("NoOfFolliclesLeft") : $CurrentForm->getValue("x_NoOfFolliclesLeft");
        if (!$this->NoOfFolliclesLeft->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfFolliclesLeft->Visible = false; // Disable update for API request
            } else {
                $this->NoOfFolliclesLeft->setFormValue($val);
            }
        }

        // Check field name 'NoOfOocytes' first before field var 'x_NoOfOocytes'
        $val = $CurrentForm->hasValue("NoOfOocytes") ? $CurrentForm->getValue("NoOfOocytes") : $CurrentForm->getValue("x_NoOfOocytes");
        if (!$this->NoOfOocytes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfOocytes->Visible = false; // Disable update for API request
            } else {
                $this->NoOfOocytes->setFormValue($val);
            }
        }

        // Check field name 'RecordOocyteDenudation' first before field var 'x_RecordOocyteDenudation'
        $val = $CurrentForm->hasValue("RecordOocyteDenudation") ? $CurrentForm->getValue("RecordOocyteDenudation") : $CurrentForm->getValue("x_RecordOocyteDenudation");
        if (!$this->RecordOocyteDenudation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecordOocyteDenudation->Visible = false; // Disable update for API request
            } else {
                $this->RecordOocyteDenudation->setFormValue($val);
            }
        }

        // Check field name 'DateOfDenudation' first before field var 'x_DateOfDenudation'
        $val = $CurrentForm->hasValue("DateOfDenudation") ? $CurrentForm->getValue("DateOfDenudation") : $CurrentForm->getValue("x_DateOfDenudation");
        if (!$this->DateOfDenudation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateOfDenudation->Visible = false; // Disable update for API request
            } else {
                $this->DateOfDenudation->setFormValue($val);
            }
            $this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 0);
        }

        // Check field name 'DenudationDoneBy' first before field var 'x_DenudationDoneBy'
        $val = $CurrentForm->hasValue("DenudationDoneBy") ? $CurrentForm->getValue("DenudationDoneBy") : $CurrentForm->getValue("x_DenudationDoneBy");
        if (!$this->DenudationDoneBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DenudationDoneBy->Visible = false; // Disable update for API request
            } else {
                $this->DenudationDoneBy->setFormValue($val);
            }
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
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

        // Check field name 'ExpFollicles' first before field var 'x_ExpFollicles'
        $val = $CurrentForm->hasValue("ExpFollicles") ? $CurrentForm->getValue("ExpFollicles") : $CurrentForm->getValue("x_ExpFollicles");
        if (!$this->ExpFollicles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpFollicles->Visible = false; // Disable update for API request
            } else {
                $this->ExpFollicles->setFormValue($val);
            }
        }

        // Check field name 'SecondaryDenudationDoneBy' first before field var 'x_SecondaryDenudationDoneBy'
        $val = $CurrentForm->hasValue("SecondaryDenudationDoneBy") ? $CurrentForm->getValue("SecondaryDenudationDoneBy") : $CurrentForm->getValue("x_SecondaryDenudationDoneBy");
        if (!$this->SecondaryDenudationDoneBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SecondaryDenudationDoneBy->Visible = false; // Disable update for API request
            } else {
                $this->SecondaryDenudationDoneBy->setFormValue($val);
            }
        }

        // Check field name 'OocyteOrgin' first before field var 'x_OocyteOrgin'
        $val = $CurrentForm->hasValue("OocyteOrgin") ? $CurrentForm->getValue("OocyteOrgin") : $CurrentForm->getValue("x_OocyteOrgin");
        if (!$this->OocyteOrgin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocyteOrgin->Visible = false; // Disable update for API request
            } else {
                $this->OocyteOrgin->setFormValue($val);
            }
        }

        // Check field name 'patient1' first before field var 'x_patient1'
        $val = $CurrentForm->hasValue("patient1") ? $CurrentForm->getValue("patient1") : $CurrentForm->getValue("x_patient1");
        if (!$this->patient1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient1->Visible = false; // Disable update for API request
            } else {
                $this->patient1->setFormValue($val);
            }
        }

        // Check field name 'patient2' first before field var 'x_patient2'
        $val = $CurrentForm->hasValue("patient2") ? $CurrentForm->getValue("patient2") : $CurrentForm->getValue("x_patient2");
        if (!$this->patient2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient2->Visible = false; // Disable update for API request
            } else {
                $this->patient2->setFormValue($val);
            }
        }

        // Check field name 'OocytesDonate1' first before field var 'x_OocytesDonate1'
        $val = $CurrentForm->hasValue("OocytesDonate1") ? $CurrentForm->getValue("OocytesDonate1") : $CurrentForm->getValue("x_OocytesDonate1");
        if (!$this->OocytesDonate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocytesDonate1->Visible = false; // Disable update for API request
            } else {
                $this->OocytesDonate1->setFormValue($val);
            }
        }

        // Check field name 'OocytesDonate2' first before field var 'x_OocytesDonate2'
        $val = $CurrentForm->hasValue("OocytesDonate2") ? $CurrentForm->getValue("OocytesDonate2") : $CurrentForm->getValue("x_OocytesDonate2");
        if (!$this->OocytesDonate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocytesDonate2->Visible = false; // Disable update for API request
            } else {
                $this->OocytesDonate2->setFormValue($val);
            }
        }

        // Check field name 'ETDonate' first before field var 'x_ETDonate'
        $val = $CurrentForm->hasValue("ETDonate") ? $CurrentForm->getValue("ETDonate") : $CurrentForm->getValue("x_ETDonate");
        if (!$this->ETDonate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETDonate->Visible = false; // Disable update for API request
            } else {
                $this->ETDonate->setFormValue($val);
            }
        }

        // Check field name 'OocyteType' first before field var 'x_OocyteType'
        $val = $CurrentForm->hasValue("OocyteType") ? $CurrentForm->getValue("OocyteType") : $CurrentForm->getValue("x_OocyteType");
        if (!$this->OocyteType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocyteType->Visible = false; // Disable update for API request
            } else {
                $this->OocyteType->setFormValue($val);
            }
        }

        // Check field name 'MIOocytesDonate1' first before field var 'x_MIOocytesDonate1'
        $val = $CurrentForm->hasValue("MIOocytesDonate1") ? $CurrentForm->getValue("MIOocytesDonate1") : $CurrentForm->getValue("x_MIOocytesDonate1");
        if (!$this->MIOocytesDonate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MIOocytesDonate1->Visible = false; // Disable update for API request
            } else {
                $this->MIOocytesDonate1->setFormValue($val);
            }
        }

        // Check field name 'MIOocytesDonate2' first before field var 'x_MIOocytesDonate2'
        $val = $CurrentForm->hasValue("MIOocytesDonate2") ? $CurrentForm->getValue("MIOocytesDonate2") : $CurrentForm->getValue("x_MIOocytesDonate2");
        if (!$this->MIOocytesDonate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MIOocytesDonate2->Visible = false; // Disable update for API request
            } else {
                $this->MIOocytesDonate2->setFormValue($val);
            }
        }

        // Check field name 'SelfMI' first before field var 'x_SelfMI'
        $val = $CurrentForm->hasValue("SelfMI") ? $CurrentForm->getValue("SelfMI") : $CurrentForm->getValue("x_SelfMI");
        if (!$this->SelfMI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SelfMI->Visible = false; // Disable update for API request
            } else {
                $this->SelfMI->setFormValue($val);
            }
        }

        // Check field name 'SelfMII' first before field var 'x_SelfMII'
        $val = $CurrentForm->hasValue("SelfMII") ? $CurrentForm->getValue("SelfMII") : $CurrentForm->getValue("x_SelfMII");
        if (!$this->SelfMII->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SelfMII->Visible = false; // Disable update for API request
            } else {
                $this->SelfMII->setFormValue($val);
            }
        }

        // Check field name 'patient3' first before field var 'x_patient3'
        $val = $CurrentForm->hasValue("patient3") ? $CurrentForm->getValue("patient3") : $CurrentForm->getValue("x_patient3");
        if (!$this->patient3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient3->Visible = false; // Disable update for API request
            } else {
                $this->patient3->setFormValue($val);
            }
        }

        // Check field name 'patient4' first before field var 'x_patient4'
        $val = $CurrentForm->hasValue("patient4") ? $CurrentForm->getValue("patient4") : $CurrentForm->getValue("x_patient4");
        if (!$this->patient4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient4->Visible = false; // Disable update for API request
            } else {
                $this->patient4->setFormValue($val);
            }
        }

        // Check field name 'OocytesDonate3' first before field var 'x_OocytesDonate3'
        $val = $CurrentForm->hasValue("OocytesDonate3") ? $CurrentForm->getValue("OocytesDonate3") : $CurrentForm->getValue("x_OocytesDonate3");
        if (!$this->OocytesDonate3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocytesDonate3->Visible = false; // Disable update for API request
            } else {
                $this->OocytesDonate3->setFormValue($val);
            }
        }

        // Check field name 'OocytesDonate4' first before field var 'x_OocytesDonate4'
        $val = $CurrentForm->hasValue("OocytesDonate4") ? $CurrentForm->getValue("OocytesDonate4") : $CurrentForm->getValue("x_OocytesDonate4");
        if (!$this->OocytesDonate4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocytesDonate4->Visible = false; // Disable update for API request
            } else {
                $this->OocytesDonate4->setFormValue($val);
            }
        }

        // Check field name 'MIOocytesDonate3' first before field var 'x_MIOocytesDonate3'
        $val = $CurrentForm->hasValue("MIOocytesDonate3") ? $CurrentForm->getValue("MIOocytesDonate3") : $CurrentForm->getValue("x_MIOocytesDonate3");
        if (!$this->MIOocytesDonate3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MIOocytesDonate3->Visible = false; // Disable update for API request
            } else {
                $this->MIOocytesDonate3->setFormValue($val);
            }
        }

        // Check field name 'MIOocytesDonate4' first before field var 'x_MIOocytesDonate4'
        $val = $CurrentForm->hasValue("MIOocytesDonate4") ? $CurrentForm->getValue("MIOocytesDonate4") : $CurrentForm->getValue("x_MIOocytesDonate4");
        if (!$this->MIOocytesDonate4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MIOocytesDonate4->Visible = false; // Disable update for API request
            } else {
                $this->MIOocytesDonate4->setFormValue($val);
            }
        }

        // Check field name 'SelfOocytesMI' first before field var 'x_SelfOocytesMI'
        $val = $CurrentForm->hasValue("SelfOocytesMI") ? $CurrentForm->getValue("SelfOocytesMI") : $CurrentForm->getValue("x_SelfOocytesMI");
        if (!$this->SelfOocytesMI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SelfOocytesMI->Visible = false; // Disable update for API request
            } else {
                $this->SelfOocytesMI->setFormValue($val);
            }
        }

        // Check field name 'SelfOocytesMII' first before field var 'x_SelfOocytesMII'
        $val = $CurrentForm->hasValue("SelfOocytesMII") ? $CurrentForm->getValue("SelfOocytesMII") : $CurrentForm->getValue("x_SelfOocytesMII");
        if (!$this->SelfOocytesMII->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SelfOocytesMII->Visible = false; // Disable update for API request
            } else {
                $this->SelfOocytesMII->setFormValue($val);
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
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
        $this->AsstSurgeon->CurrentValue = $this->AsstSurgeon->FormValue;
        $this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
        $this->AnaestheiaType->CurrentValue = $this->AnaestheiaType->FormValue;
        $this->PrimaryEmbryologist->CurrentValue = $this->PrimaryEmbryologist->FormValue;
        $this->SecondaryEmbryologist->CurrentValue = $this->SecondaryEmbryologist->FormValue;
        $this->OPUNotes->CurrentValue = $this->OPUNotes->FormValue;
        $this->NoOfFolliclesRight->CurrentValue = $this->NoOfFolliclesRight->FormValue;
        $this->NoOfFolliclesLeft->CurrentValue = $this->NoOfFolliclesLeft->FormValue;
        $this->NoOfOocytes->CurrentValue = $this->NoOfOocytes->FormValue;
        $this->RecordOocyteDenudation->CurrentValue = $this->RecordOocyteDenudation->FormValue;
        $this->DateOfDenudation->CurrentValue = $this->DateOfDenudation->FormValue;
        $this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 0);
        $this->DenudationDoneBy->CurrentValue = $this->DenudationDoneBy->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->ExpFollicles->CurrentValue = $this->ExpFollicles->FormValue;
        $this->SecondaryDenudationDoneBy->CurrentValue = $this->SecondaryDenudationDoneBy->FormValue;
        $this->OocyteOrgin->CurrentValue = $this->OocyteOrgin->FormValue;
        $this->patient1->CurrentValue = $this->patient1->FormValue;
        $this->patient2->CurrentValue = $this->patient2->FormValue;
        $this->OocytesDonate1->CurrentValue = $this->OocytesDonate1->FormValue;
        $this->OocytesDonate2->CurrentValue = $this->OocytesDonate2->FormValue;
        $this->ETDonate->CurrentValue = $this->ETDonate->FormValue;
        $this->OocyteType->CurrentValue = $this->OocyteType->FormValue;
        $this->MIOocytesDonate1->CurrentValue = $this->MIOocytesDonate1->FormValue;
        $this->MIOocytesDonate2->CurrentValue = $this->MIOocytesDonate2->FormValue;
        $this->SelfMI->CurrentValue = $this->SelfMI->FormValue;
        $this->SelfMII->CurrentValue = $this->SelfMII->FormValue;
        $this->patient3->CurrentValue = $this->patient3->FormValue;
        $this->patient4->CurrentValue = $this->patient4->FormValue;
        $this->OocytesDonate3->CurrentValue = $this->OocytesDonate3->FormValue;
        $this->OocytesDonate4->CurrentValue = $this->OocytesDonate4->FormValue;
        $this->MIOocytesDonate3->CurrentValue = $this->MIOocytesDonate3->FormValue;
        $this->MIOocytesDonate4->CurrentValue = $this->MIOocytesDonate4->FormValue;
        $this->SelfOocytesMI->CurrentValue = $this->SelfOocytesMI->FormValue;
        $this->SelfOocytesMII->CurrentValue = $this->SelfOocytesMII->FormValue;
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
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
        $this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
        $this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
        $this->OPUNotes->setDbValue($row['OPUNotes']);
        $this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
        $this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
        $this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
        $this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
        $this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
        $this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->ExpFollicles->setDbValue($row['ExpFollicles']);
        $this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
        $this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
        $this->patient1->setDbValue($row['patient1']);
        $this->patient2->setDbValue($row['patient2']);
        $this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
        $this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
        $this->ETDonate->setDbValue($row['ETDonate']);
        $this->OocyteType->setDbValue($row['OocyteType']);
        $this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
        $this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
        $this->SelfMI->setDbValue($row['SelfMI']);
        $this->SelfMII->setDbValue($row['SelfMII']);
        $this->patient3->setDbValue($row['patient3']);
        $this->patient4->setDbValue($row['patient4']);
        $this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
        $this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
        $this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
        $this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
        $this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
        $this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ResultDate'] = null;
        $row['Surgeon'] = null;
        $row['AsstSurgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AnaestheiaType'] = null;
        $row['PrimaryEmbryologist'] = null;
        $row['SecondaryEmbryologist'] = null;
        $row['OPUNotes'] = null;
        $row['NoOfFolliclesRight'] = null;
        $row['NoOfFolliclesLeft'] = null;
        $row['NoOfOocytes'] = null;
        $row['RecordOocyteDenudation'] = null;
        $row['DateOfDenudation'] = null;
        $row['DenudationDoneBy'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['TidNo'] = null;
        $row['ExpFollicles'] = null;
        $row['SecondaryDenudationDoneBy'] = null;
        $row['OocyteOrgin'] = null;
        $row['patient1'] = null;
        $row['patient2'] = null;
        $row['OocytesDonate1'] = null;
        $row['OocytesDonate2'] = null;
        $row['ETDonate'] = null;
        $row['OocyteType'] = null;
        $row['MIOocytesDonate1'] = null;
        $row['MIOocytesDonate2'] = null;
        $row['SelfMI'] = null;
        $row['SelfMII'] = null;
        $row['patient3'] = null;
        $row['patient4'] = null;
        $row['OocytesDonate3'] = null;
        $row['OocytesDonate4'] = null;
        $row['MIOocytesDonate3'] = null;
        $row['MIOocytesDonate4'] = null;
        $row['SelfOocytesMI'] = null;
        $row['SelfOocytesMII'] = null;
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

        // ResultDate

        // Surgeon

        // AsstSurgeon

        // Anaesthetist

        // AnaestheiaType

        // PrimaryEmbryologist

        // SecondaryEmbryologist

        // OPUNotes

        // NoOfFolliclesRight

        // NoOfFolliclesLeft

        // NoOfOocytes

        // RecordOocyteDenudation

        // DateOfDenudation

        // DenudationDoneBy

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TidNo

        // ExpFollicles

        // SecondaryDenudationDoneBy

        // OocyteOrgin

        // patient1

        // patient2

        // OocytesDonate1

        // OocytesDonate2

        // ETDonate

        // OocyteType

        // MIOocytesDonate1

        // MIOocytesDonate2

        // SelfMI

        // SelfMII

        // patient3

        // patient4

        // OocytesDonate3

        // OocytesDonate4

        // MIOocytesDonate3

        // MIOocytesDonate4

        // SelfOocytesMI

        // SelfOocytesMII
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

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $this->Surgeon->ViewCustomAttributes = "";

            // AsstSurgeon
            $this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
            $this->AsstSurgeon->ViewCustomAttributes = "";

            // Anaesthetist
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AnaestheiaType
            $this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
            $this->AnaestheiaType->ViewCustomAttributes = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
            $this->PrimaryEmbryologist->ViewCustomAttributes = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
            $this->SecondaryEmbryologist->ViewCustomAttributes = "";

            // OPUNotes
            $this->OPUNotes->ViewValue = $this->OPUNotes->CurrentValue;
            $this->OPUNotes->ViewCustomAttributes = "";

            // NoOfFolliclesRight
            $this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
            $this->NoOfFolliclesRight->ViewCustomAttributes = "";

            // NoOfFolliclesLeft
            $this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
            $this->NoOfFolliclesLeft->ViewCustomAttributes = "";

            // NoOfOocytes
            $this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
            $this->NoOfOocytes->ViewCustomAttributes = "";

            // RecordOocyteDenudation
            $this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
            $this->RecordOocyteDenudation->ViewCustomAttributes = "";

            // DateOfDenudation
            $this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
            $this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 0);
            $this->DateOfDenudation->ViewCustomAttributes = "";

            // DenudationDoneBy
            $this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
            $this->DenudationDoneBy->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // ExpFollicles
            $this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
            $this->ExpFollicles->ViewCustomAttributes = "";

            // SecondaryDenudationDoneBy
            $this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
            $this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

            // OocyteOrgin
            $this->OocyteOrgin->ViewValue = $this->OocyteOrgin->CurrentValue;
            $this->OocyteOrgin->ViewCustomAttributes = "";

            // patient1
            $this->patient1->ViewValue = $this->patient1->CurrentValue;
            $this->patient1->ViewValue = FormatNumber($this->patient1->ViewValue, 0, -2, -2, -2);
            $this->patient1->ViewCustomAttributes = "";

            // patient2
            $this->patient2->ViewValue = $this->patient2->CurrentValue;
            $this->patient2->ViewValue = FormatNumber($this->patient2->ViewValue, 0, -2, -2, -2);
            $this->patient2->ViewCustomAttributes = "";

            // OocytesDonate1
            $this->OocytesDonate1->ViewValue = $this->OocytesDonate1->CurrentValue;
            $this->OocytesDonate1->ViewCustomAttributes = "";

            // OocytesDonate2
            $this->OocytesDonate2->ViewValue = $this->OocytesDonate2->CurrentValue;
            $this->OocytesDonate2->ViewCustomAttributes = "";

            // ETDonate
            $this->ETDonate->ViewValue = $this->ETDonate->CurrentValue;
            $this->ETDonate->ViewCustomAttributes = "";

            // OocyteType
            $this->OocyteType->ViewValue = $this->OocyteType->CurrentValue;
            $this->OocyteType->ViewCustomAttributes = "";

            // MIOocytesDonate1
            $this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
            $this->MIOocytesDonate1->ViewCustomAttributes = "";

            // MIOocytesDonate2
            $this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
            $this->MIOocytesDonate2->ViewCustomAttributes = "";

            // SelfMI
            $this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
            $this->SelfMI->ViewCustomAttributes = "";

            // SelfMII
            $this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
            $this->SelfMII->ViewCustomAttributes = "";

            // patient3
            $this->patient3->ViewValue = $this->patient3->CurrentValue;
            $this->patient3->ViewValue = FormatNumber($this->patient3->ViewValue, 0, -2, -2, -2);
            $this->patient3->ViewCustomAttributes = "";

            // patient4
            $this->patient4->ViewValue = $this->patient4->CurrentValue;
            $this->patient4->ViewValue = FormatNumber($this->patient4->ViewValue, 0, -2, -2, -2);
            $this->patient4->ViewCustomAttributes = "";

            // OocytesDonate3
            $this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
            $this->OocytesDonate3->ViewCustomAttributes = "";

            // OocytesDonate4
            $this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
            $this->OocytesDonate4->ViewCustomAttributes = "";

            // MIOocytesDonate3
            $this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
            $this->MIOocytesDonate3->ViewCustomAttributes = "";

            // MIOocytesDonate4
            $this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
            $this->MIOocytesDonate4->ViewCustomAttributes = "";

            // SelfOocytesMI
            $this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
            $this->SelfOocytesMI->ViewCustomAttributes = "";

            // SelfOocytesMII
            $this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
            $this->SelfOocytesMII->ViewCustomAttributes = "";

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

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // AsstSurgeon
            $this->AsstSurgeon->LinkCustomAttributes = "";
            $this->AsstSurgeon->HrefValue = "";
            $this->AsstSurgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AnaestheiaType
            $this->AnaestheiaType->LinkCustomAttributes = "";
            $this->AnaestheiaType->HrefValue = "";
            $this->AnaestheiaType->TooltipValue = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->LinkCustomAttributes = "";
            $this->PrimaryEmbryologist->HrefValue = "";
            $this->PrimaryEmbryologist->TooltipValue = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->LinkCustomAttributes = "";
            $this->SecondaryEmbryologist->HrefValue = "";
            $this->SecondaryEmbryologist->TooltipValue = "";

            // OPUNotes
            $this->OPUNotes->LinkCustomAttributes = "";
            $this->OPUNotes->HrefValue = "";
            $this->OPUNotes->TooltipValue = "";

            // NoOfFolliclesRight
            $this->NoOfFolliclesRight->LinkCustomAttributes = "";
            $this->NoOfFolliclesRight->HrefValue = "";
            $this->NoOfFolliclesRight->TooltipValue = "";

            // NoOfFolliclesLeft
            $this->NoOfFolliclesLeft->LinkCustomAttributes = "";
            $this->NoOfFolliclesLeft->HrefValue = "";
            $this->NoOfFolliclesLeft->TooltipValue = "";

            // NoOfOocytes
            $this->NoOfOocytes->LinkCustomAttributes = "";
            $this->NoOfOocytes->HrefValue = "";
            $this->NoOfOocytes->TooltipValue = "";

            // RecordOocyteDenudation
            $this->RecordOocyteDenudation->LinkCustomAttributes = "";
            $this->RecordOocyteDenudation->HrefValue = "";
            $this->RecordOocyteDenudation->TooltipValue = "";

            // DateOfDenudation
            $this->DateOfDenudation->LinkCustomAttributes = "";
            $this->DateOfDenudation->HrefValue = "";
            $this->DateOfDenudation->TooltipValue = "";

            // DenudationDoneBy
            $this->DenudationDoneBy->LinkCustomAttributes = "";
            $this->DenudationDoneBy->HrefValue = "";
            $this->DenudationDoneBy->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // ExpFollicles
            $this->ExpFollicles->LinkCustomAttributes = "";
            $this->ExpFollicles->HrefValue = "";
            $this->ExpFollicles->TooltipValue = "";

            // SecondaryDenudationDoneBy
            $this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
            $this->SecondaryDenudationDoneBy->HrefValue = "";
            $this->SecondaryDenudationDoneBy->TooltipValue = "";

            // OocyteOrgin
            $this->OocyteOrgin->LinkCustomAttributes = "";
            $this->OocyteOrgin->HrefValue = "";
            $this->OocyteOrgin->TooltipValue = "";

            // patient1
            $this->patient1->LinkCustomAttributes = "";
            $this->patient1->HrefValue = "";
            $this->patient1->TooltipValue = "";

            // patient2
            $this->patient2->LinkCustomAttributes = "";
            $this->patient2->HrefValue = "";
            $this->patient2->TooltipValue = "";

            // OocytesDonate1
            $this->OocytesDonate1->LinkCustomAttributes = "";
            $this->OocytesDonate1->HrefValue = "";
            $this->OocytesDonate1->TooltipValue = "";

            // OocytesDonate2
            $this->OocytesDonate2->LinkCustomAttributes = "";
            $this->OocytesDonate2->HrefValue = "";
            $this->OocytesDonate2->TooltipValue = "";

            // ETDonate
            $this->ETDonate->LinkCustomAttributes = "";
            $this->ETDonate->HrefValue = "";
            $this->ETDonate->TooltipValue = "";

            // OocyteType
            $this->OocyteType->LinkCustomAttributes = "";
            $this->OocyteType->HrefValue = "";
            $this->OocyteType->TooltipValue = "";

            // MIOocytesDonate1
            $this->MIOocytesDonate1->LinkCustomAttributes = "";
            $this->MIOocytesDonate1->HrefValue = "";
            $this->MIOocytesDonate1->TooltipValue = "";

            // MIOocytesDonate2
            $this->MIOocytesDonate2->LinkCustomAttributes = "";
            $this->MIOocytesDonate2->HrefValue = "";
            $this->MIOocytesDonate2->TooltipValue = "";

            // SelfMI
            $this->SelfMI->LinkCustomAttributes = "";
            $this->SelfMI->HrefValue = "";
            $this->SelfMI->TooltipValue = "";

            // SelfMII
            $this->SelfMII->LinkCustomAttributes = "";
            $this->SelfMII->HrefValue = "";
            $this->SelfMII->TooltipValue = "";

            // patient3
            $this->patient3->LinkCustomAttributes = "";
            $this->patient3->HrefValue = "";
            $this->patient3->TooltipValue = "";

            // patient4
            $this->patient4->LinkCustomAttributes = "";
            $this->patient4->HrefValue = "";
            $this->patient4->TooltipValue = "";

            // OocytesDonate3
            $this->OocytesDonate3->LinkCustomAttributes = "";
            $this->OocytesDonate3->HrefValue = "";
            $this->OocytesDonate3->TooltipValue = "";

            // OocytesDonate4
            $this->OocytesDonate4->LinkCustomAttributes = "";
            $this->OocytesDonate4->HrefValue = "";
            $this->OocytesDonate4->TooltipValue = "";

            // MIOocytesDonate3
            $this->MIOocytesDonate3->LinkCustomAttributes = "";
            $this->MIOocytesDonate3->HrefValue = "";
            $this->MIOocytesDonate3->TooltipValue = "";

            // MIOocytesDonate4
            $this->MIOocytesDonate4->LinkCustomAttributes = "";
            $this->MIOocytesDonate4->HrefValue = "";
            $this->MIOocytesDonate4->TooltipValue = "";

            // SelfOocytesMI
            $this->SelfOocytesMI->LinkCustomAttributes = "";
            $this->SelfOocytesMI->HrefValue = "";
            $this->SelfOocytesMI->TooltipValue = "";

            // SelfOocytesMII
            $this->SelfOocytesMII->LinkCustomAttributes = "";
            $this->SelfOocytesMII->HrefValue = "";
            $this->SelfOocytesMII->TooltipValue = "";
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

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            if (!$this->Surgeon->Raw) {
                $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
            }
            $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // AsstSurgeon
            $this->AsstSurgeon->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon->EditCustomAttributes = "";
            if (!$this->AsstSurgeon->Raw) {
                $this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
            }
            $this->AsstSurgeon->EditValue = HtmlEncode($this->AsstSurgeon->CurrentValue);
            $this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

            // Anaesthetist
            $this->Anaesthetist->EditAttrs["class"] = "form-control";
            $this->Anaesthetist->EditCustomAttributes = "";
            if (!$this->Anaesthetist->Raw) {
                $this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
            }
            $this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
            $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

            // AnaestheiaType
            $this->AnaestheiaType->EditAttrs["class"] = "form-control";
            $this->AnaestheiaType->EditCustomAttributes = "";
            if (!$this->AnaestheiaType->Raw) {
                $this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
            }
            $this->AnaestheiaType->EditValue = HtmlEncode($this->AnaestheiaType->CurrentValue);
            $this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

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

            // OPUNotes
            $this->OPUNotes->EditAttrs["class"] = "form-control";
            $this->OPUNotes->EditCustomAttributes = "";
            $this->OPUNotes->EditValue = HtmlEncode($this->OPUNotes->CurrentValue);
            $this->OPUNotes->PlaceHolder = RemoveHtml($this->OPUNotes->caption());

            // NoOfFolliclesRight
            $this->NoOfFolliclesRight->EditAttrs["class"] = "form-control";
            $this->NoOfFolliclesRight->EditCustomAttributes = "";
            if (!$this->NoOfFolliclesRight->Raw) {
                $this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
            }
            $this->NoOfFolliclesRight->EditValue = HtmlEncode($this->NoOfFolliclesRight->CurrentValue);
            $this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

            // NoOfFolliclesLeft
            $this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
            $this->NoOfFolliclesLeft->EditCustomAttributes = "";
            if (!$this->NoOfFolliclesLeft->Raw) {
                $this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
            }
            $this->NoOfFolliclesLeft->EditValue = HtmlEncode($this->NoOfFolliclesLeft->CurrentValue);
            $this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

            // NoOfOocytes
            $this->NoOfOocytes->EditAttrs["class"] = "form-control";
            $this->NoOfOocytes->EditCustomAttributes = "";
            if (!$this->NoOfOocytes->Raw) {
                $this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
            }
            $this->NoOfOocytes->EditValue = HtmlEncode($this->NoOfOocytes->CurrentValue);
            $this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

            // RecordOocyteDenudation
            $this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
            $this->RecordOocyteDenudation->EditCustomAttributes = "";
            if (!$this->RecordOocyteDenudation->Raw) {
                $this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
            }
            $this->RecordOocyteDenudation->EditValue = HtmlEncode($this->RecordOocyteDenudation->CurrentValue);
            $this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

            // DateOfDenudation
            $this->DateOfDenudation->EditAttrs["class"] = "form-control";
            $this->DateOfDenudation->EditCustomAttributes = "";
            $this->DateOfDenudation->EditValue = HtmlEncode(FormatDateTime($this->DateOfDenudation->CurrentValue, 8));
            $this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

            // DenudationDoneBy
            $this->DenudationDoneBy->EditAttrs["class"] = "form-control";
            $this->DenudationDoneBy->EditCustomAttributes = "";
            if (!$this->DenudationDoneBy->Raw) {
                $this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
            }
            $this->DenudationDoneBy->EditValue = HtmlEncode($this->DenudationDoneBy->CurrentValue);
            $this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // ExpFollicles
            $this->ExpFollicles->EditAttrs["class"] = "form-control";
            $this->ExpFollicles->EditCustomAttributes = "";
            if (!$this->ExpFollicles->Raw) {
                $this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
            }
            $this->ExpFollicles->EditValue = HtmlEncode($this->ExpFollicles->CurrentValue);
            $this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

            // SecondaryDenudationDoneBy
            $this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
            $this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
            if (!$this->SecondaryDenudationDoneBy->Raw) {
                $this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
            }
            $this->SecondaryDenudationDoneBy->EditValue = HtmlEncode($this->SecondaryDenudationDoneBy->CurrentValue);
            $this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

            // OocyteOrgin
            $this->OocyteOrgin->EditAttrs["class"] = "form-control";
            $this->OocyteOrgin->EditCustomAttributes = "";
            if (!$this->OocyteOrgin->Raw) {
                $this->OocyteOrgin->CurrentValue = HtmlDecode($this->OocyteOrgin->CurrentValue);
            }
            $this->OocyteOrgin->EditValue = HtmlEncode($this->OocyteOrgin->CurrentValue);
            $this->OocyteOrgin->PlaceHolder = RemoveHtml($this->OocyteOrgin->caption());

            // patient1
            $this->patient1->EditAttrs["class"] = "form-control";
            $this->patient1->EditCustomAttributes = "";
            $this->patient1->EditValue = HtmlEncode($this->patient1->CurrentValue);
            $this->patient1->PlaceHolder = RemoveHtml($this->patient1->caption());

            // patient2
            $this->patient2->EditAttrs["class"] = "form-control";
            $this->patient2->EditCustomAttributes = "";
            $this->patient2->EditValue = HtmlEncode($this->patient2->CurrentValue);
            $this->patient2->PlaceHolder = RemoveHtml($this->patient2->caption());

            // OocytesDonate1
            $this->OocytesDonate1->EditAttrs["class"] = "form-control";
            $this->OocytesDonate1->EditCustomAttributes = "";
            if (!$this->OocytesDonate1->Raw) {
                $this->OocytesDonate1->CurrentValue = HtmlDecode($this->OocytesDonate1->CurrentValue);
            }
            $this->OocytesDonate1->EditValue = HtmlEncode($this->OocytesDonate1->CurrentValue);
            $this->OocytesDonate1->PlaceHolder = RemoveHtml($this->OocytesDonate1->caption());

            // OocytesDonate2
            $this->OocytesDonate2->EditAttrs["class"] = "form-control";
            $this->OocytesDonate2->EditCustomAttributes = "";
            if (!$this->OocytesDonate2->Raw) {
                $this->OocytesDonate2->CurrentValue = HtmlDecode($this->OocytesDonate2->CurrentValue);
            }
            $this->OocytesDonate2->EditValue = HtmlEncode($this->OocytesDonate2->CurrentValue);
            $this->OocytesDonate2->PlaceHolder = RemoveHtml($this->OocytesDonate2->caption());

            // ETDonate
            $this->ETDonate->EditAttrs["class"] = "form-control";
            $this->ETDonate->EditCustomAttributes = "";
            if (!$this->ETDonate->Raw) {
                $this->ETDonate->CurrentValue = HtmlDecode($this->ETDonate->CurrentValue);
            }
            $this->ETDonate->EditValue = HtmlEncode($this->ETDonate->CurrentValue);
            $this->ETDonate->PlaceHolder = RemoveHtml($this->ETDonate->caption());

            // OocyteType
            $this->OocyteType->EditAttrs["class"] = "form-control";
            $this->OocyteType->EditCustomAttributes = "";
            if (!$this->OocyteType->Raw) {
                $this->OocyteType->CurrentValue = HtmlDecode($this->OocyteType->CurrentValue);
            }
            $this->OocyteType->EditValue = HtmlEncode($this->OocyteType->CurrentValue);
            $this->OocyteType->PlaceHolder = RemoveHtml($this->OocyteType->caption());

            // MIOocytesDonate1
            $this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
            $this->MIOocytesDonate1->EditCustomAttributes = "";
            if (!$this->MIOocytesDonate1->Raw) {
                $this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
            }
            $this->MIOocytesDonate1->EditValue = HtmlEncode($this->MIOocytesDonate1->CurrentValue);
            $this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

            // MIOocytesDonate2
            $this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
            $this->MIOocytesDonate2->EditCustomAttributes = "";
            if (!$this->MIOocytesDonate2->Raw) {
                $this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
            }
            $this->MIOocytesDonate2->EditValue = HtmlEncode($this->MIOocytesDonate2->CurrentValue);
            $this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

            // SelfMI
            $this->SelfMI->EditAttrs["class"] = "form-control";
            $this->SelfMI->EditCustomAttributes = "";
            if (!$this->SelfMI->Raw) {
                $this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
            }
            $this->SelfMI->EditValue = HtmlEncode($this->SelfMI->CurrentValue);
            $this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

            // SelfMII
            $this->SelfMII->EditAttrs["class"] = "form-control";
            $this->SelfMII->EditCustomAttributes = "";
            if (!$this->SelfMII->Raw) {
                $this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
            }
            $this->SelfMII->EditValue = HtmlEncode($this->SelfMII->CurrentValue);
            $this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

            // patient3
            $this->patient3->EditAttrs["class"] = "form-control";
            $this->patient3->EditCustomAttributes = "";
            $this->patient3->EditValue = HtmlEncode($this->patient3->CurrentValue);
            $this->patient3->PlaceHolder = RemoveHtml($this->patient3->caption());

            // patient4
            $this->patient4->EditAttrs["class"] = "form-control";
            $this->patient4->EditCustomAttributes = "";
            $this->patient4->EditValue = HtmlEncode($this->patient4->CurrentValue);
            $this->patient4->PlaceHolder = RemoveHtml($this->patient4->caption());

            // OocytesDonate3
            $this->OocytesDonate3->EditAttrs["class"] = "form-control";
            $this->OocytesDonate3->EditCustomAttributes = "";
            if (!$this->OocytesDonate3->Raw) {
                $this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
            }
            $this->OocytesDonate3->EditValue = HtmlEncode($this->OocytesDonate3->CurrentValue);
            $this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

            // OocytesDonate4
            $this->OocytesDonate4->EditAttrs["class"] = "form-control";
            $this->OocytesDonate4->EditCustomAttributes = "";
            if (!$this->OocytesDonate4->Raw) {
                $this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
            }
            $this->OocytesDonate4->EditValue = HtmlEncode($this->OocytesDonate4->CurrentValue);
            $this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

            // MIOocytesDonate3
            $this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
            $this->MIOocytesDonate3->EditCustomAttributes = "";
            if (!$this->MIOocytesDonate3->Raw) {
                $this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
            }
            $this->MIOocytesDonate3->EditValue = HtmlEncode($this->MIOocytesDonate3->CurrentValue);
            $this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

            // MIOocytesDonate4
            $this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
            $this->MIOocytesDonate4->EditCustomAttributes = "";
            if (!$this->MIOocytesDonate4->Raw) {
                $this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
            }
            $this->MIOocytesDonate4->EditValue = HtmlEncode($this->MIOocytesDonate4->CurrentValue);
            $this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

            // SelfOocytesMI
            $this->SelfOocytesMI->EditAttrs["class"] = "form-control";
            $this->SelfOocytesMI->EditCustomAttributes = "";
            if (!$this->SelfOocytesMI->Raw) {
                $this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
            }
            $this->SelfOocytesMI->EditValue = HtmlEncode($this->SelfOocytesMI->CurrentValue);
            $this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

            // SelfOocytesMII
            $this->SelfOocytesMII->EditAttrs["class"] = "form-control";
            $this->SelfOocytesMII->EditCustomAttributes = "";
            if (!$this->SelfOocytesMII->Raw) {
                $this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
            }
            $this->SelfOocytesMII->EditValue = HtmlEncode($this->SelfOocytesMII->CurrentValue);
            $this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

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

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";

            // AsstSurgeon
            $this->AsstSurgeon->LinkCustomAttributes = "";
            $this->AsstSurgeon->HrefValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";

            // AnaestheiaType
            $this->AnaestheiaType->LinkCustomAttributes = "";
            $this->AnaestheiaType->HrefValue = "";

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->LinkCustomAttributes = "";
            $this->PrimaryEmbryologist->HrefValue = "";

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->LinkCustomAttributes = "";
            $this->SecondaryEmbryologist->HrefValue = "";

            // OPUNotes
            $this->OPUNotes->LinkCustomAttributes = "";
            $this->OPUNotes->HrefValue = "";

            // NoOfFolliclesRight
            $this->NoOfFolliclesRight->LinkCustomAttributes = "";
            $this->NoOfFolliclesRight->HrefValue = "";

            // NoOfFolliclesLeft
            $this->NoOfFolliclesLeft->LinkCustomAttributes = "";
            $this->NoOfFolliclesLeft->HrefValue = "";

            // NoOfOocytes
            $this->NoOfOocytes->LinkCustomAttributes = "";
            $this->NoOfOocytes->HrefValue = "";

            // RecordOocyteDenudation
            $this->RecordOocyteDenudation->LinkCustomAttributes = "";
            $this->RecordOocyteDenudation->HrefValue = "";

            // DateOfDenudation
            $this->DateOfDenudation->LinkCustomAttributes = "";
            $this->DateOfDenudation->HrefValue = "";

            // DenudationDoneBy
            $this->DenudationDoneBy->LinkCustomAttributes = "";
            $this->DenudationDoneBy->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // ExpFollicles
            $this->ExpFollicles->LinkCustomAttributes = "";
            $this->ExpFollicles->HrefValue = "";

            // SecondaryDenudationDoneBy
            $this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
            $this->SecondaryDenudationDoneBy->HrefValue = "";

            // OocyteOrgin
            $this->OocyteOrgin->LinkCustomAttributes = "";
            $this->OocyteOrgin->HrefValue = "";

            // patient1
            $this->patient1->LinkCustomAttributes = "";
            $this->patient1->HrefValue = "";

            // patient2
            $this->patient2->LinkCustomAttributes = "";
            $this->patient2->HrefValue = "";

            // OocytesDonate1
            $this->OocytesDonate1->LinkCustomAttributes = "";
            $this->OocytesDonate1->HrefValue = "";

            // OocytesDonate2
            $this->OocytesDonate2->LinkCustomAttributes = "";
            $this->OocytesDonate2->HrefValue = "";

            // ETDonate
            $this->ETDonate->LinkCustomAttributes = "";
            $this->ETDonate->HrefValue = "";

            // OocyteType
            $this->OocyteType->LinkCustomAttributes = "";
            $this->OocyteType->HrefValue = "";

            // MIOocytesDonate1
            $this->MIOocytesDonate1->LinkCustomAttributes = "";
            $this->MIOocytesDonate1->HrefValue = "";

            // MIOocytesDonate2
            $this->MIOocytesDonate2->LinkCustomAttributes = "";
            $this->MIOocytesDonate2->HrefValue = "";

            // SelfMI
            $this->SelfMI->LinkCustomAttributes = "";
            $this->SelfMI->HrefValue = "";

            // SelfMII
            $this->SelfMII->LinkCustomAttributes = "";
            $this->SelfMII->HrefValue = "";

            // patient3
            $this->patient3->LinkCustomAttributes = "";
            $this->patient3->HrefValue = "";

            // patient4
            $this->patient4->LinkCustomAttributes = "";
            $this->patient4->HrefValue = "";

            // OocytesDonate3
            $this->OocytesDonate3->LinkCustomAttributes = "";
            $this->OocytesDonate3->HrefValue = "";

            // OocytesDonate4
            $this->OocytesDonate4->LinkCustomAttributes = "";
            $this->OocytesDonate4->HrefValue = "";

            // MIOocytesDonate3
            $this->MIOocytesDonate3->LinkCustomAttributes = "";
            $this->MIOocytesDonate3->HrefValue = "";

            // MIOocytesDonate4
            $this->MIOocytesDonate4->LinkCustomAttributes = "";
            $this->MIOocytesDonate4->HrefValue = "";

            // SelfOocytesMI
            $this->SelfOocytesMI->LinkCustomAttributes = "";
            $this->SelfOocytesMI->HrefValue = "";

            // SelfOocytesMII
            $this->SelfOocytesMII->LinkCustomAttributes = "";
            $this->SelfOocytesMII->HrefValue = "";
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
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultDate->FormValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if ($this->Surgeon->Required) {
            if (!$this->Surgeon->IsDetailKey && EmptyValue($this->Surgeon->FormValue)) {
                $this->Surgeon->addErrorMessage(str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
            }
        }
        if ($this->AsstSurgeon->Required) {
            if (!$this->AsstSurgeon->IsDetailKey && EmptyValue($this->AsstSurgeon->FormValue)) {
                $this->AsstSurgeon->addErrorMessage(str_replace("%s", $this->AsstSurgeon->caption(), $this->AsstSurgeon->RequiredErrorMessage));
            }
        }
        if ($this->Anaesthetist->Required) {
            if (!$this->Anaesthetist->IsDetailKey && EmptyValue($this->Anaesthetist->FormValue)) {
                $this->Anaesthetist->addErrorMessage(str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
            }
        }
        if ($this->AnaestheiaType->Required) {
            if (!$this->AnaestheiaType->IsDetailKey && EmptyValue($this->AnaestheiaType->FormValue)) {
                $this->AnaestheiaType->addErrorMessage(str_replace("%s", $this->AnaestheiaType->caption(), $this->AnaestheiaType->RequiredErrorMessage));
            }
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
        if ($this->OPUNotes->Required) {
            if (!$this->OPUNotes->IsDetailKey && EmptyValue($this->OPUNotes->FormValue)) {
                $this->OPUNotes->addErrorMessage(str_replace("%s", $this->OPUNotes->caption(), $this->OPUNotes->RequiredErrorMessage));
            }
        }
        if ($this->NoOfFolliclesRight->Required) {
            if (!$this->NoOfFolliclesRight->IsDetailKey && EmptyValue($this->NoOfFolliclesRight->FormValue)) {
                $this->NoOfFolliclesRight->addErrorMessage(str_replace("%s", $this->NoOfFolliclesRight->caption(), $this->NoOfFolliclesRight->RequiredErrorMessage));
            }
        }
        if ($this->NoOfFolliclesLeft->Required) {
            if (!$this->NoOfFolliclesLeft->IsDetailKey && EmptyValue($this->NoOfFolliclesLeft->FormValue)) {
                $this->NoOfFolliclesLeft->addErrorMessage(str_replace("%s", $this->NoOfFolliclesLeft->caption(), $this->NoOfFolliclesLeft->RequiredErrorMessage));
            }
        }
        if ($this->NoOfOocytes->Required) {
            if (!$this->NoOfOocytes->IsDetailKey && EmptyValue($this->NoOfOocytes->FormValue)) {
                $this->NoOfOocytes->addErrorMessage(str_replace("%s", $this->NoOfOocytes->caption(), $this->NoOfOocytes->RequiredErrorMessage));
            }
        }
        if ($this->RecordOocyteDenudation->Required) {
            if (!$this->RecordOocyteDenudation->IsDetailKey && EmptyValue($this->RecordOocyteDenudation->FormValue)) {
                $this->RecordOocyteDenudation->addErrorMessage(str_replace("%s", $this->RecordOocyteDenudation->caption(), $this->RecordOocyteDenudation->RequiredErrorMessage));
            }
        }
        if ($this->DateOfDenudation->Required) {
            if (!$this->DateOfDenudation->IsDetailKey && EmptyValue($this->DateOfDenudation->FormValue)) {
                $this->DateOfDenudation->addErrorMessage(str_replace("%s", $this->DateOfDenudation->caption(), $this->DateOfDenudation->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DateOfDenudation->FormValue)) {
            $this->DateOfDenudation->addErrorMessage($this->DateOfDenudation->getErrorMessage(false));
        }
        if ($this->DenudationDoneBy->Required) {
            if (!$this->DenudationDoneBy->IsDetailKey && EmptyValue($this->DenudationDoneBy->FormValue)) {
                $this->DenudationDoneBy->addErrorMessage(str_replace("%s", $this->DenudationDoneBy->caption(), $this->DenudationDoneBy->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->createdby->FormValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->ExpFollicles->Required) {
            if (!$this->ExpFollicles->IsDetailKey && EmptyValue($this->ExpFollicles->FormValue)) {
                $this->ExpFollicles->addErrorMessage(str_replace("%s", $this->ExpFollicles->caption(), $this->ExpFollicles->RequiredErrorMessage));
            }
        }
        if ($this->SecondaryDenudationDoneBy->Required) {
            if (!$this->SecondaryDenudationDoneBy->IsDetailKey && EmptyValue($this->SecondaryDenudationDoneBy->FormValue)) {
                $this->SecondaryDenudationDoneBy->addErrorMessage(str_replace("%s", $this->SecondaryDenudationDoneBy->caption(), $this->SecondaryDenudationDoneBy->RequiredErrorMessage));
            }
        }
        if ($this->OocyteOrgin->Required) {
            if (!$this->OocyteOrgin->IsDetailKey && EmptyValue($this->OocyteOrgin->FormValue)) {
                $this->OocyteOrgin->addErrorMessage(str_replace("%s", $this->OocyteOrgin->caption(), $this->OocyteOrgin->RequiredErrorMessage));
            }
        }
        if ($this->patient1->Required) {
            if (!$this->patient1->IsDetailKey && EmptyValue($this->patient1->FormValue)) {
                $this->patient1->addErrorMessage(str_replace("%s", $this->patient1->caption(), $this->patient1->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient1->FormValue)) {
            $this->patient1->addErrorMessage($this->patient1->getErrorMessage(false));
        }
        if ($this->patient2->Required) {
            if (!$this->patient2->IsDetailKey && EmptyValue($this->patient2->FormValue)) {
                $this->patient2->addErrorMessage(str_replace("%s", $this->patient2->caption(), $this->patient2->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient2->FormValue)) {
            $this->patient2->addErrorMessage($this->patient2->getErrorMessage(false));
        }
        if ($this->OocytesDonate1->Required) {
            if (!$this->OocytesDonate1->IsDetailKey && EmptyValue($this->OocytesDonate1->FormValue)) {
                $this->OocytesDonate1->addErrorMessage(str_replace("%s", $this->OocytesDonate1->caption(), $this->OocytesDonate1->RequiredErrorMessage));
            }
        }
        if ($this->OocytesDonate2->Required) {
            if (!$this->OocytesDonate2->IsDetailKey && EmptyValue($this->OocytesDonate2->FormValue)) {
                $this->OocytesDonate2->addErrorMessage(str_replace("%s", $this->OocytesDonate2->caption(), $this->OocytesDonate2->RequiredErrorMessage));
            }
        }
        if ($this->ETDonate->Required) {
            if (!$this->ETDonate->IsDetailKey && EmptyValue($this->ETDonate->FormValue)) {
                $this->ETDonate->addErrorMessage(str_replace("%s", $this->ETDonate->caption(), $this->ETDonate->RequiredErrorMessage));
            }
        }
        if ($this->OocyteType->Required) {
            if (!$this->OocyteType->IsDetailKey && EmptyValue($this->OocyteType->FormValue)) {
                $this->OocyteType->addErrorMessage(str_replace("%s", $this->OocyteType->caption(), $this->OocyteType->RequiredErrorMessage));
            }
        }
        if ($this->MIOocytesDonate1->Required) {
            if (!$this->MIOocytesDonate1->IsDetailKey && EmptyValue($this->MIOocytesDonate1->FormValue)) {
                $this->MIOocytesDonate1->addErrorMessage(str_replace("%s", $this->MIOocytesDonate1->caption(), $this->MIOocytesDonate1->RequiredErrorMessage));
            }
        }
        if ($this->MIOocytesDonate2->Required) {
            if (!$this->MIOocytesDonate2->IsDetailKey && EmptyValue($this->MIOocytesDonate2->FormValue)) {
                $this->MIOocytesDonate2->addErrorMessage(str_replace("%s", $this->MIOocytesDonate2->caption(), $this->MIOocytesDonate2->RequiredErrorMessage));
            }
        }
        if ($this->SelfMI->Required) {
            if (!$this->SelfMI->IsDetailKey && EmptyValue($this->SelfMI->FormValue)) {
                $this->SelfMI->addErrorMessage(str_replace("%s", $this->SelfMI->caption(), $this->SelfMI->RequiredErrorMessage));
            }
        }
        if ($this->SelfMII->Required) {
            if (!$this->SelfMII->IsDetailKey && EmptyValue($this->SelfMII->FormValue)) {
                $this->SelfMII->addErrorMessage(str_replace("%s", $this->SelfMII->caption(), $this->SelfMII->RequiredErrorMessage));
            }
        }
        if ($this->patient3->Required) {
            if (!$this->patient3->IsDetailKey && EmptyValue($this->patient3->FormValue)) {
                $this->patient3->addErrorMessage(str_replace("%s", $this->patient3->caption(), $this->patient3->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient3->FormValue)) {
            $this->patient3->addErrorMessage($this->patient3->getErrorMessage(false));
        }
        if ($this->patient4->Required) {
            if (!$this->patient4->IsDetailKey && EmptyValue($this->patient4->FormValue)) {
                $this->patient4->addErrorMessage(str_replace("%s", $this->patient4->caption(), $this->patient4->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient4->FormValue)) {
            $this->patient4->addErrorMessage($this->patient4->getErrorMessage(false));
        }
        if ($this->OocytesDonate3->Required) {
            if (!$this->OocytesDonate3->IsDetailKey && EmptyValue($this->OocytesDonate3->FormValue)) {
                $this->OocytesDonate3->addErrorMessage(str_replace("%s", $this->OocytesDonate3->caption(), $this->OocytesDonate3->RequiredErrorMessage));
            }
        }
        if ($this->OocytesDonate4->Required) {
            if (!$this->OocytesDonate4->IsDetailKey && EmptyValue($this->OocytesDonate4->FormValue)) {
                $this->OocytesDonate4->addErrorMessage(str_replace("%s", $this->OocytesDonate4->caption(), $this->OocytesDonate4->RequiredErrorMessage));
            }
        }
        if ($this->MIOocytesDonate3->Required) {
            if (!$this->MIOocytesDonate3->IsDetailKey && EmptyValue($this->MIOocytesDonate3->FormValue)) {
                $this->MIOocytesDonate3->addErrorMessage(str_replace("%s", $this->MIOocytesDonate3->caption(), $this->MIOocytesDonate3->RequiredErrorMessage));
            }
        }
        if ($this->MIOocytesDonate4->Required) {
            if (!$this->MIOocytesDonate4->IsDetailKey && EmptyValue($this->MIOocytesDonate4->FormValue)) {
                $this->MIOocytesDonate4->addErrorMessage(str_replace("%s", $this->MIOocytesDonate4->caption(), $this->MIOocytesDonate4->RequiredErrorMessage));
            }
        }
        if ($this->SelfOocytesMI->Required) {
            if (!$this->SelfOocytesMI->IsDetailKey && EmptyValue($this->SelfOocytesMI->FormValue)) {
                $this->SelfOocytesMI->addErrorMessage(str_replace("%s", $this->SelfOocytesMI->caption(), $this->SelfOocytesMI->RequiredErrorMessage));
            }
        }
        if ($this->SelfOocytesMII->Required) {
            if (!$this->SelfOocytesMII->IsDetailKey && EmptyValue($this->SelfOocytesMII->FormValue)) {
                $this->SelfOocytesMII->addErrorMessage(str_replace("%s", $this->SelfOocytesMII->caption(), $this->SelfOocytesMII->RequiredErrorMessage));
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
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // RIDNo
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, $this->RIDNo->ReadOnly);

            // Name
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // ResultDate
            $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, $this->ResultDate->ReadOnly);

            // Surgeon
            $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, $this->Surgeon->ReadOnly);

            // AsstSurgeon
            $this->AsstSurgeon->setDbValueDef($rsnew, $this->AsstSurgeon->CurrentValue, null, $this->AsstSurgeon->ReadOnly);

            // Anaesthetist
            $this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, null, $this->Anaesthetist->ReadOnly);

            // AnaestheiaType
            $this->AnaestheiaType->setDbValueDef($rsnew, $this->AnaestheiaType->CurrentValue, null, $this->AnaestheiaType->ReadOnly);

            // PrimaryEmbryologist
            $this->PrimaryEmbryologist->setDbValueDef($rsnew, $this->PrimaryEmbryologist->CurrentValue, null, $this->PrimaryEmbryologist->ReadOnly);

            // SecondaryEmbryologist
            $this->SecondaryEmbryologist->setDbValueDef($rsnew, $this->SecondaryEmbryologist->CurrentValue, null, $this->SecondaryEmbryologist->ReadOnly);

            // OPUNotes
            $this->OPUNotes->setDbValueDef($rsnew, $this->OPUNotes->CurrentValue, null, $this->OPUNotes->ReadOnly);

            // NoOfFolliclesRight
            $this->NoOfFolliclesRight->setDbValueDef($rsnew, $this->NoOfFolliclesRight->CurrentValue, null, $this->NoOfFolliclesRight->ReadOnly);

            // NoOfFolliclesLeft
            $this->NoOfFolliclesLeft->setDbValueDef($rsnew, $this->NoOfFolliclesLeft->CurrentValue, null, $this->NoOfFolliclesLeft->ReadOnly);

            // NoOfOocytes
            $this->NoOfOocytes->setDbValueDef($rsnew, $this->NoOfOocytes->CurrentValue, null, $this->NoOfOocytes->ReadOnly);

            // RecordOocyteDenudation
            $this->RecordOocyteDenudation->setDbValueDef($rsnew, $this->RecordOocyteDenudation->CurrentValue, null, $this->RecordOocyteDenudation->ReadOnly);

            // DateOfDenudation
            $this->DateOfDenudation->setDbValueDef($rsnew, UnFormatDateTime($this->DateOfDenudation->CurrentValue, 0), null, $this->DateOfDenudation->ReadOnly);

            // DenudationDoneBy
            $this->DenudationDoneBy->setDbValueDef($rsnew, $this->DenudationDoneBy->CurrentValue, null, $this->DenudationDoneBy->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // ExpFollicles
            $this->ExpFollicles->setDbValueDef($rsnew, $this->ExpFollicles->CurrentValue, null, $this->ExpFollicles->ReadOnly);

            // SecondaryDenudationDoneBy
            $this->SecondaryDenudationDoneBy->setDbValueDef($rsnew, $this->SecondaryDenudationDoneBy->CurrentValue, null, $this->SecondaryDenudationDoneBy->ReadOnly);

            // OocyteOrgin
            $this->OocyteOrgin->setDbValueDef($rsnew, $this->OocyteOrgin->CurrentValue, null, $this->OocyteOrgin->ReadOnly);

            // patient1
            $this->patient1->setDbValueDef($rsnew, $this->patient1->CurrentValue, null, $this->patient1->ReadOnly);

            // patient2
            $this->patient2->setDbValueDef($rsnew, $this->patient2->CurrentValue, null, $this->patient2->ReadOnly);

            // OocytesDonate1
            $this->OocytesDonate1->setDbValueDef($rsnew, $this->OocytesDonate1->CurrentValue, null, $this->OocytesDonate1->ReadOnly);

            // OocytesDonate2
            $this->OocytesDonate2->setDbValueDef($rsnew, $this->OocytesDonate2->CurrentValue, null, $this->OocytesDonate2->ReadOnly);

            // ETDonate
            $this->ETDonate->setDbValueDef($rsnew, $this->ETDonate->CurrentValue, null, $this->ETDonate->ReadOnly);

            // OocyteType
            $this->OocyteType->setDbValueDef($rsnew, $this->OocyteType->CurrentValue, null, $this->OocyteType->ReadOnly);

            // MIOocytesDonate1
            $this->MIOocytesDonate1->setDbValueDef($rsnew, $this->MIOocytesDonate1->CurrentValue, null, $this->MIOocytesDonate1->ReadOnly);

            // MIOocytesDonate2
            $this->MIOocytesDonate2->setDbValueDef($rsnew, $this->MIOocytesDonate2->CurrentValue, null, $this->MIOocytesDonate2->ReadOnly);

            // SelfMI
            $this->SelfMI->setDbValueDef($rsnew, $this->SelfMI->CurrentValue, null, $this->SelfMI->ReadOnly);

            // SelfMII
            $this->SelfMII->setDbValueDef($rsnew, $this->SelfMII->CurrentValue, null, $this->SelfMII->ReadOnly);

            // patient3
            $this->patient3->setDbValueDef($rsnew, $this->patient3->CurrentValue, null, $this->patient3->ReadOnly);

            // patient4
            $this->patient4->setDbValueDef($rsnew, $this->patient4->CurrentValue, null, $this->patient4->ReadOnly);

            // OocytesDonate3
            $this->OocytesDonate3->setDbValueDef($rsnew, $this->OocytesDonate3->CurrentValue, null, $this->OocytesDonate3->ReadOnly);

            // OocytesDonate4
            $this->OocytesDonate4->setDbValueDef($rsnew, $this->OocytesDonate4->CurrentValue, null, $this->OocytesDonate4->ReadOnly);

            // MIOocytesDonate3
            $this->MIOocytesDonate3->setDbValueDef($rsnew, $this->MIOocytesDonate3->CurrentValue, null, $this->MIOocytesDonate3->ReadOnly);

            // MIOocytesDonate4
            $this->MIOocytesDonate4->setDbValueDef($rsnew, $this->MIOocytesDonate4->CurrentValue, null, $this->MIOocytesDonate4->ReadOnly);

            // SelfOocytesMI
            $this->SelfOocytesMI->setDbValueDef($rsnew, $this->SelfOocytesMI->CurrentValue, null, $this->SelfOocytesMI->ReadOnly);

            // SelfOocytesMII
            $this->SelfOocytesMII->setDbValueDef($rsnew, $this->SelfOocytesMII->CurrentValue, null, $this->SelfOocytesMII->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOocytedenudationList"), "", $this->TableVar, true);
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

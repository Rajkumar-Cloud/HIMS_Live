<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfSemenanalysisreportView extends IvfSemenanalysisreport
{
    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_semenanalysisreport';

    // Page object name
    public $PageObjName = "IvfSemenanalysisreportView";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Page URLs
    public $AddUrl;
    public $EditUrl;
    public $CopyUrl;
    public $DeleteUrl;
    public $ViewUrl;
    public $ListUrl;

    // Export URLs
    public $ExportPrintUrl;
    public $ExportHtmlUrl;
    public $ExportExcelUrl;
    public $ExportWordUrl;
    public $ExportXmlUrl;
    public $ExportCsvUrl;
    public $ExportPdfUrl;

    // Custom export
    public $ExportExcelCustom = false;
    public $ExportWordCustom = false;
    public $ExportPdfCustom = false;
    public $ExportEmailCustom = false;

    // Update URLs
    public $InlineAddUrl;
    public $InlineCopyUrl;
    public $InlineEditUrl;
    public $GridAddUrl;
    public $GridEditUrl;
    public $MultiDeleteUrl;
    public $MultiUpdateUrl;

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

        // Table object (ivf_semenanalysisreport)
        if (!isset($GLOBALS["ivf_semenanalysisreport"]) || get_class($GLOBALS["ivf_semenanalysisreport"]) == PROJECT_NAMESPACE . "ivf_semenanalysisreport") {
            $GLOBALS["ivf_semenanalysisreport"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        if (($keyValue = Get("id") ?? Route("id")) !== null) {
            $this->RecKey["id"] = $keyValue;
        }
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_semenanalysisreport');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
                $doc = new $class(Container("ivf_semenanalysisreport"));
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
                    if ($pageName == "IvfSemenanalysisreportView") {
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
    public $ExportOptions; // Export options
    public $OtherOptions; // Other options
    public $DisplayRecords = 1;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecKey = [];
    public $IsModal = false;

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
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->HusbandName->setVisibility();
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->setVisibility();
        $this->CollectionMethod->setVisibility();
        $this->Medicationused->setVisibility();
        $this->DifficultiesinCollection->setVisibility();
        $this->Volume->setVisibility();
        $this->pH->setVisibility();
        $this->Timeofcollection->setVisibility();
        $this->Timeofexamination->setVisibility();
        $this->Concentration->setVisibility();
        $this->Total->setVisibility();
        $this->ProgressiveMotility->setVisibility();
        $this->NonProgrssiveMotile->setVisibility();
        $this->Immotile->setVisibility();
        $this->TotalProgrssiveMotile->setVisibility();
        $this->Appearance->setVisibility();
        $this->Homogenosity->setVisibility();
        $this->CompleteSample->setVisibility();
        $this->Liquefactiontime->setVisibility();
        $this->Normal->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Headdefects->setVisibility();
        $this->MidpieceDefects->setVisibility();
        $this->TailDefects->setVisibility();
        $this->NormalProgMotile->setVisibility();
        $this->ImmatureForms->setVisibility();
        $this->Leucocytes->setVisibility();
        $this->Agglutination->setVisibility();
        $this->Debris->setVisibility();
        $this->Diagnosis->setVisibility();
        $this->Observations->setVisibility();
        $this->Signature->setVisibility();
        $this->SemenOrgin->setVisibility();
        $this->Donor->setVisibility();
        $this->DonorBloodgroup->setVisibility();
        $this->Tank->setVisibility();
        $this->Location->setVisibility();
        $this->Volume1->setVisibility();
        $this->Concentration1->setVisibility();
        $this->Total1->setVisibility();
        $this->ProgressiveMotility1->setVisibility();
        $this->NonProgrssiveMotile1->setVisibility();
        $this->Immotile1->setVisibility();
        $this->TotalProgrssiveMotile1->setVisibility();
        $this->TidNo->setVisibility();
        $this->Color->setVisibility();
        $this->DoneBy->setVisibility();
        $this->Method->setVisibility();
        $this->Abstinence->setVisibility();
        $this->ProcessedBy->setVisibility();
        $this->InseminationTime->setVisibility();
        $this->InseminationBy->setVisibility();
        $this->Big->setVisibility();
        $this->Medium->setVisibility();
        $this->Small->setVisibility();
        $this->NoHalo->setVisibility();
        $this->Fragmented->setVisibility();
        $this->NonFragmented->setVisibility();
        $this->DFI->setVisibility();
        $this->IsueBy->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total2->setVisibility();
        $this->ProgressiveMotility2->setVisibility();
        $this->NonProgrssiveMotile2->setVisibility();
        $this->Immotile2->setVisibility();
        $this->TotalProgrssiveMotile2->setVisibility();
        $this->IssuedBy->setVisibility();
        $this->IssuedTo->setVisibility();
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->MACS->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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

        // Load current record
        $loadCurrentRecord = false;
        $returnUrl = "";
        $matchRecord = false;
        if ($this->isPageRequest()) { // Validate request
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->RecKey["id"] = $this->id->FormValue;
            } elseif (IsApi() && ($keyValue = Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } else {
                $returnUrl = "IvfSemenanalysisreportList"; // Return to list
            }

            // Get action
            $this->CurrentAction = "show"; // Display
            switch ($this->CurrentAction) {
                case "show": // Get a record to display

                    // Load record based on key
                    if (IsApi()) {
                        $filter = $this->getRecordFilter();
                        $this->CurrentFilter = $filter;
                        $sql = $this->getCurrentSql();
                        $conn = $this->getConnection();
                        $this->Recordset = LoadRecordset($sql, $conn);
                        $res = $this->Recordset && !$this->Recordset->EOF;
                    } else {
                        $res = $this->loadRow();
                    }
                    if (!$res) { // Load record based on key
                        if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "") {
                            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                        }
                        $returnUrl = "IvfSemenanalysisreportList"; // No matching record, return to list
                    }
                    break;
            }
        } else {
            $returnUrl = "IvfSemenanalysisreportList"; // Not page request, return to list
        }
        if ($returnUrl != "") {
            $this->terminate($returnUrl);
            return;
        }

        // Set up Breadcrumb
        if (!$this->isExport()) {
            $this->setupBreadcrumb();
        }

        // Render row
        $this->RowType = ROWTYPE_VIEW;
        $this->resetAttributes();
        $this->renderRow();

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset, true); // Get current record only
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows]);
            $this->terminate(true);
            return;
        }

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

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->AddUrl)) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        }
        $item->Visible = ($this->AddUrl != "");

        // Edit
        $item = &$option->add("edit");
        $editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->EditUrl)) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        }
        $item->Visible = ($this->EditUrl != "");

        // Copy
        $item = &$option->add("copy");
        $copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode(GetUrl($this->CopyUrl)) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        }
        $item->Visible = ($this->CopyUrl != "");

        // Delete
        $item = &$option->add("delete");
        if ($this->IsModal) { // Handle as inline delete
            $item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery(GetUrl($this->DeleteUrl), "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        }
        $item->Visible = ($this->DeleteUrl != "");

        // Set up action default
        $option = $options["action"];
        $option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
        $option->UseDropDownButton = false;
        $option->UseButtonGroup = true;
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
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
        $this->HusbandName->setDbValue($row['HusbandName']);
        $this->RequestDr->setDbValue($row['RequestDr']);
        $this->CollectionDate->setDbValue($row['CollectionDate']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->RequestSample->setDbValue($row['RequestSample']);
        $this->CollectionType->setDbValue($row['CollectionType']);
        $this->CollectionMethod->setDbValue($row['CollectionMethod']);
        $this->Medicationused->setDbValue($row['Medicationused']);
        $this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
        $this->Volume->setDbValue($row['Volume']);
        $this->pH->setDbValue($row['pH']);
        $this->Timeofcollection->setDbValue($row['Timeofcollection']);
        $this->Timeofexamination->setDbValue($row['Timeofexamination']);
        $this->Concentration->setDbValue($row['Concentration']);
        $this->Total->setDbValue($row['Total']);
        $this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
        $this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
        $this->Immotile->setDbValue($row['Immotile']);
        $this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
        $this->Appearance->setDbValue($row['Appearance']);
        $this->Homogenosity->setDbValue($row['Homogenosity']);
        $this->CompleteSample->setDbValue($row['CompleteSample']);
        $this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
        $this->Normal->setDbValue($row['Normal']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Headdefects->setDbValue($row['Headdefects']);
        $this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
        $this->TailDefects->setDbValue($row['TailDefects']);
        $this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
        $this->ImmatureForms->setDbValue($row['ImmatureForms']);
        $this->Leucocytes->setDbValue($row['Leucocytes']);
        $this->Agglutination->setDbValue($row['Agglutination']);
        $this->Debris->setDbValue($row['Debris']);
        $this->Diagnosis->setDbValue($row['Diagnosis']);
        $this->Observations->setDbValue($row['Observations']);
        $this->Signature->setDbValue($row['Signature']);
        $this->SemenOrgin->setDbValue($row['SemenOrgin']);
        $this->Donor->setDbValue($row['Donor']);
        $this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Location->setDbValue($row['Location']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Concentration1->setDbValue($row['Concentration1']);
        $this->Total1->setDbValue($row['Total1']);
        $this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
        $this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
        $this->Immotile1->setDbValue($row['Immotile1']);
        $this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Color->setDbValue($row['Color']);
        $this->DoneBy->setDbValue($row['DoneBy']);
        $this->Method->setDbValue($row['Method']);
        $this->Abstinence->setDbValue($row['Abstinence']);
        $this->ProcessedBy->setDbValue($row['ProcessedBy']);
        $this->InseminationTime->setDbValue($row['InseminationTime']);
        $this->InseminationBy->setDbValue($row['InseminationBy']);
        $this->Big->setDbValue($row['Big']);
        $this->Medium->setDbValue($row['Medium']);
        $this->Small->setDbValue($row['Small']);
        $this->NoHalo->setDbValue($row['NoHalo']);
        $this->Fragmented->setDbValue($row['Fragmented']);
        $this->NonFragmented->setDbValue($row['NonFragmented']);
        $this->DFI->setDbValue($row['DFI']);
        $this->IsueBy->setDbValue($row['IsueBy']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total2->setDbValue($row['Total2']);
        $this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
        $this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
        $this->Immotile2->setDbValue($row['Immotile2']);
        $this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
        $this->IssuedBy->setDbValue($row['IssuedBy']);
        $this->IssuedTo->setDbValue($row['IssuedTo']);
        $this->PaID->setDbValue($row['PaID']);
        $this->PaName->setDbValue($row['PaName']);
        $this->PaMobile->setDbValue($row['PaMobile']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->MACS->setDbValue($row['MACS']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['HusbandName'] = null;
        $row['RequestDr'] = null;
        $row['CollectionDate'] = null;
        $row['ResultDate'] = null;
        $row['RequestSample'] = null;
        $row['CollectionType'] = null;
        $row['CollectionMethod'] = null;
        $row['Medicationused'] = null;
        $row['DifficultiesinCollection'] = null;
        $row['Volume'] = null;
        $row['pH'] = null;
        $row['Timeofcollection'] = null;
        $row['Timeofexamination'] = null;
        $row['Concentration'] = null;
        $row['Total'] = null;
        $row['ProgressiveMotility'] = null;
        $row['NonProgrssiveMotile'] = null;
        $row['Immotile'] = null;
        $row['TotalProgrssiveMotile'] = null;
        $row['Appearance'] = null;
        $row['Homogenosity'] = null;
        $row['CompleteSample'] = null;
        $row['Liquefactiontime'] = null;
        $row['Normal'] = null;
        $row['Abnormal'] = null;
        $row['Headdefects'] = null;
        $row['MidpieceDefects'] = null;
        $row['TailDefects'] = null;
        $row['NormalProgMotile'] = null;
        $row['ImmatureForms'] = null;
        $row['Leucocytes'] = null;
        $row['Agglutination'] = null;
        $row['Debris'] = null;
        $row['Diagnosis'] = null;
        $row['Observations'] = null;
        $row['Signature'] = null;
        $row['SemenOrgin'] = null;
        $row['Donor'] = null;
        $row['DonorBloodgroup'] = null;
        $row['Tank'] = null;
        $row['Location'] = null;
        $row['Volume1'] = null;
        $row['Concentration1'] = null;
        $row['Total1'] = null;
        $row['ProgressiveMotility1'] = null;
        $row['NonProgrssiveMotile1'] = null;
        $row['Immotile1'] = null;
        $row['TotalProgrssiveMotile1'] = null;
        $row['TidNo'] = null;
        $row['Color'] = null;
        $row['DoneBy'] = null;
        $row['Method'] = null;
        $row['Abstinence'] = null;
        $row['ProcessedBy'] = null;
        $row['InseminationTime'] = null;
        $row['InseminationBy'] = null;
        $row['Big'] = null;
        $row['Medium'] = null;
        $row['Small'] = null;
        $row['NoHalo'] = null;
        $row['Fragmented'] = null;
        $row['NonFragmented'] = null;
        $row['DFI'] = null;
        $row['IsueBy'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total2'] = null;
        $row['ProgressiveMotility2'] = null;
        $row['NonProgrssiveMotile2'] = null;
        $row['Immotile2'] = null;
        $row['TotalProgrssiveMotile2'] = null;
        $row['IssuedBy'] = null;
        $row['IssuedTo'] = null;
        $row['PaID'] = null;
        $row['PaName'] = null;
        $row['PaMobile'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['MACS'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs
        $this->AddUrl = $this->getAddUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();
        $this->ListUrl = $this->getListUrl();
        $this->setupOtherOptions();

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // RIDNo

        // PatientName

        // HusbandName

        // RequestDr

        // CollectionDate

        // ResultDate

        // RequestSample

        // CollectionType

        // CollectionMethod

        // Medicationused

        // DifficultiesinCollection

        // Volume

        // pH

        // Timeofcollection

        // Timeofexamination

        // Concentration

        // Total

        // ProgressiveMotility

        // NonProgrssiveMotile

        // Immotile

        // TotalProgrssiveMotile

        // Appearance

        // Homogenosity

        // CompleteSample

        // Liquefactiontime

        // Normal

        // Abnormal

        // Headdefects

        // MidpieceDefects

        // TailDefects

        // NormalProgMotile

        // ImmatureForms

        // Leucocytes

        // Agglutination

        // Debris

        // Diagnosis

        // Observations

        // Signature

        // SemenOrgin

        // Donor

        // DonorBloodgroup

        // Tank

        // Location

        // Volume1

        // Concentration1

        // Total1

        // ProgressiveMotility1

        // NonProgrssiveMotile1

        // Immotile1

        // TotalProgrssiveMotile1

        // TidNo

        // Color

        // DoneBy

        // Method

        // Abstinence

        // ProcessedBy

        // InseminationTime

        // InseminationBy

        // Big

        // Medium

        // Small

        // NoHalo

        // Fragmented

        // NonFragmented

        // DFI

        // IsueBy

        // Volume2

        // Concentration2

        // Total2

        // ProgressiveMotility2

        // NonProgrssiveMotile2

        // Immotile2

        // TotalProgrssiveMotile2

        // IssuedBy

        // IssuedTo

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

        // MACS

        // PREG_TEST_DATE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM
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

            // HusbandName
            $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            $this->RequestSample->ViewValue = $this->RequestSample->CurrentValue;
            $this->RequestSample->ViewCustomAttributes = "";

            // CollectionType
            $this->CollectionType->ViewValue = $this->CollectionType->CurrentValue;
            $this->CollectionType->ViewCustomAttributes = "";

            // CollectionMethod
            $this->CollectionMethod->ViewValue = $this->CollectionMethod->CurrentValue;
            $this->CollectionMethod->ViewCustomAttributes = "";

            // Medicationused
            $this->Medicationused->ViewValue = $this->Medicationused->CurrentValue;
            $this->Medicationused->ViewCustomAttributes = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->CurrentValue;
            $this->DifficultiesinCollection->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // pH
            $this->pH->ViewValue = $this->pH->CurrentValue;
            $this->pH->ViewCustomAttributes = "";

            // Timeofcollection
            $this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
            $this->Timeofcollection->ViewCustomAttributes = "";

            // Timeofexamination
            $this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
            $this->Timeofexamination->ViewCustomAttributes = "";

            // Concentration
            $this->Concentration->ViewValue = $this->Concentration->CurrentValue;
            $this->Concentration->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
            $this->ProgressiveMotility->ViewCustomAttributes = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
            $this->NonProgrssiveMotile->ViewCustomAttributes = "";

            // Immotile
            $this->Immotile->ViewValue = $this->Immotile->CurrentValue;
            $this->Immotile->ViewCustomAttributes = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
            $this->TotalProgrssiveMotile->ViewCustomAttributes = "";

            // Appearance
            $this->Appearance->ViewValue = $this->Appearance->CurrentValue;
            $this->Appearance->ViewCustomAttributes = "";

            // Homogenosity
            $this->Homogenosity->ViewValue = $this->Homogenosity->CurrentValue;
            $this->Homogenosity->ViewCustomAttributes = "";

            // CompleteSample
            $this->CompleteSample->ViewValue = $this->CompleteSample->CurrentValue;
            $this->CompleteSample->ViewCustomAttributes = "";

            // Liquefactiontime
            $this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
            $this->Liquefactiontime->ViewCustomAttributes = "";

            // Normal
            $this->Normal->ViewValue = $this->Normal->CurrentValue;
            $this->Normal->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Headdefects
            $this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
            $this->Headdefects->ViewCustomAttributes = "";

            // MidpieceDefects
            $this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
            $this->MidpieceDefects->ViewCustomAttributes = "";

            // TailDefects
            $this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
            $this->TailDefects->ViewCustomAttributes = "";

            // NormalProgMotile
            $this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
            $this->NormalProgMotile->ViewCustomAttributes = "";

            // ImmatureForms
            $this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
            $this->ImmatureForms->ViewCustomAttributes = "";

            // Leucocytes
            $this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
            $this->Leucocytes->ViewCustomAttributes = "";

            // Agglutination
            $this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
            $this->Agglutination->ViewCustomAttributes = "";

            // Debris
            $this->Debris->ViewValue = $this->Debris->CurrentValue;
            $this->Debris->ViewCustomAttributes = "";

            // Diagnosis
            $this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
            $this->Diagnosis->ViewCustomAttributes = "";

            // Observations
            $this->Observations->ViewValue = $this->Observations->CurrentValue;
            $this->Observations->ViewCustomAttributes = "";

            // Signature
            $this->Signature->ViewValue = $this->Signature->CurrentValue;
            $this->Signature->ViewCustomAttributes = "";

            // SemenOrgin
            $this->SemenOrgin->ViewValue = $this->SemenOrgin->CurrentValue;
            $this->SemenOrgin->ViewCustomAttributes = "";

            // Donor
            $this->Donor->ViewValue = $this->Donor->CurrentValue;
            $this->Donor->ViewValue = FormatNumber($this->Donor->ViewValue, 0, -2, -2, -2);
            $this->Donor->ViewCustomAttributes = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
            $this->DonorBloodgroup->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Location
            $this->Location->ViewValue = $this->Location->CurrentValue;
            $this->Location->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Concentration1
            $this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
            $this->Concentration1->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
            $this->ProgressiveMotility1->ViewCustomAttributes = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
            $this->NonProgrssiveMotile1->ViewCustomAttributes = "";

            // Immotile1
            $this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
            $this->Immotile1->ViewCustomAttributes = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
            $this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Color
            $this->Color->ViewValue = $this->Color->CurrentValue;
            $this->Color->ViewCustomAttributes = "";

            // DoneBy
            $this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
            $this->DoneBy->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Abstinence
            $this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
            $this->Abstinence->ViewCustomAttributes = "";

            // ProcessedBy
            $this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
            $this->ProcessedBy->ViewCustomAttributes = "";

            // InseminationTime
            $this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
            $this->InseminationTime->ViewCustomAttributes = "";

            // InseminationBy
            $this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
            $this->InseminationBy->ViewCustomAttributes = "";

            // Big
            $this->Big->ViewValue = $this->Big->CurrentValue;
            $this->Big->ViewCustomAttributes = "";

            // Medium
            $this->Medium->ViewValue = $this->Medium->CurrentValue;
            $this->Medium->ViewCustomAttributes = "";

            // Small
            $this->Small->ViewValue = $this->Small->CurrentValue;
            $this->Small->ViewCustomAttributes = "";

            // NoHalo
            $this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
            $this->NoHalo->ViewCustomAttributes = "";

            // Fragmented
            $this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
            $this->Fragmented->ViewCustomAttributes = "";

            // NonFragmented
            $this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
            $this->NonFragmented->ViewCustomAttributes = "";

            // DFI
            $this->DFI->ViewValue = $this->DFI->CurrentValue;
            $this->DFI->ViewCustomAttributes = "";

            // IsueBy
            $this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
            $this->IsueBy->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
            $this->ProgressiveMotility2->ViewCustomAttributes = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
            $this->NonProgrssiveMotile2->ViewCustomAttributes = "";

            // Immotile2
            $this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
            $this->Immotile2->ViewCustomAttributes = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
            $this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

            // IssuedBy
            $this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
            $this->IssuedBy->ViewCustomAttributes = "";

            // IssuedTo
            $this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
            $this->IssuedTo->ViewCustomAttributes = "";

            // PaID
            $this->PaID->ViewValue = $this->PaID->CurrentValue;
            $this->PaID->ViewCustomAttributes = "";

            // PaName
            $this->PaName->ViewValue = $this->PaName->CurrentValue;
            $this->PaName->ViewCustomAttributes = "";

            // PaMobile
            $this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
            $this->PaMobile->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // MACS
            $this->MACS->ViewValue = $this->MACS->CurrentValue;
            $this->MACS->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

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

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";
            $this->HusbandName->TooltipValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";
            $this->CollectionDate->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";
            $this->RequestSample->TooltipValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";
            $this->CollectionType->TooltipValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";
            $this->CollectionMethod->TooltipValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";
            $this->Medicationused->TooltipValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";
            $this->DifficultiesinCollection->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";
            $this->pH->TooltipValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";
            $this->Timeofcollection->TooltipValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";
            $this->Timeofexamination->TooltipValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";
            $this->Concentration->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";
            $this->ProgressiveMotility->TooltipValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";
            $this->NonProgrssiveMotile->TooltipValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";
            $this->Immotile->TooltipValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";
            $this->TotalProgrssiveMotile->TooltipValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";
            $this->Appearance->TooltipValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";
            $this->Homogenosity->TooltipValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";
            $this->CompleteSample->TooltipValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";
            $this->Liquefactiontime->TooltipValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";
            $this->Normal->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";
            $this->Headdefects->TooltipValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";
            $this->MidpieceDefects->TooltipValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";
            $this->TailDefects->TooltipValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";
            $this->NormalProgMotile->TooltipValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";
            $this->ImmatureForms->TooltipValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";
            $this->Leucocytes->TooltipValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";
            $this->Agglutination->TooltipValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";
            $this->Debris->TooltipValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";
            $this->Diagnosis->TooltipValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";
            $this->Observations->TooltipValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";
            $this->Signature->TooltipValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";
            $this->SemenOrgin->TooltipValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";
            $this->Donor->TooltipValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";
            $this->DonorBloodgroup->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";
            $this->Location->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";
            $this->Concentration1->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";
            $this->ProgressiveMotility1->TooltipValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";
            $this->NonProgrssiveMotile1->TooltipValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";
            $this->Immotile1->TooltipValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";
            $this->TotalProgrssiveMotile1->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";
            $this->Color->TooltipValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";
            $this->DoneBy->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";
            $this->Abstinence->TooltipValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";
            $this->ProcessedBy->TooltipValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";
            $this->InseminationTime->TooltipValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";
            $this->InseminationBy->TooltipValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";
            $this->Big->TooltipValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";
            $this->Medium->TooltipValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";
            $this->Small->TooltipValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";
            $this->NoHalo->TooltipValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";
            $this->Fragmented->TooltipValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";
            $this->NonFragmented->TooltipValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";
            $this->DFI->TooltipValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";
            $this->IsueBy->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";
            $this->ProgressiveMotility2->TooltipValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";
            $this->NonProgrssiveMotile2->TooltipValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";
            $this->Immotile2->TooltipValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";
            $this->TotalProgrssiveMotile2->TooltipValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";
            $this->IssuedBy->TooltipValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";
            $this->IssuedTo->TooltipValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";
            $this->MACS->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfSemenanalysisreportList"), "", $this->TableVar, true);
        $pageId = "view";
        $Breadcrumb->add("view", $pageId, $url);
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

    // Page Exporting event
    // $this->ExportDoc = export document object
    public function pageExporting()
    {
        //$this->ExportDoc->Text = "my header"; // Export header
        //return false; // Return false to skip default export and use Row_Export event
        return true; // Return true to use default export and skip Row_Export event
    }

    // Row Export event
    // $this->ExportDoc = export document object
    public function rowExport($rs)
    {
        //$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
    }

    // Page Exported event
    // $this->ExportDoc = export document object
    public function pageExported()
    {
        //$this->ExportDoc->Text .= "my footer"; // Export footer
        //Log($this->ExportDoc->Text);
    }
}

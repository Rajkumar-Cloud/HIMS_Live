<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewSemenanalysisList extends ViewSemenanalysis
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_semenanalysis';

    // Page object name
    public $PageObjName = "ViewSemenanalysisList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fview_semenanalysislist";
    public $FormActionName = "k_action";
    public $FormKeyName = "k_key";
    public $FormOldKeyName = "k_oldkey";
    public $FormBlankRowName = "k_blankrow";
    public $FormKeyCountName = "key_count";

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

        // Table object (view_semenanalysis)
        if (!isset($GLOBALS["view_semenanalysis"]) || get_class($GLOBALS["view_semenanalysis"]) == PROJECT_NAMESPACE . "view_semenanalysis") {
            $GLOBALS["view_semenanalysis"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Initialize URLs
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->AddUrl = "ViewSemenanalysisAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewSemenanalysisDelete";
        $this->MultiUpdateUrl = "ViewSemenanalysisUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_semenanalysis');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // List options
        $this->ListOptions = new ListOptions();
        $this->ListOptions->TableVar = $this->TableVar;

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Import options
        $this->ImportOptions = new ListOptions("div");
        $this->ImportOptions->TagClassName = "ew-import-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";

        // Filter options
        $this->FilterOptions = new ListOptions("div");
        $this->FilterOptions->TagClassName = "ew-filter-option fview_semenanalysislistsrch";

        // List actions
        $this->ListActions = new ListActions();
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
                $doc = new $class(Container("view_semenanalysis"));
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
                        if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0) {
                            $val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
                        }
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

    // Class variables
    public $ListOptions; // List options
    public $ExportOptions; // Export options
    public $SearchOptions; // Search options
    public $OtherOptions; // Other options
    public $FilterOptions; // Filter options
    public $ImportOptions; // Import options
    public $ListActions; // List actions
    public $SelectedCount = 0;
    public $SelectedIndex = 0;
    public $DisplayRecords = 20;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
    public $DefaultSearchWhere = ""; // Default search WHERE clause
    public $SearchWhere = ""; // Search WHERE clause
    public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
    public $SearchRowCount = 0; // For extended search
    public $SearchColumnCount = 0; // For extended search
    public $SearchFieldsPerRow = 1; // For extended search
    public $RecordCount = 0; // Record count
    public $EditRowCount;
    public $StartRowCount = 1;
    public $RowCount = 0;
    public $Attrs = []; // Row attributes and cell attributes
    public $RowIndex = 0; // Row index
    public $KeyCount = 0; // Key count
    public $RowAction = ""; // Row action
    public $RowOldKey = ""; // Row old key (for copy)
    public $MultiColumnClass = "col-sm";
    public $MultiColumnEditClass = "w-100";
    public $DbMasterFilter = ""; // Master filter
    public $DbDetailFilter = ""; // Detail filter
    public $MasterRecordExists;
    public $MultiSelectKey;
    public $Command;
    public $RestoreSearch = false;
    public $DetailPages;
    public $OldRecordset;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();
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
        $this->Diagnosis->Visible = false;
        $this->Observations->Visible = false;
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

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Setup other options
        $this->setupOtherOptions();

        // Set up custom action (compatible with old version)
        foreach ($this->CustomActions as $name => $action) {
            $this->ListActions->add($name, $action);
        }

        // Show checkbox column if multiple action
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
                $this->ListOptions["checkbox"]->Visible = true;
                break;
            }
        }

        // Set up lookup cache

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Process list action first
            if ($this->processListAction()) { // Ajax request
                $this->terminate();
                return;
            }

            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

            // Set up Breadcrumb
            if (!$this->isExport()) {
                $this->setupBreadcrumb();
            }

            // Hide list options
            if ($this->isExport()) {
                $this->ListOptions->hideAllOptions(["sequence"]);
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            } elseif ($this->isGridAdd() || $this->isGridEdit()) {
                $this->ListOptions->hideAllOptions();
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            }

            // Hide options
            if ($this->isExport() || $this->CurrentAction) {
                $this->ExportOptions->hideAllOptions();
                $this->FilterOptions->hideAllOptions();
                $this->ImportOptions->hideAllOptions();
            }

            // Hide other options
            if ($this->isExport()) {
                $this->OtherOptions->hideAllOptions();
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }

            // Restore search parms from Session if not searching / reset / export
            if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms()) {
                $this->restoreSearchParms();
            }

            // Call Recordset SearchValidated event
            $this->recordsetSearchValidated();

            // Set up sorting order
            $this->setupSortOrder();

            // Get basic search criteria
            if (!$this->hasInvalidFields()) {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Restore display records
        if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
            $this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
        } else {
            $this->DisplayRecords = 20; // Load default
            $this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
        }

        // Load Sorting Order
        if ($this->Command != "json") {
            $this->loadSortOrder();
        }

        // Load search default if no existing search criteria
        if (!$this->checkSearchParms()) {
            // Load basic search from default
            $this->BasicSearch->loadDefault();
            if ($this->BasicSearch->Keyword != "") {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Build search criteria
        AddFilter($this->SearchWhere, $srchAdvanced);
        AddFilter($this->SearchWhere, $srchBasic);

        // Call Recordset_Searching event
        $this->recordsetSearching($this->SearchWhere);

        // Save search criteria
        if ($this->Command == "search" && !$this->RestoreSearch) {
            $this->setSearchWhere($this->SearchWhere); // Save to Session
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->Command != "json") {
            $this->SearchWhere = $this->getSearchWhere();
        }

        // Build filter
        $filter = "";
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }
        if ($this->isGridAdd()) {
            $this->CurrentFilter = "0=1";
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->GridAddRowCount;
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) { // Display all records
                $this->DisplayRecords = $this->TotalRecords;
            }
            if (!($this->isExport() && $this->ExportAll)) { // Set up start record position
                $this->setupStartRecord();
            }
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

            // Set no record found message
            if (!$this->CurrentAction && $this->TotalRecords == 0) {
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search/sort options
        $this->setupSearchSortOptions();

        // Set up search panel class
        if ($this->SearchWhere != "") {
            AppendClass($this->SearchPanelClass, "show");
        }

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset);
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
            $this->terminate(true);
            return;
        }

        // Set up pager
        $this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);

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

    // Set up number of records displayed per page
    protected function setupDisplayRecords()
    {
        $wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
        if ($wrk != "") {
            if (is_numeric($wrk)) {
                $this->DisplayRecords = (int)$wrk;
            } else {
                if (SameText($wrk, "all")) { // Display all records
                    $this->DisplayRecords = -1;
                } else {
                    $this->DisplayRecords = 20; // Non-numeric, load default
                }
            }
            $this->setRecordsPerPage($this->DisplayRecords); // Save to Session
            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Build filter for all keys
    protected function buildKeyFilter()
    {
        global $CurrentForm;
        $wrkFilter = "";

        // Update row index and get row key
        $rowindex = 1;
        $CurrentForm->Index = $rowindex;
        $thisKey = strval($CurrentForm->getValue($this->FormKeyName));
        while ($thisKey != "") {
            if ($this->setupKeyValues($thisKey)) {
                $filter = $this->getRecordFilter();
                if ($wrkFilter != "") {
                    $wrkFilter .= " OR ";
                }
                $wrkFilter .= $filter;
            } else {
                $wrkFilter = "0=1";
                break;
            }

            // Update row index and get row key
            $rowindex++; // Next row
            $CurrentForm->Index = $rowindex;
            $thisKey = strval($CurrentForm->getValue($this->FormKeyName));
        }
        return $wrkFilter;
    }

    // Set up key values
    protected function setupKeyValues($key)
    {
        $arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($arKeyFlds) >= 1) {
            $this->id->setOldValue($arKeyFlds[0]);
            if (!is_numeric($this->id->OldValue)) {
                return false;
            }
        }
        return true;
    }

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->HusbandName->AdvancedSearch->toJson(), ","); // Field HusbandName
        $filterList = Concat($filterList, $this->RequestDr->AdvancedSearch->toJson(), ","); // Field RequestDr
        $filterList = Concat($filterList, $this->CollectionDate->AdvancedSearch->toJson(), ","); // Field CollectionDate
        $filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
        $filterList = Concat($filterList, $this->RequestSample->AdvancedSearch->toJson(), ","); // Field RequestSample
        $filterList = Concat($filterList, $this->CollectionType->AdvancedSearch->toJson(), ","); // Field CollectionType
        $filterList = Concat($filterList, $this->CollectionMethod->AdvancedSearch->toJson(), ","); // Field CollectionMethod
        $filterList = Concat($filterList, $this->Medicationused->AdvancedSearch->toJson(), ","); // Field Medicationused
        $filterList = Concat($filterList, $this->DifficultiesinCollection->AdvancedSearch->toJson(), ","); // Field DifficultiesinCollection
        $filterList = Concat($filterList, $this->Volume->AdvancedSearch->toJson(), ","); // Field Volume
        $filterList = Concat($filterList, $this->pH->AdvancedSearch->toJson(), ","); // Field pH
        $filterList = Concat($filterList, $this->Timeofcollection->AdvancedSearch->toJson(), ","); // Field Timeofcollection
        $filterList = Concat($filterList, $this->Timeofexamination->AdvancedSearch->toJson(), ","); // Field Timeofexamination
        $filterList = Concat($filterList, $this->Concentration->AdvancedSearch->toJson(), ","); // Field Concentration
        $filterList = Concat($filterList, $this->Total->AdvancedSearch->toJson(), ","); // Field Total
        $filterList = Concat($filterList, $this->ProgressiveMotility->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility
        $filterList = Concat($filterList, $this->NonProgrssiveMotile->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile
        $filterList = Concat($filterList, $this->Immotile->AdvancedSearch->toJson(), ","); // Field Immotile
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile
        $filterList = Concat($filterList, $this->Appearance->AdvancedSearch->toJson(), ","); // Field Appearance
        $filterList = Concat($filterList, $this->Homogenosity->AdvancedSearch->toJson(), ","); // Field Homogenosity
        $filterList = Concat($filterList, $this->CompleteSample->AdvancedSearch->toJson(), ","); // Field CompleteSample
        $filterList = Concat($filterList, $this->Liquefactiontime->AdvancedSearch->toJson(), ","); // Field Liquefactiontime
        $filterList = Concat($filterList, $this->Normal->AdvancedSearch->toJson(), ","); // Field Normal
        $filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
        $filterList = Concat($filterList, $this->Headdefects->AdvancedSearch->toJson(), ","); // Field Headdefects
        $filterList = Concat($filterList, $this->MidpieceDefects->AdvancedSearch->toJson(), ","); // Field MidpieceDefects
        $filterList = Concat($filterList, $this->TailDefects->AdvancedSearch->toJson(), ","); // Field TailDefects
        $filterList = Concat($filterList, $this->NormalProgMotile->AdvancedSearch->toJson(), ","); // Field NormalProgMotile
        $filterList = Concat($filterList, $this->ImmatureForms->AdvancedSearch->toJson(), ","); // Field ImmatureForms
        $filterList = Concat($filterList, $this->Leucocytes->AdvancedSearch->toJson(), ","); // Field Leucocytes
        $filterList = Concat($filterList, $this->Agglutination->AdvancedSearch->toJson(), ","); // Field Agglutination
        $filterList = Concat($filterList, $this->Debris->AdvancedSearch->toJson(), ","); // Field Debris
        $filterList = Concat($filterList, $this->Diagnosis->AdvancedSearch->toJson(), ","); // Field Diagnosis
        $filterList = Concat($filterList, $this->Observations->AdvancedSearch->toJson(), ","); // Field Observations
        $filterList = Concat($filterList, $this->Signature->AdvancedSearch->toJson(), ","); // Field Signature
        $filterList = Concat($filterList, $this->SemenOrgin->AdvancedSearch->toJson(), ","); // Field SemenOrgin
        $filterList = Concat($filterList, $this->Donor->AdvancedSearch->toJson(), ","); // Field Donor
        $filterList = Concat($filterList, $this->DonorBloodgroup->AdvancedSearch->toJson(), ","); // Field DonorBloodgroup
        $filterList = Concat($filterList, $this->Tank->AdvancedSearch->toJson(), ","); // Field Tank
        $filterList = Concat($filterList, $this->Location->AdvancedSearch->toJson(), ","); // Field Location
        $filterList = Concat($filterList, $this->Volume1->AdvancedSearch->toJson(), ","); // Field Volume1
        $filterList = Concat($filterList, $this->Concentration1->AdvancedSearch->toJson(), ","); // Field Concentration1
        $filterList = Concat($filterList, $this->Total1->AdvancedSearch->toJson(), ","); // Field Total1
        $filterList = Concat($filterList, $this->ProgressiveMotility1->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility1
        $filterList = Concat($filterList, $this->NonProgrssiveMotile1->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile1
        $filterList = Concat($filterList, $this->Immotile1->AdvancedSearch->toJson(), ","); // Field Immotile1
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile1->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile1
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->Color->AdvancedSearch->toJson(), ","); // Field Color
        $filterList = Concat($filterList, $this->DoneBy->AdvancedSearch->toJson(), ","); // Field DoneBy
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Abstinence->AdvancedSearch->toJson(), ","); // Field Abstinence
        $filterList = Concat($filterList, $this->ProcessedBy->AdvancedSearch->toJson(), ","); // Field ProcessedBy
        $filterList = Concat($filterList, $this->InseminationTime->AdvancedSearch->toJson(), ","); // Field InseminationTime
        $filterList = Concat($filterList, $this->InseminationBy->AdvancedSearch->toJson(), ","); // Field InseminationBy
        $filterList = Concat($filterList, $this->Big->AdvancedSearch->toJson(), ","); // Field Big
        $filterList = Concat($filterList, $this->Medium->AdvancedSearch->toJson(), ","); // Field Medium
        $filterList = Concat($filterList, $this->Small->AdvancedSearch->toJson(), ","); // Field Small
        $filterList = Concat($filterList, $this->NoHalo->AdvancedSearch->toJson(), ","); // Field NoHalo
        $filterList = Concat($filterList, $this->Fragmented->AdvancedSearch->toJson(), ","); // Field Fragmented
        $filterList = Concat($filterList, $this->NonFragmented->AdvancedSearch->toJson(), ","); // Field NonFragmented
        $filterList = Concat($filterList, $this->DFI->AdvancedSearch->toJson(), ","); // Field DFI
        $filterList = Concat($filterList, $this->IsueBy->AdvancedSearch->toJson(), ","); // Field IsueBy
        $filterList = Concat($filterList, $this->Volume2->AdvancedSearch->toJson(), ","); // Field Volume2
        $filterList = Concat($filterList, $this->Concentration2->AdvancedSearch->toJson(), ","); // Field Concentration2
        $filterList = Concat($filterList, $this->Total2->AdvancedSearch->toJson(), ","); // Field Total2
        $filterList = Concat($filterList, $this->ProgressiveMotility2->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility2
        $filterList = Concat($filterList, $this->NonProgrssiveMotile2->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile2
        $filterList = Concat($filterList, $this->Immotile2->AdvancedSearch->toJson(), ","); // Field Immotile2
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile2->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile2
        $filterList = Concat($filterList, $this->IssuedBy->AdvancedSearch->toJson(), ","); // Field IssuedBy
        $filterList = Concat($filterList, $this->IssuedTo->AdvancedSearch->toJson(), ","); // Field IssuedTo
        $filterList = Concat($filterList, $this->PaID->AdvancedSearch->toJson(), ","); // Field PaID
        $filterList = Concat($filterList, $this->PaName->AdvancedSearch->toJson(), ","); // Field PaName
        $filterList = Concat($filterList, $this->PaMobile->AdvancedSearch->toJson(), ","); // Field PaMobile
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PartnerMobile->AdvancedSearch->toJson(), ","); // Field PartnerMobile
        $filterList = Concat($filterList, $this->MACS->AdvancedSearch->toJson(), ","); // Field MACS
        $filterList = Concat($filterList, $this->PREG_TEST_DATE->AdvancedSearch->toJson(), ","); // Field PREG_TEST_DATE
        $filterList = Concat($filterList, $this->SPECIFIC_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_PROBLEMS
        $filterList = Concat($filterList, $this->IMSC_1->AdvancedSearch->toJson(), ","); // Field IMSC_1
        $filterList = Concat($filterList, $this->IMSC_2->AdvancedSearch->toJson(), ","); // Field IMSC_2
        $filterList = Concat($filterList, $this->LIQUIFACTION_STORAGE->AdvancedSearch->toJson(), ","); // Field LIQUIFACTION_STORAGE
        $filterList = Concat($filterList, $this->IUI_PREP_METHOD->AdvancedSearch->toJson(), ","); // Field IUI_PREP_METHOD
        $filterList = Concat($filterList, $this->TIME_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME_FROM_TRIGGER
        $filterList = Concat($filterList, $this->COLLECTION_TO_PREPARATION->AdvancedSearch->toJson(), ","); // Field COLLECTION_TO_PREPARATION
        $filterList = Concat($filterList, $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->toJson(), ","); // Field TIME_FROM_PREP_TO_INSEM
        if ($this->BasicSearch->Keyword != "") {
            $wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
            $filterList = Concat($filterList, $wrk, ",");
        }

        // Return filter list in JSON
        if ($filterList != "") {
            $filterList = "\"data\":{" . $filterList . "}";
        }
        if ($savedFilterList != "") {
            $filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
        }
        return ($filterList != "") ? "{" . $filterList . "}" : "null";
    }

    // Process filter list
    protected function processFilterList()
    {
        global $UserProfile;
        if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
            $filters = Post("filters");
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_semenanalysislistsrch", $filters);
            WriteJson([["success" => true]]); // Success
            return true;
        } elseif (Post("cmd") == "resetfilter") {
            $this->restoreFilterList();
        }
        return false;
    }

    // Restore list of filters
    protected function restoreFilterList()
    {
        // Return if not reset filter
        if (Post("cmd") !== "resetfilter") {
            return false;
        }
        $filter = json_decode(Post("filter"), true);
        $this->Command = "search";

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field HusbandName
        $this->HusbandName->AdvancedSearch->SearchValue = @$filter["x_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchOperator = @$filter["z_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchCondition = @$filter["v_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchValue2 = @$filter["y_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandName"];
        $this->HusbandName->AdvancedSearch->save();

        // Field RequestDr
        $this->RequestDr->AdvancedSearch->SearchValue = @$filter["x_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchOperator = @$filter["z_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchCondition = @$filter["v_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchValue2 = @$filter["y_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchOperator2 = @$filter["w_RequestDr"];
        $this->RequestDr->AdvancedSearch->save();

        // Field CollectionDate
        $this->CollectionDate->AdvancedSearch->SearchValue = @$filter["x_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchOperator = @$filter["z_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchCondition = @$filter["v_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchValue2 = @$filter["y_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->save();

        // Field ResultDate
        $this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
        $this->ResultDate->AdvancedSearch->save();

        // Field RequestSample
        $this->RequestSample->AdvancedSearch->SearchValue = @$filter["x_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchOperator = @$filter["z_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchCondition = @$filter["v_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchValue2 = @$filter["y_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchOperator2 = @$filter["w_RequestSample"];
        $this->RequestSample->AdvancedSearch->save();

        // Field CollectionType
        $this->CollectionType->AdvancedSearch->SearchValue = @$filter["x_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchOperator = @$filter["z_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchCondition = @$filter["v_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchValue2 = @$filter["y_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionType"];
        $this->CollectionType->AdvancedSearch->save();

        // Field CollectionMethod
        $this->CollectionMethod->AdvancedSearch->SearchValue = @$filter["x_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchOperator = @$filter["z_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchCondition = @$filter["v_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchValue2 = @$filter["y_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->save();

        // Field Medicationused
        $this->Medicationused->AdvancedSearch->SearchValue = @$filter["x_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchOperator = @$filter["z_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchCondition = @$filter["v_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchValue2 = @$filter["y_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchOperator2 = @$filter["w_Medicationused"];
        $this->Medicationused->AdvancedSearch->save();

        // Field DifficultiesinCollection
        $this->DifficultiesinCollection->AdvancedSearch->SearchValue = @$filter["x_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchOperator = @$filter["z_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchCondition = @$filter["v_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchValue2 = @$filter["y_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchOperator2 = @$filter["w_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->save();

        // Field Volume
        $this->Volume->AdvancedSearch->SearchValue = @$filter["x_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator = @$filter["z_Volume"];
        $this->Volume->AdvancedSearch->SearchCondition = @$filter["v_Volume"];
        $this->Volume->AdvancedSearch->SearchValue2 = @$filter["y_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator2 = @$filter["w_Volume"];
        $this->Volume->AdvancedSearch->save();

        // Field pH
        $this->pH->AdvancedSearch->SearchValue = @$filter["x_pH"];
        $this->pH->AdvancedSearch->SearchOperator = @$filter["z_pH"];
        $this->pH->AdvancedSearch->SearchCondition = @$filter["v_pH"];
        $this->pH->AdvancedSearch->SearchValue2 = @$filter["y_pH"];
        $this->pH->AdvancedSearch->SearchOperator2 = @$filter["w_pH"];
        $this->pH->AdvancedSearch->save();

        // Field Timeofcollection
        $this->Timeofcollection->AdvancedSearch->SearchValue = @$filter["x_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchOperator = @$filter["z_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchCondition = @$filter["v_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchValue2 = @$filter["y_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchOperator2 = @$filter["w_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->save();

        // Field Timeofexamination
        $this->Timeofexamination->AdvancedSearch->SearchValue = @$filter["x_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchOperator = @$filter["z_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchCondition = @$filter["v_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchValue2 = @$filter["y_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchOperator2 = @$filter["w_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->save();

        // Field Concentration
        $this->Concentration->AdvancedSearch->SearchValue = @$filter["x_Concentration"];
        $this->Concentration->AdvancedSearch->SearchOperator = @$filter["z_Concentration"];
        $this->Concentration->AdvancedSearch->SearchCondition = @$filter["v_Concentration"];
        $this->Concentration->AdvancedSearch->SearchValue2 = @$filter["y_Concentration"];
        $this->Concentration->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration"];
        $this->Concentration->AdvancedSearch->save();

        // Field Total
        $this->Total->AdvancedSearch->SearchValue = @$filter["x_Total"];
        $this->Total->AdvancedSearch->SearchOperator = @$filter["z_Total"];
        $this->Total->AdvancedSearch->SearchCondition = @$filter["v_Total"];
        $this->Total->AdvancedSearch->SearchValue2 = @$filter["y_Total"];
        $this->Total->AdvancedSearch->SearchOperator2 = @$filter["w_Total"];
        $this->Total->AdvancedSearch->save();

        // Field ProgressiveMotility
        $this->ProgressiveMotility->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->save();

        // Field NonProgrssiveMotile
        $this->NonProgrssiveMotile->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->save();

        // Field Immotile
        $this->Immotile->AdvancedSearch->SearchValue = @$filter["x_Immotile"];
        $this->Immotile->AdvancedSearch->SearchOperator = @$filter["z_Immotile"];
        $this->Immotile->AdvancedSearch->SearchCondition = @$filter["v_Immotile"];
        $this->Immotile->AdvancedSearch->SearchValue2 = @$filter["y_Immotile"];
        $this->Immotile->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile"];
        $this->Immotile->AdvancedSearch->save();

        // Field TotalProgrssiveMotile
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->save();

        // Field Appearance
        $this->Appearance->AdvancedSearch->SearchValue = @$filter["x_Appearance"];
        $this->Appearance->AdvancedSearch->SearchOperator = @$filter["z_Appearance"];
        $this->Appearance->AdvancedSearch->SearchCondition = @$filter["v_Appearance"];
        $this->Appearance->AdvancedSearch->SearchValue2 = @$filter["y_Appearance"];
        $this->Appearance->AdvancedSearch->SearchOperator2 = @$filter["w_Appearance"];
        $this->Appearance->AdvancedSearch->save();

        // Field Homogenosity
        $this->Homogenosity->AdvancedSearch->SearchValue = @$filter["x_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchOperator = @$filter["z_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchCondition = @$filter["v_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchValue2 = @$filter["y_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchOperator2 = @$filter["w_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->save();

        // Field CompleteSample
        $this->CompleteSample->AdvancedSearch->SearchValue = @$filter["x_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchOperator = @$filter["z_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchCondition = @$filter["v_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchValue2 = @$filter["y_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchOperator2 = @$filter["w_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->save();

        // Field Liquefactiontime
        $this->Liquefactiontime->AdvancedSearch->SearchValue = @$filter["x_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchOperator = @$filter["z_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchCondition = @$filter["v_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchValue2 = @$filter["y_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchOperator2 = @$filter["w_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->save();

        // Field Normal
        $this->Normal->AdvancedSearch->SearchValue = @$filter["x_Normal"];
        $this->Normal->AdvancedSearch->SearchOperator = @$filter["z_Normal"];
        $this->Normal->AdvancedSearch->SearchCondition = @$filter["v_Normal"];
        $this->Normal->AdvancedSearch->SearchValue2 = @$filter["y_Normal"];
        $this->Normal->AdvancedSearch->SearchOperator2 = @$filter["w_Normal"];
        $this->Normal->AdvancedSearch->save();

        // Field Abnormal
        $this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
        $this->Abnormal->AdvancedSearch->save();

        // Field Headdefects
        $this->Headdefects->AdvancedSearch->SearchValue = @$filter["x_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchOperator = @$filter["z_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchCondition = @$filter["v_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchValue2 = @$filter["y_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchOperator2 = @$filter["w_Headdefects"];
        $this->Headdefects->AdvancedSearch->save();

        // Field MidpieceDefects
        $this->MidpieceDefects->AdvancedSearch->SearchValue = @$filter["x_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchOperator = @$filter["z_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchCondition = @$filter["v_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchValue2 = @$filter["y_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchOperator2 = @$filter["w_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->save();

        // Field TailDefects
        $this->TailDefects->AdvancedSearch->SearchValue = @$filter["x_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchOperator = @$filter["z_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchCondition = @$filter["v_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchValue2 = @$filter["y_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchOperator2 = @$filter["w_TailDefects"];
        $this->TailDefects->AdvancedSearch->save();

        // Field NormalProgMotile
        $this->NormalProgMotile->AdvancedSearch->SearchValue = @$filter["x_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchOperator = @$filter["z_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchCondition = @$filter["v_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchValue2 = @$filter["y_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchOperator2 = @$filter["w_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->save();

        // Field ImmatureForms
        $this->ImmatureForms->AdvancedSearch->SearchValue = @$filter["x_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchOperator = @$filter["z_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchCondition = @$filter["v_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchValue2 = @$filter["y_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchOperator2 = @$filter["w_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->save();

        // Field Leucocytes
        $this->Leucocytes->AdvancedSearch->SearchValue = @$filter["x_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchOperator = @$filter["z_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchCondition = @$filter["v_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchValue2 = @$filter["y_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchOperator2 = @$filter["w_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->save();

        // Field Agglutination
        $this->Agglutination->AdvancedSearch->SearchValue = @$filter["x_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchOperator = @$filter["z_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchCondition = @$filter["v_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchValue2 = @$filter["y_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchOperator2 = @$filter["w_Agglutination"];
        $this->Agglutination->AdvancedSearch->save();

        // Field Debris
        $this->Debris->AdvancedSearch->SearchValue = @$filter["x_Debris"];
        $this->Debris->AdvancedSearch->SearchOperator = @$filter["z_Debris"];
        $this->Debris->AdvancedSearch->SearchCondition = @$filter["v_Debris"];
        $this->Debris->AdvancedSearch->SearchValue2 = @$filter["y_Debris"];
        $this->Debris->AdvancedSearch->SearchOperator2 = @$filter["w_Debris"];
        $this->Debris->AdvancedSearch->save();

        // Field Diagnosis
        $this->Diagnosis->AdvancedSearch->SearchValue = @$filter["x_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchOperator = @$filter["z_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchCondition = @$filter["v_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchValue2 = @$filter["y_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->save();

        // Field Observations
        $this->Observations->AdvancedSearch->SearchValue = @$filter["x_Observations"];
        $this->Observations->AdvancedSearch->SearchOperator = @$filter["z_Observations"];
        $this->Observations->AdvancedSearch->SearchCondition = @$filter["v_Observations"];
        $this->Observations->AdvancedSearch->SearchValue2 = @$filter["y_Observations"];
        $this->Observations->AdvancedSearch->SearchOperator2 = @$filter["w_Observations"];
        $this->Observations->AdvancedSearch->save();

        // Field Signature
        $this->Signature->AdvancedSearch->SearchValue = @$filter["x_Signature"];
        $this->Signature->AdvancedSearch->SearchOperator = @$filter["z_Signature"];
        $this->Signature->AdvancedSearch->SearchCondition = @$filter["v_Signature"];
        $this->Signature->AdvancedSearch->SearchValue2 = @$filter["y_Signature"];
        $this->Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Signature"];
        $this->Signature->AdvancedSearch->save();

        // Field SemenOrgin
        $this->SemenOrgin->AdvancedSearch->SearchValue = @$filter["x_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchOperator = @$filter["z_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchCondition = @$filter["v_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchValue2 = @$filter["y_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->save();

        // Field Donor
        $this->Donor->AdvancedSearch->SearchValue = @$filter["x_Donor"];
        $this->Donor->AdvancedSearch->SearchOperator = @$filter["z_Donor"];
        $this->Donor->AdvancedSearch->SearchCondition = @$filter["v_Donor"];
        $this->Donor->AdvancedSearch->SearchValue2 = @$filter["y_Donor"];
        $this->Donor->AdvancedSearch->SearchOperator2 = @$filter["w_Donor"];
        $this->Donor->AdvancedSearch->save();

        // Field DonorBloodgroup
        $this->DonorBloodgroup->AdvancedSearch->SearchValue = @$filter["x_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->save();

        // Field Tank
        $this->Tank->AdvancedSearch->SearchValue = @$filter["x_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator = @$filter["z_Tank"];
        $this->Tank->AdvancedSearch->SearchCondition = @$filter["v_Tank"];
        $this->Tank->AdvancedSearch->SearchValue2 = @$filter["y_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator2 = @$filter["w_Tank"];
        $this->Tank->AdvancedSearch->save();

        // Field Location
        $this->Location->AdvancedSearch->SearchValue = @$filter["x_Location"];
        $this->Location->AdvancedSearch->SearchOperator = @$filter["z_Location"];
        $this->Location->AdvancedSearch->SearchCondition = @$filter["v_Location"];
        $this->Location->AdvancedSearch->SearchValue2 = @$filter["y_Location"];
        $this->Location->AdvancedSearch->SearchOperator2 = @$filter["w_Location"];
        $this->Location->AdvancedSearch->save();

        // Field Volume1
        $this->Volume1->AdvancedSearch->SearchValue = @$filter["x_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator = @$filter["z_Volume1"];
        $this->Volume1->AdvancedSearch->SearchCondition = @$filter["v_Volume1"];
        $this->Volume1->AdvancedSearch->SearchValue2 = @$filter["y_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator2 = @$filter["w_Volume1"];
        $this->Volume1->AdvancedSearch->save();

        // Field Concentration1
        $this->Concentration1->AdvancedSearch->SearchValue = @$filter["x_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchOperator = @$filter["z_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchCondition = @$filter["v_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchValue2 = @$filter["y_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration1"];
        $this->Concentration1->AdvancedSearch->save();

        // Field Total1
        $this->Total1->AdvancedSearch->SearchValue = @$filter["x_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator = @$filter["z_Total1"];
        $this->Total1->AdvancedSearch->SearchCondition = @$filter["v_Total1"];
        $this->Total1->AdvancedSearch->SearchValue2 = @$filter["y_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator2 = @$filter["w_Total1"];
        $this->Total1->AdvancedSearch->save();

        // Field ProgressiveMotility1
        $this->ProgressiveMotility1->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->save();

        // Field NonProgrssiveMotile1
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->save();

        // Field Immotile1
        $this->Immotile1->AdvancedSearch->SearchValue = @$filter["x_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchOperator = @$filter["z_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchCondition = @$filter["v_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchValue2 = @$filter["y_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile1"];
        $this->Immotile1->AdvancedSearch->save();

        // Field TotalProgrssiveMotile1
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field Color
        $this->Color->AdvancedSearch->SearchValue = @$filter["x_Color"];
        $this->Color->AdvancedSearch->SearchOperator = @$filter["z_Color"];
        $this->Color->AdvancedSearch->SearchCondition = @$filter["v_Color"];
        $this->Color->AdvancedSearch->SearchValue2 = @$filter["y_Color"];
        $this->Color->AdvancedSearch->SearchOperator2 = @$filter["w_Color"];
        $this->Color->AdvancedSearch->save();

        // Field DoneBy
        $this->DoneBy->AdvancedSearch->SearchValue = @$filter["x_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchOperator = @$filter["z_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchCondition = @$filter["v_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchValue2 = @$filter["y_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchOperator2 = @$filter["w_DoneBy"];
        $this->DoneBy->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Abstinence
        $this->Abstinence->AdvancedSearch->SearchValue = @$filter["x_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchOperator = @$filter["z_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchCondition = @$filter["v_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchValue2 = @$filter["y_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchOperator2 = @$filter["w_Abstinence"];
        $this->Abstinence->AdvancedSearch->save();

        // Field ProcessedBy
        $this->ProcessedBy->AdvancedSearch->SearchValue = @$filter["x_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchOperator = @$filter["z_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchCondition = @$filter["v_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchValue2 = @$filter["y_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->save();

        // Field InseminationTime
        $this->InseminationTime->AdvancedSearch->SearchValue = @$filter["x_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchOperator = @$filter["z_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchCondition = @$filter["v_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchValue2 = @$filter["y_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchOperator2 = @$filter["w_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->save();

        // Field InseminationBy
        $this->InseminationBy->AdvancedSearch->SearchValue = @$filter["x_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchOperator = @$filter["z_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchCondition = @$filter["v_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchValue2 = @$filter["y_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchOperator2 = @$filter["w_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->save();

        // Field Big
        $this->Big->AdvancedSearch->SearchValue = @$filter["x_Big"];
        $this->Big->AdvancedSearch->SearchOperator = @$filter["z_Big"];
        $this->Big->AdvancedSearch->SearchCondition = @$filter["v_Big"];
        $this->Big->AdvancedSearch->SearchValue2 = @$filter["y_Big"];
        $this->Big->AdvancedSearch->SearchOperator2 = @$filter["w_Big"];
        $this->Big->AdvancedSearch->save();

        // Field Medium
        $this->Medium->AdvancedSearch->SearchValue = @$filter["x_Medium"];
        $this->Medium->AdvancedSearch->SearchOperator = @$filter["z_Medium"];
        $this->Medium->AdvancedSearch->SearchCondition = @$filter["v_Medium"];
        $this->Medium->AdvancedSearch->SearchValue2 = @$filter["y_Medium"];
        $this->Medium->AdvancedSearch->SearchOperator2 = @$filter["w_Medium"];
        $this->Medium->AdvancedSearch->save();

        // Field Small
        $this->Small->AdvancedSearch->SearchValue = @$filter["x_Small"];
        $this->Small->AdvancedSearch->SearchOperator = @$filter["z_Small"];
        $this->Small->AdvancedSearch->SearchCondition = @$filter["v_Small"];
        $this->Small->AdvancedSearch->SearchValue2 = @$filter["y_Small"];
        $this->Small->AdvancedSearch->SearchOperator2 = @$filter["w_Small"];
        $this->Small->AdvancedSearch->save();

        // Field NoHalo
        $this->NoHalo->AdvancedSearch->SearchValue = @$filter["x_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchOperator = @$filter["z_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchCondition = @$filter["v_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchValue2 = @$filter["y_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchOperator2 = @$filter["w_NoHalo"];
        $this->NoHalo->AdvancedSearch->save();

        // Field Fragmented
        $this->Fragmented->AdvancedSearch->SearchValue = @$filter["x_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchOperator = @$filter["z_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchCondition = @$filter["v_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchValue2 = @$filter["y_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchOperator2 = @$filter["w_Fragmented"];
        $this->Fragmented->AdvancedSearch->save();

        // Field NonFragmented
        $this->NonFragmented->AdvancedSearch->SearchValue = @$filter["x_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchOperator = @$filter["z_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchCondition = @$filter["v_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchValue2 = @$filter["y_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchOperator2 = @$filter["w_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->save();

        // Field DFI
        $this->DFI->AdvancedSearch->SearchValue = @$filter["x_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator = @$filter["z_DFI"];
        $this->DFI->AdvancedSearch->SearchCondition = @$filter["v_DFI"];
        $this->DFI->AdvancedSearch->SearchValue2 = @$filter["y_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator2 = @$filter["w_DFI"];
        $this->DFI->AdvancedSearch->save();

        // Field IsueBy
        $this->IsueBy->AdvancedSearch->SearchValue = @$filter["x_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchOperator = @$filter["z_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchCondition = @$filter["v_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchValue2 = @$filter["y_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchOperator2 = @$filter["w_IsueBy"];
        $this->IsueBy->AdvancedSearch->save();

        // Field Volume2
        $this->Volume2->AdvancedSearch->SearchValue = @$filter["x_Volume2"];
        $this->Volume2->AdvancedSearch->SearchOperator = @$filter["z_Volume2"];
        $this->Volume2->AdvancedSearch->SearchCondition = @$filter["v_Volume2"];
        $this->Volume2->AdvancedSearch->SearchValue2 = @$filter["y_Volume2"];
        $this->Volume2->AdvancedSearch->SearchOperator2 = @$filter["w_Volume2"];
        $this->Volume2->AdvancedSearch->save();

        // Field Concentration2
        $this->Concentration2->AdvancedSearch->SearchValue = @$filter["x_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchOperator = @$filter["z_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchCondition = @$filter["v_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchValue2 = @$filter["y_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration2"];
        $this->Concentration2->AdvancedSearch->save();

        // Field Total2
        $this->Total2->AdvancedSearch->SearchValue = @$filter["x_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator = @$filter["z_Total2"];
        $this->Total2->AdvancedSearch->SearchCondition = @$filter["v_Total2"];
        $this->Total2->AdvancedSearch->SearchValue2 = @$filter["y_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator2 = @$filter["w_Total2"];
        $this->Total2->AdvancedSearch->save();

        // Field ProgressiveMotility2
        $this->ProgressiveMotility2->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->save();

        // Field NonProgrssiveMotile2
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->save();

        // Field Immotile2
        $this->Immotile2->AdvancedSearch->SearchValue = @$filter["x_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchOperator = @$filter["z_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchCondition = @$filter["v_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchValue2 = @$filter["y_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile2"];
        $this->Immotile2->AdvancedSearch->save();

        // Field TotalProgrssiveMotile2
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->save();

        // Field IssuedBy
        $this->IssuedBy->AdvancedSearch->SearchValue = @$filter["x_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchOperator = @$filter["z_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchCondition = @$filter["v_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchValue2 = @$filter["y_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchOperator2 = @$filter["w_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->save();

        // Field IssuedTo
        $this->IssuedTo->AdvancedSearch->SearchValue = @$filter["x_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchOperator = @$filter["z_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchCondition = @$filter["v_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchValue2 = @$filter["y_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchOperator2 = @$filter["w_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->save();

        // Field PaID
        $this->PaID->AdvancedSearch->SearchValue = @$filter["x_PaID"];
        $this->PaID->AdvancedSearch->SearchOperator = @$filter["z_PaID"];
        $this->PaID->AdvancedSearch->SearchCondition = @$filter["v_PaID"];
        $this->PaID->AdvancedSearch->SearchValue2 = @$filter["y_PaID"];
        $this->PaID->AdvancedSearch->SearchOperator2 = @$filter["w_PaID"];
        $this->PaID->AdvancedSearch->save();

        // Field PaName
        $this->PaName->AdvancedSearch->SearchValue = @$filter["x_PaName"];
        $this->PaName->AdvancedSearch->SearchOperator = @$filter["z_PaName"];
        $this->PaName->AdvancedSearch->SearchCondition = @$filter["v_PaName"];
        $this->PaName->AdvancedSearch->SearchValue2 = @$filter["y_PaName"];
        $this->PaName->AdvancedSearch->SearchOperator2 = @$filter["w_PaName"];
        $this->PaName->AdvancedSearch->save();

        // Field PaMobile
        $this->PaMobile->AdvancedSearch->SearchValue = @$filter["x_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchOperator = @$filter["z_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchCondition = @$filter["v_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchValue2 = @$filter["y_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchOperator2 = @$filter["w_PaMobile"];
        $this->PaMobile->AdvancedSearch->save();

        // Field PartnerID
        $this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
        $this->PartnerID->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field PartnerMobile
        $this->PartnerMobile->AdvancedSearch->SearchValue = @$filter["x_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator = @$filter["z_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchCondition = @$filter["v_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchValue2 = @$filter["y_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->save();

        // Field MACS
        $this->MACS->AdvancedSearch->SearchValue = @$filter["x_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator = @$filter["z_MACS"];
        $this->MACS->AdvancedSearch->SearchCondition = @$filter["v_MACS"];
        $this->MACS->AdvancedSearch->SearchValue2 = @$filter["y_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator2 = @$filter["w_MACS"];
        $this->MACS->AdvancedSearch->save();

        // Field PREG_TEST_DATE
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue = @$filter["x_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator = @$filter["z_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchCondition = @$filter["v_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 = @$filter["y_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator2 = @$filter["w_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->save();

        // Field SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->save();

        // Field IMSC_1
        $this->IMSC_1->AdvancedSearch->SearchValue = @$filter["x_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator = @$filter["z_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchCondition = @$filter["v_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->save();

        // Field IMSC_2
        $this->IMSC_2->AdvancedSearch->SearchValue = @$filter["x_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator = @$filter["z_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchCondition = @$filter["v_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->save();

        // Field LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = @$filter["x_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator = @$filter["z_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchCondition = @$filter["v_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 = @$filter["y_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator2 = @$filter["w_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->save();

        // Field IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = @$filter["x_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator = @$filter["z_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchCondition = @$filter["v_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 = @$filter["y_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->save();

        // Field TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->save();

        // Field COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = @$filter["x_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save();

        // Field TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RequestDr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RequestSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollectionType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollectionMethod, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medicationused, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DifficultiesinCollection, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Timeofcollection, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Timeofexamination, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Appearance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Homogenosity, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CompleteSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Liquefactiontime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Normal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Headdefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MidpieceDefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TailDefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NormalProgMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ImmatureForms, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Leucocytes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Agglutination, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Debris, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Diagnosis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Observations, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Signature, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SemenOrgin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DonorBloodgroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Location, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Color, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DoneBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abstinence, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcessedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminationTime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminationBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Big, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medium, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Small, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoHalo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fragmented, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonFragmented, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DFI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IsueBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IssuedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IssuedTo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaMobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerMobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MACS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LIQUIFACTION_STORAGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUI_PREP_METHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_TRIGGER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTION_TO_PREPARATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $arKeywords, $type);
        return $where;
    }

    // Build basic search SQL
    protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
    {
        $defCond = ($type == "OR") ? "OR" : "AND";
        $arSql = []; // Array for SQL parts
        $arCond = []; // Array for search conditions
        $cnt = count($arKeywords);
        $j = 0; // Number of SQL parts
        for ($i = 0; $i < $cnt; $i++) {
            $keyword = $arKeywords[$i];
            $keyword = trim($keyword);
            if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
                $keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
                $ar = explode("\\", $keyword);
            } else {
                $ar = [$keyword];
            }
            foreach ($ar as $keyword) {
                if ($keyword != "") {
                    $wrk = "";
                    if ($keyword == "OR" && $type == "") {
                        if ($j > 0) {
                            $arCond[$j - 1] = "OR";
                        }
                    } elseif ($keyword == Config("NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NULL";
                    } elseif ($keyword == Config("NOT_NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NOT NULL";
                    } elseif ($fld->IsVirtual && $fld->Visible) {
                        $wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    } elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
                        $wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    }
                    if ($wrk != "") {
                        $arSql[$j] = $wrk;
                        $arCond[$j] = $defCond;
                        $j += 1;
                    }
                }
            }
        }
        $cnt = count($arSql);
        $quoted = false;
        $sql = "";
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt - 1; $i++) {
                if ($arCond[$i] == "OR") {
                    if (!$quoted) {
                        $sql .= "(";
                    }
                    $quoted = true;
                }
                $sql .= $arSql[$i];
                if ($quoted && $arCond[$i] != "OR") {
                    $sql .= ")";
                    $quoted = false;
                }
                $sql .= " " . $arCond[$i] . " ";
            }
            $sql .= $arSql[$cnt - 1];
            if ($quoted) {
                $sql .= ")";
            }
        }
        if ($sql != "") {
            if ($where != "") {
                $where .= " OR ";
            }
            $where .= "(" . $sql . ")";
        }
    }

    // Return basic search WHERE clause based on search keyword and type
    protected function basicSearchWhere($default = false)
    {
        global $Security;
        $searchStr = "";
        $searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
        $searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

        // Get search SQL
        if ($searchKeyword != "") {
            $ar = $this->BasicSearch->keywordList($default);
            // Search keyword in any fields
            if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
                foreach ($ar as $keyword) {
                    if ($keyword != "") {
                        if ($searchStr != "") {
                            $searchStr .= " " . $searchType . " ";
                        }
                        $searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
                    }
                }
            } else {
                $searchStr = $this->basicSearchSql($ar, $searchType);
            }
            if (!$default && in_array($this->Command, ["", "reset", "resetall"])) {
                $this->Command = "search";
            }
        }
        if (!$default && $this->Command == "search") {
            $this->BasicSearch->setKeyword($searchKeyword);
            $this->BasicSearch->setType($searchType);
        }
        return $searchStr;
    }

    // Check if search parm exists
    protected function checkSearchParms()
    {
        // Check basic search
        if ($this->BasicSearch->issetSession()) {
            return true;
        }
        return false;
    }

    // Clear all search parameters
    protected function resetSearchParms()
    {
        // Clear search WHERE clause
        $this->SearchWhere = "";
        $this->setSearchWhere($this->SearchWhere);

        // Clear basic search parameters
        $this->resetBasicSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all basic search parameters
    protected function resetBasicSearchParms()
    {
        $this->BasicSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->RIDNo); // RIDNo
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->HusbandName); // HusbandName
            $this->updateSort($this->RequestDr); // RequestDr
            $this->updateSort($this->CollectionDate); // CollectionDate
            $this->updateSort($this->ResultDate); // ResultDate
            $this->updateSort($this->RequestSample); // RequestSample
            $this->updateSort($this->CollectionType); // CollectionType
            $this->updateSort($this->CollectionMethod); // CollectionMethod
            $this->updateSort($this->Medicationused); // Medicationused
            $this->updateSort($this->DifficultiesinCollection); // DifficultiesinCollection
            $this->updateSort($this->Volume); // Volume
            $this->updateSort($this->pH); // pH
            $this->updateSort($this->Timeofcollection); // Timeofcollection
            $this->updateSort($this->Timeofexamination); // Timeofexamination
            $this->updateSort($this->Concentration); // Concentration
            $this->updateSort($this->Total); // Total
            $this->updateSort($this->ProgressiveMotility); // ProgressiveMotility
            $this->updateSort($this->NonProgrssiveMotile); // NonProgrssiveMotile
            $this->updateSort($this->Immotile); // Immotile
            $this->updateSort($this->TotalProgrssiveMotile); // TotalProgrssiveMotile
            $this->updateSort($this->Appearance); // Appearance
            $this->updateSort($this->Homogenosity); // Homogenosity
            $this->updateSort($this->CompleteSample); // CompleteSample
            $this->updateSort($this->Liquefactiontime); // Liquefactiontime
            $this->updateSort($this->Normal); // Normal
            $this->updateSort($this->Abnormal); // Abnormal
            $this->updateSort($this->Headdefects); // Headdefects
            $this->updateSort($this->MidpieceDefects); // MidpieceDefects
            $this->updateSort($this->TailDefects); // TailDefects
            $this->updateSort($this->NormalProgMotile); // NormalProgMotile
            $this->updateSort($this->ImmatureForms); // ImmatureForms
            $this->updateSort($this->Leucocytes); // Leucocytes
            $this->updateSort($this->Agglutination); // Agglutination
            $this->updateSort($this->Debris); // Debris
            $this->updateSort($this->Signature); // Signature
            $this->updateSort($this->SemenOrgin); // SemenOrgin
            $this->updateSort($this->Donor); // Donor
            $this->updateSort($this->DonorBloodgroup); // DonorBloodgroup
            $this->updateSort($this->Tank); // Tank
            $this->updateSort($this->Location); // Location
            $this->updateSort($this->Volume1); // Volume1
            $this->updateSort($this->Concentration1); // Concentration1
            $this->updateSort($this->Total1); // Total1
            $this->updateSort($this->ProgressiveMotility1); // ProgressiveMotility1
            $this->updateSort($this->NonProgrssiveMotile1); // NonProgrssiveMotile1
            $this->updateSort($this->Immotile1); // Immotile1
            $this->updateSort($this->TotalProgrssiveMotile1); // TotalProgrssiveMotile1
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->Color); // Color
            $this->updateSort($this->DoneBy); // DoneBy
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Abstinence); // Abstinence
            $this->updateSort($this->ProcessedBy); // ProcessedBy
            $this->updateSort($this->InseminationTime); // InseminationTime
            $this->updateSort($this->InseminationBy); // InseminationBy
            $this->updateSort($this->Big); // Big
            $this->updateSort($this->Medium); // Medium
            $this->updateSort($this->Small); // Small
            $this->updateSort($this->NoHalo); // NoHalo
            $this->updateSort($this->Fragmented); // Fragmented
            $this->updateSort($this->NonFragmented); // NonFragmented
            $this->updateSort($this->DFI); // DFI
            $this->updateSort($this->IsueBy); // IsueBy
            $this->updateSort($this->Volume2); // Volume2
            $this->updateSort($this->Concentration2); // Concentration2
            $this->updateSort($this->Total2); // Total2
            $this->updateSort($this->ProgressiveMotility2); // ProgressiveMotility2
            $this->updateSort($this->NonProgrssiveMotile2); // NonProgrssiveMotile2
            $this->updateSort($this->Immotile2); // Immotile2
            $this->updateSort($this->TotalProgrssiveMotile2); // TotalProgrssiveMotile2
            $this->updateSort($this->IssuedBy); // IssuedBy
            $this->updateSort($this->IssuedTo); // IssuedTo
            $this->updateSort($this->PaID); // PaID
            $this->updateSort($this->PaName); // PaName
            $this->updateSort($this->PaMobile); // PaMobile
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->PartnerMobile); // PartnerMobile
            $this->updateSort($this->MACS); // MACS
            $this->updateSort($this->PREG_TEST_DATE); // PREG_TEST_DATE
            $this->updateSort($this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
            $this->updateSort($this->IMSC_1); // IMSC_1
            $this->updateSort($this->IMSC_2); // IMSC_2
            $this->updateSort($this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
            $this->updateSort($this->IUI_PREP_METHOD); // IUI_PREP_METHOD
            $this->updateSort($this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
            $this->updateSort($this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
            $this->updateSort($this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($useDefaultSort) {
                    $orderBy = $this->getSqlOrderBy();
                    $this->setSessionOrderBy($orderBy);
                } else {
                    $this->setSessionOrderBy("");
                }
            }
        }
    }

    // Reset command
    // - cmd=reset (Reset search parameters)
    // - cmd=resetall (Reset search and master/detail parameters)
    // - cmd=resetsort (Reset sort parameters)
    protected function resetCmd()
    {
        // Check if reset command
        if (StartsString("reset", $this->Command)) {
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->RIDNo->setSort("");
                $this->PatientName->setSort("");
                $this->HusbandName->setSort("");
                $this->RequestDr->setSort("");
                $this->CollectionDate->setSort("");
                $this->ResultDate->setSort("");
                $this->RequestSample->setSort("");
                $this->CollectionType->setSort("");
                $this->CollectionMethod->setSort("");
                $this->Medicationused->setSort("");
                $this->DifficultiesinCollection->setSort("");
                $this->Volume->setSort("");
                $this->pH->setSort("");
                $this->Timeofcollection->setSort("");
                $this->Timeofexamination->setSort("");
                $this->Concentration->setSort("");
                $this->Total->setSort("");
                $this->ProgressiveMotility->setSort("");
                $this->NonProgrssiveMotile->setSort("");
                $this->Immotile->setSort("");
                $this->TotalProgrssiveMotile->setSort("");
                $this->Appearance->setSort("");
                $this->Homogenosity->setSort("");
                $this->CompleteSample->setSort("");
                $this->Liquefactiontime->setSort("");
                $this->Normal->setSort("");
                $this->Abnormal->setSort("");
                $this->Headdefects->setSort("");
                $this->MidpieceDefects->setSort("");
                $this->TailDefects->setSort("");
                $this->NormalProgMotile->setSort("");
                $this->ImmatureForms->setSort("");
                $this->Leucocytes->setSort("");
                $this->Agglutination->setSort("");
                $this->Debris->setSort("");
                $this->Diagnosis->setSort("");
                $this->Observations->setSort("");
                $this->Signature->setSort("");
                $this->SemenOrgin->setSort("");
                $this->Donor->setSort("");
                $this->DonorBloodgroup->setSort("");
                $this->Tank->setSort("");
                $this->Location->setSort("");
                $this->Volume1->setSort("");
                $this->Concentration1->setSort("");
                $this->Total1->setSort("");
                $this->ProgressiveMotility1->setSort("");
                $this->NonProgrssiveMotile1->setSort("");
                $this->Immotile1->setSort("");
                $this->TotalProgrssiveMotile1->setSort("");
                $this->TidNo->setSort("");
                $this->Color->setSort("");
                $this->DoneBy->setSort("");
                $this->Method->setSort("");
                $this->Abstinence->setSort("");
                $this->ProcessedBy->setSort("");
                $this->InseminationTime->setSort("");
                $this->InseminationBy->setSort("");
                $this->Big->setSort("");
                $this->Medium->setSort("");
                $this->Small->setSort("");
                $this->NoHalo->setSort("");
                $this->Fragmented->setSort("");
                $this->NonFragmented->setSort("");
                $this->DFI->setSort("");
                $this->IsueBy->setSort("");
                $this->Volume2->setSort("");
                $this->Concentration2->setSort("");
                $this->Total2->setSort("");
                $this->ProgressiveMotility2->setSort("");
                $this->NonProgrssiveMotile2->setSort("");
                $this->Immotile2->setSort("");
                $this->TotalProgrssiveMotile2->setSort("");
                $this->IssuedBy->setSort("");
                $this->IssuedTo->setSort("");
                $this->PaID->setSort("");
                $this->PaName->setSort("");
                $this->PaMobile->setSort("");
                $this->PartnerID->setSort("");
                $this->PartnerName->setSort("");
                $this->PartnerMobile->setSort("");
                $this->MACS->setSort("");
                $this->PREG_TEST_DATE->setSort("");
                $this->SPECIFIC_PROBLEMS->setSort("");
                $this->IMSC_1->setSort("");
                $this->IMSC_2->setSort("");
                $this->LIQUIFACTION_STORAGE->setSort("");
                $this->IUI_PREP_METHOD->setSort("");
                $this->TIME_FROM_TRIGGER->setSort("");
                $this->COLLECTION_TO_PREPARATION->setSort("");
                $this->TIME_FROM_PREP_TO_INSEM->setSort("");
            }

            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Set up list options
    protected function setupListOptions()
    {
        global $Security, $Language;

        // Add group option item
        $item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = false;
        $item->Visible = false;

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = false;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = false;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = false;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $this->setupListOptionsExt();
        $item = $this->ListOptions[$this->ListOptions->GroupOptionName];
        $item->Visible = $this->ListOptions->groupOptionVisible();
    }

    // Render list options
    public function renderListOptions()
    {
        global $Security, $Language, $CurrentForm;
        $this->ListOptions->loadDefault();

        // Call ListOptions_Rendering event
        $this->listOptionsRendering();
        $pageUrl = $this->pageUrl();
        if ($this->CurrentMode == "view") { // View mode
        } // End View mode

        // Set up list action buttons
        $opt = $this->ListOptions["listactions"];
        if ($opt && !$this->isExport() && !$this->CurrentAction) {
            $body = "";
            $links = [];
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
                    $action = $listaction->Action;
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
                    $links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a></li>";
                    if (count($links) == 1) { // Single button
                        $body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a>";
                    }
                }
            }
            if (count($links) > 1) { // More than one buttons, use dropdown
                $body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
                $content = "";
                foreach ($links as $link) {
                    $content .= "<li>" . $link . "</li>";
                }
                $body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">" . $content . "</ul>";
                $body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
            }
            if (count($links) > 0) {
                $opt->Body = $body;
                $opt->Visible = true;
            }
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = false;
            $option->UseButtonGroup = true;
            //$option->ButtonClass = ""; // Class for button group
            $item = &$option->add($option->GroupOptionName);
            $item->Body = "";
            $item->Visible = false;
        }
        $options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

        // Filter button
        $item = &$this->FilterOptions->add("savecurrentfilter");
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_semenanalysislistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_semenanalysislistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
        $item->Visible = true;
        $this->FilterOptions->UseDropDownButton = true;
        $this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
        $this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

        // Add group option item
        $item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];
        // Set up list action buttons
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE) {
                $item = &$option->add("custom_" . $listaction->Action);
                $caption = $listaction->Caption;
                $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_semenanalysislist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
                $item->Visible = $listaction->Allow;
            }
        }

        // Hide grid edit and other options
        if ($this->TotalRecords <= 0) {
            $option = $options["addedit"];
            $item = $option["gridedit"];
            if ($item) {
                $item->Visible = false;
            }
            $option = $options["action"];
            $option->hideAllOptions();
        }
    }

    // Process list action
    protected function processListAction()
    {
        global $Language, $Security;
        $userlist = "";
        $user = "";
        $filter = $this->getFilterFromRecordKeys();
        $userAction = Post("useraction", "");
        if ($filter != "" && $userAction != "") {
            // Check permission first
            $actionCaption = $userAction;
            if (array_key_exists($userAction, $this->ListActions->Items)) {
                $actionCaption = $this->ListActions[$userAction]->Caption;
                if (!$this->ListActions[$userAction]->Allow) {
                    $errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
                    if (Post("ajax") == $userAction) { // Ajax
                        echo "<p class=\"text-danger\">" . $errmsg . "</p>";
                        return true;
                    } else {
                        $this->setFailureMessage($errmsg);
                        return false;
                    }
                }
            }
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = LoadRecordset($sql, $conn, \PDO::FETCH_ASSOC);
            $this->CurrentAction = $userAction;

            // Call row action event
            if ($rs) {
                $conn->beginTransaction();
                $this->SelectedCount = $rs->recordCount();
                $this->SelectedIndex = 0;
                while (!$rs->EOF) {
                    $this->SelectedIndex++;
                    $row = $rs->fields;
                    $processed = $this->rowCustomAction($userAction, $row);
                    if (!$processed) {
                        break;
                    }
                    $rs->moveNext();
                }
                if ($processed) {
                    $conn->commit(); // Commit the changes
                    if ($this->getSuccessMessage() == "" && !ob_get_length()) { // No output
                        $this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
                    }
                } else {
                    $conn->rollback(); // Rollback changes

                    // Set up error message
                    if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                        // Use the message, do nothing
                    } elseif ($this->CancelMessage != "") {
                        $this->setFailureMessage($this->CancelMessage);
                        $this->CancelMessage = "";
                    } else {
                        $this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
                    }
                }
            }
            if ($rs) {
                $rs->close();
            }
            $this->CurrentAction = ""; // Clear action
            if (Post("ajax") == $userAction) { // Ajax
                if ($this->getSuccessMessage() != "") {
                    echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
                    $this->clearSuccessMessage(); // Clear message
                }
                if ($this->getFailureMessage() != "") {
                    echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
                    $this->clearFailureMessage(); // Clear message
                }
                return true;
            }
        }
        return false; // Not ajax request
    }

    // Set up list options (extended codes)
    protected function setupListOptionsExt()
    {
    }

    // Render list options (extended codes)
    protected function renderListOptionsExt()
    {
    }

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
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
        $this->ViewUrl = $this->getViewUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->InlineEditUrl = $this->getInlineEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->InlineCopyUrl = $this->getInlineCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

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

    // Set up search/sort options
    protected function setupSearchSortOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_semenanalysislistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Button group for search
        $this->SearchOptions->UseDropDownButton = false;
        $this->SearchOptions->UseButtonGroup = true;
        $this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

        // Add group option item
        $item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide search options
        if ($this->isExport() || $this->CurrentAction) {
            $this->SearchOptions->hideAllOptions();
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
        $Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, true);
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

    // ListOptions Load event
    public function listOptionsLoad()
    {
        // Example:
        //$opt = &$this->ListOptions->Add("new");
        //$opt->Header = "xxx";
        //$opt->OnLeft = true; // Link on left
        //$opt->MoveTo(0); // Move to first column
    }

    // ListOptions Rendering event
    public function listOptionsRendering()
    {
        //Container("DetailTableGrid")->DetailAdd = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailEdit = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailView = (...condition...); // Set to true or false conditionally
    }

    // ListOptions Rendered event
    public function listOptionsRendered()
    {
        // Example:
        //$this->ListOptions["new"]->Body = "xxx";
    }

    // Row Custom Action event
    public function rowCustomAction($action, $row)
    {
        // Return false to abort
        return true;
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

    // Page Importing event
    public function pageImporting($reader, &$options)
    {
        //var_dump($reader); // Import data reader
        //var_dump($options); // Show all options for importing
        //return false; // Return false to skip import
        return true;
    }

    // Row Import event
    public function rowImport(&$row, $cnt)
    {
        //Log($cnt); // Import record count
        //var_dump($row); // Import row
        //return false; // Return false to skip import
        return true;
    }

    // Page Imported event
    public function pageImported($reader, $results)
    {
        //var_dump($reader); // Import data reader
        //var_dump($results); // Import results
    }
}

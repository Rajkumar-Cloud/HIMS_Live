<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientServicesList extends PatientServices
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_services';

    // Page object name
    public $PageObjName = "PatientServicesList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fpatient_serviceslist";
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

        // Table object (patient_services)
        if (!isset($GLOBALS["patient_services"]) || get_class($GLOBALS["patient_services"]) == PROJECT_NAMESPACE . "patient_services") {
            $GLOBALS["patient_services"] = &$this;
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
        $this->AddUrl = "PatientServicesAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientServicesDelete";
        $this->MultiUpdateUrl = "PatientServicesUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_services');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_serviceslistsrch";

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
                $doc = new $class(Container("patient_services"));
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
        $this->Reception->setVisibility();
        $this->PatID->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->Services->setVisibility();
        $this->Unit->setVisibility();
        $this->amount->setVisibility();
        $this->Quantity->setVisibility();
        $this->Discount->setVisibility();
        $this->SubTotal->setVisibility();
        $this->description->Visible = false;
        $this->patient_type->setVisibility();
        $this->charged_date->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->Aid->setVisibility();
        $this->Vid->setVisibility();
        $this->DrID->setVisibility();
        $this->DrCODE->setVisibility();
        $this->DrName->setVisibility();
        $this->Department->setVisibility();
        $this->DrSharePres->setVisibility();
        $this->HospSharePres->setVisibility();
        $this->DrShareAmount->setVisibility();
        $this->HospShareAmount->setVisibility();
        $this->DrShareSettiledAmount->setVisibility();
        $this->DrShareSettledId->setVisibility();
        $this->DrShareSettiledStatus->setVisibility();
        $this->invoiceId->setVisibility();
        $this->invoiceAmount->setVisibility();
        $this->invoiceStatus->setVisibility();
        $this->modeOfPayment->setVisibility();
        $this->HospID->setVisibility();
        $this->RIDNO->setVisibility();
        $this->TidNo->setVisibility();
        $this->DiscountCategory->setVisibility();
        $this->sid->setVisibility();
        $this->ItemCode->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->DEptCd->setVisibility();
        $this->ProfCd->setVisibility();
        $this->LabReport->Visible = false;
        $this->Comments->setVisibility();
        $this->Method->setVisibility();
        $this->Specimen->setVisibility();
        $this->Abnormal->setVisibility();
        $this->RefValue->Visible = false;
        $this->TestUnit->setVisibility();
        $this->LOWHIGH->setVisibility();
        $this->Branch->setVisibility();
        $this->Dispatch->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->GraphPath->setVisibility();
        $this->MachineCD->setVisibility();
        $this->TestCancel->setVisibility();
        $this->OutSource->setVisibility();
        $this->Printed->setVisibility();
        $this->PrintBy->setVisibility();
        $this->PrintDate->setVisibility();
        $this->BillingDate->setVisibility();
        $this->BilledBy->setVisibility();
        $this->Resulted->setVisibility();
        $this->ResultDate->setVisibility();
        $this->ResultedBy->setVisibility();
        $this->SampleDate->setVisibility();
        $this->SampleUser->setVisibility();
        $this->Sampled->setVisibility();
        $this->ReceivedDate->setVisibility();
        $this->ReceivedUser->setVisibility();
        $this->Recevied->setVisibility();
        $this->DeptRecvDate->setVisibility();
        $this->DeptRecvUser->setVisibility();
        $this->DeptRecived->setVisibility();
        $this->SAuthDate->setVisibility();
        $this->SAuthBy->setVisibility();
        $this->SAuthendicate->setVisibility();
        $this->AuthDate->setVisibility();
        $this->AuthBy->setVisibility();
        $this->Authencate->setVisibility();
        $this->EditDate->setVisibility();
        $this->EditBy->setVisibility();
        $this->Editted->setVisibility();
        $this->PatientId->setVisibility();
        $this->Mobile->setVisibility();
        $this->CId->setVisibility();
        $this->Order->setVisibility();
        $this->Form->Visible = false;
        $this->ResType->setVisibility();
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->Visible = false;
        $this->Inactive->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->setVisibility();
        $this->Repeated->setVisibility();
        $this->RepeatedBy->setVisibility();
        $this->RepeatedDate->setVisibility();
        $this->serviceID->setVisibility();
        $this->Service_Type->setVisibility();
        $this->Service_Department->setVisibility();
        $this->RequestNo->setVisibility();
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
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->Services->AdvancedSearch->toJson(), ","); // Field Services
        $filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
        $filterList = Concat($filterList, $this->amount->AdvancedSearch->toJson(), ","); // Field amount
        $filterList = Concat($filterList, $this->Quantity->AdvancedSearch->toJson(), ","); // Field Quantity
        $filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
        $filterList = Concat($filterList, $this->SubTotal->AdvancedSearch->toJson(), ","); // Field SubTotal
        $filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
        $filterList = Concat($filterList, $this->patient_type->AdvancedSearch->toJson(), ","); // Field patient_type
        $filterList = Concat($filterList, $this->charged_date->AdvancedSearch->toJson(), ","); // Field charged_date
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->Aid->AdvancedSearch->toJson(), ","); // Field Aid
        $filterList = Concat($filterList, $this->Vid->AdvancedSearch->toJson(), ","); // Field Vid
        $filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
        $filterList = Concat($filterList, $this->DrCODE->AdvancedSearch->toJson(), ","); // Field DrCODE
        $filterList = Concat($filterList, $this->DrName->AdvancedSearch->toJson(), ","); // Field DrName
        $filterList = Concat($filterList, $this->Department->AdvancedSearch->toJson(), ","); // Field Department
        $filterList = Concat($filterList, $this->DrSharePres->AdvancedSearch->toJson(), ","); // Field DrSharePres
        $filterList = Concat($filterList, $this->HospSharePres->AdvancedSearch->toJson(), ","); // Field HospSharePres
        $filterList = Concat($filterList, $this->DrShareAmount->AdvancedSearch->toJson(), ","); // Field DrShareAmount
        $filterList = Concat($filterList, $this->HospShareAmount->AdvancedSearch->toJson(), ","); // Field HospShareAmount
        $filterList = Concat($filterList, $this->DrShareSettiledAmount->AdvancedSearch->toJson(), ","); // Field DrShareSettiledAmount
        $filterList = Concat($filterList, $this->DrShareSettledId->AdvancedSearch->toJson(), ","); // Field DrShareSettledId
        $filterList = Concat($filterList, $this->DrShareSettiledStatus->AdvancedSearch->toJson(), ","); // Field DrShareSettiledStatus
        $filterList = Concat($filterList, $this->invoiceId->AdvancedSearch->toJson(), ","); // Field invoiceId
        $filterList = Concat($filterList, $this->invoiceAmount->AdvancedSearch->toJson(), ","); // Field invoiceAmount
        $filterList = Concat($filterList, $this->invoiceStatus->AdvancedSearch->toJson(), ","); // Field invoiceStatus
        $filterList = Concat($filterList, $this->modeOfPayment->AdvancedSearch->toJson(), ","); // Field modeOfPayment
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->DiscountCategory->AdvancedSearch->toJson(), ","); // Field DiscountCategory
        $filterList = Concat($filterList, $this->sid->AdvancedSearch->toJson(), ","); // Field sid
        $filterList = Concat($filterList, $this->ItemCode->AdvancedSearch->toJson(), ","); // Field ItemCode
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->DEptCd->AdvancedSearch->toJson(), ","); // Field DEptCd
        $filterList = Concat($filterList, $this->ProfCd->AdvancedSearch->toJson(), ","); // Field ProfCd
        $filterList = Concat($filterList, $this->LabReport->AdvancedSearch->toJson(), ","); // Field LabReport
        $filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Specimen->AdvancedSearch->toJson(), ","); // Field Specimen
        $filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->TestUnit->AdvancedSearch->toJson(), ","); // Field TestUnit
        $filterList = Concat($filterList, $this->LOWHIGH->AdvancedSearch->toJson(), ","); // Field LOWHIGH
        $filterList = Concat($filterList, $this->Branch->AdvancedSearch->toJson(), ","); // Field Branch
        $filterList = Concat($filterList, $this->Dispatch->AdvancedSearch->toJson(), ","); // Field Dispatch
        $filterList = Concat($filterList, $this->Pic1->AdvancedSearch->toJson(), ","); // Field Pic1
        $filterList = Concat($filterList, $this->Pic2->AdvancedSearch->toJson(), ","); // Field Pic2
        $filterList = Concat($filterList, $this->GraphPath->AdvancedSearch->toJson(), ","); // Field GraphPath
        $filterList = Concat($filterList, $this->MachineCD->AdvancedSearch->toJson(), ","); // Field MachineCD
        $filterList = Concat($filterList, $this->TestCancel->AdvancedSearch->toJson(), ","); // Field TestCancel
        $filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
        $filterList = Concat($filterList, $this->Printed->AdvancedSearch->toJson(), ","); // Field Printed
        $filterList = Concat($filterList, $this->PrintBy->AdvancedSearch->toJson(), ","); // Field PrintBy
        $filterList = Concat($filterList, $this->PrintDate->AdvancedSearch->toJson(), ","); // Field PrintDate
        $filterList = Concat($filterList, $this->BillingDate->AdvancedSearch->toJson(), ","); // Field BillingDate
        $filterList = Concat($filterList, $this->BilledBy->AdvancedSearch->toJson(), ","); // Field BilledBy
        $filterList = Concat($filterList, $this->Resulted->AdvancedSearch->toJson(), ","); // Field Resulted
        $filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
        $filterList = Concat($filterList, $this->ResultedBy->AdvancedSearch->toJson(), ","); // Field ResultedBy
        $filterList = Concat($filterList, $this->SampleDate->AdvancedSearch->toJson(), ","); // Field SampleDate
        $filterList = Concat($filterList, $this->SampleUser->AdvancedSearch->toJson(), ","); // Field SampleUser
        $filterList = Concat($filterList, $this->Sampled->AdvancedSearch->toJson(), ","); // Field Sampled
        $filterList = Concat($filterList, $this->ReceivedDate->AdvancedSearch->toJson(), ","); // Field ReceivedDate
        $filterList = Concat($filterList, $this->ReceivedUser->AdvancedSearch->toJson(), ","); // Field ReceivedUser
        $filterList = Concat($filterList, $this->Recevied->AdvancedSearch->toJson(), ","); // Field Recevied
        $filterList = Concat($filterList, $this->DeptRecvDate->AdvancedSearch->toJson(), ","); // Field DeptRecvDate
        $filterList = Concat($filterList, $this->DeptRecvUser->AdvancedSearch->toJson(), ","); // Field DeptRecvUser
        $filterList = Concat($filterList, $this->DeptRecived->AdvancedSearch->toJson(), ","); // Field DeptRecived
        $filterList = Concat($filterList, $this->SAuthDate->AdvancedSearch->toJson(), ","); // Field SAuthDate
        $filterList = Concat($filterList, $this->SAuthBy->AdvancedSearch->toJson(), ","); // Field SAuthBy
        $filterList = Concat($filterList, $this->SAuthendicate->AdvancedSearch->toJson(), ","); // Field SAuthendicate
        $filterList = Concat($filterList, $this->AuthDate->AdvancedSearch->toJson(), ","); // Field AuthDate
        $filterList = Concat($filterList, $this->AuthBy->AdvancedSearch->toJson(), ","); // Field AuthBy
        $filterList = Concat($filterList, $this->Authencate->AdvancedSearch->toJson(), ","); // Field Authencate
        $filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
        $filterList = Concat($filterList, $this->EditBy->AdvancedSearch->toJson(), ","); // Field EditBy
        $filterList = Concat($filterList, $this->Editted->AdvancedSearch->toJson(), ","); // Field Editted
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
        $filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
        $filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
        $filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
        $filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
        $filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
        $filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
        $filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
        $filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
        $filterList = Concat($filterList, $this->TestType->AdvancedSearch->toJson(), ","); // Field TestType
        $filterList = Concat($filterList, $this->Repeated->AdvancedSearch->toJson(), ","); // Field Repeated
        $filterList = Concat($filterList, $this->RepeatedBy->AdvancedSearch->toJson(), ","); // Field RepeatedBy
        $filterList = Concat($filterList, $this->RepeatedDate->AdvancedSearch->toJson(), ","); // Field RepeatedDate
        $filterList = Concat($filterList, $this->serviceID->AdvancedSearch->toJson(), ","); // Field serviceID
        $filterList = Concat($filterList, $this->Service_Type->AdvancedSearch->toJson(), ","); // Field Service_Type
        $filterList = Concat($filterList, $this->Service_Department->AdvancedSearch->toJson(), ","); // Field Service_Department
        $filterList = Concat($filterList, $this->RequestNo->AdvancedSearch->toJson(), ","); // Field RequestNo
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_serviceslistsrch", $filters);
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

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field Services
        $this->Services->AdvancedSearch->SearchValue = @$filter["x_Services"];
        $this->Services->AdvancedSearch->SearchOperator = @$filter["z_Services"];
        $this->Services->AdvancedSearch->SearchCondition = @$filter["v_Services"];
        $this->Services->AdvancedSearch->SearchValue2 = @$filter["y_Services"];
        $this->Services->AdvancedSearch->SearchOperator2 = @$filter["w_Services"];
        $this->Services->AdvancedSearch->save();

        // Field Unit
        $this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
        $this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
        $this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
        $this->Unit->AdvancedSearch->save();

        // Field amount
        $this->amount->AdvancedSearch->SearchValue = @$filter["x_amount"];
        $this->amount->AdvancedSearch->SearchOperator = @$filter["z_amount"];
        $this->amount->AdvancedSearch->SearchCondition = @$filter["v_amount"];
        $this->amount->AdvancedSearch->SearchValue2 = @$filter["y_amount"];
        $this->amount->AdvancedSearch->SearchOperator2 = @$filter["w_amount"];
        $this->amount->AdvancedSearch->save();

        // Field Quantity
        $this->Quantity->AdvancedSearch->SearchValue = @$filter["x_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator = @$filter["z_Quantity"];
        $this->Quantity->AdvancedSearch->SearchCondition = @$filter["v_Quantity"];
        $this->Quantity->AdvancedSearch->SearchValue2 = @$filter["y_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator2 = @$filter["w_Quantity"];
        $this->Quantity->AdvancedSearch->save();

        // Field Discount
        $this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
        $this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
        $this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
        $this->Discount->AdvancedSearch->save();

        // Field SubTotal
        $this->SubTotal->AdvancedSearch->SearchValue = @$filter["x_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchOperator = @$filter["z_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchCondition = @$filter["v_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchValue2 = @$filter["y_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchOperator2 = @$filter["w_SubTotal"];
        $this->SubTotal->AdvancedSearch->save();

        // Field description
        $this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
        $this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
        $this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
        $this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
        $this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
        $this->description->AdvancedSearch->save();

        // Field patient_type
        $this->patient_type->AdvancedSearch->SearchValue = @$filter["x_patient_type"];
        $this->patient_type->AdvancedSearch->SearchOperator = @$filter["z_patient_type"];
        $this->patient_type->AdvancedSearch->SearchCondition = @$filter["v_patient_type"];
        $this->patient_type->AdvancedSearch->SearchValue2 = @$filter["y_patient_type"];
        $this->patient_type->AdvancedSearch->SearchOperator2 = @$filter["w_patient_type"];
        $this->patient_type->AdvancedSearch->save();

        // Field charged_date
        $this->charged_date->AdvancedSearch->SearchValue = @$filter["x_charged_date"];
        $this->charged_date->AdvancedSearch->SearchOperator = @$filter["z_charged_date"];
        $this->charged_date->AdvancedSearch->SearchCondition = @$filter["v_charged_date"];
        $this->charged_date->AdvancedSearch->SearchValue2 = @$filter["y_charged_date"];
        $this->charged_date->AdvancedSearch->SearchOperator2 = @$filter["w_charged_date"];
        $this->charged_date->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

        // Field createdby
        $this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
        $this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
        $this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
        $this->createdby->AdvancedSearch->save();

        // Field createddatetime
        $this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
        $this->createddatetime->AdvancedSearch->save();

        // Field modifiedby
        $this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
        $this->modifiedby->AdvancedSearch->save();

        // Field modifieddatetime
        $this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->save();

        // Field Aid
        $this->Aid->AdvancedSearch->SearchValue = @$filter["x_Aid"];
        $this->Aid->AdvancedSearch->SearchOperator = @$filter["z_Aid"];
        $this->Aid->AdvancedSearch->SearchCondition = @$filter["v_Aid"];
        $this->Aid->AdvancedSearch->SearchValue2 = @$filter["y_Aid"];
        $this->Aid->AdvancedSearch->SearchOperator2 = @$filter["w_Aid"];
        $this->Aid->AdvancedSearch->save();

        // Field Vid
        $this->Vid->AdvancedSearch->SearchValue = @$filter["x_Vid"];
        $this->Vid->AdvancedSearch->SearchOperator = @$filter["z_Vid"];
        $this->Vid->AdvancedSearch->SearchCondition = @$filter["v_Vid"];
        $this->Vid->AdvancedSearch->SearchValue2 = @$filter["y_Vid"];
        $this->Vid->AdvancedSearch->SearchOperator2 = @$filter["w_Vid"];
        $this->Vid->AdvancedSearch->save();

        // Field DrID
        $this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
        $this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
        $this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
        $this->DrID->AdvancedSearch->save();

        // Field DrCODE
        $this->DrCODE->AdvancedSearch->SearchValue = @$filter["x_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchOperator = @$filter["z_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchCondition = @$filter["v_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchValue2 = @$filter["y_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchOperator2 = @$filter["w_DrCODE"];
        $this->DrCODE->AdvancedSearch->save();

        // Field DrName
        $this->DrName->AdvancedSearch->SearchValue = @$filter["x_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator = @$filter["z_DrName"];
        $this->DrName->AdvancedSearch->SearchCondition = @$filter["v_DrName"];
        $this->DrName->AdvancedSearch->SearchValue2 = @$filter["y_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator2 = @$filter["w_DrName"];
        $this->DrName->AdvancedSearch->save();

        // Field Department
        $this->Department->AdvancedSearch->SearchValue = @$filter["x_Department"];
        $this->Department->AdvancedSearch->SearchOperator = @$filter["z_Department"];
        $this->Department->AdvancedSearch->SearchCondition = @$filter["v_Department"];
        $this->Department->AdvancedSearch->SearchValue2 = @$filter["y_Department"];
        $this->Department->AdvancedSearch->SearchOperator2 = @$filter["w_Department"];
        $this->Department->AdvancedSearch->save();

        // Field DrSharePres
        $this->DrSharePres->AdvancedSearch->SearchValue = @$filter["x_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchOperator = @$filter["z_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchCondition = @$filter["v_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchValue2 = @$filter["y_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->save();

        // Field HospSharePres
        $this->HospSharePres->AdvancedSearch->SearchValue = @$filter["x_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchOperator = @$filter["z_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchCondition = @$filter["v_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchValue2 = @$filter["y_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->save();

        // Field DrShareAmount
        $this->DrShareAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->save();

        // Field HospShareAmount
        $this->HospShareAmount->AdvancedSearch->SearchValue = @$filter["x_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator = @$filter["z_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchCondition = @$filter["v_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->save();

        // Field DrShareSettiledAmount
        $this->DrShareSettiledAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->save();

        // Field DrShareSettledId
        $this->DrShareSettledId->AdvancedSearch->SearchValue = @$filter["x_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->save();

        // Field DrShareSettiledStatus
        $this->DrShareSettiledStatus->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->save();

        // Field invoiceId
        $this->invoiceId->AdvancedSearch->SearchValue = @$filter["x_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchOperator = @$filter["z_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchCondition = @$filter["v_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchValue2 = @$filter["y_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceId"];
        $this->invoiceId->AdvancedSearch->save();

        // Field invoiceAmount
        $this->invoiceAmount->AdvancedSearch->SearchValue = @$filter["x_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchOperator = @$filter["z_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchCondition = @$filter["v_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchValue2 = @$filter["y_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->save();

        // Field invoiceStatus
        $this->invoiceStatus->AdvancedSearch->SearchValue = @$filter["x_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchOperator = @$filter["z_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchCondition = @$filter["v_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchValue2 = @$filter["y_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->save();

        // Field modeOfPayment
        $this->modeOfPayment->AdvancedSearch->SearchValue = @$filter["x_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchOperator = @$filter["z_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchCondition = @$filter["v_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchValue2 = @$filter["y_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchOperator2 = @$filter["w_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field DiscountCategory
        $this->DiscountCategory->AdvancedSearch->SearchValue = @$filter["x_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchOperator = @$filter["z_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchCondition = @$filter["v_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchValue2 = @$filter["y_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->save();

        // Field sid
        $this->sid->AdvancedSearch->SearchValue = @$filter["x_sid"];
        $this->sid->AdvancedSearch->SearchOperator = @$filter["z_sid"];
        $this->sid->AdvancedSearch->SearchCondition = @$filter["v_sid"];
        $this->sid->AdvancedSearch->SearchValue2 = @$filter["y_sid"];
        $this->sid->AdvancedSearch->SearchOperator2 = @$filter["w_sid"];
        $this->sid->AdvancedSearch->save();

        // Field ItemCode
        $this->ItemCode->AdvancedSearch->SearchValue = @$filter["x_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchOperator = @$filter["z_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchCondition = @$filter["v_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchValue2 = @$filter["y_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchOperator2 = @$filter["w_ItemCode"];
        $this->ItemCode->AdvancedSearch->save();

        // Field TestSubCd
        $this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->save();

        // Field DEptCd
        $this->DEptCd->AdvancedSearch->SearchValue = @$filter["x_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator = @$filter["z_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchCondition = @$filter["v_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchValue2 = @$filter["y_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DEptCd"];
        $this->DEptCd->AdvancedSearch->save();

        // Field ProfCd
        $this->ProfCd->AdvancedSearch->SearchValue = @$filter["x_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator = @$filter["z_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchCondition = @$filter["v_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchValue2 = @$filter["y_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator2 = @$filter["w_ProfCd"];
        $this->ProfCd->AdvancedSearch->save();

        // Field LabReport
        $this->LabReport->AdvancedSearch->SearchValue = @$filter["x_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator = @$filter["z_LabReport"];
        $this->LabReport->AdvancedSearch->SearchCondition = @$filter["v_LabReport"];
        $this->LabReport->AdvancedSearch->SearchValue2 = @$filter["y_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator2 = @$filter["w_LabReport"];
        $this->LabReport->AdvancedSearch->save();

        // Field Comments
        $this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
        $this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
        $this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
        $this->Comments->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Specimen
        $this->Specimen->AdvancedSearch->SearchValue = @$filter["x_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator = @$filter["z_Specimen"];
        $this->Specimen->AdvancedSearch->SearchCondition = @$filter["v_Specimen"];
        $this->Specimen->AdvancedSearch->SearchValue2 = @$filter["y_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator2 = @$filter["w_Specimen"];
        $this->Specimen->AdvancedSearch->save();

        // Field Abnormal
        $this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
        $this->Abnormal->AdvancedSearch->save();

        // Field RefValue
        $this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
        $this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
        $this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
        $this->RefValue->AdvancedSearch->save();

        // Field TestUnit
        $this->TestUnit->AdvancedSearch->SearchValue = @$filter["x_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchOperator = @$filter["z_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchCondition = @$filter["v_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchValue2 = @$filter["y_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchOperator2 = @$filter["w_TestUnit"];
        $this->TestUnit->AdvancedSearch->save();

        // Field LOWHIGH
        $this->LOWHIGH->AdvancedSearch->SearchValue = @$filter["x_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator = @$filter["z_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchCondition = @$filter["v_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchValue2 = @$filter["y_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator2 = @$filter["w_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->save();

        // Field Branch
        $this->Branch->AdvancedSearch->SearchValue = @$filter["x_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator = @$filter["z_Branch"];
        $this->Branch->AdvancedSearch->SearchCondition = @$filter["v_Branch"];
        $this->Branch->AdvancedSearch->SearchValue2 = @$filter["y_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator2 = @$filter["w_Branch"];
        $this->Branch->AdvancedSearch->save();

        // Field Dispatch
        $this->Dispatch->AdvancedSearch->SearchValue = @$filter["x_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator = @$filter["z_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchCondition = @$filter["v_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchValue2 = @$filter["y_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator2 = @$filter["w_Dispatch"];
        $this->Dispatch->AdvancedSearch->save();

        // Field Pic1
        $this->Pic1->AdvancedSearch->SearchValue = @$filter["x_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator = @$filter["z_Pic1"];
        $this->Pic1->AdvancedSearch->SearchCondition = @$filter["v_Pic1"];
        $this->Pic1->AdvancedSearch->SearchValue2 = @$filter["y_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator2 = @$filter["w_Pic1"];
        $this->Pic1->AdvancedSearch->save();

        // Field Pic2
        $this->Pic2->AdvancedSearch->SearchValue = @$filter["x_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator = @$filter["z_Pic2"];
        $this->Pic2->AdvancedSearch->SearchCondition = @$filter["v_Pic2"];
        $this->Pic2->AdvancedSearch->SearchValue2 = @$filter["y_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator2 = @$filter["w_Pic2"];
        $this->Pic2->AdvancedSearch->save();

        // Field GraphPath
        $this->GraphPath->AdvancedSearch->SearchValue = @$filter["x_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator = @$filter["z_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchCondition = @$filter["v_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchValue2 = @$filter["y_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator2 = @$filter["w_GraphPath"];
        $this->GraphPath->AdvancedSearch->save();

        // Field MachineCD
        $this->MachineCD->AdvancedSearch->SearchValue = @$filter["x_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator = @$filter["z_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchCondition = @$filter["v_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchValue2 = @$filter["y_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator2 = @$filter["w_MachineCD"];
        $this->MachineCD->AdvancedSearch->save();

        // Field TestCancel
        $this->TestCancel->AdvancedSearch->SearchValue = @$filter["x_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator = @$filter["z_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchCondition = @$filter["v_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchValue2 = @$filter["y_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator2 = @$filter["w_TestCancel"];
        $this->TestCancel->AdvancedSearch->save();

        // Field OutSource
        $this->OutSource->AdvancedSearch->SearchValue = @$filter["x_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator = @$filter["z_OutSource"];
        $this->OutSource->AdvancedSearch->SearchCondition = @$filter["v_OutSource"];
        $this->OutSource->AdvancedSearch->SearchValue2 = @$filter["y_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator2 = @$filter["w_OutSource"];
        $this->OutSource->AdvancedSearch->save();

        // Field Printed
        $this->Printed->AdvancedSearch->SearchValue = @$filter["x_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator = @$filter["z_Printed"];
        $this->Printed->AdvancedSearch->SearchCondition = @$filter["v_Printed"];
        $this->Printed->AdvancedSearch->SearchValue2 = @$filter["y_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator2 = @$filter["w_Printed"];
        $this->Printed->AdvancedSearch->save();

        // Field PrintBy
        $this->PrintBy->AdvancedSearch->SearchValue = @$filter["x_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator = @$filter["z_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchCondition = @$filter["v_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchValue2 = @$filter["y_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator2 = @$filter["w_PrintBy"];
        $this->PrintBy->AdvancedSearch->save();

        // Field PrintDate
        $this->PrintDate->AdvancedSearch->SearchValue = @$filter["x_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator = @$filter["z_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchCondition = @$filter["v_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchValue2 = @$filter["y_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator2 = @$filter["w_PrintDate"];
        $this->PrintDate->AdvancedSearch->save();

        // Field BillingDate
        $this->BillingDate->AdvancedSearch->SearchValue = @$filter["x_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchOperator = @$filter["z_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchCondition = @$filter["v_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchValue2 = @$filter["y_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillingDate"];
        $this->BillingDate->AdvancedSearch->save();

        // Field BilledBy
        $this->BilledBy->AdvancedSearch->SearchValue = @$filter["x_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchOperator = @$filter["z_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchCondition = @$filter["v_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchValue2 = @$filter["y_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchOperator2 = @$filter["w_BilledBy"];
        $this->BilledBy->AdvancedSearch->save();

        // Field Resulted
        $this->Resulted->AdvancedSearch->SearchValue = @$filter["x_Resulted"];
        $this->Resulted->AdvancedSearch->SearchOperator = @$filter["z_Resulted"];
        $this->Resulted->AdvancedSearch->SearchCondition = @$filter["v_Resulted"];
        $this->Resulted->AdvancedSearch->SearchValue2 = @$filter["y_Resulted"];
        $this->Resulted->AdvancedSearch->SearchOperator2 = @$filter["w_Resulted"];
        $this->Resulted->AdvancedSearch->save();

        // Field ResultDate
        $this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
        $this->ResultDate->AdvancedSearch->save();

        // Field ResultedBy
        $this->ResultedBy->AdvancedSearch->SearchValue = @$filter["x_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchOperator = @$filter["z_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchCondition = @$filter["v_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->save();

        // Field SampleDate
        $this->SampleDate->AdvancedSearch->SearchValue = @$filter["x_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator = @$filter["z_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchCondition = @$filter["v_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchValue2 = @$filter["y_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator2 = @$filter["w_SampleDate"];
        $this->SampleDate->AdvancedSearch->save();

        // Field SampleUser
        $this->SampleUser->AdvancedSearch->SearchValue = @$filter["x_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator = @$filter["z_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchCondition = @$filter["v_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchValue2 = @$filter["y_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator2 = @$filter["w_SampleUser"];
        $this->SampleUser->AdvancedSearch->save();

        // Field Sampled
        $this->Sampled->AdvancedSearch->SearchValue = @$filter["x_Sampled"];
        $this->Sampled->AdvancedSearch->SearchOperator = @$filter["z_Sampled"];
        $this->Sampled->AdvancedSearch->SearchCondition = @$filter["v_Sampled"];
        $this->Sampled->AdvancedSearch->SearchValue2 = @$filter["y_Sampled"];
        $this->Sampled->AdvancedSearch->SearchOperator2 = @$filter["w_Sampled"];
        $this->Sampled->AdvancedSearch->save();

        // Field ReceivedDate
        $this->ReceivedDate->AdvancedSearch->SearchValue = @$filter["x_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator = @$filter["z_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchCondition = @$filter["v_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->save();

        // Field ReceivedUser
        $this->ReceivedUser->AdvancedSearch->SearchValue = @$filter["x_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator = @$filter["z_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchCondition = @$filter["v_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->save();

        // Field Recevied
        $this->Recevied->AdvancedSearch->SearchValue = @$filter["x_Recevied"];
        $this->Recevied->AdvancedSearch->SearchOperator = @$filter["z_Recevied"];
        $this->Recevied->AdvancedSearch->SearchCondition = @$filter["v_Recevied"];
        $this->Recevied->AdvancedSearch->SearchValue2 = @$filter["y_Recevied"];
        $this->Recevied->AdvancedSearch->SearchOperator2 = @$filter["w_Recevied"];
        $this->Recevied->AdvancedSearch->save();

        // Field DeptRecvDate
        $this->DeptRecvDate->AdvancedSearch->SearchValue = @$filter["x_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->save();

        // Field DeptRecvUser
        $this->DeptRecvUser->AdvancedSearch->SearchValue = @$filter["x_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->save();

        // Field DeptRecived
        $this->DeptRecived->AdvancedSearch->SearchValue = @$filter["x_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchOperator = @$filter["z_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchCondition = @$filter["v_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->save();

        // Field SAuthDate
        $this->SAuthDate->AdvancedSearch->SearchValue = @$filter["x_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator = @$filter["z_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchCondition = @$filter["v_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->save();

        // Field SAuthBy
        $this->SAuthBy->AdvancedSearch->SearchValue = @$filter["x_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator = @$filter["z_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchCondition = @$filter["v_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchValue2 = @$filter["y_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->save();

        // Field SAuthendicate
        $this->SAuthendicate->AdvancedSearch->SearchValue = @$filter["x_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchOperator = @$filter["z_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchCondition = @$filter["v_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->save();

        // Field AuthDate
        $this->AuthDate->AdvancedSearch->SearchValue = @$filter["x_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator = @$filter["z_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchCondition = @$filter["v_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchValue2 = @$filter["y_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_AuthDate"];
        $this->AuthDate->AdvancedSearch->save();

        // Field AuthBy
        $this->AuthBy->AdvancedSearch->SearchValue = @$filter["x_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator = @$filter["z_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchCondition = @$filter["v_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchValue2 = @$filter["y_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_AuthBy"];
        $this->AuthBy->AdvancedSearch->save();

        // Field Authencate
        $this->Authencate->AdvancedSearch->SearchValue = @$filter["x_Authencate"];
        $this->Authencate->AdvancedSearch->SearchOperator = @$filter["z_Authencate"];
        $this->Authencate->AdvancedSearch->SearchCondition = @$filter["v_Authencate"];
        $this->Authencate->AdvancedSearch->SearchValue2 = @$filter["y_Authencate"];
        $this->Authencate->AdvancedSearch->SearchOperator2 = @$filter["w_Authencate"];
        $this->Authencate->AdvancedSearch->save();

        // Field EditDate
        $this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
        $this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
        $this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
        $this->EditDate->AdvancedSearch->save();

        // Field EditBy
        $this->EditBy->AdvancedSearch->SearchValue = @$filter["x_EditBy"];
        $this->EditBy->AdvancedSearch->SearchOperator = @$filter["z_EditBy"];
        $this->EditBy->AdvancedSearch->SearchCondition = @$filter["v_EditBy"];
        $this->EditBy->AdvancedSearch->SearchValue2 = @$filter["y_EditBy"];
        $this->EditBy->AdvancedSearch->SearchOperator2 = @$filter["w_EditBy"];
        $this->EditBy->AdvancedSearch->save();

        // Field Editted
        $this->Editted->AdvancedSearch->SearchValue = @$filter["x_Editted"];
        $this->Editted->AdvancedSearch->SearchOperator = @$filter["z_Editted"];
        $this->Editted->AdvancedSearch->SearchCondition = @$filter["v_Editted"];
        $this->Editted->AdvancedSearch->SearchValue2 = @$filter["y_Editted"];
        $this->Editted->AdvancedSearch->SearchOperator2 = @$filter["w_Editted"];
        $this->Editted->AdvancedSearch->save();

        // Field PatientId
        $this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
        $this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
        $this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
        $this->PatientId->AdvancedSearch->save();

        // Field Mobile
        $this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
        $this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
        $this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
        $this->Mobile->AdvancedSearch->save();

        // Field CId
        $this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
        $this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
        $this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
        $this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
        $this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
        $this->CId->AdvancedSearch->save();

        // Field Order
        $this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
        $this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
        $this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
        $this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
        $this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
        $this->Order->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field ResType
        $this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
        $this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
        $this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
        $this->ResType->AdvancedSearch->save();

        // Field Sample
        $this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
        $this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
        $this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
        $this->Sample->AdvancedSearch->save();

        // Field NoD
        $this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
        $this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
        $this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
        $this->NoD->AdvancedSearch->save();

        // Field BillOrder
        $this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
        $this->BillOrder->AdvancedSearch->save();

        // Field Formula
        $this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
        $this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
        $this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
        $this->Formula->AdvancedSearch->save();

        // Field Inactive
        $this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
        $this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
        $this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
        $this->Inactive->AdvancedSearch->save();

        // Field CollSample
        $this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
        $this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
        $this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
        $this->CollSample->AdvancedSearch->save();

        // Field TestType
        $this->TestType->AdvancedSearch->SearchValue = @$filter["x_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator = @$filter["z_TestType"];
        $this->TestType->AdvancedSearch->SearchCondition = @$filter["v_TestType"];
        $this->TestType->AdvancedSearch->SearchValue2 = @$filter["y_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator2 = @$filter["w_TestType"];
        $this->TestType->AdvancedSearch->save();

        // Field Repeated
        $this->Repeated->AdvancedSearch->SearchValue = @$filter["x_Repeated"];
        $this->Repeated->AdvancedSearch->SearchOperator = @$filter["z_Repeated"];
        $this->Repeated->AdvancedSearch->SearchCondition = @$filter["v_Repeated"];
        $this->Repeated->AdvancedSearch->SearchValue2 = @$filter["y_Repeated"];
        $this->Repeated->AdvancedSearch->SearchOperator2 = @$filter["w_Repeated"];
        $this->Repeated->AdvancedSearch->save();

        // Field RepeatedBy
        $this->RepeatedBy->AdvancedSearch->SearchValue = @$filter["x_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchOperator = @$filter["z_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchCondition = @$filter["v_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->save();

        // Field RepeatedDate
        $this->RepeatedDate->AdvancedSearch->SearchValue = @$filter["x_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchOperator = @$filter["z_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchCondition = @$filter["v_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->save();

        // Field serviceID
        $this->serviceID->AdvancedSearch->SearchValue = @$filter["x_serviceID"];
        $this->serviceID->AdvancedSearch->SearchOperator = @$filter["z_serviceID"];
        $this->serviceID->AdvancedSearch->SearchCondition = @$filter["v_serviceID"];
        $this->serviceID->AdvancedSearch->SearchValue2 = @$filter["y_serviceID"];
        $this->serviceID->AdvancedSearch->SearchOperator2 = @$filter["w_serviceID"];
        $this->serviceID->AdvancedSearch->save();

        // Field Service_Type
        $this->Service_Type->AdvancedSearch->SearchValue = @$filter["x_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchOperator = @$filter["z_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchCondition = @$filter["v_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchValue2 = @$filter["y_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Type"];
        $this->Service_Type->AdvancedSearch->save();

        // Field Service_Department
        $this->Service_Department->AdvancedSearch->SearchValue = @$filter["x_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchOperator = @$filter["z_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchCondition = @$filter["v_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchValue2 = @$filter["y_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Department"];
        $this->Service_Department->AdvancedSearch->save();

        // Field RequestNo
        $this->RequestNo->AdvancedSearch->SearchValue = @$filter["x_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchOperator = @$filter["z_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchCondition = @$filter["v_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchValue2 = @$filter["y_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchOperator2 = @$filter["w_RequestNo"];
        $this->RequestNo->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Services, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Department, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->invoiceStatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modeOfPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountCategory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ItemCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEptCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProfCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabReport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Specimen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestUnit, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LOWHIGH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Branch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Dispatch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GraphPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MachineCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestCancel, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Printed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrintBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BilledBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Resulted, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResultedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SampleUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sampled, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReceivedUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Recevied, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptRecvUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptRecived, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAuthendicate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Authencate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EditBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Editted, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Repeated, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RepeatedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Service_Type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Service_Department, $arKeywords, $type);
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
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->Services); // Services
            $this->updateSort($this->Unit); // Unit
            $this->updateSort($this->amount); // amount
            $this->updateSort($this->Quantity); // Quantity
            $this->updateSort($this->Discount); // Discount
            $this->updateSort($this->SubTotal); // SubTotal
            $this->updateSort($this->patient_type); // patient_type
            $this->updateSort($this->charged_date); // charged_date
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->Aid); // Aid
            $this->updateSort($this->Vid); // Vid
            $this->updateSort($this->DrID); // DrID
            $this->updateSort($this->DrCODE); // DrCODE
            $this->updateSort($this->DrName); // DrName
            $this->updateSort($this->Department); // Department
            $this->updateSort($this->DrSharePres); // DrSharePres
            $this->updateSort($this->HospSharePres); // HospSharePres
            $this->updateSort($this->DrShareAmount); // DrShareAmount
            $this->updateSort($this->HospShareAmount); // HospShareAmount
            $this->updateSort($this->DrShareSettiledAmount); // DrShareSettiledAmount
            $this->updateSort($this->DrShareSettledId); // DrShareSettledId
            $this->updateSort($this->DrShareSettiledStatus); // DrShareSettiledStatus
            $this->updateSort($this->invoiceId); // invoiceId
            $this->updateSort($this->invoiceAmount); // invoiceAmount
            $this->updateSort($this->invoiceStatus); // invoiceStatus
            $this->updateSort($this->modeOfPayment); // modeOfPayment
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->DiscountCategory); // DiscountCategory
            $this->updateSort($this->sid); // sid
            $this->updateSort($this->ItemCode); // ItemCode
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->DEptCd); // DEptCd
            $this->updateSort($this->ProfCd); // ProfCd
            $this->updateSort($this->Comments); // Comments
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Specimen); // Specimen
            $this->updateSort($this->Abnormal); // Abnormal
            $this->updateSort($this->TestUnit); // TestUnit
            $this->updateSort($this->LOWHIGH); // LOWHIGH
            $this->updateSort($this->Branch); // Branch
            $this->updateSort($this->Dispatch); // Dispatch
            $this->updateSort($this->Pic1); // Pic1
            $this->updateSort($this->Pic2); // Pic2
            $this->updateSort($this->GraphPath); // GraphPath
            $this->updateSort($this->MachineCD); // MachineCD
            $this->updateSort($this->TestCancel); // TestCancel
            $this->updateSort($this->OutSource); // OutSource
            $this->updateSort($this->Printed); // Printed
            $this->updateSort($this->PrintBy); // PrintBy
            $this->updateSort($this->PrintDate); // PrintDate
            $this->updateSort($this->BillingDate); // BillingDate
            $this->updateSort($this->BilledBy); // BilledBy
            $this->updateSort($this->Resulted); // Resulted
            $this->updateSort($this->ResultDate); // ResultDate
            $this->updateSort($this->ResultedBy); // ResultedBy
            $this->updateSort($this->SampleDate); // SampleDate
            $this->updateSort($this->SampleUser); // SampleUser
            $this->updateSort($this->Sampled); // Sampled
            $this->updateSort($this->ReceivedDate); // ReceivedDate
            $this->updateSort($this->ReceivedUser); // ReceivedUser
            $this->updateSort($this->Recevied); // Recevied
            $this->updateSort($this->DeptRecvDate); // DeptRecvDate
            $this->updateSort($this->DeptRecvUser); // DeptRecvUser
            $this->updateSort($this->DeptRecived); // DeptRecived
            $this->updateSort($this->SAuthDate); // SAuthDate
            $this->updateSort($this->SAuthBy); // SAuthBy
            $this->updateSort($this->SAuthendicate); // SAuthendicate
            $this->updateSort($this->AuthDate); // AuthDate
            $this->updateSort($this->AuthBy); // AuthBy
            $this->updateSort($this->Authencate); // Authencate
            $this->updateSort($this->EditDate); // EditDate
            $this->updateSort($this->EditBy); // EditBy
            $this->updateSort($this->Editted); // Editted
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->CId); // CId
            $this->updateSort($this->Order); // Order
            $this->updateSort($this->ResType); // ResType
            $this->updateSort($this->Sample); // Sample
            $this->updateSort($this->NoD); // NoD
            $this->updateSort($this->BillOrder); // BillOrder
            $this->updateSort($this->Inactive); // Inactive
            $this->updateSort($this->CollSample); // CollSample
            $this->updateSort($this->TestType); // TestType
            $this->updateSort($this->Repeated); // Repeated
            $this->updateSort($this->RepeatedBy); // RepeatedBy
            $this->updateSort($this->RepeatedDate); // RepeatedDate
            $this->updateSort($this->serviceID); // serviceID
            $this->updateSort($this->Service_Type); // Service_Type
            $this->updateSort($this->Service_Department); // Service_Department
            $this->updateSort($this->RequestNo); // RequestNo
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
                $this->Reception->setSort("");
                $this->PatID->setSort("");
                $this->mrnno->setSort("");
                $this->PatientName->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->Services->setSort("");
                $this->Unit->setSort("");
                $this->amount->setSort("");
                $this->Quantity->setSort("");
                $this->Discount->setSort("");
                $this->SubTotal->setSort("");
                $this->description->setSort("");
                $this->patient_type->setSort("");
                $this->charged_date->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->Aid->setSort("");
                $this->Vid->setSort("");
                $this->DrID->setSort("");
                $this->DrCODE->setSort("");
                $this->DrName->setSort("");
                $this->Department->setSort("");
                $this->DrSharePres->setSort("");
                $this->HospSharePres->setSort("");
                $this->DrShareAmount->setSort("");
                $this->HospShareAmount->setSort("");
                $this->DrShareSettiledAmount->setSort("");
                $this->DrShareSettledId->setSort("");
                $this->DrShareSettiledStatus->setSort("");
                $this->invoiceId->setSort("");
                $this->invoiceAmount->setSort("");
                $this->invoiceStatus->setSort("");
                $this->modeOfPayment->setSort("");
                $this->HospID->setSort("");
                $this->RIDNO->setSort("");
                $this->TidNo->setSort("");
                $this->DiscountCategory->setSort("");
                $this->sid->setSort("");
                $this->ItemCode->setSort("");
                $this->TestSubCd->setSort("");
                $this->DEptCd->setSort("");
                $this->ProfCd->setSort("");
                $this->LabReport->setSort("");
                $this->Comments->setSort("");
                $this->Method->setSort("");
                $this->Specimen->setSort("");
                $this->Abnormal->setSort("");
                $this->RefValue->setSort("");
                $this->TestUnit->setSort("");
                $this->LOWHIGH->setSort("");
                $this->Branch->setSort("");
                $this->Dispatch->setSort("");
                $this->Pic1->setSort("");
                $this->Pic2->setSort("");
                $this->GraphPath->setSort("");
                $this->MachineCD->setSort("");
                $this->TestCancel->setSort("");
                $this->OutSource->setSort("");
                $this->Printed->setSort("");
                $this->PrintBy->setSort("");
                $this->PrintDate->setSort("");
                $this->BillingDate->setSort("");
                $this->BilledBy->setSort("");
                $this->Resulted->setSort("");
                $this->ResultDate->setSort("");
                $this->ResultedBy->setSort("");
                $this->SampleDate->setSort("");
                $this->SampleUser->setSort("");
                $this->Sampled->setSort("");
                $this->ReceivedDate->setSort("");
                $this->ReceivedUser->setSort("");
                $this->Recevied->setSort("");
                $this->DeptRecvDate->setSort("");
                $this->DeptRecvUser->setSort("");
                $this->DeptRecived->setSort("");
                $this->SAuthDate->setSort("");
                $this->SAuthBy->setSort("");
                $this->SAuthendicate->setSort("");
                $this->AuthDate->setSort("");
                $this->AuthBy->setSort("");
                $this->Authencate->setSort("");
                $this->EditDate->setSort("");
                $this->EditBy->setSort("");
                $this->Editted->setSort("");
                $this->PatientId->setSort("");
                $this->Mobile->setSort("");
                $this->CId->setSort("");
                $this->Order->setSort("");
                $this->Form->setSort("");
                $this->ResType->setSort("");
                $this->Sample->setSort("");
                $this->NoD->setSort("");
                $this->BillOrder->setSort("");
                $this->Formula->setSort("");
                $this->Inactive->setSort("");
                $this->CollSample->setSort("");
                $this->TestType->setSort("");
                $this->Repeated->setSort("");
                $this->RepeatedBy->setSort("");
                $this->RepeatedDate->setSort("");
                $this->serviceID->setSort("");
                $this->Service_Type->setSort("");
                $this->Service_Department->setSort("");
                $this->RequestNo->setSort("");
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

        // "view"
        $item = &$this->ListOptions->add("view");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "edit"
        $item = &$this->ListOptions->add("edit");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "copy"
        $item = &$this->ListOptions->add("copy");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

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
        if ($this->CurrentMode == "view") {
            // "view"
            $opt = $this->ListOptions["view"];
            $viewcaption = HtmlTitle($Language->phrase("ViewLink"));
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode(GetUrl($this->ViewUrl)) . "\">" . $Language->phrase("ViewLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "edit"
            $opt = $this->ListOptions["edit"];
            $editcaption = HtmlTitle($Language->phrase("EditLink"));
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("EditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "delete"
            $opt = $this->ListOptions["delete"];
            if (true) {
            $opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("DeleteLink") . "</a>";
            } else {
                $opt->Body = "";
            }
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
        $option = $options["addedit"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("AddLink"));
        $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
        $item->Visible = $this->AddUrl != "";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_serviceslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Services->setDbValue($row['Services']);
        $this->Unit->setDbValue($row['Unit']);
        $this->amount->setDbValue($row['amount']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->description->setDbValue($row['description']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->DrSharePres->setDbValue($row['DrSharePres']);
        $this->HospSharePres->setDbValue($row['HospSharePres']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
        $this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
        $this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->DiscountCategory->setDbValue($row['DiscountCategory']);
        $this->sid->setDbValue($row['sid']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->Branch->setDbValue($row['Branch']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Printed->setDbValue($row['Printed']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->BillingDate->setDbValue($row['BillingDate']);
        $this->BilledBy->setDbValue($row['BilledBy']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->Sampled->setDbValue($row['Sampled']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->Recevied->setDbValue($row['Recevied']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->DeptRecived->setDbValue($row['DeptRecived']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->SAuthendicate->setDbValue($row['SAuthendicate']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->Authencate->setDbValue($row['Authencate']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditBy->setDbValue($row['EditBy']);
        $this->Editted->setDbValue($row['Editted']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->CId->setDbValue($row['CId']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->RepeatedBy->setDbValue($row['RepeatedBy']);
        $this->RepeatedDate->setDbValue($row['RepeatedDate']);
        $this->serviceID->setDbValue($row['serviceID']);
        $this->Service_Type->setDbValue($row['Service_Type']);
        $this->Service_Department->setDbValue($row['Service_Department']);
        $this->RequestNo->setDbValue($row['RequestNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatID'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['Services'] = null;
        $row['Unit'] = null;
        $row['amount'] = null;
        $row['Quantity'] = null;
        $row['Discount'] = null;
        $row['SubTotal'] = null;
        $row['description'] = null;
        $row['patient_type'] = null;
        $row['charged_date'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['Aid'] = null;
        $row['Vid'] = null;
        $row['DrID'] = null;
        $row['DrCODE'] = null;
        $row['DrName'] = null;
        $row['Department'] = null;
        $row['DrSharePres'] = null;
        $row['HospSharePres'] = null;
        $row['DrShareAmount'] = null;
        $row['HospShareAmount'] = null;
        $row['DrShareSettiledAmount'] = null;
        $row['DrShareSettledId'] = null;
        $row['DrShareSettiledStatus'] = null;
        $row['invoiceId'] = null;
        $row['invoiceAmount'] = null;
        $row['invoiceStatus'] = null;
        $row['modeOfPayment'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['DiscountCategory'] = null;
        $row['sid'] = null;
        $row['ItemCode'] = null;
        $row['TestSubCd'] = null;
        $row['DEptCd'] = null;
        $row['ProfCd'] = null;
        $row['LabReport'] = null;
        $row['Comments'] = null;
        $row['Method'] = null;
        $row['Specimen'] = null;
        $row['Abnormal'] = null;
        $row['RefValue'] = null;
        $row['TestUnit'] = null;
        $row['LOWHIGH'] = null;
        $row['Branch'] = null;
        $row['Dispatch'] = null;
        $row['Pic1'] = null;
        $row['Pic2'] = null;
        $row['GraphPath'] = null;
        $row['MachineCD'] = null;
        $row['TestCancel'] = null;
        $row['OutSource'] = null;
        $row['Printed'] = null;
        $row['PrintBy'] = null;
        $row['PrintDate'] = null;
        $row['BillingDate'] = null;
        $row['BilledBy'] = null;
        $row['Resulted'] = null;
        $row['ResultDate'] = null;
        $row['ResultedBy'] = null;
        $row['SampleDate'] = null;
        $row['SampleUser'] = null;
        $row['Sampled'] = null;
        $row['ReceivedDate'] = null;
        $row['ReceivedUser'] = null;
        $row['Recevied'] = null;
        $row['DeptRecvDate'] = null;
        $row['DeptRecvUser'] = null;
        $row['DeptRecived'] = null;
        $row['SAuthDate'] = null;
        $row['SAuthBy'] = null;
        $row['SAuthendicate'] = null;
        $row['AuthDate'] = null;
        $row['AuthBy'] = null;
        $row['Authencate'] = null;
        $row['EditDate'] = null;
        $row['EditBy'] = null;
        $row['Editted'] = null;
        $row['PatientId'] = null;
        $row['Mobile'] = null;
        $row['CId'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['ResType'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['CollSample'] = null;
        $row['TestType'] = null;
        $row['Repeated'] = null;
        $row['RepeatedBy'] = null;
        $row['RepeatedDate'] = null;
        $row['serviceID'] = null;
        $row['Service_Type'] = null;
        $row['Service_Department'] = null;
        $row['RequestNo'] = null;
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

        // Convert decimal values if posted back
        if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue))) {
            $this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue))) {
            $this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue))) {
            $this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue))) {
            $this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue))) {
            $this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue))) {
            $this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue))) {
            $this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue))) {
            $this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // PatID

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Services

        // Unit

        // amount

        // Quantity

        // Discount

        // SubTotal

        // description

        // patient_type

        // charged_date

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Aid

        // Vid

        // DrID

        // DrCODE

        // DrName

        // Department

        // DrSharePres

        // HospSharePres

        // DrShareAmount

        // HospShareAmount

        // DrShareSettiledAmount

        // DrShareSettledId

        // DrShareSettiledStatus

        // invoiceId

        // invoiceAmount

        // invoiceStatus

        // modeOfPayment

        // HospID

        // RIDNO

        // TidNo

        // DiscountCategory

        // sid

        // ItemCode

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // Comments

        // Method

        // Specimen

        // Abnormal

        // RefValue

        // TestUnit

        // LOWHIGH

        // Branch

        // Dispatch

        // Pic1

        // Pic2

        // GraphPath

        // MachineCD

        // TestCancel

        // OutSource

        // Printed

        // PrintBy

        // PrintDate

        // BillingDate

        // BilledBy

        // Resulted

        // ResultDate

        // ResultedBy

        // SampleDate

        // SampleUser

        // Sampled

        // ReceivedDate

        // ReceivedUser

        // Recevied

        // DeptRecvDate

        // DeptRecvUser

        // DeptRecived

        // SAuthDate

        // SAuthBy

        // SAuthendicate

        // AuthDate

        // AuthBy

        // Authencate

        // EditDate

        // EditBy

        // Editted

        // PatientId

        // Mobile

        // CId

        // Order

        // Form

        // ResType

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // CollSample

        // TestType

        // Repeated

        // RepeatedBy

        // RepeatedDate

        // serviceID

        // Service_Type

        // Service_Department

        // RequestNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // Services
            $this->Services->ViewValue = $this->Services->CurrentValue;
            $this->Services->ViewCustomAttributes = "";

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
            $this->Unit->ViewCustomAttributes = "";

            // amount
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SubTotal
            $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
            $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
            $this->SubTotal->ViewCustomAttributes = "";

            // patient_type
            $this->patient_type->ViewValue = $this->patient_type->CurrentValue;
            $this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
            $this->patient_type->ViewCustomAttributes = "";

            // charged_date
            $this->charged_date->ViewValue = $this->charged_date->CurrentValue;
            $this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
            $this->charged_date->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // Aid
            $this->Aid->ViewValue = $this->Aid->CurrentValue;
            $this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
            $this->Aid->ViewCustomAttributes = "";

            // Vid
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // DrCODE
            $this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
            $this->DrCODE->ViewCustomAttributes = "";

            // DrName
            $this->DrName->ViewValue = $this->DrName->CurrentValue;
            $this->DrName->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // DrSharePres
            $this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
            $this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
            $this->DrSharePres->ViewCustomAttributes = "";

            // HospSharePres
            $this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
            $this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
            $this->HospSharePres->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
            $this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareSettiledAmount->ViewCustomAttributes = "";

            // DrShareSettledId
            $this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
            $this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettledId->ViewCustomAttributes = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
            $this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettiledStatus->ViewCustomAttributes = "";

            // invoiceId
            $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
            $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
            $this->invoiceId->ViewCustomAttributes = "";

            // invoiceAmount
            $this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
            $this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
            $this->invoiceAmount->ViewCustomAttributes = "";

            // invoiceStatus
            $this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
            $this->invoiceStatus->ViewCustomAttributes = "";

            // modeOfPayment
            $this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
            $this->modeOfPayment->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // DiscountCategory
            $this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
            $this->DiscountCategory->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // ItemCode
            $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
            $this->ItemCode->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // DEptCd
            $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
            $this->DEptCd->ViewCustomAttributes = "";

            // ProfCd
            $this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
            $this->ProfCd->ViewCustomAttributes = "";

            // Comments
            $this->Comments->ViewValue = $this->Comments->CurrentValue;
            $this->Comments->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Specimen
            $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
            $this->Specimen->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // TestUnit
            $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
            $this->TestUnit->ViewCustomAttributes = "";

            // LOWHIGH
            $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
            $this->LOWHIGH->ViewCustomAttributes = "";

            // Branch
            $this->Branch->ViewValue = $this->Branch->CurrentValue;
            $this->Branch->ViewCustomAttributes = "";

            // Dispatch
            $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
            $this->Dispatch->ViewCustomAttributes = "";

            // Pic1
            $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
            $this->Pic2->ViewCustomAttributes = "";

            // GraphPath
            $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
            $this->GraphPath->ViewCustomAttributes = "";

            // MachineCD
            $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
            $this->MachineCD->ViewCustomAttributes = "";

            // TestCancel
            $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
            $this->TestCancel->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // Printed
            $this->Printed->ViewValue = $this->Printed->CurrentValue;
            $this->Printed->ViewCustomAttributes = "";

            // PrintBy
            $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
            $this->PrintBy->ViewCustomAttributes = "";

            // PrintDate
            $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
            $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
            $this->PrintDate->ViewCustomAttributes = "";

            // BillingDate
            $this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
            $this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
            $this->BillingDate->ViewCustomAttributes = "";

            // BilledBy
            $this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
            $this->BilledBy->ViewCustomAttributes = "";

            // Resulted
            $this->Resulted->ViewValue = $this->Resulted->CurrentValue;
            $this->Resulted->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // SampleDate
            $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
            $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
            $this->SampleDate->ViewCustomAttributes = "";

            // SampleUser
            $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
            $this->SampleUser->ViewCustomAttributes = "";

            // Sampled
            $this->Sampled->ViewValue = $this->Sampled->CurrentValue;
            $this->Sampled->ViewCustomAttributes = "";

            // ReceivedDate
            $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
            $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
            $this->ReceivedDate->ViewCustomAttributes = "";

            // ReceivedUser
            $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
            $this->ReceivedUser->ViewCustomAttributes = "";

            // Recevied
            $this->Recevied->ViewValue = $this->Recevied->CurrentValue;
            $this->Recevied->ViewCustomAttributes = "";

            // DeptRecvDate
            $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
            $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
            $this->DeptRecvDate->ViewCustomAttributes = "";

            // DeptRecvUser
            $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
            $this->DeptRecvUser->ViewCustomAttributes = "";

            // DeptRecived
            $this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
            $this->DeptRecived->ViewCustomAttributes = "";

            // SAuthDate
            $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
            $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
            $this->SAuthDate->ViewCustomAttributes = "";

            // SAuthBy
            $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
            $this->SAuthBy->ViewCustomAttributes = "";

            // SAuthendicate
            $this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
            $this->SAuthendicate->ViewCustomAttributes = "";

            // AuthDate
            $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
            $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
            $this->AuthDate->ViewCustomAttributes = "";

            // AuthBy
            $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
            $this->AuthBy->ViewCustomAttributes = "";

            // Authencate
            $this->Authencate->ViewValue = $this->Authencate->CurrentValue;
            $this->Authencate->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // EditBy
            $this->EditBy->ViewValue = $this->EditBy->CurrentValue;
            $this->EditBy->ViewCustomAttributes = "";

            // Editted
            $this->Editted->ViewValue = $this->Editted->CurrentValue;
            $this->Editted->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // CId
            $this->CId->ViewValue = $this->CId->CurrentValue;
            $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
            $this->CId->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            $this->TestType->ViewValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // Repeated
            $this->Repeated->ViewValue = $this->Repeated->CurrentValue;
            $this->Repeated->ViewCustomAttributes = "";

            // RepeatedBy
            $this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
            $this->RepeatedBy->ViewCustomAttributes = "";

            // RepeatedDate
            $this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
            $this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
            $this->RepeatedDate->ViewCustomAttributes = "";

            // serviceID
            $this->serviceID->ViewValue = $this->serviceID->CurrentValue;
            $this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
            $this->serviceID->ViewCustomAttributes = "";

            // Service_Type
            $this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
            $this->Service_Type->ViewCustomAttributes = "";

            // Service_Department
            $this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
            $this->Service_Department->ViewCustomAttributes = "";

            // RequestNo
            $this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
            $this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
            $this->RequestNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";
            $this->Services->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";
            $this->amount->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";
            $this->SubTotal->TooltipValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";
            $this->patient_type->TooltipValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";
            $this->charged_date->TooltipValue = "";

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

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";
            $this->Aid->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";
            $this->DrCODE->TooltipValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
            $this->DrName->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";
            $this->DrSharePres->TooltipValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";
            $this->HospSharePres->TooltipValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";
            $this->DrShareAmount->TooltipValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";
            $this->HospShareAmount->TooltipValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";
            $this->DrShareSettiledAmount->TooltipValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";
            $this->DrShareSettledId->TooltipValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";
            $this->DrShareSettiledStatus->TooltipValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";
            $this->invoiceId->TooltipValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";
            $this->invoiceAmount->TooltipValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";
            $this->invoiceStatus->TooltipValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";
            $this->modeOfPayment->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";
            $this->DiscountCategory->TooltipValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";
            $this->ItemCode->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";
            $this->DEptCd->TooltipValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";
            $this->ProfCd->TooltipValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";
            $this->Comments->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";
            $this->Specimen->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";
            $this->TestUnit->TooltipValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";
            $this->LOWHIGH->TooltipValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";
            $this->Branch->TooltipValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";
            $this->Dispatch->TooltipValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->TooltipValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->TooltipValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";
            $this->GraphPath->TooltipValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";
            $this->MachineCD->TooltipValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";
            $this->TestCancel->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";
            $this->Printed->TooltipValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";
            $this->PrintBy->TooltipValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";
            $this->PrintDate->TooltipValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";
            $this->BillingDate->TooltipValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";
            $this->BilledBy->TooltipValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";
            $this->Resulted->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";
            $this->SampleDate->TooltipValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";
            $this->SampleUser->TooltipValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";
            $this->Sampled->TooltipValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";
            $this->ReceivedDate->TooltipValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";
            $this->ReceivedUser->TooltipValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";
            $this->Recevied->TooltipValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";
            $this->DeptRecvDate->TooltipValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";
            $this->DeptRecvUser->TooltipValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";
            $this->DeptRecived->TooltipValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";
            $this->SAuthDate->TooltipValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";
            $this->SAuthBy->TooltipValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";
            $this->SAuthendicate->TooltipValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";
            $this->AuthDate->TooltipValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";
            $this->AuthBy->TooltipValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";
            $this->Authencate->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";
            $this->EditBy->TooltipValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";
            $this->Editted->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";
            $this->Repeated->TooltipValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";
            $this->RepeatedBy->TooltipValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";
            $this->RepeatedDate->TooltipValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";
            $this->serviceID->TooltipValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";
            $this->Service_Type->TooltipValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";
            $this->Service_Department->TooltipValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
            $this->RequestNo->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_serviceslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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

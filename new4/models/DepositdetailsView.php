<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class DepositdetailsView extends Depositdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'depositdetails';

    // Page object name
    public $PageObjName = "DepositdetailsView";

    // Rendering View
    public $RenderingView = false;

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
    public $ExportExcelCustom = true;
    public $ExportWordCustom = true;
    public $ExportPdfCustom = true;
    public $ExportEmailCustom = true;

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

        // Table object (depositdetails)
        if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
            $GLOBALS["depositdetails"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");

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
                $doc = new $class(Container("depositdetails"));
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
                    if ($pageName == "DepositdetailsView") {
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

        // Get export parameters
        $custom = "";
        if (Param("export") !== null) {
            $this->Export = Param("export");
            $custom = Param("custom", "");
        } elseif (IsPost()) {
            if (Post("exporttype") !== null) {
                $this->Export = Post("exporttype");
            }
            $custom = Post("custom", "");
        } elseif (Get("cmd") == "json") {
            $this->Export = Get("cmd");
        } else {
            $this->setExportReturnUrl(CurrentUrl());
        }
        $ExportFileName = $this->TableVar; // Get export file, used in header
        if (Get("id") !== null) {
            if ($ExportFileName != "") {
                $ExportFileName .= "_";
            }
            $ExportFileName .= Get("id");
        }

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

        // Custom export (post back from ew.applyTemplate), export and terminate page
        if (Post("customexport") !== null) {
            $this->CustomExport = Post("customexport");
            $this->Export = $this->CustomExport;
            $this->terminate();
            return;
        }

        // Update Export URLs
        if (Config("USE_PHPEXCEL")) {
            $this->ExportExcelCustom = false;
        }
        if (Config("USE_PHPWORD")) {
            $this->ExportWordCustom = false;
        }
        if ($this->ExportExcelCustom) {
            $this->ExportExcelUrl .= "&amp;custom=1";
        }
        if ($this->ExportWordCustom) {
            $this->ExportWordUrl .= "&amp;custom=1";
        }
        if ($this->ExportPdfCustom) {
            $this->ExportPdfUrl .= "&amp;custom=1";
        }
        $this->CurrentAction = Param("action"); // Set up current action

        // Setup export options
        $this->setupExportOptions();
        $this->id->setVisibility();
        $this->DepositDate->setVisibility();
        $this->DepositToBankSelect->setVisibility();
        $this->DepositToBank->setVisibility();
        $this->TransferToSelect->setVisibility();
        $this->TransferTo->setVisibility();
        $this->OpeningBalance->setVisibility();
        $this->Other->setVisibility();
        $this->TotalCash->setVisibility();
        $this->Cheque->setVisibility();
        $this->Card->setVisibility();
        $this->NEFTRTGS->setVisibility();
        $this->TotalTransferDepositAmount->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->CreatedUserName->setVisibility();
        $this->ModifiedUserName->setVisibility();
        $this->A2000Count->setVisibility();
        $this->A2000Amount->setVisibility();
        $this->A1000Count->setVisibility();
        $this->A1000Amount->setVisibility();
        $this->A500Count->setVisibility();
        $this->A500Amount->setVisibility();
        $this->A200Count->setVisibility();
        $this->A200Amount->setVisibility();
        $this->A100Count->setVisibility();
        $this->A100Amount->setVisibility();
        $this->A50Count->setVisibility();
        $this->A50Amount->setVisibility();
        $this->A20Count->setVisibility();
        $this->A20Amount->setVisibility();
        $this->A10Count->setVisibility();
        $this->A10Amount->setVisibility();
        $this->BalanceAmount->setVisibility();
        $this->CashCollected->setVisibility();
        $this->RTGS->setVisibility();
        $this->PAYTM->setVisibility();
        $this->HospID->setVisibility();
        $this->ManualCash->setVisibility();
        $this->ManualCard->setVisibility();
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
        $this->setupLookupOptions($this->DepositToBank);
        $this->setupLookupOptions($this->TransferTo);

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
                $returnUrl = "DepositdetailsList"; // Return to list
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
                        $returnUrl = "DepositdetailsList"; // No matching record, return to list
                    }
                    break;
            }

            // Export data only
            if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
                $this->exportData();
                $this->terminate();
                return;
            }
        } else {
            $returnUrl = "DepositdetailsList"; // Not page request, return to list
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
        $item->Visible = ($this->AddUrl != "" && $Security->canAdd());

        // Edit
        $item = &$option->add("edit");
        $editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->EditUrl)) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        }
        $item->Visible = ($this->EditUrl != "" && $Security->canEdit());

        // Copy
        $item = &$option->add("copy");
        $copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode(GetUrl($this->CopyUrl)) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        }
        $item->Visible = ($this->CopyUrl != "" && $Security->canAdd());

        // Delete
        $item = &$option->add("delete");
        if ($this->IsModal) { // Handle as inline delete
            $item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery(GetUrl($this->DeleteUrl), "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        }
        $item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());

        // Set up action default
        $option = $options["action"];
        $option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
        $option->UseDropDownButton = false;
        $option->UseButtonGroup = true;
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
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
        $this->DepositDate->setDbValue($row['DepositDate']);
        $this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
        $this->DepositToBank->setDbValue($row['DepositToBank']);
        $this->TransferToSelect->setDbValue($row['TransferToSelect']);
        $this->TransferTo->setDbValue($row['TransferTo']);
        $this->OpeningBalance->setDbValue($row['OpeningBalance']);
        $this->Other->setDbValue($row['Other']);
        $this->TotalCash->setDbValue($row['TotalCash']);
        $this->Cheque->setDbValue($row['Cheque']);
        $this->Card->setDbValue($row['Card']);
        $this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
        $this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->CreatedUserName->setDbValue($row['CreatedUserName']);
        $this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
        $this->A2000Count->setDbValue($row['A2000Count']);
        $this->A2000Amount->setDbValue($row['A2000Amount']);
        $this->A1000Count->setDbValue($row['A1000Count']);
        $this->A1000Amount->setDbValue($row['A1000Amount']);
        $this->A500Count->setDbValue($row['A500Count']);
        $this->A500Amount->setDbValue($row['A500Amount']);
        $this->A200Count->setDbValue($row['A200Count']);
        $this->A200Amount->setDbValue($row['A200Amount']);
        $this->A100Count->setDbValue($row['A100Count']);
        $this->A100Amount->setDbValue($row['A100Amount']);
        $this->A50Count->setDbValue($row['A50Count']);
        $this->A50Amount->setDbValue($row['A50Amount']);
        $this->A20Count->setDbValue($row['A20Count']);
        $this->A20Amount->setDbValue($row['A20Amount']);
        $this->A10Count->setDbValue($row['A10Count']);
        $this->A10Amount->setDbValue($row['A10Amount']);
        $this->BalanceAmount->setDbValue($row['BalanceAmount']);
        $this->CashCollected->setDbValue($row['CashCollected']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ManualCash->setDbValue($row['ManualCash']);
        $this->ManualCard->setDbValue($row['ManualCard']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['DepositDate'] = null;
        $row['DepositToBankSelect'] = null;
        $row['DepositToBank'] = null;
        $row['TransferToSelect'] = null;
        $row['TransferTo'] = null;
        $row['OpeningBalance'] = null;
        $row['Other'] = null;
        $row['TotalCash'] = null;
        $row['Cheque'] = null;
        $row['Card'] = null;
        $row['NEFTRTGS'] = null;
        $row['TotalTransferDepositAmount'] = null;
        $row['CreatedBy'] = null;
        $row['CreatedDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
        $row['CreatedUserName'] = null;
        $row['ModifiedUserName'] = null;
        $row['A2000Count'] = null;
        $row['A2000Amount'] = null;
        $row['A1000Count'] = null;
        $row['A1000Amount'] = null;
        $row['A500Count'] = null;
        $row['A500Amount'] = null;
        $row['A200Count'] = null;
        $row['A200Amount'] = null;
        $row['A100Count'] = null;
        $row['A100Amount'] = null;
        $row['A50Count'] = null;
        $row['A50Amount'] = null;
        $row['A20Count'] = null;
        $row['A20Amount'] = null;
        $row['A10Count'] = null;
        $row['A10Amount'] = null;
        $row['BalanceAmount'] = null;
        $row['CashCollected'] = null;
        $row['RTGS'] = null;
        $row['PAYTM'] = null;
        $row['HospID'] = null;
        $row['ManualCash'] = null;
        $row['ManualCard'] = null;
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

        // Convert decimal values if posted back
        if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue))) {
            $this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue))) {
            $this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue))) {
            $this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue))) {
            $this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue))) {
            $this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue))) {
            $this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A2000Amount->FormValue == $this->A2000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A2000Amount->CurrentValue))) {
            $this->A2000Amount->CurrentValue = ConvertToFloatString($this->A2000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A1000Amount->FormValue == $this->A1000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A1000Amount->CurrentValue))) {
            $this->A1000Amount->CurrentValue = ConvertToFloatString($this->A1000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A500Amount->FormValue == $this->A500Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A500Amount->CurrentValue))) {
            $this->A500Amount->CurrentValue = ConvertToFloatString($this->A500Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A200Amount->FormValue == $this->A200Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A200Amount->CurrentValue))) {
            $this->A200Amount->CurrentValue = ConvertToFloatString($this->A200Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A100Amount->FormValue == $this->A100Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A100Amount->CurrentValue))) {
            $this->A100Amount->CurrentValue = ConvertToFloatString($this->A100Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A50Amount->FormValue == $this->A50Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A50Amount->CurrentValue))) {
            $this->A50Amount->CurrentValue = ConvertToFloatString($this->A50Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A20Amount->FormValue == $this->A20Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A20Amount->CurrentValue))) {
            $this->A20Amount->CurrentValue = ConvertToFloatString($this->A20Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A10Amount->FormValue == $this->A10Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A10Amount->CurrentValue))) {
            $this->A10Amount->CurrentValue = ConvertToFloatString($this->A10Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BalanceAmount->FormValue == $this->BalanceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->BalanceAmount->CurrentValue))) {
            $this->BalanceAmount->CurrentValue = ConvertToFloatString($this->BalanceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue))) {
            $this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue))) {
            $this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue))) {
            $this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ManualCash->FormValue == $this->ManualCash->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCash->CurrentValue))) {
            $this->ManualCash->CurrentValue = ConvertToFloatString($this->ManualCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ManualCard->FormValue == $this->ManualCard->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCard->CurrentValue))) {
            $this->ManualCard->CurrentValue = ConvertToFloatString($this->ManualCard->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // DepositDate

        // DepositToBankSelect

        // DepositToBank

        // TransferToSelect

        // TransferTo

        // OpeningBalance

        // Other

        // TotalCash

        // Cheque

        // Card

        // NEFTRTGS

        // TotalTransferDepositAmount

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // CreatedUserName

        // ModifiedUserName

        // A2000Count

        // A2000Amount

        // A1000Count

        // A1000Amount

        // A500Count

        // A500Amount

        // A200Count

        // A200Amount

        // A100Count

        // A100Amount

        // A50Count

        // A50Amount

        // A20Count

        // A20Amount

        // A10Count

        // A10Amount

        // BalanceAmount

        // CashCollected

        // RTGS

        // PAYTM

        // HospID

        // ManualCash

        // ManualCard
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // DepositDate
            $this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
            $this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
            $this->DepositDate->ViewCustomAttributes = "";

            // DepositToBankSelect
            if (strval($this->DepositToBankSelect->CurrentValue) != "") {
                $this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->optionCaption($this->DepositToBankSelect->CurrentValue);
            } else {
                $this->DepositToBankSelect->ViewValue = null;
            }
            $this->DepositToBankSelect->ViewCustomAttributes = "";

            // DepositToBank
            $curVal = trim(strval($this->DepositToBank->CurrentValue));
            if ($curVal != "") {
                $this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
                if ($this->DepositToBank->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Branch_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DepositToBank->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DepositToBank->Lookup->renderViewRow($rswrk[0]);
                        $this->DepositToBank->ViewValue = $this->DepositToBank->displayValue($arwrk);
                    } else {
                        $this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
                    }
                }
            } else {
                $this->DepositToBank->ViewValue = null;
            }
            $this->DepositToBank->ViewCustomAttributes = "";

            // TransferToSelect
            $this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
            $this->TransferToSelect->ViewCustomAttributes = "";

            // TransferTo
            $curVal = trim(strval($this->TransferTo->CurrentValue));
            if ($curVal != "") {
                $this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
                if ($this->TransferTo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TransferTo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TransferTo->Lookup->renderViewRow($rswrk[0]);
                        $this->TransferTo->ViewValue = $this->TransferTo->displayValue($arwrk);
                    } else {
                        $this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
                    }
                }
            } else {
                $this->TransferTo->ViewValue = null;
            }
            $this->TransferTo->ViewCustomAttributes = "";

            // OpeningBalance
            $this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
            $this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
            $this->OpeningBalance->ViewCustomAttributes = "";

            // Other
            $this->Other->ViewValue = $this->Other->CurrentValue;
            $this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
            $this->Other->ViewCustomAttributes = "";

            // TotalCash
            $this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
            $this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
            $this->TotalCash->ViewCustomAttributes = "";

            // Cheque
            $this->Cheque->ViewValue = $this->Cheque->CurrentValue;
            $this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
            $this->Cheque->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // NEFTRTGS
            $this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
            $this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
            $this->NEFTRTGS->ViewCustomAttributes = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
            $this->TotalTransferDepositAmount->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // CreatedUserName
            $this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
            $this->CreatedUserName->ViewCustomAttributes = "";

            // ModifiedUserName
            $this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
            $this->ModifiedUserName->ViewCustomAttributes = "";

            // A2000Count
            $this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
            $this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
            $this->A2000Count->ViewCustomAttributes = "";

            // A2000Amount
            $this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
            $this->A2000Amount->ViewValue = FormatCurrency($this->A2000Amount->ViewValue, 2, -2, -2, -2);
            $this->A2000Amount->ViewCustomAttributes = "";

            // A1000Count
            $this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
            $this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
            $this->A1000Count->ViewCustomAttributes = "";

            // A1000Amount
            $this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
            $this->A1000Amount->ViewValue = FormatCurrency($this->A1000Amount->ViewValue, 2, -2, -2, -2);
            $this->A1000Amount->ViewCustomAttributes = "";

            // A500Count
            $this->A500Count->ViewValue = $this->A500Count->CurrentValue;
            $this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
            $this->A500Count->ViewCustomAttributes = "";

            // A500Amount
            $this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
            $this->A500Amount->ViewValue = FormatCurrency($this->A500Amount->ViewValue, 2, -2, -2, -2);
            $this->A500Amount->ViewCustomAttributes = "";

            // A200Count
            $this->A200Count->ViewValue = $this->A200Count->CurrentValue;
            $this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
            $this->A200Count->ViewCustomAttributes = "";

            // A200Amount
            $this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
            $this->A200Amount->ViewValue = FormatCurrency($this->A200Amount->ViewValue, 2, -2, -2, -2);
            $this->A200Amount->ViewCustomAttributes = "";

            // A100Count
            $this->A100Count->ViewValue = $this->A100Count->CurrentValue;
            $this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
            $this->A100Count->ViewCustomAttributes = "";

            // A100Amount
            $this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
            $this->A100Amount->ViewValue = FormatCurrency($this->A100Amount->ViewValue, 2, -2, -2, -2);
            $this->A100Amount->ViewCustomAttributes = "";

            // A50Count
            $this->A50Count->ViewValue = $this->A50Count->CurrentValue;
            $this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
            $this->A50Count->ViewCustomAttributes = "";

            // A50Amount
            $this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
            $this->A50Amount->ViewValue = FormatCurrency($this->A50Amount->ViewValue, 2, -2, -2, -2);
            $this->A50Amount->ViewCustomAttributes = "";

            // A20Count
            $this->A20Count->ViewValue = $this->A20Count->CurrentValue;
            $this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
            $this->A20Count->ViewCustomAttributes = "";

            // A20Amount
            $this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
            $this->A20Amount->ViewValue = FormatCurrency($this->A20Amount->ViewValue, 2, -2, -2, -2);
            $this->A20Amount->ViewCustomAttributes = "";

            // A10Count
            $this->A10Count->ViewValue = $this->A10Count->CurrentValue;
            $this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
            $this->A10Count->ViewCustomAttributes = "";

            // A10Amount
            $this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
            $this->A10Amount->ViewValue = FormatCurrency($this->A10Amount->ViewValue, 2, -2, -2, -2);
            $this->A10Amount->ViewCustomAttributes = "";

            // BalanceAmount
            $this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
            $this->BalanceAmount->ViewValue = FormatCurrency($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
            $this->BalanceAmount->ViewCustomAttributes = "";

            // CashCollected
            $this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
            $this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
            $this->CashCollected->ViewCustomAttributes = "";

            // RTGS
            $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
            $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
            $this->RTGS->ViewCustomAttributes = "";

            // PAYTM
            $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
            $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
            $this->PAYTM->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // ManualCash
            $this->ManualCash->ViewValue = $this->ManualCash->CurrentValue;
            $this->ManualCash->ViewValue = FormatNumber($this->ManualCash->ViewValue, 2, -2, -2, -2);
            $this->ManualCash->ViewCustomAttributes = "";

            // ManualCard
            $this->ManualCard->ViewValue = $this->ManualCard->CurrentValue;
            $this->ManualCard->ViewValue = FormatNumber($this->ManualCard->ViewValue, 2, -2, -2, -2);
            $this->ManualCard->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // DepositDate
            $this->DepositDate->LinkCustomAttributes = "";
            $this->DepositDate->HrefValue = "";
            $this->DepositDate->TooltipValue = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->LinkCustomAttributes = "";
            $this->DepositToBankSelect->HrefValue = "";
            $this->DepositToBankSelect->TooltipValue = "";

            // DepositToBank
            $this->DepositToBank->LinkCustomAttributes = "";
            $this->DepositToBank->HrefValue = "";
            $this->DepositToBank->TooltipValue = "";

            // TransferToSelect
            $this->TransferToSelect->LinkCustomAttributes = "";
            $this->TransferToSelect->HrefValue = "";
            $this->TransferToSelect->TooltipValue = "";

            // TransferTo
            $this->TransferTo->LinkCustomAttributes = "";
            $this->TransferTo->HrefValue = "";
            $this->TransferTo->TooltipValue = "";

            // OpeningBalance
            $this->OpeningBalance->LinkCustomAttributes = "";
            $this->OpeningBalance->HrefValue = "";
            $this->OpeningBalance->TooltipValue = "";

            // Other
            $this->Other->LinkCustomAttributes = "";
            $this->Other->HrefValue = "";
            $this->Other->TooltipValue = "";

            // TotalCash
            $this->TotalCash->LinkCustomAttributes = "";
            $this->TotalCash->HrefValue = "";
            $this->TotalCash->TooltipValue = "";

            // Cheque
            $this->Cheque->LinkCustomAttributes = "";
            $this->Cheque->HrefValue = "";
            $this->Cheque->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // NEFTRTGS
            $this->NEFTRTGS->LinkCustomAttributes = "";
            $this->NEFTRTGS->HrefValue = "";
            $this->NEFTRTGS->TooltipValue = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
            $this->TotalTransferDepositAmount->HrefValue = "";
            $this->TotalTransferDepositAmount->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // CreatedUserName
            $this->CreatedUserName->LinkCustomAttributes = "";
            $this->CreatedUserName->HrefValue = "";
            $this->CreatedUserName->TooltipValue = "";

            // ModifiedUserName
            $this->ModifiedUserName->LinkCustomAttributes = "";
            $this->ModifiedUserName->HrefValue = "";
            $this->ModifiedUserName->TooltipValue = "";

            // A2000Count
            $this->A2000Count->LinkCustomAttributes = "";
            $this->A2000Count->HrefValue = "";
            $this->A2000Count->TooltipValue = "";

            // A2000Amount
            $this->A2000Amount->LinkCustomAttributes = "";
            $this->A2000Amount->HrefValue = "";
            $this->A2000Amount->TooltipValue = "";

            // A1000Count
            $this->A1000Count->LinkCustomAttributes = "";
            $this->A1000Count->HrefValue = "";
            $this->A1000Count->TooltipValue = "";

            // A1000Amount
            $this->A1000Amount->LinkCustomAttributes = "";
            $this->A1000Amount->HrefValue = "";
            $this->A1000Amount->TooltipValue = "";

            // A500Count
            $this->A500Count->LinkCustomAttributes = "";
            $this->A500Count->HrefValue = "";
            $this->A500Count->TooltipValue = "";

            // A500Amount
            $this->A500Amount->LinkCustomAttributes = "";
            $this->A500Amount->HrefValue = "";
            $this->A500Amount->TooltipValue = "";

            // A200Count
            $this->A200Count->LinkCustomAttributes = "";
            $this->A200Count->HrefValue = "";
            $this->A200Count->TooltipValue = "";

            // A200Amount
            $this->A200Amount->LinkCustomAttributes = "";
            $this->A200Amount->HrefValue = "";
            $this->A200Amount->TooltipValue = "";

            // A100Count
            $this->A100Count->LinkCustomAttributes = "";
            $this->A100Count->HrefValue = "";
            $this->A100Count->TooltipValue = "";

            // A100Amount
            $this->A100Amount->LinkCustomAttributes = "";
            $this->A100Amount->HrefValue = "";
            $this->A100Amount->TooltipValue = "";

            // A50Count
            $this->A50Count->LinkCustomAttributes = "";
            $this->A50Count->HrefValue = "";
            $this->A50Count->TooltipValue = "";

            // A50Amount
            $this->A50Amount->LinkCustomAttributes = "";
            $this->A50Amount->HrefValue = "";
            $this->A50Amount->TooltipValue = "";

            // A20Count
            $this->A20Count->LinkCustomAttributes = "";
            $this->A20Count->HrefValue = "";
            $this->A20Count->TooltipValue = "";

            // A20Amount
            $this->A20Amount->LinkCustomAttributes = "";
            $this->A20Amount->HrefValue = "";
            $this->A20Amount->TooltipValue = "";

            // A10Count
            $this->A10Count->LinkCustomAttributes = "";
            $this->A10Count->HrefValue = "";
            $this->A10Count->TooltipValue = "";

            // A10Amount
            $this->A10Amount->LinkCustomAttributes = "";
            $this->A10Amount->HrefValue = "";
            $this->A10Amount->TooltipValue = "";

            // BalanceAmount
            $this->BalanceAmount->LinkCustomAttributes = "";
            $this->BalanceAmount->HrefValue = "";
            $this->BalanceAmount->TooltipValue = "";

            // CashCollected
            $this->CashCollected->LinkCustomAttributes = "";
            $this->CashCollected->HrefValue = "";
            $this->CashCollected->TooltipValue = "";

            // RTGS
            $this->RTGS->LinkCustomAttributes = "";
            $this->RTGS->HrefValue = "";
            $this->RTGS->TooltipValue = "";

            // PAYTM
            $this->PAYTM->LinkCustomAttributes = "";
            $this->PAYTM->HrefValue = "";
            $this->PAYTM->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ManualCash
            $this->ManualCash->LinkCustomAttributes = "";
            $this->ManualCash->HrefValue = "";
            $this->ManualCash->TooltipValue = "";

            // ManualCard
            $this->ManualCard->LinkCustomAttributes = "";
            $this->ManualCard->HrefValue = "";
            $this->ManualCard->TooltipValue = "";
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

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fdepositdetailsview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fdepositdetailsview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fdepositdetailsview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
            }
        } elseif (SameText($type, "html")) {
            return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
        } elseif (SameText($type, "xml")) {
            return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
        } elseif (SameText($type, "csv")) {
            return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
        } elseif (SameText($type, "email")) {
            $url = $custom ? ",url:'" . $pageUrl . "export=email&amp;custom=1'" : "";
            return '<button id="emf_depositdetails" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_depositdetails\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fdepositdetailsview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
        } elseif (SameText($type, "print")) {
            return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
        }
    }

    // Set up export options
    protected function setupExportOptions()
    {
        global $Language;

        // Printer friendly
        $item = &$this->ExportOptions->add("print");
        $item->Body = $this->getExportTag("print");
        $item->Visible = true;

        // Export to Excel
        $item = &$this->ExportOptions->add("excel");
        $item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word", $this->ExportWordCustom);
        $item->Visible = true;

        // Export to Html
        $item = &$this->ExportOptions->add("html");
        $item->Body = $this->getExportTag("html");
        $item->Visible = true;

        // Export to Xml
        $item = &$this->ExportOptions->add("xml");
        $item->Body = $this->getExportTag("xml");
        $item->Visible = true;

        // Export to Csv
        $item = &$this->ExportOptions->add("csv");
        $item->Body = $this->getExportTag("csv");
        $item->Visible = true;

        // Export to Pdf
        $item = &$this->ExportOptions->add("pdf");
        $item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
        $item->Visible = true;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
        $item->Visible = false;

        // Drop down button for export
        $this->ExportOptions->UseButtonGroup = true;
        $this->ExportOptions->UseDropDownButton = true;
        if ($this->ExportOptions->UseButtonGroup && IsMobile()) {
            $this->ExportOptions->UseDropDownButton = true;
        }
        $this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

        // Add group option item
        $item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide options for export
        if ($this->isExport()) {
            $this->ExportOptions->hideAllOptions();
        }
    }

    /**
    * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
    *
    * @param bool $return Return the data rather than output it
    * @return mixed
    */
    public function exportData($return = false)
    {
        global $Language;
        $utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");

        // Load recordset
        if (!$this->Recordset) {
            $this->Recordset = $this->loadRecordset();
        }
        $rs = &$this->Recordset;
        if ($rs) {
            $this->TotalRecords = $rs->recordCount();
        }
        $this->StartRecord = 1;
        $this->setupStartRecord(); // Set up start record position

        // Set the last record to display
        if ($this->DisplayRecords <= 0) {
            $this->StopRecord = $this->TotalRecords;
        } else {
            $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
        }
        $this->ExportDoc = GetExportDocument($this, "v");
        $doc = &$this->ExportDoc;
        if (!$doc) {
            $this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
        }
        if (!$rs || !$doc) {
            RemoveHeader("Content-Type"); // Remove header
            RemoveHeader("Content-Disposition");
            $this->showMessage();
            return;
        }
        $this->StartRecord = 1;
        $this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;

        // Call Page Exporting server event
        $this->ExportDoc->ExportCustom = !$this->pageExporting();
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "view");
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        $doc->Text .= $footer;

        // Close recordset
        $rs->close();

        // Call Page Exported server event
        $this->pageExported();

        // Export header and footer
        $doc->exportHeaderAndFooter();

        // Clean output buffer (without destroying output buffer)
        $buffer = ob_get_contents(); // Save the output buffer
        if (!Config("DEBUG") && $buffer) {
            ob_clean();
        }

        // Write debug message if enabled
        if (Config("DEBUG") && !$this->isExport("pdf")) {
            echo GetDebugMessage();
        }

        // Output data
        if ($this->isExport("email")) {
            // Export-to-email disabled
        } else {
            $doc->export();
            if ($return) {
                RemoveHeader("Content-Type"); // Remove header
                RemoveHeader("Content-Disposition");
                $content = ob_get_contents();
                if ($content) {
                    ob_clean();
                }
                if ($buffer) {
                    echo $buffer; // Resume the output buffer
                }
                return $content;
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DepositdetailsList"), "", $this->TableVar, true);
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
                case "x_DepositToBankSelect":
                    break;
                case "x_DepositToBank":
                    break;
                case "x_TransferTo":
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

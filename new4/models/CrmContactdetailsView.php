<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmContactdetailsView extends CrmContactdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_contactdetails';

    // Page object name
    public $PageObjName = "CrmContactdetailsView";

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

        // Table object (crm_contactdetails)
        if (!isset($GLOBALS["crm_contactdetails"]) || get_class($GLOBALS["crm_contactdetails"]) == PROJECT_NAMESPACE . "crm_contactdetails") {
            $GLOBALS["crm_contactdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        if (($keyValue = Get("contactid") ?? Route("contactid")) !== null) {
            $this->RecKey["contactid"] = $keyValue;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactdetails');
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
                $doc = new $class(Container("crm_contactdetails"));
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
                    if ($pageName == "CrmContactdetailsView") {
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
            $key .= @$ar['contactid'];
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
        if (Get("contactid") !== null) {
            if ($ExportFileName != "") {
                $ExportFileName .= "_";
            }
            $ExportFileName .= Get("contactid");
        }

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

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
        $this->contactid->setVisibility();
        $this->contact_no->setVisibility();
        $this->parentid->setVisibility();
        $this->salutation->setVisibility();
        $this->firstname->setVisibility();
        $this->lastname->setVisibility();
        $this->_email->setVisibility();
        $this->phone->setVisibility();
        $this->mobile->setVisibility();
        $this->reportsto->setVisibility();
        $this->training->setVisibility();
        $this->usertype->setVisibility();
        $this->contacttype->setVisibility();
        $this->otheremail->setVisibility();
        $this->donotcall->setVisibility();
        $this->emailoptout->setVisibility();
        $this->imagename->setVisibility();
        $this->isconvertedfromlead->setVisibility();
        $this->verification->setVisibility();
        $this->secondary_email->setVisibility();
        $this->notifilanguage->setVisibility();
        $this->contactstatus->setVisibility();
        $this->dav_status->setVisibility();
        $this->jobtitle->setVisibility();
        $this->decision_maker->setVisibility();
        $this->sum_time->setVisibility();
        $this->phone_extra->setVisibility();
        $this->mobile_extra->setVisibility();
        $this->approvals->setVisibility();
        $this->gender->setVisibility();
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
            if (($keyValue = Get("contactid") ?? Route("contactid")) !== null) {
                $this->contactid->setQueryStringValue($keyValue);
                $this->RecKey["contactid"] = $this->contactid->QueryStringValue;
            } elseif (Post("contactid") !== null) {
                $this->contactid->setFormValue(Post("contactid"));
                $this->RecKey["contactid"] = $this->contactid->FormValue;
            } elseif (IsApi() && ($keyValue = Key(0) ?? Route(2)) !== null) {
                $this->contactid->setQueryStringValue($keyValue);
                $this->RecKey["contactid"] = $this->contactid->QueryStringValue;
            } else {
                $returnUrl = "CrmContactdetailsList"; // Return to list
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
                        $returnUrl = "CrmContactdetailsList"; // No matching record, return to list
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
            $returnUrl = "CrmContactdetailsList"; // Not page request, return to list
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
        $this->contactid->setDbValue($row['contactid']);
        $this->contact_no->setDbValue($row['contact_no']);
        $this->parentid->setDbValue($row['parentid']);
        $this->salutation->setDbValue($row['salutation']);
        $this->firstname->setDbValue($row['firstname']);
        $this->lastname->setDbValue($row['lastname']);
        $this->_email->setDbValue($row['email']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->reportsto->setDbValue($row['reportsto']);
        $this->training->setDbValue($row['training']);
        $this->usertype->setDbValue($row['usertype']);
        $this->contacttype->setDbValue($row['contacttype']);
        $this->otheremail->setDbValue($row['otheremail']);
        $this->donotcall->setDbValue($row['donotcall']);
        $this->emailoptout->setDbValue($row['emailoptout']);
        $this->imagename->setDbValue($row['imagename']);
        $this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
        $this->verification->setDbValue($row['verification']);
        $this->secondary_email->setDbValue($row['secondary_email']);
        $this->notifilanguage->setDbValue($row['notifilanguage']);
        $this->contactstatus->setDbValue($row['contactstatus']);
        $this->dav_status->setDbValue($row['dav_status']);
        $this->jobtitle->setDbValue($row['jobtitle']);
        $this->decision_maker->setDbValue($row['decision_maker']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->approvals->setDbValue($row['approvals']);
        $this->gender->setDbValue($row['gender']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['contactid'] = null;
        $row['contact_no'] = null;
        $row['parentid'] = null;
        $row['salutation'] = null;
        $row['firstname'] = null;
        $row['lastname'] = null;
        $row['email'] = null;
        $row['phone'] = null;
        $row['mobile'] = null;
        $row['reportsto'] = null;
        $row['training'] = null;
        $row['usertype'] = null;
        $row['contacttype'] = null;
        $row['otheremail'] = null;
        $row['donotcall'] = null;
        $row['emailoptout'] = null;
        $row['imagename'] = null;
        $row['isconvertedfromlead'] = null;
        $row['verification'] = null;
        $row['secondary_email'] = null;
        $row['notifilanguage'] = null;
        $row['contactstatus'] = null;
        $row['dav_status'] = null;
        $row['jobtitle'] = null;
        $row['decision_maker'] = null;
        $row['sum_time'] = null;
        $row['phone_extra'] = null;
        $row['mobile_extra'] = null;
        $row['approvals'] = null;
        $row['gender'] = null;
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
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // contactid

        // contact_no

        // parentid

        // salutation

        // firstname

        // lastname

        // email

        // phone

        // mobile

        // reportsto

        // training

        // usertype

        // contacttype

        // otheremail

        // donotcall

        // emailoptout

        // imagename

        // isconvertedfromlead

        // verification

        // secondary_email

        // notifilanguage

        // contactstatus

        // dav_status

        // jobtitle

        // decision_maker

        // sum_time

        // phone_extra

        // mobile_extra

        // approvals

        // gender
        if ($this->RowType == ROWTYPE_VIEW) {
            // contactid
            $this->contactid->ViewValue = $this->contactid->CurrentValue;
            $this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
            $this->contactid->ViewCustomAttributes = "";

            // contact_no
            $this->contact_no->ViewValue = $this->contact_no->CurrentValue;
            $this->contact_no->ViewCustomAttributes = "";

            // parentid
            $this->parentid->ViewValue = $this->parentid->CurrentValue;
            $this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
            $this->parentid->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // phone
            $this->phone->ViewValue = $this->phone->CurrentValue;
            $this->phone->ViewCustomAttributes = "";

            // mobile
            $this->mobile->ViewValue = $this->mobile->CurrentValue;
            $this->mobile->ViewCustomAttributes = "";

            // reportsto
            $this->reportsto->ViewValue = $this->reportsto->CurrentValue;
            $this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
            $this->reportsto->ViewCustomAttributes = "";

            // training
            $this->training->ViewValue = $this->training->CurrentValue;
            $this->training->ViewCustomAttributes = "";

            // usertype
            $this->usertype->ViewValue = $this->usertype->CurrentValue;
            $this->usertype->ViewCustomAttributes = "";

            // contacttype
            $this->contacttype->ViewValue = $this->contacttype->CurrentValue;
            $this->contacttype->ViewCustomAttributes = "";

            // otheremail
            $this->otheremail->ViewValue = $this->otheremail->CurrentValue;
            $this->otheremail->ViewCustomAttributes = "";

            // donotcall
            $this->donotcall->ViewValue = $this->donotcall->CurrentValue;
            $this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
            $this->donotcall->ViewCustomAttributes = "";

            // emailoptout
            $this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
            $this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
            $this->emailoptout->ViewCustomAttributes = "";

            // imagename
            $this->imagename->ViewValue = $this->imagename->CurrentValue;
            $this->imagename->ViewCustomAttributes = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
            $this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
            $this->isconvertedfromlead->ViewCustomAttributes = "";

            // verification
            $this->verification->ViewValue = $this->verification->CurrentValue;
            $this->verification->ViewCustomAttributes = "";

            // secondary_email
            $this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
            $this->secondary_email->ViewCustomAttributes = "";

            // notifilanguage
            $this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
            $this->notifilanguage->ViewCustomAttributes = "";

            // contactstatus
            $this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
            $this->contactstatus->ViewCustomAttributes = "";

            // dav_status
            $this->dav_status->ViewValue = $this->dav_status->CurrentValue;
            $this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
            $this->dav_status->ViewCustomAttributes = "";

            // jobtitle
            $this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
            $this->jobtitle->ViewCustomAttributes = "";

            // decision_maker
            $this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
            $this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
            $this->decision_maker->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // phone_extra
            $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
            $this->phone_extra->ViewCustomAttributes = "";

            // mobile_extra
            $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
            $this->mobile_extra->ViewCustomAttributes = "";

            // approvals
            $this->approvals->ViewValue = $this->approvals->CurrentValue;
            $this->approvals->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // contactid
            $this->contactid->LinkCustomAttributes = "";
            $this->contactid->HrefValue = "";
            $this->contactid->TooltipValue = "";

            // contact_no
            $this->contact_no->LinkCustomAttributes = "";
            $this->contact_no->HrefValue = "";
            $this->contact_no->TooltipValue = "";

            // parentid
            $this->parentid->LinkCustomAttributes = "";
            $this->parentid->HrefValue = "";
            $this->parentid->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";
            $this->phone->TooltipValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";
            $this->mobile->TooltipValue = "";

            // reportsto
            $this->reportsto->LinkCustomAttributes = "";
            $this->reportsto->HrefValue = "";
            $this->reportsto->TooltipValue = "";

            // training
            $this->training->LinkCustomAttributes = "";
            $this->training->HrefValue = "";
            $this->training->TooltipValue = "";

            // usertype
            $this->usertype->LinkCustomAttributes = "";
            $this->usertype->HrefValue = "";
            $this->usertype->TooltipValue = "";

            // contacttype
            $this->contacttype->LinkCustomAttributes = "";
            $this->contacttype->HrefValue = "";
            $this->contacttype->TooltipValue = "";

            // otheremail
            $this->otheremail->LinkCustomAttributes = "";
            $this->otheremail->HrefValue = "";
            $this->otheremail->TooltipValue = "";

            // donotcall
            $this->donotcall->LinkCustomAttributes = "";
            $this->donotcall->HrefValue = "";
            $this->donotcall->TooltipValue = "";

            // emailoptout
            $this->emailoptout->LinkCustomAttributes = "";
            $this->emailoptout->HrefValue = "";
            $this->emailoptout->TooltipValue = "";

            // imagename
            $this->imagename->LinkCustomAttributes = "";
            $this->imagename->HrefValue = "";
            $this->imagename->TooltipValue = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->LinkCustomAttributes = "";
            $this->isconvertedfromlead->HrefValue = "";
            $this->isconvertedfromlead->TooltipValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";
            $this->verification->TooltipValue = "";

            // secondary_email
            $this->secondary_email->LinkCustomAttributes = "";
            $this->secondary_email->HrefValue = "";
            $this->secondary_email->TooltipValue = "";

            // notifilanguage
            $this->notifilanguage->LinkCustomAttributes = "";
            $this->notifilanguage->HrefValue = "";
            $this->notifilanguage->TooltipValue = "";

            // contactstatus
            $this->contactstatus->LinkCustomAttributes = "";
            $this->contactstatus->HrefValue = "";
            $this->contactstatus->TooltipValue = "";

            // dav_status
            $this->dav_status->LinkCustomAttributes = "";
            $this->dav_status->HrefValue = "";
            $this->dav_status->TooltipValue = "";

            // jobtitle
            $this->jobtitle->LinkCustomAttributes = "";
            $this->jobtitle->HrefValue = "";
            $this->jobtitle->TooltipValue = "";

            // decision_maker
            $this->decision_maker->LinkCustomAttributes = "";
            $this->decision_maker->HrefValue = "";
            $this->decision_maker->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";
            $this->phone_extra->TooltipValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";
            $this->mobile_extra->TooltipValue = "";

            // approvals
            $this->approvals->LinkCustomAttributes = "";
            $this->approvals->HrefValue = "";
            $this->approvals->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailsview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailsview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailsview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_crm_contactdetails" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_crm_contactdetails\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fcrm_contactdetailsview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = $this->getExportTag("excel");
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word");
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
        $item->Body = $this->getExportTag("pdf");
        $item->Visible = true;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmContactdetailsList"), "", $this->TableVar, true);
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

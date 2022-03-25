<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmLeaddetailsView extends CrmLeaddetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_leaddetails';

    // Page object name
    public $PageObjName = "CrmLeaddetailsView";

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

        // Table object (crm_leaddetails)
        if (!isset($GLOBALS["crm_leaddetails"]) || get_class($GLOBALS["crm_leaddetails"]) == PROJECT_NAMESPACE . "crm_leaddetails") {
            $GLOBALS["crm_leaddetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        if (($keyValue = Get("leadid") ?? Route("leadid")) !== null) {
            $this->RecKey["leadid"] = $keyValue;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leaddetails');
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
                $doc = new $class(Container("crm_leaddetails"));
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
                    if ($pageName == "CrmLeaddetailsView") {
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
            $key .= @$ar['leadid'];
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
        if (Get("leadid") !== null) {
            if ($ExportFileName != "") {
                $ExportFileName .= "_";
            }
            $ExportFileName .= Get("leadid");
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
        $this->leadid->setVisibility();
        $this->lead_no->setVisibility();
        $this->_email->setVisibility();
        $this->interest->setVisibility();
        $this->firstname->setVisibility();
        $this->salutation->setVisibility();
        $this->lastname->setVisibility();
        $this->company->setVisibility();
        $this->annualrevenue->setVisibility();
        $this->industry->setVisibility();
        $this->campaign->setVisibility();
        $this->leadstatus->setVisibility();
        $this->leadsource->setVisibility();
        $this->converted->setVisibility();
        $this->licencekeystatus->setVisibility();
        $this->space->setVisibility();
        $this->comments->setVisibility();
        $this->priority->setVisibility();
        $this->demorequest->setVisibility();
        $this->partnercontact->setVisibility();
        $this->productversion->setVisibility();
        $this->product->setVisibility();
        $this->maildate->setVisibility();
        $this->nextstepdate->setVisibility();
        $this->fundingsituation->setVisibility();
        $this->purpose->setVisibility();
        $this->evaluationstatus->setVisibility();
        $this->transferdate->setVisibility();
        $this->revenuetype->setVisibility();
        $this->noofemployees->setVisibility();
        $this->secondaryemail->setVisibility();
        $this->noapprovalcalls->setVisibility();
        $this->noapprovalemails->setVisibility();
        $this->vat_id->setVisibility();
        $this->registration_number_1->setVisibility();
        $this->registration_number_2->setVisibility();
        $this->verification->setVisibility();
        $this->subindustry->setVisibility();
        $this->atenttion->setVisibility();
        $this->leads_relation->setVisibility();
        $this->legal_form->setVisibility();
        $this->sum_time->setVisibility();
        $this->active->setVisibility();
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
            if (($keyValue = Get("leadid") ?? Route("leadid")) !== null) {
                $this->leadid->setQueryStringValue($keyValue);
                $this->RecKey["leadid"] = $this->leadid->QueryStringValue;
            } elseif (Post("leadid") !== null) {
                $this->leadid->setFormValue(Post("leadid"));
                $this->RecKey["leadid"] = $this->leadid->FormValue;
            } elseif (IsApi() && ($keyValue = Key(0) ?? Route(2)) !== null) {
                $this->leadid->setQueryStringValue($keyValue);
                $this->RecKey["leadid"] = $this->leadid->QueryStringValue;
            } else {
                $returnUrl = "CrmLeaddetailsList"; // Return to list
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
                        $returnUrl = "CrmLeaddetailsList"; // No matching record, return to list
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
            $returnUrl = "CrmLeaddetailsList"; // Not page request, return to list
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
        $this->leadid->setDbValue($row['leadid']);
        $this->lead_no->setDbValue($row['lead_no']);
        $this->_email->setDbValue($row['email']);
        $this->interest->setDbValue($row['interest']);
        $this->firstname->setDbValue($row['firstname']);
        $this->salutation->setDbValue($row['salutation']);
        $this->lastname->setDbValue($row['lastname']);
        $this->company->setDbValue($row['company']);
        $this->annualrevenue->setDbValue($row['annualrevenue']);
        $this->industry->setDbValue($row['industry']);
        $this->campaign->setDbValue($row['campaign']);
        $this->leadstatus->setDbValue($row['leadstatus']);
        $this->leadsource->setDbValue($row['leadsource']);
        $this->converted->setDbValue($row['converted']);
        $this->licencekeystatus->setDbValue($row['licencekeystatus']);
        $this->space->setDbValue($row['space']);
        $this->comments->setDbValue($row['comments']);
        $this->priority->setDbValue($row['priority']);
        $this->demorequest->setDbValue($row['demorequest']);
        $this->partnercontact->setDbValue($row['partnercontact']);
        $this->productversion->setDbValue($row['productversion']);
        $this->product->setDbValue($row['product']);
        $this->maildate->setDbValue($row['maildate']);
        $this->nextstepdate->setDbValue($row['nextstepdate']);
        $this->fundingsituation->setDbValue($row['fundingsituation']);
        $this->purpose->setDbValue($row['purpose']);
        $this->evaluationstatus->setDbValue($row['evaluationstatus']);
        $this->transferdate->setDbValue($row['transferdate']);
        $this->revenuetype->setDbValue($row['revenuetype']);
        $this->noofemployees->setDbValue($row['noofemployees']);
        $this->secondaryemail->setDbValue($row['secondaryemail']);
        $this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
        $this->noapprovalemails->setDbValue($row['noapprovalemails']);
        $this->vat_id->setDbValue($row['vat_id']);
        $this->registration_number_1->setDbValue($row['registration_number_1']);
        $this->registration_number_2->setDbValue($row['registration_number_2']);
        $this->verification->setDbValue($row['verification']);
        $this->subindustry->setDbValue($row['subindustry']);
        $this->atenttion->setDbValue($row['atenttion']);
        $this->leads_relation->setDbValue($row['leads_relation']);
        $this->legal_form->setDbValue($row['legal_form']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->active->setDbValue($row['active']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['leadid'] = null;
        $row['lead_no'] = null;
        $row['email'] = null;
        $row['interest'] = null;
        $row['firstname'] = null;
        $row['salutation'] = null;
        $row['lastname'] = null;
        $row['company'] = null;
        $row['annualrevenue'] = null;
        $row['industry'] = null;
        $row['campaign'] = null;
        $row['leadstatus'] = null;
        $row['leadsource'] = null;
        $row['converted'] = null;
        $row['licencekeystatus'] = null;
        $row['space'] = null;
        $row['comments'] = null;
        $row['priority'] = null;
        $row['demorequest'] = null;
        $row['partnercontact'] = null;
        $row['productversion'] = null;
        $row['product'] = null;
        $row['maildate'] = null;
        $row['nextstepdate'] = null;
        $row['fundingsituation'] = null;
        $row['purpose'] = null;
        $row['evaluationstatus'] = null;
        $row['transferdate'] = null;
        $row['revenuetype'] = null;
        $row['noofemployees'] = null;
        $row['secondaryemail'] = null;
        $row['noapprovalcalls'] = null;
        $row['noapprovalemails'] = null;
        $row['vat_id'] = null;
        $row['registration_number_1'] = null;
        $row['registration_number_2'] = null;
        $row['verification'] = null;
        $row['subindustry'] = null;
        $row['atenttion'] = null;
        $row['leads_relation'] = null;
        $row['legal_form'] = null;
        $row['sum_time'] = null;
        $row['active'] = null;
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
        if ($this->annualrevenue->FormValue == $this->annualrevenue->CurrentValue && is_numeric(ConvertToFloatString($this->annualrevenue->CurrentValue))) {
            $this->annualrevenue->CurrentValue = ConvertToFloatString($this->annualrevenue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // leadid

        // lead_no

        // email

        // interest

        // firstname

        // salutation

        // lastname

        // company

        // annualrevenue

        // industry

        // campaign

        // leadstatus

        // leadsource

        // converted

        // licencekeystatus

        // space

        // comments

        // priority

        // demorequest

        // partnercontact

        // productversion

        // product

        // maildate

        // nextstepdate

        // fundingsituation

        // purpose

        // evaluationstatus

        // transferdate

        // revenuetype

        // noofemployees

        // secondaryemail

        // noapprovalcalls

        // noapprovalemails

        // vat_id

        // registration_number_1

        // registration_number_2

        // verification

        // subindustry

        // atenttion

        // leads_relation

        // legal_form

        // sum_time

        // active
        if ($this->RowType == ROWTYPE_VIEW) {
            // leadid
            $this->leadid->ViewValue = $this->leadid->CurrentValue;
            $this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
            $this->leadid->ViewCustomAttributes = "";

            // lead_no
            $this->lead_no->ViewValue = $this->lead_no->CurrentValue;
            $this->lead_no->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // interest
            $this->interest->ViewValue = $this->interest->CurrentValue;
            $this->interest->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // company
            $this->company->ViewValue = $this->company->CurrentValue;
            $this->company->ViewCustomAttributes = "";

            // annualrevenue
            $this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
            $this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
            $this->annualrevenue->ViewCustomAttributes = "";

            // industry
            $this->industry->ViewValue = $this->industry->CurrentValue;
            $this->industry->ViewCustomAttributes = "";

            // campaign
            $this->campaign->ViewValue = $this->campaign->CurrentValue;
            $this->campaign->ViewCustomAttributes = "";

            // leadstatus
            $this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
            $this->leadstatus->ViewCustomAttributes = "";

            // leadsource
            $this->leadsource->ViewValue = $this->leadsource->CurrentValue;
            $this->leadsource->ViewCustomAttributes = "";

            // converted
            $this->converted->ViewValue = $this->converted->CurrentValue;
            $this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
            $this->converted->ViewCustomAttributes = "";

            // licencekeystatus
            $this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
            $this->licencekeystatus->ViewCustomAttributes = "";

            // space
            $this->space->ViewValue = $this->space->CurrentValue;
            $this->space->ViewCustomAttributes = "";

            // comments
            $this->comments->ViewValue = $this->comments->CurrentValue;
            $this->comments->ViewCustomAttributes = "";

            // priority
            $this->priority->ViewValue = $this->priority->CurrentValue;
            $this->priority->ViewCustomAttributes = "";

            // demorequest
            $this->demorequest->ViewValue = $this->demorequest->CurrentValue;
            $this->demorequest->ViewCustomAttributes = "";

            // partnercontact
            $this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
            $this->partnercontact->ViewCustomAttributes = "";

            // productversion
            $this->productversion->ViewValue = $this->productversion->CurrentValue;
            $this->productversion->ViewCustomAttributes = "";

            // product
            $this->product->ViewValue = $this->product->CurrentValue;
            $this->product->ViewCustomAttributes = "";

            // maildate
            $this->maildate->ViewValue = $this->maildate->CurrentValue;
            $this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
            $this->maildate->ViewCustomAttributes = "";

            // nextstepdate
            $this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
            $this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
            $this->nextstepdate->ViewCustomAttributes = "";

            // fundingsituation
            $this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
            $this->fundingsituation->ViewCustomAttributes = "";

            // purpose
            $this->purpose->ViewValue = $this->purpose->CurrentValue;
            $this->purpose->ViewCustomAttributes = "";

            // evaluationstatus
            $this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
            $this->evaluationstatus->ViewCustomAttributes = "";

            // transferdate
            $this->transferdate->ViewValue = $this->transferdate->CurrentValue;
            $this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
            $this->transferdate->ViewCustomAttributes = "";

            // revenuetype
            $this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
            $this->revenuetype->ViewCustomAttributes = "";

            // noofemployees
            $this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
            $this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
            $this->noofemployees->ViewCustomAttributes = "";

            // secondaryemail
            $this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
            $this->secondaryemail->ViewCustomAttributes = "";

            // noapprovalcalls
            $this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
            $this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
            $this->noapprovalcalls->ViewCustomAttributes = "";

            // noapprovalemails
            $this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
            $this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
            $this->noapprovalemails->ViewCustomAttributes = "";

            // vat_id
            $this->vat_id->ViewValue = $this->vat_id->CurrentValue;
            $this->vat_id->ViewCustomAttributes = "";

            // registration_number_1
            $this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
            $this->registration_number_1->ViewCustomAttributes = "";

            // registration_number_2
            $this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
            $this->registration_number_2->ViewCustomAttributes = "";

            // verification
            $this->verification->ViewValue = $this->verification->CurrentValue;
            $this->verification->ViewCustomAttributes = "";

            // subindustry
            $this->subindustry->ViewValue = $this->subindustry->CurrentValue;
            $this->subindustry->ViewCustomAttributes = "";

            // atenttion
            $this->atenttion->ViewValue = $this->atenttion->CurrentValue;
            $this->atenttion->ViewCustomAttributes = "";

            // leads_relation
            $this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
            $this->leads_relation->ViewCustomAttributes = "";

            // legal_form
            $this->legal_form->ViewValue = $this->legal_form->CurrentValue;
            $this->legal_form->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // active
            $this->active->ViewValue = $this->active->CurrentValue;
            $this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
            $this->active->ViewCustomAttributes = "";

            // leadid
            $this->leadid->LinkCustomAttributes = "";
            $this->leadid->HrefValue = "";
            $this->leadid->TooltipValue = "";

            // lead_no
            $this->lead_no->LinkCustomAttributes = "";
            $this->lead_no->HrefValue = "";
            $this->lead_no->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // interest
            $this->interest->LinkCustomAttributes = "";
            $this->interest->HrefValue = "";
            $this->interest->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";
            $this->company->TooltipValue = "";

            // annualrevenue
            $this->annualrevenue->LinkCustomAttributes = "";
            $this->annualrevenue->HrefValue = "";
            $this->annualrevenue->TooltipValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";
            $this->industry->TooltipValue = "";

            // campaign
            $this->campaign->LinkCustomAttributes = "";
            $this->campaign->HrefValue = "";
            $this->campaign->TooltipValue = "";

            // leadstatus
            $this->leadstatus->LinkCustomAttributes = "";
            $this->leadstatus->HrefValue = "";
            $this->leadstatus->TooltipValue = "";

            // leadsource
            $this->leadsource->LinkCustomAttributes = "";
            $this->leadsource->HrefValue = "";
            $this->leadsource->TooltipValue = "";

            // converted
            $this->converted->LinkCustomAttributes = "";
            $this->converted->HrefValue = "";
            $this->converted->TooltipValue = "";

            // licencekeystatus
            $this->licencekeystatus->LinkCustomAttributes = "";
            $this->licencekeystatus->HrefValue = "";
            $this->licencekeystatus->TooltipValue = "";

            // space
            $this->space->LinkCustomAttributes = "";
            $this->space->HrefValue = "";
            $this->space->TooltipValue = "";

            // comments
            $this->comments->LinkCustomAttributes = "";
            $this->comments->HrefValue = "";
            $this->comments->TooltipValue = "";

            // priority
            $this->priority->LinkCustomAttributes = "";
            $this->priority->HrefValue = "";
            $this->priority->TooltipValue = "";

            // demorequest
            $this->demorequest->LinkCustomAttributes = "";
            $this->demorequest->HrefValue = "";
            $this->demorequest->TooltipValue = "";

            // partnercontact
            $this->partnercontact->LinkCustomAttributes = "";
            $this->partnercontact->HrefValue = "";
            $this->partnercontact->TooltipValue = "";

            // productversion
            $this->productversion->LinkCustomAttributes = "";
            $this->productversion->HrefValue = "";
            $this->productversion->TooltipValue = "";

            // product
            $this->product->LinkCustomAttributes = "";
            $this->product->HrefValue = "";
            $this->product->TooltipValue = "";

            // maildate
            $this->maildate->LinkCustomAttributes = "";
            $this->maildate->HrefValue = "";
            $this->maildate->TooltipValue = "";

            // nextstepdate
            $this->nextstepdate->LinkCustomAttributes = "";
            $this->nextstepdate->HrefValue = "";
            $this->nextstepdate->TooltipValue = "";

            // fundingsituation
            $this->fundingsituation->LinkCustomAttributes = "";
            $this->fundingsituation->HrefValue = "";
            $this->fundingsituation->TooltipValue = "";

            // purpose
            $this->purpose->LinkCustomAttributes = "";
            $this->purpose->HrefValue = "";
            $this->purpose->TooltipValue = "";

            // evaluationstatus
            $this->evaluationstatus->LinkCustomAttributes = "";
            $this->evaluationstatus->HrefValue = "";
            $this->evaluationstatus->TooltipValue = "";

            // transferdate
            $this->transferdate->LinkCustomAttributes = "";
            $this->transferdate->HrefValue = "";
            $this->transferdate->TooltipValue = "";

            // revenuetype
            $this->revenuetype->LinkCustomAttributes = "";
            $this->revenuetype->HrefValue = "";
            $this->revenuetype->TooltipValue = "";

            // noofemployees
            $this->noofemployees->LinkCustomAttributes = "";
            $this->noofemployees->HrefValue = "";
            $this->noofemployees->TooltipValue = "";

            // secondaryemail
            $this->secondaryemail->LinkCustomAttributes = "";
            $this->secondaryemail->HrefValue = "";
            $this->secondaryemail->TooltipValue = "";

            // noapprovalcalls
            $this->noapprovalcalls->LinkCustomAttributes = "";
            $this->noapprovalcalls->HrefValue = "";
            $this->noapprovalcalls->TooltipValue = "";

            // noapprovalemails
            $this->noapprovalemails->LinkCustomAttributes = "";
            $this->noapprovalemails->HrefValue = "";
            $this->noapprovalemails->TooltipValue = "";

            // vat_id
            $this->vat_id->LinkCustomAttributes = "";
            $this->vat_id->HrefValue = "";
            $this->vat_id->TooltipValue = "";

            // registration_number_1
            $this->registration_number_1->LinkCustomAttributes = "";
            $this->registration_number_1->HrefValue = "";
            $this->registration_number_1->TooltipValue = "";

            // registration_number_2
            $this->registration_number_2->LinkCustomAttributes = "";
            $this->registration_number_2->HrefValue = "";
            $this->registration_number_2->TooltipValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";
            $this->verification->TooltipValue = "";

            // subindustry
            $this->subindustry->LinkCustomAttributes = "";
            $this->subindustry->HrefValue = "";
            $this->subindustry->TooltipValue = "";

            // atenttion
            $this->atenttion->LinkCustomAttributes = "";
            $this->atenttion->HrefValue = "";
            $this->atenttion->TooltipValue = "";

            // leads_relation
            $this->leads_relation->LinkCustomAttributes = "";
            $this->leads_relation->HrefValue = "";
            $this->leads_relation->TooltipValue = "";

            // legal_form
            $this->legal_form->LinkCustomAttributes = "";
            $this->legal_form->HrefValue = "";
            $this->legal_form->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // active
            $this->active->LinkCustomAttributes = "";
            $this->active->HrefValue = "";
            $this->active->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fcrm_leaddetailsview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fcrm_leaddetailsview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fcrm_leaddetailsview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_crm_leaddetails" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_crm_leaddetails\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fcrm_leaddetailsview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmLeaddetailsList"), "", $this->TableVar, true);
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

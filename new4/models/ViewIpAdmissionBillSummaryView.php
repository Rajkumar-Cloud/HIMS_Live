<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIpAdmissionBillSummaryView extends ViewIpAdmissionBillSummary
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_ip_admission_bill_summary';

    // Page object name
    public $PageObjName = "ViewIpAdmissionBillSummaryView";

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

        // Table object (view_ip_admission_bill_summary)
        if (!isset($GLOBALS["view_ip_admission_bill_summary"]) || get_class($GLOBALS["view_ip_admission_bill_summary"]) == PROJECT_NAMESPACE . "view_ip_admission_bill_summary") {
            $GLOBALS["view_ip_admission_bill_summary"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ip_admission_bill_summary');
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
                $doc = new $class(Container("view_ip_admission_bill_summary"));
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
                    if ($pageName == "ViewIpAdmissionBillSummaryView") {
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
        $this->mrnNo->setVisibility();
        $this->PatientID->setVisibility();
        $this->patient_name->setVisibility();
        $this->mobileno->setVisibility();
        $this->profilePic->setVisibility();
        $this->gender->setVisibility();
        $this->age->setVisibility();
        $this->physician_id->setVisibility();
        $this->typeRegsisteration->setVisibility();
        $this->PaymentCategory->setVisibility();
        $this->admission_consultant_id->setVisibility();
        $this->leading_consultant_id->setVisibility();
        $this->cause->setVisibility();
        $this->admission_date->setVisibility();
        $this->release_date->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->HospID->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->BillClosing->setVisibility();
        $this->BillClosingDate->setVisibility();
        $this->BillNumber->setVisibility();
        $this->ClosingAmount->setVisibility();
        $this->ClosingType->setVisibility();
        $this->BillAmount->setVisibility();
        $this->billclosedBy->setVisibility();
        $this->bllcloseByDate->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->Procedure->setVisibility();
        $this->Consultant->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->Amound->setVisibility();
        $this->patient_id->setVisibility();
        $this->Package->setVisibility();
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
        $this->setupLookupOptions($this->PaymentCategory);
        $this->setupLookupOptions($this->PaymentStatus);
        $this->setupLookupOptions($this->Procedure);

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
                $returnUrl = "ViewIpAdmissionBillSummaryList"; // Return to list
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
                        $returnUrl = "ViewIpAdmissionBillSummaryList"; // No matching record, return to list
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
            $returnUrl = "ViewIpAdmissionBillSummaryList"; // Not page request, return to list
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

        // Edit
        $item = &$option->add("edit");
        $editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->EditUrl)) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        }
        $item->Visible = ($this->EditUrl != "" && $Security->canEdit());

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
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->mobileno->setDbValue($row['mobileno']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->BillClosing->setDbValue($row['BillClosing']);
        $this->BillClosingDate->setDbValue($row['BillClosingDate']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->ClosingAmount->setDbValue($row['ClosingAmount']);
        $this->ClosingType->setDbValue($row['ClosingType']);
        $this->BillAmount->setDbValue($row['BillAmount']);
        $this->billclosedBy->setDbValue($row['billclosedBy']);
        $this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->Amound->setDbValue($row['Amound']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->Package->setDbValue($row['Package']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['mrnNo'] = null;
        $row['PatientID'] = null;
        $row['patient_name'] = null;
        $row['mobileno'] = null;
        $row['profilePic'] = null;
        $row['gender'] = null;
        $row['age'] = null;
        $row['physician_id'] = null;
        $row['typeRegsisteration'] = null;
        $row['PaymentCategory'] = null;
        $row['admission_consultant_id'] = null;
        $row['leading_consultant_id'] = null;
        $row['cause'] = null;
        $row['admission_date'] = null;
        $row['release_date'] = null;
        $row['PaymentStatus'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['HospID'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['BillClosing'] = null;
        $row['BillClosingDate'] = null;
        $row['BillNumber'] = null;
        $row['ClosingAmount'] = null;
        $row['ClosingType'] = null;
        $row['BillAmount'] = null;
        $row['billclosedBy'] = null;
        $row['bllcloseByDate'] = null;
        $row['ReportHeader'] = null;
        $row['Procedure'] = null;
        $row['Consultant'] = null;
        $row['Anesthetist'] = null;
        $row['Amound'] = null;
        $row['patient_id'] = null;
        $row['Package'] = null;
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
        if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue))) {
            $this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // mrnNo

        // PatientID

        // patient_name

        // mobileno

        // profilePic

        // gender

        // age

        // physician_id

        // typeRegsisteration

        // PaymentCategory

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // BillClosing

        // BillClosingDate

        // BillNumber

        // ClosingAmount

        // ClosingType

        // BillAmount

        // billclosedBy

        // bllcloseByDate

        // ReportHeader

        // Procedure

        // Consultant

        // Anesthetist

        // Amound

        // patient_id

        // Package
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
            $this->mrnNo->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // patient_name
            $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
            $this->patient_name->ViewCustomAttributes = "";

            // mobileno
            $this->mobileno->ViewValue = $this->mobileno->CurrentValue;
            $this->mobileno->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewCustomAttributes = "";

            // physician_id
            $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
            $this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
            $this->physician_id->ViewCustomAttributes = "";

            // typeRegsisteration
            $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
            $this->typeRegsisteration->ViewCustomAttributes = "";

            // PaymentCategory
            $curVal = trim(strval($this->PaymentCategory->CurrentValue));
            if ($curVal != "") {
                $this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
                if ($this->PaymentCategory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PaymentCategory->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentCategory->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
                    } else {
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
                    }
                }
            } else {
                $this->PaymentCategory->ViewValue = null;
            }
            $this->PaymentCategory->ViewCustomAttributes = "";

            // admission_consultant_id
            $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
            $this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->admission_consultant_id->ViewCustomAttributes = "";

            // leading_consultant_id
            $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
            $this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->leading_consultant_id->ViewCustomAttributes = "";

            // cause
            $this->cause->ViewValue = $this->cause->CurrentValue;
            $this->cause->ViewCustomAttributes = "";

            // admission_date
            $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
            $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
            $this->admission_date->ViewCustomAttributes = "";

            // release_date
            $this->release_date->ViewValue = $this->release_date->CurrentValue;
            $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 0);
            $this->release_date->ViewCustomAttributes = "";

            // PaymentStatus
            $curVal = trim(strval($this->PaymentStatus->CurrentValue));
            if ($curVal != "") {
                $this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
                if ($this->PaymentStatus->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PaymentStatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentStatus->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
                    } else {
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
                    }
                }
            } else {
                $this->PaymentStatus->ViewValue = null;
            }
            $this->PaymentStatus->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // ReferedByDr
            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
            $this->ReferedByDr->ViewCustomAttributes = "";

            // ReferClinicname
            $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
            $this->ReferClinicname->ViewCustomAttributes = "";

            // ReferCity
            $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
            $this->ReferCity->ViewCustomAttributes = "";

            // ReferMobileNo
            $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
            $this->ReferMobileNo->ViewCustomAttributes = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // BillClosing
            if (strval($this->BillClosing->CurrentValue) != "") {
                $this->BillClosing->ViewValue = $this->BillClosing->optionCaption($this->BillClosing->CurrentValue);
            } else {
                $this->BillClosing->ViewValue = null;
            }
            $this->BillClosing->ViewCustomAttributes = "";

            // BillClosingDate
            $this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
            $this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
            $this->BillClosingDate->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // ClosingAmount
            $this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
            $this->ClosingAmount->ViewCustomAttributes = "";

            // ClosingType
            $this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
            $this->ClosingType->ViewCustomAttributes = "";

            // BillAmount
            $this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
            $this->BillAmount->ViewCustomAttributes = "";

            // billclosedBy
            $this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
            $this->billclosedBy->ViewCustomAttributes = "";

            // bllcloseByDate
            $this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
            $this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
            $this->bllcloseByDate->ViewCustomAttributes = "";

            // ReportHeader
            if (strval($this->ReportHeader->CurrentValue) != "") {
                $this->ReportHeader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ReportHeader->ViewValue = null;
            }
            $this->ReportHeader->ViewCustomAttributes = "";

            // Procedure
            $curVal = trim(strval($this->Procedure->CurrentValue));
            if ($curVal != "") {
                $this->Procedure->ViewValue = $this->Procedure->lookupCacheOption($curVal);
                if ($this->Procedure->ViewValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Procedure->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Procedure->Lookup->renderViewRow($rswrk[0]);
                        $this->Procedure->ViewValue = $this->Procedure->displayValue($arwrk);
                    } else {
                        $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
                    }
                }
            } else {
                $this->Procedure->ViewValue = null;
            }
            $this->Procedure->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // Amound
            $this->Amound->ViewValue = $this->Amound->CurrentValue;
            $this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
            $this->Amound->ViewCustomAttributes = "";

            // patient_id
            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
            $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
            $this->patient_id->ViewCustomAttributes = "";

            // Package
            $this->Package->ViewValue = $this->Package->CurrentValue;
            $this->Package->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";
            $this->mrnNo->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";
            $this->patient_name->TooltipValue = "";

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";
            $this->mobileno->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";
            $this->physician_id->TooltipValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";
            $this->typeRegsisteration->TooltipValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";
            $this->PaymentCategory->TooltipValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";
            $this->admission_consultant_id->TooltipValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";
            $this->leading_consultant_id->TooltipValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";
            $this->cause->TooltipValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";
            $this->admission_date->TooltipValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";
            $this->release_date->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";
            $this->ReferedByDr->TooltipValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";
            $this->ReferClinicname->TooltipValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";
            $this->ReferCity->TooltipValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";
            $this->ReferMobileNo->TooltipValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";
            $this->ReferA4TreatingConsultant->TooltipValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";
            $this->PurposreReferredfor->TooltipValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";
            $this->BillClosing->TooltipValue = "";

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";
            $this->BillClosingDate->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";
            $this->ClosingAmount->TooltipValue = "";

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";
            $this->ClosingType->TooltipValue = "";

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";
            $this->BillAmount->TooltipValue = "";

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";
            $this->billclosedBy->TooltipValue = "";

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";
            $this->bllcloseByDate->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";
            $this->Procedure->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";
            $this->Amound->TooltipValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";
            $this->Package->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_ip_admission_bill_summaryview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_ip_admission_bill_summaryview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_ip_admission_bill_summaryview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_ip_admission_bill_summary" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_ip_admission_bill_summary\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_ip_admission_bill_summaryview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewIpAdmissionBillSummaryList"), "", $this->TableVar, true);
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
                case "x_PaymentCategory":
                    break;
                case "x_PaymentStatus":
                    break;
                case "x_BillClosing":
                    break;
                case "x_ReportHeader":
                    break;
                case "x_Procedure":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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

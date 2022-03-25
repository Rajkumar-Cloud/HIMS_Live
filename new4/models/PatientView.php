<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientView extends Patient
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient';

    // Page object name
    public $PageObjName = "PatientView";

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

        // Table object (patient)
        if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
            $GLOBALS["patient"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');
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
                $doc = new $class(Container("patient"));
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
                    if ($pageName == "PatientView") {
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
        $this->PatientID->setVisibility();
        $this->title->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->dob->setVisibility();
        $this->Age->setVisibility();
        $this->blood_group->setVisibility();
        $this->mobile_no->setVisibility();
        $this->description->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->profilePic->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->Religion->setVisibility();
        $this->Nationality->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->spouse_title->setVisibility();
        $this->spouse_first_name->setVisibility();
        $this->spouse_middle_name->setVisibility();
        $this->spouse_last_name->setVisibility();
        $this->spouse_gender->setVisibility();
        $this->spouse_dob->setVisibility();
        $this->spouse_Age->setVisibility();
        $this->spouse_blood_group->setVisibility();
        $this->spouse_mobile_no->setVisibility();
        $this->Maritalstatus->setVisibility();
        $this->Business->setVisibility();
        $this->Patient_Language->setVisibility();
        $this->Passport->setVisibility();
        $this->VisaNo->setVisibility();
        $this->ValidityOfVisa->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->street->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->country->setVisibility();
        $this->postal_code->setVisibility();
        $this->PEmail->setVisibility();
        $this->PEmergencyContact->setVisibility();
        $this->occupation->setVisibility();
        $this->spouse_occupation->setVisibility();
        $this->WhatsApp->setVisibility();
        $this->CouppleID->setVisibility();
        $this->MaleID->setVisibility();
        $this->FemaleID->setVisibility();
        $this->GroupID->setVisibility();
        $this->Relationship->setVisibility();
        $this->AppointmentSearch->setVisibility();
        $this->FacebookID->setVisibility();
        $this->profilePicImage->setVisibility();
        $this->Clients->setVisibility();
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
        $this->setupLookupOptions($this->title);
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->blood_group);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->ReferedByDr);
        $this->setupLookupOptions($this->ReferA4TreatingConsultant);
        $this->setupLookupOptions($this->spouse_title);
        $this->setupLookupOptions($this->spouse_gender);
        $this->setupLookupOptions($this->spouse_blood_group);
        $this->setupLookupOptions($this->Maritalstatus);
        $this->setupLookupOptions($this->Business);
        $this->setupLookupOptions($this->Patient_Language);
        $this->setupLookupOptions($this->WhereDidYouHear);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->AppointmentSearch);

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
                $returnUrl = "PatientList"; // Return to list
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
                        $returnUrl = "PatientList"; // No matching record, return to list
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
            $returnUrl = "PatientList"; // Not page request, return to list
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

        // Set up detail parameters
        $this->setupDetailParms();

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
        $option = $options["detail"];
        $detailTableLink = "";
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_patient_address"
        $item = &$option->add("detail_patient_address");
        $body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_address", "TblCaption");
        $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode(GetUrl("PatientAddressList?" . Config("TABLE_SHOW_MASTER") . "=patient&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "")) . "\">" . $body . "</a>";
        $links = "";
        $detailPageObj = Container("PatientAddressGrid");
        if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            if ($detailViewTblVar != "") {
                $detailViewTblVar .= ",";
            }
            $detailViewTblVar .= "patient_address";
        }
        if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            if ($detailEditTblVar != "") {
                $detailEditTblVar .= ",";
            }
            $detailEditTblVar .= "patient_address";
        }
        if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            if ($detailCopyTblVar != "") {
                $detailCopyTblVar .= ",";
            }
            $detailCopyTblVar .= "patient_address";
        }
        if ($links != "") {
            $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
            $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
        }
        $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
        $item->Body = $body;
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_address');
        if ($item->Visible) {
            if ($detailTableLink != "") {
                $detailTableLink .= ",";
            }
            $detailTableLink .= "patient_address";
        }
        if ($this->ShowMultipleDetails) {
            $item->Visible = false;
        }

        // "detail_patient_email"
        $item = &$option->add("detail_patient_email");
        $body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_email", "TblCaption");
        $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode(GetUrl("PatientEmailList?" . Config("TABLE_SHOW_MASTER") . "=patient&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "")) . "\">" . $body . "</a>";
        $links = "";
        $detailPageObj = Container("PatientEmailGrid");
        if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            if ($detailViewTblVar != "") {
                $detailViewTblVar .= ",";
            }
            $detailViewTblVar .= "patient_email";
        }
        if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            if ($detailEditTblVar != "") {
                $detailEditTblVar .= ",";
            }
            $detailEditTblVar .= "patient_email";
        }
        if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            if ($detailCopyTblVar != "") {
                $detailCopyTblVar .= ",";
            }
            $detailCopyTblVar .= "patient_email";
        }
        if ($links != "") {
            $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
            $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
        }
        $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
        $item->Body = $body;
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_email');
        if ($item->Visible) {
            if ($detailTableLink != "") {
                $detailTableLink .= ",";
            }
            $detailTableLink .= "patient_email";
        }
        if ($this->ShowMultipleDetails) {
            $item->Visible = false;
        }

        // "detail_patient_telephone"
        $item = &$option->add("detail_patient_telephone");
        $body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_telephone", "TblCaption");
        $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode(GetUrl("PatientTelephoneList?" . Config("TABLE_SHOW_MASTER") . "=patient&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "")) . "\">" . $body . "</a>";
        $links = "";
        $detailPageObj = Container("PatientTelephoneGrid");
        if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            if ($detailViewTblVar != "") {
                $detailViewTblVar .= ",";
            }
            $detailViewTblVar .= "patient_telephone";
        }
        if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            if ($detailEditTblVar != "") {
                $detailEditTblVar .= ",";
            }
            $detailEditTblVar .= "patient_telephone";
        }
        if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            if ($detailCopyTblVar != "") {
                $detailCopyTblVar .= ",";
            }
            $detailCopyTblVar .= "patient_telephone";
        }
        if ($links != "") {
            $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
            $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
        }
        $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
        $item->Body = $body;
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_telephone');
        if ($item->Visible) {
            if ($detailTableLink != "") {
                $detailTableLink .= ",";
            }
            $detailTableLink .= "patient_telephone";
        }
        if ($this->ShowMultipleDetails) {
            $item->Visible = false;
        }

        // "detail_patient_emergency_contact"
        $item = &$option->add("detail_patient_emergency_contact");
        $body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_emergency_contact", "TblCaption");
        $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode(GetUrl("PatientEmergencyContactList?" . Config("TABLE_SHOW_MASTER") . "=patient&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "")) . "\">" . $body . "</a>";
        $links = "";
        $detailPageObj = Container("PatientEmergencyContactGrid");
        if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            if ($detailViewTblVar != "") {
                $detailViewTblVar .= ",";
            }
            $detailViewTblVar .= "patient_emergency_contact";
        }
        if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            if ($detailEditTblVar != "") {
                $detailEditTblVar .= ",";
            }
            $detailEditTblVar .= "patient_emergency_contact";
        }
        if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            if ($detailCopyTblVar != "") {
                $detailCopyTblVar .= ",";
            }
            $detailCopyTblVar .= "patient_emergency_contact";
        }
        if ($links != "") {
            $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
            $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
        }
        $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
        $item->Body = $body;
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_emergency_contact');
        if ($item->Visible) {
            if ($detailTableLink != "") {
                $detailTableLink .= ",";
            }
            $detailTableLink .= "patient_emergency_contact";
        }
        if ($this->ShowMultipleDetails) {
            $item->Visible = false;
        }

        // "detail_patient_document"
        $item = &$option->add("detail_patient_document");
        $body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_document", "TblCaption");
        $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode(GetUrl("PatientDocumentList?" . Config("TABLE_SHOW_MASTER") . "=patient&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "")) . "\">" . $body . "</a>";
        $links = "";
        $detailPageObj = Container("PatientDocumentGrid");
        if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            if ($detailViewTblVar != "") {
                $detailViewTblVar .= ",";
            }
            $detailViewTblVar .= "patient_document";
        }
        if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            if ($detailEditTblVar != "") {
                $detailEditTblVar .= ",";
            }
            $detailEditTblVar .= "patient_document";
        }
        if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
            $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document"))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            if ($detailCopyTblVar != "") {
                $detailCopyTblVar .= ",";
            }
            $detailCopyTblVar .= "patient_document";
        }
        if ($links != "") {
            $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
            $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
        }
        $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
        $item->Body = $body;
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_document');
        if ($item->Visible) {
            if ($detailTableLink != "") {
                $detailTableLink .= ",";
            }
            $detailTableLink .= "patient_document";
        }
        if ($this->ShowMultipleDetails) {
            $item->Visible = false;
        }

        // Multiple details
        if ($this->ShowMultipleDetails) {
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
            $links = "";
            if ($detailViewTblVar != "") {
                $links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            }
            if ($detailEditTblVar != "") {
                $links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            }
            if ($detailCopyTblVar != "") {
                $links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar))) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
                $body .= "<ul class=\"dropdown-menu ew-menu\">" . $links . "</ul>";
            }
            $body .= "</div>";
            // Multiple details
            $item = &$option->add("details");
            $item->Body = $body;
        }

        // Set up detail default
        $option = $options["detail"];
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $ar = explode(",", $detailTableLink);
        $cnt = count($ar);
        $option->UseDropDownButton = ($cnt > 1);
        $option->UseButtonGroup = true;
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Set up action default
        $option = $options["action"];
        $option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
        $option->UseDropDownButton = true;
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->profilePic->Upload->DbValue = $row['profilePic'];
        $this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        if (array_key_exists('EV__ReferedByDr', $row)) {
            $this->ReferedByDr->VirtualValue = $row['EV__ReferedByDr']; // Set up virtual field value
        } else {
            $this->ReferedByDr->VirtualValue = ""; // Clear value
        }
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
        $this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
        $this->FacebookID->setDbValue($row['FacebookID']);
        $this->profilePicImage->Upload->DbValue = $row['profilePicImage'];
        if (is_resource($this->profilePicImage->Upload->DbValue) && get_resource_type($this->profilePicImage->Upload->DbValue) == "stream") { // Byte array
            $this->profilePicImage->Upload->DbValue = stream_get_contents($this->profilePicImage->Upload->DbValue);
        }
        $this->Clients->setDbValue($row['Clients']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatientID'] = null;
        $row['title'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['dob'] = null;
        $row['Age'] = null;
        $row['blood_group'] = null;
        $row['mobile_no'] = null;
        $row['description'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['profilePic'] = null;
        $row['IdentificationMark'] = null;
        $row['Religion'] = null;
        $row['Nationality'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['spouse_title'] = null;
        $row['spouse_first_name'] = null;
        $row['spouse_middle_name'] = null;
        $row['spouse_last_name'] = null;
        $row['spouse_gender'] = null;
        $row['spouse_dob'] = null;
        $row['spouse_Age'] = null;
        $row['spouse_blood_group'] = null;
        $row['spouse_mobile_no'] = null;
        $row['Maritalstatus'] = null;
        $row['Business'] = null;
        $row['Patient_Language'] = null;
        $row['Passport'] = null;
        $row['VisaNo'] = null;
        $row['ValidityOfVisa'] = null;
        $row['WhereDidYouHear'] = null;
        $row['HospID'] = null;
        $row['street'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['country'] = null;
        $row['postal_code'] = null;
        $row['PEmail'] = null;
        $row['PEmergencyContact'] = null;
        $row['occupation'] = null;
        $row['spouse_occupation'] = null;
        $row['WhatsApp'] = null;
        $row['CouppleID'] = null;
        $row['MaleID'] = null;
        $row['FemaleID'] = null;
        $row['GroupID'] = null;
        $row['Relationship'] = null;
        $row['AppointmentSearch'] = null;
        $row['FacebookID'] = null;
        $row['profilePicImage'] = null;
        $row['Clients'] = null;
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

        // PatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // Age

        // blood_group

        // mobile_no

        // description

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // profilePic

        // IdentificationMark

        // Religion

        // Nationality

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // spouse_title

        // spouse_first_name

        // spouse_middle_name

        // spouse_last_name

        // spouse_gender

        // spouse_dob

        // spouse_Age

        // spouse_blood_group

        // spouse_mobile_no

        // Maritalstatus

        // Business

        // Patient_Language

        // Passport

        // VisaNo

        // ValidityOfVisa

        // WhereDidYouHear

        // HospID

        // street

        // town

        // province

        // country

        // postal_code

        // PEmail

        // PEmergencyContact

        // occupation

        // spouse_occupation

        // WhatsApp

        // CouppleID

        // MaleID

        // FemaleID

        // GroupID

        // Relationship

        // AppointmentSearch

        // FacebookID

        // profilePicImage

        // Clients
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $curVal = trim(strval($this->title->CurrentValue));
            if ($curVal != "") {
                $this->title->ViewValue = $this->title->lookupCacheOption($curVal);
                if ($this->title->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->title->Lookup->renderViewRow($rswrk[0]);
                        $this->title->ViewValue = $this->title->displayValue($arwrk);
                    } else {
                        $this->title->ViewValue = $this->title->CurrentValue;
                    }
                }
            } else {
                $this->title->ViewValue = null;
            }
            $this->title->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // dob
            $this->dob->ViewValue = $this->dob->CurrentValue;
            $this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
            $this->dob->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // blood_group
            $curVal = trim(strval($this->blood_group->CurrentValue));
            if ($curVal != "") {
                $this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
                if ($this->blood_group->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->blood_group->Lookup->renderViewRow($rswrk[0]);
                        $this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
                    } else {
                        $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
                    }
                }
            } else {
                $this->blood_group->ViewValue = null;
            }
            $this->blood_group->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
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

            // profilePic
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->ImageWidth = 80;
                $this->profilePic->ImageHeight = 80;
                $this->profilePic->ImageAlt = $this->profilePic->alt();
                $this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
            } else {
                $this->profilePic->ViewValue = "";
            }
            $this->profilePic->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Nationality
            $this->Nationality->ViewValue = $this->Nationality->CurrentValue;
            $this->Nationality->ViewCustomAttributes = "";

            // ReferedByDr
            if ($this->ReferedByDr->VirtualValue != "") {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedByDr->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
                    if ($this->ReferedByDr->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedByDr->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedByDr->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
                        } else {
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedByDr->ViewValue = null;
                }
            }
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
            $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
            if ($curVal != "") {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
                if ($this->ReferA4TreatingConsultant->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ReferA4TreatingConsultant->Lookup->renderViewRow($rswrk[0]);
                        $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
                    } else {
                        $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
                    }
                }
            } else {
                $this->ReferA4TreatingConsultant->ViewValue = null;
            }
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // spouse_title
            $curVal = trim(strval($this->spouse_title->CurrentValue));
            if ($curVal != "") {
                $this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
                if ($this->spouse_title->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_title->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
                    } else {
                        $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
                    }
                }
            } else {
                $this->spouse_title->ViewValue = null;
            }
            $this->spouse_title->ViewCustomAttributes = "";

            // spouse_first_name
            $this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
            $this->spouse_first_name->ViewCustomAttributes = "";

            // spouse_middle_name
            $this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
            $this->spouse_middle_name->ViewCustomAttributes = "";

            // spouse_last_name
            $this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
            $this->spouse_last_name->ViewCustomAttributes = "";

            // spouse_gender
            $curVal = trim(strval($this->spouse_gender->CurrentValue));
            if ($curVal != "") {
                $this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
                if ($this->spouse_gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_gender->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
                    } else {
                        $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
                    }
                }
            } else {
                $this->spouse_gender->ViewValue = null;
            }
            $this->spouse_gender->ViewCustomAttributes = "";

            // spouse_dob
            $this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
            $this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
            $this->spouse_dob->ViewCustomAttributes = "";

            // spouse_Age
            $this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
            $this->spouse_Age->ViewCustomAttributes = "";

            // spouse_blood_group
            $curVal = trim(strval($this->spouse_blood_group->CurrentValue));
            if ($curVal != "") {
                $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
                if ($this->spouse_blood_group->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_blood_group->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
                    } else {
                        $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
                    }
                }
            } else {
                $this->spouse_blood_group->ViewValue = null;
            }
            $this->spouse_blood_group->ViewCustomAttributes = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
            $this->spouse_mobile_no->ViewCustomAttributes = "";

            // Maritalstatus
            $curVal = trim(strval($this->Maritalstatus->CurrentValue));
            if ($curVal != "") {
                $this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
                if ($this->Maritalstatus->ViewValue === null) { // Lookup from database
                    $filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Maritalstatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Maritalstatus->Lookup->renderViewRow($rswrk[0]);
                        $this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
                    } else {
                        $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
                    }
                }
            } else {
                $this->Maritalstatus->ViewValue = null;
            }
            $this->Maritalstatus->ViewCustomAttributes = "";

            // Business
            $this->Business->ViewValue = $this->Business->CurrentValue;
            $curVal = trim(strval($this->Business->CurrentValue));
            if ($curVal != "") {
                $this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
                if ($this->Business->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Business->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Business->Lookup->renderViewRow($rswrk[0]);
                        $this->Business->ViewValue = $this->Business->displayValue($arwrk);
                    } else {
                        $this->Business->ViewValue = $this->Business->CurrentValue;
                    }
                }
            } else {
                $this->Business->ViewValue = null;
            }
            $this->Business->ViewCustomAttributes = "";

            // Patient_Language
            $curVal = trim(strval($this->Patient_Language->CurrentValue));
            if ($curVal != "") {
                $this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
                if ($this->Patient_Language->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Patient_Language->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Patient_Language->Lookup->renderViewRow($rswrk[0]);
                        $this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
                    } else {
                        $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
                    }
                }
            } else {
                $this->Patient_Language->ViewValue = null;
            }
            $this->Patient_Language->ViewCustomAttributes = "";

            // Passport
            $this->Passport->ViewValue = $this->Passport->CurrentValue;
            $this->Passport->ViewCustomAttributes = "";

            // VisaNo
            $this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
            $this->VisaNo->ViewCustomAttributes = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
            $this->ValidityOfVisa->ViewCustomAttributes = "";

            // WhereDidYouHear
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
                if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->WhereDidYouHear->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                            $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                        }
                    } else {
                        $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                    }
                }
            } else {
                $this->WhereDidYouHear->ViewValue = null;
            }
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // PEmail
            $this->PEmail->ViewValue = $this->PEmail->CurrentValue;
            $this->PEmail->ViewCustomAttributes = "";

            // PEmergencyContact
            $this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
            $this->PEmergencyContact->ViewCustomAttributes = "";

            // occupation
            $this->occupation->ViewValue = $this->occupation->CurrentValue;
            $this->occupation->ViewCustomAttributes = "";

            // spouse_occupation
            $this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
            $this->spouse_occupation->ViewCustomAttributes = "";

            // WhatsApp
            $this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
            $this->WhatsApp->ViewCustomAttributes = "";

            // CouppleID
            $this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
            $this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
            $this->CouppleID->ViewCustomAttributes = "";

            // MaleID
            $this->MaleID->ViewValue = $this->MaleID->CurrentValue;
            $this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
            $this->MaleID->ViewCustomAttributes = "";

            // FemaleID
            $this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
            $this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
            $this->FemaleID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // Relationship
            $this->Relationship->ViewValue = $this->Relationship->CurrentValue;
            $this->Relationship->ViewCustomAttributes = "";

            // AppointmentSearch
            $curVal = trim(strval($this->AppointmentSearch->CurrentValue));
            if ($curVal != "") {
                $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
                if ($this->AppointmentSearch->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AppointmentSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AppointmentSearch->Lookup->renderViewRow($rswrk[0]);
                        $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
                    } else {
                        $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
                    }
                }
            } else {
                $this->AppointmentSearch->ViewValue = null;
            }
            $this->AppointmentSearch->ViewCustomAttributes = "";

            // FacebookID
            $this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
            $this->FacebookID->ViewCustomAttributes = "";

            // profilePicImage
            if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->ViewValue = $this->id->CurrentValue;
                $this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
            } else {
                $this->profilePicImage->ViewValue = "";
            }
            $this->profilePicImage->ViewCustomAttributes = "";

            // Clients
            $this->Clients->ViewValue = $this->Clients->CurrentValue;
            $this->Clients->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";
            $this->dob->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";
            $this->blood_group->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
                $this->profilePic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
                }
            } else {
                $this->profilePic->HrefValue = "";
            }
            $this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
            $this->profilePic->TooltipValue = "";
            if ($this->profilePic->UseColorbox) {
                if (EmptyValue($this->profilePic->TooltipValue)) {
                    $this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
                $this->profilePic->LinkAttrs->appendClass("ew-lightbox");
            }

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";
            $this->Nationality->TooltipValue = "";

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

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";
            $this->spouse_title->TooltipValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";
            $this->spouse_first_name->TooltipValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";
            $this->spouse_middle_name->TooltipValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";
            $this->spouse_last_name->TooltipValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";
            $this->spouse_gender->TooltipValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";
            $this->spouse_dob->TooltipValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";
            $this->spouse_Age->TooltipValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";
            $this->spouse_blood_group->TooltipValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";
            $this->spouse_mobile_no->TooltipValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";
            $this->Maritalstatus->TooltipValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";
            $this->Business->TooltipValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";
            $this->Patient_Language->TooltipValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";
            $this->Passport->TooltipValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";
            $this->VisaNo->TooltipValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";
            $this->ValidityOfVisa->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";
            $this->PEmail->TooltipValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";
            $this->PEmergencyContact->TooltipValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";
            $this->occupation->TooltipValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";
            $this->spouse_occupation->TooltipValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";
            $this->WhatsApp->TooltipValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";
            $this->CouppleID->TooltipValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";
            $this->MaleID->TooltipValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";
            $this->FemaleID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";
            $this->Relationship->TooltipValue = "";

            // AppointmentSearch
            $this->AppointmentSearch->LinkCustomAttributes = "";
            $this->AppointmentSearch->HrefValue = "";
            $this->AppointmentSearch->TooltipValue = "";

            // FacebookID
            $this->FacebookID->LinkCustomAttributes = "";
            $this->FacebookID->HrefValue = "";
            $this->FacebookID->TooltipValue = "";

            // profilePicImage
            $this->profilePicImage->LinkCustomAttributes = "";
            if (!empty($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
                $this->profilePicImage->LinkAttrs["target"] = "";
                if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"])) {
                    $this->profilePicImage->LinkAttrs["target"] = "_blank";
                }
                if ($this->isExport()) {
                    $this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
                }
            } else {
                $this->profilePicImage->HrefValue = "";
            }
            $this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
            $this->profilePicImage->TooltipValue = "";

            // Clients
            $this->Clients->LinkCustomAttributes = "";
            $this->Clients->HrefValue = "";
            $this->Clients->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatientview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatientview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatientview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_patient" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatientview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = true;

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

        // Export detail records (patient_address)
        if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_address", explode(",", $this->getCurrentDetailTable()))) {
            $patient_address = Container("patient_address");
            $rsdetail = $patient_address->loadRs($patient_address->getDetailFilter()); // Load detail records
            if ($rsdetail) {
                $exportStyle = $doc->Style;
                $doc->setStyle("h"); // Change to horizontal
                if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
                    $doc->exportEmptyRow();
                    $detailcnt = $rsdetail->rowCount();
                    $oldtbl = $doc->Table;
                    $doc->Table = $patient_address;
                    $patient_address->exportDocument($doc, new Recordset($rsdetail), 1, $detailcnt);
                    $doc->Table = $oldtbl;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsdetail->closeCursor();
            }
        }

        // Export detail records (patient_email)
        if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_email", explode(",", $this->getCurrentDetailTable()))) {
            $patient_email = Container("patient_email");
            $rsdetail = $patient_email->loadRs($patient_email->getDetailFilter()); // Load detail records
            if ($rsdetail) {
                $exportStyle = $doc->Style;
                $doc->setStyle("h"); // Change to horizontal
                if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
                    $doc->exportEmptyRow();
                    $detailcnt = $rsdetail->rowCount();
                    $oldtbl = $doc->Table;
                    $doc->Table = $patient_email;
                    $patient_email->exportDocument($doc, new Recordset($rsdetail), 1, $detailcnt);
                    $doc->Table = $oldtbl;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsdetail->closeCursor();
            }
        }

        // Export detail records (patient_telephone)
        if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_telephone", explode(",", $this->getCurrentDetailTable()))) {
            $patient_telephone = Container("patient_telephone");
            $rsdetail = $patient_telephone->loadRs($patient_telephone->getDetailFilter()); // Load detail records
            if ($rsdetail) {
                $exportStyle = $doc->Style;
                $doc->setStyle("h"); // Change to horizontal
                if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
                    $doc->exportEmptyRow();
                    $detailcnt = $rsdetail->rowCount();
                    $oldtbl = $doc->Table;
                    $doc->Table = $patient_telephone;
                    $patient_telephone->exportDocument($doc, new Recordset($rsdetail), 1, $detailcnt);
                    $doc->Table = $oldtbl;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsdetail->closeCursor();
            }
        }

        // Export detail records (patient_emergency_contact)
        if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_emergency_contact", explode(",", $this->getCurrentDetailTable()))) {
            $patient_emergency_contact = Container("patient_emergency_contact");
            $rsdetail = $patient_emergency_contact->loadRs($patient_emergency_contact->getDetailFilter()); // Load detail records
            if ($rsdetail) {
                $exportStyle = $doc->Style;
                $doc->setStyle("h"); // Change to horizontal
                if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
                    $doc->exportEmptyRow();
                    $detailcnt = $rsdetail->rowCount();
                    $oldtbl = $doc->Table;
                    $doc->Table = $patient_emergency_contact;
                    $patient_emergency_contact->exportDocument($doc, new Recordset($rsdetail), 1, $detailcnt);
                    $doc->Table = $oldtbl;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsdetail->closeCursor();
            }
        }

        // Export detail records (patient_document)
        if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_document", explode(",", $this->getCurrentDetailTable()))) {
            $patient_document = Container("patient_document");
            $rsdetail = $patient_document->loadRs($patient_document->getDetailFilter()); // Load detail records
            if ($rsdetail) {
                $exportStyle = $doc->Style;
                $doc->setStyle("h"); // Change to horizontal
                if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
                    $doc->exportEmptyRow();
                    $detailcnt = $rsdetail->rowCount();
                    $oldtbl = $doc->Table;
                    $doc->Table = $patient_document;
                    $patient_document->exportDocument($doc, new Recordset($rsdetail), 1, $detailcnt);
                    $doc->Table = $oldtbl;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsdetail->closeCursor();
            }
        }
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
            if ($return) {
                return $doc->Text; // Return email content
            } else {
                echo $this->exportEmail($doc->Text); // Send email
            }
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

    // Export email
    protected function exportEmail($emailContent)
    {
        global $TempImages, $Language;
        $sender = Post("sender", "");
        $recipient = Post("recipient", "");
        $cc = Post("cc", "");
        $bcc = Post("bcc", "");

        // Subject
        $subject = Post("subject", "");
        $emailSubject = $subject;

        // Message
        $content = Post("message", "");
        $emailMessage = $content;

        // Check sender
        if ($sender == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Sender"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmail($sender)) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
        }

        // Check recipient
        if ($recipient == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Recipient"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
        }

        // Check cc
        if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
        }

        // Check bcc
        if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
        }

        // Check email sent count
        $_SESSION[Config("EXPORT_EMAIL_COUNTER")] = Session(Config("EXPORT_EMAIL_COUNTER")) ?? 0;
        if ((int)Session(Config("EXPORT_EMAIL_COUNTER")) > Config("MAX_EMAIL_SENT_COUNT")) {
            return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
        }

        // Send email
        $email = new Email();
        $email->Sender = $sender; // Sender
        $email->Recipient = $recipient; // Recipient
        $email->Cc = $cc; // Cc
        $email->Bcc = $bcc; // Bcc
        $email->Subject = $emailSubject; // Subject
        $email->Format = "html";
        if ($emailMessage != "") {
            $emailMessage = RemoveXss($emailMessage) . "<br><br>";
        }
        foreach ($TempImages as $tmpImage) {
            $email->addEmbeddedImage($tmpImage);
        }
        $email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
        $eventArgs = [];
        if ($this->Recordset) {
            $eventArgs["rs"] = &$this->Recordset;
        }
        $emailSent = false;
        if ($this->emailSending($email, $eventArgs)) {
            $emailSent = $email->send();
        }

        // Check email sent status
        if ($emailSent) {
            // Update email sent count
            $_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

            // Sent email success
            return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
        } else {
            // Sent email failure
            return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
        }
    }

    // Set up detail parms based on QueryString
    protected function setupDetailParms()
    {
        // Get the keys for master table
        $detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
        if ($detailTblVar !== null) {
            $this->setCurrentDetailTable($detailTblVar);
        } else {
            $detailTblVar = $this->getCurrentDetailTable();
        }
        if ($detailTblVar != "") {
            $detailTblVar = explode(",", $detailTblVar);
            if (in_array("patient_address", $detailTblVar)) {
                $detailPageObj = Container("PatientAddressGrid");
                if ($detailPageObj->DetailView) {
                    $detailPageObj->CurrentMode = "view";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_email", $detailTblVar)) {
                $detailPageObj = Container("PatientEmailGrid");
                if ($detailPageObj->DetailView) {
                    $detailPageObj->CurrentMode = "view";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_telephone", $detailTblVar)) {
                $detailPageObj = Container("PatientTelephoneGrid");
                if ($detailPageObj->DetailView) {
                    $detailPageObj->CurrentMode = "view";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_emergency_contact", $detailTblVar)) {
                $detailPageObj = Container("PatientEmergencyContactGrid");
                if ($detailPageObj->DetailView) {
                    $detailPageObj->CurrentMode = "view";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_document", $detailTblVar)) {
                $detailPageObj = Container("PatientDocumentGrid");
                if ($detailPageObj->DetailView) {
                    $detailPageObj->CurrentMode = "view";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientList"), "", $this->TableVar, true);
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
                case "x_title":
                    break;
                case "x_gender":
                    break;
                case "x_blood_group":
                    break;
                case "x_status":
                    break;
                case "x_ReferedByDr":
                    break;
                case "x_ReferA4TreatingConsultant":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_spouse_title":
                    break;
                case "x_spouse_gender":
                    break;
                case "x_spouse_blood_group":
                    break;
                case "x_Maritalstatus":
                    break;
                case "x_Business":
                    break;
                case "x_Patient_Language":
                    break;
                case "x_WhereDidYouHear":
                    break;
                case "x_HospID":
                    break;
                case "x_AppointmentSearch":
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

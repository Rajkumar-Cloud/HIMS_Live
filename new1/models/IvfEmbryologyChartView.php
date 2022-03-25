<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEmbryologyChartView extends IvfEmbryologyChart
{
    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_embryology_chart';

    // Page object name
    public $PageObjName = "IvfEmbryologyChartView";

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

        // Table object (ivf_embryology_chart)
        if (!isset($GLOBALS["ivf_embryology_chart"]) || get_class($GLOBALS["ivf_embryology_chart"]) == PROJECT_NAMESPACE . "ivf_embryology_chart") {
            $GLOBALS["ivf_embryology_chart"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_embryology_chart');
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
                $doc = new $class(Container("ivf_embryology_chart"));
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
                    if ($pageName == "IvfEmbryologyChartView") {
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
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->SpermOrigin->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->Day0OocyteStage->setVisibility();
        $this->Day0PolarBodyPosition->setVisibility();
        $this->Day0Breakage->setVisibility();
        $this->Day1PN->setVisibility();
        $this->Day1PB->setVisibility();
        $this->Day1Pronucleus->setVisibility();
        $this->Day1Nucleolus->setVisibility();
        $this->Day1Halo->setVisibility();
        $this->Day1Sperm->setVisibility();
        $this->Day2CellNo->setVisibility();
        $this->Day2Frag->setVisibility();
        $this->Day2Symmetry->setVisibility();
        $this->Day2Cryoptop->setVisibility();
        $this->Day3CellNo->setVisibility();
        $this->Day3Frag->setVisibility();
        $this->Day3Symmetry->setVisibility();
        $this->Day3Grade->setVisibility();
        $this->Day3Vacoules->setVisibility();
        $this->Day3ZP->setVisibility();
        $this->Day3Cryoptop->setVisibility();
        $this->Day4CellNo->setVisibility();
        $this->Day4Frag->setVisibility();
        $this->Day4Symmetry->setVisibility();
        $this->Day4Grade->setVisibility();
        $this->Day4Cryoptop->setVisibility();
        $this->Day5CellNo->setVisibility();
        $this->Day5ICM->setVisibility();
        $this->Day5TE->setVisibility();
        $this->Day5Observation->setVisibility();
        $this->Day5Collapsed->setVisibility();
        $this->Day5Vacoulles->setVisibility();
        $this->Day5Grade->setVisibility();
        $this->Day5Cryoptop->setVisibility();
        $this->Day6CellNo->setVisibility();
        $this->Day6ICM->setVisibility();
        $this->Day6TE->setVisibility();
        $this->Day6Observation->setVisibility();
        $this->Day6Collapsed->setVisibility();
        $this->Day6Vacoulles->setVisibility();
        $this->Day6Grade->setVisibility();
        $this->Day6Cryoptop->setVisibility();
        $this->EndingDay->setVisibility();
        $this->EndingCellStage->setVisibility();
        $this->EndingGrade->setVisibility();
        $this->EndingState->setVisibility();
        $this->Day0sino->setVisibility();
        $this->Day0Attempts->setVisibility();
        $this->Day0SPZMorpho->setVisibility();
        $this->Day0SPZLocation->setVisibility();
        $this->Day2Grade->setVisibility();
        $this->Day3Sino->setVisibility();
        $this->Day3End->setVisibility();
        $this->Day4SiNo->setVisibility();
        $this->TidNo->setVisibility();
        $this->Day0SpOrgin->setVisibility();
        $this->DidNO->setVisibility();
        $this->ICSiIVFDateTime->setVisibility();
        $this->PrimaryEmbrologist->setVisibility();
        $this->SecondaryEmbrologist->setVisibility();
        $this->Incubator->setVisibility();
        $this->location->setVisibility();
        $this->Remarks->setVisibility();
        $this->OocyteNo->setVisibility();
        $this->Stage->setVisibility();
        $this->vitrificationDate->setVisibility();
        $this->vitriPrimaryEmbryologist->setVisibility();
        $this->vitriSecondaryEmbryologist->setVisibility();
        $this->vitriEmbryoNo->setVisibility();
        $this->vitriFertilisationDate->setVisibility();
        $this->vitriDay->setVisibility();
        $this->vitriGrade->setVisibility();
        $this->vitriIncubator->setVisibility();
        $this->vitriTank->setVisibility();
        $this->vitriCanister->setVisibility();
        $this->vitriGobiet->setVisibility();
        $this->vitriViscotube->setVisibility();
        $this->vitriCryolockNo->setVisibility();
        $this->vitriCryolockColour->setVisibility();
        $this->vitriStage->setVisibility();
        $this->thawDate->setVisibility();
        $this->thawPrimaryEmbryologist->setVisibility();
        $this->thawSecondaryEmbryologist->setVisibility();
        $this->thawET->setVisibility();
        $this->thawReFrozen->setVisibility();
        $this->thawAbserve->setVisibility();
        $this->thawDiscard->setVisibility();
        $this->ETCatheter->setVisibility();
        $this->ETDifficulty->setVisibility();
        $this->ETEasy->setVisibility();
        $this->ETComments->setVisibility();
        $this->ETDoctor->setVisibility();
        $this->ETEmbryologist->setVisibility();
        $this->Day2End->setVisibility();
        $this->Day2SiNo->setVisibility();
        $this->EndSiNo->setVisibility();
        $this->Day4End->setVisibility();
        $this->ETDate->setVisibility();
        $this->Day1End->setVisibility();
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
                $returnUrl = "IvfEmbryologyChartList"; // Return to list
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
                        $returnUrl = "IvfEmbryologyChartList"; // No matching record, return to list
                    }
                    break;
            }
        } else {
            $returnUrl = "IvfEmbryologyChartList"; // Not page request, return to list
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
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->SpermOrigin->setDbValue($row['SpermOrigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
        $this->Day0Breakage->setDbValue($row['Day0Breakage']);
        $this->Day1PN->setDbValue($row['Day1PN']);
        $this->Day1PB->setDbValue($row['Day1PB']);
        $this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
        $this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
        $this->Day1Halo->setDbValue($row['Day1Halo']);
        $this->Day1Sperm->setDbValue($row['Day1Sperm']);
        $this->Day2CellNo->setDbValue($row['Day2CellNo']);
        $this->Day2Frag->setDbValue($row['Day2Frag']);
        $this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
        $this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
        $this->Day3CellNo->setDbValue($row['Day3CellNo']);
        $this->Day3Frag->setDbValue($row['Day3Frag']);
        $this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
        $this->Day3Grade->setDbValue($row['Day3Grade']);
        $this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
        $this->Day3ZP->setDbValue($row['Day3ZP']);
        $this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
        $this->Day4CellNo->setDbValue($row['Day4CellNo']);
        $this->Day4Frag->setDbValue($row['Day4Frag']);
        $this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
        $this->Day4Grade->setDbValue($row['Day4Grade']);
        $this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
        $this->Day5CellNo->setDbValue($row['Day5CellNo']);
        $this->Day5ICM->setDbValue($row['Day5ICM']);
        $this->Day5TE->setDbValue($row['Day5TE']);
        $this->Day5Observation->setDbValue($row['Day5Observation']);
        $this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
        $this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
        $this->Day5Grade->setDbValue($row['Day5Grade']);
        $this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
        $this->Day6CellNo->setDbValue($row['Day6CellNo']);
        $this->Day6ICM->setDbValue($row['Day6ICM']);
        $this->Day6TE->setDbValue($row['Day6TE']);
        $this->Day6Observation->setDbValue($row['Day6Observation']);
        $this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
        $this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
        $this->Day6Grade->setDbValue($row['Day6Grade']);
        $this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
        $this->EndingDay->setDbValue($row['EndingDay']);
        $this->EndingCellStage->setDbValue($row['EndingCellStage']);
        $this->EndingGrade->setDbValue($row['EndingGrade']);
        $this->EndingState->setDbValue($row['EndingState']);
        $this->Day0sino->setDbValue($row['Day0sino']);
        $this->Day0Attempts->setDbValue($row['Day0Attempts']);
        $this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
        $this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
        $this->Day2Grade->setDbValue($row['Day2Grade']);
        $this->Day3Sino->setDbValue($row['Day3Sino']);
        $this->Day3End->setDbValue($row['Day3End']);
        $this->Day4SiNo->setDbValue($row['Day4SiNo']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
        $this->DidNO->setDbValue($row['DidNO']);
        $this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
        $this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
        $this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->location->setDbValue($row['location']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->OocyteNo->setDbValue($row['OocyteNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
        $this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
        $this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
        $this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
        $this->vitriDay->setDbValue($row['vitriDay']);
        $this->vitriGrade->setDbValue($row['vitriGrade']);
        $this->vitriIncubator->setDbValue($row['vitriIncubator']);
        $this->vitriTank->setDbValue($row['vitriTank']);
        $this->vitriCanister->setDbValue($row['vitriCanister']);
        $this->vitriGobiet->setDbValue($row['vitriGobiet']);
        $this->vitriViscotube->setDbValue($row['vitriViscotube']);
        $this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
        $this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
        $this->vitriStage->setDbValue($row['vitriStage']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->ETCatheter->setDbValue($row['ETCatheter']);
        $this->ETDifficulty->setDbValue($row['ETDifficulty']);
        $this->ETEasy->setDbValue($row['ETEasy']);
        $this->ETComments->setDbValue($row['ETComments']);
        $this->ETDoctor->setDbValue($row['ETDoctor']);
        $this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
        $this->Day2End->setDbValue($row['Day2End']);
        $this->Day2SiNo->setDbValue($row['Day2SiNo']);
        $this->EndSiNo->setDbValue($row['EndSiNo']);
        $this->Day4End->setDbValue($row['Day4End']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->Day1End->setDbValue($row['Day1End']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['SpermOrigin'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['Day0OocyteStage'] = null;
        $row['Day0PolarBodyPosition'] = null;
        $row['Day0Breakage'] = null;
        $row['Day1PN'] = null;
        $row['Day1PB'] = null;
        $row['Day1Pronucleus'] = null;
        $row['Day1Nucleolus'] = null;
        $row['Day1Halo'] = null;
        $row['Day1Sperm'] = null;
        $row['Day2CellNo'] = null;
        $row['Day2Frag'] = null;
        $row['Day2Symmetry'] = null;
        $row['Day2Cryoptop'] = null;
        $row['Day3CellNo'] = null;
        $row['Day3Frag'] = null;
        $row['Day3Symmetry'] = null;
        $row['Day3Grade'] = null;
        $row['Day3Vacoules'] = null;
        $row['Day3ZP'] = null;
        $row['Day3Cryoptop'] = null;
        $row['Day4CellNo'] = null;
        $row['Day4Frag'] = null;
        $row['Day4Symmetry'] = null;
        $row['Day4Grade'] = null;
        $row['Day4Cryoptop'] = null;
        $row['Day5CellNo'] = null;
        $row['Day5ICM'] = null;
        $row['Day5TE'] = null;
        $row['Day5Observation'] = null;
        $row['Day5Collapsed'] = null;
        $row['Day5Vacoulles'] = null;
        $row['Day5Grade'] = null;
        $row['Day5Cryoptop'] = null;
        $row['Day6CellNo'] = null;
        $row['Day6ICM'] = null;
        $row['Day6TE'] = null;
        $row['Day6Observation'] = null;
        $row['Day6Collapsed'] = null;
        $row['Day6Vacoulles'] = null;
        $row['Day6Grade'] = null;
        $row['Day6Cryoptop'] = null;
        $row['EndingDay'] = null;
        $row['EndingCellStage'] = null;
        $row['EndingGrade'] = null;
        $row['EndingState'] = null;
        $row['Day0sino'] = null;
        $row['Day0Attempts'] = null;
        $row['Day0SPZMorpho'] = null;
        $row['Day0SPZLocation'] = null;
        $row['Day2Grade'] = null;
        $row['Day3Sino'] = null;
        $row['Day3End'] = null;
        $row['Day4SiNo'] = null;
        $row['TidNo'] = null;
        $row['Day0SpOrgin'] = null;
        $row['DidNO'] = null;
        $row['ICSiIVFDateTime'] = null;
        $row['PrimaryEmbrologist'] = null;
        $row['SecondaryEmbrologist'] = null;
        $row['Incubator'] = null;
        $row['location'] = null;
        $row['Remarks'] = null;
        $row['OocyteNo'] = null;
        $row['Stage'] = null;
        $row['vitrificationDate'] = null;
        $row['vitriPrimaryEmbryologist'] = null;
        $row['vitriSecondaryEmbryologist'] = null;
        $row['vitriEmbryoNo'] = null;
        $row['vitriFertilisationDate'] = null;
        $row['vitriDay'] = null;
        $row['vitriGrade'] = null;
        $row['vitriIncubator'] = null;
        $row['vitriTank'] = null;
        $row['vitriCanister'] = null;
        $row['vitriGobiet'] = null;
        $row['vitriViscotube'] = null;
        $row['vitriCryolockNo'] = null;
        $row['vitriCryolockColour'] = null;
        $row['vitriStage'] = null;
        $row['thawDate'] = null;
        $row['thawPrimaryEmbryologist'] = null;
        $row['thawSecondaryEmbryologist'] = null;
        $row['thawET'] = null;
        $row['thawReFrozen'] = null;
        $row['thawAbserve'] = null;
        $row['thawDiscard'] = null;
        $row['ETCatheter'] = null;
        $row['ETDifficulty'] = null;
        $row['ETEasy'] = null;
        $row['ETComments'] = null;
        $row['ETDoctor'] = null;
        $row['ETEmbryologist'] = null;
        $row['Day2End'] = null;
        $row['Day2SiNo'] = null;
        $row['EndSiNo'] = null;
        $row['Day4End'] = null;
        $row['ETDate'] = null;
        $row['Day1End'] = null;
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

        // Name

        // ARTCycle

        // SpermOrigin

        // InseminatinTechnique

        // IndicationForART

        // Day0OocyteStage

        // Day0PolarBodyPosition

        // Day0Breakage

        // Day1PN

        // Day1PB

        // Day1Pronucleus

        // Day1Nucleolus

        // Day1Halo

        // Day1Sperm

        // Day2CellNo

        // Day2Frag

        // Day2Symmetry

        // Day2Cryoptop

        // Day3CellNo

        // Day3Frag

        // Day3Symmetry

        // Day3Grade

        // Day3Vacoules

        // Day3ZP

        // Day3Cryoptop

        // Day4CellNo

        // Day4Frag

        // Day4Symmetry

        // Day4Grade

        // Day4Cryoptop

        // Day5CellNo

        // Day5ICM

        // Day5TE

        // Day5Observation

        // Day5Collapsed

        // Day5Vacoulles

        // Day5Grade

        // Day5Cryoptop

        // Day6CellNo

        // Day6ICM

        // Day6TE

        // Day6Observation

        // Day6Collapsed

        // Day6Vacoulles

        // Day6Grade

        // Day6Cryoptop

        // EndingDay

        // EndingCellStage

        // EndingGrade

        // EndingState

        // Day0sino

        // Day0Attempts

        // Day0SPZMorpho

        // Day0SPZLocation

        // Day2Grade

        // Day3Sino

        // Day3End

        // Day4SiNo

        // TidNo

        // Day0SpOrgin

        // DidNO

        // ICSiIVFDateTime

        // PrimaryEmbrologist

        // SecondaryEmbrologist

        // Incubator

        // location

        // Remarks

        // OocyteNo

        // Stage

        // vitrificationDate

        // vitriPrimaryEmbryologist

        // vitriSecondaryEmbryologist

        // vitriEmbryoNo

        // vitriFertilisationDate

        // vitriDay

        // vitriGrade

        // vitriIncubator

        // vitriTank

        // vitriCanister

        // vitriGobiet

        // vitriViscotube

        // vitriCryolockNo

        // vitriCryolockColour

        // vitriStage

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawReFrozen

        // thawAbserve

        // thawDiscard

        // ETCatheter

        // ETDifficulty

        // ETEasy

        // ETComments

        // ETDoctor

        // ETEmbryologist

        // Day2End

        // Day2SiNo

        // EndSiNo

        // Day4End

        // ETDate

        // Day1End
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

            // SpermOrigin
            $this->SpermOrigin->ViewValue = $this->SpermOrigin->CurrentValue;
            $this->SpermOrigin->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
            $this->Day0OocyteStage->ViewCustomAttributes = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->CurrentValue;
            $this->Day0PolarBodyPosition->ViewCustomAttributes = "";

            // Day0Breakage
            $this->Day0Breakage->ViewValue = $this->Day0Breakage->CurrentValue;
            $this->Day0Breakage->ViewCustomAttributes = "";

            // Day1PN
            $this->Day1PN->ViewValue = $this->Day1PN->CurrentValue;
            $this->Day1PN->ViewCustomAttributes = "";

            // Day1PB
            $this->Day1PB->ViewValue = $this->Day1PB->CurrentValue;
            $this->Day1PB->ViewCustomAttributes = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->CurrentValue;
            $this->Day1Pronucleus->ViewCustomAttributes = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->CurrentValue;
            $this->Day1Nucleolus->ViewCustomAttributes = "";

            // Day1Halo
            $this->Day1Halo->ViewValue = $this->Day1Halo->CurrentValue;
            $this->Day1Halo->ViewCustomAttributes = "";

            // Day1Sperm
            $this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
            $this->Day1Sperm->ViewCustomAttributes = "";

            // Day2CellNo
            $this->Day2CellNo->ViewValue = $this->Day2CellNo->CurrentValue;
            $this->Day2CellNo->ViewCustomAttributes = "";

            // Day2Frag
            $this->Day2Frag->ViewValue = $this->Day2Frag->CurrentValue;
            $this->Day2Frag->ViewCustomAttributes = "";

            // Day2Symmetry
            $this->Day2Symmetry->ViewValue = $this->Day2Symmetry->CurrentValue;
            $this->Day2Symmetry->ViewCustomAttributes = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->ViewValue = $this->Day2Cryoptop->CurrentValue;
            $this->Day2Cryoptop->ViewCustomAttributes = "";

            // Day3CellNo
            $this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
            $this->Day3CellNo->ViewCustomAttributes = "";

            // Day3Frag
            $this->Day3Frag->ViewValue = $this->Day3Frag->CurrentValue;
            $this->Day3Frag->ViewCustomAttributes = "";

            // Day3Symmetry
            $this->Day3Symmetry->ViewValue = $this->Day3Symmetry->CurrentValue;
            $this->Day3Symmetry->ViewCustomAttributes = "";

            // Day3Grade
            $this->Day3Grade->ViewValue = $this->Day3Grade->CurrentValue;
            $this->Day3Grade->ViewCustomAttributes = "";

            // Day3Vacoules
            $this->Day3Vacoules->ViewValue = $this->Day3Vacoules->CurrentValue;
            $this->Day3Vacoules->ViewCustomAttributes = "";

            // Day3ZP
            $this->Day3ZP->ViewValue = $this->Day3ZP->CurrentValue;
            $this->Day3ZP->ViewCustomAttributes = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->CurrentValue;
            $this->Day3Cryoptop->ViewCustomAttributes = "";

            // Day4CellNo
            $this->Day4CellNo->ViewValue = $this->Day4CellNo->CurrentValue;
            $this->Day4CellNo->ViewCustomAttributes = "";

            // Day4Frag
            $this->Day4Frag->ViewValue = $this->Day4Frag->CurrentValue;
            $this->Day4Frag->ViewCustomAttributes = "";

            // Day4Symmetry
            $this->Day4Symmetry->ViewValue = $this->Day4Symmetry->CurrentValue;
            $this->Day4Symmetry->ViewCustomAttributes = "";

            // Day4Grade
            $this->Day4Grade->ViewValue = $this->Day4Grade->CurrentValue;
            $this->Day4Grade->ViewCustomAttributes = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->CurrentValue;
            $this->Day4Cryoptop->ViewCustomAttributes = "";

            // Day5CellNo
            $this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
            $this->Day5CellNo->ViewCustomAttributes = "";

            // Day5ICM
            $this->Day5ICM->ViewValue = $this->Day5ICM->CurrentValue;
            $this->Day5ICM->ViewCustomAttributes = "";

            // Day5TE
            $this->Day5TE->ViewValue = $this->Day5TE->CurrentValue;
            $this->Day5TE->ViewCustomAttributes = "";

            // Day5Observation
            $this->Day5Observation->ViewValue = $this->Day5Observation->CurrentValue;
            $this->Day5Observation->ViewCustomAttributes = "";

            // Day5Collapsed
            $this->Day5Collapsed->ViewValue = $this->Day5Collapsed->CurrentValue;
            $this->Day5Collapsed->ViewCustomAttributes = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->CurrentValue;
            $this->Day5Vacoulles->ViewCustomAttributes = "";

            // Day5Grade
            $this->Day5Grade->ViewValue = $this->Day5Grade->CurrentValue;
            $this->Day5Grade->ViewCustomAttributes = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->CurrentValue;
            $this->Day5Cryoptop->ViewCustomAttributes = "";

            // Day6CellNo
            $this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
            $this->Day6CellNo->ViewCustomAttributes = "";

            // Day6ICM
            $this->Day6ICM->ViewValue = $this->Day6ICM->CurrentValue;
            $this->Day6ICM->ViewCustomAttributes = "";

            // Day6TE
            $this->Day6TE->ViewValue = $this->Day6TE->CurrentValue;
            $this->Day6TE->ViewCustomAttributes = "";

            // Day6Observation
            $this->Day6Observation->ViewValue = $this->Day6Observation->CurrentValue;
            $this->Day6Observation->ViewCustomAttributes = "";

            // Day6Collapsed
            $this->Day6Collapsed->ViewValue = $this->Day6Collapsed->CurrentValue;
            $this->Day6Collapsed->ViewCustomAttributes = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->CurrentValue;
            $this->Day6Vacoulles->ViewCustomAttributes = "";

            // Day6Grade
            $this->Day6Grade->ViewValue = $this->Day6Grade->CurrentValue;
            $this->Day6Grade->ViewCustomAttributes = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
            $this->Day6Cryoptop->ViewCustomAttributes = "";

            // EndingDay
            $this->EndingDay->ViewValue = $this->EndingDay->CurrentValue;
            $this->EndingDay->ViewCustomAttributes = "";

            // EndingCellStage
            $this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
            $this->EndingCellStage->ViewCustomAttributes = "";

            // EndingGrade
            $this->EndingGrade->ViewValue = $this->EndingGrade->CurrentValue;
            $this->EndingGrade->ViewCustomAttributes = "";

            // EndingState
            $this->EndingState->ViewValue = $this->EndingState->CurrentValue;
            $this->EndingState->ViewCustomAttributes = "";

            // Day0sino
            $this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
            $this->Day0sino->ViewCustomAttributes = "";

            // Day0Attempts
            $this->Day0Attempts->ViewValue = $this->Day0Attempts->CurrentValue;
            $this->Day0Attempts->ViewCustomAttributes = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->CurrentValue;
            $this->Day0SPZMorpho->ViewCustomAttributes = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->CurrentValue;
            $this->Day0SPZLocation->ViewCustomAttributes = "";

            // Day2Grade
            $this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
            $this->Day2Grade->ViewCustomAttributes = "";

            // Day3Sino
            $this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
            $this->Day3Sino->ViewCustomAttributes = "";

            // Day3End
            $this->Day3End->ViewValue = $this->Day3End->CurrentValue;
            $this->Day3End->ViewCustomAttributes = "";

            // Day4SiNo
            $this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
            $this->Day4SiNo->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->CurrentValue;
            $this->Day0SpOrgin->ViewCustomAttributes = "";

            // DidNO
            $this->DidNO->ViewValue = $this->DidNO->CurrentValue;
            $this->DidNO->ViewCustomAttributes = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->ViewValue = $this->ICSiIVFDateTime->CurrentValue;
            $this->ICSiIVFDateTime->ViewValue = FormatDateTime($this->ICSiIVFDateTime->ViewValue, 0);
            $this->ICSiIVFDateTime->ViewCustomAttributes = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->ViewValue = $this->PrimaryEmbrologist->CurrentValue;
            $this->PrimaryEmbrologist->ViewCustomAttributes = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->ViewValue = $this->SecondaryEmbrologist->CurrentValue;
            $this->SecondaryEmbrologist->ViewCustomAttributes = "";

            // Incubator
            $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
            $this->Incubator->ViewCustomAttributes = "";

            // location
            $this->location->ViewValue = $this->location->CurrentValue;
            $this->location->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // OocyteNo
            $this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
            $this->OocyteNo->ViewCustomAttributes = "";

            // Stage
            $this->Stage->ViewValue = $this->Stage->CurrentValue;
            $this->Stage->ViewCustomAttributes = "";

            // vitrificationDate
            $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
            $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
            $this->vitrificationDate->ViewCustomAttributes = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->ViewValue = $this->vitriPrimaryEmbryologist->CurrentValue;
            $this->vitriPrimaryEmbryologist->ViewCustomAttributes = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->ViewValue = $this->vitriSecondaryEmbryologist->CurrentValue;
            $this->vitriSecondaryEmbryologist->ViewCustomAttributes = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->ViewValue = $this->vitriEmbryoNo->CurrentValue;
            $this->vitriEmbryoNo->ViewCustomAttributes = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
            $this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
            $this->vitriFertilisationDate->ViewCustomAttributes = "";

            // vitriDay
            $this->vitriDay->ViewValue = $this->vitriDay->CurrentValue;
            $this->vitriDay->ViewCustomAttributes = "";

            // vitriGrade
            $this->vitriGrade->ViewValue = $this->vitriGrade->CurrentValue;
            $this->vitriGrade->ViewCustomAttributes = "";

            // vitriIncubator
            $this->vitriIncubator->ViewValue = $this->vitriIncubator->CurrentValue;
            $this->vitriIncubator->ViewCustomAttributes = "";

            // vitriTank
            $this->vitriTank->ViewValue = $this->vitriTank->CurrentValue;
            $this->vitriTank->ViewCustomAttributes = "";

            // vitriCanister
            $this->vitriCanister->ViewValue = $this->vitriCanister->CurrentValue;
            $this->vitriCanister->ViewCustomAttributes = "";

            // vitriGobiet
            $this->vitriGobiet->ViewValue = $this->vitriGobiet->CurrentValue;
            $this->vitriGobiet->ViewCustomAttributes = "";

            // vitriViscotube
            $this->vitriViscotube->ViewValue = $this->vitriViscotube->CurrentValue;
            $this->vitriViscotube->ViewCustomAttributes = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->ViewValue = $this->vitriCryolockNo->CurrentValue;
            $this->vitriCryolockNo->ViewCustomAttributes = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->ViewValue = $this->vitriCryolockColour->CurrentValue;
            $this->vitriCryolockColour->ViewCustomAttributes = "";

            // vitriStage
            $this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
            $this->vitriStage->ViewCustomAttributes = "";

            // thawDate
            $this->thawDate->ViewValue = $this->thawDate->CurrentValue;
            $this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
            $this->thawDate->ViewCustomAttributes = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
            $this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
            $this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

            // thawET
            $this->thawET->ViewValue = $this->thawET->CurrentValue;
            $this->thawET->ViewCustomAttributes = "";

            // thawReFrozen
            $this->thawReFrozen->ViewValue = $this->thawReFrozen->CurrentValue;
            $this->thawReFrozen->ViewCustomAttributes = "";

            // thawAbserve
            $this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
            $this->thawAbserve->ViewCustomAttributes = "";

            // thawDiscard
            $this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
            $this->thawDiscard->ViewCustomAttributes = "";

            // ETCatheter
            $this->ETCatheter->ViewValue = $this->ETCatheter->CurrentValue;
            $this->ETCatheter->ViewCustomAttributes = "";

            // ETDifficulty
            $this->ETDifficulty->ViewValue = $this->ETDifficulty->CurrentValue;
            $this->ETDifficulty->ViewCustomAttributes = "";

            // ETEasy
            $this->ETEasy->ViewValue = $this->ETEasy->CurrentValue;
            $this->ETEasy->ViewCustomAttributes = "";

            // ETComments
            $this->ETComments->ViewValue = $this->ETComments->CurrentValue;
            $this->ETComments->ViewCustomAttributes = "";

            // ETDoctor
            $this->ETDoctor->ViewValue = $this->ETDoctor->CurrentValue;
            $this->ETDoctor->ViewCustomAttributes = "";

            // ETEmbryologist
            $this->ETEmbryologist->ViewValue = $this->ETEmbryologist->CurrentValue;
            $this->ETEmbryologist->ViewCustomAttributes = "";

            // Day2End
            $this->Day2End->ViewValue = $this->Day2End->CurrentValue;
            $this->Day2End->ViewCustomAttributes = "";

            // Day2SiNo
            $this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
            $this->Day2SiNo->ViewCustomAttributes = "";

            // EndSiNo
            $this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
            $this->EndSiNo->ViewCustomAttributes = "";

            // Day4End
            $this->Day4End->ViewValue = $this->Day4End->CurrentValue;
            $this->Day4End->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
            $this->ETDate->ViewCustomAttributes = "";

            // Day1End
            $this->Day1End->ViewValue = $this->Day1End->CurrentValue;
            $this->Day1End->ViewCustomAttributes = "";

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

            // SpermOrigin
            $this->SpermOrigin->LinkCustomAttributes = "";
            $this->SpermOrigin->HrefValue = "";
            $this->SpermOrigin->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->LinkCustomAttributes = "";
            $this->Day0OocyteStage->HrefValue = "";
            $this->Day0OocyteStage->TooltipValue = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->LinkCustomAttributes = "";
            $this->Day0PolarBodyPosition->HrefValue = "";
            $this->Day0PolarBodyPosition->TooltipValue = "";

            // Day0Breakage
            $this->Day0Breakage->LinkCustomAttributes = "";
            $this->Day0Breakage->HrefValue = "";
            $this->Day0Breakage->TooltipValue = "";

            // Day1PN
            $this->Day1PN->LinkCustomAttributes = "";
            $this->Day1PN->HrefValue = "";
            $this->Day1PN->TooltipValue = "";

            // Day1PB
            $this->Day1PB->LinkCustomAttributes = "";
            $this->Day1PB->HrefValue = "";
            $this->Day1PB->TooltipValue = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->LinkCustomAttributes = "";
            $this->Day1Pronucleus->HrefValue = "";
            $this->Day1Pronucleus->TooltipValue = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->LinkCustomAttributes = "";
            $this->Day1Nucleolus->HrefValue = "";
            $this->Day1Nucleolus->TooltipValue = "";

            // Day1Halo
            $this->Day1Halo->LinkCustomAttributes = "";
            $this->Day1Halo->HrefValue = "";
            $this->Day1Halo->TooltipValue = "";

            // Day1Sperm
            $this->Day1Sperm->LinkCustomAttributes = "";
            $this->Day1Sperm->HrefValue = "";
            $this->Day1Sperm->TooltipValue = "";

            // Day2CellNo
            $this->Day2CellNo->LinkCustomAttributes = "";
            $this->Day2CellNo->HrefValue = "";
            $this->Day2CellNo->TooltipValue = "";

            // Day2Frag
            $this->Day2Frag->LinkCustomAttributes = "";
            $this->Day2Frag->HrefValue = "";
            $this->Day2Frag->TooltipValue = "";

            // Day2Symmetry
            $this->Day2Symmetry->LinkCustomAttributes = "";
            $this->Day2Symmetry->HrefValue = "";
            $this->Day2Symmetry->TooltipValue = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->LinkCustomAttributes = "";
            $this->Day2Cryoptop->HrefValue = "";
            $this->Day2Cryoptop->TooltipValue = "";

            // Day3CellNo
            $this->Day3CellNo->LinkCustomAttributes = "";
            $this->Day3CellNo->HrefValue = "";
            $this->Day3CellNo->TooltipValue = "";

            // Day3Frag
            $this->Day3Frag->LinkCustomAttributes = "";
            $this->Day3Frag->HrefValue = "";
            $this->Day3Frag->TooltipValue = "";

            // Day3Symmetry
            $this->Day3Symmetry->LinkCustomAttributes = "";
            $this->Day3Symmetry->HrefValue = "";
            $this->Day3Symmetry->TooltipValue = "";

            // Day3Grade
            $this->Day3Grade->LinkCustomAttributes = "";
            $this->Day3Grade->HrefValue = "";
            $this->Day3Grade->TooltipValue = "";

            // Day3Vacoules
            $this->Day3Vacoules->LinkCustomAttributes = "";
            $this->Day3Vacoules->HrefValue = "";
            $this->Day3Vacoules->TooltipValue = "";

            // Day3ZP
            $this->Day3ZP->LinkCustomAttributes = "";
            $this->Day3ZP->HrefValue = "";
            $this->Day3ZP->TooltipValue = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->LinkCustomAttributes = "";
            $this->Day3Cryoptop->HrefValue = "";
            $this->Day3Cryoptop->TooltipValue = "";

            // Day4CellNo
            $this->Day4CellNo->LinkCustomAttributes = "";
            $this->Day4CellNo->HrefValue = "";
            $this->Day4CellNo->TooltipValue = "";

            // Day4Frag
            $this->Day4Frag->LinkCustomAttributes = "";
            $this->Day4Frag->HrefValue = "";
            $this->Day4Frag->TooltipValue = "";

            // Day4Symmetry
            $this->Day4Symmetry->LinkCustomAttributes = "";
            $this->Day4Symmetry->HrefValue = "";
            $this->Day4Symmetry->TooltipValue = "";

            // Day4Grade
            $this->Day4Grade->LinkCustomAttributes = "";
            $this->Day4Grade->HrefValue = "";
            $this->Day4Grade->TooltipValue = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->LinkCustomAttributes = "";
            $this->Day4Cryoptop->HrefValue = "";
            $this->Day4Cryoptop->TooltipValue = "";

            // Day5CellNo
            $this->Day5CellNo->LinkCustomAttributes = "";
            $this->Day5CellNo->HrefValue = "";
            $this->Day5CellNo->TooltipValue = "";

            // Day5ICM
            $this->Day5ICM->LinkCustomAttributes = "";
            $this->Day5ICM->HrefValue = "";
            $this->Day5ICM->TooltipValue = "";

            // Day5TE
            $this->Day5TE->LinkCustomAttributes = "";
            $this->Day5TE->HrefValue = "";
            $this->Day5TE->TooltipValue = "";

            // Day5Observation
            $this->Day5Observation->LinkCustomAttributes = "";
            $this->Day5Observation->HrefValue = "";
            $this->Day5Observation->TooltipValue = "";

            // Day5Collapsed
            $this->Day5Collapsed->LinkCustomAttributes = "";
            $this->Day5Collapsed->HrefValue = "";
            $this->Day5Collapsed->TooltipValue = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->LinkCustomAttributes = "";
            $this->Day5Vacoulles->HrefValue = "";
            $this->Day5Vacoulles->TooltipValue = "";

            // Day5Grade
            $this->Day5Grade->LinkCustomAttributes = "";
            $this->Day5Grade->HrefValue = "";
            $this->Day5Grade->TooltipValue = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->LinkCustomAttributes = "";
            $this->Day5Cryoptop->HrefValue = "";
            $this->Day5Cryoptop->TooltipValue = "";

            // Day6CellNo
            $this->Day6CellNo->LinkCustomAttributes = "";
            $this->Day6CellNo->HrefValue = "";
            $this->Day6CellNo->TooltipValue = "";

            // Day6ICM
            $this->Day6ICM->LinkCustomAttributes = "";
            $this->Day6ICM->HrefValue = "";
            $this->Day6ICM->TooltipValue = "";

            // Day6TE
            $this->Day6TE->LinkCustomAttributes = "";
            $this->Day6TE->HrefValue = "";
            $this->Day6TE->TooltipValue = "";

            // Day6Observation
            $this->Day6Observation->LinkCustomAttributes = "";
            $this->Day6Observation->HrefValue = "";
            $this->Day6Observation->TooltipValue = "";

            // Day6Collapsed
            $this->Day6Collapsed->LinkCustomAttributes = "";
            $this->Day6Collapsed->HrefValue = "";
            $this->Day6Collapsed->TooltipValue = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->LinkCustomAttributes = "";
            $this->Day6Vacoulles->HrefValue = "";
            $this->Day6Vacoulles->TooltipValue = "";

            // Day6Grade
            $this->Day6Grade->LinkCustomAttributes = "";
            $this->Day6Grade->HrefValue = "";
            $this->Day6Grade->TooltipValue = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->LinkCustomAttributes = "";
            $this->Day6Cryoptop->HrefValue = "";
            $this->Day6Cryoptop->TooltipValue = "";

            // EndingDay
            $this->EndingDay->LinkCustomAttributes = "";
            $this->EndingDay->HrefValue = "";
            $this->EndingDay->TooltipValue = "";

            // EndingCellStage
            $this->EndingCellStage->LinkCustomAttributes = "";
            $this->EndingCellStage->HrefValue = "";
            $this->EndingCellStage->TooltipValue = "";

            // EndingGrade
            $this->EndingGrade->LinkCustomAttributes = "";
            $this->EndingGrade->HrefValue = "";
            $this->EndingGrade->TooltipValue = "";

            // EndingState
            $this->EndingState->LinkCustomAttributes = "";
            $this->EndingState->HrefValue = "";
            $this->EndingState->TooltipValue = "";

            // Day0sino
            $this->Day0sino->LinkCustomAttributes = "";
            $this->Day0sino->HrefValue = "";
            $this->Day0sino->TooltipValue = "";

            // Day0Attempts
            $this->Day0Attempts->LinkCustomAttributes = "";
            $this->Day0Attempts->HrefValue = "";
            $this->Day0Attempts->TooltipValue = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->LinkCustomAttributes = "";
            $this->Day0SPZMorpho->HrefValue = "";
            $this->Day0SPZMorpho->TooltipValue = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->LinkCustomAttributes = "";
            $this->Day0SPZLocation->HrefValue = "";
            $this->Day0SPZLocation->TooltipValue = "";

            // Day2Grade
            $this->Day2Grade->LinkCustomAttributes = "";
            $this->Day2Grade->HrefValue = "";
            $this->Day2Grade->TooltipValue = "";

            // Day3Sino
            $this->Day3Sino->LinkCustomAttributes = "";
            $this->Day3Sino->HrefValue = "";
            $this->Day3Sino->TooltipValue = "";

            // Day3End
            $this->Day3End->LinkCustomAttributes = "";
            $this->Day3End->HrefValue = "";
            $this->Day3End->TooltipValue = "";

            // Day4SiNo
            $this->Day4SiNo->LinkCustomAttributes = "";
            $this->Day4SiNo->HrefValue = "";
            $this->Day4SiNo->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->LinkCustomAttributes = "";
            $this->Day0SpOrgin->HrefValue = "";
            $this->Day0SpOrgin->TooltipValue = "";

            // DidNO
            $this->DidNO->LinkCustomAttributes = "";
            $this->DidNO->HrefValue = "";
            $this->DidNO->TooltipValue = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->LinkCustomAttributes = "";
            $this->ICSiIVFDateTime->HrefValue = "";
            $this->ICSiIVFDateTime->TooltipValue = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->LinkCustomAttributes = "";
            $this->PrimaryEmbrologist->HrefValue = "";
            $this->PrimaryEmbrologist->TooltipValue = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->LinkCustomAttributes = "";
            $this->SecondaryEmbrologist->HrefValue = "";
            $this->SecondaryEmbrologist->TooltipValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";
            $this->Incubator->TooltipValue = "";

            // location
            $this->location->LinkCustomAttributes = "";
            $this->location->HrefValue = "";
            $this->location->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // OocyteNo
            $this->OocyteNo->LinkCustomAttributes = "";
            $this->OocyteNo->HrefValue = "";
            $this->OocyteNo->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";
            $this->vitrificationDate->TooltipValue = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriPrimaryEmbryologist->HrefValue = "";
            $this->vitriPrimaryEmbryologist->TooltipValue = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriSecondaryEmbryologist->HrefValue = "";
            $this->vitriSecondaryEmbryologist->TooltipValue = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->LinkCustomAttributes = "";
            $this->vitriEmbryoNo->HrefValue = "";
            $this->vitriEmbryoNo->TooltipValue = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->LinkCustomAttributes = "";
            $this->vitriFertilisationDate->HrefValue = "";
            $this->vitriFertilisationDate->TooltipValue = "";

            // vitriDay
            $this->vitriDay->LinkCustomAttributes = "";
            $this->vitriDay->HrefValue = "";
            $this->vitriDay->TooltipValue = "";

            // vitriGrade
            $this->vitriGrade->LinkCustomAttributes = "";
            $this->vitriGrade->HrefValue = "";
            $this->vitriGrade->TooltipValue = "";

            // vitriIncubator
            $this->vitriIncubator->LinkCustomAttributes = "";
            $this->vitriIncubator->HrefValue = "";
            $this->vitriIncubator->TooltipValue = "";

            // vitriTank
            $this->vitriTank->LinkCustomAttributes = "";
            $this->vitriTank->HrefValue = "";
            $this->vitriTank->TooltipValue = "";

            // vitriCanister
            $this->vitriCanister->LinkCustomAttributes = "";
            $this->vitriCanister->HrefValue = "";
            $this->vitriCanister->TooltipValue = "";

            // vitriGobiet
            $this->vitriGobiet->LinkCustomAttributes = "";
            $this->vitriGobiet->HrefValue = "";
            $this->vitriGobiet->TooltipValue = "";

            // vitriViscotube
            $this->vitriViscotube->LinkCustomAttributes = "";
            $this->vitriViscotube->HrefValue = "";
            $this->vitriViscotube->TooltipValue = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->LinkCustomAttributes = "";
            $this->vitriCryolockNo->HrefValue = "";
            $this->vitriCryolockNo->TooltipValue = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->LinkCustomAttributes = "";
            $this->vitriCryolockColour->HrefValue = "";
            $this->vitriCryolockColour->TooltipValue = "";

            // vitriStage
            $this->vitriStage->LinkCustomAttributes = "";
            $this->vitriStage->HrefValue = "";
            $this->vitriStage->TooltipValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";
            $this->thawDate->TooltipValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";
            $this->thawPrimaryEmbryologist->TooltipValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";
            $this->thawSecondaryEmbryologist->TooltipValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";
            $this->thawET->TooltipValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";
            $this->thawReFrozen->TooltipValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";
            $this->thawAbserve->TooltipValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";
            $this->thawDiscard->TooltipValue = "";

            // ETCatheter
            $this->ETCatheter->LinkCustomAttributes = "";
            $this->ETCatheter->HrefValue = "";
            $this->ETCatheter->TooltipValue = "";

            // ETDifficulty
            $this->ETDifficulty->LinkCustomAttributes = "";
            $this->ETDifficulty->HrefValue = "";
            $this->ETDifficulty->TooltipValue = "";

            // ETEasy
            $this->ETEasy->LinkCustomAttributes = "";
            $this->ETEasy->HrefValue = "";
            $this->ETEasy->TooltipValue = "";

            // ETComments
            $this->ETComments->LinkCustomAttributes = "";
            $this->ETComments->HrefValue = "";
            $this->ETComments->TooltipValue = "";

            // ETDoctor
            $this->ETDoctor->LinkCustomAttributes = "";
            $this->ETDoctor->HrefValue = "";
            $this->ETDoctor->TooltipValue = "";

            // ETEmbryologist
            $this->ETEmbryologist->LinkCustomAttributes = "";
            $this->ETEmbryologist->HrefValue = "";
            $this->ETEmbryologist->TooltipValue = "";

            // Day2End
            $this->Day2End->LinkCustomAttributes = "";
            $this->Day2End->HrefValue = "";
            $this->Day2End->TooltipValue = "";

            // Day2SiNo
            $this->Day2SiNo->LinkCustomAttributes = "";
            $this->Day2SiNo->HrefValue = "";
            $this->Day2SiNo->TooltipValue = "";

            // EndSiNo
            $this->EndSiNo->LinkCustomAttributes = "";
            $this->EndSiNo->HrefValue = "";
            $this->EndSiNo->TooltipValue = "";

            // Day4End
            $this->Day4End->LinkCustomAttributes = "";
            $this->Day4End->HrefValue = "";
            $this->Day4End->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // Day1End
            $this->Day1End->LinkCustomAttributes = "";
            $this->Day1End->HrefValue = "";
            $this->Day1End->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfEmbryologyChartList"), "", $this->TableVar, true);
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

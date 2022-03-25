<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfStimulationChartAdd extends IvfStimulationChart
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_stimulation_chart';

    // Page object name
    public $PageObjName = "IvfStimulationChartAdd";

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

        // Table object (ivf_stimulation_chart)
        if (!isset($GLOBALS["ivf_stimulation_chart"]) || get_class($GLOBALS["ivf_stimulation_chart"]) == PROJECT_NAMESPACE . "ivf_stimulation_chart") {
            $GLOBALS["ivf_stimulation_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_stimulation_chart');
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
                $doc = new $class(Container("ivf_stimulation_chart"));
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
                    if ($pageName == "IvfStimulationChartView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

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
        $this->id->Visible = false;
        $this->RIDNo->setVisibility();
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->FemaleFactor->setVisibility();
        $this->MaleFactor->setVisibility();
        $this->Protocol->setVisibility();
        $this->SemenFrozen->setVisibility();
        $this->A4ICSICycle->setVisibility();
        $this->TotalICSICycle->setVisibility();
        $this->TypeOfInfertility->setVisibility();
        $this->Duration->setVisibility();
        $this->LMP->setVisibility();
        $this->RelevantHistory->setVisibility();
        $this->IUICycles->setVisibility();
        $this->AFC->setVisibility();
        $this->AMH->setVisibility();
        $this->FBMI->setVisibility();
        $this->MBMI->setVisibility();
        $this->OvarianVolumeRT->setVisibility();
        $this->OvarianVolumeLT->setVisibility();
        $this->DAYSOFSTIMULATION->setVisibility();
        $this->DOSEOFGONADOTROPINS->setVisibility();
        $this->INJTYPE->setVisibility();
        $this->ANTAGONISTDAYS->setVisibility();
        $this->ANTAGONISTSTARTDAY->setVisibility();
        $this->GROWTHHORMONE->setVisibility();
        $this->PRETREATMENT->setVisibility();
        $this->SerumP4->setVisibility();
        $this->FORT->setVisibility();
        $this->MedicalFactors->setVisibility();
        $this->SCDate->setVisibility();
        $this->OvarianSurgery->setVisibility();
        $this->PreProcedureOrder->setVisibility();
        $this->TRIGGERR->setVisibility();
        $this->TRIGGERDATE->setVisibility();
        $this->ATHOMEorCLINIC->setVisibility();
        $this->OPUDATE->setVisibility();
        $this->ALLFREEZEINDICATION->setVisibility();
        $this->ERA->setVisibility();
        $this->PGTA->setVisibility();
        $this->PGD->setVisibility();
        $this->DATEOFET->setVisibility();
        $this->ET->setVisibility();
        $this->ESET->setVisibility();
        $this->DOET->setVisibility();
        $this->SEMENPREPARATION->setVisibility();
        $this->REASONFORESET->setVisibility();
        $this->Expectedoocytes->setVisibility();
        $this->StChDate1->setVisibility();
        $this->StChDate2->setVisibility();
        $this->StChDate3->setVisibility();
        $this->StChDate4->setVisibility();
        $this->StChDate5->setVisibility();
        $this->StChDate6->setVisibility();
        $this->StChDate7->setVisibility();
        $this->StChDate8->setVisibility();
        $this->StChDate9->setVisibility();
        $this->StChDate10->setVisibility();
        $this->StChDate11->setVisibility();
        $this->StChDate12->setVisibility();
        $this->StChDate13->setVisibility();
        $this->CycleDay1->setVisibility();
        $this->CycleDay2->setVisibility();
        $this->CycleDay3->setVisibility();
        $this->CycleDay4->setVisibility();
        $this->CycleDay5->setVisibility();
        $this->CycleDay6->setVisibility();
        $this->CycleDay7->setVisibility();
        $this->CycleDay8->setVisibility();
        $this->CycleDay9->setVisibility();
        $this->CycleDay10->setVisibility();
        $this->CycleDay11->setVisibility();
        $this->CycleDay12->setVisibility();
        $this->CycleDay13->setVisibility();
        $this->StimulationDay1->setVisibility();
        $this->StimulationDay2->setVisibility();
        $this->StimulationDay3->setVisibility();
        $this->StimulationDay4->setVisibility();
        $this->StimulationDay5->setVisibility();
        $this->StimulationDay6->setVisibility();
        $this->StimulationDay7->setVisibility();
        $this->StimulationDay8->setVisibility();
        $this->StimulationDay9->setVisibility();
        $this->StimulationDay10->setVisibility();
        $this->StimulationDay11->setVisibility();
        $this->StimulationDay12->setVisibility();
        $this->StimulationDay13->setVisibility();
        $this->Tablet1->setVisibility();
        $this->Tablet2->setVisibility();
        $this->Tablet3->setVisibility();
        $this->Tablet4->setVisibility();
        $this->Tablet5->setVisibility();
        $this->Tablet6->setVisibility();
        $this->Tablet7->setVisibility();
        $this->Tablet8->setVisibility();
        $this->Tablet9->setVisibility();
        $this->Tablet10->setVisibility();
        $this->Tablet11->setVisibility();
        $this->Tablet12->setVisibility();
        $this->Tablet13->setVisibility();
        $this->RFSH1->setVisibility();
        $this->RFSH2->setVisibility();
        $this->RFSH3->setVisibility();
        $this->RFSH4->setVisibility();
        $this->RFSH5->setVisibility();
        $this->RFSH6->setVisibility();
        $this->RFSH7->setVisibility();
        $this->RFSH8->setVisibility();
        $this->RFSH9->setVisibility();
        $this->RFSH10->setVisibility();
        $this->RFSH11->setVisibility();
        $this->RFSH12->setVisibility();
        $this->RFSH13->setVisibility();
        $this->HMG1->setVisibility();
        $this->HMG2->setVisibility();
        $this->HMG3->setVisibility();
        $this->HMG4->setVisibility();
        $this->HMG5->setVisibility();
        $this->HMG6->setVisibility();
        $this->HMG7->setVisibility();
        $this->HMG8->setVisibility();
        $this->HMG9->setVisibility();
        $this->HMG10->setVisibility();
        $this->HMG11->setVisibility();
        $this->HMG12->setVisibility();
        $this->HMG13->setVisibility();
        $this->GnRH1->setVisibility();
        $this->GnRH2->setVisibility();
        $this->GnRH3->setVisibility();
        $this->GnRH4->setVisibility();
        $this->GnRH5->setVisibility();
        $this->GnRH6->setVisibility();
        $this->GnRH7->setVisibility();
        $this->GnRH8->setVisibility();
        $this->GnRH9->setVisibility();
        $this->GnRH10->setVisibility();
        $this->GnRH11->setVisibility();
        $this->GnRH12->setVisibility();
        $this->GnRH13->setVisibility();
        $this->E21->setVisibility();
        $this->E22->setVisibility();
        $this->E23->setVisibility();
        $this->E24->setVisibility();
        $this->E25->setVisibility();
        $this->E26->setVisibility();
        $this->E27->setVisibility();
        $this->E28->setVisibility();
        $this->E29->setVisibility();
        $this->E210->setVisibility();
        $this->E211->setVisibility();
        $this->E212->setVisibility();
        $this->E213->setVisibility();
        $this->P41->setVisibility();
        $this->P42->setVisibility();
        $this->P43->setVisibility();
        $this->P44->setVisibility();
        $this->P45->setVisibility();
        $this->P46->setVisibility();
        $this->P47->setVisibility();
        $this->P48->setVisibility();
        $this->P49->setVisibility();
        $this->P410->setVisibility();
        $this->P411->setVisibility();
        $this->P412->setVisibility();
        $this->P413->setVisibility();
        $this->USGRt1->setVisibility();
        $this->USGRt2->setVisibility();
        $this->USGRt3->setVisibility();
        $this->USGRt4->setVisibility();
        $this->USGRt5->setVisibility();
        $this->USGRt6->setVisibility();
        $this->USGRt7->setVisibility();
        $this->USGRt8->setVisibility();
        $this->USGRt9->setVisibility();
        $this->USGRt10->setVisibility();
        $this->USGRt11->setVisibility();
        $this->USGRt12->setVisibility();
        $this->USGRt13->setVisibility();
        $this->USGLt1->setVisibility();
        $this->USGLt2->setVisibility();
        $this->USGLt3->setVisibility();
        $this->USGLt4->setVisibility();
        $this->USGLt5->setVisibility();
        $this->USGLt6->setVisibility();
        $this->USGLt7->setVisibility();
        $this->USGLt8->setVisibility();
        $this->USGLt9->setVisibility();
        $this->USGLt10->setVisibility();
        $this->USGLt11->setVisibility();
        $this->USGLt12->setVisibility();
        $this->USGLt13->setVisibility();
        $this->EM1->setVisibility();
        $this->EM2->setVisibility();
        $this->EM3->setVisibility();
        $this->EM4->setVisibility();
        $this->EM5->setVisibility();
        $this->EM6->setVisibility();
        $this->EM7->setVisibility();
        $this->EM8->setVisibility();
        $this->EM9->setVisibility();
        $this->EM10->setVisibility();
        $this->EM11->setVisibility();
        $this->EM12->setVisibility();
        $this->EM13->setVisibility();
        $this->Others1->setVisibility();
        $this->Others2->setVisibility();
        $this->Others3->setVisibility();
        $this->Others4->setVisibility();
        $this->Others5->setVisibility();
        $this->Others6->setVisibility();
        $this->Others7->setVisibility();
        $this->Others8->setVisibility();
        $this->Others9->setVisibility();
        $this->Others10->setVisibility();
        $this->Others11->setVisibility();
        $this->Others12->setVisibility();
        $this->Others13->setVisibility();
        $this->DR1->setVisibility();
        $this->DR2->setVisibility();
        $this->DR3->setVisibility();
        $this->DR4->setVisibility();
        $this->DR5->setVisibility();
        $this->DR6->setVisibility();
        $this->DR7->setVisibility();
        $this->DR8->setVisibility();
        $this->DR9->setVisibility();
        $this->DR10->setVisibility();
        $this->DR11->setVisibility();
        $this->DR12->setVisibility();
        $this->DR13->setVisibility();
        $this->DOCTORRESPONSIBLE->setVisibility();
        $this->TidNo->setVisibility();
        $this->Convert->setVisibility();
        $this->Consultant->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->Hysteroscopy->setVisibility();
        $this->EndometrialScratching->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->CYCLETYPE->setVisibility();
        $this->HRTCYCLE->setVisibility();
        $this->OralEstrogenDosage->setVisibility();
        $this->VaginalEstrogen->setVisibility();
        $this->GCSF->setVisibility();
        $this->ActivatedPRP->setVisibility();
        $this->UCLcm->setVisibility();
        $this->DATOFEMBRYOTRANSFER->setVisibility();
        $this->DAYOFEMBRYOTRANSFER->setVisibility();
        $this->NOOFEMBRYOSTHAWED->setVisibility();
        $this->NOOFEMBRYOSTRANSFERRED->setVisibility();
        $this->DAYOFEMBRYOS->setVisibility();
        $this->CRYOPRESERVEDEMBRYOS->setVisibility();
        $this->ViaAdmin->setVisibility();
        $this->ViaStartDateTime->setVisibility();
        $this->ViaDose->setVisibility();
        $this->AllFreeze->setVisibility();
        $this->TreatmentCancel->setVisibility();
        $this->Reason->setVisibility();
        $this->ProgesteroneAdmin->setVisibility();
        $this->ProgesteroneStart->setVisibility();
        $this->ProgesteroneDose->setVisibility();
        $this->StChDate14->setVisibility();
        $this->StChDate15->setVisibility();
        $this->StChDate16->setVisibility();
        $this->StChDate17->setVisibility();
        $this->StChDate18->setVisibility();
        $this->StChDate19->setVisibility();
        $this->StChDate20->setVisibility();
        $this->StChDate21->setVisibility();
        $this->StChDate22->setVisibility();
        $this->StChDate23->setVisibility();
        $this->StChDate24->setVisibility();
        $this->StChDate25->setVisibility();
        $this->CycleDay14->setVisibility();
        $this->CycleDay15->setVisibility();
        $this->CycleDay16->setVisibility();
        $this->CycleDay17->setVisibility();
        $this->CycleDay18->setVisibility();
        $this->CycleDay19->setVisibility();
        $this->CycleDay20->setVisibility();
        $this->CycleDay21->setVisibility();
        $this->CycleDay22->setVisibility();
        $this->CycleDay23->setVisibility();
        $this->CycleDay24->setVisibility();
        $this->CycleDay25->setVisibility();
        $this->StimulationDay14->setVisibility();
        $this->StimulationDay15->setVisibility();
        $this->StimulationDay16->setVisibility();
        $this->StimulationDay17->setVisibility();
        $this->StimulationDay18->setVisibility();
        $this->StimulationDay19->setVisibility();
        $this->StimulationDay20->setVisibility();
        $this->StimulationDay21->setVisibility();
        $this->StimulationDay22->setVisibility();
        $this->StimulationDay23->setVisibility();
        $this->StimulationDay24->setVisibility();
        $this->StimulationDay25->setVisibility();
        $this->Tablet14->setVisibility();
        $this->Tablet15->setVisibility();
        $this->Tablet16->setVisibility();
        $this->Tablet17->setVisibility();
        $this->Tablet18->setVisibility();
        $this->Tablet19->setVisibility();
        $this->Tablet20->setVisibility();
        $this->Tablet21->setVisibility();
        $this->Tablet22->setVisibility();
        $this->Tablet23->setVisibility();
        $this->Tablet24->setVisibility();
        $this->Tablet25->setVisibility();
        $this->RFSH14->setVisibility();
        $this->RFSH15->setVisibility();
        $this->RFSH16->setVisibility();
        $this->RFSH17->setVisibility();
        $this->RFSH18->setVisibility();
        $this->RFSH19->setVisibility();
        $this->RFSH20->setVisibility();
        $this->RFSH21->setVisibility();
        $this->RFSH22->setVisibility();
        $this->RFSH23->setVisibility();
        $this->RFSH24->setVisibility();
        $this->RFSH25->setVisibility();
        $this->HMG14->setVisibility();
        $this->HMG15->setVisibility();
        $this->HMG16->setVisibility();
        $this->HMG17->setVisibility();
        $this->HMG18->setVisibility();
        $this->HMG19->setVisibility();
        $this->HMG20->setVisibility();
        $this->HMG21->setVisibility();
        $this->HMG22->setVisibility();
        $this->HMG23->setVisibility();
        $this->HMG24->setVisibility();
        $this->HMG25->setVisibility();
        $this->GnRH14->setVisibility();
        $this->GnRH15->setVisibility();
        $this->GnRH16->setVisibility();
        $this->GnRH17->setVisibility();
        $this->GnRH18->setVisibility();
        $this->GnRH19->setVisibility();
        $this->GnRH20->setVisibility();
        $this->GnRH21->setVisibility();
        $this->GnRH22->setVisibility();
        $this->GnRH23->setVisibility();
        $this->GnRH24->setVisibility();
        $this->GnRH25->setVisibility();
        $this->P414->setVisibility();
        $this->P415->setVisibility();
        $this->P416->setVisibility();
        $this->P417->setVisibility();
        $this->P418->setVisibility();
        $this->P419->setVisibility();
        $this->P420->setVisibility();
        $this->P421->setVisibility();
        $this->P422->setVisibility();
        $this->P423->setVisibility();
        $this->P424->setVisibility();
        $this->P425->setVisibility();
        $this->USGRt14->setVisibility();
        $this->USGRt15->setVisibility();
        $this->USGRt16->setVisibility();
        $this->USGRt17->setVisibility();
        $this->USGRt18->setVisibility();
        $this->USGRt19->setVisibility();
        $this->USGRt20->setVisibility();
        $this->USGRt21->setVisibility();
        $this->USGRt22->setVisibility();
        $this->USGRt23->setVisibility();
        $this->USGRt24->setVisibility();
        $this->USGRt25->setVisibility();
        $this->USGLt14->setVisibility();
        $this->USGLt15->setVisibility();
        $this->USGLt16->setVisibility();
        $this->USGLt17->setVisibility();
        $this->USGLt18->setVisibility();
        $this->USGLt19->setVisibility();
        $this->USGLt20->setVisibility();
        $this->USGLt21->setVisibility();
        $this->USGLt22->setVisibility();
        $this->USGLt23->setVisibility();
        $this->USGLt24->setVisibility();
        $this->USGLt25->setVisibility();
        $this->EM14->setVisibility();
        $this->EM15->setVisibility();
        $this->EM16->setVisibility();
        $this->EM17->setVisibility();
        $this->EM18->setVisibility();
        $this->EM19->setVisibility();
        $this->EM20->setVisibility();
        $this->EM21->setVisibility();
        $this->EM22->setVisibility();
        $this->EM23->setVisibility();
        $this->EM24->setVisibility();
        $this->EM25->setVisibility();
        $this->Others14->setVisibility();
        $this->Others15->setVisibility();
        $this->Others16->setVisibility();
        $this->Others17->setVisibility();
        $this->Others18->setVisibility();
        $this->Others19->setVisibility();
        $this->Others20->setVisibility();
        $this->Others21->setVisibility();
        $this->Others22->setVisibility();
        $this->Others23->setVisibility();
        $this->Others24->setVisibility();
        $this->Others25->setVisibility();
        $this->DR14->setVisibility();
        $this->DR15->setVisibility();
        $this->DR16->setVisibility();
        $this->DR17->setVisibility();
        $this->DR18->setVisibility();
        $this->DR19->setVisibility();
        $this->DR20->setVisibility();
        $this->DR21->setVisibility();
        $this->DR22->setVisibility();
        $this->DR23->setVisibility();
        $this->DR24->setVisibility();
        $this->DR25->setVisibility();
        $this->E214->setVisibility();
        $this->E215->setVisibility();
        $this->E216->setVisibility();
        $this->E217->setVisibility();
        $this->E218->setVisibility();
        $this->E219->setVisibility();
        $this->E220->setVisibility();
        $this->E221->setVisibility();
        $this->E222->setVisibility();
        $this->E223->setVisibility();
        $this->E224->setVisibility();
        $this->E225->setVisibility();
        $this->EEETTTDTE->setVisibility();
        $this->bhcgdate->setVisibility();
        $this->TUBAL_PATENCY->setVisibility();
        $this->HSG->setVisibility();
        $this->DHL->setVisibility();
        $this->UTERINE_PROBLEMS->setVisibility();
        $this->W_COMORBIDS->setVisibility();
        $this->H_COMORBIDS->setVisibility();
        $this->SEXUAL_DYSFUNCTION->setVisibility();
        $this->TABLETS->setVisibility();
        $this->FOLLICLE_STATUS->setVisibility();
        $this->NUMBER_OF_IUI->setVisibility();
        $this->PROCEDURE->setVisibility();
        $this->LUTEAL_SUPPORT->setVisibility();
        $this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
        $this->ONGOING_PREG->setVisibility();
        $this->EDD_Date->setVisibility();
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
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $postBack = true;
        } else {
            // Load key values from QueryString
            $this->CopyRecord = true;
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->setKey("id", $this->id->CurrentValue); // Set up key
            } else {
                $this->setKey("id", ""); // Clear key
                $this->CopyRecord = false;
            }
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("IvfStimulationChartList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "IvfStimulationChartList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfStimulationChartView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->RIDNo->CurrentValue = null;
        $this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->ARTCycle->CurrentValue = null;
        $this->ARTCycle->OldValue = $this->ARTCycle->CurrentValue;
        $this->FemaleFactor->CurrentValue = null;
        $this->FemaleFactor->OldValue = $this->FemaleFactor->CurrentValue;
        $this->MaleFactor->CurrentValue = null;
        $this->MaleFactor->OldValue = $this->MaleFactor->CurrentValue;
        $this->Protocol->CurrentValue = null;
        $this->Protocol->OldValue = $this->Protocol->CurrentValue;
        $this->SemenFrozen->CurrentValue = null;
        $this->SemenFrozen->OldValue = $this->SemenFrozen->CurrentValue;
        $this->A4ICSICycle->CurrentValue = null;
        $this->A4ICSICycle->OldValue = $this->A4ICSICycle->CurrentValue;
        $this->TotalICSICycle->CurrentValue = null;
        $this->TotalICSICycle->OldValue = $this->TotalICSICycle->CurrentValue;
        $this->TypeOfInfertility->CurrentValue = null;
        $this->TypeOfInfertility->OldValue = $this->TypeOfInfertility->CurrentValue;
        $this->Duration->CurrentValue = null;
        $this->Duration->OldValue = $this->Duration->CurrentValue;
        $this->LMP->CurrentValue = null;
        $this->LMP->OldValue = $this->LMP->CurrentValue;
        $this->RelevantHistory->CurrentValue = null;
        $this->RelevantHistory->OldValue = $this->RelevantHistory->CurrentValue;
        $this->IUICycles->CurrentValue = null;
        $this->IUICycles->OldValue = $this->IUICycles->CurrentValue;
        $this->AFC->CurrentValue = null;
        $this->AFC->OldValue = $this->AFC->CurrentValue;
        $this->AMH->CurrentValue = null;
        $this->AMH->OldValue = $this->AMH->CurrentValue;
        $this->FBMI->CurrentValue = null;
        $this->FBMI->OldValue = $this->FBMI->CurrentValue;
        $this->MBMI->CurrentValue = null;
        $this->MBMI->OldValue = $this->MBMI->CurrentValue;
        $this->OvarianVolumeRT->CurrentValue = null;
        $this->OvarianVolumeRT->OldValue = $this->OvarianVolumeRT->CurrentValue;
        $this->OvarianVolumeLT->CurrentValue = null;
        $this->OvarianVolumeLT->OldValue = $this->OvarianVolumeLT->CurrentValue;
        $this->DAYSOFSTIMULATION->CurrentValue = null;
        $this->DAYSOFSTIMULATION->OldValue = $this->DAYSOFSTIMULATION->CurrentValue;
        $this->DOSEOFGONADOTROPINS->CurrentValue = null;
        $this->DOSEOFGONADOTROPINS->OldValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
        $this->INJTYPE->CurrentValue = null;
        $this->INJTYPE->OldValue = $this->INJTYPE->CurrentValue;
        $this->ANTAGONISTDAYS->CurrentValue = null;
        $this->ANTAGONISTDAYS->OldValue = $this->ANTAGONISTDAYS->CurrentValue;
        $this->ANTAGONISTSTARTDAY->CurrentValue = null;
        $this->ANTAGONISTSTARTDAY->OldValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
        $this->GROWTHHORMONE->CurrentValue = null;
        $this->GROWTHHORMONE->OldValue = $this->GROWTHHORMONE->CurrentValue;
        $this->PRETREATMENT->CurrentValue = null;
        $this->PRETREATMENT->OldValue = $this->PRETREATMENT->CurrentValue;
        $this->SerumP4->CurrentValue = null;
        $this->SerumP4->OldValue = $this->SerumP4->CurrentValue;
        $this->FORT->CurrentValue = null;
        $this->FORT->OldValue = $this->FORT->CurrentValue;
        $this->MedicalFactors->CurrentValue = null;
        $this->MedicalFactors->OldValue = $this->MedicalFactors->CurrentValue;
        $this->SCDate->CurrentValue = null;
        $this->SCDate->OldValue = $this->SCDate->CurrentValue;
        $this->OvarianSurgery->CurrentValue = null;
        $this->OvarianSurgery->OldValue = $this->OvarianSurgery->CurrentValue;
        $this->PreProcedureOrder->CurrentValue = null;
        $this->PreProcedureOrder->OldValue = $this->PreProcedureOrder->CurrentValue;
        $this->TRIGGERR->CurrentValue = null;
        $this->TRIGGERR->OldValue = $this->TRIGGERR->CurrentValue;
        $this->TRIGGERDATE->CurrentValue = null;
        $this->TRIGGERDATE->OldValue = $this->TRIGGERDATE->CurrentValue;
        $this->ATHOMEorCLINIC->CurrentValue = null;
        $this->ATHOMEorCLINIC->OldValue = $this->ATHOMEorCLINIC->CurrentValue;
        $this->OPUDATE->CurrentValue = null;
        $this->OPUDATE->OldValue = $this->OPUDATE->CurrentValue;
        $this->ALLFREEZEINDICATION->CurrentValue = null;
        $this->ALLFREEZEINDICATION->OldValue = $this->ALLFREEZEINDICATION->CurrentValue;
        $this->ERA->CurrentValue = null;
        $this->ERA->OldValue = $this->ERA->CurrentValue;
        $this->PGTA->CurrentValue = null;
        $this->PGTA->OldValue = $this->PGTA->CurrentValue;
        $this->PGD->CurrentValue = null;
        $this->PGD->OldValue = $this->PGD->CurrentValue;
        $this->DATEOFET->CurrentValue = null;
        $this->DATEOFET->OldValue = $this->DATEOFET->CurrentValue;
        $this->ET->CurrentValue = null;
        $this->ET->OldValue = $this->ET->CurrentValue;
        $this->ESET->CurrentValue = null;
        $this->ESET->OldValue = $this->ESET->CurrentValue;
        $this->DOET->CurrentValue = null;
        $this->DOET->OldValue = $this->DOET->CurrentValue;
        $this->SEMENPREPARATION->CurrentValue = null;
        $this->SEMENPREPARATION->OldValue = $this->SEMENPREPARATION->CurrentValue;
        $this->REASONFORESET->CurrentValue = null;
        $this->REASONFORESET->OldValue = $this->REASONFORESET->CurrentValue;
        $this->Expectedoocytes->CurrentValue = null;
        $this->Expectedoocytes->OldValue = $this->Expectedoocytes->CurrentValue;
        $this->StChDate1->CurrentValue = null;
        $this->StChDate1->OldValue = $this->StChDate1->CurrentValue;
        $this->StChDate2->CurrentValue = null;
        $this->StChDate2->OldValue = $this->StChDate2->CurrentValue;
        $this->StChDate3->CurrentValue = null;
        $this->StChDate3->OldValue = $this->StChDate3->CurrentValue;
        $this->StChDate4->CurrentValue = null;
        $this->StChDate4->OldValue = $this->StChDate4->CurrentValue;
        $this->StChDate5->CurrentValue = null;
        $this->StChDate5->OldValue = $this->StChDate5->CurrentValue;
        $this->StChDate6->CurrentValue = null;
        $this->StChDate6->OldValue = $this->StChDate6->CurrentValue;
        $this->StChDate7->CurrentValue = null;
        $this->StChDate7->OldValue = $this->StChDate7->CurrentValue;
        $this->StChDate8->CurrentValue = null;
        $this->StChDate8->OldValue = $this->StChDate8->CurrentValue;
        $this->StChDate9->CurrentValue = null;
        $this->StChDate9->OldValue = $this->StChDate9->CurrentValue;
        $this->StChDate10->CurrentValue = null;
        $this->StChDate10->OldValue = $this->StChDate10->CurrentValue;
        $this->StChDate11->CurrentValue = null;
        $this->StChDate11->OldValue = $this->StChDate11->CurrentValue;
        $this->StChDate12->CurrentValue = null;
        $this->StChDate12->OldValue = $this->StChDate12->CurrentValue;
        $this->StChDate13->CurrentValue = null;
        $this->StChDate13->OldValue = $this->StChDate13->CurrentValue;
        $this->CycleDay1->CurrentValue = null;
        $this->CycleDay1->OldValue = $this->CycleDay1->CurrentValue;
        $this->CycleDay2->CurrentValue = null;
        $this->CycleDay2->OldValue = $this->CycleDay2->CurrentValue;
        $this->CycleDay3->CurrentValue = null;
        $this->CycleDay3->OldValue = $this->CycleDay3->CurrentValue;
        $this->CycleDay4->CurrentValue = null;
        $this->CycleDay4->OldValue = $this->CycleDay4->CurrentValue;
        $this->CycleDay5->CurrentValue = null;
        $this->CycleDay5->OldValue = $this->CycleDay5->CurrentValue;
        $this->CycleDay6->CurrentValue = null;
        $this->CycleDay6->OldValue = $this->CycleDay6->CurrentValue;
        $this->CycleDay7->CurrentValue = null;
        $this->CycleDay7->OldValue = $this->CycleDay7->CurrentValue;
        $this->CycleDay8->CurrentValue = null;
        $this->CycleDay8->OldValue = $this->CycleDay8->CurrentValue;
        $this->CycleDay9->CurrentValue = null;
        $this->CycleDay9->OldValue = $this->CycleDay9->CurrentValue;
        $this->CycleDay10->CurrentValue = null;
        $this->CycleDay10->OldValue = $this->CycleDay10->CurrentValue;
        $this->CycleDay11->CurrentValue = null;
        $this->CycleDay11->OldValue = $this->CycleDay11->CurrentValue;
        $this->CycleDay12->CurrentValue = null;
        $this->CycleDay12->OldValue = $this->CycleDay12->CurrentValue;
        $this->CycleDay13->CurrentValue = null;
        $this->CycleDay13->OldValue = $this->CycleDay13->CurrentValue;
        $this->StimulationDay1->CurrentValue = null;
        $this->StimulationDay1->OldValue = $this->StimulationDay1->CurrentValue;
        $this->StimulationDay2->CurrentValue = null;
        $this->StimulationDay2->OldValue = $this->StimulationDay2->CurrentValue;
        $this->StimulationDay3->CurrentValue = null;
        $this->StimulationDay3->OldValue = $this->StimulationDay3->CurrentValue;
        $this->StimulationDay4->CurrentValue = null;
        $this->StimulationDay4->OldValue = $this->StimulationDay4->CurrentValue;
        $this->StimulationDay5->CurrentValue = null;
        $this->StimulationDay5->OldValue = $this->StimulationDay5->CurrentValue;
        $this->StimulationDay6->CurrentValue = null;
        $this->StimulationDay6->OldValue = $this->StimulationDay6->CurrentValue;
        $this->StimulationDay7->CurrentValue = null;
        $this->StimulationDay7->OldValue = $this->StimulationDay7->CurrentValue;
        $this->StimulationDay8->CurrentValue = null;
        $this->StimulationDay8->OldValue = $this->StimulationDay8->CurrentValue;
        $this->StimulationDay9->CurrentValue = null;
        $this->StimulationDay9->OldValue = $this->StimulationDay9->CurrentValue;
        $this->StimulationDay10->CurrentValue = null;
        $this->StimulationDay10->OldValue = $this->StimulationDay10->CurrentValue;
        $this->StimulationDay11->CurrentValue = null;
        $this->StimulationDay11->OldValue = $this->StimulationDay11->CurrentValue;
        $this->StimulationDay12->CurrentValue = null;
        $this->StimulationDay12->OldValue = $this->StimulationDay12->CurrentValue;
        $this->StimulationDay13->CurrentValue = null;
        $this->StimulationDay13->OldValue = $this->StimulationDay13->CurrentValue;
        $this->Tablet1->CurrentValue = null;
        $this->Tablet1->OldValue = $this->Tablet1->CurrentValue;
        $this->Tablet2->CurrentValue = null;
        $this->Tablet2->OldValue = $this->Tablet2->CurrentValue;
        $this->Tablet3->CurrentValue = null;
        $this->Tablet3->OldValue = $this->Tablet3->CurrentValue;
        $this->Tablet4->CurrentValue = null;
        $this->Tablet4->OldValue = $this->Tablet4->CurrentValue;
        $this->Tablet5->CurrentValue = null;
        $this->Tablet5->OldValue = $this->Tablet5->CurrentValue;
        $this->Tablet6->CurrentValue = null;
        $this->Tablet6->OldValue = $this->Tablet6->CurrentValue;
        $this->Tablet7->CurrentValue = null;
        $this->Tablet7->OldValue = $this->Tablet7->CurrentValue;
        $this->Tablet8->CurrentValue = null;
        $this->Tablet8->OldValue = $this->Tablet8->CurrentValue;
        $this->Tablet9->CurrentValue = null;
        $this->Tablet9->OldValue = $this->Tablet9->CurrentValue;
        $this->Tablet10->CurrentValue = null;
        $this->Tablet10->OldValue = $this->Tablet10->CurrentValue;
        $this->Tablet11->CurrentValue = null;
        $this->Tablet11->OldValue = $this->Tablet11->CurrentValue;
        $this->Tablet12->CurrentValue = null;
        $this->Tablet12->OldValue = $this->Tablet12->CurrentValue;
        $this->Tablet13->CurrentValue = null;
        $this->Tablet13->OldValue = $this->Tablet13->CurrentValue;
        $this->RFSH1->CurrentValue = null;
        $this->RFSH1->OldValue = $this->RFSH1->CurrentValue;
        $this->RFSH2->CurrentValue = null;
        $this->RFSH2->OldValue = $this->RFSH2->CurrentValue;
        $this->RFSH3->CurrentValue = null;
        $this->RFSH3->OldValue = $this->RFSH3->CurrentValue;
        $this->RFSH4->CurrentValue = null;
        $this->RFSH4->OldValue = $this->RFSH4->CurrentValue;
        $this->RFSH5->CurrentValue = null;
        $this->RFSH5->OldValue = $this->RFSH5->CurrentValue;
        $this->RFSH6->CurrentValue = null;
        $this->RFSH6->OldValue = $this->RFSH6->CurrentValue;
        $this->RFSH7->CurrentValue = null;
        $this->RFSH7->OldValue = $this->RFSH7->CurrentValue;
        $this->RFSH8->CurrentValue = null;
        $this->RFSH8->OldValue = $this->RFSH8->CurrentValue;
        $this->RFSH9->CurrentValue = null;
        $this->RFSH9->OldValue = $this->RFSH9->CurrentValue;
        $this->RFSH10->CurrentValue = null;
        $this->RFSH10->OldValue = $this->RFSH10->CurrentValue;
        $this->RFSH11->CurrentValue = null;
        $this->RFSH11->OldValue = $this->RFSH11->CurrentValue;
        $this->RFSH12->CurrentValue = null;
        $this->RFSH12->OldValue = $this->RFSH12->CurrentValue;
        $this->RFSH13->CurrentValue = null;
        $this->RFSH13->OldValue = $this->RFSH13->CurrentValue;
        $this->HMG1->CurrentValue = null;
        $this->HMG1->OldValue = $this->HMG1->CurrentValue;
        $this->HMG2->CurrentValue = null;
        $this->HMG2->OldValue = $this->HMG2->CurrentValue;
        $this->HMG3->CurrentValue = null;
        $this->HMG3->OldValue = $this->HMG3->CurrentValue;
        $this->HMG4->CurrentValue = null;
        $this->HMG4->OldValue = $this->HMG4->CurrentValue;
        $this->HMG5->CurrentValue = null;
        $this->HMG5->OldValue = $this->HMG5->CurrentValue;
        $this->HMG6->CurrentValue = null;
        $this->HMG6->OldValue = $this->HMG6->CurrentValue;
        $this->HMG7->CurrentValue = null;
        $this->HMG7->OldValue = $this->HMG7->CurrentValue;
        $this->HMG8->CurrentValue = null;
        $this->HMG8->OldValue = $this->HMG8->CurrentValue;
        $this->HMG9->CurrentValue = null;
        $this->HMG9->OldValue = $this->HMG9->CurrentValue;
        $this->HMG10->CurrentValue = null;
        $this->HMG10->OldValue = $this->HMG10->CurrentValue;
        $this->HMG11->CurrentValue = null;
        $this->HMG11->OldValue = $this->HMG11->CurrentValue;
        $this->HMG12->CurrentValue = null;
        $this->HMG12->OldValue = $this->HMG12->CurrentValue;
        $this->HMG13->CurrentValue = null;
        $this->HMG13->OldValue = $this->HMG13->CurrentValue;
        $this->GnRH1->CurrentValue = null;
        $this->GnRH1->OldValue = $this->GnRH1->CurrentValue;
        $this->GnRH2->CurrentValue = null;
        $this->GnRH2->OldValue = $this->GnRH2->CurrentValue;
        $this->GnRH3->CurrentValue = null;
        $this->GnRH3->OldValue = $this->GnRH3->CurrentValue;
        $this->GnRH4->CurrentValue = null;
        $this->GnRH4->OldValue = $this->GnRH4->CurrentValue;
        $this->GnRH5->CurrentValue = null;
        $this->GnRH5->OldValue = $this->GnRH5->CurrentValue;
        $this->GnRH6->CurrentValue = null;
        $this->GnRH6->OldValue = $this->GnRH6->CurrentValue;
        $this->GnRH7->CurrentValue = null;
        $this->GnRH7->OldValue = $this->GnRH7->CurrentValue;
        $this->GnRH8->CurrentValue = null;
        $this->GnRH8->OldValue = $this->GnRH8->CurrentValue;
        $this->GnRH9->CurrentValue = null;
        $this->GnRH9->OldValue = $this->GnRH9->CurrentValue;
        $this->GnRH10->CurrentValue = null;
        $this->GnRH10->OldValue = $this->GnRH10->CurrentValue;
        $this->GnRH11->CurrentValue = null;
        $this->GnRH11->OldValue = $this->GnRH11->CurrentValue;
        $this->GnRH12->CurrentValue = null;
        $this->GnRH12->OldValue = $this->GnRH12->CurrentValue;
        $this->GnRH13->CurrentValue = null;
        $this->GnRH13->OldValue = $this->GnRH13->CurrentValue;
        $this->E21->CurrentValue = null;
        $this->E21->OldValue = $this->E21->CurrentValue;
        $this->E22->CurrentValue = null;
        $this->E22->OldValue = $this->E22->CurrentValue;
        $this->E23->CurrentValue = null;
        $this->E23->OldValue = $this->E23->CurrentValue;
        $this->E24->CurrentValue = null;
        $this->E24->OldValue = $this->E24->CurrentValue;
        $this->E25->CurrentValue = null;
        $this->E25->OldValue = $this->E25->CurrentValue;
        $this->E26->CurrentValue = null;
        $this->E26->OldValue = $this->E26->CurrentValue;
        $this->E27->CurrentValue = null;
        $this->E27->OldValue = $this->E27->CurrentValue;
        $this->E28->CurrentValue = null;
        $this->E28->OldValue = $this->E28->CurrentValue;
        $this->E29->CurrentValue = null;
        $this->E29->OldValue = $this->E29->CurrentValue;
        $this->E210->CurrentValue = null;
        $this->E210->OldValue = $this->E210->CurrentValue;
        $this->E211->CurrentValue = null;
        $this->E211->OldValue = $this->E211->CurrentValue;
        $this->E212->CurrentValue = null;
        $this->E212->OldValue = $this->E212->CurrentValue;
        $this->E213->CurrentValue = null;
        $this->E213->OldValue = $this->E213->CurrentValue;
        $this->P41->CurrentValue = null;
        $this->P41->OldValue = $this->P41->CurrentValue;
        $this->P42->CurrentValue = null;
        $this->P42->OldValue = $this->P42->CurrentValue;
        $this->P43->CurrentValue = null;
        $this->P43->OldValue = $this->P43->CurrentValue;
        $this->P44->CurrentValue = null;
        $this->P44->OldValue = $this->P44->CurrentValue;
        $this->P45->CurrentValue = null;
        $this->P45->OldValue = $this->P45->CurrentValue;
        $this->P46->CurrentValue = null;
        $this->P46->OldValue = $this->P46->CurrentValue;
        $this->P47->CurrentValue = null;
        $this->P47->OldValue = $this->P47->CurrentValue;
        $this->P48->CurrentValue = null;
        $this->P48->OldValue = $this->P48->CurrentValue;
        $this->P49->CurrentValue = null;
        $this->P49->OldValue = $this->P49->CurrentValue;
        $this->P410->CurrentValue = null;
        $this->P410->OldValue = $this->P410->CurrentValue;
        $this->P411->CurrentValue = null;
        $this->P411->OldValue = $this->P411->CurrentValue;
        $this->P412->CurrentValue = null;
        $this->P412->OldValue = $this->P412->CurrentValue;
        $this->P413->CurrentValue = null;
        $this->P413->OldValue = $this->P413->CurrentValue;
        $this->USGRt1->CurrentValue = null;
        $this->USGRt1->OldValue = $this->USGRt1->CurrentValue;
        $this->USGRt2->CurrentValue = null;
        $this->USGRt2->OldValue = $this->USGRt2->CurrentValue;
        $this->USGRt3->CurrentValue = null;
        $this->USGRt3->OldValue = $this->USGRt3->CurrentValue;
        $this->USGRt4->CurrentValue = null;
        $this->USGRt4->OldValue = $this->USGRt4->CurrentValue;
        $this->USGRt5->CurrentValue = null;
        $this->USGRt5->OldValue = $this->USGRt5->CurrentValue;
        $this->USGRt6->CurrentValue = null;
        $this->USGRt6->OldValue = $this->USGRt6->CurrentValue;
        $this->USGRt7->CurrentValue = null;
        $this->USGRt7->OldValue = $this->USGRt7->CurrentValue;
        $this->USGRt8->CurrentValue = null;
        $this->USGRt8->OldValue = $this->USGRt8->CurrentValue;
        $this->USGRt9->CurrentValue = null;
        $this->USGRt9->OldValue = $this->USGRt9->CurrentValue;
        $this->USGRt10->CurrentValue = null;
        $this->USGRt10->OldValue = $this->USGRt10->CurrentValue;
        $this->USGRt11->CurrentValue = null;
        $this->USGRt11->OldValue = $this->USGRt11->CurrentValue;
        $this->USGRt12->CurrentValue = null;
        $this->USGRt12->OldValue = $this->USGRt12->CurrentValue;
        $this->USGRt13->CurrentValue = null;
        $this->USGRt13->OldValue = $this->USGRt13->CurrentValue;
        $this->USGLt1->CurrentValue = null;
        $this->USGLt1->OldValue = $this->USGLt1->CurrentValue;
        $this->USGLt2->CurrentValue = null;
        $this->USGLt2->OldValue = $this->USGLt2->CurrentValue;
        $this->USGLt3->CurrentValue = null;
        $this->USGLt3->OldValue = $this->USGLt3->CurrentValue;
        $this->USGLt4->CurrentValue = null;
        $this->USGLt4->OldValue = $this->USGLt4->CurrentValue;
        $this->USGLt5->CurrentValue = null;
        $this->USGLt5->OldValue = $this->USGLt5->CurrentValue;
        $this->USGLt6->CurrentValue = null;
        $this->USGLt6->OldValue = $this->USGLt6->CurrentValue;
        $this->USGLt7->CurrentValue = null;
        $this->USGLt7->OldValue = $this->USGLt7->CurrentValue;
        $this->USGLt8->CurrentValue = null;
        $this->USGLt8->OldValue = $this->USGLt8->CurrentValue;
        $this->USGLt9->CurrentValue = null;
        $this->USGLt9->OldValue = $this->USGLt9->CurrentValue;
        $this->USGLt10->CurrentValue = null;
        $this->USGLt10->OldValue = $this->USGLt10->CurrentValue;
        $this->USGLt11->CurrentValue = null;
        $this->USGLt11->OldValue = $this->USGLt11->CurrentValue;
        $this->USGLt12->CurrentValue = null;
        $this->USGLt12->OldValue = $this->USGLt12->CurrentValue;
        $this->USGLt13->CurrentValue = null;
        $this->USGLt13->OldValue = $this->USGLt13->CurrentValue;
        $this->EM1->CurrentValue = null;
        $this->EM1->OldValue = $this->EM1->CurrentValue;
        $this->EM2->CurrentValue = null;
        $this->EM2->OldValue = $this->EM2->CurrentValue;
        $this->EM3->CurrentValue = null;
        $this->EM3->OldValue = $this->EM3->CurrentValue;
        $this->EM4->CurrentValue = null;
        $this->EM4->OldValue = $this->EM4->CurrentValue;
        $this->EM5->CurrentValue = null;
        $this->EM5->OldValue = $this->EM5->CurrentValue;
        $this->EM6->CurrentValue = null;
        $this->EM6->OldValue = $this->EM6->CurrentValue;
        $this->EM7->CurrentValue = null;
        $this->EM7->OldValue = $this->EM7->CurrentValue;
        $this->EM8->CurrentValue = null;
        $this->EM8->OldValue = $this->EM8->CurrentValue;
        $this->EM9->CurrentValue = null;
        $this->EM9->OldValue = $this->EM9->CurrentValue;
        $this->EM10->CurrentValue = null;
        $this->EM10->OldValue = $this->EM10->CurrentValue;
        $this->EM11->CurrentValue = null;
        $this->EM11->OldValue = $this->EM11->CurrentValue;
        $this->EM12->CurrentValue = null;
        $this->EM12->OldValue = $this->EM12->CurrentValue;
        $this->EM13->CurrentValue = null;
        $this->EM13->OldValue = $this->EM13->CurrentValue;
        $this->Others1->CurrentValue = null;
        $this->Others1->OldValue = $this->Others1->CurrentValue;
        $this->Others2->CurrentValue = null;
        $this->Others2->OldValue = $this->Others2->CurrentValue;
        $this->Others3->CurrentValue = null;
        $this->Others3->OldValue = $this->Others3->CurrentValue;
        $this->Others4->CurrentValue = null;
        $this->Others4->OldValue = $this->Others4->CurrentValue;
        $this->Others5->CurrentValue = null;
        $this->Others5->OldValue = $this->Others5->CurrentValue;
        $this->Others6->CurrentValue = null;
        $this->Others6->OldValue = $this->Others6->CurrentValue;
        $this->Others7->CurrentValue = null;
        $this->Others7->OldValue = $this->Others7->CurrentValue;
        $this->Others8->CurrentValue = null;
        $this->Others8->OldValue = $this->Others8->CurrentValue;
        $this->Others9->CurrentValue = null;
        $this->Others9->OldValue = $this->Others9->CurrentValue;
        $this->Others10->CurrentValue = null;
        $this->Others10->OldValue = $this->Others10->CurrentValue;
        $this->Others11->CurrentValue = null;
        $this->Others11->OldValue = $this->Others11->CurrentValue;
        $this->Others12->CurrentValue = null;
        $this->Others12->OldValue = $this->Others12->CurrentValue;
        $this->Others13->CurrentValue = null;
        $this->Others13->OldValue = $this->Others13->CurrentValue;
        $this->DR1->CurrentValue = null;
        $this->DR1->OldValue = $this->DR1->CurrentValue;
        $this->DR2->CurrentValue = null;
        $this->DR2->OldValue = $this->DR2->CurrentValue;
        $this->DR3->CurrentValue = null;
        $this->DR3->OldValue = $this->DR3->CurrentValue;
        $this->DR4->CurrentValue = null;
        $this->DR4->OldValue = $this->DR4->CurrentValue;
        $this->DR5->CurrentValue = null;
        $this->DR5->OldValue = $this->DR5->CurrentValue;
        $this->DR6->CurrentValue = null;
        $this->DR6->OldValue = $this->DR6->CurrentValue;
        $this->DR7->CurrentValue = null;
        $this->DR7->OldValue = $this->DR7->CurrentValue;
        $this->DR8->CurrentValue = null;
        $this->DR8->OldValue = $this->DR8->CurrentValue;
        $this->DR9->CurrentValue = null;
        $this->DR9->OldValue = $this->DR9->CurrentValue;
        $this->DR10->CurrentValue = null;
        $this->DR10->OldValue = $this->DR10->CurrentValue;
        $this->DR11->CurrentValue = null;
        $this->DR11->OldValue = $this->DR11->CurrentValue;
        $this->DR12->CurrentValue = null;
        $this->DR12->OldValue = $this->DR12->CurrentValue;
        $this->DR13->CurrentValue = null;
        $this->DR13->OldValue = $this->DR13->CurrentValue;
        $this->DOCTORRESPONSIBLE->CurrentValue = null;
        $this->DOCTORRESPONSIBLE->OldValue = $this->DOCTORRESPONSIBLE->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->Convert->CurrentValue = null;
        $this->Convert->OldValue = $this->Convert->CurrentValue;
        $this->Consultant->CurrentValue = null;
        $this->Consultant->OldValue = $this->Consultant->CurrentValue;
        $this->InseminatinTechnique->CurrentValue = null;
        $this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
        $this->IndicationForART->CurrentValue = null;
        $this->IndicationForART->OldValue = $this->IndicationForART->CurrentValue;
        $this->Hysteroscopy->CurrentValue = null;
        $this->Hysteroscopy->OldValue = $this->Hysteroscopy->CurrentValue;
        $this->EndometrialScratching->CurrentValue = null;
        $this->EndometrialScratching->OldValue = $this->EndometrialScratching->CurrentValue;
        $this->TrialCannulation->CurrentValue = null;
        $this->TrialCannulation->OldValue = $this->TrialCannulation->CurrentValue;
        $this->CYCLETYPE->CurrentValue = null;
        $this->CYCLETYPE->OldValue = $this->CYCLETYPE->CurrentValue;
        $this->HRTCYCLE->CurrentValue = null;
        $this->HRTCYCLE->OldValue = $this->HRTCYCLE->CurrentValue;
        $this->OralEstrogenDosage->CurrentValue = null;
        $this->OralEstrogenDosage->OldValue = $this->OralEstrogenDosage->CurrentValue;
        $this->VaginalEstrogen->CurrentValue = null;
        $this->VaginalEstrogen->OldValue = $this->VaginalEstrogen->CurrentValue;
        $this->GCSF->CurrentValue = null;
        $this->GCSF->OldValue = $this->GCSF->CurrentValue;
        $this->ActivatedPRP->CurrentValue = null;
        $this->ActivatedPRP->OldValue = $this->ActivatedPRP->CurrentValue;
        $this->UCLcm->CurrentValue = null;
        $this->UCLcm->OldValue = $this->UCLcm->CurrentValue;
        $this->DATOFEMBRYOTRANSFER->CurrentValue = null;
        $this->DATOFEMBRYOTRANSFER->OldValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
        $this->DAYOFEMBRYOTRANSFER->CurrentValue = null;
        $this->DAYOFEMBRYOTRANSFER->OldValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $this->NOOFEMBRYOSTHAWED->CurrentValue = null;
        $this->NOOFEMBRYOSTHAWED->OldValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = null;
        $this->NOOFEMBRYOSTRANSFERRED->OldValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $this->DAYOFEMBRYOS->CurrentValue = null;
        $this->DAYOFEMBRYOS->OldValue = $this->DAYOFEMBRYOS->CurrentValue;
        $this->CRYOPRESERVEDEMBRYOS->CurrentValue = null;
        $this->CRYOPRESERVEDEMBRYOS->OldValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $this->ViaAdmin->CurrentValue = null;
        $this->ViaAdmin->OldValue = $this->ViaAdmin->CurrentValue;
        $this->ViaStartDateTime->CurrentValue = null;
        $this->ViaStartDateTime->OldValue = $this->ViaStartDateTime->CurrentValue;
        $this->ViaDose->CurrentValue = null;
        $this->ViaDose->OldValue = $this->ViaDose->CurrentValue;
        $this->AllFreeze->CurrentValue = null;
        $this->AllFreeze->OldValue = $this->AllFreeze->CurrentValue;
        $this->TreatmentCancel->CurrentValue = null;
        $this->TreatmentCancel->OldValue = $this->TreatmentCancel->CurrentValue;
        $this->Reason->CurrentValue = null;
        $this->Reason->OldValue = $this->Reason->CurrentValue;
        $this->ProgesteroneAdmin->CurrentValue = null;
        $this->ProgesteroneAdmin->OldValue = $this->ProgesteroneAdmin->CurrentValue;
        $this->ProgesteroneStart->CurrentValue = null;
        $this->ProgesteroneStart->OldValue = $this->ProgesteroneStart->CurrentValue;
        $this->ProgesteroneDose->CurrentValue = null;
        $this->ProgesteroneDose->OldValue = $this->ProgesteroneDose->CurrentValue;
        $this->StChDate14->CurrentValue = null;
        $this->StChDate14->OldValue = $this->StChDate14->CurrentValue;
        $this->StChDate15->CurrentValue = null;
        $this->StChDate15->OldValue = $this->StChDate15->CurrentValue;
        $this->StChDate16->CurrentValue = null;
        $this->StChDate16->OldValue = $this->StChDate16->CurrentValue;
        $this->StChDate17->CurrentValue = null;
        $this->StChDate17->OldValue = $this->StChDate17->CurrentValue;
        $this->StChDate18->CurrentValue = null;
        $this->StChDate18->OldValue = $this->StChDate18->CurrentValue;
        $this->StChDate19->CurrentValue = null;
        $this->StChDate19->OldValue = $this->StChDate19->CurrentValue;
        $this->StChDate20->CurrentValue = null;
        $this->StChDate20->OldValue = $this->StChDate20->CurrentValue;
        $this->StChDate21->CurrentValue = null;
        $this->StChDate21->OldValue = $this->StChDate21->CurrentValue;
        $this->StChDate22->CurrentValue = null;
        $this->StChDate22->OldValue = $this->StChDate22->CurrentValue;
        $this->StChDate23->CurrentValue = null;
        $this->StChDate23->OldValue = $this->StChDate23->CurrentValue;
        $this->StChDate24->CurrentValue = null;
        $this->StChDate24->OldValue = $this->StChDate24->CurrentValue;
        $this->StChDate25->CurrentValue = null;
        $this->StChDate25->OldValue = $this->StChDate25->CurrentValue;
        $this->CycleDay14->CurrentValue = null;
        $this->CycleDay14->OldValue = $this->CycleDay14->CurrentValue;
        $this->CycleDay15->CurrentValue = null;
        $this->CycleDay15->OldValue = $this->CycleDay15->CurrentValue;
        $this->CycleDay16->CurrentValue = null;
        $this->CycleDay16->OldValue = $this->CycleDay16->CurrentValue;
        $this->CycleDay17->CurrentValue = null;
        $this->CycleDay17->OldValue = $this->CycleDay17->CurrentValue;
        $this->CycleDay18->CurrentValue = null;
        $this->CycleDay18->OldValue = $this->CycleDay18->CurrentValue;
        $this->CycleDay19->CurrentValue = null;
        $this->CycleDay19->OldValue = $this->CycleDay19->CurrentValue;
        $this->CycleDay20->CurrentValue = null;
        $this->CycleDay20->OldValue = $this->CycleDay20->CurrentValue;
        $this->CycleDay21->CurrentValue = null;
        $this->CycleDay21->OldValue = $this->CycleDay21->CurrentValue;
        $this->CycleDay22->CurrentValue = null;
        $this->CycleDay22->OldValue = $this->CycleDay22->CurrentValue;
        $this->CycleDay23->CurrentValue = null;
        $this->CycleDay23->OldValue = $this->CycleDay23->CurrentValue;
        $this->CycleDay24->CurrentValue = null;
        $this->CycleDay24->OldValue = $this->CycleDay24->CurrentValue;
        $this->CycleDay25->CurrentValue = null;
        $this->CycleDay25->OldValue = $this->CycleDay25->CurrentValue;
        $this->StimulationDay14->CurrentValue = null;
        $this->StimulationDay14->OldValue = $this->StimulationDay14->CurrentValue;
        $this->StimulationDay15->CurrentValue = null;
        $this->StimulationDay15->OldValue = $this->StimulationDay15->CurrentValue;
        $this->StimulationDay16->CurrentValue = null;
        $this->StimulationDay16->OldValue = $this->StimulationDay16->CurrentValue;
        $this->StimulationDay17->CurrentValue = null;
        $this->StimulationDay17->OldValue = $this->StimulationDay17->CurrentValue;
        $this->StimulationDay18->CurrentValue = null;
        $this->StimulationDay18->OldValue = $this->StimulationDay18->CurrentValue;
        $this->StimulationDay19->CurrentValue = null;
        $this->StimulationDay19->OldValue = $this->StimulationDay19->CurrentValue;
        $this->StimulationDay20->CurrentValue = null;
        $this->StimulationDay20->OldValue = $this->StimulationDay20->CurrentValue;
        $this->StimulationDay21->CurrentValue = null;
        $this->StimulationDay21->OldValue = $this->StimulationDay21->CurrentValue;
        $this->StimulationDay22->CurrentValue = null;
        $this->StimulationDay22->OldValue = $this->StimulationDay22->CurrentValue;
        $this->StimulationDay23->CurrentValue = null;
        $this->StimulationDay23->OldValue = $this->StimulationDay23->CurrentValue;
        $this->StimulationDay24->CurrentValue = null;
        $this->StimulationDay24->OldValue = $this->StimulationDay24->CurrentValue;
        $this->StimulationDay25->CurrentValue = null;
        $this->StimulationDay25->OldValue = $this->StimulationDay25->CurrentValue;
        $this->Tablet14->CurrentValue = null;
        $this->Tablet14->OldValue = $this->Tablet14->CurrentValue;
        $this->Tablet15->CurrentValue = null;
        $this->Tablet15->OldValue = $this->Tablet15->CurrentValue;
        $this->Tablet16->CurrentValue = null;
        $this->Tablet16->OldValue = $this->Tablet16->CurrentValue;
        $this->Tablet17->CurrentValue = null;
        $this->Tablet17->OldValue = $this->Tablet17->CurrentValue;
        $this->Tablet18->CurrentValue = null;
        $this->Tablet18->OldValue = $this->Tablet18->CurrentValue;
        $this->Tablet19->CurrentValue = null;
        $this->Tablet19->OldValue = $this->Tablet19->CurrentValue;
        $this->Tablet20->CurrentValue = null;
        $this->Tablet20->OldValue = $this->Tablet20->CurrentValue;
        $this->Tablet21->CurrentValue = null;
        $this->Tablet21->OldValue = $this->Tablet21->CurrentValue;
        $this->Tablet22->CurrentValue = null;
        $this->Tablet22->OldValue = $this->Tablet22->CurrentValue;
        $this->Tablet23->CurrentValue = null;
        $this->Tablet23->OldValue = $this->Tablet23->CurrentValue;
        $this->Tablet24->CurrentValue = null;
        $this->Tablet24->OldValue = $this->Tablet24->CurrentValue;
        $this->Tablet25->CurrentValue = null;
        $this->Tablet25->OldValue = $this->Tablet25->CurrentValue;
        $this->RFSH14->CurrentValue = null;
        $this->RFSH14->OldValue = $this->RFSH14->CurrentValue;
        $this->RFSH15->CurrentValue = null;
        $this->RFSH15->OldValue = $this->RFSH15->CurrentValue;
        $this->RFSH16->CurrentValue = null;
        $this->RFSH16->OldValue = $this->RFSH16->CurrentValue;
        $this->RFSH17->CurrentValue = null;
        $this->RFSH17->OldValue = $this->RFSH17->CurrentValue;
        $this->RFSH18->CurrentValue = null;
        $this->RFSH18->OldValue = $this->RFSH18->CurrentValue;
        $this->RFSH19->CurrentValue = null;
        $this->RFSH19->OldValue = $this->RFSH19->CurrentValue;
        $this->RFSH20->CurrentValue = null;
        $this->RFSH20->OldValue = $this->RFSH20->CurrentValue;
        $this->RFSH21->CurrentValue = null;
        $this->RFSH21->OldValue = $this->RFSH21->CurrentValue;
        $this->RFSH22->CurrentValue = null;
        $this->RFSH22->OldValue = $this->RFSH22->CurrentValue;
        $this->RFSH23->CurrentValue = null;
        $this->RFSH23->OldValue = $this->RFSH23->CurrentValue;
        $this->RFSH24->CurrentValue = null;
        $this->RFSH24->OldValue = $this->RFSH24->CurrentValue;
        $this->RFSH25->CurrentValue = null;
        $this->RFSH25->OldValue = $this->RFSH25->CurrentValue;
        $this->HMG14->CurrentValue = null;
        $this->HMG14->OldValue = $this->HMG14->CurrentValue;
        $this->HMG15->CurrentValue = null;
        $this->HMG15->OldValue = $this->HMG15->CurrentValue;
        $this->HMG16->CurrentValue = null;
        $this->HMG16->OldValue = $this->HMG16->CurrentValue;
        $this->HMG17->CurrentValue = null;
        $this->HMG17->OldValue = $this->HMG17->CurrentValue;
        $this->HMG18->CurrentValue = null;
        $this->HMG18->OldValue = $this->HMG18->CurrentValue;
        $this->HMG19->CurrentValue = null;
        $this->HMG19->OldValue = $this->HMG19->CurrentValue;
        $this->HMG20->CurrentValue = null;
        $this->HMG20->OldValue = $this->HMG20->CurrentValue;
        $this->HMG21->CurrentValue = null;
        $this->HMG21->OldValue = $this->HMG21->CurrentValue;
        $this->HMG22->CurrentValue = null;
        $this->HMG22->OldValue = $this->HMG22->CurrentValue;
        $this->HMG23->CurrentValue = null;
        $this->HMG23->OldValue = $this->HMG23->CurrentValue;
        $this->HMG24->CurrentValue = null;
        $this->HMG24->OldValue = $this->HMG24->CurrentValue;
        $this->HMG25->CurrentValue = null;
        $this->HMG25->OldValue = $this->HMG25->CurrentValue;
        $this->GnRH14->CurrentValue = null;
        $this->GnRH14->OldValue = $this->GnRH14->CurrentValue;
        $this->GnRH15->CurrentValue = null;
        $this->GnRH15->OldValue = $this->GnRH15->CurrentValue;
        $this->GnRH16->CurrentValue = null;
        $this->GnRH16->OldValue = $this->GnRH16->CurrentValue;
        $this->GnRH17->CurrentValue = null;
        $this->GnRH17->OldValue = $this->GnRH17->CurrentValue;
        $this->GnRH18->CurrentValue = null;
        $this->GnRH18->OldValue = $this->GnRH18->CurrentValue;
        $this->GnRH19->CurrentValue = null;
        $this->GnRH19->OldValue = $this->GnRH19->CurrentValue;
        $this->GnRH20->CurrentValue = null;
        $this->GnRH20->OldValue = $this->GnRH20->CurrentValue;
        $this->GnRH21->CurrentValue = null;
        $this->GnRH21->OldValue = $this->GnRH21->CurrentValue;
        $this->GnRH22->CurrentValue = null;
        $this->GnRH22->OldValue = $this->GnRH22->CurrentValue;
        $this->GnRH23->CurrentValue = null;
        $this->GnRH23->OldValue = $this->GnRH23->CurrentValue;
        $this->GnRH24->CurrentValue = null;
        $this->GnRH24->OldValue = $this->GnRH24->CurrentValue;
        $this->GnRH25->CurrentValue = null;
        $this->GnRH25->OldValue = $this->GnRH25->CurrentValue;
        $this->P414->CurrentValue = null;
        $this->P414->OldValue = $this->P414->CurrentValue;
        $this->P415->CurrentValue = null;
        $this->P415->OldValue = $this->P415->CurrentValue;
        $this->P416->CurrentValue = null;
        $this->P416->OldValue = $this->P416->CurrentValue;
        $this->P417->CurrentValue = null;
        $this->P417->OldValue = $this->P417->CurrentValue;
        $this->P418->CurrentValue = null;
        $this->P418->OldValue = $this->P418->CurrentValue;
        $this->P419->CurrentValue = null;
        $this->P419->OldValue = $this->P419->CurrentValue;
        $this->P420->CurrentValue = null;
        $this->P420->OldValue = $this->P420->CurrentValue;
        $this->P421->CurrentValue = null;
        $this->P421->OldValue = $this->P421->CurrentValue;
        $this->P422->CurrentValue = null;
        $this->P422->OldValue = $this->P422->CurrentValue;
        $this->P423->CurrentValue = null;
        $this->P423->OldValue = $this->P423->CurrentValue;
        $this->P424->CurrentValue = null;
        $this->P424->OldValue = $this->P424->CurrentValue;
        $this->P425->CurrentValue = null;
        $this->P425->OldValue = $this->P425->CurrentValue;
        $this->USGRt14->CurrentValue = null;
        $this->USGRt14->OldValue = $this->USGRt14->CurrentValue;
        $this->USGRt15->CurrentValue = null;
        $this->USGRt15->OldValue = $this->USGRt15->CurrentValue;
        $this->USGRt16->CurrentValue = null;
        $this->USGRt16->OldValue = $this->USGRt16->CurrentValue;
        $this->USGRt17->CurrentValue = null;
        $this->USGRt17->OldValue = $this->USGRt17->CurrentValue;
        $this->USGRt18->CurrentValue = null;
        $this->USGRt18->OldValue = $this->USGRt18->CurrentValue;
        $this->USGRt19->CurrentValue = null;
        $this->USGRt19->OldValue = $this->USGRt19->CurrentValue;
        $this->USGRt20->CurrentValue = null;
        $this->USGRt20->OldValue = $this->USGRt20->CurrentValue;
        $this->USGRt21->CurrentValue = null;
        $this->USGRt21->OldValue = $this->USGRt21->CurrentValue;
        $this->USGRt22->CurrentValue = null;
        $this->USGRt22->OldValue = $this->USGRt22->CurrentValue;
        $this->USGRt23->CurrentValue = null;
        $this->USGRt23->OldValue = $this->USGRt23->CurrentValue;
        $this->USGRt24->CurrentValue = null;
        $this->USGRt24->OldValue = $this->USGRt24->CurrentValue;
        $this->USGRt25->CurrentValue = null;
        $this->USGRt25->OldValue = $this->USGRt25->CurrentValue;
        $this->USGLt14->CurrentValue = null;
        $this->USGLt14->OldValue = $this->USGLt14->CurrentValue;
        $this->USGLt15->CurrentValue = null;
        $this->USGLt15->OldValue = $this->USGLt15->CurrentValue;
        $this->USGLt16->CurrentValue = null;
        $this->USGLt16->OldValue = $this->USGLt16->CurrentValue;
        $this->USGLt17->CurrentValue = null;
        $this->USGLt17->OldValue = $this->USGLt17->CurrentValue;
        $this->USGLt18->CurrentValue = null;
        $this->USGLt18->OldValue = $this->USGLt18->CurrentValue;
        $this->USGLt19->CurrentValue = null;
        $this->USGLt19->OldValue = $this->USGLt19->CurrentValue;
        $this->USGLt20->CurrentValue = null;
        $this->USGLt20->OldValue = $this->USGLt20->CurrentValue;
        $this->USGLt21->CurrentValue = null;
        $this->USGLt21->OldValue = $this->USGLt21->CurrentValue;
        $this->USGLt22->CurrentValue = null;
        $this->USGLt22->OldValue = $this->USGLt22->CurrentValue;
        $this->USGLt23->CurrentValue = null;
        $this->USGLt23->OldValue = $this->USGLt23->CurrentValue;
        $this->USGLt24->CurrentValue = null;
        $this->USGLt24->OldValue = $this->USGLt24->CurrentValue;
        $this->USGLt25->CurrentValue = null;
        $this->USGLt25->OldValue = $this->USGLt25->CurrentValue;
        $this->EM14->CurrentValue = null;
        $this->EM14->OldValue = $this->EM14->CurrentValue;
        $this->EM15->CurrentValue = null;
        $this->EM15->OldValue = $this->EM15->CurrentValue;
        $this->EM16->CurrentValue = null;
        $this->EM16->OldValue = $this->EM16->CurrentValue;
        $this->EM17->CurrentValue = null;
        $this->EM17->OldValue = $this->EM17->CurrentValue;
        $this->EM18->CurrentValue = null;
        $this->EM18->OldValue = $this->EM18->CurrentValue;
        $this->EM19->CurrentValue = null;
        $this->EM19->OldValue = $this->EM19->CurrentValue;
        $this->EM20->CurrentValue = null;
        $this->EM20->OldValue = $this->EM20->CurrentValue;
        $this->EM21->CurrentValue = null;
        $this->EM21->OldValue = $this->EM21->CurrentValue;
        $this->EM22->CurrentValue = null;
        $this->EM22->OldValue = $this->EM22->CurrentValue;
        $this->EM23->CurrentValue = null;
        $this->EM23->OldValue = $this->EM23->CurrentValue;
        $this->EM24->CurrentValue = null;
        $this->EM24->OldValue = $this->EM24->CurrentValue;
        $this->EM25->CurrentValue = null;
        $this->EM25->OldValue = $this->EM25->CurrentValue;
        $this->Others14->CurrentValue = null;
        $this->Others14->OldValue = $this->Others14->CurrentValue;
        $this->Others15->CurrentValue = null;
        $this->Others15->OldValue = $this->Others15->CurrentValue;
        $this->Others16->CurrentValue = null;
        $this->Others16->OldValue = $this->Others16->CurrentValue;
        $this->Others17->CurrentValue = null;
        $this->Others17->OldValue = $this->Others17->CurrentValue;
        $this->Others18->CurrentValue = null;
        $this->Others18->OldValue = $this->Others18->CurrentValue;
        $this->Others19->CurrentValue = null;
        $this->Others19->OldValue = $this->Others19->CurrentValue;
        $this->Others20->CurrentValue = null;
        $this->Others20->OldValue = $this->Others20->CurrentValue;
        $this->Others21->CurrentValue = null;
        $this->Others21->OldValue = $this->Others21->CurrentValue;
        $this->Others22->CurrentValue = null;
        $this->Others22->OldValue = $this->Others22->CurrentValue;
        $this->Others23->CurrentValue = null;
        $this->Others23->OldValue = $this->Others23->CurrentValue;
        $this->Others24->CurrentValue = null;
        $this->Others24->OldValue = $this->Others24->CurrentValue;
        $this->Others25->CurrentValue = null;
        $this->Others25->OldValue = $this->Others25->CurrentValue;
        $this->DR14->CurrentValue = null;
        $this->DR14->OldValue = $this->DR14->CurrentValue;
        $this->DR15->CurrentValue = null;
        $this->DR15->OldValue = $this->DR15->CurrentValue;
        $this->DR16->CurrentValue = null;
        $this->DR16->OldValue = $this->DR16->CurrentValue;
        $this->DR17->CurrentValue = null;
        $this->DR17->OldValue = $this->DR17->CurrentValue;
        $this->DR18->CurrentValue = null;
        $this->DR18->OldValue = $this->DR18->CurrentValue;
        $this->DR19->CurrentValue = null;
        $this->DR19->OldValue = $this->DR19->CurrentValue;
        $this->DR20->CurrentValue = null;
        $this->DR20->OldValue = $this->DR20->CurrentValue;
        $this->DR21->CurrentValue = null;
        $this->DR21->OldValue = $this->DR21->CurrentValue;
        $this->DR22->CurrentValue = null;
        $this->DR22->OldValue = $this->DR22->CurrentValue;
        $this->DR23->CurrentValue = null;
        $this->DR23->OldValue = $this->DR23->CurrentValue;
        $this->DR24->CurrentValue = null;
        $this->DR24->OldValue = $this->DR24->CurrentValue;
        $this->DR25->CurrentValue = null;
        $this->DR25->OldValue = $this->DR25->CurrentValue;
        $this->E214->CurrentValue = null;
        $this->E214->OldValue = $this->E214->CurrentValue;
        $this->E215->CurrentValue = null;
        $this->E215->OldValue = $this->E215->CurrentValue;
        $this->E216->CurrentValue = null;
        $this->E216->OldValue = $this->E216->CurrentValue;
        $this->E217->CurrentValue = null;
        $this->E217->OldValue = $this->E217->CurrentValue;
        $this->E218->CurrentValue = null;
        $this->E218->OldValue = $this->E218->CurrentValue;
        $this->E219->CurrentValue = null;
        $this->E219->OldValue = $this->E219->CurrentValue;
        $this->E220->CurrentValue = null;
        $this->E220->OldValue = $this->E220->CurrentValue;
        $this->E221->CurrentValue = null;
        $this->E221->OldValue = $this->E221->CurrentValue;
        $this->E222->CurrentValue = null;
        $this->E222->OldValue = $this->E222->CurrentValue;
        $this->E223->CurrentValue = null;
        $this->E223->OldValue = $this->E223->CurrentValue;
        $this->E224->CurrentValue = null;
        $this->E224->OldValue = $this->E224->CurrentValue;
        $this->E225->CurrentValue = null;
        $this->E225->OldValue = $this->E225->CurrentValue;
        $this->EEETTTDTE->CurrentValue = null;
        $this->EEETTTDTE->OldValue = $this->EEETTTDTE->CurrentValue;
        $this->bhcgdate->CurrentValue = null;
        $this->bhcgdate->OldValue = $this->bhcgdate->CurrentValue;
        $this->TUBAL_PATENCY->CurrentValue = null;
        $this->TUBAL_PATENCY->OldValue = $this->TUBAL_PATENCY->CurrentValue;
        $this->HSG->CurrentValue = null;
        $this->HSG->OldValue = $this->HSG->CurrentValue;
        $this->DHL->CurrentValue = null;
        $this->DHL->OldValue = $this->DHL->CurrentValue;
        $this->UTERINE_PROBLEMS->CurrentValue = null;
        $this->UTERINE_PROBLEMS->OldValue = $this->UTERINE_PROBLEMS->CurrentValue;
        $this->W_COMORBIDS->CurrentValue = null;
        $this->W_COMORBIDS->OldValue = $this->W_COMORBIDS->CurrentValue;
        $this->H_COMORBIDS->CurrentValue = null;
        $this->H_COMORBIDS->OldValue = $this->H_COMORBIDS->CurrentValue;
        $this->SEXUAL_DYSFUNCTION->CurrentValue = null;
        $this->SEXUAL_DYSFUNCTION->OldValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
        $this->TABLETS->CurrentValue = null;
        $this->TABLETS->OldValue = $this->TABLETS->CurrentValue;
        $this->FOLLICLE_STATUS->CurrentValue = null;
        $this->FOLLICLE_STATUS->OldValue = $this->FOLLICLE_STATUS->CurrentValue;
        $this->NUMBER_OF_IUI->CurrentValue = null;
        $this->NUMBER_OF_IUI->OldValue = $this->NUMBER_OF_IUI->CurrentValue;
        $this->PROCEDURE->CurrentValue = null;
        $this->PROCEDURE->OldValue = $this->PROCEDURE->CurrentValue;
        $this->LUTEAL_SUPPORT->CurrentValue = null;
        $this->LUTEAL_SUPPORT->OldValue = $this->LUTEAL_SUPPORT->CurrentValue;
        $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue = null;
        $this->SPECIFIC_MATERNAL_PROBLEMS->OldValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
        $this->ONGOING_PREG->CurrentValue = null;
        $this->ONGOING_PREG->OldValue = $this->ONGOING_PREG->CurrentValue;
        $this->EDD_Date->CurrentValue = null;
        $this->EDD_Date->OldValue = $this->EDD_Date->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

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

        // Check field name 'ARTCycle' first before field var 'x_ARTCycle'
        $val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
        if (!$this->ARTCycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCycle->Visible = false; // Disable update for API request
            } else {
                $this->ARTCycle->setFormValue($val);
            }
        }

        // Check field name 'FemaleFactor' first before field var 'x_FemaleFactor'
        $val = $CurrentForm->hasValue("FemaleFactor") ? $CurrentForm->getValue("FemaleFactor") : $CurrentForm->getValue("x_FemaleFactor");
        if (!$this->FemaleFactor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FemaleFactor->Visible = false; // Disable update for API request
            } else {
                $this->FemaleFactor->setFormValue($val);
            }
        }

        // Check field name 'MaleFactor' first before field var 'x_MaleFactor'
        $val = $CurrentForm->hasValue("MaleFactor") ? $CurrentForm->getValue("MaleFactor") : $CurrentForm->getValue("x_MaleFactor");
        if (!$this->MaleFactor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaleFactor->Visible = false; // Disable update for API request
            } else {
                $this->MaleFactor->setFormValue($val);
            }
        }

        // Check field name 'Protocol' first before field var 'x_Protocol'
        $val = $CurrentForm->hasValue("Protocol") ? $CurrentForm->getValue("Protocol") : $CurrentForm->getValue("x_Protocol");
        if (!$this->Protocol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Protocol->Visible = false; // Disable update for API request
            } else {
                $this->Protocol->setFormValue($val);
            }
        }

        // Check field name 'SemenFrozen' first before field var 'x_SemenFrozen'
        $val = $CurrentForm->hasValue("SemenFrozen") ? $CurrentForm->getValue("SemenFrozen") : $CurrentForm->getValue("x_SemenFrozen");
        if (!$this->SemenFrozen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SemenFrozen->Visible = false; // Disable update for API request
            } else {
                $this->SemenFrozen->setFormValue($val);
            }
        }

        // Check field name 'A4ICSICycle' first before field var 'x_A4ICSICycle'
        $val = $CurrentForm->hasValue("A4ICSICycle") ? $CurrentForm->getValue("A4ICSICycle") : $CurrentForm->getValue("x_A4ICSICycle");
        if (!$this->A4ICSICycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A4ICSICycle->Visible = false; // Disable update for API request
            } else {
                $this->A4ICSICycle->setFormValue($val);
            }
        }

        // Check field name 'TotalICSICycle' first before field var 'x_TotalICSICycle'
        $val = $CurrentForm->hasValue("TotalICSICycle") ? $CurrentForm->getValue("TotalICSICycle") : $CurrentForm->getValue("x_TotalICSICycle");
        if (!$this->TotalICSICycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalICSICycle->Visible = false; // Disable update for API request
            } else {
                $this->TotalICSICycle->setFormValue($val);
            }
        }

        // Check field name 'TypeOfInfertility' first before field var 'x_TypeOfInfertility'
        $val = $CurrentForm->hasValue("TypeOfInfertility") ? $CurrentForm->getValue("TypeOfInfertility") : $CurrentForm->getValue("x_TypeOfInfertility");
        if (!$this->TypeOfInfertility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeOfInfertility->Visible = false; // Disable update for API request
            } else {
                $this->TypeOfInfertility->setFormValue($val);
            }
        }

        // Check field name 'Duration' first before field var 'x_Duration'
        $val = $CurrentForm->hasValue("Duration") ? $CurrentForm->getValue("Duration") : $CurrentForm->getValue("x_Duration");
        if (!$this->Duration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Duration->Visible = false; // Disable update for API request
            } else {
                $this->Duration->setFormValue($val);
            }
        }

        // Check field name 'LMP' first before field var 'x_LMP'
        $val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
        if (!$this->LMP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LMP->Visible = false; // Disable update for API request
            } else {
                $this->LMP->setFormValue($val);
            }
            $this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
        }

        // Check field name 'RelevantHistory' first before field var 'x_RelevantHistory'
        $val = $CurrentForm->hasValue("RelevantHistory") ? $CurrentForm->getValue("RelevantHistory") : $CurrentForm->getValue("x_RelevantHistory");
        if (!$this->RelevantHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RelevantHistory->Visible = false; // Disable update for API request
            } else {
                $this->RelevantHistory->setFormValue($val);
            }
        }

        // Check field name 'IUICycles' first before field var 'x_IUICycles'
        $val = $CurrentForm->hasValue("IUICycles") ? $CurrentForm->getValue("IUICycles") : $CurrentForm->getValue("x_IUICycles");
        if (!$this->IUICycles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUICycles->Visible = false; // Disable update for API request
            } else {
                $this->IUICycles->setFormValue($val);
            }
        }

        // Check field name 'AFC' first before field var 'x_AFC'
        $val = $CurrentForm->hasValue("AFC") ? $CurrentForm->getValue("AFC") : $CurrentForm->getValue("x_AFC");
        if (!$this->AFC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AFC->Visible = false; // Disable update for API request
            } else {
                $this->AFC->setFormValue($val);
            }
        }

        // Check field name 'AMH' first before field var 'x_AMH'
        $val = $CurrentForm->hasValue("AMH") ? $CurrentForm->getValue("AMH") : $CurrentForm->getValue("x_AMH");
        if (!$this->AMH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AMH->Visible = false; // Disable update for API request
            } else {
                $this->AMH->setFormValue($val);
            }
        }

        // Check field name 'FBMI' first before field var 'x_FBMI'
        $val = $CurrentForm->hasValue("FBMI") ? $CurrentForm->getValue("FBMI") : $CurrentForm->getValue("x_FBMI");
        if (!$this->FBMI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FBMI->Visible = false; // Disable update for API request
            } else {
                $this->FBMI->setFormValue($val);
            }
        }

        // Check field name 'MBMI' first before field var 'x_MBMI'
        $val = $CurrentForm->hasValue("MBMI") ? $CurrentForm->getValue("MBMI") : $CurrentForm->getValue("x_MBMI");
        if (!$this->MBMI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MBMI->Visible = false; // Disable update for API request
            } else {
                $this->MBMI->setFormValue($val);
            }
        }

        // Check field name 'OvarianVolumeRT' first before field var 'x_OvarianVolumeRT'
        $val = $CurrentForm->hasValue("OvarianVolumeRT") ? $CurrentForm->getValue("OvarianVolumeRT") : $CurrentForm->getValue("x_OvarianVolumeRT");
        if (!$this->OvarianVolumeRT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OvarianVolumeRT->Visible = false; // Disable update for API request
            } else {
                $this->OvarianVolumeRT->setFormValue($val);
            }
        }

        // Check field name 'OvarianVolumeLT' first before field var 'x_OvarianVolumeLT'
        $val = $CurrentForm->hasValue("OvarianVolumeLT") ? $CurrentForm->getValue("OvarianVolumeLT") : $CurrentForm->getValue("x_OvarianVolumeLT");
        if (!$this->OvarianVolumeLT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OvarianVolumeLT->Visible = false; // Disable update for API request
            } else {
                $this->OvarianVolumeLT->setFormValue($val);
            }
        }

        // Check field name 'DAYSOFSTIMULATION' first before field var 'x_DAYSOFSTIMULATION'
        $val = $CurrentForm->hasValue("DAYSOFSTIMULATION") ? $CurrentForm->getValue("DAYSOFSTIMULATION") : $CurrentForm->getValue("x_DAYSOFSTIMULATION");
        if (!$this->DAYSOFSTIMULATION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYSOFSTIMULATION->Visible = false; // Disable update for API request
            } else {
                $this->DAYSOFSTIMULATION->setFormValue($val);
            }
        }

        // Check field name 'DOSEOFGONADOTROPINS' first before field var 'x_DOSEOFGONADOTROPINS'
        $val = $CurrentForm->hasValue("DOSEOFGONADOTROPINS") ? $CurrentForm->getValue("DOSEOFGONADOTROPINS") : $CurrentForm->getValue("x_DOSEOFGONADOTROPINS");
        if (!$this->DOSEOFGONADOTROPINS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DOSEOFGONADOTROPINS->Visible = false; // Disable update for API request
            } else {
                $this->DOSEOFGONADOTROPINS->setFormValue($val);
            }
        }

        // Check field name 'INJTYPE' first before field var 'x_INJTYPE'
        $val = $CurrentForm->hasValue("INJTYPE") ? $CurrentForm->getValue("INJTYPE") : $CurrentForm->getValue("x_INJTYPE");
        if (!$this->INJTYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INJTYPE->Visible = false; // Disable update for API request
            } else {
                $this->INJTYPE->setFormValue($val);
            }
        }

        // Check field name 'ANTAGONISTDAYS' first before field var 'x_ANTAGONISTDAYS'
        $val = $CurrentForm->hasValue("ANTAGONISTDAYS") ? $CurrentForm->getValue("ANTAGONISTDAYS") : $CurrentForm->getValue("x_ANTAGONISTDAYS");
        if (!$this->ANTAGONISTDAYS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANTAGONISTDAYS->Visible = false; // Disable update for API request
            } else {
                $this->ANTAGONISTDAYS->setFormValue($val);
            }
        }

        // Check field name 'ANTAGONISTSTARTDAY' first before field var 'x_ANTAGONISTSTARTDAY'
        $val = $CurrentForm->hasValue("ANTAGONISTSTARTDAY") ? $CurrentForm->getValue("ANTAGONISTSTARTDAY") : $CurrentForm->getValue("x_ANTAGONISTSTARTDAY");
        if (!$this->ANTAGONISTSTARTDAY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANTAGONISTSTARTDAY->Visible = false; // Disable update for API request
            } else {
                $this->ANTAGONISTSTARTDAY->setFormValue($val);
            }
        }

        // Check field name 'GROWTHHORMONE' first before field var 'x_GROWTHHORMONE'
        $val = $CurrentForm->hasValue("GROWTHHORMONE") ? $CurrentForm->getValue("GROWTHHORMONE") : $CurrentForm->getValue("x_GROWTHHORMONE");
        if (!$this->GROWTHHORMONE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GROWTHHORMONE->Visible = false; // Disable update for API request
            } else {
                $this->GROWTHHORMONE->setFormValue($val);
            }
        }

        // Check field name 'PRETREATMENT' first before field var 'x_PRETREATMENT'
        $val = $CurrentForm->hasValue("PRETREATMENT") ? $CurrentForm->getValue("PRETREATMENT") : $CurrentForm->getValue("x_PRETREATMENT");
        if (!$this->PRETREATMENT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRETREATMENT->Visible = false; // Disable update for API request
            } else {
                $this->PRETREATMENT->setFormValue($val);
            }
        }

        // Check field name 'SerumP4' first before field var 'x_SerumP4'
        $val = $CurrentForm->hasValue("SerumP4") ? $CurrentForm->getValue("SerumP4") : $CurrentForm->getValue("x_SerumP4");
        if (!$this->SerumP4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SerumP4->Visible = false; // Disable update for API request
            } else {
                $this->SerumP4->setFormValue($val);
            }
        }

        // Check field name 'FORT' first before field var 'x_FORT'
        $val = $CurrentForm->hasValue("FORT") ? $CurrentForm->getValue("FORT") : $CurrentForm->getValue("x_FORT");
        if (!$this->FORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FORT->Visible = false; // Disable update for API request
            } else {
                $this->FORT->setFormValue($val);
            }
        }

        // Check field name 'MedicalFactors' first before field var 'x_MedicalFactors'
        $val = $CurrentForm->hasValue("MedicalFactors") ? $CurrentForm->getValue("MedicalFactors") : $CurrentForm->getValue("x_MedicalFactors");
        if (!$this->MedicalFactors->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MedicalFactors->Visible = false; // Disable update for API request
            } else {
                $this->MedicalFactors->setFormValue($val);
            }
        }

        // Check field name 'SCDate' first before field var 'x_SCDate'
        $val = $CurrentForm->hasValue("SCDate") ? $CurrentForm->getValue("SCDate") : $CurrentForm->getValue("x_SCDate");
        if (!$this->SCDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SCDate->Visible = false; // Disable update for API request
            } else {
                $this->SCDate->setFormValue($val);
            }
            $this->SCDate->CurrentValue = UnFormatDateTime($this->SCDate->CurrentValue, 0);
        }

        // Check field name 'OvarianSurgery' first before field var 'x_OvarianSurgery'
        $val = $CurrentForm->hasValue("OvarianSurgery") ? $CurrentForm->getValue("OvarianSurgery") : $CurrentForm->getValue("x_OvarianSurgery");
        if (!$this->OvarianSurgery->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OvarianSurgery->Visible = false; // Disable update for API request
            } else {
                $this->OvarianSurgery->setFormValue($val);
            }
        }

        // Check field name 'PreProcedureOrder' first before field var 'x_PreProcedureOrder'
        $val = $CurrentForm->hasValue("PreProcedureOrder") ? $CurrentForm->getValue("PreProcedureOrder") : $CurrentForm->getValue("x_PreProcedureOrder");
        if (!$this->PreProcedureOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreProcedureOrder->Visible = false; // Disable update for API request
            } else {
                $this->PreProcedureOrder->setFormValue($val);
            }
        }

        // Check field name 'TRIGGERR' first before field var 'x_TRIGGERR'
        $val = $CurrentForm->hasValue("TRIGGERR") ? $CurrentForm->getValue("TRIGGERR") : $CurrentForm->getValue("x_TRIGGERR");
        if (!$this->TRIGGERR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TRIGGERR->Visible = false; // Disable update for API request
            } else {
                $this->TRIGGERR->setFormValue($val);
            }
        }

        // Check field name 'TRIGGERDATE' first before field var 'x_TRIGGERDATE'
        $val = $CurrentForm->hasValue("TRIGGERDATE") ? $CurrentForm->getValue("TRIGGERDATE") : $CurrentForm->getValue("x_TRIGGERDATE");
        if (!$this->TRIGGERDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TRIGGERDATE->Visible = false; // Disable update for API request
            } else {
                $this->TRIGGERDATE->setFormValue($val);
            }
            $this->TRIGGERDATE->CurrentValue = UnFormatDateTime($this->TRIGGERDATE->CurrentValue, 0);
        }

        // Check field name 'ATHOMEorCLINIC' first before field var 'x_ATHOMEorCLINIC'
        $val = $CurrentForm->hasValue("ATHOMEorCLINIC") ? $CurrentForm->getValue("ATHOMEorCLINIC") : $CurrentForm->getValue("x_ATHOMEorCLINIC");
        if (!$this->ATHOMEorCLINIC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ATHOMEorCLINIC->Visible = false; // Disable update for API request
            } else {
                $this->ATHOMEorCLINIC->setFormValue($val);
            }
        }

        // Check field name 'OPUDATE' first before field var 'x_OPUDATE'
        $val = $CurrentForm->hasValue("OPUDATE") ? $CurrentForm->getValue("OPUDATE") : $CurrentForm->getValue("x_OPUDATE");
        if (!$this->OPUDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPUDATE->Visible = false; // Disable update for API request
            } else {
                $this->OPUDATE->setFormValue($val);
            }
            $this->OPUDATE->CurrentValue = UnFormatDateTime($this->OPUDATE->CurrentValue, 0);
        }

        // Check field name 'ALLFREEZEINDICATION' first before field var 'x_ALLFREEZEINDICATION'
        $val = $CurrentForm->hasValue("ALLFREEZEINDICATION") ? $CurrentForm->getValue("ALLFREEZEINDICATION") : $CurrentForm->getValue("x_ALLFREEZEINDICATION");
        if (!$this->ALLFREEZEINDICATION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ALLFREEZEINDICATION->Visible = false; // Disable update for API request
            } else {
                $this->ALLFREEZEINDICATION->setFormValue($val);
            }
        }

        // Check field name 'ERA' first before field var 'x_ERA'
        $val = $CurrentForm->hasValue("ERA") ? $CurrentForm->getValue("ERA") : $CurrentForm->getValue("x_ERA");
        if (!$this->ERA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ERA->Visible = false; // Disable update for API request
            } else {
                $this->ERA->setFormValue($val);
            }
        }

        // Check field name 'PGTA' first before field var 'x_PGTA'
        $val = $CurrentForm->hasValue("PGTA") ? $CurrentForm->getValue("PGTA") : $CurrentForm->getValue("x_PGTA");
        if (!$this->PGTA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PGTA->Visible = false; // Disable update for API request
            } else {
                $this->PGTA->setFormValue($val);
            }
        }

        // Check field name 'PGD' first before field var 'x_PGD'
        $val = $CurrentForm->hasValue("PGD") ? $CurrentForm->getValue("PGD") : $CurrentForm->getValue("x_PGD");
        if (!$this->PGD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PGD->Visible = false; // Disable update for API request
            } else {
                $this->PGD->setFormValue($val);
            }
        }

        // Check field name 'DATEOFET' first before field var 'x_DATEOFET'
        $val = $CurrentForm->hasValue("DATEOFET") ? $CurrentForm->getValue("DATEOFET") : $CurrentForm->getValue("x_DATEOFET");
        if (!$this->DATEOFET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATEOFET->Visible = false; // Disable update for API request
            } else {
                $this->DATEOFET->setFormValue($val);
            }
            $this->DATEOFET->CurrentValue = UnFormatDateTime($this->DATEOFET->CurrentValue, 0);
        }

        // Check field name 'ET' first before field var 'x_ET'
        $val = $CurrentForm->hasValue("ET") ? $CurrentForm->getValue("ET") : $CurrentForm->getValue("x_ET");
        if (!$this->ET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ET->Visible = false; // Disable update for API request
            } else {
                $this->ET->setFormValue($val);
            }
        }

        // Check field name 'ESET' first before field var 'x_ESET'
        $val = $CurrentForm->hasValue("ESET") ? $CurrentForm->getValue("ESET") : $CurrentForm->getValue("x_ESET");
        if (!$this->ESET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ESET->Visible = false; // Disable update for API request
            } else {
                $this->ESET->setFormValue($val);
            }
        }

        // Check field name 'DOET' first before field var 'x_DOET'
        $val = $CurrentForm->hasValue("DOET") ? $CurrentForm->getValue("DOET") : $CurrentForm->getValue("x_DOET");
        if (!$this->DOET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DOET->Visible = false; // Disable update for API request
            } else {
                $this->DOET->setFormValue($val);
            }
        }

        // Check field name 'SEMENPREPARATION' first before field var 'x_SEMENPREPARATION'
        $val = $CurrentForm->hasValue("SEMENPREPARATION") ? $CurrentForm->getValue("SEMENPREPARATION") : $CurrentForm->getValue("x_SEMENPREPARATION");
        if (!$this->SEMENPREPARATION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SEMENPREPARATION->Visible = false; // Disable update for API request
            } else {
                $this->SEMENPREPARATION->setFormValue($val);
            }
        }

        // Check field name 'REASONFORESET' first before field var 'x_REASONFORESET'
        $val = $CurrentForm->hasValue("REASONFORESET") ? $CurrentForm->getValue("REASONFORESET") : $CurrentForm->getValue("x_REASONFORESET");
        if (!$this->REASONFORESET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REASONFORESET->Visible = false; // Disable update for API request
            } else {
                $this->REASONFORESET->setFormValue($val);
            }
        }

        // Check field name 'Expectedoocytes' first before field var 'x_Expectedoocytes'
        $val = $CurrentForm->hasValue("Expectedoocytes") ? $CurrentForm->getValue("Expectedoocytes") : $CurrentForm->getValue("x_Expectedoocytes");
        if (!$this->Expectedoocytes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Expectedoocytes->Visible = false; // Disable update for API request
            } else {
                $this->Expectedoocytes->setFormValue($val);
            }
        }

        // Check field name 'StChDate1' first before field var 'x_StChDate1'
        $val = $CurrentForm->hasValue("StChDate1") ? $CurrentForm->getValue("StChDate1") : $CurrentForm->getValue("x_StChDate1");
        if (!$this->StChDate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate1->Visible = false; // Disable update for API request
            } else {
                $this->StChDate1->setFormValue($val);
            }
            $this->StChDate1->CurrentValue = UnFormatDateTime($this->StChDate1->CurrentValue, 0);
        }

        // Check field name 'StChDate2' first before field var 'x_StChDate2'
        $val = $CurrentForm->hasValue("StChDate2") ? $CurrentForm->getValue("StChDate2") : $CurrentForm->getValue("x_StChDate2");
        if (!$this->StChDate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate2->Visible = false; // Disable update for API request
            } else {
                $this->StChDate2->setFormValue($val);
            }
            $this->StChDate2->CurrentValue = UnFormatDateTime($this->StChDate2->CurrentValue, 0);
        }

        // Check field name 'StChDate3' first before field var 'x_StChDate3'
        $val = $CurrentForm->hasValue("StChDate3") ? $CurrentForm->getValue("StChDate3") : $CurrentForm->getValue("x_StChDate3");
        if (!$this->StChDate3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate3->Visible = false; // Disable update for API request
            } else {
                $this->StChDate3->setFormValue($val);
            }
            $this->StChDate3->CurrentValue = UnFormatDateTime($this->StChDate3->CurrentValue, 0);
        }

        // Check field name 'StChDate4' first before field var 'x_StChDate4'
        $val = $CurrentForm->hasValue("StChDate4") ? $CurrentForm->getValue("StChDate4") : $CurrentForm->getValue("x_StChDate4");
        if (!$this->StChDate4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate4->Visible = false; // Disable update for API request
            } else {
                $this->StChDate4->setFormValue($val);
            }
            $this->StChDate4->CurrentValue = UnFormatDateTime($this->StChDate4->CurrentValue, 0);
        }

        // Check field name 'StChDate5' first before field var 'x_StChDate5'
        $val = $CurrentForm->hasValue("StChDate5") ? $CurrentForm->getValue("StChDate5") : $CurrentForm->getValue("x_StChDate5");
        if (!$this->StChDate5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate5->Visible = false; // Disable update for API request
            } else {
                $this->StChDate5->setFormValue($val);
            }
            $this->StChDate5->CurrentValue = UnFormatDateTime($this->StChDate5->CurrentValue, 0);
        }

        // Check field name 'StChDate6' first before field var 'x_StChDate6'
        $val = $CurrentForm->hasValue("StChDate6") ? $CurrentForm->getValue("StChDate6") : $CurrentForm->getValue("x_StChDate6");
        if (!$this->StChDate6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate6->Visible = false; // Disable update for API request
            } else {
                $this->StChDate6->setFormValue($val);
            }
            $this->StChDate6->CurrentValue = UnFormatDateTime($this->StChDate6->CurrentValue, 0);
        }

        // Check field name 'StChDate7' first before field var 'x_StChDate7'
        $val = $CurrentForm->hasValue("StChDate7") ? $CurrentForm->getValue("StChDate7") : $CurrentForm->getValue("x_StChDate7");
        if (!$this->StChDate7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate7->Visible = false; // Disable update for API request
            } else {
                $this->StChDate7->setFormValue($val);
            }
            $this->StChDate7->CurrentValue = UnFormatDateTime($this->StChDate7->CurrentValue, 0);
        }

        // Check field name 'StChDate8' first before field var 'x_StChDate8'
        $val = $CurrentForm->hasValue("StChDate8") ? $CurrentForm->getValue("StChDate8") : $CurrentForm->getValue("x_StChDate8");
        if (!$this->StChDate8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate8->Visible = false; // Disable update for API request
            } else {
                $this->StChDate8->setFormValue($val);
            }
            $this->StChDate8->CurrentValue = UnFormatDateTime($this->StChDate8->CurrentValue, 0);
        }

        // Check field name 'StChDate9' first before field var 'x_StChDate9'
        $val = $CurrentForm->hasValue("StChDate9") ? $CurrentForm->getValue("StChDate9") : $CurrentForm->getValue("x_StChDate9");
        if (!$this->StChDate9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate9->Visible = false; // Disable update for API request
            } else {
                $this->StChDate9->setFormValue($val);
            }
            $this->StChDate9->CurrentValue = UnFormatDateTime($this->StChDate9->CurrentValue, 0);
        }

        // Check field name 'StChDate10' first before field var 'x_StChDate10'
        $val = $CurrentForm->hasValue("StChDate10") ? $CurrentForm->getValue("StChDate10") : $CurrentForm->getValue("x_StChDate10");
        if (!$this->StChDate10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate10->Visible = false; // Disable update for API request
            } else {
                $this->StChDate10->setFormValue($val);
            }
            $this->StChDate10->CurrentValue = UnFormatDateTime($this->StChDate10->CurrentValue, 0);
        }

        // Check field name 'StChDate11' first before field var 'x_StChDate11'
        $val = $CurrentForm->hasValue("StChDate11") ? $CurrentForm->getValue("StChDate11") : $CurrentForm->getValue("x_StChDate11");
        if (!$this->StChDate11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate11->Visible = false; // Disable update for API request
            } else {
                $this->StChDate11->setFormValue($val);
            }
            $this->StChDate11->CurrentValue = UnFormatDateTime($this->StChDate11->CurrentValue, 0);
        }

        // Check field name 'StChDate12' first before field var 'x_StChDate12'
        $val = $CurrentForm->hasValue("StChDate12") ? $CurrentForm->getValue("StChDate12") : $CurrentForm->getValue("x_StChDate12");
        if (!$this->StChDate12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate12->Visible = false; // Disable update for API request
            } else {
                $this->StChDate12->setFormValue($val);
            }
            $this->StChDate12->CurrentValue = UnFormatDateTime($this->StChDate12->CurrentValue, 0);
        }

        // Check field name 'StChDate13' first before field var 'x_StChDate13'
        $val = $CurrentForm->hasValue("StChDate13") ? $CurrentForm->getValue("StChDate13") : $CurrentForm->getValue("x_StChDate13");
        if (!$this->StChDate13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate13->Visible = false; // Disable update for API request
            } else {
                $this->StChDate13->setFormValue($val);
            }
            $this->StChDate13->CurrentValue = UnFormatDateTime($this->StChDate13->CurrentValue, 0);
        }

        // Check field name 'CycleDay1' first before field var 'x_CycleDay1'
        $val = $CurrentForm->hasValue("CycleDay1") ? $CurrentForm->getValue("CycleDay1") : $CurrentForm->getValue("x_CycleDay1");
        if (!$this->CycleDay1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay1->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay1->setFormValue($val);
            }
        }

        // Check field name 'CycleDay2' first before field var 'x_CycleDay2'
        $val = $CurrentForm->hasValue("CycleDay2") ? $CurrentForm->getValue("CycleDay2") : $CurrentForm->getValue("x_CycleDay2");
        if (!$this->CycleDay2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay2->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay2->setFormValue($val);
            }
        }

        // Check field name 'CycleDay3' first before field var 'x_CycleDay3'
        $val = $CurrentForm->hasValue("CycleDay3") ? $CurrentForm->getValue("CycleDay3") : $CurrentForm->getValue("x_CycleDay3");
        if (!$this->CycleDay3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay3->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay3->setFormValue($val);
            }
        }

        // Check field name 'CycleDay4' first before field var 'x_CycleDay4'
        $val = $CurrentForm->hasValue("CycleDay4") ? $CurrentForm->getValue("CycleDay4") : $CurrentForm->getValue("x_CycleDay4");
        if (!$this->CycleDay4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay4->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay4->setFormValue($val);
            }
        }

        // Check field name 'CycleDay5' first before field var 'x_CycleDay5'
        $val = $CurrentForm->hasValue("CycleDay5") ? $CurrentForm->getValue("CycleDay5") : $CurrentForm->getValue("x_CycleDay5");
        if (!$this->CycleDay5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay5->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay5->setFormValue($val);
            }
        }

        // Check field name 'CycleDay6' first before field var 'x_CycleDay6'
        $val = $CurrentForm->hasValue("CycleDay6") ? $CurrentForm->getValue("CycleDay6") : $CurrentForm->getValue("x_CycleDay6");
        if (!$this->CycleDay6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay6->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay6->setFormValue($val);
            }
        }

        // Check field name 'CycleDay7' first before field var 'x_CycleDay7'
        $val = $CurrentForm->hasValue("CycleDay7") ? $CurrentForm->getValue("CycleDay7") : $CurrentForm->getValue("x_CycleDay7");
        if (!$this->CycleDay7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay7->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay7->setFormValue($val);
            }
        }

        // Check field name 'CycleDay8' first before field var 'x_CycleDay8'
        $val = $CurrentForm->hasValue("CycleDay8") ? $CurrentForm->getValue("CycleDay8") : $CurrentForm->getValue("x_CycleDay8");
        if (!$this->CycleDay8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay8->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay8->setFormValue($val);
            }
        }

        // Check field name 'CycleDay9' first before field var 'x_CycleDay9'
        $val = $CurrentForm->hasValue("CycleDay9") ? $CurrentForm->getValue("CycleDay9") : $CurrentForm->getValue("x_CycleDay9");
        if (!$this->CycleDay9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay9->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay9->setFormValue($val);
            }
        }

        // Check field name 'CycleDay10' first before field var 'x_CycleDay10'
        $val = $CurrentForm->hasValue("CycleDay10") ? $CurrentForm->getValue("CycleDay10") : $CurrentForm->getValue("x_CycleDay10");
        if (!$this->CycleDay10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay10->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay10->setFormValue($val);
            }
        }

        // Check field name 'CycleDay11' first before field var 'x_CycleDay11'
        $val = $CurrentForm->hasValue("CycleDay11") ? $CurrentForm->getValue("CycleDay11") : $CurrentForm->getValue("x_CycleDay11");
        if (!$this->CycleDay11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay11->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay11->setFormValue($val);
            }
        }

        // Check field name 'CycleDay12' first before field var 'x_CycleDay12'
        $val = $CurrentForm->hasValue("CycleDay12") ? $CurrentForm->getValue("CycleDay12") : $CurrentForm->getValue("x_CycleDay12");
        if (!$this->CycleDay12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay12->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay12->setFormValue($val);
            }
        }

        // Check field name 'CycleDay13' first before field var 'x_CycleDay13'
        $val = $CurrentForm->hasValue("CycleDay13") ? $CurrentForm->getValue("CycleDay13") : $CurrentForm->getValue("x_CycleDay13");
        if (!$this->CycleDay13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay13->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay13->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay1' first before field var 'x_StimulationDay1'
        $val = $CurrentForm->hasValue("StimulationDay1") ? $CurrentForm->getValue("StimulationDay1") : $CurrentForm->getValue("x_StimulationDay1");
        if (!$this->StimulationDay1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay1->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay1->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay2' first before field var 'x_StimulationDay2'
        $val = $CurrentForm->hasValue("StimulationDay2") ? $CurrentForm->getValue("StimulationDay2") : $CurrentForm->getValue("x_StimulationDay2");
        if (!$this->StimulationDay2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay2->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay2->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay3' first before field var 'x_StimulationDay3'
        $val = $CurrentForm->hasValue("StimulationDay3") ? $CurrentForm->getValue("StimulationDay3") : $CurrentForm->getValue("x_StimulationDay3");
        if (!$this->StimulationDay3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay3->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay3->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay4' first before field var 'x_StimulationDay4'
        $val = $CurrentForm->hasValue("StimulationDay4") ? $CurrentForm->getValue("StimulationDay4") : $CurrentForm->getValue("x_StimulationDay4");
        if (!$this->StimulationDay4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay4->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay4->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay5' first before field var 'x_StimulationDay5'
        $val = $CurrentForm->hasValue("StimulationDay5") ? $CurrentForm->getValue("StimulationDay5") : $CurrentForm->getValue("x_StimulationDay5");
        if (!$this->StimulationDay5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay5->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay5->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay6' first before field var 'x_StimulationDay6'
        $val = $CurrentForm->hasValue("StimulationDay6") ? $CurrentForm->getValue("StimulationDay6") : $CurrentForm->getValue("x_StimulationDay6");
        if (!$this->StimulationDay6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay6->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay6->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay7' first before field var 'x_StimulationDay7'
        $val = $CurrentForm->hasValue("StimulationDay7") ? $CurrentForm->getValue("StimulationDay7") : $CurrentForm->getValue("x_StimulationDay7");
        if (!$this->StimulationDay7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay7->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay7->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay8' first before field var 'x_StimulationDay8'
        $val = $CurrentForm->hasValue("StimulationDay8") ? $CurrentForm->getValue("StimulationDay8") : $CurrentForm->getValue("x_StimulationDay8");
        if (!$this->StimulationDay8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay8->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay8->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay9' first before field var 'x_StimulationDay9'
        $val = $CurrentForm->hasValue("StimulationDay9") ? $CurrentForm->getValue("StimulationDay9") : $CurrentForm->getValue("x_StimulationDay9");
        if (!$this->StimulationDay9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay9->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay9->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay10' first before field var 'x_StimulationDay10'
        $val = $CurrentForm->hasValue("StimulationDay10") ? $CurrentForm->getValue("StimulationDay10") : $CurrentForm->getValue("x_StimulationDay10");
        if (!$this->StimulationDay10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay10->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay10->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay11' first before field var 'x_StimulationDay11'
        $val = $CurrentForm->hasValue("StimulationDay11") ? $CurrentForm->getValue("StimulationDay11") : $CurrentForm->getValue("x_StimulationDay11");
        if (!$this->StimulationDay11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay11->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay11->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay12' first before field var 'x_StimulationDay12'
        $val = $CurrentForm->hasValue("StimulationDay12") ? $CurrentForm->getValue("StimulationDay12") : $CurrentForm->getValue("x_StimulationDay12");
        if (!$this->StimulationDay12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay12->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay12->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay13' first before field var 'x_StimulationDay13'
        $val = $CurrentForm->hasValue("StimulationDay13") ? $CurrentForm->getValue("StimulationDay13") : $CurrentForm->getValue("x_StimulationDay13");
        if (!$this->StimulationDay13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay13->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay13->setFormValue($val);
            }
        }

        // Check field name 'Tablet1' first before field var 'x_Tablet1'
        $val = $CurrentForm->hasValue("Tablet1") ? $CurrentForm->getValue("Tablet1") : $CurrentForm->getValue("x_Tablet1");
        if (!$this->Tablet1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet1->Visible = false; // Disable update for API request
            } else {
                $this->Tablet1->setFormValue($val);
            }
        }

        // Check field name 'Tablet2' first before field var 'x_Tablet2'
        $val = $CurrentForm->hasValue("Tablet2") ? $CurrentForm->getValue("Tablet2") : $CurrentForm->getValue("x_Tablet2");
        if (!$this->Tablet2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet2->Visible = false; // Disable update for API request
            } else {
                $this->Tablet2->setFormValue($val);
            }
        }

        // Check field name 'Tablet3' first before field var 'x_Tablet3'
        $val = $CurrentForm->hasValue("Tablet3") ? $CurrentForm->getValue("Tablet3") : $CurrentForm->getValue("x_Tablet3");
        if (!$this->Tablet3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet3->Visible = false; // Disable update for API request
            } else {
                $this->Tablet3->setFormValue($val);
            }
        }

        // Check field name 'Tablet4' first before field var 'x_Tablet4'
        $val = $CurrentForm->hasValue("Tablet4") ? $CurrentForm->getValue("Tablet4") : $CurrentForm->getValue("x_Tablet4");
        if (!$this->Tablet4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet4->Visible = false; // Disable update for API request
            } else {
                $this->Tablet4->setFormValue($val);
            }
        }

        // Check field name 'Tablet5' first before field var 'x_Tablet5'
        $val = $CurrentForm->hasValue("Tablet5") ? $CurrentForm->getValue("Tablet5") : $CurrentForm->getValue("x_Tablet5");
        if (!$this->Tablet5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet5->Visible = false; // Disable update for API request
            } else {
                $this->Tablet5->setFormValue($val);
            }
        }

        // Check field name 'Tablet6' first before field var 'x_Tablet6'
        $val = $CurrentForm->hasValue("Tablet6") ? $CurrentForm->getValue("Tablet6") : $CurrentForm->getValue("x_Tablet6");
        if (!$this->Tablet6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet6->Visible = false; // Disable update for API request
            } else {
                $this->Tablet6->setFormValue($val);
            }
        }

        // Check field name 'Tablet7' first before field var 'x_Tablet7'
        $val = $CurrentForm->hasValue("Tablet7") ? $CurrentForm->getValue("Tablet7") : $CurrentForm->getValue("x_Tablet7");
        if (!$this->Tablet7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet7->Visible = false; // Disable update for API request
            } else {
                $this->Tablet7->setFormValue($val);
            }
        }

        // Check field name 'Tablet8' first before field var 'x_Tablet8'
        $val = $CurrentForm->hasValue("Tablet8") ? $CurrentForm->getValue("Tablet8") : $CurrentForm->getValue("x_Tablet8");
        if (!$this->Tablet8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet8->Visible = false; // Disable update for API request
            } else {
                $this->Tablet8->setFormValue($val);
            }
        }

        // Check field name 'Tablet9' first before field var 'x_Tablet9'
        $val = $CurrentForm->hasValue("Tablet9") ? $CurrentForm->getValue("Tablet9") : $CurrentForm->getValue("x_Tablet9");
        if (!$this->Tablet9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet9->Visible = false; // Disable update for API request
            } else {
                $this->Tablet9->setFormValue($val);
            }
        }

        // Check field name 'Tablet10' first before field var 'x_Tablet10'
        $val = $CurrentForm->hasValue("Tablet10") ? $CurrentForm->getValue("Tablet10") : $CurrentForm->getValue("x_Tablet10");
        if (!$this->Tablet10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet10->Visible = false; // Disable update for API request
            } else {
                $this->Tablet10->setFormValue($val);
            }
        }

        // Check field name 'Tablet11' first before field var 'x_Tablet11'
        $val = $CurrentForm->hasValue("Tablet11") ? $CurrentForm->getValue("Tablet11") : $CurrentForm->getValue("x_Tablet11");
        if (!$this->Tablet11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet11->Visible = false; // Disable update for API request
            } else {
                $this->Tablet11->setFormValue($val);
            }
        }

        // Check field name 'Tablet12' first before field var 'x_Tablet12'
        $val = $CurrentForm->hasValue("Tablet12") ? $CurrentForm->getValue("Tablet12") : $CurrentForm->getValue("x_Tablet12");
        if (!$this->Tablet12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet12->Visible = false; // Disable update for API request
            } else {
                $this->Tablet12->setFormValue($val);
            }
        }

        // Check field name 'Tablet13' first before field var 'x_Tablet13'
        $val = $CurrentForm->hasValue("Tablet13") ? $CurrentForm->getValue("Tablet13") : $CurrentForm->getValue("x_Tablet13");
        if (!$this->Tablet13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet13->Visible = false; // Disable update for API request
            } else {
                $this->Tablet13->setFormValue($val);
            }
        }

        // Check field name 'RFSH1' first before field var 'x_RFSH1'
        $val = $CurrentForm->hasValue("RFSH1") ? $CurrentForm->getValue("RFSH1") : $CurrentForm->getValue("x_RFSH1");
        if (!$this->RFSH1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH1->Visible = false; // Disable update for API request
            } else {
                $this->RFSH1->setFormValue($val);
            }
        }

        // Check field name 'RFSH2' first before field var 'x_RFSH2'
        $val = $CurrentForm->hasValue("RFSH2") ? $CurrentForm->getValue("RFSH2") : $CurrentForm->getValue("x_RFSH2");
        if (!$this->RFSH2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH2->Visible = false; // Disable update for API request
            } else {
                $this->RFSH2->setFormValue($val);
            }
        }

        // Check field name 'RFSH3' first before field var 'x_RFSH3'
        $val = $CurrentForm->hasValue("RFSH3") ? $CurrentForm->getValue("RFSH3") : $CurrentForm->getValue("x_RFSH3");
        if (!$this->RFSH3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH3->Visible = false; // Disable update for API request
            } else {
                $this->RFSH3->setFormValue($val);
            }
        }

        // Check field name 'RFSH4' first before field var 'x_RFSH4'
        $val = $CurrentForm->hasValue("RFSH4") ? $CurrentForm->getValue("RFSH4") : $CurrentForm->getValue("x_RFSH4");
        if (!$this->RFSH4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH4->Visible = false; // Disable update for API request
            } else {
                $this->RFSH4->setFormValue($val);
            }
        }

        // Check field name 'RFSH5' first before field var 'x_RFSH5'
        $val = $CurrentForm->hasValue("RFSH5") ? $CurrentForm->getValue("RFSH5") : $CurrentForm->getValue("x_RFSH5");
        if (!$this->RFSH5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH5->Visible = false; // Disable update for API request
            } else {
                $this->RFSH5->setFormValue($val);
            }
        }

        // Check field name 'RFSH6' first before field var 'x_RFSH6'
        $val = $CurrentForm->hasValue("RFSH6") ? $CurrentForm->getValue("RFSH6") : $CurrentForm->getValue("x_RFSH6");
        if (!$this->RFSH6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH6->Visible = false; // Disable update for API request
            } else {
                $this->RFSH6->setFormValue($val);
            }
        }

        // Check field name 'RFSH7' first before field var 'x_RFSH7'
        $val = $CurrentForm->hasValue("RFSH7") ? $CurrentForm->getValue("RFSH7") : $CurrentForm->getValue("x_RFSH7");
        if (!$this->RFSH7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH7->Visible = false; // Disable update for API request
            } else {
                $this->RFSH7->setFormValue($val);
            }
        }

        // Check field name 'RFSH8' first before field var 'x_RFSH8'
        $val = $CurrentForm->hasValue("RFSH8") ? $CurrentForm->getValue("RFSH8") : $CurrentForm->getValue("x_RFSH8");
        if (!$this->RFSH8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH8->Visible = false; // Disable update for API request
            } else {
                $this->RFSH8->setFormValue($val);
            }
        }

        // Check field name 'RFSH9' first before field var 'x_RFSH9'
        $val = $CurrentForm->hasValue("RFSH9") ? $CurrentForm->getValue("RFSH9") : $CurrentForm->getValue("x_RFSH9");
        if (!$this->RFSH9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH9->Visible = false; // Disable update for API request
            } else {
                $this->RFSH9->setFormValue($val);
            }
        }

        // Check field name 'RFSH10' first before field var 'x_RFSH10'
        $val = $CurrentForm->hasValue("RFSH10") ? $CurrentForm->getValue("RFSH10") : $CurrentForm->getValue("x_RFSH10");
        if (!$this->RFSH10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH10->Visible = false; // Disable update for API request
            } else {
                $this->RFSH10->setFormValue($val);
            }
        }

        // Check field name 'RFSH11' first before field var 'x_RFSH11'
        $val = $CurrentForm->hasValue("RFSH11") ? $CurrentForm->getValue("RFSH11") : $CurrentForm->getValue("x_RFSH11");
        if (!$this->RFSH11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH11->Visible = false; // Disable update for API request
            } else {
                $this->RFSH11->setFormValue($val);
            }
        }

        // Check field name 'RFSH12' first before field var 'x_RFSH12'
        $val = $CurrentForm->hasValue("RFSH12") ? $CurrentForm->getValue("RFSH12") : $CurrentForm->getValue("x_RFSH12");
        if (!$this->RFSH12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH12->Visible = false; // Disable update for API request
            } else {
                $this->RFSH12->setFormValue($val);
            }
        }

        // Check field name 'RFSH13' first before field var 'x_RFSH13'
        $val = $CurrentForm->hasValue("RFSH13") ? $CurrentForm->getValue("RFSH13") : $CurrentForm->getValue("x_RFSH13");
        if (!$this->RFSH13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH13->Visible = false; // Disable update for API request
            } else {
                $this->RFSH13->setFormValue($val);
            }
        }

        // Check field name 'HMG1' first before field var 'x_HMG1'
        $val = $CurrentForm->hasValue("HMG1") ? $CurrentForm->getValue("HMG1") : $CurrentForm->getValue("x_HMG1");
        if (!$this->HMG1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG1->Visible = false; // Disable update for API request
            } else {
                $this->HMG1->setFormValue($val);
            }
        }

        // Check field name 'HMG2' first before field var 'x_HMG2'
        $val = $CurrentForm->hasValue("HMG2") ? $CurrentForm->getValue("HMG2") : $CurrentForm->getValue("x_HMG2");
        if (!$this->HMG2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG2->Visible = false; // Disable update for API request
            } else {
                $this->HMG2->setFormValue($val);
            }
        }

        // Check field name 'HMG3' first before field var 'x_HMG3'
        $val = $CurrentForm->hasValue("HMG3") ? $CurrentForm->getValue("HMG3") : $CurrentForm->getValue("x_HMG3");
        if (!$this->HMG3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG3->Visible = false; // Disable update for API request
            } else {
                $this->HMG3->setFormValue($val);
            }
        }

        // Check field name 'HMG4' first before field var 'x_HMG4'
        $val = $CurrentForm->hasValue("HMG4") ? $CurrentForm->getValue("HMG4") : $CurrentForm->getValue("x_HMG4");
        if (!$this->HMG4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG4->Visible = false; // Disable update for API request
            } else {
                $this->HMG4->setFormValue($val);
            }
        }

        // Check field name 'HMG5' first before field var 'x_HMG5'
        $val = $CurrentForm->hasValue("HMG5") ? $CurrentForm->getValue("HMG5") : $CurrentForm->getValue("x_HMG5");
        if (!$this->HMG5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG5->Visible = false; // Disable update for API request
            } else {
                $this->HMG5->setFormValue($val);
            }
        }

        // Check field name 'HMG6' first before field var 'x_HMG6'
        $val = $CurrentForm->hasValue("HMG6") ? $CurrentForm->getValue("HMG6") : $CurrentForm->getValue("x_HMG6");
        if (!$this->HMG6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG6->Visible = false; // Disable update for API request
            } else {
                $this->HMG6->setFormValue($val);
            }
        }

        // Check field name 'HMG7' first before field var 'x_HMG7'
        $val = $CurrentForm->hasValue("HMG7") ? $CurrentForm->getValue("HMG7") : $CurrentForm->getValue("x_HMG7");
        if (!$this->HMG7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG7->Visible = false; // Disable update for API request
            } else {
                $this->HMG7->setFormValue($val);
            }
        }

        // Check field name 'HMG8' first before field var 'x_HMG8'
        $val = $CurrentForm->hasValue("HMG8") ? $CurrentForm->getValue("HMG8") : $CurrentForm->getValue("x_HMG8");
        if (!$this->HMG8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG8->Visible = false; // Disable update for API request
            } else {
                $this->HMG8->setFormValue($val);
            }
        }

        // Check field name 'HMG9' first before field var 'x_HMG9'
        $val = $CurrentForm->hasValue("HMG9") ? $CurrentForm->getValue("HMG9") : $CurrentForm->getValue("x_HMG9");
        if (!$this->HMG9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG9->Visible = false; // Disable update for API request
            } else {
                $this->HMG9->setFormValue($val);
            }
        }

        // Check field name 'HMG10' first before field var 'x_HMG10'
        $val = $CurrentForm->hasValue("HMG10") ? $CurrentForm->getValue("HMG10") : $CurrentForm->getValue("x_HMG10");
        if (!$this->HMG10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG10->Visible = false; // Disable update for API request
            } else {
                $this->HMG10->setFormValue($val);
            }
        }

        // Check field name 'HMG11' first before field var 'x_HMG11'
        $val = $CurrentForm->hasValue("HMG11") ? $CurrentForm->getValue("HMG11") : $CurrentForm->getValue("x_HMG11");
        if (!$this->HMG11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG11->Visible = false; // Disable update for API request
            } else {
                $this->HMG11->setFormValue($val);
            }
        }

        // Check field name 'HMG12' first before field var 'x_HMG12'
        $val = $CurrentForm->hasValue("HMG12") ? $CurrentForm->getValue("HMG12") : $CurrentForm->getValue("x_HMG12");
        if (!$this->HMG12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG12->Visible = false; // Disable update for API request
            } else {
                $this->HMG12->setFormValue($val);
            }
        }

        // Check field name 'HMG13' first before field var 'x_HMG13'
        $val = $CurrentForm->hasValue("HMG13") ? $CurrentForm->getValue("HMG13") : $CurrentForm->getValue("x_HMG13");
        if (!$this->HMG13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG13->Visible = false; // Disable update for API request
            } else {
                $this->HMG13->setFormValue($val);
            }
        }

        // Check field name 'GnRH1' first before field var 'x_GnRH1'
        $val = $CurrentForm->hasValue("GnRH1") ? $CurrentForm->getValue("GnRH1") : $CurrentForm->getValue("x_GnRH1");
        if (!$this->GnRH1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH1->Visible = false; // Disable update for API request
            } else {
                $this->GnRH1->setFormValue($val);
            }
        }

        // Check field name 'GnRH2' first before field var 'x_GnRH2'
        $val = $CurrentForm->hasValue("GnRH2") ? $CurrentForm->getValue("GnRH2") : $CurrentForm->getValue("x_GnRH2");
        if (!$this->GnRH2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH2->Visible = false; // Disable update for API request
            } else {
                $this->GnRH2->setFormValue($val);
            }
        }

        // Check field name 'GnRH3' first before field var 'x_GnRH3'
        $val = $CurrentForm->hasValue("GnRH3") ? $CurrentForm->getValue("GnRH3") : $CurrentForm->getValue("x_GnRH3");
        if (!$this->GnRH3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH3->Visible = false; // Disable update for API request
            } else {
                $this->GnRH3->setFormValue($val);
            }
        }

        // Check field name 'GnRH4' first before field var 'x_GnRH4'
        $val = $CurrentForm->hasValue("GnRH4") ? $CurrentForm->getValue("GnRH4") : $CurrentForm->getValue("x_GnRH4");
        if (!$this->GnRH4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH4->Visible = false; // Disable update for API request
            } else {
                $this->GnRH4->setFormValue($val);
            }
        }

        // Check field name 'GnRH5' first before field var 'x_GnRH5'
        $val = $CurrentForm->hasValue("GnRH5") ? $CurrentForm->getValue("GnRH5") : $CurrentForm->getValue("x_GnRH5");
        if (!$this->GnRH5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH5->Visible = false; // Disable update for API request
            } else {
                $this->GnRH5->setFormValue($val);
            }
        }

        // Check field name 'GnRH6' first before field var 'x_GnRH6'
        $val = $CurrentForm->hasValue("GnRH6") ? $CurrentForm->getValue("GnRH6") : $CurrentForm->getValue("x_GnRH6");
        if (!$this->GnRH6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH6->Visible = false; // Disable update for API request
            } else {
                $this->GnRH6->setFormValue($val);
            }
        }

        // Check field name 'GnRH7' first before field var 'x_GnRH7'
        $val = $CurrentForm->hasValue("GnRH7") ? $CurrentForm->getValue("GnRH7") : $CurrentForm->getValue("x_GnRH7");
        if (!$this->GnRH7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH7->Visible = false; // Disable update for API request
            } else {
                $this->GnRH7->setFormValue($val);
            }
        }

        // Check field name 'GnRH8' first before field var 'x_GnRH8'
        $val = $CurrentForm->hasValue("GnRH8") ? $CurrentForm->getValue("GnRH8") : $CurrentForm->getValue("x_GnRH8");
        if (!$this->GnRH8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH8->Visible = false; // Disable update for API request
            } else {
                $this->GnRH8->setFormValue($val);
            }
        }

        // Check field name 'GnRH9' first before field var 'x_GnRH9'
        $val = $CurrentForm->hasValue("GnRH9") ? $CurrentForm->getValue("GnRH9") : $CurrentForm->getValue("x_GnRH9");
        if (!$this->GnRH9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH9->Visible = false; // Disable update for API request
            } else {
                $this->GnRH9->setFormValue($val);
            }
        }

        // Check field name 'GnRH10' first before field var 'x_GnRH10'
        $val = $CurrentForm->hasValue("GnRH10") ? $CurrentForm->getValue("GnRH10") : $CurrentForm->getValue("x_GnRH10");
        if (!$this->GnRH10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH10->Visible = false; // Disable update for API request
            } else {
                $this->GnRH10->setFormValue($val);
            }
        }

        // Check field name 'GnRH11' first before field var 'x_GnRH11'
        $val = $CurrentForm->hasValue("GnRH11") ? $CurrentForm->getValue("GnRH11") : $CurrentForm->getValue("x_GnRH11");
        if (!$this->GnRH11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH11->Visible = false; // Disable update for API request
            } else {
                $this->GnRH11->setFormValue($val);
            }
        }

        // Check field name 'GnRH12' first before field var 'x_GnRH12'
        $val = $CurrentForm->hasValue("GnRH12") ? $CurrentForm->getValue("GnRH12") : $CurrentForm->getValue("x_GnRH12");
        if (!$this->GnRH12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH12->Visible = false; // Disable update for API request
            } else {
                $this->GnRH12->setFormValue($val);
            }
        }

        // Check field name 'GnRH13' first before field var 'x_GnRH13'
        $val = $CurrentForm->hasValue("GnRH13") ? $CurrentForm->getValue("GnRH13") : $CurrentForm->getValue("x_GnRH13");
        if (!$this->GnRH13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH13->Visible = false; // Disable update for API request
            } else {
                $this->GnRH13->setFormValue($val);
            }
        }

        // Check field name 'E21' first before field var 'x_E21'
        $val = $CurrentForm->hasValue("E21") ? $CurrentForm->getValue("E21") : $CurrentForm->getValue("x_E21");
        if (!$this->E21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E21->Visible = false; // Disable update for API request
            } else {
                $this->E21->setFormValue($val);
            }
        }

        // Check field name 'E22' first before field var 'x_E22'
        $val = $CurrentForm->hasValue("E22") ? $CurrentForm->getValue("E22") : $CurrentForm->getValue("x_E22");
        if (!$this->E22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E22->Visible = false; // Disable update for API request
            } else {
                $this->E22->setFormValue($val);
            }
        }

        // Check field name 'E23' first before field var 'x_E23'
        $val = $CurrentForm->hasValue("E23") ? $CurrentForm->getValue("E23") : $CurrentForm->getValue("x_E23");
        if (!$this->E23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E23->Visible = false; // Disable update for API request
            } else {
                $this->E23->setFormValue($val);
            }
        }

        // Check field name 'E24' first before field var 'x_E24'
        $val = $CurrentForm->hasValue("E24") ? $CurrentForm->getValue("E24") : $CurrentForm->getValue("x_E24");
        if (!$this->E24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E24->Visible = false; // Disable update for API request
            } else {
                $this->E24->setFormValue($val);
            }
        }

        // Check field name 'E25' first before field var 'x_E25'
        $val = $CurrentForm->hasValue("E25") ? $CurrentForm->getValue("E25") : $CurrentForm->getValue("x_E25");
        if (!$this->E25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E25->Visible = false; // Disable update for API request
            } else {
                $this->E25->setFormValue($val);
            }
        }

        // Check field name 'E26' first before field var 'x_E26'
        $val = $CurrentForm->hasValue("E26") ? $CurrentForm->getValue("E26") : $CurrentForm->getValue("x_E26");
        if (!$this->E26->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E26->Visible = false; // Disable update for API request
            } else {
                $this->E26->setFormValue($val);
            }
        }

        // Check field name 'E27' first before field var 'x_E27'
        $val = $CurrentForm->hasValue("E27") ? $CurrentForm->getValue("E27") : $CurrentForm->getValue("x_E27");
        if (!$this->E27->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E27->Visible = false; // Disable update for API request
            } else {
                $this->E27->setFormValue($val);
            }
        }

        // Check field name 'E28' first before field var 'x_E28'
        $val = $CurrentForm->hasValue("E28") ? $CurrentForm->getValue("E28") : $CurrentForm->getValue("x_E28");
        if (!$this->E28->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E28->Visible = false; // Disable update for API request
            } else {
                $this->E28->setFormValue($val);
            }
        }

        // Check field name 'E29' first before field var 'x_E29'
        $val = $CurrentForm->hasValue("E29") ? $CurrentForm->getValue("E29") : $CurrentForm->getValue("x_E29");
        if (!$this->E29->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E29->Visible = false; // Disable update for API request
            } else {
                $this->E29->setFormValue($val);
            }
        }

        // Check field name 'E210' first before field var 'x_E210'
        $val = $CurrentForm->hasValue("E210") ? $CurrentForm->getValue("E210") : $CurrentForm->getValue("x_E210");
        if (!$this->E210->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E210->Visible = false; // Disable update for API request
            } else {
                $this->E210->setFormValue($val);
            }
        }

        // Check field name 'E211' first before field var 'x_E211'
        $val = $CurrentForm->hasValue("E211") ? $CurrentForm->getValue("E211") : $CurrentForm->getValue("x_E211");
        if (!$this->E211->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E211->Visible = false; // Disable update for API request
            } else {
                $this->E211->setFormValue($val);
            }
        }

        // Check field name 'E212' first before field var 'x_E212'
        $val = $CurrentForm->hasValue("E212") ? $CurrentForm->getValue("E212") : $CurrentForm->getValue("x_E212");
        if (!$this->E212->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E212->Visible = false; // Disable update for API request
            } else {
                $this->E212->setFormValue($val);
            }
        }

        // Check field name 'E213' first before field var 'x_E213'
        $val = $CurrentForm->hasValue("E213") ? $CurrentForm->getValue("E213") : $CurrentForm->getValue("x_E213");
        if (!$this->E213->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E213->Visible = false; // Disable update for API request
            } else {
                $this->E213->setFormValue($val);
            }
        }

        // Check field name 'P41' first before field var 'x_P41'
        $val = $CurrentForm->hasValue("P41") ? $CurrentForm->getValue("P41") : $CurrentForm->getValue("x_P41");
        if (!$this->P41->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P41->Visible = false; // Disable update for API request
            } else {
                $this->P41->setFormValue($val);
            }
        }

        // Check field name 'P42' first before field var 'x_P42'
        $val = $CurrentForm->hasValue("P42") ? $CurrentForm->getValue("P42") : $CurrentForm->getValue("x_P42");
        if (!$this->P42->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P42->Visible = false; // Disable update for API request
            } else {
                $this->P42->setFormValue($val);
            }
        }

        // Check field name 'P43' first before field var 'x_P43'
        $val = $CurrentForm->hasValue("P43") ? $CurrentForm->getValue("P43") : $CurrentForm->getValue("x_P43");
        if (!$this->P43->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P43->Visible = false; // Disable update for API request
            } else {
                $this->P43->setFormValue($val);
            }
        }

        // Check field name 'P44' first before field var 'x_P44'
        $val = $CurrentForm->hasValue("P44") ? $CurrentForm->getValue("P44") : $CurrentForm->getValue("x_P44");
        if (!$this->P44->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P44->Visible = false; // Disable update for API request
            } else {
                $this->P44->setFormValue($val);
            }
        }

        // Check field name 'P45' first before field var 'x_P45'
        $val = $CurrentForm->hasValue("P45") ? $CurrentForm->getValue("P45") : $CurrentForm->getValue("x_P45");
        if (!$this->P45->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P45->Visible = false; // Disable update for API request
            } else {
                $this->P45->setFormValue($val);
            }
        }

        // Check field name 'P46' first before field var 'x_P46'
        $val = $CurrentForm->hasValue("P46") ? $CurrentForm->getValue("P46") : $CurrentForm->getValue("x_P46");
        if (!$this->P46->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P46->Visible = false; // Disable update for API request
            } else {
                $this->P46->setFormValue($val);
            }
        }

        // Check field name 'P47' first before field var 'x_P47'
        $val = $CurrentForm->hasValue("P47") ? $CurrentForm->getValue("P47") : $CurrentForm->getValue("x_P47");
        if (!$this->P47->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P47->Visible = false; // Disable update for API request
            } else {
                $this->P47->setFormValue($val);
            }
        }

        // Check field name 'P48' first before field var 'x_P48'
        $val = $CurrentForm->hasValue("P48") ? $CurrentForm->getValue("P48") : $CurrentForm->getValue("x_P48");
        if (!$this->P48->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P48->Visible = false; // Disable update for API request
            } else {
                $this->P48->setFormValue($val);
            }
        }

        // Check field name 'P49' first before field var 'x_P49'
        $val = $CurrentForm->hasValue("P49") ? $CurrentForm->getValue("P49") : $CurrentForm->getValue("x_P49");
        if (!$this->P49->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P49->Visible = false; // Disable update for API request
            } else {
                $this->P49->setFormValue($val);
            }
        }

        // Check field name 'P410' first before field var 'x_P410'
        $val = $CurrentForm->hasValue("P410") ? $CurrentForm->getValue("P410") : $CurrentForm->getValue("x_P410");
        if (!$this->P410->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P410->Visible = false; // Disable update for API request
            } else {
                $this->P410->setFormValue($val);
            }
        }

        // Check field name 'P411' first before field var 'x_P411'
        $val = $CurrentForm->hasValue("P411") ? $CurrentForm->getValue("P411") : $CurrentForm->getValue("x_P411");
        if (!$this->P411->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P411->Visible = false; // Disable update for API request
            } else {
                $this->P411->setFormValue($val);
            }
        }

        // Check field name 'P412' first before field var 'x_P412'
        $val = $CurrentForm->hasValue("P412") ? $CurrentForm->getValue("P412") : $CurrentForm->getValue("x_P412");
        if (!$this->P412->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P412->Visible = false; // Disable update for API request
            } else {
                $this->P412->setFormValue($val);
            }
        }

        // Check field name 'P413' first before field var 'x_P413'
        $val = $CurrentForm->hasValue("P413") ? $CurrentForm->getValue("P413") : $CurrentForm->getValue("x_P413");
        if (!$this->P413->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P413->Visible = false; // Disable update for API request
            } else {
                $this->P413->setFormValue($val);
            }
        }

        // Check field name 'USGRt1' first before field var 'x_USGRt1'
        $val = $CurrentForm->hasValue("USGRt1") ? $CurrentForm->getValue("USGRt1") : $CurrentForm->getValue("x_USGRt1");
        if (!$this->USGRt1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt1->Visible = false; // Disable update for API request
            } else {
                $this->USGRt1->setFormValue($val);
            }
        }

        // Check field name 'USGRt2' first before field var 'x_USGRt2'
        $val = $CurrentForm->hasValue("USGRt2") ? $CurrentForm->getValue("USGRt2") : $CurrentForm->getValue("x_USGRt2");
        if (!$this->USGRt2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt2->Visible = false; // Disable update for API request
            } else {
                $this->USGRt2->setFormValue($val);
            }
        }

        // Check field name 'USGRt3' first before field var 'x_USGRt3'
        $val = $CurrentForm->hasValue("USGRt3") ? $CurrentForm->getValue("USGRt3") : $CurrentForm->getValue("x_USGRt3");
        if (!$this->USGRt3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt3->Visible = false; // Disable update for API request
            } else {
                $this->USGRt3->setFormValue($val);
            }
        }

        // Check field name 'USGRt4' first before field var 'x_USGRt4'
        $val = $CurrentForm->hasValue("USGRt4") ? $CurrentForm->getValue("USGRt4") : $CurrentForm->getValue("x_USGRt4");
        if (!$this->USGRt4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt4->Visible = false; // Disable update for API request
            } else {
                $this->USGRt4->setFormValue($val);
            }
        }

        // Check field name 'USGRt5' first before field var 'x_USGRt5'
        $val = $CurrentForm->hasValue("USGRt5") ? $CurrentForm->getValue("USGRt5") : $CurrentForm->getValue("x_USGRt5");
        if (!$this->USGRt5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt5->Visible = false; // Disable update for API request
            } else {
                $this->USGRt5->setFormValue($val);
            }
        }

        // Check field name 'USGRt6' first before field var 'x_USGRt6'
        $val = $CurrentForm->hasValue("USGRt6") ? $CurrentForm->getValue("USGRt6") : $CurrentForm->getValue("x_USGRt6");
        if (!$this->USGRt6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt6->Visible = false; // Disable update for API request
            } else {
                $this->USGRt6->setFormValue($val);
            }
        }

        // Check field name 'USGRt7' first before field var 'x_USGRt7'
        $val = $CurrentForm->hasValue("USGRt7") ? $CurrentForm->getValue("USGRt7") : $CurrentForm->getValue("x_USGRt7");
        if (!$this->USGRt7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt7->Visible = false; // Disable update for API request
            } else {
                $this->USGRt7->setFormValue($val);
            }
        }

        // Check field name 'USGRt8' first before field var 'x_USGRt8'
        $val = $CurrentForm->hasValue("USGRt8") ? $CurrentForm->getValue("USGRt8") : $CurrentForm->getValue("x_USGRt8");
        if (!$this->USGRt8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt8->Visible = false; // Disable update for API request
            } else {
                $this->USGRt8->setFormValue($val);
            }
        }

        // Check field name 'USGRt9' first before field var 'x_USGRt9'
        $val = $CurrentForm->hasValue("USGRt9") ? $CurrentForm->getValue("USGRt9") : $CurrentForm->getValue("x_USGRt9");
        if (!$this->USGRt9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt9->Visible = false; // Disable update for API request
            } else {
                $this->USGRt9->setFormValue($val);
            }
        }

        // Check field name 'USGRt10' first before field var 'x_USGRt10'
        $val = $CurrentForm->hasValue("USGRt10") ? $CurrentForm->getValue("USGRt10") : $CurrentForm->getValue("x_USGRt10");
        if (!$this->USGRt10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt10->Visible = false; // Disable update for API request
            } else {
                $this->USGRt10->setFormValue($val);
            }
        }

        // Check field name 'USGRt11' first before field var 'x_USGRt11'
        $val = $CurrentForm->hasValue("USGRt11") ? $CurrentForm->getValue("USGRt11") : $CurrentForm->getValue("x_USGRt11");
        if (!$this->USGRt11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt11->Visible = false; // Disable update for API request
            } else {
                $this->USGRt11->setFormValue($val);
            }
        }

        // Check field name 'USGRt12' first before field var 'x_USGRt12'
        $val = $CurrentForm->hasValue("USGRt12") ? $CurrentForm->getValue("USGRt12") : $CurrentForm->getValue("x_USGRt12");
        if (!$this->USGRt12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt12->Visible = false; // Disable update for API request
            } else {
                $this->USGRt12->setFormValue($val);
            }
        }

        // Check field name 'USGRt13' first before field var 'x_USGRt13'
        $val = $CurrentForm->hasValue("USGRt13") ? $CurrentForm->getValue("USGRt13") : $CurrentForm->getValue("x_USGRt13");
        if (!$this->USGRt13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt13->Visible = false; // Disable update for API request
            } else {
                $this->USGRt13->setFormValue($val);
            }
        }

        // Check field name 'USGLt1' first before field var 'x_USGLt1'
        $val = $CurrentForm->hasValue("USGLt1") ? $CurrentForm->getValue("USGLt1") : $CurrentForm->getValue("x_USGLt1");
        if (!$this->USGLt1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt1->Visible = false; // Disable update for API request
            } else {
                $this->USGLt1->setFormValue($val);
            }
        }

        // Check field name 'USGLt2' first before field var 'x_USGLt2'
        $val = $CurrentForm->hasValue("USGLt2") ? $CurrentForm->getValue("USGLt2") : $CurrentForm->getValue("x_USGLt2");
        if (!$this->USGLt2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt2->Visible = false; // Disable update for API request
            } else {
                $this->USGLt2->setFormValue($val);
            }
        }

        // Check field name 'USGLt3' first before field var 'x_USGLt3'
        $val = $CurrentForm->hasValue("USGLt3") ? $CurrentForm->getValue("USGLt3") : $CurrentForm->getValue("x_USGLt3");
        if (!$this->USGLt3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt3->Visible = false; // Disable update for API request
            } else {
                $this->USGLt3->setFormValue($val);
            }
        }

        // Check field name 'USGLt4' first before field var 'x_USGLt4'
        $val = $CurrentForm->hasValue("USGLt4") ? $CurrentForm->getValue("USGLt4") : $CurrentForm->getValue("x_USGLt4");
        if (!$this->USGLt4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt4->Visible = false; // Disable update for API request
            } else {
                $this->USGLt4->setFormValue($val);
            }
        }

        // Check field name 'USGLt5' first before field var 'x_USGLt5'
        $val = $CurrentForm->hasValue("USGLt5") ? $CurrentForm->getValue("USGLt5") : $CurrentForm->getValue("x_USGLt5");
        if (!$this->USGLt5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt5->Visible = false; // Disable update for API request
            } else {
                $this->USGLt5->setFormValue($val);
            }
        }

        // Check field name 'USGLt6' first before field var 'x_USGLt6'
        $val = $CurrentForm->hasValue("USGLt6") ? $CurrentForm->getValue("USGLt6") : $CurrentForm->getValue("x_USGLt6");
        if (!$this->USGLt6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt6->Visible = false; // Disable update for API request
            } else {
                $this->USGLt6->setFormValue($val);
            }
        }

        // Check field name 'USGLt7' first before field var 'x_USGLt7'
        $val = $CurrentForm->hasValue("USGLt7") ? $CurrentForm->getValue("USGLt7") : $CurrentForm->getValue("x_USGLt7");
        if (!$this->USGLt7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt7->Visible = false; // Disable update for API request
            } else {
                $this->USGLt7->setFormValue($val);
            }
        }

        // Check field name 'USGLt8' first before field var 'x_USGLt8'
        $val = $CurrentForm->hasValue("USGLt8") ? $CurrentForm->getValue("USGLt8") : $CurrentForm->getValue("x_USGLt8");
        if (!$this->USGLt8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt8->Visible = false; // Disable update for API request
            } else {
                $this->USGLt8->setFormValue($val);
            }
        }

        // Check field name 'USGLt9' first before field var 'x_USGLt9'
        $val = $CurrentForm->hasValue("USGLt9") ? $CurrentForm->getValue("USGLt9") : $CurrentForm->getValue("x_USGLt9");
        if (!$this->USGLt9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt9->Visible = false; // Disable update for API request
            } else {
                $this->USGLt9->setFormValue($val);
            }
        }

        // Check field name 'USGLt10' first before field var 'x_USGLt10'
        $val = $CurrentForm->hasValue("USGLt10") ? $CurrentForm->getValue("USGLt10") : $CurrentForm->getValue("x_USGLt10");
        if (!$this->USGLt10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt10->Visible = false; // Disable update for API request
            } else {
                $this->USGLt10->setFormValue($val);
            }
        }

        // Check field name 'USGLt11' first before field var 'x_USGLt11'
        $val = $CurrentForm->hasValue("USGLt11") ? $CurrentForm->getValue("USGLt11") : $CurrentForm->getValue("x_USGLt11");
        if (!$this->USGLt11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt11->Visible = false; // Disable update for API request
            } else {
                $this->USGLt11->setFormValue($val);
            }
        }

        // Check field name 'USGLt12' first before field var 'x_USGLt12'
        $val = $CurrentForm->hasValue("USGLt12") ? $CurrentForm->getValue("USGLt12") : $CurrentForm->getValue("x_USGLt12");
        if (!$this->USGLt12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt12->Visible = false; // Disable update for API request
            } else {
                $this->USGLt12->setFormValue($val);
            }
        }

        // Check field name 'USGLt13' first before field var 'x_USGLt13'
        $val = $CurrentForm->hasValue("USGLt13") ? $CurrentForm->getValue("USGLt13") : $CurrentForm->getValue("x_USGLt13");
        if (!$this->USGLt13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt13->Visible = false; // Disable update for API request
            } else {
                $this->USGLt13->setFormValue($val);
            }
        }

        // Check field name 'EM1' first before field var 'x_EM1'
        $val = $CurrentForm->hasValue("EM1") ? $CurrentForm->getValue("EM1") : $CurrentForm->getValue("x_EM1");
        if (!$this->EM1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM1->Visible = false; // Disable update for API request
            } else {
                $this->EM1->setFormValue($val);
            }
        }

        // Check field name 'EM2' first before field var 'x_EM2'
        $val = $CurrentForm->hasValue("EM2") ? $CurrentForm->getValue("EM2") : $CurrentForm->getValue("x_EM2");
        if (!$this->EM2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM2->Visible = false; // Disable update for API request
            } else {
                $this->EM2->setFormValue($val);
            }
        }

        // Check field name 'EM3' first before field var 'x_EM3'
        $val = $CurrentForm->hasValue("EM3") ? $CurrentForm->getValue("EM3") : $CurrentForm->getValue("x_EM3");
        if (!$this->EM3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM3->Visible = false; // Disable update for API request
            } else {
                $this->EM3->setFormValue($val);
            }
        }

        // Check field name 'EM4' first before field var 'x_EM4'
        $val = $CurrentForm->hasValue("EM4") ? $CurrentForm->getValue("EM4") : $CurrentForm->getValue("x_EM4");
        if (!$this->EM4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM4->Visible = false; // Disable update for API request
            } else {
                $this->EM4->setFormValue($val);
            }
        }

        // Check field name 'EM5' first before field var 'x_EM5'
        $val = $CurrentForm->hasValue("EM5") ? $CurrentForm->getValue("EM5") : $CurrentForm->getValue("x_EM5");
        if (!$this->EM5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM5->Visible = false; // Disable update for API request
            } else {
                $this->EM5->setFormValue($val);
            }
        }

        // Check field name 'EM6' first before field var 'x_EM6'
        $val = $CurrentForm->hasValue("EM6") ? $CurrentForm->getValue("EM6") : $CurrentForm->getValue("x_EM6");
        if (!$this->EM6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM6->Visible = false; // Disable update for API request
            } else {
                $this->EM6->setFormValue($val);
            }
        }

        // Check field name 'EM7' first before field var 'x_EM7'
        $val = $CurrentForm->hasValue("EM7") ? $CurrentForm->getValue("EM7") : $CurrentForm->getValue("x_EM7");
        if (!$this->EM7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM7->Visible = false; // Disable update for API request
            } else {
                $this->EM7->setFormValue($val);
            }
        }

        // Check field name 'EM8' first before field var 'x_EM8'
        $val = $CurrentForm->hasValue("EM8") ? $CurrentForm->getValue("EM8") : $CurrentForm->getValue("x_EM8");
        if (!$this->EM8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM8->Visible = false; // Disable update for API request
            } else {
                $this->EM8->setFormValue($val);
            }
        }

        // Check field name 'EM9' first before field var 'x_EM9'
        $val = $CurrentForm->hasValue("EM9") ? $CurrentForm->getValue("EM9") : $CurrentForm->getValue("x_EM9");
        if (!$this->EM9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM9->Visible = false; // Disable update for API request
            } else {
                $this->EM9->setFormValue($val);
            }
        }

        // Check field name 'EM10' first before field var 'x_EM10'
        $val = $CurrentForm->hasValue("EM10") ? $CurrentForm->getValue("EM10") : $CurrentForm->getValue("x_EM10");
        if (!$this->EM10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM10->Visible = false; // Disable update for API request
            } else {
                $this->EM10->setFormValue($val);
            }
        }

        // Check field name 'EM11' first before field var 'x_EM11'
        $val = $CurrentForm->hasValue("EM11") ? $CurrentForm->getValue("EM11") : $CurrentForm->getValue("x_EM11");
        if (!$this->EM11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM11->Visible = false; // Disable update for API request
            } else {
                $this->EM11->setFormValue($val);
            }
        }

        // Check field name 'EM12' first before field var 'x_EM12'
        $val = $CurrentForm->hasValue("EM12") ? $CurrentForm->getValue("EM12") : $CurrentForm->getValue("x_EM12");
        if (!$this->EM12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM12->Visible = false; // Disable update for API request
            } else {
                $this->EM12->setFormValue($val);
            }
        }

        // Check field name 'EM13' first before field var 'x_EM13'
        $val = $CurrentForm->hasValue("EM13") ? $CurrentForm->getValue("EM13") : $CurrentForm->getValue("x_EM13");
        if (!$this->EM13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM13->Visible = false; // Disable update for API request
            } else {
                $this->EM13->setFormValue($val);
            }
        }

        // Check field name 'Others1' first before field var 'x_Others1'
        $val = $CurrentForm->hasValue("Others1") ? $CurrentForm->getValue("Others1") : $CurrentForm->getValue("x_Others1");
        if (!$this->Others1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others1->Visible = false; // Disable update for API request
            } else {
                $this->Others1->setFormValue($val);
            }
        }

        // Check field name 'Others2' first before field var 'x_Others2'
        $val = $CurrentForm->hasValue("Others2") ? $CurrentForm->getValue("Others2") : $CurrentForm->getValue("x_Others2");
        if (!$this->Others2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others2->Visible = false; // Disable update for API request
            } else {
                $this->Others2->setFormValue($val);
            }
        }

        // Check field name 'Others3' first before field var 'x_Others3'
        $val = $CurrentForm->hasValue("Others3") ? $CurrentForm->getValue("Others3") : $CurrentForm->getValue("x_Others3");
        if (!$this->Others3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others3->Visible = false; // Disable update for API request
            } else {
                $this->Others3->setFormValue($val);
            }
        }

        // Check field name 'Others4' first before field var 'x_Others4'
        $val = $CurrentForm->hasValue("Others4") ? $CurrentForm->getValue("Others4") : $CurrentForm->getValue("x_Others4");
        if (!$this->Others4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others4->Visible = false; // Disable update for API request
            } else {
                $this->Others4->setFormValue($val);
            }
        }

        // Check field name 'Others5' first before field var 'x_Others5'
        $val = $CurrentForm->hasValue("Others5") ? $CurrentForm->getValue("Others5") : $CurrentForm->getValue("x_Others5");
        if (!$this->Others5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others5->Visible = false; // Disable update for API request
            } else {
                $this->Others5->setFormValue($val);
            }
        }

        // Check field name 'Others6' first before field var 'x_Others6'
        $val = $CurrentForm->hasValue("Others6") ? $CurrentForm->getValue("Others6") : $CurrentForm->getValue("x_Others6");
        if (!$this->Others6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others6->Visible = false; // Disable update for API request
            } else {
                $this->Others6->setFormValue($val);
            }
        }

        // Check field name 'Others7' first before field var 'x_Others7'
        $val = $CurrentForm->hasValue("Others7") ? $CurrentForm->getValue("Others7") : $CurrentForm->getValue("x_Others7");
        if (!$this->Others7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others7->Visible = false; // Disable update for API request
            } else {
                $this->Others7->setFormValue($val);
            }
        }

        // Check field name 'Others8' first before field var 'x_Others8'
        $val = $CurrentForm->hasValue("Others8") ? $CurrentForm->getValue("Others8") : $CurrentForm->getValue("x_Others8");
        if (!$this->Others8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others8->Visible = false; // Disable update for API request
            } else {
                $this->Others8->setFormValue($val);
            }
        }

        // Check field name 'Others9' first before field var 'x_Others9'
        $val = $CurrentForm->hasValue("Others9") ? $CurrentForm->getValue("Others9") : $CurrentForm->getValue("x_Others9");
        if (!$this->Others9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others9->Visible = false; // Disable update for API request
            } else {
                $this->Others9->setFormValue($val);
            }
        }

        // Check field name 'Others10' first before field var 'x_Others10'
        $val = $CurrentForm->hasValue("Others10") ? $CurrentForm->getValue("Others10") : $CurrentForm->getValue("x_Others10");
        if (!$this->Others10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others10->Visible = false; // Disable update for API request
            } else {
                $this->Others10->setFormValue($val);
            }
        }

        // Check field name 'Others11' first before field var 'x_Others11'
        $val = $CurrentForm->hasValue("Others11") ? $CurrentForm->getValue("Others11") : $CurrentForm->getValue("x_Others11");
        if (!$this->Others11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others11->Visible = false; // Disable update for API request
            } else {
                $this->Others11->setFormValue($val);
            }
        }

        // Check field name 'Others12' first before field var 'x_Others12'
        $val = $CurrentForm->hasValue("Others12") ? $CurrentForm->getValue("Others12") : $CurrentForm->getValue("x_Others12");
        if (!$this->Others12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others12->Visible = false; // Disable update for API request
            } else {
                $this->Others12->setFormValue($val);
            }
        }

        // Check field name 'Others13' first before field var 'x_Others13'
        $val = $CurrentForm->hasValue("Others13") ? $CurrentForm->getValue("Others13") : $CurrentForm->getValue("x_Others13");
        if (!$this->Others13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others13->Visible = false; // Disable update for API request
            } else {
                $this->Others13->setFormValue($val);
            }
        }

        // Check field name 'DR1' first before field var 'x_DR1'
        $val = $CurrentForm->hasValue("DR1") ? $CurrentForm->getValue("DR1") : $CurrentForm->getValue("x_DR1");
        if (!$this->DR1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR1->Visible = false; // Disable update for API request
            } else {
                $this->DR1->setFormValue($val);
            }
        }

        // Check field name 'DR2' first before field var 'x_DR2'
        $val = $CurrentForm->hasValue("DR2") ? $CurrentForm->getValue("DR2") : $CurrentForm->getValue("x_DR2");
        if (!$this->DR2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR2->Visible = false; // Disable update for API request
            } else {
                $this->DR2->setFormValue($val);
            }
        }

        // Check field name 'DR3' first before field var 'x_DR3'
        $val = $CurrentForm->hasValue("DR3") ? $CurrentForm->getValue("DR3") : $CurrentForm->getValue("x_DR3");
        if (!$this->DR3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR3->Visible = false; // Disable update for API request
            } else {
                $this->DR3->setFormValue($val);
            }
        }

        // Check field name 'DR4' first before field var 'x_DR4'
        $val = $CurrentForm->hasValue("DR4") ? $CurrentForm->getValue("DR4") : $CurrentForm->getValue("x_DR4");
        if (!$this->DR4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR4->Visible = false; // Disable update for API request
            } else {
                $this->DR4->setFormValue($val);
            }
        }

        // Check field name 'DR5' first before field var 'x_DR5'
        $val = $CurrentForm->hasValue("DR5") ? $CurrentForm->getValue("DR5") : $CurrentForm->getValue("x_DR5");
        if (!$this->DR5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR5->Visible = false; // Disable update for API request
            } else {
                $this->DR5->setFormValue($val);
            }
        }

        // Check field name 'DR6' first before field var 'x_DR6'
        $val = $CurrentForm->hasValue("DR6") ? $CurrentForm->getValue("DR6") : $CurrentForm->getValue("x_DR6");
        if (!$this->DR6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR6->Visible = false; // Disable update for API request
            } else {
                $this->DR6->setFormValue($val);
            }
        }

        // Check field name 'DR7' first before field var 'x_DR7'
        $val = $CurrentForm->hasValue("DR7") ? $CurrentForm->getValue("DR7") : $CurrentForm->getValue("x_DR7");
        if (!$this->DR7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR7->Visible = false; // Disable update for API request
            } else {
                $this->DR7->setFormValue($val);
            }
        }

        // Check field name 'DR8' first before field var 'x_DR8'
        $val = $CurrentForm->hasValue("DR8") ? $CurrentForm->getValue("DR8") : $CurrentForm->getValue("x_DR8");
        if (!$this->DR8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR8->Visible = false; // Disable update for API request
            } else {
                $this->DR8->setFormValue($val);
            }
        }

        // Check field name 'DR9' first before field var 'x_DR9'
        $val = $CurrentForm->hasValue("DR9") ? $CurrentForm->getValue("DR9") : $CurrentForm->getValue("x_DR9");
        if (!$this->DR9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR9->Visible = false; // Disable update for API request
            } else {
                $this->DR9->setFormValue($val);
            }
        }

        // Check field name 'DR10' first before field var 'x_DR10'
        $val = $CurrentForm->hasValue("DR10") ? $CurrentForm->getValue("DR10") : $CurrentForm->getValue("x_DR10");
        if (!$this->DR10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR10->Visible = false; // Disable update for API request
            } else {
                $this->DR10->setFormValue($val);
            }
        }

        // Check field name 'DR11' first before field var 'x_DR11'
        $val = $CurrentForm->hasValue("DR11") ? $CurrentForm->getValue("DR11") : $CurrentForm->getValue("x_DR11");
        if (!$this->DR11->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR11->Visible = false; // Disable update for API request
            } else {
                $this->DR11->setFormValue($val);
            }
        }

        // Check field name 'DR12' first before field var 'x_DR12'
        $val = $CurrentForm->hasValue("DR12") ? $CurrentForm->getValue("DR12") : $CurrentForm->getValue("x_DR12");
        if (!$this->DR12->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR12->Visible = false; // Disable update for API request
            } else {
                $this->DR12->setFormValue($val);
            }
        }

        // Check field name 'DR13' first before field var 'x_DR13'
        $val = $CurrentForm->hasValue("DR13") ? $CurrentForm->getValue("DR13") : $CurrentForm->getValue("x_DR13");
        if (!$this->DR13->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR13->Visible = false; // Disable update for API request
            } else {
                $this->DR13->setFormValue($val);
            }
        }

        // Check field name 'DOCTORRESPONSIBLE' first before field var 'x_DOCTORRESPONSIBLE'
        $val = $CurrentForm->hasValue("DOCTORRESPONSIBLE") ? $CurrentForm->getValue("DOCTORRESPONSIBLE") : $CurrentForm->getValue("x_DOCTORRESPONSIBLE");
        if (!$this->DOCTORRESPONSIBLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DOCTORRESPONSIBLE->Visible = false; // Disable update for API request
            } else {
                $this->DOCTORRESPONSIBLE->setFormValue($val);
            }
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

        // Check field name 'Convert' first before field var 'x_Convert'
        $val = $CurrentForm->hasValue("Convert") ? $CurrentForm->getValue("Convert") : $CurrentForm->getValue("x_Convert");
        if (!$this->Convert->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Convert->Visible = false; // Disable update for API request
            } else {
                $this->Convert->setFormValue($val);
            }
        }

        // Check field name 'Consultant' first before field var 'x_Consultant'
        $val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
        if (!$this->Consultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Consultant->Visible = false; // Disable update for API request
            } else {
                $this->Consultant->setFormValue($val);
            }
        }

        // Check field name 'InseminatinTechnique' first before field var 'x_InseminatinTechnique'
        $val = $CurrentForm->hasValue("InseminatinTechnique") ? $CurrentForm->getValue("InseminatinTechnique") : $CurrentForm->getValue("x_InseminatinTechnique");
        if (!$this->InseminatinTechnique->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminatinTechnique->Visible = false; // Disable update for API request
            } else {
                $this->InseminatinTechnique->setFormValue($val);
            }
        }

        // Check field name 'IndicationForART' first before field var 'x_IndicationForART'
        $val = $CurrentForm->hasValue("IndicationForART") ? $CurrentForm->getValue("IndicationForART") : $CurrentForm->getValue("x_IndicationForART");
        if (!$this->IndicationForART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IndicationForART->Visible = false; // Disable update for API request
            } else {
                $this->IndicationForART->setFormValue($val);
            }
        }

        // Check field name 'Hysteroscopy' first before field var 'x_Hysteroscopy'
        $val = $CurrentForm->hasValue("Hysteroscopy") ? $CurrentForm->getValue("Hysteroscopy") : $CurrentForm->getValue("x_Hysteroscopy");
        if (!$this->Hysteroscopy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Hysteroscopy->Visible = false; // Disable update for API request
            } else {
                $this->Hysteroscopy->setFormValue($val);
            }
        }

        // Check field name 'EndometrialScratching' first before field var 'x_EndometrialScratching'
        $val = $CurrentForm->hasValue("EndometrialScratching") ? $CurrentForm->getValue("EndometrialScratching") : $CurrentForm->getValue("x_EndometrialScratching");
        if (!$this->EndometrialScratching->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndometrialScratching->Visible = false; // Disable update for API request
            } else {
                $this->EndometrialScratching->setFormValue($val);
            }
        }

        // Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
        $val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
        if (!$this->TrialCannulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TrialCannulation->Visible = false; // Disable update for API request
            } else {
                $this->TrialCannulation->setFormValue($val);
            }
        }

        // Check field name 'CYCLETYPE' first before field var 'x_CYCLETYPE'
        $val = $CurrentForm->hasValue("CYCLETYPE") ? $CurrentForm->getValue("CYCLETYPE") : $CurrentForm->getValue("x_CYCLETYPE");
        if (!$this->CYCLETYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CYCLETYPE->Visible = false; // Disable update for API request
            } else {
                $this->CYCLETYPE->setFormValue($val);
            }
        }

        // Check field name 'HRTCYCLE' first before field var 'x_HRTCYCLE'
        $val = $CurrentForm->hasValue("HRTCYCLE") ? $CurrentForm->getValue("HRTCYCLE") : $CurrentForm->getValue("x_HRTCYCLE");
        if (!$this->HRTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HRTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->HRTCYCLE->setFormValue($val);
            }
        }

        // Check field name 'OralEstrogenDosage' first before field var 'x_OralEstrogenDosage'
        $val = $CurrentForm->hasValue("OralEstrogenDosage") ? $CurrentForm->getValue("OralEstrogenDosage") : $CurrentForm->getValue("x_OralEstrogenDosage");
        if (!$this->OralEstrogenDosage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OralEstrogenDosage->Visible = false; // Disable update for API request
            } else {
                $this->OralEstrogenDosage->setFormValue($val);
            }
        }

        // Check field name 'VaginalEstrogen' first before field var 'x_VaginalEstrogen'
        $val = $CurrentForm->hasValue("VaginalEstrogen") ? $CurrentForm->getValue("VaginalEstrogen") : $CurrentForm->getValue("x_VaginalEstrogen");
        if (!$this->VaginalEstrogen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VaginalEstrogen->Visible = false; // Disable update for API request
            } else {
                $this->VaginalEstrogen->setFormValue($val);
            }
        }

        // Check field name 'GCSF' first before field var 'x_GCSF'
        $val = $CurrentForm->hasValue("GCSF") ? $CurrentForm->getValue("GCSF") : $CurrentForm->getValue("x_GCSF");
        if (!$this->GCSF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GCSF->Visible = false; // Disable update for API request
            } else {
                $this->GCSF->setFormValue($val);
            }
        }

        // Check field name 'ActivatedPRP' first before field var 'x_ActivatedPRP'
        $val = $CurrentForm->hasValue("ActivatedPRP") ? $CurrentForm->getValue("ActivatedPRP") : $CurrentForm->getValue("x_ActivatedPRP");
        if (!$this->ActivatedPRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ActivatedPRP->Visible = false; // Disable update for API request
            } else {
                $this->ActivatedPRP->setFormValue($val);
            }
        }

        // Check field name 'UCLcm' first before field var 'x_UCLcm'
        $val = $CurrentForm->hasValue("UCLcm") ? $CurrentForm->getValue("UCLcm") : $CurrentForm->getValue("x_UCLcm");
        if (!$this->UCLcm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UCLcm->Visible = false; // Disable update for API request
            } else {
                $this->UCLcm->setFormValue($val);
            }
        }

        // Check field name 'DATOFEMBRYOTRANSFER' first before field var 'x_DATOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DATOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DATOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DATOFEMBRYOTRANSFER");
        if (!$this->DATOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DATOFEMBRYOTRANSFER->setFormValue($val);
            }
            $this->DATOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATOFEMBRYOTRANSFER->CurrentValue, 0);
        }

        // Check field name 'DAYOFEMBRYOTRANSFER' first before field var 'x_DAYOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DAYOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DAYOFEMBRYOTRANSFER");
        if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOTRANSFER->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTHAWED' first before field var 'x_NOOFEMBRYOSTHAWED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTHAWED") ? $CurrentForm->getValue("NOOFEMBRYOSTHAWED") : $CurrentForm->getValue("x_NOOFEMBRYOSTHAWED");
        if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTHAWED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTHAWED->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTRANSFERRED' first before field var 'x_NOOFEMBRYOSTRANSFERRED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTRANSFERRED") ? $CurrentForm->getValue("NOOFEMBRYOSTRANSFERRED") : $CurrentForm->getValue("x_NOOFEMBRYOSTRANSFERRED");
        if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTRANSFERRED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTRANSFERRED->setFormValue($val);
            }
        }

        // Check field name 'DAYOFEMBRYOS' first before field var 'x_DAYOFEMBRYOS'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOS") ? $CurrentForm->getValue("DAYOFEMBRYOS") : $CurrentForm->getValue("x_DAYOFEMBRYOS");
        if (!$this->DAYOFEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOS->setFormValue($val);
            }
        }

        // Check field name 'CRYOPRESERVEDEMBRYOS' first before field var 'x_CRYOPRESERVEDEMBRYOS'
        $val = $CurrentForm->hasValue("CRYOPRESERVEDEMBRYOS") ? $CurrentForm->getValue("CRYOPRESERVEDEMBRYOS") : $CurrentForm->getValue("x_CRYOPRESERVEDEMBRYOS");
        if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CRYOPRESERVEDEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->CRYOPRESERVEDEMBRYOS->setFormValue($val);
            }
        }

        // Check field name 'ViaAdmin' first before field var 'x_ViaAdmin'
        $val = $CurrentForm->hasValue("ViaAdmin") ? $CurrentForm->getValue("ViaAdmin") : $CurrentForm->getValue("x_ViaAdmin");
        if (!$this->ViaAdmin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ViaAdmin->Visible = false; // Disable update for API request
            } else {
                $this->ViaAdmin->setFormValue($val);
            }
        }

        // Check field name 'ViaStartDateTime' first before field var 'x_ViaStartDateTime'
        $val = $CurrentForm->hasValue("ViaStartDateTime") ? $CurrentForm->getValue("ViaStartDateTime") : $CurrentForm->getValue("x_ViaStartDateTime");
        if (!$this->ViaStartDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ViaStartDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ViaStartDateTime->setFormValue($val);
            }
            $this->ViaStartDateTime->CurrentValue = UnFormatDateTime($this->ViaStartDateTime->CurrentValue, 0);
        }

        // Check field name 'ViaDose' first before field var 'x_ViaDose'
        $val = $CurrentForm->hasValue("ViaDose") ? $CurrentForm->getValue("ViaDose") : $CurrentForm->getValue("x_ViaDose");
        if (!$this->ViaDose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ViaDose->Visible = false; // Disable update for API request
            } else {
                $this->ViaDose->setFormValue($val);
            }
        }

        // Check field name 'AllFreeze' first before field var 'x_AllFreeze'
        $val = $CurrentForm->hasValue("AllFreeze") ? $CurrentForm->getValue("AllFreeze") : $CurrentForm->getValue("x_AllFreeze");
        if (!$this->AllFreeze->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllFreeze->Visible = false; // Disable update for API request
            } else {
                $this->AllFreeze->setFormValue($val);
            }
        }

        // Check field name 'TreatmentCancel' first before field var 'x_TreatmentCancel'
        $val = $CurrentForm->hasValue("TreatmentCancel") ? $CurrentForm->getValue("TreatmentCancel") : $CurrentForm->getValue("x_TreatmentCancel");
        if (!$this->TreatmentCancel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatmentCancel->Visible = false; // Disable update for API request
            } else {
                $this->TreatmentCancel->setFormValue($val);
            }
        }

        // Check field name 'Reason' first before field var 'x_Reason'
        $val = $CurrentForm->hasValue("Reason") ? $CurrentForm->getValue("Reason") : $CurrentForm->getValue("x_Reason");
        if (!$this->Reason->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reason->Visible = false; // Disable update for API request
            } else {
                $this->Reason->setFormValue($val);
            }
        }

        // Check field name 'ProgesteroneAdmin' first before field var 'x_ProgesteroneAdmin'
        $val = $CurrentForm->hasValue("ProgesteroneAdmin") ? $CurrentForm->getValue("ProgesteroneAdmin") : $CurrentForm->getValue("x_ProgesteroneAdmin");
        if (!$this->ProgesteroneAdmin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgesteroneAdmin->Visible = false; // Disable update for API request
            } else {
                $this->ProgesteroneAdmin->setFormValue($val);
            }
        }

        // Check field name 'ProgesteroneStart' first before field var 'x_ProgesteroneStart'
        $val = $CurrentForm->hasValue("ProgesteroneStart") ? $CurrentForm->getValue("ProgesteroneStart") : $CurrentForm->getValue("x_ProgesteroneStart");
        if (!$this->ProgesteroneStart->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgesteroneStart->Visible = false; // Disable update for API request
            } else {
                $this->ProgesteroneStart->setFormValue($val);
            }
        }

        // Check field name 'ProgesteroneDose' first before field var 'x_ProgesteroneDose'
        $val = $CurrentForm->hasValue("ProgesteroneDose") ? $CurrentForm->getValue("ProgesteroneDose") : $CurrentForm->getValue("x_ProgesteroneDose");
        if (!$this->ProgesteroneDose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgesteroneDose->Visible = false; // Disable update for API request
            } else {
                $this->ProgesteroneDose->setFormValue($val);
            }
        }

        // Check field name 'StChDate14' first before field var 'x_StChDate14'
        $val = $CurrentForm->hasValue("StChDate14") ? $CurrentForm->getValue("StChDate14") : $CurrentForm->getValue("x_StChDate14");
        if (!$this->StChDate14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate14->Visible = false; // Disable update for API request
            } else {
                $this->StChDate14->setFormValue($val);
            }
            $this->StChDate14->CurrentValue = UnFormatDateTime($this->StChDate14->CurrentValue, 0);
        }

        // Check field name 'StChDate15' first before field var 'x_StChDate15'
        $val = $CurrentForm->hasValue("StChDate15") ? $CurrentForm->getValue("StChDate15") : $CurrentForm->getValue("x_StChDate15");
        if (!$this->StChDate15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate15->Visible = false; // Disable update for API request
            } else {
                $this->StChDate15->setFormValue($val);
            }
            $this->StChDate15->CurrentValue = UnFormatDateTime($this->StChDate15->CurrentValue, 0);
        }

        // Check field name 'StChDate16' first before field var 'x_StChDate16'
        $val = $CurrentForm->hasValue("StChDate16") ? $CurrentForm->getValue("StChDate16") : $CurrentForm->getValue("x_StChDate16");
        if (!$this->StChDate16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate16->Visible = false; // Disable update for API request
            } else {
                $this->StChDate16->setFormValue($val);
            }
            $this->StChDate16->CurrentValue = UnFormatDateTime($this->StChDate16->CurrentValue, 0);
        }

        // Check field name 'StChDate17' first before field var 'x_StChDate17'
        $val = $CurrentForm->hasValue("StChDate17") ? $CurrentForm->getValue("StChDate17") : $CurrentForm->getValue("x_StChDate17");
        if (!$this->StChDate17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate17->Visible = false; // Disable update for API request
            } else {
                $this->StChDate17->setFormValue($val);
            }
            $this->StChDate17->CurrentValue = UnFormatDateTime($this->StChDate17->CurrentValue, 0);
        }

        // Check field name 'StChDate18' first before field var 'x_StChDate18'
        $val = $CurrentForm->hasValue("StChDate18") ? $CurrentForm->getValue("StChDate18") : $CurrentForm->getValue("x_StChDate18");
        if (!$this->StChDate18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate18->Visible = false; // Disable update for API request
            } else {
                $this->StChDate18->setFormValue($val);
            }
            $this->StChDate18->CurrentValue = UnFormatDateTime($this->StChDate18->CurrentValue, 0);
        }

        // Check field name 'StChDate19' first before field var 'x_StChDate19'
        $val = $CurrentForm->hasValue("StChDate19") ? $CurrentForm->getValue("StChDate19") : $CurrentForm->getValue("x_StChDate19");
        if (!$this->StChDate19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate19->Visible = false; // Disable update for API request
            } else {
                $this->StChDate19->setFormValue($val);
            }
            $this->StChDate19->CurrentValue = UnFormatDateTime($this->StChDate19->CurrentValue, 0);
        }

        // Check field name 'StChDate20' first before field var 'x_StChDate20'
        $val = $CurrentForm->hasValue("StChDate20") ? $CurrentForm->getValue("StChDate20") : $CurrentForm->getValue("x_StChDate20");
        if (!$this->StChDate20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate20->Visible = false; // Disable update for API request
            } else {
                $this->StChDate20->setFormValue($val);
            }
            $this->StChDate20->CurrentValue = UnFormatDateTime($this->StChDate20->CurrentValue, 0);
        }

        // Check field name 'StChDate21' first before field var 'x_StChDate21'
        $val = $CurrentForm->hasValue("StChDate21") ? $CurrentForm->getValue("StChDate21") : $CurrentForm->getValue("x_StChDate21");
        if (!$this->StChDate21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate21->Visible = false; // Disable update for API request
            } else {
                $this->StChDate21->setFormValue($val);
            }
            $this->StChDate21->CurrentValue = UnFormatDateTime($this->StChDate21->CurrentValue, 0);
        }

        // Check field name 'StChDate22' first before field var 'x_StChDate22'
        $val = $CurrentForm->hasValue("StChDate22") ? $CurrentForm->getValue("StChDate22") : $CurrentForm->getValue("x_StChDate22");
        if (!$this->StChDate22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate22->Visible = false; // Disable update for API request
            } else {
                $this->StChDate22->setFormValue($val);
            }
            $this->StChDate22->CurrentValue = UnFormatDateTime($this->StChDate22->CurrentValue, 0);
        }

        // Check field name 'StChDate23' first before field var 'x_StChDate23'
        $val = $CurrentForm->hasValue("StChDate23") ? $CurrentForm->getValue("StChDate23") : $CurrentForm->getValue("x_StChDate23");
        if (!$this->StChDate23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate23->Visible = false; // Disable update for API request
            } else {
                $this->StChDate23->setFormValue($val);
            }
            $this->StChDate23->CurrentValue = UnFormatDateTime($this->StChDate23->CurrentValue, 0);
        }

        // Check field name 'StChDate24' first before field var 'x_StChDate24'
        $val = $CurrentForm->hasValue("StChDate24") ? $CurrentForm->getValue("StChDate24") : $CurrentForm->getValue("x_StChDate24");
        if (!$this->StChDate24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate24->Visible = false; // Disable update for API request
            } else {
                $this->StChDate24->setFormValue($val);
            }
            $this->StChDate24->CurrentValue = UnFormatDateTime($this->StChDate24->CurrentValue, 0);
        }

        // Check field name 'StChDate25' first before field var 'x_StChDate25'
        $val = $CurrentForm->hasValue("StChDate25") ? $CurrentForm->getValue("StChDate25") : $CurrentForm->getValue("x_StChDate25");
        if (!$this->StChDate25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StChDate25->Visible = false; // Disable update for API request
            } else {
                $this->StChDate25->setFormValue($val);
            }
            $this->StChDate25->CurrentValue = UnFormatDateTime($this->StChDate25->CurrentValue, 0);
        }

        // Check field name 'CycleDay14' first before field var 'x_CycleDay14'
        $val = $CurrentForm->hasValue("CycleDay14") ? $CurrentForm->getValue("CycleDay14") : $CurrentForm->getValue("x_CycleDay14");
        if (!$this->CycleDay14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay14->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay14->setFormValue($val);
            }
        }

        // Check field name 'CycleDay15' first before field var 'x_CycleDay15'
        $val = $CurrentForm->hasValue("CycleDay15") ? $CurrentForm->getValue("CycleDay15") : $CurrentForm->getValue("x_CycleDay15");
        if (!$this->CycleDay15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay15->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay15->setFormValue($val);
            }
        }

        // Check field name 'CycleDay16' first before field var 'x_CycleDay16'
        $val = $CurrentForm->hasValue("CycleDay16") ? $CurrentForm->getValue("CycleDay16") : $CurrentForm->getValue("x_CycleDay16");
        if (!$this->CycleDay16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay16->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay16->setFormValue($val);
            }
        }

        // Check field name 'CycleDay17' first before field var 'x_CycleDay17'
        $val = $CurrentForm->hasValue("CycleDay17") ? $CurrentForm->getValue("CycleDay17") : $CurrentForm->getValue("x_CycleDay17");
        if (!$this->CycleDay17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay17->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay17->setFormValue($val);
            }
        }

        // Check field name 'CycleDay18' first before field var 'x_CycleDay18'
        $val = $CurrentForm->hasValue("CycleDay18") ? $CurrentForm->getValue("CycleDay18") : $CurrentForm->getValue("x_CycleDay18");
        if (!$this->CycleDay18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay18->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay18->setFormValue($val);
            }
        }

        // Check field name 'CycleDay19' first before field var 'x_CycleDay19'
        $val = $CurrentForm->hasValue("CycleDay19") ? $CurrentForm->getValue("CycleDay19") : $CurrentForm->getValue("x_CycleDay19");
        if (!$this->CycleDay19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay19->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay19->setFormValue($val);
            }
        }

        // Check field name 'CycleDay20' first before field var 'x_CycleDay20'
        $val = $CurrentForm->hasValue("CycleDay20") ? $CurrentForm->getValue("CycleDay20") : $CurrentForm->getValue("x_CycleDay20");
        if (!$this->CycleDay20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay20->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay20->setFormValue($val);
            }
        }

        // Check field name 'CycleDay21' first before field var 'x_CycleDay21'
        $val = $CurrentForm->hasValue("CycleDay21") ? $CurrentForm->getValue("CycleDay21") : $CurrentForm->getValue("x_CycleDay21");
        if (!$this->CycleDay21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay21->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay21->setFormValue($val);
            }
        }

        // Check field name 'CycleDay22' first before field var 'x_CycleDay22'
        $val = $CurrentForm->hasValue("CycleDay22") ? $CurrentForm->getValue("CycleDay22") : $CurrentForm->getValue("x_CycleDay22");
        if (!$this->CycleDay22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay22->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay22->setFormValue($val);
            }
        }

        // Check field name 'CycleDay23' first before field var 'x_CycleDay23'
        $val = $CurrentForm->hasValue("CycleDay23") ? $CurrentForm->getValue("CycleDay23") : $CurrentForm->getValue("x_CycleDay23");
        if (!$this->CycleDay23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay23->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay23->setFormValue($val);
            }
        }

        // Check field name 'CycleDay24' first before field var 'x_CycleDay24'
        $val = $CurrentForm->hasValue("CycleDay24") ? $CurrentForm->getValue("CycleDay24") : $CurrentForm->getValue("x_CycleDay24");
        if (!$this->CycleDay24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay24->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay24->setFormValue($val);
            }
        }

        // Check field name 'CycleDay25' first before field var 'x_CycleDay25'
        $val = $CurrentForm->hasValue("CycleDay25") ? $CurrentForm->getValue("CycleDay25") : $CurrentForm->getValue("x_CycleDay25");
        if (!$this->CycleDay25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CycleDay25->Visible = false; // Disable update for API request
            } else {
                $this->CycleDay25->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay14' first before field var 'x_StimulationDay14'
        $val = $CurrentForm->hasValue("StimulationDay14") ? $CurrentForm->getValue("StimulationDay14") : $CurrentForm->getValue("x_StimulationDay14");
        if (!$this->StimulationDay14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay14->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay14->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay15' first before field var 'x_StimulationDay15'
        $val = $CurrentForm->hasValue("StimulationDay15") ? $CurrentForm->getValue("StimulationDay15") : $CurrentForm->getValue("x_StimulationDay15");
        if (!$this->StimulationDay15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay15->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay15->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay16' first before field var 'x_StimulationDay16'
        $val = $CurrentForm->hasValue("StimulationDay16") ? $CurrentForm->getValue("StimulationDay16") : $CurrentForm->getValue("x_StimulationDay16");
        if (!$this->StimulationDay16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay16->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay16->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay17' first before field var 'x_StimulationDay17'
        $val = $CurrentForm->hasValue("StimulationDay17") ? $CurrentForm->getValue("StimulationDay17") : $CurrentForm->getValue("x_StimulationDay17");
        if (!$this->StimulationDay17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay17->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay17->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay18' first before field var 'x_StimulationDay18'
        $val = $CurrentForm->hasValue("StimulationDay18") ? $CurrentForm->getValue("StimulationDay18") : $CurrentForm->getValue("x_StimulationDay18");
        if (!$this->StimulationDay18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay18->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay18->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay19' first before field var 'x_StimulationDay19'
        $val = $CurrentForm->hasValue("StimulationDay19") ? $CurrentForm->getValue("StimulationDay19") : $CurrentForm->getValue("x_StimulationDay19");
        if (!$this->StimulationDay19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay19->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay19->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay20' first before field var 'x_StimulationDay20'
        $val = $CurrentForm->hasValue("StimulationDay20") ? $CurrentForm->getValue("StimulationDay20") : $CurrentForm->getValue("x_StimulationDay20");
        if (!$this->StimulationDay20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay20->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay20->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay21' first before field var 'x_StimulationDay21'
        $val = $CurrentForm->hasValue("StimulationDay21") ? $CurrentForm->getValue("StimulationDay21") : $CurrentForm->getValue("x_StimulationDay21");
        if (!$this->StimulationDay21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay21->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay21->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay22' first before field var 'x_StimulationDay22'
        $val = $CurrentForm->hasValue("StimulationDay22") ? $CurrentForm->getValue("StimulationDay22") : $CurrentForm->getValue("x_StimulationDay22");
        if (!$this->StimulationDay22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay22->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay22->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay23' first before field var 'x_StimulationDay23'
        $val = $CurrentForm->hasValue("StimulationDay23") ? $CurrentForm->getValue("StimulationDay23") : $CurrentForm->getValue("x_StimulationDay23");
        if (!$this->StimulationDay23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay23->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay23->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay24' first before field var 'x_StimulationDay24'
        $val = $CurrentForm->hasValue("StimulationDay24") ? $CurrentForm->getValue("StimulationDay24") : $CurrentForm->getValue("x_StimulationDay24");
        if (!$this->StimulationDay24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay24->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay24->setFormValue($val);
            }
        }

        // Check field name 'StimulationDay25' first before field var 'x_StimulationDay25'
        $val = $CurrentForm->hasValue("StimulationDay25") ? $CurrentForm->getValue("StimulationDay25") : $CurrentForm->getValue("x_StimulationDay25");
        if (!$this->StimulationDay25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StimulationDay25->Visible = false; // Disable update for API request
            } else {
                $this->StimulationDay25->setFormValue($val);
            }
        }

        // Check field name 'Tablet14' first before field var 'x_Tablet14'
        $val = $CurrentForm->hasValue("Tablet14") ? $CurrentForm->getValue("Tablet14") : $CurrentForm->getValue("x_Tablet14");
        if (!$this->Tablet14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet14->Visible = false; // Disable update for API request
            } else {
                $this->Tablet14->setFormValue($val);
            }
        }

        // Check field name 'Tablet15' first before field var 'x_Tablet15'
        $val = $CurrentForm->hasValue("Tablet15") ? $CurrentForm->getValue("Tablet15") : $CurrentForm->getValue("x_Tablet15");
        if (!$this->Tablet15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet15->Visible = false; // Disable update for API request
            } else {
                $this->Tablet15->setFormValue($val);
            }
        }

        // Check field name 'Tablet16' first before field var 'x_Tablet16'
        $val = $CurrentForm->hasValue("Tablet16") ? $CurrentForm->getValue("Tablet16") : $CurrentForm->getValue("x_Tablet16");
        if (!$this->Tablet16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet16->Visible = false; // Disable update for API request
            } else {
                $this->Tablet16->setFormValue($val);
            }
        }

        // Check field name 'Tablet17' first before field var 'x_Tablet17'
        $val = $CurrentForm->hasValue("Tablet17") ? $CurrentForm->getValue("Tablet17") : $CurrentForm->getValue("x_Tablet17");
        if (!$this->Tablet17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet17->Visible = false; // Disable update for API request
            } else {
                $this->Tablet17->setFormValue($val);
            }
        }

        // Check field name 'Tablet18' first before field var 'x_Tablet18'
        $val = $CurrentForm->hasValue("Tablet18") ? $CurrentForm->getValue("Tablet18") : $CurrentForm->getValue("x_Tablet18");
        if (!$this->Tablet18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet18->Visible = false; // Disable update for API request
            } else {
                $this->Tablet18->setFormValue($val);
            }
        }

        // Check field name 'Tablet19' first before field var 'x_Tablet19'
        $val = $CurrentForm->hasValue("Tablet19") ? $CurrentForm->getValue("Tablet19") : $CurrentForm->getValue("x_Tablet19");
        if (!$this->Tablet19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet19->Visible = false; // Disable update for API request
            } else {
                $this->Tablet19->setFormValue($val);
            }
        }

        // Check field name 'Tablet20' first before field var 'x_Tablet20'
        $val = $CurrentForm->hasValue("Tablet20") ? $CurrentForm->getValue("Tablet20") : $CurrentForm->getValue("x_Tablet20");
        if (!$this->Tablet20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet20->Visible = false; // Disable update for API request
            } else {
                $this->Tablet20->setFormValue($val);
            }
        }

        // Check field name 'Tablet21' first before field var 'x_Tablet21'
        $val = $CurrentForm->hasValue("Tablet21") ? $CurrentForm->getValue("Tablet21") : $CurrentForm->getValue("x_Tablet21");
        if (!$this->Tablet21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet21->Visible = false; // Disable update for API request
            } else {
                $this->Tablet21->setFormValue($val);
            }
        }

        // Check field name 'Tablet22' first before field var 'x_Tablet22'
        $val = $CurrentForm->hasValue("Tablet22") ? $CurrentForm->getValue("Tablet22") : $CurrentForm->getValue("x_Tablet22");
        if (!$this->Tablet22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet22->Visible = false; // Disable update for API request
            } else {
                $this->Tablet22->setFormValue($val);
            }
        }

        // Check field name 'Tablet23' first before field var 'x_Tablet23'
        $val = $CurrentForm->hasValue("Tablet23") ? $CurrentForm->getValue("Tablet23") : $CurrentForm->getValue("x_Tablet23");
        if (!$this->Tablet23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet23->Visible = false; // Disable update for API request
            } else {
                $this->Tablet23->setFormValue($val);
            }
        }

        // Check field name 'Tablet24' first before field var 'x_Tablet24'
        $val = $CurrentForm->hasValue("Tablet24") ? $CurrentForm->getValue("Tablet24") : $CurrentForm->getValue("x_Tablet24");
        if (!$this->Tablet24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet24->Visible = false; // Disable update for API request
            } else {
                $this->Tablet24->setFormValue($val);
            }
        }

        // Check field name 'Tablet25' first before field var 'x_Tablet25'
        $val = $CurrentForm->hasValue("Tablet25") ? $CurrentForm->getValue("Tablet25") : $CurrentForm->getValue("x_Tablet25");
        if (!$this->Tablet25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tablet25->Visible = false; // Disable update for API request
            } else {
                $this->Tablet25->setFormValue($val);
            }
        }

        // Check field name 'RFSH14' first before field var 'x_RFSH14'
        $val = $CurrentForm->hasValue("RFSH14") ? $CurrentForm->getValue("RFSH14") : $CurrentForm->getValue("x_RFSH14");
        if (!$this->RFSH14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH14->Visible = false; // Disable update for API request
            } else {
                $this->RFSH14->setFormValue($val);
            }
        }

        // Check field name 'RFSH15' first before field var 'x_RFSH15'
        $val = $CurrentForm->hasValue("RFSH15") ? $CurrentForm->getValue("RFSH15") : $CurrentForm->getValue("x_RFSH15");
        if (!$this->RFSH15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH15->Visible = false; // Disable update for API request
            } else {
                $this->RFSH15->setFormValue($val);
            }
        }

        // Check field name 'RFSH16' first before field var 'x_RFSH16'
        $val = $CurrentForm->hasValue("RFSH16") ? $CurrentForm->getValue("RFSH16") : $CurrentForm->getValue("x_RFSH16");
        if (!$this->RFSH16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH16->Visible = false; // Disable update for API request
            } else {
                $this->RFSH16->setFormValue($val);
            }
        }

        // Check field name 'RFSH17' first before field var 'x_RFSH17'
        $val = $CurrentForm->hasValue("RFSH17") ? $CurrentForm->getValue("RFSH17") : $CurrentForm->getValue("x_RFSH17");
        if (!$this->RFSH17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH17->Visible = false; // Disable update for API request
            } else {
                $this->RFSH17->setFormValue($val);
            }
        }

        // Check field name 'RFSH18' first before field var 'x_RFSH18'
        $val = $CurrentForm->hasValue("RFSH18") ? $CurrentForm->getValue("RFSH18") : $CurrentForm->getValue("x_RFSH18");
        if (!$this->RFSH18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH18->Visible = false; // Disable update for API request
            } else {
                $this->RFSH18->setFormValue($val);
            }
        }

        // Check field name 'RFSH19' first before field var 'x_RFSH19'
        $val = $CurrentForm->hasValue("RFSH19") ? $CurrentForm->getValue("RFSH19") : $CurrentForm->getValue("x_RFSH19");
        if (!$this->RFSH19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH19->Visible = false; // Disable update for API request
            } else {
                $this->RFSH19->setFormValue($val);
            }
        }

        // Check field name 'RFSH20' first before field var 'x_RFSH20'
        $val = $CurrentForm->hasValue("RFSH20") ? $CurrentForm->getValue("RFSH20") : $CurrentForm->getValue("x_RFSH20");
        if (!$this->RFSH20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH20->Visible = false; // Disable update for API request
            } else {
                $this->RFSH20->setFormValue($val);
            }
        }

        // Check field name 'RFSH21' first before field var 'x_RFSH21'
        $val = $CurrentForm->hasValue("RFSH21") ? $CurrentForm->getValue("RFSH21") : $CurrentForm->getValue("x_RFSH21");
        if (!$this->RFSH21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH21->Visible = false; // Disable update for API request
            } else {
                $this->RFSH21->setFormValue($val);
            }
        }

        // Check field name 'RFSH22' first before field var 'x_RFSH22'
        $val = $CurrentForm->hasValue("RFSH22") ? $CurrentForm->getValue("RFSH22") : $CurrentForm->getValue("x_RFSH22");
        if (!$this->RFSH22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH22->Visible = false; // Disable update for API request
            } else {
                $this->RFSH22->setFormValue($val);
            }
        }

        // Check field name 'RFSH23' first before field var 'x_RFSH23'
        $val = $CurrentForm->hasValue("RFSH23") ? $CurrentForm->getValue("RFSH23") : $CurrentForm->getValue("x_RFSH23");
        if (!$this->RFSH23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH23->Visible = false; // Disable update for API request
            } else {
                $this->RFSH23->setFormValue($val);
            }
        }

        // Check field name 'RFSH24' first before field var 'x_RFSH24'
        $val = $CurrentForm->hasValue("RFSH24") ? $CurrentForm->getValue("RFSH24") : $CurrentForm->getValue("x_RFSH24");
        if (!$this->RFSH24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH24->Visible = false; // Disable update for API request
            } else {
                $this->RFSH24->setFormValue($val);
            }
        }

        // Check field name 'RFSH25' first before field var 'x_RFSH25'
        $val = $CurrentForm->hasValue("RFSH25") ? $CurrentForm->getValue("RFSH25") : $CurrentForm->getValue("x_RFSH25");
        if (!$this->RFSH25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RFSH25->Visible = false; // Disable update for API request
            } else {
                $this->RFSH25->setFormValue($val);
            }
        }

        // Check field name 'HMG14' first before field var 'x_HMG14'
        $val = $CurrentForm->hasValue("HMG14") ? $CurrentForm->getValue("HMG14") : $CurrentForm->getValue("x_HMG14");
        if (!$this->HMG14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG14->Visible = false; // Disable update for API request
            } else {
                $this->HMG14->setFormValue($val);
            }
        }

        // Check field name 'HMG15' first before field var 'x_HMG15'
        $val = $CurrentForm->hasValue("HMG15") ? $CurrentForm->getValue("HMG15") : $CurrentForm->getValue("x_HMG15");
        if (!$this->HMG15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG15->Visible = false; // Disable update for API request
            } else {
                $this->HMG15->setFormValue($val);
            }
        }

        // Check field name 'HMG16' first before field var 'x_HMG16'
        $val = $CurrentForm->hasValue("HMG16") ? $CurrentForm->getValue("HMG16") : $CurrentForm->getValue("x_HMG16");
        if (!$this->HMG16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG16->Visible = false; // Disable update for API request
            } else {
                $this->HMG16->setFormValue($val);
            }
        }

        // Check field name 'HMG17' first before field var 'x_HMG17'
        $val = $CurrentForm->hasValue("HMG17") ? $CurrentForm->getValue("HMG17") : $CurrentForm->getValue("x_HMG17");
        if (!$this->HMG17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG17->Visible = false; // Disable update for API request
            } else {
                $this->HMG17->setFormValue($val);
            }
        }

        // Check field name 'HMG18' first before field var 'x_HMG18'
        $val = $CurrentForm->hasValue("HMG18") ? $CurrentForm->getValue("HMG18") : $CurrentForm->getValue("x_HMG18");
        if (!$this->HMG18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG18->Visible = false; // Disable update for API request
            } else {
                $this->HMG18->setFormValue($val);
            }
        }

        // Check field name 'HMG19' first before field var 'x_HMG19'
        $val = $CurrentForm->hasValue("HMG19") ? $CurrentForm->getValue("HMG19") : $CurrentForm->getValue("x_HMG19");
        if (!$this->HMG19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG19->Visible = false; // Disable update for API request
            } else {
                $this->HMG19->setFormValue($val);
            }
        }

        // Check field name 'HMG20' first before field var 'x_HMG20'
        $val = $CurrentForm->hasValue("HMG20") ? $CurrentForm->getValue("HMG20") : $CurrentForm->getValue("x_HMG20");
        if (!$this->HMG20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG20->Visible = false; // Disable update for API request
            } else {
                $this->HMG20->setFormValue($val);
            }
        }

        // Check field name 'HMG21' first before field var 'x_HMG21'
        $val = $CurrentForm->hasValue("HMG21") ? $CurrentForm->getValue("HMG21") : $CurrentForm->getValue("x_HMG21");
        if (!$this->HMG21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG21->Visible = false; // Disable update for API request
            } else {
                $this->HMG21->setFormValue($val);
            }
        }

        // Check field name 'HMG22' first before field var 'x_HMG22'
        $val = $CurrentForm->hasValue("HMG22") ? $CurrentForm->getValue("HMG22") : $CurrentForm->getValue("x_HMG22");
        if (!$this->HMG22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG22->Visible = false; // Disable update for API request
            } else {
                $this->HMG22->setFormValue($val);
            }
        }

        // Check field name 'HMG23' first before field var 'x_HMG23'
        $val = $CurrentForm->hasValue("HMG23") ? $CurrentForm->getValue("HMG23") : $CurrentForm->getValue("x_HMG23");
        if (!$this->HMG23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG23->Visible = false; // Disable update for API request
            } else {
                $this->HMG23->setFormValue($val);
            }
        }

        // Check field name 'HMG24' first before field var 'x_HMG24'
        $val = $CurrentForm->hasValue("HMG24") ? $CurrentForm->getValue("HMG24") : $CurrentForm->getValue("x_HMG24");
        if (!$this->HMG24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG24->Visible = false; // Disable update for API request
            } else {
                $this->HMG24->setFormValue($val);
            }
        }

        // Check field name 'HMG25' first before field var 'x_HMG25'
        $val = $CurrentForm->hasValue("HMG25") ? $CurrentForm->getValue("HMG25") : $CurrentForm->getValue("x_HMG25");
        if (!$this->HMG25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HMG25->Visible = false; // Disable update for API request
            } else {
                $this->HMG25->setFormValue($val);
            }
        }

        // Check field name 'GnRH14' first before field var 'x_GnRH14'
        $val = $CurrentForm->hasValue("GnRH14") ? $CurrentForm->getValue("GnRH14") : $CurrentForm->getValue("x_GnRH14");
        if (!$this->GnRH14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH14->Visible = false; // Disable update for API request
            } else {
                $this->GnRH14->setFormValue($val);
            }
        }

        // Check field name 'GnRH15' first before field var 'x_GnRH15'
        $val = $CurrentForm->hasValue("GnRH15") ? $CurrentForm->getValue("GnRH15") : $CurrentForm->getValue("x_GnRH15");
        if (!$this->GnRH15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH15->Visible = false; // Disable update for API request
            } else {
                $this->GnRH15->setFormValue($val);
            }
        }

        // Check field name 'GnRH16' first before field var 'x_GnRH16'
        $val = $CurrentForm->hasValue("GnRH16") ? $CurrentForm->getValue("GnRH16") : $CurrentForm->getValue("x_GnRH16");
        if (!$this->GnRH16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH16->Visible = false; // Disable update for API request
            } else {
                $this->GnRH16->setFormValue($val);
            }
        }

        // Check field name 'GnRH17' first before field var 'x_GnRH17'
        $val = $CurrentForm->hasValue("GnRH17") ? $CurrentForm->getValue("GnRH17") : $CurrentForm->getValue("x_GnRH17");
        if (!$this->GnRH17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH17->Visible = false; // Disable update for API request
            } else {
                $this->GnRH17->setFormValue($val);
            }
        }

        // Check field name 'GnRH18' first before field var 'x_GnRH18'
        $val = $CurrentForm->hasValue("GnRH18") ? $CurrentForm->getValue("GnRH18") : $CurrentForm->getValue("x_GnRH18");
        if (!$this->GnRH18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH18->Visible = false; // Disable update for API request
            } else {
                $this->GnRH18->setFormValue($val);
            }
        }

        // Check field name 'GnRH19' first before field var 'x_GnRH19'
        $val = $CurrentForm->hasValue("GnRH19") ? $CurrentForm->getValue("GnRH19") : $CurrentForm->getValue("x_GnRH19");
        if (!$this->GnRH19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH19->Visible = false; // Disable update for API request
            } else {
                $this->GnRH19->setFormValue($val);
            }
        }

        // Check field name 'GnRH20' first before field var 'x_GnRH20'
        $val = $CurrentForm->hasValue("GnRH20") ? $CurrentForm->getValue("GnRH20") : $CurrentForm->getValue("x_GnRH20");
        if (!$this->GnRH20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH20->Visible = false; // Disable update for API request
            } else {
                $this->GnRH20->setFormValue($val);
            }
        }

        // Check field name 'GnRH21' first before field var 'x_GnRH21'
        $val = $CurrentForm->hasValue("GnRH21") ? $CurrentForm->getValue("GnRH21") : $CurrentForm->getValue("x_GnRH21");
        if (!$this->GnRH21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH21->Visible = false; // Disable update for API request
            } else {
                $this->GnRH21->setFormValue($val);
            }
        }

        // Check field name 'GnRH22' first before field var 'x_GnRH22'
        $val = $CurrentForm->hasValue("GnRH22") ? $CurrentForm->getValue("GnRH22") : $CurrentForm->getValue("x_GnRH22");
        if (!$this->GnRH22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH22->Visible = false; // Disable update for API request
            } else {
                $this->GnRH22->setFormValue($val);
            }
        }

        // Check field name 'GnRH23' first before field var 'x_GnRH23'
        $val = $CurrentForm->hasValue("GnRH23") ? $CurrentForm->getValue("GnRH23") : $CurrentForm->getValue("x_GnRH23");
        if (!$this->GnRH23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH23->Visible = false; // Disable update for API request
            } else {
                $this->GnRH23->setFormValue($val);
            }
        }

        // Check field name 'GnRH24' first before field var 'x_GnRH24'
        $val = $CurrentForm->hasValue("GnRH24") ? $CurrentForm->getValue("GnRH24") : $CurrentForm->getValue("x_GnRH24");
        if (!$this->GnRH24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH24->Visible = false; // Disable update for API request
            } else {
                $this->GnRH24->setFormValue($val);
            }
        }

        // Check field name 'GnRH25' first before field var 'x_GnRH25'
        $val = $CurrentForm->hasValue("GnRH25") ? $CurrentForm->getValue("GnRH25") : $CurrentForm->getValue("x_GnRH25");
        if (!$this->GnRH25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GnRH25->Visible = false; // Disable update for API request
            } else {
                $this->GnRH25->setFormValue($val);
            }
        }

        // Check field name 'P414' first before field var 'x_P414'
        $val = $CurrentForm->hasValue("P414") ? $CurrentForm->getValue("P414") : $CurrentForm->getValue("x_P414");
        if (!$this->P414->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P414->Visible = false; // Disable update for API request
            } else {
                $this->P414->setFormValue($val);
            }
        }

        // Check field name 'P415' first before field var 'x_P415'
        $val = $CurrentForm->hasValue("P415") ? $CurrentForm->getValue("P415") : $CurrentForm->getValue("x_P415");
        if (!$this->P415->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P415->Visible = false; // Disable update for API request
            } else {
                $this->P415->setFormValue($val);
            }
        }

        // Check field name 'P416' first before field var 'x_P416'
        $val = $CurrentForm->hasValue("P416") ? $CurrentForm->getValue("P416") : $CurrentForm->getValue("x_P416");
        if (!$this->P416->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P416->Visible = false; // Disable update for API request
            } else {
                $this->P416->setFormValue($val);
            }
        }

        // Check field name 'P417' first before field var 'x_P417'
        $val = $CurrentForm->hasValue("P417") ? $CurrentForm->getValue("P417") : $CurrentForm->getValue("x_P417");
        if (!$this->P417->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P417->Visible = false; // Disable update for API request
            } else {
                $this->P417->setFormValue($val);
            }
        }

        // Check field name 'P418' first before field var 'x_P418'
        $val = $CurrentForm->hasValue("P418") ? $CurrentForm->getValue("P418") : $CurrentForm->getValue("x_P418");
        if (!$this->P418->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P418->Visible = false; // Disable update for API request
            } else {
                $this->P418->setFormValue($val);
            }
        }

        // Check field name 'P419' first before field var 'x_P419'
        $val = $CurrentForm->hasValue("P419") ? $CurrentForm->getValue("P419") : $CurrentForm->getValue("x_P419");
        if (!$this->P419->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P419->Visible = false; // Disable update for API request
            } else {
                $this->P419->setFormValue($val);
            }
        }

        // Check field name 'P420' first before field var 'x_P420'
        $val = $CurrentForm->hasValue("P420") ? $CurrentForm->getValue("P420") : $CurrentForm->getValue("x_P420");
        if (!$this->P420->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P420->Visible = false; // Disable update for API request
            } else {
                $this->P420->setFormValue($val);
            }
        }

        // Check field name 'P421' first before field var 'x_P421'
        $val = $CurrentForm->hasValue("P421") ? $CurrentForm->getValue("P421") : $CurrentForm->getValue("x_P421");
        if (!$this->P421->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P421->Visible = false; // Disable update for API request
            } else {
                $this->P421->setFormValue($val);
            }
        }

        // Check field name 'P422' first before field var 'x_P422'
        $val = $CurrentForm->hasValue("P422") ? $CurrentForm->getValue("P422") : $CurrentForm->getValue("x_P422");
        if (!$this->P422->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P422->Visible = false; // Disable update for API request
            } else {
                $this->P422->setFormValue($val);
            }
        }

        // Check field name 'P423' first before field var 'x_P423'
        $val = $CurrentForm->hasValue("P423") ? $CurrentForm->getValue("P423") : $CurrentForm->getValue("x_P423");
        if (!$this->P423->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P423->Visible = false; // Disable update for API request
            } else {
                $this->P423->setFormValue($val);
            }
        }

        // Check field name 'P424' first before field var 'x_P424'
        $val = $CurrentForm->hasValue("P424") ? $CurrentForm->getValue("P424") : $CurrentForm->getValue("x_P424");
        if (!$this->P424->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P424->Visible = false; // Disable update for API request
            } else {
                $this->P424->setFormValue($val);
            }
        }

        // Check field name 'P425' first before field var 'x_P425'
        $val = $CurrentForm->hasValue("P425") ? $CurrentForm->getValue("P425") : $CurrentForm->getValue("x_P425");
        if (!$this->P425->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P425->Visible = false; // Disable update for API request
            } else {
                $this->P425->setFormValue($val);
            }
        }

        // Check field name 'USGRt14' first before field var 'x_USGRt14'
        $val = $CurrentForm->hasValue("USGRt14") ? $CurrentForm->getValue("USGRt14") : $CurrentForm->getValue("x_USGRt14");
        if (!$this->USGRt14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt14->Visible = false; // Disable update for API request
            } else {
                $this->USGRt14->setFormValue($val);
            }
        }

        // Check field name 'USGRt15' first before field var 'x_USGRt15'
        $val = $CurrentForm->hasValue("USGRt15") ? $CurrentForm->getValue("USGRt15") : $CurrentForm->getValue("x_USGRt15");
        if (!$this->USGRt15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt15->Visible = false; // Disable update for API request
            } else {
                $this->USGRt15->setFormValue($val);
            }
        }

        // Check field name 'USGRt16' first before field var 'x_USGRt16'
        $val = $CurrentForm->hasValue("USGRt16") ? $CurrentForm->getValue("USGRt16") : $CurrentForm->getValue("x_USGRt16");
        if (!$this->USGRt16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt16->Visible = false; // Disable update for API request
            } else {
                $this->USGRt16->setFormValue($val);
            }
        }

        // Check field name 'USGRt17' first before field var 'x_USGRt17'
        $val = $CurrentForm->hasValue("USGRt17") ? $CurrentForm->getValue("USGRt17") : $CurrentForm->getValue("x_USGRt17");
        if (!$this->USGRt17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt17->Visible = false; // Disable update for API request
            } else {
                $this->USGRt17->setFormValue($val);
            }
        }

        // Check field name 'USGRt18' first before field var 'x_USGRt18'
        $val = $CurrentForm->hasValue("USGRt18") ? $CurrentForm->getValue("USGRt18") : $CurrentForm->getValue("x_USGRt18");
        if (!$this->USGRt18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt18->Visible = false; // Disable update for API request
            } else {
                $this->USGRt18->setFormValue($val);
            }
        }

        // Check field name 'USGRt19' first before field var 'x_USGRt19'
        $val = $CurrentForm->hasValue("USGRt19") ? $CurrentForm->getValue("USGRt19") : $CurrentForm->getValue("x_USGRt19");
        if (!$this->USGRt19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt19->Visible = false; // Disable update for API request
            } else {
                $this->USGRt19->setFormValue($val);
            }
        }

        // Check field name 'USGRt20' first before field var 'x_USGRt20'
        $val = $CurrentForm->hasValue("USGRt20") ? $CurrentForm->getValue("USGRt20") : $CurrentForm->getValue("x_USGRt20");
        if (!$this->USGRt20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt20->Visible = false; // Disable update for API request
            } else {
                $this->USGRt20->setFormValue($val);
            }
        }

        // Check field name 'USGRt21' first before field var 'x_USGRt21'
        $val = $CurrentForm->hasValue("USGRt21") ? $CurrentForm->getValue("USGRt21") : $CurrentForm->getValue("x_USGRt21");
        if (!$this->USGRt21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt21->Visible = false; // Disable update for API request
            } else {
                $this->USGRt21->setFormValue($val);
            }
        }

        // Check field name 'USGRt22' first before field var 'x_USGRt22'
        $val = $CurrentForm->hasValue("USGRt22") ? $CurrentForm->getValue("USGRt22") : $CurrentForm->getValue("x_USGRt22");
        if (!$this->USGRt22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt22->Visible = false; // Disable update for API request
            } else {
                $this->USGRt22->setFormValue($val);
            }
        }

        // Check field name 'USGRt23' first before field var 'x_USGRt23'
        $val = $CurrentForm->hasValue("USGRt23") ? $CurrentForm->getValue("USGRt23") : $CurrentForm->getValue("x_USGRt23");
        if (!$this->USGRt23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt23->Visible = false; // Disable update for API request
            } else {
                $this->USGRt23->setFormValue($val);
            }
        }

        // Check field name 'USGRt24' first before field var 'x_USGRt24'
        $val = $CurrentForm->hasValue("USGRt24") ? $CurrentForm->getValue("USGRt24") : $CurrentForm->getValue("x_USGRt24");
        if (!$this->USGRt24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt24->Visible = false; // Disable update for API request
            } else {
                $this->USGRt24->setFormValue($val);
            }
        }

        // Check field name 'USGRt25' first before field var 'x_USGRt25'
        $val = $CurrentForm->hasValue("USGRt25") ? $CurrentForm->getValue("USGRt25") : $CurrentForm->getValue("x_USGRt25");
        if (!$this->USGRt25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGRt25->Visible = false; // Disable update for API request
            } else {
                $this->USGRt25->setFormValue($val);
            }
        }

        // Check field name 'USGLt14' first before field var 'x_USGLt14'
        $val = $CurrentForm->hasValue("USGLt14") ? $CurrentForm->getValue("USGLt14") : $CurrentForm->getValue("x_USGLt14");
        if (!$this->USGLt14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt14->Visible = false; // Disable update for API request
            } else {
                $this->USGLt14->setFormValue($val);
            }
        }

        // Check field name 'USGLt15' first before field var 'x_USGLt15'
        $val = $CurrentForm->hasValue("USGLt15") ? $CurrentForm->getValue("USGLt15") : $CurrentForm->getValue("x_USGLt15");
        if (!$this->USGLt15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt15->Visible = false; // Disable update for API request
            } else {
                $this->USGLt15->setFormValue($val);
            }
        }

        // Check field name 'USGLt16' first before field var 'x_USGLt16'
        $val = $CurrentForm->hasValue("USGLt16") ? $CurrentForm->getValue("USGLt16") : $CurrentForm->getValue("x_USGLt16");
        if (!$this->USGLt16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt16->Visible = false; // Disable update for API request
            } else {
                $this->USGLt16->setFormValue($val);
            }
        }

        // Check field name 'USGLt17' first before field var 'x_USGLt17'
        $val = $CurrentForm->hasValue("USGLt17") ? $CurrentForm->getValue("USGLt17") : $CurrentForm->getValue("x_USGLt17");
        if (!$this->USGLt17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt17->Visible = false; // Disable update for API request
            } else {
                $this->USGLt17->setFormValue($val);
            }
        }

        // Check field name 'USGLt18' first before field var 'x_USGLt18'
        $val = $CurrentForm->hasValue("USGLt18") ? $CurrentForm->getValue("USGLt18") : $CurrentForm->getValue("x_USGLt18");
        if (!$this->USGLt18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt18->Visible = false; // Disable update for API request
            } else {
                $this->USGLt18->setFormValue($val);
            }
        }

        // Check field name 'USGLt19' first before field var 'x_USGLt19'
        $val = $CurrentForm->hasValue("USGLt19") ? $CurrentForm->getValue("USGLt19") : $CurrentForm->getValue("x_USGLt19");
        if (!$this->USGLt19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt19->Visible = false; // Disable update for API request
            } else {
                $this->USGLt19->setFormValue($val);
            }
        }

        // Check field name 'USGLt20' first before field var 'x_USGLt20'
        $val = $CurrentForm->hasValue("USGLt20") ? $CurrentForm->getValue("USGLt20") : $CurrentForm->getValue("x_USGLt20");
        if (!$this->USGLt20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt20->Visible = false; // Disable update for API request
            } else {
                $this->USGLt20->setFormValue($val);
            }
        }

        // Check field name 'USGLt21' first before field var 'x_USGLt21'
        $val = $CurrentForm->hasValue("USGLt21") ? $CurrentForm->getValue("USGLt21") : $CurrentForm->getValue("x_USGLt21");
        if (!$this->USGLt21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt21->Visible = false; // Disable update for API request
            } else {
                $this->USGLt21->setFormValue($val);
            }
        }

        // Check field name 'USGLt22' first before field var 'x_USGLt22'
        $val = $CurrentForm->hasValue("USGLt22") ? $CurrentForm->getValue("USGLt22") : $CurrentForm->getValue("x_USGLt22");
        if (!$this->USGLt22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt22->Visible = false; // Disable update for API request
            } else {
                $this->USGLt22->setFormValue($val);
            }
        }

        // Check field name 'USGLt23' first before field var 'x_USGLt23'
        $val = $CurrentForm->hasValue("USGLt23") ? $CurrentForm->getValue("USGLt23") : $CurrentForm->getValue("x_USGLt23");
        if (!$this->USGLt23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt23->Visible = false; // Disable update for API request
            } else {
                $this->USGLt23->setFormValue($val);
            }
        }

        // Check field name 'USGLt24' first before field var 'x_USGLt24'
        $val = $CurrentForm->hasValue("USGLt24") ? $CurrentForm->getValue("USGLt24") : $CurrentForm->getValue("x_USGLt24");
        if (!$this->USGLt24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt24->Visible = false; // Disable update for API request
            } else {
                $this->USGLt24->setFormValue($val);
            }
        }

        // Check field name 'USGLt25' first before field var 'x_USGLt25'
        $val = $CurrentForm->hasValue("USGLt25") ? $CurrentForm->getValue("USGLt25") : $CurrentForm->getValue("x_USGLt25");
        if (!$this->USGLt25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->USGLt25->Visible = false; // Disable update for API request
            } else {
                $this->USGLt25->setFormValue($val);
            }
        }

        // Check field name 'EM14' first before field var 'x_EM14'
        $val = $CurrentForm->hasValue("EM14") ? $CurrentForm->getValue("EM14") : $CurrentForm->getValue("x_EM14");
        if (!$this->EM14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM14->Visible = false; // Disable update for API request
            } else {
                $this->EM14->setFormValue($val);
            }
        }

        // Check field name 'EM15' first before field var 'x_EM15'
        $val = $CurrentForm->hasValue("EM15") ? $CurrentForm->getValue("EM15") : $CurrentForm->getValue("x_EM15");
        if (!$this->EM15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM15->Visible = false; // Disable update for API request
            } else {
                $this->EM15->setFormValue($val);
            }
        }

        // Check field name 'EM16' first before field var 'x_EM16'
        $val = $CurrentForm->hasValue("EM16") ? $CurrentForm->getValue("EM16") : $CurrentForm->getValue("x_EM16");
        if (!$this->EM16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM16->Visible = false; // Disable update for API request
            } else {
                $this->EM16->setFormValue($val);
            }
        }

        // Check field name 'EM17' first before field var 'x_EM17'
        $val = $CurrentForm->hasValue("EM17") ? $CurrentForm->getValue("EM17") : $CurrentForm->getValue("x_EM17");
        if (!$this->EM17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM17->Visible = false; // Disable update for API request
            } else {
                $this->EM17->setFormValue($val);
            }
        }

        // Check field name 'EM18' first before field var 'x_EM18'
        $val = $CurrentForm->hasValue("EM18") ? $CurrentForm->getValue("EM18") : $CurrentForm->getValue("x_EM18");
        if (!$this->EM18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM18->Visible = false; // Disable update for API request
            } else {
                $this->EM18->setFormValue($val);
            }
        }

        // Check field name 'EM19' first before field var 'x_EM19'
        $val = $CurrentForm->hasValue("EM19") ? $CurrentForm->getValue("EM19") : $CurrentForm->getValue("x_EM19");
        if (!$this->EM19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM19->Visible = false; // Disable update for API request
            } else {
                $this->EM19->setFormValue($val);
            }
        }

        // Check field name 'EM20' first before field var 'x_EM20'
        $val = $CurrentForm->hasValue("EM20") ? $CurrentForm->getValue("EM20") : $CurrentForm->getValue("x_EM20");
        if (!$this->EM20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM20->Visible = false; // Disable update for API request
            } else {
                $this->EM20->setFormValue($val);
            }
        }

        // Check field name 'EM21' first before field var 'x_EM21'
        $val = $CurrentForm->hasValue("EM21") ? $CurrentForm->getValue("EM21") : $CurrentForm->getValue("x_EM21");
        if (!$this->EM21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM21->Visible = false; // Disable update for API request
            } else {
                $this->EM21->setFormValue($val);
            }
        }

        // Check field name 'EM22' first before field var 'x_EM22'
        $val = $CurrentForm->hasValue("EM22") ? $CurrentForm->getValue("EM22") : $CurrentForm->getValue("x_EM22");
        if (!$this->EM22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM22->Visible = false; // Disable update for API request
            } else {
                $this->EM22->setFormValue($val);
            }
        }

        // Check field name 'EM23' first before field var 'x_EM23'
        $val = $CurrentForm->hasValue("EM23") ? $CurrentForm->getValue("EM23") : $CurrentForm->getValue("x_EM23");
        if (!$this->EM23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM23->Visible = false; // Disable update for API request
            } else {
                $this->EM23->setFormValue($val);
            }
        }

        // Check field name 'EM24' first before field var 'x_EM24'
        $val = $CurrentForm->hasValue("EM24") ? $CurrentForm->getValue("EM24") : $CurrentForm->getValue("x_EM24");
        if (!$this->EM24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM24->Visible = false; // Disable update for API request
            } else {
                $this->EM24->setFormValue($val);
            }
        }

        // Check field name 'EM25' first before field var 'x_EM25'
        $val = $CurrentForm->hasValue("EM25") ? $CurrentForm->getValue("EM25") : $CurrentForm->getValue("x_EM25");
        if (!$this->EM25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EM25->Visible = false; // Disable update for API request
            } else {
                $this->EM25->setFormValue($val);
            }
        }

        // Check field name 'Others14' first before field var 'x_Others14'
        $val = $CurrentForm->hasValue("Others14") ? $CurrentForm->getValue("Others14") : $CurrentForm->getValue("x_Others14");
        if (!$this->Others14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others14->Visible = false; // Disable update for API request
            } else {
                $this->Others14->setFormValue($val);
            }
        }

        // Check field name 'Others15' first before field var 'x_Others15'
        $val = $CurrentForm->hasValue("Others15") ? $CurrentForm->getValue("Others15") : $CurrentForm->getValue("x_Others15");
        if (!$this->Others15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others15->Visible = false; // Disable update for API request
            } else {
                $this->Others15->setFormValue($val);
            }
        }

        // Check field name 'Others16' first before field var 'x_Others16'
        $val = $CurrentForm->hasValue("Others16") ? $CurrentForm->getValue("Others16") : $CurrentForm->getValue("x_Others16");
        if (!$this->Others16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others16->Visible = false; // Disable update for API request
            } else {
                $this->Others16->setFormValue($val);
            }
        }

        // Check field name 'Others17' first before field var 'x_Others17'
        $val = $CurrentForm->hasValue("Others17") ? $CurrentForm->getValue("Others17") : $CurrentForm->getValue("x_Others17");
        if (!$this->Others17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others17->Visible = false; // Disable update for API request
            } else {
                $this->Others17->setFormValue($val);
            }
        }

        // Check field name 'Others18' first before field var 'x_Others18'
        $val = $CurrentForm->hasValue("Others18") ? $CurrentForm->getValue("Others18") : $CurrentForm->getValue("x_Others18");
        if (!$this->Others18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others18->Visible = false; // Disable update for API request
            } else {
                $this->Others18->setFormValue($val);
            }
        }

        // Check field name 'Others19' first before field var 'x_Others19'
        $val = $CurrentForm->hasValue("Others19") ? $CurrentForm->getValue("Others19") : $CurrentForm->getValue("x_Others19");
        if (!$this->Others19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others19->Visible = false; // Disable update for API request
            } else {
                $this->Others19->setFormValue($val);
            }
        }

        // Check field name 'Others20' first before field var 'x_Others20'
        $val = $CurrentForm->hasValue("Others20") ? $CurrentForm->getValue("Others20") : $CurrentForm->getValue("x_Others20");
        if (!$this->Others20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others20->Visible = false; // Disable update for API request
            } else {
                $this->Others20->setFormValue($val);
            }
        }

        // Check field name 'Others21' first before field var 'x_Others21'
        $val = $CurrentForm->hasValue("Others21") ? $CurrentForm->getValue("Others21") : $CurrentForm->getValue("x_Others21");
        if (!$this->Others21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others21->Visible = false; // Disable update for API request
            } else {
                $this->Others21->setFormValue($val);
            }
        }

        // Check field name 'Others22' first before field var 'x_Others22'
        $val = $CurrentForm->hasValue("Others22") ? $CurrentForm->getValue("Others22") : $CurrentForm->getValue("x_Others22");
        if (!$this->Others22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others22->Visible = false; // Disable update for API request
            } else {
                $this->Others22->setFormValue($val);
            }
        }

        // Check field name 'Others23' first before field var 'x_Others23'
        $val = $CurrentForm->hasValue("Others23") ? $CurrentForm->getValue("Others23") : $CurrentForm->getValue("x_Others23");
        if (!$this->Others23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others23->Visible = false; // Disable update for API request
            } else {
                $this->Others23->setFormValue($val);
            }
        }

        // Check field name 'Others24' first before field var 'x_Others24'
        $val = $CurrentForm->hasValue("Others24") ? $CurrentForm->getValue("Others24") : $CurrentForm->getValue("x_Others24");
        if (!$this->Others24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others24->Visible = false; // Disable update for API request
            } else {
                $this->Others24->setFormValue($val);
            }
        }

        // Check field name 'Others25' first before field var 'x_Others25'
        $val = $CurrentForm->hasValue("Others25") ? $CurrentForm->getValue("Others25") : $CurrentForm->getValue("x_Others25");
        if (!$this->Others25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Others25->Visible = false; // Disable update for API request
            } else {
                $this->Others25->setFormValue($val);
            }
        }

        // Check field name 'DR14' first before field var 'x_DR14'
        $val = $CurrentForm->hasValue("DR14") ? $CurrentForm->getValue("DR14") : $CurrentForm->getValue("x_DR14");
        if (!$this->DR14->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR14->Visible = false; // Disable update for API request
            } else {
                $this->DR14->setFormValue($val);
            }
        }

        // Check field name 'DR15' first before field var 'x_DR15'
        $val = $CurrentForm->hasValue("DR15") ? $CurrentForm->getValue("DR15") : $CurrentForm->getValue("x_DR15");
        if (!$this->DR15->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR15->Visible = false; // Disable update for API request
            } else {
                $this->DR15->setFormValue($val);
            }
        }

        // Check field name 'DR16' first before field var 'x_DR16'
        $val = $CurrentForm->hasValue("DR16") ? $CurrentForm->getValue("DR16") : $CurrentForm->getValue("x_DR16");
        if (!$this->DR16->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR16->Visible = false; // Disable update for API request
            } else {
                $this->DR16->setFormValue($val);
            }
        }

        // Check field name 'DR17' first before field var 'x_DR17'
        $val = $CurrentForm->hasValue("DR17") ? $CurrentForm->getValue("DR17") : $CurrentForm->getValue("x_DR17");
        if (!$this->DR17->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR17->Visible = false; // Disable update for API request
            } else {
                $this->DR17->setFormValue($val);
            }
        }

        // Check field name 'DR18' first before field var 'x_DR18'
        $val = $CurrentForm->hasValue("DR18") ? $CurrentForm->getValue("DR18") : $CurrentForm->getValue("x_DR18");
        if (!$this->DR18->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR18->Visible = false; // Disable update for API request
            } else {
                $this->DR18->setFormValue($val);
            }
        }

        // Check field name 'DR19' first before field var 'x_DR19'
        $val = $CurrentForm->hasValue("DR19") ? $CurrentForm->getValue("DR19") : $CurrentForm->getValue("x_DR19");
        if (!$this->DR19->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR19->Visible = false; // Disable update for API request
            } else {
                $this->DR19->setFormValue($val);
            }
        }

        // Check field name 'DR20' first before field var 'x_DR20'
        $val = $CurrentForm->hasValue("DR20") ? $CurrentForm->getValue("DR20") : $CurrentForm->getValue("x_DR20");
        if (!$this->DR20->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR20->Visible = false; // Disable update for API request
            } else {
                $this->DR20->setFormValue($val);
            }
        }

        // Check field name 'DR21' first before field var 'x_DR21'
        $val = $CurrentForm->hasValue("DR21") ? $CurrentForm->getValue("DR21") : $CurrentForm->getValue("x_DR21");
        if (!$this->DR21->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR21->Visible = false; // Disable update for API request
            } else {
                $this->DR21->setFormValue($val);
            }
        }

        // Check field name 'DR22' first before field var 'x_DR22'
        $val = $CurrentForm->hasValue("DR22") ? $CurrentForm->getValue("DR22") : $CurrentForm->getValue("x_DR22");
        if (!$this->DR22->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR22->Visible = false; // Disable update for API request
            } else {
                $this->DR22->setFormValue($val);
            }
        }

        // Check field name 'DR23' first before field var 'x_DR23'
        $val = $CurrentForm->hasValue("DR23") ? $CurrentForm->getValue("DR23") : $CurrentForm->getValue("x_DR23");
        if (!$this->DR23->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR23->Visible = false; // Disable update for API request
            } else {
                $this->DR23->setFormValue($val);
            }
        }

        // Check field name 'DR24' first before field var 'x_DR24'
        $val = $CurrentForm->hasValue("DR24") ? $CurrentForm->getValue("DR24") : $CurrentForm->getValue("x_DR24");
        if (!$this->DR24->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR24->Visible = false; // Disable update for API request
            } else {
                $this->DR24->setFormValue($val);
            }
        }

        // Check field name 'DR25' first before field var 'x_DR25'
        $val = $CurrentForm->hasValue("DR25") ? $CurrentForm->getValue("DR25") : $CurrentForm->getValue("x_DR25");
        if (!$this->DR25->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DR25->Visible = false; // Disable update for API request
            } else {
                $this->DR25->setFormValue($val);
            }
        }

        // Check field name 'E214' first before field var 'x_E214'
        $val = $CurrentForm->hasValue("E214") ? $CurrentForm->getValue("E214") : $CurrentForm->getValue("x_E214");
        if (!$this->E214->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E214->Visible = false; // Disable update for API request
            } else {
                $this->E214->setFormValue($val);
            }
        }

        // Check field name 'E215' first before field var 'x_E215'
        $val = $CurrentForm->hasValue("E215") ? $CurrentForm->getValue("E215") : $CurrentForm->getValue("x_E215");
        if (!$this->E215->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E215->Visible = false; // Disable update for API request
            } else {
                $this->E215->setFormValue($val);
            }
        }

        // Check field name 'E216' first before field var 'x_E216'
        $val = $CurrentForm->hasValue("E216") ? $CurrentForm->getValue("E216") : $CurrentForm->getValue("x_E216");
        if (!$this->E216->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E216->Visible = false; // Disable update for API request
            } else {
                $this->E216->setFormValue($val);
            }
        }

        // Check field name 'E217' first before field var 'x_E217'
        $val = $CurrentForm->hasValue("E217") ? $CurrentForm->getValue("E217") : $CurrentForm->getValue("x_E217");
        if (!$this->E217->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E217->Visible = false; // Disable update for API request
            } else {
                $this->E217->setFormValue($val);
            }
        }

        // Check field name 'E218' first before field var 'x_E218'
        $val = $CurrentForm->hasValue("E218") ? $CurrentForm->getValue("E218") : $CurrentForm->getValue("x_E218");
        if (!$this->E218->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E218->Visible = false; // Disable update for API request
            } else {
                $this->E218->setFormValue($val);
            }
        }

        // Check field name 'E219' first before field var 'x_E219'
        $val = $CurrentForm->hasValue("E219") ? $CurrentForm->getValue("E219") : $CurrentForm->getValue("x_E219");
        if (!$this->E219->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E219->Visible = false; // Disable update for API request
            } else {
                $this->E219->setFormValue($val);
            }
        }

        // Check field name 'E220' first before field var 'x_E220'
        $val = $CurrentForm->hasValue("E220") ? $CurrentForm->getValue("E220") : $CurrentForm->getValue("x_E220");
        if (!$this->E220->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E220->Visible = false; // Disable update for API request
            } else {
                $this->E220->setFormValue($val);
            }
        }

        // Check field name 'E221' first before field var 'x_E221'
        $val = $CurrentForm->hasValue("E221") ? $CurrentForm->getValue("E221") : $CurrentForm->getValue("x_E221");
        if (!$this->E221->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E221->Visible = false; // Disable update for API request
            } else {
                $this->E221->setFormValue($val);
            }
        }

        // Check field name 'E222' first before field var 'x_E222'
        $val = $CurrentForm->hasValue("E222") ? $CurrentForm->getValue("E222") : $CurrentForm->getValue("x_E222");
        if (!$this->E222->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E222->Visible = false; // Disable update for API request
            } else {
                $this->E222->setFormValue($val);
            }
        }

        // Check field name 'E223' first before field var 'x_E223'
        $val = $CurrentForm->hasValue("E223") ? $CurrentForm->getValue("E223") : $CurrentForm->getValue("x_E223");
        if (!$this->E223->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E223->Visible = false; // Disable update for API request
            } else {
                $this->E223->setFormValue($val);
            }
        }

        // Check field name 'E224' first before field var 'x_E224'
        $val = $CurrentForm->hasValue("E224") ? $CurrentForm->getValue("E224") : $CurrentForm->getValue("x_E224");
        if (!$this->E224->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E224->Visible = false; // Disable update for API request
            } else {
                $this->E224->setFormValue($val);
            }
        }

        // Check field name 'E225' first before field var 'x_E225'
        $val = $CurrentForm->hasValue("E225") ? $CurrentForm->getValue("E225") : $CurrentForm->getValue("x_E225");
        if (!$this->E225->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E225->Visible = false; // Disable update for API request
            } else {
                $this->E225->setFormValue($val);
            }
        }

        // Check field name 'EEETTTDTE' first before field var 'x_EEETTTDTE'
        $val = $CurrentForm->hasValue("EEETTTDTE") ? $CurrentForm->getValue("EEETTTDTE") : $CurrentForm->getValue("x_EEETTTDTE");
        if (!$this->EEETTTDTE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EEETTTDTE->Visible = false; // Disable update for API request
            } else {
                $this->EEETTTDTE->setFormValue($val);
            }
            $this->EEETTTDTE->CurrentValue = UnFormatDateTime($this->EEETTTDTE->CurrentValue, 0);
        }

        // Check field name 'bhcgdate' first before field var 'x_bhcgdate'
        $val = $CurrentForm->hasValue("bhcgdate") ? $CurrentForm->getValue("bhcgdate") : $CurrentForm->getValue("x_bhcgdate");
        if (!$this->bhcgdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bhcgdate->Visible = false; // Disable update for API request
            } else {
                $this->bhcgdate->setFormValue($val);
            }
            $this->bhcgdate->CurrentValue = UnFormatDateTime($this->bhcgdate->CurrentValue, 0);
        }

        // Check field name 'TUBAL_PATENCY' first before field var 'x_TUBAL_PATENCY'
        $val = $CurrentForm->hasValue("TUBAL_PATENCY") ? $CurrentForm->getValue("TUBAL_PATENCY") : $CurrentForm->getValue("x_TUBAL_PATENCY");
        if (!$this->TUBAL_PATENCY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TUBAL_PATENCY->Visible = false; // Disable update for API request
            } else {
                $this->TUBAL_PATENCY->setFormValue($val);
            }
        }

        // Check field name 'HSG' first before field var 'x_HSG'
        $val = $CurrentForm->hasValue("HSG") ? $CurrentForm->getValue("HSG") : $CurrentForm->getValue("x_HSG");
        if (!$this->HSG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HSG->Visible = false; // Disable update for API request
            } else {
                $this->HSG->setFormValue($val);
            }
        }

        // Check field name 'DHL' first before field var 'x_DHL'
        $val = $CurrentForm->hasValue("DHL") ? $CurrentForm->getValue("DHL") : $CurrentForm->getValue("x_DHL");
        if (!$this->DHL->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DHL->Visible = false; // Disable update for API request
            } else {
                $this->DHL->setFormValue($val);
            }
        }

        // Check field name 'UTERINE_PROBLEMS' first before field var 'x_UTERINE_PROBLEMS'
        $val = $CurrentForm->hasValue("UTERINE_PROBLEMS") ? $CurrentForm->getValue("UTERINE_PROBLEMS") : $CurrentForm->getValue("x_UTERINE_PROBLEMS");
        if (!$this->UTERINE_PROBLEMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UTERINE_PROBLEMS->Visible = false; // Disable update for API request
            } else {
                $this->UTERINE_PROBLEMS->setFormValue($val);
            }
        }

        // Check field name 'W_COMORBIDS' first before field var 'x_W_COMORBIDS'
        $val = $CurrentForm->hasValue("W_COMORBIDS") ? $CurrentForm->getValue("W_COMORBIDS") : $CurrentForm->getValue("x_W_COMORBIDS");
        if (!$this->W_COMORBIDS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->W_COMORBIDS->Visible = false; // Disable update for API request
            } else {
                $this->W_COMORBIDS->setFormValue($val);
            }
        }

        // Check field name 'H_COMORBIDS' first before field var 'x_H_COMORBIDS'
        $val = $CurrentForm->hasValue("H_COMORBIDS") ? $CurrentForm->getValue("H_COMORBIDS") : $CurrentForm->getValue("x_H_COMORBIDS");
        if (!$this->H_COMORBIDS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->H_COMORBIDS->Visible = false; // Disable update for API request
            } else {
                $this->H_COMORBIDS->setFormValue($val);
            }
        }

        // Check field name 'SEXUAL_DYSFUNCTION' first before field var 'x_SEXUAL_DYSFUNCTION'
        $val = $CurrentForm->hasValue("SEXUAL_DYSFUNCTION") ? $CurrentForm->getValue("SEXUAL_DYSFUNCTION") : $CurrentForm->getValue("x_SEXUAL_DYSFUNCTION");
        if (!$this->SEXUAL_DYSFUNCTION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SEXUAL_DYSFUNCTION->Visible = false; // Disable update for API request
            } else {
                $this->SEXUAL_DYSFUNCTION->setFormValue($val);
            }
        }

        // Check field name 'TABLETS' first before field var 'x_TABLETS'
        $val = $CurrentForm->hasValue("TABLETS") ? $CurrentForm->getValue("TABLETS") : $CurrentForm->getValue("x_TABLETS");
        if (!$this->TABLETS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TABLETS->Visible = false; // Disable update for API request
            } else {
                $this->TABLETS->setFormValue($val);
            }
        }

        // Check field name 'FOLLICLE_STATUS' first before field var 'x_FOLLICLE_STATUS'
        $val = $CurrentForm->hasValue("FOLLICLE_STATUS") ? $CurrentForm->getValue("FOLLICLE_STATUS") : $CurrentForm->getValue("x_FOLLICLE_STATUS");
        if (!$this->FOLLICLE_STATUS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FOLLICLE_STATUS->Visible = false; // Disable update for API request
            } else {
                $this->FOLLICLE_STATUS->setFormValue($val);
            }
        }

        // Check field name 'NUMBER_OF_IUI' first before field var 'x_NUMBER_OF_IUI'
        $val = $CurrentForm->hasValue("NUMBER_OF_IUI") ? $CurrentForm->getValue("NUMBER_OF_IUI") : $CurrentForm->getValue("x_NUMBER_OF_IUI");
        if (!$this->NUMBER_OF_IUI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NUMBER_OF_IUI->Visible = false; // Disable update for API request
            } else {
                $this->NUMBER_OF_IUI->setFormValue($val);
            }
        }

        // Check field name 'PROCEDURE' first before field var 'x_PROCEDURE'
        $val = $CurrentForm->hasValue("PROCEDURE") ? $CurrentForm->getValue("PROCEDURE") : $CurrentForm->getValue("x_PROCEDURE");
        if (!$this->PROCEDURE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PROCEDURE->Visible = false; // Disable update for API request
            } else {
                $this->PROCEDURE->setFormValue($val);
            }
        }

        // Check field name 'LUTEAL_SUPPORT' first before field var 'x_LUTEAL_SUPPORT'
        $val = $CurrentForm->hasValue("LUTEAL_SUPPORT") ? $CurrentForm->getValue("LUTEAL_SUPPORT") : $CurrentForm->getValue("x_LUTEAL_SUPPORT");
        if (!$this->LUTEAL_SUPPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LUTEAL_SUPPORT->Visible = false; // Disable update for API request
            } else {
                $this->LUTEAL_SUPPORT->setFormValue($val);
            }
        }

        // Check field name 'SPECIFIC_MATERNAL_PROBLEMS' first before field var 'x_SPECIFIC_MATERNAL_PROBLEMS'
        $val = $CurrentForm->hasValue("SPECIFIC_MATERNAL_PROBLEMS") ? $CurrentForm->getValue("SPECIFIC_MATERNAL_PROBLEMS") : $CurrentForm->getValue("x_SPECIFIC_MATERNAL_PROBLEMS");
        if (!$this->SPECIFIC_MATERNAL_PROBLEMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->Visible = false; // Disable update for API request
            } else {
                $this->SPECIFIC_MATERNAL_PROBLEMS->setFormValue($val);
            }
        }

        // Check field name 'ONGOING_PREG' first before field var 'x_ONGOING_PREG'
        $val = $CurrentForm->hasValue("ONGOING_PREG") ? $CurrentForm->getValue("ONGOING_PREG") : $CurrentForm->getValue("x_ONGOING_PREG");
        if (!$this->ONGOING_PREG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ONGOING_PREG->Visible = false; // Disable update for API request
            } else {
                $this->ONGOING_PREG->setFormValue($val);
            }
        }

        // Check field name 'EDD_Date' first before field var 'x_EDD_Date'
        $val = $CurrentForm->hasValue("EDD_Date") ? $CurrentForm->getValue("EDD_Date") : $CurrentForm->getValue("x_EDD_Date");
        if (!$this->EDD_Date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EDD_Date->Visible = false; // Disable update for API request
            } else {
                $this->EDD_Date->setFormValue($val);
            }
            $this->EDD_Date->CurrentValue = UnFormatDateTime($this->EDD_Date->CurrentValue, 0);
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
        $this->FemaleFactor->CurrentValue = $this->FemaleFactor->FormValue;
        $this->MaleFactor->CurrentValue = $this->MaleFactor->FormValue;
        $this->Protocol->CurrentValue = $this->Protocol->FormValue;
        $this->SemenFrozen->CurrentValue = $this->SemenFrozen->FormValue;
        $this->A4ICSICycle->CurrentValue = $this->A4ICSICycle->FormValue;
        $this->TotalICSICycle->CurrentValue = $this->TotalICSICycle->FormValue;
        $this->TypeOfInfertility->CurrentValue = $this->TypeOfInfertility->FormValue;
        $this->Duration->CurrentValue = $this->Duration->FormValue;
        $this->LMP->CurrentValue = $this->LMP->FormValue;
        $this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
        $this->RelevantHistory->CurrentValue = $this->RelevantHistory->FormValue;
        $this->IUICycles->CurrentValue = $this->IUICycles->FormValue;
        $this->AFC->CurrentValue = $this->AFC->FormValue;
        $this->AMH->CurrentValue = $this->AMH->FormValue;
        $this->FBMI->CurrentValue = $this->FBMI->FormValue;
        $this->MBMI->CurrentValue = $this->MBMI->FormValue;
        $this->OvarianVolumeRT->CurrentValue = $this->OvarianVolumeRT->FormValue;
        $this->OvarianVolumeLT->CurrentValue = $this->OvarianVolumeLT->FormValue;
        $this->DAYSOFSTIMULATION->CurrentValue = $this->DAYSOFSTIMULATION->FormValue;
        $this->DOSEOFGONADOTROPINS->CurrentValue = $this->DOSEOFGONADOTROPINS->FormValue;
        $this->INJTYPE->CurrentValue = $this->INJTYPE->FormValue;
        $this->ANTAGONISTDAYS->CurrentValue = $this->ANTAGONISTDAYS->FormValue;
        $this->ANTAGONISTSTARTDAY->CurrentValue = $this->ANTAGONISTSTARTDAY->FormValue;
        $this->GROWTHHORMONE->CurrentValue = $this->GROWTHHORMONE->FormValue;
        $this->PRETREATMENT->CurrentValue = $this->PRETREATMENT->FormValue;
        $this->SerumP4->CurrentValue = $this->SerumP4->FormValue;
        $this->FORT->CurrentValue = $this->FORT->FormValue;
        $this->MedicalFactors->CurrentValue = $this->MedicalFactors->FormValue;
        $this->SCDate->CurrentValue = $this->SCDate->FormValue;
        $this->SCDate->CurrentValue = UnFormatDateTime($this->SCDate->CurrentValue, 0);
        $this->OvarianSurgery->CurrentValue = $this->OvarianSurgery->FormValue;
        $this->PreProcedureOrder->CurrentValue = $this->PreProcedureOrder->FormValue;
        $this->TRIGGERR->CurrentValue = $this->TRIGGERR->FormValue;
        $this->TRIGGERDATE->CurrentValue = $this->TRIGGERDATE->FormValue;
        $this->TRIGGERDATE->CurrentValue = UnFormatDateTime($this->TRIGGERDATE->CurrentValue, 0);
        $this->ATHOMEorCLINIC->CurrentValue = $this->ATHOMEorCLINIC->FormValue;
        $this->OPUDATE->CurrentValue = $this->OPUDATE->FormValue;
        $this->OPUDATE->CurrentValue = UnFormatDateTime($this->OPUDATE->CurrentValue, 0);
        $this->ALLFREEZEINDICATION->CurrentValue = $this->ALLFREEZEINDICATION->FormValue;
        $this->ERA->CurrentValue = $this->ERA->FormValue;
        $this->PGTA->CurrentValue = $this->PGTA->FormValue;
        $this->PGD->CurrentValue = $this->PGD->FormValue;
        $this->DATEOFET->CurrentValue = $this->DATEOFET->FormValue;
        $this->DATEOFET->CurrentValue = UnFormatDateTime($this->DATEOFET->CurrentValue, 0);
        $this->ET->CurrentValue = $this->ET->FormValue;
        $this->ESET->CurrentValue = $this->ESET->FormValue;
        $this->DOET->CurrentValue = $this->DOET->FormValue;
        $this->SEMENPREPARATION->CurrentValue = $this->SEMENPREPARATION->FormValue;
        $this->REASONFORESET->CurrentValue = $this->REASONFORESET->FormValue;
        $this->Expectedoocytes->CurrentValue = $this->Expectedoocytes->FormValue;
        $this->StChDate1->CurrentValue = $this->StChDate1->FormValue;
        $this->StChDate1->CurrentValue = UnFormatDateTime($this->StChDate1->CurrentValue, 0);
        $this->StChDate2->CurrentValue = $this->StChDate2->FormValue;
        $this->StChDate2->CurrentValue = UnFormatDateTime($this->StChDate2->CurrentValue, 0);
        $this->StChDate3->CurrentValue = $this->StChDate3->FormValue;
        $this->StChDate3->CurrentValue = UnFormatDateTime($this->StChDate3->CurrentValue, 0);
        $this->StChDate4->CurrentValue = $this->StChDate4->FormValue;
        $this->StChDate4->CurrentValue = UnFormatDateTime($this->StChDate4->CurrentValue, 0);
        $this->StChDate5->CurrentValue = $this->StChDate5->FormValue;
        $this->StChDate5->CurrentValue = UnFormatDateTime($this->StChDate5->CurrentValue, 0);
        $this->StChDate6->CurrentValue = $this->StChDate6->FormValue;
        $this->StChDate6->CurrentValue = UnFormatDateTime($this->StChDate6->CurrentValue, 0);
        $this->StChDate7->CurrentValue = $this->StChDate7->FormValue;
        $this->StChDate7->CurrentValue = UnFormatDateTime($this->StChDate7->CurrentValue, 0);
        $this->StChDate8->CurrentValue = $this->StChDate8->FormValue;
        $this->StChDate8->CurrentValue = UnFormatDateTime($this->StChDate8->CurrentValue, 0);
        $this->StChDate9->CurrentValue = $this->StChDate9->FormValue;
        $this->StChDate9->CurrentValue = UnFormatDateTime($this->StChDate9->CurrentValue, 0);
        $this->StChDate10->CurrentValue = $this->StChDate10->FormValue;
        $this->StChDate10->CurrentValue = UnFormatDateTime($this->StChDate10->CurrentValue, 0);
        $this->StChDate11->CurrentValue = $this->StChDate11->FormValue;
        $this->StChDate11->CurrentValue = UnFormatDateTime($this->StChDate11->CurrentValue, 0);
        $this->StChDate12->CurrentValue = $this->StChDate12->FormValue;
        $this->StChDate12->CurrentValue = UnFormatDateTime($this->StChDate12->CurrentValue, 0);
        $this->StChDate13->CurrentValue = $this->StChDate13->FormValue;
        $this->StChDate13->CurrentValue = UnFormatDateTime($this->StChDate13->CurrentValue, 0);
        $this->CycleDay1->CurrentValue = $this->CycleDay1->FormValue;
        $this->CycleDay2->CurrentValue = $this->CycleDay2->FormValue;
        $this->CycleDay3->CurrentValue = $this->CycleDay3->FormValue;
        $this->CycleDay4->CurrentValue = $this->CycleDay4->FormValue;
        $this->CycleDay5->CurrentValue = $this->CycleDay5->FormValue;
        $this->CycleDay6->CurrentValue = $this->CycleDay6->FormValue;
        $this->CycleDay7->CurrentValue = $this->CycleDay7->FormValue;
        $this->CycleDay8->CurrentValue = $this->CycleDay8->FormValue;
        $this->CycleDay9->CurrentValue = $this->CycleDay9->FormValue;
        $this->CycleDay10->CurrentValue = $this->CycleDay10->FormValue;
        $this->CycleDay11->CurrentValue = $this->CycleDay11->FormValue;
        $this->CycleDay12->CurrentValue = $this->CycleDay12->FormValue;
        $this->CycleDay13->CurrentValue = $this->CycleDay13->FormValue;
        $this->StimulationDay1->CurrentValue = $this->StimulationDay1->FormValue;
        $this->StimulationDay2->CurrentValue = $this->StimulationDay2->FormValue;
        $this->StimulationDay3->CurrentValue = $this->StimulationDay3->FormValue;
        $this->StimulationDay4->CurrentValue = $this->StimulationDay4->FormValue;
        $this->StimulationDay5->CurrentValue = $this->StimulationDay5->FormValue;
        $this->StimulationDay6->CurrentValue = $this->StimulationDay6->FormValue;
        $this->StimulationDay7->CurrentValue = $this->StimulationDay7->FormValue;
        $this->StimulationDay8->CurrentValue = $this->StimulationDay8->FormValue;
        $this->StimulationDay9->CurrentValue = $this->StimulationDay9->FormValue;
        $this->StimulationDay10->CurrentValue = $this->StimulationDay10->FormValue;
        $this->StimulationDay11->CurrentValue = $this->StimulationDay11->FormValue;
        $this->StimulationDay12->CurrentValue = $this->StimulationDay12->FormValue;
        $this->StimulationDay13->CurrentValue = $this->StimulationDay13->FormValue;
        $this->Tablet1->CurrentValue = $this->Tablet1->FormValue;
        $this->Tablet2->CurrentValue = $this->Tablet2->FormValue;
        $this->Tablet3->CurrentValue = $this->Tablet3->FormValue;
        $this->Tablet4->CurrentValue = $this->Tablet4->FormValue;
        $this->Tablet5->CurrentValue = $this->Tablet5->FormValue;
        $this->Tablet6->CurrentValue = $this->Tablet6->FormValue;
        $this->Tablet7->CurrentValue = $this->Tablet7->FormValue;
        $this->Tablet8->CurrentValue = $this->Tablet8->FormValue;
        $this->Tablet9->CurrentValue = $this->Tablet9->FormValue;
        $this->Tablet10->CurrentValue = $this->Tablet10->FormValue;
        $this->Tablet11->CurrentValue = $this->Tablet11->FormValue;
        $this->Tablet12->CurrentValue = $this->Tablet12->FormValue;
        $this->Tablet13->CurrentValue = $this->Tablet13->FormValue;
        $this->RFSH1->CurrentValue = $this->RFSH1->FormValue;
        $this->RFSH2->CurrentValue = $this->RFSH2->FormValue;
        $this->RFSH3->CurrentValue = $this->RFSH3->FormValue;
        $this->RFSH4->CurrentValue = $this->RFSH4->FormValue;
        $this->RFSH5->CurrentValue = $this->RFSH5->FormValue;
        $this->RFSH6->CurrentValue = $this->RFSH6->FormValue;
        $this->RFSH7->CurrentValue = $this->RFSH7->FormValue;
        $this->RFSH8->CurrentValue = $this->RFSH8->FormValue;
        $this->RFSH9->CurrentValue = $this->RFSH9->FormValue;
        $this->RFSH10->CurrentValue = $this->RFSH10->FormValue;
        $this->RFSH11->CurrentValue = $this->RFSH11->FormValue;
        $this->RFSH12->CurrentValue = $this->RFSH12->FormValue;
        $this->RFSH13->CurrentValue = $this->RFSH13->FormValue;
        $this->HMG1->CurrentValue = $this->HMG1->FormValue;
        $this->HMG2->CurrentValue = $this->HMG2->FormValue;
        $this->HMG3->CurrentValue = $this->HMG3->FormValue;
        $this->HMG4->CurrentValue = $this->HMG4->FormValue;
        $this->HMG5->CurrentValue = $this->HMG5->FormValue;
        $this->HMG6->CurrentValue = $this->HMG6->FormValue;
        $this->HMG7->CurrentValue = $this->HMG7->FormValue;
        $this->HMG8->CurrentValue = $this->HMG8->FormValue;
        $this->HMG9->CurrentValue = $this->HMG9->FormValue;
        $this->HMG10->CurrentValue = $this->HMG10->FormValue;
        $this->HMG11->CurrentValue = $this->HMG11->FormValue;
        $this->HMG12->CurrentValue = $this->HMG12->FormValue;
        $this->HMG13->CurrentValue = $this->HMG13->FormValue;
        $this->GnRH1->CurrentValue = $this->GnRH1->FormValue;
        $this->GnRH2->CurrentValue = $this->GnRH2->FormValue;
        $this->GnRH3->CurrentValue = $this->GnRH3->FormValue;
        $this->GnRH4->CurrentValue = $this->GnRH4->FormValue;
        $this->GnRH5->CurrentValue = $this->GnRH5->FormValue;
        $this->GnRH6->CurrentValue = $this->GnRH6->FormValue;
        $this->GnRH7->CurrentValue = $this->GnRH7->FormValue;
        $this->GnRH8->CurrentValue = $this->GnRH8->FormValue;
        $this->GnRH9->CurrentValue = $this->GnRH9->FormValue;
        $this->GnRH10->CurrentValue = $this->GnRH10->FormValue;
        $this->GnRH11->CurrentValue = $this->GnRH11->FormValue;
        $this->GnRH12->CurrentValue = $this->GnRH12->FormValue;
        $this->GnRH13->CurrentValue = $this->GnRH13->FormValue;
        $this->E21->CurrentValue = $this->E21->FormValue;
        $this->E22->CurrentValue = $this->E22->FormValue;
        $this->E23->CurrentValue = $this->E23->FormValue;
        $this->E24->CurrentValue = $this->E24->FormValue;
        $this->E25->CurrentValue = $this->E25->FormValue;
        $this->E26->CurrentValue = $this->E26->FormValue;
        $this->E27->CurrentValue = $this->E27->FormValue;
        $this->E28->CurrentValue = $this->E28->FormValue;
        $this->E29->CurrentValue = $this->E29->FormValue;
        $this->E210->CurrentValue = $this->E210->FormValue;
        $this->E211->CurrentValue = $this->E211->FormValue;
        $this->E212->CurrentValue = $this->E212->FormValue;
        $this->E213->CurrentValue = $this->E213->FormValue;
        $this->P41->CurrentValue = $this->P41->FormValue;
        $this->P42->CurrentValue = $this->P42->FormValue;
        $this->P43->CurrentValue = $this->P43->FormValue;
        $this->P44->CurrentValue = $this->P44->FormValue;
        $this->P45->CurrentValue = $this->P45->FormValue;
        $this->P46->CurrentValue = $this->P46->FormValue;
        $this->P47->CurrentValue = $this->P47->FormValue;
        $this->P48->CurrentValue = $this->P48->FormValue;
        $this->P49->CurrentValue = $this->P49->FormValue;
        $this->P410->CurrentValue = $this->P410->FormValue;
        $this->P411->CurrentValue = $this->P411->FormValue;
        $this->P412->CurrentValue = $this->P412->FormValue;
        $this->P413->CurrentValue = $this->P413->FormValue;
        $this->USGRt1->CurrentValue = $this->USGRt1->FormValue;
        $this->USGRt2->CurrentValue = $this->USGRt2->FormValue;
        $this->USGRt3->CurrentValue = $this->USGRt3->FormValue;
        $this->USGRt4->CurrentValue = $this->USGRt4->FormValue;
        $this->USGRt5->CurrentValue = $this->USGRt5->FormValue;
        $this->USGRt6->CurrentValue = $this->USGRt6->FormValue;
        $this->USGRt7->CurrentValue = $this->USGRt7->FormValue;
        $this->USGRt8->CurrentValue = $this->USGRt8->FormValue;
        $this->USGRt9->CurrentValue = $this->USGRt9->FormValue;
        $this->USGRt10->CurrentValue = $this->USGRt10->FormValue;
        $this->USGRt11->CurrentValue = $this->USGRt11->FormValue;
        $this->USGRt12->CurrentValue = $this->USGRt12->FormValue;
        $this->USGRt13->CurrentValue = $this->USGRt13->FormValue;
        $this->USGLt1->CurrentValue = $this->USGLt1->FormValue;
        $this->USGLt2->CurrentValue = $this->USGLt2->FormValue;
        $this->USGLt3->CurrentValue = $this->USGLt3->FormValue;
        $this->USGLt4->CurrentValue = $this->USGLt4->FormValue;
        $this->USGLt5->CurrentValue = $this->USGLt5->FormValue;
        $this->USGLt6->CurrentValue = $this->USGLt6->FormValue;
        $this->USGLt7->CurrentValue = $this->USGLt7->FormValue;
        $this->USGLt8->CurrentValue = $this->USGLt8->FormValue;
        $this->USGLt9->CurrentValue = $this->USGLt9->FormValue;
        $this->USGLt10->CurrentValue = $this->USGLt10->FormValue;
        $this->USGLt11->CurrentValue = $this->USGLt11->FormValue;
        $this->USGLt12->CurrentValue = $this->USGLt12->FormValue;
        $this->USGLt13->CurrentValue = $this->USGLt13->FormValue;
        $this->EM1->CurrentValue = $this->EM1->FormValue;
        $this->EM2->CurrentValue = $this->EM2->FormValue;
        $this->EM3->CurrentValue = $this->EM3->FormValue;
        $this->EM4->CurrentValue = $this->EM4->FormValue;
        $this->EM5->CurrentValue = $this->EM5->FormValue;
        $this->EM6->CurrentValue = $this->EM6->FormValue;
        $this->EM7->CurrentValue = $this->EM7->FormValue;
        $this->EM8->CurrentValue = $this->EM8->FormValue;
        $this->EM9->CurrentValue = $this->EM9->FormValue;
        $this->EM10->CurrentValue = $this->EM10->FormValue;
        $this->EM11->CurrentValue = $this->EM11->FormValue;
        $this->EM12->CurrentValue = $this->EM12->FormValue;
        $this->EM13->CurrentValue = $this->EM13->FormValue;
        $this->Others1->CurrentValue = $this->Others1->FormValue;
        $this->Others2->CurrentValue = $this->Others2->FormValue;
        $this->Others3->CurrentValue = $this->Others3->FormValue;
        $this->Others4->CurrentValue = $this->Others4->FormValue;
        $this->Others5->CurrentValue = $this->Others5->FormValue;
        $this->Others6->CurrentValue = $this->Others6->FormValue;
        $this->Others7->CurrentValue = $this->Others7->FormValue;
        $this->Others8->CurrentValue = $this->Others8->FormValue;
        $this->Others9->CurrentValue = $this->Others9->FormValue;
        $this->Others10->CurrentValue = $this->Others10->FormValue;
        $this->Others11->CurrentValue = $this->Others11->FormValue;
        $this->Others12->CurrentValue = $this->Others12->FormValue;
        $this->Others13->CurrentValue = $this->Others13->FormValue;
        $this->DR1->CurrentValue = $this->DR1->FormValue;
        $this->DR2->CurrentValue = $this->DR2->FormValue;
        $this->DR3->CurrentValue = $this->DR3->FormValue;
        $this->DR4->CurrentValue = $this->DR4->FormValue;
        $this->DR5->CurrentValue = $this->DR5->FormValue;
        $this->DR6->CurrentValue = $this->DR6->FormValue;
        $this->DR7->CurrentValue = $this->DR7->FormValue;
        $this->DR8->CurrentValue = $this->DR8->FormValue;
        $this->DR9->CurrentValue = $this->DR9->FormValue;
        $this->DR10->CurrentValue = $this->DR10->FormValue;
        $this->DR11->CurrentValue = $this->DR11->FormValue;
        $this->DR12->CurrentValue = $this->DR12->FormValue;
        $this->DR13->CurrentValue = $this->DR13->FormValue;
        $this->DOCTORRESPONSIBLE->CurrentValue = $this->DOCTORRESPONSIBLE->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Convert->CurrentValue = $this->Convert->FormValue;
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
        $this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
        $this->Hysteroscopy->CurrentValue = $this->Hysteroscopy->FormValue;
        $this->EndometrialScratching->CurrentValue = $this->EndometrialScratching->FormValue;
        $this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
        $this->CYCLETYPE->CurrentValue = $this->CYCLETYPE->FormValue;
        $this->HRTCYCLE->CurrentValue = $this->HRTCYCLE->FormValue;
        $this->OralEstrogenDosage->CurrentValue = $this->OralEstrogenDosage->FormValue;
        $this->VaginalEstrogen->CurrentValue = $this->VaginalEstrogen->FormValue;
        $this->GCSF->CurrentValue = $this->GCSF->FormValue;
        $this->ActivatedPRP->CurrentValue = $this->ActivatedPRP->FormValue;
        $this->UCLcm->CurrentValue = $this->UCLcm->FormValue;
        $this->DATOFEMBRYOTRANSFER->CurrentValue = $this->DATOFEMBRYOTRANSFER->FormValue;
        $this->DATOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATOFEMBRYOTRANSFER->CurrentValue, 0);
        $this->DAYOFEMBRYOTRANSFER->CurrentValue = $this->DAYOFEMBRYOTRANSFER->FormValue;
        $this->NOOFEMBRYOSTHAWED->CurrentValue = $this->NOOFEMBRYOSTHAWED->FormValue;
        $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = $this->NOOFEMBRYOSTRANSFERRED->FormValue;
        $this->DAYOFEMBRYOS->CurrentValue = $this->DAYOFEMBRYOS->FormValue;
        $this->CRYOPRESERVEDEMBRYOS->CurrentValue = $this->CRYOPRESERVEDEMBRYOS->FormValue;
        $this->ViaAdmin->CurrentValue = $this->ViaAdmin->FormValue;
        $this->ViaStartDateTime->CurrentValue = $this->ViaStartDateTime->FormValue;
        $this->ViaStartDateTime->CurrentValue = UnFormatDateTime($this->ViaStartDateTime->CurrentValue, 0);
        $this->ViaDose->CurrentValue = $this->ViaDose->FormValue;
        $this->AllFreeze->CurrentValue = $this->AllFreeze->FormValue;
        $this->TreatmentCancel->CurrentValue = $this->TreatmentCancel->FormValue;
        $this->Reason->CurrentValue = $this->Reason->FormValue;
        $this->ProgesteroneAdmin->CurrentValue = $this->ProgesteroneAdmin->FormValue;
        $this->ProgesteroneStart->CurrentValue = $this->ProgesteroneStart->FormValue;
        $this->ProgesteroneDose->CurrentValue = $this->ProgesteroneDose->FormValue;
        $this->StChDate14->CurrentValue = $this->StChDate14->FormValue;
        $this->StChDate14->CurrentValue = UnFormatDateTime($this->StChDate14->CurrentValue, 0);
        $this->StChDate15->CurrentValue = $this->StChDate15->FormValue;
        $this->StChDate15->CurrentValue = UnFormatDateTime($this->StChDate15->CurrentValue, 0);
        $this->StChDate16->CurrentValue = $this->StChDate16->FormValue;
        $this->StChDate16->CurrentValue = UnFormatDateTime($this->StChDate16->CurrentValue, 0);
        $this->StChDate17->CurrentValue = $this->StChDate17->FormValue;
        $this->StChDate17->CurrentValue = UnFormatDateTime($this->StChDate17->CurrentValue, 0);
        $this->StChDate18->CurrentValue = $this->StChDate18->FormValue;
        $this->StChDate18->CurrentValue = UnFormatDateTime($this->StChDate18->CurrentValue, 0);
        $this->StChDate19->CurrentValue = $this->StChDate19->FormValue;
        $this->StChDate19->CurrentValue = UnFormatDateTime($this->StChDate19->CurrentValue, 0);
        $this->StChDate20->CurrentValue = $this->StChDate20->FormValue;
        $this->StChDate20->CurrentValue = UnFormatDateTime($this->StChDate20->CurrentValue, 0);
        $this->StChDate21->CurrentValue = $this->StChDate21->FormValue;
        $this->StChDate21->CurrentValue = UnFormatDateTime($this->StChDate21->CurrentValue, 0);
        $this->StChDate22->CurrentValue = $this->StChDate22->FormValue;
        $this->StChDate22->CurrentValue = UnFormatDateTime($this->StChDate22->CurrentValue, 0);
        $this->StChDate23->CurrentValue = $this->StChDate23->FormValue;
        $this->StChDate23->CurrentValue = UnFormatDateTime($this->StChDate23->CurrentValue, 0);
        $this->StChDate24->CurrentValue = $this->StChDate24->FormValue;
        $this->StChDate24->CurrentValue = UnFormatDateTime($this->StChDate24->CurrentValue, 0);
        $this->StChDate25->CurrentValue = $this->StChDate25->FormValue;
        $this->StChDate25->CurrentValue = UnFormatDateTime($this->StChDate25->CurrentValue, 0);
        $this->CycleDay14->CurrentValue = $this->CycleDay14->FormValue;
        $this->CycleDay15->CurrentValue = $this->CycleDay15->FormValue;
        $this->CycleDay16->CurrentValue = $this->CycleDay16->FormValue;
        $this->CycleDay17->CurrentValue = $this->CycleDay17->FormValue;
        $this->CycleDay18->CurrentValue = $this->CycleDay18->FormValue;
        $this->CycleDay19->CurrentValue = $this->CycleDay19->FormValue;
        $this->CycleDay20->CurrentValue = $this->CycleDay20->FormValue;
        $this->CycleDay21->CurrentValue = $this->CycleDay21->FormValue;
        $this->CycleDay22->CurrentValue = $this->CycleDay22->FormValue;
        $this->CycleDay23->CurrentValue = $this->CycleDay23->FormValue;
        $this->CycleDay24->CurrentValue = $this->CycleDay24->FormValue;
        $this->CycleDay25->CurrentValue = $this->CycleDay25->FormValue;
        $this->StimulationDay14->CurrentValue = $this->StimulationDay14->FormValue;
        $this->StimulationDay15->CurrentValue = $this->StimulationDay15->FormValue;
        $this->StimulationDay16->CurrentValue = $this->StimulationDay16->FormValue;
        $this->StimulationDay17->CurrentValue = $this->StimulationDay17->FormValue;
        $this->StimulationDay18->CurrentValue = $this->StimulationDay18->FormValue;
        $this->StimulationDay19->CurrentValue = $this->StimulationDay19->FormValue;
        $this->StimulationDay20->CurrentValue = $this->StimulationDay20->FormValue;
        $this->StimulationDay21->CurrentValue = $this->StimulationDay21->FormValue;
        $this->StimulationDay22->CurrentValue = $this->StimulationDay22->FormValue;
        $this->StimulationDay23->CurrentValue = $this->StimulationDay23->FormValue;
        $this->StimulationDay24->CurrentValue = $this->StimulationDay24->FormValue;
        $this->StimulationDay25->CurrentValue = $this->StimulationDay25->FormValue;
        $this->Tablet14->CurrentValue = $this->Tablet14->FormValue;
        $this->Tablet15->CurrentValue = $this->Tablet15->FormValue;
        $this->Tablet16->CurrentValue = $this->Tablet16->FormValue;
        $this->Tablet17->CurrentValue = $this->Tablet17->FormValue;
        $this->Tablet18->CurrentValue = $this->Tablet18->FormValue;
        $this->Tablet19->CurrentValue = $this->Tablet19->FormValue;
        $this->Tablet20->CurrentValue = $this->Tablet20->FormValue;
        $this->Tablet21->CurrentValue = $this->Tablet21->FormValue;
        $this->Tablet22->CurrentValue = $this->Tablet22->FormValue;
        $this->Tablet23->CurrentValue = $this->Tablet23->FormValue;
        $this->Tablet24->CurrentValue = $this->Tablet24->FormValue;
        $this->Tablet25->CurrentValue = $this->Tablet25->FormValue;
        $this->RFSH14->CurrentValue = $this->RFSH14->FormValue;
        $this->RFSH15->CurrentValue = $this->RFSH15->FormValue;
        $this->RFSH16->CurrentValue = $this->RFSH16->FormValue;
        $this->RFSH17->CurrentValue = $this->RFSH17->FormValue;
        $this->RFSH18->CurrentValue = $this->RFSH18->FormValue;
        $this->RFSH19->CurrentValue = $this->RFSH19->FormValue;
        $this->RFSH20->CurrentValue = $this->RFSH20->FormValue;
        $this->RFSH21->CurrentValue = $this->RFSH21->FormValue;
        $this->RFSH22->CurrentValue = $this->RFSH22->FormValue;
        $this->RFSH23->CurrentValue = $this->RFSH23->FormValue;
        $this->RFSH24->CurrentValue = $this->RFSH24->FormValue;
        $this->RFSH25->CurrentValue = $this->RFSH25->FormValue;
        $this->HMG14->CurrentValue = $this->HMG14->FormValue;
        $this->HMG15->CurrentValue = $this->HMG15->FormValue;
        $this->HMG16->CurrentValue = $this->HMG16->FormValue;
        $this->HMG17->CurrentValue = $this->HMG17->FormValue;
        $this->HMG18->CurrentValue = $this->HMG18->FormValue;
        $this->HMG19->CurrentValue = $this->HMG19->FormValue;
        $this->HMG20->CurrentValue = $this->HMG20->FormValue;
        $this->HMG21->CurrentValue = $this->HMG21->FormValue;
        $this->HMG22->CurrentValue = $this->HMG22->FormValue;
        $this->HMG23->CurrentValue = $this->HMG23->FormValue;
        $this->HMG24->CurrentValue = $this->HMG24->FormValue;
        $this->HMG25->CurrentValue = $this->HMG25->FormValue;
        $this->GnRH14->CurrentValue = $this->GnRH14->FormValue;
        $this->GnRH15->CurrentValue = $this->GnRH15->FormValue;
        $this->GnRH16->CurrentValue = $this->GnRH16->FormValue;
        $this->GnRH17->CurrentValue = $this->GnRH17->FormValue;
        $this->GnRH18->CurrentValue = $this->GnRH18->FormValue;
        $this->GnRH19->CurrentValue = $this->GnRH19->FormValue;
        $this->GnRH20->CurrentValue = $this->GnRH20->FormValue;
        $this->GnRH21->CurrentValue = $this->GnRH21->FormValue;
        $this->GnRH22->CurrentValue = $this->GnRH22->FormValue;
        $this->GnRH23->CurrentValue = $this->GnRH23->FormValue;
        $this->GnRH24->CurrentValue = $this->GnRH24->FormValue;
        $this->GnRH25->CurrentValue = $this->GnRH25->FormValue;
        $this->P414->CurrentValue = $this->P414->FormValue;
        $this->P415->CurrentValue = $this->P415->FormValue;
        $this->P416->CurrentValue = $this->P416->FormValue;
        $this->P417->CurrentValue = $this->P417->FormValue;
        $this->P418->CurrentValue = $this->P418->FormValue;
        $this->P419->CurrentValue = $this->P419->FormValue;
        $this->P420->CurrentValue = $this->P420->FormValue;
        $this->P421->CurrentValue = $this->P421->FormValue;
        $this->P422->CurrentValue = $this->P422->FormValue;
        $this->P423->CurrentValue = $this->P423->FormValue;
        $this->P424->CurrentValue = $this->P424->FormValue;
        $this->P425->CurrentValue = $this->P425->FormValue;
        $this->USGRt14->CurrentValue = $this->USGRt14->FormValue;
        $this->USGRt15->CurrentValue = $this->USGRt15->FormValue;
        $this->USGRt16->CurrentValue = $this->USGRt16->FormValue;
        $this->USGRt17->CurrentValue = $this->USGRt17->FormValue;
        $this->USGRt18->CurrentValue = $this->USGRt18->FormValue;
        $this->USGRt19->CurrentValue = $this->USGRt19->FormValue;
        $this->USGRt20->CurrentValue = $this->USGRt20->FormValue;
        $this->USGRt21->CurrentValue = $this->USGRt21->FormValue;
        $this->USGRt22->CurrentValue = $this->USGRt22->FormValue;
        $this->USGRt23->CurrentValue = $this->USGRt23->FormValue;
        $this->USGRt24->CurrentValue = $this->USGRt24->FormValue;
        $this->USGRt25->CurrentValue = $this->USGRt25->FormValue;
        $this->USGLt14->CurrentValue = $this->USGLt14->FormValue;
        $this->USGLt15->CurrentValue = $this->USGLt15->FormValue;
        $this->USGLt16->CurrentValue = $this->USGLt16->FormValue;
        $this->USGLt17->CurrentValue = $this->USGLt17->FormValue;
        $this->USGLt18->CurrentValue = $this->USGLt18->FormValue;
        $this->USGLt19->CurrentValue = $this->USGLt19->FormValue;
        $this->USGLt20->CurrentValue = $this->USGLt20->FormValue;
        $this->USGLt21->CurrentValue = $this->USGLt21->FormValue;
        $this->USGLt22->CurrentValue = $this->USGLt22->FormValue;
        $this->USGLt23->CurrentValue = $this->USGLt23->FormValue;
        $this->USGLt24->CurrentValue = $this->USGLt24->FormValue;
        $this->USGLt25->CurrentValue = $this->USGLt25->FormValue;
        $this->EM14->CurrentValue = $this->EM14->FormValue;
        $this->EM15->CurrentValue = $this->EM15->FormValue;
        $this->EM16->CurrentValue = $this->EM16->FormValue;
        $this->EM17->CurrentValue = $this->EM17->FormValue;
        $this->EM18->CurrentValue = $this->EM18->FormValue;
        $this->EM19->CurrentValue = $this->EM19->FormValue;
        $this->EM20->CurrentValue = $this->EM20->FormValue;
        $this->EM21->CurrentValue = $this->EM21->FormValue;
        $this->EM22->CurrentValue = $this->EM22->FormValue;
        $this->EM23->CurrentValue = $this->EM23->FormValue;
        $this->EM24->CurrentValue = $this->EM24->FormValue;
        $this->EM25->CurrentValue = $this->EM25->FormValue;
        $this->Others14->CurrentValue = $this->Others14->FormValue;
        $this->Others15->CurrentValue = $this->Others15->FormValue;
        $this->Others16->CurrentValue = $this->Others16->FormValue;
        $this->Others17->CurrentValue = $this->Others17->FormValue;
        $this->Others18->CurrentValue = $this->Others18->FormValue;
        $this->Others19->CurrentValue = $this->Others19->FormValue;
        $this->Others20->CurrentValue = $this->Others20->FormValue;
        $this->Others21->CurrentValue = $this->Others21->FormValue;
        $this->Others22->CurrentValue = $this->Others22->FormValue;
        $this->Others23->CurrentValue = $this->Others23->FormValue;
        $this->Others24->CurrentValue = $this->Others24->FormValue;
        $this->Others25->CurrentValue = $this->Others25->FormValue;
        $this->DR14->CurrentValue = $this->DR14->FormValue;
        $this->DR15->CurrentValue = $this->DR15->FormValue;
        $this->DR16->CurrentValue = $this->DR16->FormValue;
        $this->DR17->CurrentValue = $this->DR17->FormValue;
        $this->DR18->CurrentValue = $this->DR18->FormValue;
        $this->DR19->CurrentValue = $this->DR19->FormValue;
        $this->DR20->CurrentValue = $this->DR20->FormValue;
        $this->DR21->CurrentValue = $this->DR21->FormValue;
        $this->DR22->CurrentValue = $this->DR22->FormValue;
        $this->DR23->CurrentValue = $this->DR23->FormValue;
        $this->DR24->CurrentValue = $this->DR24->FormValue;
        $this->DR25->CurrentValue = $this->DR25->FormValue;
        $this->E214->CurrentValue = $this->E214->FormValue;
        $this->E215->CurrentValue = $this->E215->FormValue;
        $this->E216->CurrentValue = $this->E216->FormValue;
        $this->E217->CurrentValue = $this->E217->FormValue;
        $this->E218->CurrentValue = $this->E218->FormValue;
        $this->E219->CurrentValue = $this->E219->FormValue;
        $this->E220->CurrentValue = $this->E220->FormValue;
        $this->E221->CurrentValue = $this->E221->FormValue;
        $this->E222->CurrentValue = $this->E222->FormValue;
        $this->E223->CurrentValue = $this->E223->FormValue;
        $this->E224->CurrentValue = $this->E224->FormValue;
        $this->E225->CurrentValue = $this->E225->FormValue;
        $this->EEETTTDTE->CurrentValue = $this->EEETTTDTE->FormValue;
        $this->EEETTTDTE->CurrentValue = UnFormatDateTime($this->EEETTTDTE->CurrentValue, 0);
        $this->bhcgdate->CurrentValue = $this->bhcgdate->FormValue;
        $this->bhcgdate->CurrentValue = UnFormatDateTime($this->bhcgdate->CurrentValue, 0);
        $this->TUBAL_PATENCY->CurrentValue = $this->TUBAL_PATENCY->FormValue;
        $this->HSG->CurrentValue = $this->HSG->FormValue;
        $this->DHL->CurrentValue = $this->DHL->FormValue;
        $this->UTERINE_PROBLEMS->CurrentValue = $this->UTERINE_PROBLEMS->FormValue;
        $this->W_COMORBIDS->CurrentValue = $this->W_COMORBIDS->FormValue;
        $this->H_COMORBIDS->CurrentValue = $this->H_COMORBIDS->FormValue;
        $this->SEXUAL_DYSFUNCTION->CurrentValue = $this->SEXUAL_DYSFUNCTION->FormValue;
        $this->TABLETS->CurrentValue = $this->TABLETS->FormValue;
        $this->FOLLICLE_STATUS->CurrentValue = $this->FOLLICLE_STATUS->FormValue;
        $this->NUMBER_OF_IUI->CurrentValue = $this->NUMBER_OF_IUI->FormValue;
        $this->PROCEDURE->CurrentValue = $this->PROCEDURE->FormValue;
        $this->LUTEAL_SUPPORT->CurrentValue = $this->LUTEAL_SUPPORT->FormValue;
        $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue = $this->SPECIFIC_MATERNAL_PROBLEMS->FormValue;
        $this->ONGOING_PREG->CurrentValue = $this->ONGOING_PREG->FormValue;
        $this->EDD_Date->CurrentValue = $this->EDD_Date->FormValue;
        $this->EDD_Date->CurrentValue = UnFormatDateTime($this->EDD_Date->CurrentValue, 0);
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
        $this->FemaleFactor->setDbValue($row['FemaleFactor']);
        $this->MaleFactor->setDbValue($row['MaleFactor']);
        $this->Protocol->setDbValue($row['Protocol']);
        $this->SemenFrozen->setDbValue($row['SemenFrozen']);
        $this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
        $this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
        $this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
        $this->Duration->setDbValue($row['Duration']);
        $this->LMP->setDbValue($row['LMP']);
        $this->RelevantHistory->setDbValue($row['RelevantHistory']);
        $this->IUICycles->setDbValue($row['IUICycles']);
        $this->AFC->setDbValue($row['AFC']);
        $this->AMH->setDbValue($row['AMH']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->OvarianVolumeRT->setDbValue($row['OvarianVolumeRT']);
        $this->OvarianVolumeLT->setDbValue($row['OvarianVolumeLT']);
        $this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
        $this->DOSEOFGONADOTROPINS->setDbValue($row['DOSEOFGONADOTROPINS']);
        $this->INJTYPE->setDbValue($row['INJTYPE']);
        $this->ANTAGONISTDAYS->setDbValue($row['ANTAGONISTDAYS']);
        $this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
        $this->GROWTHHORMONE->setDbValue($row['GROWTHHORMONE']);
        $this->PRETREATMENT->setDbValue($row['PRETREATMENT']);
        $this->SerumP4->setDbValue($row['SerumP4']);
        $this->FORT->setDbValue($row['FORT']);
        $this->MedicalFactors->setDbValue($row['MedicalFactors']);
        $this->SCDate->setDbValue($row['SCDate']);
        $this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
        $this->PreProcedureOrder->setDbValue($row['PreProcedureOrder']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
        $this->ATHOMEorCLINIC->setDbValue($row['ATHOMEorCLINIC']);
        $this->OPUDATE->setDbValue($row['OPUDATE']);
        $this->ALLFREEZEINDICATION->setDbValue($row['ALLFREEZEINDICATION']);
        $this->ERA->setDbValue($row['ERA']);
        $this->PGTA->setDbValue($row['PGTA']);
        $this->PGD->setDbValue($row['PGD']);
        $this->DATEOFET->setDbValue($row['DATEOFET']);
        $this->ET->setDbValue($row['ET']);
        $this->ESET->setDbValue($row['ESET']);
        $this->DOET->setDbValue($row['DOET']);
        $this->SEMENPREPARATION->setDbValue($row['SEMENPREPARATION']);
        $this->REASONFORESET->setDbValue($row['REASONFORESET']);
        $this->Expectedoocytes->setDbValue($row['Expectedoocytes']);
        $this->StChDate1->setDbValue($row['StChDate1']);
        $this->StChDate2->setDbValue($row['StChDate2']);
        $this->StChDate3->setDbValue($row['StChDate3']);
        $this->StChDate4->setDbValue($row['StChDate4']);
        $this->StChDate5->setDbValue($row['StChDate5']);
        $this->StChDate6->setDbValue($row['StChDate6']);
        $this->StChDate7->setDbValue($row['StChDate7']);
        $this->StChDate8->setDbValue($row['StChDate8']);
        $this->StChDate9->setDbValue($row['StChDate9']);
        $this->StChDate10->setDbValue($row['StChDate10']);
        $this->StChDate11->setDbValue($row['StChDate11']);
        $this->StChDate12->setDbValue($row['StChDate12']);
        $this->StChDate13->setDbValue($row['StChDate13']);
        $this->CycleDay1->setDbValue($row['CycleDay1']);
        $this->CycleDay2->setDbValue($row['CycleDay2']);
        $this->CycleDay3->setDbValue($row['CycleDay3']);
        $this->CycleDay4->setDbValue($row['CycleDay4']);
        $this->CycleDay5->setDbValue($row['CycleDay5']);
        $this->CycleDay6->setDbValue($row['CycleDay6']);
        $this->CycleDay7->setDbValue($row['CycleDay7']);
        $this->CycleDay8->setDbValue($row['CycleDay8']);
        $this->CycleDay9->setDbValue($row['CycleDay9']);
        $this->CycleDay10->setDbValue($row['CycleDay10']);
        $this->CycleDay11->setDbValue($row['CycleDay11']);
        $this->CycleDay12->setDbValue($row['CycleDay12']);
        $this->CycleDay13->setDbValue($row['CycleDay13']);
        $this->StimulationDay1->setDbValue($row['StimulationDay1']);
        $this->StimulationDay2->setDbValue($row['StimulationDay2']);
        $this->StimulationDay3->setDbValue($row['StimulationDay3']);
        $this->StimulationDay4->setDbValue($row['StimulationDay4']);
        $this->StimulationDay5->setDbValue($row['StimulationDay5']);
        $this->StimulationDay6->setDbValue($row['StimulationDay6']);
        $this->StimulationDay7->setDbValue($row['StimulationDay7']);
        $this->StimulationDay8->setDbValue($row['StimulationDay8']);
        $this->StimulationDay9->setDbValue($row['StimulationDay9']);
        $this->StimulationDay10->setDbValue($row['StimulationDay10']);
        $this->StimulationDay11->setDbValue($row['StimulationDay11']);
        $this->StimulationDay12->setDbValue($row['StimulationDay12']);
        $this->StimulationDay13->setDbValue($row['StimulationDay13']);
        $this->Tablet1->setDbValue($row['Tablet1']);
        $this->Tablet2->setDbValue($row['Tablet2']);
        $this->Tablet3->setDbValue($row['Tablet3']);
        $this->Tablet4->setDbValue($row['Tablet4']);
        $this->Tablet5->setDbValue($row['Tablet5']);
        $this->Tablet6->setDbValue($row['Tablet6']);
        $this->Tablet7->setDbValue($row['Tablet7']);
        $this->Tablet8->setDbValue($row['Tablet8']);
        $this->Tablet9->setDbValue($row['Tablet9']);
        $this->Tablet10->setDbValue($row['Tablet10']);
        $this->Tablet11->setDbValue($row['Tablet11']);
        $this->Tablet12->setDbValue($row['Tablet12']);
        $this->Tablet13->setDbValue($row['Tablet13']);
        $this->RFSH1->setDbValue($row['RFSH1']);
        $this->RFSH2->setDbValue($row['RFSH2']);
        $this->RFSH3->setDbValue($row['RFSH3']);
        $this->RFSH4->setDbValue($row['RFSH4']);
        $this->RFSH5->setDbValue($row['RFSH5']);
        $this->RFSH6->setDbValue($row['RFSH6']);
        $this->RFSH7->setDbValue($row['RFSH7']);
        $this->RFSH8->setDbValue($row['RFSH8']);
        $this->RFSH9->setDbValue($row['RFSH9']);
        $this->RFSH10->setDbValue($row['RFSH10']);
        $this->RFSH11->setDbValue($row['RFSH11']);
        $this->RFSH12->setDbValue($row['RFSH12']);
        $this->RFSH13->setDbValue($row['RFSH13']);
        $this->HMG1->setDbValue($row['HMG1']);
        $this->HMG2->setDbValue($row['HMG2']);
        $this->HMG3->setDbValue($row['HMG3']);
        $this->HMG4->setDbValue($row['HMG4']);
        $this->HMG5->setDbValue($row['HMG5']);
        $this->HMG6->setDbValue($row['HMG6']);
        $this->HMG7->setDbValue($row['HMG7']);
        $this->HMG8->setDbValue($row['HMG8']);
        $this->HMG9->setDbValue($row['HMG9']);
        $this->HMG10->setDbValue($row['HMG10']);
        $this->HMG11->setDbValue($row['HMG11']);
        $this->HMG12->setDbValue($row['HMG12']);
        $this->HMG13->setDbValue($row['HMG13']);
        $this->GnRH1->setDbValue($row['GnRH1']);
        $this->GnRH2->setDbValue($row['GnRH2']);
        $this->GnRH3->setDbValue($row['GnRH3']);
        $this->GnRH4->setDbValue($row['GnRH4']);
        $this->GnRH5->setDbValue($row['GnRH5']);
        $this->GnRH6->setDbValue($row['GnRH6']);
        $this->GnRH7->setDbValue($row['GnRH7']);
        $this->GnRH8->setDbValue($row['GnRH8']);
        $this->GnRH9->setDbValue($row['GnRH9']);
        $this->GnRH10->setDbValue($row['GnRH10']);
        $this->GnRH11->setDbValue($row['GnRH11']);
        $this->GnRH12->setDbValue($row['GnRH12']);
        $this->GnRH13->setDbValue($row['GnRH13']);
        $this->E21->setDbValue($row['E21']);
        $this->E22->setDbValue($row['E22']);
        $this->E23->setDbValue($row['E23']);
        $this->E24->setDbValue($row['E24']);
        $this->E25->setDbValue($row['E25']);
        $this->E26->setDbValue($row['E26']);
        $this->E27->setDbValue($row['E27']);
        $this->E28->setDbValue($row['E28']);
        $this->E29->setDbValue($row['E29']);
        $this->E210->setDbValue($row['E210']);
        $this->E211->setDbValue($row['E211']);
        $this->E212->setDbValue($row['E212']);
        $this->E213->setDbValue($row['E213']);
        $this->P41->setDbValue($row['P41']);
        $this->P42->setDbValue($row['P42']);
        $this->P43->setDbValue($row['P43']);
        $this->P44->setDbValue($row['P44']);
        $this->P45->setDbValue($row['P45']);
        $this->P46->setDbValue($row['P46']);
        $this->P47->setDbValue($row['P47']);
        $this->P48->setDbValue($row['P48']);
        $this->P49->setDbValue($row['P49']);
        $this->P410->setDbValue($row['P410']);
        $this->P411->setDbValue($row['P411']);
        $this->P412->setDbValue($row['P412']);
        $this->P413->setDbValue($row['P413']);
        $this->USGRt1->setDbValue($row['USGRt1']);
        $this->USGRt2->setDbValue($row['USGRt2']);
        $this->USGRt3->setDbValue($row['USGRt3']);
        $this->USGRt4->setDbValue($row['USGRt4']);
        $this->USGRt5->setDbValue($row['USGRt5']);
        $this->USGRt6->setDbValue($row['USGRt6']);
        $this->USGRt7->setDbValue($row['USGRt7']);
        $this->USGRt8->setDbValue($row['USGRt8']);
        $this->USGRt9->setDbValue($row['USGRt9']);
        $this->USGRt10->setDbValue($row['USGRt10']);
        $this->USGRt11->setDbValue($row['USGRt11']);
        $this->USGRt12->setDbValue($row['USGRt12']);
        $this->USGRt13->setDbValue($row['USGRt13']);
        $this->USGLt1->setDbValue($row['USGLt1']);
        $this->USGLt2->setDbValue($row['USGLt2']);
        $this->USGLt3->setDbValue($row['USGLt3']);
        $this->USGLt4->setDbValue($row['USGLt4']);
        $this->USGLt5->setDbValue($row['USGLt5']);
        $this->USGLt6->setDbValue($row['USGLt6']);
        $this->USGLt7->setDbValue($row['USGLt7']);
        $this->USGLt8->setDbValue($row['USGLt8']);
        $this->USGLt9->setDbValue($row['USGLt9']);
        $this->USGLt10->setDbValue($row['USGLt10']);
        $this->USGLt11->setDbValue($row['USGLt11']);
        $this->USGLt12->setDbValue($row['USGLt12']);
        $this->USGLt13->setDbValue($row['USGLt13']);
        $this->EM1->setDbValue($row['EM1']);
        $this->EM2->setDbValue($row['EM2']);
        $this->EM3->setDbValue($row['EM3']);
        $this->EM4->setDbValue($row['EM4']);
        $this->EM5->setDbValue($row['EM5']);
        $this->EM6->setDbValue($row['EM6']);
        $this->EM7->setDbValue($row['EM7']);
        $this->EM8->setDbValue($row['EM8']);
        $this->EM9->setDbValue($row['EM9']);
        $this->EM10->setDbValue($row['EM10']);
        $this->EM11->setDbValue($row['EM11']);
        $this->EM12->setDbValue($row['EM12']);
        $this->EM13->setDbValue($row['EM13']);
        $this->Others1->setDbValue($row['Others1']);
        $this->Others2->setDbValue($row['Others2']);
        $this->Others3->setDbValue($row['Others3']);
        $this->Others4->setDbValue($row['Others4']);
        $this->Others5->setDbValue($row['Others5']);
        $this->Others6->setDbValue($row['Others6']);
        $this->Others7->setDbValue($row['Others7']);
        $this->Others8->setDbValue($row['Others8']);
        $this->Others9->setDbValue($row['Others9']);
        $this->Others10->setDbValue($row['Others10']);
        $this->Others11->setDbValue($row['Others11']);
        $this->Others12->setDbValue($row['Others12']);
        $this->Others13->setDbValue($row['Others13']);
        $this->DR1->setDbValue($row['DR1']);
        $this->DR2->setDbValue($row['DR2']);
        $this->DR3->setDbValue($row['DR3']);
        $this->DR4->setDbValue($row['DR4']);
        $this->DR5->setDbValue($row['DR5']);
        $this->DR6->setDbValue($row['DR6']);
        $this->DR7->setDbValue($row['DR7']);
        $this->DR8->setDbValue($row['DR8']);
        $this->DR9->setDbValue($row['DR9']);
        $this->DR10->setDbValue($row['DR10']);
        $this->DR11->setDbValue($row['DR11']);
        $this->DR12->setDbValue($row['DR12']);
        $this->DR13->setDbValue($row['DR13']);
        $this->DOCTORRESPONSIBLE->setDbValue($row['DOCTORRESPONSIBLE']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Convert->setDbValue($row['Convert']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATOFEMBRYOTRANSFER->setDbValue($row['DATOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->ViaAdmin->setDbValue($row['ViaAdmin']);
        $this->ViaStartDateTime->setDbValue($row['ViaStartDateTime']);
        $this->ViaDose->setDbValue($row['ViaDose']);
        $this->AllFreeze->setDbValue($row['AllFreeze']);
        $this->TreatmentCancel->setDbValue($row['TreatmentCancel']);
        $this->Reason->setDbValue($row['Reason']);
        $this->ProgesteroneAdmin->setDbValue($row['ProgesteroneAdmin']);
        $this->ProgesteroneStart->setDbValue($row['ProgesteroneStart']);
        $this->ProgesteroneDose->setDbValue($row['ProgesteroneDose']);
        $this->StChDate14->setDbValue($row['StChDate14']);
        $this->StChDate15->setDbValue($row['StChDate15']);
        $this->StChDate16->setDbValue($row['StChDate16']);
        $this->StChDate17->setDbValue($row['StChDate17']);
        $this->StChDate18->setDbValue($row['StChDate18']);
        $this->StChDate19->setDbValue($row['StChDate19']);
        $this->StChDate20->setDbValue($row['StChDate20']);
        $this->StChDate21->setDbValue($row['StChDate21']);
        $this->StChDate22->setDbValue($row['StChDate22']);
        $this->StChDate23->setDbValue($row['StChDate23']);
        $this->StChDate24->setDbValue($row['StChDate24']);
        $this->StChDate25->setDbValue($row['StChDate25']);
        $this->CycleDay14->setDbValue($row['CycleDay14']);
        $this->CycleDay15->setDbValue($row['CycleDay15']);
        $this->CycleDay16->setDbValue($row['CycleDay16']);
        $this->CycleDay17->setDbValue($row['CycleDay17']);
        $this->CycleDay18->setDbValue($row['CycleDay18']);
        $this->CycleDay19->setDbValue($row['CycleDay19']);
        $this->CycleDay20->setDbValue($row['CycleDay20']);
        $this->CycleDay21->setDbValue($row['CycleDay21']);
        $this->CycleDay22->setDbValue($row['CycleDay22']);
        $this->CycleDay23->setDbValue($row['CycleDay23']);
        $this->CycleDay24->setDbValue($row['CycleDay24']);
        $this->CycleDay25->setDbValue($row['CycleDay25']);
        $this->StimulationDay14->setDbValue($row['StimulationDay14']);
        $this->StimulationDay15->setDbValue($row['StimulationDay15']);
        $this->StimulationDay16->setDbValue($row['StimulationDay16']);
        $this->StimulationDay17->setDbValue($row['StimulationDay17']);
        $this->StimulationDay18->setDbValue($row['StimulationDay18']);
        $this->StimulationDay19->setDbValue($row['StimulationDay19']);
        $this->StimulationDay20->setDbValue($row['StimulationDay20']);
        $this->StimulationDay21->setDbValue($row['StimulationDay21']);
        $this->StimulationDay22->setDbValue($row['StimulationDay22']);
        $this->StimulationDay23->setDbValue($row['StimulationDay23']);
        $this->StimulationDay24->setDbValue($row['StimulationDay24']);
        $this->StimulationDay25->setDbValue($row['StimulationDay25']);
        $this->Tablet14->setDbValue($row['Tablet14']);
        $this->Tablet15->setDbValue($row['Tablet15']);
        $this->Tablet16->setDbValue($row['Tablet16']);
        $this->Tablet17->setDbValue($row['Tablet17']);
        $this->Tablet18->setDbValue($row['Tablet18']);
        $this->Tablet19->setDbValue($row['Tablet19']);
        $this->Tablet20->setDbValue($row['Tablet20']);
        $this->Tablet21->setDbValue($row['Tablet21']);
        $this->Tablet22->setDbValue($row['Tablet22']);
        $this->Tablet23->setDbValue($row['Tablet23']);
        $this->Tablet24->setDbValue($row['Tablet24']);
        $this->Tablet25->setDbValue($row['Tablet25']);
        $this->RFSH14->setDbValue($row['RFSH14']);
        $this->RFSH15->setDbValue($row['RFSH15']);
        $this->RFSH16->setDbValue($row['RFSH16']);
        $this->RFSH17->setDbValue($row['RFSH17']);
        $this->RFSH18->setDbValue($row['RFSH18']);
        $this->RFSH19->setDbValue($row['RFSH19']);
        $this->RFSH20->setDbValue($row['RFSH20']);
        $this->RFSH21->setDbValue($row['RFSH21']);
        $this->RFSH22->setDbValue($row['RFSH22']);
        $this->RFSH23->setDbValue($row['RFSH23']);
        $this->RFSH24->setDbValue($row['RFSH24']);
        $this->RFSH25->setDbValue($row['RFSH25']);
        $this->HMG14->setDbValue($row['HMG14']);
        $this->HMG15->setDbValue($row['HMG15']);
        $this->HMG16->setDbValue($row['HMG16']);
        $this->HMG17->setDbValue($row['HMG17']);
        $this->HMG18->setDbValue($row['HMG18']);
        $this->HMG19->setDbValue($row['HMG19']);
        $this->HMG20->setDbValue($row['HMG20']);
        $this->HMG21->setDbValue($row['HMG21']);
        $this->HMG22->setDbValue($row['HMG22']);
        $this->HMG23->setDbValue($row['HMG23']);
        $this->HMG24->setDbValue($row['HMG24']);
        $this->HMG25->setDbValue($row['HMG25']);
        $this->GnRH14->setDbValue($row['GnRH14']);
        $this->GnRH15->setDbValue($row['GnRH15']);
        $this->GnRH16->setDbValue($row['GnRH16']);
        $this->GnRH17->setDbValue($row['GnRH17']);
        $this->GnRH18->setDbValue($row['GnRH18']);
        $this->GnRH19->setDbValue($row['GnRH19']);
        $this->GnRH20->setDbValue($row['GnRH20']);
        $this->GnRH21->setDbValue($row['GnRH21']);
        $this->GnRH22->setDbValue($row['GnRH22']);
        $this->GnRH23->setDbValue($row['GnRH23']);
        $this->GnRH24->setDbValue($row['GnRH24']);
        $this->GnRH25->setDbValue($row['GnRH25']);
        $this->P414->setDbValue($row['P414']);
        $this->P415->setDbValue($row['P415']);
        $this->P416->setDbValue($row['P416']);
        $this->P417->setDbValue($row['P417']);
        $this->P418->setDbValue($row['P418']);
        $this->P419->setDbValue($row['P419']);
        $this->P420->setDbValue($row['P420']);
        $this->P421->setDbValue($row['P421']);
        $this->P422->setDbValue($row['P422']);
        $this->P423->setDbValue($row['P423']);
        $this->P424->setDbValue($row['P424']);
        $this->P425->setDbValue($row['P425']);
        $this->USGRt14->setDbValue($row['USGRt14']);
        $this->USGRt15->setDbValue($row['USGRt15']);
        $this->USGRt16->setDbValue($row['USGRt16']);
        $this->USGRt17->setDbValue($row['USGRt17']);
        $this->USGRt18->setDbValue($row['USGRt18']);
        $this->USGRt19->setDbValue($row['USGRt19']);
        $this->USGRt20->setDbValue($row['USGRt20']);
        $this->USGRt21->setDbValue($row['USGRt21']);
        $this->USGRt22->setDbValue($row['USGRt22']);
        $this->USGRt23->setDbValue($row['USGRt23']);
        $this->USGRt24->setDbValue($row['USGRt24']);
        $this->USGRt25->setDbValue($row['USGRt25']);
        $this->USGLt14->setDbValue($row['USGLt14']);
        $this->USGLt15->setDbValue($row['USGLt15']);
        $this->USGLt16->setDbValue($row['USGLt16']);
        $this->USGLt17->setDbValue($row['USGLt17']);
        $this->USGLt18->setDbValue($row['USGLt18']);
        $this->USGLt19->setDbValue($row['USGLt19']);
        $this->USGLt20->setDbValue($row['USGLt20']);
        $this->USGLt21->setDbValue($row['USGLt21']);
        $this->USGLt22->setDbValue($row['USGLt22']);
        $this->USGLt23->setDbValue($row['USGLt23']);
        $this->USGLt24->setDbValue($row['USGLt24']);
        $this->USGLt25->setDbValue($row['USGLt25']);
        $this->EM14->setDbValue($row['EM14']);
        $this->EM15->setDbValue($row['EM15']);
        $this->EM16->setDbValue($row['EM16']);
        $this->EM17->setDbValue($row['EM17']);
        $this->EM18->setDbValue($row['EM18']);
        $this->EM19->setDbValue($row['EM19']);
        $this->EM20->setDbValue($row['EM20']);
        $this->EM21->setDbValue($row['EM21']);
        $this->EM22->setDbValue($row['EM22']);
        $this->EM23->setDbValue($row['EM23']);
        $this->EM24->setDbValue($row['EM24']);
        $this->EM25->setDbValue($row['EM25']);
        $this->Others14->setDbValue($row['Others14']);
        $this->Others15->setDbValue($row['Others15']);
        $this->Others16->setDbValue($row['Others16']);
        $this->Others17->setDbValue($row['Others17']);
        $this->Others18->setDbValue($row['Others18']);
        $this->Others19->setDbValue($row['Others19']);
        $this->Others20->setDbValue($row['Others20']);
        $this->Others21->setDbValue($row['Others21']);
        $this->Others22->setDbValue($row['Others22']);
        $this->Others23->setDbValue($row['Others23']);
        $this->Others24->setDbValue($row['Others24']);
        $this->Others25->setDbValue($row['Others25']);
        $this->DR14->setDbValue($row['DR14']);
        $this->DR15->setDbValue($row['DR15']);
        $this->DR16->setDbValue($row['DR16']);
        $this->DR17->setDbValue($row['DR17']);
        $this->DR18->setDbValue($row['DR18']);
        $this->DR19->setDbValue($row['DR19']);
        $this->DR20->setDbValue($row['DR20']);
        $this->DR21->setDbValue($row['DR21']);
        $this->DR22->setDbValue($row['DR22']);
        $this->DR23->setDbValue($row['DR23']);
        $this->DR24->setDbValue($row['DR24']);
        $this->DR25->setDbValue($row['DR25']);
        $this->E214->setDbValue($row['E214']);
        $this->E215->setDbValue($row['E215']);
        $this->E216->setDbValue($row['E216']);
        $this->E217->setDbValue($row['E217']);
        $this->E218->setDbValue($row['E218']);
        $this->E219->setDbValue($row['E219']);
        $this->E220->setDbValue($row['E220']);
        $this->E221->setDbValue($row['E221']);
        $this->E222->setDbValue($row['E222']);
        $this->E223->setDbValue($row['E223']);
        $this->E224->setDbValue($row['E224']);
        $this->E225->setDbValue($row['E225']);
        $this->EEETTTDTE->setDbValue($row['EEETTTDTE']);
        $this->bhcgdate->setDbValue($row['bhcgdate']);
        $this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
        $this->HSG->setDbValue($row['HSG']);
        $this->DHL->setDbValue($row['DHL']);
        $this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
        $this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
        $this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
        $this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
        $this->TABLETS->setDbValue($row['TABLETS']);
        $this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
        $this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
        $this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
        $this->EDD_Date->setDbValue($row['EDD_Date']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNo'] = $this->RIDNo->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['ARTCycle'] = $this->ARTCycle->CurrentValue;
        $row['FemaleFactor'] = $this->FemaleFactor->CurrentValue;
        $row['MaleFactor'] = $this->MaleFactor->CurrentValue;
        $row['Protocol'] = $this->Protocol->CurrentValue;
        $row['SemenFrozen'] = $this->SemenFrozen->CurrentValue;
        $row['A4ICSICycle'] = $this->A4ICSICycle->CurrentValue;
        $row['TotalICSICycle'] = $this->TotalICSICycle->CurrentValue;
        $row['TypeOfInfertility'] = $this->TypeOfInfertility->CurrentValue;
        $row['Duration'] = $this->Duration->CurrentValue;
        $row['LMP'] = $this->LMP->CurrentValue;
        $row['RelevantHistory'] = $this->RelevantHistory->CurrentValue;
        $row['IUICycles'] = $this->IUICycles->CurrentValue;
        $row['AFC'] = $this->AFC->CurrentValue;
        $row['AMH'] = $this->AMH->CurrentValue;
        $row['FBMI'] = $this->FBMI->CurrentValue;
        $row['MBMI'] = $this->MBMI->CurrentValue;
        $row['OvarianVolumeRT'] = $this->OvarianVolumeRT->CurrentValue;
        $row['OvarianVolumeLT'] = $this->OvarianVolumeLT->CurrentValue;
        $row['DAYSOFSTIMULATION'] = $this->DAYSOFSTIMULATION->CurrentValue;
        $row['DOSEOFGONADOTROPINS'] = $this->DOSEOFGONADOTROPINS->CurrentValue;
        $row['INJTYPE'] = $this->INJTYPE->CurrentValue;
        $row['ANTAGONISTDAYS'] = $this->ANTAGONISTDAYS->CurrentValue;
        $row['ANTAGONISTSTARTDAY'] = $this->ANTAGONISTSTARTDAY->CurrentValue;
        $row['GROWTHHORMONE'] = $this->GROWTHHORMONE->CurrentValue;
        $row['PRETREATMENT'] = $this->PRETREATMENT->CurrentValue;
        $row['SerumP4'] = $this->SerumP4->CurrentValue;
        $row['FORT'] = $this->FORT->CurrentValue;
        $row['MedicalFactors'] = $this->MedicalFactors->CurrentValue;
        $row['SCDate'] = $this->SCDate->CurrentValue;
        $row['OvarianSurgery'] = $this->OvarianSurgery->CurrentValue;
        $row['PreProcedureOrder'] = $this->PreProcedureOrder->CurrentValue;
        $row['TRIGGERR'] = $this->TRIGGERR->CurrentValue;
        $row['TRIGGERDATE'] = $this->TRIGGERDATE->CurrentValue;
        $row['ATHOMEorCLINIC'] = $this->ATHOMEorCLINIC->CurrentValue;
        $row['OPUDATE'] = $this->OPUDATE->CurrentValue;
        $row['ALLFREEZEINDICATION'] = $this->ALLFREEZEINDICATION->CurrentValue;
        $row['ERA'] = $this->ERA->CurrentValue;
        $row['PGTA'] = $this->PGTA->CurrentValue;
        $row['PGD'] = $this->PGD->CurrentValue;
        $row['DATEOFET'] = $this->DATEOFET->CurrentValue;
        $row['ET'] = $this->ET->CurrentValue;
        $row['ESET'] = $this->ESET->CurrentValue;
        $row['DOET'] = $this->DOET->CurrentValue;
        $row['SEMENPREPARATION'] = $this->SEMENPREPARATION->CurrentValue;
        $row['REASONFORESET'] = $this->REASONFORESET->CurrentValue;
        $row['Expectedoocytes'] = $this->Expectedoocytes->CurrentValue;
        $row['StChDate1'] = $this->StChDate1->CurrentValue;
        $row['StChDate2'] = $this->StChDate2->CurrentValue;
        $row['StChDate3'] = $this->StChDate3->CurrentValue;
        $row['StChDate4'] = $this->StChDate4->CurrentValue;
        $row['StChDate5'] = $this->StChDate5->CurrentValue;
        $row['StChDate6'] = $this->StChDate6->CurrentValue;
        $row['StChDate7'] = $this->StChDate7->CurrentValue;
        $row['StChDate8'] = $this->StChDate8->CurrentValue;
        $row['StChDate9'] = $this->StChDate9->CurrentValue;
        $row['StChDate10'] = $this->StChDate10->CurrentValue;
        $row['StChDate11'] = $this->StChDate11->CurrentValue;
        $row['StChDate12'] = $this->StChDate12->CurrentValue;
        $row['StChDate13'] = $this->StChDate13->CurrentValue;
        $row['CycleDay1'] = $this->CycleDay1->CurrentValue;
        $row['CycleDay2'] = $this->CycleDay2->CurrentValue;
        $row['CycleDay3'] = $this->CycleDay3->CurrentValue;
        $row['CycleDay4'] = $this->CycleDay4->CurrentValue;
        $row['CycleDay5'] = $this->CycleDay5->CurrentValue;
        $row['CycleDay6'] = $this->CycleDay6->CurrentValue;
        $row['CycleDay7'] = $this->CycleDay7->CurrentValue;
        $row['CycleDay8'] = $this->CycleDay8->CurrentValue;
        $row['CycleDay9'] = $this->CycleDay9->CurrentValue;
        $row['CycleDay10'] = $this->CycleDay10->CurrentValue;
        $row['CycleDay11'] = $this->CycleDay11->CurrentValue;
        $row['CycleDay12'] = $this->CycleDay12->CurrentValue;
        $row['CycleDay13'] = $this->CycleDay13->CurrentValue;
        $row['StimulationDay1'] = $this->StimulationDay1->CurrentValue;
        $row['StimulationDay2'] = $this->StimulationDay2->CurrentValue;
        $row['StimulationDay3'] = $this->StimulationDay3->CurrentValue;
        $row['StimulationDay4'] = $this->StimulationDay4->CurrentValue;
        $row['StimulationDay5'] = $this->StimulationDay5->CurrentValue;
        $row['StimulationDay6'] = $this->StimulationDay6->CurrentValue;
        $row['StimulationDay7'] = $this->StimulationDay7->CurrentValue;
        $row['StimulationDay8'] = $this->StimulationDay8->CurrentValue;
        $row['StimulationDay9'] = $this->StimulationDay9->CurrentValue;
        $row['StimulationDay10'] = $this->StimulationDay10->CurrentValue;
        $row['StimulationDay11'] = $this->StimulationDay11->CurrentValue;
        $row['StimulationDay12'] = $this->StimulationDay12->CurrentValue;
        $row['StimulationDay13'] = $this->StimulationDay13->CurrentValue;
        $row['Tablet1'] = $this->Tablet1->CurrentValue;
        $row['Tablet2'] = $this->Tablet2->CurrentValue;
        $row['Tablet3'] = $this->Tablet3->CurrentValue;
        $row['Tablet4'] = $this->Tablet4->CurrentValue;
        $row['Tablet5'] = $this->Tablet5->CurrentValue;
        $row['Tablet6'] = $this->Tablet6->CurrentValue;
        $row['Tablet7'] = $this->Tablet7->CurrentValue;
        $row['Tablet8'] = $this->Tablet8->CurrentValue;
        $row['Tablet9'] = $this->Tablet9->CurrentValue;
        $row['Tablet10'] = $this->Tablet10->CurrentValue;
        $row['Tablet11'] = $this->Tablet11->CurrentValue;
        $row['Tablet12'] = $this->Tablet12->CurrentValue;
        $row['Tablet13'] = $this->Tablet13->CurrentValue;
        $row['RFSH1'] = $this->RFSH1->CurrentValue;
        $row['RFSH2'] = $this->RFSH2->CurrentValue;
        $row['RFSH3'] = $this->RFSH3->CurrentValue;
        $row['RFSH4'] = $this->RFSH4->CurrentValue;
        $row['RFSH5'] = $this->RFSH5->CurrentValue;
        $row['RFSH6'] = $this->RFSH6->CurrentValue;
        $row['RFSH7'] = $this->RFSH7->CurrentValue;
        $row['RFSH8'] = $this->RFSH8->CurrentValue;
        $row['RFSH9'] = $this->RFSH9->CurrentValue;
        $row['RFSH10'] = $this->RFSH10->CurrentValue;
        $row['RFSH11'] = $this->RFSH11->CurrentValue;
        $row['RFSH12'] = $this->RFSH12->CurrentValue;
        $row['RFSH13'] = $this->RFSH13->CurrentValue;
        $row['HMG1'] = $this->HMG1->CurrentValue;
        $row['HMG2'] = $this->HMG2->CurrentValue;
        $row['HMG3'] = $this->HMG3->CurrentValue;
        $row['HMG4'] = $this->HMG4->CurrentValue;
        $row['HMG5'] = $this->HMG5->CurrentValue;
        $row['HMG6'] = $this->HMG6->CurrentValue;
        $row['HMG7'] = $this->HMG7->CurrentValue;
        $row['HMG8'] = $this->HMG8->CurrentValue;
        $row['HMG9'] = $this->HMG9->CurrentValue;
        $row['HMG10'] = $this->HMG10->CurrentValue;
        $row['HMG11'] = $this->HMG11->CurrentValue;
        $row['HMG12'] = $this->HMG12->CurrentValue;
        $row['HMG13'] = $this->HMG13->CurrentValue;
        $row['GnRH1'] = $this->GnRH1->CurrentValue;
        $row['GnRH2'] = $this->GnRH2->CurrentValue;
        $row['GnRH3'] = $this->GnRH3->CurrentValue;
        $row['GnRH4'] = $this->GnRH4->CurrentValue;
        $row['GnRH5'] = $this->GnRH5->CurrentValue;
        $row['GnRH6'] = $this->GnRH6->CurrentValue;
        $row['GnRH7'] = $this->GnRH7->CurrentValue;
        $row['GnRH8'] = $this->GnRH8->CurrentValue;
        $row['GnRH9'] = $this->GnRH9->CurrentValue;
        $row['GnRH10'] = $this->GnRH10->CurrentValue;
        $row['GnRH11'] = $this->GnRH11->CurrentValue;
        $row['GnRH12'] = $this->GnRH12->CurrentValue;
        $row['GnRH13'] = $this->GnRH13->CurrentValue;
        $row['E21'] = $this->E21->CurrentValue;
        $row['E22'] = $this->E22->CurrentValue;
        $row['E23'] = $this->E23->CurrentValue;
        $row['E24'] = $this->E24->CurrentValue;
        $row['E25'] = $this->E25->CurrentValue;
        $row['E26'] = $this->E26->CurrentValue;
        $row['E27'] = $this->E27->CurrentValue;
        $row['E28'] = $this->E28->CurrentValue;
        $row['E29'] = $this->E29->CurrentValue;
        $row['E210'] = $this->E210->CurrentValue;
        $row['E211'] = $this->E211->CurrentValue;
        $row['E212'] = $this->E212->CurrentValue;
        $row['E213'] = $this->E213->CurrentValue;
        $row['P41'] = $this->P41->CurrentValue;
        $row['P42'] = $this->P42->CurrentValue;
        $row['P43'] = $this->P43->CurrentValue;
        $row['P44'] = $this->P44->CurrentValue;
        $row['P45'] = $this->P45->CurrentValue;
        $row['P46'] = $this->P46->CurrentValue;
        $row['P47'] = $this->P47->CurrentValue;
        $row['P48'] = $this->P48->CurrentValue;
        $row['P49'] = $this->P49->CurrentValue;
        $row['P410'] = $this->P410->CurrentValue;
        $row['P411'] = $this->P411->CurrentValue;
        $row['P412'] = $this->P412->CurrentValue;
        $row['P413'] = $this->P413->CurrentValue;
        $row['USGRt1'] = $this->USGRt1->CurrentValue;
        $row['USGRt2'] = $this->USGRt2->CurrentValue;
        $row['USGRt3'] = $this->USGRt3->CurrentValue;
        $row['USGRt4'] = $this->USGRt4->CurrentValue;
        $row['USGRt5'] = $this->USGRt5->CurrentValue;
        $row['USGRt6'] = $this->USGRt6->CurrentValue;
        $row['USGRt7'] = $this->USGRt7->CurrentValue;
        $row['USGRt8'] = $this->USGRt8->CurrentValue;
        $row['USGRt9'] = $this->USGRt9->CurrentValue;
        $row['USGRt10'] = $this->USGRt10->CurrentValue;
        $row['USGRt11'] = $this->USGRt11->CurrentValue;
        $row['USGRt12'] = $this->USGRt12->CurrentValue;
        $row['USGRt13'] = $this->USGRt13->CurrentValue;
        $row['USGLt1'] = $this->USGLt1->CurrentValue;
        $row['USGLt2'] = $this->USGLt2->CurrentValue;
        $row['USGLt3'] = $this->USGLt3->CurrentValue;
        $row['USGLt4'] = $this->USGLt4->CurrentValue;
        $row['USGLt5'] = $this->USGLt5->CurrentValue;
        $row['USGLt6'] = $this->USGLt6->CurrentValue;
        $row['USGLt7'] = $this->USGLt7->CurrentValue;
        $row['USGLt8'] = $this->USGLt8->CurrentValue;
        $row['USGLt9'] = $this->USGLt9->CurrentValue;
        $row['USGLt10'] = $this->USGLt10->CurrentValue;
        $row['USGLt11'] = $this->USGLt11->CurrentValue;
        $row['USGLt12'] = $this->USGLt12->CurrentValue;
        $row['USGLt13'] = $this->USGLt13->CurrentValue;
        $row['EM1'] = $this->EM1->CurrentValue;
        $row['EM2'] = $this->EM2->CurrentValue;
        $row['EM3'] = $this->EM3->CurrentValue;
        $row['EM4'] = $this->EM4->CurrentValue;
        $row['EM5'] = $this->EM5->CurrentValue;
        $row['EM6'] = $this->EM6->CurrentValue;
        $row['EM7'] = $this->EM7->CurrentValue;
        $row['EM8'] = $this->EM8->CurrentValue;
        $row['EM9'] = $this->EM9->CurrentValue;
        $row['EM10'] = $this->EM10->CurrentValue;
        $row['EM11'] = $this->EM11->CurrentValue;
        $row['EM12'] = $this->EM12->CurrentValue;
        $row['EM13'] = $this->EM13->CurrentValue;
        $row['Others1'] = $this->Others1->CurrentValue;
        $row['Others2'] = $this->Others2->CurrentValue;
        $row['Others3'] = $this->Others3->CurrentValue;
        $row['Others4'] = $this->Others4->CurrentValue;
        $row['Others5'] = $this->Others5->CurrentValue;
        $row['Others6'] = $this->Others6->CurrentValue;
        $row['Others7'] = $this->Others7->CurrentValue;
        $row['Others8'] = $this->Others8->CurrentValue;
        $row['Others9'] = $this->Others9->CurrentValue;
        $row['Others10'] = $this->Others10->CurrentValue;
        $row['Others11'] = $this->Others11->CurrentValue;
        $row['Others12'] = $this->Others12->CurrentValue;
        $row['Others13'] = $this->Others13->CurrentValue;
        $row['DR1'] = $this->DR1->CurrentValue;
        $row['DR2'] = $this->DR2->CurrentValue;
        $row['DR3'] = $this->DR3->CurrentValue;
        $row['DR4'] = $this->DR4->CurrentValue;
        $row['DR5'] = $this->DR5->CurrentValue;
        $row['DR6'] = $this->DR6->CurrentValue;
        $row['DR7'] = $this->DR7->CurrentValue;
        $row['DR8'] = $this->DR8->CurrentValue;
        $row['DR9'] = $this->DR9->CurrentValue;
        $row['DR10'] = $this->DR10->CurrentValue;
        $row['DR11'] = $this->DR11->CurrentValue;
        $row['DR12'] = $this->DR12->CurrentValue;
        $row['DR13'] = $this->DR13->CurrentValue;
        $row['DOCTORRESPONSIBLE'] = $this->DOCTORRESPONSIBLE->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['Convert'] = $this->Convert->CurrentValue;
        $row['Consultant'] = $this->Consultant->CurrentValue;
        $row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
        $row['IndicationForART'] = $this->IndicationForART->CurrentValue;
        $row['Hysteroscopy'] = $this->Hysteroscopy->CurrentValue;
        $row['EndometrialScratching'] = $this->EndometrialScratching->CurrentValue;
        $row['TrialCannulation'] = $this->TrialCannulation->CurrentValue;
        $row['CYCLETYPE'] = $this->CYCLETYPE->CurrentValue;
        $row['HRTCYCLE'] = $this->HRTCYCLE->CurrentValue;
        $row['OralEstrogenDosage'] = $this->OralEstrogenDosage->CurrentValue;
        $row['VaginalEstrogen'] = $this->VaginalEstrogen->CurrentValue;
        $row['GCSF'] = $this->GCSF->CurrentValue;
        $row['ActivatedPRP'] = $this->ActivatedPRP->CurrentValue;
        $row['UCLcm'] = $this->UCLcm->CurrentValue;
        $row['DATOFEMBRYOTRANSFER'] = $this->DATOFEMBRYOTRANSFER->CurrentValue;
        $row['DAYOFEMBRYOTRANSFER'] = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $row['NOOFEMBRYOSTHAWED'] = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $row['NOOFEMBRYOSTRANSFERRED'] = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $row['DAYOFEMBRYOS'] = $this->DAYOFEMBRYOS->CurrentValue;
        $row['CRYOPRESERVEDEMBRYOS'] = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $row['ViaAdmin'] = $this->ViaAdmin->CurrentValue;
        $row['ViaStartDateTime'] = $this->ViaStartDateTime->CurrentValue;
        $row['ViaDose'] = $this->ViaDose->CurrentValue;
        $row['AllFreeze'] = $this->AllFreeze->CurrentValue;
        $row['TreatmentCancel'] = $this->TreatmentCancel->CurrentValue;
        $row['Reason'] = $this->Reason->CurrentValue;
        $row['ProgesteroneAdmin'] = $this->ProgesteroneAdmin->CurrentValue;
        $row['ProgesteroneStart'] = $this->ProgesteroneStart->CurrentValue;
        $row['ProgesteroneDose'] = $this->ProgesteroneDose->CurrentValue;
        $row['StChDate14'] = $this->StChDate14->CurrentValue;
        $row['StChDate15'] = $this->StChDate15->CurrentValue;
        $row['StChDate16'] = $this->StChDate16->CurrentValue;
        $row['StChDate17'] = $this->StChDate17->CurrentValue;
        $row['StChDate18'] = $this->StChDate18->CurrentValue;
        $row['StChDate19'] = $this->StChDate19->CurrentValue;
        $row['StChDate20'] = $this->StChDate20->CurrentValue;
        $row['StChDate21'] = $this->StChDate21->CurrentValue;
        $row['StChDate22'] = $this->StChDate22->CurrentValue;
        $row['StChDate23'] = $this->StChDate23->CurrentValue;
        $row['StChDate24'] = $this->StChDate24->CurrentValue;
        $row['StChDate25'] = $this->StChDate25->CurrentValue;
        $row['CycleDay14'] = $this->CycleDay14->CurrentValue;
        $row['CycleDay15'] = $this->CycleDay15->CurrentValue;
        $row['CycleDay16'] = $this->CycleDay16->CurrentValue;
        $row['CycleDay17'] = $this->CycleDay17->CurrentValue;
        $row['CycleDay18'] = $this->CycleDay18->CurrentValue;
        $row['CycleDay19'] = $this->CycleDay19->CurrentValue;
        $row['CycleDay20'] = $this->CycleDay20->CurrentValue;
        $row['CycleDay21'] = $this->CycleDay21->CurrentValue;
        $row['CycleDay22'] = $this->CycleDay22->CurrentValue;
        $row['CycleDay23'] = $this->CycleDay23->CurrentValue;
        $row['CycleDay24'] = $this->CycleDay24->CurrentValue;
        $row['CycleDay25'] = $this->CycleDay25->CurrentValue;
        $row['StimulationDay14'] = $this->StimulationDay14->CurrentValue;
        $row['StimulationDay15'] = $this->StimulationDay15->CurrentValue;
        $row['StimulationDay16'] = $this->StimulationDay16->CurrentValue;
        $row['StimulationDay17'] = $this->StimulationDay17->CurrentValue;
        $row['StimulationDay18'] = $this->StimulationDay18->CurrentValue;
        $row['StimulationDay19'] = $this->StimulationDay19->CurrentValue;
        $row['StimulationDay20'] = $this->StimulationDay20->CurrentValue;
        $row['StimulationDay21'] = $this->StimulationDay21->CurrentValue;
        $row['StimulationDay22'] = $this->StimulationDay22->CurrentValue;
        $row['StimulationDay23'] = $this->StimulationDay23->CurrentValue;
        $row['StimulationDay24'] = $this->StimulationDay24->CurrentValue;
        $row['StimulationDay25'] = $this->StimulationDay25->CurrentValue;
        $row['Tablet14'] = $this->Tablet14->CurrentValue;
        $row['Tablet15'] = $this->Tablet15->CurrentValue;
        $row['Tablet16'] = $this->Tablet16->CurrentValue;
        $row['Tablet17'] = $this->Tablet17->CurrentValue;
        $row['Tablet18'] = $this->Tablet18->CurrentValue;
        $row['Tablet19'] = $this->Tablet19->CurrentValue;
        $row['Tablet20'] = $this->Tablet20->CurrentValue;
        $row['Tablet21'] = $this->Tablet21->CurrentValue;
        $row['Tablet22'] = $this->Tablet22->CurrentValue;
        $row['Tablet23'] = $this->Tablet23->CurrentValue;
        $row['Tablet24'] = $this->Tablet24->CurrentValue;
        $row['Tablet25'] = $this->Tablet25->CurrentValue;
        $row['RFSH14'] = $this->RFSH14->CurrentValue;
        $row['RFSH15'] = $this->RFSH15->CurrentValue;
        $row['RFSH16'] = $this->RFSH16->CurrentValue;
        $row['RFSH17'] = $this->RFSH17->CurrentValue;
        $row['RFSH18'] = $this->RFSH18->CurrentValue;
        $row['RFSH19'] = $this->RFSH19->CurrentValue;
        $row['RFSH20'] = $this->RFSH20->CurrentValue;
        $row['RFSH21'] = $this->RFSH21->CurrentValue;
        $row['RFSH22'] = $this->RFSH22->CurrentValue;
        $row['RFSH23'] = $this->RFSH23->CurrentValue;
        $row['RFSH24'] = $this->RFSH24->CurrentValue;
        $row['RFSH25'] = $this->RFSH25->CurrentValue;
        $row['HMG14'] = $this->HMG14->CurrentValue;
        $row['HMG15'] = $this->HMG15->CurrentValue;
        $row['HMG16'] = $this->HMG16->CurrentValue;
        $row['HMG17'] = $this->HMG17->CurrentValue;
        $row['HMG18'] = $this->HMG18->CurrentValue;
        $row['HMG19'] = $this->HMG19->CurrentValue;
        $row['HMG20'] = $this->HMG20->CurrentValue;
        $row['HMG21'] = $this->HMG21->CurrentValue;
        $row['HMG22'] = $this->HMG22->CurrentValue;
        $row['HMG23'] = $this->HMG23->CurrentValue;
        $row['HMG24'] = $this->HMG24->CurrentValue;
        $row['HMG25'] = $this->HMG25->CurrentValue;
        $row['GnRH14'] = $this->GnRH14->CurrentValue;
        $row['GnRH15'] = $this->GnRH15->CurrentValue;
        $row['GnRH16'] = $this->GnRH16->CurrentValue;
        $row['GnRH17'] = $this->GnRH17->CurrentValue;
        $row['GnRH18'] = $this->GnRH18->CurrentValue;
        $row['GnRH19'] = $this->GnRH19->CurrentValue;
        $row['GnRH20'] = $this->GnRH20->CurrentValue;
        $row['GnRH21'] = $this->GnRH21->CurrentValue;
        $row['GnRH22'] = $this->GnRH22->CurrentValue;
        $row['GnRH23'] = $this->GnRH23->CurrentValue;
        $row['GnRH24'] = $this->GnRH24->CurrentValue;
        $row['GnRH25'] = $this->GnRH25->CurrentValue;
        $row['P414'] = $this->P414->CurrentValue;
        $row['P415'] = $this->P415->CurrentValue;
        $row['P416'] = $this->P416->CurrentValue;
        $row['P417'] = $this->P417->CurrentValue;
        $row['P418'] = $this->P418->CurrentValue;
        $row['P419'] = $this->P419->CurrentValue;
        $row['P420'] = $this->P420->CurrentValue;
        $row['P421'] = $this->P421->CurrentValue;
        $row['P422'] = $this->P422->CurrentValue;
        $row['P423'] = $this->P423->CurrentValue;
        $row['P424'] = $this->P424->CurrentValue;
        $row['P425'] = $this->P425->CurrentValue;
        $row['USGRt14'] = $this->USGRt14->CurrentValue;
        $row['USGRt15'] = $this->USGRt15->CurrentValue;
        $row['USGRt16'] = $this->USGRt16->CurrentValue;
        $row['USGRt17'] = $this->USGRt17->CurrentValue;
        $row['USGRt18'] = $this->USGRt18->CurrentValue;
        $row['USGRt19'] = $this->USGRt19->CurrentValue;
        $row['USGRt20'] = $this->USGRt20->CurrentValue;
        $row['USGRt21'] = $this->USGRt21->CurrentValue;
        $row['USGRt22'] = $this->USGRt22->CurrentValue;
        $row['USGRt23'] = $this->USGRt23->CurrentValue;
        $row['USGRt24'] = $this->USGRt24->CurrentValue;
        $row['USGRt25'] = $this->USGRt25->CurrentValue;
        $row['USGLt14'] = $this->USGLt14->CurrentValue;
        $row['USGLt15'] = $this->USGLt15->CurrentValue;
        $row['USGLt16'] = $this->USGLt16->CurrentValue;
        $row['USGLt17'] = $this->USGLt17->CurrentValue;
        $row['USGLt18'] = $this->USGLt18->CurrentValue;
        $row['USGLt19'] = $this->USGLt19->CurrentValue;
        $row['USGLt20'] = $this->USGLt20->CurrentValue;
        $row['USGLt21'] = $this->USGLt21->CurrentValue;
        $row['USGLt22'] = $this->USGLt22->CurrentValue;
        $row['USGLt23'] = $this->USGLt23->CurrentValue;
        $row['USGLt24'] = $this->USGLt24->CurrentValue;
        $row['USGLt25'] = $this->USGLt25->CurrentValue;
        $row['EM14'] = $this->EM14->CurrentValue;
        $row['EM15'] = $this->EM15->CurrentValue;
        $row['EM16'] = $this->EM16->CurrentValue;
        $row['EM17'] = $this->EM17->CurrentValue;
        $row['EM18'] = $this->EM18->CurrentValue;
        $row['EM19'] = $this->EM19->CurrentValue;
        $row['EM20'] = $this->EM20->CurrentValue;
        $row['EM21'] = $this->EM21->CurrentValue;
        $row['EM22'] = $this->EM22->CurrentValue;
        $row['EM23'] = $this->EM23->CurrentValue;
        $row['EM24'] = $this->EM24->CurrentValue;
        $row['EM25'] = $this->EM25->CurrentValue;
        $row['Others14'] = $this->Others14->CurrentValue;
        $row['Others15'] = $this->Others15->CurrentValue;
        $row['Others16'] = $this->Others16->CurrentValue;
        $row['Others17'] = $this->Others17->CurrentValue;
        $row['Others18'] = $this->Others18->CurrentValue;
        $row['Others19'] = $this->Others19->CurrentValue;
        $row['Others20'] = $this->Others20->CurrentValue;
        $row['Others21'] = $this->Others21->CurrentValue;
        $row['Others22'] = $this->Others22->CurrentValue;
        $row['Others23'] = $this->Others23->CurrentValue;
        $row['Others24'] = $this->Others24->CurrentValue;
        $row['Others25'] = $this->Others25->CurrentValue;
        $row['DR14'] = $this->DR14->CurrentValue;
        $row['DR15'] = $this->DR15->CurrentValue;
        $row['DR16'] = $this->DR16->CurrentValue;
        $row['DR17'] = $this->DR17->CurrentValue;
        $row['DR18'] = $this->DR18->CurrentValue;
        $row['DR19'] = $this->DR19->CurrentValue;
        $row['DR20'] = $this->DR20->CurrentValue;
        $row['DR21'] = $this->DR21->CurrentValue;
        $row['DR22'] = $this->DR22->CurrentValue;
        $row['DR23'] = $this->DR23->CurrentValue;
        $row['DR24'] = $this->DR24->CurrentValue;
        $row['DR25'] = $this->DR25->CurrentValue;
        $row['E214'] = $this->E214->CurrentValue;
        $row['E215'] = $this->E215->CurrentValue;
        $row['E216'] = $this->E216->CurrentValue;
        $row['E217'] = $this->E217->CurrentValue;
        $row['E218'] = $this->E218->CurrentValue;
        $row['E219'] = $this->E219->CurrentValue;
        $row['E220'] = $this->E220->CurrentValue;
        $row['E221'] = $this->E221->CurrentValue;
        $row['E222'] = $this->E222->CurrentValue;
        $row['E223'] = $this->E223->CurrentValue;
        $row['E224'] = $this->E224->CurrentValue;
        $row['E225'] = $this->E225->CurrentValue;
        $row['EEETTTDTE'] = $this->EEETTTDTE->CurrentValue;
        $row['bhcgdate'] = $this->bhcgdate->CurrentValue;
        $row['TUBAL_PATENCY'] = $this->TUBAL_PATENCY->CurrentValue;
        $row['HSG'] = $this->HSG->CurrentValue;
        $row['DHL'] = $this->DHL->CurrentValue;
        $row['UTERINE_PROBLEMS'] = $this->UTERINE_PROBLEMS->CurrentValue;
        $row['W_COMORBIDS'] = $this->W_COMORBIDS->CurrentValue;
        $row['H_COMORBIDS'] = $this->H_COMORBIDS->CurrentValue;
        $row['SEXUAL_DYSFUNCTION'] = $this->SEXUAL_DYSFUNCTION->CurrentValue;
        $row['TABLETS'] = $this->TABLETS->CurrentValue;
        $row['FOLLICLE_STATUS'] = $this->FOLLICLE_STATUS->CurrentValue;
        $row['NUMBER_OF_IUI'] = $this->NUMBER_OF_IUI->CurrentValue;
        $row['PROCEDURE'] = $this->PROCEDURE->CurrentValue;
        $row['LUTEAL_SUPPORT'] = $this->LUTEAL_SUPPORT->CurrentValue;
        $row['SPECIFIC_MATERNAL_PROBLEMS'] = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
        $row['ONGOING_PREG'] = $this->ONGOING_PREG->CurrentValue;
        $row['EDD_Date'] = $this->EDD_Date->CurrentValue;
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

        // ARTCycle

        // FemaleFactor

        // MaleFactor

        // Protocol

        // SemenFrozen

        // A4ICSICycle

        // TotalICSICycle

        // TypeOfInfertility

        // Duration

        // LMP

        // RelevantHistory

        // IUICycles

        // AFC

        // AMH

        // FBMI

        // MBMI

        // OvarianVolumeRT

        // OvarianVolumeLT

        // DAYSOFSTIMULATION

        // DOSEOFGONADOTROPINS

        // INJTYPE

        // ANTAGONISTDAYS

        // ANTAGONISTSTARTDAY

        // GROWTHHORMONE

        // PRETREATMENT

        // SerumP4

        // FORT

        // MedicalFactors

        // SCDate

        // OvarianSurgery

        // PreProcedureOrder

        // TRIGGERR

        // TRIGGERDATE

        // ATHOMEorCLINIC

        // OPUDATE

        // ALLFREEZEINDICATION

        // ERA

        // PGTA

        // PGD

        // DATEOFET

        // ET

        // ESET

        // DOET

        // SEMENPREPARATION

        // REASONFORESET

        // Expectedoocytes

        // StChDate1

        // StChDate2

        // StChDate3

        // StChDate4

        // StChDate5

        // StChDate6

        // StChDate7

        // StChDate8

        // StChDate9

        // StChDate10

        // StChDate11

        // StChDate12

        // StChDate13

        // CycleDay1

        // CycleDay2

        // CycleDay3

        // CycleDay4

        // CycleDay5

        // CycleDay6

        // CycleDay7

        // CycleDay8

        // CycleDay9

        // CycleDay10

        // CycleDay11

        // CycleDay12

        // CycleDay13

        // StimulationDay1

        // StimulationDay2

        // StimulationDay3

        // StimulationDay4

        // StimulationDay5

        // StimulationDay6

        // StimulationDay7

        // StimulationDay8

        // StimulationDay9

        // StimulationDay10

        // StimulationDay11

        // StimulationDay12

        // StimulationDay13

        // Tablet1

        // Tablet2

        // Tablet3

        // Tablet4

        // Tablet5

        // Tablet6

        // Tablet7

        // Tablet8

        // Tablet9

        // Tablet10

        // Tablet11

        // Tablet12

        // Tablet13

        // RFSH1

        // RFSH2

        // RFSH3

        // RFSH4

        // RFSH5

        // RFSH6

        // RFSH7

        // RFSH8

        // RFSH9

        // RFSH10

        // RFSH11

        // RFSH12

        // RFSH13

        // HMG1

        // HMG2

        // HMG3

        // HMG4

        // HMG5

        // HMG6

        // HMG7

        // HMG8

        // HMG9

        // HMG10

        // HMG11

        // HMG12

        // HMG13

        // GnRH1

        // GnRH2

        // GnRH3

        // GnRH4

        // GnRH5

        // GnRH6

        // GnRH7

        // GnRH8

        // GnRH9

        // GnRH10

        // GnRH11

        // GnRH12

        // GnRH13

        // E21

        // E22

        // E23

        // E24

        // E25

        // E26

        // E27

        // E28

        // E29

        // E210

        // E211

        // E212

        // E213

        // P41

        // P42

        // P43

        // P44

        // P45

        // P46

        // P47

        // P48

        // P49

        // P410

        // P411

        // P412

        // P413

        // USGRt1

        // USGRt2

        // USGRt3

        // USGRt4

        // USGRt5

        // USGRt6

        // USGRt7

        // USGRt8

        // USGRt9

        // USGRt10

        // USGRt11

        // USGRt12

        // USGRt13

        // USGLt1

        // USGLt2

        // USGLt3

        // USGLt4

        // USGLt5

        // USGLt6

        // USGLt7

        // USGLt8

        // USGLt9

        // USGLt10

        // USGLt11

        // USGLt12

        // USGLt13

        // EM1

        // EM2

        // EM3

        // EM4

        // EM5

        // EM6

        // EM7

        // EM8

        // EM9

        // EM10

        // EM11

        // EM12

        // EM13

        // Others1

        // Others2

        // Others3

        // Others4

        // Others5

        // Others6

        // Others7

        // Others8

        // Others9

        // Others10

        // Others11

        // Others12

        // Others13

        // DR1

        // DR2

        // DR3

        // DR4

        // DR5

        // DR6

        // DR7

        // DR8

        // DR9

        // DR10

        // DR11

        // DR12

        // DR13

        // DOCTORRESPONSIBLE

        // TidNo

        // Convert

        // Consultant

        // InseminatinTechnique

        // IndicationForART

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // UCLcm

        // DATOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // ViaAdmin

        // ViaStartDateTime

        // ViaDose

        // AllFreeze

        // TreatmentCancel

        // Reason

        // ProgesteroneAdmin

        // ProgesteroneStart

        // ProgesteroneDose

        // StChDate14

        // StChDate15

        // StChDate16

        // StChDate17

        // StChDate18

        // StChDate19

        // StChDate20

        // StChDate21

        // StChDate22

        // StChDate23

        // StChDate24

        // StChDate25

        // CycleDay14

        // CycleDay15

        // CycleDay16

        // CycleDay17

        // CycleDay18

        // CycleDay19

        // CycleDay20

        // CycleDay21

        // CycleDay22

        // CycleDay23

        // CycleDay24

        // CycleDay25

        // StimulationDay14

        // StimulationDay15

        // StimulationDay16

        // StimulationDay17

        // StimulationDay18

        // StimulationDay19

        // StimulationDay20

        // StimulationDay21

        // StimulationDay22

        // StimulationDay23

        // StimulationDay24

        // StimulationDay25

        // Tablet14

        // Tablet15

        // Tablet16

        // Tablet17

        // Tablet18

        // Tablet19

        // Tablet20

        // Tablet21

        // Tablet22

        // Tablet23

        // Tablet24

        // Tablet25

        // RFSH14

        // RFSH15

        // RFSH16

        // RFSH17

        // RFSH18

        // RFSH19

        // RFSH20

        // RFSH21

        // RFSH22

        // RFSH23

        // RFSH24

        // RFSH25

        // HMG14

        // HMG15

        // HMG16

        // HMG17

        // HMG18

        // HMG19

        // HMG20

        // HMG21

        // HMG22

        // HMG23

        // HMG24

        // HMG25

        // GnRH14

        // GnRH15

        // GnRH16

        // GnRH17

        // GnRH18

        // GnRH19

        // GnRH20

        // GnRH21

        // GnRH22

        // GnRH23

        // GnRH24

        // GnRH25

        // P414

        // P415

        // P416

        // P417

        // P418

        // P419

        // P420

        // P421

        // P422

        // P423

        // P424

        // P425

        // USGRt14

        // USGRt15

        // USGRt16

        // USGRt17

        // USGRt18

        // USGRt19

        // USGRt20

        // USGRt21

        // USGRt22

        // USGRt23

        // USGRt24

        // USGRt25

        // USGLt14

        // USGLt15

        // USGLt16

        // USGLt17

        // USGLt18

        // USGLt19

        // USGLt20

        // USGLt21

        // USGLt22

        // USGLt23

        // USGLt24

        // USGLt25

        // EM14

        // EM15

        // EM16

        // EM17

        // EM18

        // EM19

        // EM20

        // EM21

        // EM22

        // EM23

        // EM24

        // EM25

        // Others14

        // Others15

        // Others16

        // Others17

        // Others18

        // Others19

        // Others20

        // Others21

        // Others22

        // Others23

        // Others24

        // Others25

        // DR14

        // DR15

        // DR16

        // DR17

        // DR18

        // DR19

        // DR20

        // DR21

        // DR22

        // DR23

        // DR24

        // DR25

        // E214

        // E215

        // E216

        // E217

        // E218

        // E219

        // E220

        // E221

        // E222

        // E223

        // E224

        // E225

        // EEETTTDTE

        // bhcgdate

        // TUBAL_PATENCY

        // HSG

        // DHL

        // UTERINE_PROBLEMS

        // W_COMORBIDS

        // H_COMORBIDS

        // SEXUAL_DYSFUNCTION

        // TABLETS

        // FOLLICLE_STATUS

        // NUMBER_OF_IUI

        // PROCEDURE

        // LUTEAL_SUPPORT

        // SPECIFIC_MATERNAL_PROBLEMS

        // ONGOING_PREG

        // EDD_Date
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

            // FemaleFactor
            $this->FemaleFactor->ViewValue = $this->FemaleFactor->CurrentValue;
            $this->FemaleFactor->ViewCustomAttributes = "";

            // MaleFactor
            $this->MaleFactor->ViewValue = $this->MaleFactor->CurrentValue;
            $this->MaleFactor->ViewCustomAttributes = "";

            // Protocol
            $this->Protocol->ViewValue = $this->Protocol->CurrentValue;
            $this->Protocol->ViewCustomAttributes = "";

            // SemenFrozen
            $this->SemenFrozen->ViewValue = $this->SemenFrozen->CurrentValue;
            $this->SemenFrozen->ViewCustomAttributes = "";

            // A4ICSICycle
            $this->A4ICSICycle->ViewValue = $this->A4ICSICycle->CurrentValue;
            $this->A4ICSICycle->ViewCustomAttributes = "";

            // TotalICSICycle
            $this->TotalICSICycle->ViewValue = $this->TotalICSICycle->CurrentValue;
            $this->TotalICSICycle->ViewCustomAttributes = "";

            // TypeOfInfertility
            $this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->CurrentValue;
            $this->TypeOfInfertility->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
            $this->LMP->ViewCustomAttributes = "";

            // RelevantHistory
            $this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
            $this->RelevantHistory->ViewCustomAttributes = "";

            // IUICycles
            $this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
            $this->IUICycles->ViewCustomAttributes = "";

            // AFC
            $this->AFC->ViewValue = $this->AFC->CurrentValue;
            $this->AFC->ViewCustomAttributes = "";

            // AMH
            $this->AMH->ViewValue = $this->AMH->CurrentValue;
            $this->AMH->ViewCustomAttributes = "";

            // FBMI
            $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
            $this->FBMI->ViewCustomAttributes = "";

            // MBMI
            $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
            $this->MBMI->ViewCustomAttributes = "";

            // OvarianVolumeRT
            $this->OvarianVolumeRT->ViewValue = $this->OvarianVolumeRT->CurrentValue;
            $this->OvarianVolumeRT->ViewCustomAttributes = "";

            // OvarianVolumeLT
            $this->OvarianVolumeLT->ViewValue = $this->OvarianVolumeLT->CurrentValue;
            $this->OvarianVolumeLT->ViewCustomAttributes = "";

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
            $this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

            // DOSEOFGONADOTROPINS
            $this->DOSEOFGONADOTROPINS->ViewValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
            $this->DOSEOFGONADOTROPINS->ViewCustomAttributes = "";

            // INJTYPE
            $this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
            $this->INJTYPE->ViewCustomAttributes = "";

            // ANTAGONISTDAYS
            $this->ANTAGONISTDAYS->ViewValue = $this->ANTAGONISTDAYS->CurrentValue;
            $this->ANTAGONISTDAYS->ViewCustomAttributes = "";

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
            $this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

            // GROWTHHORMONE
            $this->GROWTHHORMONE->ViewValue = $this->GROWTHHORMONE->CurrentValue;
            $this->GROWTHHORMONE->ViewCustomAttributes = "";

            // PRETREATMENT
            $this->PRETREATMENT->ViewValue = $this->PRETREATMENT->CurrentValue;
            $this->PRETREATMENT->ViewCustomAttributes = "";

            // SerumP4
            $this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
            $this->SerumP4->ViewCustomAttributes = "";

            // FORT
            $this->FORT->ViewValue = $this->FORT->CurrentValue;
            $this->FORT->ViewCustomAttributes = "";

            // MedicalFactors
            $this->MedicalFactors->ViewValue = $this->MedicalFactors->CurrentValue;
            $this->MedicalFactors->ViewCustomAttributes = "";

            // SCDate
            $this->SCDate->ViewValue = $this->SCDate->CurrentValue;
            $this->SCDate->ViewValue = FormatDateTime($this->SCDate->ViewValue, 0);
            $this->SCDate->ViewCustomAttributes = "";

            // OvarianSurgery
            $this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
            $this->OvarianSurgery->ViewCustomAttributes = "";

            // PreProcedureOrder
            $this->PreProcedureOrder->ViewValue = $this->PreProcedureOrder->CurrentValue;
            $this->PreProcedureOrder->ViewCustomAttributes = "";

            // TRIGGERR
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
            $this->TRIGGERR->ViewCustomAttributes = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
            $this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
            $this->TRIGGERDATE->ViewCustomAttributes = "";

            // ATHOMEorCLINIC
            $this->ATHOMEorCLINIC->ViewValue = $this->ATHOMEorCLINIC->CurrentValue;
            $this->ATHOMEorCLINIC->ViewCustomAttributes = "";

            // OPUDATE
            $this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
            $this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
            $this->OPUDATE->ViewCustomAttributes = "";

            // ALLFREEZEINDICATION
            $this->ALLFREEZEINDICATION->ViewValue = $this->ALLFREEZEINDICATION->CurrentValue;
            $this->ALLFREEZEINDICATION->ViewCustomAttributes = "";

            // ERA
            $this->ERA->ViewValue = $this->ERA->CurrentValue;
            $this->ERA->ViewCustomAttributes = "";

            // PGTA
            $this->PGTA->ViewValue = $this->PGTA->CurrentValue;
            $this->PGTA->ViewCustomAttributes = "";

            // PGD
            $this->PGD->ViewValue = $this->PGD->CurrentValue;
            $this->PGD->ViewCustomAttributes = "";

            // DATEOFET
            $this->DATEOFET->ViewValue = $this->DATEOFET->CurrentValue;
            $this->DATEOFET->ViewValue = FormatDateTime($this->DATEOFET->ViewValue, 0);
            $this->DATEOFET->ViewCustomAttributes = "";

            // ET
            $this->ET->ViewValue = $this->ET->CurrentValue;
            $this->ET->ViewCustomAttributes = "";

            // ESET
            $this->ESET->ViewValue = $this->ESET->CurrentValue;
            $this->ESET->ViewCustomAttributes = "";

            // DOET
            $this->DOET->ViewValue = $this->DOET->CurrentValue;
            $this->DOET->ViewCustomAttributes = "";

            // SEMENPREPARATION
            $this->SEMENPREPARATION->ViewValue = $this->SEMENPREPARATION->CurrentValue;
            $this->SEMENPREPARATION->ViewCustomAttributes = "";

            // REASONFORESET
            $this->REASONFORESET->ViewValue = $this->REASONFORESET->CurrentValue;
            $this->REASONFORESET->ViewCustomAttributes = "";

            // Expectedoocytes
            $this->Expectedoocytes->ViewValue = $this->Expectedoocytes->CurrentValue;
            $this->Expectedoocytes->ViewCustomAttributes = "";

            // StChDate1
            $this->StChDate1->ViewValue = $this->StChDate1->CurrentValue;
            $this->StChDate1->ViewValue = FormatDateTime($this->StChDate1->ViewValue, 0);
            $this->StChDate1->ViewCustomAttributes = "";

            // StChDate2
            $this->StChDate2->ViewValue = $this->StChDate2->CurrentValue;
            $this->StChDate2->ViewValue = FormatDateTime($this->StChDate2->ViewValue, 0);
            $this->StChDate2->ViewCustomAttributes = "";

            // StChDate3
            $this->StChDate3->ViewValue = $this->StChDate3->CurrentValue;
            $this->StChDate3->ViewValue = FormatDateTime($this->StChDate3->ViewValue, 0);
            $this->StChDate3->ViewCustomAttributes = "";

            // StChDate4
            $this->StChDate4->ViewValue = $this->StChDate4->CurrentValue;
            $this->StChDate4->ViewValue = FormatDateTime($this->StChDate4->ViewValue, 0);
            $this->StChDate4->ViewCustomAttributes = "";

            // StChDate5
            $this->StChDate5->ViewValue = $this->StChDate5->CurrentValue;
            $this->StChDate5->ViewValue = FormatDateTime($this->StChDate5->ViewValue, 0);
            $this->StChDate5->ViewCustomAttributes = "";

            // StChDate6
            $this->StChDate6->ViewValue = $this->StChDate6->CurrentValue;
            $this->StChDate6->ViewValue = FormatDateTime($this->StChDate6->ViewValue, 0);
            $this->StChDate6->ViewCustomAttributes = "";

            // StChDate7
            $this->StChDate7->ViewValue = $this->StChDate7->CurrentValue;
            $this->StChDate7->ViewValue = FormatDateTime($this->StChDate7->ViewValue, 0);
            $this->StChDate7->ViewCustomAttributes = "";

            // StChDate8
            $this->StChDate8->ViewValue = $this->StChDate8->CurrentValue;
            $this->StChDate8->ViewValue = FormatDateTime($this->StChDate8->ViewValue, 0);
            $this->StChDate8->ViewCustomAttributes = "";

            // StChDate9
            $this->StChDate9->ViewValue = $this->StChDate9->CurrentValue;
            $this->StChDate9->ViewValue = FormatDateTime($this->StChDate9->ViewValue, 0);
            $this->StChDate9->ViewCustomAttributes = "";

            // StChDate10
            $this->StChDate10->ViewValue = $this->StChDate10->CurrentValue;
            $this->StChDate10->ViewValue = FormatDateTime($this->StChDate10->ViewValue, 0);
            $this->StChDate10->ViewCustomAttributes = "";

            // StChDate11
            $this->StChDate11->ViewValue = $this->StChDate11->CurrentValue;
            $this->StChDate11->ViewValue = FormatDateTime($this->StChDate11->ViewValue, 0);
            $this->StChDate11->ViewCustomAttributes = "";

            // StChDate12
            $this->StChDate12->ViewValue = $this->StChDate12->CurrentValue;
            $this->StChDate12->ViewValue = FormatDateTime($this->StChDate12->ViewValue, 0);
            $this->StChDate12->ViewCustomAttributes = "";

            // StChDate13
            $this->StChDate13->ViewValue = $this->StChDate13->CurrentValue;
            $this->StChDate13->ViewValue = FormatDateTime($this->StChDate13->ViewValue, 0);
            $this->StChDate13->ViewCustomAttributes = "";

            // CycleDay1
            $this->CycleDay1->ViewValue = $this->CycleDay1->CurrentValue;
            $this->CycleDay1->ViewCustomAttributes = "";

            // CycleDay2
            $this->CycleDay2->ViewValue = $this->CycleDay2->CurrentValue;
            $this->CycleDay2->ViewCustomAttributes = "";

            // CycleDay3
            $this->CycleDay3->ViewValue = $this->CycleDay3->CurrentValue;
            $this->CycleDay3->ViewCustomAttributes = "";

            // CycleDay4
            $this->CycleDay4->ViewValue = $this->CycleDay4->CurrentValue;
            $this->CycleDay4->ViewCustomAttributes = "";

            // CycleDay5
            $this->CycleDay5->ViewValue = $this->CycleDay5->CurrentValue;
            $this->CycleDay5->ViewCustomAttributes = "";

            // CycleDay6
            $this->CycleDay6->ViewValue = $this->CycleDay6->CurrentValue;
            $this->CycleDay6->ViewCustomAttributes = "";

            // CycleDay7
            $this->CycleDay7->ViewValue = $this->CycleDay7->CurrentValue;
            $this->CycleDay7->ViewCustomAttributes = "";

            // CycleDay8
            $this->CycleDay8->ViewValue = $this->CycleDay8->CurrentValue;
            $this->CycleDay8->ViewCustomAttributes = "";

            // CycleDay9
            $this->CycleDay9->ViewValue = $this->CycleDay9->CurrentValue;
            $this->CycleDay9->ViewCustomAttributes = "";

            // CycleDay10
            $this->CycleDay10->ViewValue = $this->CycleDay10->CurrentValue;
            $this->CycleDay10->ViewCustomAttributes = "";

            // CycleDay11
            $this->CycleDay11->ViewValue = $this->CycleDay11->CurrentValue;
            $this->CycleDay11->ViewCustomAttributes = "";

            // CycleDay12
            $this->CycleDay12->ViewValue = $this->CycleDay12->CurrentValue;
            $this->CycleDay12->ViewCustomAttributes = "";

            // CycleDay13
            $this->CycleDay13->ViewValue = $this->CycleDay13->CurrentValue;
            $this->CycleDay13->ViewCustomAttributes = "";

            // StimulationDay1
            $this->StimulationDay1->ViewValue = $this->StimulationDay1->CurrentValue;
            $this->StimulationDay1->ViewCustomAttributes = "";

            // StimulationDay2
            $this->StimulationDay2->ViewValue = $this->StimulationDay2->CurrentValue;
            $this->StimulationDay2->ViewCustomAttributes = "";

            // StimulationDay3
            $this->StimulationDay3->ViewValue = $this->StimulationDay3->CurrentValue;
            $this->StimulationDay3->ViewCustomAttributes = "";

            // StimulationDay4
            $this->StimulationDay4->ViewValue = $this->StimulationDay4->CurrentValue;
            $this->StimulationDay4->ViewCustomAttributes = "";

            // StimulationDay5
            $this->StimulationDay5->ViewValue = $this->StimulationDay5->CurrentValue;
            $this->StimulationDay5->ViewCustomAttributes = "";

            // StimulationDay6
            $this->StimulationDay6->ViewValue = $this->StimulationDay6->CurrentValue;
            $this->StimulationDay6->ViewCustomAttributes = "";

            // StimulationDay7
            $this->StimulationDay7->ViewValue = $this->StimulationDay7->CurrentValue;
            $this->StimulationDay7->ViewCustomAttributes = "";

            // StimulationDay8
            $this->StimulationDay8->ViewValue = $this->StimulationDay8->CurrentValue;
            $this->StimulationDay8->ViewCustomAttributes = "";

            // StimulationDay9
            $this->StimulationDay9->ViewValue = $this->StimulationDay9->CurrentValue;
            $this->StimulationDay9->ViewCustomAttributes = "";

            // StimulationDay10
            $this->StimulationDay10->ViewValue = $this->StimulationDay10->CurrentValue;
            $this->StimulationDay10->ViewCustomAttributes = "";

            // StimulationDay11
            $this->StimulationDay11->ViewValue = $this->StimulationDay11->CurrentValue;
            $this->StimulationDay11->ViewCustomAttributes = "";

            // StimulationDay12
            $this->StimulationDay12->ViewValue = $this->StimulationDay12->CurrentValue;
            $this->StimulationDay12->ViewCustomAttributes = "";

            // StimulationDay13
            $this->StimulationDay13->ViewValue = $this->StimulationDay13->CurrentValue;
            $this->StimulationDay13->ViewCustomAttributes = "";

            // Tablet1
            $this->Tablet1->ViewValue = $this->Tablet1->CurrentValue;
            $this->Tablet1->ViewCustomAttributes = "";

            // Tablet2
            $this->Tablet2->ViewValue = $this->Tablet2->CurrentValue;
            $this->Tablet2->ViewCustomAttributes = "";

            // Tablet3
            $this->Tablet3->ViewValue = $this->Tablet3->CurrentValue;
            $this->Tablet3->ViewCustomAttributes = "";

            // Tablet4
            $this->Tablet4->ViewValue = $this->Tablet4->CurrentValue;
            $this->Tablet4->ViewCustomAttributes = "";

            // Tablet5
            $this->Tablet5->ViewValue = $this->Tablet5->CurrentValue;
            $this->Tablet5->ViewCustomAttributes = "";

            // Tablet6
            $this->Tablet6->ViewValue = $this->Tablet6->CurrentValue;
            $this->Tablet6->ViewCustomAttributes = "";

            // Tablet7
            $this->Tablet7->ViewValue = $this->Tablet7->CurrentValue;
            $this->Tablet7->ViewCustomAttributes = "";

            // Tablet8
            $this->Tablet8->ViewValue = $this->Tablet8->CurrentValue;
            $this->Tablet8->ViewCustomAttributes = "";

            // Tablet9
            $this->Tablet9->ViewValue = $this->Tablet9->CurrentValue;
            $this->Tablet9->ViewCustomAttributes = "";

            // Tablet10
            $this->Tablet10->ViewValue = $this->Tablet10->CurrentValue;
            $this->Tablet10->ViewCustomAttributes = "";

            // Tablet11
            $this->Tablet11->ViewValue = $this->Tablet11->CurrentValue;
            $this->Tablet11->ViewCustomAttributes = "";

            // Tablet12
            $this->Tablet12->ViewValue = $this->Tablet12->CurrentValue;
            $this->Tablet12->ViewCustomAttributes = "";

            // Tablet13
            $this->Tablet13->ViewValue = $this->Tablet13->CurrentValue;
            $this->Tablet13->ViewCustomAttributes = "";

            // RFSH1
            $this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
            $this->RFSH1->ViewCustomAttributes = "";

            // RFSH2
            $this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
            $this->RFSH2->ViewCustomAttributes = "";

            // RFSH3
            $this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
            $this->RFSH3->ViewCustomAttributes = "";

            // RFSH4
            $this->RFSH4->ViewValue = $this->RFSH4->CurrentValue;
            $this->RFSH4->ViewCustomAttributes = "";

            // RFSH5
            $this->RFSH5->ViewValue = $this->RFSH5->CurrentValue;
            $this->RFSH5->ViewCustomAttributes = "";

            // RFSH6
            $this->RFSH6->ViewValue = $this->RFSH6->CurrentValue;
            $this->RFSH6->ViewCustomAttributes = "";

            // RFSH7
            $this->RFSH7->ViewValue = $this->RFSH7->CurrentValue;
            $this->RFSH7->ViewCustomAttributes = "";

            // RFSH8
            $this->RFSH8->ViewValue = $this->RFSH8->CurrentValue;
            $this->RFSH8->ViewCustomAttributes = "";

            // RFSH9
            $this->RFSH9->ViewValue = $this->RFSH9->CurrentValue;
            $this->RFSH9->ViewCustomAttributes = "";

            // RFSH10
            $this->RFSH10->ViewValue = $this->RFSH10->CurrentValue;
            $this->RFSH10->ViewCustomAttributes = "";

            // RFSH11
            $this->RFSH11->ViewValue = $this->RFSH11->CurrentValue;
            $this->RFSH11->ViewCustomAttributes = "";

            // RFSH12
            $this->RFSH12->ViewValue = $this->RFSH12->CurrentValue;
            $this->RFSH12->ViewCustomAttributes = "";

            // RFSH13
            $this->RFSH13->ViewValue = $this->RFSH13->CurrentValue;
            $this->RFSH13->ViewCustomAttributes = "";

            // HMG1
            $this->HMG1->ViewValue = $this->HMG1->CurrentValue;
            $this->HMG1->ViewCustomAttributes = "";

            // HMG2
            $this->HMG2->ViewValue = $this->HMG2->CurrentValue;
            $this->HMG2->ViewCustomAttributes = "";

            // HMG3
            $this->HMG3->ViewValue = $this->HMG3->CurrentValue;
            $this->HMG3->ViewCustomAttributes = "";

            // HMG4
            $this->HMG4->ViewValue = $this->HMG4->CurrentValue;
            $this->HMG4->ViewCustomAttributes = "";

            // HMG5
            $this->HMG5->ViewValue = $this->HMG5->CurrentValue;
            $this->HMG5->ViewCustomAttributes = "";

            // HMG6
            $this->HMG6->ViewValue = $this->HMG6->CurrentValue;
            $this->HMG6->ViewCustomAttributes = "";

            // HMG7
            $this->HMG7->ViewValue = $this->HMG7->CurrentValue;
            $this->HMG7->ViewCustomAttributes = "";

            // HMG8
            $this->HMG8->ViewValue = $this->HMG8->CurrentValue;
            $this->HMG8->ViewCustomAttributes = "";

            // HMG9
            $this->HMG9->ViewValue = $this->HMG9->CurrentValue;
            $this->HMG9->ViewCustomAttributes = "";

            // HMG10
            $this->HMG10->ViewValue = $this->HMG10->CurrentValue;
            $this->HMG10->ViewCustomAttributes = "";

            // HMG11
            $this->HMG11->ViewValue = $this->HMG11->CurrentValue;
            $this->HMG11->ViewCustomAttributes = "";

            // HMG12
            $this->HMG12->ViewValue = $this->HMG12->CurrentValue;
            $this->HMG12->ViewCustomAttributes = "";

            // HMG13
            $this->HMG13->ViewValue = $this->HMG13->CurrentValue;
            $this->HMG13->ViewCustomAttributes = "";

            // GnRH1
            $this->GnRH1->ViewValue = $this->GnRH1->CurrentValue;
            $this->GnRH1->ViewCustomAttributes = "";

            // GnRH2
            $this->GnRH2->ViewValue = $this->GnRH2->CurrentValue;
            $this->GnRH2->ViewCustomAttributes = "";

            // GnRH3
            $this->GnRH3->ViewValue = $this->GnRH3->CurrentValue;
            $this->GnRH3->ViewCustomAttributes = "";

            // GnRH4
            $this->GnRH4->ViewValue = $this->GnRH4->CurrentValue;
            $this->GnRH4->ViewCustomAttributes = "";

            // GnRH5
            $this->GnRH5->ViewValue = $this->GnRH5->CurrentValue;
            $this->GnRH5->ViewCustomAttributes = "";

            // GnRH6
            $this->GnRH6->ViewValue = $this->GnRH6->CurrentValue;
            $this->GnRH6->ViewCustomAttributes = "";

            // GnRH7
            $this->GnRH7->ViewValue = $this->GnRH7->CurrentValue;
            $this->GnRH7->ViewCustomAttributes = "";

            // GnRH8
            $this->GnRH8->ViewValue = $this->GnRH8->CurrentValue;
            $this->GnRH8->ViewCustomAttributes = "";

            // GnRH9
            $this->GnRH9->ViewValue = $this->GnRH9->CurrentValue;
            $this->GnRH9->ViewCustomAttributes = "";

            // GnRH10
            $this->GnRH10->ViewValue = $this->GnRH10->CurrentValue;
            $this->GnRH10->ViewCustomAttributes = "";

            // GnRH11
            $this->GnRH11->ViewValue = $this->GnRH11->CurrentValue;
            $this->GnRH11->ViewCustomAttributes = "";

            // GnRH12
            $this->GnRH12->ViewValue = $this->GnRH12->CurrentValue;
            $this->GnRH12->ViewCustomAttributes = "";

            // GnRH13
            $this->GnRH13->ViewValue = $this->GnRH13->CurrentValue;
            $this->GnRH13->ViewCustomAttributes = "";

            // E21
            $this->E21->ViewValue = $this->E21->CurrentValue;
            $this->E21->ViewCustomAttributes = "";

            // E22
            $this->E22->ViewValue = $this->E22->CurrentValue;
            $this->E22->ViewCustomAttributes = "";

            // E23
            $this->E23->ViewValue = $this->E23->CurrentValue;
            $this->E23->ViewCustomAttributes = "";

            // E24
            $this->E24->ViewValue = $this->E24->CurrentValue;
            $this->E24->ViewCustomAttributes = "";

            // E25
            $this->E25->ViewValue = $this->E25->CurrentValue;
            $this->E25->ViewCustomAttributes = "";

            // E26
            $this->E26->ViewValue = $this->E26->CurrentValue;
            $this->E26->ViewCustomAttributes = "";

            // E27
            $this->E27->ViewValue = $this->E27->CurrentValue;
            $this->E27->ViewCustomAttributes = "";

            // E28
            $this->E28->ViewValue = $this->E28->CurrentValue;
            $this->E28->ViewCustomAttributes = "";

            // E29
            $this->E29->ViewValue = $this->E29->CurrentValue;
            $this->E29->ViewCustomAttributes = "";

            // E210
            $this->E210->ViewValue = $this->E210->CurrentValue;
            $this->E210->ViewCustomAttributes = "";

            // E211
            $this->E211->ViewValue = $this->E211->CurrentValue;
            $this->E211->ViewCustomAttributes = "";

            // E212
            $this->E212->ViewValue = $this->E212->CurrentValue;
            $this->E212->ViewCustomAttributes = "";

            // E213
            $this->E213->ViewValue = $this->E213->CurrentValue;
            $this->E213->ViewCustomAttributes = "";

            // P41
            $this->P41->ViewValue = $this->P41->CurrentValue;
            $this->P41->ViewCustomAttributes = "";

            // P42
            $this->P42->ViewValue = $this->P42->CurrentValue;
            $this->P42->ViewCustomAttributes = "";

            // P43
            $this->P43->ViewValue = $this->P43->CurrentValue;
            $this->P43->ViewCustomAttributes = "";

            // P44
            $this->P44->ViewValue = $this->P44->CurrentValue;
            $this->P44->ViewCustomAttributes = "";

            // P45
            $this->P45->ViewValue = $this->P45->CurrentValue;
            $this->P45->ViewCustomAttributes = "";

            // P46
            $this->P46->ViewValue = $this->P46->CurrentValue;
            $this->P46->ViewCustomAttributes = "";

            // P47
            $this->P47->ViewValue = $this->P47->CurrentValue;
            $this->P47->ViewCustomAttributes = "";

            // P48
            $this->P48->ViewValue = $this->P48->CurrentValue;
            $this->P48->ViewCustomAttributes = "";

            // P49
            $this->P49->ViewValue = $this->P49->CurrentValue;
            $this->P49->ViewCustomAttributes = "";

            // P410
            $this->P410->ViewValue = $this->P410->CurrentValue;
            $this->P410->ViewCustomAttributes = "";

            // P411
            $this->P411->ViewValue = $this->P411->CurrentValue;
            $this->P411->ViewCustomAttributes = "";

            // P412
            $this->P412->ViewValue = $this->P412->CurrentValue;
            $this->P412->ViewCustomAttributes = "";

            // P413
            $this->P413->ViewValue = $this->P413->CurrentValue;
            $this->P413->ViewCustomAttributes = "";

            // USGRt1
            $this->USGRt1->ViewValue = $this->USGRt1->CurrentValue;
            $this->USGRt1->ViewCustomAttributes = "";

            // USGRt2
            $this->USGRt2->ViewValue = $this->USGRt2->CurrentValue;
            $this->USGRt2->ViewCustomAttributes = "";

            // USGRt3
            $this->USGRt3->ViewValue = $this->USGRt3->CurrentValue;
            $this->USGRt3->ViewCustomAttributes = "";

            // USGRt4
            $this->USGRt4->ViewValue = $this->USGRt4->CurrentValue;
            $this->USGRt4->ViewCustomAttributes = "";

            // USGRt5
            $this->USGRt5->ViewValue = $this->USGRt5->CurrentValue;
            $this->USGRt5->ViewCustomAttributes = "";

            // USGRt6
            $this->USGRt6->ViewValue = $this->USGRt6->CurrentValue;
            $this->USGRt6->ViewCustomAttributes = "";

            // USGRt7
            $this->USGRt7->ViewValue = $this->USGRt7->CurrentValue;
            $this->USGRt7->ViewCustomAttributes = "";

            // USGRt8
            $this->USGRt8->ViewValue = $this->USGRt8->CurrentValue;
            $this->USGRt8->ViewCustomAttributes = "";

            // USGRt9
            $this->USGRt9->ViewValue = $this->USGRt9->CurrentValue;
            $this->USGRt9->ViewCustomAttributes = "";

            // USGRt10
            $this->USGRt10->ViewValue = $this->USGRt10->CurrentValue;
            $this->USGRt10->ViewCustomAttributes = "";

            // USGRt11
            $this->USGRt11->ViewValue = $this->USGRt11->CurrentValue;
            $this->USGRt11->ViewCustomAttributes = "";

            // USGRt12
            $this->USGRt12->ViewValue = $this->USGRt12->CurrentValue;
            $this->USGRt12->ViewCustomAttributes = "";

            // USGRt13
            $this->USGRt13->ViewValue = $this->USGRt13->CurrentValue;
            $this->USGRt13->ViewCustomAttributes = "";

            // USGLt1
            $this->USGLt1->ViewValue = $this->USGLt1->CurrentValue;
            $this->USGLt1->ViewCustomAttributes = "";

            // USGLt2
            $this->USGLt2->ViewValue = $this->USGLt2->CurrentValue;
            $this->USGLt2->ViewCustomAttributes = "";

            // USGLt3
            $this->USGLt3->ViewValue = $this->USGLt3->CurrentValue;
            $this->USGLt3->ViewCustomAttributes = "";

            // USGLt4
            $this->USGLt4->ViewValue = $this->USGLt4->CurrentValue;
            $this->USGLt4->ViewCustomAttributes = "";

            // USGLt5
            $this->USGLt5->ViewValue = $this->USGLt5->CurrentValue;
            $this->USGLt5->ViewCustomAttributes = "";

            // USGLt6
            $this->USGLt6->ViewValue = $this->USGLt6->CurrentValue;
            $this->USGLt6->ViewCustomAttributes = "";

            // USGLt7
            $this->USGLt7->ViewValue = $this->USGLt7->CurrentValue;
            $this->USGLt7->ViewCustomAttributes = "";

            // USGLt8
            $this->USGLt8->ViewValue = $this->USGLt8->CurrentValue;
            $this->USGLt8->ViewCustomAttributes = "";

            // USGLt9
            $this->USGLt9->ViewValue = $this->USGLt9->CurrentValue;
            $this->USGLt9->ViewCustomAttributes = "";

            // USGLt10
            $this->USGLt10->ViewValue = $this->USGLt10->CurrentValue;
            $this->USGLt10->ViewCustomAttributes = "";

            // USGLt11
            $this->USGLt11->ViewValue = $this->USGLt11->CurrentValue;
            $this->USGLt11->ViewCustomAttributes = "";

            // USGLt12
            $this->USGLt12->ViewValue = $this->USGLt12->CurrentValue;
            $this->USGLt12->ViewCustomAttributes = "";

            // USGLt13
            $this->USGLt13->ViewValue = $this->USGLt13->CurrentValue;
            $this->USGLt13->ViewCustomAttributes = "";

            // EM1
            $this->EM1->ViewValue = $this->EM1->CurrentValue;
            $this->EM1->ViewCustomAttributes = "";

            // EM2
            $this->EM2->ViewValue = $this->EM2->CurrentValue;
            $this->EM2->ViewCustomAttributes = "";

            // EM3
            $this->EM3->ViewValue = $this->EM3->CurrentValue;
            $this->EM3->ViewCustomAttributes = "";

            // EM4
            $this->EM4->ViewValue = $this->EM4->CurrentValue;
            $this->EM4->ViewCustomAttributes = "";

            // EM5
            $this->EM5->ViewValue = $this->EM5->CurrentValue;
            $this->EM5->ViewCustomAttributes = "";

            // EM6
            $this->EM6->ViewValue = $this->EM6->CurrentValue;
            $this->EM6->ViewCustomAttributes = "";

            // EM7
            $this->EM7->ViewValue = $this->EM7->CurrentValue;
            $this->EM7->ViewCustomAttributes = "";

            // EM8
            $this->EM8->ViewValue = $this->EM8->CurrentValue;
            $this->EM8->ViewCustomAttributes = "";

            // EM9
            $this->EM9->ViewValue = $this->EM9->CurrentValue;
            $this->EM9->ViewCustomAttributes = "";

            // EM10
            $this->EM10->ViewValue = $this->EM10->CurrentValue;
            $this->EM10->ViewCustomAttributes = "";

            // EM11
            $this->EM11->ViewValue = $this->EM11->CurrentValue;
            $this->EM11->ViewCustomAttributes = "";

            // EM12
            $this->EM12->ViewValue = $this->EM12->CurrentValue;
            $this->EM12->ViewCustomAttributes = "";

            // EM13
            $this->EM13->ViewValue = $this->EM13->CurrentValue;
            $this->EM13->ViewCustomAttributes = "";

            // Others1
            $this->Others1->ViewValue = $this->Others1->CurrentValue;
            $this->Others1->ViewCustomAttributes = "";

            // Others2
            $this->Others2->ViewValue = $this->Others2->CurrentValue;
            $this->Others2->ViewCustomAttributes = "";

            // Others3
            $this->Others3->ViewValue = $this->Others3->CurrentValue;
            $this->Others3->ViewCustomAttributes = "";

            // Others4
            $this->Others4->ViewValue = $this->Others4->CurrentValue;
            $this->Others4->ViewCustomAttributes = "";

            // Others5
            $this->Others5->ViewValue = $this->Others5->CurrentValue;
            $this->Others5->ViewCustomAttributes = "";

            // Others6
            $this->Others6->ViewValue = $this->Others6->CurrentValue;
            $this->Others6->ViewCustomAttributes = "";

            // Others7
            $this->Others7->ViewValue = $this->Others7->CurrentValue;
            $this->Others7->ViewCustomAttributes = "";

            // Others8
            $this->Others8->ViewValue = $this->Others8->CurrentValue;
            $this->Others8->ViewCustomAttributes = "";

            // Others9
            $this->Others9->ViewValue = $this->Others9->CurrentValue;
            $this->Others9->ViewCustomAttributes = "";

            // Others10
            $this->Others10->ViewValue = $this->Others10->CurrentValue;
            $this->Others10->ViewCustomAttributes = "";

            // Others11
            $this->Others11->ViewValue = $this->Others11->CurrentValue;
            $this->Others11->ViewCustomAttributes = "";

            // Others12
            $this->Others12->ViewValue = $this->Others12->CurrentValue;
            $this->Others12->ViewCustomAttributes = "";

            // Others13
            $this->Others13->ViewValue = $this->Others13->CurrentValue;
            $this->Others13->ViewCustomAttributes = "";

            // DR1
            $this->DR1->ViewValue = $this->DR1->CurrentValue;
            $this->DR1->ViewCustomAttributes = "";

            // DR2
            $this->DR2->ViewValue = $this->DR2->CurrentValue;
            $this->DR2->ViewCustomAttributes = "";

            // DR3
            $this->DR3->ViewValue = $this->DR3->CurrentValue;
            $this->DR3->ViewCustomAttributes = "";

            // DR4
            $this->DR4->ViewValue = $this->DR4->CurrentValue;
            $this->DR4->ViewCustomAttributes = "";

            // DR5
            $this->DR5->ViewValue = $this->DR5->CurrentValue;
            $this->DR5->ViewCustomAttributes = "";

            // DR6
            $this->DR6->ViewValue = $this->DR6->CurrentValue;
            $this->DR6->ViewCustomAttributes = "";

            // DR7
            $this->DR7->ViewValue = $this->DR7->CurrentValue;
            $this->DR7->ViewCustomAttributes = "";

            // DR8
            $this->DR8->ViewValue = $this->DR8->CurrentValue;
            $this->DR8->ViewCustomAttributes = "";

            // DR9
            $this->DR9->ViewValue = $this->DR9->CurrentValue;
            $this->DR9->ViewCustomAttributes = "";

            // DR10
            $this->DR10->ViewValue = $this->DR10->CurrentValue;
            $this->DR10->ViewCustomAttributes = "";

            // DR11
            $this->DR11->ViewValue = $this->DR11->CurrentValue;
            $this->DR11->ViewCustomAttributes = "";

            // DR12
            $this->DR12->ViewValue = $this->DR12->CurrentValue;
            $this->DR12->ViewCustomAttributes = "";

            // DR13
            $this->DR13->ViewValue = $this->DR13->CurrentValue;
            $this->DR13->ViewCustomAttributes = "";

            // DOCTORRESPONSIBLE
            $this->DOCTORRESPONSIBLE->ViewValue = $this->DOCTORRESPONSIBLE->CurrentValue;
            $this->DOCTORRESPONSIBLE->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Convert
            $this->Convert->ViewValue = $this->Convert->CurrentValue;
            $this->Convert->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // Hysteroscopy
            $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
            $this->Hysteroscopy->ViewCustomAttributes = "";

            // EndometrialScratching
            $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->CurrentValue;
            $this->EndometrialScratching->ViewCustomAttributes = "";

            // TrialCannulation
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
            $this->TrialCannulation->ViewCustomAttributes = "";

            // CYCLETYPE
            $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->CurrentValue;
            $this->CYCLETYPE->ViewCustomAttributes = "";

            // HRTCYCLE
            $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
            $this->HRTCYCLE->ViewCustomAttributes = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->CurrentValue;
            $this->OralEstrogenDosage->ViewCustomAttributes = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
            $this->VaginalEstrogen->ViewCustomAttributes = "";

            // GCSF
            $this->GCSF->ViewValue = $this->GCSF->CurrentValue;
            $this->GCSF->ViewCustomAttributes = "";

            // ActivatedPRP
            $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->CurrentValue;
            $this->ActivatedPRP->ViewCustomAttributes = "";

            // UCLcm
            $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
            $this->UCLcm->ViewCustomAttributes = "";

            // DATOFEMBRYOTRANSFER
            $this->DATOFEMBRYOTRANSFER->ViewValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
            $this->DATOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATOFEMBRYOTRANSFER->ViewValue, 0);
            $this->DATOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
            $this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
            $this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
            $this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
            $this->DAYOFEMBRYOS->ViewCustomAttributes = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
            $this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

            // ViaAdmin
            $this->ViaAdmin->ViewValue = $this->ViaAdmin->CurrentValue;
            $this->ViaAdmin->ViewCustomAttributes = "";

            // ViaStartDateTime
            $this->ViaStartDateTime->ViewValue = $this->ViaStartDateTime->CurrentValue;
            $this->ViaStartDateTime->ViewValue = FormatDateTime($this->ViaStartDateTime->ViewValue, 0);
            $this->ViaStartDateTime->ViewCustomAttributes = "";

            // ViaDose
            $this->ViaDose->ViewValue = $this->ViaDose->CurrentValue;
            $this->ViaDose->ViewCustomAttributes = "";

            // AllFreeze
            $this->AllFreeze->ViewValue = $this->AllFreeze->CurrentValue;
            $this->AllFreeze->ViewCustomAttributes = "";

            // TreatmentCancel
            $this->TreatmentCancel->ViewValue = $this->TreatmentCancel->CurrentValue;
            $this->TreatmentCancel->ViewCustomAttributes = "";

            // Reason
            $this->Reason->ViewValue = $this->Reason->CurrentValue;
            $this->Reason->ViewCustomAttributes = "";

            // ProgesteroneAdmin
            $this->ProgesteroneAdmin->ViewValue = $this->ProgesteroneAdmin->CurrentValue;
            $this->ProgesteroneAdmin->ViewCustomAttributes = "";

            // ProgesteroneStart
            $this->ProgesteroneStart->ViewValue = $this->ProgesteroneStart->CurrentValue;
            $this->ProgesteroneStart->ViewCustomAttributes = "";

            // ProgesteroneDose
            $this->ProgesteroneDose->ViewValue = $this->ProgesteroneDose->CurrentValue;
            $this->ProgesteroneDose->ViewCustomAttributes = "";

            // StChDate14
            $this->StChDate14->ViewValue = $this->StChDate14->CurrentValue;
            $this->StChDate14->ViewValue = FormatDateTime($this->StChDate14->ViewValue, 0);
            $this->StChDate14->ViewCustomAttributes = "";

            // StChDate15
            $this->StChDate15->ViewValue = $this->StChDate15->CurrentValue;
            $this->StChDate15->ViewValue = FormatDateTime($this->StChDate15->ViewValue, 0);
            $this->StChDate15->ViewCustomAttributes = "";

            // StChDate16
            $this->StChDate16->ViewValue = $this->StChDate16->CurrentValue;
            $this->StChDate16->ViewValue = FormatDateTime($this->StChDate16->ViewValue, 0);
            $this->StChDate16->ViewCustomAttributes = "";

            // StChDate17
            $this->StChDate17->ViewValue = $this->StChDate17->CurrentValue;
            $this->StChDate17->ViewValue = FormatDateTime($this->StChDate17->ViewValue, 0);
            $this->StChDate17->ViewCustomAttributes = "";

            // StChDate18
            $this->StChDate18->ViewValue = $this->StChDate18->CurrentValue;
            $this->StChDate18->ViewValue = FormatDateTime($this->StChDate18->ViewValue, 0);
            $this->StChDate18->ViewCustomAttributes = "";

            // StChDate19
            $this->StChDate19->ViewValue = $this->StChDate19->CurrentValue;
            $this->StChDate19->ViewValue = FormatDateTime($this->StChDate19->ViewValue, 0);
            $this->StChDate19->ViewCustomAttributes = "";

            // StChDate20
            $this->StChDate20->ViewValue = $this->StChDate20->CurrentValue;
            $this->StChDate20->ViewValue = FormatDateTime($this->StChDate20->ViewValue, 0);
            $this->StChDate20->ViewCustomAttributes = "";

            // StChDate21
            $this->StChDate21->ViewValue = $this->StChDate21->CurrentValue;
            $this->StChDate21->ViewValue = FormatDateTime($this->StChDate21->ViewValue, 0);
            $this->StChDate21->ViewCustomAttributes = "";

            // StChDate22
            $this->StChDate22->ViewValue = $this->StChDate22->CurrentValue;
            $this->StChDate22->ViewValue = FormatDateTime($this->StChDate22->ViewValue, 0);
            $this->StChDate22->ViewCustomAttributes = "";

            // StChDate23
            $this->StChDate23->ViewValue = $this->StChDate23->CurrentValue;
            $this->StChDate23->ViewValue = FormatDateTime($this->StChDate23->ViewValue, 0);
            $this->StChDate23->ViewCustomAttributes = "";

            // StChDate24
            $this->StChDate24->ViewValue = $this->StChDate24->CurrentValue;
            $this->StChDate24->ViewValue = FormatDateTime($this->StChDate24->ViewValue, 0);
            $this->StChDate24->ViewCustomAttributes = "";

            // StChDate25
            $this->StChDate25->ViewValue = $this->StChDate25->CurrentValue;
            $this->StChDate25->ViewValue = FormatDateTime($this->StChDate25->ViewValue, 0);
            $this->StChDate25->ViewCustomAttributes = "";

            // CycleDay14
            $this->CycleDay14->ViewValue = $this->CycleDay14->CurrentValue;
            $this->CycleDay14->ViewCustomAttributes = "";

            // CycleDay15
            $this->CycleDay15->ViewValue = $this->CycleDay15->CurrentValue;
            $this->CycleDay15->ViewCustomAttributes = "";

            // CycleDay16
            $this->CycleDay16->ViewValue = $this->CycleDay16->CurrentValue;
            $this->CycleDay16->ViewCustomAttributes = "";

            // CycleDay17
            $this->CycleDay17->ViewValue = $this->CycleDay17->CurrentValue;
            $this->CycleDay17->ViewCustomAttributes = "";

            // CycleDay18
            $this->CycleDay18->ViewValue = $this->CycleDay18->CurrentValue;
            $this->CycleDay18->ViewCustomAttributes = "";

            // CycleDay19
            $this->CycleDay19->ViewValue = $this->CycleDay19->CurrentValue;
            $this->CycleDay19->ViewCustomAttributes = "";

            // CycleDay20
            $this->CycleDay20->ViewValue = $this->CycleDay20->CurrentValue;
            $this->CycleDay20->ViewCustomAttributes = "";

            // CycleDay21
            $this->CycleDay21->ViewValue = $this->CycleDay21->CurrentValue;
            $this->CycleDay21->ViewCustomAttributes = "";

            // CycleDay22
            $this->CycleDay22->ViewValue = $this->CycleDay22->CurrentValue;
            $this->CycleDay22->ViewCustomAttributes = "";

            // CycleDay23
            $this->CycleDay23->ViewValue = $this->CycleDay23->CurrentValue;
            $this->CycleDay23->ViewCustomAttributes = "";

            // CycleDay24
            $this->CycleDay24->ViewValue = $this->CycleDay24->CurrentValue;
            $this->CycleDay24->ViewCustomAttributes = "";

            // CycleDay25
            $this->CycleDay25->ViewValue = $this->CycleDay25->CurrentValue;
            $this->CycleDay25->ViewCustomAttributes = "";

            // StimulationDay14
            $this->StimulationDay14->ViewValue = $this->StimulationDay14->CurrentValue;
            $this->StimulationDay14->ViewCustomAttributes = "";

            // StimulationDay15
            $this->StimulationDay15->ViewValue = $this->StimulationDay15->CurrentValue;
            $this->StimulationDay15->ViewCustomAttributes = "";

            // StimulationDay16
            $this->StimulationDay16->ViewValue = $this->StimulationDay16->CurrentValue;
            $this->StimulationDay16->ViewCustomAttributes = "";

            // StimulationDay17
            $this->StimulationDay17->ViewValue = $this->StimulationDay17->CurrentValue;
            $this->StimulationDay17->ViewCustomAttributes = "";

            // StimulationDay18
            $this->StimulationDay18->ViewValue = $this->StimulationDay18->CurrentValue;
            $this->StimulationDay18->ViewCustomAttributes = "";

            // StimulationDay19
            $this->StimulationDay19->ViewValue = $this->StimulationDay19->CurrentValue;
            $this->StimulationDay19->ViewCustomAttributes = "";

            // StimulationDay20
            $this->StimulationDay20->ViewValue = $this->StimulationDay20->CurrentValue;
            $this->StimulationDay20->ViewCustomAttributes = "";

            // StimulationDay21
            $this->StimulationDay21->ViewValue = $this->StimulationDay21->CurrentValue;
            $this->StimulationDay21->ViewCustomAttributes = "";

            // StimulationDay22
            $this->StimulationDay22->ViewValue = $this->StimulationDay22->CurrentValue;
            $this->StimulationDay22->ViewCustomAttributes = "";

            // StimulationDay23
            $this->StimulationDay23->ViewValue = $this->StimulationDay23->CurrentValue;
            $this->StimulationDay23->ViewCustomAttributes = "";

            // StimulationDay24
            $this->StimulationDay24->ViewValue = $this->StimulationDay24->CurrentValue;
            $this->StimulationDay24->ViewCustomAttributes = "";

            // StimulationDay25
            $this->StimulationDay25->ViewValue = $this->StimulationDay25->CurrentValue;
            $this->StimulationDay25->ViewCustomAttributes = "";

            // Tablet14
            $this->Tablet14->ViewValue = $this->Tablet14->CurrentValue;
            $this->Tablet14->ViewCustomAttributes = "";

            // Tablet15
            $this->Tablet15->ViewValue = $this->Tablet15->CurrentValue;
            $this->Tablet15->ViewCustomAttributes = "";

            // Tablet16
            $this->Tablet16->ViewValue = $this->Tablet16->CurrentValue;
            $this->Tablet16->ViewCustomAttributes = "";

            // Tablet17
            $this->Tablet17->ViewValue = $this->Tablet17->CurrentValue;
            $this->Tablet17->ViewCustomAttributes = "";

            // Tablet18
            $this->Tablet18->ViewValue = $this->Tablet18->CurrentValue;
            $this->Tablet18->ViewCustomAttributes = "";

            // Tablet19
            $this->Tablet19->ViewValue = $this->Tablet19->CurrentValue;
            $this->Tablet19->ViewCustomAttributes = "";

            // Tablet20
            $this->Tablet20->ViewValue = $this->Tablet20->CurrentValue;
            $this->Tablet20->ViewCustomAttributes = "";

            // Tablet21
            $this->Tablet21->ViewValue = $this->Tablet21->CurrentValue;
            $this->Tablet21->ViewCustomAttributes = "";

            // Tablet22
            $this->Tablet22->ViewValue = $this->Tablet22->CurrentValue;
            $this->Tablet22->ViewCustomAttributes = "";

            // Tablet23
            $this->Tablet23->ViewValue = $this->Tablet23->CurrentValue;
            $this->Tablet23->ViewCustomAttributes = "";

            // Tablet24
            $this->Tablet24->ViewValue = $this->Tablet24->CurrentValue;
            $this->Tablet24->ViewCustomAttributes = "";

            // Tablet25
            $this->Tablet25->ViewValue = $this->Tablet25->CurrentValue;
            $this->Tablet25->ViewCustomAttributes = "";

            // RFSH14
            $this->RFSH14->ViewValue = $this->RFSH14->CurrentValue;
            $this->RFSH14->ViewCustomAttributes = "";

            // RFSH15
            $this->RFSH15->ViewValue = $this->RFSH15->CurrentValue;
            $this->RFSH15->ViewCustomAttributes = "";

            // RFSH16
            $this->RFSH16->ViewValue = $this->RFSH16->CurrentValue;
            $this->RFSH16->ViewCustomAttributes = "";

            // RFSH17
            $this->RFSH17->ViewValue = $this->RFSH17->CurrentValue;
            $this->RFSH17->ViewCustomAttributes = "";

            // RFSH18
            $this->RFSH18->ViewValue = $this->RFSH18->CurrentValue;
            $this->RFSH18->ViewCustomAttributes = "";

            // RFSH19
            $this->RFSH19->ViewValue = $this->RFSH19->CurrentValue;
            $this->RFSH19->ViewCustomAttributes = "";

            // RFSH20
            $this->RFSH20->ViewValue = $this->RFSH20->CurrentValue;
            $this->RFSH20->ViewCustomAttributes = "";

            // RFSH21
            $this->RFSH21->ViewValue = $this->RFSH21->CurrentValue;
            $this->RFSH21->ViewCustomAttributes = "";

            // RFSH22
            $this->RFSH22->ViewValue = $this->RFSH22->CurrentValue;
            $this->RFSH22->ViewCustomAttributes = "";

            // RFSH23
            $this->RFSH23->ViewValue = $this->RFSH23->CurrentValue;
            $this->RFSH23->ViewCustomAttributes = "";

            // RFSH24
            $this->RFSH24->ViewValue = $this->RFSH24->CurrentValue;
            $this->RFSH24->ViewCustomAttributes = "";

            // RFSH25
            $this->RFSH25->ViewValue = $this->RFSH25->CurrentValue;
            $this->RFSH25->ViewCustomAttributes = "";

            // HMG14
            $this->HMG14->ViewValue = $this->HMG14->CurrentValue;
            $this->HMG14->ViewCustomAttributes = "";

            // HMG15
            $this->HMG15->ViewValue = $this->HMG15->CurrentValue;
            $this->HMG15->ViewCustomAttributes = "";

            // HMG16
            $this->HMG16->ViewValue = $this->HMG16->CurrentValue;
            $this->HMG16->ViewCustomAttributes = "";

            // HMG17
            $this->HMG17->ViewValue = $this->HMG17->CurrentValue;
            $this->HMG17->ViewCustomAttributes = "";

            // HMG18
            $this->HMG18->ViewValue = $this->HMG18->CurrentValue;
            $this->HMG18->ViewCustomAttributes = "";

            // HMG19
            $this->HMG19->ViewValue = $this->HMG19->CurrentValue;
            $this->HMG19->ViewCustomAttributes = "";

            // HMG20
            $this->HMG20->ViewValue = $this->HMG20->CurrentValue;
            $this->HMG20->ViewCustomAttributes = "";

            // HMG21
            $this->HMG21->ViewValue = $this->HMG21->CurrentValue;
            $this->HMG21->ViewCustomAttributes = "";

            // HMG22
            $this->HMG22->ViewValue = $this->HMG22->CurrentValue;
            $this->HMG22->ViewCustomAttributes = "";

            // HMG23
            $this->HMG23->ViewValue = $this->HMG23->CurrentValue;
            $this->HMG23->ViewCustomAttributes = "";

            // HMG24
            $this->HMG24->ViewValue = $this->HMG24->CurrentValue;
            $this->HMG24->ViewCustomAttributes = "";

            // HMG25
            $this->HMG25->ViewValue = $this->HMG25->CurrentValue;
            $this->HMG25->ViewCustomAttributes = "";

            // GnRH14
            $this->GnRH14->ViewValue = $this->GnRH14->CurrentValue;
            $this->GnRH14->ViewCustomAttributes = "";

            // GnRH15
            $this->GnRH15->ViewValue = $this->GnRH15->CurrentValue;
            $this->GnRH15->ViewCustomAttributes = "";

            // GnRH16
            $this->GnRH16->ViewValue = $this->GnRH16->CurrentValue;
            $this->GnRH16->ViewCustomAttributes = "";

            // GnRH17
            $this->GnRH17->ViewValue = $this->GnRH17->CurrentValue;
            $this->GnRH17->ViewCustomAttributes = "";

            // GnRH18
            $this->GnRH18->ViewValue = $this->GnRH18->CurrentValue;
            $this->GnRH18->ViewCustomAttributes = "";

            // GnRH19
            $this->GnRH19->ViewValue = $this->GnRH19->CurrentValue;
            $this->GnRH19->ViewCustomAttributes = "";

            // GnRH20
            $this->GnRH20->ViewValue = $this->GnRH20->CurrentValue;
            $this->GnRH20->ViewCustomAttributes = "";

            // GnRH21
            $this->GnRH21->ViewValue = $this->GnRH21->CurrentValue;
            $this->GnRH21->ViewCustomAttributes = "";

            // GnRH22
            $this->GnRH22->ViewValue = $this->GnRH22->CurrentValue;
            $this->GnRH22->ViewCustomAttributes = "";

            // GnRH23
            $this->GnRH23->ViewValue = $this->GnRH23->CurrentValue;
            $this->GnRH23->ViewCustomAttributes = "";

            // GnRH24
            $this->GnRH24->ViewValue = $this->GnRH24->CurrentValue;
            $this->GnRH24->ViewCustomAttributes = "";

            // GnRH25
            $this->GnRH25->ViewValue = $this->GnRH25->CurrentValue;
            $this->GnRH25->ViewCustomAttributes = "";

            // P414
            $this->P414->ViewValue = $this->P414->CurrentValue;
            $this->P414->ViewCustomAttributes = "";

            // P415
            $this->P415->ViewValue = $this->P415->CurrentValue;
            $this->P415->ViewCustomAttributes = "";

            // P416
            $this->P416->ViewValue = $this->P416->CurrentValue;
            $this->P416->ViewCustomAttributes = "";

            // P417
            $this->P417->ViewValue = $this->P417->CurrentValue;
            $this->P417->ViewCustomAttributes = "";

            // P418
            $this->P418->ViewValue = $this->P418->CurrentValue;
            $this->P418->ViewCustomAttributes = "";

            // P419
            $this->P419->ViewValue = $this->P419->CurrentValue;
            $this->P419->ViewCustomAttributes = "";

            // P420
            $this->P420->ViewValue = $this->P420->CurrentValue;
            $this->P420->ViewCustomAttributes = "";

            // P421
            $this->P421->ViewValue = $this->P421->CurrentValue;
            $this->P421->ViewCustomAttributes = "";

            // P422
            $this->P422->ViewValue = $this->P422->CurrentValue;
            $this->P422->ViewCustomAttributes = "";

            // P423
            $this->P423->ViewValue = $this->P423->CurrentValue;
            $this->P423->ViewCustomAttributes = "";

            // P424
            $this->P424->ViewValue = $this->P424->CurrentValue;
            $this->P424->ViewCustomAttributes = "";

            // P425
            $this->P425->ViewValue = $this->P425->CurrentValue;
            $this->P425->ViewCustomAttributes = "";

            // USGRt14
            $this->USGRt14->ViewValue = $this->USGRt14->CurrentValue;
            $this->USGRt14->ViewCustomAttributes = "";

            // USGRt15
            $this->USGRt15->ViewValue = $this->USGRt15->CurrentValue;
            $this->USGRt15->ViewCustomAttributes = "";

            // USGRt16
            $this->USGRt16->ViewValue = $this->USGRt16->CurrentValue;
            $this->USGRt16->ViewCustomAttributes = "";

            // USGRt17
            $this->USGRt17->ViewValue = $this->USGRt17->CurrentValue;
            $this->USGRt17->ViewCustomAttributes = "";

            // USGRt18
            $this->USGRt18->ViewValue = $this->USGRt18->CurrentValue;
            $this->USGRt18->ViewCustomAttributes = "";

            // USGRt19
            $this->USGRt19->ViewValue = $this->USGRt19->CurrentValue;
            $this->USGRt19->ViewCustomAttributes = "";

            // USGRt20
            $this->USGRt20->ViewValue = $this->USGRt20->CurrentValue;
            $this->USGRt20->ViewCustomAttributes = "";

            // USGRt21
            $this->USGRt21->ViewValue = $this->USGRt21->CurrentValue;
            $this->USGRt21->ViewCustomAttributes = "";

            // USGRt22
            $this->USGRt22->ViewValue = $this->USGRt22->CurrentValue;
            $this->USGRt22->ViewCustomAttributes = "";

            // USGRt23
            $this->USGRt23->ViewValue = $this->USGRt23->CurrentValue;
            $this->USGRt23->ViewCustomAttributes = "";

            // USGRt24
            $this->USGRt24->ViewValue = $this->USGRt24->CurrentValue;
            $this->USGRt24->ViewCustomAttributes = "";

            // USGRt25
            $this->USGRt25->ViewValue = $this->USGRt25->CurrentValue;
            $this->USGRt25->ViewCustomAttributes = "";

            // USGLt14
            $this->USGLt14->ViewValue = $this->USGLt14->CurrentValue;
            $this->USGLt14->ViewCustomAttributes = "";

            // USGLt15
            $this->USGLt15->ViewValue = $this->USGLt15->CurrentValue;
            $this->USGLt15->ViewCustomAttributes = "";

            // USGLt16
            $this->USGLt16->ViewValue = $this->USGLt16->CurrentValue;
            $this->USGLt16->ViewCustomAttributes = "";

            // USGLt17
            $this->USGLt17->ViewValue = $this->USGLt17->CurrentValue;
            $this->USGLt17->ViewCustomAttributes = "";

            // USGLt18
            $this->USGLt18->ViewValue = $this->USGLt18->CurrentValue;
            $this->USGLt18->ViewCustomAttributes = "";

            // USGLt19
            $this->USGLt19->ViewValue = $this->USGLt19->CurrentValue;
            $this->USGLt19->ViewCustomAttributes = "";

            // USGLt20
            $this->USGLt20->ViewValue = $this->USGLt20->CurrentValue;
            $this->USGLt20->ViewCustomAttributes = "";

            // USGLt21
            $this->USGLt21->ViewValue = $this->USGLt21->CurrentValue;
            $this->USGLt21->ViewCustomAttributes = "";

            // USGLt22
            $this->USGLt22->ViewValue = $this->USGLt22->CurrentValue;
            $this->USGLt22->ViewCustomAttributes = "";

            // USGLt23
            $this->USGLt23->ViewValue = $this->USGLt23->CurrentValue;
            $this->USGLt23->ViewCustomAttributes = "";

            // USGLt24
            $this->USGLt24->ViewValue = $this->USGLt24->CurrentValue;
            $this->USGLt24->ViewCustomAttributes = "";

            // USGLt25
            $this->USGLt25->ViewValue = $this->USGLt25->CurrentValue;
            $this->USGLt25->ViewCustomAttributes = "";

            // EM14
            $this->EM14->ViewValue = $this->EM14->CurrentValue;
            $this->EM14->ViewCustomAttributes = "";

            // EM15
            $this->EM15->ViewValue = $this->EM15->CurrentValue;
            $this->EM15->ViewCustomAttributes = "";

            // EM16
            $this->EM16->ViewValue = $this->EM16->CurrentValue;
            $this->EM16->ViewCustomAttributes = "";

            // EM17
            $this->EM17->ViewValue = $this->EM17->CurrentValue;
            $this->EM17->ViewCustomAttributes = "";

            // EM18
            $this->EM18->ViewValue = $this->EM18->CurrentValue;
            $this->EM18->ViewCustomAttributes = "";

            // EM19
            $this->EM19->ViewValue = $this->EM19->CurrentValue;
            $this->EM19->ViewCustomAttributes = "";

            // EM20
            $this->EM20->ViewValue = $this->EM20->CurrentValue;
            $this->EM20->ViewCustomAttributes = "";

            // EM21
            $this->EM21->ViewValue = $this->EM21->CurrentValue;
            $this->EM21->ViewCustomAttributes = "";

            // EM22
            $this->EM22->ViewValue = $this->EM22->CurrentValue;
            $this->EM22->ViewCustomAttributes = "";

            // EM23
            $this->EM23->ViewValue = $this->EM23->CurrentValue;
            $this->EM23->ViewCustomAttributes = "";

            // EM24
            $this->EM24->ViewValue = $this->EM24->CurrentValue;
            $this->EM24->ViewCustomAttributes = "";

            // EM25
            $this->EM25->ViewValue = $this->EM25->CurrentValue;
            $this->EM25->ViewCustomAttributes = "";

            // Others14
            $this->Others14->ViewValue = $this->Others14->CurrentValue;
            $this->Others14->ViewCustomAttributes = "";

            // Others15
            $this->Others15->ViewValue = $this->Others15->CurrentValue;
            $this->Others15->ViewCustomAttributes = "";

            // Others16
            $this->Others16->ViewValue = $this->Others16->CurrentValue;
            $this->Others16->ViewCustomAttributes = "";

            // Others17
            $this->Others17->ViewValue = $this->Others17->CurrentValue;
            $this->Others17->ViewCustomAttributes = "";

            // Others18
            $this->Others18->ViewValue = $this->Others18->CurrentValue;
            $this->Others18->ViewCustomAttributes = "";

            // Others19
            $this->Others19->ViewValue = $this->Others19->CurrentValue;
            $this->Others19->ViewCustomAttributes = "";

            // Others20
            $this->Others20->ViewValue = $this->Others20->CurrentValue;
            $this->Others20->ViewCustomAttributes = "";

            // Others21
            $this->Others21->ViewValue = $this->Others21->CurrentValue;
            $this->Others21->ViewCustomAttributes = "";

            // Others22
            $this->Others22->ViewValue = $this->Others22->CurrentValue;
            $this->Others22->ViewCustomAttributes = "";

            // Others23
            $this->Others23->ViewValue = $this->Others23->CurrentValue;
            $this->Others23->ViewCustomAttributes = "";

            // Others24
            $this->Others24->ViewValue = $this->Others24->CurrentValue;
            $this->Others24->ViewCustomAttributes = "";

            // Others25
            $this->Others25->ViewValue = $this->Others25->CurrentValue;
            $this->Others25->ViewCustomAttributes = "";

            // DR14
            $this->DR14->ViewValue = $this->DR14->CurrentValue;
            $this->DR14->ViewCustomAttributes = "";

            // DR15
            $this->DR15->ViewValue = $this->DR15->CurrentValue;
            $this->DR15->ViewCustomAttributes = "";

            // DR16
            $this->DR16->ViewValue = $this->DR16->CurrentValue;
            $this->DR16->ViewCustomAttributes = "";

            // DR17
            $this->DR17->ViewValue = $this->DR17->CurrentValue;
            $this->DR17->ViewCustomAttributes = "";

            // DR18
            $this->DR18->ViewValue = $this->DR18->CurrentValue;
            $this->DR18->ViewCustomAttributes = "";

            // DR19
            $this->DR19->ViewValue = $this->DR19->CurrentValue;
            $this->DR19->ViewCustomAttributes = "";

            // DR20
            $this->DR20->ViewValue = $this->DR20->CurrentValue;
            $this->DR20->ViewCustomAttributes = "";

            // DR21
            $this->DR21->ViewValue = $this->DR21->CurrentValue;
            $this->DR21->ViewCustomAttributes = "";

            // DR22
            $this->DR22->ViewValue = $this->DR22->CurrentValue;
            $this->DR22->ViewCustomAttributes = "";

            // DR23
            $this->DR23->ViewValue = $this->DR23->CurrentValue;
            $this->DR23->ViewCustomAttributes = "";

            // DR24
            $this->DR24->ViewValue = $this->DR24->CurrentValue;
            $this->DR24->ViewCustomAttributes = "";

            // DR25
            $this->DR25->ViewValue = $this->DR25->CurrentValue;
            $this->DR25->ViewCustomAttributes = "";

            // E214
            $this->E214->ViewValue = $this->E214->CurrentValue;
            $this->E214->ViewCustomAttributes = "";

            // E215
            $this->E215->ViewValue = $this->E215->CurrentValue;
            $this->E215->ViewCustomAttributes = "";

            // E216
            $this->E216->ViewValue = $this->E216->CurrentValue;
            $this->E216->ViewCustomAttributes = "";

            // E217
            $this->E217->ViewValue = $this->E217->CurrentValue;
            $this->E217->ViewCustomAttributes = "";

            // E218
            $this->E218->ViewValue = $this->E218->CurrentValue;
            $this->E218->ViewCustomAttributes = "";

            // E219
            $this->E219->ViewValue = $this->E219->CurrentValue;
            $this->E219->ViewCustomAttributes = "";

            // E220
            $this->E220->ViewValue = $this->E220->CurrentValue;
            $this->E220->ViewCustomAttributes = "";

            // E221
            $this->E221->ViewValue = $this->E221->CurrentValue;
            $this->E221->ViewCustomAttributes = "";

            // E222
            $this->E222->ViewValue = $this->E222->CurrentValue;
            $this->E222->ViewCustomAttributes = "";

            // E223
            $this->E223->ViewValue = $this->E223->CurrentValue;
            $this->E223->ViewCustomAttributes = "";

            // E224
            $this->E224->ViewValue = $this->E224->CurrentValue;
            $this->E224->ViewCustomAttributes = "";

            // E225
            $this->E225->ViewValue = $this->E225->CurrentValue;
            $this->E225->ViewCustomAttributes = "";

            // EEETTTDTE
            $this->EEETTTDTE->ViewValue = $this->EEETTTDTE->CurrentValue;
            $this->EEETTTDTE->ViewValue = FormatDateTime($this->EEETTTDTE->ViewValue, 0);
            $this->EEETTTDTE->ViewCustomAttributes = "";

            // bhcgdate
            $this->bhcgdate->ViewValue = $this->bhcgdate->CurrentValue;
            $this->bhcgdate->ViewValue = FormatDateTime($this->bhcgdate->ViewValue, 0);
            $this->bhcgdate->ViewCustomAttributes = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
            $this->TUBAL_PATENCY->ViewCustomAttributes = "";

            // HSG
            $this->HSG->ViewValue = $this->HSG->CurrentValue;
            $this->HSG->ViewCustomAttributes = "";

            // DHL
            $this->DHL->ViewValue = $this->DHL->CurrentValue;
            $this->DHL->ViewCustomAttributes = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
            $this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
            $this->W_COMORBIDS->ViewCustomAttributes = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
            $this->H_COMORBIDS->ViewCustomAttributes = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
            $this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

            // TABLETS
            $this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
            $this->TABLETS->ViewCustomAttributes = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
            $this->FOLLICLE_STATUS->ViewCustomAttributes = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
            $this->NUMBER_OF_IUI->ViewCustomAttributes = "";

            // PROCEDURE
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
            $this->PROCEDURE->ViewCustomAttributes = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
            $this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
            $this->ONGOING_PREG->ViewCustomAttributes = "";

            // EDD_Date
            $this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
            $this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
            $this->EDD_Date->ViewCustomAttributes = "";

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

            // FemaleFactor
            $this->FemaleFactor->LinkCustomAttributes = "";
            $this->FemaleFactor->HrefValue = "";
            $this->FemaleFactor->TooltipValue = "";

            // MaleFactor
            $this->MaleFactor->LinkCustomAttributes = "";
            $this->MaleFactor->HrefValue = "";
            $this->MaleFactor->TooltipValue = "";

            // Protocol
            $this->Protocol->LinkCustomAttributes = "";
            $this->Protocol->HrefValue = "";
            $this->Protocol->TooltipValue = "";

            // SemenFrozen
            $this->SemenFrozen->LinkCustomAttributes = "";
            $this->SemenFrozen->HrefValue = "";
            $this->SemenFrozen->TooltipValue = "";

            // A4ICSICycle
            $this->A4ICSICycle->LinkCustomAttributes = "";
            $this->A4ICSICycle->HrefValue = "";
            $this->A4ICSICycle->TooltipValue = "";

            // TotalICSICycle
            $this->TotalICSICycle->LinkCustomAttributes = "";
            $this->TotalICSICycle->HrefValue = "";
            $this->TotalICSICycle->TooltipValue = "";

            // TypeOfInfertility
            $this->TypeOfInfertility->LinkCustomAttributes = "";
            $this->TypeOfInfertility->HrefValue = "";
            $this->TypeOfInfertility->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // RelevantHistory
            $this->RelevantHistory->LinkCustomAttributes = "";
            $this->RelevantHistory->HrefValue = "";
            $this->RelevantHistory->TooltipValue = "";

            // IUICycles
            $this->IUICycles->LinkCustomAttributes = "";
            $this->IUICycles->HrefValue = "";
            $this->IUICycles->TooltipValue = "";

            // AFC
            $this->AFC->LinkCustomAttributes = "";
            $this->AFC->HrefValue = "";
            $this->AFC->TooltipValue = "";

            // AMH
            $this->AMH->LinkCustomAttributes = "";
            $this->AMH->HrefValue = "";
            $this->AMH->TooltipValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";
            $this->FBMI->TooltipValue = "";

            // MBMI
            $this->MBMI->LinkCustomAttributes = "";
            $this->MBMI->HrefValue = "";
            $this->MBMI->TooltipValue = "";

            // OvarianVolumeRT
            $this->OvarianVolumeRT->LinkCustomAttributes = "";
            $this->OvarianVolumeRT->HrefValue = "";
            $this->OvarianVolumeRT->TooltipValue = "";

            // OvarianVolumeLT
            $this->OvarianVolumeLT->LinkCustomAttributes = "";
            $this->OvarianVolumeLT->HrefValue = "";
            $this->OvarianVolumeLT->TooltipValue = "";

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
            $this->DAYSOFSTIMULATION->HrefValue = "";
            $this->DAYSOFSTIMULATION->TooltipValue = "";

            // DOSEOFGONADOTROPINS
            $this->DOSEOFGONADOTROPINS->LinkCustomAttributes = "";
            $this->DOSEOFGONADOTROPINS->HrefValue = "";
            $this->DOSEOFGONADOTROPINS->TooltipValue = "";

            // INJTYPE
            $this->INJTYPE->LinkCustomAttributes = "";
            $this->INJTYPE->HrefValue = "";
            $this->INJTYPE->TooltipValue = "";

            // ANTAGONISTDAYS
            $this->ANTAGONISTDAYS->LinkCustomAttributes = "";
            $this->ANTAGONISTDAYS->HrefValue = "";
            $this->ANTAGONISTDAYS->TooltipValue = "";

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
            $this->ANTAGONISTSTARTDAY->HrefValue = "";
            $this->ANTAGONISTSTARTDAY->TooltipValue = "";

            // GROWTHHORMONE
            $this->GROWTHHORMONE->LinkCustomAttributes = "";
            $this->GROWTHHORMONE->HrefValue = "";
            $this->GROWTHHORMONE->TooltipValue = "";

            // PRETREATMENT
            $this->PRETREATMENT->LinkCustomAttributes = "";
            $this->PRETREATMENT->HrefValue = "";
            $this->PRETREATMENT->TooltipValue = "";

            // SerumP4
            $this->SerumP4->LinkCustomAttributes = "";
            $this->SerumP4->HrefValue = "";
            $this->SerumP4->TooltipValue = "";

            // FORT
            $this->FORT->LinkCustomAttributes = "";
            $this->FORT->HrefValue = "";
            $this->FORT->TooltipValue = "";

            // MedicalFactors
            $this->MedicalFactors->LinkCustomAttributes = "";
            $this->MedicalFactors->HrefValue = "";
            $this->MedicalFactors->TooltipValue = "";

            // SCDate
            $this->SCDate->LinkCustomAttributes = "";
            $this->SCDate->HrefValue = "";
            $this->SCDate->TooltipValue = "";

            // OvarianSurgery
            $this->OvarianSurgery->LinkCustomAttributes = "";
            $this->OvarianSurgery->HrefValue = "";
            $this->OvarianSurgery->TooltipValue = "";

            // PreProcedureOrder
            $this->PreProcedureOrder->LinkCustomAttributes = "";
            $this->PreProcedureOrder->HrefValue = "";
            $this->PreProcedureOrder->TooltipValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";
            $this->TRIGGERR->TooltipValue = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->LinkCustomAttributes = "";
            $this->TRIGGERDATE->HrefValue = "";
            $this->TRIGGERDATE->TooltipValue = "";

            // ATHOMEorCLINIC
            $this->ATHOMEorCLINIC->LinkCustomAttributes = "";
            $this->ATHOMEorCLINIC->HrefValue = "";
            $this->ATHOMEorCLINIC->TooltipValue = "";

            // OPUDATE
            $this->OPUDATE->LinkCustomAttributes = "";
            $this->OPUDATE->HrefValue = "";
            $this->OPUDATE->TooltipValue = "";

            // ALLFREEZEINDICATION
            $this->ALLFREEZEINDICATION->LinkCustomAttributes = "";
            $this->ALLFREEZEINDICATION->HrefValue = "";
            $this->ALLFREEZEINDICATION->TooltipValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";
            $this->ERA->TooltipValue = "";

            // PGTA
            $this->PGTA->LinkCustomAttributes = "";
            $this->PGTA->HrefValue = "";
            $this->PGTA->TooltipValue = "";

            // PGD
            $this->PGD->LinkCustomAttributes = "";
            $this->PGD->HrefValue = "";
            $this->PGD->TooltipValue = "";

            // DATEOFET
            $this->DATEOFET->LinkCustomAttributes = "";
            $this->DATEOFET->HrefValue = "";
            $this->DATEOFET->TooltipValue = "";

            // ET
            $this->ET->LinkCustomAttributes = "";
            $this->ET->HrefValue = "";
            $this->ET->TooltipValue = "";

            // ESET
            $this->ESET->LinkCustomAttributes = "";
            $this->ESET->HrefValue = "";
            $this->ESET->TooltipValue = "";

            // DOET
            $this->DOET->LinkCustomAttributes = "";
            $this->DOET->HrefValue = "";
            $this->DOET->TooltipValue = "";

            // SEMENPREPARATION
            $this->SEMENPREPARATION->LinkCustomAttributes = "";
            $this->SEMENPREPARATION->HrefValue = "";
            $this->SEMENPREPARATION->TooltipValue = "";

            // REASONFORESET
            $this->REASONFORESET->LinkCustomAttributes = "";
            $this->REASONFORESET->HrefValue = "";
            $this->REASONFORESET->TooltipValue = "";

            // Expectedoocytes
            $this->Expectedoocytes->LinkCustomAttributes = "";
            $this->Expectedoocytes->HrefValue = "";
            $this->Expectedoocytes->TooltipValue = "";

            // StChDate1
            $this->StChDate1->LinkCustomAttributes = "";
            $this->StChDate1->HrefValue = "";
            $this->StChDate1->TooltipValue = "";

            // StChDate2
            $this->StChDate2->LinkCustomAttributes = "";
            $this->StChDate2->HrefValue = "";
            $this->StChDate2->TooltipValue = "";

            // StChDate3
            $this->StChDate3->LinkCustomAttributes = "";
            $this->StChDate3->HrefValue = "";
            $this->StChDate3->TooltipValue = "";

            // StChDate4
            $this->StChDate4->LinkCustomAttributes = "";
            $this->StChDate4->HrefValue = "";
            $this->StChDate4->TooltipValue = "";

            // StChDate5
            $this->StChDate5->LinkCustomAttributes = "";
            $this->StChDate5->HrefValue = "";
            $this->StChDate5->TooltipValue = "";

            // StChDate6
            $this->StChDate6->LinkCustomAttributes = "";
            $this->StChDate6->HrefValue = "";
            $this->StChDate6->TooltipValue = "";

            // StChDate7
            $this->StChDate7->LinkCustomAttributes = "";
            $this->StChDate7->HrefValue = "";
            $this->StChDate7->TooltipValue = "";

            // StChDate8
            $this->StChDate8->LinkCustomAttributes = "";
            $this->StChDate8->HrefValue = "";
            $this->StChDate8->TooltipValue = "";

            // StChDate9
            $this->StChDate9->LinkCustomAttributes = "";
            $this->StChDate9->HrefValue = "";
            $this->StChDate9->TooltipValue = "";

            // StChDate10
            $this->StChDate10->LinkCustomAttributes = "";
            $this->StChDate10->HrefValue = "";
            $this->StChDate10->TooltipValue = "";

            // StChDate11
            $this->StChDate11->LinkCustomAttributes = "";
            $this->StChDate11->HrefValue = "";
            $this->StChDate11->TooltipValue = "";

            // StChDate12
            $this->StChDate12->LinkCustomAttributes = "";
            $this->StChDate12->HrefValue = "";
            $this->StChDate12->TooltipValue = "";

            // StChDate13
            $this->StChDate13->LinkCustomAttributes = "";
            $this->StChDate13->HrefValue = "";
            $this->StChDate13->TooltipValue = "";

            // CycleDay1
            $this->CycleDay1->LinkCustomAttributes = "";
            $this->CycleDay1->HrefValue = "";
            $this->CycleDay1->TooltipValue = "";

            // CycleDay2
            $this->CycleDay2->LinkCustomAttributes = "";
            $this->CycleDay2->HrefValue = "";
            $this->CycleDay2->TooltipValue = "";

            // CycleDay3
            $this->CycleDay3->LinkCustomAttributes = "";
            $this->CycleDay3->HrefValue = "";
            $this->CycleDay3->TooltipValue = "";

            // CycleDay4
            $this->CycleDay4->LinkCustomAttributes = "";
            $this->CycleDay4->HrefValue = "";
            $this->CycleDay4->TooltipValue = "";

            // CycleDay5
            $this->CycleDay5->LinkCustomAttributes = "";
            $this->CycleDay5->HrefValue = "";
            $this->CycleDay5->TooltipValue = "";

            // CycleDay6
            $this->CycleDay6->LinkCustomAttributes = "";
            $this->CycleDay6->HrefValue = "";
            $this->CycleDay6->TooltipValue = "";

            // CycleDay7
            $this->CycleDay7->LinkCustomAttributes = "";
            $this->CycleDay7->HrefValue = "";
            $this->CycleDay7->TooltipValue = "";

            // CycleDay8
            $this->CycleDay8->LinkCustomAttributes = "";
            $this->CycleDay8->HrefValue = "";
            $this->CycleDay8->TooltipValue = "";

            // CycleDay9
            $this->CycleDay9->LinkCustomAttributes = "";
            $this->CycleDay9->HrefValue = "";
            $this->CycleDay9->TooltipValue = "";

            // CycleDay10
            $this->CycleDay10->LinkCustomAttributes = "";
            $this->CycleDay10->HrefValue = "";
            $this->CycleDay10->TooltipValue = "";

            // CycleDay11
            $this->CycleDay11->LinkCustomAttributes = "";
            $this->CycleDay11->HrefValue = "";
            $this->CycleDay11->TooltipValue = "";

            // CycleDay12
            $this->CycleDay12->LinkCustomAttributes = "";
            $this->CycleDay12->HrefValue = "";
            $this->CycleDay12->TooltipValue = "";

            // CycleDay13
            $this->CycleDay13->LinkCustomAttributes = "";
            $this->CycleDay13->HrefValue = "";
            $this->CycleDay13->TooltipValue = "";

            // StimulationDay1
            $this->StimulationDay1->LinkCustomAttributes = "";
            $this->StimulationDay1->HrefValue = "";
            $this->StimulationDay1->TooltipValue = "";

            // StimulationDay2
            $this->StimulationDay2->LinkCustomAttributes = "";
            $this->StimulationDay2->HrefValue = "";
            $this->StimulationDay2->TooltipValue = "";

            // StimulationDay3
            $this->StimulationDay3->LinkCustomAttributes = "";
            $this->StimulationDay3->HrefValue = "";
            $this->StimulationDay3->TooltipValue = "";

            // StimulationDay4
            $this->StimulationDay4->LinkCustomAttributes = "";
            $this->StimulationDay4->HrefValue = "";
            $this->StimulationDay4->TooltipValue = "";

            // StimulationDay5
            $this->StimulationDay5->LinkCustomAttributes = "";
            $this->StimulationDay5->HrefValue = "";
            $this->StimulationDay5->TooltipValue = "";

            // StimulationDay6
            $this->StimulationDay6->LinkCustomAttributes = "";
            $this->StimulationDay6->HrefValue = "";
            $this->StimulationDay6->TooltipValue = "";

            // StimulationDay7
            $this->StimulationDay7->LinkCustomAttributes = "";
            $this->StimulationDay7->HrefValue = "";
            $this->StimulationDay7->TooltipValue = "";

            // StimulationDay8
            $this->StimulationDay8->LinkCustomAttributes = "";
            $this->StimulationDay8->HrefValue = "";
            $this->StimulationDay8->TooltipValue = "";

            // StimulationDay9
            $this->StimulationDay9->LinkCustomAttributes = "";
            $this->StimulationDay9->HrefValue = "";
            $this->StimulationDay9->TooltipValue = "";

            // StimulationDay10
            $this->StimulationDay10->LinkCustomAttributes = "";
            $this->StimulationDay10->HrefValue = "";
            $this->StimulationDay10->TooltipValue = "";

            // StimulationDay11
            $this->StimulationDay11->LinkCustomAttributes = "";
            $this->StimulationDay11->HrefValue = "";
            $this->StimulationDay11->TooltipValue = "";

            // StimulationDay12
            $this->StimulationDay12->LinkCustomAttributes = "";
            $this->StimulationDay12->HrefValue = "";
            $this->StimulationDay12->TooltipValue = "";

            // StimulationDay13
            $this->StimulationDay13->LinkCustomAttributes = "";
            $this->StimulationDay13->HrefValue = "";
            $this->StimulationDay13->TooltipValue = "";

            // Tablet1
            $this->Tablet1->LinkCustomAttributes = "";
            $this->Tablet1->HrefValue = "";
            $this->Tablet1->TooltipValue = "";

            // Tablet2
            $this->Tablet2->LinkCustomAttributes = "";
            $this->Tablet2->HrefValue = "";
            $this->Tablet2->TooltipValue = "";

            // Tablet3
            $this->Tablet3->LinkCustomAttributes = "";
            $this->Tablet3->HrefValue = "";
            $this->Tablet3->TooltipValue = "";

            // Tablet4
            $this->Tablet4->LinkCustomAttributes = "";
            $this->Tablet4->HrefValue = "";
            $this->Tablet4->TooltipValue = "";

            // Tablet5
            $this->Tablet5->LinkCustomAttributes = "";
            $this->Tablet5->HrefValue = "";
            $this->Tablet5->TooltipValue = "";

            // Tablet6
            $this->Tablet6->LinkCustomAttributes = "";
            $this->Tablet6->HrefValue = "";
            $this->Tablet6->TooltipValue = "";

            // Tablet7
            $this->Tablet7->LinkCustomAttributes = "";
            $this->Tablet7->HrefValue = "";
            $this->Tablet7->TooltipValue = "";

            // Tablet8
            $this->Tablet8->LinkCustomAttributes = "";
            $this->Tablet8->HrefValue = "";
            $this->Tablet8->TooltipValue = "";

            // Tablet9
            $this->Tablet9->LinkCustomAttributes = "";
            $this->Tablet9->HrefValue = "";
            $this->Tablet9->TooltipValue = "";

            // Tablet10
            $this->Tablet10->LinkCustomAttributes = "";
            $this->Tablet10->HrefValue = "";
            $this->Tablet10->TooltipValue = "";

            // Tablet11
            $this->Tablet11->LinkCustomAttributes = "";
            $this->Tablet11->HrefValue = "";
            $this->Tablet11->TooltipValue = "";

            // Tablet12
            $this->Tablet12->LinkCustomAttributes = "";
            $this->Tablet12->HrefValue = "";
            $this->Tablet12->TooltipValue = "";

            // Tablet13
            $this->Tablet13->LinkCustomAttributes = "";
            $this->Tablet13->HrefValue = "";
            $this->Tablet13->TooltipValue = "";

            // RFSH1
            $this->RFSH1->LinkCustomAttributes = "";
            $this->RFSH1->HrefValue = "";
            $this->RFSH1->TooltipValue = "";

            // RFSH2
            $this->RFSH2->LinkCustomAttributes = "";
            $this->RFSH2->HrefValue = "";
            $this->RFSH2->TooltipValue = "";

            // RFSH3
            $this->RFSH3->LinkCustomAttributes = "";
            $this->RFSH3->HrefValue = "";
            $this->RFSH3->TooltipValue = "";

            // RFSH4
            $this->RFSH4->LinkCustomAttributes = "";
            $this->RFSH4->HrefValue = "";
            $this->RFSH4->TooltipValue = "";

            // RFSH5
            $this->RFSH5->LinkCustomAttributes = "";
            $this->RFSH5->HrefValue = "";
            $this->RFSH5->TooltipValue = "";

            // RFSH6
            $this->RFSH6->LinkCustomAttributes = "";
            $this->RFSH6->HrefValue = "";
            $this->RFSH6->TooltipValue = "";

            // RFSH7
            $this->RFSH7->LinkCustomAttributes = "";
            $this->RFSH7->HrefValue = "";
            $this->RFSH7->TooltipValue = "";

            // RFSH8
            $this->RFSH8->LinkCustomAttributes = "";
            $this->RFSH8->HrefValue = "";
            $this->RFSH8->TooltipValue = "";

            // RFSH9
            $this->RFSH9->LinkCustomAttributes = "";
            $this->RFSH9->HrefValue = "";
            $this->RFSH9->TooltipValue = "";

            // RFSH10
            $this->RFSH10->LinkCustomAttributes = "";
            $this->RFSH10->HrefValue = "";
            $this->RFSH10->TooltipValue = "";

            // RFSH11
            $this->RFSH11->LinkCustomAttributes = "";
            $this->RFSH11->HrefValue = "";
            $this->RFSH11->TooltipValue = "";

            // RFSH12
            $this->RFSH12->LinkCustomAttributes = "";
            $this->RFSH12->HrefValue = "";
            $this->RFSH12->TooltipValue = "";

            // RFSH13
            $this->RFSH13->LinkCustomAttributes = "";
            $this->RFSH13->HrefValue = "";
            $this->RFSH13->TooltipValue = "";

            // HMG1
            $this->HMG1->LinkCustomAttributes = "";
            $this->HMG1->HrefValue = "";
            $this->HMG1->TooltipValue = "";

            // HMG2
            $this->HMG2->LinkCustomAttributes = "";
            $this->HMG2->HrefValue = "";
            $this->HMG2->TooltipValue = "";

            // HMG3
            $this->HMG3->LinkCustomAttributes = "";
            $this->HMG3->HrefValue = "";
            $this->HMG3->TooltipValue = "";

            // HMG4
            $this->HMG4->LinkCustomAttributes = "";
            $this->HMG4->HrefValue = "";
            $this->HMG4->TooltipValue = "";

            // HMG5
            $this->HMG5->LinkCustomAttributes = "";
            $this->HMG5->HrefValue = "";
            $this->HMG5->TooltipValue = "";

            // HMG6
            $this->HMG6->LinkCustomAttributes = "";
            $this->HMG6->HrefValue = "";
            $this->HMG6->TooltipValue = "";

            // HMG7
            $this->HMG7->LinkCustomAttributes = "";
            $this->HMG7->HrefValue = "";
            $this->HMG7->TooltipValue = "";

            // HMG8
            $this->HMG8->LinkCustomAttributes = "";
            $this->HMG8->HrefValue = "";
            $this->HMG8->TooltipValue = "";

            // HMG9
            $this->HMG9->LinkCustomAttributes = "";
            $this->HMG9->HrefValue = "";
            $this->HMG9->TooltipValue = "";

            // HMG10
            $this->HMG10->LinkCustomAttributes = "";
            $this->HMG10->HrefValue = "";
            $this->HMG10->TooltipValue = "";

            // HMG11
            $this->HMG11->LinkCustomAttributes = "";
            $this->HMG11->HrefValue = "";
            $this->HMG11->TooltipValue = "";

            // HMG12
            $this->HMG12->LinkCustomAttributes = "";
            $this->HMG12->HrefValue = "";
            $this->HMG12->TooltipValue = "";

            // HMG13
            $this->HMG13->LinkCustomAttributes = "";
            $this->HMG13->HrefValue = "";
            $this->HMG13->TooltipValue = "";

            // GnRH1
            $this->GnRH1->LinkCustomAttributes = "";
            $this->GnRH1->HrefValue = "";
            $this->GnRH1->TooltipValue = "";

            // GnRH2
            $this->GnRH2->LinkCustomAttributes = "";
            $this->GnRH2->HrefValue = "";
            $this->GnRH2->TooltipValue = "";

            // GnRH3
            $this->GnRH3->LinkCustomAttributes = "";
            $this->GnRH3->HrefValue = "";
            $this->GnRH3->TooltipValue = "";

            // GnRH4
            $this->GnRH4->LinkCustomAttributes = "";
            $this->GnRH4->HrefValue = "";
            $this->GnRH4->TooltipValue = "";

            // GnRH5
            $this->GnRH5->LinkCustomAttributes = "";
            $this->GnRH5->HrefValue = "";
            $this->GnRH5->TooltipValue = "";

            // GnRH6
            $this->GnRH6->LinkCustomAttributes = "";
            $this->GnRH6->HrefValue = "";
            $this->GnRH6->TooltipValue = "";

            // GnRH7
            $this->GnRH7->LinkCustomAttributes = "";
            $this->GnRH7->HrefValue = "";
            $this->GnRH7->TooltipValue = "";

            // GnRH8
            $this->GnRH8->LinkCustomAttributes = "";
            $this->GnRH8->HrefValue = "";
            $this->GnRH8->TooltipValue = "";

            // GnRH9
            $this->GnRH9->LinkCustomAttributes = "";
            $this->GnRH9->HrefValue = "";
            $this->GnRH9->TooltipValue = "";

            // GnRH10
            $this->GnRH10->LinkCustomAttributes = "";
            $this->GnRH10->HrefValue = "";
            $this->GnRH10->TooltipValue = "";

            // GnRH11
            $this->GnRH11->LinkCustomAttributes = "";
            $this->GnRH11->HrefValue = "";
            $this->GnRH11->TooltipValue = "";

            // GnRH12
            $this->GnRH12->LinkCustomAttributes = "";
            $this->GnRH12->HrefValue = "";
            $this->GnRH12->TooltipValue = "";

            // GnRH13
            $this->GnRH13->LinkCustomAttributes = "";
            $this->GnRH13->HrefValue = "";
            $this->GnRH13->TooltipValue = "";

            // E21
            $this->E21->LinkCustomAttributes = "";
            $this->E21->HrefValue = "";
            $this->E21->TooltipValue = "";

            // E22
            $this->E22->LinkCustomAttributes = "";
            $this->E22->HrefValue = "";
            $this->E22->TooltipValue = "";

            // E23
            $this->E23->LinkCustomAttributes = "";
            $this->E23->HrefValue = "";
            $this->E23->TooltipValue = "";

            // E24
            $this->E24->LinkCustomAttributes = "";
            $this->E24->HrefValue = "";
            $this->E24->TooltipValue = "";

            // E25
            $this->E25->LinkCustomAttributes = "";
            $this->E25->HrefValue = "";
            $this->E25->TooltipValue = "";

            // E26
            $this->E26->LinkCustomAttributes = "";
            $this->E26->HrefValue = "";
            $this->E26->TooltipValue = "";

            // E27
            $this->E27->LinkCustomAttributes = "";
            $this->E27->HrefValue = "";
            $this->E27->TooltipValue = "";

            // E28
            $this->E28->LinkCustomAttributes = "";
            $this->E28->HrefValue = "";
            $this->E28->TooltipValue = "";

            // E29
            $this->E29->LinkCustomAttributes = "";
            $this->E29->HrefValue = "";
            $this->E29->TooltipValue = "";

            // E210
            $this->E210->LinkCustomAttributes = "";
            $this->E210->HrefValue = "";
            $this->E210->TooltipValue = "";

            // E211
            $this->E211->LinkCustomAttributes = "";
            $this->E211->HrefValue = "";
            $this->E211->TooltipValue = "";

            // E212
            $this->E212->LinkCustomAttributes = "";
            $this->E212->HrefValue = "";
            $this->E212->TooltipValue = "";

            // E213
            $this->E213->LinkCustomAttributes = "";
            $this->E213->HrefValue = "";
            $this->E213->TooltipValue = "";

            // P41
            $this->P41->LinkCustomAttributes = "";
            $this->P41->HrefValue = "";
            $this->P41->TooltipValue = "";

            // P42
            $this->P42->LinkCustomAttributes = "";
            $this->P42->HrefValue = "";
            $this->P42->TooltipValue = "";

            // P43
            $this->P43->LinkCustomAttributes = "";
            $this->P43->HrefValue = "";
            $this->P43->TooltipValue = "";

            // P44
            $this->P44->LinkCustomAttributes = "";
            $this->P44->HrefValue = "";
            $this->P44->TooltipValue = "";

            // P45
            $this->P45->LinkCustomAttributes = "";
            $this->P45->HrefValue = "";
            $this->P45->TooltipValue = "";

            // P46
            $this->P46->LinkCustomAttributes = "";
            $this->P46->HrefValue = "";
            $this->P46->TooltipValue = "";

            // P47
            $this->P47->LinkCustomAttributes = "";
            $this->P47->HrefValue = "";
            $this->P47->TooltipValue = "";

            // P48
            $this->P48->LinkCustomAttributes = "";
            $this->P48->HrefValue = "";
            $this->P48->TooltipValue = "";

            // P49
            $this->P49->LinkCustomAttributes = "";
            $this->P49->HrefValue = "";
            $this->P49->TooltipValue = "";

            // P410
            $this->P410->LinkCustomAttributes = "";
            $this->P410->HrefValue = "";
            $this->P410->TooltipValue = "";

            // P411
            $this->P411->LinkCustomAttributes = "";
            $this->P411->HrefValue = "";
            $this->P411->TooltipValue = "";

            // P412
            $this->P412->LinkCustomAttributes = "";
            $this->P412->HrefValue = "";
            $this->P412->TooltipValue = "";

            // P413
            $this->P413->LinkCustomAttributes = "";
            $this->P413->HrefValue = "";
            $this->P413->TooltipValue = "";

            // USGRt1
            $this->USGRt1->LinkCustomAttributes = "";
            $this->USGRt1->HrefValue = "";
            $this->USGRt1->TooltipValue = "";

            // USGRt2
            $this->USGRt2->LinkCustomAttributes = "";
            $this->USGRt2->HrefValue = "";
            $this->USGRt2->TooltipValue = "";

            // USGRt3
            $this->USGRt3->LinkCustomAttributes = "";
            $this->USGRt3->HrefValue = "";
            $this->USGRt3->TooltipValue = "";

            // USGRt4
            $this->USGRt4->LinkCustomAttributes = "";
            $this->USGRt4->HrefValue = "";
            $this->USGRt4->TooltipValue = "";

            // USGRt5
            $this->USGRt5->LinkCustomAttributes = "";
            $this->USGRt5->HrefValue = "";
            $this->USGRt5->TooltipValue = "";

            // USGRt6
            $this->USGRt6->LinkCustomAttributes = "";
            $this->USGRt6->HrefValue = "";
            $this->USGRt6->TooltipValue = "";

            // USGRt7
            $this->USGRt7->LinkCustomAttributes = "";
            $this->USGRt7->HrefValue = "";
            $this->USGRt7->TooltipValue = "";

            // USGRt8
            $this->USGRt8->LinkCustomAttributes = "";
            $this->USGRt8->HrefValue = "";
            $this->USGRt8->TooltipValue = "";

            // USGRt9
            $this->USGRt9->LinkCustomAttributes = "";
            $this->USGRt9->HrefValue = "";
            $this->USGRt9->TooltipValue = "";

            // USGRt10
            $this->USGRt10->LinkCustomAttributes = "";
            $this->USGRt10->HrefValue = "";
            $this->USGRt10->TooltipValue = "";

            // USGRt11
            $this->USGRt11->LinkCustomAttributes = "";
            $this->USGRt11->HrefValue = "";
            $this->USGRt11->TooltipValue = "";

            // USGRt12
            $this->USGRt12->LinkCustomAttributes = "";
            $this->USGRt12->HrefValue = "";
            $this->USGRt12->TooltipValue = "";

            // USGRt13
            $this->USGRt13->LinkCustomAttributes = "";
            $this->USGRt13->HrefValue = "";
            $this->USGRt13->TooltipValue = "";

            // USGLt1
            $this->USGLt1->LinkCustomAttributes = "";
            $this->USGLt1->HrefValue = "";
            $this->USGLt1->TooltipValue = "";

            // USGLt2
            $this->USGLt2->LinkCustomAttributes = "";
            $this->USGLt2->HrefValue = "";
            $this->USGLt2->TooltipValue = "";

            // USGLt3
            $this->USGLt3->LinkCustomAttributes = "";
            $this->USGLt3->HrefValue = "";
            $this->USGLt3->TooltipValue = "";

            // USGLt4
            $this->USGLt4->LinkCustomAttributes = "";
            $this->USGLt4->HrefValue = "";
            $this->USGLt4->TooltipValue = "";

            // USGLt5
            $this->USGLt5->LinkCustomAttributes = "";
            $this->USGLt5->HrefValue = "";
            $this->USGLt5->TooltipValue = "";

            // USGLt6
            $this->USGLt6->LinkCustomAttributes = "";
            $this->USGLt6->HrefValue = "";
            $this->USGLt6->TooltipValue = "";

            // USGLt7
            $this->USGLt7->LinkCustomAttributes = "";
            $this->USGLt7->HrefValue = "";
            $this->USGLt7->TooltipValue = "";

            // USGLt8
            $this->USGLt8->LinkCustomAttributes = "";
            $this->USGLt8->HrefValue = "";
            $this->USGLt8->TooltipValue = "";

            // USGLt9
            $this->USGLt9->LinkCustomAttributes = "";
            $this->USGLt9->HrefValue = "";
            $this->USGLt9->TooltipValue = "";

            // USGLt10
            $this->USGLt10->LinkCustomAttributes = "";
            $this->USGLt10->HrefValue = "";
            $this->USGLt10->TooltipValue = "";

            // USGLt11
            $this->USGLt11->LinkCustomAttributes = "";
            $this->USGLt11->HrefValue = "";
            $this->USGLt11->TooltipValue = "";

            // USGLt12
            $this->USGLt12->LinkCustomAttributes = "";
            $this->USGLt12->HrefValue = "";
            $this->USGLt12->TooltipValue = "";

            // USGLt13
            $this->USGLt13->LinkCustomAttributes = "";
            $this->USGLt13->HrefValue = "";
            $this->USGLt13->TooltipValue = "";

            // EM1
            $this->EM1->LinkCustomAttributes = "";
            $this->EM1->HrefValue = "";
            $this->EM1->TooltipValue = "";

            // EM2
            $this->EM2->LinkCustomAttributes = "";
            $this->EM2->HrefValue = "";
            $this->EM2->TooltipValue = "";

            // EM3
            $this->EM3->LinkCustomAttributes = "";
            $this->EM3->HrefValue = "";
            $this->EM3->TooltipValue = "";

            // EM4
            $this->EM4->LinkCustomAttributes = "";
            $this->EM4->HrefValue = "";
            $this->EM4->TooltipValue = "";

            // EM5
            $this->EM5->LinkCustomAttributes = "";
            $this->EM5->HrefValue = "";
            $this->EM5->TooltipValue = "";

            // EM6
            $this->EM6->LinkCustomAttributes = "";
            $this->EM6->HrefValue = "";
            $this->EM6->TooltipValue = "";

            // EM7
            $this->EM7->LinkCustomAttributes = "";
            $this->EM7->HrefValue = "";
            $this->EM7->TooltipValue = "";

            // EM8
            $this->EM8->LinkCustomAttributes = "";
            $this->EM8->HrefValue = "";
            $this->EM8->TooltipValue = "";

            // EM9
            $this->EM9->LinkCustomAttributes = "";
            $this->EM9->HrefValue = "";
            $this->EM9->TooltipValue = "";

            // EM10
            $this->EM10->LinkCustomAttributes = "";
            $this->EM10->HrefValue = "";
            $this->EM10->TooltipValue = "";

            // EM11
            $this->EM11->LinkCustomAttributes = "";
            $this->EM11->HrefValue = "";
            $this->EM11->TooltipValue = "";

            // EM12
            $this->EM12->LinkCustomAttributes = "";
            $this->EM12->HrefValue = "";
            $this->EM12->TooltipValue = "";

            // EM13
            $this->EM13->LinkCustomAttributes = "";
            $this->EM13->HrefValue = "";
            $this->EM13->TooltipValue = "";

            // Others1
            $this->Others1->LinkCustomAttributes = "";
            $this->Others1->HrefValue = "";
            $this->Others1->TooltipValue = "";

            // Others2
            $this->Others2->LinkCustomAttributes = "";
            $this->Others2->HrefValue = "";
            $this->Others2->TooltipValue = "";

            // Others3
            $this->Others3->LinkCustomAttributes = "";
            $this->Others3->HrefValue = "";
            $this->Others3->TooltipValue = "";

            // Others4
            $this->Others4->LinkCustomAttributes = "";
            $this->Others4->HrefValue = "";
            $this->Others4->TooltipValue = "";

            // Others5
            $this->Others5->LinkCustomAttributes = "";
            $this->Others5->HrefValue = "";
            $this->Others5->TooltipValue = "";

            // Others6
            $this->Others6->LinkCustomAttributes = "";
            $this->Others6->HrefValue = "";
            $this->Others6->TooltipValue = "";

            // Others7
            $this->Others7->LinkCustomAttributes = "";
            $this->Others7->HrefValue = "";
            $this->Others7->TooltipValue = "";

            // Others8
            $this->Others8->LinkCustomAttributes = "";
            $this->Others8->HrefValue = "";
            $this->Others8->TooltipValue = "";

            // Others9
            $this->Others9->LinkCustomAttributes = "";
            $this->Others9->HrefValue = "";
            $this->Others9->TooltipValue = "";

            // Others10
            $this->Others10->LinkCustomAttributes = "";
            $this->Others10->HrefValue = "";
            $this->Others10->TooltipValue = "";

            // Others11
            $this->Others11->LinkCustomAttributes = "";
            $this->Others11->HrefValue = "";
            $this->Others11->TooltipValue = "";

            // Others12
            $this->Others12->LinkCustomAttributes = "";
            $this->Others12->HrefValue = "";
            $this->Others12->TooltipValue = "";

            // Others13
            $this->Others13->LinkCustomAttributes = "";
            $this->Others13->HrefValue = "";
            $this->Others13->TooltipValue = "";

            // DR1
            $this->DR1->LinkCustomAttributes = "";
            $this->DR1->HrefValue = "";
            $this->DR1->TooltipValue = "";

            // DR2
            $this->DR2->LinkCustomAttributes = "";
            $this->DR2->HrefValue = "";
            $this->DR2->TooltipValue = "";

            // DR3
            $this->DR3->LinkCustomAttributes = "";
            $this->DR3->HrefValue = "";
            $this->DR3->TooltipValue = "";

            // DR4
            $this->DR4->LinkCustomAttributes = "";
            $this->DR4->HrefValue = "";
            $this->DR4->TooltipValue = "";

            // DR5
            $this->DR5->LinkCustomAttributes = "";
            $this->DR5->HrefValue = "";
            $this->DR5->TooltipValue = "";

            // DR6
            $this->DR6->LinkCustomAttributes = "";
            $this->DR6->HrefValue = "";
            $this->DR6->TooltipValue = "";

            // DR7
            $this->DR7->LinkCustomAttributes = "";
            $this->DR7->HrefValue = "";
            $this->DR7->TooltipValue = "";

            // DR8
            $this->DR8->LinkCustomAttributes = "";
            $this->DR8->HrefValue = "";
            $this->DR8->TooltipValue = "";

            // DR9
            $this->DR9->LinkCustomAttributes = "";
            $this->DR9->HrefValue = "";
            $this->DR9->TooltipValue = "";

            // DR10
            $this->DR10->LinkCustomAttributes = "";
            $this->DR10->HrefValue = "";
            $this->DR10->TooltipValue = "";

            // DR11
            $this->DR11->LinkCustomAttributes = "";
            $this->DR11->HrefValue = "";
            $this->DR11->TooltipValue = "";

            // DR12
            $this->DR12->LinkCustomAttributes = "";
            $this->DR12->HrefValue = "";
            $this->DR12->TooltipValue = "";

            // DR13
            $this->DR13->LinkCustomAttributes = "";
            $this->DR13->HrefValue = "";
            $this->DR13->TooltipValue = "";

            // DOCTORRESPONSIBLE
            $this->DOCTORRESPONSIBLE->LinkCustomAttributes = "";
            $this->DOCTORRESPONSIBLE->HrefValue = "";
            $this->DOCTORRESPONSIBLE->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Convert
            $this->Convert->LinkCustomAttributes = "";
            $this->Convert->HrefValue = "";
            $this->Convert->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";
            $this->Hysteroscopy->TooltipValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";
            $this->EndometrialScratching->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";
            $this->CYCLETYPE->TooltipValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";
            $this->HRTCYCLE->TooltipValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";
            $this->OralEstrogenDosage->TooltipValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";
            $this->VaginalEstrogen->TooltipValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";
            $this->GCSF->TooltipValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";
            $this->ActivatedPRP->TooltipValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";
            $this->UCLcm->TooltipValue = "";

            // DATOFEMBRYOTRANSFER
            $this->DATOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATOFEMBRYOTRANSFER->HrefValue = "";
            $this->DATOFEMBRYOTRANSFER->TooltipValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";
            $this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";
            $this->NOOFEMBRYOSTHAWED->TooltipValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
            $this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";
            $this->DAYOFEMBRYOS->TooltipValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
            $this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

            // ViaAdmin
            $this->ViaAdmin->LinkCustomAttributes = "";
            $this->ViaAdmin->HrefValue = "";
            $this->ViaAdmin->TooltipValue = "";

            // ViaStartDateTime
            $this->ViaStartDateTime->LinkCustomAttributes = "";
            $this->ViaStartDateTime->HrefValue = "";
            $this->ViaStartDateTime->TooltipValue = "";

            // ViaDose
            $this->ViaDose->LinkCustomAttributes = "";
            $this->ViaDose->HrefValue = "";
            $this->ViaDose->TooltipValue = "";

            // AllFreeze
            $this->AllFreeze->LinkCustomAttributes = "";
            $this->AllFreeze->HrefValue = "";
            $this->AllFreeze->TooltipValue = "";

            // TreatmentCancel
            $this->TreatmentCancel->LinkCustomAttributes = "";
            $this->TreatmentCancel->HrefValue = "";
            $this->TreatmentCancel->TooltipValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";
            $this->Reason->TooltipValue = "";

            // ProgesteroneAdmin
            $this->ProgesteroneAdmin->LinkCustomAttributes = "";
            $this->ProgesteroneAdmin->HrefValue = "";
            $this->ProgesteroneAdmin->TooltipValue = "";

            // ProgesteroneStart
            $this->ProgesteroneStart->LinkCustomAttributes = "";
            $this->ProgesteroneStart->HrefValue = "";
            $this->ProgesteroneStart->TooltipValue = "";

            // ProgesteroneDose
            $this->ProgesteroneDose->LinkCustomAttributes = "";
            $this->ProgesteroneDose->HrefValue = "";
            $this->ProgesteroneDose->TooltipValue = "";

            // StChDate14
            $this->StChDate14->LinkCustomAttributes = "";
            $this->StChDate14->HrefValue = "";
            $this->StChDate14->TooltipValue = "";

            // StChDate15
            $this->StChDate15->LinkCustomAttributes = "";
            $this->StChDate15->HrefValue = "";
            $this->StChDate15->TooltipValue = "";

            // StChDate16
            $this->StChDate16->LinkCustomAttributes = "";
            $this->StChDate16->HrefValue = "";
            $this->StChDate16->TooltipValue = "";

            // StChDate17
            $this->StChDate17->LinkCustomAttributes = "";
            $this->StChDate17->HrefValue = "";
            $this->StChDate17->TooltipValue = "";

            // StChDate18
            $this->StChDate18->LinkCustomAttributes = "";
            $this->StChDate18->HrefValue = "";
            $this->StChDate18->TooltipValue = "";

            // StChDate19
            $this->StChDate19->LinkCustomAttributes = "";
            $this->StChDate19->HrefValue = "";
            $this->StChDate19->TooltipValue = "";

            // StChDate20
            $this->StChDate20->LinkCustomAttributes = "";
            $this->StChDate20->HrefValue = "";
            $this->StChDate20->TooltipValue = "";

            // StChDate21
            $this->StChDate21->LinkCustomAttributes = "";
            $this->StChDate21->HrefValue = "";
            $this->StChDate21->TooltipValue = "";

            // StChDate22
            $this->StChDate22->LinkCustomAttributes = "";
            $this->StChDate22->HrefValue = "";
            $this->StChDate22->TooltipValue = "";

            // StChDate23
            $this->StChDate23->LinkCustomAttributes = "";
            $this->StChDate23->HrefValue = "";
            $this->StChDate23->TooltipValue = "";

            // StChDate24
            $this->StChDate24->LinkCustomAttributes = "";
            $this->StChDate24->HrefValue = "";
            $this->StChDate24->TooltipValue = "";

            // StChDate25
            $this->StChDate25->LinkCustomAttributes = "";
            $this->StChDate25->HrefValue = "";
            $this->StChDate25->TooltipValue = "";

            // CycleDay14
            $this->CycleDay14->LinkCustomAttributes = "";
            $this->CycleDay14->HrefValue = "";
            $this->CycleDay14->TooltipValue = "";

            // CycleDay15
            $this->CycleDay15->LinkCustomAttributes = "";
            $this->CycleDay15->HrefValue = "";
            $this->CycleDay15->TooltipValue = "";

            // CycleDay16
            $this->CycleDay16->LinkCustomAttributes = "";
            $this->CycleDay16->HrefValue = "";
            $this->CycleDay16->TooltipValue = "";

            // CycleDay17
            $this->CycleDay17->LinkCustomAttributes = "";
            $this->CycleDay17->HrefValue = "";
            $this->CycleDay17->TooltipValue = "";

            // CycleDay18
            $this->CycleDay18->LinkCustomAttributes = "";
            $this->CycleDay18->HrefValue = "";
            $this->CycleDay18->TooltipValue = "";

            // CycleDay19
            $this->CycleDay19->LinkCustomAttributes = "";
            $this->CycleDay19->HrefValue = "";
            $this->CycleDay19->TooltipValue = "";

            // CycleDay20
            $this->CycleDay20->LinkCustomAttributes = "";
            $this->CycleDay20->HrefValue = "";
            $this->CycleDay20->TooltipValue = "";

            // CycleDay21
            $this->CycleDay21->LinkCustomAttributes = "";
            $this->CycleDay21->HrefValue = "";
            $this->CycleDay21->TooltipValue = "";

            // CycleDay22
            $this->CycleDay22->LinkCustomAttributes = "";
            $this->CycleDay22->HrefValue = "";
            $this->CycleDay22->TooltipValue = "";

            // CycleDay23
            $this->CycleDay23->LinkCustomAttributes = "";
            $this->CycleDay23->HrefValue = "";
            $this->CycleDay23->TooltipValue = "";

            // CycleDay24
            $this->CycleDay24->LinkCustomAttributes = "";
            $this->CycleDay24->HrefValue = "";
            $this->CycleDay24->TooltipValue = "";

            // CycleDay25
            $this->CycleDay25->LinkCustomAttributes = "";
            $this->CycleDay25->HrefValue = "";
            $this->CycleDay25->TooltipValue = "";

            // StimulationDay14
            $this->StimulationDay14->LinkCustomAttributes = "";
            $this->StimulationDay14->HrefValue = "";
            $this->StimulationDay14->TooltipValue = "";

            // StimulationDay15
            $this->StimulationDay15->LinkCustomAttributes = "";
            $this->StimulationDay15->HrefValue = "";
            $this->StimulationDay15->TooltipValue = "";

            // StimulationDay16
            $this->StimulationDay16->LinkCustomAttributes = "";
            $this->StimulationDay16->HrefValue = "";
            $this->StimulationDay16->TooltipValue = "";

            // StimulationDay17
            $this->StimulationDay17->LinkCustomAttributes = "";
            $this->StimulationDay17->HrefValue = "";
            $this->StimulationDay17->TooltipValue = "";

            // StimulationDay18
            $this->StimulationDay18->LinkCustomAttributes = "";
            $this->StimulationDay18->HrefValue = "";
            $this->StimulationDay18->TooltipValue = "";

            // StimulationDay19
            $this->StimulationDay19->LinkCustomAttributes = "";
            $this->StimulationDay19->HrefValue = "";
            $this->StimulationDay19->TooltipValue = "";

            // StimulationDay20
            $this->StimulationDay20->LinkCustomAttributes = "";
            $this->StimulationDay20->HrefValue = "";
            $this->StimulationDay20->TooltipValue = "";

            // StimulationDay21
            $this->StimulationDay21->LinkCustomAttributes = "";
            $this->StimulationDay21->HrefValue = "";
            $this->StimulationDay21->TooltipValue = "";

            // StimulationDay22
            $this->StimulationDay22->LinkCustomAttributes = "";
            $this->StimulationDay22->HrefValue = "";
            $this->StimulationDay22->TooltipValue = "";

            // StimulationDay23
            $this->StimulationDay23->LinkCustomAttributes = "";
            $this->StimulationDay23->HrefValue = "";
            $this->StimulationDay23->TooltipValue = "";

            // StimulationDay24
            $this->StimulationDay24->LinkCustomAttributes = "";
            $this->StimulationDay24->HrefValue = "";
            $this->StimulationDay24->TooltipValue = "";

            // StimulationDay25
            $this->StimulationDay25->LinkCustomAttributes = "";
            $this->StimulationDay25->HrefValue = "";
            $this->StimulationDay25->TooltipValue = "";

            // Tablet14
            $this->Tablet14->LinkCustomAttributes = "";
            $this->Tablet14->HrefValue = "";
            $this->Tablet14->TooltipValue = "";

            // Tablet15
            $this->Tablet15->LinkCustomAttributes = "";
            $this->Tablet15->HrefValue = "";
            $this->Tablet15->TooltipValue = "";

            // Tablet16
            $this->Tablet16->LinkCustomAttributes = "";
            $this->Tablet16->HrefValue = "";
            $this->Tablet16->TooltipValue = "";

            // Tablet17
            $this->Tablet17->LinkCustomAttributes = "";
            $this->Tablet17->HrefValue = "";
            $this->Tablet17->TooltipValue = "";

            // Tablet18
            $this->Tablet18->LinkCustomAttributes = "";
            $this->Tablet18->HrefValue = "";
            $this->Tablet18->TooltipValue = "";

            // Tablet19
            $this->Tablet19->LinkCustomAttributes = "";
            $this->Tablet19->HrefValue = "";
            $this->Tablet19->TooltipValue = "";

            // Tablet20
            $this->Tablet20->LinkCustomAttributes = "";
            $this->Tablet20->HrefValue = "";
            $this->Tablet20->TooltipValue = "";

            // Tablet21
            $this->Tablet21->LinkCustomAttributes = "";
            $this->Tablet21->HrefValue = "";
            $this->Tablet21->TooltipValue = "";

            // Tablet22
            $this->Tablet22->LinkCustomAttributes = "";
            $this->Tablet22->HrefValue = "";
            $this->Tablet22->TooltipValue = "";

            // Tablet23
            $this->Tablet23->LinkCustomAttributes = "";
            $this->Tablet23->HrefValue = "";
            $this->Tablet23->TooltipValue = "";

            // Tablet24
            $this->Tablet24->LinkCustomAttributes = "";
            $this->Tablet24->HrefValue = "";
            $this->Tablet24->TooltipValue = "";

            // Tablet25
            $this->Tablet25->LinkCustomAttributes = "";
            $this->Tablet25->HrefValue = "";
            $this->Tablet25->TooltipValue = "";

            // RFSH14
            $this->RFSH14->LinkCustomAttributes = "";
            $this->RFSH14->HrefValue = "";
            $this->RFSH14->TooltipValue = "";

            // RFSH15
            $this->RFSH15->LinkCustomAttributes = "";
            $this->RFSH15->HrefValue = "";
            $this->RFSH15->TooltipValue = "";

            // RFSH16
            $this->RFSH16->LinkCustomAttributes = "";
            $this->RFSH16->HrefValue = "";
            $this->RFSH16->TooltipValue = "";

            // RFSH17
            $this->RFSH17->LinkCustomAttributes = "";
            $this->RFSH17->HrefValue = "";
            $this->RFSH17->TooltipValue = "";

            // RFSH18
            $this->RFSH18->LinkCustomAttributes = "";
            $this->RFSH18->HrefValue = "";
            $this->RFSH18->TooltipValue = "";

            // RFSH19
            $this->RFSH19->LinkCustomAttributes = "";
            $this->RFSH19->HrefValue = "";
            $this->RFSH19->TooltipValue = "";

            // RFSH20
            $this->RFSH20->LinkCustomAttributes = "";
            $this->RFSH20->HrefValue = "";
            $this->RFSH20->TooltipValue = "";

            // RFSH21
            $this->RFSH21->LinkCustomAttributes = "";
            $this->RFSH21->HrefValue = "";
            $this->RFSH21->TooltipValue = "";

            // RFSH22
            $this->RFSH22->LinkCustomAttributes = "";
            $this->RFSH22->HrefValue = "";
            $this->RFSH22->TooltipValue = "";

            // RFSH23
            $this->RFSH23->LinkCustomAttributes = "";
            $this->RFSH23->HrefValue = "";
            $this->RFSH23->TooltipValue = "";

            // RFSH24
            $this->RFSH24->LinkCustomAttributes = "";
            $this->RFSH24->HrefValue = "";
            $this->RFSH24->TooltipValue = "";

            // RFSH25
            $this->RFSH25->LinkCustomAttributes = "";
            $this->RFSH25->HrefValue = "";
            $this->RFSH25->TooltipValue = "";

            // HMG14
            $this->HMG14->LinkCustomAttributes = "";
            $this->HMG14->HrefValue = "";
            $this->HMG14->TooltipValue = "";

            // HMG15
            $this->HMG15->LinkCustomAttributes = "";
            $this->HMG15->HrefValue = "";
            $this->HMG15->TooltipValue = "";

            // HMG16
            $this->HMG16->LinkCustomAttributes = "";
            $this->HMG16->HrefValue = "";
            $this->HMG16->TooltipValue = "";

            // HMG17
            $this->HMG17->LinkCustomAttributes = "";
            $this->HMG17->HrefValue = "";
            $this->HMG17->TooltipValue = "";

            // HMG18
            $this->HMG18->LinkCustomAttributes = "";
            $this->HMG18->HrefValue = "";
            $this->HMG18->TooltipValue = "";

            // HMG19
            $this->HMG19->LinkCustomAttributes = "";
            $this->HMG19->HrefValue = "";
            $this->HMG19->TooltipValue = "";

            // HMG20
            $this->HMG20->LinkCustomAttributes = "";
            $this->HMG20->HrefValue = "";
            $this->HMG20->TooltipValue = "";

            // HMG21
            $this->HMG21->LinkCustomAttributes = "";
            $this->HMG21->HrefValue = "";
            $this->HMG21->TooltipValue = "";

            // HMG22
            $this->HMG22->LinkCustomAttributes = "";
            $this->HMG22->HrefValue = "";
            $this->HMG22->TooltipValue = "";

            // HMG23
            $this->HMG23->LinkCustomAttributes = "";
            $this->HMG23->HrefValue = "";
            $this->HMG23->TooltipValue = "";

            // HMG24
            $this->HMG24->LinkCustomAttributes = "";
            $this->HMG24->HrefValue = "";
            $this->HMG24->TooltipValue = "";

            // HMG25
            $this->HMG25->LinkCustomAttributes = "";
            $this->HMG25->HrefValue = "";
            $this->HMG25->TooltipValue = "";

            // GnRH14
            $this->GnRH14->LinkCustomAttributes = "";
            $this->GnRH14->HrefValue = "";
            $this->GnRH14->TooltipValue = "";

            // GnRH15
            $this->GnRH15->LinkCustomAttributes = "";
            $this->GnRH15->HrefValue = "";
            $this->GnRH15->TooltipValue = "";

            // GnRH16
            $this->GnRH16->LinkCustomAttributes = "";
            $this->GnRH16->HrefValue = "";
            $this->GnRH16->TooltipValue = "";

            // GnRH17
            $this->GnRH17->LinkCustomAttributes = "";
            $this->GnRH17->HrefValue = "";
            $this->GnRH17->TooltipValue = "";

            // GnRH18
            $this->GnRH18->LinkCustomAttributes = "";
            $this->GnRH18->HrefValue = "";
            $this->GnRH18->TooltipValue = "";

            // GnRH19
            $this->GnRH19->LinkCustomAttributes = "";
            $this->GnRH19->HrefValue = "";
            $this->GnRH19->TooltipValue = "";

            // GnRH20
            $this->GnRH20->LinkCustomAttributes = "";
            $this->GnRH20->HrefValue = "";
            $this->GnRH20->TooltipValue = "";

            // GnRH21
            $this->GnRH21->LinkCustomAttributes = "";
            $this->GnRH21->HrefValue = "";
            $this->GnRH21->TooltipValue = "";

            // GnRH22
            $this->GnRH22->LinkCustomAttributes = "";
            $this->GnRH22->HrefValue = "";
            $this->GnRH22->TooltipValue = "";

            // GnRH23
            $this->GnRH23->LinkCustomAttributes = "";
            $this->GnRH23->HrefValue = "";
            $this->GnRH23->TooltipValue = "";

            // GnRH24
            $this->GnRH24->LinkCustomAttributes = "";
            $this->GnRH24->HrefValue = "";
            $this->GnRH24->TooltipValue = "";

            // GnRH25
            $this->GnRH25->LinkCustomAttributes = "";
            $this->GnRH25->HrefValue = "";
            $this->GnRH25->TooltipValue = "";

            // P414
            $this->P414->LinkCustomAttributes = "";
            $this->P414->HrefValue = "";
            $this->P414->TooltipValue = "";

            // P415
            $this->P415->LinkCustomAttributes = "";
            $this->P415->HrefValue = "";
            $this->P415->TooltipValue = "";

            // P416
            $this->P416->LinkCustomAttributes = "";
            $this->P416->HrefValue = "";
            $this->P416->TooltipValue = "";

            // P417
            $this->P417->LinkCustomAttributes = "";
            $this->P417->HrefValue = "";
            $this->P417->TooltipValue = "";

            // P418
            $this->P418->LinkCustomAttributes = "";
            $this->P418->HrefValue = "";
            $this->P418->TooltipValue = "";

            // P419
            $this->P419->LinkCustomAttributes = "";
            $this->P419->HrefValue = "";
            $this->P419->TooltipValue = "";

            // P420
            $this->P420->LinkCustomAttributes = "";
            $this->P420->HrefValue = "";
            $this->P420->TooltipValue = "";

            // P421
            $this->P421->LinkCustomAttributes = "";
            $this->P421->HrefValue = "";
            $this->P421->TooltipValue = "";

            // P422
            $this->P422->LinkCustomAttributes = "";
            $this->P422->HrefValue = "";
            $this->P422->TooltipValue = "";

            // P423
            $this->P423->LinkCustomAttributes = "";
            $this->P423->HrefValue = "";
            $this->P423->TooltipValue = "";

            // P424
            $this->P424->LinkCustomAttributes = "";
            $this->P424->HrefValue = "";
            $this->P424->TooltipValue = "";

            // P425
            $this->P425->LinkCustomAttributes = "";
            $this->P425->HrefValue = "";
            $this->P425->TooltipValue = "";

            // USGRt14
            $this->USGRt14->LinkCustomAttributes = "";
            $this->USGRt14->HrefValue = "";
            $this->USGRt14->TooltipValue = "";

            // USGRt15
            $this->USGRt15->LinkCustomAttributes = "";
            $this->USGRt15->HrefValue = "";
            $this->USGRt15->TooltipValue = "";

            // USGRt16
            $this->USGRt16->LinkCustomAttributes = "";
            $this->USGRt16->HrefValue = "";
            $this->USGRt16->TooltipValue = "";

            // USGRt17
            $this->USGRt17->LinkCustomAttributes = "";
            $this->USGRt17->HrefValue = "";
            $this->USGRt17->TooltipValue = "";

            // USGRt18
            $this->USGRt18->LinkCustomAttributes = "";
            $this->USGRt18->HrefValue = "";
            $this->USGRt18->TooltipValue = "";

            // USGRt19
            $this->USGRt19->LinkCustomAttributes = "";
            $this->USGRt19->HrefValue = "";
            $this->USGRt19->TooltipValue = "";

            // USGRt20
            $this->USGRt20->LinkCustomAttributes = "";
            $this->USGRt20->HrefValue = "";
            $this->USGRt20->TooltipValue = "";

            // USGRt21
            $this->USGRt21->LinkCustomAttributes = "";
            $this->USGRt21->HrefValue = "";
            $this->USGRt21->TooltipValue = "";

            // USGRt22
            $this->USGRt22->LinkCustomAttributes = "";
            $this->USGRt22->HrefValue = "";
            $this->USGRt22->TooltipValue = "";

            // USGRt23
            $this->USGRt23->LinkCustomAttributes = "";
            $this->USGRt23->HrefValue = "";
            $this->USGRt23->TooltipValue = "";

            // USGRt24
            $this->USGRt24->LinkCustomAttributes = "";
            $this->USGRt24->HrefValue = "";
            $this->USGRt24->TooltipValue = "";

            // USGRt25
            $this->USGRt25->LinkCustomAttributes = "";
            $this->USGRt25->HrefValue = "";
            $this->USGRt25->TooltipValue = "";

            // USGLt14
            $this->USGLt14->LinkCustomAttributes = "";
            $this->USGLt14->HrefValue = "";
            $this->USGLt14->TooltipValue = "";

            // USGLt15
            $this->USGLt15->LinkCustomAttributes = "";
            $this->USGLt15->HrefValue = "";
            $this->USGLt15->TooltipValue = "";

            // USGLt16
            $this->USGLt16->LinkCustomAttributes = "";
            $this->USGLt16->HrefValue = "";
            $this->USGLt16->TooltipValue = "";

            // USGLt17
            $this->USGLt17->LinkCustomAttributes = "";
            $this->USGLt17->HrefValue = "";
            $this->USGLt17->TooltipValue = "";

            // USGLt18
            $this->USGLt18->LinkCustomAttributes = "";
            $this->USGLt18->HrefValue = "";
            $this->USGLt18->TooltipValue = "";

            // USGLt19
            $this->USGLt19->LinkCustomAttributes = "";
            $this->USGLt19->HrefValue = "";
            $this->USGLt19->TooltipValue = "";

            // USGLt20
            $this->USGLt20->LinkCustomAttributes = "";
            $this->USGLt20->HrefValue = "";
            $this->USGLt20->TooltipValue = "";

            // USGLt21
            $this->USGLt21->LinkCustomAttributes = "";
            $this->USGLt21->HrefValue = "";
            $this->USGLt21->TooltipValue = "";

            // USGLt22
            $this->USGLt22->LinkCustomAttributes = "";
            $this->USGLt22->HrefValue = "";
            $this->USGLt22->TooltipValue = "";

            // USGLt23
            $this->USGLt23->LinkCustomAttributes = "";
            $this->USGLt23->HrefValue = "";
            $this->USGLt23->TooltipValue = "";

            // USGLt24
            $this->USGLt24->LinkCustomAttributes = "";
            $this->USGLt24->HrefValue = "";
            $this->USGLt24->TooltipValue = "";

            // USGLt25
            $this->USGLt25->LinkCustomAttributes = "";
            $this->USGLt25->HrefValue = "";
            $this->USGLt25->TooltipValue = "";

            // EM14
            $this->EM14->LinkCustomAttributes = "";
            $this->EM14->HrefValue = "";
            $this->EM14->TooltipValue = "";

            // EM15
            $this->EM15->LinkCustomAttributes = "";
            $this->EM15->HrefValue = "";
            $this->EM15->TooltipValue = "";

            // EM16
            $this->EM16->LinkCustomAttributes = "";
            $this->EM16->HrefValue = "";
            $this->EM16->TooltipValue = "";

            // EM17
            $this->EM17->LinkCustomAttributes = "";
            $this->EM17->HrefValue = "";
            $this->EM17->TooltipValue = "";

            // EM18
            $this->EM18->LinkCustomAttributes = "";
            $this->EM18->HrefValue = "";
            $this->EM18->TooltipValue = "";

            // EM19
            $this->EM19->LinkCustomAttributes = "";
            $this->EM19->HrefValue = "";
            $this->EM19->TooltipValue = "";

            // EM20
            $this->EM20->LinkCustomAttributes = "";
            $this->EM20->HrefValue = "";
            $this->EM20->TooltipValue = "";

            // EM21
            $this->EM21->LinkCustomAttributes = "";
            $this->EM21->HrefValue = "";
            $this->EM21->TooltipValue = "";

            // EM22
            $this->EM22->LinkCustomAttributes = "";
            $this->EM22->HrefValue = "";
            $this->EM22->TooltipValue = "";

            // EM23
            $this->EM23->LinkCustomAttributes = "";
            $this->EM23->HrefValue = "";
            $this->EM23->TooltipValue = "";

            // EM24
            $this->EM24->LinkCustomAttributes = "";
            $this->EM24->HrefValue = "";
            $this->EM24->TooltipValue = "";

            // EM25
            $this->EM25->LinkCustomAttributes = "";
            $this->EM25->HrefValue = "";
            $this->EM25->TooltipValue = "";

            // Others14
            $this->Others14->LinkCustomAttributes = "";
            $this->Others14->HrefValue = "";
            $this->Others14->TooltipValue = "";

            // Others15
            $this->Others15->LinkCustomAttributes = "";
            $this->Others15->HrefValue = "";
            $this->Others15->TooltipValue = "";

            // Others16
            $this->Others16->LinkCustomAttributes = "";
            $this->Others16->HrefValue = "";
            $this->Others16->TooltipValue = "";

            // Others17
            $this->Others17->LinkCustomAttributes = "";
            $this->Others17->HrefValue = "";
            $this->Others17->TooltipValue = "";

            // Others18
            $this->Others18->LinkCustomAttributes = "";
            $this->Others18->HrefValue = "";
            $this->Others18->TooltipValue = "";

            // Others19
            $this->Others19->LinkCustomAttributes = "";
            $this->Others19->HrefValue = "";
            $this->Others19->TooltipValue = "";

            // Others20
            $this->Others20->LinkCustomAttributes = "";
            $this->Others20->HrefValue = "";
            $this->Others20->TooltipValue = "";

            // Others21
            $this->Others21->LinkCustomAttributes = "";
            $this->Others21->HrefValue = "";
            $this->Others21->TooltipValue = "";

            // Others22
            $this->Others22->LinkCustomAttributes = "";
            $this->Others22->HrefValue = "";
            $this->Others22->TooltipValue = "";

            // Others23
            $this->Others23->LinkCustomAttributes = "";
            $this->Others23->HrefValue = "";
            $this->Others23->TooltipValue = "";

            // Others24
            $this->Others24->LinkCustomAttributes = "";
            $this->Others24->HrefValue = "";
            $this->Others24->TooltipValue = "";

            // Others25
            $this->Others25->LinkCustomAttributes = "";
            $this->Others25->HrefValue = "";
            $this->Others25->TooltipValue = "";

            // DR14
            $this->DR14->LinkCustomAttributes = "";
            $this->DR14->HrefValue = "";
            $this->DR14->TooltipValue = "";

            // DR15
            $this->DR15->LinkCustomAttributes = "";
            $this->DR15->HrefValue = "";
            $this->DR15->TooltipValue = "";

            // DR16
            $this->DR16->LinkCustomAttributes = "";
            $this->DR16->HrefValue = "";
            $this->DR16->TooltipValue = "";

            // DR17
            $this->DR17->LinkCustomAttributes = "";
            $this->DR17->HrefValue = "";
            $this->DR17->TooltipValue = "";

            // DR18
            $this->DR18->LinkCustomAttributes = "";
            $this->DR18->HrefValue = "";
            $this->DR18->TooltipValue = "";

            // DR19
            $this->DR19->LinkCustomAttributes = "";
            $this->DR19->HrefValue = "";
            $this->DR19->TooltipValue = "";

            // DR20
            $this->DR20->LinkCustomAttributes = "";
            $this->DR20->HrefValue = "";
            $this->DR20->TooltipValue = "";

            // DR21
            $this->DR21->LinkCustomAttributes = "";
            $this->DR21->HrefValue = "";
            $this->DR21->TooltipValue = "";

            // DR22
            $this->DR22->LinkCustomAttributes = "";
            $this->DR22->HrefValue = "";
            $this->DR22->TooltipValue = "";

            // DR23
            $this->DR23->LinkCustomAttributes = "";
            $this->DR23->HrefValue = "";
            $this->DR23->TooltipValue = "";

            // DR24
            $this->DR24->LinkCustomAttributes = "";
            $this->DR24->HrefValue = "";
            $this->DR24->TooltipValue = "";

            // DR25
            $this->DR25->LinkCustomAttributes = "";
            $this->DR25->HrefValue = "";
            $this->DR25->TooltipValue = "";

            // E214
            $this->E214->LinkCustomAttributes = "";
            $this->E214->HrefValue = "";
            $this->E214->TooltipValue = "";

            // E215
            $this->E215->LinkCustomAttributes = "";
            $this->E215->HrefValue = "";
            $this->E215->TooltipValue = "";

            // E216
            $this->E216->LinkCustomAttributes = "";
            $this->E216->HrefValue = "";
            $this->E216->TooltipValue = "";

            // E217
            $this->E217->LinkCustomAttributes = "";
            $this->E217->HrefValue = "";
            $this->E217->TooltipValue = "";

            // E218
            $this->E218->LinkCustomAttributes = "";
            $this->E218->HrefValue = "";
            $this->E218->TooltipValue = "";

            // E219
            $this->E219->LinkCustomAttributes = "";
            $this->E219->HrefValue = "";
            $this->E219->TooltipValue = "";

            // E220
            $this->E220->LinkCustomAttributes = "";
            $this->E220->HrefValue = "";
            $this->E220->TooltipValue = "";

            // E221
            $this->E221->LinkCustomAttributes = "";
            $this->E221->HrefValue = "";
            $this->E221->TooltipValue = "";

            // E222
            $this->E222->LinkCustomAttributes = "";
            $this->E222->HrefValue = "";
            $this->E222->TooltipValue = "";

            // E223
            $this->E223->LinkCustomAttributes = "";
            $this->E223->HrefValue = "";
            $this->E223->TooltipValue = "";

            // E224
            $this->E224->LinkCustomAttributes = "";
            $this->E224->HrefValue = "";
            $this->E224->TooltipValue = "";

            // E225
            $this->E225->LinkCustomAttributes = "";
            $this->E225->HrefValue = "";
            $this->E225->TooltipValue = "";

            // EEETTTDTE
            $this->EEETTTDTE->LinkCustomAttributes = "";
            $this->EEETTTDTE->HrefValue = "";
            $this->EEETTTDTE->TooltipValue = "";

            // bhcgdate
            $this->bhcgdate->LinkCustomAttributes = "";
            $this->bhcgdate->HrefValue = "";
            $this->bhcgdate->TooltipValue = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->LinkCustomAttributes = "";
            $this->TUBAL_PATENCY->HrefValue = "";
            $this->TUBAL_PATENCY->TooltipValue = "";

            // HSG
            $this->HSG->LinkCustomAttributes = "";
            $this->HSG->HrefValue = "";
            $this->HSG->TooltipValue = "";

            // DHL
            $this->DHL->LinkCustomAttributes = "";
            $this->DHL->HrefValue = "";
            $this->DHL->TooltipValue = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
            $this->UTERINE_PROBLEMS->HrefValue = "";
            $this->UTERINE_PROBLEMS->TooltipValue = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->LinkCustomAttributes = "";
            $this->W_COMORBIDS->HrefValue = "";
            $this->W_COMORBIDS->TooltipValue = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->LinkCustomAttributes = "";
            $this->H_COMORBIDS->HrefValue = "";
            $this->H_COMORBIDS->TooltipValue = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
            $this->SEXUAL_DYSFUNCTION->HrefValue = "";
            $this->SEXUAL_DYSFUNCTION->TooltipValue = "";

            // TABLETS
            $this->TABLETS->LinkCustomAttributes = "";
            $this->TABLETS->HrefValue = "";
            $this->TABLETS->TooltipValue = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
            $this->FOLLICLE_STATUS->HrefValue = "";
            $this->FOLLICLE_STATUS->TooltipValue = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
            $this->NUMBER_OF_IUI->HrefValue = "";
            $this->NUMBER_OF_IUI->TooltipValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";
            $this->PROCEDURE->TooltipValue = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
            $this->LUTEAL_SUPPORT->HrefValue = "";
            $this->LUTEAL_SUPPORT->TooltipValue = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->LinkCustomAttributes = "";
            $this->ONGOING_PREG->HrefValue = "";
            $this->ONGOING_PREG->TooltipValue = "";

            // EDD_Date
            $this->EDD_Date->LinkCustomAttributes = "";
            $this->EDD_Date->HrefValue = "";
            $this->EDD_Date->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
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

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            if (!$this->ARTCycle->Raw) {
                $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
            }
            $this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // FemaleFactor
            $this->FemaleFactor->EditAttrs["class"] = "form-control";
            $this->FemaleFactor->EditCustomAttributes = "";
            if (!$this->FemaleFactor->Raw) {
                $this->FemaleFactor->CurrentValue = HtmlDecode($this->FemaleFactor->CurrentValue);
            }
            $this->FemaleFactor->EditValue = HtmlEncode($this->FemaleFactor->CurrentValue);
            $this->FemaleFactor->PlaceHolder = RemoveHtml($this->FemaleFactor->caption());

            // MaleFactor
            $this->MaleFactor->EditAttrs["class"] = "form-control";
            $this->MaleFactor->EditCustomAttributes = "";
            if (!$this->MaleFactor->Raw) {
                $this->MaleFactor->CurrentValue = HtmlDecode($this->MaleFactor->CurrentValue);
            }
            $this->MaleFactor->EditValue = HtmlEncode($this->MaleFactor->CurrentValue);
            $this->MaleFactor->PlaceHolder = RemoveHtml($this->MaleFactor->caption());

            // Protocol
            $this->Protocol->EditAttrs["class"] = "form-control";
            $this->Protocol->EditCustomAttributes = "";
            if (!$this->Protocol->Raw) {
                $this->Protocol->CurrentValue = HtmlDecode($this->Protocol->CurrentValue);
            }
            $this->Protocol->EditValue = HtmlEncode($this->Protocol->CurrentValue);
            $this->Protocol->PlaceHolder = RemoveHtml($this->Protocol->caption());

            // SemenFrozen
            $this->SemenFrozen->EditAttrs["class"] = "form-control";
            $this->SemenFrozen->EditCustomAttributes = "";
            if (!$this->SemenFrozen->Raw) {
                $this->SemenFrozen->CurrentValue = HtmlDecode($this->SemenFrozen->CurrentValue);
            }
            $this->SemenFrozen->EditValue = HtmlEncode($this->SemenFrozen->CurrentValue);
            $this->SemenFrozen->PlaceHolder = RemoveHtml($this->SemenFrozen->caption());

            // A4ICSICycle
            $this->A4ICSICycle->EditAttrs["class"] = "form-control";
            $this->A4ICSICycle->EditCustomAttributes = "";
            if (!$this->A4ICSICycle->Raw) {
                $this->A4ICSICycle->CurrentValue = HtmlDecode($this->A4ICSICycle->CurrentValue);
            }
            $this->A4ICSICycle->EditValue = HtmlEncode($this->A4ICSICycle->CurrentValue);
            $this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

            // TotalICSICycle
            $this->TotalICSICycle->EditAttrs["class"] = "form-control";
            $this->TotalICSICycle->EditCustomAttributes = "";
            if (!$this->TotalICSICycle->Raw) {
                $this->TotalICSICycle->CurrentValue = HtmlDecode($this->TotalICSICycle->CurrentValue);
            }
            $this->TotalICSICycle->EditValue = HtmlEncode($this->TotalICSICycle->CurrentValue);
            $this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

            // TypeOfInfertility
            $this->TypeOfInfertility->EditAttrs["class"] = "form-control";
            $this->TypeOfInfertility->EditCustomAttributes = "";
            if (!$this->TypeOfInfertility->Raw) {
                $this->TypeOfInfertility->CurrentValue = HtmlDecode($this->TypeOfInfertility->CurrentValue);
            }
            $this->TypeOfInfertility->EditValue = HtmlEncode($this->TypeOfInfertility->CurrentValue);
            $this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

            // Duration
            $this->Duration->EditAttrs["class"] = "form-control";
            $this->Duration->EditCustomAttributes = "";
            if (!$this->Duration->Raw) {
                $this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
            }
            $this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
            $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            $this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 8));
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // RelevantHistory
            $this->RelevantHistory->EditAttrs["class"] = "form-control";
            $this->RelevantHistory->EditCustomAttributes = "";
            if (!$this->RelevantHistory->Raw) {
                $this->RelevantHistory->CurrentValue = HtmlDecode($this->RelevantHistory->CurrentValue);
            }
            $this->RelevantHistory->EditValue = HtmlEncode($this->RelevantHistory->CurrentValue);
            $this->RelevantHistory->PlaceHolder = RemoveHtml($this->RelevantHistory->caption());

            // IUICycles
            $this->IUICycles->EditAttrs["class"] = "form-control";
            $this->IUICycles->EditCustomAttributes = "";
            if (!$this->IUICycles->Raw) {
                $this->IUICycles->CurrentValue = HtmlDecode($this->IUICycles->CurrentValue);
            }
            $this->IUICycles->EditValue = HtmlEncode($this->IUICycles->CurrentValue);
            $this->IUICycles->PlaceHolder = RemoveHtml($this->IUICycles->caption());

            // AFC
            $this->AFC->EditAttrs["class"] = "form-control";
            $this->AFC->EditCustomAttributes = "";
            if (!$this->AFC->Raw) {
                $this->AFC->CurrentValue = HtmlDecode($this->AFC->CurrentValue);
            }
            $this->AFC->EditValue = HtmlEncode($this->AFC->CurrentValue);
            $this->AFC->PlaceHolder = RemoveHtml($this->AFC->caption());

            // AMH
            $this->AMH->EditAttrs["class"] = "form-control";
            $this->AMH->EditCustomAttributes = "";
            if (!$this->AMH->Raw) {
                $this->AMH->CurrentValue = HtmlDecode($this->AMH->CurrentValue);
            }
            $this->AMH->EditValue = HtmlEncode($this->AMH->CurrentValue);
            $this->AMH->PlaceHolder = RemoveHtml($this->AMH->caption());

            // FBMI
            $this->FBMI->EditAttrs["class"] = "form-control";
            $this->FBMI->EditCustomAttributes = "";
            if (!$this->FBMI->Raw) {
                $this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
            }
            $this->FBMI->EditValue = HtmlEncode($this->FBMI->CurrentValue);
            $this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

            // MBMI
            $this->MBMI->EditAttrs["class"] = "form-control";
            $this->MBMI->EditCustomAttributes = "";
            if (!$this->MBMI->Raw) {
                $this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
            }
            $this->MBMI->EditValue = HtmlEncode($this->MBMI->CurrentValue);
            $this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

            // OvarianVolumeRT
            $this->OvarianVolumeRT->EditAttrs["class"] = "form-control";
            $this->OvarianVolumeRT->EditCustomAttributes = "";
            if (!$this->OvarianVolumeRT->Raw) {
                $this->OvarianVolumeRT->CurrentValue = HtmlDecode($this->OvarianVolumeRT->CurrentValue);
            }
            $this->OvarianVolumeRT->EditValue = HtmlEncode($this->OvarianVolumeRT->CurrentValue);
            $this->OvarianVolumeRT->PlaceHolder = RemoveHtml($this->OvarianVolumeRT->caption());

            // OvarianVolumeLT
            $this->OvarianVolumeLT->EditAttrs["class"] = "form-control";
            $this->OvarianVolumeLT->EditCustomAttributes = "";
            if (!$this->OvarianVolumeLT->Raw) {
                $this->OvarianVolumeLT->CurrentValue = HtmlDecode($this->OvarianVolumeLT->CurrentValue);
            }
            $this->OvarianVolumeLT->EditValue = HtmlEncode($this->OvarianVolumeLT->CurrentValue);
            $this->OvarianVolumeLT->PlaceHolder = RemoveHtml($this->OvarianVolumeLT->caption());

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->EditAttrs["class"] = "form-control";
            $this->DAYSOFSTIMULATION->EditCustomAttributes = "";
            if (!$this->DAYSOFSTIMULATION->Raw) {
                $this->DAYSOFSTIMULATION->CurrentValue = HtmlDecode($this->DAYSOFSTIMULATION->CurrentValue);
            }
            $this->DAYSOFSTIMULATION->EditValue = HtmlEncode($this->DAYSOFSTIMULATION->CurrentValue);
            $this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

            // DOSEOFGONADOTROPINS
            $this->DOSEOFGONADOTROPINS->EditAttrs["class"] = "form-control";
            $this->DOSEOFGONADOTROPINS->EditCustomAttributes = "";
            if (!$this->DOSEOFGONADOTROPINS->Raw) {
                $this->DOSEOFGONADOTROPINS->CurrentValue = HtmlDecode($this->DOSEOFGONADOTROPINS->CurrentValue);
            }
            $this->DOSEOFGONADOTROPINS->EditValue = HtmlEncode($this->DOSEOFGONADOTROPINS->CurrentValue);
            $this->DOSEOFGONADOTROPINS->PlaceHolder = RemoveHtml($this->DOSEOFGONADOTROPINS->caption());

            // INJTYPE
            $this->INJTYPE->EditAttrs["class"] = "form-control";
            $this->INJTYPE->EditCustomAttributes = "";
            if (!$this->INJTYPE->Raw) {
                $this->INJTYPE->CurrentValue = HtmlDecode($this->INJTYPE->CurrentValue);
            }
            $this->INJTYPE->EditValue = HtmlEncode($this->INJTYPE->CurrentValue);
            $this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

            // ANTAGONISTDAYS
            $this->ANTAGONISTDAYS->EditAttrs["class"] = "form-control";
            $this->ANTAGONISTDAYS->EditCustomAttributes = "";
            if (!$this->ANTAGONISTDAYS->Raw) {
                $this->ANTAGONISTDAYS->CurrentValue = HtmlDecode($this->ANTAGONISTDAYS->CurrentValue);
            }
            $this->ANTAGONISTDAYS->EditValue = HtmlEncode($this->ANTAGONISTDAYS->CurrentValue);
            $this->ANTAGONISTDAYS->PlaceHolder = RemoveHtml($this->ANTAGONISTDAYS->caption());

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
            $this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
            if (!$this->ANTAGONISTSTARTDAY->Raw) {
                $this->ANTAGONISTSTARTDAY->CurrentValue = HtmlDecode($this->ANTAGONISTSTARTDAY->CurrentValue);
            }
            $this->ANTAGONISTSTARTDAY->EditValue = HtmlEncode($this->ANTAGONISTSTARTDAY->CurrentValue);
            $this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

            // GROWTHHORMONE
            $this->GROWTHHORMONE->EditAttrs["class"] = "form-control";
            $this->GROWTHHORMONE->EditCustomAttributes = "";
            if (!$this->GROWTHHORMONE->Raw) {
                $this->GROWTHHORMONE->CurrentValue = HtmlDecode($this->GROWTHHORMONE->CurrentValue);
            }
            $this->GROWTHHORMONE->EditValue = HtmlEncode($this->GROWTHHORMONE->CurrentValue);
            $this->GROWTHHORMONE->PlaceHolder = RemoveHtml($this->GROWTHHORMONE->caption());

            // PRETREATMENT
            $this->PRETREATMENT->EditAttrs["class"] = "form-control";
            $this->PRETREATMENT->EditCustomAttributes = "";
            if (!$this->PRETREATMENT->Raw) {
                $this->PRETREATMENT->CurrentValue = HtmlDecode($this->PRETREATMENT->CurrentValue);
            }
            $this->PRETREATMENT->EditValue = HtmlEncode($this->PRETREATMENT->CurrentValue);
            $this->PRETREATMENT->PlaceHolder = RemoveHtml($this->PRETREATMENT->caption());

            // SerumP4
            $this->SerumP4->EditAttrs["class"] = "form-control";
            $this->SerumP4->EditCustomAttributes = "";
            if (!$this->SerumP4->Raw) {
                $this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
            }
            $this->SerumP4->EditValue = HtmlEncode($this->SerumP4->CurrentValue);
            $this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

            // FORT
            $this->FORT->EditAttrs["class"] = "form-control";
            $this->FORT->EditCustomAttributes = "";
            if (!$this->FORT->Raw) {
                $this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
            }
            $this->FORT->EditValue = HtmlEncode($this->FORT->CurrentValue);
            $this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

            // MedicalFactors
            $this->MedicalFactors->EditAttrs["class"] = "form-control";
            $this->MedicalFactors->EditCustomAttributes = "";
            if (!$this->MedicalFactors->Raw) {
                $this->MedicalFactors->CurrentValue = HtmlDecode($this->MedicalFactors->CurrentValue);
            }
            $this->MedicalFactors->EditValue = HtmlEncode($this->MedicalFactors->CurrentValue);
            $this->MedicalFactors->PlaceHolder = RemoveHtml($this->MedicalFactors->caption());

            // SCDate
            $this->SCDate->EditAttrs["class"] = "form-control";
            $this->SCDate->EditCustomAttributes = "";
            $this->SCDate->EditValue = HtmlEncode(FormatDateTime($this->SCDate->CurrentValue, 8));
            $this->SCDate->PlaceHolder = RemoveHtml($this->SCDate->caption());

            // OvarianSurgery
            $this->OvarianSurgery->EditAttrs["class"] = "form-control";
            $this->OvarianSurgery->EditCustomAttributes = "";
            if (!$this->OvarianSurgery->Raw) {
                $this->OvarianSurgery->CurrentValue = HtmlDecode($this->OvarianSurgery->CurrentValue);
            }
            $this->OvarianSurgery->EditValue = HtmlEncode($this->OvarianSurgery->CurrentValue);
            $this->OvarianSurgery->PlaceHolder = RemoveHtml($this->OvarianSurgery->caption());

            // PreProcedureOrder
            $this->PreProcedureOrder->EditAttrs["class"] = "form-control";
            $this->PreProcedureOrder->EditCustomAttributes = "";
            if (!$this->PreProcedureOrder->Raw) {
                $this->PreProcedureOrder->CurrentValue = HtmlDecode($this->PreProcedureOrder->CurrentValue);
            }
            $this->PreProcedureOrder->EditValue = HtmlEncode($this->PreProcedureOrder->CurrentValue);
            $this->PreProcedureOrder->PlaceHolder = RemoveHtml($this->PreProcedureOrder->caption());

            // TRIGGERR
            $this->TRIGGERR->EditAttrs["class"] = "form-control";
            $this->TRIGGERR->EditCustomAttributes = "";
            if (!$this->TRIGGERR->Raw) {
                $this->TRIGGERR->CurrentValue = HtmlDecode($this->TRIGGERR->CurrentValue);
            }
            $this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->CurrentValue);
            $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

            // TRIGGERDATE
            $this->TRIGGERDATE->EditAttrs["class"] = "form-control";
            $this->TRIGGERDATE->EditCustomAttributes = "";
            $this->TRIGGERDATE->EditValue = HtmlEncode(FormatDateTime($this->TRIGGERDATE->CurrentValue, 8));
            $this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

            // ATHOMEorCLINIC
            $this->ATHOMEorCLINIC->EditAttrs["class"] = "form-control";
            $this->ATHOMEorCLINIC->EditCustomAttributes = "";
            if (!$this->ATHOMEorCLINIC->Raw) {
                $this->ATHOMEorCLINIC->CurrentValue = HtmlDecode($this->ATHOMEorCLINIC->CurrentValue);
            }
            $this->ATHOMEorCLINIC->EditValue = HtmlEncode($this->ATHOMEorCLINIC->CurrentValue);
            $this->ATHOMEorCLINIC->PlaceHolder = RemoveHtml($this->ATHOMEorCLINIC->caption());

            // OPUDATE
            $this->OPUDATE->EditAttrs["class"] = "form-control";
            $this->OPUDATE->EditCustomAttributes = "";
            $this->OPUDATE->EditValue = HtmlEncode(FormatDateTime($this->OPUDATE->CurrentValue, 8));
            $this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

            // ALLFREEZEINDICATION
            $this->ALLFREEZEINDICATION->EditAttrs["class"] = "form-control";
            $this->ALLFREEZEINDICATION->EditCustomAttributes = "";
            if (!$this->ALLFREEZEINDICATION->Raw) {
                $this->ALLFREEZEINDICATION->CurrentValue = HtmlDecode($this->ALLFREEZEINDICATION->CurrentValue);
            }
            $this->ALLFREEZEINDICATION->EditValue = HtmlEncode($this->ALLFREEZEINDICATION->CurrentValue);
            $this->ALLFREEZEINDICATION->PlaceHolder = RemoveHtml($this->ALLFREEZEINDICATION->caption());

            // ERA
            $this->ERA->EditAttrs["class"] = "form-control";
            $this->ERA->EditCustomAttributes = "";
            if (!$this->ERA->Raw) {
                $this->ERA->CurrentValue = HtmlDecode($this->ERA->CurrentValue);
            }
            $this->ERA->EditValue = HtmlEncode($this->ERA->CurrentValue);
            $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

            // PGTA
            $this->PGTA->EditAttrs["class"] = "form-control";
            $this->PGTA->EditCustomAttributes = "";
            if (!$this->PGTA->Raw) {
                $this->PGTA->CurrentValue = HtmlDecode($this->PGTA->CurrentValue);
            }
            $this->PGTA->EditValue = HtmlEncode($this->PGTA->CurrentValue);
            $this->PGTA->PlaceHolder = RemoveHtml($this->PGTA->caption());

            // PGD
            $this->PGD->EditAttrs["class"] = "form-control";
            $this->PGD->EditCustomAttributes = "";
            if (!$this->PGD->Raw) {
                $this->PGD->CurrentValue = HtmlDecode($this->PGD->CurrentValue);
            }
            $this->PGD->EditValue = HtmlEncode($this->PGD->CurrentValue);
            $this->PGD->PlaceHolder = RemoveHtml($this->PGD->caption());

            // DATEOFET
            $this->DATEOFET->EditAttrs["class"] = "form-control";
            $this->DATEOFET->EditCustomAttributes = "";
            $this->DATEOFET->EditValue = HtmlEncode(FormatDateTime($this->DATEOFET->CurrentValue, 8));
            $this->DATEOFET->PlaceHolder = RemoveHtml($this->DATEOFET->caption());

            // ET
            $this->ET->EditAttrs["class"] = "form-control";
            $this->ET->EditCustomAttributes = "";
            if (!$this->ET->Raw) {
                $this->ET->CurrentValue = HtmlDecode($this->ET->CurrentValue);
            }
            $this->ET->EditValue = HtmlEncode($this->ET->CurrentValue);
            $this->ET->PlaceHolder = RemoveHtml($this->ET->caption());

            // ESET
            $this->ESET->EditAttrs["class"] = "form-control";
            $this->ESET->EditCustomAttributes = "";
            if (!$this->ESET->Raw) {
                $this->ESET->CurrentValue = HtmlDecode($this->ESET->CurrentValue);
            }
            $this->ESET->EditValue = HtmlEncode($this->ESET->CurrentValue);
            $this->ESET->PlaceHolder = RemoveHtml($this->ESET->caption());

            // DOET
            $this->DOET->EditAttrs["class"] = "form-control";
            $this->DOET->EditCustomAttributes = "";
            if (!$this->DOET->Raw) {
                $this->DOET->CurrentValue = HtmlDecode($this->DOET->CurrentValue);
            }
            $this->DOET->EditValue = HtmlEncode($this->DOET->CurrentValue);
            $this->DOET->PlaceHolder = RemoveHtml($this->DOET->caption());

            // SEMENPREPARATION
            $this->SEMENPREPARATION->EditAttrs["class"] = "form-control";
            $this->SEMENPREPARATION->EditCustomAttributes = "";
            if (!$this->SEMENPREPARATION->Raw) {
                $this->SEMENPREPARATION->CurrentValue = HtmlDecode($this->SEMENPREPARATION->CurrentValue);
            }
            $this->SEMENPREPARATION->EditValue = HtmlEncode($this->SEMENPREPARATION->CurrentValue);
            $this->SEMENPREPARATION->PlaceHolder = RemoveHtml($this->SEMENPREPARATION->caption());

            // REASONFORESET
            $this->REASONFORESET->EditAttrs["class"] = "form-control";
            $this->REASONFORESET->EditCustomAttributes = "";
            if (!$this->REASONFORESET->Raw) {
                $this->REASONFORESET->CurrentValue = HtmlDecode($this->REASONFORESET->CurrentValue);
            }
            $this->REASONFORESET->EditValue = HtmlEncode($this->REASONFORESET->CurrentValue);
            $this->REASONFORESET->PlaceHolder = RemoveHtml($this->REASONFORESET->caption());

            // Expectedoocytes
            $this->Expectedoocytes->EditAttrs["class"] = "form-control";
            $this->Expectedoocytes->EditCustomAttributes = "";
            if (!$this->Expectedoocytes->Raw) {
                $this->Expectedoocytes->CurrentValue = HtmlDecode($this->Expectedoocytes->CurrentValue);
            }
            $this->Expectedoocytes->EditValue = HtmlEncode($this->Expectedoocytes->CurrentValue);
            $this->Expectedoocytes->PlaceHolder = RemoveHtml($this->Expectedoocytes->caption());

            // StChDate1
            $this->StChDate1->EditAttrs["class"] = "form-control";
            $this->StChDate1->EditCustomAttributes = "";
            $this->StChDate1->EditValue = HtmlEncode(FormatDateTime($this->StChDate1->CurrentValue, 8));
            $this->StChDate1->PlaceHolder = RemoveHtml($this->StChDate1->caption());

            // StChDate2
            $this->StChDate2->EditAttrs["class"] = "form-control";
            $this->StChDate2->EditCustomAttributes = "";
            $this->StChDate2->EditValue = HtmlEncode(FormatDateTime($this->StChDate2->CurrentValue, 8));
            $this->StChDate2->PlaceHolder = RemoveHtml($this->StChDate2->caption());

            // StChDate3
            $this->StChDate3->EditAttrs["class"] = "form-control";
            $this->StChDate3->EditCustomAttributes = "";
            $this->StChDate3->EditValue = HtmlEncode(FormatDateTime($this->StChDate3->CurrentValue, 8));
            $this->StChDate3->PlaceHolder = RemoveHtml($this->StChDate3->caption());

            // StChDate4
            $this->StChDate4->EditAttrs["class"] = "form-control";
            $this->StChDate4->EditCustomAttributes = "";
            $this->StChDate4->EditValue = HtmlEncode(FormatDateTime($this->StChDate4->CurrentValue, 8));
            $this->StChDate4->PlaceHolder = RemoveHtml($this->StChDate4->caption());

            // StChDate5
            $this->StChDate5->EditAttrs["class"] = "form-control";
            $this->StChDate5->EditCustomAttributes = "";
            $this->StChDate5->EditValue = HtmlEncode(FormatDateTime($this->StChDate5->CurrentValue, 8));
            $this->StChDate5->PlaceHolder = RemoveHtml($this->StChDate5->caption());

            // StChDate6
            $this->StChDate6->EditAttrs["class"] = "form-control";
            $this->StChDate6->EditCustomAttributes = "";
            $this->StChDate6->EditValue = HtmlEncode(FormatDateTime($this->StChDate6->CurrentValue, 8));
            $this->StChDate6->PlaceHolder = RemoveHtml($this->StChDate6->caption());

            // StChDate7
            $this->StChDate7->EditAttrs["class"] = "form-control";
            $this->StChDate7->EditCustomAttributes = "";
            $this->StChDate7->EditValue = HtmlEncode(FormatDateTime($this->StChDate7->CurrentValue, 8));
            $this->StChDate7->PlaceHolder = RemoveHtml($this->StChDate7->caption());

            // StChDate8
            $this->StChDate8->EditAttrs["class"] = "form-control";
            $this->StChDate8->EditCustomAttributes = "";
            $this->StChDate8->EditValue = HtmlEncode(FormatDateTime($this->StChDate8->CurrentValue, 8));
            $this->StChDate8->PlaceHolder = RemoveHtml($this->StChDate8->caption());

            // StChDate9
            $this->StChDate9->EditAttrs["class"] = "form-control";
            $this->StChDate9->EditCustomAttributes = "";
            $this->StChDate9->EditValue = HtmlEncode(FormatDateTime($this->StChDate9->CurrentValue, 8));
            $this->StChDate9->PlaceHolder = RemoveHtml($this->StChDate9->caption());

            // StChDate10
            $this->StChDate10->EditAttrs["class"] = "form-control";
            $this->StChDate10->EditCustomAttributes = "";
            $this->StChDate10->EditValue = HtmlEncode(FormatDateTime($this->StChDate10->CurrentValue, 8));
            $this->StChDate10->PlaceHolder = RemoveHtml($this->StChDate10->caption());

            // StChDate11
            $this->StChDate11->EditAttrs["class"] = "form-control";
            $this->StChDate11->EditCustomAttributes = "";
            $this->StChDate11->EditValue = HtmlEncode(FormatDateTime($this->StChDate11->CurrentValue, 8));
            $this->StChDate11->PlaceHolder = RemoveHtml($this->StChDate11->caption());

            // StChDate12
            $this->StChDate12->EditAttrs["class"] = "form-control";
            $this->StChDate12->EditCustomAttributes = "";
            $this->StChDate12->EditValue = HtmlEncode(FormatDateTime($this->StChDate12->CurrentValue, 8));
            $this->StChDate12->PlaceHolder = RemoveHtml($this->StChDate12->caption());

            // StChDate13
            $this->StChDate13->EditAttrs["class"] = "form-control";
            $this->StChDate13->EditCustomAttributes = "";
            $this->StChDate13->EditValue = HtmlEncode(FormatDateTime($this->StChDate13->CurrentValue, 8));
            $this->StChDate13->PlaceHolder = RemoveHtml($this->StChDate13->caption());

            // CycleDay1
            $this->CycleDay1->EditAttrs["class"] = "form-control";
            $this->CycleDay1->EditCustomAttributes = "";
            if (!$this->CycleDay1->Raw) {
                $this->CycleDay1->CurrentValue = HtmlDecode($this->CycleDay1->CurrentValue);
            }
            $this->CycleDay1->EditValue = HtmlEncode($this->CycleDay1->CurrentValue);
            $this->CycleDay1->PlaceHolder = RemoveHtml($this->CycleDay1->caption());

            // CycleDay2
            $this->CycleDay2->EditAttrs["class"] = "form-control";
            $this->CycleDay2->EditCustomAttributes = "";
            if (!$this->CycleDay2->Raw) {
                $this->CycleDay2->CurrentValue = HtmlDecode($this->CycleDay2->CurrentValue);
            }
            $this->CycleDay2->EditValue = HtmlEncode($this->CycleDay2->CurrentValue);
            $this->CycleDay2->PlaceHolder = RemoveHtml($this->CycleDay2->caption());

            // CycleDay3
            $this->CycleDay3->EditAttrs["class"] = "form-control";
            $this->CycleDay3->EditCustomAttributes = "";
            if (!$this->CycleDay3->Raw) {
                $this->CycleDay3->CurrentValue = HtmlDecode($this->CycleDay3->CurrentValue);
            }
            $this->CycleDay3->EditValue = HtmlEncode($this->CycleDay3->CurrentValue);
            $this->CycleDay3->PlaceHolder = RemoveHtml($this->CycleDay3->caption());

            // CycleDay4
            $this->CycleDay4->EditAttrs["class"] = "form-control";
            $this->CycleDay4->EditCustomAttributes = "";
            if (!$this->CycleDay4->Raw) {
                $this->CycleDay4->CurrentValue = HtmlDecode($this->CycleDay4->CurrentValue);
            }
            $this->CycleDay4->EditValue = HtmlEncode($this->CycleDay4->CurrentValue);
            $this->CycleDay4->PlaceHolder = RemoveHtml($this->CycleDay4->caption());

            // CycleDay5
            $this->CycleDay5->EditAttrs["class"] = "form-control";
            $this->CycleDay5->EditCustomAttributes = "";
            if (!$this->CycleDay5->Raw) {
                $this->CycleDay5->CurrentValue = HtmlDecode($this->CycleDay5->CurrentValue);
            }
            $this->CycleDay5->EditValue = HtmlEncode($this->CycleDay5->CurrentValue);
            $this->CycleDay5->PlaceHolder = RemoveHtml($this->CycleDay5->caption());

            // CycleDay6
            $this->CycleDay6->EditAttrs["class"] = "form-control";
            $this->CycleDay6->EditCustomAttributes = "";
            if (!$this->CycleDay6->Raw) {
                $this->CycleDay6->CurrentValue = HtmlDecode($this->CycleDay6->CurrentValue);
            }
            $this->CycleDay6->EditValue = HtmlEncode($this->CycleDay6->CurrentValue);
            $this->CycleDay6->PlaceHolder = RemoveHtml($this->CycleDay6->caption());

            // CycleDay7
            $this->CycleDay7->EditAttrs["class"] = "form-control";
            $this->CycleDay7->EditCustomAttributes = "";
            if (!$this->CycleDay7->Raw) {
                $this->CycleDay7->CurrentValue = HtmlDecode($this->CycleDay7->CurrentValue);
            }
            $this->CycleDay7->EditValue = HtmlEncode($this->CycleDay7->CurrentValue);
            $this->CycleDay7->PlaceHolder = RemoveHtml($this->CycleDay7->caption());

            // CycleDay8
            $this->CycleDay8->EditAttrs["class"] = "form-control";
            $this->CycleDay8->EditCustomAttributes = "";
            if (!$this->CycleDay8->Raw) {
                $this->CycleDay8->CurrentValue = HtmlDecode($this->CycleDay8->CurrentValue);
            }
            $this->CycleDay8->EditValue = HtmlEncode($this->CycleDay8->CurrentValue);
            $this->CycleDay8->PlaceHolder = RemoveHtml($this->CycleDay8->caption());

            // CycleDay9
            $this->CycleDay9->EditAttrs["class"] = "form-control";
            $this->CycleDay9->EditCustomAttributes = "";
            if (!$this->CycleDay9->Raw) {
                $this->CycleDay9->CurrentValue = HtmlDecode($this->CycleDay9->CurrentValue);
            }
            $this->CycleDay9->EditValue = HtmlEncode($this->CycleDay9->CurrentValue);
            $this->CycleDay9->PlaceHolder = RemoveHtml($this->CycleDay9->caption());

            // CycleDay10
            $this->CycleDay10->EditAttrs["class"] = "form-control";
            $this->CycleDay10->EditCustomAttributes = "";
            if (!$this->CycleDay10->Raw) {
                $this->CycleDay10->CurrentValue = HtmlDecode($this->CycleDay10->CurrentValue);
            }
            $this->CycleDay10->EditValue = HtmlEncode($this->CycleDay10->CurrentValue);
            $this->CycleDay10->PlaceHolder = RemoveHtml($this->CycleDay10->caption());

            // CycleDay11
            $this->CycleDay11->EditAttrs["class"] = "form-control";
            $this->CycleDay11->EditCustomAttributes = "";
            if (!$this->CycleDay11->Raw) {
                $this->CycleDay11->CurrentValue = HtmlDecode($this->CycleDay11->CurrentValue);
            }
            $this->CycleDay11->EditValue = HtmlEncode($this->CycleDay11->CurrentValue);
            $this->CycleDay11->PlaceHolder = RemoveHtml($this->CycleDay11->caption());

            // CycleDay12
            $this->CycleDay12->EditAttrs["class"] = "form-control";
            $this->CycleDay12->EditCustomAttributes = "";
            if (!$this->CycleDay12->Raw) {
                $this->CycleDay12->CurrentValue = HtmlDecode($this->CycleDay12->CurrentValue);
            }
            $this->CycleDay12->EditValue = HtmlEncode($this->CycleDay12->CurrentValue);
            $this->CycleDay12->PlaceHolder = RemoveHtml($this->CycleDay12->caption());

            // CycleDay13
            $this->CycleDay13->EditAttrs["class"] = "form-control";
            $this->CycleDay13->EditCustomAttributes = "";
            if (!$this->CycleDay13->Raw) {
                $this->CycleDay13->CurrentValue = HtmlDecode($this->CycleDay13->CurrentValue);
            }
            $this->CycleDay13->EditValue = HtmlEncode($this->CycleDay13->CurrentValue);
            $this->CycleDay13->PlaceHolder = RemoveHtml($this->CycleDay13->caption());

            // StimulationDay1
            $this->StimulationDay1->EditAttrs["class"] = "form-control";
            $this->StimulationDay1->EditCustomAttributes = "";
            if (!$this->StimulationDay1->Raw) {
                $this->StimulationDay1->CurrentValue = HtmlDecode($this->StimulationDay1->CurrentValue);
            }
            $this->StimulationDay1->EditValue = HtmlEncode($this->StimulationDay1->CurrentValue);
            $this->StimulationDay1->PlaceHolder = RemoveHtml($this->StimulationDay1->caption());

            // StimulationDay2
            $this->StimulationDay2->EditAttrs["class"] = "form-control";
            $this->StimulationDay2->EditCustomAttributes = "";
            if (!$this->StimulationDay2->Raw) {
                $this->StimulationDay2->CurrentValue = HtmlDecode($this->StimulationDay2->CurrentValue);
            }
            $this->StimulationDay2->EditValue = HtmlEncode($this->StimulationDay2->CurrentValue);
            $this->StimulationDay2->PlaceHolder = RemoveHtml($this->StimulationDay2->caption());

            // StimulationDay3
            $this->StimulationDay3->EditAttrs["class"] = "form-control";
            $this->StimulationDay3->EditCustomAttributes = "";
            if (!$this->StimulationDay3->Raw) {
                $this->StimulationDay3->CurrentValue = HtmlDecode($this->StimulationDay3->CurrentValue);
            }
            $this->StimulationDay3->EditValue = HtmlEncode($this->StimulationDay3->CurrentValue);
            $this->StimulationDay3->PlaceHolder = RemoveHtml($this->StimulationDay3->caption());

            // StimulationDay4
            $this->StimulationDay4->EditAttrs["class"] = "form-control";
            $this->StimulationDay4->EditCustomAttributes = "";
            if (!$this->StimulationDay4->Raw) {
                $this->StimulationDay4->CurrentValue = HtmlDecode($this->StimulationDay4->CurrentValue);
            }
            $this->StimulationDay4->EditValue = HtmlEncode($this->StimulationDay4->CurrentValue);
            $this->StimulationDay4->PlaceHolder = RemoveHtml($this->StimulationDay4->caption());

            // StimulationDay5
            $this->StimulationDay5->EditAttrs["class"] = "form-control";
            $this->StimulationDay5->EditCustomAttributes = "";
            if (!$this->StimulationDay5->Raw) {
                $this->StimulationDay5->CurrentValue = HtmlDecode($this->StimulationDay5->CurrentValue);
            }
            $this->StimulationDay5->EditValue = HtmlEncode($this->StimulationDay5->CurrentValue);
            $this->StimulationDay5->PlaceHolder = RemoveHtml($this->StimulationDay5->caption());

            // StimulationDay6
            $this->StimulationDay6->EditAttrs["class"] = "form-control";
            $this->StimulationDay6->EditCustomAttributes = "";
            if (!$this->StimulationDay6->Raw) {
                $this->StimulationDay6->CurrentValue = HtmlDecode($this->StimulationDay6->CurrentValue);
            }
            $this->StimulationDay6->EditValue = HtmlEncode($this->StimulationDay6->CurrentValue);
            $this->StimulationDay6->PlaceHolder = RemoveHtml($this->StimulationDay6->caption());

            // StimulationDay7
            $this->StimulationDay7->EditAttrs["class"] = "form-control";
            $this->StimulationDay7->EditCustomAttributes = "";
            if (!$this->StimulationDay7->Raw) {
                $this->StimulationDay7->CurrentValue = HtmlDecode($this->StimulationDay7->CurrentValue);
            }
            $this->StimulationDay7->EditValue = HtmlEncode($this->StimulationDay7->CurrentValue);
            $this->StimulationDay7->PlaceHolder = RemoveHtml($this->StimulationDay7->caption());

            // StimulationDay8
            $this->StimulationDay8->EditAttrs["class"] = "form-control";
            $this->StimulationDay8->EditCustomAttributes = "";
            if (!$this->StimulationDay8->Raw) {
                $this->StimulationDay8->CurrentValue = HtmlDecode($this->StimulationDay8->CurrentValue);
            }
            $this->StimulationDay8->EditValue = HtmlEncode($this->StimulationDay8->CurrentValue);
            $this->StimulationDay8->PlaceHolder = RemoveHtml($this->StimulationDay8->caption());

            // StimulationDay9
            $this->StimulationDay9->EditAttrs["class"] = "form-control";
            $this->StimulationDay9->EditCustomAttributes = "";
            if (!$this->StimulationDay9->Raw) {
                $this->StimulationDay9->CurrentValue = HtmlDecode($this->StimulationDay9->CurrentValue);
            }
            $this->StimulationDay9->EditValue = HtmlEncode($this->StimulationDay9->CurrentValue);
            $this->StimulationDay9->PlaceHolder = RemoveHtml($this->StimulationDay9->caption());

            // StimulationDay10
            $this->StimulationDay10->EditAttrs["class"] = "form-control";
            $this->StimulationDay10->EditCustomAttributes = "";
            if (!$this->StimulationDay10->Raw) {
                $this->StimulationDay10->CurrentValue = HtmlDecode($this->StimulationDay10->CurrentValue);
            }
            $this->StimulationDay10->EditValue = HtmlEncode($this->StimulationDay10->CurrentValue);
            $this->StimulationDay10->PlaceHolder = RemoveHtml($this->StimulationDay10->caption());

            // StimulationDay11
            $this->StimulationDay11->EditAttrs["class"] = "form-control";
            $this->StimulationDay11->EditCustomAttributes = "";
            if (!$this->StimulationDay11->Raw) {
                $this->StimulationDay11->CurrentValue = HtmlDecode($this->StimulationDay11->CurrentValue);
            }
            $this->StimulationDay11->EditValue = HtmlEncode($this->StimulationDay11->CurrentValue);
            $this->StimulationDay11->PlaceHolder = RemoveHtml($this->StimulationDay11->caption());

            // StimulationDay12
            $this->StimulationDay12->EditAttrs["class"] = "form-control";
            $this->StimulationDay12->EditCustomAttributes = "";
            if (!$this->StimulationDay12->Raw) {
                $this->StimulationDay12->CurrentValue = HtmlDecode($this->StimulationDay12->CurrentValue);
            }
            $this->StimulationDay12->EditValue = HtmlEncode($this->StimulationDay12->CurrentValue);
            $this->StimulationDay12->PlaceHolder = RemoveHtml($this->StimulationDay12->caption());

            // StimulationDay13
            $this->StimulationDay13->EditAttrs["class"] = "form-control";
            $this->StimulationDay13->EditCustomAttributes = "";
            if (!$this->StimulationDay13->Raw) {
                $this->StimulationDay13->CurrentValue = HtmlDecode($this->StimulationDay13->CurrentValue);
            }
            $this->StimulationDay13->EditValue = HtmlEncode($this->StimulationDay13->CurrentValue);
            $this->StimulationDay13->PlaceHolder = RemoveHtml($this->StimulationDay13->caption());

            // Tablet1
            $this->Tablet1->EditAttrs["class"] = "form-control";
            $this->Tablet1->EditCustomAttributes = "";
            if (!$this->Tablet1->Raw) {
                $this->Tablet1->CurrentValue = HtmlDecode($this->Tablet1->CurrentValue);
            }
            $this->Tablet1->EditValue = HtmlEncode($this->Tablet1->CurrentValue);
            $this->Tablet1->PlaceHolder = RemoveHtml($this->Tablet1->caption());

            // Tablet2
            $this->Tablet2->EditAttrs["class"] = "form-control";
            $this->Tablet2->EditCustomAttributes = "";
            if (!$this->Tablet2->Raw) {
                $this->Tablet2->CurrentValue = HtmlDecode($this->Tablet2->CurrentValue);
            }
            $this->Tablet2->EditValue = HtmlEncode($this->Tablet2->CurrentValue);
            $this->Tablet2->PlaceHolder = RemoveHtml($this->Tablet2->caption());

            // Tablet3
            $this->Tablet3->EditAttrs["class"] = "form-control";
            $this->Tablet3->EditCustomAttributes = "";
            if (!$this->Tablet3->Raw) {
                $this->Tablet3->CurrentValue = HtmlDecode($this->Tablet3->CurrentValue);
            }
            $this->Tablet3->EditValue = HtmlEncode($this->Tablet3->CurrentValue);
            $this->Tablet3->PlaceHolder = RemoveHtml($this->Tablet3->caption());

            // Tablet4
            $this->Tablet4->EditAttrs["class"] = "form-control";
            $this->Tablet4->EditCustomAttributes = "";
            if (!$this->Tablet4->Raw) {
                $this->Tablet4->CurrentValue = HtmlDecode($this->Tablet4->CurrentValue);
            }
            $this->Tablet4->EditValue = HtmlEncode($this->Tablet4->CurrentValue);
            $this->Tablet4->PlaceHolder = RemoveHtml($this->Tablet4->caption());

            // Tablet5
            $this->Tablet5->EditAttrs["class"] = "form-control";
            $this->Tablet5->EditCustomAttributes = "";
            if (!$this->Tablet5->Raw) {
                $this->Tablet5->CurrentValue = HtmlDecode($this->Tablet5->CurrentValue);
            }
            $this->Tablet5->EditValue = HtmlEncode($this->Tablet5->CurrentValue);
            $this->Tablet5->PlaceHolder = RemoveHtml($this->Tablet5->caption());

            // Tablet6
            $this->Tablet6->EditAttrs["class"] = "form-control";
            $this->Tablet6->EditCustomAttributes = "";
            if (!$this->Tablet6->Raw) {
                $this->Tablet6->CurrentValue = HtmlDecode($this->Tablet6->CurrentValue);
            }
            $this->Tablet6->EditValue = HtmlEncode($this->Tablet6->CurrentValue);
            $this->Tablet6->PlaceHolder = RemoveHtml($this->Tablet6->caption());

            // Tablet7
            $this->Tablet7->EditAttrs["class"] = "form-control";
            $this->Tablet7->EditCustomAttributes = "";
            if (!$this->Tablet7->Raw) {
                $this->Tablet7->CurrentValue = HtmlDecode($this->Tablet7->CurrentValue);
            }
            $this->Tablet7->EditValue = HtmlEncode($this->Tablet7->CurrentValue);
            $this->Tablet7->PlaceHolder = RemoveHtml($this->Tablet7->caption());

            // Tablet8
            $this->Tablet8->EditAttrs["class"] = "form-control";
            $this->Tablet8->EditCustomAttributes = "";
            if (!$this->Tablet8->Raw) {
                $this->Tablet8->CurrentValue = HtmlDecode($this->Tablet8->CurrentValue);
            }
            $this->Tablet8->EditValue = HtmlEncode($this->Tablet8->CurrentValue);
            $this->Tablet8->PlaceHolder = RemoveHtml($this->Tablet8->caption());

            // Tablet9
            $this->Tablet9->EditAttrs["class"] = "form-control";
            $this->Tablet9->EditCustomAttributes = "";
            if (!$this->Tablet9->Raw) {
                $this->Tablet9->CurrentValue = HtmlDecode($this->Tablet9->CurrentValue);
            }
            $this->Tablet9->EditValue = HtmlEncode($this->Tablet9->CurrentValue);
            $this->Tablet9->PlaceHolder = RemoveHtml($this->Tablet9->caption());

            // Tablet10
            $this->Tablet10->EditAttrs["class"] = "form-control";
            $this->Tablet10->EditCustomAttributes = "";
            if (!$this->Tablet10->Raw) {
                $this->Tablet10->CurrentValue = HtmlDecode($this->Tablet10->CurrentValue);
            }
            $this->Tablet10->EditValue = HtmlEncode($this->Tablet10->CurrentValue);
            $this->Tablet10->PlaceHolder = RemoveHtml($this->Tablet10->caption());

            // Tablet11
            $this->Tablet11->EditAttrs["class"] = "form-control";
            $this->Tablet11->EditCustomAttributes = "";
            if (!$this->Tablet11->Raw) {
                $this->Tablet11->CurrentValue = HtmlDecode($this->Tablet11->CurrentValue);
            }
            $this->Tablet11->EditValue = HtmlEncode($this->Tablet11->CurrentValue);
            $this->Tablet11->PlaceHolder = RemoveHtml($this->Tablet11->caption());

            // Tablet12
            $this->Tablet12->EditAttrs["class"] = "form-control";
            $this->Tablet12->EditCustomAttributes = "";
            if (!$this->Tablet12->Raw) {
                $this->Tablet12->CurrentValue = HtmlDecode($this->Tablet12->CurrentValue);
            }
            $this->Tablet12->EditValue = HtmlEncode($this->Tablet12->CurrentValue);
            $this->Tablet12->PlaceHolder = RemoveHtml($this->Tablet12->caption());

            // Tablet13
            $this->Tablet13->EditAttrs["class"] = "form-control";
            $this->Tablet13->EditCustomAttributes = "";
            if (!$this->Tablet13->Raw) {
                $this->Tablet13->CurrentValue = HtmlDecode($this->Tablet13->CurrentValue);
            }
            $this->Tablet13->EditValue = HtmlEncode($this->Tablet13->CurrentValue);
            $this->Tablet13->PlaceHolder = RemoveHtml($this->Tablet13->caption());

            // RFSH1
            $this->RFSH1->EditAttrs["class"] = "form-control";
            $this->RFSH1->EditCustomAttributes = "";
            if (!$this->RFSH1->Raw) {
                $this->RFSH1->CurrentValue = HtmlDecode($this->RFSH1->CurrentValue);
            }
            $this->RFSH1->EditValue = HtmlEncode($this->RFSH1->CurrentValue);
            $this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

            // RFSH2
            $this->RFSH2->EditAttrs["class"] = "form-control";
            $this->RFSH2->EditCustomAttributes = "";
            if (!$this->RFSH2->Raw) {
                $this->RFSH2->CurrentValue = HtmlDecode($this->RFSH2->CurrentValue);
            }
            $this->RFSH2->EditValue = HtmlEncode($this->RFSH2->CurrentValue);
            $this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

            // RFSH3
            $this->RFSH3->EditAttrs["class"] = "form-control";
            $this->RFSH3->EditCustomAttributes = "";
            if (!$this->RFSH3->Raw) {
                $this->RFSH3->CurrentValue = HtmlDecode($this->RFSH3->CurrentValue);
            }
            $this->RFSH3->EditValue = HtmlEncode($this->RFSH3->CurrentValue);
            $this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

            // RFSH4
            $this->RFSH4->EditAttrs["class"] = "form-control";
            $this->RFSH4->EditCustomAttributes = "";
            if (!$this->RFSH4->Raw) {
                $this->RFSH4->CurrentValue = HtmlDecode($this->RFSH4->CurrentValue);
            }
            $this->RFSH4->EditValue = HtmlEncode($this->RFSH4->CurrentValue);
            $this->RFSH4->PlaceHolder = RemoveHtml($this->RFSH4->caption());

            // RFSH5
            $this->RFSH5->EditAttrs["class"] = "form-control";
            $this->RFSH5->EditCustomAttributes = "";
            if (!$this->RFSH5->Raw) {
                $this->RFSH5->CurrentValue = HtmlDecode($this->RFSH5->CurrentValue);
            }
            $this->RFSH5->EditValue = HtmlEncode($this->RFSH5->CurrentValue);
            $this->RFSH5->PlaceHolder = RemoveHtml($this->RFSH5->caption());

            // RFSH6
            $this->RFSH6->EditAttrs["class"] = "form-control";
            $this->RFSH6->EditCustomAttributes = "";
            if (!$this->RFSH6->Raw) {
                $this->RFSH6->CurrentValue = HtmlDecode($this->RFSH6->CurrentValue);
            }
            $this->RFSH6->EditValue = HtmlEncode($this->RFSH6->CurrentValue);
            $this->RFSH6->PlaceHolder = RemoveHtml($this->RFSH6->caption());

            // RFSH7
            $this->RFSH7->EditAttrs["class"] = "form-control";
            $this->RFSH7->EditCustomAttributes = "";
            if (!$this->RFSH7->Raw) {
                $this->RFSH7->CurrentValue = HtmlDecode($this->RFSH7->CurrentValue);
            }
            $this->RFSH7->EditValue = HtmlEncode($this->RFSH7->CurrentValue);
            $this->RFSH7->PlaceHolder = RemoveHtml($this->RFSH7->caption());

            // RFSH8
            $this->RFSH8->EditAttrs["class"] = "form-control";
            $this->RFSH8->EditCustomAttributes = "";
            if (!$this->RFSH8->Raw) {
                $this->RFSH8->CurrentValue = HtmlDecode($this->RFSH8->CurrentValue);
            }
            $this->RFSH8->EditValue = HtmlEncode($this->RFSH8->CurrentValue);
            $this->RFSH8->PlaceHolder = RemoveHtml($this->RFSH8->caption());

            // RFSH9
            $this->RFSH9->EditAttrs["class"] = "form-control";
            $this->RFSH9->EditCustomAttributes = "";
            if (!$this->RFSH9->Raw) {
                $this->RFSH9->CurrentValue = HtmlDecode($this->RFSH9->CurrentValue);
            }
            $this->RFSH9->EditValue = HtmlEncode($this->RFSH9->CurrentValue);
            $this->RFSH9->PlaceHolder = RemoveHtml($this->RFSH9->caption());

            // RFSH10
            $this->RFSH10->EditAttrs["class"] = "form-control";
            $this->RFSH10->EditCustomAttributes = "";
            if (!$this->RFSH10->Raw) {
                $this->RFSH10->CurrentValue = HtmlDecode($this->RFSH10->CurrentValue);
            }
            $this->RFSH10->EditValue = HtmlEncode($this->RFSH10->CurrentValue);
            $this->RFSH10->PlaceHolder = RemoveHtml($this->RFSH10->caption());

            // RFSH11
            $this->RFSH11->EditAttrs["class"] = "form-control";
            $this->RFSH11->EditCustomAttributes = "";
            if (!$this->RFSH11->Raw) {
                $this->RFSH11->CurrentValue = HtmlDecode($this->RFSH11->CurrentValue);
            }
            $this->RFSH11->EditValue = HtmlEncode($this->RFSH11->CurrentValue);
            $this->RFSH11->PlaceHolder = RemoveHtml($this->RFSH11->caption());

            // RFSH12
            $this->RFSH12->EditAttrs["class"] = "form-control";
            $this->RFSH12->EditCustomAttributes = "";
            if (!$this->RFSH12->Raw) {
                $this->RFSH12->CurrentValue = HtmlDecode($this->RFSH12->CurrentValue);
            }
            $this->RFSH12->EditValue = HtmlEncode($this->RFSH12->CurrentValue);
            $this->RFSH12->PlaceHolder = RemoveHtml($this->RFSH12->caption());

            // RFSH13
            $this->RFSH13->EditAttrs["class"] = "form-control";
            $this->RFSH13->EditCustomAttributes = "";
            if (!$this->RFSH13->Raw) {
                $this->RFSH13->CurrentValue = HtmlDecode($this->RFSH13->CurrentValue);
            }
            $this->RFSH13->EditValue = HtmlEncode($this->RFSH13->CurrentValue);
            $this->RFSH13->PlaceHolder = RemoveHtml($this->RFSH13->caption());

            // HMG1
            $this->HMG1->EditAttrs["class"] = "form-control";
            $this->HMG1->EditCustomAttributes = "";
            if (!$this->HMG1->Raw) {
                $this->HMG1->CurrentValue = HtmlDecode($this->HMG1->CurrentValue);
            }
            $this->HMG1->EditValue = HtmlEncode($this->HMG1->CurrentValue);
            $this->HMG1->PlaceHolder = RemoveHtml($this->HMG1->caption());

            // HMG2
            $this->HMG2->EditAttrs["class"] = "form-control";
            $this->HMG2->EditCustomAttributes = "";
            if (!$this->HMG2->Raw) {
                $this->HMG2->CurrentValue = HtmlDecode($this->HMG2->CurrentValue);
            }
            $this->HMG2->EditValue = HtmlEncode($this->HMG2->CurrentValue);
            $this->HMG2->PlaceHolder = RemoveHtml($this->HMG2->caption());

            // HMG3
            $this->HMG3->EditAttrs["class"] = "form-control";
            $this->HMG3->EditCustomAttributes = "";
            if (!$this->HMG3->Raw) {
                $this->HMG3->CurrentValue = HtmlDecode($this->HMG3->CurrentValue);
            }
            $this->HMG3->EditValue = HtmlEncode($this->HMG3->CurrentValue);
            $this->HMG3->PlaceHolder = RemoveHtml($this->HMG3->caption());

            // HMG4
            $this->HMG4->EditAttrs["class"] = "form-control";
            $this->HMG4->EditCustomAttributes = "";
            if (!$this->HMG4->Raw) {
                $this->HMG4->CurrentValue = HtmlDecode($this->HMG4->CurrentValue);
            }
            $this->HMG4->EditValue = HtmlEncode($this->HMG4->CurrentValue);
            $this->HMG4->PlaceHolder = RemoveHtml($this->HMG4->caption());

            // HMG5
            $this->HMG5->EditAttrs["class"] = "form-control";
            $this->HMG5->EditCustomAttributes = "";
            if (!$this->HMG5->Raw) {
                $this->HMG5->CurrentValue = HtmlDecode($this->HMG5->CurrentValue);
            }
            $this->HMG5->EditValue = HtmlEncode($this->HMG5->CurrentValue);
            $this->HMG5->PlaceHolder = RemoveHtml($this->HMG5->caption());

            // HMG6
            $this->HMG6->EditAttrs["class"] = "form-control";
            $this->HMG6->EditCustomAttributes = "";
            if (!$this->HMG6->Raw) {
                $this->HMG6->CurrentValue = HtmlDecode($this->HMG6->CurrentValue);
            }
            $this->HMG6->EditValue = HtmlEncode($this->HMG6->CurrentValue);
            $this->HMG6->PlaceHolder = RemoveHtml($this->HMG6->caption());

            // HMG7
            $this->HMG7->EditAttrs["class"] = "form-control";
            $this->HMG7->EditCustomAttributes = "";
            if (!$this->HMG7->Raw) {
                $this->HMG7->CurrentValue = HtmlDecode($this->HMG7->CurrentValue);
            }
            $this->HMG7->EditValue = HtmlEncode($this->HMG7->CurrentValue);
            $this->HMG7->PlaceHolder = RemoveHtml($this->HMG7->caption());

            // HMG8
            $this->HMG8->EditAttrs["class"] = "form-control";
            $this->HMG8->EditCustomAttributes = "";
            if (!$this->HMG8->Raw) {
                $this->HMG8->CurrentValue = HtmlDecode($this->HMG8->CurrentValue);
            }
            $this->HMG8->EditValue = HtmlEncode($this->HMG8->CurrentValue);
            $this->HMG8->PlaceHolder = RemoveHtml($this->HMG8->caption());

            // HMG9
            $this->HMG9->EditAttrs["class"] = "form-control";
            $this->HMG9->EditCustomAttributes = "";
            if (!$this->HMG9->Raw) {
                $this->HMG9->CurrentValue = HtmlDecode($this->HMG9->CurrentValue);
            }
            $this->HMG9->EditValue = HtmlEncode($this->HMG9->CurrentValue);
            $this->HMG9->PlaceHolder = RemoveHtml($this->HMG9->caption());

            // HMG10
            $this->HMG10->EditAttrs["class"] = "form-control";
            $this->HMG10->EditCustomAttributes = "";
            if (!$this->HMG10->Raw) {
                $this->HMG10->CurrentValue = HtmlDecode($this->HMG10->CurrentValue);
            }
            $this->HMG10->EditValue = HtmlEncode($this->HMG10->CurrentValue);
            $this->HMG10->PlaceHolder = RemoveHtml($this->HMG10->caption());

            // HMG11
            $this->HMG11->EditAttrs["class"] = "form-control";
            $this->HMG11->EditCustomAttributes = "";
            if (!$this->HMG11->Raw) {
                $this->HMG11->CurrentValue = HtmlDecode($this->HMG11->CurrentValue);
            }
            $this->HMG11->EditValue = HtmlEncode($this->HMG11->CurrentValue);
            $this->HMG11->PlaceHolder = RemoveHtml($this->HMG11->caption());

            // HMG12
            $this->HMG12->EditAttrs["class"] = "form-control";
            $this->HMG12->EditCustomAttributes = "";
            if (!$this->HMG12->Raw) {
                $this->HMG12->CurrentValue = HtmlDecode($this->HMG12->CurrentValue);
            }
            $this->HMG12->EditValue = HtmlEncode($this->HMG12->CurrentValue);
            $this->HMG12->PlaceHolder = RemoveHtml($this->HMG12->caption());

            // HMG13
            $this->HMG13->EditAttrs["class"] = "form-control";
            $this->HMG13->EditCustomAttributes = "";
            if (!$this->HMG13->Raw) {
                $this->HMG13->CurrentValue = HtmlDecode($this->HMG13->CurrentValue);
            }
            $this->HMG13->EditValue = HtmlEncode($this->HMG13->CurrentValue);
            $this->HMG13->PlaceHolder = RemoveHtml($this->HMG13->caption());

            // GnRH1
            $this->GnRH1->EditAttrs["class"] = "form-control";
            $this->GnRH1->EditCustomAttributes = "";
            if (!$this->GnRH1->Raw) {
                $this->GnRH1->CurrentValue = HtmlDecode($this->GnRH1->CurrentValue);
            }
            $this->GnRH1->EditValue = HtmlEncode($this->GnRH1->CurrentValue);
            $this->GnRH1->PlaceHolder = RemoveHtml($this->GnRH1->caption());

            // GnRH2
            $this->GnRH2->EditAttrs["class"] = "form-control";
            $this->GnRH2->EditCustomAttributes = "";
            if (!$this->GnRH2->Raw) {
                $this->GnRH2->CurrentValue = HtmlDecode($this->GnRH2->CurrentValue);
            }
            $this->GnRH2->EditValue = HtmlEncode($this->GnRH2->CurrentValue);
            $this->GnRH2->PlaceHolder = RemoveHtml($this->GnRH2->caption());

            // GnRH3
            $this->GnRH3->EditAttrs["class"] = "form-control";
            $this->GnRH3->EditCustomAttributes = "";
            if (!$this->GnRH3->Raw) {
                $this->GnRH3->CurrentValue = HtmlDecode($this->GnRH3->CurrentValue);
            }
            $this->GnRH3->EditValue = HtmlEncode($this->GnRH3->CurrentValue);
            $this->GnRH3->PlaceHolder = RemoveHtml($this->GnRH3->caption());

            // GnRH4
            $this->GnRH4->EditAttrs["class"] = "form-control";
            $this->GnRH4->EditCustomAttributes = "";
            if (!$this->GnRH4->Raw) {
                $this->GnRH4->CurrentValue = HtmlDecode($this->GnRH4->CurrentValue);
            }
            $this->GnRH4->EditValue = HtmlEncode($this->GnRH4->CurrentValue);
            $this->GnRH4->PlaceHolder = RemoveHtml($this->GnRH4->caption());

            // GnRH5
            $this->GnRH5->EditAttrs["class"] = "form-control";
            $this->GnRH5->EditCustomAttributes = "";
            if (!$this->GnRH5->Raw) {
                $this->GnRH5->CurrentValue = HtmlDecode($this->GnRH5->CurrentValue);
            }
            $this->GnRH5->EditValue = HtmlEncode($this->GnRH5->CurrentValue);
            $this->GnRH5->PlaceHolder = RemoveHtml($this->GnRH5->caption());

            // GnRH6
            $this->GnRH6->EditAttrs["class"] = "form-control";
            $this->GnRH6->EditCustomAttributes = "";
            if (!$this->GnRH6->Raw) {
                $this->GnRH6->CurrentValue = HtmlDecode($this->GnRH6->CurrentValue);
            }
            $this->GnRH6->EditValue = HtmlEncode($this->GnRH6->CurrentValue);
            $this->GnRH6->PlaceHolder = RemoveHtml($this->GnRH6->caption());

            // GnRH7
            $this->GnRH7->EditAttrs["class"] = "form-control";
            $this->GnRH7->EditCustomAttributes = "";
            if (!$this->GnRH7->Raw) {
                $this->GnRH7->CurrentValue = HtmlDecode($this->GnRH7->CurrentValue);
            }
            $this->GnRH7->EditValue = HtmlEncode($this->GnRH7->CurrentValue);
            $this->GnRH7->PlaceHolder = RemoveHtml($this->GnRH7->caption());

            // GnRH8
            $this->GnRH8->EditAttrs["class"] = "form-control";
            $this->GnRH8->EditCustomAttributes = "";
            if (!$this->GnRH8->Raw) {
                $this->GnRH8->CurrentValue = HtmlDecode($this->GnRH8->CurrentValue);
            }
            $this->GnRH8->EditValue = HtmlEncode($this->GnRH8->CurrentValue);
            $this->GnRH8->PlaceHolder = RemoveHtml($this->GnRH8->caption());

            // GnRH9
            $this->GnRH9->EditAttrs["class"] = "form-control";
            $this->GnRH9->EditCustomAttributes = "";
            if (!$this->GnRH9->Raw) {
                $this->GnRH9->CurrentValue = HtmlDecode($this->GnRH9->CurrentValue);
            }
            $this->GnRH9->EditValue = HtmlEncode($this->GnRH9->CurrentValue);
            $this->GnRH9->PlaceHolder = RemoveHtml($this->GnRH9->caption());

            // GnRH10
            $this->GnRH10->EditAttrs["class"] = "form-control";
            $this->GnRH10->EditCustomAttributes = "";
            if (!$this->GnRH10->Raw) {
                $this->GnRH10->CurrentValue = HtmlDecode($this->GnRH10->CurrentValue);
            }
            $this->GnRH10->EditValue = HtmlEncode($this->GnRH10->CurrentValue);
            $this->GnRH10->PlaceHolder = RemoveHtml($this->GnRH10->caption());

            // GnRH11
            $this->GnRH11->EditAttrs["class"] = "form-control";
            $this->GnRH11->EditCustomAttributes = "";
            if (!$this->GnRH11->Raw) {
                $this->GnRH11->CurrentValue = HtmlDecode($this->GnRH11->CurrentValue);
            }
            $this->GnRH11->EditValue = HtmlEncode($this->GnRH11->CurrentValue);
            $this->GnRH11->PlaceHolder = RemoveHtml($this->GnRH11->caption());

            // GnRH12
            $this->GnRH12->EditAttrs["class"] = "form-control";
            $this->GnRH12->EditCustomAttributes = "";
            if (!$this->GnRH12->Raw) {
                $this->GnRH12->CurrentValue = HtmlDecode($this->GnRH12->CurrentValue);
            }
            $this->GnRH12->EditValue = HtmlEncode($this->GnRH12->CurrentValue);
            $this->GnRH12->PlaceHolder = RemoveHtml($this->GnRH12->caption());

            // GnRH13
            $this->GnRH13->EditAttrs["class"] = "form-control";
            $this->GnRH13->EditCustomAttributes = "";
            if (!$this->GnRH13->Raw) {
                $this->GnRH13->CurrentValue = HtmlDecode($this->GnRH13->CurrentValue);
            }
            $this->GnRH13->EditValue = HtmlEncode($this->GnRH13->CurrentValue);
            $this->GnRH13->PlaceHolder = RemoveHtml($this->GnRH13->caption());

            // E21
            $this->E21->EditAttrs["class"] = "form-control";
            $this->E21->EditCustomAttributes = "";
            if (!$this->E21->Raw) {
                $this->E21->CurrentValue = HtmlDecode($this->E21->CurrentValue);
            }
            $this->E21->EditValue = HtmlEncode($this->E21->CurrentValue);
            $this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

            // E22
            $this->E22->EditAttrs["class"] = "form-control";
            $this->E22->EditCustomAttributes = "";
            if (!$this->E22->Raw) {
                $this->E22->CurrentValue = HtmlDecode($this->E22->CurrentValue);
            }
            $this->E22->EditValue = HtmlEncode($this->E22->CurrentValue);
            $this->E22->PlaceHolder = RemoveHtml($this->E22->caption());

            // E23
            $this->E23->EditAttrs["class"] = "form-control";
            $this->E23->EditCustomAttributes = "";
            if (!$this->E23->Raw) {
                $this->E23->CurrentValue = HtmlDecode($this->E23->CurrentValue);
            }
            $this->E23->EditValue = HtmlEncode($this->E23->CurrentValue);
            $this->E23->PlaceHolder = RemoveHtml($this->E23->caption());

            // E24
            $this->E24->EditAttrs["class"] = "form-control";
            $this->E24->EditCustomAttributes = "";
            if (!$this->E24->Raw) {
                $this->E24->CurrentValue = HtmlDecode($this->E24->CurrentValue);
            }
            $this->E24->EditValue = HtmlEncode($this->E24->CurrentValue);
            $this->E24->PlaceHolder = RemoveHtml($this->E24->caption());

            // E25
            $this->E25->EditAttrs["class"] = "form-control";
            $this->E25->EditCustomAttributes = "";
            if (!$this->E25->Raw) {
                $this->E25->CurrentValue = HtmlDecode($this->E25->CurrentValue);
            }
            $this->E25->EditValue = HtmlEncode($this->E25->CurrentValue);
            $this->E25->PlaceHolder = RemoveHtml($this->E25->caption());

            // E26
            $this->E26->EditAttrs["class"] = "form-control";
            $this->E26->EditCustomAttributes = "";
            if (!$this->E26->Raw) {
                $this->E26->CurrentValue = HtmlDecode($this->E26->CurrentValue);
            }
            $this->E26->EditValue = HtmlEncode($this->E26->CurrentValue);
            $this->E26->PlaceHolder = RemoveHtml($this->E26->caption());

            // E27
            $this->E27->EditAttrs["class"] = "form-control";
            $this->E27->EditCustomAttributes = "";
            if (!$this->E27->Raw) {
                $this->E27->CurrentValue = HtmlDecode($this->E27->CurrentValue);
            }
            $this->E27->EditValue = HtmlEncode($this->E27->CurrentValue);
            $this->E27->PlaceHolder = RemoveHtml($this->E27->caption());

            // E28
            $this->E28->EditAttrs["class"] = "form-control";
            $this->E28->EditCustomAttributes = "";
            if (!$this->E28->Raw) {
                $this->E28->CurrentValue = HtmlDecode($this->E28->CurrentValue);
            }
            $this->E28->EditValue = HtmlEncode($this->E28->CurrentValue);
            $this->E28->PlaceHolder = RemoveHtml($this->E28->caption());

            // E29
            $this->E29->EditAttrs["class"] = "form-control";
            $this->E29->EditCustomAttributes = "";
            if (!$this->E29->Raw) {
                $this->E29->CurrentValue = HtmlDecode($this->E29->CurrentValue);
            }
            $this->E29->EditValue = HtmlEncode($this->E29->CurrentValue);
            $this->E29->PlaceHolder = RemoveHtml($this->E29->caption());

            // E210
            $this->E210->EditAttrs["class"] = "form-control";
            $this->E210->EditCustomAttributes = "";
            if (!$this->E210->Raw) {
                $this->E210->CurrentValue = HtmlDecode($this->E210->CurrentValue);
            }
            $this->E210->EditValue = HtmlEncode($this->E210->CurrentValue);
            $this->E210->PlaceHolder = RemoveHtml($this->E210->caption());

            // E211
            $this->E211->EditAttrs["class"] = "form-control";
            $this->E211->EditCustomAttributes = "";
            if (!$this->E211->Raw) {
                $this->E211->CurrentValue = HtmlDecode($this->E211->CurrentValue);
            }
            $this->E211->EditValue = HtmlEncode($this->E211->CurrentValue);
            $this->E211->PlaceHolder = RemoveHtml($this->E211->caption());

            // E212
            $this->E212->EditAttrs["class"] = "form-control";
            $this->E212->EditCustomAttributes = "";
            if (!$this->E212->Raw) {
                $this->E212->CurrentValue = HtmlDecode($this->E212->CurrentValue);
            }
            $this->E212->EditValue = HtmlEncode($this->E212->CurrentValue);
            $this->E212->PlaceHolder = RemoveHtml($this->E212->caption());

            // E213
            $this->E213->EditAttrs["class"] = "form-control";
            $this->E213->EditCustomAttributes = "";
            if (!$this->E213->Raw) {
                $this->E213->CurrentValue = HtmlDecode($this->E213->CurrentValue);
            }
            $this->E213->EditValue = HtmlEncode($this->E213->CurrentValue);
            $this->E213->PlaceHolder = RemoveHtml($this->E213->caption());

            // P41
            $this->P41->EditAttrs["class"] = "form-control";
            $this->P41->EditCustomAttributes = "";
            if (!$this->P41->Raw) {
                $this->P41->CurrentValue = HtmlDecode($this->P41->CurrentValue);
            }
            $this->P41->EditValue = HtmlEncode($this->P41->CurrentValue);
            $this->P41->PlaceHolder = RemoveHtml($this->P41->caption());

            // P42
            $this->P42->EditAttrs["class"] = "form-control";
            $this->P42->EditCustomAttributes = "";
            if (!$this->P42->Raw) {
                $this->P42->CurrentValue = HtmlDecode($this->P42->CurrentValue);
            }
            $this->P42->EditValue = HtmlEncode($this->P42->CurrentValue);
            $this->P42->PlaceHolder = RemoveHtml($this->P42->caption());

            // P43
            $this->P43->EditAttrs["class"] = "form-control";
            $this->P43->EditCustomAttributes = "";
            if (!$this->P43->Raw) {
                $this->P43->CurrentValue = HtmlDecode($this->P43->CurrentValue);
            }
            $this->P43->EditValue = HtmlEncode($this->P43->CurrentValue);
            $this->P43->PlaceHolder = RemoveHtml($this->P43->caption());

            // P44
            $this->P44->EditAttrs["class"] = "form-control";
            $this->P44->EditCustomAttributes = "";
            if (!$this->P44->Raw) {
                $this->P44->CurrentValue = HtmlDecode($this->P44->CurrentValue);
            }
            $this->P44->EditValue = HtmlEncode($this->P44->CurrentValue);
            $this->P44->PlaceHolder = RemoveHtml($this->P44->caption());

            // P45
            $this->P45->EditAttrs["class"] = "form-control";
            $this->P45->EditCustomAttributes = "";
            if (!$this->P45->Raw) {
                $this->P45->CurrentValue = HtmlDecode($this->P45->CurrentValue);
            }
            $this->P45->EditValue = HtmlEncode($this->P45->CurrentValue);
            $this->P45->PlaceHolder = RemoveHtml($this->P45->caption());

            // P46
            $this->P46->EditAttrs["class"] = "form-control";
            $this->P46->EditCustomAttributes = "";
            if (!$this->P46->Raw) {
                $this->P46->CurrentValue = HtmlDecode($this->P46->CurrentValue);
            }
            $this->P46->EditValue = HtmlEncode($this->P46->CurrentValue);
            $this->P46->PlaceHolder = RemoveHtml($this->P46->caption());

            // P47
            $this->P47->EditAttrs["class"] = "form-control";
            $this->P47->EditCustomAttributes = "";
            if (!$this->P47->Raw) {
                $this->P47->CurrentValue = HtmlDecode($this->P47->CurrentValue);
            }
            $this->P47->EditValue = HtmlEncode($this->P47->CurrentValue);
            $this->P47->PlaceHolder = RemoveHtml($this->P47->caption());

            // P48
            $this->P48->EditAttrs["class"] = "form-control";
            $this->P48->EditCustomAttributes = "";
            if (!$this->P48->Raw) {
                $this->P48->CurrentValue = HtmlDecode($this->P48->CurrentValue);
            }
            $this->P48->EditValue = HtmlEncode($this->P48->CurrentValue);
            $this->P48->PlaceHolder = RemoveHtml($this->P48->caption());

            // P49
            $this->P49->EditAttrs["class"] = "form-control";
            $this->P49->EditCustomAttributes = "";
            if (!$this->P49->Raw) {
                $this->P49->CurrentValue = HtmlDecode($this->P49->CurrentValue);
            }
            $this->P49->EditValue = HtmlEncode($this->P49->CurrentValue);
            $this->P49->PlaceHolder = RemoveHtml($this->P49->caption());

            // P410
            $this->P410->EditAttrs["class"] = "form-control";
            $this->P410->EditCustomAttributes = "";
            if (!$this->P410->Raw) {
                $this->P410->CurrentValue = HtmlDecode($this->P410->CurrentValue);
            }
            $this->P410->EditValue = HtmlEncode($this->P410->CurrentValue);
            $this->P410->PlaceHolder = RemoveHtml($this->P410->caption());

            // P411
            $this->P411->EditAttrs["class"] = "form-control";
            $this->P411->EditCustomAttributes = "";
            if (!$this->P411->Raw) {
                $this->P411->CurrentValue = HtmlDecode($this->P411->CurrentValue);
            }
            $this->P411->EditValue = HtmlEncode($this->P411->CurrentValue);
            $this->P411->PlaceHolder = RemoveHtml($this->P411->caption());

            // P412
            $this->P412->EditAttrs["class"] = "form-control";
            $this->P412->EditCustomAttributes = "";
            if (!$this->P412->Raw) {
                $this->P412->CurrentValue = HtmlDecode($this->P412->CurrentValue);
            }
            $this->P412->EditValue = HtmlEncode($this->P412->CurrentValue);
            $this->P412->PlaceHolder = RemoveHtml($this->P412->caption());

            // P413
            $this->P413->EditAttrs["class"] = "form-control";
            $this->P413->EditCustomAttributes = "";
            if (!$this->P413->Raw) {
                $this->P413->CurrentValue = HtmlDecode($this->P413->CurrentValue);
            }
            $this->P413->EditValue = HtmlEncode($this->P413->CurrentValue);
            $this->P413->PlaceHolder = RemoveHtml($this->P413->caption());

            // USGRt1
            $this->USGRt1->EditAttrs["class"] = "form-control";
            $this->USGRt1->EditCustomAttributes = "";
            if (!$this->USGRt1->Raw) {
                $this->USGRt1->CurrentValue = HtmlDecode($this->USGRt1->CurrentValue);
            }
            $this->USGRt1->EditValue = HtmlEncode($this->USGRt1->CurrentValue);
            $this->USGRt1->PlaceHolder = RemoveHtml($this->USGRt1->caption());

            // USGRt2
            $this->USGRt2->EditAttrs["class"] = "form-control";
            $this->USGRt2->EditCustomAttributes = "";
            if (!$this->USGRt2->Raw) {
                $this->USGRt2->CurrentValue = HtmlDecode($this->USGRt2->CurrentValue);
            }
            $this->USGRt2->EditValue = HtmlEncode($this->USGRt2->CurrentValue);
            $this->USGRt2->PlaceHolder = RemoveHtml($this->USGRt2->caption());

            // USGRt3
            $this->USGRt3->EditAttrs["class"] = "form-control";
            $this->USGRt3->EditCustomAttributes = "";
            if (!$this->USGRt3->Raw) {
                $this->USGRt3->CurrentValue = HtmlDecode($this->USGRt3->CurrentValue);
            }
            $this->USGRt3->EditValue = HtmlEncode($this->USGRt3->CurrentValue);
            $this->USGRt3->PlaceHolder = RemoveHtml($this->USGRt3->caption());

            // USGRt4
            $this->USGRt4->EditAttrs["class"] = "form-control";
            $this->USGRt4->EditCustomAttributes = "";
            if (!$this->USGRt4->Raw) {
                $this->USGRt4->CurrentValue = HtmlDecode($this->USGRt4->CurrentValue);
            }
            $this->USGRt4->EditValue = HtmlEncode($this->USGRt4->CurrentValue);
            $this->USGRt4->PlaceHolder = RemoveHtml($this->USGRt4->caption());

            // USGRt5
            $this->USGRt5->EditAttrs["class"] = "form-control";
            $this->USGRt5->EditCustomAttributes = "";
            if (!$this->USGRt5->Raw) {
                $this->USGRt5->CurrentValue = HtmlDecode($this->USGRt5->CurrentValue);
            }
            $this->USGRt5->EditValue = HtmlEncode($this->USGRt5->CurrentValue);
            $this->USGRt5->PlaceHolder = RemoveHtml($this->USGRt5->caption());

            // USGRt6
            $this->USGRt6->EditAttrs["class"] = "form-control";
            $this->USGRt6->EditCustomAttributes = "";
            if (!$this->USGRt6->Raw) {
                $this->USGRt6->CurrentValue = HtmlDecode($this->USGRt6->CurrentValue);
            }
            $this->USGRt6->EditValue = HtmlEncode($this->USGRt6->CurrentValue);
            $this->USGRt6->PlaceHolder = RemoveHtml($this->USGRt6->caption());

            // USGRt7
            $this->USGRt7->EditAttrs["class"] = "form-control";
            $this->USGRt7->EditCustomAttributes = "";
            if (!$this->USGRt7->Raw) {
                $this->USGRt7->CurrentValue = HtmlDecode($this->USGRt7->CurrentValue);
            }
            $this->USGRt7->EditValue = HtmlEncode($this->USGRt7->CurrentValue);
            $this->USGRt7->PlaceHolder = RemoveHtml($this->USGRt7->caption());

            // USGRt8
            $this->USGRt8->EditAttrs["class"] = "form-control";
            $this->USGRt8->EditCustomAttributes = "";
            if (!$this->USGRt8->Raw) {
                $this->USGRt8->CurrentValue = HtmlDecode($this->USGRt8->CurrentValue);
            }
            $this->USGRt8->EditValue = HtmlEncode($this->USGRt8->CurrentValue);
            $this->USGRt8->PlaceHolder = RemoveHtml($this->USGRt8->caption());

            // USGRt9
            $this->USGRt9->EditAttrs["class"] = "form-control";
            $this->USGRt9->EditCustomAttributes = "";
            if (!$this->USGRt9->Raw) {
                $this->USGRt9->CurrentValue = HtmlDecode($this->USGRt9->CurrentValue);
            }
            $this->USGRt9->EditValue = HtmlEncode($this->USGRt9->CurrentValue);
            $this->USGRt9->PlaceHolder = RemoveHtml($this->USGRt9->caption());

            // USGRt10
            $this->USGRt10->EditAttrs["class"] = "form-control";
            $this->USGRt10->EditCustomAttributes = "";
            if (!$this->USGRt10->Raw) {
                $this->USGRt10->CurrentValue = HtmlDecode($this->USGRt10->CurrentValue);
            }
            $this->USGRt10->EditValue = HtmlEncode($this->USGRt10->CurrentValue);
            $this->USGRt10->PlaceHolder = RemoveHtml($this->USGRt10->caption());

            // USGRt11
            $this->USGRt11->EditAttrs["class"] = "form-control";
            $this->USGRt11->EditCustomAttributes = "";
            if (!$this->USGRt11->Raw) {
                $this->USGRt11->CurrentValue = HtmlDecode($this->USGRt11->CurrentValue);
            }
            $this->USGRt11->EditValue = HtmlEncode($this->USGRt11->CurrentValue);
            $this->USGRt11->PlaceHolder = RemoveHtml($this->USGRt11->caption());

            // USGRt12
            $this->USGRt12->EditAttrs["class"] = "form-control";
            $this->USGRt12->EditCustomAttributes = "";
            if (!$this->USGRt12->Raw) {
                $this->USGRt12->CurrentValue = HtmlDecode($this->USGRt12->CurrentValue);
            }
            $this->USGRt12->EditValue = HtmlEncode($this->USGRt12->CurrentValue);
            $this->USGRt12->PlaceHolder = RemoveHtml($this->USGRt12->caption());

            // USGRt13
            $this->USGRt13->EditAttrs["class"] = "form-control";
            $this->USGRt13->EditCustomAttributes = "";
            if (!$this->USGRt13->Raw) {
                $this->USGRt13->CurrentValue = HtmlDecode($this->USGRt13->CurrentValue);
            }
            $this->USGRt13->EditValue = HtmlEncode($this->USGRt13->CurrentValue);
            $this->USGRt13->PlaceHolder = RemoveHtml($this->USGRt13->caption());

            // USGLt1
            $this->USGLt1->EditAttrs["class"] = "form-control";
            $this->USGLt1->EditCustomAttributes = "";
            if (!$this->USGLt1->Raw) {
                $this->USGLt1->CurrentValue = HtmlDecode($this->USGLt1->CurrentValue);
            }
            $this->USGLt1->EditValue = HtmlEncode($this->USGLt1->CurrentValue);
            $this->USGLt1->PlaceHolder = RemoveHtml($this->USGLt1->caption());

            // USGLt2
            $this->USGLt2->EditAttrs["class"] = "form-control";
            $this->USGLt2->EditCustomAttributes = "";
            if (!$this->USGLt2->Raw) {
                $this->USGLt2->CurrentValue = HtmlDecode($this->USGLt2->CurrentValue);
            }
            $this->USGLt2->EditValue = HtmlEncode($this->USGLt2->CurrentValue);
            $this->USGLt2->PlaceHolder = RemoveHtml($this->USGLt2->caption());

            // USGLt3
            $this->USGLt3->EditAttrs["class"] = "form-control";
            $this->USGLt3->EditCustomAttributes = "";
            if (!$this->USGLt3->Raw) {
                $this->USGLt3->CurrentValue = HtmlDecode($this->USGLt3->CurrentValue);
            }
            $this->USGLt3->EditValue = HtmlEncode($this->USGLt3->CurrentValue);
            $this->USGLt3->PlaceHolder = RemoveHtml($this->USGLt3->caption());

            // USGLt4
            $this->USGLt4->EditAttrs["class"] = "form-control";
            $this->USGLt4->EditCustomAttributes = "";
            if (!$this->USGLt4->Raw) {
                $this->USGLt4->CurrentValue = HtmlDecode($this->USGLt4->CurrentValue);
            }
            $this->USGLt4->EditValue = HtmlEncode($this->USGLt4->CurrentValue);
            $this->USGLt4->PlaceHolder = RemoveHtml($this->USGLt4->caption());

            // USGLt5
            $this->USGLt5->EditAttrs["class"] = "form-control";
            $this->USGLt5->EditCustomAttributes = "";
            if (!$this->USGLt5->Raw) {
                $this->USGLt5->CurrentValue = HtmlDecode($this->USGLt5->CurrentValue);
            }
            $this->USGLt5->EditValue = HtmlEncode($this->USGLt5->CurrentValue);
            $this->USGLt5->PlaceHolder = RemoveHtml($this->USGLt5->caption());

            // USGLt6
            $this->USGLt6->EditAttrs["class"] = "form-control";
            $this->USGLt6->EditCustomAttributes = "";
            if (!$this->USGLt6->Raw) {
                $this->USGLt6->CurrentValue = HtmlDecode($this->USGLt6->CurrentValue);
            }
            $this->USGLt6->EditValue = HtmlEncode($this->USGLt6->CurrentValue);
            $this->USGLt6->PlaceHolder = RemoveHtml($this->USGLt6->caption());

            // USGLt7
            $this->USGLt7->EditAttrs["class"] = "form-control";
            $this->USGLt7->EditCustomAttributes = "";
            if (!$this->USGLt7->Raw) {
                $this->USGLt7->CurrentValue = HtmlDecode($this->USGLt7->CurrentValue);
            }
            $this->USGLt7->EditValue = HtmlEncode($this->USGLt7->CurrentValue);
            $this->USGLt7->PlaceHolder = RemoveHtml($this->USGLt7->caption());

            // USGLt8
            $this->USGLt8->EditAttrs["class"] = "form-control";
            $this->USGLt8->EditCustomAttributes = "";
            if (!$this->USGLt8->Raw) {
                $this->USGLt8->CurrentValue = HtmlDecode($this->USGLt8->CurrentValue);
            }
            $this->USGLt8->EditValue = HtmlEncode($this->USGLt8->CurrentValue);
            $this->USGLt8->PlaceHolder = RemoveHtml($this->USGLt8->caption());

            // USGLt9
            $this->USGLt9->EditAttrs["class"] = "form-control";
            $this->USGLt9->EditCustomAttributes = "";
            if (!$this->USGLt9->Raw) {
                $this->USGLt9->CurrentValue = HtmlDecode($this->USGLt9->CurrentValue);
            }
            $this->USGLt9->EditValue = HtmlEncode($this->USGLt9->CurrentValue);
            $this->USGLt9->PlaceHolder = RemoveHtml($this->USGLt9->caption());

            // USGLt10
            $this->USGLt10->EditAttrs["class"] = "form-control";
            $this->USGLt10->EditCustomAttributes = "";
            if (!$this->USGLt10->Raw) {
                $this->USGLt10->CurrentValue = HtmlDecode($this->USGLt10->CurrentValue);
            }
            $this->USGLt10->EditValue = HtmlEncode($this->USGLt10->CurrentValue);
            $this->USGLt10->PlaceHolder = RemoveHtml($this->USGLt10->caption());

            // USGLt11
            $this->USGLt11->EditAttrs["class"] = "form-control";
            $this->USGLt11->EditCustomAttributes = "";
            if (!$this->USGLt11->Raw) {
                $this->USGLt11->CurrentValue = HtmlDecode($this->USGLt11->CurrentValue);
            }
            $this->USGLt11->EditValue = HtmlEncode($this->USGLt11->CurrentValue);
            $this->USGLt11->PlaceHolder = RemoveHtml($this->USGLt11->caption());

            // USGLt12
            $this->USGLt12->EditAttrs["class"] = "form-control";
            $this->USGLt12->EditCustomAttributes = "";
            if (!$this->USGLt12->Raw) {
                $this->USGLt12->CurrentValue = HtmlDecode($this->USGLt12->CurrentValue);
            }
            $this->USGLt12->EditValue = HtmlEncode($this->USGLt12->CurrentValue);
            $this->USGLt12->PlaceHolder = RemoveHtml($this->USGLt12->caption());

            // USGLt13
            $this->USGLt13->EditAttrs["class"] = "form-control";
            $this->USGLt13->EditCustomAttributes = "";
            if (!$this->USGLt13->Raw) {
                $this->USGLt13->CurrentValue = HtmlDecode($this->USGLt13->CurrentValue);
            }
            $this->USGLt13->EditValue = HtmlEncode($this->USGLt13->CurrentValue);
            $this->USGLt13->PlaceHolder = RemoveHtml($this->USGLt13->caption());

            // EM1
            $this->EM1->EditAttrs["class"] = "form-control";
            $this->EM1->EditCustomAttributes = "";
            if (!$this->EM1->Raw) {
                $this->EM1->CurrentValue = HtmlDecode($this->EM1->CurrentValue);
            }
            $this->EM1->EditValue = HtmlEncode($this->EM1->CurrentValue);
            $this->EM1->PlaceHolder = RemoveHtml($this->EM1->caption());

            // EM2
            $this->EM2->EditAttrs["class"] = "form-control";
            $this->EM2->EditCustomAttributes = "";
            if (!$this->EM2->Raw) {
                $this->EM2->CurrentValue = HtmlDecode($this->EM2->CurrentValue);
            }
            $this->EM2->EditValue = HtmlEncode($this->EM2->CurrentValue);
            $this->EM2->PlaceHolder = RemoveHtml($this->EM2->caption());

            // EM3
            $this->EM3->EditAttrs["class"] = "form-control";
            $this->EM3->EditCustomAttributes = "";
            if (!$this->EM3->Raw) {
                $this->EM3->CurrentValue = HtmlDecode($this->EM3->CurrentValue);
            }
            $this->EM3->EditValue = HtmlEncode($this->EM3->CurrentValue);
            $this->EM3->PlaceHolder = RemoveHtml($this->EM3->caption());

            // EM4
            $this->EM4->EditAttrs["class"] = "form-control";
            $this->EM4->EditCustomAttributes = "";
            if (!$this->EM4->Raw) {
                $this->EM4->CurrentValue = HtmlDecode($this->EM4->CurrentValue);
            }
            $this->EM4->EditValue = HtmlEncode($this->EM4->CurrentValue);
            $this->EM4->PlaceHolder = RemoveHtml($this->EM4->caption());

            // EM5
            $this->EM5->EditAttrs["class"] = "form-control";
            $this->EM5->EditCustomAttributes = "";
            if (!$this->EM5->Raw) {
                $this->EM5->CurrentValue = HtmlDecode($this->EM5->CurrentValue);
            }
            $this->EM5->EditValue = HtmlEncode($this->EM5->CurrentValue);
            $this->EM5->PlaceHolder = RemoveHtml($this->EM5->caption());

            // EM6
            $this->EM6->EditAttrs["class"] = "form-control";
            $this->EM6->EditCustomAttributes = "";
            if (!$this->EM6->Raw) {
                $this->EM6->CurrentValue = HtmlDecode($this->EM6->CurrentValue);
            }
            $this->EM6->EditValue = HtmlEncode($this->EM6->CurrentValue);
            $this->EM6->PlaceHolder = RemoveHtml($this->EM6->caption());

            // EM7
            $this->EM7->EditAttrs["class"] = "form-control";
            $this->EM7->EditCustomAttributes = "";
            if (!$this->EM7->Raw) {
                $this->EM7->CurrentValue = HtmlDecode($this->EM7->CurrentValue);
            }
            $this->EM7->EditValue = HtmlEncode($this->EM7->CurrentValue);
            $this->EM7->PlaceHolder = RemoveHtml($this->EM7->caption());

            // EM8
            $this->EM8->EditAttrs["class"] = "form-control";
            $this->EM8->EditCustomAttributes = "";
            if (!$this->EM8->Raw) {
                $this->EM8->CurrentValue = HtmlDecode($this->EM8->CurrentValue);
            }
            $this->EM8->EditValue = HtmlEncode($this->EM8->CurrentValue);
            $this->EM8->PlaceHolder = RemoveHtml($this->EM8->caption());

            // EM9
            $this->EM9->EditAttrs["class"] = "form-control";
            $this->EM9->EditCustomAttributes = "";
            if (!$this->EM9->Raw) {
                $this->EM9->CurrentValue = HtmlDecode($this->EM9->CurrentValue);
            }
            $this->EM9->EditValue = HtmlEncode($this->EM9->CurrentValue);
            $this->EM9->PlaceHolder = RemoveHtml($this->EM9->caption());

            // EM10
            $this->EM10->EditAttrs["class"] = "form-control";
            $this->EM10->EditCustomAttributes = "";
            if (!$this->EM10->Raw) {
                $this->EM10->CurrentValue = HtmlDecode($this->EM10->CurrentValue);
            }
            $this->EM10->EditValue = HtmlEncode($this->EM10->CurrentValue);
            $this->EM10->PlaceHolder = RemoveHtml($this->EM10->caption());

            // EM11
            $this->EM11->EditAttrs["class"] = "form-control";
            $this->EM11->EditCustomAttributes = "";
            if (!$this->EM11->Raw) {
                $this->EM11->CurrentValue = HtmlDecode($this->EM11->CurrentValue);
            }
            $this->EM11->EditValue = HtmlEncode($this->EM11->CurrentValue);
            $this->EM11->PlaceHolder = RemoveHtml($this->EM11->caption());

            // EM12
            $this->EM12->EditAttrs["class"] = "form-control";
            $this->EM12->EditCustomAttributes = "";
            if (!$this->EM12->Raw) {
                $this->EM12->CurrentValue = HtmlDecode($this->EM12->CurrentValue);
            }
            $this->EM12->EditValue = HtmlEncode($this->EM12->CurrentValue);
            $this->EM12->PlaceHolder = RemoveHtml($this->EM12->caption());

            // EM13
            $this->EM13->EditAttrs["class"] = "form-control";
            $this->EM13->EditCustomAttributes = "";
            if (!$this->EM13->Raw) {
                $this->EM13->CurrentValue = HtmlDecode($this->EM13->CurrentValue);
            }
            $this->EM13->EditValue = HtmlEncode($this->EM13->CurrentValue);
            $this->EM13->PlaceHolder = RemoveHtml($this->EM13->caption());

            // Others1
            $this->Others1->EditAttrs["class"] = "form-control";
            $this->Others1->EditCustomAttributes = "";
            if (!$this->Others1->Raw) {
                $this->Others1->CurrentValue = HtmlDecode($this->Others1->CurrentValue);
            }
            $this->Others1->EditValue = HtmlEncode($this->Others1->CurrentValue);
            $this->Others1->PlaceHolder = RemoveHtml($this->Others1->caption());

            // Others2
            $this->Others2->EditAttrs["class"] = "form-control";
            $this->Others2->EditCustomAttributes = "";
            if (!$this->Others2->Raw) {
                $this->Others2->CurrentValue = HtmlDecode($this->Others2->CurrentValue);
            }
            $this->Others2->EditValue = HtmlEncode($this->Others2->CurrentValue);
            $this->Others2->PlaceHolder = RemoveHtml($this->Others2->caption());

            // Others3
            $this->Others3->EditAttrs["class"] = "form-control";
            $this->Others3->EditCustomAttributes = "";
            if (!$this->Others3->Raw) {
                $this->Others3->CurrentValue = HtmlDecode($this->Others3->CurrentValue);
            }
            $this->Others3->EditValue = HtmlEncode($this->Others3->CurrentValue);
            $this->Others3->PlaceHolder = RemoveHtml($this->Others3->caption());

            // Others4
            $this->Others4->EditAttrs["class"] = "form-control";
            $this->Others4->EditCustomAttributes = "";
            if (!$this->Others4->Raw) {
                $this->Others4->CurrentValue = HtmlDecode($this->Others4->CurrentValue);
            }
            $this->Others4->EditValue = HtmlEncode($this->Others4->CurrentValue);
            $this->Others4->PlaceHolder = RemoveHtml($this->Others4->caption());

            // Others5
            $this->Others5->EditAttrs["class"] = "form-control";
            $this->Others5->EditCustomAttributes = "";
            if (!$this->Others5->Raw) {
                $this->Others5->CurrentValue = HtmlDecode($this->Others5->CurrentValue);
            }
            $this->Others5->EditValue = HtmlEncode($this->Others5->CurrentValue);
            $this->Others5->PlaceHolder = RemoveHtml($this->Others5->caption());

            // Others6
            $this->Others6->EditAttrs["class"] = "form-control";
            $this->Others6->EditCustomAttributes = "";
            if (!$this->Others6->Raw) {
                $this->Others6->CurrentValue = HtmlDecode($this->Others6->CurrentValue);
            }
            $this->Others6->EditValue = HtmlEncode($this->Others6->CurrentValue);
            $this->Others6->PlaceHolder = RemoveHtml($this->Others6->caption());

            // Others7
            $this->Others7->EditAttrs["class"] = "form-control";
            $this->Others7->EditCustomAttributes = "";
            if (!$this->Others7->Raw) {
                $this->Others7->CurrentValue = HtmlDecode($this->Others7->CurrentValue);
            }
            $this->Others7->EditValue = HtmlEncode($this->Others7->CurrentValue);
            $this->Others7->PlaceHolder = RemoveHtml($this->Others7->caption());

            // Others8
            $this->Others8->EditAttrs["class"] = "form-control";
            $this->Others8->EditCustomAttributes = "";
            if (!$this->Others8->Raw) {
                $this->Others8->CurrentValue = HtmlDecode($this->Others8->CurrentValue);
            }
            $this->Others8->EditValue = HtmlEncode($this->Others8->CurrentValue);
            $this->Others8->PlaceHolder = RemoveHtml($this->Others8->caption());

            // Others9
            $this->Others9->EditAttrs["class"] = "form-control";
            $this->Others9->EditCustomAttributes = "";
            if (!$this->Others9->Raw) {
                $this->Others9->CurrentValue = HtmlDecode($this->Others9->CurrentValue);
            }
            $this->Others9->EditValue = HtmlEncode($this->Others9->CurrentValue);
            $this->Others9->PlaceHolder = RemoveHtml($this->Others9->caption());

            // Others10
            $this->Others10->EditAttrs["class"] = "form-control";
            $this->Others10->EditCustomAttributes = "";
            if (!$this->Others10->Raw) {
                $this->Others10->CurrentValue = HtmlDecode($this->Others10->CurrentValue);
            }
            $this->Others10->EditValue = HtmlEncode($this->Others10->CurrentValue);
            $this->Others10->PlaceHolder = RemoveHtml($this->Others10->caption());

            // Others11
            $this->Others11->EditAttrs["class"] = "form-control";
            $this->Others11->EditCustomAttributes = "";
            if (!$this->Others11->Raw) {
                $this->Others11->CurrentValue = HtmlDecode($this->Others11->CurrentValue);
            }
            $this->Others11->EditValue = HtmlEncode($this->Others11->CurrentValue);
            $this->Others11->PlaceHolder = RemoveHtml($this->Others11->caption());

            // Others12
            $this->Others12->EditAttrs["class"] = "form-control";
            $this->Others12->EditCustomAttributes = "";
            if (!$this->Others12->Raw) {
                $this->Others12->CurrentValue = HtmlDecode($this->Others12->CurrentValue);
            }
            $this->Others12->EditValue = HtmlEncode($this->Others12->CurrentValue);
            $this->Others12->PlaceHolder = RemoveHtml($this->Others12->caption());

            // Others13
            $this->Others13->EditAttrs["class"] = "form-control";
            $this->Others13->EditCustomAttributes = "";
            if (!$this->Others13->Raw) {
                $this->Others13->CurrentValue = HtmlDecode($this->Others13->CurrentValue);
            }
            $this->Others13->EditValue = HtmlEncode($this->Others13->CurrentValue);
            $this->Others13->PlaceHolder = RemoveHtml($this->Others13->caption());

            // DR1
            $this->DR1->EditAttrs["class"] = "form-control";
            $this->DR1->EditCustomAttributes = "";
            if (!$this->DR1->Raw) {
                $this->DR1->CurrentValue = HtmlDecode($this->DR1->CurrentValue);
            }
            $this->DR1->EditValue = HtmlEncode($this->DR1->CurrentValue);
            $this->DR1->PlaceHolder = RemoveHtml($this->DR1->caption());

            // DR2
            $this->DR2->EditAttrs["class"] = "form-control";
            $this->DR2->EditCustomAttributes = "";
            if (!$this->DR2->Raw) {
                $this->DR2->CurrentValue = HtmlDecode($this->DR2->CurrentValue);
            }
            $this->DR2->EditValue = HtmlEncode($this->DR2->CurrentValue);
            $this->DR2->PlaceHolder = RemoveHtml($this->DR2->caption());

            // DR3
            $this->DR3->EditAttrs["class"] = "form-control";
            $this->DR3->EditCustomAttributes = "";
            if (!$this->DR3->Raw) {
                $this->DR3->CurrentValue = HtmlDecode($this->DR3->CurrentValue);
            }
            $this->DR3->EditValue = HtmlEncode($this->DR3->CurrentValue);
            $this->DR3->PlaceHolder = RemoveHtml($this->DR3->caption());

            // DR4
            $this->DR4->EditAttrs["class"] = "form-control";
            $this->DR4->EditCustomAttributes = "";
            if (!$this->DR4->Raw) {
                $this->DR4->CurrentValue = HtmlDecode($this->DR4->CurrentValue);
            }
            $this->DR4->EditValue = HtmlEncode($this->DR4->CurrentValue);
            $this->DR4->PlaceHolder = RemoveHtml($this->DR4->caption());

            // DR5
            $this->DR5->EditAttrs["class"] = "form-control";
            $this->DR5->EditCustomAttributes = "";
            if (!$this->DR5->Raw) {
                $this->DR5->CurrentValue = HtmlDecode($this->DR5->CurrentValue);
            }
            $this->DR5->EditValue = HtmlEncode($this->DR5->CurrentValue);
            $this->DR5->PlaceHolder = RemoveHtml($this->DR5->caption());

            // DR6
            $this->DR6->EditAttrs["class"] = "form-control";
            $this->DR6->EditCustomAttributes = "";
            if (!$this->DR6->Raw) {
                $this->DR6->CurrentValue = HtmlDecode($this->DR6->CurrentValue);
            }
            $this->DR6->EditValue = HtmlEncode($this->DR6->CurrentValue);
            $this->DR6->PlaceHolder = RemoveHtml($this->DR6->caption());

            // DR7
            $this->DR7->EditAttrs["class"] = "form-control";
            $this->DR7->EditCustomAttributes = "";
            if (!$this->DR7->Raw) {
                $this->DR7->CurrentValue = HtmlDecode($this->DR7->CurrentValue);
            }
            $this->DR7->EditValue = HtmlEncode($this->DR7->CurrentValue);
            $this->DR7->PlaceHolder = RemoveHtml($this->DR7->caption());

            // DR8
            $this->DR8->EditAttrs["class"] = "form-control";
            $this->DR8->EditCustomAttributes = "";
            if (!$this->DR8->Raw) {
                $this->DR8->CurrentValue = HtmlDecode($this->DR8->CurrentValue);
            }
            $this->DR8->EditValue = HtmlEncode($this->DR8->CurrentValue);
            $this->DR8->PlaceHolder = RemoveHtml($this->DR8->caption());

            // DR9
            $this->DR9->EditAttrs["class"] = "form-control";
            $this->DR9->EditCustomAttributes = "";
            if (!$this->DR9->Raw) {
                $this->DR9->CurrentValue = HtmlDecode($this->DR9->CurrentValue);
            }
            $this->DR9->EditValue = HtmlEncode($this->DR9->CurrentValue);
            $this->DR9->PlaceHolder = RemoveHtml($this->DR9->caption());

            // DR10
            $this->DR10->EditAttrs["class"] = "form-control";
            $this->DR10->EditCustomAttributes = "";
            if (!$this->DR10->Raw) {
                $this->DR10->CurrentValue = HtmlDecode($this->DR10->CurrentValue);
            }
            $this->DR10->EditValue = HtmlEncode($this->DR10->CurrentValue);
            $this->DR10->PlaceHolder = RemoveHtml($this->DR10->caption());

            // DR11
            $this->DR11->EditAttrs["class"] = "form-control";
            $this->DR11->EditCustomAttributes = "";
            if (!$this->DR11->Raw) {
                $this->DR11->CurrentValue = HtmlDecode($this->DR11->CurrentValue);
            }
            $this->DR11->EditValue = HtmlEncode($this->DR11->CurrentValue);
            $this->DR11->PlaceHolder = RemoveHtml($this->DR11->caption());

            // DR12
            $this->DR12->EditAttrs["class"] = "form-control";
            $this->DR12->EditCustomAttributes = "";
            if (!$this->DR12->Raw) {
                $this->DR12->CurrentValue = HtmlDecode($this->DR12->CurrentValue);
            }
            $this->DR12->EditValue = HtmlEncode($this->DR12->CurrentValue);
            $this->DR12->PlaceHolder = RemoveHtml($this->DR12->caption());

            // DR13
            $this->DR13->EditAttrs["class"] = "form-control";
            $this->DR13->EditCustomAttributes = "";
            if (!$this->DR13->Raw) {
                $this->DR13->CurrentValue = HtmlDecode($this->DR13->CurrentValue);
            }
            $this->DR13->EditValue = HtmlEncode($this->DR13->CurrentValue);
            $this->DR13->PlaceHolder = RemoveHtml($this->DR13->caption());

            // DOCTORRESPONSIBLE
            $this->DOCTORRESPONSIBLE->EditAttrs["class"] = "form-control";
            $this->DOCTORRESPONSIBLE->EditCustomAttributes = "";
            $this->DOCTORRESPONSIBLE->EditValue = HtmlEncode($this->DOCTORRESPONSIBLE->CurrentValue);
            $this->DOCTORRESPONSIBLE->PlaceHolder = RemoveHtml($this->DOCTORRESPONSIBLE->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Convert
            $this->Convert->EditAttrs["class"] = "form-control";
            $this->Convert->EditCustomAttributes = "";
            if (!$this->Convert->Raw) {
                $this->Convert->CurrentValue = HtmlDecode($this->Convert->CurrentValue);
            }
            $this->Convert->EditValue = HtmlEncode($this->Convert->CurrentValue);
            $this->Convert->PlaceHolder = RemoveHtml($this->Convert->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // InseminatinTechnique
            $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
            $this->InseminatinTechnique->EditCustomAttributes = "";
            if (!$this->InseminatinTechnique->Raw) {
                $this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
            }
            $this->InseminatinTechnique->EditValue = HtmlEncode($this->InseminatinTechnique->CurrentValue);
            $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

            // IndicationForART
            $this->IndicationForART->EditAttrs["class"] = "form-control";
            $this->IndicationForART->EditCustomAttributes = "";
            if (!$this->IndicationForART->Raw) {
                $this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
            }
            $this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
            $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

            // Hysteroscopy
            $this->Hysteroscopy->EditAttrs["class"] = "form-control";
            $this->Hysteroscopy->EditCustomAttributes = "";
            if (!$this->Hysteroscopy->Raw) {
                $this->Hysteroscopy->CurrentValue = HtmlDecode($this->Hysteroscopy->CurrentValue);
            }
            $this->Hysteroscopy->EditValue = HtmlEncode($this->Hysteroscopy->CurrentValue);
            $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

            // EndometrialScratching
            $this->EndometrialScratching->EditAttrs["class"] = "form-control";
            $this->EndometrialScratching->EditCustomAttributes = "";
            if (!$this->EndometrialScratching->Raw) {
                $this->EndometrialScratching->CurrentValue = HtmlDecode($this->EndometrialScratching->CurrentValue);
            }
            $this->EndometrialScratching->EditValue = HtmlEncode($this->EndometrialScratching->CurrentValue);
            $this->EndometrialScratching->PlaceHolder = RemoveHtml($this->EndometrialScratching->caption());

            // TrialCannulation
            $this->TrialCannulation->EditAttrs["class"] = "form-control";
            $this->TrialCannulation->EditCustomAttributes = "";
            if (!$this->TrialCannulation->Raw) {
                $this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
            }
            $this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
            $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

            // CYCLETYPE
            $this->CYCLETYPE->EditAttrs["class"] = "form-control";
            $this->CYCLETYPE->EditCustomAttributes = "";
            if (!$this->CYCLETYPE->Raw) {
                $this->CYCLETYPE->CurrentValue = HtmlDecode($this->CYCLETYPE->CurrentValue);
            }
            $this->CYCLETYPE->EditValue = HtmlEncode($this->CYCLETYPE->CurrentValue);
            $this->CYCLETYPE->PlaceHolder = RemoveHtml($this->CYCLETYPE->caption());

            // HRTCYCLE
            $this->HRTCYCLE->EditAttrs["class"] = "form-control";
            $this->HRTCYCLE->EditCustomAttributes = "";
            if (!$this->HRTCYCLE->Raw) {
                $this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
            }
            $this->HRTCYCLE->EditValue = HtmlEncode($this->HRTCYCLE->CurrentValue);
            $this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

            // OralEstrogenDosage
            $this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
            $this->OralEstrogenDosage->EditCustomAttributes = "";
            if (!$this->OralEstrogenDosage->Raw) {
                $this->OralEstrogenDosage->CurrentValue = HtmlDecode($this->OralEstrogenDosage->CurrentValue);
            }
            $this->OralEstrogenDosage->EditValue = HtmlEncode($this->OralEstrogenDosage->CurrentValue);
            $this->OralEstrogenDosage->PlaceHolder = RemoveHtml($this->OralEstrogenDosage->caption());

            // VaginalEstrogen
            $this->VaginalEstrogen->EditAttrs["class"] = "form-control";
            $this->VaginalEstrogen->EditCustomAttributes = "";
            if (!$this->VaginalEstrogen->Raw) {
                $this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
            }
            $this->VaginalEstrogen->EditValue = HtmlEncode($this->VaginalEstrogen->CurrentValue);
            $this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

            // GCSF
            $this->GCSF->EditAttrs["class"] = "form-control";
            $this->GCSF->EditCustomAttributes = "";
            if (!$this->GCSF->Raw) {
                $this->GCSF->CurrentValue = HtmlDecode($this->GCSF->CurrentValue);
            }
            $this->GCSF->EditValue = HtmlEncode($this->GCSF->CurrentValue);
            $this->GCSF->PlaceHolder = RemoveHtml($this->GCSF->caption());

            // ActivatedPRP
            $this->ActivatedPRP->EditAttrs["class"] = "form-control";
            $this->ActivatedPRP->EditCustomAttributes = "";
            if (!$this->ActivatedPRP->Raw) {
                $this->ActivatedPRP->CurrentValue = HtmlDecode($this->ActivatedPRP->CurrentValue);
            }
            $this->ActivatedPRP->EditValue = HtmlEncode($this->ActivatedPRP->CurrentValue);
            $this->ActivatedPRP->PlaceHolder = RemoveHtml($this->ActivatedPRP->caption());

            // UCLcm
            $this->UCLcm->EditAttrs["class"] = "form-control";
            $this->UCLcm->EditCustomAttributes = "";
            if (!$this->UCLcm->Raw) {
                $this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
            }
            $this->UCLcm->EditValue = HtmlEncode($this->UCLcm->CurrentValue);
            $this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

            // DATOFEMBRYOTRANSFER
            $this->DATOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DATOFEMBRYOTRANSFER->EditCustomAttributes = "";
            $this->DATOFEMBRYOTRANSFER->EditValue = HtmlEncode(FormatDateTime($this->DATOFEMBRYOTRANSFER->CurrentValue, 8));
            $this->DATOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATOFEMBRYOTRANSFER->caption());

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOTRANSFER->Raw) {
                $this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            }
            $this->DAYOFEMBRYOTRANSFER->EditValue = HtmlEncode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            $this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTHAWED->Raw) {
                $this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            }
            $this->NOOFEMBRYOSTHAWED->EditValue = HtmlEncode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            $this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTRANSFERRED->Raw) {
                $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            }
            $this->NOOFEMBRYOSTRANSFERRED->EditValue = HtmlEncode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            $this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOS->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOS->Raw) {
                $this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
            }
            $this->DAYOFEMBRYOS->EditValue = HtmlEncode($this->DAYOFEMBRYOS->CurrentValue);
            $this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
            $this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
            if (!$this->CRYOPRESERVEDEMBRYOS->Raw) {
                $this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            }
            $this->CRYOPRESERVEDEMBRYOS->EditValue = HtmlEncode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            $this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

            // ViaAdmin
            $this->ViaAdmin->EditAttrs["class"] = "form-control";
            $this->ViaAdmin->EditCustomAttributes = "";
            if (!$this->ViaAdmin->Raw) {
                $this->ViaAdmin->CurrentValue = HtmlDecode($this->ViaAdmin->CurrentValue);
            }
            $this->ViaAdmin->EditValue = HtmlEncode($this->ViaAdmin->CurrentValue);
            $this->ViaAdmin->PlaceHolder = RemoveHtml($this->ViaAdmin->caption());

            // ViaStartDateTime
            $this->ViaStartDateTime->EditAttrs["class"] = "form-control";
            $this->ViaStartDateTime->EditCustomAttributes = "";
            $this->ViaStartDateTime->EditValue = HtmlEncode(FormatDateTime($this->ViaStartDateTime->CurrentValue, 8));
            $this->ViaStartDateTime->PlaceHolder = RemoveHtml($this->ViaStartDateTime->caption());

            // ViaDose
            $this->ViaDose->EditAttrs["class"] = "form-control";
            $this->ViaDose->EditCustomAttributes = "";
            if (!$this->ViaDose->Raw) {
                $this->ViaDose->CurrentValue = HtmlDecode($this->ViaDose->CurrentValue);
            }
            $this->ViaDose->EditValue = HtmlEncode($this->ViaDose->CurrentValue);
            $this->ViaDose->PlaceHolder = RemoveHtml($this->ViaDose->caption());

            // AllFreeze
            $this->AllFreeze->EditAttrs["class"] = "form-control";
            $this->AllFreeze->EditCustomAttributes = "";
            if (!$this->AllFreeze->Raw) {
                $this->AllFreeze->CurrentValue = HtmlDecode($this->AllFreeze->CurrentValue);
            }
            $this->AllFreeze->EditValue = HtmlEncode($this->AllFreeze->CurrentValue);
            $this->AllFreeze->PlaceHolder = RemoveHtml($this->AllFreeze->caption());

            // TreatmentCancel
            $this->TreatmentCancel->EditAttrs["class"] = "form-control";
            $this->TreatmentCancel->EditCustomAttributes = "";
            if (!$this->TreatmentCancel->Raw) {
                $this->TreatmentCancel->CurrentValue = HtmlDecode($this->TreatmentCancel->CurrentValue);
            }
            $this->TreatmentCancel->EditValue = HtmlEncode($this->TreatmentCancel->CurrentValue);
            $this->TreatmentCancel->PlaceHolder = RemoveHtml($this->TreatmentCancel->caption());

            // Reason
            $this->Reason->EditAttrs["class"] = "form-control";
            $this->Reason->EditCustomAttributes = "";
            $this->Reason->EditValue = HtmlEncode($this->Reason->CurrentValue);
            $this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

            // ProgesteroneAdmin
            $this->ProgesteroneAdmin->EditAttrs["class"] = "form-control";
            $this->ProgesteroneAdmin->EditCustomAttributes = "";
            if (!$this->ProgesteroneAdmin->Raw) {
                $this->ProgesteroneAdmin->CurrentValue = HtmlDecode($this->ProgesteroneAdmin->CurrentValue);
            }
            $this->ProgesteroneAdmin->EditValue = HtmlEncode($this->ProgesteroneAdmin->CurrentValue);
            $this->ProgesteroneAdmin->PlaceHolder = RemoveHtml($this->ProgesteroneAdmin->caption());

            // ProgesteroneStart
            $this->ProgesteroneStart->EditAttrs["class"] = "form-control";
            $this->ProgesteroneStart->EditCustomAttributes = "";
            if (!$this->ProgesteroneStart->Raw) {
                $this->ProgesteroneStart->CurrentValue = HtmlDecode($this->ProgesteroneStart->CurrentValue);
            }
            $this->ProgesteroneStart->EditValue = HtmlEncode($this->ProgesteroneStart->CurrentValue);
            $this->ProgesteroneStart->PlaceHolder = RemoveHtml($this->ProgesteroneStart->caption());

            // ProgesteroneDose
            $this->ProgesteroneDose->EditAttrs["class"] = "form-control";
            $this->ProgesteroneDose->EditCustomAttributes = "";
            if (!$this->ProgesteroneDose->Raw) {
                $this->ProgesteroneDose->CurrentValue = HtmlDecode($this->ProgesteroneDose->CurrentValue);
            }
            $this->ProgesteroneDose->EditValue = HtmlEncode($this->ProgesteroneDose->CurrentValue);
            $this->ProgesteroneDose->PlaceHolder = RemoveHtml($this->ProgesteroneDose->caption());

            // StChDate14
            $this->StChDate14->EditAttrs["class"] = "form-control";
            $this->StChDate14->EditCustomAttributes = "";
            $this->StChDate14->EditValue = HtmlEncode(FormatDateTime($this->StChDate14->CurrentValue, 8));
            $this->StChDate14->PlaceHolder = RemoveHtml($this->StChDate14->caption());

            // StChDate15
            $this->StChDate15->EditAttrs["class"] = "form-control";
            $this->StChDate15->EditCustomAttributes = "";
            $this->StChDate15->EditValue = HtmlEncode(FormatDateTime($this->StChDate15->CurrentValue, 8));
            $this->StChDate15->PlaceHolder = RemoveHtml($this->StChDate15->caption());

            // StChDate16
            $this->StChDate16->EditAttrs["class"] = "form-control";
            $this->StChDate16->EditCustomAttributes = "";
            $this->StChDate16->EditValue = HtmlEncode(FormatDateTime($this->StChDate16->CurrentValue, 8));
            $this->StChDate16->PlaceHolder = RemoveHtml($this->StChDate16->caption());

            // StChDate17
            $this->StChDate17->EditAttrs["class"] = "form-control";
            $this->StChDate17->EditCustomAttributes = "";
            $this->StChDate17->EditValue = HtmlEncode(FormatDateTime($this->StChDate17->CurrentValue, 8));
            $this->StChDate17->PlaceHolder = RemoveHtml($this->StChDate17->caption());

            // StChDate18
            $this->StChDate18->EditAttrs["class"] = "form-control";
            $this->StChDate18->EditCustomAttributes = "";
            $this->StChDate18->EditValue = HtmlEncode(FormatDateTime($this->StChDate18->CurrentValue, 8));
            $this->StChDate18->PlaceHolder = RemoveHtml($this->StChDate18->caption());

            // StChDate19
            $this->StChDate19->EditAttrs["class"] = "form-control";
            $this->StChDate19->EditCustomAttributes = "";
            $this->StChDate19->EditValue = HtmlEncode(FormatDateTime($this->StChDate19->CurrentValue, 8));
            $this->StChDate19->PlaceHolder = RemoveHtml($this->StChDate19->caption());

            // StChDate20
            $this->StChDate20->EditAttrs["class"] = "form-control";
            $this->StChDate20->EditCustomAttributes = "";
            $this->StChDate20->EditValue = HtmlEncode(FormatDateTime($this->StChDate20->CurrentValue, 8));
            $this->StChDate20->PlaceHolder = RemoveHtml($this->StChDate20->caption());

            // StChDate21
            $this->StChDate21->EditAttrs["class"] = "form-control";
            $this->StChDate21->EditCustomAttributes = "";
            $this->StChDate21->EditValue = HtmlEncode(FormatDateTime($this->StChDate21->CurrentValue, 8));
            $this->StChDate21->PlaceHolder = RemoveHtml($this->StChDate21->caption());

            // StChDate22
            $this->StChDate22->EditAttrs["class"] = "form-control";
            $this->StChDate22->EditCustomAttributes = "";
            $this->StChDate22->EditValue = HtmlEncode(FormatDateTime($this->StChDate22->CurrentValue, 8));
            $this->StChDate22->PlaceHolder = RemoveHtml($this->StChDate22->caption());

            // StChDate23
            $this->StChDate23->EditAttrs["class"] = "form-control";
            $this->StChDate23->EditCustomAttributes = "";
            $this->StChDate23->EditValue = HtmlEncode(FormatDateTime($this->StChDate23->CurrentValue, 8));
            $this->StChDate23->PlaceHolder = RemoveHtml($this->StChDate23->caption());

            // StChDate24
            $this->StChDate24->EditAttrs["class"] = "form-control";
            $this->StChDate24->EditCustomAttributes = "";
            $this->StChDate24->EditValue = HtmlEncode(FormatDateTime($this->StChDate24->CurrentValue, 8));
            $this->StChDate24->PlaceHolder = RemoveHtml($this->StChDate24->caption());

            // StChDate25
            $this->StChDate25->EditAttrs["class"] = "form-control";
            $this->StChDate25->EditCustomAttributes = "";
            $this->StChDate25->EditValue = HtmlEncode(FormatDateTime($this->StChDate25->CurrentValue, 8));
            $this->StChDate25->PlaceHolder = RemoveHtml($this->StChDate25->caption());

            // CycleDay14
            $this->CycleDay14->EditAttrs["class"] = "form-control";
            $this->CycleDay14->EditCustomAttributes = "";
            if (!$this->CycleDay14->Raw) {
                $this->CycleDay14->CurrentValue = HtmlDecode($this->CycleDay14->CurrentValue);
            }
            $this->CycleDay14->EditValue = HtmlEncode($this->CycleDay14->CurrentValue);
            $this->CycleDay14->PlaceHolder = RemoveHtml($this->CycleDay14->caption());

            // CycleDay15
            $this->CycleDay15->EditAttrs["class"] = "form-control";
            $this->CycleDay15->EditCustomAttributes = "";
            if (!$this->CycleDay15->Raw) {
                $this->CycleDay15->CurrentValue = HtmlDecode($this->CycleDay15->CurrentValue);
            }
            $this->CycleDay15->EditValue = HtmlEncode($this->CycleDay15->CurrentValue);
            $this->CycleDay15->PlaceHolder = RemoveHtml($this->CycleDay15->caption());

            // CycleDay16
            $this->CycleDay16->EditAttrs["class"] = "form-control";
            $this->CycleDay16->EditCustomAttributes = "";
            if (!$this->CycleDay16->Raw) {
                $this->CycleDay16->CurrentValue = HtmlDecode($this->CycleDay16->CurrentValue);
            }
            $this->CycleDay16->EditValue = HtmlEncode($this->CycleDay16->CurrentValue);
            $this->CycleDay16->PlaceHolder = RemoveHtml($this->CycleDay16->caption());

            // CycleDay17
            $this->CycleDay17->EditAttrs["class"] = "form-control";
            $this->CycleDay17->EditCustomAttributes = "";
            if (!$this->CycleDay17->Raw) {
                $this->CycleDay17->CurrentValue = HtmlDecode($this->CycleDay17->CurrentValue);
            }
            $this->CycleDay17->EditValue = HtmlEncode($this->CycleDay17->CurrentValue);
            $this->CycleDay17->PlaceHolder = RemoveHtml($this->CycleDay17->caption());

            // CycleDay18
            $this->CycleDay18->EditAttrs["class"] = "form-control";
            $this->CycleDay18->EditCustomAttributes = "";
            if (!$this->CycleDay18->Raw) {
                $this->CycleDay18->CurrentValue = HtmlDecode($this->CycleDay18->CurrentValue);
            }
            $this->CycleDay18->EditValue = HtmlEncode($this->CycleDay18->CurrentValue);
            $this->CycleDay18->PlaceHolder = RemoveHtml($this->CycleDay18->caption());

            // CycleDay19
            $this->CycleDay19->EditAttrs["class"] = "form-control";
            $this->CycleDay19->EditCustomAttributes = "";
            if (!$this->CycleDay19->Raw) {
                $this->CycleDay19->CurrentValue = HtmlDecode($this->CycleDay19->CurrentValue);
            }
            $this->CycleDay19->EditValue = HtmlEncode($this->CycleDay19->CurrentValue);
            $this->CycleDay19->PlaceHolder = RemoveHtml($this->CycleDay19->caption());

            // CycleDay20
            $this->CycleDay20->EditAttrs["class"] = "form-control";
            $this->CycleDay20->EditCustomAttributes = "";
            if (!$this->CycleDay20->Raw) {
                $this->CycleDay20->CurrentValue = HtmlDecode($this->CycleDay20->CurrentValue);
            }
            $this->CycleDay20->EditValue = HtmlEncode($this->CycleDay20->CurrentValue);
            $this->CycleDay20->PlaceHolder = RemoveHtml($this->CycleDay20->caption());

            // CycleDay21
            $this->CycleDay21->EditAttrs["class"] = "form-control";
            $this->CycleDay21->EditCustomAttributes = "";
            if (!$this->CycleDay21->Raw) {
                $this->CycleDay21->CurrentValue = HtmlDecode($this->CycleDay21->CurrentValue);
            }
            $this->CycleDay21->EditValue = HtmlEncode($this->CycleDay21->CurrentValue);
            $this->CycleDay21->PlaceHolder = RemoveHtml($this->CycleDay21->caption());

            // CycleDay22
            $this->CycleDay22->EditAttrs["class"] = "form-control";
            $this->CycleDay22->EditCustomAttributes = "";
            if (!$this->CycleDay22->Raw) {
                $this->CycleDay22->CurrentValue = HtmlDecode($this->CycleDay22->CurrentValue);
            }
            $this->CycleDay22->EditValue = HtmlEncode($this->CycleDay22->CurrentValue);
            $this->CycleDay22->PlaceHolder = RemoveHtml($this->CycleDay22->caption());

            // CycleDay23
            $this->CycleDay23->EditAttrs["class"] = "form-control";
            $this->CycleDay23->EditCustomAttributes = "";
            if (!$this->CycleDay23->Raw) {
                $this->CycleDay23->CurrentValue = HtmlDecode($this->CycleDay23->CurrentValue);
            }
            $this->CycleDay23->EditValue = HtmlEncode($this->CycleDay23->CurrentValue);
            $this->CycleDay23->PlaceHolder = RemoveHtml($this->CycleDay23->caption());

            // CycleDay24
            $this->CycleDay24->EditAttrs["class"] = "form-control";
            $this->CycleDay24->EditCustomAttributes = "";
            if (!$this->CycleDay24->Raw) {
                $this->CycleDay24->CurrentValue = HtmlDecode($this->CycleDay24->CurrentValue);
            }
            $this->CycleDay24->EditValue = HtmlEncode($this->CycleDay24->CurrentValue);
            $this->CycleDay24->PlaceHolder = RemoveHtml($this->CycleDay24->caption());

            // CycleDay25
            $this->CycleDay25->EditAttrs["class"] = "form-control";
            $this->CycleDay25->EditCustomAttributes = "";
            if (!$this->CycleDay25->Raw) {
                $this->CycleDay25->CurrentValue = HtmlDecode($this->CycleDay25->CurrentValue);
            }
            $this->CycleDay25->EditValue = HtmlEncode($this->CycleDay25->CurrentValue);
            $this->CycleDay25->PlaceHolder = RemoveHtml($this->CycleDay25->caption());

            // StimulationDay14
            $this->StimulationDay14->EditAttrs["class"] = "form-control";
            $this->StimulationDay14->EditCustomAttributes = "";
            if (!$this->StimulationDay14->Raw) {
                $this->StimulationDay14->CurrentValue = HtmlDecode($this->StimulationDay14->CurrentValue);
            }
            $this->StimulationDay14->EditValue = HtmlEncode($this->StimulationDay14->CurrentValue);
            $this->StimulationDay14->PlaceHolder = RemoveHtml($this->StimulationDay14->caption());

            // StimulationDay15
            $this->StimulationDay15->EditAttrs["class"] = "form-control";
            $this->StimulationDay15->EditCustomAttributes = "";
            if (!$this->StimulationDay15->Raw) {
                $this->StimulationDay15->CurrentValue = HtmlDecode($this->StimulationDay15->CurrentValue);
            }
            $this->StimulationDay15->EditValue = HtmlEncode($this->StimulationDay15->CurrentValue);
            $this->StimulationDay15->PlaceHolder = RemoveHtml($this->StimulationDay15->caption());

            // StimulationDay16
            $this->StimulationDay16->EditAttrs["class"] = "form-control";
            $this->StimulationDay16->EditCustomAttributes = "";
            if (!$this->StimulationDay16->Raw) {
                $this->StimulationDay16->CurrentValue = HtmlDecode($this->StimulationDay16->CurrentValue);
            }
            $this->StimulationDay16->EditValue = HtmlEncode($this->StimulationDay16->CurrentValue);
            $this->StimulationDay16->PlaceHolder = RemoveHtml($this->StimulationDay16->caption());

            // StimulationDay17
            $this->StimulationDay17->EditAttrs["class"] = "form-control";
            $this->StimulationDay17->EditCustomAttributes = "";
            if (!$this->StimulationDay17->Raw) {
                $this->StimulationDay17->CurrentValue = HtmlDecode($this->StimulationDay17->CurrentValue);
            }
            $this->StimulationDay17->EditValue = HtmlEncode($this->StimulationDay17->CurrentValue);
            $this->StimulationDay17->PlaceHolder = RemoveHtml($this->StimulationDay17->caption());

            // StimulationDay18
            $this->StimulationDay18->EditAttrs["class"] = "form-control";
            $this->StimulationDay18->EditCustomAttributes = "";
            if (!$this->StimulationDay18->Raw) {
                $this->StimulationDay18->CurrentValue = HtmlDecode($this->StimulationDay18->CurrentValue);
            }
            $this->StimulationDay18->EditValue = HtmlEncode($this->StimulationDay18->CurrentValue);
            $this->StimulationDay18->PlaceHolder = RemoveHtml($this->StimulationDay18->caption());

            // StimulationDay19
            $this->StimulationDay19->EditAttrs["class"] = "form-control";
            $this->StimulationDay19->EditCustomAttributes = "";
            if (!$this->StimulationDay19->Raw) {
                $this->StimulationDay19->CurrentValue = HtmlDecode($this->StimulationDay19->CurrentValue);
            }
            $this->StimulationDay19->EditValue = HtmlEncode($this->StimulationDay19->CurrentValue);
            $this->StimulationDay19->PlaceHolder = RemoveHtml($this->StimulationDay19->caption());

            // StimulationDay20
            $this->StimulationDay20->EditAttrs["class"] = "form-control";
            $this->StimulationDay20->EditCustomAttributes = "";
            if (!$this->StimulationDay20->Raw) {
                $this->StimulationDay20->CurrentValue = HtmlDecode($this->StimulationDay20->CurrentValue);
            }
            $this->StimulationDay20->EditValue = HtmlEncode($this->StimulationDay20->CurrentValue);
            $this->StimulationDay20->PlaceHolder = RemoveHtml($this->StimulationDay20->caption());

            // StimulationDay21
            $this->StimulationDay21->EditAttrs["class"] = "form-control";
            $this->StimulationDay21->EditCustomAttributes = "";
            if (!$this->StimulationDay21->Raw) {
                $this->StimulationDay21->CurrentValue = HtmlDecode($this->StimulationDay21->CurrentValue);
            }
            $this->StimulationDay21->EditValue = HtmlEncode($this->StimulationDay21->CurrentValue);
            $this->StimulationDay21->PlaceHolder = RemoveHtml($this->StimulationDay21->caption());

            // StimulationDay22
            $this->StimulationDay22->EditAttrs["class"] = "form-control";
            $this->StimulationDay22->EditCustomAttributes = "";
            if (!$this->StimulationDay22->Raw) {
                $this->StimulationDay22->CurrentValue = HtmlDecode($this->StimulationDay22->CurrentValue);
            }
            $this->StimulationDay22->EditValue = HtmlEncode($this->StimulationDay22->CurrentValue);
            $this->StimulationDay22->PlaceHolder = RemoveHtml($this->StimulationDay22->caption());

            // StimulationDay23
            $this->StimulationDay23->EditAttrs["class"] = "form-control";
            $this->StimulationDay23->EditCustomAttributes = "";
            if (!$this->StimulationDay23->Raw) {
                $this->StimulationDay23->CurrentValue = HtmlDecode($this->StimulationDay23->CurrentValue);
            }
            $this->StimulationDay23->EditValue = HtmlEncode($this->StimulationDay23->CurrentValue);
            $this->StimulationDay23->PlaceHolder = RemoveHtml($this->StimulationDay23->caption());

            // StimulationDay24
            $this->StimulationDay24->EditAttrs["class"] = "form-control";
            $this->StimulationDay24->EditCustomAttributes = "";
            if (!$this->StimulationDay24->Raw) {
                $this->StimulationDay24->CurrentValue = HtmlDecode($this->StimulationDay24->CurrentValue);
            }
            $this->StimulationDay24->EditValue = HtmlEncode($this->StimulationDay24->CurrentValue);
            $this->StimulationDay24->PlaceHolder = RemoveHtml($this->StimulationDay24->caption());

            // StimulationDay25
            $this->StimulationDay25->EditAttrs["class"] = "form-control";
            $this->StimulationDay25->EditCustomAttributes = "";
            if (!$this->StimulationDay25->Raw) {
                $this->StimulationDay25->CurrentValue = HtmlDecode($this->StimulationDay25->CurrentValue);
            }
            $this->StimulationDay25->EditValue = HtmlEncode($this->StimulationDay25->CurrentValue);
            $this->StimulationDay25->PlaceHolder = RemoveHtml($this->StimulationDay25->caption());

            // Tablet14
            $this->Tablet14->EditAttrs["class"] = "form-control";
            $this->Tablet14->EditCustomAttributes = "";
            if (!$this->Tablet14->Raw) {
                $this->Tablet14->CurrentValue = HtmlDecode($this->Tablet14->CurrentValue);
            }
            $this->Tablet14->EditValue = HtmlEncode($this->Tablet14->CurrentValue);
            $this->Tablet14->PlaceHolder = RemoveHtml($this->Tablet14->caption());

            // Tablet15
            $this->Tablet15->EditAttrs["class"] = "form-control";
            $this->Tablet15->EditCustomAttributes = "";
            if (!$this->Tablet15->Raw) {
                $this->Tablet15->CurrentValue = HtmlDecode($this->Tablet15->CurrentValue);
            }
            $this->Tablet15->EditValue = HtmlEncode($this->Tablet15->CurrentValue);
            $this->Tablet15->PlaceHolder = RemoveHtml($this->Tablet15->caption());

            // Tablet16
            $this->Tablet16->EditAttrs["class"] = "form-control";
            $this->Tablet16->EditCustomAttributes = "";
            if (!$this->Tablet16->Raw) {
                $this->Tablet16->CurrentValue = HtmlDecode($this->Tablet16->CurrentValue);
            }
            $this->Tablet16->EditValue = HtmlEncode($this->Tablet16->CurrentValue);
            $this->Tablet16->PlaceHolder = RemoveHtml($this->Tablet16->caption());

            // Tablet17
            $this->Tablet17->EditAttrs["class"] = "form-control";
            $this->Tablet17->EditCustomAttributes = "";
            if (!$this->Tablet17->Raw) {
                $this->Tablet17->CurrentValue = HtmlDecode($this->Tablet17->CurrentValue);
            }
            $this->Tablet17->EditValue = HtmlEncode($this->Tablet17->CurrentValue);
            $this->Tablet17->PlaceHolder = RemoveHtml($this->Tablet17->caption());

            // Tablet18
            $this->Tablet18->EditAttrs["class"] = "form-control";
            $this->Tablet18->EditCustomAttributes = "";
            if (!$this->Tablet18->Raw) {
                $this->Tablet18->CurrentValue = HtmlDecode($this->Tablet18->CurrentValue);
            }
            $this->Tablet18->EditValue = HtmlEncode($this->Tablet18->CurrentValue);
            $this->Tablet18->PlaceHolder = RemoveHtml($this->Tablet18->caption());

            // Tablet19
            $this->Tablet19->EditAttrs["class"] = "form-control";
            $this->Tablet19->EditCustomAttributes = "";
            if (!$this->Tablet19->Raw) {
                $this->Tablet19->CurrentValue = HtmlDecode($this->Tablet19->CurrentValue);
            }
            $this->Tablet19->EditValue = HtmlEncode($this->Tablet19->CurrentValue);
            $this->Tablet19->PlaceHolder = RemoveHtml($this->Tablet19->caption());

            // Tablet20
            $this->Tablet20->EditAttrs["class"] = "form-control";
            $this->Tablet20->EditCustomAttributes = "";
            if (!$this->Tablet20->Raw) {
                $this->Tablet20->CurrentValue = HtmlDecode($this->Tablet20->CurrentValue);
            }
            $this->Tablet20->EditValue = HtmlEncode($this->Tablet20->CurrentValue);
            $this->Tablet20->PlaceHolder = RemoveHtml($this->Tablet20->caption());

            // Tablet21
            $this->Tablet21->EditAttrs["class"] = "form-control";
            $this->Tablet21->EditCustomAttributes = "";
            if (!$this->Tablet21->Raw) {
                $this->Tablet21->CurrentValue = HtmlDecode($this->Tablet21->CurrentValue);
            }
            $this->Tablet21->EditValue = HtmlEncode($this->Tablet21->CurrentValue);
            $this->Tablet21->PlaceHolder = RemoveHtml($this->Tablet21->caption());

            // Tablet22
            $this->Tablet22->EditAttrs["class"] = "form-control";
            $this->Tablet22->EditCustomAttributes = "";
            if (!$this->Tablet22->Raw) {
                $this->Tablet22->CurrentValue = HtmlDecode($this->Tablet22->CurrentValue);
            }
            $this->Tablet22->EditValue = HtmlEncode($this->Tablet22->CurrentValue);
            $this->Tablet22->PlaceHolder = RemoveHtml($this->Tablet22->caption());

            // Tablet23
            $this->Tablet23->EditAttrs["class"] = "form-control";
            $this->Tablet23->EditCustomAttributes = "";
            if (!$this->Tablet23->Raw) {
                $this->Tablet23->CurrentValue = HtmlDecode($this->Tablet23->CurrentValue);
            }
            $this->Tablet23->EditValue = HtmlEncode($this->Tablet23->CurrentValue);
            $this->Tablet23->PlaceHolder = RemoveHtml($this->Tablet23->caption());

            // Tablet24
            $this->Tablet24->EditAttrs["class"] = "form-control";
            $this->Tablet24->EditCustomAttributes = "";
            if (!$this->Tablet24->Raw) {
                $this->Tablet24->CurrentValue = HtmlDecode($this->Tablet24->CurrentValue);
            }
            $this->Tablet24->EditValue = HtmlEncode($this->Tablet24->CurrentValue);
            $this->Tablet24->PlaceHolder = RemoveHtml($this->Tablet24->caption());

            // Tablet25
            $this->Tablet25->EditAttrs["class"] = "form-control";
            $this->Tablet25->EditCustomAttributes = "";
            if (!$this->Tablet25->Raw) {
                $this->Tablet25->CurrentValue = HtmlDecode($this->Tablet25->CurrentValue);
            }
            $this->Tablet25->EditValue = HtmlEncode($this->Tablet25->CurrentValue);
            $this->Tablet25->PlaceHolder = RemoveHtml($this->Tablet25->caption());

            // RFSH14
            $this->RFSH14->EditAttrs["class"] = "form-control";
            $this->RFSH14->EditCustomAttributes = "";
            if (!$this->RFSH14->Raw) {
                $this->RFSH14->CurrentValue = HtmlDecode($this->RFSH14->CurrentValue);
            }
            $this->RFSH14->EditValue = HtmlEncode($this->RFSH14->CurrentValue);
            $this->RFSH14->PlaceHolder = RemoveHtml($this->RFSH14->caption());

            // RFSH15
            $this->RFSH15->EditAttrs["class"] = "form-control";
            $this->RFSH15->EditCustomAttributes = "";
            if (!$this->RFSH15->Raw) {
                $this->RFSH15->CurrentValue = HtmlDecode($this->RFSH15->CurrentValue);
            }
            $this->RFSH15->EditValue = HtmlEncode($this->RFSH15->CurrentValue);
            $this->RFSH15->PlaceHolder = RemoveHtml($this->RFSH15->caption());

            // RFSH16
            $this->RFSH16->EditAttrs["class"] = "form-control";
            $this->RFSH16->EditCustomAttributes = "";
            if (!$this->RFSH16->Raw) {
                $this->RFSH16->CurrentValue = HtmlDecode($this->RFSH16->CurrentValue);
            }
            $this->RFSH16->EditValue = HtmlEncode($this->RFSH16->CurrentValue);
            $this->RFSH16->PlaceHolder = RemoveHtml($this->RFSH16->caption());

            // RFSH17
            $this->RFSH17->EditAttrs["class"] = "form-control";
            $this->RFSH17->EditCustomAttributes = "";
            if (!$this->RFSH17->Raw) {
                $this->RFSH17->CurrentValue = HtmlDecode($this->RFSH17->CurrentValue);
            }
            $this->RFSH17->EditValue = HtmlEncode($this->RFSH17->CurrentValue);
            $this->RFSH17->PlaceHolder = RemoveHtml($this->RFSH17->caption());

            // RFSH18
            $this->RFSH18->EditAttrs["class"] = "form-control";
            $this->RFSH18->EditCustomAttributes = "";
            if (!$this->RFSH18->Raw) {
                $this->RFSH18->CurrentValue = HtmlDecode($this->RFSH18->CurrentValue);
            }
            $this->RFSH18->EditValue = HtmlEncode($this->RFSH18->CurrentValue);
            $this->RFSH18->PlaceHolder = RemoveHtml($this->RFSH18->caption());

            // RFSH19
            $this->RFSH19->EditAttrs["class"] = "form-control";
            $this->RFSH19->EditCustomAttributes = "";
            if (!$this->RFSH19->Raw) {
                $this->RFSH19->CurrentValue = HtmlDecode($this->RFSH19->CurrentValue);
            }
            $this->RFSH19->EditValue = HtmlEncode($this->RFSH19->CurrentValue);
            $this->RFSH19->PlaceHolder = RemoveHtml($this->RFSH19->caption());

            // RFSH20
            $this->RFSH20->EditAttrs["class"] = "form-control";
            $this->RFSH20->EditCustomAttributes = "";
            if (!$this->RFSH20->Raw) {
                $this->RFSH20->CurrentValue = HtmlDecode($this->RFSH20->CurrentValue);
            }
            $this->RFSH20->EditValue = HtmlEncode($this->RFSH20->CurrentValue);
            $this->RFSH20->PlaceHolder = RemoveHtml($this->RFSH20->caption());

            // RFSH21
            $this->RFSH21->EditAttrs["class"] = "form-control";
            $this->RFSH21->EditCustomAttributes = "";
            if (!$this->RFSH21->Raw) {
                $this->RFSH21->CurrentValue = HtmlDecode($this->RFSH21->CurrentValue);
            }
            $this->RFSH21->EditValue = HtmlEncode($this->RFSH21->CurrentValue);
            $this->RFSH21->PlaceHolder = RemoveHtml($this->RFSH21->caption());

            // RFSH22
            $this->RFSH22->EditAttrs["class"] = "form-control";
            $this->RFSH22->EditCustomAttributes = "";
            if (!$this->RFSH22->Raw) {
                $this->RFSH22->CurrentValue = HtmlDecode($this->RFSH22->CurrentValue);
            }
            $this->RFSH22->EditValue = HtmlEncode($this->RFSH22->CurrentValue);
            $this->RFSH22->PlaceHolder = RemoveHtml($this->RFSH22->caption());

            // RFSH23
            $this->RFSH23->EditAttrs["class"] = "form-control";
            $this->RFSH23->EditCustomAttributes = "";
            if (!$this->RFSH23->Raw) {
                $this->RFSH23->CurrentValue = HtmlDecode($this->RFSH23->CurrentValue);
            }
            $this->RFSH23->EditValue = HtmlEncode($this->RFSH23->CurrentValue);
            $this->RFSH23->PlaceHolder = RemoveHtml($this->RFSH23->caption());

            // RFSH24
            $this->RFSH24->EditAttrs["class"] = "form-control";
            $this->RFSH24->EditCustomAttributes = "";
            if (!$this->RFSH24->Raw) {
                $this->RFSH24->CurrentValue = HtmlDecode($this->RFSH24->CurrentValue);
            }
            $this->RFSH24->EditValue = HtmlEncode($this->RFSH24->CurrentValue);
            $this->RFSH24->PlaceHolder = RemoveHtml($this->RFSH24->caption());

            // RFSH25
            $this->RFSH25->EditAttrs["class"] = "form-control";
            $this->RFSH25->EditCustomAttributes = "";
            if (!$this->RFSH25->Raw) {
                $this->RFSH25->CurrentValue = HtmlDecode($this->RFSH25->CurrentValue);
            }
            $this->RFSH25->EditValue = HtmlEncode($this->RFSH25->CurrentValue);
            $this->RFSH25->PlaceHolder = RemoveHtml($this->RFSH25->caption());

            // HMG14
            $this->HMG14->EditAttrs["class"] = "form-control";
            $this->HMG14->EditCustomAttributes = "";
            if (!$this->HMG14->Raw) {
                $this->HMG14->CurrentValue = HtmlDecode($this->HMG14->CurrentValue);
            }
            $this->HMG14->EditValue = HtmlEncode($this->HMG14->CurrentValue);
            $this->HMG14->PlaceHolder = RemoveHtml($this->HMG14->caption());

            // HMG15
            $this->HMG15->EditAttrs["class"] = "form-control";
            $this->HMG15->EditCustomAttributes = "";
            if (!$this->HMG15->Raw) {
                $this->HMG15->CurrentValue = HtmlDecode($this->HMG15->CurrentValue);
            }
            $this->HMG15->EditValue = HtmlEncode($this->HMG15->CurrentValue);
            $this->HMG15->PlaceHolder = RemoveHtml($this->HMG15->caption());

            // HMG16
            $this->HMG16->EditAttrs["class"] = "form-control";
            $this->HMG16->EditCustomAttributes = "";
            if (!$this->HMG16->Raw) {
                $this->HMG16->CurrentValue = HtmlDecode($this->HMG16->CurrentValue);
            }
            $this->HMG16->EditValue = HtmlEncode($this->HMG16->CurrentValue);
            $this->HMG16->PlaceHolder = RemoveHtml($this->HMG16->caption());

            // HMG17
            $this->HMG17->EditAttrs["class"] = "form-control";
            $this->HMG17->EditCustomAttributes = "";
            if (!$this->HMG17->Raw) {
                $this->HMG17->CurrentValue = HtmlDecode($this->HMG17->CurrentValue);
            }
            $this->HMG17->EditValue = HtmlEncode($this->HMG17->CurrentValue);
            $this->HMG17->PlaceHolder = RemoveHtml($this->HMG17->caption());

            // HMG18
            $this->HMG18->EditAttrs["class"] = "form-control";
            $this->HMG18->EditCustomAttributes = "";
            if (!$this->HMG18->Raw) {
                $this->HMG18->CurrentValue = HtmlDecode($this->HMG18->CurrentValue);
            }
            $this->HMG18->EditValue = HtmlEncode($this->HMG18->CurrentValue);
            $this->HMG18->PlaceHolder = RemoveHtml($this->HMG18->caption());

            // HMG19
            $this->HMG19->EditAttrs["class"] = "form-control";
            $this->HMG19->EditCustomAttributes = "";
            if (!$this->HMG19->Raw) {
                $this->HMG19->CurrentValue = HtmlDecode($this->HMG19->CurrentValue);
            }
            $this->HMG19->EditValue = HtmlEncode($this->HMG19->CurrentValue);
            $this->HMG19->PlaceHolder = RemoveHtml($this->HMG19->caption());

            // HMG20
            $this->HMG20->EditAttrs["class"] = "form-control";
            $this->HMG20->EditCustomAttributes = "";
            if (!$this->HMG20->Raw) {
                $this->HMG20->CurrentValue = HtmlDecode($this->HMG20->CurrentValue);
            }
            $this->HMG20->EditValue = HtmlEncode($this->HMG20->CurrentValue);
            $this->HMG20->PlaceHolder = RemoveHtml($this->HMG20->caption());

            // HMG21
            $this->HMG21->EditAttrs["class"] = "form-control";
            $this->HMG21->EditCustomAttributes = "";
            if (!$this->HMG21->Raw) {
                $this->HMG21->CurrentValue = HtmlDecode($this->HMG21->CurrentValue);
            }
            $this->HMG21->EditValue = HtmlEncode($this->HMG21->CurrentValue);
            $this->HMG21->PlaceHolder = RemoveHtml($this->HMG21->caption());

            // HMG22
            $this->HMG22->EditAttrs["class"] = "form-control";
            $this->HMG22->EditCustomAttributes = "";
            if (!$this->HMG22->Raw) {
                $this->HMG22->CurrentValue = HtmlDecode($this->HMG22->CurrentValue);
            }
            $this->HMG22->EditValue = HtmlEncode($this->HMG22->CurrentValue);
            $this->HMG22->PlaceHolder = RemoveHtml($this->HMG22->caption());

            // HMG23
            $this->HMG23->EditAttrs["class"] = "form-control";
            $this->HMG23->EditCustomAttributes = "";
            if (!$this->HMG23->Raw) {
                $this->HMG23->CurrentValue = HtmlDecode($this->HMG23->CurrentValue);
            }
            $this->HMG23->EditValue = HtmlEncode($this->HMG23->CurrentValue);
            $this->HMG23->PlaceHolder = RemoveHtml($this->HMG23->caption());

            // HMG24
            $this->HMG24->EditAttrs["class"] = "form-control";
            $this->HMG24->EditCustomAttributes = "";
            if (!$this->HMG24->Raw) {
                $this->HMG24->CurrentValue = HtmlDecode($this->HMG24->CurrentValue);
            }
            $this->HMG24->EditValue = HtmlEncode($this->HMG24->CurrentValue);
            $this->HMG24->PlaceHolder = RemoveHtml($this->HMG24->caption());

            // HMG25
            $this->HMG25->EditAttrs["class"] = "form-control";
            $this->HMG25->EditCustomAttributes = "";
            if (!$this->HMG25->Raw) {
                $this->HMG25->CurrentValue = HtmlDecode($this->HMG25->CurrentValue);
            }
            $this->HMG25->EditValue = HtmlEncode($this->HMG25->CurrentValue);
            $this->HMG25->PlaceHolder = RemoveHtml($this->HMG25->caption());

            // GnRH14
            $this->GnRH14->EditAttrs["class"] = "form-control";
            $this->GnRH14->EditCustomAttributes = "";
            if (!$this->GnRH14->Raw) {
                $this->GnRH14->CurrentValue = HtmlDecode($this->GnRH14->CurrentValue);
            }
            $this->GnRH14->EditValue = HtmlEncode($this->GnRH14->CurrentValue);
            $this->GnRH14->PlaceHolder = RemoveHtml($this->GnRH14->caption());

            // GnRH15
            $this->GnRH15->EditAttrs["class"] = "form-control";
            $this->GnRH15->EditCustomAttributes = "";
            if (!$this->GnRH15->Raw) {
                $this->GnRH15->CurrentValue = HtmlDecode($this->GnRH15->CurrentValue);
            }
            $this->GnRH15->EditValue = HtmlEncode($this->GnRH15->CurrentValue);
            $this->GnRH15->PlaceHolder = RemoveHtml($this->GnRH15->caption());

            // GnRH16
            $this->GnRH16->EditAttrs["class"] = "form-control";
            $this->GnRH16->EditCustomAttributes = "";
            if (!$this->GnRH16->Raw) {
                $this->GnRH16->CurrentValue = HtmlDecode($this->GnRH16->CurrentValue);
            }
            $this->GnRH16->EditValue = HtmlEncode($this->GnRH16->CurrentValue);
            $this->GnRH16->PlaceHolder = RemoveHtml($this->GnRH16->caption());

            // GnRH17
            $this->GnRH17->EditAttrs["class"] = "form-control";
            $this->GnRH17->EditCustomAttributes = "";
            if (!$this->GnRH17->Raw) {
                $this->GnRH17->CurrentValue = HtmlDecode($this->GnRH17->CurrentValue);
            }
            $this->GnRH17->EditValue = HtmlEncode($this->GnRH17->CurrentValue);
            $this->GnRH17->PlaceHolder = RemoveHtml($this->GnRH17->caption());

            // GnRH18
            $this->GnRH18->EditAttrs["class"] = "form-control";
            $this->GnRH18->EditCustomAttributes = "";
            if (!$this->GnRH18->Raw) {
                $this->GnRH18->CurrentValue = HtmlDecode($this->GnRH18->CurrentValue);
            }
            $this->GnRH18->EditValue = HtmlEncode($this->GnRH18->CurrentValue);
            $this->GnRH18->PlaceHolder = RemoveHtml($this->GnRH18->caption());

            // GnRH19
            $this->GnRH19->EditAttrs["class"] = "form-control";
            $this->GnRH19->EditCustomAttributes = "";
            if (!$this->GnRH19->Raw) {
                $this->GnRH19->CurrentValue = HtmlDecode($this->GnRH19->CurrentValue);
            }
            $this->GnRH19->EditValue = HtmlEncode($this->GnRH19->CurrentValue);
            $this->GnRH19->PlaceHolder = RemoveHtml($this->GnRH19->caption());

            // GnRH20
            $this->GnRH20->EditAttrs["class"] = "form-control";
            $this->GnRH20->EditCustomAttributes = "";
            if (!$this->GnRH20->Raw) {
                $this->GnRH20->CurrentValue = HtmlDecode($this->GnRH20->CurrentValue);
            }
            $this->GnRH20->EditValue = HtmlEncode($this->GnRH20->CurrentValue);
            $this->GnRH20->PlaceHolder = RemoveHtml($this->GnRH20->caption());

            // GnRH21
            $this->GnRH21->EditAttrs["class"] = "form-control";
            $this->GnRH21->EditCustomAttributes = "";
            if (!$this->GnRH21->Raw) {
                $this->GnRH21->CurrentValue = HtmlDecode($this->GnRH21->CurrentValue);
            }
            $this->GnRH21->EditValue = HtmlEncode($this->GnRH21->CurrentValue);
            $this->GnRH21->PlaceHolder = RemoveHtml($this->GnRH21->caption());

            // GnRH22
            $this->GnRH22->EditAttrs["class"] = "form-control";
            $this->GnRH22->EditCustomAttributes = "";
            if (!$this->GnRH22->Raw) {
                $this->GnRH22->CurrentValue = HtmlDecode($this->GnRH22->CurrentValue);
            }
            $this->GnRH22->EditValue = HtmlEncode($this->GnRH22->CurrentValue);
            $this->GnRH22->PlaceHolder = RemoveHtml($this->GnRH22->caption());

            // GnRH23
            $this->GnRH23->EditAttrs["class"] = "form-control";
            $this->GnRH23->EditCustomAttributes = "";
            if (!$this->GnRH23->Raw) {
                $this->GnRH23->CurrentValue = HtmlDecode($this->GnRH23->CurrentValue);
            }
            $this->GnRH23->EditValue = HtmlEncode($this->GnRH23->CurrentValue);
            $this->GnRH23->PlaceHolder = RemoveHtml($this->GnRH23->caption());

            // GnRH24
            $this->GnRH24->EditAttrs["class"] = "form-control";
            $this->GnRH24->EditCustomAttributes = "";
            if (!$this->GnRH24->Raw) {
                $this->GnRH24->CurrentValue = HtmlDecode($this->GnRH24->CurrentValue);
            }
            $this->GnRH24->EditValue = HtmlEncode($this->GnRH24->CurrentValue);
            $this->GnRH24->PlaceHolder = RemoveHtml($this->GnRH24->caption());

            // GnRH25
            $this->GnRH25->EditAttrs["class"] = "form-control";
            $this->GnRH25->EditCustomAttributes = "";
            if (!$this->GnRH25->Raw) {
                $this->GnRH25->CurrentValue = HtmlDecode($this->GnRH25->CurrentValue);
            }
            $this->GnRH25->EditValue = HtmlEncode($this->GnRH25->CurrentValue);
            $this->GnRH25->PlaceHolder = RemoveHtml($this->GnRH25->caption());

            // P414
            $this->P414->EditAttrs["class"] = "form-control";
            $this->P414->EditCustomAttributes = "";
            if (!$this->P414->Raw) {
                $this->P414->CurrentValue = HtmlDecode($this->P414->CurrentValue);
            }
            $this->P414->EditValue = HtmlEncode($this->P414->CurrentValue);
            $this->P414->PlaceHolder = RemoveHtml($this->P414->caption());

            // P415
            $this->P415->EditAttrs["class"] = "form-control";
            $this->P415->EditCustomAttributes = "";
            if (!$this->P415->Raw) {
                $this->P415->CurrentValue = HtmlDecode($this->P415->CurrentValue);
            }
            $this->P415->EditValue = HtmlEncode($this->P415->CurrentValue);
            $this->P415->PlaceHolder = RemoveHtml($this->P415->caption());

            // P416
            $this->P416->EditAttrs["class"] = "form-control";
            $this->P416->EditCustomAttributes = "";
            if (!$this->P416->Raw) {
                $this->P416->CurrentValue = HtmlDecode($this->P416->CurrentValue);
            }
            $this->P416->EditValue = HtmlEncode($this->P416->CurrentValue);
            $this->P416->PlaceHolder = RemoveHtml($this->P416->caption());

            // P417
            $this->P417->EditAttrs["class"] = "form-control";
            $this->P417->EditCustomAttributes = "";
            if (!$this->P417->Raw) {
                $this->P417->CurrentValue = HtmlDecode($this->P417->CurrentValue);
            }
            $this->P417->EditValue = HtmlEncode($this->P417->CurrentValue);
            $this->P417->PlaceHolder = RemoveHtml($this->P417->caption());

            // P418
            $this->P418->EditAttrs["class"] = "form-control";
            $this->P418->EditCustomAttributes = "";
            if (!$this->P418->Raw) {
                $this->P418->CurrentValue = HtmlDecode($this->P418->CurrentValue);
            }
            $this->P418->EditValue = HtmlEncode($this->P418->CurrentValue);
            $this->P418->PlaceHolder = RemoveHtml($this->P418->caption());

            // P419
            $this->P419->EditAttrs["class"] = "form-control";
            $this->P419->EditCustomAttributes = "";
            if (!$this->P419->Raw) {
                $this->P419->CurrentValue = HtmlDecode($this->P419->CurrentValue);
            }
            $this->P419->EditValue = HtmlEncode($this->P419->CurrentValue);
            $this->P419->PlaceHolder = RemoveHtml($this->P419->caption());

            // P420
            $this->P420->EditAttrs["class"] = "form-control";
            $this->P420->EditCustomAttributes = "";
            if (!$this->P420->Raw) {
                $this->P420->CurrentValue = HtmlDecode($this->P420->CurrentValue);
            }
            $this->P420->EditValue = HtmlEncode($this->P420->CurrentValue);
            $this->P420->PlaceHolder = RemoveHtml($this->P420->caption());

            // P421
            $this->P421->EditAttrs["class"] = "form-control";
            $this->P421->EditCustomAttributes = "";
            if (!$this->P421->Raw) {
                $this->P421->CurrentValue = HtmlDecode($this->P421->CurrentValue);
            }
            $this->P421->EditValue = HtmlEncode($this->P421->CurrentValue);
            $this->P421->PlaceHolder = RemoveHtml($this->P421->caption());

            // P422
            $this->P422->EditAttrs["class"] = "form-control";
            $this->P422->EditCustomAttributes = "";
            if (!$this->P422->Raw) {
                $this->P422->CurrentValue = HtmlDecode($this->P422->CurrentValue);
            }
            $this->P422->EditValue = HtmlEncode($this->P422->CurrentValue);
            $this->P422->PlaceHolder = RemoveHtml($this->P422->caption());

            // P423
            $this->P423->EditAttrs["class"] = "form-control";
            $this->P423->EditCustomAttributes = "";
            if (!$this->P423->Raw) {
                $this->P423->CurrentValue = HtmlDecode($this->P423->CurrentValue);
            }
            $this->P423->EditValue = HtmlEncode($this->P423->CurrentValue);
            $this->P423->PlaceHolder = RemoveHtml($this->P423->caption());

            // P424
            $this->P424->EditAttrs["class"] = "form-control";
            $this->P424->EditCustomAttributes = "";
            if (!$this->P424->Raw) {
                $this->P424->CurrentValue = HtmlDecode($this->P424->CurrentValue);
            }
            $this->P424->EditValue = HtmlEncode($this->P424->CurrentValue);
            $this->P424->PlaceHolder = RemoveHtml($this->P424->caption());

            // P425
            $this->P425->EditAttrs["class"] = "form-control";
            $this->P425->EditCustomAttributes = "";
            if (!$this->P425->Raw) {
                $this->P425->CurrentValue = HtmlDecode($this->P425->CurrentValue);
            }
            $this->P425->EditValue = HtmlEncode($this->P425->CurrentValue);
            $this->P425->PlaceHolder = RemoveHtml($this->P425->caption());

            // USGRt14
            $this->USGRt14->EditAttrs["class"] = "form-control";
            $this->USGRt14->EditCustomAttributes = "";
            if (!$this->USGRt14->Raw) {
                $this->USGRt14->CurrentValue = HtmlDecode($this->USGRt14->CurrentValue);
            }
            $this->USGRt14->EditValue = HtmlEncode($this->USGRt14->CurrentValue);
            $this->USGRt14->PlaceHolder = RemoveHtml($this->USGRt14->caption());

            // USGRt15
            $this->USGRt15->EditAttrs["class"] = "form-control";
            $this->USGRt15->EditCustomAttributes = "";
            if (!$this->USGRt15->Raw) {
                $this->USGRt15->CurrentValue = HtmlDecode($this->USGRt15->CurrentValue);
            }
            $this->USGRt15->EditValue = HtmlEncode($this->USGRt15->CurrentValue);
            $this->USGRt15->PlaceHolder = RemoveHtml($this->USGRt15->caption());

            // USGRt16
            $this->USGRt16->EditAttrs["class"] = "form-control";
            $this->USGRt16->EditCustomAttributes = "";
            if (!$this->USGRt16->Raw) {
                $this->USGRt16->CurrentValue = HtmlDecode($this->USGRt16->CurrentValue);
            }
            $this->USGRt16->EditValue = HtmlEncode($this->USGRt16->CurrentValue);
            $this->USGRt16->PlaceHolder = RemoveHtml($this->USGRt16->caption());

            // USGRt17
            $this->USGRt17->EditAttrs["class"] = "form-control";
            $this->USGRt17->EditCustomAttributes = "";
            if (!$this->USGRt17->Raw) {
                $this->USGRt17->CurrentValue = HtmlDecode($this->USGRt17->CurrentValue);
            }
            $this->USGRt17->EditValue = HtmlEncode($this->USGRt17->CurrentValue);
            $this->USGRt17->PlaceHolder = RemoveHtml($this->USGRt17->caption());

            // USGRt18
            $this->USGRt18->EditAttrs["class"] = "form-control";
            $this->USGRt18->EditCustomAttributes = "";
            if (!$this->USGRt18->Raw) {
                $this->USGRt18->CurrentValue = HtmlDecode($this->USGRt18->CurrentValue);
            }
            $this->USGRt18->EditValue = HtmlEncode($this->USGRt18->CurrentValue);
            $this->USGRt18->PlaceHolder = RemoveHtml($this->USGRt18->caption());

            // USGRt19
            $this->USGRt19->EditAttrs["class"] = "form-control";
            $this->USGRt19->EditCustomAttributes = "";
            if (!$this->USGRt19->Raw) {
                $this->USGRt19->CurrentValue = HtmlDecode($this->USGRt19->CurrentValue);
            }
            $this->USGRt19->EditValue = HtmlEncode($this->USGRt19->CurrentValue);
            $this->USGRt19->PlaceHolder = RemoveHtml($this->USGRt19->caption());

            // USGRt20
            $this->USGRt20->EditAttrs["class"] = "form-control";
            $this->USGRt20->EditCustomAttributes = "";
            if (!$this->USGRt20->Raw) {
                $this->USGRt20->CurrentValue = HtmlDecode($this->USGRt20->CurrentValue);
            }
            $this->USGRt20->EditValue = HtmlEncode($this->USGRt20->CurrentValue);
            $this->USGRt20->PlaceHolder = RemoveHtml($this->USGRt20->caption());

            // USGRt21
            $this->USGRt21->EditAttrs["class"] = "form-control";
            $this->USGRt21->EditCustomAttributes = "";
            if (!$this->USGRt21->Raw) {
                $this->USGRt21->CurrentValue = HtmlDecode($this->USGRt21->CurrentValue);
            }
            $this->USGRt21->EditValue = HtmlEncode($this->USGRt21->CurrentValue);
            $this->USGRt21->PlaceHolder = RemoveHtml($this->USGRt21->caption());

            // USGRt22
            $this->USGRt22->EditAttrs["class"] = "form-control";
            $this->USGRt22->EditCustomAttributes = "";
            if (!$this->USGRt22->Raw) {
                $this->USGRt22->CurrentValue = HtmlDecode($this->USGRt22->CurrentValue);
            }
            $this->USGRt22->EditValue = HtmlEncode($this->USGRt22->CurrentValue);
            $this->USGRt22->PlaceHolder = RemoveHtml($this->USGRt22->caption());

            // USGRt23
            $this->USGRt23->EditAttrs["class"] = "form-control";
            $this->USGRt23->EditCustomAttributes = "";
            if (!$this->USGRt23->Raw) {
                $this->USGRt23->CurrentValue = HtmlDecode($this->USGRt23->CurrentValue);
            }
            $this->USGRt23->EditValue = HtmlEncode($this->USGRt23->CurrentValue);
            $this->USGRt23->PlaceHolder = RemoveHtml($this->USGRt23->caption());

            // USGRt24
            $this->USGRt24->EditAttrs["class"] = "form-control";
            $this->USGRt24->EditCustomAttributes = "";
            if (!$this->USGRt24->Raw) {
                $this->USGRt24->CurrentValue = HtmlDecode($this->USGRt24->CurrentValue);
            }
            $this->USGRt24->EditValue = HtmlEncode($this->USGRt24->CurrentValue);
            $this->USGRt24->PlaceHolder = RemoveHtml($this->USGRt24->caption());

            // USGRt25
            $this->USGRt25->EditAttrs["class"] = "form-control";
            $this->USGRt25->EditCustomAttributes = "";
            if (!$this->USGRt25->Raw) {
                $this->USGRt25->CurrentValue = HtmlDecode($this->USGRt25->CurrentValue);
            }
            $this->USGRt25->EditValue = HtmlEncode($this->USGRt25->CurrentValue);
            $this->USGRt25->PlaceHolder = RemoveHtml($this->USGRt25->caption());

            // USGLt14
            $this->USGLt14->EditAttrs["class"] = "form-control";
            $this->USGLt14->EditCustomAttributes = "";
            if (!$this->USGLt14->Raw) {
                $this->USGLt14->CurrentValue = HtmlDecode($this->USGLt14->CurrentValue);
            }
            $this->USGLt14->EditValue = HtmlEncode($this->USGLt14->CurrentValue);
            $this->USGLt14->PlaceHolder = RemoveHtml($this->USGLt14->caption());

            // USGLt15
            $this->USGLt15->EditAttrs["class"] = "form-control";
            $this->USGLt15->EditCustomAttributes = "";
            if (!$this->USGLt15->Raw) {
                $this->USGLt15->CurrentValue = HtmlDecode($this->USGLt15->CurrentValue);
            }
            $this->USGLt15->EditValue = HtmlEncode($this->USGLt15->CurrentValue);
            $this->USGLt15->PlaceHolder = RemoveHtml($this->USGLt15->caption());

            // USGLt16
            $this->USGLt16->EditAttrs["class"] = "form-control";
            $this->USGLt16->EditCustomAttributes = "";
            if (!$this->USGLt16->Raw) {
                $this->USGLt16->CurrentValue = HtmlDecode($this->USGLt16->CurrentValue);
            }
            $this->USGLt16->EditValue = HtmlEncode($this->USGLt16->CurrentValue);
            $this->USGLt16->PlaceHolder = RemoveHtml($this->USGLt16->caption());

            // USGLt17
            $this->USGLt17->EditAttrs["class"] = "form-control";
            $this->USGLt17->EditCustomAttributes = "";
            if (!$this->USGLt17->Raw) {
                $this->USGLt17->CurrentValue = HtmlDecode($this->USGLt17->CurrentValue);
            }
            $this->USGLt17->EditValue = HtmlEncode($this->USGLt17->CurrentValue);
            $this->USGLt17->PlaceHolder = RemoveHtml($this->USGLt17->caption());

            // USGLt18
            $this->USGLt18->EditAttrs["class"] = "form-control";
            $this->USGLt18->EditCustomAttributes = "";
            if (!$this->USGLt18->Raw) {
                $this->USGLt18->CurrentValue = HtmlDecode($this->USGLt18->CurrentValue);
            }
            $this->USGLt18->EditValue = HtmlEncode($this->USGLt18->CurrentValue);
            $this->USGLt18->PlaceHolder = RemoveHtml($this->USGLt18->caption());

            // USGLt19
            $this->USGLt19->EditAttrs["class"] = "form-control";
            $this->USGLt19->EditCustomAttributes = "";
            if (!$this->USGLt19->Raw) {
                $this->USGLt19->CurrentValue = HtmlDecode($this->USGLt19->CurrentValue);
            }
            $this->USGLt19->EditValue = HtmlEncode($this->USGLt19->CurrentValue);
            $this->USGLt19->PlaceHolder = RemoveHtml($this->USGLt19->caption());

            // USGLt20
            $this->USGLt20->EditAttrs["class"] = "form-control";
            $this->USGLt20->EditCustomAttributes = "";
            if (!$this->USGLt20->Raw) {
                $this->USGLt20->CurrentValue = HtmlDecode($this->USGLt20->CurrentValue);
            }
            $this->USGLt20->EditValue = HtmlEncode($this->USGLt20->CurrentValue);
            $this->USGLt20->PlaceHolder = RemoveHtml($this->USGLt20->caption());

            // USGLt21
            $this->USGLt21->EditAttrs["class"] = "form-control";
            $this->USGLt21->EditCustomAttributes = "";
            if (!$this->USGLt21->Raw) {
                $this->USGLt21->CurrentValue = HtmlDecode($this->USGLt21->CurrentValue);
            }
            $this->USGLt21->EditValue = HtmlEncode($this->USGLt21->CurrentValue);
            $this->USGLt21->PlaceHolder = RemoveHtml($this->USGLt21->caption());

            // USGLt22
            $this->USGLt22->EditAttrs["class"] = "form-control";
            $this->USGLt22->EditCustomAttributes = "";
            if (!$this->USGLt22->Raw) {
                $this->USGLt22->CurrentValue = HtmlDecode($this->USGLt22->CurrentValue);
            }
            $this->USGLt22->EditValue = HtmlEncode($this->USGLt22->CurrentValue);
            $this->USGLt22->PlaceHolder = RemoveHtml($this->USGLt22->caption());

            // USGLt23
            $this->USGLt23->EditAttrs["class"] = "form-control";
            $this->USGLt23->EditCustomAttributes = "";
            if (!$this->USGLt23->Raw) {
                $this->USGLt23->CurrentValue = HtmlDecode($this->USGLt23->CurrentValue);
            }
            $this->USGLt23->EditValue = HtmlEncode($this->USGLt23->CurrentValue);
            $this->USGLt23->PlaceHolder = RemoveHtml($this->USGLt23->caption());

            // USGLt24
            $this->USGLt24->EditAttrs["class"] = "form-control";
            $this->USGLt24->EditCustomAttributes = "";
            if (!$this->USGLt24->Raw) {
                $this->USGLt24->CurrentValue = HtmlDecode($this->USGLt24->CurrentValue);
            }
            $this->USGLt24->EditValue = HtmlEncode($this->USGLt24->CurrentValue);
            $this->USGLt24->PlaceHolder = RemoveHtml($this->USGLt24->caption());

            // USGLt25
            $this->USGLt25->EditAttrs["class"] = "form-control";
            $this->USGLt25->EditCustomAttributes = "";
            if (!$this->USGLt25->Raw) {
                $this->USGLt25->CurrentValue = HtmlDecode($this->USGLt25->CurrentValue);
            }
            $this->USGLt25->EditValue = HtmlEncode($this->USGLt25->CurrentValue);
            $this->USGLt25->PlaceHolder = RemoveHtml($this->USGLt25->caption());

            // EM14
            $this->EM14->EditAttrs["class"] = "form-control";
            $this->EM14->EditCustomAttributes = "";
            if (!$this->EM14->Raw) {
                $this->EM14->CurrentValue = HtmlDecode($this->EM14->CurrentValue);
            }
            $this->EM14->EditValue = HtmlEncode($this->EM14->CurrentValue);
            $this->EM14->PlaceHolder = RemoveHtml($this->EM14->caption());

            // EM15
            $this->EM15->EditAttrs["class"] = "form-control";
            $this->EM15->EditCustomAttributes = "";
            if (!$this->EM15->Raw) {
                $this->EM15->CurrentValue = HtmlDecode($this->EM15->CurrentValue);
            }
            $this->EM15->EditValue = HtmlEncode($this->EM15->CurrentValue);
            $this->EM15->PlaceHolder = RemoveHtml($this->EM15->caption());

            // EM16
            $this->EM16->EditAttrs["class"] = "form-control";
            $this->EM16->EditCustomAttributes = "";
            if (!$this->EM16->Raw) {
                $this->EM16->CurrentValue = HtmlDecode($this->EM16->CurrentValue);
            }
            $this->EM16->EditValue = HtmlEncode($this->EM16->CurrentValue);
            $this->EM16->PlaceHolder = RemoveHtml($this->EM16->caption());

            // EM17
            $this->EM17->EditAttrs["class"] = "form-control";
            $this->EM17->EditCustomAttributes = "";
            if (!$this->EM17->Raw) {
                $this->EM17->CurrentValue = HtmlDecode($this->EM17->CurrentValue);
            }
            $this->EM17->EditValue = HtmlEncode($this->EM17->CurrentValue);
            $this->EM17->PlaceHolder = RemoveHtml($this->EM17->caption());

            // EM18
            $this->EM18->EditAttrs["class"] = "form-control";
            $this->EM18->EditCustomAttributes = "";
            if (!$this->EM18->Raw) {
                $this->EM18->CurrentValue = HtmlDecode($this->EM18->CurrentValue);
            }
            $this->EM18->EditValue = HtmlEncode($this->EM18->CurrentValue);
            $this->EM18->PlaceHolder = RemoveHtml($this->EM18->caption());

            // EM19
            $this->EM19->EditAttrs["class"] = "form-control";
            $this->EM19->EditCustomAttributes = "";
            if (!$this->EM19->Raw) {
                $this->EM19->CurrentValue = HtmlDecode($this->EM19->CurrentValue);
            }
            $this->EM19->EditValue = HtmlEncode($this->EM19->CurrentValue);
            $this->EM19->PlaceHolder = RemoveHtml($this->EM19->caption());

            // EM20
            $this->EM20->EditAttrs["class"] = "form-control";
            $this->EM20->EditCustomAttributes = "";
            if (!$this->EM20->Raw) {
                $this->EM20->CurrentValue = HtmlDecode($this->EM20->CurrentValue);
            }
            $this->EM20->EditValue = HtmlEncode($this->EM20->CurrentValue);
            $this->EM20->PlaceHolder = RemoveHtml($this->EM20->caption());

            // EM21
            $this->EM21->EditAttrs["class"] = "form-control";
            $this->EM21->EditCustomAttributes = "";
            if (!$this->EM21->Raw) {
                $this->EM21->CurrentValue = HtmlDecode($this->EM21->CurrentValue);
            }
            $this->EM21->EditValue = HtmlEncode($this->EM21->CurrentValue);
            $this->EM21->PlaceHolder = RemoveHtml($this->EM21->caption());

            // EM22
            $this->EM22->EditAttrs["class"] = "form-control";
            $this->EM22->EditCustomAttributes = "";
            if (!$this->EM22->Raw) {
                $this->EM22->CurrentValue = HtmlDecode($this->EM22->CurrentValue);
            }
            $this->EM22->EditValue = HtmlEncode($this->EM22->CurrentValue);
            $this->EM22->PlaceHolder = RemoveHtml($this->EM22->caption());

            // EM23
            $this->EM23->EditAttrs["class"] = "form-control";
            $this->EM23->EditCustomAttributes = "";
            if (!$this->EM23->Raw) {
                $this->EM23->CurrentValue = HtmlDecode($this->EM23->CurrentValue);
            }
            $this->EM23->EditValue = HtmlEncode($this->EM23->CurrentValue);
            $this->EM23->PlaceHolder = RemoveHtml($this->EM23->caption());

            // EM24
            $this->EM24->EditAttrs["class"] = "form-control";
            $this->EM24->EditCustomAttributes = "";
            if (!$this->EM24->Raw) {
                $this->EM24->CurrentValue = HtmlDecode($this->EM24->CurrentValue);
            }
            $this->EM24->EditValue = HtmlEncode($this->EM24->CurrentValue);
            $this->EM24->PlaceHolder = RemoveHtml($this->EM24->caption());

            // EM25
            $this->EM25->EditAttrs["class"] = "form-control";
            $this->EM25->EditCustomAttributes = "";
            if (!$this->EM25->Raw) {
                $this->EM25->CurrentValue = HtmlDecode($this->EM25->CurrentValue);
            }
            $this->EM25->EditValue = HtmlEncode($this->EM25->CurrentValue);
            $this->EM25->PlaceHolder = RemoveHtml($this->EM25->caption());

            // Others14
            $this->Others14->EditAttrs["class"] = "form-control";
            $this->Others14->EditCustomAttributes = "";
            if (!$this->Others14->Raw) {
                $this->Others14->CurrentValue = HtmlDecode($this->Others14->CurrentValue);
            }
            $this->Others14->EditValue = HtmlEncode($this->Others14->CurrentValue);
            $this->Others14->PlaceHolder = RemoveHtml($this->Others14->caption());

            // Others15
            $this->Others15->EditAttrs["class"] = "form-control";
            $this->Others15->EditCustomAttributes = "";
            if (!$this->Others15->Raw) {
                $this->Others15->CurrentValue = HtmlDecode($this->Others15->CurrentValue);
            }
            $this->Others15->EditValue = HtmlEncode($this->Others15->CurrentValue);
            $this->Others15->PlaceHolder = RemoveHtml($this->Others15->caption());

            // Others16
            $this->Others16->EditAttrs["class"] = "form-control";
            $this->Others16->EditCustomAttributes = "";
            if (!$this->Others16->Raw) {
                $this->Others16->CurrentValue = HtmlDecode($this->Others16->CurrentValue);
            }
            $this->Others16->EditValue = HtmlEncode($this->Others16->CurrentValue);
            $this->Others16->PlaceHolder = RemoveHtml($this->Others16->caption());

            // Others17
            $this->Others17->EditAttrs["class"] = "form-control";
            $this->Others17->EditCustomAttributes = "";
            if (!$this->Others17->Raw) {
                $this->Others17->CurrentValue = HtmlDecode($this->Others17->CurrentValue);
            }
            $this->Others17->EditValue = HtmlEncode($this->Others17->CurrentValue);
            $this->Others17->PlaceHolder = RemoveHtml($this->Others17->caption());

            // Others18
            $this->Others18->EditAttrs["class"] = "form-control";
            $this->Others18->EditCustomAttributes = "";
            if (!$this->Others18->Raw) {
                $this->Others18->CurrentValue = HtmlDecode($this->Others18->CurrentValue);
            }
            $this->Others18->EditValue = HtmlEncode($this->Others18->CurrentValue);
            $this->Others18->PlaceHolder = RemoveHtml($this->Others18->caption());

            // Others19
            $this->Others19->EditAttrs["class"] = "form-control";
            $this->Others19->EditCustomAttributes = "";
            if (!$this->Others19->Raw) {
                $this->Others19->CurrentValue = HtmlDecode($this->Others19->CurrentValue);
            }
            $this->Others19->EditValue = HtmlEncode($this->Others19->CurrentValue);
            $this->Others19->PlaceHolder = RemoveHtml($this->Others19->caption());

            // Others20
            $this->Others20->EditAttrs["class"] = "form-control";
            $this->Others20->EditCustomAttributes = "";
            if (!$this->Others20->Raw) {
                $this->Others20->CurrentValue = HtmlDecode($this->Others20->CurrentValue);
            }
            $this->Others20->EditValue = HtmlEncode($this->Others20->CurrentValue);
            $this->Others20->PlaceHolder = RemoveHtml($this->Others20->caption());

            // Others21
            $this->Others21->EditAttrs["class"] = "form-control";
            $this->Others21->EditCustomAttributes = "";
            if (!$this->Others21->Raw) {
                $this->Others21->CurrentValue = HtmlDecode($this->Others21->CurrentValue);
            }
            $this->Others21->EditValue = HtmlEncode($this->Others21->CurrentValue);
            $this->Others21->PlaceHolder = RemoveHtml($this->Others21->caption());

            // Others22
            $this->Others22->EditAttrs["class"] = "form-control";
            $this->Others22->EditCustomAttributes = "";
            if (!$this->Others22->Raw) {
                $this->Others22->CurrentValue = HtmlDecode($this->Others22->CurrentValue);
            }
            $this->Others22->EditValue = HtmlEncode($this->Others22->CurrentValue);
            $this->Others22->PlaceHolder = RemoveHtml($this->Others22->caption());

            // Others23
            $this->Others23->EditAttrs["class"] = "form-control";
            $this->Others23->EditCustomAttributes = "";
            if (!$this->Others23->Raw) {
                $this->Others23->CurrentValue = HtmlDecode($this->Others23->CurrentValue);
            }
            $this->Others23->EditValue = HtmlEncode($this->Others23->CurrentValue);
            $this->Others23->PlaceHolder = RemoveHtml($this->Others23->caption());

            // Others24
            $this->Others24->EditAttrs["class"] = "form-control";
            $this->Others24->EditCustomAttributes = "";
            if (!$this->Others24->Raw) {
                $this->Others24->CurrentValue = HtmlDecode($this->Others24->CurrentValue);
            }
            $this->Others24->EditValue = HtmlEncode($this->Others24->CurrentValue);
            $this->Others24->PlaceHolder = RemoveHtml($this->Others24->caption());

            // Others25
            $this->Others25->EditAttrs["class"] = "form-control";
            $this->Others25->EditCustomAttributes = "";
            if (!$this->Others25->Raw) {
                $this->Others25->CurrentValue = HtmlDecode($this->Others25->CurrentValue);
            }
            $this->Others25->EditValue = HtmlEncode($this->Others25->CurrentValue);
            $this->Others25->PlaceHolder = RemoveHtml($this->Others25->caption());

            // DR14
            $this->DR14->EditAttrs["class"] = "form-control";
            $this->DR14->EditCustomAttributes = "";
            if (!$this->DR14->Raw) {
                $this->DR14->CurrentValue = HtmlDecode($this->DR14->CurrentValue);
            }
            $this->DR14->EditValue = HtmlEncode($this->DR14->CurrentValue);
            $this->DR14->PlaceHolder = RemoveHtml($this->DR14->caption());

            // DR15
            $this->DR15->EditAttrs["class"] = "form-control";
            $this->DR15->EditCustomAttributes = "";
            if (!$this->DR15->Raw) {
                $this->DR15->CurrentValue = HtmlDecode($this->DR15->CurrentValue);
            }
            $this->DR15->EditValue = HtmlEncode($this->DR15->CurrentValue);
            $this->DR15->PlaceHolder = RemoveHtml($this->DR15->caption());

            // DR16
            $this->DR16->EditAttrs["class"] = "form-control";
            $this->DR16->EditCustomAttributes = "";
            if (!$this->DR16->Raw) {
                $this->DR16->CurrentValue = HtmlDecode($this->DR16->CurrentValue);
            }
            $this->DR16->EditValue = HtmlEncode($this->DR16->CurrentValue);
            $this->DR16->PlaceHolder = RemoveHtml($this->DR16->caption());

            // DR17
            $this->DR17->EditAttrs["class"] = "form-control";
            $this->DR17->EditCustomAttributes = "";
            if (!$this->DR17->Raw) {
                $this->DR17->CurrentValue = HtmlDecode($this->DR17->CurrentValue);
            }
            $this->DR17->EditValue = HtmlEncode($this->DR17->CurrentValue);
            $this->DR17->PlaceHolder = RemoveHtml($this->DR17->caption());

            // DR18
            $this->DR18->EditAttrs["class"] = "form-control";
            $this->DR18->EditCustomAttributes = "";
            if (!$this->DR18->Raw) {
                $this->DR18->CurrentValue = HtmlDecode($this->DR18->CurrentValue);
            }
            $this->DR18->EditValue = HtmlEncode($this->DR18->CurrentValue);
            $this->DR18->PlaceHolder = RemoveHtml($this->DR18->caption());

            // DR19
            $this->DR19->EditAttrs["class"] = "form-control";
            $this->DR19->EditCustomAttributes = "";
            if (!$this->DR19->Raw) {
                $this->DR19->CurrentValue = HtmlDecode($this->DR19->CurrentValue);
            }
            $this->DR19->EditValue = HtmlEncode($this->DR19->CurrentValue);
            $this->DR19->PlaceHolder = RemoveHtml($this->DR19->caption());

            // DR20
            $this->DR20->EditAttrs["class"] = "form-control";
            $this->DR20->EditCustomAttributes = "";
            if (!$this->DR20->Raw) {
                $this->DR20->CurrentValue = HtmlDecode($this->DR20->CurrentValue);
            }
            $this->DR20->EditValue = HtmlEncode($this->DR20->CurrentValue);
            $this->DR20->PlaceHolder = RemoveHtml($this->DR20->caption());

            // DR21
            $this->DR21->EditAttrs["class"] = "form-control";
            $this->DR21->EditCustomAttributes = "";
            if (!$this->DR21->Raw) {
                $this->DR21->CurrentValue = HtmlDecode($this->DR21->CurrentValue);
            }
            $this->DR21->EditValue = HtmlEncode($this->DR21->CurrentValue);
            $this->DR21->PlaceHolder = RemoveHtml($this->DR21->caption());

            // DR22
            $this->DR22->EditAttrs["class"] = "form-control";
            $this->DR22->EditCustomAttributes = "";
            if (!$this->DR22->Raw) {
                $this->DR22->CurrentValue = HtmlDecode($this->DR22->CurrentValue);
            }
            $this->DR22->EditValue = HtmlEncode($this->DR22->CurrentValue);
            $this->DR22->PlaceHolder = RemoveHtml($this->DR22->caption());

            // DR23
            $this->DR23->EditAttrs["class"] = "form-control";
            $this->DR23->EditCustomAttributes = "";
            if (!$this->DR23->Raw) {
                $this->DR23->CurrentValue = HtmlDecode($this->DR23->CurrentValue);
            }
            $this->DR23->EditValue = HtmlEncode($this->DR23->CurrentValue);
            $this->DR23->PlaceHolder = RemoveHtml($this->DR23->caption());

            // DR24
            $this->DR24->EditAttrs["class"] = "form-control";
            $this->DR24->EditCustomAttributes = "";
            if (!$this->DR24->Raw) {
                $this->DR24->CurrentValue = HtmlDecode($this->DR24->CurrentValue);
            }
            $this->DR24->EditValue = HtmlEncode($this->DR24->CurrentValue);
            $this->DR24->PlaceHolder = RemoveHtml($this->DR24->caption());

            // DR25
            $this->DR25->EditAttrs["class"] = "form-control";
            $this->DR25->EditCustomAttributes = "";
            if (!$this->DR25->Raw) {
                $this->DR25->CurrentValue = HtmlDecode($this->DR25->CurrentValue);
            }
            $this->DR25->EditValue = HtmlEncode($this->DR25->CurrentValue);
            $this->DR25->PlaceHolder = RemoveHtml($this->DR25->caption());

            // E214
            $this->E214->EditAttrs["class"] = "form-control";
            $this->E214->EditCustomAttributes = "";
            if (!$this->E214->Raw) {
                $this->E214->CurrentValue = HtmlDecode($this->E214->CurrentValue);
            }
            $this->E214->EditValue = HtmlEncode($this->E214->CurrentValue);
            $this->E214->PlaceHolder = RemoveHtml($this->E214->caption());

            // E215
            $this->E215->EditAttrs["class"] = "form-control";
            $this->E215->EditCustomAttributes = "";
            if (!$this->E215->Raw) {
                $this->E215->CurrentValue = HtmlDecode($this->E215->CurrentValue);
            }
            $this->E215->EditValue = HtmlEncode($this->E215->CurrentValue);
            $this->E215->PlaceHolder = RemoveHtml($this->E215->caption());

            // E216
            $this->E216->EditAttrs["class"] = "form-control";
            $this->E216->EditCustomAttributes = "";
            if (!$this->E216->Raw) {
                $this->E216->CurrentValue = HtmlDecode($this->E216->CurrentValue);
            }
            $this->E216->EditValue = HtmlEncode($this->E216->CurrentValue);
            $this->E216->PlaceHolder = RemoveHtml($this->E216->caption());

            // E217
            $this->E217->EditAttrs["class"] = "form-control";
            $this->E217->EditCustomAttributes = "";
            if (!$this->E217->Raw) {
                $this->E217->CurrentValue = HtmlDecode($this->E217->CurrentValue);
            }
            $this->E217->EditValue = HtmlEncode($this->E217->CurrentValue);
            $this->E217->PlaceHolder = RemoveHtml($this->E217->caption());

            // E218
            $this->E218->EditAttrs["class"] = "form-control";
            $this->E218->EditCustomAttributes = "";
            if (!$this->E218->Raw) {
                $this->E218->CurrentValue = HtmlDecode($this->E218->CurrentValue);
            }
            $this->E218->EditValue = HtmlEncode($this->E218->CurrentValue);
            $this->E218->PlaceHolder = RemoveHtml($this->E218->caption());

            // E219
            $this->E219->EditAttrs["class"] = "form-control";
            $this->E219->EditCustomAttributes = "";
            if (!$this->E219->Raw) {
                $this->E219->CurrentValue = HtmlDecode($this->E219->CurrentValue);
            }
            $this->E219->EditValue = HtmlEncode($this->E219->CurrentValue);
            $this->E219->PlaceHolder = RemoveHtml($this->E219->caption());

            // E220
            $this->E220->EditAttrs["class"] = "form-control";
            $this->E220->EditCustomAttributes = "";
            if (!$this->E220->Raw) {
                $this->E220->CurrentValue = HtmlDecode($this->E220->CurrentValue);
            }
            $this->E220->EditValue = HtmlEncode($this->E220->CurrentValue);
            $this->E220->PlaceHolder = RemoveHtml($this->E220->caption());

            // E221
            $this->E221->EditAttrs["class"] = "form-control";
            $this->E221->EditCustomAttributes = "";
            if (!$this->E221->Raw) {
                $this->E221->CurrentValue = HtmlDecode($this->E221->CurrentValue);
            }
            $this->E221->EditValue = HtmlEncode($this->E221->CurrentValue);
            $this->E221->PlaceHolder = RemoveHtml($this->E221->caption());

            // E222
            $this->E222->EditAttrs["class"] = "form-control";
            $this->E222->EditCustomAttributes = "";
            if (!$this->E222->Raw) {
                $this->E222->CurrentValue = HtmlDecode($this->E222->CurrentValue);
            }
            $this->E222->EditValue = HtmlEncode($this->E222->CurrentValue);
            $this->E222->PlaceHolder = RemoveHtml($this->E222->caption());

            // E223
            $this->E223->EditAttrs["class"] = "form-control";
            $this->E223->EditCustomAttributes = "";
            if (!$this->E223->Raw) {
                $this->E223->CurrentValue = HtmlDecode($this->E223->CurrentValue);
            }
            $this->E223->EditValue = HtmlEncode($this->E223->CurrentValue);
            $this->E223->PlaceHolder = RemoveHtml($this->E223->caption());

            // E224
            $this->E224->EditAttrs["class"] = "form-control";
            $this->E224->EditCustomAttributes = "";
            if (!$this->E224->Raw) {
                $this->E224->CurrentValue = HtmlDecode($this->E224->CurrentValue);
            }
            $this->E224->EditValue = HtmlEncode($this->E224->CurrentValue);
            $this->E224->PlaceHolder = RemoveHtml($this->E224->caption());

            // E225
            $this->E225->EditAttrs["class"] = "form-control";
            $this->E225->EditCustomAttributes = "";
            if (!$this->E225->Raw) {
                $this->E225->CurrentValue = HtmlDecode($this->E225->CurrentValue);
            }
            $this->E225->EditValue = HtmlEncode($this->E225->CurrentValue);
            $this->E225->PlaceHolder = RemoveHtml($this->E225->caption());

            // EEETTTDTE
            $this->EEETTTDTE->EditAttrs["class"] = "form-control";
            $this->EEETTTDTE->EditCustomAttributes = "";
            $this->EEETTTDTE->EditValue = HtmlEncode(FormatDateTime($this->EEETTTDTE->CurrentValue, 8));
            $this->EEETTTDTE->PlaceHolder = RemoveHtml($this->EEETTTDTE->caption());

            // bhcgdate
            $this->bhcgdate->EditAttrs["class"] = "form-control";
            $this->bhcgdate->EditCustomAttributes = "";
            $this->bhcgdate->EditValue = HtmlEncode(FormatDateTime($this->bhcgdate->CurrentValue, 8));
            $this->bhcgdate->PlaceHolder = RemoveHtml($this->bhcgdate->caption());

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
            $this->TUBAL_PATENCY->EditCustomAttributes = "";
            if (!$this->TUBAL_PATENCY->Raw) {
                $this->TUBAL_PATENCY->CurrentValue = HtmlDecode($this->TUBAL_PATENCY->CurrentValue);
            }
            $this->TUBAL_PATENCY->EditValue = HtmlEncode($this->TUBAL_PATENCY->CurrentValue);
            $this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

            // HSG
            $this->HSG->EditAttrs["class"] = "form-control";
            $this->HSG->EditCustomAttributes = "";
            if (!$this->HSG->Raw) {
                $this->HSG->CurrentValue = HtmlDecode($this->HSG->CurrentValue);
            }
            $this->HSG->EditValue = HtmlEncode($this->HSG->CurrentValue);
            $this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

            // DHL
            $this->DHL->EditAttrs["class"] = "form-control";
            $this->DHL->EditCustomAttributes = "";
            if (!$this->DHL->Raw) {
                $this->DHL->CurrentValue = HtmlDecode($this->DHL->CurrentValue);
            }
            $this->DHL->EditValue = HtmlEncode($this->DHL->CurrentValue);
            $this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->UTERINE_PROBLEMS->EditCustomAttributes = "";
            if (!$this->UTERINE_PROBLEMS->Raw) {
                $this->UTERINE_PROBLEMS->CurrentValue = HtmlDecode($this->UTERINE_PROBLEMS->CurrentValue);
            }
            $this->UTERINE_PROBLEMS->EditValue = HtmlEncode($this->UTERINE_PROBLEMS->CurrentValue);
            $this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

            // W_COMORBIDS
            $this->W_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->W_COMORBIDS->EditCustomAttributes = "";
            if (!$this->W_COMORBIDS->Raw) {
                $this->W_COMORBIDS->CurrentValue = HtmlDecode($this->W_COMORBIDS->CurrentValue);
            }
            $this->W_COMORBIDS->EditValue = HtmlEncode($this->W_COMORBIDS->CurrentValue);
            $this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

            // H_COMORBIDS
            $this->H_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->H_COMORBIDS->EditCustomAttributes = "";
            if (!$this->H_COMORBIDS->Raw) {
                $this->H_COMORBIDS->CurrentValue = HtmlDecode($this->H_COMORBIDS->CurrentValue);
            }
            $this->H_COMORBIDS->EditValue = HtmlEncode($this->H_COMORBIDS->CurrentValue);
            $this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
            $this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
            if (!$this->SEXUAL_DYSFUNCTION->Raw) {
                $this->SEXUAL_DYSFUNCTION->CurrentValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->CurrentValue);
            }
            $this->SEXUAL_DYSFUNCTION->EditValue = HtmlEncode($this->SEXUAL_DYSFUNCTION->CurrentValue);
            $this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

            // TABLETS
            $this->TABLETS->EditAttrs["class"] = "form-control";
            $this->TABLETS->EditCustomAttributes = "";
            if (!$this->TABLETS->Raw) {
                $this->TABLETS->CurrentValue = HtmlDecode($this->TABLETS->CurrentValue);
            }
            $this->TABLETS->EditValue = HtmlEncode($this->TABLETS->CurrentValue);
            $this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
            $this->FOLLICLE_STATUS->EditCustomAttributes = "";
            if (!$this->FOLLICLE_STATUS->Raw) {
                $this->FOLLICLE_STATUS->CurrentValue = HtmlDecode($this->FOLLICLE_STATUS->CurrentValue);
            }
            $this->FOLLICLE_STATUS->EditValue = HtmlEncode($this->FOLLICLE_STATUS->CurrentValue);
            $this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
            $this->NUMBER_OF_IUI->EditCustomAttributes = "";
            if (!$this->NUMBER_OF_IUI->Raw) {
                $this->NUMBER_OF_IUI->CurrentValue = HtmlDecode($this->NUMBER_OF_IUI->CurrentValue);
            }
            $this->NUMBER_OF_IUI->EditValue = HtmlEncode($this->NUMBER_OF_IUI->CurrentValue);
            $this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

            // PROCEDURE
            $this->PROCEDURE->EditAttrs["class"] = "form-control";
            $this->PROCEDURE->EditCustomAttributes = "";
            if (!$this->PROCEDURE->Raw) {
                $this->PROCEDURE->CurrentValue = HtmlDecode($this->PROCEDURE->CurrentValue);
            }
            $this->PROCEDURE->EditValue = HtmlEncode($this->PROCEDURE->CurrentValue);
            $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
            $this->LUTEAL_SUPPORT->EditCustomAttributes = "";
            if (!$this->LUTEAL_SUPPORT->Raw) {
                $this->LUTEAL_SUPPORT->CurrentValue = HtmlDecode($this->LUTEAL_SUPPORT->CurrentValue);
            }
            $this->LUTEAL_SUPPORT->EditValue = HtmlEncode($this->LUTEAL_SUPPORT->CurrentValue);
            $this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
            if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
            }
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
            $this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

            // ONGOING_PREG
            $this->ONGOING_PREG->EditAttrs["class"] = "form-control";
            $this->ONGOING_PREG->EditCustomAttributes = "";
            if (!$this->ONGOING_PREG->Raw) {
                $this->ONGOING_PREG->CurrentValue = HtmlDecode($this->ONGOING_PREG->CurrentValue);
            }
            $this->ONGOING_PREG->EditValue = HtmlEncode($this->ONGOING_PREG->CurrentValue);
            $this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

            // EDD_Date
            $this->EDD_Date->EditAttrs["class"] = "form-control";
            $this->EDD_Date->EditCustomAttributes = "";
            $this->EDD_Date->EditValue = HtmlEncode(FormatDateTime($this->EDD_Date->CurrentValue, 8));
            $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());

            // Add refer script

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";

            // FemaleFactor
            $this->FemaleFactor->LinkCustomAttributes = "";
            $this->FemaleFactor->HrefValue = "";

            // MaleFactor
            $this->MaleFactor->LinkCustomAttributes = "";
            $this->MaleFactor->HrefValue = "";

            // Protocol
            $this->Protocol->LinkCustomAttributes = "";
            $this->Protocol->HrefValue = "";

            // SemenFrozen
            $this->SemenFrozen->LinkCustomAttributes = "";
            $this->SemenFrozen->HrefValue = "";

            // A4ICSICycle
            $this->A4ICSICycle->LinkCustomAttributes = "";
            $this->A4ICSICycle->HrefValue = "";

            // TotalICSICycle
            $this->TotalICSICycle->LinkCustomAttributes = "";
            $this->TotalICSICycle->HrefValue = "";

            // TypeOfInfertility
            $this->TypeOfInfertility->LinkCustomAttributes = "";
            $this->TypeOfInfertility->HrefValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";

            // RelevantHistory
            $this->RelevantHistory->LinkCustomAttributes = "";
            $this->RelevantHistory->HrefValue = "";

            // IUICycles
            $this->IUICycles->LinkCustomAttributes = "";
            $this->IUICycles->HrefValue = "";

            // AFC
            $this->AFC->LinkCustomAttributes = "";
            $this->AFC->HrefValue = "";

            // AMH
            $this->AMH->LinkCustomAttributes = "";
            $this->AMH->HrefValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";

            // MBMI
            $this->MBMI->LinkCustomAttributes = "";
            $this->MBMI->HrefValue = "";

            // OvarianVolumeRT
            $this->OvarianVolumeRT->LinkCustomAttributes = "";
            $this->OvarianVolumeRT->HrefValue = "";

            // OvarianVolumeLT
            $this->OvarianVolumeLT->LinkCustomAttributes = "";
            $this->OvarianVolumeLT->HrefValue = "";

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
            $this->DAYSOFSTIMULATION->HrefValue = "";

            // DOSEOFGONADOTROPINS
            $this->DOSEOFGONADOTROPINS->LinkCustomAttributes = "";
            $this->DOSEOFGONADOTROPINS->HrefValue = "";

            // INJTYPE
            $this->INJTYPE->LinkCustomAttributes = "";
            $this->INJTYPE->HrefValue = "";

            // ANTAGONISTDAYS
            $this->ANTAGONISTDAYS->LinkCustomAttributes = "";
            $this->ANTAGONISTDAYS->HrefValue = "";

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
            $this->ANTAGONISTSTARTDAY->HrefValue = "";

            // GROWTHHORMONE
            $this->GROWTHHORMONE->LinkCustomAttributes = "";
            $this->GROWTHHORMONE->HrefValue = "";

            // PRETREATMENT
            $this->PRETREATMENT->LinkCustomAttributes = "";
            $this->PRETREATMENT->HrefValue = "";

            // SerumP4
            $this->SerumP4->LinkCustomAttributes = "";
            $this->SerumP4->HrefValue = "";

            // FORT
            $this->FORT->LinkCustomAttributes = "";
            $this->FORT->HrefValue = "";

            // MedicalFactors
            $this->MedicalFactors->LinkCustomAttributes = "";
            $this->MedicalFactors->HrefValue = "";

            // SCDate
            $this->SCDate->LinkCustomAttributes = "";
            $this->SCDate->HrefValue = "";

            // OvarianSurgery
            $this->OvarianSurgery->LinkCustomAttributes = "";
            $this->OvarianSurgery->HrefValue = "";

            // PreProcedureOrder
            $this->PreProcedureOrder->LinkCustomAttributes = "";
            $this->PreProcedureOrder->HrefValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->LinkCustomAttributes = "";
            $this->TRIGGERDATE->HrefValue = "";

            // ATHOMEorCLINIC
            $this->ATHOMEorCLINIC->LinkCustomAttributes = "";
            $this->ATHOMEorCLINIC->HrefValue = "";

            // OPUDATE
            $this->OPUDATE->LinkCustomAttributes = "";
            $this->OPUDATE->HrefValue = "";

            // ALLFREEZEINDICATION
            $this->ALLFREEZEINDICATION->LinkCustomAttributes = "";
            $this->ALLFREEZEINDICATION->HrefValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";

            // PGTA
            $this->PGTA->LinkCustomAttributes = "";
            $this->PGTA->HrefValue = "";

            // PGD
            $this->PGD->LinkCustomAttributes = "";
            $this->PGD->HrefValue = "";

            // DATEOFET
            $this->DATEOFET->LinkCustomAttributes = "";
            $this->DATEOFET->HrefValue = "";

            // ET
            $this->ET->LinkCustomAttributes = "";
            $this->ET->HrefValue = "";

            // ESET
            $this->ESET->LinkCustomAttributes = "";
            $this->ESET->HrefValue = "";

            // DOET
            $this->DOET->LinkCustomAttributes = "";
            $this->DOET->HrefValue = "";

            // SEMENPREPARATION
            $this->SEMENPREPARATION->LinkCustomAttributes = "";
            $this->SEMENPREPARATION->HrefValue = "";

            // REASONFORESET
            $this->REASONFORESET->LinkCustomAttributes = "";
            $this->REASONFORESET->HrefValue = "";

            // Expectedoocytes
            $this->Expectedoocytes->LinkCustomAttributes = "";
            $this->Expectedoocytes->HrefValue = "";

            // StChDate1
            $this->StChDate1->LinkCustomAttributes = "";
            $this->StChDate1->HrefValue = "";

            // StChDate2
            $this->StChDate2->LinkCustomAttributes = "";
            $this->StChDate2->HrefValue = "";

            // StChDate3
            $this->StChDate3->LinkCustomAttributes = "";
            $this->StChDate3->HrefValue = "";

            // StChDate4
            $this->StChDate4->LinkCustomAttributes = "";
            $this->StChDate4->HrefValue = "";

            // StChDate5
            $this->StChDate5->LinkCustomAttributes = "";
            $this->StChDate5->HrefValue = "";

            // StChDate6
            $this->StChDate6->LinkCustomAttributes = "";
            $this->StChDate6->HrefValue = "";

            // StChDate7
            $this->StChDate7->LinkCustomAttributes = "";
            $this->StChDate7->HrefValue = "";

            // StChDate8
            $this->StChDate8->LinkCustomAttributes = "";
            $this->StChDate8->HrefValue = "";

            // StChDate9
            $this->StChDate9->LinkCustomAttributes = "";
            $this->StChDate9->HrefValue = "";

            // StChDate10
            $this->StChDate10->LinkCustomAttributes = "";
            $this->StChDate10->HrefValue = "";

            // StChDate11
            $this->StChDate11->LinkCustomAttributes = "";
            $this->StChDate11->HrefValue = "";

            // StChDate12
            $this->StChDate12->LinkCustomAttributes = "";
            $this->StChDate12->HrefValue = "";

            // StChDate13
            $this->StChDate13->LinkCustomAttributes = "";
            $this->StChDate13->HrefValue = "";

            // CycleDay1
            $this->CycleDay1->LinkCustomAttributes = "";
            $this->CycleDay1->HrefValue = "";

            // CycleDay2
            $this->CycleDay2->LinkCustomAttributes = "";
            $this->CycleDay2->HrefValue = "";

            // CycleDay3
            $this->CycleDay3->LinkCustomAttributes = "";
            $this->CycleDay3->HrefValue = "";

            // CycleDay4
            $this->CycleDay4->LinkCustomAttributes = "";
            $this->CycleDay4->HrefValue = "";

            // CycleDay5
            $this->CycleDay5->LinkCustomAttributes = "";
            $this->CycleDay5->HrefValue = "";

            // CycleDay6
            $this->CycleDay6->LinkCustomAttributes = "";
            $this->CycleDay6->HrefValue = "";

            // CycleDay7
            $this->CycleDay7->LinkCustomAttributes = "";
            $this->CycleDay7->HrefValue = "";

            // CycleDay8
            $this->CycleDay8->LinkCustomAttributes = "";
            $this->CycleDay8->HrefValue = "";

            // CycleDay9
            $this->CycleDay9->LinkCustomAttributes = "";
            $this->CycleDay9->HrefValue = "";

            // CycleDay10
            $this->CycleDay10->LinkCustomAttributes = "";
            $this->CycleDay10->HrefValue = "";

            // CycleDay11
            $this->CycleDay11->LinkCustomAttributes = "";
            $this->CycleDay11->HrefValue = "";

            // CycleDay12
            $this->CycleDay12->LinkCustomAttributes = "";
            $this->CycleDay12->HrefValue = "";

            // CycleDay13
            $this->CycleDay13->LinkCustomAttributes = "";
            $this->CycleDay13->HrefValue = "";

            // StimulationDay1
            $this->StimulationDay1->LinkCustomAttributes = "";
            $this->StimulationDay1->HrefValue = "";

            // StimulationDay2
            $this->StimulationDay2->LinkCustomAttributes = "";
            $this->StimulationDay2->HrefValue = "";

            // StimulationDay3
            $this->StimulationDay3->LinkCustomAttributes = "";
            $this->StimulationDay3->HrefValue = "";

            // StimulationDay4
            $this->StimulationDay4->LinkCustomAttributes = "";
            $this->StimulationDay4->HrefValue = "";

            // StimulationDay5
            $this->StimulationDay5->LinkCustomAttributes = "";
            $this->StimulationDay5->HrefValue = "";

            // StimulationDay6
            $this->StimulationDay6->LinkCustomAttributes = "";
            $this->StimulationDay6->HrefValue = "";

            // StimulationDay7
            $this->StimulationDay7->LinkCustomAttributes = "";
            $this->StimulationDay7->HrefValue = "";

            // StimulationDay8
            $this->StimulationDay8->LinkCustomAttributes = "";
            $this->StimulationDay8->HrefValue = "";

            // StimulationDay9
            $this->StimulationDay9->LinkCustomAttributes = "";
            $this->StimulationDay9->HrefValue = "";

            // StimulationDay10
            $this->StimulationDay10->LinkCustomAttributes = "";
            $this->StimulationDay10->HrefValue = "";

            // StimulationDay11
            $this->StimulationDay11->LinkCustomAttributes = "";
            $this->StimulationDay11->HrefValue = "";

            // StimulationDay12
            $this->StimulationDay12->LinkCustomAttributes = "";
            $this->StimulationDay12->HrefValue = "";

            // StimulationDay13
            $this->StimulationDay13->LinkCustomAttributes = "";
            $this->StimulationDay13->HrefValue = "";

            // Tablet1
            $this->Tablet1->LinkCustomAttributes = "";
            $this->Tablet1->HrefValue = "";

            // Tablet2
            $this->Tablet2->LinkCustomAttributes = "";
            $this->Tablet2->HrefValue = "";

            // Tablet3
            $this->Tablet3->LinkCustomAttributes = "";
            $this->Tablet3->HrefValue = "";

            // Tablet4
            $this->Tablet4->LinkCustomAttributes = "";
            $this->Tablet4->HrefValue = "";

            // Tablet5
            $this->Tablet5->LinkCustomAttributes = "";
            $this->Tablet5->HrefValue = "";

            // Tablet6
            $this->Tablet6->LinkCustomAttributes = "";
            $this->Tablet6->HrefValue = "";

            // Tablet7
            $this->Tablet7->LinkCustomAttributes = "";
            $this->Tablet7->HrefValue = "";

            // Tablet8
            $this->Tablet8->LinkCustomAttributes = "";
            $this->Tablet8->HrefValue = "";

            // Tablet9
            $this->Tablet9->LinkCustomAttributes = "";
            $this->Tablet9->HrefValue = "";

            // Tablet10
            $this->Tablet10->LinkCustomAttributes = "";
            $this->Tablet10->HrefValue = "";

            // Tablet11
            $this->Tablet11->LinkCustomAttributes = "";
            $this->Tablet11->HrefValue = "";

            // Tablet12
            $this->Tablet12->LinkCustomAttributes = "";
            $this->Tablet12->HrefValue = "";

            // Tablet13
            $this->Tablet13->LinkCustomAttributes = "";
            $this->Tablet13->HrefValue = "";

            // RFSH1
            $this->RFSH1->LinkCustomAttributes = "";
            $this->RFSH1->HrefValue = "";

            // RFSH2
            $this->RFSH2->LinkCustomAttributes = "";
            $this->RFSH2->HrefValue = "";

            // RFSH3
            $this->RFSH3->LinkCustomAttributes = "";
            $this->RFSH3->HrefValue = "";

            // RFSH4
            $this->RFSH4->LinkCustomAttributes = "";
            $this->RFSH4->HrefValue = "";

            // RFSH5
            $this->RFSH5->LinkCustomAttributes = "";
            $this->RFSH5->HrefValue = "";

            // RFSH6
            $this->RFSH6->LinkCustomAttributes = "";
            $this->RFSH6->HrefValue = "";

            // RFSH7
            $this->RFSH7->LinkCustomAttributes = "";
            $this->RFSH7->HrefValue = "";

            // RFSH8
            $this->RFSH8->LinkCustomAttributes = "";
            $this->RFSH8->HrefValue = "";

            // RFSH9
            $this->RFSH9->LinkCustomAttributes = "";
            $this->RFSH9->HrefValue = "";

            // RFSH10
            $this->RFSH10->LinkCustomAttributes = "";
            $this->RFSH10->HrefValue = "";

            // RFSH11
            $this->RFSH11->LinkCustomAttributes = "";
            $this->RFSH11->HrefValue = "";

            // RFSH12
            $this->RFSH12->LinkCustomAttributes = "";
            $this->RFSH12->HrefValue = "";

            // RFSH13
            $this->RFSH13->LinkCustomAttributes = "";
            $this->RFSH13->HrefValue = "";

            // HMG1
            $this->HMG1->LinkCustomAttributes = "";
            $this->HMG1->HrefValue = "";

            // HMG2
            $this->HMG2->LinkCustomAttributes = "";
            $this->HMG2->HrefValue = "";

            // HMG3
            $this->HMG3->LinkCustomAttributes = "";
            $this->HMG3->HrefValue = "";

            // HMG4
            $this->HMG4->LinkCustomAttributes = "";
            $this->HMG4->HrefValue = "";

            // HMG5
            $this->HMG5->LinkCustomAttributes = "";
            $this->HMG5->HrefValue = "";

            // HMG6
            $this->HMG6->LinkCustomAttributes = "";
            $this->HMG6->HrefValue = "";

            // HMG7
            $this->HMG7->LinkCustomAttributes = "";
            $this->HMG7->HrefValue = "";

            // HMG8
            $this->HMG8->LinkCustomAttributes = "";
            $this->HMG8->HrefValue = "";

            // HMG9
            $this->HMG9->LinkCustomAttributes = "";
            $this->HMG9->HrefValue = "";

            // HMG10
            $this->HMG10->LinkCustomAttributes = "";
            $this->HMG10->HrefValue = "";

            // HMG11
            $this->HMG11->LinkCustomAttributes = "";
            $this->HMG11->HrefValue = "";

            // HMG12
            $this->HMG12->LinkCustomAttributes = "";
            $this->HMG12->HrefValue = "";

            // HMG13
            $this->HMG13->LinkCustomAttributes = "";
            $this->HMG13->HrefValue = "";

            // GnRH1
            $this->GnRH1->LinkCustomAttributes = "";
            $this->GnRH1->HrefValue = "";

            // GnRH2
            $this->GnRH2->LinkCustomAttributes = "";
            $this->GnRH2->HrefValue = "";

            // GnRH3
            $this->GnRH3->LinkCustomAttributes = "";
            $this->GnRH3->HrefValue = "";

            // GnRH4
            $this->GnRH4->LinkCustomAttributes = "";
            $this->GnRH4->HrefValue = "";

            // GnRH5
            $this->GnRH5->LinkCustomAttributes = "";
            $this->GnRH5->HrefValue = "";

            // GnRH6
            $this->GnRH6->LinkCustomAttributes = "";
            $this->GnRH6->HrefValue = "";

            // GnRH7
            $this->GnRH7->LinkCustomAttributes = "";
            $this->GnRH7->HrefValue = "";

            // GnRH8
            $this->GnRH8->LinkCustomAttributes = "";
            $this->GnRH8->HrefValue = "";

            // GnRH9
            $this->GnRH9->LinkCustomAttributes = "";
            $this->GnRH9->HrefValue = "";

            // GnRH10
            $this->GnRH10->LinkCustomAttributes = "";
            $this->GnRH10->HrefValue = "";

            // GnRH11
            $this->GnRH11->LinkCustomAttributes = "";
            $this->GnRH11->HrefValue = "";

            // GnRH12
            $this->GnRH12->LinkCustomAttributes = "";
            $this->GnRH12->HrefValue = "";

            // GnRH13
            $this->GnRH13->LinkCustomAttributes = "";
            $this->GnRH13->HrefValue = "";

            // E21
            $this->E21->LinkCustomAttributes = "";
            $this->E21->HrefValue = "";

            // E22
            $this->E22->LinkCustomAttributes = "";
            $this->E22->HrefValue = "";

            // E23
            $this->E23->LinkCustomAttributes = "";
            $this->E23->HrefValue = "";

            // E24
            $this->E24->LinkCustomAttributes = "";
            $this->E24->HrefValue = "";

            // E25
            $this->E25->LinkCustomAttributes = "";
            $this->E25->HrefValue = "";

            // E26
            $this->E26->LinkCustomAttributes = "";
            $this->E26->HrefValue = "";

            // E27
            $this->E27->LinkCustomAttributes = "";
            $this->E27->HrefValue = "";

            // E28
            $this->E28->LinkCustomAttributes = "";
            $this->E28->HrefValue = "";

            // E29
            $this->E29->LinkCustomAttributes = "";
            $this->E29->HrefValue = "";

            // E210
            $this->E210->LinkCustomAttributes = "";
            $this->E210->HrefValue = "";

            // E211
            $this->E211->LinkCustomAttributes = "";
            $this->E211->HrefValue = "";

            // E212
            $this->E212->LinkCustomAttributes = "";
            $this->E212->HrefValue = "";

            // E213
            $this->E213->LinkCustomAttributes = "";
            $this->E213->HrefValue = "";

            // P41
            $this->P41->LinkCustomAttributes = "";
            $this->P41->HrefValue = "";

            // P42
            $this->P42->LinkCustomAttributes = "";
            $this->P42->HrefValue = "";

            // P43
            $this->P43->LinkCustomAttributes = "";
            $this->P43->HrefValue = "";

            // P44
            $this->P44->LinkCustomAttributes = "";
            $this->P44->HrefValue = "";

            // P45
            $this->P45->LinkCustomAttributes = "";
            $this->P45->HrefValue = "";

            // P46
            $this->P46->LinkCustomAttributes = "";
            $this->P46->HrefValue = "";

            // P47
            $this->P47->LinkCustomAttributes = "";
            $this->P47->HrefValue = "";

            // P48
            $this->P48->LinkCustomAttributes = "";
            $this->P48->HrefValue = "";

            // P49
            $this->P49->LinkCustomAttributes = "";
            $this->P49->HrefValue = "";

            // P410
            $this->P410->LinkCustomAttributes = "";
            $this->P410->HrefValue = "";

            // P411
            $this->P411->LinkCustomAttributes = "";
            $this->P411->HrefValue = "";

            // P412
            $this->P412->LinkCustomAttributes = "";
            $this->P412->HrefValue = "";

            // P413
            $this->P413->LinkCustomAttributes = "";
            $this->P413->HrefValue = "";

            // USGRt1
            $this->USGRt1->LinkCustomAttributes = "";
            $this->USGRt1->HrefValue = "";

            // USGRt2
            $this->USGRt2->LinkCustomAttributes = "";
            $this->USGRt2->HrefValue = "";

            // USGRt3
            $this->USGRt3->LinkCustomAttributes = "";
            $this->USGRt3->HrefValue = "";

            // USGRt4
            $this->USGRt4->LinkCustomAttributes = "";
            $this->USGRt4->HrefValue = "";

            // USGRt5
            $this->USGRt5->LinkCustomAttributes = "";
            $this->USGRt5->HrefValue = "";

            // USGRt6
            $this->USGRt6->LinkCustomAttributes = "";
            $this->USGRt6->HrefValue = "";

            // USGRt7
            $this->USGRt7->LinkCustomAttributes = "";
            $this->USGRt7->HrefValue = "";

            // USGRt8
            $this->USGRt8->LinkCustomAttributes = "";
            $this->USGRt8->HrefValue = "";

            // USGRt9
            $this->USGRt9->LinkCustomAttributes = "";
            $this->USGRt9->HrefValue = "";

            // USGRt10
            $this->USGRt10->LinkCustomAttributes = "";
            $this->USGRt10->HrefValue = "";

            // USGRt11
            $this->USGRt11->LinkCustomAttributes = "";
            $this->USGRt11->HrefValue = "";

            // USGRt12
            $this->USGRt12->LinkCustomAttributes = "";
            $this->USGRt12->HrefValue = "";

            // USGRt13
            $this->USGRt13->LinkCustomAttributes = "";
            $this->USGRt13->HrefValue = "";

            // USGLt1
            $this->USGLt1->LinkCustomAttributes = "";
            $this->USGLt1->HrefValue = "";

            // USGLt2
            $this->USGLt2->LinkCustomAttributes = "";
            $this->USGLt2->HrefValue = "";

            // USGLt3
            $this->USGLt3->LinkCustomAttributes = "";
            $this->USGLt3->HrefValue = "";

            // USGLt4
            $this->USGLt4->LinkCustomAttributes = "";
            $this->USGLt4->HrefValue = "";

            // USGLt5
            $this->USGLt5->LinkCustomAttributes = "";
            $this->USGLt5->HrefValue = "";

            // USGLt6
            $this->USGLt6->LinkCustomAttributes = "";
            $this->USGLt6->HrefValue = "";

            // USGLt7
            $this->USGLt7->LinkCustomAttributes = "";
            $this->USGLt7->HrefValue = "";

            // USGLt8
            $this->USGLt8->LinkCustomAttributes = "";
            $this->USGLt8->HrefValue = "";

            // USGLt9
            $this->USGLt9->LinkCustomAttributes = "";
            $this->USGLt9->HrefValue = "";

            // USGLt10
            $this->USGLt10->LinkCustomAttributes = "";
            $this->USGLt10->HrefValue = "";

            // USGLt11
            $this->USGLt11->LinkCustomAttributes = "";
            $this->USGLt11->HrefValue = "";

            // USGLt12
            $this->USGLt12->LinkCustomAttributes = "";
            $this->USGLt12->HrefValue = "";

            // USGLt13
            $this->USGLt13->LinkCustomAttributes = "";
            $this->USGLt13->HrefValue = "";

            // EM1
            $this->EM1->LinkCustomAttributes = "";
            $this->EM1->HrefValue = "";

            // EM2
            $this->EM2->LinkCustomAttributes = "";
            $this->EM2->HrefValue = "";

            // EM3
            $this->EM3->LinkCustomAttributes = "";
            $this->EM3->HrefValue = "";

            // EM4
            $this->EM4->LinkCustomAttributes = "";
            $this->EM4->HrefValue = "";

            // EM5
            $this->EM5->LinkCustomAttributes = "";
            $this->EM5->HrefValue = "";

            // EM6
            $this->EM6->LinkCustomAttributes = "";
            $this->EM6->HrefValue = "";

            // EM7
            $this->EM7->LinkCustomAttributes = "";
            $this->EM7->HrefValue = "";

            // EM8
            $this->EM8->LinkCustomAttributes = "";
            $this->EM8->HrefValue = "";

            // EM9
            $this->EM9->LinkCustomAttributes = "";
            $this->EM9->HrefValue = "";

            // EM10
            $this->EM10->LinkCustomAttributes = "";
            $this->EM10->HrefValue = "";

            // EM11
            $this->EM11->LinkCustomAttributes = "";
            $this->EM11->HrefValue = "";

            // EM12
            $this->EM12->LinkCustomAttributes = "";
            $this->EM12->HrefValue = "";

            // EM13
            $this->EM13->LinkCustomAttributes = "";
            $this->EM13->HrefValue = "";

            // Others1
            $this->Others1->LinkCustomAttributes = "";
            $this->Others1->HrefValue = "";

            // Others2
            $this->Others2->LinkCustomAttributes = "";
            $this->Others2->HrefValue = "";

            // Others3
            $this->Others3->LinkCustomAttributes = "";
            $this->Others3->HrefValue = "";

            // Others4
            $this->Others4->LinkCustomAttributes = "";
            $this->Others4->HrefValue = "";

            // Others5
            $this->Others5->LinkCustomAttributes = "";
            $this->Others5->HrefValue = "";

            // Others6
            $this->Others6->LinkCustomAttributes = "";
            $this->Others6->HrefValue = "";

            // Others7
            $this->Others7->LinkCustomAttributes = "";
            $this->Others7->HrefValue = "";

            // Others8
            $this->Others8->LinkCustomAttributes = "";
            $this->Others8->HrefValue = "";

            // Others9
            $this->Others9->LinkCustomAttributes = "";
            $this->Others9->HrefValue = "";

            // Others10
            $this->Others10->LinkCustomAttributes = "";
            $this->Others10->HrefValue = "";

            // Others11
            $this->Others11->LinkCustomAttributes = "";
            $this->Others11->HrefValue = "";

            // Others12
            $this->Others12->LinkCustomAttributes = "";
            $this->Others12->HrefValue = "";

            // Others13
            $this->Others13->LinkCustomAttributes = "";
            $this->Others13->HrefValue = "";

            // DR1
            $this->DR1->LinkCustomAttributes = "";
            $this->DR1->HrefValue = "";

            // DR2
            $this->DR2->LinkCustomAttributes = "";
            $this->DR2->HrefValue = "";

            // DR3
            $this->DR3->LinkCustomAttributes = "";
            $this->DR3->HrefValue = "";

            // DR4
            $this->DR4->LinkCustomAttributes = "";
            $this->DR4->HrefValue = "";

            // DR5
            $this->DR5->LinkCustomAttributes = "";
            $this->DR5->HrefValue = "";

            // DR6
            $this->DR6->LinkCustomAttributes = "";
            $this->DR6->HrefValue = "";

            // DR7
            $this->DR7->LinkCustomAttributes = "";
            $this->DR7->HrefValue = "";

            // DR8
            $this->DR8->LinkCustomAttributes = "";
            $this->DR8->HrefValue = "";

            // DR9
            $this->DR9->LinkCustomAttributes = "";
            $this->DR9->HrefValue = "";

            // DR10
            $this->DR10->LinkCustomAttributes = "";
            $this->DR10->HrefValue = "";

            // DR11
            $this->DR11->LinkCustomAttributes = "";
            $this->DR11->HrefValue = "";

            // DR12
            $this->DR12->LinkCustomAttributes = "";
            $this->DR12->HrefValue = "";

            // DR13
            $this->DR13->LinkCustomAttributes = "";
            $this->DR13->HrefValue = "";

            // DOCTORRESPONSIBLE
            $this->DOCTORRESPONSIBLE->LinkCustomAttributes = "";
            $this->DOCTORRESPONSIBLE->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Convert
            $this->Convert->LinkCustomAttributes = "";
            $this->Convert->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";

            // DATOFEMBRYOTRANSFER
            $this->DATOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATOFEMBRYOTRANSFER->HrefValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";

            // ViaAdmin
            $this->ViaAdmin->LinkCustomAttributes = "";
            $this->ViaAdmin->HrefValue = "";

            // ViaStartDateTime
            $this->ViaStartDateTime->LinkCustomAttributes = "";
            $this->ViaStartDateTime->HrefValue = "";

            // ViaDose
            $this->ViaDose->LinkCustomAttributes = "";
            $this->ViaDose->HrefValue = "";

            // AllFreeze
            $this->AllFreeze->LinkCustomAttributes = "";
            $this->AllFreeze->HrefValue = "";

            // TreatmentCancel
            $this->TreatmentCancel->LinkCustomAttributes = "";
            $this->TreatmentCancel->HrefValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";

            // ProgesteroneAdmin
            $this->ProgesteroneAdmin->LinkCustomAttributes = "";
            $this->ProgesteroneAdmin->HrefValue = "";

            // ProgesteroneStart
            $this->ProgesteroneStart->LinkCustomAttributes = "";
            $this->ProgesteroneStart->HrefValue = "";

            // ProgesteroneDose
            $this->ProgesteroneDose->LinkCustomAttributes = "";
            $this->ProgesteroneDose->HrefValue = "";

            // StChDate14
            $this->StChDate14->LinkCustomAttributes = "";
            $this->StChDate14->HrefValue = "";

            // StChDate15
            $this->StChDate15->LinkCustomAttributes = "";
            $this->StChDate15->HrefValue = "";

            // StChDate16
            $this->StChDate16->LinkCustomAttributes = "";
            $this->StChDate16->HrefValue = "";

            // StChDate17
            $this->StChDate17->LinkCustomAttributes = "";
            $this->StChDate17->HrefValue = "";

            // StChDate18
            $this->StChDate18->LinkCustomAttributes = "";
            $this->StChDate18->HrefValue = "";

            // StChDate19
            $this->StChDate19->LinkCustomAttributes = "";
            $this->StChDate19->HrefValue = "";

            // StChDate20
            $this->StChDate20->LinkCustomAttributes = "";
            $this->StChDate20->HrefValue = "";

            // StChDate21
            $this->StChDate21->LinkCustomAttributes = "";
            $this->StChDate21->HrefValue = "";

            // StChDate22
            $this->StChDate22->LinkCustomAttributes = "";
            $this->StChDate22->HrefValue = "";

            // StChDate23
            $this->StChDate23->LinkCustomAttributes = "";
            $this->StChDate23->HrefValue = "";

            // StChDate24
            $this->StChDate24->LinkCustomAttributes = "";
            $this->StChDate24->HrefValue = "";

            // StChDate25
            $this->StChDate25->LinkCustomAttributes = "";
            $this->StChDate25->HrefValue = "";

            // CycleDay14
            $this->CycleDay14->LinkCustomAttributes = "";
            $this->CycleDay14->HrefValue = "";

            // CycleDay15
            $this->CycleDay15->LinkCustomAttributes = "";
            $this->CycleDay15->HrefValue = "";

            // CycleDay16
            $this->CycleDay16->LinkCustomAttributes = "";
            $this->CycleDay16->HrefValue = "";

            // CycleDay17
            $this->CycleDay17->LinkCustomAttributes = "";
            $this->CycleDay17->HrefValue = "";

            // CycleDay18
            $this->CycleDay18->LinkCustomAttributes = "";
            $this->CycleDay18->HrefValue = "";

            // CycleDay19
            $this->CycleDay19->LinkCustomAttributes = "";
            $this->CycleDay19->HrefValue = "";

            // CycleDay20
            $this->CycleDay20->LinkCustomAttributes = "";
            $this->CycleDay20->HrefValue = "";

            // CycleDay21
            $this->CycleDay21->LinkCustomAttributes = "";
            $this->CycleDay21->HrefValue = "";

            // CycleDay22
            $this->CycleDay22->LinkCustomAttributes = "";
            $this->CycleDay22->HrefValue = "";

            // CycleDay23
            $this->CycleDay23->LinkCustomAttributes = "";
            $this->CycleDay23->HrefValue = "";

            // CycleDay24
            $this->CycleDay24->LinkCustomAttributes = "";
            $this->CycleDay24->HrefValue = "";

            // CycleDay25
            $this->CycleDay25->LinkCustomAttributes = "";
            $this->CycleDay25->HrefValue = "";

            // StimulationDay14
            $this->StimulationDay14->LinkCustomAttributes = "";
            $this->StimulationDay14->HrefValue = "";

            // StimulationDay15
            $this->StimulationDay15->LinkCustomAttributes = "";
            $this->StimulationDay15->HrefValue = "";

            // StimulationDay16
            $this->StimulationDay16->LinkCustomAttributes = "";
            $this->StimulationDay16->HrefValue = "";

            // StimulationDay17
            $this->StimulationDay17->LinkCustomAttributes = "";
            $this->StimulationDay17->HrefValue = "";

            // StimulationDay18
            $this->StimulationDay18->LinkCustomAttributes = "";
            $this->StimulationDay18->HrefValue = "";

            // StimulationDay19
            $this->StimulationDay19->LinkCustomAttributes = "";
            $this->StimulationDay19->HrefValue = "";

            // StimulationDay20
            $this->StimulationDay20->LinkCustomAttributes = "";
            $this->StimulationDay20->HrefValue = "";

            // StimulationDay21
            $this->StimulationDay21->LinkCustomAttributes = "";
            $this->StimulationDay21->HrefValue = "";

            // StimulationDay22
            $this->StimulationDay22->LinkCustomAttributes = "";
            $this->StimulationDay22->HrefValue = "";

            // StimulationDay23
            $this->StimulationDay23->LinkCustomAttributes = "";
            $this->StimulationDay23->HrefValue = "";

            // StimulationDay24
            $this->StimulationDay24->LinkCustomAttributes = "";
            $this->StimulationDay24->HrefValue = "";

            // StimulationDay25
            $this->StimulationDay25->LinkCustomAttributes = "";
            $this->StimulationDay25->HrefValue = "";

            // Tablet14
            $this->Tablet14->LinkCustomAttributes = "";
            $this->Tablet14->HrefValue = "";

            // Tablet15
            $this->Tablet15->LinkCustomAttributes = "";
            $this->Tablet15->HrefValue = "";

            // Tablet16
            $this->Tablet16->LinkCustomAttributes = "";
            $this->Tablet16->HrefValue = "";

            // Tablet17
            $this->Tablet17->LinkCustomAttributes = "";
            $this->Tablet17->HrefValue = "";

            // Tablet18
            $this->Tablet18->LinkCustomAttributes = "";
            $this->Tablet18->HrefValue = "";

            // Tablet19
            $this->Tablet19->LinkCustomAttributes = "";
            $this->Tablet19->HrefValue = "";

            // Tablet20
            $this->Tablet20->LinkCustomAttributes = "";
            $this->Tablet20->HrefValue = "";

            // Tablet21
            $this->Tablet21->LinkCustomAttributes = "";
            $this->Tablet21->HrefValue = "";

            // Tablet22
            $this->Tablet22->LinkCustomAttributes = "";
            $this->Tablet22->HrefValue = "";

            // Tablet23
            $this->Tablet23->LinkCustomAttributes = "";
            $this->Tablet23->HrefValue = "";

            // Tablet24
            $this->Tablet24->LinkCustomAttributes = "";
            $this->Tablet24->HrefValue = "";

            // Tablet25
            $this->Tablet25->LinkCustomAttributes = "";
            $this->Tablet25->HrefValue = "";

            // RFSH14
            $this->RFSH14->LinkCustomAttributes = "";
            $this->RFSH14->HrefValue = "";

            // RFSH15
            $this->RFSH15->LinkCustomAttributes = "";
            $this->RFSH15->HrefValue = "";

            // RFSH16
            $this->RFSH16->LinkCustomAttributes = "";
            $this->RFSH16->HrefValue = "";

            // RFSH17
            $this->RFSH17->LinkCustomAttributes = "";
            $this->RFSH17->HrefValue = "";

            // RFSH18
            $this->RFSH18->LinkCustomAttributes = "";
            $this->RFSH18->HrefValue = "";

            // RFSH19
            $this->RFSH19->LinkCustomAttributes = "";
            $this->RFSH19->HrefValue = "";

            // RFSH20
            $this->RFSH20->LinkCustomAttributes = "";
            $this->RFSH20->HrefValue = "";

            // RFSH21
            $this->RFSH21->LinkCustomAttributes = "";
            $this->RFSH21->HrefValue = "";

            // RFSH22
            $this->RFSH22->LinkCustomAttributes = "";
            $this->RFSH22->HrefValue = "";

            // RFSH23
            $this->RFSH23->LinkCustomAttributes = "";
            $this->RFSH23->HrefValue = "";

            // RFSH24
            $this->RFSH24->LinkCustomAttributes = "";
            $this->RFSH24->HrefValue = "";

            // RFSH25
            $this->RFSH25->LinkCustomAttributes = "";
            $this->RFSH25->HrefValue = "";

            // HMG14
            $this->HMG14->LinkCustomAttributes = "";
            $this->HMG14->HrefValue = "";

            // HMG15
            $this->HMG15->LinkCustomAttributes = "";
            $this->HMG15->HrefValue = "";

            // HMG16
            $this->HMG16->LinkCustomAttributes = "";
            $this->HMG16->HrefValue = "";

            // HMG17
            $this->HMG17->LinkCustomAttributes = "";
            $this->HMG17->HrefValue = "";

            // HMG18
            $this->HMG18->LinkCustomAttributes = "";
            $this->HMG18->HrefValue = "";

            // HMG19
            $this->HMG19->LinkCustomAttributes = "";
            $this->HMG19->HrefValue = "";

            // HMG20
            $this->HMG20->LinkCustomAttributes = "";
            $this->HMG20->HrefValue = "";

            // HMG21
            $this->HMG21->LinkCustomAttributes = "";
            $this->HMG21->HrefValue = "";

            // HMG22
            $this->HMG22->LinkCustomAttributes = "";
            $this->HMG22->HrefValue = "";

            // HMG23
            $this->HMG23->LinkCustomAttributes = "";
            $this->HMG23->HrefValue = "";

            // HMG24
            $this->HMG24->LinkCustomAttributes = "";
            $this->HMG24->HrefValue = "";

            // HMG25
            $this->HMG25->LinkCustomAttributes = "";
            $this->HMG25->HrefValue = "";

            // GnRH14
            $this->GnRH14->LinkCustomAttributes = "";
            $this->GnRH14->HrefValue = "";

            // GnRH15
            $this->GnRH15->LinkCustomAttributes = "";
            $this->GnRH15->HrefValue = "";

            // GnRH16
            $this->GnRH16->LinkCustomAttributes = "";
            $this->GnRH16->HrefValue = "";

            // GnRH17
            $this->GnRH17->LinkCustomAttributes = "";
            $this->GnRH17->HrefValue = "";

            // GnRH18
            $this->GnRH18->LinkCustomAttributes = "";
            $this->GnRH18->HrefValue = "";

            // GnRH19
            $this->GnRH19->LinkCustomAttributes = "";
            $this->GnRH19->HrefValue = "";

            // GnRH20
            $this->GnRH20->LinkCustomAttributes = "";
            $this->GnRH20->HrefValue = "";

            // GnRH21
            $this->GnRH21->LinkCustomAttributes = "";
            $this->GnRH21->HrefValue = "";

            // GnRH22
            $this->GnRH22->LinkCustomAttributes = "";
            $this->GnRH22->HrefValue = "";

            // GnRH23
            $this->GnRH23->LinkCustomAttributes = "";
            $this->GnRH23->HrefValue = "";

            // GnRH24
            $this->GnRH24->LinkCustomAttributes = "";
            $this->GnRH24->HrefValue = "";

            // GnRH25
            $this->GnRH25->LinkCustomAttributes = "";
            $this->GnRH25->HrefValue = "";

            // P414
            $this->P414->LinkCustomAttributes = "";
            $this->P414->HrefValue = "";

            // P415
            $this->P415->LinkCustomAttributes = "";
            $this->P415->HrefValue = "";

            // P416
            $this->P416->LinkCustomAttributes = "";
            $this->P416->HrefValue = "";

            // P417
            $this->P417->LinkCustomAttributes = "";
            $this->P417->HrefValue = "";

            // P418
            $this->P418->LinkCustomAttributes = "";
            $this->P418->HrefValue = "";

            // P419
            $this->P419->LinkCustomAttributes = "";
            $this->P419->HrefValue = "";

            // P420
            $this->P420->LinkCustomAttributes = "";
            $this->P420->HrefValue = "";

            // P421
            $this->P421->LinkCustomAttributes = "";
            $this->P421->HrefValue = "";

            // P422
            $this->P422->LinkCustomAttributes = "";
            $this->P422->HrefValue = "";

            // P423
            $this->P423->LinkCustomAttributes = "";
            $this->P423->HrefValue = "";

            // P424
            $this->P424->LinkCustomAttributes = "";
            $this->P424->HrefValue = "";

            // P425
            $this->P425->LinkCustomAttributes = "";
            $this->P425->HrefValue = "";

            // USGRt14
            $this->USGRt14->LinkCustomAttributes = "";
            $this->USGRt14->HrefValue = "";

            // USGRt15
            $this->USGRt15->LinkCustomAttributes = "";
            $this->USGRt15->HrefValue = "";

            // USGRt16
            $this->USGRt16->LinkCustomAttributes = "";
            $this->USGRt16->HrefValue = "";

            // USGRt17
            $this->USGRt17->LinkCustomAttributes = "";
            $this->USGRt17->HrefValue = "";

            // USGRt18
            $this->USGRt18->LinkCustomAttributes = "";
            $this->USGRt18->HrefValue = "";

            // USGRt19
            $this->USGRt19->LinkCustomAttributes = "";
            $this->USGRt19->HrefValue = "";

            // USGRt20
            $this->USGRt20->LinkCustomAttributes = "";
            $this->USGRt20->HrefValue = "";

            // USGRt21
            $this->USGRt21->LinkCustomAttributes = "";
            $this->USGRt21->HrefValue = "";

            // USGRt22
            $this->USGRt22->LinkCustomAttributes = "";
            $this->USGRt22->HrefValue = "";

            // USGRt23
            $this->USGRt23->LinkCustomAttributes = "";
            $this->USGRt23->HrefValue = "";

            // USGRt24
            $this->USGRt24->LinkCustomAttributes = "";
            $this->USGRt24->HrefValue = "";

            // USGRt25
            $this->USGRt25->LinkCustomAttributes = "";
            $this->USGRt25->HrefValue = "";

            // USGLt14
            $this->USGLt14->LinkCustomAttributes = "";
            $this->USGLt14->HrefValue = "";

            // USGLt15
            $this->USGLt15->LinkCustomAttributes = "";
            $this->USGLt15->HrefValue = "";

            // USGLt16
            $this->USGLt16->LinkCustomAttributes = "";
            $this->USGLt16->HrefValue = "";

            // USGLt17
            $this->USGLt17->LinkCustomAttributes = "";
            $this->USGLt17->HrefValue = "";

            // USGLt18
            $this->USGLt18->LinkCustomAttributes = "";
            $this->USGLt18->HrefValue = "";

            // USGLt19
            $this->USGLt19->LinkCustomAttributes = "";
            $this->USGLt19->HrefValue = "";

            // USGLt20
            $this->USGLt20->LinkCustomAttributes = "";
            $this->USGLt20->HrefValue = "";

            // USGLt21
            $this->USGLt21->LinkCustomAttributes = "";
            $this->USGLt21->HrefValue = "";

            // USGLt22
            $this->USGLt22->LinkCustomAttributes = "";
            $this->USGLt22->HrefValue = "";

            // USGLt23
            $this->USGLt23->LinkCustomAttributes = "";
            $this->USGLt23->HrefValue = "";

            // USGLt24
            $this->USGLt24->LinkCustomAttributes = "";
            $this->USGLt24->HrefValue = "";

            // USGLt25
            $this->USGLt25->LinkCustomAttributes = "";
            $this->USGLt25->HrefValue = "";

            // EM14
            $this->EM14->LinkCustomAttributes = "";
            $this->EM14->HrefValue = "";

            // EM15
            $this->EM15->LinkCustomAttributes = "";
            $this->EM15->HrefValue = "";

            // EM16
            $this->EM16->LinkCustomAttributes = "";
            $this->EM16->HrefValue = "";

            // EM17
            $this->EM17->LinkCustomAttributes = "";
            $this->EM17->HrefValue = "";

            // EM18
            $this->EM18->LinkCustomAttributes = "";
            $this->EM18->HrefValue = "";

            // EM19
            $this->EM19->LinkCustomAttributes = "";
            $this->EM19->HrefValue = "";

            // EM20
            $this->EM20->LinkCustomAttributes = "";
            $this->EM20->HrefValue = "";

            // EM21
            $this->EM21->LinkCustomAttributes = "";
            $this->EM21->HrefValue = "";

            // EM22
            $this->EM22->LinkCustomAttributes = "";
            $this->EM22->HrefValue = "";

            // EM23
            $this->EM23->LinkCustomAttributes = "";
            $this->EM23->HrefValue = "";

            // EM24
            $this->EM24->LinkCustomAttributes = "";
            $this->EM24->HrefValue = "";

            // EM25
            $this->EM25->LinkCustomAttributes = "";
            $this->EM25->HrefValue = "";

            // Others14
            $this->Others14->LinkCustomAttributes = "";
            $this->Others14->HrefValue = "";

            // Others15
            $this->Others15->LinkCustomAttributes = "";
            $this->Others15->HrefValue = "";

            // Others16
            $this->Others16->LinkCustomAttributes = "";
            $this->Others16->HrefValue = "";

            // Others17
            $this->Others17->LinkCustomAttributes = "";
            $this->Others17->HrefValue = "";

            // Others18
            $this->Others18->LinkCustomAttributes = "";
            $this->Others18->HrefValue = "";

            // Others19
            $this->Others19->LinkCustomAttributes = "";
            $this->Others19->HrefValue = "";

            // Others20
            $this->Others20->LinkCustomAttributes = "";
            $this->Others20->HrefValue = "";

            // Others21
            $this->Others21->LinkCustomAttributes = "";
            $this->Others21->HrefValue = "";

            // Others22
            $this->Others22->LinkCustomAttributes = "";
            $this->Others22->HrefValue = "";

            // Others23
            $this->Others23->LinkCustomAttributes = "";
            $this->Others23->HrefValue = "";

            // Others24
            $this->Others24->LinkCustomAttributes = "";
            $this->Others24->HrefValue = "";

            // Others25
            $this->Others25->LinkCustomAttributes = "";
            $this->Others25->HrefValue = "";

            // DR14
            $this->DR14->LinkCustomAttributes = "";
            $this->DR14->HrefValue = "";

            // DR15
            $this->DR15->LinkCustomAttributes = "";
            $this->DR15->HrefValue = "";

            // DR16
            $this->DR16->LinkCustomAttributes = "";
            $this->DR16->HrefValue = "";

            // DR17
            $this->DR17->LinkCustomAttributes = "";
            $this->DR17->HrefValue = "";

            // DR18
            $this->DR18->LinkCustomAttributes = "";
            $this->DR18->HrefValue = "";

            // DR19
            $this->DR19->LinkCustomAttributes = "";
            $this->DR19->HrefValue = "";

            // DR20
            $this->DR20->LinkCustomAttributes = "";
            $this->DR20->HrefValue = "";

            // DR21
            $this->DR21->LinkCustomAttributes = "";
            $this->DR21->HrefValue = "";

            // DR22
            $this->DR22->LinkCustomAttributes = "";
            $this->DR22->HrefValue = "";

            // DR23
            $this->DR23->LinkCustomAttributes = "";
            $this->DR23->HrefValue = "";

            // DR24
            $this->DR24->LinkCustomAttributes = "";
            $this->DR24->HrefValue = "";

            // DR25
            $this->DR25->LinkCustomAttributes = "";
            $this->DR25->HrefValue = "";

            // E214
            $this->E214->LinkCustomAttributes = "";
            $this->E214->HrefValue = "";

            // E215
            $this->E215->LinkCustomAttributes = "";
            $this->E215->HrefValue = "";

            // E216
            $this->E216->LinkCustomAttributes = "";
            $this->E216->HrefValue = "";

            // E217
            $this->E217->LinkCustomAttributes = "";
            $this->E217->HrefValue = "";

            // E218
            $this->E218->LinkCustomAttributes = "";
            $this->E218->HrefValue = "";

            // E219
            $this->E219->LinkCustomAttributes = "";
            $this->E219->HrefValue = "";

            // E220
            $this->E220->LinkCustomAttributes = "";
            $this->E220->HrefValue = "";

            // E221
            $this->E221->LinkCustomAttributes = "";
            $this->E221->HrefValue = "";

            // E222
            $this->E222->LinkCustomAttributes = "";
            $this->E222->HrefValue = "";

            // E223
            $this->E223->LinkCustomAttributes = "";
            $this->E223->HrefValue = "";

            // E224
            $this->E224->LinkCustomAttributes = "";
            $this->E224->HrefValue = "";

            // E225
            $this->E225->LinkCustomAttributes = "";
            $this->E225->HrefValue = "";

            // EEETTTDTE
            $this->EEETTTDTE->LinkCustomAttributes = "";
            $this->EEETTTDTE->HrefValue = "";

            // bhcgdate
            $this->bhcgdate->LinkCustomAttributes = "";
            $this->bhcgdate->HrefValue = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->LinkCustomAttributes = "";
            $this->TUBAL_PATENCY->HrefValue = "";

            // HSG
            $this->HSG->LinkCustomAttributes = "";
            $this->HSG->HrefValue = "";

            // DHL
            $this->DHL->LinkCustomAttributes = "";
            $this->DHL->HrefValue = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
            $this->UTERINE_PROBLEMS->HrefValue = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->LinkCustomAttributes = "";
            $this->W_COMORBIDS->HrefValue = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->LinkCustomAttributes = "";
            $this->H_COMORBIDS->HrefValue = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
            $this->SEXUAL_DYSFUNCTION->HrefValue = "";

            // TABLETS
            $this->TABLETS->LinkCustomAttributes = "";
            $this->TABLETS->HrefValue = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
            $this->FOLLICLE_STATUS->HrefValue = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
            $this->NUMBER_OF_IUI->HrefValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
            $this->LUTEAL_SUPPORT->HrefValue = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->LinkCustomAttributes = "";
            $this->ONGOING_PREG->HrefValue = "";

            // EDD_Date
            $this->EDD_Date->LinkCustomAttributes = "";
            $this->EDD_Date->HrefValue = "";
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
        if ($this->ARTCycle->Required) {
            if (!$this->ARTCycle->IsDetailKey && EmptyValue($this->ARTCycle->FormValue)) {
                $this->ARTCycle->addErrorMessage(str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
            }
        }
        if ($this->FemaleFactor->Required) {
            if (!$this->FemaleFactor->IsDetailKey && EmptyValue($this->FemaleFactor->FormValue)) {
                $this->FemaleFactor->addErrorMessage(str_replace("%s", $this->FemaleFactor->caption(), $this->FemaleFactor->RequiredErrorMessage));
            }
        }
        if ($this->MaleFactor->Required) {
            if (!$this->MaleFactor->IsDetailKey && EmptyValue($this->MaleFactor->FormValue)) {
                $this->MaleFactor->addErrorMessage(str_replace("%s", $this->MaleFactor->caption(), $this->MaleFactor->RequiredErrorMessage));
            }
        }
        if ($this->Protocol->Required) {
            if (!$this->Protocol->IsDetailKey && EmptyValue($this->Protocol->FormValue)) {
                $this->Protocol->addErrorMessage(str_replace("%s", $this->Protocol->caption(), $this->Protocol->RequiredErrorMessage));
            }
        }
        if ($this->SemenFrozen->Required) {
            if (!$this->SemenFrozen->IsDetailKey && EmptyValue($this->SemenFrozen->FormValue)) {
                $this->SemenFrozen->addErrorMessage(str_replace("%s", $this->SemenFrozen->caption(), $this->SemenFrozen->RequiredErrorMessage));
            }
        }
        if ($this->A4ICSICycle->Required) {
            if (!$this->A4ICSICycle->IsDetailKey && EmptyValue($this->A4ICSICycle->FormValue)) {
                $this->A4ICSICycle->addErrorMessage(str_replace("%s", $this->A4ICSICycle->caption(), $this->A4ICSICycle->RequiredErrorMessage));
            }
        }
        if ($this->TotalICSICycle->Required) {
            if (!$this->TotalICSICycle->IsDetailKey && EmptyValue($this->TotalICSICycle->FormValue)) {
                $this->TotalICSICycle->addErrorMessage(str_replace("%s", $this->TotalICSICycle->caption(), $this->TotalICSICycle->RequiredErrorMessage));
            }
        }
        if ($this->TypeOfInfertility->Required) {
            if (!$this->TypeOfInfertility->IsDetailKey && EmptyValue($this->TypeOfInfertility->FormValue)) {
                $this->TypeOfInfertility->addErrorMessage(str_replace("%s", $this->TypeOfInfertility->caption(), $this->TypeOfInfertility->RequiredErrorMessage));
            }
        }
        if ($this->Duration->Required) {
            if (!$this->Duration->IsDetailKey && EmptyValue($this->Duration->FormValue)) {
                $this->Duration->addErrorMessage(str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
            }
        }
        if ($this->LMP->Required) {
            if (!$this->LMP->IsDetailKey && EmptyValue($this->LMP->FormValue)) {
                $this->LMP->addErrorMessage(str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->LMP->FormValue)) {
            $this->LMP->addErrorMessage($this->LMP->getErrorMessage(false));
        }
        if ($this->RelevantHistory->Required) {
            if (!$this->RelevantHistory->IsDetailKey && EmptyValue($this->RelevantHistory->FormValue)) {
                $this->RelevantHistory->addErrorMessage(str_replace("%s", $this->RelevantHistory->caption(), $this->RelevantHistory->RequiredErrorMessage));
            }
        }
        if ($this->IUICycles->Required) {
            if (!$this->IUICycles->IsDetailKey && EmptyValue($this->IUICycles->FormValue)) {
                $this->IUICycles->addErrorMessage(str_replace("%s", $this->IUICycles->caption(), $this->IUICycles->RequiredErrorMessage));
            }
        }
        if ($this->AFC->Required) {
            if (!$this->AFC->IsDetailKey && EmptyValue($this->AFC->FormValue)) {
                $this->AFC->addErrorMessage(str_replace("%s", $this->AFC->caption(), $this->AFC->RequiredErrorMessage));
            }
        }
        if ($this->AMH->Required) {
            if (!$this->AMH->IsDetailKey && EmptyValue($this->AMH->FormValue)) {
                $this->AMH->addErrorMessage(str_replace("%s", $this->AMH->caption(), $this->AMH->RequiredErrorMessage));
            }
        }
        if ($this->FBMI->Required) {
            if (!$this->FBMI->IsDetailKey && EmptyValue($this->FBMI->FormValue)) {
                $this->FBMI->addErrorMessage(str_replace("%s", $this->FBMI->caption(), $this->FBMI->RequiredErrorMessage));
            }
        }
        if ($this->MBMI->Required) {
            if (!$this->MBMI->IsDetailKey && EmptyValue($this->MBMI->FormValue)) {
                $this->MBMI->addErrorMessage(str_replace("%s", $this->MBMI->caption(), $this->MBMI->RequiredErrorMessage));
            }
        }
        if ($this->OvarianVolumeRT->Required) {
            if (!$this->OvarianVolumeRT->IsDetailKey && EmptyValue($this->OvarianVolumeRT->FormValue)) {
                $this->OvarianVolumeRT->addErrorMessage(str_replace("%s", $this->OvarianVolumeRT->caption(), $this->OvarianVolumeRT->RequiredErrorMessage));
            }
        }
        if ($this->OvarianVolumeLT->Required) {
            if (!$this->OvarianVolumeLT->IsDetailKey && EmptyValue($this->OvarianVolumeLT->FormValue)) {
                $this->OvarianVolumeLT->addErrorMessage(str_replace("%s", $this->OvarianVolumeLT->caption(), $this->OvarianVolumeLT->RequiredErrorMessage));
            }
        }
        if ($this->DAYSOFSTIMULATION->Required) {
            if (!$this->DAYSOFSTIMULATION->IsDetailKey && EmptyValue($this->DAYSOFSTIMULATION->FormValue)) {
                $this->DAYSOFSTIMULATION->addErrorMessage(str_replace("%s", $this->DAYSOFSTIMULATION->caption(), $this->DAYSOFSTIMULATION->RequiredErrorMessage));
            }
        }
        if ($this->DOSEOFGONADOTROPINS->Required) {
            if (!$this->DOSEOFGONADOTROPINS->IsDetailKey && EmptyValue($this->DOSEOFGONADOTROPINS->FormValue)) {
                $this->DOSEOFGONADOTROPINS->addErrorMessage(str_replace("%s", $this->DOSEOFGONADOTROPINS->caption(), $this->DOSEOFGONADOTROPINS->RequiredErrorMessage));
            }
        }
        if ($this->INJTYPE->Required) {
            if (!$this->INJTYPE->IsDetailKey && EmptyValue($this->INJTYPE->FormValue)) {
                $this->INJTYPE->addErrorMessage(str_replace("%s", $this->INJTYPE->caption(), $this->INJTYPE->RequiredErrorMessage));
            }
        }
        if ($this->ANTAGONISTDAYS->Required) {
            if (!$this->ANTAGONISTDAYS->IsDetailKey && EmptyValue($this->ANTAGONISTDAYS->FormValue)) {
                $this->ANTAGONISTDAYS->addErrorMessage(str_replace("%s", $this->ANTAGONISTDAYS->caption(), $this->ANTAGONISTDAYS->RequiredErrorMessage));
            }
        }
        if ($this->ANTAGONISTSTARTDAY->Required) {
            if (!$this->ANTAGONISTSTARTDAY->IsDetailKey && EmptyValue($this->ANTAGONISTSTARTDAY->FormValue)) {
                $this->ANTAGONISTSTARTDAY->addErrorMessage(str_replace("%s", $this->ANTAGONISTSTARTDAY->caption(), $this->ANTAGONISTSTARTDAY->RequiredErrorMessage));
            }
        }
        if ($this->GROWTHHORMONE->Required) {
            if (!$this->GROWTHHORMONE->IsDetailKey && EmptyValue($this->GROWTHHORMONE->FormValue)) {
                $this->GROWTHHORMONE->addErrorMessage(str_replace("%s", $this->GROWTHHORMONE->caption(), $this->GROWTHHORMONE->RequiredErrorMessage));
            }
        }
        if ($this->PRETREATMENT->Required) {
            if (!$this->PRETREATMENT->IsDetailKey && EmptyValue($this->PRETREATMENT->FormValue)) {
                $this->PRETREATMENT->addErrorMessage(str_replace("%s", $this->PRETREATMENT->caption(), $this->PRETREATMENT->RequiredErrorMessage));
            }
        }
        if ($this->SerumP4->Required) {
            if (!$this->SerumP4->IsDetailKey && EmptyValue($this->SerumP4->FormValue)) {
                $this->SerumP4->addErrorMessage(str_replace("%s", $this->SerumP4->caption(), $this->SerumP4->RequiredErrorMessage));
            }
        }
        if ($this->FORT->Required) {
            if (!$this->FORT->IsDetailKey && EmptyValue($this->FORT->FormValue)) {
                $this->FORT->addErrorMessage(str_replace("%s", $this->FORT->caption(), $this->FORT->RequiredErrorMessage));
            }
        }
        if ($this->MedicalFactors->Required) {
            if (!$this->MedicalFactors->IsDetailKey && EmptyValue($this->MedicalFactors->FormValue)) {
                $this->MedicalFactors->addErrorMessage(str_replace("%s", $this->MedicalFactors->caption(), $this->MedicalFactors->RequiredErrorMessage));
            }
        }
        if ($this->SCDate->Required) {
            if (!$this->SCDate->IsDetailKey && EmptyValue($this->SCDate->FormValue)) {
                $this->SCDate->addErrorMessage(str_replace("%s", $this->SCDate->caption(), $this->SCDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SCDate->FormValue)) {
            $this->SCDate->addErrorMessage($this->SCDate->getErrorMessage(false));
        }
        if ($this->OvarianSurgery->Required) {
            if (!$this->OvarianSurgery->IsDetailKey && EmptyValue($this->OvarianSurgery->FormValue)) {
                $this->OvarianSurgery->addErrorMessage(str_replace("%s", $this->OvarianSurgery->caption(), $this->OvarianSurgery->RequiredErrorMessage));
            }
        }
        if ($this->PreProcedureOrder->Required) {
            if (!$this->PreProcedureOrder->IsDetailKey && EmptyValue($this->PreProcedureOrder->FormValue)) {
                $this->PreProcedureOrder->addErrorMessage(str_replace("%s", $this->PreProcedureOrder->caption(), $this->PreProcedureOrder->RequiredErrorMessage));
            }
        }
        if ($this->TRIGGERR->Required) {
            if (!$this->TRIGGERR->IsDetailKey && EmptyValue($this->TRIGGERR->FormValue)) {
                $this->TRIGGERR->addErrorMessage(str_replace("%s", $this->TRIGGERR->caption(), $this->TRIGGERR->RequiredErrorMessage));
            }
        }
        if ($this->TRIGGERDATE->Required) {
            if (!$this->TRIGGERDATE->IsDetailKey && EmptyValue($this->TRIGGERDATE->FormValue)) {
                $this->TRIGGERDATE->addErrorMessage(str_replace("%s", $this->TRIGGERDATE->caption(), $this->TRIGGERDATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->TRIGGERDATE->FormValue)) {
            $this->TRIGGERDATE->addErrorMessage($this->TRIGGERDATE->getErrorMessage(false));
        }
        if ($this->ATHOMEorCLINIC->Required) {
            if (!$this->ATHOMEorCLINIC->IsDetailKey && EmptyValue($this->ATHOMEorCLINIC->FormValue)) {
                $this->ATHOMEorCLINIC->addErrorMessage(str_replace("%s", $this->ATHOMEorCLINIC->caption(), $this->ATHOMEorCLINIC->RequiredErrorMessage));
            }
        }
        if ($this->OPUDATE->Required) {
            if (!$this->OPUDATE->IsDetailKey && EmptyValue($this->OPUDATE->FormValue)) {
                $this->OPUDATE->addErrorMessage(str_replace("%s", $this->OPUDATE->caption(), $this->OPUDATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OPUDATE->FormValue)) {
            $this->OPUDATE->addErrorMessage($this->OPUDATE->getErrorMessage(false));
        }
        if ($this->ALLFREEZEINDICATION->Required) {
            if (!$this->ALLFREEZEINDICATION->IsDetailKey && EmptyValue($this->ALLFREEZEINDICATION->FormValue)) {
                $this->ALLFREEZEINDICATION->addErrorMessage(str_replace("%s", $this->ALLFREEZEINDICATION->caption(), $this->ALLFREEZEINDICATION->RequiredErrorMessage));
            }
        }
        if ($this->ERA->Required) {
            if (!$this->ERA->IsDetailKey && EmptyValue($this->ERA->FormValue)) {
                $this->ERA->addErrorMessage(str_replace("%s", $this->ERA->caption(), $this->ERA->RequiredErrorMessage));
            }
        }
        if ($this->PGTA->Required) {
            if (!$this->PGTA->IsDetailKey && EmptyValue($this->PGTA->FormValue)) {
                $this->PGTA->addErrorMessage(str_replace("%s", $this->PGTA->caption(), $this->PGTA->RequiredErrorMessage));
            }
        }
        if ($this->PGD->Required) {
            if (!$this->PGD->IsDetailKey && EmptyValue($this->PGD->FormValue)) {
                $this->PGD->addErrorMessage(str_replace("%s", $this->PGD->caption(), $this->PGD->RequiredErrorMessage));
            }
        }
        if ($this->DATEOFET->Required) {
            if (!$this->DATEOFET->IsDetailKey && EmptyValue($this->DATEOFET->FormValue)) {
                $this->DATEOFET->addErrorMessage(str_replace("%s", $this->DATEOFET->caption(), $this->DATEOFET->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DATEOFET->FormValue)) {
            $this->DATEOFET->addErrorMessage($this->DATEOFET->getErrorMessage(false));
        }
        if ($this->ET->Required) {
            if (!$this->ET->IsDetailKey && EmptyValue($this->ET->FormValue)) {
                $this->ET->addErrorMessage(str_replace("%s", $this->ET->caption(), $this->ET->RequiredErrorMessage));
            }
        }
        if ($this->ESET->Required) {
            if (!$this->ESET->IsDetailKey && EmptyValue($this->ESET->FormValue)) {
                $this->ESET->addErrorMessage(str_replace("%s", $this->ESET->caption(), $this->ESET->RequiredErrorMessage));
            }
        }
        if ($this->DOET->Required) {
            if (!$this->DOET->IsDetailKey && EmptyValue($this->DOET->FormValue)) {
                $this->DOET->addErrorMessage(str_replace("%s", $this->DOET->caption(), $this->DOET->RequiredErrorMessage));
            }
        }
        if ($this->SEMENPREPARATION->Required) {
            if (!$this->SEMENPREPARATION->IsDetailKey && EmptyValue($this->SEMENPREPARATION->FormValue)) {
                $this->SEMENPREPARATION->addErrorMessage(str_replace("%s", $this->SEMENPREPARATION->caption(), $this->SEMENPREPARATION->RequiredErrorMessage));
            }
        }
        if ($this->REASONFORESET->Required) {
            if (!$this->REASONFORESET->IsDetailKey && EmptyValue($this->REASONFORESET->FormValue)) {
                $this->REASONFORESET->addErrorMessage(str_replace("%s", $this->REASONFORESET->caption(), $this->REASONFORESET->RequiredErrorMessage));
            }
        }
        if ($this->Expectedoocytes->Required) {
            if (!$this->Expectedoocytes->IsDetailKey && EmptyValue($this->Expectedoocytes->FormValue)) {
                $this->Expectedoocytes->addErrorMessage(str_replace("%s", $this->Expectedoocytes->caption(), $this->Expectedoocytes->RequiredErrorMessage));
            }
        }
        if ($this->StChDate1->Required) {
            if (!$this->StChDate1->IsDetailKey && EmptyValue($this->StChDate1->FormValue)) {
                $this->StChDate1->addErrorMessage(str_replace("%s", $this->StChDate1->caption(), $this->StChDate1->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate1->FormValue)) {
            $this->StChDate1->addErrorMessage($this->StChDate1->getErrorMessage(false));
        }
        if ($this->StChDate2->Required) {
            if (!$this->StChDate2->IsDetailKey && EmptyValue($this->StChDate2->FormValue)) {
                $this->StChDate2->addErrorMessage(str_replace("%s", $this->StChDate2->caption(), $this->StChDate2->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate2->FormValue)) {
            $this->StChDate2->addErrorMessage($this->StChDate2->getErrorMessage(false));
        }
        if ($this->StChDate3->Required) {
            if (!$this->StChDate3->IsDetailKey && EmptyValue($this->StChDate3->FormValue)) {
                $this->StChDate3->addErrorMessage(str_replace("%s", $this->StChDate3->caption(), $this->StChDate3->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate3->FormValue)) {
            $this->StChDate3->addErrorMessage($this->StChDate3->getErrorMessage(false));
        }
        if ($this->StChDate4->Required) {
            if (!$this->StChDate4->IsDetailKey && EmptyValue($this->StChDate4->FormValue)) {
                $this->StChDate4->addErrorMessage(str_replace("%s", $this->StChDate4->caption(), $this->StChDate4->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate4->FormValue)) {
            $this->StChDate4->addErrorMessage($this->StChDate4->getErrorMessage(false));
        }
        if ($this->StChDate5->Required) {
            if (!$this->StChDate5->IsDetailKey && EmptyValue($this->StChDate5->FormValue)) {
                $this->StChDate5->addErrorMessage(str_replace("%s", $this->StChDate5->caption(), $this->StChDate5->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate5->FormValue)) {
            $this->StChDate5->addErrorMessage($this->StChDate5->getErrorMessage(false));
        }
        if ($this->StChDate6->Required) {
            if (!$this->StChDate6->IsDetailKey && EmptyValue($this->StChDate6->FormValue)) {
                $this->StChDate6->addErrorMessage(str_replace("%s", $this->StChDate6->caption(), $this->StChDate6->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate6->FormValue)) {
            $this->StChDate6->addErrorMessage($this->StChDate6->getErrorMessage(false));
        }
        if ($this->StChDate7->Required) {
            if (!$this->StChDate7->IsDetailKey && EmptyValue($this->StChDate7->FormValue)) {
                $this->StChDate7->addErrorMessage(str_replace("%s", $this->StChDate7->caption(), $this->StChDate7->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate7->FormValue)) {
            $this->StChDate7->addErrorMessage($this->StChDate7->getErrorMessage(false));
        }
        if ($this->StChDate8->Required) {
            if (!$this->StChDate8->IsDetailKey && EmptyValue($this->StChDate8->FormValue)) {
                $this->StChDate8->addErrorMessage(str_replace("%s", $this->StChDate8->caption(), $this->StChDate8->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate8->FormValue)) {
            $this->StChDate8->addErrorMessage($this->StChDate8->getErrorMessage(false));
        }
        if ($this->StChDate9->Required) {
            if (!$this->StChDate9->IsDetailKey && EmptyValue($this->StChDate9->FormValue)) {
                $this->StChDate9->addErrorMessage(str_replace("%s", $this->StChDate9->caption(), $this->StChDate9->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate9->FormValue)) {
            $this->StChDate9->addErrorMessage($this->StChDate9->getErrorMessage(false));
        }
        if ($this->StChDate10->Required) {
            if (!$this->StChDate10->IsDetailKey && EmptyValue($this->StChDate10->FormValue)) {
                $this->StChDate10->addErrorMessage(str_replace("%s", $this->StChDate10->caption(), $this->StChDate10->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate10->FormValue)) {
            $this->StChDate10->addErrorMessage($this->StChDate10->getErrorMessage(false));
        }
        if ($this->StChDate11->Required) {
            if (!$this->StChDate11->IsDetailKey && EmptyValue($this->StChDate11->FormValue)) {
                $this->StChDate11->addErrorMessage(str_replace("%s", $this->StChDate11->caption(), $this->StChDate11->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate11->FormValue)) {
            $this->StChDate11->addErrorMessage($this->StChDate11->getErrorMessage(false));
        }
        if ($this->StChDate12->Required) {
            if (!$this->StChDate12->IsDetailKey && EmptyValue($this->StChDate12->FormValue)) {
                $this->StChDate12->addErrorMessage(str_replace("%s", $this->StChDate12->caption(), $this->StChDate12->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate12->FormValue)) {
            $this->StChDate12->addErrorMessage($this->StChDate12->getErrorMessage(false));
        }
        if ($this->StChDate13->Required) {
            if (!$this->StChDate13->IsDetailKey && EmptyValue($this->StChDate13->FormValue)) {
                $this->StChDate13->addErrorMessage(str_replace("%s", $this->StChDate13->caption(), $this->StChDate13->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate13->FormValue)) {
            $this->StChDate13->addErrorMessage($this->StChDate13->getErrorMessage(false));
        }
        if ($this->CycleDay1->Required) {
            if (!$this->CycleDay1->IsDetailKey && EmptyValue($this->CycleDay1->FormValue)) {
                $this->CycleDay1->addErrorMessage(str_replace("%s", $this->CycleDay1->caption(), $this->CycleDay1->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay2->Required) {
            if (!$this->CycleDay2->IsDetailKey && EmptyValue($this->CycleDay2->FormValue)) {
                $this->CycleDay2->addErrorMessage(str_replace("%s", $this->CycleDay2->caption(), $this->CycleDay2->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay3->Required) {
            if (!$this->CycleDay3->IsDetailKey && EmptyValue($this->CycleDay3->FormValue)) {
                $this->CycleDay3->addErrorMessage(str_replace("%s", $this->CycleDay3->caption(), $this->CycleDay3->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay4->Required) {
            if (!$this->CycleDay4->IsDetailKey && EmptyValue($this->CycleDay4->FormValue)) {
                $this->CycleDay4->addErrorMessage(str_replace("%s", $this->CycleDay4->caption(), $this->CycleDay4->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay5->Required) {
            if (!$this->CycleDay5->IsDetailKey && EmptyValue($this->CycleDay5->FormValue)) {
                $this->CycleDay5->addErrorMessage(str_replace("%s", $this->CycleDay5->caption(), $this->CycleDay5->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay6->Required) {
            if (!$this->CycleDay6->IsDetailKey && EmptyValue($this->CycleDay6->FormValue)) {
                $this->CycleDay6->addErrorMessage(str_replace("%s", $this->CycleDay6->caption(), $this->CycleDay6->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay7->Required) {
            if (!$this->CycleDay7->IsDetailKey && EmptyValue($this->CycleDay7->FormValue)) {
                $this->CycleDay7->addErrorMessage(str_replace("%s", $this->CycleDay7->caption(), $this->CycleDay7->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay8->Required) {
            if (!$this->CycleDay8->IsDetailKey && EmptyValue($this->CycleDay8->FormValue)) {
                $this->CycleDay8->addErrorMessage(str_replace("%s", $this->CycleDay8->caption(), $this->CycleDay8->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay9->Required) {
            if (!$this->CycleDay9->IsDetailKey && EmptyValue($this->CycleDay9->FormValue)) {
                $this->CycleDay9->addErrorMessage(str_replace("%s", $this->CycleDay9->caption(), $this->CycleDay9->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay10->Required) {
            if (!$this->CycleDay10->IsDetailKey && EmptyValue($this->CycleDay10->FormValue)) {
                $this->CycleDay10->addErrorMessage(str_replace("%s", $this->CycleDay10->caption(), $this->CycleDay10->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay11->Required) {
            if (!$this->CycleDay11->IsDetailKey && EmptyValue($this->CycleDay11->FormValue)) {
                $this->CycleDay11->addErrorMessage(str_replace("%s", $this->CycleDay11->caption(), $this->CycleDay11->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay12->Required) {
            if (!$this->CycleDay12->IsDetailKey && EmptyValue($this->CycleDay12->FormValue)) {
                $this->CycleDay12->addErrorMessage(str_replace("%s", $this->CycleDay12->caption(), $this->CycleDay12->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay13->Required) {
            if (!$this->CycleDay13->IsDetailKey && EmptyValue($this->CycleDay13->FormValue)) {
                $this->CycleDay13->addErrorMessage(str_replace("%s", $this->CycleDay13->caption(), $this->CycleDay13->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay1->Required) {
            if (!$this->StimulationDay1->IsDetailKey && EmptyValue($this->StimulationDay1->FormValue)) {
                $this->StimulationDay1->addErrorMessage(str_replace("%s", $this->StimulationDay1->caption(), $this->StimulationDay1->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay2->Required) {
            if (!$this->StimulationDay2->IsDetailKey && EmptyValue($this->StimulationDay2->FormValue)) {
                $this->StimulationDay2->addErrorMessage(str_replace("%s", $this->StimulationDay2->caption(), $this->StimulationDay2->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay3->Required) {
            if (!$this->StimulationDay3->IsDetailKey && EmptyValue($this->StimulationDay3->FormValue)) {
                $this->StimulationDay3->addErrorMessage(str_replace("%s", $this->StimulationDay3->caption(), $this->StimulationDay3->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay4->Required) {
            if (!$this->StimulationDay4->IsDetailKey && EmptyValue($this->StimulationDay4->FormValue)) {
                $this->StimulationDay4->addErrorMessage(str_replace("%s", $this->StimulationDay4->caption(), $this->StimulationDay4->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay5->Required) {
            if (!$this->StimulationDay5->IsDetailKey && EmptyValue($this->StimulationDay5->FormValue)) {
                $this->StimulationDay5->addErrorMessage(str_replace("%s", $this->StimulationDay5->caption(), $this->StimulationDay5->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay6->Required) {
            if (!$this->StimulationDay6->IsDetailKey && EmptyValue($this->StimulationDay6->FormValue)) {
                $this->StimulationDay6->addErrorMessage(str_replace("%s", $this->StimulationDay6->caption(), $this->StimulationDay6->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay7->Required) {
            if (!$this->StimulationDay7->IsDetailKey && EmptyValue($this->StimulationDay7->FormValue)) {
                $this->StimulationDay7->addErrorMessage(str_replace("%s", $this->StimulationDay7->caption(), $this->StimulationDay7->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay8->Required) {
            if (!$this->StimulationDay8->IsDetailKey && EmptyValue($this->StimulationDay8->FormValue)) {
                $this->StimulationDay8->addErrorMessage(str_replace("%s", $this->StimulationDay8->caption(), $this->StimulationDay8->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay9->Required) {
            if (!$this->StimulationDay9->IsDetailKey && EmptyValue($this->StimulationDay9->FormValue)) {
                $this->StimulationDay9->addErrorMessage(str_replace("%s", $this->StimulationDay9->caption(), $this->StimulationDay9->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay10->Required) {
            if (!$this->StimulationDay10->IsDetailKey && EmptyValue($this->StimulationDay10->FormValue)) {
                $this->StimulationDay10->addErrorMessage(str_replace("%s", $this->StimulationDay10->caption(), $this->StimulationDay10->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay11->Required) {
            if (!$this->StimulationDay11->IsDetailKey && EmptyValue($this->StimulationDay11->FormValue)) {
                $this->StimulationDay11->addErrorMessage(str_replace("%s", $this->StimulationDay11->caption(), $this->StimulationDay11->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay12->Required) {
            if (!$this->StimulationDay12->IsDetailKey && EmptyValue($this->StimulationDay12->FormValue)) {
                $this->StimulationDay12->addErrorMessage(str_replace("%s", $this->StimulationDay12->caption(), $this->StimulationDay12->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay13->Required) {
            if (!$this->StimulationDay13->IsDetailKey && EmptyValue($this->StimulationDay13->FormValue)) {
                $this->StimulationDay13->addErrorMessage(str_replace("%s", $this->StimulationDay13->caption(), $this->StimulationDay13->RequiredErrorMessage));
            }
        }
        if ($this->Tablet1->Required) {
            if (!$this->Tablet1->IsDetailKey && EmptyValue($this->Tablet1->FormValue)) {
                $this->Tablet1->addErrorMessage(str_replace("%s", $this->Tablet1->caption(), $this->Tablet1->RequiredErrorMessage));
            }
        }
        if ($this->Tablet2->Required) {
            if (!$this->Tablet2->IsDetailKey && EmptyValue($this->Tablet2->FormValue)) {
                $this->Tablet2->addErrorMessage(str_replace("%s", $this->Tablet2->caption(), $this->Tablet2->RequiredErrorMessage));
            }
        }
        if ($this->Tablet3->Required) {
            if (!$this->Tablet3->IsDetailKey && EmptyValue($this->Tablet3->FormValue)) {
                $this->Tablet3->addErrorMessage(str_replace("%s", $this->Tablet3->caption(), $this->Tablet3->RequiredErrorMessage));
            }
        }
        if ($this->Tablet4->Required) {
            if (!$this->Tablet4->IsDetailKey && EmptyValue($this->Tablet4->FormValue)) {
                $this->Tablet4->addErrorMessage(str_replace("%s", $this->Tablet4->caption(), $this->Tablet4->RequiredErrorMessage));
            }
        }
        if ($this->Tablet5->Required) {
            if (!$this->Tablet5->IsDetailKey && EmptyValue($this->Tablet5->FormValue)) {
                $this->Tablet5->addErrorMessage(str_replace("%s", $this->Tablet5->caption(), $this->Tablet5->RequiredErrorMessage));
            }
        }
        if ($this->Tablet6->Required) {
            if (!$this->Tablet6->IsDetailKey && EmptyValue($this->Tablet6->FormValue)) {
                $this->Tablet6->addErrorMessage(str_replace("%s", $this->Tablet6->caption(), $this->Tablet6->RequiredErrorMessage));
            }
        }
        if ($this->Tablet7->Required) {
            if (!$this->Tablet7->IsDetailKey && EmptyValue($this->Tablet7->FormValue)) {
                $this->Tablet7->addErrorMessage(str_replace("%s", $this->Tablet7->caption(), $this->Tablet7->RequiredErrorMessage));
            }
        }
        if ($this->Tablet8->Required) {
            if (!$this->Tablet8->IsDetailKey && EmptyValue($this->Tablet8->FormValue)) {
                $this->Tablet8->addErrorMessage(str_replace("%s", $this->Tablet8->caption(), $this->Tablet8->RequiredErrorMessage));
            }
        }
        if ($this->Tablet9->Required) {
            if (!$this->Tablet9->IsDetailKey && EmptyValue($this->Tablet9->FormValue)) {
                $this->Tablet9->addErrorMessage(str_replace("%s", $this->Tablet9->caption(), $this->Tablet9->RequiredErrorMessage));
            }
        }
        if ($this->Tablet10->Required) {
            if (!$this->Tablet10->IsDetailKey && EmptyValue($this->Tablet10->FormValue)) {
                $this->Tablet10->addErrorMessage(str_replace("%s", $this->Tablet10->caption(), $this->Tablet10->RequiredErrorMessage));
            }
        }
        if ($this->Tablet11->Required) {
            if (!$this->Tablet11->IsDetailKey && EmptyValue($this->Tablet11->FormValue)) {
                $this->Tablet11->addErrorMessage(str_replace("%s", $this->Tablet11->caption(), $this->Tablet11->RequiredErrorMessage));
            }
        }
        if ($this->Tablet12->Required) {
            if (!$this->Tablet12->IsDetailKey && EmptyValue($this->Tablet12->FormValue)) {
                $this->Tablet12->addErrorMessage(str_replace("%s", $this->Tablet12->caption(), $this->Tablet12->RequiredErrorMessage));
            }
        }
        if ($this->Tablet13->Required) {
            if (!$this->Tablet13->IsDetailKey && EmptyValue($this->Tablet13->FormValue)) {
                $this->Tablet13->addErrorMessage(str_replace("%s", $this->Tablet13->caption(), $this->Tablet13->RequiredErrorMessage));
            }
        }
        if ($this->RFSH1->Required) {
            if (!$this->RFSH1->IsDetailKey && EmptyValue($this->RFSH1->FormValue)) {
                $this->RFSH1->addErrorMessage(str_replace("%s", $this->RFSH1->caption(), $this->RFSH1->RequiredErrorMessage));
            }
        }
        if ($this->RFSH2->Required) {
            if (!$this->RFSH2->IsDetailKey && EmptyValue($this->RFSH2->FormValue)) {
                $this->RFSH2->addErrorMessage(str_replace("%s", $this->RFSH2->caption(), $this->RFSH2->RequiredErrorMessage));
            }
        }
        if ($this->RFSH3->Required) {
            if (!$this->RFSH3->IsDetailKey && EmptyValue($this->RFSH3->FormValue)) {
                $this->RFSH3->addErrorMessage(str_replace("%s", $this->RFSH3->caption(), $this->RFSH3->RequiredErrorMessage));
            }
        }
        if ($this->RFSH4->Required) {
            if (!$this->RFSH4->IsDetailKey && EmptyValue($this->RFSH4->FormValue)) {
                $this->RFSH4->addErrorMessage(str_replace("%s", $this->RFSH4->caption(), $this->RFSH4->RequiredErrorMessage));
            }
        }
        if ($this->RFSH5->Required) {
            if (!$this->RFSH5->IsDetailKey && EmptyValue($this->RFSH5->FormValue)) {
                $this->RFSH5->addErrorMessage(str_replace("%s", $this->RFSH5->caption(), $this->RFSH5->RequiredErrorMessage));
            }
        }
        if ($this->RFSH6->Required) {
            if (!$this->RFSH6->IsDetailKey && EmptyValue($this->RFSH6->FormValue)) {
                $this->RFSH6->addErrorMessage(str_replace("%s", $this->RFSH6->caption(), $this->RFSH6->RequiredErrorMessage));
            }
        }
        if ($this->RFSH7->Required) {
            if (!$this->RFSH7->IsDetailKey && EmptyValue($this->RFSH7->FormValue)) {
                $this->RFSH7->addErrorMessage(str_replace("%s", $this->RFSH7->caption(), $this->RFSH7->RequiredErrorMessage));
            }
        }
        if ($this->RFSH8->Required) {
            if (!$this->RFSH8->IsDetailKey && EmptyValue($this->RFSH8->FormValue)) {
                $this->RFSH8->addErrorMessage(str_replace("%s", $this->RFSH8->caption(), $this->RFSH8->RequiredErrorMessage));
            }
        }
        if ($this->RFSH9->Required) {
            if (!$this->RFSH9->IsDetailKey && EmptyValue($this->RFSH9->FormValue)) {
                $this->RFSH9->addErrorMessage(str_replace("%s", $this->RFSH9->caption(), $this->RFSH9->RequiredErrorMessage));
            }
        }
        if ($this->RFSH10->Required) {
            if (!$this->RFSH10->IsDetailKey && EmptyValue($this->RFSH10->FormValue)) {
                $this->RFSH10->addErrorMessage(str_replace("%s", $this->RFSH10->caption(), $this->RFSH10->RequiredErrorMessage));
            }
        }
        if ($this->RFSH11->Required) {
            if (!$this->RFSH11->IsDetailKey && EmptyValue($this->RFSH11->FormValue)) {
                $this->RFSH11->addErrorMessage(str_replace("%s", $this->RFSH11->caption(), $this->RFSH11->RequiredErrorMessage));
            }
        }
        if ($this->RFSH12->Required) {
            if (!$this->RFSH12->IsDetailKey && EmptyValue($this->RFSH12->FormValue)) {
                $this->RFSH12->addErrorMessage(str_replace("%s", $this->RFSH12->caption(), $this->RFSH12->RequiredErrorMessage));
            }
        }
        if ($this->RFSH13->Required) {
            if (!$this->RFSH13->IsDetailKey && EmptyValue($this->RFSH13->FormValue)) {
                $this->RFSH13->addErrorMessage(str_replace("%s", $this->RFSH13->caption(), $this->RFSH13->RequiredErrorMessage));
            }
        }
        if ($this->HMG1->Required) {
            if (!$this->HMG1->IsDetailKey && EmptyValue($this->HMG1->FormValue)) {
                $this->HMG1->addErrorMessage(str_replace("%s", $this->HMG1->caption(), $this->HMG1->RequiredErrorMessage));
            }
        }
        if ($this->HMG2->Required) {
            if (!$this->HMG2->IsDetailKey && EmptyValue($this->HMG2->FormValue)) {
                $this->HMG2->addErrorMessage(str_replace("%s", $this->HMG2->caption(), $this->HMG2->RequiredErrorMessage));
            }
        }
        if ($this->HMG3->Required) {
            if (!$this->HMG3->IsDetailKey && EmptyValue($this->HMG3->FormValue)) {
                $this->HMG3->addErrorMessage(str_replace("%s", $this->HMG3->caption(), $this->HMG3->RequiredErrorMessage));
            }
        }
        if ($this->HMG4->Required) {
            if (!$this->HMG4->IsDetailKey && EmptyValue($this->HMG4->FormValue)) {
                $this->HMG4->addErrorMessage(str_replace("%s", $this->HMG4->caption(), $this->HMG4->RequiredErrorMessage));
            }
        }
        if ($this->HMG5->Required) {
            if (!$this->HMG5->IsDetailKey && EmptyValue($this->HMG5->FormValue)) {
                $this->HMG5->addErrorMessage(str_replace("%s", $this->HMG5->caption(), $this->HMG5->RequiredErrorMessage));
            }
        }
        if ($this->HMG6->Required) {
            if (!$this->HMG6->IsDetailKey && EmptyValue($this->HMG6->FormValue)) {
                $this->HMG6->addErrorMessage(str_replace("%s", $this->HMG6->caption(), $this->HMG6->RequiredErrorMessage));
            }
        }
        if ($this->HMG7->Required) {
            if (!$this->HMG7->IsDetailKey && EmptyValue($this->HMG7->FormValue)) {
                $this->HMG7->addErrorMessage(str_replace("%s", $this->HMG7->caption(), $this->HMG7->RequiredErrorMessage));
            }
        }
        if ($this->HMG8->Required) {
            if (!$this->HMG8->IsDetailKey && EmptyValue($this->HMG8->FormValue)) {
                $this->HMG8->addErrorMessage(str_replace("%s", $this->HMG8->caption(), $this->HMG8->RequiredErrorMessage));
            }
        }
        if ($this->HMG9->Required) {
            if (!$this->HMG9->IsDetailKey && EmptyValue($this->HMG9->FormValue)) {
                $this->HMG9->addErrorMessage(str_replace("%s", $this->HMG9->caption(), $this->HMG9->RequiredErrorMessage));
            }
        }
        if ($this->HMG10->Required) {
            if (!$this->HMG10->IsDetailKey && EmptyValue($this->HMG10->FormValue)) {
                $this->HMG10->addErrorMessage(str_replace("%s", $this->HMG10->caption(), $this->HMG10->RequiredErrorMessage));
            }
        }
        if ($this->HMG11->Required) {
            if (!$this->HMG11->IsDetailKey && EmptyValue($this->HMG11->FormValue)) {
                $this->HMG11->addErrorMessage(str_replace("%s", $this->HMG11->caption(), $this->HMG11->RequiredErrorMessage));
            }
        }
        if ($this->HMG12->Required) {
            if (!$this->HMG12->IsDetailKey && EmptyValue($this->HMG12->FormValue)) {
                $this->HMG12->addErrorMessage(str_replace("%s", $this->HMG12->caption(), $this->HMG12->RequiredErrorMessage));
            }
        }
        if ($this->HMG13->Required) {
            if (!$this->HMG13->IsDetailKey && EmptyValue($this->HMG13->FormValue)) {
                $this->HMG13->addErrorMessage(str_replace("%s", $this->HMG13->caption(), $this->HMG13->RequiredErrorMessage));
            }
        }
        if ($this->GnRH1->Required) {
            if (!$this->GnRH1->IsDetailKey && EmptyValue($this->GnRH1->FormValue)) {
                $this->GnRH1->addErrorMessage(str_replace("%s", $this->GnRH1->caption(), $this->GnRH1->RequiredErrorMessage));
            }
        }
        if ($this->GnRH2->Required) {
            if (!$this->GnRH2->IsDetailKey && EmptyValue($this->GnRH2->FormValue)) {
                $this->GnRH2->addErrorMessage(str_replace("%s", $this->GnRH2->caption(), $this->GnRH2->RequiredErrorMessage));
            }
        }
        if ($this->GnRH3->Required) {
            if (!$this->GnRH3->IsDetailKey && EmptyValue($this->GnRH3->FormValue)) {
                $this->GnRH3->addErrorMessage(str_replace("%s", $this->GnRH3->caption(), $this->GnRH3->RequiredErrorMessage));
            }
        }
        if ($this->GnRH4->Required) {
            if (!$this->GnRH4->IsDetailKey && EmptyValue($this->GnRH4->FormValue)) {
                $this->GnRH4->addErrorMessage(str_replace("%s", $this->GnRH4->caption(), $this->GnRH4->RequiredErrorMessage));
            }
        }
        if ($this->GnRH5->Required) {
            if (!$this->GnRH5->IsDetailKey && EmptyValue($this->GnRH5->FormValue)) {
                $this->GnRH5->addErrorMessage(str_replace("%s", $this->GnRH5->caption(), $this->GnRH5->RequiredErrorMessage));
            }
        }
        if ($this->GnRH6->Required) {
            if (!$this->GnRH6->IsDetailKey && EmptyValue($this->GnRH6->FormValue)) {
                $this->GnRH6->addErrorMessage(str_replace("%s", $this->GnRH6->caption(), $this->GnRH6->RequiredErrorMessage));
            }
        }
        if ($this->GnRH7->Required) {
            if (!$this->GnRH7->IsDetailKey && EmptyValue($this->GnRH7->FormValue)) {
                $this->GnRH7->addErrorMessage(str_replace("%s", $this->GnRH7->caption(), $this->GnRH7->RequiredErrorMessage));
            }
        }
        if ($this->GnRH8->Required) {
            if (!$this->GnRH8->IsDetailKey && EmptyValue($this->GnRH8->FormValue)) {
                $this->GnRH8->addErrorMessage(str_replace("%s", $this->GnRH8->caption(), $this->GnRH8->RequiredErrorMessage));
            }
        }
        if ($this->GnRH9->Required) {
            if (!$this->GnRH9->IsDetailKey && EmptyValue($this->GnRH9->FormValue)) {
                $this->GnRH9->addErrorMessage(str_replace("%s", $this->GnRH9->caption(), $this->GnRH9->RequiredErrorMessage));
            }
        }
        if ($this->GnRH10->Required) {
            if (!$this->GnRH10->IsDetailKey && EmptyValue($this->GnRH10->FormValue)) {
                $this->GnRH10->addErrorMessage(str_replace("%s", $this->GnRH10->caption(), $this->GnRH10->RequiredErrorMessage));
            }
        }
        if ($this->GnRH11->Required) {
            if (!$this->GnRH11->IsDetailKey && EmptyValue($this->GnRH11->FormValue)) {
                $this->GnRH11->addErrorMessage(str_replace("%s", $this->GnRH11->caption(), $this->GnRH11->RequiredErrorMessage));
            }
        }
        if ($this->GnRH12->Required) {
            if (!$this->GnRH12->IsDetailKey && EmptyValue($this->GnRH12->FormValue)) {
                $this->GnRH12->addErrorMessage(str_replace("%s", $this->GnRH12->caption(), $this->GnRH12->RequiredErrorMessage));
            }
        }
        if ($this->GnRH13->Required) {
            if (!$this->GnRH13->IsDetailKey && EmptyValue($this->GnRH13->FormValue)) {
                $this->GnRH13->addErrorMessage(str_replace("%s", $this->GnRH13->caption(), $this->GnRH13->RequiredErrorMessage));
            }
        }
        if ($this->E21->Required) {
            if (!$this->E21->IsDetailKey && EmptyValue($this->E21->FormValue)) {
                $this->E21->addErrorMessage(str_replace("%s", $this->E21->caption(), $this->E21->RequiredErrorMessage));
            }
        }
        if ($this->E22->Required) {
            if (!$this->E22->IsDetailKey && EmptyValue($this->E22->FormValue)) {
                $this->E22->addErrorMessage(str_replace("%s", $this->E22->caption(), $this->E22->RequiredErrorMessage));
            }
        }
        if ($this->E23->Required) {
            if (!$this->E23->IsDetailKey && EmptyValue($this->E23->FormValue)) {
                $this->E23->addErrorMessage(str_replace("%s", $this->E23->caption(), $this->E23->RequiredErrorMessage));
            }
        }
        if ($this->E24->Required) {
            if (!$this->E24->IsDetailKey && EmptyValue($this->E24->FormValue)) {
                $this->E24->addErrorMessage(str_replace("%s", $this->E24->caption(), $this->E24->RequiredErrorMessage));
            }
        }
        if ($this->E25->Required) {
            if (!$this->E25->IsDetailKey && EmptyValue($this->E25->FormValue)) {
                $this->E25->addErrorMessage(str_replace("%s", $this->E25->caption(), $this->E25->RequiredErrorMessage));
            }
        }
        if ($this->E26->Required) {
            if (!$this->E26->IsDetailKey && EmptyValue($this->E26->FormValue)) {
                $this->E26->addErrorMessage(str_replace("%s", $this->E26->caption(), $this->E26->RequiredErrorMessage));
            }
        }
        if ($this->E27->Required) {
            if (!$this->E27->IsDetailKey && EmptyValue($this->E27->FormValue)) {
                $this->E27->addErrorMessage(str_replace("%s", $this->E27->caption(), $this->E27->RequiredErrorMessage));
            }
        }
        if ($this->E28->Required) {
            if (!$this->E28->IsDetailKey && EmptyValue($this->E28->FormValue)) {
                $this->E28->addErrorMessage(str_replace("%s", $this->E28->caption(), $this->E28->RequiredErrorMessage));
            }
        }
        if ($this->E29->Required) {
            if (!$this->E29->IsDetailKey && EmptyValue($this->E29->FormValue)) {
                $this->E29->addErrorMessage(str_replace("%s", $this->E29->caption(), $this->E29->RequiredErrorMessage));
            }
        }
        if ($this->E210->Required) {
            if (!$this->E210->IsDetailKey && EmptyValue($this->E210->FormValue)) {
                $this->E210->addErrorMessage(str_replace("%s", $this->E210->caption(), $this->E210->RequiredErrorMessage));
            }
        }
        if ($this->E211->Required) {
            if (!$this->E211->IsDetailKey && EmptyValue($this->E211->FormValue)) {
                $this->E211->addErrorMessage(str_replace("%s", $this->E211->caption(), $this->E211->RequiredErrorMessage));
            }
        }
        if ($this->E212->Required) {
            if (!$this->E212->IsDetailKey && EmptyValue($this->E212->FormValue)) {
                $this->E212->addErrorMessage(str_replace("%s", $this->E212->caption(), $this->E212->RequiredErrorMessage));
            }
        }
        if ($this->E213->Required) {
            if (!$this->E213->IsDetailKey && EmptyValue($this->E213->FormValue)) {
                $this->E213->addErrorMessage(str_replace("%s", $this->E213->caption(), $this->E213->RequiredErrorMessage));
            }
        }
        if ($this->P41->Required) {
            if (!$this->P41->IsDetailKey && EmptyValue($this->P41->FormValue)) {
                $this->P41->addErrorMessage(str_replace("%s", $this->P41->caption(), $this->P41->RequiredErrorMessage));
            }
        }
        if ($this->P42->Required) {
            if (!$this->P42->IsDetailKey && EmptyValue($this->P42->FormValue)) {
                $this->P42->addErrorMessage(str_replace("%s", $this->P42->caption(), $this->P42->RequiredErrorMessage));
            }
        }
        if ($this->P43->Required) {
            if (!$this->P43->IsDetailKey && EmptyValue($this->P43->FormValue)) {
                $this->P43->addErrorMessage(str_replace("%s", $this->P43->caption(), $this->P43->RequiredErrorMessage));
            }
        }
        if ($this->P44->Required) {
            if (!$this->P44->IsDetailKey && EmptyValue($this->P44->FormValue)) {
                $this->P44->addErrorMessage(str_replace("%s", $this->P44->caption(), $this->P44->RequiredErrorMessage));
            }
        }
        if ($this->P45->Required) {
            if (!$this->P45->IsDetailKey && EmptyValue($this->P45->FormValue)) {
                $this->P45->addErrorMessage(str_replace("%s", $this->P45->caption(), $this->P45->RequiredErrorMessage));
            }
        }
        if ($this->P46->Required) {
            if (!$this->P46->IsDetailKey && EmptyValue($this->P46->FormValue)) {
                $this->P46->addErrorMessage(str_replace("%s", $this->P46->caption(), $this->P46->RequiredErrorMessage));
            }
        }
        if ($this->P47->Required) {
            if (!$this->P47->IsDetailKey && EmptyValue($this->P47->FormValue)) {
                $this->P47->addErrorMessage(str_replace("%s", $this->P47->caption(), $this->P47->RequiredErrorMessage));
            }
        }
        if ($this->P48->Required) {
            if (!$this->P48->IsDetailKey && EmptyValue($this->P48->FormValue)) {
                $this->P48->addErrorMessage(str_replace("%s", $this->P48->caption(), $this->P48->RequiredErrorMessage));
            }
        }
        if ($this->P49->Required) {
            if (!$this->P49->IsDetailKey && EmptyValue($this->P49->FormValue)) {
                $this->P49->addErrorMessage(str_replace("%s", $this->P49->caption(), $this->P49->RequiredErrorMessage));
            }
        }
        if ($this->P410->Required) {
            if (!$this->P410->IsDetailKey && EmptyValue($this->P410->FormValue)) {
                $this->P410->addErrorMessage(str_replace("%s", $this->P410->caption(), $this->P410->RequiredErrorMessage));
            }
        }
        if ($this->P411->Required) {
            if (!$this->P411->IsDetailKey && EmptyValue($this->P411->FormValue)) {
                $this->P411->addErrorMessage(str_replace("%s", $this->P411->caption(), $this->P411->RequiredErrorMessage));
            }
        }
        if ($this->P412->Required) {
            if (!$this->P412->IsDetailKey && EmptyValue($this->P412->FormValue)) {
                $this->P412->addErrorMessage(str_replace("%s", $this->P412->caption(), $this->P412->RequiredErrorMessage));
            }
        }
        if ($this->P413->Required) {
            if (!$this->P413->IsDetailKey && EmptyValue($this->P413->FormValue)) {
                $this->P413->addErrorMessage(str_replace("%s", $this->P413->caption(), $this->P413->RequiredErrorMessage));
            }
        }
        if ($this->USGRt1->Required) {
            if (!$this->USGRt1->IsDetailKey && EmptyValue($this->USGRt1->FormValue)) {
                $this->USGRt1->addErrorMessage(str_replace("%s", $this->USGRt1->caption(), $this->USGRt1->RequiredErrorMessage));
            }
        }
        if ($this->USGRt2->Required) {
            if (!$this->USGRt2->IsDetailKey && EmptyValue($this->USGRt2->FormValue)) {
                $this->USGRt2->addErrorMessage(str_replace("%s", $this->USGRt2->caption(), $this->USGRt2->RequiredErrorMessage));
            }
        }
        if ($this->USGRt3->Required) {
            if (!$this->USGRt3->IsDetailKey && EmptyValue($this->USGRt3->FormValue)) {
                $this->USGRt3->addErrorMessage(str_replace("%s", $this->USGRt3->caption(), $this->USGRt3->RequiredErrorMessage));
            }
        }
        if ($this->USGRt4->Required) {
            if (!$this->USGRt4->IsDetailKey && EmptyValue($this->USGRt4->FormValue)) {
                $this->USGRt4->addErrorMessage(str_replace("%s", $this->USGRt4->caption(), $this->USGRt4->RequiredErrorMessage));
            }
        }
        if ($this->USGRt5->Required) {
            if (!$this->USGRt5->IsDetailKey && EmptyValue($this->USGRt5->FormValue)) {
                $this->USGRt5->addErrorMessage(str_replace("%s", $this->USGRt5->caption(), $this->USGRt5->RequiredErrorMessage));
            }
        }
        if ($this->USGRt6->Required) {
            if (!$this->USGRt6->IsDetailKey && EmptyValue($this->USGRt6->FormValue)) {
                $this->USGRt6->addErrorMessage(str_replace("%s", $this->USGRt6->caption(), $this->USGRt6->RequiredErrorMessage));
            }
        }
        if ($this->USGRt7->Required) {
            if (!$this->USGRt7->IsDetailKey && EmptyValue($this->USGRt7->FormValue)) {
                $this->USGRt7->addErrorMessage(str_replace("%s", $this->USGRt7->caption(), $this->USGRt7->RequiredErrorMessage));
            }
        }
        if ($this->USGRt8->Required) {
            if (!$this->USGRt8->IsDetailKey && EmptyValue($this->USGRt8->FormValue)) {
                $this->USGRt8->addErrorMessage(str_replace("%s", $this->USGRt8->caption(), $this->USGRt8->RequiredErrorMessage));
            }
        }
        if ($this->USGRt9->Required) {
            if (!$this->USGRt9->IsDetailKey && EmptyValue($this->USGRt9->FormValue)) {
                $this->USGRt9->addErrorMessage(str_replace("%s", $this->USGRt9->caption(), $this->USGRt9->RequiredErrorMessage));
            }
        }
        if ($this->USGRt10->Required) {
            if (!$this->USGRt10->IsDetailKey && EmptyValue($this->USGRt10->FormValue)) {
                $this->USGRt10->addErrorMessage(str_replace("%s", $this->USGRt10->caption(), $this->USGRt10->RequiredErrorMessage));
            }
        }
        if ($this->USGRt11->Required) {
            if (!$this->USGRt11->IsDetailKey && EmptyValue($this->USGRt11->FormValue)) {
                $this->USGRt11->addErrorMessage(str_replace("%s", $this->USGRt11->caption(), $this->USGRt11->RequiredErrorMessage));
            }
        }
        if ($this->USGRt12->Required) {
            if (!$this->USGRt12->IsDetailKey && EmptyValue($this->USGRt12->FormValue)) {
                $this->USGRt12->addErrorMessage(str_replace("%s", $this->USGRt12->caption(), $this->USGRt12->RequiredErrorMessage));
            }
        }
        if ($this->USGRt13->Required) {
            if (!$this->USGRt13->IsDetailKey && EmptyValue($this->USGRt13->FormValue)) {
                $this->USGRt13->addErrorMessage(str_replace("%s", $this->USGRt13->caption(), $this->USGRt13->RequiredErrorMessage));
            }
        }
        if ($this->USGLt1->Required) {
            if (!$this->USGLt1->IsDetailKey && EmptyValue($this->USGLt1->FormValue)) {
                $this->USGLt1->addErrorMessage(str_replace("%s", $this->USGLt1->caption(), $this->USGLt1->RequiredErrorMessage));
            }
        }
        if ($this->USGLt2->Required) {
            if (!$this->USGLt2->IsDetailKey && EmptyValue($this->USGLt2->FormValue)) {
                $this->USGLt2->addErrorMessage(str_replace("%s", $this->USGLt2->caption(), $this->USGLt2->RequiredErrorMessage));
            }
        }
        if ($this->USGLt3->Required) {
            if (!$this->USGLt3->IsDetailKey && EmptyValue($this->USGLt3->FormValue)) {
                $this->USGLt3->addErrorMessage(str_replace("%s", $this->USGLt3->caption(), $this->USGLt3->RequiredErrorMessage));
            }
        }
        if ($this->USGLt4->Required) {
            if (!$this->USGLt4->IsDetailKey && EmptyValue($this->USGLt4->FormValue)) {
                $this->USGLt4->addErrorMessage(str_replace("%s", $this->USGLt4->caption(), $this->USGLt4->RequiredErrorMessage));
            }
        }
        if ($this->USGLt5->Required) {
            if (!$this->USGLt5->IsDetailKey && EmptyValue($this->USGLt5->FormValue)) {
                $this->USGLt5->addErrorMessage(str_replace("%s", $this->USGLt5->caption(), $this->USGLt5->RequiredErrorMessage));
            }
        }
        if ($this->USGLt6->Required) {
            if (!$this->USGLt6->IsDetailKey && EmptyValue($this->USGLt6->FormValue)) {
                $this->USGLt6->addErrorMessage(str_replace("%s", $this->USGLt6->caption(), $this->USGLt6->RequiredErrorMessage));
            }
        }
        if ($this->USGLt7->Required) {
            if (!$this->USGLt7->IsDetailKey && EmptyValue($this->USGLt7->FormValue)) {
                $this->USGLt7->addErrorMessage(str_replace("%s", $this->USGLt7->caption(), $this->USGLt7->RequiredErrorMessage));
            }
        }
        if ($this->USGLt8->Required) {
            if (!$this->USGLt8->IsDetailKey && EmptyValue($this->USGLt8->FormValue)) {
                $this->USGLt8->addErrorMessage(str_replace("%s", $this->USGLt8->caption(), $this->USGLt8->RequiredErrorMessage));
            }
        }
        if ($this->USGLt9->Required) {
            if (!$this->USGLt9->IsDetailKey && EmptyValue($this->USGLt9->FormValue)) {
                $this->USGLt9->addErrorMessage(str_replace("%s", $this->USGLt9->caption(), $this->USGLt9->RequiredErrorMessage));
            }
        }
        if ($this->USGLt10->Required) {
            if (!$this->USGLt10->IsDetailKey && EmptyValue($this->USGLt10->FormValue)) {
                $this->USGLt10->addErrorMessage(str_replace("%s", $this->USGLt10->caption(), $this->USGLt10->RequiredErrorMessage));
            }
        }
        if ($this->USGLt11->Required) {
            if (!$this->USGLt11->IsDetailKey && EmptyValue($this->USGLt11->FormValue)) {
                $this->USGLt11->addErrorMessage(str_replace("%s", $this->USGLt11->caption(), $this->USGLt11->RequiredErrorMessage));
            }
        }
        if ($this->USGLt12->Required) {
            if (!$this->USGLt12->IsDetailKey && EmptyValue($this->USGLt12->FormValue)) {
                $this->USGLt12->addErrorMessage(str_replace("%s", $this->USGLt12->caption(), $this->USGLt12->RequiredErrorMessage));
            }
        }
        if ($this->USGLt13->Required) {
            if (!$this->USGLt13->IsDetailKey && EmptyValue($this->USGLt13->FormValue)) {
                $this->USGLt13->addErrorMessage(str_replace("%s", $this->USGLt13->caption(), $this->USGLt13->RequiredErrorMessage));
            }
        }
        if ($this->EM1->Required) {
            if (!$this->EM1->IsDetailKey && EmptyValue($this->EM1->FormValue)) {
                $this->EM1->addErrorMessage(str_replace("%s", $this->EM1->caption(), $this->EM1->RequiredErrorMessage));
            }
        }
        if ($this->EM2->Required) {
            if (!$this->EM2->IsDetailKey && EmptyValue($this->EM2->FormValue)) {
                $this->EM2->addErrorMessage(str_replace("%s", $this->EM2->caption(), $this->EM2->RequiredErrorMessage));
            }
        }
        if ($this->EM3->Required) {
            if (!$this->EM3->IsDetailKey && EmptyValue($this->EM3->FormValue)) {
                $this->EM3->addErrorMessage(str_replace("%s", $this->EM3->caption(), $this->EM3->RequiredErrorMessage));
            }
        }
        if ($this->EM4->Required) {
            if (!$this->EM4->IsDetailKey && EmptyValue($this->EM4->FormValue)) {
                $this->EM4->addErrorMessage(str_replace("%s", $this->EM4->caption(), $this->EM4->RequiredErrorMessage));
            }
        }
        if ($this->EM5->Required) {
            if (!$this->EM5->IsDetailKey && EmptyValue($this->EM5->FormValue)) {
                $this->EM5->addErrorMessage(str_replace("%s", $this->EM5->caption(), $this->EM5->RequiredErrorMessage));
            }
        }
        if ($this->EM6->Required) {
            if (!$this->EM6->IsDetailKey && EmptyValue($this->EM6->FormValue)) {
                $this->EM6->addErrorMessage(str_replace("%s", $this->EM6->caption(), $this->EM6->RequiredErrorMessage));
            }
        }
        if ($this->EM7->Required) {
            if (!$this->EM7->IsDetailKey && EmptyValue($this->EM7->FormValue)) {
                $this->EM7->addErrorMessage(str_replace("%s", $this->EM7->caption(), $this->EM7->RequiredErrorMessage));
            }
        }
        if ($this->EM8->Required) {
            if (!$this->EM8->IsDetailKey && EmptyValue($this->EM8->FormValue)) {
                $this->EM8->addErrorMessage(str_replace("%s", $this->EM8->caption(), $this->EM8->RequiredErrorMessage));
            }
        }
        if ($this->EM9->Required) {
            if (!$this->EM9->IsDetailKey && EmptyValue($this->EM9->FormValue)) {
                $this->EM9->addErrorMessage(str_replace("%s", $this->EM9->caption(), $this->EM9->RequiredErrorMessage));
            }
        }
        if ($this->EM10->Required) {
            if (!$this->EM10->IsDetailKey && EmptyValue($this->EM10->FormValue)) {
                $this->EM10->addErrorMessage(str_replace("%s", $this->EM10->caption(), $this->EM10->RequiredErrorMessage));
            }
        }
        if ($this->EM11->Required) {
            if (!$this->EM11->IsDetailKey && EmptyValue($this->EM11->FormValue)) {
                $this->EM11->addErrorMessage(str_replace("%s", $this->EM11->caption(), $this->EM11->RequiredErrorMessage));
            }
        }
        if ($this->EM12->Required) {
            if (!$this->EM12->IsDetailKey && EmptyValue($this->EM12->FormValue)) {
                $this->EM12->addErrorMessage(str_replace("%s", $this->EM12->caption(), $this->EM12->RequiredErrorMessage));
            }
        }
        if ($this->EM13->Required) {
            if (!$this->EM13->IsDetailKey && EmptyValue($this->EM13->FormValue)) {
                $this->EM13->addErrorMessage(str_replace("%s", $this->EM13->caption(), $this->EM13->RequiredErrorMessage));
            }
        }
        if ($this->Others1->Required) {
            if (!$this->Others1->IsDetailKey && EmptyValue($this->Others1->FormValue)) {
                $this->Others1->addErrorMessage(str_replace("%s", $this->Others1->caption(), $this->Others1->RequiredErrorMessage));
            }
        }
        if ($this->Others2->Required) {
            if (!$this->Others2->IsDetailKey && EmptyValue($this->Others2->FormValue)) {
                $this->Others2->addErrorMessage(str_replace("%s", $this->Others2->caption(), $this->Others2->RequiredErrorMessage));
            }
        }
        if ($this->Others3->Required) {
            if (!$this->Others3->IsDetailKey && EmptyValue($this->Others3->FormValue)) {
                $this->Others3->addErrorMessage(str_replace("%s", $this->Others3->caption(), $this->Others3->RequiredErrorMessage));
            }
        }
        if ($this->Others4->Required) {
            if (!$this->Others4->IsDetailKey && EmptyValue($this->Others4->FormValue)) {
                $this->Others4->addErrorMessage(str_replace("%s", $this->Others4->caption(), $this->Others4->RequiredErrorMessage));
            }
        }
        if ($this->Others5->Required) {
            if (!$this->Others5->IsDetailKey && EmptyValue($this->Others5->FormValue)) {
                $this->Others5->addErrorMessage(str_replace("%s", $this->Others5->caption(), $this->Others5->RequiredErrorMessage));
            }
        }
        if ($this->Others6->Required) {
            if (!$this->Others6->IsDetailKey && EmptyValue($this->Others6->FormValue)) {
                $this->Others6->addErrorMessage(str_replace("%s", $this->Others6->caption(), $this->Others6->RequiredErrorMessage));
            }
        }
        if ($this->Others7->Required) {
            if (!$this->Others7->IsDetailKey && EmptyValue($this->Others7->FormValue)) {
                $this->Others7->addErrorMessage(str_replace("%s", $this->Others7->caption(), $this->Others7->RequiredErrorMessage));
            }
        }
        if ($this->Others8->Required) {
            if (!$this->Others8->IsDetailKey && EmptyValue($this->Others8->FormValue)) {
                $this->Others8->addErrorMessage(str_replace("%s", $this->Others8->caption(), $this->Others8->RequiredErrorMessage));
            }
        }
        if ($this->Others9->Required) {
            if (!$this->Others9->IsDetailKey && EmptyValue($this->Others9->FormValue)) {
                $this->Others9->addErrorMessage(str_replace("%s", $this->Others9->caption(), $this->Others9->RequiredErrorMessage));
            }
        }
        if ($this->Others10->Required) {
            if (!$this->Others10->IsDetailKey && EmptyValue($this->Others10->FormValue)) {
                $this->Others10->addErrorMessage(str_replace("%s", $this->Others10->caption(), $this->Others10->RequiredErrorMessage));
            }
        }
        if ($this->Others11->Required) {
            if (!$this->Others11->IsDetailKey && EmptyValue($this->Others11->FormValue)) {
                $this->Others11->addErrorMessage(str_replace("%s", $this->Others11->caption(), $this->Others11->RequiredErrorMessage));
            }
        }
        if ($this->Others12->Required) {
            if (!$this->Others12->IsDetailKey && EmptyValue($this->Others12->FormValue)) {
                $this->Others12->addErrorMessage(str_replace("%s", $this->Others12->caption(), $this->Others12->RequiredErrorMessage));
            }
        }
        if ($this->Others13->Required) {
            if (!$this->Others13->IsDetailKey && EmptyValue($this->Others13->FormValue)) {
                $this->Others13->addErrorMessage(str_replace("%s", $this->Others13->caption(), $this->Others13->RequiredErrorMessage));
            }
        }
        if ($this->DR1->Required) {
            if (!$this->DR1->IsDetailKey && EmptyValue($this->DR1->FormValue)) {
                $this->DR1->addErrorMessage(str_replace("%s", $this->DR1->caption(), $this->DR1->RequiredErrorMessage));
            }
        }
        if ($this->DR2->Required) {
            if (!$this->DR2->IsDetailKey && EmptyValue($this->DR2->FormValue)) {
                $this->DR2->addErrorMessage(str_replace("%s", $this->DR2->caption(), $this->DR2->RequiredErrorMessage));
            }
        }
        if ($this->DR3->Required) {
            if (!$this->DR3->IsDetailKey && EmptyValue($this->DR3->FormValue)) {
                $this->DR3->addErrorMessage(str_replace("%s", $this->DR3->caption(), $this->DR3->RequiredErrorMessage));
            }
        }
        if ($this->DR4->Required) {
            if (!$this->DR4->IsDetailKey && EmptyValue($this->DR4->FormValue)) {
                $this->DR4->addErrorMessage(str_replace("%s", $this->DR4->caption(), $this->DR4->RequiredErrorMessage));
            }
        }
        if ($this->DR5->Required) {
            if (!$this->DR5->IsDetailKey && EmptyValue($this->DR5->FormValue)) {
                $this->DR5->addErrorMessage(str_replace("%s", $this->DR5->caption(), $this->DR5->RequiredErrorMessage));
            }
        }
        if ($this->DR6->Required) {
            if (!$this->DR6->IsDetailKey && EmptyValue($this->DR6->FormValue)) {
                $this->DR6->addErrorMessage(str_replace("%s", $this->DR6->caption(), $this->DR6->RequiredErrorMessage));
            }
        }
        if ($this->DR7->Required) {
            if (!$this->DR7->IsDetailKey && EmptyValue($this->DR7->FormValue)) {
                $this->DR7->addErrorMessage(str_replace("%s", $this->DR7->caption(), $this->DR7->RequiredErrorMessage));
            }
        }
        if ($this->DR8->Required) {
            if (!$this->DR8->IsDetailKey && EmptyValue($this->DR8->FormValue)) {
                $this->DR8->addErrorMessage(str_replace("%s", $this->DR8->caption(), $this->DR8->RequiredErrorMessage));
            }
        }
        if ($this->DR9->Required) {
            if (!$this->DR9->IsDetailKey && EmptyValue($this->DR9->FormValue)) {
                $this->DR9->addErrorMessage(str_replace("%s", $this->DR9->caption(), $this->DR9->RequiredErrorMessage));
            }
        }
        if ($this->DR10->Required) {
            if (!$this->DR10->IsDetailKey && EmptyValue($this->DR10->FormValue)) {
                $this->DR10->addErrorMessage(str_replace("%s", $this->DR10->caption(), $this->DR10->RequiredErrorMessage));
            }
        }
        if ($this->DR11->Required) {
            if (!$this->DR11->IsDetailKey && EmptyValue($this->DR11->FormValue)) {
                $this->DR11->addErrorMessage(str_replace("%s", $this->DR11->caption(), $this->DR11->RequiredErrorMessage));
            }
        }
        if ($this->DR12->Required) {
            if (!$this->DR12->IsDetailKey && EmptyValue($this->DR12->FormValue)) {
                $this->DR12->addErrorMessage(str_replace("%s", $this->DR12->caption(), $this->DR12->RequiredErrorMessage));
            }
        }
        if ($this->DR13->Required) {
            if (!$this->DR13->IsDetailKey && EmptyValue($this->DR13->FormValue)) {
                $this->DR13->addErrorMessage(str_replace("%s", $this->DR13->caption(), $this->DR13->RequiredErrorMessage));
            }
        }
        if ($this->DOCTORRESPONSIBLE->Required) {
            if (!$this->DOCTORRESPONSIBLE->IsDetailKey && EmptyValue($this->DOCTORRESPONSIBLE->FormValue)) {
                $this->DOCTORRESPONSIBLE->addErrorMessage(str_replace("%s", $this->DOCTORRESPONSIBLE->caption(), $this->DOCTORRESPONSIBLE->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->Convert->Required) {
            if (!$this->Convert->IsDetailKey && EmptyValue($this->Convert->FormValue)) {
                $this->Convert->addErrorMessage(str_replace("%s", $this->Convert->caption(), $this->Convert->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->InseminatinTechnique->Required) {
            if (!$this->InseminatinTechnique->IsDetailKey && EmptyValue($this->InseminatinTechnique->FormValue)) {
                $this->InseminatinTechnique->addErrorMessage(str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
            }
        }
        if ($this->IndicationForART->Required) {
            if (!$this->IndicationForART->IsDetailKey && EmptyValue($this->IndicationForART->FormValue)) {
                $this->IndicationForART->addErrorMessage(str_replace("%s", $this->IndicationForART->caption(), $this->IndicationForART->RequiredErrorMessage));
            }
        }
        if ($this->Hysteroscopy->Required) {
            if (!$this->Hysteroscopy->IsDetailKey && EmptyValue($this->Hysteroscopy->FormValue)) {
                $this->Hysteroscopy->addErrorMessage(str_replace("%s", $this->Hysteroscopy->caption(), $this->Hysteroscopy->RequiredErrorMessage));
            }
        }
        if ($this->EndometrialScratching->Required) {
            if (!$this->EndometrialScratching->IsDetailKey && EmptyValue($this->EndometrialScratching->FormValue)) {
                $this->EndometrialScratching->addErrorMessage(str_replace("%s", $this->EndometrialScratching->caption(), $this->EndometrialScratching->RequiredErrorMessage));
            }
        }
        if ($this->TrialCannulation->Required) {
            if (!$this->TrialCannulation->IsDetailKey && EmptyValue($this->TrialCannulation->FormValue)) {
                $this->TrialCannulation->addErrorMessage(str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
            }
        }
        if ($this->CYCLETYPE->Required) {
            if (!$this->CYCLETYPE->IsDetailKey && EmptyValue($this->CYCLETYPE->FormValue)) {
                $this->CYCLETYPE->addErrorMessage(str_replace("%s", $this->CYCLETYPE->caption(), $this->CYCLETYPE->RequiredErrorMessage));
            }
        }
        if ($this->HRTCYCLE->Required) {
            if (!$this->HRTCYCLE->IsDetailKey && EmptyValue($this->HRTCYCLE->FormValue)) {
                $this->HRTCYCLE->addErrorMessage(str_replace("%s", $this->HRTCYCLE->caption(), $this->HRTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->OralEstrogenDosage->Required) {
            if (!$this->OralEstrogenDosage->IsDetailKey && EmptyValue($this->OralEstrogenDosage->FormValue)) {
                $this->OralEstrogenDosage->addErrorMessage(str_replace("%s", $this->OralEstrogenDosage->caption(), $this->OralEstrogenDosage->RequiredErrorMessage));
            }
        }
        if ($this->VaginalEstrogen->Required) {
            if (!$this->VaginalEstrogen->IsDetailKey && EmptyValue($this->VaginalEstrogen->FormValue)) {
                $this->VaginalEstrogen->addErrorMessage(str_replace("%s", $this->VaginalEstrogen->caption(), $this->VaginalEstrogen->RequiredErrorMessage));
            }
        }
        if ($this->GCSF->Required) {
            if (!$this->GCSF->IsDetailKey && EmptyValue($this->GCSF->FormValue)) {
                $this->GCSF->addErrorMessage(str_replace("%s", $this->GCSF->caption(), $this->GCSF->RequiredErrorMessage));
            }
        }
        if ($this->ActivatedPRP->Required) {
            if (!$this->ActivatedPRP->IsDetailKey && EmptyValue($this->ActivatedPRP->FormValue)) {
                $this->ActivatedPRP->addErrorMessage(str_replace("%s", $this->ActivatedPRP->caption(), $this->ActivatedPRP->RequiredErrorMessage));
            }
        }
        if ($this->UCLcm->Required) {
            if (!$this->UCLcm->IsDetailKey && EmptyValue($this->UCLcm->FormValue)) {
                $this->UCLcm->addErrorMessage(str_replace("%s", $this->UCLcm->caption(), $this->UCLcm->RequiredErrorMessage));
            }
        }
        if ($this->DATOFEMBRYOTRANSFER->Required) {
            if (!$this->DATOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DATOFEMBRYOTRANSFER->FormValue)) {
                $this->DATOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DATOFEMBRYOTRANSFER->caption(), $this->DATOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DATOFEMBRYOTRANSFER->FormValue)) {
            $this->DATOFEMBRYOTRANSFER->addErrorMessage($this->DATOFEMBRYOTRANSFER->getErrorMessage(false));
        }
        if ($this->DAYOFEMBRYOTRANSFER->Required) {
            if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DAYOFEMBRYOTRANSFER->FormValue)) {
                $this->DAYOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOTRANSFER->caption(), $this->DAYOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTHAWED->Required) {
            if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTHAWED->FormValue)) {
                $this->NOOFEMBRYOSTHAWED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTHAWED->caption(), $this->NOOFEMBRYOSTHAWED->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTRANSFERRED->Required) {
            if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTRANSFERRED->FormValue)) {
                $this->NOOFEMBRYOSTRANSFERRED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTRANSFERRED->caption(), $this->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage));
            }
        }
        if ($this->DAYOFEMBRYOS->Required) {
            if (!$this->DAYOFEMBRYOS->IsDetailKey && EmptyValue($this->DAYOFEMBRYOS->FormValue)) {
                $this->DAYOFEMBRYOS->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOS->caption(), $this->DAYOFEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->CRYOPRESERVEDEMBRYOS->Required) {
            if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey && EmptyValue($this->CRYOPRESERVEDEMBRYOS->FormValue)) {
                $this->CRYOPRESERVEDEMBRYOS->addErrorMessage(str_replace("%s", $this->CRYOPRESERVEDEMBRYOS->caption(), $this->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->ViaAdmin->Required) {
            if (!$this->ViaAdmin->IsDetailKey && EmptyValue($this->ViaAdmin->FormValue)) {
                $this->ViaAdmin->addErrorMessage(str_replace("%s", $this->ViaAdmin->caption(), $this->ViaAdmin->RequiredErrorMessage));
            }
        }
        if ($this->ViaStartDateTime->Required) {
            if (!$this->ViaStartDateTime->IsDetailKey && EmptyValue($this->ViaStartDateTime->FormValue)) {
                $this->ViaStartDateTime->addErrorMessage(str_replace("%s", $this->ViaStartDateTime->caption(), $this->ViaStartDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ViaStartDateTime->FormValue)) {
            $this->ViaStartDateTime->addErrorMessage($this->ViaStartDateTime->getErrorMessage(false));
        }
        if ($this->ViaDose->Required) {
            if (!$this->ViaDose->IsDetailKey && EmptyValue($this->ViaDose->FormValue)) {
                $this->ViaDose->addErrorMessage(str_replace("%s", $this->ViaDose->caption(), $this->ViaDose->RequiredErrorMessage));
            }
        }
        if ($this->AllFreeze->Required) {
            if (!$this->AllFreeze->IsDetailKey && EmptyValue($this->AllFreeze->FormValue)) {
                $this->AllFreeze->addErrorMessage(str_replace("%s", $this->AllFreeze->caption(), $this->AllFreeze->RequiredErrorMessage));
            }
        }
        if ($this->TreatmentCancel->Required) {
            if (!$this->TreatmentCancel->IsDetailKey && EmptyValue($this->TreatmentCancel->FormValue)) {
                $this->TreatmentCancel->addErrorMessage(str_replace("%s", $this->TreatmentCancel->caption(), $this->TreatmentCancel->RequiredErrorMessage));
            }
        }
        if ($this->Reason->Required) {
            if (!$this->Reason->IsDetailKey && EmptyValue($this->Reason->FormValue)) {
                $this->Reason->addErrorMessage(str_replace("%s", $this->Reason->caption(), $this->Reason->RequiredErrorMessage));
            }
        }
        if ($this->ProgesteroneAdmin->Required) {
            if (!$this->ProgesteroneAdmin->IsDetailKey && EmptyValue($this->ProgesteroneAdmin->FormValue)) {
                $this->ProgesteroneAdmin->addErrorMessage(str_replace("%s", $this->ProgesteroneAdmin->caption(), $this->ProgesteroneAdmin->RequiredErrorMessage));
            }
        }
        if ($this->ProgesteroneStart->Required) {
            if (!$this->ProgesteroneStart->IsDetailKey && EmptyValue($this->ProgesteroneStart->FormValue)) {
                $this->ProgesteroneStart->addErrorMessage(str_replace("%s", $this->ProgesteroneStart->caption(), $this->ProgesteroneStart->RequiredErrorMessage));
            }
        }
        if ($this->ProgesteroneDose->Required) {
            if (!$this->ProgesteroneDose->IsDetailKey && EmptyValue($this->ProgesteroneDose->FormValue)) {
                $this->ProgesteroneDose->addErrorMessage(str_replace("%s", $this->ProgesteroneDose->caption(), $this->ProgesteroneDose->RequiredErrorMessage));
            }
        }
        if ($this->StChDate14->Required) {
            if (!$this->StChDate14->IsDetailKey && EmptyValue($this->StChDate14->FormValue)) {
                $this->StChDate14->addErrorMessage(str_replace("%s", $this->StChDate14->caption(), $this->StChDate14->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate14->FormValue)) {
            $this->StChDate14->addErrorMessage($this->StChDate14->getErrorMessage(false));
        }
        if ($this->StChDate15->Required) {
            if (!$this->StChDate15->IsDetailKey && EmptyValue($this->StChDate15->FormValue)) {
                $this->StChDate15->addErrorMessage(str_replace("%s", $this->StChDate15->caption(), $this->StChDate15->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate15->FormValue)) {
            $this->StChDate15->addErrorMessage($this->StChDate15->getErrorMessage(false));
        }
        if ($this->StChDate16->Required) {
            if (!$this->StChDate16->IsDetailKey && EmptyValue($this->StChDate16->FormValue)) {
                $this->StChDate16->addErrorMessage(str_replace("%s", $this->StChDate16->caption(), $this->StChDate16->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate16->FormValue)) {
            $this->StChDate16->addErrorMessage($this->StChDate16->getErrorMessage(false));
        }
        if ($this->StChDate17->Required) {
            if (!$this->StChDate17->IsDetailKey && EmptyValue($this->StChDate17->FormValue)) {
                $this->StChDate17->addErrorMessage(str_replace("%s", $this->StChDate17->caption(), $this->StChDate17->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate17->FormValue)) {
            $this->StChDate17->addErrorMessage($this->StChDate17->getErrorMessage(false));
        }
        if ($this->StChDate18->Required) {
            if (!$this->StChDate18->IsDetailKey && EmptyValue($this->StChDate18->FormValue)) {
                $this->StChDate18->addErrorMessage(str_replace("%s", $this->StChDate18->caption(), $this->StChDate18->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate18->FormValue)) {
            $this->StChDate18->addErrorMessage($this->StChDate18->getErrorMessage(false));
        }
        if ($this->StChDate19->Required) {
            if (!$this->StChDate19->IsDetailKey && EmptyValue($this->StChDate19->FormValue)) {
                $this->StChDate19->addErrorMessage(str_replace("%s", $this->StChDate19->caption(), $this->StChDate19->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate19->FormValue)) {
            $this->StChDate19->addErrorMessage($this->StChDate19->getErrorMessage(false));
        }
        if ($this->StChDate20->Required) {
            if (!$this->StChDate20->IsDetailKey && EmptyValue($this->StChDate20->FormValue)) {
                $this->StChDate20->addErrorMessage(str_replace("%s", $this->StChDate20->caption(), $this->StChDate20->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate20->FormValue)) {
            $this->StChDate20->addErrorMessage($this->StChDate20->getErrorMessage(false));
        }
        if ($this->StChDate21->Required) {
            if (!$this->StChDate21->IsDetailKey && EmptyValue($this->StChDate21->FormValue)) {
                $this->StChDate21->addErrorMessage(str_replace("%s", $this->StChDate21->caption(), $this->StChDate21->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate21->FormValue)) {
            $this->StChDate21->addErrorMessage($this->StChDate21->getErrorMessage(false));
        }
        if ($this->StChDate22->Required) {
            if (!$this->StChDate22->IsDetailKey && EmptyValue($this->StChDate22->FormValue)) {
                $this->StChDate22->addErrorMessage(str_replace("%s", $this->StChDate22->caption(), $this->StChDate22->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate22->FormValue)) {
            $this->StChDate22->addErrorMessage($this->StChDate22->getErrorMessage(false));
        }
        if ($this->StChDate23->Required) {
            if (!$this->StChDate23->IsDetailKey && EmptyValue($this->StChDate23->FormValue)) {
                $this->StChDate23->addErrorMessage(str_replace("%s", $this->StChDate23->caption(), $this->StChDate23->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate23->FormValue)) {
            $this->StChDate23->addErrorMessage($this->StChDate23->getErrorMessage(false));
        }
        if ($this->StChDate24->Required) {
            if (!$this->StChDate24->IsDetailKey && EmptyValue($this->StChDate24->FormValue)) {
                $this->StChDate24->addErrorMessage(str_replace("%s", $this->StChDate24->caption(), $this->StChDate24->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate24->FormValue)) {
            $this->StChDate24->addErrorMessage($this->StChDate24->getErrorMessage(false));
        }
        if ($this->StChDate25->Required) {
            if (!$this->StChDate25->IsDetailKey && EmptyValue($this->StChDate25->FormValue)) {
                $this->StChDate25->addErrorMessage(str_replace("%s", $this->StChDate25->caption(), $this->StChDate25->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StChDate25->FormValue)) {
            $this->StChDate25->addErrorMessage($this->StChDate25->getErrorMessage(false));
        }
        if ($this->CycleDay14->Required) {
            if (!$this->CycleDay14->IsDetailKey && EmptyValue($this->CycleDay14->FormValue)) {
                $this->CycleDay14->addErrorMessage(str_replace("%s", $this->CycleDay14->caption(), $this->CycleDay14->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay15->Required) {
            if (!$this->CycleDay15->IsDetailKey && EmptyValue($this->CycleDay15->FormValue)) {
                $this->CycleDay15->addErrorMessage(str_replace("%s", $this->CycleDay15->caption(), $this->CycleDay15->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay16->Required) {
            if (!$this->CycleDay16->IsDetailKey && EmptyValue($this->CycleDay16->FormValue)) {
                $this->CycleDay16->addErrorMessage(str_replace("%s", $this->CycleDay16->caption(), $this->CycleDay16->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay17->Required) {
            if (!$this->CycleDay17->IsDetailKey && EmptyValue($this->CycleDay17->FormValue)) {
                $this->CycleDay17->addErrorMessage(str_replace("%s", $this->CycleDay17->caption(), $this->CycleDay17->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay18->Required) {
            if (!$this->CycleDay18->IsDetailKey && EmptyValue($this->CycleDay18->FormValue)) {
                $this->CycleDay18->addErrorMessage(str_replace("%s", $this->CycleDay18->caption(), $this->CycleDay18->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay19->Required) {
            if (!$this->CycleDay19->IsDetailKey && EmptyValue($this->CycleDay19->FormValue)) {
                $this->CycleDay19->addErrorMessage(str_replace("%s", $this->CycleDay19->caption(), $this->CycleDay19->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay20->Required) {
            if (!$this->CycleDay20->IsDetailKey && EmptyValue($this->CycleDay20->FormValue)) {
                $this->CycleDay20->addErrorMessage(str_replace("%s", $this->CycleDay20->caption(), $this->CycleDay20->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay21->Required) {
            if (!$this->CycleDay21->IsDetailKey && EmptyValue($this->CycleDay21->FormValue)) {
                $this->CycleDay21->addErrorMessage(str_replace("%s", $this->CycleDay21->caption(), $this->CycleDay21->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay22->Required) {
            if (!$this->CycleDay22->IsDetailKey && EmptyValue($this->CycleDay22->FormValue)) {
                $this->CycleDay22->addErrorMessage(str_replace("%s", $this->CycleDay22->caption(), $this->CycleDay22->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay23->Required) {
            if (!$this->CycleDay23->IsDetailKey && EmptyValue($this->CycleDay23->FormValue)) {
                $this->CycleDay23->addErrorMessage(str_replace("%s", $this->CycleDay23->caption(), $this->CycleDay23->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay24->Required) {
            if (!$this->CycleDay24->IsDetailKey && EmptyValue($this->CycleDay24->FormValue)) {
                $this->CycleDay24->addErrorMessage(str_replace("%s", $this->CycleDay24->caption(), $this->CycleDay24->RequiredErrorMessage));
            }
        }
        if ($this->CycleDay25->Required) {
            if (!$this->CycleDay25->IsDetailKey && EmptyValue($this->CycleDay25->FormValue)) {
                $this->CycleDay25->addErrorMessage(str_replace("%s", $this->CycleDay25->caption(), $this->CycleDay25->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay14->Required) {
            if (!$this->StimulationDay14->IsDetailKey && EmptyValue($this->StimulationDay14->FormValue)) {
                $this->StimulationDay14->addErrorMessage(str_replace("%s", $this->StimulationDay14->caption(), $this->StimulationDay14->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay15->Required) {
            if (!$this->StimulationDay15->IsDetailKey && EmptyValue($this->StimulationDay15->FormValue)) {
                $this->StimulationDay15->addErrorMessage(str_replace("%s", $this->StimulationDay15->caption(), $this->StimulationDay15->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay16->Required) {
            if (!$this->StimulationDay16->IsDetailKey && EmptyValue($this->StimulationDay16->FormValue)) {
                $this->StimulationDay16->addErrorMessage(str_replace("%s", $this->StimulationDay16->caption(), $this->StimulationDay16->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay17->Required) {
            if (!$this->StimulationDay17->IsDetailKey && EmptyValue($this->StimulationDay17->FormValue)) {
                $this->StimulationDay17->addErrorMessage(str_replace("%s", $this->StimulationDay17->caption(), $this->StimulationDay17->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay18->Required) {
            if (!$this->StimulationDay18->IsDetailKey && EmptyValue($this->StimulationDay18->FormValue)) {
                $this->StimulationDay18->addErrorMessage(str_replace("%s", $this->StimulationDay18->caption(), $this->StimulationDay18->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay19->Required) {
            if (!$this->StimulationDay19->IsDetailKey && EmptyValue($this->StimulationDay19->FormValue)) {
                $this->StimulationDay19->addErrorMessage(str_replace("%s", $this->StimulationDay19->caption(), $this->StimulationDay19->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay20->Required) {
            if (!$this->StimulationDay20->IsDetailKey && EmptyValue($this->StimulationDay20->FormValue)) {
                $this->StimulationDay20->addErrorMessage(str_replace("%s", $this->StimulationDay20->caption(), $this->StimulationDay20->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay21->Required) {
            if (!$this->StimulationDay21->IsDetailKey && EmptyValue($this->StimulationDay21->FormValue)) {
                $this->StimulationDay21->addErrorMessage(str_replace("%s", $this->StimulationDay21->caption(), $this->StimulationDay21->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay22->Required) {
            if (!$this->StimulationDay22->IsDetailKey && EmptyValue($this->StimulationDay22->FormValue)) {
                $this->StimulationDay22->addErrorMessage(str_replace("%s", $this->StimulationDay22->caption(), $this->StimulationDay22->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay23->Required) {
            if (!$this->StimulationDay23->IsDetailKey && EmptyValue($this->StimulationDay23->FormValue)) {
                $this->StimulationDay23->addErrorMessage(str_replace("%s", $this->StimulationDay23->caption(), $this->StimulationDay23->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay24->Required) {
            if (!$this->StimulationDay24->IsDetailKey && EmptyValue($this->StimulationDay24->FormValue)) {
                $this->StimulationDay24->addErrorMessage(str_replace("%s", $this->StimulationDay24->caption(), $this->StimulationDay24->RequiredErrorMessage));
            }
        }
        if ($this->StimulationDay25->Required) {
            if (!$this->StimulationDay25->IsDetailKey && EmptyValue($this->StimulationDay25->FormValue)) {
                $this->StimulationDay25->addErrorMessage(str_replace("%s", $this->StimulationDay25->caption(), $this->StimulationDay25->RequiredErrorMessage));
            }
        }
        if ($this->Tablet14->Required) {
            if (!$this->Tablet14->IsDetailKey && EmptyValue($this->Tablet14->FormValue)) {
                $this->Tablet14->addErrorMessage(str_replace("%s", $this->Tablet14->caption(), $this->Tablet14->RequiredErrorMessage));
            }
        }
        if ($this->Tablet15->Required) {
            if (!$this->Tablet15->IsDetailKey && EmptyValue($this->Tablet15->FormValue)) {
                $this->Tablet15->addErrorMessage(str_replace("%s", $this->Tablet15->caption(), $this->Tablet15->RequiredErrorMessage));
            }
        }
        if ($this->Tablet16->Required) {
            if (!$this->Tablet16->IsDetailKey && EmptyValue($this->Tablet16->FormValue)) {
                $this->Tablet16->addErrorMessage(str_replace("%s", $this->Tablet16->caption(), $this->Tablet16->RequiredErrorMessage));
            }
        }
        if ($this->Tablet17->Required) {
            if (!$this->Tablet17->IsDetailKey && EmptyValue($this->Tablet17->FormValue)) {
                $this->Tablet17->addErrorMessage(str_replace("%s", $this->Tablet17->caption(), $this->Tablet17->RequiredErrorMessage));
            }
        }
        if ($this->Tablet18->Required) {
            if (!$this->Tablet18->IsDetailKey && EmptyValue($this->Tablet18->FormValue)) {
                $this->Tablet18->addErrorMessage(str_replace("%s", $this->Tablet18->caption(), $this->Tablet18->RequiredErrorMessage));
            }
        }
        if ($this->Tablet19->Required) {
            if (!$this->Tablet19->IsDetailKey && EmptyValue($this->Tablet19->FormValue)) {
                $this->Tablet19->addErrorMessage(str_replace("%s", $this->Tablet19->caption(), $this->Tablet19->RequiredErrorMessage));
            }
        }
        if ($this->Tablet20->Required) {
            if (!$this->Tablet20->IsDetailKey && EmptyValue($this->Tablet20->FormValue)) {
                $this->Tablet20->addErrorMessage(str_replace("%s", $this->Tablet20->caption(), $this->Tablet20->RequiredErrorMessage));
            }
        }
        if ($this->Tablet21->Required) {
            if (!$this->Tablet21->IsDetailKey && EmptyValue($this->Tablet21->FormValue)) {
                $this->Tablet21->addErrorMessage(str_replace("%s", $this->Tablet21->caption(), $this->Tablet21->RequiredErrorMessage));
            }
        }
        if ($this->Tablet22->Required) {
            if (!$this->Tablet22->IsDetailKey && EmptyValue($this->Tablet22->FormValue)) {
                $this->Tablet22->addErrorMessage(str_replace("%s", $this->Tablet22->caption(), $this->Tablet22->RequiredErrorMessage));
            }
        }
        if ($this->Tablet23->Required) {
            if (!$this->Tablet23->IsDetailKey && EmptyValue($this->Tablet23->FormValue)) {
                $this->Tablet23->addErrorMessage(str_replace("%s", $this->Tablet23->caption(), $this->Tablet23->RequiredErrorMessage));
            }
        }
        if ($this->Tablet24->Required) {
            if (!$this->Tablet24->IsDetailKey && EmptyValue($this->Tablet24->FormValue)) {
                $this->Tablet24->addErrorMessage(str_replace("%s", $this->Tablet24->caption(), $this->Tablet24->RequiredErrorMessage));
            }
        }
        if ($this->Tablet25->Required) {
            if (!$this->Tablet25->IsDetailKey && EmptyValue($this->Tablet25->FormValue)) {
                $this->Tablet25->addErrorMessage(str_replace("%s", $this->Tablet25->caption(), $this->Tablet25->RequiredErrorMessage));
            }
        }
        if ($this->RFSH14->Required) {
            if (!$this->RFSH14->IsDetailKey && EmptyValue($this->RFSH14->FormValue)) {
                $this->RFSH14->addErrorMessage(str_replace("%s", $this->RFSH14->caption(), $this->RFSH14->RequiredErrorMessage));
            }
        }
        if ($this->RFSH15->Required) {
            if (!$this->RFSH15->IsDetailKey && EmptyValue($this->RFSH15->FormValue)) {
                $this->RFSH15->addErrorMessage(str_replace("%s", $this->RFSH15->caption(), $this->RFSH15->RequiredErrorMessage));
            }
        }
        if ($this->RFSH16->Required) {
            if (!$this->RFSH16->IsDetailKey && EmptyValue($this->RFSH16->FormValue)) {
                $this->RFSH16->addErrorMessage(str_replace("%s", $this->RFSH16->caption(), $this->RFSH16->RequiredErrorMessage));
            }
        }
        if ($this->RFSH17->Required) {
            if (!$this->RFSH17->IsDetailKey && EmptyValue($this->RFSH17->FormValue)) {
                $this->RFSH17->addErrorMessage(str_replace("%s", $this->RFSH17->caption(), $this->RFSH17->RequiredErrorMessage));
            }
        }
        if ($this->RFSH18->Required) {
            if (!$this->RFSH18->IsDetailKey && EmptyValue($this->RFSH18->FormValue)) {
                $this->RFSH18->addErrorMessage(str_replace("%s", $this->RFSH18->caption(), $this->RFSH18->RequiredErrorMessage));
            }
        }
        if ($this->RFSH19->Required) {
            if (!$this->RFSH19->IsDetailKey && EmptyValue($this->RFSH19->FormValue)) {
                $this->RFSH19->addErrorMessage(str_replace("%s", $this->RFSH19->caption(), $this->RFSH19->RequiredErrorMessage));
            }
        }
        if ($this->RFSH20->Required) {
            if (!$this->RFSH20->IsDetailKey && EmptyValue($this->RFSH20->FormValue)) {
                $this->RFSH20->addErrorMessage(str_replace("%s", $this->RFSH20->caption(), $this->RFSH20->RequiredErrorMessage));
            }
        }
        if ($this->RFSH21->Required) {
            if (!$this->RFSH21->IsDetailKey && EmptyValue($this->RFSH21->FormValue)) {
                $this->RFSH21->addErrorMessage(str_replace("%s", $this->RFSH21->caption(), $this->RFSH21->RequiredErrorMessage));
            }
        }
        if ($this->RFSH22->Required) {
            if (!$this->RFSH22->IsDetailKey && EmptyValue($this->RFSH22->FormValue)) {
                $this->RFSH22->addErrorMessage(str_replace("%s", $this->RFSH22->caption(), $this->RFSH22->RequiredErrorMessage));
            }
        }
        if ($this->RFSH23->Required) {
            if (!$this->RFSH23->IsDetailKey && EmptyValue($this->RFSH23->FormValue)) {
                $this->RFSH23->addErrorMessage(str_replace("%s", $this->RFSH23->caption(), $this->RFSH23->RequiredErrorMessage));
            }
        }
        if ($this->RFSH24->Required) {
            if (!$this->RFSH24->IsDetailKey && EmptyValue($this->RFSH24->FormValue)) {
                $this->RFSH24->addErrorMessage(str_replace("%s", $this->RFSH24->caption(), $this->RFSH24->RequiredErrorMessage));
            }
        }
        if ($this->RFSH25->Required) {
            if (!$this->RFSH25->IsDetailKey && EmptyValue($this->RFSH25->FormValue)) {
                $this->RFSH25->addErrorMessage(str_replace("%s", $this->RFSH25->caption(), $this->RFSH25->RequiredErrorMessage));
            }
        }
        if ($this->HMG14->Required) {
            if (!$this->HMG14->IsDetailKey && EmptyValue($this->HMG14->FormValue)) {
                $this->HMG14->addErrorMessage(str_replace("%s", $this->HMG14->caption(), $this->HMG14->RequiredErrorMessage));
            }
        }
        if ($this->HMG15->Required) {
            if (!$this->HMG15->IsDetailKey && EmptyValue($this->HMG15->FormValue)) {
                $this->HMG15->addErrorMessage(str_replace("%s", $this->HMG15->caption(), $this->HMG15->RequiredErrorMessage));
            }
        }
        if ($this->HMG16->Required) {
            if (!$this->HMG16->IsDetailKey && EmptyValue($this->HMG16->FormValue)) {
                $this->HMG16->addErrorMessage(str_replace("%s", $this->HMG16->caption(), $this->HMG16->RequiredErrorMessage));
            }
        }
        if ($this->HMG17->Required) {
            if (!$this->HMG17->IsDetailKey && EmptyValue($this->HMG17->FormValue)) {
                $this->HMG17->addErrorMessage(str_replace("%s", $this->HMG17->caption(), $this->HMG17->RequiredErrorMessage));
            }
        }
        if ($this->HMG18->Required) {
            if (!$this->HMG18->IsDetailKey && EmptyValue($this->HMG18->FormValue)) {
                $this->HMG18->addErrorMessage(str_replace("%s", $this->HMG18->caption(), $this->HMG18->RequiredErrorMessage));
            }
        }
        if ($this->HMG19->Required) {
            if (!$this->HMG19->IsDetailKey && EmptyValue($this->HMG19->FormValue)) {
                $this->HMG19->addErrorMessage(str_replace("%s", $this->HMG19->caption(), $this->HMG19->RequiredErrorMessage));
            }
        }
        if ($this->HMG20->Required) {
            if (!$this->HMG20->IsDetailKey && EmptyValue($this->HMG20->FormValue)) {
                $this->HMG20->addErrorMessage(str_replace("%s", $this->HMG20->caption(), $this->HMG20->RequiredErrorMessage));
            }
        }
        if ($this->HMG21->Required) {
            if (!$this->HMG21->IsDetailKey && EmptyValue($this->HMG21->FormValue)) {
                $this->HMG21->addErrorMessage(str_replace("%s", $this->HMG21->caption(), $this->HMG21->RequiredErrorMessage));
            }
        }
        if ($this->HMG22->Required) {
            if (!$this->HMG22->IsDetailKey && EmptyValue($this->HMG22->FormValue)) {
                $this->HMG22->addErrorMessage(str_replace("%s", $this->HMG22->caption(), $this->HMG22->RequiredErrorMessage));
            }
        }
        if ($this->HMG23->Required) {
            if (!$this->HMG23->IsDetailKey && EmptyValue($this->HMG23->FormValue)) {
                $this->HMG23->addErrorMessage(str_replace("%s", $this->HMG23->caption(), $this->HMG23->RequiredErrorMessage));
            }
        }
        if ($this->HMG24->Required) {
            if (!$this->HMG24->IsDetailKey && EmptyValue($this->HMG24->FormValue)) {
                $this->HMG24->addErrorMessage(str_replace("%s", $this->HMG24->caption(), $this->HMG24->RequiredErrorMessage));
            }
        }
        if ($this->HMG25->Required) {
            if (!$this->HMG25->IsDetailKey && EmptyValue($this->HMG25->FormValue)) {
                $this->HMG25->addErrorMessage(str_replace("%s", $this->HMG25->caption(), $this->HMG25->RequiredErrorMessage));
            }
        }
        if ($this->GnRH14->Required) {
            if (!$this->GnRH14->IsDetailKey && EmptyValue($this->GnRH14->FormValue)) {
                $this->GnRH14->addErrorMessage(str_replace("%s", $this->GnRH14->caption(), $this->GnRH14->RequiredErrorMessage));
            }
        }
        if ($this->GnRH15->Required) {
            if (!$this->GnRH15->IsDetailKey && EmptyValue($this->GnRH15->FormValue)) {
                $this->GnRH15->addErrorMessage(str_replace("%s", $this->GnRH15->caption(), $this->GnRH15->RequiredErrorMessage));
            }
        }
        if ($this->GnRH16->Required) {
            if (!$this->GnRH16->IsDetailKey && EmptyValue($this->GnRH16->FormValue)) {
                $this->GnRH16->addErrorMessage(str_replace("%s", $this->GnRH16->caption(), $this->GnRH16->RequiredErrorMessage));
            }
        }
        if ($this->GnRH17->Required) {
            if (!$this->GnRH17->IsDetailKey && EmptyValue($this->GnRH17->FormValue)) {
                $this->GnRH17->addErrorMessage(str_replace("%s", $this->GnRH17->caption(), $this->GnRH17->RequiredErrorMessage));
            }
        }
        if ($this->GnRH18->Required) {
            if (!$this->GnRH18->IsDetailKey && EmptyValue($this->GnRH18->FormValue)) {
                $this->GnRH18->addErrorMessage(str_replace("%s", $this->GnRH18->caption(), $this->GnRH18->RequiredErrorMessage));
            }
        }
        if ($this->GnRH19->Required) {
            if (!$this->GnRH19->IsDetailKey && EmptyValue($this->GnRH19->FormValue)) {
                $this->GnRH19->addErrorMessage(str_replace("%s", $this->GnRH19->caption(), $this->GnRH19->RequiredErrorMessage));
            }
        }
        if ($this->GnRH20->Required) {
            if (!$this->GnRH20->IsDetailKey && EmptyValue($this->GnRH20->FormValue)) {
                $this->GnRH20->addErrorMessage(str_replace("%s", $this->GnRH20->caption(), $this->GnRH20->RequiredErrorMessage));
            }
        }
        if ($this->GnRH21->Required) {
            if (!$this->GnRH21->IsDetailKey && EmptyValue($this->GnRH21->FormValue)) {
                $this->GnRH21->addErrorMessage(str_replace("%s", $this->GnRH21->caption(), $this->GnRH21->RequiredErrorMessage));
            }
        }
        if ($this->GnRH22->Required) {
            if (!$this->GnRH22->IsDetailKey && EmptyValue($this->GnRH22->FormValue)) {
                $this->GnRH22->addErrorMessage(str_replace("%s", $this->GnRH22->caption(), $this->GnRH22->RequiredErrorMessage));
            }
        }
        if ($this->GnRH23->Required) {
            if (!$this->GnRH23->IsDetailKey && EmptyValue($this->GnRH23->FormValue)) {
                $this->GnRH23->addErrorMessage(str_replace("%s", $this->GnRH23->caption(), $this->GnRH23->RequiredErrorMessage));
            }
        }
        if ($this->GnRH24->Required) {
            if (!$this->GnRH24->IsDetailKey && EmptyValue($this->GnRH24->FormValue)) {
                $this->GnRH24->addErrorMessage(str_replace("%s", $this->GnRH24->caption(), $this->GnRH24->RequiredErrorMessage));
            }
        }
        if ($this->GnRH25->Required) {
            if (!$this->GnRH25->IsDetailKey && EmptyValue($this->GnRH25->FormValue)) {
                $this->GnRH25->addErrorMessage(str_replace("%s", $this->GnRH25->caption(), $this->GnRH25->RequiredErrorMessage));
            }
        }
        if ($this->P414->Required) {
            if (!$this->P414->IsDetailKey && EmptyValue($this->P414->FormValue)) {
                $this->P414->addErrorMessage(str_replace("%s", $this->P414->caption(), $this->P414->RequiredErrorMessage));
            }
        }
        if ($this->P415->Required) {
            if (!$this->P415->IsDetailKey && EmptyValue($this->P415->FormValue)) {
                $this->P415->addErrorMessage(str_replace("%s", $this->P415->caption(), $this->P415->RequiredErrorMessage));
            }
        }
        if ($this->P416->Required) {
            if (!$this->P416->IsDetailKey && EmptyValue($this->P416->FormValue)) {
                $this->P416->addErrorMessage(str_replace("%s", $this->P416->caption(), $this->P416->RequiredErrorMessage));
            }
        }
        if ($this->P417->Required) {
            if (!$this->P417->IsDetailKey && EmptyValue($this->P417->FormValue)) {
                $this->P417->addErrorMessage(str_replace("%s", $this->P417->caption(), $this->P417->RequiredErrorMessage));
            }
        }
        if ($this->P418->Required) {
            if (!$this->P418->IsDetailKey && EmptyValue($this->P418->FormValue)) {
                $this->P418->addErrorMessage(str_replace("%s", $this->P418->caption(), $this->P418->RequiredErrorMessage));
            }
        }
        if ($this->P419->Required) {
            if (!$this->P419->IsDetailKey && EmptyValue($this->P419->FormValue)) {
                $this->P419->addErrorMessage(str_replace("%s", $this->P419->caption(), $this->P419->RequiredErrorMessage));
            }
        }
        if ($this->P420->Required) {
            if (!$this->P420->IsDetailKey && EmptyValue($this->P420->FormValue)) {
                $this->P420->addErrorMessage(str_replace("%s", $this->P420->caption(), $this->P420->RequiredErrorMessage));
            }
        }
        if ($this->P421->Required) {
            if (!$this->P421->IsDetailKey && EmptyValue($this->P421->FormValue)) {
                $this->P421->addErrorMessage(str_replace("%s", $this->P421->caption(), $this->P421->RequiredErrorMessage));
            }
        }
        if ($this->P422->Required) {
            if (!$this->P422->IsDetailKey && EmptyValue($this->P422->FormValue)) {
                $this->P422->addErrorMessage(str_replace("%s", $this->P422->caption(), $this->P422->RequiredErrorMessage));
            }
        }
        if ($this->P423->Required) {
            if (!$this->P423->IsDetailKey && EmptyValue($this->P423->FormValue)) {
                $this->P423->addErrorMessage(str_replace("%s", $this->P423->caption(), $this->P423->RequiredErrorMessage));
            }
        }
        if ($this->P424->Required) {
            if (!$this->P424->IsDetailKey && EmptyValue($this->P424->FormValue)) {
                $this->P424->addErrorMessage(str_replace("%s", $this->P424->caption(), $this->P424->RequiredErrorMessage));
            }
        }
        if ($this->P425->Required) {
            if (!$this->P425->IsDetailKey && EmptyValue($this->P425->FormValue)) {
                $this->P425->addErrorMessage(str_replace("%s", $this->P425->caption(), $this->P425->RequiredErrorMessage));
            }
        }
        if ($this->USGRt14->Required) {
            if (!$this->USGRt14->IsDetailKey && EmptyValue($this->USGRt14->FormValue)) {
                $this->USGRt14->addErrorMessage(str_replace("%s", $this->USGRt14->caption(), $this->USGRt14->RequiredErrorMessage));
            }
        }
        if ($this->USGRt15->Required) {
            if (!$this->USGRt15->IsDetailKey && EmptyValue($this->USGRt15->FormValue)) {
                $this->USGRt15->addErrorMessage(str_replace("%s", $this->USGRt15->caption(), $this->USGRt15->RequiredErrorMessage));
            }
        }
        if ($this->USGRt16->Required) {
            if (!$this->USGRt16->IsDetailKey && EmptyValue($this->USGRt16->FormValue)) {
                $this->USGRt16->addErrorMessage(str_replace("%s", $this->USGRt16->caption(), $this->USGRt16->RequiredErrorMessage));
            }
        }
        if ($this->USGRt17->Required) {
            if (!$this->USGRt17->IsDetailKey && EmptyValue($this->USGRt17->FormValue)) {
                $this->USGRt17->addErrorMessage(str_replace("%s", $this->USGRt17->caption(), $this->USGRt17->RequiredErrorMessage));
            }
        }
        if ($this->USGRt18->Required) {
            if (!$this->USGRt18->IsDetailKey && EmptyValue($this->USGRt18->FormValue)) {
                $this->USGRt18->addErrorMessage(str_replace("%s", $this->USGRt18->caption(), $this->USGRt18->RequiredErrorMessage));
            }
        }
        if ($this->USGRt19->Required) {
            if (!$this->USGRt19->IsDetailKey && EmptyValue($this->USGRt19->FormValue)) {
                $this->USGRt19->addErrorMessage(str_replace("%s", $this->USGRt19->caption(), $this->USGRt19->RequiredErrorMessage));
            }
        }
        if ($this->USGRt20->Required) {
            if (!$this->USGRt20->IsDetailKey && EmptyValue($this->USGRt20->FormValue)) {
                $this->USGRt20->addErrorMessage(str_replace("%s", $this->USGRt20->caption(), $this->USGRt20->RequiredErrorMessage));
            }
        }
        if ($this->USGRt21->Required) {
            if (!$this->USGRt21->IsDetailKey && EmptyValue($this->USGRt21->FormValue)) {
                $this->USGRt21->addErrorMessage(str_replace("%s", $this->USGRt21->caption(), $this->USGRt21->RequiredErrorMessage));
            }
        }
        if ($this->USGRt22->Required) {
            if (!$this->USGRt22->IsDetailKey && EmptyValue($this->USGRt22->FormValue)) {
                $this->USGRt22->addErrorMessage(str_replace("%s", $this->USGRt22->caption(), $this->USGRt22->RequiredErrorMessage));
            }
        }
        if ($this->USGRt23->Required) {
            if (!$this->USGRt23->IsDetailKey && EmptyValue($this->USGRt23->FormValue)) {
                $this->USGRt23->addErrorMessage(str_replace("%s", $this->USGRt23->caption(), $this->USGRt23->RequiredErrorMessage));
            }
        }
        if ($this->USGRt24->Required) {
            if (!$this->USGRt24->IsDetailKey && EmptyValue($this->USGRt24->FormValue)) {
                $this->USGRt24->addErrorMessage(str_replace("%s", $this->USGRt24->caption(), $this->USGRt24->RequiredErrorMessage));
            }
        }
        if ($this->USGRt25->Required) {
            if (!$this->USGRt25->IsDetailKey && EmptyValue($this->USGRt25->FormValue)) {
                $this->USGRt25->addErrorMessage(str_replace("%s", $this->USGRt25->caption(), $this->USGRt25->RequiredErrorMessage));
            }
        }
        if ($this->USGLt14->Required) {
            if (!$this->USGLt14->IsDetailKey && EmptyValue($this->USGLt14->FormValue)) {
                $this->USGLt14->addErrorMessage(str_replace("%s", $this->USGLt14->caption(), $this->USGLt14->RequiredErrorMessage));
            }
        }
        if ($this->USGLt15->Required) {
            if (!$this->USGLt15->IsDetailKey && EmptyValue($this->USGLt15->FormValue)) {
                $this->USGLt15->addErrorMessage(str_replace("%s", $this->USGLt15->caption(), $this->USGLt15->RequiredErrorMessage));
            }
        }
        if ($this->USGLt16->Required) {
            if (!$this->USGLt16->IsDetailKey && EmptyValue($this->USGLt16->FormValue)) {
                $this->USGLt16->addErrorMessage(str_replace("%s", $this->USGLt16->caption(), $this->USGLt16->RequiredErrorMessage));
            }
        }
        if ($this->USGLt17->Required) {
            if (!$this->USGLt17->IsDetailKey && EmptyValue($this->USGLt17->FormValue)) {
                $this->USGLt17->addErrorMessage(str_replace("%s", $this->USGLt17->caption(), $this->USGLt17->RequiredErrorMessage));
            }
        }
        if ($this->USGLt18->Required) {
            if (!$this->USGLt18->IsDetailKey && EmptyValue($this->USGLt18->FormValue)) {
                $this->USGLt18->addErrorMessage(str_replace("%s", $this->USGLt18->caption(), $this->USGLt18->RequiredErrorMessage));
            }
        }
        if ($this->USGLt19->Required) {
            if (!$this->USGLt19->IsDetailKey && EmptyValue($this->USGLt19->FormValue)) {
                $this->USGLt19->addErrorMessage(str_replace("%s", $this->USGLt19->caption(), $this->USGLt19->RequiredErrorMessage));
            }
        }
        if ($this->USGLt20->Required) {
            if (!$this->USGLt20->IsDetailKey && EmptyValue($this->USGLt20->FormValue)) {
                $this->USGLt20->addErrorMessage(str_replace("%s", $this->USGLt20->caption(), $this->USGLt20->RequiredErrorMessage));
            }
        }
        if ($this->USGLt21->Required) {
            if (!$this->USGLt21->IsDetailKey && EmptyValue($this->USGLt21->FormValue)) {
                $this->USGLt21->addErrorMessage(str_replace("%s", $this->USGLt21->caption(), $this->USGLt21->RequiredErrorMessage));
            }
        }
        if ($this->USGLt22->Required) {
            if (!$this->USGLt22->IsDetailKey && EmptyValue($this->USGLt22->FormValue)) {
                $this->USGLt22->addErrorMessage(str_replace("%s", $this->USGLt22->caption(), $this->USGLt22->RequiredErrorMessage));
            }
        }
        if ($this->USGLt23->Required) {
            if (!$this->USGLt23->IsDetailKey && EmptyValue($this->USGLt23->FormValue)) {
                $this->USGLt23->addErrorMessage(str_replace("%s", $this->USGLt23->caption(), $this->USGLt23->RequiredErrorMessage));
            }
        }
        if ($this->USGLt24->Required) {
            if (!$this->USGLt24->IsDetailKey && EmptyValue($this->USGLt24->FormValue)) {
                $this->USGLt24->addErrorMessage(str_replace("%s", $this->USGLt24->caption(), $this->USGLt24->RequiredErrorMessage));
            }
        }
        if ($this->USGLt25->Required) {
            if (!$this->USGLt25->IsDetailKey && EmptyValue($this->USGLt25->FormValue)) {
                $this->USGLt25->addErrorMessage(str_replace("%s", $this->USGLt25->caption(), $this->USGLt25->RequiredErrorMessage));
            }
        }
        if ($this->EM14->Required) {
            if (!$this->EM14->IsDetailKey && EmptyValue($this->EM14->FormValue)) {
                $this->EM14->addErrorMessage(str_replace("%s", $this->EM14->caption(), $this->EM14->RequiredErrorMessage));
            }
        }
        if ($this->EM15->Required) {
            if (!$this->EM15->IsDetailKey && EmptyValue($this->EM15->FormValue)) {
                $this->EM15->addErrorMessage(str_replace("%s", $this->EM15->caption(), $this->EM15->RequiredErrorMessage));
            }
        }
        if ($this->EM16->Required) {
            if (!$this->EM16->IsDetailKey && EmptyValue($this->EM16->FormValue)) {
                $this->EM16->addErrorMessage(str_replace("%s", $this->EM16->caption(), $this->EM16->RequiredErrorMessage));
            }
        }
        if ($this->EM17->Required) {
            if (!$this->EM17->IsDetailKey && EmptyValue($this->EM17->FormValue)) {
                $this->EM17->addErrorMessage(str_replace("%s", $this->EM17->caption(), $this->EM17->RequiredErrorMessage));
            }
        }
        if ($this->EM18->Required) {
            if (!$this->EM18->IsDetailKey && EmptyValue($this->EM18->FormValue)) {
                $this->EM18->addErrorMessage(str_replace("%s", $this->EM18->caption(), $this->EM18->RequiredErrorMessage));
            }
        }
        if ($this->EM19->Required) {
            if (!$this->EM19->IsDetailKey && EmptyValue($this->EM19->FormValue)) {
                $this->EM19->addErrorMessage(str_replace("%s", $this->EM19->caption(), $this->EM19->RequiredErrorMessage));
            }
        }
        if ($this->EM20->Required) {
            if (!$this->EM20->IsDetailKey && EmptyValue($this->EM20->FormValue)) {
                $this->EM20->addErrorMessage(str_replace("%s", $this->EM20->caption(), $this->EM20->RequiredErrorMessage));
            }
        }
        if ($this->EM21->Required) {
            if (!$this->EM21->IsDetailKey && EmptyValue($this->EM21->FormValue)) {
                $this->EM21->addErrorMessage(str_replace("%s", $this->EM21->caption(), $this->EM21->RequiredErrorMessage));
            }
        }
        if ($this->EM22->Required) {
            if (!$this->EM22->IsDetailKey && EmptyValue($this->EM22->FormValue)) {
                $this->EM22->addErrorMessage(str_replace("%s", $this->EM22->caption(), $this->EM22->RequiredErrorMessage));
            }
        }
        if ($this->EM23->Required) {
            if (!$this->EM23->IsDetailKey && EmptyValue($this->EM23->FormValue)) {
                $this->EM23->addErrorMessage(str_replace("%s", $this->EM23->caption(), $this->EM23->RequiredErrorMessage));
            }
        }
        if ($this->EM24->Required) {
            if (!$this->EM24->IsDetailKey && EmptyValue($this->EM24->FormValue)) {
                $this->EM24->addErrorMessage(str_replace("%s", $this->EM24->caption(), $this->EM24->RequiredErrorMessage));
            }
        }
        if ($this->EM25->Required) {
            if (!$this->EM25->IsDetailKey && EmptyValue($this->EM25->FormValue)) {
                $this->EM25->addErrorMessage(str_replace("%s", $this->EM25->caption(), $this->EM25->RequiredErrorMessage));
            }
        }
        if ($this->Others14->Required) {
            if (!$this->Others14->IsDetailKey && EmptyValue($this->Others14->FormValue)) {
                $this->Others14->addErrorMessage(str_replace("%s", $this->Others14->caption(), $this->Others14->RequiredErrorMessage));
            }
        }
        if ($this->Others15->Required) {
            if (!$this->Others15->IsDetailKey && EmptyValue($this->Others15->FormValue)) {
                $this->Others15->addErrorMessage(str_replace("%s", $this->Others15->caption(), $this->Others15->RequiredErrorMessage));
            }
        }
        if ($this->Others16->Required) {
            if (!$this->Others16->IsDetailKey && EmptyValue($this->Others16->FormValue)) {
                $this->Others16->addErrorMessage(str_replace("%s", $this->Others16->caption(), $this->Others16->RequiredErrorMessage));
            }
        }
        if ($this->Others17->Required) {
            if (!$this->Others17->IsDetailKey && EmptyValue($this->Others17->FormValue)) {
                $this->Others17->addErrorMessage(str_replace("%s", $this->Others17->caption(), $this->Others17->RequiredErrorMessage));
            }
        }
        if ($this->Others18->Required) {
            if (!$this->Others18->IsDetailKey && EmptyValue($this->Others18->FormValue)) {
                $this->Others18->addErrorMessage(str_replace("%s", $this->Others18->caption(), $this->Others18->RequiredErrorMessage));
            }
        }
        if ($this->Others19->Required) {
            if (!$this->Others19->IsDetailKey && EmptyValue($this->Others19->FormValue)) {
                $this->Others19->addErrorMessage(str_replace("%s", $this->Others19->caption(), $this->Others19->RequiredErrorMessage));
            }
        }
        if ($this->Others20->Required) {
            if (!$this->Others20->IsDetailKey && EmptyValue($this->Others20->FormValue)) {
                $this->Others20->addErrorMessage(str_replace("%s", $this->Others20->caption(), $this->Others20->RequiredErrorMessage));
            }
        }
        if ($this->Others21->Required) {
            if (!$this->Others21->IsDetailKey && EmptyValue($this->Others21->FormValue)) {
                $this->Others21->addErrorMessage(str_replace("%s", $this->Others21->caption(), $this->Others21->RequiredErrorMessage));
            }
        }
        if ($this->Others22->Required) {
            if (!$this->Others22->IsDetailKey && EmptyValue($this->Others22->FormValue)) {
                $this->Others22->addErrorMessage(str_replace("%s", $this->Others22->caption(), $this->Others22->RequiredErrorMessage));
            }
        }
        if ($this->Others23->Required) {
            if (!$this->Others23->IsDetailKey && EmptyValue($this->Others23->FormValue)) {
                $this->Others23->addErrorMessage(str_replace("%s", $this->Others23->caption(), $this->Others23->RequiredErrorMessage));
            }
        }
        if ($this->Others24->Required) {
            if (!$this->Others24->IsDetailKey && EmptyValue($this->Others24->FormValue)) {
                $this->Others24->addErrorMessage(str_replace("%s", $this->Others24->caption(), $this->Others24->RequiredErrorMessage));
            }
        }
        if ($this->Others25->Required) {
            if (!$this->Others25->IsDetailKey && EmptyValue($this->Others25->FormValue)) {
                $this->Others25->addErrorMessage(str_replace("%s", $this->Others25->caption(), $this->Others25->RequiredErrorMessage));
            }
        }
        if ($this->DR14->Required) {
            if (!$this->DR14->IsDetailKey && EmptyValue($this->DR14->FormValue)) {
                $this->DR14->addErrorMessage(str_replace("%s", $this->DR14->caption(), $this->DR14->RequiredErrorMessage));
            }
        }
        if ($this->DR15->Required) {
            if (!$this->DR15->IsDetailKey && EmptyValue($this->DR15->FormValue)) {
                $this->DR15->addErrorMessage(str_replace("%s", $this->DR15->caption(), $this->DR15->RequiredErrorMessage));
            }
        }
        if ($this->DR16->Required) {
            if (!$this->DR16->IsDetailKey && EmptyValue($this->DR16->FormValue)) {
                $this->DR16->addErrorMessage(str_replace("%s", $this->DR16->caption(), $this->DR16->RequiredErrorMessage));
            }
        }
        if ($this->DR17->Required) {
            if (!$this->DR17->IsDetailKey && EmptyValue($this->DR17->FormValue)) {
                $this->DR17->addErrorMessage(str_replace("%s", $this->DR17->caption(), $this->DR17->RequiredErrorMessage));
            }
        }
        if ($this->DR18->Required) {
            if (!$this->DR18->IsDetailKey && EmptyValue($this->DR18->FormValue)) {
                $this->DR18->addErrorMessage(str_replace("%s", $this->DR18->caption(), $this->DR18->RequiredErrorMessage));
            }
        }
        if ($this->DR19->Required) {
            if (!$this->DR19->IsDetailKey && EmptyValue($this->DR19->FormValue)) {
                $this->DR19->addErrorMessage(str_replace("%s", $this->DR19->caption(), $this->DR19->RequiredErrorMessage));
            }
        }
        if ($this->DR20->Required) {
            if (!$this->DR20->IsDetailKey && EmptyValue($this->DR20->FormValue)) {
                $this->DR20->addErrorMessage(str_replace("%s", $this->DR20->caption(), $this->DR20->RequiredErrorMessage));
            }
        }
        if ($this->DR21->Required) {
            if (!$this->DR21->IsDetailKey && EmptyValue($this->DR21->FormValue)) {
                $this->DR21->addErrorMessage(str_replace("%s", $this->DR21->caption(), $this->DR21->RequiredErrorMessage));
            }
        }
        if ($this->DR22->Required) {
            if (!$this->DR22->IsDetailKey && EmptyValue($this->DR22->FormValue)) {
                $this->DR22->addErrorMessage(str_replace("%s", $this->DR22->caption(), $this->DR22->RequiredErrorMessage));
            }
        }
        if ($this->DR23->Required) {
            if (!$this->DR23->IsDetailKey && EmptyValue($this->DR23->FormValue)) {
                $this->DR23->addErrorMessage(str_replace("%s", $this->DR23->caption(), $this->DR23->RequiredErrorMessage));
            }
        }
        if ($this->DR24->Required) {
            if (!$this->DR24->IsDetailKey && EmptyValue($this->DR24->FormValue)) {
                $this->DR24->addErrorMessage(str_replace("%s", $this->DR24->caption(), $this->DR24->RequiredErrorMessage));
            }
        }
        if ($this->DR25->Required) {
            if (!$this->DR25->IsDetailKey && EmptyValue($this->DR25->FormValue)) {
                $this->DR25->addErrorMessage(str_replace("%s", $this->DR25->caption(), $this->DR25->RequiredErrorMessage));
            }
        }
        if ($this->E214->Required) {
            if (!$this->E214->IsDetailKey && EmptyValue($this->E214->FormValue)) {
                $this->E214->addErrorMessage(str_replace("%s", $this->E214->caption(), $this->E214->RequiredErrorMessage));
            }
        }
        if ($this->E215->Required) {
            if (!$this->E215->IsDetailKey && EmptyValue($this->E215->FormValue)) {
                $this->E215->addErrorMessage(str_replace("%s", $this->E215->caption(), $this->E215->RequiredErrorMessage));
            }
        }
        if ($this->E216->Required) {
            if (!$this->E216->IsDetailKey && EmptyValue($this->E216->FormValue)) {
                $this->E216->addErrorMessage(str_replace("%s", $this->E216->caption(), $this->E216->RequiredErrorMessage));
            }
        }
        if ($this->E217->Required) {
            if (!$this->E217->IsDetailKey && EmptyValue($this->E217->FormValue)) {
                $this->E217->addErrorMessage(str_replace("%s", $this->E217->caption(), $this->E217->RequiredErrorMessage));
            }
        }
        if ($this->E218->Required) {
            if (!$this->E218->IsDetailKey && EmptyValue($this->E218->FormValue)) {
                $this->E218->addErrorMessage(str_replace("%s", $this->E218->caption(), $this->E218->RequiredErrorMessage));
            }
        }
        if ($this->E219->Required) {
            if (!$this->E219->IsDetailKey && EmptyValue($this->E219->FormValue)) {
                $this->E219->addErrorMessage(str_replace("%s", $this->E219->caption(), $this->E219->RequiredErrorMessage));
            }
        }
        if ($this->E220->Required) {
            if (!$this->E220->IsDetailKey && EmptyValue($this->E220->FormValue)) {
                $this->E220->addErrorMessage(str_replace("%s", $this->E220->caption(), $this->E220->RequiredErrorMessage));
            }
        }
        if ($this->E221->Required) {
            if (!$this->E221->IsDetailKey && EmptyValue($this->E221->FormValue)) {
                $this->E221->addErrorMessage(str_replace("%s", $this->E221->caption(), $this->E221->RequiredErrorMessage));
            }
        }
        if ($this->E222->Required) {
            if (!$this->E222->IsDetailKey && EmptyValue($this->E222->FormValue)) {
                $this->E222->addErrorMessage(str_replace("%s", $this->E222->caption(), $this->E222->RequiredErrorMessage));
            }
        }
        if ($this->E223->Required) {
            if (!$this->E223->IsDetailKey && EmptyValue($this->E223->FormValue)) {
                $this->E223->addErrorMessage(str_replace("%s", $this->E223->caption(), $this->E223->RequiredErrorMessage));
            }
        }
        if ($this->E224->Required) {
            if (!$this->E224->IsDetailKey && EmptyValue($this->E224->FormValue)) {
                $this->E224->addErrorMessage(str_replace("%s", $this->E224->caption(), $this->E224->RequiredErrorMessage));
            }
        }
        if ($this->E225->Required) {
            if (!$this->E225->IsDetailKey && EmptyValue($this->E225->FormValue)) {
                $this->E225->addErrorMessage(str_replace("%s", $this->E225->caption(), $this->E225->RequiredErrorMessage));
            }
        }
        if ($this->EEETTTDTE->Required) {
            if (!$this->EEETTTDTE->IsDetailKey && EmptyValue($this->EEETTTDTE->FormValue)) {
                $this->EEETTTDTE->addErrorMessage(str_replace("%s", $this->EEETTTDTE->caption(), $this->EEETTTDTE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EEETTTDTE->FormValue)) {
            $this->EEETTTDTE->addErrorMessage($this->EEETTTDTE->getErrorMessage(false));
        }
        if ($this->bhcgdate->Required) {
            if (!$this->bhcgdate->IsDetailKey && EmptyValue($this->bhcgdate->FormValue)) {
                $this->bhcgdate->addErrorMessage(str_replace("%s", $this->bhcgdate->caption(), $this->bhcgdate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->bhcgdate->FormValue)) {
            $this->bhcgdate->addErrorMessage($this->bhcgdate->getErrorMessage(false));
        }
        if ($this->TUBAL_PATENCY->Required) {
            if (!$this->TUBAL_PATENCY->IsDetailKey && EmptyValue($this->TUBAL_PATENCY->FormValue)) {
                $this->TUBAL_PATENCY->addErrorMessage(str_replace("%s", $this->TUBAL_PATENCY->caption(), $this->TUBAL_PATENCY->RequiredErrorMessage));
            }
        }
        if ($this->HSG->Required) {
            if (!$this->HSG->IsDetailKey && EmptyValue($this->HSG->FormValue)) {
                $this->HSG->addErrorMessage(str_replace("%s", $this->HSG->caption(), $this->HSG->RequiredErrorMessage));
            }
        }
        if ($this->DHL->Required) {
            if (!$this->DHL->IsDetailKey && EmptyValue($this->DHL->FormValue)) {
                $this->DHL->addErrorMessage(str_replace("%s", $this->DHL->caption(), $this->DHL->RequiredErrorMessage));
            }
        }
        if ($this->UTERINE_PROBLEMS->Required) {
            if (!$this->UTERINE_PROBLEMS->IsDetailKey && EmptyValue($this->UTERINE_PROBLEMS->FormValue)) {
                $this->UTERINE_PROBLEMS->addErrorMessage(str_replace("%s", $this->UTERINE_PROBLEMS->caption(), $this->UTERINE_PROBLEMS->RequiredErrorMessage));
            }
        }
        if ($this->W_COMORBIDS->Required) {
            if (!$this->W_COMORBIDS->IsDetailKey && EmptyValue($this->W_COMORBIDS->FormValue)) {
                $this->W_COMORBIDS->addErrorMessage(str_replace("%s", $this->W_COMORBIDS->caption(), $this->W_COMORBIDS->RequiredErrorMessage));
            }
        }
        if ($this->H_COMORBIDS->Required) {
            if (!$this->H_COMORBIDS->IsDetailKey && EmptyValue($this->H_COMORBIDS->FormValue)) {
                $this->H_COMORBIDS->addErrorMessage(str_replace("%s", $this->H_COMORBIDS->caption(), $this->H_COMORBIDS->RequiredErrorMessage));
            }
        }
        if ($this->SEXUAL_DYSFUNCTION->Required) {
            if (!$this->SEXUAL_DYSFUNCTION->IsDetailKey && EmptyValue($this->SEXUAL_DYSFUNCTION->FormValue)) {
                $this->SEXUAL_DYSFUNCTION->addErrorMessage(str_replace("%s", $this->SEXUAL_DYSFUNCTION->caption(), $this->SEXUAL_DYSFUNCTION->RequiredErrorMessage));
            }
        }
        if ($this->TABLETS->Required) {
            if (!$this->TABLETS->IsDetailKey && EmptyValue($this->TABLETS->FormValue)) {
                $this->TABLETS->addErrorMessage(str_replace("%s", $this->TABLETS->caption(), $this->TABLETS->RequiredErrorMessage));
            }
        }
        if ($this->FOLLICLE_STATUS->Required) {
            if (!$this->FOLLICLE_STATUS->IsDetailKey && EmptyValue($this->FOLLICLE_STATUS->FormValue)) {
                $this->FOLLICLE_STATUS->addErrorMessage(str_replace("%s", $this->FOLLICLE_STATUS->caption(), $this->FOLLICLE_STATUS->RequiredErrorMessage));
            }
        }
        if ($this->NUMBER_OF_IUI->Required) {
            if (!$this->NUMBER_OF_IUI->IsDetailKey && EmptyValue($this->NUMBER_OF_IUI->FormValue)) {
                $this->NUMBER_OF_IUI->addErrorMessage(str_replace("%s", $this->NUMBER_OF_IUI->caption(), $this->NUMBER_OF_IUI->RequiredErrorMessage));
            }
        }
        if ($this->PROCEDURE->Required) {
            if (!$this->PROCEDURE->IsDetailKey && EmptyValue($this->PROCEDURE->FormValue)) {
                $this->PROCEDURE->addErrorMessage(str_replace("%s", $this->PROCEDURE->caption(), $this->PROCEDURE->RequiredErrorMessage));
            }
        }
        if ($this->LUTEAL_SUPPORT->Required) {
            if (!$this->LUTEAL_SUPPORT->IsDetailKey && EmptyValue($this->LUTEAL_SUPPORT->FormValue)) {
                $this->LUTEAL_SUPPORT->addErrorMessage(str_replace("%s", $this->LUTEAL_SUPPORT->caption(), $this->LUTEAL_SUPPORT->RequiredErrorMessage));
            }
        }
        if ($this->SPECIFIC_MATERNAL_PROBLEMS->Required) {
            if (!$this->SPECIFIC_MATERNAL_PROBLEMS->IsDetailKey && EmptyValue($this->SPECIFIC_MATERNAL_PROBLEMS->FormValue)) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->addErrorMessage(str_replace("%s", $this->SPECIFIC_MATERNAL_PROBLEMS->caption(), $this->SPECIFIC_MATERNAL_PROBLEMS->RequiredErrorMessage));
            }
        }
        if ($this->ONGOING_PREG->Required) {
            if (!$this->ONGOING_PREG->IsDetailKey && EmptyValue($this->ONGOING_PREG->FormValue)) {
                $this->ONGOING_PREG->addErrorMessage(str_replace("%s", $this->ONGOING_PREG->caption(), $this->ONGOING_PREG->RequiredErrorMessage));
            }
        }
        if ($this->EDD_Date->Required) {
            if (!$this->EDD_Date->IsDetailKey && EmptyValue($this->EDD_Date->FormValue)) {
                $this->EDD_Date->addErrorMessage(str_replace("%s", $this->EDD_Date->caption(), $this->EDD_Date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EDD_Date->FormValue)) {
            $this->EDD_Date->addErrorMessage($this->EDD_Date->getErrorMessage(false));
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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // RIDNo
        $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // ARTCycle
        $this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, null, false);

        // FemaleFactor
        $this->FemaleFactor->setDbValueDef($rsnew, $this->FemaleFactor->CurrentValue, null, false);

        // MaleFactor
        $this->MaleFactor->setDbValueDef($rsnew, $this->MaleFactor->CurrentValue, null, false);

        // Protocol
        $this->Protocol->setDbValueDef($rsnew, $this->Protocol->CurrentValue, null, false);

        // SemenFrozen
        $this->SemenFrozen->setDbValueDef($rsnew, $this->SemenFrozen->CurrentValue, null, false);

        // A4ICSICycle
        $this->A4ICSICycle->setDbValueDef($rsnew, $this->A4ICSICycle->CurrentValue, null, false);

        // TotalICSICycle
        $this->TotalICSICycle->setDbValueDef($rsnew, $this->TotalICSICycle->CurrentValue, null, false);

        // TypeOfInfertility
        $this->TypeOfInfertility->setDbValueDef($rsnew, $this->TypeOfInfertility->CurrentValue, null, false);

        // Duration
        $this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, null, false);

        // LMP
        $this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 0), null, false);

        // RelevantHistory
        $this->RelevantHistory->setDbValueDef($rsnew, $this->RelevantHistory->CurrentValue, null, false);

        // IUICycles
        $this->IUICycles->setDbValueDef($rsnew, $this->IUICycles->CurrentValue, null, false);

        // AFC
        $this->AFC->setDbValueDef($rsnew, $this->AFC->CurrentValue, null, false);

        // AMH
        $this->AMH->setDbValueDef($rsnew, $this->AMH->CurrentValue, null, false);

        // FBMI
        $this->FBMI->setDbValueDef($rsnew, $this->FBMI->CurrentValue, null, false);

        // MBMI
        $this->MBMI->setDbValueDef($rsnew, $this->MBMI->CurrentValue, null, false);

        // OvarianVolumeRT
        $this->OvarianVolumeRT->setDbValueDef($rsnew, $this->OvarianVolumeRT->CurrentValue, null, false);

        // OvarianVolumeLT
        $this->OvarianVolumeLT->setDbValueDef($rsnew, $this->OvarianVolumeLT->CurrentValue, null, false);

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->setDbValueDef($rsnew, $this->DAYSOFSTIMULATION->CurrentValue, null, false);

        // DOSEOFGONADOTROPINS
        $this->DOSEOFGONADOTROPINS->setDbValueDef($rsnew, $this->DOSEOFGONADOTROPINS->CurrentValue, null, false);

        // INJTYPE
        $this->INJTYPE->setDbValueDef($rsnew, $this->INJTYPE->CurrentValue, null, false);

        // ANTAGONISTDAYS
        $this->ANTAGONISTDAYS->setDbValueDef($rsnew, $this->ANTAGONISTDAYS->CurrentValue, null, false);

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->setDbValueDef($rsnew, $this->ANTAGONISTSTARTDAY->CurrentValue, null, false);

        // GROWTHHORMONE
        $this->GROWTHHORMONE->setDbValueDef($rsnew, $this->GROWTHHORMONE->CurrentValue, null, false);

        // PRETREATMENT
        $this->PRETREATMENT->setDbValueDef($rsnew, $this->PRETREATMENT->CurrentValue, null, false);

        // SerumP4
        $this->SerumP4->setDbValueDef($rsnew, $this->SerumP4->CurrentValue, null, false);

        // FORT
        $this->FORT->setDbValueDef($rsnew, $this->FORT->CurrentValue, null, false);

        // MedicalFactors
        $this->MedicalFactors->setDbValueDef($rsnew, $this->MedicalFactors->CurrentValue, null, false);

        // SCDate
        $this->SCDate->setDbValueDef($rsnew, UnFormatDateTime($this->SCDate->CurrentValue, 0), null, false);

        // OvarianSurgery
        $this->OvarianSurgery->setDbValueDef($rsnew, $this->OvarianSurgery->CurrentValue, null, false);

        // PreProcedureOrder
        $this->PreProcedureOrder->setDbValueDef($rsnew, $this->PreProcedureOrder->CurrentValue, null, false);

        // TRIGGERR
        $this->TRIGGERR->setDbValueDef($rsnew, $this->TRIGGERR->CurrentValue, null, false);

        // TRIGGERDATE
        $this->TRIGGERDATE->setDbValueDef($rsnew, UnFormatDateTime($this->TRIGGERDATE->CurrentValue, 0), null, false);

        // ATHOMEorCLINIC
        $this->ATHOMEorCLINIC->setDbValueDef($rsnew, $this->ATHOMEorCLINIC->CurrentValue, null, false);

        // OPUDATE
        $this->OPUDATE->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDATE->CurrentValue, 0), null, false);

        // ALLFREEZEINDICATION
        $this->ALLFREEZEINDICATION->setDbValueDef($rsnew, $this->ALLFREEZEINDICATION->CurrentValue, null, false);

        // ERA
        $this->ERA->setDbValueDef($rsnew, $this->ERA->CurrentValue, null, false);

        // PGTA
        $this->PGTA->setDbValueDef($rsnew, $this->PGTA->CurrentValue, null, false);

        // PGD
        $this->PGD->setDbValueDef($rsnew, $this->PGD->CurrentValue, null, false);

        // DATEOFET
        $this->DATEOFET->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFET->CurrentValue, 0), null, false);

        // ET
        $this->ET->setDbValueDef($rsnew, $this->ET->CurrentValue, null, false);

        // ESET
        $this->ESET->setDbValueDef($rsnew, $this->ESET->CurrentValue, null, false);

        // DOET
        $this->DOET->setDbValueDef($rsnew, $this->DOET->CurrentValue, null, false);

        // SEMENPREPARATION
        $this->SEMENPREPARATION->setDbValueDef($rsnew, $this->SEMENPREPARATION->CurrentValue, null, false);

        // REASONFORESET
        $this->REASONFORESET->setDbValueDef($rsnew, $this->REASONFORESET->CurrentValue, null, false);

        // Expectedoocytes
        $this->Expectedoocytes->setDbValueDef($rsnew, $this->Expectedoocytes->CurrentValue, null, false);

        // StChDate1
        $this->StChDate1->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate1->CurrentValue, 0), null, false);

        // StChDate2
        $this->StChDate2->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate2->CurrentValue, 0), null, false);

        // StChDate3
        $this->StChDate3->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate3->CurrentValue, 0), null, false);

        // StChDate4
        $this->StChDate4->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate4->CurrentValue, 0), null, false);

        // StChDate5
        $this->StChDate5->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate5->CurrentValue, 0), null, false);

        // StChDate6
        $this->StChDate6->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate6->CurrentValue, 0), null, false);

        // StChDate7
        $this->StChDate7->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate7->CurrentValue, 0), null, false);

        // StChDate8
        $this->StChDate8->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate8->CurrentValue, 0), null, false);

        // StChDate9
        $this->StChDate9->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate9->CurrentValue, 0), null, false);

        // StChDate10
        $this->StChDate10->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate10->CurrentValue, 0), null, false);

        // StChDate11
        $this->StChDate11->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate11->CurrentValue, 0), null, false);

        // StChDate12
        $this->StChDate12->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate12->CurrentValue, 0), null, false);

        // StChDate13
        $this->StChDate13->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate13->CurrentValue, 0), null, false);

        // CycleDay1
        $this->CycleDay1->setDbValueDef($rsnew, $this->CycleDay1->CurrentValue, null, false);

        // CycleDay2
        $this->CycleDay2->setDbValueDef($rsnew, $this->CycleDay2->CurrentValue, null, false);

        // CycleDay3
        $this->CycleDay3->setDbValueDef($rsnew, $this->CycleDay3->CurrentValue, null, false);

        // CycleDay4
        $this->CycleDay4->setDbValueDef($rsnew, $this->CycleDay4->CurrentValue, null, false);

        // CycleDay5
        $this->CycleDay5->setDbValueDef($rsnew, $this->CycleDay5->CurrentValue, null, false);

        // CycleDay6
        $this->CycleDay6->setDbValueDef($rsnew, $this->CycleDay6->CurrentValue, null, false);

        // CycleDay7
        $this->CycleDay7->setDbValueDef($rsnew, $this->CycleDay7->CurrentValue, null, false);

        // CycleDay8
        $this->CycleDay8->setDbValueDef($rsnew, $this->CycleDay8->CurrentValue, null, false);

        // CycleDay9
        $this->CycleDay9->setDbValueDef($rsnew, $this->CycleDay9->CurrentValue, null, false);

        // CycleDay10
        $this->CycleDay10->setDbValueDef($rsnew, $this->CycleDay10->CurrentValue, null, false);

        // CycleDay11
        $this->CycleDay11->setDbValueDef($rsnew, $this->CycleDay11->CurrentValue, null, false);

        // CycleDay12
        $this->CycleDay12->setDbValueDef($rsnew, $this->CycleDay12->CurrentValue, null, false);

        // CycleDay13
        $this->CycleDay13->setDbValueDef($rsnew, $this->CycleDay13->CurrentValue, null, false);

        // StimulationDay1
        $this->StimulationDay1->setDbValueDef($rsnew, $this->StimulationDay1->CurrentValue, null, false);

        // StimulationDay2
        $this->StimulationDay2->setDbValueDef($rsnew, $this->StimulationDay2->CurrentValue, null, false);

        // StimulationDay3
        $this->StimulationDay3->setDbValueDef($rsnew, $this->StimulationDay3->CurrentValue, null, false);

        // StimulationDay4
        $this->StimulationDay4->setDbValueDef($rsnew, $this->StimulationDay4->CurrentValue, null, false);

        // StimulationDay5
        $this->StimulationDay5->setDbValueDef($rsnew, $this->StimulationDay5->CurrentValue, null, false);

        // StimulationDay6
        $this->StimulationDay6->setDbValueDef($rsnew, $this->StimulationDay6->CurrentValue, null, false);

        // StimulationDay7
        $this->StimulationDay7->setDbValueDef($rsnew, $this->StimulationDay7->CurrentValue, null, false);

        // StimulationDay8
        $this->StimulationDay8->setDbValueDef($rsnew, $this->StimulationDay8->CurrentValue, null, false);

        // StimulationDay9
        $this->StimulationDay9->setDbValueDef($rsnew, $this->StimulationDay9->CurrentValue, null, false);

        // StimulationDay10
        $this->StimulationDay10->setDbValueDef($rsnew, $this->StimulationDay10->CurrentValue, null, false);

        // StimulationDay11
        $this->StimulationDay11->setDbValueDef($rsnew, $this->StimulationDay11->CurrentValue, null, false);

        // StimulationDay12
        $this->StimulationDay12->setDbValueDef($rsnew, $this->StimulationDay12->CurrentValue, null, false);

        // StimulationDay13
        $this->StimulationDay13->setDbValueDef($rsnew, $this->StimulationDay13->CurrentValue, null, false);

        // Tablet1
        $this->Tablet1->setDbValueDef($rsnew, $this->Tablet1->CurrentValue, null, false);

        // Tablet2
        $this->Tablet2->setDbValueDef($rsnew, $this->Tablet2->CurrentValue, null, false);

        // Tablet3
        $this->Tablet3->setDbValueDef($rsnew, $this->Tablet3->CurrentValue, null, false);

        // Tablet4
        $this->Tablet4->setDbValueDef($rsnew, $this->Tablet4->CurrentValue, null, false);

        // Tablet5
        $this->Tablet5->setDbValueDef($rsnew, $this->Tablet5->CurrentValue, null, false);

        // Tablet6
        $this->Tablet6->setDbValueDef($rsnew, $this->Tablet6->CurrentValue, null, false);

        // Tablet7
        $this->Tablet7->setDbValueDef($rsnew, $this->Tablet7->CurrentValue, null, false);

        // Tablet8
        $this->Tablet8->setDbValueDef($rsnew, $this->Tablet8->CurrentValue, null, false);

        // Tablet9
        $this->Tablet9->setDbValueDef($rsnew, $this->Tablet9->CurrentValue, null, false);

        // Tablet10
        $this->Tablet10->setDbValueDef($rsnew, $this->Tablet10->CurrentValue, null, false);

        // Tablet11
        $this->Tablet11->setDbValueDef($rsnew, $this->Tablet11->CurrentValue, null, false);

        // Tablet12
        $this->Tablet12->setDbValueDef($rsnew, $this->Tablet12->CurrentValue, null, false);

        // Tablet13
        $this->Tablet13->setDbValueDef($rsnew, $this->Tablet13->CurrentValue, null, false);

        // RFSH1
        $this->RFSH1->setDbValueDef($rsnew, $this->RFSH1->CurrentValue, null, false);

        // RFSH2
        $this->RFSH2->setDbValueDef($rsnew, $this->RFSH2->CurrentValue, null, false);

        // RFSH3
        $this->RFSH3->setDbValueDef($rsnew, $this->RFSH3->CurrentValue, null, false);

        // RFSH4
        $this->RFSH4->setDbValueDef($rsnew, $this->RFSH4->CurrentValue, null, false);

        // RFSH5
        $this->RFSH5->setDbValueDef($rsnew, $this->RFSH5->CurrentValue, null, false);

        // RFSH6
        $this->RFSH6->setDbValueDef($rsnew, $this->RFSH6->CurrentValue, null, false);

        // RFSH7
        $this->RFSH7->setDbValueDef($rsnew, $this->RFSH7->CurrentValue, null, false);

        // RFSH8
        $this->RFSH8->setDbValueDef($rsnew, $this->RFSH8->CurrentValue, null, false);

        // RFSH9
        $this->RFSH9->setDbValueDef($rsnew, $this->RFSH9->CurrentValue, null, false);

        // RFSH10
        $this->RFSH10->setDbValueDef($rsnew, $this->RFSH10->CurrentValue, null, false);

        // RFSH11
        $this->RFSH11->setDbValueDef($rsnew, $this->RFSH11->CurrentValue, null, false);

        // RFSH12
        $this->RFSH12->setDbValueDef($rsnew, $this->RFSH12->CurrentValue, null, false);

        // RFSH13
        $this->RFSH13->setDbValueDef($rsnew, $this->RFSH13->CurrentValue, null, false);

        // HMG1
        $this->HMG1->setDbValueDef($rsnew, $this->HMG1->CurrentValue, null, false);

        // HMG2
        $this->HMG2->setDbValueDef($rsnew, $this->HMG2->CurrentValue, null, false);

        // HMG3
        $this->HMG3->setDbValueDef($rsnew, $this->HMG3->CurrentValue, null, false);

        // HMG4
        $this->HMG4->setDbValueDef($rsnew, $this->HMG4->CurrentValue, null, false);

        // HMG5
        $this->HMG5->setDbValueDef($rsnew, $this->HMG5->CurrentValue, null, false);

        // HMG6
        $this->HMG6->setDbValueDef($rsnew, $this->HMG6->CurrentValue, null, false);

        // HMG7
        $this->HMG7->setDbValueDef($rsnew, $this->HMG7->CurrentValue, null, false);

        // HMG8
        $this->HMG8->setDbValueDef($rsnew, $this->HMG8->CurrentValue, null, false);

        // HMG9
        $this->HMG9->setDbValueDef($rsnew, $this->HMG9->CurrentValue, null, false);

        // HMG10
        $this->HMG10->setDbValueDef($rsnew, $this->HMG10->CurrentValue, null, false);

        // HMG11
        $this->HMG11->setDbValueDef($rsnew, $this->HMG11->CurrentValue, null, false);

        // HMG12
        $this->HMG12->setDbValueDef($rsnew, $this->HMG12->CurrentValue, null, false);

        // HMG13
        $this->HMG13->setDbValueDef($rsnew, $this->HMG13->CurrentValue, null, false);

        // GnRH1
        $this->GnRH1->setDbValueDef($rsnew, $this->GnRH1->CurrentValue, null, false);

        // GnRH2
        $this->GnRH2->setDbValueDef($rsnew, $this->GnRH2->CurrentValue, null, false);

        // GnRH3
        $this->GnRH3->setDbValueDef($rsnew, $this->GnRH3->CurrentValue, null, false);

        // GnRH4
        $this->GnRH4->setDbValueDef($rsnew, $this->GnRH4->CurrentValue, null, false);

        // GnRH5
        $this->GnRH5->setDbValueDef($rsnew, $this->GnRH5->CurrentValue, null, false);

        // GnRH6
        $this->GnRH6->setDbValueDef($rsnew, $this->GnRH6->CurrentValue, null, false);

        // GnRH7
        $this->GnRH7->setDbValueDef($rsnew, $this->GnRH7->CurrentValue, null, false);

        // GnRH8
        $this->GnRH8->setDbValueDef($rsnew, $this->GnRH8->CurrentValue, null, false);

        // GnRH9
        $this->GnRH9->setDbValueDef($rsnew, $this->GnRH9->CurrentValue, null, false);

        // GnRH10
        $this->GnRH10->setDbValueDef($rsnew, $this->GnRH10->CurrentValue, null, false);

        // GnRH11
        $this->GnRH11->setDbValueDef($rsnew, $this->GnRH11->CurrentValue, null, false);

        // GnRH12
        $this->GnRH12->setDbValueDef($rsnew, $this->GnRH12->CurrentValue, null, false);

        // GnRH13
        $this->GnRH13->setDbValueDef($rsnew, $this->GnRH13->CurrentValue, null, false);

        // E21
        $this->E21->setDbValueDef($rsnew, $this->E21->CurrentValue, null, false);

        // E22
        $this->E22->setDbValueDef($rsnew, $this->E22->CurrentValue, null, false);

        // E23
        $this->E23->setDbValueDef($rsnew, $this->E23->CurrentValue, null, false);

        // E24
        $this->E24->setDbValueDef($rsnew, $this->E24->CurrentValue, null, false);

        // E25
        $this->E25->setDbValueDef($rsnew, $this->E25->CurrentValue, null, false);

        // E26
        $this->E26->setDbValueDef($rsnew, $this->E26->CurrentValue, null, false);

        // E27
        $this->E27->setDbValueDef($rsnew, $this->E27->CurrentValue, null, false);

        // E28
        $this->E28->setDbValueDef($rsnew, $this->E28->CurrentValue, null, false);

        // E29
        $this->E29->setDbValueDef($rsnew, $this->E29->CurrentValue, null, false);

        // E210
        $this->E210->setDbValueDef($rsnew, $this->E210->CurrentValue, null, false);

        // E211
        $this->E211->setDbValueDef($rsnew, $this->E211->CurrentValue, null, false);

        // E212
        $this->E212->setDbValueDef($rsnew, $this->E212->CurrentValue, null, false);

        // E213
        $this->E213->setDbValueDef($rsnew, $this->E213->CurrentValue, null, false);

        // P41
        $this->P41->setDbValueDef($rsnew, $this->P41->CurrentValue, null, false);

        // P42
        $this->P42->setDbValueDef($rsnew, $this->P42->CurrentValue, null, false);

        // P43
        $this->P43->setDbValueDef($rsnew, $this->P43->CurrentValue, null, false);

        // P44
        $this->P44->setDbValueDef($rsnew, $this->P44->CurrentValue, null, false);

        // P45
        $this->P45->setDbValueDef($rsnew, $this->P45->CurrentValue, null, false);

        // P46
        $this->P46->setDbValueDef($rsnew, $this->P46->CurrentValue, null, false);

        // P47
        $this->P47->setDbValueDef($rsnew, $this->P47->CurrentValue, null, false);

        // P48
        $this->P48->setDbValueDef($rsnew, $this->P48->CurrentValue, null, false);

        // P49
        $this->P49->setDbValueDef($rsnew, $this->P49->CurrentValue, null, false);

        // P410
        $this->P410->setDbValueDef($rsnew, $this->P410->CurrentValue, null, false);

        // P411
        $this->P411->setDbValueDef($rsnew, $this->P411->CurrentValue, null, false);

        // P412
        $this->P412->setDbValueDef($rsnew, $this->P412->CurrentValue, null, false);

        // P413
        $this->P413->setDbValueDef($rsnew, $this->P413->CurrentValue, null, false);

        // USGRt1
        $this->USGRt1->setDbValueDef($rsnew, $this->USGRt1->CurrentValue, null, false);

        // USGRt2
        $this->USGRt2->setDbValueDef($rsnew, $this->USGRt2->CurrentValue, null, false);

        // USGRt3
        $this->USGRt3->setDbValueDef($rsnew, $this->USGRt3->CurrentValue, null, false);

        // USGRt4
        $this->USGRt4->setDbValueDef($rsnew, $this->USGRt4->CurrentValue, null, false);

        // USGRt5
        $this->USGRt5->setDbValueDef($rsnew, $this->USGRt5->CurrentValue, null, false);

        // USGRt6
        $this->USGRt6->setDbValueDef($rsnew, $this->USGRt6->CurrentValue, null, false);

        // USGRt7
        $this->USGRt7->setDbValueDef($rsnew, $this->USGRt7->CurrentValue, null, false);

        // USGRt8
        $this->USGRt8->setDbValueDef($rsnew, $this->USGRt8->CurrentValue, null, false);

        // USGRt9
        $this->USGRt9->setDbValueDef($rsnew, $this->USGRt9->CurrentValue, null, false);

        // USGRt10
        $this->USGRt10->setDbValueDef($rsnew, $this->USGRt10->CurrentValue, null, false);

        // USGRt11
        $this->USGRt11->setDbValueDef($rsnew, $this->USGRt11->CurrentValue, null, false);

        // USGRt12
        $this->USGRt12->setDbValueDef($rsnew, $this->USGRt12->CurrentValue, null, false);

        // USGRt13
        $this->USGRt13->setDbValueDef($rsnew, $this->USGRt13->CurrentValue, null, false);

        // USGLt1
        $this->USGLt1->setDbValueDef($rsnew, $this->USGLt1->CurrentValue, null, false);

        // USGLt2
        $this->USGLt2->setDbValueDef($rsnew, $this->USGLt2->CurrentValue, null, false);

        // USGLt3
        $this->USGLt3->setDbValueDef($rsnew, $this->USGLt3->CurrentValue, null, false);

        // USGLt4
        $this->USGLt4->setDbValueDef($rsnew, $this->USGLt4->CurrentValue, null, false);

        // USGLt5
        $this->USGLt5->setDbValueDef($rsnew, $this->USGLt5->CurrentValue, null, false);

        // USGLt6
        $this->USGLt6->setDbValueDef($rsnew, $this->USGLt6->CurrentValue, null, false);

        // USGLt7
        $this->USGLt7->setDbValueDef($rsnew, $this->USGLt7->CurrentValue, null, false);

        // USGLt8
        $this->USGLt8->setDbValueDef($rsnew, $this->USGLt8->CurrentValue, null, false);

        // USGLt9
        $this->USGLt9->setDbValueDef($rsnew, $this->USGLt9->CurrentValue, null, false);

        // USGLt10
        $this->USGLt10->setDbValueDef($rsnew, $this->USGLt10->CurrentValue, null, false);

        // USGLt11
        $this->USGLt11->setDbValueDef($rsnew, $this->USGLt11->CurrentValue, null, false);

        // USGLt12
        $this->USGLt12->setDbValueDef($rsnew, $this->USGLt12->CurrentValue, null, false);

        // USGLt13
        $this->USGLt13->setDbValueDef($rsnew, $this->USGLt13->CurrentValue, null, false);

        // EM1
        $this->EM1->setDbValueDef($rsnew, $this->EM1->CurrentValue, null, false);

        // EM2
        $this->EM2->setDbValueDef($rsnew, $this->EM2->CurrentValue, null, false);

        // EM3
        $this->EM3->setDbValueDef($rsnew, $this->EM3->CurrentValue, null, false);

        // EM4
        $this->EM4->setDbValueDef($rsnew, $this->EM4->CurrentValue, null, false);

        // EM5
        $this->EM5->setDbValueDef($rsnew, $this->EM5->CurrentValue, null, false);

        // EM6
        $this->EM6->setDbValueDef($rsnew, $this->EM6->CurrentValue, null, false);

        // EM7
        $this->EM7->setDbValueDef($rsnew, $this->EM7->CurrentValue, null, false);

        // EM8
        $this->EM8->setDbValueDef($rsnew, $this->EM8->CurrentValue, null, false);

        // EM9
        $this->EM9->setDbValueDef($rsnew, $this->EM9->CurrentValue, null, false);

        // EM10
        $this->EM10->setDbValueDef($rsnew, $this->EM10->CurrentValue, null, false);

        // EM11
        $this->EM11->setDbValueDef($rsnew, $this->EM11->CurrentValue, null, false);

        // EM12
        $this->EM12->setDbValueDef($rsnew, $this->EM12->CurrentValue, null, false);

        // EM13
        $this->EM13->setDbValueDef($rsnew, $this->EM13->CurrentValue, null, false);

        // Others1
        $this->Others1->setDbValueDef($rsnew, $this->Others1->CurrentValue, null, false);

        // Others2
        $this->Others2->setDbValueDef($rsnew, $this->Others2->CurrentValue, null, false);

        // Others3
        $this->Others3->setDbValueDef($rsnew, $this->Others3->CurrentValue, null, false);

        // Others4
        $this->Others4->setDbValueDef($rsnew, $this->Others4->CurrentValue, null, false);

        // Others5
        $this->Others5->setDbValueDef($rsnew, $this->Others5->CurrentValue, null, false);

        // Others6
        $this->Others6->setDbValueDef($rsnew, $this->Others6->CurrentValue, null, false);

        // Others7
        $this->Others7->setDbValueDef($rsnew, $this->Others7->CurrentValue, null, false);

        // Others8
        $this->Others8->setDbValueDef($rsnew, $this->Others8->CurrentValue, null, false);

        // Others9
        $this->Others9->setDbValueDef($rsnew, $this->Others9->CurrentValue, null, false);

        // Others10
        $this->Others10->setDbValueDef($rsnew, $this->Others10->CurrentValue, null, false);

        // Others11
        $this->Others11->setDbValueDef($rsnew, $this->Others11->CurrentValue, null, false);

        // Others12
        $this->Others12->setDbValueDef($rsnew, $this->Others12->CurrentValue, null, false);

        // Others13
        $this->Others13->setDbValueDef($rsnew, $this->Others13->CurrentValue, null, false);

        // DR1
        $this->DR1->setDbValueDef($rsnew, $this->DR1->CurrentValue, null, false);

        // DR2
        $this->DR2->setDbValueDef($rsnew, $this->DR2->CurrentValue, null, false);

        // DR3
        $this->DR3->setDbValueDef($rsnew, $this->DR3->CurrentValue, null, false);

        // DR4
        $this->DR4->setDbValueDef($rsnew, $this->DR4->CurrentValue, null, false);

        // DR5
        $this->DR5->setDbValueDef($rsnew, $this->DR5->CurrentValue, null, false);

        // DR6
        $this->DR6->setDbValueDef($rsnew, $this->DR6->CurrentValue, null, false);

        // DR7
        $this->DR7->setDbValueDef($rsnew, $this->DR7->CurrentValue, null, false);

        // DR8
        $this->DR8->setDbValueDef($rsnew, $this->DR8->CurrentValue, null, false);

        // DR9
        $this->DR9->setDbValueDef($rsnew, $this->DR9->CurrentValue, null, false);

        // DR10
        $this->DR10->setDbValueDef($rsnew, $this->DR10->CurrentValue, null, false);

        // DR11
        $this->DR11->setDbValueDef($rsnew, $this->DR11->CurrentValue, null, false);

        // DR12
        $this->DR12->setDbValueDef($rsnew, $this->DR12->CurrentValue, null, false);

        // DR13
        $this->DR13->setDbValueDef($rsnew, $this->DR13->CurrentValue, null, false);

        // DOCTORRESPONSIBLE
        $this->DOCTORRESPONSIBLE->setDbValueDef($rsnew, $this->DOCTORRESPONSIBLE->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // Convert
        $this->Convert->setDbValueDef($rsnew, $this->Convert->CurrentValue, null, false);

        // Consultant
        $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, false);

        // InseminatinTechnique
        $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, false);

        // IndicationForART
        $this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, null, false);

        // Hysteroscopy
        $this->Hysteroscopy->setDbValueDef($rsnew, $this->Hysteroscopy->CurrentValue, null, false);

        // EndometrialScratching
        $this->EndometrialScratching->setDbValueDef($rsnew, $this->EndometrialScratching->CurrentValue, null, false);

        // TrialCannulation
        $this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, null, false);

        // CYCLETYPE
        $this->CYCLETYPE->setDbValueDef($rsnew, $this->CYCLETYPE->CurrentValue, null, false);

        // HRTCYCLE
        $this->HRTCYCLE->setDbValueDef($rsnew, $this->HRTCYCLE->CurrentValue, null, false);

        // OralEstrogenDosage
        $this->OralEstrogenDosage->setDbValueDef($rsnew, $this->OralEstrogenDosage->CurrentValue, null, false);

        // VaginalEstrogen
        $this->VaginalEstrogen->setDbValueDef($rsnew, $this->VaginalEstrogen->CurrentValue, null, false);

        // GCSF
        $this->GCSF->setDbValueDef($rsnew, $this->GCSF->CurrentValue, null, false);

        // ActivatedPRP
        $this->ActivatedPRP->setDbValueDef($rsnew, $this->ActivatedPRP->CurrentValue, null, false);

        // UCLcm
        $this->UCLcm->setDbValueDef($rsnew, $this->UCLcm->CurrentValue, null, false);

        // DATOFEMBRYOTRANSFER
        $this->DATOFEMBRYOTRANSFER->setDbValueDef($rsnew, UnFormatDateTime($this->DATOFEMBRYOTRANSFER->CurrentValue, 0), null, false);

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->setDbValueDef($rsnew, $this->DAYOFEMBRYOTRANSFER->CurrentValue, null, false);

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTHAWED->CurrentValue, null, false);

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTRANSFERRED->CurrentValue, null, false);

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->setDbValueDef($rsnew, $this->DAYOFEMBRYOS->CurrentValue, null, false);

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->setDbValueDef($rsnew, $this->CRYOPRESERVEDEMBRYOS->CurrentValue, null, false);

        // ViaAdmin
        $this->ViaAdmin->setDbValueDef($rsnew, $this->ViaAdmin->CurrentValue, null, false);

        // ViaStartDateTime
        $this->ViaStartDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ViaStartDateTime->CurrentValue, 0), null, false);

        // ViaDose
        $this->ViaDose->setDbValueDef($rsnew, $this->ViaDose->CurrentValue, null, false);

        // AllFreeze
        $this->AllFreeze->setDbValueDef($rsnew, $this->AllFreeze->CurrentValue, null, false);

        // TreatmentCancel
        $this->TreatmentCancel->setDbValueDef($rsnew, $this->TreatmentCancel->CurrentValue, null, false);

        // Reason
        $this->Reason->setDbValueDef($rsnew, $this->Reason->CurrentValue, null, false);

        // ProgesteroneAdmin
        $this->ProgesteroneAdmin->setDbValueDef($rsnew, $this->ProgesteroneAdmin->CurrentValue, null, false);

        // ProgesteroneStart
        $this->ProgesteroneStart->setDbValueDef($rsnew, $this->ProgesteroneStart->CurrentValue, null, false);

        // ProgesteroneDose
        $this->ProgesteroneDose->setDbValueDef($rsnew, $this->ProgesteroneDose->CurrentValue, null, false);

        // StChDate14
        $this->StChDate14->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate14->CurrentValue, 0), null, false);

        // StChDate15
        $this->StChDate15->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate15->CurrentValue, 0), null, false);

        // StChDate16
        $this->StChDate16->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate16->CurrentValue, 0), null, false);

        // StChDate17
        $this->StChDate17->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate17->CurrentValue, 0), null, false);

        // StChDate18
        $this->StChDate18->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate18->CurrentValue, 0), null, false);

        // StChDate19
        $this->StChDate19->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate19->CurrentValue, 0), null, false);

        // StChDate20
        $this->StChDate20->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate20->CurrentValue, 0), null, false);

        // StChDate21
        $this->StChDate21->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate21->CurrentValue, 0), null, false);

        // StChDate22
        $this->StChDate22->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate22->CurrentValue, 0), null, false);

        // StChDate23
        $this->StChDate23->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate23->CurrentValue, 0), null, false);

        // StChDate24
        $this->StChDate24->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate24->CurrentValue, 0), null, false);

        // StChDate25
        $this->StChDate25->setDbValueDef($rsnew, UnFormatDateTime($this->StChDate25->CurrentValue, 0), null, false);

        // CycleDay14
        $this->CycleDay14->setDbValueDef($rsnew, $this->CycleDay14->CurrentValue, null, false);

        // CycleDay15
        $this->CycleDay15->setDbValueDef($rsnew, $this->CycleDay15->CurrentValue, null, false);

        // CycleDay16
        $this->CycleDay16->setDbValueDef($rsnew, $this->CycleDay16->CurrentValue, null, false);

        // CycleDay17
        $this->CycleDay17->setDbValueDef($rsnew, $this->CycleDay17->CurrentValue, null, false);

        // CycleDay18
        $this->CycleDay18->setDbValueDef($rsnew, $this->CycleDay18->CurrentValue, null, false);

        // CycleDay19
        $this->CycleDay19->setDbValueDef($rsnew, $this->CycleDay19->CurrentValue, null, false);

        // CycleDay20
        $this->CycleDay20->setDbValueDef($rsnew, $this->CycleDay20->CurrentValue, null, false);

        // CycleDay21
        $this->CycleDay21->setDbValueDef($rsnew, $this->CycleDay21->CurrentValue, null, false);

        // CycleDay22
        $this->CycleDay22->setDbValueDef($rsnew, $this->CycleDay22->CurrentValue, null, false);

        // CycleDay23
        $this->CycleDay23->setDbValueDef($rsnew, $this->CycleDay23->CurrentValue, null, false);

        // CycleDay24
        $this->CycleDay24->setDbValueDef($rsnew, $this->CycleDay24->CurrentValue, null, false);

        // CycleDay25
        $this->CycleDay25->setDbValueDef($rsnew, $this->CycleDay25->CurrentValue, null, false);

        // StimulationDay14
        $this->StimulationDay14->setDbValueDef($rsnew, $this->StimulationDay14->CurrentValue, null, false);

        // StimulationDay15
        $this->StimulationDay15->setDbValueDef($rsnew, $this->StimulationDay15->CurrentValue, null, false);

        // StimulationDay16
        $this->StimulationDay16->setDbValueDef($rsnew, $this->StimulationDay16->CurrentValue, null, false);

        // StimulationDay17
        $this->StimulationDay17->setDbValueDef($rsnew, $this->StimulationDay17->CurrentValue, null, false);

        // StimulationDay18
        $this->StimulationDay18->setDbValueDef($rsnew, $this->StimulationDay18->CurrentValue, null, false);

        // StimulationDay19
        $this->StimulationDay19->setDbValueDef($rsnew, $this->StimulationDay19->CurrentValue, null, false);

        // StimulationDay20
        $this->StimulationDay20->setDbValueDef($rsnew, $this->StimulationDay20->CurrentValue, null, false);

        // StimulationDay21
        $this->StimulationDay21->setDbValueDef($rsnew, $this->StimulationDay21->CurrentValue, null, false);

        // StimulationDay22
        $this->StimulationDay22->setDbValueDef($rsnew, $this->StimulationDay22->CurrentValue, null, false);

        // StimulationDay23
        $this->StimulationDay23->setDbValueDef($rsnew, $this->StimulationDay23->CurrentValue, null, false);

        // StimulationDay24
        $this->StimulationDay24->setDbValueDef($rsnew, $this->StimulationDay24->CurrentValue, null, false);

        // StimulationDay25
        $this->StimulationDay25->setDbValueDef($rsnew, $this->StimulationDay25->CurrentValue, null, false);

        // Tablet14
        $this->Tablet14->setDbValueDef($rsnew, $this->Tablet14->CurrentValue, null, false);

        // Tablet15
        $this->Tablet15->setDbValueDef($rsnew, $this->Tablet15->CurrentValue, null, false);

        // Tablet16
        $this->Tablet16->setDbValueDef($rsnew, $this->Tablet16->CurrentValue, null, false);

        // Tablet17
        $this->Tablet17->setDbValueDef($rsnew, $this->Tablet17->CurrentValue, null, false);

        // Tablet18
        $this->Tablet18->setDbValueDef($rsnew, $this->Tablet18->CurrentValue, null, false);

        // Tablet19
        $this->Tablet19->setDbValueDef($rsnew, $this->Tablet19->CurrentValue, null, false);

        // Tablet20
        $this->Tablet20->setDbValueDef($rsnew, $this->Tablet20->CurrentValue, null, false);

        // Tablet21
        $this->Tablet21->setDbValueDef($rsnew, $this->Tablet21->CurrentValue, null, false);

        // Tablet22
        $this->Tablet22->setDbValueDef($rsnew, $this->Tablet22->CurrentValue, null, false);

        // Tablet23
        $this->Tablet23->setDbValueDef($rsnew, $this->Tablet23->CurrentValue, null, false);

        // Tablet24
        $this->Tablet24->setDbValueDef($rsnew, $this->Tablet24->CurrentValue, null, false);

        // Tablet25
        $this->Tablet25->setDbValueDef($rsnew, $this->Tablet25->CurrentValue, null, false);

        // RFSH14
        $this->RFSH14->setDbValueDef($rsnew, $this->RFSH14->CurrentValue, null, false);

        // RFSH15
        $this->RFSH15->setDbValueDef($rsnew, $this->RFSH15->CurrentValue, null, false);

        // RFSH16
        $this->RFSH16->setDbValueDef($rsnew, $this->RFSH16->CurrentValue, null, false);

        // RFSH17
        $this->RFSH17->setDbValueDef($rsnew, $this->RFSH17->CurrentValue, null, false);

        // RFSH18
        $this->RFSH18->setDbValueDef($rsnew, $this->RFSH18->CurrentValue, null, false);

        // RFSH19
        $this->RFSH19->setDbValueDef($rsnew, $this->RFSH19->CurrentValue, null, false);

        // RFSH20
        $this->RFSH20->setDbValueDef($rsnew, $this->RFSH20->CurrentValue, null, false);

        // RFSH21
        $this->RFSH21->setDbValueDef($rsnew, $this->RFSH21->CurrentValue, null, false);

        // RFSH22
        $this->RFSH22->setDbValueDef($rsnew, $this->RFSH22->CurrentValue, null, false);

        // RFSH23
        $this->RFSH23->setDbValueDef($rsnew, $this->RFSH23->CurrentValue, null, false);

        // RFSH24
        $this->RFSH24->setDbValueDef($rsnew, $this->RFSH24->CurrentValue, null, false);

        // RFSH25
        $this->RFSH25->setDbValueDef($rsnew, $this->RFSH25->CurrentValue, null, false);

        // HMG14
        $this->HMG14->setDbValueDef($rsnew, $this->HMG14->CurrentValue, null, false);

        // HMG15
        $this->HMG15->setDbValueDef($rsnew, $this->HMG15->CurrentValue, null, false);

        // HMG16
        $this->HMG16->setDbValueDef($rsnew, $this->HMG16->CurrentValue, null, false);

        // HMG17
        $this->HMG17->setDbValueDef($rsnew, $this->HMG17->CurrentValue, null, false);

        // HMG18
        $this->HMG18->setDbValueDef($rsnew, $this->HMG18->CurrentValue, null, false);

        // HMG19
        $this->HMG19->setDbValueDef($rsnew, $this->HMG19->CurrentValue, null, false);

        // HMG20
        $this->HMG20->setDbValueDef($rsnew, $this->HMG20->CurrentValue, null, false);

        // HMG21
        $this->HMG21->setDbValueDef($rsnew, $this->HMG21->CurrentValue, null, false);

        // HMG22
        $this->HMG22->setDbValueDef($rsnew, $this->HMG22->CurrentValue, null, false);

        // HMG23
        $this->HMG23->setDbValueDef($rsnew, $this->HMG23->CurrentValue, null, false);

        // HMG24
        $this->HMG24->setDbValueDef($rsnew, $this->HMG24->CurrentValue, null, false);

        // HMG25
        $this->HMG25->setDbValueDef($rsnew, $this->HMG25->CurrentValue, null, false);

        // GnRH14
        $this->GnRH14->setDbValueDef($rsnew, $this->GnRH14->CurrentValue, null, false);

        // GnRH15
        $this->GnRH15->setDbValueDef($rsnew, $this->GnRH15->CurrentValue, null, false);

        // GnRH16
        $this->GnRH16->setDbValueDef($rsnew, $this->GnRH16->CurrentValue, null, false);

        // GnRH17
        $this->GnRH17->setDbValueDef($rsnew, $this->GnRH17->CurrentValue, null, false);

        // GnRH18
        $this->GnRH18->setDbValueDef($rsnew, $this->GnRH18->CurrentValue, null, false);

        // GnRH19
        $this->GnRH19->setDbValueDef($rsnew, $this->GnRH19->CurrentValue, null, false);

        // GnRH20
        $this->GnRH20->setDbValueDef($rsnew, $this->GnRH20->CurrentValue, null, false);

        // GnRH21
        $this->GnRH21->setDbValueDef($rsnew, $this->GnRH21->CurrentValue, null, false);

        // GnRH22
        $this->GnRH22->setDbValueDef($rsnew, $this->GnRH22->CurrentValue, null, false);

        // GnRH23
        $this->GnRH23->setDbValueDef($rsnew, $this->GnRH23->CurrentValue, null, false);

        // GnRH24
        $this->GnRH24->setDbValueDef($rsnew, $this->GnRH24->CurrentValue, null, false);

        // GnRH25
        $this->GnRH25->setDbValueDef($rsnew, $this->GnRH25->CurrentValue, null, false);

        // P414
        $this->P414->setDbValueDef($rsnew, $this->P414->CurrentValue, null, false);

        // P415
        $this->P415->setDbValueDef($rsnew, $this->P415->CurrentValue, null, false);

        // P416
        $this->P416->setDbValueDef($rsnew, $this->P416->CurrentValue, null, false);

        // P417
        $this->P417->setDbValueDef($rsnew, $this->P417->CurrentValue, null, false);

        // P418
        $this->P418->setDbValueDef($rsnew, $this->P418->CurrentValue, null, false);

        // P419
        $this->P419->setDbValueDef($rsnew, $this->P419->CurrentValue, null, false);

        // P420
        $this->P420->setDbValueDef($rsnew, $this->P420->CurrentValue, null, false);

        // P421
        $this->P421->setDbValueDef($rsnew, $this->P421->CurrentValue, null, false);

        // P422
        $this->P422->setDbValueDef($rsnew, $this->P422->CurrentValue, null, false);

        // P423
        $this->P423->setDbValueDef($rsnew, $this->P423->CurrentValue, null, false);

        // P424
        $this->P424->setDbValueDef($rsnew, $this->P424->CurrentValue, null, false);

        // P425
        $this->P425->setDbValueDef($rsnew, $this->P425->CurrentValue, null, false);

        // USGRt14
        $this->USGRt14->setDbValueDef($rsnew, $this->USGRt14->CurrentValue, null, false);

        // USGRt15
        $this->USGRt15->setDbValueDef($rsnew, $this->USGRt15->CurrentValue, null, false);

        // USGRt16
        $this->USGRt16->setDbValueDef($rsnew, $this->USGRt16->CurrentValue, null, false);

        // USGRt17
        $this->USGRt17->setDbValueDef($rsnew, $this->USGRt17->CurrentValue, null, false);

        // USGRt18
        $this->USGRt18->setDbValueDef($rsnew, $this->USGRt18->CurrentValue, null, false);

        // USGRt19
        $this->USGRt19->setDbValueDef($rsnew, $this->USGRt19->CurrentValue, null, false);

        // USGRt20
        $this->USGRt20->setDbValueDef($rsnew, $this->USGRt20->CurrentValue, null, false);

        // USGRt21
        $this->USGRt21->setDbValueDef($rsnew, $this->USGRt21->CurrentValue, null, false);

        // USGRt22
        $this->USGRt22->setDbValueDef($rsnew, $this->USGRt22->CurrentValue, null, false);

        // USGRt23
        $this->USGRt23->setDbValueDef($rsnew, $this->USGRt23->CurrentValue, null, false);

        // USGRt24
        $this->USGRt24->setDbValueDef($rsnew, $this->USGRt24->CurrentValue, null, false);

        // USGRt25
        $this->USGRt25->setDbValueDef($rsnew, $this->USGRt25->CurrentValue, null, false);

        // USGLt14
        $this->USGLt14->setDbValueDef($rsnew, $this->USGLt14->CurrentValue, null, false);

        // USGLt15
        $this->USGLt15->setDbValueDef($rsnew, $this->USGLt15->CurrentValue, null, false);

        // USGLt16
        $this->USGLt16->setDbValueDef($rsnew, $this->USGLt16->CurrentValue, null, false);

        // USGLt17
        $this->USGLt17->setDbValueDef($rsnew, $this->USGLt17->CurrentValue, null, false);

        // USGLt18
        $this->USGLt18->setDbValueDef($rsnew, $this->USGLt18->CurrentValue, null, false);

        // USGLt19
        $this->USGLt19->setDbValueDef($rsnew, $this->USGLt19->CurrentValue, null, false);

        // USGLt20
        $this->USGLt20->setDbValueDef($rsnew, $this->USGLt20->CurrentValue, null, false);

        // USGLt21
        $this->USGLt21->setDbValueDef($rsnew, $this->USGLt21->CurrentValue, null, false);

        // USGLt22
        $this->USGLt22->setDbValueDef($rsnew, $this->USGLt22->CurrentValue, null, false);

        // USGLt23
        $this->USGLt23->setDbValueDef($rsnew, $this->USGLt23->CurrentValue, null, false);

        // USGLt24
        $this->USGLt24->setDbValueDef($rsnew, $this->USGLt24->CurrentValue, null, false);

        // USGLt25
        $this->USGLt25->setDbValueDef($rsnew, $this->USGLt25->CurrentValue, null, false);

        // EM14
        $this->EM14->setDbValueDef($rsnew, $this->EM14->CurrentValue, null, false);

        // EM15
        $this->EM15->setDbValueDef($rsnew, $this->EM15->CurrentValue, null, false);

        // EM16
        $this->EM16->setDbValueDef($rsnew, $this->EM16->CurrentValue, null, false);

        // EM17
        $this->EM17->setDbValueDef($rsnew, $this->EM17->CurrentValue, null, false);

        // EM18
        $this->EM18->setDbValueDef($rsnew, $this->EM18->CurrentValue, null, false);

        // EM19
        $this->EM19->setDbValueDef($rsnew, $this->EM19->CurrentValue, null, false);

        // EM20
        $this->EM20->setDbValueDef($rsnew, $this->EM20->CurrentValue, null, false);

        // EM21
        $this->EM21->setDbValueDef($rsnew, $this->EM21->CurrentValue, null, false);

        // EM22
        $this->EM22->setDbValueDef($rsnew, $this->EM22->CurrentValue, null, false);

        // EM23
        $this->EM23->setDbValueDef($rsnew, $this->EM23->CurrentValue, null, false);

        // EM24
        $this->EM24->setDbValueDef($rsnew, $this->EM24->CurrentValue, null, false);

        // EM25
        $this->EM25->setDbValueDef($rsnew, $this->EM25->CurrentValue, null, false);

        // Others14
        $this->Others14->setDbValueDef($rsnew, $this->Others14->CurrentValue, null, false);

        // Others15
        $this->Others15->setDbValueDef($rsnew, $this->Others15->CurrentValue, null, false);

        // Others16
        $this->Others16->setDbValueDef($rsnew, $this->Others16->CurrentValue, null, false);

        // Others17
        $this->Others17->setDbValueDef($rsnew, $this->Others17->CurrentValue, null, false);

        // Others18
        $this->Others18->setDbValueDef($rsnew, $this->Others18->CurrentValue, null, false);

        // Others19
        $this->Others19->setDbValueDef($rsnew, $this->Others19->CurrentValue, null, false);

        // Others20
        $this->Others20->setDbValueDef($rsnew, $this->Others20->CurrentValue, null, false);

        // Others21
        $this->Others21->setDbValueDef($rsnew, $this->Others21->CurrentValue, null, false);

        // Others22
        $this->Others22->setDbValueDef($rsnew, $this->Others22->CurrentValue, null, false);

        // Others23
        $this->Others23->setDbValueDef($rsnew, $this->Others23->CurrentValue, null, false);

        // Others24
        $this->Others24->setDbValueDef($rsnew, $this->Others24->CurrentValue, null, false);

        // Others25
        $this->Others25->setDbValueDef($rsnew, $this->Others25->CurrentValue, null, false);

        // DR14
        $this->DR14->setDbValueDef($rsnew, $this->DR14->CurrentValue, null, false);

        // DR15
        $this->DR15->setDbValueDef($rsnew, $this->DR15->CurrentValue, null, false);

        // DR16
        $this->DR16->setDbValueDef($rsnew, $this->DR16->CurrentValue, null, false);

        // DR17
        $this->DR17->setDbValueDef($rsnew, $this->DR17->CurrentValue, null, false);

        // DR18
        $this->DR18->setDbValueDef($rsnew, $this->DR18->CurrentValue, null, false);

        // DR19
        $this->DR19->setDbValueDef($rsnew, $this->DR19->CurrentValue, null, false);

        // DR20
        $this->DR20->setDbValueDef($rsnew, $this->DR20->CurrentValue, null, false);

        // DR21
        $this->DR21->setDbValueDef($rsnew, $this->DR21->CurrentValue, null, false);

        // DR22
        $this->DR22->setDbValueDef($rsnew, $this->DR22->CurrentValue, null, false);

        // DR23
        $this->DR23->setDbValueDef($rsnew, $this->DR23->CurrentValue, null, false);

        // DR24
        $this->DR24->setDbValueDef($rsnew, $this->DR24->CurrentValue, null, false);

        // DR25
        $this->DR25->setDbValueDef($rsnew, $this->DR25->CurrentValue, null, false);

        // E214
        $this->E214->setDbValueDef($rsnew, $this->E214->CurrentValue, null, false);

        // E215
        $this->E215->setDbValueDef($rsnew, $this->E215->CurrentValue, null, false);

        // E216
        $this->E216->setDbValueDef($rsnew, $this->E216->CurrentValue, null, false);

        // E217
        $this->E217->setDbValueDef($rsnew, $this->E217->CurrentValue, null, false);

        // E218
        $this->E218->setDbValueDef($rsnew, $this->E218->CurrentValue, null, false);

        // E219
        $this->E219->setDbValueDef($rsnew, $this->E219->CurrentValue, null, false);

        // E220
        $this->E220->setDbValueDef($rsnew, $this->E220->CurrentValue, null, false);

        // E221
        $this->E221->setDbValueDef($rsnew, $this->E221->CurrentValue, null, false);

        // E222
        $this->E222->setDbValueDef($rsnew, $this->E222->CurrentValue, null, false);

        // E223
        $this->E223->setDbValueDef($rsnew, $this->E223->CurrentValue, null, false);

        // E224
        $this->E224->setDbValueDef($rsnew, $this->E224->CurrentValue, null, false);

        // E225
        $this->E225->setDbValueDef($rsnew, $this->E225->CurrentValue, null, false);

        // EEETTTDTE
        $this->EEETTTDTE->setDbValueDef($rsnew, UnFormatDateTime($this->EEETTTDTE->CurrentValue, 0), null, false);

        // bhcgdate
        $this->bhcgdate->setDbValueDef($rsnew, UnFormatDateTime($this->bhcgdate->CurrentValue, 0), null, false);

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY->setDbValueDef($rsnew, $this->TUBAL_PATENCY->CurrentValue, null, false);

        // HSG
        $this->HSG->setDbValueDef($rsnew, $this->HSG->CurrentValue, null, false);

        // DHL
        $this->DHL->setDbValueDef($rsnew, $this->DHL->CurrentValue, null, false);

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->setDbValueDef($rsnew, $this->UTERINE_PROBLEMS->CurrentValue, null, false);

        // W_COMORBIDS
        $this->W_COMORBIDS->setDbValueDef($rsnew, $this->W_COMORBIDS->CurrentValue, null, false);

        // H_COMORBIDS
        $this->H_COMORBIDS->setDbValueDef($rsnew, $this->H_COMORBIDS->CurrentValue, null, false);

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->setDbValueDef($rsnew, $this->SEXUAL_DYSFUNCTION->CurrentValue, null, false);

        // TABLETS
        $this->TABLETS->setDbValueDef($rsnew, $this->TABLETS->CurrentValue, null, false);

        // FOLLICLE_STATUS
        $this->FOLLICLE_STATUS->setDbValueDef($rsnew, $this->FOLLICLE_STATUS->CurrentValue, null, false);

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->setDbValueDef($rsnew, $this->NUMBER_OF_IUI->CurrentValue, null, false);

        // PROCEDURE
        $this->PROCEDURE->setDbValueDef($rsnew, $this->PROCEDURE->CurrentValue, null, false);

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->setDbValueDef($rsnew, $this->LUTEAL_SUPPORT->CurrentValue, null, false);

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValueDef($rsnew, $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue, null, false);

        // ONGOING_PREG
        $this->ONGOING_PREG->setDbValueDef($rsnew, $this->ONGOING_PREG->CurrentValue, null, false);

        // EDD_Date
        $this->EDD_Date->setDbValueDef($rsnew, UnFormatDateTime($this->EDD_Date->CurrentValue, 0), null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        if ($insertRow) {
            $addRow = $this->insert($rsnew);
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfStimulationChartList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
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

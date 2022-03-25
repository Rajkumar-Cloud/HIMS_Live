<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfStimulationChartDelete extends IvfStimulationChart
{
    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_stimulation_chart';

    // Page object name
    public $PageObjName = "IvfStimulationChartDelete";

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
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
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
        $this->DOCTORRESPONSIBLE->Visible = false;
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
        $this->Reason->Visible = false;
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

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("IvfStimulationChartList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
                }
            } else { // Delete failed
                if (IsApi()) {
                    $this->terminate();
                    return;
                }
                $this->CurrentAction = "show"; // Display record
            }
        }
        if ($this->isShow()) { // Load records for display
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("IvfStimulationChartList"); // Return to list
                return;
            }
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
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['FemaleFactor'] = null;
        $row['MaleFactor'] = null;
        $row['Protocol'] = null;
        $row['SemenFrozen'] = null;
        $row['A4ICSICycle'] = null;
        $row['TotalICSICycle'] = null;
        $row['TypeOfInfertility'] = null;
        $row['Duration'] = null;
        $row['LMP'] = null;
        $row['RelevantHistory'] = null;
        $row['IUICycles'] = null;
        $row['AFC'] = null;
        $row['AMH'] = null;
        $row['FBMI'] = null;
        $row['MBMI'] = null;
        $row['OvarianVolumeRT'] = null;
        $row['OvarianVolumeLT'] = null;
        $row['DAYSOFSTIMULATION'] = null;
        $row['DOSEOFGONADOTROPINS'] = null;
        $row['INJTYPE'] = null;
        $row['ANTAGONISTDAYS'] = null;
        $row['ANTAGONISTSTARTDAY'] = null;
        $row['GROWTHHORMONE'] = null;
        $row['PRETREATMENT'] = null;
        $row['SerumP4'] = null;
        $row['FORT'] = null;
        $row['MedicalFactors'] = null;
        $row['SCDate'] = null;
        $row['OvarianSurgery'] = null;
        $row['PreProcedureOrder'] = null;
        $row['TRIGGERR'] = null;
        $row['TRIGGERDATE'] = null;
        $row['ATHOMEorCLINIC'] = null;
        $row['OPUDATE'] = null;
        $row['ALLFREEZEINDICATION'] = null;
        $row['ERA'] = null;
        $row['PGTA'] = null;
        $row['PGD'] = null;
        $row['DATEOFET'] = null;
        $row['ET'] = null;
        $row['ESET'] = null;
        $row['DOET'] = null;
        $row['SEMENPREPARATION'] = null;
        $row['REASONFORESET'] = null;
        $row['Expectedoocytes'] = null;
        $row['StChDate1'] = null;
        $row['StChDate2'] = null;
        $row['StChDate3'] = null;
        $row['StChDate4'] = null;
        $row['StChDate5'] = null;
        $row['StChDate6'] = null;
        $row['StChDate7'] = null;
        $row['StChDate8'] = null;
        $row['StChDate9'] = null;
        $row['StChDate10'] = null;
        $row['StChDate11'] = null;
        $row['StChDate12'] = null;
        $row['StChDate13'] = null;
        $row['CycleDay1'] = null;
        $row['CycleDay2'] = null;
        $row['CycleDay3'] = null;
        $row['CycleDay4'] = null;
        $row['CycleDay5'] = null;
        $row['CycleDay6'] = null;
        $row['CycleDay7'] = null;
        $row['CycleDay8'] = null;
        $row['CycleDay9'] = null;
        $row['CycleDay10'] = null;
        $row['CycleDay11'] = null;
        $row['CycleDay12'] = null;
        $row['CycleDay13'] = null;
        $row['StimulationDay1'] = null;
        $row['StimulationDay2'] = null;
        $row['StimulationDay3'] = null;
        $row['StimulationDay4'] = null;
        $row['StimulationDay5'] = null;
        $row['StimulationDay6'] = null;
        $row['StimulationDay7'] = null;
        $row['StimulationDay8'] = null;
        $row['StimulationDay9'] = null;
        $row['StimulationDay10'] = null;
        $row['StimulationDay11'] = null;
        $row['StimulationDay12'] = null;
        $row['StimulationDay13'] = null;
        $row['Tablet1'] = null;
        $row['Tablet2'] = null;
        $row['Tablet3'] = null;
        $row['Tablet4'] = null;
        $row['Tablet5'] = null;
        $row['Tablet6'] = null;
        $row['Tablet7'] = null;
        $row['Tablet8'] = null;
        $row['Tablet9'] = null;
        $row['Tablet10'] = null;
        $row['Tablet11'] = null;
        $row['Tablet12'] = null;
        $row['Tablet13'] = null;
        $row['RFSH1'] = null;
        $row['RFSH2'] = null;
        $row['RFSH3'] = null;
        $row['RFSH4'] = null;
        $row['RFSH5'] = null;
        $row['RFSH6'] = null;
        $row['RFSH7'] = null;
        $row['RFSH8'] = null;
        $row['RFSH9'] = null;
        $row['RFSH10'] = null;
        $row['RFSH11'] = null;
        $row['RFSH12'] = null;
        $row['RFSH13'] = null;
        $row['HMG1'] = null;
        $row['HMG2'] = null;
        $row['HMG3'] = null;
        $row['HMG4'] = null;
        $row['HMG5'] = null;
        $row['HMG6'] = null;
        $row['HMG7'] = null;
        $row['HMG8'] = null;
        $row['HMG9'] = null;
        $row['HMG10'] = null;
        $row['HMG11'] = null;
        $row['HMG12'] = null;
        $row['HMG13'] = null;
        $row['GnRH1'] = null;
        $row['GnRH2'] = null;
        $row['GnRH3'] = null;
        $row['GnRH4'] = null;
        $row['GnRH5'] = null;
        $row['GnRH6'] = null;
        $row['GnRH7'] = null;
        $row['GnRH8'] = null;
        $row['GnRH9'] = null;
        $row['GnRH10'] = null;
        $row['GnRH11'] = null;
        $row['GnRH12'] = null;
        $row['GnRH13'] = null;
        $row['E21'] = null;
        $row['E22'] = null;
        $row['E23'] = null;
        $row['E24'] = null;
        $row['E25'] = null;
        $row['E26'] = null;
        $row['E27'] = null;
        $row['E28'] = null;
        $row['E29'] = null;
        $row['E210'] = null;
        $row['E211'] = null;
        $row['E212'] = null;
        $row['E213'] = null;
        $row['P41'] = null;
        $row['P42'] = null;
        $row['P43'] = null;
        $row['P44'] = null;
        $row['P45'] = null;
        $row['P46'] = null;
        $row['P47'] = null;
        $row['P48'] = null;
        $row['P49'] = null;
        $row['P410'] = null;
        $row['P411'] = null;
        $row['P412'] = null;
        $row['P413'] = null;
        $row['USGRt1'] = null;
        $row['USGRt2'] = null;
        $row['USGRt3'] = null;
        $row['USGRt4'] = null;
        $row['USGRt5'] = null;
        $row['USGRt6'] = null;
        $row['USGRt7'] = null;
        $row['USGRt8'] = null;
        $row['USGRt9'] = null;
        $row['USGRt10'] = null;
        $row['USGRt11'] = null;
        $row['USGRt12'] = null;
        $row['USGRt13'] = null;
        $row['USGLt1'] = null;
        $row['USGLt2'] = null;
        $row['USGLt3'] = null;
        $row['USGLt4'] = null;
        $row['USGLt5'] = null;
        $row['USGLt6'] = null;
        $row['USGLt7'] = null;
        $row['USGLt8'] = null;
        $row['USGLt9'] = null;
        $row['USGLt10'] = null;
        $row['USGLt11'] = null;
        $row['USGLt12'] = null;
        $row['USGLt13'] = null;
        $row['EM1'] = null;
        $row['EM2'] = null;
        $row['EM3'] = null;
        $row['EM4'] = null;
        $row['EM5'] = null;
        $row['EM6'] = null;
        $row['EM7'] = null;
        $row['EM8'] = null;
        $row['EM9'] = null;
        $row['EM10'] = null;
        $row['EM11'] = null;
        $row['EM12'] = null;
        $row['EM13'] = null;
        $row['Others1'] = null;
        $row['Others2'] = null;
        $row['Others3'] = null;
        $row['Others4'] = null;
        $row['Others5'] = null;
        $row['Others6'] = null;
        $row['Others7'] = null;
        $row['Others8'] = null;
        $row['Others9'] = null;
        $row['Others10'] = null;
        $row['Others11'] = null;
        $row['Others12'] = null;
        $row['Others13'] = null;
        $row['DR1'] = null;
        $row['DR2'] = null;
        $row['DR3'] = null;
        $row['DR4'] = null;
        $row['DR5'] = null;
        $row['DR6'] = null;
        $row['DR7'] = null;
        $row['DR8'] = null;
        $row['DR9'] = null;
        $row['DR10'] = null;
        $row['DR11'] = null;
        $row['DR12'] = null;
        $row['DR13'] = null;
        $row['DOCTORRESPONSIBLE'] = null;
        $row['TidNo'] = null;
        $row['Convert'] = null;
        $row['Consultant'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['Hysteroscopy'] = null;
        $row['EndometrialScratching'] = null;
        $row['TrialCannulation'] = null;
        $row['CYCLETYPE'] = null;
        $row['HRTCYCLE'] = null;
        $row['OralEstrogenDosage'] = null;
        $row['VaginalEstrogen'] = null;
        $row['GCSF'] = null;
        $row['ActivatedPRP'] = null;
        $row['UCLcm'] = null;
        $row['DATOFEMBRYOTRANSFER'] = null;
        $row['DAYOFEMBRYOTRANSFER'] = null;
        $row['NOOFEMBRYOSTHAWED'] = null;
        $row['NOOFEMBRYOSTRANSFERRED'] = null;
        $row['DAYOFEMBRYOS'] = null;
        $row['CRYOPRESERVEDEMBRYOS'] = null;
        $row['ViaAdmin'] = null;
        $row['ViaStartDateTime'] = null;
        $row['ViaDose'] = null;
        $row['AllFreeze'] = null;
        $row['TreatmentCancel'] = null;
        $row['Reason'] = null;
        $row['ProgesteroneAdmin'] = null;
        $row['ProgesteroneStart'] = null;
        $row['ProgesteroneDose'] = null;
        $row['StChDate14'] = null;
        $row['StChDate15'] = null;
        $row['StChDate16'] = null;
        $row['StChDate17'] = null;
        $row['StChDate18'] = null;
        $row['StChDate19'] = null;
        $row['StChDate20'] = null;
        $row['StChDate21'] = null;
        $row['StChDate22'] = null;
        $row['StChDate23'] = null;
        $row['StChDate24'] = null;
        $row['StChDate25'] = null;
        $row['CycleDay14'] = null;
        $row['CycleDay15'] = null;
        $row['CycleDay16'] = null;
        $row['CycleDay17'] = null;
        $row['CycleDay18'] = null;
        $row['CycleDay19'] = null;
        $row['CycleDay20'] = null;
        $row['CycleDay21'] = null;
        $row['CycleDay22'] = null;
        $row['CycleDay23'] = null;
        $row['CycleDay24'] = null;
        $row['CycleDay25'] = null;
        $row['StimulationDay14'] = null;
        $row['StimulationDay15'] = null;
        $row['StimulationDay16'] = null;
        $row['StimulationDay17'] = null;
        $row['StimulationDay18'] = null;
        $row['StimulationDay19'] = null;
        $row['StimulationDay20'] = null;
        $row['StimulationDay21'] = null;
        $row['StimulationDay22'] = null;
        $row['StimulationDay23'] = null;
        $row['StimulationDay24'] = null;
        $row['StimulationDay25'] = null;
        $row['Tablet14'] = null;
        $row['Tablet15'] = null;
        $row['Tablet16'] = null;
        $row['Tablet17'] = null;
        $row['Tablet18'] = null;
        $row['Tablet19'] = null;
        $row['Tablet20'] = null;
        $row['Tablet21'] = null;
        $row['Tablet22'] = null;
        $row['Tablet23'] = null;
        $row['Tablet24'] = null;
        $row['Tablet25'] = null;
        $row['RFSH14'] = null;
        $row['RFSH15'] = null;
        $row['RFSH16'] = null;
        $row['RFSH17'] = null;
        $row['RFSH18'] = null;
        $row['RFSH19'] = null;
        $row['RFSH20'] = null;
        $row['RFSH21'] = null;
        $row['RFSH22'] = null;
        $row['RFSH23'] = null;
        $row['RFSH24'] = null;
        $row['RFSH25'] = null;
        $row['HMG14'] = null;
        $row['HMG15'] = null;
        $row['HMG16'] = null;
        $row['HMG17'] = null;
        $row['HMG18'] = null;
        $row['HMG19'] = null;
        $row['HMG20'] = null;
        $row['HMG21'] = null;
        $row['HMG22'] = null;
        $row['HMG23'] = null;
        $row['HMG24'] = null;
        $row['HMG25'] = null;
        $row['GnRH14'] = null;
        $row['GnRH15'] = null;
        $row['GnRH16'] = null;
        $row['GnRH17'] = null;
        $row['GnRH18'] = null;
        $row['GnRH19'] = null;
        $row['GnRH20'] = null;
        $row['GnRH21'] = null;
        $row['GnRH22'] = null;
        $row['GnRH23'] = null;
        $row['GnRH24'] = null;
        $row['GnRH25'] = null;
        $row['P414'] = null;
        $row['P415'] = null;
        $row['P416'] = null;
        $row['P417'] = null;
        $row['P418'] = null;
        $row['P419'] = null;
        $row['P420'] = null;
        $row['P421'] = null;
        $row['P422'] = null;
        $row['P423'] = null;
        $row['P424'] = null;
        $row['P425'] = null;
        $row['USGRt14'] = null;
        $row['USGRt15'] = null;
        $row['USGRt16'] = null;
        $row['USGRt17'] = null;
        $row['USGRt18'] = null;
        $row['USGRt19'] = null;
        $row['USGRt20'] = null;
        $row['USGRt21'] = null;
        $row['USGRt22'] = null;
        $row['USGRt23'] = null;
        $row['USGRt24'] = null;
        $row['USGRt25'] = null;
        $row['USGLt14'] = null;
        $row['USGLt15'] = null;
        $row['USGLt16'] = null;
        $row['USGLt17'] = null;
        $row['USGLt18'] = null;
        $row['USGLt19'] = null;
        $row['USGLt20'] = null;
        $row['USGLt21'] = null;
        $row['USGLt22'] = null;
        $row['USGLt23'] = null;
        $row['USGLt24'] = null;
        $row['USGLt25'] = null;
        $row['EM14'] = null;
        $row['EM15'] = null;
        $row['EM16'] = null;
        $row['EM17'] = null;
        $row['EM18'] = null;
        $row['EM19'] = null;
        $row['EM20'] = null;
        $row['EM21'] = null;
        $row['EM22'] = null;
        $row['EM23'] = null;
        $row['EM24'] = null;
        $row['EM25'] = null;
        $row['Others14'] = null;
        $row['Others15'] = null;
        $row['Others16'] = null;
        $row['Others17'] = null;
        $row['Others18'] = null;
        $row['Others19'] = null;
        $row['Others20'] = null;
        $row['Others21'] = null;
        $row['Others22'] = null;
        $row['Others23'] = null;
        $row['Others24'] = null;
        $row['Others25'] = null;
        $row['DR14'] = null;
        $row['DR15'] = null;
        $row['DR16'] = null;
        $row['DR17'] = null;
        $row['DR18'] = null;
        $row['DR19'] = null;
        $row['DR20'] = null;
        $row['DR21'] = null;
        $row['DR22'] = null;
        $row['DR23'] = null;
        $row['DR24'] = null;
        $row['DR25'] = null;
        $row['E214'] = null;
        $row['E215'] = null;
        $row['E216'] = null;
        $row['E217'] = null;
        $row['E218'] = null;
        $row['E219'] = null;
        $row['E220'] = null;
        $row['E221'] = null;
        $row['E222'] = null;
        $row['E223'] = null;
        $row['E224'] = null;
        $row['E225'] = null;
        $row['EEETTTDTE'] = null;
        $row['bhcgdate'] = null;
        $row['TUBAL_PATENCY'] = null;
        $row['HSG'] = null;
        $row['DHL'] = null;
        $row['UTERINE_PROBLEMS'] = null;
        $row['W_COMORBIDS'] = null;
        $row['H_COMORBIDS'] = null;
        $row['SEXUAL_DYSFUNCTION'] = null;
        $row['TABLETS'] = null;
        $row['FOLLICLE_STATUS'] = null;
        $row['NUMBER_OF_IUI'] = null;
        $row['PROCEDURE'] = null;
        $row['LUTEAL_SUPPORT'] = null;
        $row['SPECIFIC_MATERNAL_PROBLEMS'] = null;
        $row['ONGOING_PREG'] = null;
        $row['EDD_Date'] = null;
        return $row;
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
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }
        if ($deleteRows) {
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request (Support single row only)
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold, true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfStimulationChartList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
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
}

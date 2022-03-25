<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfArtSummaryDelete extends IvfArtSummary
{
    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_art_summary';

    // Page object name
    public $PageObjName = "IvfArtSummaryDelete";

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

        // Table object (ivf_art_summary)
        if (!isset($GLOBALS["ivf_art_summary"]) || get_class($GLOBALS["ivf_art_summary"]) == PROJECT_NAMESPACE . "ivf_art_summary") {
            $GLOBALS["ivf_art_summary"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_art_summary');
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
                $doc = new $class(Container("ivf_art_summary"));
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
        $this->IVFRegistrationID->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Spermorigin->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationforART->setVisibility();
        $this->ICSIDetails->setVisibility();
        $this->DateofICSI->setVisibility();
        $this->Origin->setVisibility();
        $this->Status->setVisibility();
        $this->Method->setVisibility();
        $this->pre_Concentration->setVisibility();
        $this->pre_Motility->setVisibility();
        $this->pre_Morphology->setVisibility();
        $this->post_Concentration->setVisibility();
        $this->post_Motility->setVisibility();
        $this->post_Morphology->setVisibility();
        $this->DateofET->setVisibility();
        $this->NumberofEmbryostransferred->setVisibility();
        $this->Reasonfornotranfer->setVisibility();
        $this->Embryosunderobservation->setVisibility();
        $this->EmbryosCryopreserved->setVisibility();
        $this->EmbryoDevelopmentSummary->setVisibility();
        $this->LegendCellStage->setVisibility();
        $this->EmbryologistSignature->setVisibility();
        $this->ConsultantsSignature->setVisibility();
        $this->Name->setVisibility();
        $this->M2->setVisibility();
        $this->Mi2->setVisibility();
        $this->ICSI->setVisibility();
        $this->IVF->setVisibility();
        $this->M1->setVisibility();
        $this->GV->setVisibility();
        $this->_Others->setVisibility();
        $this->Normal2PN->setVisibility();
        $this->Abnormalfertilisation1N->setVisibility();
        $this->Abnormalfertilisation3N->setVisibility();
        $this->NotFertilized->setVisibility();
        $this->Degenerated->setVisibility();
        $this->SpermDate->setVisibility();
        $this->Code1->setVisibility();
        $this->Day1->setVisibility();
        $this->CellStage1->setVisibility();
        $this->Grade1->setVisibility();
        $this->State1->setVisibility();
        $this->Code2->setVisibility();
        $this->Day2->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade2->setVisibility();
        $this->State2->setVisibility();
        $this->Code3->setVisibility();
        $this->Day3->setVisibility();
        $this->CellStage3->setVisibility();
        $this->Grade3->setVisibility();
        $this->State3->setVisibility();
        $this->Code4->setVisibility();
        $this->Day4->setVisibility();
        $this->CellStage4->setVisibility();
        $this->Grade4->setVisibility();
        $this->State4->setVisibility();
        $this->Code5->setVisibility();
        $this->Day5->setVisibility();
        $this->CellStage5->setVisibility();
        $this->Grade5->setVisibility();
        $this->State5->setVisibility();
        $this->TidNo->setVisibility();
        $this->RIDNo->setVisibility();
        $this->Volume->setVisibility();
        $this->Volume1->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total->setVisibility();
        $this->Total1->setVisibility();
        $this->Total2->setVisibility();
        $this->Progressive->setVisibility();
        $this->Progressive1->setVisibility();
        $this->Progressive2->setVisibility();
        $this->NotProgressive->setVisibility();
        $this->NotProgressive1->setVisibility();
        $this->NotProgressive2->setVisibility();
        $this->Motility2->setVisibility();
        $this->Morphology2->setVisibility();
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
            $this->terminate("IvfArtSummaryList"); // Prevent SQL injection, return to list
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
                $this->terminate("IvfArtSummaryList"); // Return to list
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
        $this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Spermorigin->setDbValue($row['Spermorigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationforART->setDbValue($row['IndicationforART']);
        $this->ICSIDetails->setDbValue($row['ICSIDetails']);
        $this->DateofICSI->setDbValue($row['DateofICSI']);
        $this->Origin->setDbValue($row['Origin']);
        $this->Status->setDbValue($row['Status']);
        $this->Method->setDbValue($row['Method']);
        $this->pre_Concentration->setDbValue($row['pre_Concentration']);
        $this->pre_Motility->setDbValue($row['pre_Motility']);
        $this->pre_Morphology->setDbValue($row['pre_Morphology']);
        $this->post_Concentration->setDbValue($row['post_Concentration']);
        $this->post_Motility->setDbValue($row['post_Motility']);
        $this->post_Morphology->setDbValue($row['post_Morphology']);
        $this->DateofET->setDbValue($row['DateofET']);
        $this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
        $this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
        $this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
        $this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
        $this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
        $this->LegendCellStage->setDbValue($row['LegendCellStage']);
        $this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
        $this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
        $this->Name->setDbValue($row['Name']);
        $this->M2->setDbValue($row['M2']);
        $this->Mi2->setDbValue($row['Mi2']);
        $this->ICSI->setDbValue($row['ICSI']);
        $this->IVF->setDbValue($row['IVF']);
        $this->M1->setDbValue($row['M1']);
        $this->GV->setDbValue($row['GV']);
        $this->_Others->setDbValue($row['Others']);
        $this->Normal2PN->setDbValue($row['Normal2PN']);
        $this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
        $this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
        $this->NotFertilized->setDbValue($row['NotFertilized']);
        $this->Degenerated->setDbValue($row['Degenerated']);
        $this->SpermDate->setDbValue($row['SpermDate']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Day1->setDbValue($row['Day1']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->State1->setDbValue($row['State1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->Day2->setDbValue($row['Day2']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->State2->setDbValue($row['State2']);
        $this->Code3->setDbValue($row['Code3']);
        $this->Day3->setDbValue($row['Day3']);
        $this->CellStage3->setDbValue($row['CellStage3']);
        $this->Grade3->setDbValue($row['Grade3']);
        $this->State3->setDbValue($row['State3']);
        $this->Code4->setDbValue($row['Code4']);
        $this->Day4->setDbValue($row['Day4']);
        $this->CellStage4->setDbValue($row['CellStage4']);
        $this->Grade4->setDbValue($row['Grade4']);
        $this->State4->setDbValue($row['State4']);
        $this->Code5->setDbValue($row['Code5']);
        $this->Day5->setDbValue($row['Day5']);
        $this->CellStage5->setDbValue($row['CellStage5']);
        $this->Grade5->setDbValue($row['Grade5']);
        $this->State5->setDbValue($row['State5']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total->setDbValue($row['Total']);
        $this->Total1->setDbValue($row['Total1']);
        $this->Total2->setDbValue($row['Total2']);
        $this->Progressive->setDbValue($row['Progressive']);
        $this->Progressive1->setDbValue($row['Progressive1']);
        $this->Progressive2->setDbValue($row['Progressive2']);
        $this->NotProgressive->setDbValue($row['NotProgressive']);
        $this->NotProgressive1->setDbValue($row['NotProgressive1']);
        $this->NotProgressive2->setDbValue($row['NotProgressive2']);
        $this->Motility2->setDbValue($row['Motility2']);
        $this->Morphology2->setDbValue($row['Morphology2']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['IVFRegistrationID'] = null;
        $row['ARTCycle'] = null;
        $row['Spermorigin'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationforART'] = null;
        $row['ICSIDetails'] = null;
        $row['DateofICSI'] = null;
        $row['Origin'] = null;
        $row['Status'] = null;
        $row['Method'] = null;
        $row['pre_Concentration'] = null;
        $row['pre_Motility'] = null;
        $row['pre_Morphology'] = null;
        $row['post_Concentration'] = null;
        $row['post_Motility'] = null;
        $row['post_Morphology'] = null;
        $row['DateofET'] = null;
        $row['NumberofEmbryostransferred'] = null;
        $row['Reasonfornotranfer'] = null;
        $row['Embryosunderobservation'] = null;
        $row['EmbryosCryopreserved'] = null;
        $row['EmbryoDevelopmentSummary'] = null;
        $row['LegendCellStage'] = null;
        $row['EmbryologistSignature'] = null;
        $row['ConsultantsSignature'] = null;
        $row['Name'] = null;
        $row['M2'] = null;
        $row['Mi2'] = null;
        $row['ICSI'] = null;
        $row['IVF'] = null;
        $row['M1'] = null;
        $row['GV'] = null;
        $row['Others'] = null;
        $row['Normal2PN'] = null;
        $row['Abnormalfertilisation1N'] = null;
        $row['Abnormalfertilisation3N'] = null;
        $row['NotFertilized'] = null;
        $row['Degenerated'] = null;
        $row['SpermDate'] = null;
        $row['Code1'] = null;
        $row['Day1'] = null;
        $row['CellStage1'] = null;
        $row['Grade1'] = null;
        $row['State1'] = null;
        $row['Code2'] = null;
        $row['Day2'] = null;
        $row['CellStage2'] = null;
        $row['Grade2'] = null;
        $row['State2'] = null;
        $row['Code3'] = null;
        $row['Day3'] = null;
        $row['CellStage3'] = null;
        $row['Grade3'] = null;
        $row['State3'] = null;
        $row['Code4'] = null;
        $row['Day4'] = null;
        $row['CellStage4'] = null;
        $row['Grade4'] = null;
        $row['State4'] = null;
        $row['Code5'] = null;
        $row['Day5'] = null;
        $row['CellStage5'] = null;
        $row['Grade5'] = null;
        $row['State5'] = null;
        $row['TidNo'] = null;
        $row['RIDNo'] = null;
        $row['Volume'] = null;
        $row['Volume1'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total'] = null;
        $row['Total1'] = null;
        $row['Total2'] = null;
        $row['Progressive'] = null;
        $row['Progressive1'] = null;
        $row['Progressive2'] = null;
        $row['NotProgressive'] = null;
        $row['NotProgressive1'] = null;
        $row['NotProgressive2'] = null;
        $row['Motility2'] = null;
        $row['Morphology2'] = null;
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

        // IVFRegistrationID

        // ARTCycle

        // Spermorigin

        // InseminatinTechnique

        // IndicationforART

        // ICSIDetails

        // DateofICSI

        // Origin

        // Status

        // Method

        // pre_Concentration

        // pre_Motility

        // pre_Morphology

        // post_Concentration

        // post_Motility

        // post_Morphology

        // DateofET

        // NumberofEmbryostransferred

        // Reasonfornotranfer

        // Embryosunderobservation

        // EmbryosCryopreserved

        // EmbryoDevelopmentSummary

        // LegendCellStage

        // EmbryologistSignature

        // ConsultantsSignature

        // Name

        // M2

        // Mi2

        // ICSI

        // IVF

        // M1

        // GV

        // Others

        // Normal2PN

        // Abnormalfertilisation1N

        // Abnormalfertilisation3N

        // NotFertilized

        // Degenerated

        // SpermDate

        // Code1

        // Day1

        // CellStage1

        // Grade1

        // State1

        // Code2

        // Day2

        // CellStage2

        // Grade2

        // State2

        // Code3

        // Day3

        // CellStage3

        // Grade3

        // State3

        // Code4

        // Day4

        // CellStage4

        // Grade4

        // State4

        // Code5

        // Day5

        // CellStage5

        // Grade5

        // State5

        // TidNo

        // RIDNo

        // Volume

        // Volume1

        // Volume2

        // Concentration2

        // Total

        // Total1

        // Total2

        // Progressive

        // Progressive1

        // Progressive2

        // NotProgressive

        // NotProgressive1

        // NotProgressive2

        // Motility2

        // Morphology2
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
            $this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
            $this->IVFRegistrationID->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

            // Spermorigin
            $this->Spermorigin->ViewValue = $this->Spermorigin->CurrentValue;
            $this->Spermorigin->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationforART
            $this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
            $this->IndicationforART->ViewCustomAttributes = "";

            // ICSIDetails
            $this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
            $this->ICSIDetails->ViewCustomAttributes = "";

            // DateofICSI
            $this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
            $this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 0);
            $this->DateofICSI->ViewCustomAttributes = "";

            // Origin
            $this->Origin->ViewValue = $this->Origin->CurrentValue;
            $this->Origin->ViewCustomAttributes = "";

            // Status
            $this->Status->ViewValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // pre_Concentration
            $this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
            $this->pre_Concentration->ViewCustomAttributes = "";

            // pre_Motility
            $this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
            $this->pre_Motility->ViewCustomAttributes = "";

            // pre_Morphology
            $this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
            $this->pre_Morphology->ViewCustomAttributes = "";

            // post_Concentration
            $this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
            $this->post_Concentration->ViewCustomAttributes = "";

            // post_Motility
            $this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
            $this->post_Motility->ViewCustomAttributes = "";

            // post_Morphology
            $this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
            $this->post_Morphology->ViewCustomAttributes = "";

            // DateofET
            $this->DateofET->ViewValue = $this->DateofET->CurrentValue;
            $this->DateofET->ViewCustomAttributes = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
            $this->NumberofEmbryostransferred->ViewCustomAttributes = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->CurrentValue;
            $this->Reasonfornotranfer->ViewCustomAttributes = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
            $this->Embryosunderobservation->ViewCustomAttributes = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
            $this->EmbryosCryopreserved->ViewCustomAttributes = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
            $this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

            // LegendCellStage
            $this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
            $this->LegendCellStage->ViewCustomAttributes = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
            $this->EmbryologistSignature->ViewCustomAttributes = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
            $this->ConsultantsSignature->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // M2
            $this->M2->ViewValue = $this->M2->CurrentValue;
            $this->M2->ViewCustomAttributes = "";

            // Mi2
            $this->Mi2->ViewValue = $this->Mi2->CurrentValue;
            $this->Mi2->ViewCustomAttributes = "";

            // ICSI
            $this->ICSI->ViewValue = $this->ICSI->CurrentValue;
            $this->ICSI->ViewCustomAttributes = "";

            // IVF
            $this->IVF->ViewValue = $this->IVF->CurrentValue;
            $this->IVF->ViewCustomAttributes = "";

            // M1
            $this->M1->ViewValue = $this->M1->CurrentValue;
            $this->M1->ViewCustomAttributes = "";

            // GV
            $this->GV->ViewValue = $this->GV->CurrentValue;
            $this->GV->ViewCustomAttributes = "";

            // Others
            $this->_Others->ViewValue = $this->_Others->CurrentValue;
            $this->_Others->ViewCustomAttributes = "";

            // Normal2PN
            $this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
            $this->Normal2PN->ViewCustomAttributes = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
            $this->Abnormalfertilisation1N->ViewCustomAttributes = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
            $this->Abnormalfertilisation3N->ViewCustomAttributes = "";

            // NotFertilized
            $this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
            $this->NotFertilized->ViewCustomAttributes = "";

            // Degenerated
            $this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
            $this->Degenerated->ViewCustomAttributes = "";

            // SpermDate
            $this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
            $this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
            $this->SpermDate->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Day1
            $this->Day1->ViewValue = $this->Day1->CurrentValue;
            $this->Day1->ViewCustomAttributes = "";

            // CellStage1
            $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
            $this->CellStage1->ViewCustomAttributes = "";

            // Grade1
            $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
            $this->Grade1->ViewCustomAttributes = "";

            // State1
            $this->State1->ViewValue = $this->State1->CurrentValue;
            $this->State1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // Day2
            $this->Day2->ViewValue = $this->Day2->CurrentValue;
            $this->Day2->ViewCustomAttributes = "";

            // CellStage2
            $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade2
            $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
            $this->Grade2->ViewCustomAttributes = "";

            // State2
            $this->State2->ViewValue = $this->State2->CurrentValue;
            $this->State2->ViewCustomAttributes = "";

            // Code3
            $this->Code3->ViewValue = $this->Code3->CurrentValue;
            $this->Code3->ViewCustomAttributes = "";

            // Day3
            $this->Day3->ViewValue = $this->Day3->CurrentValue;
            $this->Day3->ViewCustomAttributes = "";

            // CellStage3
            $this->CellStage3->ViewValue = $this->CellStage3->CurrentValue;
            $this->CellStage3->ViewCustomAttributes = "";

            // Grade3
            $this->Grade3->ViewValue = $this->Grade3->CurrentValue;
            $this->Grade3->ViewCustomAttributes = "";

            // State3
            $this->State3->ViewValue = $this->State3->CurrentValue;
            $this->State3->ViewCustomAttributes = "";

            // Code4
            $this->Code4->ViewValue = $this->Code4->CurrentValue;
            $this->Code4->ViewCustomAttributes = "";

            // Day4
            $this->Day4->ViewValue = $this->Day4->CurrentValue;
            $this->Day4->ViewCustomAttributes = "";

            // CellStage4
            $this->CellStage4->ViewValue = $this->CellStage4->CurrentValue;
            $this->CellStage4->ViewCustomAttributes = "";

            // Grade4
            $this->Grade4->ViewValue = $this->Grade4->CurrentValue;
            $this->Grade4->ViewCustomAttributes = "";

            // State4
            $this->State4->ViewValue = $this->State4->CurrentValue;
            $this->State4->ViewCustomAttributes = "";

            // Code5
            $this->Code5->ViewValue = $this->Code5->CurrentValue;
            $this->Code5->ViewCustomAttributes = "";

            // Day5
            $this->Day5->ViewValue = $this->Day5->CurrentValue;
            $this->Day5->ViewCustomAttributes = "";

            // CellStage5
            $this->CellStage5->ViewValue = $this->CellStage5->CurrentValue;
            $this->CellStage5->ViewCustomAttributes = "";

            // Grade5
            $this->Grade5->ViewValue = $this->Grade5->CurrentValue;
            $this->Grade5->ViewCustomAttributes = "";

            // State5
            $this->State5->ViewValue = $this->State5->CurrentValue;
            $this->State5->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // Progressive
            $this->Progressive->ViewValue = $this->Progressive->CurrentValue;
            $this->Progressive->ViewCustomAttributes = "";

            // Progressive1
            $this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
            $this->Progressive1->ViewCustomAttributes = "";

            // Progressive2
            $this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
            $this->Progressive2->ViewCustomAttributes = "";

            // NotProgressive
            $this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
            $this->NotProgressive->ViewCustomAttributes = "";

            // NotProgressive1
            $this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
            $this->NotProgressive1->ViewCustomAttributes = "";

            // NotProgressive2
            $this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
            $this->NotProgressive2->ViewCustomAttributes = "";

            // Motility2
            $this->Motility2->ViewValue = $this->Motility2->CurrentValue;
            $this->Motility2->ViewCustomAttributes = "";

            // Morphology2
            $this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
            $this->Morphology2->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->LinkCustomAttributes = "";
            $this->IVFRegistrationID->HrefValue = "";
            $this->IVFRegistrationID->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Spermorigin
            $this->Spermorigin->LinkCustomAttributes = "";
            $this->Spermorigin->HrefValue = "";
            $this->Spermorigin->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationforART
            $this->IndicationforART->LinkCustomAttributes = "";
            $this->IndicationforART->HrefValue = "";
            $this->IndicationforART->TooltipValue = "";

            // ICSIDetails
            $this->ICSIDetails->LinkCustomAttributes = "";
            $this->ICSIDetails->HrefValue = "";
            $this->ICSIDetails->TooltipValue = "";

            // DateofICSI
            $this->DateofICSI->LinkCustomAttributes = "";
            $this->DateofICSI->HrefValue = "";
            $this->DateofICSI->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // pre_Concentration
            $this->pre_Concentration->LinkCustomAttributes = "";
            $this->pre_Concentration->HrefValue = "";
            $this->pre_Concentration->TooltipValue = "";

            // pre_Motility
            $this->pre_Motility->LinkCustomAttributes = "";
            $this->pre_Motility->HrefValue = "";
            $this->pre_Motility->TooltipValue = "";

            // pre_Morphology
            $this->pre_Morphology->LinkCustomAttributes = "";
            $this->pre_Morphology->HrefValue = "";
            $this->pre_Morphology->TooltipValue = "";

            // post_Concentration
            $this->post_Concentration->LinkCustomAttributes = "";
            $this->post_Concentration->HrefValue = "";
            $this->post_Concentration->TooltipValue = "";

            // post_Motility
            $this->post_Motility->LinkCustomAttributes = "";
            $this->post_Motility->HrefValue = "";
            $this->post_Motility->TooltipValue = "";

            // post_Morphology
            $this->post_Morphology->LinkCustomAttributes = "";
            $this->post_Morphology->HrefValue = "";
            $this->post_Morphology->TooltipValue = "";

            // DateofET
            $this->DateofET->LinkCustomAttributes = "";
            $this->DateofET->HrefValue = "";
            $this->DateofET->TooltipValue = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
            $this->NumberofEmbryostransferred->HrefValue = "";
            $this->NumberofEmbryostransferred->TooltipValue = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->LinkCustomAttributes = "";
            $this->Reasonfornotranfer->HrefValue = "";
            $this->Reasonfornotranfer->TooltipValue = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->LinkCustomAttributes = "";
            $this->Embryosunderobservation->HrefValue = "";
            $this->Embryosunderobservation->TooltipValue = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->LinkCustomAttributes = "";
            $this->EmbryosCryopreserved->HrefValue = "";
            $this->EmbryosCryopreserved->TooltipValue = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
            $this->EmbryoDevelopmentSummary->HrefValue = "";
            $this->EmbryoDevelopmentSummary->TooltipValue = "";

            // LegendCellStage
            $this->LegendCellStage->LinkCustomAttributes = "";
            $this->LegendCellStage->HrefValue = "";
            $this->LegendCellStage->TooltipValue = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->LinkCustomAttributes = "";
            $this->EmbryologistSignature->HrefValue = "";
            $this->EmbryologistSignature->TooltipValue = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->LinkCustomAttributes = "";
            $this->ConsultantsSignature->HrefValue = "";
            $this->ConsultantsSignature->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // M2
            $this->M2->LinkCustomAttributes = "";
            $this->M2->HrefValue = "";
            $this->M2->TooltipValue = "";

            // Mi2
            $this->Mi2->LinkCustomAttributes = "";
            $this->Mi2->HrefValue = "";
            $this->Mi2->TooltipValue = "";

            // ICSI
            $this->ICSI->LinkCustomAttributes = "";
            $this->ICSI->HrefValue = "";
            $this->ICSI->TooltipValue = "";

            // IVF
            $this->IVF->LinkCustomAttributes = "";
            $this->IVF->HrefValue = "";
            $this->IVF->TooltipValue = "";

            // M1
            $this->M1->LinkCustomAttributes = "";
            $this->M1->HrefValue = "";
            $this->M1->TooltipValue = "";

            // GV
            $this->GV->LinkCustomAttributes = "";
            $this->GV->HrefValue = "";
            $this->GV->TooltipValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";
            $this->_Others->TooltipValue = "";

            // Normal2PN
            $this->Normal2PN->LinkCustomAttributes = "";
            $this->Normal2PN->HrefValue = "";
            $this->Normal2PN->TooltipValue = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation1N->HrefValue = "";
            $this->Abnormalfertilisation1N->TooltipValue = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation3N->HrefValue = "";
            $this->Abnormalfertilisation3N->TooltipValue = "";

            // NotFertilized
            $this->NotFertilized->LinkCustomAttributes = "";
            $this->NotFertilized->HrefValue = "";
            $this->NotFertilized->TooltipValue = "";

            // Degenerated
            $this->Degenerated->LinkCustomAttributes = "";
            $this->Degenerated->HrefValue = "";
            $this->Degenerated->TooltipValue = "";

            // SpermDate
            $this->SpermDate->LinkCustomAttributes = "";
            $this->SpermDate->HrefValue = "";
            $this->SpermDate->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Day1
            $this->Day1->LinkCustomAttributes = "";
            $this->Day1->HrefValue = "";
            $this->Day1->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // State1
            $this->State1->LinkCustomAttributes = "";
            $this->State1->HrefValue = "";
            $this->State1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // Day2
            $this->Day2->LinkCustomAttributes = "";
            $this->Day2->HrefValue = "";
            $this->Day2->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // State2
            $this->State2->LinkCustomAttributes = "";
            $this->State2->HrefValue = "";
            $this->State2->TooltipValue = "";

            // Code3
            $this->Code3->LinkCustomAttributes = "";
            $this->Code3->HrefValue = "";
            $this->Code3->TooltipValue = "";

            // Day3
            $this->Day3->LinkCustomAttributes = "";
            $this->Day3->HrefValue = "";
            $this->Day3->TooltipValue = "";

            // CellStage3
            $this->CellStage3->LinkCustomAttributes = "";
            $this->CellStage3->HrefValue = "";
            $this->CellStage3->TooltipValue = "";

            // Grade3
            $this->Grade3->LinkCustomAttributes = "";
            $this->Grade3->HrefValue = "";
            $this->Grade3->TooltipValue = "";

            // State3
            $this->State3->LinkCustomAttributes = "";
            $this->State3->HrefValue = "";
            $this->State3->TooltipValue = "";

            // Code4
            $this->Code4->LinkCustomAttributes = "";
            $this->Code4->HrefValue = "";
            $this->Code4->TooltipValue = "";

            // Day4
            $this->Day4->LinkCustomAttributes = "";
            $this->Day4->HrefValue = "";
            $this->Day4->TooltipValue = "";

            // CellStage4
            $this->CellStage4->LinkCustomAttributes = "";
            $this->CellStage4->HrefValue = "";
            $this->CellStage4->TooltipValue = "";

            // Grade4
            $this->Grade4->LinkCustomAttributes = "";
            $this->Grade4->HrefValue = "";
            $this->Grade4->TooltipValue = "";

            // State4
            $this->State4->LinkCustomAttributes = "";
            $this->State4->HrefValue = "";
            $this->State4->TooltipValue = "";

            // Code5
            $this->Code5->LinkCustomAttributes = "";
            $this->Code5->HrefValue = "";
            $this->Code5->TooltipValue = "";

            // Day5
            $this->Day5->LinkCustomAttributes = "";
            $this->Day5->HrefValue = "";
            $this->Day5->TooltipValue = "";

            // CellStage5
            $this->CellStage5->LinkCustomAttributes = "";
            $this->CellStage5->HrefValue = "";
            $this->CellStage5->TooltipValue = "";

            // Grade5
            $this->Grade5->LinkCustomAttributes = "";
            $this->Grade5->HrefValue = "";
            $this->Grade5->TooltipValue = "";

            // State5
            $this->State5->LinkCustomAttributes = "";
            $this->State5->HrefValue = "";
            $this->State5->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // Progressive
            $this->Progressive->LinkCustomAttributes = "";
            $this->Progressive->HrefValue = "";
            $this->Progressive->TooltipValue = "";

            // Progressive1
            $this->Progressive1->LinkCustomAttributes = "";
            $this->Progressive1->HrefValue = "";
            $this->Progressive1->TooltipValue = "";

            // Progressive2
            $this->Progressive2->LinkCustomAttributes = "";
            $this->Progressive2->HrefValue = "";
            $this->Progressive2->TooltipValue = "";

            // NotProgressive
            $this->NotProgressive->LinkCustomAttributes = "";
            $this->NotProgressive->HrefValue = "";
            $this->NotProgressive->TooltipValue = "";

            // NotProgressive1
            $this->NotProgressive1->LinkCustomAttributes = "";
            $this->NotProgressive1->HrefValue = "";
            $this->NotProgressive1->TooltipValue = "";

            // NotProgressive2
            $this->NotProgressive2->LinkCustomAttributes = "";
            $this->NotProgressive2->HrefValue = "";
            $this->NotProgressive2->TooltipValue = "";

            // Motility2
            $this->Motility2->LinkCustomAttributes = "";
            $this->Motility2->HrefValue = "";
            $this->Motility2->TooltipValue = "";

            // Morphology2
            $this->Morphology2->LinkCustomAttributes = "";
            $this->Morphology2->HrefValue = "";
            $this->Morphology2->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfArtSummaryList"), "", $this->TableVar, true);
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

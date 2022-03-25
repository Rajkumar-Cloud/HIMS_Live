<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class MonitorTreatmentPlanDelete extends MonitorTreatmentPlan
{
    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'monitor_treatment_plan';

    // Page object name
    public $PageObjName = "MonitorTreatmentPlanDelete";

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

        // Table object (monitor_treatment_plan)
        if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
            $GLOBALS["monitor_treatment_plan"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');
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
                $doc = new $class(Container("monitor_treatment_plan"));
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
        $this->PatId->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->MobileNo->setVisibility();
        $this->ConsultantName->setVisibility();
        $this->RefDrName->setVisibility();
        $this->RefDrMobileNo->setVisibility();
        $this->NewVisitDate->setVisibility();
        $this->NewVisitYesNo->setVisibility();
        $this->Treatment->setVisibility();
        $this->IUIDoneDate1->setVisibility();
        $this->IUIDoneYesNo1->setVisibility();
        $this->UPTTestDate1->setVisibility();
        $this->UPTTestYesNo1->setVisibility();
        $this->IUIDoneDate2->setVisibility();
        $this->IUIDoneYesNo2->setVisibility();
        $this->UPTTestDate2->setVisibility();
        $this->UPTTestYesNo2->setVisibility();
        $this->IUIDoneDate3->setVisibility();
        $this->IUIDoneYesNo3->setVisibility();
        $this->UPTTestDate3->setVisibility();
        $this->UPTTestYesNo3->setVisibility();
        $this->IUIDoneDate4->setVisibility();
        $this->IUIDoneYesNo4->setVisibility();
        $this->UPTTestDate4->setVisibility();
        $this->UPTTestYesNo4->setVisibility();
        $this->IVFStimulationDate->setVisibility();
        $this->IVFStimulationYesNo->setVisibility();
        $this->OPUDate->setVisibility();
        $this->OPUYesNo->setVisibility();
        $this->ETDate->setVisibility();
        $this->ETYesNo->setVisibility();
        $this->BetaHCGDate->setVisibility();
        $this->BetaHCGYesNo->setVisibility();
        $this->FETDate->setVisibility();
        $this->FETYesNo->setVisibility();
        $this->FBetaHCGDate->setVisibility();
        $this->FBetaHCGYesNo->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->HospID->setVisibility();
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
            $this->terminate("MonitorTreatmentPlanList"); // Prevent SQL injection, return to list
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
                $this->terminate("MonitorTreatmentPlanList"); // Return to list
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
        $this->PatId->setDbValue($row['PatId']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->MobileNo->setDbValue($row['MobileNo']);
        $this->ConsultantName->setDbValue($row['ConsultantName']);
        $this->RefDrName->setDbValue($row['RefDrName']);
        $this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
        $this->NewVisitDate->setDbValue($row['NewVisitDate']);
        $this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
        $this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
        $this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
        $this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
        $this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
        $this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
        $this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
        $this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
        $this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
        $this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
        $this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
        $this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
        $this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
        $this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
        $this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
        $this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
        $this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
        $this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
        $this->OPUDate->setDbValue($row['OPUDate']);
        $this->OPUYesNo->setDbValue($row['OPUYesNo']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->ETYesNo->setDbValue($row['ETYesNo']);
        $this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
        $this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
        $this->FETDate->setDbValue($row['FETDate']);
        $this->FETYesNo->setDbValue($row['FETYesNo']);
        $this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
        $this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatId'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['MobileNo'] = null;
        $row['ConsultantName'] = null;
        $row['RefDrName'] = null;
        $row['RefDrMobileNo'] = null;
        $row['NewVisitDate'] = null;
        $row['NewVisitYesNo'] = null;
        $row['Treatment'] = null;
        $row['IUIDoneDate1'] = null;
        $row['IUIDoneYesNo1'] = null;
        $row['UPTTestDate1'] = null;
        $row['UPTTestYesNo1'] = null;
        $row['IUIDoneDate2'] = null;
        $row['IUIDoneYesNo2'] = null;
        $row['UPTTestDate2'] = null;
        $row['UPTTestYesNo2'] = null;
        $row['IUIDoneDate3'] = null;
        $row['IUIDoneYesNo3'] = null;
        $row['UPTTestDate3'] = null;
        $row['UPTTestYesNo3'] = null;
        $row['IUIDoneDate4'] = null;
        $row['IUIDoneYesNo4'] = null;
        $row['UPTTestDate4'] = null;
        $row['UPTTestYesNo4'] = null;
        $row['IVFStimulationDate'] = null;
        $row['IVFStimulationYesNo'] = null;
        $row['OPUDate'] = null;
        $row['OPUYesNo'] = null;
        $row['ETDate'] = null;
        $row['ETYesNo'] = null;
        $row['BetaHCGDate'] = null;
        $row['BetaHCGYesNo'] = null;
        $row['FETDate'] = null;
        $row['FETYesNo'] = null;
        $row['FBetaHCGDate'] = null;
        $row['FBetaHCGYesNo'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['HospID'] = null;
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

        // PatId

        // PatientId

        // PatientName

        // Age

        // MobileNo

        // ConsultantName

        // RefDrName

        // RefDrMobileNo

        // NewVisitDate

        // NewVisitYesNo

        // Treatment

        // IUIDoneDate1

        // IUIDoneYesNo1

        // UPTTestDate1

        // UPTTestYesNo1

        // IUIDoneDate2

        // IUIDoneYesNo2

        // UPTTestDate2

        // UPTTestYesNo2

        // IUIDoneDate3

        // IUIDoneYesNo3

        // UPTTestDate3

        // UPTTestYesNo3

        // IUIDoneDate4

        // IUIDoneYesNo4

        // UPTTestDate4

        // UPTTestYesNo4

        // IVFStimulationDate

        // IVFStimulationYesNo

        // OPUDate

        // OPUYesNo

        // ETDate

        // ETYesNo

        // BetaHCGDate

        // BetaHCGYesNo

        // FETDate

        // FETYesNo

        // FBetaHCGDate

        // FBetaHCGYesNo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $this->PatId->ViewValue = $this->PatId->CurrentValue;
            $this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
            $this->PatId->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // MobileNo
            $this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
            $this->MobileNo->ViewCustomAttributes = "";

            // ConsultantName
            $this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
            $this->ConsultantName->ViewCustomAttributes = "";

            // RefDrName
            $this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
            $this->RefDrName->ViewCustomAttributes = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
            $this->RefDrMobileNo->ViewCustomAttributes = "";

            // NewVisitDate
            $this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
            $this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 0);
            $this->NewVisitDate->ViewCustomAttributes = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->ViewValue = $this->NewVisitYesNo->CurrentValue;
            $this->NewVisitYesNo->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
            $this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 0);
            $this->IUIDoneDate1->ViewCustomAttributes = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->ViewValue = $this->IUIDoneYesNo1->CurrentValue;
            $this->IUIDoneYesNo1->ViewCustomAttributes = "";

            // UPTTestDate1
            $this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
            $this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 0);
            $this->UPTTestDate1->ViewCustomAttributes = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->ViewValue = $this->UPTTestYesNo1->CurrentValue;
            $this->UPTTestYesNo1->ViewCustomAttributes = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
            $this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 0);
            $this->IUIDoneDate2->ViewCustomAttributes = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->ViewValue = $this->IUIDoneYesNo2->CurrentValue;
            $this->IUIDoneYesNo2->ViewCustomAttributes = "";

            // UPTTestDate2
            $this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
            $this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 0);
            $this->UPTTestDate2->ViewCustomAttributes = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->ViewValue = $this->UPTTestYesNo2->CurrentValue;
            $this->UPTTestYesNo2->ViewCustomAttributes = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
            $this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 0);
            $this->IUIDoneDate3->ViewCustomAttributes = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->ViewValue = $this->IUIDoneYesNo3->CurrentValue;
            $this->IUIDoneYesNo3->ViewCustomAttributes = "";

            // UPTTestDate3
            $this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
            $this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 0);
            $this->UPTTestDate3->ViewCustomAttributes = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->ViewValue = $this->UPTTestYesNo3->CurrentValue;
            $this->UPTTestYesNo3->ViewCustomAttributes = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
            $this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 0);
            $this->IUIDoneDate4->ViewCustomAttributes = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->ViewValue = $this->IUIDoneYesNo4->CurrentValue;
            $this->IUIDoneYesNo4->ViewCustomAttributes = "";

            // UPTTestDate4
            $this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
            $this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 0);
            $this->UPTTestDate4->ViewCustomAttributes = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->ViewValue = $this->UPTTestYesNo4->CurrentValue;
            $this->UPTTestYesNo4->ViewCustomAttributes = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
            $this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 0);
            $this->IVFStimulationDate->ViewCustomAttributes = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->ViewValue = $this->IVFStimulationYesNo->CurrentValue;
            $this->IVFStimulationYesNo->ViewCustomAttributes = "";

            // OPUDate
            $this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
            $this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 0);
            $this->OPUDate->ViewCustomAttributes = "";

            // OPUYesNo
            $this->OPUYesNo->ViewValue = $this->OPUYesNo->CurrentValue;
            $this->OPUYesNo->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
            $this->ETDate->ViewCustomAttributes = "";

            // ETYesNo
            $this->ETYesNo->ViewValue = $this->ETYesNo->CurrentValue;
            $this->ETYesNo->ViewCustomAttributes = "";

            // BetaHCGDate
            $this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
            $this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 0);
            $this->BetaHCGDate->ViewCustomAttributes = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->ViewValue = $this->BetaHCGYesNo->CurrentValue;
            $this->BetaHCGYesNo->ViewCustomAttributes = "";

            // FETDate
            $this->FETDate->ViewValue = $this->FETDate->CurrentValue;
            $this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 0);
            $this->FETDate->ViewCustomAttributes = "";

            // FETYesNo
            $this->FETYesNo->ViewValue = $this->FETYesNo->CurrentValue;
            $this->FETYesNo->ViewCustomAttributes = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
            $this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 0);
            $this->FBetaHCGDate->ViewCustomAttributes = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->ViewValue = $this->FBetaHCGYesNo->CurrentValue;
            $this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // MobileNo
            $this->MobileNo->LinkCustomAttributes = "";
            $this->MobileNo->HrefValue = "";
            $this->MobileNo->TooltipValue = "";

            // ConsultantName
            $this->ConsultantName->LinkCustomAttributes = "";
            $this->ConsultantName->HrefValue = "";
            $this->ConsultantName->TooltipValue = "";

            // RefDrName
            $this->RefDrName->LinkCustomAttributes = "";
            $this->RefDrName->HrefValue = "";
            $this->RefDrName->TooltipValue = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->LinkCustomAttributes = "";
            $this->RefDrMobileNo->HrefValue = "";
            $this->RefDrMobileNo->TooltipValue = "";

            // NewVisitDate
            $this->NewVisitDate->LinkCustomAttributes = "";
            $this->NewVisitDate->HrefValue = "";
            $this->NewVisitDate->TooltipValue = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->LinkCustomAttributes = "";
            $this->NewVisitYesNo->HrefValue = "";
            $this->NewVisitYesNo->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->LinkCustomAttributes = "";
            $this->IUIDoneDate1->HrefValue = "";
            $this->IUIDoneDate1->TooltipValue = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->LinkCustomAttributes = "";
            $this->IUIDoneYesNo1->HrefValue = "";
            $this->IUIDoneYesNo1->TooltipValue = "";

            // UPTTestDate1
            $this->UPTTestDate1->LinkCustomAttributes = "";
            $this->UPTTestDate1->HrefValue = "";
            $this->UPTTestDate1->TooltipValue = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->LinkCustomAttributes = "";
            $this->UPTTestYesNo1->HrefValue = "";
            $this->UPTTestYesNo1->TooltipValue = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->LinkCustomAttributes = "";
            $this->IUIDoneDate2->HrefValue = "";
            $this->IUIDoneDate2->TooltipValue = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->LinkCustomAttributes = "";
            $this->IUIDoneYesNo2->HrefValue = "";
            $this->IUIDoneYesNo2->TooltipValue = "";

            // UPTTestDate2
            $this->UPTTestDate2->LinkCustomAttributes = "";
            $this->UPTTestDate2->HrefValue = "";
            $this->UPTTestDate2->TooltipValue = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->LinkCustomAttributes = "";
            $this->UPTTestYesNo2->HrefValue = "";
            $this->UPTTestYesNo2->TooltipValue = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->LinkCustomAttributes = "";
            $this->IUIDoneDate3->HrefValue = "";
            $this->IUIDoneDate3->TooltipValue = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->LinkCustomAttributes = "";
            $this->IUIDoneYesNo3->HrefValue = "";
            $this->IUIDoneYesNo3->TooltipValue = "";

            // UPTTestDate3
            $this->UPTTestDate3->LinkCustomAttributes = "";
            $this->UPTTestDate3->HrefValue = "";
            $this->UPTTestDate3->TooltipValue = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->LinkCustomAttributes = "";
            $this->UPTTestYesNo3->HrefValue = "";
            $this->UPTTestYesNo3->TooltipValue = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->LinkCustomAttributes = "";
            $this->IUIDoneDate4->HrefValue = "";
            $this->IUIDoneDate4->TooltipValue = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->LinkCustomAttributes = "";
            $this->IUIDoneYesNo4->HrefValue = "";
            $this->IUIDoneYesNo4->TooltipValue = "";

            // UPTTestDate4
            $this->UPTTestDate4->LinkCustomAttributes = "";
            $this->UPTTestDate4->HrefValue = "";
            $this->UPTTestDate4->TooltipValue = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->LinkCustomAttributes = "";
            $this->UPTTestYesNo4->HrefValue = "";
            $this->UPTTestYesNo4->TooltipValue = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->LinkCustomAttributes = "";
            $this->IVFStimulationDate->HrefValue = "";
            $this->IVFStimulationDate->TooltipValue = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->LinkCustomAttributes = "";
            $this->IVFStimulationYesNo->HrefValue = "";
            $this->IVFStimulationYesNo->TooltipValue = "";

            // OPUDate
            $this->OPUDate->LinkCustomAttributes = "";
            $this->OPUDate->HrefValue = "";
            $this->OPUDate->TooltipValue = "";

            // OPUYesNo
            $this->OPUYesNo->LinkCustomAttributes = "";
            $this->OPUYesNo->HrefValue = "";
            $this->OPUYesNo->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // ETYesNo
            $this->ETYesNo->LinkCustomAttributes = "";
            $this->ETYesNo->HrefValue = "";
            $this->ETYesNo->TooltipValue = "";

            // BetaHCGDate
            $this->BetaHCGDate->LinkCustomAttributes = "";
            $this->BetaHCGDate->HrefValue = "";
            $this->BetaHCGDate->TooltipValue = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->LinkCustomAttributes = "";
            $this->BetaHCGYesNo->HrefValue = "";
            $this->BetaHCGYesNo->TooltipValue = "";

            // FETDate
            $this->FETDate->LinkCustomAttributes = "";
            $this->FETDate->HrefValue = "";
            $this->FETDate->TooltipValue = "";

            // FETYesNo
            $this->FETYesNo->LinkCustomAttributes = "";
            $this->FETYesNo->HrefValue = "";
            $this->FETYesNo->TooltipValue = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->LinkCustomAttributes = "";
            $this->FBetaHCGDate->HrefValue = "";
            $this->FBetaHCGDate->TooltipValue = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->LinkCustomAttributes = "";
            $this->FBetaHCGYesNo->HrefValue = "";
            $this->FBetaHCGYesNo->TooltipValue = "";

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("MonitorTreatmentPlanList"), "", $this->TableVar, true);
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

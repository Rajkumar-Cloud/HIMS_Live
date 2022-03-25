<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientAnRegistrationEdit extends PatientAnRegistration
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_an_registration';

    // Page object name
    public $PageObjName = "PatientAnRegistrationEdit";

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

        // Table object (patient_an_registration)
        if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
            $GLOBALS["patient_an_registration"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_an_registration');
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
                $doc = new $class(Container("patient_an_registration"));
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
                    if ($pageName == "PatientAnRegistrationView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;

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
        $this->id->setVisibility();
        $this->pid->setVisibility();
        $this->fid->setVisibility();
        $this->G->setVisibility();
        $this->P->setVisibility();
        $this->L->setVisibility();
        $this->A->setVisibility();
        $this->E->setVisibility();
        $this->M->setVisibility();
        $this->LMP->setVisibility();
        $this->EDO->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->MaritalHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->PreviousHistoryofGDM->setVisibility();
        $this->PreviousHistorofPIH->setVisibility();
        $this->PreviousHistoryofIUGR->setVisibility();
        $this->PreviousHistoryofOligohydramnios->setVisibility();
        $this->PreviousHistoryofPreterm->setVisibility();
        $this->G1->setVisibility();
        $this->G2->setVisibility();
        $this->G3->setVisibility();
        $this->DeliveryNDLSCS1->setVisibility();
        $this->DeliveryNDLSCS2->setVisibility();
        $this->DeliveryNDLSCS3->setVisibility();
        $this->BabySexweight1->setVisibility();
        $this->BabySexweight2->setVisibility();
        $this->BabySexweight3->setVisibility();
        $this->PastMedicalHistory->setVisibility();
        $this->PastSurgicalHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Viability->setVisibility();
        $this->ViabilityDATE->setVisibility();
        $this->ViabilityREPORT->setVisibility();
        $this->Viability2->setVisibility();
        $this->Viability2DATE->setVisibility();
        $this->Viability2REPORT->setVisibility();
        $this->NTscan->setVisibility();
        $this->NTscanDATE->setVisibility();
        $this->NTscanREPORT->setVisibility();
        $this->EarlyTarget->setVisibility();
        $this->EarlyTargetDATE->setVisibility();
        $this->EarlyTargetREPORT->setVisibility();
        $this->Anomaly->setVisibility();
        $this->AnomalyDATE->setVisibility();
        $this->AnomalyREPORT->setVisibility();
        $this->Growth->setVisibility();
        $this->GrowthDATE->setVisibility();
        $this->GrowthREPORT->setVisibility();
        $this->Growth1->setVisibility();
        $this->Growth1DATE->setVisibility();
        $this->Growth1REPORT->setVisibility();
        $this->ANProfile->setVisibility();
        $this->ANProfileDATE->setVisibility();
        $this->ANProfileINHOUSE->setVisibility();
        $this->ANProfileREPORT->setVisibility();
        $this->DualMarker->setVisibility();
        $this->DualMarkerDATE->setVisibility();
        $this->DualMarkerINHOUSE->setVisibility();
        $this->DualMarkerREPORT->setVisibility();
        $this->Quadruple->setVisibility();
        $this->QuadrupleDATE->setVisibility();
        $this->QuadrupleINHOUSE->setVisibility();
        $this->QuadrupleREPORT->setVisibility();
        $this->A5month->setVisibility();
        $this->A5monthDATE->setVisibility();
        $this->A5monthINHOUSE->setVisibility();
        $this->A5monthREPORT->setVisibility();
        $this->A7month->setVisibility();
        $this->A7monthDATE->setVisibility();
        $this->A7monthINHOUSE->setVisibility();
        $this->A7monthREPORT->setVisibility();
        $this->A9month->setVisibility();
        $this->A9monthDATE->setVisibility();
        $this->A9monthINHOUSE->setVisibility();
        $this->A9monthREPORT->setVisibility();
        $this->INJ->setVisibility();
        $this->INJDATE->setVisibility();
        $this->INJINHOUSE->setVisibility();
        $this->INJREPORT->setVisibility();
        $this->Bleeding->setVisibility();
        $this->Hypothyroidism->setVisibility();
        $this->PICMENumber->setVisibility();
        $this->Outcome->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateodProcedure->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->ModeOfDelivery->setVisibility();
        $this->ND->setVisibility();
        $this->NDS->setVisibility();
        $this->NDP->setVisibility();
        $this->Vaccum->setVisibility();
        $this->VaccumS->setVisibility();
        $this->VaccumP->setVisibility();
        $this->Forceps->setVisibility();
        $this->ForcepsS->setVisibility();
        $this->ForcepsP->setVisibility();
        $this->Elective->setVisibility();
        $this->ElectiveS->setVisibility();
        $this->ElectiveP->setVisibility();
        $this->Emergency->setVisibility();
        $this->EmergencyS->setVisibility();
        $this->EmergencyP->setVisibility();
        $this->Maturity->setVisibility();
        $this->Baby1->setVisibility();
        $this->Baby2->setVisibility();
        $this->sex1->setVisibility();
        $this->sex2->setVisibility();
        $this->weight1->setVisibility();
        $this->weight2->setVisibility();
        $this->NICU1->setVisibility();
        $this->NICU2->setVisibility();
        $this->Jaundice1->setVisibility();
        $this->Jaundice2->setVisibility();
        $this->Others1->setVisibility();
        $this->Others2->setVisibility();
        $this->SpillOverReasons->setVisibility();
        $this->ANClosed->setVisibility();
        $this->ANClosedDATE->setVisibility();
        $this->PastMedicalHistoryOthers->setVisibility();
        $this->PastSurgicalHistoryOthers->setVisibility();
        $this->FamilyHistoryOthers->setVisibility();
        $this->PresentPregnancyComplicationsOthers->setVisibility();
        $this->ETdate->setVisibility();
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
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Load key from Form
                if ($CurrentForm->hasValue("x_id")) {
                    $this->id->setFormValue($CurrentForm->getValue("x_id"));
                }
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Load recordset
            if ($this->isShow()) {
                // Load current record
                $loaded = $this->loadRow();
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("PatientAnRegistrationList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientAnRegistrationList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'pid' first before field var 'x_pid'
        $val = $CurrentForm->hasValue("pid") ? $CurrentForm->getValue("pid") : $CurrentForm->getValue("x_pid");
        if (!$this->pid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pid->Visible = false; // Disable update for API request
            } else {
                $this->pid->setFormValue($val);
            }
        }

        // Check field name 'fid' first before field var 'x_fid'
        $val = $CurrentForm->hasValue("fid") ? $CurrentForm->getValue("fid") : $CurrentForm->getValue("x_fid");
        if (!$this->fid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->fid->Visible = false; // Disable update for API request
            } else {
                $this->fid->setFormValue($val);
            }
        }

        // Check field name 'G' first before field var 'x_G'
        $val = $CurrentForm->hasValue("G") ? $CurrentForm->getValue("G") : $CurrentForm->getValue("x_G");
        if (!$this->G->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->G->Visible = false; // Disable update for API request
            } else {
                $this->G->setFormValue($val);
            }
        }

        // Check field name 'P' first before field var 'x_P'
        $val = $CurrentForm->hasValue("P") ? $CurrentForm->getValue("P") : $CurrentForm->getValue("x_P");
        if (!$this->P->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->P->Visible = false; // Disable update for API request
            } else {
                $this->P->setFormValue($val);
            }
        }

        // Check field name 'L' first before field var 'x_L'
        $val = $CurrentForm->hasValue("L") ? $CurrentForm->getValue("L") : $CurrentForm->getValue("x_L");
        if (!$this->L->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->L->Visible = false; // Disable update for API request
            } else {
                $this->L->setFormValue($val);
            }
        }

        // Check field name 'A' first before field var 'x_A'
        $val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
        if (!$this->A->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A->Visible = false; // Disable update for API request
            } else {
                $this->A->setFormValue($val);
            }
        }

        // Check field name 'E' first before field var 'x_E'
        $val = $CurrentForm->hasValue("E") ? $CurrentForm->getValue("E") : $CurrentForm->getValue("x_E");
        if (!$this->E->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->E->Visible = false; // Disable update for API request
            } else {
                $this->E->setFormValue($val);
            }
        }

        // Check field name 'M' first before field var 'x_M'
        $val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
        if (!$this->M->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->M->Visible = false; // Disable update for API request
            } else {
                $this->M->setFormValue($val);
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
        }

        // Check field name 'EDO' first before field var 'x_EDO'
        $val = $CurrentForm->hasValue("EDO") ? $CurrentForm->getValue("EDO") : $CurrentForm->getValue("x_EDO");
        if (!$this->EDO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EDO->Visible = false; // Disable update for API request
            } else {
                $this->EDO->setFormValue($val);
            }
        }

        // Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
        $val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
        if (!$this->MenstrualHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MenstrualHistory->Visible = false; // Disable update for API request
            } else {
                $this->MenstrualHistory->setFormValue($val);
            }
        }

        // Check field name 'MaritalHistory' first before field var 'x_MaritalHistory'
        $val = $CurrentForm->hasValue("MaritalHistory") ? $CurrentForm->getValue("MaritalHistory") : $CurrentForm->getValue("x_MaritalHistory");
        if (!$this->MaritalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaritalHistory->Visible = false; // Disable update for API request
            } else {
                $this->MaritalHistory->setFormValue($val);
            }
        }

        // Check field name 'ObstetricHistory' first before field var 'x_ObstetricHistory'
        $val = $CurrentForm->hasValue("ObstetricHistory") ? $CurrentForm->getValue("ObstetricHistory") : $CurrentForm->getValue("x_ObstetricHistory");
        if (!$this->ObstetricHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ObstetricHistory->Visible = false; // Disable update for API request
            } else {
                $this->ObstetricHistory->setFormValue($val);
            }
        }

        // Check field name 'PreviousHistoryofGDM' first before field var 'x_PreviousHistoryofGDM'
        $val = $CurrentForm->hasValue("PreviousHistoryofGDM") ? $CurrentForm->getValue("PreviousHistoryofGDM") : $CurrentForm->getValue("x_PreviousHistoryofGDM");
        if (!$this->PreviousHistoryofGDM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreviousHistoryofGDM->Visible = false; // Disable update for API request
            } else {
                $this->PreviousHistoryofGDM->setFormValue($val);
            }
        }

        // Check field name 'PreviousHistorofPIH' first before field var 'x_PreviousHistorofPIH'
        $val = $CurrentForm->hasValue("PreviousHistorofPIH") ? $CurrentForm->getValue("PreviousHistorofPIH") : $CurrentForm->getValue("x_PreviousHistorofPIH");
        if (!$this->PreviousHistorofPIH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreviousHistorofPIH->Visible = false; // Disable update for API request
            } else {
                $this->PreviousHistorofPIH->setFormValue($val);
            }
        }

        // Check field name 'PreviousHistoryofIUGR' first before field var 'x_PreviousHistoryofIUGR'
        $val = $CurrentForm->hasValue("PreviousHistoryofIUGR") ? $CurrentForm->getValue("PreviousHistoryofIUGR") : $CurrentForm->getValue("x_PreviousHistoryofIUGR");
        if (!$this->PreviousHistoryofIUGR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreviousHistoryofIUGR->Visible = false; // Disable update for API request
            } else {
                $this->PreviousHistoryofIUGR->setFormValue($val);
            }
        }

        // Check field name 'PreviousHistoryofOligohydramnios' first before field var 'x_PreviousHistoryofOligohydramnios'
        $val = $CurrentForm->hasValue("PreviousHistoryofOligohydramnios") ? $CurrentForm->getValue("PreviousHistoryofOligohydramnios") : $CurrentForm->getValue("x_PreviousHistoryofOligohydramnios");
        if (!$this->PreviousHistoryofOligohydramnios->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreviousHistoryofOligohydramnios->Visible = false; // Disable update for API request
            } else {
                $this->PreviousHistoryofOligohydramnios->setFormValue($val);
            }
        }

        // Check field name 'PreviousHistoryofPreterm' first before field var 'x_PreviousHistoryofPreterm'
        $val = $CurrentForm->hasValue("PreviousHistoryofPreterm") ? $CurrentForm->getValue("PreviousHistoryofPreterm") : $CurrentForm->getValue("x_PreviousHistoryofPreterm");
        if (!$this->PreviousHistoryofPreterm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreviousHistoryofPreterm->Visible = false; // Disable update for API request
            } else {
                $this->PreviousHistoryofPreterm->setFormValue($val);
            }
        }

        // Check field name 'G1' first before field var 'x_G1'
        $val = $CurrentForm->hasValue("G1") ? $CurrentForm->getValue("G1") : $CurrentForm->getValue("x_G1");
        if (!$this->G1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->G1->Visible = false; // Disable update for API request
            } else {
                $this->G1->setFormValue($val);
            }
        }

        // Check field name 'G2' first before field var 'x_G2'
        $val = $CurrentForm->hasValue("G2") ? $CurrentForm->getValue("G2") : $CurrentForm->getValue("x_G2");
        if (!$this->G2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->G2->Visible = false; // Disable update for API request
            } else {
                $this->G2->setFormValue($val);
            }
        }

        // Check field name 'G3' first before field var 'x_G3'
        $val = $CurrentForm->hasValue("G3") ? $CurrentForm->getValue("G3") : $CurrentForm->getValue("x_G3");
        if (!$this->G3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->G3->Visible = false; // Disable update for API request
            } else {
                $this->G3->setFormValue($val);
            }
        }

        // Check field name 'DeliveryNDLSCS1' first before field var 'x_DeliveryNDLSCS1'
        $val = $CurrentForm->hasValue("DeliveryNDLSCS1") ? $CurrentForm->getValue("DeliveryNDLSCS1") : $CurrentForm->getValue("x_DeliveryNDLSCS1");
        if (!$this->DeliveryNDLSCS1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryNDLSCS1->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryNDLSCS1->setFormValue($val);
            }
        }

        // Check field name 'DeliveryNDLSCS2' first before field var 'x_DeliveryNDLSCS2'
        $val = $CurrentForm->hasValue("DeliveryNDLSCS2") ? $CurrentForm->getValue("DeliveryNDLSCS2") : $CurrentForm->getValue("x_DeliveryNDLSCS2");
        if (!$this->DeliveryNDLSCS2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryNDLSCS2->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryNDLSCS2->setFormValue($val);
            }
        }

        // Check field name 'DeliveryNDLSCS3' first before field var 'x_DeliveryNDLSCS3'
        $val = $CurrentForm->hasValue("DeliveryNDLSCS3") ? $CurrentForm->getValue("DeliveryNDLSCS3") : $CurrentForm->getValue("x_DeliveryNDLSCS3");
        if (!$this->DeliveryNDLSCS3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryNDLSCS3->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryNDLSCS3->setFormValue($val);
            }
        }

        // Check field name 'BabySexweight1' first before field var 'x_BabySexweight1'
        $val = $CurrentForm->hasValue("BabySexweight1") ? $CurrentForm->getValue("BabySexweight1") : $CurrentForm->getValue("x_BabySexweight1");
        if (!$this->BabySexweight1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BabySexweight1->Visible = false; // Disable update for API request
            } else {
                $this->BabySexweight1->setFormValue($val);
            }
        }

        // Check field name 'BabySexweight2' first before field var 'x_BabySexweight2'
        $val = $CurrentForm->hasValue("BabySexweight2") ? $CurrentForm->getValue("BabySexweight2") : $CurrentForm->getValue("x_BabySexweight2");
        if (!$this->BabySexweight2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BabySexweight2->Visible = false; // Disable update for API request
            } else {
                $this->BabySexweight2->setFormValue($val);
            }
        }

        // Check field name 'BabySexweight3' first before field var 'x_BabySexweight3'
        $val = $CurrentForm->hasValue("BabySexweight3") ? $CurrentForm->getValue("BabySexweight3") : $CurrentForm->getValue("x_BabySexweight3");
        if (!$this->BabySexweight3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BabySexweight3->Visible = false; // Disable update for API request
            } else {
                $this->BabySexweight3->setFormValue($val);
            }
        }

        // Check field name 'PastMedicalHistory' first before field var 'x_PastMedicalHistory'
        $val = $CurrentForm->hasValue("PastMedicalHistory") ? $CurrentForm->getValue("PastMedicalHistory") : $CurrentForm->getValue("x_PastMedicalHistory");
        if (!$this->PastMedicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastMedicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->PastMedicalHistory->setFormValue($val);
            }
        }

        // Check field name 'PastSurgicalHistory' first before field var 'x_PastSurgicalHistory'
        $val = $CurrentForm->hasValue("PastSurgicalHistory") ? $CurrentForm->getValue("PastSurgicalHistory") : $CurrentForm->getValue("x_PastSurgicalHistory");
        if (!$this->PastSurgicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastSurgicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->PastSurgicalHistory->setFormValue($val);
            }
        }

        // Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
        $val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
        if (!$this->FamilyHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FamilyHistory->Visible = false; // Disable update for API request
            } else {
                $this->FamilyHistory->setFormValue($val);
            }
        }

        // Check field name 'Viability' first before field var 'x_Viability'
        $val = $CurrentForm->hasValue("Viability") ? $CurrentForm->getValue("Viability") : $CurrentForm->getValue("x_Viability");
        if (!$this->Viability->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Viability->Visible = false; // Disable update for API request
            } else {
                $this->Viability->setFormValue($val);
            }
        }

        // Check field name 'ViabilityDATE' first before field var 'x_ViabilityDATE'
        $val = $CurrentForm->hasValue("ViabilityDATE") ? $CurrentForm->getValue("ViabilityDATE") : $CurrentForm->getValue("x_ViabilityDATE");
        if (!$this->ViabilityDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ViabilityDATE->Visible = false; // Disable update for API request
            } else {
                $this->ViabilityDATE->setFormValue($val);
            }
        }

        // Check field name 'ViabilityREPORT' first before field var 'x_ViabilityREPORT'
        $val = $CurrentForm->hasValue("ViabilityREPORT") ? $CurrentForm->getValue("ViabilityREPORT") : $CurrentForm->getValue("x_ViabilityREPORT");
        if (!$this->ViabilityREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ViabilityREPORT->Visible = false; // Disable update for API request
            } else {
                $this->ViabilityREPORT->setFormValue($val);
            }
        }

        // Check field name 'Viability2' first before field var 'x_Viability2'
        $val = $CurrentForm->hasValue("Viability2") ? $CurrentForm->getValue("Viability2") : $CurrentForm->getValue("x_Viability2");
        if (!$this->Viability2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Viability2->Visible = false; // Disable update for API request
            } else {
                $this->Viability2->setFormValue($val);
            }
        }

        // Check field name 'Viability2DATE' first before field var 'x_Viability2DATE'
        $val = $CurrentForm->hasValue("Viability2DATE") ? $CurrentForm->getValue("Viability2DATE") : $CurrentForm->getValue("x_Viability2DATE");
        if (!$this->Viability2DATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Viability2DATE->Visible = false; // Disable update for API request
            } else {
                $this->Viability2DATE->setFormValue($val);
            }
        }

        // Check field name 'Viability2REPORT' first before field var 'x_Viability2REPORT'
        $val = $CurrentForm->hasValue("Viability2REPORT") ? $CurrentForm->getValue("Viability2REPORT") : $CurrentForm->getValue("x_Viability2REPORT");
        if (!$this->Viability2REPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Viability2REPORT->Visible = false; // Disable update for API request
            } else {
                $this->Viability2REPORT->setFormValue($val);
            }
        }

        // Check field name 'NTscan' first before field var 'x_NTscan'
        $val = $CurrentForm->hasValue("NTscan") ? $CurrentForm->getValue("NTscan") : $CurrentForm->getValue("x_NTscan");
        if (!$this->NTscan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NTscan->Visible = false; // Disable update for API request
            } else {
                $this->NTscan->setFormValue($val);
            }
        }

        // Check field name 'NTscanDATE' first before field var 'x_NTscanDATE'
        $val = $CurrentForm->hasValue("NTscanDATE") ? $CurrentForm->getValue("NTscanDATE") : $CurrentForm->getValue("x_NTscanDATE");
        if (!$this->NTscanDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NTscanDATE->Visible = false; // Disable update for API request
            } else {
                $this->NTscanDATE->setFormValue($val);
            }
        }

        // Check field name 'NTscanREPORT' first before field var 'x_NTscanREPORT'
        $val = $CurrentForm->hasValue("NTscanREPORT") ? $CurrentForm->getValue("NTscanREPORT") : $CurrentForm->getValue("x_NTscanREPORT");
        if (!$this->NTscanREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NTscanREPORT->Visible = false; // Disable update for API request
            } else {
                $this->NTscanREPORT->setFormValue($val);
            }
        }

        // Check field name 'EarlyTarget' first before field var 'x_EarlyTarget'
        $val = $CurrentForm->hasValue("EarlyTarget") ? $CurrentForm->getValue("EarlyTarget") : $CurrentForm->getValue("x_EarlyTarget");
        if (!$this->EarlyTarget->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EarlyTarget->Visible = false; // Disable update for API request
            } else {
                $this->EarlyTarget->setFormValue($val);
            }
        }

        // Check field name 'EarlyTargetDATE' first before field var 'x_EarlyTargetDATE'
        $val = $CurrentForm->hasValue("EarlyTargetDATE") ? $CurrentForm->getValue("EarlyTargetDATE") : $CurrentForm->getValue("x_EarlyTargetDATE");
        if (!$this->EarlyTargetDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EarlyTargetDATE->Visible = false; // Disable update for API request
            } else {
                $this->EarlyTargetDATE->setFormValue($val);
            }
        }

        // Check field name 'EarlyTargetREPORT' first before field var 'x_EarlyTargetREPORT'
        $val = $CurrentForm->hasValue("EarlyTargetREPORT") ? $CurrentForm->getValue("EarlyTargetREPORT") : $CurrentForm->getValue("x_EarlyTargetREPORT");
        if (!$this->EarlyTargetREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EarlyTargetREPORT->Visible = false; // Disable update for API request
            } else {
                $this->EarlyTargetREPORT->setFormValue($val);
            }
        }

        // Check field name 'Anomaly' first before field var 'x_Anomaly'
        $val = $CurrentForm->hasValue("Anomaly") ? $CurrentForm->getValue("Anomaly") : $CurrentForm->getValue("x_Anomaly");
        if (!$this->Anomaly->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anomaly->Visible = false; // Disable update for API request
            } else {
                $this->Anomaly->setFormValue($val);
            }
        }

        // Check field name 'AnomalyDATE' first before field var 'x_AnomalyDATE'
        $val = $CurrentForm->hasValue("AnomalyDATE") ? $CurrentForm->getValue("AnomalyDATE") : $CurrentForm->getValue("x_AnomalyDATE");
        if (!$this->AnomalyDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnomalyDATE->Visible = false; // Disable update for API request
            } else {
                $this->AnomalyDATE->setFormValue($val);
            }
        }

        // Check field name 'AnomalyREPORT' first before field var 'x_AnomalyREPORT'
        $val = $CurrentForm->hasValue("AnomalyREPORT") ? $CurrentForm->getValue("AnomalyREPORT") : $CurrentForm->getValue("x_AnomalyREPORT");
        if (!$this->AnomalyREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnomalyREPORT->Visible = false; // Disable update for API request
            } else {
                $this->AnomalyREPORT->setFormValue($val);
            }
        }

        // Check field name 'Growth' first before field var 'x_Growth'
        $val = $CurrentForm->hasValue("Growth") ? $CurrentForm->getValue("Growth") : $CurrentForm->getValue("x_Growth");
        if (!$this->Growth->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Growth->Visible = false; // Disable update for API request
            } else {
                $this->Growth->setFormValue($val);
            }
        }

        // Check field name 'GrowthDATE' first before field var 'x_GrowthDATE'
        $val = $CurrentForm->hasValue("GrowthDATE") ? $CurrentForm->getValue("GrowthDATE") : $CurrentForm->getValue("x_GrowthDATE");
        if (!$this->GrowthDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrowthDATE->Visible = false; // Disable update for API request
            } else {
                $this->GrowthDATE->setFormValue($val);
            }
        }

        // Check field name 'GrowthREPORT' first before field var 'x_GrowthREPORT'
        $val = $CurrentForm->hasValue("GrowthREPORT") ? $CurrentForm->getValue("GrowthREPORT") : $CurrentForm->getValue("x_GrowthREPORT");
        if (!$this->GrowthREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrowthREPORT->Visible = false; // Disable update for API request
            } else {
                $this->GrowthREPORT->setFormValue($val);
            }
        }

        // Check field name 'Growth1' first before field var 'x_Growth1'
        $val = $CurrentForm->hasValue("Growth1") ? $CurrentForm->getValue("Growth1") : $CurrentForm->getValue("x_Growth1");
        if (!$this->Growth1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Growth1->Visible = false; // Disable update for API request
            } else {
                $this->Growth1->setFormValue($val);
            }
        }

        // Check field name 'Growth1DATE' first before field var 'x_Growth1DATE'
        $val = $CurrentForm->hasValue("Growth1DATE") ? $CurrentForm->getValue("Growth1DATE") : $CurrentForm->getValue("x_Growth1DATE");
        if (!$this->Growth1DATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Growth1DATE->Visible = false; // Disable update for API request
            } else {
                $this->Growth1DATE->setFormValue($val);
            }
        }

        // Check field name 'Growth1REPORT' first before field var 'x_Growth1REPORT'
        $val = $CurrentForm->hasValue("Growth1REPORT") ? $CurrentForm->getValue("Growth1REPORT") : $CurrentForm->getValue("x_Growth1REPORT");
        if (!$this->Growth1REPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Growth1REPORT->Visible = false; // Disable update for API request
            } else {
                $this->Growth1REPORT->setFormValue($val);
            }
        }

        // Check field name 'ANProfile' first before field var 'x_ANProfile'
        $val = $CurrentForm->hasValue("ANProfile") ? $CurrentForm->getValue("ANProfile") : $CurrentForm->getValue("x_ANProfile");
        if (!$this->ANProfile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANProfile->Visible = false; // Disable update for API request
            } else {
                $this->ANProfile->setFormValue($val);
            }
        }

        // Check field name 'ANProfileDATE' first before field var 'x_ANProfileDATE'
        $val = $CurrentForm->hasValue("ANProfileDATE") ? $CurrentForm->getValue("ANProfileDATE") : $CurrentForm->getValue("x_ANProfileDATE");
        if (!$this->ANProfileDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANProfileDATE->Visible = false; // Disable update for API request
            } else {
                $this->ANProfileDATE->setFormValue($val);
            }
        }

        // Check field name 'ANProfileINHOUSE' first before field var 'x_ANProfileINHOUSE'
        $val = $CurrentForm->hasValue("ANProfileINHOUSE") ? $CurrentForm->getValue("ANProfileINHOUSE") : $CurrentForm->getValue("x_ANProfileINHOUSE");
        if (!$this->ANProfileINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANProfileINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->ANProfileINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'ANProfileREPORT' first before field var 'x_ANProfileREPORT'
        $val = $CurrentForm->hasValue("ANProfileREPORT") ? $CurrentForm->getValue("ANProfileREPORT") : $CurrentForm->getValue("x_ANProfileREPORT");
        if (!$this->ANProfileREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANProfileREPORT->Visible = false; // Disable update for API request
            } else {
                $this->ANProfileREPORT->setFormValue($val);
            }
        }

        // Check field name 'DualMarker' first before field var 'x_DualMarker'
        $val = $CurrentForm->hasValue("DualMarker") ? $CurrentForm->getValue("DualMarker") : $CurrentForm->getValue("x_DualMarker");
        if (!$this->DualMarker->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DualMarker->Visible = false; // Disable update for API request
            } else {
                $this->DualMarker->setFormValue($val);
            }
        }

        // Check field name 'DualMarkerDATE' first before field var 'x_DualMarkerDATE'
        $val = $CurrentForm->hasValue("DualMarkerDATE") ? $CurrentForm->getValue("DualMarkerDATE") : $CurrentForm->getValue("x_DualMarkerDATE");
        if (!$this->DualMarkerDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DualMarkerDATE->Visible = false; // Disable update for API request
            } else {
                $this->DualMarkerDATE->setFormValue($val);
            }
        }

        // Check field name 'DualMarkerINHOUSE' first before field var 'x_DualMarkerINHOUSE'
        $val = $CurrentForm->hasValue("DualMarkerINHOUSE") ? $CurrentForm->getValue("DualMarkerINHOUSE") : $CurrentForm->getValue("x_DualMarkerINHOUSE");
        if (!$this->DualMarkerINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DualMarkerINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->DualMarkerINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'DualMarkerREPORT' first before field var 'x_DualMarkerREPORT'
        $val = $CurrentForm->hasValue("DualMarkerREPORT") ? $CurrentForm->getValue("DualMarkerREPORT") : $CurrentForm->getValue("x_DualMarkerREPORT");
        if (!$this->DualMarkerREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DualMarkerREPORT->Visible = false; // Disable update for API request
            } else {
                $this->DualMarkerREPORT->setFormValue($val);
            }
        }

        // Check field name 'Quadruple' first before field var 'x_Quadruple'
        $val = $CurrentForm->hasValue("Quadruple") ? $CurrentForm->getValue("Quadruple") : $CurrentForm->getValue("x_Quadruple");
        if (!$this->Quadruple->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Quadruple->Visible = false; // Disable update for API request
            } else {
                $this->Quadruple->setFormValue($val);
            }
        }

        // Check field name 'QuadrupleDATE' first before field var 'x_QuadrupleDATE'
        $val = $CurrentForm->hasValue("QuadrupleDATE") ? $CurrentForm->getValue("QuadrupleDATE") : $CurrentForm->getValue("x_QuadrupleDATE");
        if (!$this->QuadrupleDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->QuadrupleDATE->Visible = false; // Disable update for API request
            } else {
                $this->QuadrupleDATE->setFormValue($val);
            }
        }

        // Check field name 'QuadrupleINHOUSE' first before field var 'x_QuadrupleINHOUSE'
        $val = $CurrentForm->hasValue("QuadrupleINHOUSE") ? $CurrentForm->getValue("QuadrupleINHOUSE") : $CurrentForm->getValue("x_QuadrupleINHOUSE");
        if (!$this->QuadrupleINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->QuadrupleINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->QuadrupleINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'QuadrupleREPORT' first before field var 'x_QuadrupleREPORT'
        $val = $CurrentForm->hasValue("QuadrupleREPORT") ? $CurrentForm->getValue("QuadrupleREPORT") : $CurrentForm->getValue("x_QuadrupleREPORT");
        if (!$this->QuadrupleREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->QuadrupleREPORT->Visible = false; // Disable update for API request
            } else {
                $this->QuadrupleREPORT->setFormValue($val);
            }
        }

        // Check field name 'A5month' first before field var 'x_A5month'
        $val = $CurrentForm->hasValue("A5month") ? $CurrentForm->getValue("A5month") : $CurrentForm->getValue("x_A5month");
        if (!$this->A5month->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A5month->Visible = false; // Disable update for API request
            } else {
                $this->A5month->setFormValue($val);
            }
        }

        // Check field name 'A5monthDATE' first before field var 'x_A5monthDATE'
        $val = $CurrentForm->hasValue("A5monthDATE") ? $CurrentForm->getValue("A5monthDATE") : $CurrentForm->getValue("x_A5monthDATE");
        if (!$this->A5monthDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A5monthDATE->Visible = false; // Disable update for API request
            } else {
                $this->A5monthDATE->setFormValue($val);
            }
        }

        // Check field name 'A5monthINHOUSE' first before field var 'x_A5monthINHOUSE'
        $val = $CurrentForm->hasValue("A5monthINHOUSE") ? $CurrentForm->getValue("A5monthINHOUSE") : $CurrentForm->getValue("x_A5monthINHOUSE");
        if (!$this->A5monthINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A5monthINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->A5monthINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'A5monthREPORT' first before field var 'x_A5monthREPORT'
        $val = $CurrentForm->hasValue("A5monthREPORT") ? $CurrentForm->getValue("A5monthREPORT") : $CurrentForm->getValue("x_A5monthREPORT");
        if (!$this->A5monthREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A5monthREPORT->Visible = false; // Disable update for API request
            } else {
                $this->A5monthREPORT->setFormValue($val);
            }
        }

        // Check field name 'A7month' first before field var 'x_A7month'
        $val = $CurrentForm->hasValue("A7month") ? $CurrentForm->getValue("A7month") : $CurrentForm->getValue("x_A7month");
        if (!$this->A7month->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A7month->Visible = false; // Disable update for API request
            } else {
                $this->A7month->setFormValue($val);
            }
        }

        // Check field name 'A7monthDATE' first before field var 'x_A7monthDATE'
        $val = $CurrentForm->hasValue("A7monthDATE") ? $CurrentForm->getValue("A7monthDATE") : $CurrentForm->getValue("x_A7monthDATE");
        if (!$this->A7monthDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A7monthDATE->Visible = false; // Disable update for API request
            } else {
                $this->A7monthDATE->setFormValue($val);
            }
        }

        // Check field name 'A7monthINHOUSE' first before field var 'x_A7monthINHOUSE'
        $val = $CurrentForm->hasValue("A7monthINHOUSE") ? $CurrentForm->getValue("A7monthINHOUSE") : $CurrentForm->getValue("x_A7monthINHOUSE");
        if (!$this->A7monthINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A7monthINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->A7monthINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'A7monthREPORT' first before field var 'x_A7monthREPORT'
        $val = $CurrentForm->hasValue("A7monthREPORT") ? $CurrentForm->getValue("A7monthREPORT") : $CurrentForm->getValue("x_A7monthREPORT");
        if (!$this->A7monthREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A7monthREPORT->Visible = false; // Disable update for API request
            } else {
                $this->A7monthREPORT->setFormValue($val);
            }
        }

        // Check field name 'A9month' first before field var 'x_A9month'
        $val = $CurrentForm->hasValue("A9month") ? $CurrentForm->getValue("A9month") : $CurrentForm->getValue("x_A9month");
        if (!$this->A9month->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A9month->Visible = false; // Disable update for API request
            } else {
                $this->A9month->setFormValue($val);
            }
        }

        // Check field name 'A9monthDATE' first before field var 'x_A9monthDATE'
        $val = $CurrentForm->hasValue("A9monthDATE") ? $CurrentForm->getValue("A9monthDATE") : $CurrentForm->getValue("x_A9monthDATE");
        if (!$this->A9monthDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A9monthDATE->Visible = false; // Disable update for API request
            } else {
                $this->A9monthDATE->setFormValue($val);
            }
        }

        // Check field name 'A9monthINHOUSE' first before field var 'x_A9monthINHOUSE'
        $val = $CurrentForm->hasValue("A9monthINHOUSE") ? $CurrentForm->getValue("A9monthINHOUSE") : $CurrentForm->getValue("x_A9monthINHOUSE");
        if (!$this->A9monthINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A9monthINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->A9monthINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'A9monthREPORT' first before field var 'x_A9monthREPORT'
        $val = $CurrentForm->hasValue("A9monthREPORT") ? $CurrentForm->getValue("A9monthREPORT") : $CurrentForm->getValue("x_A9monthREPORT");
        if (!$this->A9monthREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A9monthREPORT->Visible = false; // Disable update for API request
            } else {
                $this->A9monthREPORT->setFormValue($val);
            }
        }

        // Check field name 'INJ' first before field var 'x_INJ'
        $val = $CurrentForm->hasValue("INJ") ? $CurrentForm->getValue("INJ") : $CurrentForm->getValue("x_INJ");
        if (!$this->INJ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INJ->Visible = false; // Disable update for API request
            } else {
                $this->INJ->setFormValue($val);
            }
        }

        // Check field name 'INJDATE' first before field var 'x_INJDATE'
        $val = $CurrentForm->hasValue("INJDATE") ? $CurrentForm->getValue("INJDATE") : $CurrentForm->getValue("x_INJDATE");
        if (!$this->INJDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INJDATE->Visible = false; // Disable update for API request
            } else {
                $this->INJDATE->setFormValue($val);
            }
        }

        // Check field name 'INJINHOUSE' first before field var 'x_INJINHOUSE'
        $val = $CurrentForm->hasValue("INJINHOUSE") ? $CurrentForm->getValue("INJINHOUSE") : $CurrentForm->getValue("x_INJINHOUSE");
        if (!$this->INJINHOUSE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INJINHOUSE->Visible = false; // Disable update for API request
            } else {
                $this->INJINHOUSE->setFormValue($val);
            }
        }

        // Check field name 'INJREPORT' first before field var 'x_INJREPORT'
        $val = $CurrentForm->hasValue("INJREPORT") ? $CurrentForm->getValue("INJREPORT") : $CurrentForm->getValue("x_INJREPORT");
        if (!$this->INJREPORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INJREPORT->Visible = false; // Disable update for API request
            } else {
                $this->INJREPORT->setFormValue($val);
            }
        }

        // Check field name 'Bleeding' first before field var 'x_Bleeding'
        $val = $CurrentForm->hasValue("Bleeding") ? $CurrentForm->getValue("Bleeding") : $CurrentForm->getValue("x_Bleeding");
        if (!$this->Bleeding->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Bleeding->Visible = false; // Disable update for API request
            } else {
                $this->Bleeding->setFormValue($val);
            }
        }

        // Check field name 'Hypothyroidism' first before field var 'x_Hypothyroidism'
        $val = $CurrentForm->hasValue("Hypothyroidism") ? $CurrentForm->getValue("Hypothyroidism") : $CurrentForm->getValue("x_Hypothyroidism");
        if (!$this->Hypothyroidism->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Hypothyroidism->Visible = false; // Disable update for API request
            } else {
                $this->Hypothyroidism->setFormValue($val);
            }
        }

        // Check field name 'PICMENumber' first before field var 'x_PICMENumber'
        $val = $CurrentForm->hasValue("PICMENumber") ? $CurrentForm->getValue("PICMENumber") : $CurrentForm->getValue("x_PICMENumber");
        if (!$this->PICMENumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PICMENumber->Visible = false; // Disable update for API request
            } else {
                $this->PICMENumber->setFormValue($val);
            }
        }

        // Check field name 'Outcome' first before field var 'x_Outcome'
        $val = $CurrentForm->hasValue("Outcome") ? $CurrentForm->getValue("Outcome") : $CurrentForm->getValue("x_Outcome");
        if (!$this->Outcome->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Outcome->Visible = false; // Disable update for API request
            } else {
                $this->Outcome->setFormValue($val);
            }
        }

        // Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
        $val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
        if (!$this->DateofAdmission->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofAdmission->Visible = false; // Disable update for API request
            } else {
                $this->DateofAdmission->setFormValue($val);
            }
        }

        // Check field name 'DateodProcedure' first before field var 'x_DateodProcedure'
        $val = $CurrentForm->hasValue("DateodProcedure") ? $CurrentForm->getValue("DateodProcedure") : $CurrentForm->getValue("x_DateodProcedure");
        if (!$this->DateodProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateodProcedure->Visible = false; // Disable update for API request
            } else {
                $this->DateodProcedure->setFormValue($val);
            }
        }

        // Check field name 'Miscarriage' first before field var 'x_Miscarriage'
        $val = $CurrentForm->hasValue("Miscarriage") ? $CurrentForm->getValue("Miscarriage") : $CurrentForm->getValue("x_Miscarriage");
        if (!$this->Miscarriage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Miscarriage->Visible = false; // Disable update for API request
            } else {
                $this->Miscarriage->setFormValue($val);
            }
        }

        // Check field name 'ModeOfDelivery' first before field var 'x_ModeOfDelivery'
        $val = $CurrentForm->hasValue("ModeOfDelivery") ? $CurrentForm->getValue("ModeOfDelivery") : $CurrentForm->getValue("x_ModeOfDelivery");
        if (!$this->ModeOfDelivery->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModeOfDelivery->Visible = false; // Disable update for API request
            } else {
                $this->ModeOfDelivery->setFormValue($val);
            }
        }

        // Check field name 'ND' first before field var 'x_ND'
        $val = $CurrentForm->hasValue("ND") ? $CurrentForm->getValue("ND") : $CurrentForm->getValue("x_ND");
        if (!$this->ND->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ND->Visible = false; // Disable update for API request
            } else {
                $this->ND->setFormValue($val);
            }
        }

        // Check field name 'NDS' first before field var 'x_NDS'
        $val = $CurrentForm->hasValue("NDS") ? $CurrentForm->getValue("NDS") : $CurrentForm->getValue("x_NDS");
        if (!$this->NDS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NDS->Visible = false; // Disable update for API request
            } else {
                $this->NDS->setFormValue($val);
            }
        }

        // Check field name 'NDP' first before field var 'x_NDP'
        $val = $CurrentForm->hasValue("NDP") ? $CurrentForm->getValue("NDP") : $CurrentForm->getValue("x_NDP");
        if (!$this->NDP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NDP->Visible = false; // Disable update for API request
            } else {
                $this->NDP->setFormValue($val);
            }
        }

        // Check field name 'Vaccum' first before field var 'x_Vaccum'
        $val = $CurrentForm->hasValue("Vaccum") ? $CurrentForm->getValue("Vaccum") : $CurrentForm->getValue("x_Vaccum");
        if (!$this->Vaccum->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Vaccum->Visible = false; // Disable update for API request
            } else {
                $this->Vaccum->setFormValue($val);
            }
        }

        // Check field name 'VaccumS' first before field var 'x_VaccumS'
        $val = $CurrentForm->hasValue("VaccumS") ? $CurrentForm->getValue("VaccumS") : $CurrentForm->getValue("x_VaccumS");
        if (!$this->VaccumS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VaccumS->Visible = false; // Disable update for API request
            } else {
                $this->VaccumS->setFormValue($val);
            }
        }

        // Check field name 'VaccumP' first before field var 'x_VaccumP'
        $val = $CurrentForm->hasValue("VaccumP") ? $CurrentForm->getValue("VaccumP") : $CurrentForm->getValue("x_VaccumP");
        if (!$this->VaccumP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VaccumP->Visible = false; // Disable update for API request
            } else {
                $this->VaccumP->setFormValue($val);
            }
        }

        // Check field name 'Forceps' first before field var 'x_Forceps'
        $val = $CurrentForm->hasValue("Forceps") ? $CurrentForm->getValue("Forceps") : $CurrentForm->getValue("x_Forceps");
        if (!$this->Forceps->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Forceps->Visible = false; // Disable update for API request
            } else {
                $this->Forceps->setFormValue($val);
            }
        }

        // Check field name 'ForcepsS' first before field var 'x_ForcepsS'
        $val = $CurrentForm->hasValue("ForcepsS") ? $CurrentForm->getValue("ForcepsS") : $CurrentForm->getValue("x_ForcepsS");
        if (!$this->ForcepsS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ForcepsS->Visible = false; // Disable update for API request
            } else {
                $this->ForcepsS->setFormValue($val);
            }
        }

        // Check field name 'ForcepsP' first before field var 'x_ForcepsP'
        $val = $CurrentForm->hasValue("ForcepsP") ? $CurrentForm->getValue("ForcepsP") : $CurrentForm->getValue("x_ForcepsP");
        if (!$this->ForcepsP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ForcepsP->Visible = false; // Disable update for API request
            } else {
                $this->ForcepsP->setFormValue($val);
            }
        }

        // Check field name 'Elective' first before field var 'x_Elective'
        $val = $CurrentForm->hasValue("Elective") ? $CurrentForm->getValue("Elective") : $CurrentForm->getValue("x_Elective");
        if (!$this->Elective->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Elective->Visible = false; // Disable update for API request
            } else {
                $this->Elective->setFormValue($val);
            }
        }

        // Check field name 'ElectiveS' first before field var 'x_ElectiveS'
        $val = $CurrentForm->hasValue("ElectiveS") ? $CurrentForm->getValue("ElectiveS") : $CurrentForm->getValue("x_ElectiveS");
        if (!$this->ElectiveS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ElectiveS->Visible = false; // Disable update for API request
            } else {
                $this->ElectiveS->setFormValue($val);
            }
        }

        // Check field name 'ElectiveP' first before field var 'x_ElectiveP'
        $val = $CurrentForm->hasValue("ElectiveP") ? $CurrentForm->getValue("ElectiveP") : $CurrentForm->getValue("x_ElectiveP");
        if (!$this->ElectiveP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ElectiveP->Visible = false; // Disable update for API request
            } else {
                $this->ElectiveP->setFormValue($val);
            }
        }

        // Check field name 'Emergency' first before field var 'x_Emergency'
        $val = $CurrentForm->hasValue("Emergency") ? $CurrentForm->getValue("Emergency") : $CurrentForm->getValue("x_Emergency");
        if (!$this->Emergency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Emergency->Visible = false; // Disable update for API request
            } else {
                $this->Emergency->setFormValue($val);
            }
        }

        // Check field name 'EmergencyS' first before field var 'x_EmergencyS'
        $val = $CurrentForm->hasValue("EmergencyS") ? $CurrentForm->getValue("EmergencyS") : $CurrentForm->getValue("x_EmergencyS");
        if (!$this->EmergencyS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmergencyS->Visible = false; // Disable update for API request
            } else {
                $this->EmergencyS->setFormValue($val);
            }
        }

        // Check field name 'EmergencyP' first before field var 'x_EmergencyP'
        $val = $CurrentForm->hasValue("EmergencyP") ? $CurrentForm->getValue("EmergencyP") : $CurrentForm->getValue("x_EmergencyP");
        if (!$this->EmergencyP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmergencyP->Visible = false; // Disable update for API request
            } else {
                $this->EmergencyP->setFormValue($val);
            }
        }

        // Check field name 'Maturity' first before field var 'x_Maturity'
        $val = $CurrentForm->hasValue("Maturity") ? $CurrentForm->getValue("Maturity") : $CurrentForm->getValue("x_Maturity");
        if (!$this->Maturity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Maturity->Visible = false; // Disable update for API request
            } else {
                $this->Maturity->setFormValue($val);
            }
        }

        // Check field name 'Baby1' first before field var 'x_Baby1'
        $val = $CurrentForm->hasValue("Baby1") ? $CurrentForm->getValue("Baby1") : $CurrentForm->getValue("x_Baby1");
        if (!$this->Baby1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Baby1->Visible = false; // Disable update for API request
            } else {
                $this->Baby1->setFormValue($val);
            }
        }

        // Check field name 'Baby2' first before field var 'x_Baby2'
        $val = $CurrentForm->hasValue("Baby2") ? $CurrentForm->getValue("Baby2") : $CurrentForm->getValue("x_Baby2");
        if (!$this->Baby2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Baby2->Visible = false; // Disable update for API request
            } else {
                $this->Baby2->setFormValue($val);
            }
        }

        // Check field name 'sex1' first before field var 'x_sex1'
        $val = $CurrentForm->hasValue("sex1") ? $CurrentForm->getValue("sex1") : $CurrentForm->getValue("x_sex1");
        if (!$this->sex1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sex1->Visible = false; // Disable update for API request
            } else {
                $this->sex1->setFormValue($val);
            }
        }

        // Check field name 'sex2' first before field var 'x_sex2'
        $val = $CurrentForm->hasValue("sex2") ? $CurrentForm->getValue("sex2") : $CurrentForm->getValue("x_sex2");
        if (!$this->sex2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sex2->Visible = false; // Disable update for API request
            } else {
                $this->sex2->setFormValue($val);
            }
        }

        // Check field name 'weight1' first before field var 'x_weight1'
        $val = $CurrentForm->hasValue("weight1") ? $CurrentForm->getValue("weight1") : $CurrentForm->getValue("x_weight1");
        if (!$this->weight1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->weight1->Visible = false; // Disable update for API request
            } else {
                $this->weight1->setFormValue($val);
            }
        }

        // Check field name 'weight2' first before field var 'x_weight2'
        $val = $CurrentForm->hasValue("weight2") ? $CurrentForm->getValue("weight2") : $CurrentForm->getValue("x_weight2");
        if (!$this->weight2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->weight2->Visible = false; // Disable update for API request
            } else {
                $this->weight2->setFormValue($val);
            }
        }

        // Check field name 'NICU1' first before field var 'x_NICU1'
        $val = $CurrentForm->hasValue("NICU1") ? $CurrentForm->getValue("NICU1") : $CurrentForm->getValue("x_NICU1");
        if (!$this->NICU1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NICU1->Visible = false; // Disable update for API request
            } else {
                $this->NICU1->setFormValue($val);
            }
        }

        // Check field name 'NICU2' first before field var 'x_NICU2'
        $val = $CurrentForm->hasValue("NICU2") ? $CurrentForm->getValue("NICU2") : $CurrentForm->getValue("x_NICU2");
        if (!$this->NICU2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NICU2->Visible = false; // Disable update for API request
            } else {
                $this->NICU2->setFormValue($val);
            }
        }

        // Check field name 'Jaundice1' first before field var 'x_Jaundice1'
        $val = $CurrentForm->hasValue("Jaundice1") ? $CurrentForm->getValue("Jaundice1") : $CurrentForm->getValue("x_Jaundice1");
        if (!$this->Jaundice1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Jaundice1->Visible = false; // Disable update for API request
            } else {
                $this->Jaundice1->setFormValue($val);
            }
        }

        // Check field name 'Jaundice2' first before field var 'x_Jaundice2'
        $val = $CurrentForm->hasValue("Jaundice2") ? $CurrentForm->getValue("Jaundice2") : $CurrentForm->getValue("x_Jaundice2");
        if (!$this->Jaundice2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Jaundice2->Visible = false; // Disable update for API request
            } else {
                $this->Jaundice2->setFormValue($val);
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

        // Check field name 'SpillOverReasons' first before field var 'x_SpillOverReasons'
        $val = $CurrentForm->hasValue("SpillOverReasons") ? $CurrentForm->getValue("SpillOverReasons") : $CurrentForm->getValue("x_SpillOverReasons");
        if (!$this->SpillOverReasons->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SpillOverReasons->Visible = false; // Disable update for API request
            } else {
                $this->SpillOverReasons->setFormValue($val);
            }
        }

        // Check field name 'ANClosed' first before field var 'x_ANClosed'
        $val = $CurrentForm->hasValue("ANClosed") ? $CurrentForm->getValue("ANClosed") : $CurrentForm->getValue("x_ANClosed");
        if (!$this->ANClosed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANClosed->Visible = false; // Disable update for API request
            } else {
                $this->ANClosed->setFormValue($val);
            }
        }

        // Check field name 'ANClosedDATE' first before field var 'x_ANClosedDATE'
        $val = $CurrentForm->hasValue("ANClosedDATE") ? $CurrentForm->getValue("ANClosedDATE") : $CurrentForm->getValue("x_ANClosedDATE");
        if (!$this->ANClosedDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ANClosedDATE->Visible = false; // Disable update for API request
            } else {
                $this->ANClosedDATE->setFormValue($val);
            }
        }

        // Check field name 'PastMedicalHistoryOthers' first before field var 'x_PastMedicalHistoryOthers'
        $val = $CurrentForm->hasValue("PastMedicalHistoryOthers") ? $CurrentForm->getValue("PastMedicalHistoryOthers") : $CurrentForm->getValue("x_PastMedicalHistoryOthers");
        if (!$this->PastMedicalHistoryOthers->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastMedicalHistoryOthers->Visible = false; // Disable update for API request
            } else {
                $this->PastMedicalHistoryOthers->setFormValue($val);
            }
        }

        // Check field name 'PastSurgicalHistoryOthers' first before field var 'x_PastSurgicalHistoryOthers'
        $val = $CurrentForm->hasValue("PastSurgicalHistoryOthers") ? $CurrentForm->getValue("PastSurgicalHistoryOthers") : $CurrentForm->getValue("x_PastSurgicalHistoryOthers");
        if (!$this->PastSurgicalHistoryOthers->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastSurgicalHistoryOthers->Visible = false; // Disable update for API request
            } else {
                $this->PastSurgicalHistoryOthers->setFormValue($val);
            }
        }

        // Check field name 'FamilyHistoryOthers' first before field var 'x_FamilyHistoryOthers'
        $val = $CurrentForm->hasValue("FamilyHistoryOthers") ? $CurrentForm->getValue("FamilyHistoryOthers") : $CurrentForm->getValue("x_FamilyHistoryOthers");
        if (!$this->FamilyHistoryOthers->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FamilyHistoryOthers->Visible = false; // Disable update for API request
            } else {
                $this->FamilyHistoryOthers->setFormValue($val);
            }
        }

        // Check field name 'PresentPregnancyComplicationsOthers' first before field var 'x_PresentPregnancyComplicationsOthers'
        $val = $CurrentForm->hasValue("PresentPregnancyComplicationsOthers") ? $CurrentForm->getValue("PresentPregnancyComplicationsOthers") : $CurrentForm->getValue("x_PresentPregnancyComplicationsOthers");
        if (!$this->PresentPregnancyComplicationsOthers->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PresentPregnancyComplicationsOthers->Visible = false; // Disable update for API request
            } else {
                $this->PresentPregnancyComplicationsOthers->setFormValue($val);
            }
        }

        // Check field name 'ETdate' first before field var 'x_ETdate'
        $val = $CurrentForm->hasValue("ETdate") ? $CurrentForm->getValue("ETdate") : $CurrentForm->getValue("x_ETdate");
        if (!$this->ETdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETdate->Visible = false; // Disable update for API request
            } else {
                $this->ETdate->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->pid->CurrentValue = $this->pid->FormValue;
        $this->fid->CurrentValue = $this->fid->FormValue;
        $this->G->CurrentValue = $this->G->FormValue;
        $this->P->CurrentValue = $this->P->FormValue;
        $this->L->CurrentValue = $this->L->FormValue;
        $this->A->CurrentValue = $this->A->FormValue;
        $this->E->CurrentValue = $this->E->FormValue;
        $this->M->CurrentValue = $this->M->FormValue;
        $this->LMP->CurrentValue = $this->LMP->FormValue;
        $this->EDO->CurrentValue = $this->EDO->FormValue;
        $this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
        $this->MaritalHistory->CurrentValue = $this->MaritalHistory->FormValue;
        $this->ObstetricHistory->CurrentValue = $this->ObstetricHistory->FormValue;
        $this->PreviousHistoryofGDM->CurrentValue = $this->PreviousHistoryofGDM->FormValue;
        $this->PreviousHistorofPIH->CurrentValue = $this->PreviousHistorofPIH->FormValue;
        $this->PreviousHistoryofIUGR->CurrentValue = $this->PreviousHistoryofIUGR->FormValue;
        $this->PreviousHistoryofOligohydramnios->CurrentValue = $this->PreviousHistoryofOligohydramnios->FormValue;
        $this->PreviousHistoryofPreterm->CurrentValue = $this->PreviousHistoryofPreterm->FormValue;
        $this->G1->CurrentValue = $this->G1->FormValue;
        $this->G2->CurrentValue = $this->G2->FormValue;
        $this->G3->CurrentValue = $this->G3->FormValue;
        $this->DeliveryNDLSCS1->CurrentValue = $this->DeliveryNDLSCS1->FormValue;
        $this->DeliveryNDLSCS2->CurrentValue = $this->DeliveryNDLSCS2->FormValue;
        $this->DeliveryNDLSCS3->CurrentValue = $this->DeliveryNDLSCS3->FormValue;
        $this->BabySexweight1->CurrentValue = $this->BabySexweight1->FormValue;
        $this->BabySexweight2->CurrentValue = $this->BabySexweight2->FormValue;
        $this->BabySexweight3->CurrentValue = $this->BabySexweight3->FormValue;
        $this->PastMedicalHistory->CurrentValue = $this->PastMedicalHistory->FormValue;
        $this->PastSurgicalHistory->CurrentValue = $this->PastSurgicalHistory->FormValue;
        $this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
        $this->Viability->CurrentValue = $this->Viability->FormValue;
        $this->ViabilityDATE->CurrentValue = $this->ViabilityDATE->FormValue;
        $this->ViabilityREPORT->CurrentValue = $this->ViabilityREPORT->FormValue;
        $this->Viability2->CurrentValue = $this->Viability2->FormValue;
        $this->Viability2DATE->CurrentValue = $this->Viability2DATE->FormValue;
        $this->Viability2REPORT->CurrentValue = $this->Viability2REPORT->FormValue;
        $this->NTscan->CurrentValue = $this->NTscan->FormValue;
        $this->NTscanDATE->CurrentValue = $this->NTscanDATE->FormValue;
        $this->NTscanREPORT->CurrentValue = $this->NTscanREPORT->FormValue;
        $this->EarlyTarget->CurrentValue = $this->EarlyTarget->FormValue;
        $this->EarlyTargetDATE->CurrentValue = $this->EarlyTargetDATE->FormValue;
        $this->EarlyTargetREPORT->CurrentValue = $this->EarlyTargetREPORT->FormValue;
        $this->Anomaly->CurrentValue = $this->Anomaly->FormValue;
        $this->AnomalyDATE->CurrentValue = $this->AnomalyDATE->FormValue;
        $this->AnomalyREPORT->CurrentValue = $this->AnomalyREPORT->FormValue;
        $this->Growth->CurrentValue = $this->Growth->FormValue;
        $this->GrowthDATE->CurrentValue = $this->GrowthDATE->FormValue;
        $this->GrowthREPORT->CurrentValue = $this->GrowthREPORT->FormValue;
        $this->Growth1->CurrentValue = $this->Growth1->FormValue;
        $this->Growth1DATE->CurrentValue = $this->Growth1DATE->FormValue;
        $this->Growth1REPORT->CurrentValue = $this->Growth1REPORT->FormValue;
        $this->ANProfile->CurrentValue = $this->ANProfile->FormValue;
        $this->ANProfileDATE->CurrentValue = $this->ANProfileDATE->FormValue;
        $this->ANProfileINHOUSE->CurrentValue = $this->ANProfileINHOUSE->FormValue;
        $this->ANProfileREPORT->CurrentValue = $this->ANProfileREPORT->FormValue;
        $this->DualMarker->CurrentValue = $this->DualMarker->FormValue;
        $this->DualMarkerDATE->CurrentValue = $this->DualMarkerDATE->FormValue;
        $this->DualMarkerINHOUSE->CurrentValue = $this->DualMarkerINHOUSE->FormValue;
        $this->DualMarkerREPORT->CurrentValue = $this->DualMarkerREPORT->FormValue;
        $this->Quadruple->CurrentValue = $this->Quadruple->FormValue;
        $this->QuadrupleDATE->CurrentValue = $this->QuadrupleDATE->FormValue;
        $this->QuadrupleINHOUSE->CurrentValue = $this->QuadrupleINHOUSE->FormValue;
        $this->QuadrupleREPORT->CurrentValue = $this->QuadrupleREPORT->FormValue;
        $this->A5month->CurrentValue = $this->A5month->FormValue;
        $this->A5monthDATE->CurrentValue = $this->A5monthDATE->FormValue;
        $this->A5monthINHOUSE->CurrentValue = $this->A5monthINHOUSE->FormValue;
        $this->A5monthREPORT->CurrentValue = $this->A5monthREPORT->FormValue;
        $this->A7month->CurrentValue = $this->A7month->FormValue;
        $this->A7monthDATE->CurrentValue = $this->A7monthDATE->FormValue;
        $this->A7monthINHOUSE->CurrentValue = $this->A7monthINHOUSE->FormValue;
        $this->A7monthREPORT->CurrentValue = $this->A7monthREPORT->FormValue;
        $this->A9month->CurrentValue = $this->A9month->FormValue;
        $this->A9monthDATE->CurrentValue = $this->A9monthDATE->FormValue;
        $this->A9monthINHOUSE->CurrentValue = $this->A9monthINHOUSE->FormValue;
        $this->A9monthREPORT->CurrentValue = $this->A9monthREPORT->FormValue;
        $this->INJ->CurrentValue = $this->INJ->FormValue;
        $this->INJDATE->CurrentValue = $this->INJDATE->FormValue;
        $this->INJINHOUSE->CurrentValue = $this->INJINHOUSE->FormValue;
        $this->INJREPORT->CurrentValue = $this->INJREPORT->FormValue;
        $this->Bleeding->CurrentValue = $this->Bleeding->FormValue;
        $this->Hypothyroidism->CurrentValue = $this->Hypothyroidism->FormValue;
        $this->PICMENumber->CurrentValue = $this->PICMENumber->FormValue;
        $this->Outcome->CurrentValue = $this->Outcome->FormValue;
        $this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
        $this->DateodProcedure->CurrentValue = $this->DateodProcedure->FormValue;
        $this->Miscarriage->CurrentValue = $this->Miscarriage->FormValue;
        $this->ModeOfDelivery->CurrentValue = $this->ModeOfDelivery->FormValue;
        $this->ND->CurrentValue = $this->ND->FormValue;
        $this->NDS->CurrentValue = $this->NDS->FormValue;
        $this->NDP->CurrentValue = $this->NDP->FormValue;
        $this->Vaccum->CurrentValue = $this->Vaccum->FormValue;
        $this->VaccumS->CurrentValue = $this->VaccumS->FormValue;
        $this->VaccumP->CurrentValue = $this->VaccumP->FormValue;
        $this->Forceps->CurrentValue = $this->Forceps->FormValue;
        $this->ForcepsS->CurrentValue = $this->ForcepsS->FormValue;
        $this->ForcepsP->CurrentValue = $this->ForcepsP->FormValue;
        $this->Elective->CurrentValue = $this->Elective->FormValue;
        $this->ElectiveS->CurrentValue = $this->ElectiveS->FormValue;
        $this->ElectiveP->CurrentValue = $this->ElectiveP->FormValue;
        $this->Emergency->CurrentValue = $this->Emergency->FormValue;
        $this->EmergencyS->CurrentValue = $this->EmergencyS->FormValue;
        $this->EmergencyP->CurrentValue = $this->EmergencyP->FormValue;
        $this->Maturity->CurrentValue = $this->Maturity->FormValue;
        $this->Baby1->CurrentValue = $this->Baby1->FormValue;
        $this->Baby2->CurrentValue = $this->Baby2->FormValue;
        $this->sex1->CurrentValue = $this->sex1->FormValue;
        $this->sex2->CurrentValue = $this->sex2->FormValue;
        $this->weight1->CurrentValue = $this->weight1->FormValue;
        $this->weight2->CurrentValue = $this->weight2->FormValue;
        $this->NICU1->CurrentValue = $this->NICU1->FormValue;
        $this->NICU2->CurrentValue = $this->NICU2->FormValue;
        $this->Jaundice1->CurrentValue = $this->Jaundice1->FormValue;
        $this->Jaundice2->CurrentValue = $this->Jaundice2->FormValue;
        $this->Others1->CurrentValue = $this->Others1->FormValue;
        $this->Others2->CurrentValue = $this->Others2->FormValue;
        $this->SpillOverReasons->CurrentValue = $this->SpillOverReasons->FormValue;
        $this->ANClosed->CurrentValue = $this->ANClosed->FormValue;
        $this->ANClosedDATE->CurrentValue = $this->ANClosedDATE->FormValue;
        $this->PastMedicalHistoryOthers->CurrentValue = $this->PastMedicalHistoryOthers->FormValue;
        $this->PastSurgicalHistoryOthers->CurrentValue = $this->PastSurgicalHistoryOthers->FormValue;
        $this->FamilyHistoryOthers->CurrentValue = $this->FamilyHistoryOthers->FormValue;
        $this->PresentPregnancyComplicationsOthers->CurrentValue = $this->PresentPregnancyComplicationsOthers->FormValue;
        $this->ETdate->CurrentValue = $this->ETdate->FormValue;
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
        $this->pid->setDbValue($row['pid']);
        $this->fid->setDbValue($row['fid']);
        $this->G->setDbValue($row['G']);
        $this->P->setDbValue($row['P']);
        $this->L->setDbValue($row['L']);
        $this->A->setDbValue($row['A']);
        $this->E->setDbValue($row['E']);
        $this->M->setDbValue($row['M']);
        $this->LMP->setDbValue($row['LMP']);
        $this->EDO->setDbValue($row['EDO']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->MaritalHistory->setDbValue($row['MaritalHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->PreviousHistoryofGDM->setDbValue($row['PreviousHistoryofGDM']);
        $this->PreviousHistorofPIH->setDbValue($row['PreviousHistorofPIH']);
        $this->PreviousHistoryofIUGR->setDbValue($row['PreviousHistoryofIUGR']);
        $this->PreviousHistoryofOligohydramnios->setDbValue($row['PreviousHistoryofOligohydramnios']);
        $this->PreviousHistoryofPreterm->setDbValue($row['PreviousHistoryofPreterm']);
        $this->G1->setDbValue($row['G1']);
        $this->G2->setDbValue($row['G2']);
        $this->G3->setDbValue($row['G3']);
        $this->DeliveryNDLSCS1->setDbValue($row['DeliveryNDLSCS1']);
        $this->DeliveryNDLSCS2->setDbValue($row['DeliveryNDLSCS2']);
        $this->DeliveryNDLSCS3->setDbValue($row['DeliveryNDLSCS3']);
        $this->BabySexweight1->setDbValue($row['BabySexweight1']);
        $this->BabySexweight2->setDbValue($row['BabySexweight2']);
        $this->BabySexweight3->setDbValue($row['BabySexweight3']);
        $this->PastMedicalHistory->setDbValue($row['PastMedicalHistory']);
        $this->PastSurgicalHistory->setDbValue($row['PastSurgicalHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Viability->setDbValue($row['Viability']);
        $this->ViabilityDATE->setDbValue($row['ViabilityDATE']);
        $this->ViabilityREPORT->setDbValue($row['ViabilityREPORT']);
        $this->Viability2->setDbValue($row['Viability2']);
        $this->Viability2DATE->setDbValue($row['Viability2DATE']);
        $this->Viability2REPORT->setDbValue($row['Viability2REPORT']);
        $this->NTscan->setDbValue($row['NTscan']);
        $this->NTscanDATE->setDbValue($row['NTscanDATE']);
        $this->NTscanREPORT->setDbValue($row['NTscanREPORT']);
        $this->EarlyTarget->setDbValue($row['EarlyTarget']);
        $this->EarlyTargetDATE->setDbValue($row['EarlyTargetDATE']);
        $this->EarlyTargetREPORT->setDbValue($row['EarlyTargetREPORT']);
        $this->Anomaly->setDbValue($row['Anomaly']);
        $this->AnomalyDATE->setDbValue($row['AnomalyDATE']);
        $this->AnomalyREPORT->setDbValue($row['AnomalyREPORT']);
        $this->Growth->setDbValue($row['Growth']);
        $this->GrowthDATE->setDbValue($row['GrowthDATE']);
        $this->GrowthREPORT->setDbValue($row['GrowthREPORT']);
        $this->Growth1->setDbValue($row['Growth1']);
        $this->Growth1DATE->setDbValue($row['Growth1DATE']);
        $this->Growth1REPORT->setDbValue($row['Growth1REPORT']);
        $this->ANProfile->setDbValue($row['ANProfile']);
        $this->ANProfileDATE->setDbValue($row['ANProfileDATE']);
        $this->ANProfileINHOUSE->setDbValue($row['ANProfileINHOUSE']);
        $this->ANProfileREPORT->setDbValue($row['ANProfileREPORT']);
        $this->DualMarker->setDbValue($row['DualMarker']);
        $this->DualMarkerDATE->setDbValue($row['DualMarkerDATE']);
        $this->DualMarkerINHOUSE->setDbValue($row['DualMarkerINHOUSE']);
        $this->DualMarkerREPORT->setDbValue($row['DualMarkerREPORT']);
        $this->Quadruple->setDbValue($row['Quadruple']);
        $this->QuadrupleDATE->setDbValue($row['QuadrupleDATE']);
        $this->QuadrupleINHOUSE->setDbValue($row['QuadrupleINHOUSE']);
        $this->QuadrupleREPORT->setDbValue($row['QuadrupleREPORT']);
        $this->A5month->setDbValue($row['A5month']);
        $this->A5monthDATE->setDbValue($row['A5monthDATE']);
        $this->A5monthINHOUSE->setDbValue($row['A5monthINHOUSE']);
        $this->A5monthREPORT->setDbValue($row['A5monthREPORT']);
        $this->A7month->setDbValue($row['A7month']);
        $this->A7monthDATE->setDbValue($row['A7monthDATE']);
        $this->A7monthINHOUSE->setDbValue($row['A7monthINHOUSE']);
        $this->A7monthREPORT->setDbValue($row['A7monthREPORT']);
        $this->A9month->setDbValue($row['A9month']);
        $this->A9monthDATE->setDbValue($row['A9monthDATE']);
        $this->A9monthINHOUSE->setDbValue($row['A9monthINHOUSE']);
        $this->A9monthREPORT->setDbValue($row['A9monthREPORT']);
        $this->INJ->setDbValue($row['INJ']);
        $this->INJDATE->setDbValue($row['INJDATE']);
        $this->INJINHOUSE->setDbValue($row['INJINHOUSE']);
        $this->INJREPORT->setDbValue($row['INJREPORT']);
        $this->Bleeding->setDbValue($row['Bleeding']);
        $this->Hypothyroidism->setDbValue($row['Hypothyroidism']);
        $this->PICMENumber->setDbValue($row['PICMENumber']);
        $this->Outcome->setDbValue($row['Outcome']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateodProcedure->setDbValue($row['DateodProcedure']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->ModeOfDelivery->setDbValue($row['ModeOfDelivery']);
        $this->ND->setDbValue($row['ND']);
        $this->NDS->setDbValue($row['NDS']);
        $this->NDP->setDbValue($row['NDP']);
        $this->Vaccum->setDbValue($row['Vaccum']);
        $this->VaccumS->setDbValue($row['VaccumS']);
        $this->VaccumP->setDbValue($row['VaccumP']);
        $this->Forceps->setDbValue($row['Forceps']);
        $this->ForcepsS->setDbValue($row['ForcepsS']);
        $this->ForcepsP->setDbValue($row['ForcepsP']);
        $this->Elective->setDbValue($row['Elective']);
        $this->ElectiveS->setDbValue($row['ElectiveS']);
        $this->ElectiveP->setDbValue($row['ElectiveP']);
        $this->Emergency->setDbValue($row['Emergency']);
        $this->EmergencyS->setDbValue($row['EmergencyS']);
        $this->EmergencyP->setDbValue($row['EmergencyP']);
        $this->Maturity->setDbValue($row['Maturity']);
        $this->Baby1->setDbValue($row['Baby1']);
        $this->Baby2->setDbValue($row['Baby2']);
        $this->sex1->setDbValue($row['sex1']);
        $this->sex2->setDbValue($row['sex2']);
        $this->weight1->setDbValue($row['weight1']);
        $this->weight2->setDbValue($row['weight2']);
        $this->NICU1->setDbValue($row['NICU1']);
        $this->NICU2->setDbValue($row['NICU2']);
        $this->Jaundice1->setDbValue($row['Jaundice1']);
        $this->Jaundice2->setDbValue($row['Jaundice2']);
        $this->Others1->setDbValue($row['Others1']);
        $this->Others2->setDbValue($row['Others2']);
        $this->SpillOverReasons->setDbValue($row['SpillOverReasons']);
        $this->ANClosed->setDbValue($row['ANClosed']);
        $this->ANClosedDATE->setDbValue($row['ANClosedDATE']);
        $this->PastMedicalHistoryOthers->setDbValue($row['PastMedicalHistoryOthers']);
        $this->PastSurgicalHistoryOthers->setDbValue($row['PastSurgicalHistoryOthers']);
        $this->FamilyHistoryOthers->setDbValue($row['FamilyHistoryOthers']);
        $this->PresentPregnancyComplicationsOthers->setDbValue($row['PresentPregnancyComplicationsOthers']);
        $this->ETdate->setDbValue($row['ETdate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['pid'] = null;
        $row['fid'] = null;
        $row['G'] = null;
        $row['P'] = null;
        $row['L'] = null;
        $row['A'] = null;
        $row['E'] = null;
        $row['M'] = null;
        $row['LMP'] = null;
        $row['EDO'] = null;
        $row['MenstrualHistory'] = null;
        $row['MaritalHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['PreviousHistoryofGDM'] = null;
        $row['PreviousHistorofPIH'] = null;
        $row['PreviousHistoryofIUGR'] = null;
        $row['PreviousHistoryofOligohydramnios'] = null;
        $row['PreviousHistoryofPreterm'] = null;
        $row['G1'] = null;
        $row['G2'] = null;
        $row['G3'] = null;
        $row['DeliveryNDLSCS1'] = null;
        $row['DeliveryNDLSCS2'] = null;
        $row['DeliveryNDLSCS3'] = null;
        $row['BabySexweight1'] = null;
        $row['BabySexweight2'] = null;
        $row['BabySexweight3'] = null;
        $row['PastMedicalHistory'] = null;
        $row['PastSurgicalHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Viability'] = null;
        $row['ViabilityDATE'] = null;
        $row['ViabilityREPORT'] = null;
        $row['Viability2'] = null;
        $row['Viability2DATE'] = null;
        $row['Viability2REPORT'] = null;
        $row['NTscan'] = null;
        $row['NTscanDATE'] = null;
        $row['NTscanREPORT'] = null;
        $row['EarlyTarget'] = null;
        $row['EarlyTargetDATE'] = null;
        $row['EarlyTargetREPORT'] = null;
        $row['Anomaly'] = null;
        $row['AnomalyDATE'] = null;
        $row['AnomalyREPORT'] = null;
        $row['Growth'] = null;
        $row['GrowthDATE'] = null;
        $row['GrowthREPORT'] = null;
        $row['Growth1'] = null;
        $row['Growth1DATE'] = null;
        $row['Growth1REPORT'] = null;
        $row['ANProfile'] = null;
        $row['ANProfileDATE'] = null;
        $row['ANProfileINHOUSE'] = null;
        $row['ANProfileREPORT'] = null;
        $row['DualMarker'] = null;
        $row['DualMarkerDATE'] = null;
        $row['DualMarkerINHOUSE'] = null;
        $row['DualMarkerREPORT'] = null;
        $row['Quadruple'] = null;
        $row['QuadrupleDATE'] = null;
        $row['QuadrupleINHOUSE'] = null;
        $row['QuadrupleREPORT'] = null;
        $row['A5month'] = null;
        $row['A5monthDATE'] = null;
        $row['A5monthINHOUSE'] = null;
        $row['A5monthREPORT'] = null;
        $row['A7month'] = null;
        $row['A7monthDATE'] = null;
        $row['A7monthINHOUSE'] = null;
        $row['A7monthREPORT'] = null;
        $row['A9month'] = null;
        $row['A9monthDATE'] = null;
        $row['A9monthINHOUSE'] = null;
        $row['A9monthREPORT'] = null;
        $row['INJ'] = null;
        $row['INJDATE'] = null;
        $row['INJINHOUSE'] = null;
        $row['INJREPORT'] = null;
        $row['Bleeding'] = null;
        $row['Hypothyroidism'] = null;
        $row['PICMENumber'] = null;
        $row['Outcome'] = null;
        $row['DateofAdmission'] = null;
        $row['DateodProcedure'] = null;
        $row['Miscarriage'] = null;
        $row['ModeOfDelivery'] = null;
        $row['ND'] = null;
        $row['NDS'] = null;
        $row['NDP'] = null;
        $row['Vaccum'] = null;
        $row['VaccumS'] = null;
        $row['VaccumP'] = null;
        $row['Forceps'] = null;
        $row['ForcepsS'] = null;
        $row['ForcepsP'] = null;
        $row['Elective'] = null;
        $row['ElectiveS'] = null;
        $row['ElectiveP'] = null;
        $row['Emergency'] = null;
        $row['EmergencyS'] = null;
        $row['EmergencyP'] = null;
        $row['Maturity'] = null;
        $row['Baby1'] = null;
        $row['Baby2'] = null;
        $row['sex1'] = null;
        $row['sex2'] = null;
        $row['weight1'] = null;
        $row['weight2'] = null;
        $row['NICU1'] = null;
        $row['NICU2'] = null;
        $row['Jaundice1'] = null;
        $row['Jaundice2'] = null;
        $row['Others1'] = null;
        $row['Others2'] = null;
        $row['SpillOverReasons'] = null;
        $row['ANClosed'] = null;
        $row['ANClosedDATE'] = null;
        $row['PastMedicalHistoryOthers'] = null;
        $row['PastSurgicalHistoryOthers'] = null;
        $row['FamilyHistoryOthers'] = null;
        $row['PresentPregnancyComplicationsOthers'] = null;
        $row['ETdate'] = null;
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

        // pid

        // fid

        // G

        // P

        // L

        // A

        // E

        // M

        // LMP

        // EDO

        // MenstrualHistory

        // MaritalHistory

        // ObstetricHistory

        // PreviousHistoryofGDM

        // PreviousHistorofPIH

        // PreviousHistoryofIUGR

        // PreviousHistoryofOligohydramnios

        // PreviousHistoryofPreterm

        // G1

        // G2

        // G3

        // DeliveryNDLSCS1

        // DeliveryNDLSCS2

        // DeliveryNDLSCS3

        // BabySexweight1

        // BabySexweight2

        // BabySexweight3

        // PastMedicalHistory

        // PastSurgicalHistory

        // FamilyHistory

        // Viability

        // ViabilityDATE

        // ViabilityREPORT

        // Viability2

        // Viability2DATE

        // Viability2REPORT

        // NTscan

        // NTscanDATE

        // NTscanREPORT

        // EarlyTarget

        // EarlyTargetDATE

        // EarlyTargetREPORT

        // Anomaly

        // AnomalyDATE

        // AnomalyREPORT

        // Growth

        // GrowthDATE

        // GrowthREPORT

        // Growth1

        // Growth1DATE

        // Growth1REPORT

        // ANProfile

        // ANProfileDATE

        // ANProfileINHOUSE

        // ANProfileREPORT

        // DualMarker

        // DualMarkerDATE

        // DualMarkerINHOUSE

        // DualMarkerREPORT

        // Quadruple

        // QuadrupleDATE

        // QuadrupleINHOUSE

        // QuadrupleREPORT

        // A5month

        // A5monthDATE

        // A5monthINHOUSE

        // A5monthREPORT

        // A7month

        // A7monthDATE

        // A7monthINHOUSE

        // A7monthREPORT

        // A9month

        // A9monthDATE

        // A9monthINHOUSE

        // A9monthREPORT

        // INJ

        // INJDATE

        // INJINHOUSE

        // INJREPORT

        // Bleeding

        // Hypothyroidism

        // PICMENumber

        // Outcome

        // DateofAdmission

        // DateodProcedure

        // Miscarriage

        // ModeOfDelivery

        // ND

        // NDS

        // NDP

        // Vaccum

        // VaccumS

        // VaccumP

        // Forceps

        // ForcepsS

        // ForcepsP

        // Elective

        // ElectiveS

        // ElectiveP

        // Emergency

        // EmergencyS

        // EmergencyP

        // Maturity

        // Baby1

        // Baby2

        // sex1

        // sex2

        // weight1

        // weight2

        // NICU1

        // NICU2

        // Jaundice1

        // Jaundice2

        // Others1

        // Others2

        // SpillOverReasons

        // ANClosed

        // ANClosedDATE

        // PastMedicalHistoryOthers

        // PastSurgicalHistoryOthers

        // FamilyHistoryOthers

        // PresentPregnancyComplicationsOthers

        // ETdate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pid
            $this->pid->ViewValue = $this->pid->CurrentValue;
            $this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
            $this->pid->ViewCustomAttributes = "";

            // fid
            $this->fid->ViewValue = $this->fid->CurrentValue;
            $this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
            $this->fid->ViewCustomAttributes = "";

            // G
            $this->G->ViewValue = $this->G->CurrentValue;
            $this->G->ViewCustomAttributes = "";

            // P
            $this->P->ViewValue = $this->P->CurrentValue;
            $this->P->ViewCustomAttributes = "";

            // L
            $this->L->ViewValue = $this->L->CurrentValue;
            $this->L->ViewCustomAttributes = "";

            // A
            $this->A->ViewValue = $this->A->CurrentValue;
            $this->A->ViewCustomAttributes = "";

            // E
            $this->E->ViewValue = $this->E->CurrentValue;
            $this->E->ViewCustomAttributes = "";

            // M
            $this->M->ViewValue = $this->M->CurrentValue;
            $this->M->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewCustomAttributes = "";

            // EDO
            $this->EDO->ViewValue = $this->EDO->CurrentValue;
            $this->EDO->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // MaritalHistory
            $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
            $this->MaritalHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->ViewValue = $this->PreviousHistoryofGDM->CurrentValue;
            $this->PreviousHistoryofGDM->ViewCustomAttributes = "";

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->CurrentValue;
            $this->PreviousHistorofPIH->ViewCustomAttributes = "";

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->CurrentValue;
            $this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->CurrentValue;
            $this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->CurrentValue;
            $this->PreviousHistoryofPreterm->ViewCustomAttributes = "";

            // G1
            $this->G1->ViewValue = $this->G1->CurrentValue;
            $this->G1->ViewCustomAttributes = "";

            // G2
            $this->G2->ViewValue = $this->G2->CurrentValue;
            $this->G2->ViewCustomAttributes = "";

            // G3
            $this->G3->ViewValue = $this->G3->CurrentValue;
            $this->G3->ViewCustomAttributes = "";

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->ViewValue = $this->DeliveryNDLSCS1->CurrentValue;
            $this->DeliveryNDLSCS1->ViewCustomAttributes = "";

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->ViewValue = $this->DeliveryNDLSCS2->CurrentValue;
            $this->DeliveryNDLSCS2->ViewCustomAttributes = "";

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->ViewValue = $this->DeliveryNDLSCS3->CurrentValue;
            $this->DeliveryNDLSCS3->ViewCustomAttributes = "";

            // BabySexweight1
            $this->BabySexweight1->ViewValue = $this->BabySexweight1->CurrentValue;
            $this->BabySexweight1->ViewCustomAttributes = "";

            // BabySexweight2
            $this->BabySexweight2->ViewValue = $this->BabySexweight2->CurrentValue;
            $this->BabySexweight2->ViewCustomAttributes = "";

            // BabySexweight3
            $this->BabySexweight3->ViewValue = $this->BabySexweight3->CurrentValue;
            $this->BabySexweight3->ViewCustomAttributes = "";

            // PastMedicalHistory
            $this->PastMedicalHistory->ViewValue = $this->PastMedicalHistory->CurrentValue;
            $this->PastMedicalHistory->ViewCustomAttributes = "";

            // PastSurgicalHistory
            $this->PastSurgicalHistory->ViewValue = $this->PastSurgicalHistory->CurrentValue;
            $this->PastSurgicalHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Viability
            $this->Viability->ViewValue = $this->Viability->CurrentValue;
            $this->Viability->ViewCustomAttributes = "";

            // ViabilityDATE
            $this->ViabilityDATE->ViewValue = $this->ViabilityDATE->CurrentValue;
            $this->ViabilityDATE->ViewCustomAttributes = "";

            // ViabilityREPORT
            $this->ViabilityREPORT->ViewValue = $this->ViabilityREPORT->CurrentValue;
            $this->ViabilityREPORT->ViewCustomAttributes = "";

            // Viability2
            $this->Viability2->ViewValue = $this->Viability2->CurrentValue;
            $this->Viability2->ViewCustomAttributes = "";

            // Viability2DATE
            $this->Viability2DATE->ViewValue = $this->Viability2DATE->CurrentValue;
            $this->Viability2DATE->ViewCustomAttributes = "";

            // Viability2REPORT
            $this->Viability2REPORT->ViewValue = $this->Viability2REPORT->CurrentValue;
            $this->Viability2REPORT->ViewCustomAttributes = "";

            // NTscan
            $this->NTscan->ViewValue = $this->NTscan->CurrentValue;
            $this->NTscan->ViewCustomAttributes = "";

            // NTscanDATE
            $this->NTscanDATE->ViewValue = $this->NTscanDATE->CurrentValue;
            $this->NTscanDATE->ViewCustomAttributes = "";

            // NTscanREPORT
            $this->NTscanREPORT->ViewValue = $this->NTscanREPORT->CurrentValue;
            $this->NTscanREPORT->ViewCustomAttributes = "";

            // EarlyTarget
            $this->EarlyTarget->ViewValue = $this->EarlyTarget->CurrentValue;
            $this->EarlyTarget->ViewCustomAttributes = "";

            // EarlyTargetDATE
            $this->EarlyTargetDATE->ViewValue = $this->EarlyTargetDATE->CurrentValue;
            $this->EarlyTargetDATE->ViewCustomAttributes = "";

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->ViewValue = $this->EarlyTargetREPORT->CurrentValue;
            $this->EarlyTargetREPORT->ViewCustomAttributes = "";

            // Anomaly
            $this->Anomaly->ViewValue = $this->Anomaly->CurrentValue;
            $this->Anomaly->ViewCustomAttributes = "";

            // AnomalyDATE
            $this->AnomalyDATE->ViewValue = $this->AnomalyDATE->CurrentValue;
            $this->AnomalyDATE->ViewCustomAttributes = "";

            // AnomalyREPORT
            $this->AnomalyREPORT->ViewValue = $this->AnomalyREPORT->CurrentValue;
            $this->AnomalyREPORT->ViewCustomAttributes = "";

            // Growth
            $this->Growth->ViewValue = $this->Growth->CurrentValue;
            $this->Growth->ViewCustomAttributes = "";

            // GrowthDATE
            $this->GrowthDATE->ViewValue = $this->GrowthDATE->CurrentValue;
            $this->GrowthDATE->ViewCustomAttributes = "";

            // GrowthREPORT
            $this->GrowthREPORT->ViewValue = $this->GrowthREPORT->CurrentValue;
            $this->GrowthREPORT->ViewCustomAttributes = "";

            // Growth1
            $this->Growth1->ViewValue = $this->Growth1->CurrentValue;
            $this->Growth1->ViewCustomAttributes = "";

            // Growth1DATE
            $this->Growth1DATE->ViewValue = $this->Growth1DATE->CurrentValue;
            $this->Growth1DATE->ViewCustomAttributes = "";

            // Growth1REPORT
            $this->Growth1REPORT->ViewValue = $this->Growth1REPORT->CurrentValue;
            $this->Growth1REPORT->ViewCustomAttributes = "";

            // ANProfile
            $this->ANProfile->ViewValue = $this->ANProfile->CurrentValue;
            $this->ANProfile->ViewCustomAttributes = "";

            // ANProfileDATE
            $this->ANProfileDATE->ViewValue = $this->ANProfileDATE->CurrentValue;
            $this->ANProfileDATE->ViewCustomAttributes = "";

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->ViewValue = $this->ANProfileINHOUSE->CurrentValue;
            $this->ANProfileINHOUSE->ViewCustomAttributes = "";

            // ANProfileREPORT
            $this->ANProfileREPORT->ViewValue = $this->ANProfileREPORT->CurrentValue;
            $this->ANProfileREPORT->ViewCustomAttributes = "";

            // DualMarker
            $this->DualMarker->ViewValue = $this->DualMarker->CurrentValue;
            $this->DualMarker->ViewCustomAttributes = "";

            // DualMarkerDATE
            $this->DualMarkerDATE->ViewValue = $this->DualMarkerDATE->CurrentValue;
            $this->DualMarkerDATE->ViewCustomAttributes = "";

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->ViewValue = $this->DualMarkerINHOUSE->CurrentValue;
            $this->DualMarkerINHOUSE->ViewCustomAttributes = "";

            // DualMarkerREPORT
            $this->DualMarkerREPORT->ViewValue = $this->DualMarkerREPORT->CurrentValue;
            $this->DualMarkerREPORT->ViewCustomAttributes = "";

            // Quadruple
            $this->Quadruple->ViewValue = $this->Quadruple->CurrentValue;
            $this->Quadruple->ViewCustomAttributes = "";

            // QuadrupleDATE
            $this->QuadrupleDATE->ViewValue = $this->QuadrupleDATE->CurrentValue;
            $this->QuadrupleDATE->ViewCustomAttributes = "";

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->ViewValue = $this->QuadrupleINHOUSE->CurrentValue;
            $this->QuadrupleINHOUSE->ViewCustomAttributes = "";

            // QuadrupleREPORT
            $this->QuadrupleREPORT->ViewValue = $this->QuadrupleREPORT->CurrentValue;
            $this->QuadrupleREPORT->ViewCustomAttributes = "";

            // A5month
            $this->A5month->ViewValue = $this->A5month->CurrentValue;
            $this->A5month->ViewCustomAttributes = "";

            // A5monthDATE
            $this->A5monthDATE->ViewValue = $this->A5monthDATE->CurrentValue;
            $this->A5monthDATE->ViewCustomAttributes = "";

            // A5monthINHOUSE
            $this->A5monthINHOUSE->ViewValue = $this->A5monthINHOUSE->CurrentValue;
            $this->A5monthINHOUSE->ViewCustomAttributes = "";

            // A5monthREPORT
            $this->A5monthREPORT->ViewValue = $this->A5monthREPORT->CurrentValue;
            $this->A5monthREPORT->ViewCustomAttributes = "";

            // A7month
            $this->A7month->ViewValue = $this->A7month->CurrentValue;
            $this->A7month->ViewCustomAttributes = "";

            // A7monthDATE
            $this->A7monthDATE->ViewValue = $this->A7monthDATE->CurrentValue;
            $this->A7monthDATE->ViewCustomAttributes = "";

            // A7monthINHOUSE
            $this->A7monthINHOUSE->ViewValue = $this->A7monthINHOUSE->CurrentValue;
            $this->A7monthINHOUSE->ViewCustomAttributes = "";

            // A7monthREPORT
            $this->A7monthREPORT->ViewValue = $this->A7monthREPORT->CurrentValue;
            $this->A7monthREPORT->ViewCustomAttributes = "";

            // A9month
            $this->A9month->ViewValue = $this->A9month->CurrentValue;
            $this->A9month->ViewCustomAttributes = "";

            // A9monthDATE
            $this->A9monthDATE->ViewValue = $this->A9monthDATE->CurrentValue;
            $this->A9monthDATE->ViewCustomAttributes = "";

            // A9monthINHOUSE
            $this->A9monthINHOUSE->ViewValue = $this->A9monthINHOUSE->CurrentValue;
            $this->A9monthINHOUSE->ViewCustomAttributes = "";

            // A9monthREPORT
            $this->A9monthREPORT->ViewValue = $this->A9monthREPORT->CurrentValue;
            $this->A9monthREPORT->ViewCustomAttributes = "";

            // INJ
            $this->INJ->ViewValue = $this->INJ->CurrentValue;
            $this->INJ->ViewCustomAttributes = "";

            // INJDATE
            $this->INJDATE->ViewValue = $this->INJDATE->CurrentValue;
            $this->INJDATE->ViewCustomAttributes = "";

            // INJINHOUSE
            $this->INJINHOUSE->ViewValue = $this->INJINHOUSE->CurrentValue;
            $this->INJINHOUSE->ViewCustomAttributes = "";

            // INJREPORT
            $this->INJREPORT->ViewValue = $this->INJREPORT->CurrentValue;
            $this->INJREPORT->ViewCustomAttributes = "";

            // Bleeding
            $this->Bleeding->ViewValue = $this->Bleeding->CurrentValue;
            $this->Bleeding->ViewCustomAttributes = "";

            // Hypothyroidism
            $this->Hypothyroidism->ViewValue = $this->Hypothyroidism->CurrentValue;
            $this->Hypothyroidism->ViewCustomAttributes = "";

            // PICMENumber
            $this->PICMENumber->ViewValue = $this->PICMENumber->CurrentValue;
            $this->PICMENumber->ViewCustomAttributes = "";

            // Outcome
            $this->Outcome->ViewValue = $this->Outcome->CurrentValue;
            $this->Outcome->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateodProcedure
            $this->DateodProcedure->ViewValue = $this->DateodProcedure->CurrentValue;
            $this->DateodProcedure->ViewCustomAttributes = "";

            // Miscarriage
            $this->Miscarriage->ViewValue = $this->Miscarriage->CurrentValue;
            $this->Miscarriage->ViewCustomAttributes = "";

            // ModeOfDelivery
            $this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->CurrentValue;
            $this->ModeOfDelivery->ViewCustomAttributes = "";

            // ND
            $this->ND->ViewValue = $this->ND->CurrentValue;
            $this->ND->ViewCustomAttributes = "";

            // NDS
            $this->NDS->ViewValue = $this->NDS->CurrentValue;
            $this->NDS->ViewCustomAttributes = "";

            // NDP
            $this->NDP->ViewValue = $this->NDP->CurrentValue;
            $this->NDP->ViewCustomAttributes = "";

            // Vaccum
            $this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
            $this->Vaccum->ViewCustomAttributes = "";

            // VaccumS
            $this->VaccumS->ViewValue = $this->VaccumS->CurrentValue;
            $this->VaccumS->ViewCustomAttributes = "";

            // VaccumP
            $this->VaccumP->ViewValue = $this->VaccumP->CurrentValue;
            $this->VaccumP->ViewCustomAttributes = "";

            // Forceps
            $this->Forceps->ViewValue = $this->Forceps->CurrentValue;
            $this->Forceps->ViewCustomAttributes = "";

            // ForcepsS
            $this->ForcepsS->ViewValue = $this->ForcepsS->CurrentValue;
            $this->ForcepsS->ViewCustomAttributes = "";

            // ForcepsP
            $this->ForcepsP->ViewValue = $this->ForcepsP->CurrentValue;
            $this->ForcepsP->ViewCustomAttributes = "";

            // Elective
            $this->Elective->ViewValue = $this->Elective->CurrentValue;
            $this->Elective->ViewCustomAttributes = "";

            // ElectiveS
            $this->ElectiveS->ViewValue = $this->ElectiveS->CurrentValue;
            $this->ElectiveS->ViewCustomAttributes = "";

            // ElectiveP
            $this->ElectiveP->ViewValue = $this->ElectiveP->CurrentValue;
            $this->ElectiveP->ViewCustomAttributes = "";

            // Emergency
            $this->Emergency->ViewValue = $this->Emergency->CurrentValue;
            $this->Emergency->ViewCustomAttributes = "";

            // EmergencyS
            $this->EmergencyS->ViewValue = $this->EmergencyS->CurrentValue;
            $this->EmergencyS->ViewCustomAttributes = "";

            // EmergencyP
            $this->EmergencyP->ViewValue = $this->EmergencyP->CurrentValue;
            $this->EmergencyP->ViewCustomAttributes = "";

            // Maturity
            $this->Maturity->ViewValue = $this->Maturity->CurrentValue;
            $this->Maturity->ViewCustomAttributes = "";

            // Baby1
            $this->Baby1->ViewValue = $this->Baby1->CurrentValue;
            $this->Baby1->ViewCustomAttributes = "";

            // Baby2
            $this->Baby2->ViewValue = $this->Baby2->CurrentValue;
            $this->Baby2->ViewCustomAttributes = "";

            // sex1
            $this->sex1->ViewValue = $this->sex1->CurrentValue;
            $this->sex1->ViewCustomAttributes = "";

            // sex2
            $this->sex2->ViewValue = $this->sex2->CurrentValue;
            $this->sex2->ViewCustomAttributes = "";

            // weight1
            $this->weight1->ViewValue = $this->weight1->CurrentValue;
            $this->weight1->ViewCustomAttributes = "";

            // weight2
            $this->weight2->ViewValue = $this->weight2->CurrentValue;
            $this->weight2->ViewCustomAttributes = "";

            // NICU1
            $this->NICU1->ViewValue = $this->NICU1->CurrentValue;
            $this->NICU1->ViewCustomAttributes = "";

            // NICU2
            $this->NICU2->ViewValue = $this->NICU2->CurrentValue;
            $this->NICU2->ViewCustomAttributes = "";

            // Jaundice1
            $this->Jaundice1->ViewValue = $this->Jaundice1->CurrentValue;
            $this->Jaundice1->ViewCustomAttributes = "";

            // Jaundice2
            $this->Jaundice2->ViewValue = $this->Jaundice2->CurrentValue;
            $this->Jaundice2->ViewCustomAttributes = "";

            // Others1
            $this->Others1->ViewValue = $this->Others1->CurrentValue;
            $this->Others1->ViewCustomAttributes = "";

            // Others2
            $this->Others2->ViewValue = $this->Others2->CurrentValue;
            $this->Others2->ViewCustomAttributes = "";

            // SpillOverReasons
            $this->SpillOverReasons->ViewValue = $this->SpillOverReasons->CurrentValue;
            $this->SpillOverReasons->ViewCustomAttributes = "";

            // ANClosed
            $this->ANClosed->ViewValue = $this->ANClosed->CurrentValue;
            $this->ANClosed->ViewCustomAttributes = "";

            // ANClosedDATE
            $this->ANClosedDATE->ViewValue = $this->ANClosedDATE->CurrentValue;
            $this->ANClosedDATE->ViewCustomAttributes = "";

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->ViewValue = $this->PastMedicalHistoryOthers->CurrentValue;
            $this->PastMedicalHistoryOthers->ViewCustomAttributes = "";

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->ViewValue = $this->PastSurgicalHistoryOthers->CurrentValue;
            $this->PastSurgicalHistoryOthers->ViewCustomAttributes = "";

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->ViewValue = $this->FamilyHistoryOthers->CurrentValue;
            $this->FamilyHistoryOthers->ViewCustomAttributes = "";

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->ViewValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
            $this->PresentPregnancyComplicationsOthers->ViewCustomAttributes = "";

            // ETdate
            $this->ETdate->ViewValue = $this->ETdate->CurrentValue;
            $this->ETdate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // pid
            $this->pid->LinkCustomAttributes = "";
            $this->pid->HrefValue = "";
            $this->pid->TooltipValue = "";

            // fid
            $this->fid->LinkCustomAttributes = "";
            $this->fid->HrefValue = "";
            $this->fid->TooltipValue = "";

            // G
            $this->G->LinkCustomAttributes = "";
            $this->G->HrefValue = "";
            $this->G->TooltipValue = "";

            // P
            $this->P->LinkCustomAttributes = "";
            $this->P->HrefValue = "";
            $this->P->TooltipValue = "";

            // L
            $this->L->LinkCustomAttributes = "";
            $this->L->HrefValue = "";
            $this->L->TooltipValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";
            $this->A->TooltipValue = "";

            // E
            $this->E->LinkCustomAttributes = "";
            $this->E->HrefValue = "";
            $this->E->TooltipValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";
            $this->M->TooltipValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // EDO
            $this->EDO->LinkCustomAttributes = "";
            $this->EDO->HrefValue = "";
            $this->EDO->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";
            $this->MaritalHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->LinkCustomAttributes = "";
            $this->PreviousHistoryofGDM->HrefValue = "";
            $this->PreviousHistoryofGDM->TooltipValue = "";

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->LinkCustomAttributes = "";
            $this->PreviousHistorofPIH->HrefValue = "";
            $this->PreviousHistorofPIH->TooltipValue = "";

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
            $this->PreviousHistoryofIUGR->HrefValue = "";
            $this->PreviousHistoryofIUGR->TooltipValue = "";

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
            $this->PreviousHistoryofOligohydramnios->HrefValue = "";
            $this->PreviousHistoryofOligohydramnios->TooltipValue = "";

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
            $this->PreviousHistoryofPreterm->HrefValue = "";
            $this->PreviousHistoryofPreterm->TooltipValue = "";

            // G1
            $this->G1->LinkCustomAttributes = "";
            $this->G1->HrefValue = "";
            $this->G1->TooltipValue = "";

            // G2
            $this->G2->LinkCustomAttributes = "";
            $this->G2->HrefValue = "";
            $this->G2->TooltipValue = "";

            // G3
            $this->G3->LinkCustomAttributes = "";
            $this->G3->HrefValue = "";
            $this->G3->TooltipValue = "";

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS1->HrefValue = "";
            $this->DeliveryNDLSCS1->TooltipValue = "";

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS2->HrefValue = "";
            $this->DeliveryNDLSCS2->TooltipValue = "";

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS3->HrefValue = "";
            $this->DeliveryNDLSCS3->TooltipValue = "";

            // BabySexweight1
            $this->BabySexweight1->LinkCustomAttributes = "";
            $this->BabySexweight1->HrefValue = "";
            $this->BabySexweight1->TooltipValue = "";

            // BabySexweight2
            $this->BabySexweight2->LinkCustomAttributes = "";
            $this->BabySexweight2->HrefValue = "";
            $this->BabySexweight2->TooltipValue = "";

            // BabySexweight3
            $this->BabySexweight3->LinkCustomAttributes = "";
            $this->BabySexweight3->HrefValue = "";
            $this->BabySexweight3->TooltipValue = "";

            // PastMedicalHistory
            $this->PastMedicalHistory->LinkCustomAttributes = "";
            $this->PastMedicalHistory->HrefValue = "";
            $this->PastMedicalHistory->TooltipValue = "";

            // PastSurgicalHistory
            $this->PastSurgicalHistory->LinkCustomAttributes = "";
            $this->PastSurgicalHistory->HrefValue = "";
            $this->PastSurgicalHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Viability
            $this->Viability->LinkCustomAttributes = "";
            $this->Viability->HrefValue = "";
            $this->Viability->TooltipValue = "";

            // ViabilityDATE
            $this->ViabilityDATE->LinkCustomAttributes = "";
            $this->ViabilityDATE->HrefValue = "";
            $this->ViabilityDATE->TooltipValue = "";

            // ViabilityREPORT
            $this->ViabilityREPORT->LinkCustomAttributes = "";
            $this->ViabilityREPORT->HrefValue = "";
            $this->ViabilityREPORT->TooltipValue = "";

            // Viability2
            $this->Viability2->LinkCustomAttributes = "";
            $this->Viability2->HrefValue = "";
            $this->Viability2->TooltipValue = "";

            // Viability2DATE
            $this->Viability2DATE->LinkCustomAttributes = "";
            $this->Viability2DATE->HrefValue = "";
            $this->Viability2DATE->TooltipValue = "";

            // Viability2REPORT
            $this->Viability2REPORT->LinkCustomAttributes = "";
            $this->Viability2REPORT->HrefValue = "";
            $this->Viability2REPORT->TooltipValue = "";

            // NTscan
            $this->NTscan->LinkCustomAttributes = "";
            $this->NTscan->HrefValue = "";
            $this->NTscan->TooltipValue = "";

            // NTscanDATE
            $this->NTscanDATE->LinkCustomAttributes = "";
            $this->NTscanDATE->HrefValue = "";
            $this->NTscanDATE->TooltipValue = "";

            // NTscanREPORT
            $this->NTscanREPORT->LinkCustomAttributes = "";
            $this->NTscanREPORT->HrefValue = "";
            $this->NTscanREPORT->TooltipValue = "";

            // EarlyTarget
            $this->EarlyTarget->LinkCustomAttributes = "";
            $this->EarlyTarget->HrefValue = "";
            $this->EarlyTarget->TooltipValue = "";

            // EarlyTargetDATE
            $this->EarlyTargetDATE->LinkCustomAttributes = "";
            $this->EarlyTargetDATE->HrefValue = "";
            $this->EarlyTargetDATE->TooltipValue = "";

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->LinkCustomAttributes = "";
            $this->EarlyTargetREPORT->HrefValue = "";
            $this->EarlyTargetREPORT->TooltipValue = "";

            // Anomaly
            $this->Anomaly->LinkCustomAttributes = "";
            $this->Anomaly->HrefValue = "";
            $this->Anomaly->TooltipValue = "";

            // AnomalyDATE
            $this->AnomalyDATE->LinkCustomAttributes = "";
            $this->AnomalyDATE->HrefValue = "";
            $this->AnomalyDATE->TooltipValue = "";

            // AnomalyREPORT
            $this->AnomalyREPORT->LinkCustomAttributes = "";
            $this->AnomalyREPORT->HrefValue = "";
            $this->AnomalyREPORT->TooltipValue = "";

            // Growth
            $this->Growth->LinkCustomAttributes = "";
            $this->Growth->HrefValue = "";
            $this->Growth->TooltipValue = "";

            // GrowthDATE
            $this->GrowthDATE->LinkCustomAttributes = "";
            $this->GrowthDATE->HrefValue = "";
            $this->GrowthDATE->TooltipValue = "";

            // GrowthREPORT
            $this->GrowthREPORT->LinkCustomAttributes = "";
            $this->GrowthREPORT->HrefValue = "";
            $this->GrowthREPORT->TooltipValue = "";

            // Growth1
            $this->Growth1->LinkCustomAttributes = "";
            $this->Growth1->HrefValue = "";
            $this->Growth1->TooltipValue = "";

            // Growth1DATE
            $this->Growth1DATE->LinkCustomAttributes = "";
            $this->Growth1DATE->HrefValue = "";
            $this->Growth1DATE->TooltipValue = "";

            // Growth1REPORT
            $this->Growth1REPORT->LinkCustomAttributes = "";
            $this->Growth1REPORT->HrefValue = "";
            $this->Growth1REPORT->TooltipValue = "";

            // ANProfile
            $this->ANProfile->LinkCustomAttributes = "";
            $this->ANProfile->HrefValue = "";
            $this->ANProfile->TooltipValue = "";

            // ANProfileDATE
            $this->ANProfileDATE->LinkCustomAttributes = "";
            $this->ANProfileDATE->HrefValue = "";
            $this->ANProfileDATE->TooltipValue = "";

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->LinkCustomAttributes = "";
            $this->ANProfileINHOUSE->HrefValue = "";
            $this->ANProfileINHOUSE->TooltipValue = "";

            // ANProfileREPORT
            $this->ANProfileREPORT->LinkCustomAttributes = "";
            $this->ANProfileREPORT->HrefValue = "";
            $this->ANProfileREPORT->TooltipValue = "";

            // DualMarker
            $this->DualMarker->LinkCustomAttributes = "";
            $this->DualMarker->HrefValue = "";
            $this->DualMarker->TooltipValue = "";

            // DualMarkerDATE
            $this->DualMarkerDATE->LinkCustomAttributes = "";
            $this->DualMarkerDATE->HrefValue = "";
            $this->DualMarkerDATE->TooltipValue = "";

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->LinkCustomAttributes = "";
            $this->DualMarkerINHOUSE->HrefValue = "";
            $this->DualMarkerINHOUSE->TooltipValue = "";

            // DualMarkerREPORT
            $this->DualMarkerREPORT->LinkCustomAttributes = "";
            $this->DualMarkerREPORT->HrefValue = "";
            $this->DualMarkerREPORT->TooltipValue = "";

            // Quadruple
            $this->Quadruple->LinkCustomAttributes = "";
            $this->Quadruple->HrefValue = "";
            $this->Quadruple->TooltipValue = "";

            // QuadrupleDATE
            $this->QuadrupleDATE->LinkCustomAttributes = "";
            $this->QuadrupleDATE->HrefValue = "";
            $this->QuadrupleDATE->TooltipValue = "";

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->LinkCustomAttributes = "";
            $this->QuadrupleINHOUSE->HrefValue = "";
            $this->QuadrupleINHOUSE->TooltipValue = "";

            // QuadrupleREPORT
            $this->QuadrupleREPORT->LinkCustomAttributes = "";
            $this->QuadrupleREPORT->HrefValue = "";
            $this->QuadrupleREPORT->TooltipValue = "";

            // A5month
            $this->A5month->LinkCustomAttributes = "";
            $this->A5month->HrefValue = "";
            $this->A5month->TooltipValue = "";

            // A5monthDATE
            $this->A5monthDATE->LinkCustomAttributes = "";
            $this->A5monthDATE->HrefValue = "";
            $this->A5monthDATE->TooltipValue = "";

            // A5monthINHOUSE
            $this->A5monthINHOUSE->LinkCustomAttributes = "";
            $this->A5monthINHOUSE->HrefValue = "";
            $this->A5monthINHOUSE->TooltipValue = "";

            // A5monthREPORT
            $this->A5monthREPORT->LinkCustomAttributes = "";
            $this->A5monthREPORT->HrefValue = "";
            $this->A5monthREPORT->TooltipValue = "";

            // A7month
            $this->A7month->LinkCustomAttributes = "";
            $this->A7month->HrefValue = "";
            $this->A7month->TooltipValue = "";

            // A7monthDATE
            $this->A7monthDATE->LinkCustomAttributes = "";
            $this->A7monthDATE->HrefValue = "";
            $this->A7monthDATE->TooltipValue = "";

            // A7monthINHOUSE
            $this->A7monthINHOUSE->LinkCustomAttributes = "";
            $this->A7monthINHOUSE->HrefValue = "";
            $this->A7monthINHOUSE->TooltipValue = "";

            // A7monthREPORT
            $this->A7monthREPORT->LinkCustomAttributes = "";
            $this->A7monthREPORT->HrefValue = "";
            $this->A7monthREPORT->TooltipValue = "";

            // A9month
            $this->A9month->LinkCustomAttributes = "";
            $this->A9month->HrefValue = "";
            $this->A9month->TooltipValue = "";

            // A9monthDATE
            $this->A9monthDATE->LinkCustomAttributes = "";
            $this->A9monthDATE->HrefValue = "";
            $this->A9monthDATE->TooltipValue = "";

            // A9monthINHOUSE
            $this->A9monthINHOUSE->LinkCustomAttributes = "";
            $this->A9monthINHOUSE->HrefValue = "";
            $this->A9monthINHOUSE->TooltipValue = "";

            // A9monthREPORT
            $this->A9monthREPORT->LinkCustomAttributes = "";
            $this->A9monthREPORT->HrefValue = "";
            $this->A9monthREPORT->TooltipValue = "";

            // INJ
            $this->INJ->LinkCustomAttributes = "";
            $this->INJ->HrefValue = "";
            $this->INJ->TooltipValue = "";

            // INJDATE
            $this->INJDATE->LinkCustomAttributes = "";
            $this->INJDATE->HrefValue = "";
            $this->INJDATE->TooltipValue = "";

            // INJINHOUSE
            $this->INJINHOUSE->LinkCustomAttributes = "";
            $this->INJINHOUSE->HrefValue = "";
            $this->INJINHOUSE->TooltipValue = "";

            // INJREPORT
            $this->INJREPORT->LinkCustomAttributes = "";
            $this->INJREPORT->HrefValue = "";
            $this->INJREPORT->TooltipValue = "";

            // Bleeding
            $this->Bleeding->LinkCustomAttributes = "";
            $this->Bleeding->HrefValue = "";
            $this->Bleeding->TooltipValue = "";

            // Hypothyroidism
            $this->Hypothyroidism->LinkCustomAttributes = "";
            $this->Hypothyroidism->HrefValue = "";
            $this->Hypothyroidism->TooltipValue = "";

            // PICMENumber
            $this->PICMENumber->LinkCustomAttributes = "";
            $this->PICMENumber->HrefValue = "";
            $this->PICMENumber->TooltipValue = "";

            // Outcome
            $this->Outcome->LinkCustomAttributes = "";
            $this->Outcome->HrefValue = "";
            $this->Outcome->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateodProcedure
            $this->DateodProcedure->LinkCustomAttributes = "";
            $this->DateodProcedure->HrefValue = "";
            $this->DateodProcedure->TooltipValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";
            $this->Miscarriage->TooltipValue = "";

            // ModeOfDelivery
            $this->ModeOfDelivery->LinkCustomAttributes = "";
            $this->ModeOfDelivery->HrefValue = "";
            $this->ModeOfDelivery->TooltipValue = "";

            // ND
            $this->ND->LinkCustomAttributes = "";
            $this->ND->HrefValue = "";
            $this->ND->TooltipValue = "";

            // NDS
            $this->NDS->LinkCustomAttributes = "";
            $this->NDS->HrefValue = "";
            $this->NDS->TooltipValue = "";

            // NDP
            $this->NDP->LinkCustomAttributes = "";
            $this->NDP->HrefValue = "";
            $this->NDP->TooltipValue = "";

            // Vaccum
            $this->Vaccum->LinkCustomAttributes = "";
            $this->Vaccum->HrefValue = "";
            $this->Vaccum->TooltipValue = "";

            // VaccumS
            $this->VaccumS->LinkCustomAttributes = "";
            $this->VaccumS->HrefValue = "";
            $this->VaccumS->TooltipValue = "";

            // VaccumP
            $this->VaccumP->LinkCustomAttributes = "";
            $this->VaccumP->HrefValue = "";
            $this->VaccumP->TooltipValue = "";

            // Forceps
            $this->Forceps->LinkCustomAttributes = "";
            $this->Forceps->HrefValue = "";
            $this->Forceps->TooltipValue = "";

            // ForcepsS
            $this->ForcepsS->LinkCustomAttributes = "";
            $this->ForcepsS->HrefValue = "";
            $this->ForcepsS->TooltipValue = "";

            // ForcepsP
            $this->ForcepsP->LinkCustomAttributes = "";
            $this->ForcepsP->HrefValue = "";
            $this->ForcepsP->TooltipValue = "";

            // Elective
            $this->Elective->LinkCustomAttributes = "";
            $this->Elective->HrefValue = "";
            $this->Elective->TooltipValue = "";

            // ElectiveS
            $this->ElectiveS->LinkCustomAttributes = "";
            $this->ElectiveS->HrefValue = "";
            $this->ElectiveS->TooltipValue = "";

            // ElectiveP
            $this->ElectiveP->LinkCustomAttributes = "";
            $this->ElectiveP->HrefValue = "";
            $this->ElectiveP->TooltipValue = "";

            // Emergency
            $this->Emergency->LinkCustomAttributes = "";
            $this->Emergency->HrefValue = "";
            $this->Emergency->TooltipValue = "";

            // EmergencyS
            $this->EmergencyS->LinkCustomAttributes = "";
            $this->EmergencyS->HrefValue = "";
            $this->EmergencyS->TooltipValue = "";

            // EmergencyP
            $this->EmergencyP->LinkCustomAttributes = "";
            $this->EmergencyP->HrefValue = "";
            $this->EmergencyP->TooltipValue = "";

            // Maturity
            $this->Maturity->LinkCustomAttributes = "";
            $this->Maturity->HrefValue = "";
            $this->Maturity->TooltipValue = "";

            // Baby1
            $this->Baby1->LinkCustomAttributes = "";
            $this->Baby1->HrefValue = "";
            $this->Baby1->TooltipValue = "";

            // Baby2
            $this->Baby2->LinkCustomAttributes = "";
            $this->Baby2->HrefValue = "";
            $this->Baby2->TooltipValue = "";

            // sex1
            $this->sex1->LinkCustomAttributes = "";
            $this->sex1->HrefValue = "";
            $this->sex1->TooltipValue = "";

            // sex2
            $this->sex2->LinkCustomAttributes = "";
            $this->sex2->HrefValue = "";
            $this->sex2->TooltipValue = "";

            // weight1
            $this->weight1->LinkCustomAttributes = "";
            $this->weight1->HrefValue = "";
            $this->weight1->TooltipValue = "";

            // weight2
            $this->weight2->LinkCustomAttributes = "";
            $this->weight2->HrefValue = "";
            $this->weight2->TooltipValue = "";

            // NICU1
            $this->NICU1->LinkCustomAttributes = "";
            $this->NICU1->HrefValue = "";
            $this->NICU1->TooltipValue = "";

            // NICU2
            $this->NICU2->LinkCustomAttributes = "";
            $this->NICU2->HrefValue = "";
            $this->NICU2->TooltipValue = "";

            // Jaundice1
            $this->Jaundice1->LinkCustomAttributes = "";
            $this->Jaundice1->HrefValue = "";
            $this->Jaundice1->TooltipValue = "";

            // Jaundice2
            $this->Jaundice2->LinkCustomAttributes = "";
            $this->Jaundice2->HrefValue = "";
            $this->Jaundice2->TooltipValue = "";

            // Others1
            $this->Others1->LinkCustomAttributes = "";
            $this->Others1->HrefValue = "";
            $this->Others1->TooltipValue = "";

            // Others2
            $this->Others2->LinkCustomAttributes = "";
            $this->Others2->HrefValue = "";
            $this->Others2->TooltipValue = "";

            // SpillOverReasons
            $this->SpillOverReasons->LinkCustomAttributes = "";
            $this->SpillOverReasons->HrefValue = "";
            $this->SpillOverReasons->TooltipValue = "";

            // ANClosed
            $this->ANClosed->LinkCustomAttributes = "";
            $this->ANClosed->HrefValue = "";
            $this->ANClosed->TooltipValue = "";

            // ANClosedDATE
            $this->ANClosedDATE->LinkCustomAttributes = "";
            $this->ANClosedDATE->HrefValue = "";
            $this->ANClosedDATE->TooltipValue = "";

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastMedicalHistoryOthers->HrefValue = "";
            $this->PastMedicalHistoryOthers->TooltipValue = "";

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastSurgicalHistoryOthers->HrefValue = "";
            $this->PastSurgicalHistoryOthers->TooltipValue = "";

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->LinkCustomAttributes = "";
            $this->FamilyHistoryOthers->HrefValue = "";
            $this->FamilyHistoryOthers->TooltipValue = "";

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
            $this->PresentPregnancyComplicationsOthers->HrefValue = "";
            $this->PresentPregnancyComplicationsOthers->TooltipValue = "";

            // ETdate
            $this->ETdate->LinkCustomAttributes = "";
            $this->ETdate->HrefValue = "";
            $this->ETdate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pid
            $this->pid->EditAttrs["class"] = "form-control";
            $this->pid->EditCustomAttributes = "";
            $this->pid->EditValue = HtmlEncode($this->pid->CurrentValue);
            $this->pid->PlaceHolder = RemoveHtml($this->pid->caption());

            // fid
            $this->fid->EditAttrs["class"] = "form-control";
            $this->fid->EditCustomAttributes = "";
            $this->fid->EditValue = HtmlEncode($this->fid->CurrentValue);
            $this->fid->PlaceHolder = RemoveHtml($this->fid->caption());

            // G
            $this->G->EditAttrs["class"] = "form-control";
            $this->G->EditCustomAttributes = "";
            if (!$this->G->Raw) {
                $this->G->CurrentValue = HtmlDecode($this->G->CurrentValue);
            }
            $this->G->EditValue = HtmlEncode($this->G->CurrentValue);
            $this->G->PlaceHolder = RemoveHtml($this->G->caption());

            // P
            $this->P->EditAttrs["class"] = "form-control";
            $this->P->EditCustomAttributes = "";
            if (!$this->P->Raw) {
                $this->P->CurrentValue = HtmlDecode($this->P->CurrentValue);
            }
            $this->P->EditValue = HtmlEncode($this->P->CurrentValue);
            $this->P->PlaceHolder = RemoveHtml($this->P->caption());

            // L
            $this->L->EditAttrs["class"] = "form-control";
            $this->L->EditCustomAttributes = "";
            if (!$this->L->Raw) {
                $this->L->CurrentValue = HtmlDecode($this->L->CurrentValue);
            }
            $this->L->EditValue = HtmlEncode($this->L->CurrentValue);
            $this->L->PlaceHolder = RemoveHtml($this->L->caption());

            // A
            $this->A->EditAttrs["class"] = "form-control";
            $this->A->EditCustomAttributes = "";
            if (!$this->A->Raw) {
                $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
            }
            $this->A->EditValue = HtmlEncode($this->A->CurrentValue);
            $this->A->PlaceHolder = RemoveHtml($this->A->caption());

            // E
            $this->E->EditAttrs["class"] = "form-control";
            $this->E->EditCustomAttributes = "";
            if (!$this->E->Raw) {
                $this->E->CurrentValue = HtmlDecode($this->E->CurrentValue);
            }
            $this->E->EditValue = HtmlEncode($this->E->CurrentValue);
            $this->E->PlaceHolder = RemoveHtml($this->E->caption());

            // M
            $this->M->EditAttrs["class"] = "form-control";
            $this->M->EditCustomAttributes = "";
            if (!$this->M->Raw) {
                $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
            }
            $this->M->EditValue = HtmlEncode($this->M->CurrentValue);
            $this->M->PlaceHolder = RemoveHtml($this->M->caption());

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            if (!$this->LMP->Raw) {
                $this->LMP->CurrentValue = HtmlDecode($this->LMP->CurrentValue);
            }
            $this->LMP->EditValue = HtmlEncode($this->LMP->CurrentValue);
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // EDO
            $this->EDO->EditAttrs["class"] = "form-control";
            $this->EDO->EditCustomAttributes = "";
            if (!$this->EDO->Raw) {
                $this->EDO->CurrentValue = HtmlDecode($this->EDO->CurrentValue);
            }
            $this->EDO->EditValue = HtmlEncode($this->EDO->CurrentValue);
            $this->EDO->PlaceHolder = RemoveHtml($this->EDO->caption());

            // MenstrualHistory
            $this->MenstrualHistory->EditAttrs["class"] = "form-control";
            $this->MenstrualHistory->EditCustomAttributes = "";
            if (!$this->MenstrualHistory->Raw) {
                $this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
            }
            $this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
            $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

            // MaritalHistory
            $this->MaritalHistory->EditAttrs["class"] = "form-control";
            $this->MaritalHistory->EditCustomAttributes = "";
            if (!$this->MaritalHistory->Raw) {
                $this->MaritalHistory->CurrentValue = HtmlDecode($this->MaritalHistory->CurrentValue);
            }
            $this->MaritalHistory->EditValue = HtmlEncode($this->MaritalHistory->CurrentValue);
            $this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

            // ObstetricHistory
            $this->ObstetricHistory->EditAttrs["class"] = "form-control";
            $this->ObstetricHistory->EditCustomAttributes = "";
            if (!$this->ObstetricHistory->Raw) {
                $this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
            }
            $this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->CurrentValue);
            $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->EditAttrs["class"] = "form-control";
            $this->PreviousHistoryofGDM->EditCustomAttributes = "";
            if (!$this->PreviousHistoryofGDM->Raw) {
                $this->PreviousHistoryofGDM->CurrentValue = HtmlDecode($this->PreviousHistoryofGDM->CurrentValue);
            }
            $this->PreviousHistoryofGDM->EditValue = HtmlEncode($this->PreviousHistoryofGDM->CurrentValue);
            $this->PreviousHistoryofGDM->PlaceHolder = RemoveHtml($this->PreviousHistoryofGDM->caption());

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->EditAttrs["class"] = "form-control";
            $this->PreviousHistorofPIH->EditCustomAttributes = "";
            if (!$this->PreviousHistorofPIH->Raw) {
                $this->PreviousHistorofPIH->CurrentValue = HtmlDecode($this->PreviousHistorofPIH->CurrentValue);
            }
            $this->PreviousHistorofPIH->EditValue = HtmlEncode($this->PreviousHistorofPIH->CurrentValue);
            $this->PreviousHistorofPIH->PlaceHolder = RemoveHtml($this->PreviousHistorofPIH->caption());

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->EditAttrs["class"] = "form-control";
            $this->PreviousHistoryofIUGR->EditCustomAttributes = "";
            if (!$this->PreviousHistoryofIUGR->Raw) {
                $this->PreviousHistoryofIUGR->CurrentValue = HtmlDecode($this->PreviousHistoryofIUGR->CurrentValue);
            }
            $this->PreviousHistoryofIUGR->EditValue = HtmlEncode($this->PreviousHistoryofIUGR->CurrentValue);
            $this->PreviousHistoryofIUGR->PlaceHolder = RemoveHtml($this->PreviousHistoryofIUGR->caption());

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->EditAttrs["class"] = "form-control";
            $this->PreviousHistoryofOligohydramnios->EditCustomAttributes = "";
            if (!$this->PreviousHistoryofOligohydramnios->Raw) {
                $this->PreviousHistoryofOligohydramnios->CurrentValue = HtmlDecode($this->PreviousHistoryofOligohydramnios->CurrentValue);
            }
            $this->PreviousHistoryofOligohydramnios->EditValue = HtmlEncode($this->PreviousHistoryofOligohydramnios->CurrentValue);
            $this->PreviousHistoryofOligohydramnios->PlaceHolder = RemoveHtml($this->PreviousHistoryofOligohydramnios->caption());

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->EditAttrs["class"] = "form-control";
            $this->PreviousHistoryofPreterm->EditCustomAttributes = "";
            if (!$this->PreviousHistoryofPreterm->Raw) {
                $this->PreviousHistoryofPreterm->CurrentValue = HtmlDecode($this->PreviousHistoryofPreterm->CurrentValue);
            }
            $this->PreviousHistoryofPreterm->EditValue = HtmlEncode($this->PreviousHistoryofPreterm->CurrentValue);
            $this->PreviousHistoryofPreterm->PlaceHolder = RemoveHtml($this->PreviousHistoryofPreterm->caption());

            // G1
            $this->G1->EditAttrs["class"] = "form-control";
            $this->G1->EditCustomAttributes = "";
            if (!$this->G1->Raw) {
                $this->G1->CurrentValue = HtmlDecode($this->G1->CurrentValue);
            }
            $this->G1->EditValue = HtmlEncode($this->G1->CurrentValue);
            $this->G1->PlaceHolder = RemoveHtml($this->G1->caption());

            // G2
            $this->G2->EditAttrs["class"] = "form-control";
            $this->G2->EditCustomAttributes = "";
            if (!$this->G2->Raw) {
                $this->G2->CurrentValue = HtmlDecode($this->G2->CurrentValue);
            }
            $this->G2->EditValue = HtmlEncode($this->G2->CurrentValue);
            $this->G2->PlaceHolder = RemoveHtml($this->G2->caption());

            // G3
            $this->G3->EditAttrs["class"] = "form-control";
            $this->G3->EditCustomAttributes = "";
            if (!$this->G3->Raw) {
                $this->G3->CurrentValue = HtmlDecode($this->G3->CurrentValue);
            }
            $this->G3->EditValue = HtmlEncode($this->G3->CurrentValue);
            $this->G3->PlaceHolder = RemoveHtml($this->G3->caption());

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->EditAttrs["class"] = "form-control";
            $this->DeliveryNDLSCS1->EditCustomAttributes = "";
            if (!$this->DeliveryNDLSCS1->Raw) {
                $this->DeliveryNDLSCS1->CurrentValue = HtmlDecode($this->DeliveryNDLSCS1->CurrentValue);
            }
            $this->DeliveryNDLSCS1->EditValue = HtmlEncode($this->DeliveryNDLSCS1->CurrentValue);
            $this->DeliveryNDLSCS1->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS1->caption());

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->EditAttrs["class"] = "form-control";
            $this->DeliveryNDLSCS2->EditCustomAttributes = "";
            if (!$this->DeliveryNDLSCS2->Raw) {
                $this->DeliveryNDLSCS2->CurrentValue = HtmlDecode($this->DeliveryNDLSCS2->CurrentValue);
            }
            $this->DeliveryNDLSCS2->EditValue = HtmlEncode($this->DeliveryNDLSCS2->CurrentValue);
            $this->DeliveryNDLSCS2->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS2->caption());

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->EditAttrs["class"] = "form-control";
            $this->DeliveryNDLSCS3->EditCustomAttributes = "";
            if (!$this->DeliveryNDLSCS3->Raw) {
                $this->DeliveryNDLSCS3->CurrentValue = HtmlDecode($this->DeliveryNDLSCS3->CurrentValue);
            }
            $this->DeliveryNDLSCS3->EditValue = HtmlEncode($this->DeliveryNDLSCS3->CurrentValue);
            $this->DeliveryNDLSCS3->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS3->caption());

            // BabySexweight1
            $this->BabySexweight1->EditAttrs["class"] = "form-control";
            $this->BabySexweight1->EditCustomAttributes = "";
            if (!$this->BabySexweight1->Raw) {
                $this->BabySexweight1->CurrentValue = HtmlDecode($this->BabySexweight1->CurrentValue);
            }
            $this->BabySexweight1->EditValue = HtmlEncode($this->BabySexweight1->CurrentValue);
            $this->BabySexweight1->PlaceHolder = RemoveHtml($this->BabySexweight1->caption());

            // BabySexweight2
            $this->BabySexweight2->EditAttrs["class"] = "form-control";
            $this->BabySexweight2->EditCustomAttributes = "";
            if (!$this->BabySexweight2->Raw) {
                $this->BabySexweight2->CurrentValue = HtmlDecode($this->BabySexweight2->CurrentValue);
            }
            $this->BabySexweight2->EditValue = HtmlEncode($this->BabySexweight2->CurrentValue);
            $this->BabySexweight2->PlaceHolder = RemoveHtml($this->BabySexweight2->caption());

            // BabySexweight3
            $this->BabySexweight3->EditAttrs["class"] = "form-control";
            $this->BabySexweight3->EditCustomAttributes = "";
            if (!$this->BabySexweight3->Raw) {
                $this->BabySexweight3->CurrentValue = HtmlDecode($this->BabySexweight3->CurrentValue);
            }
            $this->BabySexweight3->EditValue = HtmlEncode($this->BabySexweight3->CurrentValue);
            $this->BabySexweight3->PlaceHolder = RemoveHtml($this->BabySexweight3->caption());

            // PastMedicalHistory
            $this->PastMedicalHistory->EditAttrs["class"] = "form-control";
            $this->PastMedicalHistory->EditCustomAttributes = "";
            if (!$this->PastMedicalHistory->Raw) {
                $this->PastMedicalHistory->CurrentValue = HtmlDecode($this->PastMedicalHistory->CurrentValue);
            }
            $this->PastMedicalHistory->EditValue = HtmlEncode($this->PastMedicalHistory->CurrentValue);
            $this->PastMedicalHistory->PlaceHolder = RemoveHtml($this->PastMedicalHistory->caption());

            // PastSurgicalHistory
            $this->PastSurgicalHistory->EditAttrs["class"] = "form-control";
            $this->PastSurgicalHistory->EditCustomAttributes = "";
            if (!$this->PastSurgicalHistory->Raw) {
                $this->PastSurgicalHistory->CurrentValue = HtmlDecode($this->PastSurgicalHistory->CurrentValue);
            }
            $this->PastSurgicalHistory->EditValue = HtmlEncode($this->PastSurgicalHistory->CurrentValue);
            $this->PastSurgicalHistory->PlaceHolder = RemoveHtml($this->PastSurgicalHistory->caption());

            // FamilyHistory
            $this->FamilyHistory->EditAttrs["class"] = "form-control";
            $this->FamilyHistory->EditCustomAttributes = "";
            if (!$this->FamilyHistory->Raw) {
                $this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
            }
            $this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
            $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

            // Viability
            $this->Viability->EditAttrs["class"] = "form-control";
            $this->Viability->EditCustomAttributes = "";
            if (!$this->Viability->Raw) {
                $this->Viability->CurrentValue = HtmlDecode($this->Viability->CurrentValue);
            }
            $this->Viability->EditValue = HtmlEncode($this->Viability->CurrentValue);
            $this->Viability->PlaceHolder = RemoveHtml($this->Viability->caption());

            // ViabilityDATE
            $this->ViabilityDATE->EditAttrs["class"] = "form-control";
            $this->ViabilityDATE->EditCustomAttributes = "";
            if (!$this->ViabilityDATE->Raw) {
                $this->ViabilityDATE->CurrentValue = HtmlDecode($this->ViabilityDATE->CurrentValue);
            }
            $this->ViabilityDATE->EditValue = HtmlEncode($this->ViabilityDATE->CurrentValue);
            $this->ViabilityDATE->PlaceHolder = RemoveHtml($this->ViabilityDATE->caption());

            // ViabilityREPORT
            $this->ViabilityREPORT->EditAttrs["class"] = "form-control";
            $this->ViabilityREPORT->EditCustomAttributes = "";
            $this->ViabilityREPORT->EditValue = HtmlEncode($this->ViabilityREPORT->CurrentValue);
            $this->ViabilityREPORT->PlaceHolder = RemoveHtml($this->ViabilityREPORT->caption());

            // Viability2
            $this->Viability2->EditAttrs["class"] = "form-control";
            $this->Viability2->EditCustomAttributes = "";
            if (!$this->Viability2->Raw) {
                $this->Viability2->CurrentValue = HtmlDecode($this->Viability2->CurrentValue);
            }
            $this->Viability2->EditValue = HtmlEncode($this->Viability2->CurrentValue);
            $this->Viability2->PlaceHolder = RemoveHtml($this->Viability2->caption());

            // Viability2DATE
            $this->Viability2DATE->EditAttrs["class"] = "form-control";
            $this->Viability2DATE->EditCustomAttributes = "";
            if (!$this->Viability2DATE->Raw) {
                $this->Viability2DATE->CurrentValue = HtmlDecode($this->Viability2DATE->CurrentValue);
            }
            $this->Viability2DATE->EditValue = HtmlEncode($this->Viability2DATE->CurrentValue);
            $this->Viability2DATE->PlaceHolder = RemoveHtml($this->Viability2DATE->caption());

            // Viability2REPORT
            $this->Viability2REPORT->EditAttrs["class"] = "form-control";
            $this->Viability2REPORT->EditCustomAttributes = "";
            $this->Viability2REPORT->EditValue = HtmlEncode($this->Viability2REPORT->CurrentValue);
            $this->Viability2REPORT->PlaceHolder = RemoveHtml($this->Viability2REPORT->caption());

            // NTscan
            $this->NTscan->EditAttrs["class"] = "form-control";
            $this->NTscan->EditCustomAttributes = "";
            if (!$this->NTscan->Raw) {
                $this->NTscan->CurrentValue = HtmlDecode($this->NTscan->CurrentValue);
            }
            $this->NTscan->EditValue = HtmlEncode($this->NTscan->CurrentValue);
            $this->NTscan->PlaceHolder = RemoveHtml($this->NTscan->caption());

            // NTscanDATE
            $this->NTscanDATE->EditAttrs["class"] = "form-control";
            $this->NTscanDATE->EditCustomAttributes = "";
            if (!$this->NTscanDATE->Raw) {
                $this->NTscanDATE->CurrentValue = HtmlDecode($this->NTscanDATE->CurrentValue);
            }
            $this->NTscanDATE->EditValue = HtmlEncode($this->NTscanDATE->CurrentValue);
            $this->NTscanDATE->PlaceHolder = RemoveHtml($this->NTscanDATE->caption());

            // NTscanREPORT
            $this->NTscanREPORT->EditAttrs["class"] = "form-control";
            $this->NTscanREPORT->EditCustomAttributes = "";
            $this->NTscanREPORT->EditValue = HtmlEncode($this->NTscanREPORT->CurrentValue);
            $this->NTscanREPORT->PlaceHolder = RemoveHtml($this->NTscanREPORT->caption());

            // EarlyTarget
            $this->EarlyTarget->EditAttrs["class"] = "form-control";
            $this->EarlyTarget->EditCustomAttributes = "";
            if (!$this->EarlyTarget->Raw) {
                $this->EarlyTarget->CurrentValue = HtmlDecode($this->EarlyTarget->CurrentValue);
            }
            $this->EarlyTarget->EditValue = HtmlEncode($this->EarlyTarget->CurrentValue);
            $this->EarlyTarget->PlaceHolder = RemoveHtml($this->EarlyTarget->caption());

            // EarlyTargetDATE
            $this->EarlyTargetDATE->EditAttrs["class"] = "form-control";
            $this->EarlyTargetDATE->EditCustomAttributes = "";
            if (!$this->EarlyTargetDATE->Raw) {
                $this->EarlyTargetDATE->CurrentValue = HtmlDecode($this->EarlyTargetDATE->CurrentValue);
            }
            $this->EarlyTargetDATE->EditValue = HtmlEncode($this->EarlyTargetDATE->CurrentValue);
            $this->EarlyTargetDATE->PlaceHolder = RemoveHtml($this->EarlyTargetDATE->caption());

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->EditAttrs["class"] = "form-control";
            $this->EarlyTargetREPORT->EditCustomAttributes = "";
            $this->EarlyTargetREPORT->EditValue = HtmlEncode($this->EarlyTargetREPORT->CurrentValue);
            $this->EarlyTargetREPORT->PlaceHolder = RemoveHtml($this->EarlyTargetREPORT->caption());

            // Anomaly
            $this->Anomaly->EditAttrs["class"] = "form-control";
            $this->Anomaly->EditCustomAttributes = "";
            if (!$this->Anomaly->Raw) {
                $this->Anomaly->CurrentValue = HtmlDecode($this->Anomaly->CurrentValue);
            }
            $this->Anomaly->EditValue = HtmlEncode($this->Anomaly->CurrentValue);
            $this->Anomaly->PlaceHolder = RemoveHtml($this->Anomaly->caption());

            // AnomalyDATE
            $this->AnomalyDATE->EditAttrs["class"] = "form-control";
            $this->AnomalyDATE->EditCustomAttributes = "";
            if (!$this->AnomalyDATE->Raw) {
                $this->AnomalyDATE->CurrentValue = HtmlDecode($this->AnomalyDATE->CurrentValue);
            }
            $this->AnomalyDATE->EditValue = HtmlEncode($this->AnomalyDATE->CurrentValue);
            $this->AnomalyDATE->PlaceHolder = RemoveHtml($this->AnomalyDATE->caption());

            // AnomalyREPORT
            $this->AnomalyREPORT->EditAttrs["class"] = "form-control";
            $this->AnomalyREPORT->EditCustomAttributes = "";
            $this->AnomalyREPORT->EditValue = HtmlEncode($this->AnomalyREPORT->CurrentValue);
            $this->AnomalyREPORT->PlaceHolder = RemoveHtml($this->AnomalyREPORT->caption());

            // Growth
            $this->Growth->EditAttrs["class"] = "form-control";
            $this->Growth->EditCustomAttributes = "";
            if (!$this->Growth->Raw) {
                $this->Growth->CurrentValue = HtmlDecode($this->Growth->CurrentValue);
            }
            $this->Growth->EditValue = HtmlEncode($this->Growth->CurrentValue);
            $this->Growth->PlaceHolder = RemoveHtml($this->Growth->caption());

            // GrowthDATE
            $this->GrowthDATE->EditAttrs["class"] = "form-control";
            $this->GrowthDATE->EditCustomAttributes = "";
            if (!$this->GrowthDATE->Raw) {
                $this->GrowthDATE->CurrentValue = HtmlDecode($this->GrowthDATE->CurrentValue);
            }
            $this->GrowthDATE->EditValue = HtmlEncode($this->GrowthDATE->CurrentValue);
            $this->GrowthDATE->PlaceHolder = RemoveHtml($this->GrowthDATE->caption());

            // GrowthREPORT
            $this->GrowthREPORT->EditAttrs["class"] = "form-control";
            $this->GrowthREPORT->EditCustomAttributes = "";
            $this->GrowthREPORT->EditValue = HtmlEncode($this->GrowthREPORT->CurrentValue);
            $this->GrowthREPORT->PlaceHolder = RemoveHtml($this->GrowthREPORT->caption());

            // Growth1
            $this->Growth1->EditAttrs["class"] = "form-control";
            $this->Growth1->EditCustomAttributes = "";
            if (!$this->Growth1->Raw) {
                $this->Growth1->CurrentValue = HtmlDecode($this->Growth1->CurrentValue);
            }
            $this->Growth1->EditValue = HtmlEncode($this->Growth1->CurrentValue);
            $this->Growth1->PlaceHolder = RemoveHtml($this->Growth1->caption());

            // Growth1DATE
            $this->Growth1DATE->EditAttrs["class"] = "form-control";
            $this->Growth1DATE->EditCustomAttributes = "";
            if (!$this->Growth1DATE->Raw) {
                $this->Growth1DATE->CurrentValue = HtmlDecode($this->Growth1DATE->CurrentValue);
            }
            $this->Growth1DATE->EditValue = HtmlEncode($this->Growth1DATE->CurrentValue);
            $this->Growth1DATE->PlaceHolder = RemoveHtml($this->Growth1DATE->caption());

            // Growth1REPORT
            $this->Growth1REPORT->EditAttrs["class"] = "form-control";
            $this->Growth1REPORT->EditCustomAttributes = "";
            $this->Growth1REPORT->EditValue = HtmlEncode($this->Growth1REPORT->CurrentValue);
            $this->Growth1REPORT->PlaceHolder = RemoveHtml($this->Growth1REPORT->caption());

            // ANProfile
            $this->ANProfile->EditAttrs["class"] = "form-control";
            $this->ANProfile->EditCustomAttributes = "";
            if (!$this->ANProfile->Raw) {
                $this->ANProfile->CurrentValue = HtmlDecode($this->ANProfile->CurrentValue);
            }
            $this->ANProfile->EditValue = HtmlEncode($this->ANProfile->CurrentValue);
            $this->ANProfile->PlaceHolder = RemoveHtml($this->ANProfile->caption());

            // ANProfileDATE
            $this->ANProfileDATE->EditAttrs["class"] = "form-control";
            $this->ANProfileDATE->EditCustomAttributes = "";
            if (!$this->ANProfileDATE->Raw) {
                $this->ANProfileDATE->CurrentValue = HtmlDecode($this->ANProfileDATE->CurrentValue);
            }
            $this->ANProfileDATE->EditValue = HtmlEncode($this->ANProfileDATE->CurrentValue);
            $this->ANProfileDATE->PlaceHolder = RemoveHtml($this->ANProfileDATE->caption());

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->EditAttrs["class"] = "form-control";
            $this->ANProfileINHOUSE->EditCustomAttributes = "";
            if (!$this->ANProfileINHOUSE->Raw) {
                $this->ANProfileINHOUSE->CurrentValue = HtmlDecode($this->ANProfileINHOUSE->CurrentValue);
            }
            $this->ANProfileINHOUSE->EditValue = HtmlEncode($this->ANProfileINHOUSE->CurrentValue);
            $this->ANProfileINHOUSE->PlaceHolder = RemoveHtml($this->ANProfileINHOUSE->caption());

            // ANProfileREPORT
            $this->ANProfileREPORT->EditAttrs["class"] = "form-control";
            $this->ANProfileREPORT->EditCustomAttributes = "";
            $this->ANProfileREPORT->EditValue = HtmlEncode($this->ANProfileREPORT->CurrentValue);
            $this->ANProfileREPORT->PlaceHolder = RemoveHtml($this->ANProfileREPORT->caption());

            // DualMarker
            $this->DualMarker->EditAttrs["class"] = "form-control";
            $this->DualMarker->EditCustomAttributes = "";
            if (!$this->DualMarker->Raw) {
                $this->DualMarker->CurrentValue = HtmlDecode($this->DualMarker->CurrentValue);
            }
            $this->DualMarker->EditValue = HtmlEncode($this->DualMarker->CurrentValue);
            $this->DualMarker->PlaceHolder = RemoveHtml($this->DualMarker->caption());

            // DualMarkerDATE
            $this->DualMarkerDATE->EditAttrs["class"] = "form-control";
            $this->DualMarkerDATE->EditCustomAttributes = "";
            if (!$this->DualMarkerDATE->Raw) {
                $this->DualMarkerDATE->CurrentValue = HtmlDecode($this->DualMarkerDATE->CurrentValue);
            }
            $this->DualMarkerDATE->EditValue = HtmlEncode($this->DualMarkerDATE->CurrentValue);
            $this->DualMarkerDATE->PlaceHolder = RemoveHtml($this->DualMarkerDATE->caption());

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->EditAttrs["class"] = "form-control";
            $this->DualMarkerINHOUSE->EditCustomAttributes = "";
            if (!$this->DualMarkerINHOUSE->Raw) {
                $this->DualMarkerINHOUSE->CurrentValue = HtmlDecode($this->DualMarkerINHOUSE->CurrentValue);
            }
            $this->DualMarkerINHOUSE->EditValue = HtmlEncode($this->DualMarkerINHOUSE->CurrentValue);
            $this->DualMarkerINHOUSE->PlaceHolder = RemoveHtml($this->DualMarkerINHOUSE->caption());

            // DualMarkerREPORT
            $this->DualMarkerREPORT->EditAttrs["class"] = "form-control";
            $this->DualMarkerREPORT->EditCustomAttributes = "";
            $this->DualMarkerREPORT->EditValue = HtmlEncode($this->DualMarkerREPORT->CurrentValue);
            $this->DualMarkerREPORT->PlaceHolder = RemoveHtml($this->DualMarkerREPORT->caption());

            // Quadruple
            $this->Quadruple->EditAttrs["class"] = "form-control";
            $this->Quadruple->EditCustomAttributes = "";
            if (!$this->Quadruple->Raw) {
                $this->Quadruple->CurrentValue = HtmlDecode($this->Quadruple->CurrentValue);
            }
            $this->Quadruple->EditValue = HtmlEncode($this->Quadruple->CurrentValue);
            $this->Quadruple->PlaceHolder = RemoveHtml($this->Quadruple->caption());

            // QuadrupleDATE
            $this->QuadrupleDATE->EditAttrs["class"] = "form-control";
            $this->QuadrupleDATE->EditCustomAttributes = "";
            if (!$this->QuadrupleDATE->Raw) {
                $this->QuadrupleDATE->CurrentValue = HtmlDecode($this->QuadrupleDATE->CurrentValue);
            }
            $this->QuadrupleDATE->EditValue = HtmlEncode($this->QuadrupleDATE->CurrentValue);
            $this->QuadrupleDATE->PlaceHolder = RemoveHtml($this->QuadrupleDATE->caption());

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->EditAttrs["class"] = "form-control";
            $this->QuadrupleINHOUSE->EditCustomAttributes = "";
            if (!$this->QuadrupleINHOUSE->Raw) {
                $this->QuadrupleINHOUSE->CurrentValue = HtmlDecode($this->QuadrupleINHOUSE->CurrentValue);
            }
            $this->QuadrupleINHOUSE->EditValue = HtmlEncode($this->QuadrupleINHOUSE->CurrentValue);
            $this->QuadrupleINHOUSE->PlaceHolder = RemoveHtml($this->QuadrupleINHOUSE->caption());

            // QuadrupleREPORT
            $this->QuadrupleREPORT->EditAttrs["class"] = "form-control";
            $this->QuadrupleREPORT->EditCustomAttributes = "";
            $this->QuadrupleREPORT->EditValue = HtmlEncode($this->QuadrupleREPORT->CurrentValue);
            $this->QuadrupleREPORT->PlaceHolder = RemoveHtml($this->QuadrupleREPORT->caption());

            // A5month
            $this->A5month->EditAttrs["class"] = "form-control";
            $this->A5month->EditCustomAttributes = "";
            if (!$this->A5month->Raw) {
                $this->A5month->CurrentValue = HtmlDecode($this->A5month->CurrentValue);
            }
            $this->A5month->EditValue = HtmlEncode($this->A5month->CurrentValue);
            $this->A5month->PlaceHolder = RemoveHtml($this->A5month->caption());

            // A5monthDATE
            $this->A5monthDATE->EditAttrs["class"] = "form-control";
            $this->A5monthDATE->EditCustomAttributes = "";
            if (!$this->A5monthDATE->Raw) {
                $this->A5monthDATE->CurrentValue = HtmlDecode($this->A5monthDATE->CurrentValue);
            }
            $this->A5monthDATE->EditValue = HtmlEncode($this->A5monthDATE->CurrentValue);
            $this->A5monthDATE->PlaceHolder = RemoveHtml($this->A5monthDATE->caption());

            // A5monthINHOUSE
            $this->A5monthINHOUSE->EditAttrs["class"] = "form-control";
            $this->A5monthINHOUSE->EditCustomAttributes = "";
            if (!$this->A5monthINHOUSE->Raw) {
                $this->A5monthINHOUSE->CurrentValue = HtmlDecode($this->A5monthINHOUSE->CurrentValue);
            }
            $this->A5monthINHOUSE->EditValue = HtmlEncode($this->A5monthINHOUSE->CurrentValue);
            $this->A5monthINHOUSE->PlaceHolder = RemoveHtml($this->A5monthINHOUSE->caption());

            // A5monthREPORT
            $this->A5monthREPORT->EditAttrs["class"] = "form-control";
            $this->A5monthREPORT->EditCustomAttributes = "";
            $this->A5monthREPORT->EditValue = HtmlEncode($this->A5monthREPORT->CurrentValue);
            $this->A5monthREPORT->PlaceHolder = RemoveHtml($this->A5monthREPORT->caption());

            // A7month
            $this->A7month->EditAttrs["class"] = "form-control";
            $this->A7month->EditCustomAttributes = "";
            if (!$this->A7month->Raw) {
                $this->A7month->CurrentValue = HtmlDecode($this->A7month->CurrentValue);
            }
            $this->A7month->EditValue = HtmlEncode($this->A7month->CurrentValue);
            $this->A7month->PlaceHolder = RemoveHtml($this->A7month->caption());

            // A7monthDATE
            $this->A7monthDATE->EditAttrs["class"] = "form-control";
            $this->A7monthDATE->EditCustomAttributes = "";
            if (!$this->A7monthDATE->Raw) {
                $this->A7monthDATE->CurrentValue = HtmlDecode($this->A7monthDATE->CurrentValue);
            }
            $this->A7monthDATE->EditValue = HtmlEncode($this->A7monthDATE->CurrentValue);
            $this->A7monthDATE->PlaceHolder = RemoveHtml($this->A7monthDATE->caption());

            // A7monthINHOUSE
            $this->A7monthINHOUSE->EditAttrs["class"] = "form-control";
            $this->A7monthINHOUSE->EditCustomAttributes = "";
            if (!$this->A7monthINHOUSE->Raw) {
                $this->A7monthINHOUSE->CurrentValue = HtmlDecode($this->A7monthINHOUSE->CurrentValue);
            }
            $this->A7monthINHOUSE->EditValue = HtmlEncode($this->A7monthINHOUSE->CurrentValue);
            $this->A7monthINHOUSE->PlaceHolder = RemoveHtml($this->A7monthINHOUSE->caption());

            // A7monthREPORT
            $this->A7monthREPORT->EditAttrs["class"] = "form-control";
            $this->A7monthREPORT->EditCustomAttributes = "";
            $this->A7monthREPORT->EditValue = HtmlEncode($this->A7monthREPORT->CurrentValue);
            $this->A7monthREPORT->PlaceHolder = RemoveHtml($this->A7monthREPORT->caption());

            // A9month
            $this->A9month->EditAttrs["class"] = "form-control";
            $this->A9month->EditCustomAttributes = "";
            if (!$this->A9month->Raw) {
                $this->A9month->CurrentValue = HtmlDecode($this->A9month->CurrentValue);
            }
            $this->A9month->EditValue = HtmlEncode($this->A9month->CurrentValue);
            $this->A9month->PlaceHolder = RemoveHtml($this->A9month->caption());

            // A9monthDATE
            $this->A9monthDATE->EditAttrs["class"] = "form-control";
            $this->A9monthDATE->EditCustomAttributes = "";
            if (!$this->A9monthDATE->Raw) {
                $this->A9monthDATE->CurrentValue = HtmlDecode($this->A9monthDATE->CurrentValue);
            }
            $this->A9monthDATE->EditValue = HtmlEncode($this->A9monthDATE->CurrentValue);
            $this->A9monthDATE->PlaceHolder = RemoveHtml($this->A9monthDATE->caption());

            // A9monthINHOUSE
            $this->A9monthINHOUSE->EditAttrs["class"] = "form-control";
            $this->A9monthINHOUSE->EditCustomAttributes = "";
            if (!$this->A9monthINHOUSE->Raw) {
                $this->A9monthINHOUSE->CurrentValue = HtmlDecode($this->A9monthINHOUSE->CurrentValue);
            }
            $this->A9monthINHOUSE->EditValue = HtmlEncode($this->A9monthINHOUSE->CurrentValue);
            $this->A9monthINHOUSE->PlaceHolder = RemoveHtml($this->A9monthINHOUSE->caption());

            // A9monthREPORT
            $this->A9monthREPORT->EditAttrs["class"] = "form-control";
            $this->A9monthREPORT->EditCustomAttributes = "";
            $this->A9monthREPORT->EditValue = HtmlEncode($this->A9monthREPORT->CurrentValue);
            $this->A9monthREPORT->PlaceHolder = RemoveHtml($this->A9monthREPORT->caption());

            // INJ
            $this->INJ->EditAttrs["class"] = "form-control";
            $this->INJ->EditCustomAttributes = "";
            if (!$this->INJ->Raw) {
                $this->INJ->CurrentValue = HtmlDecode($this->INJ->CurrentValue);
            }
            $this->INJ->EditValue = HtmlEncode($this->INJ->CurrentValue);
            $this->INJ->PlaceHolder = RemoveHtml($this->INJ->caption());

            // INJDATE
            $this->INJDATE->EditAttrs["class"] = "form-control";
            $this->INJDATE->EditCustomAttributes = "";
            if (!$this->INJDATE->Raw) {
                $this->INJDATE->CurrentValue = HtmlDecode($this->INJDATE->CurrentValue);
            }
            $this->INJDATE->EditValue = HtmlEncode($this->INJDATE->CurrentValue);
            $this->INJDATE->PlaceHolder = RemoveHtml($this->INJDATE->caption());

            // INJINHOUSE
            $this->INJINHOUSE->EditAttrs["class"] = "form-control";
            $this->INJINHOUSE->EditCustomAttributes = "";
            if (!$this->INJINHOUSE->Raw) {
                $this->INJINHOUSE->CurrentValue = HtmlDecode($this->INJINHOUSE->CurrentValue);
            }
            $this->INJINHOUSE->EditValue = HtmlEncode($this->INJINHOUSE->CurrentValue);
            $this->INJINHOUSE->PlaceHolder = RemoveHtml($this->INJINHOUSE->caption());

            // INJREPORT
            $this->INJREPORT->EditAttrs["class"] = "form-control";
            $this->INJREPORT->EditCustomAttributes = "";
            $this->INJREPORT->EditValue = HtmlEncode($this->INJREPORT->CurrentValue);
            $this->INJREPORT->PlaceHolder = RemoveHtml($this->INJREPORT->caption());

            // Bleeding
            $this->Bleeding->EditAttrs["class"] = "form-control";
            $this->Bleeding->EditCustomAttributes = "";
            if (!$this->Bleeding->Raw) {
                $this->Bleeding->CurrentValue = HtmlDecode($this->Bleeding->CurrentValue);
            }
            $this->Bleeding->EditValue = HtmlEncode($this->Bleeding->CurrentValue);
            $this->Bleeding->PlaceHolder = RemoveHtml($this->Bleeding->caption());

            // Hypothyroidism
            $this->Hypothyroidism->EditAttrs["class"] = "form-control";
            $this->Hypothyroidism->EditCustomAttributes = "";
            if (!$this->Hypothyroidism->Raw) {
                $this->Hypothyroidism->CurrentValue = HtmlDecode($this->Hypothyroidism->CurrentValue);
            }
            $this->Hypothyroidism->EditValue = HtmlEncode($this->Hypothyroidism->CurrentValue);
            $this->Hypothyroidism->PlaceHolder = RemoveHtml($this->Hypothyroidism->caption());

            // PICMENumber
            $this->PICMENumber->EditAttrs["class"] = "form-control";
            $this->PICMENumber->EditCustomAttributes = "";
            if (!$this->PICMENumber->Raw) {
                $this->PICMENumber->CurrentValue = HtmlDecode($this->PICMENumber->CurrentValue);
            }
            $this->PICMENumber->EditValue = HtmlEncode($this->PICMENumber->CurrentValue);
            $this->PICMENumber->PlaceHolder = RemoveHtml($this->PICMENumber->caption());

            // Outcome
            $this->Outcome->EditAttrs["class"] = "form-control";
            $this->Outcome->EditCustomAttributes = "";
            if (!$this->Outcome->Raw) {
                $this->Outcome->CurrentValue = HtmlDecode($this->Outcome->CurrentValue);
            }
            $this->Outcome->EditValue = HtmlEncode($this->Outcome->CurrentValue);
            $this->Outcome->PlaceHolder = RemoveHtml($this->Outcome->caption());

            // DateofAdmission
            $this->DateofAdmission->EditAttrs["class"] = "form-control";
            $this->DateofAdmission->EditCustomAttributes = "";
            if (!$this->DateofAdmission->Raw) {
                $this->DateofAdmission->CurrentValue = HtmlDecode($this->DateofAdmission->CurrentValue);
            }
            $this->DateofAdmission->EditValue = HtmlEncode($this->DateofAdmission->CurrentValue);
            $this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

            // DateodProcedure
            $this->DateodProcedure->EditAttrs["class"] = "form-control";
            $this->DateodProcedure->EditCustomAttributes = "";
            if (!$this->DateodProcedure->Raw) {
                $this->DateodProcedure->CurrentValue = HtmlDecode($this->DateodProcedure->CurrentValue);
            }
            $this->DateodProcedure->EditValue = HtmlEncode($this->DateodProcedure->CurrentValue);
            $this->DateodProcedure->PlaceHolder = RemoveHtml($this->DateodProcedure->caption());

            // Miscarriage
            $this->Miscarriage->EditAttrs["class"] = "form-control";
            $this->Miscarriage->EditCustomAttributes = "";
            if (!$this->Miscarriage->Raw) {
                $this->Miscarriage->CurrentValue = HtmlDecode($this->Miscarriage->CurrentValue);
            }
            $this->Miscarriage->EditValue = HtmlEncode($this->Miscarriage->CurrentValue);
            $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

            // ModeOfDelivery
            $this->ModeOfDelivery->EditAttrs["class"] = "form-control";
            $this->ModeOfDelivery->EditCustomAttributes = "";
            if (!$this->ModeOfDelivery->Raw) {
                $this->ModeOfDelivery->CurrentValue = HtmlDecode($this->ModeOfDelivery->CurrentValue);
            }
            $this->ModeOfDelivery->EditValue = HtmlEncode($this->ModeOfDelivery->CurrentValue);
            $this->ModeOfDelivery->PlaceHolder = RemoveHtml($this->ModeOfDelivery->caption());

            // ND
            $this->ND->EditAttrs["class"] = "form-control";
            $this->ND->EditCustomAttributes = "";
            if (!$this->ND->Raw) {
                $this->ND->CurrentValue = HtmlDecode($this->ND->CurrentValue);
            }
            $this->ND->EditValue = HtmlEncode($this->ND->CurrentValue);
            $this->ND->PlaceHolder = RemoveHtml($this->ND->caption());

            // NDS
            $this->NDS->EditAttrs["class"] = "form-control";
            $this->NDS->EditCustomAttributes = "";
            if (!$this->NDS->Raw) {
                $this->NDS->CurrentValue = HtmlDecode($this->NDS->CurrentValue);
            }
            $this->NDS->EditValue = HtmlEncode($this->NDS->CurrentValue);
            $this->NDS->PlaceHolder = RemoveHtml($this->NDS->caption());

            // NDP
            $this->NDP->EditAttrs["class"] = "form-control";
            $this->NDP->EditCustomAttributes = "";
            if (!$this->NDP->Raw) {
                $this->NDP->CurrentValue = HtmlDecode($this->NDP->CurrentValue);
            }
            $this->NDP->EditValue = HtmlEncode($this->NDP->CurrentValue);
            $this->NDP->PlaceHolder = RemoveHtml($this->NDP->caption());

            // Vaccum
            $this->Vaccum->EditAttrs["class"] = "form-control";
            $this->Vaccum->EditCustomAttributes = "";
            if (!$this->Vaccum->Raw) {
                $this->Vaccum->CurrentValue = HtmlDecode($this->Vaccum->CurrentValue);
            }
            $this->Vaccum->EditValue = HtmlEncode($this->Vaccum->CurrentValue);
            $this->Vaccum->PlaceHolder = RemoveHtml($this->Vaccum->caption());

            // VaccumS
            $this->VaccumS->EditAttrs["class"] = "form-control";
            $this->VaccumS->EditCustomAttributes = "";
            if (!$this->VaccumS->Raw) {
                $this->VaccumS->CurrentValue = HtmlDecode($this->VaccumS->CurrentValue);
            }
            $this->VaccumS->EditValue = HtmlEncode($this->VaccumS->CurrentValue);
            $this->VaccumS->PlaceHolder = RemoveHtml($this->VaccumS->caption());

            // VaccumP
            $this->VaccumP->EditAttrs["class"] = "form-control";
            $this->VaccumP->EditCustomAttributes = "";
            if (!$this->VaccumP->Raw) {
                $this->VaccumP->CurrentValue = HtmlDecode($this->VaccumP->CurrentValue);
            }
            $this->VaccumP->EditValue = HtmlEncode($this->VaccumP->CurrentValue);
            $this->VaccumP->PlaceHolder = RemoveHtml($this->VaccumP->caption());

            // Forceps
            $this->Forceps->EditAttrs["class"] = "form-control";
            $this->Forceps->EditCustomAttributes = "";
            if (!$this->Forceps->Raw) {
                $this->Forceps->CurrentValue = HtmlDecode($this->Forceps->CurrentValue);
            }
            $this->Forceps->EditValue = HtmlEncode($this->Forceps->CurrentValue);
            $this->Forceps->PlaceHolder = RemoveHtml($this->Forceps->caption());

            // ForcepsS
            $this->ForcepsS->EditAttrs["class"] = "form-control";
            $this->ForcepsS->EditCustomAttributes = "";
            if (!$this->ForcepsS->Raw) {
                $this->ForcepsS->CurrentValue = HtmlDecode($this->ForcepsS->CurrentValue);
            }
            $this->ForcepsS->EditValue = HtmlEncode($this->ForcepsS->CurrentValue);
            $this->ForcepsS->PlaceHolder = RemoveHtml($this->ForcepsS->caption());

            // ForcepsP
            $this->ForcepsP->EditAttrs["class"] = "form-control";
            $this->ForcepsP->EditCustomAttributes = "";
            if (!$this->ForcepsP->Raw) {
                $this->ForcepsP->CurrentValue = HtmlDecode($this->ForcepsP->CurrentValue);
            }
            $this->ForcepsP->EditValue = HtmlEncode($this->ForcepsP->CurrentValue);
            $this->ForcepsP->PlaceHolder = RemoveHtml($this->ForcepsP->caption());

            // Elective
            $this->Elective->EditAttrs["class"] = "form-control";
            $this->Elective->EditCustomAttributes = "";
            if (!$this->Elective->Raw) {
                $this->Elective->CurrentValue = HtmlDecode($this->Elective->CurrentValue);
            }
            $this->Elective->EditValue = HtmlEncode($this->Elective->CurrentValue);
            $this->Elective->PlaceHolder = RemoveHtml($this->Elective->caption());

            // ElectiveS
            $this->ElectiveS->EditAttrs["class"] = "form-control";
            $this->ElectiveS->EditCustomAttributes = "";
            if (!$this->ElectiveS->Raw) {
                $this->ElectiveS->CurrentValue = HtmlDecode($this->ElectiveS->CurrentValue);
            }
            $this->ElectiveS->EditValue = HtmlEncode($this->ElectiveS->CurrentValue);
            $this->ElectiveS->PlaceHolder = RemoveHtml($this->ElectiveS->caption());

            // ElectiveP
            $this->ElectiveP->EditAttrs["class"] = "form-control";
            $this->ElectiveP->EditCustomAttributes = "";
            if (!$this->ElectiveP->Raw) {
                $this->ElectiveP->CurrentValue = HtmlDecode($this->ElectiveP->CurrentValue);
            }
            $this->ElectiveP->EditValue = HtmlEncode($this->ElectiveP->CurrentValue);
            $this->ElectiveP->PlaceHolder = RemoveHtml($this->ElectiveP->caption());

            // Emergency
            $this->Emergency->EditAttrs["class"] = "form-control";
            $this->Emergency->EditCustomAttributes = "";
            if (!$this->Emergency->Raw) {
                $this->Emergency->CurrentValue = HtmlDecode($this->Emergency->CurrentValue);
            }
            $this->Emergency->EditValue = HtmlEncode($this->Emergency->CurrentValue);
            $this->Emergency->PlaceHolder = RemoveHtml($this->Emergency->caption());

            // EmergencyS
            $this->EmergencyS->EditAttrs["class"] = "form-control";
            $this->EmergencyS->EditCustomAttributes = "";
            if (!$this->EmergencyS->Raw) {
                $this->EmergencyS->CurrentValue = HtmlDecode($this->EmergencyS->CurrentValue);
            }
            $this->EmergencyS->EditValue = HtmlEncode($this->EmergencyS->CurrentValue);
            $this->EmergencyS->PlaceHolder = RemoveHtml($this->EmergencyS->caption());

            // EmergencyP
            $this->EmergencyP->EditAttrs["class"] = "form-control";
            $this->EmergencyP->EditCustomAttributes = "";
            if (!$this->EmergencyP->Raw) {
                $this->EmergencyP->CurrentValue = HtmlDecode($this->EmergencyP->CurrentValue);
            }
            $this->EmergencyP->EditValue = HtmlEncode($this->EmergencyP->CurrentValue);
            $this->EmergencyP->PlaceHolder = RemoveHtml($this->EmergencyP->caption());

            // Maturity
            $this->Maturity->EditAttrs["class"] = "form-control";
            $this->Maturity->EditCustomAttributes = "";
            if (!$this->Maturity->Raw) {
                $this->Maturity->CurrentValue = HtmlDecode($this->Maturity->CurrentValue);
            }
            $this->Maturity->EditValue = HtmlEncode($this->Maturity->CurrentValue);
            $this->Maturity->PlaceHolder = RemoveHtml($this->Maturity->caption());

            // Baby1
            $this->Baby1->EditAttrs["class"] = "form-control";
            $this->Baby1->EditCustomAttributes = "";
            if (!$this->Baby1->Raw) {
                $this->Baby1->CurrentValue = HtmlDecode($this->Baby1->CurrentValue);
            }
            $this->Baby1->EditValue = HtmlEncode($this->Baby1->CurrentValue);
            $this->Baby1->PlaceHolder = RemoveHtml($this->Baby1->caption());

            // Baby2
            $this->Baby2->EditAttrs["class"] = "form-control";
            $this->Baby2->EditCustomAttributes = "";
            if (!$this->Baby2->Raw) {
                $this->Baby2->CurrentValue = HtmlDecode($this->Baby2->CurrentValue);
            }
            $this->Baby2->EditValue = HtmlEncode($this->Baby2->CurrentValue);
            $this->Baby2->PlaceHolder = RemoveHtml($this->Baby2->caption());

            // sex1
            $this->sex1->EditAttrs["class"] = "form-control";
            $this->sex1->EditCustomAttributes = "";
            if (!$this->sex1->Raw) {
                $this->sex1->CurrentValue = HtmlDecode($this->sex1->CurrentValue);
            }
            $this->sex1->EditValue = HtmlEncode($this->sex1->CurrentValue);
            $this->sex1->PlaceHolder = RemoveHtml($this->sex1->caption());

            // sex2
            $this->sex2->EditAttrs["class"] = "form-control";
            $this->sex2->EditCustomAttributes = "";
            if (!$this->sex2->Raw) {
                $this->sex2->CurrentValue = HtmlDecode($this->sex2->CurrentValue);
            }
            $this->sex2->EditValue = HtmlEncode($this->sex2->CurrentValue);
            $this->sex2->PlaceHolder = RemoveHtml($this->sex2->caption());

            // weight1
            $this->weight1->EditAttrs["class"] = "form-control";
            $this->weight1->EditCustomAttributes = "";
            if (!$this->weight1->Raw) {
                $this->weight1->CurrentValue = HtmlDecode($this->weight1->CurrentValue);
            }
            $this->weight1->EditValue = HtmlEncode($this->weight1->CurrentValue);
            $this->weight1->PlaceHolder = RemoveHtml($this->weight1->caption());

            // weight2
            $this->weight2->EditAttrs["class"] = "form-control";
            $this->weight2->EditCustomAttributes = "";
            if (!$this->weight2->Raw) {
                $this->weight2->CurrentValue = HtmlDecode($this->weight2->CurrentValue);
            }
            $this->weight2->EditValue = HtmlEncode($this->weight2->CurrentValue);
            $this->weight2->PlaceHolder = RemoveHtml($this->weight2->caption());

            // NICU1
            $this->NICU1->EditAttrs["class"] = "form-control";
            $this->NICU1->EditCustomAttributes = "";
            if (!$this->NICU1->Raw) {
                $this->NICU1->CurrentValue = HtmlDecode($this->NICU1->CurrentValue);
            }
            $this->NICU1->EditValue = HtmlEncode($this->NICU1->CurrentValue);
            $this->NICU1->PlaceHolder = RemoveHtml($this->NICU1->caption());

            // NICU2
            $this->NICU2->EditAttrs["class"] = "form-control";
            $this->NICU2->EditCustomAttributes = "";
            if (!$this->NICU2->Raw) {
                $this->NICU2->CurrentValue = HtmlDecode($this->NICU2->CurrentValue);
            }
            $this->NICU2->EditValue = HtmlEncode($this->NICU2->CurrentValue);
            $this->NICU2->PlaceHolder = RemoveHtml($this->NICU2->caption());

            // Jaundice1
            $this->Jaundice1->EditAttrs["class"] = "form-control";
            $this->Jaundice1->EditCustomAttributes = "";
            if (!$this->Jaundice1->Raw) {
                $this->Jaundice1->CurrentValue = HtmlDecode($this->Jaundice1->CurrentValue);
            }
            $this->Jaundice1->EditValue = HtmlEncode($this->Jaundice1->CurrentValue);
            $this->Jaundice1->PlaceHolder = RemoveHtml($this->Jaundice1->caption());

            // Jaundice2
            $this->Jaundice2->EditAttrs["class"] = "form-control";
            $this->Jaundice2->EditCustomAttributes = "";
            if (!$this->Jaundice2->Raw) {
                $this->Jaundice2->CurrentValue = HtmlDecode($this->Jaundice2->CurrentValue);
            }
            $this->Jaundice2->EditValue = HtmlEncode($this->Jaundice2->CurrentValue);
            $this->Jaundice2->PlaceHolder = RemoveHtml($this->Jaundice2->caption());

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

            // SpillOverReasons
            $this->SpillOverReasons->EditAttrs["class"] = "form-control";
            $this->SpillOverReasons->EditCustomAttributes = "";
            if (!$this->SpillOverReasons->Raw) {
                $this->SpillOverReasons->CurrentValue = HtmlDecode($this->SpillOverReasons->CurrentValue);
            }
            $this->SpillOverReasons->EditValue = HtmlEncode($this->SpillOverReasons->CurrentValue);
            $this->SpillOverReasons->PlaceHolder = RemoveHtml($this->SpillOverReasons->caption());

            // ANClosed
            $this->ANClosed->EditAttrs["class"] = "form-control";
            $this->ANClosed->EditCustomAttributes = "";
            if (!$this->ANClosed->Raw) {
                $this->ANClosed->CurrentValue = HtmlDecode($this->ANClosed->CurrentValue);
            }
            $this->ANClosed->EditValue = HtmlEncode($this->ANClosed->CurrentValue);
            $this->ANClosed->PlaceHolder = RemoveHtml($this->ANClosed->caption());

            // ANClosedDATE
            $this->ANClosedDATE->EditAttrs["class"] = "form-control";
            $this->ANClosedDATE->EditCustomAttributes = "";
            if (!$this->ANClosedDATE->Raw) {
                $this->ANClosedDATE->CurrentValue = HtmlDecode($this->ANClosedDATE->CurrentValue);
            }
            $this->ANClosedDATE->EditValue = HtmlEncode($this->ANClosedDATE->CurrentValue);
            $this->ANClosedDATE->PlaceHolder = RemoveHtml($this->ANClosedDATE->caption());

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->EditAttrs["class"] = "form-control";
            $this->PastMedicalHistoryOthers->EditCustomAttributes = "";
            if (!$this->PastMedicalHistoryOthers->Raw) {
                $this->PastMedicalHistoryOthers->CurrentValue = HtmlDecode($this->PastMedicalHistoryOthers->CurrentValue);
            }
            $this->PastMedicalHistoryOthers->EditValue = HtmlEncode($this->PastMedicalHistoryOthers->CurrentValue);
            $this->PastMedicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastMedicalHistoryOthers->caption());

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->EditAttrs["class"] = "form-control";
            $this->PastSurgicalHistoryOthers->EditCustomAttributes = "";
            if (!$this->PastSurgicalHistoryOthers->Raw) {
                $this->PastSurgicalHistoryOthers->CurrentValue = HtmlDecode($this->PastSurgicalHistoryOthers->CurrentValue);
            }
            $this->PastSurgicalHistoryOthers->EditValue = HtmlEncode($this->PastSurgicalHistoryOthers->CurrentValue);
            $this->PastSurgicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastSurgicalHistoryOthers->caption());

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->EditAttrs["class"] = "form-control";
            $this->FamilyHistoryOthers->EditCustomAttributes = "";
            if (!$this->FamilyHistoryOthers->Raw) {
                $this->FamilyHistoryOthers->CurrentValue = HtmlDecode($this->FamilyHistoryOthers->CurrentValue);
            }
            $this->FamilyHistoryOthers->EditValue = HtmlEncode($this->FamilyHistoryOthers->CurrentValue);
            $this->FamilyHistoryOthers->PlaceHolder = RemoveHtml($this->FamilyHistoryOthers->caption());

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->EditAttrs["class"] = "form-control";
            $this->PresentPregnancyComplicationsOthers->EditCustomAttributes = "";
            if (!$this->PresentPregnancyComplicationsOthers->Raw) {
                $this->PresentPregnancyComplicationsOthers->CurrentValue = HtmlDecode($this->PresentPregnancyComplicationsOthers->CurrentValue);
            }
            $this->PresentPregnancyComplicationsOthers->EditValue = HtmlEncode($this->PresentPregnancyComplicationsOthers->CurrentValue);
            $this->PresentPregnancyComplicationsOthers->PlaceHolder = RemoveHtml($this->PresentPregnancyComplicationsOthers->caption());

            // ETdate
            $this->ETdate->EditAttrs["class"] = "form-control";
            $this->ETdate->EditCustomAttributes = "";
            if (!$this->ETdate->Raw) {
                $this->ETdate->CurrentValue = HtmlDecode($this->ETdate->CurrentValue);
            }
            $this->ETdate->EditValue = HtmlEncode($this->ETdate->CurrentValue);
            $this->ETdate->PlaceHolder = RemoveHtml($this->ETdate->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // pid
            $this->pid->LinkCustomAttributes = "";
            $this->pid->HrefValue = "";

            // fid
            $this->fid->LinkCustomAttributes = "";
            $this->fid->HrefValue = "";

            // G
            $this->G->LinkCustomAttributes = "";
            $this->G->HrefValue = "";

            // P
            $this->P->LinkCustomAttributes = "";
            $this->P->HrefValue = "";

            // L
            $this->L->LinkCustomAttributes = "";
            $this->L->HrefValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";

            // E
            $this->E->LinkCustomAttributes = "";
            $this->E->HrefValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";

            // EDO
            $this->EDO->LinkCustomAttributes = "";
            $this->EDO->HrefValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->LinkCustomAttributes = "";
            $this->PreviousHistoryofGDM->HrefValue = "";

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->LinkCustomAttributes = "";
            $this->PreviousHistorofPIH->HrefValue = "";

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
            $this->PreviousHistoryofIUGR->HrefValue = "";

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
            $this->PreviousHistoryofOligohydramnios->HrefValue = "";

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
            $this->PreviousHistoryofPreterm->HrefValue = "";

            // G1
            $this->G1->LinkCustomAttributes = "";
            $this->G1->HrefValue = "";

            // G2
            $this->G2->LinkCustomAttributes = "";
            $this->G2->HrefValue = "";

            // G3
            $this->G3->LinkCustomAttributes = "";
            $this->G3->HrefValue = "";

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS1->HrefValue = "";

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS2->HrefValue = "";

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS3->HrefValue = "";

            // BabySexweight1
            $this->BabySexweight1->LinkCustomAttributes = "";
            $this->BabySexweight1->HrefValue = "";

            // BabySexweight2
            $this->BabySexweight2->LinkCustomAttributes = "";
            $this->BabySexweight2->HrefValue = "";

            // BabySexweight3
            $this->BabySexweight3->LinkCustomAttributes = "";
            $this->BabySexweight3->HrefValue = "";

            // PastMedicalHistory
            $this->PastMedicalHistory->LinkCustomAttributes = "";
            $this->PastMedicalHistory->HrefValue = "";

            // PastSurgicalHistory
            $this->PastSurgicalHistory->LinkCustomAttributes = "";
            $this->PastSurgicalHistory->HrefValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";

            // Viability
            $this->Viability->LinkCustomAttributes = "";
            $this->Viability->HrefValue = "";

            // ViabilityDATE
            $this->ViabilityDATE->LinkCustomAttributes = "";
            $this->ViabilityDATE->HrefValue = "";

            // ViabilityREPORT
            $this->ViabilityREPORT->LinkCustomAttributes = "";
            $this->ViabilityREPORT->HrefValue = "";

            // Viability2
            $this->Viability2->LinkCustomAttributes = "";
            $this->Viability2->HrefValue = "";

            // Viability2DATE
            $this->Viability2DATE->LinkCustomAttributes = "";
            $this->Viability2DATE->HrefValue = "";

            // Viability2REPORT
            $this->Viability2REPORT->LinkCustomAttributes = "";
            $this->Viability2REPORT->HrefValue = "";

            // NTscan
            $this->NTscan->LinkCustomAttributes = "";
            $this->NTscan->HrefValue = "";

            // NTscanDATE
            $this->NTscanDATE->LinkCustomAttributes = "";
            $this->NTscanDATE->HrefValue = "";

            // NTscanREPORT
            $this->NTscanREPORT->LinkCustomAttributes = "";
            $this->NTscanREPORT->HrefValue = "";

            // EarlyTarget
            $this->EarlyTarget->LinkCustomAttributes = "";
            $this->EarlyTarget->HrefValue = "";

            // EarlyTargetDATE
            $this->EarlyTargetDATE->LinkCustomAttributes = "";
            $this->EarlyTargetDATE->HrefValue = "";

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->LinkCustomAttributes = "";
            $this->EarlyTargetREPORT->HrefValue = "";

            // Anomaly
            $this->Anomaly->LinkCustomAttributes = "";
            $this->Anomaly->HrefValue = "";

            // AnomalyDATE
            $this->AnomalyDATE->LinkCustomAttributes = "";
            $this->AnomalyDATE->HrefValue = "";

            // AnomalyREPORT
            $this->AnomalyREPORT->LinkCustomAttributes = "";
            $this->AnomalyREPORT->HrefValue = "";

            // Growth
            $this->Growth->LinkCustomAttributes = "";
            $this->Growth->HrefValue = "";

            // GrowthDATE
            $this->GrowthDATE->LinkCustomAttributes = "";
            $this->GrowthDATE->HrefValue = "";

            // GrowthREPORT
            $this->GrowthREPORT->LinkCustomAttributes = "";
            $this->GrowthREPORT->HrefValue = "";

            // Growth1
            $this->Growth1->LinkCustomAttributes = "";
            $this->Growth1->HrefValue = "";

            // Growth1DATE
            $this->Growth1DATE->LinkCustomAttributes = "";
            $this->Growth1DATE->HrefValue = "";

            // Growth1REPORT
            $this->Growth1REPORT->LinkCustomAttributes = "";
            $this->Growth1REPORT->HrefValue = "";

            // ANProfile
            $this->ANProfile->LinkCustomAttributes = "";
            $this->ANProfile->HrefValue = "";

            // ANProfileDATE
            $this->ANProfileDATE->LinkCustomAttributes = "";
            $this->ANProfileDATE->HrefValue = "";

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->LinkCustomAttributes = "";
            $this->ANProfileINHOUSE->HrefValue = "";

            // ANProfileREPORT
            $this->ANProfileREPORT->LinkCustomAttributes = "";
            $this->ANProfileREPORT->HrefValue = "";

            // DualMarker
            $this->DualMarker->LinkCustomAttributes = "";
            $this->DualMarker->HrefValue = "";

            // DualMarkerDATE
            $this->DualMarkerDATE->LinkCustomAttributes = "";
            $this->DualMarkerDATE->HrefValue = "";

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->LinkCustomAttributes = "";
            $this->DualMarkerINHOUSE->HrefValue = "";

            // DualMarkerREPORT
            $this->DualMarkerREPORT->LinkCustomAttributes = "";
            $this->DualMarkerREPORT->HrefValue = "";

            // Quadruple
            $this->Quadruple->LinkCustomAttributes = "";
            $this->Quadruple->HrefValue = "";

            // QuadrupleDATE
            $this->QuadrupleDATE->LinkCustomAttributes = "";
            $this->QuadrupleDATE->HrefValue = "";

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->LinkCustomAttributes = "";
            $this->QuadrupleINHOUSE->HrefValue = "";

            // QuadrupleREPORT
            $this->QuadrupleREPORT->LinkCustomAttributes = "";
            $this->QuadrupleREPORT->HrefValue = "";

            // A5month
            $this->A5month->LinkCustomAttributes = "";
            $this->A5month->HrefValue = "";

            // A5monthDATE
            $this->A5monthDATE->LinkCustomAttributes = "";
            $this->A5monthDATE->HrefValue = "";

            // A5monthINHOUSE
            $this->A5monthINHOUSE->LinkCustomAttributes = "";
            $this->A5monthINHOUSE->HrefValue = "";

            // A5monthREPORT
            $this->A5monthREPORT->LinkCustomAttributes = "";
            $this->A5monthREPORT->HrefValue = "";

            // A7month
            $this->A7month->LinkCustomAttributes = "";
            $this->A7month->HrefValue = "";

            // A7monthDATE
            $this->A7monthDATE->LinkCustomAttributes = "";
            $this->A7monthDATE->HrefValue = "";

            // A7monthINHOUSE
            $this->A7monthINHOUSE->LinkCustomAttributes = "";
            $this->A7monthINHOUSE->HrefValue = "";

            // A7monthREPORT
            $this->A7monthREPORT->LinkCustomAttributes = "";
            $this->A7monthREPORT->HrefValue = "";

            // A9month
            $this->A9month->LinkCustomAttributes = "";
            $this->A9month->HrefValue = "";

            // A9monthDATE
            $this->A9monthDATE->LinkCustomAttributes = "";
            $this->A9monthDATE->HrefValue = "";

            // A9monthINHOUSE
            $this->A9monthINHOUSE->LinkCustomAttributes = "";
            $this->A9monthINHOUSE->HrefValue = "";

            // A9monthREPORT
            $this->A9monthREPORT->LinkCustomAttributes = "";
            $this->A9monthREPORT->HrefValue = "";

            // INJ
            $this->INJ->LinkCustomAttributes = "";
            $this->INJ->HrefValue = "";

            // INJDATE
            $this->INJDATE->LinkCustomAttributes = "";
            $this->INJDATE->HrefValue = "";

            // INJINHOUSE
            $this->INJINHOUSE->LinkCustomAttributes = "";
            $this->INJINHOUSE->HrefValue = "";

            // INJREPORT
            $this->INJREPORT->LinkCustomAttributes = "";
            $this->INJREPORT->HrefValue = "";

            // Bleeding
            $this->Bleeding->LinkCustomAttributes = "";
            $this->Bleeding->HrefValue = "";

            // Hypothyroidism
            $this->Hypothyroidism->LinkCustomAttributes = "";
            $this->Hypothyroidism->HrefValue = "";

            // PICMENumber
            $this->PICMENumber->LinkCustomAttributes = "";
            $this->PICMENumber->HrefValue = "";

            // Outcome
            $this->Outcome->LinkCustomAttributes = "";
            $this->Outcome->HrefValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";

            // DateodProcedure
            $this->DateodProcedure->LinkCustomAttributes = "";
            $this->DateodProcedure->HrefValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";

            // ModeOfDelivery
            $this->ModeOfDelivery->LinkCustomAttributes = "";
            $this->ModeOfDelivery->HrefValue = "";

            // ND
            $this->ND->LinkCustomAttributes = "";
            $this->ND->HrefValue = "";

            // NDS
            $this->NDS->LinkCustomAttributes = "";
            $this->NDS->HrefValue = "";

            // NDP
            $this->NDP->LinkCustomAttributes = "";
            $this->NDP->HrefValue = "";

            // Vaccum
            $this->Vaccum->LinkCustomAttributes = "";
            $this->Vaccum->HrefValue = "";

            // VaccumS
            $this->VaccumS->LinkCustomAttributes = "";
            $this->VaccumS->HrefValue = "";

            // VaccumP
            $this->VaccumP->LinkCustomAttributes = "";
            $this->VaccumP->HrefValue = "";

            // Forceps
            $this->Forceps->LinkCustomAttributes = "";
            $this->Forceps->HrefValue = "";

            // ForcepsS
            $this->ForcepsS->LinkCustomAttributes = "";
            $this->ForcepsS->HrefValue = "";

            // ForcepsP
            $this->ForcepsP->LinkCustomAttributes = "";
            $this->ForcepsP->HrefValue = "";

            // Elective
            $this->Elective->LinkCustomAttributes = "";
            $this->Elective->HrefValue = "";

            // ElectiveS
            $this->ElectiveS->LinkCustomAttributes = "";
            $this->ElectiveS->HrefValue = "";

            // ElectiveP
            $this->ElectiveP->LinkCustomAttributes = "";
            $this->ElectiveP->HrefValue = "";

            // Emergency
            $this->Emergency->LinkCustomAttributes = "";
            $this->Emergency->HrefValue = "";

            // EmergencyS
            $this->EmergencyS->LinkCustomAttributes = "";
            $this->EmergencyS->HrefValue = "";

            // EmergencyP
            $this->EmergencyP->LinkCustomAttributes = "";
            $this->EmergencyP->HrefValue = "";

            // Maturity
            $this->Maturity->LinkCustomAttributes = "";
            $this->Maturity->HrefValue = "";

            // Baby1
            $this->Baby1->LinkCustomAttributes = "";
            $this->Baby1->HrefValue = "";

            // Baby2
            $this->Baby2->LinkCustomAttributes = "";
            $this->Baby2->HrefValue = "";

            // sex1
            $this->sex1->LinkCustomAttributes = "";
            $this->sex1->HrefValue = "";

            // sex2
            $this->sex2->LinkCustomAttributes = "";
            $this->sex2->HrefValue = "";

            // weight1
            $this->weight1->LinkCustomAttributes = "";
            $this->weight1->HrefValue = "";

            // weight2
            $this->weight2->LinkCustomAttributes = "";
            $this->weight2->HrefValue = "";

            // NICU1
            $this->NICU1->LinkCustomAttributes = "";
            $this->NICU1->HrefValue = "";

            // NICU2
            $this->NICU2->LinkCustomAttributes = "";
            $this->NICU2->HrefValue = "";

            // Jaundice1
            $this->Jaundice1->LinkCustomAttributes = "";
            $this->Jaundice1->HrefValue = "";

            // Jaundice2
            $this->Jaundice2->LinkCustomAttributes = "";
            $this->Jaundice2->HrefValue = "";

            // Others1
            $this->Others1->LinkCustomAttributes = "";
            $this->Others1->HrefValue = "";

            // Others2
            $this->Others2->LinkCustomAttributes = "";
            $this->Others2->HrefValue = "";

            // SpillOverReasons
            $this->SpillOverReasons->LinkCustomAttributes = "";
            $this->SpillOverReasons->HrefValue = "";

            // ANClosed
            $this->ANClosed->LinkCustomAttributes = "";
            $this->ANClosed->HrefValue = "";

            // ANClosedDATE
            $this->ANClosedDATE->LinkCustomAttributes = "";
            $this->ANClosedDATE->HrefValue = "";

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastMedicalHistoryOthers->HrefValue = "";

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastSurgicalHistoryOthers->HrefValue = "";

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->LinkCustomAttributes = "";
            $this->FamilyHistoryOthers->HrefValue = "";

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
            $this->PresentPregnancyComplicationsOthers->HrefValue = "";

            // ETdate
            $this->ETdate->LinkCustomAttributes = "";
            $this->ETdate->HrefValue = "";
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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->pid->Required) {
            if (!$this->pid->IsDetailKey && EmptyValue($this->pid->FormValue)) {
                $this->pid->addErrorMessage(str_replace("%s", $this->pid->caption(), $this->pid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->pid->FormValue)) {
            $this->pid->addErrorMessage($this->pid->getErrorMessage(false));
        }
        if ($this->fid->Required) {
            if (!$this->fid->IsDetailKey && EmptyValue($this->fid->FormValue)) {
                $this->fid->addErrorMessage(str_replace("%s", $this->fid->caption(), $this->fid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->fid->FormValue)) {
            $this->fid->addErrorMessage($this->fid->getErrorMessage(false));
        }
        if ($this->G->Required) {
            if (!$this->G->IsDetailKey && EmptyValue($this->G->FormValue)) {
                $this->G->addErrorMessage(str_replace("%s", $this->G->caption(), $this->G->RequiredErrorMessage));
            }
        }
        if ($this->P->Required) {
            if (!$this->P->IsDetailKey && EmptyValue($this->P->FormValue)) {
                $this->P->addErrorMessage(str_replace("%s", $this->P->caption(), $this->P->RequiredErrorMessage));
            }
        }
        if ($this->L->Required) {
            if (!$this->L->IsDetailKey && EmptyValue($this->L->FormValue)) {
                $this->L->addErrorMessage(str_replace("%s", $this->L->caption(), $this->L->RequiredErrorMessage));
            }
        }
        if ($this->A->Required) {
            if (!$this->A->IsDetailKey && EmptyValue($this->A->FormValue)) {
                $this->A->addErrorMessage(str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
            }
        }
        if ($this->E->Required) {
            if (!$this->E->IsDetailKey && EmptyValue($this->E->FormValue)) {
                $this->E->addErrorMessage(str_replace("%s", $this->E->caption(), $this->E->RequiredErrorMessage));
            }
        }
        if ($this->M->Required) {
            if (!$this->M->IsDetailKey && EmptyValue($this->M->FormValue)) {
                $this->M->addErrorMessage(str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
            }
        }
        if ($this->LMP->Required) {
            if (!$this->LMP->IsDetailKey && EmptyValue($this->LMP->FormValue)) {
                $this->LMP->addErrorMessage(str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
            }
        }
        if ($this->EDO->Required) {
            if (!$this->EDO->IsDetailKey && EmptyValue($this->EDO->FormValue)) {
                $this->EDO->addErrorMessage(str_replace("%s", $this->EDO->caption(), $this->EDO->RequiredErrorMessage));
            }
        }
        if ($this->MenstrualHistory->Required) {
            if (!$this->MenstrualHistory->IsDetailKey && EmptyValue($this->MenstrualHistory->FormValue)) {
                $this->MenstrualHistory->addErrorMessage(str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
            }
        }
        if ($this->MaritalHistory->Required) {
            if (!$this->MaritalHistory->IsDetailKey && EmptyValue($this->MaritalHistory->FormValue)) {
                $this->MaritalHistory->addErrorMessage(str_replace("%s", $this->MaritalHistory->caption(), $this->MaritalHistory->RequiredErrorMessage));
            }
        }
        if ($this->ObstetricHistory->Required) {
            if (!$this->ObstetricHistory->IsDetailKey && EmptyValue($this->ObstetricHistory->FormValue)) {
                $this->ObstetricHistory->addErrorMessage(str_replace("%s", $this->ObstetricHistory->caption(), $this->ObstetricHistory->RequiredErrorMessage));
            }
        }
        if ($this->PreviousHistoryofGDM->Required) {
            if (!$this->PreviousHistoryofGDM->IsDetailKey && EmptyValue($this->PreviousHistoryofGDM->FormValue)) {
                $this->PreviousHistoryofGDM->addErrorMessage(str_replace("%s", $this->PreviousHistoryofGDM->caption(), $this->PreviousHistoryofGDM->RequiredErrorMessage));
            }
        }
        if ($this->PreviousHistorofPIH->Required) {
            if (!$this->PreviousHistorofPIH->IsDetailKey && EmptyValue($this->PreviousHistorofPIH->FormValue)) {
                $this->PreviousHistorofPIH->addErrorMessage(str_replace("%s", $this->PreviousHistorofPIH->caption(), $this->PreviousHistorofPIH->RequiredErrorMessage));
            }
        }
        if ($this->PreviousHistoryofIUGR->Required) {
            if (!$this->PreviousHistoryofIUGR->IsDetailKey && EmptyValue($this->PreviousHistoryofIUGR->FormValue)) {
                $this->PreviousHistoryofIUGR->addErrorMessage(str_replace("%s", $this->PreviousHistoryofIUGR->caption(), $this->PreviousHistoryofIUGR->RequiredErrorMessage));
            }
        }
        if ($this->PreviousHistoryofOligohydramnios->Required) {
            if (!$this->PreviousHistoryofOligohydramnios->IsDetailKey && EmptyValue($this->PreviousHistoryofOligohydramnios->FormValue)) {
                $this->PreviousHistoryofOligohydramnios->addErrorMessage(str_replace("%s", $this->PreviousHistoryofOligohydramnios->caption(), $this->PreviousHistoryofOligohydramnios->RequiredErrorMessage));
            }
        }
        if ($this->PreviousHistoryofPreterm->Required) {
            if (!$this->PreviousHistoryofPreterm->IsDetailKey && EmptyValue($this->PreviousHistoryofPreterm->FormValue)) {
                $this->PreviousHistoryofPreterm->addErrorMessage(str_replace("%s", $this->PreviousHistoryofPreterm->caption(), $this->PreviousHistoryofPreterm->RequiredErrorMessage));
            }
        }
        if ($this->G1->Required) {
            if (!$this->G1->IsDetailKey && EmptyValue($this->G1->FormValue)) {
                $this->G1->addErrorMessage(str_replace("%s", $this->G1->caption(), $this->G1->RequiredErrorMessage));
            }
        }
        if ($this->G2->Required) {
            if (!$this->G2->IsDetailKey && EmptyValue($this->G2->FormValue)) {
                $this->G2->addErrorMessage(str_replace("%s", $this->G2->caption(), $this->G2->RequiredErrorMessage));
            }
        }
        if ($this->G3->Required) {
            if (!$this->G3->IsDetailKey && EmptyValue($this->G3->FormValue)) {
                $this->G3->addErrorMessage(str_replace("%s", $this->G3->caption(), $this->G3->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryNDLSCS1->Required) {
            if (!$this->DeliveryNDLSCS1->IsDetailKey && EmptyValue($this->DeliveryNDLSCS1->FormValue)) {
                $this->DeliveryNDLSCS1->addErrorMessage(str_replace("%s", $this->DeliveryNDLSCS1->caption(), $this->DeliveryNDLSCS1->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryNDLSCS2->Required) {
            if (!$this->DeliveryNDLSCS2->IsDetailKey && EmptyValue($this->DeliveryNDLSCS2->FormValue)) {
                $this->DeliveryNDLSCS2->addErrorMessage(str_replace("%s", $this->DeliveryNDLSCS2->caption(), $this->DeliveryNDLSCS2->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryNDLSCS3->Required) {
            if (!$this->DeliveryNDLSCS3->IsDetailKey && EmptyValue($this->DeliveryNDLSCS3->FormValue)) {
                $this->DeliveryNDLSCS3->addErrorMessage(str_replace("%s", $this->DeliveryNDLSCS3->caption(), $this->DeliveryNDLSCS3->RequiredErrorMessage));
            }
        }
        if ($this->BabySexweight1->Required) {
            if (!$this->BabySexweight1->IsDetailKey && EmptyValue($this->BabySexweight1->FormValue)) {
                $this->BabySexweight1->addErrorMessage(str_replace("%s", $this->BabySexweight1->caption(), $this->BabySexweight1->RequiredErrorMessage));
            }
        }
        if ($this->BabySexweight2->Required) {
            if (!$this->BabySexweight2->IsDetailKey && EmptyValue($this->BabySexweight2->FormValue)) {
                $this->BabySexweight2->addErrorMessage(str_replace("%s", $this->BabySexweight2->caption(), $this->BabySexweight2->RequiredErrorMessage));
            }
        }
        if ($this->BabySexweight3->Required) {
            if (!$this->BabySexweight3->IsDetailKey && EmptyValue($this->BabySexweight3->FormValue)) {
                $this->BabySexweight3->addErrorMessage(str_replace("%s", $this->BabySexweight3->caption(), $this->BabySexweight3->RequiredErrorMessage));
            }
        }
        if ($this->PastMedicalHistory->Required) {
            if (!$this->PastMedicalHistory->IsDetailKey && EmptyValue($this->PastMedicalHistory->FormValue)) {
                $this->PastMedicalHistory->addErrorMessage(str_replace("%s", $this->PastMedicalHistory->caption(), $this->PastMedicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->PastSurgicalHistory->Required) {
            if (!$this->PastSurgicalHistory->IsDetailKey && EmptyValue($this->PastSurgicalHistory->FormValue)) {
                $this->PastSurgicalHistory->addErrorMessage(str_replace("%s", $this->PastSurgicalHistory->caption(), $this->PastSurgicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->FamilyHistory->Required) {
            if (!$this->FamilyHistory->IsDetailKey && EmptyValue($this->FamilyHistory->FormValue)) {
                $this->FamilyHistory->addErrorMessage(str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
            }
        }
        if ($this->Viability->Required) {
            if (!$this->Viability->IsDetailKey && EmptyValue($this->Viability->FormValue)) {
                $this->Viability->addErrorMessage(str_replace("%s", $this->Viability->caption(), $this->Viability->RequiredErrorMessage));
            }
        }
        if ($this->ViabilityDATE->Required) {
            if (!$this->ViabilityDATE->IsDetailKey && EmptyValue($this->ViabilityDATE->FormValue)) {
                $this->ViabilityDATE->addErrorMessage(str_replace("%s", $this->ViabilityDATE->caption(), $this->ViabilityDATE->RequiredErrorMessage));
            }
        }
        if ($this->ViabilityREPORT->Required) {
            if (!$this->ViabilityREPORT->IsDetailKey && EmptyValue($this->ViabilityREPORT->FormValue)) {
                $this->ViabilityREPORT->addErrorMessage(str_replace("%s", $this->ViabilityREPORT->caption(), $this->ViabilityREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Viability2->Required) {
            if (!$this->Viability2->IsDetailKey && EmptyValue($this->Viability2->FormValue)) {
                $this->Viability2->addErrorMessage(str_replace("%s", $this->Viability2->caption(), $this->Viability2->RequiredErrorMessage));
            }
        }
        if ($this->Viability2DATE->Required) {
            if (!$this->Viability2DATE->IsDetailKey && EmptyValue($this->Viability2DATE->FormValue)) {
                $this->Viability2DATE->addErrorMessage(str_replace("%s", $this->Viability2DATE->caption(), $this->Viability2DATE->RequiredErrorMessage));
            }
        }
        if ($this->Viability2REPORT->Required) {
            if (!$this->Viability2REPORT->IsDetailKey && EmptyValue($this->Viability2REPORT->FormValue)) {
                $this->Viability2REPORT->addErrorMessage(str_replace("%s", $this->Viability2REPORT->caption(), $this->Viability2REPORT->RequiredErrorMessage));
            }
        }
        if ($this->NTscan->Required) {
            if (!$this->NTscan->IsDetailKey && EmptyValue($this->NTscan->FormValue)) {
                $this->NTscan->addErrorMessage(str_replace("%s", $this->NTscan->caption(), $this->NTscan->RequiredErrorMessage));
            }
        }
        if ($this->NTscanDATE->Required) {
            if (!$this->NTscanDATE->IsDetailKey && EmptyValue($this->NTscanDATE->FormValue)) {
                $this->NTscanDATE->addErrorMessage(str_replace("%s", $this->NTscanDATE->caption(), $this->NTscanDATE->RequiredErrorMessage));
            }
        }
        if ($this->NTscanREPORT->Required) {
            if (!$this->NTscanREPORT->IsDetailKey && EmptyValue($this->NTscanREPORT->FormValue)) {
                $this->NTscanREPORT->addErrorMessage(str_replace("%s", $this->NTscanREPORT->caption(), $this->NTscanREPORT->RequiredErrorMessage));
            }
        }
        if ($this->EarlyTarget->Required) {
            if (!$this->EarlyTarget->IsDetailKey && EmptyValue($this->EarlyTarget->FormValue)) {
                $this->EarlyTarget->addErrorMessage(str_replace("%s", $this->EarlyTarget->caption(), $this->EarlyTarget->RequiredErrorMessage));
            }
        }
        if ($this->EarlyTargetDATE->Required) {
            if (!$this->EarlyTargetDATE->IsDetailKey && EmptyValue($this->EarlyTargetDATE->FormValue)) {
                $this->EarlyTargetDATE->addErrorMessage(str_replace("%s", $this->EarlyTargetDATE->caption(), $this->EarlyTargetDATE->RequiredErrorMessage));
            }
        }
        if ($this->EarlyTargetREPORT->Required) {
            if (!$this->EarlyTargetREPORT->IsDetailKey && EmptyValue($this->EarlyTargetREPORT->FormValue)) {
                $this->EarlyTargetREPORT->addErrorMessage(str_replace("%s", $this->EarlyTargetREPORT->caption(), $this->EarlyTargetREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Anomaly->Required) {
            if (!$this->Anomaly->IsDetailKey && EmptyValue($this->Anomaly->FormValue)) {
                $this->Anomaly->addErrorMessage(str_replace("%s", $this->Anomaly->caption(), $this->Anomaly->RequiredErrorMessage));
            }
        }
        if ($this->AnomalyDATE->Required) {
            if (!$this->AnomalyDATE->IsDetailKey && EmptyValue($this->AnomalyDATE->FormValue)) {
                $this->AnomalyDATE->addErrorMessage(str_replace("%s", $this->AnomalyDATE->caption(), $this->AnomalyDATE->RequiredErrorMessage));
            }
        }
        if ($this->AnomalyREPORT->Required) {
            if (!$this->AnomalyREPORT->IsDetailKey && EmptyValue($this->AnomalyREPORT->FormValue)) {
                $this->AnomalyREPORT->addErrorMessage(str_replace("%s", $this->AnomalyREPORT->caption(), $this->AnomalyREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Growth->Required) {
            if (!$this->Growth->IsDetailKey && EmptyValue($this->Growth->FormValue)) {
                $this->Growth->addErrorMessage(str_replace("%s", $this->Growth->caption(), $this->Growth->RequiredErrorMessage));
            }
        }
        if ($this->GrowthDATE->Required) {
            if (!$this->GrowthDATE->IsDetailKey && EmptyValue($this->GrowthDATE->FormValue)) {
                $this->GrowthDATE->addErrorMessage(str_replace("%s", $this->GrowthDATE->caption(), $this->GrowthDATE->RequiredErrorMessage));
            }
        }
        if ($this->GrowthREPORT->Required) {
            if (!$this->GrowthREPORT->IsDetailKey && EmptyValue($this->GrowthREPORT->FormValue)) {
                $this->GrowthREPORT->addErrorMessage(str_replace("%s", $this->GrowthREPORT->caption(), $this->GrowthREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Growth1->Required) {
            if (!$this->Growth1->IsDetailKey && EmptyValue($this->Growth1->FormValue)) {
                $this->Growth1->addErrorMessage(str_replace("%s", $this->Growth1->caption(), $this->Growth1->RequiredErrorMessage));
            }
        }
        if ($this->Growth1DATE->Required) {
            if (!$this->Growth1DATE->IsDetailKey && EmptyValue($this->Growth1DATE->FormValue)) {
                $this->Growth1DATE->addErrorMessage(str_replace("%s", $this->Growth1DATE->caption(), $this->Growth1DATE->RequiredErrorMessage));
            }
        }
        if ($this->Growth1REPORT->Required) {
            if (!$this->Growth1REPORT->IsDetailKey && EmptyValue($this->Growth1REPORT->FormValue)) {
                $this->Growth1REPORT->addErrorMessage(str_replace("%s", $this->Growth1REPORT->caption(), $this->Growth1REPORT->RequiredErrorMessage));
            }
        }
        if ($this->ANProfile->Required) {
            if (!$this->ANProfile->IsDetailKey && EmptyValue($this->ANProfile->FormValue)) {
                $this->ANProfile->addErrorMessage(str_replace("%s", $this->ANProfile->caption(), $this->ANProfile->RequiredErrorMessage));
            }
        }
        if ($this->ANProfileDATE->Required) {
            if (!$this->ANProfileDATE->IsDetailKey && EmptyValue($this->ANProfileDATE->FormValue)) {
                $this->ANProfileDATE->addErrorMessage(str_replace("%s", $this->ANProfileDATE->caption(), $this->ANProfileDATE->RequiredErrorMessage));
            }
        }
        if ($this->ANProfileINHOUSE->Required) {
            if (!$this->ANProfileINHOUSE->IsDetailKey && EmptyValue($this->ANProfileINHOUSE->FormValue)) {
                $this->ANProfileINHOUSE->addErrorMessage(str_replace("%s", $this->ANProfileINHOUSE->caption(), $this->ANProfileINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->ANProfileREPORT->Required) {
            if (!$this->ANProfileREPORT->IsDetailKey && EmptyValue($this->ANProfileREPORT->FormValue)) {
                $this->ANProfileREPORT->addErrorMessage(str_replace("%s", $this->ANProfileREPORT->caption(), $this->ANProfileREPORT->RequiredErrorMessage));
            }
        }
        if ($this->DualMarker->Required) {
            if (!$this->DualMarker->IsDetailKey && EmptyValue($this->DualMarker->FormValue)) {
                $this->DualMarker->addErrorMessage(str_replace("%s", $this->DualMarker->caption(), $this->DualMarker->RequiredErrorMessage));
            }
        }
        if ($this->DualMarkerDATE->Required) {
            if (!$this->DualMarkerDATE->IsDetailKey && EmptyValue($this->DualMarkerDATE->FormValue)) {
                $this->DualMarkerDATE->addErrorMessage(str_replace("%s", $this->DualMarkerDATE->caption(), $this->DualMarkerDATE->RequiredErrorMessage));
            }
        }
        if ($this->DualMarkerINHOUSE->Required) {
            if (!$this->DualMarkerINHOUSE->IsDetailKey && EmptyValue($this->DualMarkerINHOUSE->FormValue)) {
                $this->DualMarkerINHOUSE->addErrorMessage(str_replace("%s", $this->DualMarkerINHOUSE->caption(), $this->DualMarkerINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->DualMarkerREPORT->Required) {
            if (!$this->DualMarkerREPORT->IsDetailKey && EmptyValue($this->DualMarkerREPORT->FormValue)) {
                $this->DualMarkerREPORT->addErrorMessage(str_replace("%s", $this->DualMarkerREPORT->caption(), $this->DualMarkerREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Quadruple->Required) {
            if (!$this->Quadruple->IsDetailKey && EmptyValue($this->Quadruple->FormValue)) {
                $this->Quadruple->addErrorMessage(str_replace("%s", $this->Quadruple->caption(), $this->Quadruple->RequiredErrorMessage));
            }
        }
        if ($this->QuadrupleDATE->Required) {
            if (!$this->QuadrupleDATE->IsDetailKey && EmptyValue($this->QuadrupleDATE->FormValue)) {
                $this->QuadrupleDATE->addErrorMessage(str_replace("%s", $this->QuadrupleDATE->caption(), $this->QuadrupleDATE->RequiredErrorMessage));
            }
        }
        if ($this->QuadrupleINHOUSE->Required) {
            if (!$this->QuadrupleINHOUSE->IsDetailKey && EmptyValue($this->QuadrupleINHOUSE->FormValue)) {
                $this->QuadrupleINHOUSE->addErrorMessage(str_replace("%s", $this->QuadrupleINHOUSE->caption(), $this->QuadrupleINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->QuadrupleREPORT->Required) {
            if (!$this->QuadrupleREPORT->IsDetailKey && EmptyValue($this->QuadrupleREPORT->FormValue)) {
                $this->QuadrupleREPORT->addErrorMessage(str_replace("%s", $this->QuadrupleREPORT->caption(), $this->QuadrupleREPORT->RequiredErrorMessage));
            }
        }
        if ($this->A5month->Required) {
            if (!$this->A5month->IsDetailKey && EmptyValue($this->A5month->FormValue)) {
                $this->A5month->addErrorMessage(str_replace("%s", $this->A5month->caption(), $this->A5month->RequiredErrorMessage));
            }
        }
        if ($this->A5monthDATE->Required) {
            if (!$this->A5monthDATE->IsDetailKey && EmptyValue($this->A5monthDATE->FormValue)) {
                $this->A5monthDATE->addErrorMessage(str_replace("%s", $this->A5monthDATE->caption(), $this->A5monthDATE->RequiredErrorMessage));
            }
        }
        if ($this->A5monthINHOUSE->Required) {
            if (!$this->A5monthINHOUSE->IsDetailKey && EmptyValue($this->A5monthINHOUSE->FormValue)) {
                $this->A5monthINHOUSE->addErrorMessage(str_replace("%s", $this->A5monthINHOUSE->caption(), $this->A5monthINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->A5monthREPORT->Required) {
            if (!$this->A5monthREPORT->IsDetailKey && EmptyValue($this->A5monthREPORT->FormValue)) {
                $this->A5monthREPORT->addErrorMessage(str_replace("%s", $this->A5monthREPORT->caption(), $this->A5monthREPORT->RequiredErrorMessage));
            }
        }
        if ($this->A7month->Required) {
            if (!$this->A7month->IsDetailKey && EmptyValue($this->A7month->FormValue)) {
                $this->A7month->addErrorMessage(str_replace("%s", $this->A7month->caption(), $this->A7month->RequiredErrorMessage));
            }
        }
        if ($this->A7monthDATE->Required) {
            if (!$this->A7monthDATE->IsDetailKey && EmptyValue($this->A7monthDATE->FormValue)) {
                $this->A7monthDATE->addErrorMessage(str_replace("%s", $this->A7monthDATE->caption(), $this->A7monthDATE->RequiredErrorMessage));
            }
        }
        if ($this->A7monthINHOUSE->Required) {
            if (!$this->A7monthINHOUSE->IsDetailKey && EmptyValue($this->A7monthINHOUSE->FormValue)) {
                $this->A7monthINHOUSE->addErrorMessage(str_replace("%s", $this->A7monthINHOUSE->caption(), $this->A7monthINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->A7monthREPORT->Required) {
            if (!$this->A7monthREPORT->IsDetailKey && EmptyValue($this->A7monthREPORT->FormValue)) {
                $this->A7monthREPORT->addErrorMessage(str_replace("%s", $this->A7monthREPORT->caption(), $this->A7monthREPORT->RequiredErrorMessage));
            }
        }
        if ($this->A9month->Required) {
            if (!$this->A9month->IsDetailKey && EmptyValue($this->A9month->FormValue)) {
                $this->A9month->addErrorMessage(str_replace("%s", $this->A9month->caption(), $this->A9month->RequiredErrorMessage));
            }
        }
        if ($this->A9monthDATE->Required) {
            if (!$this->A9monthDATE->IsDetailKey && EmptyValue($this->A9monthDATE->FormValue)) {
                $this->A9monthDATE->addErrorMessage(str_replace("%s", $this->A9monthDATE->caption(), $this->A9monthDATE->RequiredErrorMessage));
            }
        }
        if ($this->A9monthINHOUSE->Required) {
            if (!$this->A9monthINHOUSE->IsDetailKey && EmptyValue($this->A9monthINHOUSE->FormValue)) {
                $this->A9monthINHOUSE->addErrorMessage(str_replace("%s", $this->A9monthINHOUSE->caption(), $this->A9monthINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->A9monthREPORT->Required) {
            if (!$this->A9monthREPORT->IsDetailKey && EmptyValue($this->A9monthREPORT->FormValue)) {
                $this->A9monthREPORT->addErrorMessage(str_replace("%s", $this->A9monthREPORT->caption(), $this->A9monthREPORT->RequiredErrorMessage));
            }
        }
        if ($this->INJ->Required) {
            if (!$this->INJ->IsDetailKey && EmptyValue($this->INJ->FormValue)) {
                $this->INJ->addErrorMessage(str_replace("%s", $this->INJ->caption(), $this->INJ->RequiredErrorMessage));
            }
        }
        if ($this->INJDATE->Required) {
            if (!$this->INJDATE->IsDetailKey && EmptyValue($this->INJDATE->FormValue)) {
                $this->INJDATE->addErrorMessage(str_replace("%s", $this->INJDATE->caption(), $this->INJDATE->RequiredErrorMessage));
            }
        }
        if ($this->INJINHOUSE->Required) {
            if (!$this->INJINHOUSE->IsDetailKey && EmptyValue($this->INJINHOUSE->FormValue)) {
                $this->INJINHOUSE->addErrorMessage(str_replace("%s", $this->INJINHOUSE->caption(), $this->INJINHOUSE->RequiredErrorMessage));
            }
        }
        if ($this->INJREPORT->Required) {
            if (!$this->INJREPORT->IsDetailKey && EmptyValue($this->INJREPORT->FormValue)) {
                $this->INJREPORT->addErrorMessage(str_replace("%s", $this->INJREPORT->caption(), $this->INJREPORT->RequiredErrorMessage));
            }
        }
        if ($this->Bleeding->Required) {
            if (!$this->Bleeding->IsDetailKey && EmptyValue($this->Bleeding->FormValue)) {
                $this->Bleeding->addErrorMessage(str_replace("%s", $this->Bleeding->caption(), $this->Bleeding->RequiredErrorMessage));
            }
        }
        if ($this->Hypothyroidism->Required) {
            if (!$this->Hypothyroidism->IsDetailKey && EmptyValue($this->Hypothyroidism->FormValue)) {
                $this->Hypothyroidism->addErrorMessage(str_replace("%s", $this->Hypothyroidism->caption(), $this->Hypothyroidism->RequiredErrorMessage));
            }
        }
        if ($this->PICMENumber->Required) {
            if (!$this->PICMENumber->IsDetailKey && EmptyValue($this->PICMENumber->FormValue)) {
                $this->PICMENumber->addErrorMessage(str_replace("%s", $this->PICMENumber->caption(), $this->PICMENumber->RequiredErrorMessage));
            }
        }
        if ($this->Outcome->Required) {
            if (!$this->Outcome->IsDetailKey && EmptyValue($this->Outcome->FormValue)) {
                $this->Outcome->addErrorMessage(str_replace("%s", $this->Outcome->caption(), $this->Outcome->RequiredErrorMessage));
            }
        }
        if ($this->DateofAdmission->Required) {
            if (!$this->DateofAdmission->IsDetailKey && EmptyValue($this->DateofAdmission->FormValue)) {
                $this->DateofAdmission->addErrorMessage(str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
            }
        }
        if ($this->DateodProcedure->Required) {
            if (!$this->DateodProcedure->IsDetailKey && EmptyValue($this->DateodProcedure->FormValue)) {
                $this->DateodProcedure->addErrorMessage(str_replace("%s", $this->DateodProcedure->caption(), $this->DateodProcedure->RequiredErrorMessage));
            }
        }
        if ($this->Miscarriage->Required) {
            if (!$this->Miscarriage->IsDetailKey && EmptyValue($this->Miscarriage->FormValue)) {
                $this->Miscarriage->addErrorMessage(str_replace("%s", $this->Miscarriage->caption(), $this->Miscarriage->RequiredErrorMessage));
            }
        }
        if ($this->ModeOfDelivery->Required) {
            if (!$this->ModeOfDelivery->IsDetailKey && EmptyValue($this->ModeOfDelivery->FormValue)) {
                $this->ModeOfDelivery->addErrorMessage(str_replace("%s", $this->ModeOfDelivery->caption(), $this->ModeOfDelivery->RequiredErrorMessage));
            }
        }
        if ($this->ND->Required) {
            if (!$this->ND->IsDetailKey && EmptyValue($this->ND->FormValue)) {
                $this->ND->addErrorMessage(str_replace("%s", $this->ND->caption(), $this->ND->RequiredErrorMessage));
            }
        }
        if ($this->NDS->Required) {
            if (!$this->NDS->IsDetailKey && EmptyValue($this->NDS->FormValue)) {
                $this->NDS->addErrorMessage(str_replace("%s", $this->NDS->caption(), $this->NDS->RequiredErrorMessage));
            }
        }
        if ($this->NDP->Required) {
            if (!$this->NDP->IsDetailKey && EmptyValue($this->NDP->FormValue)) {
                $this->NDP->addErrorMessage(str_replace("%s", $this->NDP->caption(), $this->NDP->RequiredErrorMessage));
            }
        }
        if ($this->Vaccum->Required) {
            if (!$this->Vaccum->IsDetailKey && EmptyValue($this->Vaccum->FormValue)) {
                $this->Vaccum->addErrorMessage(str_replace("%s", $this->Vaccum->caption(), $this->Vaccum->RequiredErrorMessage));
            }
        }
        if ($this->VaccumS->Required) {
            if (!$this->VaccumS->IsDetailKey && EmptyValue($this->VaccumS->FormValue)) {
                $this->VaccumS->addErrorMessage(str_replace("%s", $this->VaccumS->caption(), $this->VaccumS->RequiredErrorMessage));
            }
        }
        if ($this->VaccumP->Required) {
            if (!$this->VaccumP->IsDetailKey && EmptyValue($this->VaccumP->FormValue)) {
                $this->VaccumP->addErrorMessage(str_replace("%s", $this->VaccumP->caption(), $this->VaccumP->RequiredErrorMessage));
            }
        }
        if ($this->Forceps->Required) {
            if (!$this->Forceps->IsDetailKey && EmptyValue($this->Forceps->FormValue)) {
                $this->Forceps->addErrorMessage(str_replace("%s", $this->Forceps->caption(), $this->Forceps->RequiredErrorMessage));
            }
        }
        if ($this->ForcepsS->Required) {
            if (!$this->ForcepsS->IsDetailKey && EmptyValue($this->ForcepsS->FormValue)) {
                $this->ForcepsS->addErrorMessage(str_replace("%s", $this->ForcepsS->caption(), $this->ForcepsS->RequiredErrorMessage));
            }
        }
        if ($this->ForcepsP->Required) {
            if (!$this->ForcepsP->IsDetailKey && EmptyValue($this->ForcepsP->FormValue)) {
                $this->ForcepsP->addErrorMessage(str_replace("%s", $this->ForcepsP->caption(), $this->ForcepsP->RequiredErrorMessage));
            }
        }
        if ($this->Elective->Required) {
            if (!$this->Elective->IsDetailKey && EmptyValue($this->Elective->FormValue)) {
                $this->Elective->addErrorMessage(str_replace("%s", $this->Elective->caption(), $this->Elective->RequiredErrorMessage));
            }
        }
        if ($this->ElectiveS->Required) {
            if (!$this->ElectiveS->IsDetailKey && EmptyValue($this->ElectiveS->FormValue)) {
                $this->ElectiveS->addErrorMessage(str_replace("%s", $this->ElectiveS->caption(), $this->ElectiveS->RequiredErrorMessage));
            }
        }
        if ($this->ElectiveP->Required) {
            if (!$this->ElectiveP->IsDetailKey && EmptyValue($this->ElectiveP->FormValue)) {
                $this->ElectiveP->addErrorMessage(str_replace("%s", $this->ElectiveP->caption(), $this->ElectiveP->RequiredErrorMessage));
            }
        }
        if ($this->Emergency->Required) {
            if (!$this->Emergency->IsDetailKey && EmptyValue($this->Emergency->FormValue)) {
                $this->Emergency->addErrorMessage(str_replace("%s", $this->Emergency->caption(), $this->Emergency->RequiredErrorMessage));
            }
        }
        if ($this->EmergencyS->Required) {
            if (!$this->EmergencyS->IsDetailKey && EmptyValue($this->EmergencyS->FormValue)) {
                $this->EmergencyS->addErrorMessage(str_replace("%s", $this->EmergencyS->caption(), $this->EmergencyS->RequiredErrorMessage));
            }
        }
        if ($this->EmergencyP->Required) {
            if (!$this->EmergencyP->IsDetailKey && EmptyValue($this->EmergencyP->FormValue)) {
                $this->EmergencyP->addErrorMessage(str_replace("%s", $this->EmergencyP->caption(), $this->EmergencyP->RequiredErrorMessage));
            }
        }
        if ($this->Maturity->Required) {
            if (!$this->Maturity->IsDetailKey && EmptyValue($this->Maturity->FormValue)) {
                $this->Maturity->addErrorMessage(str_replace("%s", $this->Maturity->caption(), $this->Maturity->RequiredErrorMessage));
            }
        }
        if ($this->Baby1->Required) {
            if (!$this->Baby1->IsDetailKey && EmptyValue($this->Baby1->FormValue)) {
                $this->Baby1->addErrorMessage(str_replace("%s", $this->Baby1->caption(), $this->Baby1->RequiredErrorMessage));
            }
        }
        if ($this->Baby2->Required) {
            if (!$this->Baby2->IsDetailKey && EmptyValue($this->Baby2->FormValue)) {
                $this->Baby2->addErrorMessage(str_replace("%s", $this->Baby2->caption(), $this->Baby2->RequiredErrorMessage));
            }
        }
        if ($this->sex1->Required) {
            if (!$this->sex1->IsDetailKey && EmptyValue($this->sex1->FormValue)) {
                $this->sex1->addErrorMessage(str_replace("%s", $this->sex1->caption(), $this->sex1->RequiredErrorMessage));
            }
        }
        if ($this->sex2->Required) {
            if (!$this->sex2->IsDetailKey && EmptyValue($this->sex2->FormValue)) {
                $this->sex2->addErrorMessage(str_replace("%s", $this->sex2->caption(), $this->sex2->RequiredErrorMessage));
            }
        }
        if ($this->weight1->Required) {
            if (!$this->weight1->IsDetailKey && EmptyValue($this->weight1->FormValue)) {
                $this->weight1->addErrorMessage(str_replace("%s", $this->weight1->caption(), $this->weight1->RequiredErrorMessage));
            }
        }
        if ($this->weight2->Required) {
            if (!$this->weight2->IsDetailKey && EmptyValue($this->weight2->FormValue)) {
                $this->weight2->addErrorMessage(str_replace("%s", $this->weight2->caption(), $this->weight2->RequiredErrorMessage));
            }
        }
        if ($this->NICU1->Required) {
            if (!$this->NICU1->IsDetailKey && EmptyValue($this->NICU1->FormValue)) {
                $this->NICU1->addErrorMessage(str_replace("%s", $this->NICU1->caption(), $this->NICU1->RequiredErrorMessage));
            }
        }
        if ($this->NICU2->Required) {
            if (!$this->NICU2->IsDetailKey && EmptyValue($this->NICU2->FormValue)) {
                $this->NICU2->addErrorMessage(str_replace("%s", $this->NICU2->caption(), $this->NICU2->RequiredErrorMessage));
            }
        }
        if ($this->Jaundice1->Required) {
            if (!$this->Jaundice1->IsDetailKey && EmptyValue($this->Jaundice1->FormValue)) {
                $this->Jaundice1->addErrorMessage(str_replace("%s", $this->Jaundice1->caption(), $this->Jaundice1->RequiredErrorMessage));
            }
        }
        if ($this->Jaundice2->Required) {
            if (!$this->Jaundice2->IsDetailKey && EmptyValue($this->Jaundice2->FormValue)) {
                $this->Jaundice2->addErrorMessage(str_replace("%s", $this->Jaundice2->caption(), $this->Jaundice2->RequiredErrorMessage));
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
        if ($this->SpillOverReasons->Required) {
            if (!$this->SpillOverReasons->IsDetailKey && EmptyValue($this->SpillOverReasons->FormValue)) {
                $this->SpillOverReasons->addErrorMessage(str_replace("%s", $this->SpillOverReasons->caption(), $this->SpillOverReasons->RequiredErrorMessage));
            }
        }
        if ($this->ANClosed->Required) {
            if (!$this->ANClosed->IsDetailKey && EmptyValue($this->ANClosed->FormValue)) {
                $this->ANClosed->addErrorMessage(str_replace("%s", $this->ANClosed->caption(), $this->ANClosed->RequiredErrorMessage));
            }
        }
        if ($this->ANClosedDATE->Required) {
            if (!$this->ANClosedDATE->IsDetailKey && EmptyValue($this->ANClosedDATE->FormValue)) {
                $this->ANClosedDATE->addErrorMessage(str_replace("%s", $this->ANClosedDATE->caption(), $this->ANClosedDATE->RequiredErrorMessage));
            }
        }
        if ($this->PastMedicalHistoryOthers->Required) {
            if (!$this->PastMedicalHistoryOthers->IsDetailKey && EmptyValue($this->PastMedicalHistoryOthers->FormValue)) {
                $this->PastMedicalHistoryOthers->addErrorMessage(str_replace("%s", $this->PastMedicalHistoryOthers->caption(), $this->PastMedicalHistoryOthers->RequiredErrorMessage));
            }
        }
        if ($this->PastSurgicalHistoryOthers->Required) {
            if (!$this->PastSurgicalHistoryOthers->IsDetailKey && EmptyValue($this->PastSurgicalHistoryOthers->FormValue)) {
                $this->PastSurgicalHistoryOthers->addErrorMessage(str_replace("%s", $this->PastSurgicalHistoryOthers->caption(), $this->PastSurgicalHistoryOthers->RequiredErrorMessage));
            }
        }
        if ($this->FamilyHistoryOthers->Required) {
            if (!$this->FamilyHistoryOthers->IsDetailKey && EmptyValue($this->FamilyHistoryOthers->FormValue)) {
                $this->FamilyHistoryOthers->addErrorMessage(str_replace("%s", $this->FamilyHistoryOthers->caption(), $this->FamilyHistoryOthers->RequiredErrorMessage));
            }
        }
        if ($this->PresentPregnancyComplicationsOthers->Required) {
            if (!$this->PresentPregnancyComplicationsOthers->IsDetailKey && EmptyValue($this->PresentPregnancyComplicationsOthers->FormValue)) {
                $this->PresentPregnancyComplicationsOthers->addErrorMessage(str_replace("%s", $this->PresentPregnancyComplicationsOthers->caption(), $this->PresentPregnancyComplicationsOthers->RequiredErrorMessage));
            }
        }
        if ($this->ETdate->Required) {
            if (!$this->ETdate->IsDetailKey && EmptyValue($this->ETdate->FormValue)) {
                $this->ETdate->addErrorMessage(str_replace("%s", $this->ETdate->caption(), $this->ETdate->RequiredErrorMessage));
            }
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // pid
            $this->pid->setDbValueDef($rsnew, $this->pid->CurrentValue, null, $this->pid->ReadOnly);

            // fid
            $this->fid->setDbValueDef($rsnew, $this->fid->CurrentValue, null, $this->fid->ReadOnly);

            // G
            $this->G->setDbValueDef($rsnew, $this->G->CurrentValue, null, $this->G->ReadOnly);

            // P
            $this->P->setDbValueDef($rsnew, $this->P->CurrentValue, null, $this->P->ReadOnly);

            // L
            $this->L->setDbValueDef($rsnew, $this->L->CurrentValue, null, $this->L->ReadOnly);

            // A
            $this->A->setDbValueDef($rsnew, $this->A->CurrentValue, null, $this->A->ReadOnly);

            // E
            $this->E->setDbValueDef($rsnew, $this->E->CurrentValue, null, $this->E->ReadOnly);

            // M
            $this->M->setDbValueDef($rsnew, $this->M->CurrentValue, null, $this->M->ReadOnly);

            // LMP
            $this->LMP->setDbValueDef($rsnew, $this->LMP->CurrentValue, null, $this->LMP->ReadOnly);

            // EDO
            $this->EDO->setDbValueDef($rsnew, $this->EDO->CurrentValue, null, $this->EDO->ReadOnly);

            // MenstrualHistory
            $this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, null, $this->MenstrualHistory->ReadOnly);

            // MaritalHistory
            $this->MaritalHistory->setDbValueDef($rsnew, $this->MaritalHistory->CurrentValue, null, $this->MaritalHistory->ReadOnly);

            // ObstetricHistory
            $this->ObstetricHistory->setDbValueDef($rsnew, $this->ObstetricHistory->CurrentValue, null, $this->ObstetricHistory->ReadOnly);

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->setDbValueDef($rsnew, $this->PreviousHistoryofGDM->CurrentValue, null, $this->PreviousHistoryofGDM->ReadOnly);

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->setDbValueDef($rsnew, $this->PreviousHistorofPIH->CurrentValue, null, $this->PreviousHistorofPIH->ReadOnly);

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->setDbValueDef($rsnew, $this->PreviousHistoryofIUGR->CurrentValue, null, $this->PreviousHistoryofIUGR->ReadOnly);

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->setDbValueDef($rsnew, $this->PreviousHistoryofOligohydramnios->CurrentValue, null, $this->PreviousHistoryofOligohydramnios->ReadOnly);

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->setDbValueDef($rsnew, $this->PreviousHistoryofPreterm->CurrentValue, null, $this->PreviousHistoryofPreterm->ReadOnly);

            // G1
            $this->G1->setDbValueDef($rsnew, $this->G1->CurrentValue, null, $this->G1->ReadOnly);

            // G2
            $this->G2->setDbValueDef($rsnew, $this->G2->CurrentValue, null, $this->G2->ReadOnly);

            // G3
            $this->G3->setDbValueDef($rsnew, $this->G3->CurrentValue, null, $this->G3->ReadOnly);

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->setDbValueDef($rsnew, $this->DeliveryNDLSCS1->CurrentValue, null, $this->DeliveryNDLSCS1->ReadOnly);

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->setDbValueDef($rsnew, $this->DeliveryNDLSCS2->CurrentValue, null, $this->DeliveryNDLSCS2->ReadOnly);

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->setDbValueDef($rsnew, $this->DeliveryNDLSCS3->CurrentValue, null, $this->DeliveryNDLSCS3->ReadOnly);

            // BabySexweight1
            $this->BabySexweight1->setDbValueDef($rsnew, $this->BabySexweight1->CurrentValue, null, $this->BabySexweight1->ReadOnly);

            // BabySexweight2
            $this->BabySexweight2->setDbValueDef($rsnew, $this->BabySexweight2->CurrentValue, null, $this->BabySexweight2->ReadOnly);

            // BabySexweight3
            $this->BabySexweight3->setDbValueDef($rsnew, $this->BabySexweight3->CurrentValue, null, $this->BabySexweight3->ReadOnly);

            // PastMedicalHistory
            $this->PastMedicalHistory->setDbValueDef($rsnew, $this->PastMedicalHistory->CurrentValue, null, $this->PastMedicalHistory->ReadOnly);

            // PastSurgicalHistory
            $this->PastSurgicalHistory->setDbValueDef($rsnew, $this->PastSurgicalHistory->CurrentValue, null, $this->PastSurgicalHistory->ReadOnly);

            // FamilyHistory
            $this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, null, $this->FamilyHistory->ReadOnly);

            // Viability
            $this->Viability->setDbValueDef($rsnew, $this->Viability->CurrentValue, null, $this->Viability->ReadOnly);

            // ViabilityDATE
            $this->ViabilityDATE->setDbValueDef($rsnew, $this->ViabilityDATE->CurrentValue, null, $this->ViabilityDATE->ReadOnly);

            // ViabilityREPORT
            $this->ViabilityREPORT->setDbValueDef($rsnew, $this->ViabilityREPORT->CurrentValue, null, $this->ViabilityREPORT->ReadOnly);

            // Viability2
            $this->Viability2->setDbValueDef($rsnew, $this->Viability2->CurrentValue, null, $this->Viability2->ReadOnly);

            // Viability2DATE
            $this->Viability2DATE->setDbValueDef($rsnew, $this->Viability2DATE->CurrentValue, null, $this->Viability2DATE->ReadOnly);

            // Viability2REPORT
            $this->Viability2REPORT->setDbValueDef($rsnew, $this->Viability2REPORT->CurrentValue, null, $this->Viability2REPORT->ReadOnly);

            // NTscan
            $this->NTscan->setDbValueDef($rsnew, $this->NTscan->CurrentValue, null, $this->NTscan->ReadOnly);

            // NTscanDATE
            $this->NTscanDATE->setDbValueDef($rsnew, $this->NTscanDATE->CurrentValue, null, $this->NTscanDATE->ReadOnly);

            // NTscanREPORT
            $this->NTscanREPORT->setDbValueDef($rsnew, $this->NTscanREPORT->CurrentValue, null, $this->NTscanREPORT->ReadOnly);

            // EarlyTarget
            $this->EarlyTarget->setDbValueDef($rsnew, $this->EarlyTarget->CurrentValue, null, $this->EarlyTarget->ReadOnly);

            // EarlyTargetDATE
            $this->EarlyTargetDATE->setDbValueDef($rsnew, $this->EarlyTargetDATE->CurrentValue, null, $this->EarlyTargetDATE->ReadOnly);

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->setDbValueDef($rsnew, $this->EarlyTargetREPORT->CurrentValue, null, $this->EarlyTargetREPORT->ReadOnly);

            // Anomaly
            $this->Anomaly->setDbValueDef($rsnew, $this->Anomaly->CurrentValue, null, $this->Anomaly->ReadOnly);

            // AnomalyDATE
            $this->AnomalyDATE->setDbValueDef($rsnew, $this->AnomalyDATE->CurrentValue, null, $this->AnomalyDATE->ReadOnly);

            // AnomalyREPORT
            $this->AnomalyREPORT->setDbValueDef($rsnew, $this->AnomalyREPORT->CurrentValue, null, $this->AnomalyREPORT->ReadOnly);

            // Growth
            $this->Growth->setDbValueDef($rsnew, $this->Growth->CurrentValue, null, $this->Growth->ReadOnly);

            // GrowthDATE
            $this->GrowthDATE->setDbValueDef($rsnew, $this->GrowthDATE->CurrentValue, null, $this->GrowthDATE->ReadOnly);

            // GrowthREPORT
            $this->GrowthREPORT->setDbValueDef($rsnew, $this->GrowthREPORT->CurrentValue, null, $this->GrowthREPORT->ReadOnly);

            // Growth1
            $this->Growth1->setDbValueDef($rsnew, $this->Growth1->CurrentValue, null, $this->Growth1->ReadOnly);

            // Growth1DATE
            $this->Growth1DATE->setDbValueDef($rsnew, $this->Growth1DATE->CurrentValue, null, $this->Growth1DATE->ReadOnly);

            // Growth1REPORT
            $this->Growth1REPORT->setDbValueDef($rsnew, $this->Growth1REPORT->CurrentValue, null, $this->Growth1REPORT->ReadOnly);

            // ANProfile
            $this->ANProfile->setDbValueDef($rsnew, $this->ANProfile->CurrentValue, null, $this->ANProfile->ReadOnly);

            // ANProfileDATE
            $this->ANProfileDATE->setDbValueDef($rsnew, $this->ANProfileDATE->CurrentValue, null, $this->ANProfileDATE->ReadOnly);

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->setDbValueDef($rsnew, $this->ANProfileINHOUSE->CurrentValue, null, $this->ANProfileINHOUSE->ReadOnly);

            // ANProfileREPORT
            $this->ANProfileREPORT->setDbValueDef($rsnew, $this->ANProfileREPORT->CurrentValue, null, $this->ANProfileREPORT->ReadOnly);

            // DualMarker
            $this->DualMarker->setDbValueDef($rsnew, $this->DualMarker->CurrentValue, null, $this->DualMarker->ReadOnly);

            // DualMarkerDATE
            $this->DualMarkerDATE->setDbValueDef($rsnew, $this->DualMarkerDATE->CurrentValue, null, $this->DualMarkerDATE->ReadOnly);

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->setDbValueDef($rsnew, $this->DualMarkerINHOUSE->CurrentValue, null, $this->DualMarkerINHOUSE->ReadOnly);

            // DualMarkerREPORT
            $this->DualMarkerREPORT->setDbValueDef($rsnew, $this->DualMarkerREPORT->CurrentValue, null, $this->DualMarkerREPORT->ReadOnly);

            // Quadruple
            $this->Quadruple->setDbValueDef($rsnew, $this->Quadruple->CurrentValue, null, $this->Quadruple->ReadOnly);

            // QuadrupleDATE
            $this->QuadrupleDATE->setDbValueDef($rsnew, $this->QuadrupleDATE->CurrentValue, null, $this->QuadrupleDATE->ReadOnly);

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->setDbValueDef($rsnew, $this->QuadrupleINHOUSE->CurrentValue, null, $this->QuadrupleINHOUSE->ReadOnly);

            // QuadrupleREPORT
            $this->QuadrupleREPORT->setDbValueDef($rsnew, $this->QuadrupleREPORT->CurrentValue, null, $this->QuadrupleREPORT->ReadOnly);

            // A5month
            $this->A5month->setDbValueDef($rsnew, $this->A5month->CurrentValue, null, $this->A5month->ReadOnly);

            // A5monthDATE
            $this->A5monthDATE->setDbValueDef($rsnew, $this->A5monthDATE->CurrentValue, null, $this->A5monthDATE->ReadOnly);

            // A5monthINHOUSE
            $this->A5monthINHOUSE->setDbValueDef($rsnew, $this->A5monthINHOUSE->CurrentValue, null, $this->A5monthINHOUSE->ReadOnly);

            // A5monthREPORT
            $this->A5monthREPORT->setDbValueDef($rsnew, $this->A5monthREPORT->CurrentValue, null, $this->A5monthREPORT->ReadOnly);

            // A7month
            $this->A7month->setDbValueDef($rsnew, $this->A7month->CurrentValue, null, $this->A7month->ReadOnly);

            // A7monthDATE
            $this->A7monthDATE->setDbValueDef($rsnew, $this->A7monthDATE->CurrentValue, null, $this->A7monthDATE->ReadOnly);

            // A7monthINHOUSE
            $this->A7monthINHOUSE->setDbValueDef($rsnew, $this->A7monthINHOUSE->CurrentValue, null, $this->A7monthINHOUSE->ReadOnly);

            // A7monthREPORT
            $this->A7monthREPORT->setDbValueDef($rsnew, $this->A7monthREPORT->CurrentValue, null, $this->A7monthREPORT->ReadOnly);

            // A9month
            $this->A9month->setDbValueDef($rsnew, $this->A9month->CurrentValue, null, $this->A9month->ReadOnly);

            // A9monthDATE
            $this->A9monthDATE->setDbValueDef($rsnew, $this->A9monthDATE->CurrentValue, null, $this->A9monthDATE->ReadOnly);

            // A9monthINHOUSE
            $this->A9monthINHOUSE->setDbValueDef($rsnew, $this->A9monthINHOUSE->CurrentValue, null, $this->A9monthINHOUSE->ReadOnly);

            // A9monthREPORT
            $this->A9monthREPORT->setDbValueDef($rsnew, $this->A9monthREPORT->CurrentValue, null, $this->A9monthREPORT->ReadOnly);

            // INJ
            $this->INJ->setDbValueDef($rsnew, $this->INJ->CurrentValue, null, $this->INJ->ReadOnly);

            // INJDATE
            $this->INJDATE->setDbValueDef($rsnew, $this->INJDATE->CurrentValue, null, $this->INJDATE->ReadOnly);

            // INJINHOUSE
            $this->INJINHOUSE->setDbValueDef($rsnew, $this->INJINHOUSE->CurrentValue, null, $this->INJINHOUSE->ReadOnly);

            // INJREPORT
            $this->INJREPORT->setDbValueDef($rsnew, $this->INJREPORT->CurrentValue, null, $this->INJREPORT->ReadOnly);

            // Bleeding
            $this->Bleeding->setDbValueDef($rsnew, $this->Bleeding->CurrentValue, null, $this->Bleeding->ReadOnly);

            // Hypothyroidism
            $this->Hypothyroidism->setDbValueDef($rsnew, $this->Hypothyroidism->CurrentValue, null, $this->Hypothyroidism->ReadOnly);

            // PICMENumber
            $this->PICMENumber->setDbValueDef($rsnew, $this->PICMENumber->CurrentValue, null, $this->PICMENumber->ReadOnly);

            // Outcome
            $this->Outcome->setDbValueDef($rsnew, $this->Outcome->CurrentValue, null, $this->Outcome->ReadOnly);

            // DateofAdmission
            $this->DateofAdmission->setDbValueDef($rsnew, $this->DateofAdmission->CurrentValue, null, $this->DateofAdmission->ReadOnly);

            // DateodProcedure
            $this->DateodProcedure->setDbValueDef($rsnew, $this->DateodProcedure->CurrentValue, null, $this->DateodProcedure->ReadOnly);

            // Miscarriage
            $this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, null, $this->Miscarriage->ReadOnly);

            // ModeOfDelivery
            $this->ModeOfDelivery->setDbValueDef($rsnew, $this->ModeOfDelivery->CurrentValue, null, $this->ModeOfDelivery->ReadOnly);

            // ND
            $this->ND->setDbValueDef($rsnew, $this->ND->CurrentValue, null, $this->ND->ReadOnly);

            // NDS
            $this->NDS->setDbValueDef($rsnew, $this->NDS->CurrentValue, null, $this->NDS->ReadOnly);

            // NDP
            $this->NDP->setDbValueDef($rsnew, $this->NDP->CurrentValue, null, $this->NDP->ReadOnly);

            // Vaccum
            $this->Vaccum->setDbValueDef($rsnew, $this->Vaccum->CurrentValue, null, $this->Vaccum->ReadOnly);

            // VaccumS
            $this->VaccumS->setDbValueDef($rsnew, $this->VaccumS->CurrentValue, null, $this->VaccumS->ReadOnly);

            // VaccumP
            $this->VaccumP->setDbValueDef($rsnew, $this->VaccumP->CurrentValue, null, $this->VaccumP->ReadOnly);

            // Forceps
            $this->Forceps->setDbValueDef($rsnew, $this->Forceps->CurrentValue, null, $this->Forceps->ReadOnly);

            // ForcepsS
            $this->ForcepsS->setDbValueDef($rsnew, $this->ForcepsS->CurrentValue, null, $this->ForcepsS->ReadOnly);

            // ForcepsP
            $this->ForcepsP->setDbValueDef($rsnew, $this->ForcepsP->CurrentValue, null, $this->ForcepsP->ReadOnly);

            // Elective
            $this->Elective->setDbValueDef($rsnew, $this->Elective->CurrentValue, null, $this->Elective->ReadOnly);

            // ElectiveS
            $this->ElectiveS->setDbValueDef($rsnew, $this->ElectiveS->CurrentValue, null, $this->ElectiveS->ReadOnly);

            // ElectiveP
            $this->ElectiveP->setDbValueDef($rsnew, $this->ElectiveP->CurrentValue, null, $this->ElectiveP->ReadOnly);

            // Emergency
            $this->Emergency->setDbValueDef($rsnew, $this->Emergency->CurrentValue, null, $this->Emergency->ReadOnly);

            // EmergencyS
            $this->EmergencyS->setDbValueDef($rsnew, $this->EmergencyS->CurrentValue, null, $this->EmergencyS->ReadOnly);

            // EmergencyP
            $this->EmergencyP->setDbValueDef($rsnew, $this->EmergencyP->CurrentValue, null, $this->EmergencyP->ReadOnly);

            // Maturity
            $this->Maturity->setDbValueDef($rsnew, $this->Maturity->CurrentValue, null, $this->Maturity->ReadOnly);

            // Baby1
            $this->Baby1->setDbValueDef($rsnew, $this->Baby1->CurrentValue, null, $this->Baby1->ReadOnly);

            // Baby2
            $this->Baby2->setDbValueDef($rsnew, $this->Baby2->CurrentValue, null, $this->Baby2->ReadOnly);

            // sex1
            $this->sex1->setDbValueDef($rsnew, $this->sex1->CurrentValue, null, $this->sex1->ReadOnly);

            // sex2
            $this->sex2->setDbValueDef($rsnew, $this->sex2->CurrentValue, null, $this->sex2->ReadOnly);

            // weight1
            $this->weight1->setDbValueDef($rsnew, $this->weight1->CurrentValue, null, $this->weight1->ReadOnly);

            // weight2
            $this->weight2->setDbValueDef($rsnew, $this->weight2->CurrentValue, null, $this->weight2->ReadOnly);

            // NICU1
            $this->NICU1->setDbValueDef($rsnew, $this->NICU1->CurrentValue, null, $this->NICU1->ReadOnly);

            // NICU2
            $this->NICU2->setDbValueDef($rsnew, $this->NICU2->CurrentValue, null, $this->NICU2->ReadOnly);

            // Jaundice1
            $this->Jaundice1->setDbValueDef($rsnew, $this->Jaundice1->CurrentValue, null, $this->Jaundice1->ReadOnly);

            // Jaundice2
            $this->Jaundice2->setDbValueDef($rsnew, $this->Jaundice2->CurrentValue, null, $this->Jaundice2->ReadOnly);

            // Others1
            $this->Others1->setDbValueDef($rsnew, $this->Others1->CurrentValue, null, $this->Others1->ReadOnly);

            // Others2
            $this->Others2->setDbValueDef($rsnew, $this->Others2->CurrentValue, null, $this->Others2->ReadOnly);

            // SpillOverReasons
            $this->SpillOverReasons->setDbValueDef($rsnew, $this->SpillOverReasons->CurrentValue, null, $this->SpillOverReasons->ReadOnly);

            // ANClosed
            $this->ANClosed->setDbValueDef($rsnew, $this->ANClosed->CurrentValue, null, $this->ANClosed->ReadOnly);

            // ANClosedDATE
            $this->ANClosedDATE->setDbValueDef($rsnew, $this->ANClosedDATE->CurrentValue, null, $this->ANClosedDATE->ReadOnly);

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->setDbValueDef($rsnew, $this->PastMedicalHistoryOthers->CurrentValue, null, $this->PastMedicalHistoryOthers->ReadOnly);

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->setDbValueDef($rsnew, $this->PastSurgicalHistoryOthers->CurrentValue, null, $this->PastSurgicalHistoryOthers->ReadOnly);

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->setDbValueDef($rsnew, $this->FamilyHistoryOthers->CurrentValue, null, $this->FamilyHistoryOthers->ReadOnly);

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->setDbValueDef($rsnew, $this->PresentPregnancyComplicationsOthers->CurrentValue, null, $this->PresentPregnancyComplicationsOthers->ReadOnly);

            // ETdate
            $this->ETdate->setDbValueDef($rsnew, $this->ETdate->CurrentValue, null, $this->ETdate->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    $editRow = $this->update($rsnew, "", $rsold);
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientAnRegistrationList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
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

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }
}

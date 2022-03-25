<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfVitalsHistoryDelete extends IvfVitalsHistory
{
    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_vitals_history';

    // Page object name
    public $PageObjName = "IvfVitalsHistoryDelete";

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

        // Table object (ivf_vitals_history)
        if (!isset($GLOBALS["ivf_vitals_history"]) || get_class($GLOBALS["ivf_vitals_history"]) == PROJECT_NAMESPACE . "ivf_vitals_history") {
            $GLOBALS["ivf_vitals_history"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_vitals_history');
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
                $doc = new $class(Container("ivf_vitals_history"));
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Religion->setVisibility();
        $this->Address->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->DoublewitnessName1->Visible = false;
        $this->DoublewitnessName2->Visible = false;
        $this->Chiefcomplaints->Visible = false;
        $this->MenstrualHistory->Visible = false;
        $this->ObstetricHistory->Visible = false;
        $this->MedicalHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->Generalexaminationpallor->setVisibility();
        $this->PR->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Investigations->setVisibility();
        $this->Fheight->setVisibility();
        $this->Fweight->setVisibility();
        $this->FBMI->setVisibility();
        $this->FBloodgroup->setVisibility();
        $this->Mheight->setVisibility();
        $this->Mweight->setVisibility();
        $this->MBMI->setVisibility();
        $this->MBloodgroup->setVisibility();
        $this->FBuild->setVisibility();
        $this->MBuild->setVisibility();
        $this->FSkinColor->setVisibility();
        $this->MSkinColor->setVisibility();
        $this->FEyesColor->setVisibility();
        $this->MEyesColor->setVisibility();
        $this->FHairColor->setVisibility();
        $this->MhairColor->setVisibility();
        $this->FhairTexture->setVisibility();
        $this->MHairTexture->setVisibility();
        $this->Fothers->setVisibility();
        $this->Mothers->setVisibility();
        $this->PGE->setVisibility();
        $this->PPR->setVisibility();
        $this->PBP->setVisibility();
        $this->Breast->setVisibility();
        $this->PPA->setVisibility();
        $this->PPSV->setVisibility();
        $this->PPAPSMEAR->setVisibility();
        $this->PTHYROID->setVisibility();
        $this->MTHYROID->setVisibility();
        $this->SecSexCharacters->setVisibility();
        $this->PenisUM->setVisibility();
        $this->VAS->setVisibility();
        $this->EPIDIDYMIS->setVisibility();
        $this->Varicocele->setVisibility();
        $this->FertilityTreatmentHistory->Visible = false;
        $this->SurgeryHistory->Visible = false;
        $this->FamilyHistory->setVisibility();
        $this->PInvestigations->Visible = false;
        $this->Addictions->setVisibility();
        $this->Medications->Visible = false;
        $this->Medical->setVisibility();
        $this->Surgical->setVisibility();
        $this->CoitalHistory->setVisibility();
        $this->SemenAnalysis->Visible = false;
        $this->MInsvestications->Visible = false;
        $this->PImpression->Visible = false;
        $this->MIMpression->Visible = false;
        $this->PPlanOfManagement->Visible = false;
        $this->MPlanOfManagement->Visible = false;
        $this->PReadMore->Visible = false;
        $this->MReadMore->Visible = false;
        $this->MariedFor->setVisibility();
        $this->CMNCM->setVisibility();
        $this->TidNo->setVisibility();
        $this->pFamilyHistory->setVisibility();
        $this->pTemplateMedications->Visible = false;
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
            $this->terminate("IvfVitalsHistoryList"); // Prevent SQL injection, return to list
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
                $this->terminate("IvfVitalsHistoryList"); // Return to list
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Address->setDbValue($row['Address']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->DoublewitnessName1->setDbValue($row['DoublewitnessName1']);
        $this->DoublewitnessName2->setDbValue($row['DoublewitnessName2']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->Generalexaminationpallor->setDbValue($row['Generalexaminationpallor']);
        $this->PR->setDbValue($row['PR']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Investigations->setDbValue($row['Investigations']);
        $this->Fheight->setDbValue($row['Fheight']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->FBloodgroup->setDbValue($row['FBloodgroup']);
        $this->Mheight->setDbValue($row['Mheight']);
        $this->Mweight->setDbValue($row['Mweight']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->MBloodgroup->setDbValue($row['MBloodgroup']);
        $this->FBuild->setDbValue($row['FBuild']);
        $this->MBuild->setDbValue($row['MBuild']);
        $this->FSkinColor->setDbValue($row['FSkinColor']);
        $this->MSkinColor->setDbValue($row['MSkinColor']);
        $this->FEyesColor->setDbValue($row['FEyesColor']);
        $this->MEyesColor->setDbValue($row['MEyesColor']);
        $this->FHairColor->setDbValue($row['FHairColor']);
        $this->MhairColor->setDbValue($row['MhairColor']);
        $this->FhairTexture->setDbValue($row['FhairTexture']);
        $this->MHairTexture->setDbValue($row['MHairTexture']);
        $this->Fothers->setDbValue($row['Fothers']);
        $this->Mothers->setDbValue($row['Mothers']);
        $this->PGE->setDbValue($row['PGE']);
        $this->PPR->setDbValue($row['PPR']);
        $this->PBP->setDbValue($row['PBP']);
        $this->Breast->setDbValue($row['Breast']);
        $this->PPA->setDbValue($row['PPA']);
        $this->PPSV->setDbValue($row['PPSV']);
        $this->PPAPSMEAR->setDbValue($row['PPAPSMEAR']);
        $this->PTHYROID->setDbValue($row['PTHYROID']);
        $this->MTHYROID->setDbValue($row['MTHYROID']);
        $this->SecSexCharacters->setDbValue($row['SecSexCharacters']);
        $this->PenisUM->setDbValue($row['PenisUM']);
        $this->VAS->setDbValue($row['VAS']);
        $this->EPIDIDYMIS->setDbValue($row['EPIDIDYMIS']);
        $this->Varicocele->setDbValue($row['Varicocele']);
        $this->FertilityTreatmentHistory->setDbValue($row['FertilityTreatmentHistory']);
        $this->SurgeryHistory->setDbValue($row['SurgeryHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->PInvestigations->setDbValue($row['PInvestigations']);
        $this->Addictions->setDbValue($row['Addictions']);
        $this->Medications->setDbValue($row['Medications']);
        $this->Medical->setDbValue($row['Medical']);
        $this->Surgical->setDbValue($row['Surgical']);
        $this->CoitalHistory->setDbValue($row['CoitalHistory']);
        $this->SemenAnalysis->setDbValue($row['SemenAnalysis']);
        $this->MInsvestications->setDbValue($row['MInsvestications']);
        $this->PImpression->setDbValue($row['PImpression']);
        $this->MIMpression->setDbValue($row['MIMpression']);
        $this->PPlanOfManagement->setDbValue($row['PPlanOfManagement']);
        $this->MPlanOfManagement->setDbValue($row['MPlanOfManagement']);
        $this->PReadMore->setDbValue($row['PReadMore']);
        $this->MReadMore->setDbValue($row['MReadMore']);
        $this->MariedFor->setDbValue($row['MariedFor']);
        $this->CMNCM->setDbValue($row['CMNCM']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
        $this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Religion'] = null;
        $row['Address'] = null;
        $row['IdentificationMark'] = null;
        $row['DoublewitnessName1'] = null;
        $row['DoublewitnessName2'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MenstrualHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['MedicalHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['Generalexaminationpallor'] = null;
        $row['PR'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Investigations'] = null;
        $row['Fheight'] = null;
        $row['Fweight'] = null;
        $row['FBMI'] = null;
        $row['FBloodgroup'] = null;
        $row['Mheight'] = null;
        $row['Mweight'] = null;
        $row['MBMI'] = null;
        $row['MBloodgroup'] = null;
        $row['FBuild'] = null;
        $row['MBuild'] = null;
        $row['FSkinColor'] = null;
        $row['MSkinColor'] = null;
        $row['FEyesColor'] = null;
        $row['MEyesColor'] = null;
        $row['FHairColor'] = null;
        $row['MhairColor'] = null;
        $row['FhairTexture'] = null;
        $row['MHairTexture'] = null;
        $row['Fothers'] = null;
        $row['Mothers'] = null;
        $row['PGE'] = null;
        $row['PPR'] = null;
        $row['PBP'] = null;
        $row['Breast'] = null;
        $row['PPA'] = null;
        $row['PPSV'] = null;
        $row['PPAPSMEAR'] = null;
        $row['PTHYROID'] = null;
        $row['MTHYROID'] = null;
        $row['SecSexCharacters'] = null;
        $row['PenisUM'] = null;
        $row['VAS'] = null;
        $row['EPIDIDYMIS'] = null;
        $row['Varicocele'] = null;
        $row['FertilityTreatmentHistory'] = null;
        $row['SurgeryHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['PInvestigations'] = null;
        $row['Addictions'] = null;
        $row['Medications'] = null;
        $row['Medical'] = null;
        $row['Surgical'] = null;
        $row['CoitalHistory'] = null;
        $row['SemenAnalysis'] = null;
        $row['MInsvestications'] = null;
        $row['PImpression'] = null;
        $row['MIMpression'] = null;
        $row['PPlanOfManagement'] = null;
        $row['MPlanOfManagement'] = null;
        $row['PReadMore'] = null;
        $row['MReadMore'] = null;
        $row['MariedFor'] = null;
        $row['CMNCM'] = null;
        $row['TidNo'] = null;
        $row['pFamilyHistory'] = null;
        $row['pTemplateMedications'] = null;
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Religion

        // Address

        // IdentificationMark

        // DoublewitnessName1

        // DoublewitnessName2

        // Chiefcomplaints

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // Generalexaminationpallor

        // PR

        // CVS

        // PA

        // PROVISIONALDIAGNOSIS

        // Investigations

        // Fheight

        // Fweight

        // FBMI

        // FBloodgroup

        // Mheight

        // Mweight

        // MBMI

        // MBloodgroup

        // FBuild

        // MBuild

        // FSkinColor

        // MSkinColor

        // FEyesColor

        // MEyesColor

        // FHairColor

        // MhairColor

        // FhairTexture

        // MHairTexture

        // Fothers

        // Mothers

        // PGE

        // PPR

        // PBP

        // Breast

        // PPA

        // PPSV

        // PPAPSMEAR

        // PTHYROID

        // MTHYROID

        // SecSexCharacters

        // PenisUM

        // VAS

        // EPIDIDYMIS

        // Varicocele

        // FertilityTreatmentHistory

        // SurgeryHistory

        // FamilyHistory

        // PInvestigations

        // Addictions

        // Medications

        // Medical

        // Surgical

        // CoitalHistory

        // SemenAnalysis

        // MInsvestications

        // PImpression

        // MIMpression

        // PPlanOfManagement

        // MPlanOfManagement

        // PReadMore

        // MReadMore

        // MariedFor

        // CMNCM

        // TidNo

        // pFamilyHistory

        // pTemplateMedications
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // MedicalHistory
            $this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
            $this->MedicalHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
            $this->Generalexaminationpallor->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Investigations
            $this->Investigations->ViewValue = $this->Investigations->CurrentValue;
            $this->Investigations->ViewCustomAttributes = "";

            // Fheight
            $this->Fheight->ViewValue = $this->Fheight->CurrentValue;
            $this->Fheight->ViewCustomAttributes = "";

            // Fweight
            $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
            $this->Fweight->ViewCustomAttributes = "";

            // FBMI
            $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
            $this->FBMI->ViewCustomAttributes = "";

            // FBloodgroup
            $this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
            $this->FBloodgroup->ViewCustomAttributes = "";

            // Mheight
            $this->Mheight->ViewValue = $this->Mheight->CurrentValue;
            $this->Mheight->ViewCustomAttributes = "";

            // Mweight
            $this->Mweight->ViewValue = $this->Mweight->CurrentValue;
            $this->Mweight->ViewCustomAttributes = "";

            // MBMI
            $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
            $this->MBMI->ViewCustomAttributes = "";

            // MBloodgroup
            $this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
            $this->MBloodgroup->ViewCustomAttributes = "";

            // FBuild
            $this->FBuild->ViewValue = $this->FBuild->CurrentValue;
            $this->FBuild->ViewCustomAttributes = "";

            // MBuild
            $this->MBuild->ViewValue = $this->MBuild->CurrentValue;
            $this->MBuild->ViewCustomAttributes = "";

            // FSkinColor
            $this->FSkinColor->ViewValue = $this->FSkinColor->CurrentValue;
            $this->FSkinColor->ViewCustomAttributes = "";

            // MSkinColor
            $this->MSkinColor->ViewValue = $this->MSkinColor->CurrentValue;
            $this->MSkinColor->ViewCustomAttributes = "";

            // FEyesColor
            $this->FEyesColor->ViewValue = $this->FEyesColor->CurrentValue;
            $this->FEyesColor->ViewCustomAttributes = "";

            // MEyesColor
            $this->MEyesColor->ViewValue = $this->MEyesColor->CurrentValue;
            $this->MEyesColor->ViewCustomAttributes = "";

            // FHairColor
            $this->FHairColor->ViewValue = $this->FHairColor->CurrentValue;
            $this->FHairColor->ViewCustomAttributes = "";

            // MhairColor
            $this->MhairColor->ViewValue = $this->MhairColor->CurrentValue;
            $this->MhairColor->ViewCustomAttributes = "";

            // FhairTexture
            $this->FhairTexture->ViewValue = $this->FhairTexture->CurrentValue;
            $this->FhairTexture->ViewCustomAttributes = "";

            // MHairTexture
            $this->MHairTexture->ViewValue = $this->MHairTexture->CurrentValue;
            $this->MHairTexture->ViewCustomAttributes = "";

            // Fothers
            $this->Fothers->ViewValue = $this->Fothers->CurrentValue;
            $this->Fothers->ViewCustomAttributes = "";

            // Mothers
            $this->Mothers->ViewValue = $this->Mothers->CurrentValue;
            $this->Mothers->ViewCustomAttributes = "";

            // PGE
            $this->PGE->ViewValue = $this->PGE->CurrentValue;
            $this->PGE->ViewCustomAttributes = "";

            // PPR
            $this->PPR->ViewValue = $this->PPR->CurrentValue;
            $this->PPR->ViewCustomAttributes = "";

            // PBP
            $this->PBP->ViewValue = $this->PBP->CurrentValue;
            $this->PBP->ViewCustomAttributes = "";

            // Breast
            $this->Breast->ViewValue = $this->Breast->CurrentValue;
            $this->Breast->ViewCustomAttributes = "";

            // PPA
            $this->PPA->ViewValue = $this->PPA->CurrentValue;
            $this->PPA->ViewCustomAttributes = "";

            // PPSV
            $this->PPSV->ViewValue = $this->PPSV->CurrentValue;
            $this->PPSV->ViewCustomAttributes = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
            $this->PPAPSMEAR->ViewCustomAttributes = "";

            // PTHYROID
            $this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
            $this->PTHYROID->ViewCustomAttributes = "";

            // MTHYROID
            $this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
            $this->MTHYROID->ViewCustomAttributes = "";

            // SecSexCharacters
            $this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
            $this->SecSexCharacters->ViewCustomAttributes = "";

            // PenisUM
            $this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
            $this->PenisUM->ViewCustomAttributes = "";

            // VAS
            $this->VAS->ViewValue = $this->VAS->CurrentValue;
            $this->VAS->ViewCustomAttributes = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
            $this->EPIDIDYMIS->ViewCustomAttributes = "";

            // Varicocele
            $this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
            $this->Varicocele->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Addictions
            $this->Addictions->ViewValue = $this->Addictions->CurrentValue;
            $this->Addictions->ViewCustomAttributes = "";

            // Medical
            $this->Medical->ViewValue = $this->Medical->CurrentValue;
            $this->Medical->ViewCustomAttributes = "";

            // Surgical
            $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
            $this->Surgical->ViewCustomAttributes = "";

            // CoitalHistory
            $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
            $this->CoitalHistory->ViewCustomAttributes = "";

            // MariedFor
            $this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
            $this->MariedFor->ViewCustomAttributes = "";

            // CMNCM
            $this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
            $this->CMNCM->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // pFamilyHistory
            $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
            $this->pFamilyHistory->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";
            $this->MedicalHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->LinkCustomAttributes = "";
            $this->Generalexaminationpallor->HrefValue = "";
            $this->Generalexaminationpallor->TooltipValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Investigations
            $this->Investigations->LinkCustomAttributes = "";
            $this->Investigations->HrefValue = "";
            $this->Investigations->TooltipValue = "";

            // Fheight
            $this->Fheight->LinkCustomAttributes = "";
            $this->Fheight->HrefValue = "";
            $this->Fheight->TooltipValue = "";

            // Fweight
            $this->Fweight->LinkCustomAttributes = "";
            $this->Fweight->HrefValue = "";
            $this->Fweight->TooltipValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";
            $this->FBMI->TooltipValue = "";

            // FBloodgroup
            $this->FBloodgroup->LinkCustomAttributes = "";
            $this->FBloodgroup->HrefValue = "";
            $this->FBloodgroup->TooltipValue = "";

            // Mheight
            $this->Mheight->LinkCustomAttributes = "";
            $this->Mheight->HrefValue = "";
            $this->Mheight->TooltipValue = "";

            // Mweight
            $this->Mweight->LinkCustomAttributes = "";
            $this->Mweight->HrefValue = "";
            $this->Mweight->TooltipValue = "";

            // MBMI
            $this->MBMI->LinkCustomAttributes = "";
            $this->MBMI->HrefValue = "";
            $this->MBMI->TooltipValue = "";

            // MBloodgroup
            $this->MBloodgroup->LinkCustomAttributes = "";
            $this->MBloodgroup->HrefValue = "";
            $this->MBloodgroup->TooltipValue = "";

            // FBuild
            $this->FBuild->LinkCustomAttributes = "";
            $this->FBuild->HrefValue = "";
            $this->FBuild->TooltipValue = "";

            // MBuild
            $this->MBuild->LinkCustomAttributes = "";
            $this->MBuild->HrefValue = "";
            $this->MBuild->TooltipValue = "";

            // FSkinColor
            $this->FSkinColor->LinkCustomAttributes = "";
            $this->FSkinColor->HrefValue = "";
            $this->FSkinColor->TooltipValue = "";

            // MSkinColor
            $this->MSkinColor->LinkCustomAttributes = "";
            $this->MSkinColor->HrefValue = "";
            $this->MSkinColor->TooltipValue = "";

            // FEyesColor
            $this->FEyesColor->LinkCustomAttributes = "";
            $this->FEyesColor->HrefValue = "";
            $this->FEyesColor->TooltipValue = "";

            // MEyesColor
            $this->MEyesColor->LinkCustomAttributes = "";
            $this->MEyesColor->HrefValue = "";
            $this->MEyesColor->TooltipValue = "";

            // FHairColor
            $this->FHairColor->LinkCustomAttributes = "";
            $this->FHairColor->HrefValue = "";
            $this->FHairColor->TooltipValue = "";

            // MhairColor
            $this->MhairColor->LinkCustomAttributes = "";
            $this->MhairColor->HrefValue = "";
            $this->MhairColor->TooltipValue = "";

            // FhairTexture
            $this->FhairTexture->LinkCustomAttributes = "";
            $this->FhairTexture->HrefValue = "";
            $this->FhairTexture->TooltipValue = "";

            // MHairTexture
            $this->MHairTexture->LinkCustomAttributes = "";
            $this->MHairTexture->HrefValue = "";
            $this->MHairTexture->TooltipValue = "";

            // Fothers
            $this->Fothers->LinkCustomAttributes = "";
            $this->Fothers->HrefValue = "";
            $this->Fothers->TooltipValue = "";

            // Mothers
            $this->Mothers->LinkCustomAttributes = "";
            $this->Mothers->HrefValue = "";
            $this->Mothers->TooltipValue = "";

            // PGE
            $this->PGE->LinkCustomAttributes = "";
            $this->PGE->HrefValue = "";
            $this->PGE->TooltipValue = "";

            // PPR
            $this->PPR->LinkCustomAttributes = "";
            $this->PPR->HrefValue = "";
            $this->PPR->TooltipValue = "";

            // PBP
            $this->PBP->LinkCustomAttributes = "";
            $this->PBP->HrefValue = "";
            $this->PBP->TooltipValue = "";

            // Breast
            $this->Breast->LinkCustomAttributes = "";
            $this->Breast->HrefValue = "";
            $this->Breast->TooltipValue = "";

            // PPA
            $this->PPA->LinkCustomAttributes = "";
            $this->PPA->HrefValue = "";
            $this->PPA->TooltipValue = "";

            // PPSV
            $this->PPSV->LinkCustomAttributes = "";
            $this->PPSV->HrefValue = "";
            $this->PPSV->TooltipValue = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->LinkCustomAttributes = "";
            $this->PPAPSMEAR->HrefValue = "";
            $this->PPAPSMEAR->TooltipValue = "";

            // PTHYROID
            $this->PTHYROID->LinkCustomAttributes = "";
            $this->PTHYROID->HrefValue = "";
            $this->PTHYROID->TooltipValue = "";

            // MTHYROID
            $this->MTHYROID->LinkCustomAttributes = "";
            $this->MTHYROID->HrefValue = "";
            $this->MTHYROID->TooltipValue = "";

            // SecSexCharacters
            $this->SecSexCharacters->LinkCustomAttributes = "";
            $this->SecSexCharacters->HrefValue = "";
            $this->SecSexCharacters->TooltipValue = "";

            // PenisUM
            $this->PenisUM->LinkCustomAttributes = "";
            $this->PenisUM->HrefValue = "";
            $this->PenisUM->TooltipValue = "";

            // VAS
            $this->VAS->LinkCustomAttributes = "";
            $this->VAS->HrefValue = "";
            $this->VAS->TooltipValue = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->LinkCustomAttributes = "";
            $this->EPIDIDYMIS->HrefValue = "";
            $this->EPIDIDYMIS->TooltipValue = "";

            // Varicocele
            $this->Varicocele->LinkCustomAttributes = "";
            $this->Varicocele->HrefValue = "";
            $this->Varicocele->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Addictions
            $this->Addictions->LinkCustomAttributes = "";
            $this->Addictions->HrefValue = "";
            $this->Addictions->TooltipValue = "";

            // Medical
            $this->Medical->LinkCustomAttributes = "";
            $this->Medical->HrefValue = "";
            $this->Medical->TooltipValue = "";

            // Surgical
            $this->Surgical->LinkCustomAttributes = "";
            $this->Surgical->HrefValue = "";
            $this->Surgical->TooltipValue = "";

            // CoitalHistory
            $this->CoitalHistory->LinkCustomAttributes = "";
            $this->CoitalHistory->HrefValue = "";
            $this->CoitalHistory->TooltipValue = "";

            // MariedFor
            $this->MariedFor->LinkCustomAttributes = "";
            $this->MariedFor->HrefValue = "";
            $this->MariedFor->TooltipValue = "";

            // CMNCM
            $this->CMNCM->LinkCustomAttributes = "";
            $this->CMNCM->HrefValue = "";
            $this->CMNCM->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // pFamilyHistory
            $this->pFamilyHistory->LinkCustomAttributes = "";
            $this->pFamilyHistory->HrefValue = "";
            $this->pFamilyHistory->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfVitalsHistoryList"), "", $this->TableVar, true);
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

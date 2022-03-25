<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_vitals_history_add extends ivf_vitals_history
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_vitals_history';

	// Page object name
	public $PageObjName = "ivf_vitals_history_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
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
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
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
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (ivf_vitals_history)
		if (!isset($GLOBALS["ivf_vitals_history"]) || get_class($GLOBALS["ivf_vitals_history"]) == PROJECT_NAMESPACE . "ivf_vitals_history") {
			$GLOBALS["ivf_vitals_history"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_vitals_history"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_vitals_history');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (user_login)
		if (!isset($UserTable)) {
			$UserTable = new user_login();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $EXPORT, $ivf_vitals_history;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_vitals_history);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
	}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "ivf_vitals_historyview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
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
		global $COMPOSITE_KEY_SEPARATOR;
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_vitals_historylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->setVisibility();
		$this->SEX->setVisibility();
		$this->Religion->setVisibility();
		$this->Address->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->DoublewitnessName1->setVisibility();
		$this->DoublewitnessName2->setVisibility();
		$this->Chiefcomplaints->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->ObstetricHistory->setVisibility();
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
		$this->FertilityTreatmentHistory->setVisibility();
		$this->SurgeryHistory->setVisibility();
		$this->FamilyHistory->setVisibility();
		$this->PInvestigations->setVisibility();
		$this->Addictions->setVisibility();
		$this->Medications->setVisibility();
		$this->Medical->setVisibility();
		$this->Surgical->setVisibility();
		$this->CoitalHistory->setVisibility();
		$this->SemenAnalysis->setVisibility();
		$this->MInsvestications->setVisibility();
		$this->PImpression->setVisibility();
		$this->MIMpression->setVisibility();
		$this->PPlanOfManagement->setVisibility();
		$this->MPlanOfManagement->setVisibility();
		$this->PReadMore->setVisibility();
		$this->MReadMore->setVisibility();
		$this->MariedFor->setVisibility();
		$this->CMNCM->setVisibility();
		$this->TemplateMenstrualHistory->setVisibility();
		$this->TemplateObstetricHistory->setVisibility();
		$this->TemplateFertilityTreatmentHistory->setVisibility();
		$this->TemplateSurgeryHistory->setVisibility();
		$this->TemplateFInvestigations->setVisibility();
		$this->TemplatePlanOfManagement->setVisibility();
		$this->TemplatePImpression->setVisibility();
		$this->TemplateMedications->setVisibility();
		$this->TemplateSemenAnalysis->setVisibility();
		$this->MaleInsvestications->setVisibility();
		$this->TemplateMIMpression->setVisibility();
		$this->TemplateMalePlanOfManagement->setVisibility();
		$this->TidNo->setVisibility();
		$this->pFamilyHistory->setVisibility();
		$this->pTemplateMedications->setVisibility();
		$this->AntiTPO->setVisibility();
		$this->AntiTG->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->FBloodgroup);
		$this->setupLookupOptions($this->MBloodgroup);
		$this->setupLookupOptions($this->FamilyHistory);
		$this->setupLookupOptions($this->Surgical);
		$this->setupLookupOptions($this->CoitalHistory);
		$this->setupLookupOptions($this->TemplateMenstrualHistory);
		$this->setupLookupOptions($this->TemplateObstetricHistory);
		$this->setupLookupOptions($this->TemplateFertilityTreatmentHistory);
		$this->setupLookupOptions($this->TemplateSurgeryHistory);
		$this->setupLookupOptions($this->TemplateFInvestigations);
		$this->setupLookupOptions($this->TemplatePlanOfManagement);
		$this->setupLookupOptions($this->TemplatePImpression);
		$this->setupLookupOptions($this->TemplateMedications);
		$this->setupLookupOptions($this->TemplateSemenAnalysis);
		$this->setupLookupOptions($this->MaleInsvestications);
		$this->setupLookupOptions($this->TemplateMIMpression);
		$this->setupLookupOptions($this->TemplateMalePlanOfManagement);
		$this->setupLookupOptions($this->pFamilyHistory);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
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
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
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
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("ivf_vitals_historylist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "ivf_vitals_historylist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "ivf_vitals_historyview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
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
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->SEX->CurrentValue = NULL;
		$this->SEX->OldValue = $this->SEX->CurrentValue;
		$this->Religion->CurrentValue = NULL;
		$this->Religion->OldValue = $this->Religion->CurrentValue;
		$this->Address->CurrentValue = NULL;
		$this->Address->OldValue = $this->Address->CurrentValue;
		$this->IdentificationMark->CurrentValue = NULL;
		$this->IdentificationMark->OldValue = $this->IdentificationMark->CurrentValue;
		$this->DoublewitnessName1->CurrentValue = NULL;
		$this->DoublewitnessName1->OldValue = $this->DoublewitnessName1->CurrentValue;
		$this->DoublewitnessName2->CurrentValue = NULL;
		$this->DoublewitnessName2->OldValue = $this->DoublewitnessName2->CurrentValue;
		$this->Chiefcomplaints->CurrentValue = NULL;
		$this->Chiefcomplaints->OldValue = $this->Chiefcomplaints->CurrentValue;
		$this->MenstrualHistory->CurrentValue = NULL;
		$this->MenstrualHistory->OldValue = $this->MenstrualHistory->CurrentValue;
		$this->ObstetricHistory->CurrentValue = NULL;
		$this->ObstetricHistory->OldValue = $this->ObstetricHistory->CurrentValue;
		$this->MedicalHistory->CurrentValue = NULL;
		$this->MedicalHistory->OldValue = $this->MedicalHistory->CurrentValue;
		$this->SurgicalHistory->CurrentValue = NULL;
		$this->SurgicalHistory->OldValue = $this->SurgicalHistory->CurrentValue;
		$this->Generalexaminationpallor->CurrentValue = NULL;
		$this->Generalexaminationpallor->OldValue = $this->Generalexaminationpallor->CurrentValue;
		$this->PR->CurrentValue = NULL;
		$this->PR->OldValue = $this->PR->CurrentValue;
		$this->CVS->CurrentValue = NULL;
		$this->CVS->OldValue = $this->CVS->CurrentValue;
		$this->PA->CurrentValue = NULL;
		$this->PA->OldValue = $this->PA->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->CurrentValue = NULL;
		$this->PROVISIONALDIAGNOSIS->OldValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->Investigations->CurrentValue = NULL;
		$this->Investigations->OldValue = $this->Investigations->CurrentValue;
		$this->Fheight->CurrentValue = NULL;
		$this->Fheight->OldValue = $this->Fheight->CurrentValue;
		$this->Fweight->CurrentValue = NULL;
		$this->Fweight->OldValue = $this->Fweight->CurrentValue;
		$this->FBMI->CurrentValue = NULL;
		$this->FBMI->OldValue = $this->FBMI->CurrentValue;
		$this->FBloodgroup->CurrentValue = NULL;
		$this->FBloodgroup->OldValue = $this->FBloodgroup->CurrentValue;
		$this->Mheight->CurrentValue = NULL;
		$this->Mheight->OldValue = $this->Mheight->CurrentValue;
		$this->Mweight->CurrentValue = NULL;
		$this->Mweight->OldValue = $this->Mweight->CurrentValue;
		$this->MBMI->CurrentValue = NULL;
		$this->MBMI->OldValue = $this->MBMI->CurrentValue;
		$this->MBloodgroup->CurrentValue = NULL;
		$this->MBloodgroup->OldValue = $this->MBloodgroup->CurrentValue;
		$this->FBuild->CurrentValue = NULL;
		$this->FBuild->OldValue = $this->FBuild->CurrentValue;
		$this->MBuild->CurrentValue = NULL;
		$this->MBuild->OldValue = $this->MBuild->CurrentValue;
		$this->FSkinColor->CurrentValue = NULL;
		$this->FSkinColor->OldValue = $this->FSkinColor->CurrentValue;
		$this->MSkinColor->CurrentValue = NULL;
		$this->MSkinColor->OldValue = $this->MSkinColor->CurrentValue;
		$this->FEyesColor->CurrentValue = NULL;
		$this->FEyesColor->OldValue = $this->FEyesColor->CurrentValue;
		$this->MEyesColor->CurrentValue = NULL;
		$this->MEyesColor->OldValue = $this->MEyesColor->CurrentValue;
		$this->FHairColor->CurrentValue = NULL;
		$this->FHairColor->OldValue = $this->FHairColor->CurrentValue;
		$this->MhairColor->CurrentValue = NULL;
		$this->MhairColor->OldValue = $this->MhairColor->CurrentValue;
		$this->FhairTexture->CurrentValue = NULL;
		$this->FhairTexture->OldValue = $this->FhairTexture->CurrentValue;
		$this->MHairTexture->CurrentValue = NULL;
		$this->MHairTexture->OldValue = $this->MHairTexture->CurrentValue;
		$this->Fothers->CurrentValue = NULL;
		$this->Fothers->OldValue = $this->Fothers->CurrentValue;
		$this->Mothers->CurrentValue = NULL;
		$this->Mothers->OldValue = $this->Mothers->CurrentValue;
		$this->PGE->CurrentValue = NULL;
		$this->PGE->OldValue = $this->PGE->CurrentValue;
		$this->PPR->CurrentValue = NULL;
		$this->PPR->OldValue = $this->PPR->CurrentValue;
		$this->PBP->CurrentValue = NULL;
		$this->PBP->OldValue = $this->PBP->CurrentValue;
		$this->Breast->CurrentValue = NULL;
		$this->Breast->OldValue = $this->Breast->CurrentValue;
		$this->PPA->CurrentValue = NULL;
		$this->PPA->OldValue = $this->PPA->CurrentValue;
		$this->PPSV->CurrentValue = NULL;
		$this->PPSV->OldValue = $this->PPSV->CurrentValue;
		$this->PPAPSMEAR->CurrentValue = NULL;
		$this->PPAPSMEAR->OldValue = $this->PPAPSMEAR->CurrentValue;
		$this->PTHYROID->CurrentValue = NULL;
		$this->PTHYROID->OldValue = $this->PTHYROID->CurrentValue;
		$this->MTHYROID->CurrentValue = NULL;
		$this->MTHYROID->OldValue = $this->MTHYROID->CurrentValue;
		$this->SecSexCharacters->CurrentValue = NULL;
		$this->SecSexCharacters->OldValue = $this->SecSexCharacters->CurrentValue;
		$this->PenisUM->CurrentValue = NULL;
		$this->PenisUM->OldValue = $this->PenisUM->CurrentValue;
		$this->VAS->CurrentValue = NULL;
		$this->VAS->OldValue = $this->VAS->CurrentValue;
		$this->EPIDIDYMIS->CurrentValue = NULL;
		$this->EPIDIDYMIS->OldValue = $this->EPIDIDYMIS->CurrentValue;
		$this->Varicocele->CurrentValue = NULL;
		$this->Varicocele->OldValue = $this->Varicocele->CurrentValue;
		$this->FertilityTreatmentHistory->CurrentValue = NULL;
		$this->FertilityTreatmentHistory->OldValue = $this->FertilityTreatmentHistory->CurrentValue;
		$this->SurgeryHistory->CurrentValue = NULL;
		$this->SurgeryHistory->OldValue = $this->SurgeryHistory->CurrentValue;
		$this->FamilyHistory->CurrentValue = NULL;
		$this->FamilyHistory->OldValue = $this->FamilyHistory->CurrentValue;
		$this->PInvestigations->CurrentValue = NULL;
		$this->PInvestigations->OldValue = $this->PInvestigations->CurrentValue;
		$this->Addictions->CurrentValue = NULL;
		$this->Addictions->OldValue = $this->Addictions->CurrentValue;
		$this->Medications->CurrentValue = NULL;
		$this->Medications->OldValue = $this->Medications->CurrentValue;
		$this->Medical->CurrentValue = NULL;
		$this->Medical->OldValue = $this->Medical->CurrentValue;
		$this->Surgical->CurrentValue = NULL;
		$this->Surgical->OldValue = $this->Surgical->CurrentValue;
		$this->CoitalHistory->CurrentValue = NULL;
		$this->CoitalHistory->OldValue = $this->CoitalHistory->CurrentValue;
		$this->SemenAnalysis->CurrentValue = NULL;
		$this->SemenAnalysis->OldValue = $this->SemenAnalysis->CurrentValue;
		$this->MInsvestications->CurrentValue = NULL;
		$this->MInsvestications->OldValue = $this->MInsvestications->CurrentValue;
		$this->PImpression->CurrentValue = NULL;
		$this->PImpression->OldValue = $this->PImpression->CurrentValue;
		$this->MIMpression->CurrentValue = NULL;
		$this->MIMpression->OldValue = $this->MIMpression->CurrentValue;
		$this->PPlanOfManagement->CurrentValue = NULL;
		$this->PPlanOfManagement->OldValue = $this->PPlanOfManagement->CurrentValue;
		$this->MPlanOfManagement->CurrentValue = NULL;
		$this->MPlanOfManagement->OldValue = $this->MPlanOfManagement->CurrentValue;
		$this->PReadMore->CurrentValue = NULL;
		$this->PReadMore->OldValue = $this->PReadMore->CurrentValue;
		$this->MReadMore->CurrentValue = NULL;
		$this->MReadMore->OldValue = $this->MReadMore->CurrentValue;
		$this->MariedFor->CurrentValue = NULL;
		$this->MariedFor->OldValue = $this->MariedFor->CurrentValue;
		$this->CMNCM->CurrentValue = NULL;
		$this->CMNCM->OldValue = $this->CMNCM->CurrentValue;
		$this->TemplateMenstrualHistory->CurrentValue = NULL;
		$this->TemplateMenstrualHistory->OldValue = $this->TemplateMenstrualHistory->CurrentValue;
		$this->TemplateObstetricHistory->CurrentValue = NULL;
		$this->TemplateObstetricHistory->OldValue = $this->TemplateObstetricHistory->CurrentValue;
		$this->TemplateFertilityTreatmentHistory->CurrentValue = NULL;
		$this->TemplateFertilityTreatmentHistory->OldValue = $this->TemplateFertilityTreatmentHistory->CurrentValue;
		$this->TemplateSurgeryHistory->CurrentValue = NULL;
		$this->TemplateSurgeryHistory->OldValue = $this->TemplateSurgeryHistory->CurrentValue;
		$this->TemplateFInvestigations->CurrentValue = NULL;
		$this->TemplateFInvestigations->OldValue = $this->TemplateFInvestigations->CurrentValue;
		$this->TemplatePlanOfManagement->CurrentValue = NULL;
		$this->TemplatePlanOfManagement->OldValue = $this->TemplatePlanOfManagement->CurrentValue;
		$this->TemplatePImpression->CurrentValue = NULL;
		$this->TemplatePImpression->OldValue = $this->TemplatePImpression->CurrentValue;
		$this->TemplateMedications->CurrentValue = NULL;
		$this->TemplateMedications->OldValue = $this->TemplateMedications->CurrentValue;
		$this->TemplateSemenAnalysis->CurrentValue = NULL;
		$this->TemplateSemenAnalysis->OldValue = $this->TemplateSemenAnalysis->CurrentValue;
		$this->MaleInsvestications->CurrentValue = NULL;
		$this->MaleInsvestications->OldValue = $this->MaleInsvestications->CurrentValue;
		$this->TemplateMIMpression->CurrentValue = NULL;
		$this->TemplateMIMpression->OldValue = $this->TemplateMIMpression->CurrentValue;
		$this->TemplateMalePlanOfManagement->CurrentValue = NULL;
		$this->TemplateMalePlanOfManagement->OldValue = $this->TemplateMalePlanOfManagement->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->pFamilyHistory->CurrentValue = NULL;
		$this->pFamilyHistory->OldValue = $this->pFamilyHistory->CurrentValue;
		$this->pTemplateMedications->CurrentValue = NULL;
		$this->pTemplateMedications->OldValue = $this->pTemplateMedications->CurrentValue;
		$this->AntiTPO->CurrentValue = NULL;
		$this->AntiTPO->OldValue = $this->AntiTPO->CurrentValue;
		$this->AntiTG->CurrentValue = NULL;
		$this->AntiTG->OldValue = $this->AntiTG->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'SEX' first before field var 'x_SEX'
		$val = $CurrentForm->hasValue("SEX") ? $CurrentForm->getValue("SEX") : $CurrentForm->getValue("x_SEX");
		if (!$this->SEX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SEX->Visible = FALSE; // Disable update for API request
			else
				$this->SEX->setFormValue($val);
		}

		// Check field name 'Religion' first before field var 'x_Religion'
		$val = $CurrentForm->hasValue("Religion") ? $CurrentForm->getValue("Religion") : $CurrentForm->getValue("x_Religion");
		if (!$this->Religion->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Religion->Visible = FALSE; // Disable update for API request
			else
				$this->Religion->setFormValue($val);
		}

		// Check field name 'Address' first before field var 'x_Address'
		$val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
		if (!$this->Address->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Address->Visible = FALSE; // Disable update for API request
			else
				$this->Address->setFormValue($val);
		}

		// Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
		$val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
		if (!$this->IdentificationMark->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IdentificationMark->Visible = FALSE; // Disable update for API request
			else
				$this->IdentificationMark->setFormValue($val);
		}

		// Check field name 'DoublewitnessName1' first before field var 'x_DoublewitnessName1'
		$val = $CurrentForm->hasValue("DoublewitnessName1") ? $CurrentForm->getValue("DoublewitnessName1") : $CurrentForm->getValue("x_DoublewitnessName1");
		if (!$this->DoublewitnessName1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoublewitnessName1->Visible = FALSE; // Disable update for API request
			else
				$this->DoublewitnessName1->setFormValue($val);
		}

		// Check field name 'DoublewitnessName2' first before field var 'x_DoublewitnessName2'
		$val = $CurrentForm->hasValue("DoublewitnessName2") ? $CurrentForm->getValue("DoublewitnessName2") : $CurrentForm->getValue("x_DoublewitnessName2");
		if (!$this->DoublewitnessName2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoublewitnessName2->Visible = FALSE; // Disable update for API request
			else
				$this->DoublewitnessName2->setFormValue($val);
		}

		// Check field name 'Chiefcomplaints' first before field var 'x_Chiefcomplaints'
		$val = $CurrentForm->hasValue("Chiefcomplaints") ? $CurrentForm->getValue("Chiefcomplaints") : $CurrentForm->getValue("x_Chiefcomplaints");
		if (!$this->Chiefcomplaints->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Chiefcomplaints->Visible = FALSE; // Disable update for API request
			else
				$this->Chiefcomplaints->setFormValue($val);
		}

		// Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
		$val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
		if (!$this->MenstrualHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MenstrualHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MenstrualHistory->setFormValue($val);
		}

		// Check field name 'ObstetricHistory' first before field var 'x_ObstetricHistory'
		$val = $CurrentForm->hasValue("ObstetricHistory") ? $CurrentForm->getValue("ObstetricHistory") : $CurrentForm->getValue("x_ObstetricHistory");
		if (!$this->ObstetricHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ObstetricHistory->Visible = FALSE; // Disable update for API request
			else
				$this->ObstetricHistory->setFormValue($val);
		}

		// Check field name 'MedicalHistory' first before field var 'x_MedicalHistory'
		$val = $CurrentForm->hasValue("MedicalHistory") ? $CurrentForm->getValue("MedicalHistory") : $CurrentForm->getValue("x_MedicalHistory");
		if (!$this->MedicalHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MedicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MedicalHistory->setFormValue($val);
		}

		// Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
		$val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
		if (!$this->SurgicalHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SurgicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->SurgicalHistory->setFormValue($val);
		}

		// Check field name 'Generalexaminationpallor' first before field var 'x_Generalexaminationpallor'
		$val = $CurrentForm->hasValue("Generalexaminationpallor") ? $CurrentForm->getValue("Generalexaminationpallor") : $CurrentForm->getValue("x_Generalexaminationpallor");
		if (!$this->Generalexaminationpallor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Generalexaminationpallor->Visible = FALSE; // Disable update for API request
			else
				$this->Generalexaminationpallor->setFormValue($val);
		}

		// Check field name 'PR' first before field var 'x_PR'
		$val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
		if (!$this->PR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PR->Visible = FALSE; // Disable update for API request
			else
				$this->PR->setFormValue($val);
		}

		// Check field name 'CVS' first before field var 'x_CVS'
		$val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
		if (!$this->CVS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CVS->Visible = FALSE; // Disable update for API request
			else
				$this->CVS->setFormValue($val);
		}

		// Check field name 'PA' first before field var 'x_PA'
		$val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
		if (!$this->PA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PA->Visible = FALSE; // Disable update for API request
			else
				$this->PA->setFormValue($val);
		}

		// Check field name 'PROVISIONALDIAGNOSIS' first before field var 'x_PROVISIONALDIAGNOSIS'
		$val = $CurrentForm->hasValue("PROVISIONALDIAGNOSIS") ? $CurrentForm->getValue("PROVISIONALDIAGNOSIS") : $CurrentForm->getValue("x_PROVISIONALDIAGNOSIS");
		if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PROVISIONALDIAGNOSIS->Visible = FALSE; // Disable update for API request
			else
				$this->PROVISIONALDIAGNOSIS->setFormValue($val);
		}

		// Check field name 'Investigations' first before field var 'x_Investigations'
		$val = $CurrentForm->hasValue("Investigations") ? $CurrentForm->getValue("Investigations") : $CurrentForm->getValue("x_Investigations");
		if (!$this->Investigations->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Investigations->Visible = FALSE; // Disable update for API request
			else
				$this->Investigations->setFormValue($val);
		}

		// Check field name 'Fheight' first before field var 'x_Fheight'
		$val = $CurrentForm->hasValue("Fheight") ? $CurrentForm->getValue("Fheight") : $CurrentForm->getValue("x_Fheight");
		if (!$this->Fheight->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fheight->Visible = FALSE; // Disable update for API request
			else
				$this->Fheight->setFormValue($val);
		}

		// Check field name 'Fweight' first before field var 'x_Fweight'
		$val = $CurrentForm->hasValue("Fweight") ? $CurrentForm->getValue("Fweight") : $CurrentForm->getValue("x_Fweight");
		if (!$this->Fweight->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fweight->Visible = FALSE; // Disable update for API request
			else
				$this->Fweight->setFormValue($val);
		}

		// Check field name 'FBMI' first before field var 'x_FBMI'
		$val = $CurrentForm->hasValue("FBMI") ? $CurrentForm->getValue("FBMI") : $CurrentForm->getValue("x_FBMI");
		if (!$this->FBMI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FBMI->Visible = FALSE; // Disable update for API request
			else
				$this->FBMI->setFormValue($val);
		}

		// Check field name 'FBloodgroup' first before field var 'x_FBloodgroup'
		$val = $CurrentForm->hasValue("FBloodgroup") ? $CurrentForm->getValue("FBloodgroup") : $CurrentForm->getValue("x_FBloodgroup");
		if (!$this->FBloodgroup->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FBloodgroup->Visible = FALSE; // Disable update for API request
			else
				$this->FBloodgroup->setFormValue($val);
		}

		// Check field name 'Mheight' first before field var 'x_Mheight'
		$val = $CurrentForm->hasValue("Mheight") ? $CurrentForm->getValue("Mheight") : $CurrentForm->getValue("x_Mheight");
		if (!$this->Mheight->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mheight->Visible = FALSE; // Disable update for API request
			else
				$this->Mheight->setFormValue($val);
		}

		// Check field name 'Mweight' first before field var 'x_Mweight'
		$val = $CurrentForm->hasValue("Mweight") ? $CurrentForm->getValue("Mweight") : $CurrentForm->getValue("x_Mweight");
		if (!$this->Mweight->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mweight->Visible = FALSE; // Disable update for API request
			else
				$this->Mweight->setFormValue($val);
		}

		// Check field name 'MBMI' first before field var 'x_MBMI'
		$val = $CurrentForm->hasValue("MBMI") ? $CurrentForm->getValue("MBMI") : $CurrentForm->getValue("x_MBMI");
		if (!$this->MBMI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MBMI->Visible = FALSE; // Disable update for API request
			else
				$this->MBMI->setFormValue($val);
		}

		// Check field name 'MBloodgroup' first before field var 'x_MBloodgroup'
		$val = $CurrentForm->hasValue("MBloodgroup") ? $CurrentForm->getValue("MBloodgroup") : $CurrentForm->getValue("x_MBloodgroup");
		if (!$this->MBloodgroup->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MBloodgroup->Visible = FALSE; // Disable update for API request
			else
				$this->MBloodgroup->setFormValue($val);
		}

		// Check field name 'FBuild' first before field var 'x_FBuild'
		$val = $CurrentForm->hasValue("FBuild") ? $CurrentForm->getValue("FBuild") : $CurrentForm->getValue("x_FBuild");
		if (!$this->FBuild->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FBuild->Visible = FALSE; // Disable update for API request
			else
				$this->FBuild->setFormValue($val);
		}

		// Check field name 'MBuild' first before field var 'x_MBuild'
		$val = $CurrentForm->hasValue("MBuild") ? $CurrentForm->getValue("MBuild") : $CurrentForm->getValue("x_MBuild");
		if (!$this->MBuild->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MBuild->Visible = FALSE; // Disable update for API request
			else
				$this->MBuild->setFormValue($val);
		}

		// Check field name 'FSkinColor' first before field var 'x_FSkinColor'
		$val = $CurrentForm->hasValue("FSkinColor") ? $CurrentForm->getValue("FSkinColor") : $CurrentForm->getValue("x_FSkinColor");
		if (!$this->FSkinColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FSkinColor->Visible = FALSE; // Disable update for API request
			else
				$this->FSkinColor->setFormValue($val);
		}

		// Check field name 'MSkinColor' first before field var 'x_MSkinColor'
		$val = $CurrentForm->hasValue("MSkinColor") ? $CurrentForm->getValue("MSkinColor") : $CurrentForm->getValue("x_MSkinColor");
		if (!$this->MSkinColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MSkinColor->Visible = FALSE; // Disable update for API request
			else
				$this->MSkinColor->setFormValue($val);
		}

		// Check field name 'FEyesColor' first before field var 'x_FEyesColor'
		$val = $CurrentForm->hasValue("FEyesColor") ? $CurrentForm->getValue("FEyesColor") : $CurrentForm->getValue("x_FEyesColor");
		if (!$this->FEyesColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FEyesColor->Visible = FALSE; // Disable update for API request
			else
				$this->FEyesColor->setFormValue($val);
		}

		// Check field name 'MEyesColor' first before field var 'x_MEyesColor'
		$val = $CurrentForm->hasValue("MEyesColor") ? $CurrentForm->getValue("MEyesColor") : $CurrentForm->getValue("x_MEyesColor");
		if (!$this->MEyesColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MEyesColor->Visible = FALSE; // Disable update for API request
			else
				$this->MEyesColor->setFormValue($val);
		}

		// Check field name 'FHairColor' first before field var 'x_FHairColor'
		$val = $CurrentForm->hasValue("FHairColor") ? $CurrentForm->getValue("FHairColor") : $CurrentForm->getValue("x_FHairColor");
		if (!$this->FHairColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FHairColor->Visible = FALSE; // Disable update for API request
			else
				$this->FHairColor->setFormValue($val);
		}

		// Check field name 'MhairColor' first before field var 'x_MhairColor'
		$val = $CurrentForm->hasValue("MhairColor") ? $CurrentForm->getValue("MhairColor") : $CurrentForm->getValue("x_MhairColor");
		if (!$this->MhairColor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MhairColor->Visible = FALSE; // Disable update for API request
			else
				$this->MhairColor->setFormValue($val);
		}

		// Check field name 'FhairTexture' first before field var 'x_FhairTexture'
		$val = $CurrentForm->hasValue("FhairTexture") ? $CurrentForm->getValue("FhairTexture") : $CurrentForm->getValue("x_FhairTexture");
		if (!$this->FhairTexture->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FhairTexture->Visible = FALSE; // Disable update for API request
			else
				$this->FhairTexture->setFormValue($val);
		}

		// Check field name 'MHairTexture' first before field var 'x_MHairTexture'
		$val = $CurrentForm->hasValue("MHairTexture") ? $CurrentForm->getValue("MHairTexture") : $CurrentForm->getValue("x_MHairTexture");
		if (!$this->MHairTexture->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MHairTexture->Visible = FALSE; // Disable update for API request
			else
				$this->MHairTexture->setFormValue($val);
		}

		// Check field name 'Fothers' first before field var 'x_Fothers'
		$val = $CurrentForm->hasValue("Fothers") ? $CurrentForm->getValue("Fothers") : $CurrentForm->getValue("x_Fothers");
		if (!$this->Fothers->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fothers->Visible = FALSE; // Disable update for API request
			else
				$this->Fothers->setFormValue($val);
		}

		// Check field name 'Mothers' first before field var 'x_Mothers'
		$val = $CurrentForm->hasValue("Mothers") ? $CurrentForm->getValue("Mothers") : $CurrentForm->getValue("x_Mothers");
		if (!$this->Mothers->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mothers->Visible = FALSE; // Disable update for API request
			else
				$this->Mothers->setFormValue($val);
		}

		// Check field name 'PGE' first before field var 'x_PGE'
		$val = $CurrentForm->hasValue("PGE") ? $CurrentForm->getValue("PGE") : $CurrentForm->getValue("x_PGE");
		if (!$this->PGE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PGE->Visible = FALSE; // Disable update for API request
			else
				$this->PGE->setFormValue($val);
		}

		// Check field name 'PPR' first before field var 'x_PPR'
		$val = $CurrentForm->hasValue("PPR") ? $CurrentForm->getValue("PPR") : $CurrentForm->getValue("x_PPR");
		if (!$this->PPR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PPR->Visible = FALSE; // Disable update for API request
			else
				$this->PPR->setFormValue($val);
		}

		// Check field name 'PBP' first before field var 'x_PBP'
		$val = $CurrentForm->hasValue("PBP") ? $CurrentForm->getValue("PBP") : $CurrentForm->getValue("x_PBP");
		if (!$this->PBP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PBP->Visible = FALSE; // Disable update for API request
			else
				$this->PBP->setFormValue($val);
		}

		// Check field name 'Breast' first before field var 'x_Breast'
		$val = $CurrentForm->hasValue("Breast") ? $CurrentForm->getValue("Breast") : $CurrentForm->getValue("x_Breast");
		if (!$this->Breast->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Breast->Visible = FALSE; // Disable update for API request
			else
				$this->Breast->setFormValue($val);
		}

		// Check field name 'PPA' first before field var 'x_PPA'
		$val = $CurrentForm->hasValue("PPA") ? $CurrentForm->getValue("PPA") : $CurrentForm->getValue("x_PPA");
		if (!$this->PPA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PPA->Visible = FALSE; // Disable update for API request
			else
				$this->PPA->setFormValue($val);
		}

		// Check field name 'PPSV' first before field var 'x_PPSV'
		$val = $CurrentForm->hasValue("PPSV") ? $CurrentForm->getValue("PPSV") : $CurrentForm->getValue("x_PPSV");
		if (!$this->PPSV->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PPSV->Visible = FALSE; // Disable update for API request
			else
				$this->PPSV->setFormValue($val);
		}

		// Check field name 'PPAPSMEAR' first before field var 'x_PPAPSMEAR'
		$val = $CurrentForm->hasValue("PPAPSMEAR") ? $CurrentForm->getValue("PPAPSMEAR") : $CurrentForm->getValue("x_PPAPSMEAR");
		if (!$this->PPAPSMEAR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PPAPSMEAR->Visible = FALSE; // Disable update for API request
			else
				$this->PPAPSMEAR->setFormValue($val);
		}

		// Check field name 'PTHYROID' first before field var 'x_PTHYROID'
		$val = $CurrentForm->hasValue("PTHYROID") ? $CurrentForm->getValue("PTHYROID") : $CurrentForm->getValue("x_PTHYROID");
		if (!$this->PTHYROID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PTHYROID->Visible = FALSE; // Disable update for API request
			else
				$this->PTHYROID->setFormValue($val);
		}

		// Check field name 'MTHYROID' first before field var 'x_MTHYROID'
		$val = $CurrentForm->hasValue("MTHYROID") ? $CurrentForm->getValue("MTHYROID") : $CurrentForm->getValue("x_MTHYROID");
		if (!$this->MTHYROID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MTHYROID->Visible = FALSE; // Disable update for API request
			else
				$this->MTHYROID->setFormValue($val);
		}

		// Check field name 'SecSexCharacters' first before field var 'x_SecSexCharacters'
		$val = $CurrentForm->hasValue("SecSexCharacters") ? $CurrentForm->getValue("SecSexCharacters") : $CurrentForm->getValue("x_SecSexCharacters");
		if (!$this->SecSexCharacters->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SecSexCharacters->Visible = FALSE; // Disable update for API request
			else
				$this->SecSexCharacters->setFormValue($val);
		}

		// Check field name 'PenisUM' first before field var 'x_PenisUM'
		$val = $CurrentForm->hasValue("PenisUM") ? $CurrentForm->getValue("PenisUM") : $CurrentForm->getValue("x_PenisUM");
		if (!$this->PenisUM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PenisUM->Visible = FALSE; // Disable update for API request
			else
				$this->PenisUM->setFormValue($val);
		}

		// Check field name 'VAS' first before field var 'x_VAS'
		$val = $CurrentForm->hasValue("VAS") ? $CurrentForm->getValue("VAS") : $CurrentForm->getValue("x_VAS");
		if (!$this->VAS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VAS->Visible = FALSE; // Disable update for API request
			else
				$this->VAS->setFormValue($val);
		}

		// Check field name 'EPIDIDYMIS' first before field var 'x_EPIDIDYMIS'
		$val = $CurrentForm->hasValue("EPIDIDYMIS") ? $CurrentForm->getValue("EPIDIDYMIS") : $CurrentForm->getValue("x_EPIDIDYMIS");
		if (!$this->EPIDIDYMIS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EPIDIDYMIS->Visible = FALSE; // Disable update for API request
			else
				$this->EPIDIDYMIS->setFormValue($val);
		}

		// Check field name 'Varicocele' first before field var 'x_Varicocele'
		$val = $CurrentForm->hasValue("Varicocele") ? $CurrentForm->getValue("Varicocele") : $CurrentForm->getValue("x_Varicocele");
		if (!$this->Varicocele->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Varicocele->Visible = FALSE; // Disable update for API request
			else
				$this->Varicocele->setFormValue($val);
		}

		// Check field name 'FertilityTreatmentHistory' first before field var 'x_FertilityTreatmentHistory'
		$val = $CurrentForm->hasValue("FertilityTreatmentHistory") ? $CurrentForm->getValue("FertilityTreatmentHistory") : $CurrentForm->getValue("x_FertilityTreatmentHistory");
		if (!$this->FertilityTreatmentHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FertilityTreatmentHistory->Visible = FALSE; // Disable update for API request
			else
				$this->FertilityTreatmentHistory->setFormValue($val);
		}

		// Check field name 'SurgeryHistory' first before field var 'x_SurgeryHistory'
		$val = $CurrentForm->hasValue("SurgeryHistory") ? $CurrentForm->getValue("SurgeryHistory") : $CurrentForm->getValue("x_SurgeryHistory");
		if (!$this->SurgeryHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SurgeryHistory->Visible = FALSE; // Disable update for API request
			else
				$this->SurgeryHistory->setFormValue($val);
		}

		// Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
		$val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
		if (!$this->FamilyHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FamilyHistory->Visible = FALSE; // Disable update for API request
			else
				$this->FamilyHistory->setFormValue($val);
		}

		// Check field name 'PInvestigations' first before field var 'x_PInvestigations'
		$val = $CurrentForm->hasValue("PInvestigations") ? $CurrentForm->getValue("PInvestigations") : $CurrentForm->getValue("x_PInvestigations");
		if (!$this->PInvestigations->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PInvestigations->Visible = FALSE; // Disable update for API request
			else
				$this->PInvestigations->setFormValue($val);
		}

		// Check field name 'Addictions' first before field var 'x_Addictions'
		$val = $CurrentForm->hasValue("Addictions") ? $CurrentForm->getValue("Addictions") : $CurrentForm->getValue("x_Addictions");
		if (!$this->Addictions->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Addictions->Visible = FALSE; // Disable update for API request
			else
				$this->Addictions->setFormValue($val);
		}

		// Check field name 'Medications' first before field var 'x_Medications'
		$val = $CurrentForm->hasValue("Medications") ? $CurrentForm->getValue("Medications") : $CurrentForm->getValue("x_Medications");
		if (!$this->Medications->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Medications->Visible = FALSE; // Disable update for API request
			else
				$this->Medications->setFormValue($val);
		}

		// Check field name 'Medical' first before field var 'x_Medical'
		$val = $CurrentForm->hasValue("Medical") ? $CurrentForm->getValue("Medical") : $CurrentForm->getValue("x_Medical");
		if (!$this->Medical->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Medical->Visible = FALSE; // Disable update for API request
			else
				$this->Medical->setFormValue($val);
		}

		// Check field name 'Surgical' first before field var 'x_Surgical'
		$val = $CurrentForm->hasValue("Surgical") ? $CurrentForm->getValue("Surgical") : $CurrentForm->getValue("x_Surgical");
		if (!$this->Surgical->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Surgical->Visible = FALSE; // Disable update for API request
			else
				$this->Surgical->setFormValue($val);
		}

		// Check field name 'CoitalHistory' first before field var 'x_CoitalHistory'
		$val = $CurrentForm->hasValue("CoitalHistory") ? $CurrentForm->getValue("CoitalHistory") : $CurrentForm->getValue("x_CoitalHistory");
		if (!$this->CoitalHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CoitalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->CoitalHistory->setFormValue($val);
		}

		// Check field name 'SemenAnalysis' first before field var 'x_SemenAnalysis'
		$val = $CurrentForm->hasValue("SemenAnalysis") ? $CurrentForm->getValue("SemenAnalysis") : $CurrentForm->getValue("x_SemenAnalysis");
		if (!$this->SemenAnalysis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SemenAnalysis->Visible = FALSE; // Disable update for API request
			else
				$this->SemenAnalysis->setFormValue($val);
		}

		// Check field name 'MInsvestications' first before field var 'x_MInsvestications'
		$val = $CurrentForm->hasValue("MInsvestications") ? $CurrentForm->getValue("MInsvestications") : $CurrentForm->getValue("x_MInsvestications");
		if (!$this->MInsvestications->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MInsvestications->Visible = FALSE; // Disable update for API request
			else
				$this->MInsvestications->setFormValue($val);
		}

		// Check field name 'PImpression' first before field var 'x_PImpression'
		$val = $CurrentForm->hasValue("PImpression") ? $CurrentForm->getValue("PImpression") : $CurrentForm->getValue("x_PImpression");
		if (!$this->PImpression->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PImpression->Visible = FALSE; // Disable update for API request
			else
				$this->PImpression->setFormValue($val);
		}

		// Check field name 'MIMpression' first before field var 'x_MIMpression'
		$val = $CurrentForm->hasValue("MIMpression") ? $CurrentForm->getValue("MIMpression") : $CurrentForm->getValue("x_MIMpression");
		if (!$this->MIMpression->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MIMpression->Visible = FALSE; // Disable update for API request
			else
				$this->MIMpression->setFormValue($val);
		}

		// Check field name 'PPlanOfManagement' first before field var 'x_PPlanOfManagement'
		$val = $CurrentForm->hasValue("PPlanOfManagement") ? $CurrentForm->getValue("PPlanOfManagement") : $CurrentForm->getValue("x_PPlanOfManagement");
		if (!$this->PPlanOfManagement->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PPlanOfManagement->Visible = FALSE; // Disable update for API request
			else
				$this->PPlanOfManagement->setFormValue($val);
		}

		// Check field name 'MPlanOfManagement' first before field var 'x_MPlanOfManagement'
		$val = $CurrentForm->hasValue("MPlanOfManagement") ? $CurrentForm->getValue("MPlanOfManagement") : $CurrentForm->getValue("x_MPlanOfManagement");
		if (!$this->MPlanOfManagement->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MPlanOfManagement->Visible = FALSE; // Disable update for API request
			else
				$this->MPlanOfManagement->setFormValue($val);
		}

		// Check field name 'PReadMore' first before field var 'x_PReadMore'
		$val = $CurrentForm->hasValue("PReadMore") ? $CurrentForm->getValue("PReadMore") : $CurrentForm->getValue("x_PReadMore");
		if (!$this->PReadMore->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PReadMore->Visible = FALSE; // Disable update for API request
			else
				$this->PReadMore->setFormValue($val);
		}

		// Check field name 'MReadMore' first before field var 'x_MReadMore'
		$val = $CurrentForm->hasValue("MReadMore") ? $CurrentForm->getValue("MReadMore") : $CurrentForm->getValue("x_MReadMore");
		if (!$this->MReadMore->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MReadMore->Visible = FALSE; // Disable update for API request
			else
				$this->MReadMore->setFormValue($val);
		}

		// Check field name 'MariedFor' first before field var 'x_MariedFor'
		$val = $CurrentForm->hasValue("MariedFor") ? $CurrentForm->getValue("MariedFor") : $CurrentForm->getValue("x_MariedFor");
		if (!$this->MariedFor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MariedFor->Visible = FALSE; // Disable update for API request
			else
				$this->MariedFor->setFormValue($val);
		}

		// Check field name 'CMNCM' first before field var 'x_CMNCM'
		$val = $CurrentForm->hasValue("CMNCM") ? $CurrentForm->getValue("CMNCM") : $CurrentForm->getValue("x_CMNCM");
		if (!$this->CMNCM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CMNCM->Visible = FALSE; // Disable update for API request
			else
				$this->CMNCM->setFormValue($val);
		}

		// Check field name 'TemplateMenstrualHistory' first before field var 'x_TemplateMenstrualHistory'
		$val = $CurrentForm->hasValue("TemplateMenstrualHistory") ? $CurrentForm->getValue("TemplateMenstrualHistory") : $CurrentForm->getValue("x_TemplateMenstrualHistory");
		if (!$this->TemplateMenstrualHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateMenstrualHistory->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateMenstrualHistory->setFormValue($val);
		}

		// Check field name 'TemplateObstetricHistory' first before field var 'x_TemplateObstetricHistory'
		$val = $CurrentForm->hasValue("TemplateObstetricHistory") ? $CurrentForm->getValue("TemplateObstetricHistory") : $CurrentForm->getValue("x_TemplateObstetricHistory");
		if (!$this->TemplateObstetricHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateObstetricHistory->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateObstetricHistory->setFormValue($val);
		}

		// Check field name 'TemplateFertilityTreatmentHistory' first before field var 'x_TemplateFertilityTreatmentHistory'
		$val = $CurrentForm->hasValue("TemplateFertilityTreatmentHistory") ? $CurrentForm->getValue("TemplateFertilityTreatmentHistory") : $CurrentForm->getValue("x_TemplateFertilityTreatmentHistory");
		if (!$this->TemplateFertilityTreatmentHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateFertilityTreatmentHistory->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateFertilityTreatmentHistory->setFormValue($val);
		}

		// Check field name 'TemplateSurgeryHistory' first before field var 'x_TemplateSurgeryHistory'
		$val = $CurrentForm->hasValue("TemplateSurgeryHistory") ? $CurrentForm->getValue("TemplateSurgeryHistory") : $CurrentForm->getValue("x_TemplateSurgeryHistory");
		if (!$this->TemplateSurgeryHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateSurgeryHistory->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateSurgeryHistory->setFormValue($val);
		}

		// Check field name 'TemplateFInvestigations' first before field var 'x_TemplateFInvestigations'
		$val = $CurrentForm->hasValue("TemplateFInvestigations") ? $CurrentForm->getValue("TemplateFInvestigations") : $CurrentForm->getValue("x_TemplateFInvestigations");
		if (!$this->TemplateFInvestigations->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateFInvestigations->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateFInvestigations->setFormValue($val);
		}

		// Check field name 'TemplatePlanOfManagement' first before field var 'x_TemplatePlanOfManagement'
		$val = $CurrentForm->hasValue("TemplatePlanOfManagement") ? $CurrentForm->getValue("TemplatePlanOfManagement") : $CurrentForm->getValue("x_TemplatePlanOfManagement");
		if (!$this->TemplatePlanOfManagement->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplatePlanOfManagement->Visible = FALSE; // Disable update for API request
			else
				$this->TemplatePlanOfManagement->setFormValue($val);
		}

		// Check field name 'TemplatePImpression' first before field var 'x_TemplatePImpression'
		$val = $CurrentForm->hasValue("TemplatePImpression") ? $CurrentForm->getValue("TemplatePImpression") : $CurrentForm->getValue("x_TemplatePImpression");
		if (!$this->TemplatePImpression->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplatePImpression->Visible = FALSE; // Disable update for API request
			else
				$this->TemplatePImpression->setFormValue($val);
		}

		// Check field name 'TemplateMedications' first before field var 'x_TemplateMedications'
		$val = $CurrentForm->hasValue("TemplateMedications") ? $CurrentForm->getValue("TemplateMedications") : $CurrentForm->getValue("x_TemplateMedications");
		if (!$this->TemplateMedications->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateMedications->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateMedications->setFormValue($val);
		}

		// Check field name 'TemplateSemenAnalysis' first before field var 'x_TemplateSemenAnalysis'
		$val = $CurrentForm->hasValue("TemplateSemenAnalysis") ? $CurrentForm->getValue("TemplateSemenAnalysis") : $CurrentForm->getValue("x_TemplateSemenAnalysis");
		if (!$this->TemplateSemenAnalysis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateSemenAnalysis->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateSemenAnalysis->setFormValue($val);
		}

		// Check field name 'MaleInsvestications' first before field var 'x_MaleInsvestications'
		$val = $CurrentForm->hasValue("MaleInsvestications") ? $CurrentForm->getValue("MaleInsvestications") : $CurrentForm->getValue("x_MaleInsvestications");
		if (!$this->MaleInsvestications->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaleInsvestications->Visible = FALSE; // Disable update for API request
			else
				$this->MaleInsvestications->setFormValue($val);
		}

		// Check field name 'TemplateMIMpression' first before field var 'x_TemplateMIMpression'
		$val = $CurrentForm->hasValue("TemplateMIMpression") ? $CurrentForm->getValue("TemplateMIMpression") : $CurrentForm->getValue("x_TemplateMIMpression");
		if (!$this->TemplateMIMpression->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateMIMpression->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateMIMpression->setFormValue($val);
		}

		// Check field name 'TemplateMalePlanOfManagement' first before field var 'x_TemplateMalePlanOfManagement'
		$val = $CurrentForm->hasValue("TemplateMalePlanOfManagement") ? $CurrentForm->getValue("TemplateMalePlanOfManagement") : $CurrentForm->getValue("x_TemplateMalePlanOfManagement");
		if (!$this->TemplateMalePlanOfManagement->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateMalePlanOfManagement->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateMalePlanOfManagement->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'pFamilyHistory' first before field var 'x_pFamilyHistory'
		$val = $CurrentForm->hasValue("pFamilyHistory") ? $CurrentForm->getValue("pFamilyHistory") : $CurrentForm->getValue("x_pFamilyHistory");
		if (!$this->pFamilyHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pFamilyHistory->Visible = FALSE; // Disable update for API request
			else
				$this->pFamilyHistory->setFormValue($val);
		}

		// Check field name 'pTemplateMedications' first before field var 'x_pTemplateMedications'
		$val = $CurrentForm->hasValue("pTemplateMedications") ? $CurrentForm->getValue("pTemplateMedications") : $CurrentForm->getValue("x_pTemplateMedications");
		if (!$this->pTemplateMedications->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pTemplateMedications->Visible = FALSE; // Disable update for API request
			else
				$this->pTemplateMedications->setFormValue($val);
		}

		// Check field name 'AntiTPO' first before field var 'x_AntiTPO'
		$val = $CurrentForm->hasValue("AntiTPO") ? $CurrentForm->getValue("AntiTPO") : $CurrentForm->getValue("x_AntiTPO");
		if (!$this->AntiTPO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AntiTPO->Visible = FALSE; // Disable update for API request
			else
				$this->AntiTPO->setFormValue($val);
		}

		// Check field name 'AntiTG' first before field var 'x_AntiTG'
		$val = $CurrentForm->hasValue("AntiTG") ? $CurrentForm->getValue("AntiTG") : $CurrentForm->getValue("x_AntiTG");
		if (!$this->AntiTG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AntiTG->Visible = FALSE; // Disable update for API request
			else
				$this->AntiTG->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->SEX->CurrentValue = $this->SEX->FormValue;
		$this->Religion->CurrentValue = $this->Religion->FormValue;
		$this->Address->CurrentValue = $this->Address->FormValue;
		$this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
		$this->DoublewitnessName1->CurrentValue = $this->DoublewitnessName1->FormValue;
		$this->DoublewitnessName2->CurrentValue = $this->DoublewitnessName2->FormValue;
		$this->Chiefcomplaints->CurrentValue = $this->Chiefcomplaints->FormValue;
		$this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
		$this->ObstetricHistory->CurrentValue = $this->ObstetricHistory->FormValue;
		$this->MedicalHistory->CurrentValue = $this->MedicalHistory->FormValue;
		$this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
		$this->Generalexaminationpallor->CurrentValue = $this->Generalexaminationpallor->FormValue;
		$this->PR->CurrentValue = $this->PR->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->PROVISIONALDIAGNOSIS->CurrentValue = $this->PROVISIONALDIAGNOSIS->FormValue;
		$this->Investigations->CurrentValue = $this->Investigations->FormValue;
		$this->Fheight->CurrentValue = $this->Fheight->FormValue;
		$this->Fweight->CurrentValue = $this->Fweight->FormValue;
		$this->FBMI->CurrentValue = $this->FBMI->FormValue;
		$this->FBloodgroup->CurrentValue = $this->FBloodgroup->FormValue;
		$this->Mheight->CurrentValue = $this->Mheight->FormValue;
		$this->Mweight->CurrentValue = $this->Mweight->FormValue;
		$this->MBMI->CurrentValue = $this->MBMI->FormValue;
		$this->MBloodgroup->CurrentValue = $this->MBloodgroup->FormValue;
		$this->FBuild->CurrentValue = $this->FBuild->FormValue;
		$this->MBuild->CurrentValue = $this->MBuild->FormValue;
		$this->FSkinColor->CurrentValue = $this->FSkinColor->FormValue;
		$this->MSkinColor->CurrentValue = $this->MSkinColor->FormValue;
		$this->FEyesColor->CurrentValue = $this->FEyesColor->FormValue;
		$this->MEyesColor->CurrentValue = $this->MEyesColor->FormValue;
		$this->FHairColor->CurrentValue = $this->FHairColor->FormValue;
		$this->MhairColor->CurrentValue = $this->MhairColor->FormValue;
		$this->FhairTexture->CurrentValue = $this->FhairTexture->FormValue;
		$this->MHairTexture->CurrentValue = $this->MHairTexture->FormValue;
		$this->Fothers->CurrentValue = $this->Fothers->FormValue;
		$this->Mothers->CurrentValue = $this->Mothers->FormValue;
		$this->PGE->CurrentValue = $this->PGE->FormValue;
		$this->PPR->CurrentValue = $this->PPR->FormValue;
		$this->PBP->CurrentValue = $this->PBP->FormValue;
		$this->Breast->CurrentValue = $this->Breast->FormValue;
		$this->PPA->CurrentValue = $this->PPA->FormValue;
		$this->PPSV->CurrentValue = $this->PPSV->FormValue;
		$this->PPAPSMEAR->CurrentValue = $this->PPAPSMEAR->FormValue;
		$this->PTHYROID->CurrentValue = $this->PTHYROID->FormValue;
		$this->MTHYROID->CurrentValue = $this->MTHYROID->FormValue;
		$this->SecSexCharacters->CurrentValue = $this->SecSexCharacters->FormValue;
		$this->PenisUM->CurrentValue = $this->PenisUM->FormValue;
		$this->VAS->CurrentValue = $this->VAS->FormValue;
		$this->EPIDIDYMIS->CurrentValue = $this->EPIDIDYMIS->FormValue;
		$this->Varicocele->CurrentValue = $this->Varicocele->FormValue;
		$this->FertilityTreatmentHistory->CurrentValue = $this->FertilityTreatmentHistory->FormValue;
		$this->SurgeryHistory->CurrentValue = $this->SurgeryHistory->FormValue;
		$this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
		$this->PInvestigations->CurrentValue = $this->PInvestigations->FormValue;
		$this->Addictions->CurrentValue = $this->Addictions->FormValue;
		$this->Medications->CurrentValue = $this->Medications->FormValue;
		$this->Medical->CurrentValue = $this->Medical->FormValue;
		$this->Surgical->CurrentValue = $this->Surgical->FormValue;
		$this->CoitalHistory->CurrentValue = $this->CoitalHistory->FormValue;
		$this->SemenAnalysis->CurrentValue = $this->SemenAnalysis->FormValue;
		$this->MInsvestications->CurrentValue = $this->MInsvestications->FormValue;
		$this->PImpression->CurrentValue = $this->PImpression->FormValue;
		$this->MIMpression->CurrentValue = $this->MIMpression->FormValue;
		$this->PPlanOfManagement->CurrentValue = $this->PPlanOfManagement->FormValue;
		$this->MPlanOfManagement->CurrentValue = $this->MPlanOfManagement->FormValue;
		$this->PReadMore->CurrentValue = $this->PReadMore->FormValue;
		$this->MReadMore->CurrentValue = $this->MReadMore->FormValue;
		$this->MariedFor->CurrentValue = $this->MariedFor->FormValue;
		$this->CMNCM->CurrentValue = $this->CMNCM->FormValue;
		$this->TemplateMenstrualHistory->CurrentValue = $this->TemplateMenstrualHistory->FormValue;
		$this->TemplateObstetricHistory->CurrentValue = $this->TemplateObstetricHistory->FormValue;
		$this->TemplateFertilityTreatmentHistory->CurrentValue = $this->TemplateFertilityTreatmentHistory->FormValue;
		$this->TemplateSurgeryHistory->CurrentValue = $this->TemplateSurgeryHistory->FormValue;
		$this->TemplateFInvestigations->CurrentValue = $this->TemplateFInvestigations->FormValue;
		$this->TemplatePlanOfManagement->CurrentValue = $this->TemplatePlanOfManagement->FormValue;
		$this->TemplatePImpression->CurrentValue = $this->TemplatePImpression->FormValue;
		$this->TemplateMedications->CurrentValue = $this->TemplateMedications->FormValue;
		$this->TemplateSemenAnalysis->CurrentValue = $this->TemplateSemenAnalysis->FormValue;
		$this->MaleInsvestications->CurrentValue = $this->MaleInsvestications->FormValue;
		$this->TemplateMIMpression->CurrentValue = $this->TemplateMIMpression->FormValue;
		$this->TemplateMalePlanOfManagement->CurrentValue = $this->TemplateMalePlanOfManagement->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->pFamilyHistory->CurrentValue = $this->pFamilyHistory->FormValue;
		$this->pTemplateMedications->CurrentValue = $this->pTemplateMedications->FormValue;
		$this->AntiTPO->CurrentValue = $this->AntiTPO->FormValue;
		$this->AntiTG->CurrentValue = $this->AntiTG->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
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
		if (array_key_exists('EV__Surgical', $rs->fields)) {
			$this->Surgical->VirtualValue = $rs->fields('EV__Surgical'); // Set up virtual field value
		} else {
			$this->Surgical->VirtualValue = ""; // Clear value
		}
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
		$this->TemplateMenstrualHistory->setDbValue($row['TemplateMenstrualHistory']);
		$this->TemplateObstetricHistory->setDbValue($row['TemplateObstetricHistory']);
		$this->TemplateFertilityTreatmentHistory->setDbValue($row['TemplateFertilityTreatmentHistory']);
		$this->TemplateSurgeryHistory->setDbValue($row['TemplateSurgeryHistory']);
		$this->TemplateFInvestigations->setDbValue($row['TemplateFInvestigations']);
		$this->TemplatePlanOfManagement->setDbValue($row['TemplatePlanOfManagement']);
		$this->TemplatePImpression->setDbValue($row['TemplatePImpression']);
		$this->TemplateMedications->setDbValue($row['TemplateMedications']);
		$this->TemplateSemenAnalysis->setDbValue($row['TemplateSemenAnalysis']);
		$this->MaleInsvestications->setDbValue($row['MaleInsvestications']);
		$this->TemplateMIMpression->setDbValue($row['TemplateMIMpression']);
		$this->TemplateMalePlanOfManagement->setDbValue($row['TemplateMalePlanOfManagement']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
		$this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
		$this->AntiTPO->setDbValue($row['AntiTPO']);
		$this->AntiTG->setDbValue($row['AntiTG']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['SEX'] = $this->SEX->CurrentValue;
		$row['Religion'] = $this->Religion->CurrentValue;
		$row['Address'] = $this->Address->CurrentValue;
		$row['IdentificationMark'] = $this->IdentificationMark->CurrentValue;
		$row['DoublewitnessName1'] = $this->DoublewitnessName1->CurrentValue;
		$row['DoublewitnessName2'] = $this->DoublewitnessName2->CurrentValue;
		$row['Chiefcomplaints'] = $this->Chiefcomplaints->CurrentValue;
		$row['MenstrualHistory'] = $this->MenstrualHistory->CurrentValue;
		$row['ObstetricHistory'] = $this->ObstetricHistory->CurrentValue;
		$row['MedicalHistory'] = $this->MedicalHistory->CurrentValue;
		$row['SurgicalHistory'] = $this->SurgicalHistory->CurrentValue;
		$row['Generalexaminationpallor'] = $this->Generalexaminationpallor->CurrentValue;
		$row['PR'] = $this->PR->CurrentValue;
		$row['CVS'] = $this->CVS->CurrentValue;
		$row['PA'] = $this->PA->CurrentValue;
		$row['PROVISIONALDIAGNOSIS'] = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$row['Investigations'] = $this->Investigations->CurrentValue;
		$row['Fheight'] = $this->Fheight->CurrentValue;
		$row['Fweight'] = $this->Fweight->CurrentValue;
		$row['FBMI'] = $this->FBMI->CurrentValue;
		$row['FBloodgroup'] = $this->FBloodgroup->CurrentValue;
		$row['Mheight'] = $this->Mheight->CurrentValue;
		$row['Mweight'] = $this->Mweight->CurrentValue;
		$row['MBMI'] = $this->MBMI->CurrentValue;
		$row['MBloodgroup'] = $this->MBloodgroup->CurrentValue;
		$row['FBuild'] = $this->FBuild->CurrentValue;
		$row['MBuild'] = $this->MBuild->CurrentValue;
		$row['FSkinColor'] = $this->FSkinColor->CurrentValue;
		$row['MSkinColor'] = $this->MSkinColor->CurrentValue;
		$row['FEyesColor'] = $this->FEyesColor->CurrentValue;
		$row['MEyesColor'] = $this->MEyesColor->CurrentValue;
		$row['FHairColor'] = $this->FHairColor->CurrentValue;
		$row['MhairColor'] = $this->MhairColor->CurrentValue;
		$row['FhairTexture'] = $this->FhairTexture->CurrentValue;
		$row['MHairTexture'] = $this->MHairTexture->CurrentValue;
		$row['Fothers'] = $this->Fothers->CurrentValue;
		$row['Mothers'] = $this->Mothers->CurrentValue;
		$row['PGE'] = $this->PGE->CurrentValue;
		$row['PPR'] = $this->PPR->CurrentValue;
		$row['PBP'] = $this->PBP->CurrentValue;
		$row['Breast'] = $this->Breast->CurrentValue;
		$row['PPA'] = $this->PPA->CurrentValue;
		$row['PPSV'] = $this->PPSV->CurrentValue;
		$row['PPAPSMEAR'] = $this->PPAPSMEAR->CurrentValue;
		$row['PTHYROID'] = $this->PTHYROID->CurrentValue;
		$row['MTHYROID'] = $this->MTHYROID->CurrentValue;
		$row['SecSexCharacters'] = $this->SecSexCharacters->CurrentValue;
		$row['PenisUM'] = $this->PenisUM->CurrentValue;
		$row['VAS'] = $this->VAS->CurrentValue;
		$row['EPIDIDYMIS'] = $this->EPIDIDYMIS->CurrentValue;
		$row['Varicocele'] = $this->Varicocele->CurrentValue;
		$row['FertilityTreatmentHistory'] = $this->FertilityTreatmentHistory->CurrentValue;
		$row['SurgeryHistory'] = $this->SurgeryHistory->CurrentValue;
		$row['FamilyHistory'] = $this->FamilyHistory->CurrentValue;
		$row['PInvestigations'] = $this->PInvestigations->CurrentValue;
		$row['Addictions'] = $this->Addictions->CurrentValue;
		$row['Medications'] = $this->Medications->CurrentValue;
		$row['Medical'] = $this->Medical->CurrentValue;
		$row['Surgical'] = $this->Surgical->CurrentValue;
		$row['CoitalHistory'] = $this->CoitalHistory->CurrentValue;
		$row['SemenAnalysis'] = $this->SemenAnalysis->CurrentValue;
		$row['MInsvestications'] = $this->MInsvestications->CurrentValue;
		$row['PImpression'] = $this->PImpression->CurrentValue;
		$row['MIMpression'] = $this->MIMpression->CurrentValue;
		$row['PPlanOfManagement'] = $this->PPlanOfManagement->CurrentValue;
		$row['MPlanOfManagement'] = $this->MPlanOfManagement->CurrentValue;
		$row['PReadMore'] = $this->PReadMore->CurrentValue;
		$row['MReadMore'] = $this->MReadMore->CurrentValue;
		$row['MariedFor'] = $this->MariedFor->CurrentValue;
		$row['CMNCM'] = $this->CMNCM->CurrentValue;
		$row['TemplateMenstrualHistory'] = $this->TemplateMenstrualHistory->CurrentValue;
		$row['TemplateObstetricHistory'] = $this->TemplateObstetricHistory->CurrentValue;
		$row['TemplateFertilityTreatmentHistory'] = $this->TemplateFertilityTreatmentHistory->CurrentValue;
		$row['TemplateSurgeryHistory'] = $this->TemplateSurgeryHistory->CurrentValue;
		$row['TemplateFInvestigations'] = $this->TemplateFInvestigations->CurrentValue;
		$row['TemplatePlanOfManagement'] = $this->TemplatePlanOfManagement->CurrentValue;
		$row['TemplatePImpression'] = $this->TemplatePImpression->CurrentValue;
		$row['TemplateMedications'] = $this->TemplateMedications->CurrentValue;
		$row['TemplateSemenAnalysis'] = $this->TemplateSemenAnalysis->CurrentValue;
		$row['MaleInsvestications'] = $this->MaleInsvestications->CurrentValue;
		$row['TemplateMIMpression'] = $this->TemplateMIMpression->CurrentValue;
		$row['TemplateMalePlanOfManagement'] = $this->TemplateMalePlanOfManagement->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['pFamilyHistory'] = $this->pFamilyHistory->CurrentValue;
		$row['pTemplateMedications'] = $this->pTemplateMedications->CurrentValue;
		$row['AntiTPO'] = $this->AntiTPO->CurrentValue;
		$row['AntiTG'] = $this->AntiTG->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
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

		$this->Row_Rendering();

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
		// TemplateMenstrualHistory
		// TemplateObstetricHistory
		// TemplateFertilityTreatmentHistory
		// TemplateSurgeryHistory
		// TemplateFInvestigations
		// TemplatePlanOfManagement
		// TemplatePImpression
		// TemplateMedications
		// TemplateSemenAnalysis
		// MaleInsvestications
		// TemplateMIMpression
		// TemplateMalePlanOfManagement
		// TidNo
		// pFamilyHistory
		// pTemplateMedications
		// AntiTPO
		// AntiTG

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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

			// DoublewitnessName1
			$this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
			$this->DoublewitnessName1->ViewCustomAttributes = "";

			// DoublewitnessName2
			$this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
			$this->DoublewitnessName2->ViewCustomAttributes = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
			$this->Chiefcomplaints->ViewCustomAttributes = "";

			// MenstrualHistory
			$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// ObstetricHistory
			$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
			$this->ObstetricHistory->ViewCustomAttributes = "";

			// MedicalHistory
			if (strval($this->MedicalHistory->CurrentValue) <> "") {
				$this->MedicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->MedicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->MedicalHistory->ViewValue->add($this->MedicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->MedicalHistory->ViewValue = NULL;
			}
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
			$curVal = strval($this->FBloodgroup->CurrentValue);
			if ($curVal <> "") {
				$this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
				if ($this->FBloodgroup->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->FBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->FBloodgroup->ViewValue = $this->FBloodgroup->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
					}
				}
			} else {
				$this->FBloodgroup->ViewValue = NULL;
			}
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
			$curVal = strval($this->MBloodgroup->CurrentValue);
			if ($curVal <> "") {
				$this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
				if ($this->MBloodgroup->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MBloodgroup->ViewValue = $this->MBloodgroup->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
					}
				}
			} else {
				$this->MBloodgroup->ViewValue = NULL;
			}
			$this->MBloodgroup->ViewCustomAttributes = "";

			// FBuild
			if (strval($this->FBuild->CurrentValue) <> "") {
				$this->FBuild->ViewValue = $this->FBuild->optionCaption($this->FBuild->CurrentValue);
			} else {
				$this->FBuild->ViewValue = NULL;
			}
			$this->FBuild->ViewCustomAttributes = "";

			// MBuild
			if (strval($this->MBuild->CurrentValue) <> "") {
				$this->MBuild->ViewValue = $this->MBuild->optionCaption($this->MBuild->CurrentValue);
			} else {
				$this->MBuild->ViewValue = NULL;
			}
			$this->MBuild->ViewCustomAttributes = "";

			// FSkinColor
			if (strval($this->FSkinColor->CurrentValue) <> "") {
				$this->FSkinColor->ViewValue = $this->FSkinColor->optionCaption($this->FSkinColor->CurrentValue);
			} else {
				$this->FSkinColor->ViewValue = NULL;
			}
			$this->FSkinColor->ViewCustomAttributes = "";

			// MSkinColor
			if (strval($this->MSkinColor->CurrentValue) <> "") {
				$this->MSkinColor->ViewValue = $this->MSkinColor->optionCaption($this->MSkinColor->CurrentValue);
			} else {
				$this->MSkinColor->ViewValue = NULL;
			}
			$this->MSkinColor->ViewCustomAttributes = "";

			// FEyesColor
			if (strval($this->FEyesColor->CurrentValue) <> "") {
				$this->FEyesColor->ViewValue = $this->FEyesColor->optionCaption($this->FEyesColor->CurrentValue);
			} else {
				$this->FEyesColor->ViewValue = NULL;
			}
			$this->FEyesColor->ViewCustomAttributes = "";

			// MEyesColor
			if (strval($this->MEyesColor->CurrentValue) <> "") {
				$this->MEyesColor->ViewValue = $this->MEyesColor->optionCaption($this->MEyesColor->CurrentValue);
			} else {
				$this->MEyesColor->ViewValue = NULL;
			}
			$this->MEyesColor->ViewCustomAttributes = "";

			// FHairColor
			if (strval($this->FHairColor->CurrentValue) <> "") {
				$this->FHairColor->ViewValue = $this->FHairColor->optionCaption($this->FHairColor->CurrentValue);
			} else {
				$this->FHairColor->ViewValue = NULL;
			}
			$this->FHairColor->ViewCustomAttributes = "";

			// MhairColor
			if (strval($this->MhairColor->CurrentValue) <> "") {
				$this->MhairColor->ViewValue = $this->MhairColor->optionCaption($this->MhairColor->CurrentValue);
			} else {
				$this->MhairColor->ViewValue = NULL;
			}
			$this->MhairColor->ViewCustomAttributes = "";

			// FhairTexture
			if (strval($this->FhairTexture->CurrentValue) <> "") {
				$this->FhairTexture->ViewValue = $this->FhairTexture->optionCaption($this->FhairTexture->CurrentValue);
			} else {
				$this->FhairTexture->ViewValue = NULL;
			}
			$this->FhairTexture->ViewCustomAttributes = "";

			// MHairTexture
			if (strval($this->MHairTexture->CurrentValue) <> "") {
				$this->MHairTexture->ViewValue = $this->MHairTexture->optionCaption($this->MHairTexture->CurrentValue);
			} else {
				$this->MHairTexture->ViewValue = NULL;
			}
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

			// FertilityTreatmentHistory
			$this->FertilityTreatmentHistory->ViewValue = $this->FertilityTreatmentHistory->CurrentValue;
			$this->FertilityTreatmentHistory->ViewCustomAttributes = "";

			// SurgeryHistory
			$this->SurgeryHistory->ViewValue = $this->SurgeryHistory->CurrentValue;
			$this->SurgeryHistory->ViewCustomAttributes = "";

			// FamilyHistory
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
			$curVal = strval($this->FamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->FamilyHistory->ViewValue = $this->FamilyHistory->lookupCacheOption($curVal);
				if ($this->FamilyHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->FamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->FamilyHistory->ViewValue = $this->FamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
					}
				}
			} else {
				$this->FamilyHistory->ViewValue = NULL;
			}
			$this->FamilyHistory->ViewCustomAttributes = "";

			// PInvestigations
			$this->PInvestigations->ViewValue = $this->PInvestigations->CurrentValue;
			$this->PInvestigations->ViewCustomAttributes = "";

			// Addictions
			if (strval($this->Addictions->CurrentValue) <> "") {
				$this->Addictions->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Addictions->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Addictions->ViewValue->add($this->Addictions->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Addictions->ViewValue = NULL;
			}
			$this->Addictions->ViewCustomAttributes = "";

			// Medications
			$this->Medications->ViewValue = $this->Medications->CurrentValue;
			$this->Medications->ViewCustomAttributes = "";

			// Medical
			if (strval($this->Medical->CurrentValue) <> "") {
				$this->Medical->ViewValue = $this->Medical->optionCaption($this->Medical->CurrentValue);
			} else {
				$this->Medical->ViewValue = NULL;
			}
			$this->Medical->ViewCustomAttributes = "";

			// Surgical
			if ($this->Surgical->VirtualValue <> "") {
				$this->Surgical->ViewValue = $this->Surgical->VirtualValue;
			} else {
				$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
			$curVal = strval($this->Surgical->CurrentValue);
			if ($curVal <> "") {
				$this->Surgical->ViewValue = $this->Surgical->lookupCacheOption($curVal);
				if ($this->Surgical->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='SurgicalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Surgical->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgical->ViewValue = $this->Surgical->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
					}
				}
			} else {
				$this->Surgical->ViewValue = NULL;
			}
			}
			$this->Surgical->ViewCustomAttributes = "";

			// CoitalHistory
			$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
			$curVal = strval($this->CoitalHistory->CurrentValue);
			if ($curVal <> "") {
				$this->CoitalHistory->ViewValue = $this->CoitalHistory->lookupCacheOption($curVal);
				if ($this->CoitalHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='CoitalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->CoitalHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->CoitalHistory->ViewValue = $this->CoitalHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
					}
				}
			} else {
				$this->CoitalHistory->ViewValue = NULL;
			}
			$this->CoitalHistory->ViewCustomAttributes = "";

			// SemenAnalysis
			$this->SemenAnalysis->ViewValue = $this->SemenAnalysis->CurrentValue;
			$this->SemenAnalysis->ViewCustomAttributes = "";

			// MInsvestications
			$this->MInsvestications->ViewValue = $this->MInsvestications->CurrentValue;
			$this->MInsvestications->ViewCustomAttributes = "";

			// PImpression
			$this->PImpression->ViewValue = $this->PImpression->CurrentValue;
			$this->PImpression->ViewCustomAttributes = "";

			// MIMpression
			$this->MIMpression->ViewValue = $this->MIMpression->CurrentValue;
			$this->MIMpression->ViewCustomAttributes = "";

			// PPlanOfManagement
			$this->PPlanOfManagement->ViewValue = $this->PPlanOfManagement->CurrentValue;
			$this->PPlanOfManagement->ViewCustomAttributes = "";

			// MPlanOfManagement
			$this->MPlanOfManagement->ViewValue = $this->MPlanOfManagement->CurrentValue;
			$this->MPlanOfManagement->ViewCustomAttributes = "";

			// PReadMore
			$this->PReadMore->ViewValue = $this->PReadMore->CurrentValue;
			$this->PReadMore->ViewCustomAttributes = "";

			// MReadMore
			$this->MReadMore->ViewValue = $this->MReadMore->CurrentValue;
			$this->MReadMore->ViewCustomAttributes = "";

			// MariedFor
			$this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
			$this->MariedFor->ViewCustomAttributes = "";

			// CMNCM
			$this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
			$this->CMNCM->ViewCustomAttributes = "";

			// TemplateMenstrualHistory
			$curVal = strval($this->TemplateMenstrualHistory->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->lookupCacheOption($curVal);
				if ($this->TemplateMenstrualHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Menstrual History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateMenstrualHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->CurrentValue;
					}
				}
			} else {
				$this->TemplateMenstrualHistory->ViewValue = NULL;
			}
			$this->TemplateMenstrualHistory->ViewCustomAttributes = "";

			// TemplateObstetricHistory
			$curVal = strval($this->TemplateObstetricHistory->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->lookupCacheOption($curVal);
				if ($this->TemplateObstetricHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Obstetric History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateObstetricHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->CurrentValue;
					}
				}
			} else {
				$this->TemplateObstetricHistory->ViewValue = NULL;
			}
			$this->TemplateObstetricHistory->ViewCustomAttributes = "";

			// TemplateFertilityTreatmentHistory
			$curVal = strval($this->TemplateFertilityTreatmentHistory->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->lookupCacheOption($curVal);
				if ($this->TemplateFertilityTreatmentHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Fertility Treatment History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateFertilityTreatmentHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->CurrentValue;
					}
				}
			} else {
				$this->TemplateFertilityTreatmentHistory->ViewValue = NULL;
			}
			$this->TemplateFertilityTreatmentHistory->ViewCustomAttributes = "";

			// TemplateSurgeryHistory
			$curVal = strval($this->TemplateSurgeryHistory->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->lookupCacheOption($curVal);
				if ($this->TemplateSurgeryHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Surgery History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateSurgeryHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->CurrentValue;
					}
				}
			} else {
				$this->TemplateSurgeryHistory->ViewValue = NULL;
			}
			$this->TemplateSurgeryHistory->ViewCustomAttributes = "";

			// TemplateFInvestigations
			$curVal = strval($this->TemplateFInvestigations->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->lookupCacheOption($curVal);
				if ($this->TemplateFInvestigations->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Female Investigations'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateFInvestigations->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->CurrentValue;
					}
				}
			} else {
				$this->TemplateFInvestigations->ViewValue = NULL;
			}
			$this->TemplateFInvestigations->ViewCustomAttributes = "";

			// TemplatePlanOfManagement
			$curVal = strval($this->TemplatePlanOfManagement->CurrentValue);
			if ($curVal <> "") {
				$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->lookupCacheOption($curVal);
				if ($this->TemplatePlanOfManagement->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Female Plan Of Management'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplatePlanOfManagement->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->CurrentValue;
					}
				}
			} else {
				$this->TemplatePlanOfManagement->ViewValue = NULL;
			}
			$this->TemplatePlanOfManagement->ViewCustomAttributes = "";

			// TemplatePImpression
			$curVal = strval($this->TemplatePImpression->CurrentValue);
			if ($curVal <> "") {
				$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->lookupCacheOption($curVal);
				if ($this->TemplatePImpression->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Female Impression'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplatePImpression->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->CurrentValue;
					}
				}
			} else {
				$this->TemplatePImpression->ViewValue = NULL;
			}
			$this->TemplatePImpression->ViewCustomAttributes = "";

			// TemplateMedications
			$curVal = strval($this->TemplateMedications->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateMedications->ViewValue = $this->TemplateMedications->lookupCacheOption($curVal);
				if ($this->TemplateMedications->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Medications'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateMedications->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateMedications->ViewValue = $this->TemplateMedications->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateMedications->ViewValue = $this->TemplateMedications->CurrentValue;
					}
				}
			} else {
				$this->TemplateMedications->ViewValue = NULL;
			}
			$this->TemplateMedications->ViewCustomAttributes = "";

			// TemplateSemenAnalysis
			$curVal = strval($this->TemplateSemenAnalysis->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->lookupCacheOption($curVal);
				if ($this->TemplateSemenAnalysis->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Semen Analysis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateSemenAnalysis->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->CurrentValue;
					}
				}
			} else {
				$this->TemplateSemenAnalysis->ViewValue = NULL;
			}
			$this->TemplateSemenAnalysis->ViewCustomAttributes = "";

			// MaleInsvestications
			$curVal = strval($this->MaleInsvestications->CurrentValue);
			if ($curVal <> "") {
				$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->lookupCacheOption($curVal);
				if ($this->MaleInsvestications->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Male Insvestications'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->MaleInsvestications->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->CurrentValue;
					}
				}
			} else {
				$this->MaleInsvestications->ViewValue = NULL;
			}
			$this->MaleInsvestications->ViewCustomAttributes = "";

			// TemplateMIMpression
			$curVal = strval($this->TemplateMIMpression->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->lookupCacheOption($curVal);
				if ($this->TemplateMIMpression->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Male Impression'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateMIMpression->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->CurrentValue;
					}
				}
			} else {
				$this->TemplateMIMpression->ViewValue = NULL;
			}
			$this->TemplateMIMpression->ViewCustomAttributes = "";

			// TemplateMalePlanOfManagement
			$curVal = strval($this->TemplateMalePlanOfManagement->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->lookupCacheOption($curVal);
				if ($this->TemplateMalePlanOfManagement->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Male Plan Of Management'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateMalePlanOfManagement->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->CurrentValue;
					}
				}
			} else {
				$this->TemplateMalePlanOfManagement->ViewValue = NULL;
			}
			$this->TemplateMalePlanOfManagement->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// pFamilyHistory
			$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
			$curVal = strval($this->pFamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->lookupCacheOption($curVal);
				if ($this->pFamilyHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->pFamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
					}
				}
			} else {
				$this->pFamilyHistory->ViewValue = NULL;
			}
			$this->pFamilyHistory->ViewCustomAttributes = "";

			// pTemplateMedications
			$this->pTemplateMedications->ViewValue = $this->pTemplateMedications->CurrentValue;
			$this->pTemplateMedications->ViewCustomAttributes = "";

			// AntiTPO
			$this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
			$this->AntiTPO->ViewCustomAttributes = "";

			// AntiTG
			$this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
			$this->AntiTG->ViewCustomAttributes = "";

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

			// DoublewitnessName1
			$this->DoublewitnessName1->LinkCustomAttributes = "";
			$this->DoublewitnessName1->HrefValue = "";
			$this->DoublewitnessName1->TooltipValue = "";

			// DoublewitnessName2
			$this->DoublewitnessName2->LinkCustomAttributes = "";
			$this->DoublewitnessName2->HrefValue = "";
			$this->DoublewitnessName2->TooltipValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";
			$this->Chiefcomplaints->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";
			$this->ObstetricHistory->TooltipValue = "";

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

			// FertilityTreatmentHistory
			$this->FertilityTreatmentHistory->LinkCustomAttributes = "";
			$this->FertilityTreatmentHistory->HrefValue = "";
			$this->FertilityTreatmentHistory->TooltipValue = "";

			// SurgeryHistory
			$this->SurgeryHistory->LinkCustomAttributes = "";
			$this->SurgeryHistory->HrefValue = "";
			$this->SurgeryHistory->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

			// PInvestigations
			$this->PInvestigations->LinkCustomAttributes = "";
			$this->PInvestigations->HrefValue = "";
			$this->PInvestigations->TooltipValue = "";

			// Addictions
			$this->Addictions->LinkCustomAttributes = "";
			$this->Addictions->HrefValue = "";
			$this->Addictions->TooltipValue = "";

			// Medications
			$this->Medications->LinkCustomAttributes = "";
			$this->Medications->HrefValue = "";
			$this->Medications->TooltipValue = "";

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

			// SemenAnalysis
			$this->SemenAnalysis->LinkCustomAttributes = "";
			$this->SemenAnalysis->HrefValue = "";
			$this->SemenAnalysis->TooltipValue = "";

			// MInsvestications
			$this->MInsvestications->LinkCustomAttributes = "";
			$this->MInsvestications->HrefValue = "";
			$this->MInsvestications->TooltipValue = "";

			// PImpression
			$this->PImpression->LinkCustomAttributes = "";
			$this->PImpression->HrefValue = "";
			$this->PImpression->TooltipValue = "";

			// MIMpression
			$this->MIMpression->LinkCustomAttributes = "";
			$this->MIMpression->HrefValue = "";
			$this->MIMpression->TooltipValue = "";

			// PPlanOfManagement
			$this->PPlanOfManagement->LinkCustomAttributes = "";
			$this->PPlanOfManagement->HrefValue = "";
			$this->PPlanOfManagement->TooltipValue = "";

			// MPlanOfManagement
			$this->MPlanOfManagement->LinkCustomAttributes = "";
			$this->MPlanOfManagement->HrefValue = "";
			$this->MPlanOfManagement->TooltipValue = "";

			// PReadMore
			$this->PReadMore->LinkCustomAttributes = "";
			$this->PReadMore->HrefValue = "";
			$this->PReadMore->TooltipValue = "";

			// MReadMore
			$this->MReadMore->LinkCustomAttributes = "";
			$this->MReadMore->HrefValue = "";
			$this->MReadMore->TooltipValue = "";

			// MariedFor
			$this->MariedFor->LinkCustomAttributes = "";
			$this->MariedFor->HrefValue = "";
			$this->MariedFor->TooltipValue = "";

			// CMNCM
			$this->CMNCM->LinkCustomAttributes = "";
			$this->CMNCM->HrefValue = "";
			$this->CMNCM->TooltipValue = "";

			// TemplateMenstrualHistory
			$this->TemplateMenstrualHistory->LinkCustomAttributes = "";
			$this->TemplateMenstrualHistory->HrefValue = "";
			$this->TemplateMenstrualHistory->TooltipValue = "";

			// TemplateObstetricHistory
			$this->TemplateObstetricHistory->LinkCustomAttributes = "";
			$this->TemplateObstetricHistory->HrefValue = "";
			$this->TemplateObstetricHistory->TooltipValue = "";

			// TemplateFertilityTreatmentHistory
			$this->TemplateFertilityTreatmentHistory->LinkCustomAttributes = "";
			$this->TemplateFertilityTreatmentHistory->HrefValue = "";
			$this->TemplateFertilityTreatmentHistory->TooltipValue = "";

			// TemplateSurgeryHistory
			$this->TemplateSurgeryHistory->LinkCustomAttributes = "";
			$this->TemplateSurgeryHistory->HrefValue = "";
			$this->TemplateSurgeryHistory->TooltipValue = "";

			// TemplateFInvestigations
			$this->TemplateFInvestigations->LinkCustomAttributes = "";
			$this->TemplateFInvestigations->HrefValue = "";
			$this->TemplateFInvestigations->TooltipValue = "";

			// TemplatePlanOfManagement
			$this->TemplatePlanOfManagement->LinkCustomAttributes = "";
			$this->TemplatePlanOfManagement->HrefValue = "";
			$this->TemplatePlanOfManagement->TooltipValue = "";

			// TemplatePImpression
			$this->TemplatePImpression->LinkCustomAttributes = "";
			$this->TemplatePImpression->HrefValue = "";
			$this->TemplatePImpression->TooltipValue = "";

			// TemplateMedications
			$this->TemplateMedications->LinkCustomAttributes = "";
			$this->TemplateMedications->HrefValue = "";
			$this->TemplateMedications->TooltipValue = "";

			// TemplateSemenAnalysis
			$this->TemplateSemenAnalysis->LinkCustomAttributes = "";
			$this->TemplateSemenAnalysis->HrefValue = "";
			$this->TemplateSemenAnalysis->TooltipValue = "";

			// MaleInsvestications
			$this->MaleInsvestications->LinkCustomAttributes = "";
			$this->MaleInsvestications->HrefValue = "";
			$this->MaleInsvestications->TooltipValue = "";

			// TemplateMIMpression
			$this->TemplateMIMpression->LinkCustomAttributes = "";
			$this->TemplateMIMpression->HrefValue = "";
			$this->TemplateMIMpression->TooltipValue = "";

			// TemplateMalePlanOfManagement
			$this->TemplateMalePlanOfManagement->LinkCustomAttributes = "";
			$this->TemplateMalePlanOfManagement->HrefValue = "";
			$this->TemplateMalePlanOfManagement->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// pFamilyHistory
			$this->pFamilyHistory->LinkCustomAttributes = "";
			$this->pFamilyHistory->HrefValue = "";
			$this->pFamilyHistory->TooltipValue = "";

			// pTemplateMedications
			$this->pTemplateMedications->LinkCustomAttributes = "";
			$this->pTemplateMedications->HrefValue = "";
			$this->pTemplateMedications->TooltipValue = "";

			// AntiTPO
			$this->AntiTPO->LinkCustomAttributes = "";
			$this->AntiTPO->HrefValue = "";
			$this->AntiTPO->TooltipValue = "";

			// AntiTG
			$this->AntiTG->LinkCustomAttributes = "";
			$this->AntiTG->HrefValue = "";
			$this->AntiTG->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// SEX
			$this->SEX->EditAttrs["class"] = "form-control";
			$this->SEX->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
			$this->SEX->EditValue = HtmlEncode($this->SEX->CurrentValue);
			$this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

			// Religion
			$this->Religion->EditAttrs["class"] = "form-control";
			$this->Religion->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
			$this->Religion->EditValue = HtmlEncode($this->Religion->CurrentValue);
			$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

			// Address
			$this->Address->EditAttrs["class"] = "form-control";
			$this->Address->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
			$this->Address->EditValue = HtmlEncode($this->Address->CurrentValue);
			$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// DoublewitnessName1
			$this->DoublewitnessName1->EditAttrs["class"] = "form-control";
			$this->DoublewitnessName1->EditCustomAttributes = "";
			$this->DoublewitnessName1->EditValue = HtmlEncode($this->DoublewitnessName1->CurrentValue);
			$this->DoublewitnessName1->PlaceHolder = RemoveHtml($this->DoublewitnessName1->caption());

			// DoublewitnessName2
			$this->DoublewitnessName2->EditAttrs["class"] = "form-control";
			$this->DoublewitnessName2->EditCustomAttributes = "";
			$this->DoublewitnessName2->EditValue = HtmlEncode($this->DoublewitnessName2->CurrentValue);
			$this->DoublewitnessName2->PlaceHolder = RemoveHtml($this->DoublewitnessName2->caption());

			// Chiefcomplaints
			$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
			$this->Chiefcomplaints->EditCustomAttributes = "";
			$this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			$this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

			// ObstetricHistory
			$this->ObstetricHistory->EditAttrs["class"] = "form-control";
			$this->ObstetricHistory->EditCustomAttributes = "";
			$this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->CurrentValue);
			$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

			// MedicalHistory
			$this->MedicalHistory->EditCustomAttributes = "";
			$this->MedicalHistory->EditValue = $this->MedicalHistory->options(FALSE);

			// SurgicalHistory
			$this->SurgicalHistory->EditAttrs["class"] = "form-control";
			$this->SurgicalHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

			// Generalexaminationpallor
			$this->Generalexaminationpallor->EditAttrs["class"] = "form-control";
			$this->Generalexaminationpallor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Generalexaminationpallor->CurrentValue = HtmlDecode($this->Generalexaminationpallor->CurrentValue);
			$this->Generalexaminationpallor->EditValue = HtmlEncode($this->Generalexaminationpallor->CurrentValue);
			$this->Generalexaminationpallor->PlaceHolder = RemoveHtml($this->Generalexaminationpallor->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
			$this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
			$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

			// Investigations
			$this->Investigations->EditAttrs["class"] = "form-control";
			$this->Investigations->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Investigations->CurrentValue = HtmlDecode($this->Investigations->CurrentValue);
			$this->Investigations->EditValue = HtmlEncode($this->Investigations->CurrentValue);
			$this->Investigations->PlaceHolder = RemoveHtml($this->Investigations->caption());

			// Fheight
			$this->Fheight->EditAttrs["class"] = "form-control";
			$this->Fheight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fheight->CurrentValue = HtmlDecode($this->Fheight->CurrentValue);
			$this->Fheight->EditValue = HtmlEncode($this->Fheight->CurrentValue);
			$this->Fheight->PlaceHolder = RemoveHtml($this->Fheight->caption());

			// Fweight
			$this->Fweight->EditAttrs["class"] = "form-control";
			$this->Fweight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
			$this->Fweight->EditValue = HtmlEncode($this->Fweight->CurrentValue);
			$this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

			// FBMI
			$this->FBMI->EditAttrs["class"] = "form-control";
			$this->FBMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
			$this->FBMI->EditValue = HtmlEncode($this->FBMI->CurrentValue);
			$this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

			// FBloodgroup
			$this->FBloodgroup->EditAttrs["class"] = "form-control";
			$this->FBloodgroup->EditCustomAttributes = "";
			$curVal = trim(strval($this->FBloodgroup->CurrentValue));
			if ($curVal <> "")
				$this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
			else
				$this->FBloodgroup->ViewValue = $this->FBloodgroup->Lookup !== NULL && is_array($this->FBloodgroup->Lookup->Options) ? $curVal : NULL;
			if ($this->FBloodgroup->ViewValue !== NULL) { // Load from cache
				$this->FBloodgroup->EditValue = array_values($this->FBloodgroup->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->FBloodgroup->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->FBloodgroup->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->FBloodgroup->EditValue = $arwrk;
			}

			// Mheight
			$this->Mheight->EditAttrs["class"] = "form-control";
			$this->Mheight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mheight->CurrentValue = HtmlDecode($this->Mheight->CurrentValue);
			$this->Mheight->EditValue = HtmlEncode($this->Mheight->CurrentValue);
			$this->Mheight->PlaceHolder = RemoveHtml($this->Mheight->caption());

			// Mweight
			$this->Mweight->EditAttrs["class"] = "form-control";
			$this->Mweight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mweight->CurrentValue = HtmlDecode($this->Mweight->CurrentValue);
			$this->Mweight->EditValue = HtmlEncode($this->Mweight->CurrentValue);
			$this->Mweight->PlaceHolder = RemoveHtml($this->Mweight->caption());

			// MBMI
			$this->MBMI->EditAttrs["class"] = "form-control";
			$this->MBMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
			$this->MBMI->EditValue = HtmlEncode($this->MBMI->CurrentValue);
			$this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

			// MBloodgroup
			$this->MBloodgroup->EditAttrs["class"] = "form-control";
			$this->MBloodgroup->EditCustomAttributes = "";
			$curVal = trim(strval($this->MBloodgroup->CurrentValue));
			if ($curVal <> "")
				$this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
			else
				$this->MBloodgroup->ViewValue = $this->MBloodgroup->Lookup !== NULL && is_array($this->MBloodgroup->Lookup->Options) ? $curVal : NULL;
			if ($this->MBloodgroup->ViewValue !== NULL) { // Load from cache
				$this->MBloodgroup->EditValue = array_values($this->MBloodgroup->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->MBloodgroup->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MBloodgroup->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MBloodgroup->EditValue = $arwrk;
			}

			// FBuild
			$this->FBuild->EditCustomAttributes = "";
			$this->FBuild->EditValue = $this->FBuild->options(FALSE);

			// MBuild
			$this->MBuild->EditCustomAttributes = "";
			$this->MBuild->EditValue = $this->MBuild->options(FALSE);

			// FSkinColor
			$this->FSkinColor->EditCustomAttributes = "";
			$this->FSkinColor->EditValue = $this->FSkinColor->options(FALSE);

			// MSkinColor
			$this->MSkinColor->EditCustomAttributes = "";
			$this->MSkinColor->EditValue = $this->MSkinColor->options(FALSE);

			// FEyesColor
			$this->FEyesColor->EditCustomAttributes = "";
			$this->FEyesColor->EditValue = $this->FEyesColor->options(FALSE);

			// MEyesColor
			$this->MEyesColor->EditCustomAttributes = "";
			$this->MEyesColor->EditValue = $this->MEyesColor->options(FALSE);

			// FHairColor
			$this->FHairColor->EditCustomAttributes = "";
			$this->FHairColor->EditValue = $this->FHairColor->options(FALSE);

			// MhairColor
			$this->MhairColor->EditCustomAttributes = "";
			$this->MhairColor->EditValue = $this->MhairColor->options(FALSE);

			// FhairTexture
			$this->FhairTexture->EditCustomAttributes = "";
			$this->FhairTexture->EditValue = $this->FhairTexture->options(FALSE);

			// MHairTexture
			$this->MHairTexture->EditCustomAttributes = "";
			$this->MHairTexture->EditValue = $this->MHairTexture->options(FALSE);

			// Fothers
			$this->Fothers->EditAttrs["class"] = "form-control";
			$this->Fothers->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fothers->CurrentValue = HtmlDecode($this->Fothers->CurrentValue);
			$this->Fothers->EditValue = HtmlEncode($this->Fothers->CurrentValue);
			$this->Fothers->PlaceHolder = RemoveHtml($this->Fothers->caption());

			// Mothers
			$this->Mothers->EditAttrs["class"] = "form-control";
			$this->Mothers->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mothers->CurrentValue = HtmlDecode($this->Mothers->CurrentValue);
			$this->Mothers->EditValue = HtmlEncode($this->Mothers->CurrentValue);
			$this->Mothers->PlaceHolder = RemoveHtml($this->Mothers->caption());

			// PGE
			$this->PGE->EditAttrs["class"] = "form-control";
			$this->PGE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PGE->CurrentValue = HtmlDecode($this->PGE->CurrentValue);
			$this->PGE->EditValue = HtmlEncode($this->PGE->CurrentValue);
			$this->PGE->PlaceHolder = RemoveHtml($this->PGE->caption());

			// PPR
			$this->PPR->EditAttrs["class"] = "form-control";
			$this->PPR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PPR->CurrentValue = HtmlDecode($this->PPR->CurrentValue);
			$this->PPR->EditValue = HtmlEncode($this->PPR->CurrentValue);
			$this->PPR->PlaceHolder = RemoveHtml($this->PPR->caption());

			// PBP
			$this->PBP->EditAttrs["class"] = "form-control";
			$this->PBP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PBP->CurrentValue = HtmlDecode($this->PBP->CurrentValue);
			$this->PBP->EditValue = HtmlEncode($this->PBP->CurrentValue);
			$this->PBP->PlaceHolder = RemoveHtml($this->PBP->caption());

			// Breast
			$this->Breast->EditAttrs["class"] = "form-control";
			$this->Breast->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Breast->CurrentValue = HtmlDecode($this->Breast->CurrentValue);
			$this->Breast->EditValue = HtmlEncode($this->Breast->CurrentValue);
			$this->Breast->PlaceHolder = RemoveHtml($this->Breast->caption());

			// PPA
			$this->PPA->EditAttrs["class"] = "form-control";
			$this->PPA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PPA->CurrentValue = HtmlDecode($this->PPA->CurrentValue);
			$this->PPA->EditValue = HtmlEncode($this->PPA->CurrentValue);
			$this->PPA->PlaceHolder = RemoveHtml($this->PPA->caption());

			// PPSV
			$this->PPSV->EditAttrs["class"] = "form-control";
			$this->PPSV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PPSV->CurrentValue = HtmlDecode($this->PPSV->CurrentValue);
			$this->PPSV->EditValue = HtmlEncode($this->PPSV->CurrentValue);
			$this->PPSV->PlaceHolder = RemoveHtml($this->PPSV->caption());

			// PPAPSMEAR
			$this->PPAPSMEAR->EditAttrs["class"] = "form-control";
			$this->PPAPSMEAR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PPAPSMEAR->CurrentValue = HtmlDecode($this->PPAPSMEAR->CurrentValue);
			$this->PPAPSMEAR->EditValue = HtmlEncode($this->PPAPSMEAR->CurrentValue);
			$this->PPAPSMEAR->PlaceHolder = RemoveHtml($this->PPAPSMEAR->caption());

			// PTHYROID
			$this->PTHYROID->EditAttrs["class"] = "form-control";
			$this->PTHYROID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PTHYROID->CurrentValue = HtmlDecode($this->PTHYROID->CurrentValue);
			$this->PTHYROID->EditValue = HtmlEncode($this->PTHYROID->CurrentValue);
			$this->PTHYROID->PlaceHolder = RemoveHtml($this->PTHYROID->caption());

			// MTHYROID
			$this->MTHYROID->EditAttrs["class"] = "form-control";
			$this->MTHYROID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MTHYROID->CurrentValue = HtmlDecode($this->MTHYROID->CurrentValue);
			$this->MTHYROID->EditValue = HtmlEncode($this->MTHYROID->CurrentValue);
			$this->MTHYROID->PlaceHolder = RemoveHtml($this->MTHYROID->caption());

			// SecSexCharacters
			$this->SecSexCharacters->EditAttrs["class"] = "form-control";
			$this->SecSexCharacters->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SecSexCharacters->CurrentValue = HtmlDecode($this->SecSexCharacters->CurrentValue);
			$this->SecSexCharacters->EditValue = HtmlEncode($this->SecSexCharacters->CurrentValue);
			$this->SecSexCharacters->PlaceHolder = RemoveHtml($this->SecSexCharacters->caption());

			// PenisUM
			$this->PenisUM->EditAttrs["class"] = "form-control";
			$this->PenisUM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PenisUM->CurrentValue = HtmlDecode($this->PenisUM->CurrentValue);
			$this->PenisUM->EditValue = HtmlEncode($this->PenisUM->CurrentValue);
			$this->PenisUM->PlaceHolder = RemoveHtml($this->PenisUM->caption());

			// VAS
			$this->VAS->EditAttrs["class"] = "form-control";
			$this->VAS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VAS->CurrentValue = HtmlDecode($this->VAS->CurrentValue);
			$this->VAS->EditValue = HtmlEncode($this->VAS->CurrentValue);
			$this->VAS->PlaceHolder = RemoveHtml($this->VAS->caption());

			// EPIDIDYMIS
			$this->EPIDIDYMIS->EditAttrs["class"] = "form-control";
			$this->EPIDIDYMIS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EPIDIDYMIS->CurrentValue = HtmlDecode($this->EPIDIDYMIS->CurrentValue);
			$this->EPIDIDYMIS->EditValue = HtmlEncode($this->EPIDIDYMIS->CurrentValue);
			$this->EPIDIDYMIS->PlaceHolder = RemoveHtml($this->EPIDIDYMIS->caption());

			// Varicocele
			$this->Varicocele->EditAttrs["class"] = "form-control";
			$this->Varicocele->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Varicocele->CurrentValue = HtmlDecode($this->Varicocele->CurrentValue);
			$this->Varicocele->EditValue = HtmlEncode($this->Varicocele->CurrentValue);
			$this->Varicocele->PlaceHolder = RemoveHtml($this->Varicocele->caption());

			// FertilityTreatmentHistory
			$this->FertilityTreatmentHistory->EditAttrs["class"] = "form-control";
			$this->FertilityTreatmentHistory->EditCustomAttributes = "";
			$this->FertilityTreatmentHistory->EditValue = HtmlEncode($this->FertilityTreatmentHistory->CurrentValue);
			$this->FertilityTreatmentHistory->PlaceHolder = RemoveHtml($this->FertilityTreatmentHistory->caption());

			// SurgeryHistory
			$this->SurgeryHistory->EditAttrs["class"] = "form-control";
			$this->SurgeryHistory->EditCustomAttributes = "";
			$this->SurgeryHistory->EditValue = HtmlEncode($this->SurgeryHistory->CurrentValue);
			$this->SurgeryHistory->PlaceHolder = RemoveHtml($this->SurgeryHistory->caption());

			// FamilyHistory
			$this->FamilyHistory->EditAttrs["class"] = "form-control";
			$this->FamilyHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
			$curVal = strval($this->FamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->FamilyHistory->EditValue = $this->FamilyHistory->lookupCacheOption($curVal);
				if ($this->FamilyHistory->EditValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->FamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->FamilyHistory->EditValue = $this->FamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
					}
				}
			} else {
				$this->FamilyHistory->EditValue = NULL;
			}
			$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

			// PInvestigations
			$this->PInvestigations->EditAttrs["class"] = "form-control";
			$this->PInvestigations->EditCustomAttributes = "";
			$this->PInvestigations->EditValue = HtmlEncode($this->PInvestigations->CurrentValue);
			$this->PInvestigations->PlaceHolder = RemoveHtml($this->PInvestigations->caption());

			// Addictions
			$this->Addictions->EditCustomAttributes = "";
			$this->Addictions->EditValue = $this->Addictions->options(FALSE);

			// Medications
			$this->Medications->EditAttrs["class"] = "form-control";
			$this->Medications->EditCustomAttributes = "";
			$this->Medications->EditValue = HtmlEncode($this->Medications->CurrentValue);
			$this->Medications->PlaceHolder = RemoveHtml($this->Medications->caption());

			// Medical
			$this->Medical->EditAttrs["class"] = "form-control";
			$this->Medical->EditCustomAttributes = "";
			$this->Medical->EditValue = $this->Medical->options(TRUE);

			// Surgical
			$this->Surgical->EditAttrs["class"] = "form-control";
			$this->Surgical->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Surgical->CurrentValue = HtmlDecode($this->Surgical->CurrentValue);
			$this->Surgical->EditValue = HtmlEncode($this->Surgical->CurrentValue);
			$this->Surgical->PlaceHolder = RemoveHtml($this->Surgical->caption());

			// CoitalHistory
			$this->CoitalHistory->EditAttrs["class"] = "form-control";
			$this->CoitalHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CoitalHistory->CurrentValue = HtmlDecode($this->CoitalHistory->CurrentValue);
			$this->CoitalHistory->EditValue = HtmlEncode($this->CoitalHistory->CurrentValue);
			$curVal = strval($this->CoitalHistory->CurrentValue);
			if ($curVal <> "") {
				$this->CoitalHistory->EditValue = $this->CoitalHistory->lookupCacheOption($curVal);
				if ($this->CoitalHistory->EditValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='CoitalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->CoitalHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->CoitalHistory->EditValue = $this->CoitalHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CoitalHistory->EditValue = HtmlEncode($this->CoitalHistory->CurrentValue);
					}
				}
			} else {
				$this->CoitalHistory->EditValue = NULL;
			}
			$this->CoitalHistory->PlaceHolder = RemoveHtml($this->CoitalHistory->caption());

			// SemenAnalysis
			$this->SemenAnalysis->EditAttrs["class"] = "form-control";
			$this->SemenAnalysis->EditCustomAttributes = "";
			$this->SemenAnalysis->EditValue = HtmlEncode($this->SemenAnalysis->CurrentValue);
			$this->SemenAnalysis->PlaceHolder = RemoveHtml($this->SemenAnalysis->caption());

			// MInsvestications
			$this->MInsvestications->EditAttrs["class"] = "form-control";
			$this->MInsvestications->EditCustomAttributes = "";
			$this->MInsvestications->EditValue = HtmlEncode($this->MInsvestications->CurrentValue);
			$this->MInsvestications->PlaceHolder = RemoveHtml($this->MInsvestications->caption());

			// PImpression
			$this->PImpression->EditAttrs["class"] = "form-control";
			$this->PImpression->EditCustomAttributes = "";
			$this->PImpression->EditValue = HtmlEncode($this->PImpression->CurrentValue);
			$this->PImpression->PlaceHolder = RemoveHtml($this->PImpression->caption());

			// MIMpression
			$this->MIMpression->EditAttrs["class"] = "form-control";
			$this->MIMpression->EditCustomAttributes = "";
			$this->MIMpression->EditValue = HtmlEncode($this->MIMpression->CurrentValue);
			$this->MIMpression->PlaceHolder = RemoveHtml($this->MIMpression->caption());

			// PPlanOfManagement
			$this->PPlanOfManagement->EditAttrs["class"] = "form-control";
			$this->PPlanOfManagement->EditCustomAttributes = "";
			$this->PPlanOfManagement->EditValue = HtmlEncode($this->PPlanOfManagement->CurrentValue);
			$this->PPlanOfManagement->PlaceHolder = RemoveHtml($this->PPlanOfManagement->caption());

			// MPlanOfManagement
			$this->MPlanOfManagement->EditAttrs["class"] = "form-control";
			$this->MPlanOfManagement->EditCustomAttributes = "";
			$this->MPlanOfManagement->EditValue = HtmlEncode($this->MPlanOfManagement->CurrentValue);
			$this->MPlanOfManagement->PlaceHolder = RemoveHtml($this->MPlanOfManagement->caption());

			// PReadMore
			$this->PReadMore->EditAttrs["class"] = "form-control";
			$this->PReadMore->EditCustomAttributes = "";
			$this->PReadMore->EditValue = HtmlEncode($this->PReadMore->CurrentValue);
			$this->PReadMore->PlaceHolder = RemoveHtml($this->PReadMore->caption());

			// MReadMore
			$this->MReadMore->EditAttrs["class"] = "form-control";
			$this->MReadMore->EditCustomAttributes = "";
			$this->MReadMore->EditValue = HtmlEncode($this->MReadMore->CurrentValue);
			$this->MReadMore->PlaceHolder = RemoveHtml($this->MReadMore->caption());

			// MariedFor
			$this->MariedFor->EditAttrs["class"] = "form-control";
			$this->MariedFor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MariedFor->CurrentValue = HtmlDecode($this->MariedFor->CurrentValue);
			$this->MariedFor->EditValue = HtmlEncode($this->MariedFor->CurrentValue);
			$this->MariedFor->PlaceHolder = RemoveHtml($this->MariedFor->caption());

			// CMNCM
			$this->CMNCM->EditAttrs["class"] = "form-control";
			$this->CMNCM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CMNCM->CurrentValue = HtmlDecode($this->CMNCM->CurrentValue);
			$this->CMNCM->EditValue = HtmlEncode($this->CMNCM->CurrentValue);
			$this->CMNCM->PlaceHolder = RemoveHtml($this->CMNCM->caption());

			// TemplateMenstrualHistory
			$this->TemplateMenstrualHistory->EditAttrs["class"] = "form-control";
			$this->TemplateMenstrualHistory->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateMenstrualHistory->CurrentValue));
			if ($curVal <> "")
				$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->lookupCacheOption($curVal);
			else
				$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->Lookup !== NULL && is_array($this->TemplateMenstrualHistory->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateMenstrualHistory->ViewValue !== NULL) { // Load from cache
				$this->TemplateMenstrualHistory->EditValue = array_values($this->TemplateMenstrualHistory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMenstrualHistory->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Menstrual History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMenstrualHistory->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateMenstrualHistory->EditValue = $arwrk;
			}

			// TemplateObstetricHistory
			$this->TemplateObstetricHistory->EditAttrs["class"] = "form-control";
			$this->TemplateObstetricHistory->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateObstetricHistory->CurrentValue));
			if ($curVal <> "")
				$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->lookupCacheOption($curVal);
			else
				$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->Lookup !== NULL && is_array($this->TemplateObstetricHistory->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateObstetricHistory->ViewValue !== NULL) { // Load from cache
				$this->TemplateObstetricHistory->EditValue = array_values($this->TemplateObstetricHistory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateObstetricHistory->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Obstetric History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateObstetricHistory->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateObstetricHistory->EditValue = $arwrk;
			}

			// TemplateFertilityTreatmentHistory
			$this->TemplateFertilityTreatmentHistory->EditAttrs["class"] = "form-control";
			$this->TemplateFertilityTreatmentHistory->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateFertilityTreatmentHistory->CurrentValue));
			if ($curVal <> "")
				$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->lookupCacheOption($curVal);
			else
				$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->Lookup !== NULL && is_array($this->TemplateFertilityTreatmentHistory->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateFertilityTreatmentHistory->ViewValue !== NULL) { // Load from cache
				$this->TemplateFertilityTreatmentHistory->EditValue = array_values($this->TemplateFertilityTreatmentHistory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFertilityTreatmentHistory->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Fertility Treatment History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFertilityTreatmentHistory->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateFertilityTreatmentHistory->EditValue = $arwrk;
			}

			// TemplateSurgeryHistory
			$this->TemplateSurgeryHistory->EditAttrs["class"] = "form-control";
			$this->TemplateSurgeryHistory->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateSurgeryHistory->CurrentValue));
			if ($curVal <> "")
				$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->lookupCacheOption($curVal);
			else
				$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->Lookup !== NULL && is_array($this->TemplateSurgeryHistory->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateSurgeryHistory->ViewValue !== NULL) { // Load from cache
				$this->TemplateSurgeryHistory->EditValue = array_values($this->TemplateSurgeryHistory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateSurgeryHistory->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Surgery History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateSurgeryHistory->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateSurgeryHistory->EditValue = $arwrk;
			}

			// TemplateFInvestigations
			$this->TemplateFInvestigations->EditAttrs["class"] = "form-control";
			$this->TemplateFInvestigations->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateFInvestigations->CurrentValue));
			if ($curVal <> "")
				$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->lookupCacheOption($curVal);
			else
				$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->Lookup !== NULL && is_array($this->TemplateFInvestigations->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateFInvestigations->ViewValue !== NULL) { // Load from cache
				$this->TemplateFInvestigations->EditValue = array_values($this->TemplateFInvestigations->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFInvestigations->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Female Investigations'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFInvestigations->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateFInvestigations->EditValue = $arwrk;
			}

			// TemplatePlanOfManagement
			$this->TemplatePlanOfManagement->EditAttrs["class"] = "form-control";
			$this->TemplatePlanOfManagement->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplatePlanOfManagement->CurrentValue));
			if ($curVal <> "")
				$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->lookupCacheOption($curVal);
			else
				$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->Lookup !== NULL && is_array($this->TemplatePlanOfManagement->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplatePlanOfManagement->ViewValue !== NULL) { // Load from cache
				$this->TemplatePlanOfManagement->EditValue = array_values($this->TemplatePlanOfManagement->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateType`" . SearchString("=", $this->TemplatePlanOfManagement->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Female Plan Of Management'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePlanOfManagement->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplatePlanOfManagement->EditValue = $arwrk;
			}

			// TemplatePImpression
			$this->TemplatePImpression->EditAttrs["class"] = "form-control";
			$this->TemplatePImpression->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplatePImpression->CurrentValue));
			if ($curVal <> "")
				$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->lookupCacheOption($curVal);
			else
				$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->Lookup !== NULL && is_array($this->TemplatePImpression->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplatePImpression->ViewValue !== NULL) { // Load from cache
				$this->TemplatePImpression->EditValue = array_values($this->TemplatePImpression->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplatePImpression->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Female Impression'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePImpression->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplatePImpression->EditValue = $arwrk;
			}

			// TemplateMedications
			$this->TemplateMedications->EditAttrs["class"] = "form-control";
			$this->TemplateMedications->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateMedications->CurrentValue));
			if ($curVal <> "")
				$this->TemplateMedications->ViewValue = $this->TemplateMedications->lookupCacheOption($curVal);
			else
				$this->TemplateMedications->ViewValue = $this->TemplateMedications->Lookup !== NULL && is_array($this->TemplateMedications->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateMedications->ViewValue !== NULL) { // Load from cache
				$this->TemplateMedications->EditValue = array_values($this->TemplateMedications->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMedications->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Medications'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMedications->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateMedications->EditValue = $arwrk;
			}

			// TemplateSemenAnalysis
			$this->TemplateSemenAnalysis->EditAttrs["class"] = "form-control";
			$this->TemplateSemenAnalysis->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateSemenAnalysis->CurrentValue));
			if ($curVal <> "")
				$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->lookupCacheOption($curVal);
			else
				$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->Lookup !== NULL && is_array($this->TemplateSemenAnalysis->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateSemenAnalysis->ViewValue !== NULL) { // Load from cache
				$this->TemplateSemenAnalysis->EditValue = array_values($this->TemplateSemenAnalysis->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateSemenAnalysis->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Semen Analysis'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateSemenAnalysis->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateSemenAnalysis->EditValue = $arwrk;
			}

			// MaleInsvestications
			$this->MaleInsvestications->EditAttrs["class"] = "form-control";
			$this->MaleInsvestications->EditCustomAttributes = "";
			$curVal = trim(strval($this->MaleInsvestications->CurrentValue));
			if ($curVal <> "")
				$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->lookupCacheOption($curVal);
			else
				$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->Lookup !== NULL && is_array($this->MaleInsvestications->Lookup->Options) ? $curVal : NULL;
			if ($this->MaleInsvestications->ViewValue !== NULL) { // Load from cache
				$this->MaleInsvestications->EditValue = array_values($this->MaleInsvestications->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->MaleInsvestications->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Male Insvestications'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->MaleInsvestications->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MaleInsvestications->EditValue = $arwrk;
			}

			// TemplateMIMpression
			$this->TemplateMIMpression->EditAttrs["class"] = "form-control";
			$this->TemplateMIMpression->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateMIMpression->CurrentValue));
			if ($curVal <> "")
				$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->lookupCacheOption($curVal);
			else
				$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->Lookup !== NULL && is_array($this->TemplateMIMpression->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateMIMpression->ViewValue !== NULL) { // Load from cache
				$this->TemplateMIMpression->EditValue = array_values($this->TemplateMIMpression->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMIMpression->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Male Impression'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMIMpression->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateMIMpression->EditValue = $arwrk;
			}

			// TemplateMalePlanOfManagement
			$this->TemplateMalePlanOfManagement->EditAttrs["class"] = "form-control";
			$this->TemplateMalePlanOfManagement->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateMalePlanOfManagement->CurrentValue));
			if ($curVal <> "")
				$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->lookupCacheOption($curVal);
			else
				$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->Lookup !== NULL && is_array($this->TemplateMalePlanOfManagement->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateMalePlanOfManagement->ViewValue !== NULL) { // Load from cache
				$this->TemplateMalePlanOfManagement->EditValue = array_values($this->TemplateMalePlanOfManagement->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMalePlanOfManagement->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Male Plan Of Management'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMalePlanOfManagement->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateMalePlanOfManagement->EditValue = $arwrk;
			}

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// pFamilyHistory
			$this->pFamilyHistory->EditAttrs["class"] = "form-control";
			$this->pFamilyHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pFamilyHistory->CurrentValue = HtmlDecode($this->pFamilyHistory->CurrentValue);
			$this->pFamilyHistory->EditValue = HtmlEncode($this->pFamilyHistory->CurrentValue);
			$curVal = strval($this->pFamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->pFamilyHistory->EditValue = $this->pFamilyHistory->lookupCacheOption($curVal);
				if ($this->pFamilyHistory->EditValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->pFamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->pFamilyHistory->EditValue = $this->pFamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pFamilyHistory->EditValue = HtmlEncode($this->pFamilyHistory->CurrentValue);
					}
				}
			} else {
				$this->pFamilyHistory->EditValue = NULL;
			}
			$this->pFamilyHistory->PlaceHolder = RemoveHtml($this->pFamilyHistory->caption());

			// pTemplateMedications
			$this->pTemplateMedications->EditAttrs["class"] = "form-control";
			$this->pTemplateMedications->EditCustomAttributes = "";
			$this->pTemplateMedications->EditValue = HtmlEncode($this->pTemplateMedications->CurrentValue);
			$this->pTemplateMedications->PlaceHolder = RemoveHtml($this->pTemplateMedications->caption());

			// AntiTPO
			$this->AntiTPO->EditAttrs["class"] = "form-control";
			$this->AntiTPO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AntiTPO->CurrentValue = HtmlDecode($this->AntiTPO->CurrentValue);
			$this->AntiTPO->EditValue = HtmlEncode($this->AntiTPO->CurrentValue);
			$this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

			// AntiTG
			$this->AntiTG->EditAttrs["class"] = "form-control";
			$this->AntiTG->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AntiTG->CurrentValue = HtmlDecode($this->AntiTG->CurrentValue);
			$this->AntiTG->EditValue = HtmlEncode($this->AntiTG->CurrentValue);
			$this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

			// Add refer script
			// RIDNO

			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// SEX
			$this->SEX->LinkCustomAttributes = "";
			$this->SEX->HrefValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// DoublewitnessName1
			$this->DoublewitnessName1->LinkCustomAttributes = "";
			$this->DoublewitnessName1->HrefValue = "";

			// DoublewitnessName2
			$this->DoublewitnessName2->LinkCustomAttributes = "";
			$this->DoublewitnessName2->HrefValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";

			// MedicalHistory
			$this->MedicalHistory->LinkCustomAttributes = "";
			$this->MedicalHistory->HrefValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";

			// Generalexaminationpallor
			$this->Generalexaminationpallor->LinkCustomAttributes = "";
			$this->Generalexaminationpallor->HrefValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";

			// Investigations
			$this->Investigations->LinkCustomAttributes = "";
			$this->Investigations->HrefValue = "";

			// Fheight
			$this->Fheight->LinkCustomAttributes = "";
			$this->Fheight->HrefValue = "";

			// Fweight
			$this->Fweight->LinkCustomAttributes = "";
			$this->Fweight->HrefValue = "";

			// FBMI
			$this->FBMI->LinkCustomAttributes = "";
			$this->FBMI->HrefValue = "";

			// FBloodgroup
			$this->FBloodgroup->LinkCustomAttributes = "";
			$this->FBloodgroup->HrefValue = "";

			// Mheight
			$this->Mheight->LinkCustomAttributes = "";
			$this->Mheight->HrefValue = "";

			// Mweight
			$this->Mweight->LinkCustomAttributes = "";
			$this->Mweight->HrefValue = "";

			// MBMI
			$this->MBMI->LinkCustomAttributes = "";
			$this->MBMI->HrefValue = "";

			// MBloodgroup
			$this->MBloodgroup->LinkCustomAttributes = "";
			$this->MBloodgroup->HrefValue = "";

			// FBuild
			$this->FBuild->LinkCustomAttributes = "";
			$this->FBuild->HrefValue = "";

			// MBuild
			$this->MBuild->LinkCustomAttributes = "";
			$this->MBuild->HrefValue = "";

			// FSkinColor
			$this->FSkinColor->LinkCustomAttributes = "";
			$this->FSkinColor->HrefValue = "";

			// MSkinColor
			$this->MSkinColor->LinkCustomAttributes = "";
			$this->MSkinColor->HrefValue = "";

			// FEyesColor
			$this->FEyesColor->LinkCustomAttributes = "";
			$this->FEyesColor->HrefValue = "";

			// MEyesColor
			$this->MEyesColor->LinkCustomAttributes = "";
			$this->MEyesColor->HrefValue = "";

			// FHairColor
			$this->FHairColor->LinkCustomAttributes = "";
			$this->FHairColor->HrefValue = "";

			// MhairColor
			$this->MhairColor->LinkCustomAttributes = "";
			$this->MhairColor->HrefValue = "";

			// FhairTexture
			$this->FhairTexture->LinkCustomAttributes = "";
			$this->FhairTexture->HrefValue = "";

			// MHairTexture
			$this->MHairTexture->LinkCustomAttributes = "";
			$this->MHairTexture->HrefValue = "";

			// Fothers
			$this->Fothers->LinkCustomAttributes = "";
			$this->Fothers->HrefValue = "";

			// Mothers
			$this->Mothers->LinkCustomAttributes = "";
			$this->Mothers->HrefValue = "";

			// PGE
			$this->PGE->LinkCustomAttributes = "";
			$this->PGE->HrefValue = "";

			// PPR
			$this->PPR->LinkCustomAttributes = "";
			$this->PPR->HrefValue = "";

			// PBP
			$this->PBP->LinkCustomAttributes = "";
			$this->PBP->HrefValue = "";

			// Breast
			$this->Breast->LinkCustomAttributes = "";
			$this->Breast->HrefValue = "";

			// PPA
			$this->PPA->LinkCustomAttributes = "";
			$this->PPA->HrefValue = "";

			// PPSV
			$this->PPSV->LinkCustomAttributes = "";
			$this->PPSV->HrefValue = "";

			// PPAPSMEAR
			$this->PPAPSMEAR->LinkCustomAttributes = "";
			$this->PPAPSMEAR->HrefValue = "";

			// PTHYROID
			$this->PTHYROID->LinkCustomAttributes = "";
			$this->PTHYROID->HrefValue = "";

			// MTHYROID
			$this->MTHYROID->LinkCustomAttributes = "";
			$this->MTHYROID->HrefValue = "";

			// SecSexCharacters
			$this->SecSexCharacters->LinkCustomAttributes = "";
			$this->SecSexCharacters->HrefValue = "";

			// PenisUM
			$this->PenisUM->LinkCustomAttributes = "";
			$this->PenisUM->HrefValue = "";

			// VAS
			$this->VAS->LinkCustomAttributes = "";
			$this->VAS->HrefValue = "";

			// EPIDIDYMIS
			$this->EPIDIDYMIS->LinkCustomAttributes = "";
			$this->EPIDIDYMIS->HrefValue = "";

			// Varicocele
			$this->Varicocele->LinkCustomAttributes = "";
			$this->Varicocele->HrefValue = "";

			// FertilityTreatmentHistory
			$this->FertilityTreatmentHistory->LinkCustomAttributes = "";
			$this->FertilityTreatmentHistory->HrefValue = "";

			// SurgeryHistory
			$this->SurgeryHistory->LinkCustomAttributes = "";
			$this->SurgeryHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// PInvestigations
			$this->PInvestigations->LinkCustomAttributes = "";
			$this->PInvestigations->HrefValue = "";

			// Addictions
			$this->Addictions->LinkCustomAttributes = "";
			$this->Addictions->HrefValue = "";

			// Medications
			$this->Medications->LinkCustomAttributes = "";
			$this->Medications->HrefValue = "";

			// Medical
			$this->Medical->LinkCustomAttributes = "";
			$this->Medical->HrefValue = "";

			// Surgical
			$this->Surgical->LinkCustomAttributes = "";
			$this->Surgical->HrefValue = "";

			// CoitalHistory
			$this->CoitalHistory->LinkCustomAttributes = "";
			$this->CoitalHistory->HrefValue = "";

			// SemenAnalysis
			$this->SemenAnalysis->LinkCustomAttributes = "";
			$this->SemenAnalysis->HrefValue = "";

			// MInsvestications
			$this->MInsvestications->LinkCustomAttributes = "";
			$this->MInsvestications->HrefValue = "";

			// PImpression
			$this->PImpression->LinkCustomAttributes = "";
			$this->PImpression->HrefValue = "";

			// MIMpression
			$this->MIMpression->LinkCustomAttributes = "";
			$this->MIMpression->HrefValue = "";

			// PPlanOfManagement
			$this->PPlanOfManagement->LinkCustomAttributes = "";
			$this->PPlanOfManagement->HrefValue = "";

			// MPlanOfManagement
			$this->MPlanOfManagement->LinkCustomAttributes = "";
			$this->MPlanOfManagement->HrefValue = "";

			// PReadMore
			$this->PReadMore->LinkCustomAttributes = "";
			$this->PReadMore->HrefValue = "";

			// MReadMore
			$this->MReadMore->LinkCustomAttributes = "";
			$this->MReadMore->HrefValue = "";

			// MariedFor
			$this->MariedFor->LinkCustomAttributes = "";
			$this->MariedFor->HrefValue = "";

			// CMNCM
			$this->CMNCM->LinkCustomAttributes = "";
			$this->CMNCM->HrefValue = "";

			// TemplateMenstrualHistory
			$this->TemplateMenstrualHistory->LinkCustomAttributes = "";
			$this->TemplateMenstrualHistory->HrefValue = "";

			// TemplateObstetricHistory
			$this->TemplateObstetricHistory->LinkCustomAttributes = "";
			$this->TemplateObstetricHistory->HrefValue = "";

			// TemplateFertilityTreatmentHistory
			$this->TemplateFertilityTreatmentHistory->LinkCustomAttributes = "";
			$this->TemplateFertilityTreatmentHistory->HrefValue = "";

			// TemplateSurgeryHistory
			$this->TemplateSurgeryHistory->LinkCustomAttributes = "";
			$this->TemplateSurgeryHistory->HrefValue = "";

			// TemplateFInvestigations
			$this->TemplateFInvestigations->LinkCustomAttributes = "";
			$this->TemplateFInvestigations->HrefValue = "";

			// TemplatePlanOfManagement
			$this->TemplatePlanOfManagement->LinkCustomAttributes = "";
			$this->TemplatePlanOfManagement->HrefValue = "";

			// TemplatePImpression
			$this->TemplatePImpression->LinkCustomAttributes = "";
			$this->TemplatePImpression->HrefValue = "";

			// TemplateMedications
			$this->TemplateMedications->LinkCustomAttributes = "";
			$this->TemplateMedications->HrefValue = "";

			// TemplateSemenAnalysis
			$this->TemplateSemenAnalysis->LinkCustomAttributes = "";
			$this->TemplateSemenAnalysis->HrefValue = "";

			// MaleInsvestications
			$this->MaleInsvestications->LinkCustomAttributes = "";
			$this->MaleInsvestications->HrefValue = "";

			// TemplateMIMpression
			$this->TemplateMIMpression->LinkCustomAttributes = "";
			$this->TemplateMIMpression->HrefValue = "";

			// TemplateMalePlanOfManagement
			$this->TemplateMalePlanOfManagement->LinkCustomAttributes = "";
			$this->TemplateMalePlanOfManagement->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// pFamilyHistory
			$this->pFamilyHistory->LinkCustomAttributes = "";
			$this->pFamilyHistory->HrefValue = "";

			// pTemplateMedications
			$this->pTemplateMedications->LinkCustomAttributes = "";
			$this->pTemplateMedications->HrefValue = "";

			// AntiTPO
			$this->AntiTPO->LinkCustomAttributes = "";
			$this->AntiTPO->HrefValue = "";

			// AntiTG
			$this->AntiTG->LinkCustomAttributes = "";
			$this->AntiTG->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNO->FormValue)) {
			AddMessage($FormError, $this->RIDNO->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->SEX->Required) {
			if (!$this->SEX->IsDetailKey && $this->SEX->FormValue != NULL && $this->SEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SEX->caption(), $this->SEX->RequiredErrorMessage));
			}
		}
		if ($this->Religion->Required) {
			if (!$this->Religion->IsDetailKey && $this->Religion->FormValue != NULL && $this->Religion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Religion->caption(), $this->Religion->RequiredErrorMessage));
			}
		}
		if ($this->Address->Required) {
			if (!$this->Address->IsDetailKey && $this->Address->FormValue != NULL && $this->Address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
			}
		}
		if ($this->IdentificationMark->Required) {
			if (!$this->IdentificationMark->IsDetailKey && $this->IdentificationMark->FormValue != NULL && $this->IdentificationMark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
			}
		}
		if ($this->DoublewitnessName1->Required) {
			if (!$this->DoublewitnessName1->IsDetailKey && $this->DoublewitnessName1->FormValue != NULL && $this->DoublewitnessName1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoublewitnessName1->caption(), $this->DoublewitnessName1->RequiredErrorMessage));
			}
		}
		if ($this->DoublewitnessName2->Required) {
			if (!$this->DoublewitnessName2->IsDetailKey && $this->DoublewitnessName2->FormValue != NULL && $this->DoublewitnessName2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoublewitnessName2->caption(), $this->DoublewitnessName2->RequiredErrorMessage));
			}
		}
		if ($this->Chiefcomplaints->Required) {
			if (!$this->Chiefcomplaints->IsDetailKey && $this->Chiefcomplaints->FormValue != NULL && $this->Chiefcomplaints->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Chiefcomplaints->caption(), $this->Chiefcomplaints->RequiredErrorMessage));
			}
		}
		if ($this->MenstrualHistory->Required) {
			if (!$this->MenstrualHistory->IsDetailKey && $this->MenstrualHistory->FormValue != NULL && $this->MenstrualHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
			}
		}
		if ($this->ObstetricHistory->Required) {
			if (!$this->ObstetricHistory->IsDetailKey && $this->ObstetricHistory->FormValue != NULL && $this->ObstetricHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ObstetricHistory->caption(), $this->ObstetricHistory->RequiredErrorMessage));
			}
		}
		if ($this->MedicalHistory->Required) {
			if ($this->MedicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MedicalHistory->caption(), $this->MedicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->SurgicalHistory->Required) {
			if (!$this->SurgicalHistory->IsDetailKey && $this->SurgicalHistory->FormValue != NULL && $this->SurgicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->Generalexaminationpallor->Required) {
			if (!$this->Generalexaminationpallor->IsDetailKey && $this->Generalexaminationpallor->FormValue != NULL && $this->Generalexaminationpallor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generalexaminationpallor->caption(), $this->Generalexaminationpallor->RequiredErrorMessage));
			}
		}
		if ($this->PR->Required) {
			if (!$this->PR->IsDetailKey && $this->PR->FormValue != NULL && $this->PR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
			}
		}
		if ($this->CVS->Required) {
			if (!$this->CVS->IsDetailKey && $this->CVS->FormValue != NULL && $this->CVS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
			}
		}
		if ($this->PA->Required) {
			if (!$this->PA->IsDetailKey && $this->PA->FormValue != NULL && $this->PA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
			}
		}
		if ($this->PROVISIONALDIAGNOSIS->Required) {
			if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey && $this->PROVISIONALDIAGNOSIS->FormValue != NULL && $this->PROVISIONALDIAGNOSIS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PROVISIONALDIAGNOSIS->caption(), $this->PROVISIONALDIAGNOSIS->RequiredErrorMessage));
			}
		}
		if ($this->Investigations->Required) {
			if (!$this->Investigations->IsDetailKey && $this->Investigations->FormValue != NULL && $this->Investigations->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Investigations->caption(), $this->Investigations->RequiredErrorMessage));
			}
		}
		if ($this->Fheight->Required) {
			if (!$this->Fheight->IsDetailKey && $this->Fheight->FormValue != NULL && $this->Fheight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fheight->caption(), $this->Fheight->RequiredErrorMessage));
			}
		}
		if ($this->Fweight->Required) {
			if (!$this->Fweight->IsDetailKey && $this->Fweight->FormValue != NULL && $this->Fweight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fweight->caption(), $this->Fweight->RequiredErrorMessage));
			}
		}
		if ($this->FBMI->Required) {
			if (!$this->FBMI->IsDetailKey && $this->FBMI->FormValue != NULL && $this->FBMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FBMI->caption(), $this->FBMI->RequiredErrorMessage));
			}
		}
		if ($this->FBloodgroup->Required) {
			if (!$this->FBloodgroup->IsDetailKey && $this->FBloodgroup->FormValue != NULL && $this->FBloodgroup->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FBloodgroup->caption(), $this->FBloodgroup->RequiredErrorMessage));
			}
		}
		if ($this->Mheight->Required) {
			if (!$this->Mheight->IsDetailKey && $this->Mheight->FormValue != NULL && $this->Mheight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mheight->caption(), $this->Mheight->RequiredErrorMessage));
			}
		}
		if ($this->Mweight->Required) {
			if (!$this->Mweight->IsDetailKey && $this->Mweight->FormValue != NULL && $this->Mweight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mweight->caption(), $this->Mweight->RequiredErrorMessage));
			}
		}
		if ($this->MBMI->Required) {
			if (!$this->MBMI->IsDetailKey && $this->MBMI->FormValue != NULL && $this->MBMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MBMI->caption(), $this->MBMI->RequiredErrorMessage));
			}
		}
		if ($this->MBloodgroup->Required) {
			if (!$this->MBloodgroup->IsDetailKey && $this->MBloodgroup->FormValue != NULL && $this->MBloodgroup->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MBloodgroup->caption(), $this->MBloodgroup->RequiredErrorMessage));
			}
		}
		if ($this->FBuild->Required) {
			if ($this->FBuild->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FBuild->caption(), $this->FBuild->RequiredErrorMessage));
			}
		}
		if ($this->MBuild->Required) {
			if ($this->MBuild->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MBuild->caption(), $this->MBuild->RequiredErrorMessage));
			}
		}
		if ($this->FSkinColor->Required) {
			if ($this->FSkinColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FSkinColor->caption(), $this->FSkinColor->RequiredErrorMessage));
			}
		}
		if ($this->MSkinColor->Required) {
			if ($this->MSkinColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MSkinColor->caption(), $this->MSkinColor->RequiredErrorMessage));
			}
		}
		if ($this->FEyesColor->Required) {
			if ($this->FEyesColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FEyesColor->caption(), $this->FEyesColor->RequiredErrorMessage));
			}
		}
		if ($this->MEyesColor->Required) {
			if ($this->MEyesColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MEyesColor->caption(), $this->MEyesColor->RequiredErrorMessage));
			}
		}
		if ($this->FHairColor->Required) {
			if ($this->FHairColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FHairColor->caption(), $this->FHairColor->RequiredErrorMessage));
			}
		}
		if ($this->MhairColor->Required) {
			if ($this->MhairColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MhairColor->caption(), $this->MhairColor->RequiredErrorMessage));
			}
		}
		if ($this->FhairTexture->Required) {
			if ($this->FhairTexture->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FhairTexture->caption(), $this->FhairTexture->RequiredErrorMessage));
			}
		}
		if ($this->MHairTexture->Required) {
			if ($this->MHairTexture->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MHairTexture->caption(), $this->MHairTexture->RequiredErrorMessage));
			}
		}
		if ($this->Fothers->Required) {
			if (!$this->Fothers->IsDetailKey && $this->Fothers->FormValue != NULL && $this->Fothers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fothers->caption(), $this->Fothers->RequiredErrorMessage));
			}
		}
		if ($this->Mothers->Required) {
			if (!$this->Mothers->IsDetailKey && $this->Mothers->FormValue != NULL && $this->Mothers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mothers->caption(), $this->Mothers->RequiredErrorMessage));
			}
		}
		if ($this->PGE->Required) {
			if (!$this->PGE->IsDetailKey && $this->PGE->FormValue != NULL && $this->PGE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PGE->caption(), $this->PGE->RequiredErrorMessage));
			}
		}
		if ($this->PPR->Required) {
			if (!$this->PPR->IsDetailKey && $this->PPR->FormValue != NULL && $this->PPR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PPR->caption(), $this->PPR->RequiredErrorMessage));
			}
		}
		if ($this->PBP->Required) {
			if (!$this->PBP->IsDetailKey && $this->PBP->FormValue != NULL && $this->PBP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PBP->caption(), $this->PBP->RequiredErrorMessage));
			}
		}
		if ($this->Breast->Required) {
			if (!$this->Breast->IsDetailKey && $this->Breast->FormValue != NULL && $this->Breast->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Breast->caption(), $this->Breast->RequiredErrorMessage));
			}
		}
		if ($this->PPA->Required) {
			if (!$this->PPA->IsDetailKey && $this->PPA->FormValue != NULL && $this->PPA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PPA->caption(), $this->PPA->RequiredErrorMessage));
			}
		}
		if ($this->PPSV->Required) {
			if (!$this->PPSV->IsDetailKey && $this->PPSV->FormValue != NULL && $this->PPSV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PPSV->caption(), $this->PPSV->RequiredErrorMessage));
			}
		}
		if ($this->PPAPSMEAR->Required) {
			if (!$this->PPAPSMEAR->IsDetailKey && $this->PPAPSMEAR->FormValue != NULL && $this->PPAPSMEAR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PPAPSMEAR->caption(), $this->PPAPSMEAR->RequiredErrorMessage));
			}
		}
		if ($this->PTHYROID->Required) {
			if (!$this->PTHYROID->IsDetailKey && $this->PTHYROID->FormValue != NULL && $this->PTHYROID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTHYROID->caption(), $this->PTHYROID->RequiredErrorMessage));
			}
		}
		if ($this->MTHYROID->Required) {
			if (!$this->MTHYROID->IsDetailKey && $this->MTHYROID->FormValue != NULL && $this->MTHYROID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MTHYROID->caption(), $this->MTHYROID->RequiredErrorMessage));
			}
		}
		if ($this->SecSexCharacters->Required) {
			if (!$this->SecSexCharacters->IsDetailKey && $this->SecSexCharacters->FormValue != NULL && $this->SecSexCharacters->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecSexCharacters->caption(), $this->SecSexCharacters->RequiredErrorMessage));
			}
		}
		if ($this->PenisUM->Required) {
			if (!$this->PenisUM->IsDetailKey && $this->PenisUM->FormValue != NULL && $this->PenisUM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PenisUM->caption(), $this->PenisUM->RequiredErrorMessage));
			}
		}
		if ($this->VAS->Required) {
			if (!$this->VAS->IsDetailKey && $this->VAS->FormValue != NULL && $this->VAS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VAS->caption(), $this->VAS->RequiredErrorMessage));
			}
		}
		if ($this->EPIDIDYMIS->Required) {
			if (!$this->EPIDIDYMIS->IsDetailKey && $this->EPIDIDYMIS->FormValue != NULL && $this->EPIDIDYMIS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EPIDIDYMIS->caption(), $this->EPIDIDYMIS->RequiredErrorMessage));
			}
		}
		if ($this->Varicocele->Required) {
			if (!$this->Varicocele->IsDetailKey && $this->Varicocele->FormValue != NULL && $this->Varicocele->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Varicocele->caption(), $this->Varicocele->RequiredErrorMessage));
			}
		}
		if ($this->FertilityTreatmentHistory->Required) {
			if (!$this->FertilityTreatmentHistory->IsDetailKey && $this->FertilityTreatmentHistory->FormValue != NULL && $this->FertilityTreatmentHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FertilityTreatmentHistory->caption(), $this->FertilityTreatmentHistory->RequiredErrorMessage));
			}
		}
		if ($this->SurgeryHistory->Required) {
			if (!$this->SurgeryHistory->IsDetailKey && $this->SurgeryHistory->FormValue != NULL && $this->SurgeryHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurgeryHistory->caption(), $this->SurgeryHistory->RequiredErrorMessage));
			}
		}
		if ($this->FamilyHistory->Required) {
			if (!$this->FamilyHistory->IsDetailKey && $this->FamilyHistory->FormValue != NULL && $this->FamilyHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
			}
		}
		if ($this->PInvestigations->Required) {
			if (!$this->PInvestigations->IsDetailKey && $this->PInvestigations->FormValue != NULL && $this->PInvestigations->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PInvestigations->caption(), $this->PInvestigations->RequiredErrorMessage));
			}
		}
		if ($this->Addictions->Required) {
			if ($this->Addictions->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Addictions->caption(), $this->Addictions->RequiredErrorMessage));
			}
		}
		if ($this->Medications->Required) {
			if (!$this->Medications->IsDetailKey && $this->Medications->FormValue != NULL && $this->Medications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medications->caption(), $this->Medications->RequiredErrorMessage));
			}
		}
		if ($this->Medical->Required) {
			if (!$this->Medical->IsDetailKey && $this->Medical->FormValue != NULL && $this->Medical->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medical->caption(), $this->Medical->RequiredErrorMessage));
			}
		}
		if ($this->Surgical->Required) {
			if (!$this->Surgical->IsDetailKey && $this->Surgical->FormValue != NULL && $this->Surgical->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgical->caption(), $this->Surgical->RequiredErrorMessage));
			}
		}
		if ($this->CoitalHistory->Required) {
			if (!$this->CoitalHistory->IsDetailKey && $this->CoitalHistory->FormValue != NULL && $this->CoitalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CoitalHistory->caption(), $this->CoitalHistory->RequiredErrorMessage));
			}
		}
		if ($this->SemenAnalysis->Required) {
			if (!$this->SemenAnalysis->IsDetailKey && $this->SemenAnalysis->FormValue != NULL && $this->SemenAnalysis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SemenAnalysis->caption(), $this->SemenAnalysis->RequiredErrorMessage));
			}
		}
		if ($this->MInsvestications->Required) {
			if (!$this->MInsvestications->IsDetailKey && $this->MInsvestications->FormValue != NULL && $this->MInsvestications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MInsvestications->caption(), $this->MInsvestications->RequiredErrorMessage));
			}
		}
		if ($this->PImpression->Required) {
			if (!$this->PImpression->IsDetailKey && $this->PImpression->FormValue != NULL && $this->PImpression->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PImpression->caption(), $this->PImpression->RequiredErrorMessage));
			}
		}
		if ($this->MIMpression->Required) {
			if (!$this->MIMpression->IsDetailKey && $this->MIMpression->FormValue != NULL && $this->MIMpression->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIMpression->caption(), $this->MIMpression->RequiredErrorMessage));
			}
		}
		if ($this->PPlanOfManagement->Required) {
			if (!$this->PPlanOfManagement->IsDetailKey && $this->PPlanOfManagement->FormValue != NULL && $this->PPlanOfManagement->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PPlanOfManagement->caption(), $this->PPlanOfManagement->RequiredErrorMessage));
			}
		}
		if ($this->MPlanOfManagement->Required) {
			if (!$this->MPlanOfManagement->IsDetailKey && $this->MPlanOfManagement->FormValue != NULL && $this->MPlanOfManagement->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MPlanOfManagement->caption(), $this->MPlanOfManagement->RequiredErrorMessage));
			}
		}
		if ($this->PReadMore->Required) {
			if (!$this->PReadMore->IsDetailKey && $this->PReadMore->FormValue != NULL && $this->PReadMore->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PReadMore->caption(), $this->PReadMore->RequiredErrorMessage));
			}
		}
		if ($this->MReadMore->Required) {
			if (!$this->MReadMore->IsDetailKey && $this->MReadMore->FormValue != NULL && $this->MReadMore->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MReadMore->caption(), $this->MReadMore->RequiredErrorMessage));
			}
		}
		if ($this->MariedFor->Required) {
			if (!$this->MariedFor->IsDetailKey && $this->MariedFor->FormValue != NULL && $this->MariedFor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MariedFor->caption(), $this->MariedFor->RequiredErrorMessage));
			}
		}
		if ($this->CMNCM->Required) {
			if (!$this->CMNCM->IsDetailKey && $this->CMNCM->FormValue != NULL && $this->CMNCM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CMNCM->caption(), $this->CMNCM->RequiredErrorMessage));
			}
		}
		if ($this->TemplateMenstrualHistory->Required) {
			if (!$this->TemplateMenstrualHistory->IsDetailKey && $this->TemplateMenstrualHistory->FormValue != NULL && $this->TemplateMenstrualHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateMenstrualHistory->caption(), $this->TemplateMenstrualHistory->RequiredErrorMessage));
			}
		}
		if ($this->TemplateObstetricHistory->Required) {
			if (!$this->TemplateObstetricHistory->IsDetailKey && $this->TemplateObstetricHistory->FormValue != NULL && $this->TemplateObstetricHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateObstetricHistory->caption(), $this->TemplateObstetricHistory->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFertilityTreatmentHistory->Required) {
			if (!$this->TemplateFertilityTreatmentHistory->IsDetailKey && $this->TemplateFertilityTreatmentHistory->FormValue != NULL && $this->TemplateFertilityTreatmentHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFertilityTreatmentHistory->caption(), $this->TemplateFertilityTreatmentHistory->RequiredErrorMessage));
			}
		}
		if ($this->TemplateSurgeryHistory->Required) {
			if (!$this->TemplateSurgeryHistory->IsDetailKey && $this->TemplateSurgeryHistory->FormValue != NULL && $this->TemplateSurgeryHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateSurgeryHistory->caption(), $this->TemplateSurgeryHistory->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFInvestigations->Required) {
			if (!$this->TemplateFInvestigations->IsDetailKey && $this->TemplateFInvestigations->FormValue != NULL && $this->TemplateFInvestigations->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFInvestigations->caption(), $this->TemplateFInvestigations->RequiredErrorMessage));
			}
		}
		if ($this->TemplatePlanOfManagement->Required) {
			if (!$this->TemplatePlanOfManagement->IsDetailKey && $this->TemplatePlanOfManagement->FormValue != NULL && $this->TemplatePlanOfManagement->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplatePlanOfManagement->caption(), $this->TemplatePlanOfManagement->RequiredErrorMessage));
			}
		}
		if ($this->TemplatePImpression->Required) {
			if (!$this->TemplatePImpression->IsDetailKey && $this->TemplatePImpression->FormValue != NULL && $this->TemplatePImpression->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplatePImpression->caption(), $this->TemplatePImpression->RequiredErrorMessage));
			}
		}
		if ($this->TemplateMedications->Required) {
			if (!$this->TemplateMedications->IsDetailKey && $this->TemplateMedications->FormValue != NULL && $this->TemplateMedications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateMedications->caption(), $this->TemplateMedications->RequiredErrorMessage));
			}
		}
		if ($this->TemplateSemenAnalysis->Required) {
			if (!$this->TemplateSemenAnalysis->IsDetailKey && $this->TemplateSemenAnalysis->FormValue != NULL && $this->TemplateSemenAnalysis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateSemenAnalysis->caption(), $this->TemplateSemenAnalysis->RequiredErrorMessage));
			}
		}
		if ($this->MaleInsvestications->Required) {
			if (!$this->MaleInsvestications->IsDetailKey && $this->MaleInsvestications->FormValue != NULL && $this->MaleInsvestications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaleInsvestications->caption(), $this->MaleInsvestications->RequiredErrorMessage));
			}
		}
		if ($this->TemplateMIMpression->Required) {
			if (!$this->TemplateMIMpression->IsDetailKey && $this->TemplateMIMpression->FormValue != NULL && $this->TemplateMIMpression->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateMIMpression->caption(), $this->TemplateMIMpression->RequiredErrorMessage));
			}
		}
		if ($this->TemplateMalePlanOfManagement->Required) {
			if (!$this->TemplateMalePlanOfManagement->IsDetailKey && $this->TemplateMalePlanOfManagement->FormValue != NULL && $this->TemplateMalePlanOfManagement->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateMalePlanOfManagement->caption(), $this->TemplateMalePlanOfManagement->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->pFamilyHistory->Required) {
			if (!$this->pFamilyHistory->IsDetailKey && $this->pFamilyHistory->FormValue != NULL && $this->pFamilyHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pFamilyHistory->caption(), $this->pFamilyHistory->RequiredErrorMessage));
			}
		}
		if ($this->pTemplateMedications->Required) {
			if (!$this->pTemplateMedications->IsDetailKey && $this->pTemplateMedications->FormValue != NULL && $this->pTemplateMedications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pTemplateMedications->caption(), $this->pTemplateMedications->RequiredErrorMessage));
			}
		}
		if ($this->AntiTPO->Required) {
			if (!$this->AntiTPO->IsDetailKey && $this->AntiTPO->FormValue != NULL && $this->AntiTPO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AntiTPO->caption(), $this->AntiTPO->RequiredErrorMessage));
			}
		}
		if ($this->AntiTG->Required) {
			if (!$this->AntiTG->IsDetailKey && $this->AntiTG->FormValue != NULL && $this->AntiTG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AntiTG->caption(), $this->AntiTG->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		if ($this->PBP->CurrentValue <> "") { // Check field with unique index
			$filter = "(PBP = '" . AdjustSql($this->PBP->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PBP->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PBP->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNO
		$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// SEX
		$this->SEX->setDbValueDef($rsnew, $this->SEX->CurrentValue, NULL, FALSE);

		// Religion
		$this->Religion->setDbValueDef($rsnew, $this->Religion->CurrentValue, NULL, FALSE);

		// Address
		$this->Address->setDbValueDef($rsnew, $this->Address->CurrentValue, NULL, FALSE);

		// IdentificationMark
		$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, FALSE);

		// DoublewitnessName1
		$this->DoublewitnessName1->setDbValueDef($rsnew, $this->DoublewitnessName1->CurrentValue, NULL, FALSE);

		// DoublewitnessName2
		$this->DoublewitnessName2->setDbValueDef($rsnew, $this->DoublewitnessName2->CurrentValue, NULL, FALSE);

		// Chiefcomplaints
		$this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, NULL, FALSE);

		// MenstrualHistory
		$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, FALSE);

		// ObstetricHistory
		$this->ObstetricHistory->setDbValueDef($rsnew, $this->ObstetricHistory->CurrentValue, NULL, FALSE);

		// MedicalHistory
		$this->MedicalHistory->setDbValueDef($rsnew, $this->MedicalHistory->CurrentValue, NULL, FALSE);

		// SurgicalHistory
		$this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, NULL, FALSE);

		// Generalexaminationpallor
		$this->Generalexaminationpallor->setDbValueDef($rsnew, $this->Generalexaminationpallor->CurrentValue, NULL, FALSE);

		// PR
		$this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, NULL, FALSE);

		// CVS
		$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, FALSE);

		// PA
		$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, FALSE);

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, NULL, FALSE);

		// Investigations
		$this->Investigations->setDbValueDef($rsnew, $this->Investigations->CurrentValue, NULL, FALSE);

		// Fheight
		$this->Fheight->setDbValueDef($rsnew, $this->Fheight->CurrentValue, NULL, FALSE);

		// Fweight
		$this->Fweight->setDbValueDef($rsnew, $this->Fweight->CurrentValue, NULL, FALSE);

		// FBMI
		$this->FBMI->setDbValueDef($rsnew, $this->FBMI->CurrentValue, NULL, FALSE);

		// FBloodgroup
		$this->FBloodgroup->setDbValueDef($rsnew, $this->FBloodgroup->CurrentValue, NULL, FALSE);

		// Mheight
		$this->Mheight->setDbValueDef($rsnew, $this->Mheight->CurrentValue, NULL, FALSE);

		// Mweight
		$this->Mweight->setDbValueDef($rsnew, $this->Mweight->CurrentValue, NULL, FALSE);

		// MBMI
		$this->MBMI->setDbValueDef($rsnew, $this->MBMI->CurrentValue, NULL, FALSE);

		// MBloodgroup
		$this->MBloodgroup->setDbValueDef($rsnew, $this->MBloodgroup->CurrentValue, NULL, FALSE);

		// FBuild
		$this->FBuild->setDbValueDef($rsnew, $this->FBuild->CurrentValue, NULL, FALSE);

		// MBuild
		$this->MBuild->setDbValueDef($rsnew, $this->MBuild->CurrentValue, NULL, FALSE);

		// FSkinColor
		$this->FSkinColor->setDbValueDef($rsnew, $this->FSkinColor->CurrentValue, NULL, FALSE);

		// MSkinColor
		$this->MSkinColor->setDbValueDef($rsnew, $this->MSkinColor->CurrentValue, NULL, FALSE);

		// FEyesColor
		$this->FEyesColor->setDbValueDef($rsnew, $this->FEyesColor->CurrentValue, NULL, FALSE);

		// MEyesColor
		$this->MEyesColor->setDbValueDef($rsnew, $this->MEyesColor->CurrentValue, NULL, FALSE);

		// FHairColor
		$this->FHairColor->setDbValueDef($rsnew, $this->FHairColor->CurrentValue, NULL, FALSE);

		// MhairColor
		$this->MhairColor->setDbValueDef($rsnew, $this->MhairColor->CurrentValue, NULL, FALSE);

		// FhairTexture
		$this->FhairTexture->setDbValueDef($rsnew, $this->FhairTexture->CurrentValue, NULL, FALSE);

		// MHairTexture
		$this->MHairTexture->setDbValueDef($rsnew, $this->MHairTexture->CurrentValue, NULL, FALSE);

		// Fothers
		$this->Fothers->setDbValueDef($rsnew, $this->Fothers->CurrentValue, NULL, FALSE);

		// Mothers
		$this->Mothers->setDbValueDef($rsnew, $this->Mothers->CurrentValue, NULL, FALSE);

		// PGE
		$this->PGE->setDbValueDef($rsnew, $this->PGE->CurrentValue, NULL, FALSE);

		// PPR
		$this->PPR->setDbValueDef($rsnew, $this->PPR->CurrentValue, NULL, FALSE);

		// PBP
		$this->PBP->setDbValueDef($rsnew, $this->PBP->CurrentValue, NULL, FALSE);

		// Breast
		$this->Breast->setDbValueDef($rsnew, $this->Breast->CurrentValue, NULL, FALSE);

		// PPA
		$this->PPA->setDbValueDef($rsnew, $this->PPA->CurrentValue, NULL, FALSE);

		// PPSV
		$this->PPSV->setDbValueDef($rsnew, $this->PPSV->CurrentValue, NULL, FALSE);

		// PPAPSMEAR
		$this->PPAPSMEAR->setDbValueDef($rsnew, $this->PPAPSMEAR->CurrentValue, NULL, FALSE);

		// PTHYROID
		$this->PTHYROID->setDbValueDef($rsnew, $this->PTHYROID->CurrentValue, NULL, FALSE);

		// MTHYROID
		$this->MTHYROID->setDbValueDef($rsnew, $this->MTHYROID->CurrentValue, NULL, FALSE);

		// SecSexCharacters
		$this->SecSexCharacters->setDbValueDef($rsnew, $this->SecSexCharacters->CurrentValue, NULL, FALSE);

		// PenisUM
		$this->PenisUM->setDbValueDef($rsnew, $this->PenisUM->CurrentValue, NULL, FALSE);

		// VAS
		$this->VAS->setDbValueDef($rsnew, $this->VAS->CurrentValue, NULL, FALSE);

		// EPIDIDYMIS
		$this->EPIDIDYMIS->setDbValueDef($rsnew, $this->EPIDIDYMIS->CurrentValue, NULL, FALSE);

		// Varicocele
		$this->Varicocele->setDbValueDef($rsnew, $this->Varicocele->CurrentValue, NULL, FALSE);

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory->setDbValueDef($rsnew, $this->FertilityTreatmentHistory->CurrentValue, NULL, FALSE);

		// SurgeryHistory
		$this->SurgeryHistory->setDbValueDef($rsnew, $this->SurgeryHistory->CurrentValue, NULL, FALSE);

		// FamilyHistory
		$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, FALSE);

		// PInvestigations
		$this->PInvestigations->setDbValueDef($rsnew, $this->PInvestigations->CurrentValue, NULL, FALSE);

		// Addictions
		$this->Addictions->setDbValueDef($rsnew, $this->Addictions->CurrentValue, NULL, FALSE);

		// Medications
		$this->Medications->setDbValueDef($rsnew, $this->Medications->CurrentValue, NULL, FALSE);

		// Medical
		$this->Medical->setDbValueDef($rsnew, $this->Medical->CurrentValue, NULL, FALSE);

		// Surgical
		$this->Surgical->setDbValueDef($rsnew, $this->Surgical->CurrentValue, NULL, FALSE);

		// CoitalHistory
		$this->CoitalHistory->setDbValueDef($rsnew, $this->CoitalHistory->CurrentValue, NULL, FALSE);

		// SemenAnalysis
		$this->SemenAnalysis->setDbValueDef($rsnew, $this->SemenAnalysis->CurrentValue, NULL, FALSE);

		// MInsvestications
		$this->MInsvestications->setDbValueDef($rsnew, $this->MInsvestications->CurrentValue, NULL, FALSE);

		// PImpression
		$this->PImpression->setDbValueDef($rsnew, $this->PImpression->CurrentValue, NULL, FALSE);

		// MIMpression
		$this->MIMpression->setDbValueDef($rsnew, $this->MIMpression->CurrentValue, NULL, FALSE);

		// PPlanOfManagement
		$this->PPlanOfManagement->setDbValueDef($rsnew, $this->PPlanOfManagement->CurrentValue, NULL, FALSE);

		// MPlanOfManagement
		$this->MPlanOfManagement->setDbValueDef($rsnew, $this->MPlanOfManagement->CurrentValue, NULL, FALSE);

		// PReadMore
		$this->PReadMore->setDbValueDef($rsnew, $this->PReadMore->CurrentValue, NULL, FALSE);

		// MReadMore
		$this->MReadMore->setDbValueDef($rsnew, $this->MReadMore->CurrentValue, NULL, FALSE);

		// MariedFor
		$this->MariedFor->setDbValueDef($rsnew, $this->MariedFor->CurrentValue, NULL, FALSE);

		// CMNCM
		$this->CMNCM->setDbValueDef($rsnew, $this->CMNCM->CurrentValue, NULL, FALSE);

		// TemplateMenstrualHistory
		$this->TemplateMenstrualHistory->setDbValueDef($rsnew, $this->TemplateMenstrualHistory->CurrentValue, "", FALSE);

		// TemplateObstetricHistory
		$this->TemplateObstetricHistory->setDbValueDef($rsnew, $this->TemplateObstetricHistory->CurrentValue, "", FALSE);

		// TemplateFertilityTreatmentHistory
		$this->TemplateFertilityTreatmentHistory->setDbValueDef($rsnew, $this->TemplateFertilityTreatmentHistory->CurrentValue, "", FALSE);

		// TemplateSurgeryHistory
		$this->TemplateSurgeryHistory->setDbValueDef($rsnew, $this->TemplateSurgeryHistory->CurrentValue, "", FALSE);

		// TemplateFInvestigations
		$this->TemplateFInvestigations->setDbValueDef($rsnew, $this->TemplateFInvestigations->CurrentValue, "", FALSE);

		// TemplatePlanOfManagement
		$this->TemplatePlanOfManagement->setDbValueDef($rsnew, $this->TemplatePlanOfManagement->CurrentValue, "", FALSE);

		// TemplatePImpression
		$this->TemplatePImpression->setDbValueDef($rsnew, $this->TemplatePImpression->CurrentValue, "", FALSE);

		// TemplateMedications
		$this->TemplateMedications->setDbValueDef($rsnew, $this->TemplateMedications->CurrentValue, "", FALSE);

		// TemplateSemenAnalysis
		$this->TemplateSemenAnalysis->setDbValueDef($rsnew, $this->TemplateSemenAnalysis->CurrentValue, "", FALSE);

		// MaleInsvestications
		$this->MaleInsvestications->setDbValueDef($rsnew, $this->MaleInsvestications->CurrentValue, "", FALSE);

		// TemplateMIMpression
		$this->TemplateMIMpression->setDbValueDef($rsnew, $this->TemplateMIMpression->CurrentValue, "", FALSE);

		// TemplateMalePlanOfManagement
		$this->TemplateMalePlanOfManagement->setDbValueDef($rsnew, $this->TemplateMalePlanOfManagement->CurrentValue, "", FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// pFamilyHistory
		$this->pFamilyHistory->setDbValueDef($rsnew, $this->pFamilyHistory->CurrentValue, NULL, FALSE);

		// pTemplateMedications
		$this->pTemplateMedications->setDbValueDef($rsnew, $this->pTemplateMedications->CurrentValue, NULL, FALSE);

		// AntiTPO
		$this->AntiTPO->setDbValueDef($rsnew, $this->AntiTPO->CurrentValue, NULL, FALSE);

		// AntiTG
		$this->AntiTG->setDbValueDef($rsnew, $this->AntiTG->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_vitals_historylist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_FamilyHistory":
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Surgical":
					$lookupFilter = function() {
						return "`HistoryType`='SurgicalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_CoitalHistory":
					$lookupFilter = function() {
						return "`HistoryType`='CoitalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMenstrualHistory":
					$lookupFilter = function() {
						return "`TemplateType`='Menstrual History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateObstetricHistory":
					$lookupFilter = function() {
						return "`TemplateType`='Obstetric History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFertilityTreatmentHistory":
					$lookupFilter = function() {
						return "`TemplateType`='Fertility Treatment History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateSurgeryHistory":
					$lookupFilter = function() {
						return "`TemplateType`='Surgery History'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFInvestigations":
					$lookupFilter = function() {
						return "`TemplateType`='Female Investigations'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePlanOfManagement":
					$lookupFilter = function() {
						return "`TemplateType`='Female Plan Of Management'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePImpression":
					$lookupFilter = function() {
						return "`TemplateType`='Female Impression'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMedications":
					$lookupFilter = function() {
						return "`TemplateType`='Medications'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateSemenAnalysis":
					$lookupFilter = function() {
						return "`TemplateType`='Semen Analysis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_MaleInsvestications":
					$lookupFilter = function() {
						return "`TemplateType`='Male Insvestications'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMIMpression":
					$lookupFilter = function() {
						return "`TemplateType`='Male Impression'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMalePlanOfManagement":
					$lookupFilter = function() {
						return "`TemplateType`='Male Plan Of Management'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_pFamilyHistory":
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_FBloodgroup":
							break;
						case "x_MBloodgroup":
							break;
						case "x_FamilyHistory":
							break;
						case "x_Surgical":
							break;
						case "x_CoitalHistory":
							break;
						case "x_TemplateMenstrualHistory":
							break;
						case "x_TemplateObstetricHistory":
							break;
						case "x_TemplateFertilityTreatmentHistory":
							break;
						case "x_TemplateSurgeryHistory":
							break;
						case "x_TemplateFInvestigations":
							break;
						case "x_TemplatePlanOfManagement":
							break;
						case "x_TemplatePImpression":
							break;
						case "x_TemplateMedications":
							break;
						case "x_TemplateSemenAnalysis":
							break;
						case "x_MaleInsvestications":
							break;
						case "x_TemplateMIMpression":
							break;
						case "x_TemplateMalePlanOfManagement":
							break;
						case "x_pFamilyHistory":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	   $PageReDirect = $_POST["Repagehistoryview"];
	   if($PageReDirect == "EditFunction")
	   {
	   	  $url = "ivf_vitals_historyedit.php?showmaster=ivf_treatment_plan&fk_id=&fk_RIDNO=".$_POST["ivfRIDNO"]."&fk_Name=".$_POST["ivfName"]."&id=".$this->id->CurrentValue;
	   }
	   if($PageReDirect == "ViewFunction")
	   {
	   		$newURL = "ivf_vitals_historyedit.php?id=";
	   		header('Location: '.$newURL);
	   }
	   if($PageReDirect == "NextFunction")
	   {
			  $url = "ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$_POST["ivfRIDNO"]."&fk_Female=".$_POST["x_Name"];
	   }
	   if($PageReDirect == "HomeFunction")
	   {
			$url = "FertilityHome.php?id=".$_POST["ivfRIDNO"];	   		
	   }
	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
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
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
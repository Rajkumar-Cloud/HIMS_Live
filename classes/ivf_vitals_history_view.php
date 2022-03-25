<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_vitals_history_view extends ivf_vitals_history
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_vitals_history';

	// Page object name
	public $PageObjName = "ivf_vitals_history_view";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = TRUE;
	public $ExportWordCustom = TRUE;
	public $ExportPdfCustom = TRUE;
	public $ExportEmailCustom = TRUE;

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
		$keyUrl = "";
		if (Get("id") !== NULL) {
			$this->RecKey["id"] = Get("id");
			$keyUrl .= "&amp;id=" . urlencode($this->RecKey["id"]);
		}
		$this->ExportPrintUrl = $this->pageUrl() . "export=print" . $keyUrl;
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html" . $keyUrl;
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel" . $keyUrl;
		$this->ExportWordUrl = $this->pageUrl() . "export=word" . $keyUrl;
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml" . $keyUrl;
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv" . $keyUrl;
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf" . $keyUrl;
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

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

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
	public $ExportOptions; // Export options
	public $OtherOptions; // Other options
	public $DisplayRecs = 1;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $RecCnt;
	public $RecKey = array();
	public $IsModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SkipHeaderFooter, $EXPORT;

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
			if (!$Security->canView()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_vitals_historylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header
		if (Get("id") !== NULL) {
			if ($ExportFileName <> "")
				$ExportFileName .= "_";
			$ExportFileName .= Get("id");
		}

		// Get custom export parameters
		if ($this->isExport() && $custom <> "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Custom export (post back from ew.applyTemplate), export and terminate page
		if (Post("customexport") !== NULL) {
			$this->CustomExport = Post("customexport");
			$this->Export = $this->CustomExport;
			$this->terminate();
		}

		// Update Export URLs
		if (defined(PROJECT_NAMESPACE . "USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (defined(PROJECT_NAMESPACE . "USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Setup export options
		$this->setupExportOptions();
		$this->id->setVisibility();
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

		// Load current record
		$loadCurrentRecord = FALSE;
		$returnUrl = "";
		$matchRecord = FALSE;
		if ($this->isPageRequest()) { // Validate request
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->RecKey["id"] = $this->id->QueryStringValue;
			} elseif (IsApi() && Key(0) != NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->RecKey["id"] = $this->id->QueryStringValue;
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->RecKey["id"] = $this->id->FormValue;
			} elseif (IsApi() && Route(2) != NULL) {
				$this->id->setFormValue(Route(2));
				$this->RecKey["id"] = $this->id->FormValue;
			} else {
				$returnUrl = "ivf_vitals_historylist.php"; // Return to list
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
						$conn = &$this->getConnection();
						$this->Recordset = LoadRecordset($sql, $conn);
						$res = $this->Recordset && !$this->Recordset->EOF;
					} else {
						$res = $this->loadRow();
					}
					if (!$res) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
						$returnUrl = "ivf_vitals_historylist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "ivf_vitals_historylist.php"; // Not page request, return to list
		}
		if ($returnUrl <> "") {
			$this->terminate($returnUrl);
			return;
		}

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Render row
		$this->RowType = ROWTYPE_VIEW;
		$this->resetAttributes();
		$this->renderRow();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset, TRUE); // Get current record only
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows]);
			$this->terminate(TRUE);
		}
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = &$options["action"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());

		// Edit
		$item = &$option->add("edit");
		$editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl <> "" && $Security->canEdit());

		// Copy
		$item = &$option->add("copy");
		$copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->CopyUrl) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		$item->Visible = ($this->CopyUrl <> "" && $Security->canAdd());

		// Delete
		$item = &$option->add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery($this->DeleteUrl, "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl <> "" && $Security->canDelete());

		// Set up action default
		$option = &$options["action"];
		$option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
		$option->UseDropDownButton = FALSE;
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['SEX'] = NULL;
		$row['Religion'] = NULL;
		$row['Address'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['DoublewitnessName1'] = NULL;
		$row['DoublewitnessName2'] = NULL;
		$row['Chiefcomplaints'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['ObstetricHistory'] = NULL;
		$row['MedicalHistory'] = NULL;
		$row['SurgicalHistory'] = NULL;
		$row['Generalexaminationpallor'] = NULL;
		$row['PR'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['PROVISIONALDIAGNOSIS'] = NULL;
		$row['Investigations'] = NULL;
		$row['Fheight'] = NULL;
		$row['Fweight'] = NULL;
		$row['FBMI'] = NULL;
		$row['FBloodgroup'] = NULL;
		$row['Mheight'] = NULL;
		$row['Mweight'] = NULL;
		$row['MBMI'] = NULL;
		$row['MBloodgroup'] = NULL;
		$row['FBuild'] = NULL;
		$row['MBuild'] = NULL;
		$row['FSkinColor'] = NULL;
		$row['MSkinColor'] = NULL;
		$row['FEyesColor'] = NULL;
		$row['MEyesColor'] = NULL;
		$row['FHairColor'] = NULL;
		$row['MhairColor'] = NULL;
		$row['FhairTexture'] = NULL;
		$row['MHairTexture'] = NULL;
		$row['Fothers'] = NULL;
		$row['Mothers'] = NULL;
		$row['PGE'] = NULL;
		$row['PPR'] = NULL;
		$row['PBP'] = NULL;
		$row['Breast'] = NULL;
		$row['PPA'] = NULL;
		$row['PPSV'] = NULL;
		$row['PPAPSMEAR'] = NULL;
		$row['PTHYROID'] = NULL;
		$row['MTHYROID'] = NULL;
		$row['SecSexCharacters'] = NULL;
		$row['PenisUM'] = NULL;
		$row['VAS'] = NULL;
		$row['EPIDIDYMIS'] = NULL;
		$row['Varicocele'] = NULL;
		$row['FertilityTreatmentHistory'] = NULL;
		$row['SurgeryHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['PInvestigations'] = NULL;
		$row['Addictions'] = NULL;
		$row['Medications'] = NULL;
		$row['Medical'] = NULL;
		$row['Surgical'] = NULL;
		$row['CoitalHistory'] = NULL;
		$row['SemenAnalysis'] = NULL;
		$row['MInsvestications'] = NULL;
		$row['PImpression'] = NULL;
		$row['MIMpression'] = NULL;
		$row['PPlanOfManagement'] = NULL;
		$row['MPlanOfManagement'] = NULL;
		$row['PReadMore'] = NULL;
		$row['MReadMore'] = NULL;
		$row['MariedFor'] = NULL;
		$row['CMNCM'] = NULL;
		$row['TemplateMenstrualHistory'] = NULL;
		$row['TemplateObstetricHistory'] = NULL;
		$row['TemplateFertilityTreatmentHistory'] = NULL;
		$row['TemplateSurgeryHistory'] = NULL;
		$row['TemplateFInvestigations'] = NULL;
		$row['TemplatePlanOfManagement'] = NULL;
		$row['TemplatePImpression'] = NULL;
		$row['TemplateMedications'] = NULL;
		$row['TemplateSemenAnalysis'] = NULL;
		$row['MaleInsvestications'] = NULL;
		$row['TemplateMIMpression'] = NULL;
		$row['TemplateMalePlanOfManagement'] = NULL;
		$row['TidNo'] = NULL;
		$row['pFamilyHistory'] = NULL;
		$row['pTemplateMedications'] = NULL;
		$row['AntiTPO'] = NULL;
		$row['AntiTG'] = NULL;
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
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_vitals_historyview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_vitals_historyview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_vitals_historyview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
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
		$item->Visible = TRUE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word", $this->ExportWordCustom);
		$item->Visible = TRUE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = TRUE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = TRUE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = TRUE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
		$item->Visible = TRUE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = $this->ExportEmailCustom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
		$item->Body = "<button id=\"emf_ivf_vitals_history\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_vitals_history',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_vitals_historyview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = TRUE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->isExport())
			$this->ExportOptions->hideAllOptions();
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed 
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(PROJECT_CHARSET, "utf-8");
		$selectLimit = FALSE;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecs = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;
		$this->setupStartRec(); // Set up start record position

		// Set the last record to display
		if ($this->DisplayRecs <= 0) {
			$this->StopRec = $this->TotalRecs;
		} else {
			$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
		}
		$this->ExportDoc = GetExportDocument($this, "v");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRec = 1;
			$this->StopRec = $this->DisplayRecs <= 0 ? $this->TotalRecs : $this->DisplayRecs;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRec, $this->StopRec, "view");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!DEBUG_ENABLED && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (DEBUG_ENABLED && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_vitals_historylist.php"), "", $this->TableVar, TRUE);
		$pageId = "view";
		$Breadcrumb->add("view", $pageId, $url);
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

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}
}
?>
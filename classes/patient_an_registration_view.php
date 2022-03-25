<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_an_registration_view extends patient_an_registration
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_an_registration';

	// Page object name
	public $PageObjName = "patient_an_registration_view";

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

		// Table object (patient_an_registration)
		if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
			$GLOBALS["patient_an_registration"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_an_registration"];
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

		// Table object (patient_opd_follow_up)
		if (!isset($GLOBALS['patient_opd_follow_up']))
			$GLOBALS['patient_opd_follow_up'] = new patient_opd_follow_up();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_an_registration');

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
		global $EXPORT, $patient_an_registration;
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
				$doc = new $class($patient_an_registration);
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
					if ($pageName == "patient_an_registrationview.php")
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
					$this->terminate(GetUrl("patient_an_registrationlist.php"));
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
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;

		// Load current record
		$loadCurrentRecord = FALSE;
		$returnUrl = "";
		$matchRecord = FALSE;

		// Set up master/detail parameters
		$this->setupMasterParms();
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
				$returnUrl = "patient_an_registrationlist.php"; // Return to list
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
						$returnUrl = "patient_an_registrationlist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "patient_an_registrationlist.php"; // Not page request, return to list
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
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
		$row['id'] = NULL;
		$row['pid'] = NULL;
		$row['fid'] = NULL;
		$row['G'] = NULL;
		$row['P'] = NULL;
		$row['L'] = NULL;
		$row['A'] = NULL;
		$row['E'] = NULL;
		$row['M'] = NULL;
		$row['LMP'] = NULL;
		$row['EDO'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['MaritalHistory'] = NULL;
		$row['ObstetricHistory'] = NULL;
		$row['PreviousHistoryofGDM'] = NULL;
		$row['PreviousHistorofPIH'] = NULL;
		$row['PreviousHistoryofIUGR'] = NULL;
		$row['PreviousHistoryofOligohydramnios'] = NULL;
		$row['PreviousHistoryofPreterm'] = NULL;
		$row['G1'] = NULL;
		$row['G2'] = NULL;
		$row['G3'] = NULL;
		$row['DeliveryNDLSCS1'] = NULL;
		$row['DeliveryNDLSCS2'] = NULL;
		$row['DeliveryNDLSCS3'] = NULL;
		$row['BabySexweight1'] = NULL;
		$row['BabySexweight2'] = NULL;
		$row['BabySexweight3'] = NULL;
		$row['PastMedicalHistory'] = NULL;
		$row['PastSurgicalHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['Viability'] = NULL;
		$row['ViabilityDATE'] = NULL;
		$row['ViabilityREPORT'] = NULL;
		$row['Viability2'] = NULL;
		$row['Viability2DATE'] = NULL;
		$row['Viability2REPORT'] = NULL;
		$row['NTscan'] = NULL;
		$row['NTscanDATE'] = NULL;
		$row['NTscanREPORT'] = NULL;
		$row['EarlyTarget'] = NULL;
		$row['EarlyTargetDATE'] = NULL;
		$row['EarlyTargetREPORT'] = NULL;
		$row['Anomaly'] = NULL;
		$row['AnomalyDATE'] = NULL;
		$row['AnomalyREPORT'] = NULL;
		$row['Growth'] = NULL;
		$row['GrowthDATE'] = NULL;
		$row['GrowthREPORT'] = NULL;
		$row['Growth1'] = NULL;
		$row['Growth1DATE'] = NULL;
		$row['Growth1REPORT'] = NULL;
		$row['ANProfile'] = NULL;
		$row['ANProfileDATE'] = NULL;
		$row['ANProfileINHOUSE'] = NULL;
		$row['ANProfileREPORT'] = NULL;
		$row['DualMarker'] = NULL;
		$row['DualMarkerDATE'] = NULL;
		$row['DualMarkerINHOUSE'] = NULL;
		$row['DualMarkerREPORT'] = NULL;
		$row['Quadruple'] = NULL;
		$row['QuadrupleDATE'] = NULL;
		$row['QuadrupleINHOUSE'] = NULL;
		$row['QuadrupleREPORT'] = NULL;
		$row['A5month'] = NULL;
		$row['A5monthDATE'] = NULL;
		$row['A5monthINHOUSE'] = NULL;
		$row['A5monthREPORT'] = NULL;
		$row['A7month'] = NULL;
		$row['A7monthDATE'] = NULL;
		$row['A7monthINHOUSE'] = NULL;
		$row['A7monthREPORT'] = NULL;
		$row['A9month'] = NULL;
		$row['A9monthDATE'] = NULL;
		$row['A9monthINHOUSE'] = NULL;
		$row['A9monthREPORT'] = NULL;
		$row['INJ'] = NULL;
		$row['INJDATE'] = NULL;
		$row['INJINHOUSE'] = NULL;
		$row['INJREPORT'] = NULL;
		$row['Bleeding'] = NULL;
		$row['Hypothyroidism'] = NULL;
		$row['PICMENumber'] = NULL;
		$row['Outcome'] = NULL;
		$row['DateofAdmission'] = NULL;
		$row['DateodProcedure'] = NULL;
		$row['Miscarriage'] = NULL;
		$row['ModeOfDelivery'] = NULL;
		$row['ND'] = NULL;
		$row['NDS'] = NULL;
		$row['NDP'] = NULL;
		$row['Vaccum'] = NULL;
		$row['VaccumS'] = NULL;
		$row['VaccumP'] = NULL;
		$row['Forceps'] = NULL;
		$row['ForcepsS'] = NULL;
		$row['ForcepsP'] = NULL;
		$row['Elective'] = NULL;
		$row['ElectiveS'] = NULL;
		$row['ElectiveP'] = NULL;
		$row['Emergency'] = NULL;
		$row['EmergencyS'] = NULL;
		$row['EmergencyP'] = NULL;
		$row['Maturity'] = NULL;
		$row['Baby1'] = NULL;
		$row['Baby2'] = NULL;
		$row['sex1'] = NULL;
		$row['sex2'] = NULL;
		$row['weight1'] = NULL;
		$row['weight2'] = NULL;
		$row['NICU1'] = NULL;
		$row['NICU2'] = NULL;
		$row['Jaundice1'] = NULL;
		$row['Jaundice2'] = NULL;
		$row['Others1'] = NULL;
		$row['Others2'] = NULL;
		$row['SpillOverReasons'] = NULL;
		$row['ANClosed'] = NULL;
		$row['ANClosedDATE'] = NULL;
		$row['PastMedicalHistoryOthers'] = NULL;
		$row['PastSurgicalHistoryOthers'] = NULL;
		$row['FamilyHistoryOthers'] = NULL;
		$row['PresentPregnancyComplicationsOthers'] = NULL;
		$row['ETdate'] = NULL;
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
			if (strval($this->MenstrualHistory->CurrentValue) <> "") {
				$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->optionCaption($this->MenstrualHistory->CurrentValue);
			} else {
				$this->MenstrualHistory->ViewValue = NULL;
			}
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// MaritalHistory
			$this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
			$this->MaritalHistory->ViewCustomAttributes = "";

			// ObstetricHistory
			$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
			$this->ObstetricHistory->ViewCustomAttributes = "";

			// PreviousHistoryofGDM
			if (strval($this->PreviousHistoryofGDM->CurrentValue) <> "") {
				$this->PreviousHistoryofGDM->ViewValue = $this->PreviousHistoryofGDM->optionCaption($this->PreviousHistoryofGDM->CurrentValue);
			} else {
				$this->PreviousHistoryofGDM->ViewValue = NULL;
			}
			$this->PreviousHistoryofGDM->ViewCustomAttributes = "";

			// PreviousHistorofPIH
			if (strval($this->PreviousHistorofPIH->CurrentValue) <> "") {
				$this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->optionCaption($this->PreviousHistorofPIH->CurrentValue);
			} else {
				$this->PreviousHistorofPIH->ViewValue = NULL;
			}
			$this->PreviousHistorofPIH->ViewCustomAttributes = "";

			// PreviousHistoryofIUGR
			if (strval($this->PreviousHistoryofIUGR->CurrentValue) <> "") {
				$this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->optionCaption($this->PreviousHistoryofIUGR->CurrentValue);
			} else {
				$this->PreviousHistoryofIUGR->ViewValue = NULL;
			}
			$this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

			// PreviousHistoryofOligohydramnios
			if (strval($this->PreviousHistoryofOligohydramnios->CurrentValue) <> "") {
				$this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->optionCaption($this->PreviousHistoryofOligohydramnios->CurrentValue);
			} else {
				$this->PreviousHistoryofOligohydramnios->ViewValue = NULL;
			}
			$this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

			// PreviousHistoryofPreterm
			if (strval($this->PreviousHistoryofPreterm->CurrentValue) <> "") {
				$this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->optionCaption($this->PreviousHistoryofPreterm->CurrentValue);
			} else {
				$this->PreviousHistoryofPreterm->ViewValue = NULL;
			}
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
			if (strval($this->PastMedicalHistory->CurrentValue) <> "") {
				$this->PastMedicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PastMedicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PastMedicalHistory->ViewValue->add($this->PastMedicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PastMedicalHistory->ViewValue = NULL;
			}
			$this->PastMedicalHistory->ViewCustomAttributes = "";

			// PastSurgicalHistory
			if (strval($this->PastSurgicalHistory->CurrentValue) <> "") {
				$this->PastSurgicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PastSurgicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PastSurgicalHistory->ViewValue->add($this->PastSurgicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PastSurgicalHistory->ViewValue = NULL;
			}
			$this->PastSurgicalHistory->ViewCustomAttributes = "";

			// FamilyHistory
			if (strval($this->FamilyHistory->CurrentValue) <> "") {
				$this->FamilyHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FamilyHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FamilyHistory->ViewValue->add($this->FamilyHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FamilyHistory->ViewValue = NULL;
			}
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
			if (strval($this->Bleeding->CurrentValue) <> "") {
				$this->Bleeding->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Bleeding->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Bleeding->ViewValue->add($this->Bleeding->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Bleeding->ViewValue = NULL;
			}
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
			if (strval($this->Miscarriage->CurrentValue) <> "") {
				$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
			} else {
				$this->Miscarriage->ViewValue = NULL;
			}
			$this->Miscarriage->ViewCustomAttributes = "";

			// ModeOfDelivery
			if (strval($this->ModeOfDelivery->CurrentValue) <> "") {
				$this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->optionCaption($this->ModeOfDelivery->CurrentValue);
			} else {
				$this->ModeOfDelivery->ViewValue = NULL;
			}
			$this->ModeOfDelivery->ViewCustomAttributes = "";

			// ND
			$this->ND->ViewValue = $this->ND->CurrentValue;
			$this->ND->ViewCustomAttributes = "";

			// NDS
			if (strval($this->NDS->CurrentValue) <> "") {
				$this->NDS->ViewValue = $this->NDS->optionCaption($this->NDS->CurrentValue);
			} else {
				$this->NDS->ViewValue = NULL;
			}
			$this->NDS->ViewCustomAttributes = "";

			// NDP
			if (strval($this->NDP->CurrentValue) <> "") {
				$this->NDP->ViewValue = $this->NDP->optionCaption($this->NDP->CurrentValue);
			} else {
				$this->NDP->ViewValue = NULL;
			}
			$this->NDP->ViewCustomAttributes = "";

			// Vaccum
			$this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
			$this->Vaccum->ViewCustomAttributes = "";

			// VaccumS
			if (strval($this->VaccumS->CurrentValue) <> "") {
				$this->VaccumS->ViewValue = $this->VaccumS->optionCaption($this->VaccumS->CurrentValue);
			} else {
				$this->VaccumS->ViewValue = NULL;
			}
			$this->VaccumS->ViewCustomAttributes = "";

			// VaccumP
			if (strval($this->VaccumP->CurrentValue) <> "") {
				$this->VaccumP->ViewValue = $this->VaccumP->optionCaption($this->VaccumP->CurrentValue);
			} else {
				$this->VaccumP->ViewValue = NULL;
			}
			$this->VaccumP->ViewCustomAttributes = "";

			// Forceps
			$this->Forceps->ViewValue = $this->Forceps->CurrentValue;
			$this->Forceps->ViewCustomAttributes = "";

			// ForcepsS
			if (strval($this->ForcepsS->CurrentValue) <> "") {
				$this->ForcepsS->ViewValue = $this->ForcepsS->optionCaption($this->ForcepsS->CurrentValue);
			} else {
				$this->ForcepsS->ViewValue = NULL;
			}
			$this->ForcepsS->ViewCustomAttributes = "";

			// ForcepsP
			if (strval($this->ForcepsP->CurrentValue) <> "") {
				$this->ForcepsP->ViewValue = $this->ForcepsP->optionCaption($this->ForcepsP->CurrentValue);
			} else {
				$this->ForcepsP->ViewValue = NULL;
			}
			$this->ForcepsP->ViewCustomAttributes = "";

			// Elective
			$this->Elective->ViewValue = $this->Elective->CurrentValue;
			$this->Elective->ViewCustomAttributes = "";

			// ElectiveS
			if (strval($this->ElectiveS->CurrentValue) <> "") {
				$this->ElectiveS->ViewValue = $this->ElectiveS->optionCaption($this->ElectiveS->CurrentValue);
			} else {
				$this->ElectiveS->ViewValue = NULL;
			}
			$this->ElectiveS->ViewCustomAttributes = "";

			// ElectiveP
			if (strval($this->ElectiveP->CurrentValue) <> "") {
				$this->ElectiveP->ViewValue = $this->ElectiveP->optionCaption($this->ElectiveP->CurrentValue);
			} else {
				$this->ElectiveP->ViewValue = NULL;
			}
			$this->ElectiveP->ViewCustomAttributes = "";

			// Emergency
			$this->Emergency->ViewValue = $this->Emergency->CurrentValue;
			$this->Emergency->ViewCustomAttributes = "";

			// EmergencyS
			if (strval($this->EmergencyS->CurrentValue) <> "") {
				$this->EmergencyS->ViewValue = $this->EmergencyS->optionCaption($this->EmergencyS->CurrentValue);
			} else {
				$this->EmergencyS->ViewValue = NULL;
			}
			$this->EmergencyS->ViewCustomAttributes = "";

			// EmergencyP
			if (strval($this->EmergencyP->CurrentValue) <> "") {
				$this->EmergencyP->ViewValue = $this->EmergencyP->optionCaption($this->EmergencyP->CurrentValue);
			} else {
				$this->EmergencyP->ViewValue = NULL;
			}
			$this->EmergencyP->ViewCustomAttributes = "";

			// Maturity
			if (strval($this->Maturity->CurrentValue) <> "") {
				$this->Maturity->ViewValue = $this->Maturity->optionCaption($this->Maturity->CurrentValue);
			} else {
				$this->Maturity->ViewValue = NULL;
			}
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
			if (strval($this->SpillOverReasons->CurrentValue) <> "") {
				$this->SpillOverReasons->ViewValue = $this->SpillOverReasons->optionCaption($this->SpillOverReasons->CurrentValue);
			} else {
				$this->SpillOverReasons->ViewValue = NULL;
			}
			$this->SpillOverReasons->ViewCustomAttributes = "";

			// ANClosed
			if (strval($this->ANClosed->CurrentValue) <> "") {
				$this->ANClosed->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ANClosed->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ANClosed->ViewValue->add($this->ANClosed->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ANClosed->ViewValue = NULL;
			}
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpatient_an_registrationview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpatient_an_registrationview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpatient_an_registrationview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_patient_an_registration\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_patient_an_registration',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpatient_an_registrationview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "patient_opd_follow_up") {
				$validMaster = TRUE;
				if (Get("fk_PatientId") !== NULL) {
					$this->pid->setQueryStringValue(Get("fk_PatientId"));
					$this->pid->setSessionValue($this->pid->QueryStringValue);
					if (!is_numeric($this->pid->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_id") !== NULL) {
					$this->fid->setQueryStringValue(Get("fk_id"));
					$this->fid->setSessionValue($this->fid->QueryStringValue);
					if (!is_numeric($this->fid->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "patient_opd_follow_up") {
				$validMaster = TRUE;
				if (Post("fk_PatientId") !== NULL) {
					$this->pid->setFormValue(Post("fk_PatientId"));
					$this->pid->setSessionValue($this->pid->FormValue);
					if (!is_numeric($this->pid->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_id") !== NULL) {
					$this->fid->setFormValue(Post("fk_id"));
					$this->fid->setSessionValue($this->fid->FormValue);
					if (!is_numeric($this->fid->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "patient_opd_follow_up") {
				if ($this->pid->CurrentValue == "")
					$this->pid->setSessionValue("");
				if ($this->fid->CurrentValue == "")
					$this->fid->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_an_registrationlist.php"), "", $this->TableVar, TRUE);
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
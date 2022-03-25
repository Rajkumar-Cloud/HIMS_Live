<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_ot_delivery_register_view extends patient_ot_delivery_register
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_ot_delivery_register';

	// Page object name
	public $PageObjName = "patient_ot_delivery_register_view";

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

		// Table object (patient_ot_delivery_register)
		if (!isset($GLOBALS["patient_ot_delivery_register"]) || get_class($GLOBALS["patient_ot_delivery_register"]) == PROJECT_NAMESPACE . "patient_ot_delivery_register") {
			$GLOBALS["patient_ot_delivery_register"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_ot_delivery_register"];
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

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_delivery_register');

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
		global $EXPORT, $patient_ot_delivery_register;
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
				$doc = new $class($patient_ot_delivery_register);
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
					if ($pageName == "patient_ot_delivery_registerview.php")
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
					$this->terminate(GetUrl("patient_ot_delivery_registerlist.php"));
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
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->mrnno->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->ObstetricsHistryMale->Visible = FALSE;
		$this->ObstetricsHistryFeMale->setVisibility();
		$this->Abortion->setVisibility();
		$this->ChildBirthDate->setVisibility();
		$this->ChildBirthTime->setVisibility();
		$this->ChildSex->setVisibility();
		$this->ChildWt->setVisibility();
		$this->ChildDay->setVisibility();
		$this->ChildOE->setVisibility();
		$this->TypeofDelivery->setVisibility();
		$this->ChildBlGrp->setVisibility();
		$this->ApgarScore->setVisibility();
		$this->birthnotification->setVisibility();
		$this->formno->setVisibility();
		$this->dte->setVisibility();
		$this->motherReligion->setVisibility();
		$this->bloodgroup->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->PatientID->setVisibility();
		$this->HospID->setVisibility();
		$this->ChildBirthDate1->setVisibility();
		$this->ChildBirthTime1->setVisibility();
		$this->ChildSex1->setVisibility();
		$this->ChildWt1->setVisibility();
		$this->ChildDay1->setVisibility();
		$this->ChildOE1->setVisibility();
		$this->TypeofDelivery1->setVisibility();
		$this->ChildBlGrp1->setVisibility();
		$this->ApgarScore1->setVisibility();
		$this->birthnotification1->setVisibility();
		$this->formno1->setVisibility();
		$this->proposedSurgery->setVisibility();
		$this->surgeryProcedure->setVisibility();
		$this->typeOfAnaesthesia->setVisibility();
		$this->RecievedTime->setVisibility();
		$this->AnaesthesiaStarted->setVisibility();
		$this->AnaesthesiaEnded->setVisibility();
		$this->surgeryStarted->setVisibility();
		$this->surgeryEnded->setVisibility();
		$this->RecoveryTime->setVisibility();
		$this->ShiftedTime->setVisibility();
		$this->Duration->setVisibility();
		$this->DrVisit1->setVisibility();
		$this->DrVisit2->setVisibility();
		$this->DrVisit3->setVisibility();
		$this->DrVisit4->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AsstSurgeon1->setVisibility();
		$this->AsstSurgeon2->setVisibility();
		$this->paediatric->setVisibility();
		$this->ScrubNurse1->setVisibility();
		$this->ScrubNurse2->setVisibility();
		$this->FloorNurse->setVisibility();
		$this->Technician->setVisibility();
		$this->HouseKeeping->setVisibility();
		$this->countsCheckedMops->setVisibility();
		$this->gauze->setVisibility();
		$this->needles->setVisibility();
		$this->bloodloss->setVisibility();
		$this->bloodtransfusion->setVisibility();
		$this->implantsUsed->setVisibility();
		$this->MaterialsForHPE->setVisibility();
		$this->Reception->setVisibility();
		$this->PId->setVisibility();
		$this->PatientSearch->setVisibility();
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
		$this->setupLookupOptions($this->DrVisit1);
		$this->setupLookupOptions($this->DrVisit2);
		$this->setupLookupOptions($this->DrVisit3);
		$this->setupLookupOptions($this->DrVisit4);
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anaesthetist);
		$this->setupLookupOptions($this->AsstSurgeon1);
		$this->setupLookupOptions($this->AsstSurgeon2);
		$this->setupLookupOptions($this->paediatric);
		$this->setupLookupOptions($this->PatientSearch);

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
				$returnUrl = "patient_ot_delivery_registerlist.php"; // Return to list
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
						$returnUrl = "patient_ot_delivery_registerlist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "patient_ot_delivery_registerlist.php"; // Not page request, return to list
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->ObstetricsHistryMale->setDbValue($row['ObstetricsHistryMale']);
		$this->ObstetricsHistryFeMale->setDbValue($row['ObstetricsHistryFeMale']);
		$this->Abortion->setDbValue($row['Abortion']);
		$this->ChildBirthDate->setDbValue($row['ChildBirthDate']);
		$this->ChildBirthTime->setDbValue($row['ChildBirthTime']);
		$this->ChildSex->setDbValue($row['ChildSex']);
		$this->ChildWt->setDbValue($row['ChildWt']);
		$this->ChildDay->setDbValue($row['ChildDay']);
		$this->ChildOE->setDbValue($row['ChildOE']);
		$this->TypeofDelivery->setDbValue($row['TypeofDelivery']);
		$this->ChildBlGrp->setDbValue($row['ChildBlGrp']);
		$this->ApgarScore->setDbValue($row['ApgarScore']);
		$this->birthnotification->setDbValue($row['birthnotification']);
		$this->formno->setDbValue($row['formno']);
		$this->dte->setDbValue($row['dte']);
		$this->motherReligion->setDbValue($row['motherReligion']);
		$this->bloodgroup->setDbValue($row['bloodgroup']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->ChildBirthDate1->setDbValue($row['ChildBirthDate1']);
		$this->ChildBirthTime1->setDbValue($row['ChildBirthTime1']);
		$this->ChildSex1->setDbValue($row['ChildSex1']);
		$this->ChildWt1->setDbValue($row['ChildWt1']);
		$this->ChildDay1->setDbValue($row['ChildDay1']);
		$this->ChildOE1->setDbValue($row['ChildOE1']);
		$this->TypeofDelivery1->setDbValue($row['TypeofDelivery1']);
		$this->ChildBlGrp1->setDbValue($row['ChildBlGrp1']);
		$this->ApgarScore1->setDbValue($row['ApgarScore1']);
		$this->birthnotification1->setDbValue($row['birthnotification1']);
		$this->formno1->setDbValue($row['formno1']);
		$this->proposedSurgery->setDbValue($row['proposedSurgery']);
		$this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
		$this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
		$this->RecievedTime->setDbValue($row['RecievedTime']);
		$this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
		$this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
		$this->surgeryStarted->setDbValue($row['surgeryStarted']);
		$this->surgeryEnded->setDbValue($row['surgeryEnded']);
		$this->RecoveryTime->setDbValue($row['RecoveryTime']);
		$this->ShiftedTime->setDbValue($row['ShiftedTime']);
		$this->Duration->setDbValue($row['Duration']);
		$this->DrVisit1->setDbValue($row['DrVisit1']);
		$this->DrVisit2->setDbValue($row['DrVisit2']);
		$this->DrVisit3->setDbValue($row['DrVisit3']);
		$this->DrVisit4->setDbValue($row['DrVisit4']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
		$this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
		$this->paediatric->setDbValue($row['paediatric']);
		$this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
		$this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
		$this->FloorNurse->setDbValue($row['FloorNurse']);
		$this->Technician->setDbValue($row['Technician']);
		$this->HouseKeeping->setDbValue($row['HouseKeeping']);
		$this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
		$this->gauze->setDbValue($row['gauze']);
		$this->needles->setDbValue($row['needles']);
		$this->bloodloss->setDbValue($row['bloodloss']);
		$this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
		$this->implantsUsed->setDbValue($row['implantsUsed']);
		$this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PId->setDbValue($row['PId']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatID'] = NULL;
		$row['PatientName'] = NULL;
		$row['mrnno'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['ObstetricsHistryMale'] = NULL;
		$row['ObstetricsHistryFeMale'] = NULL;
		$row['Abortion'] = NULL;
		$row['ChildBirthDate'] = NULL;
		$row['ChildBirthTime'] = NULL;
		$row['ChildSex'] = NULL;
		$row['ChildWt'] = NULL;
		$row['ChildDay'] = NULL;
		$row['ChildOE'] = NULL;
		$row['TypeofDelivery'] = NULL;
		$row['ChildBlGrp'] = NULL;
		$row['ApgarScore'] = NULL;
		$row['birthnotification'] = NULL;
		$row['formno'] = NULL;
		$row['dte'] = NULL;
		$row['motherReligion'] = NULL;
		$row['bloodgroup'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['PatientID'] = NULL;
		$row['HospID'] = NULL;
		$row['ChildBirthDate1'] = NULL;
		$row['ChildBirthTime1'] = NULL;
		$row['ChildSex1'] = NULL;
		$row['ChildWt1'] = NULL;
		$row['ChildDay1'] = NULL;
		$row['ChildOE1'] = NULL;
		$row['TypeofDelivery1'] = NULL;
		$row['ChildBlGrp1'] = NULL;
		$row['ApgarScore1'] = NULL;
		$row['birthnotification1'] = NULL;
		$row['formno1'] = NULL;
		$row['proposedSurgery'] = NULL;
		$row['surgeryProcedure'] = NULL;
		$row['typeOfAnaesthesia'] = NULL;
		$row['RecievedTime'] = NULL;
		$row['AnaesthesiaStarted'] = NULL;
		$row['AnaesthesiaEnded'] = NULL;
		$row['surgeryStarted'] = NULL;
		$row['surgeryEnded'] = NULL;
		$row['RecoveryTime'] = NULL;
		$row['ShiftedTime'] = NULL;
		$row['Duration'] = NULL;
		$row['DrVisit1'] = NULL;
		$row['DrVisit2'] = NULL;
		$row['DrVisit3'] = NULL;
		$row['DrVisit4'] = NULL;
		$row['Surgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AsstSurgeon1'] = NULL;
		$row['AsstSurgeon2'] = NULL;
		$row['paediatric'] = NULL;
		$row['ScrubNurse1'] = NULL;
		$row['ScrubNurse2'] = NULL;
		$row['FloorNurse'] = NULL;
		$row['Technician'] = NULL;
		$row['HouseKeeping'] = NULL;
		$row['countsCheckedMops'] = NULL;
		$row['gauze'] = NULL;
		$row['needles'] = NULL;
		$row['bloodloss'] = NULL;
		$row['bloodtransfusion'] = NULL;
		$row['implantsUsed'] = NULL;
		$row['MaterialsForHPE'] = NULL;
		$row['Reception'] = NULL;
		$row['PId'] = NULL;
		$row['PatientSearch'] = NULL;
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
		// PatID
		// PatientName
		// mrnno
		// MobileNumber
		// Age
		// Gender
		// profilePic
		// ObstetricsHistryMale
		// ObstetricsHistryFeMale
		// Abortion
		// ChildBirthDate
		// ChildBirthTime
		// ChildSex
		// ChildWt
		// ChildDay
		// ChildOE
		// TypeofDelivery
		// ChildBlGrp
		// ApgarScore
		// birthnotification
		// formno
		// dte
		// motherReligion
		// bloodgroup
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatientID
		// HospID
		// ChildBirthDate1
		// ChildBirthTime1
		// ChildSex1
		// ChildWt1
		// ChildDay1
		// ChildOE1
		// TypeofDelivery1
		// ChildBlGrp1
		// ApgarScore1
		// birthnotification1
		// formno1
		// proposedSurgery
		// surgeryProcedure
		// typeOfAnaesthesia
		// RecievedTime
		// AnaesthesiaStarted
		// AnaesthesiaEnded
		// surgeryStarted
		// surgeryEnded
		// RecoveryTime
		// ShiftedTime
		// Duration
		// DrVisit1
		// DrVisit2
		// DrVisit3
		// DrVisit4
		// Surgeon
		// Anaesthetist
		// AsstSurgeon1
		// AsstSurgeon2
		// paediatric
		// ScrubNurse1
		// ScrubNurse2
		// FloorNurse
		// Technician
		// HouseKeeping
		// countsCheckedMops
		// gauze
		// needles
		// bloodloss
		// bloodtransfusion
		// implantsUsed
		// MaterialsForHPE
		// Reception
		// PId
		// PatientSearch

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// ObstetricsHistryFeMale
			$this->ObstetricsHistryFeMale->ViewValue = $this->ObstetricsHistryFeMale->CurrentValue;
			$this->ObstetricsHistryFeMale->ViewCustomAttributes = "";

			// Abortion
			$this->Abortion->ViewValue = $this->Abortion->CurrentValue;
			$this->Abortion->ViewCustomAttributes = "";

			// ChildBirthDate
			$this->ChildBirthDate->ViewValue = $this->ChildBirthDate->CurrentValue;
			$this->ChildBirthDate->ViewValue = FormatDateTime($this->ChildBirthDate->ViewValue, 7);
			$this->ChildBirthDate->ViewCustomAttributes = "";

			// ChildBirthTime
			$this->ChildBirthTime->ViewValue = $this->ChildBirthTime->CurrentValue;
			$this->ChildBirthTime->ViewCustomAttributes = "";

			// ChildSex
			$this->ChildSex->ViewValue = $this->ChildSex->CurrentValue;
			$this->ChildSex->ViewCustomAttributes = "";

			// ChildWt
			$this->ChildWt->ViewValue = $this->ChildWt->CurrentValue;
			$this->ChildWt->ViewCustomAttributes = "";

			// ChildDay
			$this->ChildDay->ViewValue = $this->ChildDay->CurrentValue;
			$this->ChildDay->ViewCustomAttributes = "";

			// ChildOE
			$this->ChildOE->ViewValue = $this->ChildOE->CurrentValue;
			$this->ChildOE->ViewCustomAttributes = "";

			// TypeofDelivery
			$this->TypeofDelivery->ViewValue = $this->TypeofDelivery->CurrentValue;
			$this->TypeofDelivery->ViewCustomAttributes = "";

			// ChildBlGrp
			$this->ChildBlGrp->ViewValue = $this->ChildBlGrp->CurrentValue;
			$this->ChildBlGrp->ViewCustomAttributes = "";

			// ApgarScore
			$this->ApgarScore->ViewValue = $this->ApgarScore->CurrentValue;
			$this->ApgarScore->ViewCustomAttributes = "";

			// birthnotification
			$this->birthnotification->ViewValue = $this->birthnotification->CurrentValue;
			$this->birthnotification->ViewCustomAttributes = "";

			// formno
			$this->formno->ViewValue = $this->formno->CurrentValue;
			$this->formno->ViewCustomAttributes = "";

			// dte
			$this->dte->ViewValue = $this->dte->CurrentValue;
			$this->dte->ViewValue = FormatDateTime($this->dte->ViewValue, 0);
			$this->dte->ViewCustomAttributes = "";

			// motherReligion
			$this->motherReligion->ViewValue = $this->motherReligion->CurrentValue;
			$this->motherReligion->ViewCustomAttributes = "";

			// bloodgroup
			$this->bloodgroup->ViewValue = $this->bloodgroup->CurrentValue;
			$this->bloodgroup->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// ChildBirthDate1
			$this->ChildBirthDate1->ViewValue = $this->ChildBirthDate1->CurrentValue;
			$this->ChildBirthDate1->ViewValue = FormatDateTime($this->ChildBirthDate1->ViewValue, 0);
			$this->ChildBirthDate1->ViewCustomAttributes = "";

			// ChildBirthTime1
			$this->ChildBirthTime1->ViewValue = $this->ChildBirthTime1->CurrentValue;
			$this->ChildBirthTime1->ViewCustomAttributes = "";

			// ChildSex1
			$this->ChildSex1->ViewValue = $this->ChildSex1->CurrentValue;
			$this->ChildSex1->ViewCustomAttributes = "";

			// ChildWt1
			$this->ChildWt1->ViewValue = $this->ChildWt1->CurrentValue;
			$this->ChildWt1->ViewCustomAttributes = "";

			// ChildDay1
			$this->ChildDay1->ViewValue = $this->ChildDay1->CurrentValue;
			$this->ChildDay1->ViewCustomAttributes = "";

			// ChildOE1
			$this->ChildOE1->ViewValue = $this->ChildOE1->CurrentValue;
			$this->ChildOE1->ViewCustomAttributes = "";

			// TypeofDelivery1
			$this->TypeofDelivery1->ViewValue = $this->TypeofDelivery1->CurrentValue;
			$this->TypeofDelivery1->ViewCustomAttributes = "";

			// ChildBlGrp1
			$this->ChildBlGrp1->ViewValue = $this->ChildBlGrp1->CurrentValue;
			$this->ChildBlGrp1->ViewCustomAttributes = "";

			// ApgarScore1
			$this->ApgarScore1->ViewValue = $this->ApgarScore1->CurrentValue;
			$this->ApgarScore1->ViewCustomAttributes = "";

			// birthnotification1
			$this->birthnotification1->ViewValue = $this->birthnotification1->CurrentValue;
			$this->birthnotification1->ViewCustomAttributes = "";

			// formno1
			$this->formno1->ViewValue = $this->formno1->CurrentValue;
			$this->formno1->ViewCustomAttributes = "";

			// proposedSurgery
			$this->proposedSurgery->ViewValue = $this->proposedSurgery->CurrentValue;
			$this->proposedSurgery->ViewCustomAttributes = "";

			// surgeryProcedure
			$this->surgeryProcedure->ViewValue = $this->surgeryProcedure->CurrentValue;
			$this->surgeryProcedure->ViewCustomAttributes = "";

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->ViewValue = $this->typeOfAnaesthesia->CurrentValue;
			$this->typeOfAnaesthesia->ViewCustomAttributes = "";

			// RecievedTime
			$this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
			$this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
			$this->RecievedTime->ViewCustomAttributes = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
			$this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
			$this->AnaesthesiaStarted->ViewCustomAttributes = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
			$this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
			$this->AnaesthesiaEnded->ViewCustomAttributes = "";

			// surgeryStarted
			$this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
			$this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
			$this->surgeryStarted->ViewCustomAttributes = "";

			// surgeryEnded
			$this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
			$this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 11);
			$this->surgeryEnded->ViewCustomAttributes = "";

			// RecoveryTime
			$this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
			$this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
			$this->RecoveryTime->ViewCustomAttributes = "";

			// ShiftedTime
			$this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
			$this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
			$this->ShiftedTime->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// DrVisit1
			$curVal = strval($this->DrVisit1->CurrentValue);
			if ($curVal <> "") {
				$this->DrVisit1->ViewValue = $this->DrVisit1->lookupCacheOption($curVal);
				if ($this->DrVisit1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrVisit1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrVisit1->ViewValue = $this->DrVisit1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrVisit1->ViewValue = $this->DrVisit1->CurrentValue;
					}
				}
			} else {
				$this->DrVisit1->ViewValue = NULL;
			}
			$this->DrVisit1->ViewCustomAttributes = "";

			// DrVisit2
			$curVal = strval($this->DrVisit2->CurrentValue);
			if ($curVal <> "") {
				$this->DrVisit2->ViewValue = $this->DrVisit2->lookupCacheOption($curVal);
				if ($this->DrVisit2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrVisit2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrVisit2->ViewValue = $this->DrVisit2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrVisit2->ViewValue = $this->DrVisit2->CurrentValue;
					}
				}
			} else {
				$this->DrVisit2->ViewValue = NULL;
			}
			$this->DrVisit2->ViewCustomAttributes = "";

			// DrVisit3
			$curVal = strval($this->DrVisit3->CurrentValue);
			if ($curVal <> "") {
				$this->DrVisit3->ViewValue = $this->DrVisit3->lookupCacheOption($curVal);
				if ($this->DrVisit3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrVisit3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrVisit3->ViewValue = $this->DrVisit3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrVisit3->ViewValue = $this->DrVisit3->CurrentValue;
					}
				}
			} else {
				$this->DrVisit3->ViewValue = NULL;
			}
			$this->DrVisit3->ViewCustomAttributes = "";

			// DrVisit4
			$curVal = strval($this->DrVisit4->CurrentValue);
			if ($curVal <> "") {
				$this->DrVisit4->ViewValue = $this->DrVisit4->lookupCacheOption($curVal);
				if ($this->DrVisit4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrVisit4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrVisit4->ViewValue = $this->DrVisit4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrVisit4->ViewValue = $this->DrVisit4->CurrentValue;
					}
				}
			} else {
				$this->DrVisit4->ViewValue = NULL;
			}
			$this->DrVisit4->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal <> "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
					}
				}
			} else {
				$this->Surgeon->ViewValue = NULL;
			}
			$this->Surgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$curVal = strval($this->Anaesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
				if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anaesthetist->ViewValue = NULL;
			}
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
			$curVal = strval($this->AsstSurgeon1->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
				if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon1->ViewValue = NULL;
			}
			$this->AsstSurgeon1->ViewCustomAttributes = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
			$curVal = strval($this->AsstSurgeon2->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
				if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon2->ViewValue = NULL;
			}
			$this->AsstSurgeon2->ViewCustomAttributes = "";

			// paediatric
			$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
			$curVal = strval($this->paediatric->CurrentValue);
			if ($curVal <> "") {
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
				if ($this->paediatric->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
					}
				}
			} else {
				$this->paediatric->ViewValue = NULL;
			}
			$this->paediatric->ViewCustomAttributes = "";

			// ScrubNurse1
			$this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
			$this->ScrubNurse1->ViewCustomAttributes = "";

			// ScrubNurse2
			$this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
			$this->ScrubNurse2->ViewCustomAttributes = "";

			// FloorNurse
			$this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
			$this->FloorNurse->ViewCustomAttributes = "";

			// Technician
			$this->Technician->ViewValue = $this->Technician->CurrentValue;
			$this->Technician->ViewCustomAttributes = "";

			// HouseKeeping
			$this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
			$this->HouseKeeping->ViewCustomAttributes = "";

			// countsCheckedMops
			$this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
			$this->countsCheckedMops->ViewCustomAttributes = "";

			// gauze
			$this->gauze->ViewValue = $this->gauze->CurrentValue;
			$this->gauze->ViewCustomAttributes = "";

			// needles
			$this->needles->ViewValue = $this->needles->CurrentValue;
			$this->needles->ViewCustomAttributes = "";

			// bloodloss
			$this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
			$this->bloodloss->ViewCustomAttributes = "";

			// bloodtransfusion
			$this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
			$this->bloodtransfusion->ViewCustomAttributes = "";

			// implantsUsed
			$this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
			$this->implantsUsed->ViewCustomAttributes = "";

			// MaterialsForHPE
			$this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
			$this->MaterialsForHPE->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// PatientSearch
			$curVal = strval($this->PatientSearch->CurrentValue);
			if ($curVal <> "") {
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
				if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
					}
				}
			} else {
				$this->PatientSearch->ViewValue = NULL;
			}
			$this->PatientSearch->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// ObstetricsHistryFeMale
			$this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
			$this->ObstetricsHistryFeMale->HrefValue = "";
			$this->ObstetricsHistryFeMale->TooltipValue = "";

			// Abortion
			$this->Abortion->LinkCustomAttributes = "";
			$this->Abortion->HrefValue = "";
			$this->Abortion->TooltipValue = "";

			// ChildBirthDate
			$this->ChildBirthDate->LinkCustomAttributes = "";
			$this->ChildBirthDate->HrefValue = "";
			$this->ChildBirthDate->TooltipValue = "";

			// ChildBirthTime
			$this->ChildBirthTime->LinkCustomAttributes = "";
			$this->ChildBirthTime->HrefValue = "";
			$this->ChildBirthTime->TooltipValue = "";

			// ChildSex
			$this->ChildSex->LinkCustomAttributes = "";
			$this->ChildSex->HrefValue = "";
			$this->ChildSex->TooltipValue = "";

			// ChildWt
			$this->ChildWt->LinkCustomAttributes = "";
			$this->ChildWt->HrefValue = "";
			$this->ChildWt->TooltipValue = "";

			// ChildDay
			$this->ChildDay->LinkCustomAttributes = "";
			$this->ChildDay->HrefValue = "";
			$this->ChildDay->TooltipValue = "";

			// ChildOE
			$this->ChildOE->LinkCustomAttributes = "";
			$this->ChildOE->HrefValue = "";
			$this->ChildOE->TooltipValue = "";

			// TypeofDelivery
			$this->TypeofDelivery->LinkCustomAttributes = "";
			$this->TypeofDelivery->HrefValue = "";
			$this->TypeofDelivery->TooltipValue = "";

			// ChildBlGrp
			$this->ChildBlGrp->LinkCustomAttributes = "";
			$this->ChildBlGrp->HrefValue = "";
			$this->ChildBlGrp->TooltipValue = "";

			// ApgarScore
			$this->ApgarScore->LinkCustomAttributes = "";
			$this->ApgarScore->HrefValue = "";
			$this->ApgarScore->TooltipValue = "";

			// birthnotification
			$this->birthnotification->LinkCustomAttributes = "";
			$this->birthnotification->HrefValue = "";
			$this->birthnotification->TooltipValue = "";

			// formno
			$this->formno->LinkCustomAttributes = "";
			$this->formno->HrefValue = "";
			$this->formno->TooltipValue = "";

			// dte
			$this->dte->LinkCustomAttributes = "";
			$this->dte->HrefValue = "";
			$this->dte->TooltipValue = "";

			// motherReligion
			$this->motherReligion->LinkCustomAttributes = "";
			$this->motherReligion->HrefValue = "";
			$this->motherReligion->TooltipValue = "";

			// bloodgroup
			$this->bloodgroup->LinkCustomAttributes = "";
			$this->bloodgroup->HrefValue = "";
			$this->bloodgroup->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// ChildBirthDate1
			$this->ChildBirthDate1->LinkCustomAttributes = "";
			$this->ChildBirthDate1->HrefValue = "";
			$this->ChildBirthDate1->TooltipValue = "";

			// ChildBirthTime1
			$this->ChildBirthTime1->LinkCustomAttributes = "";
			$this->ChildBirthTime1->HrefValue = "";
			$this->ChildBirthTime1->TooltipValue = "";

			// ChildSex1
			$this->ChildSex1->LinkCustomAttributes = "";
			$this->ChildSex1->HrefValue = "";
			$this->ChildSex1->TooltipValue = "";

			// ChildWt1
			$this->ChildWt1->LinkCustomAttributes = "";
			$this->ChildWt1->HrefValue = "";
			$this->ChildWt1->TooltipValue = "";

			// ChildDay1
			$this->ChildDay1->LinkCustomAttributes = "";
			$this->ChildDay1->HrefValue = "";
			$this->ChildDay1->TooltipValue = "";

			// ChildOE1
			$this->ChildOE1->LinkCustomAttributes = "";
			$this->ChildOE1->HrefValue = "";
			$this->ChildOE1->TooltipValue = "";

			// TypeofDelivery1
			$this->TypeofDelivery1->LinkCustomAttributes = "";
			$this->TypeofDelivery1->HrefValue = "";
			$this->TypeofDelivery1->TooltipValue = "";

			// ChildBlGrp1
			$this->ChildBlGrp1->LinkCustomAttributes = "";
			$this->ChildBlGrp1->HrefValue = "";
			$this->ChildBlGrp1->TooltipValue = "";

			// ApgarScore1
			$this->ApgarScore1->LinkCustomAttributes = "";
			$this->ApgarScore1->HrefValue = "";
			$this->ApgarScore1->TooltipValue = "";

			// birthnotification1
			$this->birthnotification1->LinkCustomAttributes = "";
			$this->birthnotification1->HrefValue = "";
			$this->birthnotification1->TooltipValue = "";

			// formno1
			$this->formno1->LinkCustomAttributes = "";
			$this->formno1->HrefValue = "";
			$this->formno1->TooltipValue = "";

			// proposedSurgery
			$this->proposedSurgery->LinkCustomAttributes = "";
			$this->proposedSurgery->HrefValue = "";
			$this->proposedSurgery->TooltipValue = "";

			// surgeryProcedure
			$this->surgeryProcedure->LinkCustomAttributes = "";
			$this->surgeryProcedure->HrefValue = "";
			$this->surgeryProcedure->TooltipValue = "";

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->LinkCustomAttributes = "";
			$this->typeOfAnaesthesia->HrefValue = "";
			$this->typeOfAnaesthesia->TooltipValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";
			$this->RecievedTime->TooltipValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";
			$this->AnaesthesiaStarted->TooltipValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";
			$this->AnaesthesiaEnded->TooltipValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";
			$this->surgeryStarted->TooltipValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";
			$this->surgeryEnded->TooltipValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";
			$this->RecoveryTime->TooltipValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";
			$this->ShiftedTime->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// DrVisit1
			$this->DrVisit1->LinkCustomAttributes = "";
			$this->DrVisit1->HrefValue = "";
			$this->DrVisit1->TooltipValue = "";

			// DrVisit2
			$this->DrVisit2->LinkCustomAttributes = "";
			$this->DrVisit2->HrefValue = "";
			$this->DrVisit2->TooltipValue = "";

			// DrVisit3
			$this->DrVisit3->LinkCustomAttributes = "";
			$this->DrVisit3->HrefValue = "";
			$this->DrVisit3->TooltipValue = "";

			// DrVisit4
			$this->DrVisit4->LinkCustomAttributes = "";
			$this->DrVisit4->HrefValue = "";
			$this->DrVisit4->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";
			$this->AsstSurgeon1->TooltipValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";
			$this->AsstSurgeon2->TooltipValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";
			$this->paediatric->TooltipValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";
			$this->ScrubNurse1->TooltipValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";
			$this->ScrubNurse2->TooltipValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";
			$this->FloorNurse->TooltipValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";
			$this->Technician->TooltipValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";
			$this->HouseKeeping->TooltipValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";
			$this->countsCheckedMops->TooltipValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";
			$this->gauze->TooltipValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";
			$this->needles->TooltipValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";
			$this->bloodloss->TooltipValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";
			$this->bloodtransfusion->TooltipValue = "";

			// implantsUsed
			$this->implantsUsed->LinkCustomAttributes = "";
			$this->implantsUsed->HrefValue = "";
			$this->implantsUsed->TooltipValue = "";

			// MaterialsForHPE
			$this->MaterialsForHPE->LinkCustomAttributes = "";
			$this->MaterialsForHPE->HrefValue = "";
			$this->MaterialsForHPE->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpatient_ot_delivery_registerview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpatient_ot_delivery_registerview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpatient_ot_delivery_registerview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_patient_ot_delivery_register\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_patient_ot_delivery_register',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpatient_ot_delivery_registerview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->Reception->setQueryStringValue(Get("fk_id"));
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($this->Reception->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PId->setQueryStringValue(Get("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->QueryStringValue);
					if (!is_numeric($this->PId->QueryStringValue))
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->Reception->setFormValue(Post("fk_id"));
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($this->Reception->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PId->setFormValue(Post("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->FormValue);
					if (!is_numeric($this->PId->FormValue))
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
			if ($masterTblVar <> "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
				if ($this->PId->CurrentValue == "")
					$this->PId->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_ot_delivery_registerlist.php"), "", $this->TableVar, TRUE);
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
						case "x_DrVisit1":
							break;
						case "x_DrVisit2":
							break;
						case "x_DrVisit3":
							break;
						case "x_DrVisit4":
							break;
						case "x_Surgeon":
							break;
						case "x_Anaesthetist":
							break;
						case "x_AsstSurgeon1":
							break;
						case "x_AsstSurgeon2":
							break;
						case "x_paediatric":
							break;
						case "x_PatientSearch":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
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
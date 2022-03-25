<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_oocytedenudation_view extends ivf_oocytedenudation
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_oocytedenudation';

	// Page object name
	public $PageObjName = "ivf_oocytedenudation_view";

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

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
			$GLOBALS["ivf_oocytedenudation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_oocytedenudation"];
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

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_oocytedenudation');

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
		global $EXPORT, $ivf_oocytedenudation;
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
				$doc = new $class($ivf_oocytedenudation);
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
					if ($pageName == "ivf_oocytedenudationview.php")
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
					$this->terminate(GetUrl("ivf_oocytedenudationlist.php"));
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
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ResultDate->setVisibility();
		$this->Surgeon->setVisibility();
		$this->AsstSurgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AnaestheiaType->setVisibility();
		$this->PrimaryEmbryologist->setVisibility();
		$this->SecondaryEmbryologist->setVisibility();
		$this->OPUNotes->setVisibility();
		$this->NoOfFolliclesRight->setVisibility();
		$this->NoOfFolliclesLeft->setVisibility();
		$this->NoOfOocytes->setVisibility();
		$this->RecordOocyteDenudation->setVisibility();
		$this->DateOfDenudation->setVisibility();
		$this->DenudationDoneBy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TidNo->setVisibility();
		$this->ExpFollicles->setVisibility();
		$this->SecondaryDenudationDoneBy->setVisibility();
		$this->patient2->setVisibility();
		$this->OocytesDonate1->setVisibility();
		$this->OocytesDonate2->setVisibility();
		$this->ETDonate->setVisibility();
		$this->OocyteOrgin->setVisibility();
		$this->patient1->setVisibility();
		$this->OocyteType->setVisibility();
		$this->MIOocytesDonate1->setVisibility();
		$this->MIOocytesDonate2->setVisibility();
		$this->SelfMI->setVisibility();
		$this->SelfMII->setVisibility();
		$this->patient3->setVisibility();
		$this->patient4->setVisibility();
		$this->OocytesDonate3->setVisibility();
		$this->OocytesDonate4->setVisibility();
		$this->MIOocytesDonate3->setVisibility();
		$this->MIOocytesDonate4->setVisibility();
		$this->SelfOocytesMI->setVisibility();
		$this->SelfOocytesMII->setVisibility();
		$this->donor->setVisibility();
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
		$this->setupLookupOptions($this->patient2);
		$this->setupLookupOptions($this->patient1);
		$this->setupLookupOptions($this->patient3);
		$this->setupLookupOptions($this->patient4);

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
				$returnUrl = "ivf_oocytedenudationlist.php"; // Return to list
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
						$returnUrl = "ivf_oocytedenudationlist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "ivf_oocytedenudationlist.php"; // Not page request, return to list
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

		// Set up detail parameters
		$this->setupDetailParms();

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
		$option = &$options["detail"];
		$detailTableLink = "";
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_ivf_embryology_chart"
		$item = &$option->add("detail_ivf_embryology_chart");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_embryology_chartlist.php?" . TABLE_SHOW_MASTER . "=ivf_oocytedenudation&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
			$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
		if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_embryology_chart')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar <> "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "ivf_embryology_chart";
		}
		if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_embryology_chart')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar <> "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "ivf_embryology_chart";
		}
		if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_embryology_chart')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar <> "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "ivf_embryology_chart";
		}
		if ($links <> "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_embryology_chart');
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_embryology_chart";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar <> "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar <> "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(TABLE_SHOW_DETAIL . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar <> "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(TABLE_SHOW_DETAIL . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links <> "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$opt = &$option->add("details");
			$opt->Body = $body;
		}

		// Set up detail default
		$option = &$options["detail"];
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$ar = explode(",", $detailTableLink);
		$cnt = count($ar);
		$option->UseDropDownButton = ($cnt > 1);
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->OPUNotes->setDbValue($row['OPUNotes']);
		$this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
		$this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
		$this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
		$this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
		$this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
		$this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->ExpFollicles->setDbValue($row['ExpFollicles']);
		$this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
		$this->patient2->setDbValue($row['patient2']);
		$this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
		$this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
		$this->ETDonate->setDbValue($row['ETDonate']);
		$this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
		$this->patient1->setDbValue($row['patient1']);
		$this->OocyteType->setDbValue($row['OocyteType']);
		$this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
		$this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
		$this->SelfMI->setDbValue($row['SelfMI']);
		$this->SelfMII->setDbValue($row['SelfMII']);
		$this->patient3->setDbValue($row['patient3']);
		$this->patient4->setDbValue($row['patient4']);
		$this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
		$this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
		$this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
		$this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
		$this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
		$this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
		$this->donor->setDbValue($row['donor']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ResultDate'] = NULL;
		$row['Surgeon'] = NULL;
		$row['AsstSurgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AnaestheiaType'] = NULL;
		$row['PrimaryEmbryologist'] = NULL;
		$row['SecondaryEmbryologist'] = NULL;
		$row['OPUNotes'] = NULL;
		$row['NoOfFolliclesRight'] = NULL;
		$row['NoOfFolliclesLeft'] = NULL;
		$row['NoOfOocytes'] = NULL;
		$row['RecordOocyteDenudation'] = NULL;
		$row['DateOfDenudation'] = NULL;
		$row['DenudationDoneBy'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TidNo'] = NULL;
		$row['ExpFollicles'] = NULL;
		$row['SecondaryDenudationDoneBy'] = NULL;
		$row['patient2'] = NULL;
		$row['OocytesDonate1'] = NULL;
		$row['OocytesDonate2'] = NULL;
		$row['ETDonate'] = NULL;
		$row['OocyteOrgin'] = NULL;
		$row['patient1'] = NULL;
		$row['OocyteType'] = NULL;
		$row['MIOocytesDonate1'] = NULL;
		$row['MIOocytesDonate2'] = NULL;
		$row['SelfMI'] = NULL;
		$row['SelfMII'] = NULL;
		$row['patient3'] = NULL;
		$row['patient4'] = NULL;
		$row['OocytesDonate3'] = NULL;
		$row['OocytesDonate4'] = NULL;
		$row['MIOocytesDonate3'] = NULL;
		$row['MIOocytesDonate4'] = NULL;
		$row['SelfOocytesMI'] = NULL;
		$row['SelfOocytesMII'] = NULL;
		$row['donor'] = NULL;
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
		// RIDNo
		// Name
		// ResultDate
		// Surgeon
		// AsstSurgeon
		// Anaesthetist
		// AnaestheiaType
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// OPUNotes
		// NoOfFolliclesRight
		// NoOfFolliclesLeft
		// NoOfOocytes
		// RecordOocyteDenudation
		// DateOfDenudation
		// DenudationDoneBy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TidNo
		// ExpFollicles
		// SecondaryDenudationDoneBy
		// patient2
		// OocytesDonate1
		// OocytesDonate2
		// ETDonate
		// OocyteOrgin
		// patient1
		// OocyteType
		// MIOocytesDonate1
		// MIOocytesDonate2
		// SelfMI
		// SelfMII
		// patient3
		// patient4
		// OocytesDonate3
		// OocytesDonate4
		// MIOocytesDonate3
		// MIOocytesDonate4
		// SelfOocytesMI
		// SelfOocytesMII
		// donor

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 11);
			$this->ResultDate->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$this->Surgeon->ViewCustomAttributes = "";

			// AsstSurgeon
			$this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
			$this->AsstSurgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AnaestheiaType
			$this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
			$this->AnaestheiaType->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// OPUNotes
			$this->OPUNotes->ViewValue = $this->OPUNotes->CurrentValue;
			$this->OPUNotes->ViewCustomAttributes = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
			$this->NoOfFolliclesRight->ViewCustomAttributes = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
			$this->NoOfFolliclesLeft->ViewCustomAttributes = "";

			// NoOfOocytes
			$this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
			$this->NoOfOocytes->ViewCustomAttributes = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
			$this->RecordOocyteDenudation->ViewCustomAttributes = "";

			// DateOfDenudation
			$this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
			$this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 11);
			$this->DateOfDenudation->ViewCustomAttributes = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
			$this->DenudationDoneBy->ViewCustomAttributes = "";

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

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// ExpFollicles
			$this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
			$this->ExpFollicles->ViewCustomAttributes = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
			$this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

			// patient2
			$curVal = strval($this->patient2->CurrentValue);
			if ($curVal <> "") {
				$this->patient2->ViewValue = $this->patient2->lookupCacheOption($curVal);
				if ($this->patient2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient2->ViewValue = $this->patient2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient2->ViewValue = $this->patient2->CurrentValue;
					}
				}
			} else {
				$this->patient2->ViewValue = NULL;
			}
			$this->patient2->ViewCustomAttributes = "";

			// OocytesDonate1
			$this->OocytesDonate1->ViewValue = $this->OocytesDonate1->CurrentValue;
			$this->OocytesDonate1->ViewCustomAttributes = "";

			// OocytesDonate2
			$this->OocytesDonate2->ViewValue = $this->OocytesDonate2->CurrentValue;
			$this->OocytesDonate2->ViewCustomAttributes = "";

			// ETDonate
			$this->ETDonate->ViewValue = $this->ETDonate->CurrentValue;
			$this->ETDonate->ViewCustomAttributes = "";

			// OocyteOrgin
			if (strval($this->OocyteOrgin->CurrentValue) <> "") {
				$this->OocyteOrgin->ViewValue = $this->OocyteOrgin->optionCaption($this->OocyteOrgin->CurrentValue);
			} else {
				$this->OocyteOrgin->ViewValue = NULL;
			}
			$this->OocyteOrgin->ViewCustomAttributes = "";

			// patient1
			$curVal = strval($this->patient1->CurrentValue);
			if ($curVal <> "") {
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
				if ($this->patient1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient1->ViewValue = $this->patient1->CurrentValue;
					}
				}
			} else {
				$this->patient1->ViewValue = NULL;
			}
			$this->patient1->ViewCustomAttributes = "";

			// OocyteType
			if (strval($this->OocyteType->CurrentValue) <> "") {
				$this->OocyteType->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OocyteType->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OocyteType->ViewValue->add($this->OocyteType->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OocyteType->ViewValue = NULL;
			}
			$this->OocyteType->ViewCustomAttributes = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
			$this->MIOocytesDonate1->ViewCustomAttributes = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
			$this->MIOocytesDonate2->ViewCustomAttributes = "";

			// SelfMI
			$this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
			$this->SelfMI->ViewCustomAttributes = "";

			// SelfMII
			$this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
			$this->SelfMII->ViewCustomAttributes = "";

			// patient3
			$curVal = strval($this->patient3->CurrentValue);
			if ($curVal <> "") {
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
				if ($this->patient3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient3->ViewValue = $this->patient3->CurrentValue;
					}
				}
			} else {
				$this->patient3->ViewValue = NULL;
			}
			$this->patient3->ViewCustomAttributes = "";

			// patient4
			$curVal = strval($this->patient4->CurrentValue);
			if ($curVal <> "") {
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
				if ($this->patient4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient4->ViewValue = $this->patient4->CurrentValue;
					}
				}
			} else {
				$this->patient4->ViewValue = NULL;
			}
			$this->patient4->ViewCustomAttributes = "";

			// OocytesDonate3
			$this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
			$this->OocytesDonate3->ViewCustomAttributes = "";

			// OocytesDonate4
			$this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
			$this->OocytesDonate4->ViewCustomAttributes = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
			$this->MIOocytesDonate3->ViewCustomAttributes = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
			$this->MIOocytesDonate4->ViewCustomAttributes = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
			$this->SelfOocytesMI->ViewCustomAttributes = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
			$this->SelfOocytesMII->ViewCustomAttributes = "";

			// donor
			$this->donor->ViewValue = $this->donor->CurrentValue;
			$this->donor->ViewValue = FormatNumber($this->donor->ViewValue, 0, -2, -2, -2);
			$this->donor->ViewCustomAttributes = "";

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";
			$this->AsstSurgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";
			$this->AnaestheiaType->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// OPUNotes
			$this->OPUNotes->LinkCustomAttributes = "";
			$this->OPUNotes->HrefValue = "";
			$this->OPUNotes->TooltipValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";
			$this->NoOfFolliclesRight->TooltipValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";
			$this->NoOfFolliclesLeft->TooltipValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";
			$this->NoOfOocytes->TooltipValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";
			$this->RecordOocyteDenudation->TooltipValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";
			$this->DateOfDenudation->TooltipValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";
			$this->DenudationDoneBy->TooltipValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";
			$this->ExpFollicles->TooltipValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";
			$this->SecondaryDenudationDoneBy->TooltipValue = "";

			// patient2
			$this->patient2->LinkCustomAttributes = "";
			$this->patient2->HrefValue = "";
			$this->patient2->TooltipValue = "";

			// OocytesDonate1
			$this->OocytesDonate1->LinkCustomAttributes = "";
			$this->OocytesDonate1->HrefValue = "";
			$this->OocytesDonate1->TooltipValue = "";

			// OocytesDonate2
			$this->OocytesDonate2->LinkCustomAttributes = "";
			$this->OocytesDonate2->HrefValue = "";
			$this->OocytesDonate2->TooltipValue = "";

			// ETDonate
			$this->ETDonate->LinkCustomAttributes = "";
			$this->ETDonate->HrefValue = "";
			$this->ETDonate->TooltipValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";
			$this->OocyteOrgin->TooltipValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";
			$this->patient1->TooltipValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";
			$this->OocyteType->TooltipValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";
			$this->MIOocytesDonate1->TooltipValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";
			$this->MIOocytesDonate2->TooltipValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";
			$this->SelfMI->TooltipValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";
			$this->SelfMII->TooltipValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";
			$this->patient3->TooltipValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";
			$this->patient4->TooltipValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";
			$this->OocytesDonate3->TooltipValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";
			$this->OocytesDonate4->TooltipValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";
			$this->MIOocytesDonate3->TooltipValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";
			$this->MIOocytesDonate4->TooltipValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";
			$this->SelfOocytesMI->TooltipValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
			$this->SelfOocytesMII->TooltipValue = "";

			// donor
			$this->donor->LinkCustomAttributes = "";
			$this->donor->HrefValue = "";
			$this->donor->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_oocytedenudationview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_oocytedenudationview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_oocytedenudationview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_ivf_oocytedenudation\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_oocytedenudation',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_oocytedenudationview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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

		// Export detail records (ivf_embryology_chart)
		if (EXPORT_DETAIL_RECORDS && in_array("ivf_embryology_chart", explode(",", $this->getCurrentDetailTable()))) {
			global $ivf_embryology_chart;
			if (!isset($ivf_embryology_chart))
				$ivf_embryology_chart = new ivf_embryology_chart();
			$rsdetail = $ivf_embryology_chart->loadRs($ivf_embryology_chart->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || EXPORT_DETAIL_RECORDS_FOR_CSV) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $ivf_embryology_chart;
					$ivf_embryology_chart->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->TidNo->setQueryStringValue(Get("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($this->TidNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_RIDNO") !== NULL) {
					$this->RIDNo->setQueryStringValue(Get("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($this->RIDNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Name"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->TidNo->setFormValue(Post("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($this->TidNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_RIDNO") !== NULL) {
					$this->RIDNo->setFormValue(Post("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($this->RIDNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->Name->setFormValue(Post("fk_Name"));
					$this->Name->setSessionValue($this->Name->FormValue);
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
			if ($masterTblVar <> "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("ivf_embryology_chart", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
					$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
				if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView) {
					$GLOBALS["ivf_embryology_chart_grid"]->CurrentMode = "view";

					// Save current master table to detail table
					$GLOBALS["ivf_embryology_chart_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_embryology_chart_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->IsDetailKey = TRUE;
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->setSessionValue($GLOBALS["ivf_embryology_chart_grid"]->DidNO->CurrentValue);
					$GLOBALS["ivf_embryology_chart_grid"]->RIDNo->setSessionValue(""); // Clear session key
					$GLOBALS["ivf_embryology_chart_grid"]->Name->setSessionValue(""); // Clear session key
					$GLOBALS["ivf_embryology_chart_grid"]->TidNo->setSessionValue(""); // Clear session key
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_oocytedenudationlist.php"), "", $this->TableVar, TRUE);
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
						case "x_patient2":
							break;
						case "x_patient1":
							break;
						case "x_patient3":
							break;
						case "x_patient4":
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
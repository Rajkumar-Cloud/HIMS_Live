<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class depositdetails_view extends depositdetails
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'depositdetails';

	// Page object name
	public $PageObjName = "depositdetails_view";

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

		// Table object (depositdetails)
		if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
			$GLOBALS["depositdetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["depositdetails"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');

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
		global $EXPORT, $depositdetails;
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
				$doc = new $class($depositdetails);
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
					if ($pageName == "depositdetailsview.php")
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
					$this->terminate(GetUrl("depositdetailslist.php"));
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
		$this->DepositDate->setVisibility();
		$this->DepositToBankSelect->setVisibility();
		$this->DepositToBank->setVisibility();
		$this->TransferToSelect->setVisibility();
		$this->TransferTo->setVisibility();
		$this->OpeningBalance->setVisibility();
		$this->Other->setVisibility();
		$this->TotalCash->setVisibility();
		$this->Cheque->setVisibility();
		$this->Card->setVisibility();
		$this->NEFTRTGS->setVisibility();
		$this->TotalTransferDepositAmount->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->CreatedUserName->setVisibility();
		$this->ModifiedUserName->setVisibility();
		$this->A2000Count->setVisibility();
		$this->A2000Amount->setVisibility();
		$this->A1000Count->setVisibility();
		$this->A1000Amount->setVisibility();
		$this->A500Count->setVisibility();
		$this->A500Amount->setVisibility();
		$this->A200Count->setVisibility();
		$this->A200Amount->setVisibility();
		$this->A100Count->setVisibility();
		$this->A100Amount->setVisibility();
		$this->A50Count->setVisibility();
		$this->A50Amount->setVisibility();
		$this->A20Count->setVisibility();
		$this->A20Amount->setVisibility();
		$this->A10Count->setVisibility();
		$this->A10Amount->setVisibility();
		$this->BalanceAmount->setVisibility();
		$this->CashCollected->setVisibility();
		$this->RTGS->setVisibility();
		$this->PAYTM->setVisibility();
		$this->HospID->setVisibility();
		$this->ManualCash->setVisibility();
		$this->ManualCard->setVisibility();
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
		$this->setupLookupOptions($this->DepositToBank);
		$this->setupLookupOptions($this->TransferTo);

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
				$returnUrl = "depositdetailslist.php"; // Return to list
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
						$returnUrl = "depositdetailslist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "depositdetailslist.php"; // Not page request, return to list
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
		$this->DepositDate->setDbValue($row['DepositDate']);
		$this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
		$this->DepositToBank->setDbValue($row['DepositToBank']);
		$this->TransferToSelect->setDbValue($row['TransferToSelect']);
		$this->TransferTo->setDbValue($row['TransferTo']);
		$this->OpeningBalance->setDbValue($row['OpeningBalance']);
		$this->Other->setDbValue($row['Other']);
		$this->TotalCash->setDbValue($row['TotalCash']);
		$this->Cheque->setDbValue($row['Cheque']);
		$this->Card->setDbValue($row['Card']);
		$this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
		$this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->CreatedUserName->setDbValue($row['CreatedUserName']);
		$this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
		$this->A2000Count->setDbValue($row['A2000Count']);
		$this->A2000Amount->setDbValue($row['A2000Amount']);
		$this->A1000Count->setDbValue($row['A1000Count']);
		$this->A1000Amount->setDbValue($row['A1000Amount']);
		$this->A500Count->setDbValue($row['A500Count']);
		$this->A500Amount->setDbValue($row['A500Amount']);
		$this->A200Count->setDbValue($row['A200Count']);
		$this->A200Amount->setDbValue($row['A200Amount']);
		$this->A100Count->setDbValue($row['A100Count']);
		$this->A100Amount->setDbValue($row['A100Amount']);
		$this->A50Count->setDbValue($row['A50Count']);
		$this->A50Amount->setDbValue($row['A50Amount']);
		$this->A20Count->setDbValue($row['A20Count']);
		$this->A20Amount->setDbValue($row['A20Amount']);
		$this->A10Count->setDbValue($row['A10Count']);
		$this->A10Amount->setDbValue($row['A10Amount']);
		$this->BalanceAmount->setDbValue($row['BalanceAmount']);
		$this->CashCollected->setDbValue($row['CashCollected']);
		$this->RTGS->setDbValue($row['RTGS']);
		$this->PAYTM->setDbValue($row['PAYTM']);
		$this->HospID->setDbValue($row['HospID']);
		$this->ManualCash->setDbValue($row['ManualCash']);
		$this->ManualCard->setDbValue($row['ManualCard']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['DepositDate'] = NULL;
		$row['DepositToBankSelect'] = NULL;
		$row['DepositToBank'] = NULL;
		$row['TransferToSelect'] = NULL;
		$row['TransferTo'] = NULL;
		$row['OpeningBalance'] = NULL;
		$row['Other'] = NULL;
		$row['TotalCash'] = NULL;
		$row['Cheque'] = NULL;
		$row['Card'] = NULL;
		$row['NEFTRTGS'] = NULL;
		$row['TotalTransferDepositAmount'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['ModifiedDateTime'] = NULL;
		$row['CreatedUserName'] = NULL;
		$row['ModifiedUserName'] = NULL;
		$row['A2000Count'] = NULL;
		$row['A2000Amount'] = NULL;
		$row['A1000Count'] = NULL;
		$row['A1000Amount'] = NULL;
		$row['A500Count'] = NULL;
		$row['A500Amount'] = NULL;
		$row['A200Count'] = NULL;
		$row['A200Amount'] = NULL;
		$row['A100Count'] = NULL;
		$row['A100Amount'] = NULL;
		$row['A50Count'] = NULL;
		$row['A50Amount'] = NULL;
		$row['A20Count'] = NULL;
		$row['A20Amount'] = NULL;
		$row['A10Count'] = NULL;
		$row['A10Amount'] = NULL;
		$row['BalanceAmount'] = NULL;
		$row['CashCollected'] = NULL;
		$row['RTGS'] = NULL;
		$row['PAYTM'] = NULL;
		$row['HospID'] = NULL;
		$row['ManualCash'] = NULL;
		$row['ManualCard'] = NULL;
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

		// Convert decimal values if posted back
		if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue)))
			$this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue)))
			$this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue)))
			$this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue)))
			$this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue)))
			$this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue)))
			$this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A2000Amount->FormValue == $this->A2000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A2000Amount->CurrentValue)))
			$this->A2000Amount->CurrentValue = ConvertToFloatString($this->A2000Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A1000Amount->FormValue == $this->A1000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A1000Amount->CurrentValue)))
			$this->A1000Amount->CurrentValue = ConvertToFloatString($this->A1000Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A500Amount->FormValue == $this->A500Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A500Amount->CurrentValue)))
			$this->A500Amount->CurrentValue = ConvertToFloatString($this->A500Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A200Amount->FormValue == $this->A200Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A200Amount->CurrentValue)))
			$this->A200Amount->CurrentValue = ConvertToFloatString($this->A200Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A100Amount->FormValue == $this->A100Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A100Amount->CurrentValue)))
			$this->A100Amount->CurrentValue = ConvertToFloatString($this->A100Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A50Amount->FormValue == $this->A50Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A50Amount->CurrentValue)))
			$this->A50Amount->CurrentValue = ConvertToFloatString($this->A50Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A20Amount->FormValue == $this->A20Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A20Amount->CurrentValue)))
			$this->A20Amount->CurrentValue = ConvertToFloatString($this->A20Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A10Amount->FormValue == $this->A10Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A10Amount->CurrentValue)))
			$this->A10Amount->CurrentValue = ConvertToFloatString($this->A10Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BalanceAmount->FormValue == $this->BalanceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->BalanceAmount->CurrentValue)))
			$this->BalanceAmount->CurrentValue = ConvertToFloatString($this->BalanceAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue)))
			$this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue)))
			$this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue)))
			$this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ManualCash->FormValue == $this->ManualCash->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCash->CurrentValue)))
			$this->ManualCash->CurrentValue = ConvertToFloatString($this->ManualCash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ManualCard->FormValue == $this->ManualCard->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCard->CurrentValue)))
			$this->ManualCard->CurrentValue = ConvertToFloatString($this->ManualCard->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// DepositDate
		// DepositToBankSelect
		// DepositToBank
		// TransferToSelect
		// TransferTo
		// OpeningBalance
		// Other
		// TotalCash
		// Cheque
		// Card
		// NEFTRTGS
		// TotalTransferDepositAmount
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// CreatedUserName
		// ModifiedUserName
		// A2000Count
		// A2000Amount
		// A1000Count
		// A1000Amount
		// A500Count
		// A500Amount
		// A200Count
		// A200Amount
		// A100Count
		// A100Amount
		// A50Count
		// A50Amount
		// A20Count
		// A20Amount
		// A10Count
		// A10Amount
		// BalanceAmount
		// CashCollected
		// RTGS
		// PAYTM
		// HospID
		// ManualCash
		// ManualCard

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// DepositDate
			$this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
			$this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
			$this->DepositDate->ViewCustomAttributes = "";

			// DepositToBankSelect
			if (strval($this->DepositToBankSelect->CurrentValue) <> "") {
				$this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->optionCaption($this->DepositToBankSelect->CurrentValue);
			} else {
				$this->DepositToBankSelect->ViewValue = NULL;
			}
			$this->DepositToBankSelect->ViewCustomAttributes = "";

			// DepositToBank
			$curVal = strval($this->DepositToBank->CurrentValue);
			if ($curVal <> "") {
				$this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
				if ($this->DepositToBank->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Branch_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DepositToBank->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DepositToBank->ViewValue = $this->DepositToBank->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
					}
				}
			} else {
				$this->DepositToBank->ViewValue = NULL;
			}
			$this->DepositToBank->ViewCustomAttributes = "";

			// TransferToSelect
			$this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
			$this->TransferToSelect->ViewCustomAttributes = "";

			// TransferTo
			$curVal = strval($this->TransferTo->CurrentValue);
			if ($curVal <> "") {
				$this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
				if ($this->TransferTo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TransferTo->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TransferTo->ViewValue = $this->TransferTo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
					}
				}
			} else {
				$this->TransferTo->ViewValue = NULL;
			}
			$this->TransferTo->ViewCustomAttributes = "";

			// OpeningBalance
			$this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
			$this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
			$this->OpeningBalance->ViewCustomAttributes = "";

			// Other
			$this->Other->ViewValue = $this->Other->CurrentValue;
			$this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
			$this->Other->ViewCustomAttributes = "";

			// TotalCash
			$this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
			$this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
			$this->TotalCash->ViewCustomAttributes = "";

			// Cheque
			$this->Cheque->ViewValue = $this->Cheque->CurrentValue;
			$this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
			$this->Cheque->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// NEFTRTGS
			$this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
			$this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
			$this->NEFTRTGS->ViewCustomAttributes = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
			$this->TotalTransferDepositAmount->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// CreatedUserName
			$this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
			$this->CreatedUserName->ViewCustomAttributes = "";

			// ModifiedUserName
			$this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
			$this->ModifiedUserName->ViewCustomAttributes = "";

			// A2000Count
			$this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
			$this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
			$this->A2000Count->ViewCustomAttributes = "";

			// A2000Amount
			$this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
			$this->A2000Amount->ViewValue = FormatCurrency($this->A2000Amount->ViewValue, 2, -2, -2, -2);
			$this->A2000Amount->ViewCustomAttributes = "";

			// A1000Count
			$this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
			$this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
			$this->A1000Count->ViewCustomAttributes = "";

			// A1000Amount
			$this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
			$this->A1000Amount->ViewValue = FormatCurrency($this->A1000Amount->ViewValue, 2, -2, -2, -2);
			$this->A1000Amount->ViewCustomAttributes = "";

			// A500Count
			$this->A500Count->ViewValue = $this->A500Count->CurrentValue;
			$this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
			$this->A500Count->ViewCustomAttributes = "";

			// A500Amount
			$this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
			$this->A500Amount->ViewValue = FormatCurrency($this->A500Amount->ViewValue, 2, -2, -2, -2);
			$this->A500Amount->ViewCustomAttributes = "";

			// A200Count
			$this->A200Count->ViewValue = $this->A200Count->CurrentValue;
			$this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
			$this->A200Count->ViewCustomAttributes = "";

			// A200Amount
			$this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
			$this->A200Amount->ViewValue = FormatCurrency($this->A200Amount->ViewValue, 2, -2, -2, -2);
			$this->A200Amount->ViewCustomAttributes = "";

			// A100Count
			$this->A100Count->ViewValue = $this->A100Count->CurrentValue;
			$this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
			$this->A100Count->ViewCustomAttributes = "";

			// A100Amount
			$this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
			$this->A100Amount->ViewValue = FormatCurrency($this->A100Amount->ViewValue, 2, -2, -2, -2);
			$this->A100Amount->ViewCustomAttributes = "";

			// A50Count
			$this->A50Count->ViewValue = $this->A50Count->CurrentValue;
			$this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
			$this->A50Count->ViewCustomAttributes = "";

			// A50Amount
			$this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
			$this->A50Amount->ViewValue = FormatCurrency($this->A50Amount->ViewValue, 2, -2, -2, -2);
			$this->A50Amount->ViewCustomAttributes = "";

			// A20Count
			$this->A20Count->ViewValue = $this->A20Count->CurrentValue;
			$this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
			$this->A20Count->ViewCustomAttributes = "";

			// A20Amount
			$this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
			$this->A20Amount->ViewValue = FormatCurrency($this->A20Amount->ViewValue, 2, -2, -2, -2);
			$this->A20Amount->ViewCustomAttributes = "";

			// A10Count
			$this->A10Count->ViewValue = $this->A10Count->CurrentValue;
			$this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
			$this->A10Count->ViewCustomAttributes = "";

			// A10Amount
			$this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
			$this->A10Amount->ViewValue = FormatCurrency($this->A10Amount->ViewValue, 2, -2, -2, -2);
			$this->A10Amount->ViewCustomAttributes = "";

			// BalanceAmount
			$this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
			$this->BalanceAmount->ViewValue = FormatCurrency($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
			$this->BalanceAmount->ViewCustomAttributes = "";

			// CashCollected
			$this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
			$this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
			$this->CashCollected->ViewCustomAttributes = "";

			// RTGS
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";

			// PAYTM
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// ManualCash
			$this->ManualCash->ViewValue = $this->ManualCash->CurrentValue;
			$this->ManualCash->ViewValue = FormatNumber($this->ManualCash->ViewValue, 2, -2, -2, -2);
			$this->ManualCash->ViewCustomAttributes = "";

			// ManualCard
			$this->ManualCard->ViewValue = $this->ManualCard->CurrentValue;
			$this->ManualCard->ViewValue = FormatNumber($this->ManualCard->ViewValue, 2, -2, -2, -2);
			$this->ManualCard->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// DepositDate
			$this->DepositDate->LinkCustomAttributes = "";
			$this->DepositDate->HrefValue = "";
			$this->DepositDate->TooltipValue = "";

			// DepositToBankSelect
			$this->DepositToBankSelect->LinkCustomAttributes = "";
			$this->DepositToBankSelect->HrefValue = "";
			$this->DepositToBankSelect->TooltipValue = "";

			// DepositToBank
			$this->DepositToBank->LinkCustomAttributes = "";
			$this->DepositToBank->HrefValue = "";
			$this->DepositToBank->TooltipValue = "";

			// TransferToSelect
			$this->TransferToSelect->LinkCustomAttributes = "";
			$this->TransferToSelect->HrefValue = "";
			$this->TransferToSelect->TooltipValue = "";

			// TransferTo
			$this->TransferTo->LinkCustomAttributes = "";
			$this->TransferTo->HrefValue = "";
			$this->TransferTo->TooltipValue = "";

			// OpeningBalance
			$this->OpeningBalance->LinkCustomAttributes = "";
			$this->OpeningBalance->HrefValue = "";
			$this->OpeningBalance->TooltipValue = "";

			// Other
			$this->Other->LinkCustomAttributes = "";
			$this->Other->HrefValue = "";
			$this->Other->TooltipValue = "";

			// TotalCash
			$this->TotalCash->LinkCustomAttributes = "";
			$this->TotalCash->HrefValue = "";
			$this->TotalCash->TooltipValue = "";

			// Cheque
			$this->Cheque->LinkCustomAttributes = "";
			$this->Cheque->HrefValue = "";
			$this->Cheque->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";

			// NEFTRTGS
			$this->NEFTRTGS->LinkCustomAttributes = "";
			$this->NEFTRTGS->HrefValue = "";
			$this->NEFTRTGS->TooltipValue = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->LinkCustomAttributes = "";
			$this->TotalTransferDepositAmount->HrefValue = "";
			$this->TotalTransferDepositAmount->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// CreatedUserName
			$this->CreatedUserName->LinkCustomAttributes = "";
			$this->CreatedUserName->HrefValue = "";
			$this->CreatedUserName->TooltipValue = "";

			// ModifiedUserName
			$this->ModifiedUserName->LinkCustomAttributes = "";
			$this->ModifiedUserName->HrefValue = "";
			$this->ModifiedUserName->TooltipValue = "";

			// A2000Count
			$this->A2000Count->LinkCustomAttributes = "";
			$this->A2000Count->HrefValue = "";
			$this->A2000Count->TooltipValue = "";

			// A2000Amount
			$this->A2000Amount->LinkCustomAttributes = "";
			$this->A2000Amount->HrefValue = "";
			$this->A2000Amount->TooltipValue = "";

			// A1000Count
			$this->A1000Count->LinkCustomAttributes = "";
			$this->A1000Count->HrefValue = "";
			$this->A1000Count->TooltipValue = "";

			// A1000Amount
			$this->A1000Amount->LinkCustomAttributes = "";
			$this->A1000Amount->HrefValue = "";
			$this->A1000Amount->TooltipValue = "";

			// A500Count
			$this->A500Count->LinkCustomAttributes = "";
			$this->A500Count->HrefValue = "";
			$this->A500Count->TooltipValue = "";

			// A500Amount
			$this->A500Amount->LinkCustomAttributes = "";
			$this->A500Amount->HrefValue = "";
			$this->A500Amount->TooltipValue = "";

			// A200Count
			$this->A200Count->LinkCustomAttributes = "";
			$this->A200Count->HrefValue = "";
			$this->A200Count->TooltipValue = "";

			// A200Amount
			$this->A200Amount->LinkCustomAttributes = "";
			$this->A200Amount->HrefValue = "";
			$this->A200Amount->TooltipValue = "";

			// A100Count
			$this->A100Count->LinkCustomAttributes = "";
			$this->A100Count->HrefValue = "";
			$this->A100Count->TooltipValue = "";

			// A100Amount
			$this->A100Amount->LinkCustomAttributes = "";
			$this->A100Amount->HrefValue = "";
			$this->A100Amount->TooltipValue = "";

			// A50Count
			$this->A50Count->LinkCustomAttributes = "";
			$this->A50Count->HrefValue = "";
			$this->A50Count->TooltipValue = "";

			// A50Amount
			$this->A50Amount->LinkCustomAttributes = "";
			$this->A50Amount->HrefValue = "";
			$this->A50Amount->TooltipValue = "";

			// A20Count
			$this->A20Count->LinkCustomAttributes = "";
			$this->A20Count->HrefValue = "";
			$this->A20Count->TooltipValue = "";

			// A20Amount
			$this->A20Amount->LinkCustomAttributes = "";
			$this->A20Amount->HrefValue = "";
			$this->A20Amount->TooltipValue = "";

			// A10Count
			$this->A10Count->LinkCustomAttributes = "";
			$this->A10Count->HrefValue = "";
			$this->A10Count->TooltipValue = "";

			// A10Amount
			$this->A10Amount->LinkCustomAttributes = "";
			$this->A10Amount->HrefValue = "";
			$this->A10Amount->TooltipValue = "";

			// BalanceAmount
			$this->BalanceAmount->LinkCustomAttributes = "";
			$this->BalanceAmount->HrefValue = "";
			$this->BalanceAmount->TooltipValue = "";

			// CashCollected
			$this->CashCollected->LinkCustomAttributes = "";
			$this->CashCollected->HrefValue = "";
			$this->CashCollected->TooltipValue = "";

			// RTGS
			$this->RTGS->LinkCustomAttributes = "";
			$this->RTGS->HrefValue = "";
			$this->RTGS->TooltipValue = "";

			// PAYTM
			$this->PAYTM->LinkCustomAttributes = "";
			$this->PAYTM->HrefValue = "";
			$this->PAYTM->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// ManualCash
			$this->ManualCash->LinkCustomAttributes = "";
			$this->ManualCash->HrefValue = "";
			$this->ManualCash->TooltipValue = "";

			// ManualCard
			$this->ManualCard->LinkCustomAttributes = "";
			$this->ManualCard->HrefValue = "";
			$this->ManualCard->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fdepositdetailsview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fdepositdetailsview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fdepositdetailsview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_depositdetails\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_depositdetails',hdr:ew.language.phrase('ExportToEmailText'),f:document.fdepositdetailsview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("depositdetailslist.php"), "", $this->TableVar, TRUE);
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
						case "x_DepositToBank":
							break;
						case "x_TransferTo":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class depositdetails_list extends depositdetails
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'depositdetails';

	// Page object name
	public $PageObjName = "depositdetails_list";

	// Grid form hidden field names
	public $FormName = "fdepositdetailslist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

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
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

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

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "depositdetailsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "depositdetailsdelete.php";
		$this->MultiUpdateUrl = "depositdetailsupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions();
		$this->ImportOptions->Tag = "div";
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fdepositdetailslistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $depositdetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedDateTime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ModifiedBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ModifiedDateTime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedUserName->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ModifiedUserName->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecs = 20;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
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

		// Get custom export parameters
		if ($this->isExport() && $custom <> "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

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

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->setVisibility();
		$this->DepositDate->setVisibility();
		$this->DepositToBankSelect->Visible = FALSE;
		$this->DepositToBank->Visible = FALSE;
		$this->TransferToSelect->Visible = FALSE;
		$this->TransferTo->setVisibility();
		$this->OpeningBalance->setVisibility();
		$this->Other->setVisibility();
		$this->TotalCash->setVisibility();
		$this->Cheque->setVisibility();
		$this->Card->setVisibility();
		$this->NEFTRTGS->setVisibility();
		$this->TotalTransferDepositAmount->setVisibility();
		$this->CreatedBy->Visible = FALSE;
		$this->CreatedDateTime->Visible = FALSE;
		$this->ModifiedBy->Visible = FALSE;
		$this->ModifiedDateTime->Visible = FALSE;
		$this->CreatedUserName->setVisibility();
		$this->ModifiedUserName->Visible = FALSE;
		$this->A2000Count->Visible = FALSE;
		$this->A2000Amount->Visible = FALSE;
		$this->A1000Count->Visible = FALSE;
		$this->A1000Amount->Visible = FALSE;
		$this->A500Count->Visible = FALSE;
		$this->A500Amount->Visible = FALSE;
		$this->A200Count->Visible = FALSE;
		$this->A200Amount->Visible = FALSE;
		$this->A100Count->Visible = FALSE;
		$this->A100Amount->Visible = FALSE;
		$this->A50Count->Visible = FALSE;
		$this->A50Amount->Visible = FALSE;
		$this->A20Count->Visible = FALSE;
		$this->A20Amount->Visible = FALSE;
		$this->A10Count->Visible = FALSE;
		$this->A10Amount->Visible = FALSE;
		$this->BalanceAmount->Visible = FALSE;
		$this->CashCollected->setVisibility();
		$this->RTGS->setVisibility();
		$this->PAYTM->setVisibility();
		$this->HospID->Visible = FALSE;
		$this->ManualCash->setVisibility();
		$this->ManualCard->setVisibility();
		$this->hideFieldsForAddEdit();

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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->DepositToBank);
		$this->setupLookupOptions($this->TransferTo);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall") && $this->Command <> "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->Command <> "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRec = 1;
			$this->DisplayRecs = $this->GridAddRowCount;
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			if ($this->DisplayRecs <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecs = $this->TotalRecs;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRec();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecs()
	{
		$wrk = Get(TABLE_REC_PER_PAGE, "");
		if ($wrk <> "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecs = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecs = -1;
				} else {
					$this->DisplayRecs = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecs); // Save to Session

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (SEARCH_FILTER_OPTION == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fdepositdetailslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->DepositDate->AdvancedSearch->toJson(), ","); // Field DepositDate
		$filterList = Concat($filterList, $this->DepositToBankSelect->AdvancedSearch->toJson(), ","); // Field DepositToBankSelect
		$filterList = Concat($filterList, $this->DepositToBank->AdvancedSearch->toJson(), ","); // Field DepositToBank
		$filterList = Concat($filterList, $this->TransferToSelect->AdvancedSearch->toJson(), ","); // Field TransferToSelect
		$filterList = Concat($filterList, $this->TransferTo->AdvancedSearch->toJson(), ","); // Field TransferTo
		$filterList = Concat($filterList, $this->OpeningBalance->AdvancedSearch->toJson(), ","); // Field OpeningBalance
		$filterList = Concat($filterList, $this->Other->AdvancedSearch->toJson(), ","); // Field Other
		$filterList = Concat($filterList, $this->TotalCash->AdvancedSearch->toJson(), ","); // Field TotalCash
		$filterList = Concat($filterList, $this->Cheque->AdvancedSearch->toJson(), ","); // Field Cheque
		$filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
		$filterList = Concat($filterList, $this->NEFTRTGS->AdvancedSearch->toJson(), ","); // Field NEFTRTGS
		$filterList = Concat($filterList, $this->TotalTransferDepositAmount->AdvancedSearch->toJson(), ","); // Field TotalTransferDepositAmount
		$filterList = Concat($filterList, $this->CreatedBy->AdvancedSearch->toJson(), ","); // Field CreatedBy
		$filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
		$filterList = Concat($filterList, $this->ModifiedBy->AdvancedSearch->toJson(), ","); // Field ModifiedBy
		$filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
		$filterList = Concat($filterList, $this->CreatedUserName->AdvancedSearch->toJson(), ","); // Field CreatedUserName
		$filterList = Concat($filterList, $this->ModifiedUserName->AdvancedSearch->toJson(), ","); // Field ModifiedUserName
		$filterList = Concat($filterList, $this->A2000Count->AdvancedSearch->toJson(), ","); // Field A2000Count
		$filterList = Concat($filterList, $this->A2000Amount->AdvancedSearch->toJson(), ","); // Field A2000Amount
		$filterList = Concat($filterList, $this->A1000Count->AdvancedSearch->toJson(), ","); // Field A1000Count
		$filterList = Concat($filterList, $this->A1000Amount->AdvancedSearch->toJson(), ","); // Field A1000Amount
		$filterList = Concat($filterList, $this->A500Count->AdvancedSearch->toJson(), ","); // Field A500Count
		$filterList = Concat($filterList, $this->A500Amount->AdvancedSearch->toJson(), ","); // Field A500Amount
		$filterList = Concat($filterList, $this->A200Count->AdvancedSearch->toJson(), ","); // Field A200Count
		$filterList = Concat($filterList, $this->A200Amount->AdvancedSearch->toJson(), ","); // Field A200Amount
		$filterList = Concat($filterList, $this->A100Count->AdvancedSearch->toJson(), ","); // Field A100Count
		$filterList = Concat($filterList, $this->A100Amount->AdvancedSearch->toJson(), ","); // Field A100Amount
		$filterList = Concat($filterList, $this->A50Count->AdvancedSearch->toJson(), ","); // Field A50Count
		$filterList = Concat($filterList, $this->A50Amount->AdvancedSearch->toJson(), ","); // Field A50Amount
		$filterList = Concat($filterList, $this->A20Count->AdvancedSearch->toJson(), ","); // Field A20Count
		$filterList = Concat($filterList, $this->A20Amount->AdvancedSearch->toJson(), ","); // Field A20Amount
		$filterList = Concat($filterList, $this->A10Count->AdvancedSearch->toJson(), ","); // Field A10Count
		$filterList = Concat($filterList, $this->A10Amount->AdvancedSearch->toJson(), ","); // Field A10Amount
		$filterList = Concat($filterList, $this->BalanceAmount->AdvancedSearch->toJson(), ","); // Field BalanceAmount
		$filterList = Concat($filterList, $this->CashCollected->AdvancedSearch->toJson(), ","); // Field CashCollected
		$filterList = Concat($filterList, $this->RTGS->AdvancedSearch->toJson(), ","); // Field RTGS
		$filterList = Concat($filterList, $this->PAYTM->AdvancedSearch->toJson(), ","); // Field PAYTM
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->ManualCash->AdvancedSearch->toJson(), ","); // Field ManualCash
		$filterList = Concat($filterList, $this->ManualCard->AdvancedSearch->toJson(), ","); // Field ManualCard
		if ($this->BasicSearch->Keyword <> "") {
			$wrk = "\"" . TABLE_BASIC_SEARCH . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . TABLE_BASIC_SEARCH_TYPE . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList <> "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList <> "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList <> "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fdepositdetailslistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field DepositDate
		$this->DepositDate->AdvancedSearch->SearchValue = @$filter["x_DepositDate"];
		$this->DepositDate->AdvancedSearch->SearchOperator = @$filter["z_DepositDate"];
		$this->DepositDate->AdvancedSearch->SearchCondition = @$filter["v_DepositDate"];
		$this->DepositDate->AdvancedSearch->SearchValue2 = @$filter["y_DepositDate"];
		$this->DepositDate->AdvancedSearch->SearchOperator2 = @$filter["w_DepositDate"];
		$this->DepositDate->AdvancedSearch->save();

		// Field DepositToBankSelect
		$this->DepositToBankSelect->AdvancedSearch->SearchValue = @$filter["x_DepositToBankSelect"];
		$this->DepositToBankSelect->AdvancedSearch->SearchOperator = @$filter["z_DepositToBankSelect"];
		$this->DepositToBankSelect->AdvancedSearch->SearchCondition = @$filter["v_DepositToBankSelect"];
		$this->DepositToBankSelect->AdvancedSearch->SearchValue2 = @$filter["y_DepositToBankSelect"];
		$this->DepositToBankSelect->AdvancedSearch->SearchOperator2 = @$filter["w_DepositToBankSelect"];
		$this->DepositToBankSelect->AdvancedSearch->save();

		// Field DepositToBank
		$this->DepositToBank->AdvancedSearch->SearchValue = @$filter["x_DepositToBank"];
		$this->DepositToBank->AdvancedSearch->SearchOperator = @$filter["z_DepositToBank"];
		$this->DepositToBank->AdvancedSearch->SearchCondition = @$filter["v_DepositToBank"];
		$this->DepositToBank->AdvancedSearch->SearchValue2 = @$filter["y_DepositToBank"];
		$this->DepositToBank->AdvancedSearch->SearchOperator2 = @$filter["w_DepositToBank"];
		$this->DepositToBank->AdvancedSearch->save();

		// Field TransferToSelect
		$this->TransferToSelect->AdvancedSearch->SearchValue = @$filter["x_TransferToSelect"];
		$this->TransferToSelect->AdvancedSearch->SearchOperator = @$filter["z_TransferToSelect"];
		$this->TransferToSelect->AdvancedSearch->SearchCondition = @$filter["v_TransferToSelect"];
		$this->TransferToSelect->AdvancedSearch->SearchValue2 = @$filter["y_TransferToSelect"];
		$this->TransferToSelect->AdvancedSearch->SearchOperator2 = @$filter["w_TransferToSelect"];
		$this->TransferToSelect->AdvancedSearch->save();

		// Field TransferTo
		$this->TransferTo->AdvancedSearch->SearchValue = @$filter["x_TransferTo"];
		$this->TransferTo->AdvancedSearch->SearchOperator = @$filter["z_TransferTo"];
		$this->TransferTo->AdvancedSearch->SearchCondition = @$filter["v_TransferTo"];
		$this->TransferTo->AdvancedSearch->SearchValue2 = @$filter["y_TransferTo"];
		$this->TransferTo->AdvancedSearch->SearchOperator2 = @$filter["w_TransferTo"];
		$this->TransferTo->AdvancedSearch->save();

		// Field OpeningBalance
		$this->OpeningBalance->AdvancedSearch->SearchValue = @$filter["x_OpeningBalance"];
		$this->OpeningBalance->AdvancedSearch->SearchOperator = @$filter["z_OpeningBalance"];
		$this->OpeningBalance->AdvancedSearch->SearchCondition = @$filter["v_OpeningBalance"];
		$this->OpeningBalance->AdvancedSearch->SearchValue2 = @$filter["y_OpeningBalance"];
		$this->OpeningBalance->AdvancedSearch->SearchOperator2 = @$filter["w_OpeningBalance"];
		$this->OpeningBalance->AdvancedSearch->save();

		// Field Other
		$this->Other->AdvancedSearch->SearchValue = @$filter["x_Other"];
		$this->Other->AdvancedSearch->SearchOperator = @$filter["z_Other"];
		$this->Other->AdvancedSearch->SearchCondition = @$filter["v_Other"];
		$this->Other->AdvancedSearch->SearchValue2 = @$filter["y_Other"];
		$this->Other->AdvancedSearch->SearchOperator2 = @$filter["w_Other"];
		$this->Other->AdvancedSearch->save();

		// Field TotalCash
		$this->TotalCash->AdvancedSearch->SearchValue = @$filter["x_TotalCash"];
		$this->TotalCash->AdvancedSearch->SearchOperator = @$filter["z_TotalCash"];
		$this->TotalCash->AdvancedSearch->SearchCondition = @$filter["v_TotalCash"];
		$this->TotalCash->AdvancedSearch->SearchValue2 = @$filter["y_TotalCash"];
		$this->TotalCash->AdvancedSearch->SearchOperator2 = @$filter["w_TotalCash"];
		$this->TotalCash->AdvancedSearch->save();

		// Field Cheque
		$this->Cheque->AdvancedSearch->SearchValue = @$filter["x_Cheque"];
		$this->Cheque->AdvancedSearch->SearchOperator = @$filter["z_Cheque"];
		$this->Cheque->AdvancedSearch->SearchCondition = @$filter["v_Cheque"];
		$this->Cheque->AdvancedSearch->SearchValue2 = @$filter["y_Cheque"];
		$this->Cheque->AdvancedSearch->SearchOperator2 = @$filter["w_Cheque"];
		$this->Cheque->AdvancedSearch->save();

		// Field Card
		$this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
		$this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
		$this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
		$this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
		$this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
		$this->Card->AdvancedSearch->save();

		// Field NEFTRTGS
		$this->NEFTRTGS->AdvancedSearch->SearchValue = @$filter["x_NEFTRTGS"];
		$this->NEFTRTGS->AdvancedSearch->SearchOperator = @$filter["z_NEFTRTGS"];
		$this->NEFTRTGS->AdvancedSearch->SearchCondition = @$filter["v_NEFTRTGS"];
		$this->NEFTRTGS->AdvancedSearch->SearchValue2 = @$filter["y_NEFTRTGS"];
		$this->NEFTRTGS->AdvancedSearch->SearchOperator2 = @$filter["w_NEFTRTGS"];
		$this->NEFTRTGS->AdvancedSearch->save();

		// Field TotalTransferDepositAmount
		$this->TotalTransferDepositAmount->AdvancedSearch->SearchValue = @$filter["x_TotalTransferDepositAmount"];
		$this->TotalTransferDepositAmount->AdvancedSearch->SearchOperator = @$filter["z_TotalTransferDepositAmount"];
		$this->TotalTransferDepositAmount->AdvancedSearch->SearchCondition = @$filter["v_TotalTransferDepositAmount"];
		$this->TotalTransferDepositAmount->AdvancedSearch->SearchValue2 = @$filter["y_TotalTransferDepositAmount"];
		$this->TotalTransferDepositAmount->AdvancedSearch->SearchOperator2 = @$filter["w_TotalTransferDepositAmount"];
		$this->TotalTransferDepositAmount->AdvancedSearch->save();

		// Field CreatedBy
		$this->CreatedBy->AdvancedSearch->SearchValue = @$filter["x_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator = @$filter["z_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchCondition = @$filter["v_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchValue2 = @$filter["y_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->save();

		// Field CreatedDateTime
		$this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->save();

		// Field ModifiedBy
		$this->ModifiedBy->AdvancedSearch->SearchValue = @$filter["x_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator = @$filter["z_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchCondition = @$filter["v_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->save();

		// Field ModifiedDateTime
		$this->ModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->save();

		// Field CreatedUserName
		$this->CreatedUserName->AdvancedSearch->SearchValue = @$filter["x_CreatedUserName"];
		$this->CreatedUserName->AdvancedSearch->SearchOperator = @$filter["z_CreatedUserName"];
		$this->CreatedUserName->AdvancedSearch->SearchCondition = @$filter["v_CreatedUserName"];
		$this->CreatedUserName->AdvancedSearch->SearchValue2 = @$filter["y_CreatedUserName"];
		$this->CreatedUserName->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedUserName"];
		$this->CreatedUserName->AdvancedSearch->save();

		// Field ModifiedUserName
		$this->ModifiedUserName->AdvancedSearch->SearchValue = @$filter["x_ModifiedUserName"];
		$this->ModifiedUserName->AdvancedSearch->SearchOperator = @$filter["z_ModifiedUserName"];
		$this->ModifiedUserName->AdvancedSearch->SearchCondition = @$filter["v_ModifiedUserName"];
		$this->ModifiedUserName->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedUserName"];
		$this->ModifiedUserName->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedUserName"];
		$this->ModifiedUserName->AdvancedSearch->save();

		// Field A2000Count
		$this->A2000Count->AdvancedSearch->SearchValue = @$filter["x_A2000Count"];
		$this->A2000Count->AdvancedSearch->SearchOperator = @$filter["z_A2000Count"];
		$this->A2000Count->AdvancedSearch->SearchCondition = @$filter["v_A2000Count"];
		$this->A2000Count->AdvancedSearch->SearchValue2 = @$filter["y_A2000Count"];
		$this->A2000Count->AdvancedSearch->SearchOperator2 = @$filter["w_A2000Count"];
		$this->A2000Count->AdvancedSearch->save();

		// Field A2000Amount
		$this->A2000Amount->AdvancedSearch->SearchValue = @$filter["x_A2000Amount"];
		$this->A2000Amount->AdvancedSearch->SearchOperator = @$filter["z_A2000Amount"];
		$this->A2000Amount->AdvancedSearch->SearchCondition = @$filter["v_A2000Amount"];
		$this->A2000Amount->AdvancedSearch->SearchValue2 = @$filter["y_A2000Amount"];
		$this->A2000Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A2000Amount"];
		$this->A2000Amount->AdvancedSearch->save();

		// Field A1000Count
		$this->A1000Count->AdvancedSearch->SearchValue = @$filter["x_A1000Count"];
		$this->A1000Count->AdvancedSearch->SearchOperator = @$filter["z_A1000Count"];
		$this->A1000Count->AdvancedSearch->SearchCondition = @$filter["v_A1000Count"];
		$this->A1000Count->AdvancedSearch->SearchValue2 = @$filter["y_A1000Count"];
		$this->A1000Count->AdvancedSearch->SearchOperator2 = @$filter["w_A1000Count"];
		$this->A1000Count->AdvancedSearch->save();

		// Field A1000Amount
		$this->A1000Amount->AdvancedSearch->SearchValue = @$filter["x_A1000Amount"];
		$this->A1000Amount->AdvancedSearch->SearchOperator = @$filter["z_A1000Amount"];
		$this->A1000Amount->AdvancedSearch->SearchCondition = @$filter["v_A1000Amount"];
		$this->A1000Amount->AdvancedSearch->SearchValue2 = @$filter["y_A1000Amount"];
		$this->A1000Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A1000Amount"];
		$this->A1000Amount->AdvancedSearch->save();

		// Field A500Count
		$this->A500Count->AdvancedSearch->SearchValue = @$filter["x_A500Count"];
		$this->A500Count->AdvancedSearch->SearchOperator = @$filter["z_A500Count"];
		$this->A500Count->AdvancedSearch->SearchCondition = @$filter["v_A500Count"];
		$this->A500Count->AdvancedSearch->SearchValue2 = @$filter["y_A500Count"];
		$this->A500Count->AdvancedSearch->SearchOperator2 = @$filter["w_A500Count"];
		$this->A500Count->AdvancedSearch->save();

		// Field A500Amount
		$this->A500Amount->AdvancedSearch->SearchValue = @$filter["x_A500Amount"];
		$this->A500Amount->AdvancedSearch->SearchOperator = @$filter["z_A500Amount"];
		$this->A500Amount->AdvancedSearch->SearchCondition = @$filter["v_A500Amount"];
		$this->A500Amount->AdvancedSearch->SearchValue2 = @$filter["y_A500Amount"];
		$this->A500Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A500Amount"];
		$this->A500Amount->AdvancedSearch->save();

		// Field A200Count
		$this->A200Count->AdvancedSearch->SearchValue = @$filter["x_A200Count"];
		$this->A200Count->AdvancedSearch->SearchOperator = @$filter["z_A200Count"];
		$this->A200Count->AdvancedSearch->SearchCondition = @$filter["v_A200Count"];
		$this->A200Count->AdvancedSearch->SearchValue2 = @$filter["y_A200Count"];
		$this->A200Count->AdvancedSearch->SearchOperator2 = @$filter["w_A200Count"];
		$this->A200Count->AdvancedSearch->save();

		// Field A200Amount
		$this->A200Amount->AdvancedSearch->SearchValue = @$filter["x_A200Amount"];
		$this->A200Amount->AdvancedSearch->SearchOperator = @$filter["z_A200Amount"];
		$this->A200Amount->AdvancedSearch->SearchCondition = @$filter["v_A200Amount"];
		$this->A200Amount->AdvancedSearch->SearchValue2 = @$filter["y_A200Amount"];
		$this->A200Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A200Amount"];
		$this->A200Amount->AdvancedSearch->save();

		// Field A100Count
		$this->A100Count->AdvancedSearch->SearchValue = @$filter["x_A100Count"];
		$this->A100Count->AdvancedSearch->SearchOperator = @$filter["z_A100Count"];
		$this->A100Count->AdvancedSearch->SearchCondition = @$filter["v_A100Count"];
		$this->A100Count->AdvancedSearch->SearchValue2 = @$filter["y_A100Count"];
		$this->A100Count->AdvancedSearch->SearchOperator2 = @$filter["w_A100Count"];
		$this->A100Count->AdvancedSearch->save();

		// Field A100Amount
		$this->A100Amount->AdvancedSearch->SearchValue = @$filter["x_A100Amount"];
		$this->A100Amount->AdvancedSearch->SearchOperator = @$filter["z_A100Amount"];
		$this->A100Amount->AdvancedSearch->SearchCondition = @$filter["v_A100Amount"];
		$this->A100Amount->AdvancedSearch->SearchValue2 = @$filter["y_A100Amount"];
		$this->A100Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A100Amount"];
		$this->A100Amount->AdvancedSearch->save();

		// Field A50Count
		$this->A50Count->AdvancedSearch->SearchValue = @$filter["x_A50Count"];
		$this->A50Count->AdvancedSearch->SearchOperator = @$filter["z_A50Count"];
		$this->A50Count->AdvancedSearch->SearchCondition = @$filter["v_A50Count"];
		$this->A50Count->AdvancedSearch->SearchValue2 = @$filter["y_A50Count"];
		$this->A50Count->AdvancedSearch->SearchOperator2 = @$filter["w_A50Count"];
		$this->A50Count->AdvancedSearch->save();

		// Field A50Amount
		$this->A50Amount->AdvancedSearch->SearchValue = @$filter["x_A50Amount"];
		$this->A50Amount->AdvancedSearch->SearchOperator = @$filter["z_A50Amount"];
		$this->A50Amount->AdvancedSearch->SearchCondition = @$filter["v_A50Amount"];
		$this->A50Amount->AdvancedSearch->SearchValue2 = @$filter["y_A50Amount"];
		$this->A50Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A50Amount"];
		$this->A50Amount->AdvancedSearch->save();

		// Field A20Count
		$this->A20Count->AdvancedSearch->SearchValue = @$filter["x_A20Count"];
		$this->A20Count->AdvancedSearch->SearchOperator = @$filter["z_A20Count"];
		$this->A20Count->AdvancedSearch->SearchCondition = @$filter["v_A20Count"];
		$this->A20Count->AdvancedSearch->SearchValue2 = @$filter["y_A20Count"];
		$this->A20Count->AdvancedSearch->SearchOperator2 = @$filter["w_A20Count"];
		$this->A20Count->AdvancedSearch->save();

		// Field A20Amount
		$this->A20Amount->AdvancedSearch->SearchValue = @$filter["x_A20Amount"];
		$this->A20Amount->AdvancedSearch->SearchOperator = @$filter["z_A20Amount"];
		$this->A20Amount->AdvancedSearch->SearchCondition = @$filter["v_A20Amount"];
		$this->A20Amount->AdvancedSearch->SearchValue2 = @$filter["y_A20Amount"];
		$this->A20Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A20Amount"];
		$this->A20Amount->AdvancedSearch->save();

		// Field A10Count
		$this->A10Count->AdvancedSearch->SearchValue = @$filter["x_A10Count"];
		$this->A10Count->AdvancedSearch->SearchOperator = @$filter["z_A10Count"];
		$this->A10Count->AdvancedSearch->SearchCondition = @$filter["v_A10Count"];
		$this->A10Count->AdvancedSearch->SearchValue2 = @$filter["y_A10Count"];
		$this->A10Count->AdvancedSearch->SearchOperator2 = @$filter["w_A10Count"];
		$this->A10Count->AdvancedSearch->save();

		// Field A10Amount
		$this->A10Amount->AdvancedSearch->SearchValue = @$filter["x_A10Amount"];
		$this->A10Amount->AdvancedSearch->SearchOperator = @$filter["z_A10Amount"];
		$this->A10Amount->AdvancedSearch->SearchCondition = @$filter["v_A10Amount"];
		$this->A10Amount->AdvancedSearch->SearchValue2 = @$filter["y_A10Amount"];
		$this->A10Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A10Amount"];
		$this->A10Amount->AdvancedSearch->save();

		// Field BalanceAmount
		$this->BalanceAmount->AdvancedSearch->SearchValue = @$filter["x_BalanceAmount"];
		$this->BalanceAmount->AdvancedSearch->SearchOperator = @$filter["z_BalanceAmount"];
		$this->BalanceAmount->AdvancedSearch->SearchCondition = @$filter["v_BalanceAmount"];
		$this->BalanceAmount->AdvancedSearch->SearchValue2 = @$filter["y_BalanceAmount"];
		$this->BalanceAmount->AdvancedSearch->SearchOperator2 = @$filter["w_BalanceAmount"];
		$this->BalanceAmount->AdvancedSearch->save();

		// Field CashCollected
		$this->CashCollected->AdvancedSearch->SearchValue = @$filter["x_CashCollected"];
		$this->CashCollected->AdvancedSearch->SearchOperator = @$filter["z_CashCollected"];
		$this->CashCollected->AdvancedSearch->SearchCondition = @$filter["v_CashCollected"];
		$this->CashCollected->AdvancedSearch->SearchValue2 = @$filter["y_CashCollected"];
		$this->CashCollected->AdvancedSearch->SearchOperator2 = @$filter["w_CashCollected"];
		$this->CashCollected->AdvancedSearch->save();

		// Field RTGS
		$this->RTGS->AdvancedSearch->SearchValue = @$filter["x_RTGS"];
		$this->RTGS->AdvancedSearch->SearchOperator = @$filter["z_RTGS"];
		$this->RTGS->AdvancedSearch->SearchCondition = @$filter["v_RTGS"];
		$this->RTGS->AdvancedSearch->SearchValue2 = @$filter["y_RTGS"];
		$this->RTGS->AdvancedSearch->SearchOperator2 = @$filter["w_RTGS"];
		$this->RTGS->AdvancedSearch->save();

		// Field PAYTM
		$this->PAYTM->AdvancedSearch->SearchValue = @$filter["x_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchOperator = @$filter["z_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchCondition = @$filter["v_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchValue2 = @$filter["y_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchOperator2 = @$filter["w_PAYTM"];
		$this->PAYTM->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field ManualCash
		$this->ManualCash->AdvancedSearch->SearchValue = @$filter["x_ManualCash"];
		$this->ManualCash->AdvancedSearch->SearchOperator = @$filter["z_ManualCash"];
		$this->ManualCash->AdvancedSearch->SearchCondition = @$filter["v_ManualCash"];
		$this->ManualCash->AdvancedSearch->SearchValue2 = @$filter["y_ManualCash"];
		$this->ManualCash->AdvancedSearch->SearchOperator2 = @$filter["w_ManualCash"];
		$this->ManualCash->AdvancedSearch->save();

		// Field ManualCard
		$this->ManualCard->AdvancedSearch->SearchValue = @$filter["x_ManualCard"];
		$this->ManualCard->AdvancedSearch->SearchOperator = @$filter["z_ManualCard"];
		$this->ManualCard->AdvancedSearch->SearchCondition = @$filter["v_ManualCard"];
		$this->ManualCard->AdvancedSearch->SearchValue2 = @$filter["y_ManualCard"];
		$this->ManualCard->AdvancedSearch->SearchOperator2 = @$filter["w_ManualCard"];
		$this->ManualCard->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->DepositToBankSelect, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DepositToBank, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TransferToSelect, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TransferTo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OpeningBalance, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Other, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TotalCash, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Cheque, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Card, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NEFTRTGS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TotalTransferDepositAmount, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CreatedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModifiedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CreatedUserName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModifiedUserName, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		global $BASIC_SEARCH_IGNORE_PATTERN;
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = array(); // Array for SQL parts
		$arCond = array(); // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if ($BASIC_SEARCH_IGNORE_PATTERN <> "") {
				$keyword = preg_replace($BASIC_SEARCH_IGNORE_PATTERN, "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = array($keyword);
			}
			foreach ($ar as $keyword) {
				if ($keyword <> "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == NULL_VALUE) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == NOT_NULL_VALUE) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk <> "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] <> "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql <> "") {
			if ($where <> "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword <> "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword <> "") {
						if ($searchStr <> "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql(array($keyword), $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, array("", "reset", "resetall")))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->DepositDate); // DepositDate
			$this->updateSort($this->TransferTo); // TransferTo
			$this->updateSort($this->OpeningBalance); // OpeningBalance
			$this->updateSort($this->Other); // Other
			$this->updateSort($this->TotalCash); // TotalCash
			$this->updateSort($this->Cheque); // Cheque
			$this->updateSort($this->Card); // Card
			$this->updateSort($this->NEFTRTGS); // NEFTRTGS
			$this->updateSort($this->TotalTransferDepositAmount); // TotalTransferDepositAmount
			$this->updateSort($this->CreatedUserName); // CreatedUserName
			$this->updateSort($this->CashCollected); // CashCollected
			$this->updateSort($this->RTGS); // RTGS
			$this->updateSort($this->PAYTM); // PAYTM
			$this->updateSort($this->ManualCash); // ManualCash
			$this->updateSort($this->ManualCard); // ManualCard
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->DepositDate->setSort("");
				$this->TransferTo->setSort("");
				$this->OpeningBalance->setSort("");
				$this->Other->setSort("");
				$this->TotalCash->setSort("");
				$this->Cheque->setSort("");
				$this->Card->setSort("");
				$this->NEFTRTGS->setSort("");
				$this->TotalTransferDepositAmount->setSort("");
				$this->CreatedUserName->setSort("");
				$this->CashCollected->setSort("");
				$this->RTGS->setSort("");
				$this->PAYTM->setSort("");
				$this->ManualCash->setSort("");
				$this->ManualCard->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = TRUE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew.selectAllKey(this);\">";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = TRUE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// "view"
		$opt = &$this->ListOptions->Items["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = &$this->ListOptions->Items["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

		// Set up list action buttons
		$opt = &$this->ListOptions->getItem("listactions");
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $Language->phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = &$this->ListOptions->Items["checkbox"];
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = TRUE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fdepositdetailslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fdepositdetailslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fdepositdetailslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->getItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter <> "" && $userAction <> "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions->Items[$userAction]->Caption;
				if (!$this->ListActions->Items[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere <> "") ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fdepositdetailslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}
	protected function setupListOptionsExt()
	{
		global $Security, $Language;

		// Hide detail items for dropdown if necessary
		$this->ListOptions->hideDetailItemsForDropDown();
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(TABLE_BASIC_SEARCH, ""), FALSE);
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(TABLE_BASIC_SEARCH_TYPE, ""), FALSE);
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

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

			// CreatedUserName
			$this->CreatedUserName->LinkCustomAttributes = "";
			$this->CreatedUserName->HrefValue = "";
			$this->CreatedUserName->TooltipValue = "";

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
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fdepositdetailslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fdepositdetailslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fdepositdetailslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
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
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = TRUE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = "";
		$item->Body = "<button id=\"emf_depositdetails\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_depositdetails',hdr:ew.language.phrase('ExportToEmailText'),f:document.fdepositdetailslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
		$selectLimit = $this->UseSelectLimit;

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

		// Export all
		if ($this->ExportAll) {
			set_time_limit(EXPORT_ALL_TIME_LIMIT);
			$this->DisplayRecs = $this->TotalRecs;
			$this->StopRec = $this->TotalRecs;
		} else { // Export one page only
			$this->setupStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecs <= 0) {
				$this->StopRec = $this->TotalRecs;
			} else {
				$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs <= 0 ? $this->TotalRecs : $this->DisplayRecs);
		$this->ExportDoc = GetExportDocument($this, "h");
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
		$this->exportDocument($doc, $rs, $this->StartRec, $this->StopRec, "");
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
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
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

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
}
?>
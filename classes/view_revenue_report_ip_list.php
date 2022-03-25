<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_revenue_report_ip_list extends view_revenue_report_ip
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_revenue_report_ip';

	// Page object name
	public $PageObjName = "view_revenue_report_ip_list";

	// Grid form hidden field names
	public $FormName = "fview_revenue_report_iplist";
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

		// Table object (view_revenue_report_ip)
		if (!isset($GLOBALS["view_revenue_report_ip"]) || get_class($GLOBALS["view_revenue_report_ip"]) == PROJECT_NAMESPACE . "view_revenue_report_ip") {
			$GLOBALS["view_revenue_report_ip"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_revenue_report_ip"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_revenue_report_ipadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_revenue_report_ipdelete.php";
		$this->MultiUpdateUrl = "view_revenue_report_ipupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_revenue_report_ip');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_revenue_report_iplistsrch";

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
		global $EXPORT, $view_revenue_report_ip;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_revenue_report_ip);
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
		$this->DATE->setVisibility();
		$this->BillNumber->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->RefferedBy->setVisibility();
		$this->CASES->setVisibility();
		$this->WARD->setVisibility();
		$this->OT->setVisibility();
		$this->IMPLANT->setVisibility();
		$this->LAB->setVisibility();
		$this->PHARMACY->setVisibility();
		$this->OUT_SIDE_DRS_VISIT_NAME->Visible = FALSE;
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->setVisibility();
		$this->PHYSIO->Visible = FALSE;
		$this->PHYSIO_Amount->setVisibility();
		$this->SURGEON->Visible = FALSE;
		$this->SURGEON_Amount->setVisibility();
		$this->ASST_SURGEON->Visible = FALSE;
		$this->ASST_SURGEON_Amount->setVisibility();
		$this->ANESTHETIST->Visible = FALSE;
		$this->ANESTHETIST_Amount->setVisibility();
		$this->Others->setVisibility();
		$this->Other_Services->Visible = FALSE;
		$this->Amount->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Cash->setVisibility();
		$this->Card->setVisibility();
		$this->Remarks->Visible = FALSE;
		$this->DiscountRemarks->Visible = FALSE;
		$this->HospID->setVisibility();
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
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

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

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
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

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
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
		if (count($arKeyFlds) >= 0) {
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_revenue_report_iplistsrch");
		$filterList = Concat($filterList, $this->DATE->AdvancedSearch->toJson(), ","); // Field DATE
		$filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
		$filterList = Concat($filterList, $this->CASES->AdvancedSearch->toJson(), ","); // Field CASES
		$filterList = Concat($filterList, $this->WARD->AdvancedSearch->toJson(), ","); // Field WARD
		$filterList = Concat($filterList, $this->OT->AdvancedSearch->toJson(), ","); // Field OT
		$filterList = Concat($filterList, $this->IMPLANT->AdvancedSearch->toJson(), ","); // Field IMPLANT
		$filterList = Concat($filterList, $this->LAB->AdvancedSearch->toJson(), ","); // Field LAB
		$filterList = Concat($filterList, $this->PHARMACY->AdvancedSearch->toJson(), ","); // Field PHARMACY
		$filterList = Concat($filterList, $this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->toJson(), ","); // Field OUT SIDE DRS VISIT NAME
		$filterList = Concat($filterList, $this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->toJson(), ","); // Field OUT SIDE DRS VISIT NAME Amount
		$filterList = Concat($filterList, $this->PHYSIO->AdvancedSearch->toJson(), ","); // Field PHYSIO
		$filterList = Concat($filterList, $this->PHYSIO_Amount->AdvancedSearch->toJson(), ","); // Field PHYSIO Amount
		$filterList = Concat($filterList, $this->SURGEON->AdvancedSearch->toJson(), ","); // Field SURGEON
		$filterList = Concat($filterList, $this->SURGEON_Amount->AdvancedSearch->toJson(), ","); // Field SURGEON Amount
		$filterList = Concat($filterList, $this->ASST_SURGEON->AdvancedSearch->toJson(), ","); // Field ASST SURGEON
		$filterList = Concat($filterList, $this->ASST_SURGEON_Amount->AdvancedSearch->toJson(), ","); // Field ASST SURGEON Amount
		$filterList = Concat($filterList, $this->ANESTHETIST->AdvancedSearch->toJson(), ","); // Field ANESTHETIST
		$filterList = Concat($filterList, $this->ANESTHETIST_Amount->AdvancedSearch->toJson(), ","); // Field ANESTHETIST Amount
		$filterList = Concat($filterList, $this->Others->AdvancedSearch->toJson(), ","); // Field Others
		$filterList = Concat($filterList, $this->Other_Services->AdvancedSearch->toJson(), ","); // Field Other Services
		$filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
		$filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
		$filterList = Concat($filterList, $this->Cash->AdvancedSearch->toJson(), ","); // Field Cash
		$filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_revenue_report_iplistsrch", $filters);
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

		// Field DATE
		$this->DATE->AdvancedSearch->SearchValue = @$filter["x_DATE"];
		$this->DATE->AdvancedSearch->SearchOperator = @$filter["z_DATE"];
		$this->DATE->AdvancedSearch->SearchCondition = @$filter["v_DATE"];
		$this->DATE->AdvancedSearch->SearchValue2 = @$filter["y_DATE"];
		$this->DATE->AdvancedSearch->SearchOperator2 = @$filter["w_DATE"];
		$this->DATE->AdvancedSearch->save();

		// Field BillNumber
		$this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
		$this->BillNumber->AdvancedSearch->save();

		// Field PatientId
		$this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
		$this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
		$this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
		$this->PatientId->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field RefferedBy
		$this->RefferedBy->AdvancedSearch->SearchValue = @$filter["x_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator = @$filter["z_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchCondition = @$filter["v_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchValue2 = @$filter["y_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->save();

		// Field CASES
		$this->CASES->AdvancedSearch->SearchValue = @$filter["x_CASES"];
		$this->CASES->AdvancedSearch->SearchOperator = @$filter["z_CASES"];
		$this->CASES->AdvancedSearch->SearchCondition = @$filter["v_CASES"];
		$this->CASES->AdvancedSearch->SearchValue2 = @$filter["y_CASES"];
		$this->CASES->AdvancedSearch->SearchOperator2 = @$filter["w_CASES"];
		$this->CASES->AdvancedSearch->save();

		// Field WARD
		$this->WARD->AdvancedSearch->SearchValue = @$filter["x_WARD"];
		$this->WARD->AdvancedSearch->SearchOperator = @$filter["z_WARD"];
		$this->WARD->AdvancedSearch->SearchCondition = @$filter["v_WARD"];
		$this->WARD->AdvancedSearch->SearchValue2 = @$filter["y_WARD"];
		$this->WARD->AdvancedSearch->SearchOperator2 = @$filter["w_WARD"];
		$this->WARD->AdvancedSearch->save();

		// Field OT
		$this->OT->AdvancedSearch->SearchValue = @$filter["x_OT"];
		$this->OT->AdvancedSearch->SearchOperator = @$filter["z_OT"];
		$this->OT->AdvancedSearch->SearchCondition = @$filter["v_OT"];
		$this->OT->AdvancedSearch->SearchValue2 = @$filter["y_OT"];
		$this->OT->AdvancedSearch->SearchOperator2 = @$filter["w_OT"];
		$this->OT->AdvancedSearch->save();

		// Field IMPLANT
		$this->IMPLANT->AdvancedSearch->SearchValue = @$filter["x_IMPLANT"];
		$this->IMPLANT->AdvancedSearch->SearchOperator = @$filter["z_IMPLANT"];
		$this->IMPLANT->AdvancedSearch->SearchCondition = @$filter["v_IMPLANT"];
		$this->IMPLANT->AdvancedSearch->SearchValue2 = @$filter["y_IMPLANT"];
		$this->IMPLANT->AdvancedSearch->SearchOperator2 = @$filter["w_IMPLANT"];
		$this->IMPLANT->AdvancedSearch->save();

		// Field LAB
		$this->LAB->AdvancedSearch->SearchValue = @$filter["x_LAB"];
		$this->LAB->AdvancedSearch->SearchOperator = @$filter["z_LAB"];
		$this->LAB->AdvancedSearch->SearchCondition = @$filter["v_LAB"];
		$this->LAB->AdvancedSearch->SearchValue2 = @$filter["y_LAB"];
		$this->LAB->AdvancedSearch->SearchOperator2 = @$filter["w_LAB"];
		$this->LAB->AdvancedSearch->save();

		// Field PHARMACY
		$this->PHARMACY->AdvancedSearch->SearchValue = @$filter["x_PHARMACY"];
		$this->PHARMACY->AdvancedSearch->SearchOperator = @$filter["z_PHARMACY"];
		$this->PHARMACY->AdvancedSearch->SearchCondition = @$filter["v_PHARMACY"];
		$this->PHARMACY->AdvancedSearch->SearchValue2 = @$filter["y_PHARMACY"];
		$this->PHARMACY->AdvancedSearch->SearchOperator2 = @$filter["w_PHARMACY"];
		$this->PHARMACY->AdvancedSearch->save();

		// Field OUT SIDE DRS VISIT NAME
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchValue = @$filter["x_OUT_SIDE_DRS_VISIT_NAME"];
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchOperator = @$filter["z_OUT_SIDE_DRS_VISIT_NAME"];
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchCondition = @$filter["v_OUT_SIDE_DRS_VISIT_NAME"];
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchValue2 = @$filter["y_OUT_SIDE_DRS_VISIT_NAME"];
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchOperator2 = @$filter["w_OUT_SIDE_DRS_VISIT_NAME"];
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->save();

		// Field OUT SIDE DRS VISIT NAME Amount
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchValue = @$filter["x_OUT_SIDE_DRS_VISIT_NAME_Amount"];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchOperator = @$filter["z_OUT_SIDE_DRS_VISIT_NAME_Amount"];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchCondition = @$filter["v_OUT_SIDE_DRS_VISIT_NAME_Amount"];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchValue2 = @$filter["y_OUT_SIDE_DRS_VISIT_NAME_Amount"];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchOperator2 = @$filter["w_OUT_SIDE_DRS_VISIT_NAME_Amount"];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->save();

		// Field PHYSIO
		$this->PHYSIO->AdvancedSearch->SearchValue = @$filter["x_PHYSIO"];
		$this->PHYSIO->AdvancedSearch->SearchOperator = @$filter["z_PHYSIO"];
		$this->PHYSIO->AdvancedSearch->SearchCondition = @$filter["v_PHYSIO"];
		$this->PHYSIO->AdvancedSearch->SearchValue2 = @$filter["y_PHYSIO"];
		$this->PHYSIO->AdvancedSearch->SearchOperator2 = @$filter["w_PHYSIO"];
		$this->PHYSIO->AdvancedSearch->save();

		// Field PHYSIO Amount
		$this->PHYSIO_Amount->AdvancedSearch->SearchValue = @$filter["x_PHYSIO_Amount"];
		$this->PHYSIO_Amount->AdvancedSearch->SearchOperator = @$filter["z_PHYSIO_Amount"];
		$this->PHYSIO_Amount->AdvancedSearch->SearchCondition = @$filter["v_PHYSIO_Amount"];
		$this->PHYSIO_Amount->AdvancedSearch->SearchValue2 = @$filter["y_PHYSIO_Amount"];
		$this->PHYSIO_Amount->AdvancedSearch->SearchOperator2 = @$filter["w_PHYSIO_Amount"];
		$this->PHYSIO_Amount->AdvancedSearch->save();

		// Field SURGEON
		$this->SURGEON->AdvancedSearch->SearchValue = @$filter["x_SURGEON"];
		$this->SURGEON->AdvancedSearch->SearchOperator = @$filter["z_SURGEON"];
		$this->SURGEON->AdvancedSearch->SearchCondition = @$filter["v_SURGEON"];
		$this->SURGEON->AdvancedSearch->SearchValue2 = @$filter["y_SURGEON"];
		$this->SURGEON->AdvancedSearch->SearchOperator2 = @$filter["w_SURGEON"];
		$this->SURGEON->AdvancedSearch->save();

		// Field SURGEON Amount
		$this->SURGEON_Amount->AdvancedSearch->SearchValue = @$filter["x_SURGEON_Amount"];
		$this->SURGEON_Amount->AdvancedSearch->SearchOperator = @$filter["z_SURGEON_Amount"];
		$this->SURGEON_Amount->AdvancedSearch->SearchCondition = @$filter["v_SURGEON_Amount"];
		$this->SURGEON_Amount->AdvancedSearch->SearchValue2 = @$filter["y_SURGEON_Amount"];
		$this->SURGEON_Amount->AdvancedSearch->SearchOperator2 = @$filter["w_SURGEON_Amount"];
		$this->SURGEON_Amount->AdvancedSearch->save();

		// Field ASST SURGEON
		$this->ASST_SURGEON->AdvancedSearch->SearchValue = @$filter["x_ASST_SURGEON"];
		$this->ASST_SURGEON->AdvancedSearch->SearchOperator = @$filter["z_ASST_SURGEON"];
		$this->ASST_SURGEON->AdvancedSearch->SearchCondition = @$filter["v_ASST_SURGEON"];
		$this->ASST_SURGEON->AdvancedSearch->SearchValue2 = @$filter["y_ASST_SURGEON"];
		$this->ASST_SURGEON->AdvancedSearch->SearchOperator2 = @$filter["w_ASST_SURGEON"];
		$this->ASST_SURGEON->AdvancedSearch->save();

		// Field ASST SURGEON Amount
		$this->ASST_SURGEON_Amount->AdvancedSearch->SearchValue = @$filter["x_ASST_SURGEON_Amount"];
		$this->ASST_SURGEON_Amount->AdvancedSearch->SearchOperator = @$filter["z_ASST_SURGEON_Amount"];
		$this->ASST_SURGEON_Amount->AdvancedSearch->SearchCondition = @$filter["v_ASST_SURGEON_Amount"];
		$this->ASST_SURGEON_Amount->AdvancedSearch->SearchValue2 = @$filter["y_ASST_SURGEON_Amount"];
		$this->ASST_SURGEON_Amount->AdvancedSearch->SearchOperator2 = @$filter["w_ASST_SURGEON_Amount"];
		$this->ASST_SURGEON_Amount->AdvancedSearch->save();

		// Field ANESTHETIST
		$this->ANESTHETIST->AdvancedSearch->SearchValue = @$filter["x_ANESTHETIST"];
		$this->ANESTHETIST->AdvancedSearch->SearchOperator = @$filter["z_ANESTHETIST"];
		$this->ANESTHETIST->AdvancedSearch->SearchCondition = @$filter["v_ANESTHETIST"];
		$this->ANESTHETIST->AdvancedSearch->SearchValue2 = @$filter["y_ANESTHETIST"];
		$this->ANESTHETIST->AdvancedSearch->SearchOperator2 = @$filter["w_ANESTHETIST"];
		$this->ANESTHETIST->AdvancedSearch->save();

		// Field ANESTHETIST Amount
		$this->ANESTHETIST_Amount->AdvancedSearch->SearchValue = @$filter["x_ANESTHETIST_Amount"];
		$this->ANESTHETIST_Amount->AdvancedSearch->SearchOperator = @$filter["z_ANESTHETIST_Amount"];
		$this->ANESTHETIST_Amount->AdvancedSearch->SearchCondition = @$filter["v_ANESTHETIST_Amount"];
		$this->ANESTHETIST_Amount->AdvancedSearch->SearchValue2 = @$filter["y_ANESTHETIST_Amount"];
		$this->ANESTHETIST_Amount->AdvancedSearch->SearchOperator2 = @$filter["w_ANESTHETIST_Amount"];
		$this->ANESTHETIST_Amount->AdvancedSearch->save();

		// Field Others
		$this->Others->AdvancedSearch->SearchValue = @$filter["x_Others"];
		$this->Others->AdvancedSearch->SearchOperator = @$filter["z_Others"];
		$this->Others->AdvancedSearch->SearchCondition = @$filter["v_Others"];
		$this->Others->AdvancedSearch->SearchValue2 = @$filter["y_Others"];
		$this->Others->AdvancedSearch->SearchOperator2 = @$filter["w_Others"];
		$this->Others->AdvancedSearch->save();

		// Field Other Services
		$this->Other_Services->AdvancedSearch->SearchValue = @$filter["x_Other_Services"];
		$this->Other_Services->AdvancedSearch->SearchOperator = @$filter["z_Other_Services"];
		$this->Other_Services->AdvancedSearch->SearchCondition = @$filter["v_Other_Services"];
		$this->Other_Services->AdvancedSearch->SearchValue2 = @$filter["y_Other_Services"];
		$this->Other_Services->AdvancedSearch->SearchOperator2 = @$filter["w_Other_Services"];
		$this->Other_Services->AdvancedSearch->save();

		// Field Amount
		$this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
		$this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
		$this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
		$this->Amount->AdvancedSearch->save();

		// Field ModeofPayment
		$this->ModeofPayment->AdvancedSearch->SearchValue = @$filter["x_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator = @$filter["z_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchCondition = @$filter["v_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchValue2 = @$filter["y_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator2 = @$filter["w_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->save();

		// Field Cash
		$this->Cash->AdvancedSearch->SearchValue = @$filter["x_Cash"];
		$this->Cash->AdvancedSearch->SearchOperator = @$filter["z_Cash"];
		$this->Cash->AdvancedSearch->SearchCondition = @$filter["v_Cash"];
		$this->Cash->AdvancedSearch->SearchValue2 = @$filter["y_Cash"];
		$this->Cash->AdvancedSearch->SearchOperator2 = @$filter["w_Cash"];
		$this->Cash->AdvancedSearch->save();

		// Field Card
		$this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
		$this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
		$this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
		$this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
		$this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
		$this->Card->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field DiscountRemarks
		$this->DiscountRemarks->AdvancedSearch->SearchValue = @$filter["x_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator = @$filter["z_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchCondition = @$filter["v_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->DATE, $default, FALSE); // DATE
		$this->buildSearchSql($where, $this->BillNumber, $default, FALSE); // BillNumber
		$this->buildSearchSql($where, $this->PatientId, $default, FALSE); // PatientId
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->RefferedBy, $default, FALSE); // RefferedBy
		$this->buildSearchSql($where, $this->CASES, $default, FALSE); // CASES
		$this->buildSearchSql($where, $this->WARD, $default, FALSE); // WARD
		$this->buildSearchSql($where, $this->OT, $default, FALSE); // OT
		$this->buildSearchSql($where, $this->IMPLANT, $default, FALSE); // IMPLANT
		$this->buildSearchSql($where, $this->LAB, $default, FALSE); // LAB
		$this->buildSearchSql($where, $this->PHARMACY, $default, FALSE); // PHARMACY
		$this->buildSearchSql($where, $this->OUT_SIDE_DRS_VISIT_NAME, $default, FALSE); // OUT SIDE DRS VISIT NAME
		$this->buildSearchSql($where, $this->OUT_SIDE_DRS_VISIT_NAME_Amount, $default, FALSE); // OUT SIDE DRS VISIT NAME Amount
		$this->buildSearchSql($where, $this->PHYSIO, $default, FALSE); // PHYSIO
		$this->buildSearchSql($where, $this->PHYSIO_Amount, $default, FALSE); // PHYSIO Amount
		$this->buildSearchSql($where, $this->SURGEON, $default, FALSE); // SURGEON
		$this->buildSearchSql($where, $this->SURGEON_Amount, $default, FALSE); // SURGEON Amount
		$this->buildSearchSql($where, $this->ASST_SURGEON, $default, FALSE); // ASST SURGEON
		$this->buildSearchSql($where, $this->ASST_SURGEON_Amount, $default, FALSE); // ASST SURGEON Amount
		$this->buildSearchSql($where, $this->ANESTHETIST, $default, FALSE); // ANESTHETIST
		$this->buildSearchSql($where, $this->ANESTHETIST_Amount, $default, FALSE); // ANESTHETIST Amount
		$this->buildSearchSql($where, $this->Others, $default, FALSE); // Others
		$this->buildSearchSql($where, $this->Other_Services, $default, FALSE); // Other Services
		$this->buildSearchSql($where, $this->Amount, $default, FALSE); // Amount
		$this->buildSearchSql($where, $this->ModeofPayment, $default, FALSE); // ModeofPayment
		$this->buildSearchSql($where, $this->Cash, $default, FALSE); // Cash
		$this->buildSearchSql($where, $this->Card, $default, FALSE); // Card
		$this->buildSearchSql($where, $this->Remarks, $default, FALSE); // Remarks
		$this->buildSearchSql($where, $this->DiscountRemarks, $default, FALSE); // DiscountRemarks
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->DATE->AdvancedSearch->save(); // DATE
			$this->BillNumber->AdvancedSearch->save(); // BillNumber
			$this->PatientId->AdvancedSearch->save(); // PatientId
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->RefferedBy->AdvancedSearch->save(); // RefferedBy
			$this->CASES->AdvancedSearch->save(); // CASES
			$this->WARD->AdvancedSearch->save(); // WARD
			$this->OT->AdvancedSearch->save(); // OT
			$this->IMPLANT->AdvancedSearch->save(); // IMPLANT
			$this->LAB->AdvancedSearch->save(); // LAB
			$this->PHARMACY->AdvancedSearch->save(); // PHARMACY
			$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->save(); // OUT SIDE DRS VISIT NAME
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->save(); // OUT SIDE DRS VISIT NAME Amount
			$this->PHYSIO->AdvancedSearch->save(); // PHYSIO
			$this->PHYSIO_Amount->AdvancedSearch->save(); // PHYSIO Amount
			$this->SURGEON->AdvancedSearch->save(); // SURGEON
			$this->SURGEON_Amount->AdvancedSearch->save(); // SURGEON Amount
			$this->ASST_SURGEON->AdvancedSearch->save(); // ASST SURGEON
			$this->ASST_SURGEON_Amount->AdvancedSearch->save(); // ASST SURGEON Amount
			$this->ANESTHETIST->AdvancedSearch->save(); // ANESTHETIST
			$this->ANESTHETIST_Amount->AdvancedSearch->save(); // ANESTHETIST Amount
			$this->Others->AdvancedSearch->save(); // Others
			$this->Other_Services->AdvancedSearch->save(); // Other Services
			$this->Amount->AdvancedSearch->save(); // Amount
			$this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
			$this->Cash->AdvancedSearch->save(); // Cash
			$this->Card->AdvancedSearch->save(); // Card
			$this->Remarks->AdvancedSearch->save(); // Remarks
			$this->DiscountRemarks->AdvancedSearch->save(); // DiscountRemarks
			$this->HospID->AdvancedSearch->save(); // HospID
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (SEARCH_MULTI_VALUE_OPTION == 1)
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal <> "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 <> "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 <> "")
				$wrk = ($wrk <> "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == NULL_VALUE || $fldVal == NOT_NULL_VALUE)
			return $fldVal;
		$value = $fldVal;
		if ($fld->DataType == DATATYPE_BOOLEAN) {
			if ($fldVal <> "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal <> "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OUT_SIDE_DRS_VISIT_NAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PHYSIO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SURGEON, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ASST_SURGEON, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANESTHETIST, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Other_Services, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
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
		if ($this->DATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RefferedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CASES->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WARD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IMPLANT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LAB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PHARMACY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PHYSIO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PHYSIO_Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SURGEON->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SURGEON_Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ASST_SURGEON->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ASST_SURGEON_Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANESTHETIST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANESTHETIST_Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Others->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Other_Services->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ModeofPayment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Cash->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Card->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Remarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DiscountRemarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
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

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
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

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->DATE->AdvancedSearch->unsetSession();
		$this->BillNumber->AdvancedSearch->unsetSession();
		$this->PatientId->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->RefferedBy->AdvancedSearch->unsetSession();
		$this->CASES->AdvancedSearch->unsetSession();
		$this->WARD->AdvancedSearch->unsetSession();
		$this->OT->AdvancedSearch->unsetSession();
		$this->IMPLANT->AdvancedSearch->unsetSession();
		$this->LAB->AdvancedSearch->unsetSession();
		$this->PHARMACY->AdvancedSearch->unsetSession();
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->unsetSession();
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->unsetSession();
		$this->PHYSIO->AdvancedSearch->unsetSession();
		$this->PHYSIO_Amount->AdvancedSearch->unsetSession();
		$this->SURGEON->AdvancedSearch->unsetSession();
		$this->SURGEON_Amount->AdvancedSearch->unsetSession();
		$this->ASST_SURGEON->AdvancedSearch->unsetSession();
		$this->ASST_SURGEON_Amount->AdvancedSearch->unsetSession();
		$this->ANESTHETIST->AdvancedSearch->unsetSession();
		$this->ANESTHETIST_Amount->AdvancedSearch->unsetSession();
		$this->Others->AdvancedSearch->unsetSession();
		$this->Other_Services->AdvancedSearch->unsetSession();
		$this->Amount->AdvancedSearch->unsetSession();
		$this->ModeofPayment->AdvancedSearch->unsetSession();
		$this->Cash->AdvancedSearch->unsetSession();
		$this->Card->AdvancedSearch->unsetSession();
		$this->Remarks->AdvancedSearch->unsetSession();
		$this->DiscountRemarks->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->DATE->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->RefferedBy->AdvancedSearch->load();
		$this->CASES->AdvancedSearch->load();
		$this->WARD->AdvancedSearch->load();
		$this->OT->AdvancedSearch->load();
		$this->IMPLANT->AdvancedSearch->load();
		$this->LAB->AdvancedSearch->load();
		$this->PHARMACY->AdvancedSearch->load();
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->load();
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->load();
		$this->PHYSIO->AdvancedSearch->load();
		$this->PHYSIO_Amount->AdvancedSearch->load();
		$this->SURGEON->AdvancedSearch->load();
		$this->SURGEON_Amount->AdvancedSearch->load();
		$this->ASST_SURGEON->AdvancedSearch->load();
		$this->ASST_SURGEON_Amount->AdvancedSearch->load();
		$this->ANESTHETIST->AdvancedSearch->load();
		$this->ANESTHETIST_Amount->AdvancedSearch->load();
		$this->Others->AdvancedSearch->load();
		$this->Other_Services->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->DiscountRemarks->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->DATE); // DATE
			$this->updateSort($this->BillNumber); // BillNumber
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->RefferedBy); // RefferedBy
			$this->updateSort($this->CASES); // CASES
			$this->updateSort($this->WARD); // WARD
			$this->updateSort($this->OT); // OT
			$this->updateSort($this->IMPLANT); // IMPLANT
			$this->updateSort($this->LAB); // LAB
			$this->updateSort($this->PHARMACY); // PHARMACY
			$this->updateSort($this->OUT_SIDE_DRS_VISIT_NAME_Amount); // OUT SIDE DRS VISIT NAME Amount
			$this->updateSort($this->PHYSIO_Amount); // PHYSIO Amount
			$this->updateSort($this->SURGEON_Amount); // SURGEON Amount
			$this->updateSort($this->ASST_SURGEON_Amount); // ASST SURGEON Amount
			$this->updateSort($this->ANESTHETIST_Amount); // ANESTHETIST Amount
			$this->updateSort($this->Others); // Others
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->ModeofPayment); // ModeofPayment
			$this->updateSort($this->Cash); // Cash
			$this->updateSort($this->Card); // Card
			$this->updateSort($this->HospID); // HospID
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
				$this->DATE->setSort("");
				$this->BillNumber->setSort("");
				$this->PatientId->setSort("");
				$this->PatientName->setSort("");
				$this->RefferedBy->setSort("");
				$this->CASES->setSort("");
				$this->WARD->setSort("");
				$this->OT->setSort("");
				$this->IMPLANT->setSort("");
				$this->LAB->setSort("");
				$this->PHARMACY->setSort("");
				$this->OUT_SIDE_DRS_VISIT_NAME_Amount->setSort("");
				$this->PHYSIO_Amount->setSort("");
				$this->SURGEON_Amount->setSort("");
				$this->ASST_SURGEON_Amount->setSort("");
				$this->ANESTHETIST_Amount->setSort("");
				$this->Others->setSort("");
				$this->Amount->setSort("");
				$this->ModeofPayment->setSort("");
				$this->Cash->setSort("");
				$this->Card->setSort("");
				$this->HospID->setSort("");
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
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_revenue_report_iplistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_revenue_report_iplistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_revenue_report_iplist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_revenue_report_iplistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// DATE

		if (!$this->isAddOrEdit())
			$this->DATE->AdvancedSearch->setSearchValue(Get("x_DATE", Get("DATE", "")));
		if ($this->DATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DATE->AdvancedSearch->setSearchOperator(Get("z_DATE", ""));
		$this->DATE->AdvancedSearch->setSearchCondition(Get("v_DATE", ""));
		$this->DATE->AdvancedSearch->setSearchValue2(Get("y_DATE", ""));
		if ($this->DATE->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DATE->AdvancedSearch->setSearchOperator2(Get("w_DATE", ""));

		// BillNumber
		if (!$this->isAddOrEdit())
			$this->BillNumber->AdvancedSearch->setSearchValue(Get("x_BillNumber", Get("BillNumber", "")));
		if ($this->BillNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillNumber->AdvancedSearch->setSearchOperator(Get("z_BillNumber", ""));

		// PatientId
		if (!$this->isAddOrEdit())
			$this->PatientId->AdvancedSearch->setSearchValue(Get("x_PatientId", Get("PatientId", "")));
		if ($this->PatientId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientId->AdvancedSearch->setSearchOperator(Get("z_PatientId", ""));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue(Get("x_PatientName", Get("PatientName", "")));
		if ($this->PatientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientName->AdvancedSearch->setSearchOperator(Get("z_PatientName", ""));

		// RefferedBy
		if (!$this->isAddOrEdit())
			$this->RefferedBy->AdvancedSearch->setSearchValue(Get("x_RefferedBy", Get("RefferedBy", "")));
		if ($this->RefferedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RefferedBy->AdvancedSearch->setSearchOperator(Get("z_RefferedBy", ""));

		// CASES
		if (!$this->isAddOrEdit())
			$this->CASES->AdvancedSearch->setSearchValue(Get("x_CASES", Get("CASES", "")));
		if ($this->CASES->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CASES->AdvancedSearch->setSearchOperator(Get("z_CASES", ""));

		// WARD
		if (!$this->isAddOrEdit())
			$this->WARD->AdvancedSearch->setSearchValue(Get("x_WARD", Get("WARD", "")));
		if ($this->WARD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->WARD->AdvancedSearch->setSearchOperator(Get("z_WARD", ""));

		// OT
		if (!$this->isAddOrEdit())
			$this->OT->AdvancedSearch->setSearchValue(Get("x_OT", Get("OT", "")));
		if ($this->OT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OT->AdvancedSearch->setSearchOperator(Get("z_OT", ""));

		// IMPLANT
		if (!$this->isAddOrEdit())
			$this->IMPLANT->AdvancedSearch->setSearchValue(Get("x_IMPLANT", Get("IMPLANT", "")));
		if ($this->IMPLANT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IMPLANT->AdvancedSearch->setSearchOperator(Get("z_IMPLANT", ""));

		// LAB
		if (!$this->isAddOrEdit())
			$this->LAB->AdvancedSearch->setSearchValue(Get("x_LAB", Get("LAB", "")));
		if ($this->LAB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LAB->AdvancedSearch->setSearchOperator(Get("z_LAB", ""));

		// PHARMACY
		if (!$this->isAddOrEdit())
			$this->PHARMACY->AdvancedSearch->setSearchValue(Get("x_PHARMACY", Get("PHARMACY", "")));
		if ($this->PHARMACY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PHARMACY->AdvancedSearch->setSearchOperator(Get("z_PHARMACY", ""));

		// OUT SIDE DRS VISIT NAME
		if (!$this->isAddOrEdit())
			$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->setSearchValue(Get("x_OUT_SIDE_DRS_VISIT_NAME", Get("OUT_SIDE_DRS_VISIT_NAME", "")));
		if ($this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->setSearchOperator(Get("z_OUT_SIDE_DRS_VISIT_NAME", ""));

		// OUT SIDE DRS VISIT NAME Amount
		if (!$this->isAddOrEdit())
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->setSearchValue(Get("x_OUT_SIDE_DRS_VISIT_NAME_Amount", Get("OUT_SIDE_DRS_VISIT_NAME_Amount", "")));
		if ($this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->setSearchOperator(Get("z_OUT_SIDE_DRS_VISIT_NAME_Amount", ""));

		// PHYSIO
		if (!$this->isAddOrEdit())
			$this->PHYSIO->AdvancedSearch->setSearchValue(Get("x_PHYSIO", Get("PHYSIO", "")));
		if ($this->PHYSIO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PHYSIO->AdvancedSearch->setSearchOperator(Get("z_PHYSIO", ""));

		// PHYSIO Amount
		if (!$this->isAddOrEdit())
			$this->PHYSIO_Amount->AdvancedSearch->setSearchValue(Get("x_PHYSIO_Amount", Get("PHYSIO_Amount", "")));
		if ($this->PHYSIO_Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PHYSIO_Amount->AdvancedSearch->setSearchOperator(Get("z_PHYSIO_Amount", ""));

		// SURGEON
		if (!$this->isAddOrEdit())
			$this->SURGEON->AdvancedSearch->setSearchValue(Get("x_SURGEON", Get("SURGEON", "")));
		if ($this->SURGEON->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SURGEON->AdvancedSearch->setSearchOperator(Get("z_SURGEON", ""));

		// SURGEON Amount
		if (!$this->isAddOrEdit())
			$this->SURGEON_Amount->AdvancedSearch->setSearchValue(Get("x_SURGEON_Amount", Get("SURGEON_Amount", "")));
		if ($this->SURGEON_Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SURGEON_Amount->AdvancedSearch->setSearchOperator(Get("z_SURGEON_Amount", ""));

		// ASST SURGEON
		if (!$this->isAddOrEdit())
			$this->ASST_SURGEON->AdvancedSearch->setSearchValue(Get("x_ASST_SURGEON", Get("ASST_SURGEON", "")));
		if ($this->ASST_SURGEON->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ASST_SURGEON->AdvancedSearch->setSearchOperator(Get("z_ASST_SURGEON", ""));

		// ASST SURGEON Amount
		if (!$this->isAddOrEdit())
			$this->ASST_SURGEON_Amount->AdvancedSearch->setSearchValue(Get("x_ASST_SURGEON_Amount", Get("ASST_SURGEON_Amount", "")));
		if ($this->ASST_SURGEON_Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ASST_SURGEON_Amount->AdvancedSearch->setSearchOperator(Get("z_ASST_SURGEON_Amount", ""));

		// ANESTHETIST
		if (!$this->isAddOrEdit())
			$this->ANESTHETIST->AdvancedSearch->setSearchValue(Get("x_ANESTHETIST", Get("ANESTHETIST", "")));
		if ($this->ANESTHETIST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANESTHETIST->AdvancedSearch->setSearchOperator(Get("z_ANESTHETIST", ""));

		// ANESTHETIST Amount
		if (!$this->isAddOrEdit())
			$this->ANESTHETIST_Amount->AdvancedSearch->setSearchValue(Get("x_ANESTHETIST_Amount", Get("ANESTHETIST_Amount", "")));
		if ($this->ANESTHETIST_Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANESTHETIST_Amount->AdvancedSearch->setSearchOperator(Get("z_ANESTHETIST_Amount", ""));

		// Others
		if (!$this->isAddOrEdit())
			$this->Others->AdvancedSearch->setSearchValue(Get("x_Others", Get("Others", "")));
		if ($this->Others->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Others->AdvancedSearch->setSearchOperator(Get("z_Others", ""));

		// Other Services
		if (!$this->isAddOrEdit())
			$this->Other_Services->AdvancedSearch->setSearchValue(Get("x_Other_Services", Get("Other_Services", "")));
		if ($this->Other_Services->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Other_Services->AdvancedSearch->setSearchOperator(Get("z_Other_Services", ""));

		// Amount
		if (!$this->isAddOrEdit())
			$this->Amount->AdvancedSearch->setSearchValue(Get("x_Amount", Get("Amount", "")));
		if ($this->Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Amount->AdvancedSearch->setSearchOperator(Get("z_Amount", ""));

		// ModeofPayment
		if (!$this->isAddOrEdit())
			$this->ModeofPayment->AdvancedSearch->setSearchValue(Get("x_ModeofPayment", Get("ModeofPayment", "")));
		if ($this->ModeofPayment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ModeofPayment->AdvancedSearch->setSearchOperator(Get("z_ModeofPayment", ""));

		// Cash
		if (!$this->isAddOrEdit())
			$this->Cash->AdvancedSearch->setSearchValue(Get("x_Cash", Get("Cash", "")));
		if ($this->Cash->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Cash->AdvancedSearch->setSearchOperator(Get("z_Cash", ""));

		// Card
		if (!$this->isAddOrEdit())
			$this->Card->AdvancedSearch->setSearchValue(Get("x_Card", Get("Card", "")));
		if ($this->Card->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Card->AdvancedSearch->setSearchOperator(Get("z_Card", ""));

		// Remarks
		if (!$this->isAddOrEdit())
			$this->Remarks->AdvancedSearch->setSearchValue(Get("x_Remarks", Get("Remarks", "")));
		if ($this->Remarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Remarks->AdvancedSearch->setSearchOperator(Get("z_Remarks", ""));

		// DiscountRemarks
		if (!$this->isAddOrEdit())
			$this->DiscountRemarks->AdvancedSearch->setSearchValue(Get("x_DiscountRemarks", Get("DiscountRemarks", "")));
		if ($this->DiscountRemarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DiscountRemarks->AdvancedSearch->setSearchOperator(Get("z_DiscountRemarks", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));
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
		$this->DATE->setDbValue($row['DATE']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->RefferedBy->setDbValue($row['RefferedBy']);
		$this->CASES->setDbValue($row['CASES']);
		$this->WARD->setDbValue($row['WARD']);
		$this->OT->setDbValue($row['OT']);
		$this->IMPLANT->setDbValue($row['IMPLANT']);
		$this->LAB->setDbValue($row['LAB']);
		$this->PHARMACY->setDbValue($row['PHARMACY']);
		$this->OUT_SIDE_DRS_VISIT_NAME->setDbValue($row['OUT SIDE DRS VISIT NAME']);
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->setDbValue($row['OUT SIDE DRS VISIT NAME Amount']);
		$this->PHYSIO->setDbValue($row['PHYSIO']);
		$this->PHYSIO_Amount->setDbValue($row['PHYSIO Amount']);
		$this->SURGEON->setDbValue($row['SURGEON']);
		$this->SURGEON_Amount->setDbValue($row['SURGEON Amount']);
		$this->ASST_SURGEON->setDbValue($row['ASST SURGEON']);
		$this->ASST_SURGEON_Amount->setDbValue($row['ASST SURGEON Amount']);
		$this->ANESTHETIST->setDbValue($row['ANESTHETIST']);
		$this->ANESTHETIST_Amount->setDbValue($row['ANESTHETIST Amount']);
		$this->Others->setDbValue($row['Others']);
		$this->Other_Services->setDbValue($row['Other Services']);
		$this->Amount->setDbValue($row['Amount']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Cash->setDbValue($row['Cash']);
		$this->Card->setDbValue($row['Card']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['DATE'] = NULL;
		$row['BillNumber'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['RefferedBy'] = NULL;
		$row['CASES'] = NULL;
		$row['WARD'] = NULL;
		$row['OT'] = NULL;
		$row['IMPLANT'] = NULL;
		$row['LAB'] = NULL;
		$row['PHARMACY'] = NULL;
		$row['OUT SIDE DRS VISIT NAME'] = NULL;
		$row['OUT SIDE DRS VISIT NAME Amount'] = NULL;
		$row['PHYSIO'] = NULL;
		$row['PHYSIO Amount'] = NULL;
		$row['SURGEON'] = NULL;
		$row['SURGEON Amount'] = NULL;
		$row['ASST SURGEON'] = NULL;
		$row['ASST SURGEON Amount'] = NULL;
		$row['ANESTHETIST'] = NULL;
		$row['ANESTHETIST Amount'] = NULL;
		$row['Others'] = NULL;
		$row['Other Services'] = NULL;
		$row['Amount'] = NULL;
		$row['ModeofPayment'] = NULL;
		$row['Cash'] = NULL;
		$row['Card'] = NULL;
		$row['Remarks'] = NULL;
		$row['DiscountRemarks'] = NULL;
		$row['HospID'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{
		return FALSE;
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
		if ($this->CASES->FormValue == $this->CASES->CurrentValue && is_numeric(ConvertToFloatString($this->CASES->CurrentValue)))
			$this->CASES->CurrentValue = ConvertToFloatString($this->CASES->CurrentValue);

		// Convert decimal values if posted back
		if ($this->WARD->FormValue == $this->WARD->CurrentValue && is_numeric(ConvertToFloatString($this->WARD->CurrentValue)))
			$this->WARD->CurrentValue = ConvertToFloatString($this->WARD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OT->FormValue == $this->OT->CurrentValue && is_numeric(ConvertToFloatString($this->OT->CurrentValue)))
			$this->OT->CurrentValue = ConvertToFloatString($this->OT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IMPLANT->FormValue == $this->IMPLANT->CurrentValue && is_numeric(ConvertToFloatString($this->IMPLANT->CurrentValue)))
			$this->IMPLANT->CurrentValue = ConvertToFloatString($this->IMPLANT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LAB->FormValue == $this->LAB->CurrentValue && is_numeric(ConvertToFloatString($this->LAB->CurrentValue)))
			$this->LAB->CurrentValue = ConvertToFloatString($this->LAB->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PHARMACY->FormValue == $this->PHARMACY->CurrentValue && is_numeric(ConvertToFloatString($this->PHARMACY->CurrentValue)))
			$this->PHARMACY->CurrentValue = ConvertToFloatString($this->PHARMACY->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OUT_SIDE_DRS_VISIT_NAME_Amount->FormValue == $this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue && is_numeric(ConvertToFloatString($this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue)))
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue = ConvertToFloatString($this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PHYSIO_Amount->FormValue == $this->PHYSIO_Amount->CurrentValue && is_numeric(ConvertToFloatString($this->PHYSIO_Amount->CurrentValue)))
			$this->PHYSIO_Amount->CurrentValue = ConvertToFloatString($this->PHYSIO_Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SURGEON_Amount->FormValue == $this->SURGEON_Amount->CurrentValue && is_numeric(ConvertToFloatString($this->SURGEON_Amount->CurrentValue)))
			$this->SURGEON_Amount->CurrentValue = ConvertToFloatString($this->SURGEON_Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ASST_SURGEON_Amount->FormValue == $this->ASST_SURGEON_Amount->CurrentValue && is_numeric(ConvertToFloatString($this->ASST_SURGEON_Amount->CurrentValue)))
			$this->ASST_SURGEON_Amount->CurrentValue = ConvertToFloatString($this->ASST_SURGEON_Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ANESTHETIST_Amount->FormValue == $this->ANESTHETIST_Amount->CurrentValue && is_numeric(ConvertToFloatString($this->ANESTHETIST_Amount->CurrentValue)))
			$this->ANESTHETIST_Amount->CurrentValue = ConvertToFloatString($this->ANESTHETIST_Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Others->FormValue == $this->Others->CurrentValue && is_numeric(ConvertToFloatString($this->Others->CurrentValue)))
			$this->Others->CurrentValue = ConvertToFloatString($this->Others->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue)))
			$this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// DATE
		// BillNumber
		// PatientId
		// PatientName
		// RefferedBy
		// CASES
		// WARD
		// OT
		// IMPLANT
		// LAB
		// PHARMACY
		// OUT SIDE DRS VISIT NAME
		// OUT SIDE DRS VISIT NAME Amount
		// PHYSIO
		// PHYSIO Amount
		// SURGEON
		// SURGEON Amount
		// ASST SURGEON
		// ASST SURGEON Amount
		// ANESTHETIST
		// ANESTHETIST Amount
		// Others
		// Other Services
		// Amount
		// ModeofPayment
		// Cash
		// Card
		// Remarks
		// DiscountRemarks
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// DATE
			$this->DATE->ViewValue = $this->DATE->CurrentValue;
			$this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
			$this->DATE->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// RefferedBy
			$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
			$this->RefferedBy->ViewCustomAttributes = "";

			// CASES
			$this->CASES->ViewValue = $this->CASES->CurrentValue;
			$this->CASES->ViewValue = FormatNumber($this->CASES->ViewValue, 2, -2, -2, -2);
			$this->CASES->ViewCustomAttributes = "";

			// WARD
			$this->WARD->ViewValue = $this->WARD->CurrentValue;
			$this->WARD->ViewValue = FormatNumber($this->WARD->ViewValue, 2, -2, -2, -2);
			$this->WARD->ViewCustomAttributes = "";

			// OT
			$this->OT->ViewValue = $this->OT->CurrentValue;
			$this->OT->ViewValue = FormatNumber($this->OT->ViewValue, 2, -2, -2, -2);
			$this->OT->ViewCustomAttributes = "";

			// IMPLANT
			$this->IMPLANT->ViewValue = $this->IMPLANT->CurrentValue;
			$this->IMPLANT->ViewValue = FormatNumber($this->IMPLANT->ViewValue, 2, -2, -2, -2);
			$this->IMPLANT->ViewCustomAttributes = "";

			// LAB
			$this->LAB->ViewValue = $this->LAB->CurrentValue;
			$this->LAB->ViewValue = FormatNumber($this->LAB->ViewValue, 2, -2, -2, -2);
			$this->LAB->ViewCustomAttributes = "";

			// PHARMACY
			$this->PHARMACY->ViewValue = $this->PHARMACY->CurrentValue;
			$this->PHARMACY->ViewValue = FormatNumber($this->PHARMACY->ViewValue, 2, -2, -2, -2);
			$this->PHARMACY->ViewCustomAttributes = "";

			// OUT SIDE DRS VISIT NAME Amount
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue = $this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue;
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue = FormatNumber($this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue, 2, -2, -2, -2);
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewCustomAttributes = "";

			// PHYSIO Amount
			$this->PHYSIO_Amount->ViewValue = $this->PHYSIO_Amount->CurrentValue;
			$this->PHYSIO_Amount->ViewValue = FormatNumber($this->PHYSIO_Amount->ViewValue, 2, -2, -2, -2);
			$this->PHYSIO_Amount->ViewCustomAttributes = "";

			// SURGEON Amount
			$this->SURGEON_Amount->ViewValue = $this->SURGEON_Amount->CurrentValue;
			$this->SURGEON_Amount->ViewValue = FormatNumber($this->SURGEON_Amount->ViewValue, 2, -2, -2, -2);
			$this->SURGEON_Amount->ViewCustomAttributes = "";

			// ASST SURGEON Amount
			$this->ASST_SURGEON_Amount->ViewValue = $this->ASST_SURGEON_Amount->CurrentValue;
			$this->ASST_SURGEON_Amount->ViewValue = FormatNumber($this->ASST_SURGEON_Amount->ViewValue, 2, -2, -2, -2);
			$this->ASST_SURGEON_Amount->ViewCustomAttributes = "";

			// ANESTHETIST Amount
			$this->ANESTHETIST_Amount->ViewValue = $this->ANESTHETIST_Amount->CurrentValue;
			$this->ANESTHETIST_Amount->ViewValue = FormatNumber($this->ANESTHETIST_Amount->ViewValue, 2, -2, -2, -2);
			$this->ANESTHETIST_Amount->ViewCustomAttributes = "";

			// Others
			$this->Others->ViewValue = $this->Others->CurrentValue;
			$this->Others->ViewValue = FormatNumber($this->Others->ViewValue, 2, -2, -2, -2);
			$this->Others->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Cash
			$this->Cash->ViewValue = $this->Cash->CurrentValue;
			$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// DATE
			$this->DATE->LinkCustomAttributes = "";
			$this->DATE->HrefValue = "";
			$this->DATE->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";
			$this->RefferedBy->TooltipValue = "";

			// CASES
			$this->CASES->LinkCustomAttributes = "";
			$this->CASES->HrefValue = "";
			$this->CASES->TooltipValue = "";

			// WARD
			$this->WARD->LinkCustomAttributes = "";
			$this->WARD->HrefValue = "";
			$this->WARD->TooltipValue = "";

			// OT
			$this->OT->LinkCustomAttributes = "";
			$this->OT->HrefValue = "";
			$this->OT->TooltipValue = "";

			// IMPLANT
			$this->IMPLANT->LinkCustomAttributes = "";
			$this->IMPLANT->HrefValue = "";
			$this->IMPLANT->TooltipValue = "";

			// LAB
			$this->LAB->LinkCustomAttributes = "";
			$this->LAB->HrefValue = "";
			$this->LAB->TooltipValue = "";

			// PHARMACY
			$this->PHARMACY->LinkCustomAttributes = "";
			$this->PHARMACY->HrefValue = "";
			$this->PHARMACY->TooltipValue = "";

			// OUT SIDE DRS VISIT NAME Amount
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->LinkCustomAttributes = "";
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->HrefValue = "";
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->TooltipValue = "";

			// PHYSIO Amount
			$this->PHYSIO_Amount->LinkCustomAttributes = "";
			$this->PHYSIO_Amount->HrefValue = "";
			$this->PHYSIO_Amount->TooltipValue = "";

			// SURGEON Amount
			$this->SURGEON_Amount->LinkCustomAttributes = "";
			$this->SURGEON_Amount->HrefValue = "";
			$this->SURGEON_Amount->TooltipValue = "";

			// ASST SURGEON Amount
			$this->ASST_SURGEON_Amount->LinkCustomAttributes = "";
			$this->ASST_SURGEON_Amount->HrefValue = "";
			$this->ASST_SURGEON_Amount->TooltipValue = "";

			// ANESTHETIST Amount
			$this->ANESTHETIST_Amount->LinkCustomAttributes = "";
			$this->ANESTHETIST_Amount->HrefValue = "";
			$this->ANESTHETIST_Amount->TooltipValue = "";

			// Others
			$this->Others->LinkCustomAttributes = "";
			$this->Others->HrefValue = "";
			$this->Others->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// DATE
			$this->DATE->EditAttrs["class"] = "form-control";
			$this->DATE->EditCustomAttributes = "";
			$this->DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DATE->AdvancedSearch->SearchValue, 0), 8));
			$this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());
			$this->DATE->EditAttrs["class"] = "form-control";
			$this->DATE->EditCustomAttributes = "";
			$this->DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DATE->AdvancedSearch->SearchValue2, 0), 8));
			$this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// RefferedBy
			$this->RefferedBy->EditAttrs["class"] = "form-control";
			$this->RefferedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RefferedBy->AdvancedSearch->SearchValue = HtmlDecode($this->RefferedBy->AdvancedSearch->SearchValue);
			$this->RefferedBy->EditValue = HtmlEncode($this->RefferedBy->AdvancedSearch->SearchValue);
			$this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

			// CASES
			$this->CASES->EditAttrs["class"] = "form-control";
			$this->CASES->EditCustomAttributes = "";
			$this->CASES->EditValue = HtmlEncode($this->CASES->AdvancedSearch->SearchValue);
			$this->CASES->PlaceHolder = RemoveHtml($this->CASES->caption());

			// WARD
			$this->WARD->EditAttrs["class"] = "form-control";
			$this->WARD->EditCustomAttributes = "";
			$this->WARD->EditValue = HtmlEncode($this->WARD->AdvancedSearch->SearchValue);
			$this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());

			// OT
			$this->OT->EditAttrs["class"] = "form-control";
			$this->OT->EditCustomAttributes = "";
			$this->OT->EditValue = HtmlEncode($this->OT->AdvancedSearch->SearchValue);
			$this->OT->PlaceHolder = RemoveHtml($this->OT->caption());

			// IMPLANT
			$this->IMPLANT->EditAttrs["class"] = "form-control";
			$this->IMPLANT->EditCustomAttributes = "";
			$this->IMPLANT->EditValue = HtmlEncode($this->IMPLANT->AdvancedSearch->SearchValue);
			$this->IMPLANT->PlaceHolder = RemoveHtml($this->IMPLANT->caption());

			// LAB
			$this->LAB->EditAttrs["class"] = "form-control";
			$this->LAB->EditCustomAttributes = "";
			$this->LAB->EditValue = HtmlEncode($this->LAB->AdvancedSearch->SearchValue);
			$this->LAB->PlaceHolder = RemoveHtml($this->LAB->caption());

			// PHARMACY
			$this->PHARMACY->EditAttrs["class"] = "form-control";
			$this->PHARMACY->EditCustomAttributes = "";
			$this->PHARMACY->EditValue = HtmlEncode($this->PHARMACY->AdvancedSearch->SearchValue);
			$this->PHARMACY->PlaceHolder = RemoveHtml($this->PHARMACY->caption());

			// OUT SIDE DRS VISIT NAME Amount
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditAttrs["class"] = "form-control";
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditCustomAttributes = "";
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue = HtmlEncode($this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->SearchValue);
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->PlaceHolder = RemoveHtml($this->OUT_SIDE_DRS_VISIT_NAME_Amount->caption());

			// PHYSIO Amount
			$this->PHYSIO_Amount->EditAttrs["class"] = "form-control";
			$this->PHYSIO_Amount->EditCustomAttributes = "";
			$this->PHYSIO_Amount->EditValue = HtmlEncode($this->PHYSIO_Amount->AdvancedSearch->SearchValue);
			$this->PHYSIO_Amount->PlaceHolder = RemoveHtml($this->PHYSIO_Amount->caption());

			// SURGEON Amount
			$this->SURGEON_Amount->EditAttrs["class"] = "form-control";
			$this->SURGEON_Amount->EditCustomAttributes = "";
			$this->SURGEON_Amount->EditValue = HtmlEncode($this->SURGEON_Amount->AdvancedSearch->SearchValue);
			$this->SURGEON_Amount->PlaceHolder = RemoveHtml($this->SURGEON_Amount->caption());

			// ASST SURGEON Amount
			$this->ASST_SURGEON_Amount->EditAttrs["class"] = "form-control";
			$this->ASST_SURGEON_Amount->EditCustomAttributes = "";
			$this->ASST_SURGEON_Amount->EditValue = HtmlEncode($this->ASST_SURGEON_Amount->AdvancedSearch->SearchValue);
			$this->ASST_SURGEON_Amount->PlaceHolder = RemoveHtml($this->ASST_SURGEON_Amount->caption());

			// ANESTHETIST Amount
			$this->ANESTHETIST_Amount->EditAttrs["class"] = "form-control";
			$this->ANESTHETIST_Amount->EditCustomAttributes = "";
			$this->ANESTHETIST_Amount->EditValue = HtmlEncode($this->ANESTHETIST_Amount->AdvancedSearch->SearchValue);
			$this->ANESTHETIST_Amount->PlaceHolder = RemoveHtml($this->ANESTHETIST_Amount->caption());

			// Others
			$this->Others->EditAttrs["class"] = "form-control";
			$this->Others->EditCustomAttributes = "";
			$this->Others->EditValue = HtmlEncode($this->Others->AdvancedSearch->SearchValue);
			$this->Others->PlaceHolder = RemoveHtml($this->Others->caption());

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModeofPayment->AdvancedSearch->SearchValue = HtmlDecode($this->ModeofPayment->AdvancedSearch->SearchValue);
			$this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->AdvancedSearch->SearchValue);
			$this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = HtmlEncode($this->Cash->AdvancedSearch->SearchValue);
			$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;
		if (!CheckDate($this->DATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DATE->errorMessage());
		}
		if (!CheckDate($this->DATE->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->DATE->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->DATE->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->RefferedBy->AdvancedSearch->load();
		$this->CASES->AdvancedSearch->load();
		$this->WARD->AdvancedSearch->load();
		$this->OT->AdvancedSearch->load();
		$this->IMPLANT->AdvancedSearch->load();
		$this->LAB->AdvancedSearch->load();
		$this->PHARMACY->AdvancedSearch->load();
		$this->OUT_SIDE_DRS_VISIT_NAME->AdvancedSearch->load();
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->AdvancedSearch->load();
		$this->PHYSIO->AdvancedSearch->load();
		$this->PHYSIO_Amount->AdvancedSearch->load();
		$this->SURGEON->AdvancedSearch->load();
		$this->SURGEON_Amount->AdvancedSearch->load();
		$this->ASST_SURGEON->AdvancedSearch->load();
		$this->ASST_SURGEON_Amount->AdvancedSearch->load();
		$this->ANESTHETIST->AdvancedSearch->load();
		$this->ANESTHETIST_Amount->AdvancedSearch->load();
		$this->Others->AdvancedSearch->load();
		$this->Other_Services->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->DiscountRemarks->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_revenue_report_iplist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_revenue_report_iplist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_revenue_report_iplist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_revenue_report_ip\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_revenue_report_ip',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_revenue_report_iplist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
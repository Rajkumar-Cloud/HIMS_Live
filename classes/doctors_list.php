<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class doctors_list extends doctors
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'doctors';

	// Page object name
	public $PageObjName = "doctors_list";

	// Grid form hidden field names
	public $FormName = "fdoctorslist";
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

		// Table object (doctors)
		if (!isset($GLOBALS["doctors"]) || get_class($GLOBALS["doctors"]) == PROJECT_NAMESPACE . "doctors") {
			$GLOBALS["doctors"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["doctors"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "doctorsadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "doctorsdelete.php";
		$this->MultiUpdateUrl = "doctorsupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'doctors');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fdoctorslistsrch";

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
		global $EXPORT, $doctors;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($doctors);
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
		$this->CODE->setVisibility();
		$this->NAME->setVisibility();
		$this->DEPARTMENT->setVisibility();
		$this->start_time->setVisibility();
		$this->end_time->setVisibility();
		$this->start_time1->setVisibility();
		$this->end_time1->setVisibility();
		$this->start_time2->setVisibility();
		$this->end_time2->setVisibility();
		$this->slot_time->setVisibility();
		$this->Fees->setVisibility();
		$this->ProfilePic->Visible = FALSE;
		$this->slot_days->setVisibility();
		$this->Status->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->HospID->setVisibility();
		$this->Designation->setVisibility();
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
		$this->setupLookupOptions($this->slot_days);
		$this->setupLookupOptions($this->Status);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fdoctorslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->CODE->AdvancedSearch->toJson(), ","); // Field CODE
		$filterList = Concat($filterList, $this->NAME->AdvancedSearch->toJson(), ","); // Field NAME
		$filterList = Concat($filterList, $this->DEPARTMENT->AdvancedSearch->toJson(), ","); // Field DEPARTMENT
		$filterList = Concat($filterList, $this->start_time->AdvancedSearch->toJson(), ","); // Field start_time
		$filterList = Concat($filterList, $this->end_time->AdvancedSearch->toJson(), ","); // Field end_time
		$filterList = Concat($filterList, $this->start_time1->AdvancedSearch->toJson(), ","); // Field start_time1
		$filterList = Concat($filterList, $this->end_time1->AdvancedSearch->toJson(), ","); // Field end_time1
		$filterList = Concat($filterList, $this->start_time2->AdvancedSearch->toJson(), ","); // Field start_time2
		$filterList = Concat($filterList, $this->end_time2->AdvancedSearch->toJson(), ","); // Field end_time2
		$filterList = Concat($filterList, $this->slot_time->AdvancedSearch->toJson(), ","); // Field slot_time
		$filterList = Concat($filterList, $this->Fees->AdvancedSearch->toJson(), ","); // Field Fees
		$filterList = Concat($filterList, $this->ProfilePic->AdvancedSearch->toJson(), ","); // Field ProfilePic
		$filterList = Concat($filterList, $this->slot_days->AdvancedSearch->toJson(), ","); // Field slot_days
		$filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
		$filterList = Concat($filterList, $this->scheduler_id->AdvancedSearch->toJson(), ","); // Field scheduler_id
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->Designation->AdvancedSearch->toJson(), ","); // Field Designation
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fdoctorslistsrch", $filters);
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

		// Field CODE
		$this->CODE->AdvancedSearch->SearchValue = @$filter["x_CODE"];
		$this->CODE->AdvancedSearch->SearchOperator = @$filter["z_CODE"];
		$this->CODE->AdvancedSearch->SearchCondition = @$filter["v_CODE"];
		$this->CODE->AdvancedSearch->SearchValue2 = @$filter["y_CODE"];
		$this->CODE->AdvancedSearch->SearchOperator2 = @$filter["w_CODE"];
		$this->CODE->AdvancedSearch->save();

		// Field NAME
		$this->NAME->AdvancedSearch->SearchValue = @$filter["x_NAME"];
		$this->NAME->AdvancedSearch->SearchOperator = @$filter["z_NAME"];
		$this->NAME->AdvancedSearch->SearchCondition = @$filter["v_NAME"];
		$this->NAME->AdvancedSearch->SearchValue2 = @$filter["y_NAME"];
		$this->NAME->AdvancedSearch->SearchOperator2 = @$filter["w_NAME"];
		$this->NAME->AdvancedSearch->save();

		// Field DEPARTMENT
		$this->DEPARTMENT->AdvancedSearch->SearchValue = @$filter["x_DEPARTMENT"];
		$this->DEPARTMENT->AdvancedSearch->SearchOperator = @$filter["z_DEPARTMENT"];
		$this->DEPARTMENT->AdvancedSearch->SearchCondition = @$filter["v_DEPARTMENT"];
		$this->DEPARTMENT->AdvancedSearch->SearchValue2 = @$filter["y_DEPARTMENT"];
		$this->DEPARTMENT->AdvancedSearch->SearchOperator2 = @$filter["w_DEPARTMENT"];
		$this->DEPARTMENT->AdvancedSearch->save();

		// Field start_time
		$this->start_time->AdvancedSearch->SearchValue = @$filter["x_start_time"];
		$this->start_time->AdvancedSearch->SearchOperator = @$filter["z_start_time"];
		$this->start_time->AdvancedSearch->SearchCondition = @$filter["v_start_time"];
		$this->start_time->AdvancedSearch->SearchValue2 = @$filter["y_start_time"];
		$this->start_time->AdvancedSearch->SearchOperator2 = @$filter["w_start_time"];
		$this->start_time->AdvancedSearch->save();

		// Field end_time
		$this->end_time->AdvancedSearch->SearchValue = @$filter["x_end_time"];
		$this->end_time->AdvancedSearch->SearchOperator = @$filter["z_end_time"];
		$this->end_time->AdvancedSearch->SearchCondition = @$filter["v_end_time"];
		$this->end_time->AdvancedSearch->SearchValue2 = @$filter["y_end_time"];
		$this->end_time->AdvancedSearch->SearchOperator2 = @$filter["w_end_time"];
		$this->end_time->AdvancedSearch->save();

		// Field start_time1
		$this->start_time1->AdvancedSearch->SearchValue = @$filter["x_start_time1"];
		$this->start_time1->AdvancedSearch->SearchOperator = @$filter["z_start_time1"];
		$this->start_time1->AdvancedSearch->SearchCondition = @$filter["v_start_time1"];
		$this->start_time1->AdvancedSearch->SearchValue2 = @$filter["y_start_time1"];
		$this->start_time1->AdvancedSearch->SearchOperator2 = @$filter["w_start_time1"];
		$this->start_time1->AdvancedSearch->save();

		// Field end_time1
		$this->end_time1->AdvancedSearch->SearchValue = @$filter["x_end_time1"];
		$this->end_time1->AdvancedSearch->SearchOperator = @$filter["z_end_time1"];
		$this->end_time1->AdvancedSearch->SearchCondition = @$filter["v_end_time1"];
		$this->end_time1->AdvancedSearch->SearchValue2 = @$filter["y_end_time1"];
		$this->end_time1->AdvancedSearch->SearchOperator2 = @$filter["w_end_time1"];
		$this->end_time1->AdvancedSearch->save();

		// Field start_time2
		$this->start_time2->AdvancedSearch->SearchValue = @$filter["x_start_time2"];
		$this->start_time2->AdvancedSearch->SearchOperator = @$filter["z_start_time2"];
		$this->start_time2->AdvancedSearch->SearchCondition = @$filter["v_start_time2"];
		$this->start_time2->AdvancedSearch->SearchValue2 = @$filter["y_start_time2"];
		$this->start_time2->AdvancedSearch->SearchOperator2 = @$filter["w_start_time2"];
		$this->start_time2->AdvancedSearch->save();

		// Field end_time2
		$this->end_time2->AdvancedSearch->SearchValue = @$filter["x_end_time2"];
		$this->end_time2->AdvancedSearch->SearchOperator = @$filter["z_end_time2"];
		$this->end_time2->AdvancedSearch->SearchCondition = @$filter["v_end_time2"];
		$this->end_time2->AdvancedSearch->SearchValue2 = @$filter["y_end_time2"];
		$this->end_time2->AdvancedSearch->SearchOperator2 = @$filter["w_end_time2"];
		$this->end_time2->AdvancedSearch->save();

		// Field slot_time
		$this->slot_time->AdvancedSearch->SearchValue = @$filter["x_slot_time"];
		$this->slot_time->AdvancedSearch->SearchOperator = @$filter["z_slot_time"];
		$this->slot_time->AdvancedSearch->SearchCondition = @$filter["v_slot_time"];
		$this->slot_time->AdvancedSearch->SearchValue2 = @$filter["y_slot_time"];
		$this->slot_time->AdvancedSearch->SearchOperator2 = @$filter["w_slot_time"];
		$this->slot_time->AdvancedSearch->save();

		// Field Fees
		$this->Fees->AdvancedSearch->SearchValue = @$filter["x_Fees"];
		$this->Fees->AdvancedSearch->SearchOperator = @$filter["z_Fees"];
		$this->Fees->AdvancedSearch->SearchCondition = @$filter["v_Fees"];
		$this->Fees->AdvancedSearch->SearchValue2 = @$filter["y_Fees"];
		$this->Fees->AdvancedSearch->SearchOperator2 = @$filter["w_Fees"];
		$this->Fees->AdvancedSearch->save();

		// Field ProfilePic
		$this->ProfilePic->AdvancedSearch->SearchValue = @$filter["x_ProfilePic"];
		$this->ProfilePic->AdvancedSearch->SearchOperator = @$filter["z_ProfilePic"];
		$this->ProfilePic->AdvancedSearch->SearchCondition = @$filter["v_ProfilePic"];
		$this->ProfilePic->AdvancedSearch->SearchValue2 = @$filter["y_ProfilePic"];
		$this->ProfilePic->AdvancedSearch->SearchOperator2 = @$filter["w_ProfilePic"];
		$this->ProfilePic->AdvancedSearch->save();

		// Field slot_days
		$this->slot_days->AdvancedSearch->SearchValue = @$filter["x_slot_days"];
		$this->slot_days->AdvancedSearch->SearchOperator = @$filter["z_slot_days"];
		$this->slot_days->AdvancedSearch->SearchCondition = @$filter["v_slot_days"];
		$this->slot_days->AdvancedSearch->SearchValue2 = @$filter["y_slot_days"];
		$this->slot_days->AdvancedSearch->SearchOperator2 = @$filter["w_slot_days"];
		$this->slot_days->AdvancedSearch->save();

		// Field Status
		$this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
		$this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
		$this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
		$this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
		$this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
		$this->Status->AdvancedSearch->save();

		// Field scheduler_id
		$this->scheduler_id->AdvancedSearch->SearchValue = @$filter["x_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchOperator = @$filter["z_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchCondition = @$filter["v_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchValue2 = @$filter["y_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchOperator2 = @$filter["w_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field Designation
		$this->Designation->AdvancedSearch->SearchValue = @$filter["x_Designation"];
		$this->Designation->AdvancedSearch->SearchOperator = @$filter["z_Designation"];
		$this->Designation->AdvancedSearch->SearchCondition = @$filter["v_Designation"];
		$this->Designation->AdvancedSearch->SearchValue2 = @$filter["y_Designation"];
		$this->Designation->AdvancedSearch->SearchOperator2 = @$filter["w_Designation"];
		$this->Designation->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->CODE, $default, FALSE); // CODE
		$this->buildSearchSql($where, $this->NAME, $default, FALSE); // NAME
		$this->buildSearchSql($where, $this->DEPARTMENT, $default, FALSE); // DEPARTMENT
		$this->buildSearchSql($where, $this->start_time, $default, FALSE); // start_time
		$this->buildSearchSql($where, $this->end_time, $default, FALSE); // end_time
		$this->buildSearchSql($where, $this->start_time1, $default, FALSE); // start_time1
		$this->buildSearchSql($where, $this->end_time1, $default, FALSE); // end_time1
		$this->buildSearchSql($where, $this->start_time2, $default, FALSE); // start_time2
		$this->buildSearchSql($where, $this->end_time2, $default, FALSE); // end_time2
		$this->buildSearchSql($where, $this->slot_time, $default, FALSE); // slot_time
		$this->buildSearchSql($where, $this->Fees, $default, FALSE); // Fees
		$this->buildSearchSql($where, $this->ProfilePic, $default, FALSE); // ProfilePic
		$this->buildSearchSql($where, $this->slot_days, $default, TRUE); // slot_days
		$this->buildSearchSql($where, $this->Status, $default, FALSE); // Status
		$this->buildSearchSql($where, $this->scheduler_id, $default, FALSE); // scheduler_id
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->Designation, $default, FALSE); // Designation

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->CODE->AdvancedSearch->save(); // CODE
			$this->NAME->AdvancedSearch->save(); // NAME
			$this->DEPARTMENT->AdvancedSearch->save(); // DEPARTMENT
			$this->start_time->AdvancedSearch->save(); // start_time
			$this->end_time->AdvancedSearch->save(); // end_time
			$this->start_time1->AdvancedSearch->save(); // start_time1
			$this->end_time1->AdvancedSearch->save(); // end_time1
			$this->start_time2->AdvancedSearch->save(); // start_time2
			$this->end_time2->AdvancedSearch->save(); // end_time2
			$this->slot_time->AdvancedSearch->save(); // slot_time
			$this->Fees->AdvancedSearch->save(); // Fees
			$this->ProfilePic->AdvancedSearch->save(); // ProfilePic
			$this->slot_days->AdvancedSearch->save(); // slot_days
			$this->Status->AdvancedSearch->save(); // Status
			$this->scheduler_id->AdvancedSearch->save(); // scheduler_id
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->Designation->AdvancedSearch->save(); // Designation
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
		$this->buildBasicSearchSql($where, $this->CODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DEPARTMENT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->start_time, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->end_time, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->start_time1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->end_time1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->start_time2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->end_time2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->slot_time, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProfilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->slot_days, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->scheduler_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Designation, $arKeywords, $type);
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
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DEPARTMENT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->start_time->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->end_time->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->start_time1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->end_time1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->start_time2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->end_time2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->slot_time->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Fees->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProfilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->slot_days->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->scheduler_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Designation->AdvancedSearch->issetSession())
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
		$this->id->AdvancedSearch->unsetSession();
		$this->CODE->AdvancedSearch->unsetSession();
		$this->NAME->AdvancedSearch->unsetSession();
		$this->DEPARTMENT->AdvancedSearch->unsetSession();
		$this->start_time->AdvancedSearch->unsetSession();
		$this->end_time->AdvancedSearch->unsetSession();
		$this->start_time1->AdvancedSearch->unsetSession();
		$this->end_time1->AdvancedSearch->unsetSession();
		$this->start_time2->AdvancedSearch->unsetSession();
		$this->end_time2->AdvancedSearch->unsetSession();
		$this->slot_time->AdvancedSearch->unsetSession();
		$this->Fees->AdvancedSearch->unsetSession();
		$this->ProfilePic->AdvancedSearch->unsetSession();
		$this->slot_days->AdvancedSearch->unsetSession();
		$this->Status->AdvancedSearch->unsetSession();
		$this->scheduler_id->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->Designation->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->CODE->AdvancedSearch->load();
		$this->NAME->AdvancedSearch->load();
		$this->DEPARTMENT->AdvancedSearch->load();
		$this->start_time->AdvancedSearch->load();
		$this->end_time->AdvancedSearch->load();
		$this->start_time1->AdvancedSearch->load();
		$this->end_time1->AdvancedSearch->load();
		$this->start_time2->AdvancedSearch->load();
		$this->end_time2->AdvancedSearch->load();
		$this->slot_time->AdvancedSearch->load();
		$this->Fees->AdvancedSearch->load();
		$this->ProfilePic->AdvancedSearch->load();
		$this->slot_days->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->scheduler_id->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Designation->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->CODE); // CODE
			$this->updateSort($this->NAME); // NAME
			$this->updateSort($this->DEPARTMENT); // DEPARTMENT
			$this->updateSort($this->start_time); // start_time
			$this->updateSort($this->end_time); // end_time
			$this->updateSort($this->start_time1); // start_time1
			$this->updateSort($this->end_time1); // end_time1
			$this->updateSort($this->start_time2); // start_time2
			$this->updateSort($this->end_time2); // end_time2
			$this->updateSort($this->slot_time); // slot_time
			$this->updateSort($this->Fees); // Fees
			$this->updateSort($this->slot_days); // slot_days
			$this->updateSort($this->Status); // Status
			$this->updateSort($this->scheduler_id); // scheduler_id
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->Designation); // Designation
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
				$this->id->setSort("DESC");
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
				$this->CODE->setSort("");
				$this->NAME->setSort("");
				$this->DEPARTMENT->setSort("");
				$this->start_time->setSort("");
				$this->end_time->setSort("");
				$this->start_time1->setSort("");
				$this->end_time1->setSort("");
				$this->start_time2->setSort("");
				$this->end_time2->setSort("");
				$this->slot_time->setSort("");
				$this->Fees->setSort("");
				$this->slot_days->setSort("");
				$this->Status->setSort("");
				$this->scheduler_id->setSort("");
				$this->HospID->setSort("");
				$this->Designation->setSort("");
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

		// "detail__appointment_scheduler"
		$item = &$this->ListOptions->add("detail__appointment_scheduler");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'appointment_scheduler') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["_appointment_scheduler_grid"]))
			$GLOBALS["_appointment_scheduler_grid"] = new _appointment_scheduler_grid();

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$this->ListOptions->add("details");
			$item->CssClass = "text-nowrap";
			$item->Visible = $this->ShowMultipleDetails;
			$item->OnLeft = TRUE;
			$item->ShowInButtonGroup = FALSE;
		}

		// Set up detail pages
		$pages = new SubPages();
		$pages->add("_appointment_scheduler");
		$this->DetailPages = $pages;

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
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail__appointment_scheduler"
		$opt = &$this->ListOptions->Items["detail__appointment_scheduler"];
		if ($Security->allowList(CurrentProjectID() . 'appointment_scheduler')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("_appointment_scheduler", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("_appointment_schedulerlist.php?" . TABLE_SHOW_MASTER . "=doctors&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "_appointment_scheduler";
			}
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "_appointment_scheduler";
			}
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "_appointment_scheduler";
			}
			if ($links <> "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
				$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
			}
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
			$opt->Body = $body;
			if ($this->ShowMultipleDetails)
				$opt->Visible = FALSE;
		}
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar <> "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar <> "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(TABLE_SHOW_DETAIL . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar <> "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(TABLE_SHOW_DETAIL . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links <> "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$opt = &$this->ListOptions->Items["details"];
			$opt->Body = $body;
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
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd__appointment_scheduler");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["_appointment_scheduler"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["_appointment_scheduler"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'appointment_scheduler') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "_appointment_scheduler";
		}

		// Add multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$option->add("detailsadd");
			$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=" . $detailTableLink);
			$caption = $Language->phrase("AddMasterDetailLink");
			$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
			$item->Visible = ($detailTableLink <> "" && $Security->canAdd());

			// Hide single master/detail items
			$ar = explode(",", $detailTableLink);
			$cnt = count($ar);
			for ($i = 0; $i < $cnt; $i++) {
				if ($item = &$option->getItem("detailadd_" . $ar[$i]))
					$item->Visible = FALSE;
			}
		}
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fdoctorslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fdoctorslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fdoctorslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fdoctorslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$links = "";
		$btngrps = "";
		$sqlwrk = "`DoctorID`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail__appointment_scheduler"
		if ($this->DetailPages->Items["_appointment_scheduler"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail__appointment_scheduler"];
			$url = "_appointment_schedulerpreview.php?t=doctors&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"_appointment_scheduler\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'appointment_scheduler')) {
				$label = $Language->TablePhrase("_appointment_scheduler", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"_appointment_scheduler\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("_appointment_schedulerlist.php?" . TABLE_SHOW_MASTER . "=doctors&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("_appointment_scheduler", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["_appointment_scheduler_grid"]))
				$GLOBALS["_appointment_scheduler_grid"] = new _appointment_scheduler_grid();
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["_appointment_scheduler_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'appointment_scheduler')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=_appointment_scheduler");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}

		// Hide detail items if necessary
		$this->ListOptions->hideDetailItemsForDropDown();

		// Column "preview"
		$option = &$this->ListOptions->getItem("preview");
		if (!$option) { // Add preview column
			$option = &$this->ListOptions->add("preview");
			$option->OnLeft = TRUE;
			if ($option->OnLeft) {
				$option->moveTo($this->ListOptions->itemPos("checkbox") + 1);
			} else {
				$option->moveTo($this->ListOptions->itemPos("checkbox"));
			}
			$option->Visible = !($this->isExport() || $this->isGridAdd() || $this->isGridEdit());
			$option->ShowInDropDown = FALSE;
			$option->ShowInButtonGroup = FALSE;
		}
		if ($option) {
			$option->Body = "<i class=\"ew-preview-row-btn ew-icon icon-expand\"></i>";
			$option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
			if ($option->Visible)
				$option->Visible = $links <> "";
		}

		// Column "details" (Multiple details)
		$option = &$this->ListOptions->getItem("details");
		if ($option) {
			$option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
			if ($option->Visible)
				$option->Visible = $links <> "";
		}
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
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// CODE
		if (!$this->isAddOrEdit())
			$this->CODE->AdvancedSearch->setSearchValue(Get("x_CODE", Get("CODE", "")));
		if ($this->CODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CODE->AdvancedSearch->setSearchOperator(Get("z_CODE", ""));

		// NAME
		if (!$this->isAddOrEdit())
			$this->NAME->AdvancedSearch->setSearchValue(Get("x_NAME", Get("NAME", "")));
		if ($this->NAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NAME->AdvancedSearch->setSearchOperator(Get("z_NAME", ""));

		// DEPARTMENT
		if (!$this->isAddOrEdit())
			$this->DEPARTMENT->AdvancedSearch->setSearchValue(Get("x_DEPARTMENT", Get("DEPARTMENT", "")));
		if ($this->DEPARTMENT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DEPARTMENT->AdvancedSearch->setSearchOperator(Get("z_DEPARTMENT", ""));

		// start_time
		if (!$this->isAddOrEdit())
			$this->start_time->AdvancedSearch->setSearchValue(Get("x_start_time", Get("start_time", "")));
		if ($this->start_time->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->start_time->AdvancedSearch->setSearchOperator(Get("z_start_time", ""));

		// end_time
		if (!$this->isAddOrEdit())
			$this->end_time->AdvancedSearch->setSearchValue(Get("x_end_time", Get("end_time", "")));
		if ($this->end_time->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->end_time->AdvancedSearch->setSearchOperator(Get("z_end_time", ""));

		// start_time1
		if (!$this->isAddOrEdit())
			$this->start_time1->AdvancedSearch->setSearchValue(Get("x_start_time1", Get("start_time1", "")));
		if ($this->start_time1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->start_time1->AdvancedSearch->setSearchOperator(Get("z_start_time1", ""));

		// end_time1
		if (!$this->isAddOrEdit())
			$this->end_time1->AdvancedSearch->setSearchValue(Get("x_end_time1", Get("end_time1", "")));
		if ($this->end_time1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->end_time1->AdvancedSearch->setSearchOperator(Get("z_end_time1", ""));

		// start_time2
		if (!$this->isAddOrEdit())
			$this->start_time2->AdvancedSearch->setSearchValue(Get("x_start_time2", Get("start_time2", "")));
		if ($this->start_time2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->start_time2->AdvancedSearch->setSearchOperator(Get("z_start_time2", ""));

		// end_time2
		if (!$this->isAddOrEdit())
			$this->end_time2->AdvancedSearch->setSearchValue(Get("x_end_time2", Get("end_time2", "")));
		if ($this->end_time2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->end_time2->AdvancedSearch->setSearchOperator(Get("z_end_time2", ""));

		// slot_time
		if (!$this->isAddOrEdit())
			$this->slot_time->AdvancedSearch->setSearchValue(Get("x_slot_time", Get("slot_time", "")));
		if ($this->slot_time->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->slot_time->AdvancedSearch->setSearchOperator(Get("z_slot_time", ""));

		// Fees
		if (!$this->isAddOrEdit())
			$this->Fees->AdvancedSearch->setSearchValue(Get("x_Fees", Get("Fees", "")));
		if ($this->Fees->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Fees->AdvancedSearch->setSearchOperator(Get("z_Fees", ""));

		// ProfilePic
		if (!$this->isAddOrEdit())
			$this->ProfilePic->AdvancedSearch->setSearchValue(Get("x_ProfilePic", Get("ProfilePic", "")));
		if ($this->ProfilePic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ProfilePic->AdvancedSearch->setSearchOperator(Get("z_ProfilePic", ""));

		// slot_days
		if (!$this->isAddOrEdit())
			$this->slot_days->AdvancedSearch->setSearchValue(Get("x_slot_days", Get("slot_days", "")));
		if ($this->slot_days->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->slot_days->AdvancedSearch->setSearchOperator(Get("z_slot_days", ""));
		if (is_array($this->slot_days->AdvancedSearch->SearchValue))
			$this->slot_days->AdvancedSearch->SearchValue = implode(",", $this->slot_days->AdvancedSearch->SearchValue);
		if (is_array($this->slot_days->AdvancedSearch->SearchValue2))
			$this->slot_days->AdvancedSearch->SearchValue2 = implode(",", $this->slot_days->AdvancedSearch->SearchValue2);

		// Status
		if (!$this->isAddOrEdit())
			$this->Status->AdvancedSearch->setSearchValue(Get("x_Status", Get("Status", "")));
		if ($this->Status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Status->AdvancedSearch->setSearchOperator(Get("z_Status", ""));

		// scheduler_id
		if (!$this->isAddOrEdit())
			$this->scheduler_id->AdvancedSearch->setSearchValue(Get("x_scheduler_id", Get("scheduler_id", "")));
		if ($this->scheduler_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->scheduler_id->AdvancedSearch->setSearchOperator(Get("z_scheduler_id", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// Designation
		if (!$this->isAddOrEdit())
			$this->Designation->AdvancedSearch->setSearchValue(Get("x_Designation", Get("Designation", "")));
		if ($this->Designation->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Designation->AdvancedSearch->setSearchOperator(Get("z_Designation", ""));
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
		$this->CODE->setDbValue($row['CODE']);
		$this->NAME->setDbValue($row['NAME']);
		$this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
		$this->start_time->setDbValue($row['start_time']);
		$this->end_time->setDbValue($row['end_time']);
		$this->start_time1->setDbValue($row['start_time1']);
		$this->end_time1->setDbValue($row['end_time1']);
		$this->start_time2->setDbValue($row['start_time2']);
		$this->end_time2->setDbValue($row['end_time2']);
		$this->slot_time->setDbValue($row['slot_time']);
		$this->Fees->setDbValue($row['Fees']);
		$this->ProfilePic->Upload->DbValue = $row['ProfilePic'];
		$this->ProfilePic->setDbValue($this->ProfilePic->Upload->DbValue);
		$this->slot_days->setDbValue($row['slot_days']);
		$this->Status->setDbValue($row['Status']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Designation->setDbValue($row['Designation']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['CODE'] = NULL;
		$row['NAME'] = NULL;
		$row['DEPARTMENT'] = NULL;
		$row['start_time'] = NULL;
		$row['end_time'] = NULL;
		$row['start_time1'] = NULL;
		$row['end_time1'] = NULL;
		$row['start_time2'] = NULL;
		$row['end_time2'] = NULL;
		$row['slot_time'] = NULL;
		$row['Fees'] = NULL;
		$row['ProfilePic'] = NULL;
		$row['slot_days'] = NULL;
		$row['Status'] = NULL;
		$row['scheduler_id'] = NULL;
		$row['HospID'] = NULL;
		$row['Designation'] = NULL;
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
		if ($this->Fees->FormValue == $this->Fees->CurrentValue && is_numeric(ConvertToFloatString($this->Fees->CurrentValue)))
			$this->Fees->CurrentValue = ConvertToFloatString($this->Fees->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// CODE
		// NAME
		// DEPARTMENT
		// start_time
		// end_time
		// start_time1
		// end_time1
		// start_time2
		// end_time2
		// slot_time
		// Fees
		// ProfilePic
		// slot_days
		// Status
		// scheduler_id
		// HospID
		// Designation

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// CODE
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->ViewCustomAttributes = "";

			// NAME
			$this->NAME->ViewValue = $this->NAME->CurrentValue;
			$this->NAME->ViewCustomAttributes = "";

			// DEPARTMENT
			$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
			$this->DEPARTMENT->ViewCustomAttributes = "";

			// start_time
			$this->start_time->ViewValue = $this->start_time->CurrentValue;
			$this->start_time->ViewCustomAttributes = "";

			// end_time
			$this->end_time->ViewValue = $this->end_time->CurrentValue;
			$this->end_time->ViewCustomAttributes = "";

			// start_time1
			$this->start_time1->ViewValue = $this->start_time1->CurrentValue;
			$this->start_time1->ViewCustomAttributes = "";

			// end_time1
			$this->end_time1->ViewValue = $this->end_time1->CurrentValue;
			$this->end_time1->ViewCustomAttributes = "";

			// start_time2
			$this->start_time2->ViewValue = $this->start_time2->CurrentValue;
			$this->start_time2->ViewCustomAttributes = "";

			// end_time2
			$this->end_time2->ViewValue = $this->end_time2->CurrentValue;
			$this->end_time2->ViewCustomAttributes = "";

			// slot_time
			$this->slot_time->ViewValue = $this->slot_time->CurrentValue;
			$this->slot_time->ViewCustomAttributes = "";

			// Fees
			$this->Fees->ViewValue = $this->Fees->CurrentValue;
			$this->Fees->ViewValue = FormatNumber($this->Fees->ViewValue, 2, -2, -2, -2);
			$this->Fees->ViewCustomAttributes = "";

			// slot_days
			$curVal = strval($this->slot_days->CurrentValue);
			if ($curVal <> "") {
				$this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
				if ($this->slot_days->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->slot_days->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->slot_days->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->slot_days->ViewValue->add($this->slot_days->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->slot_days->ViewValue = $this->slot_days->CurrentValue;
					}
				}
			} else {
				$this->slot_days->ViewValue = NULL;
			}
			$this->slot_days->ViewCustomAttributes = "";

			// Status
			$curVal = strval($this->Status->CurrentValue);
			if ($curVal <> "") {
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
				if ($this->Status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Status->ViewValue = $this->Status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Status->ViewValue = $this->Status->CurrentValue;
					}
				}
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Designation
			$this->Designation->ViewValue = $this->Designation->CurrentValue;
			$this->Designation->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";
			$this->CODE->TooltipValue = "";

			// NAME
			$this->NAME->LinkCustomAttributes = "";
			$this->NAME->HrefValue = "";
			$this->NAME->TooltipValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";
			$this->DEPARTMENT->TooltipValue = "";

			// start_time
			$this->start_time->LinkCustomAttributes = "";
			$this->start_time->HrefValue = "";
			$this->start_time->TooltipValue = "";

			// end_time
			$this->end_time->LinkCustomAttributes = "";
			$this->end_time->HrefValue = "";
			$this->end_time->TooltipValue = "";

			// start_time1
			$this->start_time1->LinkCustomAttributes = "";
			$this->start_time1->HrefValue = "";
			$this->start_time1->TooltipValue = "";

			// end_time1
			$this->end_time1->LinkCustomAttributes = "";
			$this->end_time1->HrefValue = "";
			$this->end_time1->TooltipValue = "";

			// start_time2
			$this->start_time2->LinkCustomAttributes = "";
			$this->start_time2->HrefValue = "";
			$this->start_time2->TooltipValue = "";

			// end_time2
			$this->end_time2->LinkCustomAttributes = "";
			$this->end_time2->HrefValue = "";
			$this->end_time2->TooltipValue = "";

			// slot_time
			$this->slot_time->LinkCustomAttributes = "";
			$this->slot_time->HrefValue = "";
			$this->slot_time->TooltipValue = "";

			// Fees
			$this->Fees->LinkCustomAttributes = "";
			$this->Fees->HrefValue = "";
			$this->Fees->TooltipValue = "";

			// slot_days
			$this->slot_days->LinkCustomAttributes = "";
			$this->slot_days->HrefValue = "";
			$this->slot_days->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Designation
			$this->Designation->LinkCustomAttributes = "";
			$this->Designation->HrefValue = "";
			$this->Designation->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// CODE
			$this->CODE->EditAttrs["class"] = "form-control";
			$this->CODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CODE->AdvancedSearch->SearchValue = HtmlDecode($this->CODE->AdvancedSearch->SearchValue);
			$this->CODE->EditValue = HtmlEncode($this->CODE->AdvancedSearch->SearchValue);
			$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

			// NAME
			$this->NAME->EditAttrs["class"] = "form-control";
			$this->NAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NAME->AdvancedSearch->SearchValue = HtmlDecode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->EditValue = HtmlEncode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

			// DEPARTMENT
			$this->DEPARTMENT->EditAttrs["class"] = "form-control";
			$this->DEPARTMENT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEPARTMENT->AdvancedSearch->SearchValue = HtmlDecode($this->DEPARTMENT->AdvancedSearch->SearchValue);
			$this->DEPARTMENT->EditValue = HtmlEncode($this->DEPARTMENT->AdvancedSearch->SearchValue);
			$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

			// start_time
			$this->start_time->EditAttrs["class"] = "form-control";
			$this->start_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time->AdvancedSearch->SearchValue = HtmlDecode($this->start_time->AdvancedSearch->SearchValue);
			$this->start_time->EditValue = HtmlEncode($this->start_time->AdvancedSearch->SearchValue);
			$this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

			// end_time
			$this->end_time->EditAttrs["class"] = "form-control";
			$this->end_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time->AdvancedSearch->SearchValue = HtmlDecode($this->end_time->AdvancedSearch->SearchValue);
			$this->end_time->EditValue = HtmlEncode($this->end_time->AdvancedSearch->SearchValue);
			$this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

			// start_time1
			$this->start_time1->EditAttrs["class"] = "form-control";
			$this->start_time1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time1->AdvancedSearch->SearchValue = HtmlDecode($this->start_time1->AdvancedSearch->SearchValue);
			$this->start_time1->EditValue = HtmlEncode($this->start_time1->AdvancedSearch->SearchValue);
			$this->start_time1->PlaceHolder = RemoveHtml($this->start_time1->caption());

			// end_time1
			$this->end_time1->EditAttrs["class"] = "form-control";
			$this->end_time1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time1->AdvancedSearch->SearchValue = HtmlDecode($this->end_time1->AdvancedSearch->SearchValue);
			$this->end_time1->EditValue = HtmlEncode($this->end_time1->AdvancedSearch->SearchValue);
			$this->end_time1->PlaceHolder = RemoveHtml($this->end_time1->caption());

			// start_time2
			$this->start_time2->EditAttrs["class"] = "form-control";
			$this->start_time2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time2->AdvancedSearch->SearchValue = HtmlDecode($this->start_time2->AdvancedSearch->SearchValue);
			$this->start_time2->EditValue = HtmlEncode($this->start_time2->AdvancedSearch->SearchValue);
			$this->start_time2->PlaceHolder = RemoveHtml($this->start_time2->caption());

			// end_time2
			$this->end_time2->EditAttrs["class"] = "form-control";
			$this->end_time2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time2->AdvancedSearch->SearchValue = HtmlDecode($this->end_time2->AdvancedSearch->SearchValue);
			$this->end_time2->EditValue = HtmlEncode($this->end_time2->AdvancedSearch->SearchValue);
			$this->end_time2->PlaceHolder = RemoveHtml($this->end_time2->caption());

			// slot_time
			$this->slot_time->EditAttrs["class"] = "form-control";
			$this->slot_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->slot_time->AdvancedSearch->SearchValue = HtmlDecode($this->slot_time->AdvancedSearch->SearchValue);
			$this->slot_time->EditValue = HtmlEncode($this->slot_time->AdvancedSearch->SearchValue);
			$this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

			// Fees
			$this->Fees->EditAttrs["class"] = "form-control";
			$this->Fees->EditCustomAttributes = "";
			$this->Fees->EditValue = HtmlEncode($this->Fees->AdvancedSearch->SearchValue);
			$this->Fees->PlaceHolder = RemoveHtml($this->Fees->caption());

			// slot_days
			$this->slot_days->EditCustomAttributes = "";

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->scheduler_id->AdvancedSearch->SearchValue = HtmlDecode($this->scheduler_id->AdvancedSearch->SearchValue);
			$this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->AdvancedSearch->SearchValue);
			$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Designation
			$this->Designation->EditAttrs["class"] = "form-control";
			$this->Designation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Designation->AdvancedSearch->SearchValue = HtmlDecode($this->Designation->AdvancedSearch->SearchValue);
			$this->Designation->EditValue = HtmlEncode($this->Designation->AdvancedSearch->SearchValue);
			$this->Designation->PlaceHolder = RemoveHtml($this->Designation->caption());
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
		$this->id->AdvancedSearch->load();
		$this->CODE->AdvancedSearch->load();
		$this->NAME->AdvancedSearch->load();
		$this->DEPARTMENT->AdvancedSearch->load();
		$this->start_time->AdvancedSearch->load();
		$this->end_time->AdvancedSearch->load();
		$this->start_time1->AdvancedSearch->load();
		$this->end_time1->AdvancedSearch->load();
		$this->start_time2->AdvancedSearch->load();
		$this->end_time2->AdvancedSearch->load();
		$this->slot_time->AdvancedSearch->load();
		$this->Fees->AdvancedSearch->load();
		$this->ProfilePic->AdvancedSearch->load();
		$this->slot_days->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->scheduler_id->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Designation->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fdoctorslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fdoctorslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fdoctorslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_doctors\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_doctors',hdr:ew.language.phrase('ExportToEmailText'),f:document.fdoctorslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_slot_days":
							break;
						case "x_Status":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_gst_output_list extends view_gst_output
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_gst_output';

	// Page object name
	public $PageObjName = "view_gst_output_list";

	// Grid form hidden field names
	public $FormName = "fview_gst_outputlist";
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

		// Table object (view_gst_output)
		if (!isset($GLOBALS["view_gst_output"]) || get_class($GLOBALS["view_gst_output"]) == PROJECT_NAMESPACE . "view_gst_output") {
			$GLOBALS["view_gst_output"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_gst_output"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_gst_outputadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_gst_outputdelete.php";
		$this->MultiUpdateUrl = "view_gst_outputupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_gst_output');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_gst_outputlistsrch";

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
		global $EXPORT, $view_gst_output;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_gst_output);
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
		if ($this->isAddOrEdit())
			$this->HosoID->Visible = FALSE;
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
		$this->BillDate->setVisibility();
		$this->IP_2_525_SGST->setVisibility();
		$this->IP_2_525_CGST->setVisibility();
		$this->IP_6_025_SGST->setVisibility();
		$this->IP_6_025_CGST->setVisibility();
		$this->IP_9_025_SGST->setVisibility();
		$this->IP_9_025_CGST->setVisibility();
		$this->IP_14_025_SGST->setVisibility();
		$this->IP_14_025_CGST->setVisibility();
		$this->OP_2_525_SGST->setVisibility();
		$this->OP_2_525_CGST->setVisibility();
		$this->OP_6_025_SGST->setVisibility();
		$this->OP_6_025_CGST->setVisibility();
		$this->OP_9_025_SGST->setVisibility();
		$this->OP_9_025_CGST->setVisibility();
		$this->OP_14_025_SGST->setVisibility();
		$this->OP_14_025_CGST->setVisibility();
		$this->HosoID->setVisibility();
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
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_gst_outputlistsrch");
		$filterList = Concat($filterList, $this->BillDate->AdvancedSearch->toJson(), ","); // Field BillDate
		$filterList = Concat($filterList, $this->IP_2_525_SGST->AdvancedSearch->toJson(), ","); // Field IP 2.5% SGST
		$filterList = Concat($filterList, $this->IP_2_525_CGST->AdvancedSearch->toJson(), ","); // Field IP 2.5% CGST
		$filterList = Concat($filterList, $this->IP_6_025_SGST->AdvancedSearch->toJson(), ","); // Field IP 6.0% SGST
		$filterList = Concat($filterList, $this->IP_6_025_CGST->AdvancedSearch->toJson(), ","); // Field IP 6.0% CGST
		$filterList = Concat($filterList, $this->IP_9_025_SGST->AdvancedSearch->toJson(), ","); // Field IP 9.0% SGST
		$filterList = Concat($filterList, $this->IP_9_025_CGST->AdvancedSearch->toJson(), ","); // Field IP 9.0% CGST
		$filterList = Concat($filterList, $this->IP_14_025_SGST->AdvancedSearch->toJson(), ","); // Field IP 14.0% SGST
		$filterList = Concat($filterList, $this->IP_14_025_CGST->AdvancedSearch->toJson(), ","); // Field IP 14.0% CGST
		$filterList = Concat($filterList, $this->OP_2_525_SGST->AdvancedSearch->toJson(), ","); // Field OP 2.5% SGST
		$filterList = Concat($filterList, $this->OP_2_525_CGST->AdvancedSearch->toJson(), ","); // Field OP 2.5% CGST
		$filterList = Concat($filterList, $this->OP_6_025_SGST->AdvancedSearch->toJson(), ","); // Field OP 6.0% SGST
		$filterList = Concat($filterList, $this->OP_6_025_CGST->AdvancedSearch->toJson(), ","); // Field OP 6.0% CGST
		$filterList = Concat($filterList, $this->OP_9_025_SGST->AdvancedSearch->toJson(), ","); // Field OP 9.0% SGST
		$filterList = Concat($filterList, $this->OP_9_025_CGST->AdvancedSearch->toJson(), ","); // Field OP 9.0% CGST
		$filterList = Concat($filterList, $this->OP_14_025_SGST->AdvancedSearch->toJson(), ","); // Field OP 14.0% SGST
		$filterList = Concat($filterList, $this->OP_14_025_CGST->AdvancedSearch->toJson(), ","); // Field OP 14.0% CGST
		$filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID

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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_gst_outputlistsrch", $filters);
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

		// Field BillDate
		$this->BillDate->AdvancedSearch->SearchValue = @$filter["x_BillDate"];
		$this->BillDate->AdvancedSearch->SearchOperator = @$filter["z_BillDate"];
		$this->BillDate->AdvancedSearch->SearchCondition = @$filter["v_BillDate"];
		$this->BillDate->AdvancedSearch->SearchValue2 = @$filter["y_BillDate"];
		$this->BillDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillDate"];
		$this->BillDate->AdvancedSearch->save();

		// Field IP 2.5% SGST
		$this->IP_2_525_SGST->AdvancedSearch->SearchValue = @$filter["x_IP_2_525_SGST"];
		$this->IP_2_525_SGST->AdvancedSearch->SearchOperator = @$filter["z_IP_2_525_SGST"];
		$this->IP_2_525_SGST->AdvancedSearch->SearchCondition = @$filter["v_IP_2_525_SGST"];
		$this->IP_2_525_SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_2_525_SGST"];
		$this->IP_2_525_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_2_525_SGST"];
		$this->IP_2_525_SGST->AdvancedSearch->save();

		// Field IP 2.5% CGST
		$this->IP_2_525_CGST->AdvancedSearch->SearchValue = @$filter["x_IP_2_525_CGST"];
		$this->IP_2_525_CGST->AdvancedSearch->SearchOperator = @$filter["z_IP_2_525_CGST"];
		$this->IP_2_525_CGST->AdvancedSearch->SearchCondition = @$filter["v_IP_2_525_CGST"];
		$this->IP_2_525_CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_2_525_CGST"];
		$this->IP_2_525_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_2_525_CGST"];
		$this->IP_2_525_CGST->AdvancedSearch->save();

		// Field IP 6.0% SGST
		$this->IP_6_025_SGST->AdvancedSearch->SearchValue = @$filter["x_IP_6_025_SGST"];
		$this->IP_6_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_IP_6_025_SGST"];
		$this->IP_6_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_IP_6_025_SGST"];
		$this->IP_6_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_6_025_SGST"];
		$this->IP_6_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_6_025_SGST"];
		$this->IP_6_025_SGST->AdvancedSearch->save();

		// Field IP 6.0% CGST
		$this->IP_6_025_CGST->AdvancedSearch->SearchValue = @$filter["x_IP_6_025_CGST"];
		$this->IP_6_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_IP_6_025_CGST"];
		$this->IP_6_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_IP_6_025_CGST"];
		$this->IP_6_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_6_025_CGST"];
		$this->IP_6_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_6_025_CGST"];
		$this->IP_6_025_CGST->AdvancedSearch->save();

		// Field IP 9.0% SGST
		$this->IP_9_025_SGST->AdvancedSearch->SearchValue = @$filter["x_IP_9_025_SGST"];
		$this->IP_9_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_IP_9_025_SGST"];
		$this->IP_9_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_IP_9_025_SGST"];
		$this->IP_9_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_9_025_SGST"];
		$this->IP_9_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_9_025_SGST"];
		$this->IP_9_025_SGST->AdvancedSearch->save();

		// Field IP 9.0% CGST
		$this->IP_9_025_CGST->AdvancedSearch->SearchValue = @$filter["x_IP_9_025_CGST"];
		$this->IP_9_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_IP_9_025_CGST"];
		$this->IP_9_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_IP_9_025_CGST"];
		$this->IP_9_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_9_025_CGST"];
		$this->IP_9_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_9_025_CGST"];
		$this->IP_9_025_CGST->AdvancedSearch->save();

		// Field IP 14.0% SGST
		$this->IP_14_025_SGST->AdvancedSearch->SearchValue = @$filter["x_IP_14_025_SGST"];
		$this->IP_14_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_IP_14_025_SGST"];
		$this->IP_14_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_IP_14_025_SGST"];
		$this->IP_14_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_14_025_SGST"];
		$this->IP_14_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_14_025_SGST"];
		$this->IP_14_025_SGST->AdvancedSearch->save();

		// Field IP 14.0% CGST
		$this->IP_14_025_CGST->AdvancedSearch->SearchValue = @$filter["x_IP_14_025_CGST"];
		$this->IP_14_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_IP_14_025_CGST"];
		$this->IP_14_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_IP_14_025_CGST"];
		$this->IP_14_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP_14_025_CGST"];
		$this->IP_14_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP_14_025_CGST"];
		$this->IP_14_025_CGST->AdvancedSearch->save();

		// Field OP 2.5% SGST
		$this->OP_2_525_SGST->AdvancedSearch->SearchValue = @$filter["x_OP_2_525_SGST"];
		$this->OP_2_525_SGST->AdvancedSearch->SearchOperator = @$filter["z_OP_2_525_SGST"];
		$this->OP_2_525_SGST->AdvancedSearch->SearchCondition = @$filter["v_OP_2_525_SGST"];
		$this->OP_2_525_SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_2_525_SGST"];
		$this->OP_2_525_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_2_525_SGST"];
		$this->OP_2_525_SGST->AdvancedSearch->save();

		// Field OP 2.5% CGST
		$this->OP_2_525_CGST->AdvancedSearch->SearchValue = @$filter["x_OP_2_525_CGST"];
		$this->OP_2_525_CGST->AdvancedSearch->SearchOperator = @$filter["z_OP_2_525_CGST"];
		$this->OP_2_525_CGST->AdvancedSearch->SearchCondition = @$filter["v_OP_2_525_CGST"];
		$this->OP_2_525_CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_2_525_CGST"];
		$this->OP_2_525_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_2_525_CGST"];
		$this->OP_2_525_CGST->AdvancedSearch->save();

		// Field OP 6.0% SGST
		$this->OP_6_025_SGST->AdvancedSearch->SearchValue = @$filter["x_OP_6_025_SGST"];
		$this->OP_6_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_OP_6_025_SGST"];
		$this->OP_6_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_OP_6_025_SGST"];
		$this->OP_6_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_6_025_SGST"];
		$this->OP_6_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_6_025_SGST"];
		$this->OP_6_025_SGST->AdvancedSearch->save();

		// Field OP 6.0% CGST
		$this->OP_6_025_CGST->AdvancedSearch->SearchValue = @$filter["x_OP_6_025_CGST"];
		$this->OP_6_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_OP_6_025_CGST"];
		$this->OP_6_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_OP_6_025_CGST"];
		$this->OP_6_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_6_025_CGST"];
		$this->OP_6_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_6_025_CGST"];
		$this->OP_6_025_CGST->AdvancedSearch->save();

		// Field OP 9.0% SGST
		$this->OP_9_025_SGST->AdvancedSearch->SearchValue = @$filter["x_OP_9_025_SGST"];
		$this->OP_9_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_OP_9_025_SGST"];
		$this->OP_9_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_OP_9_025_SGST"];
		$this->OP_9_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_9_025_SGST"];
		$this->OP_9_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_9_025_SGST"];
		$this->OP_9_025_SGST->AdvancedSearch->save();

		// Field OP 9.0% CGST
		$this->OP_9_025_CGST->AdvancedSearch->SearchValue = @$filter["x_OP_9_025_CGST"];
		$this->OP_9_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_OP_9_025_CGST"];
		$this->OP_9_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_OP_9_025_CGST"];
		$this->OP_9_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_9_025_CGST"];
		$this->OP_9_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_9_025_CGST"];
		$this->OP_9_025_CGST->AdvancedSearch->save();

		// Field OP 14.0% SGST
		$this->OP_14_025_SGST->AdvancedSearch->SearchValue = @$filter["x_OP_14_025_SGST"];
		$this->OP_14_025_SGST->AdvancedSearch->SearchOperator = @$filter["z_OP_14_025_SGST"];
		$this->OP_14_025_SGST->AdvancedSearch->SearchCondition = @$filter["v_OP_14_025_SGST"];
		$this->OP_14_025_SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_14_025_SGST"];
		$this->OP_14_025_SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_14_025_SGST"];
		$this->OP_14_025_SGST->AdvancedSearch->save();

		// Field OP 14.0% CGST
		$this->OP_14_025_CGST->AdvancedSearch->SearchValue = @$filter["x_OP_14_025_CGST"];
		$this->OP_14_025_CGST->AdvancedSearch->SearchOperator = @$filter["z_OP_14_025_CGST"];
		$this->OP_14_025_CGST->AdvancedSearch->SearchCondition = @$filter["v_OP_14_025_CGST"];
		$this->OP_14_025_CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP_14_025_CGST"];
		$this->OP_14_025_CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP_14_025_CGST"];
		$this->OP_14_025_CGST->AdvancedSearch->save();

		// Field HosoID
		$this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
		$this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
		$this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
		$this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
		$this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
		$this->HosoID->AdvancedSearch->save();
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->BillDate, $default, FALSE); // BillDate
		$this->buildSearchSql($where, $this->IP_2_525_SGST, $default, FALSE); // IP 2.5% SGST
		$this->buildSearchSql($where, $this->IP_2_525_CGST, $default, FALSE); // IP 2.5% CGST
		$this->buildSearchSql($where, $this->IP_6_025_SGST, $default, FALSE); // IP 6.0% SGST
		$this->buildSearchSql($where, $this->IP_6_025_CGST, $default, FALSE); // IP 6.0% CGST
		$this->buildSearchSql($where, $this->IP_9_025_SGST, $default, FALSE); // IP 9.0% SGST
		$this->buildSearchSql($where, $this->IP_9_025_CGST, $default, FALSE); // IP 9.0% CGST
		$this->buildSearchSql($where, $this->IP_14_025_SGST, $default, FALSE); // IP 14.0% SGST
		$this->buildSearchSql($where, $this->IP_14_025_CGST, $default, FALSE); // IP 14.0% CGST
		$this->buildSearchSql($where, $this->OP_2_525_SGST, $default, FALSE); // OP 2.5% SGST
		$this->buildSearchSql($where, $this->OP_2_525_CGST, $default, FALSE); // OP 2.5% CGST
		$this->buildSearchSql($where, $this->OP_6_025_SGST, $default, FALSE); // OP 6.0% SGST
		$this->buildSearchSql($where, $this->OP_6_025_CGST, $default, FALSE); // OP 6.0% CGST
		$this->buildSearchSql($where, $this->OP_9_025_SGST, $default, FALSE); // OP 9.0% SGST
		$this->buildSearchSql($where, $this->OP_9_025_CGST, $default, FALSE); // OP 9.0% CGST
		$this->buildSearchSql($where, $this->OP_14_025_SGST, $default, FALSE); // OP 14.0% SGST
		$this->buildSearchSql($where, $this->OP_14_025_CGST, $default, FALSE); // OP 14.0% CGST
		$this->buildSearchSql($where, $this->HosoID, $default, FALSE); // HosoID

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BillDate->AdvancedSearch->save(); // BillDate
			$this->IP_2_525_SGST->AdvancedSearch->save(); // IP 2.5% SGST
			$this->IP_2_525_CGST->AdvancedSearch->save(); // IP 2.5% CGST
			$this->IP_6_025_SGST->AdvancedSearch->save(); // IP 6.0% SGST
			$this->IP_6_025_CGST->AdvancedSearch->save(); // IP 6.0% CGST
			$this->IP_9_025_SGST->AdvancedSearch->save(); // IP 9.0% SGST
			$this->IP_9_025_CGST->AdvancedSearch->save(); // IP 9.0% CGST
			$this->IP_14_025_SGST->AdvancedSearch->save(); // IP 14.0% SGST
			$this->IP_14_025_CGST->AdvancedSearch->save(); // IP 14.0% CGST
			$this->OP_2_525_SGST->AdvancedSearch->save(); // OP 2.5% SGST
			$this->OP_2_525_CGST->AdvancedSearch->save(); // OP 2.5% CGST
			$this->OP_6_025_SGST->AdvancedSearch->save(); // OP 6.0% SGST
			$this->OP_6_025_CGST->AdvancedSearch->save(); // OP 6.0% CGST
			$this->OP_9_025_SGST->AdvancedSearch->save(); // OP 9.0% SGST
			$this->OP_9_025_CGST->AdvancedSearch->save(); // OP 9.0% CGST
			$this->OP_14_025_SGST->AdvancedSearch->save(); // OP 14.0% SGST
			$this->OP_14_025_CGST->AdvancedSearch->save(); // OP 14.0% CGST
			$this->HosoID->AdvancedSearch->save(); // HosoID
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

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->BillDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_2_525_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_2_525_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_6_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_6_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_9_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_9_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_14_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_14_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_2_525_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_2_525_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_6_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_6_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_9_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_9_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_14_025_SGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OP_14_025_CGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HosoID->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->BillDate->AdvancedSearch->unsetSession();
		$this->IP_2_525_SGST->AdvancedSearch->unsetSession();
		$this->IP_2_525_CGST->AdvancedSearch->unsetSession();
		$this->IP_6_025_SGST->AdvancedSearch->unsetSession();
		$this->IP_6_025_CGST->AdvancedSearch->unsetSession();
		$this->IP_9_025_SGST->AdvancedSearch->unsetSession();
		$this->IP_9_025_CGST->AdvancedSearch->unsetSession();
		$this->IP_14_025_SGST->AdvancedSearch->unsetSession();
		$this->IP_14_025_CGST->AdvancedSearch->unsetSession();
		$this->OP_2_525_SGST->AdvancedSearch->unsetSession();
		$this->OP_2_525_CGST->AdvancedSearch->unsetSession();
		$this->OP_6_025_SGST->AdvancedSearch->unsetSession();
		$this->OP_6_025_CGST->AdvancedSearch->unsetSession();
		$this->OP_9_025_SGST->AdvancedSearch->unsetSession();
		$this->OP_9_025_CGST->AdvancedSearch->unsetSession();
		$this->OP_14_025_SGST->AdvancedSearch->unsetSession();
		$this->OP_14_025_CGST->AdvancedSearch->unsetSession();
		$this->HosoID->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->BillDate->AdvancedSearch->load();
		$this->IP_2_525_SGST->AdvancedSearch->load();
		$this->IP_2_525_CGST->AdvancedSearch->load();
		$this->IP_6_025_SGST->AdvancedSearch->load();
		$this->IP_6_025_CGST->AdvancedSearch->load();
		$this->IP_9_025_SGST->AdvancedSearch->load();
		$this->IP_9_025_CGST->AdvancedSearch->load();
		$this->IP_14_025_SGST->AdvancedSearch->load();
		$this->IP_14_025_CGST->AdvancedSearch->load();
		$this->OP_2_525_SGST->AdvancedSearch->load();
		$this->OP_2_525_CGST->AdvancedSearch->load();
		$this->OP_6_025_SGST->AdvancedSearch->load();
		$this->OP_6_025_CGST->AdvancedSearch->load();
		$this->OP_9_025_SGST->AdvancedSearch->load();
		$this->OP_9_025_CGST->AdvancedSearch->load();
		$this->OP_14_025_SGST->AdvancedSearch->load();
		$this->OP_14_025_CGST->AdvancedSearch->load();
		$this->HosoID->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->BillDate); // BillDate
			$this->updateSort($this->IP_2_525_SGST); // IP 2.5% SGST
			$this->updateSort($this->IP_2_525_CGST); // IP 2.5% CGST
			$this->updateSort($this->IP_6_025_SGST); // IP 6.0% SGST
			$this->updateSort($this->IP_6_025_CGST); // IP 6.0% CGST
			$this->updateSort($this->IP_9_025_SGST); // IP 9.0% SGST
			$this->updateSort($this->IP_9_025_CGST); // IP 9.0% CGST
			$this->updateSort($this->IP_14_025_SGST); // IP 14.0% SGST
			$this->updateSort($this->IP_14_025_CGST); // IP 14.0% CGST
			$this->updateSort($this->OP_2_525_SGST); // OP 2.5% SGST
			$this->updateSort($this->OP_2_525_CGST); // OP 2.5% CGST
			$this->updateSort($this->OP_6_025_SGST); // OP 6.0% SGST
			$this->updateSort($this->OP_6_025_CGST); // OP 6.0% CGST
			$this->updateSort($this->OP_9_025_SGST); // OP 9.0% SGST
			$this->updateSort($this->OP_9_025_CGST); // OP 9.0% CGST
			$this->updateSort($this->OP_14_025_SGST); // OP 14.0% SGST
			$this->updateSort($this->OP_14_025_CGST); // OP 14.0% CGST
			$this->updateSort($this->HosoID); // HosoID
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
				$this->BillDate->setSort("");
				$this->IP_2_525_SGST->setSort("");
				$this->IP_2_525_CGST->setSort("");
				$this->IP_6_025_SGST->setSort("");
				$this->IP_6_025_CGST->setSort("");
				$this->IP_9_025_SGST->setSort("");
				$this->IP_9_025_CGST->setSort("");
				$this->IP_14_025_SGST->setSort("");
				$this->IP_14_025_CGST->setSort("");
				$this->OP_2_525_SGST->setSort("");
				$this->OP_2_525_CGST->setSort("");
				$this->OP_6_025_SGST->setSort("");
				$this->OP_6_025_CGST->setSort("");
				$this->OP_9_025_SGST->setSort("");
				$this->OP_9_025_CGST->setSort("");
				$this->OP_14_025_SGST->setSort("");
				$this->OP_14_025_CGST->setSort("");
				$this->HosoID->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_gst_outputlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_gst_outputlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_gst_outputlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_gst_outputlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// BillDate

		if (!$this->isAddOrEdit())
			$this->BillDate->AdvancedSearch->setSearchValue(Get("x_BillDate", Get("BillDate", "")));
		if ($this->BillDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillDate->AdvancedSearch->setSearchOperator(Get("z_BillDate", ""));
		$this->BillDate->AdvancedSearch->setSearchCondition(Get("v_BillDate", ""));
		$this->BillDate->AdvancedSearch->setSearchValue2(Get("y_BillDate", ""));
		if ($this->BillDate->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillDate->AdvancedSearch->setSearchOperator2(Get("w_BillDate", ""));

		// IP 2.5% SGST
		if (!$this->isAddOrEdit())
			$this->IP_2_525_SGST->AdvancedSearch->setSearchValue(Get("x_IP_2_525_SGST", Get("IP_2_525_SGST", "")));
		if ($this->IP_2_525_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_2_525_SGST->AdvancedSearch->setSearchOperator(Get("z_IP_2_525_SGST", ""));

		// IP 2.5% CGST
		if (!$this->isAddOrEdit())
			$this->IP_2_525_CGST->AdvancedSearch->setSearchValue(Get("x_IP_2_525_CGST", Get("IP_2_525_CGST", "")));
		if ($this->IP_2_525_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_2_525_CGST->AdvancedSearch->setSearchOperator(Get("z_IP_2_525_CGST", ""));

		// IP 6.0% SGST
		if (!$this->isAddOrEdit())
			$this->IP_6_025_SGST->AdvancedSearch->setSearchValue(Get("x_IP_6_025_SGST", Get("IP_6_025_SGST", "")));
		if ($this->IP_6_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_6_025_SGST->AdvancedSearch->setSearchOperator(Get("z_IP_6_025_SGST", ""));

		// IP 6.0% CGST
		if (!$this->isAddOrEdit())
			$this->IP_6_025_CGST->AdvancedSearch->setSearchValue(Get("x_IP_6_025_CGST", Get("IP_6_025_CGST", "")));
		if ($this->IP_6_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_6_025_CGST->AdvancedSearch->setSearchOperator(Get("z_IP_6_025_CGST", ""));

		// IP 9.0% SGST
		if (!$this->isAddOrEdit())
			$this->IP_9_025_SGST->AdvancedSearch->setSearchValue(Get("x_IP_9_025_SGST", Get("IP_9_025_SGST", "")));
		if ($this->IP_9_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_9_025_SGST->AdvancedSearch->setSearchOperator(Get("z_IP_9_025_SGST", ""));

		// IP 9.0% CGST
		if (!$this->isAddOrEdit())
			$this->IP_9_025_CGST->AdvancedSearch->setSearchValue(Get("x_IP_9_025_CGST", Get("IP_9_025_CGST", "")));
		if ($this->IP_9_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_9_025_CGST->AdvancedSearch->setSearchOperator(Get("z_IP_9_025_CGST", ""));

		// IP 14.0% SGST
		if (!$this->isAddOrEdit())
			$this->IP_14_025_SGST->AdvancedSearch->setSearchValue(Get("x_IP_14_025_SGST", Get("IP_14_025_SGST", "")));
		if ($this->IP_14_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_14_025_SGST->AdvancedSearch->setSearchOperator(Get("z_IP_14_025_SGST", ""));

		// IP 14.0% CGST
		if (!$this->isAddOrEdit())
			$this->IP_14_025_CGST->AdvancedSearch->setSearchValue(Get("x_IP_14_025_CGST", Get("IP_14_025_CGST", "")));
		if ($this->IP_14_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_14_025_CGST->AdvancedSearch->setSearchOperator(Get("z_IP_14_025_CGST", ""));

		// OP 2.5% SGST
		if (!$this->isAddOrEdit())
			$this->OP_2_525_SGST->AdvancedSearch->setSearchValue(Get("x_OP_2_525_SGST", Get("OP_2_525_SGST", "")));
		if ($this->OP_2_525_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_2_525_SGST->AdvancedSearch->setSearchOperator(Get("z_OP_2_525_SGST", ""));

		// OP 2.5% CGST
		if (!$this->isAddOrEdit())
			$this->OP_2_525_CGST->AdvancedSearch->setSearchValue(Get("x_OP_2_525_CGST", Get("OP_2_525_CGST", "")));
		if ($this->OP_2_525_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_2_525_CGST->AdvancedSearch->setSearchOperator(Get("z_OP_2_525_CGST", ""));

		// OP 6.0% SGST
		if (!$this->isAddOrEdit())
			$this->OP_6_025_SGST->AdvancedSearch->setSearchValue(Get("x_OP_6_025_SGST", Get("OP_6_025_SGST", "")));
		if ($this->OP_6_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_6_025_SGST->AdvancedSearch->setSearchOperator(Get("z_OP_6_025_SGST", ""));

		// OP 6.0% CGST
		if (!$this->isAddOrEdit())
			$this->OP_6_025_CGST->AdvancedSearch->setSearchValue(Get("x_OP_6_025_CGST", Get("OP_6_025_CGST", "")));
		if ($this->OP_6_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_6_025_CGST->AdvancedSearch->setSearchOperator(Get("z_OP_6_025_CGST", ""));

		// OP 9.0% SGST
		if (!$this->isAddOrEdit())
			$this->OP_9_025_SGST->AdvancedSearch->setSearchValue(Get("x_OP_9_025_SGST", Get("OP_9_025_SGST", "")));
		if ($this->OP_9_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_9_025_SGST->AdvancedSearch->setSearchOperator(Get("z_OP_9_025_SGST", ""));

		// OP 9.0% CGST
		if (!$this->isAddOrEdit())
			$this->OP_9_025_CGST->AdvancedSearch->setSearchValue(Get("x_OP_9_025_CGST", Get("OP_9_025_CGST", "")));
		if ($this->OP_9_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_9_025_CGST->AdvancedSearch->setSearchOperator(Get("z_OP_9_025_CGST", ""));

		// OP 14.0% SGST
		if (!$this->isAddOrEdit())
			$this->OP_14_025_SGST->AdvancedSearch->setSearchValue(Get("x_OP_14_025_SGST", Get("OP_14_025_SGST", "")));
		if ($this->OP_14_025_SGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_14_025_SGST->AdvancedSearch->setSearchOperator(Get("z_OP_14_025_SGST", ""));

		// OP 14.0% CGST
		if (!$this->isAddOrEdit())
			$this->OP_14_025_CGST->AdvancedSearch->setSearchValue(Get("x_OP_14_025_CGST", Get("OP_14_025_CGST", "")));
		if ($this->OP_14_025_CGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OP_14_025_CGST->AdvancedSearch->setSearchOperator(Get("z_OP_14_025_CGST", ""));

		// HosoID
		if (!$this->isAddOrEdit())
			$this->HosoID->AdvancedSearch->setSearchValue(Get("x_HosoID", Get("HosoID", "")));
		if ($this->HosoID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HosoID->AdvancedSearch->setSearchOperator(Get("z_HosoID", ""));
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
		$this->BillDate->setDbValue($row['BillDate']);
		$this->IP_2_525_SGST->setDbValue($row['IP 2.5% SGST']);
		$this->IP_2_525_CGST->setDbValue($row['IP 2.5% CGST']);
		$this->IP_6_025_SGST->setDbValue($row['IP 6.0% SGST']);
		$this->IP_6_025_CGST->setDbValue($row['IP 6.0% CGST']);
		$this->IP_9_025_SGST->setDbValue($row['IP 9.0% SGST']);
		$this->IP_9_025_CGST->setDbValue($row['IP 9.0% CGST']);
		$this->IP_14_025_SGST->setDbValue($row['IP 14.0% SGST']);
		$this->IP_14_025_CGST->setDbValue($row['IP 14.0% CGST']);
		$this->OP_2_525_SGST->setDbValue($row['OP 2.5% SGST']);
		$this->OP_2_525_CGST->setDbValue($row['OP 2.5% CGST']);
		$this->OP_6_025_SGST->setDbValue($row['OP 6.0% SGST']);
		$this->OP_6_025_CGST->setDbValue($row['OP 6.0% CGST']);
		$this->OP_9_025_SGST->setDbValue($row['OP 9.0% SGST']);
		$this->OP_9_025_CGST->setDbValue($row['OP 9.0% CGST']);
		$this->OP_14_025_SGST->setDbValue($row['OP 14.0% SGST']);
		$this->OP_14_025_CGST->setDbValue($row['OP 14.0% CGST']);
		$this->HosoID->setDbValue($row['HosoID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['BillDate'] = NULL;
		$row['IP 2.5% SGST'] = NULL;
		$row['IP 2.5% CGST'] = NULL;
		$row['IP 6.0% SGST'] = NULL;
		$row['IP 6.0% CGST'] = NULL;
		$row['IP 9.0% SGST'] = NULL;
		$row['IP 9.0% CGST'] = NULL;
		$row['IP 14.0% SGST'] = NULL;
		$row['IP 14.0% CGST'] = NULL;
		$row['OP 2.5% SGST'] = NULL;
		$row['OP 2.5% CGST'] = NULL;
		$row['OP 6.0% SGST'] = NULL;
		$row['OP 6.0% CGST'] = NULL;
		$row['OP 9.0% SGST'] = NULL;
		$row['OP 9.0% CGST'] = NULL;
		$row['OP 14.0% SGST'] = NULL;
		$row['OP 14.0% CGST'] = NULL;
		$row['HosoID'] = NULL;
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
		if ($this->IP_2_525_SGST->FormValue == $this->IP_2_525_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_2_525_SGST->CurrentValue)))
			$this->IP_2_525_SGST->CurrentValue = ConvertToFloatString($this->IP_2_525_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_2_525_CGST->FormValue == $this->IP_2_525_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_2_525_CGST->CurrentValue)))
			$this->IP_2_525_CGST->CurrentValue = ConvertToFloatString($this->IP_2_525_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_6_025_SGST->FormValue == $this->IP_6_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_6_025_SGST->CurrentValue)))
			$this->IP_6_025_SGST->CurrentValue = ConvertToFloatString($this->IP_6_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_6_025_CGST->FormValue == $this->IP_6_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_6_025_CGST->CurrentValue)))
			$this->IP_6_025_CGST->CurrentValue = ConvertToFloatString($this->IP_6_025_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_9_025_SGST->FormValue == $this->IP_9_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_9_025_SGST->CurrentValue)))
			$this->IP_9_025_SGST->CurrentValue = ConvertToFloatString($this->IP_9_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_9_025_CGST->FormValue == $this->IP_9_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_9_025_CGST->CurrentValue)))
			$this->IP_9_025_CGST->CurrentValue = ConvertToFloatString($this->IP_9_025_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_14_025_SGST->FormValue == $this->IP_14_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_14_025_SGST->CurrentValue)))
			$this->IP_14_025_SGST->CurrentValue = ConvertToFloatString($this->IP_14_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IP_14_025_CGST->FormValue == $this->IP_14_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP_14_025_CGST->CurrentValue)))
			$this->IP_14_025_CGST->CurrentValue = ConvertToFloatString($this->IP_14_025_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_2_525_SGST->FormValue == $this->OP_2_525_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_2_525_SGST->CurrentValue)))
			$this->OP_2_525_SGST->CurrentValue = ConvertToFloatString($this->OP_2_525_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_2_525_CGST->FormValue == $this->OP_2_525_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_2_525_CGST->CurrentValue)))
			$this->OP_2_525_CGST->CurrentValue = ConvertToFloatString($this->OP_2_525_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_6_025_SGST->FormValue == $this->OP_6_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_6_025_SGST->CurrentValue)))
			$this->OP_6_025_SGST->CurrentValue = ConvertToFloatString($this->OP_6_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_6_025_CGST->FormValue == $this->OP_6_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_6_025_CGST->CurrentValue)))
			$this->OP_6_025_CGST->CurrentValue = ConvertToFloatString($this->OP_6_025_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_9_025_SGST->FormValue == $this->OP_9_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_9_025_SGST->CurrentValue)))
			$this->OP_9_025_SGST->CurrentValue = ConvertToFloatString($this->OP_9_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_9_025_CGST->FormValue == $this->OP_9_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_9_025_CGST->CurrentValue)))
			$this->OP_9_025_CGST->CurrentValue = ConvertToFloatString($this->OP_9_025_CGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_14_025_SGST->FormValue == $this->OP_14_025_SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_14_025_SGST->CurrentValue)))
			$this->OP_14_025_SGST->CurrentValue = ConvertToFloatString($this->OP_14_025_SGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OP_14_025_CGST->FormValue == $this->OP_14_025_CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP_14_025_CGST->CurrentValue)))
			$this->OP_14_025_CGST->CurrentValue = ConvertToFloatString($this->OP_14_025_CGST->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BillDate
		// IP 2.5% SGST
		// IP 2.5% CGST
		// IP 6.0% SGST
		// IP 6.0% CGST
		// IP 9.0% SGST
		// IP 9.0% CGST
		// IP 14.0% SGST
		// IP 14.0% CGST
		// OP 2.5% SGST
		// OP 2.5% CGST
		// OP 6.0% SGST
		// OP 6.0% CGST
		// OP 9.0% SGST
		// OP 9.0% CGST
		// OP 14.0% SGST
		// OP 14.0% CGST
		// HosoID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BillDate
			$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
			$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
			$this->BillDate->ViewCustomAttributes = "";

			// IP 2.5% SGST
			$this->IP_2_525_SGST->ViewValue = $this->IP_2_525_SGST->CurrentValue;
			$this->IP_2_525_SGST->ViewValue = FormatNumber($this->IP_2_525_SGST->ViewValue, 2, -2, -2, -2);
			$this->IP_2_525_SGST->ViewCustomAttributes = "";

			// IP 2.5% CGST
			$this->IP_2_525_CGST->ViewValue = $this->IP_2_525_CGST->CurrentValue;
			$this->IP_2_525_CGST->ViewValue = FormatNumber($this->IP_2_525_CGST->ViewValue, 2, -2, -2, -2);
			$this->IP_2_525_CGST->ViewCustomAttributes = "";

			// IP 6.0% SGST
			$this->IP_6_025_SGST->ViewValue = $this->IP_6_025_SGST->CurrentValue;
			$this->IP_6_025_SGST->ViewValue = FormatNumber($this->IP_6_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->IP_6_025_SGST->ViewCustomAttributes = "";

			// IP 6.0% CGST
			$this->IP_6_025_CGST->ViewValue = $this->IP_6_025_CGST->CurrentValue;
			$this->IP_6_025_CGST->ViewValue = FormatNumber($this->IP_6_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->IP_6_025_CGST->ViewCustomAttributes = "";

			// IP 9.0% SGST
			$this->IP_9_025_SGST->ViewValue = $this->IP_9_025_SGST->CurrentValue;
			$this->IP_9_025_SGST->ViewValue = FormatNumber($this->IP_9_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->IP_9_025_SGST->ViewCustomAttributes = "";

			// IP 9.0% CGST
			$this->IP_9_025_CGST->ViewValue = $this->IP_9_025_CGST->CurrentValue;
			$this->IP_9_025_CGST->ViewValue = FormatNumber($this->IP_9_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->IP_9_025_CGST->ViewCustomAttributes = "";

			// IP 14.0% SGST
			$this->IP_14_025_SGST->ViewValue = $this->IP_14_025_SGST->CurrentValue;
			$this->IP_14_025_SGST->ViewValue = FormatNumber($this->IP_14_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->IP_14_025_SGST->ViewCustomAttributes = "";

			// IP 14.0% CGST
			$this->IP_14_025_CGST->ViewValue = $this->IP_14_025_CGST->CurrentValue;
			$this->IP_14_025_CGST->ViewValue = FormatNumber($this->IP_14_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->IP_14_025_CGST->ViewCustomAttributes = "";

			// OP 2.5% SGST
			$this->OP_2_525_SGST->ViewValue = $this->OP_2_525_SGST->CurrentValue;
			$this->OP_2_525_SGST->ViewValue = FormatNumber($this->OP_2_525_SGST->ViewValue, 2, -2, -2, -2);
			$this->OP_2_525_SGST->ViewCustomAttributes = "";

			// OP 2.5% CGST
			$this->OP_2_525_CGST->ViewValue = $this->OP_2_525_CGST->CurrentValue;
			$this->OP_2_525_CGST->ViewValue = FormatNumber($this->OP_2_525_CGST->ViewValue, 2, -2, -2, -2);
			$this->OP_2_525_CGST->ViewCustomAttributes = "";

			// OP 6.0% SGST
			$this->OP_6_025_SGST->ViewValue = $this->OP_6_025_SGST->CurrentValue;
			$this->OP_6_025_SGST->ViewValue = FormatNumber($this->OP_6_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->OP_6_025_SGST->ViewCustomAttributes = "";

			// OP 6.0% CGST
			$this->OP_6_025_CGST->ViewValue = $this->OP_6_025_CGST->CurrentValue;
			$this->OP_6_025_CGST->ViewValue = FormatNumber($this->OP_6_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->OP_6_025_CGST->ViewCustomAttributes = "";

			// OP 9.0% SGST
			$this->OP_9_025_SGST->ViewValue = $this->OP_9_025_SGST->CurrentValue;
			$this->OP_9_025_SGST->ViewValue = FormatNumber($this->OP_9_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->OP_9_025_SGST->ViewCustomAttributes = "";

			// OP 9.0% CGST
			$this->OP_9_025_CGST->ViewValue = $this->OP_9_025_CGST->CurrentValue;
			$this->OP_9_025_CGST->ViewValue = FormatNumber($this->OP_9_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->OP_9_025_CGST->ViewCustomAttributes = "";

			// OP 14.0% SGST
			$this->OP_14_025_SGST->ViewValue = $this->OP_14_025_SGST->CurrentValue;
			$this->OP_14_025_SGST->ViewValue = FormatNumber($this->OP_14_025_SGST->ViewValue, 2, -2, -2, -2);
			$this->OP_14_025_SGST->ViewCustomAttributes = "";

			// OP 14.0% CGST
			$this->OP_14_025_CGST->ViewValue = $this->OP_14_025_CGST->CurrentValue;
			$this->OP_14_025_CGST->ViewValue = FormatNumber($this->OP_14_025_CGST->ViewValue, 2, -2, -2, -2);
			$this->OP_14_025_CGST->ViewCustomAttributes = "";

			// HosoID
			$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
			$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
			$this->HosoID->ViewCustomAttributes = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";
			$this->BillDate->TooltipValue = "";

			// IP 2.5% SGST
			$this->IP_2_525_SGST->LinkCustomAttributes = "";
			$this->IP_2_525_SGST->HrefValue = "";
			$this->IP_2_525_SGST->TooltipValue = "";

			// IP 2.5% CGST
			$this->IP_2_525_CGST->LinkCustomAttributes = "";
			$this->IP_2_525_CGST->HrefValue = "";
			$this->IP_2_525_CGST->TooltipValue = "";

			// IP 6.0% SGST
			$this->IP_6_025_SGST->LinkCustomAttributes = "";
			$this->IP_6_025_SGST->HrefValue = "";
			$this->IP_6_025_SGST->TooltipValue = "";

			// IP 6.0% CGST
			$this->IP_6_025_CGST->LinkCustomAttributes = "";
			$this->IP_6_025_CGST->HrefValue = "";
			$this->IP_6_025_CGST->TooltipValue = "";

			// IP 9.0% SGST
			$this->IP_9_025_SGST->LinkCustomAttributes = "";
			$this->IP_9_025_SGST->HrefValue = "";
			$this->IP_9_025_SGST->TooltipValue = "";

			// IP 9.0% CGST
			$this->IP_9_025_CGST->LinkCustomAttributes = "";
			$this->IP_9_025_CGST->HrefValue = "";
			$this->IP_9_025_CGST->TooltipValue = "";

			// IP 14.0% SGST
			$this->IP_14_025_SGST->LinkCustomAttributes = "";
			$this->IP_14_025_SGST->HrefValue = "";
			$this->IP_14_025_SGST->TooltipValue = "";

			// IP 14.0% CGST
			$this->IP_14_025_CGST->LinkCustomAttributes = "";
			$this->IP_14_025_CGST->HrefValue = "";
			$this->IP_14_025_CGST->TooltipValue = "";

			// OP 2.5% SGST
			$this->OP_2_525_SGST->LinkCustomAttributes = "";
			$this->OP_2_525_SGST->HrefValue = "";
			$this->OP_2_525_SGST->TooltipValue = "";

			// OP 2.5% CGST
			$this->OP_2_525_CGST->LinkCustomAttributes = "";
			$this->OP_2_525_CGST->HrefValue = "";
			$this->OP_2_525_CGST->TooltipValue = "";

			// OP 6.0% SGST
			$this->OP_6_025_SGST->LinkCustomAttributes = "";
			$this->OP_6_025_SGST->HrefValue = "";
			$this->OP_6_025_SGST->TooltipValue = "";

			// OP 6.0% CGST
			$this->OP_6_025_CGST->LinkCustomAttributes = "";
			$this->OP_6_025_CGST->HrefValue = "";
			$this->OP_6_025_CGST->TooltipValue = "";

			// OP 9.0% SGST
			$this->OP_9_025_SGST->LinkCustomAttributes = "";
			$this->OP_9_025_SGST->HrefValue = "";
			$this->OP_9_025_SGST->TooltipValue = "";

			// OP 9.0% CGST
			$this->OP_9_025_CGST->LinkCustomAttributes = "";
			$this->OP_9_025_CGST->HrefValue = "";
			$this->OP_9_025_CGST->TooltipValue = "";

			// OP 14.0% SGST
			$this->OP_14_025_SGST->LinkCustomAttributes = "";
			$this->OP_14_025_SGST->HrefValue = "";
			$this->OP_14_025_SGST->TooltipValue = "";

			// OP 14.0% CGST
			$this->OP_14_025_CGST->LinkCustomAttributes = "";
			$this->OP_14_025_CGST->HrefValue = "";
			$this->OP_14_025_CGST->TooltipValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";
			$this->HosoID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// BillDate
			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue, 7), 7));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());
			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue2, 7), 7));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// IP 2.5% SGST
			$this->IP_2_525_SGST->EditAttrs["class"] = "form-control";
			$this->IP_2_525_SGST->EditCustomAttributes = "";
			$this->IP_2_525_SGST->EditValue = HtmlEncode($this->IP_2_525_SGST->AdvancedSearch->SearchValue);
			$this->IP_2_525_SGST->PlaceHolder = RemoveHtml($this->IP_2_525_SGST->caption());

			// IP 2.5% CGST
			$this->IP_2_525_CGST->EditAttrs["class"] = "form-control";
			$this->IP_2_525_CGST->EditCustomAttributes = "";
			$this->IP_2_525_CGST->EditValue = HtmlEncode($this->IP_2_525_CGST->AdvancedSearch->SearchValue);
			$this->IP_2_525_CGST->PlaceHolder = RemoveHtml($this->IP_2_525_CGST->caption());

			// IP 6.0% SGST
			$this->IP_6_025_SGST->EditAttrs["class"] = "form-control";
			$this->IP_6_025_SGST->EditCustomAttributes = "";
			$this->IP_6_025_SGST->EditValue = HtmlEncode($this->IP_6_025_SGST->AdvancedSearch->SearchValue);
			$this->IP_6_025_SGST->PlaceHolder = RemoveHtml($this->IP_6_025_SGST->caption());

			// IP 6.0% CGST
			$this->IP_6_025_CGST->EditAttrs["class"] = "form-control";
			$this->IP_6_025_CGST->EditCustomAttributes = "";
			$this->IP_6_025_CGST->EditValue = HtmlEncode($this->IP_6_025_CGST->AdvancedSearch->SearchValue);
			$this->IP_6_025_CGST->PlaceHolder = RemoveHtml($this->IP_6_025_CGST->caption());

			// IP 9.0% SGST
			$this->IP_9_025_SGST->EditAttrs["class"] = "form-control";
			$this->IP_9_025_SGST->EditCustomAttributes = "";
			$this->IP_9_025_SGST->EditValue = HtmlEncode($this->IP_9_025_SGST->AdvancedSearch->SearchValue);
			$this->IP_9_025_SGST->PlaceHolder = RemoveHtml($this->IP_9_025_SGST->caption());

			// IP 9.0% CGST
			$this->IP_9_025_CGST->EditAttrs["class"] = "form-control";
			$this->IP_9_025_CGST->EditCustomAttributes = "";
			$this->IP_9_025_CGST->EditValue = HtmlEncode($this->IP_9_025_CGST->AdvancedSearch->SearchValue);
			$this->IP_9_025_CGST->PlaceHolder = RemoveHtml($this->IP_9_025_CGST->caption());

			// IP 14.0% SGST
			$this->IP_14_025_SGST->EditAttrs["class"] = "form-control";
			$this->IP_14_025_SGST->EditCustomAttributes = "";
			$this->IP_14_025_SGST->EditValue = HtmlEncode($this->IP_14_025_SGST->AdvancedSearch->SearchValue);
			$this->IP_14_025_SGST->PlaceHolder = RemoveHtml($this->IP_14_025_SGST->caption());

			// IP 14.0% CGST
			$this->IP_14_025_CGST->EditAttrs["class"] = "form-control";
			$this->IP_14_025_CGST->EditCustomAttributes = "";
			$this->IP_14_025_CGST->EditValue = HtmlEncode($this->IP_14_025_CGST->AdvancedSearch->SearchValue);
			$this->IP_14_025_CGST->PlaceHolder = RemoveHtml($this->IP_14_025_CGST->caption());

			// OP 2.5% SGST
			$this->OP_2_525_SGST->EditAttrs["class"] = "form-control";
			$this->OP_2_525_SGST->EditCustomAttributes = "";
			$this->OP_2_525_SGST->EditValue = HtmlEncode($this->OP_2_525_SGST->AdvancedSearch->SearchValue);
			$this->OP_2_525_SGST->PlaceHolder = RemoveHtml($this->OP_2_525_SGST->caption());

			// OP 2.5% CGST
			$this->OP_2_525_CGST->EditAttrs["class"] = "form-control";
			$this->OP_2_525_CGST->EditCustomAttributes = "";
			$this->OP_2_525_CGST->EditValue = HtmlEncode($this->OP_2_525_CGST->AdvancedSearch->SearchValue);
			$this->OP_2_525_CGST->PlaceHolder = RemoveHtml($this->OP_2_525_CGST->caption());

			// OP 6.0% SGST
			$this->OP_6_025_SGST->EditAttrs["class"] = "form-control";
			$this->OP_6_025_SGST->EditCustomAttributes = "";
			$this->OP_6_025_SGST->EditValue = HtmlEncode($this->OP_6_025_SGST->AdvancedSearch->SearchValue);
			$this->OP_6_025_SGST->PlaceHolder = RemoveHtml($this->OP_6_025_SGST->caption());

			// OP 6.0% CGST
			$this->OP_6_025_CGST->EditAttrs["class"] = "form-control";
			$this->OP_6_025_CGST->EditCustomAttributes = "";
			$this->OP_6_025_CGST->EditValue = HtmlEncode($this->OP_6_025_CGST->AdvancedSearch->SearchValue);
			$this->OP_6_025_CGST->PlaceHolder = RemoveHtml($this->OP_6_025_CGST->caption());

			// OP 9.0% SGST
			$this->OP_9_025_SGST->EditAttrs["class"] = "form-control";
			$this->OP_9_025_SGST->EditCustomAttributes = "";
			$this->OP_9_025_SGST->EditValue = HtmlEncode($this->OP_9_025_SGST->AdvancedSearch->SearchValue);
			$this->OP_9_025_SGST->PlaceHolder = RemoveHtml($this->OP_9_025_SGST->caption());

			// OP 9.0% CGST
			$this->OP_9_025_CGST->EditAttrs["class"] = "form-control";
			$this->OP_9_025_CGST->EditCustomAttributes = "";
			$this->OP_9_025_CGST->EditValue = HtmlEncode($this->OP_9_025_CGST->AdvancedSearch->SearchValue);
			$this->OP_9_025_CGST->PlaceHolder = RemoveHtml($this->OP_9_025_CGST->caption());

			// OP 14.0% SGST
			$this->OP_14_025_SGST->EditAttrs["class"] = "form-control";
			$this->OP_14_025_SGST->EditCustomAttributes = "";
			$this->OP_14_025_SGST->EditValue = HtmlEncode($this->OP_14_025_SGST->AdvancedSearch->SearchValue);
			$this->OP_14_025_SGST->PlaceHolder = RemoveHtml($this->OP_14_025_SGST->caption());

			// OP 14.0% CGST
			$this->OP_14_025_CGST->EditAttrs["class"] = "form-control";
			$this->OP_14_025_CGST->EditCustomAttributes = "";
			$this->OP_14_025_CGST->EditValue = HtmlEncode($this->OP_14_025_CGST->AdvancedSearch->SearchValue);
			$this->OP_14_025_CGST->PlaceHolder = RemoveHtml($this->OP_14_025_CGST->caption());

			// HosoID
			$this->HosoID->EditAttrs["class"] = "form-control";
			$this->HosoID->EditCustomAttributes = "";
			$this->HosoID->EditValue = HtmlEncode($this->HosoID->AdvancedSearch->SearchValue);
			$this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());
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
		if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillDate->errorMessage());
		}
		if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->BillDate->errorMessage());
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
		$this->BillDate->AdvancedSearch->load();
		$this->IP_2_525_SGST->AdvancedSearch->load();
		$this->IP_2_525_CGST->AdvancedSearch->load();
		$this->IP_6_025_SGST->AdvancedSearch->load();
		$this->IP_6_025_CGST->AdvancedSearch->load();
		$this->IP_9_025_SGST->AdvancedSearch->load();
		$this->IP_9_025_CGST->AdvancedSearch->load();
		$this->IP_14_025_SGST->AdvancedSearch->load();
		$this->IP_14_025_CGST->AdvancedSearch->load();
		$this->OP_2_525_SGST->AdvancedSearch->load();
		$this->OP_2_525_CGST->AdvancedSearch->load();
		$this->OP_6_025_SGST->AdvancedSearch->load();
		$this->OP_6_025_CGST->AdvancedSearch->load();
		$this->OP_9_025_SGST->AdvancedSearch->load();
		$this->OP_9_025_CGST->AdvancedSearch->load();
		$this->OP_14_025_SGST->AdvancedSearch->load();
		$this->OP_14_025_CGST->AdvancedSearch->load();
		$this->HosoID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_gst_outputlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_gst_outputlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_gst_outputlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_gst_output\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_gst_output',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_gst_outputlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
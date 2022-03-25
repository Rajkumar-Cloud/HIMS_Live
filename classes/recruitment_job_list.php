<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class recruitment_job_list extends recruitment_job
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'recruitment_job';

	// Page object name
	public $PageObjName = "recruitment_job_list";

	// Grid form hidden field names
	public $FormName = "frecruitment_joblist";
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

		// Table object (recruitment_job)
		if (!isset($GLOBALS["recruitment_job"]) || get_class($GLOBALS["recruitment_job"]) == PROJECT_NAMESPACE . "recruitment_job") {
			$GLOBALS["recruitment_job"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["recruitment_job"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "recruitment_jobadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "recruitment_jobdelete.php";
		$this->MultiUpdateUrl = "recruitment_jobupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_job');

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
		$this->FilterOptions->TagClassName = "ew-filter-option frecruitment_joblistsrch";

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
		global $EXPORT, $recruitment_job;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($recruitment_job);
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
		$this->title->setVisibility();
		$this->shortDescription->Visible = FALSE;
		$this->description->Visible = FALSE;
		$this->requirements->Visible = FALSE;
		$this->benefits->Visible = FALSE;
		$this->country->setVisibility();
		$this->company->setVisibility();
		$this->department->setVisibility();
		$this->code->setVisibility();
		$this->employementType->setVisibility();
		$this->industry->setVisibility();
		$this->experienceLevel->setVisibility();
		$this->jobFunction->setVisibility();
		$this->educationLevel->setVisibility();
		$this->currency->setVisibility();
		$this->showSalary->setVisibility();
		$this->salaryMin->setVisibility();
		$this->salaryMax->setVisibility();
		$this->keywords->Visible = FALSE;
		$this->status->setVisibility();
		$this->closingDate->setVisibility();
		$this->attachment->setVisibility();
		$this->display->setVisibility();
		$this->postedBy->setVisibility();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "frecruitment_joblistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
		$filterList = Concat($filterList, $this->shortDescription->AdvancedSearch->toJson(), ","); // Field shortDescription
		$filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
		$filterList = Concat($filterList, $this->requirements->AdvancedSearch->toJson(), ","); // Field requirements
		$filterList = Concat($filterList, $this->benefits->AdvancedSearch->toJson(), ","); // Field benefits
		$filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
		$filterList = Concat($filterList, $this->company->AdvancedSearch->toJson(), ","); // Field company
		$filterList = Concat($filterList, $this->department->AdvancedSearch->toJson(), ","); // Field department
		$filterList = Concat($filterList, $this->code->AdvancedSearch->toJson(), ","); // Field code
		$filterList = Concat($filterList, $this->employementType->AdvancedSearch->toJson(), ","); // Field employementType
		$filterList = Concat($filterList, $this->industry->AdvancedSearch->toJson(), ","); // Field industry
		$filterList = Concat($filterList, $this->experienceLevel->AdvancedSearch->toJson(), ","); // Field experienceLevel
		$filterList = Concat($filterList, $this->jobFunction->AdvancedSearch->toJson(), ","); // Field jobFunction
		$filterList = Concat($filterList, $this->educationLevel->AdvancedSearch->toJson(), ","); // Field educationLevel
		$filterList = Concat($filterList, $this->currency->AdvancedSearch->toJson(), ","); // Field currency
		$filterList = Concat($filterList, $this->showSalary->AdvancedSearch->toJson(), ","); // Field showSalary
		$filterList = Concat($filterList, $this->salaryMin->AdvancedSearch->toJson(), ","); // Field salaryMin
		$filterList = Concat($filterList, $this->salaryMax->AdvancedSearch->toJson(), ","); // Field salaryMax
		$filterList = Concat($filterList, $this->keywords->AdvancedSearch->toJson(), ","); // Field keywords
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->closingDate->AdvancedSearch->toJson(), ","); // Field closingDate
		$filterList = Concat($filterList, $this->attachment->AdvancedSearch->toJson(), ","); // Field attachment
		$filterList = Concat($filterList, $this->display->AdvancedSearch->toJson(), ","); // Field display
		$filterList = Concat($filterList, $this->postedBy->AdvancedSearch->toJson(), ","); // Field postedBy
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
			$UserProfile->setSearchFilters(CurrentUserName(), "frecruitment_joblistsrch", $filters);
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

		// Field title
		$this->title->AdvancedSearch->SearchValue = @$filter["x_title"];
		$this->title->AdvancedSearch->SearchOperator = @$filter["z_title"];
		$this->title->AdvancedSearch->SearchCondition = @$filter["v_title"];
		$this->title->AdvancedSearch->SearchValue2 = @$filter["y_title"];
		$this->title->AdvancedSearch->SearchOperator2 = @$filter["w_title"];
		$this->title->AdvancedSearch->save();

		// Field shortDescription
		$this->shortDescription->AdvancedSearch->SearchValue = @$filter["x_shortDescription"];
		$this->shortDescription->AdvancedSearch->SearchOperator = @$filter["z_shortDescription"];
		$this->shortDescription->AdvancedSearch->SearchCondition = @$filter["v_shortDescription"];
		$this->shortDescription->AdvancedSearch->SearchValue2 = @$filter["y_shortDescription"];
		$this->shortDescription->AdvancedSearch->SearchOperator2 = @$filter["w_shortDescription"];
		$this->shortDescription->AdvancedSearch->save();

		// Field description
		$this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
		$this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
		$this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
		$this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
		$this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
		$this->description->AdvancedSearch->save();

		// Field requirements
		$this->requirements->AdvancedSearch->SearchValue = @$filter["x_requirements"];
		$this->requirements->AdvancedSearch->SearchOperator = @$filter["z_requirements"];
		$this->requirements->AdvancedSearch->SearchCondition = @$filter["v_requirements"];
		$this->requirements->AdvancedSearch->SearchValue2 = @$filter["y_requirements"];
		$this->requirements->AdvancedSearch->SearchOperator2 = @$filter["w_requirements"];
		$this->requirements->AdvancedSearch->save();

		// Field benefits
		$this->benefits->AdvancedSearch->SearchValue = @$filter["x_benefits"];
		$this->benefits->AdvancedSearch->SearchOperator = @$filter["z_benefits"];
		$this->benefits->AdvancedSearch->SearchCondition = @$filter["v_benefits"];
		$this->benefits->AdvancedSearch->SearchValue2 = @$filter["y_benefits"];
		$this->benefits->AdvancedSearch->SearchOperator2 = @$filter["w_benefits"];
		$this->benefits->AdvancedSearch->save();

		// Field country
		$this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
		$this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
		$this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
		$this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
		$this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
		$this->country->AdvancedSearch->save();

		// Field company
		$this->company->AdvancedSearch->SearchValue = @$filter["x_company"];
		$this->company->AdvancedSearch->SearchOperator = @$filter["z_company"];
		$this->company->AdvancedSearch->SearchCondition = @$filter["v_company"];
		$this->company->AdvancedSearch->SearchValue2 = @$filter["y_company"];
		$this->company->AdvancedSearch->SearchOperator2 = @$filter["w_company"];
		$this->company->AdvancedSearch->save();

		// Field department
		$this->department->AdvancedSearch->SearchValue = @$filter["x_department"];
		$this->department->AdvancedSearch->SearchOperator = @$filter["z_department"];
		$this->department->AdvancedSearch->SearchCondition = @$filter["v_department"];
		$this->department->AdvancedSearch->SearchValue2 = @$filter["y_department"];
		$this->department->AdvancedSearch->SearchOperator2 = @$filter["w_department"];
		$this->department->AdvancedSearch->save();

		// Field code
		$this->code->AdvancedSearch->SearchValue = @$filter["x_code"];
		$this->code->AdvancedSearch->SearchOperator = @$filter["z_code"];
		$this->code->AdvancedSearch->SearchCondition = @$filter["v_code"];
		$this->code->AdvancedSearch->SearchValue2 = @$filter["y_code"];
		$this->code->AdvancedSearch->SearchOperator2 = @$filter["w_code"];
		$this->code->AdvancedSearch->save();

		// Field employementType
		$this->employementType->AdvancedSearch->SearchValue = @$filter["x_employementType"];
		$this->employementType->AdvancedSearch->SearchOperator = @$filter["z_employementType"];
		$this->employementType->AdvancedSearch->SearchCondition = @$filter["v_employementType"];
		$this->employementType->AdvancedSearch->SearchValue2 = @$filter["y_employementType"];
		$this->employementType->AdvancedSearch->SearchOperator2 = @$filter["w_employementType"];
		$this->employementType->AdvancedSearch->save();

		// Field industry
		$this->industry->AdvancedSearch->SearchValue = @$filter["x_industry"];
		$this->industry->AdvancedSearch->SearchOperator = @$filter["z_industry"];
		$this->industry->AdvancedSearch->SearchCondition = @$filter["v_industry"];
		$this->industry->AdvancedSearch->SearchValue2 = @$filter["y_industry"];
		$this->industry->AdvancedSearch->SearchOperator2 = @$filter["w_industry"];
		$this->industry->AdvancedSearch->save();

		// Field experienceLevel
		$this->experienceLevel->AdvancedSearch->SearchValue = @$filter["x_experienceLevel"];
		$this->experienceLevel->AdvancedSearch->SearchOperator = @$filter["z_experienceLevel"];
		$this->experienceLevel->AdvancedSearch->SearchCondition = @$filter["v_experienceLevel"];
		$this->experienceLevel->AdvancedSearch->SearchValue2 = @$filter["y_experienceLevel"];
		$this->experienceLevel->AdvancedSearch->SearchOperator2 = @$filter["w_experienceLevel"];
		$this->experienceLevel->AdvancedSearch->save();

		// Field jobFunction
		$this->jobFunction->AdvancedSearch->SearchValue = @$filter["x_jobFunction"];
		$this->jobFunction->AdvancedSearch->SearchOperator = @$filter["z_jobFunction"];
		$this->jobFunction->AdvancedSearch->SearchCondition = @$filter["v_jobFunction"];
		$this->jobFunction->AdvancedSearch->SearchValue2 = @$filter["y_jobFunction"];
		$this->jobFunction->AdvancedSearch->SearchOperator2 = @$filter["w_jobFunction"];
		$this->jobFunction->AdvancedSearch->save();

		// Field educationLevel
		$this->educationLevel->AdvancedSearch->SearchValue = @$filter["x_educationLevel"];
		$this->educationLevel->AdvancedSearch->SearchOperator = @$filter["z_educationLevel"];
		$this->educationLevel->AdvancedSearch->SearchCondition = @$filter["v_educationLevel"];
		$this->educationLevel->AdvancedSearch->SearchValue2 = @$filter["y_educationLevel"];
		$this->educationLevel->AdvancedSearch->SearchOperator2 = @$filter["w_educationLevel"];
		$this->educationLevel->AdvancedSearch->save();

		// Field currency
		$this->currency->AdvancedSearch->SearchValue = @$filter["x_currency"];
		$this->currency->AdvancedSearch->SearchOperator = @$filter["z_currency"];
		$this->currency->AdvancedSearch->SearchCondition = @$filter["v_currency"];
		$this->currency->AdvancedSearch->SearchValue2 = @$filter["y_currency"];
		$this->currency->AdvancedSearch->SearchOperator2 = @$filter["w_currency"];
		$this->currency->AdvancedSearch->save();

		// Field showSalary
		$this->showSalary->AdvancedSearch->SearchValue = @$filter["x_showSalary"];
		$this->showSalary->AdvancedSearch->SearchOperator = @$filter["z_showSalary"];
		$this->showSalary->AdvancedSearch->SearchCondition = @$filter["v_showSalary"];
		$this->showSalary->AdvancedSearch->SearchValue2 = @$filter["y_showSalary"];
		$this->showSalary->AdvancedSearch->SearchOperator2 = @$filter["w_showSalary"];
		$this->showSalary->AdvancedSearch->save();

		// Field salaryMin
		$this->salaryMin->AdvancedSearch->SearchValue = @$filter["x_salaryMin"];
		$this->salaryMin->AdvancedSearch->SearchOperator = @$filter["z_salaryMin"];
		$this->salaryMin->AdvancedSearch->SearchCondition = @$filter["v_salaryMin"];
		$this->salaryMin->AdvancedSearch->SearchValue2 = @$filter["y_salaryMin"];
		$this->salaryMin->AdvancedSearch->SearchOperator2 = @$filter["w_salaryMin"];
		$this->salaryMin->AdvancedSearch->save();

		// Field salaryMax
		$this->salaryMax->AdvancedSearch->SearchValue = @$filter["x_salaryMax"];
		$this->salaryMax->AdvancedSearch->SearchOperator = @$filter["z_salaryMax"];
		$this->salaryMax->AdvancedSearch->SearchCondition = @$filter["v_salaryMax"];
		$this->salaryMax->AdvancedSearch->SearchValue2 = @$filter["y_salaryMax"];
		$this->salaryMax->AdvancedSearch->SearchOperator2 = @$filter["w_salaryMax"];
		$this->salaryMax->AdvancedSearch->save();

		// Field keywords
		$this->keywords->AdvancedSearch->SearchValue = @$filter["x_keywords"];
		$this->keywords->AdvancedSearch->SearchOperator = @$filter["z_keywords"];
		$this->keywords->AdvancedSearch->SearchCondition = @$filter["v_keywords"];
		$this->keywords->AdvancedSearch->SearchValue2 = @$filter["y_keywords"];
		$this->keywords->AdvancedSearch->SearchOperator2 = @$filter["w_keywords"];
		$this->keywords->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field closingDate
		$this->closingDate->AdvancedSearch->SearchValue = @$filter["x_closingDate"];
		$this->closingDate->AdvancedSearch->SearchOperator = @$filter["z_closingDate"];
		$this->closingDate->AdvancedSearch->SearchCondition = @$filter["v_closingDate"];
		$this->closingDate->AdvancedSearch->SearchValue2 = @$filter["y_closingDate"];
		$this->closingDate->AdvancedSearch->SearchOperator2 = @$filter["w_closingDate"];
		$this->closingDate->AdvancedSearch->save();

		// Field attachment
		$this->attachment->AdvancedSearch->SearchValue = @$filter["x_attachment"];
		$this->attachment->AdvancedSearch->SearchOperator = @$filter["z_attachment"];
		$this->attachment->AdvancedSearch->SearchCondition = @$filter["v_attachment"];
		$this->attachment->AdvancedSearch->SearchValue2 = @$filter["y_attachment"];
		$this->attachment->AdvancedSearch->SearchOperator2 = @$filter["w_attachment"];
		$this->attachment->AdvancedSearch->save();

		// Field display
		$this->display->AdvancedSearch->SearchValue = @$filter["x_display"];
		$this->display->AdvancedSearch->SearchOperator = @$filter["z_display"];
		$this->display->AdvancedSearch->SearchCondition = @$filter["v_display"];
		$this->display->AdvancedSearch->SearchValue2 = @$filter["y_display"];
		$this->display->AdvancedSearch->SearchOperator2 = @$filter["w_display"];
		$this->display->AdvancedSearch->save();

		// Field postedBy
		$this->postedBy->AdvancedSearch->SearchValue = @$filter["x_postedBy"];
		$this->postedBy->AdvancedSearch->SearchOperator = @$filter["z_postedBy"];
		$this->postedBy->AdvancedSearch->SearchCondition = @$filter["v_postedBy"];
		$this->postedBy->AdvancedSearch->SearchValue2 = @$filter["y_postedBy"];
		$this->postedBy->AdvancedSearch->SearchOperator2 = @$filter["w_postedBy"];
		$this->postedBy->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->title, $default, FALSE); // title
		$this->buildSearchSql($where, $this->shortDescription, $default, FALSE); // shortDescription
		$this->buildSearchSql($where, $this->description, $default, FALSE); // description
		$this->buildSearchSql($where, $this->requirements, $default, FALSE); // requirements
		$this->buildSearchSql($where, $this->benefits, $default, FALSE); // benefits
		$this->buildSearchSql($where, $this->country, $default, FALSE); // country
		$this->buildSearchSql($where, $this->company, $default, FALSE); // company
		$this->buildSearchSql($where, $this->department, $default, FALSE); // department
		$this->buildSearchSql($where, $this->code, $default, FALSE); // code
		$this->buildSearchSql($where, $this->employementType, $default, FALSE); // employementType
		$this->buildSearchSql($where, $this->industry, $default, FALSE); // industry
		$this->buildSearchSql($where, $this->experienceLevel, $default, FALSE); // experienceLevel
		$this->buildSearchSql($where, $this->jobFunction, $default, FALSE); // jobFunction
		$this->buildSearchSql($where, $this->educationLevel, $default, FALSE); // educationLevel
		$this->buildSearchSql($where, $this->currency, $default, FALSE); // currency
		$this->buildSearchSql($where, $this->showSalary, $default, FALSE); // showSalary
		$this->buildSearchSql($where, $this->salaryMin, $default, FALSE); // salaryMin
		$this->buildSearchSql($where, $this->salaryMax, $default, FALSE); // salaryMax
		$this->buildSearchSql($where, $this->keywords, $default, FALSE); // keywords
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->closingDate, $default, FALSE); // closingDate
		$this->buildSearchSql($where, $this->attachment, $default, FALSE); // attachment
		$this->buildSearchSql($where, $this->display, $default, FALSE); // display
		$this->buildSearchSql($where, $this->postedBy, $default, FALSE); // postedBy

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->title->AdvancedSearch->save(); // title
			$this->shortDescription->AdvancedSearch->save(); // shortDescription
			$this->description->AdvancedSearch->save(); // description
			$this->requirements->AdvancedSearch->save(); // requirements
			$this->benefits->AdvancedSearch->save(); // benefits
			$this->country->AdvancedSearch->save(); // country
			$this->company->AdvancedSearch->save(); // company
			$this->department->AdvancedSearch->save(); // department
			$this->code->AdvancedSearch->save(); // code
			$this->employementType->AdvancedSearch->save(); // employementType
			$this->industry->AdvancedSearch->save(); // industry
			$this->experienceLevel->AdvancedSearch->save(); // experienceLevel
			$this->jobFunction->AdvancedSearch->save(); // jobFunction
			$this->educationLevel->AdvancedSearch->save(); // educationLevel
			$this->currency->AdvancedSearch->save(); // currency
			$this->showSalary->AdvancedSearch->save(); // showSalary
			$this->salaryMin->AdvancedSearch->save(); // salaryMin
			$this->salaryMax->AdvancedSearch->save(); // salaryMax
			$this->keywords->AdvancedSearch->save(); // keywords
			$this->status->AdvancedSearch->save(); // status
			$this->closingDate->AdvancedSearch->save(); // closingDate
			$this->attachment->AdvancedSearch->save(); // attachment
			$this->display->AdvancedSearch->save(); // display
			$this->postedBy->AdvancedSearch->save(); // postedBy
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
		$this->buildBasicSearchSql($where, $this->title, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->shortDescription, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->requirements, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->benefits, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->department, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->code, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->keywords, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->attachment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->display, $arKeywords, $type);
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
		if ($this->title->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->shortDescription->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->description->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->requirements->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->benefits->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->country->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->company->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->department->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->code->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->employementType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->industry->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->experienceLevel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->jobFunction->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->educationLevel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->currency->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->showSalary->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->salaryMin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->salaryMax->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->keywords->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->closingDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->attachment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->display->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->postedBy->AdvancedSearch->issetSession())
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
		$this->title->AdvancedSearch->unsetSession();
		$this->shortDescription->AdvancedSearch->unsetSession();
		$this->description->AdvancedSearch->unsetSession();
		$this->requirements->AdvancedSearch->unsetSession();
		$this->benefits->AdvancedSearch->unsetSession();
		$this->country->AdvancedSearch->unsetSession();
		$this->company->AdvancedSearch->unsetSession();
		$this->department->AdvancedSearch->unsetSession();
		$this->code->AdvancedSearch->unsetSession();
		$this->employementType->AdvancedSearch->unsetSession();
		$this->industry->AdvancedSearch->unsetSession();
		$this->experienceLevel->AdvancedSearch->unsetSession();
		$this->jobFunction->AdvancedSearch->unsetSession();
		$this->educationLevel->AdvancedSearch->unsetSession();
		$this->currency->AdvancedSearch->unsetSession();
		$this->showSalary->AdvancedSearch->unsetSession();
		$this->salaryMin->AdvancedSearch->unsetSession();
		$this->salaryMax->AdvancedSearch->unsetSession();
		$this->keywords->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->closingDate->AdvancedSearch->unsetSession();
		$this->attachment->AdvancedSearch->unsetSession();
		$this->display->AdvancedSearch->unsetSession();
		$this->postedBy->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->title->AdvancedSearch->load();
		$this->shortDescription->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->requirements->AdvancedSearch->load();
		$this->benefits->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->company->AdvancedSearch->load();
		$this->department->AdvancedSearch->load();
		$this->code->AdvancedSearch->load();
		$this->employementType->AdvancedSearch->load();
		$this->industry->AdvancedSearch->load();
		$this->experienceLevel->AdvancedSearch->load();
		$this->jobFunction->AdvancedSearch->load();
		$this->educationLevel->AdvancedSearch->load();
		$this->currency->AdvancedSearch->load();
		$this->showSalary->AdvancedSearch->load();
		$this->salaryMin->AdvancedSearch->load();
		$this->salaryMax->AdvancedSearch->load();
		$this->keywords->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->closingDate->AdvancedSearch->load();
		$this->attachment->AdvancedSearch->load();
		$this->display->AdvancedSearch->load();
		$this->postedBy->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->title); // title
			$this->updateSort($this->country); // country
			$this->updateSort($this->company); // company
			$this->updateSort($this->department); // department
			$this->updateSort($this->code); // code
			$this->updateSort($this->employementType); // employementType
			$this->updateSort($this->industry); // industry
			$this->updateSort($this->experienceLevel); // experienceLevel
			$this->updateSort($this->jobFunction); // jobFunction
			$this->updateSort($this->educationLevel); // educationLevel
			$this->updateSort($this->currency); // currency
			$this->updateSort($this->showSalary); // showSalary
			$this->updateSort($this->salaryMin); // salaryMin
			$this->updateSort($this->salaryMax); // salaryMax
			$this->updateSort($this->status); // status
			$this->updateSort($this->closingDate); // closingDate
			$this->updateSort($this->attachment); // attachment
			$this->updateSort($this->display); // display
			$this->updateSort($this->postedBy); // postedBy
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
				$this->title->setSort("");
				$this->country->setSort("");
				$this->company->setSort("");
				$this->department->setSort("");
				$this->code->setSort("");
				$this->employementType->setSort("");
				$this->industry->setSort("");
				$this->experienceLevel->setSort("");
				$this->jobFunction->setSort("");
				$this->educationLevel->setSort("");
				$this->currency->setSort("");
				$this->showSalary->setSort("");
				$this->salaryMin->setSort("");
				$this->salaryMax->setSort("");
				$this->status->setSort("");
				$this->closingDate->setSort("");
				$this->attachment->setSort("");
				$this->display->setSort("");
				$this->postedBy->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"frecruitment_joblistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"frecruitment_joblistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.frecruitment_joblist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"frecruitment_joblistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// title
		if (!$this->isAddOrEdit())
			$this->title->AdvancedSearch->setSearchValue(Get("x_title", Get("title", "")));
		if ($this->title->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->title->AdvancedSearch->setSearchOperator(Get("z_title", ""));

		// shortDescription
		if (!$this->isAddOrEdit())
			$this->shortDescription->AdvancedSearch->setSearchValue(Get("x_shortDescription", Get("shortDescription", "")));
		if ($this->shortDescription->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->shortDescription->AdvancedSearch->setSearchOperator(Get("z_shortDescription", ""));

		// description
		if (!$this->isAddOrEdit())
			$this->description->AdvancedSearch->setSearchValue(Get("x_description", Get("description", "")));
		if ($this->description->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->description->AdvancedSearch->setSearchOperator(Get("z_description", ""));

		// requirements
		if (!$this->isAddOrEdit())
			$this->requirements->AdvancedSearch->setSearchValue(Get("x_requirements", Get("requirements", "")));
		if ($this->requirements->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->requirements->AdvancedSearch->setSearchOperator(Get("z_requirements", ""));

		// benefits
		if (!$this->isAddOrEdit())
			$this->benefits->AdvancedSearch->setSearchValue(Get("x_benefits", Get("benefits", "")));
		if ($this->benefits->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->benefits->AdvancedSearch->setSearchOperator(Get("z_benefits", ""));

		// country
		if (!$this->isAddOrEdit())
			$this->country->AdvancedSearch->setSearchValue(Get("x_country", Get("country", "")));
		if ($this->country->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->country->AdvancedSearch->setSearchOperator(Get("z_country", ""));

		// company
		if (!$this->isAddOrEdit())
			$this->company->AdvancedSearch->setSearchValue(Get("x_company", Get("company", "")));
		if ($this->company->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->company->AdvancedSearch->setSearchOperator(Get("z_company", ""));

		// department
		if (!$this->isAddOrEdit())
			$this->department->AdvancedSearch->setSearchValue(Get("x_department", Get("department", "")));
		if ($this->department->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->department->AdvancedSearch->setSearchOperator(Get("z_department", ""));

		// code
		if (!$this->isAddOrEdit())
			$this->code->AdvancedSearch->setSearchValue(Get("x_code", Get("code", "")));
		if ($this->code->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->code->AdvancedSearch->setSearchOperator(Get("z_code", ""));

		// employementType
		if (!$this->isAddOrEdit())
			$this->employementType->AdvancedSearch->setSearchValue(Get("x_employementType", Get("employementType", "")));
		if ($this->employementType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->employementType->AdvancedSearch->setSearchOperator(Get("z_employementType", ""));

		// industry
		if (!$this->isAddOrEdit())
			$this->industry->AdvancedSearch->setSearchValue(Get("x_industry", Get("industry", "")));
		if ($this->industry->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->industry->AdvancedSearch->setSearchOperator(Get("z_industry", ""));

		// experienceLevel
		if (!$this->isAddOrEdit())
			$this->experienceLevel->AdvancedSearch->setSearchValue(Get("x_experienceLevel", Get("experienceLevel", "")));
		if ($this->experienceLevel->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->experienceLevel->AdvancedSearch->setSearchOperator(Get("z_experienceLevel", ""));

		// jobFunction
		if (!$this->isAddOrEdit())
			$this->jobFunction->AdvancedSearch->setSearchValue(Get("x_jobFunction", Get("jobFunction", "")));
		if ($this->jobFunction->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->jobFunction->AdvancedSearch->setSearchOperator(Get("z_jobFunction", ""));

		// educationLevel
		if (!$this->isAddOrEdit())
			$this->educationLevel->AdvancedSearch->setSearchValue(Get("x_educationLevel", Get("educationLevel", "")));
		if ($this->educationLevel->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->educationLevel->AdvancedSearch->setSearchOperator(Get("z_educationLevel", ""));

		// currency
		if (!$this->isAddOrEdit())
			$this->currency->AdvancedSearch->setSearchValue(Get("x_currency", Get("currency", "")));
		if ($this->currency->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->currency->AdvancedSearch->setSearchOperator(Get("z_currency", ""));

		// showSalary
		if (!$this->isAddOrEdit())
			$this->showSalary->AdvancedSearch->setSearchValue(Get("x_showSalary", Get("showSalary", "")));
		if ($this->showSalary->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->showSalary->AdvancedSearch->setSearchOperator(Get("z_showSalary", ""));

		// salaryMin
		if (!$this->isAddOrEdit())
			$this->salaryMin->AdvancedSearch->setSearchValue(Get("x_salaryMin", Get("salaryMin", "")));
		if ($this->salaryMin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->salaryMin->AdvancedSearch->setSearchOperator(Get("z_salaryMin", ""));

		// salaryMax
		if (!$this->isAddOrEdit())
			$this->salaryMax->AdvancedSearch->setSearchValue(Get("x_salaryMax", Get("salaryMax", "")));
		if ($this->salaryMax->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->salaryMax->AdvancedSearch->setSearchOperator(Get("z_salaryMax", ""));

		// keywords
		if (!$this->isAddOrEdit())
			$this->keywords->AdvancedSearch->setSearchValue(Get("x_keywords", Get("keywords", "")));
		if ($this->keywords->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->keywords->AdvancedSearch->setSearchOperator(Get("z_keywords", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));

		// closingDate
		if (!$this->isAddOrEdit())
			$this->closingDate->AdvancedSearch->setSearchValue(Get("x_closingDate", Get("closingDate", "")));
		if ($this->closingDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->closingDate->AdvancedSearch->setSearchOperator(Get("z_closingDate", ""));

		// attachment
		if (!$this->isAddOrEdit())
			$this->attachment->AdvancedSearch->setSearchValue(Get("x_attachment", Get("attachment", "")));
		if ($this->attachment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->attachment->AdvancedSearch->setSearchOperator(Get("z_attachment", ""));

		// display
		if (!$this->isAddOrEdit())
			$this->display->AdvancedSearch->setSearchValue(Get("x_display", Get("display", "")));
		if ($this->display->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->display->AdvancedSearch->setSearchOperator(Get("z_display", ""));

		// postedBy
		if (!$this->isAddOrEdit())
			$this->postedBy->AdvancedSearch->setSearchValue(Get("x_postedBy", Get("postedBy", "")));
		if ($this->postedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->postedBy->AdvancedSearch->setSearchOperator(Get("z_postedBy", ""));
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
		$this->title->setDbValue($row['title']);
		$this->shortDescription->setDbValue($row['shortDescription']);
		$this->description->setDbValue($row['description']);
		$this->requirements->setDbValue($row['requirements']);
		$this->benefits->setDbValue($row['benefits']);
		$this->country->setDbValue($row['country']);
		$this->company->setDbValue($row['company']);
		$this->department->setDbValue($row['department']);
		$this->code->setDbValue($row['code']);
		$this->employementType->setDbValue($row['employementType']);
		$this->industry->setDbValue($row['industry']);
		$this->experienceLevel->setDbValue($row['experienceLevel']);
		$this->jobFunction->setDbValue($row['jobFunction']);
		$this->educationLevel->setDbValue($row['educationLevel']);
		$this->currency->setDbValue($row['currency']);
		$this->showSalary->setDbValue($row['showSalary']);
		$this->salaryMin->setDbValue($row['salaryMin']);
		$this->salaryMax->setDbValue($row['salaryMax']);
		$this->keywords->setDbValue($row['keywords']);
		$this->status->setDbValue($row['status']);
		$this->closingDate->setDbValue($row['closingDate']);
		$this->attachment->setDbValue($row['attachment']);
		$this->display->setDbValue($row['display']);
		$this->postedBy->setDbValue($row['postedBy']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['title'] = NULL;
		$row['shortDescription'] = NULL;
		$row['description'] = NULL;
		$row['requirements'] = NULL;
		$row['benefits'] = NULL;
		$row['country'] = NULL;
		$row['company'] = NULL;
		$row['department'] = NULL;
		$row['code'] = NULL;
		$row['employementType'] = NULL;
		$row['industry'] = NULL;
		$row['experienceLevel'] = NULL;
		$row['jobFunction'] = NULL;
		$row['educationLevel'] = NULL;
		$row['currency'] = NULL;
		$row['showSalary'] = NULL;
		$row['salaryMin'] = NULL;
		$row['salaryMax'] = NULL;
		$row['keywords'] = NULL;
		$row['status'] = NULL;
		$row['closingDate'] = NULL;
		$row['attachment'] = NULL;
		$row['display'] = NULL;
		$row['postedBy'] = NULL;
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

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// title
		// shortDescription
		// description
		// requirements
		// benefits
		// country
		// company
		// department
		// code
		// employementType
		// industry
		// experienceLevel
		// jobFunction
		// educationLevel
		// currency
		// showSalary
		// salaryMin
		// salaryMax
		// keywords
		// status
		// closingDate
		// attachment
		// display
		// postedBy

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
			$this->country->ViewCustomAttributes = "";

			// company
			$this->company->ViewValue = $this->company->CurrentValue;
			$this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
			$this->company->ViewCustomAttributes = "";

			// department
			$this->department->ViewValue = $this->department->CurrentValue;
			$this->department->ViewCustomAttributes = "";

			// code
			$this->code->ViewValue = $this->code->CurrentValue;
			$this->code->ViewCustomAttributes = "";

			// employementType
			$this->employementType->ViewValue = $this->employementType->CurrentValue;
			$this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
			$this->employementType->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
			$this->industry->ViewCustomAttributes = "";

			// experienceLevel
			$this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
			$this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
			$this->experienceLevel->ViewCustomAttributes = "";

			// jobFunction
			$this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
			$this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
			$this->jobFunction->ViewCustomAttributes = "";

			// educationLevel
			$this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
			$this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
			$this->educationLevel->ViewCustomAttributes = "";

			// currency
			$this->currency->ViewValue = $this->currency->CurrentValue;
			$this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
			$this->currency->ViewCustomAttributes = "";

			// showSalary
			if (strval($this->showSalary->CurrentValue) <> "") {
				$this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
			} else {
				$this->showSalary->ViewValue = NULL;
			}
			$this->showSalary->ViewCustomAttributes = "";

			// salaryMin
			$this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
			$this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
			$this->salaryMin->ViewCustomAttributes = "";

			// salaryMax
			$this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
			$this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
			$this->salaryMax->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// closingDate
			$this->closingDate->ViewValue = $this->closingDate->CurrentValue;
			$this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
			$this->closingDate->ViewCustomAttributes = "";

			// attachment
			$this->attachment->ViewValue = $this->attachment->CurrentValue;
			$this->attachment->ViewCustomAttributes = "";

			// display
			$this->display->ViewValue = $this->display->CurrentValue;
			$this->display->ViewCustomAttributes = "";

			// postedBy
			$this->postedBy->ViewValue = $this->postedBy->CurrentValue;
			$this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
			$this->postedBy->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";
			$this->company->TooltipValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";
			$this->department->TooltipValue = "";

			// code
			$this->code->LinkCustomAttributes = "";
			$this->code->HrefValue = "";
			$this->code->TooltipValue = "";

			// employementType
			$this->employementType->LinkCustomAttributes = "";
			$this->employementType->HrefValue = "";
			$this->employementType->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// experienceLevel
			$this->experienceLevel->LinkCustomAttributes = "";
			$this->experienceLevel->HrefValue = "";
			$this->experienceLevel->TooltipValue = "";

			// jobFunction
			$this->jobFunction->LinkCustomAttributes = "";
			$this->jobFunction->HrefValue = "";
			$this->jobFunction->TooltipValue = "";

			// educationLevel
			$this->educationLevel->LinkCustomAttributes = "";
			$this->educationLevel->HrefValue = "";
			$this->educationLevel->TooltipValue = "";

			// currency
			$this->currency->LinkCustomAttributes = "";
			$this->currency->HrefValue = "";
			$this->currency->TooltipValue = "";

			// showSalary
			$this->showSalary->LinkCustomAttributes = "";
			$this->showSalary->HrefValue = "";
			$this->showSalary->TooltipValue = "";

			// salaryMin
			$this->salaryMin->LinkCustomAttributes = "";
			$this->salaryMin->HrefValue = "";
			$this->salaryMin->TooltipValue = "";

			// salaryMax
			$this->salaryMax->LinkCustomAttributes = "";
			$this->salaryMax->HrefValue = "";
			$this->salaryMax->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// closingDate
			$this->closingDate->LinkCustomAttributes = "";
			$this->closingDate->HrefValue = "";
			$this->closingDate->TooltipValue = "";

			// attachment
			$this->attachment->LinkCustomAttributes = "";
			$this->attachment->HrefValue = "";
			$this->attachment->TooltipValue = "";

			// display
			$this->display->LinkCustomAttributes = "";
			$this->display->HrefValue = "";
			$this->display->TooltipValue = "";

			// postedBy
			$this->postedBy->LinkCustomAttributes = "";
			$this->postedBy->HrefValue = "";
			$this->postedBy->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->title->AdvancedSearch->SearchValue = HtmlDecode($this->title->AdvancedSearch->SearchValue);
			$this->title->EditValue = HtmlEncode($this->title->AdvancedSearch->SearchValue);
			$this->title->PlaceHolder = RemoveHtml($this->title->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			$this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// company
			$this->company->EditAttrs["class"] = "form-control";
			$this->company->EditCustomAttributes = "";
			$this->company->EditValue = HtmlEncode($this->company->AdvancedSearch->SearchValue);
			$this->company->PlaceHolder = RemoveHtml($this->company->caption());

			// department
			$this->department->EditAttrs["class"] = "form-control";
			$this->department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->department->AdvancedSearch->SearchValue = HtmlDecode($this->department->AdvancedSearch->SearchValue);
			$this->department->EditValue = HtmlEncode($this->department->AdvancedSearch->SearchValue);
			$this->department->PlaceHolder = RemoveHtml($this->department->caption());

			// code
			$this->code->EditAttrs["class"] = "form-control";
			$this->code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->code->AdvancedSearch->SearchValue = HtmlDecode($this->code->AdvancedSearch->SearchValue);
			$this->code->EditValue = HtmlEncode($this->code->AdvancedSearch->SearchValue);
			$this->code->PlaceHolder = RemoveHtml($this->code->caption());

			// employementType
			$this->employementType->EditAttrs["class"] = "form-control";
			$this->employementType->EditCustomAttributes = "";
			$this->employementType->EditValue = HtmlEncode($this->employementType->AdvancedSearch->SearchValue);
			$this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

			// industry
			$this->industry->EditAttrs["class"] = "form-control";
			$this->industry->EditCustomAttributes = "";
			$this->industry->EditValue = HtmlEncode($this->industry->AdvancedSearch->SearchValue);
			$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

			// experienceLevel
			$this->experienceLevel->EditAttrs["class"] = "form-control";
			$this->experienceLevel->EditCustomAttributes = "";
			$this->experienceLevel->EditValue = HtmlEncode($this->experienceLevel->AdvancedSearch->SearchValue);
			$this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

			// jobFunction
			$this->jobFunction->EditAttrs["class"] = "form-control";
			$this->jobFunction->EditCustomAttributes = "";
			$this->jobFunction->EditValue = HtmlEncode($this->jobFunction->AdvancedSearch->SearchValue);
			$this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

			// educationLevel
			$this->educationLevel->EditAttrs["class"] = "form-control";
			$this->educationLevel->EditCustomAttributes = "";
			$this->educationLevel->EditValue = HtmlEncode($this->educationLevel->AdvancedSearch->SearchValue);
			$this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

			// currency
			$this->currency->EditAttrs["class"] = "form-control";
			$this->currency->EditCustomAttributes = "";
			$this->currency->EditValue = HtmlEncode($this->currency->AdvancedSearch->SearchValue);
			$this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

			// showSalary
			$this->showSalary->EditCustomAttributes = "";
			$this->showSalary->EditValue = $this->showSalary->options(FALSE);

			// salaryMin
			$this->salaryMin->EditAttrs["class"] = "form-control";
			$this->salaryMin->EditCustomAttributes = "";
			$this->salaryMin->EditValue = HtmlEncode($this->salaryMin->AdvancedSearch->SearchValue);
			$this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

			// salaryMax
			$this->salaryMax->EditAttrs["class"] = "form-control";
			$this->salaryMax->EditCustomAttributes = "";
			$this->salaryMax->EditValue = HtmlEncode($this->salaryMax->AdvancedSearch->SearchValue);
			$this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// closingDate
			$this->closingDate->EditAttrs["class"] = "form-control";
			$this->closingDate->EditCustomAttributes = "";
			$this->closingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->closingDate->AdvancedSearch->SearchValue, 0), 8));
			$this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

			// attachment
			$this->attachment->EditAttrs["class"] = "form-control";
			$this->attachment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->attachment->AdvancedSearch->SearchValue = HtmlDecode($this->attachment->AdvancedSearch->SearchValue);
			$this->attachment->EditValue = HtmlEncode($this->attachment->AdvancedSearch->SearchValue);
			$this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

			// display
			$this->display->EditAttrs["class"] = "form-control";
			$this->display->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->display->AdvancedSearch->SearchValue = HtmlDecode($this->display->AdvancedSearch->SearchValue);
			$this->display->EditValue = HtmlEncode($this->display->AdvancedSearch->SearchValue);
			$this->display->PlaceHolder = RemoveHtml($this->display->caption());

			// postedBy
			$this->postedBy->EditAttrs["class"] = "form-control";
			$this->postedBy->EditCustomAttributes = "";
			$this->postedBy->EditValue = HtmlEncode($this->postedBy->AdvancedSearch->SearchValue);
			$this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());
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
		$this->title->AdvancedSearch->load();
		$this->shortDescription->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->requirements->AdvancedSearch->load();
		$this->benefits->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->company->AdvancedSearch->load();
		$this->department->AdvancedSearch->load();
		$this->code->AdvancedSearch->load();
		$this->employementType->AdvancedSearch->load();
		$this->industry->AdvancedSearch->load();
		$this->experienceLevel->AdvancedSearch->load();
		$this->jobFunction->AdvancedSearch->load();
		$this->educationLevel->AdvancedSearch->load();
		$this->currency->AdvancedSearch->load();
		$this->showSalary->AdvancedSearch->load();
		$this->salaryMin->AdvancedSearch->load();
		$this->salaryMax->AdvancedSearch->load();
		$this->keywords->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->closingDate->AdvancedSearch->load();
		$this->attachment->AdvancedSearch->load();
		$this->display->AdvancedSearch->load();
		$this->postedBy->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.frecruitment_joblist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.frecruitment_joblist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.frecruitment_joblist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_recruitment_job\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_recruitment_job',hdr:ew.language.phrase('ExportToEmailText'),f:document.frecruitment_joblist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
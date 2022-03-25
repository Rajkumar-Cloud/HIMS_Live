<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class qaqcrecord_endrology_list extends qaqcrecord_endrology
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'qaqcrecord_endrology';

	// Page object name
	public $PageObjName = "qaqcrecord_endrology_list";

	// Grid form hidden field names
	public $FormName = "fqaqcrecord_endrologylist";
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

		// Table object (qaqcrecord_endrology)
		if (!isset($GLOBALS["qaqcrecord_endrology"]) || get_class($GLOBALS["qaqcrecord_endrology"]) == PROJECT_NAMESPACE . "qaqcrecord_endrology") {
			$GLOBALS["qaqcrecord_endrology"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["qaqcrecord_endrology"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "qaqcrecord_endrologyadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "qaqcrecord_endrologydelete.php";
		$this->MultiUpdateUrl = "qaqcrecord_endrologyupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'qaqcrecord_endrology');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fqaqcrecord_endrologylistsrch";

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
		global $EXPORT, $qaqcrecord_endrology;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($qaqcrecord_endrology);
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
			$this->Createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedDate->Visible = FALSE;
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

		// Create form object
		$CurrentForm = new HttpForm();

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
		$this->Date->setVisibility();
		$this->LN2_Level->setVisibility();
		$this->LN2_Checked->setVisibility();
		$this->Incubator_Temp->setVisibility();
		$this->Incubator_Cleaned->setVisibility();
		$this->LAF_MG->setVisibility();
		$this->LAF_Cleaned->setVisibility();
		$this->REF_Temp->setVisibility();
		$this->REF_Cleaned->setVisibility();
		$this->Heating_Temp->setVisibility();
		$this->Heating_Cleaned->setVisibility();
		$this->Createdby->setVisibility();
		$this->CreatedDate->setVisibility();
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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to inline edit mode
				if ($this->isEdit())
					$this->inlineEditMode();

				// Switch to inline add mode
				if ($this->isAdd() || $this->isCopy())
					$this->inlineAddMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}

					// Inline Update
					if (($this->isUpdate() || $this->isOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "edit")
						$this->inlineUpdate();

					// Insert Inline
					if ($this->isInsert() && @$_SESSION[SESSION_INLINE_MODE] == "add")
						$this->inlineInsert();

					// Grid Insert
					if ($this->isGridInsert() && @$_SESSION[SESSION_INLINE_MODE] == "gridadd") {
						if ($this->validateGridForm()) {
							$gridInsert = $this->gridInsert();
						} else {
							$gridInsert = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridInsert) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridAddMode(); // Stay in Grid add mode
						}
					}
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(TABLE_START_REC) !== NULL || Get(TABLE_PAGE_NO) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
				}
			}

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->setKey("id", ""); // Clear inline edit key
		$this->LN2_Level->FormValue = ""; // Clear form value
		$this->Incubator_Temp->FormValue = ""; // Clear form value
		$this->LAF_MG->FormValue = ""; // Clear form value
		$this->REF_Temp->FormValue = ""; // Clear form value
		$this->Heating_Temp->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Inline Edit mode
	protected function inlineEditMode()
	{
		global $Security, $Language;
		if (!$Security->canEdit())
			return FALSE; // Edit not allowed
		$inlineEdit = TRUE;
		if (Get("id") !== NULL) {
			$this->id->setQueryStringValue(Get("id"));
		} else {
			$inlineEdit = FALSE;
		}
		if ($inlineEdit) {
			if ($this->loadRow()) {
				$this->setKey("id", $this->id->CurrentValue); // Set up inline edit key
				$_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
			}
		}
		return TRUE;
	}

	// Perform update to Inline Edit record
	protected function inlineUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$CurrentForm->Index = 1;
		$this->loadFormValues(); // Get form values

		// Validate form
		$inlineUpdate = TRUE;
		if (!$this->validateForm()) {
			$inlineUpdate = FALSE; // Form error, reset action
			$this->setFailureMessage($FormError);
		} else {
			$inlineUpdate = FALSE;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			if ($this->setupKeyValues($rowkey)) { // Set up key values
				if ($this->checkInlineEditKey()) { // Check key
					$this->SendEmail = TRUE; // Send email on update success
					$inlineUpdate = $this->editRow(); // Update record
				} else {
					$inlineUpdate = FALSE;
				}
			}
		}
		if ($inlineUpdate) { // Update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
			$this->EventCancelled = TRUE; // Cancel event
			$this->CurrentAction = "edit"; // Stay in edit mode
		}
	}

	// Check Inline Edit key
	public function checkInlineEditKey()
	{
		if (strval($this->getKey("id")) <> strval($this->id->CurrentValue))
			return FALSE;
		return TRUE;
	}

	// Switch to Inline Add mode
	protected function inlineAddMode()
	{
		global $Security, $Language;
		if (!$Security->canAdd())
			return FALSE; // Add not allowed
		if ($this->isCopy()) {
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CurrentAction = "add";
			}
		}
		$_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
		return TRUE;
	}

	// Perform update to Inline Add/Copy record
	protected function inlineInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$this->loadOldRecord(); // Load old record
		$CurrentForm->Index = 0;
		$this->loadFormValues(); // Get form values

		// Validate form
		if (!$this->validateForm()) {
			$this->setFailureMessage($FormError); // Set validation error message
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
			return;
		}
		$this->SendEmail = TRUE; // Send email on add success
		if ($this->addRow($this->OldRecordset)) { // Add record
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
			$this->clearInlineMode(); // Clear inline add mode
		} else { // Add failed
			$this->EventCancelled = TRUE; // Set event cancelled
			$this->CurrentAction = "add"; // Stay in add mode
		}
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
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

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = &$this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->setFailureMessage($Language->phrase("NoAddRecord"));
			$gridInsert = FALSE;
		}
		if ($gridInsert) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_Date") && $CurrentForm->hasValue("o_Date") && $this->Date->CurrentValue <> $this->Date->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LN2_Level") && $CurrentForm->hasValue("o_LN2_Level") && $this->LN2_Level->CurrentValue <> $this->LN2_Level->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LN2_Checked") && $CurrentForm->hasValue("o_LN2_Checked") && $this->LN2_Checked->CurrentValue <> $this->LN2_Checked->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Incubator_Temp") && $CurrentForm->hasValue("o_Incubator_Temp") && $this->Incubator_Temp->CurrentValue <> $this->Incubator_Temp->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Incubator_Cleaned") && $CurrentForm->hasValue("o_Incubator_Cleaned") && $this->Incubator_Cleaned->CurrentValue <> $this->Incubator_Cleaned->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LAF_MG") && $CurrentForm->hasValue("o_LAF_MG") && $this->LAF_MG->CurrentValue <> $this->LAF_MG->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LAF_Cleaned") && $CurrentForm->hasValue("o_LAF_Cleaned") && $this->LAF_Cleaned->CurrentValue <> $this->LAF_Cleaned->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_REF_Temp") && $CurrentForm->hasValue("o_REF_Temp") && $this->REF_Temp->CurrentValue <> $this->REF_Temp->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_REF_Cleaned") && $CurrentForm->hasValue("o_REF_Cleaned") && $this->REF_Cleaned->CurrentValue <> $this->REF_Cleaned->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Heating_Temp") && $CurrentForm->hasValue("o_Heating_Temp") && $this->Heating_Temp->CurrentValue <> $this->Heating_Temp->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Heating_Cleaned") && $CurrentForm->hasValue("o_Heating_Cleaned") && $this->Heating_Cleaned->CurrentValue <> $this->Heating_Cleaned->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fqaqcrecord_endrologylistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->Date->AdvancedSearch->toJson(), ","); // Field Date
		$filterList = Concat($filterList, $this->LN2_Level->AdvancedSearch->toJson(), ","); // Field LN2_Level
		$filterList = Concat($filterList, $this->LN2_Checked->AdvancedSearch->toJson(), ","); // Field LN2_Checked
		$filterList = Concat($filterList, $this->Incubator_Temp->AdvancedSearch->toJson(), ","); // Field Incubator_Temp
		$filterList = Concat($filterList, $this->Incubator_Cleaned->AdvancedSearch->toJson(), ","); // Field Incubator_Cleaned
		$filterList = Concat($filterList, $this->LAF_MG->AdvancedSearch->toJson(), ","); // Field LAF_MG
		$filterList = Concat($filterList, $this->LAF_Cleaned->AdvancedSearch->toJson(), ","); // Field LAF_Cleaned
		$filterList = Concat($filterList, $this->REF_Temp->AdvancedSearch->toJson(), ","); // Field REF_Temp
		$filterList = Concat($filterList, $this->REF_Cleaned->AdvancedSearch->toJson(), ","); // Field REF_Cleaned
		$filterList = Concat($filterList, $this->Heating_Temp->AdvancedSearch->toJson(), ","); // Field Heating_Temp
		$filterList = Concat($filterList, $this->Heating_Cleaned->AdvancedSearch->toJson(), ","); // Field Heating_Cleaned
		$filterList = Concat($filterList, $this->Createdby->AdvancedSearch->toJson(), ","); // Field Createdby
		$filterList = Concat($filterList, $this->CreatedDate->AdvancedSearch->toJson(), ","); // Field CreatedDate
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fqaqcrecord_endrologylistsrch", $filters);
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

		// Field Date
		$this->Date->AdvancedSearch->SearchValue = @$filter["x_Date"];
		$this->Date->AdvancedSearch->SearchOperator = @$filter["z_Date"];
		$this->Date->AdvancedSearch->SearchCondition = @$filter["v_Date"];
		$this->Date->AdvancedSearch->SearchValue2 = @$filter["y_Date"];
		$this->Date->AdvancedSearch->SearchOperator2 = @$filter["w_Date"];
		$this->Date->AdvancedSearch->save();

		// Field LN2_Level
		$this->LN2_Level->AdvancedSearch->SearchValue = @$filter["x_LN2_Level"];
		$this->LN2_Level->AdvancedSearch->SearchOperator = @$filter["z_LN2_Level"];
		$this->LN2_Level->AdvancedSearch->SearchCondition = @$filter["v_LN2_Level"];
		$this->LN2_Level->AdvancedSearch->SearchValue2 = @$filter["y_LN2_Level"];
		$this->LN2_Level->AdvancedSearch->SearchOperator2 = @$filter["w_LN2_Level"];
		$this->LN2_Level->AdvancedSearch->save();

		// Field LN2_Checked
		$this->LN2_Checked->AdvancedSearch->SearchValue = @$filter["x_LN2_Checked"];
		$this->LN2_Checked->AdvancedSearch->SearchOperator = @$filter["z_LN2_Checked"];
		$this->LN2_Checked->AdvancedSearch->SearchCondition = @$filter["v_LN2_Checked"];
		$this->LN2_Checked->AdvancedSearch->SearchValue2 = @$filter["y_LN2_Checked"];
		$this->LN2_Checked->AdvancedSearch->SearchOperator2 = @$filter["w_LN2_Checked"];
		$this->LN2_Checked->AdvancedSearch->save();

		// Field Incubator_Temp
		$this->Incubator_Temp->AdvancedSearch->SearchValue = @$filter["x_Incubator_Temp"];
		$this->Incubator_Temp->AdvancedSearch->SearchOperator = @$filter["z_Incubator_Temp"];
		$this->Incubator_Temp->AdvancedSearch->SearchCondition = @$filter["v_Incubator_Temp"];
		$this->Incubator_Temp->AdvancedSearch->SearchValue2 = @$filter["y_Incubator_Temp"];
		$this->Incubator_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator_Temp"];
		$this->Incubator_Temp->AdvancedSearch->save();

		// Field Incubator_Cleaned
		$this->Incubator_Cleaned->AdvancedSearch->SearchValue = @$filter["x_Incubator_Cleaned"];
		$this->Incubator_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_Incubator_Cleaned"];
		$this->Incubator_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_Incubator_Cleaned"];
		$this->Incubator_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_Incubator_Cleaned"];
		$this->Incubator_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator_Cleaned"];
		$this->Incubator_Cleaned->AdvancedSearch->save();

		// Field LAF_MG
		$this->LAF_MG->AdvancedSearch->SearchValue = @$filter["x_LAF_MG"];
		$this->LAF_MG->AdvancedSearch->SearchOperator = @$filter["z_LAF_MG"];
		$this->LAF_MG->AdvancedSearch->SearchCondition = @$filter["v_LAF_MG"];
		$this->LAF_MG->AdvancedSearch->SearchValue2 = @$filter["y_LAF_MG"];
		$this->LAF_MG->AdvancedSearch->SearchOperator2 = @$filter["w_LAF_MG"];
		$this->LAF_MG->AdvancedSearch->save();

		// Field LAF_Cleaned
		$this->LAF_Cleaned->AdvancedSearch->SearchValue = @$filter["x_LAF_Cleaned"];
		$this->LAF_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_LAF_Cleaned"];
		$this->LAF_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_LAF_Cleaned"];
		$this->LAF_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_LAF_Cleaned"];
		$this->LAF_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_LAF_Cleaned"];
		$this->LAF_Cleaned->AdvancedSearch->save();

		// Field REF_Temp
		$this->REF_Temp->AdvancedSearch->SearchValue = @$filter["x_REF_Temp"];
		$this->REF_Temp->AdvancedSearch->SearchOperator = @$filter["z_REF_Temp"];
		$this->REF_Temp->AdvancedSearch->SearchCondition = @$filter["v_REF_Temp"];
		$this->REF_Temp->AdvancedSearch->SearchValue2 = @$filter["y_REF_Temp"];
		$this->REF_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_REF_Temp"];
		$this->REF_Temp->AdvancedSearch->save();

		// Field REF_Cleaned
		$this->REF_Cleaned->AdvancedSearch->SearchValue = @$filter["x_REF_Cleaned"];
		$this->REF_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_REF_Cleaned"];
		$this->REF_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_REF_Cleaned"];
		$this->REF_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_REF_Cleaned"];
		$this->REF_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_REF_Cleaned"];
		$this->REF_Cleaned->AdvancedSearch->save();

		// Field Heating_Temp
		$this->Heating_Temp->AdvancedSearch->SearchValue = @$filter["x_Heating_Temp"];
		$this->Heating_Temp->AdvancedSearch->SearchOperator = @$filter["z_Heating_Temp"];
		$this->Heating_Temp->AdvancedSearch->SearchCondition = @$filter["v_Heating_Temp"];
		$this->Heating_Temp->AdvancedSearch->SearchValue2 = @$filter["y_Heating_Temp"];
		$this->Heating_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Heating_Temp"];
		$this->Heating_Temp->AdvancedSearch->save();

		// Field Heating_Cleaned
		$this->Heating_Cleaned->AdvancedSearch->SearchValue = @$filter["x_Heating_Cleaned"];
		$this->Heating_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_Heating_Cleaned"];
		$this->Heating_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_Heating_Cleaned"];
		$this->Heating_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_Heating_Cleaned"];
		$this->Heating_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_Heating_Cleaned"];
		$this->Heating_Cleaned->AdvancedSearch->save();

		// Field Createdby
		$this->Createdby->AdvancedSearch->SearchValue = @$filter["x_Createdby"];
		$this->Createdby->AdvancedSearch->SearchOperator = @$filter["z_Createdby"];
		$this->Createdby->AdvancedSearch->SearchCondition = @$filter["v_Createdby"];
		$this->Createdby->AdvancedSearch->SearchValue2 = @$filter["y_Createdby"];
		$this->Createdby->AdvancedSearch->SearchOperator2 = @$filter["w_Createdby"];
		$this->Createdby->AdvancedSearch->save();

		// Field CreatedDate
		$this->CreatedDate->AdvancedSearch->SearchValue = @$filter["x_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchOperator = @$filter["z_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchCondition = @$filter["v_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->Date, $default, FALSE); // Date
		$this->buildSearchSql($where, $this->LN2_Level, $default, FALSE); // LN2_Level
		$this->buildSearchSql($where, $this->LN2_Checked, $default, TRUE); // LN2_Checked
		$this->buildSearchSql($where, $this->Incubator_Temp, $default, FALSE); // Incubator_Temp
		$this->buildSearchSql($where, $this->Incubator_Cleaned, $default, TRUE); // Incubator_Cleaned
		$this->buildSearchSql($where, $this->LAF_MG, $default, FALSE); // LAF_MG
		$this->buildSearchSql($where, $this->LAF_Cleaned, $default, TRUE); // LAF_Cleaned
		$this->buildSearchSql($where, $this->REF_Temp, $default, FALSE); // REF_Temp
		$this->buildSearchSql($where, $this->REF_Cleaned, $default, TRUE); // REF_Cleaned
		$this->buildSearchSql($where, $this->Heating_Temp, $default, FALSE); // Heating_Temp
		$this->buildSearchSql($where, $this->Heating_Cleaned, $default, TRUE); // Heating_Cleaned
		$this->buildSearchSql($where, $this->Createdby, $default, FALSE); // Createdby
		$this->buildSearchSql($where, $this->CreatedDate, $default, FALSE); // CreatedDate

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->Date->AdvancedSearch->save(); // Date
			$this->LN2_Level->AdvancedSearch->save(); // LN2_Level
			$this->LN2_Checked->AdvancedSearch->save(); // LN2_Checked
			$this->Incubator_Temp->AdvancedSearch->save(); // Incubator_Temp
			$this->Incubator_Cleaned->AdvancedSearch->save(); // Incubator_Cleaned
			$this->LAF_MG->AdvancedSearch->save(); // LAF_MG
			$this->LAF_Cleaned->AdvancedSearch->save(); // LAF_Cleaned
			$this->REF_Temp->AdvancedSearch->save(); // REF_Temp
			$this->REF_Cleaned->AdvancedSearch->save(); // REF_Cleaned
			$this->Heating_Temp->AdvancedSearch->save(); // Heating_Temp
			$this->Heating_Cleaned->AdvancedSearch->save(); // Heating_Cleaned
			$this->Createdby->AdvancedSearch->save(); // Createdby
			$this->CreatedDate->AdvancedSearch->save(); // CreatedDate
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
		$this->buildBasicSearchSql($where, $this->LN2_Checked, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Incubator_Cleaned, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LAF_Cleaned, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->REF_Cleaned, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Heating_Cleaned, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Createdby, $arKeywords, $type);
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
		if ($this->Date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LN2_Level->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LN2_Checked->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Incubator_Temp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Incubator_Cleaned->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LAF_MG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LAF_Cleaned->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->REF_Temp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->REF_Cleaned->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Heating_Temp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Heating_Cleaned->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CreatedDate->AdvancedSearch->issetSession())
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
		$this->Date->AdvancedSearch->unsetSession();
		$this->LN2_Level->AdvancedSearch->unsetSession();
		$this->LN2_Checked->AdvancedSearch->unsetSession();
		$this->Incubator_Temp->AdvancedSearch->unsetSession();
		$this->Incubator_Cleaned->AdvancedSearch->unsetSession();
		$this->LAF_MG->AdvancedSearch->unsetSession();
		$this->LAF_Cleaned->AdvancedSearch->unsetSession();
		$this->REF_Temp->AdvancedSearch->unsetSession();
		$this->REF_Cleaned->AdvancedSearch->unsetSession();
		$this->Heating_Temp->AdvancedSearch->unsetSession();
		$this->Heating_Cleaned->AdvancedSearch->unsetSession();
		$this->Createdby->AdvancedSearch->unsetSession();
		$this->CreatedDate->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->Date->AdvancedSearch->load();
		$this->LN2_Level->AdvancedSearch->load();
		$this->LN2_Checked->AdvancedSearch->load();
		$this->Incubator_Temp->AdvancedSearch->load();
		$this->Incubator_Cleaned->AdvancedSearch->load();
		$this->LAF_MG->AdvancedSearch->load();
		$this->LAF_Cleaned->AdvancedSearch->load();
		$this->REF_Temp->AdvancedSearch->load();
		$this->REF_Cleaned->AdvancedSearch->load();
		$this->Heating_Temp->AdvancedSearch->load();
		$this->Heating_Cleaned->AdvancedSearch->load();
		$this->Createdby->AdvancedSearch->load();
		$this->CreatedDate->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->Date); // Date
			$this->updateSort($this->LN2_Level); // LN2_Level
			$this->updateSort($this->LN2_Checked); // LN2_Checked
			$this->updateSort($this->Incubator_Temp); // Incubator_Temp
			$this->updateSort($this->Incubator_Cleaned); // Incubator_Cleaned
			$this->updateSort($this->LAF_MG); // LAF_MG
			$this->updateSort($this->LAF_Cleaned); // LAF_Cleaned
			$this->updateSort($this->REF_Temp); // REF_Temp
			$this->updateSort($this->REF_Cleaned); // REF_Cleaned
			$this->updateSort($this->Heating_Temp); // Heating_Temp
			$this->updateSort($this->Heating_Cleaned); // Heating_Cleaned
			$this->updateSort($this->Createdby); // Createdby
			$this->updateSort($this->CreatedDate); // CreatedDate
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
				$this->Date->setSort("");
				$this->LN2_Level->setSort("");
				$this->LN2_Checked->setSort("");
				$this->Incubator_Temp->setSort("");
				$this->Incubator_Cleaned->setSort("");
				$this->LAF_MG->setSort("");
				$this->LAF_Cleaned->setSort("");
				$this->REF_Temp->setSort("");
				$this->REF_Cleaned->setSort("");
				$this->Heating_Temp->setSort("");
				$this->Heating_Cleaned->setSort("");
				$this->Createdby->setSort("");
				$this->CreatedDate->setSort("");
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

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
			$this->ListOptions->CustomItem = "copy"; // Show copy column only
			$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
				"<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
				"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("CancelLink") . "</a>" .
				"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
			return;
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		if ($this->isInlineEditRow()) { // Inline-Edit
			$this->ListOptions->CustomItem = "edit"; // Show edit column only
				$opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
					"<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . UrlAddHash($this->pageName(), "r" . $this->RowCnt . "_" . $this->TableVar) . "');\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
					"<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("CancelLink") . "</a>" .
					"<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
			$opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\">";
			return;
		}

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
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCnt . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode($this->InlineCopyUrl) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
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
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
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

		// Inline Add
		$item = &$option->add("inlineadd");
		$item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode($this->InlineAddUrl) . "\">" .$Language->phrase("InlineAddLink") . "</a>";
		$item->Visible = ($this->InlineAddUrl <> "" && $Security->canAdd());
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = ($this->GridAddUrl <> "" && $Security->canAdd());

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = ($this->GridEditUrl <> "" && $Security->canEdit());
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fqaqcrecord_endrologylistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fqaqcrecord_endrologylistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fqaqcrecord_endrologylist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as &$option)
				$option->hideAllOptions();
			if ($this->isGridAdd()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = &$options["action"];
				$option->UseDropDownButton = FALSE;

				// Add grid insert
				$item = &$option->add("gridinsert");
				$item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridInsertLink") . "</a>";

				// Add grid cancel
				$item = &$option->add("gridcancel");
				$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = &$options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
					$item = &$option->add("gridcancel");
					$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $this->CancelUrl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fqaqcrecord_endrologylistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->Date->CurrentValue = NULL;
		$this->Date->OldValue = $this->Date->CurrentValue;
		$this->LN2_Level->CurrentValue = NULL;
		$this->LN2_Level->OldValue = $this->LN2_Level->CurrentValue;
		$this->LN2_Checked->CurrentValue = NULL;
		$this->LN2_Checked->OldValue = $this->LN2_Checked->CurrentValue;
		$this->Incubator_Temp->CurrentValue = NULL;
		$this->Incubator_Temp->OldValue = $this->Incubator_Temp->CurrentValue;
		$this->Incubator_Cleaned->CurrentValue = NULL;
		$this->Incubator_Cleaned->OldValue = $this->Incubator_Cleaned->CurrentValue;
		$this->LAF_MG->CurrentValue = NULL;
		$this->LAF_MG->OldValue = $this->LAF_MG->CurrentValue;
		$this->LAF_Cleaned->CurrentValue = NULL;
		$this->LAF_Cleaned->OldValue = $this->LAF_Cleaned->CurrentValue;
		$this->REF_Temp->CurrentValue = NULL;
		$this->REF_Temp->OldValue = $this->REF_Temp->CurrentValue;
		$this->REF_Cleaned->CurrentValue = NULL;
		$this->REF_Cleaned->OldValue = $this->REF_Cleaned->CurrentValue;
		$this->Heating_Temp->CurrentValue = NULL;
		$this->Heating_Temp->OldValue = $this->Heating_Temp->CurrentValue;
		$this->Heating_Cleaned->CurrentValue = NULL;
		$this->Heating_Cleaned->OldValue = $this->Heating_Cleaned->CurrentValue;
		$this->Createdby->CurrentValue = NULL;
		$this->Createdby->OldValue = $this->Createdby->CurrentValue;
		$this->CreatedDate->CurrentValue = NULL;
		$this->CreatedDate->OldValue = $this->CreatedDate->CurrentValue;
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

		// Date
		if (!$this->isAddOrEdit())
			$this->Date->AdvancedSearch->setSearchValue(Get("x_Date", Get("Date", "")));
		if ($this->Date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Date->AdvancedSearch->setSearchOperator(Get("z_Date", ""));
		$this->Date->AdvancedSearch->setSearchCondition(Get("v_Date", ""));
		$this->Date->AdvancedSearch->setSearchValue2(Get("y_Date", ""));
		if ($this->Date->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Date->AdvancedSearch->setSearchOperator2(Get("w_Date", ""));

		// LN2_Level
		if (!$this->isAddOrEdit())
			$this->LN2_Level->AdvancedSearch->setSearchValue(Get("x_LN2_Level", Get("LN2_Level", "")));
		if ($this->LN2_Level->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LN2_Level->AdvancedSearch->setSearchOperator(Get("z_LN2_Level", ""));

		// LN2_Checked
		if (!$this->isAddOrEdit())
			$this->LN2_Checked->AdvancedSearch->setSearchValue(Get("x_LN2_Checked", Get("LN2_Checked", "")));
		if ($this->LN2_Checked->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LN2_Checked->AdvancedSearch->setSearchOperator(Get("z_LN2_Checked", ""));
		if (is_array($this->LN2_Checked->AdvancedSearch->SearchValue))
			$this->LN2_Checked->AdvancedSearch->SearchValue = implode(",", $this->LN2_Checked->AdvancedSearch->SearchValue);
		if (is_array($this->LN2_Checked->AdvancedSearch->SearchValue2))
			$this->LN2_Checked->AdvancedSearch->SearchValue2 = implode(",", $this->LN2_Checked->AdvancedSearch->SearchValue2);

		// Incubator_Temp
		if (!$this->isAddOrEdit())
			$this->Incubator_Temp->AdvancedSearch->setSearchValue(Get("x_Incubator_Temp", Get("Incubator_Temp", "")));
		if ($this->Incubator_Temp->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Incubator_Temp->AdvancedSearch->setSearchOperator(Get("z_Incubator_Temp", ""));

		// Incubator_Cleaned
		if (!$this->isAddOrEdit())
			$this->Incubator_Cleaned->AdvancedSearch->setSearchValue(Get("x_Incubator_Cleaned", Get("Incubator_Cleaned", "")));
		if ($this->Incubator_Cleaned->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Incubator_Cleaned->AdvancedSearch->setSearchOperator(Get("z_Incubator_Cleaned", ""));
		if (is_array($this->Incubator_Cleaned->AdvancedSearch->SearchValue))
			$this->Incubator_Cleaned->AdvancedSearch->SearchValue = implode(",", $this->Incubator_Cleaned->AdvancedSearch->SearchValue);
		if (is_array($this->Incubator_Cleaned->AdvancedSearch->SearchValue2))
			$this->Incubator_Cleaned->AdvancedSearch->SearchValue2 = implode(",", $this->Incubator_Cleaned->AdvancedSearch->SearchValue2);

		// LAF_MG
		if (!$this->isAddOrEdit())
			$this->LAF_MG->AdvancedSearch->setSearchValue(Get("x_LAF_MG", Get("LAF_MG", "")));
		if ($this->LAF_MG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LAF_MG->AdvancedSearch->setSearchOperator(Get("z_LAF_MG", ""));

		// LAF_Cleaned
		if (!$this->isAddOrEdit())
			$this->LAF_Cleaned->AdvancedSearch->setSearchValue(Get("x_LAF_Cleaned", Get("LAF_Cleaned", "")));
		if ($this->LAF_Cleaned->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LAF_Cleaned->AdvancedSearch->setSearchOperator(Get("z_LAF_Cleaned", ""));
		if (is_array($this->LAF_Cleaned->AdvancedSearch->SearchValue))
			$this->LAF_Cleaned->AdvancedSearch->SearchValue = implode(",", $this->LAF_Cleaned->AdvancedSearch->SearchValue);
		if (is_array($this->LAF_Cleaned->AdvancedSearch->SearchValue2))
			$this->LAF_Cleaned->AdvancedSearch->SearchValue2 = implode(",", $this->LAF_Cleaned->AdvancedSearch->SearchValue2);

		// REF_Temp
		if (!$this->isAddOrEdit())
			$this->REF_Temp->AdvancedSearch->setSearchValue(Get("x_REF_Temp", Get("REF_Temp", "")));
		if ($this->REF_Temp->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->REF_Temp->AdvancedSearch->setSearchOperator(Get("z_REF_Temp", ""));

		// REF_Cleaned
		if (!$this->isAddOrEdit())
			$this->REF_Cleaned->AdvancedSearch->setSearchValue(Get("x_REF_Cleaned", Get("REF_Cleaned", "")));
		if ($this->REF_Cleaned->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->REF_Cleaned->AdvancedSearch->setSearchOperator(Get("z_REF_Cleaned", ""));
		if (is_array($this->REF_Cleaned->AdvancedSearch->SearchValue))
			$this->REF_Cleaned->AdvancedSearch->SearchValue = implode(",", $this->REF_Cleaned->AdvancedSearch->SearchValue);
		if (is_array($this->REF_Cleaned->AdvancedSearch->SearchValue2))
			$this->REF_Cleaned->AdvancedSearch->SearchValue2 = implode(",", $this->REF_Cleaned->AdvancedSearch->SearchValue2);

		// Heating_Temp
		if (!$this->isAddOrEdit())
			$this->Heating_Temp->AdvancedSearch->setSearchValue(Get("x_Heating_Temp", Get("Heating_Temp", "")));
		if ($this->Heating_Temp->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Heating_Temp->AdvancedSearch->setSearchOperator(Get("z_Heating_Temp", ""));

		// Heating_Cleaned
		if (!$this->isAddOrEdit())
			$this->Heating_Cleaned->AdvancedSearch->setSearchValue(Get("x_Heating_Cleaned", Get("Heating_Cleaned", "")));
		if ($this->Heating_Cleaned->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Heating_Cleaned->AdvancedSearch->setSearchOperator(Get("z_Heating_Cleaned", ""));
		if (is_array($this->Heating_Cleaned->AdvancedSearch->SearchValue))
			$this->Heating_Cleaned->AdvancedSearch->SearchValue = implode(",", $this->Heating_Cleaned->AdvancedSearch->SearchValue);
		if (is_array($this->Heating_Cleaned->AdvancedSearch->SearchValue2))
			$this->Heating_Cleaned->AdvancedSearch->SearchValue2 = implode(",", $this->Heating_Cleaned->AdvancedSearch->SearchValue2);

		// Createdby
		if (!$this->isAddOrEdit())
			$this->Createdby->AdvancedSearch->setSearchValue(Get("x_Createdby", Get("Createdby", "")));
		if ($this->Createdby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Createdby->AdvancedSearch->setSearchOperator(Get("z_Createdby", ""));

		// CreatedDate
		if (!$this->isAddOrEdit())
			$this->CreatedDate->AdvancedSearch->setSearchValue(Get("x_CreatedDate", Get("CreatedDate", "")));
		if ($this->CreatedDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedDate->AdvancedSearch->setSearchOperator(Get("z_CreatedDate", ""));
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'Date' first before field var 'x_Date'
		$val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
		if (!$this->Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Date->Visible = FALSE; // Disable update for API request
			else
				$this->Date->setFormValue($val);
			$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		}
		$this->Date->setOldValue($CurrentForm->getValue("o_Date"));

		// Check field name 'LN2_Level' first before field var 'x_LN2_Level'
		$val = $CurrentForm->hasValue("LN2_Level") ? $CurrentForm->getValue("LN2_Level") : $CurrentForm->getValue("x_LN2_Level");
		if (!$this->LN2_Level->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LN2_Level->Visible = FALSE; // Disable update for API request
			else
				$this->LN2_Level->setFormValue($val);
		}
		$this->LN2_Level->setOldValue($CurrentForm->getValue("o_LN2_Level"));

		// Check field name 'LN2_Checked' first before field var 'x_LN2_Checked'
		$val = $CurrentForm->hasValue("LN2_Checked") ? $CurrentForm->getValue("LN2_Checked") : $CurrentForm->getValue("x_LN2_Checked");
		if (!$this->LN2_Checked->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LN2_Checked->Visible = FALSE; // Disable update for API request
			else
				$this->LN2_Checked->setFormValue($val);
		}
		$this->LN2_Checked->setOldValue($CurrentForm->getValue("o_LN2_Checked"));

		// Check field name 'Incubator_Temp' first before field var 'x_Incubator_Temp'
		$val = $CurrentForm->hasValue("Incubator_Temp") ? $CurrentForm->getValue("Incubator_Temp") : $CurrentForm->getValue("x_Incubator_Temp");
		if (!$this->Incubator_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator_Temp->setFormValue($val);
		}
		$this->Incubator_Temp->setOldValue($CurrentForm->getValue("o_Incubator_Temp"));

		// Check field name 'Incubator_Cleaned' first before field var 'x_Incubator_Cleaned'
		$val = $CurrentForm->hasValue("Incubator_Cleaned") ? $CurrentForm->getValue("Incubator_Cleaned") : $CurrentForm->getValue("x_Incubator_Cleaned");
		if (!$this->Incubator_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator_Cleaned->setFormValue($val);
		}
		$this->Incubator_Cleaned->setOldValue($CurrentForm->getValue("o_Incubator_Cleaned"));

		// Check field name 'LAF_MG' first before field var 'x_LAF_MG'
		$val = $CurrentForm->hasValue("LAF_MG") ? $CurrentForm->getValue("LAF_MG") : $CurrentForm->getValue("x_LAF_MG");
		if (!$this->LAF_MG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LAF_MG->Visible = FALSE; // Disable update for API request
			else
				$this->LAF_MG->setFormValue($val);
		}
		$this->LAF_MG->setOldValue($CurrentForm->getValue("o_LAF_MG"));

		// Check field name 'LAF_Cleaned' first before field var 'x_LAF_Cleaned'
		$val = $CurrentForm->hasValue("LAF_Cleaned") ? $CurrentForm->getValue("LAF_Cleaned") : $CurrentForm->getValue("x_LAF_Cleaned");
		if (!$this->LAF_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LAF_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->LAF_Cleaned->setFormValue($val);
		}
		$this->LAF_Cleaned->setOldValue($CurrentForm->getValue("o_LAF_Cleaned"));

		// Check field name 'REF_Temp' first before field var 'x_REF_Temp'
		$val = $CurrentForm->hasValue("REF_Temp") ? $CurrentForm->getValue("REF_Temp") : $CurrentForm->getValue("x_REF_Temp");
		if (!$this->REF_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REF_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->REF_Temp->setFormValue($val);
		}
		$this->REF_Temp->setOldValue($CurrentForm->getValue("o_REF_Temp"));

		// Check field name 'REF_Cleaned' first before field var 'x_REF_Cleaned'
		$val = $CurrentForm->hasValue("REF_Cleaned") ? $CurrentForm->getValue("REF_Cleaned") : $CurrentForm->getValue("x_REF_Cleaned");
		if (!$this->REF_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REF_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->REF_Cleaned->setFormValue($val);
		}
		$this->REF_Cleaned->setOldValue($CurrentForm->getValue("o_REF_Cleaned"));

		// Check field name 'Heating_Temp' first before field var 'x_Heating_Temp'
		$val = $CurrentForm->hasValue("Heating_Temp") ? $CurrentForm->getValue("Heating_Temp") : $CurrentForm->getValue("x_Heating_Temp");
		if (!$this->Heating_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Heating_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Heating_Temp->setFormValue($val);
		}
		$this->Heating_Temp->setOldValue($CurrentForm->getValue("o_Heating_Temp"));

		// Check field name 'Heating_Cleaned' first before field var 'x_Heating_Cleaned'
		$val = $CurrentForm->hasValue("Heating_Cleaned") ? $CurrentForm->getValue("Heating_Cleaned") : $CurrentForm->getValue("x_Heating_Cleaned");
		if (!$this->Heating_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Heating_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->Heating_Cleaned->setFormValue($val);
		}
		$this->Heating_Cleaned->setOldValue($CurrentForm->getValue("o_Heating_Cleaned"));

		// Check field name 'Createdby' first before field var 'x_Createdby'
		$val = $CurrentForm->hasValue("Createdby") ? $CurrentForm->getValue("Createdby") : $CurrentForm->getValue("x_Createdby");
		if (!$this->Createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Createdby->Visible = FALSE; // Disable update for API request
			else
				$this->Createdby->setFormValue($val);
		}
		$this->Createdby->setOldValue($CurrentForm->getValue("o_Createdby"));

		// Check field name 'CreatedDate' first before field var 'x_CreatedDate'
		$val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
		if (!$this->CreatedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDate->setFormValue($val);
			$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
		}
		$this->CreatedDate->setOldValue($CurrentForm->getValue("o_CreatedDate"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Date->CurrentValue = $this->Date->FormValue;
		$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		$this->LN2_Level->CurrentValue = $this->LN2_Level->FormValue;
		$this->LN2_Checked->CurrentValue = $this->LN2_Checked->FormValue;
		$this->Incubator_Temp->CurrentValue = $this->Incubator_Temp->FormValue;
		$this->Incubator_Cleaned->CurrentValue = $this->Incubator_Cleaned->FormValue;
		$this->LAF_MG->CurrentValue = $this->LAF_MG->FormValue;
		$this->LAF_Cleaned->CurrentValue = $this->LAF_Cleaned->FormValue;
		$this->REF_Temp->CurrentValue = $this->REF_Temp->FormValue;
		$this->REF_Cleaned->CurrentValue = $this->REF_Cleaned->FormValue;
		$this->Heating_Temp->CurrentValue = $this->Heating_Temp->FormValue;
		$this->Heating_Cleaned->CurrentValue = $this->Heating_Cleaned->FormValue;
		$this->Createdby->CurrentValue = $this->Createdby->FormValue;
		$this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
		$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
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
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
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
		$this->Date->setDbValue($row['Date']);
		$this->LN2_Level->setDbValue($row['LN2_Level']);
		$this->LN2_Checked->setDbValue($row['LN2_Checked']);
		$this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
		$this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
		$this->LAF_MG->setDbValue($row['LAF_MG']);
		$this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
		$this->REF_Temp->setDbValue($row['REF_Temp']);
		$this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
		$this->Heating_Temp->setDbValue($row['Heating_Temp']);
		$this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
		$this->Createdby->setDbValue($row['Createdby']);
		$this->CreatedDate->setDbValue($row['CreatedDate']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Date'] = $this->Date->CurrentValue;
		$row['LN2_Level'] = $this->LN2_Level->CurrentValue;
		$row['LN2_Checked'] = $this->LN2_Checked->CurrentValue;
		$row['Incubator_Temp'] = $this->Incubator_Temp->CurrentValue;
		$row['Incubator_Cleaned'] = $this->Incubator_Cleaned->CurrentValue;
		$row['LAF_MG'] = $this->LAF_MG->CurrentValue;
		$row['LAF_Cleaned'] = $this->LAF_Cleaned->CurrentValue;
		$row['REF_Temp'] = $this->REF_Temp->CurrentValue;
		$row['REF_Cleaned'] = $this->REF_Cleaned->CurrentValue;
		$row['Heating_Temp'] = $this->Heating_Temp->CurrentValue;
		$row['Heating_Cleaned'] = $this->Heating_Cleaned->CurrentValue;
		$row['Createdby'] = $this->Createdby->CurrentValue;
		$row['CreatedDate'] = $this->CreatedDate->CurrentValue;
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
		if ($this->LN2_Level->FormValue == $this->LN2_Level->CurrentValue && is_numeric(ConvertToFloatString($this->LN2_Level->CurrentValue)))
			$this->LN2_Level->CurrentValue = ConvertToFloatString($this->LN2_Level->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Incubator_Temp->FormValue == $this->Incubator_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Incubator_Temp->CurrentValue)))
			$this->Incubator_Temp->CurrentValue = ConvertToFloatString($this->Incubator_Temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LAF_MG->FormValue == $this->LAF_MG->CurrentValue && is_numeric(ConvertToFloatString($this->LAF_MG->CurrentValue)))
			$this->LAF_MG->CurrentValue = ConvertToFloatString($this->LAF_MG->CurrentValue);

		// Convert decimal values if posted back
		if ($this->REF_Temp->FormValue == $this->REF_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->REF_Temp->CurrentValue)))
			$this->REF_Temp->CurrentValue = ConvertToFloatString($this->REF_Temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Heating_Temp->FormValue == $this->Heating_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Heating_Temp->CurrentValue)))
			$this->Heating_Temp->CurrentValue = ConvertToFloatString($this->Heating_Temp->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Date
		// LN2_Level
		// LN2_Checked
		// Incubator_Temp
		// Incubator_Cleaned
		// LAF_MG
		// LAF_Cleaned
		// REF_Temp
		// REF_Cleaned
		// Heating_Temp
		// Heating_Cleaned
		// Createdby
		// CreatedDate

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Date
			$this->Date->ViewValue = $this->Date->CurrentValue;
			$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// LN2_Level
			$this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
			$this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
			$this->LN2_Level->ViewCustomAttributes = "";

			// LN2_Checked
			if (strval($this->LN2_Checked->CurrentValue) <> "") {
				$this->LN2_Checked->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->LN2_Checked->ViewValue = NULL;
			}
			$this->LN2_Checked->ViewCustomAttributes = "";

			// Incubator_Temp
			$this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
			$this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
			$this->Incubator_Temp->ViewCustomAttributes = "";

			// Incubator_Cleaned
			if (strval($this->Incubator_Cleaned->CurrentValue) <> "") {
				$this->Incubator_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Incubator_Cleaned->ViewValue = NULL;
			}
			$this->Incubator_Cleaned->ViewCustomAttributes = "";

			// LAF_MG
			$this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
			$this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
			$this->LAF_MG->ViewCustomAttributes = "";

			// LAF_Cleaned
			if (strval($this->LAF_Cleaned->CurrentValue) <> "") {
				$this->LAF_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->LAF_Cleaned->ViewValue = NULL;
			}
			$this->LAF_Cleaned->ViewCustomAttributes = "";

			// REF_Temp
			$this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
			$this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
			$this->REF_Temp->ViewCustomAttributes = "";

			// REF_Cleaned
			if (strval($this->REF_Cleaned->CurrentValue) <> "") {
				$this->REF_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->REF_Cleaned->ViewValue = NULL;
			}
			$this->REF_Cleaned->ViewCustomAttributes = "";

			// Heating_Temp
			$this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
			$this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
			$this->Heating_Temp->ViewCustomAttributes = "";

			// Heating_Cleaned
			if (strval($this->Heating_Cleaned->CurrentValue) <> "") {
				$this->Heating_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Heating_Cleaned->ViewValue = NULL;
			}
			$this->Heating_Cleaned->ViewCustomAttributes = "";

			// Createdby
			$this->Createdby->ViewValue = $this->Createdby->CurrentValue;
			$this->Createdby->ViewCustomAttributes = "";

			// CreatedDate
			$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
			$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
			$this->CreatedDate->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// LN2_Level
			$this->LN2_Level->LinkCustomAttributes = "";
			$this->LN2_Level->HrefValue = "";
			$this->LN2_Level->TooltipValue = "";

			// LN2_Checked
			$this->LN2_Checked->LinkCustomAttributes = "";
			$this->LN2_Checked->HrefValue = "";
			$this->LN2_Checked->TooltipValue = "";

			// Incubator_Temp
			$this->Incubator_Temp->LinkCustomAttributes = "";
			$this->Incubator_Temp->HrefValue = "";
			$this->Incubator_Temp->TooltipValue = "";

			// Incubator_Cleaned
			$this->Incubator_Cleaned->LinkCustomAttributes = "";
			$this->Incubator_Cleaned->HrefValue = "";
			$this->Incubator_Cleaned->TooltipValue = "";

			// LAF_MG
			$this->LAF_MG->LinkCustomAttributes = "";
			$this->LAF_MG->HrefValue = "";
			$this->LAF_MG->TooltipValue = "";

			// LAF_Cleaned
			$this->LAF_Cleaned->LinkCustomAttributes = "";
			$this->LAF_Cleaned->HrefValue = "";
			$this->LAF_Cleaned->TooltipValue = "";

			// REF_Temp
			$this->REF_Temp->LinkCustomAttributes = "";
			$this->REF_Temp->HrefValue = "";
			$this->REF_Temp->TooltipValue = "";

			// REF_Cleaned
			$this->REF_Cleaned->LinkCustomAttributes = "";
			$this->REF_Cleaned->HrefValue = "";
			$this->REF_Cleaned->TooltipValue = "";

			// Heating_Temp
			$this->Heating_Temp->LinkCustomAttributes = "";
			$this->Heating_Temp->HrefValue = "";
			$this->Heating_Temp->TooltipValue = "";

			// Heating_Cleaned
			$this->Heating_Cleaned->LinkCustomAttributes = "";
			$this->Heating_Cleaned->HrefValue = "";
			$this->Heating_Cleaned->TooltipValue = "";

			// Createdby
			$this->Createdby->LinkCustomAttributes = "";
			$this->Createdby->HrefValue = "";
			$this->Createdby->TooltipValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
			$this->CreatedDate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// Date

			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// LN2_Level
			$this->LN2_Level->EditAttrs["class"] = "form-control";
			$this->LN2_Level->EditCustomAttributes = "";
			$this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
			$this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
			if (strval($this->LN2_Level->EditValue) <> "" && is_numeric($this->LN2_Level->EditValue)) {
				$this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
				$this->LN2_Level->OldValue = $this->LN2_Level->EditValue;
			}

			// LN2_Checked
			$this->LN2_Checked->EditCustomAttributes = "";
			$this->LN2_Checked->EditValue = $this->LN2_Checked->options(FALSE);

			// Incubator_Temp
			$this->Incubator_Temp->EditAttrs["class"] = "form-control";
			$this->Incubator_Temp->EditCustomAttributes = "";
			$this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
			$this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
			if (strval($this->Incubator_Temp->EditValue) <> "" && is_numeric($this->Incubator_Temp->EditValue)) {
				$this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
				$this->Incubator_Temp->OldValue = $this->Incubator_Temp->EditValue;
			}

			// Incubator_Cleaned
			$this->Incubator_Cleaned->EditCustomAttributes = "";
			$this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(FALSE);

			// LAF_MG
			$this->LAF_MG->EditAttrs["class"] = "form-control";
			$this->LAF_MG->EditCustomAttributes = "";
			$this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
			$this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
			if (strval($this->LAF_MG->EditValue) <> "" && is_numeric($this->LAF_MG->EditValue)) {
				$this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
				$this->LAF_MG->OldValue = $this->LAF_MG->EditValue;
			}

			// LAF_Cleaned
			$this->LAF_Cleaned->EditCustomAttributes = "";
			$this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(FALSE);

			// REF_Temp
			$this->REF_Temp->EditAttrs["class"] = "form-control";
			$this->REF_Temp->EditCustomAttributes = "";
			$this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
			$this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
			if (strval($this->REF_Temp->EditValue) <> "" && is_numeric($this->REF_Temp->EditValue)) {
				$this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
				$this->REF_Temp->OldValue = $this->REF_Temp->EditValue;
			}

			// REF_Cleaned
			$this->REF_Cleaned->EditCustomAttributes = "";
			$this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(FALSE);

			// Heating_Temp
			$this->Heating_Temp->EditAttrs["class"] = "form-control";
			$this->Heating_Temp->EditCustomAttributes = "";
			$this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
			$this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
			if (strval($this->Heating_Temp->EditValue) <> "" && is_numeric($this->Heating_Temp->EditValue)) {
				$this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
				$this->Heating_Temp->OldValue = $this->Heating_Temp->EditValue;
			}

			// Heating_Cleaned
			$this->Heating_Cleaned->EditCustomAttributes = "";
			$this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(FALSE);

			// Createdby
			// CreatedDate
			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";

			// LN2_Level
			$this->LN2_Level->LinkCustomAttributes = "";
			$this->LN2_Level->HrefValue = "";

			// LN2_Checked
			$this->LN2_Checked->LinkCustomAttributes = "";
			$this->LN2_Checked->HrefValue = "";

			// Incubator_Temp
			$this->Incubator_Temp->LinkCustomAttributes = "";
			$this->Incubator_Temp->HrefValue = "";

			// Incubator_Cleaned
			$this->Incubator_Cleaned->LinkCustomAttributes = "";
			$this->Incubator_Cleaned->HrefValue = "";

			// LAF_MG
			$this->LAF_MG->LinkCustomAttributes = "";
			$this->LAF_MG->HrefValue = "";

			// LAF_Cleaned
			$this->LAF_Cleaned->LinkCustomAttributes = "";
			$this->LAF_Cleaned->HrefValue = "";

			// REF_Temp
			$this->REF_Temp->LinkCustomAttributes = "";
			$this->REF_Temp->HrefValue = "";

			// REF_Cleaned
			$this->REF_Cleaned->LinkCustomAttributes = "";
			$this->REF_Cleaned->HrefValue = "";

			// Heating_Temp
			$this->Heating_Temp->LinkCustomAttributes = "";
			$this->Heating_Temp->HrefValue = "";

			// Heating_Cleaned
			$this->Heating_Cleaned->LinkCustomAttributes = "";
			$this->Heating_Cleaned->HrefValue = "";

			// Createdby
			$this->Createdby->LinkCustomAttributes = "";
			$this->Createdby->HrefValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// LN2_Level
			$this->LN2_Level->EditAttrs["class"] = "form-control";
			$this->LN2_Level->EditCustomAttributes = "";
			$this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
			$this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
			if (strval($this->LN2_Level->EditValue) <> "" && is_numeric($this->LN2_Level->EditValue)) {
				$this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
				$this->LN2_Level->OldValue = $this->LN2_Level->EditValue;
			}

			// LN2_Checked
			$this->LN2_Checked->EditCustomAttributes = "";
			$this->LN2_Checked->EditValue = $this->LN2_Checked->options(FALSE);

			// Incubator_Temp
			$this->Incubator_Temp->EditAttrs["class"] = "form-control";
			$this->Incubator_Temp->EditCustomAttributes = "";
			$this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
			$this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
			if (strval($this->Incubator_Temp->EditValue) <> "" && is_numeric($this->Incubator_Temp->EditValue)) {
				$this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
				$this->Incubator_Temp->OldValue = $this->Incubator_Temp->EditValue;
			}

			// Incubator_Cleaned
			$this->Incubator_Cleaned->EditCustomAttributes = "";
			$this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(FALSE);

			// LAF_MG
			$this->LAF_MG->EditAttrs["class"] = "form-control";
			$this->LAF_MG->EditCustomAttributes = "";
			$this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
			$this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
			if (strval($this->LAF_MG->EditValue) <> "" && is_numeric($this->LAF_MG->EditValue)) {
				$this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
				$this->LAF_MG->OldValue = $this->LAF_MG->EditValue;
			}

			// LAF_Cleaned
			$this->LAF_Cleaned->EditCustomAttributes = "";
			$this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(FALSE);

			// REF_Temp
			$this->REF_Temp->EditAttrs["class"] = "form-control";
			$this->REF_Temp->EditCustomAttributes = "";
			$this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
			$this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
			if (strval($this->REF_Temp->EditValue) <> "" && is_numeric($this->REF_Temp->EditValue)) {
				$this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
				$this->REF_Temp->OldValue = $this->REF_Temp->EditValue;
			}

			// REF_Cleaned
			$this->REF_Cleaned->EditCustomAttributes = "";
			$this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(FALSE);

			// Heating_Temp
			$this->Heating_Temp->EditAttrs["class"] = "form-control";
			$this->Heating_Temp->EditCustomAttributes = "";
			$this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
			$this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
			if (strval($this->Heating_Temp->EditValue) <> "" && is_numeric($this->Heating_Temp->EditValue)) {
				$this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
				$this->Heating_Temp->OldValue = $this->Heating_Temp->EditValue;
			}

			// Heating_Cleaned
			$this->Heating_Cleaned->EditCustomAttributes = "";
			$this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(FALSE);

			// Createdby
			// CreatedDate
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";

			// LN2_Level
			$this->LN2_Level->LinkCustomAttributes = "";
			$this->LN2_Level->HrefValue = "";

			// LN2_Checked
			$this->LN2_Checked->LinkCustomAttributes = "";
			$this->LN2_Checked->HrefValue = "";

			// Incubator_Temp
			$this->Incubator_Temp->LinkCustomAttributes = "";
			$this->Incubator_Temp->HrefValue = "";

			// Incubator_Cleaned
			$this->Incubator_Cleaned->LinkCustomAttributes = "";
			$this->Incubator_Cleaned->HrefValue = "";

			// LAF_MG
			$this->LAF_MG->LinkCustomAttributes = "";
			$this->LAF_MG->HrefValue = "";

			// LAF_Cleaned
			$this->LAF_Cleaned->LinkCustomAttributes = "";
			$this->LAF_Cleaned->HrefValue = "";

			// REF_Temp
			$this->REF_Temp->LinkCustomAttributes = "";
			$this->REF_Temp->HrefValue = "";

			// REF_Cleaned
			$this->REF_Cleaned->LinkCustomAttributes = "";
			$this->REF_Cleaned->HrefValue = "";

			// Heating_Temp
			$this->Heating_Temp->LinkCustomAttributes = "";
			$this->Heating_Temp->HrefValue = "";

			// Heating_Cleaned
			$this->Heating_Cleaned->LinkCustomAttributes = "";
			$this->Heating_Cleaned->HrefValue = "";

			// Createdby
			$this->Createdby->LinkCustomAttributes = "";
			$this->Createdby->HrefValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue, 0), 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue2, 0), 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// LN2_Level
			$this->LN2_Level->EditAttrs["class"] = "form-control";
			$this->LN2_Level->EditCustomAttributes = "";
			$this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->AdvancedSearch->SearchValue);
			$this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());

			// LN2_Checked
			$this->LN2_Checked->EditCustomAttributes = "";
			$this->LN2_Checked->EditValue = $this->LN2_Checked->options(FALSE);

			// Incubator_Temp
			$this->Incubator_Temp->EditAttrs["class"] = "form-control";
			$this->Incubator_Temp->EditCustomAttributes = "";
			$this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->AdvancedSearch->SearchValue);
			$this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());

			// Incubator_Cleaned
			$this->Incubator_Cleaned->EditCustomAttributes = "";
			$this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(FALSE);

			// LAF_MG
			$this->LAF_MG->EditAttrs["class"] = "form-control";
			$this->LAF_MG->EditCustomAttributes = "";
			$this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->AdvancedSearch->SearchValue);
			$this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());

			// LAF_Cleaned
			$this->LAF_Cleaned->EditCustomAttributes = "";
			$this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(FALSE);

			// REF_Temp
			$this->REF_Temp->EditAttrs["class"] = "form-control";
			$this->REF_Temp->EditCustomAttributes = "";
			$this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->AdvancedSearch->SearchValue);
			$this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());

			// REF_Cleaned
			$this->REF_Cleaned->EditCustomAttributes = "";
			$this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(FALSE);

			// Heating_Temp
			$this->Heating_Temp->EditAttrs["class"] = "form-control";
			$this->Heating_Temp->EditCustomAttributes = "";
			$this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->AdvancedSearch->SearchValue);
			$this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());

			// Heating_Cleaned
			$this->Heating_Cleaned->EditCustomAttributes = "";
			$this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(FALSE);

			// Createdby
			$this->Createdby->EditAttrs["class"] = "form-control";
			$this->Createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Createdby->AdvancedSearch->SearchValue = HtmlDecode($this->Createdby->AdvancedSearch->SearchValue);
			$this->Createdby->EditValue = HtmlEncode($this->Createdby->AdvancedSearch->SearchValue);
			$this->Createdby->PlaceHolder = RemoveHtml($this->Createdby->caption());

			// CreatedDate
			$this->CreatedDate->EditAttrs["class"] = "form-control";
			$this->CreatedDate->EditCustomAttributes = "";
			$this->CreatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue, 0), 8));
			$this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());
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
		if (!CheckDate($this->Date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Date->errorMessage());
		}
		if (!CheckDate($this->Date->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->Date->errorMessage());
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

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->Date->Required) {
			if (!$this->Date->IsDetailKey && $this->Date->FormValue != NULL && $this->Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Date->FormValue)) {
			AddMessage($FormError, $this->Date->errorMessage());
		}
		if ($this->LN2_Level->Required) {
			if (!$this->LN2_Level->IsDetailKey && $this->LN2_Level->FormValue != NULL && $this->LN2_Level->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LN2_Level->caption(), $this->LN2_Level->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LN2_Level->FormValue)) {
			AddMessage($FormError, $this->LN2_Level->errorMessage());
		}
		if ($this->LN2_Checked->Required) {
			if ($this->LN2_Checked->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LN2_Checked->caption(), $this->LN2_Checked->RequiredErrorMessage));
			}
		}
		if ($this->Incubator_Temp->Required) {
			if (!$this->Incubator_Temp->IsDetailKey && $this->Incubator_Temp->FormValue != NULL && $this->Incubator_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator_Temp->caption(), $this->Incubator_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Incubator_Temp->FormValue)) {
			AddMessage($FormError, $this->Incubator_Temp->errorMessage());
		}
		if ($this->Incubator_Cleaned->Required) {
			if ($this->Incubator_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator_Cleaned->caption(), $this->Incubator_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->LAF_MG->Required) {
			if (!$this->LAF_MG->IsDetailKey && $this->LAF_MG->FormValue != NULL && $this->LAF_MG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LAF_MG->caption(), $this->LAF_MG->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LAF_MG->FormValue)) {
			AddMessage($FormError, $this->LAF_MG->errorMessage());
		}
		if ($this->LAF_Cleaned->Required) {
			if ($this->LAF_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LAF_Cleaned->caption(), $this->LAF_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->REF_Temp->Required) {
			if (!$this->REF_Temp->IsDetailKey && $this->REF_Temp->FormValue != NULL && $this->REF_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REF_Temp->caption(), $this->REF_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->REF_Temp->FormValue)) {
			AddMessage($FormError, $this->REF_Temp->errorMessage());
		}
		if ($this->REF_Cleaned->Required) {
			if ($this->REF_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REF_Cleaned->caption(), $this->REF_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->Heating_Temp->Required) {
			if (!$this->Heating_Temp->IsDetailKey && $this->Heating_Temp->FormValue != NULL && $this->Heating_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Heating_Temp->caption(), $this->Heating_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Heating_Temp->FormValue)) {
			AddMessage($FormError, $this->Heating_Temp->errorMessage());
		}
		if ($this->Heating_Cleaned->Required) {
			if ($this->Heating_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Heating_Cleaned->caption(), $this->Heating_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->Createdby->Required) {
			if (!$this->Createdby->IsDetailKey && $this->Createdby->FormValue != NULL && $this->Createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Createdby->caption(), $this->Createdby->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDate->Required) {
			if (!$this->CreatedDate->IsDetailKey && $this->CreatedDate->FormValue != NULL && $this->CreatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// Date
			$this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), $this->Date->ReadOnly);

			// LN2_Level
			$this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, NULL, $this->LN2_Level->ReadOnly);

			// LN2_Checked
			$this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, NULL, $this->LN2_Checked->ReadOnly);

			// Incubator_Temp
			$this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, NULL, $this->Incubator_Temp->ReadOnly);

			// Incubator_Cleaned
			$this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, NULL, $this->Incubator_Cleaned->ReadOnly);

			// LAF_MG
			$this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, NULL, $this->LAF_MG->ReadOnly);

			// LAF_Cleaned
			$this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, NULL, $this->LAF_Cleaned->ReadOnly);

			// REF_Temp
			$this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, NULL, $this->REF_Temp->ReadOnly);

			// REF_Cleaned
			$this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, NULL, $this->REF_Cleaned->ReadOnly);

			// Heating_Temp
			$this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, $this->Heating_Temp->ReadOnly);

			// Heating_Cleaned
			$this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, NULL, $this->Heating_Cleaned->ReadOnly);

			// Createdby
			$this->Createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['Createdby'] = &$this->Createdby->DbValue;

			// CreatedDate
			$this->CreatedDate->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['CreatedDate'] = &$this->CreatedDate->DbValue;

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('Date')); // Date
		$hash .= GetFieldHash($rs->fields('LN2_Level')); // LN2_Level
		$hash .= GetFieldHash($rs->fields('LN2_Checked')); // LN2_Checked
		$hash .= GetFieldHash($rs->fields('Incubator_Temp')); // Incubator_Temp
		$hash .= GetFieldHash($rs->fields('Incubator_Cleaned')); // Incubator_Cleaned
		$hash .= GetFieldHash($rs->fields('LAF_MG')); // LAF_MG
		$hash .= GetFieldHash($rs->fields('LAF_Cleaned')); // LAF_Cleaned
		$hash .= GetFieldHash($rs->fields('REF_Temp')); // REF_Temp
		$hash .= GetFieldHash($rs->fields('REF_Cleaned')); // REF_Cleaned
		$hash .= GetFieldHash($rs->fields('Heating_Temp')); // Heating_Temp
		$hash .= GetFieldHash($rs->fields('Heating_Cleaned')); // Heating_Cleaned
		$hash .= GetFieldHash($rs->fields('Createdby')); // Createdby
		$hash .= GetFieldHash($rs->fields('CreatedDate')); // CreatedDate
		return md5($hash);
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Date
		$this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), FALSE);

		// LN2_Level
		$this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, NULL, FALSE);

		// LN2_Checked
		$this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, NULL, FALSE);

		// Incubator_Temp
		$this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, NULL, FALSE);

		// Incubator_Cleaned
		$this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, NULL, FALSE);

		// LAF_MG
		$this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, NULL, FALSE);

		// LAF_Cleaned
		$this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, NULL, FALSE);

		// REF_Temp
		$this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, NULL, FALSE);

		// REF_Cleaned
		$this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, NULL, FALSE);

		// Heating_Temp
		$this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, FALSE);

		// Heating_Cleaned
		$this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, NULL, FALSE);

		// Createdby
		$this->Createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['Createdby'] = &$this->Createdby->DbValue;

		// CreatedDate
		$this->CreatedDate->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['CreatedDate'] = &$this->CreatedDate->DbValue;

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->Date->AdvancedSearch->load();
		$this->LN2_Level->AdvancedSearch->load();
		$this->LN2_Checked->AdvancedSearch->load();
		$this->Incubator_Temp->AdvancedSearch->load();
		$this->Incubator_Cleaned->AdvancedSearch->load();
		$this->LAF_MG->AdvancedSearch->load();
		$this->LAF_Cleaned->AdvancedSearch->load();
		$this->REF_Temp->AdvancedSearch->load();
		$this->REF_Cleaned->AdvancedSearch->load();
		$this->Heating_Temp->AdvancedSearch->load();
		$this->Heating_Cleaned->AdvancedSearch->load();
		$this->Createdby->AdvancedSearch->load();
		$this->CreatedDate->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fqaqcrecord_endrologylist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fqaqcrecord_endrologylist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fqaqcrecord_endrologylist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_qaqcrecord_endrology\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_qaqcrecord_endrology',hdr:ew.language.phrase('ExportToEmailText'),f:document.fqaqcrecord_endrologylist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class thaw_list extends thaw
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'thaw';

	// Page object name
	public $PageObjName = "thaw_list";

	// Grid form hidden field names
	public $FormName = "fthawlist";
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

		// Table object (thaw)
		if (!isset($GLOBALS["thaw"]) || get_class($GLOBALS["thaw"]) == PROJECT_NAMESPACE . "thaw") {
			$GLOBALS["thaw"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["thaw"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "thawadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "thawdelete.php";
		$this->MultiUpdateUrl = "thawupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'thaw');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fthawlistsrch";

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
		global $EXPORT, $thaw;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($thaw);
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
		$this->id->Visible = FALSE;
		$this->RIDNo->Visible = FALSE;
		$this->PatientName->Visible = FALSE;
		$this->TiDNo->Visible = FALSE;
		$this->thawDate->setVisibility();
		$this->thawPrimaryEmbryologist->setVisibility();
		$this->thawSecondaryEmbryologist->setVisibility();
		$this->thawET->setVisibility();
		$this->thawReFrozen->setVisibility();
		$this->thawAbserve->setVisibility();
		$this->thawDiscard->setVisibility();
		$this->vitrificationDate->setVisibility();
		$this->PrimaryEmbryologist->Visible = FALSE;
		$this->SecondaryEmbryologist->Visible = FALSE;
		$this->EmbryoNo->setVisibility();
		$this->FertilisationDate->Visible = FALSE;
		$this->Day->setVisibility();
		$this->Grade->setVisibility();
		$this->Incubator->Visible = FALSE;
		$this->Tank->Visible = FALSE;
		$this->Canister->Visible = FALSE;
		$this->Gobiet->Visible = FALSE;
		$this->CryolockNo->Visible = FALSE;
		$this->CryolockColour->Visible = FALSE;
		$this->Stage->Visible = FALSE;
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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->setKey("id", ""); // Clear inline edit key
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_thawDate") && $CurrentForm->hasValue("o_thawDate") && $this->thawDate->CurrentValue <> $this->thawDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawPrimaryEmbryologist") && $CurrentForm->hasValue("o_thawPrimaryEmbryologist") && $this->thawPrimaryEmbryologist->CurrentValue <> $this->thawPrimaryEmbryologist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawSecondaryEmbryologist") && $CurrentForm->hasValue("o_thawSecondaryEmbryologist") && $this->thawSecondaryEmbryologist->CurrentValue <> $this->thawSecondaryEmbryologist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawET") && $CurrentForm->hasValue("o_thawET") && $this->thawET->CurrentValue <> $this->thawET->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawReFrozen") && $CurrentForm->hasValue("o_thawReFrozen") && $this->thawReFrozen->CurrentValue <> $this->thawReFrozen->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawAbserve") && $CurrentForm->hasValue("o_thawAbserve") && $this->thawAbserve->CurrentValue <> $this->thawAbserve->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_thawDiscard") && $CurrentForm->hasValue("o_thawDiscard") && $this->thawDiscard->CurrentValue <> $this->thawDiscard->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_vitrificationDate") && $CurrentForm->hasValue("o_vitrificationDate") && $this->vitrificationDate->CurrentValue <> $this->vitrificationDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmbryoNo") && $CurrentForm->hasValue("o_EmbryoNo") && $this->EmbryoNo->CurrentValue <> $this->EmbryoNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day") && $CurrentForm->hasValue("o_Day") && $this->Day->CurrentValue <> $this->Day->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade") && $CurrentForm->hasValue("o_Grade") && $this->Grade->CurrentValue <> $this->Grade->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fthawlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->TiDNo->AdvancedSearch->toJson(), ","); // Field TiDNo
		$filterList = Concat($filterList, $this->thawDate->AdvancedSearch->toJson(), ","); // Field thawDate
		$filterList = Concat($filterList, $this->thawPrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawPrimaryEmbryologist
		$filterList = Concat($filterList, $this->thawSecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawSecondaryEmbryologist
		$filterList = Concat($filterList, $this->thawET->AdvancedSearch->toJson(), ","); // Field thawET
		$filterList = Concat($filterList, $this->thawReFrozen->AdvancedSearch->toJson(), ","); // Field thawReFrozen
		$filterList = Concat($filterList, $this->thawAbserve->AdvancedSearch->toJson(), ","); // Field thawAbserve
		$filterList = Concat($filterList, $this->thawDiscard->AdvancedSearch->toJson(), ","); // Field thawDiscard
		$filterList = Concat($filterList, $this->vitrificationDate->AdvancedSearch->toJson(), ","); // Field vitrificationDate
		$filterList = Concat($filterList, $this->PrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field PrimaryEmbryologist
		$filterList = Concat($filterList, $this->SecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field SecondaryEmbryologist
		$filterList = Concat($filterList, $this->EmbryoNo->AdvancedSearch->toJson(), ","); // Field EmbryoNo
		$filterList = Concat($filterList, $this->FertilisationDate->AdvancedSearch->toJson(), ","); // Field FertilisationDate
		$filterList = Concat($filterList, $this->Day->AdvancedSearch->toJson(), ","); // Field Day
		$filterList = Concat($filterList, $this->Grade->AdvancedSearch->toJson(), ","); // Field Grade
		$filterList = Concat($filterList, $this->Incubator->AdvancedSearch->toJson(), ","); // Field Incubator
		$filterList = Concat($filterList, $this->Tank->AdvancedSearch->toJson(), ","); // Field Tank
		$filterList = Concat($filterList, $this->Canister->AdvancedSearch->toJson(), ","); // Field Canister
		$filterList = Concat($filterList, $this->Gobiet->AdvancedSearch->toJson(), ","); // Field Gobiet
		$filterList = Concat($filterList, $this->CryolockNo->AdvancedSearch->toJson(), ","); // Field CryolockNo
		$filterList = Concat($filterList, $this->CryolockColour->AdvancedSearch->toJson(), ","); // Field CryolockColour
		$filterList = Concat($filterList, $this->Stage->AdvancedSearch->toJson(), ","); // Field Stage
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fthawlistsrch", $filters);
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

		// Field RIDNo
		$this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
		$this->RIDNo->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field TiDNo
		$this->TiDNo->AdvancedSearch->SearchValue = @$filter["x_TiDNo"];
		$this->TiDNo->AdvancedSearch->SearchOperator = @$filter["z_TiDNo"];
		$this->TiDNo->AdvancedSearch->SearchCondition = @$filter["v_TiDNo"];
		$this->TiDNo->AdvancedSearch->SearchValue2 = @$filter["y_TiDNo"];
		$this->TiDNo->AdvancedSearch->SearchOperator2 = @$filter["w_TiDNo"];
		$this->TiDNo->AdvancedSearch->save();

		// Field thawDate
		$this->thawDate->AdvancedSearch->SearchValue = @$filter["x_thawDate"];
		$this->thawDate->AdvancedSearch->SearchOperator = @$filter["z_thawDate"];
		$this->thawDate->AdvancedSearch->SearchCondition = @$filter["v_thawDate"];
		$this->thawDate->AdvancedSearch->SearchValue2 = @$filter["y_thawDate"];
		$this->thawDate->AdvancedSearch->SearchOperator2 = @$filter["w_thawDate"];
		$this->thawDate->AdvancedSearch->save();

		// Field thawPrimaryEmbryologist
		$this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawPrimaryEmbryologist"];
		$this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawPrimaryEmbryologist"];
		$this->thawPrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawPrimaryEmbryologist"];
		$this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawPrimaryEmbryologist"];
		$this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawPrimaryEmbryologist"];
		$this->thawPrimaryEmbryologist->AdvancedSearch->save();

		// Field thawSecondaryEmbryologist
		$this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawSecondaryEmbryologist"];
		$this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawSecondaryEmbryologist"];
		$this->thawSecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawSecondaryEmbryologist"];
		$this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawSecondaryEmbryologist"];
		$this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawSecondaryEmbryologist"];
		$this->thawSecondaryEmbryologist->AdvancedSearch->save();

		// Field thawET
		$this->thawET->AdvancedSearch->SearchValue = @$filter["x_thawET"];
		$this->thawET->AdvancedSearch->SearchOperator = @$filter["z_thawET"];
		$this->thawET->AdvancedSearch->SearchCondition = @$filter["v_thawET"];
		$this->thawET->AdvancedSearch->SearchValue2 = @$filter["y_thawET"];
		$this->thawET->AdvancedSearch->SearchOperator2 = @$filter["w_thawET"];
		$this->thawET->AdvancedSearch->save();

		// Field thawReFrozen
		$this->thawReFrozen->AdvancedSearch->SearchValue = @$filter["x_thawReFrozen"];
		$this->thawReFrozen->AdvancedSearch->SearchOperator = @$filter["z_thawReFrozen"];
		$this->thawReFrozen->AdvancedSearch->SearchCondition = @$filter["v_thawReFrozen"];
		$this->thawReFrozen->AdvancedSearch->SearchValue2 = @$filter["y_thawReFrozen"];
		$this->thawReFrozen->AdvancedSearch->SearchOperator2 = @$filter["w_thawReFrozen"];
		$this->thawReFrozen->AdvancedSearch->save();

		// Field thawAbserve
		$this->thawAbserve->AdvancedSearch->SearchValue = @$filter["x_thawAbserve"];
		$this->thawAbserve->AdvancedSearch->SearchOperator = @$filter["z_thawAbserve"];
		$this->thawAbserve->AdvancedSearch->SearchCondition = @$filter["v_thawAbserve"];
		$this->thawAbserve->AdvancedSearch->SearchValue2 = @$filter["y_thawAbserve"];
		$this->thawAbserve->AdvancedSearch->SearchOperator2 = @$filter["w_thawAbserve"];
		$this->thawAbserve->AdvancedSearch->save();

		// Field thawDiscard
		$this->thawDiscard->AdvancedSearch->SearchValue = @$filter["x_thawDiscard"];
		$this->thawDiscard->AdvancedSearch->SearchOperator = @$filter["z_thawDiscard"];
		$this->thawDiscard->AdvancedSearch->SearchCondition = @$filter["v_thawDiscard"];
		$this->thawDiscard->AdvancedSearch->SearchValue2 = @$filter["y_thawDiscard"];
		$this->thawDiscard->AdvancedSearch->SearchOperator2 = @$filter["w_thawDiscard"];
		$this->thawDiscard->AdvancedSearch->save();

		// Field vitrificationDate
		$this->vitrificationDate->AdvancedSearch->SearchValue = @$filter["x_vitrificationDate"];
		$this->vitrificationDate->AdvancedSearch->SearchOperator = @$filter["z_vitrificationDate"];
		$this->vitrificationDate->AdvancedSearch->SearchCondition = @$filter["v_vitrificationDate"];
		$this->vitrificationDate->AdvancedSearch->SearchValue2 = @$filter["y_vitrificationDate"];
		$this->vitrificationDate->AdvancedSearch->SearchOperator2 = @$filter["w_vitrificationDate"];
		$this->vitrificationDate->AdvancedSearch->save();

		// Field PrimaryEmbryologist
		$this->PrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->save();

		// Field SecondaryEmbryologist
		$this->SecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->save();

		// Field EmbryoNo
		$this->EmbryoNo->AdvancedSearch->SearchValue = @$filter["x_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchOperator = @$filter["z_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchCondition = @$filter["v_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchValue2 = @$filter["y_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->save();

		// Field FertilisationDate
		$this->FertilisationDate->AdvancedSearch->SearchValue = @$filter["x_FertilisationDate"];
		$this->FertilisationDate->AdvancedSearch->SearchOperator = @$filter["z_FertilisationDate"];
		$this->FertilisationDate->AdvancedSearch->SearchCondition = @$filter["v_FertilisationDate"];
		$this->FertilisationDate->AdvancedSearch->SearchValue2 = @$filter["y_FertilisationDate"];
		$this->FertilisationDate->AdvancedSearch->SearchOperator2 = @$filter["w_FertilisationDate"];
		$this->FertilisationDate->AdvancedSearch->save();

		// Field Day
		$this->Day->AdvancedSearch->SearchValue = @$filter["x_Day"];
		$this->Day->AdvancedSearch->SearchOperator = @$filter["z_Day"];
		$this->Day->AdvancedSearch->SearchCondition = @$filter["v_Day"];
		$this->Day->AdvancedSearch->SearchValue2 = @$filter["y_Day"];
		$this->Day->AdvancedSearch->SearchOperator2 = @$filter["w_Day"];
		$this->Day->AdvancedSearch->save();

		// Field Grade
		$this->Grade->AdvancedSearch->SearchValue = @$filter["x_Grade"];
		$this->Grade->AdvancedSearch->SearchOperator = @$filter["z_Grade"];
		$this->Grade->AdvancedSearch->SearchCondition = @$filter["v_Grade"];
		$this->Grade->AdvancedSearch->SearchValue2 = @$filter["y_Grade"];
		$this->Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Grade"];
		$this->Grade->AdvancedSearch->save();

		// Field Incubator
		$this->Incubator->AdvancedSearch->SearchValue = @$filter["x_Incubator"];
		$this->Incubator->AdvancedSearch->SearchOperator = @$filter["z_Incubator"];
		$this->Incubator->AdvancedSearch->SearchCondition = @$filter["v_Incubator"];
		$this->Incubator->AdvancedSearch->SearchValue2 = @$filter["y_Incubator"];
		$this->Incubator->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator"];
		$this->Incubator->AdvancedSearch->save();

		// Field Tank
		$this->Tank->AdvancedSearch->SearchValue = @$filter["x_Tank"];
		$this->Tank->AdvancedSearch->SearchOperator = @$filter["z_Tank"];
		$this->Tank->AdvancedSearch->SearchCondition = @$filter["v_Tank"];
		$this->Tank->AdvancedSearch->SearchValue2 = @$filter["y_Tank"];
		$this->Tank->AdvancedSearch->SearchOperator2 = @$filter["w_Tank"];
		$this->Tank->AdvancedSearch->save();

		// Field Canister
		$this->Canister->AdvancedSearch->SearchValue = @$filter["x_Canister"];
		$this->Canister->AdvancedSearch->SearchOperator = @$filter["z_Canister"];
		$this->Canister->AdvancedSearch->SearchCondition = @$filter["v_Canister"];
		$this->Canister->AdvancedSearch->SearchValue2 = @$filter["y_Canister"];
		$this->Canister->AdvancedSearch->SearchOperator2 = @$filter["w_Canister"];
		$this->Canister->AdvancedSearch->save();

		// Field Gobiet
		$this->Gobiet->AdvancedSearch->SearchValue = @$filter["x_Gobiet"];
		$this->Gobiet->AdvancedSearch->SearchOperator = @$filter["z_Gobiet"];
		$this->Gobiet->AdvancedSearch->SearchCondition = @$filter["v_Gobiet"];
		$this->Gobiet->AdvancedSearch->SearchValue2 = @$filter["y_Gobiet"];
		$this->Gobiet->AdvancedSearch->SearchOperator2 = @$filter["w_Gobiet"];
		$this->Gobiet->AdvancedSearch->save();

		// Field CryolockNo
		$this->CryolockNo->AdvancedSearch->SearchValue = @$filter["x_CryolockNo"];
		$this->CryolockNo->AdvancedSearch->SearchOperator = @$filter["z_CryolockNo"];
		$this->CryolockNo->AdvancedSearch->SearchCondition = @$filter["v_CryolockNo"];
		$this->CryolockNo->AdvancedSearch->SearchValue2 = @$filter["y_CryolockNo"];
		$this->CryolockNo->AdvancedSearch->SearchOperator2 = @$filter["w_CryolockNo"];
		$this->CryolockNo->AdvancedSearch->save();

		// Field CryolockColour
		$this->CryolockColour->AdvancedSearch->SearchValue = @$filter["x_CryolockColour"];
		$this->CryolockColour->AdvancedSearch->SearchOperator = @$filter["z_CryolockColour"];
		$this->CryolockColour->AdvancedSearch->SearchCondition = @$filter["v_CryolockColour"];
		$this->CryolockColour->AdvancedSearch->SearchValue2 = @$filter["y_CryolockColour"];
		$this->CryolockColour->AdvancedSearch->SearchOperator2 = @$filter["w_CryolockColour"];
		$this->CryolockColour->AdvancedSearch->save();

		// Field Stage
		$this->Stage->AdvancedSearch->SearchValue = @$filter["x_Stage"];
		$this->Stage->AdvancedSearch->SearchOperator = @$filter["z_Stage"];
		$this->Stage->AdvancedSearch->SearchCondition = @$filter["v_Stage"];
		$this->Stage->AdvancedSearch->SearchValue2 = @$filter["y_Stage"];
		$this->Stage->AdvancedSearch->SearchOperator2 = @$filter["w_Stage"];
		$this->Stage->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawPrimaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawSecondaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawReFrozen, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawAbserve, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->thawDiscard, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrimaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SecondaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EmbryoNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Day, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Grade, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Incubator, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tank, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Canister, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gobiet, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CryolockNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CryolockColour, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Stage, $arKeywords, $type);
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
			$this->updateSort($this->thawDate); // thawDate
			$this->updateSort($this->thawPrimaryEmbryologist); // thawPrimaryEmbryologist
			$this->updateSort($this->thawSecondaryEmbryologist); // thawSecondaryEmbryologist
			$this->updateSort($this->thawET); // thawET
			$this->updateSort($this->thawReFrozen); // thawReFrozen
			$this->updateSort($this->thawAbserve); // thawAbserve
			$this->updateSort($this->thawDiscard); // thawDiscard
			$this->updateSort($this->vitrificationDate); // vitrificationDate
			$this->updateSort($this->EmbryoNo); // EmbryoNo
			$this->updateSort($this->Day); // Day
			$this->updateSort($this->Grade); // Grade
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
				$this->thawDate->setSort("");
				$this->thawPrimaryEmbryologist->setSort("");
				$this->thawSecondaryEmbryologist->setSort("");
				$this->thawET->setSort("");
				$this->thawReFrozen->setSort("");
				$this->thawAbserve->setSort("");
				$this->thawDiscard->setSort("");
				$this->vitrificationDate->setSort("");
				$this->EmbryoNo->setSort("");
				$this->Day->setSort("");
				$this->Grade->setSort("");
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

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
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
		$item->Visible = $Security->canEdit();
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
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
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

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash($this->InlineEditUrl, "r" . $this->RowCnt . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

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

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = ($this->GridEditUrl <> "" && $Security->canEdit());
		$option = $options["action"];

		// Add multi update
		$item = &$option->add("multiupdate");
		$item->Body = "<a class=\"ew-action ew-multi-update\" title=\"" . HtmlTitle($Language->phrase("UpdateSelectedLink")) . "\" data-table=\"thaw\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateSelectedLink")) . "\" href=\"\" onclick=\"ew.submitAction(event,{f:document.fthawlist,url:'" . $this->MultiUpdateUrl . "'});return false;\">" . $Language->phrase("UpdateSelectedLink") . "</a>";
		$item->Visible = ($Security->canEdit());

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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fthawlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fthawlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fthawlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = &$options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = FALSE;
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fthawlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->TiDNo->CurrentValue = NULL;
		$this->TiDNo->OldValue = $this->TiDNo->CurrentValue;
		$this->thawDate->CurrentValue = NULL;
		$this->thawDate->OldValue = $this->thawDate->CurrentValue;
		$this->thawPrimaryEmbryologist->CurrentValue = NULL;
		$this->thawPrimaryEmbryologist->OldValue = $this->thawPrimaryEmbryologist->CurrentValue;
		$this->thawSecondaryEmbryologist->CurrentValue = NULL;
		$this->thawSecondaryEmbryologist->OldValue = $this->thawSecondaryEmbryologist->CurrentValue;
		$this->thawET->CurrentValue = NULL;
		$this->thawET->OldValue = $this->thawET->CurrentValue;
		$this->thawReFrozen->CurrentValue = NULL;
		$this->thawReFrozen->OldValue = $this->thawReFrozen->CurrentValue;
		$this->thawAbserve->CurrentValue = NULL;
		$this->thawAbserve->OldValue = $this->thawAbserve->CurrentValue;
		$this->thawDiscard->CurrentValue = NULL;
		$this->thawDiscard->OldValue = $this->thawDiscard->CurrentValue;
		$this->vitrificationDate->CurrentValue = NULL;
		$this->vitrificationDate->OldValue = $this->vitrificationDate->CurrentValue;
		$this->PrimaryEmbryologist->CurrentValue = NULL;
		$this->PrimaryEmbryologist->OldValue = $this->PrimaryEmbryologist->CurrentValue;
		$this->SecondaryEmbryologist->CurrentValue = NULL;
		$this->SecondaryEmbryologist->OldValue = $this->SecondaryEmbryologist->CurrentValue;
		$this->EmbryoNo->CurrentValue = NULL;
		$this->EmbryoNo->OldValue = $this->EmbryoNo->CurrentValue;
		$this->FertilisationDate->CurrentValue = NULL;
		$this->FertilisationDate->OldValue = $this->FertilisationDate->CurrentValue;
		$this->Day->CurrentValue = NULL;
		$this->Day->OldValue = $this->Day->CurrentValue;
		$this->Grade->CurrentValue = NULL;
		$this->Grade->OldValue = $this->Grade->CurrentValue;
		$this->Incubator->CurrentValue = NULL;
		$this->Incubator->OldValue = $this->Incubator->CurrentValue;
		$this->Tank->CurrentValue = NULL;
		$this->Tank->OldValue = $this->Tank->CurrentValue;
		$this->Canister->CurrentValue = NULL;
		$this->Canister->OldValue = $this->Canister->CurrentValue;
		$this->Gobiet->CurrentValue = NULL;
		$this->Gobiet->OldValue = $this->Gobiet->CurrentValue;
		$this->CryolockNo->CurrentValue = NULL;
		$this->CryolockNo->OldValue = $this->CryolockNo->CurrentValue;
		$this->CryolockColour->CurrentValue = NULL;
		$this->CryolockColour->OldValue = $this->CryolockColour->CurrentValue;
		$this->Stage->CurrentValue = NULL;
		$this->Stage->OldValue = $this->Stage->CurrentValue;
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(TABLE_BASIC_SEARCH, ""), FALSE);
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(TABLE_BASIC_SEARCH_TYPE, ""), FALSE);
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'thawDate' first before field var 'x_thawDate'
		$val = $CurrentForm->hasValue("thawDate") ? $CurrentForm->getValue("thawDate") : $CurrentForm->getValue("x_thawDate");
		if (!$this->thawDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawDate->Visible = FALSE; // Disable update for API request
			else
				$this->thawDate->setFormValue($val);
			$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		}

		// Check field name 'thawPrimaryEmbryologist' first before field var 'x_thawPrimaryEmbryologist'
		$val = $CurrentForm->hasValue("thawPrimaryEmbryologist") ? $CurrentForm->getValue("thawPrimaryEmbryologist") : $CurrentForm->getValue("x_thawPrimaryEmbryologist");
		if (!$this->thawPrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawPrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawPrimaryEmbryologist->setFormValue($val);
		}

		// Check field name 'thawSecondaryEmbryologist' first before field var 'x_thawSecondaryEmbryologist'
		$val = $CurrentForm->hasValue("thawSecondaryEmbryologist") ? $CurrentForm->getValue("thawSecondaryEmbryologist") : $CurrentForm->getValue("x_thawSecondaryEmbryologist");
		if (!$this->thawSecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawSecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawSecondaryEmbryologist->setFormValue($val);
		}

		// Check field name 'thawET' first before field var 'x_thawET'
		$val = $CurrentForm->hasValue("thawET") ? $CurrentForm->getValue("thawET") : $CurrentForm->getValue("x_thawET");
		if (!$this->thawET->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawET->Visible = FALSE; // Disable update for API request
			else
				$this->thawET->setFormValue($val);
		}

		// Check field name 'thawReFrozen' first before field var 'x_thawReFrozen'
		$val = $CurrentForm->hasValue("thawReFrozen") ? $CurrentForm->getValue("thawReFrozen") : $CurrentForm->getValue("x_thawReFrozen");
		if (!$this->thawReFrozen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawReFrozen->Visible = FALSE; // Disable update for API request
			else
				$this->thawReFrozen->setFormValue($val);
		}

		// Check field name 'thawAbserve' first before field var 'x_thawAbserve'
		$val = $CurrentForm->hasValue("thawAbserve") ? $CurrentForm->getValue("thawAbserve") : $CurrentForm->getValue("x_thawAbserve");
		if (!$this->thawAbserve->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawAbserve->Visible = FALSE; // Disable update for API request
			else
				$this->thawAbserve->setFormValue($val);
		}

		// Check field name 'thawDiscard' first before field var 'x_thawDiscard'
		$val = $CurrentForm->hasValue("thawDiscard") ? $CurrentForm->getValue("thawDiscard") : $CurrentForm->getValue("x_thawDiscard");
		if (!$this->thawDiscard->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawDiscard->Visible = FALSE; // Disable update for API request
			else
				$this->thawDiscard->setFormValue($val);
		}

		// Check field name 'vitrificationDate' first before field var 'x_vitrificationDate'
		$val = $CurrentForm->hasValue("vitrificationDate") ? $CurrentForm->getValue("vitrificationDate") : $CurrentForm->getValue("x_vitrificationDate");
		if (!$this->vitrificationDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitrificationDate->Visible = FALSE; // Disable update for API request
			else
				$this->vitrificationDate->setFormValue($val);
			$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		}

		// Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
		$val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
		if (!$this->EmbryoNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EmbryoNo->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryoNo->setFormValue($val);
		}

		// Check field name 'Day' first before field var 'x_Day'
		$val = $CurrentForm->hasValue("Day") ? $CurrentForm->getValue("Day") : $CurrentForm->getValue("x_Day");
		if (!$this->Day->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day->Visible = FALSE; // Disable update for API request
			else
				$this->Day->setFormValue($val);
		}

		// Check field name 'Grade' first before field var 'x_Grade'
		$val = $CurrentForm->hasValue("Grade") ? $CurrentForm->getValue("Grade") : $CurrentForm->getValue("x_Grade");
		if (!$this->Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Grade->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->thawDate->CurrentValue = $this->thawDate->FormValue;
		$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		$this->thawPrimaryEmbryologist->CurrentValue = $this->thawPrimaryEmbryologist->FormValue;
		$this->thawSecondaryEmbryologist->CurrentValue = $this->thawSecondaryEmbryologist->FormValue;
		$this->thawET->CurrentValue = $this->thawET->FormValue;
		$this->thawReFrozen->CurrentValue = $this->thawReFrozen->FormValue;
		$this->thawAbserve->CurrentValue = $this->thawAbserve->FormValue;
		$this->thawDiscard->CurrentValue = $this->thawDiscard->FormValue;
		$this->vitrificationDate->CurrentValue = $this->vitrificationDate->FormValue;
		$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		$this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
		$this->Day->CurrentValue = $this->Day->FormValue;
		$this->Grade->CurrentValue = $this->Grade->FormValue;
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->TiDNo->setDbValue($row['TiDNo']);
		$this->thawDate->setDbValue($row['thawDate']);
		$this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
		$this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
		$this->thawET->setDbValue($row['thawET']);
		$this->thawReFrozen->setDbValue($row['thawReFrozen']);
		$this->thawAbserve->setDbValue($row['thawAbserve']);
		$this->thawDiscard->setDbValue($row['thawDiscard']);
		$this->vitrificationDate->setDbValue($row['vitrificationDate']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->FertilisationDate->setDbValue($row['FertilisationDate']);
		$this->Day->setDbValue($row['Day']);
		$this->Grade->setDbValue($row['Grade']);
		$this->Incubator->setDbValue($row['Incubator']);
		$this->Tank->setDbValue($row['Tank']);
		$this->Canister->setDbValue($row['Canister']);
		$this->Gobiet->setDbValue($row['Gobiet']);
		$this->CryolockNo->setDbValue($row['CryolockNo']);
		$this->CryolockColour->setDbValue($row['CryolockColour']);
		$this->Stage->setDbValue($row['Stage']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['TiDNo'] = $this->TiDNo->CurrentValue;
		$row['thawDate'] = $this->thawDate->CurrentValue;
		$row['thawPrimaryEmbryologist'] = $this->thawPrimaryEmbryologist->CurrentValue;
		$row['thawSecondaryEmbryologist'] = $this->thawSecondaryEmbryologist->CurrentValue;
		$row['thawET'] = $this->thawET->CurrentValue;
		$row['thawReFrozen'] = $this->thawReFrozen->CurrentValue;
		$row['thawAbserve'] = $this->thawAbserve->CurrentValue;
		$row['thawDiscard'] = $this->thawDiscard->CurrentValue;
		$row['vitrificationDate'] = $this->vitrificationDate->CurrentValue;
		$row['PrimaryEmbryologist'] = $this->PrimaryEmbryologist->CurrentValue;
		$row['SecondaryEmbryologist'] = $this->SecondaryEmbryologist->CurrentValue;
		$row['EmbryoNo'] = $this->EmbryoNo->CurrentValue;
		$row['FertilisationDate'] = $this->FertilisationDate->CurrentValue;
		$row['Day'] = $this->Day->CurrentValue;
		$row['Grade'] = $this->Grade->CurrentValue;
		$row['Incubator'] = $this->Incubator->CurrentValue;
		$row['Tank'] = $this->Tank->CurrentValue;
		$row['Canister'] = $this->Canister->CurrentValue;
		$row['Gobiet'] = $this->Gobiet->CurrentValue;
		$row['CryolockNo'] = $this->CryolockNo->CurrentValue;
		$row['CryolockColour'] = $this->CryolockColour->CurrentValue;
		$row['Stage'] = $this->Stage->CurrentValue;
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
		// RIDNo
		// PatientName
		// TiDNo
		// thawDate
		// thawPrimaryEmbryologist
		// thawSecondaryEmbryologist
		// thawET
		// thawReFrozen
		// thawAbserve
		// thawDiscard
		// vitrificationDate
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// EmbryoNo
		// FertilisationDate
		// Day
		// Grade
		// Incubator
		// Tank
		// Canister
		// Gobiet
		// CryolockNo
		// CryolockColour
		// Stage

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// thawDate
			$this->thawDate->ViewValue = $this->thawDate->CurrentValue;
			$this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
			$this->thawDate->ViewCustomAttributes = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
			$this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
			$this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

			// thawET
			$this->thawET->ViewValue = $this->thawET->CurrentValue;
			$this->thawET->ViewCustomAttributes = "";

			// thawReFrozen
			if (strval($this->thawReFrozen->CurrentValue) <> "") {
				$this->thawReFrozen->ViewValue = $this->thawReFrozen->optionCaption($this->thawReFrozen->CurrentValue);
			} else {
				$this->thawReFrozen->ViewValue = NULL;
			}
			$this->thawReFrozen->ViewCustomAttributes = "";

			// thawAbserve
			$this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
			$this->thawAbserve->ViewCustomAttributes = "";

			// thawDiscard
			$this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
			$this->thawDiscard->ViewCustomAttributes = "";

			// vitrificationDate
			$this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
			$this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
			$this->vitrificationDate->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// FertilisationDate
			$this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
			$this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
			$this->FertilisationDate->ViewCustomAttributes = "";

			// Day
			if (strval($this->Day->CurrentValue) <> "") {
				$this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->ViewValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			if (strval($this->Grade->CurrentValue) <> "") {
				$this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->ViewValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->ViewValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// Tank
			$this->Tank->ViewValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Canister
			$this->Canister->ViewValue = $this->Canister->CurrentValue;
			$this->Canister->ViewCustomAttributes = "";

			// Gobiet
			$this->Gobiet->ViewValue = $this->Gobiet->CurrentValue;
			$this->Gobiet->ViewCustomAttributes = "";

			// CryolockNo
			$this->CryolockNo->ViewValue = $this->CryolockNo->CurrentValue;
			$this->CryolockNo->ViewCustomAttributes = "";

			// CryolockColour
			$this->CryolockColour->ViewValue = $this->CryolockColour->CurrentValue;
			$this->CryolockColour->ViewCustomAttributes = "";

			// Stage
			$this->Stage->ViewValue = $this->Stage->CurrentValue;
			$this->Stage->ViewCustomAttributes = "";

			// thawDate
			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";
			$this->thawDate->TooltipValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";
			$this->thawPrimaryEmbryologist->TooltipValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";
			$this->thawSecondaryEmbryologist->TooltipValue = "";

			// thawET
			$this->thawET->LinkCustomAttributes = "";
			$this->thawET->HrefValue = "";
			$this->thawET->TooltipValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";
			$this->thawReFrozen->TooltipValue = "";

			// thawAbserve
			$this->thawAbserve->LinkCustomAttributes = "";
			$this->thawAbserve->HrefValue = "";
			$this->thawAbserve->TooltipValue = "";

			// thawDiscard
			$this->thawDiscard->LinkCustomAttributes = "";
			$this->thawDiscard->HrefValue = "";
			$this->thawDiscard->TooltipValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";
			$this->vitrificationDate->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// thawDate
			$this->thawDate->EditAttrs["class"] = "form-control";
			$this->thawDate->EditCustomAttributes = "";
			$this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
			$this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawPrimaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawSecondaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

			// thawET
			$this->thawET->EditAttrs["class"] = "form-control";
			$this->thawET->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawET->CurrentValue = HtmlDecode($this->thawET->CurrentValue);
			$this->thawET->EditValue = HtmlEncode($this->thawET->CurrentValue);
			$this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

			// thawReFrozen
			$this->thawReFrozen->EditAttrs["class"] = "form-control";
			$this->thawReFrozen->EditCustomAttributes = "";
			$this->thawReFrozen->EditValue = $this->thawReFrozen->options(TRUE);

			// thawAbserve
			$this->thawAbserve->EditAttrs["class"] = "form-control";
			$this->thawAbserve->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->EditValue = HtmlEncode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

			// thawDiscard
			$this->thawDiscard->EditAttrs["class"] = "form-control";
			$this->thawDiscard->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->EditValue = HtmlEncode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

			// vitrificationDate
			$this->vitrificationDate->EditAttrs["class"] = "form-control";
			$this->vitrificationDate->EditCustomAttributes = "";
			$this->vitrificationDate->EditValue = HtmlEncode(FormatDateTime($this->vitrificationDate->CurrentValue, 8));
			$this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

			// EmbryoNo
			$this->EmbryoNo->EditAttrs["class"] = "form-control";
			$this->EmbryoNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
			$this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
			$this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

			// Day
			$this->Day->EditAttrs["class"] = "form-control";
			$this->Day->EditCustomAttributes = "";
			$this->Day->EditValue = $this->Day->options(TRUE);

			// Grade
			$this->Grade->EditAttrs["class"] = "form-control";
			$this->Grade->EditCustomAttributes = "";
			$this->Grade->EditValue = $this->Grade->options(TRUE);

			// Add refer script
			// thawDate

			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";

			// thawET
			$this->thawET->LinkCustomAttributes = "";
			$this->thawET->HrefValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";

			// thawAbserve
			$this->thawAbserve->LinkCustomAttributes = "";
			$this->thawAbserve->HrefValue = "";

			// thawDiscard
			$this->thawDiscard->LinkCustomAttributes = "";
			$this->thawDiscard->HrefValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// thawDate
			$this->thawDate->EditAttrs["class"] = "form-control";
			$this->thawDate->EditCustomAttributes = "";
			$this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
			$this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawPrimaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawSecondaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

			// thawET
			$this->thawET->EditAttrs["class"] = "form-control";
			$this->thawET->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawET->CurrentValue = HtmlDecode($this->thawET->CurrentValue);
			$this->thawET->EditValue = HtmlEncode($this->thawET->CurrentValue);
			$this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

			// thawReFrozen
			$this->thawReFrozen->EditAttrs["class"] = "form-control";
			$this->thawReFrozen->EditCustomAttributes = "";
			$this->thawReFrozen->EditValue = $this->thawReFrozen->options(TRUE);

			// thawAbserve
			$this->thawAbserve->EditAttrs["class"] = "form-control";
			$this->thawAbserve->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->EditValue = HtmlEncode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

			// thawDiscard
			$this->thawDiscard->EditAttrs["class"] = "form-control";
			$this->thawDiscard->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->EditValue = HtmlEncode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

			// vitrificationDate
			$this->vitrificationDate->EditAttrs["class"] = "form-control";
			$this->vitrificationDate->EditCustomAttributes = "";
			$this->vitrificationDate->EditValue = $this->vitrificationDate->CurrentValue;
			$this->vitrificationDate->EditValue = FormatDateTime($this->vitrificationDate->EditValue, 0);
			$this->vitrificationDate->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->EditAttrs["class"] = "form-control";
			$this->EmbryoNo->EditCustomAttributes = "";
			$this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// Day
			$this->Day->EditAttrs["class"] = "form-control";
			$this->Day->EditCustomAttributes = "";
			if (strval($this->Day->CurrentValue) <> "") {
				$this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->EditValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			$this->Grade->EditAttrs["class"] = "form-control";
			$this->Grade->EditCustomAttributes = "";
			if (strval($this->Grade->CurrentValue) <> "") {
				$this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->EditValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Edit refer script
			// thawDate

			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";

			// thawET
			$this->thawET->LinkCustomAttributes = "";
			$this->thawET->HrefValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";

			// thawAbserve
			$this->thawAbserve->LinkCustomAttributes = "";
			$this->thawAbserve->HrefValue = "";

			// thawDiscard
			$this->thawDiscard->LinkCustomAttributes = "";
			$this->thawDiscard->HrefValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";
			$this->vitrificationDate->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->TiDNo->Required) {
			if (!$this->TiDNo->IsDetailKey && $this->TiDNo->FormValue != NULL && $this->TiDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TiDNo->caption(), $this->TiDNo->RequiredErrorMessage));
			}
		}
		if ($this->thawDate->Required) {
			if (!$this->thawDate->IsDetailKey && $this->thawDate->FormValue != NULL && $this->thawDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawDate->caption(), $this->thawDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->thawDate->FormValue)) {
			AddMessage($FormError, $this->thawDate->errorMessage());
		}
		if ($this->thawPrimaryEmbryologist->Required) {
			if (!$this->thawPrimaryEmbryologist->IsDetailKey && $this->thawPrimaryEmbryologist->FormValue != NULL && $this->thawPrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawPrimaryEmbryologist->caption(), $this->thawPrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawSecondaryEmbryologist->Required) {
			if (!$this->thawSecondaryEmbryologist->IsDetailKey && $this->thawSecondaryEmbryologist->FormValue != NULL && $this->thawSecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawSecondaryEmbryologist->caption(), $this->thawSecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawET->Required) {
			if (!$this->thawET->IsDetailKey && $this->thawET->FormValue != NULL && $this->thawET->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawET->caption(), $this->thawET->RequiredErrorMessage));
			}
		}
		if ($this->thawReFrozen->Required) {
			if (!$this->thawReFrozen->IsDetailKey && $this->thawReFrozen->FormValue != NULL && $this->thawReFrozen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawReFrozen->caption(), $this->thawReFrozen->RequiredErrorMessage));
			}
		}
		if ($this->thawAbserve->Required) {
			if (!$this->thawAbserve->IsDetailKey && $this->thawAbserve->FormValue != NULL && $this->thawAbserve->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawAbserve->caption(), $this->thawAbserve->RequiredErrorMessage));
			}
		}
		if ($this->thawDiscard->Required) {
			if (!$this->thawDiscard->IsDetailKey && $this->thawDiscard->FormValue != NULL && $this->thawDiscard->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawDiscard->caption(), $this->thawDiscard->RequiredErrorMessage));
			}
		}
		if ($this->vitrificationDate->Required) {
			if (!$this->vitrificationDate->IsDetailKey && $this->vitrificationDate->FormValue != NULL && $this->vitrificationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitrificationDate->caption(), $this->vitrificationDate->RequiredErrorMessage));
			}
		}
		if ($this->PrimaryEmbryologist->Required) {
			if (!$this->PrimaryEmbryologist->IsDetailKey && $this->PrimaryEmbryologist->FormValue != NULL && $this->PrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrimaryEmbryologist->caption(), $this->PrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryEmbryologist->Required) {
			if (!$this->SecondaryEmbryologist->IsDetailKey && $this->SecondaryEmbryologist->FormValue != NULL && $this->SecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryEmbryologist->caption(), $this->SecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->EmbryoNo->Required) {
			if (!$this->EmbryoNo->IsDetailKey && $this->EmbryoNo->FormValue != NULL && $this->EmbryoNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
			}
		}
		if ($this->FertilisationDate->Required) {
			if (!$this->FertilisationDate->IsDetailKey && $this->FertilisationDate->FormValue != NULL && $this->FertilisationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FertilisationDate->caption(), $this->FertilisationDate->RequiredErrorMessage));
			}
		}
		if ($this->Day->Required) {
			if (!$this->Day->IsDetailKey && $this->Day->FormValue != NULL && $this->Day->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day->caption(), $this->Day->RequiredErrorMessage));
			}
		}
		if ($this->Grade->Required) {
			if (!$this->Grade->IsDetailKey && $this->Grade->FormValue != NULL && $this->Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade->caption(), $this->Grade->RequiredErrorMessage));
			}
		}
		if ($this->Incubator->Required) {
			if (!$this->Incubator->IsDetailKey && $this->Incubator->FormValue != NULL && $this->Incubator->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
			}
		}
		if ($this->Tank->Required) {
			if (!$this->Tank->IsDetailKey && $this->Tank->FormValue != NULL && $this->Tank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
			}
		}
		if ($this->Canister->Required) {
			if (!$this->Canister->IsDetailKey && $this->Canister->FormValue != NULL && $this->Canister->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
			}
		}
		if ($this->Gobiet->Required) {
			if (!$this->Gobiet->IsDetailKey && $this->Gobiet->FormValue != NULL && $this->Gobiet->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gobiet->caption(), $this->Gobiet->RequiredErrorMessage));
			}
		}
		if ($this->CryolockNo->Required) {
			if (!$this->CryolockNo->IsDetailKey && $this->CryolockNo->FormValue != NULL && $this->CryolockNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CryolockNo->caption(), $this->CryolockNo->RequiredErrorMessage));
			}
		}
		if ($this->CryolockColour->Required) {
			if (!$this->CryolockColour->IsDetailKey && $this->CryolockColour->FormValue != NULL && $this->CryolockColour->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CryolockColour->caption(), $this->CryolockColour->RequiredErrorMessage));
			}
		}
		if ($this->Stage->Required) {
			if (!$this->Stage->IsDetailKey && $this->Stage->FormValue != NULL && $this->Stage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
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

			// thawDate
			$this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), NULL, $this->thawDate->ReadOnly);

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, NULL, $this->thawPrimaryEmbryologist->ReadOnly);

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, NULL, $this->thawSecondaryEmbryologist->ReadOnly);

			// thawET
			$this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, NULL, $this->thawET->ReadOnly);

			// thawReFrozen
			$this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, NULL, $this->thawReFrozen->ReadOnly);

			// thawAbserve
			$this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, NULL, $this->thawAbserve->ReadOnly);

			// thawDiscard
			$this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, NULL, $this->thawDiscard->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('thawDate')); // thawDate
		$hash .= GetFieldHash($rs->fields('thawPrimaryEmbryologist')); // thawPrimaryEmbryologist
		$hash .= GetFieldHash($rs->fields('thawSecondaryEmbryologist')); // thawSecondaryEmbryologist
		$hash .= GetFieldHash($rs->fields('thawET')); // thawET
		$hash .= GetFieldHash($rs->fields('thawReFrozen')); // thawReFrozen
		$hash .= GetFieldHash($rs->fields('thawAbserve')); // thawAbserve
		$hash .= GetFieldHash($rs->fields('thawDiscard')); // thawDiscard
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

		// thawDate
		$this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), NULL, FALSE);

		// thawPrimaryEmbryologist
		$this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, NULL, FALSE);

		// thawSecondaryEmbryologist
		$this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, NULL, FALSE);

		// thawET
		$this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, NULL, FALSE);

		// thawReFrozen
		$this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, NULL, FALSE);

		// thawAbserve
		$this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, NULL, FALSE);

		// thawDiscard
		$this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, NULL, FALSE);

		// vitrificationDate
		$this->vitrificationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitrificationDate->CurrentValue, 0), NULL, FALSE);

		// EmbryoNo
		$this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, NULL, FALSE);

		// Day
		$this->Day->setDbValueDef($rsnew, $this->Day->CurrentValue, NULL, FALSE);

		// Grade
		$this->Grade->setDbValueDef($rsnew, $this->Grade->CurrentValue, NULL, FALSE);

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

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fthawlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fthawlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fthawlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_thaw\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_thaw',hdr:ew.language.phrase('ExportToEmailText'),f:document.fthawlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
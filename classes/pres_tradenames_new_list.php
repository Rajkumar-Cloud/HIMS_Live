<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pres_tradenames_new_list extends pres_tradenames_new
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_tradenames_new';

	// Page object name
	public $PageObjName = "pres_tradenames_new_list";

	// Grid form hidden field names
	public $FormName = "fpres_tradenames_newlist";
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

		// Table object (pres_tradenames_new)
		if (!isset($GLOBALS["pres_tradenames_new"]) || get_class($GLOBALS["pres_tradenames_new"]) == PROJECT_NAMESPACE . "pres_tradenames_new") {
			$GLOBALS["pres_tradenames_new"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_tradenames_new"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "pres_tradenames_newadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "pres_tradenames_newdelete.php";
		$this->MultiUpdateUrl = "pres_tradenames_newupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_tradenames_new');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpres_tradenames_newlistsrch";

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
		global $EXPORT, $pres_tradenames_new;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pres_tradenames_new);
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
			$key .= @$ar['ID'];
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
			$this->ID->Visible = FALSE;
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
		$this->ID->setVisibility();
		$this->Drug_Name->setVisibility();
		$this->Generic_Name->setVisibility();
		$this->Trade_Name->setVisibility();
		$this->PR_CODE->setVisibility();
		$this->Form->setVisibility();
		$this->Strength->setVisibility();
		$this->Unit->setVisibility();
		$this->CONTAINER_TYPE->Visible = FALSE;
		$this->CONTAINER_STRENGTH->Visible = FALSE;
		$this->TypeOfDrug->setVisibility();
		$this->ProductType->setVisibility();
		$this->Generic_Name1->setVisibility();
		$this->Strength1->setVisibility();
		$this->Unit1->setVisibility();
		$this->Generic_Name2->setVisibility();
		$this->Strength2->setVisibility();
		$this->Unit2->setVisibility();
		$this->Generic_Name3->setVisibility();
		$this->Strength3->setVisibility();
		$this->Unit3->setVisibility();
		$this->Generic_Name4->setVisibility();
		$this->Generic_Name5->setVisibility();
		$this->Strength4->setVisibility();
		$this->Strength5->setVisibility();
		$this->Unit4->setVisibility();
		$this->Unit5->setVisibility();
		$this->AlterNative1->setVisibility();
		$this->AlterNative2->setVisibility();
		$this->AlterNative3->setVisibility();
		$this->AlterNative4->setVisibility();
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
		$this->setupLookupOptions($this->Generic_Name);
		$this->setupLookupOptions($this->Form);
		$this->setupLookupOptions($this->Unit);
		$this->setupLookupOptions($this->Generic_Name1);
		$this->setupLookupOptions($this->Unit1);
		$this->setupLookupOptions($this->Generic_Name2);
		$this->setupLookupOptions($this->Unit2);
		$this->setupLookupOptions($this->Generic_Name3);
		$this->setupLookupOptions($this->Unit3);
		$this->setupLookupOptions($this->Generic_Name4);
		$this->setupLookupOptions($this->Generic_Name5);
		$this->setupLookupOptions($this->Unit4);
		$this->setupLookupOptions($this->Unit5);
		$this->setupLookupOptions($this->AlterNative1);
		$this->setupLookupOptions($this->AlterNative2);
		$this->setupLookupOptions($this->AlterNative3);
		$this->setupLookupOptions($this->AlterNative4);

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
			$this->ID->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->ID->FormValue))
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpres_tradenames_newlistsrch");
		$filterList = Concat($filterList, $this->ID->AdvancedSearch->toJson(), ","); // Field ID
		$filterList = Concat($filterList, $this->Drug_Name->AdvancedSearch->toJson(), ","); // Field Drug_Name
		$filterList = Concat($filterList, $this->Generic_Name->AdvancedSearch->toJson(), ","); // Field Generic_Name
		$filterList = Concat($filterList, $this->Trade_Name->AdvancedSearch->toJson(), ","); // Field Trade_Name
		$filterList = Concat($filterList, $this->PR_CODE->AdvancedSearch->toJson(), ","); // Field PR_CODE
		$filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
		$filterList = Concat($filterList, $this->Strength->AdvancedSearch->toJson(), ","); // Field Strength
		$filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
		$filterList = Concat($filterList, $this->CONTAINER_TYPE->AdvancedSearch->toJson(), ","); // Field CONTAINER_TYPE
		$filterList = Concat($filterList, $this->CONTAINER_STRENGTH->AdvancedSearch->toJson(), ","); // Field CONTAINER_STRENGTH
		$filterList = Concat($filterList, $this->TypeOfDrug->AdvancedSearch->toJson(), ","); // Field TypeOfDrug
		$filterList = Concat($filterList, $this->ProductType->AdvancedSearch->toJson(), ","); // Field ProductType
		$filterList = Concat($filterList, $this->Generic_Name1->AdvancedSearch->toJson(), ","); // Field Generic_Name1
		$filterList = Concat($filterList, $this->Strength1->AdvancedSearch->toJson(), ","); // Field Strength1
		$filterList = Concat($filterList, $this->Unit1->AdvancedSearch->toJson(), ","); // Field Unit1
		$filterList = Concat($filterList, $this->Generic_Name2->AdvancedSearch->toJson(), ","); // Field Generic_Name2
		$filterList = Concat($filterList, $this->Strength2->AdvancedSearch->toJson(), ","); // Field Strength2
		$filterList = Concat($filterList, $this->Unit2->AdvancedSearch->toJson(), ","); // Field Unit2
		$filterList = Concat($filterList, $this->Generic_Name3->AdvancedSearch->toJson(), ","); // Field Generic_Name3
		$filterList = Concat($filterList, $this->Strength3->AdvancedSearch->toJson(), ","); // Field Strength3
		$filterList = Concat($filterList, $this->Unit3->AdvancedSearch->toJson(), ","); // Field Unit3
		$filterList = Concat($filterList, $this->Generic_Name4->AdvancedSearch->toJson(), ","); // Field Generic_Name4
		$filterList = Concat($filterList, $this->Generic_Name5->AdvancedSearch->toJson(), ","); // Field Generic_Name5
		$filterList = Concat($filterList, $this->Strength4->AdvancedSearch->toJson(), ","); // Field Strength4
		$filterList = Concat($filterList, $this->Strength5->AdvancedSearch->toJson(), ","); // Field Strength5
		$filterList = Concat($filterList, $this->Unit4->AdvancedSearch->toJson(), ","); // Field Unit4
		$filterList = Concat($filterList, $this->Unit5->AdvancedSearch->toJson(), ","); // Field Unit5
		$filterList = Concat($filterList, $this->AlterNative1->AdvancedSearch->toJson(), ","); // Field AlterNative1
		$filterList = Concat($filterList, $this->AlterNative2->AdvancedSearch->toJson(), ","); // Field AlterNative2
		$filterList = Concat($filterList, $this->AlterNative3->AdvancedSearch->toJson(), ","); // Field AlterNative3
		$filterList = Concat($filterList, $this->AlterNative4->AdvancedSearch->toJson(), ","); // Field AlterNative4
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpres_tradenames_newlistsrch", $filters);
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

		// Field ID
		$this->ID->AdvancedSearch->SearchValue = @$filter["x_ID"];
		$this->ID->AdvancedSearch->SearchOperator = @$filter["z_ID"];
		$this->ID->AdvancedSearch->SearchCondition = @$filter["v_ID"];
		$this->ID->AdvancedSearch->SearchValue2 = @$filter["y_ID"];
		$this->ID->AdvancedSearch->SearchOperator2 = @$filter["w_ID"];
		$this->ID->AdvancedSearch->save();

		// Field Drug_Name
		$this->Drug_Name->AdvancedSearch->SearchValue = @$filter["x_Drug_Name"];
		$this->Drug_Name->AdvancedSearch->SearchOperator = @$filter["z_Drug_Name"];
		$this->Drug_Name->AdvancedSearch->SearchCondition = @$filter["v_Drug_Name"];
		$this->Drug_Name->AdvancedSearch->SearchValue2 = @$filter["y_Drug_Name"];
		$this->Drug_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Drug_Name"];
		$this->Drug_Name->AdvancedSearch->save();

		// Field Generic_Name
		$this->Generic_Name->AdvancedSearch->SearchValue = @$filter["x_Generic_Name"];
		$this->Generic_Name->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name"];
		$this->Generic_Name->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name"];
		$this->Generic_Name->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name"];
		$this->Generic_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name"];
		$this->Generic_Name->AdvancedSearch->save();

		// Field Trade_Name
		$this->Trade_Name->AdvancedSearch->SearchValue = @$filter["x_Trade_Name"];
		$this->Trade_Name->AdvancedSearch->SearchOperator = @$filter["z_Trade_Name"];
		$this->Trade_Name->AdvancedSearch->SearchCondition = @$filter["v_Trade_Name"];
		$this->Trade_Name->AdvancedSearch->SearchValue2 = @$filter["y_Trade_Name"];
		$this->Trade_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Trade_Name"];
		$this->Trade_Name->AdvancedSearch->save();

		// Field PR_CODE
		$this->PR_CODE->AdvancedSearch->SearchValue = @$filter["x_PR_CODE"];
		$this->PR_CODE->AdvancedSearch->SearchOperator = @$filter["z_PR_CODE"];
		$this->PR_CODE->AdvancedSearch->SearchCondition = @$filter["v_PR_CODE"];
		$this->PR_CODE->AdvancedSearch->SearchValue2 = @$filter["y_PR_CODE"];
		$this->PR_CODE->AdvancedSearch->SearchOperator2 = @$filter["w_PR_CODE"];
		$this->PR_CODE->AdvancedSearch->save();

		// Field Form
		$this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
		$this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
		$this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
		$this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
		$this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
		$this->Form->AdvancedSearch->save();

		// Field Strength
		$this->Strength->AdvancedSearch->SearchValue = @$filter["x_Strength"];
		$this->Strength->AdvancedSearch->SearchOperator = @$filter["z_Strength"];
		$this->Strength->AdvancedSearch->SearchCondition = @$filter["v_Strength"];
		$this->Strength->AdvancedSearch->SearchValue2 = @$filter["y_Strength"];
		$this->Strength->AdvancedSearch->SearchOperator2 = @$filter["w_Strength"];
		$this->Strength->AdvancedSearch->save();

		// Field Unit
		$this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
		$this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
		$this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
		$this->Unit->AdvancedSearch->save();

		// Field CONTAINER_TYPE
		$this->CONTAINER_TYPE->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_TYPE"];
		$this->CONTAINER_TYPE->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_TYPE"];
		$this->CONTAINER_TYPE->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_TYPE"];
		$this->CONTAINER_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_TYPE"];
		$this->CONTAINER_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_TYPE"];
		$this->CONTAINER_TYPE->AdvancedSearch->save();

		// Field CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_STRENGTH"];
		$this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_STRENGTH"];
		$this->CONTAINER_STRENGTH->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_STRENGTH"];
		$this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_STRENGTH"];
		$this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_STRENGTH"];
		$this->CONTAINER_STRENGTH->AdvancedSearch->save();

		// Field TypeOfDrug
		$this->TypeOfDrug->AdvancedSearch->SearchValue = @$filter["x_TypeOfDrug"];
		$this->TypeOfDrug->AdvancedSearch->SearchOperator = @$filter["z_TypeOfDrug"];
		$this->TypeOfDrug->AdvancedSearch->SearchCondition = @$filter["v_TypeOfDrug"];
		$this->TypeOfDrug->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfDrug"];
		$this->TypeOfDrug->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfDrug"];
		$this->TypeOfDrug->AdvancedSearch->save();

		// Field ProductType
		$this->ProductType->AdvancedSearch->SearchValue = @$filter["x_ProductType"];
		$this->ProductType->AdvancedSearch->SearchOperator = @$filter["z_ProductType"];
		$this->ProductType->AdvancedSearch->SearchCondition = @$filter["v_ProductType"];
		$this->ProductType->AdvancedSearch->SearchValue2 = @$filter["y_ProductType"];
		$this->ProductType->AdvancedSearch->SearchOperator2 = @$filter["w_ProductType"];
		$this->ProductType->AdvancedSearch->save();

		// Field Generic_Name1
		$this->Generic_Name1->AdvancedSearch->SearchValue = @$filter["x_Generic_Name1"];
		$this->Generic_Name1->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name1"];
		$this->Generic_Name1->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name1"];
		$this->Generic_Name1->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name1"];
		$this->Generic_Name1->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name1"];
		$this->Generic_Name1->AdvancedSearch->save();

		// Field Strength1
		$this->Strength1->AdvancedSearch->SearchValue = @$filter["x_Strength1"];
		$this->Strength1->AdvancedSearch->SearchOperator = @$filter["z_Strength1"];
		$this->Strength1->AdvancedSearch->SearchCondition = @$filter["v_Strength1"];
		$this->Strength1->AdvancedSearch->SearchValue2 = @$filter["y_Strength1"];
		$this->Strength1->AdvancedSearch->SearchOperator2 = @$filter["w_Strength1"];
		$this->Strength1->AdvancedSearch->save();

		// Field Unit1
		$this->Unit1->AdvancedSearch->SearchValue = @$filter["x_Unit1"];
		$this->Unit1->AdvancedSearch->SearchOperator = @$filter["z_Unit1"];
		$this->Unit1->AdvancedSearch->SearchCondition = @$filter["v_Unit1"];
		$this->Unit1->AdvancedSearch->SearchValue2 = @$filter["y_Unit1"];
		$this->Unit1->AdvancedSearch->SearchOperator2 = @$filter["w_Unit1"];
		$this->Unit1->AdvancedSearch->save();

		// Field Generic_Name2
		$this->Generic_Name2->AdvancedSearch->SearchValue = @$filter["x_Generic_Name2"];
		$this->Generic_Name2->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name2"];
		$this->Generic_Name2->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name2"];
		$this->Generic_Name2->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name2"];
		$this->Generic_Name2->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name2"];
		$this->Generic_Name2->AdvancedSearch->save();

		// Field Strength2
		$this->Strength2->AdvancedSearch->SearchValue = @$filter["x_Strength2"];
		$this->Strength2->AdvancedSearch->SearchOperator = @$filter["z_Strength2"];
		$this->Strength2->AdvancedSearch->SearchCondition = @$filter["v_Strength2"];
		$this->Strength2->AdvancedSearch->SearchValue2 = @$filter["y_Strength2"];
		$this->Strength2->AdvancedSearch->SearchOperator2 = @$filter["w_Strength2"];
		$this->Strength2->AdvancedSearch->save();

		// Field Unit2
		$this->Unit2->AdvancedSearch->SearchValue = @$filter["x_Unit2"];
		$this->Unit2->AdvancedSearch->SearchOperator = @$filter["z_Unit2"];
		$this->Unit2->AdvancedSearch->SearchCondition = @$filter["v_Unit2"];
		$this->Unit2->AdvancedSearch->SearchValue2 = @$filter["y_Unit2"];
		$this->Unit2->AdvancedSearch->SearchOperator2 = @$filter["w_Unit2"];
		$this->Unit2->AdvancedSearch->save();

		// Field Generic_Name3
		$this->Generic_Name3->AdvancedSearch->SearchValue = @$filter["x_Generic_Name3"];
		$this->Generic_Name3->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name3"];
		$this->Generic_Name3->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name3"];
		$this->Generic_Name3->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name3"];
		$this->Generic_Name3->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name3"];
		$this->Generic_Name3->AdvancedSearch->save();

		// Field Strength3
		$this->Strength3->AdvancedSearch->SearchValue = @$filter["x_Strength3"];
		$this->Strength3->AdvancedSearch->SearchOperator = @$filter["z_Strength3"];
		$this->Strength3->AdvancedSearch->SearchCondition = @$filter["v_Strength3"];
		$this->Strength3->AdvancedSearch->SearchValue2 = @$filter["y_Strength3"];
		$this->Strength3->AdvancedSearch->SearchOperator2 = @$filter["w_Strength3"];
		$this->Strength3->AdvancedSearch->save();

		// Field Unit3
		$this->Unit3->AdvancedSearch->SearchValue = @$filter["x_Unit3"];
		$this->Unit3->AdvancedSearch->SearchOperator = @$filter["z_Unit3"];
		$this->Unit3->AdvancedSearch->SearchCondition = @$filter["v_Unit3"];
		$this->Unit3->AdvancedSearch->SearchValue2 = @$filter["y_Unit3"];
		$this->Unit3->AdvancedSearch->SearchOperator2 = @$filter["w_Unit3"];
		$this->Unit3->AdvancedSearch->save();

		// Field Generic_Name4
		$this->Generic_Name4->AdvancedSearch->SearchValue = @$filter["x_Generic_Name4"];
		$this->Generic_Name4->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name4"];
		$this->Generic_Name4->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name4"];
		$this->Generic_Name4->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name4"];
		$this->Generic_Name4->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name4"];
		$this->Generic_Name4->AdvancedSearch->save();

		// Field Generic_Name5
		$this->Generic_Name5->AdvancedSearch->SearchValue = @$filter["x_Generic_Name5"];
		$this->Generic_Name5->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name5"];
		$this->Generic_Name5->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name5"];
		$this->Generic_Name5->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name5"];
		$this->Generic_Name5->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name5"];
		$this->Generic_Name5->AdvancedSearch->save();

		// Field Strength4
		$this->Strength4->AdvancedSearch->SearchValue = @$filter["x_Strength4"];
		$this->Strength4->AdvancedSearch->SearchOperator = @$filter["z_Strength4"];
		$this->Strength4->AdvancedSearch->SearchCondition = @$filter["v_Strength4"];
		$this->Strength4->AdvancedSearch->SearchValue2 = @$filter["y_Strength4"];
		$this->Strength4->AdvancedSearch->SearchOperator2 = @$filter["w_Strength4"];
		$this->Strength4->AdvancedSearch->save();

		// Field Strength5
		$this->Strength5->AdvancedSearch->SearchValue = @$filter["x_Strength5"];
		$this->Strength5->AdvancedSearch->SearchOperator = @$filter["z_Strength5"];
		$this->Strength5->AdvancedSearch->SearchCondition = @$filter["v_Strength5"];
		$this->Strength5->AdvancedSearch->SearchValue2 = @$filter["y_Strength5"];
		$this->Strength5->AdvancedSearch->SearchOperator2 = @$filter["w_Strength5"];
		$this->Strength5->AdvancedSearch->save();

		// Field Unit4
		$this->Unit4->AdvancedSearch->SearchValue = @$filter["x_Unit4"];
		$this->Unit4->AdvancedSearch->SearchOperator = @$filter["z_Unit4"];
		$this->Unit4->AdvancedSearch->SearchCondition = @$filter["v_Unit4"];
		$this->Unit4->AdvancedSearch->SearchValue2 = @$filter["y_Unit4"];
		$this->Unit4->AdvancedSearch->SearchOperator2 = @$filter["w_Unit4"];
		$this->Unit4->AdvancedSearch->save();

		// Field Unit5
		$this->Unit5->AdvancedSearch->SearchValue = @$filter["x_Unit5"];
		$this->Unit5->AdvancedSearch->SearchOperator = @$filter["z_Unit5"];
		$this->Unit5->AdvancedSearch->SearchCondition = @$filter["v_Unit5"];
		$this->Unit5->AdvancedSearch->SearchValue2 = @$filter["y_Unit5"];
		$this->Unit5->AdvancedSearch->SearchOperator2 = @$filter["w_Unit5"];
		$this->Unit5->AdvancedSearch->save();

		// Field AlterNative1
		$this->AlterNative1->AdvancedSearch->SearchValue = @$filter["x_AlterNative1"];
		$this->AlterNative1->AdvancedSearch->SearchOperator = @$filter["z_AlterNative1"];
		$this->AlterNative1->AdvancedSearch->SearchCondition = @$filter["v_AlterNative1"];
		$this->AlterNative1->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative1"];
		$this->AlterNative1->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative1"];
		$this->AlterNative1->AdvancedSearch->save();

		// Field AlterNative2
		$this->AlterNative2->AdvancedSearch->SearchValue = @$filter["x_AlterNative2"];
		$this->AlterNative2->AdvancedSearch->SearchOperator = @$filter["z_AlterNative2"];
		$this->AlterNative2->AdvancedSearch->SearchCondition = @$filter["v_AlterNative2"];
		$this->AlterNative2->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative2"];
		$this->AlterNative2->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative2"];
		$this->AlterNative2->AdvancedSearch->save();

		// Field AlterNative3
		$this->AlterNative3->AdvancedSearch->SearchValue = @$filter["x_AlterNative3"];
		$this->AlterNative3->AdvancedSearch->SearchOperator = @$filter["z_AlterNative3"];
		$this->AlterNative3->AdvancedSearch->SearchCondition = @$filter["v_AlterNative3"];
		$this->AlterNative3->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative3"];
		$this->AlterNative3->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative3"];
		$this->AlterNative3->AdvancedSearch->save();

		// Field AlterNative4
		$this->AlterNative4->AdvancedSearch->SearchValue = @$filter["x_AlterNative4"];
		$this->AlterNative4->AdvancedSearch->SearchOperator = @$filter["z_AlterNative4"];
		$this->AlterNative4->AdvancedSearch->SearchCondition = @$filter["v_AlterNative4"];
		$this->AlterNative4->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative4"];
		$this->AlterNative4->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative4"];
		$this->AlterNative4->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->ID, $default, FALSE); // ID
		$this->buildSearchSql($where, $this->Drug_Name, $default, FALSE); // Drug_Name
		$this->buildSearchSql($where, $this->Generic_Name, $default, FALSE); // Generic_Name
		$this->buildSearchSql($where, $this->Trade_Name, $default, FALSE); // Trade_Name
		$this->buildSearchSql($where, $this->PR_CODE, $default, FALSE); // PR_CODE
		$this->buildSearchSql($where, $this->Form, $default, FALSE); // Form
		$this->buildSearchSql($where, $this->Strength, $default, FALSE); // Strength
		$this->buildSearchSql($where, $this->Unit, $default, FALSE); // Unit
		$this->buildSearchSql($where, $this->CONTAINER_TYPE, $default, FALSE); // CONTAINER_TYPE
		$this->buildSearchSql($where, $this->CONTAINER_STRENGTH, $default, FALSE); // CONTAINER_STRENGTH
		$this->buildSearchSql($where, $this->TypeOfDrug, $default, FALSE); // TypeOfDrug
		$this->buildSearchSql($where, $this->ProductType, $default, FALSE); // ProductType
		$this->buildSearchSql($where, $this->Generic_Name1, $default, FALSE); // Generic_Name1
		$this->buildSearchSql($where, $this->Strength1, $default, FALSE); // Strength1
		$this->buildSearchSql($where, $this->Unit1, $default, FALSE); // Unit1
		$this->buildSearchSql($where, $this->Generic_Name2, $default, FALSE); // Generic_Name2
		$this->buildSearchSql($where, $this->Strength2, $default, FALSE); // Strength2
		$this->buildSearchSql($where, $this->Unit2, $default, FALSE); // Unit2
		$this->buildSearchSql($where, $this->Generic_Name3, $default, FALSE); // Generic_Name3
		$this->buildSearchSql($where, $this->Strength3, $default, FALSE); // Strength3
		$this->buildSearchSql($where, $this->Unit3, $default, FALSE); // Unit3
		$this->buildSearchSql($where, $this->Generic_Name4, $default, FALSE); // Generic_Name4
		$this->buildSearchSql($where, $this->Generic_Name5, $default, FALSE); // Generic_Name5
		$this->buildSearchSql($where, $this->Strength4, $default, FALSE); // Strength4
		$this->buildSearchSql($where, $this->Strength5, $default, FALSE); // Strength5
		$this->buildSearchSql($where, $this->Unit4, $default, FALSE); // Unit4
		$this->buildSearchSql($where, $this->Unit5, $default, FALSE); // Unit5
		$this->buildSearchSql($where, $this->AlterNative1, $default, FALSE); // AlterNative1
		$this->buildSearchSql($where, $this->AlterNative2, $default, FALSE); // AlterNative2
		$this->buildSearchSql($where, $this->AlterNative3, $default, FALSE); // AlterNative3
		$this->buildSearchSql($where, $this->AlterNative4, $default, FALSE); // AlterNative4

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->ID->AdvancedSearch->save(); // ID
			$this->Drug_Name->AdvancedSearch->save(); // Drug_Name
			$this->Generic_Name->AdvancedSearch->save(); // Generic_Name
			$this->Trade_Name->AdvancedSearch->save(); // Trade_Name
			$this->PR_CODE->AdvancedSearch->save(); // PR_CODE
			$this->Form->AdvancedSearch->save(); // Form
			$this->Strength->AdvancedSearch->save(); // Strength
			$this->Unit->AdvancedSearch->save(); // Unit
			$this->CONTAINER_TYPE->AdvancedSearch->save(); // CONTAINER_TYPE
			$this->CONTAINER_STRENGTH->AdvancedSearch->save(); // CONTAINER_STRENGTH
			$this->TypeOfDrug->AdvancedSearch->save(); // TypeOfDrug
			$this->ProductType->AdvancedSearch->save(); // ProductType
			$this->Generic_Name1->AdvancedSearch->save(); // Generic_Name1
			$this->Strength1->AdvancedSearch->save(); // Strength1
			$this->Unit1->AdvancedSearch->save(); // Unit1
			$this->Generic_Name2->AdvancedSearch->save(); // Generic_Name2
			$this->Strength2->AdvancedSearch->save(); // Strength2
			$this->Unit2->AdvancedSearch->save(); // Unit2
			$this->Generic_Name3->AdvancedSearch->save(); // Generic_Name3
			$this->Strength3->AdvancedSearch->save(); // Strength3
			$this->Unit3->AdvancedSearch->save(); // Unit3
			$this->Generic_Name4->AdvancedSearch->save(); // Generic_Name4
			$this->Generic_Name5->AdvancedSearch->save(); // Generic_Name5
			$this->Strength4->AdvancedSearch->save(); // Strength4
			$this->Strength5->AdvancedSearch->save(); // Strength5
			$this->Unit4->AdvancedSearch->save(); // Unit4
			$this->Unit5->AdvancedSearch->save(); // Unit5
			$this->AlterNative1->AdvancedSearch->save(); // AlterNative1
			$this->AlterNative2->AdvancedSearch->save(); // AlterNative2
			$this->AlterNative3->AdvancedSearch->save(); // AlterNative3
			$this->AlterNative4->AdvancedSearch->save(); // AlterNative4
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
		$this->buildBasicSearchSql($where, $this->Drug_Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Trade_Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PR_CODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CONTAINER_TYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CONTAINER_STRENGTH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeOfDrug, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProductType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generic_Name5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Strength5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AlterNative1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AlterNative2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AlterNative3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AlterNative4, $arKeywords, $type);
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
		if ($this->ID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Drug_Name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Trade_Name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PR_CODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Form->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CONTAINER_TYPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CONTAINER_STRENGTH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TypeOfDrug->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProductType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name4->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Generic_Name5->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength4->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Strength5->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit4->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit5->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AlterNative1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AlterNative2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AlterNative3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AlterNative4->AdvancedSearch->issetSession())
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
		$this->ID->AdvancedSearch->unsetSession();
		$this->Drug_Name->AdvancedSearch->unsetSession();
		$this->Generic_Name->AdvancedSearch->unsetSession();
		$this->Trade_Name->AdvancedSearch->unsetSession();
		$this->PR_CODE->AdvancedSearch->unsetSession();
		$this->Form->AdvancedSearch->unsetSession();
		$this->Strength->AdvancedSearch->unsetSession();
		$this->Unit->AdvancedSearch->unsetSession();
		$this->CONTAINER_TYPE->AdvancedSearch->unsetSession();
		$this->CONTAINER_STRENGTH->AdvancedSearch->unsetSession();
		$this->TypeOfDrug->AdvancedSearch->unsetSession();
		$this->ProductType->AdvancedSearch->unsetSession();
		$this->Generic_Name1->AdvancedSearch->unsetSession();
		$this->Strength1->AdvancedSearch->unsetSession();
		$this->Unit1->AdvancedSearch->unsetSession();
		$this->Generic_Name2->AdvancedSearch->unsetSession();
		$this->Strength2->AdvancedSearch->unsetSession();
		$this->Unit2->AdvancedSearch->unsetSession();
		$this->Generic_Name3->AdvancedSearch->unsetSession();
		$this->Strength3->AdvancedSearch->unsetSession();
		$this->Unit3->AdvancedSearch->unsetSession();
		$this->Generic_Name4->AdvancedSearch->unsetSession();
		$this->Generic_Name5->AdvancedSearch->unsetSession();
		$this->Strength4->AdvancedSearch->unsetSession();
		$this->Strength5->AdvancedSearch->unsetSession();
		$this->Unit4->AdvancedSearch->unsetSession();
		$this->Unit5->AdvancedSearch->unsetSession();
		$this->AlterNative1->AdvancedSearch->unsetSession();
		$this->AlterNative2->AdvancedSearch->unsetSession();
		$this->AlterNative3->AdvancedSearch->unsetSession();
		$this->AlterNative4->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->ID->AdvancedSearch->load();
		$this->Drug_Name->AdvancedSearch->load();
		$this->Generic_Name->AdvancedSearch->load();
		$this->Trade_Name->AdvancedSearch->load();
		$this->PR_CODE->AdvancedSearch->load();
		$this->Form->AdvancedSearch->load();
		$this->Strength->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->CONTAINER_TYPE->AdvancedSearch->load();
		$this->CONTAINER_STRENGTH->AdvancedSearch->load();
		$this->TypeOfDrug->AdvancedSearch->load();
		$this->ProductType->AdvancedSearch->load();
		$this->Generic_Name1->AdvancedSearch->load();
		$this->Strength1->AdvancedSearch->load();
		$this->Unit1->AdvancedSearch->load();
		$this->Generic_Name2->AdvancedSearch->load();
		$this->Strength2->AdvancedSearch->load();
		$this->Unit2->AdvancedSearch->load();
		$this->Generic_Name3->AdvancedSearch->load();
		$this->Strength3->AdvancedSearch->load();
		$this->Unit3->AdvancedSearch->load();
		$this->Generic_Name4->AdvancedSearch->load();
		$this->Generic_Name5->AdvancedSearch->load();
		$this->Strength4->AdvancedSearch->load();
		$this->Strength5->AdvancedSearch->load();
		$this->Unit4->AdvancedSearch->load();
		$this->Unit5->AdvancedSearch->load();
		$this->AlterNative1->AdvancedSearch->load();
		$this->AlterNative2->AdvancedSearch->load();
		$this->AlterNative3->AdvancedSearch->load();
		$this->AlterNative4->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->ID); // ID
			$this->updateSort($this->Drug_Name); // Drug_Name
			$this->updateSort($this->Generic_Name); // Generic_Name
			$this->updateSort($this->Trade_Name); // Trade_Name
			$this->updateSort($this->PR_CODE); // PR_CODE
			$this->updateSort($this->Form); // Form
			$this->updateSort($this->Strength); // Strength
			$this->updateSort($this->Unit); // Unit
			$this->updateSort($this->TypeOfDrug); // TypeOfDrug
			$this->updateSort($this->ProductType); // ProductType
			$this->updateSort($this->Generic_Name1); // Generic_Name1
			$this->updateSort($this->Strength1); // Strength1
			$this->updateSort($this->Unit1); // Unit1
			$this->updateSort($this->Generic_Name2); // Generic_Name2
			$this->updateSort($this->Strength2); // Strength2
			$this->updateSort($this->Unit2); // Unit2
			$this->updateSort($this->Generic_Name3); // Generic_Name3
			$this->updateSort($this->Strength3); // Strength3
			$this->updateSort($this->Unit3); // Unit3
			$this->updateSort($this->Generic_Name4); // Generic_Name4
			$this->updateSort($this->Generic_Name5); // Generic_Name5
			$this->updateSort($this->Strength4); // Strength4
			$this->updateSort($this->Strength5); // Strength5
			$this->updateSort($this->Unit4); // Unit4
			$this->updateSort($this->Unit5); // Unit5
			$this->updateSort($this->AlterNative1); // AlterNative1
			$this->updateSort($this->AlterNative2); // AlterNative2
			$this->updateSort($this->AlterNative3); // AlterNative3
			$this->updateSort($this->AlterNative4); // AlterNative4
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
				$this->ID->setSort("DESC");
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
				$this->ID->setSort("");
				$this->Drug_Name->setSort("");
				$this->Generic_Name->setSort("");
				$this->Trade_Name->setSort("");
				$this->PR_CODE->setSort("");
				$this->Form->setSort("");
				$this->Strength->setSort("");
				$this->Unit->setSort("");
				$this->TypeOfDrug->setSort("");
				$this->ProductType->setSort("");
				$this->Generic_Name1->setSort("");
				$this->Strength1->setSort("");
				$this->Unit1->setSort("");
				$this->Generic_Name2->setSort("");
				$this->Strength2->setSort("");
				$this->Unit2->setSort("");
				$this->Generic_Name3->setSort("");
				$this->Strength3->setSort("");
				$this->Unit3->setSort("");
				$this->Generic_Name4->setSort("");
				$this->Generic_Name5->setSort("");
				$this->Strength4->setSort("");
				$this->Strength5->setSort("");
				$this->Unit4->setSort("");
				$this->Unit5->setSort("");
				$this->AlterNative1->setSort("");
				$this->AlterNative2->setSort("");
				$this->AlterNative3->setSort("");
				$this->AlterNative4->setSort("");
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

		// "detail_pres_trade_combination_names_new"
		$item = &$this->ListOptions->add("detail_pres_trade_combination_names_new");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'pres_trade_combination_names_new') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["pres_trade_combination_names_new_grid"]))
			$GLOBALS["pres_trade_combination_names_new_grid"] = new pres_trade_combination_names_new_grid();

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
		$pages->add("pres_trade_combination_names_new");
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

		// "detail_pres_trade_combination_names_new"
		$opt = &$this->ListOptions->Items["detail_pres_trade_combination_names_new"];
		if ($Security->allowList(CurrentProjectID() . 'pres_trade_combination_names_new')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("pres_trade_combination_names_new", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("pres_trade_combination_names_newlist.php?" . TABLE_SHOW_MASTER . "=pres_tradenames_new&fk_ID=" . urlencode(strval($this->ID->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "pres_trade_combination_names_new";
			}
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "pres_trade_combination_names_new";
			}
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "pres_trade_combination_names_new";
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->ID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
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
		$item = &$option->add("detailadd_pres_trade_combination_names_new");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["pres_trade_combination_names_new"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["pres_trade_combination_names_new"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'pres_trade_combination_names_new') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "pres_trade_combination_names_new";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpres_tradenames_newlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpres_tradenames_newlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fpres_tradenames_newlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpres_tradenames_newlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$sqlwrk = "`tradenames_id`=" . AdjustSql($this->ID->CurrentValue, $this->Dbid) . "";

		// Column "detail_pres_trade_combination_names_new"
		if ($this->DetailPages->Items["pres_trade_combination_names_new"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_pres_trade_combination_names_new"];
			$url = "pres_trade_combination_names_newpreview.php?t=pres_tradenames_new&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"pres_trade_combination_names_new\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$label = $Language->TablePhrase("pres_trade_combination_names_new", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"pres_trade_combination_names_new\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("pres_trade_combination_names_newlist.php?" . TABLE_SHOW_MASTER . "=pres_tradenames_new&fk_ID=" . urlencode(strval($this->ID->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("pres_trade_combination_names_new", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["pres_trade_combination_names_new_grid"]))
				$GLOBALS["pres_trade_combination_names_new_grid"] = new pres_trade_combination_names_new_grid();
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'pres_trade_combination_names_new')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=pres_trade_combination_names_new");
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
		// ID

		if (!$this->isAddOrEdit())
			$this->ID->AdvancedSearch->setSearchValue(Get("x_ID", Get("ID", "")));
		if ($this->ID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ID->AdvancedSearch->setSearchOperator(Get("z_ID", ""));

		// Drug_Name
		if (!$this->isAddOrEdit())
			$this->Drug_Name->AdvancedSearch->setSearchValue(Get("x_Drug_Name", Get("Drug_Name", "")));
		if ($this->Drug_Name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Drug_Name->AdvancedSearch->setSearchOperator(Get("z_Drug_Name", ""));

		// Generic_Name
		if (!$this->isAddOrEdit())
			$this->Generic_Name->AdvancedSearch->setSearchValue(Get("x_Generic_Name", Get("Generic_Name", "")));
		if ($this->Generic_Name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name->AdvancedSearch->setSearchOperator(Get("z_Generic_Name", ""));

		// Trade_Name
		if (!$this->isAddOrEdit())
			$this->Trade_Name->AdvancedSearch->setSearchValue(Get("x_Trade_Name", Get("Trade_Name", "")));
		if ($this->Trade_Name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Trade_Name->AdvancedSearch->setSearchOperator(Get("z_Trade_Name", ""));

		// PR_CODE
		if (!$this->isAddOrEdit())
			$this->PR_CODE->AdvancedSearch->setSearchValue(Get("x_PR_CODE", Get("PR_CODE", "")));
		if ($this->PR_CODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PR_CODE->AdvancedSearch->setSearchOperator(Get("z_PR_CODE", ""));

		// Form
		if (!$this->isAddOrEdit())
			$this->Form->AdvancedSearch->setSearchValue(Get("x_Form", Get("Form", "")));
		if ($this->Form->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Form->AdvancedSearch->setSearchOperator(Get("z_Form", ""));

		// Strength
		if (!$this->isAddOrEdit())
			$this->Strength->AdvancedSearch->setSearchValue(Get("x_Strength", Get("Strength", "")));
		if ($this->Strength->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength->AdvancedSearch->setSearchOperator(Get("z_Strength", ""));

		// Unit
		if (!$this->isAddOrEdit())
			$this->Unit->AdvancedSearch->setSearchValue(Get("x_Unit", Get("Unit", "")));
		if ($this->Unit->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit->AdvancedSearch->setSearchOperator(Get("z_Unit", ""));

		// CONTAINER_TYPE
		if (!$this->isAddOrEdit())
			$this->CONTAINER_TYPE->AdvancedSearch->setSearchValue(Get("x_CONTAINER_TYPE", Get("CONTAINER_TYPE", "")));
		if ($this->CONTAINER_TYPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CONTAINER_TYPE->AdvancedSearch->setSearchOperator(Get("z_CONTAINER_TYPE", ""));

		// CONTAINER_STRENGTH
		if (!$this->isAddOrEdit())
			$this->CONTAINER_STRENGTH->AdvancedSearch->setSearchValue(Get("x_CONTAINER_STRENGTH", Get("CONTAINER_STRENGTH", "")));
		if ($this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CONTAINER_STRENGTH->AdvancedSearch->setSearchOperator(Get("z_CONTAINER_STRENGTH", ""));

		// TypeOfDrug
		if (!$this->isAddOrEdit())
			$this->TypeOfDrug->AdvancedSearch->setSearchValue(Get("x_TypeOfDrug", Get("TypeOfDrug", "")));
		if ($this->TypeOfDrug->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TypeOfDrug->AdvancedSearch->setSearchOperator(Get("z_TypeOfDrug", ""));

		// ProductType
		if (!$this->isAddOrEdit())
			$this->ProductType->AdvancedSearch->setSearchValue(Get("x_ProductType", Get("ProductType", "")));
		if ($this->ProductType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ProductType->AdvancedSearch->setSearchOperator(Get("z_ProductType", ""));

		// Generic_Name1
		if (!$this->isAddOrEdit())
			$this->Generic_Name1->AdvancedSearch->setSearchValue(Get("x_Generic_Name1", Get("Generic_Name1", "")));
		if ($this->Generic_Name1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name1->AdvancedSearch->setSearchOperator(Get("z_Generic_Name1", ""));

		// Strength1
		if (!$this->isAddOrEdit())
			$this->Strength1->AdvancedSearch->setSearchValue(Get("x_Strength1", Get("Strength1", "")));
		if ($this->Strength1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength1->AdvancedSearch->setSearchOperator(Get("z_Strength1", ""));

		// Unit1
		if (!$this->isAddOrEdit())
			$this->Unit1->AdvancedSearch->setSearchValue(Get("x_Unit1", Get("Unit1", "")));
		if ($this->Unit1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit1->AdvancedSearch->setSearchOperator(Get("z_Unit1", ""));

		// Generic_Name2
		if (!$this->isAddOrEdit())
			$this->Generic_Name2->AdvancedSearch->setSearchValue(Get("x_Generic_Name2", Get("Generic_Name2", "")));
		if ($this->Generic_Name2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name2->AdvancedSearch->setSearchOperator(Get("z_Generic_Name2", ""));

		// Strength2
		if (!$this->isAddOrEdit())
			$this->Strength2->AdvancedSearch->setSearchValue(Get("x_Strength2", Get("Strength2", "")));
		if ($this->Strength2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength2->AdvancedSearch->setSearchOperator(Get("z_Strength2", ""));

		// Unit2
		if (!$this->isAddOrEdit())
			$this->Unit2->AdvancedSearch->setSearchValue(Get("x_Unit2", Get("Unit2", "")));
		if ($this->Unit2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit2->AdvancedSearch->setSearchOperator(Get("z_Unit2", ""));

		// Generic_Name3
		if (!$this->isAddOrEdit())
			$this->Generic_Name3->AdvancedSearch->setSearchValue(Get("x_Generic_Name3", Get("Generic_Name3", "")));
		if ($this->Generic_Name3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name3->AdvancedSearch->setSearchOperator(Get("z_Generic_Name3", ""));

		// Strength3
		if (!$this->isAddOrEdit())
			$this->Strength3->AdvancedSearch->setSearchValue(Get("x_Strength3", Get("Strength3", "")));
		if ($this->Strength3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength3->AdvancedSearch->setSearchOperator(Get("z_Strength3", ""));

		// Unit3
		if (!$this->isAddOrEdit())
			$this->Unit3->AdvancedSearch->setSearchValue(Get("x_Unit3", Get("Unit3", "")));
		if ($this->Unit3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit3->AdvancedSearch->setSearchOperator(Get("z_Unit3", ""));

		// Generic_Name4
		if (!$this->isAddOrEdit())
			$this->Generic_Name4->AdvancedSearch->setSearchValue(Get("x_Generic_Name4", Get("Generic_Name4", "")));
		if ($this->Generic_Name4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name4->AdvancedSearch->setSearchOperator(Get("z_Generic_Name4", ""));

		// Generic_Name5
		if (!$this->isAddOrEdit())
			$this->Generic_Name5->AdvancedSearch->setSearchValue(Get("x_Generic_Name5", Get("Generic_Name5", "")));
		if ($this->Generic_Name5->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Generic_Name5->AdvancedSearch->setSearchOperator(Get("z_Generic_Name5", ""));

		// Strength4
		if (!$this->isAddOrEdit())
			$this->Strength4->AdvancedSearch->setSearchValue(Get("x_Strength4", Get("Strength4", "")));
		if ($this->Strength4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength4->AdvancedSearch->setSearchOperator(Get("z_Strength4", ""));

		// Strength5
		if (!$this->isAddOrEdit())
			$this->Strength5->AdvancedSearch->setSearchValue(Get("x_Strength5", Get("Strength5", "")));
		if ($this->Strength5->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Strength5->AdvancedSearch->setSearchOperator(Get("z_Strength5", ""));

		// Unit4
		if (!$this->isAddOrEdit())
			$this->Unit4->AdvancedSearch->setSearchValue(Get("x_Unit4", Get("Unit4", "")));
		if ($this->Unit4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit4->AdvancedSearch->setSearchOperator(Get("z_Unit4", ""));

		// Unit5
		if (!$this->isAddOrEdit())
			$this->Unit5->AdvancedSearch->setSearchValue(Get("x_Unit5", Get("Unit5", "")));
		if ($this->Unit5->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Unit5->AdvancedSearch->setSearchOperator(Get("z_Unit5", ""));

		// AlterNative1
		if (!$this->isAddOrEdit())
			$this->AlterNative1->AdvancedSearch->setSearchValue(Get("x_AlterNative1", Get("AlterNative1", "")));
		if ($this->AlterNative1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AlterNative1->AdvancedSearch->setSearchOperator(Get("z_AlterNative1", ""));

		// AlterNative2
		if (!$this->isAddOrEdit())
			$this->AlterNative2->AdvancedSearch->setSearchValue(Get("x_AlterNative2", Get("AlterNative2", "")));
		if ($this->AlterNative2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AlterNative2->AdvancedSearch->setSearchOperator(Get("z_AlterNative2", ""));

		// AlterNative3
		if (!$this->isAddOrEdit())
			$this->AlterNative3->AdvancedSearch->setSearchValue(Get("x_AlterNative3", Get("AlterNative3", "")));
		if ($this->AlterNative3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AlterNative3->AdvancedSearch->setSearchOperator(Get("z_AlterNative3", ""));

		// AlterNative4
		if (!$this->isAddOrEdit())
			$this->AlterNative4->AdvancedSearch->setSearchValue(Get("x_AlterNative4", Get("AlterNative4", "")));
		if ($this->AlterNative4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AlterNative4->AdvancedSearch->setSearchOperator(Get("z_AlterNative4", ""));
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
		$this->ID->setDbValue($row['ID']);
		$this->Drug_Name->setDbValue($row['Drug_Name']);
		$this->Generic_Name->setDbValue($row['Generic_Name']);
		$this->Trade_Name->setDbValue($row['Trade_Name']);
		$this->PR_CODE->setDbValue($row['PR_CODE']);
		$this->Form->setDbValue($row['Form']);
		$this->Strength->setDbValue($row['Strength']);
		$this->Unit->setDbValue($row['Unit']);
		$this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
		$this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
		$this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
		$this->ProductType->setDbValue($row['ProductType']);
		$this->Generic_Name1->setDbValue($row['Generic_Name1']);
		$this->Strength1->setDbValue($row['Strength1']);
		$this->Unit1->setDbValue($row['Unit1']);
		$this->Generic_Name2->setDbValue($row['Generic_Name2']);
		$this->Strength2->setDbValue($row['Strength2']);
		$this->Unit2->setDbValue($row['Unit2']);
		$this->Generic_Name3->setDbValue($row['Generic_Name3']);
		$this->Strength3->setDbValue($row['Strength3']);
		$this->Unit3->setDbValue($row['Unit3']);
		$this->Generic_Name4->setDbValue($row['Generic_Name4']);
		$this->Generic_Name5->setDbValue($row['Generic_Name5']);
		$this->Strength4->setDbValue($row['Strength4']);
		$this->Strength5->setDbValue($row['Strength5']);
		$this->Unit4->setDbValue($row['Unit4']);
		$this->Unit5->setDbValue($row['Unit5']);
		$this->AlterNative1->setDbValue($row['AlterNative1']);
		$this->AlterNative2->setDbValue($row['AlterNative2']);
		$this->AlterNative3->setDbValue($row['AlterNative3']);
		$this->AlterNative4->setDbValue($row['AlterNative4']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['ID'] = NULL;
		$row['Drug_Name'] = NULL;
		$row['Generic_Name'] = NULL;
		$row['Trade_Name'] = NULL;
		$row['PR_CODE'] = NULL;
		$row['Form'] = NULL;
		$row['Strength'] = NULL;
		$row['Unit'] = NULL;
		$row['CONTAINER_TYPE'] = NULL;
		$row['CONTAINER_STRENGTH'] = NULL;
		$row['TypeOfDrug'] = NULL;
		$row['ProductType'] = NULL;
		$row['Generic_Name1'] = NULL;
		$row['Strength1'] = NULL;
		$row['Unit1'] = NULL;
		$row['Generic_Name2'] = NULL;
		$row['Strength2'] = NULL;
		$row['Unit2'] = NULL;
		$row['Generic_Name3'] = NULL;
		$row['Strength3'] = NULL;
		$row['Unit3'] = NULL;
		$row['Generic_Name4'] = NULL;
		$row['Generic_Name5'] = NULL;
		$row['Strength4'] = NULL;
		$row['Strength5'] = NULL;
		$row['Unit4'] = NULL;
		$row['Unit5'] = NULL;
		$row['AlterNative1'] = NULL;
		$row['AlterNative2'] = NULL;
		$row['AlterNative3'] = NULL;
		$row['AlterNative4'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("ID")) <> "")
			$this->ID->CurrentValue = $this->getKey("ID"); // ID
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
		// ID
		// Drug_Name
		// Generic_Name
		// Trade_Name
		// PR_CODE
		// Form
		// Strength
		// Unit
		// CONTAINER_TYPE
		// CONTAINER_STRENGTH
		// TypeOfDrug
		// ProductType
		// Generic_Name1
		// Strength1
		// Unit1
		// Generic_Name2
		// Strength2
		// Unit2
		// Generic_Name3
		// Strength3
		// Unit3
		// Generic_Name4
		// Generic_Name5
		// Strength4
		// Strength5
		// Unit4
		// Unit5
		// AlterNative1
		// AlterNative2
		// AlterNative3
		// AlterNative4

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ID
			$this->ID->ViewValue = $this->ID->CurrentValue;
			$this->ID->ViewCustomAttributes = "";

			// Drug_Name
			$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
			$this->Drug_Name->ViewCustomAttributes = "";

			// Generic_Name
			$curVal = strval($this->Generic_Name->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
				if ($this->Generic_Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name->ViewValue = NULL;
			}
			$this->Generic_Name->ViewCustomAttributes = "";

			// Trade_Name
			$this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
			$this->Trade_Name->ViewCustomAttributes = "";

			// PR_CODE
			$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
			$this->PR_CODE->ViewCustomAttributes = "";

			// Form
			$curVal = strval($this->Form->CurrentValue);
			if ($curVal <> "") {
				$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
				if ($this->Form->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Form->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Form->ViewValue = $this->Form->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Form->ViewValue = $this->Form->CurrentValue;
					}
				}
			} else {
				$this->Form->ViewValue = NULL;
			}
			$this->Form->ViewCustomAttributes = "";

			// Strength
			$this->Strength->ViewValue = $this->Strength->CurrentValue;
			$this->Strength->ViewCustomAttributes = "";

			// Unit
			$curVal = strval($this->Unit->CurrentValue);
			if ($curVal <> "") {
				$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
				if ($this->Unit->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit->ViewValue = $this->Unit->CurrentValue;
					}
				}
			} else {
				$this->Unit->ViewValue = NULL;
			}
			$this->Unit->ViewCustomAttributes = "";

			// TypeOfDrug
			if (strval($this->TypeOfDrug->CurrentValue) <> "") {
				$this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
			} else {
				$this->TypeOfDrug->ViewValue = NULL;
			}
			$this->TypeOfDrug->ViewCustomAttributes = "";

			// ProductType
			if (strval($this->ProductType->CurrentValue) <> "") {
				$this->ProductType->ViewValue = $this->ProductType->optionCaption($this->ProductType->CurrentValue);
			} else {
				$this->ProductType->ViewValue = NULL;
			}
			$this->ProductType->ViewCustomAttributes = "";

			// Generic_Name1
			$curVal = strval($this->Generic_Name1->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
				if ($this->Generic_Name1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name1->ViewValue = NULL;
			}
			$this->Generic_Name1->ViewCustomAttributes = "";

			// Strength1
			$this->Strength1->ViewValue = $this->Strength1->CurrentValue;
			$this->Strength1->ViewCustomAttributes = "";

			// Unit1
			$curVal = strval($this->Unit1->CurrentValue);
			if ($curVal <> "") {
				$this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
				if ($this->Unit1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit1->ViewValue = $this->Unit1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit1->ViewValue = $this->Unit1->CurrentValue;
					}
				}
			} else {
				$this->Unit1->ViewValue = NULL;
			}
			$this->Unit1->ViewCustomAttributes = "";

			// Generic_Name2
			$curVal = strval($this->Generic_Name2->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
				if ($this->Generic_Name2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name2->ViewValue = NULL;
			}
			$this->Generic_Name2->ViewCustomAttributes = "";

			// Strength2
			$this->Strength2->ViewValue = $this->Strength2->CurrentValue;
			$this->Strength2->ViewCustomAttributes = "";

			// Unit2
			$curVal = strval($this->Unit2->CurrentValue);
			if ($curVal <> "") {
				$this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
				if ($this->Unit2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit2->ViewValue = $this->Unit2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit2->ViewValue = $this->Unit2->CurrentValue;
					}
				}
			} else {
				$this->Unit2->ViewValue = NULL;
			}
			$this->Unit2->ViewCustomAttributes = "";

			// Generic_Name3
			$curVal = strval($this->Generic_Name3->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
				if ($this->Generic_Name3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name3->ViewValue = NULL;
			}
			$this->Generic_Name3->ViewCustomAttributes = "";

			// Strength3
			$this->Strength3->ViewValue = $this->Strength3->CurrentValue;
			$this->Strength3->ViewCustomAttributes = "";

			// Unit3
			$curVal = strval($this->Unit3->CurrentValue);
			if ($curVal <> "") {
				$this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
				if ($this->Unit3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit3->ViewValue = $this->Unit3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit3->ViewValue = $this->Unit3->CurrentValue;
					}
				}
			} else {
				$this->Unit3->ViewValue = NULL;
			}
			$this->Unit3->ViewCustomAttributes = "";

			// Generic_Name4
			$curVal = strval($this->Generic_Name4->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
				if ($this->Generic_Name4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name4->ViewValue = NULL;
			}
			$this->Generic_Name4->ViewCustomAttributes = "";

			// Generic_Name5
			$curVal = strval($this->Generic_Name5->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
				if ($this->Generic_Name5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name5->ViewValue = NULL;
			}
			$this->Generic_Name5->ViewCustomAttributes = "";

			// Strength4
			$this->Strength4->ViewValue = $this->Strength4->CurrentValue;
			$this->Strength4->ViewCustomAttributes = "";

			// Strength5
			$this->Strength5->ViewValue = $this->Strength5->CurrentValue;
			$this->Strength5->ViewCustomAttributes = "";

			// Unit4
			$curVal = strval($this->Unit4->CurrentValue);
			if ($curVal <> "") {
				$this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
				if ($this->Unit4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit4->ViewValue = $this->Unit4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit4->ViewValue = $this->Unit4->CurrentValue;
					}
				}
			} else {
				$this->Unit4->ViewValue = NULL;
			}
			$this->Unit4->ViewCustomAttributes = "";

			// Unit5
			$curVal = strval($this->Unit5->CurrentValue);
			if ($curVal <> "") {
				$this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
				if ($this->Unit5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit5->ViewValue = $this->Unit5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit5->ViewValue = $this->Unit5->CurrentValue;
					}
				}
			} else {
				$this->Unit5->ViewValue = NULL;
			}
			$this->Unit5->ViewCustomAttributes = "";

			// AlterNative1
			$curVal = strval($this->AlterNative1->CurrentValue);
			if ($curVal <> "") {
				$this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
				if ($this->AlterNative1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
					}
				}
			} else {
				$this->AlterNative1->ViewValue = NULL;
			}
			$this->AlterNative1->ViewCustomAttributes = "";

			// AlterNative2
			$curVal = strval($this->AlterNative2->CurrentValue);
			if ($curVal <> "") {
				$this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
				if ($this->AlterNative2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
					}
				}
			} else {
				$this->AlterNative2->ViewValue = NULL;
			}
			$this->AlterNative2->ViewCustomAttributes = "";

			// AlterNative3
			$curVal = strval($this->AlterNative3->CurrentValue);
			if ($curVal <> "") {
				$this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
				if ($this->AlterNative3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
					}
				}
			} else {
				$this->AlterNative3->ViewValue = NULL;
			}
			$this->AlterNative3->ViewCustomAttributes = "";

			// AlterNative4
			$curVal = strval($this->AlterNative4->CurrentValue);
			if ($curVal <> "") {
				$this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
				if ($this->AlterNative4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
					}
				}
			} else {
				$this->AlterNative4->ViewValue = NULL;
			}
			$this->AlterNative4->ViewCustomAttributes = "";

			// ID
			$this->ID->LinkCustomAttributes = "";
			$this->ID->HrefValue = "";
			$this->ID->TooltipValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";
			$this->Drug_Name->TooltipValue = "";

			// Generic_Name
			$this->Generic_Name->LinkCustomAttributes = "";
			$this->Generic_Name->HrefValue = "";
			$this->Generic_Name->TooltipValue = "";

			// Trade_Name
			$this->Trade_Name->LinkCustomAttributes = "";
			$this->Trade_Name->HrefValue = "";
			$this->Trade_Name->TooltipValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";
			$this->PR_CODE->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";
			$this->Strength->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// TypeOfDrug
			$this->TypeOfDrug->LinkCustomAttributes = "";
			$this->TypeOfDrug->HrefValue = "";
			$this->TypeOfDrug->TooltipValue = "";

			// ProductType
			$this->ProductType->LinkCustomAttributes = "";
			$this->ProductType->HrefValue = "";
			$this->ProductType->TooltipValue = "";

			// Generic_Name1
			$this->Generic_Name1->LinkCustomAttributes = "";
			$this->Generic_Name1->HrefValue = "";
			$this->Generic_Name1->TooltipValue = "";

			// Strength1
			$this->Strength1->LinkCustomAttributes = "";
			$this->Strength1->HrefValue = "";
			$this->Strength1->TooltipValue = "";

			// Unit1
			$this->Unit1->LinkCustomAttributes = "";
			$this->Unit1->HrefValue = "";
			$this->Unit1->TooltipValue = "";

			// Generic_Name2
			$this->Generic_Name2->LinkCustomAttributes = "";
			$this->Generic_Name2->HrefValue = "";
			$this->Generic_Name2->TooltipValue = "";

			// Strength2
			$this->Strength2->LinkCustomAttributes = "";
			$this->Strength2->HrefValue = "";
			$this->Strength2->TooltipValue = "";

			// Unit2
			$this->Unit2->LinkCustomAttributes = "";
			$this->Unit2->HrefValue = "";
			$this->Unit2->TooltipValue = "";

			// Generic_Name3
			$this->Generic_Name3->LinkCustomAttributes = "";
			$this->Generic_Name3->HrefValue = "";
			$this->Generic_Name3->TooltipValue = "";

			// Strength3
			$this->Strength3->LinkCustomAttributes = "";
			$this->Strength3->HrefValue = "";
			$this->Strength3->TooltipValue = "";

			// Unit3
			$this->Unit3->LinkCustomAttributes = "";
			$this->Unit3->HrefValue = "";
			$this->Unit3->TooltipValue = "";

			// Generic_Name4
			$this->Generic_Name4->LinkCustomAttributes = "";
			$this->Generic_Name4->HrefValue = "";
			$this->Generic_Name4->TooltipValue = "";

			// Generic_Name5
			$this->Generic_Name5->LinkCustomAttributes = "";
			$this->Generic_Name5->HrefValue = "";
			$this->Generic_Name5->TooltipValue = "";

			// Strength4
			$this->Strength4->LinkCustomAttributes = "";
			$this->Strength4->HrefValue = "";
			$this->Strength4->TooltipValue = "";

			// Strength5
			$this->Strength5->LinkCustomAttributes = "";
			$this->Strength5->HrefValue = "";
			$this->Strength5->TooltipValue = "";

			// Unit4
			$this->Unit4->LinkCustomAttributes = "";
			$this->Unit4->HrefValue = "";
			$this->Unit4->TooltipValue = "";

			// Unit5
			$this->Unit5->LinkCustomAttributes = "";
			$this->Unit5->HrefValue = "";
			$this->Unit5->TooltipValue = "";

			// AlterNative1
			$this->AlterNative1->LinkCustomAttributes = "";
			$this->AlterNative1->HrefValue = "";
			$this->AlterNative1->TooltipValue = "";

			// AlterNative2
			$this->AlterNative2->LinkCustomAttributes = "";
			$this->AlterNative2->HrefValue = "";
			$this->AlterNative2->TooltipValue = "";

			// AlterNative3
			$this->AlterNative3->LinkCustomAttributes = "";
			$this->AlterNative3->HrefValue = "";
			$this->AlterNative3->TooltipValue = "";

			// AlterNative4
			$this->AlterNative4->LinkCustomAttributes = "";
			$this->AlterNative4->HrefValue = "";
			$this->AlterNative4->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// ID
			$this->ID->EditAttrs["class"] = "form-control";
			$this->ID->EditCustomAttributes = "";
			$this->ID->EditValue = HtmlEncode($this->ID->AdvancedSearch->SearchValue);
			$this->ID->PlaceHolder = RemoveHtml($this->ID->caption());

			// Drug_Name
			$this->Drug_Name->EditAttrs["class"] = "form-control";
			$this->Drug_Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Drug_Name->AdvancedSearch->SearchValue = HtmlDecode($this->Drug_Name->AdvancedSearch->SearchValue);
			$this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->AdvancedSearch->SearchValue);
			$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

			// Generic_Name
			$this->Generic_Name->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Generic_Name->AdvancedSearch->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
			else
				$this->Generic_Name->AdvancedSearch->ViewValue = $this->Generic_Name->Lookup !== NULL && is_array($this->Generic_Name->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
				if ($this->Generic_Name->AdvancedSearch->ViewValue == "")
					$this->Generic_Name->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name->AdvancedSearch->ViewValue = $this->Generic_Name->displayValue($arwrk);
				} else {
					$this->Generic_Name->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Generic_Name->EditValue = $arwrk;
			}

			// Trade_Name
			$this->Trade_Name->EditAttrs["class"] = "form-control";
			$this->Trade_Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Trade_Name->AdvancedSearch->SearchValue = HtmlDecode($this->Trade_Name->AdvancedSearch->SearchValue);
			$this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->AdvancedSearch->SearchValue);
			$this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

			// PR_CODE
			$this->PR_CODE->EditAttrs["class"] = "form-control";
			$this->PR_CODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR_CODE->AdvancedSearch->SearchValue = HtmlDecode($this->PR_CODE->AdvancedSearch->SearchValue);
			$this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->AdvancedSearch->SearchValue);
			$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

			// Form
			$this->Form->EditAttrs["class"] = "form-control";
			$this->Form->EditCustomAttributes = "";

			// Strength
			$this->Strength->EditAttrs["class"] = "form-control";
			$this->Strength->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength->AdvancedSearch->SearchValue = HtmlDecode($this->Strength->AdvancedSearch->SearchValue);
			$this->Strength->EditValue = HtmlEncode($this->Strength->AdvancedSearch->SearchValue);
			$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";

			// TypeOfDrug
			$this->TypeOfDrug->EditAttrs["class"] = "form-control";
			$this->TypeOfDrug->EditCustomAttributes = "";
			$this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(TRUE);

			// ProductType
			$this->ProductType->EditAttrs["class"] = "form-control";
			$this->ProductType->EditCustomAttributes = "";
			$this->ProductType->EditValue = $this->ProductType->options(TRUE);

			// Generic_Name1
			$this->Generic_Name1->EditAttrs["class"] = "form-control";
			$this->Generic_Name1->EditCustomAttributes = "";

			// Strength1
			$this->Strength1->EditAttrs["class"] = "form-control";
			$this->Strength1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength1->AdvancedSearch->SearchValue = HtmlDecode($this->Strength1->AdvancedSearch->SearchValue);
			$this->Strength1->EditValue = HtmlEncode($this->Strength1->AdvancedSearch->SearchValue);
			$this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

			// Unit1
			$this->Unit1->EditAttrs["class"] = "form-control";
			$this->Unit1->EditCustomAttributes = "";

			// Generic_Name2
			$this->Generic_Name2->EditAttrs["class"] = "form-control";
			$this->Generic_Name2->EditCustomAttributes = "";

			// Strength2
			$this->Strength2->EditAttrs["class"] = "form-control";
			$this->Strength2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength2->AdvancedSearch->SearchValue = HtmlDecode($this->Strength2->AdvancedSearch->SearchValue);
			$this->Strength2->EditValue = HtmlEncode($this->Strength2->AdvancedSearch->SearchValue);
			$this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

			// Unit2
			$this->Unit2->EditAttrs["class"] = "form-control";
			$this->Unit2->EditCustomAttributes = "";

			// Generic_Name3
			$this->Generic_Name3->EditAttrs["class"] = "form-control";
			$this->Generic_Name3->EditCustomAttributes = "";

			// Strength3
			$this->Strength3->EditAttrs["class"] = "form-control";
			$this->Strength3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength3->AdvancedSearch->SearchValue = HtmlDecode($this->Strength3->AdvancedSearch->SearchValue);
			$this->Strength3->EditValue = HtmlEncode($this->Strength3->AdvancedSearch->SearchValue);
			$this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

			// Unit3
			$this->Unit3->EditAttrs["class"] = "form-control";
			$this->Unit3->EditCustomAttributes = "";

			// Generic_Name4
			$this->Generic_Name4->EditAttrs["class"] = "form-control";
			$this->Generic_Name4->EditCustomAttributes = "";

			// Generic_Name5
			$this->Generic_Name5->EditAttrs["class"] = "form-control";
			$this->Generic_Name5->EditCustomAttributes = "";

			// Strength4
			$this->Strength4->EditAttrs["class"] = "form-control";
			$this->Strength4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength4->AdvancedSearch->SearchValue = HtmlDecode($this->Strength4->AdvancedSearch->SearchValue);
			$this->Strength4->EditValue = HtmlEncode($this->Strength4->AdvancedSearch->SearchValue);
			$this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

			// Strength5
			$this->Strength5->EditAttrs["class"] = "form-control";
			$this->Strength5->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength5->AdvancedSearch->SearchValue = HtmlDecode($this->Strength5->AdvancedSearch->SearchValue);
			$this->Strength5->EditValue = HtmlEncode($this->Strength5->AdvancedSearch->SearchValue);
			$this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

			// Unit4
			$this->Unit4->EditAttrs["class"] = "form-control";
			$this->Unit4->EditCustomAttributes = "";

			// Unit5
			$this->Unit5->EditAttrs["class"] = "form-control";
			$this->Unit5->EditCustomAttributes = "";

			// AlterNative1
			$this->AlterNative1->EditAttrs["class"] = "form-control";
			$this->AlterNative1->EditCustomAttributes = "";

			// AlterNative2
			$this->AlterNative2->EditAttrs["class"] = "form-control";
			$this->AlterNative2->EditCustomAttributes = "";

			// AlterNative3
			$this->AlterNative3->EditAttrs["class"] = "form-control";
			$this->AlterNative3->EditCustomAttributes = "";

			// AlterNative4
			$this->AlterNative4->EditAttrs["class"] = "form-control";
			$this->AlterNative4->EditCustomAttributes = "";
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
		$this->ID->AdvancedSearch->load();
		$this->Drug_Name->AdvancedSearch->load();
		$this->Generic_Name->AdvancedSearch->load();
		$this->Trade_Name->AdvancedSearch->load();
		$this->PR_CODE->AdvancedSearch->load();
		$this->Form->AdvancedSearch->load();
		$this->Strength->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->CONTAINER_TYPE->AdvancedSearch->load();
		$this->CONTAINER_STRENGTH->AdvancedSearch->load();
		$this->TypeOfDrug->AdvancedSearch->load();
		$this->ProductType->AdvancedSearch->load();
		$this->Generic_Name1->AdvancedSearch->load();
		$this->Strength1->AdvancedSearch->load();
		$this->Unit1->AdvancedSearch->load();
		$this->Generic_Name2->AdvancedSearch->load();
		$this->Strength2->AdvancedSearch->load();
		$this->Unit2->AdvancedSearch->load();
		$this->Generic_Name3->AdvancedSearch->load();
		$this->Strength3->AdvancedSearch->load();
		$this->Unit3->AdvancedSearch->load();
		$this->Generic_Name4->AdvancedSearch->load();
		$this->Generic_Name5->AdvancedSearch->load();
		$this->Strength4->AdvancedSearch->load();
		$this->Strength5->AdvancedSearch->load();
		$this->Unit4->AdvancedSearch->load();
		$this->Unit5->AdvancedSearch->load();
		$this->AlterNative1->AdvancedSearch->load();
		$this->AlterNative2->AdvancedSearch->load();
		$this->AlterNative3->AdvancedSearch->load();
		$this->AlterNative4->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpres_tradenames_newlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpres_tradenames_newlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpres_tradenames_newlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_pres_tradenames_new\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_pres_tradenames_new',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpres_tradenames_newlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_Generic_Name":
							break;
						case "x_Form":
							break;
						case "x_Unit":
							break;
						case "x_Generic_Name1":
							break;
						case "x_Unit1":
							break;
						case "x_Generic_Name2":
							break;
						case "x_Unit2":
							break;
						case "x_Generic_Name3":
							break;
						case "x_Unit3":
							break;
						case "x_Generic_Name4":
							break;
						case "x_Generic_Name5":
							break;
						case "x_Unit4":
							break;
						case "x_Unit5":
							break;
						case "x_AlterNative1":
							break;
						case "x_AlterNative2":
							break;
						case "x_AlterNative3":
							break;
						case "x_AlterNative4":
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
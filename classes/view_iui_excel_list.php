<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_iui_excel_list extends view_iui_excel
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_iui_excel';

	// Page object name
	public $PageObjName = "view_iui_excel_list";

	// Grid form hidden field names
	public $FormName = "fview_iui_excellist";
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

		// Table object (view_iui_excel)
		if (!isset($GLOBALS["view_iui_excel"]) || get_class($GLOBALS["view_iui_excel"]) == PROJECT_NAMESPACE . "view_iui_excel") {
			$GLOBALS["view_iui_excel"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_iui_excel"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_iui_exceladd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_iui_exceldelete.php";
		$this->MultiUpdateUrl = "view_iui_excelupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_iui_excel');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_iui_excellistsrch";

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
		global $EXPORT, $view_iui_excel;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_iui_excel);
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
			$key .= @$ar['CoupleID'];
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
		$this->NAME->setVisibility();
		$this->HUSBAND_NAME->setVisibility();
		$this->CoupleID->setVisibility();
		$this->AGE____WIFE->setVisibility();
		$this->AGE__HUSBAND->setVisibility();
		$this->ANXIOUS_TO_CONCEIVE_FOR->setVisibility();
		$this->AMH_28_NG2FML29->setVisibility();
		$this->TUBAL_PATENCY->setVisibility();
		$this->HSG->setVisibility();
		$this->DHL->setVisibility();
		$this->UTERINE_PROBLEMS->setVisibility();
		$this->W_COMORBIDS->setVisibility();
		$this->H_COMORBIDS->setVisibility();
		$this->SEXUAL_DYSFUNCTION->setVisibility();
		$this->PREV_IUI->setVisibility();
		$this->PREV_IVF->setVisibility();
		$this->TABLETS->setVisibility();
		$this->INJTYPE->setVisibility();
		$this->LMP->setVisibility();
		$this->TRIGGERR->setVisibility();
		$this->TRIGGERDATE->setVisibility();
		$this->FOLLICLE_STATUS->setVisibility();
		$this->NUMBER_OF_IUI->setVisibility();
		$this->PROCEDURE->setVisibility();
		$this->LUTEAL_SUPPORT->setVisibility();
		$this->H2FD_SAMPLE->setVisibility();
		$this->DONOR___I_D->setVisibility();
		$this->PREG_TEST_DATE->setVisibility();
		$this->COLLECTION__METHOD->setVisibility();
		$this->SAMPLE_SOURCE->setVisibility();
		$this->SPECIFIC_PROBLEMS->setVisibility();
		$this->IMSC_1->setVisibility();
		$this->IMSC_2->setVisibility();
		$this->LIQUIFACTION_STORAGE->setVisibility();
		$this->IUI_PREP_METHOD->setVisibility();
		$this->TIME_FROM_TRIGGER->setVisibility();
		$this->COLLECTION_TO_PREPARATION->setVisibility();
		$this->TIME_FROM_PREP_TO_INSEM->setVisibility();
		$this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
		$this->RESULTS->setVisibility();
		$this->ONGOING_PREG->setVisibility();
		$this->EDD_Date->setVisibility();
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
			$this->CoupleID->setFormValue($arKeyFlds[0]);
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_iui_excellistsrch");
		$filterList = Concat($filterList, $this->NAME->AdvancedSearch->toJson(), ","); // Field NAME
		$filterList = Concat($filterList, $this->HUSBAND_NAME->AdvancedSearch->toJson(), ","); // Field HUSBAND NAME
		$filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
		$filterList = Concat($filterList, $this->AGE____WIFE->AdvancedSearch->toJson(), ","); // Field AGE  - WIFE
		$filterList = Concat($filterList, $this->AGE__HUSBAND->AdvancedSearch->toJson(), ","); // Field AGE- HUSBAND
		$filterList = Concat($filterList, $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->toJson(), ","); // Field ANXIOUS TO CONCEIVE FOR
		$filterList = Concat($filterList, $this->AMH_28_NG2FML29->AdvancedSearch->toJson(), ","); // Field AMH ( NG/ML)
		$filterList = Concat($filterList, $this->TUBAL_PATENCY->AdvancedSearch->toJson(), ","); // Field TUBAL_PATENCY
		$filterList = Concat($filterList, $this->HSG->AdvancedSearch->toJson(), ","); // Field HSG
		$filterList = Concat($filterList, $this->DHL->AdvancedSearch->toJson(), ","); // Field DHL
		$filterList = Concat($filterList, $this->UTERINE_PROBLEMS->AdvancedSearch->toJson(), ","); // Field UTERINE_PROBLEMS
		$filterList = Concat($filterList, $this->W_COMORBIDS->AdvancedSearch->toJson(), ","); // Field W_COMORBIDS
		$filterList = Concat($filterList, $this->H_COMORBIDS->AdvancedSearch->toJson(), ","); // Field H_COMORBIDS
		$filterList = Concat($filterList, $this->SEXUAL_DYSFUNCTION->AdvancedSearch->toJson(), ","); // Field SEXUAL_DYSFUNCTION
		$filterList = Concat($filterList, $this->PREV_IUI->AdvancedSearch->toJson(), ","); // Field PREV IUI
		$filterList = Concat($filterList, $this->PREV_IVF->AdvancedSearch->toJson(), ","); // Field PREV_IVF
		$filterList = Concat($filterList, $this->TABLETS->AdvancedSearch->toJson(), ","); // Field TABLETS
		$filterList = Concat($filterList, $this->INJTYPE->AdvancedSearch->toJson(), ","); // Field INJTYPE
		$filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
		$filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
		$filterList = Concat($filterList, $this->TRIGGERDATE->AdvancedSearch->toJson(), ","); // Field TRIGGERDATE
		$filterList = Concat($filterList, $this->FOLLICLE_STATUS->AdvancedSearch->toJson(), ","); // Field FOLLICLE_STATUS
		$filterList = Concat($filterList, $this->NUMBER_OF_IUI->AdvancedSearch->toJson(), ","); // Field NUMBER_OF_IUI
		$filterList = Concat($filterList, $this->PROCEDURE->AdvancedSearch->toJson(), ","); // Field PROCEDURE
		$filterList = Concat($filterList, $this->LUTEAL_SUPPORT->AdvancedSearch->toJson(), ","); // Field LUTEAL_SUPPORT
		$filterList = Concat($filterList, $this->H2FD_SAMPLE->AdvancedSearch->toJson(), ","); // Field H/D SAMPLE
		$filterList = Concat($filterList, $this->DONOR___I_D->AdvancedSearch->toJson(), ","); // Field DONOR - I.D
		$filterList = Concat($filterList, $this->PREG_TEST_DATE->AdvancedSearch->toJson(), ","); // Field PREG_TEST_DATE
		$filterList = Concat($filterList, $this->COLLECTION__METHOD->AdvancedSearch->toJson(), ","); // Field COLLECTION  METHOD
		$filterList = Concat($filterList, $this->SAMPLE_SOURCE->AdvancedSearch->toJson(), ","); // Field SAMPLE SOURCE
		$filterList = Concat($filterList, $this->SPECIFIC_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_PROBLEMS
		$filterList = Concat($filterList, $this->IMSC_1->AdvancedSearch->toJson(), ","); // Field IMSC_1
		$filterList = Concat($filterList, $this->IMSC_2->AdvancedSearch->toJson(), ","); // Field IMSC_2
		$filterList = Concat($filterList, $this->LIQUIFACTION_STORAGE->AdvancedSearch->toJson(), ","); // Field LIQUIFACTION_STORAGE
		$filterList = Concat($filterList, $this->IUI_PREP_METHOD->AdvancedSearch->toJson(), ","); // Field IUI_PREP_METHOD
		$filterList = Concat($filterList, $this->TIME_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME_FROM_TRIGGER
		$filterList = Concat($filterList, $this->COLLECTION_TO_PREPARATION->AdvancedSearch->toJson(), ","); // Field COLLECTION_TO_PREPARATION
		$filterList = Concat($filterList, $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->toJson(), ","); // Field TIME_FROM_PREP_TO_INSEM
		$filterList = Concat($filterList, $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_MATERNAL_PROBLEMS
		$filterList = Concat($filterList, $this->RESULTS->AdvancedSearch->toJson(), ","); // Field RESULTS
		$filterList = Concat($filterList, $this->ONGOING_PREG->AdvancedSearch->toJson(), ","); // Field ONGOING_PREG
		$filterList = Concat($filterList, $this->EDD_Date->AdvancedSearch->toJson(), ","); // Field EDD_Date
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_iui_excellistsrch", $filters);
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

		// Field NAME
		$this->NAME->AdvancedSearch->SearchValue = @$filter["x_NAME"];
		$this->NAME->AdvancedSearch->SearchOperator = @$filter["z_NAME"];
		$this->NAME->AdvancedSearch->SearchCondition = @$filter["v_NAME"];
		$this->NAME->AdvancedSearch->SearchValue2 = @$filter["y_NAME"];
		$this->NAME->AdvancedSearch->SearchOperator2 = @$filter["w_NAME"];
		$this->NAME->AdvancedSearch->save();

		// Field HUSBAND NAME
		$this->HUSBAND_NAME->AdvancedSearch->SearchValue = @$filter["x_HUSBAND_NAME"];
		$this->HUSBAND_NAME->AdvancedSearch->SearchOperator = @$filter["z_HUSBAND_NAME"];
		$this->HUSBAND_NAME->AdvancedSearch->SearchCondition = @$filter["v_HUSBAND_NAME"];
		$this->HUSBAND_NAME->AdvancedSearch->SearchValue2 = @$filter["y_HUSBAND_NAME"];
		$this->HUSBAND_NAME->AdvancedSearch->SearchOperator2 = @$filter["w_HUSBAND_NAME"];
		$this->HUSBAND_NAME->AdvancedSearch->save();

		// Field CoupleID
		$this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
		$this->CoupleID->AdvancedSearch->save();

		// Field AGE  - WIFE
		$this->AGE____WIFE->AdvancedSearch->SearchValue = @$filter["x_AGE____WIFE"];
		$this->AGE____WIFE->AdvancedSearch->SearchOperator = @$filter["z_AGE____WIFE"];
		$this->AGE____WIFE->AdvancedSearch->SearchCondition = @$filter["v_AGE____WIFE"];
		$this->AGE____WIFE->AdvancedSearch->SearchValue2 = @$filter["y_AGE____WIFE"];
		$this->AGE____WIFE->AdvancedSearch->SearchOperator2 = @$filter["w_AGE____WIFE"];
		$this->AGE____WIFE->AdvancedSearch->save();

		// Field AGE- HUSBAND
		$this->AGE__HUSBAND->AdvancedSearch->SearchValue = @$filter["x_AGE__HUSBAND"];
		$this->AGE__HUSBAND->AdvancedSearch->SearchOperator = @$filter["z_AGE__HUSBAND"];
		$this->AGE__HUSBAND->AdvancedSearch->SearchCondition = @$filter["v_AGE__HUSBAND"];
		$this->AGE__HUSBAND->AdvancedSearch->SearchValue2 = @$filter["y_AGE__HUSBAND"];
		$this->AGE__HUSBAND->AdvancedSearch->SearchOperator2 = @$filter["w_AGE__HUSBAND"];
		$this->AGE__HUSBAND->AdvancedSearch->save();

		// Field ANXIOUS TO CONCEIVE FOR
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue = @$filter["x_ANXIOUS_TO_CONCEIVE_FOR"];
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchOperator = @$filter["z_ANXIOUS_TO_CONCEIVE_FOR"];
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchCondition = @$filter["v_ANXIOUS_TO_CONCEIVE_FOR"];
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue2 = @$filter["y_ANXIOUS_TO_CONCEIVE_FOR"];
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchOperator2 = @$filter["w_ANXIOUS_TO_CONCEIVE_FOR"];
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->save();

		// Field AMH ( NG/ML)
		$this->AMH_28_NG2FML29->AdvancedSearch->SearchValue = @$filter["x_AMH_28_NG2FML29"];
		$this->AMH_28_NG2FML29->AdvancedSearch->SearchOperator = @$filter["z_AMH_28_NG2FML29"];
		$this->AMH_28_NG2FML29->AdvancedSearch->SearchCondition = @$filter["v_AMH_28_NG2FML29"];
		$this->AMH_28_NG2FML29->AdvancedSearch->SearchValue2 = @$filter["y_AMH_28_NG2FML29"];
		$this->AMH_28_NG2FML29->AdvancedSearch->SearchOperator2 = @$filter["w_AMH_28_NG2FML29"];
		$this->AMH_28_NG2FML29->AdvancedSearch->save();

		// Field TUBAL_PATENCY
		$this->TUBAL_PATENCY->AdvancedSearch->SearchValue = @$filter["x_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchOperator = @$filter["z_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchCondition = @$filter["v_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchValue2 = @$filter["y_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchOperator2 = @$filter["w_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->save();

		// Field HSG
		$this->HSG->AdvancedSearch->SearchValue = @$filter["x_HSG"];
		$this->HSG->AdvancedSearch->SearchOperator = @$filter["z_HSG"];
		$this->HSG->AdvancedSearch->SearchCondition = @$filter["v_HSG"];
		$this->HSG->AdvancedSearch->SearchValue2 = @$filter["y_HSG"];
		$this->HSG->AdvancedSearch->SearchOperator2 = @$filter["w_HSG"];
		$this->HSG->AdvancedSearch->save();

		// Field DHL
		$this->DHL->AdvancedSearch->SearchValue = @$filter["x_DHL"];
		$this->DHL->AdvancedSearch->SearchOperator = @$filter["z_DHL"];
		$this->DHL->AdvancedSearch->SearchCondition = @$filter["v_DHL"];
		$this->DHL->AdvancedSearch->SearchValue2 = @$filter["y_DHL"];
		$this->DHL->AdvancedSearch->SearchOperator2 = @$filter["w_DHL"];
		$this->DHL->AdvancedSearch->save();

		// Field UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->save();

		// Field W_COMORBIDS
		$this->W_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->save();

		// Field H_COMORBIDS
		$this->H_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->save();

		// Field SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = @$filter["x_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator = @$filter["z_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchCondition = @$filter["v_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue2 = @$filter["y_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator2 = @$filter["w_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->save();

		// Field PREV IUI
		$this->PREV_IUI->AdvancedSearch->SearchValue = @$filter["x_PREV_IUI"];
		$this->PREV_IUI->AdvancedSearch->SearchOperator = @$filter["z_PREV_IUI"];
		$this->PREV_IUI->AdvancedSearch->SearchCondition = @$filter["v_PREV_IUI"];
		$this->PREV_IUI->AdvancedSearch->SearchValue2 = @$filter["y_PREV_IUI"];
		$this->PREV_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_PREV_IUI"];
		$this->PREV_IUI->AdvancedSearch->save();

		// Field PREV_IVF
		$this->PREV_IVF->AdvancedSearch->SearchValue = @$filter["x_PREV_IVF"];
		$this->PREV_IVF->AdvancedSearch->SearchOperator = @$filter["z_PREV_IVF"];
		$this->PREV_IVF->AdvancedSearch->SearchCondition = @$filter["v_PREV_IVF"];
		$this->PREV_IVF->AdvancedSearch->SearchValue2 = @$filter["y_PREV_IVF"];
		$this->PREV_IVF->AdvancedSearch->SearchOperator2 = @$filter["w_PREV_IVF"];
		$this->PREV_IVF->AdvancedSearch->save();

		// Field TABLETS
		$this->TABLETS->AdvancedSearch->SearchValue = @$filter["x_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchOperator = @$filter["z_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchCondition = @$filter["v_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchValue2 = @$filter["y_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchOperator2 = @$filter["w_TABLETS"];
		$this->TABLETS->AdvancedSearch->save();

		// Field INJTYPE
		$this->INJTYPE->AdvancedSearch->SearchValue = @$filter["x_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchOperator = @$filter["z_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchCondition = @$filter["v_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchValue2 = @$filter["y_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->save();

		// Field LMP
		$this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
		$this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
		$this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
		$this->LMP->AdvancedSearch->save();

		// Field TRIGGERR
		$this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->save();

		// Field TRIGGERDATE
		$this->TRIGGERDATE->AdvancedSearch->SearchValue = @$filter["x_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->save();

		// Field FOLLICLE_STATUS
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = @$filter["x_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator = @$filter["z_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchCondition = @$filter["v_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue2 = @$filter["y_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->save();

		// Field NUMBER_OF_IUI
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = @$filter["x_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator = @$filter["z_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchCondition = @$filter["v_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue2 = @$filter["y_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->save();

		// Field PROCEDURE
		$this->PROCEDURE->AdvancedSearch->SearchValue = @$filter["x_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchOperator = @$filter["z_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchCondition = @$filter["v_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchValue2 = @$filter["y_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchOperator2 = @$filter["w_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->save();

		// Field LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = @$filter["x_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator = @$filter["z_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchCondition = @$filter["v_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue2 = @$filter["y_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator2 = @$filter["w_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->save();

		// Field H/D SAMPLE
		$this->H2FD_SAMPLE->AdvancedSearch->SearchValue = @$filter["x_H2FD_SAMPLE"];
		$this->H2FD_SAMPLE->AdvancedSearch->SearchOperator = @$filter["z_H2FD_SAMPLE"];
		$this->H2FD_SAMPLE->AdvancedSearch->SearchCondition = @$filter["v_H2FD_SAMPLE"];
		$this->H2FD_SAMPLE->AdvancedSearch->SearchValue2 = @$filter["y_H2FD_SAMPLE"];
		$this->H2FD_SAMPLE->AdvancedSearch->SearchOperator2 = @$filter["w_H2FD_SAMPLE"];
		$this->H2FD_SAMPLE->AdvancedSearch->save();

		// Field DONOR - I.D
		$this->DONOR___I_D->AdvancedSearch->SearchValue = @$filter["x_DONOR___I_D"];
		$this->DONOR___I_D->AdvancedSearch->SearchOperator = @$filter["z_DONOR___I_D"];
		$this->DONOR___I_D->AdvancedSearch->SearchCondition = @$filter["v_DONOR___I_D"];
		$this->DONOR___I_D->AdvancedSearch->SearchValue2 = @$filter["y_DONOR___I_D"];
		$this->DONOR___I_D->AdvancedSearch->SearchOperator2 = @$filter["w_DONOR___I_D"];
		$this->DONOR___I_D->AdvancedSearch->save();

		// Field PREG_TEST_DATE
		$this->PREG_TEST_DATE->AdvancedSearch->SearchValue = @$filter["x_PREG_TEST_DATE"];
		$this->PREG_TEST_DATE->AdvancedSearch->SearchOperator = @$filter["z_PREG_TEST_DATE"];
		$this->PREG_TEST_DATE->AdvancedSearch->SearchCondition = @$filter["v_PREG_TEST_DATE"];
		$this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 = @$filter["y_PREG_TEST_DATE"];
		$this->PREG_TEST_DATE->AdvancedSearch->SearchOperator2 = @$filter["w_PREG_TEST_DATE"];
		$this->PREG_TEST_DATE->AdvancedSearch->save();

		// Field COLLECTION  METHOD
		$this->COLLECTION__METHOD->AdvancedSearch->SearchValue = @$filter["x_COLLECTION__METHOD"];
		$this->COLLECTION__METHOD->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION__METHOD"];
		$this->COLLECTION__METHOD->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION__METHOD"];
		$this->COLLECTION__METHOD->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION__METHOD"];
		$this->COLLECTION__METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION__METHOD"];
		$this->COLLECTION__METHOD->AdvancedSearch->save();

		// Field SAMPLE SOURCE
		$this->SAMPLE_SOURCE->AdvancedSearch->SearchValue = @$filter["x_SAMPLE_SOURCE"];
		$this->SAMPLE_SOURCE->AdvancedSearch->SearchOperator = @$filter["z_SAMPLE_SOURCE"];
		$this->SAMPLE_SOURCE->AdvancedSearch->SearchCondition = @$filter["v_SAMPLE_SOURCE"];
		$this->SAMPLE_SOURCE->AdvancedSearch->SearchValue2 = @$filter["y_SAMPLE_SOURCE"];
		$this->SAMPLE_SOURCE->AdvancedSearch->SearchOperator2 = @$filter["w_SAMPLE_SOURCE"];
		$this->SAMPLE_SOURCE->AdvancedSearch->save();

		// Field SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_PROBLEMS"];
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_PROBLEMS"];
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_PROBLEMS"];
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_PROBLEMS"];
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_PROBLEMS"];
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->save();

		// Field IMSC_1
		$this->IMSC_1->AdvancedSearch->SearchValue = @$filter["x_IMSC_1"];
		$this->IMSC_1->AdvancedSearch->SearchOperator = @$filter["z_IMSC_1"];
		$this->IMSC_1->AdvancedSearch->SearchCondition = @$filter["v_IMSC_1"];
		$this->IMSC_1->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_1"];
		$this->IMSC_1->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_1"];
		$this->IMSC_1->AdvancedSearch->save();

		// Field IMSC_2
		$this->IMSC_2->AdvancedSearch->SearchValue = @$filter["x_IMSC_2"];
		$this->IMSC_2->AdvancedSearch->SearchOperator = @$filter["z_IMSC_2"];
		$this->IMSC_2->AdvancedSearch->SearchCondition = @$filter["v_IMSC_2"];
		$this->IMSC_2->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_2"];
		$this->IMSC_2->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_2"];
		$this->IMSC_2->AdvancedSearch->save();

		// Field LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = @$filter["x_LIQUIFACTION_STORAGE"];
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator = @$filter["z_LIQUIFACTION_STORAGE"];
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchCondition = @$filter["v_LIQUIFACTION_STORAGE"];
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 = @$filter["y_LIQUIFACTION_STORAGE"];
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator2 = @$filter["w_LIQUIFACTION_STORAGE"];
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->save();

		// Field IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = @$filter["x_IUI_PREP_METHOD"];
		$this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator = @$filter["z_IUI_PREP_METHOD"];
		$this->IUI_PREP_METHOD->AdvancedSearch->SearchCondition = @$filter["v_IUI_PREP_METHOD"];
		$this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 = @$filter["y_IUI_PREP_METHOD"];
		$this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_IUI_PREP_METHOD"];
		$this->IUI_PREP_METHOD->AdvancedSearch->save();

		// Field TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_TRIGGER"];
		$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_TRIGGER"];
		$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_TRIGGER"];
		$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_TRIGGER"];
		$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_TRIGGER"];
		$this->TIME_FROM_TRIGGER->AdvancedSearch->save();

		// Field COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = @$filter["x_COLLECTION_TO_PREPARATION"];
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION_TO_PREPARATION"];
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION_TO_PREPARATION"];
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION_TO_PREPARATION"];
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION_TO_PREPARATION"];
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->save();

		// Field TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_PREP_TO_INSEM"];
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_PREP_TO_INSEM"];
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_PREP_TO_INSEM"];
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_PREP_TO_INSEM"];
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_PREP_TO_INSEM"];
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save();

		// Field SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save();

		// Field RESULTS
		$this->RESULTS->AdvancedSearch->SearchValue = @$filter["x_RESULTS"];
		$this->RESULTS->AdvancedSearch->SearchOperator = @$filter["z_RESULTS"];
		$this->RESULTS->AdvancedSearch->SearchCondition = @$filter["v_RESULTS"];
		$this->RESULTS->AdvancedSearch->SearchValue2 = @$filter["y_RESULTS"];
		$this->RESULTS->AdvancedSearch->SearchOperator2 = @$filter["w_RESULTS"];
		$this->RESULTS->AdvancedSearch->save();

		// Field ONGOING_PREG
		$this->ONGOING_PREG->AdvancedSearch->SearchValue = @$filter["x_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchOperator = @$filter["z_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchCondition = @$filter["v_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchValue2 = @$filter["y_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchOperator2 = @$filter["w_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->save();

		// Field EDD_Date
		$this->EDD_Date->AdvancedSearch->SearchValue = @$filter["x_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchOperator = @$filter["z_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchCondition = @$filter["v_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchValue2 = @$filter["y_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchOperator2 = @$filter["w_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->NAME, $default, FALSE); // NAME
		$this->buildSearchSql($where, $this->HUSBAND_NAME, $default, FALSE); // HUSBAND NAME
		$this->buildSearchSql($where, $this->CoupleID, $default, FALSE); // CoupleID
		$this->buildSearchSql($where, $this->AGE____WIFE, $default, FALSE); // AGE  - WIFE
		$this->buildSearchSql($where, $this->AGE__HUSBAND, $default, FALSE); // AGE- HUSBAND
		$this->buildSearchSql($where, $this->ANXIOUS_TO_CONCEIVE_FOR, $default, FALSE); // ANXIOUS TO CONCEIVE FOR
		$this->buildSearchSql($where, $this->AMH_28_NG2FML29, $default, FALSE); // AMH ( NG/ML)
		$this->buildSearchSql($where, $this->TUBAL_PATENCY, $default, FALSE); // TUBAL_PATENCY
		$this->buildSearchSql($where, $this->HSG, $default, FALSE); // HSG
		$this->buildSearchSql($where, $this->DHL, $default, FALSE); // DHL
		$this->buildSearchSql($where, $this->UTERINE_PROBLEMS, $default, FALSE); // UTERINE_PROBLEMS
		$this->buildSearchSql($where, $this->W_COMORBIDS, $default, FALSE); // W_COMORBIDS
		$this->buildSearchSql($where, $this->H_COMORBIDS, $default, FALSE); // H_COMORBIDS
		$this->buildSearchSql($where, $this->SEXUAL_DYSFUNCTION, $default, FALSE); // SEXUAL_DYSFUNCTION
		$this->buildSearchSql($where, $this->PREV_IUI, $default, FALSE); // PREV IUI
		$this->buildSearchSql($where, $this->PREV_IVF, $default, FALSE); // PREV_IVF
		$this->buildSearchSql($where, $this->TABLETS, $default, FALSE); // TABLETS
		$this->buildSearchSql($where, $this->INJTYPE, $default, FALSE); // INJTYPE
		$this->buildSearchSql($where, $this->LMP, $default, FALSE); // LMP
		$this->buildSearchSql($where, $this->TRIGGERR, $default, FALSE); // TRIGGERR
		$this->buildSearchSql($where, $this->TRIGGERDATE, $default, FALSE); // TRIGGERDATE
		$this->buildSearchSql($where, $this->FOLLICLE_STATUS, $default, FALSE); // FOLLICLE_STATUS
		$this->buildSearchSql($where, $this->NUMBER_OF_IUI, $default, FALSE); // NUMBER_OF_IUI
		$this->buildSearchSql($where, $this->PROCEDURE, $default, FALSE); // PROCEDURE
		$this->buildSearchSql($where, $this->LUTEAL_SUPPORT, $default, FALSE); // LUTEAL_SUPPORT
		$this->buildSearchSql($where, $this->H2FD_SAMPLE, $default, FALSE); // H/D SAMPLE
		$this->buildSearchSql($where, $this->DONOR___I_D, $default, FALSE); // DONOR - I.D
		$this->buildSearchSql($where, $this->PREG_TEST_DATE, $default, FALSE); // PREG_TEST_DATE
		$this->buildSearchSql($where, $this->COLLECTION__METHOD, $default, FALSE); // COLLECTION  METHOD
		$this->buildSearchSql($where, $this->SAMPLE_SOURCE, $default, FALSE); // SAMPLE SOURCE
		$this->buildSearchSql($where, $this->SPECIFIC_PROBLEMS, $default, FALSE); // SPECIFIC_PROBLEMS
		$this->buildSearchSql($where, $this->IMSC_1, $default, FALSE); // IMSC_1
		$this->buildSearchSql($where, $this->IMSC_2, $default, FALSE); // IMSC_2
		$this->buildSearchSql($where, $this->LIQUIFACTION_STORAGE, $default, FALSE); // LIQUIFACTION_STORAGE
		$this->buildSearchSql($where, $this->IUI_PREP_METHOD, $default, FALSE); // IUI_PREP_METHOD
		$this->buildSearchSql($where, $this->TIME_FROM_TRIGGER, $default, FALSE); // TIME_FROM_TRIGGER
		$this->buildSearchSql($where, $this->COLLECTION_TO_PREPARATION, $default, FALSE); // COLLECTION_TO_PREPARATION
		$this->buildSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $default, FALSE); // TIME_FROM_PREP_TO_INSEM
		$this->buildSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $default, FALSE); // SPECIFIC_MATERNAL_PROBLEMS
		$this->buildSearchSql($where, $this->RESULTS, $default, FALSE); // RESULTS
		$this->buildSearchSql($where, $this->ONGOING_PREG, $default, FALSE); // ONGOING_PREG
		$this->buildSearchSql($where, $this->EDD_Date, $default, FALSE); // EDD_Date

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->NAME->AdvancedSearch->save(); // NAME
			$this->HUSBAND_NAME->AdvancedSearch->save(); // HUSBAND NAME
			$this->CoupleID->AdvancedSearch->save(); // CoupleID
			$this->AGE____WIFE->AdvancedSearch->save(); // AGE  - WIFE
			$this->AGE__HUSBAND->AdvancedSearch->save(); // AGE- HUSBAND
			$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->save(); // ANXIOUS TO CONCEIVE FOR
			$this->AMH_28_NG2FML29->AdvancedSearch->save(); // AMH ( NG/ML)
			$this->TUBAL_PATENCY->AdvancedSearch->save(); // TUBAL_PATENCY
			$this->HSG->AdvancedSearch->save(); // HSG
			$this->DHL->AdvancedSearch->save(); // DHL
			$this->UTERINE_PROBLEMS->AdvancedSearch->save(); // UTERINE_PROBLEMS
			$this->W_COMORBIDS->AdvancedSearch->save(); // W_COMORBIDS
			$this->H_COMORBIDS->AdvancedSearch->save(); // H_COMORBIDS
			$this->SEXUAL_DYSFUNCTION->AdvancedSearch->save(); // SEXUAL_DYSFUNCTION
			$this->PREV_IUI->AdvancedSearch->save(); // PREV IUI
			$this->PREV_IVF->AdvancedSearch->save(); // PREV_IVF
			$this->TABLETS->AdvancedSearch->save(); // TABLETS
			$this->INJTYPE->AdvancedSearch->save(); // INJTYPE
			$this->LMP->AdvancedSearch->save(); // LMP
			$this->TRIGGERR->AdvancedSearch->save(); // TRIGGERR
			$this->TRIGGERDATE->AdvancedSearch->save(); // TRIGGERDATE
			$this->FOLLICLE_STATUS->AdvancedSearch->save(); // FOLLICLE_STATUS
			$this->NUMBER_OF_IUI->AdvancedSearch->save(); // NUMBER_OF_IUI
			$this->PROCEDURE->AdvancedSearch->save(); // PROCEDURE
			$this->LUTEAL_SUPPORT->AdvancedSearch->save(); // LUTEAL_SUPPORT
			$this->H2FD_SAMPLE->AdvancedSearch->save(); // H/D SAMPLE
			$this->DONOR___I_D->AdvancedSearch->save(); // DONOR - I.D
			$this->PREG_TEST_DATE->AdvancedSearch->save(); // PREG_TEST_DATE
			$this->COLLECTION__METHOD->AdvancedSearch->save(); // COLLECTION  METHOD
			$this->SAMPLE_SOURCE->AdvancedSearch->save(); // SAMPLE SOURCE
			$this->SPECIFIC_PROBLEMS->AdvancedSearch->save(); // SPECIFIC_PROBLEMS
			$this->IMSC_1->AdvancedSearch->save(); // IMSC_1
			$this->IMSC_2->AdvancedSearch->save(); // IMSC_2
			$this->LIQUIFACTION_STORAGE->AdvancedSearch->save(); // LIQUIFACTION_STORAGE
			$this->IUI_PREP_METHOD->AdvancedSearch->save(); // IUI_PREP_METHOD
			$this->TIME_FROM_TRIGGER->AdvancedSearch->save(); // TIME_FROM_TRIGGER
			$this->COLLECTION_TO_PREPARATION->AdvancedSearch->save(); // COLLECTION_TO_PREPARATION
			$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save(); // TIME_FROM_PREP_TO_INSEM
			$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save(); // SPECIFIC_MATERNAL_PROBLEMS
			$this->RESULTS->AdvancedSearch->save(); // RESULTS
			$this->ONGOING_PREG->AdvancedSearch->save(); // ONGOING_PREG
			$this->EDD_Date->AdvancedSearch->save(); // EDD_Date
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
		$this->buildBasicSearchSql($where, $this->NAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HUSBAND_NAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AGE____WIFE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AGE__HUSBAND, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANXIOUS_TO_CONCEIVE_FOR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AMH_28_NG2FML29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TUBAL_PATENCY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HSG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DHL, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UTERINE_PROBLEMS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->W_COMORBIDS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->H_COMORBIDS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SEXUAL_DYSFUNCTION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PREV_IUI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PREV_IVF, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TABLETS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJTYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FOLLICLE_STATUS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NUMBER_OF_IUI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PROCEDURE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LUTEAL_SUPPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->H2FD_SAMPLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->COLLECTION__METHOD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SAMPLE_SOURCE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SPECIFIC_PROBLEMS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IMSC_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IMSC_2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LIQUIFACTION_STORAGE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUI_PREP_METHOD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TIME_FROM_TRIGGER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->COLLECTION_TO_PREPARATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESULTS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ONGOING_PREG, $arKeywords, $type);
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
		if ($this->NAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HUSBAND_NAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CoupleID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AGE____WIFE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AGE__HUSBAND->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AMH_28_NG2FML29->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TUBAL_PATENCY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HSG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DHL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UTERINE_PROBLEMS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->W_COMORBIDS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->H_COMORBIDS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SEXUAL_DYSFUNCTION->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PREV_IUI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PREV_IVF->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TABLETS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->INJTYPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LMP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TRIGGERR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TRIGGERDATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FOLLICLE_STATUS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NUMBER_OF_IUI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PROCEDURE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LUTEAL_SUPPORT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->H2FD_SAMPLE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DONOR___I_D->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PREG_TEST_DATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->COLLECTION__METHOD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAMPLE_SOURCE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IMSC_1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IMSC_2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IUI_PREP_METHOD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TIME_FROM_TRIGGER->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RESULTS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ONGOING_PREG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EDD_Date->AdvancedSearch->issetSession())
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
		$this->NAME->AdvancedSearch->unsetSession();
		$this->HUSBAND_NAME->AdvancedSearch->unsetSession();
		$this->CoupleID->AdvancedSearch->unsetSession();
		$this->AGE____WIFE->AdvancedSearch->unsetSession();
		$this->AGE__HUSBAND->AdvancedSearch->unsetSession();
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->unsetSession();
		$this->AMH_28_NG2FML29->AdvancedSearch->unsetSession();
		$this->TUBAL_PATENCY->AdvancedSearch->unsetSession();
		$this->HSG->AdvancedSearch->unsetSession();
		$this->DHL->AdvancedSearch->unsetSession();
		$this->UTERINE_PROBLEMS->AdvancedSearch->unsetSession();
		$this->W_COMORBIDS->AdvancedSearch->unsetSession();
		$this->H_COMORBIDS->AdvancedSearch->unsetSession();
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->unsetSession();
		$this->PREV_IUI->AdvancedSearch->unsetSession();
		$this->PREV_IVF->AdvancedSearch->unsetSession();
		$this->TABLETS->AdvancedSearch->unsetSession();
		$this->INJTYPE->AdvancedSearch->unsetSession();
		$this->LMP->AdvancedSearch->unsetSession();
		$this->TRIGGERR->AdvancedSearch->unsetSession();
		$this->TRIGGERDATE->AdvancedSearch->unsetSession();
		$this->FOLLICLE_STATUS->AdvancedSearch->unsetSession();
		$this->NUMBER_OF_IUI->AdvancedSearch->unsetSession();
		$this->PROCEDURE->AdvancedSearch->unsetSession();
		$this->LUTEAL_SUPPORT->AdvancedSearch->unsetSession();
		$this->H2FD_SAMPLE->AdvancedSearch->unsetSession();
		$this->DONOR___I_D->AdvancedSearch->unsetSession();
		$this->PREG_TEST_DATE->AdvancedSearch->unsetSession();
		$this->COLLECTION__METHOD->AdvancedSearch->unsetSession();
		$this->SAMPLE_SOURCE->AdvancedSearch->unsetSession();
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->unsetSession();
		$this->IMSC_1->AdvancedSearch->unsetSession();
		$this->IMSC_2->AdvancedSearch->unsetSession();
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->unsetSession();
		$this->IUI_PREP_METHOD->AdvancedSearch->unsetSession();
		$this->TIME_FROM_TRIGGER->AdvancedSearch->unsetSession();
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->unsetSession();
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->unsetSession();
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->unsetSession();
		$this->RESULTS->AdvancedSearch->unsetSession();
		$this->ONGOING_PREG->AdvancedSearch->unsetSession();
		$this->EDD_Date->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->NAME->AdvancedSearch->load();
		$this->HUSBAND_NAME->AdvancedSearch->load();
		$this->CoupleID->AdvancedSearch->load();
		$this->AGE____WIFE->AdvancedSearch->load();
		$this->AGE__HUSBAND->AdvancedSearch->load();
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->load();
		$this->AMH_28_NG2FML29->AdvancedSearch->load();
		$this->TUBAL_PATENCY->AdvancedSearch->load();
		$this->HSG->AdvancedSearch->load();
		$this->DHL->AdvancedSearch->load();
		$this->UTERINE_PROBLEMS->AdvancedSearch->load();
		$this->W_COMORBIDS->AdvancedSearch->load();
		$this->H_COMORBIDS->AdvancedSearch->load();
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
		$this->PREV_IUI->AdvancedSearch->load();
		$this->PREV_IVF->AdvancedSearch->load();
		$this->TABLETS->AdvancedSearch->load();
		$this->INJTYPE->AdvancedSearch->load();
		$this->LMP->AdvancedSearch->load();
		$this->TRIGGERR->AdvancedSearch->load();
		$this->TRIGGERDATE->AdvancedSearch->load();
		$this->FOLLICLE_STATUS->AdvancedSearch->load();
		$this->NUMBER_OF_IUI->AdvancedSearch->load();
		$this->PROCEDURE->AdvancedSearch->load();
		$this->LUTEAL_SUPPORT->AdvancedSearch->load();
		$this->H2FD_SAMPLE->AdvancedSearch->load();
		$this->DONOR___I_D->AdvancedSearch->load();
		$this->PREG_TEST_DATE->AdvancedSearch->load();
		$this->COLLECTION__METHOD->AdvancedSearch->load();
		$this->SAMPLE_SOURCE->AdvancedSearch->load();
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
		$this->IMSC_1->AdvancedSearch->load();
		$this->IMSC_2->AdvancedSearch->load();
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
		$this->IUI_PREP_METHOD->AdvancedSearch->load();
		$this->TIME_FROM_TRIGGER->AdvancedSearch->load();
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
		$this->RESULTS->AdvancedSearch->load();
		$this->ONGOING_PREG->AdvancedSearch->load();
		$this->EDD_Date->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->NAME); // NAME
			$this->updateSort($this->HUSBAND_NAME); // HUSBAND NAME
			$this->updateSort($this->CoupleID); // CoupleID
			$this->updateSort($this->AGE____WIFE); // AGE  - WIFE
			$this->updateSort($this->AGE__HUSBAND); // AGE- HUSBAND
			$this->updateSort($this->ANXIOUS_TO_CONCEIVE_FOR); // ANXIOUS TO CONCEIVE FOR
			$this->updateSort($this->AMH_28_NG2FML29); // AMH ( NG/ML)
			$this->updateSort($this->TUBAL_PATENCY); // TUBAL_PATENCY
			$this->updateSort($this->HSG); // HSG
			$this->updateSort($this->DHL); // DHL
			$this->updateSort($this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
			$this->updateSort($this->W_COMORBIDS); // W_COMORBIDS
			$this->updateSort($this->H_COMORBIDS); // H_COMORBIDS
			$this->updateSort($this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
			$this->updateSort($this->PREV_IUI); // PREV IUI
			$this->updateSort($this->PREV_IVF); // PREV_IVF
			$this->updateSort($this->TABLETS); // TABLETS
			$this->updateSort($this->INJTYPE); // INJTYPE
			$this->updateSort($this->LMP); // LMP
			$this->updateSort($this->TRIGGERR); // TRIGGERR
			$this->updateSort($this->TRIGGERDATE); // TRIGGERDATE
			$this->updateSort($this->FOLLICLE_STATUS); // FOLLICLE_STATUS
			$this->updateSort($this->NUMBER_OF_IUI); // NUMBER_OF_IUI
			$this->updateSort($this->PROCEDURE); // PROCEDURE
			$this->updateSort($this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
			$this->updateSort($this->H2FD_SAMPLE); // H/D SAMPLE
			$this->updateSort($this->DONOR___I_D); // DONOR - I.D
			$this->updateSort($this->PREG_TEST_DATE); // PREG_TEST_DATE
			$this->updateSort($this->COLLECTION__METHOD); // COLLECTION  METHOD
			$this->updateSort($this->SAMPLE_SOURCE); // SAMPLE SOURCE
			$this->updateSort($this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
			$this->updateSort($this->IMSC_1); // IMSC_1
			$this->updateSort($this->IMSC_2); // IMSC_2
			$this->updateSort($this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
			$this->updateSort($this->IUI_PREP_METHOD); // IUI_PREP_METHOD
			$this->updateSort($this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
			$this->updateSort($this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
			$this->updateSort($this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
			$this->updateSort($this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
			$this->updateSort($this->RESULTS); // RESULTS
			$this->updateSort($this->ONGOING_PREG); // ONGOING_PREG
			$this->updateSort($this->EDD_Date); // EDD_Date
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
				$this->NAME->setSort("");
				$this->HUSBAND_NAME->setSort("");
				$this->CoupleID->setSort("");
				$this->AGE____WIFE->setSort("");
				$this->AGE__HUSBAND->setSort("");
				$this->ANXIOUS_TO_CONCEIVE_FOR->setSort("");
				$this->AMH_28_NG2FML29->setSort("");
				$this->TUBAL_PATENCY->setSort("");
				$this->HSG->setSort("");
				$this->DHL->setSort("");
				$this->UTERINE_PROBLEMS->setSort("");
				$this->W_COMORBIDS->setSort("");
				$this->H_COMORBIDS->setSort("");
				$this->SEXUAL_DYSFUNCTION->setSort("");
				$this->PREV_IUI->setSort("");
				$this->PREV_IVF->setSort("");
				$this->TABLETS->setSort("");
				$this->INJTYPE->setSort("");
				$this->LMP->setSort("");
				$this->TRIGGERR->setSort("");
				$this->TRIGGERDATE->setSort("");
				$this->FOLLICLE_STATUS->setSort("");
				$this->NUMBER_OF_IUI->setSort("");
				$this->PROCEDURE->setSort("");
				$this->LUTEAL_SUPPORT->setSort("");
				$this->H2FD_SAMPLE->setSort("");
				$this->DONOR___I_D->setSort("");
				$this->PREG_TEST_DATE->setSort("");
				$this->COLLECTION__METHOD->setSort("");
				$this->SAMPLE_SOURCE->setSort("");
				$this->SPECIFIC_PROBLEMS->setSort("");
				$this->IMSC_1->setSort("");
				$this->IMSC_2->setSort("");
				$this->LIQUIFACTION_STORAGE->setSort("");
				$this->IUI_PREP_METHOD->setSort("");
				$this->TIME_FROM_TRIGGER->setSort("");
				$this->COLLECTION_TO_PREPARATION->setSort("");
				$this->TIME_FROM_PREP_TO_INSEM->setSort("");
				$this->SPECIFIC_MATERNAL_PROBLEMS->setSort("");
				$this->RESULTS->setSort("");
				$this->ONGOING_PREG->setSort("");
				$this->EDD_Date->setSort("");
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->CoupleID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_iui_excellist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_iui_excellistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_iui_excelsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_iui_excel\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_iui_excelsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_iui_excellistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
		$item->Visible = ($this->SearchWhere <> "" && $this->TotalRecs > 0);

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
		// NAME

		if (!$this->isAddOrEdit())
			$this->NAME->AdvancedSearch->setSearchValue(Get("x_NAME", Get("NAME", "")));
		if ($this->NAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NAME->AdvancedSearch->setSearchOperator(Get("z_NAME", ""));

		// HUSBAND NAME
		if (!$this->isAddOrEdit())
			$this->HUSBAND_NAME->AdvancedSearch->setSearchValue(Get("x_HUSBAND_NAME", Get("HUSBAND_NAME", "")));
		if ($this->HUSBAND_NAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HUSBAND_NAME->AdvancedSearch->setSearchOperator(Get("z_HUSBAND_NAME", ""));

		// CoupleID
		if (!$this->isAddOrEdit())
			$this->CoupleID->AdvancedSearch->setSearchValue(Get("x_CoupleID", Get("CoupleID", "")));
		if ($this->CoupleID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CoupleID->AdvancedSearch->setSearchOperator(Get("z_CoupleID", ""));

		// AGE  - WIFE
		if (!$this->isAddOrEdit())
			$this->AGE____WIFE->AdvancedSearch->setSearchValue(Get("x_AGE____WIFE", Get("AGE____WIFE", "")));
		if ($this->AGE____WIFE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AGE____WIFE->AdvancedSearch->setSearchOperator(Get("z_AGE____WIFE", ""));

		// AGE- HUSBAND
		if (!$this->isAddOrEdit())
			$this->AGE__HUSBAND->AdvancedSearch->setSearchValue(Get("x_AGE__HUSBAND", Get("AGE__HUSBAND", "")));
		if ($this->AGE__HUSBAND->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AGE__HUSBAND->AdvancedSearch->setSearchOperator(Get("z_AGE__HUSBAND", ""));

		// ANXIOUS TO CONCEIVE FOR
		if (!$this->isAddOrEdit())
			$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->setSearchValue(Get("x_ANXIOUS_TO_CONCEIVE_FOR", Get("ANXIOUS_TO_CONCEIVE_FOR", "")));
		if ($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->setSearchOperator(Get("z_ANXIOUS_TO_CONCEIVE_FOR", ""));

		// AMH ( NG/ML)
		if (!$this->isAddOrEdit())
			$this->AMH_28_NG2FML29->AdvancedSearch->setSearchValue(Get("x_AMH_28_NG2FML29", Get("AMH_28_NG2FML29", "")));
		if ($this->AMH_28_NG2FML29->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AMH_28_NG2FML29->AdvancedSearch->setSearchOperator(Get("z_AMH_28_NG2FML29", ""));

		// TUBAL_PATENCY
		if (!$this->isAddOrEdit())
			$this->TUBAL_PATENCY->AdvancedSearch->setSearchValue(Get("x_TUBAL_PATENCY", Get("TUBAL_PATENCY", "")));
		if ($this->TUBAL_PATENCY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TUBAL_PATENCY->AdvancedSearch->setSearchOperator(Get("z_TUBAL_PATENCY", ""));

		// HSG
		if (!$this->isAddOrEdit())
			$this->HSG->AdvancedSearch->setSearchValue(Get("x_HSG", Get("HSG", "")));
		if ($this->HSG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HSG->AdvancedSearch->setSearchOperator(Get("z_HSG", ""));

		// DHL
		if (!$this->isAddOrEdit())
			$this->DHL->AdvancedSearch->setSearchValue(Get("x_DHL", Get("DHL", "")));
		if ($this->DHL->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DHL->AdvancedSearch->setSearchOperator(Get("z_DHL", ""));

		// UTERINE_PROBLEMS
		if (!$this->isAddOrEdit())
			$this->UTERINE_PROBLEMS->AdvancedSearch->setSearchValue(Get("x_UTERINE_PROBLEMS", Get("UTERINE_PROBLEMS", "")));
		if ($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UTERINE_PROBLEMS->AdvancedSearch->setSearchOperator(Get("z_UTERINE_PROBLEMS", ""));

		// W_COMORBIDS
		if (!$this->isAddOrEdit())
			$this->W_COMORBIDS->AdvancedSearch->setSearchValue(Get("x_W_COMORBIDS", Get("W_COMORBIDS", "")));
		if ($this->W_COMORBIDS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->W_COMORBIDS->AdvancedSearch->setSearchOperator(Get("z_W_COMORBIDS", ""));

		// H_COMORBIDS
		if (!$this->isAddOrEdit())
			$this->H_COMORBIDS->AdvancedSearch->setSearchValue(Get("x_H_COMORBIDS", Get("H_COMORBIDS", "")));
		if ($this->H_COMORBIDS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->H_COMORBIDS->AdvancedSearch->setSearchOperator(Get("z_H_COMORBIDS", ""));

		// SEXUAL_DYSFUNCTION
		if (!$this->isAddOrEdit())
			$this->SEXUAL_DYSFUNCTION->AdvancedSearch->setSearchValue(Get("x_SEXUAL_DYSFUNCTION", Get("SEXUAL_DYSFUNCTION", "")));
		if ($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->setSearchOperator(Get("z_SEXUAL_DYSFUNCTION", ""));

		// PREV IUI
		if (!$this->isAddOrEdit())
			$this->PREV_IUI->AdvancedSearch->setSearchValue(Get("x_PREV_IUI", Get("PREV_IUI", "")));
		if ($this->PREV_IUI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PREV_IUI->AdvancedSearch->setSearchOperator(Get("z_PREV_IUI", ""));

		// PREV_IVF
		if (!$this->isAddOrEdit())
			$this->PREV_IVF->AdvancedSearch->setSearchValue(Get("x_PREV_IVF", Get("PREV_IVF", "")));
		if ($this->PREV_IVF->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PREV_IVF->AdvancedSearch->setSearchOperator(Get("z_PREV_IVF", ""));

		// TABLETS
		if (!$this->isAddOrEdit())
			$this->TABLETS->AdvancedSearch->setSearchValue(Get("x_TABLETS", Get("TABLETS", "")));
		if ($this->TABLETS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TABLETS->AdvancedSearch->setSearchOperator(Get("z_TABLETS", ""));

		// INJTYPE
		if (!$this->isAddOrEdit())
			$this->INJTYPE->AdvancedSearch->setSearchValue(Get("x_INJTYPE", Get("INJTYPE", "")));
		if ($this->INJTYPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->INJTYPE->AdvancedSearch->setSearchOperator(Get("z_INJTYPE", ""));

		// LMP
		if (!$this->isAddOrEdit())
			$this->LMP->AdvancedSearch->setSearchValue(Get("x_LMP", Get("LMP", "")));
		if ($this->LMP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LMP->AdvancedSearch->setSearchOperator(Get("z_LMP", ""));

		// TRIGGERR
		if (!$this->isAddOrEdit())
			$this->TRIGGERR->AdvancedSearch->setSearchValue(Get("x_TRIGGERR", Get("TRIGGERR", "")));
		if ($this->TRIGGERR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TRIGGERR->AdvancedSearch->setSearchOperator(Get("z_TRIGGERR", ""));

		// TRIGGERDATE
		if (!$this->isAddOrEdit())
			$this->TRIGGERDATE->AdvancedSearch->setSearchValue(Get("x_TRIGGERDATE", Get("TRIGGERDATE", "")));
		if ($this->TRIGGERDATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TRIGGERDATE->AdvancedSearch->setSearchOperator(Get("z_TRIGGERDATE", ""));

		// FOLLICLE_STATUS
		if (!$this->isAddOrEdit())
			$this->FOLLICLE_STATUS->AdvancedSearch->setSearchValue(Get("x_FOLLICLE_STATUS", Get("FOLLICLE_STATUS", "")));
		if ($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FOLLICLE_STATUS->AdvancedSearch->setSearchOperator(Get("z_FOLLICLE_STATUS", ""));

		// NUMBER_OF_IUI
		if (!$this->isAddOrEdit())
			$this->NUMBER_OF_IUI->AdvancedSearch->setSearchValue(Get("x_NUMBER_OF_IUI", Get("NUMBER_OF_IUI", "")));
		if ($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NUMBER_OF_IUI->AdvancedSearch->setSearchOperator(Get("z_NUMBER_OF_IUI", ""));

		// PROCEDURE
		if (!$this->isAddOrEdit())
			$this->PROCEDURE->AdvancedSearch->setSearchValue(Get("x_PROCEDURE", Get("PROCEDURE", "")));
		if ($this->PROCEDURE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PROCEDURE->AdvancedSearch->setSearchOperator(Get("z_PROCEDURE", ""));

		// LUTEAL_SUPPORT
		if (!$this->isAddOrEdit())
			$this->LUTEAL_SUPPORT->AdvancedSearch->setSearchValue(Get("x_LUTEAL_SUPPORT", Get("LUTEAL_SUPPORT", "")));
		if ($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LUTEAL_SUPPORT->AdvancedSearch->setSearchOperator(Get("z_LUTEAL_SUPPORT", ""));

		// H/D SAMPLE
		if (!$this->isAddOrEdit())
			$this->H2FD_SAMPLE->AdvancedSearch->setSearchValue(Get("x_H2FD_SAMPLE", Get("H2FD_SAMPLE", "")));
		if ($this->H2FD_SAMPLE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->H2FD_SAMPLE->AdvancedSearch->setSearchOperator(Get("z_H2FD_SAMPLE", ""));

		// DONOR - I.D
		if (!$this->isAddOrEdit())
			$this->DONOR___I_D->AdvancedSearch->setSearchValue(Get("x_DONOR___I_D", Get("DONOR___I_D", "")));
		if ($this->DONOR___I_D->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DONOR___I_D->AdvancedSearch->setSearchOperator(Get("z_DONOR___I_D", ""));

		// PREG_TEST_DATE
		if (!$this->isAddOrEdit())
			$this->PREG_TEST_DATE->AdvancedSearch->setSearchValue(Get("x_PREG_TEST_DATE", Get("PREG_TEST_DATE", "")));
		if ($this->PREG_TEST_DATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PREG_TEST_DATE->AdvancedSearch->setSearchOperator(Get("z_PREG_TEST_DATE", ""));
		$this->PREG_TEST_DATE->AdvancedSearch->setSearchCondition(Get("v_PREG_TEST_DATE", ""));
		$this->PREG_TEST_DATE->AdvancedSearch->setSearchValue2(Get("y_PREG_TEST_DATE", ""));
		if ($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PREG_TEST_DATE->AdvancedSearch->setSearchOperator2(Get("w_PREG_TEST_DATE", ""));

		// COLLECTION  METHOD
		if (!$this->isAddOrEdit())
			$this->COLLECTION__METHOD->AdvancedSearch->setSearchValue(Get("x_COLLECTION__METHOD", Get("COLLECTION__METHOD", "")));
		if ($this->COLLECTION__METHOD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->COLLECTION__METHOD->AdvancedSearch->setSearchOperator(Get("z_COLLECTION__METHOD", ""));

		// SAMPLE SOURCE
		if (!$this->isAddOrEdit())
			$this->SAMPLE_SOURCE->AdvancedSearch->setSearchValue(Get("x_SAMPLE_SOURCE", Get("SAMPLE_SOURCE", "")));
		if ($this->SAMPLE_SOURCE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SAMPLE_SOURCE->AdvancedSearch->setSearchOperator(Get("z_SAMPLE_SOURCE", ""));

		// SPECIFIC_PROBLEMS
		if (!$this->isAddOrEdit())
			$this->SPECIFIC_PROBLEMS->AdvancedSearch->setSearchValue(Get("x_SPECIFIC_PROBLEMS", Get("SPECIFIC_PROBLEMS", "")));
		if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->setSearchOperator(Get("z_SPECIFIC_PROBLEMS", ""));

		// IMSC_1
		if (!$this->isAddOrEdit())
			$this->IMSC_1->AdvancedSearch->setSearchValue(Get("x_IMSC_1", Get("IMSC_1", "")));
		if ($this->IMSC_1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IMSC_1->AdvancedSearch->setSearchOperator(Get("z_IMSC_1", ""));

		// IMSC_2
		if (!$this->isAddOrEdit())
			$this->IMSC_2->AdvancedSearch->setSearchValue(Get("x_IMSC_2", Get("IMSC_2", "")));
		if ($this->IMSC_2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IMSC_2->AdvancedSearch->setSearchOperator(Get("z_IMSC_2", ""));

		// LIQUIFACTION_STORAGE
		if (!$this->isAddOrEdit())
			$this->LIQUIFACTION_STORAGE->AdvancedSearch->setSearchValue(Get("x_LIQUIFACTION_STORAGE", Get("LIQUIFACTION_STORAGE", "")));
		if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->setSearchOperator(Get("z_LIQUIFACTION_STORAGE", ""));

		// IUI_PREP_METHOD
		if (!$this->isAddOrEdit())
			$this->IUI_PREP_METHOD->AdvancedSearch->setSearchValue(Get("x_IUI_PREP_METHOD", Get("IUI_PREP_METHOD", "")));
		if ($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IUI_PREP_METHOD->AdvancedSearch->setSearchOperator(Get("z_IUI_PREP_METHOD", ""));

		// TIME_FROM_TRIGGER
		if (!$this->isAddOrEdit())
			$this->TIME_FROM_TRIGGER->AdvancedSearch->setSearchValue(Get("x_TIME_FROM_TRIGGER", Get("TIME_FROM_TRIGGER", "")));
		if ($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TIME_FROM_TRIGGER->AdvancedSearch->setSearchOperator(Get("z_TIME_FROM_TRIGGER", ""));

		// COLLECTION_TO_PREPARATION
		if (!$this->isAddOrEdit())
			$this->COLLECTION_TO_PREPARATION->AdvancedSearch->setSearchValue(Get("x_COLLECTION_TO_PREPARATION", Get("COLLECTION_TO_PREPARATION", "")));
		if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->setSearchOperator(Get("z_COLLECTION_TO_PREPARATION", ""));

		// TIME_FROM_PREP_TO_INSEM
		if (!$this->isAddOrEdit())
			$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->setSearchValue(Get("x_TIME_FROM_PREP_TO_INSEM", Get("TIME_FROM_PREP_TO_INSEM", "")));
		if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->setSearchOperator(Get("z_TIME_FROM_PREP_TO_INSEM", ""));

		// SPECIFIC_MATERNAL_PROBLEMS
		if (!$this->isAddOrEdit())
			$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->setSearchValue(Get("x_SPECIFIC_MATERNAL_PROBLEMS", Get("SPECIFIC_MATERNAL_PROBLEMS", "")));
		if ($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->setSearchOperator(Get("z_SPECIFIC_MATERNAL_PROBLEMS", ""));

		// RESULTS
		if (!$this->isAddOrEdit())
			$this->RESULTS->AdvancedSearch->setSearchValue(Get("x_RESULTS", Get("RESULTS", "")));
		if ($this->RESULTS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RESULTS->AdvancedSearch->setSearchOperator(Get("z_RESULTS", ""));

		// ONGOING_PREG
		if (!$this->isAddOrEdit())
			$this->ONGOING_PREG->AdvancedSearch->setSearchValue(Get("x_ONGOING_PREG", Get("ONGOING_PREG", "")));
		if ($this->ONGOING_PREG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ONGOING_PREG->AdvancedSearch->setSearchOperator(Get("z_ONGOING_PREG", ""));

		// EDD_Date
		if (!$this->isAddOrEdit())
			$this->EDD_Date->AdvancedSearch->setSearchValue(Get("x_EDD_Date", Get("EDD_Date", "")));
		if ($this->EDD_Date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EDD_Date->AdvancedSearch->setSearchOperator(Get("z_EDD_Date", ""));
		$this->EDD_Date->AdvancedSearch->setSearchCondition(Get("v_EDD_Date", ""));
		$this->EDD_Date->AdvancedSearch->setSearchValue2(Get("y_EDD_Date", ""));
		if ($this->EDD_Date->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EDD_Date->AdvancedSearch->setSearchOperator2(Get("w_EDD_Date", ""));
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
		$this->NAME->setDbValue($row['NAME']);
		$this->HUSBAND_NAME->setDbValue($row['HUSBAND NAME']);
		$this->CoupleID->setDbValue($row['CoupleID']);
		$this->AGE____WIFE->setDbValue($row['AGE  - WIFE']);
		$this->AGE__HUSBAND->setDbValue($row['AGE- HUSBAND']);
		$this->ANXIOUS_TO_CONCEIVE_FOR->setDbValue($row['ANXIOUS TO CONCEIVE FOR']);
		$this->AMH_28_NG2FML29->setDbValue($row['AMH ( NG/ML)']);
		$this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
		$this->HSG->setDbValue($row['HSG']);
		$this->DHL->setDbValue($row['DHL']);
		$this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
		$this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
		$this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
		$this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
		$this->PREV_IUI->setDbValue($row['PREV IUI']);
		$this->PREV_IVF->setDbValue($row['PREV_IVF']);
		$this->TABLETS->setDbValue($row['TABLETS']);
		$this->INJTYPE->setDbValue($row['INJTYPE']);
		$this->LMP->setDbValue($row['LMP']);
		$this->TRIGGERR->setDbValue($row['TRIGGERR']);
		$this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
		$this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
		$this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
		$this->PROCEDURE->setDbValue($row['PROCEDURE']);
		$this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
		$this->H2FD_SAMPLE->setDbValue($row['H/D SAMPLE']);
		$this->DONOR___I_D->setDbValue($row['DONOR - I.D']);
		$this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
		$this->COLLECTION__METHOD->setDbValue($row['COLLECTION  METHOD']);
		$this->SAMPLE_SOURCE->setDbValue($row['SAMPLE SOURCE']);
		$this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
		$this->IMSC_1->setDbValue($row['IMSC_1']);
		$this->IMSC_2->setDbValue($row['IMSC_2']);
		$this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
		$this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
		$this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
		$this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
		$this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
		$this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
		$this->RESULTS->setDbValue($row['RESULTS']);
		$this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
		$this->EDD_Date->setDbValue($row['EDD_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['NAME'] = NULL;
		$row['HUSBAND NAME'] = NULL;
		$row['CoupleID'] = NULL;
		$row['AGE  - WIFE'] = NULL;
		$row['AGE- HUSBAND'] = NULL;
		$row['ANXIOUS TO CONCEIVE FOR'] = NULL;
		$row['AMH ( NG/ML)'] = NULL;
		$row['TUBAL_PATENCY'] = NULL;
		$row['HSG'] = NULL;
		$row['DHL'] = NULL;
		$row['UTERINE_PROBLEMS'] = NULL;
		$row['W_COMORBIDS'] = NULL;
		$row['H_COMORBIDS'] = NULL;
		$row['SEXUAL_DYSFUNCTION'] = NULL;
		$row['PREV IUI'] = NULL;
		$row['PREV_IVF'] = NULL;
		$row['TABLETS'] = NULL;
		$row['INJTYPE'] = NULL;
		$row['LMP'] = NULL;
		$row['TRIGGERR'] = NULL;
		$row['TRIGGERDATE'] = NULL;
		$row['FOLLICLE_STATUS'] = NULL;
		$row['NUMBER_OF_IUI'] = NULL;
		$row['PROCEDURE'] = NULL;
		$row['LUTEAL_SUPPORT'] = NULL;
		$row['H/D SAMPLE'] = NULL;
		$row['DONOR - I.D'] = NULL;
		$row['PREG_TEST_DATE'] = NULL;
		$row['COLLECTION  METHOD'] = NULL;
		$row['SAMPLE SOURCE'] = NULL;
		$row['SPECIFIC_PROBLEMS'] = NULL;
		$row['IMSC_1'] = NULL;
		$row['IMSC_2'] = NULL;
		$row['LIQUIFACTION_STORAGE'] = NULL;
		$row['IUI_PREP_METHOD'] = NULL;
		$row['TIME_FROM_TRIGGER'] = NULL;
		$row['COLLECTION_TO_PREPARATION'] = NULL;
		$row['TIME_FROM_PREP_TO_INSEM'] = NULL;
		$row['SPECIFIC_MATERNAL_PROBLEMS'] = NULL;
		$row['RESULTS'] = NULL;
		$row['ONGOING_PREG'] = NULL;
		$row['EDD_Date'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("CoupleID")) <> "")
			$this->CoupleID->CurrentValue = $this->getKey("CoupleID"); // CoupleID
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
		// NAME
		// HUSBAND NAME
		// CoupleID
		// AGE  - WIFE
		// AGE- HUSBAND
		// ANXIOUS TO CONCEIVE FOR
		// AMH ( NG/ML)
		// TUBAL_PATENCY
		// HSG
		// DHL
		// UTERINE_PROBLEMS
		// W_COMORBIDS
		// H_COMORBIDS
		// SEXUAL_DYSFUNCTION
		// PREV IUI
		// PREV_IVF
		// TABLETS
		// INJTYPE
		// LMP
		// TRIGGERR
		// TRIGGERDATE
		// FOLLICLE_STATUS
		// NUMBER_OF_IUI
		// PROCEDURE
		// LUTEAL_SUPPORT
		// H/D SAMPLE
		// DONOR - I.D
		// PREG_TEST_DATE
		// COLLECTION  METHOD
		// SAMPLE SOURCE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM
		// SPECIFIC_MATERNAL_PROBLEMS
		// RESULTS
		// ONGOING_PREG
		// EDD_Date

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// NAME
			$this->NAME->ViewValue = $this->NAME->CurrentValue;
			$this->NAME->ViewCustomAttributes = "";

			// HUSBAND NAME
			$this->HUSBAND_NAME->ViewValue = $this->HUSBAND_NAME->CurrentValue;
			$this->HUSBAND_NAME->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// AGE  - WIFE
			$this->AGE____WIFE->ViewValue = $this->AGE____WIFE->CurrentValue;
			$this->AGE____WIFE->ViewCustomAttributes = "";

			// AGE- HUSBAND
			$this->AGE__HUSBAND->ViewValue = $this->AGE__HUSBAND->CurrentValue;
			$this->AGE__HUSBAND->ViewCustomAttributes = "";

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
			$this->ANXIOUS_TO_CONCEIVE_FOR->ViewCustomAttributes = "";

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->ViewValue = $this->AMH_28_NG2FML29->CurrentValue;
			$this->AMH_28_NG2FML29->ViewCustomAttributes = "";

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
			$this->TUBAL_PATENCY->ViewCustomAttributes = "";

			// HSG
			$this->HSG->ViewValue = $this->HSG->CurrentValue;
			$this->HSG->ViewCustomAttributes = "";

			// DHL
			$this->DHL->ViewValue = $this->DHL->CurrentValue;
			$this->DHL->ViewCustomAttributes = "";

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
			$this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

			// W_COMORBIDS
			$this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
			$this->W_COMORBIDS->ViewCustomAttributes = "";

			// H_COMORBIDS
			$this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
			$this->H_COMORBIDS->ViewCustomAttributes = "";

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
			$this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

			// PREV IUI
			$this->PREV_IUI->ViewValue = $this->PREV_IUI->CurrentValue;
			$this->PREV_IUI->ViewCustomAttributes = "";

			// PREV_IVF
			$this->PREV_IVF->ViewValue = $this->PREV_IVF->CurrentValue;
			$this->PREV_IVF->ViewCustomAttributes = "";

			// TABLETS
			$this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
			$this->TABLETS->ViewCustomAttributes = "";

			// INJTYPE
			$this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
			$this->INJTYPE->ViewCustomAttributes = "";

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
			$this->LMP->ViewCustomAttributes = "";

			// TRIGGERR
			$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
			$this->TRIGGERR->ViewCustomAttributes = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
			$this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
			$this->TRIGGERDATE->ViewCustomAttributes = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
			$this->FOLLICLE_STATUS->ViewCustomAttributes = "";

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
			$this->NUMBER_OF_IUI->ViewCustomAttributes = "";

			// PROCEDURE
			$this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
			$this->PROCEDURE->ViewCustomAttributes = "";

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
			$this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

			// H/D SAMPLE
			$this->H2FD_SAMPLE->ViewValue = $this->H2FD_SAMPLE->CurrentValue;
			$this->H2FD_SAMPLE->ViewCustomAttributes = "";

			// DONOR - I.D
			$this->DONOR___I_D->ViewValue = $this->DONOR___I_D->CurrentValue;
			$this->DONOR___I_D->ViewValue = FormatNumber($this->DONOR___I_D->ViewValue, 0, -2, -2, -2);
			$this->DONOR___I_D->ViewCustomAttributes = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
			$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
			$this->PREG_TEST_DATE->ViewCustomAttributes = "";

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->ViewValue = $this->COLLECTION__METHOD->CurrentValue;
			$this->COLLECTION__METHOD->ViewCustomAttributes = "";

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->ViewValue = $this->SAMPLE_SOURCE->CurrentValue;
			$this->SAMPLE_SOURCE->ViewCustomAttributes = "";

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
			$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

			// IMSC_1
			$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
			$this->IMSC_1->ViewCustomAttributes = "";

			// IMSC_2
			$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
			$this->IMSC_2->ViewCustomAttributes = "";

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
			$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
			$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
			$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
			$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
			$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

			// RESULTS
			$this->RESULTS->ViewValue = $this->RESULTS->CurrentValue;
			$this->RESULTS->ViewCustomAttributes = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
			$this->ONGOING_PREG->ViewCustomAttributes = "";

			// EDD_Date
			$this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
			$this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
			$this->EDD_Date->ViewCustomAttributes = "";

			// NAME
			$this->NAME->LinkCustomAttributes = "";
			$this->NAME->HrefValue = "";
			$this->NAME->TooltipValue = "";
			if (!$this->isExport())
				$this->NAME->ViewValue = $this->highlightValue($this->NAME);

			// HUSBAND NAME
			$this->HUSBAND_NAME->LinkCustomAttributes = "";
			$this->HUSBAND_NAME->HrefValue = "";
			$this->HUSBAND_NAME->TooltipValue = "";
			if (!$this->isExport())
				$this->HUSBAND_NAME->ViewValue = $this->highlightValue($this->HUSBAND_NAME);

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";
			if (!$this->isExport())
				$this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);

			// AGE  - WIFE
			$this->AGE____WIFE->LinkCustomAttributes = "";
			$this->AGE____WIFE->HrefValue = "";
			$this->AGE____WIFE->TooltipValue = "";
			if (!$this->isExport())
				$this->AGE____WIFE->ViewValue = $this->highlightValue($this->AGE____WIFE);

			// AGE- HUSBAND
			$this->AGE__HUSBAND->LinkCustomAttributes = "";
			$this->AGE__HUSBAND->HrefValue = "";
			$this->AGE__HUSBAND->TooltipValue = "";
			if (!$this->isExport())
				$this->AGE__HUSBAND->ViewValue = $this->highlightValue($this->AGE__HUSBAND);

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->LinkCustomAttributes = "";
			$this->ANXIOUS_TO_CONCEIVE_FOR->HrefValue = "";
			$this->ANXIOUS_TO_CONCEIVE_FOR->TooltipValue = "";
			if (!$this->isExport())
				$this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->highlightValue($this->ANXIOUS_TO_CONCEIVE_FOR);

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->LinkCustomAttributes = "";
			$this->AMH_28_NG2FML29->HrefValue = "";
			$this->AMH_28_NG2FML29->TooltipValue = "";
			if (!$this->isExport())
				$this->AMH_28_NG2FML29->ViewValue = $this->highlightValue($this->AMH_28_NG2FML29);

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->LinkCustomAttributes = "";
			$this->TUBAL_PATENCY->HrefValue = "";
			$this->TUBAL_PATENCY->TooltipValue = "";
			if (!$this->isExport())
				$this->TUBAL_PATENCY->ViewValue = $this->highlightValue($this->TUBAL_PATENCY);

			// HSG
			$this->HSG->LinkCustomAttributes = "";
			$this->HSG->HrefValue = "";
			$this->HSG->TooltipValue = "";
			if (!$this->isExport())
				$this->HSG->ViewValue = $this->highlightValue($this->HSG);

			// DHL
			$this->DHL->LinkCustomAttributes = "";
			$this->DHL->HrefValue = "";
			$this->DHL->TooltipValue = "";
			if (!$this->isExport())
				$this->DHL->ViewValue = $this->highlightValue($this->DHL);

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
			$this->UTERINE_PROBLEMS->HrefValue = "";
			$this->UTERINE_PROBLEMS->TooltipValue = "";
			if (!$this->isExport())
				$this->UTERINE_PROBLEMS->ViewValue = $this->highlightValue($this->UTERINE_PROBLEMS);

			// W_COMORBIDS
			$this->W_COMORBIDS->LinkCustomAttributes = "";
			$this->W_COMORBIDS->HrefValue = "";
			$this->W_COMORBIDS->TooltipValue = "";
			if (!$this->isExport())
				$this->W_COMORBIDS->ViewValue = $this->highlightValue($this->W_COMORBIDS);

			// H_COMORBIDS
			$this->H_COMORBIDS->LinkCustomAttributes = "";
			$this->H_COMORBIDS->HrefValue = "";
			$this->H_COMORBIDS->TooltipValue = "";
			if (!$this->isExport())
				$this->H_COMORBIDS->ViewValue = $this->highlightValue($this->H_COMORBIDS);

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
			$this->SEXUAL_DYSFUNCTION->HrefValue = "";
			$this->SEXUAL_DYSFUNCTION->TooltipValue = "";
			if (!$this->isExport())
				$this->SEXUAL_DYSFUNCTION->ViewValue = $this->highlightValue($this->SEXUAL_DYSFUNCTION);

			// PREV IUI
			$this->PREV_IUI->LinkCustomAttributes = "";
			$this->PREV_IUI->HrefValue = "";
			$this->PREV_IUI->TooltipValue = "";
			if (!$this->isExport())
				$this->PREV_IUI->ViewValue = $this->highlightValue($this->PREV_IUI);

			// PREV_IVF
			$this->PREV_IVF->LinkCustomAttributes = "";
			$this->PREV_IVF->HrefValue = "";
			$this->PREV_IVF->TooltipValue = "";
			if (!$this->isExport())
				$this->PREV_IVF->ViewValue = $this->highlightValue($this->PREV_IVF);

			// TABLETS
			$this->TABLETS->LinkCustomAttributes = "";
			$this->TABLETS->HrefValue = "";
			$this->TABLETS->TooltipValue = "";
			if (!$this->isExport())
				$this->TABLETS->ViewValue = $this->highlightValue($this->TABLETS);

			// INJTYPE
			$this->INJTYPE->LinkCustomAttributes = "";
			$this->INJTYPE->HrefValue = "";
			$this->INJTYPE->TooltipValue = "";
			if (!$this->isExport())
				$this->INJTYPE->ViewValue = $this->highlightValue($this->INJTYPE);

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// TRIGGERR
			$this->TRIGGERR->LinkCustomAttributes = "";
			$this->TRIGGERR->HrefValue = "";
			$this->TRIGGERR->TooltipValue = "";
			if (!$this->isExport())
				$this->TRIGGERR->ViewValue = $this->highlightValue($this->TRIGGERR);

			// TRIGGERDATE
			$this->TRIGGERDATE->LinkCustomAttributes = "";
			$this->TRIGGERDATE->HrefValue = "";
			$this->TRIGGERDATE->TooltipValue = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->LinkCustomAttributes = "";
			$this->FOLLICLE_STATUS->HrefValue = "";
			$this->FOLLICLE_STATUS->TooltipValue = "";
			if (!$this->isExport())
				$this->FOLLICLE_STATUS->ViewValue = $this->highlightValue($this->FOLLICLE_STATUS);

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->LinkCustomAttributes = "";
			$this->NUMBER_OF_IUI->HrefValue = "";
			$this->NUMBER_OF_IUI->TooltipValue = "";
			if (!$this->isExport())
				$this->NUMBER_OF_IUI->ViewValue = $this->highlightValue($this->NUMBER_OF_IUI);

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";
			$this->PROCEDURE->TooltipValue = "";
			if (!$this->isExport())
				$this->PROCEDURE->ViewValue = $this->highlightValue($this->PROCEDURE);

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
			$this->LUTEAL_SUPPORT->HrefValue = "";
			$this->LUTEAL_SUPPORT->TooltipValue = "";
			if (!$this->isExport())
				$this->LUTEAL_SUPPORT->ViewValue = $this->highlightValue($this->LUTEAL_SUPPORT);

			// H/D SAMPLE
			$this->H2FD_SAMPLE->LinkCustomAttributes = "";
			$this->H2FD_SAMPLE->HrefValue = "";
			$this->H2FD_SAMPLE->TooltipValue = "";
			if (!$this->isExport())
				$this->H2FD_SAMPLE->ViewValue = $this->highlightValue($this->H2FD_SAMPLE);

			// DONOR - I.D
			$this->DONOR___I_D->LinkCustomAttributes = "";
			$this->DONOR___I_D->HrefValue = "";
			$this->DONOR___I_D->TooltipValue = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->LinkCustomAttributes = "";
			$this->PREG_TEST_DATE->HrefValue = "";
			$this->PREG_TEST_DATE->TooltipValue = "";

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->LinkCustomAttributes = "";
			$this->COLLECTION__METHOD->HrefValue = "";
			$this->COLLECTION__METHOD->TooltipValue = "";
			if (!$this->isExport())
				$this->COLLECTION__METHOD->ViewValue = $this->highlightValue($this->COLLECTION__METHOD);

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->LinkCustomAttributes = "";
			$this->SAMPLE_SOURCE->HrefValue = "";
			$this->SAMPLE_SOURCE->TooltipValue = "";
			if (!$this->isExport())
				$this->SAMPLE_SOURCE->ViewValue = $this->highlightValue($this->SAMPLE_SOURCE);

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_PROBLEMS->TooltipValue = "";
			if (!$this->isExport())
				$this->SPECIFIC_PROBLEMS->ViewValue = $this->highlightValue($this->SPECIFIC_PROBLEMS);

			// IMSC_1
			$this->IMSC_1->LinkCustomAttributes = "";
			$this->IMSC_1->HrefValue = "";
			$this->IMSC_1->TooltipValue = "";
			if (!$this->isExport())
				$this->IMSC_1->ViewValue = $this->highlightValue($this->IMSC_1);

			// IMSC_2
			$this->IMSC_2->LinkCustomAttributes = "";
			$this->IMSC_2->HrefValue = "";
			$this->IMSC_2->TooltipValue = "";
			if (!$this->isExport())
				$this->IMSC_2->ViewValue = $this->highlightValue($this->IMSC_2);

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
			$this->LIQUIFACTION_STORAGE->HrefValue = "";
			$this->LIQUIFACTION_STORAGE->TooltipValue = "";
			if (!$this->isExport())
				$this->LIQUIFACTION_STORAGE->ViewValue = $this->highlightValue($this->LIQUIFACTION_STORAGE);

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
			$this->IUI_PREP_METHOD->HrefValue = "";
			$this->IUI_PREP_METHOD->TooltipValue = "";
			if (!$this->isExport())
				$this->IUI_PREP_METHOD->ViewValue = $this->highlightValue($this->IUI_PREP_METHOD);

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
			$this->TIME_FROM_TRIGGER->HrefValue = "";
			$this->TIME_FROM_TRIGGER->TooltipValue = "";
			if (!$this->isExport())
				$this->TIME_FROM_TRIGGER->ViewValue = $this->highlightValue($this->TIME_FROM_TRIGGER);

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
			$this->COLLECTION_TO_PREPARATION->HrefValue = "";
			$this->COLLECTION_TO_PREPARATION->TooltipValue = "";
			if (!$this->isExport())
				$this->COLLECTION_TO_PREPARATION->ViewValue = $this->highlightValue($this->COLLECTION_TO_PREPARATION);

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
			$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
			$this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
			if (!$this->isExport())
				$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->highlightValue($this->TIME_FROM_PREP_TO_INSEM);

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";
			if (!$this->isExport())
				$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->highlightValue($this->SPECIFIC_MATERNAL_PROBLEMS);

			// RESULTS
			$this->RESULTS->LinkCustomAttributes = "";
			$this->RESULTS->HrefValue = "";
			$this->RESULTS->TooltipValue = "";
			if (!$this->isExport())
				$this->RESULTS->ViewValue = $this->highlightValue($this->RESULTS);

			// ONGOING_PREG
			$this->ONGOING_PREG->LinkCustomAttributes = "";
			$this->ONGOING_PREG->HrefValue = "";
			$this->ONGOING_PREG->TooltipValue = "";
			if (!$this->isExport())
				$this->ONGOING_PREG->ViewValue = $this->highlightValue($this->ONGOING_PREG);

			// EDD_Date
			$this->EDD_Date->LinkCustomAttributes = "";
			$this->EDD_Date->HrefValue = "";
			$this->EDD_Date->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// NAME
			$this->NAME->EditAttrs["class"] = "form-control";
			$this->NAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NAME->AdvancedSearch->SearchValue = HtmlDecode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->EditValue = HtmlEncode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

			// HUSBAND NAME
			$this->HUSBAND_NAME->EditAttrs["class"] = "form-control";
			$this->HUSBAND_NAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HUSBAND_NAME->AdvancedSearch->SearchValue = HtmlDecode($this->HUSBAND_NAME->AdvancedSearch->SearchValue);
			$this->HUSBAND_NAME->EditValue = HtmlEncode($this->HUSBAND_NAME->AdvancedSearch->SearchValue);
			$this->HUSBAND_NAME->PlaceHolder = RemoveHtml($this->HUSBAND_NAME->caption());

			// CoupleID
			$this->CoupleID->EditAttrs["class"] = "form-control";
			$this->CoupleID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

			// AGE  - WIFE
			$this->AGE____WIFE->EditAttrs["class"] = "form-control";
			$this->AGE____WIFE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AGE____WIFE->AdvancedSearch->SearchValue = HtmlDecode($this->AGE____WIFE->AdvancedSearch->SearchValue);
			$this->AGE____WIFE->EditValue = HtmlEncode($this->AGE____WIFE->AdvancedSearch->SearchValue);
			$this->AGE____WIFE->PlaceHolder = RemoveHtml($this->AGE____WIFE->caption());

			// AGE- HUSBAND
			$this->AGE__HUSBAND->EditAttrs["class"] = "form-control";
			$this->AGE__HUSBAND->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AGE__HUSBAND->AdvancedSearch->SearchValue = HtmlDecode($this->AGE__HUSBAND->AdvancedSearch->SearchValue);
			$this->AGE__HUSBAND->EditValue = HtmlEncode($this->AGE__HUSBAND->AdvancedSearch->SearchValue);
			$this->AGE__HUSBAND->PlaceHolder = RemoveHtml($this->AGE__HUSBAND->caption());

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditAttrs["class"] = "form-control";
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue = HtmlDecode($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue);
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditValue = HtmlEncode($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue);
			$this->ANXIOUS_TO_CONCEIVE_FOR->PlaceHolder = RemoveHtml($this->ANXIOUS_TO_CONCEIVE_FOR->caption());

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->EditAttrs["class"] = "form-control";
			$this->AMH_28_NG2FML29->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AMH_28_NG2FML29->AdvancedSearch->SearchValue = HtmlDecode($this->AMH_28_NG2FML29->AdvancedSearch->SearchValue);
			$this->AMH_28_NG2FML29->EditValue = HtmlEncode($this->AMH_28_NG2FML29->AdvancedSearch->SearchValue);
			$this->AMH_28_NG2FML29->PlaceHolder = RemoveHtml($this->AMH_28_NG2FML29->caption());

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
			$this->TUBAL_PATENCY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TUBAL_PATENCY->AdvancedSearch->SearchValue = HtmlDecode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
			$this->TUBAL_PATENCY->EditValue = HtmlEncode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
			$this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

			// HSG
			$this->HSG->EditAttrs["class"] = "form-control";
			$this->HSG->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSG->AdvancedSearch->SearchValue = HtmlDecode($this->HSG->AdvancedSearch->SearchValue);
			$this->HSG->EditValue = HtmlEncode($this->HSG->AdvancedSearch->SearchValue);
			$this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

			// DHL
			$this->DHL->EditAttrs["class"] = "form-control";
			$this->DHL->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DHL->AdvancedSearch->SearchValue = HtmlDecode($this->DHL->AdvancedSearch->SearchValue);
			$this->DHL->EditValue = HtmlEncode($this->DHL->AdvancedSearch->SearchValue);
			$this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->UTERINE_PROBLEMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
			$this->UTERINE_PROBLEMS->EditValue = HtmlEncode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
			$this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

			// W_COMORBIDS
			$this->W_COMORBIDS->EditAttrs["class"] = "form-control";
			$this->W_COMORBIDS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->W_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
			$this->W_COMORBIDS->EditValue = HtmlEncode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
			$this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

			// H_COMORBIDS
			$this->H_COMORBIDS->EditAttrs["class"] = "form-control";
			$this->H_COMORBIDS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->H_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
			$this->H_COMORBIDS->EditValue = HtmlEncode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
			$this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
			$this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
			$this->SEXUAL_DYSFUNCTION->EditValue = HtmlEncode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
			$this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

			// PREV IUI
			$this->PREV_IUI->EditAttrs["class"] = "form-control";
			$this->PREV_IUI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PREV_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->PREV_IUI->AdvancedSearch->SearchValue);
			$this->PREV_IUI->EditValue = HtmlEncode($this->PREV_IUI->AdvancedSearch->SearchValue);
			$this->PREV_IUI->PlaceHolder = RemoveHtml($this->PREV_IUI->caption());

			// PREV_IVF
			$this->PREV_IVF->EditAttrs["class"] = "form-control";
			$this->PREV_IVF->EditCustomAttributes = "";
			$this->PREV_IVF->EditValue = HtmlEncode($this->PREV_IVF->AdvancedSearch->SearchValue);
			$this->PREV_IVF->PlaceHolder = RemoveHtml($this->PREV_IVF->caption());

			// TABLETS
			$this->TABLETS->EditAttrs["class"] = "form-control";
			$this->TABLETS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TABLETS->AdvancedSearch->SearchValue = HtmlDecode($this->TABLETS->AdvancedSearch->SearchValue);
			$this->TABLETS->EditValue = HtmlEncode($this->TABLETS->AdvancedSearch->SearchValue);
			$this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

			// INJTYPE
			$this->INJTYPE->EditAttrs["class"] = "form-control";
			$this->INJTYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->INJTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->INJTYPE->AdvancedSearch->SearchValue);
			$this->INJTYPE->EditValue = HtmlEncode($this->INJTYPE->AdvancedSearch->SearchValue);
			$this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

			// LMP
			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 0), 8));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// TRIGGERR
			$this->TRIGGERR->EditAttrs["class"] = "form-control";
			$this->TRIGGERR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

			// TRIGGERDATE
			$this->TRIGGERDATE->EditAttrs["class"] = "form-control";
			$this->TRIGGERDATE->EditCustomAttributes = "";
			$this->TRIGGERDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TRIGGERDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
			$this->FOLLICLE_STATUS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
			$this->FOLLICLE_STATUS->EditValue = HtmlEncode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
			$this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
			$this->NUMBER_OF_IUI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
			$this->NUMBER_OF_IUI->EditValue = HtmlEncode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
			$this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

			// PROCEDURE
			$this->PROCEDURE->EditAttrs["class"] = "form-control";
			$this->PROCEDURE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PROCEDURE->AdvancedSearch->SearchValue = HtmlDecode($this->PROCEDURE->AdvancedSearch->SearchValue);
			$this->PROCEDURE->EditValue = HtmlEncode($this->PROCEDURE->AdvancedSearch->SearchValue);
			$this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
			$this->LUTEAL_SUPPORT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = HtmlDecode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
			$this->LUTEAL_SUPPORT->EditValue = HtmlEncode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
			$this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

			// H/D SAMPLE
			$this->H2FD_SAMPLE->EditAttrs["class"] = "form-control";
			$this->H2FD_SAMPLE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->H2FD_SAMPLE->AdvancedSearch->SearchValue = HtmlDecode($this->H2FD_SAMPLE->AdvancedSearch->SearchValue);
			$this->H2FD_SAMPLE->EditValue = HtmlEncode($this->H2FD_SAMPLE->AdvancedSearch->SearchValue);
			$this->H2FD_SAMPLE->PlaceHolder = RemoveHtml($this->H2FD_SAMPLE->caption());

			// DONOR - I.D
			$this->DONOR___I_D->EditAttrs["class"] = "form-control";
			$this->DONOR___I_D->EditCustomAttributes = "";
			$this->DONOR___I_D->EditValue = HtmlEncode($this->DONOR___I_D->AdvancedSearch->SearchValue);
			$this->DONOR___I_D->PlaceHolder = RemoveHtml($this->DONOR___I_D->caption());

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->EditAttrs["class"] = "form-control";
			$this->COLLECTION__METHOD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->COLLECTION__METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION__METHOD->AdvancedSearch->SearchValue);
			$this->COLLECTION__METHOD->EditValue = HtmlEncode($this->COLLECTION__METHOD->AdvancedSearch->SearchValue);
			$this->COLLECTION__METHOD->PlaceHolder = RemoveHtml($this->COLLECTION__METHOD->caption());

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->EditAttrs["class"] = "form-control";
			$this->SAMPLE_SOURCE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SAMPLE_SOURCE->AdvancedSearch->SearchValue = HtmlDecode($this->SAMPLE_SOURCE->AdvancedSearch->SearchValue);
			$this->SAMPLE_SOURCE->EditValue = HtmlEncode($this->SAMPLE_SOURCE->AdvancedSearch->SearchValue);
			$this->SAMPLE_SOURCE->PlaceHolder = RemoveHtml($this->SAMPLE_SOURCE->caption());

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

			// IMSC_1
			$this->IMSC_1->EditAttrs["class"] = "form-control";
			$this->IMSC_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IMSC_1->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_1->AdvancedSearch->SearchValue);
			$this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->AdvancedSearch->SearchValue);
			$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

			// IMSC_2
			$this->IMSC_2->EditAttrs["class"] = "form-control";
			$this->IMSC_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IMSC_2->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_2->AdvancedSearch->SearchValue);
			$this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->AdvancedSearch->SearchValue);
			$this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
			$this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = HtmlDecode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
			$this->LIQUIFACTION_STORAGE->EditValue = HtmlEncode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
			$this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
			$this->IUI_PREP_METHOD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
			$this->IUI_PREP_METHOD->EditValue = HtmlEncode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
			$this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
			$this->TIME_FROM_TRIGGER->EditValue = HtmlEncode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
			$this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
			$this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
			$this->COLLECTION_TO_PREPARATION->EditValue = HtmlEncode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
			$this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
			$this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
			$this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

			// RESULTS
			$this->RESULTS->EditAttrs["class"] = "form-control";
			$this->RESULTS->EditCustomAttributes = "";
			$this->RESULTS->EditValue = HtmlEncode($this->RESULTS->AdvancedSearch->SearchValue);
			$this->RESULTS->PlaceHolder = RemoveHtml($this->RESULTS->caption());

			// ONGOING_PREG
			$this->ONGOING_PREG->EditAttrs["class"] = "form-control";
			$this->ONGOING_PREG->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ONGOING_PREG->AdvancedSearch->SearchValue = HtmlDecode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
			$this->ONGOING_PREG->EditValue = HtmlEncode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
			$this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

			// EDD_Date
			$this->EDD_Date->EditAttrs["class"] = "form-control";
			$this->EDD_Date->EditCustomAttributes = "";
			$this->EDD_Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue, 0), 8));
			$this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
			$this->EDD_Date->EditAttrs["class"] = "form-control";
			$this->EDD_Date->EditCustomAttributes = "";
			$this->EDD_Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue2, 0), 8));
			$this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
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
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
		}
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
		}
		if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EDD_Date->errorMessage());
		}
		if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->EDD_Date->errorMessage());
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
		$this->NAME->AdvancedSearch->load();
		$this->HUSBAND_NAME->AdvancedSearch->load();
		$this->CoupleID->AdvancedSearch->load();
		$this->AGE____WIFE->AdvancedSearch->load();
		$this->AGE__HUSBAND->AdvancedSearch->load();
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->load();
		$this->AMH_28_NG2FML29->AdvancedSearch->load();
		$this->TUBAL_PATENCY->AdvancedSearch->load();
		$this->HSG->AdvancedSearch->load();
		$this->DHL->AdvancedSearch->load();
		$this->UTERINE_PROBLEMS->AdvancedSearch->load();
		$this->W_COMORBIDS->AdvancedSearch->load();
		$this->H_COMORBIDS->AdvancedSearch->load();
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
		$this->PREV_IUI->AdvancedSearch->load();
		$this->PREV_IVF->AdvancedSearch->load();
		$this->TABLETS->AdvancedSearch->load();
		$this->INJTYPE->AdvancedSearch->load();
		$this->LMP->AdvancedSearch->load();
		$this->TRIGGERR->AdvancedSearch->load();
		$this->TRIGGERDATE->AdvancedSearch->load();
		$this->FOLLICLE_STATUS->AdvancedSearch->load();
		$this->NUMBER_OF_IUI->AdvancedSearch->load();
		$this->PROCEDURE->AdvancedSearch->load();
		$this->LUTEAL_SUPPORT->AdvancedSearch->load();
		$this->H2FD_SAMPLE->AdvancedSearch->load();
		$this->DONOR___I_D->AdvancedSearch->load();
		$this->PREG_TEST_DATE->AdvancedSearch->load();
		$this->COLLECTION__METHOD->AdvancedSearch->load();
		$this->SAMPLE_SOURCE->AdvancedSearch->load();
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
		$this->IMSC_1->AdvancedSearch->load();
		$this->IMSC_2->AdvancedSearch->load();
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
		$this->IUI_PREP_METHOD->AdvancedSearch->load();
		$this->TIME_FROM_TRIGGER->AdvancedSearch->load();
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
		$this->RESULTS->AdvancedSearch->load();
		$this->ONGOING_PREG->AdvancedSearch->load();
		$this->EDD_Date->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_iui_excellist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_iui_excellist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_iui_excellist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_iui_excel\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_iui_excel',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_iui_excellist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
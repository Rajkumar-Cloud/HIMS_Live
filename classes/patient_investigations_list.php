<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_investigations_list extends patient_investigations
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_investigations';

	// Page object name
	public $PageObjName = "patient_investigations_list";

	// Grid form hidden field names
	public $FormName = "fpatient_investigationslist";
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

		// Table object (patient_investigations)
		if (!isset($GLOBALS["patient_investigations"]) || get_class($GLOBALS["patient_investigations"]) == PROJECT_NAMESPACE . "patient_investigations") {
			$GLOBALS["patient_investigations"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_investigations"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "patient_investigationsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patient_investigationsdelete.php";
		$this->MultiUpdateUrl = "patient_investigationsupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_investigations');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpatient_investigationslistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $EXPORT, $patient_investigations;
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
				$doc = new $class($patient_investigations);
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

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->setVisibility();
		$this->Reception->Visible = FALSE;
		$this->PatientId->Visible = FALSE;
		$this->PatientName->Visible = FALSE;
		$this->Investigation->setVisibility();
		$this->Value->setVisibility();
		$this->NormalRange->setVisibility();
		$this->mrnno->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->SampleCollected->setVisibility();
		$this->SampleCollectedBy->setVisibility();
		$this->ResultedDate->setVisibility();
		$this->ResultedBy->setVisibility();
		$this->Modified->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->Created->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->GroupHead->setVisibility();
		$this->Cost->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->PayMode->setVisibility();
		$this->VoucherNo->setVisibility();
		$this->InvestigationMultiselect->Visible = FALSE;
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

		// Set up master detail parameters
		$this->setupMasterParms();

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
		$this->AllowAddDeleteRow = FALSE; // Do not allow add/delete row

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

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ip_admissionlist.php"); // Return to master page
			} else {
				$ip_admission->loadListRowValues($rsmaster);
				$ip_admission->RowType = ROWTYPE_MASTER; // Master row
				$ip_admission->renderListRow();
				$rsmaster->close();
			}
		}

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
		$this->Cost->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_Investigation") && $CurrentForm->hasValue("o_Investigation") && $this->Investigation->CurrentValue <> $this->Investigation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Value") && $CurrentForm->hasValue("o_Value") && $this->Value->CurrentValue <> $this->Value->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NormalRange") && $CurrentForm->hasValue("o_NormalRange") && $this->NormalRange->CurrentValue <> $this->NormalRange->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue <> $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue <> $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue <> $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleCollected") && $CurrentForm->hasValue("o_SampleCollected") && $this->SampleCollected->CurrentValue <> $this->SampleCollected->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleCollectedBy") && $CurrentForm->hasValue("o_SampleCollectedBy") && $this->SampleCollectedBy->CurrentValue <> $this->SampleCollectedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultedDate") && $CurrentForm->hasValue("o_ResultedDate") && $this->ResultedDate->CurrentValue <> $this->ResultedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultedBy") && $CurrentForm->hasValue("o_ResultedBy") && $this->ResultedBy->CurrentValue <> $this->ResultedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Modified") && $CurrentForm->hasValue("o_Modified") && $this->Modified->CurrentValue <> $this->Modified->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModifiedBy") && $CurrentForm->hasValue("o_ModifiedBy") && $this->ModifiedBy->CurrentValue <> $this->ModifiedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Created") && $CurrentForm->hasValue("o_Created") && $this->Created->CurrentValue <> $this->Created->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CreatedBy") && $CurrentForm->hasValue("o_CreatedBy") && $this->CreatedBy->CurrentValue <> $this->CreatedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GroupHead") && $CurrentForm->hasValue("o_GroupHead") && $this->GroupHead->CurrentValue <> $this->GroupHead->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Cost") && $CurrentForm->hasValue("o_Cost") && $this->Cost->CurrentValue <> $this->Cost->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PaymentStatus") && $CurrentForm->hasValue("o_PaymentStatus") && $this->PaymentStatus->CurrentValue <> $this->PaymentStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PayMode") && $CurrentForm->hasValue("o_PayMode") && $this->PayMode->CurrentValue <> $this->PayMode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VoucherNo") && $CurrentForm->hasValue("o_VoucherNo") && $this->VoucherNo->CurrentValue <> $this->VoucherNo->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_investigationslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Investigation->AdvancedSearch->toJson(), ","); // Field Investigation
		$filterList = Concat($filterList, $this->Value->AdvancedSearch->toJson(), ","); // Field Value
		$filterList = Concat($filterList, $this->NormalRange->AdvancedSearch->toJson(), ","); // Field NormalRange
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->SampleCollected->AdvancedSearch->toJson(), ","); // Field SampleCollected
		$filterList = Concat($filterList, $this->SampleCollectedBy->AdvancedSearch->toJson(), ","); // Field SampleCollectedBy
		$filterList = Concat($filterList, $this->ResultedDate->AdvancedSearch->toJson(), ","); // Field ResultedDate
		$filterList = Concat($filterList, $this->ResultedBy->AdvancedSearch->toJson(), ","); // Field ResultedBy
		$filterList = Concat($filterList, $this->Modified->AdvancedSearch->toJson(), ","); // Field Modified
		$filterList = Concat($filterList, $this->ModifiedBy->AdvancedSearch->toJson(), ","); // Field ModifiedBy
		$filterList = Concat($filterList, $this->Created->AdvancedSearch->toJson(), ","); // Field Created
		$filterList = Concat($filterList, $this->CreatedBy->AdvancedSearch->toJson(), ","); // Field CreatedBy
		$filterList = Concat($filterList, $this->GroupHead->AdvancedSearch->toJson(), ","); // Field GroupHead
		$filterList = Concat($filterList, $this->Cost->AdvancedSearch->toJson(), ","); // Field Cost
		$filterList = Concat($filterList, $this->PaymentStatus->AdvancedSearch->toJson(), ","); // Field PaymentStatus
		$filterList = Concat($filterList, $this->PayMode->AdvancedSearch->toJson(), ","); // Field PayMode
		$filterList = Concat($filterList, $this->VoucherNo->AdvancedSearch->toJson(), ","); // Field VoucherNo
		$filterList = Concat($filterList, $this->InvestigationMultiselect->AdvancedSearch->toJson(), ","); // Field InvestigationMultiselect
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatient_investigationslistsrch", $filters);
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

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

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

		// Field Investigation
		$this->Investigation->AdvancedSearch->SearchValue = @$filter["x_Investigation"];
		$this->Investigation->AdvancedSearch->SearchOperator = @$filter["z_Investigation"];
		$this->Investigation->AdvancedSearch->SearchCondition = @$filter["v_Investigation"];
		$this->Investigation->AdvancedSearch->SearchValue2 = @$filter["y_Investigation"];
		$this->Investigation->AdvancedSearch->SearchOperator2 = @$filter["w_Investigation"];
		$this->Investigation->AdvancedSearch->save();

		// Field Value
		$this->Value->AdvancedSearch->SearchValue = @$filter["x_Value"];
		$this->Value->AdvancedSearch->SearchOperator = @$filter["z_Value"];
		$this->Value->AdvancedSearch->SearchCondition = @$filter["v_Value"];
		$this->Value->AdvancedSearch->SearchValue2 = @$filter["y_Value"];
		$this->Value->AdvancedSearch->SearchOperator2 = @$filter["w_Value"];
		$this->Value->AdvancedSearch->save();

		// Field NormalRange
		$this->NormalRange->AdvancedSearch->SearchValue = @$filter["x_NormalRange"];
		$this->NormalRange->AdvancedSearch->SearchOperator = @$filter["z_NormalRange"];
		$this->NormalRange->AdvancedSearch->SearchCondition = @$filter["v_NormalRange"];
		$this->NormalRange->AdvancedSearch->SearchValue2 = @$filter["y_NormalRange"];
		$this->NormalRange->AdvancedSearch->SearchOperator2 = @$filter["w_NormalRange"];
		$this->NormalRange->AdvancedSearch->save();

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field Gender
		$this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
		$this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
		$this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
		$this->Gender->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field SampleCollected
		$this->SampleCollected->AdvancedSearch->SearchValue = @$filter["x_SampleCollected"];
		$this->SampleCollected->AdvancedSearch->SearchOperator = @$filter["z_SampleCollected"];
		$this->SampleCollected->AdvancedSearch->SearchCondition = @$filter["v_SampleCollected"];
		$this->SampleCollected->AdvancedSearch->SearchValue2 = @$filter["y_SampleCollected"];
		$this->SampleCollected->AdvancedSearch->SearchOperator2 = @$filter["w_SampleCollected"];
		$this->SampleCollected->AdvancedSearch->save();

		// Field SampleCollectedBy
		$this->SampleCollectedBy->AdvancedSearch->SearchValue = @$filter["x_SampleCollectedBy"];
		$this->SampleCollectedBy->AdvancedSearch->SearchOperator = @$filter["z_SampleCollectedBy"];
		$this->SampleCollectedBy->AdvancedSearch->SearchCondition = @$filter["v_SampleCollectedBy"];
		$this->SampleCollectedBy->AdvancedSearch->SearchValue2 = @$filter["y_SampleCollectedBy"];
		$this->SampleCollectedBy->AdvancedSearch->SearchOperator2 = @$filter["w_SampleCollectedBy"];
		$this->SampleCollectedBy->AdvancedSearch->save();

		// Field ResultedDate
		$this->ResultedDate->AdvancedSearch->SearchValue = @$filter["x_ResultedDate"];
		$this->ResultedDate->AdvancedSearch->SearchOperator = @$filter["z_ResultedDate"];
		$this->ResultedDate->AdvancedSearch->SearchCondition = @$filter["v_ResultedDate"];
		$this->ResultedDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultedDate"];
		$this->ResultedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultedDate"];
		$this->ResultedDate->AdvancedSearch->save();

		// Field ResultedBy
		$this->ResultedBy->AdvancedSearch->SearchValue = @$filter["x_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchOperator = @$filter["z_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchCondition = @$filter["v_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->save();

		// Field Modified
		$this->Modified->AdvancedSearch->SearchValue = @$filter["x_Modified"];
		$this->Modified->AdvancedSearch->SearchOperator = @$filter["z_Modified"];
		$this->Modified->AdvancedSearch->SearchCondition = @$filter["v_Modified"];
		$this->Modified->AdvancedSearch->SearchValue2 = @$filter["y_Modified"];
		$this->Modified->AdvancedSearch->SearchOperator2 = @$filter["w_Modified"];
		$this->Modified->AdvancedSearch->save();

		// Field ModifiedBy
		$this->ModifiedBy->AdvancedSearch->SearchValue = @$filter["x_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator = @$filter["z_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchCondition = @$filter["v_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->save();

		// Field Created
		$this->Created->AdvancedSearch->SearchValue = @$filter["x_Created"];
		$this->Created->AdvancedSearch->SearchOperator = @$filter["z_Created"];
		$this->Created->AdvancedSearch->SearchCondition = @$filter["v_Created"];
		$this->Created->AdvancedSearch->SearchValue2 = @$filter["y_Created"];
		$this->Created->AdvancedSearch->SearchOperator2 = @$filter["w_Created"];
		$this->Created->AdvancedSearch->save();

		// Field CreatedBy
		$this->CreatedBy->AdvancedSearch->SearchValue = @$filter["x_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator = @$filter["z_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchCondition = @$filter["v_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchValue2 = @$filter["y_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->save();

		// Field GroupHead
		$this->GroupHead->AdvancedSearch->SearchValue = @$filter["x_GroupHead"];
		$this->GroupHead->AdvancedSearch->SearchOperator = @$filter["z_GroupHead"];
		$this->GroupHead->AdvancedSearch->SearchCondition = @$filter["v_GroupHead"];
		$this->GroupHead->AdvancedSearch->SearchValue2 = @$filter["y_GroupHead"];
		$this->GroupHead->AdvancedSearch->SearchOperator2 = @$filter["w_GroupHead"];
		$this->GroupHead->AdvancedSearch->save();

		// Field Cost
		$this->Cost->AdvancedSearch->SearchValue = @$filter["x_Cost"];
		$this->Cost->AdvancedSearch->SearchOperator = @$filter["z_Cost"];
		$this->Cost->AdvancedSearch->SearchCondition = @$filter["v_Cost"];
		$this->Cost->AdvancedSearch->SearchValue2 = @$filter["y_Cost"];
		$this->Cost->AdvancedSearch->SearchOperator2 = @$filter["w_Cost"];
		$this->Cost->AdvancedSearch->save();

		// Field PaymentStatus
		$this->PaymentStatus->AdvancedSearch->SearchValue = @$filter["x_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchOperator = @$filter["z_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchCondition = @$filter["v_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchValue2 = @$filter["y_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->save();

		// Field PayMode
		$this->PayMode->AdvancedSearch->SearchValue = @$filter["x_PayMode"];
		$this->PayMode->AdvancedSearch->SearchOperator = @$filter["z_PayMode"];
		$this->PayMode->AdvancedSearch->SearchCondition = @$filter["v_PayMode"];
		$this->PayMode->AdvancedSearch->SearchValue2 = @$filter["y_PayMode"];
		$this->PayMode->AdvancedSearch->SearchOperator2 = @$filter["w_PayMode"];
		$this->PayMode->AdvancedSearch->save();

		// Field VoucherNo
		$this->VoucherNo->AdvancedSearch->SearchValue = @$filter["x_VoucherNo"];
		$this->VoucherNo->AdvancedSearch->SearchOperator = @$filter["z_VoucherNo"];
		$this->VoucherNo->AdvancedSearch->SearchCondition = @$filter["v_VoucherNo"];
		$this->VoucherNo->AdvancedSearch->SearchValue2 = @$filter["y_VoucherNo"];
		$this->VoucherNo->AdvancedSearch->SearchOperator2 = @$filter["w_VoucherNo"];
		$this->VoucherNo->AdvancedSearch->save();

		// Field InvestigationMultiselect
		$this->InvestigationMultiselect->AdvancedSearch->SearchValue = @$filter["x_InvestigationMultiselect"];
		$this->InvestigationMultiselect->AdvancedSearch->SearchOperator = @$filter["z_InvestigationMultiselect"];
		$this->InvestigationMultiselect->AdvancedSearch->SearchCondition = @$filter["v_InvestigationMultiselect"];
		$this->InvestigationMultiselect->AdvancedSearch->SearchValue2 = @$filter["y_InvestigationMultiselect"];
		$this->InvestigationMultiselect->AdvancedSearch->SearchOperator2 = @$filter["w_InvestigationMultiselect"];
		$this->InvestigationMultiselect->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->Reception, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Investigation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Value, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NormalRange, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SampleCollectedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ResultedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModifiedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CreatedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GroupHead, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PaymentStatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PayMode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VoucherNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->InvestigationMultiselect, $arKeywords, $type);
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
			$this->updateSort($this->Investigation); // Investigation
			$this->updateSort($this->Value); // Value
			$this->updateSort($this->NormalRange); // NormalRange
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->Gender); // Gender
			$this->updateSort($this->SampleCollected); // SampleCollected
			$this->updateSort($this->SampleCollectedBy); // SampleCollectedBy
			$this->updateSort($this->ResultedDate); // ResultedDate
			$this->updateSort($this->ResultedBy); // ResultedBy
			$this->updateSort($this->Modified); // Modified
			$this->updateSort($this->ModifiedBy); // ModifiedBy
			$this->updateSort($this->Created); // Created
			$this->updateSort($this->CreatedBy); // CreatedBy
			$this->updateSort($this->GroupHead); // GroupHead
			$this->updateSort($this->Cost); // Cost
			$this->updateSort($this->PaymentStatus); // PaymentStatus
			$this->updateSort($this->PayMode); // PayMode
			$this->updateSort($this->VoucherNo); // VoucherNo
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->Reception->setSessionValue("");
				$this->PatientId->setSessionValue("");
				$this->mrnno->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->Investigation->setSort("");
				$this->Value->setSort("");
				$this->NormalRange->setSort("");
				$this->mrnno->setSort("");
				$this->Age->setSort("");
				$this->Gender->setSort("");
				$this->SampleCollected->setSort("");
				$this->SampleCollectedBy->setSort("");
				$this->ResultedDate->setSort("");
				$this->ResultedBy->setSort("");
				$this->Modified->setSort("");
				$this->ModifiedBy->setSort("");
				$this->Created->setSort("");
				$this->CreatedBy->setSort("");
				$this->GroupHead->setSort("");
				$this->Cost->setSort("");
				$this->PaymentStatus->setSort("");
				$this->PayMode->setSort("");
				$this->VoucherNo->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_investigationslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_investigationslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fpatient_investigationslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_investigationslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Investigation->CurrentValue = NULL;
		$this->Investigation->OldValue = $this->Investigation->CurrentValue;
		$this->Value->CurrentValue = NULL;
		$this->Value->OldValue = $this->Value->CurrentValue;
		$this->NormalRange->CurrentValue = NULL;
		$this->NormalRange->OldValue = $this->NormalRange->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->SampleCollected->CurrentValue = NULL;
		$this->SampleCollected->OldValue = $this->SampleCollected->CurrentValue;
		$this->SampleCollectedBy->CurrentValue = NULL;
		$this->SampleCollectedBy->OldValue = $this->SampleCollectedBy->CurrentValue;
		$this->ResultedDate->CurrentValue = NULL;
		$this->ResultedDate->OldValue = $this->ResultedDate->CurrentValue;
		$this->ResultedBy->CurrentValue = NULL;
		$this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
		$this->Modified->CurrentValue = NULL;
		$this->Modified->OldValue = $this->Modified->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->Created->CurrentValue = NULL;
		$this->Created->OldValue = $this->Created->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->GroupHead->CurrentValue = NULL;
		$this->GroupHead->OldValue = $this->GroupHead->CurrentValue;
		$this->Cost->CurrentValue = NULL;
		$this->Cost->OldValue = $this->Cost->CurrentValue;
		$this->PaymentStatus->CurrentValue = NULL;
		$this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
		$this->PayMode->CurrentValue = NULL;
		$this->PayMode->OldValue = $this->PayMode->CurrentValue;
		$this->VoucherNo->CurrentValue = NULL;
		$this->VoucherNo->OldValue = $this->VoucherNo->CurrentValue;
		$this->InvestigationMultiselect->CurrentValue = NULL;
		$this->InvestigationMultiselect->OldValue = $this->InvestigationMultiselect->CurrentValue;
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'Investigation' first before field var 'x_Investigation'
		$val = $CurrentForm->hasValue("Investigation") ? $CurrentForm->getValue("Investigation") : $CurrentForm->getValue("x_Investigation");
		if (!$this->Investigation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Investigation->Visible = FALSE; // Disable update for API request
			else
				$this->Investigation->setFormValue($val);
		}
		$this->Investigation->setOldValue($CurrentForm->getValue("o_Investigation"));

		// Check field name 'Value' first before field var 'x_Value'
		$val = $CurrentForm->hasValue("Value") ? $CurrentForm->getValue("Value") : $CurrentForm->getValue("x_Value");
		if (!$this->Value->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Value->Visible = FALSE; // Disable update for API request
			else
				$this->Value->setFormValue($val);
		}
		$this->Value->setOldValue($CurrentForm->getValue("o_Value"));

		// Check field name 'NormalRange' first before field var 'x_NormalRange'
		$val = $CurrentForm->hasValue("NormalRange") ? $CurrentForm->getValue("NormalRange") : $CurrentForm->getValue("x_NormalRange");
		if (!$this->NormalRange->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NormalRange->Visible = FALSE; // Disable update for API request
			else
				$this->NormalRange->setFormValue($val);
		}
		$this->NormalRange->setOldValue($CurrentForm->getValue("o_NormalRange"));

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		$this->Age->setOldValue($CurrentForm->getValue("o_Age"));

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		$this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));

		// Check field name 'SampleCollected' first before field var 'x_SampleCollected'
		$val = $CurrentForm->hasValue("SampleCollected") ? $CurrentForm->getValue("SampleCollected") : $CurrentForm->getValue("x_SampleCollected");
		if (!$this->SampleCollected->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleCollected->Visible = FALSE; // Disable update for API request
			else
				$this->SampleCollected->setFormValue($val);
			$this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
		}
		$this->SampleCollected->setOldValue($CurrentForm->getValue("o_SampleCollected"));

		// Check field name 'SampleCollectedBy' first before field var 'x_SampleCollectedBy'
		$val = $CurrentForm->hasValue("SampleCollectedBy") ? $CurrentForm->getValue("SampleCollectedBy") : $CurrentForm->getValue("x_SampleCollectedBy");
		if (!$this->SampleCollectedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleCollectedBy->Visible = FALSE; // Disable update for API request
			else
				$this->SampleCollectedBy->setFormValue($val);
		}
		$this->SampleCollectedBy->setOldValue($CurrentForm->getValue("o_SampleCollectedBy"));

		// Check field name 'ResultedDate' first before field var 'x_ResultedDate'
		$val = $CurrentForm->hasValue("ResultedDate") ? $CurrentForm->getValue("ResultedDate") : $CurrentForm->getValue("x_ResultedDate");
		if (!$this->ResultedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedDate->setFormValue($val);
			$this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
		}
		$this->ResultedDate->setOldValue($CurrentForm->getValue("o_ResultedDate"));

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}
		$this->ResultedBy->setOldValue($CurrentForm->getValue("o_ResultedBy"));

		// Check field name 'Modified' first before field var 'x_Modified'
		$val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
		if (!$this->Modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modified->Visible = FALSE; // Disable update for API request
			else
				$this->Modified->setFormValue($val);
			$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
		}
		$this->Modified->setOldValue($CurrentForm->getValue("o_Modified"));

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}
		$this->ModifiedBy->setOldValue($CurrentForm->getValue("o_ModifiedBy"));

		// Check field name 'Created' first before field var 'x_Created'
		$val = $CurrentForm->hasValue("Created") ? $CurrentForm->getValue("Created") : $CurrentForm->getValue("x_Created");
		if (!$this->Created->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Created->Visible = FALSE; // Disable update for API request
			else
				$this->Created->setFormValue($val);
			$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		}
		$this->Created->setOldValue($CurrentForm->getValue("o_Created"));

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}
		$this->CreatedBy->setOldValue($CurrentForm->getValue("o_CreatedBy"));

		// Check field name 'GroupHead' first before field var 'x_GroupHead'
		$val = $CurrentForm->hasValue("GroupHead") ? $CurrentForm->getValue("GroupHead") : $CurrentForm->getValue("x_GroupHead");
		if (!$this->GroupHead->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupHead->Visible = FALSE; // Disable update for API request
			else
				$this->GroupHead->setFormValue($val);
		}
		$this->GroupHead->setOldValue($CurrentForm->getValue("o_GroupHead"));

		// Check field name 'Cost' first before field var 'x_Cost'
		$val = $CurrentForm->hasValue("Cost") ? $CurrentForm->getValue("Cost") : $CurrentForm->getValue("x_Cost");
		if (!$this->Cost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cost->Visible = FALSE; // Disable update for API request
			else
				$this->Cost->setFormValue($val);
		}
		$this->Cost->setOldValue($CurrentForm->getValue("o_Cost"));

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}
		$this->PaymentStatus->setOldValue($CurrentForm->getValue("o_PaymentStatus"));

		// Check field name 'PayMode' first before field var 'x_PayMode'
		$val = $CurrentForm->hasValue("PayMode") ? $CurrentForm->getValue("PayMode") : $CurrentForm->getValue("x_PayMode");
		if (!$this->PayMode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PayMode->Visible = FALSE; // Disable update for API request
			else
				$this->PayMode->setFormValue($val);
		}
		$this->PayMode->setOldValue($CurrentForm->getValue("o_PayMode"));

		// Check field name 'VoucherNo' first before field var 'x_VoucherNo'
		$val = $CurrentForm->hasValue("VoucherNo") ? $CurrentForm->getValue("VoucherNo") : $CurrentForm->getValue("x_VoucherNo");
		if (!$this->VoucherNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VoucherNo->Visible = FALSE; // Disable update for API request
			else
				$this->VoucherNo->setFormValue($val);
		}
		$this->VoucherNo->setOldValue($CurrentForm->getValue("o_VoucherNo"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Investigation->CurrentValue = $this->Investigation->FormValue;
		$this->Value->CurrentValue = $this->Value->FormValue;
		$this->NormalRange->CurrentValue = $this->NormalRange->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->SampleCollected->CurrentValue = $this->SampleCollected->FormValue;
		$this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
		$this->SampleCollectedBy->CurrentValue = $this->SampleCollectedBy->FormValue;
		$this->ResultedDate->CurrentValue = $this->ResultedDate->FormValue;
		$this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
		$this->Modified->CurrentValue = $this->Modified->FormValue;
		$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->Created->CurrentValue = $this->Created->FormValue;
		$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->GroupHead->CurrentValue = $this->GroupHead->FormValue;
		$this->Cost->CurrentValue = $this->Cost->FormValue;
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->PayMode->CurrentValue = $this->PayMode->FormValue;
		$this->VoucherNo->CurrentValue = $this->VoucherNo->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Investigation->setDbValue($row['Investigation']);
		$this->Value->setDbValue($row['Value']);
		$this->NormalRange->setDbValue($row['NormalRange']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->SampleCollected->setDbValue($row['SampleCollected']);
		$this->SampleCollectedBy->setDbValue($row['SampleCollectedBy']);
		$this->ResultedDate->setDbValue($row['ResultedDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->Modified->setDbValue($row['Modified']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->GroupHead->setDbValue($row['GroupHead']);
		$this->Cost->setDbValue($row['Cost']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->PayMode->setDbValue($row['PayMode']);
		$this->VoucherNo->setDbValue($row['VoucherNo']);
		$this->InvestigationMultiselect->setDbValue($row['InvestigationMultiselect']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Investigation'] = $this->Investigation->CurrentValue;
		$row['Value'] = $this->Value->CurrentValue;
		$row['NormalRange'] = $this->NormalRange->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['SampleCollected'] = $this->SampleCollected->CurrentValue;
		$row['SampleCollectedBy'] = $this->SampleCollectedBy->CurrentValue;
		$row['ResultedDate'] = $this->ResultedDate->CurrentValue;
		$row['ResultedBy'] = $this->ResultedBy->CurrentValue;
		$row['Modified'] = $this->Modified->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['Created'] = $this->Created->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['GroupHead'] = $this->GroupHead->CurrentValue;
		$row['Cost'] = $this->Cost->CurrentValue;
		$row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
		$row['PayMode'] = $this->PayMode->CurrentValue;
		$row['VoucherNo'] = $this->VoucherNo->CurrentValue;
		$row['InvestigationMultiselect'] = $this->InvestigationMultiselect->CurrentValue;
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
		if ($this->Cost->FormValue == $this->Cost->CurrentValue && is_numeric(ConvertToFloatString($this->Cost->CurrentValue)))
			$this->Cost->CurrentValue = ConvertToFloatString($this->Cost->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// PatientId
		// PatientName
		// Investigation
		// Value
		// NormalRange
		// mrnno
		// Age
		// Gender
		// profilePic
		// SampleCollected
		// SampleCollectedBy
		// ResultedDate
		// ResultedBy
		// Modified
		// ModifiedBy
		// Created
		// CreatedBy
		// GroupHead
		// Cost
		// PaymentStatus
		// PayMode
		// VoucherNo
		// InvestigationMultiselect

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Investigation
			$this->Investigation->ViewValue = $this->Investigation->CurrentValue;
			$this->Investigation->ViewCustomAttributes = "";

			// Value
			$this->Value->ViewValue = $this->Value->CurrentValue;
			$this->Value->ViewCustomAttributes = "";

			// NormalRange
			$this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
			$this->NormalRange->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// SampleCollected
			$this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
			$this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
			$this->SampleCollected->ViewCustomAttributes = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
			$this->SampleCollectedBy->ViewCustomAttributes = "";

			// ResultedDate
			$this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
			$this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
			$this->ResultedDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// Modified
			$this->Modified->ViewValue = $this->Modified->CurrentValue;
			$this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
			$this->Modified->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// Created
			$this->Created->ViewValue = $this->Created->CurrentValue;
			$this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
			$this->Created->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// GroupHead
			$this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
			$this->GroupHead->ViewCustomAttributes = "";

			// Cost
			$this->Cost->ViewValue = $this->Cost->CurrentValue;
			$this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
			$this->Cost->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewCustomAttributes = "";

			// PayMode
			$this->PayMode->ViewValue = $this->PayMode->CurrentValue;
			$this->PayMode->ViewCustomAttributes = "";

			// VoucherNo
			$this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
			$this->VoucherNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Investigation
			$this->Investigation->LinkCustomAttributes = "";
			$this->Investigation->HrefValue = "";
			$this->Investigation->TooltipValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";
			$this->Value->TooltipValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";
			$this->NormalRange->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// SampleCollected
			$this->SampleCollected->LinkCustomAttributes = "";
			$this->SampleCollected->HrefValue = "";
			$this->SampleCollected->TooltipValue = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->LinkCustomAttributes = "";
			$this->SampleCollectedBy->HrefValue = "";
			$this->SampleCollectedBy->TooltipValue = "";

			// ResultedDate
			$this->ResultedDate->LinkCustomAttributes = "";
			$this->ResultedDate->HrefValue = "";
			$this->ResultedDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";
			$this->Modified->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";
			$this->Created->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// GroupHead
			$this->GroupHead->LinkCustomAttributes = "";
			$this->GroupHead->HrefValue = "";
			$this->GroupHead->TooltipValue = "";

			// Cost
			$this->Cost->LinkCustomAttributes = "";
			$this->Cost->HrefValue = "";
			$this->Cost->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// PayMode
			$this->PayMode->LinkCustomAttributes = "";
			$this->PayMode->HrefValue = "";
			$this->PayMode->TooltipValue = "";

			// VoucherNo
			$this->VoucherNo->LinkCustomAttributes = "";
			$this->VoucherNo->HrefValue = "";
			$this->VoucherNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// Investigation

			$this->Investigation->EditAttrs["class"] = "form-control";
			$this->Investigation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
			$this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
			$this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

			// Value
			$this->Value->EditAttrs["class"] = "form-control";
			$this->Value->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
			$this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
			$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

			// NormalRange
			$this->NormalRange->EditAttrs["class"] = "form-control";
			$this->NormalRange->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
			$this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
			$this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() <> "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->OldValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// SampleCollected
			$this->SampleCollected->EditAttrs["class"] = "form-control";
			$this->SampleCollected->EditCustomAttributes = "";
			$this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
			$this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

			// SampleCollectedBy
			$this->SampleCollectedBy->EditAttrs["class"] = "form-control";
			$this->SampleCollectedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

			// ResultedDate
			$this->ResultedDate->EditAttrs["class"] = "form-control";
			$this->ResultedDate->EditCustomAttributes = "";
			$this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
			$this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// Modified
			$this->Modified->EditAttrs["class"] = "form-control";
			$this->Modified->EditCustomAttributes = "";
			$this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
			$this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// Created
			$this->Created->EditAttrs["class"] = "form-control";
			$this->Created->EditCustomAttributes = "";
			$this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
			$this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// GroupHead
			$this->GroupHead->EditAttrs["class"] = "form-control";
			$this->GroupHead->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
			$this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
			$this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

			// Cost
			$this->Cost->EditAttrs["class"] = "form-control";
			$this->Cost->EditCustomAttributes = "";
			$this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
			$this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
			if (strval($this->Cost->EditValue) <> "" && is_numeric($this->Cost->EditValue)) {
				$this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
				$this->Cost->OldValue = $this->Cost->EditValue;
			}

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PayMode
			$this->PayMode->EditAttrs["class"] = "form-control";
			$this->PayMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
			$this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
			$this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

			// VoucherNo
			$this->VoucherNo->EditAttrs["class"] = "form-control";
			$this->VoucherNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Investigation
			$this->Investigation->LinkCustomAttributes = "";
			$this->Investigation->HrefValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// SampleCollected
			$this->SampleCollected->LinkCustomAttributes = "";
			$this->SampleCollected->HrefValue = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->LinkCustomAttributes = "";
			$this->SampleCollectedBy->HrefValue = "";

			// ResultedDate
			$this->ResultedDate->LinkCustomAttributes = "";
			$this->ResultedDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// GroupHead
			$this->GroupHead->LinkCustomAttributes = "";
			$this->GroupHead->HrefValue = "";

			// Cost
			$this->Cost->LinkCustomAttributes = "";
			$this->Cost->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PayMode
			$this->PayMode->LinkCustomAttributes = "";
			$this->PayMode->HrefValue = "";

			// VoucherNo
			$this->VoucherNo->LinkCustomAttributes = "";
			$this->VoucherNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Investigation
			$this->Investigation->EditAttrs["class"] = "form-control";
			$this->Investigation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
			$this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
			$this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

			// Value
			$this->Value->EditAttrs["class"] = "form-control";
			$this->Value->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
			$this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
			$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

			// NormalRange
			$this->NormalRange->EditAttrs["class"] = "form-control";
			$this->NormalRange->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
			$this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
			$this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// SampleCollected
			$this->SampleCollected->EditAttrs["class"] = "form-control";
			$this->SampleCollected->EditCustomAttributes = "";
			$this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
			$this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

			// SampleCollectedBy
			$this->SampleCollectedBy->EditAttrs["class"] = "form-control";
			$this->SampleCollectedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

			// ResultedDate
			$this->ResultedDate->EditAttrs["class"] = "form-control";
			$this->ResultedDate->EditCustomAttributes = "";
			$this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
			$this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// Modified
			$this->Modified->EditAttrs["class"] = "form-control";
			$this->Modified->EditCustomAttributes = "";
			$this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
			$this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// Created
			$this->Created->EditAttrs["class"] = "form-control";
			$this->Created->EditCustomAttributes = "";
			$this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
			$this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// GroupHead
			$this->GroupHead->EditAttrs["class"] = "form-control";
			$this->GroupHead->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
			$this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
			$this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

			// Cost
			$this->Cost->EditAttrs["class"] = "form-control";
			$this->Cost->EditCustomAttributes = "";
			$this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
			$this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
			if (strval($this->Cost->EditValue) <> "" && is_numeric($this->Cost->EditValue)) {
				$this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
				$this->Cost->OldValue = $this->Cost->EditValue;
			}

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PayMode
			$this->PayMode->EditAttrs["class"] = "form-control";
			$this->PayMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
			$this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
			$this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

			// VoucherNo
			$this->VoucherNo->EditAttrs["class"] = "form-control";
			$this->VoucherNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Investigation
			$this->Investigation->LinkCustomAttributes = "";
			$this->Investigation->HrefValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// SampleCollected
			$this->SampleCollected->LinkCustomAttributes = "";
			$this->SampleCollected->HrefValue = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->LinkCustomAttributes = "";
			$this->SampleCollectedBy->HrefValue = "";

			// ResultedDate
			$this->ResultedDate->LinkCustomAttributes = "";
			$this->ResultedDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// GroupHead
			$this->GroupHead->LinkCustomAttributes = "";
			$this->GroupHead->HrefValue = "";

			// Cost
			$this->Cost->LinkCustomAttributes = "";
			$this->Cost->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PayMode
			$this->PayMode->LinkCustomAttributes = "";
			$this->PayMode->HrefValue = "";

			// VoucherNo
			$this->VoucherNo->LinkCustomAttributes = "";
			$this->VoucherNo->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[$this->RowCnt] = $this->customTemplateFieldValues();
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
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Investigation->Required) {
			if (!$this->Investigation->IsDetailKey && $this->Investigation->FormValue != NULL && $this->Investigation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Investigation->caption(), $this->Investigation->RequiredErrorMessage));
			}
		}
		if ($this->Value->Required) {
			if (!$this->Value->IsDetailKey && $this->Value->FormValue != NULL && $this->Value->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Value->caption(), $this->Value->RequiredErrorMessage));
			}
		}
		if ($this->NormalRange->Required) {
			if (!$this->NormalRange->IsDetailKey && $this->NormalRange->FormValue != NULL && $this->NormalRange->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NormalRange->caption(), $this->NormalRange->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->SampleCollected->Required) {
			if (!$this->SampleCollected->IsDetailKey && $this->SampleCollected->FormValue != NULL && $this->SampleCollected->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleCollected->caption(), $this->SampleCollected->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SampleCollected->FormValue)) {
			AddMessage($FormError, $this->SampleCollected->errorMessage());
		}
		if ($this->SampleCollectedBy->Required) {
			if (!$this->SampleCollectedBy->IsDetailKey && $this->SampleCollectedBy->FormValue != NULL && $this->SampleCollectedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleCollectedBy->caption(), $this->SampleCollectedBy->RequiredErrorMessage));
			}
		}
		if ($this->ResultedDate->Required) {
			if (!$this->ResultedDate->IsDetailKey && $this->ResultedDate->FormValue != NULL && $this->ResultedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedDate->caption(), $this->ResultedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultedDate->FormValue)) {
			AddMessage($FormError, $this->ResultedDate->errorMessage());
		}
		if ($this->ResultedBy->Required) {
			if (!$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
			}
		}
		if ($this->Modified->Required) {
			if (!$this->Modified->IsDetailKey && $this->Modified->FormValue != NULL && $this->Modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Modified->FormValue)) {
			AddMessage($FormError, $this->Modified->errorMessage());
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->Created->Required) {
			if (!$this->Created->IsDetailKey && $this->Created->FormValue != NULL && $this->Created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Created->FormValue)) {
			AddMessage($FormError, $this->Created->errorMessage());
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->GroupHead->Required) {
			if (!$this->GroupHead->IsDetailKey && $this->GroupHead->FormValue != NULL && $this->GroupHead->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupHead->caption(), $this->GroupHead->RequiredErrorMessage));
			}
		}
		if ($this->Cost->Required) {
			if (!$this->Cost->IsDetailKey && $this->Cost->FormValue != NULL && $this->Cost->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cost->caption(), $this->Cost->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Cost->FormValue)) {
			AddMessage($FormError, $this->Cost->errorMessage());
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if ($this->PayMode->Required) {
			if (!$this->PayMode->IsDetailKey && $this->PayMode->FormValue != NULL && $this->PayMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PayMode->caption(), $this->PayMode->RequiredErrorMessage));
			}
		}
		if ($this->VoucherNo->Required) {
			if (!$this->VoucherNo->IsDetailKey && $this->VoucherNo->FormValue != NULL && $this->VoucherNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VoucherNo->caption(), $this->VoucherNo->RequiredErrorMessage));
			}
		}
		if ($this->InvestigationMultiselect->Required) {
			if (!$this->InvestigationMultiselect->IsDetailKey && $this->InvestigationMultiselect->FormValue != NULL && $this->InvestigationMultiselect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InvestigationMultiselect->caption(), $this->InvestigationMultiselect->RequiredErrorMessage));
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

			// Investigation
			$this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, NULL, $this->Investigation->ReadOnly);

			// Value
			$this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, NULL, $this->Value->ReadOnly);

			// NormalRange
			$this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, NULL, $this->NormalRange->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// SampleCollected
			$this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), NULL, $this->SampleCollected->ReadOnly);

			// SampleCollectedBy
			$this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, NULL, $this->SampleCollectedBy->ReadOnly);

			// ResultedDate
			$this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), NULL, $this->ResultedDate->ReadOnly);

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, $this->ResultedBy->ReadOnly);

			// Modified
			$this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), NULL, $this->Modified->ReadOnly);

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, $this->ModifiedBy->ReadOnly);

			// Created
			$this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), NULL, $this->Created->ReadOnly);

			// CreatedBy
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, $this->CreatedBy->ReadOnly);

			// GroupHead
			$this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, NULL, $this->GroupHead->ReadOnly);

			// Cost
			$this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, NULL, $this->Cost->ReadOnly);

			// PaymentStatus
			$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, $this->PaymentStatus->ReadOnly);

			// PayMode
			$this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, NULL, $this->PayMode->ReadOnly);

			// VoucherNo
			$this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, NULL, $this->VoucherNo->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('Investigation')); // Investigation
		$hash .= GetFieldHash($rs->fields('Value')); // Value
		$hash .= GetFieldHash($rs->fields('NormalRange')); // NormalRange
		$hash .= GetFieldHash($rs->fields('Age')); // Age
		$hash .= GetFieldHash($rs->fields('Gender')); // Gender
		$hash .= GetFieldHash($rs->fields('SampleCollected')); // SampleCollected
		$hash .= GetFieldHash($rs->fields('SampleCollectedBy')); // SampleCollectedBy
		$hash .= GetFieldHash($rs->fields('ResultedDate')); // ResultedDate
		$hash .= GetFieldHash($rs->fields('ResultedBy')); // ResultedBy
		$hash .= GetFieldHash($rs->fields('Modified')); // Modified
		$hash .= GetFieldHash($rs->fields('ModifiedBy')); // ModifiedBy
		$hash .= GetFieldHash($rs->fields('Created')); // Created
		$hash .= GetFieldHash($rs->fields('CreatedBy')); // CreatedBy
		$hash .= GetFieldHash($rs->fields('GroupHead')); // GroupHead
		$hash .= GetFieldHash($rs->fields('Cost')); // Cost
		$hash .= GetFieldHash($rs->fields('PaymentStatus')); // PaymentStatus
		$hash .= GetFieldHash($rs->fields('PayMode')); // PayMode
		$hash .= GetFieldHash($rs->fields('VoucherNo')); // VoucherNo
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

		// Investigation
		$this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, NULL, FALSE);

		// Value
		$this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, NULL, FALSE);

		// NormalRange
		$this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// SampleCollected
		$this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), NULL, FALSE);

		// SampleCollectedBy
		$this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, NULL, FALSE);

		// ResultedDate
		$this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), NULL, FALSE);

		// ResultedBy
		$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, FALSE);

		// Modified
		$this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), NULL, FALSE);

		// ModifiedBy
		$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, FALSE);

		// Created
		$this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), NULL, FALSE);

		// CreatedBy
		$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, FALSE);

		// GroupHead
		$this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, NULL, FALSE);

		// Cost
		$this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, NULL, FALSE);

		// PaymentStatus
		$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, FALSE);

		// PayMode
		$this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, NULL, FALSE);

		// VoucherNo
		$this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, NULL, FALSE);

		// Reception
		if ($this->Reception->getSessionValue() <> "") {
			$rsnew['Reception'] = $this->Reception->getSessionValue();
		}

		// PatientId
		if ($this->PatientId->getSessionValue() <> "") {
			$rsnew['PatientId'] = $this->PatientId->getSessionValue();
		}

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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpatient_investigationslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpatient_investigationslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpatient_investigationslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_patient_investigations\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_patient_investigations',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpatient_investigationslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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

		// Export master record
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			if (!isset($ip_admission))
				$ip_admission = new ip_admission();
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$ip_admission;
					$ip_admission->exportDocument($doc, $rsmaster);
					$doc->exportEmptyRow();
					$doc->Table = &$this;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsmaster->close();
			}
		}
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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->Reception->setQueryStringValue(Get("fk_id"));
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($this->Reception->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PatientId->setQueryStringValue(Get("fk_patient_id"));
					$this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
					if (!is_numeric($this->PatientId->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->Reception->setFormValue(Post("fk_id"));
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($this->Reception->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PatientId->setFormValue(Post("fk_patient_id"));
					$this->PatientId->setSessionValue($this->PatientId->FormValue);
					if (!is_numeric($this->PatientId->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Update URL
			$this->AddUrl = $this->addMasterUrl($this->AddUrl);
			$this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
			$this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
			$this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);
			$this->CancelUrl = $this->addMasterUrl($this->CancelUrl);

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->PatientId->CurrentValue == "")
					$this->PatientId->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
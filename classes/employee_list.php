<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_list extends employee
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee';

	// Page object name
	public $PageObjName = "employee_list";

	// Grid form hidden field names
	public $FormName = "femployeelist";
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

		// Table object (employee)
		if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
			$GLOBALS["employee"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "employeeadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "employeedelete.php";
		$this->MultiUpdateUrl = "employeeupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');

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
		$this->FilterOptions->TagClassName = "ew-filter-option femployeelistsrch";

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
		global $EXPORT, $employee;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employee);
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
			$this->status->Visible = FALSE;
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
		$this->employee_id->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->nationality->setVisibility();
		$this->birthday->setVisibility();
		$this->marital_status->setVisibility();
		$this->ssn_num->setVisibility();
		$this->nic_num->setVisibility();
		$this->other_id->setVisibility();
		$this->driving_license->setVisibility();
		$this->driving_license_exp_date->setVisibility();
		$this->employment_status->setVisibility();
		$this->job_title->setVisibility();
		$this->pay_grade->setVisibility();
		$this->work_station_id->setVisibility();
		$this->address1->setVisibility();
		$this->address2->setVisibility();
		$this->city->setVisibility();
		$this->country->setVisibility();
		$this->province->setVisibility();
		$this->postal_code->setVisibility();
		$this->home_phone->setVisibility();
		$this->mobile_phone->setVisibility();
		$this->work_phone->setVisibility();
		$this->work_email->setVisibility();
		$this->private_email->setVisibility();
		$this->joined_date->setVisibility();
		$this->confirmation_date->setVisibility();
		$this->supervisor->setVisibility();
		$this->indirect_supervisors->setVisibility();
		$this->department->setVisibility();
		$this->custom1->setVisibility();
		$this->custom2->setVisibility();
		$this->custom3->setVisibility();
		$this->custom4->setVisibility();
		$this->custom5->setVisibility();
		$this->custom6->setVisibility();
		$this->custom7->setVisibility();
		$this->custom8->setVisibility();
		$this->custom9->setVisibility();
		$this->custom10->setVisibility();
		$this->termination_date->setVisibility();
		$this->notes->Visible = FALSE;
		$this->ethnicity->setVisibility();
		$this->immigration_status->setVisibility();
		$this->approver1->setVisibility();
		$this->approver2->setVisibility();
		$this->approver3->setVisibility();
		$this->status->setVisibility();
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
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->nationality);
		$this->setupLookupOptions($this->approver1);
		$this->setupLookupOptions($this->approver2);
		$this->setupLookupOptions($this->approver3);
		$this->setupLookupOptions($this->status);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "femployeelistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->employee_id->AdvancedSearch->toJson(), ","); // Field employee_id
		$filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
		$filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
		$filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
		$filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
		$filterList = Concat($filterList, $this->nationality->AdvancedSearch->toJson(), ","); // Field nationality
		$filterList = Concat($filterList, $this->birthday->AdvancedSearch->toJson(), ","); // Field birthday
		$filterList = Concat($filterList, $this->marital_status->AdvancedSearch->toJson(), ","); // Field marital_status
		$filterList = Concat($filterList, $this->ssn_num->AdvancedSearch->toJson(), ","); // Field ssn_num
		$filterList = Concat($filterList, $this->nic_num->AdvancedSearch->toJson(), ","); // Field nic_num
		$filterList = Concat($filterList, $this->other_id->AdvancedSearch->toJson(), ","); // Field other_id
		$filterList = Concat($filterList, $this->driving_license->AdvancedSearch->toJson(), ","); // Field driving_license
		$filterList = Concat($filterList, $this->driving_license_exp_date->AdvancedSearch->toJson(), ","); // Field driving_license_exp_date
		$filterList = Concat($filterList, $this->employment_status->AdvancedSearch->toJson(), ","); // Field employment_status
		$filterList = Concat($filterList, $this->job_title->AdvancedSearch->toJson(), ","); // Field job_title
		$filterList = Concat($filterList, $this->pay_grade->AdvancedSearch->toJson(), ","); // Field pay_grade
		$filterList = Concat($filterList, $this->work_station_id->AdvancedSearch->toJson(), ","); // Field work_station_id
		$filterList = Concat($filterList, $this->address1->AdvancedSearch->toJson(), ","); // Field address1
		$filterList = Concat($filterList, $this->address2->AdvancedSearch->toJson(), ","); // Field address2
		$filterList = Concat($filterList, $this->city->AdvancedSearch->toJson(), ","); // Field city
		$filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
		$filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
		$filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
		$filterList = Concat($filterList, $this->home_phone->AdvancedSearch->toJson(), ","); // Field home_phone
		$filterList = Concat($filterList, $this->mobile_phone->AdvancedSearch->toJson(), ","); // Field mobile_phone
		$filterList = Concat($filterList, $this->work_phone->AdvancedSearch->toJson(), ","); // Field work_phone
		$filterList = Concat($filterList, $this->work_email->AdvancedSearch->toJson(), ","); // Field work_email
		$filterList = Concat($filterList, $this->private_email->AdvancedSearch->toJson(), ","); // Field private_email
		$filterList = Concat($filterList, $this->joined_date->AdvancedSearch->toJson(), ","); // Field joined_date
		$filterList = Concat($filterList, $this->confirmation_date->AdvancedSearch->toJson(), ","); // Field confirmation_date
		$filterList = Concat($filterList, $this->supervisor->AdvancedSearch->toJson(), ","); // Field supervisor
		$filterList = Concat($filterList, $this->indirect_supervisors->AdvancedSearch->toJson(), ","); // Field indirect_supervisors
		$filterList = Concat($filterList, $this->department->AdvancedSearch->toJson(), ","); // Field department
		$filterList = Concat($filterList, $this->custom1->AdvancedSearch->toJson(), ","); // Field custom1
		$filterList = Concat($filterList, $this->custom2->AdvancedSearch->toJson(), ","); // Field custom2
		$filterList = Concat($filterList, $this->custom3->AdvancedSearch->toJson(), ","); // Field custom3
		$filterList = Concat($filterList, $this->custom4->AdvancedSearch->toJson(), ","); // Field custom4
		$filterList = Concat($filterList, $this->custom5->AdvancedSearch->toJson(), ","); // Field custom5
		$filterList = Concat($filterList, $this->custom6->AdvancedSearch->toJson(), ","); // Field custom6
		$filterList = Concat($filterList, $this->custom7->AdvancedSearch->toJson(), ","); // Field custom7
		$filterList = Concat($filterList, $this->custom8->AdvancedSearch->toJson(), ","); // Field custom8
		$filterList = Concat($filterList, $this->custom9->AdvancedSearch->toJson(), ","); // Field custom9
		$filterList = Concat($filterList, $this->custom10->AdvancedSearch->toJson(), ","); // Field custom10
		$filterList = Concat($filterList, $this->termination_date->AdvancedSearch->toJson(), ","); // Field termination_date
		$filterList = Concat($filterList, $this->notes->AdvancedSearch->toJson(), ","); // Field notes
		$filterList = Concat($filterList, $this->ethnicity->AdvancedSearch->toJson(), ","); // Field ethnicity
		$filterList = Concat($filterList, $this->immigration_status->AdvancedSearch->toJson(), ","); // Field immigration_status
		$filterList = Concat($filterList, $this->approver1->AdvancedSearch->toJson(), ","); // Field approver1
		$filterList = Concat($filterList, $this->approver2->AdvancedSearch->toJson(), ","); // Field approver2
		$filterList = Concat($filterList, $this->approver3->AdvancedSearch->toJson(), ","); // Field approver3
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
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
			$UserProfile->setSearchFilters(CurrentUserName(), "femployeelistsrch", $filters);
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

		// Field employee_id
		$this->employee_id->AdvancedSearch->SearchValue = @$filter["x_employee_id"];
		$this->employee_id->AdvancedSearch->SearchOperator = @$filter["z_employee_id"];
		$this->employee_id->AdvancedSearch->SearchCondition = @$filter["v_employee_id"];
		$this->employee_id->AdvancedSearch->SearchValue2 = @$filter["y_employee_id"];
		$this->employee_id->AdvancedSearch->SearchOperator2 = @$filter["w_employee_id"];
		$this->employee_id->AdvancedSearch->save();

		// Field first_name
		$this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
		$this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
		$this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
		$this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
		$this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
		$this->first_name->AdvancedSearch->save();

		// Field middle_name
		$this->middle_name->AdvancedSearch->SearchValue = @$filter["x_middle_name"];
		$this->middle_name->AdvancedSearch->SearchOperator = @$filter["z_middle_name"];
		$this->middle_name->AdvancedSearch->SearchCondition = @$filter["v_middle_name"];
		$this->middle_name->AdvancedSearch->SearchValue2 = @$filter["y_middle_name"];
		$this->middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_middle_name"];
		$this->middle_name->AdvancedSearch->save();

		// Field last_name
		$this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
		$this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
		$this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
		$this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
		$this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
		$this->last_name->AdvancedSearch->save();

		// Field gender
		$this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
		$this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
		$this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
		$this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
		$this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
		$this->gender->AdvancedSearch->save();

		// Field nationality
		$this->nationality->AdvancedSearch->SearchValue = @$filter["x_nationality"];
		$this->nationality->AdvancedSearch->SearchOperator = @$filter["z_nationality"];
		$this->nationality->AdvancedSearch->SearchCondition = @$filter["v_nationality"];
		$this->nationality->AdvancedSearch->SearchValue2 = @$filter["y_nationality"];
		$this->nationality->AdvancedSearch->SearchOperator2 = @$filter["w_nationality"];
		$this->nationality->AdvancedSearch->save();

		// Field birthday
		$this->birthday->AdvancedSearch->SearchValue = @$filter["x_birthday"];
		$this->birthday->AdvancedSearch->SearchOperator = @$filter["z_birthday"];
		$this->birthday->AdvancedSearch->SearchCondition = @$filter["v_birthday"];
		$this->birthday->AdvancedSearch->SearchValue2 = @$filter["y_birthday"];
		$this->birthday->AdvancedSearch->SearchOperator2 = @$filter["w_birthday"];
		$this->birthday->AdvancedSearch->save();

		// Field marital_status
		$this->marital_status->AdvancedSearch->SearchValue = @$filter["x_marital_status"];
		$this->marital_status->AdvancedSearch->SearchOperator = @$filter["z_marital_status"];
		$this->marital_status->AdvancedSearch->SearchCondition = @$filter["v_marital_status"];
		$this->marital_status->AdvancedSearch->SearchValue2 = @$filter["y_marital_status"];
		$this->marital_status->AdvancedSearch->SearchOperator2 = @$filter["w_marital_status"];
		$this->marital_status->AdvancedSearch->save();

		// Field ssn_num
		$this->ssn_num->AdvancedSearch->SearchValue = @$filter["x_ssn_num"];
		$this->ssn_num->AdvancedSearch->SearchOperator = @$filter["z_ssn_num"];
		$this->ssn_num->AdvancedSearch->SearchCondition = @$filter["v_ssn_num"];
		$this->ssn_num->AdvancedSearch->SearchValue2 = @$filter["y_ssn_num"];
		$this->ssn_num->AdvancedSearch->SearchOperator2 = @$filter["w_ssn_num"];
		$this->ssn_num->AdvancedSearch->save();

		// Field nic_num
		$this->nic_num->AdvancedSearch->SearchValue = @$filter["x_nic_num"];
		$this->nic_num->AdvancedSearch->SearchOperator = @$filter["z_nic_num"];
		$this->nic_num->AdvancedSearch->SearchCondition = @$filter["v_nic_num"];
		$this->nic_num->AdvancedSearch->SearchValue2 = @$filter["y_nic_num"];
		$this->nic_num->AdvancedSearch->SearchOperator2 = @$filter["w_nic_num"];
		$this->nic_num->AdvancedSearch->save();

		// Field other_id
		$this->other_id->AdvancedSearch->SearchValue = @$filter["x_other_id"];
		$this->other_id->AdvancedSearch->SearchOperator = @$filter["z_other_id"];
		$this->other_id->AdvancedSearch->SearchCondition = @$filter["v_other_id"];
		$this->other_id->AdvancedSearch->SearchValue2 = @$filter["y_other_id"];
		$this->other_id->AdvancedSearch->SearchOperator2 = @$filter["w_other_id"];
		$this->other_id->AdvancedSearch->save();

		// Field driving_license
		$this->driving_license->AdvancedSearch->SearchValue = @$filter["x_driving_license"];
		$this->driving_license->AdvancedSearch->SearchOperator = @$filter["z_driving_license"];
		$this->driving_license->AdvancedSearch->SearchCondition = @$filter["v_driving_license"];
		$this->driving_license->AdvancedSearch->SearchValue2 = @$filter["y_driving_license"];
		$this->driving_license->AdvancedSearch->SearchOperator2 = @$filter["w_driving_license"];
		$this->driving_license->AdvancedSearch->save();

		// Field driving_license_exp_date
		$this->driving_license_exp_date->AdvancedSearch->SearchValue = @$filter["x_driving_license_exp_date"];
		$this->driving_license_exp_date->AdvancedSearch->SearchOperator = @$filter["z_driving_license_exp_date"];
		$this->driving_license_exp_date->AdvancedSearch->SearchCondition = @$filter["v_driving_license_exp_date"];
		$this->driving_license_exp_date->AdvancedSearch->SearchValue2 = @$filter["y_driving_license_exp_date"];
		$this->driving_license_exp_date->AdvancedSearch->SearchOperator2 = @$filter["w_driving_license_exp_date"];
		$this->driving_license_exp_date->AdvancedSearch->save();

		// Field employment_status
		$this->employment_status->AdvancedSearch->SearchValue = @$filter["x_employment_status"];
		$this->employment_status->AdvancedSearch->SearchOperator = @$filter["z_employment_status"];
		$this->employment_status->AdvancedSearch->SearchCondition = @$filter["v_employment_status"];
		$this->employment_status->AdvancedSearch->SearchValue2 = @$filter["y_employment_status"];
		$this->employment_status->AdvancedSearch->SearchOperator2 = @$filter["w_employment_status"];
		$this->employment_status->AdvancedSearch->save();

		// Field job_title
		$this->job_title->AdvancedSearch->SearchValue = @$filter["x_job_title"];
		$this->job_title->AdvancedSearch->SearchOperator = @$filter["z_job_title"];
		$this->job_title->AdvancedSearch->SearchCondition = @$filter["v_job_title"];
		$this->job_title->AdvancedSearch->SearchValue2 = @$filter["y_job_title"];
		$this->job_title->AdvancedSearch->SearchOperator2 = @$filter["w_job_title"];
		$this->job_title->AdvancedSearch->save();

		// Field pay_grade
		$this->pay_grade->AdvancedSearch->SearchValue = @$filter["x_pay_grade"];
		$this->pay_grade->AdvancedSearch->SearchOperator = @$filter["z_pay_grade"];
		$this->pay_grade->AdvancedSearch->SearchCondition = @$filter["v_pay_grade"];
		$this->pay_grade->AdvancedSearch->SearchValue2 = @$filter["y_pay_grade"];
		$this->pay_grade->AdvancedSearch->SearchOperator2 = @$filter["w_pay_grade"];
		$this->pay_grade->AdvancedSearch->save();

		// Field work_station_id
		$this->work_station_id->AdvancedSearch->SearchValue = @$filter["x_work_station_id"];
		$this->work_station_id->AdvancedSearch->SearchOperator = @$filter["z_work_station_id"];
		$this->work_station_id->AdvancedSearch->SearchCondition = @$filter["v_work_station_id"];
		$this->work_station_id->AdvancedSearch->SearchValue2 = @$filter["y_work_station_id"];
		$this->work_station_id->AdvancedSearch->SearchOperator2 = @$filter["w_work_station_id"];
		$this->work_station_id->AdvancedSearch->save();

		// Field address1
		$this->address1->AdvancedSearch->SearchValue = @$filter["x_address1"];
		$this->address1->AdvancedSearch->SearchOperator = @$filter["z_address1"];
		$this->address1->AdvancedSearch->SearchCondition = @$filter["v_address1"];
		$this->address1->AdvancedSearch->SearchValue2 = @$filter["y_address1"];
		$this->address1->AdvancedSearch->SearchOperator2 = @$filter["w_address1"];
		$this->address1->AdvancedSearch->save();

		// Field address2
		$this->address2->AdvancedSearch->SearchValue = @$filter["x_address2"];
		$this->address2->AdvancedSearch->SearchOperator = @$filter["z_address2"];
		$this->address2->AdvancedSearch->SearchCondition = @$filter["v_address2"];
		$this->address2->AdvancedSearch->SearchValue2 = @$filter["y_address2"];
		$this->address2->AdvancedSearch->SearchOperator2 = @$filter["w_address2"];
		$this->address2->AdvancedSearch->save();

		// Field city
		$this->city->AdvancedSearch->SearchValue = @$filter["x_city"];
		$this->city->AdvancedSearch->SearchOperator = @$filter["z_city"];
		$this->city->AdvancedSearch->SearchCondition = @$filter["v_city"];
		$this->city->AdvancedSearch->SearchValue2 = @$filter["y_city"];
		$this->city->AdvancedSearch->SearchOperator2 = @$filter["w_city"];
		$this->city->AdvancedSearch->save();

		// Field country
		$this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
		$this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
		$this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
		$this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
		$this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
		$this->country->AdvancedSearch->save();

		// Field province
		$this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
		$this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
		$this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
		$this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
		$this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
		$this->province->AdvancedSearch->save();

		// Field postal_code
		$this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
		$this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
		$this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
		$this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
		$this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
		$this->postal_code->AdvancedSearch->save();

		// Field home_phone
		$this->home_phone->AdvancedSearch->SearchValue = @$filter["x_home_phone"];
		$this->home_phone->AdvancedSearch->SearchOperator = @$filter["z_home_phone"];
		$this->home_phone->AdvancedSearch->SearchCondition = @$filter["v_home_phone"];
		$this->home_phone->AdvancedSearch->SearchValue2 = @$filter["y_home_phone"];
		$this->home_phone->AdvancedSearch->SearchOperator2 = @$filter["w_home_phone"];
		$this->home_phone->AdvancedSearch->save();

		// Field mobile_phone
		$this->mobile_phone->AdvancedSearch->SearchValue = @$filter["x_mobile_phone"];
		$this->mobile_phone->AdvancedSearch->SearchOperator = @$filter["z_mobile_phone"];
		$this->mobile_phone->AdvancedSearch->SearchCondition = @$filter["v_mobile_phone"];
		$this->mobile_phone->AdvancedSearch->SearchValue2 = @$filter["y_mobile_phone"];
		$this->mobile_phone->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_phone"];
		$this->mobile_phone->AdvancedSearch->save();

		// Field work_phone
		$this->work_phone->AdvancedSearch->SearchValue = @$filter["x_work_phone"];
		$this->work_phone->AdvancedSearch->SearchOperator = @$filter["z_work_phone"];
		$this->work_phone->AdvancedSearch->SearchCondition = @$filter["v_work_phone"];
		$this->work_phone->AdvancedSearch->SearchValue2 = @$filter["y_work_phone"];
		$this->work_phone->AdvancedSearch->SearchOperator2 = @$filter["w_work_phone"];
		$this->work_phone->AdvancedSearch->save();

		// Field work_email
		$this->work_email->AdvancedSearch->SearchValue = @$filter["x_work_email"];
		$this->work_email->AdvancedSearch->SearchOperator = @$filter["z_work_email"];
		$this->work_email->AdvancedSearch->SearchCondition = @$filter["v_work_email"];
		$this->work_email->AdvancedSearch->SearchValue2 = @$filter["y_work_email"];
		$this->work_email->AdvancedSearch->SearchOperator2 = @$filter["w_work_email"];
		$this->work_email->AdvancedSearch->save();

		// Field private_email
		$this->private_email->AdvancedSearch->SearchValue = @$filter["x_private_email"];
		$this->private_email->AdvancedSearch->SearchOperator = @$filter["z_private_email"];
		$this->private_email->AdvancedSearch->SearchCondition = @$filter["v_private_email"];
		$this->private_email->AdvancedSearch->SearchValue2 = @$filter["y_private_email"];
		$this->private_email->AdvancedSearch->SearchOperator2 = @$filter["w_private_email"];
		$this->private_email->AdvancedSearch->save();

		// Field joined_date
		$this->joined_date->AdvancedSearch->SearchValue = @$filter["x_joined_date"];
		$this->joined_date->AdvancedSearch->SearchOperator = @$filter["z_joined_date"];
		$this->joined_date->AdvancedSearch->SearchCondition = @$filter["v_joined_date"];
		$this->joined_date->AdvancedSearch->SearchValue2 = @$filter["y_joined_date"];
		$this->joined_date->AdvancedSearch->SearchOperator2 = @$filter["w_joined_date"];
		$this->joined_date->AdvancedSearch->save();

		// Field confirmation_date
		$this->confirmation_date->AdvancedSearch->SearchValue = @$filter["x_confirmation_date"];
		$this->confirmation_date->AdvancedSearch->SearchOperator = @$filter["z_confirmation_date"];
		$this->confirmation_date->AdvancedSearch->SearchCondition = @$filter["v_confirmation_date"];
		$this->confirmation_date->AdvancedSearch->SearchValue2 = @$filter["y_confirmation_date"];
		$this->confirmation_date->AdvancedSearch->SearchOperator2 = @$filter["w_confirmation_date"];
		$this->confirmation_date->AdvancedSearch->save();

		// Field supervisor
		$this->supervisor->AdvancedSearch->SearchValue = @$filter["x_supervisor"];
		$this->supervisor->AdvancedSearch->SearchOperator = @$filter["z_supervisor"];
		$this->supervisor->AdvancedSearch->SearchCondition = @$filter["v_supervisor"];
		$this->supervisor->AdvancedSearch->SearchValue2 = @$filter["y_supervisor"];
		$this->supervisor->AdvancedSearch->SearchOperator2 = @$filter["w_supervisor"];
		$this->supervisor->AdvancedSearch->save();

		// Field indirect_supervisors
		$this->indirect_supervisors->AdvancedSearch->SearchValue = @$filter["x_indirect_supervisors"];
		$this->indirect_supervisors->AdvancedSearch->SearchOperator = @$filter["z_indirect_supervisors"];
		$this->indirect_supervisors->AdvancedSearch->SearchCondition = @$filter["v_indirect_supervisors"];
		$this->indirect_supervisors->AdvancedSearch->SearchValue2 = @$filter["y_indirect_supervisors"];
		$this->indirect_supervisors->AdvancedSearch->SearchOperator2 = @$filter["w_indirect_supervisors"];
		$this->indirect_supervisors->AdvancedSearch->save();

		// Field department
		$this->department->AdvancedSearch->SearchValue = @$filter["x_department"];
		$this->department->AdvancedSearch->SearchOperator = @$filter["z_department"];
		$this->department->AdvancedSearch->SearchCondition = @$filter["v_department"];
		$this->department->AdvancedSearch->SearchValue2 = @$filter["y_department"];
		$this->department->AdvancedSearch->SearchOperator2 = @$filter["w_department"];
		$this->department->AdvancedSearch->save();

		// Field custom1
		$this->custom1->AdvancedSearch->SearchValue = @$filter["x_custom1"];
		$this->custom1->AdvancedSearch->SearchOperator = @$filter["z_custom1"];
		$this->custom1->AdvancedSearch->SearchCondition = @$filter["v_custom1"];
		$this->custom1->AdvancedSearch->SearchValue2 = @$filter["y_custom1"];
		$this->custom1->AdvancedSearch->SearchOperator2 = @$filter["w_custom1"];
		$this->custom1->AdvancedSearch->save();

		// Field custom2
		$this->custom2->AdvancedSearch->SearchValue = @$filter["x_custom2"];
		$this->custom2->AdvancedSearch->SearchOperator = @$filter["z_custom2"];
		$this->custom2->AdvancedSearch->SearchCondition = @$filter["v_custom2"];
		$this->custom2->AdvancedSearch->SearchValue2 = @$filter["y_custom2"];
		$this->custom2->AdvancedSearch->SearchOperator2 = @$filter["w_custom2"];
		$this->custom2->AdvancedSearch->save();

		// Field custom3
		$this->custom3->AdvancedSearch->SearchValue = @$filter["x_custom3"];
		$this->custom3->AdvancedSearch->SearchOperator = @$filter["z_custom3"];
		$this->custom3->AdvancedSearch->SearchCondition = @$filter["v_custom3"];
		$this->custom3->AdvancedSearch->SearchValue2 = @$filter["y_custom3"];
		$this->custom3->AdvancedSearch->SearchOperator2 = @$filter["w_custom3"];
		$this->custom3->AdvancedSearch->save();

		// Field custom4
		$this->custom4->AdvancedSearch->SearchValue = @$filter["x_custom4"];
		$this->custom4->AdvancedSearch->SearchOperator = @$filter["z_custom4"];
		$this->custom4->AdvancedSearch->SearchCondition = @$filter["v_custom4"];
		$this->custom4->AdvancedSearch->SearchValue2 = @$filter["y_custom4"];
		$this->custom4->AdvancedSearch->SearchOperator2 = @$filter["w_custom4"];
		$this->custom4->AdvancedSearch->save();

		// Field custom5
		$this->custom5->AdvancedSearch->SearchValue = @$filter["x_custom5"];
		$this->custom5->AdvancedSearch->SearchOperator = @$filter["z_custom5"];
		$this->custom5->AdvancedSearch->SearchCondition = @$filter["v_custom5"];
		$this->custom5->AdvancedSearch->SearchValue2 = @$filter["y_custom5"];
		$this->custom5->AdvancedSearch->SearchOperator2 = @$filter["w_custom5"];
		$this->custom5->AdvancedSearch->save();

		// Field custom6
		$this->custom6->AdvancedSearch->SearchValue = @$filter["x_custom6"];
		$this->custom6->AdvancedSearch->SearchOperator = @$filter["z_custom6"];
		$this->custom6->AdvancedSearch->SearchCondition = @$filter["v_custom6"];
		$this->custom6->AdvancedSearch->SearchValue2 = @$filter["y_custom6"];
		$this->custom6->AdvancedSearch->SearchOperator2 = @$filter["w_custom6"];
		$this->custom6->AdvancedSearch->save();

		// Field custom7
		$this->custom7->AdvancedSearch->SearchValue = @$filter["x_custom7"];
		$this->custom7->AdvancedSearch->SearchOperator = @$filter["z_custom7"];
		$this->custom7->AdvancedSearch->SearchCondition = @$filter["v_custom7"];
		$this->custom7->AdvancedSearch->SearchValue2 = @$filter["y_custom7"];
		$this->custom7->AdvancedSearch->SearchOperator2 = @$filter["w_custom7"];
		$this->custom7->AdvancedSearch->save();

		// Field custom8
		$this->custom8->AdvancedSearch->SearchValue = @$filter["x_custom8"];
		$this->custom8->AdvancedSearch->SearchOperator = @$filter["z_custom8"];
		$this->custom8->AdvancedSearch->SearchCondition = @$filter["v_custom8"];
		$this->custom8->AdvancedSearch->SearchValue2 = @$filter["y_custom8"];
		$this->custom8->AdvancedSearch->SearchOperator2 = @$filter["w_custom8"];
		$this->custom8->AdvancedSearch->save();

		// Field custom9
		$this->custom9->AdvancedSearch->SearchValue = @$filter["x_custom9"];
		$this->custom9->AdvancedSearch->SearchOperator = @$filter["z_custom9"];
		$this->custom9->AdvancedSearch->SearchCondition = @$filter["v_custom9"];
		$this->custom9->AdvancedSearch->SearchValue2 = @$filter["y_custom9"];
		$this->custom9->AdvancedSearch->SearchOperator2 = @$filter["w_custom9"];
		$this->custom9->AdvancedSearch->save();

		// Field custom10
		$this->custom10->AdvancedSearch->SearchValue = @$filter["x_custom10"];
		$this->custom10->AdvancedSearch->SearchOperator = @$filter["z_custom10"];
		$this->custom10->AdvancedSearch->SearchCondition = @$filter["v_custom10"];
		$this->custom10->AdvancedSearch->SearchValue2 = @$filter["y_custom10"];
		$this->custom10->AdvancedSearch->SearchOperator2 = @$filter["w_custom10"];
		$this->custom10->AdvancedSearch->save();

		// Field termination_date
		$this->termination_date->AdvancedSearch->SearchValue = @$filter["x_termination_date"];
		$this->termination_date->AdvancedSearch->SearchOperator = @$filter["z_termination_date"];
		$this->termination_date->AdvancedSearch->SearchCondition = @$filter["v_termination_date"];
		$this->termination_date->AdvancedSearch->SearchValue2 = @$filter["y_termination_date"];
		$this->termination_date->AdvancedSearch->SearchOperator2 = @$filter["w_termination_date"];
		$this->termination_date->AdvancedSearch->save();

		// Field notes
		$this->notes->AdvancedSearch->SearchValue = @$filter["x_notes"];
		$this->notes->AdvancedSearch->SearchOperator = @$filter["z_notes"];
		$this->notes->AdvancedSearch->SearchCondition = @$filter["v_notes"];
		$this->notes->AdvancedSearch->SearchValue2 = @$filter["y_notes"];
		$this->notes->AdvancedSearch->SearchOperator2 = @$filter["w_notes"];
		$this->notes->AdvancedSearch->save();

		// Field ethnicity
		$this->ethnicity->AdvancedSearch->SearchValue = @$filter["x_ethnicity"];
		$this->ethnicity->AdvancedSearch->SearchOperator = @$filter["z_ethnicity"];
		$this->ethnicity->AdvancedSearch->SearchCondition = @$filter["v_ethnicity"];
		$this->ethnicity->AdvancedSearch->SearchValue2 = @$filter["y_ethnicity"];
		$this->ethnicity->AdvancedSearch->SearchOperator2 = @$filter["w_ethnicity"];
		$this->ethnicity->AdvancedSearch->save();

		// Field immigration_status
		$this->immigration_status->AdvancedSearch->SearchValue = @$filter["x_immigration_status"];
		$this->immigration_status->AdvancedSearch->SearchOperator = @$filter["z_immigration_status"];
		$this->immigration_status->AdvancedSearch->SearchCondition = @$filter["v_immigration_status"];
		$this->immigration_status->AdvancedSearch->SearchValue2 = @$filter["y_immigration_status"];
		$this->immigration_status->AdvancedSearch->SearchOperator2 = @$filter["w_immigration_status"];
		$this->immigration_status->AdvancedSearch->save();

		// Field approver1
		$this->approver1->AdvancedSearch->SearchValue = @$filter["x_approver1"];
		$this->approver1->AdvancedSearch->SearchOperator = @$filter["z_approver1"];
		$this->approver1->AdvancedSearch->SearchCondition = @$filter["v_approver1"];
		$this->approver1->AdvancedSearch->SearchValue2 = @$filter["y_approver1"];
		$this->approver1->AdvancedSearch->SearchOperator2 = @$filter["w_approver1"];
		$this->approver1->AdvancedSearch->save();

		// Field approver2
		$this->approver2->AdvancedSearch->SearchValue = @$filter["x_approver2"];
		$this->approver2->AdvancedSearch->SearchOperator = @$filter["z_approver2"];
		$this->approver2->AdvancedSearch->SearchCondition = @$filter["v_approver2"];
		$this->approver2->AdvancedSearch->SearchValue2 = @$filter["y_approver2"];
		$this->approver2->AdvancedSearch->SearchOperator2 = @$filter["w_approver2"];
		$this->approver2->AdvancedSearch->save();

		// Field approver3
		$this->approver3->AdvancedSearch->SearchValue = @$filter["x_approver3"];
		$this->approver3->AdvancedSearch->SearchOperator = @$filter["z_approver3"];
		$this->approver3->AdvancedSearch->SearchCondition = @$filter["v_approver3"];
		$this->approver3->AdvancedSearch->SearchValue2 = @$filter["y_approver3"];
		$this->approver3->AdvancedSearch->SearchOperator2 = @$filter["w_approver3"];
		$this->approver3->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

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
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->employee_id, $default, FALSE); // employee_id
		$this->buildSearchSql($where, $this->first_name, $default, FALSE); // first_name
		$this->buildSearchSql($where, $this->middle_name, $default, FALSE); // middle_name
		$this->buildSearchSql($where, $this->last_name, $default, FALSE); // last_name
		$this->buildSearchSql($where, $this->gender, $default, FALSE); // gender
		$this->buildSearchSql($where, $this->nationality, $default, FALSE); // nationality
		$this->buildSearchSql($where, $this->birthday, $default, FALSE); // birthday
		$this->buildSearchSql($where, $this->marital_status, $default, FALSE); // marital_status
		$this->buildSearchSql($where, $this->ssn_num, $default, FALSE); // ssn_num
		$this->buildSearchSql($where, $this->nic_num, $default, FALSE); // nic_num
		$this->buildSearchSql($where, $this->other_id, $default, FALSE); // other_id
		$this->buildSearchSql($where, $this->driving_license, $default, FALSE); // driving_license
		$this->buildSearchSql($where, $this->driving_license_exp_date, $default, FALSE); // driving_license_exp_date
		$this->buildSearchSql($where, $this->employment_status, $default, FALSE); // employment_status
		$this->buildSearchSql($where, $this->job_title, $default, FALSE); // job_title
		$this->buildSearchSql($where, $this->pay_grade, $default, FALSE); // pay_grade
		$this->buildSearchSql($where, $this->work_station_id, $default, FALSE); // work_station_id
		$this->buildSearchSql($where, $this->address1, $default, FALSE); // address1
		$this->buildSearchSql($where, $this->address2, $default, FALSE); // address2
		$this->buildSearchSql($where, $this->city, $default, FALSE); // city
		$this->buildSearchSql($where, $this->country, $default, FALSE); // country
		$this->buildSearchSql($where, $this->province, $default, FALSE); // province
		$this->buildSearchSql($where, $this->postal_code, $default, FALSE); // postal_code
		$this->buildSearchSql($where, $this->home_phone, $default, FALSE); // home_phone
		$this->buildSearchSql($where, $this->mobile_phone, $default, FALSE); // mobile_phone
		$this->buildSearchSql($where, $this->work_phone, $default, FALSE); // work_phone
		$this->buildSearchSql($where, $this->work_email, $default, FALSE); // work_email
		$this->buildSearchSql($where, $this->private_email, $default, FALSE); // private_email
		$this->buildSearchSql($where, $this->joined_date, $default, FALSE); // joined_date
		$this->buildSearchSql($where, $this->confirmation_date, $default, FALSE); // confirmation_date
		$this->buildSearchSql($where, $this->supervisor, $default, FALSE); // supervisor
		$this->buildSearchSql($where, $this->indirect_supervisors, $default, FALSE); // indirect_supervisors
		$this->buildSearchSql($where, $this->department, $default, FALSE); // department
		$this->buildSearchSql($where, $this->custom1, $default, FALSE); // custom1
		$this->buildSearchSql($where, $this->custom2, $default, FALSE); // custom2
		$this->buildSearchSql($where, $this->custom3, $default, FALSE); // custom3
		$this->buildSearchSql($where, $this->custom4, $default, FALSE); // custom4
		$this->buildSearchSql($where, $this->custom5, $default, FALSE); // custom5
		$this->buildSearchSql($where, $this->custom6, $default, FALSE); // custom6
		$this->buildSearchSql($where, $this->custom7, $default, FALSE); // custom7
		$this->buildSearchSql($where, $this->custom8, $default, FALSE); // custom8
		$this->buildSearchSql($where, $this->custom9, $default, FALSE); // custom9
		$this->buildSearchSql($where, $this->custom10, $default, FALSE); // custom10
		$this->buildSearchSql($where, $this->termination_date, $default, FALSE); // termination_date
		$this->buildSearchSql($where, $this->notes, $default, FALSE); // notes
		$this->buildSearchSql($where, $this->ethnicity, $default, FALSE); // ethnicity
		$this->buildSearchSql($where, $this->immigration_status, $default, FALSE); // immigration_status
		$this->buildSearchSql($where, $this->approver1, $default, FALSE); // approver1
		$this->buildSearchSql($where, $this->approver2, $default, FALSE); // approver2
		$this->buildSearchSql($where, $this->approver3, $default, FALSE); // approver3
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->employee_id->AdvancedSearch->save(); // employee_id
			$this->first_name->AdvancedSearch->save(); // first_name
			$this->middle_name->AdvancedSearch->save(); // middle_name
			$this->last_name->AdvancedSearch->save(); // last_name
			$this->gender->AdvancedSearch->save(); // gender
			$this->nationality->AdvancedSearch->save(); // nationality
			$this->birthday->AdvancedSearch->save(); // birthday
			$this->marital_status->AdvancedSearch->save(); // marital_status
			$this->ssn_num->AdvancedSearch->save(); // ssn_num
			$this->nic_num->AdvancedSearch->save(); // nic_num
			$this->other_id->AdvancedSearch->save(); // other_id
			$this->driving_license->AdvancedSearch->save(); // driving_license
			$this->driving_license_exp_date->AdvancedSearch->save(); // driving_license_exp_date
			$this->employment_status->AdvancedSearch->save(); // employment_status
			$this->job_title->AdvancedSearch->save(); // job_title
			$this->pay_grade->AdvancedSearch->save(); // pay_grade
			$this->work_station_id->AdvancedSearch->save(); // work_station_id
			$this->address1->AdvancedSearch->save(); // address1
			$this->address2->AdvancedSearch->save(); // address2
			$this->city->AdvancedSearch->save(); // city
			$this->country->AdvancedSearch->save(); // country
			$this->province->AdvancedSearch->save(); // province
			$this->postal_code->AdvancedSearch->save(); // postal_code
			$this->home_phone->AdvancedSearch->save(); // home_phone
			$this->mobile_phone->AdvancedSearch->save(); // mobile_phone
			$this->work_phone->AdvancedSearch->save(); // work_phone
			$this->work_email->AdvancedSearch->save(); // work_email
			$this->private_email->AdvancedSearch->save(); // private_email
			$this->joined_date->AdvancedSearch->save(); // joined_date
			$this->confirmation_date->AdvancedSearch->save(); // confirmation_date
			$this->supervisor->AdvancedSearch->save(); // supervisor
			$this->indirect_supervisors->AdvancedSearch->save(); // indirect_supervisors
			$this->department->AdvancedSearch->save(); // department
			$this->custom1->AdvancedSearch->save(); // custom1
			$this->custom2->AdvancedSearch->save(); // custom2
			$this->custom3->AdvancedSearch->save(); // custom3
			$this->custom4->AdvancedSearch->save(); // custom4
			$this->custom5->AdvancedSearch->save(); // custom5
			$this->custom6->AdvancedSearch->save(); // custom6
			$this->custom7->AdvancedSearch->save(); // custom7
			$this->custom8->AdvancedSearch->save(); // custom8
			$this->custom9->AdvancedSearch->save(); // custom9
			$this->custom10->AdvancedSearch->save(); // custom10
			$this->termination_date->AdvancedSearch->save(); // termination_date
			$this->notes->AdvancedSearch->save(); // notes
			$this->ethnicity->AdvancedSearch->save(); // ethnicity
			$this->immigration_status->AdvancedSearch->save(); // immigration_status
			$this->approver1->AdvancedSearch->save(); // approver1
			$this->approver2->AdvancedSearch->save(); // approver2
			$this->approver3->AdvancedSearch->save(); // approver3
			$this->status->AdvancedSearch->save(); // status
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
		$this->buildBasicSearchSql($where, $this->employee_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ssn_num, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->nic_num, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->other_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->driving_license, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->work_station_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->address1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->address2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->city, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->home_phone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mobile_phone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->work_phone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->work_email, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->private_email, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->indirect_supervisors, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->custom10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->notes, $arKeywords, $type);
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
		if ($this->employee_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->first_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->middle_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->last_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nationality->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->birthday->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->marital_status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ssn_num->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->nic_num->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->other_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->driving_license->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->driving_license_exp_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->employment_status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->job_title->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->pay_grade->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->work_station_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->address1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->address2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->city->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->country->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->province->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->postal_code->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->home_phone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mobile_phone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->work_phone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->work_email->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->private_email->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->joined_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->confirmation_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->supervisor->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->indirect_supervisors->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->department->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom4->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom5->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom6->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom7->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom8->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom9->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->custom10->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->termination_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->notes->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ethnicity->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->immigration_status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->approver1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->approver2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->approver3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
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
		$this->id->AdvancedSearch->unsetSession();
		$this->employee_id->AdvancedSearch->unsetSession();
		$this->first_name->AdvancedSearch->unsetSession();
		$this->middle_name->AdvancedSearch->unsetSession();
		$this->last_name->AdvancedSearch->unsetSession();
		$this->gender->AdvancedSearch->unsetSession();
		$this->nationality->AdvancedSearch->unsetSession();
		$this->birthday->AdvancedSearch->unsetSession();
		$this->marital_status->AdvancedSearch->unsetSession();
		$this->ssn_num->AdvancedSearch->unsetSession();
		$this->nic_num->AdvancedSearch->unsetSession();
		$this->other_id->AdvancedSearch->unsetSession();
		$this->driving_license->AdvancedSearch->unsetSession();
		$this->driving_license_exp_date->AdvancedSearch->unsetSession();
		$this->employment_status->AdvancedSearch->unsetSession();
		$this->job_title->AdvancedSearch->unsetSession();
		$this->pay_grade->AdvancedSearch->unsetSession();
		$this->work_station_id->AdvancedSearch->unsetSession();
		$this->address1->AdvancedSearch->unsetSession();
		$this->address2->AdvancedSearch->unsetSession();
		$this->city->AdvancedSearch->unsetSession();
		$this->country->AdvancedSearch->unsetSession();
		$this->province->AdvancedSearch->unsetSession();
		$this->postal_code->AdvancedSearch->unsetSession();
		$this->home_phone->AdvancedSearch->unsetSession();
		$this->mobile_phone->AdvancedSearch->unsetSession();
		$this->work_phone->AdvancedSearch->unsetSession();
		$this->work_email->AdvancedSearch->unsetSession();
		$this->private_email->AdvancedSearch->unsetSession();
		$this->joined_date->AdvancedSearch->unsetSession();
		$this->confirmation_date->AdvancedSearch->unsetSession();
		$this->supervisor->AdvancedSearch->unsetSession();
		$this->indirect_supervisors->AdvancedSearch->unsetSession();
		$this->department->AdvancedSearch->unsetSession();
		$this->custom1->AdvancedSearch->unsetSession();
		$this->custom2->AdvancedSearch->unsetSession();
		$this->custom3->AdvancedSearch->unsetSession();
		$this->custom4->AdvancedSearch->unsetSession();
		$this->custom5->AdvancedSearch->unsetSession();
		$this->custom6->AdvancedSearch->unsetSession();
		$this->custom7->AdvancedSearch->unsetSession();
		$this->custom8->AdvancedSearch->unsetSession();
		$this->custom9->AdvancedSearch->unsetSession();
		$this->custom10->AdvancedSearch->unsetSession();
		$this->termination_date->AdvancedSearch->unsetSession();
		$this->notes->AdvancedSearch->unsetSession();
		$this->ethnicity->AdvancedSearch->unsetSession();
		$this->immigration_status->AdvancedSearch->unsetSession();
		$this->approver1->AdvancedSearch->unsetSession();
		$this->approver2->AdvancedSearch->unsetSession();
		$this->approver3->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->employee_id->AdvancedSearch->load();
		$this->first_name->AdvancedSearch->load();
		$this->middle_name->AdvancedSearch->load();
		$this->last_name->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->nationality->AdvancedSearch->load();
		$this->birthday->AdvancedSearch->load();
		$this->marital_status->AdvancedSearch->load();
		$this->ssn_num->AdvancedSearch->load();
		$this->nic_num->AdvancedSearch->load();
		$this->other_id->AdvancedSearch->load();
		$this->driving_license->AdvancedSearch->load();
		$this->driving_license_exp_date->AdvancedSearch->load();
		$this->employment_status->AdvancedSearch->load();
		$this->job_title->AdvancedSearch->load();
		$this->pay_grade->AdvancedSearch->load();
		$this->work_station_id->AdvancedSearch->load();
		$this->address1->AdvancedSearch->load();
		$this->address2->AdvancedSearch->load();
		$this->city->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->province->AdvancedSearch->load();
		$this->postal_code->AdvancedSearch->load();
		$this->home_phone->AdvancedSearch->load();
		$this->mobile_phone->AdvancedSearch->load();
		$this->work_phone->AdvancedSearch->load();
		$this->work_email->AdvancedSearch->load();
		$this->private_email->AdvancedSearch->load();
		$this->joined_date->AdvancedSearch->load();
		$this->confirmation_date->AdvancedSearch->load();
		$this->supervisor->AdvancedSearch->load();
		$this->indirect_supervisors->AdvancedSearch->load();
		$this->department->AdvancedSearch->load();
		$this->custom1->AdvancedSearch->load();
		$this->custom2->AdvancedSearch->load();
		$this->custom3->AdvancedSearch->load();
		$this->custom4->AdvancedSearch->load();
		$this->custom5->AdvancedSearch->load();
		$this->custom6->AdvancedSearch->load();
		$this->custom7->AdvancedSearch->load();
		$this->custom8->AdvancedSearch->load();
		$this->custom9->AdvancedSearch->load();
		$this->custom10->AdvancedSearch->load();
		$this->termination_date->AdvancedSearch->load();
		$this->notes->AdvancedSearch->load();
		$this->ethnicity->AdvancedSearch->load();
		$this->immigration_status->AdvancedSearch->load();
		$this->approver1->AdvancedSearch->load();
		$this->approver2->AdvancedSearch->load();
		$this->approver3->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->employee_id); // employee_id
			$this->updateSort($this->first_name); // first_name
			$this->updateSort($this->middle_name); // middle_name
			$this->updateSort($this->last_name); // last_name
			$this->updateSort($this->gender); // gender
			$this->updateSort($this->nationality); // nationality
			$this->updateSort($this->birthday); // birthday
			$this->updateSort($this->marital_status); // marital_status
			$this->updateSort($this->ssn_num); // ssn_num
			$this->updateSort($this->nic_num); // nic_num
			$this->updateSort($this->other_id); // other_id
			$this->updateSort($this->driving_license); // driving_license
			$this->updateSort($this->driving_license_exp_date); // driving_license_exp_date
			$this->updateSort($this->employment_status); // employment_status
			$this->updateSort($this->job_title); // job_title
			$this->updateSort($this->pay_grade); // pay_grade
			$this->updateSort($this->work_station_id); // work_station_id
			$this->updateSort($this->address1); // address1
			$this->updateSort($this->address2); // address2
			$this->updateSort($this->city); // city
			$this->updateSort($this->country); // country
			$this->updateSort($this->province); // province
			$this->updateSort($this->postal_code); // postal_code
			$this->updateSort($this->home_phone); // home_phone
			$this->updateSort($this->mobile_phone); // mobile_phone
			$this->updateSort($this->work_phone); // work_phone
			$this->updateSort($this->work_email); // work_email
			$this->updateSort($this->private_email); // private_email
			$this->updateSort($this->joined_date); // joined_date
			$this->updateSort($this->confirmation_date); // confirmation_date
			$this->updateSort($this->supervisor); // supervisor
			$this->updateSort($this->indirect_supervisors); // indirect_supervisors
			$this->updateSort($this->department); // department
			$this->updateSort($this->custom1); // custom1
			$this->updateSort($this->custom2); // custom2
			$this->updateSort($this->custom3); // custom3
			$this->updateSort($this->custom4); // custom4
			$this->updateSort($this->custom5); // custom5
			$this->updateSort($this->custom6); // custom6
			$this->updateSort($this->custom7); // custom7
			$this->updateSort($this->custom8); // custom8
			$this->updateSort($this->custom9); // custom9
			$this->updateSort($this->custom10); // custom10
			$this->updateSort($this->termination_date); // termination_date
			$this->updateSort($this->ethnicity); // ethnicity
			$this->updateSort($this->immigration_status); // immigration_status
			$this->updateSort($this->approver1); // approver1
			$this->updateSort($this->approver2); // approver2
			$this->updateSort($this->approver3); // approver3
			$this->updateSort($this->status); // status
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
				$this->employee_id->setSort("");
				$this->first_name->setSort("");
				$this->middle_name->setSort("");
				$this->last_name->setSort("");
				$this->gender->setSort("");
				$this->nationality->setSort("");
				$this->birthday->setSort("");
				$this->marital_status->setSort("");
				$this->ssn_num->setSort("");
				$this->nic_num->setSort("");
				$this->other_id->setSort("");
				$this->driving_license->setSort("");
				$this->driving_license_exp_date->setSort("");
				$this->employment_status->setSort("");
				$this->job_title->setSort("");
				$this->pay_grade->setSort("");
				$this->work_station_id->setSort("");
				$this->address1->setSort("");
				$this->address2->setSort("");
				$this->city->setSort("");
				$this->country->setSort("");
				$this->province->setSort("");
				$this->postal_code->setSort("");
				$this->home_phone->setSort("");
				$this->mobile_phone->setSort("");
				$this->work_phone->setSort("");
				$this->work_email->setSort("");
				$this->private_email->setSort("");
				$this->joined_date->setSort("");
				$this->confirmation_date->setSort("");
				$this->supervisor->setSort("");
				$this->indirect_supervisors->setSort("");
				$this->department->setSort("");
				$this->custom1->setSort("");
				$this->custom2->setSort("");
				$this->custom3->setSort("");
				$this->custom4->setSort("");
				$this->custom5->setSort("");
				$this->custom6->setSort("");
				$this->custom7->setSort("");
				$this->custom8->setSort("");
				$this->custom9->setSort("");
				$this->custom10->setSort("");
				$this->termination_date->setSort("");
				$this->ethnicity->setSort("");
				$this->immigration_status->setSort("");
				$this->approver1->setSort("");
				$this->approver2->setSort("");
				$this->approver3->setSort("");
				$this->status->setSort("");
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

		// "detail_employee_address"
		$item = &$this->ListOptions->add("detail_employee_address");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_address') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_address_grid"]))
			$GLOBALS["employee_address_grid"] = new employee_address_grid();

		// "detail_employee_telephone"
		$item = &$this->ListOptions->add("detail_employee_telephone");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_telephone') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_telephone_grid"]))
			$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid();

		// "detail_employee_email"
		$item = &$this->ListOptions->add("detail_employee_email");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_email') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_email_grid"]))
			$GLOBALS["employee_email_grid"] = new employee_email_grid();

		// "detail_employee_has_degree"
		$item = &$this->ListOptions->add("detail_employee_has_degree");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_has_degree') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_has_degree_grid"]))
			$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid();

		// "detail_employee_has_experience"
		$item = &$this->ListOptions->add("detail_employee_has_experience");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_has_experience') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_has_experience_grid"]))
			$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid();

		// "detail_employee_document"
		$item = &$this->ListOptions->add("detail_employee_document");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'employee_document') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["employee_document_grid"]))
			$GLOBALS["employee_document_grid"] = new employee_document_grid();

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
		$pages->add("employee_address");
		$pages->add("employee_telephone");
		$pages->add("employee_email");
		$pages->add("employee_has_degree");
		$pages->add("employee_has_experience");
		$pages->add("employee_document");
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

		// "detail_employee_address"
		$opt = &$this->ListOptions->Items["detail_employee_address"];
		if ($Security->allowList(CurrentProjectID() . 'employee_address')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_address", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_addresslist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_address_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_address";
			}
			if ($GLOBALS["employee_address_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_address";
			}
			if ($GLOBALS["employee_address_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_address";
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

		// "detail_employee_telephone"
		$opt = &$this->ListOptions->Items["detail_employee_telephone"];
		if ($Security->allowList(CurrentProjectID() . 'employee_telephone')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_telephone", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_telephonelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_telephone_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_telephone";
			}
			if ($GLOBALS["employee_telephone_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_telephone";
			}
			if ($GLOBALS["employee_telephone_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_telephone";
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

		// "detail_employee_email"
		$opt = &$this->ListOptions->Items["detail_employee_email"];
		if ($Security->allowList(CurrentProjectID() . 'employee_email')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_email", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_emaillist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_email_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_email";
			}
			if ($GLOBALS["employee_email_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_email";
			}
			if ($GLOBALS["employee_email_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_email";
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

		// "detail_employee_has_degree"
		$opt = &$this->ListOptions->Items["detail_employee_has_degree"];
		if ($Security->allowList(CurrentProjectID() . 'employee_has_degree')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_has_degree", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_has_degreelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_has_degree_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_has_degree";
			}
			if ($GLOBALS["employee_has_degree_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_has_degree";
			}
			if ($GLOBALS["employee_has_degree_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_has_degree";
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

		// "detail_employee_has_experience"
		$opt = &$this->ListOptions->Items["detail_employee_has_experience"];
		if ($Security->allowList(CurrentProjectID() . 'employee_has_experience')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_has_experience", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_has_experiencelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_has_experience_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_has_experience";
			}
			if ($GLOBALS["employee_has_experience_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_has_experience";
			}
			if ($GLOBALS["employee_has_experience_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_has_experience";
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

		// "detail_employee_document"
		$opt = &$this->ListOptions->Items["detail_employee_document"];
		if ($Security->allowList(CurrentProjectID() . 'employee_document')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_document", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("employee_documentlist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["employee_document_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "employee_document";
			}
			if ($GLOBALS["employee_document_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "employee_document";
			}
			if ($GLOBALS["employee_document_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "employee_document";
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
		$item = &$option->add("detailadd_employee_address");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_address");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_address"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_address"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_address') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_address";
		}
		$item = &$option->add("detailadd_employee_telephone");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_telephone"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_telephone"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_telephone') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_telephone";
		}
		$item = &$option->add("detailadd_employee_email");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_email");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_email"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_email"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_email') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_email";
		}
		$item = &$option->add("detailadd_employee_has_degree");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_has_degree"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_has_degree"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_has_degree') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_has_degree";
		}
		$item = &$option->add("detailadd_employee_has_experience");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_has_experience"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_has_experience"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_has_experience') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_has_experience";
		}
		$item = &$option->add("detailadd_employee_document");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=employee_document");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["employee_document"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["employee_document"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee_document') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "employee_document";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"femployeelistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"femployeelistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.femployeelist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"femployeelistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_address"
		if ($this->DetailPages->Items["employee_address"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_address"];
			$url = "employee_addresspreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_address\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_address')) {
				$label = $Language->TablePhrase("employee_address", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_address\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_addresslist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_address", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_address_grid"]))
				$GLOBALS["employee_address_grid"] = new employee_address_grid();
			if ($GLOBALS["employee_address_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_address_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_address_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_address')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_address");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_telephone"
		if ($this->DetailPages->Items["employee_telephone"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_telephone"];
			$url = "employee_telephonepreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_telephone\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_telephone')) {
				$label = $Language->TablePhrase("employee_telephone", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_telephone\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_telephonelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_telephone", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_telephone_grid"]))
				$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid();
			if ($GLOBALS["employee_telephone_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_telephone_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_telephone_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_telephone')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_telephone");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_email"
		if ($this->DetailPages->Items["employee_email"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_email"];
			$url = "employee_emailpreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_email\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_email')) {
				$label = $Language->TablePhrase("employee_email", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_email\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_emaillist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_email", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_email_grid"]))
				$GLOBALS["employee_email_grid"] = new employee_email_grid();
			if ($GLOBALS["employee_email_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_email_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_email_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_email')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_email");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_has_degree"
		if ($this->DetailPages->Items["employee_has_degree"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_has_degree"];
			$url = "employee_has_degreepreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_has_degree\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_has_degree')) {
				$label = $Language->TablePhrase("employee_has_degree", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_has_degree\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_has_degreelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_has_degree", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_has_degree_grid"]))
				$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid();
			if ($GLOBALS["employee_has_degree_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_has_degree_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_has_degree_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_has_degree')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_has_degree");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_has_experience"
		if ($this->DetailPages->Items["employee_has_experience"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_has_experience"];
			$url = "employee_has_experiencepreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_has_experience\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_has_experience')) {
				$label = $Language->TablePhrase("employee_has_experience", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_has_experience\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_has_experiencelist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_has_experience", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_has_experience_grid"]))
				$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid();
			if ($GLOBALS["employee_has_experience_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_has_experience_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_has_experience_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_has_experience')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_has_experience");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_employee_document"
		if ($this->DetailPages->Items["employee_document"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_employee_document"];
			$url = "employee_documentpreview.php?t=employee&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"employee_document\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'employee_document')) {
				$label = $Language->TablePhrase("employee_document", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_document\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("employee_documentlist.php?" . TABLE_SHOW_MASTER . "=employee&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_document", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["employee_document_grid"]))
				$GLOBALS["employee_document_grid"] = new employee_document_grid();
			if ($GLOBALS["employee_document_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=employee_document");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_document_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=employee_document");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["employee_document_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee_document')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=employee_document");
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

		// employee_id
		if (!$this->isAddOrEdit())
			$this->employee_id->AdvancedSearch->setSearchValue(Get("x_employee_id", Get("employee_id", "")));
		if ($this->employee_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->employee_id->AdvancedSearch->setSearchOperator(Get("z_employee_id", ""));

		// first_name
		if (!$this->isAddOrEdit())
			$this->first_name->AdvancedSearch->setSearchValue(Get("x_first_name", Get("first_name", "")));
		if ($this->first_name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->first_name->AdvancedSearch->setSearchOperator(Get("z_first_name", ""));

		// middle_name
		if (!$this->isAddOrEdit())
			$this->middle_name->AdvancedSearch->setSearchValue(Get("x_middle_name", Get("middle_name", "")));
		if ($this->middle_name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->middle_name->AdvancedSearch->setSearchOperator(Get("z_middle_name", ""));

		// last_name
		if (!$this->isAddOrEdit())
			$this->last_name->AdvancedSearch->setSearchValue(Get("x_last_name", Get("last_name", "")));
		if ($this->last_name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->last_name->AdvancedSearch->setSearchOperator(Get("z_last_name", ""));

		// gender
		if (!$this->isAddOrEdit())
			$this->gender->AdvancedSearch->setSearchValue(Get("x_gender", Get("gender", "")));
		if ($this->gender->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->gender->AdvancedSearch->setSearchOperator(Get("z_gender", ""));

		// nationality
		if (!$this->isAddOrEdit())
			$this->nationality->AdvancedSearch->setSearchValue(Get("x_nationality", Get("nationality", "")));
		if ($this->nationality->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nationality->AdvancedSearch->setSearchOperator(Get("z_nationality", ""));

		// birthday
		if (!$this->isAddOrEdit())
			$this->birthday->AdvancedSearch->setSearchValue(Get("x_birthday", Get("birthday", "")));
		if ($this->birthday->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->birthday->AdvancedSearch->setSearchOperator(Get("z_birthday", ""));

		// marital_status
		if (!$this->isAddOrEdit())
			$this->marital_status->AdvancedSearch->setSearchValue(Get("x_marital_status", Get("marital_status", "")));
		if ($this->marital_status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->marital_status->AdvancedSearch->setSearchOperator(Get("z_marital_status", ""));

		// ssn_num
		if (!$this->isAddOrEdit())
			$this->ssn_num->AdvancedSearch->setSearchValue(Get("x_ssn_num", Get("ssn_num", "")));
		if ($this->ssn_num->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ssn_num->AdvancedSearch->setSearchOperator(Get("z_ssn_num", ""));

		// nic_num
		if (!$this->isAddOrEdit())
			$this->nic_num->AdvancedSearch->setSearchValue(Get("x_nic_num", Get("nic_num", "")));
		if ($this->nic_num->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->nic_num->AdvancedSearch->setSearchOperator(Get("z_nic_num", ""));

		// other_id
		if (!$this->isAddOrEdit())
			$this->other_id->AdvancedSearch->setSearchValue(Get("x_other_id", Get("other_id", "")));
		if ($this->other_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->other_id->AdvancedSearch->setSearchOperator(Get("z_other_id", ""));

		// driving_license
		if (!$this->isAddOrEdit())
			$this->driving_license->AdvancedSearch->setSearchValue(Get("x_driving_license", Get("driving_license", "")));
		if ($this->driving_license->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->driving_license->AdvancedSearch->setSearchOperator(Get("z_driving_license", ""));

		// driving_license_exp_date
		if (!$this->isAddOrEdit())
			$this->driving_license_exp_date->AdvancedSearch->setSearchValue(Get("x_driving_license_exp_date", Get("driving_license_exp_date", "")));
		if ($this->driving_license_exp_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->driving_license_exp_date->AdvancedSearch->setSearchOperator(Get("z_driving_license_exp_date", ""));

		// employment_status
		if (!$this->isAddOrEdit())
			$this->employment_status->AdvancedSearch->setSearchValue(Get("x_employment_status", Get("employment_status", "")));
		if ($this->employment_status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->employment_status->AdvancedSearch->setSearchOperator(Get("z_employment_status", ""));

		// job_title
		if (!$this->isAddOrEdit())
			$this->job_title->AdvancedSearch->setSearchValue(Get("x_job_title", Get("job_title", "")));
		if ($this->job_title->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->job_title->AdvancedSearch->setSearchOperator(Get("z_job_title", ""));

		// pay_grade
		if (!$this->isAddOrEdit())
			$this->pay_grade->AdvancedSearch->setSearchValue(Get("x_pay_grade", Get("pay_grade", "")));
		if ($this->pay_grade->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->pay_grade->AdvancedSearch->setSearchOperator(Get("z_pay_grade", ""));

		// work_station_id
		if (!$this->isAddOrEdit())
			$this->work_station_id->AdvancedSearch->setSearchValue(Get("x_work_station_id", Get("work_station_id", "")));
		if ($this->work_station_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->work_station_id->AdvancedSearch->setSearchOperator(Get("z_work_station_id", ""));

		// address1
		if (!$this->isAddOrEdit())
			$this->address1->AdvancedSearch->setSearchValue(Get("x_address1", Get("address1", "")));
		if ($this->address1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->address1->AdvancedSearch->setSearchOperator(Get("z_address1", ""));

		// address2
		if (!$this->isAddOrEdit())
			$this->address2->AdvancedSearch->setSearchValue(Get("x_address2", Get("address2", "")));
		if ($this->address2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->address2->AdvancedSearch->setSearchOperator(Get("z_address2", ""));

		// city
		if (!$this->isAddOrEdit())
			$this->city->AdvancedSearch->setSearchValue(Get("x_city", Get("city", "")));
		if ($this->city->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->city->AdvancedSearch->setSearchOperator(Get("z_city", ""));

		// country
		if (!$this->isAddOrEdit())
			$this->country->AdvancedSearch->setSearchValue(Get("x_country", Get("country", "")));
		if ($this->country->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->country->AdvancedSearch->setSearchOperator(Get("z_country", ""));

		// province
		if (!$this->isAddOrEdit())
			$this->province->AdvancedSearch->setSearchValue(Get("x_province", Get("province", "")));
		if ($this->province->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->province->AdvancedSearch->setSearchOperator(Get("z_province", ""));

		// postal_code
		if (!$this->isAddOrEdit())
			$this->postal_code->AdvancedSearch->setSearchValue(Get("x_postal_code", Get("postal_code", "")));
		if ($this->postal_code->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->postal_code->AdvancedSearch->setSearchOperator(Get("z_postal_code", ""));

		// home_phone
		if (!$this->isAddOrEdit())
			$this->home_phone->AdvancedSearch->setSearchValue(Get("x_home_phone", Get("home_phone", "")));
		if ($this->home_phone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->home_phone->AdvancedSearch->setSearchOperator(Get("z_home_phone", ""));

		// mobile_phone
		if (!$this->isAddOrEdit())
			$this->mobile_phone->AdvancedSearch->setSearchValue(Get("x_mobile_phone", Get("mobile_phone", "")));
		if ($this->mobile_phone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->mobile_phone->AdvancedSearch->setSearchOperator(Get("z_mobile_phone", ""));

		// work_phone
		if (!$this->isAddOrEdit())
			$this->work_phone->AdvancedSearch->setSearchValue(Get("x_work_phone", Get("work_phone", "")));
		if ($this->work_phone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->work_phone->AdvancedSearch->setSearchOperator(Get("z_work_phone", ""));

		// work_email
		if (!$this->isAddOrEdit())
			$this->work_email->AdvancedSearch->setSearchValue(Get("x_work_email", Get("work_email", "")));
		if ($this->work_email->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->work_email->AdvancedSearch->setSearchOperator(Get("z_work_email", ""));

		// private_email
		if (!$this->isAddOrEdit())
			$this->private_email->AdvancedSearch->setSearchValue(Get("x_private_email", Get("private_email", "")));
		if ($this->private_email->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->private_email->AdvancedSearch->setSearchOperator(Get("z_private_email", ""));

		// joined_date
		if (!$this->isAddOrEdit())
			$this->joined_date->AdvancedSearch->setSearchValue(Get("x_joined_date", Get("joined_date", "")));
		if ($this->joined_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->joined_date->AdvancedSearch->setSearchOperator(Get("z_joined_date", ""));

		// confirmation_date
		if (!$this->isAddOrEdit())
			$this->confirmation_date->AdvancedSearch->setSearchValue(Get("x_confirmation_date", Get("confirmation_date", "")));
		if ($this->confirmation_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->confirmation_date->AdvancedSearch->setSearchOperator(Get("z_confirmation_date", ""));

		// supervisor
		if (!$this->isAddOrEdit())
			$this->supervisor->AdvancedSearch->setSearchValue(Get("x_supervisor", Get("supervisor", "")));
		if ($this->supervisor->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->supervisor->AdvancedSearch->setSearchOperator(Get("z_supervisor", ""));

		// indirect_supervisors
		if (!$this->isAddOrEdit())
			$this->indirect_supervisors->AdvancedSearch->setSearchValue(Get("x_indirect_supervisors", Get("indirect_supervisors", "")));
		if ($this->indirect_supervisors->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->indirect_supervisors->AdvancedSearch->setSearchOperator(Get("z_indirect_supervisors", ""));

		// department
		if (!$this->isAddOrEdit())
			$this->department->AdvancedSearch->setSearchValue(Get("x_department", Get("department", "")));
		if ($this->department->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->department->AdvancedSearch->setSearchOperator(Get("z_department", ""));

		// custom1
		if (!$this->isAddOrEdit())
			$this->custom1->AdvancedSearch->setSearchValue(Get("x_custom1", Get("custom1", "")));
		if ($this->custom1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom1->AdvancedSearch->setSearchOperator(Get("z_custom1", ""));

		// custom2
		if (!$this->isAddOrEdit())
			$this->custom2->AdvancedSearch->setSearchValue(Get("x_custom2", Get("custom2", "")));
		if ($this->custom2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom2->AdvancedSearch->setSearchOperator(Get("z_custom2", ""));

		// custom3
		if (!$this->isAddOrEdit())
			$this->custom3->AdvancedSearch->setSearchValue(Get("x_custom3", Get("custom3", "")));
		if ($this->custom3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom3->AdvancedSearch->setSearchOperator(Get("z_custom3", ""));

		// custom4
		if (!$this->isAddOrEdit())
			$this->custom4->AdvancedSearch->setSearchValue(Get("x_custom4", Get("custom4", "")));
		if ($this->custom4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom4->AdvancedSearch->setSearchOperator(Get("z_custom4", ""));

		// custom5
		if (!$this->isAddOrEdit())
			$this->custom5->AdvancedSearch->setSearchValue(Get("x_custom5", Get("custom5", "")));
		if ($this->custom5->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom5->AdvancedSearch->setSearchOperator(Get("z_custom5", ""));

		// custom6
		if (!$this->isAddOrEdit())
			$this->custom6->AdvancedSearch->setSearchValue(Get("x_custom6", Get("custom6", "")));
		if ($this->custom6->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom6->AdvancedSearch->setSearchOperator(Get("z_custom6", ""));

		// custom7
		if (!$this->isAddOrEdit())
			$this->custom7->AdvancedSearch->setSearchValue(Get("x_custom7", Get("custom7", "")));
		if ($this->custom7->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom7->AdvancedSearch->setSearchOperator(Get("z_custom7", ""));

		// custom8
		if (!$this->isAddOrEdit())
			$this->custom8->AdvancedSearch->setSearchValue(Get("x_custom8", Get("custom8", "")));
		if ($this->custom8->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom8->AdvancedSearch->setSearchOperator(Get("z_custom8", ""));

		// custom9
		if (!$this->isAddOrEdit())
			$this->custom9->AdvancedSearch->setSearchValue(Get("x_custom9", Get("custom9", "")));
		if ($this->custom9->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom9->AdvancedSearch->setSearchOperator(Get("z_custom9", ""));

		// custom10
		if (!$this->isAddOrEdit())
			$this->custom10->AdvancedSearch->setSearchValue(Get("x_custom10", Get("custom10", "")));
		if ($this->custom10->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->custom10->AdvancedSearch->setSearchOperator(Get("z_custom10", ""));

		// termination_date
		if (!$this->isAddOrEdit())
			$this->termination_date->AdvancedSearch->setSearchValue(Get("x_termination_date", Get("termination_date", "")));
		if ($this->termination_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->termination_date->AdvancedSearch->setSearchOperator(Get("z_termination_date", ""));

		// notes
		if (!$this->isAddOrEdit())
			$this->notes->AdvancedSearch->setSearchValue(Get("x_notes", Get("notes", "")));
		if ($this->notes->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->notes->AdvancedSearch->setSearchOperator(Get("z_notes", ""));

		// ethnicity
		if (!$this->isAddOrEdit())
			$this->ethnicity->AdvancedSearch->setSearchValue(Get("x_ethnicity", Get("ethnicity", "")));
		if ($this->ethnicity->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ethnicity->AdvancedSearch->setSearchOperator(Get("z_ethnicity", ""));

		// immigration_status
		if (!$this->isAddOrEdit())
			$this->immigration_status->AdvancedSearch->setSearchValue(Get("x_immigration_status", Get("immigration_status", "")));
		if ($this->immigration_status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->immigration_status->AdvancedSearch->setSearchOperator(Get("z_immigration_status", ""));

		// approver1
		if (!$this->isAddOrEdit())
			$this->approver1->AdvancedSearch->setSearchValue(Get("x_approver1", Get("approver1", "")));
		if ($this->approver1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->approver1->AdvancedSearch->setSearchOperator(Get("z_approver1", ""));

		// approver2
		if (!$this->isAddOrEdit())
			$this->approver2->AdvancedSearch->setSearchValue(Get("x_approver2", Get("approver2", "")));
		if ($this->approver2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->approver2->AdvancedSearch->setSearchOperator(Get("z_approver2", ""));

		// approver3
		if (!$this->isAddOrEdit())
			$this->approver3->AdvancedSearch->setSearchValue(Get("x_approver3", Get("approver3", "")));
		if ($this->approver3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->approver3->AdvancedSearch->setSearchOperator(Get("z_approver3", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));

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
		$this->id->setDbValue($row['id']);
		$this->employee_id->setDbValue($row['employee_id']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->nationality->setDbValue($row['nationality']);
		$this->birthday->setDbValue($row['birthday']);
		$this->marital_status->setDbValue($row['marital_status']);
		$this->ssn_num->setDbValue($row['ssn_num']);
		$this->nic_num->setDbValue($row['nic_num']);
		$this->other_id->setDbValue($row['other_id']);
		$this->driving_license->setDbValue($row['driving_license']);
		$this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
		$this->employment_status->setDbValue($row['employment_status']);
		$this->job_title->setDbValue($row['job_title']);
		$this->pay_grade->setDbValue($row['pay_grade']);
		$this->work_station_id->setDbValue($row['work_station_id']);
		$this->address1->setDbValue($row['address1']);
		$this->address2->setDbValue($row['address2']);
		$this->city->setDbValue($row['city']);
		$this->country->setDbValue($row['country']);
		$this->province->setDbValue($row['province']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->home_phone->setDbValue($row['home_phone']);
		$this->mobile_phone->setDbValue($row['mobile_phone']);
		$this->work_phone->setDbValue($row['work_phone']);
		$this->work_email->setDbValue($row['work_email']);
		$this->private_email->setDbValue($row['private_email']);
		$this->joined_date->setDbValue($row['joined_date']);
		$this->confirmation_date->setDbValue($row['confirmation_date']);
		$this->supervisor->setDbValue($row['supervisor']);
		$this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
		$this->department->setDbValue($row['department']);
		$this->custom1->setDbValue($row['custom1']);
		$this->custom2->setDbValue($row['custom2']);
		$this->custom3->setDbValue($row['custom3']);
		$this->custom4->setDbValue($row['custom4']);
		$this->custom5->setDbValue($row['custom5']);
		$this->custom6->setDbValue($row['custom6']);
		$this->custom7->setDbValue($row['custom7']);
		$this->custom8->setDbValue($row['custom8']);
		$this->custom9->setDbValue($row['custom9']);
		$this->custom10->setDbValue($row['custom10']);
		$this->termination_date->setDbValue($row['termination_date']);
		$this->notes->setDbValue($row['notes']);
		$this->ethnicity->setDbValue($row['ethnicity']);
		$this->immigration_status->setDbValue($row['immigration_status']);
		$this->approver1->setDbValue($row['approver1']);
		$this->approver2->setDbValue($row['approver2']);
		$this->approver3->setDbValue($row['approver3']);
		$this->status->setDbValue($row['status']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['employee_id'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['nationality'] = NULL;
		$row['birthday'] = NULL;
		$row['marital_status'] = NULL;
		$row['ssn_num'] = NULL;
		$row['nic_num'] = NULL;
		$row['other_id'] = NULL;
		$row['driving_license'] = NULL;
		$row['driving_license_exp_date'] = NULL;
		$row['employment_status'] = NULL;
		$row['job_title'] = NULL;
		$row['pay_grade'] = NULL;
		$row['work_station_id'] = NULL;
		$row['address1'] = NULL;
		$row['address2'] = NULL;
		$row['city'] = NULL;
		$row['country'] = NULL;
		$row['province'] = NULL;
		$row['postal_code'] = NULL;
		$row['home_phone'] = NULL;
		$row['mobile_phone'] = NULL;
		$row['work_phone'] = NULL;
		$row['work_email'] = NULL;
		$row['private_email'] = NULL;
		$row['joined_date'] = NULL;
		$row['confirmation_date'] = NULL;
		$row['supervisor'] = NULL;
		$row['indirect_supervisors'] = NULL;
		$row['department'] = NULL;
		$row['custom1'] = NULL;
		$row['custom2'] = NULL;
		$row['custom3'] = NULL;
		$row['custom4'] = NULL;
		$row['custom5'] = NULL;
		$row['custom6'] = NULL;
		$row['custom7'] = NULL;
		$row['custom8'] = NULL;
		$row['custom9'] = NULL;
		$row['custom10'] = NULL;
		$row['termination_date'] = NULL;
		$row['notes'] = NULL;
		$row['ethnicity'] = NULL;
		$row['immigration_status'] = NULL;
		$row['approver1'] = NULL;
		$row['approver2'] = NULL;
		$row['approver3'] = NULL;
		$row['status'] = NULL;
		$row['HospID'] = NULL;
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
		// employee_id
		// first_name
		// middle_name
		// last_name
		// gender
		// nationality
		// birthday
		// marital_status
		// ssn_num
		// nic_num
		// other_id
		// driving_license
		// driving_license_exp_date
		// employment_status
		// job_title
		// pay_grade
		// work_station_id
		// address1
		// address2
		// city
		// country
		// province
		// postal_code
		// home_phone
		// mobile_phone
		// work_phone
		// work_email
		// private_email
		// joined_date
		// confirmation_date
		// supervisor
		// indirect_supervisors
		// department
		// custom1
		// custom2
		// custom3
		// custom4
		// custom5
		// custom6
		// custom7
		// custom8
		// custom9
		// custom10
		// termination_date
		// notes
		// ethnicity
		// immigration_status
		// approver1
		// approver2
		// approver3
		// status
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee_id
			$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
			$this->employee_id->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// gender
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal <> "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->gender->ViewValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->ViewValue = $this->gender->CurrentValue;
					}
				}
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// nationality
			$curVal = strval($this->nationality->CurrentValue);
			if ($curVal <> "") {
				$this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
				if ($this->nationality->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->nationality->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->nationality->ViewValue = $this->nationality->CurrentValue;
					}
				}
			} else {
				$this->nationality->ViewValue = NULL;
			}
			$this->nationality->ViewCustomAttributes = "";

			// birthday
			$this->birthday->ViewValue = $this->birthday->CurrentValue;
			$this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
			$this->birthday->ViewCustomAttributes = "";

			// marital_status
			if (strval($this->marital_status->CurrentValue) <> "") {
				$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
			} else {
				$this->marital_status->ViewValue = NULL;
			}
			$this->marital_status->ViewCustomAttributes = "";

			// ssn_num
			$this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
			$this->ssn_num->ViewCustomAttributes = "";

			// nic_num
			$this->nic_num->ViewValue = $this->nic_num->CurrentValue;
			$this->nic_num->ViewCustomAttributes = "";

			// other_id
			$this->other_id->ViewValue = $this->other_id->CurrentValue;
			$this->other_id->ViewCustomAttributes = "";

			// driving_license
			$this->driving_license->ViewValue = $this->driving_license->CurrentValue;
			$this->driving_license->ViewCustomAttributes = "";

			// driving_license_exp_date
			$this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
			$this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
			$this->driving_license_exp_date->ViewCustomAttributes = "";

			// employment_status
			$this->employment_status->ViewValue = $this->employment_status->CurrentValue;
			$this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
			$this->employment_status->ViewCustomAttributes = "";

			// job_title
			$this->job_title->ViewValue = $this->job_title->CurrentValue;
			$this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
			$this->job_title->ViewCustomAttributes = "";

			// pay_grade
			$this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
			$this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
			$this->pay_grade->ViewCustomAttributes = "";

			// work_station_id
			$this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
			$this->work_station_id->ViewCustomAttributes = "";

			// address1
			$this->address1->ViewValue = $this->address1->CurrentValue;
			$this->address1->ViewCustomAttributes = "";

			// address2
			$this->address2->ViewValue = $this->address2->CurrentValue;
			$this->address2->ViewCustomAttributes = "";

			// city
			$this->city->ViewValue = $this->city->CurrentValue;
			$this->city->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
			$this->province->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// home_phone
			$this->home_phone->ViewValue = $this->home_phone->CurrentValue;
			$this->home_phone->ViewCustomAttributes = "";

			// mobile_phone
			$this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
			$this->mobile_phone->ViewCustomAttributes = "";

			// work_phone
			$this->work_phone->ViewValue = $this->work_phone->CurrentValue;
			$this->work_phone->ViewCustomAttributes = "";

			// work_email
			$this->work_email->ViewValue = $this->work_email->CurrentValue;
			$this->work_email->ViewCustomAttributes = "";

			// private_email
			$this->private_email->ViewValue = $this->private_email->CurrentValue;
			$this->private_email->ViewCustomAttributes = "";

			// joined_date
			$this->joined_date->ViewValue = $this->joined_date->CurrentValue;
			$this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
			$this->joined_date->ViewCustomAttributes = "";

			// confirmation_date
			$this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
			$this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
			$this->confirmation_date->ViewCustomAttributes = "";

			// supervisor
			$this->supervisor->ViewValue = $this->supervisor->CurrentValue;
			$this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
			$this->supervisor->ViewCustomAttributes = "";

			// indirect_supervisors
			$this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
			$this->indirect_supervisors->ViewCustomAttributes = "";

			// department
			$this->department->ViewValue = $this->department->CurrentValue;
			$this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
			$this->department->ViewCustomAttributes = "";

			// custom1
			$this->custom1->ViewValue = $this->custom1->CurrentValue;
			$this->custom1->ViewCustomAttributes = "";

			// custom2
			$this->custom2->ViewValue = $this->custom2->CurrentValue;
			$this->custom2->ViewCustomAttributes = "";

			// custom3
			$this->custom3->ViewValue = $this->custom3->CurrentValue;
			$this->custom3->ViewCustomAttributes = "";

			// custom4
			$this->custom4->ViewValue = $this->custom4->CurrentValue;
			$this->custom4->ViewCustomAttributes = "";

			// custom5
			$this->custom5->ViewValue = $this->custom5->CurrentValue;
			$this->custom5->ViewCustomAttributes = "";

			// custom6
			$this->custom6->ViewValue = $this->custom6->CurrentValue;
			$this->custom6->ViewCustomAttributes = "";

			// custom7
			$this->custom7->ViewValue = $this->custom7->CurrentValue;
			$this->custom7->ViewCustomAttributes = "";

			// custom8
			$this->custom8->ViewValue = $this->custom8->CurrentValue;
			$this->custom8->ViewCustomAttributes = "";

			// custom9
			$this->custom9->ViewValue = $this->custom9->CurrentValue;
			$this->custom9->ViewCustomAttributes = "";

			// custom10
			$this->custom10->ViewValue = $this->custom10->CurrentValue;
			$this->custom10->ViewCustomAttributes = "";

			// termination_date
			$this->termination_date->ViewValue = $this->termination_date->CurrentValue;
			$this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
			$this->termination_date->ViewCustomAttributes = "";

			// ethnicity
			$this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
			$this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
			$this->ethnicity->ViewCustomAttributes = "";

			// immigration_status
			$this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
			$this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
			$this->immigration_status->ViewCustomAttributes = "";

			// approver1
			$curVal = strval($this->approver1->CurrentValue);
			if ($curVal <> "") {
				$this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
				if ($this->approver1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver1->ViewValue = $this->approver1->CurrentValue;
					}
				}
			} else {
				$this->approver1->ViewValue = NULL;
			}
			$this->approver1->ViewCustomAttributes = "";

			// approver2
			$curVal = strval($this->approver2->CurrentValue);
			if ($curVal <> "") {
				$this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
				if ($this->approver2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver2->ViewValue = $this->approver2->CurrentValue;
					}
				}
			} else {
				$this->approver2->ViewValue = NULL;
			}
			$this->approver2->ViewCustomAttributes = "";

			// approver3
			$curVal = strval($this->approver3->CurrentValue);
			if ($curVal <> "") {
				$this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
				if ($this->approver3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver3->ViewValue = $this->approver3->CurrentValue;
					}
				}
			} else {
				$this->approver3->ViewValue = NULL;
			}
			$this->approver3->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal <> "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// employee_id
			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";
			$this->employee_id->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";
			$this->middle_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";
			$this->nationality->TooltipValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";
			$this->birthday->TooltipValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";
			$this->marital_status->TooltipValue = "";

			// ssn_num
			$this->ssn_num->LinkCustomAttributes = "";
			$this->ssn_num->HrefValue = "";
			$this->ssn_num->TooltipValue = "";

			// nic_num
			$this->nic_num->LinkCustomAttributes = "";
			$this->nic_num->HrefValue = "";
			$this->nic_num->TooltipValue = "";

			// other_id
			$this->other_id->LinkCustomAttributes = "";
			$this->other_id->HrefValue = "";
			$this->other_id->TooltipValue = "";

			// driving_license
			$this->driving_license->LinkCustomAttributes = "";
			$this->driving_license->HrefValue = "";
			$this->driving_license->TooltipValue = "";

			// driving_license_exp_date
			$this->driving_license_exp_date->LinkCustomAttributes = "";
			$this->driving_license_exp_date->HrefValue = "";
			$this->driving_license_exp_date->TooltipValue = "";

			// employment_status
			$this->employment_status->LinkCustomAttributes = "";
			$this->employment_status->HrefValue = "";
			$this->employment_status->TooltipValue = "";

			// job_title
			$this->job_title->LinkCustomAttributes = "";
			$this->job_title->HrefValue = "";
			$this->job_title->TooltipValue = "";

			// pay_grade
			$this->pay_grade->LinkCustomAttributes = "";
			$this->pay_grade->HrefValue = "";
			$this->pay_grade->TooltipValue = "";

			// work_station_id
			$this->work_station_id->LinkCustomAttributes = "";
			$this->work_station_id->HrefValue = "";
			$this->work_station_id->TooltipValue = "";

			// address1
			$this->address1->LinkCustomAttributes = "";
			$this->address1->HrefValue = "";
			$this->address1->TooltipValue = "";

			// address2
			$this->address2->LinkCustomAttributes = "";
			$this->address2->HrefValue = "";
			$this->address2->TooltipValue = "";

			// city
			$this->city->LinkCustomAttributes = "";
			$this->city->HrefValue = "";
			$this->city->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";
			$this->home_phone->TooltipValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";
			$this->mobile_phone->TooltipValue = "";

			// work_phone
			$this->work_phone->LinkCustomAttributes = "";
			$this->work_phone->HrefValue = "";
			$this->work_phone->TooltipValue = "";

			// work_email
			$this->work_email->LinkCustomAttributes = "";
			$this->work_email->HrefValue = "";
			$this->work_email->TooltipValue = "";

			// private_email
			$this->private_email->LinkCustomAttributes = "";
			$this->private_email->HrefValue = "";
			$this->private_email->TooltipValue = "";

			// joined_date
			$this->joined_date->LinkCustomAttributes = "";
			$this->joined_date->HrefValue = "";
			$this->joined_date->TooltipValue = "";

			// confirmation_date
			$this->confirmation_date->LinkCustomAttributes = "";
			$this->confirmation_date->HrefValue = "";
			$this->confirmation_date->TooltipValue = "";

			// supervisor
			$this->supervisor->LinkCustomAttributes = "";
			$this->supervisor->HrefValue = "";
			$this->supervisor->TooltipValue = "";

			// indirect_supervisors
			$this->indirect_supervisors->LinkCustomAttributes = "";
			$this->indirect_supervisors->HrefValue = "";
			$this->indirect_supervisors->TooltipValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";
			$this->department->TooltipValue = "";

			// custom1
			$this->custom1->LinkCustomAttributes = "";
			$this->custom1->HrefValue = "";
			$this->custom1->TooltipValue = "";

			// custom2
			$this->custom2->LinkCustomAttributes = "";
			$this->custom2->HrefValue = "";
			$this->custom2->TooltipValue = "";

			// custom3
			$this->custom3->LinkCustomAttributes = "";
			$this->custom3->HrefValue = "";
			$this->custom3->TooltipValue = "";

			// custom4
			$this->custom4->LinkCustomAttributes = "";
			$this->custom4->HrefValue = "";
			$this->custom4->TooltipValue = "";

			// custom5
			$this->custom5->LinkCustomAttributes = "";
			$this->custom5->HrefValue = "";
			$this->custom5->TooltipValue = "";

			// custom6
			$this->custom6->LinkCustomAttributes = "";
			$this->custom6->HrefValue = "";
			$this->custom6->TooltipValue = "";

			// custom7
			$this->custom7->LinkCustomAttributes = "";
			$this->custom7->HrefValue = "";
			$this->custom7->TooltipValue = "";

			// custom8
			$this->custom8->LinkCustomAttributes = "";
			$this->custom8->HrefValue = "";
			$this->custom8->TooltipValue = "";

			// custom9
			$this->custom9->LinkCustomAttributes = "";
			$this->custom9->HrefValue = "";
			$this->custom9->TooltipValue = "";

			// custom10
			$this->custom10->LinkCustomAttributes = "";
			$this->custom10->HrefValue = "";
			$this->custom10->TooltipValue = "";

			// termination_date
			$this->termination_date->LinkCustomAttributes = "";
			$this->termination_date->HrefValue = "";
			$this->termination_date->TooltipValue = "";

			// ethnicity
			$this->ethnicity->LinkCustomAttributes = "";
			$this->ethnicity->HrefValue = "";
			$this->ethnicity->TooltipValue = "";

			// immigration_status
			$this->immigration_status->LinkCustomAttributes = "";
			$this->immigration_status->HrefValue = "";
			$this->immigration_status->TooltipValue = "";

			// approver1
			$this->approver1->LinkCustomAttributes = "";
			$this->approver1->HrefValue = "";
			$this->approver1->TooltipValue = "";

			// approver2
			$this->approver2->LinkCustomAttributes = "";
			$this->approver2->HrefValue = "";
			$this->approver2->TooltipValue = "";

			// approver3
			$this->approver3->LinkCustomAttributes = "";
			$this->approver3->HrefValue = "";
			$this->approver3->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// employee_id
			$this->employee_id->EditAttrs["class"] = "form-control";
			$this->employee_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->employee_id->AdvancedSearch->SearchValue = HtmlDecode($this->employee_id->AdvancedSearch->SearchValue);
			$this->employee_id->EditValue = HtmlEncode($this->employee_id->AdvancedSearch->SearchValue);
			$this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// middle_name
			$this->middle_name->EditAttrs["class"] = "form-control";
			$this->middle_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->middle_name->AdvancedSearch->SearchValue);
			$this->middle_name->EditValue = HtmlEncode($this->middle_name->AdvancedSearch->SearchValue);
			$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->last_name->AdvancedSearch->SearchValue = HtmlDecode($this->last_name->AdvancedSearch->SearchValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->AdvancedSearch->SearchValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";

			// nationality
			$this->nationality->EditAttrs["class"] = "form-control";
			$this->nationality->EditCustomAttributes = "";

			// birthday
			$this->birthday->EditAttrs["class"] = "form-control";
			$this->birthday->EditCustomAttributes = "";
			$this->birthday->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->birthday->AdvancedSearch->SearchValue, 0), 8));
			$this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

			// marital_status
			$this->marital_status->EditCustomAttributes = "";
			$this->marital_status->EditValue = $this->marital_status->options(FALSE);

			// ssn_num
			$this->ssn_num->EditAttrs["class"] = "form-control";
			$this->ssn_num->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ssn_num->AdvancedSearch->SearchValue = HtmlDecode($this->ssn_num->AdvancedSearch->SearchValue);
			$this->ssn_num->EditValue = HtmlEncode($this->ssn_num->AdvancedSearch->SearchValue);
			$this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

			// nic_num
			$this->nic_num->EditAttrs["class"] = "form-control";
			$this->nic_num->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nic_num->AdvancedSearch->SearchValue = HtmlDecode($this->nic_num->AdvancedSearch->SearchValue);
			$this->nic_num->EditValue = HtmlEncode($this->nic_num->AdvancedSearch->SearchValue);
			$this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

			// other_id
			$this->other_id->EditAttrs["class"] = "form-control";
			$this->other_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->other_id->AdvancedSearch->SearchValue = HtmlDecode($this->other_id->AdvancedSearch->SearchValue);
			$this->other_id->EditValue = HtmlEncode($this->other_id->AdvancedSearch->SearchValue);
			$this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

			// driving_license
			$this->driving_license->EditAttrs["class"] = "form-control";
			$this->driving_license->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->driving_license->AdvancedSearch->SearchValue = HtmlDecode($this->driving_license->AdvancedSearch->SearchValue);
			$this->driving_license->EditValue = HtmlEncode($this->driving_license->AdvancedSearch->SearchValue);
			$this->driving_license->PlaceHolder = RemoveHtml($this->driving_license->caption());

			// driving_license_exp_date
			$this->driving_license_exp_date->EditAttrs["class"] = "form-control";
			$this->driving_license_exp_date->EditCustomAttributes = "";
			$this->driving_license_exp_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->driving_license_exp_date->AdvancedSearch->SearchValue, 0), 8));
			$this->driving_license_exp_date->PlaceHolder = RemoveHtml($this->driving_license_exp_date->caption());

			// employment_status
			$this->employment_status->EditAttrs["class"] = "form-control";
			$this->employment_status->EditCustomAttributes = "";
			$this->employment_status->EditValue = HtmlEncode($this->employment_status->AdvancedSearch->SearchValue);
			$this->employment_status->PlaceHolder = RemoveHtml($this->employment_status->caption());

			// job_title
			$this->job_title->EditAttrs["class"] = "form-control";
			$this->job_title->EditCustomAttributes = "";
			$this->job_title->EditValue = HtmlEncode($this->job_title->AdvancedSearch->SearchValue);
			$this->job_title->PlaceHolder = RemoveHtml($this->job_title->caption());

			// pay_grade
			$this->pay_grade->EditAttrs["class"] = "form-control";
			$this->pay_grade->EditCustomAttributes = "";
			$this->pay_grade->EditValue = HtmlEncode($this->pay_grade->AdvancedSearch->SearchValue);
			$this->pay_grade->PlaceHolder = RemoveHtml($this->pay_grade->caption());

			// work_station_id
			$this->work_station_id->EditAttrs["class"] = "form-control";
			$this->work_station_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_station_id->AdvancedSearch->SearchValue = HtmlDecode($this->work_station_id->AdvancedSearch->SearchValue);
			$this->work_station_id->EditValue = HtmlEncode($this->work_station_id->AdvancedSearch->SearchValue);
			$this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

			// address1
			$this->address1->EditAttrs["class"] = "form-control";
			$this->address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address1->AdvancedSearch->SearchValue = HtmlDecode($this->address1->AdvancedSearch->SearchValue);
			$this->address1->EditValue = HtmlEncode($this->address1->AdvancedSearch->SearchValue);
			$this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

			// address2
			$this->address2->EditAttrs["class"] = "form-control";
			$this->address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address2->AdvancedSearch->SearchValue = HtmlDecode($this->address2->AdvancedSearch->SearchValue);
			$this->address2->EditValue = HtmlEncode($this->address2->AdvancedSearch->SearchValue);
			$this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

			// city
			$this->city->EditAttrs["class"] = "form-control";
			$this->city->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->city->AdvancedSearch->SearchValue = HtmlDecode($this->city->AdvancedSearch->SearchValue);
			$this->city->EditValue = HtmlEncode($this->city->AdvancedSearch->SearchValue);
			$this->city->PlaceHolder = RemoveHtml($this->city->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
			$this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			$this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// home_phone
			$this->home_phone->EditAttrs["class"] = "form-control";
			$this->home_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->home_phone->AdvancedSearch->SearchValue = HtmlDecode($this->home_phone->AdvancedSearch->SearchValue);
			$this->home_phone->EditValue = HtmlEncode($this->home_phone->AdvancedSearch->SearchValue);
			$this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

			// mobile_phone
			$this->mobile_phone->EditAttrs["class"] = "form-control";
			$this->mobile_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_phone->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_phone->AdvancedSearch->SearchValue);
			$this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->AdvancedSearch->SearchValue);
			$this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

			// work_phone
			$this->work_phone->EditAttrs["class"] = "form-control";
			$this->work_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_phone->AdvancedSearch->SearchValue = HtmlDecode($this->work_phone->AdvancedSearch->SearchValue);
			$this->work_phone->EditValue = HtmlEncode($this->work_phone->AdvancedSearch->SearchValue);
			$this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

			// work_email
			$this->work_email->EditAttrs["class"] = "form-control";
			$this->work_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_email->AdvancedSearch->SearchValue = HtmlDecode($this->work_email->AdvancedSearch->SearchValue);
			$this->work_email->EditValue = HtmlEncode($this->work_email->AdvancedSearch->SearchValue);
			$this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

			// private_email
			$this->private_email->EditAttrs["class"] = "form-control";
			$this->private_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->private_email->AdvancedSearch->SearchValue = HtmlDecode($this->private_email->AdvancedSearch->SearchValue);
			$this->private_email->EditValue = HtmlEncode($this->private_email->AdvancedSearch->SearchValue);
			$this->private_email->PlaceHolder = RemoveHtml($this->private_email->caption());

			// joined_date
			$this->joined_date->EditAttrs["class"] = "form-control";
			$this->joined_date->EditCustomAttributes = "";
			$this->joined_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->joined_date->AdvancedSearch->SearchValue, 0), 8));
			$this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

			// confirmation_date
			$this->confirmation_date->EditAttrs["class"] = "form-control";
			$this->confirmation_date->EditCustomAttributes = "";
			$this->confirmation_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->confirmation_date->AdvancedSearch->SearchValue, 0), 8));
			$this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

			// supervisor
			$this->supervisor->EditAttrs["class"] = "form-control";
			$this->supervisor->EditCustomAttributes = "";
			$this->supervisor->EditValue = HtmlEncode($this->supervisor->AdvancedSearch->SearchValue);
			$this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

			// indirect_supervisors
			$this->indirect_supervisors->EditAttrs["class"] = "form-control";
			$this->indirect_supervisors->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->indirect_supervisors->AdvancedSearch->SearchValue = HtmlDecode($this->indirect_supervisors->AdvancedSearch->SearchValue);
			$this->indirect_supervisors->EditValue = HtmlEncode($this->indirect_supervisors->AdvancedSearch->SearchValue);
			$this->indirect_supervisors->PlaceHolder = RemoveHtml($this->indirect_supervisors->caption());

			// department
			$this->department->EditAttrs["class"] = "form-control";
			$this->department->EditCustomAttributes = "";
			$this->department->EditValue = HtmlEncode($this->department->AdvancedSearch->SearchValue);
			$this->department->PlaceHolder = RemoveHtml($this->department->caption());

			// custom1
			$this->custom1->EditAttrs["class"] = "form-control";
			$this->custom1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom1->AdvancedSearch->SearchValue = HtmlDecode($this->custom1->AdvancedSearch->SearchValue);
			$this->custom1->EditValue = HtmlEncode($this->custom1->AdvancedSearch->SearchValue);
			$this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

			// custom2
			$this->custom2->EditAttrs["class"] = "form-control";
			$this->custom2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom2->AdvancedSearch->SearchValue = HtmlDecode($this->custom2->AdvancedSearch->SearchValue);
			$this->custom2->EditValue = HtmlEncode($this->custom2->AdvancedSearch->SearchValue);
			$this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

			// custom3
			$this->custom3->EditAttrs["class"] = "form-control";
			$this->custom3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom3->AdvancedSearch->SearchValue = HtmlDecode($this->custom3->AdvancedSearch->SearchValue);
			$this->custom3->EditValue = HtmlEncode($this->custom3->AdvancedSearch->SearchValue);
			$this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

			// custom4
			$this->custom4->EditAttrs["class"] = "form-control";
			$this->custom4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom4->AdvancedSearch->SearchValue = HtmlDecode($this->custom4->AdvancedSearch->SearchValue);
			$this->custom4->EditValue = HtmlEncode($this->custom4->AdvancedSearch->SearchValue);
			$this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

			// custom5
			$this->custom5->EditAttrs["class"] = "form-control";
			$this->custom5->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom5->AdvancedSearch->SearchValue = HtmlDecode($this->custom5->AdvancedSearch->SearchValue);
			$this->custom5->EditValue = HtmlEncode($this->custom5->AdvancedSearch->SearchValue);
			$this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

			// custom6
			$this->custom6->EditAttrs["class"] = "form-control";
			$this->custom6->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom6->AdvancedSearch->SearchValue = HtmlDecode($this->custom6->AdvancedSearch->SearchValue);
			$this->custom6->EditValue = HtmlEncode($this->custom6->AdvancedSearch->SearchValue);
			$this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

			// custom7
			$this->custom7->EditAttrs["class"] = "form-control";
			$this->custom7->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom7->AdvancedSearch->SearchValue = HtmlDecode($this->custom7->AdvancedSearch->SearchValue);
			$this->custom7->EditValue = HtmlEncode($this->custom7->AdvancedSearch->SearchValue);
			$this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

			// custom8
			$this->custom8->EditAttrs["class"] = "form-control";
			$this->custom8->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom8->AdvancedSearch->SearchValue = HtmlDecode($this->custom8->AdvancedSearch->SearchValue);
			$this->custom8->EditValue = HtmlEncode($this->custom8->AdvancedSearch->SearchValue);
			$this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

			// custom9
			$this->custom9->EditAttrs["class"] = "form-control";
			$this->custom9->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom9->AdvancedSearch->SearchValue = HtmlDecode($this->custom9->AdvancedSearch->SearchValue);
			$this->custom9->EditValue = HtmlEncode($this->custom9->AdvancedSearch->SearchValue);
			$this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

			// custom10
			$this->custom10->EditAttrs["class"] = "form-control";
			$this->custom10->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom10->AdvancedSearch->SearchValue = HtmlDecode($this->custom10->AdvancedSearch->SearchValue);
			$this->custom10->EditValue = HtmlEncode($this->custom10->AdvancedSearch->SearchValue);
			$this->custom10->PlaceHolder = RemoveHtml($this->custom10->caption());

			// termination_date
			$this->termination_date->EditAttrs["class"] = "form-control";
			$this->termination_date->EditCustomAttributes = "";
			$this->termination_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->termination_date->AdvancedSearch->SearchValue, 0), 8));
			$this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

			// ethnicity
			$this->ethnicity->EditAttrs["class"] = "form-control";
			$this->ethnicity->EditCustomAttributes = "";
			$this->ethnicity->EditValue = HtmlEncode($this->ethnicity->AdvancedSearch->SearchValue);
			$this->ethnicity->PlaceHolder = RemoveHtml($this->ethnicity->caption());

			// immigration_status
			$this->immigration_status->EditAttrs["class"] = "form-control";
			$this->immigration_status->EditCustomAttributes = "";
			$this->immigration_status->EditValue = HtmlEncode($this->immigration_status->AdvancedSearch->SearchValue);
			$this->immigration_status->PlaceHolder = RemoveHtml($this->immigration_status->caption());

			// approver1
			$this->approver1->EditAttrs["class"] = "form-control";
			$this->approver1->EditCustomAttributes = "";

			// approver2
			$this->approver2->EditAttrs["class"] = "form-control";
			$this->approver2->EditCustomAttributes = "";

			// approver3
			$this->approver3->EditAttrs["class"] = "form-control";
			$this->approver3->EditCustomAttributes = "";

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";

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
		$this->employee_id->AdvancedSearch->load();
		$this->first_name->AdvancedSearch->load();
		$this->middle_name->AdvancedSearch->load();
		$this->last_name->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->nationality->AdvancedSearch->load();
		$this->birthday->AdvancedSearch->load();
		$this->marital_status->AdvancedSearch->load();
		$this->ssn_num->AdvancedSearch->load();
		$this->nic_num->AdvancedSearch->load();
		$this->other_id->AdvancedSearch->load();
		$this->driving_license->AdvancedSearch->load();
		$this->driving_license_exp_date->AdvancedSearch->load();
		$this->employment_status->AdvancedSearch->load();
		$this->job_title->AdvancedSearch->load();
		$this->pay_grade->AdvancedSearch->load();
		$this->work_station_id->AdvancedSearch->load();
		$this->address1->AdvancedSearch->load();
		$this->address2->AdvancedSearch->load();
		$this->city->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->province->AdvancedSearch->load();
		$this->postal_code->AdvancedSearch->load();
		$this->home_phone->AdvancedSearch->load();
		$this->mobile_phone->AdvancedSearch->load();
		$this->work_phone->AdvancedSearch->load();
		$this->work_email->AdvancedSearch->load();
		$this->private_email->AdvancedSearch->load();
		$this->joined_date->AdvancedSearch->load();
		$this->confirmation_date->AdvancedSearch->load();
		$this->supervisor->AdvancedSearch->load();
		$this->indirect_supervisors->AdvancedSearch->load();
		$this->department->AdvancedSearch->load();
		$this->custom1->AdvancedSearch->load();
		$this->custom2->AdvancedSearch->load();
		$this->custom3->AdvancedSearch->load();
		$this->custom4->AdvancedSearch->load();
		$this->custom5->AdvancedSearch->load();
		$this->custom6->AdvancedSearch->load();
		$this->custom7->AdvancedSearch->load();
		$this->custom8->AdvancedSearch->load();
		$this->custom9->AdvancedSearch->load();
		$this->custom10->AdvancedSearch->load();
		$this->termination_date->AdvancedSearch->load();
		$this->notes->AdvancedSearch->load();
		$this->ethnicity->AdvancedSearch->load();
		$this->immigration_status->AdvancedSearch->load();
		$this->approver1->AdvancedSearch->load();
		$this->approver2->AdvancedSearch->load();
		$this->approver3->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.femployeelist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.femployeelist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.femployeelist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_employee\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_employee',hdr:ew.language.phrase('ExportToEmailText'),f:document.femployeelist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_gender":
							break;
						case "x_nationality":
							break;
						case "x_approver1":
							break;
						case "x_approver2":
							break;
						case "x_approver3":
							break;
						case "x_status":
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
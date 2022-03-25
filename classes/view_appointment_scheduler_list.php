<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_appointment_scheduler_list extends view_appointment_scheduler
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_appointment_scheduler';

	// Page object name
	public $PageObjName = "view_appointment_scheduler_list";

	// Grid form hidden field names
	public $FormName = "fview_appointment_schedulerlist";
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

		// Table object (view_appointment_scheduler)
		if (!isset($GLOBALS["view_appointment_scheduler"]) || get_class($GLOBALS["view_appointment_scheduler"]) == PROJECT_NAMESPACE . "view_appointment_scheduler") {
			$GLOBALS["view_appointment_scheduler"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_appointment_scheduler"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_appointment_scheduleradd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_appointment_schedulerdelete.php";
		$this->MultiUpdateUrl = "view_appointment_schedulerupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_appointment_scheduler');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_appointment_schedulerlistsrch";

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
		global $EXPORT, $view_appointment_scheduler;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_appointment_scheduler);
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
		if ($this->isAddOrEdit())
			$this->createdBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdDateTime->Visible = FALSE;
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
		$this->patientID->setVisibility();
		$this->patientName->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Purpose->setVisibility();
		$this->PatientType->setVisibility();
		$this->Referal->setVisibility();
		$this->start_date->setVisibility();
		$this->DoctorName->setVisibility();
		$this->HospID->setVisibility();
		$this->end_date->setVisibility();
		$this->DoctorID->setVisibility();
		$this->DoctorCode->setVisibility();
		$this->Department->setVisibility();
		$this->AppointmentStatus->setVisibility();
		$this->status->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->text->setVisibility();
		$this->appointment_status->setVisibility();
		$this->PId->setVisibility();
		$this->SchEmail->setVisibility();
		$this->appointment_type->setVisibility();
		$this->Notified->setVisibility();
		$this->Notes->setVisibility();
		$this->paymentType->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->createdBy->setVisibility();
		$this->createdDateTime->setVisibility();
		$this->PatientTypee->setVisibility();
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
		$this->setupLookupOptions($this->patientID);
		$this->setupLookupOptions($this->Referal);
		$this->setupLookupOptions($this->DoctorName);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->PatientTypee);

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

				// Switch to inline add mode
				if ($this->isAdd() || $this->isCopy())
					$this->inlineAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Insert Inline
					if ($this->isInsert() && @$_SESSION[SESSION_INLINE_MODE] == "add")
						$this->inlineInsert();
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
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_appointment_schedulerlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->patientID->AdvancedSearch->toJson(), ","); // Field patientID
		$filterList = Concat($filterList, $this->patientName->AdvancedSearch->toJson(), ","); // Field patientName
		$filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
		$filterList = Concat($filterList, $this->Purpose->AdvancedSearch->toJson(), ","); // Field Purpose
		$filterList = Concat($filterList, $this->PatientType->AdvancedSearch->toJson(), ","); // Field PatientType
		$filterList = Concat($filterList, $this->Referal->AdvancedSearch->toJson(), ","); // Field Referal
		$filterList = Concat($filterList, $this->start_date->AdvancedSearch->toJson(), ","); // Field start_date
		$filterList = Concat($filterList, $this->DoctorName->AdvancedSearch->toJson(), ","); // Field DoctorName
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->end_date->AdvancedSearch->toJson(), ","); // Field end_date
		$filterList = Concat($filterList, $this->DoctorID->AdvancedSearch->toJson(), ","); // Field DoctorID
		$filterList = Concat($filterList, $this->DoctorCode->AdvancedSearch->toJson(), ","); // Field DoctorCode
		$filterList = Concat($filterList, $this->Department->AdvancedSearch->toJson(), ","); // Field Department
		$filterList = Concat($filterList, $this->AppointmentStatus->AdvancedSearch->toJson(), ","); // Field AppointmentStatus
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->scheduler_id->AdvancedSearch->toJson(), ","); // Field scheduler_id
		$filterList = Concat($filterList, $this->text->AdvancedSearch->toJson(), ","); // Field text
		$filterList = Concat($filterList, $this->appointment_status->AdvancedSearch->toJson(), ","); // Field appointment_status
		$filterList = Concat($filterList, $this->PId->AdvancedSearch->toJson(), ","); // Field PId
		$filterList = Concat($filterList, $this->SchEmail->AdvancedSearch->toJson(), ","); // Field SchEmail
		$filterList = Concat($filterList, $this->appointment_type->AdvancedSearch->toJson(), ","); // Field appointment_type
		$filterList = Concat($filterList, $this->Notified->AdvancedSearch->toJson(), ","); // Field Notified
		$filterList = Concat($filterList, $this->Notes->AdvancedSearch->toJson(), ","); // Field Notes
		$filterList = Concat($filterList, $this->paymentType->AdvancedSearch->toJson(), ","); // Field paymentType
		$filterList = Concat($filterList, $this->WhereDidYouHear->AdvancedSearch->toJson(), ","); // Field WhereDidYouHear
		$filterList = Concat($filterList, $this->createdBy->AdvancedSearch->toJson(), ","); // Field createdBy
		$filterList = Concat($filterList, $this->createdDateTime->AdvancedSearch->toJson(), ","); // Field createdDateTime
		$filterList = Concat($filterList, $this->PatientTypee->AdvancedSearch->toJson(), ","); // Field PatientTypee
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_appointment_schedulerlistsrch", $filters);
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

		// Field patientID
		$this->patientID->AdvancedSearch->SearchValue = @$filter["x_patientID"];
		$this->patientID->AdvancedSearch->SearchOperator = @$filter["z_patientID"];
		$this->patientID->AdvancedSearch->SearchCondition = @$filter["v_patientID"];
		$this->patientID->AdvancedSearch->SearchValue2 = @$filter["y_patientID"];
		$this->patientID->AdvancedSearch->SearchOperator2 = @$filter["w_patientID"];
		$this->patientID->AdvancedSearch->save();

		// Field patientName
		$this->patientName->AdvancedSearch->SearchValue = @$filter["x_patientName"];
		$this->patientName->AdvancedSearch->SearchOperator = @$filter["z_patientName"];
		$this->patientName->AdvancedSearch->SearchCondition = @$filter["v_patientName"];
		$this->patientName->AdvancedSearch->SearchValue2 = @$filter["y_patientName"];
		$this->patientName->AdvancedSearch->SearchOperator2 = @$filter["w_patientName"];
		$this->patientName->AdvancedSearch->save();

		// Field MobileNumber
		$this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->save();

		// Field Purpose
		$this->Purpose->AdvancedSearch->SearchValue = @$filter["x_Purpose"];
		$this->Purpose->AdvancedSearch->SearchOperator = @$filter["z_Purpose"];
		$this->Purpose->AdvancedSearch->SearchCondition = @$filter["v_Purpose"];
		$this->Purpose->AdvancedSearch->SearchValue2 = @$filter["y_Purpose"];
		$this->Purpose->AdvancedSearch->SearchOperator2 = @$filter["w_Purpose"];
		$this->Purpose->AdvancedSearch->save();

		// Field PatientType
		$this->PatientType->AdvancedSearch->SearchValue = @$filter["x_PatientType"];
		$this->PatientType->AdvancedSearch->SearchOperator = @$filter["z_PatientType"];
		$this->PatientType->AdvancedSearch->SearchCondition = @$filter["v_PatientType"];
		$this->PatientType->AdvancedSearch->SearchValue2 = @$filter["y_PatientType"];
		$this->PatientType->AdvancedSearch->SearchOperator2 = @$filter["w_PatientType"];
		$this->PatientType->AdvancedSearch->save();

		// Field Referal
		$this->Referal->AdvancedSearch->SearchValue = @$filter["x_Referal"];
		$this->Referal->AdvancedSearch->SearchOperator = @$filter["z_Referal"];
		$this->Referal->AdvancedSearch->SearchCondition = @$filter["v_Referal"];
		$this->Referal->AdvancedSearch->SearchValue2 = @$filter["y_Referal"];
		$this->Referal->AdvancedSearch->SearchOperator2 = @$filter["w_Referal"];
		$this->Referal->AdvancedSearch->save();

		// Field start_date
		$this->start_date->AdvancedSearch->SearchValue = @$filter["x_start_date"];
		$this->start_date->AdvancedSearch->SearchOperator = @$filter["z_start_date"];
		$this->start_date->AdvancedSearch->SearchCondition = @$filter["v_start_date"];
		$this->start_date->AdvancedSearch->SearchValue2 = @$filter["y_start_date"];
		$this->start_date->AdvancedSearch->SearchOperator2 = @$filter["w_start_date"];
		$this->start_date->AdvancedSearch->save();

		// Field DoctorName
		$this->DoctorName->AdvancedSearch->SearchValue = @$filter["x_DoctorName"];
		$this->DoctorName->AdvancedSearch->SearchOperator = @$filter["z_DoctorName"];
		$this->DoctorName->AdvancedSearch->SearchCondition = @$filter["v_DoctorName"];
		$this->DoctorName->AdvancedSearch->SearchValue2 = @$filter["y_DoctorName"];
		$this->DoctorName->AdvancedSearch->SearchOperator2 = @$filter["w_DoctorName"];
		$this->DoctorName->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field end_date
		$this->end_date->AdvancedSearch->SearchValue = @$filter["x_end_date"];
		$this->end_date->AdvancedSearch->SearchOperator = @$filter["z_end_date"];
		$this->end_date->AdvancedSearch->SearchCondition = @$filter["v_end_date"];
		$this->end_date->AdvancedSearch->SearchValue2 = @$filter["y_end_date"];
		$this->end_date->AdvancedSearch->SearchOperator2 = @$filter["w_end_date"];
		$this->end_date->AdvancedSearch->save();

		// Field DoctorID
		$this->DoctorID->AdvancedSearch->SearchValue = @$filter["x_DoctorID"];
		$this->DoctorID->AdvancedSearch->SearchOperator = @$filter["z_DoctorID"];
		$this->DoctorID->AdvancedSearch->SearchCondition = @$filter["v_DoctorID"];
		$this->DoctorID->AdvancedSearch->SearchValue2 = @$filter["y_DoctorID"];
		$this->DoctorID->AdvancedSearch->SearchOperator2 = @$filter["w_DoctorID"];
		$this->DoctorID->AdvancedSearch->save();

		// Field DoctorCode
		$this->DoctorCode->AdvancedSearch->SearchValue = @$filter["x_DoctorCode"];
		$this->DoctorCode->AdvancedSearch->SearchOperator = @$filter["z_DoctorCode"];
		$this->DoctorCode->AdvancedSearch->SearchCondition = @$filter["v_DoctorCode"];
		$this->DoctorCode->AdvancedSearch->SearchValue2 = @$filter["y_DoctorCode"];
		$this->DoctorCode->AdvancedSearch->SearchOperator2 = @$filter["w_DoctorCode"];
		$this->DoctorCode->AdvancedSearch->save();

		// Field Department
		$this->Department->AdvancedSearch->SearchValue = @$filter["x_Department"];
		$this->Department->AdvancedSearch->SearchOperator = @$filter["z_Department"];
		$this->Department->AdvancedSearch->SearchCondition = @$filter["v_Department"];
		$this->Department->AdvancedSearch->SearchValue2 = @$filter["y_Department"];
		$this->Department->AdvancedSearch->SearchOperator2 = @$filter["w_Department"];
		$this->Department->AdvancedSearch->save();

		// Field AppointmentStatus
		$this->AppointmentStatus->AdvancedSearch->SearchValue = @$filter["x_AppointmentStatus"];
		$this->AppointmentStatus->AdvancedSearch->SearchOperator = @$filter["z_AppointmentStatus"];
		$this->AppointmentStatus->AdvancedSearch->SearchCondition = @$filter["v_AppointmentStatus"];
		$this->AppointmentStatus->AdvancedSearch->SearchValue2 = @$filter["y_AppointmentStatus"];
		$this->AppointmentStatus->AdvancedSearch->SearchOperator2 = @$filter["w_AppointmentStatus"];
		$this->AppointmentStatus->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field scheduler_id
		$this->scheduler_id->AdvancedSearch->SearchValue = @$filter["x_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchOperator = @$filter["z_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchCondition = @$filter["v_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchValue2 = @$filter["y_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->SearchOperator2 = @$filter["w_scheduler_id"];
		$this->scheduler_id->AdvancedSearch->save();

		// Field text
		$this->text->AdvancedSearch->SearchValue = @$filter["x_text"];
		$this->text->AdvancedSearch->SearchOperator = @$filter["z_text"];
		$this->text->AdvancedSearch->SearchCondition = @$filter["v_text"];
		$this->text->AdvancedSearch->SearchValue2 = @$filter["y_text"];
		$this->text->AdvancedSearch->SearchOperator2 = @$filter["w_text"];
		$this->text->AdvancedSearch->save();

		// Field appointment_status
		$this->appointment_status->AdvancedSearch->SearchValue = @$filter["x_appointment_status"];
		$this->appointment_status->AdvancedSearch->SearchOperator = @$filter["z_appointment_status"];
		$this->appointment_status->AdvancedSearch->SearchCondition = @$filter["v_appointment_status"];
		$this->appointment_status->AdvancedSearch->SearchValue2 = @$filter["y_appointment_status"];
		$this->appointment_status->AdvancedSearch->SearchOperator2 = @$filter["w_appointment_status"];
		$this->appointment_status->AdvancedSearch->save();

		// Field PId
		$this->PId->AdvancedSearch->SearchValue = @$filter["x_PId"];
		$this->PId->AdvancedSearch->SearchOperator = @$filter["z_PId"];
		$this->PId->AdvancedSearch->SearchCondition = @$filter["v_PId"];
		$this->PId->AdvancedSearch->SearchValue2 = @$filter["y_PId"];
		$this->PId->AdvancedSearch->SearchOperator2 = @$filter["w_PId"];
		$this->PId->AdvancedSearch->save();

		// Field SchEmail
		$this->SchEmail->AdvancedSearch->SearchValue = @$filter["x_SchEmail"];
		$this->SchEmail->AdvancedSearch->SearchOperator = @$filter["z_SchEmail"];
		$this->SchEmail->AdvancedSearch->SearchCondition = @$filter["v_SchEmail"];
		$this->SchEmail->AdvancedSearch->SearchValue2 = @$filter["y_SchEmail"];
		$this->SchEmail->AdvancedSearch->SearchOperator2 = @$filter["w_SchEmail"];
		$this->SchEmail->AdvancedSearch->save();

		// Field appointment_type
		$this->appointment_type->AdvancedSearch->SearchValue = @$filter["x_appointment_type"];
		$this->appointment_type->AdvancedSearch->SearchOperator = @$filter["z_appointment_type"];
		$this->appointment_type->AdvancedSearch->SearchCondition = @$filter["v_appointment_type"];
		$this->appointment_type->AdvancedSearch->SearchValue2 = @$filter["y_appointment_type"];
		$this->appointment_type->AdvancedSearch->SearchOperator2 = @$filter["w_appointment_type"];
		$this->appointment_type->AdvancedSearch->save();

		// Field Notified
		$this->Notified->AdvancedSearch->SearchValue = @$filter["x_Notified"];
		$this->Notified->AdvancedSearch->SearchOperator = @$filter["z_Notified"];
		$this->Notified->AdvancedSearch->SearchCondition = @$filter["v_Notified"];
		$this->Notified->AdvancedSearch->SearchValue2 = @$filter["y_Notified"];
		$this->Notified->AdvancedSearch->SearchOperator2 = @$filter["w_Notified"];
		$this->Notified->AdvancedSearch->save();

		// Field Notes
		$this->Notes->AdvancedSearch->SearchValue = @$filter["x_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator = @$filter["z_Notes"];
		$this->Notes->AdvancedSearch->SearchCondition = @$filter["v_Notes"];
		$this->Notes->AdvancedSearch->SearchValue2 = @$filter["y_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator2 = @$filter["w_Notes"];
		$this->Notes->AdvancedSearch->save();

		// Field paymentType
		$this->paymentType->AdvancedSearch->SearchValue = @$filter["x_paymentType"];
		$this->paymentType->AdvancedSearch->SearchOperator = @$filter["z_paymentType"];
		$this->paymentType->AdvancedSearch->SearchCondition = @$filter["v_paymentType"];
		$this->paymentType->AdvancedSearch->SearchValue2 = @$filter["y_paymentType"];
		$this->paymentType->AdvancedSearch->SearchOperator2 = @$filter["w_paymentType"];
		$this->paymentType->AdvancedSearch->save();

		// Field WhereDidYouHear
		$this->WhereDidYouHear->AdvancedSearch->SearchValue = @$filter["x_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchOperator = @$filter["z_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchCondition = @$filter["v_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchValue2 = @$filter["y_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchOperator2 = @$filter["w_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->save();

		// Field createdBy
		$this->createdBy->AdvancedSearch->SearchValue = @$filter["x_createdBy"];
		$this->createdBy->AdvancedSearch->SearchOperator = @$filter["z_createdBy"];
		$this->createdBy->AdvancedSearch->SearchCondition = @$filter["v_createdBy"];
		$this->createdBy->AdvancedSearch->SearchValue2 = @$filter["y_createdBy"];
		$this->createdBy->AdvancedSearch->SearchOperator2 = @$filter["w_createdBy"];
		$this->createdBy->AdvancedSearch->save();

		// Field createdDateTime
		$this->createdDateTime->AdvancedSearch->SearchValue = @$filter["x_createdDateTime"];
		$this->createdDateTime->AdvancedSearch->SearchOperator = @$filter["z_createdDateTime"];
		$this->createdDateTime->AdvancedSearch->SearchCondition = @$filter["v_createdDateTime"];
		$this->createdDateTime->AdvancedSearch->SearchValue2 = @$filter["y_createdDateTime"];
		$this->createdDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_createdDateTime"];
		$this->createdDateTime->AdvancedSearch->save();

		// Field PatientTypee
		$this->PatientTypee->AdvancedSearch->SearchValue = @$filter["x_PatientTypee"];
		$this->PatientTypee->AdvancedSearch->SearchOperator = @$filter["z_PatientTypee"];
		$this->PatientTypee->AdvancedSearch->SearchCondition = @$filter["v_PatientTypee"];
		$this->PatientTypee->AdvancedSearch->SearchValue2 = @$filter["y_PatientTypee"];
		$this->PatientTypee->AdvancedSearch->SearchOperator2 = @$filter["w_PatientTypee"];
		$this->PatientTypee->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->patientID, $default, FALSE); // patientID
		$this->buildSearchSql($where, $this->patientName, $default, FALSE); // patientName
		$this->buildSearchSql($where, $this->MobileNumber, $default, FALSE); // MobileNumber
		$this->buildSearchSql($where, $this->Purpose, $default, FALSE); // Purpose
		$this->buildSearchSql($where, $this->PatientType, $default, FALSE); // PatientType
		$this->buildSearchSql($where, $this->Referal, $default, FALSE); // Referal
		$this->buildSearchSql($where, $this->start_date, $default, FALSE); // start_date
		$this->buildSearchSql($where, $this->DoctorName, $default, FALSE); // DoctorName
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->end_date, $default, FALSE); // end_date
		$this->buildSearchSql($where, $this->DoctorID, $default, FALSE); // DoctorID
		$this->buildSearchSql($where, $this->DoctorCode, $default, FALSE); // DoctorCode
		$this->buildSearchSql($where, $this->Department, $default, FALSE); // Department
		$this->buildSearchSql($where, $this->AppointmentStatus, $default, FALSE); // AppointmentStatus
		$this->buildSearchSql($where, $this->status, $default, TRUE); // status
		$this->buildSearchSql($where, $this->scheduler_id, $default, FALSE); // scheduler_id
		$this->buildSearchSql($where, $this->text, $default, FALSE); // text
		$this->buildSearchSql($where, $this->appointment_status, $default, FALSE); // appointment_status
		$this->buildSearchSql($where, $this->PId, $default, FALSE); // PId
		$this->buildSearchSql($where, $this->SchEmail, $default, FALSE); // SchEmail
		$this->buildSearchSql($where, $this->appointment_type, $default, FALSE); // appointment_type
		$this->buildSearchSql($where, $this->Notified, $default, TRUE); // Notified
		$this->buildSearchSql($where, $this->Notes, $default, FALSE); // Notes
		$this->buildSearchSql($where, $this->paymentType, $default, FALSE); // paymentType
		$this->buildSearchSql($where, $this->WhereDidYouHear, $default, TRUE); // WhereDidYouHear
		$this->buildSearchSql($where, $this->createdBy, $default, FALSE); // createdBy
		$this->buildSearchSql($where, $this->createdDateTime, $default, FALSE); // createdDateTime
		$this->buildSearchSql($where, $this->PatientTypee, $default, FALSE); // PatientTypee

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->patientID->AdvancedSearch->save(); // patientID
			$this->patientName->AdvancedSearch->save(); // patientName
			$this->MobileNumber->AdvancedSearch->save(); // MobileNumber
			$this->Purpose->AdvancedSearch->save(); // Purpose
			$this->PatientType->AdvancedSearch->save(); // PatientType
			$this->Referal->AdvancedSearch->save(); // Referal
			$this->start_date->AdvancedSearch->save(); // start_date
			$this->DoctorName->AdvancedSearch->save(); // DoctorName
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->end_date->AdvancedSearch->save(); // end_date
			$this->DoctorID->AdvancedSearch->save(); // DoctorID
			$this->DoctorCode->AdvancedSearch->save(); // DoctorCode
			$this->Department->AdvancedSearch->save(); // Department
			$this->AppointmentStatus->AdvancedSearch->save(); // AppointmentStatus
			$this->status->AdvancedSearch->save(); // status
			$this->scheduler_id->AdvancedSearch->save(); // scheduler_id
			$this->text->AdvancedSearch->save(); // text
			$this->appointment_status->AdvancedSearch->save(); // appointment_status
			$this->PId->AdvancedSearch->save(); // PId
			$this->SchEmail->AdvancedSearch->save(); // SchEmail
			$this->appointment_type->AdvancedSearch->save(); // appointment_type
			$this->Notified->AdvancedSearch->save(); // Notified
			$this->Notes->AdvancedSearch->save(); // Notes
			$this->paymentType->AdvancedSearch->save(); // paymentType
			$this->WhereDidYouHear->AdvancedSearch->save(); // WhereDidYouHear
			$this->createdBy->AdvancedSearch->save(); // createdBy
			$this->createdDateTime->AdvancedSearch->save(); // createdDateTime
			$this->PatientTypee->AdvancedSearch->save(); // PatientTypee
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
		$this->buildBasicSearchSql($where, $this->patientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Purpose, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Referal, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DoctorName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DoctorID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DoctorCode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Department, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AppointmentStatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->status, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->scheduler_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->text, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->appointment_status, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SchEmail, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->appointment_type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Notified, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Notes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->paymentType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WhereDidYouHear, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientTypee, $arKeywords, $type);
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
		if ($this->patientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->patientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Purpose->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Referal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->start_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DoctorName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->end_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DoctorID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DoctorCode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Department->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AppointmentStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->scheduler_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->text->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->appointment_status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SchEmail->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->appointment_type->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Notified->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Notes->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->paymentType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WhereDidYouHear->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientTypee->AdvancedSearch->issetSession())
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
		$this->patientID->AdvancedSearch->unsetSession();
		$this->patientName->AdvancedSearch->unsetSession();
		$this->MobileNumber->AdvancedSearch->unsetSession();
		$this->Purpose->AdvancedSearch->unsetSession();
		$this->PatientType->AdvancedSearch->unsetSession();
		$this->Referal->AdvancedSearch->unsetSession();
		$this->start_date->AdvancedSearch->unsetSession();
		$this->DoctorName->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->end_date->AdvancedSearch->unsetSession();
		$this->DoctorID->AdvancedSearch->unsetSession();
		$this->DoctorCode->AdvancedSearch->unsetSession();
		$this->Department->AdvancedSearch->unsetSession();
		$this->AppointmentStatus->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->scheduler_id->AdvancedSearch->unsetSession();
		$this->text->AdvancedSearch->unsetSession();
		$this->appointment_status->AdvancedSearch->unsetSession();
		$this->PId->AdvancedSearch->unsetSession();
		$this->SchEmail->AdvancedSearch->unsetSession();
		$this->appointment_type->AdvancedSearch->unsetSession();
		$this->Notified->AdvancedSearch->unsetSession();
		$this->Notes->AdvancedSearch->unsetSession();
		$this->paymentType->AdvancedSearch->unsetSession();
		$this->WhereDidYouHear->AdvancedSearch->unsetSession();
		$this->createdBy->AdvancedSearch->unsetSession();
		$this->createdDateTime->AdvancedSearch->unsetSession();
		$this->PatientTypee->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->patientID->AdvancedSearch->load();
		$this->patientName->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->Purpose->AdvancedSearch->load();
		$this->PatientType->AdvancedSearch->load();
		$this->Referal->AdvancedSearch->load();
		$this->start_date->AdvancedSearch->load();
		$this->DoctorName->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->end_date->AdvancedSearch->load();
		$this->DoctorID->AdvancedSearch->load();
		$this->DoctorCode->AdvancedSearch->load();
		$this->Department->AdvancedSearch->load();
		$this->AppointmentStatus->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->scheduler_id->AdvancedSearch->load();
		$this->text->AdvancedSearch->load();
		$this->appointment_status->AdvancedSearch->load();
		$this->PId->AdvancedSearch->load();
		$this->SchEmail->AdvancedSearch->load();
		$this->appointment_type->AdvancedSearch->load();
		$this->Notified->AdvancedSearch->load();
		$this->Notes->AdvancedSearch->load();
		$this->paymentType->AdvancedSearch->load();
		$this->WhereDidYouHear->AdvancedSearch->load();
		$this->createdBy->AdvancedSearch->load();
		$this->createdDateTime->AdvancedSearch->load();
		$this->PatientTypee->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->patientID); // patientID
			$this->updateSort($this->patientName); // patientName
			$this->updateSort($this->MobileNumber); // MobileNumber
			$this->updateSort($this->Purpose); // Purpose
			$this->updateSort($this->PatientType); // PatientType
			$this->updateSort($this->Referal); // Referal
			$this->updateSort($this->start_date); // start_date
			$this->updateSort($this->DoctorName); // DoctorName
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->end_date); // end_date
			$this->updateSort($this->DoctorID); // DoctorID
			$this->updateSort($this->DoctorCode); // DoctorCode
			$this->updateSort($this->Department); // Department
			$this->updateSort($this->AppointmentStatus); // AppointmentStatus
			$this->updateSort($this->status); // status
			$this->updateSort($this->scheduler_id); // scheduler_id
			$this->updateSort($this->text); // text
			$this->updateSort($this->appointment_status); // appointment_status
			$this->updateSort($this->PId); // PId
			$this->updateSort($this->SchEmail); // SchEmail
			$this->updateSort($this->appointment_type); // appointment_type
			$this->updateSort($this->Notified); // Notified
			$this->updateSort($this->Notes); // Notes
			$this->updateSort($this->paymentType); // paymentType
			$this->updateSort($this->WhereDidYouHear); // WhereDidYouHear
			$this->updateSort($this->createdBy); // createdBy
			$this->updateSort($this->createdDateTime); // createdDateTime
			$this->updateSort($this->PatientTypee); // PatientTypee
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
				$this->setSessionOrderByList($orderBy);
				$this->id->setSort("");
				$this->patientID->setSort("");
				$this->patientName->setSort("");
				$this->MobileNumber->setSort("");
				$this->Purpose->setSort("");
				$this->PatientType->setSort("");
				$this->Referal->setSort("");
				$this->start_date->setSort("");
				$this->DoctorName->setSort("");
				$this->HospID->setSort("");
				$this->end_date->setSort("");
				$this->DoctorID->setSort("");
				$this->DoctorCode->setSort("");
				$this->Department->setSort("");
				$this->AppointmentStatus->setSort("");
				$this->status->setSort("");
				$this->scheduler_id->setSort("");
				$this->text->setSort("");
				$this->appointment_status->setSort("");
				$this->PId->setSort("");
				$this->SchEmail->setSort("");
				$this->appointment_type->setSort("");
				$this->Notified->setSort("");
				$this->Notes->setSort("");
				$this->paymentType->setSort("");
				$this->WhereDidYouHear->setSort("");
				$this->createdBy->setSort("");
				$this->createdDateTime->setSort("");
				$this->PatientTypee->setSort("");
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

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
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

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
			$opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode($this->InlineCopyUrl) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
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
		$option = $options["action"];

		// Add multi update
		$item = &$option->add("multiupdate");
		$item->Body = "<a class=\"ew-action ew-multi-update\" title=\"" . HtmlTitle($Language->phrase("UpdateSelectedLink")) . "\" data-table=\"view_appointment_scheduler\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateSelectedLink")) . "\" href=\"\" onclick=\"ew.submitAction(event,{f:document.fview_appointment_schedulerlist,url:'" . $this->MultiUpdateUrl . "'});return false;\">" . $Language->phrase("UpdateSelectedLink") . "</a>";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_appointment_schedulerlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_appointment_schedulerlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_appointment_schedulerlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_appointment_schedulerlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_appointment_schedulersrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_appointment_scheduler\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_appointment_schedulersrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_appointment_schedulerlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->patientID->CurrentValue = NULL;
		$this->patientID->OldValue = $this->patientID->CurrentValue;
		$this->patientName->CurrentValue = NULL;
		$this->patientName->OldValue = $this->patientName->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->Purpose->CurrentValue = NULL;
		$this->Purpose->OldValue = $this->Purpose->CurrentValue;
		$this->PatientType->CurrentValue = NULL;
		$this->PatientType->OldValue = $this->PatientType->CurrentValue;
		$this->Referal->CurrentValue = NULL;
		$this->Referal->OldValue = $this->Referal->CurrentValue;
		$this->start_date->CurrentValue = NULL;
		$this->start_date->OldValue = $this->start_date->CurrentValue;
		$this->DoctorName->CurrentValue = NULL;
		$this->DoctorName->OldValue = $this->DoctorName->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->end_date->CurrentValue = NULL;
		$this->end_date->OldValue = $this->end_date->CurrentValue;
		$this->DoctorID->CurrentValue = NULL;
		$this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
		$this->DoctorCode->CurrentValue = NULL;
		$this->DoctorCode->OldValue = $this->DoctorCode->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->AppointmentStatus->CurrentValue = NULL;
		$this->AppointmentStatus->OldValue = $this->AppointmentStatus->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->scheduler_id->CurrentValue = NULL;
		$this->scheduler_id->OldValue = $this->scheduler_id->CurrentValue;
		$this->text->CurrentValue = NULL;
		$this->text->OldValue = $this->text->CurrentValue;
		$this->appointment_status->CurrentValue = NULL;
		$this->appointment_status->OldValue = $this->appointment_status->CurrentValue;
		$this->PId->CurrentValue = NULL;
		$this->PId->OldValue = $this->PId->CurrentValue;
		$this->SchEmail->CurrentValue = NULL;
		$this->SchEmail->OldValue = $this->SchEmail->CurrentValue;
		$this->appointment_type->CurrentValue = NULL;
		$this->appointment_type->OldValue = $this->appointment_type->CurrentValue;
		$this->Notified->CurrentValue = NULL;
		$this->Notified->OldValue = $this->Notified->CurrentValue;
		$this->Notes->CurrentValue = NULL;
		$this->Notes->OldValue = $this->Notes->CurrentValue;
		$this->paymentType->CurrentValue = NULL;
		$this->paymentType->OldValue = $this->paymentType->CurrentValue;
		$this->WhereDidYouHear->CurrentValue = NULL;
		$this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
		$this->createdBy->CurrentValue = NULL;
		$this->createdBy->OldValue = $this->createdBy->CurrentValue;
		$this->createdDateTime->CurrentValue = NULL;
		$this->createdDateTime->OldValue = $this->createdDateTime->CurrentValue;
		$this->PatientTypee->CurrentValue = NULL;
		$this->PatientTypee->OldValue = $this->PatientTypee->CurrentValue;
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

		// patientID
		if (!$this->isAddOrEdit())
			$this->patientID->AdvancedSearch->setSearchValue(Get("x_patientID", Get("patientID", "")));
		if ($this->patientID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->patientID->AdvancedSearch->setSearchOperator(Get("z_patientID", ""));

		// patientName
		if (!$this->isAddOrEdit())
			$this->patientName->AdvancedSearch->setSearchValue(Get("x_patientName", Get("patientName", "")));
		if ($this->patientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->patientName->AdvancedSearch->setSearchOperator(Get("z_patientName", ""));

		// MobileNumber
		if (!$this->isAddOrEdit())
			$this->MobileNumber->AdvancedSearch->setSearchValue(Get("x_MobileNumber", Get("MobileNumber", "")));
		if ($this->MobileNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MobileNumber->AdvancedSearch->setSearchOperator(Get("z_MobileNumber", ""));

		// Purpose
		if (!$this->isAddOrEdit())
			$this->Purpose->AdvancedSearch->setSearchValue(Get("x_Purpose", Get("Purpose", "")));
		if ($this->Purpose->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Purpose->AdvancedSearch->setSearchOperator(Get("z_Purpose", ""));

		// PatientType
		if (!$this->isAddOrEdit())
			$this->PatientType->AdvancedSearch->setSearchValue(Get("x_PatientType", Get("PatientType", "")));
		if ($this->PatientType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientType->AdvancedSearch->setSearchOperator(Get("z_PatientType", ""));

		// Referal
		if (!$this->isAddOrEdit())
			$this->Referal->AdvancedSearch->setSearchValue(Get("x_Referal", Get("Referal", "")));
		if ($this->Referal->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Referal->AdvancedSearch->setSearchOperator(Get("z_Referal", ""));

		// start_date
		if (!$this->isAddOrEdit())
			$this->start_date->AdvancedSearch->setSearchValue(Get("x_start_date", Get("start_date", "")));
		if ($this->start_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->start_date->AdvancedSearch->setSearchOperator(Get("z_start_date", ""));

		// DoctorName
		if (!$this->isAddOrEdit())
			$this->DoctorName->AdvancedSearch->setSearchValue(Get("x_DoctorName", Get("DoctorName", "")));
		if ($this->DoctorName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DoctorName->AdvancedSearch->setSearchOperator(Get("z_DoctorName", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// end_date
		if (!$this->isAddOrEdit())
			$this->end_date->AdvancedSearch->setSearchValue(Get("x_end_date", Get("end_date", "")));
		if ($this->end_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->end_date->AdvancedSearch->setSearchOperator(Get("z_end_date", ""));

		// DoctorID
		if (!$this->isAddOrEdit())
			$this->DoctorID->AdvancedSearch->setSearchValue(Get("x_DoctorID", Get("DoctorID", "")));
		if ($this->DoctorID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DoctorID->AdvancedSearch->setSearchOperator(Get("z_DoctorID", ""));

		// DoctorCode
		if (!$this->isAddOrEdit())
			$this->DoctorCode->AdvancedSearch->setSearchValue(Get("x_DoctorCode", Get("DoctorCode", "")));
		if ($this->DoctorCode->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DoctorCode->AdvancedSearch->setSearchOperator(Get("z_DoctorCode", ""));

		// Department
		if (!$this->isAddOrEdit())
			$this->Department->AdvancedSearch->setSearchValue(Get("x_Department", Get("Department", "")));
		if ($this->Department->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Department->AdvancedSearch->setSearchOperator(Get("z_Department", ""));

		// AppointmentStatus
		if (!$this->isAddOrEdit())
			$this->AppointmentStatus->AdvancedSearch->setSearchValue(Get("x_AppointmentStatus", Get("AppointmentStatus", "")));
		if ($this->AppointmentStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AppointmentStatus->AdvancedSearch->setSearchOperator(Get("z_AppointmentStatus", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));
		if (is_array($this->status->AdvancedSearch->SearchValue))
			$this->status->AdvancedSearch->SearchValue = implode(",", $this->status->AdvancedSearch->SearchValue);
		if (is_array($this->status->AdvancedSearch->SearchValue2))
			$this->status->AdvancedSearch->SearchValue2 = implode(",", $this->status->AdvancedSearch->SearchValue2);

		// scheduler_id
		if (!$this->isAddOrEdit())
			$this->scheduler_id->AdvancedSearch->setSearchValue(Get("x_scheduler_id", Get("scheduler_id", "")));
		if ($this->scheduler_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->scheduler_id->AdvancedSearch->setSearchOperator(Get("z_scheduler_id", ""));

		// text
		if (!$this->isAddOrEdit())
			$this->text->AdvancedSearch->setSearchValue(Get("x_text", Get("text", "")));
		if ($this->text->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->text->AdvancedSearch->setSearchOperator(Get("z_text", ""));

		// appointment_status
		if (!$this->isAddOrEdit())
			$this->appointment_status->AdvancedSearch->setSearchValue(Get("x_appointment_status", Get("appointment_status", "")));
		if ($this->appointment_status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->appointment_status->AdvancedSearch->setSearchOperator(Get("z_appointment_status", ""));

		// PId
		if (!$this->isAddOrEdit())
			$this->PId->AdvancedSearch->setSearchValue(Get("x_PId", Get("PId", "")));
		if ($this->PId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PId->AdvancedSearch->setSearchOperator(Get("z_PId", ""));

		// SchEmail
		if (!$this->isAddOrEdit())
			$this->SchEmail->AdvancedSearch->setSearchValue(Get("x_SchEmail", Get("SchEmail", "")));
		if ($this->SchEmail->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SchEmail->AdvancedSearch->setSearchOperator(Get("z_SchEmail", ""));

		// appointment_type
		if (!$this->isAddOrEdit())
			$this->appointment_type->AdvancedSearch->setSearchValue(Get("x_appointment_type", Get("appointment_type", "")));
		if ($this->appointment_type->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->appointment_type->AdvancedSearch->setSearchOperator(Get("z_appointment_type", ""));

		// Notified
		if (!$this->isAddOrEdit())
			$this->Notified->AdvancedSearch->setSearchValue(Get("x_Notified", Get("Notified", "")));
		if ($this->Notified->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Notified->AdvancedSearch->setSearchOperator(Get("z_Notified", ""));
		if (is_array($this->Notified->AdvancedSearch->SearchValue))
			$this->Notified->AdvancedSearch->SearchValue = implode(",", $this->Notified->AdvancedSearch->SearchValue);
		if (is_array($this->Notified->AdvancedSearch->SearchValue2))
			$this->Notified->AdvancedSearch->SearchValue2 = implode(",", $this->Notified->AdvancedSearch->SearchValue2);

		// Notes
		if (!$this->isAddOrEdit())
			$this->Notes->AdvancedSearch->setSearchValue(Get("x_Notes", Get("Notes", "")));
		if ($this->Notes->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Notes->AdvancedSearch->setSearchOperator(Get("z_Notes", ""));

		// paymentType
		if (!$this->isAddOrEdit())
			$this->paymentType->AdvancedSearch->setSearchValue(Get("x_paymentType", Get("paymentType", "")));
		if ($this->paymentType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->paymentType->AdvancedSearch->setSearchOperator(Get("z_paymentType", ""));

		// WhereDidYouHear
		if (!$this->isAddOrEdit())
			$this->WhereDidYouHear->AdvancedSearch->setSearchValue(Get("x_WhereDidYouHear", Get("WhereDidYouHear", "")));
		if ($this->WhereDidYouHear->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->WhereDidYouHear->AdvancedSearch->setSearchOperator(Get("z_WhereDidYouHear", ""));
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue = implode(",", $this->WhereDidYouHear->AdvancedSearch->SearchValue);
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue2))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue2 = implode(",", $this->WhereDidYouHear->AdvancedSearch->SearchValue2);

		// createdBy
		if (!$this->isAddOrEdit())
			$this->createdBy->AdvancedSearch->setSearchValue(Get("x_createdBy", Get("createdBy", "")));
		if ($this->createdBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdBy->AdvancedSearch->setSearchOperator(Get("z_createdBy", ""));

		// createdDateTime
		if (!$this->isAddOrEdit())
			$this->createdDateTime->AdvancedSearch->setSearchValue(Get("x_createdDateTime", Get("createdDateTime", "")));
		if ($this->createdDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdDateTime->AdvancedSearch->setSearchOperator(Get("z_createdDateTime", ""));

		// PatientTypee
		if (!$this->isAddOrEdit())
			$this->PatientTypee->AdvancedSearch->setSearchValue(Get("x_PatientTypee", Get("PatientTypee", "")));
		if ($this->PatientTypee->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientTypee->AdvancedSearch->setSearchOperator(Get("z_PatientTypee", ""));
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

		// Check field name 'patientID' first before field var 'x_patientID'
		$val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
		if (!$this->patientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientID->Visible = FALSE; // Disable update for API request
			else
				$this->patientID->setFormValue($val);
		}

		// Check field name 'patientName' first before field var 'x_patientName'
		$val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
		if (!$this->patientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientName->Visible = FALSE; // Disable update for API request
			else
				$this->patientName->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}

		// Check field name 'PatientType' first before field var 'x_PatientType'
		$val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
		if (!$this->PatientType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientType->Visible = FALSE; // Disable update for API request
			else
				$this->PatientType->setFormValue($val);
		}

		// Check field name 'Referal' first before field var 'x_Referal'
		$val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
		if (!$this->Referal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Referal->Visible = FALSE; // Disable update for API request
			else
				$this->Referal->setFormValue($val);
		}

		// Check field name 'start_date' first before field var 'x_start_date'
		$val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
		if (!$this->start_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_date->Visible = FALSE; // Disable update for API request
			else
				$this->start_date->setFormValue($val);
			$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		}

		// Check field name 'DoctorName' first before field var 'x_DoctorName'
		$val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
		if (!$this->DoctorName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorName->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorName->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'end_date' first before field var 'x_end_date'
		$val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
		if (!$this->end_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_date->Visible = FALSE; // Disable update for API request
			else
				$this->end_date->setFormValue($val);
			$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		}

		// Check field name 'DoctorID' first before field var 'x_DoctorID'
		$val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
		if (!$this->DoctorID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorID->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorID->setFormValue($val);
		}

		// Check field name 'DoctorCode' first before field var 'x_DoctorCode'
		$val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
		if (!$this->DoctorCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorCode->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorCode->setFormValue($val);
		}

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}

		// Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
		$val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
		if (!$this->AppointmentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AppointmentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->AppointmentStatus->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'scheduler_id' first before field var 'x_scheduler_id'
		$val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
		if (!$this->scheduler_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scheduler_id->Visible = FALSE; // Disable update for API request
			else
				$this->scheduler_id->setFormValue($val);
		}

		// Check field name 'text' first before field var 'x_text'
		$val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
		if (!$this->text->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->text->Visible = FALSE; // Disable update for API request
			else
				$this->text->setFormValue($val);
		}

		// Check field name 'appointment_status' first before field var 'x_appointment_status'
		$val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
		if (!$this->appointment_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_status->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_status->setFormValue($val);
		}

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}

		// Check field name 'SchEmail' first before field var 'x_SchEmail'
		$val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
		if (!$this->SchEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SchEmail->Visible = FALSE; // Disable update for API request
			else
				$this->SchEmail->setFormValue($val);
		}

		// Check field name 'appointment_type' first before field var 'x_appointment_type'
		$val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
		if (!$this->appointment_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_type->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_type->setFormValue($val);
		}

		// Check field name 'Notified' first before field var 'x_Notified'
		$val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
		if (!$this->Notified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notified->Visible = FALSE; // Disable update for API request
			else
				$this->Notified->setFormValue($val);
		}

		// Check field name 'Notes' first before field var 'x_Notes'
		$val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
		if (!$this->Notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notes->Visible = FALSE; // Disable update for API request
			else
				$this->Notes->setFormValue($val);
		}

		// Check field name 'paymentType' first before field var 'x_paymentType'
		$val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
		if (!$this->paymentType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->paymentType->Visible = FALSE; // Disable update for API request
			else
				$this->paymentType->setFormValue($val);
		}

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WhereDidYouHear->Visible = FALSE; // Disable update for API request
			else
				$this->WhereDidYouHear->setFormValue($val);
		}

		// Check field name 'createdBy' first before field var 'x_createdBy'
		$val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
		if (!$this->createdBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdBy->Visible = FALSE; // Disable update for API request
			else
				$this->createdBy->setFormValue($val);
		}

		// Check field name 'createdDateTime' first before field var 'x_createdDateTime'
		$val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
		if (!$this->createdDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDateTime->setFormValue($val);
			$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		}

		// Check field name 'PatientTypee' first before field var 'x_PatientTypee'
		$val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
		if (!$this->PatientTypee->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientTypee->Visible = FALSE; // Disable update for API request
			else
				$this->PatientTypee->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->patientID->CurrentValue = $this->patientID->FormValue;
		$this->patientName->CurrentValue = $this->patientName->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->PatientType->CurrentValue = $this->PatientType->FormValue;
		$this->Referal->CurrentValue = $this->Referal->FormValue;
		$this->start_date->CurrentValue = $this->start_date->FormValue;
		$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		$this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->end_date->CurrentValue = $this->end_date->FormValue;
		$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		$this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
		$this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
		$this->text->CurrentValue = $this->text->FormValue;
		$this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
		$this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
		$this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
		$this->Notified->CurrentValue = $this->Notified->FormValue;
		$this->Notes->CurrentValue = $this->Notes->FormValue;
		$this->paymentType->CurrentValue = $this->paymentType->FormValue;
		$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
		$this->createdBy->CurrentValue = $this->createdBy->FormValue;
		$this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
		$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		$this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
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
		$this->patientID->setDbValue($row['patientID']);
		if (array_key_exists('EV__patientID', $rs->fields)) {
			$this->patientID->VirtualValue = $rs->fields('EV__patientID'); // Set up virtual field value
		} else {
			$this->patientID->VirtualValue = ""; // Clear value
		}
		$this->patientName->setDbValue($row['patientName']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->PatientType->setDbValue($row['PatientType']);
		$this->Referal->setDbValue($row['Referal']);
		if (array_key_exists('EV__Referal', $rs->fields)) {
			$this->Referal->VirtualValue = $rs->fields('EV__Referal'); // Set up virtual field value
		} else {
			$this->Referal->VirtualValue = ""; // Clear value
		}
		$this->start_date->setDbValue($row['start_date']);
		$this->DoctorName->setDbValue($row['DoctorName']);
		$this->HospID->setDbValue($row['HospID']);
		$this->end_date->setDbValue($row['end_date']);
		$this->DoctorID->setDbValue($row['DoctorID']);
		$this->DoctorCode->setDbValue($row['DoctorCode']);
		$this->Department->setDbValue($row['Department']);
		$this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
		$this->status->setDbValue($row['status']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->text->setDbValue($row['text']);
		$this->appointment_status->setDbValue($row['appointment_status']);
		$this->PId->setDbValue($row['PId']);
		$this->SchEmail->setDbValue($row['SchEmail']);
		$this->appointment_type->setDbValue($row['appointment_type']);
		$this->Notified->setDbValue($row['Notified']);
		$this->Notes->setDbValue($row['Notes']);
		$this->paymentType->setDbValue($row['paymentType']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->createdBy->setDbValue($row['createdBy']);
		$this->createdDateTime->setDbValue($row['createdDateTime']);
		$this->PatientTypee->setDbValue($row['PatientTypee']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['patientID'] = $this->patientID->CurrentValue;
		$row['patientName'] = $this->patientName->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['Purpose'] = $this->Purpose->CurrentValue;
		$row['PatientType'] = $this->PatientType->CurrentValue;
		$row['Referal'] = $this->Referal->CurrentValue;
		$row['start_date'] = $this->start_date->CurrentValue;
		$row['DoctorName'] = $this->DoctorName->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['end_date'] = $this->end_date->CurrentValue;
		$row['DoctorID'] = $this->DoctorID->CurrentValue;
		$row['DoctorCode'] = $this->DoctorCode->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['AppointmentStatus'] = $this->AppointmentStatus->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['scheduler_id'] = $this->scheduler_id->CurrentValue;
		$row['text'] = $this->text->CurrentValue;
		$row['appointment_status'] = $this->appointment_status->CurrentValue;
		$row['PId'] = $this->PId->CurrentValue;
		$row['SchEmail'] = $this->SchEmail->CurrentValue;
		$row['appointment_type'] = $this->appointment_type->CurrentValue;
		$row['Notified'] = $this->Notified->CurrentValue;
		$row['Notes'] = $this->Notes->CurrentValue;
		$row['paymentType'] = $this->paymentType->CurrentValue;
		$row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
		$row['createdBy'] = $this->createdBy->CurrentValue;
		$row['createdDateTime'] = $this->createdDateTime->CurrentValue;
		$row['PatientTypee'] = $this->PatientTypee->CurrentValue;
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
		// patientID
		// patientName
		// MobileNumber
		// Purpose
		// PatientType
		// Referal
		// start_date
		// DoctorName
		// HospID
		// end_date
		// DoctorID
		// DoctorCode
		// Department
		// AppointmentStatus
		// status
		// scheduler_id
		// text
		// appointment_status
		// PId
		// SchEmail
		// appointment_type
		// Notified
		// Notes
		// paymentType
		// WhereDidYouHear
		// createdBy
		// createdDateTime
		// PatientTypee

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// patientID
			if ($this->patientID->VirtualValue <> "") {
				$this->patientID->ViewValue = $this->patientID->VirtualValue;
			} else {
			$curVal = strval($this->patientID->CurrentValue);
			if ($curVal <> "") {
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
				if ($this->patientID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patientID->ViewValue = $this->patientID->CurrentValue;
					}
				}
			} else {
				$this->patientID->ViewValue = NULL;
			}
			}
			$this->patientID->ViewCustomAttributes = "";

			// patientName
			$this->patientName->ViewValue = $this->patientName->CurrentValue;
			$this->patientName->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// PatientType
			if (strval($this->PatientType->CurrentValue) <> "") {
				$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
			} else {
				$this->PatientType->ViewValue = NULL;
			}
			$this->PatientType->ViewCustomAttributes = "";

			// Referal
			if ($this->Referal->VirtualValue <> "") {
				$this->Referal->ViewValue = $this->Referal->VirtualValue;
			} else {
			$curVal = strval($this->Referal->CurrentValue);
			if ($curVal <> "") {
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
				if ($this->Referal->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Referal->ViewValue = $this->Referal->CurrentValue;
					}
				}
			} else {
				$this->Referal->ViewValue = NULL;
			}
			}
			$this->Referal->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
			$this->start_date->ViewCustomAttributes = "";

			// DoctorName
			$curVal = strval($this->DoctorName->CurrentValue);
			if ($curVal <> "") {
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
				if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
					}
				}
			} else {
				$this->DoctorName->ViewValue = NULL;
			}
			$this->DoctorName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
			$this->end_date->ViewCustomAttributes = "";

			// DoctorID
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";

			// DoctorCode
			$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
			$this->DoctorCode->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// AppointmentStatus
			$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
			$this->AppointmentStatus->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->status->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->ViewValue = $this->text->CurrentValue;
			$this->text->ViewCustomAttributes = "";

			// appointment_status
			$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
			$this->appointment_status->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// SchEmail
			$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
			$this->SchEmail->ViewCustomAttributes = "";

			// appointment_type
			if (strval($this->appointment_type->CurrentValue) <> "") {
				$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
			} else {
				$this->appointment_type->ViewValue = NULL;
			}
			$this->appointment_type->ViewCustomAttributes = "";

			// Notified
			if (strval($this->Notified->CurrentValue) <> "") {
				$this->Notified->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Notified->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Notified->ViewValue = NULL;
			}
			$this->Notified->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// paymentType
			$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
			$this->paymentType->ViewCustomAttributes = "";

			// WhereDidYouHear
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal <> "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
					}
				}
			} else {
				$this->WhereDidYouHear->ViewValue = NULL;
			}
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// createdBy
			$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
			$this->createdBy->ViewCustomAttributes = "";

			// createdDateTime
			$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
			$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
			$this->createdDateTime->ViewCustomAttributes = "";

			// PatientTypee
			$curVal = strval($this->PatientTypee->CurrentValue);
			if ($curVal <> "") {
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
				if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
					}
				}
			} else {
				$this->PatientTypee->ViewValue = NULL;
			}
			$this->PatientTypee->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";
			$this->patientID->TooltipValue = "";
			if (!$this->isExport())
				$this->patientID->ViewValue = $this->highlightValue($this->patientID);

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";
			$this->patientName->TooltipValue = "";
			if (!$this->isExport())
				$this->patientName->ViewValue = $this->highlightValue($this->patientName);

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";
			if (!$this->isExport())
				$this->MobileNumber->ViewValue = $this->highlightValue($this->MobileNumber);

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";
			if (!$this->isExport())
				$this->Purpose->ViewValue = $this->highlightValue($this->Purpose);

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";
			$this->PatientType->TooltipValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";
			$this->Referal->TooltipValue = "";
			if (!$this->isExport())
				$this->Referal->ViewValue = $this->highlightValue($this->Referal);

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";
			$this->DoctorName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";
			$this->DoctorID->TooltipValue = "";
			if (!$this->isExport())
				$this->DoctorID->ViewValue = $this->highlightValue($this->DoctorID);

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";
			$this->DoctorCode->TooltipValue = "";
			if (!$this->isExport())
				$this->DoctorCode->ViewValue = $this->highlightValue($this->DoctorCode);

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";
			if (!$this->isExport())
				$this->Department->ViewValue = $this->highlightValue($this->Department);

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";
			$this->AppointmentStatus->TooltipValue = "";
			if (!$this->isExport())
				$this->AppointmentStatus->ViewValue = $this->highlightValue($this->AppointmentStatus);

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";
			if (!$this->isExport())
				$this->scheduler_id->ViewValue = $this->highlightValue($this->scheduler_id);

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";
			$this->text->TooltipValue = "";
			if (!$this->isExport())
				$this->text->ViewValue = $this->highlightValue($this->text);

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";
			$this->appointment_status->TooltipValue = "";
			if (!$this->isExport())
				$this->appointment_status->ViewValue = $this->highlightValue($this->appointment_status);

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";
			$this->SchEmail->TooltipValue = "";
			if (!$this->isExport())
				$this->SchEmail->ViewValue = $this->highlightValue($this->SchEmail);

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";
			$this->appointment_type->TooltipValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";
			$this->Notified->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";
			if (!$this->isExport())
				$this->Notes->ViewValue = $this->highlightValue($this->Notes);

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";
			$this->paymentType->TooltipValue = "";
			if (!$this->isExport())
				$this->paymentType->ViewValue = $this->highlightValue($this->paymentType);

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";
			if (!$this->isExport())
				$this->createdBy->ViewValue = $this->highlightValue($this->createdBy);

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
			$this->PatientTypee->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// patientID

			$this->patientID->EditCustomAttributes = "";
			$curVal = trim(strval($this->patientID->CurrentValue));
			if ($curVal <> "")
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
			else
				$this->patientID->ViewValue = $this->patientID->Lookup !== NULL && is_array($this->patientID->Lookup->Options) ? $curVal : NULL;
			if ($this->patientID->ViewValue !== NULL) { // Load from cache
				$this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
				if ($this->patientID->ViewValue == "")
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->patientID->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
				} else {
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patientID->EditValue = $arwrk;
			}

			// patientName
			$this->patientName->EditAttrs["class"] = "form-control";
			$this->patientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
			$this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
			$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// PatientType
			$this->PatientType->EditCustomAttributes = "";
			$this->PatientType->EditValue = $this->PatientType->options(FALSE);

			// Referal
			$this->Referal->EditCustomAttributes = "";
			$curVal = trim(strval($this->Referal->CurrentValue));
			if ($curVal <> "")
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			else
				$this->Referal->ViewValue = $this->Referal->Lookup !== NULL && is_array($this->Referal->Lookup->Options) ? $curVal : NULL;
			if ($this->Referal->ViewValue !== NULL) { // Load from cache
				$this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
				if ($this->Referal->ViewValue == "")
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Referal->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
				} else {
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Referal->EditValue = $arwrk;
			}

			// start_date
			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// DoctorName
			$this->DoctorName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DoctorName->CurrentValue));
			if ($curVal <> "")
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			else
				$this->DoctorName->ViewValue = $this->DoctorName->Lookup !== NULL && is_array($this->DoctorName->Lookup->Options) ? $curVal : NULL;
			if ($this->DoctorName->ViewValue !== NULL) { // Load from cache
				$this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
				if ($this->DoctorName->ViewValue == "")
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DoctorName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
				} else {
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DoctorName->EditValue = $arwrk;
			}

			// HospID
			// end_date

			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// DoctorID
			$this->DoctorID->EditAttrs["class"] = "form-control";
			$this->DoctorID->EditCustomAttributes = "";
			$this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
			$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

			// DoctorCode
			$this->DoctorCode->EditAttrs["class"] = "form-control";
			$this->DoctorCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// AppointmentStatus
			$this->AppointmentStatus->EditAttrs["class"] = "form-control";
			$this->AppointmentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

			// text
			$this->text->EditAttrs["class"] = "form-control";
			$this->text->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
			$this->text->EditValue = HtmlEncode($this->text->CurrentValue);
			$this->text->PlaceHolder = RemoveHtml($this->text->caption());

			// appointment_status
			$this->appointment_status->EditAttrs["class"] = "form-control";
			$this->appointment_status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
			$this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
			$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

			// SchEmail
			$this->SchEmail->EditAttrs["class"] = "form-control";
			$this->SchEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
			$this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
			$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

			// appointment_type
			$this->appointment_type->EditCustomAttributes = "";
			$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

			// Notified
			$this->Notified->EditCustomAttributes = "";
			$this->Notified->EditValue = $this->Notified->options(FALSE);

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// paymentType
			$this->paymentType->EditAttrs["class"] = "form-control";
			$this->paymentType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
			$this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
			$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
			if ($curVal <> "")
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->ViewValue !== NULL) { // Load from cache
				$this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->WhereDidYouHear->EditValue = $arwrk;
			}

			// createdBy
			// createdDateTime
			// PatientTypee

			$this->PatientTypee->EditAttrs["class"] = "form-control";
			$this->PatientTypee->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientTypee->CurrentValue));
			if ($curVal <> "")
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			else
				$this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== NULL && is_array($this->PatientTypee->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientTypee->ViewValue !== NULL) { // Load from cache
				$this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PatientTypee->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientTypee->EditValue = $arwrk;
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
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
		if ($this->patientID->Required) {
			if (!$this->patientID->IsDetailKey && $this->patientID->FormValue != NULL && $this->patientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
			}
		}
		if ($this->patientName->Required) {
			if (!$this->patientName->IsDetailKey && $this->patientName->FormValue != NULL && $this->patientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->Purpose->Required) {
			if (!$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->PatientType->Required) {
			if ($this->PatientType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
			}
		}
		if ($this->Referal->Required) {
			if (!$this->Referal->IsDetailKey && $this->Referal->FormValue != NULL && $this->Referal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
			}
		}
		if ($this->start_date->Required) {
			if (!$this->start_date->IsDetailKey && $this->start_date->FormValue != NULL && $this->start_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->start_date->FormValue)) {
			AddMessage($FormError, $this->start_date->errorMessage());
		}
		if ($this->DoctorName->Required) {
			if (!$this->DoctorName->IsDetailKey && $this->DoctorName->FormValue != NULL && $this->DoctorName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->end_date->Required) {
			if (!$this->end_date->IsDetailKey && $this->end_date->FormValue != NULL && $this->end_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->end_date->FormValue)) {
			AddMessage($FormError, $this->end_date->errorMessage());
		}
		if ($this->DoctorID->Required) {
			if (!$this->DoctorID->IsDetailKey && $this->DoctorID->FormValue != NULL && $this->DoctorID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
			}
		}
		if ($this->DoctorCode->Required) {
			if (!$this->DoctorCode->IsDetailKey && $this->DoctorCode->FormValue != NULL && $this->DoctorCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentStatus->Required) {
			if (!$this->AppointmentStatus->IsDetailKey && $this->AppointmentStatus->FormValue != NULL && $this->AppointmentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->scheduler_id->Required) {
			if (!$this->scheduler_id->IsDetailKey && $this->scheduler_id->FormValue != NULL && $this->scheduler_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
			}
		}
		if ($this->text->Required) {
			if (!$this->text->IsDetailKey && $this->text->FormValue != NULL && $this->text->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
			}
		}
		if ($this->appointment_status->Required) {
			if (!$this->appointment_status->IsDetailKey && $this->appointment_status->FormValue != NULL && $this->appointment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
			}
		}
		if ($this->PId->Required) {
			if (!$this->PId->IsDetailKey && $this->PId->FormValue != NULL && $this->PId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PId->FormValue)) {
			AddMessage($FormError, $this->PId->errorMessage());
		}
		if ($this->SchEmail->Required) {
			if (!$this->SchEmail->IsDetailKey && $this->SchEmail->FormValue != NULL && $this->SchEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
			}
		}
		if ($this->appointment_type->Required) {
			if ($this->appointment_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
			}
		}
		if ($this->Notified->Required) {
			if ($this->Notified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
			}
		}
		if ($this->Notes->Required) {
			if (!$this->Notes->IsDetailKey && $this->Notes->FormValue != NULL && $this->Notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
			}
		}
		if ($this->paymentType->Required) {
			if (!$this->paymentType->IsDetailKey && $this->paymentType->FormValue != NULL && $this->paymentType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
			}
		}
		if ($this->WhereDidYouHear->Required) {
			if ($this->WhereDidYouHear->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
			}
		}
		if ($this->createdBy->Required) {
			if (!$this->createdBy->IsDetailKey && $this->createdBy->FormValue != NULL && $this->createdBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
			}
		}
		if ($this->createdDateTime->Required) {
			if (!$this->createdDateTime->IsDetailKey && $this->createdDateTime->FormValue != NULL && $this->createdDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
			}
		}
		if ($this->PatientTypee->Required) {
			if (!$this->PatientTypee->IsDetailKey && $this->PatientTypee->FormValue != NULL && $this->PatientTypee->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
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

		// patientID
		$this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, NULL, FALSE);

		// patientName
		$this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// Purpose
		$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, FALSE);

		// PatientType
		$this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, NULL, FALSE);

		// Referal
		$this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, NULL, FALSE);

		// start_date
		$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), NULL, FALSE);

		// DoctorName
		$this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// end_date
		$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), NULL, FALSE);

		// DoctorID
		$this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, NULL, FALSE);

		// DoctorCode
		$this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// AppointmentStatus
		$this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// scheduler_id
		$this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, NULL, FALSE);

		// text
		$this->text->setDbValueDef($rsnew, $this->text->CurrentValue, NULL, FALSE);

		// appointment_status
		$this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, NULL, FALSE);

		// PId
		$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, FALSE);

		// SchEmail
		$this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, NULL, FALSE);

		// appointment_type
		$this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, NULL, FALSE);

		// Notified
		$this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, NULL, FALSE);

		// Notes
		$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, FALSE);

		// paymentType
		$this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, NULL, FALSE);

		// WhereDidYouHear
		$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, FALSE);

		// createdBy
		$this->createdBy->setDbValueDef($rsnew, GetUserName(), NULL);
		$rsnew['createdBy'] = &$this->createdBy->DbValue;

		// createdDateTime
		$this->createdDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createdDateTime'] = &$this->createdDateTime->DbValue;

		// PatientTypee
		$this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, NULL, FALSE);

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
		$this->patientID->AdvancedSearch->load();
		$this->patientName->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->Purpose->AdvancedSearch->load();
		$this->PatientType->AdvancedSearch->load();
		$this->Referal->AdvancedSearch->load();
		$this->start_date->AdvancedSearch->load();
		$this->DoctorName->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->end_date->AdvancedSearch->load();
		$this->DoctorID->AdvancedSearch->load();
		$this->DoctorCode->AdvancedSearch->load();
		$this->Department->AdvancedSearch->load();
		$this->AppointmentStatus->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->scheduler_id->AdvancedSearch->load();
		$this->text->AdvancedSearch->load();
		$this->appointment_status->AdvancedSearch->load();
		$this->PId->AdvancedSearch->load();
		$this->SchEmail->AdvancedSearch->load();
		$this->appointment_type->AdvancedSearch->load();
		$this->Notified->AdvancedSearch->load();
		$this->Notes->AdvancedSearch->load();
		$this->paymentType->AdvancedSearch->load();
		$this->WhereDidYouHear->AdvancedSearch->load();
		$this->createdBy->AdvancedSearch->load();
		$this->createdDateTime->AdvancedSearch->load();
		$this->PatientTypee->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_appointment_schedulerlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_appointment_schedulerlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_appointment_schedulerlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_appointment_scheduler\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_appointment_scheduler',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_appointment_schedulerlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
				case "x_patientID":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
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
						case "x_patientID":
							break;
						case "x_Referal":
							break;
						case "x_DoctorName":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_PatientTypee":
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
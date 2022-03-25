<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_advance_freezed_list extends view_advance_freezed
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_advance_freezed';

	// Page object name
	public $PageObjName = "view_advance_freezed_list";

	// Grid form hidden field names
	public $FormName = "fview_advance_freezedlist";
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

		// Table object (view_advance_freezed)
		if (!isset($GLOBALS["view_advance_freezed"]) || get_class($GLOBALS["view_advance_freezed"]) == PROJECT_NAMESPACE . "view_advance_freezed") {
			$GLOBALS["view_advance_freezed"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_advance_freezed"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_advance_freezedadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_advance_freezeddelete.php";
		$this->MultiUpdateUrl = "view_advance_freezedupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_advance_freezed');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_advance_freezedlistsrch";

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
		global $EXPORT, $view_advance_freezed;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_advance_freezed);
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
		$this->id->setVisibility();
		$this->freezed->setVisibility();
		$this->PatientID->setVisibility();
		$this->PatientName->setVisibility();
		$this->Name->Visible = FALSE;
		$this->Mobile->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->Visible = FALSE;
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->PatID->setVisibility();
		$this->VisiteType->setVisibility();
		$this->VisitDate->setVisibility();
		$this->AdvanceNo->setVisibility();
		$this->Status->setVisibility();
		$this->Date->setVisibility();
		$this->AdvanceValidityDate->setVisibility();
		$this->TotalRemainingAdvance->setVisibility();
		$this->Remarks->Visible = FALSE;
		$this->SeectPaymentMode->setVisibility();
		$this->PaidAmount->setVisibility();
		$this->Currency->setVisibility();
		$this->CardNumber->setVisibility();
		$this->BankName->setVisibility();
		$this->HospID->setVisibility();
		$this->Reception->setVisibility();
		$this->mrnno->setVisibility();
		$this->GetUserName->setVisibility();
		$this->AdjustmentwithAdvance->setVisibility();
		$this->AdjustmentBillNumber->setVisibility();
		$this->CancelAdvance->setVisibility();
		$this->CancelReasan->Visible = FALSE;
		$this->CancelBy->setVisibility();
		$this->CancelDate->setVisibility();
		$this->CancelDateTime->setVisibility();
		$this->CanceledBy->setVisibility();
		$this->CancelStatus->setVisibility();
		$this->Cash->setVisibility();
		$this->Card->setVisibility();
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
		$this->Amount->FormValue = ""; // Clear form value
		$this->Cash->FormValue = ""; // Clear form value
		$this->Card->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_freezed") && $CurrentForm->hasValue("o_freezed") && $this->freezed->CurrentValue <> $this->freezed->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientID") && $CurrentForm->hasValue("o_PatientID") && $this->PatientID->CurrentValue <> $this->PatientID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue <> $this->Mobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_voucher_type") && $CurrentForm->hasValue("o_voucher_type") && $this->voucher_type->CurrentValue <> $this->voucher_type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Details") && $CurrentForm->hasValue("o_Details") && $this->Details->CurrentValue <> $this->Details->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue <> $this->ModeofPayment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue <> $this->Amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_createdby") && $CurrentForm->hasValue("o_createdby") && $this->createdby->CurrentValue <> $this->createdby->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue <> $this->createddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modifiedby") && $CurrentForm->hasValue("o_modifiedby") && $this->modifiedby->CurrentValue <> $this->modifiedby->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modifieddatetime") && $CurrentForm->hasValue("o_modifieddatetime") && $this->modifieddatetime->CurrentValue <> $this->modifieddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue <> $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VisiteType") && $CurrentForm->hasValue("o_VisiteType") && $this->VisiteType->CurrentValue <> $this->VisiteType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VisitDate") && $CurrentForm->hasValue("o_VisitDate") && $this->VisitDate->CurrentValue <> $this->VisitDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AdvanceNo") && $CurrentForm->hasValue("o_AdvanceNo") && $this->AdvanceNo->CurrentValue <> $this->AdvanceNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue <> $this->Status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Date") && $CurrentForm->hasValue("o_Date") && $this->Date->CurrentValue <> $this->Date->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AdvanceValidityDate") && $CurrentForm->hasValue("o_AdvanceValidityDate") && $this->AdvanceValidityDate->CurrentValue <> $this->AdvanceValidityDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TotalRemainingAdvance") && $CurrentForm->hasValue("o_TotalRemainingAdvance") && $this->TotalRemainingAdvance->CurrentValue <> $this->TotalRemainingAdvance->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SeectPaymentMode") && $CurrentForm->hasValue("o_SeectPaymentMode") && $this->SeectPaymentMode->CurrentValue <> $this->SeectPaymentMode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PaidAmount") && $CurrentForm->hasValue("o_PaidAmount") && $this->PaidAmount->CurrentValue <> $this->PaidAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Currency") && $CurrentForm->hasValue("o_Currency") && $this->Currency->CurrentValue <> $this->Currency->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CardNumber") && $CurrentForm->hasValue("o_CardNumber") && $this->CardNumber->CurrentValue <> $this->CardNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BankName") && $CurrentForm->hasValue("o_BankName") && $this->BankName->CurrentValue <> $this->BankName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospID") && $CurrentForm->hasValue("o_HospID") && $this->HospID->CurrentValue <> $this->HospID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue <> $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue <> $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GetUserName") && $CurrentForm->hasValue("o_GetUserName") && $this->GetUserName->CurrentValue <> $this->GetUserName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AdjustmentwithAdvance") && $CurrentForm->hasValue("o_AdjustmentwithAdvance") && $this->AdjustmentwithAdvance->CurrentValue <> $this->AdjustmentwithAdvance->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AdjustmentBillNumber") && $CurrentForm->hasValue("o_AdjustmentBillNumber") && $this->AdjustmentBillNumber->CurrentValue <> $this->AdjustmentBillNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelAdvance") && $CurrentForm->hasValue("o_CancelAdvance") && $this->CancelAdvance->CurrentValue <> $this->CancelAdvance->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelBy") && $CurrentForm->hasValue("o_CancelBy") && $this->CancelBy->CurrentValue <> $this->CancelBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelDate") && $CurrentForm->hasValue("o_CancelDate") && $this->CancelDate->CurrentValue <> $this->CancelDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelDateTime") && $CurrentForm->hasValue("o_CancelDateTime") && $this->CancelDateTime->CurrentValue <> $this->CancelDateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CanceledBy") && $CurrentForm->hasValue("o_CanceledBy") && $this->CanceledBy->CurrentValue <> $this->CanceledBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelStatus") && $CurrentForm->hasValue("o_CancelStatus") && $this->CancelStatus->CurrentValue <> $this->CancelStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Cash") && $CurrentForm->hasValue("o_Cash") && $this->Cash->CurrentValue <> $this->Cash->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Card") && $CurrentForm->hasValue("o_Card") && $this->Card->CurrentValue <> $this->Card->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_advance_freezedlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->freezed->AdvancedSearch->toJson(), ","); // Field freezed
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
		$filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
		$filterList = Concat($filterList, $this->Details->AdvancedSearch->toJson(), ","); // Field Details
		$filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
		$filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
		$filterList = Concat($filterList, $this->AnyDues->AdvancedSearch->toJson(), ","); // Field AnyDues
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
		$filterList = Concat($filterList, $this->VisiteType->AdvancedSearch->toJson(), ","); // Field VisiteType
		$filterList = Concat($filterList, $this->VisitDate->AdvancedSearch->toJson(), ","); // Field VisitDate
		$filterList = Concat($filterList, $this->AdvanceNo->AdvancedSearch->toJson(), ","); // Field AdvanceNo
		$filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
		$filterList = Concat($filterList, $this->Date->AdvancedSearch->toJson(), ","); // Field Date
		$filterList = Concat($filterList, $this->AdvanceValidityDate->AdvancedSearch->toJson(), ","); // Field AdvanceValidityDate
		$filterList = Concat($filterList, $this->TotalRemainingAdvance->AdvancedSearch->toJson(), ","); // Field TotalRemainingAdvance
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->SeectPaymentMode->AdvancedSearch->toJson(), ","); // Field SeectPaymentMode
		$filterList = Concat($filterList, $this->PaidAmount->AdvancedSearch->toJson(), ","); // Field PaidAmount
		$filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
		$filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
		$filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->GetUserName->AdvancedSearch->toJson(), ","); // Field GetUserName
		$filterList = Concat($filterList, $this->AdjustmentwithAdvance->AdvancedSearch->toJson(), ","); // Field AdjustmentwithAdvance
		$filterList = Concat($filterList, $this->AdjustmentBillNumber->AdvancedSearch->toJson(), ","); // Field AdjustmentBillNumber
		$filterList = Concat($filterList, $this->CancelAdvance->AdvancedSearch->toJson(), ","); // Field CancelAdvance
		$filterList = Concat($filterList, $this->CancelReasan->AdvancedSearch->toJson(), ","); // Field CancelReasan
		$filterList = Concat($filterList, $this->CancelBy->AdvancedSearch->toJson(), ","); // Field CancelBy
		$filterList = Concat($filterList, $this->CancelDate->AdvancedSearch->toJson(), ","); // Field CancelDate
		$filterList = Concat($filterList, $this->CancelDateTime->AdvancedSearch->toJson(), ","); // Field CancelDateTime
		$filterList = Concat($filterList, $this->CanceledBy->AdvancedSearch->toJson(), ","); // Field CanceledBy
		$filterList = Concat($filterList, $this->CancelStatus->AdvancedSearch->toJson(), ","); // Field CancelStatus
		$filterList = Concat($filterList, $this->Cash->AdvancedSearch->toJson(), ","); // Field Cash
		$filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_advance_freezedlistsrch", $filters);
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

		// Field freezed
		$this->freezed->AdvancedSearch->SearchValue = @$filter["x_freezed"];
		$this->freezed->AdvancedSearch->SearchOperator = @$filter["z_freezed"];
		$this->freezed->AdvancedSearch->SearchCondition = @$filter["v_freezed"];
		$this->freezed->AdvancedSearch->SearchValue2 = @$filter["y_freezed"];
		$this->freezed->AdvancedSearch->SearchOperator2 = @$filter["w_freezed"];
		$this->freezed->AdvancedSearch->save();

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field Mobile
		$this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
		$this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
		$this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
		$this->Mobile->AdvancedSearch->save();

		// Field voucher_type
		$this->voucher_type->AdvancedSearch->SearchValue = @$filter["x_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchOperator = @$filter["z_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchCondition = @$filter["v_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchValue2 = @$filter["y_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchOperator2 = @$filter["w_voucher_type"];
		$this->voucher_type->AdvancedSearch->save();

		// Field Details
		$this->Details->AdvancedSearch->SearchValue = @$filter["x_Details"];
		$this->Details->AdvancedSearch->SearchOperator = @$filter["z_Details"];
		$this->Details->AdvancedSearch->SearchCondition = @$filter["v_Details"];
		$this->Details->AdvancedSearch->SearchValue2 = @$filter["y_Details"];
		$this->Details->AdvancedSearch->SearchOperator2 = @$filter["w_Details"];
		$this->Details->AdvancedSearch->save();

		// Field ModeofPayment
		$this->ModeofPayment->AdvancedSearch->SearchValue = @$filter["x_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator = @$filter["z_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchCondition = @$filter["v_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchValue2 = @$filter["y_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator2 = @$filter["w_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->save();

		// Field Amount
		$this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
		$this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
		$this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
		$this->Amount->AdvancedSearch->save();

		// Field AnyDues
		$this->AnyDues->AdvancedSearch->SearchValue = @$filter["x_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchOperator = @$filter["z_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchCondition = @$filter["v_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchValue2 = @$filter["y_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchOperator2 = @$filter["w_AnyDues"];
		$this->AnyDues->AdvancedSearch->save();

		// Field createdby
		$this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
		$this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
		$this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
		$this->createdby->AdvancedSearch->save();

		// Field createddatetime
		$this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
		$this->createddatetime->AdvancedSearch->save();

		// Field modifiedby
		$this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
		$this->modifiedby->AdvancedSearch->save();

		// Field modifieddatetime
		$this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->save();

		// Field PatID
		$this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
		$this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
		$this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
		$this->PatID->AdvancedSearch->save();

		// Field VisiteType
		$this->VisiteType->AdvancedSearch->SearchValue = @$filter["x_VisiteType"];
		$this->VisiteType->AdvancedSearch->SearchOperator = @$filter["z_VisiteType"];
		$this->VisiteType->AdvancedSearch->SearchCondition = @$filter["v_VisiteType"];
		$this->VisiteType->AdvancedSearch->SearchValue2 = @$filter["y_VisiteType"];
		$this->VisiteType->AdvancedSearch->SearchOperator2 = @$filter["w_VisiteType"];
		$this->VisiteType->AdvancedSearch->save();

		// Field VisitDate
		$this->VisitDate->AdvancedSearch->SearchValue = @$filter["x_VisitDate"];
		$this->VisitDate->AdvancedSearch->SearchOperator = @$filter["z_VisitDate"];
		$this->VisitDate->AdvancedSearch->SearchCondition = @$filter["v_VisitDate"];
		$this->VisitDate->AdvancedSearch->SearchValue2 = @$filter["y_VisitDate"];
		$this->VisitDate->AdvancedSearch->SearchOperator2 = @$filter["w_VisitDate"];
		$this->VisitDate->AdvancedSearch->save();

		// Field AdvanceNo
		$this->AdvanceNo->AdvancedSearch->SearchValue = @$filter["x_AdvanceNo"];
		$this->AdvanceNo->AdvancedSearch->SearchOperator = @$filter["z_AdvanceNo"];
		$this->AdvanceNo->AdvancedSearch->SearchCondition = @$filter["v_AdvanceNo"];
		$this->AdvanceNo->AdvancedSearch->SearchValue2 = @$filter["y_AdvanceNo"];
		$this->AdvanceNo->AdvancedSearch->SearchOperator2 = @$filter["w_AdvanceNo"];
		$this->AdvanceNo->AdvancedSearch->save();

		// Field Status
		$this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
		$this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
		$this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
		$this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
		$this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
		$this->Status->AdvancedSearch->save();

		// Field Date
		$this->Date->AdvancedSearch->SearchValue = @$filter["x_Date"];
		$this->Date->AdvancedSearch->SearchOperator = @$filter["z_Date"];
		$this->Date->AdvancedSearch->SearchCondition = @$filter["v_Date"];
		$this->Date->AdvancedSearch->SearchValue2 = @$filter["y_Date"];
		$this->Date->AdvancedSearch->SearchOperator2 = @$filter["w_Date"];
		$this->Date->AdvancedSearch->save();

		// Field AdvanceValidityDate
		$this->AdvanceValidityDate->AdvancedSearch->SearchValue = @$filter["x_AdvanceValidityDate"];
		$this->AdvanceValidityDate->AdvancedSearch->SearchOperator = @$filter["z_AdvanceValidityDate"];
		$this->AdvanceValidityDate->AdvancedSearch->SearchCondition = @$filter["v_AdvanceValidityDate"];
		$this->AdvanceValidityDate->AdvancedSearch->SearchValue2 = @$filter["y_AdvanceValidityDate"];
		$this->AdvanceValidityDate->AdvancedSearch->SearchOperator2 = @$filter["w_AdvanceValidityDate"];
		$this->AdvanceValidityDate->AdvancedSearch->save();

		// Field TotalRemainingAdvance
		$this->TotalRemainingAdvance->AdvancedSearch->SearchValue = @$filter["x_TotalRemainingAdvance"];
		$this->TotalRemainingAdvance->AdvancedSearch->SearchOperator = @$filter["z_TotalRemainingAdvance"];
		$this->TotalRemainingAdvance->AdvancedSearch->SearchCondition = @$filter["v_TotalRemainingAdvance"];
		$this->TotalRemainingAdvance->AdvancedSearch->SearchValue2 = @$filter["y_TotalRemainingAdvance"];
		$this->TotalRemainingAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_TotalRemainingAdvance"];
		$this->TotalRemainingAdvance->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field SeectPaymentMode
		$this->SeectPaymentMode->AdvancedSearch->SearchValue = @$filter["x_SeectPaymentMode"];
		$this->SeectPaymentMode->AdvancedSearch->SearchOperator = @$filter["z_SeectPaymentMode"];
		$this->SeectPaymentMode->AdvancedSearch->SearchCondition = @$filter["v_SeectPaymentMode"];
		$this->SeectPaymentMode->AdvancedSearch->SearchValue2 = @$filter["y_SeectPaymentMode"];
		$this->SeectPaymentMode->AdvancedSearch->SearchOperator2 = @$filter["w_SeectPaymentMode"];
		$this->SeectPaymentMode->AdvancedSearch->save();

		// Field PaidAmount
		$this->PaidAmount->AdvancedSearch->SearchValue = @$filter["x_PaidAmount"];
		$this->PaidAmount->AdvancedSearch->SearchOperator = @$filter["z_PaidAmount"];
		$this->PaidAmount->AdvancedSearch->SearchCondition = @$filter["v_PaidAmount"];
		$this->PaidAmount->AdvancedSearch->SearchValue2 = @$filter["y_PaidAmount"];
		$this->PaidAmount->AdvancedSearch->SearchOperator2 = @$filter["w_PaidAmount"];
		$this->PaidAmount->AdvancedSearch->save();

		// Field Currency
		$this->Currency->AdvancedSearch->SearchValue = @$filter["x_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator = @$filter["z_Currency"];
		$this->Currency->AdvancedSearch->SearchCondition = @$filter["v_Currency"];
		$this->Currency->AdvancedSearch->SearchValue2 = @$filter["y_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator2 = @$filter["w_Currency"];
		$this->Currency->AdvancedSearch->save();

		// Field CardNumber
		$this->CardNumber->AdvancedSearch->SearchValue = @$filter["x_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchOperator = @$filter["z_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchCondition = @$filter["v_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchValue2 = @$filter["y_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchOperator2 = @$filter["w_CardNumber"];
		$this->CardNumber->AdvancedSearch->save();

		// Field BankName
		$this->BankName->AdvancedSearch->SearchValue = @$filter["x_BankName"];
		$this->BankName->AdvancedSearch->SearchOperator = @$filter["z_BankName"];
		$this->BankName->AdvancedSearch->SearchCondition = @$filter["v_BankName"];
		$this->BankName->AdvancedSearch->SearchValue2 = @$filter["y_BankName"];
		$this->BankName->AdvancedSearch->SearchOperator2 = @$filter["w_BankName"];
		$this->BankName->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field GetUserName
		$this->GetUserName->AdvancedSearch->SearchValue = @$filter["x_GetUserName"];
		$this->GetUserName->AdvancedSearch->SearchOperator = @$filter["z_GetUserName"];
		$this->GetUserName->AdvancedSearch->SearchCondition = @$filter["v_GetUserName"];
		$this->GetUserName->AdvancedSearch->SearchValue2 = @$filter["y_GetUserName"];
		$this->GetUserName->AdvancedSearch->SearchOperator2 = @$filter["w_GetUserName"];
		$this->GetUserName->AdvancedSearch->save();

		// Field AdjustmentwithAdvance
		$this->AdjustmentwithAdvance->AdvancedSearch->SearchValue = @$filter["x_AdjustmentwithAdvance"];
		$this->AdjustmentwithAdvance->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentwithAdvance"];
		$this->AdjustmentwithAdvance->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentwithAdvance"];
		$this->AdjustmentwithAdvance->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentwithAdvance"];
		$this->AdjustmentwithAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentwithAdvance"];
		$this->AdjustmentwithAdvance->AdvancedSearch->save();

		// Field AdjustmentBillNumber
		$this->AdjustmentBillNumber->AdvancedSearch->SearchValue = @$filter["x_AdjustmentBillNumber"];
		$this->AdjustmentBillNumber->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentBillNumber"];
		$this->AdjustmentBillNumber->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentBillNumber"];
		$this->AdjustmentBillNumber->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentBillNumber"];
		$this->AdjustmentBillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentBillNumber"];
		$this->AdjustmentBillNumber->AdvancedSearch->save();

		// Field CancelAdvance
		$this->CancelAdvance->AdvancedSearch->SearchValue = @$filter["x_CancelAdvance"];
		$this->CancelAdvance->AdvancedSearch->SearchOperator = @$filter["z_CancelAdvance"];
		$this->CancelAdvance->AdvancedSearch->SearchCondition = @$filter["v_CancelAdvance"];
		$this->CancelAdvance->AdvancedSearch->SearchValue2 = @$filter["y_CancelAdvance"];
		$this->CancelAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_CancelAdvance"];
		$this->CancelAdvance->AdvancedSearch->save();

		// Field CancelReasan
		$this->CancelReasan->AdvancedSearch->SearchValue = @$filter["x_CancelReasan"];
		$this->CancelReasan->AdvancedSearch->SearchOperator = @$filter["z_CancelReasan"];
		$this->CancelReasan->AdvancedSearch->SearchCondition = @$filter["v_CancelReasan"];
		$this->CancelReasan->AdvancedSearch->SearchValue2 = @$filter["y_CancelReasan"];
		$this->CancelReasan->AdvancedSearch->SearchOperator2 = @$filter["w_CancelReasan"];
		$this->CancelReasan->AdvancedSearch->save();

		// Field CancelBy
		$this->CancelBy->AdvancedSearch->SearchValue = @$filter["x_CancelBy"];
		$this->CancelBy->AdvancedSearch->SearchOperator = @$filter["z_CancelBy"];
		$this->CancelBy->AdvancedSearch->SearchCondition = @$filter["v_CancelBy"];
		$this->CancelBy->AdvancedSearch->SearchValue2 = @$filter["y_CancelBy"];
		$this->CancelBy->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBy"];
		$this->CancelBy->AdvancedSearch->save();

		// Field CancelDate
		$this->CancelDate->AdvancedSearch->SearchValue = @$filter["x_CancelDate"];
		$this->CancelDate->AdvancedSearch->SearchOperator = @$filter["z_CancelDate"];
		$this->CancelDate->AdvancedSearch->SearchCondition = @$filter["v_CancelDate"];
		$this->CancelDate->AdvancedSearch->SearchValue2 = @$filter["y_CancelDate"];
		$this->CancelDate->AdvancedSearch->SearchOperator2 = @$filter["w_CancelDate"];
		$this->CancelDate->AdvancedSearch->save();

		// Field CancelDateTime
		$this->CancelDateTime->AdvancedSearch->SearchValue = @$filter["x_CancelDateTime"];
		$this->CancelDateTime->AdvancedSearch->SearchOperator = @$filter["z_CancelDateTime"];
		$this->CancelDateTime->AdvancedSearch->SearchCondition = @$filter["v_CancelDateTime"];
		$this->CancelDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CancelDateTime"];
		$this->CancelDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CancelDateTime"];
		$this->CancelDateTime->AdvancedSearch->save();

		// Field CanceledBy
		$this->CanceledBy->AdvancedSearch->SearchValue = @$filter["x_CanceledBy"];
		$this->CanceledBy->AdvancedSearch->SearchOperator = @$filter["z_CanceledBy"];
		$this->CanceledBy->AdvancedSearch->SearchCondition = @$filter["v_CanceledBy"];
		$this->CanceledBy->AdvancedSearch->SearchValue2 = @$filter["y_CanceledBy"];
		$this->CanceledBy->AdvancedSearch->SearchOperator2 = @$filter["w_CanceledBy"];
		$this->CanceledBy->AdvancedSearch->save();

		// Field CancelStatus
		$this->CancelStatus->AdvancedSearch->SearchValue = @$filter["x_CancelStatus"];
		$this->CancelStatus->AdvancedSearch->SearchOperator = @$filter["z_CancelStatus"];
		$this->CancelStatus->AdvancedSearch->SearchCondition = @$filter["v_CancelStatus"];
		$this->CancelStatus->AdvancedSearch->SearchValue2 = @$filter["y_CancelStatus"];
		$this->CancelStatus->AdvancedSearch->SearchOperator2 = @$filter["w_CancelStatus"];
		$this->CancelStatus->AdvancedSearch->save();

		// Field Cash
		$this->Cash->AdvancedSearch->SearchValue = @$filter["x_Cash"];
		$this->Cash->AdvancedSearch->SearchOperator = @$filter["z_Cash"];
		$this->Cash->AdvancedSearch->SearchCondition = @$filter["v_Cash"];
		$this->Cash->AdvancedSearch->SearchValue2 = @$filter["y_Cash"];
		$this->Cash->AdvancedSearch->SearchOperator2 = @$filter["w_Cash"];
		$this->Cash->AdvancedSearch->save();

		// Field Card
		$this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
		$this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
		$this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
		$this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
		$this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
		$this->Card->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->freezed, $default, FALSE); // freezed
		$this->buildSearchSql($where, $this->PatientID, $default, FALSE); // PatientID
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->Name, $default, FALSE); // Name
		$this->buildSearchSql($where, $this->Mobile, $default, FALSE); // Mobile
		$this->buildSearchSql($where, $this->voucher_type, $default, FALSE); // voucher_type
		$this->buildSearchSql($where, $this->Details, $default, FALSE); // Details
		$this->buildSearchSql($where, $this->ModeofPayment, $default, FALSE); // ModeofPayment
		$this->buildSearchSql($where, $this->Amount, $default, FALSE); // Amount
		$this->buildSearchSql($where, $this->AnyDues, $default, FALSE); // AnyDues
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->PatID, $default, FALSE); // PatID
		$this->buildSearchSql($where, $this->VisiteType, $default, FALSE); // VisiteType
		$this->buildSearchSql($where, $this->VisitDate, $default, FALSE); // VisitDate
		$this->buildSearchSql($where, $this->AdvanceNo, $default, FALSE); // AdvanceNo
		$this->buildSearchSql($where, $this->Status, $default, FALSE); // Status
		$this->buildSearchSql($where, $this->Date, $default, FALSE); // Date
		$this->buildSearchSql($where, $this->AdvanceValidityDate, $default, FALSE); // AdvanceValidityDate
		$this->buildSearchSql($where, $this->TotalRemainingAdvance, $default, FALSE); // TotalRemainingAdvance
		$this->buildSearchSql($where, $this->Remarks, $default, FALSE); // Remarks
		$this->buildSearchSql($where, $this->SeectPaymentMode, $default, FALSE); // SeectPaymentMode
		$this->buildSearchSql($where, $this->PaidAmount, $default, FALSE); // PaidAmount
		$this->buildSearchSql($where, $this->Currency, $default, FALSE); // Currency
		$this->buildSearchSql($where, $this->CardNumber, $default, FALSE); // CardNumber
		$this->buildSearchSql($where, $this->BankName, $default, FALSE); // BankName
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->Reception, $default, FALSE); // Reception
		$this->buildSearchSql($where, $this->mrnno, $default, FALSE); // mrnno
		$this->buildSearchSql($where, $this->GetUserName, $default, FALSE); // GetUserName
		$this->buildSearchSql($where, $this->AdjustmentwithAdvance, $default, FALSE); // AdjustmentwithAdvance
		$this->buildSearchSql($where, $this->AdjustmentBillNumber, $default, FALSE); // AdjustmentBillNumber
		$this->buildSearchSql($where, $this->CancelAdvance, $default, FALSE); // CancelAdvance
		$this->buildSearchSql($where, $this->CancelReasan, $default, FALSE); // CancelReasan
		$this->buildSearchSql($where, $this->CancelBy, $default, FALSE); // CancelBy
		$this->buildSearchSql($where, $this->CancelDate, $default, FALSE); // CancelDate
		$this->buildSearchSql($where, $this->CancelDateTime, $default, FALSE); // CancelDateTime
		$this->buildSearchSql($where, $this->CanceledBy, $default, FALSE); // CanceledBy
		$this->buildSearchSql($where, $this->CancelStatus, $default, FALSE); // CancelStatus
		$this->buildSearchSql($where, $this->Cash, $default, FALSE); // Cash
		$this->buildSearchSql($where, $this->Card, $default, FALSE); // Card

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->freezed->AdvancedSearch->save(); // freezed
			$this->PatientID->AdvancedSearch->save(); // PatientID
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->Name->AdvancedSearch->save(); // Name
			$this->Mobile->AdvancedSearch->save(); // Mobile
			$this->voucher_type->AdvancedSearch->save(); // voucher_type
			$this->Details->AdvancedSearch->save(); // Details
			$this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
			$this->Amount->AdvancedSearch->save(); // Amount
			$this->AnyDues->AdvancedSearch->save(); // AnyDues
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->PatID->AdvancedSearch->save(); // PatID
			$this->VisiteType->AdvancedSearch->save(); // VisiteType
			$this->VisitDate->AdvancedSearch->save(); // VisitDate
			$this->AdvanceNo->AdvancedSearch->save(); // AdvanceNo
			$this->Status->AdvancedSearch->save(); // Status
			$this->Date->AdvancedSearch->save(); // Date
			$this->AdvanceValidityDate->AdvancedSearch->save(); // AdvanceValidityDate
			$this->TotalRemainingAdvance->AdvancedSearch->save(); // TotalRemainingAdvance
			$this->Remarks->AdvancedSearch->save(); // Remarks
			$this->SeectPaymentMode->AdvancedSearch->save(); // SeectPaymentMode
			$this->PaidAmount->AdvancedSearch->save(); // PaidAmount
			$this->Currency->AdvancedSearch->save(); // Currency
			$this->CardNumber->AdvancedSearch->save(); // CardNumber
			$this->BankName->AdvancedSearch->save(); // BankName
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->Reception->AdvancedSearch->save(); // Reception
			$this->mrnno->AdvancedSearch->save(); // mrnno
			$this->GetUserName->AdvancedSearch->save(); // GetUserName
			$this->AdjustmentwithAdvance->AdvancedSearch->save(); // AdjustmentwithAdvance
			$this->AdjustmentBillNumber->AdvancedSearch->save(); // AdjustmentBillNumber
			$this->CancelAdvance->AdvancedSearch->save(); // CancelAdvance
			$this->CancelReasan->AdvancedSearch->save(); // CancelReasan
			$this->CancelBy->AdvancedSearch->save(); // CancelBy
			$this->CancelDate->AdvancedSearch->save(); // CancelDate
			$this->CancelDateTime->AdvancedSearch->save(); // CancelDateTime
			$this->CanceledBy->AdvancedSearch->save(); // CanceledBy
			$this->CancelStatus->AdvancedSearch->save(); // CancelStatus
			$this->Cash->AdvancedSearch->save(); // Cash
			$this->Card->AdvancedSearch->save(); // Card
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
		$this->buildBasicSearchSql($where, $this->freezed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VisiteType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AdvanceNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Status, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TotalRemainingAdvance, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SeectPaymentMode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PaidAmount, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GetUserName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AdjustmentwithAdvance, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AdjustmentBillNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelAdvance, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelReasan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CanceledBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelStatus, $arKeywords, $type);
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
		if ($this->freezed->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Mobile->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->voucher_type->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Details->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ModeofPayment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AnyDues->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifieddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VisiteType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VisitDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdvanceNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdvanceValidityDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TotalRemainingAdvance->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Remarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SeectPaymentMode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PaidAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Currency->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CardNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BankName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reception->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mrnno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GetUserName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdjustmentwithAdvance->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdjustmentBillNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelAdvance->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelReasan->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CanceledBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Cash->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Card->AdvancedSearch->issetSession())
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
		$this->freezed->AdvancedSearch->unsetSession();
		$this->PatientID->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->Name->AdvancedSearch->unsetSession();
		$this->Mobile->AdvancedSearch->unsetSession();
		$this->voucher_type->AdvancedSearch->unsetSession();
		$this->Details->AdvancedSearch->unsetSession();
		$this->ModeofPayment->AdvancedSearch->unsetSession();
		$this->Amount->AdvancedSearch->unsetSession();
		$this->AnyDues->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->PatID->AdvancedSearch->unsetSession();
		$this->VisiteType->AdvancedSearch->unsetSession();
		$this->VisitDate->AdvancedSearch->unsetSession();
		$this->AdvanceNo->AdvancedSearch->unsetSession();
		$this->Status->AdvancedSearch->unsetSession();
		$this->Date->AdvancedSearch->unsetSession();
		$this->AdvanceValidityDate->AdvancedSearch->unsetSession();
		$this->TotalRemainingAdvance->AdvancedSearch->unsetSession();
		$this->Remarks->AdvancedSearch->unsetSession();
		$this->SeectPaymentMode->AdvancedSearch->unsetSession();
		$this->PaidAmount->AdvancedSearch->unsetSession();
		$this->Currency->AdvancedSearch->unsetSession();
		$this->CardNumber->AdvancedSearch->unsetSession();
		$this->BankName->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->Reception->AdvancedSearch->unsetSession();
		$this->mrnno->AdvancedSearch->unsetSession();
		$this->GetUserName->AdvancedSearch->unsetSession();
		$this->AdjustmentwithAdvance->AdvancedSearch->unsetSession();
		$this->AdjustmentBillNumber->AdvancedSearch->unsetSession();
		$this->CancelAdvance->AdvancedSearch->unsetSession();
		$this->CancelReasan->AdvancedSearch->unsetSession();
		$this->CancelBy->AdvancedSearch->unsetSession();
		$this->CancelDate->AdvancedSearch->unsetSession();
		$this->CancelDateTime->AdvancedSearch->unsetSession();
		$this->CanceledBy->AdvancedSearch->unsetSession();
		$this->CancelStatus->AdvancedSearch->unsetSession();
		$this->Cash->AdvancedSearch->unsetSession();
		$this->Card->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->freezed->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Name->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->voucher_type->AdvancedSearch->load();
		$this->Details->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->AnyDues->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->VisiteType->AdvancedSearch->load();
		$this->VisitDate->AdvancedSearch->load();
		$this->AdvanceNo->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Date->AdvancedSearch->load();
		$this->AdvanceValidityDate->AdvancedSearch->load();
		$this->TotalRemainingAdvance->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->SeectPaymentMode->AdvancedSearch->load();
		$this->PaidAmount->AdvancedSearch->load();
		$this->Currency->AdvancedSearch->load();
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->GetUserName->AdvancedSearch->load();
		$this->AdjustmentwithAdvance->AdvancedSearch->load();
		$this->AdjustmentBillNumber->AdvancedSearch->load();
		$this->CancelAdvance->AdvancedSearch->load();
		$this->CancelReasan->AdvancedSearch->load();
		$this->CancelBy->AdvancedSearch->load();
		$this->CancelDate->AdvancedSearch->load();
		$this->CancelDateTime->AdvancedSearch->load();
		$this->CanceledBy->AdvancedSearch->load();
		$this->CancelStatus->AdvancedSearch->load();
		$this->Cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->freezed); // freezed
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Mobile); // Mobile
			$this->updateSort($this->voucher_type); // voucher_type
			$this->updateSort($this->Details); // Details
			$this->updateSort($this->ModeofPayment); // ModeofPayment
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->PatID); // PatID
			$this->updateSort($this->VisiteType); // VisiteType
			$this->updateSort($this->VisitDate); // VisitDate
			$this->updateSort($this->AdvanceNo); // AdvanceNo
			$this->updateSort($this->Status); // Status
			$this->updateSort($this->Date); // Date
			$this->updateSort($this->AdvanceValidityDate); // AdvanceValidityDate
			$this->updateSort($this->TotalRemainingAdvance); // TotalRemainingAdvance
			$this->updateSort($this->SeectPaymentMode); // SeectPaymentMode
			$this->updateSort($this->PaidAmount); // PaidAmount
			$this->updateSort($this->Currency); // Currency
			$this->updateSort($this->CardNumber); // CardNumber
			$this->updateSort($this->BankName); // BankName
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->Reception); // Reception
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->GetUserName); // GetUserName
			$this->updateSort($this->AdjustmentwithAdvance); // AdjustmentwithAdvance
			$this->updateSort($this->AdjustmentBillNumber); // AdjustmentBillNumber
			$this->updateSort($this->CancelAdvance); // CancelAdvance
			$this->updateSort($this->CancelBy); // CancelBy
			$this->updateSort($this->CancelDate); // CancelDate
			$this->updateSort($this->CancelDateTime); // CancelDateTime
			$this->updateSort($this->CanceledBy); // CanceledBy
			$this->updateSort($this->CancelStatus); // CancelStatus
			$this->updateSort($this->Cash); // Cash
			$this->updateSort($this->Card); // Card
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
				$this->freezed->setSort("");
				$this->PatientID->setSort("");
				$this->PatientName->setSort("");
				$this->Mobile->setSort("");
				$this->voucher_type->setSort("");
				$this->Details->setSort("");
				$this->ModeofPayment->setSort("");
				$this->Amount->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->PatID->setSort("");
				$this->VisiteType->setSort("");
				$this->VisitDate->setSort("");
				$this->AdvanceNo->setSort("");
				$this->Status->setSort("");
				$this->Date->setSort("");
				$this->AdvanceValidityDate->setSort("");
				$this->TotalRemainingAdvance->setSort("");
				$this->SeectPaymentMode->setSort("");
				$this->PaidAmount->setSort("");
				$this->Currency->setSort("");
				$this->CardNumber->setSort("");
				$this->BankName->setSort("");
				$this->HospID->setSort("");
				$this->Reception->setSort("");
				$this->mrnno->setSort("");
				$this->GetUserName->setSort("");
				$this->AdjustmentwithAdvance->setSort("");
				$this->AdjustmentBillNumber->setSort("");
				$this->CancelAdvance->setSort("");
				$this->CancelBy->setSort("");
				$this->CancelDate->setSort("");
				$this->CancelDateTime->setSort("");
				$this->CanceledBy->setSort("");
				$this->CancelStatus->setSort("");
				$this->Cash->setSort("");
				$this->Card->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_advance_freezedlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_advance_freezedlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_advance_freezedlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_advance_freezedlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->freezed->CurrentValue = NULL;
		$this->freezed->OldValue = $this->freezed->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->voucher_type->CurrentValue = NULL;
		$this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->ModeofPayment->CurrentValue = NULL;
		$this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->AnyDues->CurrentValue = NULL;
		$this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->VisiteType->CurrentValue = NULL;
		$this->VisiteType->OldValue = $this->VisiteType->CurrentValue;
		$this->VisitDate->CurrentValue = NULL;
		$this->VisitDate->OldValue = $this->VisitDate->CurrentValue;
		$this->AdvanceNo->CurrentValue = NULL;
		$this->AdvanceNo->OldValue = $this->AdvanceNo->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->Date->CurrentValue = NULL;
		$this->Date->OldValue = $this->Date->CurrentValue;
		$this->AdvanceValidityDate->CurrentValue = NULL;
		$this->AdvanceValidityDate->OldValue = $this->AdvanceValidityDate->CurrentValue;
		$this->TotalRemainingAdvance->CurrentValue = NULL;
		$this->TotalRemainingAdvance->OldValue = $this->TotalRemainingAdvance->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->SeectPaymentMode->CurrentValue = NULL;
		$this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
		$this->PaidAmount->CurrentValue = NULL;
		$this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->GetUserName->CurrentValue = NULL;
		$this->GetUserName->OldValue = $this->GetUserName->CurrentValue;
		$this->AdjustmentwithAdvance->CurrentValue = NULL;
		$this->AdjustmentwithAdvance->OldValue = $this->AdjustmentwithAdvance->CurrentValue;
		$this->AdjustmentBillNumber->CurrentValue = NULL;
		$this->AdjustmentBillNumber->OldValue = $this->AdjustmentBillNumber->CurrentValue;
		$this->CancelAdvance->CurrentValue = NULL;
		$this->CancelAdvance->OldValue = $this->CancelAdvance->CurrentValue;
		$this->CancelReasan->CurrentValue = NULL;
		$this->CancelReasan->OldValue = $this->CancelReasan->CurrentValue;
		$this->CancelBy->CurrentValue = NULL;
		$this->CancelBy->OldValue = $this->CancelBy->CurrentValue;
		$this->CancelDate->CurrentValue = NULL;
		$this->CancelDate->OldValue = $this->CancelDate->CurrentValue;
		$this->CancelDateTime->CurrentValue = NULL;
		$this->CancelDateTime->OldValue = $this->CancelDateTime->CurrentValue;
		$this->CanceledBy->CurrentValue = NULL;
		$this->CanceledBy->OldValue = $this->CanceledBy->CurrentValue;
		$this->CancelStatus->CurrentValue = NULL;
		$this->CancelStatus->OldValue = $this->CancelStatus->CurrentValue;
		$this->Cash->CurrentValue = NULL;
		$this->Cash->OldValue = $this->Cash->CurrentValue;
		$this->Card->CurrentValue = NULL;
		$this->Card->OldValue = $this->Card->CurrentValue;
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

		// freezed
		if (!$this->isAddOrEdit())
			$this->freezed->AdvancedSearch->setSearchValue(Get("x_freezed", Get("freezed", "")));
		if ($this->freezed->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->freezed->AdvancedSearch->setSearchOperator(Get("z_freezed", ""));

		// PatientID
		if (!$this->isAddOrEdit())
			$this->PatientID->AdvancedSearch->setSearchValue(Get("x_PatientID", Get("PatientID", "")));
		if ($this->PatientID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientID->AdvancedSearch->setSearchOperator(Get("z_PatientID", ""));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue(Get("x_PatientName", Get("PatientName", "")));
		if ($this->PatientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientName->AdvancedSearch->setSearchOperator(Get("z_PatientName", ""));

		// Name
		if (!$this->isAddOrEdit())
			$this->Name->AdvancedSearch->setSearchValue(Get("x_Name", Get("Name", "")));
		if ($this->Name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Name->AdvancedSearch->setSearchOperator(Get("z_Name", ""));

		// Mobile
		if (!$this->isAddOrEdit())
			$this->Mobile->AdvancedSearch->setSearchValue(Get("x_Mobile", Get("Mobile", "")));
		if ($this->Mobile->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Mobile->AdvancedSearch->setSearchOperator(Get("z_Mobile", ""));

		// voucher_type
		if (!$this->isAddOrEdit())
			$this->voucher_type->AdvancedSearch->setSearchValue(Get("x_voucher_type", Get("voucher_type", "")));
		if ($this->voucher_type->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->voucher_type->AdvancedSearch->setSearchOperator(Get("z_voucher_type", ""));

		// Details
		if (!$this->isAddOrEdit())
			$this->Details->AdvancedSearch->setSearchValue(Get("x_Details", Get("Details", "")));
		if ($this->Details->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Details->AdvancedSearch->setSearchOperator(Get("z_Details", ""));

		// ModeofPayment
		if (!$this->isAddOrEdit())
			$this->ModeofPayment->AdvancedSearch->setSearchValue(Get("x_ModeofPayment", Get("ModeofPayment", "")));
		if ($this->ModeofPayment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ModeofPayment->AdvancedSearch->setSearchOperator(Get("z_ModeofPayment", ""));

		// Amount
		if (!$this->isAddOrEdit())
			$this->Amount->AdvancedSearch->setSearchValue(Get("x_Amount", Get("Amount", "")));
		if ($this->Amount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Amount->AdvancedSearch->setSearchOperator(Get("z_Amount", ""));

		// AnyDues
		if (!$this->isAddOrEdit())
			$this->AnyDues->AdvancedSearch->setSearchValue(Get("x_AnyDues", Get("AnyDues", "")));
		if ($this->AnyDues->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AnyDues->AdvancedSearch->setSearchOperator(Get("z_AnyDues", ""));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue(Get("x_createdby", Get("createdby", "")));
		if ($this->createdby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdby->AdvancedSearch->setSearchOperator(Get("z_createdby", ""));

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue(Get("x_createddatetime", Get("createddatetime", "")));
		if ($this->createddatetime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createddatetime->AdvancedSearch->setSearchOperator(Get("z_createddatetime", ""));

		// modifiedby
		if (!$this->isAddOrEdit())
			$this->modifiedby->AdvancedSearch->setSearchValue(Get("x_modifiedby", Get("modifiedby", "")));
		if ($this->modifiedby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->modifiedby->AdvancedSearch->setSearchOperator(Get("z_modifiedby", ""));

		// modifieddatetime
		if (!$this->isAddOrEdit())
			$this->modifieddatetime->AdvancedSearch->setSearchValue(Get("x_modifieddatetime", Get("modifieddatetime", "")));
		if ($this->modifieddatetime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->modifieddatetime->AdvancedSearch->setSearchOperator(Get("z_modifieddatetime", ""));

		// PatID
		if (!$this->isAddOrEdit())
			$this->PatID->AdvancedSearch->setSearchValue(Get("x_PatID", Get("PatID", "")));
		if ($this->PatID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatID->AdvancedSearch->setSearchOperator(Get("z_PatID", ""));

		// VisiteType
		if (!$this->isAddOrEdit())
			$this->VisiteType->AdvancedSearch->setSearchValue(Get("x_VisiteType", Get("VisiteType", "")));
		if ($this->VisiteType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->VisiteType->AdvancedSearch->setSearchOperator(Get("z_VisiteType", ""));

		// VisitDate
		if (!$this->isAddOrEdit())
			$this->VisitDate->AdvancedSearch->setSearchValue(Get("x_VisitDate", Get("VisitDate", "")));
		if ($this->VisitDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->VisitDate->AdvancedSearch->setSearchOperator(Get("z_VisitDate", ""));

		// AdvanceNo
		if (!$this->isAddOrEdit())
			$this->AdvanceNo->AdvancedSearch->setSearchValue(Get("x_AdvanceNo", Get("AdvanceNo", "")));
		if ($this->AdvanceNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdvanceNo->AdvancedSearch->setSearchOperator(Get("z_AdvanceNo", ""));

		// Status
		if (!$this->isAddOrEdit())
			$this->Status->AdvancedSearch->setSearchValue(Get("x_Status", Get("Status", "")));
		if ($this->Status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Status->AdvancedSearch->setSearchOperator(Get("z_Status", ""));

		// Date
		if (!$this->isAddOrEdit())
			$this->Date->AdvancedSearch->setSearchValue(Get("x_Date", Get("Date", "")));
		if ($this->Date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Date->AdvancedSearch->setSearchOperator(Get("z_Date", ""));

		// AdvanceValidityDate
		if (!$this->isAddOrEdit())
			$this->AdvanceValidityDate->AdvancedSearch->setSearchValue(Get("x_AdvanceValidityDate", Get("AdvanceValidityDate", "")));
		if ($this->AdvanceValidityDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdvanceValidityDate->AdvancedSearch->setSearchOperator(Get("z_AdvanceValidityDate", ""));

		// TotalRemainingAdvance
		if (!$this->isAddOrEdit())
			$this->TotalRemainingAdvance->AdvancedSearch->setSearchValue(Get("x_TotalRemainingAdvance", Get("TotalRemainingAdvance", "")));
		if ($this->TotalRemainingAdvance->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TotalRemainingAdvance->AdvancedSearch->setSearchOperator(Get("z_TotalRemainingAdvance", ""));

		// Remarks
		if (!$this->isAddOrEdit())
			$this->Remarks->AdvancedSearch->setSearchValue(Get("x_Remarks", Get("Remarks", "")));
		if ($this->Remarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Remarks->AdvancedSearch->setSearchOperator(Get("z_Remarks", ""));

		// SeectPaymentMode
		if (!$this->isAddOrEdit())
			$this->SeectPaymentMode->AdvancedSearch->setSearchValue(Get("x_SeectPaymentMode", Get("SeectPaymentMode", "")));
		if ($this->SeectPaymentMode->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SeectPaymentMode->AdvancedSearch->setSearchOperator(Get("z_SeectPaymentMode", ""));

		// PaidAmount
		if (!$this->isAddOrEdit())
			$this->PaidAmount->AdvancedSearch->setSearchValue(Get("x_PaidAmount", Get("PaidAmount", "")));
		if ($this->PaidAmount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PaidAmount->AdvancedSearch->setSearchOperator(Get("z_PaidAmount", ""));

		// Currency
		if (!$this->isAddOrEdit())
			$this->Currency->AdvancedSearch->setSearchValue(Get("x_Currency", Get("Currency", "")));
		if ($this->Currency->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Currency->AdvancedSearch->setSearchOperator(Get("z_Currency", ""));

		// CardNumber
		if (!$this->isAddOrEdit())
			$this->CardNumber->AdvancedSearch->setSearchValue(Get("x_CardNumber", Get("CardNumber", "")));
		if ($this->CardNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CardNumber->AdvancedSearch->setSearchOperator(Get("z_CardNumber", ""));

		// BankName
		if (!$this->isAddOrEdit())
			$this->BankName->AdvancedSearch->setSearchValue(Get("x_BankName", Get("BankName", "")));
		if ($this->BankName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BankName->AdvancedSearch->setSearchOperator(Get("z_BankName", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// Reception
		if (!$this->isAddOrEdit())
			$this->Reception->AdvancedSearch->setSearchValue(Get("x_Reception", Get("Reception", "")));
		if ($this->Reception->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Reception->AdvancedSearch->setSearchOperator(Get("z_Reception", ""));

		// mrnno
		if (!$this->isAddOrEdit())
			$this->mrnno->AdvancedSearch->setSearchValue(Get("x_mrnno", Get("mrnno", "")));
		if ($this->mrnno->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->mrnno->AdvancedSearch->setSearchOperator(Get("z_mrnno", ""));

		// GetUserName
		if (!$this->isAddOrEdit())
			$this->GetUserName->AdvancedSearch->setSearchValue(Get("x_GetUserName", Get("GetUserName", "")));
		if ($this->GetUserName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GetUserName->AdvancedSearch->setSearchOperator(Get("z_GetUserName", ""));

		// AdjustmentwithAdvance
		if (!$this->isAddOrEdit())
			$this->AdjustmentwithAdvance->AdvancedSearch->setSearchValue(Get("x_AdjustmentwithAdvance", Get("AdjustmentwithAdvance", "")));
		if ($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdjustmentwithAdvance->AdvancedSearch->setSearchOperator(Get("z_AdjustmentwithAdvance", ""));

		// AdjustmentBillNumber
		if (!$this->isAddOrEdit())
			$this->AdjustmentBillNumber->AdvancedSearch->setSearchValue(Get("x_AdjustmentBillNumber", Get("AdjustmentBillNumber", "")));
		if ($this->AdjustmentBillNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdjustmentBillNumber->AdvancedSearch->setSearchOperator(Get("z_AdjustmentBillNumber", ""));

		// CancelAdvance
		if (!$this->isAddOrEdit())
			$this->CancelAdvance->AdvancedSearch->setSearchValue(Get("x_CancelAdvance", Get("CancelAdvance", "")));
		if ($this->CancelAdvance->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelAdvance->AdvancedSearch->setSearchOperator(Get("z_CancelAdvance", ""));

		// CancelReasan
		if (!$this->isAddOrEdit())
			$this->CancelReasan->AdvancedSearch->setSearchValue(Get("x_CancelReasan", Get("CancelReasan", "")));
		if ($this->CancelReasan->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelReasan->AdvancedSearch->setSearchOperator(Get("z_CancelReasan", ""));

		// CancelBy
		if (!$this->isAddOrEdit())
			$this->CancelBy->AdvancedSearch->setSearchValue(Get("x_CancelBy", Get("CancelBy", "")));
		if ($this->CancelBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelBy->AdvancedSearch->setSearchOperator(Get("z_CancelBy", ""));

		// CancelDate
		if (!$this->isAddOrEdit())
			$this->CancelDate->AdvancedSearch->setSearchValue(Get("x_CancelDate", Get("CancelDate", "")));
		if ($this->CancelDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelDate->AdvancedSearch->setSearchOperator(Get("z_CancelDate", ""));

		// CancelDateTime
		if (!$this->isAddOrEdit())
			$this->CancelDateTime->AdvancedSearch->setSearchValue(Get("x_CancelDateTime", Get("CancelDateTime", "")));
		if ($this->CancelDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelDateTime->AdvancedSearch->setSearchOperator(Get("z_CancelDateTime", ""));

		// CanceledBy
		if (!$this->isAddOrEdit())
			$this->CanceledBy->AdvancedSearch->setSearchValue(Get("x_CanceledBy", Get("CanceledBy", "")));
		if ($this->CanceledBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CanceledBy->AdvancedSearch->setSearchOperator(Get("z_CanceledBy", ""));

		// CancelStatus
		if (!$this->isAddOrEdit())
			$this->CancelStatus->AdvancedSearch->setSearchValue(Get("x_CancelStatus", Get("CancelStatus", "")));
		if ($this->CancelStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelStatus->AdvancedSearch->setSearchOperator(Get("z_CancelStatus", ""));

		// Cash
		if (!$this->isAddOrEdit())
			$this->Cash->AdvancedSearch->setSearchValue(Get("x_Cash", Get("Cash", "")));
		if ($this->Cash->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Cash->AdvancedSearch->setSearchOperator(Get("z_Cash", ""));

		// Card
		if (!$this->isAddOrEdit())
			$this->Card->AdvancedSearch->setSearchValue(Get("x_Card", Get("Card", "")));
		if ($this->Card->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Card->AdvancedSearch->setSearchOperator(Get("z_Card", ""));
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

		// Check field name 'freezed' first before field var 'x_freezed'
		$val = $CurrentForm->hasValue("freezed") ? $CurrentForm->getValue("freezed") : $CurrentForm->getValue("x_freezed");
		if (!$this->freezed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->freezed->Visible = FALSE; // Disable update for API request
			else
				$this->freezed->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}

		// Check field name 'voucher_type' first before field var 'x_voucher_type'
		$val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
		if (!$this->voucher_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->voucher_type->Visible = FALSE; // Disable update for API request
			else
				$this->voucher_type->setFormValue($val);
		}

		// Check field name 'Details' first before field var 'x_Details'
		$val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
		if (!$this->Details->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Details->Visible = FALSE; // Disable update for API request
			else
				$this->Details->setFormValue($val);
		}

		// Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
		$val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
		if (!$this->ModeofPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModeofPayment->Visible = FALSE; // Disable update for API request
			else
				$this->ModeofPayment->setFormValue($val);
		}

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'VisiteType' first before field var 'x_VisiteType'
		$val = $CurrentForm->hasValue("VisiteType") ? $CurrentForm->getValue("VisiteType") : $CurrentForm->getValue("x_VisiteType");
		if (!$this->VisiteType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VisiteType->Visible = FALSE; // Disable update for API request
			else
				$this->VisiteType->setFormValue($val);
		}

		// Check field name 'VisitDate' first before field var 'x_VisitDate'
		$val = $CurrentForm->hasValue("VisitDate") ? $CurrentForm->getValue("VisitDate") : $CurrentForm->getValue("x_VisitDate");
		if (!$this->VisitDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VisitDate->Visible = FALSE; // Disable update for API request
			else
				$this->VisitDate->setFormValue($val);
			$this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
		}

		// Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
		$val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
		if (!$this->AdvanceNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdvanceNo->Visible = FALSE; // Disable update for API request
			else
				$this->AdvanceNo->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'Date' first before field var 'x_Date'
		$val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
		if (!$this->Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Date->Visible = FALSE; // Disable update for API request
			else
				$this->Date->setFormValue($val);
			$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		}

		// Check field name 'AdvanceValidityDate' first before field var 'x_AdvanceValidityDate'
		$val = $CurrentForm->hasValue("AdvanceValidityDate") ? $CurrentForm->getValue("AdvanceValidityDate") : $CurrentForm->getValue("x_AdvanceValidityDate");
		if (!$this->AdvanceValidityDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdvanceValidityDate->Visible = FALSE; // Disable update for API request
			else
				$this->AdvanceValidityDate->setFormValue($val);
			$this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
		}

		// Check field name 'TotalRemainingAdvance' first before field var 'x_TotalRemainingAdvance'
		$val = $CurrentForm->hasValue("TotalRemainingAdvance") ? $CurrentForm->getValue("TotalRemainingAdvance") : $CurrentForm->getValue("x_TotalRemainingAdvance");
		if (!$this->TotalRemainingAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TotalRemainingAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->TotalRemainingAdvance->setFormValue($val);
		}

		// Check field name 'SeectPaymentMode' first before field var 'x_SeectPaymentMode'
		$val = $CurrentForm->hasValue("SeectPaymentMode") ? $CurrentForm->getValue("SeectPaymentMode") : $CurrentForm->getValue("x_SeectPaymentMode");
		if (!$this->SeectPaymentMode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SeectPaymentMode->Visible = FALSE; // Disable update for API request
			else
				$this->SeectPaymentMode->setFormValue($val);
		}

		// Check field name 'PaidAmount' first before field var 'x_PaidAmount'
		$val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
		if (!$this->PaidAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaidAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PaidAmount->setFormValue($val);
		}

		// Check field name 'Currency' first before field var 'x_Currency'
		$val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
		if (!$this->Currency->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Currency->Visible = FALSE; // Disable update for API request
			else
				$this->Currency->setFormValue($val);
		}

		// Check field name 'CardNumber' first before field var 'x_CardNumber'
		$val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
		if (!$this->CardNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CardNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CardNumber->setFormValue($val);
		}

		// Check field name 'BankName' first before field var 'x_BankName'
		$val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
		if (!$this->BankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BankName->Visible = FALSE; // Disable update for API request
			else
				$this->BankName->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'GetUserName' first before field var 'x_GetUserName'
		$val = $CurrentForm->hasValue("GetUserName") ? $CurrentForm->getValue("GetUserName") : $CurrentForm->getValue("x_GetUserName");
		if (!$this->GetUserName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GetUserName->Visible = FALSE; // Disable update for API request
			else
				$this->GetUserName->setFormValue($val);
		}

		// Check field name 'AdjustmentwithAdvance' first before field var 'x_AdjustmentwithAdvance'
		$val = $CurrentForm->hasValue("AdjustmentwithAdvance") ? $CurrentForm->getValue("AdjustmentwithAdvance") : $CurrentForm->getValue("x_AdjustmentwithAdvance");
		if (!$this->AdjustmentwithAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdjustmentwithAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentwithAdvance->setFormValue($val);
		}

		// Check field name 'AdjustmentBillNumber' first before field var 'x_AdjustmentBillNumber'
		$val = $CurrentForm->hasValue("AdjustmentBillNumber") ? $CurrentForm->getValue("AdjustmentBillNumber") : $CurrentForm->getValue("x_AdjustmentBillNumber");
		if (!$this->AdjustmentBillNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdjustmentBillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentBillNumber->setFormValue($val);
		}

		// Check field name 'CancelAdvance' first before field var 'x_CancelAdvance'
		$val = $CurrentForm->hasValue("CancelAdvance") ? $CurrentForm->getValue("CancelAdvance") : $CurrentForm->getValue("x_CancelAdvance");
		if (!$this->CancelAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->CancelAdvance->setFormValue($val);
		}

		// Check field name 'CancelBy' first before field var 'x_CancelBy'
		$val = $CurrentForm->hasValue("CancelBy") ? $CurrentForm->getValue("CancelBy") : $CurrentForm->getValue("x_CancelBy");
		if (!$this->CancelBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelBy->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBy->setFormValue($val);
		}

		// Check field name 'CancelDate' first before field var 'x_CancelDate'
		$val = $CurrentForm->hasValue("CancelDate") ? $CurrentForm->getValue("CancelDate") : $CurrentForm->getValue("x_CancelDate");
		if (!$this->CancelDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelDate->Visible = FALSE; // Disable update for API request
			else
				$this->CancelDate->setFormValue($val);
			$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
		}

		// Check field name 'CancelDateTime' first before field var 'x_CancelDateTime'
		$val = $CurrentForm->hasValue("CancelDateTime") ? $CurrentForm->getValue("CancelDateTime") : $CurrentForm->getValue("x_CancelDateTime");
		if (!$this->CancelDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CancelDateTime->setFormValue($val);
			$this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
		}

		// Check field name 'CanceledBy' first before field var 'x_CanceledBy'
		$val = $CurrentForm->hasValue("CanceledBy") ? $CurrentForm->getValue("CanceledBy") : $CurrentForm->getValue("x_CanceledBy");
		if (!$this->CanceledBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CanceledBy->Visible = FALSE; // Disable update for API request
			else
				$this->CanceledBy->setFormValue($val);
		}

		// Check field name 'CancelStatus' first before field var 'x_CancelStatus'
		$val = $CurrentForm->hasValue("CancelStatus") ? $CurrentForm->getValue("CancelStatus") : $CurrentForm->getValue("x_CancelStatus");
		if (!$this->CancelStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelStatus->Visible = FALSE; // Disable update for API request
			else
				$this->CancelStatus->setFormValue($val);
		}

		// Check field name 'Cash' first before field var 'x_Cash'
		$val = $CurrentForm->hasValue("Cash") ? $CurrentForm->getValue("Cash") : $CurrentForm->getValue("x_Cash");
		if (!$this->Cash->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cash->Visible = FALSE; // Disable update for API request
			else
				$this->Cash->setFormValue($val);
		}

		// Check field name 'Card' first before field var 'x_Card'
		$val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
		if (!$this->Card->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Card->Visible = FALSE; // Disable update for API request
			else
				$this->Card->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->freezed->CurrentValue = $this->freezed->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
		$this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
		$this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
		$this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Date->CurrentValue = $this->Date->FormValue;
		$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		$this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
		$this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
		$this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
		$this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->GetUserName->CurrentValue = $this->GetUserName->FormValue;
		$this->AdjustmentwithAdvance->CurrentValue = $this->AdjustmentwithAdvance->FormValue;
		$this->AdjustmentBillNumber->CurrentValue = $this->AdjustmentBillNumber->FormValue;
		$this->CancelAdvance->CurrentValue = $this->CancelAdvance->FormValue;
		$this->CancelBy->CurrentValue = $this->CancelBy->FormValue;
		$this->CancelDate->CurrentValue = $this->CancelDate->FormValue;
		$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
		$this->CancelDateTime->CurrentValue = $this->CancelDateTime->FormValue;
		$this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
		$this->CanceledBy->CurrentValue = $this->CanceledBy->FormValue;
		$this->CancelStatus->CurrentValue = $this->CancelStatus->FormValue;
		$this->Cash->CurrentValue = $this->Cash->FormValue;
		$this->Card->CurrentValue = $this->Card->FormValue;
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
		$this->freezed->setDbValue($row['freezed']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Name->setDbValue($row['Name']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PatID->setDbValue($row['PatID']);
		$this->VisiteType->setDbValue($row['VisiteType']);
		$this->VisitDate->setDbValue($row['VisitDate']);
		$this->AdvanceNo->setDbValue($row['AdvanceNo']);
		$this->Status->setDbValue($row['Status']);
		$this->Date->setDbValue($row['Date']);
		$this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
		$this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
		$this->Currency->setDbValue($row['Currency']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Reception->setDbValue($row['Reception']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->GetUserName->setDbValue($row['GetUserName']);
		$this->AdjustmentwithAdvance->setDbValue($row['AdjustmentwithAdvance']);
		$this->AdjustmentBillNumber->setDbValue($row['AdjustmentBillNumber']);
		$this->CancelAdvance->setDbValue($row['CancelAdvance']);
		$this->CancelReasan->setDbValue($row['CancelReasan']);
		$this->CancelBy->setDbValue($row['CancelBy']);
		$this->CancelDate->setDbValue($row['CancelDate']);
		$this->CancelDateTime->setDbValue($row['CancelDateTime']);
		$this->CanceledBy->setDbValue($row['CanceledBy']);
		$this->CancelStatus->setDbValue($row['CancelStatus']);
		$this->Cash->setDbValue($row['Cash']);
		$this->Card->setDbValue($row['Card']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['freezed'] = $this->freezed->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['AnyDues'] = $this->AnyDues->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['VisiteType'] = $this->VisiteType->CurrentValue;
		$row['VisitDate'] = $this->VisitDate->CurrentValue;
		$row['AdvanceNo'] = $this->AdvanceNo->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['Date'] = $this->Date->CurrentValue;
		$row['AdvanceValidityDate'] = $this->AdvanceValidityDate->CurrentValue;
		$row['TotalRemainingAdvance'] = $this->TotalRemainingAdvance->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
		$row['PaidAmount'] = $this->PaidAmount->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['GetUserName'] = $this->GetUserName->CurrentValue;
		$row['AdjustmentwithAdvance'] = $this->AdjustmentwithAdvance->CurrentValue;
		$row['AdjustmentBillNumber'] = $this->AdjustmentBillNumber->CurrentValue;
		$row['CancelAdvance'] = $this->CancelAdvance->CurrentValue;
		$row['CancelReasan'] = $this->CancelReasan->CurrentValue;
		$row['CancelBy'] = $this->CancelBy->CurrentValue;
		$row['CancelDate'] = $this->CancelDate->CurrentValue;
		$row['CancelDateTime'] = $this->CancelDateTime->CurrentValue;
		$row['CanceledBy'] = $this->CanceledBy->CurrentValue;
		$row['CancelStatus'] = $this->CancelStatus->CurrentValue;
		$row['Cash'] = $this->Cash->CurrentValue;
		$row['Card'] = $this->Card->CurrentValue;
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
		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue)))
			$this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// freezed
		// PatientID
		// PatientName
		// Name
		// Mobile
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatID
		// VisiteType
		// VisitDate
		// AdvanceNo
		// Status
		// Date
		// AdvanceValidityDate
		// TotalRemainingAdvance
		// Remarks
		// SeectPaymentMode
		// PaidAmount
		// Currency
		// CardNumber
		// BankName
		// HospID
		// Reception
		// mrnno
		// GetUserName
		// AdjustmentwithAdvance
		// AdjustmentBillNumber
		// CancelAdvance
		// CancelReasan
		// CancelBy
		// CancelDate
		// CancelDateTime
		// CanceledBy
		// CancelStatus
		// Cash
		// Card

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// freezed
			if (strval($this->freezed->CurrentValue) <> "") {
				$this->freezed->ViewValue = $this->freezed->optionCaption($this->freezed->CurrentValue);
			} else {
				$this->freezed->ViewValue = NULL;
			}
			$this->freezed->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// VisiteType
			$this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
			$this->VisiteType->ViewCustomAttributes = "";

			// VisitDate
			$this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
			$this->VisitDate->ViewValue = FormatDateTime($this->VisitDate->ViewValue, 0);
			$this->VisitDate->ViewCustomAttributes = "";

			// AdvanceNo
			$this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
			$this->AdvanceNo->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewCustomAttributes = "";

			// Date
			$this->Date->ViewValue = $this->Date->CurrentValue;
			$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
			$this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
			$this->AdvanceValidityDate->ViewCustomAttributes = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
			$this->TotalRemainingAdvance->ViewCustomAttributes = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
			$this->SeectPaymentMode->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// GetUserName
			$this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
			$this->GetUserName->ViewCustomAttributes = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->ViewValue = $this->AdjustmentwithAdvance->CurrentValue;
			$this->AdjustmentwithAdvance->ViewCustomAttributes = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->ViewValue = $this->AdjustmentBillNumber->CurrentValue;
			$this->AdjustmentBillNumber->ViewCustomAttributes = "";

			// CancelAdvance
			$this->CancelAdvance->ViewValue = $this->CancelAdvance->CurrentValue;
			$this->CancelAdvance->ViewCustomAttributes = "";

			// CancelBy
			$this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
			$this->CancelBy->ViewCustomAttributes = "";

			// CancelDate
			$this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
			$this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 0);
			$this->CancelDate->ViewCustomAttributes = "";

			// CancelDateTime
			$this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
			$this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
			$this->CancelDateTime->ViewCustomAttributes = "";

			// CanceledBy
			$this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
			$this->CanceledBy->ViewCustomAttributes = "";

			// CancelStatus
			$this->CancelStatus->ViewValue = $this->CancelStatus->CurrentValue;
			$this->CancelStatus->ViewCustomAttributes = "";

			// Cash
			$this->Cash->ViewValue = $this->Cash->CurrentValue;
			$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";
			$this->freezed->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";
			$this->VisiteType->TooltipValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";
			$this->VisitDate->TooltipValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";
			$this->AdvanceNo->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";
			$this->AdvanceValidityDate->TooltipValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";
			$this->TotalRemainingAdvance->TooltipValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";
			$this->SeectPaymentMode->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";
			$this->GetUserName->TooltipValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";
			$this->AdjustmentwithAdvance->TooltipValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";
			$this->AdjustmentBillNumber->TooltipValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";
			$this->CancelAdvance->TooltipValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";
			$this->CancelBy->TooltipValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";
			$this->CancelDate->TooltipValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";
			$this->CancelDateTime->TooltipValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";
			$this->CanceledBy->TooltipValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";
			$this->CancelStatus->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// freezed

			$this->freezed->EditCustomAttributes = "";
			$this->freezed->EditValue = $this->freezed->options(FALSE);

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
			$this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
			$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
			$this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
			$this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->CurrentValue);
			$this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// VisiteType
			$this->VisiteType->EditAttrs["class"] = "form-control";
			$this->VisiteType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
			$this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
			$this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

			// VisitDate
			$this->VisitDate->EditAttrs["class"] = "form-control";
			$this->VisitDate->EditCustomAttributes = "";
			$this->VisitDate->EditValue = HtmlEncode(FormatDateTime($this->VisitDate->CurrentValue, 8));
			$this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

			// AdvanceNo
			$this->AdvanceNo->EditAttrs["class"] = "form-control";
			$this->AdvanceNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
			$this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
			$this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
			$this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
			$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// AdvanceValidityDate
			$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
			$this->AdvanceValidityDate->EditCustomAttributes = "";
			$this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
			$this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
			$this->TotalRemainingAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
			$this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
			$this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

			// SeectPaymentMode
			$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
			$this->SeectPaymentMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
			$this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
			$this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
			$this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
			$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// GetUserName
			$this->GetUserName->EditAttrs["class"] = "form-control";
			$this->GetUserName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GetUserName->CurrentValue = HtmlDecode($this->GetUserName->CurrentValue);
			$this->GetUserName->EditValue = HtmlEncode($this->GetUserName->CurrentValue);
			$this->GetUserName->PlaceHolder = RemoveHtml($this->GetUserName->caption());

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentwithAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
			$this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->CurrentValue);
			$this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
			$this->AdjustmentBillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
			$this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->CurrentValue);
			$this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

			// CancelAdvance
			$this->CancelAdvance->EditAttrs["class"] = "form-control";
			$this->CancelAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelAdvance->CurrentValue = HtmlDecode($this->CancelAdvance->CurrentValue);
			$this->CancelAdvance->EditValue = HtmlEncode($this->CancelAdvance->CurrentValue);
			$this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

			// CancelBy
			$this->CancelBy->EditAttrs["class"] = "form-control";
			$this->CancelBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
			$this->CancelBy->EditValue = HtmlEncode($this->CancelBy->CurrentValue);
			$this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

			// CancelDate
			$this->CancelDate->EditAttrs["class"] = "form-control";
			$this->CancelDate->EditCustomAttributes = "";
			$this->CancelDate->EditValue = HtmlEncode(FormatDateTime($this->CancelDate->CurrentValue, 8));
			$this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

			// CancelDateTime
			$this->CancelDateTime->EditAttrs["class"] = "form-control";
			$this->CancelDateTime->EditCustomAttributes = "";
			$this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime($this->CancelDateTime->CurrentValue, 8));
			$this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

			// CanceledBy
			$this->CanceledBy->EditAttrs["class"] = "form-control";
			$this->CanceledBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
			$this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->CurrentValue);
			$this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

			// CancelStatus
			$this->CancelStatus->EditAttrs["class"] = "form-control";
			$this->CancelStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelStatus->CurrentValue = HtmlDecode($this->CancelStatus->CurrentValue);
			$this->CancelStatus->EditValue = HtmlEncode($this->CancelStatus->CurrentValue);
			$this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
			$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
			if (strval($this->Cash->EditValue) <> "" && is_numeric($this->Cash->EditValue))
				$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
			if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue))
				$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// freezed
			$this->freezed->EditCustomAttributes = "";
			$this->freezed->EditValue = $this->freezed->options(FALSE);

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			$this->PatientID->EditValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			$this->Mobile->EditValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			$this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			$this->Details->EditValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = $this->Amount->CurrentValue;
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->EditValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->EditValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = $this->PatID->CurrentValue;
			$this->PatID->EditValue = FormatNumber($this->PatID->EditValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// VisiteType
			$this->VisiteType->EditAttrs["class"] = "form-control";
			$this->VisiteType->EditCustomAttributes = "";
			$this->VisiteType->EditValue = $this->VisiteType->CurrentValue;
			$this->VisiteType->ViewCustomAttributes = "";

			// VisitDate
			$this->VisitDate->EditAttrs["class"] = "form-control";
			$this->VisitDate->EditCustomAttributes = "";
			$this->VisitDate->EditValue = $this->VisitDate->CurrentValue;
			$this->VisitDate->EditValue = FormatDateTime($this->VisitDate->EditValue, 0);
			$this->VisitDate->ViewCustomAttributes = "";

			// AdvanceNo
			$this->AdvanceNo->EditAttrs["class"] = "form-control";
			$this->AdvanceNo->EditCustomAttributes = "";
			$this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
			$this->AdvanceNo->ViewCustomAttributes = "";

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = $this->Status->CurrentValue;
			$this->Status->ViewCustomAttributes = "";

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = $this->Date->CurrentValue;
			$this->Date->EditValue = FormatDateTime($this->Date->EditValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
			$this->AdvanceValidityDate->EditCustomAttributes = "";
			$this->AdvanceValidityDate->EditValue = $this->AdvanceValidityDate->CurrentValue;
			$this->AdvanceValidityDate->EditValue = FormatDateTime($this->AdvanceValidityDate->EditValue, 0);
			$this->AdvanceValidityDate->ViewCustomAttributes = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
			$this->TotalRemainingAdvance->EditCustomAttributes = "";
			$this->TotalRemainingAdvance->EditValue = $this->TotalRemainingAdvance->CurrentValue;
			$this->TotalRemainingAdvance->ViewCustomAttributes = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
			$this->SeectPaymentMode->EditCustomAttributes = "";
			$this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
			$this->SeectPaymentMode->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			$this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewCustomAttributes = "";

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			$this->Currency->EditValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			$this->BankName->EditValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = $this->HospID->CurrentValue;
			$this->HospID->EditValue = FormatNumber($this->HospID->EditValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// GetUserName
			$this->GetUserName->EditAttrs["class"] = "form-control";
			$this->GetUserName->EditCustomAttributes = "";
			$this->GetUserName->EditValue = $this->GetUserName->CurrentValue;
			$this->GetUserName->ViewCustomAttributes = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentwithAdvance->EditCustomAttributes = "";
			$this->AdjustmentwithAdvance->EditValue = $this->AdjustmentwithAdvance->CurrentValue;
			$this->AdjustmentwithAdvance->ViewCustomAttributes = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
			$this->AdjustmentBillNumber->EditCustomAttributes = "";
			$this->AdjustmentBillNumber->EditValue = $this->AdjustmentBillNumber->CurrentValue;
			$this->AdjustmentBillNumber->ViewCustomAttributes = "";

			// CancelAdvance
			$this->CancelAdvance->EditAttrs["class"] = "form-control";
			$this->CancelAdvance->EditCustomAttributes = "";
			$this->CancelAdvance->EditValue = $this->CancelAdvance->CurrentValue;
			$this->CancelAdvance->ViewCustomAttributes = "";

			// CancelBy
			$this->CancelBy->EditAttrs["class"] = "form-control";
			$this->CancelBy->EditCustomAttributes = "";
			$this->CancelBy->EditValue = $this->CancelBy->CurrentValue;
			$this->CancelBy->ViewCustomAttributes = "";

			// CancelDate
			$this->CancelDate->EditAttrs["class"] = "form-control";
			$this->CancelDate->EditCustomAttributes = "";
			$this->CancelDate->EditValue = $this->CancelDate->CurrentValue;
			$this->CancelDate->EditValue = FormatDateTime($this->CancelDate->EditValue, 0);
			$this->CancelDate->ViewCustomAttributes = "";

			// CancelDateTime
			$this->CancelDateTime->EditAttrs["class"] = "form-control";
			$this->CancelDateTime->EditCustomAttributes = "";
			$this->CancelDateTime->EditValue = $this->CancelDateTime->CurrentValue;
			$this->CancelDateTime->EditValue = FormatDateTime($this->CancelDateTime->EditValue, 0);
			$this->CancelDateTime->ViewCustomAttributes = "";

			// CanceledBy
			$this->CanceledBy->EditAttrs["class"] = "form-control";
			$this->CanceledBy->EditCustomAttributes = "";
			$this->CanceledBy->EditValue = $this->CanceledBy->CurrentValue;
			$this->CanceledBy->ViewCustomAttributes = "";

			// CancelStatus
			$this->CancelStatus->EditAttrs["class"] = "form-control";
			$this->CancelStatus->EditCustomAttributes = "";
			$this->CancelStatus->EditValue = $this->CancelStatus->CurrentValue;
			$this->CancelStatus->ViewCustomAttributes = "";

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = $this->Cash->CurrentValue;
			$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = $this->Card->CurrentValue;
			$this->Card->EditValue = FormatNumber($this->Card->EditValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";
			$this->VisiteType->TooltipValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";
			$this->VisitDate->TooltipValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";
			$this->AdvanceNo->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";
			$this->AdvanceValidityDate->TooltipValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";
			$this->TotalRemainingAdvance->TooltipValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";
			$this->SeectPaymentMode->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";
			$this->GetUserName->TooltipValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";
			$this->AdjustmentwithAdvance->TooltipValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";
			$this->AdjustmentBillNumber->TooltipValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";
			$this->CancelAdvance->TooltipValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";
			$this->CancelBy->TooltipValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";
			$this->CancelDate->TooltipValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";
			$this->CancelDateTime->TooltipValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";
			$this->CanceledBy->TooltipValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";
			$this->CancelStatus->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// freezed
			$this->freezed->EditCustomAttributes = "";
			$this->freezed->EditValue = $this->freezed->options(FALSE);

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->voucher_type->AdvancedSearch->SearchValue = HtmlDecode($this->voucher_type->AdvancedSearch->SearchValue);
			$this->voucher_type->EditValue = HtmlEncode($this->voucher_type->AdvancedSearch->SearchValue);
			$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->AdvancedSearch->SearchValue = HtmlDecode($this->Details->AdvancedSearch->SearchValue);
			$this->Details->EditValue = HtmlEncode($this->Details->AdvancedSearch->SearchValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModeofPayment->AdvancedSearch->SearchValue = HtmlDecode($this->ModeofPayment->AdvancedSearch->SearchValue);
			$this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->AdvancedSearch->SearchValue);
			$this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// VisiteType
			$this->VisiteType->EditAttrs["class"] = "form-control";
			$this->VisiteType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VisiteType->AdvancedSearch->SearchValue = HtmlDecode($this->VisiteType->AdvancedSearch->SearchValue);
			$this->VisiteType->EditValue = HtmlEncode($this->VisiteType->AdvancedSearch->SearchValue);
			$this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

			// VisitDate
			$this->VisitDate->EditAttrs["class"] = "form-control";
			$this->VisitDate->EditCustomAttributes = "";
			$this->VisitDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->VisitDate->AdvancedSearch->SearchValue, 0), 8));
			$this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

			// AdvanceNo
			$this->AdvanceNo->EditAttrs["class"] = "form-control";
			$this->AdvanceNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdvanceNo->AdvancedSearch->SearchValue = HtmlDecode($this->AdvanceNo->AdvancedSearch->SearchValue);
			$this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->AdvancedSearch->SearchValue);
			$this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Status->AdvancedSearch->SearchValue = HtmlDecode($this->Status->AdvancedSearch->SearchValue);
			$this->Status->EditValue = HtmlEncode($this->Status->AdvancedSearch->SearchValue);
			$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue, 0), 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// AdvanceValidityDate
			$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
			$this->AdvanceValidityDate->EditCustomAttributes = "";
			$this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AdvanceValidityDate->AdvancedSearch->SearchValue, 0), 8));
			$this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
			$this->TotalRemainingAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalRemainingAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->TotalRemainingAdvance->AdvancedSearch->SearchValue);
			$this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->AdvancedSearch->SearchValue);
			$this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

			// SeectPaymentMode
			$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
			$this->SeectPaymentMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SeectPaymentMode->AdvancedSearch->SearchValue = HtmlDecode($this->SeectPaymentMode->AdvancedSearch->SearchValue);
			$this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->AdvancedSearch->SearchValue);
			$this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaidAmount->AdvancedSearch->SearchValue = HtmlDecode($this->PaidAmount->AdvancedSearch->SearchValue);
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->AdvancedSearch->SearchValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Currency->AdvancedSearch->SearchValue = HtmlDecode($this->Currency->AdvancedSearch->SearchValue);
			$this->Currency->EditValue = HtmlEncode($this->Currency->AdvancedSearch->SearchValue);
			$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CardNumber->AdvancedSearch->SearchValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->AdvancedSearch->SearchValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// GetUserName
			$this->GetUserName->EditAttrs["class"] = "form-control";
			$this->GetUserName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GetUserName->AdvancedSearch->SearchValue = HtmlDecode($this->GetUserName->AdvancedSearch->SearchValue);
			$this->GetUserName->EditValue = HtmlEncode($this->GetUserName->AdvancedSearch->SearchValue);
			$this->GetUserName->PlaceHolder = RemoveHtml($this->GetUserName->caption());

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentwithAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentwithAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue);
			$this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue);
			$this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
			$this->AdjustmentBillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentBillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->AdjustmentBillNumber->AdvancedSearch->SearchValue);
			$this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->AdvancedSearch->SearchValue);
			$this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

			// CancelAdvance
			$this->CancelAdvance->EditAttrs["class"] = "form-control";
			$this->CancelAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->CancelAdvance->AdvancedSearch->SearchValue);
			$this->CancelAdvance->EditValue = HtmlEncode($this->CancelAdvance->AdvancedSearch->SearchValue);
			$this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

			// CancelBy
			$this->CancelBy->EditAttrs["class"] = "form-control";
			$this->CancelBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBy->AdvancedSearch->SearchValue = HtmlDecode($this->CancelBy->AdvancedSearch->SearchValue);
			$this->CancelBy->EditValue = HtmlEncode($this->CancelBy->AdvancedSearch->SearchValue);
			$this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

			// CancelDate
			$this->CancelDate->EditAttrs["class"] = "form-control";
			$this->CancelDate->EditCustomAttributes = "";
			$this->CancelDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CancelDate->AdvancedSearch->SearchValue, 0), 8));
			$this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

			// CancelDateTime
			$this->CancelDateTime->EditAttrs["class"] = "form-control";
			$this->CancelDateTime->EditCustomAttributes = "";
			$this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CancelDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

			// CanceledBy
			$this->CanceledBy->EditAttrs["class"] = "form-control";
			$this->CanceledBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CanceledBy->AdvancedSearch->SearchValue = HtmlDecode($this->CanceledBy->AdvancedSearch->SearchValue);
			$this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->AdvancedSearch->SearchValue);
			$this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

			// CancelStatus
			$this->CancelStatus->EditAttrs["class"] = "form-control";
			$this->CancelStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelStatus->AdvancedSearch->SearchValue = HtmlDecode($this->CancelStatus->AdvancedSearch->SearchValue);
			$this->CancelStatus->EditValue = HtmlEncode($this->CancelStatus->AdvancedSearch->SearchValue);
			$this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = HtmlEncode($this->Cash->AdvancedSearch->SearchValue);
			$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
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
		if ($this->freezed->Required) {
			if ($this->freezed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->freezed->caption(), $this->freezed->RequiredErrorMessage));
			}
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->voucher_type->Required) {
			if (!$this->voucher_type->IsDetailKey && $this->voucher_type->FormValue != NULL && $this->voucher_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
			}
		}
		if ($this->Details->Required) {
			if (!$this->Details->IsDetailKey && $this->Details->FormValue != NULL && $this->Details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
			}
		}
		if ($this->ModeofPayment->Required) {
			if (!$this->ModeofPayment->IsDetailKey && $this->ModeofPayment->FormValue != NULL && $this->ModeofPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
			}
		}
		if ($this->Amount->Required) {
			if (!$this->Amount->IsDetailKey && $this->Amount->FormValue != NULL && $this->Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
			}
		}
		if ($this->AnyDues->Required) {
			if (!$this->AnyDues->IsDetailKey && $this->AnyDues->FormValue != NULL && $this->AnyDues->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->VisiteType->Required) {
			if (!$this->VisiteType->IsDetailKey && $this->VisiteType->FormValue != NULL && $this->VisiteType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisiteType->caption(), $this->VisiteType->RequiredErrorMessage));
			}
		}
		if ($this->VisitDate->Required) {
			if (!$this->VisitDate->IsDetailKey && $this->VisitDate->FormValue != NULL && $this->VisitDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisitDate->caption(), $this->VisitDate->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceNo->Required) {
			if (!$this->AdvanceNo->IsDetailKey && $this->AdvanceNo->FormValue != NULL && $this->AdvanceNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->Date->Required) {
			if (!$this->Date->IsDetailKey && $this->Date->FormValue != NULL && $this->Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceValidityDate->Required) {
			if (!$this->AdvanceValidityDate->IsDetailKey && $this->AdvanceValidityDate->FormValue != NULL && $this->AdvanceValidityDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
			}
		}
		if ($this->TotalRemainingAdvance->Required) {
			if (!$this->TotalRemainingAdvance->IsDetailKey && $this->TotalRemainingAdvance->FormValue != NULL && $this->TotalRemainingAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalRemainingAdvance->caption(), $this->TotalRemainingAdvance->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->SeectPaymentMode->Required) {
			if (!$this->SeectPaymentMode->IsDetailKey && $this->SeectPaymentMode->FormValue != NULL && $this->SeectPaymentMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SeectPaymentMode->caption(), $this->SeectPaymentMode->RequiredErrorMessage));
			}
		}
		if ($this->PaidAmount->Required) {
			if (!$this->PaidAmount->IsDetailKey && $this->PaidAmount->FormValue != NULL && $this->PaidAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
			}
		}
		if ($this->Currency->Required) {
			if (!$this->Currency->IsDetailKey && $this->Currency->FormValue != NULL && $this->Currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
			}
		}
		if ($this->CardNumber->Required) {
			if (!$this->CardNumber->IsDetailKey && $this->CardNumber->FormValue != NULL && $this->CardNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
			}
		}
		if ($this->BankName->Required) {
			if (!$this->BankName->IsDetailKey && $this->BankName->FormValue != NULL && $this->BankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->GetUserName->Required) {
			if (!$this->GetUserName->IsDetailKey && $this->GetUserName->FormValue != NULL && $this->GetUserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GetUserName->caption(), $this->GetUserName->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentwithAdvance->Required) {
			if (!$this->AdjustmentwithAdvance->IsDetailKey && $this->AdjustmentwithAdvance->FormValue != NULL && $this->AdjustmentwithAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentwithAdvance->caption(), $this->AdjustmentwithAdvance->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentBillNumber->Required) {
			if (!$this->AdjustmentBillNumber->IsDetailKey && $this->AdjustmentBillNumber->FormValue != NULL && $this->AdjustmentBillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentBillNumber->caption(), $this->AdjustmentBillNumber->RequiredErrorMessage));
			}
		}
		if ($this->CancelAdvance->Required) {
			if (!$this->CancelAdvance->IsDetailKey && $this->CancelAdvance->FormValue != NULL && $this->CancelAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelAdvance->caption(), $this->CancelAdvance->RequiredErrorMessage));
			}
		}
		if ($this->CancelReasan->Required) {
			if (!$this->CancelReasan->IsDetailKey && $this->CancelReasan->FormValue != NULL && $this->CancelReasan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelReasan->caption(), $this->CancelReasan->RequiredErrorMessage));
			}
		}
		if ($this->CancelBy->Required) {
			if (!$this->CancelBy->IsDetailKey && $this->CancelBy->FormValue != NULL && $this->CancelBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBy->caption(), $this->CancelBy->RequiredErrorMessage));
			}
		}
		if ($this->CancelDate->Required) {
			if (!$this->CancelDate->IsDetailKey && $this->CancelDate->FormValue != NULL && $this->CancelDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelDate->caption(), $this->CancelDate->RequiredErrorMessage));
			}
		}
		if ($this->CancelDateTime->Required) {
			if (!$this->CancelDateTime->IsDetailKey && $this->CancelDateTime->FormValue != NULL && $this->CancelDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelDateTime->caption(), $this->CancelDateTime->RequiredErrorMessage));
			}
		}
		if ($this->CanceledBy->Required) {
			if (!$this->CanceledBy->IsDetailKey && $this->CanceledBy->FormValue != NULL && $this->CanceledBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CanceledBy->caption(), $this->CanceledBy->RequiredErrorMessage));
			}
		}
		if ($this->CancelStatus->Required) {
			if (!$this->CancelStatus->IsDetailKey && $this->CancelStatus->FormValue != NULL && $this->CancelStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelStatus->caption(), $this->CancelStatus->RequiredErrorMessage));
			}
		}
		if ($this->Cash->Required) {
			if (!$this->Cash->IsDetailKey && $this->Cash->FormValue != NULL && $this->Cash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cash->caption(), $this->Cash->RequiredErrorMessage));
			}
		}
		if ($this->Card->Required) {
			if (!$this->Card->IsDetailKey && $this->Card->FormValue != NULL && $this->Card->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
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

			// freezed
			$this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, NULL, $this->freezed->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('freezed')); // freezed
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

		// freezed
		$this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, NULL, FALSE);

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// voucher_type
		$this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, NULL, FALSE);

		// Details
		$this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, FALSE);

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, FALSE);

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, FALSE);

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), NULL, FALSE);

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// VisiteType
		$this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, NULL, FALSE);

		// VisitDate
		$this->VisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->VisitDate->CurrentValue, 0), NULL, FALSE);

		// AdvanceNo
		$this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, FALSE);

		// Date
		$this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), NULL, FALSE);

		// AdvanceValidityDate
		$this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), NULL, FALSE);

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, NULL, FALSE);

		// SeectPaymentMode
		$this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, NULL, FALSE);

		// PaidAmount
		$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, FALSE);

		// Currency
		$this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, NULL, FALSE);

		// CardNumber
		$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, FALSE);

		// BankName
		$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, FALSE);

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// GetUserName
		$this->GetUserName->setDbValueDef($rsnew, $this->GetUserName->CurrentValue, NULL, FALSE);

		// AdjustmentwithAdvance
		$this->AdjustmentwithAdvance->setDbValueDef($rsnew, $this->AdjustmentwithAdvance->CurrentValue, NULL, FALSE);

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber->setDbValueDef($rsnew, $this->AdjustmentBillNumber->CurrentValue, NULL, FALSE);

		// CancelAdvance
		$this->CancelAdvance->setDbValueDef($rsnew, $this->CancelAdvance->CurrentValue, NULL, FALSE);

		// CancelBy
		$this->CancelBy->setDbValueDef($rsnew, $this->CancelBy->CurrentValue, NULL, FALSE);

		// CancelDate
		$this->CancelDate->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDate->CurrentValue, 0), NULL, FALSE);

		// CancelDateTime
		$this->CancelDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDateTime->CurrentValue, 0), NULL, FALSE);

		// CanceledBy
		$this->CanceledBy->setDbValueDef($rsnew, $this->CanceledBy->CurrentValue, NULL, FALSE);

		// CancelStatus
		$this->CancelStatus->setDbValueDef($rsnew, $this->CancelStatus->CurrentValue, NULL, FALSE);

		// Cash
		$this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, NULL, FALSE);

		// Card
		$this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, NULL, FALSE);

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
		$this->freezed->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Name->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->voucher_type->AdvancedSearch->load();
		$this->Details->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->AnyDues->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->VisiteType->AdvancedSearch->load();
		$this->VisitDate->AdvancedSearch->load();
		$this->AdvanceNo->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->Date->AdvancedSearch->load();
		$this->AdvanceValidityDate->AdvancedSearch->load();
		$this->TotalRemainingAdvance->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->SeectPaymentMode->AdvancedSearch->load();
		$this->PaidAmount->AdvancedSearch->load();
		$this->Currency->AdvancedSearch->load();
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->GetUserName->AdvancedSearch->load();
		$this->AdjustmentwithAdvance->AdvancedSearch->load();
		$this->AdjustmentBillNumber->AdvancedSearch->load();
		$this->CancelAdvance->AdvancedSearch->load();
		$this->CancelReasan->AdvancedSearch->load();
		$this->CancelBy->AdvancedSearch->load();
		$this->CancelDate->AdvancedSearch->load();
		$this->CancelDateTime->AdvancedSearch->load();
		$this->CanceledBy->AdvancedSearch->load();
		$this->CancelStatus->AdvancedSearch->load();
		$this->Cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_advance_freezedlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_advance_freezedlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_advance_freezedlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_advance_freezed\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_advance_freezed',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_advance_freezedlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
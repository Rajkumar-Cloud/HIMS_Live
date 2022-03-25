<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_lab_servicess_list extends view_lab_servicess
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_lab_servicess';

	// Page object name
	public $PageObjName = "view_lab_servicess_list";

	// Grid form hidden field names
	public $FormName = "fview_lab_servicesslist";
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

		// Table object (view_lab_servicess)
		if (!isset($GLOBALS["view_lab_servicess"]) || get_class($GLOBALS["view_lab_servicess"]) == PROJECT_NAMESPACE . "view_lab_servicess") {
			$GLOBALS["view_lab_servicess"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_lab_servicess"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_lab_servicessadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_lab_servicessdelete.php";
		$this->MultiUpdateUrl = "view_lab_servicessupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_servicess');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_lab_servicesslistsrch";

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
		global $EXPORT, $view_lab_servicess;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_lab_servicess);
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
		$this->SID->setVisibility();
		$this->Reception->Visible = FALSE;
		$this->PatientId->setVisibility();
		$this->mrnno->Visible = FALSE;
		$this->PatientName->setVisibility();
		$this->Age->Visible = FALSE;
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->Mobile->setVisibility();
		$this->IP_OP->Visible = FALSE;
		$this->Doctor->setVisibility();
		$this->voucher_type->Visible = FALSE;
		$this->Details->Visible = FALSE;
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->Visible = FALSE;
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->RealizationAmount->Visible = FALSE;
		$this->RealizationStatus->Visible = FALSE;
		$this->RealizationRemarks->Visible = FALSE;
		$this->RealizationBatchNo->Visible = FALSE;
		$this->RealizationDate->Visible = FALSE;
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->Visible = FALSE;
		$this->CId->Visible = FALSE;
		$this->PartnerName->setVisibility();
		$this->PayerType->Visible = FALSE;
		$this->Dob->Visible = FALSE;
		$this->Currency->Visible = FALSE;
		$this->DiscountRemarks->Visible = FALSE;
		$this->Remarks->Visible = FALSE;
		$this->PatId->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->RefferedBy->setVisibility();
		$this->BillNumber->setVisibility();
		$this->CardNumber->Visible = FALSE;
		$this->BankName->Visible = FALSE;
		$this->DrID->Visible = FALSE;
		$this->LabTestReleased->setVisibility();
		$this->BillStatus->Visible = FALSE;
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
		$this->setupLookupOptions($this->HospID);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_lab_servicesslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->SID->AdvancedSearch->toJson(), ","); // Field SID
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
		$filterList = Concat($filterList, $this->IP_OP->AdvancedSearch->toJson(), ","); // Field IP_OP
		$filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
		$filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
		$filterList = Concat($filterList, $this->Details->AdvancedSearch->toJson(), ","); // Field Details
		$filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
		$filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
		$filterList = Concat($filterList, $this->AnyDues->AdvancedSearch->toJson(), ","); // Field AnyDues
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->RealizationAmount->AdvancedSearch->toJson(), ","); // Field RealizationAmount
		$filterList = Concat($filterList, $this->RealizationStatus->AdvancedSearch->toJson(), ","); // Field RealizationStatus
		$filterList = Concat($filterList, $this->RealizationRemarks->AdvancedSearch->toJson(), ","); // Field RealizationRemarks
		$filterList = Concat($filterList, $this->RealizationBatchNo->AdvancedSearch->toJson(), ","); // Field RealizationBatchNo
		$filterList = Concat($filterList, $this->RealizationDate->AdvancedSearch->toJson(), ","); // Field RealizationDate
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PayerType->AdvancedSearch->toJson(), ","); // Field PayerType
		$filterList = Concat($filterList, $this->Dob->AdvancedSearch->toJson(), ","); // Field Dob
		$filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
		$filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
		$filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
		$filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
		$filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
		$filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
		$filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
		$filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
		$filterList = Concat($filterList, $this->LabTestReleased->AdvancedSearch->toJson(), ","); // Field LabTestReleased
		$filterList = Concat($filterList, $this->BillStatus->AdvancedSearch->toJson(), ","); // Field BillStatus
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_lab_servicesslistsrch", $filters);
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

		// Field SID
		$this->SID->AdvancedSearch->SearchValue = @$filter["x_SID"];
		$this->SID->AdvancedSearch->SearchOperator = @$filter["z_SID"];
		$this->SID->AdvancedSearch->SearchCondition = @$filter["v_SID"];
		$this->SID->AdvancedSearch->SearchValue2 = @$filter["y_SID"];
		$this->SID->AdvancedSearch->SearchOperator2 = @$filter["w_SID"];
		$this->SID->AdvancedSearch->save();

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

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

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

		// Field Mobile
		$this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
		$this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
		$this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
		$this->Mobile->AdvancedSearch->save();

		// Field IP_OP
		$this->IP_OP->AdvancedSearch->SearchValue = @$filter["x_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchOperator = @$filter["z_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchCondition = @$filter["v_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchValue2 = @$filter["y_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchOperator2 = @$filter["w_IP_OP"];
		$this->IP_OP->AdvancedSearch->save();

		// Field Doctor
		$this->Doctor->AdvancedSearch->SearchValue = @$filter["x_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator = @$filter["z_Doctor"];
		$this->Doctor->AdvancedSearch->SearchCondition = @$filter["v_Doctor"];
		$this->Doctor->AdvancedSearch->SearchValue2 = @$filter["y_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator2 = @$filter["w_Doctor"];
		$this->Doctor->AdvancedSearch->save();

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

		// Field RealizationAmount
		$this->RealizationAmount->AdvancedSearch->SearchValue = @$filter["x_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchOperator = @$filter["z_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchCondition = @$filter["v_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchValue2 = @$filter["y_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->save();

		// Field RealizationStatus
		$this->RealizationStatus->AdvancedSearch->SearchValue = @$filter["x_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchOperator = @$filter["z_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchCondition = @$filter["v_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchValue2 = @$filter["y_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->save();

		// Field RealizationRemarks
		$this->RealizationRemarks->AdvancedSearch->SearchValue = @$filter["x_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchOperator = @$filter["z_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchCondition = @$filter["v_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchValue2 = @$filter["y_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->save();

		// Field RealizationBatchNo
		$this->RealizationBatchNo->AdvancedSearch->SearchValue = @$filter["x_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchOperator = @$filter["z_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchCondition = @$filter["v_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchValue2 = @$filter["y_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->save();

		// Field RealizationDate
		$this->RealizationDate->AdvancedSearch->SearchValue = @$filter["x_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchOperator = @$filter["z_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchCondition = @$filter["v_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchValue2 = @$filter["y_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field RIDNO
		$this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
		$this->RIDNO->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field CId
		$this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
		$this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
		$this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
		$this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
		$this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
		$this->CId->AdvancedSearch->save();

		// Field PartnerName
		$this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
		$this->PartnerName->AdvancedSearch->save();

		// Field PayerType
		$this->PayerType->AdvancedSearch->SearchValue = @$filter["x_PayerType"];
		$this->PayerType->AdvancedSearch->SearchOperator = @$filter["z_PayerType"];
		$this->PayerType->AdvancedSearch->SearchCondition = @$filter["v_PayerType"];
		$this->PayerType->AdvancedSearch->SearchValue2 = @$filter["y_PayerType"];
		$this->PayerType->AdvancedSearch->SearchOperator2 = @$filter["w_PayerType"];
		$this->PayerType->AdvancedSearch->save();

		// Field Dob
		$this->Dob->AdvancedSearch->SearchValue = @$filter["x_Dob"];
		$this->Dob->AdvancedSearch->SearchOperator = @$filter["z_Dob"];
		$this->Dob->AdvancedSearch->SearchCondition = @$filter["v_Dob"];
		$this->Dob->AdvancedSearch->SearchValue2 = @$filter["y_Dob"];
		$this->Dob->AdvancedSearch->SearchOperator2 = @$filter["w_Dob"];
		$this->Dob->AdvancedSearch->save();

		// Field Currency
		$this->Currency->AdvancedSearch->SearchValue = @$filter["x_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator = @$filter["z_Currency"];
		$this->Currency->AdvancedSearch->SearchCondition = @$filter["v_Currency"];
		$this->Currency->AdvancedSearch->SearchValue2 = @$filter["y_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator2 = @$filter["w_Currency"];
		$this->Currency->AdvancedSearch->save();

		// Field DiscountRemarks
		$this->DiscountRemarks->AdvancedSearch->SearchValue = @$filter["x_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator = @$filter["z_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchCondition = @$filter["v_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field PatId
		$this->PatId->AdvancedSearch->SearchValue = @$filter["x_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator = @$filter["z_PatId"];
		$this->PatId->AdvancedSearch->SearchCondition = @$filter["v_PatId"];
		$this->PatId->AdvancedSearch->SearchValue2 = @$filter["y_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator2 = @$filter["w_PatId"];
		$this->PatId->AdvancedSearch->save();

		// Field DrDepartment
		$this->DrDepartment->AdvancedSearch->SearchValue = @$filter["x_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator = @$filter["z_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchCondition = @$filter["v_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchValue2 = @$filter["y_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator2 = @$filter["w_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->save();

		// Field RefferedBy
		$this->RefferedBy->AdvancedSearch->SearchValue = @$filter["x_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator = @$filter["z_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchCondition = @$filter["v_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchValue2 = @$filter["y_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->save();

		// Field BillNumber
		$this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
		$this->BillNumber->AdvancedSearch->save();

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

		// Field DrID
		$this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
		$this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
		$this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
		$this->DrID->AdvancedSearch->save();

		// Field LabTestReleased
		$this->LabTestReleased->AdvancedSearch->SearchValue = @$filter["x_LabTestReleased"];
		$this->LabTestReleased->AdvancedSearch->SearchOperator = @$filter["z_LabTestReleased"];
		$this->LabTestReleased->AdvancedSearch->SearchCondition = @$filter["v_LabTestReleased"];
		$this->LabTestReleased->AdvancedSearch->SearchValue2 = @$filter["y_LabTestReleased"];
		$this->LabTestReleased->AdvancedSearch->SearchOperator2 = @$filter["w_LabTestReleased"];
		$this->LabTestReleased->AdvancedSearch->save();

		// Field BillStatus
		$this->BillStatus->AdvancedSearch->SearchValue = @$filter["x_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator = @$filter["z_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchCondition = @$filter["v_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchValue2 = @$filter["y_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator2 = @$filter["w_BillStatus"];
		$this->BillStatus->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->SID, $default, FALSE); // SID
		$this->buildSearchSql($where, $this->Reception, $default, FALSE); // Reception
		$this->buildSearchSql($where, $this->PatientId, $default, FALSE); // PatientId
		$this->buildSearchSql($where, $this->mrnno, $default, FALSE); // mrnno
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->Gender, $default, FALSE); // Gender
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->Mobile, $default, FALSE); // Mobile
		$this->buildSearchSql($where, $this->IP_OP, $default, FALSE); // IP_OP
		$this->buildSearchSql($where, $this->Doctor, $default, FALSE); // Doctor
		$this->buildSearchSql($where, $this->voucher_type, $default, FALSE); // voucher_type
		$this->buildSearchSql($where, $this->Details, $default, FALSE); // Details
		$this->buildSearchSql($where, $this->ModeofPayment, $default, FALSE); // ModeofPayment
		$this->buildSearchSql($where, $this->Amount, $default, FALSE); // Amount
		$this->buildSearchSql($where, $this->AnyDues, $default, FALSE); // AnyDues
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->RealizationAmount, $default, FALSE); // RealizationAmount
		$this->buildSearchSql($where, $this->RealizationStatus, $default, FALSE); // RealizationStatus
		$this->buildSearchSql($where, $this->RealizationRemarks, $default, FALSE); // RealizationRemarks
		$this->buildSearchSql($where, $this->RealizationBatchNo, $default, FALSE); // RealizationBatchNo
		$this->buildSearchSql($where, $this->RealizationDate, $default, FALSE); // RealizationDate
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->RIDNO, $default, FALSE); // RIDNO
		$this->buildSearchSql($where, $this->TidNo, $default, FALSE); // TidNo
		$this->buildSearchSql($where, $this->CId, $default, FALSE); // CId
		$this->buildSearchSql($where, $this->PartnerName, $default, FALSE); // PartnerName
		$this->buildSearchSql($where, $this->PayerType, $default, FALSE); // PayerType
		$this->buildSearchSql($where, $this->Dob, $default, FALSE); // Dob
		$this->buildSearchSql($where, $this->Currency, $default, FALSE); // Currency
		$this->buildSearchSql($where, $this->DiscountRemarks, $default, FALSE); // DiscountRemarks
		$this->buildSearchSql($where, $this->Remarks, $default, FALSE); // Remarks
		$this->buildSearchSql($where, $this->PatId, $default, FALSE); // PatId
		$this->buildSearchSql($where, $this->DrDepartment, $default, FALSE); // DrDepartment
		$this->buildSearchSql($where, $this->RefferedBy, $default, FALSE); // RefferedBy
		$this->buildSearchSql($where, $this->BillNumber, $default, FALSE); // BillNumber
		$this->buildSearchSql($where, $this->CardNumber, $default, FALSE); // CardNumber
		$this->buildSearchSql($where, $this->BankName, $default, FALSE); // BankName
		$this->buildSearchSql($where, $this->DrID, $default, FALSE); // DrID
		$this->buildSearchSql($where, $this->LabTestReleased, $default, FALSE); // LabTestReleased
		$this->buildSearchSql($where, $this->BillStatus, $default, FALSE); // BillStatus

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->SID->AdvancedSearch->save(); // SID
			$this->Reception->AdvancedSearch->save(); // Reception
			$this->PatientId->AdvancedSearch->save(); // PatientId
			$this->mrnno->AdvancedSearch->save(); // mrnno
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->Age->AdvancedSearch->save(); // Age
			$this->Gender->AdvancedSearch->save(); // Gender
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->Mobile->AdvancedSearch->save(); // Mobile
			$this->IP_OP->AdvancedSearch->save(); // IP_OP
			$this->Doctor->AdvancedSearch->save(); // Doctor
			$this->voucher_type->AdvancedSearch->save(); // voucher_type
			$this->Details->AdvancedSearch->save(); // Details
			$this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
			$this->Amount->AdvancedSearch->save(); // Amount
			$this->AnyDues->AdvancedSearch->save(); // AnyDues
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->RealizationAmount->AdvancedSearch->save(); // RealizationAmount
			$this->RealizationStatus->AdvancedSearch->save(); // RealizationStatus
			$this->RealizationRemarks->AdvancedSearch->save(); // RealizationRemarks
			$this->RealizationBatchNo->AdvancedSearch->save(); // RealizationBatchNo
			$this->RealizationDate->AdvancedSearch->save(); // RealizationDate
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->RIDNO->AdvancedSearch->save(); // RIDNO
			$this->TidNo->AdvancedSearch->save(); // TidNo
			$this->CId->AdvancedSearch->save(); // CId
			$this->PartnerName->AdvancedSearch->save(); // PartnerName
			$this->PayerType->AdvancedSearch->save(); // PayerType
			$this->Dob->AdvancedSearch->save(); // Dob
			$this->Currency->AdvancedSearch->save(); // Currency
			$this->DiscountRemarks->AdvancedSearch->save(); // DiscountRemarks
			$this->Remarks->AdvancedSearch->save(); // Remarks
			$this->PatId->AdvancedSearch->save(); // PatId
			$this->DrDepartment->AdvancedSearch->save(); // DrDepartment
			$this->RefferedBy->AdvancedSearch->save(); // RefferedBy
			$this->BillNumber->AdvancedSearch->save(); // BillNumber
			$this->CardNumber->AdvancedSearch->save(); // CardNumber
			$this->BankName->AdvancedSearch->save(); // BankName
			$this->DrID->AdvancedSearch->save(); // DrID
			$this->LabTestReleased->AdvancedSearch->save(); // LabTestReleased
			$this->BillStatus->AdvancedSearch->save(); // BillStatus
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
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IP_OP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationStatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationRemarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationBatchNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationDate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PayerType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Dob, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LabTestReleased, $arKeywords, $type);
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
		if ($this->SID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reception->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mrnno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Mobile->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IP_OP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Doctor->AdvancedSearch->issetSession())
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
		if ($this->RealizationAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RealizationStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RealizationRemarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RealizationBatchNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RealizationDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RIDNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TidNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PartnerName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PayerType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dob->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Currency->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DiscountRemarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Remarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrDepartment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RefferedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CardNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BankName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LabTestReleased->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillStatus->AdvancedSearch->issetSession())
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
		$this->SID->AdvancedSearch->unsetSession();
		$this->Reception->AdvancedSearch->unsetSession();
		$this->PatientId->AdvancedSearch->unsetSession();
		$this->mrnno->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->Gender->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->Mobile->AdvancedSearch->unsetSession();
		$this->IP_OP->AdvancedSearch->unsetSession();
		$this->Doctor->AdvancedSearch->unsetSession();
		$this->voucher_type->AdvancedSearch->unsetSession();
		$this->Details->AdvancedSearch->unsetSession();
		$this->ModeofPayment->AdvancedSearch->unsetSession();
		$this->Amount->AdvancedSearch->unsetSession();
		$this->AnyDues->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->RealizationAmount->AdvancedSearch->unsetSession();
		$this->RealizationStatus->AdvancedSearch->unsetSession();
		$this->RealizationRemarks->AdvancedSearch->unsetSession();
		$this->RealizationBatchNo->AdvancedSearch->unsetSession();
		$this->RealizationDate->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->RIDNO->AdvancedSearch->unsetSession();
		$this->TidNo->AdvancedSearch->unsetSession();
		$this->CId->AdvancedSearch->unsetSession();
		$this->PartnerName->AdvancedSearch->unsetSession();
		$this->PayerType->AdvancedSearch->unsetSession();
		$this->Dob->AdvancedSearch->unsetSession();
		$this->Currency->AdvancedSearch->unsetSession();
		$this->DiscountRemarks->AdvancedSearch->unsetSession();
		$this->Remarks->AdvancedSearch->unsetSession();
		$this->PatId->AdvancedSearch->unsetSession();
		$this->DrDepartment->AdvancedSearch->unsetSession();
		$this->RefferedBy->AdvancedSearch->unsetSession();
		$this->BillNumber->AdvancedSearch->unsetSession();
		$this->CardNumber->AdvancedSearch->unsetSession();
		$this->BankName->AdvancedSearch->unsetSession();
		$this->DrID->AdvancedSearch->unsetSession();
		$this->LabTestReleased->AdvancedSearch->unsetSession();
		$this->BillStatus->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->SID->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->IP_OP->AdvancedSearch->load();
		$this->Doctor->AdvancedSearch->load();
		$this->voucher_type->AdvancedSearch->load();
		$this->Details->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->AnyDues->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->RealizationAmount->AdvancedSearch->load();
		$this->RealizationStatus->AdvancedSearch->load();
		$this->RealizationRemarks->AdvancedSearch->load();
		$this->RealizationBatchNo->AdvancedSearch->load();
		$this->RealizationDate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PayerType->AdvancedSearch->load();
		$this->Dob->AdvancedSearch->load();
		$this->Currency->AdvancedSearch->load();
		$this->DiscountRemarks->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->PatId->AdvancedSearch->load();
		$this->DrDepartment->AdvancedSearch->load();
		$this->RefferedBy->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->LabTestReleased->AdvancedSearch->load();
		$this->BillStatus->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->SID); // SID
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Gender); // Gender
			$this->updateSort($this->Mobile); // Mobile
			$this->updateSort($this->Doctor); // Doctor
			$this->updateSort($this->ModeofPayment); // ModeofPayment
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->PartnerName); // PartnerName
			$this->updateSort($this->PatId); // PatId
			$this->updateSort($this->DrDepartment); // DrDepartment
			$this->updateSort($this->RefferedBy); // RefferedBy
			$this->updateSort($this->BillNumber); // BillNumber
			$this->updateSort($this->LabTestReleased); // LabTestReleased
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
				$this->SID->setSort("");
				$this->PatientId->setSort("");
				$this->PatientName->setSort("");
				$this->Gender->setSort("");
				$this->Mobile->setSort("");
				$this->Doctor->setSort("");
				$this->ModeofPayment->setSort("");
				$this->Amount->setSort("");
				$this->HospID->setSort("");
				$this->RIDNO->setSort("");
				$this->PartnerName->setSort("");
				$this->PatId->setSort("");
				$this->DrDepartment->setSort("");
				$this->RefferedBy->setSort("");
				$this->BillNumber->setSort("");
				$this->LabTestReleased->setSort("");
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

		// "detail_view_lab_resultreleasedd"
		$item = &$this->ListOptions->add("detail_view_lab_resultreleasedd");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'view_lab_resultreleasedd') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["view_lab_resultreleasedd_grid"]))
			$GLOBALS["view_lab_resultreleasedd_grid"] = new view_lab_resultreleasedd_grid();

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
		$pages->add("view_lab_resultreleasedd");
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

		// "detail_view_lab_resultreleasedd"
		$opt = &$this->ListOptions->Items["detail_view_lab_resultreleasedd"];
		if ($Security->allowList(CurrentProjectID() . 'view_lab_resultreleasedd')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("view_lab_resultreleasedd", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("view_lab_resultreleaseddlist.php?" . TABLE_SHOW_MASTER . "=view_lab_servicess&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["view_lab_resultreleasedd_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_lab_resultreleasedd')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=view_lab_resultreleasedd");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "view_lab_resultreleasedd";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_lab_servicesslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_lab_servicesslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_lab_servicesslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_lab_servicesslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_lab_servicesssrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_lab_servicess\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_lab_servicesssrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_lab_servicesslistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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
		$links = "";
		$btngrps = "";
		$sqlwrk = "`Vid`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_view_lab_resultreleasedd"
		if ($this->DetailPages->Items["view_lab_resultreleasedd"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_view_lab_resultreleasedd"];
			$url = "view_lab_resultreleaseddpreview.php?t=view_lab_servicess&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"view_lab_resultreleasedd\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'view_lab_resultreleasedd')) {
				$label = $Language->TablePhrase("view_lab_resultreleasedd", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_lab_resultreleasedd\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("view_lab_resultreleaseddlist.php?" . TABLE_SHOW_MASTER . "=view_lab_servicess&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_lab_resultreleasedd", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["view_lab_resultreleasedd_grid"]))
				$GLOBALS["view_lab_resultreleasedd_grid"] = new view_lab_resultreleasedd_grid();
			if ($GLOBALS["view_lab_resultreleasedd_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_lab_resultreleasedd')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=view_lab_resultreleasedd");
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

		// SID
		if (!$this->isAddOrEdit())
			$this->SID->AdvancedSearch->setSearchValue(Get("x_SID", Get("SID", "")));
		if ($this->SID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SID->AdvancedSearch->setSearchOperator(Get("z_SID", ""));

		// Reception
		if (!$this->isAddOrEdit())
			$this->Reception->AdvancedSearch->setSearchValue(Get("x_Reception", Get("Reception", "")));
		if ($this->Reception->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Reception->AdvancedSearch->setSearchOperator(Get("z_Reception", ""));

		// PatientId
		if (!$this->isAddOrEdit())
			$this->PatientId->AdvancedSearch->setSearchValue(Get("x_PatientId", Get("PatientId", "")));
		if ($this->PatientId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientId->AdvancedSearch->setSearchOperator(Get("z_PatientId", ""));

		// mrnno
		if (!$this->isAddOrEdit())
			$this->mrnno->AdvancedSearch->setSearchValue(Get("x_mrnno", Get("mrnno", "")));
		if ($this->mrnno->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->mrnno->AdvancedSearch->setSearchOperator(Get("z_mrnno", ""));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue(Get("x_PatientName", Get("PatientName", "")));
		if ($this->PatientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientName->AdvancedSearch->setSearchOperator(Get("z_PatientName", ""));

		// Age
		if (!$this->isAddOrEdit())
			$this->Age->AdvancedSearch->setSearchValue(Get("x_Age", Get("Age", "")));
		if ($this->Age->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Age->AdvancedSearch->setSearchOperator(Get("z_Age", ""));

		// Gender
		if (!$this->isAddOrEdit())
			$this->Gender->AdvancedSearch->setSearchValue(Get("x_Gender", Get("Gender", "")));
		if ($this->Gender->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Gender->AdvancedSearch->setSearchOperator(Get("z_Gender", ""));

		// profilePic
		if (!$this->isAddOrEdit())
			$this->profilePic->AdvancedSearch->setSearchValue(Get("x_profilePic", Get("profilePic", "")));
		if ($this->profilePic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->profilePic->AdvancedSearch->setSearchOperator(Get("z_profilePic", ""));

		// Mobile
		if (!$this->isAddOrEdit())
			$this->Mobile->AdvancedSearch->setSearchValue(Get("x_Mobile", Get("Mobile", "")));
		if ($this->Mobile->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Mobile->AdvancedSearch->setSearchOperator(Get("z_Mobile", ""));

		// IP_OP
		if (!$this->isAddOrEdit())
			$this->IP_OP->AdvancedSearch->setSearchValue(Get("x_IP_OP", Get("IP_OP", "")));
		if ($this->IP_OP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IP_OP->AdvancedSearch->setSearchOperator(Get("z_IP_OP", ""));

		// Doctor
		if (!$this->isAddOrEdit())
			$this->Doctor->AdvancedSearch->setSearchValue(Get("x_Doctor", Get("Doctor", "")));
		if ($this->Doctor->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Doctor->AdvancedSearch->setSearchOperator(Get("z_Doctor", ""));

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

		// RealizationAmount
		if (!$this->isAddOrEdit())
			$this->RealizationAmount->AdvancedSearch->setSearchValue(Get("x_RealizationAmount", Get("RealizationAmount", "")));
		if ($this->RealizationAmount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RealizationAmount->AdvancedSearch->setSearchOperator(Get("z_RealizationAmount", ""));

		// RealizationStatus
		if (!$this->isAddOrEdit())
			$this->RealizationStatus->AdvancedSearch->setSearchValue(Get("x_RealizationStatus", Get("RealizationStatus", "")));
		if ($this->RealizationStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RealizationStatus->AdvancedSearch->setSearchOperator(Get("z_RealizationStatus", ""));

		// RealizationRemarks
		if (!$this->isAddOrEdit())
			$this->RealizationRemarks->AdvancedSearch->setSearchValue(Get("x_RealizationRemarks", Get("RealizationRemarks", "")));
		if ($this->RealizationRemarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RealizationRemarks->AdvancedSearch->setSearchOperator(Get("z_RealizationRemarks", ""));

		// RealizationBatchNo
		if (!$this->isAddOrEdit())
			$this->RealizationBatchNo->AdvancedSearch->setSearchValue(Get("x_RealizationBatchNo", Get("RealizationBatchNo", "")));
		if ($this->RealizationBatchNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RealizationBatchNo->AdvancedSearch->setSearchOperator(Get("z_RealizationBatchNo", ""));

		// RealizationDate
		if (!$this->isAddOrEdit())
			$this->RealizationDate->AdvancedSearch->setSearchValue(Get("x_RealizationDate", Get("RealizationDate", "")));
		if ($this->RealizationDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RealizationDate->AdvancedSearch->setSearchOperator(Get("z_RealizationDate", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// RIDNO
		if (!$this->isAddOrEdit())
			$this->RIDNO->AdvancedSearch->setSearchValue(Get("x_RIDNO", Get("RIDNO", "")));
		if ($this->RIDNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RIDNO->AdvancedSearch->setSearchOperator(Get("z_RIDNO", ""));

		// TidNo
		if (!$this->isAddOrEdit())
			$this->TidNo->AdvancedSearch->setSearchValue(Get("x_TidNo", Get("TidNo", "")));
		if ($this->TidNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TidNo->AdvancedSearch->setSearchOperator(Get("z_TidNo", ""));

		// CId
		if (!$this->isAddOrEdit())
			$this->CId->AdvancedSearch->setSearchValue(Get("x_CId", Get("CId", "")));
		if ($this->CId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CId->AdvancedSearch->setSearchOperator(Get("z_CId", ""));

		// PartnerName
		if (!$this->isAddOrEdit())
			$this->PartnerName->AdvancedSearch->setSearchValue(Get("x_PartnerName", Get("PartnerName", "")));
		if ($this->PartnerName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PartnerName->AdvancedSearch->setSearchOperator(Get("z_PartnerName", ""));

		// PayerType
		if (!$this->isAddOrEdit())
			$this->PayerType->AdvancedSearch->setSearchValue(Get("x_PayerType", Get("PayerType", "")));
		if ($this->PayerType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PayerType->AdvancedSearch->setSearchOperator(Get("z_PayerType", ""));

		// Dob
		if (!$this->isAddOrEdit())
			$this->Dob->AdvancedSearch->setSearchValue(Get("x_Dob", Get("Dob", "")));
		if ($this->Dob->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Dob->AdvancedSearch->setSearchOperator(Get("z_Dob", ""));

		// Currency
		if (!$this->isAddOrEdit())
			$this->Currency->AdvancedSearch->setSearchValue(Get("x_Currency", Get("Currency", "")));
		if ($this->Currency->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Currency->AdvancedSearch->setSearchOperator(Get("z_Currency", ""));

		// DiscountRemarks
		if (!$this->isAddOrEdit())
			$this->DiscountRemarks->AdvancedSearch->setSearchValue(Get("x_DiscountRemarks", Get("DiscountRemarks", "")));
		if ($this->DiscountRemarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DiscountRemarks->AdvancedSearch->setSearchOperator(Get("z_DiscountRemarks", ""));

		// Remarks
		if (!$this->isAddOrEdit())
			$this->Remarks->AdvancedSearch->setSearchValue(Get("x_Remarks", Get("Remarks", "")));
		if ($this->Remarks->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Remarks->AdvancedSearch->setSearchOperator(Get("z_Remarks", ""));

		// PatId
		if (!$this->isAddOrEdit())
			$this->PatId->AdvancedSearch->setSearchValue(Get("x_PatId", Get("PatId", "")));
		if ($this->PatId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatId->AdvancedSearch->setSearchOperator(Get("z_PatId", ""));

		// DrDepartment
		if (!$this->isAddOrEdit())
			$this->DrDepartment->AdvancedSearch->setSearchValue(Get("x_DrDepartment", Get("DrDepartment", "")));
		if ($this->DrDepartment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DrDepartment->AdvancedSearch->setSearchOperator(Get("z_DrDepartment", ""));

		// RefferedBy
		if (!$this->isAddOrEdit())
			$this->RefferedBy->AdvancedSearch->setSearchValue(Get("x_RefferedBy", Get("RefferedBy", "")));
		if ($this->RefferedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RefferedBy->AdvancedSearch->setSearchOperator(Get("z_RefferedBy", ""));

		// BillNumber
		if (!$this->isAddOrEdit())
			$this->BillNumber->AdvancedSearch->setSearchValue(Get("x_BillNumber", Get("BillNumber", "")));
		if ($this->BillNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillNumber->AdvancedSearch->setSearchOperator(Get("z_BillNumber", ""));

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

		// DrID
		if (!$this->isAddOrEdit())
			$this->DrID->AdvancedSearch->setSearchValue(Get("x_DrID", Get("DrID", "")));
		if ($this->DrID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DrID->AdvancedSearch->setSearchOperator(Get("z_DrID", ""));

		// LabTestReleased
		if (!$this->isAddOrEdit())
			$this->LabTestReleased->AdvancedSearch->setSearchValue(Get("x_LabTestReleased", Get("LabTestReleased", "")));
		if ($this->LabTestReleased->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LabTestReleased->AdvancedSearch->setSearchOperator(Get("z_LabTestReleased", ""));

		// BillStatus
		if (!$this->isAddOrEdit())
			$this->BillStatus->AdvancedSearch->setSearchValue(Get("x_BillStatus", Get("BillStatus", "")));
		if ($this->BillStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillStatus->AdvancedSearch->setSearchOperator(Get("z_BillStatus", ""));
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
		$this->SID->setDbValue($row['SID']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->IP_OP->setDbValue($row['IP_OP']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->RealizationAmount->setDbValue($row['RealizationAmount']);
		$this->RealizationStatus->setDbValue($row['RealizationStatus']);
		$this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
		$this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
		$this->RealizationDate->setDbValue($row['RealizationDate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->CId->setDbValue($row['CId']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PayerType->setDbValue($row['PayerType']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Currency->setDbValue($row['Currency']);
		$this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->PatId->setDbValue($row['PatId']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->RefferedBy->setDbValue($row['RefferedBy']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->DrID->setDbValue($row['DrID']);
		$this->LabTestReleased->setDbValue($row['LabTestReleased']);
		$this->BillStatus->setDbValue($row['BillStatus']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['SID'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientId'] = NULL;
		$row['mrnno'] = NULL;
		$row['PatientName'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['Mobile'] = NULL;
		$row['IP_OP'] = NULL;
		$row['Doctor'] = NULL;
		$row['voucher_type'] = NULL;
		$row['Details'] = NULL;
		$row['ModeofPayment'] = NULL;
		$row['Amount'] = NULL;
		$row['AnyDues'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['RealizationAmount'] = NULL;
		$row['RealizationStatus'] = NULL;
		$row['RealizationRemarks'] = NULL;
		$row['RealizationBatchNo'] = NULL;
		$row['RealizationDate'] = NULL;
		$row['HospID'] = NULL;
		$row['RIDNO'] = NULL;
		$row['TidNo'] = NULL;
		$row['CId'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PayerType'] = NULL;
		$row['Dob'] = NULL;
		$row['Currency'] = NULL;
		$row['DiscountRemarks'] = NULL;
		$row['Remarks'] = NULL;
		$row['PatId'] = NULL;
		$row['DrDepartment'] = NULL;
		$row['RefferedBy'] = NULL;
		$row['BillNumber'] = NULL;
		$row['CardNumber'] = NULL;
		$row['BankName'] = NULL;
		$row['DrID'] = NULL;
		$row['LabTestReleased'] = NULL;
		$row['BillStatus'] = NULL;
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

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// SID
		// Reception
		// PatientId
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Mobile
		// IP_OP
		// Doctor
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// PatId
		// DrDepartment
		// RefferedBy
		// BillNumber
		// CardNumber
		// BankName
		// DrID
		// LabTestReleased
		// BillStatus

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// SID
			$this->SID->ViewValue = $this->SID->CurrentValue;
			$this->SID->ViewValue = FormatNumber($this->SID->ViewValue, 0, -2, -2, -2);
			$this->SID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal <> "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PatId
			$this->PatId->ViewValue = $this->PatId->CurrentValue;
			$this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
			$this->RefferedBy->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// LabTestReleased
			$this->LabTestReleased->ViewValue = $this->LabTestReleased->CurrentValue;
			$this->LabTestReleased->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// SID
			$this->SID->LinkCustomAttributes = "";
			$this->SID->HrefValue = "";
			$this->SID->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientId->ViewValue = $this->highlightValue($this->PatientId);

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientName->ViewValue = $this->highlightValue($this->PatientName);

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";
			if (!$this->isExport())
				$this->Gender->ViewValue = $this->highlightValue($this->Gender);

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";
			if (!$this->isExport())
				$this->Mobile->ViewValue = $this->highlightValue($this->Mobile);

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";
			if (!$this->isExport())
				$this->Doctor->ViewValue = $this->highlightValue($this->Doctor);

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";
			if (!$this->isExport())
				$this->ModeofPayment->ViewValue = $this->highlightValue($this->ModeofPayment);

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";
			if (!$this->isExport())
				$this->PartnerName->ViewValue = $this->highlightValue($this->PartnerName);

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";
			if (!$this->isExport())
				$this->DrDepartment->ViewValue = $this->highlightValue($this->DrDepartment);

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";
			$this->RefferedBy->TooltipValue = "";
			if (!$this->isExport())
				$this->RefferedBy->ViewValue = $this->highlightValue($this->RefferedBy);

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";
			if (!$this->isExport())
				$this->BillNumber->ViewValue = $this->highlightValue($this->BillNumber);

			// LabTestReleased
			$this->LabTestReleased->LinkCustomAttributes = "";
			$this->LabTestReleased->HrefValue = "";
			$this->LabTestReleased->TooltipValue = "";
			if (!$this->isExport())
				$this->LabTestReleased->ViewValue = $this->highlightValue($this->LabTestReleased);
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// SID
			$this->SID->EditAttrs["class"] = "form-control";
			$this->SID->EditCustomAttributes = "";
			$this->SID->EditValue = HtmlEncode($this->SID->AdvancedSearch->SearchValue);
			$this->SID->PlaceHolder = RemoveHtml($this->SID->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->AdvancedSearch->SearchValue = HtmlDecode($this->Doctor->AdvancedSearch->SearchValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->AdvancedSearch->SearchValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

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

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$curVal = trim(strval($this->HospID->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->lookupCacheOption($curVal);
			else
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->Lookup !== NULL && is_array($this->HospID->Lookup->Options) ? $curVal : NULL;
			if ($this->HospID->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HospID->EditValue = array_values($this->HospID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HospID->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HospID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->HospID->EditValue = $arwrk;
			}

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PatId
			$this->PatId->EditAttrs["class"] = "form-control";
			$this->PatId->EditCustomAttributes = "";
			$this->PatId->EditValue = HtmlEncode($this->PatId->AdvancedSearch->SearchValue);
			$this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

			// DrDepartment
			$this->DrDepartment->EditAttrs["class"] = "form-control";
			$this->DrDepartment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrDepartment->AdvancedSearch->SearchValue = HtmlDecode($this->DrDepartment->AdvancedSearch->SearchValue);
			$this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->AdvancedSearch->SearchValue);
			$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

			// RefferedBy
			$this->RefferedBy->EditAttrs["class"] = "form-control";
			$this->RefferedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RefferedBy->AdvancedSearch->SearchValue = HtmlDecode($this->RefferedBy->AdvancedSearch->SearchValue);
			$this->RefferedBy->EditValue = HtmlEncode($this->RefferedBy->AdvancedSearch->SearchValue);
			$this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// LabTestReleased
			$this->LabTestReleased->EditAttrs["class"] = "form-control";
			$this->LabTestReleased->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTestReleased->AdvancedSearch->SearchValue = HtmlDecode($this->LabTestReleased->AdvancedSearch->SearchValue);
			$this->LabTestReleased->EditValue = HtmlEncode($this->LabTestReleased->AdvancedSearch->SearchValue);
			$this->LabTestReleased->PlaceHolder = RemoveHtml($this->LabTestReleased->caption());
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
		$this->SID->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->IP_OP->AdvancedSearch->load();
		$this->Doctor->AdvancedSearch->load();
		$this->voucher_type->AdvancedSearch->load();
		$this->Details->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->AnyDues->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->RealizationAmount->AdvancedSearch->load();
		$this->RealizationStatus->AdvancedSearch->load();
		$this->RealizationRemarks->AdvancedSearch->load();
		$this->RealizationBatchNo->AdvancedSearch->load();
		$this->RealizationDate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PayerType->AdvancedSearch->load();
		$this->Dob->AdvancedSearch->load();
		$this->Currency->AdvancedSearch->load();
		$this->DiscountRemarks->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->PatId->AdvancedSearch->load();
		$this->DrDepartment->AdvancedSearch->load();
		$this->RefferedBy->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->LabTestReleased->AdvancedSearch->load();
		$this->BillStatus->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_lab_servicesslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_lab_servicesslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_lab_servicesslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_lab_servicess\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_lab_servicess',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_lab_servicesslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_HospID":
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
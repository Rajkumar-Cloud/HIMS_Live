<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_billing_voucher_list extends view_billing_voucher
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_billing_voucher';

	// Page object name
	public $PageObjName = "view_billing_voucher_list";

	// Grid form hidden field names
	public $FormName = "fview_billing_voucherlist";
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

		// Table object (view_billing_voucher)
		if (!isset($GLOBALS["view_billing_voucher"]) || get_class($GLOBALS["view_billing_voucher"]) == PROJECT_NAMESPACE . "view_billing_voucher") {
			$GLOBALS["view_billing_voucher"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_billing_voucher"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_billing_voucheradd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_billing_voucherdelete.php";
		$this->MultiUpdateUrl = "view_billing_voucherupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_billing_voucher');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_billing_voucherlistsrch";

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
		global $EXPORT, $view_billing_voucher;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_billing_voucher);
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
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->UserName->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdDatettime->Visible = FALSE;
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
		$this->createddatetime->setVisibility();
		$this->BillNumber->setVisibility();
		$this->Reception->Visible = FALSE;
		$this->PatientId->setVisibility();
		$this->mrnno->Visible = FALSE;
		$this->PatientName->setVisibility();
		$this->Age->Visible = FALSE;
		$this->Gender->Visible = FALSE;
		$this->profilePic->Visible = FALSE;
		$this->Mobile->setVisibility();
		$this->IP_OP->Visible = FALSE;
		$this->Doctor->setVisibility();
		$this->voucher_type->Visible = FALSE;
		$this->Details->Visible = FALSE;
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->Visible = FALSE;
		$this->DiscountAmount->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->RealizationAmount->Visible = FALSE;
		$this->RealizationStatus->Visible = FALSE;
		$this->RealizationRemarks->Visible = FALSE;
		$this->RealizationBatchNo->Visible = FALSE;
		$this->RealizationDate->Visible = FALSE;
		$this->HospID->Visible = FALSE;
		$this->RIDNO->Visible = FALSE;
		$this->TidNo->Visible = FALSE;
		$this->CId->Visible = FALSE;
		$this->PartnerName->Visible = FALSE;
		$this->PayerType->Visible = FALSE;
		$this->Dob->Visible = FALSE;
		$this->Currency->Visible = FALSE;
		$this->DiscountRemarks->Visible = FALSE;
		$this->Remarks->Visible = FALSE;
		$this->PatId->Visible = FALSE;
		$this->DrDepartment->Visible = FALSE;
		$this->RefferedBy->Visible = FALSE;
		$this->CardNumber->Visible = FALSE;
		$this->BankName->setVisibility();
		$this->DrID->Visible = FALSE;
		$this->BillStatus->Visible = FALSE;
		$this->ReportHeader->Visible = FALSE;
		$this->UserName->setVisibility();
		$this->AdjustmentAdvance->Visible = FALSE;
		$this->billing_vouchercol->Visible = FALSE;
		$this->BillType->setVisibility();
		$this->ProcedureName->Visible = FALSE;
		$this->ProcedureAmount->Visible = FALSE;
		$this->IncludePackage->Visible = FALSE;
		$this->CancelBill->setVisibility();
		$this->CancelReason->Visible = FALSE;
		$this->CancelModeOfPayment->Visible = FALSE;
		$this->CancelAmount->Visible = FALSE;
		$this->CancelBankName->Visible = FALSE;
		$this->CancelTransactionNumber->Visible = FALSE;
		$this->LabTest->setVisibility();
		$this->sid->setVisibility();
		$this->SidNo->setVisibility();
		$this->createdDatettime->setVisibility();
		$this->BillClosing->Visible = FALSE;
		$this->GoogleReviewID->setVisibility();
		$this->CardType->setVisibility();
		$this->PharmacyBill->setVisibility();
		$this->cash->setVisibility();
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
		$this->setupLookupOptions($this->Reception);
		$this->setupLookupOptions($this->ModeofPayment);
		$this->setupLookupOptions($this->CId);
		$this->setupLookupOptions($this->PatId);
		$this->setupLookupOptions($this->RefferedBy);
		$this->setupLookupOptions($this->DrID);

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
		$this->Amount->FormValue = ""; // Clear form value
		$this->DiscountAmount->FormValue = ""; // Clear form value
		$this->cash->FormValue = ""; // Clear form value
		$this->Card->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue <> $this->createddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillNumber") && $CurrentForm->hasValue("o_BillNumber") && $this->BillNumber->CurrentValue <> $this->BillNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue <> $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue <> $this->Mobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Doctor") && $CurrentForm->hasValue("o_Doctor") && $this->Doctor->CurrentValue <> $this->Doctor->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue <> $this->ModeofPayment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue <> $this->Amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DiscountAmount") && $CurrentForm->hasValue("o_DiscountAmount") && $this->DiscountAmount->CurrentValue <> $this->DiscountAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BankName") && $CurrentForm->hasValue("o_BankName") && $this->BankName->CurrentValue <> $this->BankName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillType") && $CurrentForm->hasValue("o_BillType") && $this->BillType->CurrentValue <> $this->BillType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CancelBill") && $CurrentForm->hasValue("o_CancelBill") && $this->CancelBill->CurrentValue <> $this->CancelBill->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LabTest") && $CurrentForm->hasValue("o_LabTest") && $this->LabTest->CurrentValue <> $this->LabTest->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue <> $this->sid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SidNo") && $CurrentForm->hasValue("o_SidNo") && $this->SidNo->CurrentValue <> $this->SidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GoogleReviewID") && $CurrentForm->hasValue("o_GoogleReviewID") && $this->GoogleReviewID->CurrentValue <> $this->GoogleReviewID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CardType") && $CurrentForm->hasValue("o_CardType") && $this->CardType->CurrentValue <> $this->CardType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PharmacyBill") && $CurrentForm->hasValue("o_PharmacyBill") && $this->PharmacyBill->CurrentValue <> $this->PharmacyBill->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_cash") && $CurrentForm->hasValue("o_cash") && $this->cash->CurrentValue <> $this->cash->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_billing_voucherlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
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
		$filterList = Concat($filterList, $this->DiscountAmount->AdvancedSearch->toJson(), ","); // Field DiscountAmount
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
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
		$filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
		$filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
		$filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
		$filterList = Concat($filterList, $this->BillStatus->AdvancedSearch->toJson(), ","); // Field BillStatus
		$filterList = Concat($filterList, $this->ReportHeader->AdvancedSearch->toJson(), ","); // Field ReportHeader
		$filterList = Concat($filterList, $this->UserName->AdvancedSearch->toJson(), ","); // Field UserName
		$filterList = Concat($filterList, $this->AdjustmentAdvance->AdvancedSearch->toJson(), ","); // Field AdjustmentAdvance
		$filterList = Concat($filterList, $this->billing_vouchercol->AdvancedSearch->toJson(), ","); // Field billing_vouchercol
		$filterList = Concat($filterList, $this->BillType->AdvancedSearch->toJson(), ","); // Field BillType
		$filterList = Concat($filterList, $this->ProcedureName->AdvancedSearch->toJson(), ","); // Field ProcedureName
		$filterList = Concat($filterList, $this->ProcedureAmount->AdvancedSearch->toJson(), ","); // Field ProcedureAmount
		$filterList = Concat($filterList, $this->IncludePackage->AdvancedSearch->toJson(), ","); // Field IncludePackage
		$filterList = Concat($filterList, $this->CancelBill->AdvancedSearch->toJson(), ","); // Field CancelBill
		$filterList = Concat($filterList, $this->CancelReason->AdvancedSearch->toJson(), ","); // Field CancelReason
		$filterList = Concat($filterList, $this->CancelModeOfPayment->AdvancedSearch->toJson(), ","); // Field CancelModeOfPayment
		$filterList = Concat($filterList, $this->CancelAmount->AdvancedSearch->toJson(), ","); // Field CancelAmount
		$filterList = Concat($filterList, $this->CancelBankName->AdvancedSearch->toJson(), ","); // Field CancelBankName
		$filterList = Concat($filterList, $this->CancelTransactionNumber->AdvancedSearch->toJson(), ","); // Field CancelTransactionNumber
		$filterList = Concat($filterList, $this->LabTest->AdvancedSearch->toJson(), ","); // Field LabTest
		$filterList = Concat($filterList, $this->sid->AdvancedSearch->toJson(), ","); // Field sid
		$filterList = Concat($filterList, $this->SidNo->AdvancedSearch->toJson(), ","); // Field SidNo
		$filterList = Concat($filterList, $this->createdDatettime->AdvancedSearch->toJson(), ","); // Field createdDatettime
		$filterList = Concat($filterList, $this->BillClosing->AdvancedSearch->toJson(), ","); // Field BillClosing
		$filterList = Concat($filterList, $this->GoogleReviewID->AdvancedSearch->toJson(), ","); // Field GoogleReviewID
		$filterList = Concat($filterList, $this->CardType->AdvancedSearch->toJson(), ","); // Field CardType
		$filterList = Concat($filterList, $this->PharmacyBill->AdvancedSearch->toJson(), ","); // Field PharmacyBill
		$filterList = Concat($filterList, $this->cash->AdvancedSearch->toJson(), ","); // Field cash
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_billing_voucherlistsrch", $filters);
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

		// Field createddatetime
		$this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
		$this->createddatetime->AdvancedSearch->save();

		// Field BillNumber
		$this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
		$this->BillNumber->AdvancedSearch->save();

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

		// Field DiscountAmount
		$this->DiscountAmount->AdvancedSearch->SearchValue = @$filter["x_DiscountAmount"];
		$this->DiscountAmount->AdvancedSearch->SearchOperator = @$filter["z_DiscountAmount"];
		$this->DiscountAmount->AdvancedSearch->SearchCondition = @$filter["v_DiscountAmount"];
		$this->DiscountAmount->AdvancedSearch->SearchValue2 = @$filter["y_DiscountAmount"];
		$this->DiscountAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountAmount"];
		$this->DiscountAmount->AdvancedSearch->save();

		// Field createdby
		$this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
		$this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
		$this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
		$this->createdby->AdvancedSearch->save();

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

		// Field BillStatus
		$this->BillStatus->AdvancedSearch->SearchValue = @$filter["x_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator = @$filter["z_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchCondition = @$filter["v_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchValue2 = @$filter["y_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator2 = @$filter["w_BillStatus"];
		$this->BillStatus->AdvancedSearch->save();

		// Field ReportHeader
		$this->ReportHeader->AdvancedSearch->SearchValue = @$filter["x_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchOperator = @$filter["z_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchCondition = @$filter["v_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchValue2 = @$filter["y_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchOperator2 = @$filter["w_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->save();

		// Field UserName
		$this->UserName->AdvancedSearch->SearchValue = @$filter["x_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator = @$filter["z_UserName"];
		$this->UserName->AdvancedSearch->SearchCondition = @$filter["v_UserName"];
		$this->UserName->AdvancedSearch->SearchValue2 = @$filter["y_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator2 = @$filter["w_UserName"];
		$this->UserName->AdvancedSearch->save();

		// Field AdjustmentAdvance
		$this->AdjustmentAdvance->AdvancedSearch->SearchValue = @$filter["x_AdjustmentAdvance"];
		$this->AdjustmentAdvance->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentAdvance"];
		$this->AdjustmentAdvance->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentAdvance"];
		$this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentAdvance"];
		$this->AdjustmentAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentAdvance"];
		$this->AdjustmentAdvance->AdvancedSearch->save();

		// Field billing_vouchercol
		$this->billing_vouchercol->AdvancedSearch->SearchValue = @$filter["x_billing_vouchercol"];
		$this->billing_vouchercol->AdvancedSearch->SearchOperator = @$filter["z_billing_vouchercol"];
		$this->billing_vouchercol->AdvancedSearch->SearchCondition = @$filter["v_billing_vouchercol"];
		$this->billing_vouchercol->AdvancedSearch->SearchValue2 = @$filter["y_billing_vouchercol"];
		$this->billing_vouchercol->AdvancedSearch->SearchOperator2 = @$filter["w_billing_vouchercol"];
		$this->billing_vouchercol->AdvancedSearch->save();

		// Field BillType
		$this->BillType->AdvancedSearch->SearchValue = @$filter["x_BillType"];
		$this->BillType->AdvancedSearch->SearchOperator = @$filter["z_BillType"];
		$this->BillType->AdvancedSearch->SearchCondition = @$filter["v_BillType"];
		$this->BillType->AdvancedSearch->SearchValue2 = @$filter["y_BillType"];
		$this->BillType->AdvancedSearch->SearchOperator2 = @$filter["w_BillType"];
		$this->BillType->AdvancedSearch->save();

		// Field ProcedureName
		$this->ProcedureName->AdvancedSearch->SearchValue = @$filter["x_ProcedureName"];
		$this->ProcedureName->AdvancedSearch->SearchOperator = @$filter["z_ProcedureName"];
		$this->ProcedureName->AdvancedSearch->SearchCondition = @$filter["v_ProcedureName"];
		$this->ProcedureName->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureName"];
		$this->ProcedureName->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureName"];
		$this->ProcedureName->AdvancedSearch->save();

		// Field ProcedureAmount
		$this->ProcedureAmount->AdvancedSearch->SearchValue = @$filter["x_ProcedureAmount"];
		$this->ProcedureAmount->AdvancedSearch->SearchOperator = @$filter["z_ProcedureAmount"];
		$this->ProcedureAmount->AdvancedSearch->SearchCondition = @$filter["v_ProcedureAmount"];
		$this->ProcedureAmount->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureAmount"];
		$this->ProcedureAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureAmount"];
		$this->ProcedureAmount->AdvancedSearch->save();

		// Field IncludePackage
		$this->IncludePackage->AdvancedSearch->SearchValue = @$filter["x_IncludePackage"];
		$this->IncludePackage->AdvancedSearch->SearchOperator = @$filter["z_IncludePackage"];
		$this->IncludePackage->AdvancedSearch->SearchCondition = @$filter["v_IncludePackage"];
		$this->IncludePackage->AdvancedSearch->SearchValue2 = @$filter["y_IncludePackage"];
		$this->IncludePackage->AdvancedSearch->SearchOperator2 = @$filter["w_IncludePackage"];
		$this->IncludePackage->AdvancedSearch->save();

		// Field CancelBill
		$this->CancelBill->AdvancedSearch->SearchValue = @$filter["x_CancelBill"];
		$this->CancelBill->AdvancedSearch->SearchOperator = @$filter["z_CancelBill"];
		$this->CancelBill->AdvancedSearch->SearchCondition = @$filter["v_CancelBill"];
		$this->CancelBill->AdvancedSearch->SearchValue2 = @$filter["y_CancelBill"];
		$this->CancelBill->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBill"];
		$this->CancelBill->AdvancedSearch->save();

		// Field CancelReason
		$this->CancelReason->AdvancedSearch->SearchValue = @$filter["x_CancelReason"];
		$this->CancelReason->AdvancedSearch->SearchOperator = @$filter["z_CancelReason"];
		$this->CancelReason->AdvancedSearch->SearchCondition = @$filter["v_CancelReason"];
		$this->CancelReason->AdvancedSearch->SearchValue2 = @$filter["y_CancelReason"];
		$this->CancelReason->AdvancedSearch->SearchOperator2 = @$filter["w_CancelReason"];
		$this->CancelReason->AdvancedSearch->save();

		// Field CancelModeOfPayment
		$this->CancelModeOfPayment->AdvancedSearch->SearchValue = @$filter["x_CancelModeOfPayment"];
		$this->CancelModeOfPayment->AdvancedSearch->SearchOperator = @$filter["z_CancelModeOfPayment"];
		$this->CancelModeOfPayment->AdvancedSearch->SearchCondition = @$filter["v_CancelModeOfPayment"];
		$this->CancelModeOfPayment->AdvancedSearch->SearchValue2 = @$filter["y_CancelModeOfPayment"];
		$this->CancelModeOfPayment->AdvancedSearch->SearchOperator2 = @$filter["w_CancelModeOfPayment"];
		$this->CancelModeOfPayment->AdvancedSearch->save();

		// Field CancelAmount
		$this->CancelAmount->AdvancedSearch->SearchValue = @$filter["x_CancelAmount"];
		$this->CancelAmount->AdvancedSearch->SearchOperator = @$filter["z_CancelAmount"];
		$this->CancelAmount->AdvancedSearch->SearchCondition = @$filter["v_CancelAmount"];
		$this->CancelAmount->AdvancedSearch->SearchValue2 = @$filter["y_CancelAmount"];
		$this->CancelAmount->AdvancedSearch->SearchOperator2 = @$filter["w_CancelAmount"];
		$this->CancelAmount->AdvancedSearch->save();

		// Field CancelBankName
		$this->CancelBankName->AdvancedSearch->SearchValue = @$filter["x_CancelBankName"];
		$this->CancelBankName->AdvancedSearch->SearchOperator = @$filter["z_CancelBankName"];
		$this->CancelBankName->AdvancedSearch->SearchCondition = @$filter["v_CancelBankName"];
		$this->CancelBankName->AdvancedSearch->SearchValue2 = @$filter["y_CancelBankName"];
		$this->CancelBankName->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBankName"];
		$this->CancelBankName->AdvancedSearch->save();

		// Field CancelTransactionNumber
		$this->CancelTransactionNumber->AdvancedSearch->SearchValue = @$filter["x_CancelTransactionNumber"];
		$this->CancelTransactionNumber->AdvancedSearch->SearchOperator = @$filter["z_CancelTransactionNumber"];
		$this->CancelTransactionNumber->AdvancedSearch->SearchCondition = @$filter["v_CancelTransactionNumber"];
		$this->CancelTransactionNumber->AdvancedSearch->SearchValue2 = @$filter["y_CancelTransactionNumber"];
		$this->CancelTransactionNumber->AdvancedSearch->SearchOperator2 = @$filter["w_CancelTransactionNumber"];
		$this->CancelTransactionNumber->AdvancedSearch->save();

		// Field LabTest
		$this->LabTest->AdvancedSearch->SearchValue = @$filter["x_LabTest"];
		$this->LabTest->AdvancedSearch->SearchOperator = @$filter["z_LabTest"];
		$this->LabTest->AdvancedSearch->SearchCondition = @$filter["v_LabTest"];
		$this->LabTest->AdvancedSearch->SearchValue2 = @$filter["y_LabTest"];
		$this->LabTest->AdvancedSearch->SearchOperator2 = @$filter["w_LabTest"];
		$this->LabTest->AdvancedSearch->save();

		// Field sid
		$this->sid->AdvancedSearch->SearchValue = @$filter["x_sid"];
		$this->sid->AdvancedSearch->SearchOperator = @$filter["z_sid"];
		$this->sid->AdvancedSearch->SearchCondition = @$filter["v_sid"];
		$this->sid->AdvancedSearch->SearchValue2 = @$filter["y_sid"];
		$this->sid->AdvancedSearch->SearchOperator2 = @$filter["w_sid"];
		$this->sid->AdvancedSearch->save();

		// Field SidNo
		$this->SidNo->AdvancedSearch->SearchValue = @$filter["x_SidNo"];
		$this->SidNo->AdvancedSearch->SearchOperator = @$filter["z_SidNo"];
		$this->SidNo->AdvancedSearch->SearchCondition = @$filter["v_SidNo"];
		$this->SidNo->AdvancedSearch->SearchValue2 = @$filter["y_SidNo"];
		$this->SidNo->AdvancedSearch->SearchOperator2 = @$filter["w_SidNo"];
		$this->SidNo->AdvancedSearch->save();

		// Field createdDatettime
		$this->createdDatettime->AdvancedSearch->SearchValue = @$filter["x_createdDatettime"];
		$this->createdDatettime->AdvancedSearch->SearchOperator = @$filter["z_createdDatettime"];
		$this->createdDatettime->AdvancedSearch->SearchCondition = @$filter["v_createdDatettime"];
		$this->createdDatettime->AdvancedSearch->SearchValue2 = @$filter["y_createdDatettime"];
		$this->createdDatettime->AdvancedSearch->SearchOperator2 = @$filter["w_createdDatettime"];
		$this->createdDatettime->AdvancedSearch->save();

		// Field BillClosing
		$this->BillClosing->AdvancedSearch->SearchValue = @$filter["x_BillClosing"];
		$this->BillClosing->AdvancedSearch->SearchOperator = @$filter["z_BillClosing"];
		$this->BillClosing->AdvancedSearch->SearchCondition = @$filter["v_BillClosing"];
		$this->BillClosing->AdvancedSearch->SearchValue2 = @$filter["y_BillClosing"];
		$this->BillClosing->AdvancedSearch->SearchOperator2 = @$filter["w_BillClosing"];
		$this->BillClosing->AdvancedSearch->save();

		// Field GoogleReviewID
		$this->GoogleReviewID->AdvancedSearch->SearchValue = @$filter["x_GoogleReviewID"];
		$this->GoogleReviewID->AdvancedSearch->SearchOperator = @$filter["z_GoogleReviewID"];
		$this->GoogleReviewID->AdvancedSearch->SearchCondition = @$filter["v_GoogleReviewID"];
		$this->GoogleReviewID->AdvancedSearch->SearchValue2 = @$filter["y_GoogleReviewID"];
		$this->GoogleReviewID->AdvancedSearch->SearchOperator2 = @$filter["w_GoogleReviewID"];
		$this->GoogleReviewID->AdvancedSearch->save();

		// Field CardType
		$this->CardType->AdvancedSearch->SearchValue = @$filter["x_CardType"];
		$this->CardType->AdvancedSearch->SearchOperator = @$filter["z_CardType"];
		$this->CardType->AdvancedSearch->SearchCondition = @$filter["v_CardType"];
		$this->CardType->AdvancedSearch->SearchValue2 = @$filter["y_CardType"];
		$this->CardType->AdvancedSearch->SearchOperator2 = @$filter["w_CardType"];
		$this->CardType->AdvancedSearch->save();

		// Field PharmacyBill
		$this->PharmacyBill->AdvancedSearch->SearchValue = @$filter["x_PharmacyBill"];
		$this->PharmacyBill->AdvancedSearch->SearchOperator = @$filter["z_PharmacyBill"];
		$this->PharmacyBill->AdvancedSearch->SearchCondition = @$filter["v_PharmacyBill"];
		$this->PharmacyBill->AdvancedSearch->SearchValue2 = @$filter["y_PharmacyBill"];
		$this->PharmacyBill->AdvancedSearch->SearchOperator2 = @$filter["w_PharmacyBill"];
		$this->PharmacyBill->AdvancedSearch->save();

		// Field cash
		$this->cash->AdvancedSearch->SearchValue = @$filter["x_cash"];
		$this->cash->AdvancedSearch->SearchOperator = @$filter["z_cash"];
		$this->cash->AdvancedSearch->SearchCondition = @$filter["v_cash"];
		$this->cash->AdvancedSearch->SearchValue2 = @$filter["y_cash"];
		$this->cash->AdvancedSearch->SearchOperator2 = @$filter["w_cash"];
		$this->cash->AdvancedSearch->save();

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
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->BillNumber, $default, FALSE); // BillNumber
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
		$this->buildSearchSql($where, $this->DiscountAmount, $default, FALSE); // DiscountAmount
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
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
		$this->buildSearchSql($where, $this->CardNumber, $default, FALSE); // CardNumber
		$this->buildSearchSql($where, $this->BankName, $default, FALSE); // BankName
		$this->buildSearchSql($where, $this->DrID, $default, FALSE); // DrID
		$this->buildSearchSql($where, $this->BillStatus, $default, FALSE); // BillStatus
		$this->buildSearchSql($where, $this->ReportHeader, $default, TRUE); // ReportHeader
		$this->buildSearchSql($where, $this->UserName, $default, FALSE); // UserName
		$this->buildSearchSql($where, $this->AdjustmentAdvance, $default, TRUE); // AdjustmentAdvance
		$this->buildSearchSql($where, $this->billing_vouchercol, $default, FALSE); // billing_vouchercol
		$this->buildSearchSql($where, $this->BillType, $default, FALSE); // BillType
		$this->buildSearchSql($where, $this->ProcedureName, $default, FALSE); // ProcedureName
		$this->buildSearchSql($where, $this->ProcedureAmount, $default, FALSE); // ProcedureAmount
		$this->buildSearchSql($where, $this->IncludePackage, $default, TRUE); // IncludePackage
		$this->buildSearchSql($where, $this->CancelBill, $default, FALSE); // CancelBill
		$this->buildSearchSql($where, $this->CancelReason, $default, FALSE); // CancelReason
		$this->buildSearchSql($where, $this->CancelModeOfPayment, $default, FALSE); // CancelModeOfPayment
		$this->buildSearchSql($where, $this->CancelAmount, $default, FALSE); // CancelAmount
		$this->buildSearchSql($where, $this->CancelBankName, $default, FALSE); // CancelBankName
		$this->buildSearchSql($where, $this->CancelTransactionNumber, $default, FALSE); // CancelTransactionNumber
		$this->buildSearchSql($where, $this->LabTest, $default, FALSE); // LabTest
		$this->buildSearchSql($where, $this->sid, $default, FALSE); // sid
		$this->buildSearchSql($where, $this->SidNo, $default, FALSE); // SidNo
		$this->buildSearchSql($where, $this->createdDatettime, $default, FALSE); // createdDatettime
		$this->buildSearchSql($where, $this->BillClosing, $default, TRUE); // BillClosing
		$this->buildSearchSql($where, $this->GoogleReviewID, $default, TRUE); // GoogleReviewID
		$this->buildSearchSql($where, $this->CardType, $default, FALSE); // CardType
		$this->buildSearchSql($where, $this->PharmacyBill, $default, TRUE); // PharmacyBill
		$this->buildSearchSql($where, $this->cash, $default, FALSE); // cash
		$this->buildSearchSql($where, $this->Card, $default, FALSE); // Card

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->BillNumber->AdvancedSearch->save(); // BillNumber
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
			$this->DiscountAmount->AdvancedSearch->save(); // DiscountAmount
			$this->createdby->AdvancedSearch->save(); // createdby
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
			$this->CardNumber->AdvancedSearch->save(); // CardNumber
			$this->BankName->AdvancedSearch->save(); // BankName
			$this->DrID->AdvancedSearch->save(); // DrID
			$this->BillStatus->AdvancedSearch->save(); // BillStatus
			$this->ReportHeader->AdvancedSearch->save(); // ReportHeader
			$this->UserName->AdvancedSearch->save(); // UserName
			$this->AdjustmentAdvance->AdvancedSearch->save(); // AdjustmentAdvance
			$this->billing_vouchercol->AdvancedSearch->save(); // billing_vouchercol
			$this->BillType->AdvancedSearch->save(); // BillType
			$this->ProcedureName->AdvancedSearch->save(); // ProcedureName
			$this->ProcedureAmount->AdvancedSearch->save(); // ProcedureAmount
			$this->IncludePackage->AdvancedSearch->save(); // IncludePackage
			$this->CancelBill->AdvancedSearch->save(); // CancelBill
			$this->CancelReason->AdvancedSearch->save(); // CancelReason
			$this->CancelModeOfPayment->AdvancedSearch->save(); // CancelModeOfPayment
			$this->CancelAmount->AdvancedSearch->save(); // CancelAmount
			$this->CancelBankName->AdvancedSearch->save(); // CancelBankName
			$this->CancelTransactionNumber->AdvancedSearch->save(); // CancelTransactionNumber
			$this->LabTest->AdvancedSearch->save(); // LabTest
			$this->sid->AdvancedSearch->save(); // sid
			$this->SidNo->AdvancedSearch->save(); // SidNo
			$this->createdDatettime->AdvancedSearch->save(); // createdDatettime
			$this->BillClosing->AdvancedSearch->save(); // BillClosing
			$this->GoogleReviewID->AdvancedSearch->save(); // GoogleReviewID
			$this->CardType->AdvancedSearch->save(); // CardType
			$this->PharmacyBill->AdvancedSearch->save(); // PharmacyBill
			$this->cash->AdvancedSearch->save(); // cash
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
		$this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
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
		$this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReportHeader, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UserName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AdjustmentAdvance, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->billing_vouchercol, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BillType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProcedureName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IncludePackage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelBill, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelReason, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelModeOfPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelAmount, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelBankName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CancelTransactionNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LabTest, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SidNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BillClosing, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GoogleReviewID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CardType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PharmacyBill, $arKeywords, $type);
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
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillNumber->AdvancedSearch->issetSession())
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
		if ($this->DiscountAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
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
		if ($this->CardNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BankName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReportHeader->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UserName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdjustmentAdvance->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->billing_vouchercol->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProcedureName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProcedureAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IncludePackage->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelBill->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelReason->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelModeOfPayment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelBankName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CancelTransactionNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LabTest->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SidNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdDatettime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillClosing->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GoogleReviewID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CardType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PharmacyBill->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->cash->AdvancedSearch->issetSession())
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
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->BillNumber->AdvancedSearch->unsetSession();
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
		$this->DiscountAmount->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
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
		$this->CardNumber->AdvancedSearch->unsetSession();
		$this->BankName->AdvancedSearch->unsetSession();
		$this->DrID->AdvancedSearch->unsetSession();
		$this->BillStatus->AdvancedSearch->unsetSession();
		$this->ReportHeader->AdvancedSearch->unsetSession();
		$this->UserName->AdvancedSearch->unsetSession();
		$this->AdjustmentAdvance->AdvancedSearch->unsetSession();
		$this->billing_vouchercol->AdvancedSearch->unsetSession();
		$this->BillType->AdvancedSearch->unsetSession();
		$this->ProcedureName->AdvancedSearch->unsetSession();
		$this->ProcedureAmount->AdvancedSearch->unsetSession();
		$this->IncludePackage->AdvancedSearch->unsetSession();
		$this->CancelBill->AdvancedSearch->unsetSession();
		$this->CancelReason->AdvancedSearch->unsetSession();
		$this->CancelModeOfPayment->AdvancedSearch->unsetSession();
		$this->CancelAmount->AdvancedSearch->unsetSession();
		$this->CancelBankName->AdvancedSearch->unsetSession();
		$this->CancelTransactionNumber->AdvancedSearch->unsetSession();
		$this->LabTest->AdvancedSearch->unsetSession();
		$this->sid->AdvancedSearch->unsetSession();
		$this->SidNo->AdvancedSearch->unsetSession();
		$this->createdDatettime->AdvancedSearch->unsetSession();
		$this->BillClosing->AdvancedSearch->unsetSession();
		$this->GoogleReviewID->AdvancedSearch->unsetSession();
		$this->CardType->AdvancedSearch->unsetSession();
		$this->PharmacyBill->AdvancedSearch->unsetSession();
		$this->cash->AdvancedSearch->unsetSession();
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
		$this->createddatetime->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
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
		$this->DiscountAmount->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
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
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->BillStatus->AdvancedSearch->load();
		$this->ReportHeader->AdvancedSearch->load();
		$this->UserName->AdvancedSearch->load();
		$this->AdjustmentAdvance->AdvancedSearch->load();
		$this->billing_vouchercol->AdvancedSearch->load();
		$this->BillType->AdvancedSearch->load();
		$this->ProcedureName->AdvancedSearch->load();
		$this->ProcedureAmount->AdvancedSearch->load();
		$this->IncludePackage->AdvancedSearch->load();
		$this->CancelBill->AdvancedSearch->load();
		$this->CancelReason->AdvancedSearch->load();
		$this->CancelModeOfPayment->AdvancedSearch->load();
		$this->CancelAmount->AdvancedSearch->load();
		$this->CancelBankName->AdvancedSearch->load();
		$this->CancelTransactionNumber->AdvancedSearch->load();
		$this->LabTest->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->createdDatettime->AdvancedSearch->load();
		$this->BillClosing->AdvancedSearch->load();
		$this->GoogleReviewID->AdvancedSearch->load();
		$this->CardType->AdvancedSearch->load();
		$this->PharmacyBill->AdvancedSearch->load();
		$this->cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->BillNumber); // BillNumber
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Mobile); // Mobile
			$this->updateSort($this->Doctor); // Doctor
			$this->updateSort($this->ModeofPayment); // ModeofPayment
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->DiscountAmount); // DiscountAmount
			$this->updateSort($this->BankName); // BankName
			$this->updateSort($this->UserName); // UserName
			$this->updateSort($this->BillType); // BillType
			$this->updateSort($this->CancelBill); // CancelBill
			$this->updateSort($this->LabTest); // LabTest
			$this->updateSort($this->sid); // sid
			$this->updateSort($this->SidNo); // SidNo
			$this->updateSort($this->createdDatettime); // createdDatettime
			$this->updateSort($this->GoogleReviewID); // GoogleReviewID
			$this->updateSort($this->CardType); // CardType
			$this->updateSort($this->PharmacyBill); // PharmacyBill
			$this->updateSort($this->cash); // cash
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
				$this->createddatetime->setSort("");
				$this->BillNumber->setSort("");
				$this->PatientId->setSort("");
				$this->PatientName->setSort("");
				$this->Mobile->setSort("");
				$this->Doctor->setSort("");
				$this->ModeofPayment->setSort("");
				$this->Amount->setSort("");
				$this->DiscountAmount->setSort("");
				$this->BankName->setSort("");
				$this->UserName->setSort("");
				$this->BillType->setSort("");
				$this->CancelBill->setSort("");
				$this->LabTest->setSort("");
				$this->sid->setSort("");
				$this->SidNo->setSort("");
				$this->createdDatettime->setSort("");
				$this->GoogleReviewID->setSort("");
				$this->CardType->setSort("");
				$this->PharmacyBill->setSort("");
				$this->cash->setSort("");
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

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// "detail_view_patient_services"
		$item = &$this->ListOptions->add("detail_view_patient_services");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'view_patient_services') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["view_patient_services_grid"]))
			$GLOBALS["view_patient_services_grid"] = new view_patient_services_grid();

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
		$pages->add("view_patient_services");
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

		// "detail_view_patient_services"
		$opt = &$this->ListOptions->Items["detail_view_patient_services"];
		if ($Security->allowList(CurrentProjectID() . 'view_patient_services')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("view_patient_services", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("view_patient_serviceslist.php?" . TABLE_SHOW_MASTER . "=view_billing_voucher&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["view_patient_services_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_patient_services')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=view_patient_services");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "view_patient_services";
			}
			if ($GLOBALS["view_patient_services_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_patient_services')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=view_patient_services");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "view_patient_services";
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
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_view_patient_services");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=view_patient_services");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["view_patient_services"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["view_patient_services"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'view_patient_services') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "view_patient_services";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_billing_voucherlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_billing_voucherlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_billing_voucherlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_billing_voucherlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_billing_vouchersrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_billing_voucher\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_billing_vouchersrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_billing_voucherlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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

		// Column "detail_view_patient_services"
		if ($this->DetailPages->Items["view_patient_services"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_view_patient_services"];
			$url = "view_patient_servicespreview.php?t=view_billing_voucher&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"view_patient_services\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'view_patient_services')) {
				$label = $Language->TablePhrase("view_patient_services", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_patient_services\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("view_patient_serviceslist.php?" . TABLE_SHOW_MASTER . "=view_billing_voucher&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_patient_services", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["view_patient_services_grid"]))
				$GLOBALS["view_patient_services_grid"] = new view_patient_services_grid();
			if ($GLOBALS["view_patient_services_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_patient_services')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=view_patient_services");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["view_patient_services_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_patient_services')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=view_patient_services");
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->BillNumber->CurrentValue = NULL;
		$this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->IP_OP->CurrentValue = NULL;
		$this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
		$this->Doctor->CurrentValue = NULL;
		$this->Doctor->OldValue = $this->Doctor->CurrentValue;
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
		$this->DiscountAmount->CurrentValue = NULL;
		$this->DiscountAmount->OldValue = $this->DiscountAmount->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->RealizationAmount->CurrentValue = NULL;
		$this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationStatus->CurrentValue = NULL;
		$this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationRemarks->CurrentValue = NULL;
		$this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationBatchNo->CurrentValue = NULL;
		$this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationDate->CurrentValue = NULL;
		$this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->CId->CurrentValue = NULL;
		$this->CId->OldValue = $this->CId->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PayerType->CurrentValue = NULL;
		$this->PayerType->OldValue = $this->PayerType->CurrentValue;
		$this->Dob->CurrentValue = NULL;
		$this->Dob->OldValue = $this->Dob->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->DiscountRemarks->CurrentValue = NULL;
		$this->DiscountRemarks->OldValue = $this->DiscountRemarks->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->PatId->CurrentValue = NULL;
		$this->PatId->OldValue = $this->PatId->CurrentValue;
		$this->DrDepartment->CurrentValue = NULL;
		$this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
		$this->RefferedBy->CurrentValue = NULL;
		$this->RefferedBy->OldValue = $this->RefferedBy->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->BillStatus->CurrentValue = 0;
		$this->BillStatus->OldValue = $this->BillStatus->CurrentValue;
		$this->ReportHeader->CurrentValue = NULL;
		$this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
		$this->UserName->CurrentValue = NULL;
		$this->UserName->OldValue = $this->UserName->CurrentValue;
		$this->AdjustmentAdvance->CurrentValue = NULL;
		$this->AdjustmentAdvance->OldValue = $this->AdjustmentAdvance->CurrentValue;
		$this->billing_vouchercol->CurrentValue = NULL;
		$this->billing_vouchercol->OldValue = $this->billing_vouchercol->CurrentValue;
		$this->BillType->CurrentValue = "OP";
		$this->BillType->OldValue = $this->BillType->CurrentValue;
		$this->ProcedureName->CurrentValue = NULL;
		$this->ProcedureName->OldValue = $this->ProcedureName->CurrentValue;
		$this->ProcedureAmount->CurrentValue = NULL;
		$this->ProcedureAmount->OldValue = $this->ProcedureAmount->CurrentValue;
		$this->IncludePackage->CurrentValue = NULL;
		$this->IncludePackage->OldValue = $this->IncludePackage->CurrentValue;
		$this->CancelBill->CurrentValue = NULL;
		$this->CancelBill->OldValue = $this->CancelBill->CurrentValue;
		$this->CancelReason->CurrentValue = NULL;
		$this->CancelReason->OldValue = $this->CancelReason->CurrentValue;
		$this->CancelModeOfPayment->CurrentValue = NULL;
		$this->CancelModeOfPayment->OldValue = $this->CancelModeOfPayment->CurrentValue;
		$this->CancelAmount->CurrentValue = NULL;
		$this->CancelAmount->OldValue = $this->CancelAmount->CurrentValue;
		$this->CancelBankName->CurrentValue = NULL;
		$this->CancelBankName->OldValue = $this->CancelBankName->CurrentValue;
		$this->CancelTransactionNumber->CurrentValue = NULL;
		$this->CancelTransactionNumber->OldValue = $this->CancelTransactionNumber->CurrentValue;
		$this->LabTest->CurrentValue = NULL;
		$this->LabTest->OldValue = $this->LabTest->CurrentValue;
		$this->sid->CurrentValue = NULL;
		$this->sid->OldValue = $this->sid->CurrentValue;
		$this->SidNo->CurrentValue = NULL;
		$this->SidNo->OldValue = $this->SidNo->CurrentValue;
		$this->createdDatettime->CurrentValue = NULL;
		$this->createdDatettime->OldValue = $this->createdDatettime->CurrentValue;
		$this->BillClosing->CurrentValue = NULL;
		$this->BillClosing->OldValue = $this->BillClosing->CurrentValue;
		$this->GoogleReviewID->CurrentValue = NULL;
		$this->GoogleReviewID->OldValue = $this->GoogleReviewID->CurrentValue;
		$this->CardType->CurrentValue = NULL;
		$this->CardType->OldValue = $this->CardType->CurrentValue;
		$this->PharmacyBill->CurrentValue = NULL;
		$this->PharmacyBill->OldValue = $this->PharmacyBill->CurrentValue;
		$this->cash->CurrentValue = NULL;
		$this->cash->OldValue = $this->cash->CurrentValue;
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

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue(Get("x_createddatetime", Get("createddatetime", "")));
		if ($this->createddatetime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createddatetime->AdvancedSearch->setSearchOperator(Get("z_createddatetime", ""));
		$this->createddatetime->AdvancedSearch->setSearchCondition(Get("v_createddatetime", ""));
		$this->createddatetime->AdvancedSearch->setSearchValue2(Get("y_createddatetime", ""));
		if ($this->createddatetime->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createddatetime->AdvancedSearch->setSearchOperator2(Get("w_createddatetime", ""));

		// BillNumber
		if (!$this->isAddOrEdit())
			$this->BillNumber->AdvancedSearch->setSearchValue(Get("x_BillNumber", Get("BillNumber", "")));
		if ($this->BillNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillNumber->AdvancedSearch->setSearchOperator(Get("z_BillNumber", ""));

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

		// DiscountAmount
		if (!$this->isAddOrEdit())
			$this->DiscountAmount->AdvancedSearch->setSearchValue(Get("x_DiscountAmount", Get("DiscountAmount", "")));
		if ($this->DiscountAmount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DiscountAmount->AdvancedSearch->setSearchOperator(Get("z_DiscountAmount", ""));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue(Get("x_createdby", Get("createdby", "")));
		if ($this->createdby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdby->AdvancedSearch->setSearchOperator(Get("z_createdby", ""));

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

		// BillStatus
		if (!$this->isAddOrEdit())
			$this->BillStatus->AdvancedSearch->setSearchValue(Get("x_BillStatus", Get("BillStatus", "")));
		if ($this->BillStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillStatus->AdvancedSearch->setSearchOperator(Get("z_BillStatus", ""));

		// ReportHeader
		if (!$this->isAddOrEdit())
			$this->ReportHeader->AdvancedSearch->setSearchValue(Get("x_ReportHeader", Get("ReportHeader", "")));
		if ($this->ReportHeader->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ReportHeader->AdvancedSearch->setSearchOperator(Get("z_ReportHeader", ""));
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue))
			$this->ReportHeader->AdvancedSearch->SearchValue = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue);
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue2))
			$this->ReportHeader->AdvancedSearch->SearchValue2 = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue2);

		// UserName
		if (!$this->isAddOrEdit())
			$this->UserName->AdvancedSearch->setSearchValue(Get("x_UserName", Get("UserName", "")));
		if ($this->UserName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UserName->AdvancedSearch->setSearchOperator(Get("z_UserName", ""));

		// AdjustmentAdvance
		if (!$this->isAddOrEdit())
			$this->AdjustmentAdvance->AdvancedSearch->setSearchValue(Get("x_AdjustmentAdvance", Get("AdjustmentAdvance", "")));
		if ($this->AdjustmentAdvance->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdjustmentAdvance->AdvancedSearch->setSearchOperator(Get("z_AdjustmentAdvance", ""));
		if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue))
			$this->AdjustmentAdvance->AdvancedSearch->SearchValue = implode(",", $this->AdjustmentAdvance->AdvancedSearch->SearchValue);
		if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue2))
			$this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = implode(",", $this->AdjustmentAdvance->AdvancedSearch->SearchValue2);

		// billing_vouchercol
		if (!$this->isAddOrEdit())
			$this->billing_vouchercol->AdvancedSearch->setSearchValue(Get("x_billing_vouchercol", Get("billing_vouchercol", "")));
		if ($this->billing_vouchercol->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->billing_vouchercol->AdvancedSearch->setSearchOperator(Get("z_billing_vouchercol", ""));

		// BillType
		if (!$this->isAddOrEdit())
			$this->BillType->AdvancedSearch->setSearchValue(Get("x_BillType", Get("BillType", "")));
		if ($this->BillType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillType->AdvancedSearch->setSearchOperator(Get("z_BillType", ""));

		// ProcedureName
		if (!$this->isAddOrEdit())
			$this->ProcedureName->AdvancedSearch->setSearchValue(Get("x_ProcedureName", Get("ProcedureName", "")));
		if ($this->ProcedureName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ProcedureName->AdvancedSearch->setSearchOperator(Get("z_ProcedureName", ""));

		// ProcedureAmount
		if (!$this->isAddOrEdit())
			$this->ProcedureAmount->AdvancedSearch->setSearchValue(Get("x_ProcedureAmount", Get("ProcedureAmount", "")));
		if ($this->ProcedureAmount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ProcedureAmount->AdvancedSearch->setSearchOperator(Get("z_ProcedureAmount", ""));

		// IncludePackage
		if (!$this->isAddOrEdit())
			$this->IncludePackage->AdvancedSearch->setSearchValue(Get("x_IncludePackage", Get("IncludePackage", "")));
		if ($this->IncludePackage->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IncludePackage->AdvancedSearch->setSearchOperator(Get("z_IncludePackage", ""));
		if (is_array($this->IncludePackage->AdvancedSearch->SearchValue))
			$this->IncludePackage->AdvancedSearch->SearchValue = implode(",", $this->IncludePackage->AdvancedSearch->SearchValue);
		if (is_array($this->IncludePackage->AdvancedSearch->SearchValue2))
			$this->IncludePackage->AdvancedSearch->SearchValue2 = implode(",", $this->IncludePackage->AdvancedSearch->SearchValue2);

		// CancelBill
		if (!$this->isAddOrEdit())
			$this->CancelBill->AdvancedSearch->setSearchValue(Get("x_CancelBill", Get("CancelBill", "")));
		if ($this->CancelBill->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelBill->AdvancedSearch->setSearchOperator(Get("z_CancelBill", ""));

		// CancelReason
		if (!$this->isAddOrEdit())
			$this->CancelReason->AdvancedSearch->setSearchValue(Get("x_CancelReason", Get("CancelReason", "")));
		if ($this->CancelReason->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelReason->AdvancedSearch->setSearchOperator(Get("z_CancelReason", ""));

		// CancelModeOfPayment
		if (!$this->isAddOrEdit())
			$this->CancelModeOfPayment->AdvancedSearch->setSearchValue(Get("x_CancelModeOfPayment", Get("CancelModeOfPayment", "")));
		if ($this->CancelModeOfPayment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelModeOfPayment->AdvancedSearch->setSearchOperator(Get("z_CancelModeOfPayment", ""));

		// CancelAmount
		if (!$this->isAddOrEdit())
			$this->CancelAmount->AdvancedSearch->setSearchValue(Get("x_CancelAmount", Get("CancelAmount", "")));
		if ($this->CancelAmount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelAmount->AdvancedSearch->setSearchOperator(Get("z_CancelAmount", ""));

		// CancelBankName
		if (!$this->isAddOrEdit())
			$this->CancelBankName->AdvancedSearch->setSearchValue(Get("x_CancelBankName", Get("CancelBankName", "")));
		if ($this->CancelBankName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelBankName->AdvancedSearch->setSearchOperator(Get("z_CancelBankName", ""));

		// CancelTransactionNumber
		if (!$this->isAddOrEdit())
			$this->CancelTransactionNumber->AdvancedSearch->setSearchValue(Get("x_CancelTransactionNumber", Get("CancelTransactionNumber", "")));
		if ($this->CancelTransactionNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CancelTransactionNumber->AdvancedSearch->setSearchOperator(Get("z_CancelTransactionNumber", ""));

		// LabTest
		if (!$this->isAddOrEdit())
			$this->LabTest->AdvancedSearch->setSearchValue(Get("x_LabTest", Get("LabTest", "")));
		if ($this->LabTest->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LabTest->AdvancedSearch->setSearchOperator(Get("z_LabTest", ""));

		// sid
		if (!$this->isAddOrEdit())
			$this->sid->AdvancedSearch->setSearchValue(Get("x_sid", Get("sid", "")));
		if ($this->sid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->sid->AdvancedSearch->setSearchOperator(Get("z_sid", ""));

		// SidNo
		if (!$this->isAddOrEdit())
			$this->SidNo->AdvancedSearch->setSearchValue(Get("x_SidNo", Get("SidNo", "")));
		if ($this->SidNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SidNo->AdvancedSearch->setSearchOperator(Get("z_SidNo", ""));

		// createdDatettime
		if (!$this->isAddOrEdit())
			$this->createdDatettime->AdvancedSearch->setSearchValue(Get("x_createdDatettime", Get("createdDatettime", "")));
		if ($this->createdDatettime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdDatettime->AdvancedSearch->setSearchOperator(Get("z_createdDatettime", ""));

		// BillClosing
		if (!$this->isAddOrEdit())
			$this->BillClosing->AdvancedSearch->setSearchValue(Get("x_BillClosing", Get("BillClosing", "")));
		if ($this->BillClosing->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillClosing->AdvancedSearch->setSearchOperator(Get("z_BillClosing", ""));
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue))
			$this->BillClosing->AdvancedSearch->SearchValue = implode(",", $this->BillClosing->AdvancedSearch->SearchValue);
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue2))
			$this->BillClosing->AdvancedSearch->SearchValue2 = implode(",", $this->BillClosing->AdvancedSearch->SearchValue2);

		// GoogleReviewID
		if (!$this->isAddOrEdit())
			$this->GoogleReviewID->AdvancedSearch->setSearchValue(Get("x_GoogleReviewID", Get("GoogleReviewID", "")));
		if ($this->GoogleReviewID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GoogleReviewID->AdvancedSearch->setSearchOperator(Get("z_GoogleReviewID", ""));
		if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue))
			$this->GoogleReviewID->AdvancedSearch->SearchValue = implode(",", $this->GoogleReviewID->AdvancedSearch->SearchValue);
		if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue2))
			$this->GoogleReviewID->AdvancedSearch->SearchValue2 = implode(",", $this->GoogleReviewID->AdvancedSearch->SearchValue2);

		// CardType
		if (!$this->isAddOrEdit())
			$this->CardType->AdvancedSearch->setSearchValue(Get("x_CardType", Get("CardType", "")));
		if ($this->CardType->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CardType->AdvancedSearch->setSearchOperator(Get("z_CardType", ""));

		// PharmacyBill
		if (!$this->isAddOrEdit())
			$this->PharmacyBill->AdvancedSearch->setSearchValue(Get("x_PharmacyBill", Get("PharmacyBill", "")));
		if ($this->PharmacyBill->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PharmacyBill->AdvancedSearch->setSearchOperator(Get("z_PharmacyBill", ""));
		if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue))
			$this->PharmacyBill->AdvancedSearch->SearchValue = implode(",", $this->PharmacyBill->AdvancedSearch->SearchValue);
		if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue2))
			$this->PharmacyBill->AdvancedSearch->SearchValue2 = implode(",", $this->PharmacyBill->AdvancedSearch->SearchValue2);

		// cash
		if (!$this->isAddOrEdit())
			$this->cash->AdvancedSearch->setSearchValue(Get("x_cash", Get("cash", "")));
		if ($this->cash->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->cash->AdvancedSearch->setSearchOperator(Get("z_cash", ""));

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

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'BillNumber' first before field var 'x_BillNumber'
		$val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
		if (!$this->BillNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BillNumber->setFormValue($val);
		}
		$this->BillNumber->setOldValue($CurrentForm->getValue("o_BillNumber"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}
		$this->Mobile->setOldValue($CurrentForm->getValue("o_Mobile"));

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
		}
		$this->Doctor->setOldValue($CurrentForm->getValue("o_Doctor"));

		// Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
		$val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
		if (!$this->ModeofPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModeofPayment->Visible = FALSE; // Disable update for API request
			else
				$this->ModeofPayment->setFormValue($val);
		}
		$this->ModeofPayment->setOldValue($CurrentForm->getValue("o_ModeofPayment"));

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}
		$this->Amount->setOldValue($CurrentForm->getValue("o_Amount"));

		// Check field name 'DiscountAmount' first before field var 'x_DiscountAmount'
		$val = $CurrentForm->hasValue("DiscountAmount") ? $CurrentForm->getValue("DiscountAmount") : $CurrentForm->getValue("x_DiscountAmount");
		if (!$this->DiscountAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DiscountAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountAmount->setFormValue($val);
		}
		$this->DiscountAmount->setOldValue($CurrentForm->getValue("o_DiscountAmount"));

		// Check field name 'BankName' first before field var 'x_BankName'
		$val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
		if (!$this->BankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BankName->Visible = FALSE; // Disable update for API request
			else
				$this->BankName->setFormValue($val);
		}
		$this->BankName->setOldValue($CurrentForm->getValue("o_BankName"));

		// Check field name 'UserName' first before field var 'x_UserName'
		$val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x_UserName");
		if (!$this->UserName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UserName->Visible = FALSE; // Disable update for API request
			else
				$this->UserName->setFormValue($val);
		}
		$this->UserName->setOldValue($CurrentForm->getValue("o_UserName"));

		// Check field name 'BillType' first before field var 'x_BillType'
		$val = $CurrentForm->hasValue("BillType") ? $CurrentForm->getValue("BillType") : $CurrentForm->getValue("x_BillType");
		if (!$this->BillType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillType->Visible = FALSE; // Disable update for API request
			else
				$this->BillType->setFormValue($val);
		}
		$this->BillType->setOldValue($CurrentForm->getValue("o_BillType"));

		// Check field name 'CancelBill' first before field var 'x_CancelBill'
		$val = $CurrentForm->hasValue("CancelBill") ? $CurrentForm->getValue("CancelBill") : $CurrentForm->getValue("x_CancelBill");
		if (!$this->CancelBill->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelBill->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBill->setFormValue($val);
		}
		$this->CancelBill->setOldValue($CurrentForm->getValue("o_CancelBill"));

		// Check field name 'LabTest' first before field var 'x_LabTest'
		$val = $CurrentForm->hasValue("LabTest") ? $CurrentForm->getValue("LabTest") : $CurrentForm->getValue("x_LabTest");
		if (!$this->LabTest->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabTest->Visible = FALSE; // Disable update for API request
			else
				$this->LabTest->setFormValue($val);
		}
		$this->LabTest->setOldValue($CurrentForm->getValue("o_LabTest"));

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}
		$this->sid->setOldValue($CurrentForm->getValue("o_sid"));

		// Check field name 'SidNo' first before field var 'x_SidNo'
		$val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
		if (!$this->SidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SidNo->Visible = FALSE; // Disable update for API request
			else
				$this->SidNo->setFormValue($val);
		}
		$this->SidNo->setOldValue($CurrentForm->getValue("o_SidNo"));

		// Check field name 'createdDatettime' first before field var 'x_createdDatettime'
		$val = $CurrentForm->hasValue("createdDatettime") ? $CurrentForm->getValue("createdDatettime") : $CurrentForm->getValue("x_createdDatettime");
		if (!$this->createdDatettime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdDatettime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDatettime->setFormValue($val);
			$this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
		}
		$this->createdDatettime->setOldValue($CurrentForm->getValue("o_createdDatettime"));

		// Check field name 'GoogleReviewID' first before field var 'x_GoogleReviewID'
		$val = $CurrentForm->hasValue("GoogleReviewID") ? $CurrentForm->getValue("GoogleReviewID") : $CurrentForm->getValue("x_GoogleReviewID");
		if (!$this->GoogleReviewID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GoogleReviewID->Visible = FALSE; // Disable update for API request
			else
				$this->GoogleReviewID->setFormValue($val);
		}
		$this->GoogleReviewID->setOldValue($CurrentForm->getValue("o_GoogleReviewID"));

		// Check field name 'CardType' first before field var 'x_CardType'
		$val = $CurrentForm->hasValue("CardType") ? $CurrentForm->getValue("CardType") : $CurrentForm->getValue("x_CardType");
		if (!$this->CardType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CardType->Visible = FALSE; // Disable update for API request
			else
				$this->CardType->setFormValue($val);
		}
		$this->CardType->setOldValue($CurrentForm->getValue("o_CardType"));

		// Check field name 'PharmacyBill' first before field var 'x_PharmacyBill'
		$val = $CurrentForm->hasValue("PharmacyBill") ? $CurrentForm->getValue("PharmacyBill") : $CurrentForm->getValue("x_PharmacyBill");
		if (!$this->PharmacyBill->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PharmacyBill->Visible = FALSE; // Disable update for API request
			else
				$this->PharmacyBill->setFormValue($val);
		}
		$this->PharmacyBill->setOldValue($CurrentForm->getValue("o_PharmacyBill"));

		// Check field name 'cash' first before field var 'x_cash'
		$val = $CurrentForm->hasValue("cash") ? $CurrentForm->getValue("cash") : $CurrentForm->getValue("x_cash");
		if (!$this->cash->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cash->Visible = FALSE; // Disable update for API request
			else
				$this->cash->setFormValue($val);
		}
		$this->cash->setOldValue($CurrentForm->getValue("o_cash"));

		// Check field name 'Card' first before field var 'x_Card'
		$val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
		if (!$this->Card->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Card->Visible = FALSE; // Disable update for API request
			else
				$this->Card->setFormValue($val);
		}
		$this->Card->setOldValue($CurrentForm->getValue("o_Card"));

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
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->DiscountAmount->CurrentValue = $this->DiscountAmount->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->UserName->CurrentValue = $this->UserName->FormValue;
		$this->BillType->CurrentValue = $this->BillType->FormValue;
		$this->CancelBill->CurrentValue = $this->CancelBill->FormValue;
		$this->LabTest->CurrentValue = $this->LabTest->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->SidNo->CurrentValue = $this->SidNo->FormValue;
		$this->createdDatettime->CurrentValue = $this->createdDatettime->FormValue;
		$this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
		$this->GoogleReviewID->CurrentValue = $this->GoogleReviewID->FormValue;
		$this->CardType->CurrentValue = $this->CardType->FormValue;
		$this->PharmacyBill->CurrentValue = $this->PharmacyBill->FormValue;
		$this->cash->CurrentValue = $this->cash->FormValue;
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
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->BillNumber->setDbValue($row['BillNumber']);
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
		$this->DiscountAmount->setDbValue($row['DiscountAmount']);
		$this->createdby->setDbValue($row['createdby']);
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
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->DrID->setDbValue($row['DrID']);
		$this->BillStatus->setDbValue($row['BillStatus']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
		$this->UserName->setDbValue($row['UserName']);
		$this->AdjustmentAdvance->setDbValue($row['AdjustmentAdvance']);
		$this->billing_vouchercol->setDbValue($row['billing_vouchercol']);
		$this->BillType->setDbValue($row['BillType']);
		$this->ProcedureName->setDbValue($row['ProcedureName']);
		$this->ProcedureAmount->setDbValue($row['ProcedureAmount']);
		$this->IncludePackage->setDbValue($row['IncludePackage']);
		$this->CancelBill->setDbValue($row['CancelBill']);
		$this->CancelReason->setDbValue($row['CancelReason']);
		$this->CancelModeOfPayment->setDbValue($row['CancelModeOfPayment']);
		$this->CancelAmount->setDbValue($row['CancelAmount']);
		$this->CancelBankName->setDbValue($row['CancelBankName']);
		$this->CancelTransactionNumber->setDbValue($row['CancelTransactionNumber']);
		$this->LabTest->setDbValue($row['LabTest']);
		$this->sid->setDbValue($row['sid']);
		$this->SidNo->setDbValue($row['SidNo']);
		$this->createdDatettime->setDbValue($row['createdDatettime']);
		$this->BillClosing->setDbValue($row['BillClosing']);
		$this->GoogleReviewID->setDbValue($row['GoogleReviewID']);
		$this->CardType->setDbValue($row['CardType']);
		$this->PharmacyBill->setDbValue($row['PharmacyBill']);
		$this->cash->setDbValue($row['cash']);
		$this->Card->setDbValue($row['Card']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['BillNumber'] = $this->BillNumber->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['IP_OP'] = $this->IP_OP->CurrentValue;
		$row['Doctor'] = $this->Doctor->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['AnyDues'] = $this->AnyDues->CurrentValue;
		$row['DiscountAmount'] = $this->DiscountAmount->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
		$row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
		$row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
		$row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
		$row['RealizationDate'] = $this->RealizationDate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['CId'] = $this->CId->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PayerType'] = $this->PayerType->CurrentValue;
		$row['Dob'] = $this->Dob->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['PatId'] = $this->PatId->CurrentValue;
		$row['DrDepartment'] = $this->DrDepartment->CurrentValue;
		$row['RefferedBy'] = $this->RefferedBy->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['BillStatus'] = $this->BillStatus->CurrentValue;
		$row['ReportHeader'] = $this->ReportHeader->CurrentValue;
		$row['UserName'] = $this->UserName->CurrentValue;
		$row['AdjustmentAdvance'] = $this->AdjustmentAdvance->CurrentValue;
		$row['billing_vouchercol'] = $this->billing_vouchercol->CurrentValue;
		$row['BillType'] = $this->BillType->CurrentValue;
		$row['ProcedureName'] = $this->ProcedureName->CurrentValue;
		$row['ProcedureAmount'] = $this->ProcedureAmount->CurrentValue;
		$row['IncludePackage'] = $this->IncludePackage->CurrentValue;
		$row['CancelBill'] = $this->CancelBill->CurrentValue;
		$row['CancelReason'] = $this->CancelReason->CurrentValue;
		$row['CancelModeOfPayment'] = $this->CancelModeOfPayment->CurrentValue;
		$row['CancelAmount'] = $this->CancelAmount->CurrentValue;
		$row['CancelBankName'] = $this->CancelBankName->CurrentValue;
		$row['CancelTransactionNumber'] = $this->CancelTransactionNumber->CurrentValue;
		$row['LabTest'] = $this->LabTest->CurrentValue;
		$row['sid'] = $this->sid->CurrentValue;
		$row['SidNo'] = $this->SidNo->CurrentValue;
		$row['createdDatettime'] = $this->createdDatettime->CurrentValue;
		$row['BillClosing'] = $this->BillClosing->CurrentValue;
		$row['GoogleReviewID'] = $this->GoogleReviewID->CurrentValue;
		$row['CardType'] = $this->CardType->CurrentValue;
		$row['PharmacyBill'] = $this->PharmacyBill->CurrentValue;
		$row['cash'] = $this->cash->CurrentValue;
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
		if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue)))
			$this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->cash->FormValue == $this->cash->CurrentValue && is_numeric(ConvertToFloatString($this->cash->CurrentValue)))
			$this->cash->CurrentValue = ConvertToFloatString($this->cash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// createddatetime
		// BillNumber
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
		// DiscountAmount
		// createdby
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
		// CardNumber
		// BankName
		// DrID
		// BillStatus
		// ReportHeader
		// UserName
		// AdjustmentAdvance
		// billing_vouchercol
		// BillType
		// ProcedureName
		// ProcedureAmount
		// IncludePackage
		// CancelBill
		// CancelReason
		// CancelModeOfPayment
		// CancelAmount
		// CancelBankName
		// CancelTransactionNumber
		// LabTest
		// sid
		// SidNo
		// createdDatettime
		// BillClosing
		// GoogleReviewID
		// CardType
		// PharmacyBill
		// cash
		// Card

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// Reception
			$curVal = strval($this->Reception->CurrentValue);
			if ($curVal <> "") {
				$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
				if ($this->Reception->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Reception->ViewValue = $this->Reception->CurrentValue;
					}
				}
			} else {
				$this->Reception->ViewValue = NULL;
			}
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// IP_OP
			$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
			$this->IP_OP->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$curVal = strval($this->ModeofPayment->CurrentValue);
			if ($curVal <> "") {
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
				if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
					}
				}
			} else {
				$this->ModeofPayment->ViewValue = NULL;
			}
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// DiscountAmount
			$this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
			$this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
			$this->DiscountAmount->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// RealizationAmount
			$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
			$this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
			$this->RealizationAmount->ViewCustomAttributes = "";

			// RealizationStatus
			$this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
			$this->RealizationStatus->ViewCustomAttributes = "";

			// RealizationRemarks
			$this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
			$this->RealizationRemarks->ViewCustomAttributes = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
			$this->RealizationBatchNo->ViewCustomAttributes = "";

			// RealizationDate
			$this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
			$this->RealizationDate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// CId
			$curVal = strval($this->CId->CurrentValue);
			if ($curVal <> "") {
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
				if ($this->CId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->CId->ViewValue = $this->CId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CId->ViewValue = $this->CId->CurrentValue;
					}
				}
			} else {
				$this->CId->ViewValue = NULL;
			}
			$this->CId->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PayerType
			$this->PayerType->ViewValue = $this->PayerType->CurrentValue;
			$this->PayerType->ViewCustomAttributes = "";

			// Dob
			$this->Dob->ViewValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// DiscountRemarks
			$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
			$this->DiscountRemarks->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal <> "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$curVal = strval($this->RefferedBy->CurrentValue);
			if ($curVal <> "") {
				$this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
				if ($this->RefferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RefferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
					}
				}
			} else {
				$this->RefferedBy->ViewValue = NULL;
			}
			$this->RefferedBy->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal <> "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrID->ViewValue = $this->DrID->CurrentValue;
					}
				}
			} else {
				$this->DrID->ViewValue = NULL;
			}
			$this->DrID->ViewCustomAttributes = "";

			// BillStatus
			$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

			// ReportHeader
			if (strval($this->ReportHeader->CurrentValue) <> "") {
				$this->ReportHeader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ReportHeader->ViewValue = NULL;
			}
			$this->ReportHeader->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// AdjustmentAdvance
			if (strval($this->AdjustmentAdvance->CurrentValue) <> "") {
				$this->AdjustmentAdvance->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdjustmentAdvance->ViewValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdjustmentAdvance->ViewValue = NULL;
			}
			$this->AdjustmentAdvance->ViewCustomAttributes = "";

			// billing_vouchercol
			$this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
			$this->billing_vouchercol->ViewCustomAttributes = "";

			// BillType
			if (strval($this->BillType->CurrentValue) <> "") {
				$this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
			} else {
				$this->BillType->ViewValue = NULL;
			}
			$this->BillType->ViewCustomAttributes = "";

			// ProcedureName
			$this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
			$this->ProcedureName->ViewCustomAttributes = "";

			// ProcedureAmount
			$this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
			$this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
			$this->ProcedureAmount->ViewCustomAttributes = "";

			// IncludePackage
			if (strval($this->IncludePackage->CurrentValue) <> "") {
				$this->IncludePackage->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IncludePackage->ViewValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IncludePackage->ViewValue = NULL;
			}
			$this->IncludePackage->ViewCustomAttributes = "";

			// CancelBill
			if (strval($this->CancelBill->CurrentValue) <> "") {
				$this->CancelBill->ViewValue = $this->CancelBill->optionCaption($this->CancelBill->CurrentValue);
			} else {
				$this->CancelBill->ViewValue = NULL;
			}
			$this->CancelBill->ViewCustomAttributes = "";

			// CancelReason
			$this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
			$this->CancelReason->ViewCustomAttributes = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
			$this->CancelModeOfPayment->ViewCustomAttributes = "";

			// CancelAmount
			$this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
			$this->CancelAmount->ViewCustomAttributes = "";

			// CancelBankName
			$this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
			$this->CancelBankName->ViewCustomAttributes = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
			$this->CancelTransactionNumber->ViewCustomAttributes = "";

			// LabTest
			$this->LabTest->ViewValue = $this->LabTest->CurrentValue;
			$this->LabTest->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

			// createdDatettime
			$this->createdDatettime->ViewValue = $this->createdDatettime->CurrentValue;
			$this->createdDatettime->ViewValue = FormatDateTime($this->createdDatettime->ViewValue, 0);
			$this->createdDatettime->ViewCustomAttributes = "";

			// GoogleReviewID
			if (strval($this->GoogleReviewID->CurrentValue) <> "") {
				$this->GoogleReviewID->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->GoogleReviewID->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->GoogleReviewID->ViewValue->add($this->GoogleReviewID->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->GoogleReviewID->ViewValue = NULL;
			}
			$this->GoogleReviewID->ViewCustomAttributes = "";

			// CardType
			if (strval($this->CardType->CurrentValue) <> "") {
				$this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
			} else {
				$this->CardType->ViewValue = NULL;
			}
			$this->CardType->ViewCustomAttributes = "";

			// PharmacyBill
			if (strval($this->PharmacyBill->CurrentValue) <> "") {
				$this->PharmacyBill->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PharmacyBill->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PharmacyBill->ViewValue->add($this->PharmacyBill->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PharmacyBill->ViewValue = NULL;
			}
			$this->PharmacyBill->ViewCustomAttributes = "";

			// cash
			$this->cash->ViewValue = $this->cash->CurrentValue;
			$this->cash->ViewValue = FormatNumber($this->cash->ViewValue, 2, -2, -2, -2);
			$this->cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";
			if (!$this->isExport())
				$this->BillNumber->ViewValue = $this->highlightValue($this->BillNumber);

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientName->ViewValue = $this->highlightValue($this->PatientName);

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

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";
			$this->DiscountAmount->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";
			if (!$this->isExport())
				$this->BankName->ViewValue = $this->highlightValue($this->BankName);

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";
			if (!$this->isExport())
				$this->UserName->ViewValue = $this->highlightValue($this->UserName);

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";
			$this->BillType->TooltipValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";
			$this->CancelBill->TooltipValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";
			$this->LabTest->TooltipValue = "";
			if (!$this->isExport())
				$this->LabTest->ViewValue = $this->highlightValue($this->LabTest);

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";
			if (!$this->isExport())
				$this->SidNo->ViewValue = $this->highlightValue($this->SidNo);

			// createdDatettime
			$this->createdDatettime->LinkCustomAttributes = "";
			$this->createdDatettime->HrefValue = "";
			$this->createdDatettime->TooltipValue = "";

			// GoogleReviewID
			$this->GoogleReviewID->LinkCustomAttributes = "";
			$this->GoogleReviewID->HrefValue = "";
			$this->GoogleReviewID->TooltipValue = "";

			// CardType
			$this->CardType->LinkCustomAttributes = "";
			$this->CardType->HrefValue = "";
			$this->CardType->TooltipValue = "";

			// PharmacyBill
			$this->PharmacyBill->LinkCustomAttributes = "";
			$this->PharmacyBill->HrefValue = "";
			$this->PharmacyBill->TooltipValue = "";

			// cash
			$this->cash->LinkCustomAttributes = "";
			$this->cash->HrefValue = "";
			$this->cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->CurrentValue));
			if ($curVal <> "")
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ModeofPayment->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue)) {
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
				$this->Amount->OldValue = $this->Amount->EditValue;
			}

			// DiscountAmount
			$this->DiscountAmount->EditAttrs["class"] = "form-control";
			$this->DiscountAmount->EditCustomAttributes = "";
			$this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
			$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
			if (strval($this->DiscountAmount->EditValue) <> "" && is_numeric($this->DiscountAmount->EditValue)) {
				$this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);
				$this->DiscountAmount->OldValue = $this->DiscountAmount->EditValue;
			}

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// UserName
			// BillType

			$this->BillType->EditCustomAttributes = "";
			$this->BillType->EditValue = $this->BillType->options(FALSE);

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			$this->CancelBill->EditValue = $this->CancelBill->options(TRUE);

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// createdDatettime
			// GoogleReviewID

			$this->GoogleReviewID->EditCustomAttributes = "";
			$this->GoogleReviewID->EditValue = $this->GoogleReviewID->options(FALSE);

			// CardType
			$this->CardType->EditCustomAttributes = "";
			$this->CardType->EditValue = $this->CardType->options(FALSE);

			// PharmacyBill
			$this->PharmacyBill->EditCustomAttributes = "";
			$this->PharmacyBill->EditValue = $this->PharmacyBill->options(FALSE);

			// cash
			$this->cash->EditAttrs["class"] = "form-control";
			$this->cash->EditCustomAttributes = "";
			$this->cash->EditValue = HtmlEncode($this->cash->CurrentValue);
			$this->cash->PlaceHolder = RemoveHtml($this->cash->caption());
			if (strval($this->cash->EditValue) <> "" && is_numeric($this->cash->EditValue)) {
				$this->cash->EditValue = FormatNumber($this->cash->EditValue, -2, -2, -2, -2);
				$this->cash->OldValue = $this->cash->EditValue;
			}

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
			if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue)) {
				$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
				$this->Card->OldValue = $this->Card->EditValue;
			}

			// Add refer script
			// createddatetime

			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";

			// createdDatettime
			$this->createdDatettime->LinkCustomAttributes = "";
			$this->createdDatettime->HrefValue = "";

			// GoogleReviewID
			$this->GoogleReviewID->LinkCustomAttributes = "";
			$this->GoogleReviewID->HrefValue = "";

			// CardType
			$this->CardType->LinkCustomAttributes = "";
			$this->CardType->HrefValue = "";

			// PharmacyBill
			$this->PharmacyBill->LinkCustomAttributes = "";
			$this->PharmacyBill->HrefValue = "";

			// cash
			$this->cash->LinkCustomAttributes = "";
			$this->cash->HrefValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			$this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->CurrentValue));
			if ($curVal <> "")
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ModeofPayment->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue)) {
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
				$this->Amount->OldValue = $this->Amount->EditValue;
			}

			// DiscountAmount
			$this->DiscountAmount->EditAttrs["class"] = "form-control";
			$this->DiscountAmount->EditCustomAttributes = "";
			$this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
			$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
			if (strval($this->DiscountAmount->EditValue) <> "" && is_numeric($this->DiscountAmount->EditValue)) {
				$this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);
				$this->DiscountAmount->OldValue = $this->DiscountAmount->EditValue;
			}

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// UserName
			// BillType

			$this->BillType->EditCustomAttributes = "";
			$this->BillType->EditValue = $this->BillType->options(FALSE);

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			$this->CancelBill->EditValue = $this->CancelBill->options(TRUE);

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = $this->sid->CurrentValue;
			$this->sid->EditValue = FormatNumber($this->sid->EditValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			$this->SidNo->EditValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

			// createdDatettime
			// GoogleReviewID

			$this->GoogleReviewID->EditCustomAttributes = "";
			$this->GoogleReviewID->EditValue = $this->GoogleReviewID->options(FALSE);

			// CardType
			$this->CardType->EditCustomAttributes = "";
			$this->CardType->EditValue = $this->CardType->options(FALSE);

			// PharmacyBill
			$this->PharmacyBill->EditCustomAttributes = "";
			$this->PharmacyBill->EditValue = $this->PharmacyBill->options(FALSE);

			// cash
			$this->cash->EditAttrs["class"] = "form-control";
			$this->cash->EditCustomAttributes = "";
			$this->cash->EditValue = HtmlEncode($this->cash->CurrentValue);
			$this->cash->PlaceHolder = RemoveHtml($this->cash->caption());
			if (strval($this->cash->EditValue) <> "" && is_numeric($this->cash->EditValue)) {
				$this->cash->EditValue = FormatNumber($this->cash->EditValue, -2, -2, -2, -2);
				$this->cash->OldValue = $this->cash->EditValue;
			}

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
			if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue)) {
				$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
				$this->Card->OldValue = $this->Card->EditValue;
			}

			// Edit refer script
			// createddatetime

			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";

			// createdDatettime
			$this->createdDatettime->LinkCustomAttributes = "";
			$this->createdDatettime->HrefValue = "";
			$this->createdDatettime->TooltipValue = "";

			// GoogleReviewID
			$this->GoogleReviewID->LinkCustomAttributes = "";
			$this->GoogleReviewID->HrefValue = "";

			// CardType
			$this->CardType->LinkCustomAttributes = "";
			$this->CardType->HrefValue = "";

			// PharmacyBill
			$this->PharmacyBill->LinkCustomAttributes = "";
			$this->PharmacyBill->HrefValue = "";

			// cash
			$this->cash->LinkCustomAttributes = "";
			$this->cash->HrefValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 7), 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 7), 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

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

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// DiscountAmount
			$this->DiscountAmount->EditAttrs["class"] = "form-control";
			$this->DiscountAmount->EditCustomAttributes = "";
			$this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->AdvancedSearch->SearchValue);
			$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// UserName
			$this->UserName->EditAttrs["class"] = "form-control";
			$this->UserName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UserName->AdvancedSearch->SearchValue = HtmlDecode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->EditValue = HtmlEncode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->PlaceHolder = RemoveHtml($this->UserName->caption());

			// BillType
			$this->BillType->EditCustomAttributes = "";
			$this->BillType->EditValue = $this->BillType->options(FALSE);

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			$this->CancelBill->EditValue = $this->CancelBill->options(TRUE);

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTest->AdvancedSearch->SearchValue = HtmlDecode($this->LabTest->AdvancedSearch->SearchValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->AdvancedSearch->SearchValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// createdDatettime
			$this->createdDatettime->EditAttrs["class"] = "form-control";
			$this->createdDatettime->EditCustomAttributes = "";
			$this->createdDatettime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDatettime->AdvancedSearch->SearchValue, 0), 8));
			$this->createdDatettime->PlaceHolder = RemoveHtml($this->createdDatettime->caption());

			// GoogleReviewID
			$this->GoogleReviewID->EditCustomAttributes = "";
			$this->GoogleReviewID->EditValue = $this->GoogleReviewID->options(FALSE);

			// CardType
			$this->CardType->EditCustomAttributes = "";
			$this->CardType->EditValue = $this->CardType->options(FALSE);

			// PharmacyBill
			$this->PharmacyBill->EditCustomAttributes = "";
			$this->PharmacyBill->EditValue = $this->PharmacyBill->options(FALSE);

			// cash
			$this->cash->EditAttrs["class"] = "form-control";
			$this->cash->EditCustomAttributes = "";
			$this->cash->EditValue = HtmlEncode($this->cash->AdvancedSearch->SearchValue);
			$this->cash->PlaceHolder = RemoveHtml($this->cash->caption());

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
		if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
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
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}
		if ($this->BillNumber->Required) {
			if (!$this->BillNumber->IsDetailKey && $this->BillNumber->FormValue != NULL && $this->BillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
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
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->IP_OP->Required) {
			if (!$this->IP_OP->IsDetailKey && $this->IP_OP->FormValue != NULL && $this->IP_OP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if (!$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
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
		if (!CheckNumber($this->Amount->FormValue)) {
			AddMessage($FormError, $this->Amount->errorMessage());
		}
		if ($this->AnyDues->Required) {
			if (!$this->AnyDues->IsDetailKey && $this->AnyDues->FormValue != NULL && $this->AnyDues->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
			}
		}
		if ($this->DiscountAmount->Required) {
			if (!$this->DiscountAmount->IsDetailKey && $this->DiscountAmount->FormValue != NULL && $this->DiscountAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountAmount->caption(), $this->DiscountAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DiscountAmount->FormValue)) {
			AddMessage($FormError, $this->DiscountAmount->errorMessage());
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
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
		if ($this->RealizationAmount->Required) {
			if (!$this->RealizationAmount->IsDetailKey && $this->RealizationAmount->FormValue != NULL && $this->RealizationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
			}
		}
		if ($this->RealizationStatus->Required) {
			if (!$this->RealizationStatus->IsDetailKey && $this->RealizationStatus->FormValue != NULL && $this->RealizationStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationStatus->caption(), $this->RealizationStatus->RequiredErrorMessage));
			}
		}
		if ($this->RealizationRemarks->Required) {
			if (!$this->RealizationRemarks->IsDetailKey && $this->RealizationRemarks->FormValue != NULL && $this->RealizationRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationRemarks->caption(), $this->RealizationRemarks->RequiredErrorMessage));
			}
		}
		if ($this->RealizationBatchNo->Required) {
			if (!$this->RealizationBatchNo->IsDetailKey && $this->RealizationBatchNo->FormValue != NULL && $this->RealizationBatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationBatchNo->caption(), $this->RealizationBatchNo->RequiredErrorMessage));
			}
		}
		if ($this->RealizationDate->Required) {
			if (!$this->RealizationDate->IsDetailKey && $this->RealizationDate->FormValue != NULL && $this->RealizationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationDate->caption(), $this->RealizationDate->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PayerType->Required) {
			if (!$this->PayerType->IsDetailKey && $this->PayerType->FormValue != NULL && $this->PayerType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PayerType->caption(), $this->PayerType->RequiredErrorMessage));
			}
		}
		if ($this->Dob->Required) {
			if (!$this->Dob->IsDetailKey && $this->Dob->FormValue != NULL && $this->Dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
			}
		}
		if ($this->Currency->Required) {
			if (!$this->Currency->IsDetailKey && $this->Currency->FormValue != NULL && $this->Currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
			}
		}
		if ($this->DiscountRemarks->Required) {
			if (!$this->DiscountRemarks->IsDetailKey && $this->DiscountRemarks->FormValue != NULL && $this->DiscountRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountRemarks->caption(), $this->DiscountRemarks->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->PatId->Required) {
			if (!$this->PatId->IsDetailKey && $this->PatId->FormValue != NULL && $this->PatId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
			}
		}
		if ($this->DrDepartment->Required) {
			if (!$this->DrDepartment->IsDetailKey && $this->DrDepartment->FormValue != NULL && $this->DrDepartment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
			}
		}
		if ($this->RefferedBy->Required) {
			if (!$this->RefferedBy->IsDetailKey && $this->RefferedBy->FormValue != NULL && $this->RefferedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefferedBy->caption(), $this->RefferedBy->RequiredErrorMessage));
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
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if ($this->BillStatus->Required) {
			if (!$this->BillStatus->IsDetailKey && $this->BillStatus->FormValue != NULL && $this->BillStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
			}
		}
		if ($this->ReportHeader->Required) {
			if ($this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
			}
		}
		if ($this->UserName->Required) {
			if (!$this->UserName->IsDetailKey && $this->UserName->FormValue != NULL && $this->UserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserName->caption(), $this->UserName->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentAdvance->Required) {
			if ($this->AdjustmentAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentAdvance->caption(), $this->AdjustmentAdvance->RequiredErrorMessage));
			}
		}
		if ($this->billing_vouchercol->Required) {
			if (!$this->billing_vouchercol->IsDetailKey && $this->billing_vouchercol->FormValue != NULL && $this->billing_vouchercol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->billing_vouchercol->caption(), $this->billing_vouchercol->RequiredErrorMessage));
			}
		}
		if ($this->BillType->Required) {
			if ($this->BillType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureName->Required) {
			if (!$this->ProcedureName->IsDetailKey && $this->ProcedureName->FormValue != NULL && $this->ProcedureName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureName->caption(), $this->ProcedureName->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureAmount->Required) {
			if (!$this->ProcedureAmount->IsDetailKey && $this->ProcedureAmount->FormValue != NULL && $this->ProcedureAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureAmount->caption(), $this->ProcedureAmount->RequiredErrorMessage));
			}
		}
		if ($this->IncludePackage->Required) {
			if ($this->IncludePackage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IncludePackage->caption(), $this->IncludePackage->RequiredErrorMessage));
			}
		}
		if ($this->CancelBill->Required) {
			if (!$this->CancelBill->IsDetailKey && $this->CancelBill->FormValue != NULL && $this->CancelBill->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBill->caption(), $this->CancelBill->RequiredErrorMessage));
			}
		}
		if ($this->CancelReason->Required) {
			if (!$this->CancelReason->IsDetailKey && $this->CancelReason->FormValue != NULL && $this->CancelReason->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelReason->caption(), $this->CancelReason->RequiredErrorMessage));
			}
		}
		if ($this->CancelModeOfPayment->Required) {
			if (!$this->CancelModeOfPayment->IsDetailKey && $this->CancelModeOfPayment->FormValue != NULL && $this->CancelModeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelModeOfPayment->caption(), $this->CancelModeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->CancelAmount->Required) {
			if (!$this->CancelAmount->IsDetailKey && $this->CancelAmount->FormValue != NULL && $this->CancelAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelAmount->caption(), $this->CancelAmount->RequiredErrorMessage));
			}
		}
		if ($this->CancelBankName->Required) {
			if (!$this->CancelBankName->IsDetailKey && $this->CancelBankName->FormValue != NULL && $this->CancelBankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBankName->caption(), $this->CancelBankName->RequiredErrorMessage));
			}
		}
		if ($this->CancelTransactionNumber->Required) {
			if (!$this->CancelTransactionNumber->IsDetailKey && $this->CancelTransactionNumber->FormValue != NULL && $this->CancelTransactionNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelTransactionNumber->caption(), $this->CancelTransactionNumber->RequiredErrorMessage));
			}
		}
		if ($this->LabTest->Required) {
			if (!$this->LabTest->IsDetailKey && $this->LabTest->FormValue != NULL && $this->LabTest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabTest->caption(), $this->LabTest->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if (!$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if ($this->SidNo->Required) {
			if (!$this->SidNo->IsDetailKey && $this->SidNo->FormValue != NULL && $this->SidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
			}
		}
		if ($this->createdDatettime->Required) {
			if (!$this->createdDatettime->IsDetailKey && $this->createdDatettime->FormValue != NULL && $this->createdDatettime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDatettime->caption(), $this->createdDatettime->RequiredErrorMessage));
			}
		}
		if ($this->BillClosing->Required) {
			if ($this->BillClosing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillClosing->caption(), $this->BillClosing->RequiredErrorMessage));
			}
		}
		if ($this->GoogleReviewID->Required) {
			if ($this->GoogleReviewID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GoogleReviewID->caption(), $this->GoogleReviewID->RequiredErrorMessage));
			}
		}
		if ($this->CardType->Required) {
			if ($this->CardType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardType->caption(), $this->CardType->RequiredErrorMessage));
			}
		}
		if ($this->PharmacyBill->Required) {
			if ($this->PharmacyBill->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharmacyBill->caption(), $this->PharmacyBill->RequiredErrorMessage));
			}
		}
		if ($this->cash->Required) {
			if (!$this->cash->IsDetailKey && $this->cash->FormValue != NULL && $this->cash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cash->caption(), $this->cash->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->cash->FormValue)) {
			AddMessage($FormError, $this->cash->errorMessage());
		}
		if ($this->Card->Required) {
			if (!$this->Card->IsDetailKey && $this->Card->FormValue != NULL && $this->Card->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Card->FormValue)) {
			AddMessage($FormError, $this->Card->errorMessage());
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

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 7), NULL, $this->createddatetime->ReadOnly);

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Mobile
			$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, $this->Mobile->ReadOnly);

			// Doctor
			$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, $this->Doctor->ReadOnly);

			// ModeofPayment
			$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, $this->ModeofPayment->ReadOnly);

			// Amount
			$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, $this->Amount->ReadOnly);

			// DiscountAmount
			$this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, NULL, $this->DiscountAmount->ReadOnly);

			// BankName
			$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, $this->BankName->ReadOnly);

			// UserName
			$this->UserName->setDbValueDef($rsnew, GetUserName(), NULL);
			$rsnew['UserName'] = &$this->UserName->DbValue;

			// BillType
			$this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, NULL, $this->BillType->ReadOnly);

			// CancelBill
			$this->CancelBill->setDbValueDef($rsnew, $this->CancelBill->CurrentValue, NULL, $this->CancelBill->ReadOnly);

			// LabTest
			$this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, NULL, $this->LabTest->ReadOnly);

			// GoogleReviewID
			$this->GoogleReviewID->setDbValueDef($rsnew, $this->GoogleReviewID->CurrentValue, NULL, $this->GoogleReviewID->ReadOnly);

			// CardType
			$this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, NULL, $this->CardType->ReadOnly);

			// PharmacyBill
			$this->PharmacyBill->setDbValueDef($rsnew, $this->PharmacyBill->CurrentValue, NULL, $this->PharmacyBill->ReadOnly);

			// cash
			$this->cash->setDbValueDef($rsnew, $this->cash->CurrentValue, NULL, $this->cash->ReadOnly);

			// Card
			$this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, NULL, $this->Card->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('createddatetime')); // createddatetime
		$hash .= GetFieldHash($rs->fields('PatientId')); // PatientId
		$hash .= GetFieldHash($rs->fields('PatientName')); // PatientName
		$hash .= GetFieldHash($rs->fields('Mobile')); // Mobile
		$hash .= GetFieldHash($rs->fields('Doctor')); // Doctor
		$hash .= GetFieldHash($rs->fields('ModeofPayment')); // ModeofPayment
		$hash .= GetFieldHash($rs->fields('Amount')); // Amount
		$hash .= GetFieldHash($rs->fields('DiscountAmount')); // DiscountAmount
		$hash .= GetFieldHash($rs->fields('BankName')); // BankName
		$hash .= GetFieldHash($rs->fields('UserName')); // UserName
		$hash .= GetFieldHash($rs->fields('BillType')); // BillType
		$hash .= GetFieldHash($rs->fields('CancelBill')); // CancelBill
		$hash .= GetFieldHash($rs->fields('LabTest')); // LabTest
		$hash .= GetFieldHash($rs->fields('GoogleReviewID')); // GoogleReviewID
		$hash .= GetFieldHash($rs->fields('CardType')); // CardType
		$hash .= GetFieldHash($rs->fields('PharmacyBill')); // PharmacyBill
		$hash .= GetFieldHash($rs->fields('cash')); // cash
		$hash .= GetFieldHash($rs->fields('Card')); // Card
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

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 7), NULL, FALSE);

		// BillNumber
		$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// Doctor
		$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// DiscountAmount
		$this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, NULL, FALSE);

		// BankName
		$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, FALSE);

		// UserName
		$this->UserName->setDbValueDef($rsnew, GetUserName(), NULL);
		$rsnew['UserName'] = &$this->UserName->DbValue;

		// BillType
		$this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, NULL, FALSE);

		// CancelBill
		$this->CancelBill->setDbValueDef($rsnew, $this->CancelBill->CurrentValue, NULL, FALSE);

		// LabTest
		$this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, NULL, FALSE);

		// sid
		$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, FALSE);

		// SidNo
		$this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, NULL, FALSE);

		// createdDatettime
		$this->createdDatettime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createdDatettime'] = &$this->createdDatettime->DbValue;

		// GoogleReviewID
		$this->GoogleReviewID->setDbValueDef($rsnew, $this->GoogleReviewID->CurrentValue, NULL, FALSE);

		// CardType
		$this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, NULL, FALSE);

		// PharmacyBill
		$this->PharmacyBill->setDbValueDef($rsnew, $this->PharmacyBill->CurrentValue, NULL, FALSE);

		// cash
		$this->cash->setDbValueDef($rsnew, $this->cash->CurrentValue, NULL, FALSE);

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
		$this->createddatetime->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
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
		$this->DiscountAmount->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
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
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->BillStatus->AdvancedSearch->load();
		$this->ReportHeader->AdvancedSearch->load();
		$this->UserName->AdvancedSearch->load();
		$this->AdjustmentAdvance->AdvancedSearch->load();
		$this->billing_vouchercol->AdvancedSearch->load();
		$this->BillType->AdvancedSearch->load();
		$this->ProcedureName->AdvancedSearch->load();
		$this->ProcedureAmount->AdvancedSearch->load();
		$this->IncludePackage->AdvancedSearch->load();
		$this->CancelBill->AdvancedSearch->load();
		$this->CancelReason->AdvancedSearch->load();
		$this->CancelModeOfPayment->AdvancedSearch->load();
		$this->CancelAmount->AdvancedSearch->load();
		$this->CancelBankName->AdvancedSearch->load();
		$this->CancelTransactionNumber->AdvancedSearch->load();
		$this->LabTest->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->createdDatettime->AdvancedSearch->load();
		$this->BillClosing->AdvancedSearch->load();
		$this->GoogleReviewID->AdvancedSearch->load();
		$this->CardType->AdvancedSearch->load();
		$this->PharmacyBill->AdvancedSearch->load();
		$this->cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_billing_voucherlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_billing_voucherlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_billing_voucherlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = "";
		$item->Body = "<button id=\"emf_view_billing_voucher\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_billing_voucher',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_billing_voucherlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
				case "x_DrID":
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
						case "x_Reception":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_ModeofPayment":
							break;
						case "x_CId":
							break;
						case "x_PatId":
							break;
						case "x_RefferedBy":
							break;
						case "x_DrID":
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
	//	$this->OtherOptions["addedit"]->UseDropDownButton = FALSE; // do not use dropdown button style
	//$my_options = &$this->OtherOptions; // define the option using OtherOptions
	//$my_option = $my_options["addedit"]; // near from add/edit button of OtherOptions
	//$my_item = &$my_option->Add("mynewbutton"); // add the button
	//$my_item->Body = "<a class=\"ewAddEdit ewAdd\" title=\"Your Title\" data-caption=\"Your Caption\" href=\"yourpage.php\">My New Button</a>"; // define the link and the caption

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

		$opt =&$this->ListOptions->Add("new");
		$opt->Header = "Personal";
		$opt->OnLeft = TRUE; // Link on left
		$opt->MoveTo(5); // Move to first column
		$opt =&$this->ListOptions->Add("CancelBill");
		$opt->Header = "CancelBill";
		$opt->OnLeft = TRUE; // Link on left
		$opt->MoveTo(6); // Move to first column
		$opt =&$this->ListOptions->Add("EditBill");
		$opt->Header = "EditBill";
		$opt->OnLeft = TRUE; // Link on left
		$opt->MoveTo(8); // Move to first column
		$opt =&$this->ListOptions->Add("WardBill");
		$opt->Header = "WardBill";
		$opt->OnLeft = TRUE; // Link on left
		$opt->MoveTo(8); // Move to first column
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
	//	if ($this->CurrentAction == "gridadd") {
	//$option = &$this->OtherOptions['action'];
	//$option->Tag = "div";
	//$option->TagClassName = "ewActionOption";
	//$option->UseDropDownButton = FALSE;
	//$option->UseImageAndText = TRUE;
	//$item = &$option->Add("gridmynewbutton1");
	//$item->Body = "<a class='btn' title='My First New Button' href='mynewphp1.php' >My First Button</a>";
	//$item = &$option->Add("gridmynewbutton2");
	//$item->Body = "<a class='btn' title='My Second New Button' href='mynewphp2.php' >My Second Button</a>";
	//}
	//$this->ListOptions->Items["line_del"]->Body = "<a><i class='fi-cnsuxl-trash-bin'></i> </a>";
	//$this->ListOptions->Items["new"]->Body = "<a href=dues_viewadd.php?showmaster=Students_Record&student_id=".CurrentTable()->id->CurrentValue." target='_blank'> Add Dues </a>";

	$this->ListOptions->Items["new"]->Body = '<a class="btn btn-default ew-row-link ew-view" title="DetailBill" data-caption="DetailBill" href="view_billing_voucher_printview.php?showdetail=&amp;id='.CurrentTable()->id->CurrentValue.'" data-original-title="DetailBill"><i data-phrase="ViewLink" class="fas fa-print  fa-lg" data-caption="DetailBill"></i></a>';
	$this->ListOptions->Items["CancelBill"]->Body = '<a class="btn btn-default ew-row-link ew-view" title="CancelBill" data-caption="CancelBill" href="view_billing_voucher_printedit.php?showdetail=view_patient_services&id='.CurrentTable()->id->CurrentValue.'" data-original-title="CancelBill"><i data-phrase="ViewLink" class="fas fa-file-invoice  fa-lg" data-caption="CancelBill"></i></a>';
	$this->ListOptions->Items["EditBill"]->Body = '<a class="btn btn-default ew-row-link ew-view" title="EditBill" data-caption="EditBill" href="view_billing_voucheredit.php?showdetail=view_patient_services&id='.CurrentTable()->id->CurrentValue.'" data-original-title="EditBill"><i data-phrase="ViewLink" class="fas fa-edit  fa-lg" data-caption="EditBill"></i></a>';
	$this->ListOptions->Items["WardBill"]->Body = '<a class="btn btn-default ew-row-link ew-view" title="WardBill" data-caption="WardBill" href="view_ip_af_billingview.php?showdetail=&id='.CurrentTable()->id->CurrentValue.'" data-original-title="EditBill"><i data-phrase="ViewLink" class="fas fa-file-word  fa-lg" data-caption="WardBill"></i></a>';
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_pharmacy_pharled_return_list extends view_pharmacy_pharled_return
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_pharmacy_pharled_return';

	// Page object name
	public $PageObjName = "view_pharmacy_pharled_return_list";

	// Grid form hidden field names
	public $FormName = "fview_pharmacy_pharled_returnlist";
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

		// Table object (view_pharmacy_pharled_return)
		if (!isset($GLOBALS["view_pharmacy_pharled_return"]) || get_class($GLOBALS["view_pharmacy_pharled_return"]) == PROJECT_NAMESPACE . "view_pharmacy_pharled_return") {
			$GLOBALS["view_pharmacy_pharled_return"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_pharmacy_pharled_return"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_pharmacy_pharled_returnadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_pharmacy_pharled_returndelete.php";
		$this->MultiUpdateUrl = "view_pharmacy_pharled_returnupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pharmacy_billing_return)
		if (!isset($GLOBALS['pharmacy_billing_return']))
			$GLOBALS['pharmacy_billing_return'] = new pharmacy_billing_return();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_pharled_return');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacy_pharled_returnlistsrch";

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
		global $EXPORT, $view_pharmacy_pharled_return;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_pharmacy_pharled_return);
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
		if ($this->isAddOrEdit())
			$this->BRCODE->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->_USERID->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HosoID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->BRNAME->Visible = FALSE;
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
		$this->BRCODE->setVisibility();
		$this->TYPE->Visible = FALSE;
		$this->DN->Visible = FALSE;
		$this->RDN->Visible = FALSE;
		$this->DT->Visible = FALSE;
		$this->PRC->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->SiNo->setVisibility();
		$this->RQ->Visible = FALSE;
		$this->Product->setVisibility();
		$this->SLNO->setVisibility();
		$this->RT->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->DAMT->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->EXPDT->setVisibility();
		$this->Mfg->setVisibility();
		$this->BILLNO->Visible = FALSE;
		$this->BILLDT->Visible = FALSE;
		$this->VALUE->Visible = FALSE;
		$this->DISC->Visible = FALSE;
		$this->TAXP->Visible = FALSE;
		$this->TAX->Visible = FALSE;
		$this->TAXR->Visible = FALSE;
		$this->EMPNO->Visible = FALSE;
		$this->PC->Visible = FALSE;
		$this->DRNAME->Visible = FALSE;
		$this->BTIME->Visible = FALSE;
		$this->ONO->Visible = FALSE;
		$this->ODT->Visible = FALSE;
		$this->PURRT->Visible = FALSE;
		$this->GRP->Visible = FALSE;
		$this->IBATCH->Visible = FALSE;
		$this->IPNO->Visible = FALSE;
		$this->OPNO->Visible = FALSE;
		$this->RECID->Visible = FALSE;
		$this->FQTY->Visible = FALSE;
		$this->UR->setVisibility();
		$this->DCID->Visible = FALSE;
		$this->_USERID->setVisibility();
		$this->MODDT->Visible = FALSE;
		$this->FYM->Visible = FALSE;
		$this->PRCBATCH->Visible = FALSE;
		$this->MRP->Visible = FALSE;
		$this->BILLYM->Visible = FALSE;
		$this->BILLGRP->Visible = FALSE;
		$this->STAFF->Visible = FALSE;
		$this->TEMPIPNO->Visible = FALSE;
		$this->PRNTED->Visible = FALSE;
		$this->PATNAME->Visible = FALSE;
		$this->PJVNO->Visible = FALSE;
		$this->PJVSLNO->Visible = FALSE;
		$this->OTHDISC->Visible = FALSE;
		$this->PJVYM->Visible = FALSE;
		$this->PURDISCPER->Visible = FALSE;
		$this->CASHIER->Visible = FALSE;
		$this->CASHTIME->Visible = FALSE;
		$this->CASHRECD->Visible = FALSE;
		$this->CASHREFNO->Visible = FALSE;
		$this->CASHIERSHIFT->Visible = FALSE;
		$this->PRCODE->Visible = FALSE;
		$this->RELEASEBY->Visible = FALSE;
		$this->CRAUTHOR->Visible = FALSE;
		$this->PAYMENT->Visible = FALSE;
		$this->DRID->Visible = FALSE;
		$this->WARD->Visible = FALSE;
		$this->STAXTYPE->Visible = FALSE;
		$this->PURDISCVAL->Visible = FALSE;
		$this->RNDOFF->Visible = FALSE;
		$this->DISCONMRP->Visible = FALSE;
		$this->DELVDT->Visible = FALSE;
		$this->DELVTIME->Visible = FALSE;
		$this->DELVBY->Visible = FALSE;
		$this->HOSPNO->Visible = FALSE;
		$this->id->setVisibility();
		$this->pbv->Visible = FALSE;
		$this->pbt->Visible = FALSE;
		$this->HosoID->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->MFRCODE->Visible = FALSE;
		$this->Reception->Visible = FALSE;
		$this->PatID->Visible = FALSE;
		$this->mrnno->Visible = FALSE;
		$this->BRNAME->setVisibility();
		$this->sretid->Visible = FALSE;
		$this->sprid->Visible = FALSE;
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
		$this->setupLookupOptions($this->SLNO);

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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_return") {
			global $pharmacy_billing_return;
			$rsmaster = $pharmacy_billing_return->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_billing_returnlist.php"); // Return to master page
			} else {
				$pharmacy_billing_return->loadListRowValues($rsmaster);
				$pharmacy_billing_return->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_billing_return->renderListRow();
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
		$this->RT->FormValue = ""; // Clear form value
		$this->MRQ->FormValue = ""; // Clear form value
		$this->IQ->FormValue = ""; // Clear form value
		$this->DAMT->FormValue = ""; // Clear form value
		$this->UR->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue <> $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SiNo") && $CurrentForm->hasValue("o_SiNo") && $this->SiNo->CurrentValue <> $this->SiNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Product") && $CurrentForm->hasValue("o_Product") && $this->Product->CurrentValue <> $this->Product->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SLNO") && $CurrentForm->hasValue("o_SLNO") && $this->SLNO->CurrentValue <> $this->SLNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue <> $this->RT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MRQ") && $CurrentForm->hasValue("o_MRQ") && $this->MRQ->CurrentValue <> $this->MRQ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue <> $this->IQ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DAMT") && $CurrentForm->hasValue("o_DAMT") && $this->DAMT->CurrentValue <> $this->DAMT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue <> $this->BATCHNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue <> $this->EXPDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mfg") && $CurrentForm->hasValue("o_Mfg") && $this->Mfg->CurrentValue <> $this->Mfg->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UR") && $CurrentForm->hasValue("o_UR") && $this->UR->CurrentValue <> $this->UR->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacy_pharled_returnlistsrch");
		$filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
		$filterList = Concat($filterList, $this->TYPE->AdvancedSearch->toJson(), ","); // Field TYPE
		$filterList = Concat($filterList, $this->DN->AdvancedSearch->toJson(), ","); // Field DN
		$filterList = Concat($filterList, $this->RDN->AdvancedSearch->toJson(), ","); // Field RDN
		$filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
		$filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
		$filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
		$filterList = Concat($filterList, $this->SiNo->AdvancedSearch->toJson(), ","); // Field SiNo
		$filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
		$filterList = Concat($filterList, $this->Product->AdvancedSearch->toJson(), ","); // Field Product
		$filterList = Concat($filterList, $this->SLNO->AdvancedSearch->toJson(), ","); // Field SLNO
		$filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
		$filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
		$filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
		$filterList = Concat($filterList, $this->DAMT->AdvancedSearch->toJson(), ","); // Field DAMT
		$filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
		$filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
		$filterList = Concat($filterList, $this->Mfg->AdvancedSearch->toJson(), ","); // Field Mfg
		$filterList = Concat($filterList, $this->BILLNO->AdvancedSearch->toJson(), ","); // Field BILLNO
		$filterList = Concat($filterList, $this->BILLDT->AdvancedSearch->toJson(), ","); // Field BILLDT
		$filterList = Concat($filterList, $this->VALUE->AdvancedSearch->toJson(), ","); // Field VALUE
		$filterList = Concat($filterList, $this->DISC->AdvancedSearch->toJson(), ","); // Field DISC
		$filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
		$filterList = Concat($filterList, $this->TAX->AdvancedSearch->toJson(), ","); // Field TAX
		$filterList = Concat($filterList, $this->TAXR->AdvancedSearch->toJson(), ","); // Field TAXR
		$filterList = Concat($filterList, $this->EMPNO->AdvancedSearch->toJson(), ","); // Field EMPNO
		$filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
		$filterList = Concat($filterList, $this->DRNAME->AdvancedSearch->toJson(), ","); // Field DRNAME
		$filterList = Concat($filterList, $this->BTIME->AdvancedSearch->toJson(), ","); // Field BTIME
		$filterList = Concat($filterList, $this->ONO->AdvancedSearch->toJson(), ","); // Field ONO
		$filterList = Concat($filterList, $this->ODT->AdvancedSearch->toJson(), ","); // Field ODT
		$filterList = Concat($filterList, $this->PURRT->AdvancedSearch->toJson(), ","); // Field PURRT
		$filterList = Concat($filterList, $this->GRP->AdvancedSearch->toJson(), ","); // Field GRP
		$filterList = Concat($filterList, $this->IBATCH->AdvancedSearch->toJson(), ","); // Field IBATCH
		$filterList = Concat($filterList, $this->IPNO->AdvancedSearch->toJson(), ","); // Field IPNO
		$filterList = Concat($filterList, $this->OPNO->AdvancedSearch->toJson(), ","); // Field OPNO
		$filterList = Concat($filterList, $this->RECID->AdvancedSearch->toJson(), ","); // Field RECID
		$filterList = Concat($filterList, $this->FQTY->AdvancedSearch->toJson(), ","); // Field FQTY
		$filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
		$filterList = Concat($filterList, $this->DCID->AdvancedSearch->toJson(), ","); // Field DCID
		$filterList = Concat($filterList, $this->_USERID->AdvancedSearch->toJson(), ","); // Field USERID
		$filterList = Concat($filterList, $this->MODDT->AdvancedSearch->toJson(), ","); // Field MODDT
		$filterList = Concat($filterList, $this->FYM->AdvancedSearch->toJson(), ","); // Field FYM
		$filterList = Concat($filterList, $this->PRCBATCH->AdvancedSearch->toJson(), ","); // Field PRCBATCH
		$filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
		$filterList = Concat($filterList, $this->BILLYM->AdvancedSearch->toJson(), ","); // Field BILLYM
		$filterList = Concat($filterList, $this->BILLGRP->AdvancedSearch->toJson(), ","); // Field BILLGRP
		$filterList = Concat($filterList, $this->STAFF->AdvancedSearch->toJson(), ","); // Field STAFF
		$filterList = Concat($filterList, $this->TEMPIPNO->AdvancedSearch->toJson(), ","); // Field TEMPIPNO
		$filterList = Concat($filterList, $this->PRNTED->AdvancedSearch->toJson(), ","); // Field PRNTED
		$filterList = Concat($filterList, $this->PATNAME->AdvancedSearch->toJson(), ","); // Field PATNAME
		$filterList = Concat($filterList, $this->PJVNO->AdvancedSearch->toJson(), ","); // Field PJVNO
		$filterList = Concat($filterList, $this->PJVSLNO->AdvancedSearch->toJson(), ","); // Field PJVSLNO
		$filterList = Concat($filterList, $this->OTHDISC->AdvancedSearch->toJson(), ","); // Field OTHDISC
		$filterList = Concat($filterList, $this->PJVYM->AdvancedSearch->toJson(), ","); // Field PJVYM
		$filterList = Concat($filterList, $this->PURDISCPER->AdvancedSearch->toJson(), ","); // Field PURDISCPER
		$filterList = Concat($filterList, $this->CASHIER->AdvancedSearch->toJson(), ","); // Field CASHIER
		$filterList = Concat($filterList, $this->CASHTIME->AdvancedSearch->toJson(), ","); // Field CASHTIME
		$filterList = Concat($filterList, $this->CASHRECD->AdvancedSearch->toJson(), ","); // Field CASHRECD
		$filterList = Concat($filterList, $this->CASHREFNO->AdvancedSearch->toJson(), ","); // Field CASHREFNO
		$filterList = Concat($filterList, $this->CASHIERSHIFT->AdvancedSearch->toJson(), ","); // Field CASHIERSHIFT
		$filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
		$filterList = Concat($filterList, $this->RELEASEBY->AdvancedSearch->toJson(), ","); // Field RELEASEBY
		$filterList = Concat($filterList, $this->CRAUTHOR->AdvancedSearch->toJson(), ","); // Field CRAUTHOR
		$filterList = Concat($filterList, $this->PAYMENT->AdvancedSearch->toJson(), ","); // Field PAYMENT
		$filterList = Concat($filterList, $this->DRID->AdvancedSearch->toJson(), ","); // Field DRID
		$filterList = Concat($filterList, $this->WARD->AdvancedSearch->toJson(), ","); // Field WARD
		$filterList = Concat($filterList, $this->STAXTYPE->AdvancedSearch->toJson(), ","); // Field STAXTYPE
		$filterList = Concat($filterList, $this->PURDISCVAL->AdvancedSearch->toJson(), ","); // Field PURDISCVAL
		$filterList = Concat($filterList, $this->RNDOFF->AdvancedSearch->toJson(), ","); // Field RNDOFF
		$filterList = Concat($filterList, $this->DISCONMRP->AdvancedSearch->toJson(), ","); // Field DISCONMRP
		$filterList = Concat($filterList, $this->DELVDT->AdvancedSearch->toJson(), ","); // Field DELVDT
		$filterList = Concat($filterList, $this->DELVTIME->AdvancedSearch->toJson(), ","); // Field DELVTIME
		$filterList = Concat($filterList, $this->DELVBY->AdvancedSearch->toJson(), ","); // Field DELVBY
		$filterList = Concat($filterList, $this->HOSPNO->AdvancedSearch->toJson(), ","); // Field HOSPNO
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->pbv->AdvancedSearch->toJson(), ","); // Field pbv
		$filterList = Concat($filterList, $this->pbt->AdvancedSearch->toJson(), ","); // Field pbt
		$filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->BRNAME->AdvancedSearch->toJson(), ","); // Field BRNAME
		$filterList = Concat($filterList, $this->sretid->AdvancedSearch->toJson(), ","); // Field sretid
		$filterList = Concat($filterList, $this->sprid->AdvancedSearch->toJson(), ","); // Field sprid
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacy_pharled_returnlistsrch", $filters);
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

		// Field BRCODE
		$this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
		$this->BRCODE->AdvancedSearch->save();

		// Field TYPE
		$this->TYPE->AdvancedSearch->SearchValue = @$filter["x_TYPE"];
		$this->TYPE->AdvancedSearch->SearchOperator = @$filter["z_TYPE"];
		$this->TYPE->AdvancedSearch->SearchCondition = @$filter["v_TYPE"];
		$this->TYPE->AdvancedSearch->SearchValue2 = @$filter["y_TYPE"];
		$this->TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TYPE"];
		$this->TYPE->AdvancedSearch->save();

		// Field DN
		$this->DN->AdvancedSearch->SearchValue = @$filter["x_DN"];
		$this->DN->AdvancedSearch->SearchOperator = @$filter["z_DN"];
		$this->DN->AdvancedSearch->SearchCondition = @$filter["v_DN"];
		$this->DN->AdvancedSearch->SearchValue2 = @$filter["y_DN"];
		$this->DN->AdvancedSearch->SearchOperator2 = @$filter["w_DN"];
		$this->DN->AdvancedSearch->save();

		// Field RDN
		$this->RDN->AdvancedSearch->SearchValue = @$filter["x_RDN"];
		$this->RDN->AdvancedSearch->SearchOperator = @$filter["z_RDN"];
		$this->RDN->AdvancedSearch->SearchCondition = @$filter["v_RDN"];
		$this->RDN->AdvancedSearch->SearchValue2 = @$filter["y_RDN"];
		$this->RDN->AdvancedSearch->SearchOperator2 = @$filter["w_RDN"];
		$this->RDN->AdvancedSearch->save();

		// Field DT
		$this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
		$this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
		$this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
		$this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
		$this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
		$this->DT->AdvancedSearch->save();

		// Field PRC
		$this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
		$this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
		$this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
		$this->PRC->AdvancedSearch->save();

		// Field OQ
		$this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
		$this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
		$this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
		$this->OQ->AdvancedSearch->save();

		// Field SiNo
		$this->SiNo->AdvancedSearch->SearchValue = @$filter["x_SiNo"];
		$this->SiNo->AdvancedSearch->SearchOperator = @$filter["z_SiNo"];
		$this->SiNo->AdvancedSearch->SearchCondition = @$filter["v_SiNo"];
		$this->SiNo->AdvancedSearch->SearchValue2 = @$filter["y_SiNo"];
		$this->SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_SiNo"];
		$this->SiNo->AdvancedSearch->save();

		// Field RQ
		$this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
		$this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
		$this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
		$this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
		$this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
		$this->RQ->AdvancedSearch->save();

		// Field Product
		$this->Product->AdvancedSearch->SearchValue = @$filter["x_Product"];
		$this->Product->AdvancedSearch->SearchOperator = @$filter["z_Product"];
		$this->Product->AdvancedSearch->SearchCondition = @$filter["v_Product"];
		$this->Product->AdvancedSearch->SearchValue2 = @$filter["y_Product"];
		$this->Product->AdvancedSearch->SearchOperator2 = @$filter["w_Product"];
		$this->Product->AdvancedSearch->save();

		// Field SLNO
		$this->SLNO->AdvancedSearch->SearchValue = @$filter["x_SLNO"];
		$this->SLNO->AdvancedSearch->SearchOperator = @$filter["z_SLNO"];
		$this->SLNO->AdvancedSearch->SearchCondition = @$filter["v_SLNO"];
		$this->SLNO->AdvancedSearch->SearchValue2 = @$filter["y_SLNO"];
		$this->SLNO->AdvancedSearch->SearchOperator2 = @$filter["w_SLNO"];
		$this->SLNO->AdvancedSearch->save();

		// Field RT
		$this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
		$this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
		$this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
		$this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
		$this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
		$this->RT->AdvancedSearch->save();

		// Field MRQ
		$this->MRQ->AdvancedSearch->SearchValue = @$filter["x_MRQ"];
		$this->MRQ->AdvancedSearch->SearchOperator = @$filter["z_MRQ"];
		$this->MRQ->AdvancedSearch->SearchCondition = @$filter["v_MRQ"];
		$this->MRQ->AdvancedSearch->SearchValue2 = @$filter["y_MRQ"];
		$this->MRQ->AdvancedSearch->SearchOperator2 = @$filter["w_MRQ"];
		$this->MRQ->AdvancedSearch->save();

		// Field IQ
		$this->IQ->AdvancedSearch->SearchValue = @$filter["x_IQ"];
		$this->IQ->AdvancedSearch->SearchOperator = @$filter["z_IQ"];
		$this->IQ->AdvancedSearch->SearchCondition = @$filter["v_IQ"];
		$this->IQ->AdvancedSearch->SearchValue2 = @$filter["y_IQ"];
		$this->IQ->AdvancedSearch->SearchOperator2 = @$filter["w_IQ"];
		$this->IQ->AdvancedSearch->save();

		// Field DAMT
		$this->DAMT->AdvancedSearch->SearchValue = @$filter["x_DAMT"];
		$this->DAMT->AdvancedSearch->SearchOperator = @$filter["z_DAMT"];
		$this->DAMT->AdvancedSearch->SearchCondition = @$filter["v_DAMT"];
		$this->DAMT->AdvancedSearch->SearchValue2 = @$filter["y_DAMT"];
		$this->DAMT->AdvancedSearch->SearchOperator2 = @$filter["w_DAMT"];
		$this->DAMT->AdvancedSearch->save();

		// Field BATCHNO
		$this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->save();

		// Field EXPDT
		$this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
		$this->EXPDT->AdvancedSearch->save();

		// Field Mfg
		$this->Mfg->AdvancedSearch->SearchValue = @$filter["x_Mfg"];
		$this->Mfg->AdvancedSearch->SearchOperator = @$filter["z_Mfg"];
		$this->Mfg->AdvancedSearch->SearchCondition = @$filter["v_Mfg"];
		$this->Mfg->AdvancedSearch->SearchValue2 = @$filter["y_Mfg"];
		$this->Mfg->AdvancedSearch->SearchOperator2 = @$filter["w_Mfg"];
		$this->Mfg->AdvancedSearch->save();

		// Field BILLNO
		$this->BILLNO->AdvancedSearch->SearchValue = @$filter["x_BILLNO"];
		$this->BILLNO->AdvancedSearch->SearchOperator = @$filter["z_BILLNO"];
		$this->BILLNO->AdvancedSearch->SearchCondition = @$filter["v_BILLNO"];
		$this->BILLNO->AdvancedSearch->SearchValue2 = @$filter["y_BILLNO"];
		$this->BILLNO->AdvancedSearch->SearchOperator2 = @$filter["w_BILLNO"];
		$this->BILLNO->AdvancedSearch->save();

		// Field BILLDT
		$this->BILLDT->AdvancedSearch->SearchValue = @$filter["x_BILLDT"];
		$this->BILLDT->AdvancedSearch->SearchOperator = @$filter["z_BILLDT"];
		$this->BILLDT->AdvancedSearch->SearchCondition = @$filter["v_BILLDT"];
		$this->BILLDT->AdvancedSearch->SearchValue2 = @$filter["y_BILLDT"];
		$this->BILLDT->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDT"];
		$this->BILLDT->AdvancedSearch->save();

		// Field VALUE
		$this->VALUE->AdvancedSearch->SearchValue = @$filter["x_VALUE"];
		$this->VALUE->AdvancedSearch->SearchOperator = @$filter["z_VALUE"];
		$this->VALUE->AdvancedSearch->SearchCondition = @$filter["v_VALUE"];
		$this->VALUE->AdvancedSearch->SearchValue2 = @$filter["y_VALUE"];
		$this->VALUE->AdvancedSearch->SearchOperator2 = @$filter["w_VALUE"];
		$this->VALUE->AdvancedSearch->save();

		// Field DISC
		$this->DISC->AdvancedSearch->SearchValue = @$filter["x_DISC"];
		$this->DISC->AdvancedSearch->SearchOperator = @$filter["z_DISC"];
		$this->DISC->AdvancedSearch->SearchCondition = @$filter["v_DISC"];
		$this->DISC->AdvancedSearch->SearchValue2 = @$filter["y_DISC"];
		$this->DISC->AdvancedSearch->SearchOperator2 = @$filter["w_DISC"];
		$this->DISC->AdvancedSearch->save();

		// Field TAXP
		$this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
		$this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
		$this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
		$this->TAXP->AdvancedSearch->save();

		// Field TAX
		$this->TAX->AdvancedSearch->SearchValue = @$filter["x_TAX"];
		$this->TAX->AdvancedSearch->SearchOperator = @$filter["z_TAX"];
		$this->TAX->AdvancedSearch->SearchCondition = @$filter["v_TAX"];
		$this->TAX->AdvancedSearch->SearchValue2 = @$filter["y_TAX"];
		$this->TAX->AdvancedSearch->SearchOperator2 = @$filter["w_TAX"];
		$this->TAX->AdvancedSearch->save();

		// Field TAXR
		$this->TAXR->AdvancedSearch->SearchValue = @$filter["x_TAXR"];
		$this->TAXR->AdvancedSearch->SearchOperator = @$filter["z_TAXR"];
		$this->TAXR->AdvancedSearch->SearchCondition = @$filter["v_TAXR"];
		$this->TAXR->AdvancedSearch->SearchValue2 = @$filter["y_TAXR"];
		$this->TAXR->AdvancedSearch->SearchOperator2 = @$filter["w_TAXR"];
		$this->TAXR->AdvancedSearch->save();

		// Field EMPNO
		$this->EMPNO->AdvancedSearch->SearchValue = @$filter["x_EMPNO"];
		$this->EMPNO->AdvancedSearch->SearchOperator = @$filter["z_EMPNO"];
		$this->EMPNO->AdvancedSearch->SearchCondition = @$filter["v_EMPNO"];
		$this->EMPNO->AdvancedSearch->SearchValue2 = @$filter["y_EMPNO"];
		$this->EMPNO->AdvancedSearch->SearchOperator2 = @$filter["w_EMPNO"];
		$this->EMPNO->AdvancedSearch->save();

		// Field PC
		$this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
		$this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
		$this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
		$this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
		$this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
		$this->PC->AdvancedSearch->save();

		// Field DRNAME
		$this->DRNAME->AdvancedSearch->SearchValue = @$filter["x_DRNAME"];
		$this->DRNAME->AdvancedSearch->SearchOperator = @$filter["z_DRNAME"];
		$this->DRNAME->AdvancedSearch->SearchCondition = @$filter["v_DRNAME"];
		$this->DRNAME->AdvancedSearch->SearchValue2 = @$filter["y_DRNAME"];
		$this->DRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_DRNAME"];
		$this->DRNAME->AdvancedSearch->save();

		// Field BTIME
		$this->BTIME->AdvancedSearch->SearchValue = @$filter["x_BTIME"];
		$this->BTIME->AdvancedSearch->SearchOperator = @$filter["z_BTIME"];
		$this->BTIME->AdvancedSearch->SearchCondition = @$filter["v_BTIME"];
		$this->BTIME->AdvancedSearch->SearchValue2 = @$filter["y_BTIME"];
		$this->BTIME->AdvancedSearch->SearchOperator2 = @$filter["w_BTIME"];
		$this->BTIME->AdvancedSearch->save();

		// Field ONO
		$this->ONO->AdvancedSearch->SearchValue = @$filter["x_ONO"];
		$this->ONO->AdvancedSearch->SearchOperator = @$filter["z_ONO"];
		$this->ONO->AdvancedSearch->SearchCondition = @$filter["v_ONO"];
		$this->ONO->AdvancedSearch->SearchValue2 = @$filter["y_ONO"];
		$this->ONO->AdvancedSearch->SearchOperator2 = @$filter["w_ONO"];
		$this->ONO->AdvancedSearch->save();

		// Field ODT
		$this->ODT->AdvancedSearch->SearchValue = @$filter["x_ODT"];
		$this->ODT->AdvancedSearch->SearchOperator = @$filter["z_ODT"];
		$this->ODT->AdvancedSearch->SearchCondition = @$filter["v_ODT"];
		$this->ODT->AdvancedSearch->SearchValue2 = @$filter["y_ODT"];
		$this->ODT->AdvancedSearch->SearchOperator2 = @$filter["w_ODT"];
		$this->ODT->AdvancedSearch->save();

		// Field PURRT
		$this->PURRT->AdvancedSearch->SearchValue = @$filter["x_PURRT"];
		$this->PURRT->AdvancedSearch->SearchOperator = @$filter["z_PURRT"];
		$this->PURRT->AdvancedSearch->SearchCondition = @$filter["v_PURRT"];
		$this->PURRT->AdvancedSearch->SearchValue2 = @$filter["y_PURRT"];
		$this->PURRT->AdvancedSearch->SearchOperator2 = @$filter["w_PURRT"];
		$this->PURRT->AdvancedSearch->save();

		// Field GRP
		$this->GRP->AdvancedSearch->SearchValue = @$filter["x_GRP"];
		$this->GRP->AdvancedSearch->SearchOperator = @$filter["z_GRP"];
		$this->GRP->AdvancedSearch->SearchCondition = @$filter["v_GRP"];
		$this->GRP->AdvancedSearch->SearchValue2 = @$filter["y_GRP"];
		$this->GRP->AdvancedSearch->SearchOperator2 = @$filter["w_GRP"];
		$this->GRP->AdvancedSearch->save();

		// Field IBATCH
		$this->IBATCH->AdvancedSearch->SearchValue = @$filter["x_IBATCH"];
		$this->IBATCH->AdvancedSearch->SearchOperator = @$filter["z_IBATCH"];
		$this->IBATCH->AdvancedSearch->SearchCondition = @$filter["v_IBATCH"];
		$this->IBATCH->AdvancedSearch->SearchValue2 = @$filter["y_IBATCH"];
		$this->IBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_IBATCH"];
		$this->IBATCH->AdvancedSearch->save();

		// Field IPNO
		$this->IPNO->AdvancedSearch->SearchValue = @$filter["x_IPNO"];
		$this->IPNO->AdvancedSearch->SearchOperator = @$filter["z_IPNO"];
		$this->IPNO->AdvancedSearch->SearchCondition = @$filter["v_IPNO"];
		$this->IPNO->AdvancedSearch->SearchValue2 = @$filter["y_IPNO"];
		$this->IPNO->AdvancedSearch->SearchOperator2 = @$filter["w_IPNO"];
		$this->IPNO->AdvancedSearch->save();

		// Field OPNO
		$this->OPNO->AdvancedSearch->SearchValue = @$filter["x_OPNO"];
		$this->OPNO->AdvancedSearch->SearchOperator = @$filter["z_OPNO"];
		$this->OPNO->AdvancedSearch->SearchCondition = @$filter["v_OPNO"];
		$this->OPNO->AdvancedSearch->SearchValue2 = @$filter["y_OPNO"];
		$this->OPNO->AdvancedSearch->SearchOperator2 = @$filter["w_OPNO"];
		$this->OPNO->AdvancedSearch->save();

		// Field RECID
		$this->RECID->AdvancedSearch->SearchValue = @$filter["x_RECID"];
		$this->RECID->AdvancedSearch->SearchOperator = @$filter["z_RECID"];
		$this->RECID->AdvancedSearch->SearchCondition = @$filter["v_RECID"];
		$this->RECID->AdvancedSearch->SearchValue2 = @$filter["y_RECID"];
		$this->RECID->AdvancedSearch->SearchOperator2 = @$filter["w_RECID"];
		$this->RECID->AdvancedSearch->save();

		// Field FQTY
		$this->FQTY->AdvancedSearch->SearchValue = @$filter["x_FQTY"];
		$this->FQTY->AdvancedSearch->SearchOperator = @$filter["z_FQTY"];
		$this->FQTY->AdvancedSearch->SearchCondition = @$filter["v_FQTY"];
		$this->FQTY->AdvancedSearch->SearchValue2 = @$filter["y_FQTY"];
		$this->FQTY->AdvancedSearch->SearchOperator2 = @$filter["w_FQTY"];
		$this->FQTY->AdvancedSearch->save();

		// Field UR
		$this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
		$this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
		$this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
		$this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
		$this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
		$this->UR->AdvancedSearch->save();

		// Field DCID
		$this->DCID->AdvancedSearch->SearchValue = @$filter["x_DCID"];
		$this->DCID->AdvancedSearch->SearchOperator = @$filter["z_DCID"];
		$this->DCID->AdvancedSearch->SearchCondition = @$filter["v_DCID"];
		$this->DCID->AdvancedSearch->SearchValue2 = @$filter["y_DCID"];
		$this->DCID->AdvancedSearch->SearchOperator2 = @$filter["w_DCID"];
		$this->DCID->AdvancedSearch->save();

		// Field USERID
		$this->_USERID->AdvancedSearch->SearchValue = @$filter["x__USERID"];
		$this->_USERID->AdvancedSearch->SearchOperator = @$filter["z__USERID"];
		$this->_USERID->AdvancedSearch->SearchCondition = @$filter["v__USERID"];
		$this->_USERID->AdvancedSearch->SearchValue2 = @$filter["y__USERID"];
		$this->_USERID->AdvancedSearch->SearchOperator2 = @$filter["w__USERID"];
		$this->_USERID->AdvancedSearch->save();

		// Field MODDT
		$this->MODDT->AdvancedSearch->SearchValue = @$filter["x_MODDT"];
		$this->MODDT->AdvancedSearch->SearchOperator = @$filter["z_MODDT"];
		$this->MODDT->AdvancedSearch->SearchCondition = @$filter["v_MODDT"];
		$this->MODDT->AdvancedSearch->SearchValue2 = @$filter["y_MODDT"];
		$this->MODDT->AdvancedSearch->SearchOperator2 = @$filter["w_MODDT"];
		$this->MODDT->AdvancedSearch->save();

		// Field FYM
		$this->FYM->AdvancedSearch->SearchValue = @$filter["x_FYM"];
		$this->FYM->AdvancedSearch->SearchOperator = @$filter["z_FYM"];
		$this->FYM->AdvancedSearch->SearchCondition = @$filter["v_FYM"];
		$this->FYM->AdvancedSearch->SearchValue2 = @$filter["y_FYM"];
		$this->FYM->AdvancedSearch->SearchOperator2 = @$filter["w_FYM"];
		$this->FYM->AdvancedSearch->save();

		// Field PRCBATCH
		$this->PRCBATCH->AdvancedSearch->SearchValue = @$filter["x_PRCBATCH"];
		$this->PRCBATCH->AdvancedSearch->SearchOperator = @$filter["z_PRCBATCH"];
		$this->PRCBATCH->AdvancedSearch->SearchCondition = @$filter["v_PRCBATCH"];
		$this->PRCBATCH->AdvancedSearch->SearchValue2 = @$filter["y_PRCBATCH"];
		$this->PRCBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_PRCBATCH"];
		$this->PRCBATCH->AdvancedSearch->save();

		// Field MRP
		$this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
		$this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
		$this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
		$this->MRP->AdvancedSearch->save();

		// Field BILLYM
		$this->BILLYM->AdvancedSearch->SearchValue = @$filter["x_BILLYM"];
		$this->BILLYM->AdvancedSearch->SearchOperator = @$filter["z_BILLYM"];
		$this->BILLYM->AdvancedSearch->SearchCondition = @$filter["v_BILLYM"];
		$this->BILLYM->AdvancedSearch->SearchValue2 = @$filter["y_BILLYM"];
		$this->BILLYM->AdvancedSearch->SearchOperator2 = @$filter["w_BILLYM"];
		$this->BILLYM->AdvancedSearch->save();

		// Field BILLGRP
		$this->BILLGRP->AdvancedSearch->SearchValue = @$filter["x_BILLGRP"];
		$this->BILLGRP->AdvancedSearch->SearchOperator = @$filter["z_BILLGRP"];
		$this->BILLGRP->AdvancedSearch->SearchCondition = @$filter["v_BILLGRP"];
		$this->BILLGRP->AdvancedSearch->SearchValue2 = @$filter["y_BILLGRP"];
		$this->BILLGRP->AdvancedSearch->SearchOperator2 = @$filter["w_BILLGRP"];
		$this->BILLGRP->AdvancedSearch->save();

		// Field STAFF
		$this->STAFF->AdvancedSearch->SearchValue = @$filter["x_STAFF"];
		$this->STAFF->AdvancedSearch->SearchOperator = @$filter["z_STAFF"];
		$this->STAFF->AdvancedSearch->SearchCondition = @$filter["v_STAFF"];
		$this->STAFF->AdvancedSearch->SearchValue2 = @$filter["y_STAFF"];
		$this->STAFF->AdvancedSearch->SearchOperator2 = @$filter["w_STAFF"];
		$this->STAFF->AdvancedSearch->save();

		// Field TEMPIPNO
		$this->TEMPIPNO->AdvancedSearch->SearchValue = @$filter["x_TEMPIPNO"];
		$this->TEMPIPNO->AdvancedSearch->SearchOperator = @$filter["z_TEMPIPNO"];
		$this->TEMPIPNO->AdvancedSearch->SearchCondition = @$filter["v_TEMPIPNO"];
		$this->TEMPIPNO->AdvancedSearch->SearchValue2 = @$filter["y_TEMPIPNO"];
		$this->TEMPIPNO->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPIPNO"];
		$this->TEMPIPNO->AdvancedSearch->save();

		// Field PRNTED
		$this->PRNTED->AdvancedSearch->SearchValue = @$filter["x_PRNTED"];
		$this->PRNTED->AdvancedSearch->SearchOperator = @$filter["z_PRNTED"];
		$this->PRNTED->AdvancedSearch->SearchCondition = @$filter["v_PRNTED"];
		$this->PRNTED->AdvancedSearch->SearchValue2 = @$filter["y_PRNTED"];
		$this->PRNTED->AdvancedSearch->SearchOperator2 = @$filter["w_PRNTED"];
		$this->PRNTED->AdvancedSearch->save();

		// Field PATNAME
		$this->PATNAME->AdvancedSearch->SearchValue = @$filter["x_PATNAME"];
		$this->PATNAME->AdvancedSearch->SearchOperator = @$filter["z_PATNAME"];
		$this->PATNAME->AdvancedSearch->SearchCondition = @$filter["v_PATNAME"];
		$this->PATNAME->AdvancedSearch->SearchValue2 = @$filter["y_PATNAME"];
		$this->PATNAME->AdvancedSearch->SearchOperator2 = @$filter["w_PATNAME"];
		$this->PATNAME->AdvancedSearch->save();

		// Field PJVNO
		$this->PJVNO->AdvancedSearch->SearchValue = @$filter["x_PJVNO"];
		$this->PJVNO->AdvancedSearch->SearchOperator = @$filter["z_PJVNO"];
		$this->PJVNO->AdvancedSearch->SearchCondition = @$filter["v_PJVNO"];
		$this->PJVNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVNO"];
		$this->PJVNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVNO"];
		$this->PJVNO->AdvancedSearch->save();

		// Field PJVSLNO
		$this->PJVSLNO->AdvancedSearch->SearchValue = @$filter["x_PJVSLNO"];
		$this->PJVSLNO->AdvancedSearch->SearchOperator = @$filter["z_PJVSLNO"];
		$this->PJVSLNO->AdvancedSearch->SearchCondition = @$filter["v_PJVSLNO"];
		$this->PJVSLNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVSLNO"];
		$this->PJVSLNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVSLNO"];
		$this->PJVSLNO->AdvancedSearch->save();

		// Field OTHDISC
		$this->OTHDISC->AdvancedSearch->SearchValue = @$filter["x_OTHDISC"];
		$this->OTHDISC->AdvancedSearch->SearchOperator = @$filter["z_OTHDISC"];
		$this->OTHDISC->AdvancedSearch->SearchCondition = @$filter["v_OTHDISC"];
		$this->OTHDISC->AdvancedSearch->SearchValue2 = @$filter["y_OTHDISC"];
		$this->OTHDISC->AdvancedSearch->SearchOperator2 = @$filter["w_OTHDISC"];
		$this->OTHDISC->AdvancedSearch->save();

		// Field PJVYM
		$this->PJVYM->AdvancedSearch->SearchValue = @$filter["x_PJVYM"];
		$this->PJVYM->AdvancedSearch->SearchOperator = @$filter["z_PJVYM"];
		$this->PJVYM->AdvancedSearch->SearchCondition = @$filter["v_PJVYM"];
		$this->PJVYM->AdvancedSearch->SearchValue2 = @$filter["y_PJVYM"];
		$this->PJVYM->AdvancedSearch->SearchOperator2 = @$filter["w_PJVYM"];
		$this->PJVYM->AdvancedSearch->save();

		// Field PURDISCPER
		$this->PURDISCPER->AdvancedSearch->SearchValue = @$filter["x_PURDISCPER"];
		$this->PURDISCPER->AdvancedSearch->SearchOperator = @$filter["z_PURDISCPER"];
		$this->PURDISCPER->AdvancedSearch->SearchCondition = @$filter["v_PURDISCPER"];
		$this->PURDISCPER->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCPER"];
		$this->PURDISCPER->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCPER"];
		$this->PURDISCPER->AdvancedSearch->save();

		// Field CASHIER
		$this->CASHIER->AdvancedSearch->SearchValue = @$filter["x_CASHIER"];
		$this->CASHIER->AdvancedSearch->SearchOperator = @$filter["z_CASHIER"];
		$this->CASHIER->AdvancedSearch->SearchCondition = @$filter["v_CASHIER"];
		$this->CASHIER->AdvancedSearch->SearchValue2 = @$filter["y_CASHIER"];
		$this->CASHIER->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIER"];
		$this->CASHIER->AdvancedSearch->save();

		// Field CASHTIME
		$this->CASHTIME->AdvancedSearch->SearchValue = @$filter["x_CASHTIME"];
		$this->CASHTIME->AdvancedSearch->SearchOperator = @$filter["z_CASHTIME"];
		$this->CASHTIME->AdvancedSearch->SearchCondition = @$filter["v_CASHTIME"];
		$this->CASHTIME->AdvancedSearch->SearchValue2 = @$filter["y_CASHTIME"];
		$this->CASHTIME->AdvancedSearch->SearchOperator2 = @$filter["w_CASHTIME"];
		$this->CASHTIME->AdvancedSearch->save();

		// Field CASHRECD
		$this->CASHRECD->AdvancedSearch->SearchValue = @$filter["x_CASHRECD"];
		$this->CASHRECD->AdvancedSearch->SearchOperator = @$filter["z_CASHRECD"];
		$this->CASHRECD->AdvancedSearch->SearchCondition = @$filter["v_CASHRECD"];
		$this->CASHRECD->AdvancedSearch->SearchValue2 = @$filter["y_CASHRECD"];
		$this->CASHRECD->AdvancedSearch->SearchOperator2 = @$filter["w_CASHRECD"];
		$this->CASHRECD->AdvancedSearch->save();

		// Field CASHREFNO
		$this->CASHREFNO->AdvancedSearch->SearchValue = @$filter["x_CASHREFNO"];
		$this->CASHREFNO->AdvancedSearch->SearchOperator = @$filter["z_CASHREFNO"];
		$this->CASHREFNO->AdvancedSearch->SearchCondition = @$filter["v_CASHREFNO"];
		$this->CASHREFNO->AdvancedSearch->SearchValue2 = @$filter["y_CASHREFNO"];
		$this->CASHREFNO->AdvancedSearch->SearchOperator2 = @$filter["w_CASHREFNO"];
		$this->CASHREFNO->AdvancedSearch->save();

		// Field CASHIERSHIFT
		$this->CASHIERSHIFT->AdvancedSearch->SearchValue = @$filter["x_CASHIERSHIFT"];
		$this->CASHIERSHIFT->AdvancedSearch->SearchOperator = @$filter["z_CASHIERSHIFT"];
		$this->CASHIERSHIFT->AdvancedSearch->SearchCondition = @$filter["v_CASHIERSHIFT"];
		$this->CASHIERSHIFT->AdvancedSearch->SearchValue2 = @$filter["y_CASHIERSHIFT"];
		$this->CASHIERSHIFT->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIERSHIFT"];
		$this->CASHIERSHIFT->AdvancedSearch->save();

		// Field PRCODE
		$this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
		$this->PRCODE->AdvancedSearch->save();

		// Field RELEASEBY
		$this->RELEASEBY->AdvancedSearch->SearchValue = @$filter["x_RELEASEBY"];
		$this->RELEASEBY->AdvancedSearch->SearchOperator = @$filter["z_RELEASEBY"];
		$this->RELEASEBY->AdvancedSearch->SearchCondition = @$filter["v_RELEASEBY"];
		$this->RELEASEBY->AdvancedSearch->SearchValue2 = @$filter["y_RELEASEBY"];
		$this->RELEASEBY->AdvancedSearch->SearchOperator2 = @$filter["w_RELEASEBY"];
		$this->RELEASEBY->AdvancedSearch->save();

		// Field CRAUTHOR
		$this->CRAUTHOR->AdvancedSearch->SearchValue = @$filter["x_CRAUTHOR"];
		$this->CRAUTHOR->AdvancedSearch->SearchOperator = @$filter["z_CRAUTHOR"];
		$this->CRAUTHOR->AdvancedSearch->SearchCondition = @$filter["v_CRAUTHOR"];
		$this->CRAUTHOR->AdvancedSearch->SearchValue2 = @$filter["y_CRAUTHOR"];
		$this->CRAUTHOR->AdvancedSearch->SearchOperator2 = @$filter["w_CRAUTHOR"];
		$this->CRAUTHOR->AdvancedSearch->save();

		// Field PAYMENT
		$this->PAYMENT->AdvancedSearch->SearchValue = @$filter["x_PAYMENT"];
		$this->PAYMENT->AdvancedSearch->SearchOperator = @$filter["z_PAYMENT"];
		$this->PAYMENT->AdvancedSearch->SearchCondition = @$filter["v_PAYMENT"];
		$this->PAYMENT->AdvancedSearch->SearchValue2 = @$filter["y_PAYMENT"];
		$this->PAYMENT->AdvancedSearch->SearchOperator2 = @$filter["w_PAYMENT"];
		$this->PAYMENT->AdvancedSearch->save();

		// Field DRID
		$this->DRID->AdvancedSearch->SearchValue = @$filter["x_DRID"];
		$this->DRID->AdvancedSearch->SearchOperator = @$filter["z_DRID"];
		$this->DRID->AdvancedSearch->SearchCondition = @$filter["v_DRID"];
		$this->DRID->AdvancedSearch->SearchValue2 = @$filter["y_DRID"];
		$this->DRID->AdvancedSearch->SearchOperator2 = @$filter["w_DRID"];
		$this->DRID->AdvancedSearch->save();

		// Field WARD
		$this->WARD->AdvancedSearch->SearchValue = @$filter["x_WARD"];
		$this->WARD->AdvancedSearch->SearchOperator = @$filter["z_WARD"];
		$this->WARD->AdvancedSearch->SearchCondition = @$filter["v_WARD"];
		$this->WARD->AdvancedSearch->SearchValue2 = @$filter["y_WARD"];
		$this->WARD->AdvancedSearch->SearchOperator2 = @$filter["w_WARD"];
		$this->WARD->AdvancedSearch->save();

		// Field STAXTYPE
		$this->STAXTYPE->AdvancedSearch->SearchValue = @$filter["x_STAXTYPE"];
		$this->STAXTYPE->AdvancedSearch->SearchOperator = @$filter["z_STAXTYPE"];
		$this->STAXTYPE->AdvancedSearch->SearchCondition = @$filter["v_STAXTYPE"];
		$this->STAXTYPE->AdvancedSearch->SearchValue2 = @$filter["y_STAXTYPE"];
		$this->STAXTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_STAXTYPE"];
		$this->STAXTYPE->AdvancedSearch->save();

		// Field PURDISCVAL
		$this->PURDISCVAL->AdvancedSearch->SearchValue = @$filter["x_PURDISCVAL"];
		$this->PURDISCVAL->AdvancedSearch->SearchOperator = @$filter["z_PURDISCVAL"];
		$this->PURDISCVAL->AdvancedSearch->SearchCondition = @$filter["v_PURDISCVAL"];
		$this->PURDISCVAL->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCVAL"];
		$this->PURDISCVAL->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCVAL"];
		$this->PURDISCVAL->AdvancedSearch->save();

		// Field RNDOFF
		$this->RNDOFF->AdvancedSearch->SearchValue = @$filter["x_RNDOFF"];
		$this->RNDOFF->AdvancedSearch->SearchOperator = @$filter["z_RNDOFF"];
		$this->RNDOFF->AdvancedSearch->SearchCondition = @$filter["v_RNDOFF"];
		$this->RNDOFF->AdvancedSearch->SearchValue2 = @$filter["y_RNDOFF"];
		$this->RNDOFF->AdvancedSearch->SearchOperator2 = @$filter["w_RNDOFF"];
		$this->RNDOFF->AdvancedSearch->save();

		// Field DISCONMRP
		$this->DISCONMRP->AdvancedSearch->SearchValue = @$filter["x_DISCONMRP"];
		$this->DISCONMRP->AdvancedSearch->SearchOperator = @$filter["z_DISCONMRP"];
		$this->DISCONMRP->AdvancedSearch->SearchCondition = @$filter["v_DISCONMRP"];
		$this->DISCONMRP->AdvancedSearch->SearchValue2 = @$filter["y_DISCONMRP"];
		$this->DISCONMRP->AdvancedSearch->SearchOperator2 = @$filter["w_DISCONMRP"];
		$this->DISCONMRP->AdvancedSearch->save();

		// Field DELVDT
		$this->DELVDT->AdvancedSearch->SearchValue = @$filter["x_DELVDT"];
		$this->DELVDT->AdvancedSearch->SearchOperator = @$filter["z_DELVDT"];
		$this->DELVDT->AdvancedSearch->SearchCondition = @$filter["v_DELVDT"];
		$this->DELVDT->AdvancedSearch->SearchValue2 = @$filter["y_DELVDT"];
		$this->DELVDT->AdvancedSearch->SearchOperator2 = @$filter["w_DELVDT"];
		$this->DELVDT->AdvancedSearch->save();

		// Field DELVTIME
		$this->DELVTIME->AdvancedSearch->SearchValue = @$filter["x_DELVTIME"];
		$this->DELVTIME->AdvancedSearch->SearchOperator = @$filter["z_DELVTIME"];
		$this->DELVTIME->AdvancedSearch->SearchCondition = @$filter["v_DELVTIME"];
		$this->DELVTIME->AdvancedSearch->SearchValue2 = @$filter["y_DELVTIME"];
		$this->DELVTIME->AdvancedSearch->SearchOperator2 = @$filter["w_DELVTIME"];
		$this->DELVTIME->AdvancedSearch->save();

		// Field DELVBY
		$this->DELVBY->AdvancedSearch->SearchValue = @$filter["x_DELVBY"];
		$this->DELVBY->AdvancedSearch->SearchOperator = @$filter["z_DELVBY"];
		$this->DELVBY->AdvancedSearch->SearchCondition = @$filter["v_DELVBY"];
		$this->DELVBY->AdvancedSearch->SearchValue2 = @$filter["y_DELVBY"];
		$this->DELVBY->AdvancedSearch->SearchOperator2 = @$filter["w_DELVBY"];
		$this->DELVBY->AdvancedSearch->save();

		// Field HOSPNO
		$this->HOSPNO->AdvancedSearch->SearchValue = @$filter["x_HOSPNO"];
		$this->HOSPNO->AdvancedSearch->SearchOperator = @$filter["z_HOSPNO"];
		$this->HOSPNO->AdvancedSearch->SearchCondition = @$filter["v_HOSPNO"];
		$this->HOSPNO->AdvancedSearch->SearchValue2 = @$filter["y_HOSPNO"];
		$this->HOSPNO->AdvancedSearch->SearchOperator2 = @$filter["w_HOSPNO"];
		$this->HOSPNO->AdvancedSearch->save();

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field pbv
		$this->pbv->AdvancedSearch->SearchValue = @$filter["x_pbv"];
		$this->pbv->AdvancedSearch->SearchOperator = @$filter["z_pbv"];
		$this->pbv->AdvancedSearch->SearchCondition = @$filter["v_pbv"];
		$this->pbv->AdvancedSearch->SearchValue2 = @$filter["y_pbv"];
		$this->pbv->AdvancedSearch->SearchOperator2 = @$filter["w_pbv"];
		$this->pbv->AdvancedSearch->save();

		// Field pbt
		$this->pbt->AdvancedSearch->SearchValue = @$filter["x_pbt"];
		$this->pbt->AdvancedSearch->SearchOperator = @$filter["z_pbt"];
		$this->pbt->AdvancedSearch->SearchCondition = @$filter["v_pbt"];
		$this->pbt->AdvancedSearch->SearchValue2 = @$filter["y_pbt"];
		$this->pbt->AdvancedSearch->SearchOperator2 = @$filter["w_pbt"];
		$this->pbt->AdvancedSearch->save();

		// Field HosoID
		$this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
		$this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
		$this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
		$this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
		$this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
		$this->HosoID->AdvancedSearch->save();

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

		// Field MFRCODE
		$this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->save();

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field PatID
		$this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
		$this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
		$this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
		$this->PatID->AdvancedSearch->save();

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field BRNAME
		$this->BRNAME->AdvancedSearch->SearchValue = @$filter["x_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchOperator = @$filter["z_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchCondition = @$filter["v_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchValue2 = @$filter["y_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_BRNAME"];
		$this->BRNAME->AdvancedSearch->save();

		// Field sretid
		$this->sretid->AdvancedSearch->SearchValue = @$filter["x_sretid"];
		$this->sretid->AdvancedSearch->SearchOperator = @$filter["z_sretid"];
		$this->sretid->AdvancedSearch->SearchCondition = @$filter["v_sretid"];
		$this->sretid->AdvancedSearch->SearchValue2 = @$filter["y_sretid"];
		$this->sretid->AdvancedSearch->SearchOperator2 = @$filter["w_sretid"];
		$this->sretid->AdvancedSearch->save();

		// Field sprid
		$this->sprid->AdvancedSearch->SearchValue = @$filter["x_sprid"];
		$this->sprid->AdvancedSearch->SearchOperator = @$filter["z_sprid"];
		$this->sprid->AdvancedSearch->SearchCondition = @$filter["v_sprid"];
		$this->sprid->AdvancedSearch->SearchValue2 = @$filter["y_sprid"];
		$this->sprid->AdvancedSearch->SearchOperator2 = @$filter["w_sprid"];
		$this->sprid->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->BRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DN, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RDN, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Product, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mfg, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BILLNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EMPNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DRNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BTIME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ONO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GRP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IBATCH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IPNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OPNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RECID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DCID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_USERID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FYM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRCBATCH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BILLYM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BILLGRP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->STAFF, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TEMPIPNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRNTED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PATNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PJVNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PJVSLNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PJVYM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CASHIER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CASHTIME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CASHREFNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CASHIERSHIFT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RELEASEBY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CRAUTHOR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PAYMENT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DRID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WARD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->STAXTYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DELVTIME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DELVBY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HOSPNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BRNAME, $arKeywords, $type);
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
			$this->updateSort($this->BRCODE); // BRCODE
			$this->updateSort($this->PRC); // PRC
			$this->updateSort($this->SiNo); // SiNo
			$this->updateSort($this->Product); // Product
			$this->updateSort($this->SLNO); // SLNO
			$this->updateSort($this->RT); // RT
			$this->updateSort($this->MRQ); // MRQ
			$this->updateSort($this->IQ); // IQ
			$this->updateSort($this->DAMT); // DAMT
			$this->updateSort($this->BATCHNO); // BATCHNO
			$this->updateSort($this->EXPDT); // EXPDT
			$this->updateSort($this->Mfg); // Mfg
			$this->updateSort($this->UR); // UR
			$this->updateSort($this->_USERID); // USERID
			$this->updateSort($this->id); // id
			$this->updateSort($this->HosoID); // HosoID
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->BRNAME); // BRNAME
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
				$this->sretid->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->BRCODE->setSort("");
				$this->PRC->setSort("");
				$this->SiNo->setSort("");
				$this->Product->setSort("");
				$this->SLNO->setSort("");
				$this->RT->setSort("");
				$this->MRQ->setSort("");
				$this->IQ->setSort("");
				$this->DAMT->setSort("");
				$this->BATCHNO->setSort("");
				$this->EXPDT->setSort("");
				$this->Mfg->setSort("");
				$this->UR->setSort("");
				$this->_USERID->setSort("");
				$this->id->setSort("");
				$this->HosoID->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->BRNAME->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacy_pharled_returnlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacy_pharled_returnlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_pharmacy_pharled_returnlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacy_pharled_returnlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->TYPE->CurrentValue = NULL;
		$this->TYPE->OldValue = $this->TYPE->CurrentValue;
		$this->DN->CurrentValue = NULL;
		$this->DN->OldValue = $this->DN->CurrentValue;
		$this->RDN->CurrentValue = NULL;
		$this->RDN->OldValue = $this->RDN->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->OQ->CurrentValue = NULL;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->SiNo->CurrentValue = NULL;
		$this->SiNo->OldValue = $this->SiNo->CurrentValue;
		$this->RQ->CurrentValue = NULL;
		$this->RQ->OldValue = $this->RQ->CurrentValue;
		$this->Product->CurrentValue = NULL;
		$this->Product->OldValue = $this->Product->CurrentValue;
		$this->SLNO->CurrentValue = NULL;
		$this->SLNO->OldValue = $this->SLNO->CurrentValue;
		$this->RT->CurrentValue = NULL;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->DAMT->CurrentValue = NULL;
		$this->DAMT->OldValue = $this->DAMT->CurrentValue;
		$this->BATCHNO->CurrentValue = NULL;
		$this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->Mfg->CurrentValue = NULL;
		$this->Mfg->OldValue = $this->Mfg->CurrentValue;
		$this->BILLNO->CurrentValue = NULL;
		$this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
		$this->BILLDT->CurrentValue = NULL;
		$this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
		$this->VALUE->CurrentValue = NULL;
		$this->VALUE->OldValue = $this->VALUE->CurrentValue;
		$this->DISC->CurrentValue = NULL;
		$this->DISC->OldValue = $this->DISC->CurrentValue;
		$this->TAXP->CurrentValue = NULL;
		$this->TAXP->OldValue = $this->TAXP->CurrentValue;
		$this->TAX->CurrentValue = NULL;
		$this->TAX->OldValue = $this->TAX->CurrentValue;
		$this->TAXR->CurrentValue = NULL;
		$this->TAXR->OldValue = $this->TAXR->CurrentValue;
		$this->EMPNO->CurrentValue = NULL;
		$this->EMPNO->OldValue = $this->EMPNO->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->DRNAME->CurrentValue = NULL;
		$this->DRNAME->OldValue = $this->DRNAME->CurrentValue;
		$this->BTIME->CurrentValue = NULL;
		$this->BTIME->OldValue = $this->BTIME->CurrentValue;
		$this->ONO->CurrentValue = NULL;
		$this->ONO->OldValue = $this->ONO->CurrentValue;
		$this->ODT->CurrentValue = NULL;
		$this->ODT->OldValue = $this->ODT->CurrentValue;
		$this->PURRT->CurrentValue = NULL;
		$this->PURRT->OldValue = $this->PURRT->CurrentValue;
		$this->GRP->CurrentValue = NULL;
		$this->GRP->OldValue = $this->GRP->CurrentValue;
		$this->IBATCH->CurrentValue = NULL;
		$this->IBATCH->OldValue = $this->IBATCH->CurrentValue;
		$this->IPNO->CurrentValue = NULL;
		$this->IPNO->OldValue = $this->IPNO->CurrentValue;
		$this->OPNO->CurrentValue = NULL;
		$this->OPNO->OldValue = $this->OPNO->CurrentValue;
		$this->RECID->CurrentValue = NULL;
		$this->RECID->OldValue = $this->RECID->CurrentValue;
		$this->FQTY->CurrentValue = NULL;
		$this->FQTY->OldValue = $this->FQTY->CurrentValue;
		$this->UR->CurrentValue = NULL;
		$this->UR->OldValue = $this->UR->CurrentValue;
		$this->DCID->CurrentValue = NULL;
		$this->DCID->OldValue = $this->DCID->CurrentValue;
		$this->_USERID->CurrentValue = NULL;
		$this->_USERID->OldValue = $this->_USERID->CurrentValue;
		$this->MODDT->CurrentValue = NULL;
		$this->MODDT->OldValue = $this->MODDT->CurrentValue;
		$this->FYM->CurrentValue = NULL;
		$this->FYM->OldValue = $this->FYM->CurrentValue;
		$this->PRCBATCH->CurrentValue = NULL;
		$this->PRCBATCH->OldValue = $this->PRCBATCH->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->BILLYM->CurrentValue = NULL;
		$this->BILLYM->OldValue = $this->BILLYM->CurrentValue;
		$this->BILLGRP->CurrentValue = NULL;
		$this->BILLGRP->OldValue = $this->BILLGRP->CurrentValue;
		$this->STAFF->CurrentValue = NULL;
		$this->STAFF->OldValue = $this->STAFF->CurrentValue;
		$this->TEMPIPNO->CurrentValue = NULL;
		$this->TEMPIPNO->OldValue = $this->TEMPIPNO->CurrentValue;
		$this->PRNTED->CurrentValue = NULL;
		$this->PRNTED->OldValue = $this->PRNTED->CurrentValue;
		$this->PATNAME->CurrentValue = NULL;
		$this->PATNAME->OldValue = $this->PATNAME->CurrentValue;
		$this->PJVNO->CurrentValue = NULL;
		$this->PJVNO->OldValue = $this->PJVNO->CurrentValue;
		$this->PJVSLNO->CurrentValue = NULL;
		$this->PJVSLNO->OldValue = $this->PJVSLNO->CurrentValue;
		$this->OTHDISC->CurrentValue = NULL;
		$this->OTHDISC->OldValue = $this->OTHDISC->CurrentValue;
		$this->PJVYM->CurrentValue = NULL;
		$this->PJVYM->OldValue = $this->PJVYM->CurrentValue;
		$this->PURDISCPER->CurrentValue = NULL;
		$this->PURDISCPER->OldValue = $this->PURDISCPER->CurrentValue;
		$this->CASHIER->CurrentValue = NULL;
		$this->CASHIER->OldValue = $this->CASHIER->CurrentValue;
		$this->CASHTIME->CurrentValue = NULL;
		$this->CASHTIME->OldValue = $this->CASHTIME->CurrentValue;
		$this->CASHRECD->CurrentValue = NULL;
		$this->CASHRECD->OldValue = $this->CASHRECD->CurrentValue;
		$this->CASHREFNO->CurrentValue = NULL;
		$this->CASHREFNO->OldValue = $this->CASHREFNO->CurrentValue;
		$this->CASHIERSHIFT->CurrentValue = NULL;
		$this->CASHIERSHIFT->OldValue = $this->CASHIERSHIFT->CurrentValue;
		$this->PRCODE->CurrentValue = NULL;
		$this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
		$this->RELEASEBY->CurrentValue = NULL;
		$this->RELEASEBY->OldValue = $this->RELEASEBY->CurrentValue;
		$this->CRAUTHOR->CurrentValue = NULL;
		$this->CRAUTHOR->OldValue = $this->CRAUTHOR->CurrentValue;
		$this->PAYMENT->CurrentValue = NULL;
		$this->PAYMENT->OldValue = $this->PAYMENT->CurrentValue;
		$this->DRID->CurrentValue = NULL;
		$this->DRID->OldValue = $this->DRID->CurrentValue;
		$this->WARD->CurrentValue = NULL;
		$this->WARD->OldValue = $this->WARD->CurrentValue;
		$this->STAXTYPE->CurrentValue = NULL;
		$this->STAXTYPE->OldValue = $this->STAXTYPE->CurrentValue;
		$this->PURDISCVAL->CurrentValue = NULL;
		$this->PURDISCVAL->OldValue = $this->PURDISCVAL->CurrentValue;
		$this->RNDOFF->CurrentValue = NULL;
		$this->RNDOFF->OldValue = $this->RNDOFF->CurrentValue;
		$this->DISCONMRP->CurrentValue = NULL;
		$this->DISCONMRP->OldValue = $this->DISCONMRP->CurrentValue;
		$this->DELVDT->CurrentValue = NULL;
		$this->DELVDT->OldValue = $this->DELVDT->CurrentValue;
		$this->DELVTIME->CurrentValue = NULL;
		$this->DELVTIME->OldValue = $this->DELVTIME->CurrentValue;
		$this->DELVBY->CurrentValue = NULL;
		$this->DELVBY->OldValue = $this->DELVBY->CurrentValue;
		$this->HOSPNO->CurrentValue = NULL;
		$this->HOSPNO->OldValue = $this->HOSPNO->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->pbv->CurrentValue = NULL;
		$this->pbv->OldValue = $this->pbv->CurrentValue;
		$this->pbt->CurrentValue = NULL;
		$this->pbt->OldValue = $this->pbt->CurrentValue;
		$this->HosoID->CurrentValue = NULL;
		$this->HosoID->OldValue = $this->HosoID->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->BRNAME->CurrentValue = NULL;
		$this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
		$this->sretid->CurrentValue = NULL;
		$this->sretid->OldValue = $this->sretid->CurrentValue;
		$this->sprid->CurrentValue = NULL;
		$this->sprid->OldValue = $this->sprid->CurrentValue;
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

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}
		$this->BRCODE->setOldValue($CurrentForm->getValue("o_BRCODE"));

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}
		$this->PRC->setOldValue($CurrentForm->getValue("o_PRC"));

		// Check field name 'SiNo' first before field var 'x_SiNo'
		$val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
		if (!$this->SiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SiNo->Visible = FALSE; // Disable update for API request
			else
				$this->SiNo->setFormValue($val);
		}
		$this->SiNo->setOldValue($CurrentForm->getValue("o_SiNo"));

		// Check field name 'Product' first before field var 'x_Product'
		$val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
		if (!$this->Product->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Product->Visible = FALSE; // Disable update for API request
			else
				$this->Product->setFormValue($val);
		}
		$this->Product->setOldValue($CurrentForm->getValue("o_Product"));

		// Check field name 'SLNO' first before field var 'x_SLNO'
		$val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
		if (!$this->SLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SLNO->Visible = FALSE; // Disable update for API request
			else
				$this->SLNO->setFormValue($val);
		}
		$this->SLNO->setOldValue($CurrentForm->getValue("o_SLNO"));

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}
		$this->RT->setOldValue($CurrentForm->getValue("o_RT"));

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRQ->Visible = FALSE; // Disable update for API request
			else
				$this->MRQ->setFormValue($val);
		}
		$this->MRQ->setOldValue($CurrentForm->getValue("o_MRQ"));

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}
		$this->IQ->setOldValue($CurrentForm->getValue("o_IQ"));

		// Check field name 'DAMT' first before field var 'x_DAMT'
		$val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
		if (!$this->DAMT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DAMT->Visible = FALSE; // Disable update for API request
			else
				$this->DAMT->setFormValue($val);
		}
		$this->DAMT->setOldValue($CurrentForm->getValue("o_DAMT"));

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}
		$this->BATCHNO->setOldValue($CurrentForm->getValue("o_BATCHNO"));

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}
		$this->EXPDT->setOldValue($CurrentForm->getValue("o_EXPDT"));

		// Check field name 'Mfg' first before field var 'x_Mfg'
		$val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
		if (!$this->Mfg->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mfg->Visible = FALSE; // Disable update for API request
			else
				$this->Mfg->setFormValue($val);
		}
		$this->Mfg->setOldValue($CurrentForm->getValue("o_Mfg"));

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}
		$this->UR->setOldValue($CurrentForm->getValue("o_UR"));

		// Check field name 'USERID' first before field var 'x__USERID'
		$val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
		if (!$this->_USERID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_USERID->Visible = FALSE; // Disable update for API request
			else
				$this->_USERID->setFormValue($val);
		}
		$this->_USERID->setOldValue($CurrentForm->getValue("o__USERID"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'HosoID' first before field var 'x_HosoID'
		$val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
		if (!$this->HosoID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HosoID->Visible = FALSE; // Disable update for API request
			else
				$this->HosoID->setFormValue($val);
		}
		$this->HosoID->setOldValue($CurrentForm->getValue("o_HosoID"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}
		$this->BRNAME->setOldValue($CurrentForm->getValue("o_BRNAME"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->SiNo->CurrentValue = $this->SiNo->FormValue;
		$this->Product->CurrentValue = $this->Product->FormValue;
		$this->SLNO->CurrentValue = $this->SLNO->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->DAMT->CurrentValue = $this->DAMT->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->Mfg->CurrentValue = $this->Mfg->FormValue;
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->_USERID->CurrentValue = $this->_USERID->FormValue;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->HosoID->CurrentValue = $this->HosoID->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
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
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DN->setDbValue($row['DN']);
		$this->RDN->setDbValue($row['RDN']);
		$this->DT->setDbValue($row['DT']);
		$this->PRC->setDbValue($row['PRC']);
		$this->OQ->setDbValue($row['OQ']);
		$this->SiNo->setDbValue($row['SiNo']);
		$this->RQ->setDbValue($row['RQ']);
		$this->Product->setDbValue($row['Product']);
		$this->SLNO->setDbValue($row['SLNO']);
		$this->RT->setDbValue($row['RT']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->DAMT->setDbValue($row['DAMT']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->Mfg->setDbValue($row['Mfg']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->VALUE->setDbValue($row['VALUE']);
		$this->DISC->setDbValue($row['DISC']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->TAX->setDbValue($row['TAX']);
		$this->TAXR->setDbValue($row['TAXR']);
		$this->EMPNO->setDbValue($row['EMPNO']);
		$this->PC->setDbValue($row['PC']);
		$this->DRNAME->setDbValue($row['DRNAME']);
		$this->BTIME->setDbValue($row['BTIME']);
		$this->ONO->setDbValue($row['ONO']);
		$this->ODT->setDbValue($row['ODT']);
		$this->PURRT->setDbValue($row['PURRT']);
		$this->GRP->setDbValue($row['GRP']);
		$this->IBATCH->setDbValue($row['IBATCH']);
		$this->IPNO->setDbValue($row['IPNO']);
		$this->OPNO->setDbValue($row['OPNO']);
		$this->RECID->setDbValue($row['RECID']);
		$this->FQTY->setDbValue($row['FQTY']);
		$this->UR->setDbValue($row['UR']);
		$this->DCID->setDbValue($row['DCID']);
		$this->_USERID->setDbValue($row['USERID']);
		$this->MODDT->setDbValue($row['MODDT']);
		$this->FYM->setDbValue($row['FYM']);
		$this->PRCBATCH->setDbValue($row['PRCBATCH']);
		$this->MRP->setDbValue($row['MRP']);
		$this->BILLYM->setDbValue($row['BILLYM']);
		$this->BILLGRP->setDbValue($row['BILLGRP']);
		$this->STAFF->setDbValue($row['STAFF']);
		$this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
		$this->PRNTED->setDbValue($row['PRNTED']);
		$this->PATNAME->setDbValue($row['PATNAME']);
		$this->PJVNO->setDbValue($row['PJVNO']);
		$this->PJVSLNO->setDbValue($row['PJVSLNO']);
		$this->OTHDISC->setDbValue($row['OTHDISC']);
		$this->PJVYM->setDbValue($row['PJVYM']);
		$this->PURDISCPER->setDbValue($row['PURDISCPER']);
		$this->CASHIER->setDbValue($row['CASHIER']);
		$this->CASHTIME->setDbValue($row['CASHTIME']);
		$this->CASHRECD->setDbValue($row['CASHRECD']);
		$this->CASHREFNO->setDbValue($row['CASHREFNO']);
		$this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->RELEASEBY->setDbValue($row['RELEASEBY']);
		$this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
		$this->PAYMENT->setDbValue($row['PAYMENT']);
		$this->DRID->setDbValue($row['DRID']);
		$this->WARD->setDbValue($row['WARD']);
		$this->STAXTYPE->setDbValue($row['STAXTYPE']);
		$this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
		$this->RNDOFF->setDbValue($row['RNDOFF']);
		$this->DISCONMRP->setDbValue($row['DISCONMRP']);
		$this->DELVDT->setDbValue($row['DELVDT']);
		$this->DELVTIME->setDbValue($row['DELVTIME']);
		$this->DELVBY->setDbValue($row['DELVBY']);
		$this->HOSPNO->setDbValue($row['HOSPNO']);
		$this->id->setDbValue($row['id']);
		$this->pbv->setDbValue($row['pbv']);
		$this->pbt->setDbValue($row['pbt']);
		$this->HosoID->setDbValue($row['HosoID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatID->setDbValue($row['PatID']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->BRNAME->setDbValue($row['BRNAME']);
		$this->sretid->setDbValue($row['sretid']);
		$this->sprid->setDbValue($row['sprid']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['TYPE'] = $this->TYPE->CurrentValue;
		$row['DN'] = $this->DN->CurrentValue;
		$row['RDN'] = $this->RDN->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['SiNo'] = $this->SiNo->CurrentValue;
		$row['RQ'] = $this->RQ->CurrentValue;
		$row['Product'] = $this->Product->CurrentValue;
		$row['SLNO'] = $this->SLNO->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['DAMT'] = $this->DAMT->CurrentValue;
		$row['BATCHNO'] = $this->BATCHNO->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['Mfg'] = $this->Mfg->CurrentValue;
		$row['BILLNO'] = $this->BILLNO->CurrentValue;
		$row['BILLDT'] = $this->BILLDT->CurrentValue;
		$row['VALUE'] = $this->VALUE->CurrentValue;
		$row['DISC'] = $this->DISC->CurrentValue;
		$row['TAXP'] = $this->TAXP->CurrentValue;
		$row['TAX'] = $this->TAX->CurrentValue;
		$row['TAXR'] = $this->TAXR->CurrentValue;
		$row['EMPNO'] = $this->EMPNO->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['DRNAME'] = $this->DRNAME->CurrentValue;
		$row['BTIME'] = $this->BTIME->CurrentValue;
		$row['ONO'] = $this->ONO->CurrentValue;
		$row['ODT'] = $this->ODT->CurrentValue;
		$row['PURRT'] = $this->PURRT->CurrentValue;
		$row['GRP'] = $this->GRP->CurrentValue;
		$row['IBATCH'] = $this->IBATCH->CurrentValue;
		$row['IPNO'] = $this->IPNO->CurrentValue;
		$row['OPNO'] = $this->OPNO->CurrentValue;
		$row['RECID'] = $this->RECID->CurrentValue;
		$row['FQTY'] = $this->FQTY->CurrentValue;
		$row['UR'] = $this->UR->CurrentValue;
		$row['DCID'] = $this->DCID->CurrentValue;
		$row['USERID'] = $this->_USERID->CurrentValue;
		$row['MODDT'] = $this->MODDT->CurrentValue;
		$row['FYM'] = $this->FYM->CurrentValue;
		$row['PRCBATCH'] = $this->PRCBATCH->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['BILLYM'] = $this->BILLYM->CurrentValue;
		$row['BILLGRP'] = $this->BILLGRP->CurrentValue;
		$row['STAFF'] = $this->STAFF->CurrentValue;
		$row['TEMPIPNO'] = $this->TEMPIPNO->CurrentValue;
		$row['PRNTED'] = $this->PRNTED->CurrentValue;
		$row['PATNAME'] = $this->PATNAME->CurrentValue;
		$row['PJVNO'] = $this->PJVNO->CurrentValue;
		$row['PJVSLNO'] = $this->PJVSLNO->CurrentValue;
		$row['OTHDISC'] = $this->OTHDISC->CurrentValue;
		$row['PJVYM'] = $this->PJVYM->CurrentValue;
		$row['PURDISCPER'] = $this->PURDISCPER->CurrentValue;
		$row['CASHIER'] = $this->CASHIER->CurrentValue;
		$row['CASHTIME'] = $this->CASHTIME->CurrentValue;
		$row['CASHRECD'] = $this->CASHRECD->CurrentValue;
		$row['CASHREFNO'] = $this->CASHREFNO->CurrentValue;
		$row['CASHIERSHIFT'] = $this->CASHIERSHIFT->CurrentValue;
		$row['PRCODE'] = $this->PRCODE->CurrentValue;
		$row['RELEASEBY'] = $this->RELEASEBY->CurrentValue;
		$row['CRAUTHOR'] = $this->CRAUTHOR->CurrentValue;
		$row['PAYMENT'] = $this->PAYMENT->CurrentValue;
		$row['DRID'] = $this->DRID->CurrentValue;
		$row['WARD'] = $this->WARD->CurrentValue;
		$row['STAXTYPE'] = $this->STAXTYPE->CurrentValue;
		$row['PURDISCVAL'] = $this->PURDISCVAL->CurrentValue;
		$row['RNDOFF'] = $this->RNDOFF->CurrentValue;
		$row['DISCONMRP'] = $this->DISCONMRP->CurrentValue;
		$row['DELVDT'] = $this->DELVDT->CurrentValue;
		$row['DELVTIME'] = $this->DELVTIME->CurrentValue;
		$row['DELVBY'] = $this->DELVBY->CurrentValue;
		$row['HOSPNO'] = $this->HOSPNO->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['pbv'] = $this->pbv->CurrentValue;
		$row['pbt'] = $this->pbt->CurrentValue;
		$row['HosoID'] = $this->HosoID->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['BRNAME'] = $this->BRNAME->CurrentValue;
		$row['sretid'] = $this->sretid->CurrentValue;
		$row['sprid'] = $this->sprid->CurrentValue;
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
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue)))
			$this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue)))
			$this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BRCODE
		// TYPE
		// DN
		// RDN
		// DT
		// PRC
		// OQ
		// SiNo
		// RQ
		// Product
		// SLNO
		// RT
		// MRQ
		// IQ
		// DAMT
		// BATCHNO
		// EXPDT
		// Mfg
		// BILLNO
		// BILLDT
		// VALUE
		// DISC
		// TAXP
		// TAX
		// TAXR
		// EMPNO
		// PC
		// DRNAME
		// BTIME
		// ONO
		// ODT
		// PURRT
		// GRP
		// IBATCH
		// IPNO
		// OPNO
		// RECID
		// FQTY
		// UR
		// DCID
		// USERID
		// MODDT
		// FYM
		// PRCBATCH
		// MRP
		// BILLYM
		// BILLGRP
		// STAFF
		// TEMPIPNO
		// PRNTED
		// PATNAME
		// PJVNO
		// PJVSLNO
		// OTHDISC
		// PJVYM
		// PURDISCPER
		// CASHIER
		// CASHTIME
		// CASHRECD
		// CASHREFNO
		// CASHIERSHIFT
		// PRCODE
		// RELEASEBY
		// CRAUTHOR
		// PAYMENT
		// DRID
		// WARD
		// STAXTYPE
		// PURDISCVAL
		// RNDOFF
		// DISCONMRP
		// DELVDT
		// DELVTIME
		// DELVBY
		// HOSPNO
		// id
		// pbv
		// pbt
		// HosoID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// MFRCODE
		// Reception
		// PatID
		// mrnno
		// BRNAME
		// sretid
		// sprid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// TYPE
			$this->TYPE->ViewValue = $this->TYPE->CurrentValue;
			$this->TYPE->ViewCustomAttributes = "";

			// DN
			$this->DN->ViewValue = $this->DN->CurrentValue;
			$this->DN->ViewCustomAttributes = "";

			// RDN
			$this->RDN->ViewValue = $this->RDN->CurrentValue;
			$this->RDN->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// OQ
			$this->OQ->ViewValue = $this->OQ->CurrentValue;
			$this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
			$this->OQ->ViewCustomAttributes = "";

			// SiNo
			$this->SiNo->ViewValue = $this->SiNo->CurrentValue;
			$this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
			$this->SiNo->ViewCustomAttributes = "";

			// RQ
			$this->RQ->ViewValue = $this->RQ->CurrentValue;
			$this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
			$this->RQ->ViewCustomAttributes = "";

			// Product
			$this->Product->ViewValue = $this->Product->CurrentValue;
			$this->Product->ViewCustomAttributes = "";

			// SLNO
			$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->ViewValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = FormatDateTime($rswrk->fields('df4'), 0);
						$this->SLNO->ViewValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
					}
				}
			} else {
				$this->SLNO->ViewValue = NULL;
			}
			$this->SLNO->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
			$this->MRQ->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// DAMT
			$this->DAMT->ViewValue = $this->DAMT->CurrentValue;
			$this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
			$this->DAMT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// Mfg
			$this->Mfg->ViewValue = $this->Mfg->CurrentValue;
			$this->Mfg->ViewCustomAttributes = "";

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// VALUE
			$this->VALUE->ViewValue = $this->VALUE->CurrentValue;
			$this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
			$this->VALUE->ViewCustomAttributes = "";

			// DISC
			$this->DISC->ViewValue = $this->DISC->CurrentValue;
			$this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
			$this->DISC->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// TAX
			$this->TAX->ViewValue = $this->TAX->CurrentValue;
			$this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
			$this->TAX->ViewCustomAttributes = "";

			// TAXR
			$this->TAXR->ViewValue = $this->TAXR->CurrentValue;
			$this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
			$this->TAXR->ViewCustomAttributes = "";

			// EMPNO
			$this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
			$this->EMPNO->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// DRNAME
			$this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
			$this->DRNAME->ViewCustomAttributes = "";

			// BTIME
			$this->BTIME->ViewValue = $this->BTIME->CurrentValue;
			$this->BTIME->ViewCustomAttributes = "";

			// ONO
			$this->ONO->ViewValue = $this->ONO->CurrentValue;
			$this->ONO->ViewCustomAttributes = "";

			// ODT
			$this->ODT->ViewValue = $this->ODT->CurrentValue;
			$this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
			$this->ODT->ViewCustomAttributes = "";

			// PURRT
			$this->PURRT->ViewValue = $this->PURRT->CurrentValue;
			$this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
			$this->PURRT->ViewCustomAttributes = "";

			// GRP
			$this->GRP->ViewValue = $this->GRP->CurrentValue;
			$this->GRP->ViewCustomAttributes = "";

			// IBATCH
			$this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
			$this->IBATCH->ViewCustomAttributes = "";

			// IPNO
			$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
			$this->IPNO->ViewCustomAttributes = "";

			// OPNO
			$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
			$this->OPNO->ViewCustomAttributes = "";

			// RECID
			$this->RECID->ViewValue = $this->RECID->CurrentValue;
			$this->RECID->ViewCustomAttributes = "";

			// FQTY
			$this->FQTY->ViewValue = $this->FQTY->CurrentValue;
			$this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
			$this->FQTY->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// DCID
			$this->DCID->ViewValue = $this->DCID->CurrentValue;
			$this->DCID->ViewCustomAttributes = "";

			// USERID
			$this->_USERID->ViewValue = $this->_USERID->CurrentValue;
			$this->_USERID->ViewCustomAttributes = "";

			// MODDT
			$this->MODDT->ViewValue = $this->MODDT->CurrentValue;
			$this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
			$this->MODDT->ViewCustomAttributes = "";

			// FYM
			$this->FYM->ViewValue = $this->FYM->CurrentValue;
			$this->FYM->ViewCustomAttributes = "";

			// PRCBATCH
			$this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
			$this->PRCBATCH->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// BILLYM
			$this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
			$this->BILLYM->ViewCustomAttributes = "";

			// BILLGRP
			$this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
			$this->BILLGRP->ViewCustomAttributes = "";

			// STAFF
			$this->STAFF->ViewValue = $this->STAFF->CurrentValue;
			$this->STAFF->ViewCustomAttributes = "";

			// TEMPIPNO
			$this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
			$this->TEMPIPNO->ViewCustomAttributes = "";

			// PRNTED
			$this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
			$this->PRNTED->ViewCustomAttributes = "";

			// PATNAME
			$this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
			$this->PATNAME->ViewCustomAttributes = "";

			// PJVNO
			$this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
			$this->PJVNO->ViewCustomAttributes = "";

			// PJVSLNO
			$this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
			$this->PJVSLNO->ViewCustomAttributes = "";

			// OTHDISC
			$this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
			$this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
			$this->OTHDISC->ViewCustomAttributes = "";

			// PJVYM
			$this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
			$this->PJVYM->ViewCustomAttributes = "";

			// PURDISCPER
			$this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
			$this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
			$this->PURDISCPER->ViewCustomAttributes = "";

			// CASHIER
			$this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
			$this->CASHIER->ViewCustomAttributes = "";

			// CASHTIME
			$this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
			$this->CASHTIME->ViewCustomAttributes = "";

			// CASHRECD
			$this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
			$this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
			$this->CASHRECD->ViewCustomAttributes = "";

			// CASHREFNO
			$this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
			$this->CASHREFNO->ViewCustomAttributes = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
			$this->CASHIERSHIFT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// RELEASEBY
			$this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
			$this->RELEASEBY->ViewCustomAttributes = "";

			// CRAUTHOR
			$this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
			$this->CRAUTHOR->ViewCustomAttributes = "";

			// PAYMENT
			$this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
			$this->PAYMENT->ViewCustomAttributes = "";

			// DRID
			$this->DRID->ViewValue = $this->DRID->CurrentValue;
			$this->DRID->ViewCustomAttributes = "";

			// WARD
			$this->WARD->ViewValue = $this->WARD->CurrentValue;
			$this->WARD->ViewCustomAttributes = "";

			// STAXTYPE
			$this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
			$this->STAXTYPE->ViewCustomAttributes = "";

			// PURDISCVAL
			$this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
			$this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
			$this->PURDISCVAL->ViewCustomAttributes = "";

			// RNDOFF
			$this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
			$this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
			$this->RNDOFF->ViewCustomAttributes = "";

			// DISCONMRP
			$this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
			$this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
			$this->DISCONMRP->ViewCustomAttributes = "";

			// DELVDT
			$this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
			$this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
			$this->DELVDT->ViewCustomAttributes = "";

			// DELVTIME
			$this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
			$this->DELVTIME->ViewCustomAttributes = "";

			// DELVBY
			$this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
			$this->DELVBY->ViewCustomAttributes = "";

			// HOSPNO
			$this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
			$this->HOSPNO->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pbv
			$this->pbv->ViewValue = $this->pbv->CurrentValue;
			$this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
			$this->pbv->ViewCustomAttributes = "";

			// pbt
			$this->pbt->ViewValue = $this->pbt->CurrentValue;
			$this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
			$this->pbt->ViewCustomAttributes = "";

			// HosoID
			$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
			$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
			$this->HosoID->ViewCustomAttributes = "";

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

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// sretid
			$this->sretid->ViewValue = $this->sretid->CurrentValue;
			$this->sretid->ViewValue = FormatNumber($this->sretid->ViewValue, 0, -2, -2, -2);
			$this->sretid->ViewCustomAttributes = "";

			// sprid
			$this->sprid->ViewValue = $this->sprid->CurrentValue;
			$this->sprid->ViewValue = FormatNumber($this->sprid->ViewValue, 0, -2, -2, -2);
			$this->sprid->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";
			$this->SiNo->TooltipValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";
			$this->Product->TooltipValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";
			$this->SLNO->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";
			$this->DAMT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";
			$this->Mfg->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";
			$this->_USERID->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";
			$this->HosoID->TooltipValue = "";

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

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// SiNo
			$this->SiNo->EditAttrs["class"] = "form-control";
			$this->SiNo->EditCustomAttributes = "";
			$this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
			$this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

			// Product
			$this->Product->EditAttrs["class"] = "form-control";
			$this->Product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
			$this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
			$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

			// SLNO
			$this->SLNO->EditAttrs["class"] = "form-control";
			$this->SLNO->EditCustomAttributes = "";
			$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$arwrk[4] = HtmlEncode(FormatDateTime($rswrk->fields('df4'), 0));
						$this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
					}
				}
			} else {
				$this->SLNO->EditValue = NULL;
			}
			$this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue)) {
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
				$this->RT->OldValue = $this->RT->EditValue;
			}

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
			if (strval($this->MRQ->EditValue) <> "" && is_numeric($this->MRQ->EditValue)) {
				$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
				$this->MRQ->OldValue = $this->MRQ->EditValue;
			}

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue)) {
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
				$this->IQ->OldValue = $this->IQ->EditValue;
			}

			// DAMT
			$this->DAMT->EditAttrs["class"] = "form-control";
			$this->DAMT->EditCustomAttributes = "";
			$this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
			$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
			if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue)) {
				$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
				$this->DAMT->OldValue = $this->DAMT->EditValue;
			}

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// Mfg
			$this->Mfg->EditAttrs["class"] = "form-control";
			$this->Mfg->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
			$this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
			$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue)) {
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
				$this->UR->OldValue = $this->UR->EditValue;
			}

			// USERID
			// id
			// HosoID
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// BRNAME
			// Add refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";

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

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// SiNo
			$this->SiNo->EditAttrs["class"] = "form-control";
			$this->SiNo->EditCustomAttributes = "";
			$this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
			$this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

			// Product
			$this->Product->EditAttrs["class"] = "form-control";
			$this->Product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
			$this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
			$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

			// SLNO
			$this->SLNO->EditAttrs["class"] = "form-control";
			$this->SLNO->EditCustomAttributes = "";
			$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$arwrk[4] = HtmlEncode(FormatDateTime($rswrk->fields('df4'), 0));
						$this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
					}
				}
			} else {
				$this->SLNO->EditValue = NULL;
			}
			$this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue)) {
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
				$this->RT->OldValue = $this->RT->EditValue;
			}

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
			if (strval($this->MRQ->EditValue) <> "" && is_numeric($this->MRQ->EditValue)) {
				$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
				$this->MRQ->OldValue = $this->MRQ->EditValue;
			}

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue)) {
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
				$this->IQ->OldValue = $this->IQ->EditValue;
			}

			// DAMT
			$this->DAMT->EditAttrs["class"] = "form-control";
			$this->DAMT->EditCustomAttributes = "";
			$this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
			$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
			if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue)) {
				$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
				$this->DAMT->OldValue = $this->DAMT->EditValue;
			}

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// Mfg
			$this->Mfg->EditAttrs["class"] = "form-control";
			$this->Mfg->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
			$this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
			$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue)) {
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
				$this->UR->OldValue = $this->UR->EditValue;
			}

			// USERID
			// id

			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// HosoID
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// BRNAME
			// Edit refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";

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

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
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
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DN->Required) {
			if (!$this->DN->IsDetailKey && $this->DN->FormValue != NULL && $this->DN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DN->caption(), $this->DN->RequiredErrorMessage));
			}
		}
		if ($this->RDN->Required) {
			if (!$this->RDN->IsDetailKey && $this->RDN->FormValue != NULL && $this->RDN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RDN->caption(), $this->RDN->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if ($this->SiNo->Required) {
			if (!$this->SiNo->IsDetailKey && $this->SiNo->FormValue != NULL && $this->SiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SiNo->FormValue)) {
			AddMessage($FormError, $this->SiNo->errorMessage());
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if ($this->Product->Required) {
			if (!$this->Product->IsDetailKey && $this->Product->FormValue != NULL && $this->Product->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
			}
		}
		if ($this->SLNO->Required) {
			if (!$this->SLNO->IsDetailKey && $this->SLNO->FormValue != NULL && $this->SLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SLNO->FormValue)) {
			AddMessage($FormError, $this->SLNO->errorMessage());
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRQ->FormValue)) {
			AddMessage($FormError, $this->MRQ->errorMessage());
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->DAMT->Required) {
			if (!$this->DAMT->IsDetailKey && $this->DAMT->FormValue != NULL && $this->DAMT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DAMT->FormValue)) {
			AddMessage($FormError, $this->DAMT->errorMessage());
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->Mfg->Required) {
			if (!$this->Mfg->IsDetailKey && $this->Mfg->FormValue != NULL && $this->Mfg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
			}
		}
		if ($this->BILLNO->Required) {
			if (!$this->BILLNO->IsDetailKey && $this->BILLNO->FormValue != NULL && $this->BILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
			}
		}
		if ($this->BILLDT->Required) {
			if (!$this->BILLDT->IsDetailKey && $this->BILLDT->FormValue != NULL && $this->BILLDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
			}
		}
		if ($this->VALUE->Required) {
			if (!$this->VALUE->IsDetailKey && $this->VALUE->FormValue != NULL && $this->VALUE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VALUE->caption(), $this->VALUE->RequiredErrorMessage));
			}
		}
		if ($this->DISC->Required) {
			if (!$this->DISC->IsDetailKey && $this->DISC->FormValue != NULL && $this->DISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISC->caption(), $this->DISC->RequiredErrorMessage));
			}
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if ($this->TAX->Required) {
			if (!$this->TAX->IsDetailKey && $this->TAX->FormValue != NULL && $this->TAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAX->caption(), $this->TAX->RequiredErrorMessage));
			}
		}
		if ($this->TAXR->Required) {
			if (!$this->TAXR->IsDetailKey && $this->TAXR->FormValue != NULL && $this->TAXR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXR->caption(), $this->TAXR->RequiredErrorMessage));
			}
		}
		if ($this->EMPNO->Required) {
			if (!$this->EMPNO->IsDetailKey && $this->EMPNO->FormValue != NULL && $this->EMPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EMPNO->caption(), $this->EMPNO->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->DRNAME->Required) {
			if (!$this->DRNAME->IsDetailKey && $this->DRNAME->FormValue != NULL && $this->DRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRNAME->caption(), $this->DRNAME->RequiredErrorMessage));
			}
		}
		if ($this->BTIME->Required) {
			if (!$this->BTIME->IsDetailKey && $this->BTIME->FormValue != NULL && $this->BTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BTIME->caption(), $this->BTIME->RequiredErrorMessage));
			}
		}
		if ($this->ONO->Required) {
			if (!$this->ONO->IsDetailKey && $this->ONO->FormValue != NULL && $this->ONO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ONO->caption(), $this->ONO->RequiredErrorMessage));
			}
		}
		if ($this->ODT->Required) {
			if (!$this->ODT->IsDetailKey && $this->ODT->FormValue != NULL && $this->ODT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ODT->caption(), $this->ODT->RequiredErrorMessage));
			}
		}
		if ($this->PURRT->Required) {
			if (!$this->PURRT->IsDetailKey && $this->PURRT->FormValue != NULL && $this->PURRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURRT->caption(), $this->PURRT->RequiredErrorMessage));
			}
		}
		if ($this->GRP->Required) {
			if (!$this->GRP->IsDetailKey && $this->GRP->FormValue != NULL && $this->GRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRP->caption(), $this->GRP->RequiredErrorMessage));
			}
		}
		if ($this->IBATCH->Required) {
			if (!$this->IBATCH->IsDetailKey && $this->IBATCH->FormValue != NULL && $this->IBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IBATCH->caption(), $this->IBATCH->RequiredErrorMessage));
			}
		}
		if ($this->IPNO->Required) {
			if (!$this->IPNO->IsDetailKey && $this->IPNO->FormValue != NULL && $this->IPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
			}
		}
		if ($this->OPNO->Required) {
			if (!$this->OPNO->IsDetailKey && $this->OPNO->FormValue != NULL && $this->OPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
			}
		}
		if ($this->RECID->Required) {
			if (!$this->RECID->IsDetailKey && $this->RECID->FormValue != NULL && $this->RECID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RECID->caption(), $this->RECID->RequiredErrorMessage));
			}
		}
		if ($this->FQTY->Required) {
			if (!$this->FQTY->IsDetailKey && $this->FQTY->FormValue != NULL && $this->FQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FQTY->caption(), $this->FQTY->RequiredErrorMessage));
			}
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->DCID->Required) {
			if (!$this->DCID->IsDetailKey && $this->DCID->FormValue != NULL && $this->DCID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DCID->caption(), $this->DCID->RequiredErrorMessage));
			}
		}
		if ($this->_USERID->Required) {
			if (!$this->_USERID->IsDetailKey && $this->_USERID->FormValue != NULL && $this->_USERID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
			}
		}
		if ($this->MODDT->Required) {
			if (!$this->MODDT->IsDetailKey && $this->MODDT->FormValue != NULL && $this->MODDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MODDT->caption(), $this->MODDT->RequiredErrorMessage));
			}
		}
		if ($this->FYM->Required) {
			if (!$this->FYM->IsDetailKey && $this->FYM->FormValue != NULL && $this->FYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FYM->caption(), $this->FYM->RequiredErrorMessage));
			}
		}
		if ($this->PRCBATCH->Required) {
			if (!$this->PRCBATCH->IsDetailKey && $this->PRCBATCH->FormValue != NULL && $this->PRCBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCBATCH->caption(), $this->PRCBATCH->RequiredErrorMessage));
			}
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if ($this->BILLYM->Required) {
			if (!$this->BILLYM->IsDetailKey && $this->BILLYM->FormValue != NULL && $this->BILLYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLYM->caption(), $this->BILLYM->RequiredErrorMessage));
			}
		}
		if ($this->BILLGRP->Required) {
			if (!$this->BILLGRP->IsDetailKey && $this->BILLGRP->FormValue != NULL && $this->BILLGRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLGRP->caption(), $this->BILLGRP->RequiredErrorMessage));
			}
		}
		if ($this->STAFF->Required) {
			if (!$this->STAFF->IsDetailKey && $this->STAFF->FormValue != NULL && $this->STAFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAFF->caption(), $this->STAFF->RequiredErrorMessage));
			}
		}
		if ($this->TEMPIPNO->Required) {
			if (!$this->TEMPIPNO->IsDetailKey && $this->TEMPIPNO->FormValue != NULL && $this->TEMPIPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMPIPNO->caption(), $this->TEMPIPNO->RequiredErrorMessage));
			}
		}
		if ($this->PRNTED->Required) {
			if (!$this->PRNTED->IsDetailKey && $this->PRNTED->FormValue != NULL && $this->PRNTED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRNTED->caption(), $this->PRNTED->RequiredErrorMessage));
			}
		}
		if ($this->PATNAME->Required) {
			if (!$this->PATNAME->IsDetailKey && $this->PATNAME->FormValue != NULL && $this->PATNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PATNAME->caption(), $this->PATNAME->RequiredErrorMessage));
			}
		}
		if ($this->PJVNO->Required) {
			if (!$this->PJVNO->IsDetailKey && $this->PJVNO->FormValue != NULL && $this->PJVNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVNO->caption(), $this->PJVNO->RequiredErrorMessage));
			}
		}
		if ($this->PJVSLNO->Required) {
			if (!$this->PJVSLNO->IsDetailKey && $this->PJVSLNO->FormValue != NULL && $this->PJVSLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVSLNO->caption(), $this->PJVSLNO->RequiredErrorMessage));
			}
		}
		if ($this->OTHDISC->Required) {
			if (!$this->OTHDISC->IsDetailKey && $this->OTHDISC->FormValue != NULL && $this->OTHDISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTHDISC->caption(), $this->OTHDISC->RequiredErrorMessage));
			}
		}
		if ($this->PJVYM->Required) {
			if (!$this->PJVYM->IsDetailKey && $this->PJVYM->FormValue != NULL && $this->PJVYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVYM->caption(), $this->PJVYM->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCPER->Required) {
			if (!$this->PURDISCPER->IsDetailKey && $this->PURDISCPER->FormValue != NULL && $this->PURDISCPER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCPER->caption(), $this->PURDISCPER->RequiredErrorMessage));
			}
		}
		if ($this->CASHIER->Required) {
			if (!$this->CASHIER->IsDetailKey && $this->CASHIER->FormValue != NULL && $this->CASHIER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIER->caption(), $this->CASHIER->RequiredErrorMessage));
			}
		}
		if ($this->CASHTIME->Required) {
			if (!$this->CASHTIME->IsDetailKey && $this->CASHTIME->FormValue != NULL && $this->CASHTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHTIME->caption(), $this->CASHTIME->RequiredErrorMessage));
			}
		}
		if ($this->CASHRECD->Required) {
			if (!$this->CASHRECD->IsDetailKey && $this->CASHRECD->FormValue != NULL && $this->CASHRECD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHRECD->caption(), $this->CASHRECD->RequiredErrorMessage));
			}
		}
		if ($this->CASHREFNO->Required) {
			if (!$this->CASHREFNO->IsDetailKey && $this->CASHREFNO->FormValue != NULL && $this->CASHREFNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHREFNO->caption(), $this->CASHREFNO->RequiredErrorMessage));
			}
		}
		if ($this->CASHIERSHIFT->Required) {
			if (!$this->CASHIERSHIFT->IsDetailKey && $this->CASHIERSHIFT->FormValue != NULL && $this->CASHIERSHIFT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIERSHIFT->caption(), $this->CASHIERSHIFT->RequiredErrorMessage));
			}
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->RELEASEBY->Required) {
			if (!$this->RELEASEBY->IsDetailKey && $this->RELEASEBY->FormValue != NULL && $this->RELEASEBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RELEASEBY->caption(), $this->RELEASEBY->RequiredErrorMessage));
			}
		}
		if ($this->CRAUTHOR->Required) {
			if (!$this->CRAUTHOR->IsDetailKey && $this->CRAUTHOR->FormValue != NULL && $this->CRAUTHOR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CRAUTHOR->caption(), $this->CRAUTHOR->RequiredErrorMessage));
			}
		}
		if ($this->PAYMENT->Required) {
			if (!$this->PAYMENT->IsDetailKey && $this->PAYMENT->FormValue != NULL && $this->PAYMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PAYMENT->caption(), $this->PAYMENT->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->WARD->Required) {
			if (!$this->WARD->IsDetailKey && $this->WARD->FormValue != NULL && $this->WARD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WARD->caption(), $this->WARD->RequiredErrorMessage));
			}
		}
		if ($this->STAXTYPE->Required) {
			if (!$this->STAXTYPE->IsDetailKey && $this->STAXTYPE->FormValue != NULL && $this->STAXTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAXTYPE->caption(), $this->STAXTYPE->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCVAL->Required) {
			if (!$this->PURDISCVAL->IsDetailKey && $this->PURDISCVAL->FormValue != NULL && $this->PURDISCVAL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCVAL->caption(), $this->PURDISCVAL->RequiredErrorMessage));
			}
		}
		if ($this->RNDOFF->Required) {
			if (!$this->RNDOFF->IsDetailKey && $this->RNDOFF->FormValue != NULL && $this->RNDOFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RNDOFF->caption(), $this->RNDOFF->RequiredErrorMessage));
			}
		}
		if ($this->DISCONMRP->Required) {
			if (!$this->DISCONMRP->IsDetailKey && $this->DISCONMRP->FormValue != NULL && $this->DISCONMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISCONMRP->caption(), $this->DISCONMRP->RequiredErrorMessage));
			}
		}
		if ($this->DELVDT->Required) {
			if (!$this->DELVDT->IsDetailKey && $this->DELVDT->FormValue != NULL && $this->DELVDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVDT->caption(), $this->DELVDT->RequiredErrorMessage));
			}
		}
		if ($this->DELVTIME->Required) {
			if (!$this->DELVTIME->IsDetailKey && $this->DELVTIME->FormValue != NULL && $this->DELVTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVTIME->caption(), $this->DELVTIME->RequiredErrorMessage));
			}
		}
		if ($this->DELVBY->Required) {
			if (!$this->DELVBY->IsDetailKey && $this->DELVBY->FormValue != NULL && $this->DELVBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVBY->caption(), $this->DELVBY->RequiredErrorMessage));
			}
		}
		if ($this->HOSPNO->Required) {
			if (!$this->HOSPNO->IsDetailKey && $this->HOSPNO->FormValue != NULL && $this->HOSPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOSPNO->caption(), $this->HOSPNO->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->pbv->Required) {
			if (!$this->pbv->IsDetailKey && $this->pbv->FormValue != NULL && $this->pbv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbv->caption(), $this->pbv->RequiredErrorMessage));
			}
		}
		if ($this->pbt->Required) {
			if (!$this->pbt->IsDetailKey && $this->pbt->FormValue != NULL && $this->pbt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbt->caption(), $this->pbt->RequiredErrorMessage));
			}
		}
		if ($this->HosoID->Required) {
			if (!$this->HosoID->IsDetailKey && $this->HosoID->FormValue != NULL && $this->HosoID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
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
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
			}
		}
		if ($this->sretid->Required) {
			if (!$this->sretid->IsDetailKey && $this->sretid->FormValue != NULL && $this->sretid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sretid->caption(), $this->sretid->RequiredErrorMessage));
			}
		}
		if ($this->sprid->Required) {
			if (!$this->sprid->IsDetailKey && $this->sprid->FormValue != NULL && $this->sprid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sprid->caption(), $this->sprid->RequiredErrorMessage));
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

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// SiNo
			$this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, NULL, $this->SiNo->ReadOnly);

			// Product
			$this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, NULL, $this->Product->ReadOnly);

			// SLNO
			$this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, NULL, $this->SLNO->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// DAMT
			$this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, NULL, $this->DAMT->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// Mfg
			$this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, NULL, $this->Mfg->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// USERID
			$this->_USERID->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['USERID'] = &$this->_USERID->DbValue;

			// HosoID
			$this->HosoID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HosoID'] = &$this->HosoID->DbValue;

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// BRNAME
			$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

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
		$hash .= GetFieldHash($rs->fields('BRCODE')); // BRCODE
		$hash .= GetFieldHash($rs->fields('PRC')); // PRC
		$hash .= GetFieldHash($rs->fields('SiNo')); // SiNo
		$hash .= GetFieldHash($rs->fields('Product')); // Product
		$hash .= GetFieldHash($rs->fields('SLNO')); // SLNO
		$hash .= GetFieldHash($rs->fields('RT')); // RT
		$hash .= GetFieldHash($rs->fields('MRQ')); // MRQ
		$hash .= GetFieldHash($rs->fields('IQ')); // IQ
		$hash .= GetFieldHash($rs->fields('DAMT')); // DAMT
		$hash .= GetFieldHash($rs->fields('BATCHNO')); // BATCHNO
		$hash .= GetFieldHash($rs->fields('EXPDT')); // EXPDT
		$hash .= GetFieldHash($rs->fields('Mfg')); // Mfg
		$hash .= GetFieldHash($rs->fields('UR')); // UR
		$hash .= GetFieldHash($rs->fields('USERID')); // USERID
		$hash .= GetFieldHash($rs->fields('HosoID')); // HosoID
		$hash .= GetFieldHash($rs->fields('createdby')); // createdby
		$hash .= GetFieldHash($rs->fields('createddatetime')); // createddatetime
		$hash .= GetFieldHash($rs->fields('modifiedby')); // modifiedby
		$hash .= GetFieldHash($rs->fields('modifieddatetime')); // modifieddatetime
		$hash .= GetFieldHash($rs->fields('BRNAME')); // BRNAME
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

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// SiNo
		$this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, NULL, FALSE);

		// Product
		$this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, NULL, FALSE);

		// SLNO
		$this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, NULL, FALSE);

		// RT
		$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, FALSE);

		// MRQ
		$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, FALSE);

		// IQ
		$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, FALSE);

		// DAMT
		$this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, NULL, FALSE);

		// BATCHNO
		$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, FALSE);

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// Mfg
		$this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, NULL, FALSE);

		// UR
		$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, FALSE);

		// USERID
		$this->_USERID->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['USERID'] = &$this->_USERID->DbValue;

		// HosoID
		$this->HosoID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HosoID'] = &$this->HosoID->DbValue;

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

		// BRNAME
		$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

		// sretid
		if ($this->sretid->getSessionValue() <> "") {
			$rsnew['sretid'] = $this->sretid->getSessionValue();
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_pharmacy_pharled_returnlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_pharmacy_pharled_returnlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_pharmacy_pharled_returnlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_pharmacy_pharled_return\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_pharmacy_pharled_return',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_pharmacy_pharled_returnlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_return") {
			global $pharmacy_billing_return;
			if (!isset($pharmacy_billing_return))
				$pharmacy_billing_return = new pharmacy_billing_return();
			$rsmaster = $pharmacy_billing_return->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$pharmacy_billing_return;
					$pharmacy_billing_return->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "pharmacy_billing_return") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->sretid->setQueryStringValue(Get("fk_id"));
					$this->sretid->setSessionValue($this->sretid->QueryStringValue);
					if (!is_numeric($this->sretid->QueryStringValue))
						$validMaster = FALSE;
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
			if ($masterTblVar == "pharmacy_billing_return") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->sretid->setFormValue(Post("fk_id"));
					$this->sretid->setSessionValue($this->sretid->FormValue);
					if (!is_numeric($this->sretid->FormValue))
						$validMaster = FALSE;
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
			if ($masterTblVar <> "pharmacy_billing_return") {
				if ($this->sretid->CurrentValue == "")
					$this->sretid->setSessionValue("");
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
				case "x_SLNO":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'";
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
						case "x_SLNO":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							$row[4] = FormatDateTime($row[4], 0);
							$row['df4'] = $row[4];
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
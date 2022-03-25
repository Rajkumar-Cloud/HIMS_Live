<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_stock_movement_list extends pharmacy_stock_movement
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_stock_movement';

	// Page object name
	public $PageObjName = "pharmacy_stock_movement_list";

	// Grid form hidden field names
	public $FormName = "fpharmacy_stock_movementlist";
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

		// Table object (pharmacy_stock_movement)
		if (!isset($GLOBALS["pharmacy_stock_movement"]) || get_class($GLOBALS["pharmacy_stock_movement"]) == PROJECT_NAMESPACE . "pharmacy_stock_movement") {
			$GLOBALS["pharmacy_stock_movement"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_stock_movement"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "pharmacy_stock_movementadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "pharmacy_stock_movementdelete.php";
		$this->MultiUpdateUrl = "pharmacy_stock_movementupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_stock_movement');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_stock_movementlistsrch";

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
		global $EXPORT, $pharmacy_stock_movement;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_stock_movement);
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
		$this->PRC->setVisibility();
		$this->PrName->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->OpeningStk->setVisibility();
		$this->PurchaseQty->setVisibility();
		$this->SalesQty->setVisibility();
		$this->ClosingStk->setVisibility();
		$this->PurchasefreeQty->setVisibility();
		$this->TransferingQty->setVisibility();
		$this->UnitPurchaseRate->setVisibility();
		$this->UnitSaleRate->setVisibility();
		$this->CreatedDate->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->UR->setVisibility();
		$this->RT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->BATCH->setVisibility();
		$this->PC->setVisibility();
		$this->OLDRT->setVisibility();
		$this->TEMPMRQ->setVisibility();
		$this->TAXP->setVisibility();
		$this->OLDRATE->setVisibility();
		$this->NEWRATE->setVisibility();
		$this->OTEMPMRA->setVisibility();
		$this->ACTIVESTATUS->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->BRCODE->setVisibility();
		$this->FRQ->setVisibility();
		$this->HospID->setVisibility();
		$this->UM->setVisibility();
		$this->GENNAME->setVisibility();
		$this->BILLDATE->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->baid->setVisibility();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_stock_movementlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
		$filterList = Concat($filterList, $this->PrName->AdvancedSearch->toJson(), ","); // Field PrName
		$filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
		$filterList = Concat($filterList, $this->OpeningStk->AdvancedSearch->toJson(), ","); // Field OpeningStk
		$filterList = Concat($filterList, $this->PurchaseQty->AdvancedSearch->toJson(), ","); // Field PurchaseQty
		$filterList = Concat($filterList, $this->SalesQty->AdvancedSearch->toJson(), ","); // Field SalesQty
		$filterList = Concat($filterList, $this->ClosingStk->AdvancedSearch->toJson(), ","); // Field ClosingStk
		$filterList = Concat($filterList, $this->PurchasefreeQty->AdvancedSearch->toJson(), ","); // Field PurchasefreeQty
		$filterList = Concat($filterList, $this->TransferingQty->AdvancedSearch->toJson(), ","); // Field TransferingQty
		$filterList = Concat($filterList, $this->UnitPurchaseRate->AdvancedSearch->toJson(), ","); // Field UnitPurchaseRate
		$filterList = Concat($filterList, $this->UnitSaleRate->AdvancedSearch->toJson(), ","); // Field UnitSaleRate
		$filterList = Concat($filterList, $this->CreatedDate->AdvancedSearch->toJson(), ","); // Field CreatedDate
		$filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
		$filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
		$filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
		$filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
		$filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
		$filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
		$filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
		$filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
		$filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
		$filterList = Concat($filterList, $this->BATCH->AdvancedSearch->toJson(), ","); // Field BATCH
		$filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
		$filterList = Concat($filterList, $this->OLDRT->AdvancedSearch->toJson(), ","); // Field OLDRT
		$filterList = Concat($filterList, $this->TEMPMRQ->AdvancedSearch->toJson(), ","); // Field TEMPMRQ
		$filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
		$filterList = Concat($filterList, $this->OLDRATE->AdvancedSearch->toJson(), ","); // Field OLDRATE
		$filterList = Concat($filterList, $this->NEWRATE->AdvancedSearch->toJson(), ","); // Field NEWRATE
		$filterList = Concat($filterList, $this->OTEMPMRA->AdvancedSearch->toJson(), ","); // Field OTEMPMRA
		$filterList = Concat($filterList, $this->ACTIVESTATUS->AdvancedSearch->toJson(), ","); // Field ACTIVESTATUS
		$filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
		$filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
		$filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
		$filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
		$filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
		$filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
		$filterList = Concat($filterList, $this->FRQ->AdvancedSearch->toJson(), ","); // Field FRQ
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->UM->AdvancedSearch->toJson(), ","); // Field UM
		$filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
		$filterList = Concat($filterList, $this->BILLDATE->AdvancedSearch->toJson(), ","); // Field BILLDATE
		$filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
		$filterList = Concat($filterList, $this->baid->AdvancedSearch->toJson(), ","); // Field baid
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_stock_movementlistsrch", $filters);
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

		// Field PRC
		$this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
		$this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
		$this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
		$this->PRC->AdvancedSearch->save();

		// Field PrName
		$this->PrName->AdvancedSearch->SearchValue = @$filter["x_PrName"];
		$this->PrName->AdvancedSearch->SearchOperator = @$filter["z_PrName"];
		$this->PrName->AdvancedSearch->SearchCondition = @$filter["v_PrName"];
		$this->PrName->AdvancedSearch->SearchValue2 = @$filter["y_PrName"];
		$this->PrName->AdvancedSearch->SearchOperator2 = @$filter["w_PrName"];
		$this->PrName->AdvancedSearch->save();

		// Field BATCHNO
		$this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->save();

		// Field OpeningStk
		$this->OpeningStk->AdvancedSearch->SearchValue = @$filter["x_OpeningStk"];
		$this->OpeningStk->AdvancedSearch->SearchOperator = @$filter["z_OpeningStk"];
		$this->OpeningStk->AdvancedSearch->SearchCondition = @$filter["v_OpeningStk"];
		$this->OpeningStk->AdvancedSearch->SearchValue2 = @$filter["y_OpeningStk"];
		$this->OpeningStk->AdvancedSearch->SearchOperator2 = @$filter["w_OpeningStk"];
		$this->OpeningStk->AdvancedSearch->save();

		// Field PurchaseQty
		$this->PurchaseQty->AdvancedSearch->SearchValue = @$filter["x_PurchaseQty"];
		$this->PurchaseQty->AdvancedSearch->SearchOperator = @$filter["z_PurchaseQty"];
		$this->PurchaseQty->AdvancedSearch->SearchCondition = @$filter["v_PurchaseQty"];
		$this->PurchaseQty->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseQty"];
		$this->PurchaseQty->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseQty"];
		$this->PurchaseQty->AdvancedSearch->save();

		// Field SalesQty
		$this->SalesQty->AdvancedSearch->SearchValue = @$filter["x_SalesQty"];
		$this->SalesQty->AdvancedSearch->SearchOperator = @$filter["z_SalesQty"];
		$this->SalesQty->AdvancedSearch->SearchCondition = @$filter["v_SalesQty"];
		$this->SalesQty->AdvancedSearch->SearchValue2 = @$filter["y_SalesQty"];
		$this->SalesQty->AdvancedSearch->SearchOperator2 = @$filter["w_SalesQty"];
		$this->SalesQty->AdvancedSearch->save();

		// Field ClosingStk
		$this->ClosingStk->AdvancedSearch->SearchValue = @$filter["x_ClosingStk"];
		$this->ClosingStk->AdvancedSearch->SearchOperator = @$filter["z_ClosingStk"];
		$this->ClosingStk->AdvancedSearch->SearchCondition = @$filter["v_ClosingStk"];
		$this->ClosingStk->AdvancedSearch->SearchValue2 = @$filter["y_ClosingStk"];
		$this->ClosingStk->AdvancedSearch->SearchOperator2 = @$filter["w_ClosingStk"];
		$this->ClosingStk->AdvancedSearch->save();

		// Field PurchasefreeQty
		$this->PurchasefreeQty->AdvancedSearch->SearchValue = @$filter["x_PurchasefreeQty"];
		$this->PurchasefreeQty->AdvancedSearch->SearchOperator = @$filter["z_PurchasefreeQty"];
		$this->PurchasefreeQty->AdvancedSearch->SearchCondition = @$filter["v_PurchasefreeQty"];
		$this->PurchasefreeQty->AdvancedSearch->SearchValue2 = @$filter["y_PurchasefreeQty"];
		$this->PurchasefreeQty->AdvancedSearch->SearchOperator2 = @$filter["w_PurchasefreeQty"];
		$this->PurchasefreeQty->AdvancedSearch->save();

		// Field TransferingQty
		$this->TransferingQty->AdvancedSearch->SearchValue = @$filter["x_TransferingQty"];
		$this->TransferingQty->AdvancedSearch->SearchOperator = @$filter["z_TransferingQty"];
		$this->TransferingQty->AdvancedSearch->SearchCondition = @$filter["v_TransferingQty"];
		$this->TransferingQty->AdvancedSearch->SearchValue2 = @$filter["y_TransferingQty"];
		$this->TransferingQty->AdvancedSearch->SearchOperator2 = @$filter["w_TransferingQty"];
		$this->TransferingQty->AdvancedSearch->save();

		// Field UnitPurchaseRate
		$this->UnitPurchaseRate->AdvancedSearch->SearchValue = @$filter["x_UnitPurchaseRate"];
		$this->UnitPurchaseRate->AdvancedSearch->SearchOperator = @$filter["z_UnitPurchaseRate"];
		$this->UnitPurchaseRate->AdvancedSearch->SearchCondition = @$filter["v_UnitPurchaseRate"];
		$this->UnitPurchaseRate->AdvancedSearch->SearchValue2 = @$filter["y_UnitPurchaseRate"];
		$this->UnitPurchaseRate->AdvancedSearch->SearchOperator2 = @$filter["w_UnitPurchaseRate"];
		$this->UnitPurchaseRate->AdvancedSearch->save();

		// Field UnitSaleRate
		$this->UnitSaleRate->AdvancedSearch->SearchValue = @$filter["x_UnitSaleRate"];
		$this->UnitSaleRate->AdvancedSearch->SearchOperator = @$filter["z_UnitSaleRate"];
		$this->UnitSaleRate->AdvancedSearch->SearchCondition = @$filter["v_UnitSaleRate"];
		$this->UnitSaleRate->AdvancedSearch->SearchValue2 = @$filter["y_UnitSaleRate"];
		$this->UnitSaleRate->AdvancedSearch->SearchOperator2 = @$filter["w_UnitSaleRate"];
		$this->UnitSaleRate->AdvancedSearch->save();

		// Field CreatedDate
		$this->CreatedDate->AdvancedSearch->SearchValue = @$filter["x_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchOperator = @$filter["z_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchCondition = @$filter["v_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDate"];
		$this->CreatedDate->AdvancedSearch->save();

		// Field OQ
		$this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
		$this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
		$this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
		$this->OQ->AdvancedSearch->save();

		// Field RQ
		$this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
		$this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
		$this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
		$this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
		$this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
		$this->RQ->AdvancedSearch->save();

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

		// Field MRP
		$this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
		$this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
		$this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
		$this->MRP->AdvancedSearch->save();

		// Field EXPDT
		$this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
		$this->EXPDT->AdvancedSearch->save();

		// Field UR
		$this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
		$this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
		$this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
		$this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
		$this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
		$this->UR->AdvancedSearch->save();

		// Field RT
		$this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
		$this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
		$this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
		$this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
		$this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
		$this->RT->AdvancedSearch->save();

		// Field PRCODE
		$this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
		$this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
		$this->PRCODE->AdvancedSearch->save();

		// Field BATCH
		$this->BATCH->AdvancedSearch->SearchValue = @$filter["x_BATCH"];
		$this->BATCH->AdvancedSearch->SearchOperator = @$filter["z_BATCH"];
		$this->BATCH->AdvancedSearch->SearchCondition = @$filter["v_BATCH"];
		$this->BATCH->AdvancedSearch->SearchValue2 = @$filter["y_BATCH"];
		$this->BATCH->AdvancedSearch->SearchOperator2 = @$filter["w_BATCH"];
		$this->BATCH->AdvancedSearch->save();

		// Field PC
		$this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
		$this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
		$this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
		$this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
		$this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
		$this->PC->AdvancedSearch->save();

		// Field OLDRT
		$this->OLDRT->AdvancedSearch->SearchValue = @$filter["x_OLDRT"];
		$this->OLDRT->AdvancedSearch->SearchOperator = @$filter["z_OLDRT"];
		$this->OLDRT->AdvancedSearch->SearchCondition = @$filter["v_OLDRT"];
		$this->OLDRT->AdvancedSearch->SearchValue2 = @$filter["y_OLDRT"];
		$this->OLDRT->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRT"];
		$this->OLDRT->AdvancedSearch->save();

		// Field TEMPMRQ
		$this->TEMPMRQ->AdvancedSearch->SearchValue = @$filter["x_TEMPMRQ"];
		$this->TEMPMRQ->AdvancedSearch->SearchOperator = @$filter["z_TEMPMRQ"];
		$this->TEMPMRQ->AdvancedSearch->SearchCondition = @$filter["v_TEMPMRQ"];
		$this->TEMPMRQ->AdvancedSearch->SearchValue2 = @$filter["y_TEMPMRQ"];
		$this->TEMPMRQ->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPMRQ"];
		$this->TEMPMRQ->AdvancedSearch->save();

		// Field TAXP
		$this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
		$this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
		$this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
		$this->TAXP->AdvancedSearch->save();

		// Field OLDRATE
		$this->OLDRATE->AdvancedSearch->SearchValue = @$filter["x_OLDRATE"];
		$this->OLDRATE->AdvancedSearch->SearchOperator = @$filter["z_OLDRATE"];
		$this->OLDRATE->AdvancedSearch->SearchCondition = @$filter["v_OLDRATE"];
		$this->OLDRATE->AdvancedSearch->SearchValue2 = @$filter["y_OLDRATE"];
		$this->OLDRATE->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRATE"];
		$this->OLDRATE->AdvancedSearch->save();

		// Field NEWRATE
		$this->NEWRATE->AdvancedSearch->SearchValue = @$filter["x_NEWRATE"];
		$this->NEWRATE->AdvancedSearch->SearchOperator = @$filter["z_NEWRATE"];
		$this->NEWRATE->AdvancedSearch->SearchCondition = @$filter["v_NEWRATE"];
		$this->NEWRATE->AdvancedSearch->SearchValue2 = @$filter["y_NEWRATE"];
		$this->NEWRATE->AdvancedSearch->SearchOperator2 = @$filter["w_NEWRATE"];
		$this->NEWRATE->AdvancedSearch->save();

		// Field OTEMPMRA
		$this->OTEMPMRA->AdvancedSearch->SearchValue = @$filter["x_OTEMPMRA"];
		$this->OTEMPMRA->AdvancedSearch->SearchOperator = @$filter["z_OTEMPMRA"];
		$this->OTEMPMRA->AdvancedSearch->SearchCondition = @$filter["v_OTEMPMRA"];
		$this->OTEMPMRA->AdvancedSearch->SearchValue2 = @$filter["y_OTEMPMRA"];
		$this->OTEMPMRA->AdvancedSearch->SearchOperator2 = @$filter["w_OTEMPMRA"];
		$this->OTEMPMRA->AdvancedSearch->save();

		// Field ACTIVESTATUS
		$this->ACTIVESTATUS->AdvancedSearch->SearchValue = @$filter["x_ACTIVESTATUS"];
		$this->ACTIVESTATUS->AdvancedSearch->SearchOperator = @$filter["z_ACTIVESTATUS"];
		$this->ACTIVESTATUS->AdvancedSearch->SearchCondition = @$filter["v_ACTIVESTATUS"];
		$this->ACTIVESTATUS->AdvancedSearch->SearchValue2 = @$filter["y_ACTIVESTATUS"];
		$this->ACTIVESTATUS->AdvancedSearch->SearchOperator2 = @$filter["w_ACTIVESTATUS"];
		$this->ACTIVESTATUS->AdvancedSearch->save();

		// Field PSGST
		$this->PSGST->AdvancedSearch->SearchValue = @$filter["x_PSGST"];
		$this->PSGST->AdvancedSearch->SearchOperator = @$filter["z_PSGST"];
		$this->PSGST->AdvancedSearch->SearchCondition = @$filter["v_PSGST"];
		$this->PSGST->AdvancedSearch->SearchValue2 = @$filter["y_PSGST"];
		$this->PSGST->AdvancedSearch->SearchOperator2 = @$filter["w_PSGST"];
		$this->PSGST->AdvancedSearch->save();

		// Field PCGST
		$this->PCGST->AdvancedSearch->SearchValue = @$filter["x_PCGST"];
		$this->PCGST->AdvancedSearch->SearchOperator = @$filter["z_PCGST"];
		$this->PCGST->AdvancedSearch->SearchCondition = @$filter["v_PCGST"];
		$this->PCGST->AdvancedSearch->SearchValue2 = @$filter["y_PCGST"];
		$this->PCGST->AdvancedSearch->SearchOperator2 = @$filter["w_PCGST"];
		$this->PCGST->AdvancedSearch->save();

		// Field SSGST
		$this->SSGST->AdvancedSearch->SearchValue = @$filter["x_SSGST"];
		$this->SSGST->AdvancedSearch->SearchOperator = @$filter["z_SSGST"];
		$this->SSGST->AdvancedSearch->SearchCondition = @$filter["v_SSGST"];
		$this->SSGST->AdvancedSearch->SearchValue2 = @$filter["y_SSGST"];
		$this->SSGST->AdvancedSearch->SearchOperator2 = @$filter["w_SSGST"];
		$this->SSGST->AdvancedSearch->save();

		// Field SCGST
		$this->SCGST->AdvancedSearch->SearchValue = @$filter["x_SCGST"];
		$this->SCGST->AdvancedSearch->SearchOperator = @$filter["z_SCGST"];
		$this->SCGST->AdvancedSearch->SearchCondition = @$filter["v_SCGST"];
		$this->SCGST->AdvancedSearch->SearchValue2 = @$filter["y_SCGST"];
		$this->SCGST->AdvancedSearch->SearchOperator2 = @$filter["w_SCGST"];
		$this->SCGST->AdvancedSearch->save();

		// Field MFRCODE
		$this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->save();

		// Field BRCODE
		$this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
		$this->BRCODE->AdvancedSearch->save();

		// Field FRQ
		$this->FRQ->AdvancedSearch->SearchValue = @$filter["x_FRQ"];
		$this->FRQ->AdvancedSearch->SearchOperator = @$filter["z_FRQ"];
		$this->FRQ->AdvancedSearch->SearchCondition = @$filter["v_FRQ"];
		$this->FRQ->AdvancedSearch->SearchValue2 = @$filter["y_FRQ"];
		$this->FRQ->AdvancedSearch->SearchOperator2 = @$filter["w_FRQ"];
		$this->FRQ->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field UM
		$this->UM->AdvancedSearch->SearchValue = @$filter["x_UM"];
		$this->UM->AdvancedSearch->SearchOperator = @$filter["z_UM"];
		$this->UM->AdvancedSearch->SearchCondition = @$filter["v_UM"];
		$this->UM->AdvancedSearch->SearchValue2 = @$filter["y_UM"];
		$this->UM->AdvancedSearch->SearchOperator2 = @$filter["w_UM"];
		$this->UM->AdvancedSearch->save();

		// Field GENNAME
		$this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
		$this->GENNAME->AdvancedSearch->save();

		// Field BILLDATE
		$this->BILLDATE->AdvancedSearch->SearchValue = @$filter["x_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchOperator = @$filter["z_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchCondition = @$filter["v_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchValue2 = @$filter["y_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->save();

		// Field CreatedDateTime
		$this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->save();

		// Field baid
		$this->baid->AdvancedSearch->SearchValue = @$filter["x_baid"];
		$this->baid->AdvancedSearch->SearchOperator = @$filter["z_baid"];
		$this->baid->AdvancedSearch->SearchCondition = @$filter["v_baid"];
		$this->baid->AdvancedSearch->SearchValue2 = @$filter["y_baid"];
		$this->baid->AdvancedSearch->SearchOperator2 = @$filter["w_baid"];
		$this->baid->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->PRC, $default, FALSE); // PRC
		$this->buildSearchSql($where, $this->PrName, $default, FALSE); // PrName
		$this->buildSearchSql($where, $this->BATCHNO, $default, FALSE); // BATCHNO
		$this->buildSearchSql($where, $this->OpeningStk, $default, FALSE); // OpeningStk
		$this->buildSearchSql($where, $this->PurchaseQty, $default, FALSE); // PurchaseQty
		$this->buildSearchSql($where, $this->SalesQty, $default, FALSE); // SalesQty
		$this->buildSearchSql($where, $this->ClosingStk, $default, FALSE); // ClosingStk
		$this->buildSearchSql($where, $this->PurchasefreeQty, $default, FALSE); // PurchasefreeQty
		$this->buildSearchSql($where, $this->TransferingQty, $default, FALSE); // TransferingQty
		$this->buildSearchSql($where, $this->UnitPurchaseRate, $default, FALSE); // UnitPurchaseRate
		$this->buildSearchSql($where, $this->UnitSaleRate, $default, FALSE); // UnitSaleRate
		$this->buildSearchSql($where, $this->CreatedDate, $default, FALSE); // CreatedDate
		$this->buildSearchSql($where, $this->OQ, $default, FALSE); // OQ
		$this->buildSearchSql($where, $this->RQ, $default, FALSE); // RQ
		$this->buildSearchSql($where, $this->MRQ, $default, FALSE); // MRQ
		$this->buildSearchSql($where, $this->IQ, $default, FALSE); // IQ
		$this->buildSearchSql($where, $this->MRP, $default, FALSE); // MRP
		$this->buildSearchSql($where, $this->EXPDT, $default, FALSE); // EXPDT
		$this->buildSearchSql($where, $this->UR, $default, FALSE); // UR
		$this->buildSearchSql($where, $this->RT, $default, FALSE); // RT
		$this->buildSearchSql($where, $this->PRCODE, $default, FALSE); // PRCODE
		$this->buildSearchSql($where, $this->BATCH, $default, FALSE); // BATCH
		$this->buildSearchSql($where, $this->PC, $default, FALSE); // PC
		$this->buildSearchSql($where, $this->OLDRT, $default, FALSE); // OLDRT
		$this->buildSearchSql($where, $this->TEMPMRQ, $default, FALSE); // TEMPMRQ
		$this->buildSearchSql($where, $this->TAXP, $default, FALSE); // TAXP
		$this->buildSearchSql($where, $this->OLDRATE, $default, FALSE); // OLDRATE
		$this->buildSearchSql($where, $this->NEWRATE, $default, FALSE); // NEWRATE
		$this->buildSearchSql($where, $this->OTEMPMRA, $default, FALSE); // OTEMPMRA
		$this->buildSearchSql($where, $this->ACTIVESTATUS, $default, FALSE); // ACTIVESTATUS
		$this->buildSearchSql($where, $this->PSGST, $default, FALSE); // PSGST
		$this->buildSearchSql($where, $this->PCGST, $default, FALSE); // PCGST
		$this->buildSearchSql($where, $this->SSGST, $default, FALSE); // SSGST
		$this->buildSearchSql($where, $this->SCGST, $default, FALSE); // SCGST
		$this->buildSearchSql($where, $this->MFRCODE, $default, FALSE); // MFRCODE
		$this->buildSearchSql($where, $this->BRCODE, $default, FALSE); // BRCODE
		$this->buildSearchSql($where, $this->FRQ, $default, FALSE); // FRQ
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->UM, $default, FALSE); // UM
		$this->buildSearchSql($where, $this->GENNAME, $default, FALSE); // GENNAME
		$this->buildSearchSql($where, $this->BILLDATE, $default, FALSE); // BILLDATE
		$this->buildSearchSql($where, $this->CreatedDateTime, $default, FALSE); // CreatedDateTime
		$this->buildSearchSql($where, $this->baid, $default, FALSE); // baid

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->PRC->AdvancedSearch->save(); // PRC
			$this->PrName->AdvancedSearch->save(); // PrName
			$this->BATCHNO->AdvancedSearch->save(); // BATCHNO
			$this->OpeningStk->AdvancedSearch->save(); // OpeningStk
			$this->PurchaseQty->AdvancedSearch->save(); // PurchaseQty
			$this->SalesQty->AdvancedSearch->save(); // SalesQty
			$this->ClosingStk->AdvancedSearch->save(); // ClosingStk
			$this->PurchasefreeQty->AdvancedSearch->save(); // PurchasefreeQty
			$this->TransferingQty->AdvancedSearch->save(); // TransferingQty
			$this->UnitPurchaseRate->AdvancedSearch->save(); // UnitPurchaseRate
			$this->UnitSaleRate->AdvancedSearch->save(); // UnitSaleRate
			$this->CreatedDate->AdvancedSearch->save(); // CreatedDate
			$this->OQ->AdvancedSearch->save(); // OQ
			$this->RQ->AdvancedSearch->save(); // RQ
			$this->MRQ->AdvancedSearch->save(); // MRQ
			$this->IQ->AdvancedSearch->save(); // IQ
			$this->MRP->AdvancedSearch->save(); // MRP
			$this->EXPDT->AdvancedSearch->save(); // EXPDT
			$this->UR->AdvancedSearch->save(); // UR
			$this->RT->AdvancedSearch->save(); // RT
			$this->PRCODE->AdvancedSearch->save(); // PRCODE
			$this->BATCH->AdvancedSearch->save(); // BATCH
			$this->PC->AdvancedSearch->save(); // PC
			$this->OLDRT->AdvancedSearch->save(); // OLDRT
			$this->TEMPMRQ->AdvancedSearch->save(); // TEMPMRQ
			$this->TAXP->AdvancedSearch->save(); // TAXP
			$this->OLDRATE->AdvancedSearch->save(); // OLDRATE
			$this->NEWRATE->AdvancedSearch->save(); // NEWRATE
			$this->OTEMPMRA->AdvancedSearch->save(); // OTEMPMRA
			$this->ACTIVESTATUS->AdvancedSearch->save(); // ACTIVESTATUS
			$this->PSGST->AdvancedSearch->save(); // PSGST
			$this->PCGST->AdvancedSearch->save(); // PCGST
			$this->SSGST->AdvancedSearch->save(); // SSGST
			$this->SCGST->AdvancedSearch->save(); // SCGST
			$this->MFRCODE->AdvancedSearch->save(); // MFRCODE
			$this->BRCODE->AdvancedSearch->save(); // BRCODE
			$this->FRQ->AdvancedSearch->save(); // FRQ
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->UM->AdvancedSearch->save(); // UM
			$this->GENNAME->AdvancedSearch->save(); // GENNAME
			$this->BILLDATE->AdvancedSearch->save(); // BILLDATE
			$this->CreatedDateTime->AdvancedSearch->save(); // CreatedDateTime
			$this->baid->AdvancedSearch->save(); // baid
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
		$this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BATCH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ACTIVESTATUS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
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
		if ($this->PRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BATCHNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OpeningStk->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurchaseQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SalesQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ClosingStk->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurchasefreeQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TransferingQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UnitPurchaseRate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UnitSaleRate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CreatedDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MRQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MRP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EXPDT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BATCH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OLDRT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TEMPMRQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TAXP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OLDRATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NEWRATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OTEMPMRA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ACTIVESTATUS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MFRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FRQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GENNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BILLDATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CreatedDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->baid->AdvancedSearch->issetSession())
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
		$this->PRC->AdvancedSearch->unsetSession();
		$this->PrName->AdvancedSearch->unsetSession();
		$this->BATCHNO->AdvancedSearch->unsetSession();
		$this->OpeningStk->AdvancedSearch->unsetSession();
		$this->PurchaseQty->AdvancedSearch->unsetSession();
		$this->SalesQty->AdvancedSearch->unsetSession();
		$this->ClosingStk->AdvancedSearch->unsetSession();
		$this->PurchasefreeQty->AdvancedSearch->unsetSession();
		$this->TransferingQty->AdvancedSearch->unsetSession();
		$this->UnitPurchaseRate->AdvancedSearch->unsetSession();
		$this->UnitSaleRate->AdvancedSearch->unsetSession();
		$this->CreatedDate->AdvancedSearch->unsetSession();
		$this->OQ->AdvancedSearch->unsetSession();
		$this->RQ->AdvancedSearch->unsetSession();
		$this->MRQ->AdvancedSearch->unsetSession();
		$this->IQ->AdvancedSearch->unsetSession();
		$this->MRP->AdvancedSearch->unsetSession();
		$this->EXPDT->AdvancedSearch->unsetSession();
		$this->UR->AdvancedSearch->unsetSession();
		$this->RT->AdvancedSearch->unsetSession();
		$this->PRCODE->AdvancedSearch->unsetSession();
		$this->BATCH->AdvancedSearch->unsetSession();
		$this->PC->AdvancedSearch->unsetSession();
		$this->OLDRT->AdvancedSearch->unsetSession();
		$this->TEMPMRQ->AdvancedSearch->unsetSession();
		$this->TAXP->AdvancedSearch->unsetSession();
		$this->OLDRATE->AdvancedSearch->unsetSession();
		$this->NEWRATE->AdvancedSearch->unsetSession();
		$this->OTEMPMRA->AdvancedSearch->unsetSession();
		$this->ACTIVESTATUS->AdvancedSearch->unsetSession();
		$this->PSGST->AdvancedSearch->unsetSession();
		$this->PCGST->AdvancedSearch->unsetSession();
		$this->SSGST->AdvancedSearch->unsetSession();
		$this->SCGST->AdvancedSearch->unsetSession();
		$this->MFRCODE->AdvancedSearch->unsetSession();
		$this->BRCODE->AdvancedSearch->unsetSession();
		$this->FRQ->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->UM->AdvancedSearch->unsetSession();
		$this->GENNAME->AdvancedSearch->unsetSession();
		$this->BILLDATE->AdvancedSearch->unsetSession();
		$this->CreatedDateTime->AdvancedSearch->unsetSession();
		$this->baid->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->PrName->AdvancedSearch->load();
		$this->BATCHNO->AdvancedSearch->load();
		$this->OpeningStk->AdvancedSearch->load();
		$this->PurchaseQty->AdvancedSearch->load();
		$this->SalesQty->AdvancedSearch->load();
		$this->ClosingStk->AdvancedSearch->load();
		$this->PurchasefreeQty->AdvancedSearch->load();
		$this->TransferingQty->AdvancedSearch->load();
		$this->UnitPurchaseRate->AdvancedSearch->load();
		$this->UnitSaleRate->AdvancedSearch->load();
		$this->CreatedDate->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->RQ->AdvancedSearch->load();
		$this->MRQ->AdvancedSearch->load();
		$this->IQ->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->UR->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->PRCODE->AdvancedSearch->load();
		$this->BATCH->AdvancedSearch->load();
		$this->PC->AdvancedSearch->load();
		$this->OLDRT->AdvancedSearch->load();
		$this->TEMPMRQ->AdvancedSearch->load();
		$this->TAXP->AdvancedSearch->load();
		$this->OLDRATE->AdvancedSearch->load();
		$this->NEWRATE->AdvancedSearch->load();
		$this->OTEMPMRA->AdvancedSearch->load();
		$this->ACTIVESTATUS->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->FRQ->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->UM->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->BILLDATE->AdvancedSearch->load();
		$this->CreatedDateTime->AdvancedSearch->load();
		$this->baid->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->PRC); // PRC
			$this->updateSort($this->PrName); // PrName
			$this->updateSort($this->BATCHNO); // BATCHNO
			$this->updateSort($this->OpeningStk); // OpeningStk
			$this->updateSort($this->PurchaseQty); // PurchaseQty
			$this->updateSort($this->SalesQty); // SalesQty
			$this->updateSort($this->ClosingStk); // ClosingStk
			$this->updateSort($this->PurchasefreeQty); // PurchasefreeQty
			$this->updateSort($this->TransferingQty); // TransferingQty
			$this->updateSort($this->UnitPurchaseRate); // UnitPurchaseRate
			$this->updateSort($this->UnitSaleRate); // UnitSaleRate
			$this->updateSort($this->CreatedDate); // CreatedDate
			$this->updateSort($this->OQ); // OQ
			$this->updateSort($this->RQ); // RQ
			$this->updateSort($this->MRQ); // MRQ
			$this->updateSort($this->IQ); // IQ
			$this->updateSort($this->MRP); // MRP
			$this->updateSort($this->EXPDT); // EXPDT
			$this->updateSort($this->UR); // UR
			$this->updateSort($this->RT); // RT
			$this->updateSort($this->PRCODE); // PRCODE
			$this->updateSort($this->BATCH); // BATCH
			$this->updateSort($this->PC); // PC
			$this->updateSort($this->OLDRT); // OLDRT
			$this->updateSort($this->TEMPMRQ); // TEMPMRQ
			$this->updateSort($this->TAXP); // TAXP
			$this->updateSort($this->OLDRATE); // OLDRATE
			$this->updateSort($this->NEWRATE); // NEWRATE
			$this->updateSort($this->OTEMPMRA); // OTEMPMRA
			$this->updateSort($this->ACTIVESTATUS); // ACTIVESTATUS
			$this->updateSort($this->PSGST); // PSGST
			$this->updateSort($this->PCGST); // PCGST
			$this->updateSort($this->SSGST); // SSGST
			$this->updateSort($this->SCGST); // SCGST
			$this->updateSort($this->MFRCODE); // MFRCODE
			$this->updateSort($this->BRCODE); // BRCODE
			$this->updateSort($this->FRQ); // FRQ
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->UM); // UM
			$this->updateSort($this->GENNAME); // GENNAME
			$this->updateSort($this->BILLDATE); // BILLDATE
			$this->updateSort($this->CreatedDateTime); // CreatedDateTime
			$this->updateSort($this->baid); // baid
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
				$this->PRC->setSort("");
				$this->PrName->setSort("");
				$this->BATCHNO->setSort("");
				$this->OpeningStk->setSort("");
				$this->PurchaseQty->setSort("");
				$this->SalesQty->setSort("");
				$this->ClosingStk->setSort("");
				$this->PurchasefreeQty->setSort("");
				$this->TransferingQty->setSort("");
				$this->UnitPurchaseRate->setSort("");
				$this->UnitSaleRate->setSort("");
				$this->CreatedDate->setSort("");
				$this->OQ->setSort("");
				$this->RQ->setSort("");
				$this->MRQ->setSort("");
				$this->IQ->setSort("");
				$this->MRP->setSort("");
				$this->EXPDT->setSort("");
				$this->UR->setSort("");
				$this->RT->setSort("");
				$this->PRCODE->setSort("");
				$this->BATCH->setSort("");
				$this->PC->setSort("");
				$this->OLDRT->setSort("");
				$this->TEMPMRQ->setSort("");
				$this->TAXP->setSort("");
				$this->OLDRATE->setSort("");
				$this->NEWRATE->setSort("");
				$this->OTEMPMRA->setSort("");
				$this->ACTIVESTATUS->setSort("");
				$this->PSGST->setSort("");
				$this->PCGST->setSort("");
				$this->SSGST->setSort("");
				$this->SCGST->setSort("");
				$this->MFRCODE->setSort("");
				$this->BRCODE->setSort("");
				$this->FRQ->setSort("");
				$this->HospID->setSort("");
				$this->UM->setSort("");
				$this->GENNAME->setSort("");
				$this->BILLDATE->setSort("");
				$this->CreatedDateTime->setSort("");
				$this->baid->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_stock_movementlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_stock_movementlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fpharmacy_stock_movementlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_stock_movementlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// PRC
		if (!$this->isAddOrEdit())
			$this->PRC->AdvancedSearch->setSearchValue(Get("x_PRC", Get("PRC", "")));
		if ($this->PRC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PRC->AdvancedSearch->setSearchOperator(Get("z_PRC", ""));

		// PrName
		if (!$this->isAddOrEdit())
			$this->PrName->AdvancedSearch->setSearchValue(Get("x_PrName", Get("PrName", "")));
		if ($this->PrName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PrName->AdvancedSearch->setSearchOperator(Get("z_PrName", ""));

		// BATCHNO
		if (!$this->isAddOrEdit())
			$this->BATCHNO->AdvancedSearch->setSearchValue(Get("x_BATCHNO", Get("BATCHNO", "")));
		if ($this->BATCHNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BATCHNO->AdvancedSearch->setSearchOperator(Get("z_BATCHNO", ""));

		// OpeningStk
		if (!$this->isAddOrEdit())
			$this->OpeningStk->AdvancedSearch->setSearchValue(Get("x_OpeningStk", Get("OpeningStk", "")));
		if ($this->OpeningStk->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OpeningStk->AdvancedSearch->setSearchOperator(Get("z_OpeningStk", ""));
		$this->OpeningStk->AdvancedSearch->setSearchCondition(Get("v_OpeningStk", ""));
		$this->OpeningStk->AdvancedSearch->setSearchValue2(Get("y_OpeningStk", ""));
		if ($this->OpeningStk->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OpeningStk->AdvancedSearch->setSearchOperator2(Get("w_OpeningStk", ""));

		// PurchaseQty
		if (!$this->isAddOrEdit())
			$this->PurchaseQty->AdvancedSearch->setSearchValue(Get("x_PurchaseQty", Get("PurchaseQty", "")));
		if ($this->PurchaseQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurchaseQty->AdvancedSearch->setSearchOperator(Get("z_PurchaseQty", ""));
		$this->PurchaseQty->AdvancedSearch->setSearchCondition(Get("v_PurchaseQty", ""));
		$this->PurchaseQty->AdvancedSearch->setSearchValue2(Get("y_PurchaseQty", ""));
		if ($this->PurchaseQty->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurchaseQty->AdvancedSearch->setSearchOperator2(Get("w_PurchaseQty", ""));

		// SalesQty
		if (!$this->isAddOrEdit())
			$this->SalesQty->AdvancedSearch->setSearchValue(Get("x_SalesQty", Get("SalesQty", "")));
		if ($this->SalesQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SalesQty->AdvancedSearch->setSearchOperator(Get("z_SalesQty", ""));
		$this->SalesQty->AdvancedSearch->setSearchCondition(Get("v_SalesQty", ""));
		$this->SalesQty->AdvancedSearch->setSearchValue2(Get("y_SalesQty", ""));
		if ($this->SalesQty->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SalesQty->AdvancedSearch->setSearchOperator2(Get("w_SalesQty", ""));

		// ClosingStk
		if (!$this->isAddOrEdit())
			$this->ClosingStk->AdvancedSearch->setSearchValue(Get("x_ClosingStk", Get("ClosingStk", "")));
		if ($this->ClosingStk->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ClosingStk->AdvancedSearch->setSearchOperator(Get("z_ClosingStk", ""));
		$this->ClosingStk->AdvancedSearch->setSearchCondition(Get("v_ClosingStk", ""));
		$this->ClosingStk->AdvancedSearch->setSearchValue2(Get("y_ClosingStk", ""));
		if ($this->ClosingStk->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ClosingStk->AdvancedSearch->setSearchOperator2(Get("w_ClosingStk", ""));

		// PurchasefreeQty
		if (!$this->isAddOrEdit())
			$this->PurchasefreeQty->AdvancedSearch->setSearchValue(Get("x_PurchasefreeQty", Get("PurchasefreeQty", "")));
		if ($this->PurchasefreeQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurchasefreeQty->AdvancedSearch->setSearchOperator(Get("z_PurchasefreeQty", ""));
		$this->PurchasefreeQty->AdvancedSearch->setSearchCondition(Get("v_PurchasefreeQty", ""));
		$this->PurchasefreeQty->AdvancedSearch->setSearchValue2(Get("y_PurchasefreeQty", ""));
		if ($this->PurchasefreeQty->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurchasefreeQty->AdvancedSearch->setSearchOperator2(Get("w_PurchasefreeQty", ""));

		// TransferingQty
		if (!$this->isAddOrEdit())
			$this->TransferingQty->AdvancedSearch->setSearchValue(Get("x_TransferingQty", Get("TransferingQty", "")));
		if ($this->TransferingQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TransferingQty->AdvancedSearch->setSearchOperator(Get("z_TransferingQty", ""));
		$this->TransferingQty->AdvancedSearch->setSearchCondition(Get("v_TransferingQty", ""));
		$this->TransferingQty->AdvancedSearch->setSearchValue2(Get("y_TransferingQty", ""));
		if ($this->TransferingQty->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TransferingQty->AdvancedSearch->setSearchOperator2(Get("w_TransferingQty", ""));

		// UnitPurchaseRate
		if (!$this->isAddOrEdit())
			$this->UnitPurchaseRate->AdvancedSearch->setSearchValue(Get("x_UnitPurchaseRate", Get("UnitPurchaseRate", "")));
		if ($this->UnitPurchaseRate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UnitPurchaseRate->AdvancedSearch->setSearchOperator(Get("z_UnitPurchaseRate", ""));

		// UnitSaleRate
		if (!$this->isAddOrEdit())
			$this->UnitSaleRate->AdvancedSearch->setSearchValue(Get("x_UnitSaleRate", Get("UnitSaleRate", "")));
		if ($this->UnitSaleRate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UnitSaleRate->AdvancedSearch->setSearchOperator(Get("z_UnitSaleRate", ""));

		// CreatedDate
		if (!$this->isAddOrEdit())
			$this->CreatedDate->AdvancedSearch->setSearchValue(Get("x_CreatedDate", Get("CreatedDate", "")));
		if ($this->CreatedDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedDate->AdvancedSearch->setSearchOperator(Get("z_CreatedDate", ""));
		$this->CreatedDate->AdvancedSearch->setSearchCondition(Get("v_CreatedDate", ""));
		$this->CreatedDate->AdvancedSearch->setSearchValue2(Get("y_CreatedDate", ""));
		if ($this->CreatedDate->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedDate->AdvancedSearch->setSearchOperator2(Get("w_CreatedDate", ""));

		// OQ
		if (!$this->isAddOrEdit())
			$this->OQ->AdvancedSearch->setSearchValue(Get("x_OQ", Get("OQ", "")));
		if ($this->OQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OQ->AdvancedSearch->setSearchOperator(Get("z_OQ", ""));

		// RQ
		if (!$this->isAddOrEdit())
			$this->RQ->AdvancedSearch->setSearchValue(Get("x_RQ", Get("RQ", "")));
		if ($this->RQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RQ->AdvancedSearch->setSearchOperator(Get("z_RQ", ""));

		// MRQ
		if (!$this->isAddOrEdit())
			$this->MRQ->AdvancedSearch->setSearchValue(Get("x_MRQ", Get("MRQ", "")));
		if ($this->MRQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MRQ->AdvancedSearch->setSearchOperator(Get("z_MRQ", ""));

		// IQ
		if (!$this->isAddOrEdit())
			$this->IQ->AdvancedSearch->setSearchValue(Get("x_IQ", Get("IQ", "")));
		if ($this->IQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IQ->AdvancedSearch->setSearchOperator(Get("z_IQ", ""));

		// MRP
		if (!$this->isAddOrEdit())
			$this->MRP->AdvancedSearch->setSearchValue(Get("x_MRP", Get("MRP", "")));
		if ($this->MRP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MRP->AdvancedSearch->setSearchOperator(Get("z_MRP", ""));

		// EXPDT
		if (!$this->isAddOrEdit())
			$this->EXPDT->AdvancedSearch->setSearchValue(Get("x_EXPDT", Get("EXPDT", "")));
		if ($this->EXPDT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EXPDT->AdvancedSearch->setSearchOperator(Get("z_EXPDT", ""));

		// UR
		if (!$this->isAddOrEdit())
			$this->UR->AdvancedSearch->setSearchValue(Get("x_UR", Get("UR", "")));
		if ($this->UR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UR->AdvancedSearch->setSearchOperator(Get("z_UR", ""));

		// RT
		if (!$this->isAddOrEdit())
			$this->RT->AdvancedSearch->setSearchValue(Get("x_RT", Get("RT", "")));
		if ($this->RT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RT->AdvancedSearch->setSearchOperator(Get("z_RT", ""));

		// PRCODE
		if (!$this->isAddOrEdit())
			$this->PRCODE->AdvancedSearch->setSearchValue(Get("x_PRCODE", Get("PRCODE", "")));
		if ($this->PRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PRCODE->AdvancedSearch->setSearchOperator(Get("z_PRCODE", ""));

		// BATCH
		if (!$this->isAddOrEdit())
			$this->BATCH->AdvancedSearch->setSearchValue(Get("x_BATCH", Get("BATCH", "")));
		if ($this->BATCH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BATCH->AdvancedSearch->setSearchOperator(Get("z_BATCH", ""));

		// PC
		if (!$this->isAddOrEdit())
			$this->PC->AdvancedSearch->setSearchValue(Get("x_PC", Get("PC", "")));
		if ($this->PC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PC->AdvancedSearch->setSearchOperator(Get("z_PC", ""));

		// OLDRT
		if (!$this->isAddOrEdit())
			$this->OLDRT->AdvancedSearch->setSearchValue(Get("x_OLDRT", Get("OLDRT", "")));
		if ($this->OLDRT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OLDRT->AdvancedSearch->setSearchOperator(Get("z_OLDRT", ""));

		// TEMPMRQ
		if (!$this->isAddOrEdit())
			$this->TEMPMRQ->AdvancedSearch->setSearchValue(Get("x_TEMPMRQ", Get("TEMPMRQ", "")));
		if ($this->TEMPMRQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TEMPMRQ->AdvancedSearch->setSearchOperator(Get("z_TEMPMRQ", ""));

		// TAXP
		if (!$this->isAddOrEdit())
			$this->TAXP->AdvancedSearch->setSearchValue(Get("x_TAXP", Get("TAXP", "")));
		if ($this->TAXP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TAXP->AdvancedSearch->setSearchOperator(Get("z_TAXP", ""));

		// OLDRATE
		if (!$this->isAddOrEdit())
			$this->OLDRATE->AdvancedSearch->setSearchValue(Get("x_OLDRATE", Get("OLDRATE", "")));
		if ($this->OLDRATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OLDRATE->AdvancedSearch->setSearchOperator(Get("z_OLDRATE", ""));

		// NEWRATE
		if (!$this->isAddOrEdit())
			$this->NEWRATE->AdvancedSearch->setSearchValue(Get("x_NEWRATE", Get("NEWRATE", "")));
		if ($this->NEWRATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NEWRATE->AdvancedSearch->setSearchOperator(Get("z_NEWRATE", ""));

		// OTEMPMRA
		if (!$this->isAddOrEdit())
			$this->OTEMPMRA->AdvancedSearch->setSearchValue(Get("x_OTEMPMRA", Get("OTEMPMRA", "")));
		if ($this->OTEMPMRA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OTEMPMRA->AdvancedSearch->setSearchOperator(Get("z_OTEMPMRA", ""));

		// ACTIVESTATUS
		if (!$this->isAddOrEdit())
			$this->ACTIVESTATUS->AdvancedSearch->setSearchValue(Get("x_ACTIVESTATUS", Get("ACTIVESTATUS", "")));
		if ($this->ACTIVESTATUS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ACTIVESTATUS->AdvancedSearch->setSearchOperator(Get("z_ACTIVESTATUS", ""));

		// PSGST
		if (!$this->isAddOrEdit())
			$this->PSGST->AdvancedSearch->setSearchValue(Get("x_PSGST", Get("PSGST", "")));
		if ($this->PSGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PSGST->AdvancedSearch->setSearchOperator(Get("z_PSGST", ""));

		// PCGST
		if (!$this->isAddOrEdit())
			$this->PCGST->AdvancedSearch->setSearchValue(Get("x_PCGST", Get("PCGST", "")));
		if ($this->PCGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PCGST->AdvancedSearch->setSearchOperator(Get("z_PCGST", ""));

		// SSGST
		if (!$this->isAddOrEdit())
			$this->SSGST->AdvancedSearch->setSearchValue(Get("x_SSGST", Get("SSGST", "")));
		if ($this->SSGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SSGST->AdvancedSearch->setSearchOperator(Get("z_SSGST", ""));

		// SCGST
		if (!$this->isAddOrEdit())
			$this->SCGST->AdvancedSearch->setSearchValue(Get("x_SCGST", Get("SCGST", "")));
		if ($this->SCGST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SCGST->AdvancedSearch->setSearchOperator(Get("z_SCGST", ""));

		// MFRCODE
		if (!$this->isAddOrEdit())
			$this->MFRCODE->AdvancedSearch->setSearchValue(Get("x_MFRCODE", Get("MFRCODE", "")));
		if ($this->MFRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MFRCODE->AdvancedSearch->setSearchOperator(Get("z_MFRCODE", ""));

		// BRCODE
		if (!$this->isAddOrEdit())
			$this->BRCODE->AdvancedSearch->setSearchValue(Get("x_BRCODE", Get("BRCODE", "")));
		if ($this->BRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BRCODE->AdvancedSearch->setSearchOperator(Get("z_BRCODE", ""));

		// FRQ
		if (!$this->isAddOrEdit())
			$this->FRQ->AdvancedSearch->setSearchValue(Get("x_FRQ", Get("FRQ", "")));
		if ($this->FRQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FRQ->AdvancedSearch->setSearchOperator(Get("z_FRQ", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// UM
		if (!$this->isAddOrEdit())
			$this->UM->AdvancedSearch->setSearchValue(Get("x_UM", Get("UM", "")));
		if ($this->UM->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UM->AdvancedSearch->setSearchOperator(Get("z_UM", ""));

		// GENNAME
		if (!$this->isAddOrEdit())
			$this->GENNAME->AdvancedSearch->setSearchValue(Get("x_GENNAME", Get("GENNAME", "")));
		if ($this->GENNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GENNAME->AdvancedSearch->setSearchOperator(Get("z_GENNAME", ""));

		// BILLDATE
		if (!$this->isAddOrEdit())
			$this->BILLDATE->AdvancedSearch->setSearchValue(Get("x_BILLDATE", Get("BILLDATE", "")));
		if ($this->BILLDATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BILLDATE->AdvancedSearch->setSearchOperator(Get("z_BILLDATE", ""));

		// CreatedDateTime
		if (!$this->isAddOrEdit())
			$this->CreatedDateTime->AdvancedSearch->setSearchValue(Get("x_CreatedDateTime", Get("CreatedDateTime", "")));
		if ($this->CreatedDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedDateTime->AdvancedSearch->setSearchOperator(Get("z_CreatedDateTime", ""));

		// baid
		if (!$this->isAddOrEdit())
			$this->baid->AdvancedSearch->setSearchValue(Get("x_baid", Get("baid", "")));
		if ($this->baid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->baid->AdvancedSearch->setSearchOperator(Get("z_baid", ""));
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
		$this->PRC->setDbValue($row['PRC']);
		$this->PrName->setDbValue($row['PrName']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OpeningStk->setDbValue($row['OpeningStk']);
		$this->PurchaseQty->setDbValue($row['PurchaseQty']);
		$this->SalesQty->setDbValue($row['SalesQty']);
		$this->ClosingStk->setDbValue($row['ClosingStk']);
		$this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
		$this->TransferingQty->setDbValue($row['TransferingQty']);
		$this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
		$this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
		$this->CreatedDate->setDbValue($row['CreatedDate']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->UR->setDbValue($row['UR']);
		$this->RT->setDbValue($row['RT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->BATCH->setDbValue($row['BATCH']);
		$this->PC->setDbValue($row['PC']);
		$this->OLDRT->setDbValue($row['OLDRT']);
		$this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->OLDRATE->setDbValue($row['OLDRATE']);
		$this->NEWRATE->setDbValue($row['NEWRATE']);
		$this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
		$this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->FRQ->setDbValue($row['FRQ']);
		$this->HospID->setDbValue($row['HospID']);
		$this->UM->setDbValue($row['UM']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->BILLDATE->setDbValue($row['BILLDATE']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->baid->setDbValue($row['baid']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PRC'] = NULL;
		$row['PrName'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['OpeningStk'] = NULL;
		$row['PurchaseQty'] = NULL;
		$row['SalesQty'] = NULL;
		$row['ClosingStk'] = NULL;
		$row['PurchasefreeQty'] = NULL;
		$row['TransferingQty'] = NULL;
		$row['UnitPurchaseRate'] = NULL;
		$row['UnitSaleRate'] = NULL;
		$row['CreatedDate'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['MRP'] = NULL;
		$row['EXPDT'] = NULL;
		$row['UR'] = NULL;
		$row['RT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['BATCH'] = NULL;
		$row['PC'] = NULL;
		$row['OLDRT'] = NULL;
		$row['TEMPMRQ'] = NULL;
		$row['TAXP'] = NULL;
		$row['OLDRATE'] = NULL;
		$row['NEWRATE'] = NULL;
		$row['OTEMPMRA'] = NULL;
		$row['ACTIVESTATUS'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['BRCODE'] = NULL;
		$row['FRQ'] = NULL;
		$row['HospID'] = NULL;
		$row['UM'] = NULL;
		$row['GENNAME'] = NULL;
		$row['BILLDATE'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['baid'] = NULL;
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
		if ($this->OpeningStk->FormValue == $this->OpeningStk->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningStk->CurrentValue)))
			$this->OpeningStk->CurrentValue = ConvertToFloatString($this->OpeningStk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurchaseQty->FormValue == $this->PurchaseQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseQty->CurrentValue)))
			$this->PurchaseQty->CurrentValue = ConvertToFloatString($this->PurchaseQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalesQty->FormValue == $this->SalesQty->CurrentValue && is_numeric(ConvertToFloatString($this->SalesQty->CurrentValue)))
			$this->SalesQty->CurrentValue = ConvertToFloatString($this->SalesQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ClosingStk->FormValue == $this->ClosingStk->CurrentValue && is_numeric(ConvertToFloatString($this->ClosingStk->CurrentValue)))
			$this->ClosingStk->CurrentValue = ConvertToFloatString($this->ClosingStk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurchasefreeQty->FormValue == $this->PurchasefreeQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasefreeQty->CurrentValue)))
			$this->PurchasefreeQty->CurrentValue = ConvertToFloatString($this->PurchasefreeQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TransferingQty->FormValue == $this->TransferingQty->CurrentValue && is_numeric(ConvertToFloatString($this->TransferingQty->CurrentValue)))
			$this->TransferingQty->CurrentValue = ConvertToFloatString($this->TransferingQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UnitPurchaseRate->FormValue == $this->UnitPurchaseRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitPurchaseRate->CurrentValue)))
			$this->UnitPurchaseRate->CurrentValue = ConvertToFloatString($this->UnitPurchaseRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UnitSaleRate->FormValue == $this->UnitSaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitSaleRate->CurrentValue)))
			$this->UnitSaleRate->CurrentValue = ConvertToFloatString($this->UnitSaleRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue)))
			$this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue)))
			$this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue)))
			$this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue)))
			$this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue)))
			$this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue)))
			$this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue)))
			$this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue)))
			$this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue)))
			$this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// PRC
		// PrName
		// BATCHNO
		// OpeningStk
		// PurchaseQty
		// SalesQty
		// ClosingStk
		// PurchasefreeQty
		// TransferingQty
		// UnitPurchaseRate
		// UnitSaleRate
		// CreatedDate
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// UR
		// RT
		// PRCODE
		// BATCH
		// PC
		// OLDRT
		// TEMPMRQ
		// TAXP
		// OLDRATE
		// NEWRATE
		// OTEMPMRA
		// ACTIVESTATUS
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// MFRCODE
		// BRCODE
		// FRQ
		// HospID
		// UM
		// GENNAME
		// BILLDATE
		// CreatedDateTime
		// baid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// OpeningStk
			$this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
			$this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
			$this->OpeningStk->ViewCustomAttributes = "";

			// PurchaseQty
			$this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
			$this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
			$this->PurchaseQty->ViewCustomAttributes = "";

			// SalesQty
			$this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
			$this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
			$this->SalesQty->ViewCustomAttributes = "";

			// ClosingStk
			$this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
			$this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
			$this->ClosingStk->ViewCustomAttributes = "";

			// PurchasefreeQty
			$this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
			$this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
			$this->PurchasefreeQty->ViewCustomAttributes = "";

			// TransferingQty
			$this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
			$this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
			$this->TransferingQty->ViewCustomAttributes = "";

			// UnitPurchaseRate
			$this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
			$this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
			$this->UnitPurchaseRate->ViewCustomAttributes = "";

			// UnitSaleRate
			$this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
			$this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
			$this->UnitSaleRate->ViewCustomAttributes = "";

			// CreatedDate
			$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
			$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
			$this->CreatedDate->ViewCustomAttributes = "";

			// OQ
			$this->OQ->ViewValue = $this->OQ->CurrentValue;
			$this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
			$this->OQ->ViewCustomAttributes = "";

			// RQ
			$this->RQ->ViewValue = $this->RQ->CurrentValue;
			$this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
			$this->RQ->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
			$this->MRQ->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->ViewValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// OLDRT
			$this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
			$this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
			$this->OLDRT->ViewCustomAttributes = "";

			// TEMPMRQ
			$this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
			$this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
			$this->TEMPMRQ->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// OLDRATE
			$this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
			$this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
			$this->OLDRATE->ViewCustomAttributes = "";

			// NEWRATE
			$this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
			$this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
			$this->NEWRATE->ViewCustomAttributes = "";

			// OTEMPMRA
			$this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
			$this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
			$this->OTEMPMRA->ViewCustomAttributes = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
			$this->ACTIVESTATUS->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// FRQ
			$this->FRQ->ViewValue = $this->FRQ->CurrentValue;
			$this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
			$this->FRQ->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// UM
			$this->UM->ViewValue = $this->UM->CurrentValue;
			$this->UM->ViewCustomAttributes = "";

			// GENNAME
			$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
			$this->GENNAME->ViewCustomAttributes = "";

			// BILLDATE
			$this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
			$this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
			$this->BILLDATE->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// baid
			$this->baid->ViewValue = $this->baid->CurrentValue;
			$this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
			$this->baid->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// OpeningStk
			$this->OpeningStk->LinkCustomAttributes = "";
			$this->OpeningStk->HrefValue = "";
			$this->OpeningStk->TooltipValue = "";

			// PurchaseQty
			$this->PurchaseQty->LinkCustomAttributes = "";
			$this->PurchaseQty->HrefValue = "";
			$this->PurchaseQty->TooltipValue = "";

			// SalesQty
			$this->SalesQty->LinkCustomAttributes = "";
			$this->SalesQty->HrefValue = "";
			$this->SalesQty->TooltipValue = "";

			// ClosingStk
			$this->ClosingStk->LinkCustomAttributes = "";
			$this->ClosingStk->HrefValue = "";
			$this->ClosingStk->TooltipValue = "";

			// PurchasefreeQty
			$this->PurchasefreeQty->LinkCustomAttributes = "";
			$this->PurchasefreeQty->HrefValue = "";
			$this->PurchasefreeQty->TooltipValue = "";

			// TransferingQty
			$this->TransferingQty->LinkCustomAttributes = "";
			$this->TransferingQty->HrefValue = "";
			$this->TransferingQty->TooltipValue = "";

			// UnitPurchaseRate
			$this->UnitPurchaseRate->LinkCustomAttributes = "";
			$this->UnitPurchaseRate->HrefValue = "";
			$this->UnitPurchaseRate->TooltipValue = "";

			// UnitSaleRate
			$this->UnitSaleRate->LinkCustomAttributes = "";
			$this->UnitSaleRate->HrefValue = "";
			$this->UnitSaleRate->TooltipValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
			$this->CreatedDate->TooltipValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";
			$this->OQ->TooltipValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";
			$this->RQ->TooltipValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// OLDRT
			$this->OLDRT->LinkCustomAttributes = "";
			$this->OLDRT->HrefValue = "";
			$this->OLDRT->TooltipValue = "";

			// TEMPMRQ
			$this->TEMPMRQ->LinkCustomAttributes = "";
			$this->TEMPMRQ->HrefValue = "";
			$this->TEMPMRQ->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// OLDRATE
			$this->OLDRATE->LinkCustomAttributes = "";
			$this->OLDRATE->HrefValue = "";
			$this->OLDRATE->TooltipValue = "";

			// NEWRATE
			$this->NEWRATE->LinkCustomAttributes = "";
			$this->NEWRATE->HrefValue = "";
			$this->NEWRATE->TooltipValue = "";

			// OTEMPMRA
			$this->OTEMPMRA->LinkCustomAttributes = "";
			$this->OTEMPMRA->HrefValue = "";
			$this->OTEMPMRA->TooltipValue = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->LinkCustomAttributes = "";
			$this->ACTIVESTATUS->HrefValue = "";
			$this->ACTIVESTATUS->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// FRQ
			$this->FRQ->LinkCustomAttributes = "";
			$this->FRQ->HrefValue = "";
			$this->FRQ->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";
			$this->UM->TooltipValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";
			$this->BILLDATE->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";
			$this->baid->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// OpeningStk
			$this->OpeningStk->EditAttrs["class"] = "form-control";
			$this->OpeningStk->EditCustomAttributes = "";
			$this->OpeningStk->EditValue = HtmlEncode($this->OpeningStk->AdvancedSearch->SearchValue);
			$this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
			$this->OpeningStk->EditAttrs["class"] = "form-control";
			$this->OpeningStk->EditCustomAttributes = "";
			$this->OpeningStk->EditValue2 = HtmlEncode($this->OpeningStk->AdvancedSearch->SearchValue2);
			$this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());

			// PurchaseQty
			$this->PurchaseQty->EditAttrs["class"] = "form-control";
			$this->PurchaseQty->EditCustomAttributes = "";
			$this->PurchaseQty->EditValue = HtmlEncode($this->PurchaseQty->AdvancedSearch->SearchValue);
			$this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
			$this->PurchaseQty->EditAttrs["class"] = "form-control";
			$this->PurchaseQty->EditCustomAttributes = "";
			$this->PurchaseQty->EditValue2 = HtmlEncode($this->PurchaseQty->AdvancedSearch->SearchValue2);
			$this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());

			// SalesQty
			$this->SalesQty->EditAttrs["class"] = "form-control";
			$this->SalesQty->EditCustomAttributes = "";
			$this->SalesQty->EditValue = HtmlEncode($this->SalesQty->AdvancedSearch->SearchValue);
			$this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
			$this->SalesQty->EditAttrs["class"] = "form-control";
			$this->SalesQty->EditCustomAttributes = "";
			$this->SalesQty->EditValue2 = HtmlEncode($this->SalesQty->AdvancedSearch->SearchValue2);
			$this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());

			// ClosingStk
			$this->ClosingStk->EditAttrs["class"] = "form-control";
			$this->ClosingStk->EditCustomAttributes = "";
			$this->ClosingStk->EditValue = HtmlEncode($this->ClosingStk->AdvancedSearch->SearchValue);
			$this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
			$this->ClosingStk->EditAttrs["class"] = "form-control";
			$this->ClosingStk->EditCustomAttributes = "";
			$this->ClosingStk->EditValue2 = HtmlEncode($this->ClosingStk->AdvancedSearch->SearchValue2);
			$this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());

			// PurchasefreeQty
			$this->PurchasefreeQty->EditAttrs["class"] = "form-control";
			$this->PurchasefreeQty->EditCustomAttributes = "";
			$this->PurchasefreeQty->EditValue = HtmlEncode($this->PurchasefreeQty->AdvancedSearch->SearchValue);
			$this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
			$this->PurchasefreeQty->EditAttrs["class"] = "form-control";
			$this->PurchasefreeQty->EditCustomAttributes = "";
			$this->PurchasefreeQty->EditValue2 = HtmlEncode($this->PurchasefreeQty->AdvancedSearch->SearchValue2);
			$this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());

			// TransferingQty
			$this->TransferingQty->EditAttrs["class"] = "form-control";
			$this->TransferingQty->EditCustomAttributes = "";
			$this->TransferingQty->EditValue = HtmlEncode($this->TransferingQty->AdvancedSearch->SearchValue);
			$this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
			$this->TransferingQty->EditAttrs["class"] = "form-control";
			$this->TransferingQty->EditCustomAttributes = "";
			$this->TransferingQty->EditValue2 = HtmlEncode($this->TransferingQty->AdvancedSearch->SearchValue2);
			$this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());

			// UnitPurchaseRate
			$this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
			$this->UnitPurchaseRate->EditCustomAttributes = "";
			$this->UnitPurchaseRate->EditValue = HtmlEncode($this->UnitPurchaseRate->AdvancedSearch->SearchValue);
			$this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());

			// UnitSaleRate
			$this->UnitSaleRate->EditAttrs["class"] = "form-control";
			$this->UnitSaleRate->EditCustomAttributes = "";
			$this->UnitSaleRate->EditValue = HtmlEncode($this->UnitSaleRate->AdvancedSearch->SearchValue);
			$this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());

			// CreatedDate
			$this->CreatedDate->EditAttrs["class"] = "form-control";
			$this->CreatedDate->EditCustomAttributes = "";
			$this->CreatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue, 0), 8));
			$this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());
			$this->CreatedDate->EditAttrs["class"] = "form-control";
			$this->CreatedDate->EditCustomAttributes = "";
			$this->CreatedDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue2, 0), 8));
			$this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

			// OQ
			$this->OQ->EditAttrs["class"] = "form-control";
			$this->OQ->EditCustomAttributes = "";
			$this->OQ->EditValue = HtmlEncode($this->OQ->AdvancedSearch->SearchValue);
			$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());

			// RQ
			$this->RQ->EditAttrs["class"] = "form-control";
			$this->RQ->EditCustomAttributes = "";
			$this->RQ->EditValue = HtmlEncode($this->RQ->AdvancedSearch->SearchValue);
			$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

			// PRCODE
			$this->PRCODE->EditAttrs["class"] = "form-control";
			$this->PRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->PRCODE->AdvancedSearch->SearchValue);
			$this->PRCODE->EditValue = HtmlEncode($this->PRCODE->AdvancedSearch->SearchValue);
			$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCH->AdvancedSearch->SearchValue = HtmlDecode($this->BATCH->AdvancedSearch->SearchValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->AdvancedSearch->SearchValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->AdvancedSearch->SearchValue = HtmlDecode($this->PC->AdvancedSearch->SearchValue);
			$this->PC->EditValue = HtmlEncode($this->PC->AdvancedSearch->SearchValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// OLDRT
			$this->OLDRT->EditAttrs["class"] = "form-control";
			$this->OLDRT->EditCustomAttributes = "";
			$this->OLDRT->EditValue = HtmlEncode($this->OLDRT->AdvancedSearch->SearchValue);
			$this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());

			// TEMPMRQ
			$this->TEMPMRQ->EditAttrs["class"] = "form-control";
			$this->TEMPMRQ->EditCustomAttributes = "";
			$this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->AdvancedSearch->SearchValue);
			$this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->AdvancedSearch->SearchValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());

			// OLDRATE
			$this->OLDRATE->EditAttrs["class"] = "form-control";
			$this->OLDRATE->EditCustomAttributes = "";
			$this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->AdvancedSearch->SearchValue);
			$this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());

			// NEWRATE
			$this->NEWRATE->EditAttrs["class"] = "form-control";
			$this->NEWRATE->EditCustomAttributes = "";
			$this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->AdvancedSearch->SearchValue);
			$this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());

			// OTEMPMRA
			$this->OTEMPMRA->EditAttrs["class"] = "form-control";
			$this->OTEMPMRA->EditCustomAttributes = "";
			$this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->AdvancedSearch->SearchValue);
			$this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());

			// ACTIVESTATUS
			$this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
			$this->ACTIVESTATUS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ACTIVESTATUS->AdvancedSearch->SearchValue = HtmlDecode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
			$this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
			$this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->AdvancedSearch->SearchValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->AdvancedSearch->SearchValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// FRQ
			$this->FRQ->EditAttrs["class"] = "form-control";
			$this->FRQ->EditCustomAttributes = "";
			$this->FRQ->EditValue = HtmlEncode($this->FRQ->AdvancedSearch->SearchValue);
			$this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// BILLDATE
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

			// CreatedDateTime
			$this->CreatedDateTime->EditAttrs["class"] = "form-control";
			$this->CreatedDateTime->EditCustomAttributes = "";
			$this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

			// baid
			$this->baid->EditAttrs["class"] = "form-control";
			$this->baid->EditCustomAttributes = "";
			$this->baid->EditValue = HtmlEncode($this->baid->AdvancedSearch->SearchValue);
			$this->baid->PlaceHolder = RemoveHtml($this->baid->caption());
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
		if (!CheckNumber($this->OpeningStk->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->OpeningStk->errorMessage());
		}
		if (!CheckNumber($this->OpeningStk->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->OpeningStk->errorMessage());
		}
		if (!CheckNumber($this->PurchaseQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PurchaseQty->errorMessage());
		}
		if (!CheckNumber($this->PurchaseQty->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->PurchaseQty->errorMessage());
		}
		if (!CheckNumber($this->SalesQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SalesQty->errorMessage());
		}
		if (!CheckNumber($this->SalesQty->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->SalesQty->errorMessage());
		}
		if (!CheckNumber($this->ClosingStk->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ClosingStk->errorMessage());
		}
		if (!CheckNumber($this->ClosingStk->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->ClosingStk->errorMessage());
		}
		if (!CheckNumber($this->PurchasefreeQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PurchasefreeQty->errorMessage());
		}
		if (!CheckNumber($this->PurchasefreeQty->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->PurchasefreeQty->errorMessage());
		}
		if (!CheckNumber($this->TransferingQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TransferingQty->errorMessage());
		}
		if (!CheckNumber($this->TransferingQty->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->TransferingQty->errorMessage());
		}
		if (!CheckDate($this->CreatedDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CreatedDate->errorMessage());
		}
		if (!CheckDate($this->CreatedDate->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->CreatedDate->errorMessage());
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
		$this->id->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->PrName->AdvancedSearch->load();
		$this->BATCHNO->AdvancedSearch->load();
		$this->OpeningStk->AdvancedSearch->load();
		$this->PurchaseQty->AdvancedSearch->load();
		$this->SalesQty->AdvancedSearch->load();
		$this->ClosingStk->AdvancedSearch->load();
		$this->PurchasefreeQty->AdvancedSearch->load();
		$this->TransferingQty->AdvancedSearch->load();
		$this->UnitPurchaseRate->AdvancedSearch->load();
		$this->UnitSaleRate->AdvancedSearch->load();
		$this->CreatedDate->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->RQ->AdvancedSearch->load();
		$this->MRQ->AdvancedSearch->load();
		$this->IQ->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->UR->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->PRCODE->AdvancedSearch->load();
		$this->BATCH->AdvancedSearch->load();
		$this->PC->AdvancedSearch->load();
		$this->OLDRT->AdvancedSearch->load();
		$this->TEMPMRQ->AdvancedSearch->load();
		$this->TAXP->AdvancedSearch->load();
		$this->OLDRATE->AdvancedSearch->load();
		$this->NEWRATE->AdvancedSearch->load();
		$this->OTEMPMRA->AdvancedSearch->load();
		$this->ACTIVESTATUS->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->FRQ->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->UM->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->BILLDATE->AdvancedSearch->load();
		$this->CreatedDateTime->AdvancedSearch->load();
		$this->baid->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpharmacy_stock_movementlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpharmacy_stock_movementlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpharmacy_stock_movementlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_pharmacy_stock_movement\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_pharmacy_stock_movement',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpharmacy_stock_movementlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
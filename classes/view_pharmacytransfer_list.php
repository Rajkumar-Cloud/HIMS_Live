<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_pharmacytransfer_list extends view_pharmacytransfer
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_pharmacytransfer';

	// Page object name
	public $PageObjName = "view_pharmacytransfer_list";

	// Grid form hidden field names
	public $FormName = "fview_pharmacytransferlist";
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

		// Table object (view_pharmacytransfer)
		if (!isset($GLOBALS["view_pharmacytransfer"]) || get_class($GLOBALS["view_pharmacytransfer"]) == PROJECT_NAMESPACE . "view_pharmacytransfer") {
			$GLOBALS["view_pharmacytransfer"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_pharmacytransfer"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_pharmacytransferadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_pharmacytransferdelete.php";
		$this->MultiUpdateUrl = "view_pharmacytransferupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pharmacy_billing_transfer)
		if (!isset($GLOBALS['pharmacy_billing_transfer']))
			$GLOBALS['pharmacy_billing_transfer'] = new pharmacy_billing_transfer();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacytransfer');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacytransferlistsrch";

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
		global $EXPORT, $view_pharmacytransfer;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_pharmacytransfer);
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
			$this->ORDNO->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->grncreatedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->grncreatedDateTime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->grnModifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->grnModifiedDateTime->Visible = FALSE;
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
		$this->ORDNO->setVisibility();
		$this->BRCODE->setVisibility();
		$this->PRC->setVisibility();
		$this->QTY->Visible = FALSE;
		$this->DT->Visible = FALSE;
		$this->PC->Visible = FALSE;
		$this->YM->Visible = FALSE;
		$this->Stock->Visible = FALSE;
		$this->Printcheck->Visible = FALSE;
		$this->id->Visible = FALSE;
		$this->grnid->Visible = FALSE;
		$this->poid->Visible = FALSE;
		$this->LastMonthSale->setVisibility();
		$this->PrName->setVisibility();
		$this->GrnQuantity->Visible = FALSE;
		$this->Quantity->setVisibility();
		$this->FreeQty->Visible = FALSE;
		$this->BatchNo->setVisibility();
		$this->ExpDate->setVisibility();
		$this->HSN->Visible = FALSE;
		$this->MFRCODE->Visible = FALSE;
		$this->PUnit->Visible = FALSE;
		$this->SUnit->Visible = FALSE;
		$this->MRP->setVisibility();
		$this->PurValue->Visible = FALSE;
		$this->Disc->Visible = FALSE;
		$this->PSGST->Visible = FALSE;
		$this->PCGST->Visible = FALSE;
		$this->PTax->Visible = FALSE;
		$this->ItemValue->setVisibility();
		$this->SalTax->Visible = FALSE;
		$this->PurRate->Visible = FALSE;
		$this->SalRate->Visible = FALSE;
		$this->Discount->Visible = FALSE;
		$this->SSGST->Visible = FALSE;
		$this->SCGST->Visible = FALSE;
		$this->Pack->Visible = FALSE;
		$this->GrnMRP->Visible = FALSE;
		$this->trid->setVisibility();
		$this->HospID->setVisibility();
		$this->CreatedBy->Visible = FALSE;
		$this->CreatedDateTime->Visible = FALSE;
		$this->ModifiedBy->Visible = FALSE;
		$this->ModifiedDateTime->Visible = FALSE;
		$this->grncreatedby->setVisibility();
		$this->grncreatedDateTime->setVisibility();
		$this->grnModifiedby->setVisibility();
		$this->grnModifiedDateTime->setVisibility();
		$this->Received->Visible = FALSE;
		$this->BillDate->setVisibility();
		$this->CurStock->setVisibility();
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
		$this->setupLookupOptions($this->ORDNO);
		$this->setupLookupOptions($this->BRCODE);
		$this->setupLookupOptions($this->LastMonthSale);

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
							$this->terminate(_LIST);
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

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
			global $pharmacy_billing_transfer;
			$rsmaster = $pharmacy_billing_transfer->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_billing_transferlist.php"); // Return to master page
			} else {
				$pharmacy_billing_transfer->loadListRowValues($rsmaster);
				$pharmacy_billing_transfer->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_billing_transfer->renderListRow();
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
		$this->MRP->FormValue = ""; // Clear form value
		$this->ItemValue->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue <> $this->BRCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue <> $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LastMonthSale") && $CurrentForm->hasValue("o_LastMonthSale") && $this->LastMonthSale->CurrentValue <> $this->LastMonthSale->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue <> $this->PrName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue <> $this->Quantity->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue <> $this->BatchNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ExpDate") && $CurrentForm->hasValue("o_ExpDate") && $this->ExpDate->CurrentValue <> $this->ExpDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MRP") && $CurrentForm->hasValue("o_MRP") && $this->MRP->CurrentValue <> $this->MRP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ItemValue") && $CurrentForm->hasValue("o_ItemValue") && $this->ItemValue->CurrentValue <> $this->ItemValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_trid") && $CurrentForm->hasValue("o_trid") && $this->trid->CurrentValue <> $this->trid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillDate") && $CurrentForm->hasValue("o_BillDate") && $this->BillDate->CurrentValue <> $this->BillDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CurStock") && $CurrentForm->hasValue("o_CurStock") && $this->CurStock->CurrentValue <> $this->CurStock->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacytransferlistsrch");
		$filterList = Concat($filterList, $this->ORDNO->AdvancedSearch->toJson(), ","); // Field ORDNO
		$filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
		$filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
		$filterList = Concat($filterList, $this->QTY->AdvancedSearch->toJson(), ","); // Field QTY
		$filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
		$filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
		$filterList = Concat($filterList, $this->YM->AdvancedSearch->toJson(), ","); // Field YM
		$filterList = Concat($filterList, $this->Stock->AdvancedSearch->toJson(), ","); // Field Stock
		$filterList = Concat($filterList, $this->Printcheck->AdvancedSearch->toJson(), ","); // Field Printcheck
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->grnid->AdvancedSearch->toJson(), ","); // Field grnid
		$filterList = Concat($filterList, $this->poid->AdvancedSearch->toJson(), ","); // Field poid
		$filterList = Concat($filterList, $this->LastMonthSale->AdvancedSearch->toJson(), ","); // Field LastMonthSale
		$filterList = Concat($filterList, $this->PrName->AdvancedSearch->toJson(), ","); // Field PrName
		$filterList = Concat($filterList, $this->GrnQuantity->AdvancedSearch->toJson(), ","); // Field GrnQuantity
		$filterList = Concat($filterList, $this->Quantity->AdvancedSearch->toJson(), ","); // Field Quantity
		$filterList = Concat($filterList, $this->FreeQty->AdvancedSearch->toJson(), ","); // Field FreeQty
		$filterList = Concat($filterList, $this->BatchNo->AdvancedSearch->toJson(), ","); // Field BatchNo
		$filterList = Concat($filterList, $this->ExpDate->AdvancedSearch->toJson(), ","); // Field ExpDate
		$filterList = Concat($filterList, $this->HSN->AdvancedSearch->toJson(), ","); // Field HSN
		$filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
		$filterList = Concat($filterList, $this->PUnit->AdvancedSearch->toJson(), ","); // Field PUnit
		$filterList = Concat($filterList, $this->SUnit->AdvancedSearch->toJson(), ","); // Field SUnit
		$filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
		$filterList = Concat($filterList, $this->PurValue->AdvancedSearch->toJson(), ","); // Field PurValue
		$filterList = Concat($filterList, $this->Disc->AdvancedSearch->toJson(), ","); // Field Disc
		$filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
		$filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
		$filterList = Concat($filterList, $this->PTax->AdvancedSearch->toJson(), ","); // Field PTax
		$filterList = Concat($filterList, $this->ItemValue->AdvancedSearch->toJson(), ","); // Field ItemValue
		$filterList = Concat($filterList, $this->SalTax->AdvancedSearch->toJson(), ","); // Field SalTax
		$filterList = Concat($filterList, $this->PurRate->AdvancedSearch->toJson(), ","); // Field PurRate
		$filterList = Concat($filterList, $this->SalRate->AdvancedSearch->toJson(), ","); // Field SalRate
		$filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
		$filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
		$filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
		$filterList = Concat($filterList, $this->Pack->AdvancedSearch->toJson(), ","); // Field Pack
		$filterList = Concat($filterList, $this->GrnMRP->AdvancedSearch->toJson(), ","); // Field GrnMRP
		$filterList = Concat($filterList, $this->trid->AdvancedSearch->toJson(), ","); // Field trid
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->CreatedBy->AdvancedSearch->toJson(), ","); // Field CreatedBy
		$filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
		$filterList = Concat($filterList, $this->ModifiedBy->AdvancedSearch->toJson(), ","); // Field ModifiedBy
		$filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
		$filterList = Concat($filterList, $this->grncreatedby->AdvancedSearch->toJson(), ","); // Field grncreatedby
		$filterList = Concat($filterList, $this->grncreatedDateTime->AdvancedSearch->toJson(), ","); // Field grncreatedDateTime
		$filterList = Concat($filterList, $this->grnModifiedby->AdvancedSearch->toJson(), ","); // Field grnModifiedby
		$filterList = Concat($filterList, $this->grnModifiedDateTime->AdvancedSearch->toJson(), ","); // Field grnModifiedDateTime
		$filterList = Concat($filterList, $this->Received->AdvancedSearch->toJson(), ","); // Field Received
		$filterList = Concat($filterList, $this->BillDate->AdvancedSearch->toJson(), ","); // Field BillDate
		$filterList = Concat($filterList, $this->CurStock->AdvancedSearch->toJson(), ","); // Field CurStock
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacytransferlistsrch", $filters);
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

		// Field ORDNO
		$this->ORDNO->AdvancedSearch->SearchValue = @$filter["x_ORDNO"];
		$this->ORDNO->AdvancedSearch->SearchOperator = @$filter["z_ORDNO"];
		$this->ORDNO->AdvancedSearch->SearchCondition = @$filter["v_ORDNO"];
		$this->ORDNO->AdvancedSearch->SearchValue2 = @$filter["y_ORDNO"];
		$this->ORDNO->AdvancedSearch->SearchOperator2 = @$filter["w_ORDNO"];
		$this->ORDNO->AdvancedSearch->save();

		// Field BRCODE
		$this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
		$this->BRCODE->AdvancedSearch->save();

		// Field PRC
		$this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
		$this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
		$this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
		$this->PRC->AdvancedSearch->save();

		// Field QTY
		$this->QTY->AdvancedSearch->SearchValue = @$filter["x_QTY"];
		$this->QTY->AdvancedSearch->SearchOperator = @$filter["z_QTY"];
		$this->QTY->AdvancedSearch->SearchCondition = @$filter["v_QTY"];
		$this->QTY->AdvancedSearch->SearchValue2 = @$filter["y_QTY"];
		$this->QTY->AdvancedSearch->SearchOperator2 = @$filter["w_QTY"];
		$this->QTY->AdvancedSearch->save();

		// Field DT
		$this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
		$this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
		$this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
		$this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
		$this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
		$this->DT->AdvancedSearch->save();

		// Field PC
		$this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
		$this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
		$this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
		$this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
		$this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
		$this->PC->AdvancedSearch->save();

		// Field YM
		$this->YM->AdvancedSearch->SearchValue = @$filter["x_YM"];
		$this->YM->AdvancedSearch->SearchOperator = @$filter["z_YM"];
		$this->YM->AdvancedSearch->SearchCondition = @$filter["v_YM"];
		$this->YM->AdvancedSearch->SearchValue2 = @$filter["y_YM"];
		$this->YM->AdvancedSearch->SearchOperator2 = @$filter["w_YM"];
		$this->YM->AdvancedSearch->save();

		// Field Stock
		$this->Stock->AdvancedSearch->SearchValue = @$filter["x_Stock"];
		$this->Stock->AdvancedSearch->SearchOperator = @$filter["z_Stock"];
		$this->Stock->AdvancedSearch->SearchCondition = @$filter["v_Stock"];
		$this->Stock->AdvancedSearch->SearchValue2 = @$filter["y_Stock"];
		$this->Stock->AdvancedSearch->SearchOperator2 = @$filter["w_Stock"];
		$this->Stock->AdvancedSearch->save();

		// Field Printcheck
		$this->Printcheck->AdvancedSearch->SearchValue = @$filter["x_Printcheck"];
		$this->Printcheck->AdvancedSearch->SearchOperator = @$filter["z_Printcheck"];
		$this->Printcheck->AdvancedSearch->SearchCondition = @$filter["v_Printcheck"];
		$this->Printcheck->AdvancedSearch->SearchValue2 = @$filter["y_Printcheck"];
		$this->Printcheck->AdvancedSearch->SearchOperator2 = @$filter["w_Printcheck"];
		$this->Printcheck->AdvancedSearch->save();

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field grnid
		$this->grnid->AdvancedSearch->SearchValue = @$filter["x_grnid"];
		$this->grnid->AdvancedSearch->SearchOperator = @$filter["z_grnid"];
		$this->grnid->AdvancedSearch->SearchCondition = @$filter["v_grnid"];
		$this->grnid->AdvancedSearch->SearchValue2 = @$filter["y_grnid"];
		$this->grnid->AdvancedSearch->SearchOperator2 = @$filter["w_grnid"];
		$this->grnid->AdvancedSearch->save();

		// Field poid
		$this->poid->AdvancedSearch->SearchValue = @$filter["x_poid"];
		$this->poid->AdvancedSearch->SearchOperator = @$filter["z_poid"];
		$this->poid->AdvancedSearch->SearchCondition = @$filter["v_poid"];
		$this->poid->AdvancedSearch->SearchValue2 = @$filter["y_poid"];
		$this->poid->AdvancedSearch->SearchOperator2 = @$filter["w_poid"];
		$this->poid->AdvancedSearch->save();

		// Field LastMonthSale
		$this->LastMonthSale->AdvancedSearch->SearchValue = @$filter["x_LastMonthSale"];
		$this->LastMonthSale->AdvancedSearch->SearchOperator = @$filter["z_LastMonthSale"];
		$this->LastMonthSale->AdvancedSearch->SearchCondition = @$filter["v_LastMonthSale"];
		$this->LastMonthSale->AdvancedSearch->SearchValue2 = @$filter["y_LastMonthSale"];
		$this->LastMonthSale->AdvancedSearch->SearchOperator2 = @$filter["w_LastMonthSale"];
		$this->LastMonthSale->AdvancedSearch->save();

		// Field PrName
		$this->PrName->AdvancedSearch->SearchValue = @$filter["x_PrName"];
		$this->PrName->AdvancedSearch->SearchOperator = @$filter["z_PrName"];
		$this->PrName->AdvancedSearch->SearchCondition = @$filter["v_PrName"];
		$this->PrName->AdvancedSearch->SearchValue2 = @$filter["y_PrName"];
		$this->PrName->AdvancedSearch->SearchOperator2 = @$filter["w_PrName"];
		$this->PrName->AdvancedSearch->save();

		// Field GrnQuantity
		$this->GrnQuantity->AdvancedSearch->SearchValue = @$filter["x_GrnQuantity"];
		$this->GrnQuantity->AdvancedSearch->SearchOperator = @$filter["z_GrnQuantity"];
		$this->GrnQuantity->AdvancedSearch->SearchCondition = @$filter["v_GrnQuantity"];
		$this->GrnQuantity->AdvancedSearch->SearchValue2 = @$filter["y_GrnQuantity"];
		$this->GrnQuantity->AdvancedSearch->SearchOperator2 = @$filter["w_GrnQuantity"];
		$this->GrnQuantity->AdvancedSearch->save();

		// Field Quantity
		$this->Quantity->AdvancedSearch->SearchValue = @$filter["x_Quantity"];
		$this->Quantity->AdvancedSearch->SearchOperator = @$filter["z_Quantity"];
		$this->Quantity->AdvancedSearch->SearchCondition = @$filter["v_Quantity"];
		$this->Quantity->AdvancedSearch->SearchValue2 = @$filter["y_Quantity"];
		$this->Quantity->AdvancedSearch->SearchOperator2 = @$filter["w_Quantity"];
		$this->Quantity->AdvancedSearch->save();

		// Field FreeQty
		$this->FreeQty->AdvancedSearch->SearchValue = @$filter["x_FreeQty"];
		$this->FreeQty->AdvancedSearch->SearchOperator = @$filter["z_FreeQty"];
		$this->FreeQty->AdvancedSearch->SearchCondition = @$filter["v_FreeQty"];
		$this->FreeQty->AdvancedSearch->SearchValue2 = @$filter["y_FreeQty"];
		$this->FreeQty->AdvancedSearch->SearchOperator2 = @$filter["w_FreeQty"];
		$this->FreeQty->AdvancedSearch->save();

		// Field BatchNo
		$this->BatchNo->AdvancedSearch->SearchValue = @$filter["x_BatchNo"];
		$this->BatchNo->AdvancedSearch->SearchOperator = @$filter["z_BatchNo"];
		$this->BatchNo->AdvancedSearch->SearchCondition = @$filter["v_BatchNo"];
		$this->BatchNo->AdvancedSearch->SearchValue2 = @$filter["y_BatchNo"];
		$this->BatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_BatchNo"];
		$this->BatchNo->AdvancedSearch->save();

		// Field ExpDate
		$this->ExpDate->AdvancedSearch->SearchValue = @$filter["x_ExpDate"];
		$this->ExpDate->AdvancedSearch->SearchOperator = @$filter["z_ExpDate"];
		$this->ExpDate->AdvancedSearch->SearchCondition = @$filter["v_ExpDate"];
		$this->ExpDate->AdvancedSearch->SearchValue2 = @$filter["y_ExpDate"];
		$this->ExpDate->AdvancedSearch->SearchOperator2 = @$filter["w_ExpDate"];
		$this->ExpDate->AdvancedSearch->save();

		// Field HSN
		$this->HSN->AdvancedSearch->SearchValue = @$filter["x_HSN"];
		$this->HSN->AdvancedSearch->SearchOperator = @$filter["z_HSN"];
		$this->HSN->AdvancedSearch->SearchCondition = @$filter["v_HSN"];
		$this->HSN->AdvancedSearch->SearchValue2 = @$filter["y_HSN"];
		$this->HSN->AdvancedSearch->SearchOperator2 = @$filter["w_HSN"];
		$this->HSN->AdvancedSearch->save();

		// Field MFRCODE
		$this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->save();

		// Field PUnit
		$this->PUnit->AdvancedSearch->SearchValue = @$filter["x_PUnit"];
		$this->PUnit->AdvancedSearch->SearchOperator = @$filter["z_PUnit"];
		$this->PUnit->AdvancedSearch->SearchCondition = @$filter["v_PUnit"];
		$this->PUnit->AdvancedSearch->SearchValue2 = @$filter["y_PUnit"];
		$this->PUnit->AdvancedSearch->SearchOperator2 = @$filter["w_PUnit"];
		$this->PUnit->AdvancedSearch->save();

		// Field SUnit
		$this->SUnit->AdvancedSearch->SearchValue = @$filter["x_SUnit"];
		$this->SUnit->AdvancedSearch->SearchOperator = @$filter["z_SUnit"];
		$this->SUnit->AdvancedSearch->SearchCondition = @$filter["v_SUnit"];
		$this->SUnit->AdvancedSearch->SearchValue2 = @$filter["y_SUnit"];
		$this->SUnit->AdvancedSearch->SearchOperator2 = @$filter["w_SUnit"];
		$this->SUnit->AdvancedSearch->save();

		// Field MRP
		$this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
		$this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
		$this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
		$this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
		$this->MRP->AdvancedSearch->save();

		// Field PurValue
		$this->PurValue->AdvancedSearch->SearchValue = @$filter["x_PurValue"];
		$this->PurValue->AdvancedSearch->SearchOperator = @$filter["z_PurValue"];
		$this->PurValue->AdvancedSearch->SearchCondition = @$filter["v_PurValue"];
		$this->PurValue->AdvancedSearch->SearchValue2 = @$filter["y_PurValue"];
		$this->PurValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurValue"];
		$this->PurValue->AdvancedSearch->save();

		// Field Disc
		$this->Disc->AdvancedSearch->SearchValue = @$filter["x_Disc"];
		$this->Disc->AdvancedSearch->SearchOperator = @$filter["z_Disc"];
		$this->Disc->AdvancedSearch->SearchCondition = @$filter["v_Disc"];
		$this->Disc->AdvancedSearch->SearchValue2 = @$filter["y_Disc"];
		$this->Disc->AdvancedSearch->SearchOperator2 = @$filter["w_Disc"];
		$this->Disc->AdvancedSearch->save();

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

		// Field PTax
		$this->PTax->AdvancedSearch->SearchValue = @$filter["x_PTax"];
		$this->PTax->AdvancedSearch->SearchOperator = @$filter["z_PTax"];
		$this->PTax->AdvancedSearch->SearchCondition = @$filter["v_PTax"];
		$this->PTax->AdvancedSearch->SearchValue2 = @$filter["y_PTax"];
		$this->PTax->AdvancedSearch->SearchOperator2 = @$filter["w_PTax"];
		$this->PTax->AdvancedSearch->save();

		// Field ItemValue
		$this->ItemValue->AdvancedSearch->SearchValue = @$filter["x_ItemValue"];
		$this->ItemValue->AdvancedSearch->SearchOperator = @$filter["z_ItemValue"];
		$this->ItemValue->AdvancedSearch->SearchCondition = @$filter["v_ItemValue"];
		$this->ItemValue->AdvancedSearch->SearchValue2 = @$filter["y_ItemValue"];
		$this->ItemValue->AdvancedSearch->SearchOperator2 = @$filter["w_ItemValue"];
		$this->ItemValue->AdvancedSearch->save();

		// Field SalTax
		$this->SalTax->AdvancedSearch->SearchValue = @$filter["x_SalTax"];
		$this->SalTax->AdvancedSearch->SearchOperator = @$filter["z_SalTax"];
		$this->SalTax->AdvancedSearch->SearchCondition = @$filter["v_SalTax"];
		$this->SalTax->AdvancedSearch->SearchValue2 = @$filter["y_SalTax"];
		$this->SalTax->AdvancedSearch->SearchOperator2 = @$filter["w_SalTax"];
		$this->SalTax->AdvancedSearch->save();

		// Field PurRate
		$this->PurRate->AdvancedSearch->SearchValue = @$filter["x_PurRate"];
		$this->PurRate->AdvancedSearch->SearchOperator = @$filter["z_PurRate"];
		$this->PurRate->AdvancedSearch->SearchCondition = @$filter["v_PurRate"];
		$this->PurRate->AdvancedSearch->SearchValue2 = @$filter["y_PurRate"];
		$this->PurRate->AdvancedSearch->SearchOperator2 = @$filter["w_PurRate"];
		$this->PurRate->AdvancedSearch->save();

		// Field SalRate
		$this->SalRate->AdvancedSearch->SearchValue = @$filter["x_SalRate"];
		$this->SalRate->AdvancedSearch->SearchOperator = @$filter["z_SalRate"];
		$this->SalRate->AdvancedSearch->SearchCondition = @$filter["v_SalRate"];
		$this->SalRate->AdvancedSearch->SearchValue2 = @$filter["y_SalRate"];
		$this->SalRate->AdvancedSearch->SearchOperator2 = @$filter["w_SalRate"];
		$this->SalRate->AdvancedSearch->save();

		// Field Discount
		$this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
		$this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
		$this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
		$this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
		$this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
		$this->Discount->AdvancedSearch->save();

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

		// Field Pack
		$this->Pack->AdvancedSearch->SearchValue = @$filter["x_Pack"];
		$this->Pack->AdvancedSearch->SearchOperator = @$filter["z_Pack"];
		$this->Pack->AdvancedSearch->SearchCondition = @$filter["v_Pack"];
		$this->Pack->AdvancedSearch->SearchValue2 = @$filter["y_Pack"];
		$this->Pack->AdvancedSearch->SearchOperator2 = @$filter["w_Pack"];
		$this->Pack->AdvancedSearch->save();

		// Field GrnMRP
		$this->GrnMRP->AdvancedSearch->SearchValue = @$filter["x_GrnMRP"];
		$this->GrnMRP->AdvancedSearch->SearchOperator = @$filter["z_GrnMRP"];
		$this->GrnMRP->AdvancedSearch->SearchCondition = @$filter["v_GrnMRP"];
		$this->GrnMRP->AdvancedSearch->SearchValue2 = @$filter["y_GrnMRP"];
		$this->GrnMRP->AdvancedSearch->SearchOperator2 = @$filter["w_GrnMRP"];
		$this->GrnMRP->AdvancedSearch->save();

		// Field trid
		$this->trid->AdvancedSearch->SearchValue = @$filter["x_trid"];
		$this->trid->AdvancedSearch->SearchOperator = @$filter["z_trid"];
		$this->trid->AdvancedSearch->SearchCondition = @$filter["v_trid"];
		$this->trid->AdvancedSearch->SearchValue2 = @$filter["y_trid"];
		$this->trid->AdvancedSearch->SearchOperator2 = @$filter["w_trid"];
		$this->trid->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field CreatedBy
		$this->CreatedBy->AdvancedSearch->SearchValue = @$filter["x_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator = @$filter["z_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchCondition = @$filter["v_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchValue2 = @$filter["y_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedBy"];
		$this->CreatedBy->AdvancedSearch->save();

		// Field CreatedDateTime
		$this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
		$this->CreatedDateTime->AdvancedSearch->save();

		// Field ModifiedBy
		$this->ModifiedBy->AdvancedSearch->SearchValue = @$filter["x_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator = @$filter["z_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchCondition = @$filter["v_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedBy"];
		$this->ModifiedBy->AdvancedSearch->save();

		// Field ModifiedDateTime
		$this->ModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDateTime"];
		$this->ModifiedDateTime->AdvancedSearch->save();

		// Field grncreatedby
		$this->grncreatedby->AdvancedSearch->SearchValue = @$filter["x_grncreatedby"];
		$this->grncreatedby->AdvancedSearch->SearchOperator = @$filter["z_grncreatedby"];
		$this->grncreatedby->AdvancedSearch->SearchCondition = @$filter["v_grncreatedby"];
		$this->grncreatedby->AdvancedSearch->SearchValue2 = @$filter["y_grncreatedby"];
		$this->grncreatedby->AdvancedSearch->SearchOperator2 = @$filter["w_grncreatedby"];
		$this->grncreatedby->AdvancedSearch->save();

		// Field grncreatedDateTime
		$this->grncreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_grncreatedDateTime"];
		$this->grncreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_grncreatedDateTime"];
		$this->grncreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_grncreatedDateTime"];
		$this->grncreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_grncreatedDateTime"];
		$this->grncreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_grncreatedDateTime"];
		$this->grncreatedDateTime->AdvancedSearch->save();

		// Field grnModifiedby
		$this->grnModifiedby->AdvancedSearch->SearchValue = @$filter["x_grnModifiedby"];
		$this->grnModifiedby->AdvancedSearch->SearchOperator = @$filter["z_grnModifiedby"];
		$this->grnModifiedby->AdvancedSearch->SearchCondition = @$filter["v_grnModifiedby"];
		$this->grnModifiedby->AdvancedSearch->SearchValue2 = @$filter["y_grnModifiedby"];
		$this->grnModifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_grnModifiedby"];
		$this->grnModifiedby->AdvancedSearch->save();

		// Field grnModifiedDateTime
		$this->grnModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_grnModifiedDateTime"];
		$this->grnModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_grnModifiedDateTime"];
		$this->grnModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_grnModifiedDateTime"];
		$this->grnModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_grnModifiedDateTime"];
		$this->grnModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_grnModifiedDateTime"];
		$this->grnModifiedDateTime->AdvancedSearch->save();

		// Field Received
		$this->Received->AdvancedSearch->SearchValue = @$filter["x_Received"];
		$this->Received->AdvancedSearch->SearchOperator = @$filter["z_Received"];
		$this->Received->AdvancedSearch->SearchCondition = @$filter["v_Received"];
		$this->Received->AdvancedSearch->SearchValue2 = @$filter["y_Received"];
		$this->Received->AdvancedSearch->SearchOperator2 = @$filter["w_Received"];
		$this->Received->AdvancedSearch->save();

		// Field BillDate
		$this->BillDate->AdvancedSearch->SearchValue = @$filter["x_BillDate"];
		$this->BillDate->AdvancedSearch->SearchOperator = @$filter["z_BillDate"];
		$this->BillDate->AdvancedSearch->SearchCondition = @$filter["v_BillDate"];
		$this->BillDate->AdvancedSearch->SearchValue2 = @$filter["y_BillDate"];
		$this->BillDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillDate"];
		$this->BillDate->AdvancedSearch->save();

		// Field CurStock
		$this->CurStock->AdvancedSearch->SearchValue = @$filter["x_CurStock"];
		$this->CurStock->AdvancedSearch->SearchOperator = @$filter["z_CurStock"];
		$this->CurStock->AdvancedSearch->SearchCondition = @$filter["v_CurStock"];
		$this->CurStock->AdvancedSearch->SearchValue2 = @$filter["y_CurStock"];
		$this->CurStock->AdvancedSearch->SearchOperator2 = @$filter["w_CurStock"];
		$this->CurStock->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->ORDNO, $default, FALSE); // ORDNO
		$this->buildSearchSql($where, $this->BRCODE, $default, FALSE); // BRCODE
		$this->buildSearchSql($where, $this->PRC, $default, FALSE); // PRC
		$this->buildSearchSql($where, $this->QTY, $default, FALSE); // QTY
		$this->buildSearchSql($where, $this->DT, $default, FALSE); // DT
		$this->buildSearchSql($where, $this->PC, $default, FALSE); // PC
		$this->buildSearchSql($where, $this->YM, $default, FALSE); // YM
		$this->buildSearchSql($where, $this->Stock, $default, FALSE); // Stock
		$this->buildSearchSql($where, $this->Printcheck, $default, FALSE); // Printcheck
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->grnid, $default, FALSE); // grnid
		$this->buildSearchSql($where, $this->poid, $default, FALSE); // poid
		$this->buildSearchSql($where, $this->LastMonthSale, $default, FALSE); // LastMonthSale
		$this->buildSearchSql($where, $this->PrName, $default, FALSE); // PrName
		$this->buildSearchSql($where, $this->GrnQuantity, $default, FALSE); // GrnQuantity
		$this->buildSearchSql($where, $this->Quantity, $default, FALSE); // Quantity
		$this->buildSearchSql($where, $this->FreeQty, $default, FALSE); // FreeQty
		$this->buildSearchSql($where, $this->BatchNo, $default, FALSE); // BatchNo
		$this->buildSearchSql($where, $this->ExpDate, $default, FALSE); // ExpDate
		$this->buildSearchSql($where, $this->HSN, $default, FALSE); // HSN
		$this->buildSearchSql($where, $this->MFRCODE, $default, FALSE); // MFRCODE
		$this->buildSearchSql($where, $this->PUnit, $default, FALSE); // PUnit
		$this->buildSearchSql($where, $this->SUnit, $default, FALSE); // SUnit
		$this->buildSearchSql($where, $this->MRP, $default, FALSE); // MRP
		$this->buildSearchSql($where, $this->PurValue, $default, FALSE); // PurValue
		$this->buildSearchSql($where, $this->Disc, $default, FALSE); // Disc
		$this->buildSearchSql($where, $this->PSGST, $default, FALSE); // PSGST
		$this->buildSearchSql($where, $this->PCGST, $default, FALSE); // PCGST
		$this->buildSearchSql($where, $this->PTax, $default, FALSE); // PTax
		$this->buildSearchSql($where, $this->ItemValue, $default, FALSE); // ItemValue
		$this->buildSearchSql($where, $this->SalTax, $default, FALSE); // SalTax
		$this->buildSearchSql($where, $this->PurRate, $default, FALSE); // PurRate
		$this->buildSearchSql($where, $this->SalRate, $default, FALSE); // SalRate
		$this->buildSearchSql($where, $this->Discount, $default, FALSE); // Discount
		$this->buildSearchSql($where, $this->SSGST, $default, FALSE); // SSGST
		$this->buildSearchSql($where, $this->SCGST, $default, FALSE); // SCGST
		$this->buildSearchSql($where, $this->Pack, $default, FALSE); // Pack
		$this->buildSearchSql($where, $this->GrnMRP, $default, FALSE); // GrnMRP
		$this->buildSearchSql($where, $this->trid, $default, FALSE); // trid
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->CreatedBy, $default, FALSE); // CreatedBy
		$this->buildSearchSql($where, $this->CreatedDateTime, $default, FALSE); // CreatedDateTime
		$this->buildSearchSql($where, $this->ModifiedBy, $default, FALSE); // ModifiedBy
		$this->buildSearchSql($where, $this->ModifiedDateTime, $default, FALSE); // ModifiedDateTime
		$this->buildSearchSql($where, $this->grncreatedby, $default, FALSE); // grncreatedby
		$this->buildSearchSql($where, $this->grncreatedDateTime, $default, FALSE); // grncreatedDateTime
		$this->buildSearchSql($where, $this->grnModifiedby, $default, FALSE); // grnModifiedby
		$this->buildSearchSql($where, $this->grnModifiedDateTime, $default, FALSE); // grnModifiedDateTime
		$this->buildSearchSql($where, $this->Received, $default, FALSE); // Received
		$this->buildSearchSql($where, $this->BillDate, $default, FALSE); // BillDate
		$this->buildSearchSql($where, $this->CurStock, $default, FALSE); // CurStock

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->ORDNO->AdvancedSearch->save(); // ORDNO
			$this->BRCODE->AdvancedSearch->save(); // BRCODE
			$this->PRC->AdvancedSearch->save(); // PRC
			$this->QTY->AdvancedSearch->save(); // QTY
			$this->DT->AdvancedSearch->save(); // DT
			$this->PC->AdvancedSearch->save(); // PC
			$this->YM->AdvancedSearch->save(); // YM
			$this->Stock->AdvancedSearch->save(); // Stock
			$this->Printcheck->AdvancedSearch->save(); // Printcheck
			$this->id->AdvancedSearch->save(); // id
			$this->grnid->AdvancedSearch->save(); // grnid
			$this->poid->AdvancedSearch->save(); // poid
			$this->LastMonthSale->AdvancedSearch->save(); // LastMonthSale
			$this->PrName->AdvancedSearch->save(); // PrName
			$this->GrnQuantity->AdvancedSearch->save(); // GrnQuantity
			$this->Quantity->AdvancedSearch->save(); // Quantity
			$this->FreeQty->AdvancedSearch->save(); // FreeQty
			$this->BatchNo->AdvancedSearch->save(); // BatchNo
			$this->ExpDate->AdvancedSearch->save(); // ExpDate
			$this->HSN->AdvancedSearch->save(); // HSN
			$this->MFRCODE->AdvancedSearch->save(); // MFRCODE
			$this->PUnit->AdvancedSearch->save(); // PUnit
			$this->SUnit->AdvancedSearch->save(); // SUnit
			$this->MRP->AdvancedSearch->save(); // MRP
			$this->PurValue->AdvancedSearch->save(); // PurValue
			$this->Disc->AdvancedSearch->save(); // Disc
			$this->PSGST->AdvancedSearch->save(); // PSGST
			$this->PCGST->AdvancedSearch->save(); // PCGST
			$this->PTax->AdvancedSearch->save(); // PTax
			$this->ItemValue->AdvancedSearch->save(); // ItemValue
			$this->SalTax->AdvancedSearch->save(); // SalTax
			$this->PurRate->AdvancedSearch->save(); // PurRate
			$this->SalRate->AdvancedSearch->save(); // SalRate
			$this->Discount->AdvancedSearch->save(); // Discount
			$this->SSGST->AdvancedSearch->save(); // SSGST
			$this->SCGST->AdvancedSearch->save(); // SCGST
			$this->Pack->AdvancedSearch->save(); // Pack
			$this->GrnMRP->AdvancedSearch->save(); // GrnMRP
			$this->trid->AdvancedSearch->save(); // trid
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->CreatedBy->AdvancedSearch->save(); // CreatedBy
			$this->CreatedDateTime->AdvancedSearch->save(); // CreatedDateTime
			$this->ModifiedBy->AdvancedSearch->save(); // ModifiedBy
			$this->ModifiedDateTime->AdvancedSearch->save(); // ModifiedDateTime
			$this->grncreatedby->AdvancedSearch->save(); // grncreatedby
			$this->grncreatedDateTime->AdvancedSearch->save(); // grncreatedDateTime
			$this->grnModifiedby->AdvancedSearch->save(); // grnModifiedby
			$this->grnModifiedDateTime->AdvancedSearch->save(); // grnModifiedDateTime
			$this->Received->AdvancedSearch->save(); // Received
			$this->BillDate->AdvancedSearch->save(); // BillDate
			$this->CurStock->AdvancedSearch->save(); // CurStock
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
		$this->buildBasicSearchSql($where, $this->ORDNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->YM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Printcheck, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BatchNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HSN, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pack, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Received, $arKeywords, $type);
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
		if ($this->ORDNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->QTY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->YM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Stock->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Printcheck->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->grnid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->poid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LastMonthSale->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GrnQuantity->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Quantity->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FreeQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BatchNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ExpDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HSN->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MFRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PUnit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SUnit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MRP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Disc->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PTax->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ItemValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SalTax->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurRate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SalRate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Discount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pack->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GrnMRP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->trid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CreatedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CreatedDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ModifiedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ModifiedDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->grncreatedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->grncreatedDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->grnModifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->grnModifiedDateTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Received->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CurStock->AdvancedSearch->issetSession())
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
		$this->ORDNO->AdvancedSearch->unsetSession();
		$this->BRCODE->AdvancedSearch->unsetSession();
		$this->PRC->AdvancedSearch->unsetSession();
		$this->QTY->AdvancedSearch->unsetSession();
		$this->DT->AdvancedSearch->unsetSession();
		$this->PC->AdvancedSearch->unsetSession();
		$this->YM->AdvancedSearch->unsetSession();
		$this->Stock->AdvancedSearch->unsetSession();
		$this->Printcheck->AdvancedSearch->unsetSession();
		$this->id->AdvancedSearch->unsetSession();
		$this->grnid->AdvancedSearch->unsetSession();
		$this->poid->AdvancedSearch->unsetSession();
		$this->LastMonthSale->AdvancedSearch->unsetSession();
		$this->PrName->AdvancedSearch->unsetSession();
		$this->GrnQuantity->AdvancedSearch->unsetSession();
		$this->Quantity->AdvancedSearch->unsetSession();
		$this->FreeQty->AdvancedSearch->unsetSession();
		$this->BatchNo->AdvancedSearch->unsetSession();
		$this->ExpDate->AdvancedSearch->unsetSession();
		$this->HSN->AdvancedSearch->unsetSession();
		$this->MFRCODE->AdvancedSearch->unsetSession();
		$this->PUnit->AdvancedSearch->unsetSession();
		$this->SUnit->AdvancedSearch->unsetSession();
		$this->MRP->AdvancedSearch->unsetSession();
		$this->PurValue->AdvancedSearch->unsetSession();
		$this->Disc->AdvancedSearch->unsetSession();
		$this->PSGST->AdvancedSearch->unsetSession();
		$this->PCGST->AdvancedSearch->unsetSession();
		$this->PTax->AdvancedSearch->unsetSession();
		$this->ItemValue->AdvancedSearch->unsetSession();
		$this->SalTax->AdvancedSearch->unsetSession();
		$this->PurRate->AdvancedSearch->unsetSession();
		$this->SalRate->AdvancedSearch->unsetSession();
		$this->Discount->AdvancedSearch->unsetSession();
		$this->SSGST->AdvancedSearch->unsetSession();
		$this->SCGST->AdvancedSearch->unsetSession();
		$this->Pack->AdvancedSearch->unsetSession();
		$this->GrnMRP->AdvancedSearch->unsetSession();
		$this->trid->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->CreatedBy->AdvancedSearch->unsetSession();
		$this->CreatedDateTime->AdvancedSearch->unsetSession();
		$this->ModifiedBy->AdvancedSearch->unsetSession();
		$this->ModifiedDateTime->AdvancedSearch->unsetSession();
		$this->grncreatedby->AdvancedSearch->unsetSession();
		$this->grncreatedDateTime->AdvancedSearch->unsetSession();
		$this->grnModifiedby->AdvancedSearch->unsetSession();
		$this->grnModifiedDateTime->AdvancedSearch->unsetSession();
		$this->Received->AdvancedSearch->unsetSession();
		$this->BillDate->AdvancedSearch->unsetSession();
		$this->CurStock->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->ORDNO->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->QTY->AdvancedSearch->load();
		$this->DT->AdvancedSearch->load();
		$this->PC->AdvancedSearch->load();
		$this->YM->AdvancedSearch->load();
		$this->Stock->AdvancedSearch->load();
		$this->Printcheck->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->grnid->AdvancedSearch->load();
		$this->poid->AdvancedSearch->load();
		$this->LastMonthSale->AdvancedSearch->load();
		$this->PrName->AdvancedSearch->load();
		$this->GrnQuantity->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->FreeQty->AdvancedSearch->load();
		$this->BatchNo->AdvancedSearch->load();
		$this->ExpDate->AdvancedSearch->load();
		$this->HSN->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->PUnit->AdvancedSearch->load();
		$this->SUnit->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->Disc->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->PTax->AdvancedSearch->load();
		$this->ItemValue->AdvancedSearch->load();
		$this->SalTax->AdvancedSearch->load();
		$this->PurRate->AdvancedSearch->load();
		$this->SalRate->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->Pack->AdvancedSearch->load();
		$this->GrnMRP->AdvancedSearch->load();
		$this->trid->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->CreatedBy->AdvancedSearch->load();
		$this->CreatedDateTime->AdvancedSearch->load();
		$this->ModifiedBy->AdvancedSearch->load();
		$this->ModifiedDateTime->AdvancedSearch->load();
		$this->grncreatedby->AdvancedSearch->load();
		$this->grncreatedDateTime->AdvancedSearch->load();
		$this->grnModifiedby->AdvancedSearch->load();
		$this->grnModifiedDateTime->AdvancedSearch->load();
		$this->Received->AdvancedSearch->load();
		$this->BillDate->AdvancedSearch->load();
		$this->CurStock->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->ORDNO); // ORDNO
			$this->updateSort($this->BRCODE); // BRCODE
			$this->updateSort($this->PRC); // PRC
			$this->updateSort($this->LastMonthSale); // LastMonthSale
			$this->updateSort($this->PrName); // PrName
			$this->updateSort($this->Quantity); // Quantity
			$this->updateSort($this->BatchNo); // BatchNo
			$this->updateSort($this->ExpDate); // ExpDate
			$this->updateSort($this->MRP); // MRP
			$this->updateSort($this->ItemValue); // ItemValue
			$this->updateSort($this->trid); // trid
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->grncreatedby); // grncreatedby
			$this->updateSort($this->grncreatedDateTime); // grncreatedDateTime
			$this->updateSort($this->grnModifiedby); // grnModifiedby
			$this->updateSort($this->grnModifiedDateTime); // grnModifiedDateTime
			$this->updateSort($this->BillDate); // BillDate
			$this->updateSort($this->CurStock); // CurStock
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->trid->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->ORDNO->setSort("");
				$this->BRCODE->setSort("");
				$this->PRC->setSort("");
				$this->LastMonthSale->setSort("");
				$this->PrName->setSort("");
				$this->Quantity->setSort("");
				$this->BatchNo->setSort("");
				$this->ExpDate->setSort("");
				$this->MRP->setSort("");
				$this->ItemValue->setSort("");
				$this->trid->setSort("");
				$this->HospID->setSort("");
				$this->grncreatedby->setSort("");
				$this->grncreatedDateTime->setSort("");
				$this->grnModifiedby->setSort("");
				$this->grnModifiedDateTime->setSort("");
				$this->BillDate->setSort("");
				$this->CurStock->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacytransferlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacytransferlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_pharmacytransferlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacytransferlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_pharmacytransfersrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_pharmacytransfer\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_pharmacytransfersrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_pharmacytransferlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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
		$this->ORDNO->CurrentValue = NULL;
		$this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->QTY->CurrentValue = NULL;
		$this->QTY->OldValue = $this->QTY->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->YM->CurrentValue = NULL;
		$this->YM->OldValue = $this->YM->CurrentValue;
		$this->Stock->CurrentValue = NULL;
		$this->Stock->OldValue = $this->Stock->CurrentValue;
		$this->Printcheck->CurrentValue = NULL;
		$this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->grnid->CurrentValue = NULL;
		$this->grnid->OldValue = $this->grnid->CurrentValue;
		$this->poid->CurrentValue = NULL;
		$this->poid->OldValue = $this->poid->CurrentValue;
		$this->LastMonthSale->CurrentValue = NULL;
		$this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
		$this->PrName->CurrentValue = NULL;
		$this->PrName->OldValue = $this->PrName->CurrentValue;
		$this->GrnQuantity->CurrentValue = NULL;
		$this->GrnQuantity->OldValue = $this->GrnQuantity->CurrentValue;
		$this->Quantity->CurrentValue = NULL;
		$this->Quantity->OldValue = $this->Quantity->CurrentValue;
		$this->FreeQty->CurrentValue = NULL;
		$this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
		$this->BatchNo->CurrentValue = NULL;
		$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
		$this->ExpDate->CurrentValue = NULL;
		$this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
		$this->HSN->CurrentValue = NULL;
		$this->HSN->OldValue = $this->HSN->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->PUnit->CurrentValue = 0;
		$this->PUnit->OldValue = $this->PUnit->CurrentValue;
		$this->SUnit->CurrentValue = 0;
		$this->SUnit->OldValue = $this->SUnit->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->Disc->CurrentValue = NULL;
		$this->Disc->OldValue = $this->Disc->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->PTax->CurrentValue = NULL;
		$this->PTax->OldValue = $this->PTax->CurrentValue;
		$this->ItemValue->CurrentValue = NULL;
		$this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
		$this->SalTax->CurrentValue = NULL;
		$this->SalTax->OldValue = $this->SalTax->CurrentValue;
		$this->PurRate->CurrentValue = NULL;
		$this->PurRate->OldValue = $this->PurRate->CurrentValue;
		$this->SalRate->CurrentValue = NULL;
		$this->SalRate->OldValue = $this->SalRate->CurrentValue;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->Pack->CurrentValue = NULL;
		$this->Pack->OldValue = $this->Pack->CurrentValue;
		$this->GrnMRP->CurrentValue = NULL;
		$this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
		$this->trid->CurrentValue = NULL;
		$this->trid->OldValue = $this->trid->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->CreatedDateTime->CurrentValue = NULL;
		$this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedDateTime->CurrentValue = NULL;
		$this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
		$this->grncreatedby->CurrentValue = NULL;
		$this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
		$this->grncreatedDateTime->CurrentValue = NULL;
		$this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
		$this->grnModifiedby->CurrentValue = NULL;
		$this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
		$this->grnModifiedDateTime->CurrentValue = NULL;
		$this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
		$this->Received->CurrentValue = NULL;
		$this->Received->OldValue = $this->Received->CurrentValue;
		$this->BillDate->CurrentValue = NULL;
		$this->BillDate->OldValue = $this->BillDate->CurrentValue;
		$this->CurStock->CurrentValue = NULL;
		$this->CurStock->OldValue = $this->CurStock->CurrentValue;
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
		// ORDNO

		if (!$this->isAddOrEdit())
			$this->ORDNO->AdvancedSearch->setSearchValue(Get("x_ORDNO", Get("ORDNO", "")));
		if ($this->ORDNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ORDNO->AdvancedSearch->setSearchOperator(Get("z_ORDNO", ""));

		// BRCODE
		if (!$this->isAddOrEdit())
			$this->BRCODE->AdvancedSearch->setSearchValue(Get("x_BRCODE", Get("BRCODE", "")));
		if ($this->BRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BRCODE->AdvancedSearch->setSearchOperator(Get("z_BRCODE", ""));

		// PRC
		if (!$this->isAddOrEdit())
			$this->PRC->AdvancedSearch->setSearchValue(Get("x_PRC", Get("PRC", "")));
		if ($this->PRC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PRC->AdvancedSearch->setSearchOperator(Get("z_PRC", ""));

		// QTY
		if (!$this->isAddOrEdit())
			$this->QTY->AdvancedSearch->setSearchValue(Get("x_QTY", Get("QTY", "")));
		if ($this->QTY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->QTY->AdvancedSearch->setSearchOperator(Get("z_QTY", ""));

		// DT
		if (!$this->isAddOrEdit())
			$this->DT->AdvancedSearch->setSearchValue(Get("x_DT", Get("DT", "")));
		if ($this->DT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DT->AdvancedSearch->setSearchOperator(Get("z_DT", ""));

		// PC
		if (!$this->isAddOrEdit())
			$this->PC->AdvancedSearch->setSearchValue(Get("x_PC", Get("PC", "")));
		if ($this->PC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PC->AdvancedSearch->setSearchOperator(Get("z_PC", ""));

		// YM
		if (!$this->isAddOrEdit())
			$this->YM->AdvancedSearch->setSearchValue(Get("x_YM", Get("YM", "")));
		if ($this->YM->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->YM->AdvancedSearch->setSearchOperator(Get("z_YM", ""));

		// Stock
		if (!$this->isAddOrEdit())
			$this->Stock->AdvancedSearch->setSearchValue(Get("x_Stock", Get("Stock", "")));
		if ($this->Stock->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Stock->AdvancedSearch->setSearchOperator(Get("z_Stock", ""));

		// Printcheck
		if (!$this->isAddOrEdit())
			$this->Printcheck->AdvancedSearch->setSearchValue(Get("x_Printcheck", Get("Printcheck", "")));
		if ($this->Printcheck->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Printcheck->AdvancedSearch->setSearchOperator(Get("z_Printcheck", ""));

		// id
		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// grnid
		if (!$this->isAddOrEdit())
			$this->grnid->AdvancedSearch->setSearchValue(Get("x_grnid", Get("grnid", "")));
		if ($this->grnid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->grnid->AdvancedSearch->setSearchOperator(Get("z_grnid", ""));

		// poid
		if (!$this->isAddOrEdit())
			$this->poid->AdvancedSearch->setSearchValue(Get("x_poid", Get("poid", "")));
		if ($this->poid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->poid->AdvancedSearch->setSearchOperator(Get("z_poid", ""));

		// LastMonthSale
		if (!$this->isAddOrEdit())
			$this->LastMonthSale->AdvancedSearch->setSearchValue(Get("x_LastMonthSale", Get("LastMonthSale", "")));
		if ($this->LastMonthSale->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LastMonthSale->AdvancedSearch->setSearchOperator(Get("z_LastMonthSale", ""));

		// PrName
		if (!$this->isAddOrEdit())
			$this->PrName->AdvancedSearch->setSearchValue(Get("x_PrName", Get("PrName", "")));
		if ($this->PrName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PrName->AdvancedSearch->setSearchOperator(Get("z_PrName", ""));

		// GrnQuantity
		if (!$this->isAddOrEdit())
			$this->GrnQuantity->AdvancedSearch->setSearchValue(Get("x_GrnQuantity", Get("GrnQuantity", "")));
		if ($this->GrnQuantity->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GrnQuantity->AdvancedSearch->setSearchOperator(Get("z_GrnQuantity", ""));

		// Quantity
		if (!$this->isAddOrEdit())
			$this->Quantity->AdvancedSearch->setSearchValue(Get("x_Quantity", Get("Quantity", "")));
		if ($this->Quantity->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Quantity->AdvancedSearch->setSearchOperator(Get("z_Quantity", ""));

		// FreeQty
		if (!$this->isAddOrEdit())
			$this->FreeQty->AdvancedSearch->setSearchValue(Get("x_FreeQty", Get("FreeQty", "")));
		if ($this->FreeQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FreeQty->AdvancedSearch->setSearchOperator(Get("z_FreeQty", ""));

		// BatchNo
		if (!$this->isAddOrEdit())
			$this->BatchNo->AdvancedSearch->setSearchValue(Get("x_BatchNo", Get("BatchNo", "")));
		if ($this->BatchNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BatchNo->AdvancedSearch->setSearchOperator(Get("z_BatchNo", ""));

		// ExpDate
		if (!$this->isAddOrEdit())
			$this->ExpDate->AdvancedSearch->setSearchValue(Get("x_ExpDate", Get("ExpDate", "")));
		if ($this->ExpDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ExpDate->AdvancedSearch->setSearchOperator(Get("z_ExpDate", ""));

		// HSN
		if (!$this->isAddOrEdit())
			$this->HSN->AdvancedSearch->setSearchValue(Get("x_HSN", Get("HSN", "")));
		if ($this->HSN->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HSN->AdvancedSearch->setSearchOperator(Get("z_HSN", ""));

		// MFRCODE
		if (!$this->isAddOrEdit())
			$this->MFRCODE->AdvancedSearch->setSearchValue(Get("x_MFRCODE", Get("MFRCODE", "")));
		if ($this->MFRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MFRCODE->AdvancedSearch->setSearchOperator(Get("z_MFRCODE", ""));

		// PUnit
		if (!$this->isAddOrEdit())
			$this->PUnit->AdvancedSearch->setSearchValue(Get("x_PUnit", Get("PUnit", "")));
		if ($this->PUnit->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PUnit->AdvancedSearch->setSearchOperator(Get("z_PUnit", ""));

		// SUnit
		if (!$this->isAddOrEdit())
			$this->SUnit->AdvancedSearch->setSearchValue(Get("x_SUnit", Get("SUnit", "")));
		if ($this->SUnit->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SUnit->AdvancedSearch->setSearchOperator(Get("z_SUnit", ""));

		// MRP
		if (!$this->isAddOrEdit())
			$this->MRP->AdvancedSearch->setSearchValue(Get("x_MRP", Get("MRP", "")));
		if ($this->MRP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MRP->AdvancedSearch->setSearchOperator(Get("z_MRP", ""));

		// PurValue
		if (!$this->isAddOrEdit())
			$this->PurValue->AdvancedSearch->setSearchValue(Get("x_PurValue", Get("PurValue", "")));
		if ($this->PurValue->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurValue->AdvancedSearch->setSearchOperator(Get("z_PurValue", ""));

		// Disc
		if (!$this->isAddOrEdit())
			$this->Disc->AdvancedSearch->setSearchValue(Get("x_Disc", Get("Disc", "")));
		if ($this->Disc->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Disc->AdvancedSearch->setSearchOperator(Get("z_Disc", ""));

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

		// PTax
		if (!$this->isAddOrEdit())
			$this->PTax->AdvancedSearch->setSearchValue(Get("x_PTax", Get("PTax", "")));
		if ($this->PTax->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PTax->AdvancedSearch->setSearchOperator(Get("z_PTax", ""));

		// ItemValue
		if (!$this->isAddOrEdit())
			$this->ItemValue->AdvancedSearch->setSearchValue(Get("x_ItemValue", Get("ItemValue", "")));
		if ($this->ItemValue->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ItemValue->AdvancedSearch->setSearchOperator(Get("z_ItemValue", ""));

		// SalTax
		if (!$this->isAddOrEdit())
			$this->SalTax->AdvancedSearch->setSearchValue(Get("x_SalTax", Get("SalTax", "")));
		if ($this->SalTax->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SalTax->AdvancedSearch->setSearchOperator(Get("z_SalTax", ""));

		// PurRate
		if (!$this->isAddOrEdit())
			$this->PurRate->AdvancedSearch->setSearchValue(Get("x_PurRate", Get("PurRate", "")));
		if ($this->PurRate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurRate->AdvancedSearch->setSearchOperator(Get("z_PurRate", ""));

		// SalRate
		if (!$this->isAddOrEdit())
			$this->SalRate->AdvancedSearch->setSearchValue(Get("x_SalRate", Get("SalRate", "")));
		if ($this->SalRate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SalRate->AdvancedSearch->setSearchOperator(Get("z_SalRate", ""));

		// Discount
		if (!$this->isAddOrEdit())
			$this->Discount->AdvancedSearch->setSearchValue(Get("x_Discount", Get("Discount", "")));
		if ($this->Discount->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Discount->AdvancedSearch->setSearchOperator(Get("z_Discount", ""));

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

		// Pack
		if (!$this->isAddOrEdit())
			$this->Pack->AdvancedSearch->setSearchValue(Get("x_Pack", Get("Pack", "")));
		if ($this->Pack->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Pack->AdvancedSearch->setSearchOperator(Get("z_Pack", ""));

		// GrnMRP
		if (!$this->isAddOrEdit())
			$this->GrnMRP->AdvancedSearch->setSearchValue(Get("x_GrnMRP", Get("GrnMRP", "")));
		if ($this->GrnMRP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GrnMRP->AdvancedSearch->setSearchOperator(Get("z_GrnMRP", ""));

		// trid
		if (!$this->isAddOrEdit())
			$this->trid->AdvancedSearch->setSearchValue(Get("x_trid", Get("trid", "")));
		if ($this->trid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->trid->AdvancedSearch->setSearchOperator(Get("z_trid", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// CreatedBy
		if (!$this->isAddOrEdit())
			$this->CreatedBy->AdvancedSearch->setSearchValue(Get("x_CreatedBy", Get("CreatedBy", "")));
		if ($this->CreatedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedBy->AdvancedSearch->setSearchOperator(Get("z_CreatedBy", ""));

		// CreatedDateTime
		if (!$this->isAddOrEdit())
			$this->CreatedDateTime->AdvancedSearch->setSearchValue(Get("x_CreatedDateTime", Get("CreatedDateTime", "")));
		if ($this->CreatedDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CreatedDateTime->AdvancedSearch->setSearchOperator(Get("z_CreatedDateTime", ""));

		// ModifiedBy
		if (!$this->isAddOrEdit())
			$this->ModifiedBy->AdvancedSearch->setSearchValue(Get("x_ModifiedBy", Get("ModifiedBy", "")));
		if ($this->ModifiedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ModifiedBy->AdvancedSearch->setSearchOperator(Get("z_ModifiedBy", ""));

		// ModifiedDateTime
		if (!$this->isAddOrEdit())
			$this->ModifiedDateTime->AdvancedSearch->setSearchValue(Get("x_ModifiedDateTime", Get("ModifiedDateTime", "")));
		if ($this->ModifiedDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ModifiedDateTime->AdvancedSearch->setSearchOperator(Get("z_ModifiedDateTime", ""));

		// grncreatedby
		if (!$this->isAddOrEdit())
			$this->grncreatedby->AdvancedSearch->setSearchValue(Get("x_grncreatedby", Get("grncreatedby", "")));
		if ($this->grncreatedby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->grncreatedby->AdvancedSearch->setSearchOperator(Get("z_grncreatedby", ""));

		// grncreatedDateTime
		if (!$this->isAddOrEdit())
			$this->grncreatedDateTime->AdvancedSearch->setSearchValue(Get("x_grncreatedDateTime", Get("grncreatedDateTime", "")));
		if ($this->grncreatedDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->grncreatedDateTime->AdvancedSearch->setSearchOperator(Get("z_grncreatedDateTime", ""));

		// grnModifiedby
		if (!$this->isAddOrEdit())
			$this->grnModifiedby->AdvancedSearch->setSearchValue(Get("x_grnModifiedby", Get("grnModifiedby", "")));
		if ($this->grnModifiedby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->grnModifiedby->AdvancedSearch->setSearchOperator(Get("z_grnModifiedby", ""));

		// grnModifiedDateTime
		if (!$this->isAddOrEdit())
			$this->grnModifiedDateTime->AdvancedSearch->setSearchValue(Get("x_grnModifiedDateTime", Get("grnModifiedDateTime", "")));
		if ($this->grnModifiedDateTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->grnModifiedDateTime->AdvancedSearch->setSearchOperator(Get("z_grnModifiedDateTime", ""));

		// Received
		if (!$this->isAddOrEdit())
			$this->Received->AdvancedSearch->setSearchValue(Get("x_Received", Get("Received", "")));
		if ($this->Received->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Received->AdvancedSearch->setSearchOperator(Get("z_Received", ""));

		// BillDate
		if (!$this->isAddOrEdit())
			$this->BillDate->AdvancedSearch->setSearchValue(Get("x_BillDate", Get("BillDate", "")));
		if ($this->BillDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BillDate->AdvancedSearch->setSearchOperator(Get("z_BillDate", ""));

		// CurStock
		if (!$this->isAddOrEdit())
			$this->CurStock->AdvancedSearch->setSearchValue(Get("x_CurStock", Get("CurStock", "")));
		if ($this->CurStock->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CurStock->AdvancedSearch->setSearchOperator(Get("z_CurStock", ""));
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'ORDNO' first before field var 'x_ORDNO'
		$val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
		if (!$this->ORDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ORDNO->Visible = FALSE; // Disable update for API request
			else
				$this->ORDNO->setFormValue($val);
		}
		$this->ORDNO->setOldValue($CurrentForm->getValue("o_ORDNO"));

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

		// Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
		$val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
		if (!$this->LastMonthSale->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LastMonthSale->Visible = FALSE; // Disable update for API request
			else
				$this->LastMonthSale->setFormValue($val);
		}
		$this->LastMonthSale->setOldValue($CurrentForm->getValue("o_LastMonthSale"));

		// Check field name 'PrName' first before field var 'x_PrName'
		$val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
		if (!$this->PrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrName->Visible = FALSE; // Disable update for API request
			else
				$this->PrName->setFormValue($val);
		}
		$this->PrName->setOldValue($CurrentForm->getValue("o_PrName"));

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}
		$this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));

		// Check field name 'BatchNo' first before field var 'x_BatchNo'
		$val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
		if (!$this->BatchNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->BatchNo->setFormValue($val);
		}
		$this->BatchNo->setOldValue($CurrentForm->getValue("o_BatchNo"));

		// Check field name 'ExpDate' first before field var 'x_ExpDate'
		$val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
		if (!$this->ExpDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExpDate->Visible = FALSE; // Disable update for API request
			else
				$this->ExpDate->setFormValue($val);
			$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
		}
		$this->ExpDate->setOldValue($CurrentForm->getValue("o_ExpDate"));

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}
		$this->MRP->setOldValue($CurrentForm->getValue("o_MRP"));

		// Check field name 'ItemValue' first before field var 'x_ItemValue'
		$val = $CurrentForm->hasValue("ItemValue") ? $CurrentForm->getValue("ItemValue") : $CurrentForm->getValue("x_ItemValue");
		if (!$this->ItemValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ItemValue->Visible = FALSE; // Disable update for API request
			else
				$this->ItemValue->setFormValue($val);
		}
		$this->ItemValue->setOldValue($CurrentForm->getValue("o_ItemValue"));

		// Check field name 'trid' first before field var 'x_trid'
		$val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
		if (!$this->trid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->trid->Visible = FALSE; // Disable update for API request
			else
				$this->trid->setFormValue($val);
		}
		$this->trid->setOldValue($CurrentForm->getValue("o_trid"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));

		// Check field name 'grncreatedby' first before field var 'x_grncreatedby'
		$val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
		if (!$this->grncreatedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grncreatedby->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedby->setFormValue($val);
		}
		$this->grncreatedby->setOldValue($CurrentForm->getValue("o_grncreatedby"));

		// Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
		$val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
		if (!$this->grncreatedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grncreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedDateTime->setFormValue($val);
			$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		}
		$this->grncreatedDateTime->setOldValue($CurrentForm->getValue("o_grncreatedDateTime"));

		// Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
		$val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
		if (!$this->grnModifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grnModifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedby->setFormValue($val);
		}
		$this->grnModifiedby->setOldValue($CurrentForm->getValue("o_grnModifiedby"));

		// Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
		$val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
		if (!$this->grnModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grnModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedDateTime->setFormValue($val);
			$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		}
		$this->grnModifiedDateTime->setOldValue($CurrentForm->getValue("o_grnModifiedDateTime"));

		// Check field name 'BillDate' first before field var 'x_BillDate'
		$val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
		if (!$this->BillDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillDate->setFormValue($val);
			$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		}
		$this->BillDate->setOldValue($CurrentForm->getValue("o_BillDate"));

		// Check field name 'CurStock' first before field var 'x_CurStock'
		$val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
		if (!$this->CurStock->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CurStock->Visible = FALSE; // Disable update for API request
			else
				$this->CurStock->setFormValue($val);
		}
		$this->CurStock->setOldValue($CurrentForm->getValue("o_CurStock"));

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
		$this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
		$this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
		$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->ItemValue->CurrentValue = $this->ItemValue->FormValue;
		$this->trid->CurrentValue = $this->trid->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
		$this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
		$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		$this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
		$this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
		$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		$this->BillDate->CurrentValue = $this->BillDate->FormValue;
		$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		$this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
		$this->ORDNO->setDbValue($row['ORDNO']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->PRC->setDbValue($row['PRC']);
		$this->QTY->setDbValue($row['QTY']);
		$this->DT->setDbValue($row['DT']);
		$this->PC->setDbValue($row['PC']);
		$this->YM->setDbValue($row['YM']);
		$this->Stock->setDbValue($row['Stock']);
		$this->Printcheck->setDbValue($row['Printcheck']);
		$this->id->setDbValue($row['id']);
		$this->grnid->setDbValue($row['grnid']);
		$this->poid->setDbValue($row['poid']);
		$this->LastMonthSale->setDbValue($row['LastMonthSale']);
		$this->PrName->setDbValue($row['PrName']);
		$this->GrnQuantity->setDbValue($row['GrnQuantity']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->FreeQty->setDbValue($row['FreeQty']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->ExpDate->setDbValue($row['ExpDate']);
		$this->HSN->setDbValue($row['HSN']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->MRP->setDbValue($row['MRP']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->Disc->setDbValue($row['Disc']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->PTax->setDbValue($row['PTax']);
		$this->ItemValue->setDbValue($row['ItemValue']);
		$this->SalTax->setDbValue($row['SalTax']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->SalRate->setDbValue($row['SalRate']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->Pack->setDbValue($row['Pack']);
		$this->GrnMRP->setDbValue($row['GrnMRP']);
		$this->trid->setDbValue($row['trid']);
		$this->HospID->setDbValue($row['HospID']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->grncreatedby->setDbValue($row['grncreatedby']);
		$this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
		$this->grnModifiedby->setDbValue($row['grnModifiedby']);
		$this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
		$this->Received->setDbValue($row['Received']);
		$this->BillDate->setDbValue($row['BillDate']);
		$this->CurStock->setDbValue($row['CurStock']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['ORDNO'] = $this->ORDNO->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['QTY'] = $this->QTY->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['YM'] = $this->YM->CurrentValue;
		$row['Stock'] = $this->Stock->CurrentValue;
		$row['Printcheck'] = $this->Printcheck->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['grnid'] = $this->grnid->CurrentValue;
		$row['poid'] = $this->poid->CurrentValue;
		$row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
		$row['PrName'] = $this->PrName->CurrentValue;
		$row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['FreeQty'] = $this->FreeQty->CurrentValue;
		$row['BatchNo'] = $this->BatchNo->CurrentValue;
		$row['ExpDate'] = $this->ExpDate->CurrentValue;
		$row['HSN'] = $this->HSN->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['PUnit'] = $this->PUnit->CurrentValue;
		$row['SUnit'] = $this->SUnit->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['Disc'] = $this->Disc->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['PTax'] = $this->PTax->CurrentValue;
		$row['ItemValue'] = $this->ItemValue->CurrentValue;
		$row['SalTax'] = $this->SalTax->CurrentValue;
		$row['PurRate'] = $this->PurRate->CurrentValue;
		$row['SalRate'] = $this->SalRate->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['Pack'] = $this->Pack->CurrentValue;
		$row['GrnMRP'] = $this->GrnMRP->CurrentValue;
		$row['trid'] = $this->trid->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
		$row['grncreatedby'] = $this->grncreatedby->CurrentValue;
		$row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
		$row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
		$row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
		$row['Received'] = $this->Received->CurrentValue;
		$row['BillDate'] = $this->BillDate->CurrentValue;
		$row['CurStock'] = $this->CurStock->CurrentValue;
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
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue)))
			$this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// ORDNO
		// BRCODE
		// PRC
		// QTY
		// DT
		// PC
		// YM
		// Stock
		// Printcheck
		// id
		// grnid
		// poid
		// LastMonthSale
		// PrName
		// GrnQuantity
		// Quantity
		// FreeQty
		// BatchNo
		// ExpDate
		// HSN
		// MFRCODE
		// PUnit
		// SUnit
		// MRP
		// PurValue
		// Disc
		// PSGST
		// PCGST
		// PTax
		// ItemValue
		// SalTax
		// PurRate
		// SalRate
		// Discount
		// SSGST
		// SCGST
		// Pack
		// GrnMRP
		// trid
		// HospID
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received
		// BillDate
		// CurStock

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ORDNO
			$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
			$curVal = strval($this->ORDNO->CurrentValue);
			if ($curVal <> "") {
				$this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
				if ($this->ORDNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
					}
				}
			} else {
				$this->ORDNO->ViewValue = NULL;
			}
			$this->ORDNO->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
					}
				}
			} else {
				$this->BRCODE->ViewValue = NULL;
			}
			$this->BRCODE->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// QTY
			$this->QTY->ViewValue = $this->QTY->CurrentValue;
			$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
			$this->QTY->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// Printcheck
			$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
			$this->Printcheck->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// grnid
			$this->grnid->ViewValue = $this->grnid->CurrentValue;
			$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
			$this->grnid->ViewCustomAttributes = "";

			// poid
			$this->poid->ViewValue = $this->poid->CurrentValue;
			$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
			$this->poid->ViewCustomAttributes = "";

			// LastMonthSale
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
			$curVal = strval($this->LastMonthSale->CurrentValue);
			if ($curVal <> "") {
				$this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
				if ($this->LastMonthSale->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$arwrk[3] = FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2);
						$this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
					}
				}
			} else {
				$this->LastMonthSale->ViewValue = NULL;
			}
			$this->LastMonthSale->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// GrnQuantity
			$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
			$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
			$this->GrnQuantity->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// FreeQty
			$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
			$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
			$this->FreeQty->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// ExpDate
			$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
			$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
			$this->ExpDate->ViewCustomAttributes = "";

			// HSN
			$this->HSN->ViewValue = $this->HSN->CurrentValue;
			$this->HSN->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// Disc
			$this->Disc->ViewValue = $this->Disc->CurrentValue;
			$this->Disc->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// PTax
			$this->PTax->ViewValue = $this->PTax->CurrentValue;
			$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
			$this->PTax->ViewCustomAttributes = "";

			// ItemValue
			$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
			$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
			$this->ItemValue->ViewCustomAttributes = "";

			// SalTax
			$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
			$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
			$this->SalTax->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// SalRate
			$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
			$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
			$this->SalRate->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// Pack
			$this->Pack->ViewValue = $this->Pack->CurrentValue;
			$this->Pack->ViewCustomAttributes = "";

			// GrnMRP
			$this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
			$this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
			$this->GrnMRP->ViewCustomAttributes = "";

			// trid
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// grncreatedby
			$this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
			$this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
			$this->grncreatedby->ViewCustomAttributes = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
			$this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
			$this->grncreatedDateTime->ViewCustomAttributes = "";

			// grnModifiedby
			$this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
			$this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
			$this->grnModifiedby->ViewCustomAttributes = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
			$this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
			$this->grnModifiedDateTime->ViewCustomAttributes = "";

			// Received
			$this->Received->ViewValue = $this->Received->CurrentValue;
			$this->Received->ViewCustomAttributes = "";

			// BillDate
			$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
			$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
			$this->BillDate->ViewCustomAttributes = "";

			// CurStock
			$this->CurStock->ViewValue = $this->CurStock->CurrentValue;
			$this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
			$this->CurStock->ViewCustomAttributes = "";

			// ORDNO
			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";
			$this->ORDNO->TooltipValue = "";
			if (!$this->isExport())
				$this->ORDNO->ViewValue = $this->highlightValue($this->ORDNO);

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";
			if (!$this->isExport())
				$this->PRC->ViewValue = $this->highlightValue($this->PRC);

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";
			$this->LastMonthSale->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";
			if (!$this->isExport())
				$this->PrName->ViewValue = $this->highlightValue($this->PrName);

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";
			$this->BatchNo->TooltipValue = "";
			if (!$this->isExport())
				$this->BatchNo->ViewValue = $this->highlightValue($this->BatchNo);

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";
			$this->ExpDate->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";
			$this->ItemValue->TooltipValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";
			$this->trid->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";
			$this->grncreatedby->TooltipValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";
			$this->grncreatedDateTime->TooltipValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";
			$this->grnModifiedby->TooltipValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";
			$this->grnModifiedDateTime->TooltipValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";
			$this->BillDate->TooltipValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
			$this->CurStock->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// ORDNO
			// BRCODE

			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
					}
				}
			} else {
				$this->BRCODE->EditValue = NULL;
			}
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$curVal = strval($this->LastMonthSale->CurrentValue);
			if ($curVal <> "") {
				$this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
				if ($this->LastMonthSale->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode(FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2));
						$this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
					}
				}
			} else {
				$this->LastMonthSale->EditValue = NULL;
			}
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue)) {
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
				$this->MRP->OldValue = $this->MRP->EditValue;
			}

			// ItemValue
			$this->ItemValue->EditAttrs["class"] = "form-control";
			$this->ItemValue->EditCustomAttributes = "";
			$this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
			$this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
			if (strval($this->ItemValue->EditValue) <> "" && is_numeric($this->ItemValue->EditValue)) {
				$this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
				$this->ItemValue->OldValue = $this->ItemValue->EditValue;
			}

			// trid
			$this->trid->EditAttrs["class"] = "form-control";
			$this->trid->EditCustomAttributes = "";
			if ($this->trid->getSessionValue() <> "") {
				$this->trid->CurrentValue = $this->trid->getSessionValue();
				$this->trid->OldValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";
			} else {
			$this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
			$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
			}

			// HospID
			// grncreatedby
			// grncreatedDateTime
			// grnModifiedby
			// grnModifiedDateTime
			// BillDate

			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

			// Add refer script
			// ORDNO

			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ORDNO
			// BRCODE

			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
					}
				}
			} else {
				$this->BRCODE->EditValue = NULL;
			}
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$curVal = strval($this->LastMonthSale->CurrentValue);
			if ($curVal <> "") {
				$this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
				if ($this->LastMonthSale->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode(FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2));
						$this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
					}
				}
			} else {
				$this->LastMonthSale->EditValue = NULL;
			}
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue)) {
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
				$this->MRP->OldValue = $this->MRP->EditValue;
			}

			// ItemValue
			$this->ItemValue->EditAttrs["class"] = "form-control";
			$this->ItemValue->EditCustomAttributes = "";
			$this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
			$this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
			if (strval($this->ItemValue->EditValue) <> "" && is_numeric($this->ItemValue->EditValue)) {
				$this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
				$this->ItemValue->OldValue = $this->ItemValue->EditValue;
			}

			// trid
			$this->trid->EditAttrs["class"] = "form-control";
			$this->trid->EditCustomAttributes = "";
			if ($this->trid->getSessionValue() <> "") {
				$this->trid->CurrentValue = $this->trid->getSessionValue();
				$this->trid->OldValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";
			} else {
			$this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
			$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
			}

			// HospID
			// grncreatedby
			// grncreatedDateTime
			// grnModifiedby
			// grnModifiedDateTime
			// BillDate

			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

			// Edit refer script
			// ORDNO

			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
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
		if ($this->ORDNO->Required) {
			if (!$this->ORDNO->IsDetailKey && $this->ORDNO->FormValue != NULL && $this->ORDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BRCODE->FormValue)) {
			AddMessage($FormError, $this->BRCODE->errorMessage());
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->QTY->Required) {
			if (!$this->QTY->IsDetailKey && $this->QTY->FormValue != NULL && $this->QTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QTY->caption(), $this->QTY->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->Stock->Required) {
			if (!$this->Stock->IsDetailKey && $this->Stock->FormValue != NULL && $this->Stock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
			}
		}
		if ($this->Printcheck->Required) {
			if (!$this->Printcheck->IsDetailKey && $this->Printcheck->FormValue != NULL && $this->Printcheck->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printcheck->caption(), $this->Printcheck->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->grnid->Required) {
			if (!$this->grnid->IsDetailKey && $this->grnid->FormValue != NULL && $this->grnid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnid->caption(), $this->grnid->RequiredErrorMessage));
			}
		}
		if ($this->poid->Required) {
			if (!$this->poid->IsDetailKey && $this->poid->FormValue != NULL && $this->poid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->poid->caption(), $this->poid->RequiredErrorMessage));
			}
		}
		if ($this->LastMonthSale->Required) {
			if (!$this->LastMonthSale->IsDetailKey && $this->LastMonthSale->FormValue != NULL && $this->LastMonthSale->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->LastMonthSale->FormValue)) {
			AddMessage($FormError, $this->LastMonthSale->errorMessage());
		}
		if ($this->PrName->Required) {
			if (!$this->PrName->IsDetailKey && $this->PrName->FormValue != NULL && $this->PrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
			}
		}
		if ($this->GrnQuantity->Required) {
			if (!$this->GrnQuantity->IsDetailKey && $this->GrnQuantity->FormValue != NULL && $this->GrnQuantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnQuantity->caption(), $this->GrnQuantity->RequiredErrorMessage));
			}
		}
		if ($this->Quantity->Required) {
			if (!$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Quantity->FormValue)) {
			AddMessage($FormError, $this->Quantity->errorMessage());
		}
		if ($this->FreeQty->Required) {
			if (!$this->FreeQty->IsDetailKey && $this->FreeQty->FormValue != NULL && $this->FreeQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FreeQty->caption(), $this->FreeQty->RequiredErrorMessage));
			}
		}
		if ($this->BatchNo->Required) {
			if (!$this->BatchNo->IsDetailKey && $this->BatchNo->FormValue != NULL && $this->BatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
			}
		}
		if ($this->ExpDate->Required) {
			if (!$this->ExpDate->IsDetailKey && $this->ExpDate->FormValue != NULL && $this->ExpDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ExpDate->FormValue)) {
			AddMessage($FormError, $this->ExpDate->errorMessage());
		}
		if ($this->HSN->Required) {
			if (!$this->HSN->IsDetailKey && $this->HSN->FormValue != NULL && $this->HSN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSN->caption(), $this->HSN->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PUnit->Required) {
			if (!$this->PUnit->IsDetailKey && $this->PUnit->FormValue != NULL && $this->PUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
			}
		}
		if ($this->SUnit->Required) {
			if (!$this->SUnit->IsDetailKey && $this->SUnit->FormValue != NULL && $this->SUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
			}
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRP->FormValue)) {
			AddMessage($FormError, $this->MRP->errorMessage());
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if ($this->Disc->Required) {
			if (!$this->Disc->IsDetailKey && $this->Disc->FormValue != NULL && $this->Disc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Disc->caption(), $this->Disc->RequiredErrorMessage));
			}
		}
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if ($this->PTax->Required) {
			if (!$this->PTax->IsDetailKey && $this->PTax->FormValue != NULL && $this->PTax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTax->caption(), $this->PTax->RequiredErrorMessage));
			}
		}
		if ($this->ItemValue->Required) {
			if (!$this->ItemValue->IsDetailKey && $this->ItemValue->FormValue != NULL && $this->ItemValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ItemValue->caption(), $this->ItemValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ItemValue->FormValue)) {
			AddMessage($FormError, $this->ItemValue->errorMessage());
		}
		if ($this->SalTax->Required) {
			if (!$this->SalTax->IsDetailKey && $this->SalTax->FormValue != NULL && $this->SalTax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalTax->caption(), $this->SalTax->RequiredErrorMessage));
			}
		}
		if ($this->PurRate->Required) {
			if (!$this->PurRate->IsDetailKey && $this->PurRate->FormValue != NULL && $this->PurRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
			}
		}
		if ($this->SalRate->Required) {
			if (!$this->SalRate->IsDetailKey && $this->SalRate->FormValue != NULL && $this->SalRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalRate->caption(), $this->SalRate->RequiredErrorMessage));
			}
		}
		if ($this->Discount->Required) {
			if (!$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
			}
		}
		if ($this->Pack->Required) {
			if (!$this->Pack->IsDetailKey && $this->Pack->FormValue != NULL && $this->Pack->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pack->caption(), $this->Pack->RequiredErrorMessage));
			}
		}
		if ($this->GrnMRP->Required) {
			if (!$this->GrnMRP->IsDetailKey && $this->GrnMRP->FormValue != NULL && $this->GrnMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnMRP->caption(), $this->GrnMRP->RequiredErrorMessage));
			}
		}
		if ($this->trid->Required) {
			if (!$this->trid->IsDetailKey && $this->trid->FormValue != NULL && $this->trid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->trid->FormValue)) {
			AddMessage($FormError, $this->trid->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->grncreatedby->Required) {
			if (!$this->grncreatedby->IsDetailKey && $this->grncreatedby->FormValue != NULL && $this->grncreatedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
			}
		}
		if ($this->grncreatedDateTime->Required) {
			if (!$this->grncreatedDateTime->IsDetailKey && $this->grncreatedDateTime->FormValue != NULL && $this->grncreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->grnModifiedby->Required) {
			if (!$this->grnModifiedby->IsDetailKey && $this->grnModifiedby->FormValue != NULL && $this->grnModifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
			}
		}
		if ($this->grnModifiedDateTime->Required) {
			if (!$this->grnModifiedDateTime->IsDetailKey && $this->grnModifiedDateTime->FormValue != NULL && $this->grnModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->Received->Required) {
			if (!$this->Received->IsDetailKey && $this->Received->FormValue != NULL && $this->Received->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Received->caption(), $this->Received->RequiredErrorMessage));
			}
		}
		if ($this->BillDate->Required) {
			if (!$this->BillDate->IsDetailKey && $this->BillDate->FormValue != NULL && $this->BillDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillDate->FormValue)) {
			AddMessage($FormError, $this->BillDate->errorMessage());
		}
		if ($this->CurStock->Required) {
			if (!$this->CurStock->IsDetailKey && $this->CurStock->FormValue != NULL && $this->CurStock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CurStock->FormValue)) {
			AddMessage($FormError, $this->CurStock->errorMessage());
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

			// ORDNO
			$this->ORDNO->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['ORDNO'] = &$this->ORDNO->DbValue;

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// LastMonthSale
			$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, $this->LastMonthSale->ReadOnly);

			// PrName
			$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, $this->PrName->ReadOnly);

			// Quantity
			$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, $this->Quantity->ReadOnly);

			// BatchNo
			$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, $this->BatchNo->ReadOnly);

			// ExpDate
			$this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), NULL, $this->ExpDate->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// ItemValue
			$this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, NULL, $this->ItemValue->ReadOnly);

			// trid
			$this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, NULL, $this->trid->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// grncreatedby
			$this->grncreatedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['grncreatedby'] = &$this->grncreatedby->DbValue;

			// grncreatedDateTime
			$this->grncreatedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['grncreatedDateTime'] = &$this->grncreatedDateTime->DbValue;

			// grnModifiedby
			$this->grnModifiedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['grnModifiedby'] = &$this->grnModifiedby->DbValue;

			// grnModifiedDateTime
			$this->grnModifiedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['grnModifiedDateTime'] = &$this->grnModifiedDateTime->DbValue;

			// BillDate
			$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, $this->BillDate->ReadOnly);

			// CurStock
			$this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, NULL, $this->CurStock->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('ORDNO')); // ORDNO
		$hash .= GetFieldHash($rs->fields('BRCODE')); // BRCODE
		$hash .= GetFieldHash($rs->fields('PRC')); // PRC
		$hash .= GetFieldHash($rs->fields('LastMonthSale')); // LastMonthSale
		$hash .= GetFieldHash($rs->fields('PrName')); // PrName
		$hash .= GetFieldHash($rs->fields('Quantity')); // Quantity
		$hash .= GetFieldHash($rs->fields('BatchNo')); // BatchNo
		$hash .= GetFieldHash($rs->fields('ExpDate')); // ExpDate
		$hash .= GetFieldHash($rs->fields('MRP')); // MRP
		$hash .= GetFieldHash($rs->fields('ItemValue')); // ItemValue
		$hash .= GetFieldHash($rs->fields('trid')); // trid
		$hash .= GetFieldHash($rs->fields('HospID')); // HospID
		$hash .= GetFieldHash($rs->fields('grncreatedby')); // grncreatedby
		$hash .= GetFieldHash($rs->fields('grncreatedDateTime')); // grncreatedDateTime
		$hash .= GetFieldHash($rs->fields('grnModifiedby')); // grnModifiedby
		$hash .= GetFieldHash($rs->fields('grnModifiedDateTime')); // grnModifiedDateTime
		$hash .= GetFieldHash($rs->fields('BillDate')); // BillDate
		$hash .= GetFieldHash($rs->fields('CurStock')); // CurStock
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

		// ORDNO
		$this->ORDNO->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['ORDNO'] = &$this->ORDNO->DbValue;

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, FALSE);

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// LastMonthSale
		$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, FALSE);

		// PrName
		$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, FALSE);

		// Quantity
		$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, FALSE);

		// BatchNo
		$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, FALSE);

		// ExpDate
		$this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), NULL, FALSE);

		// MRP
		$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, FALSE);

		// ItemValue
		$this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, NULL, FALSE);

		// trid
		$this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// grncreatedby
		$this->grncreatedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['grncreatedby'] = &$this->grncreatedby->DbValue;

		// grncreatedDateTime
		$this->grncreatedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['grncreatedDateTime'] = &$this->grncreatedDateTime->DbValue;

		// grnModifiedby
		$this->grnModifiedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['grnModifiedby'] = &$this->grnModifiedby->DbValue;

		// grnModifiedDateTime
		$this->grnModifiedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['grnModifiedDateTime'] = &$this->grnModifiedDateTime->DbValue;

		// BillDate
		$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, FALSE);

		// CurStock
		$this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, NULL, FALSE);

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
		$this->ORDNO->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->QTY->AdvancedSearch->load();
		$this->DT->AdvancedSearch->load();
		$this->PC->AdvancedSearch->load();
		$this->YM->AdvancedSearch->load();
		$this->Stock->AdvancedSearch->load();
		$this->Printcheck->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->grnid->AdvancedSearch->load();
		$this->poid->AdvancedSearch->load();
		$this->LastMonthSale->AdvancedSearch->load();
		$this->PrName->AdvancedSearch->load();
		$this->GrnQuantity->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->FreeQty->AdvancedSearch->load();
		$this->BatchNo->AdvancedSearch->load();
		$this->ExpDate->AdvancedSearch->load();
		$this->HSN->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->PUnit->AdvancedSearch->load();
		$this->SUnit->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->Disc->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->PTax->AdvancedSearch->load();
		$this->ItemValue->AdvancedSearch->load();
		$this->SalTax->AdvancedSearch->load();
		$this->PurRate->AdvancedSearch->load();
		$this->SalRate->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->Pack->AdvancedSearch->load();
		$this->GrnMRP->AdvancedSearch->load();
		$this->trid->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->CreatedBy->AdvancedSearch->load();
		$this->CreatedDateTime->AdvancedSearch->load();
		$this->ModifiedBy->AdvancedSearch->load();
		$this->ModifiedDateTime->AdvancedSearch->load();
		$this->grncreatedby->AdvancedSearch->load();
		$this->grncreatedDateTime->AdvancedSearch->load();
		$this->grnModifiedby->AdvancedSearch->load();
		$this->grnModifiedDateTime->AdvancedSearch->load();
		$this->Received->AdvancedSearch->load();
		$this->BillDate->AdvancedSearch->load();
		$this->CurStock->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_pharmacytransferlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_pharmacytransferlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_pharmacytransferlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_pharmacytransfer\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_pharmacytransfer',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_pharmacytransferlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
			global $pharmacy_billing_transfer;
			if (!isset($pharmacy_billing_transfer))
				$pharmacy_billing_transfer = new pharmacy_billing_transfer();
			$rsmaster = $pharmacy_billing_transfer->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$pharmacy_billing_transfer;
					$pharmacy_billing_transfer->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "pharmacy_billing_transfer") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->trid->setQueryStringValue(Get("fk_id"));
					$this->trid->setSessionValue($this->trid->QueryStringValue);
					if (!is_numeric($this->trid->QueryStringValue))
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
			if ($masterTblVar == "pharmacy_billing_transfer") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->trid->setFormValue(Post("fk_id"));
					$this->trid->setSessionValue($this->trid->FormValue);
					if (!is_numeric($this->trid->FormValue))
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
			if ($masterTblVar <> "pharmacy_billing_transfer") {
				if ($this->trid->CurrentValue == "")
					$this->trid->setSessionValue("");
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
				case "x_LastMonthSale":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
						case "x_ORDNO":
							break;
						case "x_BRCODE":
							break;
						case "x_LastMonthSale":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							$row[3] = FormatNumber($row[3], 2, -2, -2, -2);
							$row['df3'] = $row[3];
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
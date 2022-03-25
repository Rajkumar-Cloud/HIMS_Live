<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_list extends pharmacy_storemast
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_list";

	// Grid form hidden field names
	public $FormName = "fpharmacy_storemastlist";
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

		// Table object (pharmacy_storemast)
		if (!isset($GLOBALS["pharmacy_storemast"]) || get_class($GLOBALS["pharmacy_storemast"]) == PROJECT_NAMESPACE . "pharmacy_storemast") {
			$GLOBALS["pharmacy_storemast"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_storemast"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "pharmacy_storemastadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "pharmacy_storemastdelete.php";
		$this->MultiUpdateUrl = "pharmacy_storemastupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_storemast');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_storemastlistsrch";

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
		global $EXPORT, $pharmacy_storemast;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_storemast);
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
			$this->CREATEDDT->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
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
		$this->PRC->setVisibility();
		$this->TYPE->setVisibility();
		$this->DES->setVisibility();
		$this->UM->setVisibility();
		$this->RT->setVisibility();
		$this->UR->Visible = FALSE;
		$this->TAXP->Visible = FALSE;
		$this->BATCHNO->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->RQ->Visible = FALSE;
		$this->MRQ->Visible = FALSE;
		$this->IQ->Visible = FALSE;
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->SALQTY->Visible = FALSE;
		$this->LASTPURDT->Visible = FALSE;
		$this->LASTSUPP->Visible = FALSE;
		$this->GENNAME->setVisibility();
		$this->LASTISSDT->Visible = FALSE;
		$this->CREATEDDT->setVisibility();
		$this->OPPRC->Visible = FALSE;
		$this->RESTRICT->Visible = FALSE;
		$this->BAWAPRC->Visible = FALSE;
		$this->STAXPER->Visible = FALSE;
		$this->TAXTYPE->Visible = FALSE;
		$this->OLDTAXP->Visible = FALSE;
		$this->TAXUPD->Visible = FALSE;
		$this->PACKAGE->Visible = FALSE;
		$this->NEWRT->Visible = FALSE;
		$this->NEWMRP->Visible = FALSE;
		$this->NEWUR->Visible = FALSE;
		$this->STATUS->Visible = FALSE;
		$this->RETNQTY->Visible = FALSE;
		$this->KEMODISC->Visible = FALSE;
		$this->PATSALE->Visible = FALSE;
		$this->ORGAN->Visible = FALSE;
		$this->OLDRQ->Visible = FALSE;
		$this->DRID->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->COMBCODE->setVisibility();
		$this->GENCODE->setVisibility();
		$this->STRENGTH->setVisibility();
		$this->UNIT->setVisibility();
		$this->FORMULARY->setVisibility();
		$this->STOCK->Visible = FALSE;
		$this->RACKNO->Visible = FALSE;
		$this->SUPPNAME->Visible = FALSE;
		$this->COMBNAME->setVisibility();
		$this->GENERICNAME->setVisibility();
		$this->REMARK->setVisibility();
		$this->TEMP->setVisibility();
		$this->PACKING->Visible = FALSE;
		$this->PhysQty->Visible = FALSE;
		$this->LedQty->Visible = FALSE;
		$this->id->setVisibility();
		$this->PurValue->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SaleValue->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->SaleRate->setVisibility();
		$this->HospID->setVisibility();
		$this->BRNAME->setVisibility();
		$this->OV->Visible = FALSE;
		$this->LATESTOV->Visible = FALSE;
		$this->ITEMTYPE->Visible = FALSE;
		$this->ROWID->Visible = FALSE;
		$this->MOVED->Visible = FALSE;
		$this->NEWTAX->Visible = FALSE;
		$this->HSNCODE->Visible = FALSE;
		$this->OLDTAX->Visible = FALSE;
		$this->Scheduling->setVisibility();
		$this->Schedulingh1->setVisibility();
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
		$this->setupLookupOptions($this->LASTSUPP);
		$this->setupLookupOptions($this->GENNAME);
		$this->setupLookupOptions($this->DRID);
		$this->setupLookupOptions($this->MFRCODE);
		$this->setupLookupOptions($this->COMBCODE);
		$this->setupLookupOptions($this->GENCODE);
		$this->setupLookupOptions($this->SUPPNAME);
		$this->setupLookupOptions($this->COMBNAME);
		$this->setupLookupOptions($this->GENERICNAME);

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
		$this->RT->FormValue = ""; // Clear form value
		$this->MRP->FormValue = ""; // Clear form value
		$this->STRENGTH->FormValue = ""; // Clear form value
		$this->PurValue->FormValue = ""; // Clear form value
		$this->PSGST->FormValue = ""; // Clear form value
		$this->PCGST->FormValue = ""; // Clear form value
		$this->SaleValue->FormValue = ""; // Clear form value
		$this->SSGST->FormValue = ""; // Clear form value
		$this->SCGST->FormValue = ""; // Clear form value
		$this->SaleRate->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue <> $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TYPE") && $CurrentForm->hasValue("o_TYPE") && $this->TYPE->CurrentValue <> $this->TYPE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DES") && $CurrentForm->hasValue("o_DES") && $this->DES->CurrentValue <> $this->DES->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UM") && $CurrentForm->hasValue("o_UM") && $this->UM->CurrentValue <> $this->UM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue <> $this->RT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue <> $this->BATCHNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MRP") && $CurrentForm->hasValue("o_MRP") && $this->MRP->CurrentValue <> $this->MRP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue <> $this->EXPDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GENNAME") && $CurrentForm->hasValue("o_GENNAME") && $this->GENNAME->CurrentValue <> $this->GENNAME->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DRID") && $CurrentForm->hasValue("o_DRID") && $this->DRID->CurrentValue <> $this->DRID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MFRCODE") && $CurrentForm->hasValue("o_MFRCODE") && $this->MFRCODE->CurrentValue <> $this->MFRCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_COMBCODE") && $CurrentForm->hasValue("o_COMBCODE") && $this->COMBCODE->CurrentValue <> $this->COMBCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GENCODE") && $CurrentForm->hasValue("o_GENCODE") && $this->GENCODE->CurrentValue <> $this->GENCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_STRENGTH") && $CurrentForm->hasValue("o_STRENGTH") && $this->STRENGTH->CurrentValue <> $this->STRENGTH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UNIT") && $CurrentForm->hasValue("o_UNIT") && $this->UNIT->CurrentValue <> $this->UNIT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FORMULARY") && $CurrentForm->hasValue("o_FORMULARY") && $this->FORMULARY->CurrentValue <> $this->FORMULARY->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_COMBNAME") && $CurrentForm->hasValue("o_COMBNAME") && $this->COMBNAME->CurrentValue <> $this->COMBNAME->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GENERICNAME") && $CurrentForm->hasValue("o_GENERICNAME") && $this->GENERICNAME->CurrentValue <> $this->GENERICNAME->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_REMARK") && $CurrentForm->hasValue("o_REMARK") && $this->REMARK->CurrentValue <> $this->REMARK->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TEMP") && $CurrentForm->hasValue("o_TEMP") && $this->TEMP->CurrentValue <> $this->TEMP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PurValue") && $CurrentForm->hasValue("o_PurValue") && $this->PurValue->CurrentValue <> $this->PurValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PSGST") && $CurrentForm->hasValue("o_PSGST") && $this->PSGST->CurrentValue <> $this->PSGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PCGST") && $CurrentForm->hasValue("o_PCGST") && $this->PCGST->CurrentValue <> $this->PCGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SaleValue") && $CurrentForm->hasValue("o_SaleValue") && $this->SaleValue->CurrentValue <> $this->SaleValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SSGST") && $CurrentForm->hasValue("o_SSGST") && $this->SSGST->CurrentValue <> $this->SSGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SCGST") && $CurrentForm->hasValue("o_SCGST") && $this->SCGST->CurrentValue <> $this->SCGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SaleRate") && $CurrentForm->hasValue("o_SaleRate") && $this->SaleRate->CurrentValue <> $this->SaleRate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Scheduling") && $CurrentForm->hasValue("o_Scheduling") && $this->Scheduling->CurrentValue <> $this->Scheduling->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Schedulingh1") && $CurrentForm->hasValue("o_Schedulingh1") && $this->Schedulingh1->CurrentValue <> $this->Schedulingh1->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_storemastlistsrch");
		$filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
		$filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
		$filterList = Concat($filterList, $this->TYPE->AdvancedSearch->toJson(), ","); // Field TYPE
		$filterList = Concat($filterList, $this->DES->AdvancedSearch->toJson(), ","); // Field DES
		$filterList = Concat($filterList, $this->UM->AdvancedSearch->toJson(), ","); // Field UM
		$filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
		$filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
		$filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
		$filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
		$filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
		$filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
		$filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
		$filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
		$filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
		$filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
		$filterList = Concat($filterList, $this->SALQTY->AdvancedSearch->toJson(), ","); // Field SALQTY
		$filterList = Concat($filterList, $this->LASTPURDT->AdvancedSearch->toJson(), ","); // Field LASTPURDT
		$filterList = Concat($filterList, $this->LASTSUPP->AdvancedSearch->toJson(), ","); // Field LASTSUPP
		$filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
		$filterList = Concat($filterList, $this->LASTISSDT->AdvancedSearch->toJson(), ","); // Field LASTISSDT
		$filterList = Concat($filterList, $this->CREATEDDT->AdvancedSearch->toJson(), ","); // Field CREATEDDT
		$filterList = Concat($filterList, $this->OPPRC->AdvancedSearch->toJson(), ","); // Field OPPRC
		$filterList = Concat($filterList, $this->RESTRICT->AdvancedSearch->toJson(), ","); // Field RESTRICT
		$filterList = Concat($filterList, $this->BAWAPRC->AdvancedSearch->toJson(), ","); // Field BAWAPRC
		$filterList = Concat($filterList, $this->STAXPER->AdvancedSearch->toJson(), ","); // Field STAXPER
		$filterList = Concat($filterList, $this->TAXTYPE->AdvancedSearch->toJson(), ","); // Field TAXTYPE
		$filterList = Concat($filterList, $this->OLDTAXP->AdvancedSearch->toJson(), ","); // Field OLDTAXP
		$filterList = Concat($filterList, $this->TAXUPD->AdvancedSearch->toJson(), ","); // Field TAXUPD
		$filterList = Concat($filterList, $this->PACKAGE->AdvancedSearch->toJson(), ","); // Field PACKAGE
		$filterList = Concat($filterList, $this->NEWRT->AdvancedSearch->toJson(), ","); // Field NEWRT
		$filterList = Concat($filterList, $this->NEWMRP->AdvancedSearch->toJson(), ","); // Field NEWMRP
		$filterList = Concat($filterList, $this->NEWUR->AdvancedSearch->toJson(), ","); // Field NEWUR
		$filterList = Concat($filterList, $this->STATUS->AdvancedSearch->toJson(), ","); // Field STATUS
		$filterList = Concat($filterList, $this->RETNQTY->AdvancedSearch->toJson(), ","); // Field RETNQTY
		$filterList = Concat($filterList, $this->KEMODISC->AdvancedSearch->toJson(), ","); // Field KEMODISC
		$filterList = Concat($filterList, $this->PATSALE->AdvancedSearch->toJson(), ","); // Field PATSALE
		$filterList = Concat($filterList, $this->ORGAN->AdvancedSearch->toJson(), ","); // Field ORGAN
		$filterList = Concat($filterList, $this->OLDRQ->AdvancedSearch->toJson(), ","); // Field OLDRQ
		$filterList = Concat($filterList, $this->DRID->AdvancedSearch->toJson(), ","); // Field DRID
		$filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
		$filterList = Concat($filterList, $this->COMBCODE->AdvancedSearch->toJson(), ","); // Field COMBCODE
		$filterList = Concat($filterList, $this->GENCODE->AdvancedSearch->toJson(), ","); // Field GENCODE
		$filterList = Concat($filterList, $this->STRENGTH->AdvancedSearch->toJson(), ","); // Field STRENGTH
		$filterList = Concat($filterList, $this->UNIT->AdvancedSearch->toJson(), ","); // Field UNIT
		$filterList = Concat($filterList, $this->FORMULARY->AdvancedSearch->toJson(), ","); // Field FORMULARY
		$filterList = Concat($filterList, $this->STOCK->AdvancedSearch->toJson(), ","); // Field STOCK
		$filterList = Concat($filterList, $this->RACKNO->AdvancedSearch->toJson(), ","); // Field RACKNO
		$filterList = Concat($filterList, $this->SUPPNAME->AdvancedSearch->toJson(), ","); // Field SUPPNAME
		$filterList = Concat($filterList, $this->COMBNAME->AdvancedSearch->toJson(), ","); // Field COMBNAME
		$filterList = Concat($filterList, $this->GENERICNAME->AdvancedSearch->toJson(), ","); // Field GENERICNAME
		$filterList = Concat($filterList, $this->REMARK->AdvancedSearch->toJson(), ","); // Field REMARK
		$filterList = Concat($filterList, $this->TEMP->AdvancedSearch->toJson(), ","); // Field TEMP
		$filterList = Concat($filterList, $this->PACKING->AdvancedSearch->toJson(), ","); // Field PACKING
		$filterList = Concat($filterList, $this->PhysQty->AdvancedSearch->toJson(), ","); // Field PhysQty
		$filterList = Concat($filterList, $this->LedQty->AdvancedSearch->toJson(), ","); // Field LedQty
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PurValue->AdvancedSearch->toJson(), ","); // Field PurValue
		$filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
		$filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
		$filterList = Concat($filterList, $this->SaleValue->AdvancedSearch->toJson(), ","); // Field SaleValue
		$filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
		$filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
		$filterList = Concat($filterList, $this->SaleRate->AdvancedSearch->toJson(), ","); // Field SaleRate
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->BRNAME->AdvancedSearch->toJson(), ","); // Field BRNAME
		$filterList = Concat($filterList, $this->Scheduling->AdvancedSearch->toJson(), ","); // Field Scheduling
		$filterList = Concat($filterList, $this->Schedulingh1->AdvancedSearch->toJson(), ","); // Field Schedulingh1
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_storemastlistsrch", $filters);
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

		// Field PRC
		$this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
		$this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
		$this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
		$this->PRC->AdvancedSearch->save();

		// Field TYPE
		$this->TYPE->AdvancedSearch->SearchValue = @$filter["x_TYPE"];
		$this->TYPE->AdvancedSearch->SearchOperator = @$filter["z_TYPE"];
		$this->TYPE->AdvancedSearch->SearchCondition = @$filter["v_TYPE"];
		$this->TYPE->AdvancedSearch->SearchValue2 = @$filter["y_TYPE"];
		$this->TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TYPE"];
		$this->TYPE->AdvancedSearch->save();

		// Field DES
		$this->DES->AdvancedSearch->SearchValue = @$filter["x_DES"];
		$this->DES->AdvancedSearch->SearchOperator = @$filter["z_DES"];
		$this->DES->AdvancedSearch->SearchCondition = @$filter["v_DES"];
		$this->DES->AdvancedSearch->SearchValue2 = @$filter["y_DES"];
		$this->DES->AdvancedSearch->SearchOperator2 = @$filter["w_DES"];
		$this->DES->AdvancedSearch->save();

		// Field UM
		$this->UM->AdvancedSearch->SearchValue = @$filter["x_UM"];
		$this->UM->AdvancedSearch->SearchOperator = @$filter["z_UM"];
		$this->UM->AdvancedSearch->SearchCondition = @$filter["v_UM"];
		$this->UM->AdvancedSearch->SearchValue2 = @$filter["y_UM"];
		$this->UM->AdvancedSearch->SearchOperator2 = @$filter["w_UM"];
		$this->UM->AdvancedSearch->save();

		// Field RT
		$this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
		$this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
		$this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
		$this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
		$this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
		$this->RT->AdvancedSearch->save();

		// Field UR
		$this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
		$this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
		$this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
		$this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
		$this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
		$this->UR->AdvancedSearch->save();

		// Field TAXP
		$this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
		$this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
		$this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
		$this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
		$this->TAXP->AdvancedSearch->save();

		// Field BATCHNO
		$this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
		$this->BATCHNO->AdvancedSearch->save();

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

		// Field SALQTY
		$this->SALQTY->AdvancedSearch->SearchValue = @$filter["x_SALQTY"];
		$this->SALQTY->AdvancedSearch->SearchOperator = @$filter["z_SALQTY"];
		$this->SALQTY->AdvancedSearch->SearchCondition = @$filter["v_SALQTY"];
		$this->SALQTY->AdvancedSearch->SearchValue2 = @$filter["y_SALQTY"];
		$this->SALQTY->AdvancedSearch->SearchOperator2 = @$filter["w_SALQTY"];
		$this->SALQTY->AdvancedSearch->save();

		// Field LASTPURDT
		$this->LASTPURDT->AdvancedSearch->SearchValue = @$filter["x_LASTPURDT"];
		$this->LASTPURDT->AdvancedSearch->SearchOperator = @$filter["z_LASTPURDT"];
		$this->LASTPURDT->AdvancedSearch->SearchCondition = @$filter["v_LASTPURDT"];
		$this->LASTPURDT->AdvancedSearch->SearchValue2 = @$filter["y_LASTPURDT"];
		$this->LASTPURDT->AdvancedSearch->SearchOperator2 = @$filter["w_LASTPURDT"];
		$this->LASTPURDT->AdvancedSearch->save();

		// Field LASTSUPP
		$this->LASTSUPP->AdvancedSearch->SearchValue = @$filter["x_LASTSUPP"];
		$this->LASTSUPP->AdvancedSearch->SearchOperator = @$filter["z_LASTSUPP"];
		$this->LASTSUPP->AdvancedSearch->SearchCondition = @$filter["v_LASTSUPP"];
		$this->LASTSUPP->AdvancedSearch->SearchValue2 = @$filter["y_LASTSUPP"];
		$this->LASTSUPP->AdvancedSearch->SearchOperator2 = @$filter["w_LASTSUPP"];
		$this->LASTSUPP->AdvancedSearch->save();

		// Field GENNAME
		$this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
		$this->GENNAME->AdvancedSearch->save();

		// Field LASTISSDT
		$this->LASTISSDT->AdvancedSearch->SearchValue = @$filter["x_LASTISSDT"];
		$this->LASTISSDT->AdvancedSearch->SearchOperator = @$filter["z_LASTISSDT"];
		$this->LASTISSDT->AdvancedSearch->SearchCondition = @$filter["v_LASTISSDT"];
		$this->LASTISSDT->AdvancedSearch->SearchValue2 = @$filter["y_LASTISSDT"];
		$this->LASTISSDT->AdvancedSearch->SearchOperator2 = @$filter["w_LASTISSDT"];
		$this->LASTISSDT->AdvancedSearch->save();

		// Field CREATEDDT
		$this->CREATEDDT->AdvancedSearch->SearchValue = @$filter["x_CREATEDDT"];
		$this->CREATEDDT->AdvancedSearch->SearchOperator = @$filter["z_CREATEDDT"];
		$this->CREATEDDT->AdvancedSearch->SearchCondition = @$filter["v_CREATEDDT"];
		$this->CREATEDDT->AdvancedSearch->SearchValue2 = @$filter["y_CREATEDDT"];
		$this->CREATEDDT->AdvancedSearch->SearchOperator2 = @$filter["w_CREATEDDT"];
		$this->CREATEDDT->AdvancedSearch->save();

		// Field OPPRC
		$this->OPPRC->AdvancedSearch->SearchValue = @$filter["x_OPPRC"];
		$this->OPPRC->AdvancedSearch->SearchOperator = @$filter["z_OPPRC"];
		$this->OPPRC->AdvancedSearch->SearchCondition = @$filter["v_OPPRC"];
		$this->OPPRC->AdvancedSearch->SearchValue2 = @$filter["y_OPPRC"];
		$this->OPPRC->AdvancedSearch->SearchOperator2 = @$filter["w_OPPRC"];
		$this->OPPRC->AdvancedSearch->save();

		// Field RESTRICT
		$this->RESTRICT->AdvancedSearch->SearchValue = @$filter["x_RESTRICT"];
		$this->RESTRICT->AdvancedSearch->SearchOperator = @$filter["z_RESTRICT"];
		$this->RESTRICT->AdvancedSearch->SearchCondition = @$filter["v_RESTRICT"];
		$this->RESTRICT->AdvancedSearch->SearchValue2 = @$filter["y_RESTRICT"];
		$this->RESTRICT->AdvancedSearch->SearchOperator2 = @$filter["w_RESTRICT"];
		$this->RESTRICT->AdvancedSearch->save();

		// Field BAWAPRC
		$this->BAWAPRC->AdvancedSearch->SearchValue = @$filter["x_BAWAPRC"];
		$this->BAWAPRC->AdvancedSearch->SearchOperator = @$filter["z_BAWAPRC"];
		$this->BAWAPRC->AdvancedSearch->SearchCondition = @$filter["v_BAWAPRC"];
		$this->BAWAPRC->AdvancedSearch->SearchValue2 = @$filter["y_BAWAPRC"];
		$this->BAWAPRC->AdvancedSearch->SearchOperator2 = @$filter["w_BAWAPRC"];
		$this->BAWAPRC->AdvancedSearch->save();

		// Field STAXPER
		$this->STAXPER->AdvancedSearch->SearchValue = @$filter["x_STAXPER"];
		$this->STAXPER->AdvancedSearch->SearchOperator = @$filter["z_STAXPER"];
		$this->STAXPER->AdvancedSearch->SearchCondition = @$filter["v_STAXPER"];
		$this->STAXPER->AdvancedSearch->SearchValue2 = @$filter["y_STAXPER"];
		$this->STAXPER->AdvancedSearch->SearchOperator2 = @$filter["w_STAXPER"];
		$this->STAXPER->AdvancedSearch->save();

		// Field TAXTYPE
		$this->TAXTYPE->AdvancedSearch->SearchValue = @$filter["x_TAXTYPE"];
		$this->TAXTYPE->AdvancedSearch->SearchOperator = @$filter["z_TAXTYPE"];
		$this->TAXTYPE->AdvancedSearch->SearchCondition = @$filter["v_TAXTYPE"];
		$this->TAXTYPE->AdvancedSearch->SearchValue2 = @$filter["y_TAXTYPE"];
		$this->TAXTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TAXTYPE"];
		$this->TAXTYPE->AdvancedSearch->save();

		// Field OLDTAXP
		$this->OLDTAXP->AdvancedSearch->SearchValue = @$filter["x_OLDTAXP"];
		$this->OLDTAXP->AdvancedSearch->SearchOperator = @$filter["z_OLDTAXP"];
		$this->OLDTAXP->AdvancedSearch->SearchCondition = @$filter["v_OLDTAXP"];
		$this->OLDTAXP->AdvancedSearch->SearchValue2 = @$filter["y_OLDTAXP"];
		$this->OLDTAXP->AdvancedSearch->SearchOperator2 = @$filter["w_OLDTAXP"];
		$this->OLDTAXP->AdvancedSearch->save();

		// Field TAXUPD
		$this->TAXUPD->AdvancedSearch->SearchValue = @$filter["x_TAXUPD"];
		$this->TAXUPD->AdvancedSearch->SearchOperator = @$filter["z_TAXUPD"];
		$this->TAXUPD->AdvancedSearch->SearchCondition = @$filter["v_TAXUPD"];
		$this->TAXUPD->AdvancedSearch->SearchValue2 = @$filter["y_TAXUPD"];
		$this->TAXUPD->AdvancedSearch->SearchOperator2 = @$filter["w_TAXUPD"];
		$this->TAXUPD->AdvancedSearch->save();

		// Field PACKAGE
		$this->PACKAGE->AdvancedSearch->SearchValue = @$filter["x_PACKAGE"];
		$this->PACKAGE->AdvancedSearch->SearchOperator = @$filter["z_PACKAGE"];
		$this->PACKAGE->AdvancedSearch->SearchCondition = @$filter["v_PACKAGE"];
		$this->PACKAGE->AdvancedSearch->SearchValue2 = @$filter["y_PACKAGE"];
		$this->PACKAGE->AdvancedSearch->SearchOperator2 = @$filter["w_PACKAGE"];
		$this->PACKAGE->AdvancedSearch->save();

		// Field NEWRT
		$this->NEWRT->AdvancedSearch->SearchValue = @$filter["x_NEWRT"];
		$this->NEWRT->AdvancedSearch->SearchOperator = @$filter["z_NEWRT"];
		$this->NEWRT->AdvancedSearch->SearchCondition = @$filter["v_NEWRT"];
		$this->NEWRT->AdvancedSearch->SearchValue2 = @$filter["y_NEWRT"];
		$this->NEWRT->AdvancedSearch->SearchOperator2 = @$filter["w_NEWRT"];
		$this->NEWRT->AdvancedSearch->save();

		// Field NEWMRP
		$this->NEWMRP->AdvancedSearch->SearchValue = @$filter["x_NEWMRP"];
		$this->NEWMRP->AdvancedSearch->SearchOperator = @$filter["z_NEWMRP"];
		$this->NEWMRP->AdvancedSearch->SearchCondition = @$filter["v_NEWMRP"];
		$this->NEWMRP->AdvancedSearch->SearchValue2 = @$filter["y_NEWMRP"];
		$this->NEWMRP->AdvancedSearch->SearchOperator2 = @$filter["w_NEWMRP"];
		$this->NEWMRP->AdvancedSearch->save();

		// Field NEWUR
		$this->NEWUR->AdvancedSearch->SearchValue = @$filter["x_NEWUR"];
		$this->NEWUR->AdvancedSearch->SearchOperator = @$filter["z_NEWUR"];
		$this->NEWUR->AdvancedSearch->SearchCondition = @$filter["v_NEWUR"];
		$this->NEWUR->AdvancedSearch->SearchValue2 = @$filter["y_NEWUR"];
		$this->NEWUR->AdvancedSearch->SearchOperator2 = @$filter["w_NEWUR"];
		$this->NEWUR->AdvancedSearch->save();

		// Field STATUS
		$this->STATUS->AdvancedSearch->SearchValue = @$filter["x_STATUS"];
		$this->STATUS->AdvancedSearch->SearchOperator = @$filter["z_STATUS"];
		$this->STATUS->AdvancedSearch->SearchCondition = @$filter["v_STATUS"];
		$this->STATUS->AdvancedSearch->SearchValue2 = @$filter["y_STATUS"];
		$this->STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_STATUS"];
		$this->STATUS->AdvancedSearch->save();

		// Field RETNQTY
		$this->RETNQTY->AdvancedSearch->SearchValue = @$filter["x_RETNQTY"];
		$this->RETNQTY->AdvancedSearch->SearchOperator = @$filter["z_RETNQTY"];
		$this->RETNQTY->AdvancedSearch->SearchCondition = @$filter["v_RETNQTY"];
		$this->RETNQTY->AdvancedSearch->SearchValue2 = @$filter["y_RETNQTY"];
		$this->RETNQTY->AdvancedSearch->SearchOperator2 = @$filter["w_RETNQTY"];
		$this->RETNQTY->AdvancedSearch->save();

		// Field KEMODISC
		$this->KEMODISC->AdvancedSearch->SearchValue = @$filter["x_KEMODISC"];
		$this->KEMODISC->AdvancedSearch->SearchOperator = @$filter["z_KEMODISC"];
		$this->KEMODISC->AdvancedSearch->SearchCondition = @$filter["v_KEMODISC"];
		$this->KEMODISC->AdvancedSearch->SearchValue2 = @$filter["y_KEMODISC"];
		$this->KEMODISC->AdvancedSearch->SearchOperator2 = @$filter["w_KEMODISC"];
		$this->KEMODISC->AdvancedSearch->save();

		// Field PATSALE
		$this->PATSALE->AdvancedSearch->SearchValue = @$filter["x_PATSALE"];
		$this->PATSALE->AdvancedSearch->SearchOperator = @$filter["z_PATSALE"];
		$this->PATSALE->AdvancedSearch->SearchCondition = @$filter["v_PATSALE"];
		$this->PATSALE->AdvancedSearch->SearchValue2 = @$filter["y_PATSALE"];
		$this->PATSALE->AdvancedSearch->SearchOperator2 = @$filter["w_PATSALE"];
		$this->PATSALE->AdvancedSearch->save();

		// Field ORGAN
		$this->ORGAN->AdvancedSearch->SearchValue = @$filter["x_ORGAN"];
		$this->ORGAN->AdvancedSearch->SearchOperator = @$filter["z_ORGAN"];
		$this->ORGAN->AdvancedSearch->SearchCondition = @$filter["v_ORGAN"];
		$this->ORGAN->AdvancedSearch->SearchValue2 = @$filter["y_ORGAN"];
		$this->ORGAN->AdvancedSearch->SearchOperator2 = @$filter["w_ORGAN"];
		$this->ORGAN->AdvancedSearch->save();

		// Field OLDRQ
		$this->OLDRQ->AdvancedSearch->SearchValue = @$filter["x_OLDRQ"];
		$this->OLDRQ->AdvancedSearch->SearchOperator = @$filter["z_OLDRQ"];
		$this->OLDRQ->AdvancedSearch->SearchCondition = @$filter["v_OLDRQ"];
		$this->OLDRQ->AdvancedSearch->SearchValue2 = @$filter["y_OLDRQ"];
		$this->OLDRQ->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRQ"];
		$this->OLDRQ->AdvancedSearch->save();

		// Field DRID
		$this->DRID->AdvancedSearch->SearchValue = @$filter["x_DRID"];
		$this->DRID->AdvancedSearch->SearchOperator = @$filter["z_DRID"];
		$this->DRID->AdvancedSearch->SearchCondition = @$filter["v_DRID"];
		$this->DRID->AdvancedSearch->SearchValue2 = @$filter["y_DRID"];
		$this->DRID->AdvancedSearch->SearchOperator2 = @$filter["w_DRID"];
		$this->DRID->AdvancedSearch->save();

		// Field MFRCODE
		$this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->save();

		// Field COMBCODE
		$this->COMBCODE->AdvancedSearch->SearchValue = @$filter["x_COMBCODE"];
		$this->COMBCODE->AdvancedSearch->SearchOperator = @$filter["z_COMBCODE"];
		$this->COMBCODE->AdvancedSearch->SearchCondition = @$filter["v_COMBCODE"];
		$this->COMBCODE->AdvancedSearch->SearchValue2 = @$filter["y_COMBCODE"];
		$this->COMBCODE->AdvancedSearch->SearchOperator2 = @$filter["w_COMBCODE"];
		$this->COMBCODE->AdvancedSearch->save();

		// Field GENCODE
		$this->GENCODE->AdvancedSearch->SearchValue = @$filter["x_GENCODE"];
		$this->GENCODE->AdvancedSearch->SearchOperator = @$filter["z_GENCODE"];
		$this->GENCODE->AdvancedSearch->SearchCondition = @$filter["v_GENCODE"];
		$this->GENCODE->AdvancedSearch->SearchValue2 = @$filter["y_GENCODE"];
		$this->GENCODE->AdvancedSearch->SearchOperator2 = @$filter["w_GENCODE"];
		$this->GENCODE->AdvancedSearch->save();

		// Field STRENGTH
		$this->STRENGTH->AdvancedSearch->SearchValue = @$filter["x_STRENGTH"];
		$this->STRENGTH->AdvancedSearch->SearchOperator = @$filter["z_STRENGTH"];
		$this->STRENGTH->AdvancedSearch->SearchCondition = @$filter["v_STRENGTH"];
		$this->STRENGTH->AdvancedSearch->SearchValue2 = @$filter["y_STRENGTH"];
		$this->STRENGTH->AdvancedSearch->SearchOperator2 = @$filter["w_STRENGTH"];
		$this->STRENGTH->AdvancedSearch->save();

		// Field UNIT
		$this->UNIT->AdvancedSearch->SearchValue = @$filter["x_UNIT"];
		$this->UNIT->AdvancedSearch->SearchOperator = @$filter["z_UNIT"];
		$this->UNIT->AdvancedSearch->SearchCondition = @$filter["v_UNIT"];
		$this->UNIT->AdvancedSearch->SearchValue2 = @$filter["y_UNIT"];
		$this->UNIT->AdvancedSearch->SearchOperator2 = @$filter["w_UNIT"];
		$this->UNIT->AdvancedSearch->save();

		// Field FORMULARY
		$this->FORMULARY->AdvancedSearch->SearchValue = @$filter["x_FORMULARY"];
		$this->FORMULARY->AdvancedSearch->SearchOperator = @$filter["z_FORMULARY"];
		$this->FORMULARY->AdvancedSearch->SearchCondition = @$filter["v_FORMULARY"];
		$this->FORMULARY->AdvancedSearch->SearchValue2 = @$filter["y_FORMULARY"];
		$this->FORMULARY->AdvancedSearch->SearchOperator2 = @$filter["w_FORMULARY"];
		$this->FORMULARY->AdvancedSearch->save();

		// Field STOCK
		$this->STOCK->AdvancedSearch->SearchValue = @$filter["x_STOCK"];
		$this->STOCK->AdvancedSearch->SearchOperator = @$filter["z_STOCK"];
		$this->STOCK->AdvancedSearch->SearchCondition = @$filter["v_STOCK"];
		$this->STOCK->AdvancedSearch->SearchValue2 = @$filter["y_STOCK"];
		$this->STOCK->AdvancedSearch->SearchOperator2 = @$filter["w_STOCK"];
		$this->STOCK->AdvancedSearch->save();

		// Field RACKNO
		$this->RACKNO->AdvancedSearch->SearchValue = @$filter["x_RACKNO"];
		$this->RACKNO->AdvancedSearch->SearchOperator = @$filter["z_RACKNO"];
		$this->RACKNO->AdvancedSearch->SearchCondition = @$filter["v_RACKNO"];
		$this->RACKNO->AdvancedSearch->SearchValue2 = @$filter["y_RACKNO"];
		$this->RACKNO->AdvancedSearch->SearchOperator2 = @$filter["w_RACKNO"];
		$this->RACKNO->AdvancedSearch->save();

		// Field SUPPNAME
		$this->SUPPNAME->AdvancedSearch->SearchValue = @$filter["x_SUPPNAME"];
		$this->SUPPNAME->AdvancedSearch->SearchOperator = @$filter["z_SUPPNAME"];
		$this->SUPPNAME->AdvancedSearch->SearchCondition = @$filter["v_SUPPNAME"];
		$this->SUPPNAME->AdvancedSearch->SearchValue2 = @$filter["y_SUPPNAME"];
		$this->SUPPNAME->AdvancedSearch->SearchOperator2 = @$filter["w_SUPPNAME"];
		$this->SUPPNAME->AdvancedSearch->save();

		// Field COMBNAME
		$this->COMBNAME->AdvancedSearch->SearchValue = @$filter["x_COMBNAME"];
		$this->COMBNAME->AdvancedSearch->SearchOperator = @$filter["z_COMBNAME"];
		$this->COMBNAME->AdvancedSearch->SearchCondition = @$filter["v_COMBNAME"];
		$this->COMBNAME->AdvancedSearch->SearchValue2 = @$filter["y_COMBNAME"];
		$this->COMBNAME->AdvancedSearch->SearchOperator2 = @$filter["w_COMBNAME"];
		$this->COMBNAME->AdvancedSearch->save();

		// Field GENERICNAME
		$this->GENERICNAME->AdvancedSearch->SearchValue = @$filter["x_GENERICNAME"];
		$this->GENERICNAME->AdvancedSearch->SearchOperator = @$filter["z_GENERICNAME"];
		$this->GENERICNAME->AdvancedSearch->SearchCondition = @$filter["v_GENERICNAME"];
		$this->GENERICNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENERICNAME"];
		$this->GENERICNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENERICNAME"];
		$this->GENERICNAME->AdvancedSearch->save();

		// Field REMARK
		$this->REMARK->AdvancedSearch->SearchValue = @$filter["x_REMARK"];
		$this->REMARK->AdvancedSearch->SearchOperator = @$filter["z_REMARK"];
		$this->REMARK->AdvancedSearch->SearchCondition = @$filter["v_REMARK"];
		$this->REMARK->AdvancedSearch->SearchValue2 = @$filter["y_REMARK"];
		$this->REMARK->AdvancedSearch->SearchOperator2 = @$filter["w_REMARK"];
		$this->REMARK->AdvancedSearch->save();

		// Field TEMP
		$this->TEMP->AdvancedSearch->SearchValue = @$filter["x_TEMP"];
		$this->TEMP->AdvancedSearch->SearchOperator = @$filter["z_TEMP"];
		$this->TEMP->AdvancedSearch->SearchCondition = @$filter["v_TEMP"];
		$this->TEMP->AdvancedSearch->SearchValue2 = @$filter["y_TEMP"];
		$this->TEMP->AdvancedSearch->SearchOperator2 = @$filter["w_TEMP"];
		$this->TEMP->AdvancedSearch->save();

		// Field PACKING
		$this->PACKING->AdvancedSearch->SearchValue = @$filter["x_PACKING"];
		$this->PACKING->AdvancedSearch->SearchOperator = @$filter["z_PACKING"];
		$this->PACKING->AdvancedSearch->SearchCondition = @$filter["v_PACKING"];
		$this->PACKING->AdvancedSearch->SearchValue2 = @$filter["y_PACKING"];
		$this->PACKING->AdvancedSearch->SearchOperator2 = @$filter["w_PACKING"];
		$this->PACKING->AdvancedSearch->save();

		// Field PhysQty
		$this->PhysQty->AdvancedSearch->SearchValue = @$filter["x_PhysQty"];
		$this->PhysQty->AdvancedSearch->SearchOperator = @$filter["z_PhysQty"];
		$this->PhysQty->AdvancedSearch->SearchCondition = @$filter["v_PhysQty"];
		$this->PhysQty->AdvancedSearch->SearchValue2 = @$filter["y_PhysQty"];
		$this->PhysQty->AdvancedSearch->SearchOperator2 = @$filter["w_PhysQty"];
		$this->PhysQty->AdvancedSearch->save();

		// Field LedQty
		$this->LedQty->AdvancedSearch->SearchValue = @$filter["x_LedQty"];
		$this->LedQty->AdvancedSearch->SearchOperator = @$filter["z_LedQty"];
		$this->LedQty->AdvancedSearch->SearchCondition = @$filter["v_LedQty"];
		$this->LedQty->AdvancedSearch->SearchValue2 = @$filter["y_LedQty"];
		$this->LedQty->AdvancedSearch->SearchOperator2 = @$filter["w_LedQty"];
		$this->LedQty->AdvancedSearch->save();

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field PurValue
		$this->PurValue->AdvancedSearch->SearchValue = @$filter["x_PurValue"];
		$this->PurValue->AdvancedSearch->SearchOperator = @$filter["z_PurValue"];
		$this->PurValue->AdvancedSearch->SearchCondition = @$filter["v_PurValue"];
		$this->PurValue->AdvancedSearch->SearchValue2 = @$filter["y_PurValue"];
		$this->PurValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurValue"];
		$this->PurValue->AdvancedSearch->save();

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

		// Field SaleValue
		$this->SaleValue->AdvancedSearch->SearchValue = @$filter["x_SaleValue"];
		$this->SaleValue->AdvancedSearch->SearchOperator = @$filter["z_SaleValue"];
		$this->SaleValue->AdvancedSearch->SearchCondition = @$filter["v_SaleValue"];
		$this->SaleValue->AdvancedSearch->SearchValue2 = @$filter["y_SaleValue"];
		$this->SaleValue->AdvancedSearch->SearchOperator2 = @$filter["w_SaleValue"];
		$this->SaleValue->AdvancedSearch->save();

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

		// Field SaleRate
		$this->SaleRate->AdvancedSearch->SearchValue = @$filter["x_SaleRate"];
		$this->SaleRate->AdvancedSearch->SearchOperator = @$filter["z_SaleRate"];
		$this->SaleRate->AdvancedSearch->SearchCondition = @$filter["v_SaleRate"];
		$this->SaleRate->AdvancedSearch->SearchValue2 = @$filter["y_SaleRate"];
		$this->SaleRate->AdvancedSearch->SearchOperator2 = @$filter["w_SaleRate"];
		$this->SaleRate->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field BRNAME
		$this->BRNAME->AdvancedSearch->SearchValue = @$filter["x_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchOperator = @$filter["z_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchCondition = @$filter["v_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchValue2 = @$filter["y_BRNAME"];
		$this->BRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_BRNAME"];
		$this->BRNAME->AdvancedSearch->save();

		// Field Scheduling
		$this->Scheduling->AdvancedSearch->SearchValue = @$filter["x_Scheduling"];
		$this->Scheduling->AdvancedSearch->SearchOperator = @$filter["z_Scheduling"];
		$this->Scheduling->AdvancedSearch->SearchCondition = @$filter["v_Scheduling"];
		$this->Scheduling->AdvancedSearch->SearchValue2 = @$filter["y_Scheduling"];
		$this->Scheduling->AdvancedSearch->SearchOperator2 = @$filter["w_Scheduling"];
		$this->Scheduling->AdvancedSearch->save();

		// Field Schedulingh1
		$this->Schedulingh1->AdvancedSearch->SearchValue = @$filter["x_Schedulingh1"];
		$this->Schedulingh1->AdvancedSearch->SearchOperator = @$filter["z_Schedulingh1"];
		$this->Schedulingh1->AdvancedSearch->SearchCondition = @$filter["v_Schedulingh1"];
		$this->Schedulingh1->AdvancedSearch->SearchValue2 = @$filter["y_Schedulingh1"];
		$this->Schedulingh1->AdvancedSearch->SearchOperator2 = @$filter["w_Schedulingh1"];
		$this->Schedulingh1->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->BRCODE, $default, FALSE); // BRCODE
		$this->buildSearchSql($where, $this->PRC, $default, FALSE); // PRC
		$this->buildSearchSql($where, $this->TYPE, $default, FALSE); // TYPE
		$this->buildSearchSql($where, $this->DES, $default, FALSE); // DES
		$this->buildSearchSql($where, $this->UM, $default, FALSE); // UM
		$this->buildSearchSql($where, $this->RT, $default, FALSE); // RT
		$this->buildSearchSql($where, $this->UR, $default, FALSE); // UR
		$this->buildSearchSql($where, $this->TAXP, $default, FALSE); // TAXP
		$this->buildSearchSql($where, $this->BATCHNO, $default, FALSE); // BATCHNO
		$this->buildSearchSql($where, $this->OQ, $default, FALSE); // OQ
		$this->buildSearchSql($where, $this->RQ, $default, FALSE); // RQ
		$this->buildSearchSql($where, $this->MRQ, $default, FALSE); // MRQ
		$this->buildSearchSql($where, $this->IQ, $default, FALSE); // IQ
		$this->buildSearchSql($where, $this->MRP, $default, FALSE); // MRP
		$this->buildSearchSql($where, $this->EXPDT, $default, FALSE); // EXPDT
		$this->buildSearchSql($where, $this->SALQTY, $default, FALSE); // SALQTY
		$this->buildSearchSql($where, $this->LASTPURDT, $default, FALSE); // LASTPURDT
		$this->buildSearchSql($where, $this->LASTSUPP, $default, FALSE); // LASTSUPP
		$this->buildSearchSql($where, $this->GENNAME, $default, FALSE); // GENNAME
		$this->buildSearchSql($where, $this->LASTISSDT, $default, FALSE); // LASTISSDT
		$this->buildSearchSql($where, $this->CREATEDDT, $default, FALSE); // CREATEDDT
		$this->buildSearchSql($where, $this->OPPRC, $default, FALSE); // OPPRC
		$this->buildSearchSql($where, $this->RESTRICT, $default, FALSE); // RESTRICT
		$this->buildSearchSql($where, $this->BAWAPRC, $default, FALSE); // BAWAPRC
		$this->buildSearchSql($where, $this->STAXPER, $default, FALSE); // STAXPER
		$this->buildSearchSql($where, $this->TAXTYPE, $default, FALSE); // TAXTYPE
		$this->buildSearchSql($where, $this->OLDTAXP, $default, FALSE); // OLDTAXP
		$this->buildSearchSql($where, $this->TAXUPD, $default, FALSE); // TAXUPD
		$this->buildSearchSql($where, $this->PACKAGE, $default, FALSE); // PACKAGE
		$this->buildSearchSql($where, $this->NEWRT, $default, FALSE); // NEWRT
		$this->buildSearchSql($where, $this->NEWMRP, $default, FALSE); // NEWMRP
		$this->buildSearchSql($where, $this->NEWUR, $default, FALSE); // NEWUR
		$this->buildSearchSql($where, $this->STATUS, $default, FALSE); // STATUS
		$this->buildSearchSql($where, $this->RETNQTY, $default, FALSE); // RETNQTY
		$this->buildSearchSql($where, $this->KEMODISC, $default, FALSE); // KEMODISC
		$this->buildSearchSql($where, $this->PATSALE, $default, FALSE); // PATSALE
		$this->buildSearchSql($where, $this->ORGAN, $default, FALSE); // ORGAN
		$this->buildSearchSql($where, $this->OLDRQ, $default, FALSE); // OLDRQ
		$this->buildSearchSql($where, $this->DRID, $default, FALSE); // DRID
		$this->buildSearchSql($where, $this->MFRCODE, $default, FALSE); // MFRCODE
		$this->buildSearchSql($where, $this->COMBCODE, $default, FALSE); // COMBCODE
		$this->buildSearchSql($where, $this->GENCODE, $default, FALSE); // GENCODE
		$this->buildSearchSql($where, $this->STRENGTH, $default, FALSE); // STRENGTH
		$this->buildSearchSql($where, $this->UNIT, $default, FALSE); // UNIT
		$this->buildSearchSql($where, $this->FORMULARY, $default, FALSE); // FORMULARY
		$this->buildSearchSql($where, $this->STOCK, $default, FALSE); // STOCK
		$this->buildSearchSql($where, $this->RACKNO, $default, FALSE); // RACKNO
		$this->buildSearchSql($where, $this->SUPPNAME, $default, FALSE); // SUPPNAME
		$this->buildSearchSql($where, $this->COMBNAME, $default, FALSE); // COMBNAME
		$this->buildSearchSql($where, $this->GENERICNAME, $default, FALSE); // GENERICNAME
		$this->buildSearchSql($where, $this->REMARK, $default, FALSE); // REMARK
		$this->buildSearchSql($where, $this->TEMP, $default, FALSE); // TEMP
		$this->buildSearchSql($where, $this->PACKING, $default, FALSE); // PACKING
		$this->buildSearchSql($where, $this->PhysQty, $default, FALSE); // PhysQty
		$this->buildSearchSql($where, $this->LedQty, $default, FALSE); // LedQty
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->PurValue, $default, FALSE); // PurValue
		$this->buildSearchSql($where, $this->PSGST, $default, FALSE); // PSGST
		$this->buildSearchSql($where, $this->PCGST, $default, FALSE); // PCGST
		$this->buildSearchSql($where, $this->SaleValue, $default, FALSE); // SaleValue
		$this->buildSearchSql($where, $this->SSGST, $default, FALSE); // SSGST
		$this->buildSearchSql($where, $this->SCGST, $default, FALSE); // SCGST
		$this->buildSearchSql($where, $this->SaleRate, $default, FALSE); // SaleRate
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->BRNAME, $default, FALSE); // BRNAME
		$this->buildSearchSql($where, $this->Scheduling, $default, FALSE); // Scheduling
		$this->buildSearchSql($where, $this->Schedulingh1, $default, FALSE); // Schedulingh1

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BRCODE->AdvancedSearch->save(); // BRCODE
			$this->PRC->AdvancedSearch->save(); // PRC
			$this->TYPE->AdvancedSearch->save(); // TYPE
			$this->DES->AdvancedSearch->save(); // DES
			$this->UM->AdvancedSearch->save(); // UM
			$this->RT->AdvancedSearch->save(); // RT
			$this->UR->AdvancedSearch->save(); // UR
			$this->TAXP->AdvancedSearch->save(); // TAXP
			$this->BATCHNO->AdvancedSearch->save(); // BATCHNO
			$this->OQ->AdvancedSearch->save(); // OQ
			$this->RQ->AdvancedSearch->save(); // RQ
			$this->MRQ->AdvancedSearch->save(); // MRQ
			$this->IQ->AdvancedSearch->save(); // IQ
			$this->MRP->AdvancedSearch->save(); // MRP
			$this->EXPDT->AdvancedSearch->save(); // EXPDT
			$this->SALQTY->AdvancedSearch->save(); // SALQTY
			$this->LASTPURDT->AdvancedSearch->save(); // LASTPURDT
			$this->LASTSUPP->AdvancedSearch->save(); // LASTSUPP
			$this->GENNAME->AdvancedSearch->save(); // GENNAME
			$this->LASTISSDT->AdvancedSearch->save(); // LASTISSDT
			$this->CREATEDDT->AdvancedSearch->save(); // CREATEDDT
			$this->OPPRC->AdvancedSearch->save(); // OPPRC
			$this->RESTRICT->AdvancedSearch->save(); // RESTRICT
			$this->BAWAPRC->AdvancedSearch->save(); // BAWAPRC
			$this->STAXPER->AdvancedSearch->save(); // STAXPER
			$this->TAXTYPE->AdvancedSearch->save(); // TAXTYPE
			$this->OLDTAXP->AdvancedSearch->save(); // OLDTAXP
			$this->TAXUPD->AdvancedSearch->save(); // TAXUPD
			$this->PACKAGE->AdvancedSearch->save(); // PACKAGE
			$this->NEWRT->AdvancedSearch->save(); // NEWRT
			$this->NEWMRP->AdvancedSearch->save(); // NEWMRP
			$this->NEWUR->AdvancedSearch->save(); // NEWUR
			$this->STATUS->AdvancedSearch->save(); // STATUS
			$this->RETNQTY->AdvancedSearch->save(); // RETNQTY
			$this->KEMODISC->AdvancedSearch->save(); // KEMODISC
			$this->PATSALE->AdvancedSearch->save(); // PATSALE
			$this->ORGAN->AdvancedSearch->save(); // ORGAN
			$this->OLDRQ->AdvancedSearch->save(); // OLDRQ
			$this->DRID->AdvancedSearch->save(); // DRID
			$this->MFRCODE->AdvancedSearch->save(); // MFRCODE
			$this->COMBCODE->AdvancedSearch->save(); // COMBCODE
			$this->GENCODE->AdvancedSearch->save(); // GENCODE
			$this->STRENGTH->AdvancedSearch->save(); // STRENGTH
			$this->UNIT->AdvancedSearch->save(); // UNIT
			$this->FORMULARY->AdvancedSearch->save(); // FORMULARY
			$this->STOCK->AdvancedSearch->save(); // STOCK
			$this->RACKNO->AdvancedSearch->save(); // RACKNO
			$this->SUPPNAME->AdvancedSearch->save(); // SUPPNAME
			$this->COMBNAME->AdvancedSearch->save(); // COMBNAME
			$this->GENERICNAME->AdvancedSearch->save(); // GENERICNAME
			$this->REMARK->AdvancedSearch->save(); // REMARK
			$this->TEMP->AdvancedSearch->save(); // TEMP
			$this->PACKING->AdvancedSearch->save(); // PACKING
			$this->PhysQty->AdvancedSearch->save(); // PhysQty
			$this->LedQty->AdvancedSearch->save(); // LedQty
			$this->id->AdvancedSearch->save(); // id
			$this->PurValue->AdvancedSearch->save(); // PurValue
			$this->PSGST->AdvancedSearch->save(); // PSGST
			$this->PCGST->AdvancedSearch->save(); // PCGST
			$this->SaleValue->AdvancedSearch->save(); // SaleValue
			$this->SSGST->AdvancedSearch->save(); // SSGST
			$this->SCGST->AdvancedSearch->save(); // SCGST
			$this->SaleRate->AdvancedSearch->save(); // SaleRate
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->BRNAME->AdvancedSearch->save(); // BRNAME
			$this->Scheduling->AdvancedSearch->save(); // Scheduling
			$this->Schedulingh1->AdvancedSearch->save(); // Schedulingh1
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
		$this->buildBasicSearchSql($where, $this->BRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DES, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LASTSUPP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OPPRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESTRICT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BAWAPRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TAXTYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TAXUPD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PACKAGE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->STATUS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->KEMODISC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ORGAN, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DRID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->COMBCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GENCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UNIT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FORMULARY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RACKNO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SUPPNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->COMBNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GENERICNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->REMARK, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TEMP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PACKING, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BRNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Scheduling, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Schedulingh1, $arKeywords, $type);
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
		if ($this->BRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TYPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DES->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TAXP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BATCHNO->AdvancedSearch->issetSession())
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
		if ($this->SALQTY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LASTPURDT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LASTSUPP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GENNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LASTISSDT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CREATEDDT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OPPRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RESTRICT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BAWAPRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->STAXPER->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TAXTYPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OLDTAXP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TAXUPD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PACKAGE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NEWRT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NEWMRP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NEWUR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->STATUS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RETNQTY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->KEMODISC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PATSALE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ORGAN->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OLDRQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DRID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MFRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->COMBCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GENCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->STRENGTH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UNIT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FORMULARY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->STOCK->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RACKNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SUPPNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->COMBNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GENERICNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->REMARK->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TEMP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PACKING->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PhysQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LedQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SaleValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SaleRate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BRNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Scheduling->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Schedulingh1->AdvancedSearch->issetSession())
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
		$this->BRCODE->AdvancedSearch->unsetSession();
		$this->PRC->AdvancedSearch->unsetSession();
		$this->TYPE->AdvancedSearch->unsetSession();
		$this->DES->AdvancedSearch->unsetSession();
		$this->UM->AdvancedSearch->unsetSession();
		$this->RT->AdvancedSearch->unsetSession();
		$this->UR->AdvancedSearch->unsetSession();
		$this->TAXP->AdvancedSearch->unsetSession();
		$this->BATCHNO->AdvancedSearch->unsetSession();
		$this->OQ->AdvancedSearch->unsetSession();
		$this->RQ->AdvancedSearch->unsetSession();
		$this->MRQ->AdvancedSearch->unsetSession();
		$this->IQ->AdvancedSearch->unsetSession();
		$this->MRP->AdvancedSearch->unsetSession();
		$this->EXPDT->AdvancedSearch->unsetSession();
		$this->SALQTY->AdvancedSearch->unsetSession();
		$this->LASTPURDT->AdvancedSearch->unsetSession();
		$this->LASTSUPP->AdvancedSearch->unsetSession();
		$this->GENNAME->AdvancedSearch->unsetSession();
		$this->LASTISSDT->AdvancedSearch->unsetSession();
		$this->CREATEDDT->AdvancedSearch->unsetSession();
		$this->OPPRC->AdvancedSearch->unsetSession();
		$this->RESTRICT->AdvancedSearch->unsetSession();
		$this->BAWAPRC->AdvancedSearch->unsetSession();
		$this->STAXPER->AdvancedSearch->unsetSession();
		$this->TAXTYPE->AdvancedSearch->unsetSession();
		$this->OLDTAXP->AdvancedSearch->unsetSession();
		$this->TAXUPD->AdvancedSearch->unsetSession();
		$this->PACKAGE->AdvancedSearch->unsetSession();
		$this->NEWRT->AdvancedSearch->unsetSession();
		$this->NEWMRP->AdvancedSearch->unsetSession();
		$this->NEWUR->AdvancedSearch->unsetSession();
		$this->STATUS->AdvancedSearch->unsetSession();
		$this->RETNQTY->AdvancedSearch->unsetSession();
		$this->KEMODISC->AdvancedSearch->unsetSession();
		$this->PATSALE->AdvancedSearch->unsetSession();
		$this->ORGAN->AdvancedSearch->unsetSession();
		$this->OLDRQ->AdvancedSearch->unsetSession();
		$this->DRID->AdvancedSearch->unsetSession();
		$this->MFRCODE->AdvancedSearch->unsetSession();
		$this->COMBCODE->AdvancedSearch->unsetSession();
		$this->GENCODE->AdvancedSearch->unsetSession();
		$this->STRENGTH->AdvancedSearch->unsetSession();
		$this->UNIT->AdvancedSearch->unsetSession();
		$this->FORMULARY->AdvancedSearch->unsetSession();
		$this->STOCK->AdvancedSearch->unsetSession();
		$this->RACKNO->AdvancedSearch->unsetSession();
		$this->SUPPNAME->AdvancedSearch->unsetSession();
		$this->COMBNAME->AdvancedSearch->unsetSession();
		$this->GENERICNAME->AdvancedSearch->unsetSession();
		$this->REMARK->AdvancedSearch->unsetSession();
		$this->TEMP->AdvancedSearch->unsetSession();
		$this->PACKING->AdvancedSearch->unsetSession();
		$this->PhysQty->AdvancedSearch->unsetSession();
		$this->LedQty->AdvancedSearch->unsetSession();
		$this->id->AdvancedSearch->unsetSession();
		$this->PurValue->AdvancedSearch->unsetSession();
		$this->PSGST->AdvancedSearch->unsetSession();
		$this->PCGST->AdvancedSearch->unsetSession();
		$this->SaleValue->AdvancedSearch->unsetSession();
		$this->SSGST->AdvancedSearch->unsetSession();
		$this->SCGST->AdvancedSearch->unsetSession();
		$this->SaleRate->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->BRNAME->AdvancedSearch->unsetSession();
		$this->Scheduling->AdvancedSearch->unsetSession();
		$this->Schedulingh1->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->BRCODE->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->TYPE->AdvancedSearch->load();
		$this->DES->AdvancedSearch->load();
		$this->UM->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->UR->AdvancedSearch->load();
		$this->TAXP->AdvancedSearch->load();
		$this->BATCHNO->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->RQ->AdvancedSearch->load();
		$this->MRQ->AdvancedSearch->load();
		$this->IQ->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->SALQTY->AdvancedSearch->load();
		$this->LASTPURDT->AdvancedSearch->load();
		$this->LASTSUPP->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->LASTISSDT->AdvancedSearch->load();
		$this->CREATEDDT->AdvancedSearch->load();
		$this->OPPRC->AdvancedSearch->load();
		$this->RESTRICT->AdvancedSearch->load();
		$this->BAWAPRC->AdvancedSearch->load();
		$this->STAXPER->AdvancedSearch->load();
		$this->TAXTYPE->AdvancedSearch->load();
		$this->OLDTAXP->AdvancedSearch->load();
		$this->TAXUPD->AdvancedSearch->load();
		$this->PACKAGE->AdvancedSearch->load();
		$this->NEWRT->AdvancedSearch->load();
		$this->NEWMRP->AdvancedSearch->load();
		$this->NEWUR->AdvancedSearch->load();
		$this->STATUS->AdvancedSearch->load();
		$this->RETNQTY->AdvancedSearch->load();
		$this->KEMODISC->AdvancedSearch->load();
		$this->PATSALE->AdvancedSearch->load();
		$this->ORGAN->AdvancedSearch->load();
		$this->OLDRQ->AdvancedSearch->load();
		$this->DRID->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->COMBCODE->AdvancedSearch->load();
		$this->GENCODE->AdvancedSearch->load();
		$this->STRENGTH->AdvancedSearch->load();
		$this->UNIT->AdvancedSearch->load();
		$this->FORMULARY->AdvancedSearch->load();
		$this->STOCK->AdvancedSearch->load();
		$this->RACKNO->AdvancedSearch->load();
		$this->SUPPNAME->AdvancedSearch->load();
		$this->COMBNAME->AdvancedSearch->load();
		$this->GENERICNAME->AdvancedSearch->load();
		$this->REMARK->AdvancedSearch->load();
		$this->TEMP->AdvancedSearch->load();
		$this->PACKING->AdvancedSearch->load();
		$this->PhysQty->AdvancedSearch->load();
		$this->LedQty->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SaleValue->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->SaleRate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->BRNAME->AdvancedSearch->load();
		$this->Scheduling->AdvancedSearch->load();
		$this->Schedulingh1->AdvancedSearch->load();
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
			$this->updateSort($this->TYPE); // TYPE
			$this->updateSort($this->DES); // DES
			$this->updateSort($this->UM); // UM
			$this->updateSort($this->RT); // RT
			$this->updateSort($this->BATCHNO); // BATCHNO
			$this->updateSort($this->MRP); // MRP
			$this->updateSort($this->EXPDT); // EXPDT
			$this->updateSort($this->GENNAME); // GENNAME
			$this->updateSort($this->CREATEDDT); // CREATEDDT
			$this->updateSort($this->DRID); // DRID
			$this->updateSort($this->MFRCODE); // MFRCODE
			$this->updateSort($this->COMBCODE); // COMBCODE
			$this->updateSort($this->GENCODE); // GENCODE
			$this->updateSort($this->STRENGTH); // STRENGTH
			$this->updateSort($this->UNIT); // UNIT
			$this->updateSort($this->FORMULARY); // FORMULARY
			$this->updateSort($this->COMBNAME); // COMBNAME
			$this->updateSort($this->GENERICNAME); // GENERICNAME
			$this->updateSort($this->REMARK); // REMARK
			$this->updateSort($this->TEMP); // TEMP
			$this->updateSort($this->id); // id
			$this->updateSort($this->PurValue); // PurValue
			$this->updateSort($this->PSGST); // PSGST
			$this->updateSort($this->PCGST); // PCGST
			$this->updateSort($this->SaleValue); // SaleValue
			$this->updateSort($this->SSGST); // SSGST
			$this->updateSort($this->SCGST); // SCGST
			$this->updateSort($this->SaleRate); // SaleRate
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->BRNAME); // BRNAME
			$this->updateSort($this->Scheduling); // Scheduling
			$this->updateSort($this->Schedulingh1); // Schedulingh1
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
				$this->BRCODE->setSort("");
				$this->PRC->setSort("");
				$this->TYPE->setSort("");
				$this->DES->setSort("");
				$this->UM->setSort("");
				$this->RT->setSort("");
				$this->BATCHNO->setSort("");
				$this->MRP->setSort("");
				$this->EXPDT->setSort("");
				$this->GENNAME->setSort("");
				$this->CREATEDDT->setSort("");
				$this->DRID->setSort("");
				$this->MFRCODE->setSort("");
				$this->COMBCODE->setSort("");
				$this->GENCODE->setSort("");
				$this->STRENGTH->setSort("");
				$this->UNIT->setSort("");
				$this->FORMULARY->setSort("");
				$this->COMBNAME->setSort("");
				$this->GENERICNAME->setSort("");
				$this->REMARK->setSort("");
				$this->TEMP->setSort("");
				$this->id->setSort("");
				$this->PurValue->setSort("");
				$this->PSGST->setSort("");
				$this->PCGST->setSort("");
				$this->SaleValue->setSort("");
				$this->SSGST->setSort("");
				$this->SCGST->setSort("");
				$this->SaleRate->setSort("");
				$this->HospID->setSort("");
				$this->BRNAME->setSort("");
				$this->Scheduling->setSort("");
				$this->Schedulingh1->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_storemastlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_storemastlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fpharmacy_storemastlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_storemastlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"pharmacy_storemastsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<button type=\"button\" class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"pharmacy_storemast\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" onclick=\"ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'pharmacy_storemastsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpharmacy_storemastlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->TYPE->CurrentValue = NULL;
		$this->TYPE->OldValue = $this->TYPE->CurrentValue;
		$this->DES->CurrentValue = NULL;
		$this->DES->OldValue = $this->DES->CurrentValue;
		$this->UM->CurrentValue = NULL;
		$this->UM->OldValue = $this->UM->CurrentValue;
		$this->RT->CurrentValue = NULL;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->UR->CurrentValue = NULL;
		$this->UR->OldValue = $this->UR->CurrentValue;
		$this->TAXP->CurrentValue = NULL;
		$this->TAXP->OldValue = $this->TAXP->CurrentValue;
		$this->BATCHNO->CurrentValue = NULL;
		$this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
		$this->OQ->CurrentValue = NULL;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->RQ->CurrentValue = NULL;
		$this->RQ->OldValue = $this->RQ->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->SALQTY->CurrentValue = NULL;
		$this->SALQTY->OldValue = $this->SALQTY->CurrentValue;
		$this->LASTPURDT->CurrentValue = NULL;
		$this->LASTPURDT->OldValue = $this->LASTPURDT->CurrentValue;
		$this->LASTSUPP->CurrentValue = NULL;
		$this->LASTSUPP->OldValue = $this->LASTSUPP->CurrentValue;
		$this->GENNAME->CurrentValue = NULL;
		$this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
		$this->LASTISSDT->CurrentValue = NULL;
		$this->LASTISSDT->OldValue = $this->LASTISSDT->CurrentValue;
		$this->CREATEDDT->CurrentValue = NULL;
		$this->CREATEDDT->OldValue = $this->CREATEDDT->CurrentValue;
		$this->OPPRC->CurrentValue = NULL;
		$this->OPPRC->OldValue = $this->OPPRC->CurrentValue;
		$this->RESTRICT->CurrentValue = NULL;
		$this->RESTRICT->OldValue = $this->RESTRICT->CurrentValue;
		$this->BAWAPRC->CurrentValue = NULL;
		$this->BAWAPRC->OldValue = $this->BAWAPRC->CurrentValue;
		$this->STAXPER->CurrentValue = NULL;
		$this->STAXPER->OldValue = $this->STAXPER->CurrentValue;
		$this->TAXTYPE->CurrentValue = NULL;
		$this->TAXTYPE->OldValue = $this->TAXTYPE->CurrentValue;
		$this->OLDTAXP->CurrentValue = NULL;
		$this->OLDTAXP->OldValue = $this->OLDTAXP->CurrentValue;
		$this->TAXUPD->CurrentValue = NULL;
		$this->TAXUPD->OldValue = $this->TAXUPD->CurrentValue;
		$this->PACKAGE->CurrentValue = NULL;
		$this->PACKAGE->OldValue = $this->PACKAGE->CurrentValue;
		$this->NEWRT->CurrentValue = NULL;
		$this->NEWRT->OldValue = $this->NEWRT->CurrentValue;
		$this->NEWMRP->CurrentValue = NULL;
		$this->NEWMRP->OldValue = $this->NEWMRP->CurrentValue;
		$this->NEWUR->CurrentValue = NULL;
		$this->NEWUR->OldValue = $this->NEWUR->CurrentValue;
		$this->STATUS->CurrentValue = NULL;
		$this->STATUS->OldValue = $this->STATUS->CurrentValue;
		$this->RETNQTY->CurrentValue = NULL;
		$this->RETNQTY->OldValue = $this->RETNQTY->CurrentValue;
		$this->KEMODISC->CurrentValue = NULL;
		$this->KEMODISC->OldValue = $this->KEMODISC->CurrentValue;
		$this->PATSALE->CurrentValue = NULL;
		$this->PATSALE->OldValue = $this->PATSALE->CurrentValue;
		$this->ORGAN->CurrentValue = NULL;
		$this->ORGAN->OldValue = $this->ORGAN->CurrentValue;
		$this->OLDRQ->CurrentValue = NULL;
		$this->OLDRQ->OldValue = $this->OLDRQ->CurrentValue;
		$this->DRID->CurrentValue = NULL;
		$this->DRID->OldValue = $this->DRID->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->COMBCODE->CurrentValue = NULL;
		$this->COMBCODE->OldValue = $this->COMBCODE->CurrentValue;
		$this->GENCODE->CurrentValue = NULL;
		$this->GENCODE->OldValue = $this->GENCODE->CurrentValue;
		$this->STRENGTH->CurrentValue = NULL;
		$this->STRENGTH->OldValue = $this->STRENGTH->CurrentValue;
		$this->UNIT->CurrentValue = NULL;
		$this->UNIT->OldValue = $this->UNIT->CurrentValue;
		$this->FORMULARY->CurrentValue = NULL;
		$this->FORMULARY->OldValue = $this->FORMULARY->CurrentValue;
		$this->STOCK->CurrentValue = NULL;
		$this->STOCK->OldValue = $this->STOCK->CurrentValue;
		$this->RACKNO->CurrentValue = NULL;
		$this->RACKNO->OldValue = $this->RACKNO->CurrentValue;
		$this->SUPPNAME->CurrentValue = NULL;
		$this->SUPPNAME->OldValue = $this->SUPPNAME->CurrentValue;
		$this->COMBNAME->CurrentValue = NULL;
		$this->COMBNAME->OldValue = $this->COMBNAME->CurrentValue;
		$this->GENERICNAME->CurrentValue = NULL;
		$this->GENERICNAME->OldValue = $this->GENERICNAME->CurrentValue;
		$this->REMARK->CurrentValue = NULL;
		$this->REMARK->OldValue = $this->REMARK->CurrentValue;
		$this->TEMP->CurrentValue = NULL;
		$this->TEMP->OldValue = $this->TEMP->CurrentValue;
		$this->PACKING->CurrentValue = NULL;
		$this->PACKING->OldValue = $this->PACKING->CurrentValue;
		$this->PhysQty->CurrentValue = NULL;
		$this->PhysQty->OldValue = $this->PhysQty->CurrentValue;
		$this->LedQty->CurrentValue = NULL;
		$this->LedQty->OldValue = $this->LedQty->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->SaleValue->CurrentValue = NULL;
		$this->SaleValue->OldValue = $this->SaleValue->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->SaleRate->CurrentValue = NULL;
		$this->SaleRate->OldValue = $this->SaleRate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->BRNAME->CurrentValue = NULL;
		$this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
		$this->OV->CurrentValue = NULL;
		$this->OV->OldValue = $this->OV->CurrentValue;
		$this->LATESTOV->CurrentValue = NULL;
		$this->LATESTOV->OldValue = $this->LATESTOV->CurrentValue;
		$this->ITEMTYPE->CurrentValue = NULL;
		$this->ITEMTYPE->OldValue = $this->ITEMTYPE->CurrentValue;
		$this->ROWID->CurrentValue = NULL;
		$this->ROWID->OldValue = $this->ROWID->CurrentValue;
		$this->MOVED->CurrentValue = NULL;
		$this->MOVED->OldValue = $this->MOVED->CurrentValue;
		$this->NEWTAX->CurrentValue = NULL;
		$this->NEWTAX->OldValue = $this->NEWTAX->CurrentValue;
		$this->HSNCODE->CurrentValue = NULL;
		$this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
		$this->OLDTAX->CurrentValue = NULL;
		$this->OLDTAX->OldValue = $this->OLDTAX->CurrentValue;
		$this->Scheduling->CurrentValue = NULL;
		$this->Scheduling->OldValue = $this->Scheduling->CurrentValue;
		$this->Schedulingh1->CurrentValue = NULL;
		$this->Schedulingh1->OldValue = $this->Schedulingh1->CurrentValue;
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

		// TYPE
		if (!$this->isAddOrEdit())
			$this->TYPE->AdvancedSearch->setSearchValue(Get("x_TYPE", Get("TYPE", "")));
		if ($this->TYPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TYPE->AdvancedSearch->setSearchOperator(Get("z_TYPE", ""));

		// DES
		if (!$this->isAddOrEdit())
			$this->DES->AdvancedSearch->setSearchValue(Get("x_DES", Get("DES", "")));
		if ($this->DES->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DES->AdvancedSearch->setSearchOperator(Get("z_DES", ""));

		// UM
		if (!$this->isAddOrEdit())
			$this->UM->AdvancedSearch->setSearchValue(Get("x_UM", Get("UM", "")));
		if ($this->UM->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UM->AdvancedSearch->setSearchOperator(Get("z_UM", ""));

		// RT
		if (!$this->isAddOrEdit())
			$this->RT->AdvancedSearch->setSearchValue(Get("x_RT", Get("RT", "")));
		if ($this->RT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RT->AdvancedSearch->setSearchOperator(Get("z_RT", ""));

		// UR
		if (!$this->isAddOrEdit())
			$this->UR->AdvancedSearch->setSearchValue(Get("x_UR", Get("UR", "")));
		if ($this->UR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UR->AdvancedSearch->setSearchOperator(Get("z_UR", ""));

		// TAXP
		if (!$this->isAddOrEdit())
			$this->TAXP->AdvancedSearch->setSearchValue(Get("x_TAXP", Get("TAXP", "")));
		if ($this->TAXP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TAXP->AdvancedSearch->setSearchOperator(Get("z_TAXP", ""));

		// BATCHNO
		if (!$this->isAddOrEdit())
			$this->BATCHNO->AdvancedSearch->setSearchValue(Get("x_BATCHNO", Get("BATCHNO", "")));
		if ($this->BATCHNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BATCHNO->AdvancedSearch->setSearchOperator(Get("z_BATCHNO", ""));

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

		// SALQTY
		if (!$this->isAddOrEdit())
			$this->SALQTY->AdvancedSearch->setSearchValue(Get("x_SALQTY", Get("SALQTY", "")));
		if ($this->SALQTY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SALQTY->AdvancedSearch->setSearchOperator(Get("z_SALQTY", ""));

		// LASTPURDT
		if (!$this->isAddOrEdit())
			$this->LASTPURDT->AdvancedSearch->setSearchValue(Get("x_LASTPURDT", Get("LASTPURDT", "")));
		if ($this->LASTPURDT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LASTPURDT->AdvancedSearch->setSearchOperator(Get("z_LASTPURDT", ""));

		// LASTSUPP
		if (!$this->isAddOrEdit())
			$this->LASTSUPP->AdvancedSearch->setSearchValue(Get("x_LASTSUPP", Get("LASTSUPP", "")));
		if ($this->LASTSUPP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LASTSUPP->AdvancedSearch->setSearchOperator(Get("z_LASTSUPP", ""));

		// GENNAME
		if (!$this->isAddOrEdit())
			$this->GENNAME->AdvancedSearch->setSearchValue(Get("x_GENNAME", Get("GENNAME", "")));
		if ($this->GENNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GENNAME->AdvancedSearch->setSearchOperator(Get("z_GENNAME", ""));

		// LASTISSDT
		if (!$this->isAddOrEdit())
			$this->LASTISSDT->AdvancedSearch->setSearchValue(Get("x_LASTISSDT", Get("LASTISSDT", "")));
		if ($this->LASTISSDT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LASTISSDT->AdvancedSearch->setSearchOperator(Get("z_LASTISSDT", ""));

		// CREATEDDT
		if (!$this->isAddOrEdit())
			$this->CREATEDDT->AdvancedSearch->setSearchValue(Get("x_CREATEDDT", Get("CREATEDDT", "")));
		if ($this->CREATEDDT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CREATEDDT->AdvancedSearch->setSearchOperator(Get("z_CREATEDDT", ""));

		// OPPRC
		if (!$this->isAddOrEdit())
			$this->OPPRC->AdvancedSearch->setSearchValue(Get("x_OPPRC", Get("OPPRC", "")));
		if ($this->OPPRC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OPPRC->AdvancedSearch->setSearchOperator(Get("z_OPPRC", ""));

		// RESTRICT
		if (!$this->isAddOrEdit())
			$this->RESTRICT->AdvancedSearch->setSearchValue(Get("x_RESTRICT", Get("RESTRICT", "")));
		if ($this->RESTRICT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RESTRICT->AdvancedSearch->setSearchOperator(Get("z_RESTRICT", ""));

		// BAWAPRC
		if (!$this->isAddOrEdit())
			$this->BAWAPRC->AdvancedSearch->setSearchValue(Get("x_BAWAPRC", Get("BAWAPRC", "")));
		if ($this->BAWAPRC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BAWAPRC->AdvancedSearch->setSearchOperator(Get("z_BAWAPRC", ""));

		// STAXPER
		if (!$this->isAddOrEdit())
			$this->STAXPER->AdvancedSearch->setSearchValue(Get("x_STAXPER", Get("STAXPER", "")));
		if ($this->STAXPER->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->STAXPER->AdvancedSearch->setSearchOperator(Get("z_STAXPER", ""));

		// TAXTYPE
		if (!$this->isAddOrEdit())
			$this->TAXTYPE->AdvancedSearch->setSearchValue(Get("x_TAXTYPE", Get("TAXTYPE", "")));
		if ($this->TAXTYPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TAXTYPE->AdvancedSearch->setSearchOperator(Get("z_TAXTYPE", ""));

		// OLDTAXP
		if (!$this->isAddOrEdit())
			$this->OLDTAXP->AdvancedSearch->setSearchValue(Get("x_OLDTAXP", Get("OLDTAXP", "")));
		if ($this->OLDTAXP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OLDTAXP->AdvancedSearch->setSearchOperator(Get("z_OLDTAXP", ""));

		// TAXUPD
		if (!$this->isAddOrEdit())
			$this->TAXUPD->AdvancedSearch->setSearchValue(Get("x_TAXUPD", Get("TAXUPD", "")));
		if ($this->TAXUPD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TAXUPD->AdvancedSearch->setSearchOperator(Get("z_TAXUPD", ""));

		// PACKAGE
		if (!$this->isAddOrEdit())
			$this->PACKAGE->AdvancedSearch->setSearchValue(Get("x_PACKAGE", Get("PACKAGE", "")));
		if ($this->PACKAGE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PACKAGE->AdvancedSearch->setSearchOperator(Get("z_PACKAGE", ""));

		// NEWRT
		if (!$this->isAddOrEdit())
			$this->NEWRT->AdvancedSearch->setSearchValue(Get("x_NEWRT", Get("NEWRT", "")));
		if ($this->NEWRT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NEWRT->AdvancedSearch->setSearchOperator(Get("z_NEWRT", ""));

		// NEWMRP
		if (!$this->isAddOrEdit())
			$this->NEWMRP->AdvancedSearch->setSearchValue(Get("x_NEWMRP", Get("NEWMRP", "")));
		if ($this->NEWMRP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NEWMRP->AdvancedSearch->setSearchOperator(Get("z_NEWMRP", ""));

		// NEWUR
		if (!$this->isAddOrEdit())
			$this->NEWUR->AdvancedSearch->setSearchValue(Get("x_NEWUR", Get("NEWUR", "")));
		if ($this->NEWUR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NEWUR->AdvancedSearch->setSearchOperator(Get("z_NEWUR", ""));

		// STATUS
		if (!$this->isAddOrEdit())
			$this->STATUS->AdvancedSearch->setSearchValue(Get("x_STATUS", Get("STATUS", "")));
		if ($this->STATUS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->STATUS->AdvancedSearch->setSearchOperator(Get("z_STATUS", ""));

		// RETNQTY
		if (!$this->isAddOrEdit())
			$this->RETNQTY->AdvancedSearch->setSearchValue(Get("x_RETNQTY", Get("RETNQTY", "")));
		if ($this->RETNQTY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RETNQTY->AdvancedSearch->setSearchOperator(Get("z_RETNQTY", ""));

		// KEMODISC
		if (!$this->isAddOrEdit())
			$this->KEMODISC->AdvancedSearch->setSearchValue(Get("x_KEMODISC", Get("KEMODISC", "")));
		if ($this->KEMODISC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->KEMODISC->AdvancedSearch->setSearchOperator(Get("z_KEMODISC", ""));

		// PATSALE
		if (!$this->isAddOrEdit())
			$this->PATSALE->AdvancedSearch->setSearchValue(Get("x_PATSALE", Get("PATSALE", "")));
		if ($this->PATSALE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PATSALE->AdvancedSearch->setSearchOperator(Get("z_PATSALE", ""));

		// ORGAN
		if (!$this->isAddOrEdit())
			$this->ORGAN->AdvancedSearch->setSearchValue(Get("x_ORGAN", Get("ORGAN", "")));
		if ($this->ORGAN->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ORGAN->AdvancedSearch->setSearchOperator(Get("z_ORGAN", ""));

		// OLDRQ
		if (!$this->isAddOrEdit())
			$this->OLDRQ->AdvancedSearch->setSearchValue(Get("x_OLDRQ", Get("OLDRQ", "")));
		if ($this->OLDRQ->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OLDRQ->AdvancedSearch->setSearchOperator(Get("z_OLDRQ", ""));

		// DRID
		if (!$this->isAddOrEdit())
			$this->DRID->AdvancedSearch->setSearchValue(Get("x_DRID", Get("DRID", "")));
		if ($this->DRID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DRID->AdvancedSearch->setSearchOperator(Get("z_DRID", ""));

		// MFRCODE
		if (!$this->isAddOrEdit())
			$this->MFRCODE->AdvancedSearch->setSearchValue(Get("x_MFRCODE", Get("MFRCODE", "")));
		if ($this->MFRCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MFRCODE->AdvancedSearch->setSearchOperator(Get("z_MFRCODE", ""));

		// COMBCODE
		if (!$this->isAddOrEdit())
			$this->COMBCODE->AdvancedSearch->setSearchValue(Get("x_COMBCODE", Get("COMBCODE", "")));
		if ($this->COMBCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->COMBCODE->AdvancedSearch->setSearchOperator(Get("z_COMBCODE", ""));

		// GENCODE
		if (!$this->isAddOrEdit())
			$this->GENCODE->AdvancedSearch->setSearchValue(Get("x_GENCODE", Get("GENCODE", "")));
		if ($this->GENCODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GENCODE->AdvancedSearch->setSearchOperator(Get("z_GENCODE", ""));

		// STRENGTH
		if (!$this->isAddOrEdit())
			$this->STRENGTH->AdvancedSearch->setSearchValue(Get("x_STRENGTH", Get("STRENGTH", "")));
		if ($this->STRENGTH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->STRENGTH->AdvancedSearch->setSearchOperator(Get("z_STRENGTH", ""));

		// UNIT
		if (!$this->isAddOrEdit())
			$this->UNIT->AdvancedSearch->setSearchValue(Get("x_UNIT", Get("UNIT", "")));
		if ($this->UNIT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->UNIT->AdvancedSearch->setSearchOperator(Get("z_UNIT", ""));

		// FORMULARY
		if (!$this->isAddOrEdit())
			$this->FORMULARY->AdvancedSearch->setSearchValue(Get("x_FORMULARY", Get("FORMULARY", "")));
		if ($this->FORMULARY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FORMULARY->AdvancedSearch->setSearchOperator(Get("z_FORMULARY", ""));

		// STOCK
		if (!$this->isAddOrEdit())
			$this->STOCK->AdvancedSearch->setSearchValue(Get("x_STOCK", Get("STOCK", "")));
		if ($this->STOCK->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->STOCK->AdvancedSearch->setSearchOperator(Get("z_STOCK", ""));

		// RACKNO
		if (!$this->isAddOrEdit())
			$this->RACKNO->AdvancedSearch->setSearchValue(Get("x_RACKNO", Get("RACKNO", "")));
		if ($this->RACKNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RACKNO->AdvancedSearch->setSearchOperator(Get("z_RACKNO", ""));

		// SUPPNAME
		if (!$this->isAddOrEdit())
			$this->SUPPNAME->AdvancedSearch->setSearchValue(Get("x_SUPPNAME", Get("SUPPNAME", "")));
		if ($this->SUPPNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SUPPNAME->AdvancedSearch->setSearchOperator(Get("z_SUPPNAME", ""));

		// COMBNAME
		if (!$this->isAddOrEdit())
			$this->COMBNAME->AdvancedSearch->setSearchValue(Get("x_COMBNAME", Get("COMBNAME", "")));
		if ($this->COMBNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->COMBNAME->AdvancedSearch->setSearchOperator(Get("z_COMBNAME", ""));

		// GENERICNAME
		if (!$this->isAddOrEdit())
			$this->GENERICNAME->AdvancedSearch->setSearchValue(Get("x_GENERICNAME", Get("GENERICNAME", "")));
		if ($this->GENERICNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GENERICNAME->AdvancedSearch->setSearchOperator(Get("z_GENERICNAME", ""));

		// REMARK
		if (!$this->isAddOrEdit())
			$this->REMARK->AdvancedSearch->setSearchValue(Get("x_REMARK", Get("REMARK", "")));
		if ($this->REMARK->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->REMARK->AdvancedSearch->setSearchOperator(Get("z_REMARK", ""));

		// TEMP
		if (!$this->isAddOrEdit())
			$this->TEMP->AdvancedSearch->setSearchValue(Get("x_TEMP", Get("TEMP", "")));
		if ($this->TEMP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TEMP->AdvancedSearch->setSearchOperator(Get("z_TEMP", ""));

		// PACKING
		if (!$this->isAddOrEdit())
			$this->PACKING->AdvancedSearch->setSearchValue(Get("x_PACKING", Get("PACKING", "")));
		if ($this->PACKING->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PACKING->AdvancedSearch->setSearchOperator(Get("z_PACKING", ""));

		// PhysQty
		if (!$this->isAddOrEdit())
			$this->PhysQty->AdvancedSearch->setSearchValue(Get("x_PhysQty", Get("PhysQty", "")));
		if ($this->PhysQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PhysQty->AdvancedSearch->setSearchOperator(Get("z_PhysQty", ""));

		// LedQty
		if (!$this->isAddOrEdit())
			$this->LedQty->AdvancedSearch->setSearchValue(Get("x_LedQty", Get("LedQty", "")));
		if ($this->LedQty->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LedQty->AdvancedSearch->setSearchOperator(Get("z_LedQty", ""));

		// id
		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// PurValue
		if (!$this->isAddOrEdit())
			$this->PurValue->AdvancedSearch->setSearchValue(Get("x_PurValue", Get("PurValue", "")));
		if ($this->PurValue->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PurValue->AdvancedSearch->setSearchOperator(Get("z_PurValue", ""));

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

		// SaleValue
		if (!$this->isAddOrEdit())
			$this->SaleValue->AdvancedSearch->setSearchValue(Get("x_SaleValue", Get("SaleValue", "")));
		if ($this->SaleValue->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SaleValue->AdvancedSearch->setSearchOperator(Get("z_SaleValue", ""));

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

		// SaleRate
		if (!$this->isAddOrEdit())
			$this->SaleRate->AdvancedSearch->setSearchValue(Get("x_SaleRate", Get("SaleRate", "")));
		if ($this->SaleRate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SaleRate->AdvancedSearch->setSearchOperator(Get("z_SaleRate", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// BRNAME
		if (!$this->isAddOrEdit())
			$this->BRNAME->AdvancedSearch->setSearchValue(Get("x_BRNAME", Get("BRNAME", "")));
		if ($this->BRNAME->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BRNAME->AdvancedSearch->setSearchOperator(Get("z_BRNAME", ""));

		// Scheduling
		if (!$this->isAddOrEdit())
			$this->Scheduling->AdvancedSearch->setSearchValue(Get("x_Scheduling", Get("Scheduling", "")));
		if ($this->Scheduling->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Scheduling->AdvancedSearch->setSearchOperator(Get("z_Scheduling", ""));

		// Schedulingh1
		if (!$this->isAddOrEdit())
			$this->Schedulingh1->AdvancedSearch->setSearchValue(Get("x_Schedulingh1", Get("Schedulingh1", "")));
		if ($this->Schedulingh1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Schedulingh1->AdvancedSearch->setSearchOperator(Get("z_Schedulingh1", ""));
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

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'TYPE' first before field var 'x_TYPE'
		$val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
		if (!$this->TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->TYPE->setFormValue($val);
		}

		// Check field name 'DES' first before field var 'x_DES'
		$val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
		if (!$this->DES->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DES->Visible = FALSE; // Disable update for API request
			else
				$this->DES->setFormValue($val);
		}

		// Check field name 'UM' first before field var 'x_UM'
		$val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
		if (!$this->UM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UM->Visible = FALSE; // Disable update for API request
			else
				$this->UM->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}

		// Check field name 'GENNAME' first before field var 'x_GENNAME'
		$val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
		if (!$this->GENNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENNAME->setFormValue($val);
		}

		// Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
		$val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
		if (!$this->CREATEDDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CREATEDDT->Visible = FALSE; // Disable update for API request
			else
				$this->CREATEDDT->setFormValue($val);
			$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		}

		// Check field name 'DRID' first before field var 'x_DRID'
		$val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
		if (!$this->DRID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DRID->Visible = FALSE; // Disable update for API request
			else
				$this->DRID->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'COMBCODE' first before field var 'x_COMBCODE'
		$val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
		if (!$this->COMBCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->COMBCODE->Visible = FALSE; // Disable update for API request
			else
				$this->COMBCODE->setFormValue($val);
		}

		// Check field name 'GENCODE' first before field var 'x_GENCODE'
		$val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
		if (!$this->GENCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENCODE->Visible = FALSE; // Disable update for API request
			else
				$this->GENCODE->setFormValue($val);
		}

		// Check field name 'STRENGTH' first before field var 'x_STRENGTH'
		$val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
		if (!$this->STRENGTH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->STRENGTH->setFormValue($val);
		}

		// Check field name 'UNIT' first before field var 'x_UNIT'
		$val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
		if (!$this->UNIT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UNIT->Visible = FALSE; // Disable update for API request
			else
				$this->UNIT->setFormValue($val);
		}

		// Check field name 'FORMULARY' first before field var 'x_FORMULARY'
		$val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
		if (!$this->FORMULARY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FORMULARY->Visible = FALSE; // Disable update for API request
			else
				$this->FORMULARY->setFormValue($val);
		}

		// Check field name 'COMBNAME' first before field var 'x_COMBNAME'
		$val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
		if (!$this->COMBNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->COMBNAME->Visible = FALSE; // Disable update for API request
			else
				$this->COMBNAME->setFormValue($val);
		}

		// Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
		$val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
		if (!$this->GENERICNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENERICNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENERICNAME->setFormValue($val);
		}

		// Check field name 'REMARK' first before field var 'x_REMARK'
		$val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
		if (!$this->REMARK->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REMARK->Visible = FALSE; // Disable update for API request
			else
				$this->REMARK->setFormValue($val);
		}

		// Check field name 'TEMP' first before field var 'x_TEMP'
		$val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
		if (!$this->TEMP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TEMP->Visible = FALSE; // Disable update for API request
			else
				$this->TEMP->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
		}

		// Check field name 'PSGST' first before field var 'x_PSGST'
		$val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
		if (!$this->PSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PSGST->Visible = FALSE; // Disable update for API request
			else
				$this->PSGST->setFormValue($val);
		}

		// Check field name 'PCGST' first before field var 'x_PCGST'
		$val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
		if (!$this->PCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PCGST->Visible = FALSE; // Disable update for API request
			else
				$this->PCGST->setFormValue($val);
		}

		// Check field name 'SaleValue' first before field var 'x_SaleValue'
		$val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
		if (!$this->SaleValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SaleValue->Visible = FALSE; // Disable update for API request
			else
				$this->SaleValue->setFormValue($val);
		}

		// Check field name 'SSGST' first before field var 'x_SSGST'
		$val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
		if (!$this->SSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SSGST->Visible = FALSE; // Disable update for API request
			else
				$this->SSGST->setFormValue($val);
		}

		// Check field name 'SCGST' first before field var 'x_SCGST'
		$val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
		if (!$this->SCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SCGST->Visible = FALSE; // Disable update for API request
			else
				$this->SCGST->setFormValue($val);
		}

		// Check field name 'SaleRate' first before field var 'x_SaleRate'
		$val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
		if (!$this->SaleRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SaleRate->Visible = FALSE; // Disable update for API request
			else
				$this->SaleRate->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}

		// Check field name 'Scheduling' first before field var 'x_Scheduling'
		$val = $CurrentForm->hasValue("Scheduling") ? $CurrentForm->getValue("Scheduling") : $CurrentForm->getValue("x_Scheduling");
		if (!$this->Scheduling->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Scheduling->Visible = FALSE; // Disable update for API request
			else
				$this->Scheduling->setFormValue($val);
		}

		// Check field name 'Schedulingh1' first before field var 'x_Schedulingh1'
		$val = $CurrentForm->hasValue("Schedulingh1") ? $CurrentForm->getValue("Schedulingh1") : $CurrentForm->getValue("x_Schedulingh1");
		if (!$this->Schedulingh1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Schedulingh1->Visible = FALSE; // Disable update for API request
			else
				$this->Schedulingh1->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->TYPE->CurrentValue = $this->TYPE->FormValue;
		$this->DES->CurrentValue = $this->DES->FormValue;
		$this->UM->CurrentValue = $this->UM->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
		$this->CREATEDDT->CurrentValue = $this->CREATEDDT->FormValue;
		$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		$this->DRID->CurrentValue = $this->DRID->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->COMBCODE->CurrentValue = $this->COMBCODE->FormValue;
		$this->GENCODE->CurrentValue = $this->GENCODE->FormValue;
		$this->STRENGTH->CurrentValue = $this->STRENGTH->FormValue;
		$this->UNIT->CurrentValue = $this->UNIT->FormValue;
		$this->FORMULARY->CurrentValue = $this->FORMULARY->FormValue;
		$this->COMBNAME->CurrentValue = $this->COMBNAME->FormValue;
		$this->GENERICNAME->CurrentValue = $this->GENERICNAME->FormValue;
		$this->REMARK->CurrentValue = $this->REMARK->FormValue;
		$this->TEMP->CurrentValue = $this->TEMP->FormValue;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SaleValue->CurrentValue = $this->SaleValue->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->SaleRate->CurrentValue = $this->SaleRate->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
		$this->Scheduling->CurrentValue = $this->Scheduling->FormValue;
		$this->Schedulingh1->CurrentValue = $this->Schedulingh1->FormValue;
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
		$this->PRC->setDbValue($row['PRC']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DES->setDbValue($row['DES']);
		$this->UM->setDbValue($row['UM']);
		$this->RT->setDbValue($row['RT']);
		$this->UR->setDbValue($row['UR']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->SALQTY->setDbValue($row['SALQTY']);
		$this->LASTPURDT->setDbValue($row['LASTPURDT']);
		$this->LASTSUPP->setDbValue($row['LASTSUPP']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->LASTISSDT->setDbValue($row['LASTISSDT']);
		$this->CREATEDDT->setDbValue($row['CREATEDDT']);
		$this->OPPRC->setDbValue($row['OPPRC']);
		$this->RESTRICT->setDbValue($row['RESTRICT']);
		$this->BAWAPRC->setDbValue($row['BAWAPRC']);
		$this->STAXPER->setDbValue($row['STAXPER']);
		$this->TAXTYPE->setDbValue($row['TAXTYPE']);
		$this->OLDTAXP->setDbValue($row['OLDTAXP']);
		$this->TAXUPD->setDbValue($row['TAXUPD']);
		$this->PACKAGE->setDbValue($row['PACKAGE']);
		$this->NEWRT->setDbValue($row['NEWRT']);
		$this->NEWMRP->setDbValue($row['NEWMRP']);
		$this->NEWUR->setDbValue($row['NEWUR']);
		$this->STATUS->setDbValue($row['STATUS']);
		$this->RETNQTY->setDbValue($row['RETNQTY']);
		$this->KEMODISC->setDbValue($row['KEMODISC']);
		$this->PATSALE->setDbValue($row['PATSALE']);
		$this->ORGAN->setDbValue($row['ORGAN']);
		$this->OLDRQ->setDbValue($row['OLDRQ']);
		$this->DRID->setDbValue($row['DRID']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->COMBCODE->setDbValue($row['COMBCODE']);
		$this->GENCODE->setDbValue($row['GENCODE']);
		$this->STRENGTH->setDbValue($row['STRENGTH']);
		$this->UNIT->setDbValue($row['UNIT']);
		$this->FORMULARY->setDbValue($row['FORMULARY']);
		$this->STOCK->setDbValue($row['STOCK']);
		$this->RACKNO->setDbValue($row['RACKNO']);
		$this->SUPPNAME->setDbValue($row['SUPPNAME']);
		$this->COMBNAME->setDbValue($row['COMBNAME']);
		$this->GENERICNAME->setDbValue($row['GENERICNAME']);
		$this->REMARK->setDbValue($row['REMARK']);
		$this->TEMP->setDbValue($row['TEMP']);
		$this->PACKING->setDbValue($row['PACKING']);
		$this->PhysQty->setDbValue($row['PhysQty']);
		$this->LedQty->setDbValue($row['LedQty']);
		$this->id->setDbValue($row['id']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SaleValue->setDbValue($row['SaleValue']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->SaleRate->setDbValue($row['SaleRate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->BRNAME->setDbValue($row['BRNAME']);
		$this->OV->setDbValue($row['OV']);
		$this->LATESTOV->setDbValue($row['LATESTOV']);
		$this->ITEMTYPE->setDbValue($row['ITEMTYPE']);
		$this->ROWID->setDbValue($row['ROWID']);
		$this->MOVED->setDbValue($row['MOVED']);
		$this->NEWTAX->setDbValue($row['NEWTAX']);
		$this->HSNCODE->setDbValue($row['HSNCODE']);
		$this->OLDTAX->setDbValue($row['OLDTAX']);
		$this->Scheduling->setDbValue($row['Scheduling']);
		$this->Schedulingh1->setDbValue($row['Schedulingh1']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['TYPE'] = $this->TYPE->CurrentValue;
		$row['DES'] = $this->DES->CurrentValue;
		$row['UM'] = $this->UM->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['UR'] = $this->UR->CurrentValue;
		$row['TAXP'] = $this->TAXP->CurrentValue;
		$row['BATCHNO'] = $this->BATCHNO->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['RQ'] = $this->RQ->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['SALQTY'] = $this->SALQTY->CurrentValue;
		$row['LASTPURDT'] = $this->LASTPURDT->CurrentValue;
		$row['LASTSUPP'] = $this->LASTSUPP->CurrentValue;
		$row['GENNAME'] = $this->GENNAME->CurrentValue;
		$row['LASTISSDT'] = $this->LASTISSDT->CurrentValue;
		$row['CREATEDDT'] = $this->CREATEDDT->CurrentValue;
		$row['OPPRC'] = $this->OPPRC->CurrentValue;
		$row['RESTRICT'] = $this->RESTRICT->CurrentValue;
		$row['BAWAPRC'] = $this->BAWAPRC->CurrentValue;
		$row['STAXPER'] = $this->STAXPER->CurrentValue;
		$row['TAXTYPE'] = $this->TAXTYPE->CurrentValue;
		$row['OLDTAXP'] = $this->OLDTAXP->CurrentValue;
		$row['TAXUPD'] = $this->TAXUPD->CurrentValue;
		$row['PACKAGE'] = $this->PACKAGE->CurrentValue;
		$row['NEWRT'] = $this->NEWRT->CurrentValue;
		$row['NEWMRP'] = $this->NEWMRP->CurrentValue;
		$row['NEWUR'] = $this->NEWUR->CurrentValue;
		$row['STATUS'] = $this->STATUS->CurrentValue;
		$row['RETNQTY'] = $this->RETNQTY->CurrentValue;
		$row['KEMODISC'] = $this->KEMODISC->CurrentValue;
		$row['PATSALE'] = $this->PATSALE->CurrentValue;
		$row['ORGAN'] = $this->ORGAN->CurrentValue;
		$row['OLDRQ'] = $this->OLDRQ->CurrentValue;
		$row['DRID'] = $this->DRID->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['COMBCODE'] = $this->COMBCODE->CurrentValue;
		$row['GENCODE'] = $this->GENCODE->CurrentValue;
		$row['STRENGTH'] = $this->STRENGTH->CurrentValue;
		$row['UNIT'] = $this->UNIT->CurrentValue;
		$row['FORMULARY'] = $this->FORMULARY->CurrentValue;
		$row['STOCK'] = $this->STOCK->CurrentValue;
		$row['RACKNO'] = $this->RACKNO->CurrentValue;
		$row['SUPPNAME'] = $this->SUPPNAME->CurrentValue;
		$row['COMBNAME'] = $this->COMBNAME->CurrentValue;
		$row['GENERICNAME'] = $this->GENERICNAME->CurrentValue;
		$row['REMARK'] = $this->REMARK->CurrentValue;
		$row['TEMP'] = $this->TEMP->CurrentValue;
		$row['PACKING'] = $this->PACKING->CurrentValue;
		$row['PhysQty'] = $this->PhysQty->CurrentValue;
		$row['LedQty'] = $this->LedQty->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['SaleValue'] = $this->SaleValue->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['SaleRate'] = $this->SaleRate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['BRNAME'] = $this->BRNAME->CurrentValue;
		$row['OV'] = $this->OV->CurrentValue;
		$row['LATESTOV'] = $this->LATESTOV->CurrentValue;
		$row['ITEMTYPE'] = $this->ITEMTYPE->CurrentValue;
		$row['ROWID'] = $this->ROWID->CurrentValue;
		$row['MOVED'] = $this->MOVED->CurrentValue;
		$row['NEWTAX'] = $this->NEWTAX->CurrentValue;
		$row['HSNCODE'] = $this->HSNCODE->CurrentValue;
		$row['OLDTAX'] = $this->OLDTAX->CurrentValue;
		$row['Scheduling'] = $this->Scheduling->CurrentValue;
		$row['Schedulingh1'] = $this->Schedulingh1->CurrentValue;
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
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue)))
			$this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue)))
			$this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue)))
			$this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BRCODE
		// PRC
		// TYPE
		// DES
		// UM
		// RT
		// UR
		// TAXP
		// BATCHNO
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// SALQTY
		// LASTPURDT
		// LASTSUPP
		// GENNAME
		// LASTISSDT
		// CREATEDDT
		// OPPRC
		// RESTRICT
		// BAWAPRC
		// STAXPER
		// TAXTYPE
		// OLDTAXP
		// TAXUPD
		// PACKAGE
		// NEWRT
		// NEWMRP
		// NEWUR
		// STATUS
		// RETNQTY
		// KEMODISC
		// PATSALE
		// ORGAN
		// OLDRQ
		// DRID
		// MFRCODE
		// COMBCODE
		// GENCODE
		// STRENGTH
		// UNIT
		// FORMULARY
		// STOCK
		// RACKNO
		// SUPPNAME
		// COMBNAME
		// GENERICNAME
		// REMARK
		// TEMP
		// PACKING
		// PhysQty
		// LedQty
		// id
		// PurValue
		// PSGST
		// PCGST
		// SaleValue
		// SSGST
		// SCGST
		// SaleRate
		// HospID
		// BRNAME
		// OV

		$this->OV->CellCssStyle = "white-space: nowrap;";

		// LATESTOV
		$this->LATESTOV->CellCssStyle = "white-space: nowrap;";

		// ITEMTYPE
		$this->ITEMTYPE->CellCssStyle = "white-space: nowrap;";

		// ROWID
		$this->ROWID->CellCssStyle = "white-space: nowrap;";

		// MOVED
		$this->MOVED->CellCssStyle = "white-space: nowrap;";

		// NEWTAX
		$this->NEWTAX->CellCssStyle = "white-space: nowrap;";

		// HSNCODE
		$this->HSNCODE->CellCssStyle = "white-space: nowrap;";

		// OLDTAX
		$this->OLDTAX->CellCssStyle = "white-space: nowrap;";

		// Scheduling
		// Schedulingh1

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// TYPE
			if (strval($this->TYPE->CurrentValue) <> "") {
				$this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
			} else {
				$this->TYPE->ViewValue = NULL;
			}
			$this->TYPE->ViewCustomAttributes = "";

			// DES
			$this->DES->ViewValue = $this->DES->CurrentValue;
			$this->DES->ViewCustomAttributes = "";

			// UM
			$this->UM->ViewValue = $this->UM->CurrentValue;
			$this->UM->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// LASTPURDT
			$this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
			$this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
			$this->LASTPURDT->ViewCustomAttributes = "";

			// LASTSUPP
			$curVal = strval($this->LASTSUPP->CurrentValue);
			if ($curVal <> "") {
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
				if ($this->LASTSUPP->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->LASTSUPP->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
					}
				}
			} else {
				$this->LASTSUPP->ViewValue = NULL;
			}
			$this->LASTSUPP->ViewCustomAttributes = "";

			// GENNAME
			$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
					}
				}
			} else {
				$this->GENNAME->ViewValue = NULL;
			}
			$this->GENNAME->ViewCustomAttributes = "";

			// LASTISSDT
			$this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
			$this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
			$this->LASTISSDT->ViewCustomAttributes = "";

			// CREATEDDT
			$this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
			$this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
			$this->CREATEDDT->ViewCustomAttributes = "";

			// DRID
			$curVal = strval($this->DRID->CurrentValue);
			if ($curVal <> "") {
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
				if ($this->DRID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DRID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DRID->ViewValue = $this->DRID->CurrentValue;
					}
				}
			} else {
				$this->DRID->ViewValue = NULL;
			}
			$this->DRID->ViewCustomAttributes = "";

			// MFRCODE
			$curVal = strval($this->MFRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
				if ($this->MFRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MFRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
					}
				}
			} else {
				$this->MFRCODE->ViewValue = NULL;
			}
			$this->MFRCODE->ViewCustomAttributes = "";

			// COMBCODE
			$curVal = strval($this->COMBCODE->CurrentValue);
			if ($curVal <> "") {
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
				if ($this->COMBCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
					}
				}
			} else {
				$this->COMBCODE->ViewValue = NULL;
			}
			$this->COMBCODE->ViewCustomAttributes = "";

			// GENCODE
			$curVal = strval($this->GENCODE->CurrentValue);
			if ($curVal <> "") {
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
				if ($this->GENCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
					}
				}
			} else {
				$this->GENCODE->ViewValue = NULL;
			}
			$this->GENCODE->ViewCustomAttributes = "";

			// STRENGTH
			$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
			$this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
			$this->STRENGTH->ViewCustomAttributes = "";

			// UNIT
			if (strval($this->UNIT->CurrentValue) <> "") {
				$this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
			} else {
				$this->UNIT->ViewValue = NULL;
			}
			$this->UNIT->ViewCustomAttributes = "";

			// FORMULARY
			if (strval($this->FORMULARY->CurrentValue) <> "") {
				$this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
			} else {
				$this->FORMULARY->ViewValue = NULL;
			}
			$this->FORMULARY->ViewCustomAttributes = "";

			// RACKNO
			$this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
			$this->RACKNO->ViewCustomAttributes = "";

			// SUPPNAME
			$curVal = strval($this->SUPPNAME->CurrentValue);
			if ($curVal <> "") {
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
				if ($this->SUPPNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SUPPNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
					}
				}
			} else {
				$this->SUPPNAME->ViewValue = NULL;
			}
			$this->SUPPNAME->ViewCustomAttributes = "";

			// COMBNAME
			$curVal = strval($this->COMBNAME->CurrentValue);
			if ($curVal <> "") {
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
				if ($this->COMBNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
					}
				}
			} else {
				$this->COMBNAME->ViewValue = NULL;
			}
			$this->COMBNAME->ViewCustomAttributes = "";

			// GENERICNAME
			$curVal = strval($this->GENERICNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
				if ($this->GENERICNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENERICNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
					}
				}
			} else {
				$this->GENERICNAME->ViewValue = NULL;
			}
			$this->GENERICNAME->ViewCustomAttributes = "";

			// REMARK
			$this->REMARK->ViewValue = $this->REMARK->CurrentValue;
			$this->REMARK->ViewCustomAttributes = "";

			// TEMP
			$this->TEMP->ViewValue = $this->TEMP->CurrentValue;
			$this->TEMP->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SaleValue
			$this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
			$this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
			$this->SaleValue->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// SaleRate
			$this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
			$this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
			$this->SaleRate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// Scheduling
			if (strval($this->Scheduling->CurrentValue) <> "") {
				$this->Scheduling->ViewValue = $this->Scheduling->optionCaption($this->Scheduling->CurrentValue);
			} else {
				$this->Scheduling->ViewValue = NULL;
			}
			$this->Scheduling->ViewCustomAttributes = "";

			// Schedulingh1
			if (strval($this->Schedulingh1->CurrentValue) <> "") {
				$this->Schedulingh1->ViewValue = $this->Schedulingh1->optionCaption($this->Schedulingh1->CurrentValue);
			} else {
				$this->Schedulingh1->ViewValue = NULL;
			}
			$this->Schedulingh1->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";
			if (!$this->isExport())
				$this->BRCODE->ViewValue = $this->highlightValue($this->BRCODE);

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";
			if (!$this->isExport())
				$this->PRC->ViewValue = $this->highlightValue($this->PRC);

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";
			$this->TYPE->TooltipValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";
			$this->DES->TooltipValue = "";
			if (!$this->isExport())
				$this->DES->ViewValue = $this->highlightValue($this->DES);

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";
			$this->UM->TooltipValue = "";
			if (!$this->isExport())
				$this->UM->ViewValue = $this->highlightValue($this->UM);

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";
			if (!$this->isExport())
				$this->BATCHNO->ViewValue = $this->highlightValue($this->BATCHNO);

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";
			if (!$this->isExport())
				$this->GENNAME->ViewValue = $this->highlightValue($this->GENNAME);

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";
			$this->CREATEDDT->TooltipValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";
			$this->DRID->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";
			$this->COMBCODE->TooltipValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";
			$this->GENCODE->TooltipValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";
			$this->STRENGTH->TooltipValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";
			$this->UNIT->TooltipValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";
			$this->FORMULARY->TooltipValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";
			$this->COMBNAME->TooltipValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";
			$this->GENERICNAME->TooltipValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";
			$this->REMARK->TooltipValue = "";
			if (!$this->isExport())
				$this->REMARK->ViewValue = $this->highlightValue($this->REMARK);

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";
			$this->TEMP->TooltipValue = "";
			if (!$this->isExport())
				$this->TEMP->ViewValue = $this->highlightValue($this->TEMP);

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";
			$this->SaleValue->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";
			$this->SaleRate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";
			if (!$this->isExport())
				$this->BRNAME->ViewValue = $this->highlightValue($this->BRNAME);

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";
			$this->Scheduling->TooltipValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
			$this->Schedulingh1->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
			$this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
			$this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->EditValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// CREATEDDT
			// DRID

			$this->DRID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DRID->CurrentValue));
			if ($curVal <> "")
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
			else
				$this->DRID->ViewValue = $this->DRID->Lookup !== NULL && is_array($this->DRID->Lookup->Options) ? $curVal : NULL;
			if ($this->DRID->ViewValue !== NULL) { // Load from cache
				$this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
				if ($this->DRID->ViewValue == "")
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DRID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DRID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
				} else {
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DRID->EditValue = $arwrk;
			}

			// MFRCODE
			$this->MFRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->MFRCODE->CurrentValue));
			if ($curVal <> "")
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			else
				$this->MFRCODE->ViewValue = $this->MFRCODE->Lookup !== NULL && is_array($this->MFRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->MFRCODE->ViewValue !== NULL) { // Load from cache
				$this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
				if ($this->MFRCODE->ViewValue == "")
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MFRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
				} else {
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MFRCODE->EditValue = $arwrk;
			}

			// COMBCODE
			$this->COMBCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBCODE->CurrentValue));
			if ($curVal <> "")
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			else
				$this->COMBCODE->ViewValue = $this->COMBCODE->Lookup !== NULL && is_array($this->COMBCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBCODE->ViewValue !== NULL) { // Load from cache
				$this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
				if ($this->COMBCODE->ViewValue == "")
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
				} else {
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBCODE->EditValue = $arwrk;
			}

			// GENCODE
			$this->GENCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENCODE->CurrentValue));
			if ($curVal <> "")
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			else
				$this->GENCODE->ViewValue = $this->GENCODE->Lookup !== NULL && is_array($this->GENCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->GENCODE->ViewValue !== NULL) { // Load from cache
				$this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
				if ($this->GENCODE->ViewValue == "")
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
				} else {
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENCODE->EditValue = $arwrk;
			}

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
			if (strval($this->STRENGTH->EditValue) <> "" && is_numeric($this->STRENGTH->EditValue))
				$this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);

			// UNIT
			$this->UNIT->EditAttrs["class"] = "form-control";
			$this->UNIT->EditCustomAttributes = "";
			$this->UNIT->EditValue = $this->UNIT->options(TRUE);

			// FORMULARY
			$this->FORMULARY->EditAttrs["class"] = "form-control";
			$this->FORMULARY->EditCustomAttributes = "";
			$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->CurrentValue));
			if ($curVal <> "")
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->ViewValue == "")
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->CurrentValue));
			if ($curVal <> "")
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->ViewValue == "")
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->CurrentValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->CurrentValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// id
			// PurValue

			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->CurrentValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
			if (strval($this->SaleValue->EditValue) <> "" && is_numeric($this->SaleValue->EditValue))
				$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->CurrentValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
			if (strval($this->SaleRate->EditValue) <> "" && is_numeric($this->SaleRate->EditValue))
				$this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);

			// HospID
			// BRNAME
			// Scheduling

			$this->Scheduling->EditCustomAttributes = "";
			$this->Scheduling->EditValue = $this->Scheduling->options(FALSE);

			// Schedulingh1
			$this->Schedulingh1->EditCustomAttributes = "";
			$this->Schedulingh1->EditValue = $this->Schedulingh1->options(FALSE);

			// Add refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
			$this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
			$this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->EditValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// CREATEDDT
			// DRID

			$this->DRID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DRID->CurrentValue));
			if ($curVal <> "")
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
			else
				$this->DRID->ViewValue = $this->DRID->Lookup !== NULL && is_array($this->DRID->Lookup->Options) ? $curVal : NULL;
			if ($this->DRID->ViewValue !== NULL) { // Load from cache
				$this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
				if ($this->DRID->ViewValue == "")
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DRID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DRID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
				} else {
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DRID->EditValue = $arwrk;
			}

			// MFRCODE
			$this->MFRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->MFRCODE->CurrentValue));
			if ($curVal <> "")
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			else
				$this->MFRCODE->ViewValue = $this->MFRCODE->Lookup !== NULL && is_array($this->MFRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->MFRCODE->ViewValue !== NULL) { // Load from cache
				$this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
				if ($this->MFRCODE->ViewValue == "")
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MFRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
				} else {
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MFRCODE->EditValue = $arwrk;
			}

			// COMBCODE
			$this->COMBCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBCODE->CurrentValue));
			if ($curVal <> "")
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			else
				$this->COMBCODE->ViewValue = $this->COMBCODE->Lookup !== NULL && is_array($this->COMBCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBCODE->ViewValue !== NULL) { // Load from cache
				$this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
				if ($this->COMBCODE->ViewValue == "")
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
				} else {
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBCODE->EditValue = $arwrk;
			}

			// GENCODE
			$this->GENCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENCODE->CurrentValue));
			if ($curVal <> "")
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			else
				$this->GENCODE->ViewValue = $this->GENCODE->Lookup !== NULL && is_array($this->GENCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->GENCODE->ViewValue !== NULL) { // Load from cache
				$this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
				if ($this->GENCODE->ViewValue == "")
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
				} else {
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENCODE->EditValue = $arwrk;
			}

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
			if (strval($this->STRENGTH->EditValue) <> "" && is_numeric($this->STRENGTH->EditValue))
				$this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);

			// UNIT
			$this->UNIT->EditAttrs["class"] = "form-control";
			$this->UNIT->EditCustomAttributes = "";
			$this->UNIT->EditValue = $this->UNIT->options(TRUE);

			// FORMULARY
			$this->FORMULARY->EditAttrs["class"] = "form-control";
			$this->FORMULARY->EditCustomAttributes = "";
			$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->CurrentValue));
			if ($curVal <> "")
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->ViewValue == "")
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->CurrentValue));
			if ($curVal <> "")
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->ViewValue == "")
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->CurrentValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->CurrentValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->CurrentValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
			if (strval($this->SaleValue->EditValue) <> "" && is_numeric($this->SaleValue->EditValue))
				$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->CurrentValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
			if (strval($this->SaleRate->EditValue) <> "" && is_numeric($this->SaleRate->EditValue))
				$this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);

			// HospID
			// BRNAME
			// Scheduling

			$this->Scheduling->EditCustomAttributes = "";
			$this->Scheduling->EditValue = $this->Scheduling->options(FALSE);

			// Schedulingh1
			$this->Schedulingh1->EditCustomAttributes = "";
			$this->Schedulingh1->EditValue = $this->Schedulingh1->options(FALSE);

			// Edit refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DES->AdvancedSearch->SearchValue = HtmlDecode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->EditValue = HtmlEncode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
			$curVal = strval($this->GENNAME->AdvancedSearch->SearchValue);
			if ($curVal <> "") {
				$this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->EditValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// CREATEDDT
			$this->CREATEDDT->EditAttrs["class"] = "form-control";
			$this->CREATEDDT->EditCustomAttributes = "";
			$this->CREATEDDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CREATEDDT->AdvancedSearch->SearchValue, 0), 8));
			$this->CREATEDDT->PlaceHolder = RemoveHtml($this->CREATEDDT->caption());

			// DRID
			$this->DRID->EditAttrs["class"] = "form-control";
			$this->DRID->EditCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";

			// COMBCODE
			$this->COMBCODE->EditAttrs["class"] = "form-control";
			$this->COMBCODE->EditCustomAttributes = "";

			// GENCODE
			$this->GENCODE->EditAttrs["class"] = "form-control";
			$this->GENCODE->EditCustomAttributes = "";

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->AdvancedSearch->SearchValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());

			// UNIT
			$this->UNIT->EditAttrs["class"] = "form-control";
			$this->UNIT->EditCustomAttributes = "";
			$this->UNIT->EditValue = $this->UNIT->options(TRUE);

			// FORMULARY
			$this->FORMULARY->EditAttrs["class"] = "form-control";
			$this->FORMULARY->EditCustomAttributes = "";
			$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->AdvancedSearch->ViewValue == "")
					$this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->AdvancedSearch->ViewValue == "")
					$this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->REMARK->AdvancedSearch->SearchValue = HtmlDecode($this->REMARK->AdvancedSearch->SearchValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->AdvancedSearch->SearchValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMP->AdvancedSearch->SearchValue = HtmlDecode($this->TEMP->AdvancedSearch->SearchValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->AdvancedSearch->SearchValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

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

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->AdvancedSearch->SearchValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());

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

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->AdvancedSearch->SearchValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// BRNAME
			$this->BRNAME->EditAttrs["class"] = "form-control";
			$this->BRNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BRNAME->AdvancedSearch->SearchValue = HtmlDecode($this->BRNAME->AdvancedSearch->SearchValue);
			$this->BRNAME->EditValue = HtmlEncode($this->BRNAME->AdvancedSearch->SearchValue);
			$this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

			// Scheduling
			$this->Scheduling->EditCustomAttributes = "";
			$this->Scheduling->EditValue = $this->Scheduling->options(FALSE);

			// Schedulingh1
			$this->Schedulingh1->EditCustomAttributes = "";
			$this->Schedulingh1->EditValue = $this->Schedulingh1->options(FALSE);
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
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DES->Required) {
			if (!$this->DES->IsDetailKey && $this->DES->FormValue != NULL && $this->DES->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DES->caption(), $this->DES->RequiredErrorMessage));
			}
		}
		if ($this->UM->Required) {
			if (!$this->UM->IsDetailKey && $this->UM->FormValue != NULL && $this->UM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
			}
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
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
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->SALQTY->Required) {
			if (!$this->SALQTY->IsDetailKey && $this->SALQTY->FormValue != NULL && $this->SALQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SALQTY->caption(), $this->SALQTY->RequiredErrorMessage));
			}
		}
		if ($this->LASTPURDT->Required) {
			if (!$this->LASTPURDT->IsDetailKey && $this->LASTPURDT->FormValue != NULL && $this->LASTPURDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTPURDT->caption(), $this->LASTPURDT->RequiredErrorMessage));
			}
		}
		if ($this->LASTSUPP->Required) {
			if (!$this->LASTSUPP->IsDetailKey && $this->LASTSUPP->FormValue != NULL && $this->LASTSUPP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTSUPP->caption(), $this->LASTSUPP->RequiredErrorMessage));
			}
		}
		if ($this->GENNAME->Required) {
			if (!$this->GENNAME->IsDetailKey && $this->GENNAME->FormValue != NULL && $this->GENNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
			}
		}
		if ($this->LASTISSDT->Required) {
			if (!$this->LASTISSDT->IsDetailKey && $this->LASTISSDT->FormValue != NULL && $this->LASTISSDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTISSDT->caption(), $this->LASTISSDT->RequiredErrorMessage));
			}
		}
		if ($this->CREATEDDT->Required) {
			if (!$this->CREATEDDT->IsDetailKey && $this->CREATEDDT->FormValue != NULL && $this->CREATEDDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CREATEDDT->caption(), $this->CREATEDDT->RequiredErrorMessage));
			}
		}
		if ($this->OPPRC->Required) {
			if (!$this->OPPRC->IsDetailKey && $this->OPPRC->FormValue != NULL && $this->OPPRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPPRC->caption(), $this->OPPRC->RequiredErrorMessage));
			}
		}
		if ($this->RESTRICT->Required) {
			if (!$this->RESTRICT->IsDetailKey && $this->RESTRICT->FormValue != NULL && $this->RESTRICT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RESTRICT->caption(), $this->RESTRICT->RequiredErrorMessage));
			}
		}
		if ($this->BAWAPRC->Required) {
			if (!$this->BAWAPRC->IsDetailKey && $this->BAWAPRC->FormValue != NULL && $this->BAWAPRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BAWAPRC->caption(), $this->BAWAPRC->RequiredErrorMessage));
			}
		}
		if ($this->STAXPER->Required) {
			if (!$this->STAXPER->IsDetailKey && $this->STAXPER->FormValue != NULL && $this->STAXPER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAXPER->caption(), $this->STAXPER->RequiredErrorMessage));
			}
		}
		if ($this->TAXTYPE->Required) {
			if (!$this->TAXTYPE->IsDetailKey && $this->TAXTYPE->FormValue != NULL && $this->TAXTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXTYPE->caption(), $this->TAXTYPE->RequiredErrorMessage));
			}
		}
		if ($this->OLDTAXP->Required) {
			if (!$this->OLDTAXP->IsDetailKey && $this->OLDTAXP->FormValue != NULL && $this->OLDTAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDTAXP->caption(), $this->OLDTAXP->RequiredErrorMessage));
			}
		}
		if ($this->TAXUPD->Required) {
			if (!$this->TAXUPD->IsDetailKey && $this->TAXUPD->FormValue != NULL && $this->TAXUPD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXUPD->caption(), $this->TAXUPD->RequiredErrorMessage));
			}
		}
		if ($this->PACKAGE->Required) {
			if (!$this->PACKAGE->IsDetailKey && $this->PACKAGE->FormValue != NULL && $this->PACKAGE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PACKAGE->caption(), $this->PACKAGE->RequiredErrorMessage));
			}
		}
		if ($this->NEWRT->Required) {
			if (!$this->NEWRT->IsDetailKey && $this->NEWRT->FormValue != NULL && $this->NEWRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWRT->caption(), $this->NEWRT->RequiredErrorMessage));
			}
		}
		if ($this->NEWMRP->Required) {
			if (!$this->NEWMRP->IsDetailKey && $this->NEWMRP->FormValue != NULL && $this->NEWMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWMRP->caption(), $this->NEWMRP->RequiredErrorMessage));
			}
		}
		if ($this->NEWUR->Required) {
			if (!$this->NEWUR->IsDetailKey && $this->NEWUR->FormValue != NULL && $this->NEWUR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWUR->caption(), $this->NEWUR->RequiredErrorMessage));
			}
		}
		if ($this->STATUS->Required) {
			if (!$this->STATUS->IsDetailKey && $this->STATUS->FormValue != NULL && $this->STATUS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STATUS->caption(), $this->STATUS->RequiredErrorMessage));
			}
		}
		if ($this->RETNQTY->Required) {
			if (!$this->RETNQTY->IsDetailKey && $this->RETNQTY->FormValue != NULL && $this->RETNQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RETNQTY->caption(), $this->RETNQTY->RequiredErrorMessage));
			}
		}
		if ($this->KEMODISC->Required) {
			if (!$this->KEMODISC->IsDetailKey && $this->KEMODISC->FormValue != NULL && $this->KEMODISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->KEMODISC->caption(), $this->KEMODISC->RequiredErrorMessage));
			}
		}
		if ($this->PATSALE->Required) {
			if (!$this->PATSALE->IsDetailKey && $this->PATSALE->FormValue != NULL && $this->PATSALE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PATSALE->caption(), $this->PATSALE->RequiredErrorMessage));
			}
		}
		if ($this->ORGAN->Required) {
			if (!$this->ORGAN->IsDetailKey && $this->ORGAN->FormValue != NULL && $this->ORGAN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ORGAN->caption(), $this->ORGAN->RequiredErrorMessage));
			}
		}
		if ($this->OLDRQ->Required) {
			if (!$this->OLDRQ->IsDetailKey && $this->OLDRQ->FormValue != NULL && $this->OLDRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRQ->caption(), $this->OLDRQ->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->COMBCODE->Required) {
			if (!$this->COMBCODE->IsDetailKey && $this->COMBCODE->FormValue != NULL && $this->COMBCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBCODE->caption(), $this->COMBCODE->RequiredErrorMessage));
			}
		}
		if ($this->GENCODE->Required) {
			if (!$this->GENCODE->IsDetailKey && $this->GENCODE->FormValue != NULL && $this->GENCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENCODE->caption(), $this->GENCODE->RequiredErrorMessage));
			}
		}
		if ($this->STRENGTH->Required) {
			if (!$this->STRENGTH->IsDetailKey && $this->STRENGTH->FormValue != NULL && $this->STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STRENGTH->caption(), $this->STRENGTH->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->STRENGTH->FormValue)) {
			AddMessage($FormError, $this->STRENGTH->errorMessage());
		}
		if ($this->UNIT->Required) {
			if (!$this->UNIT->IsDetailKey && $this->UNIT->FormValue != NULL && $this->UNIT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UNIT->caption(), $this->UNIT->RequiredErrorMessage));
			}
		}
		if ($this->FORMULARY->Required) {
			if (!$this->FORMULARY->IsDetailKey && $this->FORMULARY->FormValue != NULL && $this->FORMULARY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FORMULARY->caption(), $this->FORMULARY->RequiredErrorMessage));
			}
		}
		if ($this->STOCK->Required) {
			if (!$this->STOCK->IsDetailKey && $this->STOCK->FormValue != NULL && $this->STOCK->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STOCK->caption(), $this->STOCK->RequiredErrorMessage));
			}
		}
		if ($this->RACKNO->Required) {
			if (!$this->RACKNO->IsDetailKey && $this->RACKNO->FormValue != NULL && $this->RACKNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RACKNO->caption(), $this->RACKNO->RequiredErrorMessage));
			}
		}
		if ($this->SUPPNAME->Required) {
			if (!$this->SUPPNAME->IsDetailKey && $this->SUPPNAME->FormValue != NULL && $this->SUPPNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUPPNAME->caption(), $this->SUPPNAME->RequiredErrorMessage));
			}
		}
		if ($this->COMBNAME->Required) {
			if (!$this->COMBNAME->IsDetailKey && $this->COMBNAME->FormValue != NULL && $this->COMBNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBNAME->caption(), $this->COMBNAME->RequiredErrorMessage));
			}
		}
		if ($this->GENERICNAME->Required) {
			if (!$this->GENERICNAME->IsDetailKey && $this->GENERICNAME->FormValue != NULL && $this->GENERICNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENERICNAME->caption(), $this->GENERICNAME->RequiredErrorMessage));
			}
		}
		if ($this->REMARK->Required) {
			if (!$this->REMARK->IsDetailKey && $this->REMARK->FormValue != NULL && $this->REMARK->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REMARK->caption(), $this->REMARK->RequiredErrorMessage));
			}
		}
		if ($this->TEMP->Required) {
			if (!$this->TEMP->IsDetailKey && $this->TEMP->FormValue != NULL && $this->TEMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMP->caption(), $this->TEMP->RequiredErrorMessage));
			}
		}
		if ($this->PACKING->Required) {
			if (!$this->PACKING->IsDetailKey && $this->PACKING->FormValue != NULL && $this->PACKING->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PACKING->caption(), $this->PACKING->RequiredErrorMessage));
			}
		}
		if ($this->PhysQty->Required) {
			if (!$this->PhysQty->IsDetailKey && $this->PhysQty->FormValue != NULL && $this->PhysQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PhysQty->caption(), $this->PhysQty->RequiredErrorMessage));
			}
		}
		if ($this->LedQty->Required) {
			if (!$this->LedQty->IsDetailKey && $this->LedQty->FormValue != NULL && $this->LedQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LedQty->caption(), $this->LedQty->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
		}
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PSGST->FormValue)) {
			AddMessage($FormError, $this->PSGST->errorMessage());
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PCGST->FormValue)) {
			AddMessage($FormError, $this->PCGST->errorMessage());
		}
		if ($this->SaleValue->Required) {
			if (!$this->SaleValue->IsDetailKey && $this->SaleValue->FormValue != NULL && $this->SaleValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleValue->caption(), $this->SaleValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleValue->FormValue)) {
			AddMessage($FormError, $this->SaleValue->errorMessage());
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SSGST->FormValue)) {
			AddMessage($FormError, $this->SSGST->errorMessage());
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SCGST->FormValue)) {
			AddMessage($FormError, $this->SCGST->errorMessage());
		}
		if ($this->SaleRate->Required) {
			if (!$this->SaleRate->IsDetailKey && $this->SaleRate->FormValue != NULL && $this->SaleRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleRate->caption(), $this->SaleRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleRate->FormValue)) {
			AddMessage($FormError, $this->SaleRate->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
			}
		}
		if ($this->OV->Required) {
			if (!$this->OV->IsDetailKey && $this->OV->FormValue != NULL && $this->OV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OV->caption(), $this->OV->RequiredErrorMessage));
			}
		}
		if ($this->LATESTOV->Required) {
			if (!$this->LATESTOV->IsDetailKey && $this->LATESTOV->FormValue != NULL && $this->LATESTOV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LATESTOV->caption(), $this->LATESTOV->RequiredErrorMessage));
			}
		}
		if ($this->ITEMTYPE->Required) {
			if (!$this->ITEMTYPE->IsDetailKey && $this->ITEMTYPE->FormValue != NULL && $this->ITEMTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ITEMTYPE->caption(), $this->ITEMTYPE->RequiredErrorMessage));
			}
		}
		if ($this->ROWID->Required) {
			if (!$this->ROWID->IsDetailKey && $this->ROWID->FormValue != NULL && $this->ROWID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ROWID->caption(), $this->ROWID->RequiredErrorMessage));
			}
		}
		if ($this->MOVED->Required) {
			if (!$this->MOVED->IsDetailKey && $this->MOVED->FormValue != NULL && $this->MOVED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MOVED->caption(), $this->MOVED->RequiredErrorMessage));
			}
		}
		if ($this->NEWTAX->Required) {
			if (!$this->NEWTAX->IsDetailKey && $this->NEWTAX->FormValue != NULL && $this->NEWTAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWTAX->caption(), $this->NEWTAX->RequiredErrorMessage));
			}
		}
		if ($this->HSNCODE->Required) {
			if (!$this->HSNCODE->IsDetailKey && $this->HSNCODE->FormValue != NULL && $this->HSNCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
			}
		}
		if ($this->OLDTAX->Required) {
			if (!$this->OLDTAX->IsDetailKey && $this->OLDTAX->FormValue != NULL && $this->OLDTAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDTAX->caption(), $this->OLDTAX->RequiredErrorMessage));
			}
		}
		if ($this->Scheduling->Required) {
			if ($this->Scheduling->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Scheduling->caption(), $this->Scheduling->RequiredErrorMessage));
			}
		}
		if ($this->Schedulingh1->Required) {
			if ($this->Schedulingh1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Schedulingh1->caption(), $this->Schedulingh1->RequiredErrorMessage));
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
		if ($this->PRC->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`PRC` = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
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

			// TYPE
			$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, $this->TYPE->ReadOnly);

			// DES
			$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, $this->DES->ReadOnly);

			// UM
			$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, $this->UM->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// GENNAME
			$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, $this->GENNAME->ReadOnly);

			// CREATEDDT
			$this->CREATEDDT->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['CREATEDDT'] = &$this->CREATEDDT->DbValue;

			// DRID
			$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, $this->DRID->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// COMBCODE
			$this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, NULL, $this->COMBCODE->ReadOnly);

			// GENCODE
			$this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, NULL, $this->GENCODE->ReadOnly);

			// STRENGTH
			$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, $this->STRENGTH->ReadOnly);

			// UNIT
			$this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, NULL, $this->UNIT->ReadOnly);

			// FORMULARY
			$this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, NULL, $this->FORMULARY->ReadOnly);

			// COMBNAME
			$this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, NULL, $this->COMBNAME->ReadOnly);

			// GENERICNAME
			$this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, NULL, $this->GENERICNAME->ReadOnly);

			// REMARK
			$this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, NULL, $this->REMARK->ReadOnly);

			// TEMP
			$this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, NULL, $this->TEMP->ReadOnly);

			// PurValue
			$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, $this->PurValue->ReadOnly);

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SaleValue
			$this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, NULL, $this->SaleValue->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// SaleRate
			$this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, NULL, $this->SaleRate->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// BRNAME
			$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

			// Scheduling
			$this->Scheduling->setDbValueDef($rsnew, $this->Scheduling->CurrentValue, NULL, $this->Scheduling->ReadOnly);

			// Schedulingh1
			$this->Schedulingh1->setDbValueDef($rsnew, $this->Schedulingh1->CurrentValue, NULL, $this->Schedulingh1->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('TYPE')); // TYPE
		$hash .= GetFieldHash($rs->fields('DES')); // DES
		$hash .= GetFieldHash($rs->fields('UM')); // UM
		$hash .= GetFieldHash($rs->fields('RT')); // RT
		$hash .= GetFieldHash($rs->fields('BATCHNO')); // BATCHNO
		$hash .= GetFieldHash($rs->fields('MRP')); // MRP
		$hash .= GetFieldHash($rs->fields('EXPDT')); // EXPDT
		$hash .= GetFieldHash($rs->fields('GENNAME')); // GENNAME
		$hash .= GetFieldHash($rs->fields('CREATEDDT')); // CREATEDDT
		$hash .= GetFieldHash($rs->fields('DRID')); // DRID
		$hash .= GetFieldHash($rs->fields('MFRCODE')); // MFRCODE
		$hash .= GetFieldHash($rs->fields('COMBCODE')); // COMBCODE
		$hash .= GetFieldHash($rs->fields('GENCODE')); // GENCODE
		$hash .= GetFieldHash($rs->fields('STRENGTH')); // STRENGTH
		$hash .= GetFieldHash($rs->fields('UNIT')); // UNIT
		$hash .= GetFieldHash($rs->fields('FORMULARY')); // FORMULARY
		$hash .= GetFieldHash($rs->fields('COMBNAME')); // COMBNAME
		$hash .= GetFieldHash($rs->fields('GENERICNAME')); // GENERICNAME
		$hash .= GetFieldHash($rs->fields('REMARK')); // REMARK
		$hash .= GetFieldHash($rs->fields('TEMP')); // TEMP
		$hash .= GetFieldHash($rs->fields('PurValue')); // PurValue
		$hash .= GetFieldHash($rs->fields('PSGST')); // PSGST
		$hash .= GetFieldHash($rs->fields('PCGST')); // PCGST
		$hash .= GetFieldHash($rs->fields('SaleValue')); // SaleValue
		$hash .= GetFieldHash($rs->fields('SSGST')); // SSGST
		$hash .= GetFieldHash($rs->fields('SCGST')); // SCGST
		$hash .= GetFieldHash($rs->fields('SaleRate')); // SaleRate
		$hash .= GetFieldHash($rs->fields('HospID')); // HospID
		$hash .= GetFieldHash($rs->fields('BRNAME')); // BRNAME
		$hash .= GetFieldHash($rs->fields('Scheduling')); // Scheduling
		$hash .= GetFieldHash($rs->fields('Schedulingh1')); // Schedulingh1
		return md5($hash);
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		if ($this->PRC->CurrentValue <> "") { // Check field with unique index
			$filter = "(PRC = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
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

		// TYPE
		$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, FALSE);

		// DES
		$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, FALSE);

		// UM
		$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, strval($this->UM->CurrentValue) == "");

		// RT
		$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, strval($this->RT->CurrentValue) == "");

		// BATCHNO
		$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, FALSE);

		// MRP
		$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, strval($this->MRP->CurrentValue) == "");

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// GENNAME
		$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, FALSE);

		// CREATEDDT
		$this->CREATEDDT->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['CREATEDDT'] = &$this->CREATEDDT->DbValue;

		// DRID
		$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// COMBCODE
		$this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, NULL, FALSE);

		// GENCODE
		$this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, NULL, FALSE);

		// STRENGTH
		$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, strval($this->STRENGTH->CurrentValue) == "");

		// UNIT
		$this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, NULL, FALSE);

		// FORMULARY
		$this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, NULL, FALSE);

		// COMBNAME
		$this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, NULL, FALSE);

		// GENERICNAME
		$this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, NULL, FALSE);

		// REMARK
		$this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, NULL, FALSE);

		// TEMP
		$this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, NULL, FALSE);

		// PurValue
		$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, strval($this->PurValue->CurrentValue) == "");

		// PSGST
		$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, strval($this->PSGST->CurrentValue) == "");

		// PCGST
		$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, strval($this->PCGST->CurrentValue) == "");

		// SaleValue
		$this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, NULL, strval($this->SaleValue->CurrentValue) == "");

		// SSGST
		$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, strval($this->SSGST->CurrentValue) == "");

		// SCGST
		$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, strval($this->SCGST->CurrentValue) == "");

		// SaleRate
		$this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, NULL, strval($this->SaleRate->CurrentValue) == "");

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// BRNAME
		$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

		// Scheduling
		$this->Scheduling->setDbValueDef($rsnew, $this->Scheduling->CurrentValue, NULL, FALSE);

		// Schedulingh1
		$this->Schedulingh1->setDbValueDef($rsnew, $this->Schedulingh1->CurrentValue, NULL, FALSE);

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
		$this->BRCODE->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->TYPE->AdvancedSearch->load();
		$this->DES->AdvancedSearch->load();
		$this->UM->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->UR->AdvancedSearch->load();
		$this->TAXP->AdvancedSearch->load();
		$this->BATCHNO->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->RQ->AdvancedSearch->load();
		$this->MRQ->AdvancedSearch->load();
		$this->IQ->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->SALQTY->AdvancedSearch->load();
		$this->LASTPURDT->AdvancedSearch->load();
		$this->LASTSUPP->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->LASTISSDT->AdvancedSearch->load();
		$this->CREATEDDT->AdvancedSearch->load();
		$this->OPPRC->AdvancedSearch->load();
		$this->RESTRICT->AdvancedSearch->load();
		$this->BAWAPRC->AdvancedSearch->load();
		$this->STAXPER->AdvancedSearch->load();
		$this->TAXTYPE->AdvancedSearch->load();
		$this->OLDTAXP->AdvancedSearch->load();
		$this->TAXUPD->AdvancedSearch->load();
		$this->PACKAGE->AdvancedSearch->load();
		$this->NEWRT->AdvancedSearch->load();
		$this->NEWMRP->AdvancedSearch->load();
		$this->NEWUR->AdvancedSearch->load();
		$this->STATUS->AdvancedSearch->load();
		$this->RETNQTY->AdvancedSearch->load();
		$this->KEMODISC->AdvancedSearch->load();
		$this->PATSALE->AdvancedSearch->load();
		$this->ORGAN->AdvancedSearch->load();
		$this->OLDRQ->AdvancedSearch->load();
		$this->DRID->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->COMBCODE->AdvancedSearch->load();
		$this->GENCODE->AdvancedSearch->load();
		$this->STRENGTH->AdvancedSearch->load();
		$this->UNIT->AdvancedSearch->load();
		$this->FORMULARY->AdvancedSearch->load();
		$this->STOCK->AdvancedSearch->load();
		$this->RACKNO->AdvancedSearch->load();
		$this->SUPPNAME->AdvancedSearch->load();
		$this->COMBNAME->AdvancedSearch->load();
		$this->GENERICNAME->AdvancedSearch->load();
		$this->REMARK->AdvancedSearch->load();
		$this->TEMP->AdvancedSearch->load();
		$this->PACKING->AdvancedSearch->load();
		$this->PhysQty->AdvancedSearch->load();
		$this->LedQty->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SaleValue->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->SaleRate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->BRNAME->AdvancedSearch->load();
		$this->Scheduling->AdvancedSearch->load();
		$this->Schedulingh1->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpharmacy_storemastlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpharmacy_storemastlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpharmacy_storemastlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_pharmacy_storemast\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_pharmacy_storemast',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpharmacy_storemastlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_LASTSUPP":
							break;
						case "x_GENNAME":
							break;
						case "x_DRID":
							break;
						case "x_MFRCODE":
							break;
						case "x_COMBCODE":
							break;
						case "x_GENCODE":
							break;
						case "x_SUPPNAME":
							break;
						case "x_COMBNAME":
							break;
						case "x_GENERICNAME":
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
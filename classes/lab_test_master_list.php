<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_test_master_list extends lab_test_master
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_test_master';

	// Page object name
	public $PageObjName = "lab_test_master_list";

	// Grid form hidden field names
	public $FormName = "flab_test_masterlist";
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

		// Table object (lab_test_master)
		if (!isset($GLOBALS["lab_test_master"]) || get_class($GLOBALS["lab_test_master"]) == PROJECT_NAMESPACE . "lab_test_master") {
			$GLOBALS["lab_test_master"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_test_master"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "lab_test_masteradd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "lab_test_masterdelete.php";
		$this->MultiUpdateUrl = "lab_test_masterupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_master');

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
		$this->FilterOptions->TagClassName = "ew-filter-option flab_test_masterlistsrch";

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
		global $EXPORT, $lab_test_master;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_test_master);
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
		$this->MainDeptCd->setVisibility();
		$this->DeptCd->setVisibility();
		$this->TestCd->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->TestName->setVisibility();
		$this->XrayPart->setVisibility();
		$this->Method->setVisibility();
		$this->Order->setVisibility();
		$this->Form->setVisibility();
		$this->Amt->setVisibility();
		$this->SplAmt->setVisibility();
		$this->ResType->setVisibility();
		$this->UnitCD->setVisibility();
		$this->RefValue->Visible = FALSE;
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->Visible = FALSE;
		$this->Inactive->setVisibility();
		$this->ReagentAmt->setVisibility();
		$this->LabAmt->setVisibility();
		$this->RefAmt->setVisibility();
		$this->CreFrom->setVisibility();
		$this->CreTo->setVisibility();
		$this->Note->Visible = FALSE;
		$this->Sun->setVisibility();
		$this->Mon->setVisibility();
		$this->Tue->setVisibility();
		$this->Wed->setVisibility();
		$this->Thi->setVisibility();
		$this->Fri->setVisibility();
		$this->Sat->setVisibility();
		$this->Days->setVisibility();
		$this->Cutoff->setVisibility();
		$this->FontBold->setVisibility();
		$this->TestHeading->setVisibility();
		$this->Outsource->setVisibility();
		$this->NoResult->setVisibility();
		$this->GraphLow->setVisibility();
		$this->GraphHigh->setVisibility();
		$this->CollSample->setVisibility();
		$this->ProcessTime->setVisibility();
		$this->TamilName->setVisibility();
		$this->ShortName->setVisibility();
		$this->Individual->setVisibility();
		$this->PrevAmt->setVisibility();
		$this->PrevSplAmt->setVisibility();
		$this->Remarks->Visible = FALSE;
		$this->EditDate->setVisibility();
		$this->BillName->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->HISCD->setVisibility();
		$this->PriceList->setVisibility();
		$this->IPAmt->setVisibility();
		$this->InsAmt->setVisibility();
		$this->ManualCD->setVisibility();
		$this->Free->setVisibility();
		$this->AutoAuth->setVisibility();
		$this->ProductCD->setVisibility();
		$this->Inventory->setVisibility();
		$this->IntimateTest->setVisibility();
		$this->Manual->setVisibility();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "flab_test_masterlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->MainDeptCd->AdvancedSearch->toJson(), ","); // Field MainDeptCd
		$filterList = Concat($filterList, $this->DeptCd->AdvancedSearch->toJson(), ","); // Field DeptCd
		$filterList = Concat($filterList, $this->TestCd->AdvancedSearch->toJson(), ","); // Field TestCd
		$filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
		$filterList = Concat($filterList, $this->TestName->AdvancedSearch->toJson(), ","); // Field TestName
		$filterList = Concat($filterList, $this->XrayPart->AdvancedSearch->toJson(), ","); // Field XrayPart
		$filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
		$filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
		$filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
		$filterList = Concat($filterList, $this->Amt->AdvancedSearch->toJson(), ","); // Field Amt
		$filterList = Concat($filterList, $this->SplAmt->AdvancedSearch->toJson(), ","); // Field SplAmt
		$filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
		$filterList = Concat($filterList, $this->UnitCD->AdvancedSearch->toJson(), ","); // Field UnitCD
		$filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
		$filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
		$filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
		$filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
		$filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
		$filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
		$filterList = Concat($filterList, $this->ReagentAmt->AdvancedSearch->toJson(), ","); // Field ReagentAmt
		$filterList = Concat($filterList, $this->LabAmt->AdvancedSearch->toJson(), ","); // Field LabAmt
		$filterList = Concat($filterList, $this->RefAmt->AdvancedSearch->toJson(), ","); // Field RefAmt
		$filterList = Concat($filterList, $this->CreFrom->AdvancedSearch->toJson(), ","); // Field CreFrom
		$filterList = Concat($filterList, $this->CreTo->AdvancedSearch->toJson(), ","); // Field CreTo
		$filterList = Concat($filterList, $this->Note->AdvancedSearch->toJson(), ","); // Field Note
		$filterList = Concat($filterList, $this->Sun->AdvancedSearch->toJson(), ","); // Field Sun
		$filterList = Concat($filterList, $this->Mon->AdvancedSearch->toJson(), ","); // Field Mon
		$filterList = Concat($filterList, $this->Tue->AdvancedSearch->toJson(), ","); // Field Tue
		$filterList = Concat($filterList, $this->Wed->AdvancedSearch->toJson(), ","); // Field Wed
		$filterList = Concat($filterList, $this->Thi->AdvancedSearch->toJson(), ","); // Field Thi
		$filterList = Concat($filterList, $this->Fri->AdvancedSearch->toJson(), ","); // Field Fri
		$filterList = Concat($filterList, $this->Sat->AdvancedSearch->toJson(), ","); // Field Sat
		$filterList = Concat($filterList, $this->Days->AdvancedSearch->toJson(), ","); // Field Days
		$filterList = Concat($filterList, $this->Cutoff->AdvancedSearch->toJson(), ","); // Field Cutoff
		$filterList = Concat($filterList, $this->FontBold->AdvancedSearch->toJson(), ","); // Field FontBold
		$filterList = Concat($filterList, $this->TestHeading->AdvancedSearch->toJson(), ","); // Field TestHeading
		$filterList = Concat($filterList, $this->Outsource->AdvancedSearch->toJson(), ","); // Field Outsource
		$filterList = Concat($filterList, $this->NoResult->AdvancedSearch->toJson(), ","); // Field NoResult
		$filterList = Concat($filterList, $this->GraphLow->AdvancedSearch->toJson(), ","); // Field GraphLow
		$filterList = Concat($filterList, $this->GraphHigh->AdvancedSearch->toJson(), ","); // Field GraphHigh
		$filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
		$filterList = Concat($filterList, $this->ProcessTime->AdvancedSearch->toJson(), ","); // Field ProcessTime
		$filterList = Concat($filterList, $this->TamilName->AdvancedSearch->toJson(), ","); // Field TamilName
		$filterList = Concat($filterList, $this->ShortName->AdvancedSearch->toJson(), ","); // Field ShortName
		$filterList = Concat($filterList, $this->Individual->AdvancedSearch->toJson(), ","); // Field Individual
		$filterList = Concat($filterList, $this->PrevAmt->AdvancedSearch->toJson(), ","); // Field PrevAmt
		$filterList = Concat($filterList, $this->PrevSplAmt->AdvancedSearch->toJson(), ","); // Field PrevSplAmt
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
		$filterList = Concat($filterList, $this->BillName->AdvancedSearch->toJson(), ","); // Field BillName
		$filterList = Concat($filterList, $this->ActualAmt->AdvancedSearch->toJson(), ","); // Field ActualAmt
		$filterList = Concat($filterList, $this->HISCD->AdvancedSearch->toJson(), ","); // Field HISCD
		$filterList = Concat($filterList, $this->PriceList->AdvancedSearch->toJson(), ","); // Field PriceList
		$filterList = Concat($filterList, $this->IPAmt->AdvancedSearch->toJson(), ","); // Field IPAmt
		$filterList = Concat($filterList, $this->InsAmt->AdvancedSearch->toJson(), ","); // Field InsAmt
		$filterList = Concat($filterList, $this->ManualCD->AdvancedSearch->toJson(), ","); // Field ManualCD
		$filterList = Concat($filterList, $this->Free->AdvancedSearch->toJson(), ","); // Field Free
		$filterList = Concat($filterList, $this->AutoAuth->AdvancedSearch->toJson(), ","); // Field AutoAuth
		$filterList = Concat($filterList, $this->ProductCD->AdvancedSearch->toJson(), ","); // Field ProductCD
		$filterList = Concat($filterList, $this->Inventory->AdvancedSearch->toJson(), ","); // Field Inventory
		$filterList = Concat($filterList, $this->IntimateTest->AdvancedSearch->toJson(), ","); // Field IntimateTest
		$filterList = Concat($filterList, $this->Manual->AdvancedSearch->toJson(), ","); // Field Manual
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
			$UserProfile->setSearchFilters(CurrentUserName(), "flab_test_masterlistsrch", $filters);
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

		// Field MainDeptCd
		$this->MainDeptCd->AdvancedSearch->SearchValue = @$filter["x_MainDeptCd"];
		$this->MainDeptCd->AdvancedSearch->SearchOperator = @$filter["z_MainDeptCd"];
		$this->MainDeptCd->AdvancedSearch->SearchCondition = @$filter["v_MainDeptCd"];
		$this->MainDeptCd->AdvancedSearch->SearchValue2 = @$filter["y_MainDeptCd"];
		$this->MainDeptCd->AdvancedSearch->SearchOperator2 = @$filter["w_MainDeptCd"];
		$this->MainDeptCd->AdvancedSearch->save();

		// Field DeptCd
		$this->DeptCd->AdvancedSearch->SearchValue = @$filter["x_DeptCd"];
		$this->DeptCd->AdvancedSearch->SearchOperator = @$filter["z_DeptCd"];
		$this->DeptCd->AdvancedSearch->SearchCondition = @$filter["v_DeptCd"];
		$this->DeptCd->AdvancedSearch->SearchValue2 = @$filter["y_DeptCd"];
		$this->DeptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DeptCd"];
		$this->DeptCd->AdvancedSearch->save();

		// Field TestCd
		$this->TestCd->AdvancedSearch->SearchValue = @$filter["x_TestCd"];
		$this->TestCd->AdvancedSearch->SearchOperator = @$filter["z_TestCd"];
		$this->TestCd->AdvancedSearch->SearchCondition = @$filter["v_TestCd"];
		$this->TestCd->AdvancedSearch->SearchValue2 = @$filter["y_TestCd"];
		$this->TestCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestCd"];
		$this->TestCd->AdvancedSearch->save();

		// Field TestSubCd
		$this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->save();

		// Field TestName
		$this->TestName->AdvancedSearch->SearchValue = @$filter["x_TestName"];
		$this->TestName->AdvancedSearch->SearchOperator = @$filter["z_TestName"];
		$this->TestName->AdvancedSearch->SearchCondition = @$filter["v_TestName"];
		$this->TestName->AdvancedSearch->SearchValue2 = @$filter["y_TestName"];
		$this->TestName->AdvancedSearch->SearchOperator2 = @$filter["w_TestName"];
		$this->TestName->AdvancedSearch->save();

		// Field XrayPart
		$this->XrayPart->AdvancedSearch->SearchValue = @$filter["x_XrayPart"];
		$this->XrayPart->AdvancedSearch->SearchOperator = @$filter["z_XrayPart"];
		$this->XrayPart->AdvancedSearch->SearchCondition = @$filter["v_XrayPart"];
		$this->XrayPart->AdvancedSearch->SearchValue2 = @$filter["y_XrayPart"];
		$this->XrayPart->AdvancedSearch->SearchOperator2 = @$filter["w_XrayPart"];
		$this->XrayPart->AdvancedSearch->save();

		// Field Method
		$this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
		$this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
		$this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
		$this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
		$this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
		$this->Method->AdvancedSearch->save();

		// Field Order
		$this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
		$this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
		$this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
		$this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
		$this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
		$this->Order->AdvancedSearch->save();

		// Field Form
		$this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
		$this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
		$this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
		$this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
		$this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
		$this->Form->AdvancedSearch->save();

		// Field Amt
		$this->Amt->AdvancedSearch->SearchValue = @$filter["x_Amt"];
		$this->Amt->AdvancedSearch->SearchOperator = @$filter["z_Amt"];
		$this->Amt->AdvancedSearch->SearchCondition = @$filter["v_Amt"];
		$this->Amt->AdvancedSearch->SearchValue2 = @$filter["y_Amt"];
		$this->Amt->AdvancedSearch->SearchOperator2 = @$filter["w_Amt"];
		$this->Amt->AdvancedSearch->save();

		// Field SplAmt
		$this->SplAmt->AdvancedSearch->SearchValue = @$filter["x_SplAmt"];
		$this->SplAmt->AdvancedSearch->SearchOperator = @$filter["z_SplAmt"];
		$this->SplAmt->AdvancedSearch->SearchCondition = @$filter["v_SplAmt"];
		$this->SplAmt->AdvancedSearch->SearchValue2 = @$filter["y_SplAmt"];
		$this->SplAmt->AdvancedSearch->SearchOperator2 = @$filter["w_SplAmt"];
		$this->SplAmt->AdvancedSearch->save();

		// Field ResType
		$this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
		$this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
		$this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
		$this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
		$this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
		$this->ResType->AdvancedSearch->save();

		// Field UnitCD
		$this->UnitCD->AdvancedSearch->SearchValue = @$filter["x_UnitCD"];
		$this->UnitCD->AdvancedSearch->SearchOperator = @$filter["z_UnitCD"];
		$this->UnitCD->AdvancedSearch->SearchCondition = @$filter["v_UnitCD"];
		$this->UnitCD->AdvancedSearch->SearchValue2 = @$filter["y_UnitCD"];
		$this->UnitCD->AdvancedSearch->SearchOperator2 = @$filter["w_UnitCD"];
		$this->UnitCD->AdvancedSearch->save();

		// Field RefValue
		$this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
		$this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
		$this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
		$this->RefValue->AdvancedSearch->save();

		// Field Sample
		$this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
		$this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
		$this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
		$this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
		$this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
		$this->Sample->AdvancedSearch->save();

		// Field NoD
		$this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
		$this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
		$this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
		$this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
		$this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
		$this->NoD->AdvancedSearch->save();

		// Field BillOrder
		$this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
		$this->BillOrder->AdvancedSearch->save();

		// Field Formula
		$this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
		$this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
		$this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
		$this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
		$this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
		$this->Formula->AdvancedSearch->save();

		// Field Inactive
		$this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
		$this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
		$this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
		$this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
		$this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
		$this->Inactive->AdvancedSearch->save();

		// Field ReagentAmt
		$this->ReagentAmt->AdvancedSearch->SearchValue = @$filter["x_ReagentAmt"];
		$this->ReagentAmt->AdvancedSearch->SearchOperator = @$filter["z_ReagentAmt"];
		$this->ReagentAmt->AdvancedSearch->SearchCondition = @$filter["v_ReagentAmt"];
		$this->ReagentAmt->AdvancedSearch->SearchValue2 = @$filter["y_ReagentAmt"];
		$this->ReagentAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ReagentAmt"];
		$this->ReagentAmt->AdvancedSearch->save();

		// Field LabAmt
		$this->LabAmt->AdvancedSearch->SearchValue = @$filter["x_LabAmt"];
		$this->LabAmt->AdvancedSearch->SearchOperator = @$filter["z_LabAmt"];
		$this->LabAmt->AdvancedSearch->SearchCondition = @$filter["v_LabAmt"];
		$this->LabAmt->AdvancedSearch->SearchValue2 = @$filter["y_LabAmt"];
		$this->LabAmt->AdvancedSearch->SearchOperator2 = @$filter["w_LabAmt"];
		$this->LabAmt->AdvancedSearch->save();

		// Field RefAmt
		$this->RefAmt->AdvancedSearch->SearchValue = @$filter["x_RefAmt"];
		$this->RefAmt->AdvancedSearch->SearchOperator = @$filter["z_RefAmt"];
		$this->RefAmt->AdvancedSearch->SearchCondition = @$filter["v_RefAmt"];
		$this->RefAmt->AdvancedSearch->SearchValue2 = @$filter["y_RefAmt"];
		$this->RefAmt->AdvancedSearch->SearchOperator2 = @$filter["w_RefAmt"];
		$this->RefAmt->AdvancedSearch->save();

		// Field CreFrom
		$this->CreFrom->AdvancedSearch->SearchValue = @$filter["x_CreFrom"];
		$this->CreFrom->AdvancedSearch->SearchOperator = @$filter["z_CreFrom"];
		$this->CreFrom->AdvancedSearch->SearchCondition = @$filter["v_CreFrom"];
		$this->CreFrom->AdvancedSearch->SearchValue2 = @$filter["y_CreFrom"];
		$this->CreFrom->AdvancedSearch->SearchOperator2 = @$filter["w_CreFrom"];
		$this->CreFrom->AdvancedSearch->save();

		// Field CreTo
		$this->CreTo->AdvancedSearch->SearchValue = @$filter["x_CreTo"];
		$this->CreTo->AdvancedSearch->SearchOperator = @$filter["z_CreTo"];
		$this->CreTo->AdvancedSearch->SearchCondition = @$filter["v_CreTo"];
		$this->CreTo->AdvancedSearch->SearchValue2 = @$filter["y_CreTo"];
		$this->CreTo->AdvancedSearch->SearchOperator2 = @$filter["w_CreTo"];
		$this->CreTo->AdvancedSearch->save();

		// Field Note
		$this->Note->AdvancedSearch->SearchValue = @$filter["x_Note"];
		$this->Note->AdvancedSearch->SearchOperator = @$filter["z_Note"];
		$this->Note->AdvancedSearch->SearchCondition = @$filter["v_Note"];
		$this->Note->AdvancedSearch->SearchValue2 = @$filter["y_Note"];
		$this->Note->AdvancedSearch->SearchOperator2 = @$filter["w_Note"];
		$this->Note->AdvancedSearch->save();

		// Field Sun
		$this->Sun->AdvancedSearch->SearchValue = @$filter["x_Sun"];
		$this->Sun->AdvancedSearch->SearchOperator = @$filter["z_Sun"];
		$this->Sun->AdvancedSearch->SearchCondition = @$filter["v_Sun"];
		$this->Sun->AdvancedSearch->SearchValue2 = @$filter["y_Sun"];
		$this->Sun->AdvancedSearch->SearchOperator2 = @$filter["w_Sun"];
		$this->Sun->AdvancedSearch->save();

		// Field Mon
		$this->Mon->AdvancedSearch->SearchValue = @$filter["x_Mon"];
		$this->Mon->AdvancedSearch->SearchOperator = @$filter["z_Mon"];
		$this->Mon->AdvancedSearch->SearchCondition = @$filter["v_Mon"];
		$this->Mon->AdvancedSearch->SearchValue2 = @$filter["y_Mon"];
		$this->Mon->AdvancedSearch->SearchOperator2 = @$filter["w_Mon"];
		$this->Mon->AdvancedSearch->save();

		// Field Tue
		$this->Tue->AdvancedSearch->SearchValue = @$filter["x_Tue"];
		$this->Tue->AdvancedSearch->SearchOperator = @$filter["z_Tue"];
		$this->Tue->AdvancedSearch->SearchCondition = @$filter["v_Tue"];
		$this->Tue->AdvancedSearch->SearchValue2 = @$filter["y_Tue"];
		$this->Tue->AdvancedSearch->SearchOperator2 = @$filter["w_Tue"];
		$this->Tue->AdvancedSearch->save();

		// Field Wed
		$this->Wed->AdvancedSearch->SearchValue = @$filter["x_Wed"];
		$this->Wed->AdvancedSearch->SearchOperator = @$filter["z_Wed"];
		$this->Wed->AdvancedSearch->SearchCondition = @$filter["v_Wed"];
		$this->Wed->AdvancedSearch->SearchValue2 = @$filter["y_Wed"];
		$this->Wed->AdvancedSearch->SearchOperator2 = @$filter["w_Wed"];
		$this->Wed->AdvancedSearch->save();

		// Field Thi
		$this->Thi->AdvancedSearch->SearchValue = @$filter["x_Thi"];
		$this->Thi->AdvancedSearch->SearchOperator = @$filter["z_Thi"];
		$this->Thi->AdvancedSearch->SearchCondition = @$filter["v_Thi"];
		$this->Thi->AdvancedSearch->SearchValue2 = @$filter["y_Thi"];
		$this->Thi->AdvancedSearch->SearchOperator2 = @$filter["w_Thi"];
		$this->Thi->AdvancedSearch->save();

		// Field Fri
		$this->Fri->AdvancedSearch->SearchValue = @$filter["x_Fri"];
		$this->Fri->AdvancedSearch->SearchOperator = @$filter["z_Fri"];
		$this->Fri->AdvancedSearch->SearchCondition = @$filter["v_Fri"];
		$this->Fri->AdvancedSearch->SearchValue2 = @$filter["y_Fri"];
		$this->Fri->AdvancedSearch->SearchOperator2 = @$filter["w_Fri"];
		$this->Fri->AdvancedSearch->save();

		// Field Sat
		$this->Sat->AdvancedSearch->SearchValue = @$filter["x_Sat"];
		$this->Sat->AdvancedSearch->SearchOperator = @$filter["z_Sat"];
		$this->Sat->AdvancedSearch->SearchCondition = @$filter["v_Sat"];
		$this->Sat->AdvancedSearch->SearchValue2 = @$filter["y_Sat"];
		$this->Sat->AdvancedSearch->SearchOperator2 = @$filter["w_Sat"];
		$this->Sat->AdvancedSearch->save();

		// Field Days
		$this->Days->AdvancedSearch->SearchValue = @$filter["x_Days"];
		$this->Days->AdvancedSearch->SearchOperator = @$filter["z_Days"];
		$this->Days->AdvancedSearch->SearchCondition = @$filter["v_Days"];
		$this->Days->AdvancedSearch->SearchValue2 = @$filter["y_Days"];
		$this->Days->AdvancedSearch->SearchOperator2 = @$filter["w_Days"];
		$this->Days->AdvancedSearch->save();

		// Field Cutoff
		$this->Cutoff->AdvancedSearch->SearchValue = @$filter["x_Cutoff"];
		$this->Cutoff->AdvancedSearch->SearchOperator = @$filter["z_Cutoff"];
		$this->Cutoff->AdvancedSearch->SearchCondition = @$filter["v_Cutoff"];
		$this->Cutoff->AdvancedSearch->SearchValue2 = @$filter["y_Cutoff"];
		$this->Cutoff->AdvancedSearch->SearchOperator2 = @$filter["w_Cutoff"];
		$this->Cutoff->AdvancedSearch->save();

		// Field FontBold
		$this->FontBold->AdvancedSearch->SearchValue = @$filter["x_FontBold"];
		$this->FontBold->AdvancedSearch->SearchOperator = @$filter["z_FontBold"];
		$this->FontBold->AdvancedSearch->SearchCondition = @$filter["v_FontBold"];
		$this->FontBold->AdvancedSearch->SearchValue2 = @$filter["y_FontBold"];
		$this->FontBold->AdvancedSearch->SearchOperator2 = @$filter["w_FontBold"];
		$this->FontBold->AdvancedSearch->save();

		// Field TestHeading
		$this->TestHeading->AdvancedSearch->SearchValue = @$filter["x_TestHeading"];
		$this->TestHeading->AdvancedSearch->SearchOperator = @$filter["z_TestHeading"];
		$this->TestHeading->AdvancedSearch->SearchCondition = @$filter["v_TestHeading"];
		$this->TestHeading->AdvancedSearch->SearchValue2 = @$filter["y_TestHeading"];
		$this->TestHeading->AdvancedSearch->SearchOperator2 = @$filter["w_TestHeading"];
		$this->TestHeading->AdvancedSearch->save();

		// Field Outsource
		$this->Outsource->AdvancedSearch->SearchValue = @$filter["x_Outsource"];
		$this->Outsource->AdvancedSearch->SearchOperator = @$filter["z_Outsource"];
		$this->Outsource->AdvancedSearch->SearchCondition = @$filter["v_Outsource"];
		$this->Outsource->AdvancedSearch->SearchValue2 = @$filter["y_Outsource"];
		$this->Outsource->AdvancedSearch->SearchOperator2 = @$filter["w_Outsource"];
		$this->Outsource->AdvancedSearch->save();

		// Field NoResult
		$this->NoResult->AdvancedSearch->SearchValue = @$filter["x_NoResult"];
		$this->NoResult->AdvancedSearch->SearchOperator = @$filter["z_NoResult"];
		$this->NoResult->AdvancedSearch->SearchCondition = @$filter["v_NoResult"];
		$this->NoResult->AdvancedSearch->SearchValue2 = @$filter["y_NoResult"];
		$this->NoResult->AdvancedSearch->SearchOperator2 = @$filter["w_NoResult"];
		$this->NoResult->AdvancedSearch->save();

		// Field GraphLow
		$this->GraphLow->AdvancedSearch->SearchValue = @$filter["x_GraphLow"];
		$this->GraphLow->AdvancedSearch->SearchOperator = @$filter["z_GraphLow"];
		$this->GraphLow->AdvancedSearch->SearchCondition = @$filter["v_GraphLow"];
		$this->GraphLow->AdvancedSearch->SearchValue2 = @$filter["y_GraphLow"];
		$this->GraphLow->AdvancedSearch->SearchOperator2 = @$filter["w_GraphLow"];
		$this->GraphLow->AdvancedSearch->save();

		// Field GraphHigh
		$this->GraphHigh->AdvancedSearch->SearchValue = @$filter["x_GraphHigh"];
		$this->GraphHigh->AdvancedSearch->SearchOperator = @$filter["z_GraphHigh"];
		$this->GraphHigh->AdvancedSearch->SearchCondition = @$filter["v_GraphHigh"];
		$this->GraphHigh->AdvancedSearch->SearchValue2 = @$filter["y_GraphHigh"];
		$this->GraphHigh->AdvancedSearch->SearchOperator2 = @$filter["w_GraphHigh"];
		$this->GraphHigh->AdvancedSearch->save();

		// Field CollSample
		$this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
		$this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
		$this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
		$this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
		$this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
		$this->CollSample->AdvancedSearch->save();

		// Field ProcessTime
		$this->ProcessTime->AdvancedSearch->SearchValue = @$filter["x_ProcessTime"];
		$this->ProcessTime->AdvancedSearch->SearchOperator = @$filter["z_ProcessTime"];
		$this->ProcessTime->AdvancedSearch->SearchCondition = @$filter["v_ProcessTime"];
		$this->ProcessTime->AdvancedSearch->SearchValue2 = @$filter["y_ProcessTime"];
		$this->ProcessTime->AdvancedSearch->SearchOperator2 = @$filter["w_ProcessTime"];
		$this->ProcessTime->AdvancedSearch->save();

		// Field TamilName
		$this->TamilName->AdvancedSearch->SearchValue = @$filter["x_TamilName"];
		$this->TamilName->AdvancedSearch->SearchOperator = @$filter["z_TamilName"];
		$this->TamilName->AdvancedSearch->SearchCondition = @$filter["v_TamilName"];
		$this->TamilName->AdvancedSearch->SearchValue2 = @$filter["y_TamilName"];
		$this->TamilName->AdvancedSearch->SearchOperator2 = @$filter["w_TamilName"];
		$this->TamilName->AdvancedSearch->save();

		// Field ShortName
		$this->ShortName->AdvancedSearch->SearchValue = @$filter["x_ShortName"];
		$this->ShortName->AdvancedSearch->SearchOperator = @$filter["z_ShortName"];
		$this->ShortName->AdvancedSearch->SearchCondition = @$filter["v_ShortName"];
		$this->ShortName->AdvancedSearch->SearchValue2 = @$filter["y_ShortName"];
		$this->ShortName->AdvancedSearch->SearchOperator2 = @$filter["w_ShortName"];
		$this->ShortName->AdvancedSearch->save();

		// Field Individual
		$this->Individual->AdvancedSearch->SearchValue = @$filter["x_Individual"];
		$this->Individual->AdvancedSearch->SearchOperator = @$filter["z_Individual"];
		$this->Individual->AdvancedSearch->SearchCondition = @$filter["v_Individual"];
		$this->Individual->AdvancedSearch->SearchValue2 = @$filter["y_Individual"];
		$this->Individual->AdvancedSearch->SearchOperator2 = @$filter["w_Individual"];
		$this->Individual->AdvancedSearch->save();

		// Field PrevAmt
		$this->PrevAmt->AdvancedSearch->SearchValue = @$filter["x_PrevAmt"];
		$this->PrevAmt->AdvancedSearch->SearchOperator = @$filter["z_PrevAmt"];
		$this->PrevAmt->AdvancedSearch->SearchCondition = @$filter["v_PrevAmt"];
		$this->PrevAmt->AdvancedSearch->SearchValue2 = @$filter["y_PrevAmt"];
		$this->PrevAmt->AdvancedSearch->SearchOperator2 = @$filter["w_PrevAmt"];
		$this->PrevAmt->AdvancedSearch->save();

		// Field PrevSplAmt
		$this->PrevSplAmt->AdvancedSearch->SearchValue = @$filter["x_PrevSplAmt"];
		$this->PrevSplAmt->AdvancedSearch->SearchOperator = @$filter["z_PrevSplAmt"];
		$this->PrevSplAmt->AdvancedSearch->SearchCondition = @$filter["v_PrevSplAmt"];
		$this->PrevSplAmt->AdvancedSearch->SearchValue2 = @$filter["y_PrevSplAmt"];
		$this->PrevSplAmt->AdvancedSearch->SearchOperator2 = @$filter["w_PrevSplAmt"];
		$this->PrevSplAmt->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field EditDate
		$this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
		$this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
		$this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
		$this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
		$this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
		$this->EditDate->AdvancedSearch->save();

		// Field BillName
		$this->BillName->AdvancedSearch->SearchValue = @$filter["x_BillName"];
		$this->BillName->AdvancedSearch->SearchOperator = @$filter["z_BillName"];
		$this->BillName->AdvancedSearch->SearchCondition = @$filter["v_BillName"];
		$this->BillName->AdvancedSearch->SearchValue2 = @$filter["y_BillName"];
		$this->BillName->AdvancedSearch->SearchOperator2 = @$filter["w_BillName"];
		$this->BillName->AdvancedSearch->save();

		// Field ActualAmt
		$this->ActualAmt->AdvancedSearch->SearchValue = @$filter["x_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchOperator = @$filter["z_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchCondition = @$filter["v_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchValue2 = @$filter["y_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->save();

		// Field HISCD
		$this->HISCD->AdvancedSearch->SearchValue = @$filter["x_HISCD"];
		$this->HISCD->AdvancedSearch->SearchOperator = @$filter["z_HISCD"];
		$this->HISCD->AdvancedSearch->SearchCondition = @$filter["v_HISCD"];
		$this->HISCD->AdvancedSearch->SearchValue2 = @$filter["y_HISCD"];
		$this->HISCD->AdvancedSearch->SearchOperator2 = @$filter["w_HISCD"];
		$this->HISCD->AdvancedSearch->save();

		// Field PriceList
		$this->PriceList->AdvancedSearch->SearchValue = @$filter["x_PriceList"];
		$this->PriceList->AdvancedSearch->SearchOperator = @$filter["z_PriceList"];
		$this->PriceList->AdvancedSearch->SearchCondition = @$filter["v_PriceList"];
		$this->PriceList->AdvancedSearch->SearchValue2 = @$filter["y_PriceList"];
		$this->PriceList->AdvancedSearch->SearchOperator2 = @$filter["w_PriceList"];
		$this->PriceList->AdvancedSearch->save();

		// Field IPAmt
		$this->IPAmt->AdvancedSearch->SearchValue = @$filter["x_IPAmt"];
		$this->IPAmt->AdvancedSearch->SearchOperator = @$filter["z_IPAmt"];
		$this->IPAmt->AdvancedSearch->SearchCondition = @$filter["v_IPAmt"];
		$this->IPAmt->AdvancedSearch->SearchValue2 = @$filter["y_IPAmt"];
		$this->IPAmt->AdvancedSearch->SearchOperator2 = @$filter["w_IPAmt"];
		$this->IPAmt->AdvancedSearch->save();

		// Field InsAmt
		$this->InsAmt->AdvancedSearch->SearchValue = @$filter["x_InsAmt"];
		$this->InsAmt->AdvancedSearch->SearchOperator = @$filter["z_InsAmt"];
		$this->InsAmt->AdvancedSearch->SearchCondition = @$filter["v_InsAmt"];
		$this->InsAmt->AdvancedSearch->SearchValue2 = @$filter["y_InsAmt"];
		$this->InsAmt->AdvancedSearch->SearchOperator2 = @$filter["w_InsAmt"];
		$this->InsAmt->AdvancedSearch->save();

		// Field ManualCD
		$this->ManualCD->AdvancedSearch->SearchValue = @$filter["x_ManualCD"];
		$this->ManualCD->AdvancedSearch->SearchOperator = @$filter["z_ManualCD"];
		$this->ManualCD->AdvancedSearch->SearchCondition = @$filter["v_ManualCD"];
		$this->ManualCD->AdvancedSearch->SearchValue2 = @$filter["y_ManualCD"];
		$this->ManualCD->AdvancedSearch->SearchOperator2 = @$filter["w_ManualCD"];
		$this->ManualCD->AdvancedSearch->save();

		// Field Free
		$this->Free->AdvancedSearch->SearchValue = @$filter["x_Free"];
		$this->Free->AdvancedSearch->SearchOperator = @$filter["z_Free"];
		$this->Free->AdvancedSearch->SearchCondition = @$filter["v_Free"];
		$this->Free->AdvancedSearch->SearchValue2 = @$filter["y_Free"];
		$this->Free->AdvancedSearch->SearchOperator2 = @$filter["w_Free"];
		$this->Free->AdvancedSearch->save();

		// Field AutoAuth
		$this->AutoAuth->AdvancedSearch->SearchValue = @$filter["x_AutoAuth"];
		$this->AutoAuth->AdvancedSearch->SearchOperator = @$filter["z_AutoAuth"];
		$this->AutoAuth->AdvancedSearch->SearchCondition = @$filter["v_AutoAuth"];
		$this->AutoAuth->AdvancedSearch->SearchValue2 = @$filter["y_AutoAuth"];
		$this->AutoAuth->AdvancedSearch->SearchOperator2 = @$filter["w_AutoAuth"];
		$this->AutoAuth->AdvancedSearch->save();

		// Field ProductCD
		$this->ProductCD->AdvancedSearch->SearchValue = @$filter["x_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchOperator = @$filter["z_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchCondition = @$filter["v_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchValue2 = @$filter["y_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCD"];
		$this->ProductCD->AdvancedSearch->save();

		// Field Inventory
		$this->Inventory->AdvancedSearch->SearchValue = @$filter["x_Inventory"];
		$this->Inventory->AdvancedSearch->SearchOperator = @$filter["z_Inventory"];
		$this->Inventory->AdvancedSearch->SearchCondition = @$filter["v_Inventory"];
		$this->Inventory->AdvancedSearch->SearchValue2 = @$filter["y_Inventory"];
		$this->Inventory->AdvancedSearch->SearchOperator2 = @$filter["w_Inventory"];
		$this->Inventory->AdvancedSearch->save();

		// Field IntimateTest
		$this->IntimateTest->AdvancedSearch->SearchValue = @$filter["x_IntimateTest"];
		$this->IntimateTest->AdvancedSearch->SearchOperator = @$filter["z_IntimateTest"];
		$this->IntimateTest->AdvancedSearch->SearchCondition = @$filter["v_IntimateTest"];
		$this->IntimateTest->AdvancedSearch->SearchValue2 = @$filter["y_IntimateTest"];
		$this->IntimateTest->AdvancedSearch->SearchOperator2 = @$filter["w_IntimateTest"];
		$this->IntimateTest->AdvancedSearch->save();

		// Field Manual
		$this->Manual->AdvancedSearch->SearchValue = @$filter["x_Manual"];
		$this->Manual->AdvancedSearch->SearchOperator = @$filter["z_Manual"];
		$this->Manual->AdvancedSearch->SearchCondition = @$filter["v_Manual"];
		$this->Manual->AdvancedSearch->SearchValue2 = @$filter["y_Manual"];
		$this->Manual->AdvancedSearch->SearchOperator2 = @$filter["w_Manual"];
		$this->Manual->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->MainDeptCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeptCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->XrayPart, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UnitCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Note, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sun, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mon, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tue, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Wed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Thi, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Fri, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sat, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Cutoff, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FontBold, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestHeading, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Outsource, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoResult, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProcessTime, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TamilName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ShortName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Individual, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BillName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HISCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PriceList, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ManualCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Free, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AutoAuth, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProductCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Inventory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IntimateTest, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Manual, $arKeywords, $type);
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
			$this->updateSort($this->MainDeptCd); // MainDeptCd
			$this->updateSort($this->DeptCd); // DeptCd
			$this->updateSort($this->TestCd); // TestCd
			$this->updateSort($this->TestSubCd); // TestSubCd
			$this->updateSort($this->TestName); // TestName
			$this->updateSort($this->XrayPart); // XrayPart
			$this->updateSort($this->Method); // Method
			$this->updateSort($this->Order); // Order
			$this->updateSort($this->Form); // Form
			$this->updateSort($this->Amt); // Amt
			$this->updateSort($this->SplAmt); // SplAmt
			$this->updateSort($this->ResType); // ResType
			$this->updateSort($this->UnitCD); // UnitCD
			$this->updateSort($this->Sample); // Sample
			$this->updateSort($this->NoD); // NoD
			$this->updateSort($this->BillOrder); // BillOrder
			$this->updateSort($this->Inactive); // Inactive
			$this->updateSort($this->ReagentAmt); // ReagentAmt
			$this->updateSort($this->LabAmt); // LabAmt
			$this->updateSort($this->RefAmt); // RefAmt
			$this->updateSort($this->CreFrom); // CreFrom
			$this->updateSort($this->CreTo); // CreTo
			$this->updateSort($this->Sun); // Sun
			$this->updateSort($this->Mon); // Mon
			$this->updateSort($this->Tue); // Tue
			$this->updateSort($this->Wed); // Wed
			$this->updateSort($this->Thi); // Thi
			$this->updateSort($this->Fri); // Fri
			$this->updateSort($this->Sat); // Sat
			$this->updateSort($this->Days); // Days
			$this->updateSort($this->Cutoff); // Cutoff
			$this->updateSort($this->FontBold); // FontBold
			$this->updateSort($this->TestHeading); // TestHeading
			$this->updateSort($this->Outsource); // Outsource
			$this->updateSort($this->NoResult); // NoResult
			$this->updateSort($this->GraphLow); // GraphLow
			$this->updateSort($this->GraphHigh); // GraphHigh
			$this->updateSort($this->CollSample); // CollSample
			$this->updateSort($this->ProcessTime); // ProcessTime
			$this->updateSort($this->TamilName); // TamilName
			$this->updateSort($this->ShortName); // ShortName
			$this->updateSort($this->Individual); // Individual
			$this->updateSort($this->PrevAmt); // PrevAmt
			$this->updateSort($this->PrevSplAmt); // PrevSplAmt
			$this->updateSort($this->EditDate); // EditDate
			$this->updateSort($this->BillName); // BillName
			$this->updateSort($this->ActualAmt); // ActualAmt
			$this->updateSort($this->HISCD); // HISCD
			$this->updateSort($this->PriceList); // PriceList
			$this->updateSort($this->IPAmt); // IPAmt
			$this->updateSort($this->InsAmt); // InsAmt
			$this->updateSort($this->ManualCD); // ManualCD
			$this->updateSort($this->Free); // Free
			$this->updateSort($this->AutoAuth); // AutoAuth
			$this->updateSort($this->ProductCD); // ProductCD
			$this->updateSort($this->Inventory); // Inventory
			$this->updateSort($this->IntimateTest); // IntimateTest
			$this->updateSort($this->Manual); // Manual
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
				$this->MainDeptCd->setSort("");
				$this->DeptCd->setSort("");
				$this->TestCd->setSort("");
				$this->TestSubCd->setSort("");
				$this->TestName->setSort("");
				$this->XrayPart->setSort("");
				$this->Method->setSort("");
				$this->Order->setSort("");
				$this->Form->setSort("");
				$this->Amt->setSort("");
				$this->SplAmt->setSort("");
				$this->ResType->setSort("");
				$this->UnitCD->setSort("");
				$this->Sample->setSort("");
				$this->NoD->setSort("");
				$this->BillOrder->setSort("");
				$this->Inactive->setSort("");
				$this->ReagentAmt->setSort("");
				$this->LabAmt->setSort("");
				$this->RefAmt->setSort("");
				$this->CreFrom->setSort("");
				$this->CreTo->setSort("");
				$this->Sun->setSort("");
				$this->Mon->setSort("");
				$this->Tue->setSort("");
				$this->Wed->setSort("");
				$this->Thi->setSort("");
				$this->Fri->setSort("");
				$this->Sat->setSort("");
				$this->Days->setSort("");
				$this->Cutoff->setSort("");
				$this->FontBold->setSort("");
				$this->TestHeading->setSort("");
				$this->Outsource->setSort("");
				$this->NoResult->setSort("");
				$this->GraphLow->setSort("");
				$this->GraphHigh->setSort("");
				$this->CollSample->setSort("");
				$this->ProcessTime->setSort("");
				$this->TamilName->setSort("");
				$this->ShortName->setSort("");
				$this->Individual->setSort("");
				$this->PrevAmt->setSort("");
				$this->PrevSplAmt->setSort("");
				$this->EditDate->setSort("");
				$this->BillName->setSort("");
				$this->ActualAmt->setSort("");
				$this->HISCD->setSort("");
				$this->PriceList->setSort("");
				$this->IPAmt->setSort("");
				$this->InsAmt->setSort("");
				$this->ManualCD->setSort("");
				$this->Free->setSort("");
				$this->AutoAuth->setSort("");
				$this->ProductCD->setSort("");
				$this->Inventory->setSort("");
				$this->IntimateTest->setSort("");
				$this->Manual->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"flab_test_masterlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"flab_test_masterlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.flab_test_masterlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"flab_test_masterlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(TABLE_BASIC_SEARCH, ""), FALSE);
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(TABLE_BASIC_SEARCH_TYPE, ""), FALSE);
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
		$this->MainDeptCd->setDbValue($row['MainDeptCd']);
		$this->DeptCd->setDbValue($row['DeptCd']);
		$this->TestCd->setDbValue($row['TestCd']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->TestName->setDbValue($row['TestName']);
		$this->XrayPart->setDbValue($row['XrayPart']);
		$this->Method->setDbValue($row['Method']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->Amt->setDbValue($row['Amt']);
		$this->SplAmt->setDbValue($row['SplAmt']);
		$this->ResType->setDbValue($row['ResType']);
		$this->UnitCD->setDbValue($row['UnitCD']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->ReagentAmt->setDbValue($row['ReagentAmt']);
		$this->LabAmt->setDbValue($row['LabAmt']);
		$this->RefAmt->setDbValue($row['RefAmt']);
		$this->CreFrom->setDbValue($row['CreFrom']);
		$this->CreTo->setDbValue($row['CreTo']);
		$this->Note->setDbValue($row['Note']);
		$this->Sun->setDbValue($row['Sun']);
		$this->Mon->setDbValue($row['Mon']);
		$this->Tue->setDbValue($row['Tue']);
		$this->Wed->setDbValue($row['Wed']);
		$this->Thi->setDbValue($row['Thi']);
		$this->Fri->setDbValue($row['Fri']);
		$this->Sat->setDbValue($row['Sat']);
		$this->Days->setDbValue($row['Days']);
		$this->Cutoff->setDbValue($row['Cutoff']);
		$this->FontBold->setDbValue($row['FontBold']);
		$this->TestHeading->setDbValue($row['TestHeading']);
		$this->Outsource->setDbValue($row['Outsource']);
		$this->NoResult->setDbValue($row['NoResult']);
		$this->GraphLow->setDbValue($row['GraphLow']);
		$this->GraphHigh->setDbValue($row['GraphHigh']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->ProcessTime->setDbValue($row['ProcessTime']);
		$this->TamilName->setDbValue($row['TamilName']);
		$this->ShortName->setDbValue($row['ShortName']);
		$this->Individual->setDbValue($row['Individual']);
		$this->PrevAmt->setDbValue($row['PrevAmt']);
		$this->PrevSplAmt->setDbValue($row['PrevSplAmt']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->BillName->setDbValue($row['BillName']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->HISCD->setDbValue($row['HISCD']);
		$this->PriceList->setDbValue($row['PriceList']);
		$this->IPAmt->setDbValue($row['IPAmt']);
		$this->InsAmt->setDbValue($row['InsAmt']);
		$this->ManualCD->setDbValue($row['ManualCD']);
		$this->Free->setDbValue($row['Free']);
		$this->AutoAuth->setDbValue($row['AutoAuth']);
		$this->ProductCD->setDbValue($row['ProductCD']);
		$this->Inventory->setDbValue($row['Inventory']);
		$this->IntimateTest->setDbValue($row['IntimateTest']);
		$this->Manual->setDbValue($row['Manual']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['MainDeptCd'] = NULL;
		$row['DeptCd'] = NULL;
		$row['TestCd'] = NULL;
		$row['TestSubCd'] = NULL;
		$row['TestName'] = NULL;
		$row['XrayPart'] = NULL;
		$row['Method'] = NULL;
		$row['Order'] = NULL;
		$row['Form'] = NULL;
		$row['Amt'] = NULL;
		$row['SplAmt'] = NULL;
		$row['ResType'] = NULL;
		$row['UnitCD'] = NULL;
		$row['RefValue'] = NULL;
		$row['Sample'] = NULL;
		$row['NoD'] = NULL;
		$row['BillOrder'] = NULL;
		$row['Formula'] = NULL;
		$row['Inactive'] = NULL;
		$row['ReagentAmt'] = NULL;
		$row['LabAmt'] = NULL;
		$row['RefAmt'] = NULL;
		$row['CreFrom'] = NULL;
		$row['CreTo'] = NULL;
		$row['Note'] = NULL;
		$row['Sun'] = NULL;
		$row['Mon'] = NULL;
		$row['Tue'] = NULL;
		$row['Wed'] = NULL;
		$row['Thi'] = NULL;
		$row['Fri'] = NULL;
		$row['Sat'] = NULL;
		$row['Days'] = NULL;
		$row['Cutoff'] = NULL;
		$row['FontBold'] = NULL;
		$row['TestHeading'] = NULL;
		$row['Outsource'] = NULL;
		$row['NoResult'] = NULL;
		$row['GraphLow'] = NULL;
		$row['GraphHigh'] = NULL;
		$row['CollSample'] = NULL;
		$row['ProcessTime'] = NULL;
		$row['TamilName'] = NULL;
		$row['ShortName'] = NULL;
		$row['Individual'] = NULL;
		$row['PrevAmt'] = NULL;
		$row['PrevSplAmt'] = NULL;
		$row['Remarks'] = NULL;
		$row['EditDate'] = NULL;
		$row['BillName'] = NULL;
		$row['ActualAmt'] = NULL;
		$row['HISCD'] = NULL;
		$row['PriceList'] = NULL;
		$row['IPAmt'] = NULL;
		$row['InsAmt'] = NULL;
		$row['ManualCD'] = NULL;
		$row['Free'] = NULL;
		$row['AutoAuth'] = NULL;
		$row['ProductCD'] = NULL;
		$row['Inventory'] = NULL;
		$row['IntimateTest'] = NULL;
		$row['Manual'] = NULL;
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
		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Amt->FormValue == $this->Amt->CurrentValue && is_numeric(ConvertToFloatString($this->Amt->CurrentValue)))
			$this->Amt->CurrentValue = ConvertToFloatString($this->Amt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SplAmt->FormValue == $this->SplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->SplAmt->CurrentValue)))
			$this->SplAmt->CurrentValue = ConvertToFloatString($this->SplAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue)))
			$this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue)))
			$this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue)))
			$this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue)))
			$this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue)))
			$this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CreFrom->FormValue == $this->CreFrom->CurrentValue && is_numeric(ConvertToFloatString($this->CreFrom->CurrentValue)))
			$this->CreFrom->CurrentValue = ConvertToFloatString($this->CreFrom->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CreTo->FormValue == $this->CreTo->CurrentValue && is_numeric(ConvertToFloatString($this->CreTo->CurrentValue)))
			$this->CreTo->CurrentValue = ConvertToFloatString($this->CreTo->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Days->FormValue == $this->Days->CurrentValue && is_numeric(ConvertToFloatString($this->Days->CurrentValue)))
			$this->Days->CurrentValue = ConvertToFloatString($this->Days->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GraphLow->FormValue == $this->GraphLow->CurrentValue && is_numeric(ConvertToFloatString($this->GraphLow->CurrentValue)))
			$this->GraphLow->CurrentValue = ConvertToFloatString($this->GraphLow->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GraphHigh->FormValue == $this->GraphHigh->CurrentValue && is_numeric(ConvertToFloatString($this->GraphHigh->CurrentValue)))
			$this->GraphHigh->CurrentValue = ConvertToFloatString($this->GraphHigh->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue)))
			$this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevSplAmt->FormValue == $this->PrevSplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevSplAmt->CurrentValue)))
			$this->PrevSplAmt->CurrentValue = ConvertToFloatString($this->PrevSplAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue)))
			$this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue)))
			$this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// MainDeptCd
		// DeptCd
		// TestCd
		// TestSubCd
		// TestName
		// XrayPart
		// Method
		// Order
		// Form
		// Amt
		// SplAmt
		// ResType
		// UnitCD
		// RefValue
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// ReagentAmt
		// LabAmt
		// RefAmt
		// CreFrom
		// CreTo
		// Note
		// Sun
		// Mon
		// Tue
		// Wed
		// Thi
		// Fri
		// Sat
		// Days
		// Cutoff
		// FontBold
		// TestHeading
		// Outsource
		// NoResult
		// GraphLow
		// GraphHigh
		// CollSample
		// ProcessTime
		// TamilName
		// ShortName
		// Individual
		// PrevAmt
		// PrevSplAmt
		// Remarks
		// EditDate
		// BillName
		// ActualAmt
		// HISCD
		// PriceList
		// IPAmt
		// InsAmt
		// ManualCD
		// Free
		// AutoAuth
		// ProductCD
		// Inventory
		// IntimateTest
		// Manual

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// MainDeptCd
			$this->MainDeptCd->ViewValue = $this->MainDeptCd->CurrentValue;
			$this->MainDeptCd->ViewCustomAttributes = "";

			// DeptCd
			$this->DeptCd->ViewValue = $this->DeptCd->CurrentValue;
			$this->DeptCd->ViewCustomAttributes = "";

			// TestCd
			$this->TestCd->ViewValue = $this->TestCd->CurrentValue;
			$this->TestCd->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// TestName
			$this->TestName->ViewValue = $this->TestName->CurrentValue;
			$this->TestName->ViewCustomAttributes = "";

			// XrayPart
			$this->XrayPart->ViewValue = $this->XrayPart->CurrentValue;
			$this->XrayPart->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// Form
			$this->Form->ViewValue = $this->Form->CurrentValue;
			$this->Form->ViewCustomAttributes = "";

			// Amt
			$this->Amt->ViewValue = $this->Amt->CurrentValue;
			$this->Amt->ViewValue = FormatNumber($this->Amt->ViewValue, 2, -2, -2, -2);
			$this->Amt->ViewCustomAttributes = "";

			// SplAmt
			$this->SplAmt->ViewValue = $this->SplAmt->CurrentValue;
			$this->SplAmt->ViewValue = FormatNumber($this->SplAmt->ViewValue, 2, -2, -2, -2);
			$this->SplAmt->ViewCustomAttributes = "";

			// ResType
			$this->ResType->ViewValue = $this->ResType->CurrentValue;
			$this->ResType->ViewCustomAttributes = "";

			// UnitCD
			$this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
			$this->UnitCD->ViewCustomAttributes = "";

			// Sample
			$this->Sample->ViewValue = $this->Sample->CurrentValue;
			$this->Sample->ViewCustomAttributes = "";

			// NoD
			$this->NoD->ViewValue = $this->NoD->CurrentValue;
			$this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
			$this->NoD->ViewCustomAttributes = "";

			// BillOrder
			$this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
			$this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
			$this->BillOrder->ViewCustomAttributes = "";

			// Inactive
			$this->Inactive->ViewValue = $this->Inactive->CurrentValue;
			$this->Inactive->ViewCustomAttributes = "";

			// ReagentAmt
			$this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
			$this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
			$this->ReagentAmt->ViewCustomAttributes = "";

			// LabAmt
			$this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
			$this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
			$this->LabAmt->ViewCustomAttributes = "";

			// RefAmt
			$this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
			$this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
			$this->RefAmt->ViewCustomAttributes = "";

			// CreFrom
			$this->CreFrom->ViewValue = $this->CreFrom->CurrentValue;
			$this->CreFrom->ViewValue = FormatNumber($this->CreFrom->ViewValue, 2, -2, -2, -2);
			$this->CreFrom->ViewCustomAttributes = "";

			// CreTo
			$this->CreTo->ViewValue = $this->CreTo->CurrentValue;
			$this->CreTo->ViewValue = FormatNumber($this->CreTo->ViewValue, 2, -2, -2, -2);
			$this->CreTo->ViewCustomAttributes = "";

			// Sun
			$this->Sun->ViewValue = $this->Sun->CurrentValue;
			$this->Sun->ViewCustomAttributes = "";

			// Mon
			$this->Mon->ViewValue = $this->Mon->CurrentValue;
			$this->Mon->ViewCustomAttributes = "";

			// Tue
			$this->Tue->ViewValue = $this->Tue->CurrentValue;
			$this->Tue->ViewCustomAttributes = "";

			// Wed
			$this->Wed->ViewValue = $this->Wed->CurrentValue;
			$this->Wed->ViewCustomAttributes = "";

			// Thi
			$this->Thi->ViewValue = $this->Thi->CurrentValue;
			$this->Thi->ViewCustomAttributes = "";

			// Fri
			$this->Fri->ViewValue = $this->Fri->CurrentValue;
			$this->Fri->ViewCustomAttributes = "";

			// Sat
			$this->Sat->ViewValue = $this->Sat->CurrentValue;
			$this->Sat->ViewCustomAttributes = "";

			// Days
			$this->Days->ViewValue = $this->Days->CurrentValue;
			$this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 2, -2, -2, -2);
			$this->Days->ViewCustomAttributes = "";

			// Cutoff
			$this->Cutoff->ViewValue = $this->Cutoff->CurrentValue;
			$this->Cutoff->ViewCustomAttributes = "";

			// FontBold
			$this->FontBold->ViewValue = $this->FontBold->CurrentValue;
			$this->FontBold->ViewCustomAttributes = "";

			// TestHeading
			$this->TestHeading->ViewValue = $this->TestHeading->CurrentValue;
			$this->TestHeading->ViewCustomAttributes = "";

			// Outsource
			$this->Outsource->ViewValue = $this->Outsource->CurrentValue;
			$this->Outsource->ViewCustomAttributes = "";

			// NoResult
			$this->NoResult->ViewValue = $this->NoResult->CurrentValue;
			$this->NoResult->ViewCustomAttributes = "";

			// GraphLow
			$this->GraphLow->ViewValue = $this->GraphLow->CurrentValue;
			$this->GraphLow->ViewValue = FormatNumber($this->GraphLow->ViewValue, 2, -2, -2, -2);
			$this->GraphLow->ViewCustomAttributes = "";

			// GraphHigh
			$this->GraphHigh->ViewValue = $this->GraphHigh->CurrentValue;
			$this->GraphHigh->ViewValue = FormatNumber($this->GraphHigh->ViewValue, 2, -2, -2, -2);
			$this->GraphHigh->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// ProcessTime
			$this->ProcessTime->ViewValue = $this->ProcessTime->CurrentValue;
			$this->ProcessTime->ViewCustomAttributes = "";

			// TamilName
			$this->TamilName->ViewValue = $this->TamilName->CurrentValue;
			$this->TamilName->ViewCustomAttributes = "";

			// ShortName
			$this->ShortName->ViewValue = $this->ShortName->CurrentValue;
			$this->ShortName->ViewCustomAttributes = "";

			// Individual
			$this->Individual->ViewValue = $this->Individual->CurrentValue;
			$this->Individual->ViewCustomAttributes = "";

			// PrevAmt
			$this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
			$this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevAmt->ViewCustomAttributes = "";

			// PrevSplAmt
			$this->PrevSplAmt->ViewValue = $this->PrevSplAmt->CurrentValue;
			$this->PrevSplAmt->ViewValue = FormatNumber($this->PrevSplAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevSplAmt->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// BillName
			$this->BillName->ViewValue = $this->BillName->CurrentValue;
			$this->BillName->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// HISCD
			$this->HISCD->ViewValue = $this->HISCD->CurrentValue;
			$this->HISCD->ViewCustomAttributes = "";

			// PriceList
			$this->PriceList->ViewValue = $this->PriceList->CurrentValue;
			$this->PriceList->ViewCustomAttributes = "";

			// IPAmt
			$this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
			$this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
			$this->IPAmt->ViewCustomAttributes = "";

			// InsAmt
			$this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
			$this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
			$this->InsAmt->ViewCustomAttributes = "";

			// ManualCD
			$this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
			$this->ManualCD->ViewCustomAttributes = "";

			// Free
			$this->Free->ViewValue = $this->Free->CurrentValue;
			$this->Free->ViewCustomAttributes = "";

			// AutoAuth
			$this->AutoAuth->ViewValue = $this->AutoAuth->CurrentValue;
			$this->AutoAuth->ViewCustomAttributes = "";

			// ProductCD
			$this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
			$this->ProductCD->ViewCustomAttributes = "";

			// Inventory
			$this->Inventory->ViewValue = $this->Inventory->CurrentValue;
			$this->Inventory->ViewCustomAttributes = "";

			// IntimateTest
			$this->IntimateTest->ViewValue = $this->IntimateTest->CurrentValue;
			$this->IntimateTest->ViewCustomAttributes = "";

			// Manual
			$this->Manual->ViewValue = $this->Manual->CurrentValue;
			$this->Manual->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// MainDeptCd
			$this->MainDeptCd->LinkCustomAttributes = "";
			$this->MainDeptCd->HrefValue = "";
			$this->MainDeptCd->TooltipValue = "";

			// DeptCd
			$this->DeptCd->LinkCustomAttributes = "";
			$this->DeptCd->HrefValue = "";
			$this->DeptCd->TooltipValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";
			$this->TestCd->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// TestName
			$this->TestName->LinkCustomAttributes = "";
			$this->TestName->HrefValue = "";
			$this->TestName->TooltipValue = "";

			// XrayPart
			$this->XrayPart->LinkCustomAttributes = "";
			$this->XrayPart->HrefValue = "";
			$this->XrayPart->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// Amt
			$this->Amt->LinkCustomAttributes = "";
			$this->Amt->HrefValue = "";
			$this->Amt->TooltipValue = "";

			// SplAmt
			$this->SplAmt->LinkCustomAttributes = "";
			$this->SplAmt->HrefValue = "";
			$this->SplAmt->TooltipValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";
			$this->ResType->TooltipValue = "";

			// UnitCD
			$this->UnitCD->LinkCustomAttributes = "";
			$this->UnitCD->HrefValue = "";
			$this->UnitCD->TooltipValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";
			$this->Sample->TooltipValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";
			$this->NoD->TooltipValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";
			$this->BillOrder->TooltipValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";
			$this->Inactive->TooltipValue = "";

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";
			$this->ReagentAmt->TooltipValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";
			$this->LabAmt->TooltipValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";
			$this->RefAmt->TooltipValue = "";

			// CreFrom
			$this->CreFrom->LinkCustomAttributes = "";
			$this->CreFrom->HrefValue = "";
			$this->CreFrom->TooltipValue = "";

			// CreTo
			$this->CreTo->LinkCustomAttributes = "";
			$this->CreTo->HrefValue = "";
			$this->CreTo->TooltipValue = "";

			// Sun
			$this->Sun->LinkCustomAttributes = "";
			$this->Sun->HrefValue = "";
			$this->Sun->TooltipValue = "";

			// Mon
			$this->Mon->LinkCustomAttributes = "";
			$this->Mon->HrefValue = "";
			$this->Mon->TooltipValue = "";

			// Tue
			$this->Tue->LinkCustomAttributes = "";
			$this->Tue->HrefValue = "";
			$this->Tue->TooltipValue = "";

			// Wed
			$this->Wed->LinkCustomAttributes = "";
			$this->Wed->HrefValue = "";
			$this->Wed->TooltipValue = "";

			// Thi
			$this->Thi->LinkCustomAttributes = "";
			$this->Thi->HrefValue = "";
			$this->Thi->TooltipValue = "";

			// Fri
			$this->Fri->LinkCustomAttributes = "";
			$this->Fri->HrefValue = "";
			$this->Fri->TooltipValue = "";

			// Sat
			$this->Sat->LinkCustomAttributes = "";
			$this->Sat->HrefValue = "";
			$this->Sat->TooltipValue = "";

			// Days
			$this->Days->LinkCustomAttributes = "";
			$this->Days->HrefValue = "";
			$this->Days->TooltipValue = "";

			// Cutoff
			$this->Cutoff->LinkCustomAttributes = "";
			$this->Cutoff->HrefValue = "";
			$this->Cutoff->TooltipValue = "";

			// FontBold
			$this->FontBold->LinkCustomAttributes = "";
			$this->FontBold->HrefValue = "";
			$this->FontBold->TooltipValue = "";

			// TestHeading
			$this->TestHeading->LinkCustomAttributes = "";
			$this->TestHeading->HrefValue = "";
			$this->TestHeading->TooltipValue = "";

			// Outsource
			$this->Outsource->LinkCustomAttributes = "";
			$this->Outsource->HrefValue = "";
			$this->Outsource->TooltipValue = "";

			// NoResult
			$this->NoResult->LinkCustomAttributes = "";
			$this->NoResult->HrefValue = "";
			$this->NoResult->TooltipValue = "";

			// GraphLow
			$this->GraphLow->LinkCustomAttributes = "";
			$this->GraphLow->HrefValue = "";
			$this->GraphLow->TooltipValue = "";

			// GraphHigh
			$this->GraphHigh->LinkCustomAttributes = "";
			$this->GraphHigh->HrefValue = "";
			$this->GraphHigh->TooltipValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// ProcessTime
			$this->ProcessTime->LinkCustomAttributes = "";
			$this->ProcessTime->HrefValue = "";
			$this->ProcessTime->TooltipValue = "";

			// TamilName
			$this->TamilName->LinkCustomAttributes = "";
			$this->TamilName->HrefValue = "";
			$this->TamilName->TooltipValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";
			$this->ShortName->TooltipValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";
			$this->Individual->TooltipValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";
			$this->PrevAmt->TooltipValue = "";

			// PrevSplAmt
			$this->PrevSplAmt->LinkCustomAttributes = "";
			$this->PrevSplAmt->HrefValue = "";
			$this->PrevSplAmt->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";
			$this->BillName->TooltipValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";
			$this->HISCD->TooltipValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";
			$this->PriceList->TooltipValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";
			$this->IPAmt->TooltipValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";
			$this->InsAmt->TooltipValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";
			$this->ManualCD->TooltipValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";
			$this->Free->TooltipValue = "";

			// AutoAuth
			$this->AutoAuth->LinkCustomAttributes = "";
			$this->AutoAuth->HrefValue = "";
			$this->AutoAuth->TooltipValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";
			$this->ProductCD->TooltipValue = "";

			// Inventory
			$this->Inventory->LinkCustomAttributes = "";
			$this->Inventory->HrefValue = "";
			$this->Inventory->TooltipValue = "";

			// IntimateTest
			$this->IntimateTest->LinkCustomAttributes = "";
			$this->IntimateTest->HrefValue = "";
			$this->IntimateTest->TooltipValue = "";

			// Manual
			$this->Manual->LinkCustomAttributes = "";
			$this->Manual->HrefValue = "";
			$this->Manual->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.flab_test_masterlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.flab_test_masterlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.flab_test_masterlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_lab_test_master\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_lab_test_master',hdr:ew.language.phrase('ExportToEmailText'),f:document.flab_test_masterlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
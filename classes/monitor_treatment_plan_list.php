<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class monitor_treatment_plan_list extends monitor_treatment_plan
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'monitor_treatment_plan';

	// Page object name
	public $PageObjName = "monitor_treatment_plan_list";

	// Grid form hidden field names
	public $FormName = "fmonitor_treatment_planlist";
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

		// Table object (monitor_treatment_plan)
		if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
			$GLOBALS["monitor_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["monitor_treatment_plan"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "monitor_treatment_planadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "monitor_treatment_plandelete.php";
		$this->MultiUpdateUrl = "monitor_treatment_planupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fmonitor_treatment_planlistsrch";

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
		global $EXPORT, $monitor_treatment_plan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($monitor_treatment_plan);
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
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
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
		$this->PatId->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->MobileNo->setVisibility();
		$this->ConsultantName->setVisibility();
		$this->RefDrName->setVisibility();
		$this->RefDrMobileNo->setVisibility();
		$this->NewVisitDate->setVisibility();
		$this->NewVisitYesNo->setVisibility();
		$this->Treatment->setVisibility();
		$this->IUIDoneDate1->setVisibility();
		$this->IUIDoneYesNo1->setVisibility();
		$this->UPTTestDate1->setVisibility();
		$this->UPTTestYesNo1->setVisibility();
		$this->IUIDoneDate2->setVisibility();
		$this->IUIDoneYesNo2->setVisibility();
		$this->UPTTestDate2->setVisibility();
		$this->UPTTestYesNo2->setVisibility();
		$this->IUIDoneDate3->setVisibility();
		$this->IUIDoneYesNo3->setVisibility();
		$this->UPTTestDate3->setVisibility();
		$this->UPTTestYesNo3->setVisibility();
		$this->IUIDoneDate4->setVisibility();
		$this->IUIDoneYesNo4->setVisibility();
		$this->UPTTestDate4->setVisibility();
		$this->UPTTestYesNo4->setVisibility();
		$this->IVFStimulationDate->setVisibility();
		$this->IVFStimulationYesNo->setVisibility();
		$this->OPUDate->setVisibility();
		$this->OPUYesNo->setVisibility();
		$this->ETDate->setVisibility();
		$this->ETYesNo->setVisibility();
		$this->BetaHCGDate->setVisibility();
		$this->BetaHCGYesNo->setVisibility();
		$this->FETDate->setVisibility();
		$this->FETYesNo->setVisibility();
		$this->FBetaHCGDate->setVisibility();
		$this->FBetaHCGYesNo->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
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
		$this->setupLookupOptions($this->PatId);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fmonitor_treatment_planlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->MobileNo->AdvancedSearch->toJson(), ","); // Field MobileNo
		$filterList = Concat($filterList, $this->ConsultantName->AdvancedSearch->toJson(), ","); // Field ConsultantName
		$filterList = Concat($filterList, $this->RefDrName->AdvancedSearch->toJson(), ","); // Field RefDrName
		$filterList = Concat($filterList, $this->RefDrMobileNo->AdvancedSearch->toJson(), ","); // Field RefDrMobileNo
		$filterList = Concat($filterList, $this->NewVisitDate->AdvancedSearch->toJson(), ","); // Field NewVisitDate
		$filterList = Concat($filterList, $this->NewVisitYesNo->AdvancedSearch->toJson(), ","); // Field NewVisitYesNo
		$filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
		$filterList = Concat($filterList, $this->IUIDoneDate1->AdvancedSearch->toJson(), ","); // Field IUIDoneDate1
		$filterList = Concat($filterList, $this->IUIDoneYesNo1->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo1
		$filterList = Concat($filterList, $this->UPTTestDate1->AdvancedSearch->toJson(), ","); // Field UPTTestDate1
		$filterList = Concat($filterList, $this->UPTTestYesNo1->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo1
		$filterList = Concat($filterList, $this->IUIDoneDate2->AdvancedSearch->toJson(), ","); // Field IUIDoneDate2
		$filterList = Concat($filterList, $this->IUIDoneYesNo2->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo2
		$filterList = Concat($filterList, $this->UPTTestDate2->AdvancedSearch->toJson(), ","); // Field UPTTestDate2
		$filterList = Concat($filterList, $this->UPTTestYesNo2->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo2
		$filterList = Concat($filterList, $this->IUIDoneDate3->AdvancedSearch->toJson(), ","); // Field IUIDoneDate3
		$filterList = Concat($filterList, $this->IUIDoneYesNo3->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo3
		$filterList = Concat($filterList, $this->UPTTestDate3->AdvancedSearch->toJson(), ","); // Field UPTTestDate3
		$filterList = Concat($filterList, $this->UPTTestYesNo3->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo3
		$filterList = Concat($filterList, $this->IUIDoneDate4->AdvancedSearch->toJson(), ","); // Field IUIDoneDate4
		$filterList = Concat($filterList, $this->IUIDoneYesNo4->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo4
		$filterList = Concat($filterList, $this->UPTTestDate4->AdvancedSearch->toJson(), ","); // Field UPTTestDate4
		$filterList = Concat($filterList, $this->UPTTestYesNo4->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo4
		$filterList = Concat($filterList, $this->IVFStimulationDate->AdvancedSearch->toJson(), ","); // Field IVFStimulationDate
		$filterList = Concat($filterList, $this->IVFStimulationYesNo->AdvancedSearch->toJson(), ","); // Field IVFStimulationYesNo
		$filterList = Concat($filterList, $this->OPUDate->AdvancedSearch->toJson(), ","); // Field OPUDate
		$filterList = Concat($filterList, $this->OPUYesNo->AdvancedSearch->toJson(), ","); // Field OPUYesNo
		$filterList = Concat($filterList, $this->ETDate->AdvancedSearch->toJson(), ","); // Field ETDate
		$filterList = Concat($filterList, $this->ETYesNo->AdvancedSearch->toJson(), ","); // Field ETYesNo
		$filterList = Concat($filterList, $this->BetaHCGDate->AdvancedSearch->toJson(), ","); // Field BetaHCGDate
		$filterList = Concat($filterList, $this->BetaHCGYesNo->AdvancedSearch->toJson(), ","); // Field BetaHCGYesNo
		$filterList = Concat($filterList, $this->FETDate->AdvancedSearch->toJson(), ","); // Field FETDate
		$filterList = Concat($filterList, $this->FETYesNo->AdvancedSearch->toJson(), ","); // Field FETYesNo
		$filterList = Concat($filterList, $this->FBetaHCGDate->AdvancedSearch->toJson(), ","); // Field FBetaHCGDate
		$filterList = Concat($filterList, $this->FBetaHCGYesNo->AdvancedSearch->toJson(), ","); // Field FBetaHCGYesNo
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fmonitor_treatment_planlistsrch", $filters);
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

		// Field PatId
		$this->PatId->AdvancedSearch->SearchValue = @$filter["x_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator = @$filter["z_PatId"];
		$this->PatId->AdvancedSearch->SearchCondition = @$filter["v_PatId"];
		$this->PatId->AdvancedSearch->SearchValue2 = @$filter["y_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator2 = @$filter["w_PatId"];
		$this->PatId->AdvancedSearch->save();

		// Field PatientId
		$this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
		$this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
		$this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
		$this->PatientId->AdvancedSearch->save();

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

		// Field MobileNo
		$this->MobileNo->AdvancedSearch->SearchValue = @$filter["x_MobileNo"];
		$this->MobileNo->AdvancedSearch->SearchOperator = @$filter["z_MobileNo"];
		$this->MobileNo->AdvancedSearch->SearchCondition = @$filter["v_MobileNo"];
		$this->MobileNo->AdvancedSearch->SearchValue2 = @$filter["y_MobileNo"];
		$this->MobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNo"];
		$this->MobileNo->AdvancedSearch->save();

		// Field ConsultantName
		$this->ConsultantName->AdvancedSearch->SearchValue = @$filter["x_ConsultantName"];
		$this->ConsultantName->AdvancedSearch->SearchOperator = @$filter["z_ConsultantName"];
		$this->ConsultantName->AdvancedSearch->SearchCondition = @$filter["v_ConsultantName"];
		$this->ConsultantName->AdvancedSearch->SearchValue2 = @$filter["y_ConsultantName"];
		$this->ConsultantName->AdvancedSearch->SearchOperator2 = @$filter["w_ConsultantName"];
		$this->ConsultantName->AdvancedSearch->save();

		// Field RefDrName
		$this->RefDrName->AdvancedSearch->SearchValue = @$filter["x_RefDrName"];
		$this->RefDrName->AdvancedSearch->SearchOperator = @$filter["z_RefDrName"];
		$this->RefDrName->AdvancedSearch->SearchCondition = @$filter["v_RefDrName"];
		$this->RefDrName->AdvancedSearch->SearchValue2 = @$filter["y_RefDrName"];
		$this->RefDrName->AdvancedSearch->SearchOperator2 = @$filter["w_RefDrName"];
		$this->RefDrName->AdvancedSearch->save();

		// Field RefDrMobileNo
		$this->RefDrMobileNo->AdvancedSearch->SearchValue = @$filter["x_RefDrMobileNo"];
		$this->RefDrMobileNo->AdvancedSearch->SearchOperator = @$filter["z_RefDrMobileNo"];
		$this->RefDrMobileNo->AdvancedSearch->SearchCondition = @$filter["v_RefDrMobileNo"];
		$this->RefDrMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_RefDrMobileNo"];
		$this->RefDrMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_RefDrMobileNo"];
		$this->RefDrMobileNo->AdvancedSearch->save();

		// Field NewVisitDate
		$this->NewVisitDate->AdvancedSearch->SearchValue = @$filter["x_NewVisitDate"];
		$this->NewVisitDate->AdvancedSearch->SearchOperator = @$filter["z_NewVisitDate"];
		$this->NewVisitDate->AdvancedSearch->SearchCondition = @$filter["v_NewVisitDate"];
		$this->NewVisitDate->AdvancedSearch->SearchValue2 = @$filter["y_NewVisitDate"];
		$this->NewVisitDate->AdvancedSearch->SearchOperator2 = @$filter["w_NewVisitDate"];
		$this->NewVisitDate->AdvancedSearch->save();

		// Field NewVisitYesNo
		$this->NewVisitYesNo->AdvancedSearch->SearchValue = @$filter["x_NewVisitYesNo"];
		$this->NewVisitYesNo->AdvancedSearch->SearchOperator = @$filter["z_NewVisitYesNo"];
		$this->NewVisitYesNo->AdvancedSearch->SearchCondition = @$filter["v_NewVisitYesNo"];
		$this->NewVisitYesNo->AdvancedSearch->SearchValue2 = @$filter["y_NewVisitYesNo"];
		$this->NewVisitYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_NewVisitYesNo"];
		$this->NewVisitYesNo->AdvancedSearch->save();

		// Field Treatment
		$this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
		$this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
		$this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
		$this->Treatment->AdvancedSearch->save();

		// Field IUIDoneDate1
		$this->IUIDoneDate1->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate1"];
		$this->IUIDoneDate1->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate1"];
		$this->IUIDoneDate1->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate1"];
		$this->IUIDoneDate1->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate1"];
		$this->IUIDoneDate1->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate1"];
		$this->IUIDoneDate1->AdvancedSearch->save();

		// Field IUIDoneYesNo1
		$this->IUIDoneYesNo1->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo1"];
		$this->IUIDoneYesNo1->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo1"];
		$this->IUIDoneYesNo1->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo1"];
		$this->IUIDoneYesNo1->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo1"];
		$this->IUIDoneYesNo1->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo1"];
		$this->IUIDoneYesNo1->AdvancedSearch->save();

		// Field UPTTestDate1
		$this->UPTTestDate1->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate1"];
		$this->UPTTestDate1->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate1"];
		$this->UPTTestDate1->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate1"];
		$this->UPTTestDate1->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate1"];
		$this->UPTTestDate1->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate1"];
		$this->UPTTestDate1->AdvancedSearch->save();

		// Field UPTTestYesNo1
		$this->UPTTestYesNo1->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo1"];
		$this->UPTTestYesNo1->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo1"];
		$this->UPTTestYesNo1->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo1"];
		$this->UPTTestYesNo1->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo1"];
		$this->UPTTestYesNo1->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo1"];
		$this->UPTTestYesNo1->AdvancedSearch->save();

		// Field IUIDoneDate2
		$this->IUIDoneDate2->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate2"];
		$this->IUIDoneDate2->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate2"];
		$this->IUIDoneDate2->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate2"];
		$this->IUIDoneDate2->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate2"];
		$this->IUIDoneDate2->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate2"];
		$this->IUIDoneDate2->AdvancedSearch->save();

		// Field IUIDoneYesNo2
		$this->IUIDoneYesNo2->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo2"];
		$this->IUIDoneYesNo2->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo2"];
		$this->IUIDoneYesNo2->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo2"];
		$this->IUIDoneYesNo2->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo2"];
		$this->IUIDoneYesNo2->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo2"];
		$this->IUIDoneYesNo2->AdvancedSearch->save();

		// Field UPTTestDate2
		$this->UPTTestDate2->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate2"];
		$this->UPTTestDate2->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate2"];
		$this->UPTTestDate2->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate2"];
		$this->UPTTestDate2->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate2"];
		$this->UPTTestDate2->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate2"];
		$this->UPTTestDate2->AdvancedSearch->save();

		// Field UPTTestYesNo2
		$this->UPTTestYesNo2->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo2"];
		$this->UPTTestYesNo2->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo2"];
		$this->UPTTestYesNo2->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo2"];
		$this->UPTTestYesNo2->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo2"];
		$this->UPTTestYesNo2->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo2"];
		$this->UPTTestYesNo2->AdvancedSearch->save();

		// Field IUIDoneDate3
		$this->IUIDoneDate3->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate3"];
		$this->IUIDoneDate3->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate3"];
		$this->IUIDoneDate3->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate3"];
		$this->IUIDoneDate3->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate3"];
		$this->IUIDoneDate3->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate3"];
		$this->IUIDoneDate3->AdvancedSearch->save();

		// Field IUIDoneYesNo3
		$this->IUIDoneYesNo3->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo3"];
		$this->IUIDoneYesNo3->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo3"];
		$this->IUIDoneYesNo3->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo3"];
		$this->IUIDoneYesNo3->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo3"];
		$this->IUIDoneYesNo3->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo3"];
		$this->IUIDoneYesNo3->AdvancedSearch->save();

		// Field UPTTestDate3
		$this->UPTTestDate3->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate3"];
		$this->UPTTestDate3->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate3"];
		$this->UPTTestDate3->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate3"];
		$this->UPTTestDate3->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate3"];
		$this->UPTTestDate3->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate3"];
		$this->UPTTestDate3->AdvancedSearch->save();

		// Field UPTTestYesNo3
		$this->UPTTestYesNo3->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo3"];
		$this->UPTTestYesNo3->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo3"];
		$this->UPTTestYesNo3->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo3"];
		$this->UPTTestYesNo3->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo3"];
		$this->UPTTestYesNo3->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo3"];
		$this->UPTTestYesNo3->AdvancedSearch->save();

		// Field IUIDoneDate4
		$this->IUIDoneDate4->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate4"];
		$this->IUIDoneDate4->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate4"];
		$this->IUIDoneDate4->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate4"];
		$this->IUIDoneDate4->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate4"];
		$this->IUIDoneDate4->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate4"];
		$this->IUIDoneDate4->AdvancedSearch->save();

		// Field IUIDoneYesNo4
		$this->IUIDoneYesNo4->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo4"];
		$this->IUIDoneYesNo4->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo4"];
		$this->IUIDoneYesNo4->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo4"];
		$this->IUIDoneYesNo4->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo4"];
		$this->IUIDoneYesNo4->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo4"];
		$this->IUIDoneYesNo4->AdvancedSearch->save();

		// Field UPTTestDate4
		$this->UPTTestDate4->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate4"];
		$this->UPTTestDate4->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate4"];
		$this->UPTTestDate4->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate4"];
		$this->UPTTestDate4->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate4"];
		$this->UPTTestDate4->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate4"];
		$this->UPTTestDate4->AdvancedSearch->save();

		// Field UPTTestYesNo4
		$this->UPTTestYesNo4->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo4"];
		$this->UPTTestYesNo4->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo4"];
		$this->UPTTestYesNo4->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo4"];
		$this->UPTTestYesNo4->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo4"];
		$this->UPTTestYesNo4->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo4"];
		$this->UPTTestYesNo4->AdvancedSearch->save();

		// Field IVFStimulationDate
		$this->IVFStimulationDate->AdvancedSearch->SearchValue = @$filter["x_IVFStimulationDate"];
		$this->IVFStimulationDate->AdvancedSearch->SearchOperator = @$filter["z_IVFStimulationDate"];
		$this->IVFStimulationDate->AdvancedSearch->SearchCondition = @$filter["v_IVFStimulationDate"];
		$this->IVFStimulationDate->AdvancedSearch->SearchValue2 = @$filter["y_IVFStimulationDate"];
		$this->IVFStimulationDate->AdvancedSearch->SearchOperator2 = @$filter["w_IVFStimulationDate"];
		$this->IVFStimulationDate->AdvancedSearch->save();

		// Field IVFStimulationYesNo
		$this->IVFStimulationYesNo->AdvancedSearch->SearchValue = @$filter["x_IVFStimulationYesNo"];
		$this->IVFStimulationYesNo->AdvancedSearch->SearchOperator = @$filter["z_IVFStimulationYesNo"];
		$this->IVFStimulationYesNo->AdvancedSearch->SearchCondition = @$filter["v_IVFStimulationYesNo"];
		$this->IVFStimulationYesNo->AdvancedSearch->SearchValue2 = @$filter["y_IVFStimulationYesNo"];
		$this->IVFStimulationYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_IVFStimulationYesNo"];
		$this->IVFStimulationYesNo->AdvancedSearch->save();

		// Field OPUDate
		$this->OPUDate->AdvancedSearch->SearchValue = @$filter["x_OPUDate"];
		$this->OPUDate->AdvancedSearch->SearchOperator = @$filter["z_OPUDate"];
		$this->OPUDate->AdvancedSearch->SearchCondition = @$filter["v_OPUDate"];
		$this->OPUDate->AdvancedSearch->SearchValue2 = @$filter["y_OPUDate"];
		$this->OPUDate->AdvancedSearch->SearchOperator2 = @$filter["w_OPUDate"];
		$this->OPUDate->AdvancedSearch->save();

		// Field OPUYesNo
		$this->OPUYesNo->AdvancedSearch->SearchValue = @$filter["x_OPUYesNo"];
		$this->OPUYesNo->AdvancedSearch->SearchOperator = @$filter["z_OPUYesNo"];
		$this->OPUYesNo->AdvancedSearch->SearchCondition = @$filter["v_OPUYesNo"];
		$this->OPUYesNo->AdvancedSearch->SearchValue2 = @$filter["y_OPUYesNo"];
		$this->OPUYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_OPUYesNo"];
		$this->OPUYesNo->AdvancedSearch->save();

		// Field ETDate
		$this->ETDate->AdvancedSearch->SearchValue = @$filter["x_ETDate"];
		$this->ETDate->AdvancedSearch->SearchOperator = @$filter["z_ETDate"];
		$this->ETDate->AdvancedSearch->SearchCondition = @$filter["v_ETDate"];
		$this->ETDate->AdvancedSearch->SearchValue2 = @$filter["y_ETDate"];
		$this->ETDate->AdvancedSearch->SearchOperator2 = @$filter["w_ETDate"];
		$this->ETDate->AdvancedSearch->save();

		// Field ETYesNo
		$this->ETYesNo->AdvancedSearch->SearchValue = @$filter["x_ETYesNo"];
		$this->ETYesNo->AdvancedSearch->SearchOperator = @$filter["z_ETYesNo"];
		$this->ETYesNo->AdvancedSearch->SearchCondition = @$filter["v_ETYesNo"];
		$this->ETYesNo->AdvancedSearch->SearchValue2 = @$filter["y_ETYesNo"];
		$this->ETYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_ETYesNo"];
		$this->ETYesNo->AdvancedSearch->save();

		// Field BetaHCGDate
		$this->BetaHCGDate->AdvancedSearch->SearchValue = @$filter["x_BetaHCGDate"];
		$this->BetaHCGDate->AdvancedSearch->SearchOperator = @$filter["z_BetaHCGDate"];
		$this->BetaHCGDate->AdvancedSearch->SearchCondition = @$filter["v_BetaHCGDate"];
		$this->BetaHCGDate->AdvancedSearch->SearchValue2 = @$filter["y_BetaHCGDate"];
		$this->BetaHCGDate->AdvancedSearch->SearchOperator2 = @$filter["w_BetaHCGDate"];
		$this->BetaHCGDate->AdvancedSearch->save();

		// Field BetaHCGYesNo
		$this->BetaHCGYesNo->AdvancedSearch->SearchValue = @$filter["x_BetaHCGYesNo"];
		$this->BetaHCGYesNo->AdvancedSearch->SearchOperator = @$filter["z_BetaHCGYesNo"];
		$this->BetaHCGYesNo->AdvancedSearch->SearchCondition = @$filter["v_BetaHCGYesNo"];
		$this->BetaHCGYesNo->AdvancedSearch->SearchValue2 = @$filter["y_BetaHCGYesNo"];
		$this->BetaHCGYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_BetaHCGYesNo"];
		$this->BetaHCGYesNo->AdvancedSearch->save();

		// Field FETDate
		$this->FETDate->AdvancedSearch->SearchValue = @$filter["x_FETDate"];
		$this->FETDate->AdvancedSearch->SearchOperator = @$filter["z_FETDate"];
		$this->FETDate->AdvancedSearch->SearchCondition = @$filter["v_FETDate"];
		$this->FETDate->AdvancedSearch->SearchValue2 = @$filter["y_FETDate"];
		$this->FETDate->AdvancedSearch->SearchOperator2 = @$filter["w_FETDate"];
		$this->FETDate->AdvancedSearch->save();

		// Field FETYesNo
		$this->FETYesNo->AdvancedSearch->SearchValue = @$filter["x_FETYesNo"];
		$this->FETYesNo->AdvancedSearch->SearchOperator = @$filter["z_FETYesNo"];
		$this->FETYesNo->AdvancedSearch->SearchCondition = @$filter["v_FETYesNo"];
		$this->FETYesNo->AdvancedSearch->SearchValue2 = @$filter["y_FETYesNo"];
		$this->FETYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_FETYesNo"];
		$this->FETYesNo->AdvancedSearch->save();

		// Field FBetaHCGDate
		$this->FBetaHCGDate->AdvancedSearch->SearchValue = @$filter["x_FBetaHCGDate"];
		$this->FBetaHCGDate->AdvancedSearch->SearchOperator = @$filter["z_FBetaHCGDate"];
		$this->FBetaHCGDate->AdvancedSearch->SearchCondition = @$filter["v_FBetaHCGDate"];
		$this->FBetaHCGDate->AdvancedSearch->SearchValue2 = @$filter["y_FBetaHCGDate"];
		$this->FBetaHCGDate->AdvancedSearch->SearchOperator2 = @$filter["w_FBetaHCGDate"];
		$this->FBetaHCGDate->AdvancedSearch->save();

		// Field FBetaHCGYesNo
		$this->FBetaHCGYesNo->AdvancedSearch->SearchValue = @$filter["x_FBetaHCGYesNo"];
		$this->FBetaHCGYesNo->AdvancedSearch->SearchOperator = @$filter["z_FBetaHCGYesNo"];
		$this->FBetaHCGYesNo->AdvancedSearch->SearchCondition = @$filter["v_FBetaHCGYesNo"];
		$this->FBetaHCGYesNo->AdvancedSearch->SearchValue2 = @$filter["y_FBetaHCGYesNo"];
		$this->FBetaHCGYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_FBetaHCGYesNo"];
		$this->FBetaHCGYesNo->AdvancedSearch->save();

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

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MobileNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ConsultantName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefDrName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefDrMobileNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NewVisitYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUIDoneYesNo1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UPTTestYesNo1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUIDoneYesNo2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UPTTestYesNo2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUIDoneYesNo3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UPTTestYesNo3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUIDoneYesNo4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UPTTestYesNo4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IVFStimulationYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OPUYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ETYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BetaHCGYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FETYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBetaHCGYesNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
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
			$this->updateSort($this->PatId); // PatId
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->MobileNo); // MobileNo
			$this->updateSort($this->ConsultantName); // ConsultantName
			$this->updateSort($this->RefDrName); // RefDrName
			$this->updateSort($this->RefDrMobileNo); // RefDrMobileNo
			$this->updateSort($this->NewVisitDate); // NewVisitDate
			$this->updateSort($this->NewVisitYesNo); // NewVisitYesNo
			$this->updateSort($this->Treatment); // Treatment
			$this->updateSort($this->IUIDoneDate1); // IUIDoneDate1
			$this->updateSort($this->IUIDoneYesNo1); // IUIDoneYesNo1
			$this->updateSort($this->UPTTestDate1); // UPTTestDate1
			$this->updateSort($this->UPTTestYesNo1); // UPTTestYesNo1
			$this->updateSort($this->IUIDoneDate2); // IUIDoneDate2
			$this->updateSort($this->IUIDoneYesNo2); // IUIDoneYesNo2
			$this->updateSort($this->UPTTestDate2); // UPTTestDate2
			$this->updateSort($this->UPTTestYesNo2); // UPTTestYesNo2
			$this->updateSort($this->IUIDoneDate3); // IUIDoneDate3
			$this->updateSort($this->IUIDoneYesNo3); // IUIDoneYesNo3
			$this->updateSort($this->UPTTestDate3); // UPTTestDate3
			$this->updateSort($this->UPTTestYesNo3); // UPTTestYesNo3
			$this->updateSort($this->IUIDoneDate4); // IUIDoneDate4
			$this->updateSort($this->IUIDoneYesNo4); // IUIDoneYesNo4
			$this->updateSort($this->UPTTestDate4); // UPTTestDate4
			$this->updateSort($this->UPTTestYesNo4); // UPTTestYesNo4
			$this->updateSort($this->IVFStimulationDate); // IVFStimulationDate
			$this->updateSort($this->IVFStimulationYesNo); // IVFStimulationYesNo
			$this->updateSort($this->OPUDate); // OPUDate
			$this->updateSort($this->OPUYesNo); // OPUYesNo
			$this->updateSort($this->ETDate); // ETDate
			$this->updateSort($this->ETYesNo); // ETYesNo
			$this->updateSort($this->BetaHCGDate); // BetaHCGDate
			$this->updateSort($this->BetaHCGYesNo); // BetaHCGYesNo
			$this->updateSort($this->FETDate); // FETDate
			$this->updateSort($this->FETYesNo); // FETYesNo
			$this->updateSort($this->FBetaHCGDate); // FBetaHCGDate
			$this->updateSort($this->FBetaHCGYesNo); // FBetaHCGYesNo
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
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
				$this->PatId->setSort("");
				$this->PatientId->setSort("");
				$this->PatientName->setSort("");
				$this->Age->setSort("");
				$this->MobileNo->setSort("");
				$this->ConsultantName->setSort("");
				$this->RefDrName->setSort("");
				$this->RefDrMobileNo->setSort("");
				$this->NewVisitDate->setSort("");
				$this->NewVisitYesNo->setSort("");
				$this->Treatment->setSort("");
				$this->IUIDoneDate1->setSort("");
				$this->IUIDoneYesNo1->setSort("");
				$this->UPTTestDate1->setSort("");
				$this->UPTTestYesNo1->setSort("");
				$this->IUIDoneDate2->setSort("");
				$this->IUIDoneYesNo2->setSort("");
				$this->UPTTestDate2->setSort("");
				$this->UPTTestYesNo2->setSort("");
				$this->IUIDoneDate3->setSort("");
				$this->IUIDoneYesNo3->setSort("");
				$this->UPTTestDate3->setSort("");
				$this->UPTTestYesNo3->setSort("");
				$this->IUIDoneDate4->setSort("");
				$this->IUIDoneYesNo4->setSort("");
				$this->UPTTestDate4->setSort("");
				$this->UPTTestYesNo4->setSort("");
				$this->IVFStimulationDate->setSort("");
				$this->IVFStimulationYesNo->setSort("");
				$this->OPUDate->setSort("");
				$this->OPUYesNo->setSort("");
				$this->ETDate->setSort("");
				$this->ETYesNo->setSort("");
				$this->BetaHCGDate->setSort("");
				$this->BetaHCGYesNo->setSort("");
				$this->FETDate->setSort("");
				$this->FETYesNo->setSort("");
				$this->FBetaHCGDate->setSort("");
				$this->FBetaHCGYesNo->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fmonitor_treatment_planlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fmonitor_treatment_planlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fmonitor_treatment_planlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fmonitor_treatment_planlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->PatId->setDbValue($row['PatId']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->MobileNo->setDbValue($row['MobileNo']);
		$this->ConsultantName->setDbValue($row['ConsultantName']);
		$this->RefDrName->setDbValue($row['RefDrName']);
		$this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
		$this->NewVisitDate->setDbValue($row['NewVisitDate']);
		$this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
		$this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
		$this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
		$this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
		$this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
		$this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
		$this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
		$this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
		$this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
		$this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
		$this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
		$this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
		$this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
		$this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
		$this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
		$this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
		$this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
		$this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
		$this->OPUDate->setDbValue($row['OPUDate']);
		$this->OPUYesNo->setDbValue($row['OPUYesNo']);
		$this->ETDate->setDbValue($row['ETDate']);
		$this->ETYesNo->setDbValue($row['ETYesNo']);
		$this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
		$this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
		$this->FETDate->setDbValue($row['FETDate']);
		$this->FETYesNo->setDbValue($row['FETYesNo']);
		$this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
		$this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatId'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['Age'] = NULL;
		$row['MobileNo'] = NULL;
		$row['ConsultantName'] = NULL;
		$row['RefDrName'] = NULL;
		$row['RefDrMobileNo'] = NULL;
		$row['NewVisitDate'] = NULL;
		$row['NewVisitYesNo'] = NULL;
		$row['Treatment'] = NULL;
		$row['IUIDoneDate1'] = NULL;
		$row['IUIDoneYesNo1'] = NULL;
		$row['UPTTestDate1'] = NULL;
		$row['UPTTestYesNo1'] = NULL;
		$row['IUIDoneDate2'] = NULL;
		$row['IUIDoneYesNo2'] = NULL;
		$row['UPTTestDate2'] = NULL;
		$row['UPTTestYesNo2'] = NULL;
		$row['IUIDoneDate3'] = NULL;
		$row['IUIDoneYesNo3'] = NULL;
		$row['UPTTestDate3'] = NULL;
		$row['UPTTestYesNo3'] = NULL;
		$row['IUIDoneDate4'] = NULL;
		$row['IUIDoneYesNo4'] = NULL;
		$row['UPTTestDate4'] = NULL;
		$row['UPTTestYesNo4'] = NULL;
		$row['IVFStimulationDate'] = NULL;
		$row['IVFStimulationYesNo'] = NULL;
		$row['OPUDate'] = NULL;
		$row['OPUYesNo'] = NULL;
		$row['ETDate'] = NULL;
		$row['ETYesNo'] = NULL;
		$row['BetaHCGDate'] = NULL;
		$row['BetaHCGYesNo'] = NULL;
		$row['FETDate'] = NULL;
		$row['FETYesNo'] = NULL;
		$row['FBetaHCGDate'] = NULL;
		$row['FBetaHCGYesNo'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
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
		// PatId
		// PatientId
		// PatientName
		// Age
		// MobileNo
		// ConsultantName
		// RefDrName
		// RefDrMobileNo
		// NewVisitDate
		// NewVisitYesNo
		// Treatment
		// IUIDoneDate1
		// IUIDoneYesNo1
		// UPTTestDate1
		// UPTTestYesNo1
		// IUIDoneDate2
		// IUIDoneYesNo2
		// UPTTestDate2
		// UPTTestYesNo2
		// IUIDoneDate3
		// IUIDoneYesNo3
		// UPTTestDate3
		// UPTTestYesNo3
		// IUIDoneDate4
		// IUIDoneYesNo4
		// UPTTestDate4
		// UPTTestYesNo4
		// IVFStimulationDate
		// IVFStimulationYesNo
		// OPUDate
		// OPUYesNo
		// ETDate
		// ETYesNo
		// BetaHCGDate
		// BetaHCGYesNo
		// FETDate
		// FETYesNo
		// FBetaHCGDate
		// FBetaHCGYesNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

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

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// MobileNo
			$this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
			$this->MobileNo->ViewCustomAttributes = "";

			// ConsultantName
			$this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
			$this->ConsultantName->ViewCustomAttributes = "";

			// RefDrName
			$this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
			$this->RefDrName->ViewCustomAttributes = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
			$this->RefDrMobileNo->ViewCustomAttributes = "";

			// NewVisitDate
			$this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
			$this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
			$this->NewVisitDate->ViewCustomAttributes = "";

			// NewVisitYesNo
			if (strval($this->NewVisitYesNo->CurrentValue) <> "") {
				$this->NewVisitYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->NewVisitYesNo->ViewValue = NULL;
			}
			$this->NewVisitYesNo->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) <> "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
			$this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
			$this->IUIDoneDate1->ViewCustomAttributes = "";

			// IUIDoneYesNo1
			if (strval($this->IUIDoneYesNo1->CurrentValue) <> "") {
				$this->IUIDoneYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo1->ViewValue = NULL;
			}
			$this->IUIDoneYesNo1->ViewCustomAttributes = "";

			// UPTTestDate1
			$this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
			$this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
			$this->UPTTestDate1->ViewCustomAttributes = "";

			// UPTTestYesNo1
			if (strval($this->UPTTestYesNo1->CurrentValue) <> "") {
				$this->UPTTestYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo1->ViewValue = NULL;
			}
			$this->UPTTestYesNo1->ViewCustomAttributes = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
			$this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
			$this->IUIDoneDate2->ViewCustomAttributes = "";

			// IUIDoneYesNo2
			if (strval($this->IUIDoneYesNo2->CurrentValue) <> "") {
				$this->IUIDoneYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo2->ViewValue = NULL;
			}
			$this->IUIDoneYesNo2->ViewCustomAttributes = "";

			// UPTTestDate2
			$this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
			$this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
			$this->UPTTestDate2->ViewCustomAttributes = "";

			// UPTTestYesNo2
			if (strval($this->UPTTestYesNo2->CurrentValue) <> "") {
				$this->UPTTestYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo2->ViewValue = NULL;
			}
			$this->UPTTestYesNo2->ViewCustomAttributes = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
			$this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
			$this->IUIDoneDate3->ViewCustomAttributes = "";

			// IUIDoneYesNo3
			if (strval($this->IUIDoneYesNo3->CurrentValue) <> "") {
				$this->IUIDoneYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo3->ViewValue = NULL;
			}
			$this->IUIDoneYesNo3->ViewCustomAttributes = "";

			// UPTTestDate3
			$this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
			$this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
			$this->UPTTestDate3->ViewCustomAttributes = "";

			// UPTTestYesNo3
			if (strval($this->UPTTestYesNo3->CurrentValue) <> "") {
				$this->UPTTestYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo3->ViewValue = NULL;
			}
			$this->UPTTestYesNo3->ViewCustomAttributes = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
			$this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
			$this->IUIDoneDate4->ViewCustomAttributes = "";

			// IUIDoneYesNo4
			if (strval($this->IUIDoneYesNo4->CurrentValue) <> "") {
				$this->IUIDoneYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo4->ViewValue = NULL;
			}
			$this->IUIDoneYesNo4->ViewCustomAttributes = "";

			// UPTTestDate4
			$this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
			$this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
			$this->UPTTestDate4->ViewCustomAttributes = "";

			// UPTTestYesNo4
			if (strval($this->UPTTestYesNo4->CurrentValue) <> "") {
				$this->UPTTestYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo4->ViewValue = NULL;
			}
			$this->UPTTestYesNo4->ViewCustomAttributes = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
			$this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
			$this->IVFStimulationDate->ViewCustomAttributes = "";

			// IVFStimulationYesNo
			if (strval($this->IVFStimulationYesNo->CurrentValue) <> "") {
				$this->IVFStimulationYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IVFStimulationYesNo->ViewValue = NULL;
			}
			$this->IVFStimulationYesNo->ViewCustomAttributes = "";

			// OPUDate
			$this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
			$this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
			$this->OPUDate->ViewCustomAttributes = "";

			// OPUYesNo
			if (strval($this->OPUYesNo->CurrentValue) <> "") {
				$this->OPUYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OPUYesNo->ViewValue = NULL;
			}
			$this->OPUYesNo->ViewCustomAttributes = "";

			// ETDate
			$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
			$this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
			$this->ETDate->ViewCustomAttributes = "";

			// ETYesNo
			if (strval($this->ETYesNo->CurrentValue) <> "") {
				$this->ETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ETYesNo->ViewValue = NULL;
			}
			$this->ETYesNo->ViewCustomAttributes = "";

			// BetaHCGDate
			$this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
			$this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
			$this->BetaHCGDate->ViewCustomAttributes = "";

			// BetaHCGYesNo
			if (strval($this->BetaHCGYesNo->CurrentValue) <> "") {
				$this->BetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->BetaHCGYesNo->ViewValue = NULL;
			}
			$this->BetaHCGYesNo->ViewCustomAttributes = "";

			// FETDate
			$this->FETDate->ViewValue = $this->FETDate->CurrentValue;
			$this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
			$this->FETDate->ViewCustomAttributes = "";

			// FETYesNo
			if (strval($this->FETYesNo->CurrentValue) <> "") {
				$this->FETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FETYesNo->ViewValue = NULL;
			}
			$this->FETYesNo->ViewCustomAttributes = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
			$this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
			$this->FBetaHCGDate->ViewCustomAttributes = "";

			// FBetaHCGYesNo
			if (strval($this->FBetaHCGYesNo->CurrentValue) <> "") {
				$this->FBetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FBetaHCGYesNo->ViewValue = NULL;
			}
			$this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// MobileNo
			$this->MobileNo->LinkCustomAttributes = "";
			$this->MobileNo->HrefValue = "";
			$this->MobileNo->TooltipValue = "";

			// ConsultantName
			$this->ConsultantName->LinkCustomAttributes = "";
			$this->ConsultantName->HrefValue = "";
			$this->ConsultantName->TooltipValue = "";

			// RefDrName
			$this->RefDrName->LinkCustomAttributes = "";
			$this->RefDrName->HrefValue = "";
			$this->RefDrName->TooltipValue = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->LinkCustomAttributes = "";
			$this->RefDrMobileNo->HrefValue = "";
			$this->RefDrMobileNo->TooltipValue = "";

			// NewVisitDate
			$this->NewVisitDate->LinkCustomAttributes = "";
			$this->NewVisitDate->HrefValue = "";
			$this->NewVisitDate->TooltipValue = "";

			// NewVisitYesNo
			$this->NewVisitYesNo->LinkCustomAttributes = "";
			$this->NewVisitYesNo->HrefValue = "";
			$this->NewVisitYesNo->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->LinkCustomAttributes = "";
			$this->IUIDoneDate1->HrefValue = "";
			$this->IUIDoneDate1->TooltipValue = "";

			// IUIDoneYesNo1
			$this->IUIDoneYesNo1->LinkCustomAttributes = "";
			$this->IUIDoneYesNo1->HrefValue = "";
			$this->IUIDoneYesNo1->TooltipValue = "";

			// UPTTestDate1
			$this->UPTTestDate1->LinkCustomAttributes = "";
			$this->UPTTestDate1->HrefValue = "";
			$this->UPTTestDate1->TooltipValue = "";

			// UPTTestYesNo1
			$this->UPTTestYesNo1->LinkCustomAttributes = "";
			$this->UPTTestYesNo1->HrefValue = "";
			$this->UPTTestYesNo1->TooltipValue = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->LinkCustomAttributes = "";
			$this->IUIDoneDate2->HrefValue = "";
			$this->IUIDoneDate2->TooltipValue = "";

			// IUIDoneYesNo2
			$this->IUIDoneYesNo2->LinkCustomAttributes = "";
			$this->IUIDoneYesNo2->HrefValue = "";
			$this->IUIDoneYesNo2->TooltipValue = "";

			// UPTTestDate2
			$this->UPTTestDate2->LinkCustomAttributes = "";
			$this->UPTTestDate2->HrefValue = "";
			$this->UPTTestDate2->TooltipValue = "";

			// UPTTestYesNo2
			$this->UPTTestYesNo2->LinkCustomAttributes = "";
			$this->UPTTestYesNo2->HrefValue = "";
			$this->UPTTestYesNo2->TooltipValue = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->LinkCustomAttributes = "";
			$this->IUIDoneDate3->HrefValue = "";
			$this->IUIDoneDate3->TooltipValue = "";

			// IUIDoneYesNo3
			$this->IUIDoneYesNo3->LinkCustomAttributes = "";
			$this->IUIDoneYesNo3->HrefValue = "";
			$this->IUIDoneYesNo3->TooltipValue = "";

			// UPTTestDate3
			$this->UPTTestDate3->LinkCustomAttributes = "";
			$this->UPTTestDate3->HrefValue = "";
			$this->UPTTestDate3->TooltipValue = "";

			// UPTTestYesNo3
			$this->UPTTestYesNo3->LinkCustomAttributes = "";
			$this->UPTTestYesNo3->HrefValue = "";
			$this->UPTTestYesNo3->TooltipValue = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->LinkCustomAttributes = "";
			$this->IUIDoneDate4->HrefValue = "";
			$this->IUIDoneDate4->TooltipValue = "";

			// IUIDoneYesNo4
			$this->IUIDoneYesNo4->LinkCustomAttributes = "";
			$this->IUIDoneYesNo4->HrefValue = "";
			$this->IUIDoneYesNo4->TooltipValue = "";

			// UPTTestDate4
			$this->UPTTestDate4->LinkCustomAttributes = "";
			$this->UPTTestDate4->HrefValue = "";
			$this->UPTTestDate4->TooltipValue = "";

			// UPTTestYesNo4
			$this->UPTTestYesNo4->LinkCustomAttributes = "";
			$this->UPTTestYesNo4->HrefValue = "";
			$this->UPTTestYesNo4->TooltipValue = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->LinkCustomAttributes = "";
			$this->IVFStimulationDate->HrefValue = "";
			$this->IVFStimulationDate->TooltipValue = "";

			// IVFStimulationYesNo
			$this->IVFStimulationYesNo->LinkCustomAttributes = "";
			$this->IVFStimulationYesNo->HrefValue = "";
			$this->IVFStimulationYesNo->TooltipValue = "";

			// OPUDate
			$this->OPUDate->LinkCustomAttributes = "";
			$this->OPUDate->HrefValue = "";
			$this->OPUDate->TooltipValue = "";

			// OPUYesNo
			$this->OPUYesNo->LinkCustomAttributes = "";
			$this->OPUYesNo->HrefValue = "";
			$this->OPUYesNo->TooltipValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";
			$this->ETDate->TooltipValue = "";

			// ETYesNo
			$this->ETYesNo->LinkCustomAttributes = "";
			$this->ETYesNo->HrefValue = "";
			$this->ETYesNo->TooltipValue = "";

			// BetaHCGDate
			$this->BetaHCGDate->LinkCustomAttributes = "";
			$this->BetaHCGDate->HrefValue = "";
			$this->BetaHCGDate->TooltipValue = "";

			// BetaHCGYesNo
			$this->BetaHCGYesNo->LinkCustomAttributes = "";
			$this->BetaHCGYesNo->HrefValue = "";
			$this->BetaHCGYesNo->TooltipValue = "";

			// FETDate
			$this->FETDate->LinkCustomAttributes = "";
			$this->FETDate->HrefValue = "";
			$this->FETDate->TooltipValue = "";

			// FETYesNo
			$this->FETYesNo->LinkCustomAttributes = "";
			$this->FETYesNo->HrefValue = "";
			$this->FETYesNo->TooltipValue = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->LinkCustomAttributes = "";
			$this->FBetaHCGDate->HrefValue = "";
			$this->FBetaHCGDate->TooltipValue = "";

			// FBetaHCGYesNo
			$this->FBetaHCGYesNo->LinkCustomAttributes = "";
			$this->FBetaHCGYesNo->HrefValue = "";
			$this->FBetaHCGYesNo->TooltipValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fmonitor_treatment_planlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fmonitor_treatment_planlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fmonitor_treatment_planlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_monitor_treatment_plan\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_monitor_treatment_plan',hdr:ew.language.phrase('ExportToEmailText'),f:document.fmonitor_treatment_planlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_PatId":
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
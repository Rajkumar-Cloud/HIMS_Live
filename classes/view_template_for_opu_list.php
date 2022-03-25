<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_template_for_opu_list extends view_template_for_opu
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_template_for_opu';

	// Page object name
	public $PageObjName = "view_template_for_opu_list";

	// Grid form hidden field names
	public $FormName = "fview_template_for_opulist";
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

		// Table object (view_template_for_opu)
		if (!isset($GLOBALS["view_template_for_opu"]) || get_class($GLOBALS["view_template_for_opu"]) == PROJECT_NAMESPACE . "view_template_for_opu") {
			$GLOBALS["view_template_for_opu"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_template_for_opu"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_template_for_opuadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_template_for_opudelete.php";
		$this->MultiUpdateUrl = "view_template_for_opuupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_template_for_opu');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_template_for_opulistsrch";

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
		global $EXPORT, $view_template_for_opu;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_template_for_opu);
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
		$this->RIDNO->setVisibility();
		$this->Treatment->setVisibility();
		$this->Origin->setVisibility();
		$this->MaleIndications->setVisibility();
		$this->FemaleIndications->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->A4ICSICycle->setVisibility();
		$this->TotalICSICycle->setVisibility();
		$this->TypeOfInfertility->setVisibility();
		$this->RelevantHistory->setVisibility();
		$this->IUICycles->setVisibility();
		$this->AMH->setVisibility();
		$this->FBMI->setVisibility();
		$this->ANTAGONISTSTARTDAY->setVisibility();
		$this->OvarianSurgery->setVisibility();
		$this->OPUDATE->setVisibility();
		$this->RFSH1->setVisibility();
		$this->RFSH2->setVisibility();
		$this->RFSH3->setVisibility();
		$this->E21->setVisibility();
		$this->Hysteroscopy->setVisibility();
		$this->HospID->setVisibility();
		$this->Fweight->setVisibility();
		$this->AntiTPO->setVisibility();
		$this->AntiTG->setVisibility();
		$this->PatientAge->setVisibility();
		$this->PartnerAge->setVisibility();
		$this->CYCLES->Visible = FALSE;
		$this->MF->Visible = FALSE;
		$this->CauseOfINFERTILITY->Visible = FALSE;
		$this->SIS->Visible = FALSE;
		$this->Scratching->Visible = FALSE;
		$this->Cannulation->Visible = FALSE;
		$this->MEPRATE->Visible = FALSE;
		$this->R_OVARY->setVisibility();
		$this->R_AFC->setVisibility();
		$this->L_OVARY->setVisibility();
		$this->L_AFC->setVisibility();
		$this->LH1->Visible = FALSE;
		$this->E2->setVisibility();
		$this->StemCellInstallation->Visible = FALSE;
		$this->DHEAS->Visible = FALSE;
		$this->Mtorr->Visible = FALSE;
		$this->AMH1->setVisibility();
		$this->LH->Visible = FALSE;
		$this->BMI28MALE29->setVisibility();
		$this->MaleMedicalConditions->setVisibility();
		$this->MaleExamination->Visible = FALSE;
		$this->SpermConcentration->Visible = FALSE;
		$this->SpermMotility28P26NP29->Visible = FALSE;
		$this->SpermMorphology->Visible = FALSE;
		$this->SpermRetrival->Visible = FALSE;
		$this->M_Testosterone->Visible = FALSE;
		$this->DFI->Visible = FALSE;
		$this->PreRX->Visible = FALSE;
		$this->CC_100->setVisibility();
		$this->RFSH1A->setVisibility();
		$this->HMG1->setVisibility();
		$this->RLH->Visible = FALSE;
		$this->HMG_HP->Visible = FALSE;
		$this->day_of_HMG->Visible = FALSE;
		$this->Reason_for_HMG->Visible = FALSE;
		$this->RLH_day->Visible = FALSE;
		$this->DAYSOFSTIMULATION->setVisibility();
		$this->Any_change_inbetween_28_Dose_added_2C_day29->Visible = FALSE;
		$this->day_of_Anta->Visible = FALSE;
		$this->R_FSH_TD->Visible = FALSE;
		$this->R_FSH_2B_HMG_TD->Visible = FALSE;
		$this->R_FSH_2B_R_LH_TD->Visible = FALSE;
		$this->HMG_TD->Visible = FALSE;
		$this->LH_TD->Visible = FALSE;
		$this->D1_LH->Visible = FALSE;
		$this->D1_E2->Visible = FALSE;
		$this->Trigger_day_E2->Visible = FALSE;
		$this->Trigger_day_P4->Visible = FALSE;
		$this->Trigger_day_LH->Visible = FALSE;
		$this->VIT_D->Visible = FALSE;
		$this->TRIGGERR->setVisibility();
		$this->BHCG_BEFORE_RETRIEVAL->Visible = FALSE;
		$this->LH__12_HRS->Visible = FALSE;
		$this->P4__12_HRS->Visible = FALSE;
		$this->ET_on_hCG_day->Visible = FALSE;
		$this->ET_doppler->Visible = FALSE;
		$this->VI2FFI2FVFI->Visible = FALSE;
		$this->Endometrial_abnormality->Visible = FALSE;
		$this->AFC_ON_S1->Visible = FALSE;
		$this->TIME_OF_OPU_FROM_TRIGGER->Visible = FALSE;
		$this->SPERM_TYPE->Visible = FALSE;
		$this->EXPECTED_ON_TRIGGER_DAY->Visible = FALSE;
		$this->OOCYTES_RETRIEVED->Visible = FALSE;
		$this->TIME_OF_DENUDATION->Visible = FALSE;
		$this->M_II->Visible = FALSE;
		$this->MI->Visible = FALSE;
		$this->GV->Visible = FALSE;
		$this->ICSI_TIME_FORM_OPU->Visible = FALSE;
		$this->FERT_28_2_PN_29->Visible = FALSE;
		$this->DEG->Visible = FALSE;
		$this->D3_GRADE_A->Visible = FALSE;
		$this->D3_GRADE_B->Visible = FALSE;
		$this->D3_GRADE_C->Visible = FALSE;
		$this->D3_GRADE_D->Visible = FALSE;
		$this->USABLE_ON_DAY_3_ET->Visible = FALSE;
		$this->USABLE_ON_day_3_FREEZING->Visible = FALSE;
		$this->D5_GARDE_A->Visible = FALSE;
		$this->D5_GRADE_B->Visible = FALSE;
		$this->D5_GRADE_C->Visible = FALSE;
		$this->D5_GRADE_D->Visible = FALSE;
		$this->USABLE_ON_D5_ET->Visible = FALSE;
		$this->USABLE_ON_D5_FREEZING->Visible = FALSE;
		$this->D6_GRADE_A->Visible = FALSE;
		$this->D6_GRADE_B->Visible = FALSE;
		$this->D6_GRADE_C->Visible = FALSE;
		$this->D6_GRADE_D->Visible = FALSE;
		$this->D6_USABLE_EMBRYO_ET->Visible = FALSE;
		$this->D6_USABLE_FREEZING->Visible = FALSE;
		$this->TOTAL_BLAST->Visible = FALSE;
		$this->PGS->Visible = FALSE;
		$this->REMARKS->Visible = FALSE;
		$this->PU___D2FB->Visible = FALSE;
		$this->ICSI_D2FB->Visible = FALSE;
		$this->VIT_D2FB->Visible = FALSE;
		$this->ET_D2FB->Visible = FALSE;
		$this->LAB_COMMENTS->Visible = FALSE;
		$this->Reason_for_no_FRESH_transfer->Visible = FALSE;
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->Visible = FALSE;
		$this->EMBRYOS_PENDING->Visible = FALSE;
		$this->DAY_OF_TRANSFER->Visible = FALSE;
		$this->H2FD_sperm->Visible = FALSE;
		$this->Comments->Visible = FALSE;
		$this->sc_progesterone->Visible = FALSE;
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->Visible = FALSE;
		$this->CRINONE->Visible = FALSE;
		$this->progynova->Visible = FALSE;
		$this->Heparin->Visible = FALSE;
		$this->cabergolin->Visible = FALSE;
		$this->Antagonist->Visible = FALSE;
		$this->OHSS->Visible = FALSE;
		$this->Complications->Visible = FALSE;
		$this->LP_bleeding->Visible = FALSE;
		$this->DF_hCG->Visible = FALSE;
		$this->Implantation_rate->Visible = FALSE;
		$this->Ectopic->Visible = FALSE;
		$this->Type_of_preg->Visible = FALSE;
		$this->ANC->Visible = FALSE;
		$this->anomalies->Visible = FALSE;
		$this->baby_wt->Visible = FALSE;
		$this->GA_at_delivery->Visible = FALSE;
		$this->Pregnancy_outcome->Visible = FALSE;
		$this->_1st_FET->Visible = FALSE;
		$this->AFTER_HYSTEROSCOPY->Visible = FALSE;
		$this->AFTER_ERA->Visible = FALSE;
		$this->ERA->Visible = FALSE;
		$this->HRT->Visible = FALSE;
		$this->XGRAST2FPRP->Visible = FALSE;
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Visible = FALSE;
		$this->LMWH_40MG->Visible = FALSE;
		$this->DF_hCG2->Visible = FALSE;
		$this->Implantation_rate1->Visible = FALSE;
		$this->Ectopic1->Visible = FALSE;
		$this->Type_of_pregA->Visible = FALSE;
		$this->ANC1->Visible = FALSE;
		$this->anomalies2->Visible = FALSE;
		$this->baby_wt2->Visible = FALSE;
		$this->GA_at_delivery1->Visible = FALSE;
		$this->Pregnancy_outcome1->Visible = FALSE;
		$this->_2ND_FET->Visible = FALSE;
		$this->AFTER_HYSTEROSCOPY1->Visible = FALSE;
		$this->AFTER_ERA1->Visible = FALSE;
		$this->ERA1->Visible = FALSE;
		$this->HRT1->Visible = FALSE;
		$this->XGRAST2FPRP1->Visible = FALSE;
		$this->NUMBER_OF_EMBRYOS->Visible = FALSE;
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->Visible = FALSE;
		$this->INTRALIPID_AND_BARGLOBIN->Visible = FALSE;
		$this->LMWH_40MG1->Visible = FALSE;
		$this->DF_hCG1->Visible = FALSE;
		$this->Implantation_rate2->Visible = FALSE;
		$this->Ectopic2->Visible = FALSE;
		$this->Type_of_preg2->Visible = FALSE;
		$this->ANCA->Visible = FALSE;
		$this->anomalies1->Visible = FALSE;
		$this->baby_wt1->Visible = FALSE;
		$this->GA_at_delivery2->Visible = FALSE;
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_template_for_opulistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
		$filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
		$filterList = Concat($filterList, $this->MaleIndications->AdvancedSearch->toJson(), ","); // Field MaleIndications
		$filterList = Concat($filterList, $this->FemaleIndications->AdvancedSearch->toJson(), ","); // Field FemaleIndications
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
		$filterList = Concat($filterList, $this->A4ICSICycle->AdvancedSearch->toJson(), ","); // Field A4ICSICycle
		$filterList = Concat($filterList, $this->TotalICSICycle->AdvancedSearch->toJson(), ","); // Field TotalICSICycle
		$filterList = Concat($filterList, $this->TypeOfInfertility->AdvancedSearch->toJson(), ","); // Field TypeOfInfertility
		$filterList = Concat($filterList, $this->RelevantHistory->AdvancedSearch->toJson(), ","); // Field RelevantHistory
		$filterList = Concat($filterList, $this->IUICycles->AdvancedSearch->toJson(), ","); // Field IUICycles
		$filterList = Concat($filterList, $this->AMH->AdvancedSearch->toJson(), ","); // Field AMH
		$filterList = Concat($filterList, $this->FBMI->AdvancedSearch->toJson(), ","); // Field FBMI
		$filterList = Concat($filterList, $this->ANTAGONISTSTARTDAY->AdvancedSearch->toJson(), ","); // Field ANTAGONISTSTARTDAY
		$filterList = Concat($filterList, $this->OvarianSurgery->AdvancedSearch->toJson(), ","); // Field OvarianSurgery
		$filterList = Concat($filterList, $this->OPUDATE->AdvancedSearch->toJson(), ","); // Field OPUDATE
		$filterList = Concat($filterList, $this->RFSH1->AdvancedSearch->toJson(), ","); // Field RFSH1
		$filterList = Concat($filterList, $this->RFSH2->AdvancedSearch->toJson(), ","); // Field RFSH2
		$filterList = Concat($filterList, $this->RFSH3->AdvancedSearch->toJson(), ","); // Field RFSH3
		$filterList = Concat($filterList, $this->E21->AdvancedSearch->toJson(), ","); // Field E21
		$filterList = Concat($filterList, $this->Hysteroscopy->AdvancedSearch->toJson(), ","); // Field Hysteroscopy
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->Fweight->AdvancedSearch->toJson(), ","); // Field Fweight
		$filterList = Concat($filterList, $this->AntiTPO->AdvancedSearch->toJson(), ","); // Field AntiTPO
		$filterList = Concat($filterList, $this->AntiTG->AdvancedSearch->toJson(), ","); // Field AntiTG
		$filterList = Concat($filterList, $this->PatientAge->AdvancedSearch->toJson(), ","); // Field PatientAge
		$filterList = Concat($filterList, $this->PartnerAge->AdvancedSearch->toJson(), ","); // Field PartnerAge
		$filterList = Concat($filterList, $this->CYCLES->AdvancedSearch->toJson(), ","); // Field CYCLES
		$filterList = Concat($filterList, $this->MF->AdvancedSearch->toJson(), ","); // Field MF
		$filterList = Concat($filterList, $this->CauseOfINFERTILITY->AdvancedSearch->toJson(), ","); // Field CauseOfINFERTILITY
		$filterList = Concat($filterList, $this->SIS->AdvancedSearch->toJson(), ","); // Field SIS
		$filterList = Concat($filterList, $this->Scratching->AdvancedSearch->toJson(), ","); // Field Scratching
		$filterList = Concat($filterList, $this->Cannulation->AdvancedSearch->toJson(), ","); // Field Cannulation
		$filterList = Concat($filterList, $this->MEPRATE->AdvancedSearch->toJson(), ","); // Field MEPRATE
		$filterList = Concat($filterList, $this->R_OVARY->AdvancedSearch->toJson(), ","); // Field R.OVARY
		$filterList = Concat($filterList, $this->R_AFC->AdvancedSearch->toJson(), ","); // Field R.AFC
		$filterList = Concat($filterList, $this->L_OVARY->AdvancedSearch->toJson(), ","); // Field L.OVARY
		$filterList = Concat($filterList, $this->L_AFC->AdvancedSearch->toJson(), ","); // Field L.AFC
		$filterList = Concat($filterList, $this->LH1->AdvancedSearch->toJson(), ","); // Field LH1
		$filterList = Concat($filterList, $this->E2->AdvancedSearch->toJson(), ","); // Field E2
		$filterList = Concat($filterList, $this->StemCellInstallation->AdvancedSearch->toJson(), ","); // Field StemCellInstallation
		$filterList = Concat($filterList, $this->DHEAS->AdvancedSearch->toJson(), ","); // Field DHEAS
		$filterList = Concat($filterList, $this->Mtorr->AdvancedSearch->toJson(), ","); // Field Mtorr
		$filterList = Concat($filterList, $this->AMH1->AdvancedSearch->toJson(), ","); // Field AMH1
		$filterList = Concat($filterList, $this->LH->AdvancedSearch->toJson(), ","); // Field LH
		$filterList = Concat($filterList, $this->BMI28MALE29->AdvancedSearch->toJson(), ","); // Field BMI(MALE)
		$filterList = Concat($filterList, $this->MaleMedicalConditions->AdvancedSearch->toJson(), ","); // Field MaleMedicalConditions
		$filterList = Concat($filterList, $this->MaleExamination->AdvancedSearch->toJson(), ","); // Field MaleExamination
		$filterList = Concat($filterList, $this->SpermConcentration->AdvancedSearch->toJson(), ","); // Field SpermConcentration
		$filterList = Concat($filterList, $this->SpermMotility28P26NP29->AdvancedSearch->toJson(), ","); // Field SpermMotility(P&NP)
		$filterList = Concat($filterList, $this->SpermMorphology->AdvancedSearch->toJson(), ","); // Field SpermMorphology
		$filterList = Concat($filterList, $this->SpermRetrival->AdvancedSearch->toJson(), ","); // Field SpermRetrival
		$filterList = Concat($filterList, $this->M_Testosterone->AdvancedSearch->toJson(), ","); // Field M.Testosterone
		$filterList = Concat($filterList, $this->DFI->AdvancedSearch->toJson(), ","); // Field DFI
		$filterList = Concat($filterList, $this->PreRX->AdvancedSearch->toJson(), ","); // Field PreRX
		$filterList = Concat($filterList, $this->CC_100->AdvancedSearch->toJson(), ","); // Field CC 100
		$filterList = Concat($filterList, $this->RFSH1A->AdvancedSearch->toJson(), ","); // Field RFSH1A
		$filterList = Concat($filterList, $this->HMG1->AdvancedSearch->toJson(), ","); // Field HMG1
		$filterList = Concat($filterList, $this->RLH->AdvancedSearch->toJson(), ","); // Field RLH
		$filterList = Concat($filterList, $this->HMG_HP->AdvancedSearch->toJson(), ","); // Field HMG_HP
		$filterList = Concat($filterList, $this->day_of_HMG->AdvancedSearch->toJson(), ","); // Field day_of_HMG
		$filterList = Concat($filterList, $this->Reason_for_HMG->AdvancedSearch->toJson(), ","); // Field Reason_for_HMG
		$filterList = Concat($filterList, $this->RLH_day->AdvancedSearch->toJson(), ","); // Field RLH_day
		$filterList = Concat($filterList, $this->DAYSOFSTIMULATION->AdvancedSearch->toJson(), ","); // Field DAYSOFSTIMULATION
		$filterList = Concat($filterList, $this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->toJson(), ","); // Field Any change inbetween ( Dose added , day)
		$filterList = Concat($filterList, $this->day_of_Anta->AdvancedSearch->toJson(), ","); // Field day of Anta
		$filterList = Concat($filterList, $this->R_FSH_TD->AdvancedSearch->toJson(), ","); // Field R FSH TD
		$filterList = Concat($filterList, $this->R_FSH_2B_HMG_TD->AdvancedSearch->toJson(), ","); // Field R FSH + HMG TD
		$filterList = Concat($filterList, $this->R_FSH_2B_R_LH_TD->AdvancedSearch->toJson(), ","); // Field R FSH + R LH TD
		$filterList = Concat($filterList, $this->HMG_TD->AdvancedSearch->toJson(), ","); // Field HMG TD
		$filterList = Concat($filterList, $this->LH_TD->AdvancedSearch->toJson(), ","); // Field LH TD
		$filterList = Concat($filterList, $this->D1_LH->AdvancedSearch->toJson(), ","); // Field D1 LH
		$filterList = Concat($filterList, $this->D1_E2->AdvancedSearch->toJson(), ","); // Field D1 E2
		$filterList = Concat($filterList, $this->Trigger_day_E2->AdvancedSearch->toJson(), ","); // Field Trigger day E2
		$filterList = Concat($filterList, $this->Trigger_day_P4->AdvancedSearch->toJson(), ","); // Field Trigger day P4
		$filterList = Concat($filterList, $this->Trigger_day_LH->AdvancedSearch->toJson(), ","); // Field Trigger day LH
		$filterList = Concat($filterList, $this->VIT_D->AdvancedSearch->toJson(), ","); // Field VIT-D
		$filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
		$filterList = Concat($filterList, $this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->toJson(), ","); // Field BHCG BEFORE RETRIEVAL
		$filterList = Concat($filterList, $this->LH__12_HRS->AdvancedSearch->toJson(), ","); // Field LH -12 HRS
		$filterList = Concat($filterList, $this->P4__12_HRS->AdvancedSearch->toJson(), ","); // Field P4 -12 HRS
		$filterList = Concat($filterList, $this->ET_on_hCG_day->AdvancedSearch->toJson(), ","); // Field ET on hCG day
		$filterList = Concat($filterList, $this->ET_doppler->AdvancedSearch->toJson(), ","); // Field ET doppler
		$filterList = Concat($filterList, $this->VI2FFI2FVFI->AdvancedSearch->toJson(), ","); // Field VI/FI/VFI
		$filterList = Concat($filterList, $this->Endometrial_abnormality->AdvancedSearch->toJson(), ","); // Field Endometrial abnormality
		$filterList = Concat($filterList, $this->AFC_ON_S1->AdvancedSearch->toJson(), ","); // Field AFC ON S1
		$filterList = Concat($filterList, $this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME OF OPU FROM TRIGGER
		$filterList = Concat($filterList, $this->SPERM_TYPE->AdvancedSearch->toJson(), ","); // Field SPERM TYPE
		$filterList = Concat($filterList, $this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->toJson(), ","); // Field EXPECTED ON TRIGGER DAY
		$filterList = Concat($filterList, $this->OOCYTES_RETRIEVED->AdvancedSearch->toJson(), ","); // Field OOCYTES RETRIEVED
		$filterList = Concat($filterList, $this->TIME_OF_DENUDATION->AdvancedSearch->toJson(), ","); // Field TIME OF DENUDATION
		$filterList = Concat($filterList, $this->M_II->AdvancedSearch->toJson(), ","); // Field M-II
		$filterList = Concat($filterList, $this->MI->AdvancedSearch->toJson(), ","); // Field MI
		$filterList = Concat($filterList, $this->GV->AdvancedSearch->toJson(), ","); // Field GV
		$filterList = Concat($filterList, $this->ICSI_TIME_FORM_OPU->AdvancedSearch->toJson(), ","); // Field ICSI TIME FORM OPU
		$filterList = Concat($filterList, $this->FERT_28_2_PN_29->AdvancedSearch->toJson(), ","); // Field FERT ( 2 PN )
		$filterList = Concat($filterList, $this->DEG->AdvancedSearch->toJson(), ","); // Field DEG
		$filterList = Concat($filterList, $this->D3_GRADE_A->AdvancedSearch->toJson(), ","); // Field D3 GRADE A
		$filterList = Concat($filterList, $this->D3_GRADE_B->AdvancedSearch->toJson(), ","); // Field D3 GRADE B
		$filterList = Concat($filterList, $this->D3_GRADE_C->AdvancedSearch->toJson(), ","); // Field D3 GRADE C
		$filterList = Concat($filterList, $this->D3_GRADE_D->AdvancedSearch->toJson(), ","); // Field D3 GRADE D
		$filterList = Concat($filterList, $this->USABLE_ON_DAY_3_ET->AdvancedSearch->toJson(), ","); // Field USABLE ON DAY 3 ET
		$filterList = Concat($filterList, $this->USABLE_ON_day_3_FREEZING->AdvancedSearch->toJson(), ","); // Field USABLE ON day 3 FREEZING
		$filterList = Concat($filterList, $this->D5_GARDE_A->AdvancedSearch->toJson(), ","); // Field D5 GARDE A
		$filterList = Concat($filterList, $this->D5_GRADE_B->AdvancedSearch->toJson(), ","); // Field D5 GRADE B
		$filterList = Concat($filterList, $this->D5_GRADE_C->AdvancedSearch->toJson(), ","); // Field D5 GRADE C
		$filterList = Concat($filterList, $this->D5_GRADE_D->AdvancedSearch->toJson(), ","); // Field D5 GRADE D
		$filterList = Concat($filterList, $this->USABLE_ON_D5_ET->AdvancedSearch->toJson(), ","); // Field USABLE ON D5 ET
		$filterList = Concat($filterList, $this->USABLE_ON_D5_FREEZING->AdvancedSearch->toJson(), ","); // Field USABLE ON D5 FREEZING
		$filterList = Concat($filterList, $this->D6_GRADE_A->AdvancedSearch->toJson(), ","); // Field D6 GRADE A
		$filterList = Concat($filterList, $this->D6_GRADE_B->AdvancedSearch->toJson(), ","); // Field D6 GRADE B
		$filterList = Concat($filterList, $this->D6_GRADE_C->AdvancedSearch->toJson(), ","); // Field D6 GRADE C
		$filterList = Concat($filterList, $this->D6_GRADE_D->AdvancedSearch->toJson(), ","); // Field D6 GRADE D
		$filterList = Concat($filterList, $this->D6_USABLE_EMBRYO_ET->AdvancedSearch->toJson(), ","); // Field D6 USABLE EMBRYO ET
		$filterList = Concat($filterList, $this->D6_USABLE_FREEZING->AdvancedSearch->toJson(), ","); // Field D6 USABLE FREEZING
		$filterList = Concat($filterList, $this->TOTAL_BLAST->AdvancedSearch->toJson(), ","); // Field TOTAL BLAST
		$filterList = Concat($filterList, $this->PGS->AdvancedSearch->toJson(), ","); // Field PGS
		$filterList = Concat($filterList, $this->REMARKS->AdvancedSearch->toJson(), ","); // Field REMARKS
		$filterList = Concat($filterList, $this->PU___D2FB->AdvancedSearch->toJson(), ","); // Field PU - D/B
		$filterList = Concat($filterList, $this->ICSI_D2FB->AdvancedSearch->toJson(), ","); // Field ICSI D/B
		$filterList = Concat($filterList, $this->VIT_D2FB->AdvancedSearch->toJson(), ","); // Field VIT D/B
		$filterList = Concat($filterList, $this->ET_D2FB->AdvancedSearch->toJson(), ","); // Field ET D/B
		$filterList = Concat($filterList, $this->LAB_COMMENTS->AdvancedSearch->toJson(), ","); // Field LAB COMMENTS
		$filterList = Concat($filterList, $this->Reason_for_no_FRESH_transfer->AdvancedSearch->toJson(), ","); // Field Reason for no FRESH transfer
		$filterList = Concat($filterList, $this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->toJson(), ","); // Field No of embryos transferred Day 3/5, A,B,C
		$filterList = Concat($filterList, $this->EMBRYOS_PENDING->AdvancedSearch->toJson(), ","); // Field EMBRYOS PENDING
		$filterList = Concat($filterList, $this->DAY_OF_TRANSFER->AdvancedSearch->toJson(), ","); // Field DAY OF TRANSFER
		$filterList = Concat($filterList, $this->H2FD_sperm->AdvancedSearch->toJson(), ","); // Field H/D sperm
		$filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
		$filterList = Concat($filterList, $this->sc_progesterone->AdvancedSearch->toJson(), ","); // Field sc progesterone
		$filterList = Concat($filterList, $this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->toJson(), ","); // Field Natural micronised 400mg bd + duphaston 10mg bd
		$filterList = Concat($filterList, $this->CRINONE->AdvancedSearch->toJson(), ","); // Field CRINONE
		$filterList = Concat($filterList, $this->progynova->AdvancedSearch->toJson(), ","); // Field progynova
		$filterList = Concat($filterList, $this->Heparin->AdvancedSearch->toJson(), ","); // Field Heparin
		$filterList = Concat($filterList, $this->cabergolin->AdvancedSearch->toJson(), ","); // Field cabergolin
		$filterList = Concat($filterList, $this->Antagonist->AdvancedSearch->toJson(), ","); // Field Antagonist
		$filterList = Concat($filterList, $this->OHSS->AdvancedSearch->toJson(), ","); // Field OHSS
		$filterList = Concat($filterList, $this->Complications->AdvancedSearch->toJson(), ","); // Field Complications
		$filterList = Concat($filterList, $this->LP_bleeding->AdvancedSearch->toJson(), ","); // Field LP bleeding
		$filterList = Concat($filterList, $this->DF_hCG->AdvancedSearch->toJson(), ","); // Field ß-hCG
		$filterList = Concat($filterList, $this->Implantation_rate->AdvancedSearch->toJson(), ","); // Field Implantation rate
		$filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
		$filterList = Concat($filterList, $this->Type_of_preg->AdvancedSearch->toJson(), ","); // Field Type of preg
		$filterList = Concat($filterList, $this->ANC->AdvancedSearch->toJson(), ","); // Field ANC
		$filterList = Concat($filterList, $this->anomalies->AdvancedSearch->toJson(), ","); // Field anomalies
		$filterList = Concat($filterList, $this->baby_wt->AdvancedSearch->toJson(), ","); // Field baby wt
		$filterList = Concat($filterList, $this->GA_at_delivery->AdvancedSearch->toJson(), ","); // Field GA at delivery
		$filterList = Concat($filterList, $this->Pregnancy_outcome->AdvancedSearch->toJson(), ","); // Field Pregnancy outcome
		$filterList = Concat($filterList, $this->_1st_FET->AdvancedSearch->toJson(), ","); // Field 1st FET
		$filterList = Concat($filterList, $this->AFTER_HYSTEROSCOPY->AdvancedSearch->toJson(), ","); // Field AFTER HYSTEROSCOPY
		$filterList = Concat($filterList, $this->AFTER_ERA->AdvancedSearch->toJson(), ","); // Field AFTER ERA
		$filterList = Concat($filterList, $this->ERA->AdvancedSearch->toJson(), ","); // Field ERA
		$filterList = Concat($filterList, $this->HRT->AdvancedSearch->toJson(), ","); // Field HRT
		$filterList = Concat($filterList, $this->XGRAST2FPRP->AdvancedSearch->toJson(), ","); // Field XGRAST/PRP
		$filterList = Concat($filterList, $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->toJson(), ","); // Field EMBRYO DETAILS DAY 3/ 5, A, B, C
		$filterList = Concat($filterList, $this->LMWH_40MG->AdvancedSearch->toJson(), ","); // Field LMWH 40MG
		$filterList = Concat($filterList, $this->DF_hCG2->AdvancedSearch->toJson(), ","); // Field ß-hCG2
		$filterList = Concat($filterList, $this->Implantation_rate1->AdvancedSearch->toJson(), ","); // Field Implantation rate1
		$filterList = Concat($filterList, $this->Ectopic1->AdvancedSearch->toJson(), ","); // Field Ectopic1
		$filterList = Concat($filterList, $this->Type_of_pregA->AdvancedSearch->toJson(), ","); // Field Type of pregA
		$filterList = Concat($filterList, $this->ANC1->AdvancedSearch->toJson(), ","); // Field ANC1
		$filterList = Concat($filterList, $this->anomalies2->AdvancedSearch->toJson(), ","); // Field anomalies2
		$filterList = Concat($filterList, $this->baby_wt2->AdvancedSearch->toJson(), ","); // Field baby wt2
		$filterList = Concat($filterList, $this->GA_at_delivery1->AdvancedSearch->toJson(), ","); // Field GA at delivery1
		$filterList = Concat($filterList, $this->Pregnancy_outcome1->AdvancedSearch->toJson(), ","); // Field Pregnancy outcome1
		$filterList = Concat($filterList, $this->_2ND_FET->AdvancedSearch->toJson(), ","); // Field 2ND FET
		$filterList = Concat($filterList, $this->AFTER_HYSTEROSCOPY1->AdvancedSearch->toJson(), ","); // Field AFTER HYSTEROSCOPY1
		$filterList = Concat($filterList, $this->AFTER_ERA1->AdvancedSearch->toJson(), ","); // Field AFTER ERA1
		$filterList = Concat($filterList, $this->ERA1->AdvancedSearch->toJson(), ","); // Field ERA1
		$filterList = Concat($filterList, $this->HRT1->AdvancedSearch->toJson(), ","); // Field HRT1
		$filterList = Concat($filterList, $this->XGRAST2FPRP1->AdvancedSearch->toJson(), ","); // Field XGRAST/PRP1
		$filterList = Concat($filterList, $this->NUMBER_OF_EMBRYOS->AdvancedSearch->toJson(), ","); // Field NUMBER OF EMBRYOS
		$filterList = Concat($filterList, $this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->toJson(), ","); // Field EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$filterList = Concat($filterList, $this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->toJson(), ","); // Field INTRALIPID AND BARGLOBIN
		$filterList = Concat($filterList, $this->LMWH_40MG1->AdvancedSearch->toJson(), ","); // Field LMWH 40MG1
		$filterList = Concat($filterList, $this->DF_hCG1->AdvancedSearch->toJson(), ","); // Field ß-hCG1
		$filterList = Concat($filterList, $this->Implantation_rate2->AdvancedSearch->toJson(), ","); // Field Implantation rate2
		$filterList = Concat($filterList, $this->Ectopic2->AdvancedSearch->toJson(), ","); // Field Ectopic2
		$filterList = Concat($filterList, $this->Type_of_preg2->AdvancedSearch->toJson(), ","); // Field Type of preg2
		$filterList = Concat($filterList, $this->ANCA->AdvancedSearch->toJson(), ","); // Field ANCA
		$filterList = Concat($filterList, $this->anomalies1->AdvancedSearch->toJson(), ","); // Field anomalies1
		$filterList = Concat($filterList, $this->baby_wt1->AdvancedSearch->toJson(), ","); // Field baby wt1
		$filterList = Concat($filterList, $this->GA_at_delivery2->AdvancedSearch->toJson(), ","); // Field GA at delivery2
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_template_for_opulistsrch", $filters);
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

		// Field RIDNO
		$this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
		$this->RIDNO->AdvancedSearch->save();

		// Field Treatment
		$this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
		$this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
		$this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
		$this->Treatment->AdvancedSearch->save();

		// Field Origin
		$this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
		$this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
		$this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
		$this->Origin->AdvancedSearch->save();

		// Field MaleIndications
		$this->MaleIndications->AdvancedSearch->SearchValue = @$filter["x_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchOperator = @$filter["z_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchCondition = @$filter["v_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->save();

		// Field FemaleIndications
		$this->FemaleIndications->AdvancedSearch->SearchValue = @$filter["x_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchOperator = @$filter["z_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchCondition = @$filter["v_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field PartnerName
		$this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
		$this->PartnerName->AdvancedSearch->save();

		// Field PartnerID
		$this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
		$this->PartnerID->AdvancedSearch->save();

		// Field A4ICSICycle
		$this->A4ICSICycle->AdvancedSearch->SearchValue = @$filter["x_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchOperator = @$filter["z_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchCondition = @$filter["v_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->save();

		// Field TotalICSICycle
		$this->TotalICSICycle->AdvancedSearch->SearchValue = @$filter["x_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchOperator = @$filter["z_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchCondition = @$filter["v_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->save();

		// Field TypeOfInfertility
		$this->TypeOfInfertility->AdvancedSearch->SearchValue = @$filter["x_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchOperator = @$filter["z_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchCondition = @$filter["v_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->save();

		// Field RelevantHistory
		$this->RelevantHistory->AdvancedSearch->SearchValue = @$filter["x_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchOperator = @$filter["z_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchCondition = @$filter["v_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchValue2 = @$filter["y_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchOperator2 = @$filter["w_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->save();

		// Field IUICycles
		$this->IUICycles->AdvancedSearch->SearchValue = @$filter["x_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchOperator = @$filter["z_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchCondition = @$filter["v_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchValue2 = @$filter["y_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchOperator2 = @$filter["w_IUICycles"];
		$this->IUICycles->AdvancedSearch->save();

		// Field AMH
		$this->AMH->AdvancedSearch->SearchValue = @$filter["x_AMH"];
		$this->AMH->AdvancedSearch->SearchOperator = @$filter["z_AMH"];
		$this->AMH->AdvancedSearch->SearchCondition = @$filter["v_AMH"];
		$this->AMH->AdvancedSearch->SearchValue2 = @$filter["y_AMH"];
		$this->AMH->AdvancedSearch->SearchOperator2 = @$filter["w_AMH"];
		$this->AMH->AdvancedSearch->save();

		// Field FBMI
		$this->FBMI->AdvancedSearch->SearchValue = @$filter["x_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator = @$filter["z_FBMI"];
		$this->FBMI->AdvancedSearch->SearchCondition = @$filter["v_FBMI"];
		$this->FBMI->AdvancedSearch->SearchValue2 = @$filter["y_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator2 = @$filter["w_FBMI"];
		$this->FBMI->AdvancedSearch->save();

		// Field ANTAGONISTSTARTDAY
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue = @$filter["x_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator = @$filter["z_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchCondition = @$filter["v_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue2 = @$filter["y_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator2 = @$filter["w_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->save();

		// Field OvarianSurgery
		$this->OvarianSurgery->AdvancedSearch->SearchValue = @$filter["x_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchOperator = @$filter["z_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchCondition = @$filter["v_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchValue2 = @$filter["y_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->save();

		// Field OPUDATE
		$this->OPUDATE->AdvancedSearch->SearchValue = @$filter["x_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchOperator = @$filter["z_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchCondition = @$filter["v_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchValue2 = @$filter["y_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchOperator2 = @$filter["w_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->save();

		// Field RFSH1
		$this->RFSH1->AdvancedSearch->SearchValue = @$filter["x_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchOperator = @$filter["z_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchCondition = @$filter["v_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchValue2 = @$filter["y_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH1"];
		$this->RFSH1->AdvancedSearch->save();

		// Field RFSH2
		$this->RFSH2->AdvancedSearch->SearchValue = @$filter["x_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchOperator = @$filter["z_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchCondition = @$filter["v_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchValue2 = @$filter["y_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH2"];
		$this->RFSH2->AdvancedSearch->save();

		// Field RFSH3
		$this->RFSH3->AdvancedSearch->SearchValue = @$filter["x_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchOperator = @$filter["z_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchCondition = @$filter["v_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchValue2 = @$filter["y_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH3"];
		$this->RFSH3->AdvancedSearch->save();

		// Field E21
		$this->E21->AdvancedSearch->SearchValue = @$filter["x_E21"];
		$this->E21->AdvancedSearch->SearchOperator = @$filter["z_E21"];
		$this->E21->AdvancedSearch->SearchCondition = @$filter["v_E21"];
		$this->E21->AdvancedSearch->SearchValue2 = @$filter["y_E21"];
		$this->E21->AdvancedSearch->SearchOperator2 = @$filter["w_E21"];
		$this->E21->AdvancedSearch->save();

		// Field Hysteroscopy
		$this->Hysteroscopy->AdvancedSearch->SearchValue = @$filter["x_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator = @$filter["z_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchCondition = @$filter["v_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchValue2 = @$filter["y_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator2 = @$filter["w_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field Fweight
		$this->Fweight->AdvancedSearch->SearchValue = @$filter["x_Fweight"];
		$this->Fweight->AdvancedSearch->SearchOperator = @$filter["z_Fweight"];
		$this->Fweight->AdvancedSearch->SearchCondition = @$filter["v_Fweight"];
		$this->Fweight->AdvancedSearch->SearchValue2 = @$filter["y_Fweight"];
		$this->Fweight->AdvancedSearch->SearchOperator2 = @$filter["w_Fweight"];
		$this->Fweight->AdvancedSearch->save();

		// Field AntiTPO
		$this->AntiTPO->AdvancedSearch->SearchValue = @$filter["x_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchOperator = @$filter["z_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchCondition = @$filter["v_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchValue2 = @$filter["y_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->save();

		// Field AntiTG
		$this->AntiTG->AdvancedSearch->SearchValue = @$filter["x_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchOperator = @$filter["z_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchCondition = @$filter["v_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchValue2 = @$filter["y_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTG"];
		$this->AntiTG->AdvancedSearch->save();

		// Field PatientAge
		$this->PatientAge->AdvancedSearch->SearchValue = @$filter["x_PatientAge"];
		$this->PatientAge->AdvancedSearch->SearchOperator = @$filter["z_PatientAge"];
		$this->PatientAge->AdvancedSearch->SearchCondition = @$filter["v_PatientAge"];
		$this->PatientAge->AdvancedSearch->SearchValue2 = @$filter["y_PatientAge"];
		$this->PatientAge->AdvancedSearch->SearchOperator2 = @$filter["w_PatientAge"];
		$this->PatientAge->AdvancedSearch->save();

		// Field PartnerAge
		$this->PartnerAge->AdvancedSearch->SearchValue = @$filter["x_PartnerAge"];
		$this->PartnerAge->AdvancedSearch->SearchOperator = @$filter["z_PartnerAge"];
		$this->PartnerAge->AdvancedSearch->SearchCondition = @$filter["v_PartnerAge"];
		$this->PartnerAge->AdvancedSearch->SearchValue2 = @$filter["y_PartnerAge"];
		$this->PartnerAge->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerAge"];
		$this->PartnerAge->AdvancedSearch->save();

		// Field CYCLES
		$this->CYCLES->AdvancedSearch->SearchValue = @$filter["x_CYCLES"];
		$this->CYCLES->AdvancedSearch->SearchOperator = @$filter["z_CYCLES"];
		$this->CYCLES->AdvancedSearch->SearchCondition = @$filter["v_CYCLES"];
		$this->CYCLES->AdvancedSearch->SearchValue2 = @$filter["y_CYCLES"];
		$this->CYCLES->AdvancedSearch->SearchOperator2 = @$filter["w_CYCLES"];
		$this->CYCLES->AdvancedSearch->save();

		// Field MF
		$this->MF->AdvancedSearch->SearchValue = @$filter["x_MF"];
		$this->MF->AdvancedSearch->SearchOperator = @$filter["z_MF"];
		$this->MF->AdvancedSearch->SearchCondition = @$filter["v_MF"];
		$this->MF->AdvancedSearch->SearchValue2 = @$filter["y_MF"];
		$this->MF->AdvancedSearch->SearchOperator2 = @$filter["w_MF"];
		$this->MF->AdvancedSearch->save();

		// Field CauseOfINFERTILITY
		$this->CauseOfINFERTILITY->AdvancedSearch->SearchValue = @$filter["x_CauseOfINFERTILITY"];
		$this->CauseOfINFERTILITY->AdvancedSearch->SearchOperator = @$filter["z_CauseOfINFERTILITY"];
		$this->CauseOfINFERTILITY->AdvancedSearch->SearchCondition = @$filter["v_CauseOfINFERTILITY"];
		$this->CauseOfINFERTILITY->AdvancedSearch->SearchValue2 = @$filter["y_CauseOfINFERTILITY"];
		$this->CauseOfINFERTILITY->AdvancedSearch->SearchOperator2 = @$filter["w_CauseOfINFERTILITY"];
		$this->CauseOfINFERTILITY->AdvancedSearch->save();

		// Field SIS
		$this->SIS->AdvancedSearch->SearchValue = @$filter["x_SIS"];
		$this->SIS->AdvancedSearch->SearchOperator = @$filter["z_SIS"];
		$this->SIS->AdvancedSearch->SearchCondition = @$filter["v_SIS"];
		$this->SIS->AdvancedSearch->SearchValue2 = @$filter["y_SIS"];
		$this->SIS->AdvancedSearch->SearchOperator2 = @$filter["w_SIS"];
		$this->SIS->AdvancedSearch->save();

		// Field Scratching
		$this->Scratching->AdvancedSearch->SearchValue = @$filter["x_Scratching"];
		$this->Scratching->AdvancedSearch->SearchOperator = @$filter["z_Scratching"];
		$this->Scratching->AdvancedSearch->SearchCondition = @$filter["v_Scratching"];
		$this->Scratching->AdvancedSearch->SearchValue2 = @$filter["y_Scratching"];
		$this->Scratching->AdvancedSearch->SearchOperator2 = @$filter["w_Scratching"];
		$this->Scratching->AdvancedSearch->save();

		// Field Cannulation
		$this->Cannulation->AdvancedSearch->SearchValue = @$filter["x_Cannulation"];
		$this->Cannulation->AdvancedSearch->SearchOperator = @$filter["z_Cannulation"];
		$this->Cannulation->AdvancedSearch->SearchCondition = @$filter["v_Cannulation"];
		$this->Cannulation->AdvancedSearch->SearchValue2 = @$filter["y_Cannulation"];
		$this->Cannulation->AdvancedSearch->SearchOperator2 = @$filter["w_Cannulation"];
		$this->Cannulation->AdvancedSearch->save();

		// Field MEPRATE
		$this->MEPRATE->AdvancedSearch->SearchValue = @$filter["x_MEPRATE"];
		$this->MEPRATE->AdvancedSearch->SearchOperator = @$filter["z_MEPRATE"];
		$this->MEPRATE->AdvancedSearch->SearchCondition = @$filter["v_MEPRATE"];
		$this->MEPRATE->AdvancedSearch->SearchValue2 = @$filter["y_MEPRATE"];
		$this->MEPRATE->AdvancedSearch->SearchOperator2 = @$filter["w_MEPRATE"];
		$this->MEPRATE->AdvancedSearch->save();

		// Field R.OVARY
		$this->R_OVARY->AdvancedSearch->SearchValue = @$filter["x_R_OVARY"];
		$this->R_OVARY->AdvancedSearch->SearchOperator = @$filter["z_R_OVARY"];
		$this->R_OVARY->AdvancedSearch->SearchCondition = @$filter["v_R_OVARY"];
		$this->R_OVARY->AdvancedSearch->SearchValue2 = @$filter["y_R_OVARY"];
		$this->R_OVARY->AdvancedSearch->SearchOperator2 = @$filter["w_R_OVARY"];
		$this->R_OVARY->AdvancedSearch->save();

		// Field R.AFC
		$this->R_AFC->AdvancedSearch->SearchValue = @$filter["x_R_AFC"];
		$this->R_AFC->AdvancedSearch->SearchOperator = @$filter["z_R_AFC"];
		$this->R_AFC->AdvancedSearch->SearchCondition = @$filter["v_R_AFC"];
		$this->R_AFC->AdvancedSearch->SearchValue2 = @$filter["y_R_AFC"];
		$this->R_AFC->AdvancedSearch->SearchOperator2 = @$filter["w_R_AFC"];
		$this->R_AFC->AdvancedSearch->save();

		// Field L.OVARY
		$this->L_OVARY->AdvancedSearch->SearchValue = @$filter["x_L_OVARY"];
		$this->L_OVARY->AdvancedSearch->SearchOperator = @$filter["z_L_OVARY"];
		$this->L_OVARY->AdvancedSearch->SearchCondition = @$filter["v_L_OVARY"];
		$this->L_OVARY->AdvancedSearch->SearchValue2 = @$filter["y_L_OVARY"];
		$this->L_OVARY->AdvancedSearch->SearchOperator2 = @$filter["w_L_OVARY"];
		$this->L_OVARY->AdvancedSearch->save();

		// Field L.AFC
		$this->L_AFC->AdvancedSearch->SearchValue = @$filter["x_L_AFC"];
		$this->L_AFC->AdvancedSearch->SearchOperator = @$filter["z_L_AFC"];
		$this->L_AFC->AdvancedSearch->SearchCondition = @$filter["v_L_AFC"];
		$this->L_AFC->AdvancedSearch->SearchValue2 = @$filter["y_L_AFC"];
		$this->L_AFC->AdvancedSearch->SearchOperator2 = @$filter["w_L_AFC"];
		$this->L_AFC->AdvancedSearch->save();

		// Field LH1
		$this->LH1->AdvancedSearch->SearchValue = @$filter["x_LH1"];
		$this->LH1->AdvancedSearch->SearchOperator = @$filter["z_LH1"];
		$this->LH1->AdvancedSearch->SearchCondition = @$filter["v_LH1"];
		$this->LH1->AdvancedSearch->SearchValue2 = @$filter["y_LH1"];
		$this->LH1->AdvancedSearch->SearchOperator2 = @$filter["w_LH1"];
		$this->LH1->AdvancedSearch->save();

		// Field E2
		$this->E2->AdvancedSearch->SearchValue = @$filter["x_E2"];
		$this->E2->AdvancedSearch->SearchOperator = @$filter["z_E2"];
		$this->E2->AdvancedSearch->SearchCondition = @$filter["v_E2"];
		$this->E2->AdvancedSearch->SearchValue2 = @$filter["y_E2"];
		$this->E2->AdvancedSearch->SearchOperator2 = @$filter["w_E2"];
		$this->E2->AdvancedSearch->save();

		// Field StemCellInstallation
		$this->StemCellInstallation->AdvancedSearch->SearchValue = @$filter["x_StemCellInstallation"];
		$this->StemCellInstallation->AdvancedSearch->SearchOperator = @$filter["z_StemCellInstallation"];
		$this->StemCellInstallation->AdvancedSearch->SearchCondition = @$filter["v_StemCellInstallation"];
		$this->StemCellInstallation->AdvancedSearch->SearchValue2 = @$filter["y_StemCellInstallation"];
		$this->StemCellInstallation->AdvancedSearch->SearchOperator2 = @$filter["w_StemCellInstallation"];
		$this->StemCellInstallation->AdvancedSearch->save();

		// Field DHEAS
		$this->DHEAS->AdvancedSearch->SearchValue = @$filter["x_DHEAS"];
		$this->DHEAS->AdvancedSearch->SearchOperator = @$filter["z_DHEAS"];
		$this->DHEAS->AdvancedSearch->SearchCondition = @$filter["v_DHEAS"];
		$this->DHEAS->AdvancedSearch->SearchValue2 = @$filter["y_DHEAS"];
		$this->DHEAS->AdvancedSearch->SearchOperator2 = @$filter["w_DHEAS"];
		$this->DHEAS->AdvancedSearch->save();

		// Field Mtorr
		$this->Mtorr->AdvancedSearch->SearchValue = @$filter["x_Mtorr"];
		$this->Mtorr->AdvancedSearch->SearchOperator = @$filter["z_Mtorr"];
		$this->Mtorr->AdvancedSearch->SearchCondition = @$filter["v_Mtorr"];
		$this->Mtorr->AdvancedSearch->SearchValue2 = @$filter["y_Mtorr"];
		$this->Mtorr->AdvancedSearch->SearchOperator2 = @$filter["w_Mtorr"];
		$this->Mtorr->AdvancedSearch->save();

		// Field AMH1
		$this->AMH1->AdvancedSearch->SearchValue = @$filter["x_AMH1"];
		$this->AMH1->AdvancedSearch->SearchOperator = @$filter["z_AMH1"];
		$this->AMH1->AdvancedSearch->SearchCondition = @$filter["v_AMH1"];
		$this->AMH1->AdvancedSearch->SearchValue2 = @$filter["y_AMH1"];
		$this->AMH1->AdvancedSearch->SearchOperator2 = @$filter["w_AMH1"];
		$this->AMH1->AdvancedSearch->save();

		// Field LH
		$this->LH->AdvancedSearch->SearchValue = @$filter["x_LH"];
		$this->LH->AdvancedSearch->SearchOperator = @$filter["z_LH"];
		$this->LH->AdvancedSearch->SearchCondition = @$filter["v_LH"];
		$this->LH->AdvancedSearch->SearchValue2 = @$filter["y_LH"];
		$this->LH->AdvancedSearch->SearchOperator2 = @$filter["w_LH"];
		$this->LH->AdvancedSearch->save();

		// Field BMI(MALE)
		$this->BMI28MALE29->AdvancedSearch->SearchValue = @$filter["x_BMI28MALE29"];
		$this->BMI28MALE29->AdvancedSearch->SearchOperator = @$filter["z_BMI28MALE29"];
		$this->BMI28MALE29->AdvancedSearch->SearchCondition = @$filter["v_BMI28MALE29"];
		$this->BMI28MALE29->AdvancedSearch->SearchValue2 = @$filter["y_BMI28MALE29"];
		$this->BMI28MALE29->AdvancedSearch->SearchOperator2 = @$filter["w_BMI28MALE29"];
		$this->BMI28MALE29->AdvancedSearch->save();

		// Field MaleMedicalConditions
		$this->MaleMedicalConditions->AdvancedSearch->SearchValue = @$filter["x_MaleMedicalConditions"];
		$this->MaleMedicalConditions->AdvancedSearch->SearchOperator = @$filter["z_MaleMedicalConditions"];
		$this->MaleMedicalConditions->AdvancedSearch->SearchCondition = @$filter["v_MaleMedicalConditions"];
		$this->MaleMedicalConditions->AdvancedSearch->SearchValue2 = @$filter["y_MaleMedicalConditions"];
		$this->MaleMedicalConditions->AdvancedSearch->SearchOperator2 = @$filter["w_MaleMedicalConditions"];
		$this->MaleMedicalConditions->AdvancedSearch->save();

		// Field MaleExamination
		$this->MaleExamination->AdvancedSearch->SearchValue = @$filter["x_MaleExamination"];
		$this->MaleExamination->AdvancedSearch->SearchOperator = @$filter["z_MaleExamination"];
		$this->MaleExamination->AdvancedSearch->SearchCondition = @$filter["v_MaleExamination"];
		$this->MaleExamination->AdvancedSearch->SearchValue2 = @$filter["y_MaleExamination"];
		$this->MaleExamination->AdvancedSearch->SearchOperator2 = @$filter["w_MaleExamination"];
		$this->MaleExamination->AdvancedSearch->save();

		// Field SpermConcentration
		$this->SpermConcentration->AdvancedSearch->SearchValue = @$filter["x_SpermConcentration"];
		$this->SpermConcentration->AdvancedSearch->SearchOperator = @$filter["z_SpermConcentration"];
		$this->SpermConcentration->AdvancedSearch->SearchCondition = @$filter["v_SpermConcentration"];
		$this->SpermConcentration->AdvancedSearch->SearchValue2 = @$filter["y_SpermConcentration"];
		$this->SpermConcentration->AdvancedSearch->SearchOperator2 = @$filter["w_SpermConcentration"];
		$this->SpermConcentration->AdvancedSearch->save();

		// Field SpermMotility(P&NP)
		$this->SpermMotility28P26NP29->AdvancedSearch->SearchValue = @$filter["x_SpermMotility28P26NP29"];
		$this->SpermMotility28P26NP29->AdvancedSearch->SearchOperator = @$filter["z_SpermMotility28P26NP29"];
		$this->SpermMotility28P26NP29->AdvancedSearch->SearchCondition = @$filter["v_SpermMotility28P26NP29"];
		$this->SpermMotility28P26NP29->AdvancedSearch->SearchValue2 = @$filter["y_SpermMotility28P26NP29"];
		$this->SpermMotility28P26NP29->AdvancedSearch->SearchOperator2 = @$filter["w_SpermMotility28P26NP29"];
		$this->SpermMotility28P26NP29->AdvancedSearch->save();

		// Field SpermMorphology
		$this->SpermMorphology->AdvancedSearch->SearchValue = @$filter["x_SpermMorphology"];
		$this->SpermMorphology->AdvancedSearch->SearchOperator = @$filter["z_SpermMorphology"];
		$this->SpermMorphology->AdvancedSearch->SearchCondition = @$filter["v_SpermMorphology"];
		$this->SpermMorphology->AdvancedSearch->SearchValue2 = @$filter["y_SpermMorphology"];
		$this->SpermMorphology->AdvancedSearch->SearchOperator2 = @$filter["w_SpermMorphology"];
		$this->SpermMorphology->AdvancedSearch->save();

		// Field SpermRetrival
		$this->SpermRetrival->AdvancedSearch->SearchValue = @$filter["x_SpermRetrival"];
		$this->SpermRetrival->AdvancedSearch->SearchOperator = @$filter["z_SpermRetrival"];
		$this->SpermRetrival->AdvancedSearch->SearchCondition = @$filter["v_SpermRetrival"];
		$this->SpermRetrival->AdvancedSearch->SearchValue2 = @$filter["y_SpermRetrival"];
		$this->SpermRetrival->AdvancedSearch->SearchOperator2 = @$filter["w_SpermRetrival"];
		$this->SpermRetrival->AdvancedSearch->save();

		// Field M.Testosterone
		$this->M_Testosterone->AdvancedSearch->SearchValue = @$filter["x_M_Testosterone"];
		$this->M_Testosterone->AdvancedSearch->SearchOperator = @$filter["z_M_Testosterone"];
		$this->M_Testosterone->AdvancedSearch->SearchCondition = @$filter["v_M_Testosterone"];
		$this->M_Testosterone->AdvancedSearch->SearchValue2 = @$filter["y_M_Testosterone"];
		$this->M_Testosterone->AdvancedSearch->SearchOperator2 = @$filter["w_M_Testosterone"];
		$this->M_Testosterone->AdvancedSearch->save();

		// Field DFI
		$this->DFI->AdvancedSearch->SearchValue = @$filter["x_DFI"];
		$this->DFI->AdvancedSearch->SearchOperator = @$filter["z_DFI"];
		$this->DFI->AdvancedSearch->SearchCondition = @$filter["v_DFI"];
		$this->DFI->AdvancedSearch->SearchValue2 = @$filter["y_DFI"];
		$this->DFI->AdvancedSearch->SearchOperator2 = @$filter["w_DFI"];
		$this->DFI->AdvancedSearch->save();

		// Field PreRX
		$this->PreRX->AdvancedSearch->SearchValue = @$filter["x_PreRX"];
		$this->PreRX->AdvancedSearch->SearchOperator = @$filter["z_PreRX"];
		$this->PreRX->AdvancedSearch->SearchCondition = @$filter["v_PreRX"];
		$this->PreRX->AdvancedSearch->SearchValue2 = @$filter["y_PreRX"];
		$this->PreRX->AdvancedSearch->SearchOperator2 = @$filter["w_PreRX"];
		$this->PreRX->AdvancedSearch->save();

		// Field CC 100
		$this->CC_100->AdvancedSearch->SearchValue = @$filter["x_CC_100"];
		$this->CC_100->AdvancedSearch->SearchOperator = @$filter["z_CC_100"];
		$this->CC_100->AdvancedSearch->SearchCondition = @$filter["v_CC_100"];
		$this->CC_100->AdvancedSearch->SearchValue2 = @$filter["y_CC_100"];
		$this->CC_100->AdvancedSearch->SearchOperator2 = @$filter["w_CC_100"];
		$this->CC_100->AdvancedSearch->save();

		// Field RFSH1A
		$this->RFSH1A->AdvancedSearch->SearchValue = @$filter["x_RFSH1A"];
		$this->RFSH1A->AdvancedSearch->SearchOperator = @$filter["z_RFSH1A"];
		$this->RFSH1A->AdvancedSearch->SearchCondition = @$filter["v_RFSH1A"];
		$this->RFSH1A->AdvancedSearch->SearchValue2 = @$filter["y_RFSH1A"];
		$this->RFSH1A->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH1A"];
		$this->RFSH1A->AdvancedSearch->save();

		// Field HMG1
		$this->HMG1->AdvancedSearch->SearchValue = @$filter["x_HMG1"];
		$this->HMG1->AdvancedSearch->SearchOperator = @$filter["z_HMG1"];
		$this->HMG1->AdvancedSearch->SearchCondition = @$filter["v_HMG1"];
		$this->HMG1->AdvancedSearch->SearchValue2 = @$filter["y_HMG1"];
		$this->HMG1->AdvancedSearch->SearchOperator2 = @$filter["w_HMG1"];
		$this->HMG1->AdvancedSearch->save();

		// Field RLH
		$this->RLH->AdvancedSearch->SearchValue = @$filter["x_RLH"];
		$this->RLH->AdvancedSearch->SearchOperator = @$filter["z_RLH"];
		$this->RLH->AdvancedSearch->SearchCondition = @$filter["v_RLH"];
		$this->RLH->AdvancedSearch->SearchValue2 = @$filter["y_RLH"];
		$this->RLH->AdvancedSearch->SearchOperator2 = @$filter["w_RLH"];
		$this->RLH->AdvancedSearch->save();

		// Field HMG_HP
		$this->HMG_HP->AdvancedSearch->SearchValue = @$filter["x_HMG_HP"];
		$this->HMG_HP->AdvancedSearch->SearchOperator = @$filter["z_HMG_HP"];
		$this->HMG_HP->AdvancedSearch->SearchCondition = @$filter["v_HMG_HP"];
		$this->HMG_HP->AdvancedSearch->SearchValue2 = @$filter["y_HMG_HP"];
		$this->HMG_HP->AdvancedSearch->SearchOperator2 = @$filter["w_HMG_HP"];
		$this->HMG_HP->AdvancedSearch->save();

		// Field day_of_HMG
		$this->day_of_HMG->AdvancedSearch->SearchValue = @$filter["x_day_of_HMG"];
		$this->day_of_HMG->AdvancedSearch->SearchOperator = @$filter["z_day_of_HMG"];
		$this->day_of_HMG->AdvancedSearch->SearchCondition = @$filter["v_day_of_HMG"];
		$this->day_of_HMG->AdvancedSearch->SearchValue2 = @$filter["y_day_of_HMG"];
		$this->day_of_HMG->AdvancedSearch->SearchOperator2 = @$filter["w_day_of_HMG"];
		$this->day_of_HMG->AdvancedSearch->save();

		// Field Reason_for_HMG
		$this->Reason_for_HMG->AdvancedSearch->SearchValue = @$filter["x_Reason_for_HMG"];
		$this->Reason_for_HMG->AdvancedSearch->SearchOperator = @$filter["z_Reason_for_HMG"];
		$this->Reason_for_HMG->AdvancedSearch->SearchCondition = @$filter["v_Reason_for_HMG"];
		$this->Reason_for_HMG->AdvancedSearch->SearchValue2 = @$filter["y_Reason_for_HMG"];
		$this->Reason_for_HMG->AdvancedSearch->SearchOperator2 = @$filter["w_Reason_for_HMG"];
		$this->Reason_for_HMG->AdvancedSearch->save();

		// Field RLH_day
		$this->RLH_day->AdvancedSearch->SearchValue = @$filter["x_RLH_day"];
		$this->RLH_day->AdvancedSearch->SearchOperator = @$filter["z_RLH_day"];
		$this->RLH_day->AdvancedSearch->SearchCondition = @$filter["v_RLH_day"];
		$this->RLH_day->AdvancedSearch->SearchValue2 = @$filter["y_RLH_day"];
		$this->RLH_day->AdvancedSearch->SearchOperator2 = @$filter["w_RLH_day"];
		$this->RLH_day->AdvancedSearch->save();

		// Field DAYSOFSTIMULATION
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue = @$filter["x_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator = @$filter["z_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchCondition = @$filter["v_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue2 = @$filter["y_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator2 = @$filter["w_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->save();

		// Field Any change inbetween ( Dose added , day)
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchValue = @$filter["x_Any_change_inbetween_28_Dose_added_2C_day29"];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchOperator = @$filter["z_Any_change_inbetween_28_Dose_added_2C_day29"];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchCondition = @$filter["v_Any_change_inbetween_28_Dose_added_2C_day29"];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchValue2 = @$filter["y_Any_change_inbetween_28_Dose_added_2C_day29"];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchOperator2 = @$filter["w_Any_change_inbetween_28_Dose_added_2C_day29"];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->save();

		// Field day of Anta
		$this->day_of_Anta->AdvancedSearch->SearchValue = @$filter["x_day_of_Anta"];
		$this->day_of_Anta->AdvancedSearch->SearchOperator = @$filter["z_day_of_Anta"];
		$this->day_of_Anta->AdvancedSearch->SearchCondition = @$filter["v_day_of_Anta"];
		$this->day_of_Anta->AdvancedSearch->SearchValue2 = @$filter["y_day_of_Anta"];
		$this->day_of_Anta->AdvancedSearch->SearchOperator2 = @$filter["w_day_of_Anta"];
		$this->day_of_Anta->AdvancedSearch->save();

		// Field R FSH TD
		$this->R_FSH_TD->AdvancedSearch->SearchValue = @$filter["x_R_FSH_TD"];
		$this->R_FSH_TD->AdvancedSearch->SearchOperator = @$filter["z_R_FSH_TD"];
		$this->R_FSH_TD->AdvancedSearch->SearchCondition = @$filter["v_R_FSH_TD"];
		$this->R_FSH_TD->AdvancedSearch->SearchValue2 = @$filter["y_R_FSH_TD"];
		$this->R_FSH_TD->AdvancedSearch->SearchOperator2 = @$filter["w_R_FSH_TD"];
		$this->R_FSH_TD->AdvancedSearch->save();

		// Field R FSH + HMG TD
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchValue = @$filter["x_R_FSH_2B_HMG_TD"];
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchOperator = @$filter["z_R_FSH_2B_HMG_TD"];
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchCondition = @$filter["v_R_FSH_2B_HMG_TD"];
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchValue2 = @$filter["y_R_FSH_2B_HMG_TD"];
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchOperator2 = @$filter["w_R_FSH_2B_HMG_TD"];
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->save();

		// Field R FSH + R LH TD
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchValue = @$filter["x_R_FSH_2B_R_LH_TD"];
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchOperator = @$filter["z_R_FSH_2B_R_LH_TD"];
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchCondition = @$filter["v_R_FSH_2B_R_LH_TD"];
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchValue2 = @$filter["y_R_FSH_2B_R_LH_TD"];
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchOperator2 = @$filter["w_R_FSH_2B_R_LH_TD"];
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->save();

		// Field HMG TD
		$this->HMG_TD->AdvancedSearch->SearchValue = @$filter["x_HMG_TD"];
		$this->HMG_TD->AdvancedSearch->SearchOperator = @$filter["z_HMG_TD"];
		$this->HMG_TD->AdvancedSearch->SearchCondition = @$filter["v_HMG_TD"];
		$this->HMG_TD->AdvancedSearch->SearchValue2 = @$filter["y_HMG_TD"];
		$this->HMG_TD->AdvancedSearch->SearchOperator2 = @$filter["w_HMG_TD"];
		$this->HMG_TD->AdvancedSearch->save();

		// Field LH TD
		$this->LH_TD->AdvancedSearch->SearchValue = @$filter["x_LH_TD"];
		$this->LH_TD->AdvancedSearch->SearchOperator = @$filter["z_LH_TD"];
		$this->LH_TD->AdvancedSearch->SearchCondition = @$filter["v_LH_TD"];
		$this->LH_TD->AdvancedSearch->SearchValue2 = @$filter["y_LH_TD"];
		$this->LH_TD->AdvancedSearch->SearchOperator2 = @$filter["w_LH_TD"];
		$this->LH_TD->AdvancedSearch->save();

		// Field D1 LH
		$this->D1_LH->AdvancedSearch->SearchValue = @$filter["x_D1_LH"];
		$this->D1_LH->AdvancedSearch->SearchOperator = @$filter["z_D1_LH"];
		$this->D1_LH->AdvancedSearch->SearchCondition = @$filter["v_D1_LH"];
		$this->D1_LH->AdvancedSearch->SearchValue2 = @$filter["y_D1_LH"];
		$this->D1_LH->AdvancedSearch->SearchOperator2 = @$filter["w_D1_LH"];
		$this->D1_LH->AdvancedSearch->save();

		// Field D1 E2
		$this->D1_E2->AdvancedSearch->SearchValue = @$filter["x_D1_E2"];
		$this->D1_E2->AdvancedSearch->SearchOperator = @$filter["z_D1_E2"];
		$this->D1_E2->AdvancedSearch->SearchCondition = @$filter["v_D1_E2"];
		$this->D1_E2->AdvancedSearch->SearchValue2 = @$filter["y_D1_E2"];
		$this->D1_E2->AdvancedSearch->SearchOperator2 = @$filter["w_D1_E2"];
		$this->D1_E2->AdvancedSearch->save();

		// Field Trigger day E2
		$this->Trigger_day_E2->AdvancedSearch->SearchValue = @$filter["x_Trigger_day_E2"];
		$this->Trigger_day_E2->AdvancedSearch->SearchOperator = @$filter["z_Trigger_day_E2"];
		$this->Trigger_day_E2->AdvancedSearch->SearchCondition = @$filter["v_Trigger_day_E2"];
		$this->Trigger_day_E2->AdvancedSearch->SearchValue2 = @$filter["y_Trigger_day_E2"];
		$this->Trigger_day_E2->AdvancedSearch->SearchOperator2 = @$filter["w_Trigger_day_E2"];
		$this->Trigger_day_E2->AdvancedSearch->save();

		// Field Trigger day P4
		$this->Trigger_day_P4->AdvancedSearch->SearchValue = @$filter["x_Trigger_day_P4"];
		$this->Trigger_day_P4->AdvancedSearch->SearchOperator = @$filter["z_Trigger_day_P4"];
		$this->Trigger_day_P4->AdvancedSearch->SearchCondition = @$filter["v_Trigger_day_P4"];
		$this->Trigger_day_P4->AdvancedSearch->SearchValue2 = @$filter["y_Trigger_day_P4"];
		$this->Trigger_day_P4->AdvancedSearch->SearchOperator2 = @$filter["w_Trigger_day_P4"];
		$this->Trigger_day_P4->AdvancedSearch->save();

		// Field Trigger day LH
		$this->Trigger_day_LH->AdvancedSearch->SearchValue = @$filter["x_Trigger_day_LH"];
		$this->Trigger_day_LH->AdvancedSearch->SearchOperator = @$filter["z_Trigger_day_LH"];
		$this->Trigger_day_LH->AdvancedSearch->SearchCondition = @$filter["v_Trigger_day_LH"];
		$this->Trigger_day_LH->AdvancedSearch->SearchValue2 = @$filter["y_Trigger_day_LH"];
		$this->Trigger_day_LH->AdvancedSearch->SearchOperator2 = @$filter["w_Trigger_day_LH"];
		$this->Trigger_day_LH->AdvancedSearch->save();

		// Field VIT-D
		$this->VIT_D->AdvancedSearch->SearchValue = @$filter["x_VIT_D"];
		$this->VIT_D->AdvancedSearch->SearchOperator = @$filter["z_VIT_D"];
		$this->VIT_D->AdvancedSearch->SearchCondition = @$filter["v_VIT_D"];
		$this->VIT_D->AdvancedSearch->SearchValue2 = @$filter["y_VIT_D"];
		$this->VIT_D->AdvancedSearch->SearchOperator2 = @$filter["w_VIT_D"];
		$this->VIT_D->AdvancedSearch->save();

		// Field TRIGGERR
		$this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->save();

		// Field BHCG BEFORE RETRIEVAL
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchValue = @$filter["x_BHCG_BEFORE_RETRIEVAL"];
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchOperator = @$filter["z_BHCG_BEFORE_RETRIEVAL"];
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchCondition = @$filter["v_BHCG_BEFORE_RETRIEVAL"];
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchValue2 = @$filter["y_BHCG_BEFORE_RETRIEVAL"];
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchOperator2 = @$filter["w_BHCG_BEFORE_RETRIEVAL"];
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->save();

		// Field LH -12 HRS
		$this->LH__12_HRS->AdvancedSearch->SearchValue = @$filter["x_LH__12_HRS"];
		$this->LH__12_HRS->AdvancedSearch->SearchOperator = @$filter["z_LH__12_HRS"];
		$this->LH__12_HRS->AdvancedSearch->SearchCondition = @$filter["v_LH__12_HRS"];
		$this->LH__12_HRS->AdvancedSearch->SearchValue2 = @$filter["y_LH__12_HRS"];
		$this->LH__12_HRS->AdvancedSearch->SearchOperator2 = @$filter["w_LH__12_HRS"];
		$this->LH__12_HRS->AdvancedSearch->save();

		// Field P4 -12 HRS
		$this->P4__12_HRS->AdvancedSearch->SearchValue = @$filter["x_P4__12_HRS"];
		$this->P4__12_HRS->AdvancedSearch->SearchOperator = @$filter["z_P4__12_HRS"];
		$this->P4__12_HRS->AdvancedSearch->SearchCondition = @$filter["v_P4__12_HRS"];
		$this->P4__12_HRS->AdvancedSearch->SearchValue2 = @$filter["y_P4__12_HRS"];
		$this->P4__12_HRS->AdvancedSearch->SearchOperator2 = @$filter["w_P4__12_HRS"];
		$this->P4__12_HRS->AdvancedSearch->save();

		// Field ET on hCG day
		$this->ET_on_hCG_day->AdvancedSearch->SearchValue = @$filter["x_ET_on_hCG_day"];
		$this->ET_on_hCG_day->AdvancedSearch->SearchOperator = @$filter["z_ET_on_hCG_day"];
		$this->ET_on_hCG_day->AdvancedSearch->SearchCondition = @$filter["v_ET_on_hCG_day"];
		$this->ET_on_hCG_day->AdvancedSearch->SearchValue2 = @$filter["y_ET_on_hCG_day"];
		$this->ET_on_hCG_day->AdvancedSearch->SearchOperator2 = @$filter["w_ET_on_hCG_day"];
		$this->ET_on_hCG_day->AdvancedSearch->save();

		// Field ET doppler
		$this->ET_doppler->AdvancedSearch->SearchValue = @$filter["x_ET_doppler"];
		$this->ET_doppler->AdvancedSearch->SearchOperator = @$filter["z_ET_doppler"];
		$this->ET_doppler->AdvancedSearch->SearchCondition = @$filter["v_ET_doppler"];
		$this->ET_doppler->AdvancedSearch->SearchValue2 = @$filter["y_ET_doppler"];
		$this->ET_doppler->AdvancedSearch->SearchOperator2 = @$filter["w_ET_doppler"];
		$this->ET_doppler->AdvancedSearch->save();

		// Field VI/FI/VFI
		$this->VI2FFI2FVFI->AdvancedSearch->SearchValue = @$filter["x_VI2FFI2FVFI"];
		$this->VI2FFI2FVFI->AdvancedSearch->SearchOperator = @$filter["z_VI2FFI2FVFI"];
		$this->VI2FFI2FVFI->AdvancedSearch->SearchCondition = @$filter["v_VI2FFI2FVFI"];
		$this->VI2FFI2FVFI->AdvancedSearch->SearchValue2 = @$filter["y_VI2FFI2FVFI"];
		$this->VI2FFI2FVFI->AdvancedSearch->SearchOperator2 = @$filter["w_VI2FFI2FVFI"];
		$this->VI2FFI2FVFI->AdvancedSearch->save();

		// Field Endometrial abnormality
		$this->Endometrial_abnormality->AdvancedSearch->SearchValue = @$filter["x_Endometrial_abnormality"];
		$this->Endometrial_abnormality->AdvancedSearch->SearchOperator = @$filter["z_Endometrial_abnormality"];
		$this->Endometrial_abnormality->AdvancedSearch->SearchCondition = @$filter["v_Endometrial_abnormality"];
		$this->Endometrial_abnormality->AdvancedSearch->SearchValue2 = @$filter["y_Endometrial_abnormality"];
		$this->Endometrial_abnormality->AdvancedSearch->SearchOperator2 = @$filter["w_Endometrial_abnormality"];
		$this->Endometrial_abnormality->AdvancedSearch->save();

		// Field AFC ON S1
		$this->AFC_ON_S1->AdvancedSearch->SearchValue = @$filter["x_AFC_ON_S1"];
		$this->AFC_ON_S1->AdvancedSearch->SearchOperator = @$filter["z_AFC_ON_S1"];
		$this->AFC_ON_S1->AdvancedSearch->SearchCondition = @$filter["v_AFC_ON_S1"];
		$this->AFC_ON_S1->AdvancedSearch->SearchValue2 = @$filter["y_AFC_ON_S1"];
		$this->AFC_ON_S1->AdvancedSearch->SearchOperator2 = @$filter["w_AFC_ON_S1"];
		$this->AFC_ON_S1->AdvancedSearch->save();

		// Field TIME OF OPU FROM TRIGGER
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_OF_OPU_FROM_TRIGGER"];
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_OF_OPU_FROM_TRIGGER"];
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_OF_OPU_FROM_TRIGGER"];
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_OF_OPU_FROM_TRIGGER"];
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_OF_OPU_FROM_TRIGGER"];
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->save();

		// Field SPERM TYPE
		$this->SPERM_TYPE->AdvancedSearch->SearchValue = @$filter["x_SPERM_TYPE"];
		$this->SPERM_TYPE->AdvancedSearch->SearchOperator = @$filter["z_SPERM_TYPE"];
		$this->SPERM_TYPE->AdvancedSearch->SearchCondition = @$filter["v_SPERM_TYPE"];
		$this->SPERM_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_SPERM_TYPE"];
		$this->SPERM_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_SPERM_TYPE"];
		$this->SPERM_TYPE->AdvancedSearch->save();

		// Field EXPECTED ON TRIGGER DAY
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchValue = @$filter["x_EXPECTED_ON_TRIGGER_DAY"];
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchOperator = @$filter["z_EXPECTED_ON_TRIGGER_DAY"];
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchCondition = @$filter["v_EXPECTED_ON_TRIGGER_DAY"];
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchValue2 = @$filter["y_EXPECTED_ON_TRIGGER_DAY"];
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchOperator2 = @$filter["w_EXPECTED_ON_TRIGGER_DAY"];
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->save();

		// Field OOCYTES RETRIEVED
		$this->OOCYTES_RETRIEVED->AdvancedSearch->SearchValue = @$filter["x_OOCYTES_RETRIEVED"];
		$this->OOCYTES_RETRIEVED->AdvancedSearch->SearchOperator = @$filter["z_OOCYTES_RETRIEVED"];
		$this->OOCYTES_RETRIEVED->AdvancedSearch->SearchCondition = @$filter["v_OOCYTES_RETRIEVED"];
		$this->OOCYTES_RETRIEVED->AdvancedSearch->SearchValue2 = @$filter["y_OOCYTES_RETRIEVED"];
		$this->OOCYTES_RETRIEVED->AdvancedSearch->SearchOperator2 = @$filter["w_OOCYTES_RETRIEVED"];
		$this->OOCYTES_RETRIEVED->AdvancedSearch->save();

		// Field TIME OF DENUDATION
		$this->TIME_OF_DENUDATION->AdvancedSearch->SearchValue = @$filter["x_TIME_OF_DENUDATION"];
		$this->TIME_OF_DENUDATION->AdvancedSearch->SearchOperator = @$filter["z_TIME_OF_DENUDATION"];
		$this->TIME_OF_DENUDATION->AdvancedSearch->SearchCondition = @$filter["v_TIME_OF_DENUDATION"];
		$this->TIME_OF_DENUDATION->AdvancedSearch->SearchValue2 = @$filter["y_TIME_OF_DENUDATION"];
		$this->TIME_OF_DENUDATION->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_OF_DENUDATION"];
		$this->TIME_OF_DENUDATION->AdvancedSearch->save();

		// Field M-II
		$this->M_II->AdvancedSearch->SearchValue = @$filter["x_M_II"];
		$this->M_II->AdvancedSearch->SearchOperator = @$filter["z_M_II"];
		$this->M_II->AdvancedSearch->SearchCondition = @$filter["v_M_II"];
		$this->M_II->AdvancedSearch->SearchValue2 = @$filter["y_M_II"];
		$this->M_II->AdvancedSearch->SearchOperator2 = @$filter["w_M_II"];
		$this->M_II->AdvancedSearch->save();

		// Field MI
		$this->MI->AdvancedSearch->SearchValue = @$filter["x_MI"];
		$this->MI->AdvancedSearch->SearchOperator = @$filter["z_MI"];
		$this->MI->AdvancedSearch->SearchCondition = @$filter["v_MI"];
		$this->MI->AdvancedSearch->SearchValue2 = @$filter["y_MI"];
		$this->MI->AdvancedSearch->SearchOperator2 = @$filter["w_MI"];
		$this->MI->AdvancedSearch->save();

		// Field GV
		$this->GV->AdvancedSearch->SearchValue = @$filter["x_GV"];
		$this->GV->AdvancedSearch->SearchOperator = @$filter["z_GV"];
		$this->GV->AdvancedSearch->SearchCondition = @$filter["v_GV"];
		$this->GV->AdvancedSearch->SearchValue2 = @$filter["y_GV"];
		$this->GV->AdvancedSearch->SearchOperator2 = @$filter["w_GV"];
		$this->GV->AdvancedSearch->save();

		// Field ICSI TIME FORM OPU
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchValue = @$filter["x_ICSI_TIME_FORM_OPU"];
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchOperator = @$filter["z_ICSI_TIME_FORM_OPU"];
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchCondition = @$filter["v_ICSI_TIME_FORM_OPU"];
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchValue2 = @$filter["y_ICSI_TIME_FORM_OPU"];
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchOperator2 = @$filter["w_ICSI_TIME_FORM_OPU"];
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->save();

		// Field FERT ( 2 PN )
		$this->FERT_28_2_PN_29->AdvancedSearch->SearchValue = @$filter["x_FERT_28_2_PN_29"];
		$this->FERT_28_2_PN_29->AdvancedSearch->SearchOperator = @$filter["z_FERT_28_2_PN_29"];
		$this->FERT_28_2_PN_29->AdvancedSearch->SearchCondition = @$filter["v_FERT_28_2_PN_29"];
		$this->FERT_28_2_PN_29->AdvancedSearch->SearchValue2 = @$filter["y_FERT_28_2_PN_29"];
		$this->FERT_28_2_PN_29->AdvancedSearch->SearchOperator2 = @$filter["w_FERT_28_2_PN_29"];
		$this->FERT_28_2_PN_29->AdvancedSearch->save();

		// Field DEG
		$this->DEG->AdvancedSearch->SearchValue = @$filter["x_DEG"];
		$this->DEG->AdvancedSearch->SearchOperator = @$filter["z_DEG"];
		$this->DEG->AdvancedSearch->SearchCondition = @$filter["v_DEG"];
		$this->DEG->AdvancedSearch->SearchValue2 = @$filter["y_DEG"];
		$this->DEG->AdvancedSearch->SearchOperator2 = @$filter["w_DEG"];
		$this->DEG->AdvancedSearch->save();

		// Field D3 GRADE A
		$this->D3_GRADE_A->AdvancedSearch->SearchValue = @$filter["x_D3_GRADE_A"];
		$this->D3_GRADE_A->AdvancedSearch->SearchOperator = @$filter["z_D3_GRADE_A"];
		$this->D3_GRADE_A->AdvancedSearch->SearchCondition = @$filter["v_D3_GRADE_A"];
		$this->D3_GRADE_A->AdvancedSearch->SearchValue2 = @$filter["y_D3_GRADE_A"];
		$this->D3_GRADE_A->AdvancedSearch->SearchOperator2 = @$filter["w_D3_GRADE_A"];
		$this->D3_GRADE_A->AdvancedSearch->save();

		// Field D3 GRADE B
		$this->D3_GRADE_B->AdvancedSearch->SearchValue = @$filter["x_D3_GRADE_B"];
		$this->D3_GRADE_B->AdvancedSearch->SearchOperator = @$filter["z_D3_GRADE_B"];
		$this->D3_GRADE_B->AdvancedSearch->SearchCondition = @$filter["v_D3_GRADE_B"];
		$this->D3_GRADE_B->AdvancedSearch->SearchValue2 = @$filter["y_D3_GRADE_B"];
		$this->D3_GRADE_B->AdvancedSearch->SearchOperator2 = @$filter["w_D3_GRADE_B"];
		$this->D3_GRADE_B->AdvancedSearch->save();

		// Field D3 GRADE C
		$this->D3_GRADE_C->AdvancedSearch->SearchValue = @$filter["x_D3_GRADE_C"];
		$this->D3_GRADE_C->AdvancedSearch->SearchOperator = @$filter["z_D3_GRADE_C"];
		$this->D3_GRADE_C->AdvancedSearch->SearchCondition = @$filter["v_D3_GRADE_C"];
		$this->D3_GRADE_C->AdvancedSearch->SearchValue2 = @$filter["y_D3_GRADE_C"];
		$this->D3_GRADE_C->AdvancedSearch->SearchOperator2 = @$filter["w_D3_GRADE_C"];
		$this->D3_GRADE_C->AdvancedSearch->save();

		// Field D3 GRADE D
		$this->D3_GRADE_D->AdvancedSearch->SearchValue = @$filter["x_D3_GRADE_D"];
		$this->D3_GRADE_D->AdvancedSearch->SearchOperator = @$filter["z_D3_GRADE_D"];
		$this->D3_GRADE_D->AdvancedSearch->SearchCondition = @$filter["v_D3_GRADE_D"];
		$this->D3_GRADE_D->AdvancedSearch->SearchValue2 = @$filter["y_D3_GRADE_D"];
		$this->D3_GRADE_D->AdvancedSearch->SearchOperator2 = @$filter["w_D3_GRADE_D"];
		$this->D3_GRADE_D->AdvancedSearch->save();

		// Field USABLE ON DAY 3 ET
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchValue = @$filter["x_USABLE_ON_DAY_3_ET"];
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchOperator = @$filter["z_USABLE_ON_DAY_3_ET"];
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchCondition = @$filter["v_USABLE_ON_DAY_3_ET"];
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchValue2 = @$filter["y_USABLE_ON_DAY_3_ET"];
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchOperator2 = @$filter["w_USABLE_ON_DAY_3_ET"];
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->save();

		// Field USABLE ON day 3 FREEZING
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchValue = @$filter["x_USABLE_ON_day_3_FREEZING"];
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchOperator = @$filter["z_USABLE_ON_day_3_FREEZING"];
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchCondition = @$filter["v_USABLE_ON_day_3_FREEZING"];
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchValue2 = @$filter["y_USABLE_ON_day_3_FREEZING"];
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_USABLE_ON_day_3_FREEZING"];
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->save();

		// Field D5 GARDE A
		$this->D5_GARDE_A->AdvancedSearch->SearchValue = @$filter["x_D5_GARDE_A"];
		$this->D5_GARDE_A->AdvancedSearch->SearchOperator = @$filter["z_D5_GARDE_A"];
		$this->D5_GARDE_A->AdvancedSearch->SearchCondition = @$filter["v_D5_GARDE_A"];
		$this->D5_GARDE_A->AdvancedSearch->SearchValue2 = @$filter["y_D5_GARDE_A"];
		$this->D5_GARDE_A->AdvancedSearch->SearchOperator2 = @$filter["w_D5_GARDE_A"];
		$this->D5_GARDE_A->AdvancedSearch->save();

		// Field D5 GRADE B
		$this->D5_GRADE_B->AdvancedSearch->SearchValue = @$filter["x_D5_GRADE_B"];
		$this->D5_GRADE_B->AdvancedSearch->SearchOperator = @$filter["z_D5_GRADE_B"];
		$this->D5_GRADE_B->AdvancedSearch->SearchCondition = @$filter["v_D5_GRADE_B"];
		$this->D5_GRADE_B->AdvancedSearch->SearchValue2 = @$filter["y_D5_GRADE_B"];
		$this->D5_GRADE_B->AdvancedSearch->SearchOperator2 = @$filter["w_D5_GRADE_B"];
		$this->D5_GRADE_B->AdvancedSearch->save();

		// Field D5 GRADE C
		$this->D5_GRADE_C->AdvancedSearch->SearchValue = @$filter["x_D5_GRADE_C"];
		$this->D5_GRADE_C->AdvancedSearch->SearchOperator = @$filter["z_D5_GRADE_C"];
		$this->D5_GRADE_C->AdvancedSearch->SearchCondition = @$filter["v_D5_GRADE_C"];
		$this->D5_GRADE_C->AdvancedSearch->SearchValue2 = @$filter["y_D5_GRADE_C"];
		$this->D5_GRADE_C->AdvancedSearch->SearchOperator2 = @$filter["w_D5_GRADE_C"];
		$this->D5_GRADE_C->AdvancedSearch->save();

		// Field D5 GRADE D
		$this->D5_GRADE_D->AdvancedSearch->SearchValue = @$filter["x_D5_GRADE_D"];
		$this->D5_GRADE_D->AdvancedSearch->SearchOperator = @$filter["z_D5_GRADE_D"];
		$this->D5_GRADE_D->AdvancedSearch->SearchCondition = @$filter["v_D5_GRADE_D"];
		$this->D5_GRADE_D->AdvancedSearch->SearchValue2 = @$filter["y_D5_GRADE_D"];
		$this->D5_GRADE_D->AdvancedSearch->SearchOperator2 = @$filter["w_D5_GRADE_D"];
		$this->D5_GRADE_D->AdvancedSearch->save();

		// Field USABLE ON D5 ET
		$this->USABLE_ON_D5_ET->AdvancedSearch->SearchValue = @$filter["x_USABLE_ON_D5_ET"];
		$this->USABLE_ON_D5_ET->AdvancedSearch->SearchOperator = @$filter["z_USABLE_ON_D5_ET"];
		$this->USABLE_ON_D5_ET->AdvancedSearch->SearchCondition = @$filter["v_USABLE_ON_D5_ET"];
		$this->USABLE_ON_D5_ET->AdvancedSearch->SearchValue2 = @$filter["y_USABLE_ON_D5_ET"];
		$this->USABLE_ON_D5_ET->AdvancedSearch->SearchOperator2 = @$filter["w_USABLE_ON_D5_ET"];
		$this->USABLE_ON_D5_ET->AdvancedSearch->save();

		// Field USABLE ON D5 FREEZING
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchValue = @$filter["x_USABLE_ON_D5_FREEZING"];
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchOperator = @$filter["z_USABLE_ON_D5_FREEZING"];
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchCondition = @$filter["v_USABLE_ON_D5_FREEZING"];
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchValue2 = @$filter["y_USABLE_ON_D5_FREEZING"];
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_USABLE_ON_D5_FREEZING"];
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->save();

		// Field D6 GRADE A
		$this->D6_GRADE_A->AdvancedSearch->SearchValue = @$filter["x_D6_GRADE_A"];
		$this->D6_GRADE_A->AdvancedSearch->SearchOperator = @$filter["z_D6_GRADE_A"];
		$this->D6_GRADE_A->AdvancedSearch->SearchCondition = @$filter["v_D6_GRADE_A"];
		$this->D6_GRADE_A->AdvancedSearch->SearchValue2 = @$filter["y_D6_GRADE_A"];
		$this->D6_GRADE_A->AdvancedSearch->SearchOperator2 = @$filter["w_D6_GRADE_A"];
		$this->D6_GRADE_A->AdvancedSearch->save();

		// Field D6 GRADE B
		$this->D6_GRADE_B->AdvancedSearch->SearchValue = @$filter["x_D6_GRADE_B"];
		$this->D6_GRADE_B->AdvancedSearch->SearchOperator = @$filter["z_D6_GRADE_B"];
		$this->D6_GRADE_B->AdvancedSearch->SearchCondition = @$filter["v_D6_GRADE_B"];
		$this->D6_GRADE_B->AdvancedSearch->SearchValue2 = @$filter["y_D6_GRADE_B"];
		$this->D6_GRADE_B->AdvancedSearch->SearchOperator2 = @$filter["w_D6_GRADE_B"];
		$this->D6_GRADE_B->AdvancedSearch->save();

		// Field D6 GRADE C
		$this->D6_GRADE_C->AdvancedSearch->SearchValue = @$filter["x_D6_GRADE_C"];
		$this->D6_GRADE_C->AdvancedSearch->SearchOperator = @$filter["z_D6_GRADE_C"];
		$this->D6_GRADE_C->AdvancedSearch->SearchCondition = @$filter["v_D6_GRADE_C"];
		$this->D6_GRADE_C->AdvancedSearch->SearchValue2 = @$filter["y_D6_GRADE_C"];
		$this->D6_GRADE_C->AdvancedSearch->SearchOperator2 = @$filter["w_D6_GRADE_C"];
		$this->D6_GRADE_C->AdvancedSearch->save();

		// Field D6 GRADE D
		$this->D6_GRADE_D->AdvancedSearch->SearchValue = @$filter["x_D6_GRADE_D"];
		$this->D6_GRADE_D->AdvancedSearch->SearchOperator = @$filter["z_D6_GRADE_D"];
		$this->D6_GRADE_D->AdvancedSearch->SearchCondition = @$filter["v_D6_GRADE_D"];
		$this->D6_GRADE_D->AdvancedSearch->SearchValue2 = @$filter["y_D6_GRADE_D"];
		$this->D6_GRADE_D->AdvancedSearch->SearchOperator2 = @$filter["w_D6_GRADE_D"];
		$this->D6_GRADE_D->AdvancedSearch->save();

		// Field D6 USABLE EMBRYO ET
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchValue = @$filter["x_D6_USABLE_EMBRYO_ET"];
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchOperator = @$filter["z_D6_USABLE_EMBRYO_ET"];
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchCondition = @$filter["v_D6_USABLE_EMBRYO_ET"];
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchValue2 = @$filter["y_D6_USABLE_EMBRYO_ET"];
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchOperator2 = @$filter["w_D6_USABLE_EMBRYO_ET"];
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->save();

		// Field D6 USABLE FREEZING
		$this->D6_USABLE_FREEZING->AdvancedSearch->SearchValue = @$filter["x_D6_USABLE_FREEZING"];
		$this->D6_USABLE_FREEZING->AdvancedSearch->SearchOperator = @$filter["z_D6_USABLE_FREEZING"];
		$this->D6_USABLE_FREEZING->AdvancedSearch->SearchCondition = @$filter["v_D6_USABLE_FREEZING"];
		$this->D6_USABLE_FREEZING->AdvancedSearch->SearchValue2 = @$filter["y_D6_USABLE_FREEZING"];
		$this->D6_USABLE_FREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_D6_USABLE_FREEZING"];
		$this->D6_USABLE_FREEZING->AdvancedSearch->save();

		// Field TOTAL BLAST
		$this->TOTAL_BLAST->AdvancedSearch->SearchValue = @$filter["x_TOTAL_BLAST"];
		$this->TOTAL_BLAST->AdvancedSearch->SearchOperator = @$filter["z_TOTAL_BLAST"];
		$this->TOTAL_BLAST->AdvancedSearch->SearchCondition = @$filter["v_TOTAL_BLAST"];
		$this->TOTAL_BLAST->AdvancedSearch->SearchValue2 = @$filter["y_TOTAL_BLAST"];
		$this->TOTAL_BLAST->AdvancedSearch->SearchOperator2 = @$filter["w_TOTAL_BLAST"];
		$this->TOTAL_BLAST->AdvancedSearch->save();

		// Field PGS
		$this->PGS->AdvancedSearch->SearchValue = @$filter["x_PGS"];
		$this->PGS->AdvancedSearch->SearchOperator = @$filter["z_PGS"];
		$this->PGS->AdvancedSearch->SearchCondition = @$filter["v_PGS"];
		$this->PGS->AdvancedSearch->SearchValue2 = @$filter["y_PGS"];
		$this->PGS->AdvancedSearch->SearchOperator2 = @$filter["w_PGS"];
		$this->PGS->AdvancedSearch->save();

		// Field REMARKS
		$this->REMARKS->AdvancedSearch->SearchValue = @$filter["x_REMARKS"];
		$this->REMARKS->AdvancedSearch->SearchOperator = @$filter["z_REMARKS"];
		$this->REMARKS->AdvancedSearch->SearchCondition = @$filter["v_REMARKS"];
		$this->REMARKS->AdvancedSearch->SearchValue2 = @$filter["y_REMARKS"];
		$this->REMARKS->AdvancedSearch->SearchOperator2 = @$filter["w_REMARKS"];
		$this->REMARKS->AdvancedSearch->save();

		// Field PU - D/B
		$this->PU___D2FB->AdvancedSearch->SearchValue = @$filter["x_PU___D2FB"];
		$this->PU___D2FB->AdvancedSearch->SearchOperator = @$filter["z_PU___D2FB"];
		$this->PU___D2FB->AdvancedSearch->SearchCondition = @$filter["v_PU___D2FB"];
		$this->PU___D2FB->AdvancedSearch->SearchValue2 = @$filter["y_PU___D2FB"];
		$this->PU___D2FB->AdvancedSearch->SearchOperator2 = @$filter["w_PU___D2FB"];
		$this->PU___D2FB->AdvancedSearch->save();

		// Field ICSI D/B
		$this->ICSI_D2FB->AdvancedSearch->SearchValue = @$filter["x_ICSI_D2FB"];
		$this->ICSI_D2FB->AdvancedSearch->SearchOperator = @$filter["z_ICSI_D2FB"];
		$this->ICSI_D2FB->AdvancedSearch->SearchCondition = @$filter["v_ICSI_D2FB"];
		$this->ICSI_D2FB->AdvancedSearch->SearchValue2 = @$filter["y_ICSI_D2FB"];
		$this->ICSI_D2FB->AdvancedSearch->SearchOperator2 = @$filter["w_ICSI_D2FB"];
		$this->ICSI_D2FB->AdvancedSearch->save();

		// Field VIT D/B
		$this->VIT_D2FB->AdvancedSearch->SearchValue = @$filter["x_VIT_D2FB"];
		$this->VIT_D2FB->AdvancedSearch->SearchOperator = @$filter["z_VIT_D2FB"];
		$this->VIT_D2FB->AdvancedSearch->SearchCondition = @$filter["v_VIT_D2FB"];
		$this->VIT_D2FB->AdvancedSearch->SearchValue2 = @$filter["y_VIT_D2FB"];
		$this->VIT_D2FB->AdvancedSearch->SearchOperator2 = @$filter["w_VIT_D2FB"];
		$this->VIT_D2FB->AdvancedSearch->save();

		// Field ET D/B
		$this->ET_D2FB->AdvancedSearch->SearchValue = @$filter["x_ET_D2FB"];
		$this->ET_D2FB->AdvancedSearch->SearchOperator = @$filter["z_ET_D2FB"];
		$this->ET_D2FB->AdvancedSearch->SearchCondition = @$filter["v_ET_D2FB"];
		$this->ET_D2FB->AdvancedSearch->SearchValue2 = @$filter["y_ET_D2FB"];
		$this->ET_D2FB->AdvancedSearch->SearchOperator2 = @$filter["w_ET_D2FB"];
		$this->ET_D2FB->AdvancedSearch->save();

		// Field LAB COMMENTS
		$this->LAB_COMMENTS->AdvancedSearch->SearchValue = @$filter["x_LAB_COMMENTS"];
		$this->LAB_COMMENTS->AdvancedSearch->SearchOperator = @$filter["z_LAB_COMMENTS"];
		$this->LAB_COMMENTS->AdvancedSearch->SearchCondition = @$filter["v_LAB_COMMENTS"];
		$this->LAB_COMMENTS->AdvancedSearch->SearchValue2 = @$filter["y_LAB_COMMENTS"];
		$this->LAB_COMMENTS->AdvancedSearch->SearchOperator2 = @$filter["w_LAB_COMMENTS"];
		$this->LAB_COMMENTS->AdvancedSearch->save();

		// Field Reason for no FRESH transfer
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchValue = @$filter["x_Reason_for_no_FRESH_transfer"];
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchOperator = @$filter["z_Reason_for_no_FRESH_transfer"];
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchCondition = @$filter["v_Reason_for_no_FRESH_transfer"];
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchValue2 = @$filter["y_Reason_for_no_FRESH_transfer"];
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchOperator2 = @$filter["w_Reason_for_no_FRESH_transfer"];
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->save();

		// Field No of embryos transferred Day 3/5, A,B,C
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchValue = @$filter["x_No_of_embryos_transferred_Day_32F52C_A2CB2CC"];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchOperator = @$filter["z_No_of_embryos_transferred_Day_32F52C_A2CB2CC"];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchCondition = @$filter["v_No_of_embryos_transferred_Day_32F52C_A2CB2CC"];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchValue2 = @$filter["y_No_of_embryos_transferred_Day_32F52C_A2CB2CC"];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchOperator2 = @$filter["w_No_of_embryos_transferred_Day_32F52C_A2CB2CC"];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->save();

		// Field EMBRYOS PENDING
		$this->EMBRYOS_PENDING->AdvancedSearch->SearchValue = @$filter["x_EMBRYOS_PENDING"];
		$this->EMBRYOS_PENDING->AdvancedSearch->SearchOperator = @$filter["z_EMBRYOS_PENDING"];
		$this->EMBRYOS_PENDING->AdvancedSearch->SearchCondition = @$filter["v_EMBRYOS_PENDING"];
		$this->EMBRYOS_PENDING->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYOS_PENDING"];
		$this->EMBRYOS_PENDING->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYOS_PENDING"];
		$this->EMBRYOS_PENDING->AdvancedSearch->save();

		// Field DAY OF TRANSFER
		$this->DAY_OF_TRANSFER->AdvancedSearch->SearchValue = @$filter["x_DAY_OF_TRANSFER"];
		$this->DAY_OF_TRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DAY_OF_TRANSFER"];
		$this->DAY_OF_TRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DAY_OF_TRANSFER"];
		$this->DAY_OF_TRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DAY_OF_TRANSFER"];
		$this->DAY_OF_TRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DAY_OF_TRANSFER"];
		$this->DAY_OF_TRANSFER->AdvancedSearch->save();

		// Field H/D sperm
		$this->H2FD_sperm->AdvancedSearch->SearchValue = @$filter["x_H2FD_sperm"];
		$this->H2FD_sperm->AdvancedSearch->SearchOperator = @$filter["z_H2FD_sperm"];
		$this->H2FD_sperm->AdvancedSearch->SearchCondition = @$filter["v_H2FD_sperm"];
		$this->H2FD_sperm->AdvancedSearch->SearchValue2 = @$filter["y_H2FD_sperm"];
		$this->H2FD_sperm->AdvancedSearch->SearchOperator2 = @$filter["w_H2FD_sperm"];
		$this->H2FD_sperm->AdvancedSearch->save();

		// Field Comments
		$this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
		$this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
		$this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
		$this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
		$this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
		$this->Comments->AdvancedSearch->save();

		// Field sc progesterone
		$this->sc_progesterone->AdvancedSearch->SearchValue = @$filter["x_sc_progesterone"];
		$this->sc_progesterone->AdvancedSearch->SearchOperator = @$filter["z_sc_progesterone"];
		$this->sc_progesterone->AdvancedSearch->SearchCondition = @$filter["v_sc_progesterone"];
		$this->sc_progesterone->AdvancedSearch->SearchValue2 = @$filter["y_sc_progesterone"];
		$this->sc_progesterone->AdvancedSearch->SearchOperator2 = @$filter["w_sc_progesterone"];
		$this->sc_progesterone->AdvancedSearch->save();

		// Field Natural micronised 400mg bd + duphaston 10mg bd
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchValue = @$filter["x_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd"];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchOperator = @$filter["z_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd"];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchCondition = @$filter["v_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd"];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchValue2 = @$filter["y_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd"];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchOperator2 = @$filter["w_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd"];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->save();

		// Field CRINONE
		$this->CRINONE->AdvancedSearch->SearchValue = @$filter["x_CRINONE"];
		$this->CRINONE->AdvancedSearch->SearchOperator = @$filter["z_CRINONE"];
		$this->CRINONE->AdvancedSearch->SearchCondition = @$filter["v_CRINONE"];
		$this->CRINONE->AdvancedSearch->SearchValue2 = @$filter["y_CRINONE"];
		$this->CRINONE->AdvancedSearch->SearchOperator2 = @$filter["w_CRINONE"];
		$this->CRINONE->AdvancedSearch->save();

		// Field progynova
		$this->progynova->AdvancedSearch->SearchValue = @$filter["x_progynova"];
		$this->progynova->AdvancedSearch->SearchOperator = @$filter["z_progynova"];
		$this->progynova->AdvancedSearch->SearchCondition = @$filter["v_progynova"];
		$this->progynova->AdvancedSearch->SearchValue2 = @$filter["y_progynova"];
		$this->progynova->AdvancedSearch->SearchOperator2 = @$filter["w_progynova"];
		$this->progynova->AdvancedSearch->save();

		// Field Heparin
		$this->Heparin->AdvancedSearch->SearchValue = @$filter["x_Heparin"];
		$this->Heparin->AdvancedSearch->SearchOperator = @$filter["z_Heparin"];
		$this->Heparin->AdvancedSearch->SearchCondition = @$filter["v_Heparin"];
		$this->Heparin->AdvancedSearch->SearchValue2 = @$filter["y_Heparin"];
		$this->Heparin->AdvancedSearch->SearchOperator2 = @$filter["w_Heparin"];
		$this->Heparin->AdvancedSearch->save();

		// Field cabergolin
		$this->cabergolin->AdvancedSearch->SearchValue = @$filter["x_cabergolin"];
		$this->cabergolin->AdvancedSearch->SearchOperator = @$filter["z_cabergolin"];
		$this->cabergolin->AdvancedSearch->SearchCondition = @$filter["v_cabergolin"];
		$this->cabergolin->AdvancedSearch->SearchValue2 = @$filter["y_cabergolin"];
		$this->cabergolin->AdvancedSearch->SearchOperator2 = @$filter["w_cabergolin"];
		$this->cabergolin->AdvancedSearch->save();

		// Field Antagonist
		$this->Antagonist->AdvancedSearch->SearchValue = @$filter["x_Antagonist"];
		$this->Antagonist->AdvancedSearch->SearchOperator = @$filter["z_Antagonist"];
		$this->Antagonist->AdvancedSearch->SearchCondition = @$filter["v_Antagonist"];
		$this->Antagonist->AdvancedSearch->SearchValue2 = @$filter["y_Antagonist"];
		$this->Antagonist->AdvancedSearch->SearchOperator2 = @$filter["w_Antagonist"];
		$this->Antagonist->AdvancedSearch->save();

		// Field OHSS
		$this->OHSS->AdvancedSearch->SearchValue = @$filter["x_OHSS"];
		$this->OHSS->AdvancedSearch->SearchOperator = @$filter["z_OHSS"];
		$this->OHSS->AdvancedSearch->SearchCondition = @$filter["v_OHSS"];
		$this->OHSS->AdvancedSearch->SearchValue2 = @$filter["y_OHSS"];
		$this->OHSS->AdvancedSearch->SearchOperator2 = @$filter["w_OHSS"];
		$this->OHSS->AdvancedSearch->save();

		// Field Complications
		$this->Complications->AdvancedSearch->SearchValue = @$filter["x_Complications"];
		$this->Complications->AdvancedSearch->SearchOperator = @$filter["z_Complications"];
		$this->Complications->AdvancedSearch->SearchCondition = @$filter["v_Complications"];
		$this->Complications->AdvancedSearch->SearchValue2 = @$filter["y_Complications"];
		$this->Complications->AdvancedSearch->SearchOperator2 = @$filter["w_Complications"];
		$this->Complications->AdvancedSearch->save();

		// Field LP bleeding
		$this->LP_bleeding->AdvancedSearch->SearchValue = @$filter["x_LP_bleeding"];
		$this->LP_bleeding->AdvancedSearch->SearchOperator = @$filter["z_LP_bleeding"];
		$this->LP_bleeding->AdvancedSearch->SearchCondition = @$filter["v_LP_bleeding"];
		$this->LP_bleeding->AdvancedSearch->SearchValue2 = @$filter["y_LP_bleeding"];
		$this->LP_bleeding->AdvancedSearch->SearchOperator2 = @$filter["w_LP_bleeding"];
		$this->LP_bleeding->AdvancedSearch->save();

		// Field ß-hCG
		$this->DF_hCG->AdvancedSearch->SearchValue = @$filter["x_DF_hCG"];
		$this->DF_hCG->AdvancedSearch->SearchOperator = @$filter["z_DF_hCG"];
		$this->DF_hCG->AdvancedSearch->SearchCondition = @$filter["v_DF_hCG"];
		$this->DF_hCG->AdvancedSearch->SearchValue2 = @$filter["y_DF_hCG"];
		$this->DF_hCG->AdvancedSearch->SearchOperator2 = @$filter["w_DF_hCG"];
		$this->DF_hCG->AdvancedSearch->save();

		// Field Implantation rate
		$this->Implantation_rate->AdvancedSearch->SearchValue = @$filter["x_Implantation_rate"];
		$this->Implantation_rate->AdvancedSearch->SearchOperator = @$filter["z_Implantation_rate"];
		$this->Implantation_rate->AdvancedSearch->SearchCondition = @$filter["v_Implantation_rate"];
		$this->Implantation_rate->AdvancedSearch->SearchValue2 = @$filter["y_Implantation_rate"];
		$this->Implantation_rate->AdvancedSearch->SearchOperator2 = @$filter["w_Implantation_rate"];
		$this->Implantation_rate->AdvancedSearch->save();

		// Field Ectopic
		$this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
		$this->Ectopic->AdvancedSearch->save();

		// Field Type of preg
		$this->Type_of_preg->AdvancedSearch->SearchValue = @$filter["x_Type_of_preg"];
		$this->Type_of_preg->AdvancedSearch->SearchOperator = @$filter["z_Type_of_preg"];
		$this->Type_of_preg->AdvancedSearch->SearchCondition = @$filter["v_Type_of_preg"];
		$this->Type_of_preg->AdvancedSearch->SearchValue2 = @$filter["y_Type_of_preg"];
		$this->Type_of_preg->AdvancedSearch->SearchOperator2 = @$filter["w_Type_of_preg"];
		$this->Type_of_preg->AdvancedSearch->save();

		// Field ANC
		$this->ANC->AdvancedSearch->SearchValue = @$filter["x_ANC"];
		$this->ANC->AdvancedSearch->SearchOperator = @$filter["z_ANC"];
		$this->ANC->AdvancedSearch->SearchCondition = @$filter["v_ANC"];
		$this->ANC->AdvancedSearch->SearchValue2 = @$filter["y_ANC"];
		$this->ANC->AdvancedSearch->SearchOperator2 = @$filter["w_ANC"];
		$this->ANC->AdvancedSearch->save();

		// Field anomalies
		$this->anomalies->AdvancedSearch->SearchValue = @$filter["x_anomalies"];
		$this->anomalies->AdvancedSearch->SearchOperator = @$filter["z_anomalies"];
		$this->anomalies->AdvancedSearch->SearchCondition = @$filter["v_anomalies"];
		$this->anomalies->AdvancedSearch->SearchValue2 = @$filter["y_anomalies"];
		$this->anomalies->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies"];
		$this->anomalies->AdvancedSearch->save();

		// Field baby wt
		$this->baby_wt->AdvancedSearch->SearchValue = @$filter["x_baby_wt"];
		$this->baby_wt->AdvancedSearch->SearchOperator = @$filter["z_baby_wt"];
		$this->baby_wt->AdvancedSearch->SearchCondition = @$filter["v_baby_wt"];
		$this->baby_wt->AdvancedSearch->SearchValue2 = @$filter["y_baby_wt"];
		$this->baby_wt->AdvancedSearch->SearchOperator2 = @$filter["w_baby_wt"];
		$this->baby_wt->AdvancedSearch->save();

		// Field GA at delivery
		$this->GA_at_delivery->AdvancedSearch->SearchValue = @$filter["x_GA_at_delivery"];
		$this->GA_at_delivery->AdvancedSearch->SearchOperator = @$filter["z_GA_at_delivery"];
		$this->GA_at_delivery->AdvancedSearch->SearchCondition = @$filter["v_GA_at_delivery"];
		$this->GA_at_delivery->AdvancedSearch->SearchValue2 = @$filter["y_GA_at_delivery"];
		$this->GA_at_delivery->AdvancedSearch->SearchOperator2 = @$filter["w_GA_at_delivery"];
		$this->GA_at_delivery->AdvancedSearch->save();

		// Field Pregnancy outcome
		$this->Pregnancy_outcome->AdvancedSearch->SearchValue = @$filter["x_Pregnancy_outcome"];
		$this->Pregnancy_outcome->AdvancedSearch->SearchOperator = @$filter["z_Pregnancy_outcome"];
		$this->Pregnancy_outcome->AdvancedSearch->SearchCondition = @$filter["v_Pregnancy_outcome"];
		$this->Pregnancy_outcome->AdvancedSearch->SearchValue2 = @$filter["y_Pregnancy_outcome"];
		$this->Pregnancy_outcome->AdvancedSearch->SearchOperator2 = @$filter["w_Pregnancy_outcome"];
		$this->Pregnancy_outcome->AdvancedSearch->save();

		// Field 1st FET
		$this->_1st_FET->AdvancedSearch->SearchValue = @$filter["x__1st_FET"];
		$this->_1st_FET->AdvancedSearch->SearchOperator = @$filter["z__1st_FET"];
		$this->_1st_FET->AdvancedSearch->SearchCondition = @$filter["v__1st_FET"];
		$this->_1st_FET->AdvancedSearch->SearchValue2 = @$filter["y__1st_FET"];
		$this->_1st_FET->AdvancedSearch->SearchOperator2 = @$filter["w__1st_FET"];
		$this->_1st_FET->AdvancedSearch->save();

		// Field AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchValue = @$filter["x_AFTER_HYSTEROSCOPY"];
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchOperator = @$filter["z_AFTER_HYSTEROSCOPY"];
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchCondition = @$filter["v_AFTER_HYSTEROSCOPY"];
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchValue2 = @$filter["y_AFTER_HYSTEROSCOPY"];
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchOperator2 = @$filter["w_AFTER_HYSTEROSCOPY"];
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->save();

		// Field AFTER ERA
		$this->AFTER_ERA->AdvancedSearch->SearchValue = @$filter["x_AFTER_ERA"];
		$this->AFTER_ERA->AdvancedSearch->SearchOperator = @$filter["z_AFTER_ERA"];
		$this->AFTER_ERA->AdvancedSearch->SearchCondition = @$filter["v_AFTER_ERA"];
		$this->AFTER_ERA->AdvancedSearch->SearchValue2 = @$filter["y_AFTER_ERA"];
		$this->AFTER_ERA->AdvancedSearch->SearchOperator2 = @$filter["w_AFTER_ERA"];
		$this->AFTER_ERA->AdvancedSearch->save();

		// Field ERA
		$this->ERA->AdvancedSearch->SearchValue = @$filter["x_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator = @$filter["z_ERA"];
		$this->ERA->AdvancedSearch->SearchCondition = @$filter["v_ERA"];
		$this->ERA->AdvancedSearch->SearchValue2 = @$filter["y_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator2 = @$filter["w_ERA"];
		$this->ERA->AdvancedSearch->save();

		// Field HRT
		$this->HRT->AdvancedSearch->SearchValue = @$filter["x_HRT"];
		$this->HRT->AdvancedSearch->SearchOperator = @$filter["z_HRT"];
		$this->HRT->AdvancedSearch->SearchCondition = @$filter["v_HRT"];
		$this->HRT->AdvancedSearch->SearchValue2 = @$filter["y_HRT"];
		$this->HRT->AdvancedSearch->SearchOperator2 = @$filter["w_HRT"];
		$this->HRT->AdvancedSearch->save();

		// Field XGRAST/PRP
		$this->XGRAST2FPRP->AdvancedSearch->SearchValue = @$filter["x_XGRAST2FPRP"];
		$this->XGRAST2FPRP->AdvancedSearch->SearchOperator = @$filter["z_XGRAST2FPRP"];
		$this->XGRAST2FPRP->AdvancedSearch->SearchCondition = @$filter["v_XGRAST2FPRP"];
		$this->XGRAST2FPRP->AdvancedSearch->SearchValue2 = @$filter["y_XGRAST2FPRP"];
		$this->XGRAST2FPRP->AdvancedSearch->SearchOperator2 = @$filter["w_XGRAST2FPRP"];
		$this->XGRAST2FPRP->AdvancedSearch->save();

		// Field EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchValue = @$filter["x_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchOperator = @$filter["z_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchCondition = @$filter["v_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->save();

		// Field LMWH 40MG
		$this->LMWH_40MG->AdvancedSearch->SearchValue = @$filter["x_LMWH_40MG"];
		$this->LMWH_40MG->AdvancedSearch->SearchOperator = @$filter["z_LMWH_40MG"];
		$this->LMWH_40MG->AdvancedSearch->SearchCondition = @$filter["v_LMWH_40MG"];
		$this->LMWH_40MG->AdvancedSearch->SearchValue2 = @$filter["y_LMWH_40MG"];
		$this->LMWH_40MG->AdvancedSearch->SearchOperator2 = @$filter["w_LMWH_40MG"];
		$this->LMWH_40MG->AdvancedSearch->save();

		// Field ß-hCG2
		$this->DF_hCG2->AdvancedSearch->SearchValue = @$filter["x_DF_hCG2"];
		$this->DF_hCG2->AdvancedSearch->SearchOperator = @$filter["z_DF_hCG2"];
		$this->DF_hCG2->AdvancedSearch->SearchCondition = @$filter["v_DF_hCG2"];
		$this->DF_hCG2->AdvancedSearch->SearchValue2 = @$filter["y_DF_hCG2"];
		$this->DF_hCG2->AdvancedSearch->SearchOperator2 = @$filter["w_DF_hCG2"];
		$this->DF_hCG2->AdvancedSearch->save();

		// Field Implantation rate1
		$this->Implantation_rate1->AdvancedSearch->SearchValue = @$filter["x_Implantation_rate1"];
		$this->Implantation_rate1->AdvancedSearch->SearchOperator = @$filter["z_Implantation_rate1"];
		$this->Implantation_rate1->AdvancedSearch->SearchCondition = @$filter["v_Implantation_rate1"];
		$this->Implantation_rate1->AdvancedSearch->SearchValue2 = @$filter["y_Implantation_rate1"];
		$this->Implantation_rate1->AdvancedSearch->SearchOperator2 = @$filter["w_Implantation_rate1"];
		$this->Implantation_rate1->AdvancedSearch->save();

		// Field Ectopic1
		$this->Ectopic1->AdvancedSearch->SearchValue = @$filter["x_Ectopic1"];
		$this->Ectopic1->AdvancedSearch->SearchOperator = @$filter["z_Ectopic1"];
		$this->Ectopic1->AdvancedSearch->SearchCondition = @$filter["v_Ectopic1"];
		$this->Ectopic1->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic1"];
		$this->Ectopic1->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic1"];
		$this->Ectopic1->AdvancedSearch->save();

		// Field Type of pregA
		$this->Type_of_pregA->AdvancedSearch->SearchValue = @$filter["x_Type_of_pregA"];
		$this->Type_of_pregA->AdvancedSearch->SearchOperator = @$filter["z_Type_of_pregA"];
		$this->Type_of_pregA->AdvancedSearch->SearchCondition = @$filter["v_Type_of_pregA"];
		$this->Type_of_pregA->AdvancedSearch->SearchValue2 = @$filter["y_Type_of_pregA"];
		$this->Type_of_pregA->AdvancedSearch->SearchOperator2 = @$filter["w_Type_of_pregA"];
		$this->Type_of_pregA->AdvancedSearch->save();

		// Field ANC1
		$this->ANC1->AdvancedSearch->SearchValue = @$filter["x_ANC1"];
		$this->ANC1->AdvancedSearch->SearchOperator = @$filter["z_ANC1"];
		$this->ANC1->AdvancedSearch->SearchCondition = @$filter["v_ANC1"];
		$this->ANC1->AdvancedSearch->SearchValue2 = @$filter["y_ANC1"];
		$this->ANC1->AdvancedSearch->SearchOperator2 = @$filter["w_ANC1"];
		$this->ANC1->AdvancedSearch->save();

		// Field anomalies2
		$this->anomalies2->AdvancedSearch->SearchValue = @$filter["x_anomalies2"];
		$this->anomalies2->AdvancedSearch->SearchOperator = @$filter["z_anomalies2"];
		$this->anomalies2->AdvancedSearch->SearchCondition = @$filter["v_anomalies2"];
		$this->anomalies2->AdvancedSearch->SearchValue2 = @$filter["y_anomalies2"];
		$this->anomalies2->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies2"];
		$this->anomalies2->AdvancedSearch->save();

		// Field baby wt2
		$this->baby_wt2->AdvancedSearch->SearchValue = @$filter["x_baby_wt2"];
		$this->baby_wt2->AdvancedSearch->SearchOperator = @$filter["z_baby_wt2"];
		$this->baby_wt2->AdvancedSearch->SearchCondition = @$filter["v_baby_wt2"];
		$this->baby_wt2->AdvancedSearch->SearchValue2 = @$filter["y_baby_wt2"];
		$this->baby_wt2->AdvancedSearch->SearchOperator2 = @$filter["w_baby_wt2"];
		$this->baby_wt2->AdvancedSearch->save();

		// Field GA at delivery1
		$this->GA_at_delivery1->AdvancedSearch->SearchValue = @$filter["x_GA_at_delivery1"];
		$this->GA_at_delivery1->AdvancedSearch->SearchOperator = @$filter["z_GA_at_delivery1"];
		$this->GA_at_delivery1->AdvancedSearch->SearchCondition = @$filter["v_GA_at_delivery1"];
		$this->GA_at_delivery1->AdvancedSearch->SearchValue2 = @$filter["y_GA_at_delivery1"];
		$this->GA_at_delivery1->AdvancedSearch->SearchOperator2 = @$filter["w_GA_at_delivery1"];
		$this->GA_at_delivery1->AdvancedSearch->save();

		// Field Pregnancy outcome1
		$this->Pregnancy_outcome1->AdvancedSearch->SearchValue = @$filter["x_Pregnancy_outcome1"];
		$this->Pregnancy_outcome1->AdvancedSearch->SearchOperator = @$filter["z_Pregnancy_outcome1"];
		$this->Pregnancy_outcome1->AdvancedSearch->SearchCondition = @$filter["v_Pregnancy_outcome1"];
		$this->Pregnancy_outcome1->AdvancedSearch->SearchValue2 = @$filter["y_Pregnancy_outcome1"];
		$this->Pregnancy_outcome1->AdvancedSearch->SearchOperator2 = @$filter["w_Pregnancy_outcome1"];
		$this->Pregnancy_outcome1->AdvancedSearch->save();

		// Field 2ND FET
		$this->_2ND_FET->AdvancedSearch->SearchValue = @$filter["x__2ND_FET"];
		$this->_2ND_FET->AdvancedSearch->SearchOperator = @$filter["z__2ND_FET"];
		$this->_2ND_FET->AdvancedSearch->SearchCondition = @$filter["v__2ND_FET"];
		$this->_2ND_FET->AdvancedSearch->SearchValue2 = @$filter["y__2ND_FET"];
		$this->_2ND_FET->AdvancedSearch->SearchOperator2 = @$filter["w__2ND_FET"];
		$this->_2ND_FET->AdvancedSearch->save();

		// Field AFTER HYSTEROSCOPY1
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchValue = @$filter["x_AFTER_HYSTEROSCOPY1"];
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchOperator = @$filter["z_AFTER_HYSTEROSCOPY1"];
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchCondition = @$filter["v_AFTER_HYSTEROSCOPY1"];
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchValue2 = @$filter["y_AFTER_HYSTEROSCOPY1"];
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchOperator2 = @$filter["w_AFTER_HYSTEROSCOPY1"];
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->save();

		// Field AFTER ERA1
		$this->AFTER_ERA1->AdvancedSearch->SearchValue = @$filter["x_AFTER_ERA1"];
		$this->AFTER_ERA1->AdvancedSearch->SearchOperator = @$filter["z_AFTER_ERA1"];
		$this->AFTER_ERA1->AdvancedSearch->SearchCondition = @$filter["v_AFTER_ERA1"];
		$this->AFTER_ERA1->AdvancedSearch->SearchValue2 = @$filter["y_AFTER_ERA1"];
		$this->AFTER_ERA1->AdvancedSearch->SearchOperator2 = @$filter["w_AFTER_ERA1"];
		$this->AFTER_ERA1->AdvancedSearch->save();

		// Field ERA1
		$this->ERA1->AdvancedSearch->SearchValue = @$filter["x_ERA1"];
		$this->ERA1->AdvancedSearch->SearchOperator = @$filter["z_ERA1"];
		$this->ERA1->AdvancedSearch->SearchCondition = @$filter["v_ERA1"];
		$this->ERA1->AdvancedSearch->SearchValue2 = @$filter["y_ERA1"];
		$this->ERA1->AdvancedSearch->SearchOperator2 = @$filter["w_ERA1"];
		$this->ERA1->AdvancedSearch->save();

		// Field HRT1
		$this->HRT1->AdvancedSearch->SearchValue = @$filter["x_HRT1"];
		$this->HRT1->AdvancedSearch->SearchOperator = @$filter["z_HRT1"];
		$this->HRT1->AdvancedSearch->SearchCondition = @$filter["v_HRT1"];
		$this->HRT1->AdvancedSearch->SearchValue2 = @$filter["y_HRT1"];
		$this->HRT1->AdvancedSearch->SearchOperator2 = @$filter["w_HRT1"];
		$this->HRT1->AdvancedSearch->save();

		// Field XGRAST/PRP1
		$this->XGRAST2FPRP1->AdvancedSearch->SearchValue = @$filter["x_XGRAST2FPRP1"];
		$this->XGRAST2FPRP1->AdvancedSearch->SearchOperator = @$filter["z_XGRAST2FPRP1"];
		$this->XGRAST2FPRP1->AdvancedSearch->SearchCondition = @$filter["v_XGRAST2FPRP1"];
		$this->XGRAST2FPRP1->AdvancedSearch->SearchValue2 = @$filter["y_XGRAST2FPRP1"];
		$this->XGRAST2FPRP1->AdvancedSearch->SearchOperator2 = @$filter["w_XGRAST2FPRP1"];
		$this->XGRAST2FPRP1->AdvancedSearch->save();

		// Field NUMBER OF EMBRYOS
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchValue = @$filter["x_NUMBER_OF_EMBRYOS"];
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_NUMBER_OF_EMBRYOS"];
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_NUMBER_OF_EMBRYOS"];
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_NUMBER_OF_EMBRYOS"];
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBER_OF_EMBRYOS"];
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->save();

		// Field EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchValue = @$filter["x_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchOperator = @$filter["z_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchCondition = @$filter["v_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C"];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->save();

		// Field INTRALIPID AND BARGLOBIN
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchValue = @$filter["x_INTRALIPID_AND_BARGLOBIN"];
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchOperator = @$filter["z_INTRALIPID_AND_BARGLOBIN"];
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchCondition = @$filter["v_INTRALIPID_AND_BARGLOBIN"];
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchValue2 = @$filter["y_INTRALIPID_AND_BARGLOBIN"];
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchOperator2 = @$filter["w_INTRALIPID_AND_BARGLOBIN"];
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->save();

		// Field LMWH 40MG1
		$this->LMWH_40MG1->AdvancedSearch->SearchValue = @$filter["x_LMWH_40MG1"];
		$this->LMWH_40MG1->AdvancedSearch->SearchOperator = @$filter["z_LMWH_40MG1"];
		$this->LMWH_40MG1->AdvancedSearch->SearchCondition = @$filter["v_LMWH_40MG1"];
		$this->LMWH_40MG1->AdvancedSearch->SearchValue2 = @$filter["y_LMWH_40MG1"];
		$this->LMWH_40MG1->AdvancedSearch->SearchOperator2 = @$filter["w_LMWH_40MG1"];
		$this->LMWH_40MG1->AdvancedSearch->save();

		// Field ß-hCG1
		$this->DF_hCG1->AdvancedSearch->SearchValue = @$filter["x_DF_hCG1"];
		$this->DF_hCG1->AdvancedSearch->SearchOperator = @$filter["z_DF_hCG1"];
		$this->DF_hCG1->AdvancedSearch->SearchCondition = @$filter["v_DF_hCG1"];
		$this->DF_hCG1->AdvancedSearch->SearchValue2 = @$filter["y_DF_hCG1"];
		$this->DF_hCG1->AdvancedSearch->SearchOperator2 = @$filter["w_DF_hCG1"];
		$this->DF_hCG1->AdvancedSearch->save();

		// Field Implantation rate2
		$this->Implantation_rate2->AdvancedSearch->SearchValue = @$filter["x_Implantation_rate2"];
		$this->Implantation_rate2->AdvancedSearch->SearchOperator = @$filter["z_Implantation_rate2"];
		$this->Implantation_rate2->AdvancedSearch->SearchCondition = @$filter["v_Implantation_rate2"];
		$this->Implantation_rate2->AdvancedSearch->SearchValue2 = @$filter["y_Implantation_rate2"];
		$this->Implantation_rate2->AdvancedSearch->SearchOperator2 = @$filter["w_Implantation_rate2"];
		$this->Implantation_rate2->AdvancedSearch->save();

		// Field Ectopic2
		$this->Ectopic2->AdvancedSearch->SearchValue = @$filter["x_Ectopic2"];
		$this->Ectopic2->AdvancedSearch->SearchOperator = @$filter["z_Ectopic2"];
		$this->Ectopic2->AdvancedSearch->SearchCondition = @$filter["v_Ectopic2"];
		$this->Ectopic2->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic2"];
		$this->Ectopic2->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic2"];
		$this->Ectopic2->AdvancedSearch->save();

		// Field Type of preg2
		$this->Type_of_preg2->AdvancedSearch->SearchValue = @$filter["x_Type_of_preg2"];
		$this->Type_of_preg2->AdvancedSearch->SearchOperator = @$filter["z_Type_of_preg2"];
		$this->Type_of_preg2->AdvancedSearch->SearchCondition = @$filter["v_Type_of_preg2"];
		$this->Type_of_preg2->AdvancedSearch->SearchValue2 = @$filter["y_Type_of_preg2"];
		$this->Type_of_preg2->AdvancedSearch->SearchOperator2 = @$filter["w_Type_of_preg2"];
		$this->Type_of_preg2->AdvancedSearch->save();

		// Field ANCA
		$this->ANCA->AdvancedSearch->SearchValue = @$filter["x_ANCA"];
		$this->ANCA->AdvancedSearch->SearchOperator = @$filter["z_ANCA"];
		$this->ANCA->AdvancedSearch->SearchCondition = @$filter["v_ANCA"];
		$this->ANCA->AdvancedSearch->SearchValue2 = @$filter["y_ANCA"];
		$this->ANCA->AdvancedSearch->SearchOperator2 = @$filter["w_ANCA"];
		$this->ANCA->AdvancedSearch->save();

		// Field anomalies1
		$this->anomalies1->AdvancedSearch->SearchValue = @$filter["x_anomalies1"];
		$this->anomalies1->AdvancedSearch->SearchOperator = @$filter["z_anomalies1"];
		$this->anomalies1->AdvancedSearch->SearchCondition = @$filter["v_anomalies1"];
		$this->anomalies1->AdvancedSearch->SearchValue2 = @$filter["y_anomalies1"];
		$this->anomalies1->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies1"];
		$this->anomalies1->AdvancedSearch->save();

		// Field baby wt1
		$this->baby_wt1->AdvancedSearch->SearchValue = @$filter["x_baby_wt1"];
		$this->baby_wt1->AdvancedSearch->SearchOperator = @$filter["z_baby_wt1"];
		$this->baby_wt1->AdvancedSearch->SearchCondition = @$filter["v_baby_wt1"];
		$this->baby_wt1->AdvancedSearch->SearchValue2 = @$filter["y_baby_wt1"];
		$this->baby_wt1->AdvancedSearch->SearchOperator2 = @$filter["w_baby_wt1"];
		$this->baby_wt1->AdvancedSearch->save();

		// Field GA at delivery2
		$this->GA_at_delivery2->AdvancedSearch->SearchValue = @$filter["x_GA_at_delivery2"];
		$this->GA_at_delivery2->AdvancedSearch->SearchOperator = @$filter["z_GA_at_delivery2"];
		$this->GA_at_delivery2->AdvancedSearch->SearchCondition = @$filter["v_GA_at_delivery2"];
		$this->GA_at_delivery2->AdvancedSearch->SearchValue2 = @$filter["y_GA_at_delivery2"];
		$this->GA_at_delivery2->AdvancedSearch->SearchOperator2 = @$filter["w_GA_at_delivery2"];
		$this->GA_at_delivery2->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->RIDNO, $default, FALSE); // RIDNO
		$this->buildSearchSql($where, $this->Treatment, $default, FALSE); // Treatment
		$this->buildSearchSql($where, $this->Origin, $default, FALSE); // Origin
		$this->buildSearchSql($where, $this->MaleIndications, $default, FALSE); // MaleIndications
		$this->buildSearchSql($where, $this->FemaleIndications, $default, FALSE); // FemaleIndications
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->PatientID, $default, FALSE); // PatientID
		$this->buildSearchSql($where, $this->PartnerName, $default, FALSE); // PartnerName
		$this->buildSearchSql($where, $this->PartnerID, $default, FALSE); // PartnerID
		$this->buildSearchSql($where, $this->A4ICSICycle, $default, FALSE); // A4ICSICycle
		$this->buildSearchSql($where, $this->TotalICSICycle, $default, FALSE); // TotalICSICycle
		$this->buildSearchSql($where, $this->TypeOfInfertility, $default, FALSE); // TypeOfInfertility
		$this->buildSearchSql($where, $this->RelevantHistory, $default, FALSE); // RelevantHistory
		$this->buildSearchSql($where, $this->IUICycles, $default, FALSE); // IUICycles
		$this->buildSearchSql($where, $this->AMH, $default, FALSE); // AMH
		$this->buildSearchSql($where, $this->FBMI, $default, FALSE); // FBMI
		$this->buildSearchSql($where, $this->ANTAGONISTSTARTDAY, $default, FALSE); // ANTAGONISTSTARTDAY
		$this->buildSearchSql($where, $this->OvarianSurgery, $default, FALSE); // OvarianSurgery
		$this->buildSearchSql($where, $this->OPUDATE, $default, FALSE); // OPUDATE
		$this->buildSearchSql($where, $this->RFSH1, $default, FALSE); // RFSH1
		$this->buildSearchSql($where, $this->RFSH2, $default, FALSE); // RFSH2
		$this->buildSearchSql($where, $this->RFSH3, $default, FALSE); // RFSH3
		$this->buildSearchSql($where, $this->E21, $default, FALSE); // E21
		$this->buildSearchSql($where, $this->Hysteroscopy, $default, FALSE); // Hysteroscopy
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->Fweight, $default, FALSE); // Fweight
		$this->buildSearchSql($where, $this->AntiTPO, $default, FALSE); // AntiTPO
		$this->buildSearchSql($where, $this->AntiTG, $default, FALSE); // AntiTG
		$this->buildSearchSql($where, $this->PatientAge, $default, FALSE); // PatientAge
		$this->buildSearchSql($where, $this->PartnerAge, $default, FALSE); // PartnerAge
		$this->buildSearchSql($where, $this->CYCLES, $default, FALSE); // CYCLES
		$this->buildSearchSql($where, $this->MF, $default, FALSE); // MF
		$this->buildSearchSql($where, $this->CauseOfINFERTILITY, $default, FALSE); // CauseOfINFERTILITY
		$this->buildSearchSql($where, $this->SIS, $default, FALSE); // SIS
		$this->buildSearchSql($where, $this->Scratching, $default, FALSE); // Scratching
		$this->buildSearchSql($where, $this->Cannulation, $default, FALSE); // Cannulation
		$this->buildSearchSql($where, $this->MEPRATE, $default, FALSE); // MEPRATE
		$this->buildSearchSql($where, $this->R_OVARY, $default, FALSE); // R.OVARY
		$this->buildSearchSql($where, $this->R_AFC, $default, FALSE); // R.AFC
		$this->buildSearchSql($where, $this->L_OVARY, $default, FALSE); // L.OVARY
		$this->buildSearchSql($where, $this->L_AFC, $default, FALSE); // L.AFC
		$this->buildSearchSql($where, $this->LH1, $default, FALSE); // LH1
		$this->buildSearchSql($where, $this->E2, $default, FALSE); // E2
		$this->buildSearchSql($where, $this->StemCellInstallation, $default, FALSE); // StemCellInstallation
		$this->buildSearchSql($where, $this->DHEAS, $default, FALSE); // DHEAS
		$this->buildSearchSql($where, $this->Mtorr, $default, FALSE); // Mtorr
		$this->buildSearchSql($where, $this->AMH1, $default, FALSE); // AMH1
		$this->buildSearchSql($where, $this->LH, $default, FALSE); // LH
		$this->buildSearchSql($where, $this->BMI28MALE29, $default, FALSE); // BMI(MALE)
		$this->buildSearchSql($where, $this->MaleMedicalConditions, $default, FALSE); // MaleMedicalConditions
		$this->buildSearchSql($where, $this->MaleExamination, $default, FALSE); // MaleExamination
		$this->buildSearchSql($where, $this->SpermConcentration, $default, FALSE); // SpermConcentration
		$this->buildSearchSql($where, $this->SpermMotility28P26NP29, $default, FALSE); // SpermMotility(P&NP)
		$this->buildSearchSql($where, $this->SpermMorphology, $default, FALSE); // SpermMorphology
		$this->buildSearchSql($where, $this->SpermRetrival, $default, FALSE); // SpermRetrival
		$this->buildSearchSql($where, $this->M_Testosterone, $default, FALSE); // M.Testosterone
		$this->buildSearchSql($where, $this->DFI, $default, FALSE); // DFI
		$this->buildSearchSql($where, $this->PreRX, $default, FALSE); // PreRX
		$this->buildSearchSql($where, $this->CC_100, $default, FALSE); // CC 100
		$this->buildSearchSql($where, $this->RFSH1A, $default, FALSE); // RFSH1A
		$this->buildSearchSql($where, $this->HMG1, $default, FALSE); // HMG1
		$this->buildSearchSql($where, $this->RLH, $default, FALSE); // RLH
		$this->buildSearchSql($where, $this->HMG_HP, $default, FALSE); // HMG_HP
		$this->buildSearchSql($where, $this->day_of_HMG, $default, FALSE); // day_of_HMG
		$this->buildSearchSql($where, $this->Reason_for_HMG, $default, FALSE); // Reason_for_HMG
		$this->buildSearchSql($where, $this->RLH_day, $default, FALSE); // RLH_day
		$this->buildSearchSql($where, $this->DAYSOFSTIMULATION, $default, FALSE); // DAYSOFSTIMULATION
		$this->buildSearchSql($where, $this->Any_change_inbetween_28_Dose_added_2C_day29, $default, FALSE); // Any change inbetween ( Dose added , day)
		$this->buildSearchSql($where, $this->day_of_Anta, $default, FALSE); // day of Anta
		$this->buildSearchSql($where, $this->R_FSH_TD, $default, FALSE); // R FSH TD
		$this->buildSearchSql($where, $this->R_FSH_2B_HMG_TD, $default, FALSE); // R FSH + HMG TD
		$this->buildSearchSql($where, $this->R_FSH_2B_R_LH_TD, $default, FALSE); // R FSH + R LH TD
		$this->buildSearchSql($where, $this->HMG_TD, $default, FALSE); // HMG TD
		$this->buildSearchSql($where, $this->LH_TD, $default, FALSE); // LH TD
		$this->buildSearchSql($where, $this->D1_LH, $default, FALSE); // D1 LH
		$this->buildSearchSql($where, $this->D1_E2, $default, FALSE); // D1 E2
		$this->buildSearchSql($where, $this->Trigger_day_E2, $default, FALSE); // Trigger day E2
		$this->buildSearchSql($where, $this->Trigger_day_P4, $default, FALSE); // Trigger day P4
		$this->buildSearchSql($where, $this->Trigger_day_LH, $default, FALSE); // Trigger day LH
		$this->buildSearchSql($where, $this->VIT_D, $default, FALSE); // VIT-D
		$this->buildSearchSql($where, $this->TRIGGERR, $default, FALSE); // TRIGGERR
		$this->buildSearchSql($where, $this->BHCG_BEFORE_RETRIEVAL, $default, FALSE); // BHCG BEFORE RETRIEVAL
		$this->buildSearchSql($where, $this->LH__12_HRS, $default, FALSE); // LH -12 HRS
		$this->buildSearchSql($where, $this->P4__12_HRS, $default, FALSE); // P4 -12 HRS
		$this->buildSearchSql($where, $this->ET_on_hCG_day, $default, FALSE); // ET on hCG day
		$this->buildSearchSql($where, $this->ET_doppler, $default, FALSE); // ET doppler
		$this->buildSearchSql($where, $this->VI2FFI2FVFI, $default, FALSE); // VI/FI/VFI
		$this->buildSearchSql($where, $this->Endometrial_abnormality, $default, FALSE); // Endometrial abnormality
		$this->buildSearchSql($where, $this->AFC_ON_S1, $default, FALSE); // AFC ON S1
		$this->buildSearchSql($where, $this->TIME_OF_OPU_FROM_TRIGGER, $default, FALSE); // TIME OF OPU FROM TRIGGER
		$this->buildSearchSql($where, $this->SPERM_TYPE, $default, FALSE); // SPERM TYPE
		$this->buildSearchSql($where, $this->EXPECTED_ON_TRIGGER_DAY, $default, FALSE); // EXPECTED ON TRIGGER DAY
		$this->buildSearchSql($where, $this->OOCYTES_RETRIEVED, $default, FALSE); // OOCYTES RETRIEVED
		$this->buildSearchSql($where, $this->TIME_OF_DENUDATION, $default, FALSE); // TIME OF DENUDATION
		$this->buildSearchSql($where, $this->M_II, $default, FALSE); // M-II
		$this->buildSearchSql($where, $this->MI, $default, FALSE); // MI
		$this->buildSearchSql($where, $this->GV, $default, FALSE); // GV
		$this->buildSearchSql($where, $this->ICSI_TIME_FORM_OPU, $default, FALSE); // ICSI TIME FORM OPU
		$this->buildSearchSql($where, $this->FERT_28_2_PN_29, $default, FALSE); // FERT ( 2 PN )
		$this->buildSearchSql($where, $this->DEG, $default, FALSE); // DEG
		$this->buildSearchSql($where, $this->D3_GRADE_A, $default, FALSE); // D3 GRADE A
		$this->buildSearchSql($where, $this->D3_GRADE_B, $default, FALSE); // D3 GRADE B
		$this->buildSearchSql($where, $this->D3_GRADE_C, $default, FALSE); // D3 GRADE C
		$this->buildSearchSql($where, $this->D3_GRADE_D, $default, FALSE); // D3 GRADE D
		$this->buildSearchSql($where, $this->USABLE_ON_DAY_3_ET, $default, FALSE); // USABLE ON DAY 3 ET
		$this->buildSearchSql($where, $this->USABLE_ON_day_3_FREEZING, $default, FALSE); // USABLE ON day 3 FREEZING
		$this->buildSearchSql($where, $this->D5_GARDE_A, $default, FALSE); // D5 GARDE A
		$this->buildSearchSql($where, $this->D5_GRADE_B, $default, FALSE); // D5 GRADE B
		$this->buildSearchSql($where, $this->D5_GRADE_C, $default, FALSE); // D5 GRADE C
		$this->buildSearchSql($where, $this->D5_GRADE_D, $default, FALSE); // D5 GRADE D
		$this->buildSearchSql($where, $this->USABLE_ON_D5_ET, $default, FALSE); // USABLE ON D5 ET
		$this->buildSearchSql($where, $this->USABLE_ON_D5_FREEZING, $default, FALSE); // USABLE ON D5 FREEZING
		$this->buildSearchSql($where, $this->D6_GRADE_A, $default, FALSE); // D6 GRADE A
		$this->buildSearchSql($where, $this->D6_GRADE_B, $default, FALSE); // D6 GRADE B
		$this->buildSearchSql($where, $this->D6_GRADE_C, $default, FALSE); // D6 GRADE C
		$this->buildSearchSql($where, $this->D6_GRADE_D, $default, FALSE); // D6 GRADE D
		$this->buildSearchSql($where, $this->D6_USABLE_EMBRYO_ET, $default, FALSE); // D6 USABLE EMBRYO ET
		$this->buildSearchSql($where, $this->D6_USABLE_FREEZING, $default, FALSE); // D6 USABLE FREEZING
		$this->buildSearchSql($where, $this->TOTAL_BLAST, $default, FALSE); // TOTAL BLAST
		$this->buildSearchSql($where, $this->PGS, $default, FALSE); // PGS
		$this->buildSearchSql($where, $this->REMARKS, $default, FALSE); // REMARKS
		$this->buildSearchSql($where, $this->PU___D2FB, $default, FALSE); // PU - D/B
		$this->buildSearchSql($where, $this->ICSI_D2FB, $default, FALSE); // ICSI D/B
		$this->buildSearchSql($where, $this->VIT_D2FB, $default, FALSE); // VIT D/B
		$this->buildSearchSql($where, $this->ET_D2FB, $default, FALSE); // ET D/B
		$this->buildSearchSql($where, $this->LAB_COMMENTS, $default, FALSE); // LAB COMMENTS
		$this->buildSearchSql($where, $this->Reason_for_no_FRESH_transfer, $default, FALSE); // Reason for no FRESH transfer
		$this->buildSearchSql($where, $this->No_of_embryos_transferred_Day_32F52C_A2CB2CC, $default, FALSE); // No of embryos transferred Day 3/5, A,B,C
		$this->buildSearchSql($where, $this->EMBRYOS_PENDING, $default, FALSE); // EMBRYOS PENDING
		$this->buildSearchSql($where, $this->DAY_OF_TRANSFER, $default, FALSE); // DAY OF TRANSFER
		$this->buildSearchSql($where, $this->H2FD_sperm, $default, FALSE); // H/D sperm
		$this->buildSearchSql($where, $this->Comments, $default, FALSE); // Comments
		$this->buildSearchSql($where, $this->sc_progesterone, $default, FALSE); // sc progesterone
		$this->buildSearchSql($where, $this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd, $default, FALSE); // Natural micronised 400mg bd + duphaston 10mg bd
		$this->buildSearchSql($where, $this->CRINONE, $default, FALSE); // CRINONE
		$this->buildSearchSql($where, $this->progynova, $default, FALSE); // progynova
		$this->buildSearchSql($where, $this->Heparin, $default, FALSE); // Heparin
		$this->buildSearchSql($where, $this->cabergolin, $default, FALSE); // cabergolin
		$this->buildSearchSql($where, $this->Antagonist, $default, FALSE); // Antagonist
		$this->buildSearchSql($where, $this->OHSS, $default, FALSE); // OHSS
		$this->buildSearchSql($where, $this->Complications, $default, FALSE); // Complications
		$this->buildSearchSql($where, $this->LP_bleeding, $default, FALSE); // LP bleeding
		$this->buildSearchSql($where, $this->DF_hCG, $default, FALSE); // ß-hCG
		$this->buildSearchSql($where, $this->Implantation_rate, $default, FALSE); // Implantation rate
		$this->buildSearchSql($where, $this->Ectopic, $default, FALSE); // Ectopic
		$this->buildSearchSql($where, $this->Type_of_preg, $default, FALSE); // Type of preg
		$this->buildSearchSql($where, $this->ANC, $default, FALSE); // ANC
		$this->buildSearchSql($where, $this->anomalies, $default, FALSE); // anomalies
		$this->buildSearchSql($where, $this->baby_wt, $default, FALSE); // baby wt
		$this->buildSearchSql($where, $this->GA_at_delivery, $default, FALSE); // GA at delivery
		$this->buildSearchSql($where, $this->Pregnancy_outcome, $default, FALSE); // Pregnancy outcome
		$this->buildSearchSql($where, $this->_1st_FET, $default, FALSE); // 1st FET
		$this->buildSearchSql($where, $this->AFTER_HYSTEROSCOPY, $default, FALSE); // AFTER HYSTEROSCOPY
		$this->buildSearchSql($where, $this->AFTER_ERA, $default, FALSE); // AFTER ERA
		$this->buildSearchSql($where, $this->ERA, $default, FALSE); // ERA
		$this->buildSearchSql($where, $this->HRT, $default, FALSE); // HRT
		$this->buildSearchSql($where, $this->XGRAST2FPRP, $default, FALSE); // XGRAST/PRP
		$this->buildSearchSql($where, $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C, $default, FALSE); // EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->buildSearchSql($where, $this->LMWH_40MG, $default, FALSE); // LMWH 40MG
		$this->buildSearchSql($where, $this->DF_hCG2, $default, FALSE); // ß-hCG2
		$this->buildSearchSql($where, $this->Implantation_rate1, $default, FALSE); // Implantation rate1
		$this->buildSearchSql($where, $this->Ectopic1, $default, FALSE); // Ectopic1
		$this->buildSearchSql($where, $this->Type_of_pregA, $default, FALSE); // Type of pregA
		$this->buildSearchSql($where, $this->ANC1, $default, FALSE); // ANC1
		$this->buildSearchSql($where, $this->anomalies2, $default, FALSE); // anomalies2
		$this->buildSearchSql($where, $this->baby_wt2, $default, FALSE); // baby wt2
		$this->buildSearchSql($where, $this->GA_at_delivery1, $default, FALSE); // GA at delivery1
		$this->buildSearchSql($where, $this->Pregnancy_outcome1, $default, FALSE); // Pregnancy outcome1
		$this->buildSearchSql($where, $this->_2ND_FET, $default, FALSE); // 2ND FET
		$this->buildSearchSql($where, $this->AFTER_HYSTEROSCOPY1, $default, FALSE); // AFTER HYSTEROSCOPY1
		$this->buildSearchSql($where, $this->AFTER_ERA1, $default, FALSE); // AFTER ERA1
		$this->buildSearchSql($where, $this->ERA1, $default, FALSE); // ERA1
		$this->buildSearchSql($where, $this->HRT1, $default, FALSE); // HRT1
		$this->buildSearchSql($where, $this->XGRAST2FPRP1, $default, FALSE); // XGRAST/PRP1
		$this->buildSearchSql($where, $this->NUMBER_OF_EMBRYOS, $default, FALSE); // NUMBER OF EMBRYOS
		$this->buildSearchSql($where, $this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C, $default, FALSE); // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->buildSearchSql($where, $this->INTRALIPID_AND_BARGLOBIN, $default, FALSE); // INTRALIPID AND BARGLOBIN
		$this->buildSearchSql($where, $this->LMWH_40MG1, $default, FALSE); // LMWH 40MG1
		$this->buildSearchSql($where, $this->DF_hCG1, $default, FALSE); // ß-hCG1
		$this->buildSearchSql($where, $this->Implantation_rate2, $default, FALSE); // Implantation rate2
		$this->buildSearchSql($where, $this->Ectopic2, $default, FALSE); // Ectopic2
		$this->buildSearchSql($where, $this->Type_of_preg2, $default, FALSE); // Type of preg2
		$this->buildSearchSql($where, $this->ANCA, $default, FALSE); // ANCA
		$this->buildSearchSql($where, $this->anomalies1, $default, FALSE); // anomalies1
		$this->buildSearchSql($where, $this->baby_wt1, $default, FALSE); // baby wt1
		$this->buildSearchSql($where, $this->GA_at_delivery2, $default, FALSE); // GA at delivery2

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->RIDNO->AdvancedSearch->save(); // RIDNO
			$this->Treatment->AdvancedSearch->save(); // Treatment
			$this->Origin->AdvancedSearch->save(); // Origin
			$this->MaleIndications->AdvancedSearch->save(); // MaleIndications
			$this->FemaleIndications->AdvancedSearch->save(); // FemaleIndications
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->PatientID->AdvancedSearch->save(); // PatientID
			$this->PartnerName->AdvancedSearch->save(); // PartnerName
			$this->PartnerID->AdvancedSearch->save(); // PartnerID
			$this->A4ICSICycle->AdvancedSearch->save(); // A4ICSICycle
			$this->TotalICSICycle->AdvancedSearch->save(); // TotalICSICycle
			$this->TypeOfInfertility->AdvancedSearch->save(); // TypeOfInfertility
			$this->RelevantHistory->AdvancedSearch->save(); // RelevantHistory
			$this->IUICycles->AdvancedSearch->save(); // IUICycles
			$this->AMH->AdvancedSearch->save(); // AMH
			$this->FBMI->AdvancedSearch->save(); // FBMI
			$this->ANTAGONISTSTARTDAY->AdvancedSearch->save(); // ANTAGONISTSTARTDAY
			$this->OvarianSurgery->AdvancedSearch->save(); // OvarianSurgery
			$this->OPUDATE->AdvancedSearch->save(); // OPUDATE
			$this->RFSH1->AdvancedSearch->save(); // RFSH1
			$this->RFSH2->AdvancedSearch->save(); // RFSH2
			$this->RFSH3->AdvancedSearch->save(); // RFSH3
			$this->E21->AdvancedSearch->save(); // E21
			$this->Hysteroscopy->AdvancedSearch->save(); // Hysteroscopy
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->Fweight->AdvancedSearch->save(); // Fweight
			$this->AntiTPO->AdvancedSearch->save(); // AntiTPO
			$this->AntiTG->AdvancedSearch->save(); // AntiTG
			$this->PatientAge->AdvancedSearch->save(); // PatientAge
			$this->PartnerAge->AdvancedSearch->save(); // PartnerAge
			$this->CYCLES->AdvancedSearch->save(); // CYCLES
			$this->MF->AdvancedSearch->save(); // MF
			$this->CauseOfINFERTILITY->AdvancedSearch->save(); // CauseOfINFERTILITY
			$this->SIS->AdvancedSearch->save(); // SIS
			$this->Scratching->AdvancedSearch->save(); // Scratching
			$this->Cannulation->AdvancedSearch->save(); // Cannulation
			$this->MEPRATE->AdvancedSearch->save(); // MEPRATE
			$this->R_OVARY->AdvancedSearch->save(); // R.OVARY
			$this->R_AFC->AdvancedSearch->save(); // R.AFC
			$this->L_OVARY->AdvancedSearch->save(); // L.OVARY
			$this->L_AFC->AdvancedSearch->save(); // L.AFC
			$this->LH1->AdvancedSearch->save(); // LH1
			$this->E2->AdvancedSearch->save(); // E2
			$this->StemCellInstallation->AdvancedSearch->save(); // StemCellInstallation
			$this->DHEAS->AdvancedSearch->save(); // DHEAS
			$this->Mtorr->AdvancedSearch->save(); // Mtorr
			$this->AMH1->AdvancedSearch->save(); // AMH1
			$this->LH->AdvancedSearch->save(); // LH
			$this->BMI28MALE29->AdvancedSearch->save(); // BMI(MALE)
			$this->MaleMedicalConditions->AdvancedSearch->save(); // MaleMedicalConditions
			$this->MaleExamination->AdvancedSearch->save(); // MaleExamination
			$this->SpermConcentration->AdvancedSearch->save(); // SpermConcentration
			$this->SpermMotility28P26NP29->AdvancedSearch->save(); // SpermMotility(P&NP)
			$this->SpermMorphology->AdvancedSearch->save(); // SpermMorphology
			$this->SpermRetrival->AdvancedSearch->save(); // SpermRetrival
			$this->M_Testosterone->AdvancedSearch->save(); // M.Testosterone
			$this->DFI->AdvancedSearch->save(); // DFI
			$this->PreRX->AdvancedSearch->save(); // PreRX
			$this->CC_100->AdvancedSearch->save(); // CC 100
			$this->RFSH1A->AdvancedSearch->save(); // RFSH1A
			$this->HMG1->AdvancedSearch->save(); // HMG1
			$this->RLH->AdvancedSearch->save(); // RLH
			$this->HMG_HP->AdvancedSearch->save(); // HMG_HP
			$this->day_of_HMG->AdvancedSearch->save(); // day_of_HMG
			$this->Reason_for_HMG->AdvancedSearch->save(); // Reason_for_HMG
			$this->RLH_day->AdvancedSearch->save(); // RLH_day
			$this->DAYSOFSTIMULATION->AdvancedSearch->save(); // DAYSOFSTIMULATION
			$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->save(); // Any change inbetween ( Dose added , day)
			$this->day_of_Anta->AdvancedSearch->save(); // day of Anta
			$this->R_FSH_TD->AdvancedSearch->save(); // R FSH TD
			$this->R_FSH_2B_HMG_TD->AdvancedSearch->save(); // R FSH + HMG TD
			$this->R_FSH_2B_R_LH_TD->AdvancedSearch->save(); // R FSH + R LH TD
			$this->HMG_TD->AdvancedSearch->save(); // HMG TD
			$this->LH_TD->AdvancedSearch->save(); // LH TD
			$this->D1_LH->AdvancedSearch->save(); // D1 LH
			$this->D1_E2->AdvancedSearch->save(); // D1 E2
			$this->Trigger_day_E2->AdvancedSearch->save(); // Trigger day E2
			$this->Trigger_day_P4->AdvancedSearch->save(); // Trigger day P4
			$this->Trigger_day_LH->AdvancedSearch->save(); // Trigger day LH
			$this->VIT_D->AdvancedSearch->save(); // VIT-D
			$this->TRIGGERR->AdvancedSearch->save(); // TRIGGERR
			$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->save(); // BHCG BEFORE RETRIEVAL
			$this->LH__12_HRS->AdvancedSearch->save(); // LH -12 HRS
			$this->P4__12_HRS->AdvancedSearch->save(); // P4 -12 HRS
			$this->ET_on_hCG_day->AdvancedSearch->save(); // ET on hCG day
			$this->ET_doppler->AdvancedSearch->save(); // ET doppler
			$this->VI2FFI2FVFI->AdvancedSearch->save(); // VI/FI/VFI
			$this->Endometrial_abnormality->AdvancedSearch->save(); // Endometrial abnormality
			$this->AFC_ON_S1->AdvancedSearch->save(); // AFC ON S1
			$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->save(); // TIME OF OPU FROM TRIGGER
			$this->SPERM_TYPE->AdvancedSearch->save(); // SPERM TYPE
			$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->save(); // EXPECTED ON TRIGGER DAY
			$this->OOCYTES_RETRIEVED->AdvancedSearch->save(); // OOCYTES RETRIEVED
			$this->TIME_OF_DENUDATION->AdvancedSearch->save(); // TIME OF DENUDATION
			$this->M_II->AdvancedSearch->save(); // M-II
			$this->MI->AdvancedSearch->save(); // MI
			$this->GV->AdvancedSearch->save(); // GV
			$this->ICSI_TIME_FORM_OPU->AdvancedSearch->save(); // ICSI TIME FORM OPU
			$this->FERT_28_2_PN_29->AdvancedSearch->save(); // FERT ( 2 PN )
			$this->DEG->AdvancedSearch->save(); // DEG
			$this->D3_GRADE_A->AdvancedSearch->save(); // D3 GRADE A
			$this->D3_GRADE_B->AdvancedSearch->save(); // D3 GRADE B
			$this->D3_GRADE_C->AdvancedSearch->save(); // D3 GRADE C
			$this->D3_GRADE_D->AdvancedSearch->save(); // D3 GRADE D
			$this->USABLE_ON_DAY_3_ET->AdvancedSearch->save(); // USABLE ON DAY 3 ET
			$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->save(); // USABLE ON day 3 FREEZING
			$this->D5_GARDE_A->AdvancedSearch->save(); // D5 GARDE A
			$this->D5_GRADE_B->AdvancedSearch->save(); // D5 GRADE B
			$this->D5_GRADE_C->AdvancedSearch->save(); // D5 GRADE C
			$this->D5_GRADE_D->AdvancedSearch->save(); // D5 GRADE D
			$this->USABLE_ON_D5_ET->AdvancedSearch->save(); // USABLE ON D5 ET
			$this->USABLE_ON_D5_FREEZING->AdvancedSearch->save(); // USABLE ON D5 FREEZING
			$this->D6_GRADE_A->AdvancedSearch->save(); // D6 GRADE A
			$this->D6_GRADE_B->AdvancedSearch->save(); // D6 GRADE B
			$this->D6_GRADE_C->AdvancedSearch->save(); // D6 GRADE C
			$this->D6_GRADE_D->AdvancedSearch->save(); // D6 GRADE D
			$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->save(); // D6 USABLE EMBRYO ET
			$this->D6_USABLE_FREEZING->AdvancedSearch->save(); // D6 USABLE FREEZING
			$this->TOTAL_BLAST->AdvancedSearch->save(); // TOTAL BLAST
			$this->PGS->AdvancedSearch->save(); // PGS
			$this->REMARKS->AdvancedSearch->save(); // REMARKS
			$this->PU___D2FB->AdvancedSearch->save(); // PU - D/B
			$this->ICSI_D2FB->AdvancedSearch->save(); // ICSI D/B
			$this->VIT_D2FB->AdvancedSearch->save(); // VIT D/B
			$this->ET_D2FB->AdvancedSearch->save(); // ET D/B
			$this->LAB_COMMENTS->AdvancedSearch->save(); // LAB COMMENTS
			$this->Reason_for_no_FRESH_transfer->AdvancedSearch->save(); // Reason for no FRESH transfer
			$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->save(); // No of embryos transferred Day 3/5, A,B,C
			$this->EMBRYOS_PENDING->AdvancedSearch->save(); // EMBRYOS PENDING
			$this->DAY_OF_TRANSFER->AdvancedSearch->save(); // DAY OF TRANSFER
			$this->H2FD_sperm->AdvancedSearch->save(); // H/D sperm
			$this->Comments->AdvancedSearch->save(); // Comments
			$this->sc_progesterone->AdvancedSearch->save(); // sc progesterone
			$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->save(); // Natural micronised 400mg bd + duphaston 10mg bd
			$this->CRINONE->AdvancedSearch->save(); // CRINONE
			$this->progynova->AdvancedSearch->save(); // progynova
			$this->Heparin->AdvancedSearch->save(); // Heparin
			$this->cabergolin->AdvancedSearch->save(); // cabergolin
			$this->Antagonist->AdvancedSearch->save(); // Antagonist
			$this->OHSS->AdvancedSearch->save(); // OHSS
			$this->Complications->AdvancedSearch->save(); // Complications
			$this->LP_bleeding->AdvancedSearch->save(); // LP bleeding
			$this->DF_hCG->AdvancedSearch->save(); // ß-hCG
			$this->Implantation_rate->AdvancedSearch->save(); // Implantation rate
			$this->Ectopic->AdvancedSearch->save(); // Ectopic
			$this->Type_of_preg->AdvancedSearch->save(); // Type of preg
			$this->ANC->AdvancedSearch->save(); // ANC
			$this->anomalies->AdvancedSearch->save(); // anomalies
			$this->baby_wt->AdvancedSearch->save(); // baby wt
			$this->GA_at_delivery->AdvancedSearch->save(); // GA at delivery
			$this->Pregnancy_outcome->AdvancedSearch->save(); // Pregnancy outcome
			$this->_1st_FET->AdvancedSearch->save(); // 1st FET
			$this->AFTER_HYSTEROSCOPY->AdvancedSearch->save(); // AFTER HYSTEROSCOPY
			$this->AFTER_ERA->AdvancedSearch->save(); // AFTER ERA
			$this->ERA->AdvancedSearch->save(); // ERA
			$this->HRT->AdvancedSearch->save(); // HRT
			$this->XGRAST2FPRP->AdvancedSearch->save(); // XGRAST/PRP
			$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->save(); // EMBRYO DETAILS DAY 3/ 5, A, B, C
			$this->LMWH_40MG->AdvancedSearch->save(); // LMWH 40MG
			$this->DF_hCG2->AdvancedSearch->save(); // ß-hCG2
			$this->Implantation_rate1->AdvancedSearch->save(); // Implantation rate1
			$this->Ectopic1->AdvancedSearch->save(); // Ectopic1
			$this->Type_of_pregA->AdvancedSearch->save(); // Type of pregA
			$this->ANC1->AdvancedSearch->save(); // ANC1
			$this->anomalies2->AdvancedSearch->save(); // anomalies2
			$this->baby_wt2->AdvancedSearch->save(); // baby wt2
			$this->GA_at_delivery1->AdvancedSearch->save(); // GA at delivery1
			$this->Pregnancy_outcome1->AdvancedSearch->save(); // Pregnancy outcome1
			$this->_2ND_FET->AdvancedSearch->save(); // 2ND FET
			$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->save(); // AFTER HYSTEROSCOPY1
			$this->AFTER_ERA1->AdvancedSearch->save(); // AFTER ERA1
			$this->ERA1->AdvancedSearch->save(); // ERA1
			$this->HRT1->AdvancedSearch->save(); // HRT1
			$this->XGRAST2FPRP1->AdvancedSearch->save(); // XGRAST/PRP1
			$this->NUMBER_OF_EMBRYOS->AdvancedSearch->save(); // NUMBER OF EMBRYOS
			$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->save(); // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
			$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->save(); // INTRALIPID AND BARGLOBIN
			$this->LMWH_40MG1->AdvancedSearch->save(); // LMWH 40MG1
			$this->DF_hCG1->AdvancedSearch->save(); // ß-hCG1
			$this->Implantation_rate2->AdvancedSearch->save(); // Implantation rate2
			$this->Ectopic2->AdvancedSearch->save(); // Ectopic2
			$this->Type_of_preg2->AdvancedSearch->save(); // Type of preg2
			$this->ANCA->AdvancedSearch->save(); // ANCA
			$this->anomalies1->AdvancedSearch->save(); // anomalies1
			$this->baby_wt1->AdvancedSearch->save(); // baby wt1
			$this->GA_at_delivery2->AdvancedSearch->save(); // GA at delivery2
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
		$this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FemaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A4ICSICycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TotalICSICycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeOfInfertility, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RelevantHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUICycles, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AMH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANTAGONISTSTARTDAY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OvarianSurgery, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Hysteroscopy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Fweight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AntiTPO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AntiTG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientAge, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerAge, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CYCLES, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MF, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CauseOfINFERTILITY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SIS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Scratching, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Cannulation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MEPRATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->R_OVARY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->R_AFC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->L_OVARY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->L_AFC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LH1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StemCellInstallation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DHEAS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mtorr, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AMH1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BMI28MALE29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleMedicalConditions, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleExamination, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermConcentration, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermMotility28P26NP29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermMorphology, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermRetrival, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->M_Testosterone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DFI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreRX, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CC_100, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH1A, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RLH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG_HP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->day_of_HMG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Reason_for_HMG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RLH_day, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYSOFSTIMULATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Any_change_inbetween_28_Dose_added_2C_day29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->day_of_Anta, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->R_FSH_TD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->R_FSH_2B_HMG_TD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->R_FSH_2B_R_LH_TD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG_TD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LH_TD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D1_LH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D1_E2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Trigger_day_E2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Trigger_day_P4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Trigger_day_LH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VIT_D, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BHCG_BEFORE_RETRIEVAL, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LH__12_HRS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P4__12_HRS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ET_on_hCG_day, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ET_doppler, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VI2FFI2FVFI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Endometrial_abnormality, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFC_ON_S1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TIME_OF_OPU_FROM_TRIGGER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SPERM_TYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EXPECTED_ON_TRIGGER_DAY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OOCYTES_RETRIEVED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TIME_OF_DENUDATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->M_II, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GV, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ICSI_TIME_FORM_OPU, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FERT_28_2_PN_29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DEG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D3_GRADE_A, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D3_GRADE_B, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D3_GRADE_C, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D3_GRADE_D, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USABLE_ON_DAY_3_ET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USABLE_ON_day_3_FREEZING, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D5_GARDE_A, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D5_GRADE_B, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D5_GRADE_C, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D5_GRADE_D, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USABLE_ON_D5_ET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USABLE_ON_D5_FREEZING, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_GRADE_A, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_GRADE_B, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_GRADE_C, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_GRADE_D, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_USABLE_EMBRYO_ET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->D6_USABLE_FREEZING, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TOTAL_BLAST, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PGS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->REMARKS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PU___D2FB, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ICSI_D2FB, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VIT_D2FB, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ET_D2FB, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LAB_COMMENTS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Reason_for_no_FRESH_transfer, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->No_of_embryos_transferred_Day_32F52C_A2CB2CC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EMBRYOS_PENDING, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAY_OF_TRANSFER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->H2FD_sperm, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sc_progesterone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CRINONE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->progynova, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Heparin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->cabergolin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Antagonist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OHSS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Complications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LP_bleeding, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DF_hCG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Implantation_rate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Type_of_preg, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->anomalies, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->baby_wt, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GA_at_delivery, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pregnancy_outcome, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_1st_FET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFTER_HYSTEROSCOPY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFTER_ERA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ERA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HRT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->XGRAST2FPRP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LMWH_40MG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DF_hCG2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Implantation_rate1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Type_of_pregA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANC1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->anomalies2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->baby_wt2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GA_at_delivery1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pregnancy_outcome1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_2ND_FET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFTER_HYSTEROSCOPY1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFTER_ERA1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ERA1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HRT1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->XGRAST2FPRP1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NUMBER_OF_EMBRYOS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INTRALIPID_AND_BARGLOBIN, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LMWH_40MG1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DF_hCG1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Implantation_rate2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Type_of_preg2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANCA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->anomalies1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->baby_wt1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GA_at_delivery2, $arKeywords, $type);
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
		if ($this->RIDNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Treatment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Origin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MaleIndications->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FemaleIndications->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PartnerName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PartnerID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->A4ICSICycle->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TotalICSICycle->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TypeOfInfertility->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RelevantHistory->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IUICycles->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AMH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FBMI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANTAGONISTSTARTDAY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OvarianSurgery->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OPUDATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RFSH1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RFSH2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RFSH3->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->E21->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Hysteroscopy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Fweight->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AntiTPO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AntiTG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientAge->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PartnerAge->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CYCLES->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MF->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CauseOfINFERTILITY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SIS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Scratching->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Cannulation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MEPRATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->R_OVARY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->R_AFC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->L_OVARY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->L_AFC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LH1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->E2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->StemCellInstallation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DHEAS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Mtorr->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AMH1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BMI28MALE29->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MaleMedicalConditions->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MaleExamination->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SpermConcentration->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SpermMotility28P26NP29->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SpermMorphology->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SpermRetrival->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->M_Testosterone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DFI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PreRX->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CC_100->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RFSH1A->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HMG1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RLH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HMG_HP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->day_of_HMG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reason_for_HMG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RLH_day->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DAYSOFSTIMULATION->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->day_of_Anta->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->R_FSH_TD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->R_FSH_2B_HMG_TD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->R_FSH_2B_R_LH_TD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HMG_TD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LH_TD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D1_LH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D1_E2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Trigger_day_E2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Trigger_day_P4->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Trigger_day_LH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VIT_D->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TRIGGERR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LH__12_HRS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->P4__12_HRS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ET_on_hCG_day->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ET_doppler->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VI2FFI2FVFI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Endometrial_abnormality->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AFC_ON_S1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SPERM_TYPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OOCYTES_RETRIEVED->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TIME_OF_DENUDATION->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->M_II->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GV->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ICSI_TIME_FORM_OPU->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FERT_28_2_PN_29->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DEG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D3_GRADE_A->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D3_GRADE_B->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D3_GRADE_C->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D3_GRADE_D->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->USABLE_ON_DAY_3_ET->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->USABLE_ON_day_3_FREEZING->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D5_GARDE_A->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D5_GRADE_B->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D5_GRADE_C->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D5_GRADE_D->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->USABLE_ON_D5_ET->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->USABLE_ON_D5_FREEZING->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_GRADE_A->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_GRADE_B->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_GRADE_C->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_GRADE_D->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_USABLE_EMBRYO_ET->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->D6_USABLE_FREEZING->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TOTAL_BLAST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PGS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->REMARKS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PU___D2FB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ICSI_D2FB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VIT_D2FB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ET_D2FB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LAB_COMMENTS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reason_for_no_FRESH_transfer->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EMBRYOS_PENDING->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DAY_OF_TRANSFER->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->H2FD_sperm->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Comments->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sc_progesterone->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CRINONE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->progynova->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Heparin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->cabergolin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Antagonist->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OHSS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Complications->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LP_bleeding->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DF_hCG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Implantation_rate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Ectopic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Type_of_preg->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->anomalies->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->baby_wt->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GA_at_delivery->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pregnancy_outcome->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_1st_FET->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AFTER_HYSTEROSCOPY->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AFTER_ERA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ERA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HRT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->XGRAST2FPRP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LMWH_40MG->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DF_hCG2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Implantation_rate1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Ectopic1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Type_of_pregA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANC1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->anomalies2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->baby_wt2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GA_at_delivery1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pregnancy_outcome1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_2ND_FET->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AFTER_HYSTEROSCOPY1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AFTER_ERA1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ERA1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HRT1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->XGRAST2FPRP1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NUMBER_OF_EMBRYOS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LMWH_40MG1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DF_hCG1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Implantation_rate2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Ectopic2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Type_of_preg2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ANCA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->anomalies1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->baby_wt1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GA_at_delivery2->AdvancedSearch->issetSession())
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
		$this->RIDNO->AdvancedSearch->unsetSession();
		$this->Treatment->AdvancedSearch->unsetSession();
		$this->Origin->AdvancedSearch->unsetSession();
		$this->MaleIndications->AdvancedSearch->unsetSession();
		$this->FemaleIndications->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->PatientID->AdvancedSearch->unsetSession();
		$this->PartnerName->AdvancedSearch->unsetSession();
		$this->PartnerID->AdvancedSearch->unsetSession();
		$this->A4ICSICycle->AdvancedSearch->unsetSession();
		$this->TotalICSICycle->AdvancedSearch->unsetSession();
		$this->TypeOfInfertility->AdvancedSearch->unsetSession();
		$this->RelevantHistory->AdvancedSearch->unsetSession();
		$this->IUICycles->AdvancedSearch->unsetSession();
		$this->AMH->AdvancedSearch->unsetSession();
		$this->FBMI->AdvancedSearch->unsetSession();
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->unsetSession();
		$this->OvarianSurgery->AdvancedSearch->unsetSession();
		$this->OPUDATE->AdvancedSearch->unsetSession();
		$this->RFSH1->AdvancedSearch->unsetSession();
		$this->RFSH2->AdvancedSearch->unsetSession();
		$this->RFSH3->AdvancedSearch->unsetSession();
		$this->E21->AdvancedSearch->unsetSession();
		$this->Hysteroscopy->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->Fweight->AdvancedSearch->unsetSession();
		$this->AntiTPO->AdvancedSearch->unsetSession();
		$this->AntiTG->AdvancedSearch->unsetSession();
		$this->PatientAge->AdvancedSearch->unsetSession();
		$this->PartnerAge->AdvancedSearch->unsetSession();
		$this->CYCLES->AdvancedSearch->unsetSession();
		$this->MF->AdvancedSearch->unsetSession();
		$this->CauseOfINFERTILITY->AdvancedSearch->unsetSession();
		$this->SIS->AdvancedSearch->unsetSession();
		$this->Scratching->AdvancedSearch->unsetSession();
		$this->Cannulation->AdvancedSearch->unsetSession();
		$this->MEPRATE->AdvancedSearch->unsetSession();
		$this->R_OVARY->AdvancedSearch->unsetSession();
		$this->R_AFC->AdvancedSearch->unsetSession();
		$this->L_OVARY->AdvancedSearch->unsetSession();
		$this->L_AFC->AdvancedSearch->unsetSession();
		$this->LH1->AdvancedSearch->unsetSession();
		$this->E2->AdvancedSearch->unsetSession();
		$this->StemCellInstallation->AdvancedSearch->unsetSession();
		$this->DHEAS->AdvancedSearch->unsetSession();
		$this->Mtorr->AdvancedSearch->unsetSession();
		$this->AMH1->AdvancedSearch->unsetSession();
		$this->LH->AdvancedSearch->unsetSession();
		$this->BMI28MALE29->AdvancedSearch->unsetSession();
		$this->MaleMedicalConditions->AdvancedSearch->unsetSession();
		$this->MaleExamination->AdvancedSearch->unsetSession();
		$this->SpermConcentration->AdvancedSearch->unsetSession();
		$this->SpermMotility28P26NP29->AdvancedSearch->unsetSession();
		$this->SpermMorphology->AdvancedSearch->unsetSession();
		$this->SpermRetrival->AdvancedSearch->unsetSession();
		$this->M_Testosterone->AdvancedSearch->unsetSession();
		$this->DFI->AdvancedSearch->unsetSession();
		$this->PreRX->AdvancedSearch->unsetSession();
		$this->CC_100->AdvancedSearch->unsetSession();
		$this->RFSH1A->AdvancedSearch->unsetSession();
		$this->HMG1->AdvancedSearch->unsetSession();
		$this->RLH->AdvancedSearch->unsetSession();
		$this->HMG_HP->AdvancedSearch->unsetSession();
		$this->day_of_HMG->AdvancedSearch->unsetSession();
		$this->Reason_for_HMG->AdvancedSearch->unsetSession();
		$this->RLH_day->AdvancedSearch->unsetSession();
		$this->DAYSOFSTIMULATION->AdvancedSearch->unsetSession();
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->unsetSession();
		$this->day_of_Anta->AdvancedSearch->unsetSession();
		$this->R_FSH_TD->AdvancedSearch->unsetSession();
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->unsetSession();
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->unsetSession();
		$this->HMG_TD->AdvancedSearch->unsetSession();
		$this->LH_TD->AdvancedSearch->unsetSession();
		$this->D1_LH->AdvancedSearch->unsetSession();
		$this->D1_E2->AdvancedSearch->unsetSession();
		$this->Trigger_day_E2->AdvancedSearch->unsetSession();
		$this->Trigger_day_P4->AdvancedSearch->unsetSession();
		$this->Trigger_day_LH->AdvancedSearch->unsetSession();
		$this->VIT_D->AdvancedSearch->unsetSession();
		$this->TRIGGERR->AdvancedSearch->unsetSession();
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->unsetSession();
		$this->LH__12_HRS->AdvancedSearch->unsetSession();
		$this->P4__12_HRS->AdvancedSearch->unsetSession();
		$this->ET_on_hCG_day->AdvancedSearch->unsetSession();
		$this->ET_doppler->AdvancedSearch->unsetSession();
		$this->VI2FFI2FVFI->AdvancedSearch->unsetSession();
		$this->Endometrial_abnormality->AdvancedSearch->unsetSession();
		$this->AFC_ON_S1->AdvancedSearch->unsetSession();
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->unsetSession();
		$this->SPERM_TYPE->AdvancedSearch->unsetSession();
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->unsetSession();
		$this->OOCYTES_RETRIEVED->AdvancedSearch->unsetSession();
		$this->TIME_OF_DENUDATION->AdvancedSearch->unsetSession();
		$this->M_II->AdvancedSearch->unsetSession();
		$this->MI->AdvancedSearch->unsetSession();
		$this->GV->AdvancedSearch->unsetSession();
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->unsetSession();
		$this->FERT_28_2_PN_29->AdvancedSearch->unsetSession();
		$this->DEG->AdvancedSearch->unsetSession();
		$this->D3_GRADE_A->AdvancedSearch->unsetSession();
		$this->D3_GRADE_B->AdvancedSearch->unsetSession();
		$this->D3_GRADE_C->AdvancedSearch->unsetSession();
		$this->D3_GRADE_D->AdvancedSearch->unsetSession();
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->unsetSession();
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->unsetSession();
		$this->D5_GARDE_A->AdvancedSearch->unsetSession();
		$this->D5_GRADE_B->AdvancedSearch->unsetSession();
		$this->D5_GRADE_C->AdvancedSearch->unsetSession();
		$this->D5_GRADE_D->AdvancedSearch->unsetSession();
		$this->USABLE_ON_D5_ET->AdvancedSearch->unsetSession();
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->unsetSession();
		$this->D6_GRADE_A->AdvancedSearch->unsetSession();
		$this->D6_GRADE_B->AdvancedSearch->unsetSession();
		$this->D6_GRADE_C->AdvancedSearch->unsetSession();
		$this->D6_GRADE_D->AdvancedSearch->unsetSession();
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->unsetSession();
		$this->D6_USABLE_FREEZING->AdvancedSearch->unsetSession();
		$this->TOTAL_BLAST->AdvancedSearch->unsetSession();
		$this->PGS->AdvancedSearch->unsetSession();
		$this->REMARKS->AdvancedSearch->unsetSession();
		$this->PU___D2FB->AdvancedSearch->unsetSession();
		$this->ICSI_D2FB->AdvancedSearch->unsetSession();
		$this->VIT_D2FB->AdvancedSearch->unsetSession();
		$this->ET_D2FB->AdvancedSearch->unsetSession();
		$this->LAB_COMMENTS->AdvancedSearch->unsetSession();
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->unsetSession();
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->unsetSession();
		$this->EMBRYOS_PENDING->AdvancedSearch->unsetSession();
		$this->DAY_OF_TRANSFER->AdvancedSearch->unsetSession();
		$this->H2FD_sperm->AdvancedSearch->unsetSession();
		$this->Comments->AdvancedSearch->unsetSession();
		$this->sc_progesterone->AdvancedSearch->unsetSession();
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->unsetSession();
		$this->CRINONE->AdvancedSearch->unsetSession();
		$this->progynova->AdvancedSearch->unsetSession();
		$this->Heparin->AdvancedSearch->unsetSession();
		$this->cabergolin->AdvancedSearch->unsetSession();
		$this->Antagonist->AdvancedSearch->unsetSession();
		$this->OHSS->AdvancedSearch->unsetSession();
		$this->Complications->AdvancedSearch->unsetSession();
		$this->LP_bleeding->AdvancedSearch->unsetSession();
		$this->DF_hCG->AdvancedSearch->unsetSession();
		$this->Implantation_rate->AdvancedSearch->unsetSession();
		$this->Ectopic->AdvancedSearch->unsetSession();
		$this->Type_of_preg->AdvancedSearch->unsetSession();
		$this->ANC->AdvancedSearch->unsetSession();
		$this->anomalies->AdvancedSearch->unsetSession();
		$this->baby_wt->AdvancedSearch->unsetSession();
		$this->GA_at_delivery->AdvancedSearch->unsetSession();
		$this->Pregnancy_outcome->AdvancedSearch->unsetSession();
		$this->_1st_FET->AdvancedSearch->unsetSession();
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->unsetSession();
		$this->AFTER_ERA->AdvancedSearch->unsetSession();
		$this->ERA->AdvancedSearch->unsetSession();
		$this->HRT->AdvancedSearch->unsetSession();
		$this->XGRAST2FPRP->AdvancedSearch->unsetSession();
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->unsetSession();
		$this->LMWH_40MG->AdvancedSearch->unsetSession();
		$this->DF_hCG2->AdvancedSearch->unsetSession();
		$this->Implantation_rate1->AdvancedSearch->unsetSession();
		$this->Ectopic1->AdvancedSearch->unsetSession();
		$this->Type_of_pregA->AdvancedSearch->unsetSession();
		$this->ANC1->AdvancedSearch->unsetSession();
		$this->anomalies2->AdvancedSearch->unsetSession();
		$this->baby_wt2->AdvancedSearch->unsetSession();
		$this->GA_at_delivery1->AdvancedSearch->unsetSession();
		$this->Pregnancy_outcome1->AdvancedSearch->unsetSession();
		$this->_2ND_FET->AdvancedSearch->unsetSession();
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->unsetSession();
		$this->AFTER_ERA1->AdvancedSearch->unsetSession();
		$this->ERA1->AdvancedSearch->unsetSession();
		$this->HRT1->AdvancedSearch->unsetSession();
		$this->XGRAST2FPRP1->AdvancedSearch->unsetSession();
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->unsetSession();
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->unsetSession();
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->unsetSession();
		$this->LMWH_40MG1->AdvancedSearch->unsetSession();
		$this->DF_hCG1->AdvancedSearch->unsetSession();
		$this->Implantation_rate2->AdvancedSearch->unsetSession();
		$this->Ectopic2->AdvancedSearch->unsetSession();
		$this->Type_of_preg2->AdvancedSearch->unsetSession();
		$this->ANCA->AdvancedSearch->unsetSession();
		$this->anomalies1->AdvancedSearch->unsetSession();
		$this->baby_wt1->AdvancedSearch->unsetSession();
		$this->GA_at_delivery2->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->Treatment->AdvancedSearch->load();
		$this->Origin->AdvancedSearch->load();
		$this->MaleIndications->AdvancedSearch->load();
		$this->FemaleIndications->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PartnerID->AdvancedSearch->load();
		$this->A4ICSICycle->AdvancedSearch->load();
		$this->TotalICSICycle->AdvancedSearch->load();
		$this->TypeOfInfertility->AdvancedSearch->load();
		$this->RelevantHistory->AdvancedSearch->load();
		$this->IUICycles->AdvancedSearch->load();
		$this->AMH->AdvancedSearch->load();
		$this->FBMI->AdvancedSearch->load();
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->load();
		$this->OvarianSurgery->AdvancedSearch->load();
		$this->OPUDATE->AdvancedSearch->load();
		$this->RFSH1->AdvancedSearch->load();
		$this->RFSH2->AdvancedSearch->load();
		$this->RFSH3->AdvancedSearch->load();
		$this->E21->AdvancedSearch->load();
		$this->Hysteroscopy->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Fweight->AdvancedSearch->load();
		$this->AntiTPO->AdvancedSearch->load();
		$this->AntiTG->AdvancedSearch->load();
		$this->PatientAge->AdvancedSearch->load();
		$this->PartnerAge->AdvancedSearch->load();
		$this->CYCLES->AdvancedSearch->load();
		$this->MF->AdvancedSearch->load();
		$this->CauseOfINFERTILITY->AdvancedSearch->load();
		$this->SIS->AdvancedSearch->load();
		$this->Scratching->AdvancedSearch->load();
		$this->Cannulation->AdvancedSearch->load();
		$this->MEPRATE->AdvancedSearch->load();
		$this->R_OVARY->AdvancedSearch->load();
		$this->R_AFC->AdvancedSearch->load();
		$this->L_OVARY->AdvancedSearch->load();
		$this->L_AFC->AdvancedSearch->load();
		$this->LH1->AdvancedSearch->load();
		$this->E2->AdvancedSearch->load();
		$this->StemCellInstallation->AdvancedSearch->load();
		$this->DHEAS->AdvancedSearch->load();
		$this->Mtorr->AdvancedSearch->load();
		$this->AMH1->AdvancedSearch->load();
		$this->LH->AdvancedSearch->load();
		$this->BMI28MALE29->AdvancedSearch->load();
		$this->MaleMedicalConditions->AdvancedSearch->load();
		$this->MaleExamination->AdvancedSearch->load();
		$this->SpermConcentration->AdvancedSearch->load();
		$this->SpermMotility28P26NP29->AdvancedSearch->load();
		$this->SpermMorphology->AdvancedSearch->load();
		$this->SpermRetrival->AdvancedSearch->load();
		$this->M_Testosterone->AdvancedSearch->load();
		$this->DFI->AdvancedSearch->load();
		$this->PreRX->AdvancedSearch->load();
		$this->CC_100->AdvancedSearch->load();
		$this->RFSH1A->AdvancedSearch->load();
		$this->HMG1->AdvancedSearch->load();
		$this->RLH->AdvancedSearch->load();
		$this->HMG_HP->AdvancedSearch->load();
		$this->day_of_HMG->AdvancedSearch->load();
		$this->Reason_for_HMG->AdvancedSearch->load();
		$this->RLH_day->AdvancedSearch->load();
		$this->DAYSOFSTIMULATION->AdvancedSearch->load();
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->load();
		$this->day_of_Anta->AdvancedSearch->load();
		$this->R_FSH_TD->AdvancedSearch->load();
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->load();
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->load();
		$this->HMG_TD->AdvancedSearch->load();
		$this->LH_TD->AdvancedSearch->load();
		$this->D1_LH->AdvancedSearch->load();
		$this->D1_E2->AdvancedSearch->load();
		$this->Trigger_day_E2->AdvancedSearch->load();
		$this->Trigger_day_P4->AdvancedSearch->load();
		$this->Trigger_day_LH->AdvancedSearch->load();
		$this->VIT_D->AdvancedSearch->load();
		$this->TRIGGERR->AdvancedSearch->load();
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->load();
		$this->LH__12_HRS->AdvancedSearch->load();
		$this->P4__12_HRS->AdvancedSearch->load();
		$this->ET_on_hCG_day->AdvancedSearch->load();
		$this->ET_doppler->AdvancedSearch->load();
		$this->VI2FFI2FVFI->AdvancedSearch->load();
		$this->Endometrial_abnormality->AdvancedSearch->load();
		$this->AFC_ON_S1->AdvancedSearch->load();
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->load();
		$this->SPERM_TYPE->AdvancedSearch->load();
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->load();
		$this->OOCYTES_RETRIEVED->AdvancedSearch->load();
		$this->TIME_OF_DENUDATION->AdvancedSearch->load();
		$this->M_II->AdvancedSearch->load();
		$this->MI->AdvancedSearch->load();
		$this->GV->AdvancedSearch->load();
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->load();
		$this->FERT_28_2_PN_29->AdvancedSearch->load();
		$this->DEG->AdvancedSearch->load();
		$this->D3_GRADE_A->AdvancedSearch->load();
		$this->D3_GRADE_B->AdvancedSearch->load();
		$this->D3_GRADE_C->AdvancedSearch->load();
		$this->D3_GRADE_D->AdvancedSearch->load();
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->load();
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->load();
		$this->D5_GARDE_A->AdvancedSearch->load();
		$this->D5_GRADE_B->AdvancedSearch->load();
		$this->D5_GRADE_C->AdvancedSearch->load();
		$this->D5_GRADE_D->AdvancedSearch->load();
		$this->USABLE_ON_D5_ET->AdvancedSearch->load();
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->load();
		$this->D6_GRADE_A->AdvancedSearch->load();
		$this->D6_GRADE_B->AdvancedSearch->load();
		$this->D6_GRADE_C->AdvancedSearch->load();
		$this->D6_GRADE_D->AdvancedSearch->load();
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->load();
		$this->D6_USABLE_FREEZING->AdvancedSearch->load();
		$this->TOTAL_BLAST->AdvancedSearch->load();
		$this->PGS->AdvancedSearch->load();
		$this->REMARKS->AdvancedSearch->load();
		$this->PU___D2FB->AdvancedSearch->load();
		$this->ICSI_D2FB->AdvancedSearch->load();
		$this->VIT_D2FB->AdvancedSearch->load();
		$this->ET_D2FB->AdvancedSearch->load();
		$this->LAB_COMMENTS->AdvancedSearch->load();
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->load();
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->load();
		$this->EMBRYOS_PENDING->AdvancedSearch->load();
		$this->DAY_OF_TRANSFER->AdvancedSearch->load();
		$this->H2FD_sperm->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->sc_progesterone->AdvancedSearch->load();
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->load();
		$this->CRINONE->AdvancedSearch->load();
		$this->progynova->AdvancedSearch->load();
		$this->Heparin->AdvancedSearch->load();
		$this->cabergolin->AdvancedSearch->load();
		$this->Antagonist->AdvancedSearch->load();
		$this->OHSS->AdvancedSearch->load();
		$this->Complications->AdvancedSearch->load();
		$this->LP_bleeding->AdvancedSearch->load();
		$this->DF_hCG->AdvancedSearch->load();
		$this->Implantation_rate->AdvancedSearch->load();
		$this->Ectopic->AdvancedSearch->load();
		$this->Type_of_preg->AdvancedSearch->load();
		$this->ANC->AdvancedSearch->load();
		$this->anomalies->AdvancedSearch->load();
		$this->baby_wt->AdvancedSearch->load();
		$this->GA_at_delivery->AdvancedSearch->load();
		$this->Pregnancy_outcome->AdvancedSearch->load();
		$this->_1st_FET->AdvancedSearch->load();
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->load();
		$this->AFTER_ERA->AdvancedSearch->load();
		$this->ERA->AdvancedSearch->load();
		$this->HRT->AdvancedSearch->load();
		$this->XGRAST2FPRP->AdvancedSearch->load();
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->load();
		$this->LMWH_40MG->AdvancedSearch->load();
		$this->DF_hCG2->AdvancedSearch->load();
		$this->Implantation_rate1->AdvancedSearch->load();
		$this->Ectopic1->AdvancedSearch->load();
		$this->Type_of_pregA->AdvancedSearch->load();
		$this->ANC1->AdvancedSearch->load();
		$this->anomalies2->AdvancedSearch->load();
		$this->baby_wt2->AdvancedSearch->load();
		$this->GA_at_delivery1->AdvancedSearch->load();
		$this->Pregnancy_outcome1->AdvancedSearch->load();
		$this->_2ND_FET->AdvancedSearch->load();
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->load();
		$this->AFTER_ERA1->AdvancedSearch->load();
		$this->ERA1->AdvancedSearch->load();
		$this->HRT1->AdvancedSearch->load();
		$this->XGRAST2FPRP1->AdvancedSearch->load();
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->load();
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->load();
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->load();
		$this->LMWH_40MG1->AdvancedSearch->load();
		$this->DF_hCG1->AdvancedSearch->load();
		$this->Implantation_rate2->AdvancedSearch->load();
		$this->Ectopic2->AdvancedSearch->load();
		$this->Type_of_preg2->AdvancedSearch->load();
		$this->ANCA->AdvancedSearch->load();
		$this->anomalies1->AdvancedSearch->load();
		$this->baby_wt1->AdvancedSearch->load();
		$this->GA_at_delivery2->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->Treatment); // Treatment
			$this->updateSort($this->Origin); // Origin
			$this->updateSort($this->MaleIndications); // MaleIndications
			$this->updateSort($this->FemaleIndications); // FemaleIndications
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->PartnerName); // PartnerName
			$this->updateSort($this->PartnerID); // PartnerID
			$this->updateSort($this->A4ICSICycle); // A4ICSICycle
			$this->updateSort($this->TotalICSICycle); // TotalICSICycle
			$this->updateSort($this->TypeOfInfertility); // TypeOfInfertility
			$this->updateSort($this->RelevantHistory); // RelevantHistory
			$this->updateSort($this->IUICycles); // IUICycles
			$this->updateSort($this->AMH); // AMH
			$this->updateSort($this->FBMI); // FBMI
			$this->updateSort($this->ANTAGONISTSTARTDAY); // ANTAGONISTSTARTDAY
			$this->updateSort($this->OvarianSurgery); // OvarianSurgery
			$this->updateSort($this->OPUDATE); // OPUDATE
			$this->updateSort($this->RFSH1); // RFSH1
			$this->updateSort($this->RFSH2); // RFSH2
			$this->updateSort($this->RFSH3); // RFSH3
			$this->updateSort($this->E21); // E21
			$this->updateSort($this->Hysteroscopy); // Hysteroscopy
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->Fweight); // Fweight
			$this->updateSort($this->AntiTPO); // AntiTPO
			$this->updateSort($this->AntiTG); // AntiTG
			$this->updateSort($this->PatientAge); // PatientAge
			$this->updateSort($this->PartnerAge); // PartnerAge
			$this->updateSort($this->R_OVARY); // R.OVARY
			$this->updateSort($this->R_AFC); // R.AFC
			$this->updateSort($this->L_OVARY); // L.OVARY
			$this->updateSort($this->L_AFC); // L.AFC
			$this->updateSort($this->E2); // E2
			$this->updateSort($this->AMH1); // AMH1
			$this->updateSort($this->BMI28MALE29); // BMI(MALE)
			$this->updateSort($this->MaleMedicalConditions); // MaleMedicalConditions
			$this->updateSort($this->CC_100); // CC 100
			$this->updateSort($this->RFSH1A); // RFSH1A
			$this->updateSort($this->HMG1); // HMG1
			$this->updateSort($this->DAYSOFSTIMULATION); // DAYSOFSTIMULATION
			$this->updateSort($this->TRIGGERR); // TRIGGERR
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
				$this->RIDNO->setSort("");
				$this->Treatment->setSort("");
				$this->Origin->setSort("");
				$this->MaleIndications->setSort("");
				$this->FemaleIndications->setSort("");
				$this->PatientName->setSort("");
				$this->PatientID->setSort("");
				$this->PartnerName->setSort("");
				$this->PartnerID->setSort("");
				$this->A4ICSICycle->setSort("");
				$this->TotalICSICycle->setSort("");
				$this->TypeOfInfertility->setSort("");
				$this->RelevantHistory->setSort("");
				$this->IUICycles->setSort("");
				$this->AMH->setSort("");
				$this->FBMI->setSort("");
				$this->ANTAGONISTSTARTDAY->setSort("");
				$this->OvarianSurgery->setSort("");
				$this->OPUDATE->setSort("");
				$this->RFSH1->setSort("");
				$this->RFSH2->setSort("");
				$this->RFSH3->setSort("");
				$this->E21->setSort("");
				$this->Hysteroscopy->setSort("");
				$this->HospID->setSort("");
				$this->Fweight->setSort("");
				$this->AntiTPO->setSort("");
				$this->AntiTG->setSort("");
				$this->PatientAge->setSort("");
				$this->PartnerAge->setSort("");
				$this->R_OVARY->setSort("");
				$this->R_AFC->setSort("");
				$this->L_OVARY->setSort("");
				$this->L_AFC->setSort("");
				$this->E2->setSort("");
				$this->AMH1->setSort("");
				$this->BMI28MALE29->setSort("");
				$this->MaleMedicalConditions->setSort("");
				$this->CC_100->setSort("");
				$this->RFSH1A->setSort("");
				$this->HMG1->setSort("");
				$this->DAYSOFSTIMULATION->setSort("");
				$this->TRIGGERR->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_template_for_opulistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_template_for_opulistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_template_for_opulist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_template_for_opulistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

		// RIDNO
		if (!$this->isAddOrEdit())
			$this->RIDNO->AdvancedSearch->setSearchValue(Get("x_RIDNO", Get("RIDNO", "")));
		if ($this->RIDNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RIDNO->AdvancedSearch->setSearchOperator(Get("z_RIDNO", ""));

		// Treatment
		if (!$this->isAddOrEdit())
			$this->Treatment->AdvancedSearch->setSearchValue(Get("x_Treatment", Get("Treatment", "")));
		if ($this->Treatment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Treatment->AdvancedSearch->setSearchOperator(Get("z_Treatment", ""));

		// Origin
		if (!$this->isAddOrEdit())
			$this->Origin->AdvancedSearch->setSearchValue(Get("x_Origin", Get("Origin", "")));
		if ($this->Origin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Origin->AdvancedSearch->setSearchOperator(Get("z_Origin", ""));

		// MaleIndications
		if (!$this->isAddOrEdit())
			$this->MaleIndications->AdvancedSearch->setSearchValue(Get("x_MaleIndications", Get("MaleIndications", "")));
		if ($this->MaleIndications->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MaleIndications->AdvancedSearch->setSearchOperator(Get("z_MaleIndications", ""));

		// FemaleIndications
		if (!$this->isAddOrEdit())
			$this->FemaleIndications->AdvancedSearch->setSearchValue(Get("x_FemaleIndications", Get("FemaleIndications", "")));
		if ($this->FemaleIndications->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FemaleIndications->AdvancedSearch->setSearchOperator(Get("z_FemaleIndications", ""));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue(Get("x_PatientName", Get("PatientName", "")));
		if ($this->PatientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientName->AdvancedSearch->setSearchOperator(Get("z_PatientName", ""));

		// PatientID
		if (!$this->isAddOrEdit())
			$this->PatientID->AdvancedSearch->setSearchValue(Get("x_PatientID", Get("PatientID", "")));
		if ($this->PatientID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientID->AdvancedSearch->setSearchOperator(Get("z_PatientID", ""));

		// PartnerName
		if (!$this->isAddOrEdit())
			$this->PartnerName->AdvancedSearch->setSearchValue(Get("x_PartnerName", Get("PartnerName", "")));
		if ($this->PartnerName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PartnerName->AdvancedSearch->setSearchOperator(Get("z_PartnerName", ""));

		// PartnerID
		if (!$this->isAddOrEdit())
			$this->PartnerID->AdvancedSearch->setSearchValue(Get("x_PartnerID", Get("PartnerID", "")));
		if ($this->PartnerID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PartnerID->AdvancedSearch->setSearchOperator(Get("z_PartnerID", ""));

		// A4ICSICycle
		if (!$this->isAddOrEdit())
			$this->A4ICSICycle->AdvancedSearch->setSearchValue(Get("x_A4ICSICycle", Get("A4ICSICycle", "")));
		if ($this->A4ICSICycle->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->A4ICSICycle->AdvancedSearch->setSearchOperator(Get("z_A4ICSICycle", ""));

		// TotalICSICycle
		if (!$this->isAddOrEdit())
			$this->TotalICSICycle->AdvancedSearch->setSearchValue(Get("x_TotalICSICycle", Get("TotalICSICycle", "")));
		if ($this->TotalICSICycle->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TotalICSICycle->AdvancedSearch->setSearchOperator(Get("z_TotalICSICycle", ""));

		// TypeOfInfertility
		if (!$this->isAddOrEdit())
			$this->TypeOfInfertility->AdvancedSearch->setSearchValue(Get("x_TypeOfInfertility", Get("TypeOfInfertility", "")));
		if ($this->TypeOfInfertility->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TypeOfInfertility->AdvancedSearch->setSearchOperator(Get("z_TypeOfInfertility", ""));

		// RelevantHistory
		if (!$this->isAddOrEdit())
			$this->RelevantHistory->AdvancedSearch->setSearchValue(Get("x_RelevantHistory", Get("RelevantHistory", "")));
		if ($this->RelevantHistory->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RelevantHistory->AdvancedSearch->setSearchOperator(Get("z_RelevantHistory", ""));

		// IUICycles
		if (!$this->isAddOrEdit())
			$this->IUICycles->AdvancedSearch->setSearchValue(Get("x_IUICycles", Get("IUICycles", "")));
		if ($this->IUICycles->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IUICycles->AdvancedSearch->setSearchOperator(Get("z_IUICycles", ""));

		// AMH
		if (!$this->isAddOrEdit())
			$this->AMH->AdvancedSearch->setSearchValue(Get("x_AMH", Get("AMH", "")));
		if ($this->AMH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AMH->AdvancedSearch->setSearchOperator(Get("z_AMH", ""));

		// FBMI
		if (!$this->isAddOrEdit())
			$this->FBMI->AdvancedSearch->setSearchValue(Get("x_FBMI", Get("FBMI", "")));
		if ($this->FBMI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FBMI->AdvancedSearch->setSearchOperator(Get("z_FBMI", ""));

		// ANTAGONISTSTARTDAY
		if (!$this->isAddOrEdit())
			$this->ANTAGONISTSTARTDAY->AdvancedSearch->setSearchValue(Get("x_ANTAGONISTSTARTDAY", Get("ANTAGONISTSTARTDAY", "")));
		if ($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->setSearchOperator(Get("z_ANTAGONISTSTARTDAY", ""));

		// OvarianSurgery
		if (!$this->isAddOrEdit())
			$this->OvarianSurgery->AdvancedSearch->setSearchValue(Get("x_OvarianSurgery", Get("OvarianSurgery", "")));
		if ($this->OvarianSurgery->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OvarianSurgery->AdvancedSearch->setSearchOperator(Get("z_OvarianSurgery", ""));

		// OPUDATE
		if (!$this->isAddOrEdit())
			$this->OPUDATE->AdvancedSearch->setSearchValue(Get("x_OPUDATE", Get("OPUDATE", "")));
		if ($this->OPUDATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OPUDATE->AdvancedSearch->setSearchOperator(Get("z_OPUDATE", ""));

		// RFSH1
		if (!$this->isAddOrEdit())
			$this->RFSH1->AdvancedSearch->setSearchValue(Get("x_RFSH1", Get("RFSH1", "")));
		if ($this->RFSH1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RFSH1->AdvancedSearch->setSearchOperator(Get("z_RFSH1", ""));

		// RFSH2
		if (!$this->isAddOrEdit())
			$this->RFSH2->AdvancedSearch->setSearchValue(Get("x_RFSH2", Get("RFSH2", "")));
		if ($this->RFSH2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RFSH2->AdvancedSearch->setSearchOperator(Get("z_RFSH2", ""));

		// RFSH3
		if (!$this->isAddOrEdit())
			$this->RFSH3->AdvancedSearch->setSearchValue(Get("x_RFSH3", Get("RFSH3", "")));
		if ($this->RFSH3->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RFSH3->AdvancedSearch->setSearchOperator(Get("z_RFSH3", ""));

		// E21
		if (!$this->isAddOrEdit())
			$this->E21->AdvancedSearch->setSearchValue(Get("x_E21", Get("E21", "")));
		if ($this->E21->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->E21->AdvancedSearch->setSearchOperator(Get("z_E21", ""));

		// Hysteroscopy
		if (!$this->isAddOrEdit())
			$this->Hysteroscopy->AdvancedSearch->setSearchValue(Get("x_Hysteroscopy", Get("Hysteroscopy", "")));
		if ($this->Hysteroscopy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Hysteroscopy->AdvancedSearch->setSearchOperator(Get("z_Hysteroscopy", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// Fweight
		if (!$this->isAddOrEdit())
			$this->Fweight->AdvancedSearch->setSearchValue(Get("x_Fweight", Get("Fweight", "")));
		if ($this->Fweight->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Fweight->AdvancedSearch->setSearchOperator(Get("z_Fweight", ""));

		// AntiTPO
		if (!$this->isAddOrEdit())
			$this->AntiTPO->AdvancedSearch->setSearchValue(Get("x_AntiTPO", Get("AntiTPO", "")));
		if ($this->AntiTPO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AntiTPO->AdvancedSearch->setSearchOperator(Get("z_AntiTPO", ""));

		// AntiTG
		if (!$this->isAddOrEdit())
			$this->AntiTG->AdvancedSearch->setSearchValue(Get("x_AntiTG", Get("AntiTG", "")));
		if ($this->AntiTG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AntiTG->AdvancedSearch->setSearchOperator(Get("z_AntiTG", ""));

		// PatientAge
		if (!$this->isAddOrEdit())
			$this->PatientAge->AdvancedSearch->setSearchValue(Get("x_PatientAge", Get("PatientAge", "")));
		if ($this->PatientAge->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientAge->AdvancedSearch->setSearchOperator(Get("z_PatientAge", ""));

		// PartnerAge
		if (!$this->isAddOrEdit())
			$this->PartnerAge->AdvancedSearch->setSearchValue(Get("x_PartnerAge", Get("PartnerAge", "")));
		if ($this->PartnerAge->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PartnerAge->AdvancedSearch->setSearchOperator(Get("z_PartnerAge", ""));

		// CYCLES
		if (!$this->isAddOrEdit())
			$this->CYCLES->AdvancedSearch->setSearchValue(Get("x_CYCLES", Get("CYCLES", "")));
		if ($this->CYCLES->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CYCLES->AdvancedSearch->setSearchOperator(Get("z_CYCLES", ""));

		// MF
		if (!$this->isAddOrEdit())
			$this->MF->AdvancedSearch->setSearchValue(Get("x_MF", Get("MF", "")));
		if ($this->MF->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MF->AdvancedSearch->setSearchOperator(Get("z_MF", ""));

		// CauseOfINFERTILITY
		if (!$this->isAddOrEdit())
			$this->CauseOfINFERTILITY->AdvancedSearch->setSearchValue(Get("x_CauseOfINFERTILITY", Get("CauseOfINFERTILITY", "")));
		if ($this->CauseOfINFERTILITY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CauseOfINFERTILITY->AdvancedSearch->setSearchOperator(Get("z_CauseOfINFERTILITY", ""));

		// SIS
		if (!$this->isAddOrEdit())
			$this->SIS->AdvancedSearch->setSearchValue(Get("x_SIS", Get("SIS", "")));
		if ($this->SIS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SIS->AdvancedSearch->setSearchOperator(Get("z_SIS", ""));

		// Scratching
		if (!$this->isAddOrEdit())
			$this->Scratching->AdvancedSearch->setSearchValue(Get("x_Scratching", Get("Scratching", "")));
		if ($this->Scratching->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Scratching->AdvancedSearch->setSearchOperator(Get("z_Scratching", ""));

		// Cannulation
		if (!$this->isAddOrEdit())
			$this->Cannulation->AdvancedSearch->setSearchValue(Get("x_Cannulation", Get("Cannulation", "")));
		if ($this->Cannulation->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Cannulation->AdvancedSearch->setSearchOperator(Get("z_Cannulation", ""));

		// MEPRATE
		if (!$this->isAddOrEdit())
			$this->MEPRATE->AdvancedSearch->setSearchValue(Get("x_MEPRATE", Get("MEPRATE", "")));
		if ($this->MEPRATE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MEPRATE->AdvancedSearch->setSearchOperator(Get("z_MEPRATE", ""));

		// R.OVARY
		if (!$this->isAddOrEdit())
			$this->R_OVARY->AdvancedSearch->setSearchValue(Get("x_R_OVARY", Get("R_OVARY", "")));
		if ($this->R_OVARY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->R_OVARY->AdvancedSearch->setSearchOperator(Get("z_R_OVARY", ""));

		// R.AFC
		if (!$this->isAddOrEdit())
			$this->R_AFC->AdvancedSearch->setSearchValue(Get("x_R_AFC", Get("R_AFC", "")));
		if ($this->R_AFC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->R_AFC->AdvancedSearch->setSearchOperator(Get("z_R_AFC", ""));

		// L.OVARY
		if (!$this->isAddOrEdit())
			$this->L_OVARY->AdvancedSearch->setSearchValue(Get("x_L_OVARY", Get("L_OVARY", "")));
		if ($this->L_OVARY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->L_OVARY->AdvancedSearch->setSearchOperator(Get("z_L_OVARY", ""));

		// L.AFC
		if (!$this->isAddOrEdit())
			$this->L_AFC->AdvancedSearch->setSearchValue(Get("x_L_AFC", Get("L_AFC", "")));
		if ($this->L_AFC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->L_AFC->AdvancedSearch->setSearchOperator(Get("z_L_AFC", ""));

		// LH1
		if (!$this->isAddOrEdit())
			$this->LH1->AdvancedSearch->setSearchValue(Get("x_LH1", Get("LH1", "")));
		if ($this->LH1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LH1->AdvancedSearch->setSearchOperator(Get("z_LH1", ""));

		// E2
		if (!$this->isAddOrEdit())
			$this->E2->AdvancedSearch->setSearchValue(Get("x_E2", Get("E2", "")));
		if ($this->E2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->E2->AdvancedSearch->setSearchOperator(Get("z_E2", ""));

		// StemCellInstallation
		if (!$this->isAddOrEdit())
			$this->StemCellInstallation->AdvancedSearch->setSearchValue(Get("x_StemCellInstallation", Get("StemCellInstallation", "")));
		if ($this->StemCellInstallation->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->StemCellInstallation->AdvancedSearch->setSearchOperator(Get("z_StemCellInstallation", ""));

		// DHEAS
		if (!$this->isAddOrEdit())
			$this->DHEAS->AdvancedSearch->setSearchValue(Get("x_DHEAS", Get("DHEAS", "")));
		if ($this->DHEAS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DHEAS->AdvancedSearch->setSearchOperator(Get("z_DHEAS", ""));

		// Mtorr
		if (!$this->isAddOrEdit())
			$this->Mtorr->AdvancedSearch->setSearchValue(Get("x_Mtorr", Get("Mtorr", "")));
		if ($this->Mtorr->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Mtorr->AdvancedSearch->setSearchOperator(Get("z_Mtorr", ""));

		// AMH1
		if (!$this->isAddOrEdit())
			$this->AMH1->AdvancedSearch->setSearchValue(Get("x_AMH1", Get("AMH1", "")));
		if ($this->AMH1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AMH1->AdvancedSearch->setSearchOperator(Get("z_AMH1", ""));

		// LH
		if (!$this->isAddOrEdit())
			$this->LH->AdvancedSearch->setSearchValue(Get("x_LH", Get("LH", "")));
		if ($this->LH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LH->AdvancedSearch->setSearchOperator(Get("z_LH", ""));

		// BMI(MALE)
		if (!$this->isAddOrEdit())
			$this->BMI28MALE29->AdvancedSearch->setSearchValue(Get("x_BMI28MALE29", Get("BMI28MALE29", "")));
		if ($this->BMI28MALE29->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BMI28MALE29->AdvancedSearch->setSearchOperator(Get("z_BMI28MALE29", ""));

		// MaleMedicalConditions
		if (!$this->isAddOrEdit())
			$this->MaleMedicalConditions->AdvancedSearch->setSearchValue(Get("x_MaleMedicalConditions", Get("MaleMedicalConditions", "")));
		if ($this->MaleMedicalConditions->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MaleMedicalConditions->AdvancedSearch->setSearchOperator(Get("z_MaleMedicalConditions", ""));

		// MaleExamination
		if (!$this->isAddOrEdit())
			$this->MaleExamination->AdvancedSearch->setSearchValue(Get("x_MaleExamination", Get("MaleExamination", "")));
		if ($this->MaleExamination->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MaleExamination->AdvancedSearch->setSearchOperator(Get("z_MaleExamination", ""));

		// SpermConcentration
		if (!$this->isAddOrEdit())
			$this->SpermConcentration->AdvancedSearch->setSearchValue(Get("x_SpermConcentration", Get("SpermConcentration", "")));
		if ($this->SpermConcentration->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SpermConcentration->AdvancedSearch->setSearchOperator(Get("z_SpermConcentration", ""));

		// SpermMotility(P&NP)
		if (!$this->isAddOrEdit())
			$this->SpermMotility28P26NP29->AdvancedSearch->setSearchValue(Get("x_SpermMotility28P26NP29", Get("SpermMotility28P26NP29", "")));
		if ($this->SpermMotility28P26NP29->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SpermMotility28P26NP29->AdvancedSearch->setSearchOperator(Get("z_SpermMotility28P26NP29", ""));

		// SpermMorphology
		if (!$this->isAddOrEdit())
			$this->SpermMorphology->AdvancedSearch->setSearchValue(Get("x_SpermMorphology", Get("SpermMorphology", "")));
		if ($this->SpermMorphology->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SpermMorphology->AdvancedSearch->setSearchOperator(Get("z_SpermMorphology", ""));

		// SpermRetrival
		if (!$this->isAddOrEdit())
			$this->SpermRetrival->AdvancedSearch->setSearchValue(Get("x_SpermRetrival", Get("SpermRetrival", "")));
		if ($this->SpermRetrival->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SpermRetrival->AdvancedSearch->setSearchOperator(Get("z_SpermRetrival", ""));

		// M.Testosterone
		if (!$this->isAddOrEdit())
			$this->M_Testosterone->AdvancedSearch->setSearchValue(Get("x_M_Testosterone", Get("M_Testosterone", "")));
		if ($this->M_Testosterone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->M_Testosterone->AdvancedSearch->setSearchOperator(Get("z_M_Testosterone", ""));

		// DFI
		if (!$this->isAddOrEdit())
			$this->DFI->AdvancedSearch->setSearchValue(Get("x_DFI", Get("DFI", "")));
		if ($this->DFI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DFI->AdvancedSearch->setSearchOperator(Get("z_DFI", ""));

		// PreRX
		if (!$this->isAddOrEdit())
			$this->PreRX->AdvancedSearch->setSearchValue(Get("x_PreRX", Get("PreRX", "")));
		if ($this->PreRX->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PreRX->AdvancedSearch->setSearchOperator(Get("z_PreRX", ""));

		// CC 100
		if (!$this->isAddOrEdit())
			$this->CC_100->AdvancedSearch->setSearchValue(Get("x_CC_100", Get("CC_100", "")));
		if ($this->CC_100->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CC_100->AdvancedSearch->setSearchOperator(Get("z_CC_100", ""));

		// RFSH1A
		if (!$this->isAddOrEdit())
			$this->RFSH1A->AdvancedSearch->setSearchValue(Get("x_RFSH1A", Get("RFSH1A", "")));
		if ($this->RFSH1A->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RFSH1A->AdvancedSearch->setSearchOperator(Get("z_RFSH1A", ""));

		// HMG1
		if (!$this->isAddOrEdit())
			$this->HMG1->AdvancedSearch->setSearchValue(Get("x_HMG1", Get("HMG1", "")));
		if ($this->HMG1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HMG1->AdvancedSearch->setSearchOperator(Get("z_HMG1", ""));

		// RLH
		if (!$this->isAddOrEdit())
			$this->RLH->AdvancedSearch->setSearchValue(Get("x_RLH", Get("RLH", "")));
		if ($this->RLH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RLH->AdvancedSearch->setSearchOperator(Get("z_RLH", ""));

		// HMG_HP
		if (!$this->isAddOrEdit())
			$this->HMG_HP->AdvancedSearch->setSearchValue(Get("x_HMG_HP", Get("HMG_HP", "")));
		if ($this->HMG_HP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HMG_HP->AdvancedSearch->setSearchOperator(Get("z_HMG_HP", ""));

		// day_of_HMG
		if (!$this->isAddOrEdit())
			$this->day_of_HMG->AdvancedSearch->setSearchValue(Get("x_day_of_HMG", Get("day_of_HMG", "")));
		if ($this->day_of_HMG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->day_of_HMG->AdvancedSearch->setSearchOperator(Get("z_day_of_HMG", ""));

		// Reason_for_HMG
		if (!$this->isAddOrEdit())
			$this->Reason_for_HMG->AdvancedSearch->setSearchValue(Get("x_Reason_for_HMG", Get("Reason_for_HMG", "")));
		if ($this->Reason_for_HMG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Reason_for_HMG->AdvancedSearch->setSearchOperator(Get("z_Reason_for_HMG", ""));

		// RLH_day
		if (!$this->isAddOrEdit())
			$this->RLH_day->AdvancedSearch->setSearchValue(Get("x_RLH_day", Get("RLH_day", "")));
		if ($this->RLH_day->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RLH_day->AdvancedSearch->setSearchOperator(Get("z_RLH_day", ""));

		// DAYSOFSTIMULATION
		if (!$this->isAddOrEdit())
			$this->DAYSOFSTIMULATION->AdvancedSearch->setSearchValue(Get("x_DAYSOFSTIMULATION", Get("DAYSOFSTIMULATION", "")));
		if ($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DAYSOFSTIMULATION->AdvancedSearch->setSearchOperator(Get("z_DAYSOFSTIMULATION", ""));

		// Any change inbetween ( Dose added , day)
		if (!$this->isAddOrEdit())
			$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->setSearchValue(Get("x_Any_change_inbetween_28_Dose_added_2C_day29", Get("Any_change_inbetween_28_Dose_added_2C_day29", "")));
		if ($this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->setSearchOperator(Get("z_Any_change_inbetween_28_Dose_added_2C_day29", ""));

		// day of Anta
		if (!$this->isAddOrEdit())
			$this->day_of_Anta->AdvancedSearch->setSearchValue(Get("x_day_of_Anta", Get("day_of_Anta", "")));
		if ($this->day_of_Anta->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->day_of_Anta->AdvancedSearch->setSearchOperator(Get("z_day_of_Anta", ""));

		// R FSH TD
		if (!$this->isAddOrEdit())
			$this->R_FSH_TD->AdvancedSearch->setSearchValue(Get("x_R_FSH_TD", Get("R_FSH_TD", "")));
		if ($this->R_FSH_TD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->R_FSH_TD->AdvancedSearch->setSearchOperator(Get("z_R_FSH_TD", ""));

		// R FSH + HMG TD
		if (!$this->isAddOrEdit())
			$this->R_FSH_2B_HMG_TD->AdvancedSearch->setSearchValue(Get("x_R_FSH_2B_HMG_TD", Get("R_FSH_2B_HMG_TD", "")));
		if ($this->R_FSH_2B_HMG_TD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->setSearchOperator(Get("z_R_FSH_2B_HMG_TD", ""));

		// R FSH + R LH TD
		if (!$this->isAddOrEdit())
			$this->R_FSH_2B_R_LH_TD->AdvancedSearch->setSearchValue(Get("x_R_FSH_2B_R_LH_TD", Get("R_FSH_2B_R_LH_TD", "")));
		if ($this->R_FSH_2B_R_LH_TD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->setSearchOperator(Get("z_R_FSH_2B_R_LH_TD", ""));

		// HMG TD
		if (!$this->isAddOrEdit())
			$this->HMG_TD->AdvancedSearch->setSearchValue(Get("x_HMG_TD", Get("HMG_TD", "")));
		if ($this->HMG_TD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HMG_TD->AdvancedSearch->setSearchOperator(Get("z_HMG_TD", ""));

		// LH TD
		if (!$this->isAddOrEdit())
			$this->LH_TD->AdvancedSearch->setSearchValue(Get("x_LH_TD", Get("LH_TD", "")));
		if ($this->LH_TD->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LH_TD->AdvancedSearch->setSearchOperator(Get("z_LH_TD", ""));

		// D1 LH
		if (!$this->isAddOrEdit())
			$this->D1_LH->AdvancedSearch->setSearchValue(Get("x_D1_LH", Get("D1_LH", "")));
		if ($this->D1_LH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D1_LH->AdvancedSearch->setSearchOperator(Get("z_D1_LH", ""));

		// D1 E2
		if (!$this->isAddOrEdit())
			$this->D1_E2->AdvancedSearch->setSearchValue(Get("x_D1_E2", Get("D1_E2", "")));
		if ($this->D1_E2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D1_E2->AdvancedSearch->setSearchOperator(Get("z_D1_E2", ""));

		// Trigger day E2
		if (!$this->isAddOrEdit())
			$this->Trigger_day_E2->AdvancedSearch->setSearchValue(Get("x_Trigger_day_E2", Get("Trigger_day_E2", "")));
		if ($this->Trigger_day_E2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Trigger_day_E2->AdvancedSearch->setSearchOperator(Get("z_Trigger_day_E2", ""));

		// Trigger day P4
		if (!$this->isAddOrEdit())
			$this->Trigger_day_P4->AdvancedSearch->setSearchValue(Get("x_Trigger_day_P4", Get("Trigger_day_P4", "")));
		if ($this->Trigger_day_P4->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Trigger_day_P4->AdvancedSearch->setSearchOperator(Get("z_Trigger_day_P4", ""));

		// Trigger day LH
		if (!$this->isAddOrEdit())
			$this->Trigger_day_LH->AdvancedSearch->setSearchValue(Get("x_Trigger_day_LH", Get("Trigger_day_LH", "")));
		if ($this->Trigger_day_LH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Trigger_day_LH->AdvancedSearch->setSearchOperator(Get("z_Trigger_day_LH", ""));

		// VIT-D
		if (!$this->isAddOrEdit())
			$this->VIT_D->AdvancedSearch->setSearchValue(Get("x_VIT_D", Get("VIT_D", "")));
		if ($this->VIT_D->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->VIT_D->AdvancedSearch->setSearchOperator(Get("z_VIT_D", ""));

		// TRIGGERR
		if (!$this->isAddOrEdit())
			$this->TRIGGERR->AdvancedSearch->setSearchValue(Get("x_TRIGGERR", Get("TRIGGERR", "")));
		if ($this->TRIGGERR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TRIGGERR->AdvancedSearch->setSearchOperator(Get("z_TRIGGERR", ""));

		// BHCG BEFORE RETRIEVAL
		if (!$this->isAddOrEdit())
			$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->setSearchValue(Get("x_BHCG_BEFORE_RETRIEVAL", Get("BHCG_BEFORE_RETRIEVAL", "")));
		if ($this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->setSearchOperator(Get("z_BHCG_BEFORE_RETRIEVAL", ""));

		// LH -12 HRS
		if (!$this->isAddOrEdit())
			$this->LH__12_HRS->AdvancedSearch->setSearchValue(Get("x_LH__12_HRS", Get("LH__12_HRS", "")));
		if ($this->LH__12_HRS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LH__12_HRS->AdvancedSearch->setSearchOperator(Get("z_LH__12_HRS", ""));

		// P4 -12 HRS
		if (!$this->isAddOrEdit())
			$this->P4__12_HRS->AdvancedSearch->setSearchValue(Get("x_P4__12_HRS", Get("P4__12_HRS", "")));
		if ($this->P4__12_HRS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->P4__12_HRS->AdvancedSearch->setSearchOperator(Get("z_P4__12_HRS", ""));

		// ET on hCG day
		if (!$this->isAddOrEdit())
			$this->ET_on_hCG_day->AdvancedSearch->setSearchValue(Get("x_ET_on_hCG_day", Get("ET_on_hCG_day", "")));
		if ($this->ET_on_hCG_day->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ET_on_hCG_day->AdvancedSearch->setSearchOperator(Get("z_ET_on_hCG_day", ""));

		// ET doppler
		if (!$this->isAddOrEdit())
			$this->ET_doppler->AdvancedSearch->setSearchValue(Get("x_ET_doppler", Get("ET_doppler", "")));
		if ($this->ET_doppler->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ET_doppler->AdvancedSearch->setSearchOperator(Get("z_ET_doppler", ""));

		// VI/FI/VFI
		if (!$this->isAddOrEdit())
			$this->VI2FFI2FVFI->AdvancedSearch->setSearchValue(Get("x_VI2FFI2FVFI", Get("VI2FFI2FVFI", "")));
		if ($this->VI2FFI2FVFI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->VI2FFI2FVFI->AdvancedSearch->setSearchOperator(Get("z_VI2FFI2FVFI", ""));

		// Endometrial abnormality
		if (!$this->isAddOrEdit())
			$this->Endometrial_abnormality->AdvancedSearch->setSearchValue(Get("x_Endometrial_abnormality", Get("Endometrial_abnormality", "")));
		if ($this->Endometrial_abnormality->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Endometrial_abnormality->AdvancedSearch->setSearchOperator(Get("z_Endometrial_abnormality", ""));

		// AFC ON S1
		if (!$this->isAddOrEdit())
			$this->AFC_ON_S1->AdvancedSearch->setSearchValue(Get("x_AFC_ON_S1", Get("AFC_ON_S1", "")));
		if ($this->AFC_ON_S1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AFC_ON_S1->AdvancedSearch->setSearchOperator(Get("z_AFC_ON_S1", ""));

		// TIME OF OPU FROM TRIGGER
		if (!$this->isAddOrEdit())
			$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->setSearchValue(Get("x_TIME_OF_OPU_FROM_TRIGGER", Get("TIME_OF_OPU_FROM_TRIGGER", "")));
		if ($this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->setSearchOperator(Get("z_TIME_OF_OPU_FROM_TRIGGER", ""));

		// SPERM TYPE
		if (!$this->isAddOrEdit())
			$this->SPERM_TYPE->AdvancedSearch->setSearchValue(Get("x_SPERM_TYPE", Get("SPERM_TYPE", "")));
		if ($this->SPERM_TYPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SPERM_TYPE->AdvancedSearch->setSearchOperator(Get("z_SPERM_TYPE", ""));

		// EXPECTED ON TRIGGER DAY
		if (!$this->isAddOrEdit())
			$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->setSearchValue(Get("x_EXPECTED_ON_TRIGGER_DAY", Get("EXPECTED_ON_TRIGGER_DAY", "")));
		if ($this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->setSearchOperator(Get("z_EXPECTED_ON_TRIGGER_DAY", ""));

		// OOCYTES RETRIEVED
		if (!$this->isAddOrEdit())
			$this->OOCYTES_RETRIEVED->AdvancedSearch->setSearchValue(Get("x_OOCYTES_RETRIEVED", Get("OOCYTES_RETRIEVED", "")));
		if ($this->OOCYTES_RETRIEVED->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OOCYTES_RETRIEVED->AdvancedSearch->setSearchOperator(Get("z_OOCYTES_RETRIEVED", ""));

		// TIME OF DENUDATION
		if (!$this->isAddOrEdit())
			$this->TIME_OF_DENUDATION->AdvancedSearch->setSearchValue(Get("x_TIME_OF_DENUDATION", Get("TIME_OF_DENUDATION", "")));
		if ($this->TIME_OF_DENUDATION->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TIME_OF_DENUDATION->AdvancedSearch->setSearchOperator(Get("z_TIME_OF_DENUDATION", ""));

		// M-II
		if (!$this->isAddOrEdit())
			$this->M_II->AdvancedSearch->setSearchValue(Get("x_M_II", Get("M_II", "")));
		if ($this->M_II->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->M_II->AdvancedSearch->setSearchOperator(Get("z_M_II", ""));

		// MI
		if (!$this->isAddOrEdit())
			$this->MI->AdvancedSearch->setSearchValue(Get("x_MI", Get("MI", "")));
		if ($this->MI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MI->AdvancedSearch->setSearchOperator(Get("z_MI", ""));

		// GV
		if (!$this->isAddOrEdit())
			$this->GV->AdvancedSearch->setSearchValue(Get("x_GV", Get("GV", "")));
		if ($this->GV->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GV->AdvancedSearch->setSearchOperator(Get("z_GV", ""));

		// ICSI TIME FORM OPU
		if (!$this->isAddOrEdit())
			$this->ICSI_TIME_FORM_OPU->AdvancedSearch->setSearchValue(Get("x_ICSI_TIME_FORM_OPU", Get("ICSI_TIME_FORM_OPU", "")));
		if ($this->ICSI_TIME_FORM_OPU->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->setSearchOperator(Get("z_ICSI_TIME_FORM_OPU", ""));

		// FERT ( 2 PN )
		if (!$this->isAddOrEdit())
			$this->FERT_28_2_PN_29->AdvancedSearch->setSearchValue(Get("x_FERT_28_2_PN_29", Get("FERT_28_2_PN_29", "")));
		if ($this->FERT_28_2_PN_29->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FERT_28_2_PN_29->AdvancedSearch->setSearchOperator(Get("z_FERT_28_2_PN_29", ""));

		// DEG
		if (!$this->isAddOrEdit())
			$this->DEG->AdvancedSearch->setSearchValue(Get("x_DEG", Get("DEG", "")));
		if ($this->DEG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DEG->AdvancedSearch->setSearchOperator(Get("z_DEG", ""));

		// D3 GRADE A
		if (!$this->isAddOrEdit())
			$this->D3_GRADE_A->AdvancedSearch->setSearchValue(Get("x_D3_GRADE_A", Get("D3_GRADE_A", "")));
		if ($this->D3_GRADE_A->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D3_GRADE_A->AdvancedSearch->setSearchOperator(Get("z_D3_GRADE_A", ""));

		// D3 GRADE B
		if (!$this->isAddOrEdit())
			$this->D3_GRADE_B->AdvancedSearch->setSearchValue(Get("x_D3_GRADE_B", Get("D3_GRADE_B", "")));
		if ($this->D3_GRADE_B->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D3_GRADE_B->AdvancedSearch->setSearchOperator(Get("z_D3_GRADE_B", ""));

		// D3 GRADE C
		if (!$this->isAddOrEdit())
			$this->D3_GRADE_C->AdvancedSearch->setSearchValue(Get("x_D3_GRADE_C", Get("D3_GRADE_C", "")));
		if ($this->D3_GRADE_C->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D3_GRADE_C->AdvancedSearch->setSearchOperator(Get("z_D3_GRADE_C", ""));

		// D3 GRADE D
		if (!$this->isAddOrEdit())
			$this->D3_GRADE_D->AdvancedSearch->setSearchValue(Get("x_D3_GRADE_D", Get("D3_GRADE_D", "")));
		if ($this->D3_GRADE_D->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D3_GRADE_D->AdvancedSearch->setSearchOperator(Get("z_D3_GRADE_D", ""));

		// USABLE ON DAY 3 ET
		if (!$this->isAddOrEdit())
			$this->USABLE_ON_DAY_3_ET->AdvancedSearch->setSearchValue(Get("x_USABLE_ON_DAY_3_ET", Get("USABLE_ON_DAY_3_ET", "")));
		if ($this->USABLE_ON_DAY_3_ET->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->setSearchOperator(Get("z_USABLE_ON_DAY_3_ET", ""));

		// USABLE ON day 3 FREEZING
		if (!$this->isAddOrEdit())
			$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->setSearchValue(Get("x_USABLE_ON_day_3_FREEZING", Get("USABLE_ON_day_3_FREEZING", "")));
		if ($this->USABLE_ON_day_3_FREEZING->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->setSearchOperator(Get("z_USABLE_ON_day_3_FREEZING", ""));

		// D5 GARDE A
		if (!$this->isAddOrEdit())
			$this->D5_GARDE_A->AdvancedSearch->setSearchValue(Get("x_D5_GARDE_A", Get("D5_GARDE_A", "")));
		if ($this->D5_GARDE_A->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D5_GARDE_A->AdvancedSearch->setSearchOperator(Get("z_D5_GARDE_A", ""));

		// D5 GRADE B
		if (!$this->isAddOrEdit())
			$this->D5_GRADE_B->AdvancedSearch->setSearchValue(Get("x_D5_GRADE_B", Get("D5_GRADE_B", "")));
		if ($this->D5_GRADE_B->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D5_GRADE_B->AdvancedSearch->setSearchOperator(Get("z_D5_GRADE_B", ""));

		// D5 GRADE C
		if (!$this->isAddOrEdit())
			$this->D5_GRADE_C->AdvancedSearch->setSearchValue(Get("x_D5_GRADE_C", Get("D5_GRADE_C", "")));
		if ($this->D5_GRADE_C->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D5_GRADE_C->AdvancedSearch->setSearchOperator(Get("z_D5_GRADE_C", ""));

		// D5 GRADE D
		if (!$this->isAddOrEdit())
			$this->D5_GRADE_D->AdvancedSearch->setSearchValue(Get("x_D5_GRADE_D", Get("D5_GRADE_D", "")));
		if ($this->D5_GRADE_D->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D5_GRADE_D->AdvancedSearch->setSearchOperator(Get("z_D5_GRADE_D", ""));

		// USABLE ON D5 ET
		if (!$this->isAddOrEdit())
			$this->USABLE_ON_D5_ET->AdvancedSearch->setSearchValue(Get("x_USABLE_ON_D5_ET", Get("USABLE_ON_D5_ET", "")));
		if ($this->USABLE_ON_D5_ET->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->USABLE_ON_D5_ET->AdvancedSearch->setSearchOperator(Get("z_USABLE_ON_D5_ET", ""));

		// USABLE ON D5 FREEZING
		if (!$this->isAddOrEdit())
			$this->USABLE_ON_D5_FREEZING->AdvancedSearch->setSearchValue(Get("x_USABLE_ON_D5_FREEZING", Get("USABLE_ON_D5_FREEZING", "")));
		if ($this->USABLE_ON_D5_FREEZING->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->setSearchOperator(Get("z_USABLE_ON_D5_FREEZING", ""));

		// D6 GRADE A
		if (!$this->isAddOrEdit())
			$this->D6_GRADE_A->AdvancedSearch->setSearchValue(Get("x_D6_GRADE_A", Get("D6_GRADE_A", "")));
		if ($this->D6_GRADE_A->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_GRADE_A->AdvancedSearch->setSearchOperator(Get("z_D6_GRADE_A", ""));

		// D6 GRADE B
		if (!$this->isAddOrEdit())
			$this->D6_GRADE_B->AdvancedSearch->setSearchValue(Get("x_D6_GRADE_B", Get("D6_GRADE_B", "")));
		if ($this->D6_GRADE_B->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_GRADE_B->AdvancedSearch->setSearchOperator(Get("z_D6_GRADE_B", ""));

		// D6 GRADE C
		if (!$this->isAddOrEdit())
			$this->D6_GRADE_C->AdvancedSearch->setSearchValue(Get("x_D6_GRADE_C", Get("D6_GRADE_C", "")));
		if ($this->D6_GRADE_C->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_GRADE_C->AdvancedSearch->setSearchOperator(Get("z_D6_GRADE_C", ""));

		// D6 GRADE D
		if (!$this->isAddOrEdit())
			$this->D6_GRADE_D->AdvancedSearch->setSearchValue(Get("x_D6_GRADE_D", Get("D6_GRADE_D", "")));
		if ($this->D6_GRADE_D->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_GRADE_D->AdvancedSearch->setSearchOperator(Get("z_D6_GRADE_D", ""));

		// D6 USABLE EMBRYO ET
		if (!$this->isAddOrEdit())
			$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->setSearchValue(Get("x_D6_USABLE_EMBRYO_ET", Get("D6_USABLE_EMBRYO_ET", "")));
		if ($this->D6_USABLE_EMBRYO_ET->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->setSearchOperator(Get("z_D6_USABLE_EMBRYO_ET", ""));

		// D6 USABLE FREEZING
		if (!$this->isAddOrEdit())
			$this->D6_USABLE_FREEZING->AdvancedSearch->setSearchValue(Get("x_D6_USABLE_FREEZING", Get("D6_USABLE_FREEZING", "")));
		if ($this->D6_USABLE_FREEZING->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->D6_USABLE_FREEZING->AdvancedSearch->setSearchOperator(Get("z_D6_USABLE_FREEZING", ""));

		// TOTAL BLAST
		if (!$this->isAddOrEdit())
			$this->TOTAL_BLAST->AdvancedSearch->setSearchValue(Get("x_TOTAL_BLAST", Get("TOTAL_BLAST", "")));
		if ($this->TOTAL_BLAST->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TOTAL_BLAST->AdvancedSearch->setSearchOperator(Get("z_TOTAL_BLAST", ""));

		// PGS
		if (!$this->isAddOrEdit())
			$this->PGS->AdvancedSearch->setSearchValue(Get("x_PGS", Get("PGS", "")));
		if ($this->PGS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PGS->AdvancedSearch->setSearchOperator(Get("z_PGS", ""));

		// REMARKS
		if (!$this->isAddOrEdit())
			$this->REMARKS->AdvancedSearch->setSearchValue(Get("x_REMARKS", Get("REMARKS", "")));
		if ($this->REMARKS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->REMARKS->AdvancedSearch->setSearchOperator(Get("z_REMARKS", ""));

		// PU - D/B
		if (!$this->isAddOrEdit())
			$this->PU___D2FB->AdvancedSearch->setSearchValue(Get("x_PU___D2FB", Get("PU___D2FB", "")));
		if ($this->PU___D2FB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PU___D2FB->AdvancedSearch->setSearchOperator(Get("z_PU___D2FB", ""));

		// ICSI D/B
		if (!$this->isAddOrEdit())
			$this->ICSI_D2FB->AdvancedSearch->setSearchValue(Get("x_ICSI_D2FB", Get("ICSI_D2FB", "")));
		if ($this->ICSI_D2FB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ICSI_D2FB->AdvancedSearch->setSearchOperator(Get("z_ICSI_D2FB", ""));

		// VIT D/B
		if (!$this->isAddOrEdit())
			$this->VIT_D2FB->AdvancedSearch->setSearchValue(Get("x_VIT_D2FB", Get("VIT_D2FB", "")));
		if ($this->VIT_D2FB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->VIT_D2FB->AdvancedSearch->setSearchOperator(Get("z_VIT_D2FB", ""));

		// ET D/B
		if (!$this->isAddOrEdit())
			$this->ET_D2FB->AdvancedSearch->setSearchValue(Get("x_ET_D2FB", Get("ET_D2FB", "")));
		if ($this->ET_D2FB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ET_D2FB->AdvancedSearch->setSearchOperator(Get("z_ET_D2FB", ""));

		// LAB COMMENTS
		if (!$this->isAddOrEdit())
			$this->LAB_COMMENTS->AdvancedSearch->setSearchValue(Get("x_LAB_COMMENTS", Get("LAB_COMMENTS", "")));
		if ($this->LAB_COMMENTS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LAB_COMMENTS->AdvancedSearch->setSearchOperator(Get("z_LAB_COMMENTS", ""));

		// Reason for no FRESH transfer
		if (!$this->isAddOrEdit())
			$this->Reason_for_no_FRESH_transfer->AdvancedSearch->setSearchValue(Get("x_Reason_for_no_FRESH_transfer", Get("Reason_for_no_FRESH_transfer", "")));
		if ($this->Reason_for_no_FRESH_transfer->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->setSearchOperator(Get("z_Reason_for_no_FRESH_transfer", ""));

		// No of embryos transferred Day 3/5, A,B,C
		if (!$this->isAddOrEdit())
			$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->setSearchValue(Get("x_No_of_embryos_transferred_Day_32F52C_A2CB2CC", Get("No_of_embryos_transferred_Day_32F52C_A2CB2CC", "")));
		if ($this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->setSearchOperator(Get("z_No_of_embryos_transferred_Day_32F52C_A2CB2CC", ""));

		// EMBRYOS PENDING
		if (!$this->isAddOrEdit())
			$this->EMBRYOS_PENDING->AdvancedSearch->setSearchValue(Get("x_EMBRYOS_PENDING", Get("EMBRYOS_PENDING", "")));
		if ($this->EMBRYOS_PENDING->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EMBRYOS_PENDING->AdvancedSearch->setSearchOperator(Get("z_EMBRYOS_PENDING", ""));

		// DAY OF TRANSFER
		if (!$this->isAddOrEdit())
			$this->DAY_OF_TRANSFER->AdvancedSearch->setSearchValue(Get("x_DAY_OF_TRANSFER", Get("DAY_OF_TRANSFER", "")));
		if ($this->DAY_OF_TRANSFER->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DAY_OF_TRANSFER->AdvancedSearch->setSearchOperator(Get("z_DAY_OF_TRANSFER", ""));

		// H/D sperm
		if (!$this->isAddOrEdit())
			$this->H2FD_sperm->AdvancedSearch->setSearchValue(Get("x_H2FD_sperm", Get("H2FD_sperm", "")));
		if ($this->H2FD_sperm->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->H2FD_sperm->AdvancedSearch->setSearchOperator(Get("z_H2FD_sperm", ""));

		// Comments
		if (!$this->isAddOrEdit())
			$this->Comments->AdvancedSearch->setSearchValue(Get("x_Comments", Get("Comments", "")));
		if ($this->Comments->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Comments->AdvancedSearch->setSearchOperator(Get("z_Comments", ""));

		// sc progesterone
		if (!$this->isAddOrEdit())
			$this->sc_progesterone->AdvancedSearch->setSearchValue(Get("x_sc_progesterone", Get("sc_progesterone", "")));
		if ($this->sc_progesterone->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->sc_progesterone->AdvancedSearch->setSearchOperator(Get("z_sc_progesterone", ""));

		// Natural micronised 400mg bd + duphaston 10mg bd
		if (!$this->isAddOrEdit())
			$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->setSearchValue(Get("x_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd", Get("Natural_micronised_400mg_bd_2B_duphaston_10mg_bd", "")));
		if ($this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->setSearchOperator(Get("z_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd", ""));

		// CRINONE
		if (!$this->isAddOrEdit())
			$this->CRINONE->AdvancedSearch->setSearchValue(Get("x_CRINONE", Get("CRINONE", "")));
		if ($this->CRINONE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CRINONE->AdvancedSearch->setSearchOperator(Get("z_CRINONE", ""));

		// progynova
		if (!$this->isAddOrEdit())
			$this->progynova->AdvancedSearch->setSearchValue(Get("x_progynova", Get("progynova", "")));
		if ($this->progynova->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->progynova->AdvancedSearch->setSearchOperator(Get("z_progynova", ""));

		// Heparin
		if (!$this->isAddOrEdit())
			$this->Heparin->AdvancedSearch->setSearchValue(Get("x_Heparin", Get("Heparin", "")));
		if ($this->Heparin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Heparin->AdvancedSearch->setSearchOperator(Get("z_Heparin", ""));

		// cabergolin
		if (!$this->isAddOrEdit())
			$this->cabergolin->AdvancedSearch->setSearchValue(Get("x_cabergolin", Get("cabergolin", "")));
		if ($this->cabergolin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->cabergolin->AdvancedSearch->setSearchOperator(Get("z_cabergolin", ""));

		// Antagonist
		if (!$this->isAddOrEdit())
			$this->Antagonist->AdvancedSearch->setSearchValue(Get("x_Antagonist", Get("Antagonist", "")));
		if ($this->Antagonist->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Antagonist->AdvancedSearch->setSearchOperator(Get("z_Antagonist", ""));

		// OHSS
		if (!$this->isAddOrEdit())
			$this->OHSS->AdvancedSearch->setSearchValue(Get("x_OHSS", Get("OHSS", "")));
		if ($this->OHSS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->OHSS->AdvancedSearch->setSearchOperator(Get("z_OHSS", ""));

		// Complications
		if (!$this->isAddOrEdit())
			$this->Complications->AdvancedSearch->setSearchValue(Get("x_Complications", Get("Complications", "")));
		if ($this->Complications->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Complications->AdvancedSearch->setSearchOperator(Get("z_Complications", ""));

		// LP bleeding
		if (!$this->isAddOrEdit())
			$this->LP_bleeding->AdvancedSearch->setSearchValue(Get("x_LP_bleeding", Get("LP_bleeding", "")));
		if ($this->LP_bleeding->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LP_bleeding->AdvancedSearch->setSearchOperator(Get("z_LP_bleeding", ""));

		// ß-hCG
		if (!$this->isAddOrEdit())
			$this->DF_hCG->AdvancedSearch->setSearchValue(Get("x_DF_hCG", Get("DF_hCG", "")));
		if ($this->DF_hCG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DF_hCG->AdvancedSearch->setSearchOperator(Get("z_DF_hCG", ""));

		// Implantation rate
		if (!$this->isAddOrEdit())
			$this->Implantation_rate->AdvancedSearch->setSearchValue(Get("x_Implantation_rate", Get("Implantation_rate", "")));
		if ($this->Implantation_rate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Implantation_rate->AdvancedSearch->setSearchOperator(Get("z_Implantation_rate", ""));

		// Ectopic
		if (!$this->isAddOrEdit())
			$this->Ectopic->AdvancedSearch->setSearchValue(Get("x_Ectopic", Get("Ectopic", "")));
		if ($this->Ectopic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Ectopic->AdvancedSearch->setSearchOperator(Get("z_Ectopic", ""));

		// Type of preg
		if (!$this->isAddOrEdit())
			$this->Type_of_preg->AdvancedSearch->setSearchValue(Get("x_Type_of_preg", Get("Type_of_preg", "")));
		if ($this->Type_of_preg->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Type_of_preg->AdvancedSearch->setSearchOperator(Get("z_Type_of_preg", ""));

		// ANC
		if (!$this->isAddOrEdit())
			$this->ANC->AdvancedSearch->setSearchValue(Get("x_ANC", Get("ANC", "")));
		if ($this->ANC->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANC->AdvancedSearch->setSearchOperator(Get("z_ANC", ""));

		// anomalies
		if (!$this->isAddOrEdit())
			$this->anomalies->AdvancedSearch->setSearchValue(Get("x_anomalies", Get("anomalies", "")));
		if ($this->anomalies->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->anomalies->AdvancedSearch->setSearchOperator(Get("z_anomalies", ""));

		// baby wt
		if (!$this->isAddOrEdit())
			$this->baby_wt->AdvancedSearch->setSearchValue(Get("x_baby_wt", Get("baby_wt", "")));
		if ($this->baby_wt->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->baby_wt->AdvancedSearch->setSearchOperator(Get("z_baby_wt", ""));

		// GA at delivery
		if (!$this->isAddOrEdit())
			$this->GA_at_delivery->AdvancedSearch->setSearchValue(Get("x_GA_at_delivery", Get("GA_at_delivery", "")));
		if ($this->GA_at_delivery->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GA_at_delivery->AdvancedSearch->setSearchOperator(Get("z_GA_at_delivery", ""));

		// Pregnancy outcome
		if (!$this->isAddOrEdit())
			$this->Pregnancy_outcome->AdvancedSearch->setSearchValue(Get("x_Pregnancy_outcome", Get("Pregnancy_outcome", "")));
		if ($this->Pregnancy_outcome->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Pregnancy_outcome->AdvancedSearch->setSearchOperator(Get("z_Pregnancy_outcome", ""));

		// 1st FET
		if (!$this->isAddOrEdit())
			$this->_1st_FET->AdvancedSearch->setSearchValue(Get("x__1st_FET", Get("_1st_FET", "")));
		if ($this->_1st_FET->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->_1st_FET->AdvancedSearch->setSearchOperator(Get("z__1st_FET", ""));

		// AFTER HYSTEROSCOPY
		if (!$this->isAddOrEdit())
			$this->AFTER_HYSTEROSCOPY->AdvancedSearch->setSearchValue(Get("x_AFTER_HYSTEROSCOPY", Get("AFTER_HYSTEROSCOPY", "")));
		if ($this->AFTER_HYSTEROSCOPY->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->setSearchOperator(Get("z_AFTER_HYSTEROSCOPY", ""));

		// AFTER ERA
		if (!$this->isAddOrEdit())
			$this->AFTER_ERA->AdvancedSearch->setSearchValue(Get("x_AFTER_ERA", Get("AFTER_ERA", "")));
		if ($this->AFTER_ERA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AFTER_ERA->AdvancedSearch->setSearchOperator(Get("z_AFTER_ERA", ""));

		// ERA
		if (!$this->isAddOrEdit())
			$this->ERA->AdvancedSearch->setSearchValue(Get("x_ERA", Get("ERA", "")));
		if ($this->ERA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ERA->AdvancedSearch->setSearchOperator(Get("z_ERA", ""));

		// HRT
		if (!$this->isAddOrEdit())
			$this->HRT->AdvancedSearch->setSearchValue(Get("x_HRT", Get("HRT", "")));
		if ($this->HRT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HRT->AdvancedSearch->setSearchOperator(Get("z_HRT", ""));

		// XGRAST/PRP
		if (!$this->isAddOrEdit())
			$this->XGRAST2FPRP->AdvancedSearch->setSearchValue(Get("x_XGRAST2FPRP", Get("XGRAST2FPRP", "")));
		if ($this->XGRAST2FPRP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->XGRAST2FPRP->AdvancedSearch->setSearchOperator(Get("z_XGRAST2FPRP", ""));

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		if (!$this->isAddOrEdit())
			$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->setSearchValue(Get("x_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C", Get("EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C", "")));
		if ($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->setSearchOperator(Get("z_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C", ""));

		// LMWH 40MG
		if (!$this->isAddOrEdit())
			$this->LMWH_40MG->AdvancedSearch->setSearchValue(Get("x_LMWH_40MG", Get("LMWH_40MG", "")));
		if ($this->LMWH_40MG->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LMWH_40MG->AdvancedSearch->setSearchOperator(Get("z_LMWH_40MG", ""));

		// ß-hCG2
		if (!$this->isAddOrEdit())
			$this->DF_hCG2->AdvancedSearch->setSearchValue(Get("x_DF_hCG2", Get("DF_hCG2", "")));
		if ($this->DF_hCG2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DF_hCG2->AdvancedSearch->setSearchOperator(Get("z_DF_hCG2", ""));

		// Implantation rate1
		if (!$this->isAddOrEdit())
			$this->Implantation_rate1->AdvancedSearch->setSearchValue(Get("x_Implantation_rate1", Get("Implantation_rate1", "")));
		if ($this->Implantation_rate1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Implantation_rate1->AdvancedSearch->setSearchOperator(Get("z_Implantation_rate1", ""));

		// Ectopic1
		if (!$this->isAddOrEdit())
			$this->Ectopic1->AdvancedSearch->setSearchValue(Get("x_Ectopic1", Get("Ectopic1", "")));
		if ($this->Ectopic1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Ectopic1->AdvancedSearch->setSearchOperator(Get("z_Ectopic1", ""));

		// Type of pregA
		if (!$this->isAddOrEdit())
			$this->Type_of_pregA->AdvancedSearch->setSearchValue(Get("x_Type_of_pregA", Get("Type_of_pregA", "")));
		if ($this->Type_of_pregA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Type_of_pregA->AdvancedSearch->setSearchOperator(Get("z_Type_of_pregA", ""));

		// ANC1
		if (!$this->isAddOrEdit())
			$this->ANC1->AdvancedSearch->setSearchValue(Get("x_ANC1", Get("ANC1", "")));
		if ($this->ANC1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANC1->AdvancedSearch->setSearchOperator(Get("z_ANC1", ""));

		// anomalies2
		if (!$this->isAddOrEdit())
			$this->anomalies2->AdvancedSearch->setSearchValue(Get("x_anomalies2", Get("anomalies2", "")));
		if ($this->anomalies2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->anomalies2->AdvancedSearch->setSearchOperator(Get("z_anomalies2", ""));

		// baby wt2
		if (!$this->isAddOrEdit())
			$this->baby_wt2->AdvancedSearch->setSearchValue(Get("x_baby_wt2", Get("baby_wt2", "")));
		if ($this->baby_wt2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->baby_wt2->AdvancedSearch->setSearchOperator(Get("z_baby_wt2", ""));

		// GA at delivery1
		if (!$this->isAddOrEdit())
			$this->GA_at_delivery1->AdvancedSearch->setSearchValue(Get("x_GA_at_delivery1", Get("GA_at_delivery1", "")));
		if ($this->GA_at_delivery1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GA_at_delivery1->AdvancedSearch->setSearchOperator(Get("z_GA_at_delivery1", ""));

		// Pregnancy outcome1
		if (!$this->isAddOrEdit())
			$this->Pregnancy_outcome1->AdvancedSearch->setSearchValue(Get("x_Pregnancy_outcome1", Get("Pregnancy_outcome1", "")));
		if ($this->Pregnancy_outcome1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Pregnancy_outcome1->AdvancedSearch->setSearchOperator(Get("z_Pregnancy_outcome1", ""));

		// 2ND FET
		if (!$this->isAddOrEdit())
			$this->_2ND_FET->AdvancedSearch->setSearchValue(Get("x__2ND_FET", Get("_2ND_FET", "")));
		if ($this->_2ND_FET->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->_2ND_FET->AdvancedSearch->setSearchOperator(Get("z__2ND_FET", ""));

		// AFTER HYSTEROSCOPY1
		if (!$this->isAddOrEdit())
			$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->setSearchValue(Get("x_AFTER_HYSTEROSCOPY1", Get("AFTER_HYSTEROSCOPY1", "")));
		if ($this->AFTER_HYSTEROSCOPY1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->setSearchOperator(Get("z_AFTER_HYSTEROSCOPY1", ""));

		// AFTER ERA1
		if (!$this->isAddOrEdit())
			$this->AFTER_ERA1->AdvancedSearch->setSearchValue(Get("x_AFTER_ERA1", Get("AFTER_ERA1", "")));
		if ($this->AFTER_ERA1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AFTER_ERA1->AdvancedSearch->setSearchOperator(Get("z_AFTER_ERA1", ""));

		// ERA1
		if (!$this->isAddOrEdit())
			$this->ERA1->AdvancedSearch->setSearchValue(Get("x_ERA1", Get("ERA1", "")));
		if ($this->ERA1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ERA1->AdvancedSearch->setSearchOperator(Get("z_ERA1", ""));

		// HRT1
		if (!$this->isAddOrEdit())
			$this->HRT1->AdvancedSearch->setSearchValue(Get("x_HRT1", Get("HRT1", "")));
		if ($this->HRT1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HRT1->AdvancedSearch->setSearchOperator(Get("z_HRT1", ""));

		// XGRAST/PRP1
		if (!$this->isAddOrEdit())
			$this->XGRAST2FPRP1->AdvancedSearch->setSearchValue(Get("x_XGRAST2FPRP1", Get("XGRAST2FPRP1", "")));
		if ($this->XGRAST2FPRP1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->XGRAST2FPRP1->AdvancedSearch->setSearchOperator(Get("z_XGRAST2FPRP1", ""));

		// NUMBER OF EMBRYOS
		if (!$this->isAddOrEdit())
			$this->NUMBER_OF_EMBRYOS->AdvancedSearch->setSearchValue(Get("x_NUMBER_OF_EMBRYOS", Get("NUMBER_OF_EMBRYOS", "")));
		if ($this->NUMBER_OF_EMBRYOS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->setSearchOperator(Get("z_NUMBER_OF_EMBRYOS", ""));

		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		if (!$this->isAddOrEdit())
			$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->setSearchValue(Get("x_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C", Get("EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C", "")));
		if ($this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->setSearchOperator(Get("z_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C", ""));

		// INTRALIPID AND BARGLOBIN
		if (!$this->isAddOrEdit())
			$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->setSearchValue(Get("x_INTRALIPID_AND_BARGLOBIN", Get("INTRALIPID_AND_BARGLOBIN", "")));
		if ($this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->setSearchOperator(Get("z_INTRALIPID_AND_BARGLOBIN", ""));

		// LMWH 40MG1
		if (!$this->isAddOrEdit())
			$this->LMWH_40MG1->AdvancedSearch->setSearchValue(Get("x_LMWH_40MG1", Get("LMWH_40MG1", "")));
		if ($this->LMWH_40MG1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LMWH_40MG1->AdvancedSearch->setSearchOperator(Get("z_LMWH_40MG1", ""));

		// ß-hCG1
		if (!$this->isAddOrEdit())
			$this->DF_hCG1->AdvancedSearch->setSearchValue(Get("x_DF_hCG1", Get("DF_hCG1", "")));
		if ($this->DF_hCG1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DF_hCG1->AdvancedSearch->setSearchOperator(Get("z_DF_hCG1", ""));

		// Implantation rate2
		if (!$this->isAddOrEdit())
			$this->Implantation_rate2->AdvancedSearch->setSearchValue(Get("x_Implantation_rate2", Get("Implantation_rate2", "")));
		if ($this->Implantation_rate2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Implantation_rate2->AdvancedSearch->setSearchOperator(Get("z_Implantation_rate2", ""));

		// Ectopic2
		if (!$this->isAddOrEdit())
			$this->Ectopic2->AdvancedSearch->setSearchValue(Get("x_Ectopic2", Get("Ectopic2", "")));
		if ($this->Ectopic2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Ectopic2->AdvancedSearch->setSearchOperator(Get("z_Ectopic2", ""));

		// Type of preg2
		if (!$this->isAddOrEdit())
			$this->Type_of_preg2->AdvancedSearch->setSearchValue(Get("x_Type_of_preg2", Get("Type_of_preg2", "")));
		if ($this->Type_of_preg2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Type_of_preg2->AdvancedSearch->setSearchOperator(Get("z_Type_of_preg2", ""));

		// ANCA
		if (!$this->isAddOrEdit())
			$this->ANCA->AdvancedSearch->setSearchValue(Get("x_ANCA", Get("ANCA", "")));
		if ($this->ANCA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ANCA->AdvancedSearch->setSearchOperator(Get("z_ANCA", ""));

		// anomalies1
		if (!$this->isAddOrEdit())
			$this->anomalies1->AdvancedSearch->setSearchValue(Get("x_anomalies1", Get("anomalies1", "")));
		if ($this->anomalies1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->anomalies1->AdvancedSearch->setSearchOperator(Get("z_anomalies1", ""));

		// baby wt1
		if (!$this->isAddOrEdit())
			$this->baby_wt1->AdvancedSearch->setSearchValue(Get("x_baby_wt1", Get("baby_wt1", "")));
		if ($this->baby_wt1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->baby_wt1->AdvancedSearch->setSearchOperator(Get("z_baby_wt1", ""));

		// GA at delivery2
		if (!$this->isAddOrEdit())
			$this->GA_at_delivery2->AdvancedSearch->setSearchValue(Get("x_GA_at_delivery2", Get("GA_at_delivery2", "")));
		if ($this->GA_at_delivery2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GA_at_delivery2->AdvancedSearch->setSearchOperator(Get("z_GA_at_delivery2", ""));
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
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->Origin->setDbValue($row['Origin']);
		$this->MaleIndications->setDbValue($row['MaleIndications']);
		$this->FemaleIndications->setDbValue($row['FemaleIndications']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
		$this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
		$this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
		$this->RelevantHistory->setDbValue($row['RelevantHistory']);
		$this->IUICycles->setDbValue($row['IUICycles']);
		$this->AMH->setDbValue($row['AMH']);
		$this->FBMI->setDbValue($row['FBMI']);
		$this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
		$this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
		$this->OPUDATE->setDbValue($row['OPUDATE']);
		$this->RFSH1->setDbValue($row['RFSH1']);
		$this->RFSH2->setDbValue($row['RFSH2']);
		$this->RFSH3->setDbValue($row['RFSH3']);
		$this->E21->setDbValue($row['E21']);
		$this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Fweight->setDbValue($row['Fweight']);
		$this->AntiTPO->setDbValue($row['AntiTPO']);
		$this->AntiTG->setDbValue($row['AntiTG']);
		$this->PatientAge->setDbValue($row['PatientAge']);
		$this->PartnerAge->setDbValue($row['PartnerAge']);
		$this->CYCLES->setDbValue($row['CYCLES']);
		$this->MF->setDbValue($row['MF']);
		$this->CauseOfINFERTILITY->setDbValue($row['CauseOfINFERTILITY']);
		$this->SIS->setDbValue($row['SIS']);
		$this->Scratching->setDbValue($row['Scratching']);
		$this->Cannulation->setDbValue($row['Cannulation']);
		$this->MEPRATE->setDbValue($row['MEPRATE']);
		$this->R_OVARY->setDbValue($row['R.OVARY']);
		$this->R_AFC->setDbValue($row['R.AFC']);
		$this->L_OVARY->setDbValue($row['L.OVARY']);
		$this->L_AFC->setDbValue($row['L.AFC']);
		$this->LH1->setDbValue($row['LH1']);
		$this->E2->setDbValue($row['E2']);
		$this->StemCellInstallation->setDbValue($row['StemCellInstallation']);
		$this->DHEAS->setDbValue($row['DHEAS']);
		$this->Mtorr->setDbValue($row['Mtorr']);
		$this->AMH1->setDbValue($row['AMH1']);
		$this->LH->setDbValue($row['LH']);
		$this->BMI28MALE29->setDbValue($row['BMI(MALE)']);
		$this->MaleMedicalConditions->setDbValue($row['MaleMedicalConditions']);
		$this->MaleExamination->setDbValue($row['MaleExamination']);
		$this->SpermConcentration->setDbValue($row['SpermConcentration']);
		$this->SpermMotility28P26NP29->setDbValue($row['SpermMotility(P&NP)']);
		$this->SpermMorphology->setDbValue($row['SpermMorphology']);
		$this->SpermRetrival->setDbValue($row['SpermRetrival']);
		$this->M_Testosterone->setDbValue($row['M.Testosterone']);
		$this->DFI->setDbValue($row['DFI']);
		$this->PreRX->setDbValue($row['PreRX']);
		$this->CC_100->setDbValue($row['CC 100']);
		$this->RFSH1A->setDbValue($row['RFSH1A']);
		$this->HMG1->setDbValue($row['HMG1']);
		$this->RLH->setDbValue($row['RLH']);
		$this->HMG_HP->setDbValue($row['HMG_HP']);
		$this->day_of_HMG->setDbValue($row['day_of_HMG']);
		$this->Reason_for_HMG->setDbValue($row['Reason_for_HMG']);
		$this->RLH_day->setDbValue($row['RLH_day']);
		$this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
		$this->Any_change_inbetween_28_Dose_added_2C_day29->setDbValue($row['Any change inbetween ( Dose added , day)']);
		$this->day_of_Anta->setDbValue($row['day of Anta']);
		$this->R_FSH_TD->setDbValue($row['R FSH TD']);
		$this->R_FSH_2B_HMG_TD->setDbValue($row['R FSH + HMG TD']);
		$this->R_FSH_2B_R_LH_TD->setDbValue($row['R FSH + R LH TD']);
		$this->HMG_TD->setDbValue($row['HMG TD']);
		$this->LH_TD->setDbValue($row['LH TD']);
		$this->D1_LH->setDbValue($row['D1 LH']);
		$this->D1_E2->setDbValue($row['D1 E2']);
		$this->Trigger_day_E2->setDbValue($row['Trigger day E2']);
		$this->Trigger_day_P4->setDbValue($row['Trigger day P4']);
		$this->Trigger_day_LH->setDbValue($row['Trigger day LH']);
		$this->VIT_D->setDbValue($row['VIT-D']);
		$this->TRIGGERR->setDbValue($row['TRIGGERR']);
		$this->BHCG_BEFORE_RETRIEVAL->setDbValue($row['BHCG BEFORE RETRIEVAL']);
		$this->LH__12_HRS->setDbValue($row['LH -12 HRS']);
		$this->P4__12_HRS->setDbValue($row['P4 -12 HRS']);
		$this->ET_on_hCG_day->setDbValue($row['ET on hCG day']);
		$this->ET_doppler->setDbValue($row['ET doppler']);
		$this->VI2FFI2FVFI->setDbValue($row['VI/FI/VFI']);
		$this->Endometrial_abnormality->setDbValue($row['Endometrial abnormality']);
		$this->AFC_ON_S1->setDbValue($row['AFC ON S1']);
		$this->TIME_OF_OPU_FROM_TRIGGER->setDbValue($row['TIME OF OPU FROM TRIGGER']);
		$this->SPERM_TYPE->setDbValue($row['SPERM TYPE']);
		$this->EXPECTED_ON_TRIGGER_DAY->setDbValue($row['EXPECTED ON TRIGGER DAY']);
		$this->OOCYTES_RETRIEVED->setDbValue($row['OOCYTES RETRIEVED']);
		$this->TIME_OF_DENUDATION->setDbValue($row['TIME OF DENUDATION']);
		$this->M_II->setDbValue($row['M-II']);
		$this->MI->setDbValue($row['MI']);
		$this->GV->setDbValue($row['GV']);
		$this->ICSI_TIME_FORM_OPU->setDbValue($row['ICSI TIME FORM OPU']);
		$this->FERT_28_2_PN_29->setDbValue($row['FERT ( 2 PN )']);
		$this->DEG->setDbValue($row['DEG']);
		$this->D3_GRADE_A->setDbValue($row['D3 GRADE A']);
		$this->D3_GRADE_B->setDbValue($row['D3 GRADE B']);
		$this->D3_GRADE_C->setDbValue($row['D3 GRADE C']);
		$this->D3_GRADE_D->setDbValue($row['D3 GRADE D']);
		$this->USABLE_ON_DAY_3_ET->setDbValue($row['USABLE ON DAY 3 ET']);
		$this->USABLE_ON_day_3_FREEZING->setDbValue($row['USABLE ON day 3 FREEZING']);
		$this->D5_GARDE_A->setDbValue($row['D5 GARDE A']);
		$this->D5_GRADE_B->setDbValue($row['D5 GRADE B']);
		$this->D5_GRADE_C->setDbValue($row['D5 GRADE C']);
		$this->D5_GRADE_D->setDbValue($row['D5 GRADE D']);
		$this->USABLE_ON_D5_ET->setDbValue($row['USABLE ON D5 ET']);
		$this->USABLE_ON_D5_FREEZING->setDbValue($row['USABLE ON D5 FREEZING']);
		$this->D6_GRADE_A->setDbValue($row['D6 GRADE A']);
		$this->D6_GRADE_B->setDbValue($row['D6 GRADE B']);
		$this->D6_GRADE_C->setDbValue($row['D6 GRADE C']);
		$this->D6_GRADE_D->setDbValue($row['D6 GRADE D']);
		$this->D6_USABLE_EMBRYO_ET->setDbValue($row['D6 USABLE EMBRYO ET']);
		$this->D6_USABLE_FREEZING->setDbValue($row['D6 USABLE FREEZING']);
		$this->TOTAL_BLAST->setDbValue($row['TOTAL BLAST']);
		$this->PGS->setDbValue($row['PGS']);
		$this->REMARKS->setDbValue($row['REMARKS']);
		$this->PU___D2FB->setDbValue($row['PU - D/B']);
		$this->ICSI_D2FB->setDbValue($row['ICSI D/B']);
		$this->VIT_D2FB->setDbValue($row['VIT D/B']);
		$this->ET_D2FB->setDbValue($row['ET D/B']);
		$this->LAB_COMMENTS->setDbValue($row['LAB COMMENTS']);
		$this->Reason_for_no_FRESH_transfer->setDbValue($row['Reason for no FRESH transfer']);
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->setDbValue($row['No of embryos transferred Day 3/5, A,B,C']);
		$this->EMBRYOS_PENDING->setDbValue($row['EMBRYOS PENDING']);
		$this->DAY_OF_TRANSFER->setDbValue($row['DAY OF TRANSFER']);
		$this->H2FD_sperm->setDbValue($row['H/D sperm']);
		$this->Comments->setDbValue($row['Comments']);
		$this->sc_progesterone->setDbValue($row['sc progesterone']);
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->setDbValue($row['Natural micronised 400mg bd + duphaston 10mg bd']);
		$this->CRINONE->setDbValue($row['CRINONE']);
		$this->progynova->setDbValue($row['progynova']);
		$this->Heparin->setDbValue($row['Heparin']);
		$this->cabergolin->setDbValue($row['cabergolin']);
		$this->Antagonist->setDbValue($row['Antagonist']);
		$this->OHSS->setDbValue($row['OHSS']);
		$this->Complications->setDbValue($row['Complications']);
		$this->LP_bleeding->setDbValue($row['LP bleeding']);
		$this->DF_hCG->setDbValue($row['ß-hCG']);
		$this->Implantation_rate->setDbValue($row['Implantation rate']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Type_of_preg->setDbValue($row['Type of preg']);
		$this->ANC->setDbValue($row['ANC']);
		$this->anomalies->setDbValue($row['anomalies']);
		$this->baby_wt->setDbValue($row['baby wt']);
		$this->GA_at_delivery->setDbValue($row['GA at delivery']);
		$this->Pregnancy_outcome->setDbValue($row['Pregnancy outcome']);
		$this->_1st_FET->setDbValue($row['1st FET']);
		$this->AFTER_HYSTEROSCOPY->setDbValue($row['AFTER HYSTEROSCOPY']);
		$this->AFTER_ERA->setDbValue($row['AFTER ERA']);
		$this->ERA->setDbValue($row['ERA']);
		$this->HRT->setDbValue($row['HRT']);
		$this->XGRAST2FPRP->setDbValue($row['XGRAST/PRP']);
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->setDbValue($row['EMBRYO DETAILS DAY 3/ 5, A, B, C']);
		$this->LMWH_40MG->setDbValue($row['LMWH 40MG']);
		$this->DF_hCG2->setDbValue($row['ß-hCG2']);
		$this->Implantation_rate1->setDbValue($row['Implantation rate1']);
		$this->Ectopic1->setDbValue($row['Ectopic1']);
		$this->Type_of_pregA->setDbValue($row['Type of pregA']);
		$this->ANC1->setDbValue($row['ANC1']);
		$this->anomalies2->setDbValue($row['anomalies2']);
		$this->baby_wt2->setDbValue($row['baby wt2']);
		$this->GA_at_delivery1->setDbValue($row['GA at delivery1']);
		$this->Pregnancy_outcome1->setDbValue($row['Pregnancy outcome1']);
		$this->_2ND_FET->setDbValue($row['2ND FET']);
		$this->AFTER_HYSTEROSCOPY1->setDbValue($row['AFTER HYSTEROSCOPY1']);
		$this->AFTER_ERA1->setDbValue($row['AFTER ERA1']);
		$this->ERA1->setDbValue($row['ERA1']);
		$this->HRT1->setDbValue($row['HRT1']);
		$this->XGRAST2FPRP1->setDbValue($row['XGRAST/PRP1']);
		$this->NUMBER_OF_EMBRYOS->setDbValue($row['NUMBER OF EMBRYOS']);
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->setDbValue($row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C']);
		$this->INTRALIPID_AND_BARGLOBIN->setDbValue($row['INTRALIPID AND BARGLOBIN']);
		$this->LMWH_40MG1->setDbValue($row['LMWH 40MG1']);
		$this->DF_hCG1->setDbValue($row['ß-hCG1']);
		$this->Implantation_rate2->setDbValue($row['Implantation rate2']);
		$this->Ectopic2->setDbValue($row['Ectopic2']);
		$this->Type_of_preg2->setDbValue($row['Type of preg2']);
		$this->ANCA->setDbValue($row['ANCA']);
		$this->anomalies1->setDbValue($row['anomalies1']);
		$this->baby_wt1->setDbValue($row['baby wt1']);
		$this->GA_at_delivery2->setDbValue($row['GA at delivery2']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Treatment'] = NULL;
		$row['Origin'] = NULL;
		$row['MaleIndications'] = NULL;
		$row['FemaleIndications'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['A4ICSICycle'] = NULL;
		$row['TotalICSICycle'] = NULL;
		$row['TypeOfInfertility'] = NULL;
		$row['RelevantHistory'] = NULL;
		$row['IUICycles'] = NULL;
		$row['AMH'] = NULL;
		$row['FBMI'] = NULL;
		$row['ANTAGONISTSTARTDAY'] = NULL;
		$row['OvarianSurgery'] = NULL;
		$row['OPUDATE'] = NULL;
		$row['RFSH1'] = NULL;
		$row['RFSH2'] = NULL;
		$row['RFSH3'] = NULL;
		$row['E21'] = NULL;
		$row['Hysteroscopy'] = NULL;
		$row['HospID'] = NULL;
		$row['Fweight'] = NULL;
		$row['AntiTPO'] = NULL;
		$row['AntiTG'] = NULL;
		$row['PatientAge'] = NULL;
		$row['PartnerAge'] = NULL;
		$row['CYCLES'] = NULL;
		$row['MF'] = NULL;
		$row['CauseOfINFERTILITY'] = NULL;
		$row['SIS'] = NULL;
		$row['Scratching'] = NULL;
		$row['Cannulation'] = NULL;
		$row['MEPRATE'] = NULL;
		$row['R.OVARY'] = NULL;
		$row['R.AFC'] = NULL;
		$row['L.OVARY'] = NULL;
		$row['L.AFC'] = NULL;
		$row['LH1'] = NULL;
		$row['E2'] = NULL;
		$row['StemCellInstallation'] = NULL;
		$row['DHEAS'] = NULL;
		$row['Mtorr'] = NULL;
		$row['AMH1'] = NULL;
		$row['LH'] = NULL;
		$row['BMI(MALE)'] = NULL;
		$row['MaleMedicalConditions'] = NULL;
		$row['MaleExamination'] = NULL;
		$row['SpermConcentration'] = NULL;
		$row['SpermMotility(P&NP)'] = NULL;
		$row['SpermMorphology'] = NULL;
		$row['SpermRetrival'] = NULL;
		$row['M.Testosterone'] = NULL;
		$row['DFI'] = NULL;
		$row['PreRX'] = NULL;
		$row['CC 100'] = NULL;
		$row['RFSH1A'] = NULL;
		$row['HMG1'] = NULL;
		$row['RLH'] = NULL;
		$row['HMG_HP'] = NULL;
		$row['day_of_HMG'] = NULL;
		$row['Reason_for_HMG'] = NULL;
		$row['RLH_day'] = NULL;
		$row['DAYSOFSTIMULATION'] = NULL;
		$row['Any change inbetween ( Dose added , day)'] = NULL;
		$row['day of Anta'] = NULL;
		$row['R FSH TD'] = NULL;
		$row['R FSH + HMG TD'] = NULL;
		$row['R FSH + R LH TD'] = NULL;
		$row['HMG TD'] = NULL;
		$row['LH TD'] = NULL;
		$row['D1 LH'] = NULL;
		$row['D1 E2'] = NULL;
		$row['Trigger day E2'] = NULL;
		$row['Trigger day P4'] = NULL;
		$row['Trigger day LH'] = NULL;
		$row['VIT-D'] = NULL;
		$row['TRIGGERR'] = NULL;
		$row['BHCG BEFORE RETRIEVAL'] = NULL;
		$row['LH -12 HRS'] = NULL;
		$row['P4 -12 HRS'] = NULL;
		$row['ET on hCG day'] = NULL;
		$row['ET doppler'] = NULL;
		$row['VI/FI/VFI'] = NULL;
		$row['Endometrial abnormality'] = NULL;
		$row['AFC ON S1'] = NULL;
		$row['TIME OF OPU FROM TRIGGER'] = NULL;
		$row['SPERM TYPE'] = NULL;
		$row['EXPECTED ON TRIGGER DAY'] = NULL;
		$row['OOCYTES RETRIEVED'] = NULL;
		$row['TIME OF DENUDATION'] = NULL;
		$row['M-II'] = NULL;
		$row['MI'] = NULL;
		$row['GV'] = NULL;
		$row['ICSI TIME FORM OPU'] = NULL;
		$row['FERT ( 2 PN )'] = NULL;
		$row['DEG'] = NULL;
		$row['D3 GRADE A'] = NULL;
		$row['D3 GRADE B'] = NULL;
		$row['D3 GRADE C'] = NULL;
		$row['D3 GRADE D'] = NULL;
		$row['USABLE ON DAY 3 ET'] = NULL;
		$row['USABLE ON day 3 FREEZING'] = NULL;
		$row['D5 GARDE A'] = NULL;
		$row['D5 GRADE B'] = NULL;
		$row['D5 GRADE C'] = NULL;
		$row['D5 GRADE D'] = NULL;
		$row['USABLE ON D5 ET'] = NULL;
		$row['USABLE ON D5 FREEZING'] = NULL;
		$row['D6 GRADE A'] = NULL;
		$row['D6 GRADE B'] = NULL;
		$row['D6 GRADE C'] = NULL;
		$row['D6 GRADE D'] = NULL;
		$row['D6 USABLE EMBRYO ET'] = NULL;
		$row['D6 USABLE FREEZING'] = NULL;
		$row['TOTAL BLAST'] = NULL;
		$row['PGS'] = NULL;
		$row['REMARKS'] = NULL;
		$row['PU - D/B'] = NULL;
		$row['ICSI D/B'] = NULL;
		$row['VIT D/B'] = NULL;
		$row['ET D/B'] = NULL;
		$row['LAB COMMENTS'] = NULL;
		$row['Reason for no FRESH transfer'] = NULL;
		$row['No of embryos transferred Day 3/5, A,B,C'] = NULL;
		$row['EMBRYOS PENDING'] = NULL;
		$row['DAY OF TRANSFER'] = NULL;
		$row['H/D sperm'] = NULL;
		$row['Comments'] = NULL;
		$row['sc progesterone'] = NULL;
		$row['Natural micronised 400mg bd + duphaston 10mg bd'] = NULL;
		$row['CRINONE'] = NULL;
		$row['progynova'] = NULL;
		$row['Heparin'] = NULL;
		$row['cabergolin'] = NULL;
		$row['Antagonist'] = NULL;
		$row['OHSS'] = NULL;
		$row['Complications'] = NULL;
		$row['LP bleeding'] = NULL;
		$row['ß-hCG'] = NULL;
		$row['Implantation rate'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Type of preg'] = NULL;
		$row['ANC'] = NULL;
		$row['anomalies'] = NULL;
		$row['baby wt'] = NULL;
		$row['GA at delivery'] = NULL;
		$row['Pregnancy outcome'] = NULL;
		$row['1st FET'] = NULL;
		$row['AFTER HYSTEROSCOPY'] = NULL;
		$row['AFTER ERA'] = NULL;
		$row['ERA'] = NULL;
		$row['HRT'] = NULL;
		$row['XGRAST/PRP'] = NULL;
		$row['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = NULL;
		$row['LMWH 40MG'] = NULL;
		$row['ß-hCG2'] = NULL;
		$row['Implantation rate1'] = NULL;
		$row['Ectopic1'] = NULL;
		$row['Type of pregA'] = NULL;
		$row['ANC1'] = NULL;
		$row['anomalies2'] = NULL;
		$row['baby wt2'] = NULL;
		$row['GA at delivery1'] = NULL;
		$row['Pregnancy outcome1'] = NULL;
		$row['2ND FET'] = NULL;
		$row['AFTER HYSTEROSCOPY1'] = NULL;
		$row['AFTER ERA1'] = NULL;
		$row['ERA1'] = NULL;
		$row['HRT1'] = NULL;
		$row['XGRAST/PRP1'] = NULL;
		$row['NUMBER OF EMBRYOS'] = NULL;
		$row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'] = NULL;
		$row['INTRALIPID AND BARGLOBIN'] = NULL;
		$row['LMWH 40MG1'] = NULL;
		$row['ß-hCG1'] = NULL;
		$row['Implantation rate2'] = NULL;
		$row['Ectopic2'] = NULL;
		$row['Type of preg2'] = NULL;
		$row['ANCA'] = NULL;
		$row['anomalies1'] = NULL;
		$row['baby wt1'] = NULL;
		$row['GA at delivery2'] = NULL;
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
		// RIDNO
		// Treatment
		// Origin
		// MaleIndications
		// FemaleIndications
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// A4ICSICycle
		// TotalICSICycle
		// TypeOfInfertility
		// RelevantHistory
		// IUICycles
		// AMH
		// FBMI
		// ANTAGONISTSTARTDAY
		// OvarianSurgery
		// OPUDATE
		// RFSH1
		// RFSH2
		// RFSH3
		// E21
		// Hysteroscopy
		// HospID
		// Fweight
		// AntiTPO
		// AntiTG
		// PatientAge
		// PartnerAge
		// CYCLES
		// MF
		// CauseOfINFERTILITY
		// SIS
		// Scratching
		// Cannulation
		// MEPRATE
		// R.OVARY
		// R.AFC
		// L.OVARY
		// L.AFC
		// LH1
		// E2
		// StemCellInstallation
		// DHEAS
		// Mtorr
		// AMH1
		// LH
		// BMI(MALE)
		// MaleMedicalConditions
		// MaleExamination
		// SpermConcentration
		// SpermMotility(P&NP)
		// SpermMorphology
		// SpermRetrival
		// M.Testosterone
		// DFI
		// PreRX
		// CC 100
		// RFSH1A
		// HMG1
		// RLH
		// HMG_HP
		// day_of_HMG
		// Reason_for_HMG
		// RLH_day
		// DAYSOFSTIMULATION
		// Any change inbetween ( Dose added , day)
		// day of Anta
		// R FSH TD
		// R FSH + HMG TD
		// R FSH + R LH TD
		// HMG TD
		// LH TD
		// D1 LH
		// D1 E2
		// Trigger day E2
		// Trigger day P4
		// Trigger day LH
		// VIT-D
		// TRIGGERR
		// BHCG BEFORE RETRIEVAL
		// LH -12 HRS
		// P4 -12 HRS
		// ET on hCG day
		// ET doppler
		// VI/FI/VFI
		// Endometrial abnormality
		// AFC ON S1
		// TIME OF OPU FROM TRIGGER
		// SPERM TYPE
		// EXPECTED ON TRIGGER DAY
		// OOCYTES RETRIEVED
		// TIME OF DENUDATION
		// M-II
		// MI
		// GV
		// ICSI TIME FORM OPU
		// FERT ( 2 PN )
		// DEG
		// D3 GRADE A
		// D3 GRADE B
		// D3 GRADE C
		// D3 GRADE D
		// USABLE ON DAY 3 ET
		// USABLE ON day 3 FREEZING
		// D5 GARDE A
		// D5 GRADE B
		// D5 GRADE C
		// D5 GRADE D
		// USABLE ON D5 ET
		// USABLE ON D5 FREEZING
		// D6 GRADE A
		// D6 GRADE B
		// D6 GRADE C
		// D6 GRADE D
		// D6 USABLE EMBRYO ET
		// D6 USABLE FREEZING
		// TOTAL BLAST
		// PGS
		// REMARKS
		// PU - D/B
		// ICSI D/B
		// VIT D/B
		// ET D/B
		// LAB COMMENTS
		// Reason for no FRESH transfer
		// No of embryos transferred Day 3/5, A,B,C
		// EMBRYOS PENDING
		// DAY OF TRANSFER
		// H/D sperm
		// Comments
		// sc progesterone
		// Natural micronised 400mg bd + duphaston 10mg bd
		// CRINONE
		// progynova
		// Heparin
		// cabergolin
		// Antagonist
		// OHSS
		// Complications
		// LP bleeding
		// ß-hCG
		// Implantation rate
		// Ectopic
		// Type of preg
		// ANC
		// anomalies
		// baby wt
		// GA at delivery
		// Pregnancy outcome
		// 1st FET
		// AFTER HYSTEROSCOPY
		// AFTER ERA
		// ERA
		// HRT
		// XGRAST/PRP
		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		// LMWH 40MG
		// ß-hCG2
		// Implantation rate1
		// Ectopic1
		// Type of pregA
		// ANC1
		// anomalies2
		// baby wt2
		// GA at delivery1
		// Pregnancy outcome1
		// 2ND FET
		// AFTER HYSTEROSCOPY1
		// AFTER ERA1
		// ERA1
		// HRT1
		// XGRAST/PRP1
		// NUMBER OF EMBRYOS
		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		// INTRALIPID AND BARGLOBIN
		// LMWH 40MG1
		// ß-hCG1
		// Implantation rate2
		// Ectopic2
		// Type of preg2
		// ANCA
		// anomalies1
		// baby wt1
		// GA at delivery2

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// Treatment
			$this->Treatment->ViewValue = $this->Treatment->CurrentValue;
			$this->Treatment->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MaleIndications
			$this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			$this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
			$this->FemaleIndications->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// A4ICSICycle
			$this->A4ICSICycle->ViewValue = $this->A4ICSICycle->CurrentValue;
			$this->A4ICSICycle->ViewCustomAttributes = "";

			// TotalICSICycle
			$this->TotalICSICycle->ViewValue = $this->TotalICSICycle->CurrentValue;
			$this->TotalICSICycle->ViewCustomAttributes = "";

			// TypeOfInfertility
			$this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->CurrentValue;
			$this->TypeOfInfertility->ViewCustomAttributes = "";

			// RelevantHistory
			$this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
			$this->RelevantHistory->ViewCustomAttributes = "";

			// IUICycles
			$this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
			$this->IUICycles->ViewCustomAttributes = "";

			// AMH
			$this->AMH->ViewValue = $this->AMH->CurrentValue;
			$this->AMH->ViewCustomAttributes = "";

			// FBMI
			$this->FBMI->ViewValue = $this->FBMI->CurrentValue;
			$this->FBMI->ViewCustomAttributes = "";

			// ANTAGONISTSTARTDAY
			$this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
			$this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

			// OvarianSurgery
			$this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
			$this->OvarianSurgery->ViewCustomAttributes = "";

			// OPUDATE
			$this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
			$this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
			$this->OPUDATE->ViewCustomAttributes = "";

			// RFSH1
			$this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
			$this->RFSH1->ViewCustomAttributes = "";

			// RFSH2
			$this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
			$this->RFSH2->ViewCustomAttributes = "";

			// RFSH3
			$this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
			$this->RFSH3->ViewCustomAttributes = "";

			// E21
			$this->E21->ViewValue = $this->E21->CurrentValue;
			$this->E21->ViewCustomAttributes = "";

			// Hysteroscopy
			$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Fweight
			$this->Fweight->ViewValue = $this->Fweight->CurrentValue;
			$this->Fweight->ViewCustomAttributes = "";

			// AntiTPO
			$this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
			$this->AntiTPO->ViewCustomAttributes = "";

			// AntiTG
			$this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
			$this->AntiTG->ViewCustomAttributes = "";

			// PatientAge
			$this->PatientAge->ViewValue = $this->PatientAge->CurrentValue;
			$this->PatientAge->ViewCustomAttributes = "";

			// PartnerAge
			$this->PartnerAge->ViewValue = $this->PartnerAge->CurrentValue;
			$this->PartnerAge->ViewCustomAttributes = "";

			// R.OVARY
			$this->R_OVARY->ViewValue = $this->R_OVARY->CurrentValue;
			$this->R_OVARY->ViewCustomAttributes = "";

			// R.AFC
			$this->R_AFC->ViewValue = $this->R_AFC->CurrentValue;
			$this->R_AFC->ViewCustomAttributes = "";

			// L.OVARY
			$this->L_OVARY->ViewValue = $this->L_OVARY->CurrentValue;
			$this->L_OVARY->ViewCustomAttributes = "";

			// L.AFC
			$this->L_AFC->ViewValue = $this->L_AFC->CurrentValue;
			$this->L_AFC->ViewCustomAttributes = "";

			// E2
			$this->E2->ViewValue = $this->E2->CurrentValue;
			$this->E2->ViewCustomAttributes = "";

			// AMH1
			$this->AMH1->ViewValue = $this->AMH1->CurrentValue;
			$this->AMH1->ViewCustomAttributes = "";

			// BMI(MALE)
			$this->BMI28MALE29->ViewValue = $this->BMI28MALE29->CurrentValue;
			$this->BMI28MALE29->ViewCustomAttributes = "";

			// MaleMedicalConditions
			$this->MaleMedicalConditions->ViewValue = $this->MaleMedicalConditions->CurrentValue;
			$this->MaleMedicalConditions->ViewCustomAttributes = "";

			// CC 100
			$this->CC_100->ViewValue = $this->CC_100->CurrentValue;
			$this->CC_100->ViewCustomAttributes = "";

			// RFSH1A
			$this->RFSH1A->ViewValue = $this->RFSH1A->CurrentValue;
			$this->RFSH1A->ViewCustomAttributes = "";

			// HMG1
			$this->HMG1->ViewValue = $this->HMG1->CurrentValue;
			$this->HMG1->ViewCustomAttributes = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
			$this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

			// TRIGGERR
			$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
			$this->TRIGGERR->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";
			$this->MaleIndications->TooltipValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
			$this->FemaleIndications->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// A4ICSICycle
			$this->A4ICSICycle->LinkCustomAttributes = "";
			$this->A4ICSICycle->HrefValue = "";
			$this->A4ICSICycle->TooltipValue = "";

			// TotalICSICycle
			$this->TotalICSICycle->LinkCustomAttributes = "";
			$this->TotalICSICycle->HrefValue = "";
			$this->TotalICSICycle->TooltipValue = "";

			// TypeOfInfertility
			$this->TypeOfInfertility->LinkCustomAttributes = "";
			$this->TypeOfInfertility->HrefValue = "";
			$this->TypeOfInfertility->TooltipValue = "";

			// RelevantHistory
			$this->RelevantHistory->LinkCustomAttributes = "";
			$this->RelevantHistory->HrefValue = "";
			$this->RelevantHistory->TooltipValue = "";

			// IUICycles
			$this->IUICycles->LinkCustomAttributes = "";
			$this->IUICycles->HrefValue = "";
			$this->IUICycles->TooltipValue = "";

			// AMH
			$this->AMH->LinkCustomAttributes = "";
			$this->AMH->HrefValue = "";
			$this->AMH->TooltipValue = "";

			// FBMI
			$this->FBMI->LinkCustomAttributes = "";
			$this->FBMI->HrefValue = "";
			$this->FBMI->TooltipValue = "";

			// ANTAGONISTSTARTDAY
			$this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
			$this->ANTAGONISTSTARTDAY->HrefValue = "";
			$this->ANTAGONISTSTARTDAY->TooltipValue = "";

			// OvarianSurgery
			$this->OvarianSurgery->LinkCustomAttributes = "";
			$this->OvarianSurgery->HrefValue = "";
			$this->OvarianSurgery->TooltipValue = "";

			// OPUDATE
			$this->OPUDATE->LinkCustomAttributes = "";
			$this->OPUDATE->HrefValue = "";
			$this->OPUDATE->TooltipValue = "";

			// RFSH1
			$this->RFSH1->LinkCustomAttributes = "";
			$this->RFSH1->HrefValue = "";
			$this->RFSH1->TooltipValue = "";

			// RFSH2
			$this->RFSH2->LinkCustomAttributes = "";
			$this->RFSH2->HrefValue = "";
			$this->RFSH2->TooltipValue = "";

			// RFSH3
			$this->RFSH3->LinkCustomAttributes = "";
			$this->RFSH3->HrefValue = "";
			$this->RFSH3->TooltipValue = "";

			// E21
			$this->E21->LinkCustomAttributes = "";
			$this->E21->HrefValue = "";
			$this->E21->TooltipValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";
			$this->Hysteroscopy->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Fweight
			$this->Fweight->LinkCustomAttributes = "";
			$this->Fweight->HrefValue = "";
			$this->Fweight->TooltipValue = "";

			// AntiTPO
			$this->AntiTPO->LinkCustomAttributes = "";
			$this->AntiTPO->HrefValue = "";
			$this->AntiTPO->TooltipValue = "";

			// AntiTG
			$this->AntiTG->LinkCustomAttributes = "";
			$this->AntiTG->HrefValue = "";
			$this->AntiTG->TooltipValue = "";

			// PatientAge
			$this->PatientAge->LinkCustomAttributes = "";
			$this->PatientAge->HrefValue = "";
			$this->PatientAge->TooltipValue = "";

			// PartnerAge
			$this->PartnerAge->LinkCustomAttributes = "";
			$this->PartnerAge->HrefValue = "";
			$this->PartnerAge->TooltipValue = "";

			// R.OVARY
			$this->R_OVARY->LinkCustomAttributes = "";
			$this->R_OVARY->HrefValue = "";
			$this->R_OVARY->TooltipValue = "";

			// R.AFC
			$this->R_AFC->LinkCustomAttributes = "";
			$this->R_AFC->HrefValue = "";
			$this->R_AFC->TooltipValue = "";

			// L.OVARY
			$this->L_OVARY->LinkCustomAttributes = "";
			$this->L_OVARY->HrefValue = "";
			$this->L_OVARY->TooltipValue = "";

			// L.AFC
			$this->L_AFC->LinkCustomAttributes = "";
			$this->L_AFC->HrefValue = "";
			$this->L_AFC->TooltipValue = "";

			// E2
			$this->E2->LinkCustomAttributes = "";
			$this->E2->HrefValue = "";
			$this->E2->TooltipValue = "";

			// AMH1
			$this->AMH1->LinkCustomAttributes = "";
			$this->AMH1->HrefValue = "";
			$this->AMH1->TooltipValue = "";

			// BMI(MALE)
			$this->BMI28MALE29->LinkCustomAttributes = "";
			$this->BMI28MALE29->HrefValue = "";
			$this->BMI28MALE29->TooltipValue = "";

			// MaleMedicalConditions
			$this->MaleMedicalConditions->LinkCustomAttributes = "";
			$this->MaleMedicalConditions->HrefValue = "";
			$this->MaleMedicalConditions->TooltipValue = "";

			// CC 100
			$this->CC_100->LinkCustomAttributes = "";
			$this->CC_100->HrefValue = "";
			$this->CC_100->TooltipValue = "";

			// RFSH1A
			$this->RFSH1A->LinkCustomAttributes = "";
			$this->RFSH1A->HrefValue = "";
			$this->RFSH1A->TooltipValue = "";

			// HMG1
			$this->HMG1->LinkCustomAttributes = "";
			$this->HMG1->HrefValue = "";
			$this->HMG1->TooltipValue = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
			$this->DAYSOFSTIMULATION->HrefValue = "";
			$this->DAYSOFSTIMULATION->TooltipValue = "";

			// TRIGGERR
			$this->TRIGGERR->LinkCustomAttributes = "";
			$this->TRIGGERR->HrefValue = "";
			$this->TRIGGERR->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Treatment->AdvancedSearch->SearchValue = HtmlDecode($this->Treatment->AdvancedSearch->SearchValue);
			$this->Treatment->EditValue = HtmlEncode($this->Treatment->AdvancedSearch->SearchValue);
			$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Origin->AdvancedSearch->SearchValue = HtmlDecode($this->Origin->AdvancedSearch->SearchValue);
			$this->Origin->EditValue = HtmlEncode($this->Origin->AdvancedSearch->SearchValue);
			$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

			// MaleIndications
			$this->MaleIndications->EditAttrs["class"] = "form-control";
			$this->MaleIndications->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MaleIndications->AdvancedSearch->SearchValue = HtmlDecode($this->MaleIndications->AdvancedSearch->SearchValue);
			$this->MaleIndications->EditValue = HtmlEncode($this->MaleIndications->AdvancedSearch->SearchValue);
			$this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

			// FemaleIndications
			$this->FemaleIndications->EditAttrs["class"] = "form-control";
			$this->FemaleIndications->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FemaleIndications->AdvancedSearch->SearchValue = HtmlDecode($this->FemaleIndications->AdvancedSearch->SearchValue);
			$this->FemaleIndications->EditValue = HtmlEncode($this->FemaleIndications->AdvancedSearch->SearchValue);
			$this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// A4ICSICycle
			$this->A4ICSICycle->EditAttrs["class"] = "form-control";
			$this->A4ICSICycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->A4ICSICycle->AdvancedSearch->SearchValue = HtmlDecode($this->A4ICSICycle->AdvancedSearch->SearchValue);
			$this->A4ICSICycle->EditValue = HtmlEncode($this->A4ICSICycle->AdvancedSearch->SearchValue);
			$this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

			// TotalICSICycle
			$this->TotalICSICycle->EditAttrs["class"] = "form-control";
			$this->TotalICSICycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalICSICycle->AdvancedSearch->SearchValue = HtmlDecode($this->TotalICSICycle->AdvancedSearch->SearchValue);
			$this->TotalICSICycle->EditValue = HtmlEncode($this->TotalICSICycle->AdvancedSearch->SearchValue);
			$this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

			// TypeOfInfertility
			$this->TypeOfInfertility->EditAttrs["class"] = "form-control";
			$this->TypeOfInfertility->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TypeOfInfertility->AdvancedSearch->SearchValue = HtmlDecode($this->TypeOfInfertility->AdvancedSearch->SearchValue);
			$this->TypeOfInfertility->EditValue = HtmlEncode($this->TypeOfInfertility->AdvancedSearch->SearchValue);
			$this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

			// RelevantHistory
			$this->RelevantHistory->EditAttrs["class"] = "form-control";
			$this->RelevantHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RelevantHistory->AdvancedSearch->SearchValue = HtmlDecode($this->RelevantHistory->AdvancedSearch->SearchValue);
			$this->RelevantHistory->EditValue = HtmlEncode($this->RelevantHistory->AdvancedSearch->SearchValue);
			$this->RelevantHistory->PlaceHolder = RemoveHtml($this->RelevantHistory->caption());

			// IUICycles
			$this->IUICycles->EditAttrs["class"] = "form-control";
			$this->IUICycles->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IUICycles->AdvancedSearch->SearchValue = HtmlDecode($this->IUICycles->AdvancedSearch->SearchValue);
			$this->IUICycles->EditValue = HtmlEncode($this->IUICycles->AdvancedSearch->SearchValue);
			$this->IUICycles->PlaceHolder = RemoveHtml($this->IUICycles->caption());

			// AMH
			$this->AMH->EditAttrs["class"] = "form-control";
			$this->AMH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AMH->AdvancedSearch->SearchValue = HtmlDecode($this->AMH->AdvancedSearch->SearchValue);
			$this->AMH->EditValue = HtmlEncode($this->AMH->AdvancedSearch->SearchValue);
			$this->AMH->PlaceHolder = RemoveHtml($this->AMH->caption());

			// FBMI
			$this->FBMI->EditAttrs["class"] = "form-control";
			$this->FBMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FBMI->AdvancedSearch->SearchValue = HtmlDecode($this->FBMI->AdvancedSearch->SearchValue);
			$this->FBMI->EditValue = HtmlEncode($this->FBMI->AdvancedSearch->SearchValue);
			$this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

			// ANTAGONISTSTARTDAY
			$this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
			$this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue = HtmlDecode($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue);
			$this->ANTAGONISTSTARTDAY->EditValue = HtmlEncode($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue);
			$this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

			// OvarianSurgery
			$this->OvarianSurgery->EditAttrs["class"] = "form-control";
			$this->OvarianSurgery->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OvarianSurgery->AdvancedSearch->SearchValue = HtmlDecode($this->OvarianSurgery->AdvancedSearch->SearchValue);
			$this->OvarianSurgery->EditValue = HtmlEncode($this->OvarianSurgery->AdvancedSearch->SearchValue);
			$this->OvarianSurgery->PlaceHolder = RemoveHtml($this->OvarianSurgery->caption());

			// OPUDATE
			$this->OPUDATE->EditAttrs["class"] = "form-control";
			$this->OPUDATE->EditCustomAttributes = "";
			$this->OPUDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->OPUDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

			// RFSH1
			$this->RFSH1->EditAttrs["class"] = "form-control";
			$this->RFSH1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RFSH1->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH1->AdvancedSearch->SearchValue);
			$this->RFSH1->EditValue = HtmlEncode($this->RFSH1->AdvancedSearch->SearchValue);
			$this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

			// RFSH2
			$this->RFSH2->EditAttrs["class"] = "form-control";
			$this->RFSH2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RFSH2->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH2->AdvancedSearch->SearchValue);
			$this->RFSH2->EditValue = HtmlEncode($this->RFSH2->AdvancedSearch->SearchValue);
			$this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

			// RFSH3
			$this->RFSH3->EditAttrs["class"] = "form-control";
			$this->RFSH3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RFSH3->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH3->AdvancedSearch->SearchValue);
			$this->RFSH3->EditValue = HtmlEncode($this->RFSH3->AdvancedSearch->SearchValue);
			$this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

			// E21
			$this->E21->EditAttrs["class"] = "form-control";
			$this->E21->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->E21->AdvancedSearch->SearchValue = HtmlDecode($this->E21->AdvancedSearch->SearchValue);
			$this->E21->EditValue = HtmlEncode($this->E21->AdvancedSearch->SearchValue);
			$this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

			// Hysteroscopy
			$this->Hysteroscopy->EditAttrs["class"] = "form-control";
			$this->Hysteroscopy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Hysteroscopy->AdvancedSearch->SearchValue = HtmlDecode($this->Hysteroscopy->AdvancedSearch->SearchValue);
			$this->Hysteroscopy->EditValue = HtmlEncode($this->Hysteroscopy->AdvancedSearch->SearchValue);
			$this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Fweight
			$this->Fweight->EditAttrs["class"] = "form-control";
			$this->Fweight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fweight->AdvancedSearch->SearchValue = HtmlDecode($this->Fweight->AdvancedSearch->SearchValue);
			$this->Fweight->EditValue = HtmlEncode($this->Fweight->AdvancedSearch->SearchValue);
			$this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

			// AntiTPO
			$this->AntiTPO->EditAttrs["class"] = "form-control";
			$this->AntiTPO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AntiTPO->AdvancedSearch->SearchValue = HtmlDecode($this->AntiTPO->AdvancedSearch->SearchValue);
			$this->AntiTPO->EditValue = HtmlEncode($this->AntiTPO->AdvancedSearch->SearchValue);
			$this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

			// AntiTG
			$this->AntiTG->EditAttrs["class"] = "form-control";
			$this->AntiTG->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AntiTG->AdvancedSearch->SearchValue = HtmlDecode($this->AntiTG->AdvancedSearch->SearchValue);
			$this->AntiTG->EditValue = HtmlEncode($this->AntiTG->AdvancedSearch->SearchValue);
			$this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

			// PatientAge
			$this->PatientAge->EditAttrs["class"] = "form-control";
			$this->PatientAge->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientAge->AdvancedSearch->SearchValue = HtmlDecode($this->PatientAge->AdvancedSearch->SearchValue);
			$this->PatientAge->EditValue = HtmlEncode($this->PatientAge->AdvancedSearch->SearchValue);
			$this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

			// PartnerAge
			$this->PartnerAge->EditAttrs["class"] = "form-control";
			$this->PartnerAge->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerAge->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerAge->AdvancedSearch->SearchValue);
			$this->PartnerAge->EditValue = HtmlEncode($this->PartnerAge->AdvancedSearch->SearchValue);
			$this->PartnerAge->PlaceHolder = RemoveHtml($this->PartnerAge->caption());

			// R.OVARY
			$this->R_OVARY->EditAttrs["class"] = "form-control";
			$this->R_OVARY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->R_OVARY->AdvancedSearch->SearchValue = HtmlDecode($this->R_OVARY->AdvancedSearch->SearchValue);
			$this->R_OVARY->EditValue = HtmlEncode($this->R_OVARY->AdvancedSearch->SearchValue);
			$this->R_OVARY->PlaceHolder = RemoveHtml($this->R_OVARY->caption());

			// R.AFC
			$this->R_AFC->EditAttrs["class"] = "form-control";
			$this->R_AFC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->R_AFC->AdvancedSearch->SearchValue = HtmlDecode($this->R_AFC->AdvancedSearch->SearchValue);
			$this->R_AFC->EditValue = HtmlEncode($this->R_AFC->AdvancedSearch->SearchValue);
			$this->R_AFC->PlaceHolder = RemoveHtml($this->R_AFC->caption());

			// L.OVARY
			$this->L_OVARY->EditAttrs["class"] = "form-control";
			$this->L_OVARY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->L_OVARY->AdvancedSearch->SearchValue = HtmlDecode($this->L_OVARY->AdvancedSearch->SearchValue);
			$this->L_OVARY->EditValue = HtmlEncode($this->L_OVARY->AdvancedSearch->SearchValue);
			$this->L_OVARY->PlaceHolder = RemoveHtml($this->L_OVARY->caption());

			// L.AFC
			$this->L_AFC->EditAttrs["class"] = "form-control";
			$this->L_AFC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->L_AFC->AdvancedSearch->SearchValue = HtmlDecode($this->L_AFC->AdvancedSearch->SearchValue);
			$this->L_AFC->EditValue = HtmlEncode($this->L_AFC->AdvancedSearch->SearchValue);
			$this->L_AFC->PlaceHolder = RemoveHtml($this->L_AFC->caption());

			// E2
			$this->E2->EditAttrs["class"] = "form-control";
			$this->E2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->E2->AdvancedSearch->SearchValue = HtmlDecode($this->E2->AdvancedSearch->SearchValue);
			$this->E2->EditValue = HtmlEncode($this->E2->AdvancedSearch->SearchValue);
			$this->E2->PlaceHolder = RemoveHtml($this->E2->caption());

			// AMH1
			$this->AMH1->EditAttrs["class"] = "form-control";
			$this->AMH1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AMH1->AdvancedSearch->SearchValue = HtmlDecode($this->AMH1->AdvancedSearch->SearchValue);
			$this->AMH1->EditValue = HtmlEncode($this->AMH1->AdvancedSearch->SearchValue);
			$this->AMH1->PlaceHolder = RemoveHtml($this->AMH1->caption());

			// BMI(MALE)
			$this->BMI28MALE29->EditAttrs["class"] = "form-control";
			$this->BMI28MALE29->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BMI28MALE29->AdvancedSearch->SearchValue = HtmlDecode($this->BMI28MALE29->AdvancedSearch->SearchValue);
			$this->BMI28MALE29->EditValue = HtmlEncode($this->BMI28MALE29->AdvancedSearch->SearchValue);
			$this->BMI28MALE29->PlaceHolder = RemoveHtml($this->BMI28MALE29->caption());

			// MaleMedicalConditions
			$this->MaleMedicalConditions->EditAttrs["class"] = "form-control";
			$this->MaleMedicalConditions->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MaleMedicalConditions->AdvancedSearch->SearchValue = HtmlDecode($this->MaleMedicalConditions->AdvancedSearch->SearchValue);
			$this->MaleMedicalConditions->EditValue = HtmlEncode($this->MaleMedicalConditions->AdvancedSearch->SearchValue);
			$this->MaleMedicalConditions->PlaceHolder = RemoveHtml($this->MaleMedicalConditions->caption());

			// CC 100
			$this->CC_100->EditAttrs["class"] = "form-control";
			$this->CC_100->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CC_100->AdvancedSearch->SearchValue = HtmlDecode($this->CC_100->AdvancedSearch->SearchValue);
			$this->CC_100->EditValue = HtmlEncode($this->CC_100->AdvancedSearch->SearchValue);
			$this->CC_100->PlaceHolder = RemoveHtml($this->CC_100->caption());

			// RFSH1A
			$this->RFSH1A->EditAttrs["class"] = "form-control";
			$this->RFSH1A->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RFSH1A->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH1A->AdvancedSearch->SearchValue);
			$this->RFSH1A->EditValue = HtmlEncode($this->RFSH1A->AdvancedSearch->SearchValue);
			$this->RFSH1A->PlaceHolder = RemoveHtml($this->RFSH1A->caption());

			// HMG1
			$this->HMG1->EditAttrs["class"] = "form-control";
			$this->HMG1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HMG1->AdvancedSearch->SearchValue = HtmlDecode($this->HMG1->AdvancedSearch->SearchValue);
			$this->HMG1->EditValue = HtmlEncode($this->HMG1->AdvancedSearch->SearchValue);
			$this->HMG1->PlaceHolder = RemoveHtml($this->HMG1->caption());

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->EditAttrs["class"] = "form-control";
			$this->DAYSOFSTIMULATION->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue = HtmlDecode($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue);
			$this->DAYSOFSTIMULATION->EditValue = HtmlEncode($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue);
			$this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

			// TRIGGERR
			$this->TRIGGERR->EditAttrs["class"] = "form-control";
			$this->TRIGGERR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());
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
		$this->RIDNO->AdvancedSearch->load();
		$this->Treatment->AdvancedSearch->load();
		$this->Origin->AdvancedSearch->load();
		$this->MaleIndications->AdvancedSearch->load();
		$this->FemaleIndications->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PartnerID->AdvancedSearch->load();
		$this->A4ICSICycle->AdvancedSearch->load();
		$this->TotalICSICycle->AdvancedSearch->load();
		$this->TypeOfInfertility->AdvancedSearch->load();
		$this->RelevantHistory->AdvancedSearch->load();
		$this->IUICycles->AdvancedSearch->load();
		$this->AMH->AdvancedSearch->load();
		$this->FBMI->AdvancedSearch->load();
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->load();
		$this->OvarianSurgery->AdvancedSearch->load();
		$this->OPUDATE->AdvancedSearch->load();
		$this->RFSH1->AdvancedSearch->load();
		$this->RFSH2->AdvancedSearch->load();
		$this->RFSH3->AdvancedSearch->load();
		$this->E21->AdvancedSearch->load();
		$this->Hysteroscopy->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Fweight->AdvancedSearch->load();
		$this->AntiTPO->AdvancedSearch->load();
		$this->AntiTG->AdvancedSearch->load();
		$this->PatientAge->AdvancedSearch->load();
		$this->PartnerAge->AdvancedSearch->load();
		$this->CYCLES->AdvancedSearch->load();
		$this->MF->AdvancedSearch->load();
		$this->CauseOfINFERTILITY->AdvancedSearch->load();
		$this->SIS->AdvancedSearch->load();
		$this->Scratching->AdvancedSearch->load();
		$this->Cannulation->AdvancedSearch->load();
		$this->MEPRATE->AdvancedSearch->load();
		$this->R_OVARY->AdvancedSearch->load();
		$this->R_AFC->AdvancedSearch->load();
		$this->L_OVARY->AdvancedSearch->load();
		$this->L_AFC->AdvancedSearch->load();
		$this->LH1->AdvancedSearch->load();
		$this->E2->AdvancedSearch->load();
		$this->StemCellInstallation->AdvancedSearch->load();
		$this->DHEAS->AdvancedSearch->load();
		$this->Mtorr->AdvancedSearch->load();
		$this->AMH1->AdvancedSearch->load();
		$this->LH->AdvancedSearch->load();
		$this->BMI28MALE29->AdvancedSearch->load();
		$this->MaleMedicalConditions->AdvancedSearch->load();
		$this->MaleExamination->AdvancedSearch->load();
		$this->SpermConcentration->AdvancedSearch->load();
		$this->SpermMotility28P26NP29->AdvancedSearch->load();
		$this->SpermMorphology->AdvancedSearch->load();
		$this->SpermRetrival->AdvancedSearch->load();
		$this->M_Testosterone->AdvancedSearch->load();
		$this->DFI->AdvancedSearch->load();
		$this->PreRX->AdvancedSearch->load();
		$this->CC_100->AdvancedSearch->load();
		$this->RFSH1A->AdvancedSearch->load();
		$this->HMG1->AdvancedSearch->load();
		$this->RLH->AdvancedSearch->load();
		$this->HMG_HP->AdvancedSearch->load();
		$this->day_of_HMG->AdvancedSearch->load();
		$this->Reason_for_HMG->AdvancedSearch->load();
		$this->RLH_day->AdvancedSearch->load();
		$this->DAYSOFSTIMULATION->AdvancedSearch->load();
		$this->Any_change_inbetween_28_Dose_added_2C_day29->AdvancedSearch->load();
		$this->day_of_Anta->AdvancedSearch->load();
		$this->R_FSH_TD->AdvancedSearch->load();
		$this->R_FSH_2B_HMG_TD->AdvancedSearch->load();
		$this->R_FSH_2B_R_LH_TD->AdvancedSearch->load();
		$this->HMG_TD->AdvancedSearch->load();
		$this->LH_TD->AdvancedSearch->load();
		$this->D1_LH->AdvancedSearch->load();
		$this->D1_E2->AdvancedSearch->load();
		$this->Trigger_day_E2->AdvancedSearch->load();
		$this->Trigger_day_P4->AdvancedSearch->load();
		$this->Trigger_day_LH->AdvancedSearch->load();
		$this->VIT_D->AdvancedSearch->load();
		$this->TRIGGERR->AdvancedSearch->load();
		$this->BHCG_BEFORE_RETRIEVAL->AdvancedSearch->load();
		$this->LH__12_HRS->AdvancedSearch->load();
		$this->P4__12_HRS->AdvancedSearch->load();
		$this->ET_on_hCG_day->AdvancedSearch->load();
		$this->ET_doppler->AdvancedSearch->load();
		$this->VI2FFI2FVFI->AdvancedSearch->load();
		$this->Endometrial_abnormality->AdvancedSearch->load();
		$this->AFC_ON_S1->AdvancedSearch->load();
		$this->TIME_OF_OPU_FROM_TRIGGER->AdvancedSearch->load();
		$this->SPERM_TYPE->AdvancedSearch->load();
		$this->EXPECTED_ON_TRIGGER_DAY->AdvancedSearch->load();
		$this->OOCYTES_RETRIEVED->AdvancedSearch->load();
		$this->TIME_OF_DENUDATION->AdvancedSearch->load();
		$this->M_II->AdvancedSearch->load();
		$this->MI->AdvancedSearch->load();
		$this->GV->AdvancedSearch->load();
		$this->ICSI_TIME_FORM_OPU->AdvancedSearch->load();
		$this->FERT_28_2_PN_29->AdvancedSearch->load();
		$this->DEG->AdvancedSearch->load();
		$this->D3_GRADE_A->AdvancedSearch->load();
		$this->D3_GRADE_B->AdvancedSearch->load();
		$this->D3_GRADE_C->AdvancedSearch->load();
		$this->D3_GRADE_D->AdvancedSearch->load();
		$this->USABLE_ON_DAY_3_ET->AdvancedSearch->load();
		$this->USABLE_ON_day_3_FREEZING->AdvancedSearch->load();
		$this->D5_GARDE_A->AdvancedSearch->load();
		$this->D5_GRADE_B->AdvancedSearch->load();
		$this->D5_GRADE_C->AdvancedSearch->load();
		$this->D5_GRADE_D->AdvancedSearch->load();
		$this->USABLE_ON_D5_ET->AdvancedSearch->load();
		$this->USABLE_ON_D5_FREEZING->AdvancedSearch->load();
		$this->D6_GRADE_A->AdvancedSearch->load();
		$this->D6_GRADE_B->AdvancedSearch->load();
		$this->D6_GRADE_C->AdvancedSearch->load();
		$this->D6_GRADE_D->AdvancedSearch->load();
		$this->D6_USABLE_EMBRYO_ET->AdvancedSearch->load();
		$this->D6_USABLE_FREEZING->AdvancedSearch->load();
		$this->TOTAL_BLAST->AdvancedSearch->load();
		$this->PGS->AdvancedSearch->load();
		$this->REMARKS->AdvancedSearch->load();
		$this->PU___D2FB->AdvancedSearch->load();
		$this->ICSI_D2FB->AdvancedSearch->load();
		$this->VIT_D2FB->AdvancedSearch->load();
		$this->ET_D2FB->AdvancedSearch->load();
		$this->LAB_COMMENTS->AdvancedSearch->load();
		$this->Reason_for_no_FRESH_transfer->AdvancedSearch->load();
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->AdvancedSearch->load();
		$this->EMBRYOS_PENDING->AdvancedSearch->load();
		$this->DAY_OF_TRANSFER->AdvancedSearch->load();
		$this->H2FD_sperm->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->sc_progesterone->AdvancedSearch->load();
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->AdvancedSearch->load();
		$this->CRINONE->AdvancedSearch->load();
		$this->progynova->AdvancedSearch->load();
		$this->Heparin->AdvancedSearch->load();
		$this->cabergolin->AdvancedSearch->load();
		$this->Antagonist->AdvancedSearch->load();
		$this->OHSS->AdvancedSearch->load();
		$this->Complications->AdvancedSearch->load();
		$this->LP_bleeding->AdvancedSearch->load();
		$this->DF_hCG->AdvancedSearch->load();
		$this->Implantation_rate->AdvancedSearch->load();
		$this->Ectopic->AdvancedSearch->load();
		$this->Type_of_preg->AdvancedSearch->load();
		$this->ANC->AdvancedSearch->load();
		$this->anomalies->AdvancedSearch->load();
		$this->baby_wt->AdvancedSearch->load();
		$this->GA_at_delivery->AdvancedSearch->load();
		$this->Pregnancy_outcome->AdvancedSearch->load();
		$this->_1st_FET->AdvancedSearch->load();
		$this->AFTER_HYSTEROSCOPY->AdvancedSearch->load();
		$this->AFTER_ERA->AdvancedSearch->load();
		$this->ERA->AdvancedSearch->load();
		$this->HRT->AdvancedSearch->load();
		$this->XGRAST2FPRP->AdvancedSearch->load();
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->AdvancedSearch->load();
		$this->LMWH_40MG->AdvancedSearch->load();
		$this->DF_hCG2->AdvancedSearch->load();
		$this->Implantation_rate1->AdvancedSearch->load();
		$this->Ectopic1->AdvancedSearch->load();
		$this->Type_of_pregA->AdvancedSearch->load();
		$this->ANC1->AdvancedSearch->load();
		$this->anomalies2->AdvancedSearch->load();
		$this->baby_wt2->AdvancedSearch->load();
		$this->GA_at_delivery1->AdvancedSearch->load();
		$this->Pregnancy_outcome1->AdvancedSearch->load();
		$this->_2ND_FET->AdvancedSearch->load();
		$this->AFTER_HYSTEROSCOPY1->AdvancedSearch->load();
		$this->AFTER_ERA1->AdvancedSearch->load();
		$this->ERA1->AdvancedSearch->load();
		$this->HRT1->AdvancedSearch->load();
		$this->XGRAST2FPRP1->AdvancedSearch->load();
		$this->NUMBER_OF_EMBRYOS->AdvancedSearch->load();
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->AdvancedSearch->load();
		$this->INTRALIPID_AND_BARGLOBIN->AdvancedSearch->load();
		$this->LMWH_40MG1->AdvancedSearch->load();
		$this->DF_hCG1->AdvancedSearch->load();
		$this->Implantation_rate2->AdvancedSearch->load();
		$this->Ectopic2->AdvancedSearch->load();
		$this->Type_of_preg2->AdvancedSearch->load();
		$this->ANCA->AdvancedSearch->load();
		$this->anomalies1->AdvancedSearch->load();
		$this->baby_wt1->AdvancedSearch->load();
		$this->GA_at_delivery2->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_template_for_opulist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_template_for_opulist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_template_for_opulist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_template_for_opu\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_template_for_opu',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_template_for_opulist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_otherprocedure_list extends ivf_otherprocedure
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_otherprocedure';

	// Page object name
	public $PageObjName = "ivf_otherprocedure_list";

	// Grid form hidden field names
	public $FormName = "fivf_otherprocedurelist";
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

		// Table object (ivf_otherprocedure)
		if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
			$GLOBALS["ivf_otherprocedure"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_otherprocedure"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "ivf_otherprocedureadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_otherproceduredelete.php";
		$this->MultiUpdateUrl = "ivf_otherprocedureupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_otherprocedurelistsrch";

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
		global $EXPORT, $ivf_otherprocedure;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_otherprocedure);
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
		$this->Name->setVisibility();
		$this->Age->Visible = FALSE;
		$this->SEX->Visible = FALSE;
		$this->Address->Visible = FALSE;
		$this->DateofAdmission->setVisibility();
		$this->DateofProcedure->setVisibility();
		$this->DateofDischarge->setVisibility();
		$this->Consultant->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anesthetist->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->ProcedureDone->setVisibility();
		$this->PROVISIONALDIAGNOSIS->setVisibility();
		$this->Chiefcomplaints->setVisibility();
		$this->MaritallHistory->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->SurgicalHistory->setVisibility();
		$this->PastHistory->setVisibility();
		$this->FamilyHistory->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->CNS->setVisibility();
		$this->_RS->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->InvestigationReport->setVisibility();
		$this->FinalDiagnosis->Visible = FALSE;
		$this->Treatment->Visible = FALSE;
		$this->DetailOfOperation->Visible = FALSE;
		$this->FollowUpAdvice->Visible = FALSE;
		$this->FollowUpMedication->Visible = FALSE;
		$this->Plan->Visible = FALSE;
		$this->TempleteFinalDiagnosis->Visible = FALSE;
		$this->TemplateTreatment->Visible = FALSE;
		$this->TemplateOperation->Visible = FALSE;
		$this->TemplateFollowUpAdvice->Visible = FALSE;
		$this->TemplateFollowUpMedication->Visible = FALSE;
		$this->TemplatePlan->Visible = FALSE;
		$this->QRCode->Visible = FALSE;
		$this->TidNo->setVisibility();
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
		$this->setupLookupOptions($this->Name);
		$this->setupLookupOptions($this->Consultant);
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anesthetist);
		$this->setupLookupOptions($this->TempleteFinalDiagnosis);
		$this->setupLookupOptions($this->TemplateTreatment);
		$this->setupLookupOptions($this->TemplateOperation);
		$this->setupLookupOptions($this->TemplateFollowUpAdvice);
		$this->setupLookupOptions($this->TemplateFollowUpMedication);
		$this->setupLookupOptions($this->TemplatePlan);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_otherprocedurelistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->SEX->AdvancedSearch->toJson(), ","); // Field SEX
		$filterList = Concat($filterList, $this->Address->AdvancedSearch->toJson(), ","); // Field Address
		$filterList = Concat($filterList, $this->DateofAdmission->AdvancedSearch->toJson(), ","); // Field DateofAdmission
		$filterList = Concat($filterList, $this->DateofProcedure->AdvancedSearch->toJson(), ","); // Field DateofProcedure
		$filterList = Concat($filterList, $this->DateofDischarge->AdvancedSearch->toJson(), ","); // Field DateofDischarge
		$filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
		$filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
		$filterList = Concat($filterList, $this->Anesthetist->AdvancedSearch->toJson(), ","); // Field Anesthetist
		$filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
		$filterList = Concat($filterList, $this->ProcedureDone->AdvancedSearch->toJson(), ","); // Field ProcedureDone
		$filterList = Concat($filterList, $this->PROVISIONALDIAGNOSIS->AdvancedSearch->toJson(), ","); // Field PROVISIONALDIAGNOSIS
		$filterList = Concat($filterList, $this->Chiefcomplaints->AdvancedSearch->toJson(), ","); // Field Chiefcomplaints
		$filterList = Concat($filterList, $this->MaritallHistory->AdvancedSearch->toJson(), ","); // Field MaritallHistory
		$filterList = Concat($filterList, $this->MenstrualHistory->AdvancedSearch->toJson(), ","); // Field MenstrualHistory
		$filterList = Concat($filterList, $this->SurgicalHistory->AdvancedSearch->toJson(), ","); // Field SurgicalHistory
		$filterList = Concat($filterList, $this->PastHistory->AdvancedSearch->toJson(), ","); // Field PastHistory
		$filterList = Concat($filterList, $this->FamilyHistory->AdvancedSearch->toJson(), ","); // Field FamilyHistory
		$filterList = Concat($filterList, $this->Temp->AdvancedSearch->toJson(), ","); // Field Temp
		$filterList = Concat($filterList, $this->Pulse->AdvancedSearch->toJson(), ","); // Field Pulse
		$filterList = Concat($filterList, $this->BP->AdvancedSearch->toJson(), ","); // Field BP
		$filterList = Concat($filterList, $this->CNS->AdvancedSearch->toJson(), ","); // Field CNS
		$filterList = Concat($filterList, $this->_RS->AdvancedSearch->toJson(), ","); // Field RS
		$filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
		$filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
		$filterList = Concat($filterList, $this->InvestigationReport->AdvancedSearch->toJson(), ","); // Field InvestigationReport
		$filterList = Concat($filterList, $this->FinalDiagnosis->AdvancedSearch->toJson(), ","); // Field FinalDiagnosis
		$filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
		$filterList = Concat($filterList, $this->DetailOfOperation->AdvancedSearch->toJson(), ","); // Field DetailOfOperation
		$filterList = Concat($filterList, $this->FollowUpAdvice->AdvancedSearch->toJson(), ","); // Field FollowUpAdvice
		$filterList = Concat($filterList, $this->FollowUpMedication->AdvancedSearch->toJson(), ","); // Field FollowUpMedication
		$filterList = Concat($filterList, $this->Plan->AdvancedSearch->toJson(), ","); // Field Plan
		$filterList = Concat($filterList, $this->TempleteFinalDiagnosis->AdvancedSearch->toJson(), ","); // Field TempleteFinalDiagnosis
		$filterList = Concat($filterList, $this->TemplateTreatment->AdvancedSearch->toJson(), ","); // Field TemplateTreatment
		$filterList = Concat($filterList, $this->TemplateOperation->AdvancedSearch->toJson(), ","); // Field TemplateOperation
		$filterList = Concat($filterList, $this->TemplateFollowUpAdvice->AdvancedSearch->toJson(), ","); // Field TemplateFollowUpAdvice
		$filterList = Concat($filterList, $this->TemplateFollowUpMedication->AdvancedSearch->toJson(), ","); // Field TemplateFollowUpMedication
		$filterList = Concat($filterList, $this->TemplatePlan->AdvancedSearch->toJson(), ","); // Field TemplatePlan
		$filterList = Concat($filterList, $this->QRCode->AdvancedSearch->toJson(), ","); // Field QRCode
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_otherprocedurelistsrch", $filters);
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

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field SEX
		$this->SEX->AdvancedSearch->SearchValue = @$filter["x_SEX"];
		$this->SEX->AdvancedSearch->SearchOperator = @$filter["z_SEX"];
		$this->SEX->AdvancedSearch->SearchCondition = @$filter["v_SEX"];
		$this->SEX->AdvancedSearch->SearchValue2 = @$filter["y_SEX"];
		$this->SEX->AdvancedSearch->SearchOperator2 = @$filter["w_SEX"];
		$this->SEX->AdvancedSearch->save();

		// Field Address
		$this->Address->AdvancedSearch->SearchValue = @$filter["x_Address"];
		$this->Address->AdvancedSearch->SearchOperator = @$filter["z_Address"];
		$this->Address->AdvancedSearch->SearchCondition = @$filter["v_Address"];
		$this->Address->AdvancedSearch->SearchValue2 = @$filter["y_Address"];
		$this->Address->AdvancedSearch->SearchOperator2 = @$filter["w_Address"];
		$this->Address->AdvancedSearch->save();

		// Field DateofAdmission
		$this->DateofAdmission->AdvancedSearch->SearchValue = @$filter["x_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchOperator = @$filter["z_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchCondition = @$filter["v_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchValue2 = @$filter["y_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchOperator2 = @$filter["w_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->save();

		// Field DateofProcedure
		$this->DateofProcedure->AdvancedSearch->SearchValue = @$filter["x_DateofProcedure"];
		$this->DateofProcedure->AdvancedSearch->SearchOperator = @$filter["z_DateofProcedure"];
		$this->DateofProcedure->AdvancedSearch->SearchCondition = @$filter["v_DateofProcedure"];
		$this->DateofProcedure->AdvancedSearch->SearchValue2 = @$filter["y_DateofProcedure"];
		$this->DateofProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_DateofProcedure"];
		$this->DateofProcedure->AdvancedSearch->save();

		// Field DateofDischarge
		$this->DateofDischarge->AdvancedSearch->SearchValue = @$filter["x_DateofDischarge"];
		$this->DateofDischarge->AdvancedSearch->SearchOperator = @$filter["z_DateofDischarge"];
		$this->DateofDischarge->AdvancedSearch->SearchCondition = @$filter["v_DateofDischarge"];
		$this->DateofDischarge->AdvancedSearch->SearchValue2 = @$filter["y_DateofDischarge"];
		$this->DateofDischarge->AdvancedSearch->SearchOperator2 = @$filter["w_DateofDischarge"];
		$this->DateofDischarge->AdvancedSearch->save();

		// Field Consultant
		$this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
		$this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
		$this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
		$this->Consultant->AdvancedSearch->save();

		// Field Surgeon
		$this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
		$this->Surgeon->AdvancedSearch->save();

		// Field Anesthetist
		$this->Anesthetist->AdvancedSearch->SearchValue = @$filter["x_Anesthetist"];
		$this->Anesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anesthetist"];
		$this->Anesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anesthetist"];
		$this->Anesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anesthetist"];
		$this->Anesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anesthetist"];
		$this->Anesthetist->AdvancedSearch->save();

		// Field IdentificationMark
		$this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->save();

		// Field ProcedureDone
		$this->ProcedureDone->AdvancedSearch->SearchValue = @$filter["x_ProcedureDone"];
		$this->ProcedureDone->AdvancedSearch->SearchOperator = @$filter["z_ProcedureDone"];
		$this->ProcedureDone->AdvancedSearch->SearchCondition = @$filter["v_ProcedureDone"];
		$this->ProcedureDone->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureDone"];
		$this->ProcedureDone->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureDone"];
		$this->ProcedureDone->AdvancedSearch->save();

		// Field PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue = @$filter["x_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator = @$filter["z_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchCondition = @$filter["v_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue2 = @$filter["y_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator2 = @$filter["w_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->save();

		// Field Chiefcomplaints
		$this->Chiefcomplaints->AdvancedSearch->SearchValue = @$filter["x_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchOperator = @$filter["z_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchCondition = @$filter["v_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchValue2 = @$filter["y_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchOperator2 = @$filter["w_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->save();

		// Field MaritallHistory
		$this->MaritallHistory->AdvancedSearch->SearchValue = @$filter["x_MaritallHistory"];
		$this->MaritallHistory->AdvancedSearch->SearchOperator = @$filter["z_MaritallHistory"];
		$this->MaritallHistory->AdvancedSearch->SearchCondition = @$filter["v_MaritallHistory"];
		$this->MaritallHistory->AdvancedSearch->SearchValue2 = @$filter["y_MaritallHistory"];
		$this->MaritallHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MaritallHistory"];
		$this->MaritallHistory->AdvancedSearch->save();

		// Field MenstrualHistory
		$this->MenstrualHistory->AdvancedSearch->SearchValue = @$filter["x_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator = @$filter["z_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchCondition = @$filter["v_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchValue2 = @$filter["y_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->save();

		// Field SurgicalHistory
		$this->SurgicalHistory->AdvancedSearch->SearchValue = @$filter["x_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->save();

		// Field PastHistory
		$this->PastHistory->AdvancedSearch->SearchValue = @$filter["x_PastHistory"];
		$this->PastHistory->AdvancedSearch->SearchOperator = @$filter["z_PastHistory"];
		$this->PastHistory->AdvancedSearch->SearchCondition = @$filter["v_PastHistory"];
		$this->PastHistory->AdvancedSearch->SearchValue2 = @$filter["y_PastHistory"];
		$this->PastHistory->AdvancedSearch->SearchOperator2 = @$filter["w_PastHistory"];
		$this->PastHistory->AdvancedSearch->save();

		// Field FamilyHistory
		$this->FamilyHistory->AdvancedSearch->SearchValue = @$filter["x_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->save();

		// Field Temp
		$this->Temp->AdvancedSearch->SearchValue = @$filter["x_Temp"];
		$this->Temp->AdvancedSearch->SearchOperator = @$filter["z_Temp"];
		$this->Temp->AdvancedSearch->SearchCondition = @$filter["v_Temp"];
		$this->Temp->AdvancedSearch->SearchValue2 = @$filter["y_Temp"];
		$this->Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Temp"];
		$this->Temp->AdvancedSearch->save();

		// Field Pulse
		$this->Pulse->AdvancedSearch->SearchValue = @$filter["x_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator = @$filter["z_Pulse"];
		$this->Pulse->AdvancedSearch->SearchCondition = @$filter["v_Pulse"];
		$this->Pulse->AdvancedSearch->SearchValue2 = @$filter["y_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator2 = @$filter["w_Pulse"];
		$this->Pulse->AdvancedSearch->save();

		// Field BP
		$this->BP->AdvancedSearch->SearchValue = @$filter["x_BP"];
		$this->BP->AdvancedSearch->SearchOperator = @$filter["z_BP"];
		$this->BP->AdvancedSearch->SearchCondition = @$filter["v_BP"];
		$this->BP->AdvancedSearch->SearchValue2 = @$filter["y_BP"];
		$this->BP->AdvancedSearch->SearchOperator2 = @$filter["w_BP"];
		$this->BP->AdvancedSearch->save();

		// Field CNS
		$this->CNS->AdvancedSearch->SearchValue = @$filter["x_CNS"];
		$this->CNS->AdvancedSearch->SearchOperator = @$filter["z_CNS"];
		$this->CNS->AdvancedSearch->SearchCondition = @$filter["v_CNS"];
		$this->CNS->AdvancedSearch->SearchValue2 = @$filter["y_CNS"];
		$this->CNS->AdvancedSearch->SearchOperator2 = @$filter["w_CNS"];
		$this->CNS->AdvancedSearch->save();

		// Field RS
		$this->_RS->AdvancedSearch->SearchValue = @$filter["x__RS"];
		$this->_RS->AdvancedSearch->SearchOperator = @$filter["z__RS"];
		$this->_RS->AdvancedSearch->SearchCondition = @$filter["v__RS"];
		$this->_RS->AdvancedSearch->SearchValue2 = @$filter["y__RS"];
		$this->_RS->AdvancedSearch->SearchOperator2 = @$filter["w__RS"];
		$this->_RS->AdvancedSearch->save();

		// Field CVS
		$this->CVS->AdvancedSearch->SearchValue = @$filter["x_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator = @$filter["z_CVS"];
		$this->CVS->AdvancedSearch->SearchCondition = @$filter["v_CVS"];
		$this->CVS->AdvancedSearch->SearchValue2 = @$filter["y_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator2 = @$filter["w_CVS"];
		$this->CVS->AdvancedSearch->save();

		// Field PA
		$this->PA->AdvancedSearch->SearchValue = @$filter["x_PA"];
		$this->PA->AdvancedSearch->SearchOperator = @$filter["z_PA"];
		$this->PA->AdvancedSearch->SearchCondition = @$filter["v_PA"];
		$this->PA->AdvancedSearch->SearchValue2 = @$filter["y_PA"];
		$this->PA->AdvancedSearch->SearchOperator2 = @$filter["w_PA"];
		$this->PA->AdvancedSearch->save();

		// Field InvestigationReport
		$this->InvestigationReport->AdvancedSearch->SearchValue = @$filter["x_InvestigationReport"];
		$this->InvestigationReport->AdvancedSearch->SearchOperator = @$filter["z_InvestigationReport"];
		$this->InvestigationReport->AdvancedSearch->SearchCondition = @$filter["v_InvestigationReport"];
		$this->InvestigationReport->AdvancedSearch->SearchValue2 = @$filter["y_InvestigationReport"];
		$this->InvestigationReport->AdvancedSearch->SearchOperator2 = @$filter["w_InvestigationReport"];
		$this->InvestigationReport->AdvancedSearch->save();

		// Field FinalDiagnosis
		$this->FinalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->save();

		// Field Treatment
		$this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
		$this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
		$this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
		$this->Treatment->AdvancedSearch->save();

		// Field DetailOfOperation
		$this->DetailOfOperation->AdvancedSearch->SearchValue = @$filter["x_DetailOfOperation"];
		$this->DetailOfOperation->AdvancedSearch->SearchOperator = @$filter["z_DetailOfOperation"];
		$this->DetailOfOperation->AdvancedSearch->SearchCondition = @$filter["v_DetailOfOperation"];
		$this->DetailOfOperation->AdvancedSearch->SearchValue2 = @$filter["y_DetailOfOperation"];
		$this->DetailOfOperation->AdvancedSearch->SearchOperator2 = @$filter["w_DetailOfOperation"];
		$this->DetailOfOperation->AdvancedSearch->save();

		// Field FollowUpAdvice
		$this->FollowUpAdvice->AdvancedSearch->SearchValue = @$filter["x_FollowUpAdvice"];
		$this->FollowUpAdvice->AdvancedSearch->SearchOperator = @$filter["z_FollowUpAdvice"];
		$this->FollowUpAdvice->AdvancedSearch->SearchCondition = @$filter["v_FollowUpAdvice"];
		$this->FollowUpAdvice->AdvancedSearch->SearchValue2 = @$filter["y_FollowUpAdvice"];
		$this->FollowUpAdvice->AdvancedSearch->SearchOperator2 = @$filter["w_FollowUpAdvice"];
		$this->FollowUpAdvice->AdvancedSearch->save();

		// Field FollowUpMedication
		$this->FollowUpMedication->AdvancedSearch->SearchValue = @$filter["x_FollowUpMedication"];
		$this->FollowUpMedication->AdvancedSearch->SearchOperator = @$filter["z_FollowUpMedication"];
		$this->FollowUpMedication->AdvancedSearch->SearchCondition = @$filter["v_FollowUpMedication"];
		$this->FollowUpMedication->AdvancedSearch->SearchValue2 = @$filter["y_FollowUpMedication"];
		$this->FollowUpMedication->AdvancedSearch->SearchOperator2 = @$filter["w_FollowUpMedication"];
		$this->FollowUpMedication->AdvancedSearch->save();

		// Field Plan
		$this->Plan->AdvancedSearch->SearchValue = @$filter["x_Plan"];
		$this->Plan->AdvancedSearch->SearchOperator = @$filter["z_Plan"];
		$this->Plan->AdvancedSearch->SearchCondition = @$filter["v_Plan"];
		$this->Plan->AdvancedSearch->SearchValue2 = @$filter["y_Plan"];
		$this->Plan->AdvancedSearch->SearchOperator2 = @$filter["w_Plan"];
		$this->Plan->AdvancedSearch->save();

		// Field TempleteFinalDiagnosis
		$this->TempleteFinalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_TempleteFinalDiagnosis"];
		$this->TempleteFinalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_TempleteFinalDiagnosis"];
		$this->TempleteFinalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_TempleteFinalDiagnosis"];
		$this->TempleteFinalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_TempleteFinalDiagnosis"];
		$this->TempleteFinalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_TempleteFinalDiagnosis"];
		$this->TempleteFinalDiagnosis->AdvancedSearch->save();

		// Field TemplateTreatment
		$this->TemplateTreatment->AdvancedSearch->SearchValue = @$filter["x_TemplateTreatment"];
		$this->TemplateTreatment->AdvancedSearch->SearchOperator = @$filter["z_TemplateTreatment"];
		$this->TemplateTreatment->AdvancedSearch->SearchCondition = @$filter["v_TemplateTreatment"];
		$this->TemplateTreatment->AdvancedSearch->SearchValue2 = @$filter["y_TemplateTreatment"];
		$this->TemplateTreatment->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateTreatment"];
		$this->TemplateTreatment->AdvancedSearch->save();

		// Field TemplateOperation
		$this->TemplateOperation->AdvancedSearch->SearchValue = @$filter["x_TemplateOperation"];
		$this->TemplateOperation->AdvancedSearch->SearchOperator = @$filter["z_TemplateOperation"];
		$this->TemplateOperation->AdvancedSearch->SearchCondition = @$filter["v_TemplateOperation"];
		$this->TemplateOperation->AdvancedSearch->SearchValue2 = @$filter["y_TemplateOperation"];
		$this->TemplateOperation->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateOperation"];
		$this->TemplateOperation->AdvancedSearch->save();

		// Field TemplateFollowUpAdvice
		$this->TemplateFollowUpAdvice->AdvancedSearch->SearchValue = @$filter["x_TemplateFollowUpAdvice"];
		$this->TemplateFollowUpAdvice->AdvancedSearch->SearchOperator = @$filter["z_TemplateFollowUpAdvice"];
		$this->TemplateFollowUpAdvice->AdvancedSearch->SearchCondition = @$filter["v_TemplateFollowUpAdvice"];
		$this->TemplateFollowUpAdvice->AdvancedSearch->SearchValue2 = @$filter["y_TemplateFollowUpAdvice"];
		$this->TemplateFollowUpAdvice->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateFollowUpAdvice"];
		$this->TemplateFollowUpAdvice->AdvancedSearch->save();

		// Field TemplateFollowUpMedication
		$this->TemplateFollowUpMedication->AdvancedSearch->SearchValue = @$filter["x_TemplateFollowUpMedication"];
		$this->TemplateFollowUpMedication->AdvancedSearch->SearchOperator = @$filter["z_TemplateFollowUpMedication"];
		$this->TemplateFollowUpMedication->AdvancedSearch->SearchCondition = @$filter["v_TemplateFollowUpMedication"];
		$this->TemplateFollowUpMedication->AdvancedSearch->SearchValue2 = @$filter["y_TemplateFollowUpMedication"];
		$this->TemplateFollowUpMedication->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateFollowUpMedication"];
		$this->TemplateFollowUpMedication->AdvancedSearch->save();

		// Field TemplatePlan
		$this->TemplatePlan->AdvancedSearch->SearchValue = @$filter["x_TemplatePlan"];
		$this->TemplatePlan->AdvancedSearch->SearchOperator = @$filter["z_TemplatePlan"];
		$this->TemplatePlan->AdvancedSearch->SearchCondition = @$filter["v_TemplatePlan"];
		$this->TemplatePlan->AdvancedSearch->SearchValue2 = @$filter["y_TemplatePlan"];
		$this->TemplatePlan->AdvancedSearch->SearchOperator2 = @$filter["w_TemplatePlan"];
		$this->TemplatePlan->AdvancedSearch->save();

		// Field QRCode
		$this->QRCode->AdvancedSearch->SearchValue = @$filter["x_QRCode"];
		$this->QRCode->AdvancedSearch->SearchOperator = @$filter["z_QRCode"];
		$this->QRCode->AdvancedSearch->SearchCondition = @$filter["v_QRCode"];
		$this->QRCode->AdvancedSearch->SearchValue2 = @$filter["y_QRCode"];
		$this->QRCode->AdvancedSearch->SearchOperator2 = @$filter["w_QRCode"];
		$this->QRCode->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SEX, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Address, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DateofProcedure, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DateofDischarge, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Anesthetist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProcedureDone, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PROVISIONALDIAGNOSIS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Chiefcomplaints, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaritallHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MenstrualHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SurgicalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PastHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FamilyHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Temp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pulse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CNS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_RS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->InvestigationReport, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FinalDiagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DetailOfOperation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FollowUpAdvice, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FollowUpMedication, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Plan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TempleteFinalDiagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateTreatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateOperation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateFollowUpAdvice, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateFollowUpMedication, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplatePlan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->QRCode, $arKeywords, $type);
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
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->Name); // Name
			$this->updateSort($this->DateofAdmission); // DateofAdmission
			$this->updateSort($this->DateofProcedure); // DateofProcedure
			$this->updateSort($this->DateofDischarge); // DateofDischarge
			$this->updateSort($this->Consultant); // Consultant
			$this->updateSort($this->Surgeon); // Surgeon
			$this->updateSort($this->Anesthetist); // Anesthetist
			$this->updateSort($this->IdentificationMark); // IdentificationMark
			$this->updateSort($this->ProcedureDone); // ProcedureDone
			$this->updateSort($this->PROVISIONALDIAGNOSIS); // PROVISIONALDIAGNOSIS
			$this->updateSort($this->Chiefcomplaints); // Chiefcomplaints
			$this->updateSort($this->MaritallHistory); // MaritallHistory
			$this->updateSort($this->MenstrualHistory); // MenstrualHistory
			$this->updateSort($this->SurgicalHistory); // SurgicalHistory
			$this->updateSort($this->PastHistory); // PastHistory
			$this->updateSort($this->FamilyHistory); // FamilyHistory
			$this->updateSort($this->Temp); // Temp
			$this->updateSort($this->Pulse); // Pulse
			$this->updateSort($this->BP); // BP
			$this->updateSort($this->CNS); // CNS
			$this->updateSort($this->_RS); // RS
			$this->updateSort($this->CVS); // CVS
			$this->updateSort($this->PA); // PA
			$this->updateSort($this->InvestigationReport); // InvestigationReport
			$this->updateSort($this->TidNo); // TidNo
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
				$this->Name->setSort("");
				$this->DateofAdmission->setSort("");
				$this->DateofProcedure->setSort("");
				$this->DateofDischarge->setSort("");
				$this->Consultant->setSort("");
				$this->Surgeon->setSort("");
				$this->Anesthetist->setSort("");
				$this->IdentificationMark->setSort("");
				$this->ProcedureDone->setSort("");
				$this->PROVISIONALDIAGNOSIS->setSort("");
				$this->Chiefcomplaints->setSort("");
				$this->MaritallHistory->setSort("");
				$this->MenstrualHistory->setSort("");
				$this->SurgicalHistory->setSort("");
				$this->PastHistory->setSort("");
				$this->FamilyHistory->setSort("");
				$this->Temp->setSort("");
				$this->Pulse->setSort("");
				$this->BP->setSort("");
				$this->CNS->setSort("");
				$this->_RS->setSort("");
				$this->CVS->setSort("");
				$this->PA->setSort("");
				$this->InvestigationReport->setSort("");
				$this->TidNo->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_otherprocedurelistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_otherprocedurelistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fivf_otherprocedurelist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_otherprocedurelistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->Age->setDbValue($row['Age']);
		$this->SEX->setDbValue($row['SEX']);
		$this->Address->setDbValue($row['Address']);
		$this->DateofAdmission->setDbValue($row['DateofAdmission']);
		$this->DateofProcedure->setDbValue($row['DateofProcedure']);
		$this->DateofDischarge->setDbValue($row['DateofDischarge']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anesthetist->setDbValue($row['Anesthetist']);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->ProcedureDone->setDbValue($row['ProcedureDone']);
		$this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
		$this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
		$this->MaritallHistory->setDbValue($row['MaritallHistory']);
		$this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
		$this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
		$this->PastHistory->setDbValue($row['PastHistory']);
		$this->FamilyHistory->setDbValue($row['FamilyHistory']);
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->CNS->setDbValue($row['CNS']);
		$this->_RS->setDbValue($row['RS']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->InvestigationReport->setDbValue($row['InvestigationReport']);
		$this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
		$this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
		$this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
		$this->Plan->setDbValue($row['Plan']);
		$this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
		$this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
		$this->TemplateOperation->setDbValue($row['TemplateOperation']);
		$this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
		$this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
		$this->TemplatePlan->setDbValue($row['TemplatePlan']);
		$this->QRCode->setDbValue($row['QRCode']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['SEX'] = NULL;
		$row['Address'] = NULL;
		$row['DateofAdmission'] = NULL;
		$row['DateofProcedure'] = NULL;
		$row['DateofDischarge'] = NULL;
		$row['Consultant'] = NULL;
		$row['Surgeon'] = NULL;
		$row['Anesthetist'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['ProcedureDone'] = NULL;
		$row['PROVISIONALDIAGNOSIS'] = NULL;
		$row['Chiefcomplaints'] = NULL;
		$row['MaritallHistory'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['SurgicalHistory'] = NULL;
		$row['PastHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['Temp'] = NULL;
		$row['Pulse'] = NULL;
		$row['BP'] = NULL;
		$row['CNS'] = NULL;
		$row['RS'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['InvestigationReport'] = NULL;
		$row['FinalDiagnosis'] = NULL;
		$row['Treatment'] = NULL;
		$row['DetailOfOperation'] = NULL;
		$row['FollowUpAdvice'] = NULL;
		$row['FollowUpMedication'] = NULL;
		$row['Plan'] = NULL;
		$row['TempleteFinalDiagnosis'] = NULL;
		$row['TemplateTreatment'] = NULL;
		$row['TemplateOperation'] = NULL;
		$row['TemplateFollowUpAdvice'] = NULL;
		$row['TemplateFollowUpMedication'] = NULL;
		$row['TemplatePlan'] = NULL;
		$row['QRCode'] = NULL;
		$row['TidNo'] = NULL;
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
		// Name
		// Age
		// SEX
		// Address
		// DateofAdmission
		// DateofProcedure
		// DateofDischarge
		// Consultant
		// Surgeon
		// Anesthetist
		// IdentificationMark
		// ProcedureDone
		// PROVISIONALDIAGNOSIS
		// Chiefcomplaints
		// MaritallHistory
		// MenstrualHistory
		// SurgicalHistory
		// PastHistory
		// FamilyHistory
		// Temp
		// Pulse
		// BP
		// CNS
		// RS
		// CVS
		// PA
		// InvestigationReport
		// FinalDiagnosis
		// Treatment
		// DetailOfOperation
		// FollowUpAdvice
		// FollowUpMedication
		// Plan
		// TempleteFinalDiagnosis
		// TemplateTreatment
		// TemplateOperation
		// TemplateFollowUpAdvice
		// TemplateFollowUpMedication
		// TemplatePlan
		// QRCode
		// TidNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Name->ViewValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->ViewValue = $this->Name->CurrentValue;
					}
				}
			} else {
				$this->Name->ViewValue = NULL;
			}
			$this->Name->ViewCustomAttributes = "";

			// DateofAdmission
			$this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
			$this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
			$this->DateofAdmission->ViewCustomAttributes = "";

			// DateofProcedure
			$this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
			$this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
			$this->DateofProcedure->ViewCustomAttributes = "";

			// DateofDischarge
			$this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
			$this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
			$this->DateofDischarge->ViewCustomAttributes = "";

			// Consultant
			$curVal = strval($this->Consultant->CurrentValue);
			if ($curVal <> "") {
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
				if ($this->Consultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
					}
				}
			} else {
				$this->Consultant->ViewValue = NULL;
			}
			$this->Consultant->ViewCustomAttributes = "";

			// Surgeon
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal <> "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
					}
				}
			} else {
				$this->Surgeon->ViewValue = NULL;
			}
			$this->Surgeon->ViewCustomAttributes = "";

			// Anesthetist
			$curVal = strval($this->Anesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
				if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anesthetist->ViewValue = NULL;
			}
			$this->Anesthetist->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// ProcedureDone
			$this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
			$this->ProcedureDone->ViewCustomAttributes = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
			$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
			$this->Chiefcomplaints->ViewCustomAttributes = "";

			// MaritallHistory
			$this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
			$this->MaritallHistory->ViewCustomAttributes = "";

			// MenstrualHistory
			$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// SurgicalHistory
			$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
			$this->SurgicalHistory->ViewCustomAttributes = "";

			// PastHistory
			$this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
			$this->PastHistory->ViewCustomAttributes = "";

			// FamilyHistory
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RS
			$this->_RS->ViewValue = $this->_RS->CurrentValue;
			$this->_RS->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// InvestigationReport
			$this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
			$this->InvestigationReport->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";
			$this->DateofAdmission->TooltipValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";
			$this->DateofProcedure->TooltipValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";
			$this->DateofDischarge->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";
			$this->Anesthetist->TooltipValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";
			$this->ProcedureDone->TooltipValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";
			$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";
			$this->Chiefcomplaints->TooltipValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";
			$this->MaritallHistory->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";
			$this->SurgicalHistory->TooltipValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";
			$this->PastHistory->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";
			$this->Temp->TooltipValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";
			$this->Pulse->TooltipValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";
			$this->BP->TooltipValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";
			$this->_RS->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";
			$this->InvestigationReport->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_otherprocedurelist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_otherprocedurelist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_otherprocedurelist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_ivf_otherprocedure\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_otherprocedure',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_otherprocedurelist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
				case "x_TempleteFinalDiagnosis":
					$lookupFilter = function() {
						return "`TemplateType`='TemplateDiagnosis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateTreatment":
					$lookupFilter = function() {
						return "`TemplateType`='Treatment'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateOperation":
					$lookupFilter = function() {
						return "`TemplateType`='Operation'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpAdvice":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpAdvice '";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpMedication":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpMedication'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePlan":
					$lookupFilter = function() {
						return "`TemplateType`='TemplatePlan'";
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
						case "x_Name":
							break;
						case "x_Consultant":
							break;
						case "x_Surgeon":
							break;
						case "x_Anesthetist":
							break;
						case "x_TempleteFinalDiagnosis":
							break;
						case "x_TemplateTreatment":
							break;
						case "x_TemplateOperation":
							break;
						case "x_TemplateFollowUpAdvice":
							break;
						case "x_TemplateFollowUpMedication":
							break;
						case "x_TemplatePlan":
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
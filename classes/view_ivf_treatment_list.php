<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_ivf_treatment_list extends view_ivf_treatment
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_ivf_treatment';

	// Page object name
	public $PageObjName = "view_ivf_treatment_list";

	// Grid form hidden field names
	public $FormName = "fview_ivf_treatmentlist";
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
	public $ExportExcelCustom = TRUE;
	public $ExportWordCustom = TRUE;
	public $ExportPdfCustom = TRUE;
	public $ExportEmailCustom = TRUE;

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

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS["view_ivf_treatment"]) || get_class($GLOBALS["view_ivf_treatment"]) == PROJECT_NAMESPACE . "view_ivf_treatment") {
			$GLOBALS["view_ivf_treatment"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_ivf_treatment"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_ivf_treatmentadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_ivf_treatmentdelete.php";
		$this->MultiUpdateUrl = "view_ivf_treatmentupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ivf_treatment');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_ivf_treatmentlistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $EXPORT, $view_ivf_treatment;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_ivf_treatment);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
			$key .= @$ar['id'] . $COMPOSITE_KEY_SEPARATOR;
			$key .= @$ar['id1'];
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

		// Custom export (post back from ew.applyTemplate), export and terminate page
		if (Post("customexport") !== NULL) {
			$this->CustomExport = Post("customexport");
			$this->Export = $this->CustomExport;
			$this->terminate();
		}

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
		$this->Age->setVisibility();
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TreatmentStartDate->setVisibility();
		$this->TreatementStopDate->setVisibility();
		$this->TypePatient->setVisibility();
		$this->Treatment->setVisibility();
		$this->TreatmentTec->setVisibility();
		$this->TypeOfCycle->setVisibility();
		$this->SpermOrgin->setVisibility();
		$this->State->setVisibility();
		$this->Origin->setVisibility();
		$this->MACS->setVisibility();
		$this->Technique->setVisibility();
		$this->PgdPlanning->setVisibility();
		$this->IMSI->setVisibility();
		$this->SequentialCulture->setVisibility();
		$this->TimeLapse->setVisibility();
		$this->AH->setVisibility();
		$this->Weight->setVisibility();
		$this->BMI->setVisibility();
		$this->status1->Visible = FALSE;
		$this->id1->Visible = FALSE;
		$this->Male->setVisibility();
		$this->Female->setVisibility();
		$this->malepropic->setVisibility();
		$this->femalepropic->setVisibility();
		$this->HusbandEducation->setVisibility();
		$this->WifeEducation->setVisibility();
		$this->HusbandWorkHours->setVisibility();
		$this->WifeWorkHours->setVisibility();
		$this->PatientLanguage->setVisibility();
		$this->ReferedBy->setVisibility();
		$this->ReferPhNo->setVisibility();
		$this->ARTCYCLE1->setVisibility();
		$this->RESULT1->setVisibility();
		$this->CoupleID->setVisibility();
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
		$this->setupLookupOptions($this->status1);
		$this->setupLookupOptions($this->Male);
		$this->setupLookupOptions($this->Female);
		$this->setupLookupOptions($this->ReferedBy);
		$this->AllowAddDeleteRow = FALSE; // Do not allow add/delete row

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
		if (count($arKeyFlds) >= 2) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
			$this->id1->setFormValue($arKeyFlds[1]);
			if (!is_numeric($this->id1->FormValue))
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_ivf_treatmentlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
		$filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
		$filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->TreatmentStartDate->AdvancedSearch->toJson(), ","); // Field TreatmentStartDate
		$filterList = Concat($filterList, $this->TreatementStopDate->AdvancedSearch->toJson(), ","); // Field TreatementStopDate
		$filterList = Concat($filterList, $this->TypePatient->AdvancedSearch->toJson(), ","); // Field TypePatient
		$filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
		$filterList = Concat($filterList, $this->TreatmentTec->AdvancedSearch->toJson(), ","); // Field TreatmentTec
		$filterList = Concat($filterList, $this->TypeOfCycle->AdvancedSearch->toJson(), ","); // Field TypeOfCycle
		$filterList = Concat($filterList, $this->SpermOrgin->AdvancedSearch->toJson(), ","); // Field SpermOrgin
		$filterList = Concat($filterList, $this->State->AdvancedSearch->toJson(), ","); // Field State
		$filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
		$filterList = Concat($filterList, $this->MACS->AdvancedSearch->toJson(), ","); // Field MACS
		$filterList = Concat($filterList, $this->Technique->AdvancedSearch->toJson(), ","); // Field Technique
		$filterList = Concat($filterList, $this->PgdPlanning->AdvancedSearch->toJson(), ","); // Field PgdPlanning
		$filterList = Concat($filterList, $this->IMSI->AdvancedSearch->toJson(), ","); // Field IMSI
		$filterList = Concat($filterList, $this->SequentialCulture->AdvancedSearch->toJson(), ","); // Field SequentialCulture
		$filterList = Concat($filterList, $this->TimeLapse->AdvancedSearch->toJson(), ","); // Field TimeLapse
		$filterList = Concat($filterList, $this->AH->AdvancedSearch->toJson(), ","); // Field AH
		$filterList = Concat($filterList, $this->Weight->AdvancedSearch->toJson(), ","); // Field Weight
		$filterList = Concat($filterList, $this->BMI->AdvancedSearch->toJson(), ","); // Field BMI
		$filterList = Concat($filterList, $this->status1->AdvancedSearch->toJson(), ","); // Field status1
		$filterList = Concat($filterList, $this->id1->AdvancedSearch->toJson(), ","); // Field id1
		$filterList = Concat($filterList, $this->Male->AdvancedSearch->toJson(), ","); // Field Male
		$filterList = Concat($filterList, $this->Female->AdvancedSearch->toJson(), ","); // Field Female
		$filterList = Concat($filterList, $this->malepropic->AdvancedSearch->toJson(), ","); // Field malepropic
		$filterList = Concat($filterList, $this->femalepropic->AdvancedSearch->toJson(), ","); // Field femalepropic
		$filterList = Concat($filterList, $this->HusbandEducation->AdvancedSearch->toJson(), ","); // Field HusbandEducation
		$filterList = Concat($filterList, $this->WifeEducation->AdvancedSearch->toJson(), ","); // Field WifeEducation
		$filterList = Concat($filterList, $this->HusbandWorkHours->AdvancedSearch->toJson(), ","); // Field HusbandWorkHours
		$filterList = Concat($filterList, $this->WifeWorkHours->AdvancedSearch->toJson(), ","); // Field WifeWorkHours
		$filterList = Concat($filterList, $this->PatientLanguage->AdvancedSearch->toJson(), ","); // Field PatientLanguage
		$filterList = Concat($filterList, $this->ReferedBy->AdvancedSearch->toJson(), ","); // Field ReferedBy
		$filterList = Concat($filterList, $this->ReferPhNo->AdvancedSearch->toJson(), ","); // Field ReferPhNo
		$filterList = Concat($filterList, $this->ARTCYCLE1->AdvancedSearch->toJson(), ","); // Field ARTCYCLE1
		$filterList = Concat($filterList, $this->RESULT1->AdvancedSearch->toJson(), ","); // Field RESULT1
		$filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_ivf_treatmentlistsrch", $filters);
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

		// Field treatment_status
		$this->treatment_status->AdvancedSearch->SearchValue = @$filter["x_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchOperator = @$filter["z_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchCondition = @$filter["v_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchValue2 = @$filter["y_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchOperator2 = @$filter["w_treatment_status"];
		$this->treatment_status->AdvancedSearch->save();

		// Field ARTCYCLE
		$this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->save();

		// Field RESULT
		$this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
		$this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
		$this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
		$this->RESULT->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

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

		// Field TreatmentStartDate
		$this->TreatmentStartDate->AdvancedSearch->SearchValue = @$filter["x_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator = @$filter["z_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchCondition = @$filter["v_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->save();

		// Field TreatementStopDate
		$this->TreatementStopDate->AdvancedSearch->SearchValue = @$filter["x_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchOperator = @$filter["z_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchCondition = @$filter["v_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->save();

		// Field TypePatient
		$this->TypePatient->AdvancedSearch->SearchValue = @$filter["x_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchOperator = @$filter["z_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchCondition = @$filter["v_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchValue2 = @$filter["y_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchOperator2 = @$filter["w_TypePatient"];
		$this->TypePatient->AdvancedSearch->save();

		// Field Treatment
		$this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
		$this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
		$this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
		$this->Treatment->AdvancedSearch->save();

		// Field TreatmentTec
		$this->TreatmentTec->AdvancedSearch->SearchValue = @$filter["x_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchOperator = @$filter["z_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchCondition = @$filter["v_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->save();

		// Field TypeOfCycle
		$this->TypeOfCycle->AdvancedSearch->SearchValue = @$filter["x_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchOperator = @$filter["z_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchCondition = @$filter["v_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->save();

		// Field SpermOrgin
		$this->SpermOrgin->AdvancedSearch->SearchValue = @$filter["x_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchOperator = @$filter["z_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchCondition = @$filter["v_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchValue2 = @$filter["y_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->save();

		// Field State
		$this->State->AdvancedSearch->SearchValue = @$filter["x_State"];
		$this->State->AdvancedSearch->SearchOperator = @$filter["z_State"];
		$this->State->AdvancedSearch->SearchCondition = @$filter["v_State"];
		$this->State->AdvancedSearch->SearchValue2 = @$filter["y_State"];
		$this->State->AdvancedSearch->SearchOperator2 = @$filter["w_State"];
		$this->State->AdvancedSearch->save();

		// Field Origin
		$this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
		$this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
		$this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
		$this->Origin->AdvancedSearch->save();

		// Field MACS
		$this->MACS->AdvancedSearch->SearchValue = @$filter["x_MACS"];
		$this->MACS->AdvancedSearch->SearchOperator = @$filter["z_MACS"];
		$this->MACS->AdvancedSearch->SearchCondition = @$filter["v_MACS"];
		$this->MACS->AdvancedSearch->SearchValue2 = @$filter["y_MACS"];
		$this->MACS->AdvancedSearch->SearchOperator2 = @$filter["w_MACS"];
		$this->MACS->AdvancedSearch->save();

		// Field Technique
		$this->Technique->AdvancedSearch->SearchValue = @$filter["x_Technique"];
		$this->Technique->AdvancedSearch->SearchOperator = @$filter["z_Technique"];
		$this->Technique->AdvancedSearch->SearchCondition = @$filter["v_Technique"];
		$this->Technique->AdvancedSearch->SearchValue2 = @$filter["y_Technique"];
		$this->Technique->AdvancedSearch->SearchOperator2 = @$filter["w_Technique"];
		$this->Technique->AdvancedSearch->save();

		// Field PgdPlanning
		$this->PgdPlanning->AdvancedSearch->SearchValue = @$filter["x_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchOperator = @$filter["z_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchCondition = @$filter["v_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchValue2 = @$filter["y_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchOperator2 = @$filter["w_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->save();

		// Field IMSI
		$this->IMSI->AdvancedSearch->SearchValue = @$filter["x_IMSI"];
		$this->IMSI->AdvancedSearch->SearchOperator = @$filter["z_IMSI"];
		$this->IMSI->AdvancedSearch->SearchCondition = @$filter["v_IMSI"];
		$this->IMSI->AdvancedSearch->SearchValue2 = @$filter["y_IMSI"];
		$this->IMSI->AdvancedSearch->SearchOperator2 = @$filter["w_IMSI"];
		$this->IMSI->AdvancedSearch->save();

		// Field SequentialCulture
		$this->SequentialCulture->AdvancedSearch->SearchValue = @$filter["x_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchOperator = @$filter["z_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchCondition = @$filter["v_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->save();

		// Field TimeLapse
		$this->TimeLapse->AdvancedSearch->SearchValue = @$filter["x_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchOperator = @$filter["z_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchCondition = @$filter["v_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchValue2 = @$filter["y_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->save();

		// Field AH
		$this->AH->AdvancedSearch->SearchValue = @$filter["x_AH"];
		$this->AH->AdvancedSearch->SearchOperator = @$filter["z_AH"];
		$this->AH->AdvancedSearch->SearchCondition = @$filter["v_AH"];
		$this->AH->AdvancedSearch->SearchValue2 = @$filter["y_AH"];
		$this->AH->AdvancedSearch->SearchOperator2 = @$filter["w_AH"];
		$this->AH->AdvancedSearch->save();

		// Field Weight
		$this->Weight->AdvancedSearch->SearchValue = @$filter["x_Weight"];
		$this->Weight->AdvancedSearch->SearchOperator = @$filter["z_Weight"];
		$this->Weight->AdvancedSearch->SearchCondition = @$filter["v_Weight"];
		$this->Weight->AdvancedSearch->SearchValue2 = @$filter["y_Weight"];
		$this->Weight->AdvancedSearch->SearchOperator2 = @$filter["w_Weight"];
		$this->Weight->AdvancedSearch->save();

		// Field BMI
		$this->BMI->AdvancedSearch->SearchValue = @$filter["x_BMI"];
		$this->BMI->AdvancedSearch->SearchOperator = @$filter["z_BMI"];
		$this->BMI->AdvancedSearch->SearchCondition = @$filter["v_BMI"];
		$this->BMI->AdvancedSearch->SearchValue2 = @$filter["y_BMI"];
		$this->BMI->AdvancedSearch->SearchOperator2 = @$filter["w_BMI"];
		$this->BMI->AdvancedSearch->save();

		// Field status1
		$this->status1->AdvancedSearch->SearchValue = @$filter["x_status1"];
		$this->status1->AdvancedSearch->SearchOperator = @$filter["z_status1"];
		$this->status1->AdvancedSearch->SearchCondition = @$filter["v_status1"];
		$this->status1->AdvancedSearch->SearchValue2 = @$filter["y_status1"];
		$this->status1->AdvancedSearch->SearchOperator2 = @$filter["w_status1"];
		$this->status1->AdvancedSearch->save();

		// Field id1
		$this->id1->AdvancedSearch->SearchValue = @$filter["x_id1"];
		$this->id1->AdvancedSearch->SearchOperator = @$filter["z_id1"];
		$this->id1->AdvancedSearch->SearchCondition = @$filter["v_id1"];
		$this->id1->AdvancedSearch->SearchValue2 = @$filter["y_id1"];
		$this->id1->AdvancedSearch->SearchOperator2 = @$filter["w_id1"];
		$this->id1->AdvancedSearch->save();

		// Field Male
		$this->Male->AdvancedSearch->SearchValue = @$filter["x_Male"];
		$this->Male->AdvancedSearch->SearchOperator = @$filter["z_Male"];
		$this->Male->AdvancedSearch->SearchCondition = @$filter["v_Male"];
		$this->Male->AdvancedSearch->SearchValue2 = @$filter["y_Male"];
		$this->Male->AdvancedSearch->SearchOperator2 = @$filter["w_Male"];
		$this->Male->AdvancedSearch->save();

		// Field Female
		$this->Female->AdvancedSearch->SearchValue = @$filter["x_Female"];
		$this->Female->AdvancedSearch->SearchOperator = @$filter["z_Female"];
		$this->Female->AdvancedSearch->SearchCondition = @$filter["v_Female"];
		$this->Female->AdvancedSearch->SearchValue2 = @$filter["y_Female"];
		$this->Female->AdvancedSearch->SearchOperator2 = @$filter["w_Female"];
		$this->Female->AdvancedSearch->save();

		// Field malepropic
		$this->malepropic->AdvancedSearch->SearchValue = @$filter["x_malepropic"];
		$this->malepropic->AdvancedSearch->SearchOperator = @$filter["z_malepropic"];
		$this->malepropic->AdvancedSearch->SearchCondition = @$filter["v_malepropic"];
		$this->malepropic->AdvancedSearch->SearchValue2 = @$filter["y_malepropic"];
		$this->malepropic->AdvancedSearch->SearchOperator2 = @$filter["w_malepropic"];
		$this->malepropic->AdvancedSearch->save();

		// Field femalepropic
		$this->femalepropic->AdvancedSearch->SearchValue = @$filter["x_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchOperator = @$filter["z_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchCondition = @$filter["v_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchValue2 = @$filter["y_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchOperator2 = @$filter["w_femalepropic"];
		$this->femalepropic->AdvancedSearch->save();

		// Field HusbandEducation
		$this->HusbandEducation->AdvancedSearch->SearchValue = @$filter["x_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchOperator = @$filter["z_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchCondition = @$filter["v_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->save();

		// Field WifeEducation
		$this->WifeEducation->AdvancedSearch->SearchValue = @$filter["x_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchOperator = @$filter["z_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchCondition = @$filter["v_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchValue2 = @$filter["y_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->save();

		// Field HusbandWorkHours
		$this->HusbandWorkHours->AdvancedSearch->SearchValue = @$filter["x_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchOperator = @$filter["z_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchCondition = @$filter["v_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->save();

		// Field WifeWorkHours
		$this->WifeWorkHours->AdvancedSearch->SearchValue = @$filter["x_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchOperator = @$filter["z_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchCondition = @$filter["v_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->save();

		// Field PatientLanguage
		$this->PatientLanguage->AdvancedSearch->SearchValue = @$filter["x_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchOperator = @$filter["z_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchCondition = @$filter["v_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchValue2 = @$filter["y_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchOperator2 = @$filter["w_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->save();

		// Field ReferedBy
		$this->ReferedBy->AdvancedSearch->SearchValue = @$filter["x_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchOperator = @$filter["z_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchCondition = @$filter["v_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchValue2 = @$filter["y_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->save();

		// Field ReferPhNo
		$this->ReferPhNo->AdvancedSearch->SearchValue = @$filter["x_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchOperator = @$filter["z_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchCondition = @$filter["v_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->save();

		// Field ARTCYCLE1
		$this->ARTCYCLE1->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE1"];
		$this->ARTCYCLE1->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE1"];
		$this->ARTCYCLE1->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE1"];
		$this->ARTCYCLE1->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE1"];
		$this->ARTCYCLE1->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE1"];
		$this->ARTCYCLE1->AdvancedSearch->save();

		// Field RESULT1
		$this->RESULT1->AdvancedSearch->SearchValue = @$filter["x_RESULT1"];
		$this->RESULT1->AdvancedSearch->SearchOperator = @$filter["z_RESULT1"];
		$this->RESULT1->AdvancedSearch->SearchCondition = @$filter["v_RESULT1"];
		$this->RESULT1->AdvancedSearch->SearchValue2 = @$filter["y_RESULT1"];
		$this->RESULT1->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT1"];
		$this->RESULT1->AdvancedSearch->save();

		// Field CoupleID
		$this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
		$this->CoupleID->AdvancedSearch->save();

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

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->RIDNO, $default, FALSE); // RIDNO
		$this->buildSearchSql($where, $this->Name, $default, FALSE); // Name
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->treatment_status, $default, FALSE); // treatment_status
		$this->buildSearchSql($where, $this->ARTCYCLE, $default, FALSE); // ARTCYCLE
		$this->buildSearchSql($where, $this->RESULT, $default, FALSE); // RESULT
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->TreatmentStartDate, $default, FALSE); // TreatmentStartDate
		$this->buildSearchSql($where, $this->TreatementStopDate, $default, FALSE); // TreatementStopDate
		$this->buildSearchSql($where, $this->TypePatient, $default, FALSE); // TypePatient
		$this->buildSearchSql($where, $this->Treatment, $default, FALSE); // Treatment
		$this->buildSearchSql($where, $this->TreatmentTec, $default, FALSE); // TreatmentTec
		$this->buildSearchSql($where, $this->TypeOfCycle, $default, FALSE); // TypeOfCycle
		$this->buildSearchSql($where, $this->SpermOrgin, $default, FALSE); // SpermOrgin
		$this->buildSearchSql($where, $this->State, $default, FALSE); // State
		$this->buildSearchSql($where, $this->Origin, $default, FALSE); // Origin
		$this->buildSearchSql($where, $this->MACS, $default, FALSE); // MACS
		$this->buildSearchSql($where, $this->Technique, $default, FALSE); // Technique
		$this->buildSearchSql($where, $this->PgdPlanning, $default, FALSE); // PgdPlanning
		$this->buildSearchSql($where, $this->IMSI, $default, FALSE); // IMSI
		$this->buildSearchSql($where, $this->SequentialCulture, $default, FALSE); // SequentialCulture
		$this->buildSearchSql($where, $this->TimeLapse, $default, FALSE); // TimeLapse
		$this->buildSearchSql($where, $this->AH, $default, FALSE); // AH
		$this->buildSearchSql($where, $this->Weight, $default, FALSE); // Weight
		$this->buildSearchSql($where, $this->BMI, $default, FALSE); // BMI
		$this->buildSearchSql($where, $this->status1, $default, FALSE); // status1
		$this->buildSearchSql($where, $this->id1, $default, FALSE); // id1
		$this->buildSearchSql($where, $this->Male, $default, FALSE); // Male
		$this->buildSearchSql($where, $this->Female, $default, FALSE); // Female
		$this->buildSearchSql($where, $this->malepropic, $default, FALSE); // malepropic
		$this->buildSearchSql($where, $this->femalepropic, $default, FALSE); // femalepropic
		$this->buildSearchSql($where, $this->HusbandEducation, $default, FALSE); // HusbandEducation
		$this->buildSearchSql($where, $this->WifeEducation, $default, FALSE); // WifeEducation
		$this->buildSearchSql($where, $this->HusbandWorkHours, $default, FALSE); // HusbandWorkHours
		$this->buildSearchSql($where, $this->WifeWorkHours, $default, FALSE); // WifeWorkHours
		$this->buildSearchSql($where, $this->PatientLanguage, $default, FALSE); // PatientLanguage
		$this->buildSearchSql($where, $this->ReferedBy, $default, FALSE); // ReferedBy
		$this->buildSearchSql($where, $this->ReferPhNo, $default, FALSE); // ReferPhNo
		$this->buildSearchSql($where, $this->ARTCYCLE1, $default, FALSE); // ARTCYCLE1
		$this->buildSearchSql($where, $this->RESULT1, $default, FALSE); // RESULT1
		$this->buildSearchSql($where, $this->CoupleID, $default, FALSE); // CoupleID
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->RIDNO->AdvancedSearch->save(); // RIDNO
			$this->Name->AdvancedSearch->save(); // Name
			$this->Age->AdvancedSearch->save(); // Age
			$this->treatment_status->AdvancedSearch->save(); // treatment_status
			$this->ARTCYCLE->AdvancedSearch->save(); // ARTCYCLE
			$this->RESULT->AdvancedSearch->save(); // RESULT
			$this->status->AdvancedSearch->save(); // status
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->TreatmentStartDate->AdvancedSearch->save(); // TreatmentStartDate
			$this->TreatementStopDate->AdvancedSearch->save(); // TreatementStopDate
			$this->TypePatient->AdvancedSearch->save(); // TypePatient
			$this->Treatment->AdvancedSearch->save(); // Treatment
			$this->TreatmentTec->AdvancedSearch->save(); // TreatmentTec
			$this->TypeOfCycle->AdvancedSearch->save(); // TypeOfCycle
			$this->SpermOrgin->AdvancedSearch->save(); // SpermOrgin
			$this->State->AdvancedSearch->save(); // State
			$this->Origin->AdvancedSearch->save(); // Origin
			$this->MACS->AdvancedSearch->save(); // MACS
			$this->Technique->AdvancedSearch->save(); // Technique
			$this->PgdPlanning->AdvancedSearch->save(); // PgdPlanning
			$this->IMSI->AdvancedSearch->save(); // IMSI
			$this->SequentialCulture->AdvancedSearch->save(); // SequentialCulture
			$this->TimeLapse->AdvancedSearch->save(); // TimeLapse
			$this->AH->AdvancedSearch->save(); // AH
			$this->Weight->AdvancedSearch->save(); // Weight
			$this->BMI->AdvancedSearch->save(); // BMI
			$this->status1->AdvancedSearch->save(); // status1
			$this->id1->AdvancedSearch->save(); // id1
			$this->Male->AdvancedSearch->save(); // Male
			$this->Female->AdvancedSearch->save(); // Female
			$this->malepropic->AdvancedSearch->save(); // malepropic
			$this->femalepropic->AdvancedSearch->save(); // femalepropic
			$this->HusbandEducation->AdvancedSearch->save(); // HusbandEducation
			$this->WifeEducation->AdvancedSearch->save(); // WifeEducation
			$this->HusbandWorkHours->AdvancedSearch->save(); // HusbandWorkHours
			$this->WifeWorkHours->AdvancedSearch->save(); // WifeWorkHours
			$this->PatientLanguage->AdvancedSearch->save(); // PatientLanguage
			$this->ReferedBy->AdvancedSearch->save(); // ReferedBy
			$this->ReferPhNo->AdvancedSearch->save(); // ReferPhNo
			$this->ARTCYCLE1->AdvancedSearch->save(); // ARTCYCLE1
			$this->RESULT1->AdvancedSearch->save(); // RESULT1
			$this->CoupleID->AdvancedSearch->save(); // CoupleID
			$this->HospID->AdvancedSearch->save(); // HospID
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
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->treatment_status, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypePatient, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TreatmentTec, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeOfCycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermOrgin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->State, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MACS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Technique, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PgdPlanning, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IMSI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SequentialCulture, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TimeLapse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Weight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->malepropic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->femalepropic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandEducation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeEducation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandWorkHours, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeWorkHours, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientLanguage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferPhNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ARTCYCLE1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESULT1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
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
		if ($this->Name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->treatment_status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ARTCYCLE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RESULT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifieddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TreatmentStartDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TreatementStopDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TypePatient->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Treatment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TreatmentTec->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TypeOfCycle->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SpermOrgin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->State->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Origin->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MACS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Technique->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PgdPlanning->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IMSI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SequentialCulture->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TimeLapse->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Weight->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BMI->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->id1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Male->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Female->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->malepropic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->femalepropic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HusbandEducation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WifeEducation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HusbandWorkHours->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WifeWorkHours->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientLanguage->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferPhNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ARTCYCLE1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RESULT1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CoupleID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
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
		$this->Name->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->treatment_status->AdvancedSearch->unsetSession();
		$this->ARTCYCLE->AdvancedSearch->unsetSession();
		$this->RESULT->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->TreatmentStartDate->AdvancedSearch->unsetSession();
		$this->TreatementStopDate->AdvancedSearch->unsetSession();
		$this->TypePatient->AdvancedSearch->unsetSession();
		$this->Treatment->AdvancedSearch->unsetSession();
		$this->TreatmentTec->AdvancedSearch->unsetSession();
		$this->TypeOfCycle->AdvancedSearch->unsetSession();
		$this->SpermOrgin->AdvancedSearch->unsetSession();
		$this->State->AdvancedSearch->unsetSession();
		$this->Origin->AdvancedSearch->unsetSession();
		$this->MACS->AdvancedSearch->unsetSession();
		$this->Technique->AdvancedSearch->unsetSession();
		$this->PgdPlanning->AdvancedSearch->unsetSession();
		$this->IMSI->AdvancedSearch->unsetSession();
		$this->SequentialCulture->AdvancedSearch->unsetSession();
		$this->TimeLapse->AdvancedSearch->unsetSession();
		$this->AH->AdvancedSearch->unsetSession();
		$this->Weight->AdvancedSearch->unsetSession();
		$this->BMI->AdvancedSearch->unsetSession();
		$this->status1->AdvancedSearch->unsetSession();
		$this->id1->AdvancedSearch->unsetSession();
		$this->Male->AdvancedSearch->unsetSession();
		$this->Female->AdvancedSearch->unsetSession();
		$this->malepropic->AdvancedSearch->unsetSession();
		$this->femalepropic->AdvancedSearch->unsetSession();
		$this->HusbandEducation->AdvancedSearch->unsetSession();
		$this->WifeEducation->AdvancedSearch->unsetSession();
		$this->HusbandWorkHours->AdvancedSearch->unsetSession();
		$this->WifeWorkHours->AdvancedSearch->unsetSession();
		$this->PatientLanguage->AdvancedSearch->unsetSession();
		$this->ReferedBy->AdvancedSearch->unsetSession();
		$this->ReferPhNo->AdvancedSearch->unsetSession();
		$this->ARTCYCLE1->AdvancedSearch->unsetSession();
		$this->RESULT1->AdvancedSearch->unsetSession();
		$this->CoupleID->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
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
		$this->Name->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->treatment_status->AdvancedSearch->load();
		$this->ARTCYCLE->AdvancedSearch->load();
		$this->RESULT->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->TreatmentStartDate->AdvancedSearch->load();
		$this->TreatementStopDate->AdvancedSearch->load();
		$this->TypePatient->AdvancedSearch->load();
		$this->Treatment->AdvancedSearch->load();
		$this->TreatmentTec->AdvancedSearch->load();
		$this->TypeOfCycle->AdvancedSearch->load();
		$this->SpermOrgin->AdvancedSearch->load();
		$this->State->AdvancedSearch->load();
		$this->Origin->AdvancedSearch->load();
		$this->MACS->AdvancedSearch->load();
		$this->Technique->AdvancedSearch->load();
		$this->PgdPlanning->AdvancedSearch->load();
		$this->IMSI->AdvancedSearch->load();
		$this->SequentialCulture->AdvancedSearch->load();
		$this->TimeLapse->AdvancedSearch->load();
		$this->AH->AdvancedSearch->load();
		$this->Weight->AdvancedSearch->load();
		$this->BMI->AdvancedSearch->load();
		$this->status1->AdvancedSearch->load();
		$this->id1->AdvancedSearch->load();
		$this->Male->AdvancedSearch->load();
		$this->Female->AdvancedSearch->load();
		$this->malepropic->AdvancedSearch->load();
		$this->femalepropic->AdvancedSearch->load();
		$this->HusbandEducation->AdvancedSearch->load();
		$this->WifeEducation->AdvancedSearch->load();
		$this->HusbandWorkHours->AdvancedSearch->load();
		$this->WifeWorkHours->AdvancedSearch->load();
		$this->PatientLanguage->AdvancedSearch->load();
		$this->ReferedBy->AdvancedSearch->load();
		$this->ReferPhNo->AdvancedSearch->load();
		$this->ARTCYCLE1->AdvancedSearch->load();
		$this->RESULT1->AdvancedSearch->load();
		$this->CoupleID->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
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
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->treatment_status); // treatment_status
			$this->updateSort($this->ARTCYCLE); // ARTCYCLE
			$this->updateSort($this->RESULT); // RESULT
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->TreatmentStartDate); // TreatmentStartDate
			$this->updateSort($this->TreatementStopDate); // TreatementStopDate
			$this->updateSort($this->TypePatient); // TypePatient
			$this->updateSort($this->Treatment); // Treatment
			$this->updateSort($this->TreatmentTec); // TreatmentTec
			$this->updateSort($this->TypeOfCycle); // TypeOfCycle
			$this->updateSort($this->SpermOrgin); // SpermOrgin
			$this->updateSort($this->State); // State
			$this->updateSort($this->Origin); // Origin
			$this->updateSort($this->MACS); // MACS
			$this->updateSort($this->Technique); // Technique
			$this->updateSort($this->PgdPlanning); // PgdPlanning
			$this->updateSort($this->IMSI); // IMSI
			$this->updateSort($this->SequentialCulture); // SequentialCulture
			$this->updateSort($this->TimeLapse); // TimeLapse
			$this->updateSort($this->AH); // AH
			$this->updateSort($this->Weight); // Weight
			$this->updateSort($this->BMI); // BMI
			$this->updateSort($this->Male); // Male
			$this->updateSort($this->Female); // Female
			$this->updateSort($this->malepropic); // malepropic
			$this->updateSort($this->femalepropic); // femalepropic
			$this->updateSort($this->HusbandEducation); // HusbandEducation
			$this->updateSort($this->WifeEducation); // WifeEducation
			$this->updateSort($this->HusbandWorkHours); // HusbandWorkHours
			$this->updateSort($this->WifeWorkHours); // WifeWorkHours
			$this->updateSort($this->PatientLanguage); // PatientLanguage
			$this->updateSort($this->ReferedBy); // ReferedBy
			$this->updateSort($this->ReferPhNo); // ReferPhNo
			$this->updateSort($this->ARTCYCLE1); // ARTCYCLE1
			$this->updateSort($this->RESULT1); // RESULT1
			$this->updateSort($this->CoupleID); // CoupleID
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
				$this->setSessionOrderByList($orderBy);
				$this->id->setSort("");
				$this->RIDNO->setSort("");
				$this->Name->setSort("");
				$this->Age->setSort("");
				$this->treatment_status->setSort("");
				$this->ARTCYCLE->setSort("");
				$this->RESULT->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->TreatmentStartDate->setSort("");
				$this->TreatementStopDate->setSort("");
				$this->TypePatient->setSort("");
				$this->Treatment->setSort("");
				$this->TreatmentTec->setSort("");
				$this->TypeOfCycle->setSort("");
				$this->SpermOrgin->setSort("");
				$this->State->setSort("");
				$this->Origin->setSort("");
				$this->MACS->setSort("");
				$this->Technique->setSort("");
				$this->PgdPlanning->setSort("");
				$this->IMSI->setSort("");
				$this->SequentialCulture->setSort("");
				$this->TimeLapse->setSort("");
				$this->AH->setSort("");
				$this->Weight->setSort("");
				$this->BMI->setSort("");
				$this->Male->setSort("");
				$this->Female->setSort("");
				$this->malepropic->setSort("");
				$this->femalepropic->setSort("");
				$this->HusbandEducation->setSort("");
				$this->WifeEducation->setSort("");
				$this->HusbandWorkHours->setSort("");
				$this->WifeWorkHours->setSort("");
				$this->PatientLanguage->setSort("");
				$this->ReferedBy->setSort("");
				$this->ReferPhNo->setSort("");
				$this->ARTCYCLE1->setSort("");
				$this->RESULT1->setSort("");
				$this->CoupleID->setSort("");
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

		// "detail_ivf_semenanalysisreport"
		$item = &$this->ListOptions->add("detail_ivf_semenanalysisreport");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
			$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();

		// "detail_ivf_oocytedenudation"
		$item = &$this->ListOptions->add("detail_ivf_oocytedenudation");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_oocytedenudation_grid"]))
			$GLOBALS["ivf_oocytedenudation_grid"] = new ivf_oocytedenudation_grid();

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
		$pages->add("ivf_semenanalysisreport");
		$pages->add("ivf_oocytedenudation");
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

		// "detail_ivf_semenanalysisreport"
		$opt = &$this->ListOptions->Items["detail_ivf_semenanalysisreport"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_semenanalysisreportlist.php?" . TABLE_SHOW_MASTER . "=view_ivf_treatment&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_semenanalysisreport";
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

		// "detail_ivf_oocytedenudation"
		$opt = &$this->ListOptions->Items["detail_ivf_oocytedenudation"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_oocytedenudation", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_oocytedenudationlist.php?" . TABLE_SHOW_MASTER . "=view_ivf_treatment&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_oocytedenudation_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_oocytedenudation");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_oocytedenudation";
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . $GLOBALS["COMPOSITE_KEY_SEPARATOR"] . $this->id1->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_ivf_treatmentlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_ivf_treatmentlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_ivf_treatmentlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatmentlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-highlight active\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatmentlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</button>";
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
		$sqlwrk = "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`PatientName`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";

		// Column "detail_ivf_semenanalysisreport"
		if ($this->DetailPages->Items["ivf_semenanalysisreport"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_semenanalysisreport"];
			$url = "ivf_semenanalysisreportpreview.php?t=view_ivf_treatment&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$label = $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_semenanalysisreportlist.php?" . TABLE_SHOW_MASTER . "=view_ivf_treatment&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
				$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";

		// Column "detail_ivf_oocytedenudation"
		if ($this->DetailPages->Items["ivf_oocytedenudation"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_oocytedenudation"];
			$url = "ivf_oocytedenudationpreview.php?t=view_ivf_treatment&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_oocytedenudation\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$label = $Language->TablePhrase("ivf_oocytedenudation", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_oocytedenudation\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_oocytedenudationlist.php?" . TABLE_SHOW_MASTER . "=view_ivf_treatment&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_oocytedenudation", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_oocytedenudation_grid"]))
				$GLOBALS["ivf_oocytedenudation_grid"] = new ivf_oocytedenudation_grid();
			if ($GLOBALS["ivf_oocytedenudation_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_oocytedenudation");
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

		// RIDNO
		if (!$this->isAddOrEdit())
			$this->RIDNO->AdvancedSearch->setSearchValue(Get("x_RIDNO", Get("RIDNO", "")));
		if ($this->RIDNO->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RIDNO->AdvancedSearch->setSearchOperator(Get("z_RIDNO", ""));

		// Name
		if (!$this->isAddOrEdit())
			$this->Name->AdvancedSearch->setSearchValue(Get("x_Name", Get("Name", "")));
		if ($this->Name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Name->AdvancedSearch->setSearchOperator(Get("z_Name", ""));

		// Age
		if (!$this->isAddOrEdit())
			$this->Age->AdvancedSearch->setSearchValue(Get("x_Age", Get("Age", "")));
		if ($this->Age->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Age->AdvancedSearch->setSearchOperator(Get("z_Age", ""));

		// treatment_status
		if (!$this->isAddOrEdit())
			$this->treatment_status->AdvancedSearch->setSearchValue(Get("x_treatment_status", Get("treatment_status", "")));
		if ($this->treatment_status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->treatment_status->AdvancedSearch->setSearchOperator(Get("z_treatment_status", ""));

		// ARTCYCLE
		if (!$this->isAddOrEdit())
			$this->ARTCYCLE->AdvancedSearch->setSearchValue(Get("x_ARTCYCLE", Get("ARTCYCLE", "")));
		if ($this->ARTCYCLE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ARTCYCLE->AdvancedSearch->setSearchOperator(Get("z_ARTCYCLE", ""));

		// RESULT
		if (!$this->isAddOrEdit())
			$this->RESULT->AdvancedSearch->setSearchValue(Get("x_RESULT", Get("RESULT", "")));
		if ($this->RESULT->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RESULT->AdvancedSearch->setSearchOperator(Get("z_RESULT", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));

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

		// TreatmentStartDate
		if (!$this->isAddOrEdit())
			$this->TreatmentStartDate->AdvancedSearch->setSearchValue(Get("x_TreatmentStartDate", Get("TreatmentStartDate", "")));
		if ($this->TreatmentStartDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TreatmentStartDate->AdvancedSearch->setSearchOperator(Get("z_TreatmentStartDate", ""));

		// TreatementStopDate
		if (!$this->isAddOrEdit())
			$this->TreatementStopDate->AdvancedSearch->setSearchValue(Get("x_TreatementStopDate", Get("TreatementStopDate", "")));
		if ($this->TreatementStopDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TreatementStopDate->AdvancedSearch->setSearchOperator(Get("z_TreatementStopDate", ""));

		// TypePatient
		if (!$this->isAddOrEdit())
			$this->TypePatient->AdvancedSearch->setSearchValue(Get("x_TypePatient", Get("TypePatient", "")));
		if ($this->TypePatient->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TypePatient->AdvancedSearch->setSearchOperator(Get("z_TypePatient", ""));

		// Treatment
		if (!$this->isAddOrEdit())
			$this->Treatment->AdvancedSearch->setSearchValue(Get("x_Treatment", Get("Treatment", "")));
		if ($this->Treatment->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Treatment->AdvancedSearch->setSearchOperator(Get("z_Treatment", ""));

		// TreatmentTec
		if (!$this->isAddOrEdit())
			$this->TreatmentTec->AdvancedSearch->setSearchValue(Get("x_TreatmentTec", Get("TreatmentTec", "")));
		if ($this->TreatmentTec->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TreatmentTec->AdvancedSearch->setSearchOperator(Get("z_TreatmentTec", ""));

		// TypeOfCycle
		if (!$this->isAddOrEdit())
			$this->TypeOfCycle->AdvancedSearch->setSearchValue(Get("x_TypeOfCycle", Get("TypeOfCycle", "")));
		if ($this->TypeOfCycle->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TypeOfCycle->AdvancedSearch->setSearchOperator(Get("z_TypeOfCycle", ""));

		// SpermOrgin
		if (!$this->isAddOrEdit())
			$this->SpermOrgin->AdvancedSearch->setSearchValue(Get("x_SpermOrgin", Get("SpermOrgin", "")));
		if ($this->SpermOrgin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SpermOrgin->AdvancedSearch->setSearchOperator(Get("z_SpermOrgin", ""));

		// State
		if (!$this->isAddOrEdit())
			$this->State->AdvancedSearch->setSearchValue(Get("x_State", Get("State", "")));
		if ($this->State->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->State->AdvancedSearch->setSearchOperator(Get("z_State", ""));

		// Origin
		if (!$this->isAddOrEdit())
			$this->Origin->AdvancedSearch->setSearchValue(Get("x_Origin", Get("Origin", "")));
		if ($this->Origin->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Origin->AdvancedSearch->setSearchOperator(Get("z_Origin", ""));

		// MACS
		if (!$this->isAddOrEdit())
			$this->MACS->AdvancedSearch->setSearchValue(Get("x_MACS", Get("MACS", "")));
		if ($this->MACS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MACS->AdvancedSearch->setSearchOperator(Get("z_MACS", ""));

		// Technique
		if (!$this->isAddOrEdit())
			$this->Technique->AdvancedSearch->setSearchValue(Get("x_Technique", Get("Technique", "")));
		if ($this->Technique->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Technique->AdvancedSearch->setSearchOperator(Get("z_Technique", ""));

		// PgdPlanning
		if (!$this->isAddOrEdit())
			$this->PgdPlanning->AdvancedSearch->setSearchValue(Get("x_PgdPlanning", Get("PgdPlanning", "")));
		if ($this->PgdPlanning->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PgdPlanning->AdvancedSearch->setSearchOperator(Get("z_PgdPlanning", ""));

		// IMSI
		if (!$this->isAddOrEdit())
			$this->IMSI->AdvancedSearch->setSearchValue(Get("x_IMSI", Get("IMSI", "")));
		if ($this->IMSI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->IMSI->AdvancedSearch->setSearchOperator(Get("z_IMSI", ""));

		// SequentialCulture
		if (!$this->isAddOrEdit())
			$this->SequentialCulture->AdvancedSearch->setSearchValue(Get("x_SequentialCulture", Get("SequentialCulture", "")));
		if ($this->SequentialCulture->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SequentialCulture->AdvancedSearch->setSearchOperator(Get("z_SequentialCulture", ""));

		// TimeLapse
		if (!$this->isAddOrEdit())
			$this->TimeLapse->AdvancedSearch->setSearchValue(Get("x_TimeLapse", Get("TimeLapse", "")));
		if ($this->TimeLapse->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TimeLapse->AdvancedSearch->setSearchOperator(Get("z_TimeLapse", ""));

		// AH
		if (!$this->isAddOrEdit())
			$this->AH->AdvancedSearch->setSearchValue(Get("x_AH", Get("AH", "")));
		if ($this->AH->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AH->AdvancedSearch->setSearchOperator(Get("z_AH", ""));

		// Weight
		if (!$this->isAddOrEdit())
			$this->Weight->AdvancedSearch->setSearchValue(Get("x_Weight", Get("Weight", "")));
		if ($this->Weight->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Weight->AdvancedSearch->setSearchOperator(Get("z_Weight", ""));

		// BMI
		if (!$this->isAddOrEdit())
			$this->BMI->AdvancedSearch->setSearchValue(Get("x_BMI", Get("BMI", "")));
		if ($this->BMI->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BMI->AdvancedSearch->setSearchOperator(Get("z_BMI", ""));

		// status1
		if (!$this->isAddOrEdit())
			$this->status1->AdvancedSearch->setSearchValue(Get("x_status1", Get("status1", "")));
		if ($this->status1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status1->AdvancedSearch->setSearchOperator(Get("z_status1", ""));

		// id1
		if (!$this->isAddOrEdit())
			$this->id1->AdvancedSearch->setSearchValue(Get("x_id1", Get("id1", "")));
		if ($this->id1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id1->AdvancedSearch->setSearchOperator(Get("z_id1", ""));

		// Male
		if (!$this->isAddOrEdit())
			$this->Male->AdvancedSearch->setSearchValue(Get("x_Male", Get("Male", "")));
		if ($this->Male->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Male->AdvancedSearch->setSearchOperator(Get("z_Male", ""));

		// Female
		if (!$this->isAddOrEdit())
			$this->Female->AdvancedSearch->setSearchValue(Get("x_Female", Get("Female", "")));
		if ($this->Female->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Female->AdvancedSearch->setSearchOperator(Get("z_Female", ""));

		// malepropic
		if (!$this->isAddOrEdit())
			$this->malepropic->AdvancedSearch->setSearchValue(Get("x_malepropic", Get("malepropic", "")));
		if ($this->malepropic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->malepropic->AdvancedSearch->setSearchOperator(Get("z_malepropic", ""));

		// femalepropic
		if (!$this->isAddOrEdit())
			$this->femalepropic->AdvancedSearch->setSearchValue(Get("x_femalepropic", Get("femalepropic", "")));
		if ($this->femalepropic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->femalepropic->AdvancedSearch->setSearchOperator(Get("z_femalepropic", ""));

		// HusbandEducation
		if (!$this->isAddOrEdit())
			$this->HusbandEducation->AdvancedSearch->setSearchValue(Get("x_HusbandEducation", Get("HusbandEducation", "")));
		if ($this->HusbandEducation->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HusbandEducation->AdvancedSearch->setSearchOperator(Get("z_HusbandEducation", ""));

		// WifeEducation
		if (!$this->isAddOrEdit())
			$this->WifeEducation->AdvancedSearch->setSearchValue(Get("x_WifeEducation", Get("WifeEducation", "")));
		if ($this->WifeEducation->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->WifeEducation->AdvancedSearch->setSearchOperator(Get("z_WifeEducation", ""));

		// HusbandWorkHours
		if (!$this->isAddOrEdit())
			$this->HusbandWorkHours->AdvancedSearch->setSearchValue(Get("x_HusbandWorkHours", Get("HusbandWorkHours", "")));
		if ($this->HusbandWorkHours->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HusbandWorkHours->AdvancedSearch->setSearchOperator(Get("z_HusbandWorkHours", ""));

		// WifeWorkHours
		if (!$this->isAddOrEdit())
			$this->WifeWorkHours->AdvancedSearch->setSearchValue(Get("x_WifeWorkHours", Get("WifeWorkHours", "")));
		if ($this->WifeWorkHours->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->WifeWorkHours->AdvancedSearch->setSearchOperator(Get("z_WifeWorkHours", ""));

		// PatientLanguage
		if (!$this->isAddOrEdit())
			$this->PatientLanguage->AdvancedSearch->setSearchValue(Get("x_PatientLanguage", Get("PatientLanguage", "")));
		if ($this->PatientLanguage->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientLanguage->AdvancedSearch->setSearchOperator(Get("z_PatientLanguage", ""));

		// ReferedBy
		if (!$this->isAddOrEdit())
			$this->ReferedBy->AdvancedSearch->setSearchValue(Get("x_ReferedBy", Get("ReferedBy", "")));
		if ($this->ReferedBy->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ReferedBy->AdvancedSearch->setSearchOperator(Get("z_ReferedBy", ""));

		// ReferPhNo
		if (!$this->isAddOrEdit())
			$this->ReferPhNo->AdvancedSearch->setSearchValue(Get("x_ReferPhNo", Get("ReferPhNo", "")));
		if ($this->ReferPhNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ReferPhNo->AdvancedSearch->setSearchOperator(Get("z_ReferPhNo", ""));

		// ARTCYCLE1
		if (!$this->isAddOrEdit())
			$this->ARTCYCLE1->AdvancedSearch->setSearchValue(Get("x_ARTCYCLE1", Get("ARTCYCLE1", "")));
		if ($this->ARTCYCLE1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ARTCYCLE1->AdvancedSearch->setSearchOperator(Get("z_ARTCYCLE1", ""));

		// RESULT1
		if (!$this->isAddOrEdit())
			$this->RESULT1->AdvancedSearch->setSearchValue(Get("x_RESULT1", Get("RESULT1", "")));
		if ($this->RESULT1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RESULT1->AdvancedSearch->setSearchOperator(Get("z_RESULT1", ""));

		// CoupleID
		if (!$this->isAddOrEdit())
			$this->CoupleID->AdvancedSearch->setSearchValue(Get("x_CoupleID", Get("CoupleID", "")));
		if ($this->CoupleID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->CoupleID->AdvancedSearch->setSearchOperator(Get("z_CoupleID", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
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
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
		$this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
		$this->TypePatient->setDbValue($row['TypePatient']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->TreatmentTec->setDbValue($row['TreatmentTec']);
		$this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
		$this->SpermOrgin->setDbValue($row['SpermOrgin']);
		$this->State->setDbValue($row['State']);
		$this->Origin->setDbValue($row['Origin']);
		$this->MACS->setDbValue($row['MACS']);
		$this->Technique->setDbValue($row['Technique']);
		$this->PgdPlanning->setDbValue($row['PgdPlanning']);
		$this->IMSI->setDbValue($row['IMSI']);
		$this->SequentialCulture->setDbValue($row['SequentialCulture']);
		$this->TimeLapse->setDbValue($row['TimeLapse']);
		$this->AH->setDbValue($row['AH']);
		$this->Weight->setDbValue($row['Weight']);
		$this->BMI->setDbValue($row['BMI']);
		$this->status1->setDbValue($row['status1']);
		$this->id1->setDbValue($row['id1']);
		$this->Male->setDbValue($row['Male']);
		if (array_key_exists('EV__Male', $rs->fields)) {
			$this->Male->VirtualValue = $rs->fields('EV__Male'); // Set up virtual field value
		} else {
			$this->Male->VirtualValue = ""; // Clear value
		}
		$this->Female->setDbValue($row['Female']);
		if (array_key_exists('EV__Female', $rs->fields)) {
			$this->Female->VirtualValue = $rs->fields('EV__Female'); // Set up virtual field value
		} else {
			$this->Female->VirtualValue = ""; // Clear value
		}
		$this->malepropic->Upload->DbValue = $row['malepropic'];
		$this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
		$this->femalepropic->Upload->DbValue = $row['femalepropic'];
		$this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
		$this->HusbandEducation->setDbValue($row['HusbandEducation']);
		$this->WifeEducation->setDbValue($row['WifeEducation']);
		$this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
		$this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
		$this->PatientLanguage->setDbValue($row['PatientLanguage']);
		$this->ReferedBy->setDbValue($row['ReferedBy']);
		if (array_key_exists('EV__ReferedBy', $rs->fields)) {
			$this->ReferedBy->VirtualValue = $rs->fields('EV__ReferedBy'); // Set up virtual field value
		} else {
			$this->ReferedBy->VirtualValue = ""; // Clear value
		}
		$this->ReferPhNo->setDbValue($row['ReferPhNo']);
		$this->ARTCYCLE1->setDbValue($row['ARTCYCLE1']);
		$this->RESULT1->setDbValue($row['RESULT1']);
		$this->CoupleID->setDbValue($row['CoupleID']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TreatmentStartDate'] = NULL;
		$row['TreatementStopDate'] = NULL;
		$row['TypePatient'] = NULL;
		$row['Treatment'] = NULL;
		$row['TreatmentTec'] = NULL;
		$row['TypeOfCycle'] = NULL;
		$row['SpermOrgin'] = NULL;
		$row['State'] = NULL;
		$row['Origin'] = NULL;
		$row['MACS'] = NULL;
		$row['Technique'] = NULL;
		$row['PgdPlanning'] = NULL;
		$row['IMSI'] = NULL;
		$row['SequentialCulture'] = NULL;
		$row['TimeLapse'] = NULL;
		$row['AH'] = NULL;
		$row['Weight'] = NULL;
		$row['BMI'] = NULL;
		$row['status1'] = NULL;
		$row['id1'] = NULL;
		$row['Male'] = NULL;
		$row['Female'] = NULL;
		$row['malepropic'] = NULL;
		$row['femalepropic'] = NULL;
		$row['HusbandEducation'] = NULL;
		$row['WifeEducation'] = NULL;
		$row['HusbandWorkHours'] = NULL;
		$row['WifeWorkHours'] = NULL;
		$row['PatientLanguage'] = NULL;
		$row['ReferedBy'] = NULL;
		$row['ReferPhNo'] = NULL;
		$row['ARTCYCLE1'] = NULL;
		$row['RESULT1'] = NULL;
		$row['CoupleID'] = NULL;
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
		if (strval($this->getKey("id1")) <> "")
			$this->id1->CurrentValue = $this->getKey("id1"); // id1
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
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TreatmentStartDate
		// TreatementStopDate
		// TypePatient
		// Treatment
		// TreatmentTec
		// TypeOfCycle
		// SpermOrgin
		// State
		// Origin
		// MACS
		// Technique
		// PgdPlanning
		// IMSI
		// SequentialCulture
		// TimeLapse
		// AH
		// Weight
		// BMI
		// status1
		// id1
		// Male
		// Female
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// ARTCYCLE1
		// RESULT1
		// CoupleID
		// HospID

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
			$this->Name->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			$this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
			$this->RESULT->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
			$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
			$this->TreatmentStartDate->ViewCustomAttributes = "";

			// TreatementStopDate
			$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
			$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
			$this->TreatementStopDate->ViewCustomAttributes = "";

			// TypePatient
			$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
			$this->TypePatient->ViewCustomAttributes = "";

			// Treatment
			$this->Treatment->ViewValue = $this->Treatment->CurrentValue;
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			$this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			$this->MACS->ViewValue = $this->MACS->CurrentValue;
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			$this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
			$this->PgdPlanning->ViewCustomAttributes = "";

			// IMSI
			$this->IMSI->ViewValue = $this->IMSI->CurrentValue;
			$this->IMSI->ViewCustomAttributes = "";

			// SequentialCulture
			$this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
			$this->SequentialCulture->ViewCustomAttributes = "";

			// TimeLapse
			$this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
			$this->TimeLapse->ViewCustomAttributes = "";

			// AH
			$this->AH->ViewValue = $this->AH->CurrentValue;
			$this->AH->ViewCustomAttributes = "";

			// Weight
			$this->Weight->ViewValue = $this->Weight->CurrentValue;
			$this->Weight->ViewCustomAttributes = "";

			// BMI
			$this->BMI->ViewValue = $this->BMI->CurrentValue;
			$this->BMI->ViewCustomAttributes = "";

			// status1
			$curVal = strval($this->status1->CurrentValue);
			if ($curVal <> "") {
				$this->status1->ViewValue = $this->status1->lookupCacheOption($curVal);
				if ($this->status1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->status1->ViewValue = $this->status1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status1->ViewValue = $this->status1->CurrentValue;
					}
				}
			} else {
				$this->status1->ViewValue = NULL;
			}
			$this->status1->ViewCustomAttributes = "";

			// id1
			$this->id1->ViewValue = $this->id1->CurrentValue;
			$this->id1->ViewCustomAttributes = "";

			// Male
			if ($this->Male->VirtualValue <> "") {
				$this->Male->ViewValue = $this->Male->VirtualValue;
			} else {
			$curVal = strval($this->Male->CurrentValue);
			if ($curVal <> "") {
				$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
				if ($this->Male->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Male->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Male->ViewValue = $this->Male->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Male->ViewValue = $this->Male->CurrentValue;
					}
				}
			} else {
				$this->Male->ViewValue = NULL;
			}
			}
			$this->Male->ViewCustomAttributes = "";

			// Female
			if ($this->Female->VirtualValue <> "") {
				$this->Female->ViewValue = $this->Female->VirtualValue;
			} else {
			$curVal = strval($this->Female->CurrentValue);
			if ($curVal <> "") {
				$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
				if ($this->Female->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Female->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Female->ViewValue = $this->Female->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Female->ViewValue = $this->Female->CurrentValue;
					}
				}
			} else {
				$this->Female->ViewValue = NULL;
			}
			}
			$this->Female->ViewCustomAttributes = "";

			// malepropic
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->ImageWidth = 80;
				$this->malepropic->ImageHeight = 80;
				$this->malepropic->ImageAlt = $this->malepropic->alt();
				$this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
			} else {
				$this->malepropic->ViewValue = "";
			}
			$this->malepropic->ViewCustomAttributes = "";

			// femalepropic
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->ImageWidth = 80;
				$this->femalepropic->ImageHeight = 80;
				$this->femalepropic->ImageAlt = $this->femalepropic->alt();
				$this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
			} else {
				$this->femalepropic->ViewValue = "";
			}
			$this->femalepropic->ViewCustomAttributes = "";

			// HusbandEducation
			$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
			$this->HusbandEducation->ViewCustomAttributes = "";

			// WifeEducation
			$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
			$this->WifeEducation->ViewCustomAttributes = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
			$this->HusbandWorkHours->ViewCustomAttributes = "";

			// WifeWorkHours
			$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
			$this->WifeWorkHours->ViewCustomAttributes = "";

			// PatientLanguage
			$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
			$this->PatientLanguage->ViewCustomAttributes = "";

			// ReferedBy
			if ($this->ReferedBy->VirtualValue <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
			} else {
			$curVal = strval($this->ReferedBy->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
				if ($this->ReferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
					}
				}
			} else {
				$this->ReferedBy->ViewValue = NULL;
			}
			}
			$this->ReferedBy->ViewCustomAttributes = "";

			// ReferPhNo
			$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
			$this->ReferPhNo->ViewCustomAttributes = "";

			// ARTCYCLE1
			if (strval($this->ARTCYCLE1->CurrentValue) <> "") {
				$this->ARTCYCLE1->ViewValue = $this->ARTCYCLE1->optionCaption($this->ARTCYCLE1->CurrentValue);
			} else {
				$this->ARTCYCLE1->ViewValue = NULL;
			}
			$this->ARTCYCLE1->ViewCustomAttributes = "";

			// RESULT1
			if (strval($this->RESULT1->CurrentValue) <> "") {
				$this->RESULT1->ViewValue = $this->RESULT1->optionCaption($this->RESULT1->CurrentValue);
			} else {
				$this->RESULT1->ViewValue = NULL;
			}
			$this->RESULT1->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";
			if (!$this->isExport())
				$this->Name->ViewValue = $this->highlightValue($this->Name);

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";
			if (!$this->isExport())
				$this->Age->ViewValue = $this->highlightValue($this->Age);

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";
			if (!$this->isExport())
				$this->treatment_status->ViewValue = $this->highlightValue($this->treatment_status);

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";
			if (!$this->isExport())
				$this->ARTCYCLE->ViewValue = $this->highlightValue($this->ARTCYCLE);

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";
			if (!$this->isExport())
				$this->RESULT->ViewValue = $this->highlightValue($this->RESULT);

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";
			$this->TreatmentStartDate->TooltipValue = "";

			// TreatementStopDate
			$this->TreatementStopDate->LinkCustomAttributes = "";
			$this->TreatementStopDate->HrefValue = "";
			$this->TreatementStopDate->TooltipValue = "";

			// TypePatient
			$this->TypePatient->LinkCustomAttributes = "";
			$this->TypePatient->HrefValue = "";
			$this->TypePatient->TooltipValue = "";
			if (!$this->isExport())
				$this->TypePatient->ViewValue = $this->highlightValue($this->TypePatient);

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";
			if (!$this->isExport())
				$this->Treatment->ViewValue = $this->highlightValue($this->Treatment);

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";
			$this->TreatmentTec->TooltipValue = "";
			if (!$this->isExport())
				$this->TreatmentTec->ViewValue = $this->highlightValue($this->TreatmentTec);

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";
			$this->TypeOfCycle->TooltipValue = "";
			if (!$this->isExport())
				$this->TypeOfCycle->ViewValue = $this->highlightValue($this->TypeOfCycle);

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";
			$this->SpermOrgin->TooltipValue = "";
			if (!$this->isExport())
				$this->SpermOrgin->ViewValue = $this->highlightValue($this->SpermOrgin);

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";
			if (!$this->isExport())
				$this->State->ViewValue = $this->highlightValue($this->State);

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";
			if (!$this->isExport())
				$this->Origin->ViewValue = $this->highlightValue($this->Origin);

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";
			if (!$this->isExport())
				$this->MACS->ViewValue = $this->highlightValue($this->MACS);

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";
			$this->Technique->TooltipValue = "";
			if (!$this->isExport())
				$this->Technique->ViewValue = $this->highlightValue($this->Technique);

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";
			$this->PgdPlanning->TooltipValue = "";
			if (!$this->isExport())
				$this->PgdPlanning->ViewValue = $this->highlightValue($this->PgdPlanning);

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";
			$this->IMSI->TooltipValue = "";
			if (!$this->isExport())
				$this->IMSI->ViewValue = $this->highlightValue($this->IMSI);

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";
			$this->SequentialCulture->TooltipValue = "";
			if (!$this->isExport())
				$this->SequentialCulture->ViewValue = $this->highlightValue($this->SequentialCulture);

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";
			$this->TimeLapse->TooltipValue = "";
			if (!$this->isExport())
				$this->TimeLapse->ViewValue = $this->highlightValue($this->TimeLapse);

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";
			$this->AH->TooltipValue = "";
			if (!$this->isExport())
				$this->AH->ViewValue = $this->highlightValue($this->AH);

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";
			$this->Weight->TooltipValue = "";
			if (!$this->isExport())
				$this->Weight->ViewValue = $this->highlightValue($this->Weight);

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";
			$this->BMI->TooltipValue = "";
			if (!$this->isExport())
				$this->BMI->ViewValue = $this->highlightValue($this->BMI);

			// Male
			$this->Male->LinkCustomAttributes = "";
			$this->Male->HrefValue = "";
			$this->Male->TooltipValue = "";

			// Female
			$this->Female->LinkCustomAttributes = "";
			$this->Female->HrefValue = "";
			$this->Female->TooltipValue = "";

			// malepropic
			$this->malepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
				$this->malepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
			} else {
				$this->malepropic->HrefValue = "";
			}
			$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
			$this->malepropic->TooltipValue = "";
			if ($this->malepropic->UseColorbox) {
				if (EmptyValue($this->malepropic->TooltipValue))
					$this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->malepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x" . $this->RowCnt . "_malepropic";
				AppendClass($this->malepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// femalepropic
			$this->femalepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
				$this->femalepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
			} else {
				$this->femalepropic->HrefValue = "";
			}
			$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
			$this->femalepropic->TooltipValue = "";
			if ($this->femalepropic->UseColorbox) {
				if (EmptyValue($this->femalepropic->TooltipValue))
					$this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->femalepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x" . $this->RowCnt . "_femalepropic";
				AppendClass($this->femalepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// HusbandEducation
			$this->HusbandEducation->LinkCustomAttributes = "";
			$this->HusbandEducation->HrefValue = "";
			$this->HusbandEducation->TooltipValue = "";
			if (!$this->isExport())
				$this->HusbandEducation->ViewValue = $this->highlightValue($this->HusbandEducation);

			// WifeEducation
			$this->WifeEducation->LinkCustomAttributes = "";
			$this->WifeEducation->HrefValue = "";
			$this->WifeEducation->TooltipValue = "";
			if (!$this->isExport())
				$this->WifeEducation->ViewValue = $this->highlightValue($this->WifeEducation);

			// HusbandWorkHours
			$this->HusbandWorkHours->LinkCustomAttributes = "";
			$this->HusbandWorkHours->HrefValue = "";
			$this->HusbandWorkHours->TooltipValue = "";
			if (!$this->isExport())
				$this->HusbandWorkHours->ViewValue = $this->highlightValue($this->HusbandWorkHours);

			// WifeWorkHours
			$this->WifeWorkHours->LinkCustomAttributes = "";
			$this->WifeWorkHours->HrefValue = "";
			$this->WifeWorkHours->TooltipValue = "";
			if (!$this->isExport())
				$this->WifeWorkHours->ViewValue = $this->highlightValue($this->WifeWorkHours);

			// PatientLanguage
			$this->PatientLanguage->LinkCustomAttributes = "";
			$this->PatientLanguage->HrefValue = "";
			$this->PatientLanguage->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientLanguage->ViewValue = $this->highlightValue($this->PatientLanguage);

			// ReferedBy
			$this->ReferedBy->LinkCustomAttributes = "";
			$this->ReferedBy->HrefValue = "";
			$this->ReferedBy->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferedBy->ViewValue = $this->highlightValue($this->ReferedBy);

			// ReferPhNo
			$this->ReferPhNo->LinkCustomAttributes = "";
			$this->ReferPhNo->HrefValue = "";
			$this->ReferPhNo->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferPhNo->ViewValue = $this->highlightValue($this->ReferPhNo);

			// ARTCYCLE1
			$this->ARTCYCLE1->LinkCustomAttributes = "";
			$this->ARTCYCLE1->HrefValue = "";
			$this->ARTCYCLE1->TooltipValue = "";

			// RESULT1
			$this->RESULT1->LinkCustomAttributes = "";
			$this->RESULT1->HrefValue = "";
			$this->RESULT1->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";
			if (!$this->isExport())
				$this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->AdvancedSearch->SearchValue = HtmlDecode($this->Name->AdvancedSearch->SearchValue);
			$this->Name->EditValue = HtmlEncode($this->Name->AdvancedSearch->SearchValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// treatment_status
			$this->treatment_status->EditAttrs["class"] = "form-control";
			$this->treatment_status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->treatment_status->AdvancedSearch->SearchValue = HtmlDecode($this->treatment_status->AdvancedSearch->SearchValue);
			$this->treatment_status->EditValue = HtmlEncode($this->treatment_status->AdvancedSearch->SearchValue);
			$this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

			// ARTCYCLE
			$this->ARTCYCLE->EditAttrs["class"] = "form-control";
			$this->ARTCYCLE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ARTCYCLE->AdvancedSearch->SearchValue = HtmlDecode($this->ARTCYCLE->AdvancedSearch->SearchValue);
			$this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->AdvancedSearch->SearchValue);
			$this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

			// RESULT
			$this->RESULT->EditAttrs["class"] = "form-control";
			$this->RESULT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RESULT->AdvancedSearch->SearchValue = HtmlDecode($this->RESULT->AdvancedSearch->SearchValue);
			$this->RESULT->EditValue = HtmlEncode($this->RESULT->AdvancedSearch->SearchValue);
			$this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->AdvancedSearch->SearchValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// TreatmentStartDate
			$this->TreatmentStartDate->EditAttrs["class"] = "form-control";
			$this->TreatmentStartDate->EditCustomAttributes = "";
			$this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TreatmentStartDate->AdvancedSearch->SearchValue, 0), 8));
			$this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

			// TreatementStopDate
			$this->TreatementStopDate->EditAttrs["class"] = "form-control";
			$this->TreatementStopDate->EditCustomAttributes = "";
			$this->TreatementStopDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TreatementStopDate->AdvancedSearch->SearchValue, 0), 8));
			$this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

			// TypePatient
			$this->TypePatient->EditAttrs["class"] = "form-control";
			$this->TypePatient->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TypePatient->AdvancedSearch->SearchValue = HtmlDecode($this->TypePatient->AdvancedSearch->SearchValue);
			$this->TypePatient->EditValue = HtmlEncode($this->TypePatient->AdvancedSearch->SearchValue);
			$this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Treatment->AdvancedSearch->SearchValue = HtmlDecode($this->Treatment->AdvancedSearch->SearchValue);
			$this->Treatment->EditValue = HtmlEncode($this->Treatment->AdvancedSearch->SearchValue);
			$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

			// TreatmentTec
			$this->TreatmentTec->EditAttrs["class"] = "form-control";
			$this->TreatmentTec->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TreatmentTec->AdvancedSearch->SearchValue = HtmlDecode($this->TreatmentTec->AdvancedSearch->SearchValue);
			$this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->AdvancedSearch->SearchValue);
			$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

			// TypeOfCycle
			$this->TypeOfCycle->EditAttrs["class"] = "form-control";
			$this->TypeOfCycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TypeOfCycle->AdvancedSearch->SearchValue = HtmlDecode($this->TypeOfCycle->AdvancedSearch->SearchValue);
			$this->TypeOfCycle->EditValue = HtmlEncode($this->TypeOfCycle->AdvancedSearch->SearchValue);
			$this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

			// SpermOrgin
			$this->SpermOrgin->EditAttrs["class"] = "form-control";
			$this->SpermOrgin->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SpermOrgin->AdvancedSearch->SearchValue = HtmlDecode($this->SpermOrgin->AdvancedSearch->SearchValue);
			$this->SpermOrgin->EditValue = HtmlEncode($this->SpermOrgin->AdvancedSearch->SearchValue);
			$this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->State->AdvancedSearch->SearchValue = HtmlDecode($this->State->AdvancedSearch->SearchValue);
			$this->State->EditValue = HtmlEncode($this->State->AdvancedSearch->SearchValue);
			$this->State->PlaceHolder = RemoveHtml($this->State->caption());

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Origin->AdvancedSearch->SearchValue = HtmlDecode($this->Origin->AdvancedSearch->SearchValue);
			$this->Origin->EditValue = HtmlEncode($this->Origin->AdvancedSearch->SearchValue);
			$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

			// MACS
			$this->MACS->EditAttrs["class"] = "form-control";
			$this->MACS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MACS->AdvancedSearch->SearchValue = HtmlDecode($this->MACS->AdvancedSearch->SearchValue);
			$this->MACS->EditValue = HtmlEncode($this->MACS->AdvancedSearch->SearchValue);
			$this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

			// Technique
			$this->Technique->EditAttrs["class"] = "form-control";
			$this->Technique->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Technique->AdvancedSearch->SearchValue = HtmlDecode($this->Technique->AdvancedSearch->SearchValue);
			$this->Technique->EditValue = HtmlEncode($this->Technique->AdvancedSearch->SearchValue);
			$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

			// PgdPlanning
			$this->PgdPlanning->EditAttrs["class"] = "form-control";
			$this->PgdPlanning->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PgdPlanning->AdvancedSearch->SearchValue = HtmlDecode($this->PgdPlanning->AdvancedSearch->SearchValue);
			$this->PgdPlanning->EditValue = HtmlEncode($this->PgdPlanning->AdvancedSearch->SearchValue);
			$this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

			// IMSI
			$this->IMSI->EditAttrs["class"] = "form-control";
			$this->IMSI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IMSI->AdvancedSearch->SearchValue = HtmlDecode($this->IMSI->AdvancedSearch->SearchValue);
			$this->IMSI->EditValue = HtmlEncode($this->IMSI->AdvancedSearch->SearchValue);
			$this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

			// SequentialCulture
			$this->SequentialCulture->EditAttrs["class"] = "form-control";
			$this->SequentialCulture->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SequentialCulture->AdvancedSearch->SearchValue = HtmlDecode($this->SequentialCulture->AdvancedSearch->SearchValue);
			$this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->AdvancedSearch->SearchValue);
			$this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

			// TimeLapse
			$this->TimeLapse->EditAttrs["class"] = "form-control";
			$this->TimeLapse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TimeLapse->AdvancedSearch->SearchValue = HtmlDecode($this->TimeLapse->AdvancedSearch->SearchValue);
			$this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->AdvancedSearch->SearchValue);
			$this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

			// AH
			$this->AH->EditAttrs["class"] = "form-control";
			$this->AH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AH->AdvancedSearch->SearchValue = HtmlDecode($this->AH->AdvancedSearch->SearchValue);
			$this->AH->EditValue = HtmlEncode($this->AH->AdvancedSearch->SearchValue);
			$this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

			// Weight
			$this->Weight->EditAttrs["class"] = "form-control";
			$this->Weight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Weight->AdvancedSearch->SearchValue = HtmlDecode($this->Weight->AdvancedSearch->SearchValue);
			$this->Weight->EditValue = HtmlEncode($this->Weight->AdvancedSearch->SearchValue);
			$this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

			// BMI
			$this->BMI->EditAttrs["class"] = "form-control";
			$this->BMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BMI->AdvancedSearch->SearchValue = HtmlDecode($this->BMI->AdvancedSearch->SearchValue);
			$this->BMI->EditValue = HtmlEncode($this->BMI->AdvancedSearch->SearchValue);
			$this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

			// Male
			$this->Male->EditAttrs["class"] = "form-control";
			$this->Male->EditCustomAttributes = "";
			$this->Male->EditValue = HtmlEncode($this->Male->AdvancedSearch->SearchValue);
			$this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

			// Female
			$this->Female->EditAttrs["class"] = "form-control";
			$this->Female->EditCustomAttributes = "";
			$this->Female->EditValue = HtmlEncode($this->Female->AdvancedSearch->SearchValue);
			$this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

			// malepropic
			$this->malepropic->EditAttrs["class"] = "form-control";
			$this->malepropic->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->malepropic->AdvancedSearch->SearchValue = HtmlDecode($this->malepropic->AdvancedSearch->SearchValue);
			$this->malepropic->EditValue = HtmlEncode($this->malepropic->AdvancedSearch->SearchValue);
			$this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

			// femalepropic
			$this->femalepropic->EditAttrs["class"] = "form-control";
			$this->femalepropic->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->femalepropic->AdvancedSearch->SearchValue = HtmlDecode($this->femalepropic->AdvancedSearch->SearchValue);
			$this->femalepropic->EditValue = HtmlEncode($this->femalepropic->AdvancedSearch->SearchValue);
			$this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

			// HusbandEducation
			$this->HusbandEducation->EditAttrs["class"] = "form-control";
			$this->HusbandEducation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandEducation->AdvancedSearch->SearchValue = HtmlDecode($this->HusbandEducation->AdvancedSearch->SearchValue);
			$this->HusbandEducation->EditValue = HtmlEncode($this->HusbandEducation->AdvancedSearch->SearchValue);
			$this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

			// WifeEducation
			$this->WifeEducation->EditAttrs["class"] = "form-control";
			$this->WifeEducation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeEducation->AdvancedSearch->SearchValue = HtmlDecode($this->WifeEducation->AdvancedSearch->SearchValue);
			$this->WifeEducation->EditValue = HtmlEncode($this->WifeEducation->AdvancedSearch->SearchValue);
			$this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

			// HusbandWorkHours
			$this->HusbandWorkHours->EditAttrs["class"] = "form-control";
			$this->HusbandWorkHours->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandWorkHours->AdvancedSearch->SearchValue = HtmlDecode($this->HusbandWorkHours->AdvancedSearch->SearchValue);
			$this->HusbandWorkHours->EditValue = HtmlEncode($this->HusbandWorkHours->AdvancedSearch->SearchValue);
			$this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

			// WifeWorkHours
			$this->WifeWorkHours->EditAttrs["class"] = "form-control";
			$this->WifeWorkHours->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeWorkHours->AdvancedSearch->SearchValue = HtmlDecode($this->WifeWorkHours->AdvancedSearch->SearchValue);
			$this->WifeWorkHours->EditValue = HtmlEncode($this->WifeWorkHours->AdvancedSearch->SearchValue);
			$this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

			// PatientLanguage
			$this->PatientLanguage->EditAttrs["class"] = "form-control";
			$this->PatientLanguage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientLanguage->AdvancedSearch->SearchValue = HtmlDecode($this->PatientLanguage->AdvancedSearch->SearchValue);
			$this->PatientLanguage->EditValue = HtmlEncode($this->PatientLanguage->AdvancedSearch->SearchValue);
			$this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

			// ReferedBy
			$this->ReferedBy->EditAttrs["class"] = "form-control";
			$this->ReferedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedBy->AdvancedSearch->SearchValue);
			$this->ReferedBy->EditValue = HtmlEncode($this->ReferedBy->AdvancedSearch->SearchValue);
			$this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

			// ReferPhNo
			$this->ReferPhNo->EditAttrs["class"] = "form-control";
			$this->ReferPhNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferPhNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferPhNo->AdvancedSearch->SearchValue);
			$this->ReferPhNo->EditValue = HtmlEncode($this->ReferPhNo->AdvancedSearch->SearchValue);
			$this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

			// ARTCYCLE1
			$this->ARTCYCLE1->EditAttrs["class"] = "form-control";
			$this->ARTCYCLE1->EditCustomAttributes = "";
			$this->ARTCYCLE1->EditValue = $this->ARTCYCLE1->options(TRUE);

			// RESULT1
			$this->RESULT1->EditAttrs["class"] = "form-control";
			$this->RESULT1->EditCustomAttributes = "";
			$this->RESULT1->EditValue = $this->RESULT1->options(TRUE);

			// CoupleID
			$this->CoupleID->EditAttrs["class"] = "form-control";
			$this->CoupleID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[$this->RowCnt] = $this->customTemplateFieldValues();
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
		$this->Name->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->treatment_status->AdvancedSearch->load();
		$this->ARTCYCLE->AdvancedSearch->load();
		$this->RESULT->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->TreatmentStartDate->AdvancedSearch->load();
		$this->TreatementStopDate->AdvancedSearch->load();
		$this->TypePatient->AdvancedSearch->load();
		$this->Treatment->AdvancedSearch->load();
		$this->TreatmentTec->AdvancedSearch->load();
		$this->TypeOfCycle->AdvancedSearch->load();
		$this->SpermOrgin->AdvancedSearch->load();
		$this->State->AdvancedSearch->load();
		$this->Origin->AdvancedSearch->load();
		$this->MACS->AdvancedSearch->load();
		$this->Technique->AdvancedSearch->load();
		$this->PgdPlanning->AdvancedSearch->load();
		$this->IMSI->AdvancedSearch->load();
		$this->SequentialCulture->AdvancedSearch->load();
		$this->TimeLapse->AdvancedSearch->load();
		$this->AH->AdvancedSearch->load();
		$this->Weight->AdvancedSearch->load();
		$this->BMI->AdvancedSearch->load();
		$this->status1->AdvancedSearch->load();
		$this->id1->AdvancedSearch->load();
		$this->Male->AdvancedSearch->load();
		$this->Female->AdvancedSearch->load();
		$this->malepropic->AdvancedSearch->load();
		$this->femalepropic->AdvancedSearch->load();
		$this->HusbandEducation->AdvancedSearch->load();
		$this->WifeEducation->AdvancedSearch->load();
		$this->HusbandWorkHours->AdvancedSearch->load();
		$this->WifeWorkHours->AdvancedSearch->load();
		$this->PatientLanguage->AdvancedSearch->load();
		$this->ReferedBy->AdvancedSearch->load();
		$this->ReferPhNo->AdvancedSearch->load();
		$this->ARTCYCLE1->AdvancedSearch->load();
		$this->RESULT1->AdvancedSearch->load();
		$this->CoupleID->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_ivf_treatmentlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_ivf_treatmentlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_ivf_treatmentlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word", $this->ExportWordCustom);
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
		$item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = $this->ExportEmailCustom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
		$item->Body = "<button id=\"emf_view_ivf_treatment\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_ivf_treatment',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_ivf_treatmentlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_status1":
							break;
						case "x_Male":
							break;
						case "x_Female":
							break;
						case "x_ReferedBy":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_patient_discharge_summary_list extends view_patient_discharge_summary
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_patient_discharge_summary';

	// Page object name
	public $PageObjName = "view_patient_discharge_summary_list";

	// Grid form hidden field names
	public $FormName = "fview_patient_discharge_summarylist";
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

		// Table object (view_patient_discharge_summary)
		if (!isset($GLOBALS["view_patient_discharge_summary"]) || get_class($GLOBALS["view_patient_discharge_summary"]) == PROJECT_NAMESPACE . "view_patient_discharge_summary") {
			$GLOBALS["view_patient_discharge_summary"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_patient_discharge_summary"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_patient_discharge_summaryadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_patient_discharge_summarydelete.php";
		$this->MultiUpdateUrl = "view_patient_discharge_summaryupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_patient_discharge_summary');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_patient_discharge_summarylistsrch";

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
		global $EXPORT, $view_patient_discharge_summary;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_patient_discharge_summary);
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
		$this->PatientID->setVisibility();
		$this->patient_name->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->gender->setVisibility();
		$this->age->Visible = FALSE;
		$this->physician_id->setVisibility();
		$this->typeRegsisteration->setVisibility();
		$this->PaymentCategory->setVisibility();
		$this->admission_consultant_id->Visible = FALSE;
		$this->leading_consultant_id->Visible = FALSE;
		$this->cause->Visible = FALSE;
		$this->admission_date->setVisibility();
		$this->release_date->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->HospID->setVisibility();
		$this->status->Visible = FALSE;
		$this->mrnNo->Visible = FALSE;
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->provisional_diagnosis->Visible = FALSE;
		$this->Treatments->Visible = FALSE;
		$this->FinalDiagnosis->Visible = FALSE;
		$this->BP->Visible = FALSE;
		$this->Pulse->Visible = FALSE;
		$this->Resp->Visible = FALSE;
		$this->SPO2->Visible = FALSE;
		$this->FollowupAdvice->Visible = FALSE;
		$this->NextReviewDate->Visible = FALSE;
		$this->History->Visible = FALSE;
		$this->patient_id->Visible = FALSE;
		$this->vitals->Visible = FALSE;
		$this->courseinhospital->Visible = FALSE;
		$this->procedurenotes->Visible = FALSE;
		$this->conditionatdischarge->Visible = FALSE;
		$this->AdviceToOtherHospital->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->DischargeAdviceMedicine->Visible = FALSE;
		$this->vid->setVisibility();
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
		$this->setupLookupOptions($this->physician_id);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_patient_discharge_summarylistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->patient_name->AdvancedSearch->toJson(), ","); // Field patient_name
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
		$filterList = Concat($filterList, $this->age->AdvancedSearch->toJson(), ","); // Field age
		$filterList = Concat($filterList, $this->physician_id->AdvancedSearch->toJson(), ","); // Field physician_id
		$filterList = Concat($filterList, $this->typeRegsisteration->AdvancedSearch->toJson(), ","); // Field typeRegsisteration
		$filterList = Concat($filterList, $this->PaymentCategory->AdvancedSearch->toJson(), ","); // Field PaymentCategory
		$filterList = Concat($filterList, $this->admission_consultant_id->AdvancedSearch->toJson(), ","); // Field admission_consultant_id
		$filterList = Concat($filterList, $this->leading_consultant_id->AdvancedSearch->toJson(), ","); // Field leading_consultant_id
		$filterList = Concat($filterList, $this->cause->AdvancedSearch->toJson(), ","); // Field cause
		$filterList = Concat($filterList, $this->admission_date->AdvancedSearch->toJson(), ","); // Field admission_date
		$filterList = Concat($filterList, $this->release_date->AdvancedSearch->toJson(), ","); // Field release_date
		$filterList = Concat($filterList, $this->PaymentStatus->AdvancedSearch->toJson(), ","); // Field PaymentStatus
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->mrnNo->AdvancedSearch->toJson(), ","); // Field mrnNo
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->provisional_diagnosis->AdvancedSearch->toJson(), ","); // Field provisional_diagnosis
		$filterList = Concat($filterList, $this->Treatments->AdvancedSearch->toJson(), ","); // Field Treatments
		$filterList = Concat($filterList, $this->FinalDiagnosis->AdvancedSearch->toJson(), ","); // Field FinalDiagnosis
		$filterList = Concat($filterList, $this->BP->AdvancedSearch->toJson(), ","); // Field BP
		$filterList = Concat($filterList, $this->Pulse->AdvancedSearch->toJson(), ","); // Field Pulse
		$filterList = Concat($filterList, $this->Resp->AdvancedSearch->toJson(), ","); // Field Resp
		$filterList = Concat($filterList, $this->SPO2->AdvancedSearch->toJson(), ","); // Field SPO2
		$filterList = Concat($filterList, $this->FollowupAdvice->AdvancedSearch->toJson(), ","); // Field FollowupAdvice
		$filterList = Concat($filterList, $this->NextReviewDate->AdvancedSearch->toJson(), ","); // Field NextReviewDate
		$filterList = Concat($filterList, $this->History->AdvancedSearch->toJson(), ","); // Field History
		$filterList = Concat($filterList, $this->patient_id->AdvancedSearch->toJson(), ","); // Field patient_id
		$filterList = Concat($filterList, $this->vitals->AdvancedSearch->toJson(), ","); // Field vitals
		$filterList = Concat($filterList, $this->courseinhospital->AdvancedSearch->toJson(), ","); // Field courseinhospital
		$filterList = Concat($filterList, $this->procedurenotes->AdvancedSearch->toJson(), ","); // Field procedurenotes
		$filterList = Concat($filterList, $this->conditionatdischarge->AdvancedSearch->toJson(), ","); // Field conditionatdischarge
		$filterList = Concat($filterList, $this->AdviceToOtherHospital->AdvancedSearch->toJson(), ","); // Field AdviceToOtherHospital
		$filterList = Concat($filterList, $this->ReferedByDr->AdvancedSearch->toJson(), ","); // Field ReferedByDr
		$filterList = Concat($filterList, $this->DischargeAdviceMedicine->AdvancedSearch->toJson(), ","); // Field DischargeAdviceMedicine
		$filterList = Concat($filterList, $this->vid->AdvancedSearch->toJson(), ","); // Field vid
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_patient_discharge_summarylistsrch", $filters);
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

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field patient_name
		$this->patient_name->AdvancedSearch->SearchValue = @$filter["x_patient_name"];
		$this->patient_name->AdvancedSearch->SearchOperator = @$filter["z_patient_name"];
		$this->patient_name->AdvancedSearch->SearchCondition = @$filter["v_patient_name"];
		$this->patient_name->AdvancedSearch->SearchValue2 = @$filter["y_patient_name"];
		$this->patient_name->AdvancedSearch->SearchOperator2 = @$filter["w_patient_name"];
		$this->patient_name->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field gender
		$this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
		$this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
		$this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
		$this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
		$this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
		$this->gender->AdvancedSearch->save();

		// Field age
		$this->age->AdvancedSearch->SearchValue = @$filter["x_age"];
		$this->age->AdvancedSearch->SearchOperator = @$filter["z_age"];
		$this->age->AdvancedSearch->SearchCondition = @$filter["v_age"];
		$this->age->AdvancedSearch->SearchValue2 = @$filter["y_age"];
		$this->age->AdvancedSearch->SearchOperator2 = @$filter["w_age"];
		$this->age->AdvancedSearch->save();

		// Field physician_id
		$this->physician_id->AdvancedSearch->SearchValue = @$filter["x_physician_id"];
		$this->physician_id->AdvancedSearch->SearchOperator = @$filter["z_physician_id"];
		$this->physician_id->AdvancedSearch->SearchCondition = @$filter["v_physician_id"];
		$this->physician_id->AdvancedSearch->SearchValue2 = @$filter["y_physician_id"];
		$this->physician_id->AdvancedSearch->SearchOperator2 = @$filter["w_physician_id"];
		$this->physician_id->AdvancedSearch->save();

		// Field typeRegsisteration
		$this->typeRegsisteration->AdvancedSearch->SearchValue = @$filter["x_typeRegsisteration"];
		$this->typeRegsisteration->AdvancedSearch->SearchOperator = @$filter["z_typeRegsisteration"];
		$this->typeRegsisteration->AdvancedSearch->SearchCondition = @$filter["v_typeRegsisteration"];
		$this->typeRegsisteration->AdvancedSearch->SearchValue2 = @$filter["y_typeRegsisteration"];
		$this->typeRegsisteration->AdvancedSearch->SearchOperator2 = @$filter["w_typeRegsisteration"];
		$this->typeRegsisteration->AdvancedSearch->save();

		// Field PaymentCategory
		$this->PaymentCategory->AdvancedSearch->SearchValue = @$filter["x_PaymentCategory"];
		$this->PaymentCategory->AdvancedSearch->SearchOperator = @$filter["z_PaymentCategory"];
		$this->PaymentCategory->AdvancedSearch->SearchCondition = @$filter["v_PaymentCategory"];
		$this->PaymentCategory->AdvancedSearch->SearchValue2 = @$filter["y_PaymentCategory"];
		$this->PaymentCategory->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentCategory"];
		$this->PaymentCategory->AdvancedSearch->save();

		// Field admission_consultant_id
		$this->admission_consultant_id->AdvancedSearch->SearchValue = @$filter["x_admission_consultant_id"];
		$this->admission_consultant_id->AdvancedSearch->SearchOperator = @$filter["z_admission_consultant_id"];
		$this->admission_consultant_id->AdvancedSearch->SearchCondition = @$filter["v_admission_consultant_id"];
		$this->admission_consultant_id->AdvancedSearch->SearchValue2 = @$filter["y_admission_consultant_id"];
		$this->admission_consultant_id->AdvancedSearch->SearchOperator2 = @$filter["w_admission_consultant_id"];
		$this->admission_consultant_id->AdvancedSearch->save();

		// Field leading_consultant_id
		$this->leading_consultant_id->AdvancedSearch->SearchValue = @$filter["x_leading_consultant_id"];
		$this->leading_consultant_id->AdvancedSearch->SearchOperator = @$filter["z_leading_consultant_id"];
		$this->leading_consultant_id->AdvancedSearch->SearchCondition = @$filter["v_leading_consultant_id"];
		$this->leading_consultant_id->AdvancedSearch->SearchValue2 = @$filter["y_leading_consultant_id"];
		$this->leading_consultant_id->AdvancedSearch->SearchOperator2 = @$filter["w_leading_consultant_id"];
		$this->leading_consultant_id->AdvancedSearch->save();

		// Field cause
		$this->cause->AdvancedSearch->SearchValue = @$filter["x_cause"];
		$this->cause->AdvancedSearch->SearchOperator = @$filter["z_cause"];
		$this->cause->AdvancedSearch->SearchCondition = @$filter["v_cause"];
		$this->cause->AdvancedSearch->SearchValue2 = @$filter["y_cause"];
		$this->cause->AdvancedSearch->SearchOperator2 = @$filter["w_cause"];
		$this->cause->AdvancedSearch->save();

		// Field admission_date
		$this->admission_date->AdvancedSearch->SearchValue = @$filter["x_admission_date"];
		$this->admission_date->AdvancedSearch->SearchOperator = @$filter["z_admission_date"];
		$this->admission_date->AdvancedSearch->SearchCondition = @$filter["v_admission_date"];
		$this->admission_date->AdvancedSearch->SearchValue2 = @$filter["y_admission_date"];
		$this->admission_date->AdvancedSearch->SearchOperator2 = @$filter["w_admission_date"];
		$this->admission_date->AdvancedSearch->save();

		// Field release_date
		$this->release_date->AdvancedSearch->SearchValue = @$filter["x_release_date"];
		$this->release_date->AdvancedSearch->SearchOperator = @$filter["z_release_date"];
		$this->release_date->AdvancedSearch->SearchCondition = @$filter["v_release_date"];
		$this->release_date->AdvancedSearch->SearchValue2 = @$filter["y_release_date"];
		$this->release_date->AdvancedSearch->SearchOperator2 = @$filter["w_release_date"];
		$this->release_date->AdvancedSearch->save();

		// Field PaymentStatus
		$this->PaymentStatus->AdvancedSearch->SearchValue = @$filter["x_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchOperator = @$filter["z_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchCondition = @$filter["v_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchValue2 = @$filter["y_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentStatus"];
		$this->PaymentStatus->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field mrnNo
		$this->mrnNo->AdvancedSearch->SearchValue = @$filter["x_mrnNo"];
		$this->mrnNo->AdvancedSearch->SearchOperator = @$filter["z_mrnNo"];
		$this->mrnNo->AdvancedSearch->SearchCondition = @$filter["v_mrnNo"];
		$this->mrnNo->AdvancedSearch->SearchValue2 = @$filter["y_mrnNo"];
		$this->mrnNo->AdvancedSearch->SearchOperator2 = @$filter["w_mrnNo"];
		$this->mrnNo->AdvancedSearch->save();

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

		// Field provisional_diagnosis
		$this->provisional_diagnosis->AdvancedSearch->SearchValue = @$filter["x_provisional_diagnosis"];
		$this->provisional_diagnosis->AdvancedSearch->SearchOperator = @$filter["z_provisional_diagnosis"];
		$this->provisional_diagnosis->AdvancedSearch->SearchCondition = @$filter["v_provisional_diagnosis"];
		$this->provisional_diagnosis->AdvancedSearch->SearchValue2 = @$filter["y_provisional_diagnosis"];
		$this->provisional_diagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_provisional_diagnosis"];
		$this->provisional_diagnosis->AdvancedSearch->save();

		// Field Treatments
		$this->Treatments->AdvancedSearch->SearchValue = @$filter["x_Treatments"];
		$this->Treatments->AdvancedSearch->SearchOperator = @$filter["z_Treatments"];
		$this->Treatments->AdvancedSearch->SearchCondition = @$filter["v_Treatments"];
		$this->Treatments->AdvancedSearch->SearchValue2 = @$filter["y_Treatments"];
		$this->Treatments->AdvancedSearch->SearchOperator2 = @$filter["w_Treatments"];
		$this->Treatments->AdvancedSearch->save();

		// Field FinalDiagnosis
		$this->FinalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_FinalDiagnosis"];
		$this->FinalDiagnosis->AdvancedSearch->save();

		// Field BP
		$this->BP->AdvancedSearch->SearchValue = @$filter["x_BP"];
		$this->BP->AdvancedSearch->SearchOperator = @$filter["z_BP"];
		$this->BP->AdvancedSearch->SearchCondition = @$filter["v_BP"];
		$this->BP->AdvancedSearch->SearchValue2 = @$filter["y_BP"];
		$this->BP->AdvancedSearch->SearchOperator2 = @$filter["w_BP"];
		$this->BP->AdvancedSearch->save();

		// Field Pulse
		$this->Pulse->AdvancedSearch->SearchValue = @$filter["x_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator = @$filter["z_Pulse"];
		$this->Pulse->AdvancedSearch->SearchCondition = @$filter["v_Pulse"];
		$this->Pulse->AdvancedSearch->SearchValue2 = @$filter["y_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator2 = @$filter["w_Pulse"];
		$this->Pulse->AdvancedSearch->save();

		// Field Resp
		$this->Resp->AdvancedSearch->SearchValue = @$filter["x_Resp"];
		$this->Resp->AdvancedSearch->SearchOperator = @$filter["z_Resp"];
		$this->Resp->AdvancedSearch->SearchCondition = @$filter["v_Resp"];
		$this->Resp->AdvancedSearch->SearchValue2 = @$filter["y_Resp"];
		$this->Resp->AdvancedSearch->SearchOperator2 = @$filter["w_Resp"];
		$this->Resp->AdvancedSearch->save();

		// Field SPO2
		$this->SPO2->AdvancedSearch->SearchValue = @$filter["x_SPO2"];
		$this->SPO2->AdvancedSearch->SearchOperator = @$filter["z_SPO2"];
		$this->SPO2->AdvancedSearch->SearchCondition = @$filter["v_SPO2"];
		$this->SPO2->AdvancedSearch->SearchValue2 = @$filter["y_SPO2"];
		$this->SPO2->AdvancedSearch->SearchOperator2 = @$filter["w_SPO2"];
		$this->SPO2->AdvancedSearch->save();

		// Field FollowupAdvice
		$this->FollowupAdvice->AdvancedSearch->SearchValue = @$filter["x_FollowupAdvice"];
		$this->FollowupAdvice->AdvancedSearch->SearchOperator = @$filter["z_FollowupAdvice"];
		$this->FollowupAdvice->AdvancedSearch->SearchCondition = @$filter["v_FollowupAdvice"];
		$this->FollowupAdvice->AdvancedSearch->SearchValue2 = @$filter["y_FollowupAdvice"];
		$this->FollowupAdvice->AdvancedSearch->SearchOperator2 = @$filter["w_FollowupAdvice"];
		$this->FollowupAdvice->AdvancedSearch->save();

		// Field NextReviewDate
		$this->NextReviewDate->AdvancedSearch->SearchValue = @$filter["x_NextReviewDate"];
		$this->NextReviewDate->AdvancedSearch->SearchOperator = @$filter["z_NextReviewDate"];
		$this->NextReviewDate->AdvancedSearch->SearchCondition = @$filter["v_NextReviewDate"];
		$this->NextReviewDate->AdvancedSearch->SearchValue2 = @$filter["y_NextReviewDate"];
		$this->NextReviewDate->AdvancedSearch->SearchOperator2 = @$filter["w_NextReviewDate"];
		$this->NextReviewDate->AdvancedSearch->save();

		// Field History
		$this->History->AdvancedSearch->SearchValue = @$filter["x_History"];
		$this->History->AdvancedSearch->SearchOperator = @$filter["z_History"];
		$this->History->AdvancedSearch->SearchCondition = @$filter["v_History"];
		$this->History->AdvancedSearch->SearchValue2 = @$filter["y_History"];
		$this->History->AdvancedSearch->SearchOperator2 = @$filter["w_History"];
		$this->History->AdvancedSearch->save();

		// Field patient_id
		$this->patient_id->AdvancedSearch->SearchValue = @$filter["x_patient_id"];
		$this->patient_id->AdvancedSearch->SearchOperator = @$filter["z_patient_id"];
		$this->patient_id->AdvancedSearch->SearchCondition = @$filter["v_patient_id"];
		$this->patient_id->AdvancedSearch->SearchValue2 = @$filter["y_patient_id"];
		$this->patient_id->AdvancedSearch->SearchOperator2 = @$filter["w_patient_id"];
		$this->patient_id->AdvancedSearch->save();

		// Field vitals
		$this->vitals->AdvancedSearch->SearchValue = @$filter["x_vitals"];
		$this->vitals->AdvancedSearch->SearchOperator = @$filter["z_vitals"];
		$this->vitals->AdvancedSearch->SearchCondition = @$filter["v_vitals"];
		$this->vitals->AdvancedSearch->SearchValue2 = @$filter["y_vitals"];
		$this->vitals->AdvancedSearch->SearchOperator2 = @$filter["w_vitals"];
		$this->vitals->AdvancedSearch->save();

		// Field courseinhospital
		$this->courseinhospital->AdvancedSearch->SearchValue = @$filter["x_courseinhospital"];
		$this->courseinhospital->AdvancedSearch->SearchOperator = @$filter["z_courseinhospital"];
		$this->courseinhospital->AdvancedSearch->SearchCondition = @$filter["v_courseinhospital"];
		$this->courseinhospital->AdvancedSearch->SearchValue2 = @$filter["y_courseinhospital"];
		$this->courseinhospital->AdvancedSearch->SearchOperator2 = @$filter["w_courseinhospital"];
		$this->courseinhospital->AdvancedSearch->save();

		// Field procedurenotes
		$this->procedurenotes->AdvancedSearch->SearchValue = @$filter["x_procedurenotes"];
		$this->procedurenotes->AdvancedSearch->SearchOperator = @$filter["z_procedurenotes"];
		$this->procedurenotes->AdvancedSearch->SearchCondition = @$filter["v_procedurenotes"];
		$this->procedurenotes->AdvancedSearch->SearchValue2 = @$filter["y_procedurenotes"];
		$this->procedurenotes->AdvancedSearch->SearchOperator2 = @$filter["w_procedurenotes"];
		$this->procedurenotes->AdvancedSearch->save();

		// Field conditionatdischarge
		$this->conditionatdischarge->AdvancedSearch->SearchValue = @$filter["x_conditionatdischarge"];
		$this->conditionatdischarge->AdvancedSearch->SearchOperator = @$filter["z_conditionatdischarge"];
		$this->conditionatdischarge->AdvancedSearch->SearchCondition = @$filter["v_conditionatdischarge"];
		$this->conditionatdischarge->AdvancedSearch->SearchValue2 = @$filter["y_conditionatdischarge"];
		$this->conditionatdischarge->AdvancedSearch->SearchOperator2 = @$filter["w_conditionatdischarge"];
		$this->conditionatdischarge->AdvancedSearch->save();

		// Field AdviceToOtherHospital
		$this->AdviceToOtherHospital->AdvancedSearch->SearchValue = @$filter["x_AdviceToOtherHospital"];
		$this->AdviceToOtherHospital->AdvancedSearch->SearchOperator = @$filter["z_AdviceToOtherHospital"];
		$this->AdviceToOtherHospital->AdvancedSearch->SearchCondition = @$filter["v_AdviceToOtherHospital"];
		$this->AdviceToOtherHospital->AdvancedSearch->SearchValue2 = @$filter["y_AdviceToOtherHospital"];
		$this->AdviceToOtherHospital->AdvancedSearch->SearchOperator2 = @$filter["w_AdviceToOtherHospital"];
		$this->AdviceToOtherHospital->AdvancedSearch->save();

		// Field ReferedByDr
		$this->ReferedByDr->AdvancedSearch->SearchValue = @$filter["x_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchOperator = @$filter["z_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchCondition = @$filter["v_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchValue2 = @$filter["y_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->save();

		// Field DischargeAdviceMedicine
		$this->DischargeAdviceMedicine->AdvancedSearch->SearchValue = @$filter["x_DischargeAdviceMedicine"];
		$this->DischargeAdviceMedicine->AdvancedSearch->SearchOperator = @$filter["z_DischargeAdviceMedicine"];
		$this->DischargeAdviceMedicine->AdvancedSearch->SearchCondition = @$filter["v_DischargeAdviceMedicine"];
		$this->DischargeAdviceMedicine->AdvancedSearch->SearchValue2 = @$filter["y_DischargeAdviceMedicine"];
		$this->DischargeAdviceMedicine->AdvancedSearch->SearchOperator2 = @$filter["w_DischargeAdviceMedicine"];
		$this->DischargeAdviceMedicine->AdvancedSearch->save();

		// Field vid
		$this->vid->AdvancedSearch->SearchValue = @$filter["x_vid"];
		$this->vid->AdvancedSearch->SearchOperator = @$filter["z_vid"];
		$this->vid->AdvancedSearch->SearchCondition = @$filter["v_vid"];
		$this->vid->AdvancedSearch->SearchValue2 = @$filter["y_vid"];
		$this->vid->AdvancedSearch->SearchOperator2 = @$filter["w_vid"];
		$this->vid->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->PatientID, $default, FALSE); // PatientID
		$this->buildSearchSql($where, $this->patient_name, $default, FALSE); // patient_name
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->gender, $default, FALSE); // gender
		$this->buildSearchSql($where, $this->age, $default, FALSE); // age
		$this->buildSearchSql($where, $this->physician_id, $default, FALSE); // physician_id
		$this->buildSearchSql($where, $this->typeRegsisteration, $default, FALSE); // typeRegsisteration
		$this->buildSearchSql($where, $this->PaymentCategory, $default, FALSE); // PaymentCategory
		$this->buildSearchSql($where, $this->admission_consultant_id, $default, FALSE); // admission_consultant_id
		$this->buildSearchSql($where, $this->leading_consultant_id, $default, FALSE); // leading_consultant_id
		$this->buildSearchSql($where, $this->cause, $default, FALSE); // cause
		$this->buildSearchSql($where, $this->admission_date, $default, FALSE); // admission_date
		$this->buildSearchSql($where, $this->release_date, $default, FALSE); // release_date
		$this->buildSearchSql($where, $this->PaymentStatus, $default, FALSE); // PaymentStatus
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->mrnNo, $default, FALSE); // mrnNo
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->provisional_diagnosis, $default, FALSE); // provisional_diagnosis
		$this->buildSearchSql($where, $this->Treatments, $default, FALSE); // Treatments
		$this->buildSearchSql($where, $this->FinalDiagnosis, $default, FALSE); // FinalDiagnosis
		$this->buildSearchSql($where, $this->BP, $default, FALSE); // BP
		$this->buildSearchSql($where, $this->Pulse, $default, FALSE); // Pulse
		$this->buildSearchSql($where, $this->Resp, $default, FALSE); // Resp
		$this->buildSearchSql($where, $this->SPO2, $default, FALSE); // SPO2
		$this->buildSearchSql($where, $this->FollowupAdvice, $default, FALSE); // FollowupAdvice
		$this->buildSearchSql($where, $this->NextReviewDate, $default, FALSE); // NextReviewDate
		$this->buildSearchSql($where, $this->History, $default, FALSE); // History
		$this->buildSearchSql($where, $this->patient_id, $default, FALSE); // patient_id
		$this->buildSearchSql($where, $this->vitals, $default, FALSE); // vitals
		$this->buildSearchSql($where, $this->courseinhospital, $default, FALSE); // courseinhospital
		$this->buildSearchSql($where, $this->procedurenotes, $default, FALSE); // procedurenotes
		$this->buildSearchSql($where, $this->conditionatdischarge, $default, FALSE); // conditionatdischarge
		$this->buildSearchSql($where, $this->AdviceToOtherHospital, $default, FALSE); // AdviceToOtherHospital
		$this->buildSearchSql($where, $this->ReferedByDr, $default, FALSE); // ReferedByDr
		$this->buildSearchSql($where, $this->DischargeAdviceMedicine, $default, FALSE); // DischargeAdviceMedicine
		$this->buildSearchSql($where, $this->vid, $default, FALSE); // vid

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->PatientID->AdvancedSearch->save(); // PatientID
			$this->patient_name->AdvancedSearch->save(); // patient_name
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->gender->AdvancedSearch->save(); // gender
			$this->age->AdvancedSearch->save(); // age
			$this->physician_id->AdvancedSearch->save(); // physician_id
			$this->typeRegsisteration->AdvancedSearch->save(); // typeRegsisteration
			$this->PaymentCategory->AdvancedSearch->save(); // PaymentCategory
			$this->admission_consultant_id->AdvancedSearch->save(); // admission_consultant_id
			$this->leading_consultant_id->AdvancedSearch->save(); // leading_consultant_id
			$this->cause->AdvancedSearch->save(); // cause
			$this->admission_date->AdvancedSearch->save(); // admission_date
			$this->release_date->AdvancedSearch->save(); // release_date
			$this->PaymentStatus->AdvancedSearch->save(); // PaymentStatus
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->status->AdvancedSearch->save(); // status
			$this->mrnNo->AdvancedSearch->save(); // mrnNo
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->provisional_diagnosis->AdvancedSearch->save(); // provisional_diagnosis
			$this->Treatments->AdvancedSearch->save(); // Treatments
			$this->FinalDiagnosis->AdvancedSearch->save(); // FinalDiagnosis
			$this->BP->AdvancedSearch->save(); // BP
			$this->Pulse->AdvancedSearch->save(); // Pulse
			$this->Resp->AdvancedSearch->save(); // Resp
			$this->SPO2->AdvancedSearch->save(); // SPO2
			$this->FollowupAdvice->AdvancedSearch->save(); // FollowupAdvice
			$this->NextReviewDate->AdvancedSearch->save(); // NextReviewDate
			$this->History->AdvancedSearch->save(); // History
			$this->patient_id->AdvancedSearch->save(); // patient_id
			$this->vitals->AdvancedSearch->save(); // vitals
			$this->courseinhospital->AdvancedSearch->save(); // courseinhospital
			$this->procedurenotes->AdvancedSearch->save(); // procedurenotes
			$this->conditionatdischarge->AdvancedSearch->save(); // conditionatdischarge
			$this->AdviceToOtherHospital->AdvancedSearch->save(); // AdviceToOtherHospital
			$this->ReferedByDr->AdvancedSearch->save(); // ReferedByDr
			$this->DischargeAdviceMedicine->AdvancedSearch->save(); // DischargeAdviceMedicine
			$this->vid->AdvancedSearch->save(); // vid
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
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patient_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->typeRegsisteration, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PaymentCategory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->cause, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->provisional_diagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Treatments, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FinalDiagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pulse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Resp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SPO2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FollowupAdvice, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->History, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->vitals, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->courseinhospital, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->procedurenotes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->conditionatdischarge, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AdviceToOtherHospital, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferedByDr, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DischargeAdviceMedicine, $arKeywords, $type);
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
		if ($this->PatientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->patient_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->physician_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->typeRegsisteration->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PaymentCategory->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->admission_consultant_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->leading_consultant_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->cause->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->admission_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->release_date->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PaymentStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mrnNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifieddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->provisional_diagnosis->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Treatments->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FinalDiagnosis->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pulse->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Resp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SPO2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FollowupAdvice->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NextReviewDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->History->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->patient_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->vitals->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->courseinhospital->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->procedurenotes->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->conditionatdischarge->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdviceToOtherHospital->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferedByDr->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DischargeAdviceMedicine->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->vid->AdvancedSearch->issetSession())
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
		$this->PatientID->AdvancedSearch->unsetSession();
		$this->patient_name->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->gender->AdvancedSearch->unsetSession();
		$this->age->AdvancedSearch->unsetSession();
		$this->physician_id->AdvancedSearch->unsetSession();
		$this->typeRegsisteration->AdvancedSearch->unsetSession();
		$this->PaymentCategory->AdvancedSearch->unsetSession();
		$this->admission_consultant_id->AdvancedSearch->unsetSession();
		$this->leading_consultant_id->AdvancedSearch->unsetSession();
		$this->cause->AdvancedSearch->unsetSession();
		$this->admission_date->AdvancedSearch->unsetSession();
		$this->release_date->AdvancedSearch->unsetSession();
		$this->PaymentStatus->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->mrnNo->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->provisional_diagnosis->AdvancedSearch->unsetSession();
		$this->Treatments->AdvancedSearch->unsetSession();
		$this->FinalDiagnosis->AdvancedSearch->unsetSession();
		$this->BP->AdvancedSearch->unsetSession();
		$this->Pulse->AdvancedSearch->unsetSession();
		$this->Resp->AdvancedSearch->unsetSession();
		$this->SPO2->AdvancedSearch->unsetSession();
		$this->FollowupAdvice->AdvancedSearch->unsetSession();
		$this->NextReviewDate->AdvancedSearch->unsetSession();
		$this->History->AdvancedSearch->unsetSession();
		$this->patient_id->AdvancedSearch->unsetSession();
		$this->vitals->AdvancedSearch->unsetSession();
		$this->courseinhospital->AdvancedSearch->unsetSession();
		$this->procedurenotes->AdvancedSearch->unsetSession();
		$this->conditionatdischarge->AdvancedSearch->unsetSession();
		$this->AdviceToOtherHospital->AdvancedSearch->unsetSession();
		$this->ReferedByDr->AdvancedSearch->unsetSession();
		$this->DischargeAdviceMedicine->AdvancedSearch->unsetSession();
		$this->vid->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->patient_name->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->age->AdvancedSearch->load();
		$this->physician_id->AdvancedSearch->load();
		$this->typeRegsisteration->AdvancedSearch->load();
		$this->PaymentCategory->AdvancedSearch->load();
		$this->admission_consultant_id->AdvancedSearch->load();
		$this->leading_consultant_id->AdvancedSearch->load();
		$this->cause->AdvancedSearch->load();
		$this->admission_date->AdvancedSearch->load();
		$this->release_date->AdvancedSearch->load();
		$this->PaymentStatus->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->mrnNo->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->provisional_diagnosis->AdvancedSearch->load();
		$this->Treatments->AdvancedSearch->load();
		$this->FinalDiagnosis->AdvancedSearch->load();
		$this->BP->AdvancedSearch->load();
		$this->Pulse->AdvancedSearch->load();
		$this->Resp->AdvancedSearch->load();
		$this->SPO2->AdvancedSearch->load();
		$this->FollowupAdvice->AdvancedSearch->load();
		$this->NextReviewDate->AdvancedSearch->load();
		$this->History->AdvancedSearch->load();
		$this->patient_id->AdvancedSearch->load();
		$this->vitals->AdvancedSearch->load();
		$this->courseinhospital->AdvancedSearch->load();
		$this->procedurenotes->AdvancedSearch->load();
		$this->conditionatdischarge->AdvancedSearch->load();
		$this->AdviceToOtherHospital->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->DischargeAdviceMedicine->AdvancedSearch->load();
		$this->vid->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->patient_name); // patient_name
			$this->updateSort($this->gender); // gender
			$this->updateSort($this->physician_id); // physician_id
			$this->updateSort($this->typeRegsisteration); // typeRegsisteration
			$this->updateSort($this->PaymentCategory); // PaymentCategory
			$this->updateSort($this->admission_date); // admission_date
			$this->updateSort($this->release_date); // release_date
			$this->updateSort($this->PaymentStatus); // PaymentStatus
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->AdviceToOtherHospital); // AdviceToOtherHospital
			$this->updateSort($this->ReferedByDr); // ReferedByDr
			$this->updateSort($this->vid); // vid
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
				$this->PatientID->setSort("");
				$this->patient_name->setSort("");
				$this->gender->setSort("");
				$this->physician_id->setSort("");
				$this->typeRegsisteration->setSort("");
				$this->PaymentCategory->setSort("");
				$this->admission_date->setSort("");
				$this->release_date->setSort("");
				$this->PaymentStatus->setSort("");
				$this->HospID->setSort("");
				$this->AdviceToOtherHospital->setSort("");
				$this->ReferedByDr->setSort("");
				$this->vid->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_patient_discharge_summarylistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_patient_discharge_summarylistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_patient_discharge_summarylist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_patient_discharge_summarylistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

		// PatientID
		if (!$this->isAddOrEdit())
			$this->PatientID->AdvancedSearch->setSearchValue(Get("x_PatientID", Get("PatientID", "")));
		if ($this->PatientID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientID->AdvancedSearch->setSearchOperator(Get("z_PatientID", ""));

		// patient_name
		if (!$this->isAddOrEdit())
			$this->patient_name->AdvancedSearch->setSearchValue(Get("x_patient_name", Get("patient_name", "")));
		if ($this->patient_name->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->patient_name->AdvancedSearch->setSearchOperator(Get("z_patient_name", ""));

		// profilePic
		if (!$this->isAddOrEdit())
			$this->profilePic->AdvancedSearch->setSearchValue(Get("x_profilePic", Get("profilePic", "")));
		if ($this->profilePic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->profilePic->AdvancedSearch->setSearchOperator(Get("z_profilePic", ""));

		// gender
		if (!$this->isAddOrEdit())
			$this->gender->AdvancedSearch->setSearchValue(Get("x_gender", Get("gender", "")));
		if ($this->gender->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->gender->AdvancedSearch->setSearchOperator(Get("z_gender", ""));

		// age
		if (!$this->isAddOrEdit())
			$this->age->AdvancedSearch->setSearchValue(Get("x_age", Get("age", "")));
		if ($this->age->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->age->AdvancedSearch->setSearchOperator(Get("z_age", ""));

		// physician_id
		if (!$this->isAddOrEdit())
			$this->physician_id->AdvancedSearch->setSearchValue(Get("x_physician_id", Get("physician_id", "")));
		if ($this->physician_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->physician_id->AdvancedSearch->setSearchOperator(Get("z_physician_id", ""));

		// typeRegsisteration
		if (!$this->isAddOrEdit())
			$this->typeRegsisteration->AdvancedSearch->setSearchValue(Get("x_typeRegsisteration", Get("typeRegsisteration", "")));
		if ($this->typeRegsisteration->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->typeRegsisteration->AdvancedSearch->setSearchOperator(Get("z_typeRegsisteration", ""));

		// PaymentCategory
		if (!$this->isAddOrEdit())
			$this->PaymentCategory->AdvancedSearch->setSearchValue(Get("x_PaymentCategory", Get("PaymentCategory", "")));
		if ($this->PaymentCategory->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PaymentCategory->AdvancedSearch->setSearchOperator(Get("z_PaymentCategory", ""));

		// admission_consultant_id
		if (!$this->isAddOrEdit())
			$this->admission_consultant_id->AdvancedSearch->setSearchValue(Get("x_admission_consultant_id", Get("admission_consultant_id", "")));
		if ($this->admission_consultant_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->admission_consultant_id->AdvancedSearch->setSearchOperator(Get("z_admission_consultant_id", ""));

		// leading_consultant_id
		if (!$this->isAddOrEdit())
			$this->leading_consultant_id->AdvancedSearch->setSearchValue(Get("x_leading_consultant_id", Get("leading_consultant_id", "")));
		if ($this->leading_consultant_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->leading_consultant_id->AdvancedSearch->setSearchOperator(Get("z_leading_consultant_id", ""));

		// cause
		if (!$this->isAddOrEdit())
			$this->cause->AdvancedSearch->setSearchValue(Get("x_cause", Get("cause", "")));
		if ($this->cause->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->cause->AdvancedSearch->setSearchOperator(Get("z_cause", ""));

		// admission_date
		if (!$this->isAddOrEdit())
			$this->admission_date->AdvancedSearch->setSearchValue(Get("x_admission_date", Get("admission_date", "")));
		if ($this->admission_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->admission_date->AdvancedSearch->setSearchOperator(Get("z_admission_date", ""));

		// release_date
		if (!$this->isAddOrEdit())
			$this->release_date->AdvancedSearch->setSearchValue(Get("x_release_date", Get("release_date", "")));
		if ($this->release_date->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->release_date->AdvancedSearch->setSearchOperator(Get("z_release_date", ""));

		// PaymentStatus
		if (!$this->isAddOrEdit())
			$this->PaymentStatus->AdvancedSearch->setSearchValue(Get("x_PaymentStatus", Get("PaymentStatus", "")));
		if ($this->PaymentStatus->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PaymentStatus->AdvancedSearch->setSearchOperator(Get("z_PaymentStatus", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));

		// mrnNo
		if (!$this->isAddOrEdit())
			$this->mrnNo->AdvancedSearch->setSearchValue(Get("x_mrnNo", Get("mrnNo", "")));
		if ($this->mrnNo->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->mrnNo->AdvancedSearch->setSearchOperator(Get("z_mrnNo", ""));

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

		// provisional_diagnosis
		if (!$this->isAddOrEdit())
			$this->provisional_diagnosis->AdvancedSearch->setSearchValue(Get("x_provisional_diagnosis", Get("provisional_diagnosis", "")));
		if ($this->provisional_diagnosis->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->provisional_diagnosis->AdvancedSearch->setSearchOperator(Get("z_provisional_diagnosis", ""));

		// Treatments
		if (!$this->isAddOrEdit())
			$this->Treatments->AdvancedSearch->setSearchValue(Get("x_Treatments", Get("Treatments", "")));
		if ($this->Treatments->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Treatments->AdvancedSearch->setSearchOperator(Get("z_Treatments", ""));

		// FinalDiagnosis
		if (!$this->isAddOrEdit())
			$this->FinalDiagnosis->AdvancedSearch->setSearchValue(Get("x_FinalDiagnosis", Get("FinalDiagnosis", "")));
		if ($this->FinalDiagnosis->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FinalDiagnosis->AdvancedSearch->setSearchOperator(Get("z_FinalDiagnosis", ""));

		// BP
		if (!$this->isAddOrEdit())
			$this->BP->AdvancedSearch->setSearchValue(Get("x_BP", Get("BP", "")));
		if ($this->BP->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BP->AdvancedSearch->setSearchOperator(Get("z_BP", ""));

		// Pulse
		if (!$this->isAddOrEdit())
			$this->Pulse->AdvancedSearch->setSearchValue(Get("x_Pulse", Get("Pulse", "")));
		if ($this->Pulse->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Pulse->AdvancedSearch->setSearchOperator(Get("z_Pulse", ""));

		// Resp
		if (!$this->isAddOrEdit())
			$this->Resp->AdvancedSearch->setSearchValue(Get("x_Resp", Get("Resp", "")));
		if ($this->Resp->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Resp->AdvancedSearch->setSearchOperator(Get("z_Resp", ""));

		// SPO2
		if (!$this->isAddOrEdit())
			$this->SPO2->AdvancedSearch->setSearchValue(Get("x_SPO2", Get("SPO2", "")));
		if ($this->SPO2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->SPO2->AdvancedSearch->setSearchOperator(Get("z_SPO2", ""));

		// FollowupAdvice
		if (!$this->isAddOrEdit())
			$this->FollowupAdvice->AdvancedSearch->setSearchValue(Get("x_FollowupAdvice", Get("FollowupAdvice", "")));
		if ($this->FollowupAdvice->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FollowupAdvice->AdvancedSearch->setSearchOperator(Get("z_FollowupAdvice", ""));

		// NextReviewDate
		if (!$this->isAddOrEdit())
			$this->NextReviewDate->AdvancedSearch->setSearchValue(Get("x_NextReviewDate", Get("NextReviewDate", "")));
		if ($this->NextReviewDate->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NextReviewDate->AdvancedSearch->setSearchOperator(Get("z_NextReviewDate", ""));

		// History
		if (!$this->isAddOrEdit())
			$this->History->AdvancedSearch->setSearchValue(Get("x_History", Get("History", "")));
		if ($this->History->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->History->AdvancedSearch->setSearchOperator(Get("z_History", ""));

		// patient_id
		if (!$this->isAddOrEdit())
			$this->patient_id->AdvancedSearch->setSearchValue(Get("x_patient_id", Get("patient_id", "")));
		if ($this->patient_id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->patient_id->AdvancedSearch->setSearchOperator(Get("z_patient_id", ""));

		// vitals
		if (!$this->isAddOrEdit())
			$this->vitals->AdvancedSearch->setSearchValue(Get("x_vitals", Get("vitals", "")));
		if ($this->vitals->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->vitals->AdvancedSearch->setSearchOperator(Get("z_vitals", ""));

		// courseinhospital
		if (!$this->isAddOrEdit())
			$this->courseinhospital->AdvancedSearch->setSearchValue(Get("x_courseinhospital", Get("courseinhospital", "")));
		if ($this->courseinhospital->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->courseinhospital->AdvancedSearch->setSearchOperator(Get("z_courseinhospital", ""));

		// procedurenotes
		if (!$this->isAddOrEdit())
			$this->procedurenotes->AdvancedSearch->setSearchValue(Get("x_procedurenotes", Get("procedurenotes", "")));
		if ($this->procedurenotes->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->procedurenotes->AdvancedSearch->setSearchOperator(Get("z_procedurenotes", ""));

		// conditionatdischarge
		if (!$this->isAddOrEdit())
			$this->conditionatdischarge->AdvancedSearch->setSearchValue(Get("x_conditionatdischarge", Get("conditionatdischarge", "")));
		if ($this->conditionatdischarge->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->conditionatdischarge->AdvancedSearch->setSearchOperator(Get("z_conditionatdischarge", ""));

		// AdviceToOtherHospital
		if (!$this->isAddOrEdit())
			$this->AdviceToOtherHospital->AdvancedSearch->setSearchValue(Get("x_AdviceToOtherHospital", Get("AdviceToOtherHospital", "")));
		if ($this->AdviceToOtherHospital->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AdviceToOtherHospital->AdvancedSearch->setSearchOperator(Get("z_AdviceToOtherHospital", ""));

		// ReferedByDr
		if (!$this->isAddOrEdit())
			$this->ReferedByDr->AdvancedSearch->setSearchValue(Get("x_ReferedByDr", Get("ReferedByDr", "")));
		if ($this->ReferedByDr->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ReferedByDr->AdvancedSearch->setSearchOperator(Get("z_ReferedByDr", ""));

		// DischargeAdviceMedicine
		if (!$this->isAddOrEdit())
			$this->DischargeAdviceMedicine->AdvancedSearch->setSearchValue(Get("x_DischargeAdviceMedicine", Get("DischargeAdviceMedicine", "")));
		if ($this->DischargeAdviceMedicine->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->DischargeAdviceMedicine->AdvancedSearch->setSearchOperator(Get("z_DischargeAdviceMedicine", ""));

		// vid
		if (!$this->isAddOrEdit())
			$this->vid->AdvancedSearch->setSearchValue(Get("x_vid", Get("vid", "")));
		if ($this->vid->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->vid->AdvancedSearch->setSearchOperator(Get("z_vid", ""));
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->patient_name->setDbValue($row['patient_name']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->gender->setDbValue($row['gender']);
		$this->age->setDbValue($row['age']);
		$this->physician_id->setDbValue($row['physician_id']);
		$this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
		$this->PaymentCategory->setDbValue($row['PaymentCategory']);
		$this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
		$this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
		$this->cause->setDbValue($row['cause']);
		$this->admission_date->setDbValue($row['admission_date']);
		$this->release_date->setDbValue($row['release_date']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->HospID->setDbValue($row['HospID']);
		$this->status->setDbValue($row['status']);
		$this->mrnNo->setDbValue($row['mrnNo']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->provisional_diagnosis->setDbValue($row['provisional_diagnosis']);
		$this->Treatments->setDbValue($row['Treatments']);
		$this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
		$this->BP->setDbValue($row['BP']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->Resp->setDbValue($row['Resp']);
		$this->SPO2->setDbValue($row['SPO2']);
		$this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
		$this->NextReviewDate->setDbValue($row['NextReviewDate']);
		$this->History->setDbValue($row['History']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->vitals->setDbValue($row['vitals']);
		$this->courseinhospital->setDbValue($row['courseinhospital']);
		$this->procedurenotes->setDbValue($row['procedurenotes']);
		$this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
		$this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		$this->DischargeAdviceMedicine->setDbValue($row['DischargeAdviceMedicine']);
		$this->vid->setDbValue($row['vid']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatientID'] = NULL;
		$row['patient_name'] = NULL;
		$row['profilePic'] = NULL;
		$row['gender'] = NULL;
		$row['age'] = NULL;
		$row['physician_id'] = NULL;
		$row['typeRegsisteration'] = NULL;
		$row['PaymentCategory'] = NULL;
		$row['admission_consultant_id'] = NULL;
		$row['leading_consultant_id'] = NULL;
		$row['cause'] = NULL;
		$row['admission_date'] = NULL;
		$row['release_date'] = NULL;
		$row['PaymentStatus'] = NULL;
		$row['HospID'] = NULL;
		$row['status'] = NULL;
		$row['mrnNo'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['provisional_diagnosis'] = NULL;
		$row['Treatments'] = NULL;
		$row['FinalDiagnosis'] = NULL;
		$row['BP'] = NULL;
		$row['Pulse'] = NULL;
		$row['Resp'] = NULL;
		$row['SPO2'] = NULL;
		$row['FollowupAdvice'] = NULL;
		$row['NextReviewDate'] = NULL;
		$row['History'] = NULL;
		$row['patient_id'] = NULL;
		$row['vitals'] = NULL;
		$row['courseinhospital'] = NULL;
		$row['procedurenotes'] = NULL;
		$row['conditionatdischarge'] = NULL;
		$row['AdviceToOtherHospital'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['DischargeAdviceMedicine'] = NULL;
		$row['vid'] = NULL;
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
		// PatientID
		// patient_name
		// profilePic
		// gender
		// age
		// physician_id
		// typeRegsisteration
		// PaymentCategory
		// admission_consultant_id
		// leading_consultant_id
		// cause
		// admission_date
		// release_date
		// PaymentStatus
		// HospID
		// status
		// mrnNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// provisional_diagnosis
		// Treatments
		// FinalDiagnosis
		// BP
		// Pulse
		// Resp
		// SPO2
		// FollowupAdvice
		// NextReviewDate
		// History
		// patient_id
		// vitals
		// courseinhospital
		// procedurenotes
		// conditionatdischarge
		// AdviceToOtherHospital
		// ReferedByDr
		// DischargeAdviceMedicine
		// vid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// physician_id
			$curVal = strval($this->physician_id->CurrentValue);
			if ($curVal <> "") {
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
				if ($this->physician_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
					}
				}
			} else {
				$this->physician_id->ViewValue = NULL;
			}
			$this->physician_id->ViewCustomAttributes = "";

			// typeRegsisteration
			$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
			$this->PaymentCategory->ViewCustomAttributes = "";

			// admission_consultant_id
			$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
			$this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
			$this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 7);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 7);
			$this->release_date->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
			$this->PaymentStatus->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

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

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// Resp
			$this->Resp->ViewValue = $this->Resp->CurrentValue;
			$this->Resp->ViewCustomAttributes = "";

			// SPO2
			$this->SPO2->ViewValue = $this->SPO2->CurrentValue;
			$this->SPO2->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 14);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
			$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
			$this->AdviceToOtherHospital->ViewCustomAttributes = "";

			// ReferedByDr
			$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
			$this->ReferedByDr->ViewCustomAttributes = "";

			// vid
			$this->vid->ViewValue = $this->vid->CurrentValue;
			$this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
			$this->vid->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			if (!EmptyValue($this->patient_id->CurrentValue)) {
				$this->PatientID->HrefValue = $this->patient_id->CurrentValue; // Add prefix/suffix
				$this->PatientID->LinkAttrs["target"] = "DischargeSummarysmry.php?cmd=search&x_"; // Add target
				if ($this->isExport()) $this->PatientID->HrefValue = FullUrl($this->PatientID->HrefValue, "href");
			} else {
				$this->PatientID->HrefValue = "";
			}
			$this->PatientID->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";
			$this->admission_date->TooltipValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";
			$this->release_date->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->LinkCustomAttributes = "";
			$this->AdviceToOtherHospital->HrefValue = "";
			$this->AdviceToOtherHospital->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// vid
			$this->vid->LinkCustomAttributes = "";
			$this->vid->HrefValue = "";
			$this->vid->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// patient_name
			$this->patient_name->EditAttrs["class"] = "form-control";
			$this->patient_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patient_name->AdvancedSearch->SearchValue = HtmlDecode($this->patient_name->AdvancedSearch->SearchValue);
			$this->patient_name->EditValue = HtmlEncode($this->patient_name->AdvancedSearch->SearchValue);
			$this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gender->AdvancedSearch->SearchValue = HtmlDecode($this->gender->AdvancedSearch->SearchValue);
			$this->gender->EditValue = HtmlEncode($this->gender->AdvancedSearch->SearchValue);
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// physician_id
			$this->physician_id->EditAttrs["class"] = "form-control";
			$this->physician_id->EditCustomAttributes = "";

			// typeRegsisteration
			$this->typeRegsisteration->EditAttrs["class"] = "form-control";
			$this->typeRegsisteration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->typeRegsisteration->AdvancedSearch->SearchValue = HtmlDecode($this->typeRegsisteration->AdvancedSearch->SearchValue);
			$this->typeRegsisteration->EditValue = HtmlEncode($this->typeRegsisteration->AdvancedSearch->SearchValue);
			$this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

			// PaymentCategory
			$this->PaymentCategory->EditAttrs["class"] = "form-control";
			$this->PaymentCategory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentCategory->AdvancedSearch->SearchValue = HtmlDecode($this->PaymentCategory->AdvancedSearch->SearchValue);
			$this->PaymentCategory->EditValue = HtmlEncode($this->PaymentCategory->AdvancedSearch->SearchValue);
			$this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

			// admission_date
			$this->admission_date->EditAttrs["class"] = "form-control";
			$this->admission_date->EditCustomAttributes = "";
			$this->admission_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->admission_date->AdvancedSearch->SearchValue, 7), 7));
			$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

			// release_date
			$this->release_date->EditAttrs["class"] = "form-control";
			$this->release_date->EditCustomAttributes = "";
			$this->release_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->release_date->AdvancedSearch->SearchValue, 7), 7));
			$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->AdvancedSearch->SearchValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HospID->AdvancedSearch->SearchValue = HtmlDecode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
			$this->AdviceToOtherHospital->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdviceToOtherHospital->AdvancedSearch->SearchValue = HtmlDecode($this->AdviceToOtherHospital->AdvancedSearch->SearchValue);
			$this->AdviceToOtherHospital->EditValue = HtmlEncode($this->AdviceToOtherHospital->AdvancedSearch->SearchValue);
			$this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

			// ReferedByDr
			$this->ReferedByDr->EditAttrs["class"] = "form-control";
			$this->ReferedByDr->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferedByDr->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->EditValue = HtmlEncode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

			// vid
			$this->vid->EditAttrs["class"] = "form-control";
			$this->vid->EditCustomAttributes = "";
			$this->vid->EditValue = HtmlEncode($this->vid->AdvancedSearch->SearchValue);
			$this->vid->PlaceHolder = RemoveHtml($this->vid->caption());
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
		$this->PatientID->AdvancedSearch->load();
		$this->patient_name->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->age->AdvancedSearch->load();
		$this->physician_id->AdvancedSearch->load();
		$this->typeRegsisteration->AdvancedSearch->load();
		$this->PaymentCategory->AdvancedSearch->load();
		$this->admission_consultant_id->AdvancedSearch->load();
		$this->leading_consultant_id->AdvancedSearch->load();
		$this->cause->AdvancedSearch->load();
		$this->admission_date->AdvancedSearch->load();
		$this->release_date->AdvancedSearch->load();
		$this->PaymentStatus->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->mrnNo->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->provisional_diagnosis->AdvancedSearch->load();
		$this->Treatments->AdvancedSearch->load();
		$this->FinalDiagnosis->AdvancedSearch->load();
		$this->BP->AdvancedSearch->load();
		$this->Pulse->AdvancedSearch->load();
		$this->Resp->AdvancedSearch->load();
		$this->SPO2->AdvancedSearch->load();
		$this->FollowupAdvice->AdvancedSearch->load();
		$this->NextReviewDate->AdvancedSearch->load();
		$this->History->AdvancedSearch->load();
		$this->patient_id->AdvancedSearch->load();
		$this->vitals->AdvancedSearch->load();
		$this->courseinhospital->AdvancedSearch->load();
		$this->procedurenotes->AdvancedSearch->load();
		$this->conditionatdischarge->AdvancedSearch->load();
		$this->AdviceToOtherHospital->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->DischargeAdviceMedicine->AdvancedSearch->load();
		$this->vid->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_patient_discharge_summarylist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_patient_discharge_summarylist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_patient_discharge_summarylist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_view_patient_discharge_summary\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_patient_discharge_summary',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_patient_discharge_summarylist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
						case "x_physician_id":
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
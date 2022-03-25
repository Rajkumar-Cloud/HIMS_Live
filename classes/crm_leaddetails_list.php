<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_leaddetails_list extends crm_leaddetails
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_leaddetails';

	// Page object name
	public $PageObjName = "crm_leaddetails_list";

	// Grid form hidden field names
	public $FormName = "fcrm_leaddetailslist";
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

		// Table object (crm_leaddetails)
		if (!isset($GLOBALS["crm_leaddetails"]) || get_class($GLOBALS["crm_leaddetails"]) == PROJECT_NAMESPACE . "crm_leaddetails") {
			$GLOBALS["crm_leaddetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_leaddetails"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "crm_leaddetailsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "crm_leaddetailsdelete.php";
		$this->MultiUpdateUrl = "crm_leaddetailsupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leaddetails');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fcrm_leaddetailslistsrch";

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
		global $EXPORT, $crm_leaddetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_leaddetails);
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
			$key .= @$ar['leadid'];
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
		$this->leadid->setVisibility();
		$this->lead_no->setVisibility();
		$this->_email->setVisibility();
		$this->interest->setVisibility();
		$this->firstname->setVisibility();
		$this->salutation->setVisibility();
		$this->lastname->setVisibility();
		$this->company->setVisibility();
		$this->annualrevenue->setVisibility();
		$this->industry->setVisibility();
		$this->campaign->setVisibility();
		$this->leadstatus->setVisibility();
		$this->leadsource->setVisibility();
		$this->converted->setVisibility();
		$this->licencekeystatus->setVisibility();
		$this->space->setVisibility();
		$this->comments->Visible = FALSE;
		$this->priority->setVisibility();
		$this->demorequest->setVisibility();
		$this->partnercontact->setVisibility();
		$this->productversion->setVisibility();
		$this->product->setVisibility();
		$this->maildate->setVisibility();
		$this->nextstepdate->setVisibility();
		$this->fundingsituation->setVisibility();
		$this->purpose->setVisibility();
		$this->evaluationstatus->setVisibility();
		$this->transferdate->setVisibility();
		$this->revenuetype->setVisibility();
		$this->noofemployees->setVisibility();
		$this->secondaryemail->setVisibility();
		$this->noapprovalcalls->setVisibility();
		$this->noapprovalemails->setVisibility();
		$this->vat_id->setVisibility();
		$this->registration_number_1->setVisibility();
		$this->registration_number_2->setVisibility();
		$this->verification->Visible = FALSE;
		$this->subindustry->setVisibility();
		$this->atenttion->Visible = FALSE;
		$this->leads_relation->setVisibility();
		$this->legal_form->setVisibility();
		$this->sum_time->setVisibility();
		$this->active->setVisibility();
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
			$this->leadid->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->leadid->FormValue))
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fcrm_leaddetailslistsrch");
		$filterList = Concat($filterList, $this->leadid->AdvancedSearch->toJson(), ","); // Field leadid
		$filterList = Concat($filterList, $this->lead_no->AdvancedSearch->toJson(), ","); // Field lead_no
		$filterList = Concat($filterList, $this->_email->AdvancedSearch->toJson(), ","); // Field email
		$filterList = Concat($filterList, $this->interest->AdvancedSearch->toJson(), ","); // Field interest
		$filterList = Concat($filterList, $this->firstname->AdvancedSearch->toJson(), ","); // Field firstname
		$filterList = Concat($filterList, $this->salutation->AdvancedSearch->toJson(), ","); // Field salutation
		$filterList = Concat($filterList, $this->lastname->AdvancedSearch->toJson(), ","); // Field lastname
		$filterList = Concat($filterList, $this->company->AdvancedSearch->toJson(), ","); // Field company
		$filterList = Concat($filterList, $this->annualrevenue->AdvancedSearch->toJson(), ","); // Field annualrevenue
		$filterList = Concat($filterList, $this->industry->AdvancedSearch->toJson(), ","); // Field industry
		$filterList = Concat($filterList, $this->campaign->AdvancedSearch->toJson(), ","); // Field campaign
		$filterList = Concat($filterList, $this->leadstatus->AdvancedSearch->toJson(), ","); // Field leadstatus
		$filterList = Concat($filterList, $this->leadsource->AdvancedSearch->toJson(), ","); // Field leadsource
		$filterList = Concat($filterList, $this->converted->AdvancedSearch->toJson(), ","); // Field converted
		$filterList = Concat($filterList, $this->licencekeystatus->AdvancedSearch->toJson(), ","); // Field licencekeystatus
		$filterList = Concat($filterList, $this->space->AdvancedSearch->toJson(), ","); // Field space
		$filterList = Concat($filterList, $this->comments->AdvancedSearch->toJson(), ","); // Field comments
		$filterList = Concat($filterList, $this->priority->AdvancedSearch->toJson(), ","); // Field priority
		$filterList = Concat($filterList, $this->demorequest->AdvancedSearch->toJson(), ","); // Field demorequest
		$filterList = Concat($filterList, $this->partnercontact->AdvancedSearch->toJson(), ","); // Field partnercontact
		$filterList = Concat($filterList, $this->productversion->AdvancedSearch->toJson(), ","); // Field productversion
		$filterList = Concat($filterList, $this->product->AdvancedSearch->toJson(), ","); // Field product
		$filterList = Concat($filterList, $this->maildate->AdvancedSearch->toJson(), ","); // Field maildate
		$filterList = Concat($filterList, $this->nextstepdate->AdvancedSearch->toJson(), ","); // Field nextstepdate
		$filterList = Concat($filterList, $this->fundingsituation->AdvancedSearch->toJson(), ","); // Field fundingsituation
		$filterList = Concat($filterList, $this->purpose->AdvancedSearch->toJson(), ","); // Field purpose
		$filterList = Concat($filterList, $this->evaluationstatus->AdvancedSearch->toJson(), ","); // Field evaluationstatus
		$filterList = Concat($filterList, $this->transferdate->AdvancedSearch->toJson(), ","); // Field transferdate
		$filterList = Concat($filterList, $this->revenuetype->AdvancedSearch->toJson(), ","); // Field revenuetype
		$filterList = Concat($filterList, $this->noofemployees->AdvancedSearch->toJson(), ","); // Field noofemployees
		$filterList = Concat($filterList, $this->secondaryemail->AdvancedSearch->toJson(), ","); // Field secondaryemail
		$filterList = Concat($filterList, $this->noapprovalcalls->AdvancedSearch->toJson(), ","); // Field noapprovalcalls
		$filterList = Concat($filterList, $this->noapprovalemails->AdvancedSearch->toJson(), ","); // Field noapprovalemails
		$filterList = Concat($filterList, $this->vat_id->AdvancedSearch->toJson(), ","); // Field vat_id
		$filterList = Concat($filterList, $this->registration_number_1->AdvancedSearch->toJson(), ","); // Field registration_number_1
		$filterList = Concat($filterList, $this->registration_number_2->AdvancedSearch->toJson(), ","); // Field registration_number_2
		$filterList = Concat($filterList, $this->verification->AdvancedSearch->toJson(), ","); // Field verification
		$filterList = Concat($filterList, $this->subindustry->AdvancedSearch->toJson(), ","); // Field subindustry
		$filterList = Concat($filterList, $this->atenttion->AdvancedSearch->toJson(), ","); // Field atenttion
		$filterList = Concat($filterList, $this->leads_relation->AdvancedSearch->toJson(), ","); // Field leads_relation
		$filterList = Concat($filterList, $this->legal_form->AdvancedSearch->toJson(), ","); // Field legal_form
		$filterList = Concat($filterList, $this->sum_time->AdvancedSearch->toJson(), ","); // Field sum_time
		$filterList = Concat($filterList, $this->active->AdvancedSearch->toJson(), ","); // Field active
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fcrm_leaddetailslistsrch", $filters);
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

		// Field leadid
		$this->leadid->AdvancedSearch->SearchValue = @$filter["x_leadid"];
		$this->leadid->AdvancedSearch->SearchOperator = @$filter["z_leadid"];
		$this->leadid->AdvancedSearch->SearchCondition = @$filter["v_leadid"];
		$this->leadid->AdvancedSearch->SearchValue2 = @$filter["y_leadid"];
		$this->leadid->AdvancedSearch->SearchOperator2 = @$filter["w_leadid"];
		$this->leadid->AdvancedSearch->save();

		// Field lead_no
		$this->lead_no->AdvancedSearch->SearchValue = @$filter["x_lead_no"];
		$this->lead_no->AdvancedSearch->SearchOperator = @$filter["z_lead_no"];
		$this->lead_no->AdvancedSearch->SearchCondition = @$filter["v_lead_no"];
		$this->lead_no->AdvancedSearch->SearchValue2 = @$filter["y_lead_no"];
		$this->lead_no->AdvancedSearch->SearchOperator2 = @$filter["w_lead_no"];
		$this->lead_no->AdvancedSearch->save();

		// Field email
		$this->_email->AdvancedSearch->SearchValue = @$filter["x__email"];
		$this->_email->AdvancedSearch->SearchOperator = @$filter["z__email"];
		$this->_email->AdvancedSearch->SearchCondition = @$filter["v__email"];
		$this->_email->AdvancedSearch->SearchValue2 = @$filter["y__email"];
		$this->_email->AdvancedSearch->SearchOperator2 = @$filter["w__email"];
		$this->_email->AdvancedSearch->save();

		// Field interest
		$this->interest->AdvancedSearch->SearchValue = @$filter["x_interest"];
		$this->interest->AdvancedSearch->SearchOperator = @$filter["z_interest"];
		$this->interest->AdvancedSearch->SearchCondition = @$filter["v_interest"];
		$this->interest->AdvancedSearch->SearchValue2 = @$filter["y_interest"];
		$this->interest->AdvancedSearch->SearchOperator2 = @$filter["w_interest"];
		$this->interest->AdvancedSearch->save();

		// Field firstname
		$this->firstname->AdvancedSearch->SearchValue = @$filter["x_firstname"];
		$this->firstname->AdvancedSearch->SearchOperator = @$filter["z_firstname"];
		$this->firstname->AdvancedSearch->SearchCondition = @$filter["v_firstname"];
		$this->firstname->AdvancedSearch->SearchValue2 = @$filter["y_firstname"];
		$this->firstname->AdvancedSearch->SearchOperator2 = @$filter["w_firstname"];
		$this->firstname->AdvancedSearch->save();

		// Field salutation
		$this->salutation->AdvancedSearch->SearchValue = @$filter["x_salutation"];
		$this->salutation->AdvancedSearch->SearchOperator = @$filter["z_salutation"];
		$this->salutation->AdvancedSearch->SearchCondition = @$filter["v_salutation"];
		$this->salutation->AdvancedSearch->SearchValue2 = @$filter["y_salutation"];
		$this->salutation->AdvancedSearch->SearchOperator2 = @$filter["w_salutation"];
		$this->salutation->AdvancedSearch->save();

		// Field lastname
		$this->lastname->AdvancedSearch->SearchValue = @$filter["x_lastname"];
		$this->lastname->AdvancedSearch->SearchOperator = @$filter["z_lastname"];
		$this->lastname->AdvancedSearch->SearchCondition = @$filter["v_lastname"];
		$this->lastname->AdvancedSearch->SearchValue2 = @$filter["y_lastname"];
		$this->lastname->AdvancedSearch->SearchOperator2 = @$filter["w_lastname"];
		$this->lastname->AdvancedSearch->save();

		// Field company
		$this->company->AdvancedSearch->SearchValue = @$filter["x_company"];
		$this->company->AdvancedSearch->SearchOperator = @$filter["z_company"];
		$this->company->AdvancedSearch->SearchCondition = @$filter["v_company"];
		$this->company->AdvancedSearch->SearchValue2 = @$filter["y_company"];
		$this->company->AdvancedSearch->SearchOperator2 = @$filter["w_company"];
		$this->company->AdvancedSearch->save();

		// Field annualrevenue
		$this->annualrevenue->AdvancedSearch->SearchValue = @$filter["x_annualrevenue"];
		$this->annualrevenue->AdvancedSearch->SearchOperator = @$filter["z_annualrevenue"];
		$this->annualrevenue->AdvancedSearch->SearchCondition = @$filter["v_annualrevenue"];
		$this->annualrevenue->AdvancedSearch->SearchValue2 = @$filter["y_annualrevenue"];
		$this->annualrevenue->AdvancedSearch->SearchOperator2 = @$filter["w_annualrevenue"];
		$this->annualrevenue->AdvancedSearch->save();

		// Field industry
		$this->industry->AdvancedSearch->SearchValue = @$filter["x_industry"];
		$this->industry->AdvancedSearch->SearchOperator = @$filter["z_industry"];
		$this->industry->AdvancedSearch->SearchCondition = @$filter["v_industry"];
		$this->industry->AdvancedSearch->SearchValue2 = @$filter["y_industry"];
		$this->industry->AdvancedSearch->SearchOperator2 = @$filter["w_industry"];
		$this->industry->AdvancedSearch->save();

		// Field campaign
		$this->campaign->AdvancedSearch->SearchValue = @$filter["x_campaign"];
		$this->campaign->AdvancedSearch->SearchOperator = @$filter["z_campaign"];
		$this->campaign->AdvancedSearch->SearchCondition = @$filter["v_campaign"];
		$this->campaign->AdvancedSearch->SearchValue2 = @$filter["y_campaign"];
		$this->campaign->AdvancedSearch->SearchOperator2 = @$filter["w_campaign"];
		$this->campaign->AdvancedSearch->save();

		// Field leadstatus
		$this->leadstatus->AdvancedSearch->SearchValue = @$filter["x_leadstatus"];
		$this->leadstatus->AdvancedSearch->SearchOperator = @$filter["z_leadstatus"];
		$this->leadstatus->AdvancedSearch->SearchCondition = @$filter["v_leadstatus"];
		$this->leadstatus->AdvancedSearch->SearchValue2 = @$filter["y_leadstatus"];
		$this->leadstatus->AdvancedSearch->SearchOperator2 = @$filter["w_leadstatus"];
		$this->leadstatus->AdvancedSearch->save();

		// Field leadsource
		$this->leadsource->AdvancedSearch->SearchValue = @$filter["x_leadsource"];
		$this->leadsource->AdvancedSearch->SearchOperator = @$filter["z_leadsource"];
		$this->leadsource->AdvancedSearch->SearchCondition = @$filter["v_leadsource"];
		$this->leadsource->AdvancedSearch->SearchValue2 = @$filter["y_leadsource"];
		$this->leadsource->AdvancedSearch->SearchOperator2 = @$filter["w_leadsource"];
		$this->leadsource->AdvancedSearch->save();

		// Field converted
		$this->converted->AdvancedSearch->SearchValue = @$filter["x_converted"];
		$this->converted->AdvancedSearch->SearchOperator = @$filter["z_converted"];
		$this->converted->AdvancedSearch->SearchCondition = @$filter["v_converted"];
		$this->converted->AdvancedSearch->SearchValue2 = @$filter["y_converted"];
		$this->converted->AdvancedSearch->SearchOperator2 = @$filter["w_converted"];
		$this->converted->AdvancedSearch->save();

		// Field licencekeystatus
		$this->licencekeystatus->AdvancedSearch->SearchValue = @$filter["x_licencekeystatus"];
		$this->licencekeystatus->AdvancedSearch->SearchOperator = @$filter["z_licencekeystatus"];
		$this->licencekeystatus->AdvancedSearch->SearchCondition = @$filter["v_licencekeystatus"];
		$this->licencekeystatus->AdvancedSearch->SearchValue2 = @$filter["y_licencekeystatus"];
		$this->licencekeystatus->AdvancedSearch->SearchOperator2 = @$filter["w_licencekeystatus"];
		$this->licencekeystatus->AdvancedSearch->save();

		// Field space
		$this->space->AdvancedSearch->SearchValue = @$filter["x_space"];
		$this->space->AdvancedSearch->SearchOperator = @$filter["z_space"];
		$this->space->AdvancedSearch->SearchCondition = @$filter["v_space"];
		$this->space->AdvancedSearch->SearchValue2 = @$filter["y_space"];
		$this->space->AdvancedSearch->SearchOperator2 = @$filter["w_space"];
		$this->space->AdvancedSearch->save();

		// Field comments
		$this->comments->AdvancedSearch->SearchValue = @$filter["x_comments"];
		$this->comments->AdvancedSearch->SearchOperator = @$filter["z_comments"];
		$this->comments->AdvancedSearch->SearchCondition = @$filter["v_comments"];
		$this->comments->AdvancedSearch->SearchValue2 = @$filter["y_comments"];
		$this->comments->AdvancedSearch->SearchOperator2 = @$filter["w_comments"];
		$this->comments->AdvancedSearch->save();

		// Field priority
		$this->priority->AdvancedSearch->SearchValue = @$filter["x_priority"];
		$this->priority->AdvancedSearch->SearchOperator = @$filter["z_priority"];
		$this->priority->AdvancedSearch->SearchCondition = @$filter["v_priority"];
		$this->priority->AdvancedSearch->SearchValue2 = @$filter["y_priority"];
		$this->priority->AdvancedSearch->SearchOperator2 = @$filter["w_priority"];
		$this->priority->AdvancedSearch->save();

		// Field demorequest
		$this->demorequest->AdvancedSearch->SearchValue = @$filter["x_demorequest"];
		$this->demorequest->AdvancedSearch->SearchOperator = @$filter["z_demorequest"];
		$this->demorequest->AdvancedSearch->SearchCondition = @$filter["v_demorequest"];
		$this->demorequest->AdvancedSearch->SearchValue2 = @$filter["y_demorequest"];
		$this->demorequest->AdvancedSearch->SearchOperator2 = @$filter["w_demorequest"];
		$this->demorequest->AdvancedSearch->save();

		// Field partnercontact
		$this->partnercontact->AdvancedSearch->SearchValue = @$filter["x_partnercontact"];
		$this->partnercontact->AdvancedSearch->SearchOperator = @$filter["z_partnercontact"];
		$this->partnercontact->AdvancedSearch->SearchCondition = @$filter["v_partnercontact"];
		$this->partnercontact->AdvancedSearch->SearchValue2 = @$filter["y_partnercontact"];
		$this->partnercontact->AdvancedSearch->SearchOperator2 = @$filter["w_partnercontact"];
		$this->partnercontact->AdvancedSearch->save();

		// Field productversion
		$this->productversion->AdvancedSearch->SearchValue = @$filter["x_productversion"];
		$this->productversion->AdvancedSearch->SearchOperator = @$filter["z_productversion"];
		$this->productversion->AdvancedSearch->SearchCondition = @$filter["v_productversion"];
		$this->productversion->AdvancedSearch->SearchValue2 = @$filter["y_productversion"];
		$this->productversion->AdvancedSearch->SearchOperator2 = @$filter["w_productversion"];
		$this->productversion->AdvancedSearch->save();

		// Field product
		$this->product->AdvancedSearch->SearchValue = @$filter["x_product"];
		$this->product->AdvancedSearch->SearchOperator = @$filter["z_product"];
		$this->product->AdvancedSearch->SearchCondition = @$filter["v_product"];
		$this->product->AdvancedSearch->SearchValue2 = @$filter["y_product"];
		$this->product->AdvancedSearch->SearchOperator2 = @$filter["w_product"];
		$this->product->AdvancedSearch->save();

		// Field maildate
		$this->maildate->AdvancedSearch->SearchValue = @$filter["x_maildate"];
		$this->maildate->AdvancedSearch->SearchOperator = @$filter["z_maildate"];
		$this->maildate->AdvancedSearch->SearchCondition = @$filter["v_maildate"];
		$this->maildate->AdvancedSearch->SearchValue2 = @$filter["y_maildate"];
		$this->maildate->AdvancedSearch->SearchOperator2 = @$filter["w_maildate"];
		$this->maildate->AdvancedSearch->save();

		// Field nextstepdate
		$this->nextstepdate->AdvancedSearch->SearchValue = @$filter["x_nextstepdate"];
		$this->nextstepdate->AdvancedSearch->SearchOperator = @$filter["z_nextstepdate"];
		$this->nextstepdate->AdvancedSearch->SearchCondition = @$filter["v_nextstepdate"];
		$this->nextstepdate->AdvancedSearch->SearchValue2 = @$filter["y_nextstepdate"];
		$this->nextstepdate->AdvancedSearch->SearchOperator2 = @$filter["w_nextstepdate"];
		$this->nextstepdate->AdvancedSearch->save();

		// Field fundingsituation
		$this->fundingsituation->AdvancedSearch->SearchValue = @$filter["x_fundingsituation"];
		$this->fundingsituation->AdvancedSearch->SearchOperator = @$filter["z_fundingsituation"];
		$this->fundingsituation->AdvancedSearch->SearchCondition = @$filter["v_fundingsituation"];
		$this->fundingsituation->AdvancedSearch->SearchValue2 = @$filter["y_fundingsituation"];
		$this->fundingsituation->AdvancedSearch->SearchOperator2 = @$filter["w_fundingsituation"];
		$this->fundingsituation->AdvancedSearch->save();

		// Field purpose
		$this->purpose->AdvancedSearch->SearchValue = @$filter["x_purpose"];
		$this->purpose->AdvancedSearch->SearchOperator = @$filter["z_purpose"];
		$this->purpose->AdvancedSearch->SearchCondition = @$filter["v_purpose"];
		$this->purpose->AdvancedSearch->SearchValue2 = @$filter["y_purpose"];
		$this->purpose->AdvancedSearch->SearchOperator2 = @$filter["w_purpose"];
		$this->purpose->AdvancedSearch->save();

		// Field evaluationstatus
		$this->evaluationstatus->AdvancedSearch->SearchValue = @$filter["x_evaluationstatus"];
		$this->evaluationstatus->AdvancedSearch->SearchOperator = @$filter["z_evaluationstatus"];
		$this->evaluationstatus->AdvancedSearch->SearchCondition = @$filter["v_evaluationstatus"];
		$this->evaluationstatus->AdvancedSearch->SearchValue2 = @$filter["y_evaluationstatus"];
		$this->evaluationstatus->AdvancedSearch->SearchOperator2 = @$filter["w_evaluationstatus"];
		$this->evaluationstatus->AdvancedSearch->save();

		// Field transferdate
		$this->transferdate->AdvancedSearch->SearchValue = @$filter["x_transferdate"];
		$this->transferdate->AdvancedSearch->SearchOperator = @$filter["z_transferdate"];
		$this->transferdate->AdvancedSearch->SearchCondition = @$filter["v_transferdate"];
		$this->transferdate->AdvancedSearch->SearchValue2 = @$filter["y_transferdate"];
		$this->transferdate->AdvancedSearch->SearchOperator2 = @$filter["w_transferdate"];
		$this->transferdate->AdvancedSearch->save();

		// Field revenuetype
		$this->revenuetype->AdvancedSearch->SearchValue = @$filter["x_revenuetype"];
		$this->revenuetype->AdvancedSearch->SearchOperator = @$filter["z_revenuetype"];
		$this->revenuetype->AdvancedSearch->SearchCondition = @$filter["v_revenuetype"];
		$this->revenuetype->AdvancedSearch->SearchValue2 = @$filter["y_revenuetype"];
		$this->revenuetype->AdvancedSearch->SearchOperator2 = @$filter["w_revenuetype"];
		$this->revenuetype->AdvancedSearch->save();

		// Field noofemployees
		$this->noofemployees->AdvancedSearch->SearchValue = @$filter["x_noofemployees"];
		$this->noofemployees->AdvancedSearch->SearchOperator = @$filter["z_noofemployees"];
		$this->noofemployees->AdvancedSearch->SearchCondition = @$filter["v_noofemployees"];
		$this->noofemployees->AdvancedSearch->SearchValue2 = @$filter["y_noofemployees"];
		$this->noofemployees->AdvancedSearch->SearchOperator2 = @$filter["w_noofemployees"];
		$this->noofemployees->AdvancedSearch->save();

		// Field secondaryemail
		$this->secondaryemail->AdvancedSearch->SearchValue = @$filter["x_secondaryemail"];
		$this->secondaryemail->AdvancedSearch->SearchOperator = @$filter["z_secondaryemail"];
		$this->secondaryemail->AdvancedSearch->SearchCondition = @$filter["v_secondaryemail"];
		$this->secondaryemail->AdvancedSearch->SearchValue2 = @$filter["y_secondaryemail"];
		$this->secondaryemail->AdvancedSearch->SearchOperator2 = @$filter["w_secondaryemail"];
		$this->secondaryemail->AdvancedSearch->save();

		// Field noapprovalcalls
		$this->noapprovalcalls->AdvancedSearch->SearchValue = @$filter["x_noapprovalcalls"];
		$this->noapprovalcalls->AdvancedSearch->SearchOperator = @$filter["z_noapprovalcalls"];
		$this->noapprovalcalls->AdvancedSearch->SearchCondition = @$filter["v_noapprovalcalls"];
		$this->noapprovalcalls->AdvancedSearch->SearchValue2 = @$filter["y_noapprovalcalls"];
		$this->noapprovalcalls->AdvancedSearch->SearchOperator2 = @$filter["w_noapprovalcalls"];
		$this->noapprovalcalls->AdvancedSearch->save();

		// Field noapprovalemails
		$this->noapprovalemails->AdvancedSearch->SearchValue = @$filter["x_noapprovalemails"];
		$this->noapprovalemails->AdvancedSearch->SearchOperator = @$filter["z_noapprovalemails"];
		$this->noapprovalemails->AdvancedSearch->SearchCondition = @$filter["v_noapprovalemails"];
		$this->noapprovalemails->AdvancedSearch->SearchValue2 = @$filter["y_noapprovalemails"];
		$this->noapprovalemails->AdvancedSearch->SearchOperator2 = @$filter["w_noapprovalemails"];
		$this->noapprovalemails->AdvancedSearch->save();

		// Field vat_id
		$this->vat_id->AdvancedSearch->SearchValue = @$filter["x_vat_id"];
		$this->vat_id->AdvancedSearch->SearchOperator = @$filter["z_vat_id"];
		$this->vat_id->AdvancedSearch->SearchCondition = @$filter["v_vat_id"];
		$this->vat_id->AdvancedSearch->SearchValue2 = @$filter["y_vat_id"];
		$this->vat_id->AdvancedSearch->SearchOperator2 = @$filter["w_vat_id"];
		$this->vat_id->AdvancedSearch->save();

		// Field registration_number_1
		$this->registration_number_1->AdvancedSearch->SearchValue = @$filter["x_registration_number_1"];
		$this->registration_number_1->AdvancedSearch->SearchOperator = @$filter["z_registration_number_1"];
		$this->registration_number_1->AdvancedSearch->SearchCondition = @$filter["v_registration_number_1"];
		$this->registration_number_1->AdvancedSearch->SearchValue2 = @$filter["y_registration_number_1"];
		$this->registration_number_1->AdvancedSearch->SearchOperator2 = @$filter["w_registration_number_1"];
		$this->registration_number_1->AdvancedSearch->save();

		// Field registration_number_2
		$this->registration_number_2->AdvancedSearch->SearchValue = @$filter["x_registration_number_2"];
		$this->registration_number_2->AdvancedSearch->SearchOperator = @$filter["z_registration_number_2"];
		$this->registration_number_2->AdvancedSearch->SearchCondition = @$filter["v_registration_number_2"];
		$this->registration_number_2->AdvancedSearch->SearchValue2 = @$filter["y_registration_number_2"];
		$this->registration_number_2->AdvancedSearch->SearchOperator2 = @$filter["w_registration_number_2"];
		$this->registration_number_2->AdvancedSearch->save();

		// Field verification
		$this->verification->AdvancedSearch->SearchValue = @$filter["x_verification"];
		$this->verification->AdvancedSearch->SearchOperator = @$filter["z_verification"];
		$this->verification->AdvancedSearch->SearchCondition = @$filter["v_verification"];
		$this->verification->AdvancedSearch->SearchValue2 = @$filter["y_verification"];
		$this->verification->AdvancedSearch->SearchOperator2 = @$filter["w_verification"];
		$this->verification->AdvancedSearch->save();

		// Field subindustry
		$this->subindustry->AdvancedSearch->SearchValue = @$filter["x_subindustry"];
		$this->subindustry->AdvancedSearch->SearchOperator = @$filter["z_subindustry"];
		$this->subindustry->AdvancedSearch->SearchCondition = @$filter["v_subindustry"];
		$this->subindustry->AdvancedSearch->SearchValue2 = @$filter["y_subindustry"];
		$this->subindustry->AdvancedSearch->SearchOperator2 = @$filter["w_subindustry"];
		$this->subindustry->AdvancedSearch->save();

		// Field atenttion
		$this->atenttion->AdvancedSearch->SearchValue = @$filter["x_atenttion"];
		$this->atenttion->AdvancedSearch->SearchOperator = @$filter["z_atenttion"];
		$this->atenttion->AdvancedSearch->SearchCondition = @$filter["v_atenttion"];
		$this->atenttion->AdvancedSearch->SearchValue2 = @$filter["y_atenttion"];
		$this->atenttion->AdvancedSearch->SearchOperator2 = @$filter["w_atenttion"];
		$this->atenttion->AdvancedSearch->save();

		// Field leads_relation
		$this->leads_relation->AdvancedSearch->SearchValue = @$filter["x_leads_relation"];
		$this->leads_relation->AdvancedSearch->SearchOperator = @$filter["z_leads_relation"];
		$this->leads_relation->AdvancedSearch->SearchCondition = @$filter["v_leads_relation"];
		$this->leads_relation->AdvancedSearch->SearchValue2 = @$filter["y_leads_relation"];
		$this->leads_relation->AdvancedSearch->SearchOperator2 = @$filter["w_leads_relation"];
		$this->leads_relation->AdvancedSearch->save();

		// Field legal_form
		$this->legal_form->AdvancedSearch->SearchValue = @$filter["x_legal_form"];
		$this->legal_form->AdvancedSearch->SearchOperator = @$filter["z_legal_form"];
		$this->legal_form->AdvancedSearch->SearchCondition = @$filter["v_legal_form"];
		$this->legal_form->AdvancedSearch->SearchValue2 = @$filter["y_legal_form"];
		$this->legal_form->AdvancedSearch->SearchOperator2 = @$filter["w_legal_form"];
		$this->legal_form->AdvancedSearch->save();

		// Field sum_time
		$this->sum_time->AdvancedSearch->SearchValue = @$filter["x_sum_time"];
		$this->sum_time->AdvancedSearch->SearchOperator = @$filter["z_sum_time"];
		$this->sum_time->AdvancedSearch->SearchCondition = @$filter["v_sum_time"];
		$this->sum_time->AdvancedSearch->SearchValue2 = @$filter["y_sum_time"];
		$this->sum_time->AdvancedSearch->SearchOperator2 = @$filter["w_sum_time"];
		$this->sum_time->AdvancedSearch->save();

		// Field active
		$this->active->AdvancedSearch->SearchValue = @$filter["x_active"];
		$this->active->AdvancedSearch->SearchOperator = @$filter["z_active"];
		$this->active->AdvancedSearch->SearchCondition = @$filter["v_active"];
		$this->active->AdvancedSearch->SearchValue2 = @$filter["y_active"];
		$this->active->AdvancedSearch->SearchOperator2 = @$filter["w_active"];
		$this->active->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->lead_no, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_email, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->interest, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->firstname, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->salutation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->lastname, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->company, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->industry, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->campaign, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->leadstatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->leadsource, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->licencekeystatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->space, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->comments, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->priority, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->demorequest, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->partnercontact, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->productversion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->product, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->fundingsituation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->purpose, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->evaluationstatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->revenuetype, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->secondaryemail, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->vat_id, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->registration_number_1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->registration_number_2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->verification, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->subindustry, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->atenttion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->leads_relation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->legal_form, $arKeywords, $type);
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
			$this->updateSort($this->leadid); // leadid
			$this->updateSort($this->lead_no); // lead_no
			$this->updateSort($this->_email); // email
			$this->updateSort($this->interest); // interest
			$this->updateSort($this->firstname); // firstname
			$this->updateSort($this->salutation); // salutation
			$this->updateSort($this->lastname); // lastname
			$this->updateSort($this->company); // company
			$this->updateSort($this->annualrevenue); // annualrevenue
			$this->updateSort($this->industry); // industry
			$this->updateSort($this->campaign); // campaign
			$this->updateSort($this->leadstatus); // leadstatus
			$this->updateSort($this->leadsource); // leadsource
			$this->updateSort($this->converted); // converted
			$this->updateSort($this->licencekeystatus); // licencekeystatus
			$this->updateSort($this->space); // space
			$this->updateSort($this->priority); // priority
			$this->updateSort($this->demorequest); // demorequest
			$this->updateSort($this->partnercontact); // partnercontact
			$this->updateSort($this->productversion); // productversion
			$this->updateSort($this->product); // product
			$this->updateSort($this->maildate); // maildate
			$this->updateSort($this->nextstepdate); // nextstepdate
			$this->updateSort($this->fundingsituation); // fundingsituation
			$this->updateSort($this->purpose); // purpose
			$this->updateSort($this->evaluationstatus); // evaluationstatus
			$this->updateSort($this->transferdate); // transferdate
			$this->updateSort($this->revenuetype); // revenuetype
			$this->updateSort($this->noofemployees); // noofemployees
			$this->updateSort($this->secondaryemail); // secondaryemail
			$this->updateSort($this->noapprovalcalls); // noapprovalcalls
			$this->updateSort($this->noapprovalemails); // noapprovalemails
			$this->updateSort($this->vat_id); // vat_id
			$this->updateSort($this->registration_number_1); // registration_number_1
			$this->updateSort($this->registration_number_2); // registration_number_2
			$this->updateSort($this->subindustry); // subindustry
			$this->updateSort($this->leads_relation); // leads_relation
			$this->updateSort($this->legal_form); // legal_form
			$this->updateSort($this->sum_time); // sum_time
			$this->updateSort($this->active); // active
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
				$this->leadid->setSort("");
				$this->lead_no->setSort("");
				$this->_email->setSort("");
				$this->interest->setSort("");
				$this->firstname->setSort("");
				$this->salutation->setSort("");
				$this->lastname->setSort("");
				$this->company->setSort("");
				$this->annualrevenue->setSort("");
				$this->industry->setSort("");
				$this->campaign->setSort("");
				$this->leadstatus->setSort("");
				$this->leadsource->setSort("");
				$this->converted->setSort("");
				$this->licencekeystatus->setSort("");
				$this->space->setSort("");
				$this->priority->setSort("");
				$this->demorequest->setSort("");
				$this->partnercontact->setSort("");
				$this->productversion->setSort("");
				$this->product->setSort("");
				$this->maildate->setSort("");
				$this->nextstepdate->setSort("");
				$this->fundingsituation->setSort("");
				$this->purpose->setSort("");
				$this->evaluationstatus->setSort("");
				$this->transferdate->setSort("");
				$this->revenuetype->setSort("");
				$this->noofemployees->setSort("");
				$this->secondaryemail->setSort("");
				$this->noapprovalcalls->setSort("");
				$this->noapprovalemails->setSort("");
				$this->vat_id->setSort("");
				$this->registration_number_1->setSort("");
				$this->registration_number_2->setSort("");
				$this->subindustry->setSort("");
				$this->leads_relation->setSort("");
				$this->legal_form->setSort("");
				$this->sum_time->setSort("");
				$this->active->setSort("");
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->leadid->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fcrm_leaddetailslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fcrm_leaddetailslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fcrm_leaddetailslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fcrm_leaddetailslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->leadid->setDbValue($row['leadid']);
		$this->lead_no->setDbValue($row['lead_no']);
		$this->_email->setDbValue($row['email']);
		$this->interest->setDbValue($row['interest']);
		$this->firstname->setDbValue($row['firstname']);
		$this->salutation->setDbValue($row['salutation']);
		$this->lastname->setDbValue($row['lastname']);
		$this->company->setDbValue($row['company']);
		$this->annualrevenue->setDbValue($row['annualrevenue']);
		$this->industry->setDbValue($row['industry']);
		$this->campaign->setDbValue($row['campaign']);
		$this->leadstatus->setDbValue($row['leadstatus']);
		$this->leadsource->setDbValue($row['leadsource']);
		$this->converted->setDbValue($row['converted']);
		$this->licencekeystatus->setDbValue($row['licencekeystatus']);
		$this->space->setDbValue($row['space']);
		$this->comments->setDbValue($row['comments']);
		$this->priority->setDbValue($row['priority']);
		$this->demorequest->setDbValue($row['demorequest']);
		$this->partnercontact->setDbValue($row['partnercontact']);
		$this->productversion->setDbValue($row['productversion']);
		$this->product->setDbValue($row['product']);
		$this->maildate->setDbValue($row['maildate']);
		$this->nextstepdate->setDbValue($row['nextstepdate']);
		$this->fundingsituation->setDbValue($row['fundingsituation']);
		$this->purpose->setDbValue($row['purpose']);
		$this->evaluationstatus->setDbValue($row['evaluationstatus']);
		$this->transferdate->setDbValue($row['transferdate']);
		$this->revenuetype->setDbValue($row['revenuetype']);
		$this->noofemployees->setDbValue($row['noofemployees']);
		$this->secondaryemail->setDbValue($row['secondaryemail']);
		$this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
		$this->noapprovalemails->setDbValue($row['noapprovalemails']);
		$this->vat_id->setDbValue($row['vat_id']);
		$this->registration_number_1->setDbValue($row['registration_number_1']);
		$this->registration_number_2->setDbValue($row['registration_number_2']);
		$this->verification->setDbValue($row['verification']);
		$this->subindustry->setDbValue($row['subindustry']);
		$this->atenttion->setDbValue($row['atenttion']);
		$this->leads_relation->setDbValue($row['leads_relation']);
		$this->legal_form->setDbValue($row['legal_form']);
		$this->sum_time->setDbValue($row['sum_time']);
		$this->active->setDbValue($row['active']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['leadid'] = NULL;
		$row['lead_no'] = NULL;
		$row['email'] = NULL;
		$row['interest'] = NULL;
		$row['firstname'] = NULL;
		$row['salutation'] = NULL;
		$row['lastname'] = NULL;
		$row['company'] = NULL;
		$row['annualrevenue'] = NULL;
		$row['industry'] = NULL;
		$row['campaign'] = NULL;
		$row['leadstatus'] = NULL;
		$row['leadsource'] = NULL;
		$row['converted'] = NULL;
		$row['licencekeystatus'] = NULL;
		$row['space'] = NULL;
		$row['comments'] = NULL;
		$row['priority'] = NULL;
		$row['demorequest'] = NULL;
		$row['partnercontact'] = NULL;
		$row['productversion'] = NULL;
		$row['product'] = NULL;
		$row['maildate'] = NULL;
		$row['nextstepdate'] = NULL;
		$row['fundingsituation'] = NULL;
		$row['purpose'] = NULL;
		$row['evaluationstatus'] = NULL;
		$row['transferdate'] = NULL;
		$row['revenuetype'] = NULL;
		$row['noofemployees'] = NULL;
		$row['secondaryemail'] = NULL;
		$row['noapprovalcalls'] = NULL;
		$row['noapprovalemails'] = NULL;
		$row['vat_id'] = NULL;
		$row['registration_number_1'] = NULL;
		$row['registration_number_2'] = NULL;
		$row['verification'] = NULL;
		$row['subindustry'] = NULL;
		$row['atenttion'] = NULL;
		$row['leads_relation'] = NULL;
		$row['legal_form'] = NULL;
		$row['sum_time'] = NULL;
		$row['active'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("leadid")) <> "")
			$this->leadid->CurrentValue = $this->getKey("leadid"); // leadid
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
		if ($this->annualrevenue->FormValue == $this->annualrevenue->CurrentValue && is_numeric(ConvertToFloatString($this->annualrevenue->CurrentValue)))
			$this->annualrevenue->CurrentValue = ConvertToFloatString($this->annualrevenue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue)))
			$this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// leadid
		// lead_no
		// email
		// interest
		// firstname
		// salutation
		// lastname
		// company
		// annualrevenue
		// industry
		// campaign
		// leadstatus
		// leadsource
		// converted
		// licencekeystatus
		// space
		// comments
		// priority
		// demorequest
		// partnercontact
		// productversion
		// product
		// maildate
		// nextstepdate
		// fundingsituation
		// purpose
		// evaluationstatus
		// transferdate
		// revenuetype
		// noofemployees
		// secondaryemail
		// noapprovalcalls
		// noapprovalemails
		// vat_id
		// registration_number_1
		// registration_number_2
		// verification
		// subindustry
		// atenttion
		// leads_relation
		// legal_form
		// sum_time
		// active

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// leadid
			$this->leadid->ViewValue = $this->leadid->CurrentValue;
			$this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
			$this->leadid->ViewCustomAttributes = "";

			// lead_no
			$this->lead_no->ViewValue = $this->lead_no->CurrentValue;
			$this->lead_no->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// interest
			$this->interest->ViewValue = $this->interest->CurrentValue;
			$this->interest->ViewCustomAttributes = "";

			// firstname
			$this->firstname->ViewValue = $this->firstname->CurrentValue;
			$this->firstname->ViewCustomAttributes = "";

			// salutation
			$this->salutation->ViewValue = $this->salutation->CurrentValue;
			$this->salutation->ViewCustomAttributes = "";

			// lastname
			$this->lastname->ViewValue = $this->lastname->CurrentValue;
			$this->lastname->ViewCustomAttributes = "";

			// company
			$this->company->ViewValue = $this->company->CurrentValue;
			$this->company->ViewCustomAttributes = "";

			// annualrevenue
			$this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
			$this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
			$this->annualrevenue->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewCustomAttributes = "";

			// campaign
			$this->campaign->ViewValue = $this->campaign->CurrentValue;
			$this->campaign->ViewCustomAttributes = "";

			// leadstatus
			$this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
			$this->leadstatus->ViewCustomAttributes = "";

			// leadsource
			$this->leadsource->ViewValue = $this->leadsource->CurrentValue;
			$this->leadsource->ViewCustomAttributes = "";

			// converted
			$this->converted->ViewValue = $this->converted->CurrentValue;
			$this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
			$this->converted->ViewCustomAttributes = "";

			// licencekeystatus
			$this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
			$this->licencekeystatus->ViewCustomAttributes = "";

			// space
			$this->space->ViewValue = $this->space->CurrentValue;
			$this->space->ViewCustomAttributes = "";

			// priority
			$this->priority->ViewValue = $this->priority->CurrentValue;
			$this->priority->ViewCustomAttributes = "";

			// demorequest
			$this->demorequest->ViewValue = $this->demorequest->CurrentValue;
			$this->demorequest->ViewCustomAttributes = "";

			// partnercontact
			$this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
			$this->partnercontact->ViewCustomAttributes = "";

			// productversion
			$this->productversion->ViewValue = $this->productversion->CurrentValue;
			$this->productversion->ViewCustomAttributes = "";

			// product
			$this->product->ViewValue = $this->product->CurrentValue;
			$this->product->ViewCustomAttributes = "";

			// maildate
			$this->maildate->ViewValue = $this->maildate->CurrentValue;
			$this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
			$this->maildate->ViewCustomAttributes = "";

			// nextstepdate
			$this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
			$this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
			$this->nextstepdate->ViewCustomAttributes = "";

			// fundingsituation
			$this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
			$this->fundingsituation->ViewCustomAttributes = "";

			// purpose
			$this->purpose->ViewValue = $this->purpose->CurrentValue;
			$this->purpose->ViewCustomAttributes = "";

			// evaluationstatus
			$this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
			$this->evaluationstatus->ViewCustomAttributes = "";

			// transferdate
			$this->transferdate->ViewValue = $this->transferdate->CurrentValue;
			$this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
			$this->transferdate->ViewCustomAttributes = "";

			// revenuetype
			$this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
			$this->revenuetype->ViewCustomAttributes = "";

			// noofemployees
			$this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
			$this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
			$this->noofemployees->ViewCustomAttributes = "";

			// secondaryemail
			$this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
			$this->secondaryemail->ViewCustomAttributes = "";

			// noapprovalcalls
			$this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
			$this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
			$this->noapprovalcalls->ViewCustomAttributes = "";

			// noapprovalemails
			$this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
			$this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
			$this->noapprovalemails->ViewCustomAttributes = "";

			// vat_id
			$this->vat_id->ViewValue = $this->vat_id->CurrentValue;
			$this->vat_id->ViewCustomAttributes = "";

			// registration_number_1
			$this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
			$this->registration_number_1->ViewCustomAttributes = "";

			// registration_number_2
			$this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
			$this->registration_number_2->ViewCustomAttributes = "";

			// subindustry
			$this->subindustry->ViewValue = $this->subindustry->CurrentValue;
			$this->subindustry->ViewCustomAttributes = "";

			// leads_relation
			$this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
			$this->leads_relation->ViewCustomAttributes = "";

			// legal_form
			$this->legal_form->ViewValue = $this->legal_form->CurrentValue;
			$this->legal_form->ViewCustomAttributes = "";

			// sum_time
			$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
			$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
			$this->sum_time->ViewCustomAttributes = "";

			// active
			$this->active->ViewValue = $this->active->CurrentValue;
			$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
			$this->active->ViewCustomAttributes = "";

			// leadid
			$this->leadid->LinkCustomAttributes = "";
			$this->leadid->HrefValue = "";
			$this->leadid->TooltipValue = "";

			// lead_no
			$this->lead_no->LinkCustomAttributes = "";
			$this->lead_no->HrefValue = "";
			$this->lead_no->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// interest
			$this->interest->LinkCustomAttributes = "";
			$this->interest->HrefValue = "";
			$this->interest->TooltipValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";
			$this->firstname->TooltipValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";
			$this->salutation->TooltipValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";
			$this->lastname->TooltipValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";
			$this->company->TooltipValue = "";

			// annualrevenue
			$this->annualrevenue->LinkCustomAttributes = "";
			$this->annualrevenue->HrefValue = "";
			$this->annualrevenue->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// campaign
			$this->campaign->LinkCustomAttributes = "";
			$this->campaign->HrefValue = "";
			$this->campaign->TooltipValue = "";

			// leadstatus
			$this->leadstatus->LinkCustomAttributes = "";
			$this->leadstatus->HrefValue = "";
			$this->leadstatus->TooltipValue = "";

			// leadsource
			$this->leadsource->LinkCustomAttributes = "";
			$this->leadsource->HrefValue = "";
			$this->leadsource->TooltipValue = "";

			// converted
			$this->converted->LinkCustomAttributes = "";
			$this->converted->HrefValue = "";
			$this->converted->TooltipValue = "";

			// licencekeystatus
			$this->licencekeystatus->LinkCustomAttributes = "";
			$this->licencekeystatus->HrefValue = "";
			$this->licencekeystatus->TooltipValue = "";

			// space
			$this->space->LinkCustomAttributes = "";
			$this->space->HrefValue = "";
			$this->space->TooltipValue = "";

			// priority
			$this->priority->LinkCustomAttributes = "";
			$this->priority->HrefValue = "";
			$this->priority->TooltipValue = "";

			// demorequest
			$this->demorequest->LinkCustomAttributes = "";
			$this->demorequest->HrefValue = "";
			$this->demorequest->TooltipValue = "";

			// partnercontact
			$this->partnercontact->LinkCustomAttributes = "";
			$this->partnercontact->HrefValue = "";
			$this->partnercontact->TooltipValue = "";

			// productversion
			$this->productversion->LinkCustomAttributes = "";
			$this->productversion->HrefValue = "";
			$this->productversion->TooltipValue = "";

			// product
			$this->product->LinkCustomAttributes = "";
			$this->product->HrefValue = "";
			$this->product->TooltipValue = "";

			// maildate
			$this->maildate->LinkCustomAttributes = "";
			$this->maildate->HrefValue = "";
			$this->maildate->TooltipValue = "";

			// nextstepdate
			$this->nextstepdate->LinkCustomAttributes = "";
			$this->nextstepdate->HrefValue = "";
			$this->nextstepdate->TooltipValue = "";

			// fundingsituation
			$this->fundingsituation->LinkCustomAttributes = "";
			$this->fundingsituation->HrefValue = "";
			$this->fundingsituation->TooltipValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";
			$this->purpose->TooltipValue = "";

			// evaluationstatus
			$this->evaluationstatus->LinkCustomAttributes = "";
			$this->evaluationstatus->HrefValue = "";
			$this->evaluationstatus->TooltipValue = "";

			// transferdate
			$this->transferdate->LinkCustomAttributes = "";
			$this->transferdate->HrefValue = "";
			$this->transferdate->TooltipValue = "";

			// revenuetype
			$this->revenuetype->LinkCustomAttributes = "";
			$this->revenuetype->HrefValue = "";
			$this->revenuetype->TooltipValue = "";

			// noofemployees
			$this->noofemployees->LinkCustomAttributes = "";
			$this->noofemployees->HrefValue = "";
			$this->noofemployees->TooltipValue = "";

			// secondaryemail
			$this->secondaryemail->LinkCustomAttributes = "";
			$this->secondaryemail->HrefValue = "";
			$this->secondaryemail->TooltipValue = "";

			// noapprovalcalls
			$this->noapprovalcalls->LinkCustomAttributes = "";
			$this->noapprovalcalls->HrefValue = "";
			$this->noapprovalcalls->TooltipValue = "";

			// noapprovalemails
			$this->noapprovalemails->LinkCustomAttributes = "";
			$this->noapprovalemails->HrefValue = "";
			$this->noapprovalemails->TooltipValue = "";

			// vat_id
			$this->vat_id->LinkCustomAttributes = "";
			$this->vat_id->HrefValue = "";
			$this->vat_id->TooltipValue = "";

			// registration_number_1
			$this->registration_number_1->LinkCustomAttributes = "";
			$this->registration_number_1->HrefValue = "";
			$this->registration_number_1->TooltipValue = "";

			// registration_number_2
			$this->registration_number_2->LinkCustomAttributes = "";
			$this->registration_number_2->HrefValue = "";
			$this->registration_number_2->TooltipValue = "";

			// subindustry
			$this->subindustry->LinkCustomAttributes = "";
			$this->subindustry->HrefValue = "";
			$this->subindustry->TooltipValue = "";

			// leads_relation
			$this->leads_relation->LinkCustomAttributes = "";
			$this->leads_relation->HrefValue = "";
			$this->leads_relation->TooltipValue = "";

			// legal_form
			$this->legal_form->LinkCustomAttributes = "";
			$this->legal_form->HrefValue = "";
			$this->legal_form->TooltipValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";
			$this->sum_time->TooltipValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";
			$this->active->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fcrm_leaddetailslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fcrm_leaddetailslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fcrm_leaddetailslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_crm_leaddetails\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_crm_leaddetails',hdr:ew.language.phrase('ExportToEmailText'),f:document.fcrm_leaddetailslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
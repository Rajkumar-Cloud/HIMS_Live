<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_et_chart_list extends ivf_et_chart
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_et_chart';

	// Page object name
	public $PageObjName = "ivf_et_chart_list";

	// Grid form hidden field names
	public $FormName = "fivf_et_chartlist";
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

		// Table object (ivf_et_chart)
		if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
			$GLOBALS["ivf_et_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_et_chart"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "ivf_et_chartadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_et_chartdelete.php";
		$this->MultiUpdateUrl = "ivf_et_chartupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_et_chartlistsrch";

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
		global $EXPORT, $ivf_et_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_et_chart);
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
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->Consultant->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->IndicationForART->setVisibility();
		$this->PreTreatment->setVisibility();
		$this->Hysteroscopy->setVisibility();
		$this->EndometrialScratching->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->CYCLETYPE->setVisibility();
		$this->HRTCYCLE->setVisibility();
		$this->OralEstrogenDosage->setVisibility();
		$this->VaginalEstrogen->setVisibility();
		$this->GCSF->setVisibility();
		$this->ActivatedPRP->setVisibility();
		$this->ERA->setVisibility();
		$this->UCLcm->setVisibility();
		$this->DATEOFSTART->setVisibility();
		$this->DATEOFEMBRYOTRANSFER->setVisibility();
		$this->DAYOFEMBRYOTRANSFER->setVisibility();
		$this->NOOFEMBRYOSTHAWED->setVisibility();
		$this->NOOFEMBRYOSTRANSFERRED->setVisibility();
		$this->DAYOFEMBRYOS->setVisibility();
		$this->CRYOPRESERVEDEMBRYOS->setVisibility();
		$this->Code1->setVisibility();
		$this->Code2->setVisibility();
		$this->CellStage1->setVisibility();
		$this->CellStage2->setVisibility();
		$this->Grade1->setVisibility();
		$this->Grade2->setVisibility();
		$this->ProcedureRecord->Visible = FALSE;
		$this->Medicationsadvised->Visible = FALSE;
		$this->PostProcedureInstructions->Visible = FALSE;
		$this->PregnancyTestingWithSerumBetaHcG->setVisibility();
		$this->ReviewDate->setVisibility();
		$this->ReviewDoctor->setVisibility();
		$this->TemplateProcedureRecord->Visible = FALSE;
		$this->TemplateMedicationsadvised->Visible = FALSE;
		$this->TemplatePostProcedureInstructions->Visible = FALSE;
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
		$this->setupLookupOptions($this->TemplateProcedureRecord);
		$this->setupLookupOptions($this->TemplateMedicationsadvised);
		$this->setupLookupOptions($this->TemplatePostProcedureInstructions);

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_et_chartlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->ARTCycle->AdvancedSearch->toJson(), ","); // Field ARTCycle
		$filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
		$filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
		$filterList = Concat($filterList, $this->IndicationForART->AdvancedSearch->toJson(), ","); // Field IndicationForART
		$filterList = Concat($filterList, $this->PreTreatment->AdvancedSearch->toJson(), ","); // Field PreTreatment
		$filterList = Concat($filterList, $this->Hysteroscopy->AdvancedSearch->toJson(), ","); // Field Hysteroscopy
		$filterList = Concat($filterList, $this->EndometrialScratching->AdvancedSearch->toJson(), ","); // Field EndometrialScratching
		$filterList = Concat($filterList, $this->TrialCannulation->AdvancedSearch->toJson(), ","); // Field TrialCannulation
		$filterList = Concat($filterList, $this->CYCLETYPE->AdvancedSearch->toJson(), ","); // Field CYCLETYPE
		$filterList = Concat($filterList, $this->HRTCYCLE->AdvancedSearch->toJson(), ","); // Field HRTCYCLE
		$filterList = Concat($filterList, $this->OralEstrogenDosage->AdvancedSearch->toJson(), ","); // Field OralEstrogenDosage
		$filterList = Concat($filterList, $this->VaginalEstrogen->AdvancedSearch->toJson(), ","); // Field VaginalEstrogen
		$filterList = Concat($filterList, $this->GCSF->AdvancedSearch->toJson(), ","); // Field GCSF
		$filterList = Concat($filterList, $this->ActivatedPRP->AdvancedSearch->toJson(), ","); // Field ActivatedPRP
		$filterList = Concat($filterList, $this->ERA->AdvancedSearch->toJson(), ","); // Field ERA
		$filterList = Concat($filterList, $this->UCLcm->AdvancedSearch->toJson(), ","); // Field UCLcm
		$filterList = Concat($filterList, $this->DATEOFSTART->AdvancedSearch->toJson(), ","); // Field DATEOFSTART
		$filterList = Concat($filterList, $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DATEOFEMBRYOTRANSFER
		$filterList = Concat($filterList, $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOTRANSFER
		$filterList = Concat($filterList, $this->NOOFEMBRYOSTHAWED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTHAWED
		$filterList = Concat($filterList, $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTRANSFERRED
		$filterList = Concat($filterList, $this->DAYOFEMBRYOS->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOS
		$filterList = Concat($filterList, $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->toJson(), ","); // Field CRYOPRESERVEDEMBRYOS
		$filterList = Concat($filterList, $this->Code1->AdvancedSearch->toJson(), ","); // Field Code1
		$filterList = Concat($filterList, $this->Code2->AdvancedSearch->toJson(), ","); // Field Code2
		$filterList = Concat($filterList, $this->CellStage1->AdvancedSearch->toJson(), ","); // Field CellStage1
		$filterList = Concat($filterList, $this->CellStage2->AdvancedSearch->toJson(), ","); // Field CellStage2
		$filterList = Concat($filterList, $this->Grade1->AdvancedSearch->toJson(), ","); // Field Grade1
		$filterList = Concat($filterList, $this->Grade2->AdvancedSearch->toJson(), ","); // Field Grade2
		$filterList = Concat($filterList, $this->ProcedureRecord->AdvancedSearch->toJson(), ","); // Field ProcedureRecord
		$filterList = Concat($filterList, $this->Medicationsadvised->AdvancedSearch->toJson(), ","); // Field Medicationsadvised
		$filterList = Concat($filterList, $this->PostProcedureInstructions->AdvancedSearch->toJson(), ","); // Field PostProcedureInstructions
		$filterList = Concat($filterList, $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->toJson(), ","); // Field PregnancyTestingWithSerumBetaHcG
		$filterList = Concat($filterList, $this->ReviewDate->AdvancedSearch->toJson(), ","); // Field ReviewDate
		$filterList = Concat($filterList, $this->ReviewDoctor->AdvancedSearch->toJson(), ","); // Field ReviewDoctor
		$filterList = Concat($filterList, $this->TemplateProcedureRecord->AdvancedSearch->toJson(), ","); // Field TemplateProcedureRecord
		$filterList = Concat($filterList, $this->TemplateMedicationsadvised->AdvancedSearch->toJson(), ","); // Field TemplateMedicationsadvised
		$filterList = Concat($filterList, $this->TemplatePostProcedureInstructions->AdvancedSearch->toJson(), ","); // Field TemplatePostProcedureInstructions
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_et_chartlistsrch", $filters);
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

		// Field RIDNo
		$this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
		$this->RIDNo->AdvancedSearch->save();

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field ARTCycle
		$this->ARTCycle->AdvancedSearch->SearchValue = @$filter["x_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchOperator = @$filter["z_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchCondition = @$filter["v_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchValue2 = @$filter["y_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->save();

		// Field Consultant
		$this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
		$this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
		$this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
		$this->Consultant->AdvancedSearch->save();

		// Field InseminatinTechnique
		$this->InseminatinTechnique->AdvancedSearch->SearchValue = @$filter["x_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchOperator = @$filter["z_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchCondition = @$filter["v_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchValue2 = @$filter["y_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchOperator2 = @$filter["w_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->save();

		// Field IndicationForART
		$this->IndicationForART->AdvancedSearch->SearchValue = @$filter["x_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchOperator = @$filter["z_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchCondition = @$filter["v_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchValue2 = @$filter["y_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchOperator2 = @$filter["w_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->save();

		// Field PreTreatment
		$this->PreTreatment->AdvancedSearch->SearchValue = @$filter["x_PreTreatment"];
		$this->PreTreatment->AdvancedSearch->SearchOperator = @$filter["z_PreTreatment"];
		$this->PreTreatment->AdvancedSearch->SearchCondition = @$filter["v_PreTreatment"];
		$this->PreTreatment->AdvancedSearch->SearchValue2 = @$filter["y_PreTreatment"];
		$this->PreTreatment->AdvancedSearch->SearchOperator2 = @$filter["w_PreTreatment"];
		$this->PreTreatment->AdvancedSearch->save();

		// Field Hysteroscopy
		$this->Hysteroscopy->AdvancedSearch->SearchValue = @$filter["x_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator = @$filter["z_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchCondition = @$filter["v_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchValue2 = @$filter["y_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator2 = @$filter["w_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->save();

		// Field EndometrialScratching
		$this->EndometrialScratching->AdvancedSearch->SearchValue = @$filter["x_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchOperator = @$filter["z_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchCondition = @$filter["v_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchValue2 = @$filter["y_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchOperator2 = @$filter["w_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->save();

		// Field TrialCannulation
		$this->TrialCannulation->AdvancedSearch->SearchValue = @$filter["x_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchOperator = @$filter["z_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchCondition = @$filter["v_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchValue2 = @$filter["y_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchOperator2 = @$filter["w_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->save();

		// Field CYCLETYPE
		$this->CYCLETYPE->AdvancedSearch->SearchValue = @$filter["x_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchOperator = @$filter["z_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchCondition = @$filter["v_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchValue2 = @$filter["y_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->save();

		// Field HRTCYCLE
		$this->HRTCYCLE->AdvancedSearch->SearchValue = @$filter["x_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->save();

		// Field OralEstrogenDosage
		$this->OralEstrogenDosage->AdvancedSearch->SearchValue = @$filter["x_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchOperator = @$filter["z_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchCondition = @$filter["v_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchValue2 = @$filter["y_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchOperator2 = @$filter["w_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->save();

		// Field VaginalEstrogen
		$this->VaginalEstrogen->AdvancedSearch->SearchValue = @$filter["x_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchOperator = @$filter["z_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchCondition = @$filter["v_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchValue2 = @$filter["y_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchOperator2 = @$filter["w_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->save();

		// Field GCSF
		$this->GCSF->AdvancedSearch->SearchValue = @$filter["x_GCSF"];
		$this->GCSF->AdvancedSearch->SearchOperator = @$filter["z_GCSF"];
		$this->GCSF->AdvancedSearch->SearchCondition = @$filter["v_GCSF"];
		$this->GCSF->AdvancedSearch->SearchValue2 = @$filter["y_GCSF"];
		$this->GCSF->AdvancedSearch->SearchOperator2 = @$filter["w_GCSF"];
		$this->GCSF->AdvancedSearch->save();

		// Field ActivatedPRP
		$this->ActivatedPRP->AdvancedSearch->SearchValue = @$filter["x_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchOperator = @$filter["z_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchCondition = @$filter["v_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchValue2 = @$filter["y_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchOperator2 = @$filter["w_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->save();

		// Field ERA
		$this->ERA->AdvancedSearch->SearchValue = @$filter["x_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator = @$filter["z_ERA"];
		$this->ERA->AdvancedSearch->SearchCondition = @$filter["v_ERA"];
		$this->ERA->AdvancedSearch->SearchValue2 = @$filter["y_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator2 = @$filter["w_ERA"];
		$this->ERA->AdvancedSearch->save();

		// Field UCLcm
		$this->UCLcm->AdvancedSearch->SearchValue = @$filter["x_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchOperator = @$filter["z_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchCondition = @$filter["v_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchValue2 = @$filter["y_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchOperator2 = @$filter["w_UCLcm"];
		$this->UCLcm->AdvancedSearch->save();

		// Field DATEOFSTART
		$this->DATEOFSTART->AdvancedSearch->SearchValue = @$filter["x_DATEOFSTART"];
		$this->DATEOFSTART->AdvancedSearch->SearchOperator = @$filter["z_DATEOFSTART"];
		$this->DATEOFSTART->AdvancedSearch->SearchCondition = @$filter["v_DATEOFSTART"];
		$this->DATEOFSTART->AdvancedSearch->SearchValue2 = @$filter["y_DATEOFSTART"];
		$this->DATEOFSTART->AdvancedSearch->SearchOperator2 = @$filter["w_DATEOFSTART"];
		$this->DATEOFSTART->AdvancedSearch->save();

		// Field DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DATEOFEMBRYOTRANSFER"];
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DATEOFEMBRYOTRANSFER"];
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DATEOFEMBRYOTRANSFER"];
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DATEOFEMBRYOTRANSFER"];
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DATEOFEMBRYOTRANSFER"];
		$this->DATEOFEMBRYOTRANSFER->AdvancedSearch->save();

		// Field DAYOFEMBRYOTRANSFER
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->save();

		// Field NOOFEMBRYOSTHAWED
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->save();

		// Field NOOFEMBRYOSTRANSFERRED
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->save();

		// Field DAYOFEMBRYOS
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->save();

		// Field CRYOPRESERVEDEMBRYOS
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->save();

		// Field Code1
		$this->Code1->AdvancedSearch->SearchValue = @$filter["x_Code1"];
		$this->Code1->AdvancedSearch->SearchOperator = @$filter["z_Code1"];
		$this->Code1->AdvancedSearch->SearchCondition = @$filter["v_Code1"];
		$this->Code1->AdvancedSearch->SearchValue2 = @$filter["y_Code1"];
		$this->Code1->AdvancedSearch->SearchOperator2 = @$filter["w_Code1"];
		$this->Code1->AdvancedSearch->save();

		// Field Code2
		$this->Code2->AdvancedSearch->SearchValue = @$filter["x_Code2"];
		$this->Code2->AdvancedSearch->SearchOperator = @$filter["z_Code2"];
		$this->Code2->AdvancedSearch->SearchCondition = @$filter["v_Code2"];
		$this->Code2->AdvancedSearch->SearchValue2 = @$filter["y_Code2"];
		$this->Code2->AdvancedSearch->SearchOperator2 = @$filter["w_Code2"];
		$this->Code2->AdvancedSearch->save();

		// Field CellStage1
		$this->CellStage1->AdvancedSearch->SearchValue = @$filter["x_CellStage1"];
		$this->CellStage1->AdvancedSearch->SearchOperator = @$filter["z_CellStage1"];
		$this->CellStage1->AdvancedSearch->SearchCondition = @$filter["v_CellStage1"];
		$this->CellStage1->AdvancedSearch->SearchValue2 = @$filter["y_CellStage1"];
		$this->CellStage1->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage1"];
		$this->CellStage1->AdvancedSearch->save();

		// Field CellStage2
		$this->CellStage2->AdvancedSearch->SearchValue = @$filter["x_CellStage2"];
		$this->CellStage2->AdvancedSearch->SearchOperator = @$filter["z_CellStage2"];
		$this->CellStage2->AdvancedSearch->SearchCondition = @$filter["v_CellStage2"];
		$this->CellStage2->AdvancedSearch->SearchValue2 = @$filter["y_CellStage2"];
		$this->CellStage2->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage2"];
		$this->CellStage2->AdvancedSearch->save();

		// Field Grade1
		$this->Grade1->AdvancedSearch->SearchValue = @$filter["x_Grade1"];
		$this->Grade1->AdvancedSearch->SearchOperator = @$filter["z_Grade1"];
		$this->Grade1->AdvancedSearch->SearchCondition = @$filter["v_Grade1"];
		$this->Grade1->AdvancedSearch->SearchValue2 = @$filter["y_Grade1"];
		$this->Grade1->AdvancedSearch->SearchOperator2 = @$filter["w_Grade1"];
		$this->Grade1->AdvancedSearch->save();

		// Field Grade2
		$this->Grade2->AdvancedSearch->SearchValue = @$filter["x_Grade2"];
		$this->Grade2->AdvancedSearch->SearchOperator = @$filter["z_Grade2"];
		$this->Grade2->AdvancedSearch->SearchCondition = @$filter["v_Grade2"];
		$this->Grade2->AdvancedSearch->SearchValue2 = @$filter["y_Grade2"];
		$this->Grade2->AdvancedSearch->SearchOperator2 = @$filter["w_Grade2"];
		$this->Grade2->AdvancedSearch->save();

		// Field ProcedureRecord
		$this->ProcedureRecord->AdvancedSearch->SearchValue = @$filter["x_ProcedureRecord"];
		$this->ProcedureRecord->AdvancedSearch->SearchOperator = @$filter["z_ProcedureRecord"];
		$this->ProcedureRecord->AdvancedSearch->SearchCondition = @$filter["v_ProcedureRecord"];
		$this->ProcedureRecord->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureRecord"];
		$this->ProcedureRecord->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureRecord"];
		$this->ProcedureRecord->AdvancedSearch->save();

		// Field Medicationsadvised
		$this->Medicationsadvised->AdvancedSearch->SearchValue = @$filter["x_Medicationsadvised"];
		$this->Medicationsadvised->AdvancedSearch->SearchOperator = @$filter["z_Medicationsadvised"];
		$this->Medicationsadvised->AdvancedSearch->SearchCondition = @$filter["v_Medicationsadvised"];
		$this->Medicationsadvised->AdvancedSearch->SearchValue2 = @$filter["y_Medicationsadvised"];
		$this->Medicationsadvised->AdvancedSearch->SearchOperator2 = @$filter["w_Medicationsadvised"];
		$this->Medicationsadvised->AdvancedSearch->save();

		// Field PostProcedureInstructions
		$this->PostProcedureInstructions->AdvancedSearch->SearchValue = @$filter["x_PostProcedureInstructions"];
		$this->PostProcedureInstructions->AdvancedSearch->SearchOperator = @$filter["z_PostProcedureInstructions"];
		$this->PostProcedureInstructions->AdvancedSearch->SearchCondition = @$filter["v_PostProcedureInstructions"];
		$this->PostProcedureInstructions->AdvancedSearch->SearchValue2 = @$filter["y_PostProcedureInstructions"];
		$this->PostProcedureInstructions->AdvancedSearch->SearchOperator2 = @$filter["w_PostProcedureInstructions"];
		$this->PostProcedureInstructions->AdvancedSearch->save();

		// Field PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchValue = @$filter["x_PregnancyTestingWithSerumBetaHcG"];
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchOperator = @$filter["z_PregnancyTestingWithSerumBetaHcG"];
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchCondition = @$filter["v_PregnancyTestingWithSerumBetaHcG"];
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchValue2 = @$filter["y_PregnancyTestingWithSerumBetaHcG"];
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchOperator2 = @$filter["w_PregnancyTestingWithSerumBetaHcG"];
		$this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->save();

		// Field ReviewDate
		$this->ReviewDate->AdvancedSearch->SearchValue = @$filter["x_ReviewDate"];
		$this->ReviewDate->AdvancedSearch->SearchOperator = @$filter["z_ReviewDate"];
		$this->ReviewDate->AdvancedSearch->SearchCondition = @$filter["v_ReviewDate"];
		$this->ReviewDate->AdvancedSearch->SearchValue2 = @$filter["y_ReviewDate"];
		$this->ReviewDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReviewDate"];
		$this->ReviewDate->AdvancedSearch->save();

		// Field ReviewDoctor
		$this->ReviewDoctor->AdvancedSearch->SearchValue = @$filter["x_ReviewDoctor"];
		$this->ReviewDoctor->AdvancedSearch->SearchOperator = @$filter["z_ReviewDoctor"];
		$this->ReviewDoctor->AdvancedSearch->SearchCondition = @$filter["v_ReviewDoctor"];
		$this->ReviewDoctor->AdvancedSearch->SearchValue2 = @$filter["y_ReviewDoctor"];
		$this->ReviewDoctor->AdvancedSearch->SearchOperator2 = @$filter["w_ReviewDoctor"];
		$this->ReviewDoctor->AdvancedSearch->save();

		// Field TemplateProcedureRecord
		$this->TemplateProcedureRecord->AdvancedSearch->SearchValue = @$filter["x_TemplateProcedureRecord"];
		$this->TemplateProcedureRecord->AdvancedSearch->SearchOperator = @$filter["z_TemplateProcedureRecord"];
		$this->TemplateProcedureRecord->AdvancedSearch->SearchCondition = @$filter["v_TemplateProcedureRecord"];
		$this->TemplateProcedureRecord->AdvancedSearch->SearchValue2 = @$filter["y_TemplateProcedureRecord"];
		$this->TemplateProcedureRecord->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateProcedureRecord"];
		$this->TemplateProcedureRecord->AdvancedSearch->save();

		// Field TemplateMedicationsadvised
		$this->TemplateMedicationsadvised->AdvancedSearch->SearchValue = @$filter["x_TemplateMedicationsadvised"];
		$this->TemplateMedicationsadvised->AdvancedSearch->SearchOperator = @$filter["z_TemplateMedicationsadvised"];
		$this->TemplateMedicationsadvised->AdvancedSearch->SearchCondition = @$filter["v_TemplateMedicationsadvised"];
		$this->TemplateMedicationsadvised->AdvancedSearch->SearchValue2 = @$filter["y_TemplateMedicationsadvised"];
		$this->TemplateMedicationsadvised->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateMedicationsadvised"];
		$this->TemplateMedicationsadvised->AdvancedSearch->save();

		// Field TemplatePostProcedureInstructions
		$this->TemplatePostProcedureInstructions->AdvancedSearch->SearchValue = @$filter["x_TemplatePostProcedureInstructions"];
		$this->TemplatePostProcedureInstructions->AdvancedSearch->SearchOperator = @$filter["z_TemplatePostProcedureInstructions"];
		$this->TemplatePostProcedureInstructions->AdvancedSearch->SearchCondition = @$filter["v_TemplatePostProcedureInstructions"];
		$this->TemplatePostProcedureInstructions->AdvancedSearch->SearchValue2 = @$filter["y_TemplatePostProcedureInstructions"];
		$this->TemplatePostProcedureInstructions->AdvancedSearch->SearchOperator2 = @$filter["w_TemplatePostProcedureInstructions"];
		$this->TemplatePostProcedureInstructions->AdvancedSearch->save();

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
		$this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IndicationForART, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreTreatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Hysteroscopy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EndometrialScratching, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TrialCannulation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CYCLETYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HRTCYCLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OralEstrogenDosage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VaginalEstrogen, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GCSF, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ActivatedPRP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ERA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UCLcm, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYOFEMBRYOTRANSFER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTHAWED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTRANSFERRED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYOFEMBRYOS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CRYOPRESERVEDEMBRYOS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Code1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Code2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CellStage1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CellStage2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Grade1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Grade2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProcedureRecord, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Medicationsadvised, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PostProcedureInstructions, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PregnancyTestingWithSerumBetaHcG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReviewDoctor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateProcedureRecord, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateMedicationsadvised, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplatePostProcedureInstructions, $arKeywords, $type);
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
			$this->updateSort($this->RIDNo); // RIDNo
			$this->updateSort($this->Name); // Name
			$this->updateSort($this->ARTCycle); // ARTCycle
			$this->updateSort($this->Consultant); // Consultant
			$this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
			$this->updateSort($this->IndicationForART); // IndicationForART
			$this->updateSort($this->PreTreatment); // PreTreatment
			$this->updateSort($this->Hysteroscopy); // Hysteroscopy
			$this->updateSort($this->EndometrialScratching); // EndometrialScratching
			$this->updateSort($this->TrialCannulation); // TrialCannulation
			$this->updateSort($this->CYCLETYPE); // CYCLETYPE
			$this->updateSort($this->HRTCYCLE); // HRTCYCLE
			$this->updateSort($this->OralEstrogenDosage); // OralEstrogenDosage
			$this->updateSort($this->VaginalEstrogen); // VaginalEstrogen
			$this->updateSort($this->GCSF); // GCSF
			$this->updateSort($this->ActivatedPRP); // ActivatedPRP
			$this->updateSort($this->ERA); // ERA
			$this->updateSort($this->UCLcm); // UCLcm
			$this->updateSort($this->DATEOFSTART); // DATEOFSTART
			$this->updateSort($this->DATEOFEMBRYOTRANSFER); // DATEOFEMBRYOTRANSFER
			$this->updateSort($this->DAYOFEMBRYOTRANSFER); // DAYOFEMBRYOTRANSFER
			$this->updateSort($this->NOOFEMBRYOSTHAWED); // NOOFEMBRYOSTHAWED
			$this->updateSort($this->NOOFEMBRYOSTRANSFERRED); // NOOFEMBRYOSTRANSFERRED
			$this->updateSort($this->DAYOFEMBRYOS); // DAYOFEMBRYOS
			$this->updateSort($this->CRYOPRESERVEDEMBRYOS); // CRYOPRESERVEDEMBRYOS
			$this->updateSort($this->Code1); // Code1
			$this->updateSort($this->Code2); // Code2
			$this->updateSort($this->CellStage1); // CellStage1
			$this->updateSort($this->CellStage2); // CellStage2
			$this->updateSort($this->Grade1); // Grade1
			$this->updateSort($this->Grade2); // Grade2
			$this->updateSort($this->PregnancyTestingWithSerumBetaHcG); // PregnancyTestingWithSerumBetaHcG
			$this->updateSort($this->ReviewDate); // ReviewDate
			$this->updateSort($this->ReviewDoctor); // ReviewDoctor
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
				$this->RIDNo->setSort("");
				$this->Name->setSort("");
				$this->ARTCycle->setSort("");
				$this->Consultant->setSort("");
				$this->InseminatinTechnique->setSort("");
				$this->IndicationForART->setSort("");
				$this->PreTreatment->setSort("");
				$this->Hysteroscopy->setSort("");
				$this->EndometrialScratching->setSort("");
				$this->TrialCannulation->setSort("");
				$this->CYCLETYPE->setSort("");
				$this->HRTCYCLE->setSort("");
				$this->OralEstrogenDosage->setSort("");
				$this->VaginalEstrogen->setSort("");
				$this->GCSF->setSort("");
				$this->ActivatedPRP->setSort("");
				$this->ERA->setSort("");
				$this->UCLcm->setSort("");
				$this->DATEOFSTART->setSort("");
				$this->DATEOFEMBRYOTRANSFER->setSort("");
				$this->DAYOFEMBRYOTRANSFER->setSort("");
				$this->NOOFEMBRYOSTHAWED->setSort("");
				$this->NOOFEMBRYOSTRANSFERRED->setSort("");
				$this->DAYOFEMBRYOS->setSort("");
				$this->CRYOPRESERVEDEMBRYOS->setSort("");
				$this->Code1->setSort("");
				$this->Code2->setSort("");
				$this->CellStage1->setSort("");
				$this->CellStage2->setSort("");
				$this->Grade1->setSort("");
				$this->Grade2->setSort("");
				$this->PregnancyTestingWithSerumBetaHcG->setSort("");
				$this->ReviewDate->setSort("");
				$this->ReviewDoctor->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_et_chartlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_et_chartlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fivf_et_chartlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_et_chartlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->IndicationForART->setDbValue($row['IndicationForART']);
		$this->PreTreatment->setDbValue($row['PreTreatment']);
		$this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
		$this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
		$this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
		$this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
		$this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
		$this->GCSF->setDbValue($row['GCSF']);
		$this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
		$this->ERA->setDbValue($row['ERA']);
		$this->UCLcm->setDbValue($row['UCLcm']);
		$this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
		$this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
		$this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
		$this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
		$this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
		$this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
		$this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
		$this->Code1->setDbValue($row['Code1']);
		$this->Code2->setDbValue($row['Code2']);
		$this->CellStage1->setDbValue($row['CellStage1']);
		$this->CellStage2->setDbValue($row['CellStage2']);
		$this->Grade1->setDbValue($row['Grade1']);
		$this->Grade2->setDbValue($row['Grade2']);
		$this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
		$this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
		$this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
		$this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
		$this->ReviewDate->setDbValue($row['ReviewDate']);
		$this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
		$this->TemplateProcedureRecord->setDbValue($row['TemplateProcedureRecord']);
		$this->TemplateMedicationsadvised->setDbValue($row['TemplateMedicationsadvised']);
		$this->TemplatePostProcedureInstructions->setDbValue($row['TemplatePostProcedureInstructions']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ARTCycle'] = NULL;
		$row['Consultant'] = NULL;
		$row['InseminatinTechnique'] = NULL;
		$row['IndicationForART'] = NULL;
		$row['PreTreatment'] = NULL;
		$row['Hysteroscopy'] = NULL;
		$row['EndometrialScratching'] = NULL;
		$row['TrialCannulation'] = NULL;
		$row['CYCLETYPE'] = NULL;
		$row['HRTCYCLE'] = NULL;
		$row['OralEstrogenDosage'] = NULL;
		$row['VaginalEstrogen'] = NULL;
		$row['GCSF'] = NULL;
		$row['ActivatedPRP'] = NULL;
		$row['ERA'] = NULL;
		$row['UCLcm'] = NULL;
		$row['DATEOFSTART'] = NULL;
		$row['DATEOFEMBRYOTRANSFER'] = NULL;
		$row['DAYOFEMBRYOTRANSFER'] = NULL;
		$row['NOOFEMBRYOSTHAWED'] = NULL;
		$row['NOOFEMBRYOSTRANSFERRED'] = NULL;
		$row['DAYOFEMBRYOS'] = NULL;
		$row['CRYOPRESERVEDEMBRYOS'] = NULL;
		$row['Code1'] = NULL;
		$row['Code2'] = NULL;
		$row['CellStage1'] = NULL;
		$row['CellStage2'] = NULL;
		$row['Grade1'] = NULL;
		$row['Grade2'] = NULL;
		$row['ProcedureRecord'] = NULL;
		$row['Medicationsadvised'] = NULL;
		$row['PostProcedureInstructions'] = NULL;
		$row['PregnancyTestingWithSerumBetaHcG'] = NULL;
		$row['ReviewDate'] = NULL;
		$row['ReviewDoctor'] = NULL;
		$row['TemplateProcedureRecord'] = NULL;
		$row['TemplateMedicationsadvised'] = NULL;
		$row['TemplatePostProcedureInstructions'] = NULL;
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
		// RIDNo
		// Name
		// ARTCycle
		// Consultant
		// InseminatinTechnique
		// IndicationForART
		// PreTreatment
		// Hysteroscopy
		// EndometrialScratching
		// TrialCannulation
		// CYCLETYPE
		// HRTCYCLE
		// OralEstrogenDosage
		// VaginalEstrogen
		// GCSF
		// ActivatedPRP
		// ERA
		// UCLcm
		// DATEOFSTART
		// DATEOFEMBRYOTRANSFER
		// DAYOFEMBRYOTRANSFER
		// NOOFEMBRYOSTHAWED
		// NOOFEMBRYOSTRANSFERRED
		// DAYOFEMBRYOS
		// CRYOPRESERVEDEMBRYOS
		// Code1
		// Code2
		// CellStage1
		// CellStage2
		// Grade1
		// Grade2
		// ProcedureRecord
		// Medicationsadvised
		// PostProcedureInstructions
		// PregnancyTestingWithSerumBetaHcG
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedureRecord
		// TemplateMedicationsadvised
		// TemplatePostProcedureInstructions
		// TidNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// ARTCycle
			if (strval($this->ARTCycle->CurrentValue) <> "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) <> "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			$this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
			$this->IndicationForART->ViewCustomAttributes = "";

			// PreTreatment
			if (strval($this->PreTreatment->CurrentValue) <> "") {
				$this->PreTreatment->ViewValue = $this->PreTreatment->optionCaption($this->PreTreatment->CurrentValue);
			} else {
				$this->PreTreatment->ViewValue = NULL;
			}
			$this->PreTreatment->ViewCustomAttributes = "";

			// Hysteroscopy
			if (strval($this->Hysteroscopy->CurrentValue) <> "") {
				$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
			} else {
				$this->Hysteroscopy->ViewValue = NULL;
			}
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// EndometrialScratching
			if (strval($this->EndometrialScratching->CurrentValue) <> "") {
				$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
			} else {
				$this->EndometrialScratching->ViewValue = NULL;
			}
			$this->EndometrialScratching->ViewCustomAttributes = "";

			// TrialCannulation
			if (strval($this->TrialCannulation->CurrentValue) <> "") {
				$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
			} else {
				$this->TrialCannulation->ViewValue = NULL;
			}
			$this->TrialCannulation->ViewCustomAttributes = "";

			// CYCLETYPE
			if (strval($this->CYCLETYPE->CurrentValue) <> "") {
				$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
			} else {
				$this->CYCLETYPE->ViewValue = NULL;
			}
			$this->CYCLETYPE->ViewCustomAttributes = "";

			// HRTCYCLE
			$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
			$this->HRTCYCLE->ViewCustomAttributes = "";

			// OralEstrogenDosage
			if (strval($this->OralEstrogenDosage->CurrentValue) <> "") {
				$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
			} else {
				$this->OralEstrogenDosage->ViewValue = NULL;
			}
			$this->OralEstrogenDosage->ViewCustomAttributes = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
			$this->VaginalEstrogen->ViewCustomAttributes = "";

			// GCSF
			if (strval($this->GCSF->CurrentValue) <> "") {
				$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
			} else {
				$this->GCSF->ViewValue = NULL;
			}
			$this->GCSF->ViewCustomAttributes = "";

			// ActivatedPRP
			if (strval($this->ActivatedPRP->CurrentValue) <> "") {
				$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
			} else {
				$this->ActivatedPRP->ViewValue = NULL;
			}
			$this->ActivatedPRP->ViewCustomAttributes = "";

			// ERA
			if (strval($this->ERA->CurrentValue) <> "") {
				$this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
			} else {
				$this->ERA->ViewValue = NULL;
			}
			$this->ERA->ViewCustomAttributes = "";

			// UCLcm
			$this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
			$this->UCLcm->ViewCustomAttributes = "";

			// DATEOFSTART
			$this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
			$this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 11);
			$this->DATEOFSTART->ViewCustomAttributes = "";

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
			$this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 11);
			$this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
			$this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
			$this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
			$this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
			$this->DAYOFEMBRYOS->ViewCustomAttributes = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
			$this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

			// Code1
			$this->Code1->ViewValue = $this->Code1->CurrentValue;
			$this->Code1->ViewCustomAttributes = "";

			// Code2
			$this->Code2->ViewValue = $this->Code2->CurrentValue;
			$this->Code2->ViewCustomAttributes = "";

			// CellStage1
			$this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
			$this->CellStage1->ViewCustomAttributes = "";

			// CellStage2
			$this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
			$this->CellStage2->ViewCustomAttributes = "";

			// Grade1
			$this->Grade1->ViewValue = $this->Grade1->CurrentValue;
			$this->Grade1->ViewCustomAttributes = "";

			// Grade2
			$this->Grade2->ViewValue = $this->Grade2->CurrentValue;
			$this->Grade2->ViewCustomAttributes = "";

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
			$this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

			// ReviewDate
			$this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
			$this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
			$this->ReviewDate->ViewCustomAttributes = "";

			// ReviewDoctor
			$this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
			$this->ReviewDoctor->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";
			$this->ARTCycle->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";
			$this->IndicationForART->TooltipValue = "";

			// PreTreatment
			$this->PreTreatment->LinkCustomAttributes = "";
			$this->PreTreatment->HrefValue = "";
			$this->PreTreatment->TooltipValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";
			$this->Hysteroscopy->TooltipValue = "";

			// EndometrialScratching
			$this->EndometrialScratching->LinkCustomAttributes = "";
			$this->EndometrialScratching->HrefValue = "";
			$this->EndometrialScratching->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// CYCLETYPE
			$this->CYCLETYPE->LinkCustomAttributes = "";
			$this->CYCLETYPE->HrefValue = "";
			$this->CYCLETYPE->TooltipValue = "";

			// HRTCYCLE
			$this->HRTCYCLE->LinkCustomAttributes = "";
			$this->HRTCYCLE->HrefValue = "";
			$this->HRTCYCLE->TooltipValue = "";

			// OralEstrogenDosage
			$this->OralEstrogenDosage->LinkCustomAttributes = "";
			$this->OralEstrogenDosage->HrefValue = "";
			$this->OralEstrogenDosage->TooltipValue = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->LinkCustomAttributes = "";
			$this->VaginalEstrogen->HrefValue = "";
			$this->VaginalEstrogen->TooltipValue = "";

			// GCSF
			$this->GCSF->LinkCustomAttributes = "";
			$this->GCSF->HrefValue = "";
			$this->GCSF->TooltipValue = "";

			// ActivatedPRP
			$this->ActivatedPRP->LinkCustomAttributes = "";
			$this->ActivatedPRP->HrefValue = "";
			$this->ActivatedPRP->TooltipValue = "";

			// ERA
			$this->ERA->LinkCustomAttributes = "";
			$this->ERA->HrefValue = "";
			$this->ERA->TooltipValue = "";

			// UCLcm
			$this->UCLcm->LinkCustomAttributes = "";
			$this->UCLcm->HrefValue = "";
			$this->UCLcm->TooltipValue = "";

			// DATEOFSTART
			$this->DATEOFSTART->LinkCustomAttributes = "";
			$this->DATEOFSTART->HrefValue = "";
			$this->DATEOFSTART->TooltipValue = "";

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DATEOFEMBRYOTRANSFER->HrefValue = "";
			$this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOTRANSFER->HrefValue = "";
			$this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTHAWED->HrefValue = "";
			$this->NOOFEMBRYOSTHAWED->TooltipValue = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
			$this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOS->HrefValue = "";
			$this->DAYOFEMBRYOS->TooltipValue = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
			$this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
			$this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";
			$this->Code1->TooltipValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";
			$this->Code2->TooltipValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";
			$this->CellStage1->TooltipValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";
			$this->CellStage2->TooltipValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";
			$this->Grade1->TooltipValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";
			$this->Grade2->TooltipValue = "";

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
			$this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
			$this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";
			$this->ReviewDate->TooltipValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";
			$this->ReviewDoctor->TooltipValue = "";

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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_et_chartlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_et_chartlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_et_chartlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_ivf_et_chart\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_et_chart',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_et_chartlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
				case "x_TemplateProcedureRecord":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Procedure Record'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMedicationsadvised":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Medications Advised'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePostProcedureInstructions":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Post Procedure Instructions'";
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
						case "x_TemplateProcedureRecord":
							break;
						case "x_TemplateMedicationsadvised":
							break;
						case "x_TemplatePostProcedureInstructions":
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
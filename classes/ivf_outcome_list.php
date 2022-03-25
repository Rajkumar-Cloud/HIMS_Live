<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_outcome_list extends ivf_outcome
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_outcome';

	// Page object name
	public $PageObjName = "ivf_outcome_list";

	// Grid form hidden field names
	public $FormName = "fivf_outcomelist";
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

		// Table object (ivf_outcome)
		if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
			$GLOBALS["ivf_outcome"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_outcome"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "ivf_outcomeadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_outcomedelete.php";
		$this->MultiUpdateUrl = "ivf_outcomeupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_outcomelistsrch";

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
		global $EXPORT, $ivf_outcome;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_outcome);
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
		$this->Age->setVisibility();
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->outcomeDate->setVisibility();
		$this->outcomeDay->setVisibility();
		$this->OPResult->setVisibility();
		$this->Gestation->setVisibility();
		$this->TransferdEmbryos->setVisibility();
		$this->InitalOfSacs->setVisibility();
		$this->ImplimentationRate->setVisibility();
		$this->EmbryoNo->setVisibility();
		$this->ExtrauterineSac->setVisibility();
		$this->PregnancyMonozygotic->setVisibility();
		$this->TypeGestation->setVisibility();
		$this->Urine->setVisibility();
		$this->PTdate->setVisibility();
		$this->Reduced->setVisibility();
		$this->INduced->setVisibility();
		$this->INducedDate->setVisibility();
		$this->Miscarriage->setVisibility();
		$this->Induced1->setVisibility();
		$this->Type->setVisibility();
		$this->IfClinical->setVisibility();
		$this->GADate->setVisibility();
		$this->GA->setVisibility();
		$this->FoetalDeath->setVisibility();
		$this->FerinatalDeath->setVisibility();
		$this->TidNo->setVisibility();
		$this->Ectopic->setVisibility();
		$this->Extra->setVisibility();
		$this->Implantation->setVisibility();
		$this->DeliveryDate->setVisibility();
		$this->BabyDetails->Visible = FALSE;
		$this->LSCSNormal->Visible = FALSE;
		$this->Notes->Visible = FALSE;
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

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
			global $ivf_treatment_plan;
			$rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ivf_treatment_planlist.php"); // Return to master page
			} else {
				$ivf_treatment_plan->loadListRowValues($rsmaster);
				$ivf_treatment_plan->RowType = ROWTYPE_MASTER; // Master row
				$ivf_treatment_plan->renderListRow();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_outcomelistsrch");
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
		$filterList = Concat($filterList, $this->outcomeDate->AdvancedSearch->toJson(), ","); // Field outcomeDate
		$filterList = Concat($filterList, $this->outcomeDay->AdvancedSearch->toJson(), ","); // Field outcomeDay
		$filterList = Concat($filterList, $this->OPResult->AdvancedSearch->toJson(), ","); // Field OPResult
		$filterList = Concat($filterList, $this->Gestation->AdvancedSearch->toJson(), ","); // Field Gestation
		$filterList = Concat($filterList, $this->TransferdEmbryos->AdvancedSearch->toJson(), ","); // Field TransferdEmbryos
		$filterList = Concat($filterList, $this->InitalOfSacs->AdvancedSearch->toJson(), ","); // Field InitalOfSacs
		$filterList = Concat($filterList, $this->ImplimentationRate->AdvancedSearch->toJson(), ","); // Field ImplimentationRate
		$filterList = Concat($filterList, $this->EmbryoNo->AdvancedSearch->toJson(), ","); // Field EmbryoNo
		$filterList = Concat($filterList, $this->ExtrauterineSac->AdvancedSearch->toJson(), ","); // Field ExtrauterineSac
		$filterList = Concat($filterList, $this->PregnancyMonozygotic->AdvancedSearch->toJson(), ","); // Field PregnancyMonozygotic
		$filterList = Concat($filterList, $this->TypeGestation->AdvancedSearch->toJson(), ","); // Field TypeGestation
		$filterList = Concat($filterList, $this->Urine->AdvancedSearch->toJson(), ","); // Field Urine
		$filterList = Concat($filterList, $this->PTdate->AdvancedSearch->toJson(), ","); // Field PTdate
		$filterList = Concat($filterList, $this->Reduced->AdvancedSearch->toJson(), ","); // Field Reduced
		$filterList = Concat($filterList, $this->INduced->AdvancedSearch->toJson(), ","); // Field INduced
		$filterList = Concat($filterList, $this->INducedDate->AdvancedSearch->toJson(), ","); // Field INducedDate
		$filterList = Concat($filterList, $this->Miscarriage->AdvancedSearch->toJson(), ","); // Field Miscarriage
		$filterList = Concat($filterList, $this->Induced1->AdvancedSearch->toJson(), ","); // Field Induced1
		$filterList = Concat($filterList, $this->Type->AdvancedSearch->toJson(), ","); // Field Type
		$filterList = Concat($filterList, $this->IfClinical->AdvancedSearch->toJson(), ","); // Field IfClinical
		$filterList = Concat($filterList, $this->GADate->AdvancedSearch->toJson(), ","); // Field GADate
		$filterList = Concat($filterList, $this->GA->AdvancedSearch->toJson(), ","); // Field GA
		$filterList = Concat($filterList, $this->FoetalDeath->AdvancedSearch->toJson(), ","); // Field FoetalDeath
		$filterList = Concat($filterList, $this->FerinatalDeath->AdvancedSearch->toJson(), ","); // Field FerinatalDeath
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
		$filterList = Concat($filterList, $this->Extra->AdvancedSearch->toJson(), ","); // Field Extra
		$filterList = Concat($filterList, $this->Implantation->AdvancedSearch->toJson(), ","); // Field Implantation
		$filterList = Concat($filterList, $this->DeliveryDate->AdvancedSearch->toJson(), ","); // Field DeliveryDate
		$filterList = Concat($filterList, $this->BabyDetails->AdvancedSearch->toJson(), ","); // Field BabyDetails
		$filterList = Concat($filterList, $this->LSCSNormal->AdvancedSearch->toJson(), ","); // Field LSCSNormal
		$filterList = Concat($filterList, $this->Notes->AdvancedSearch->toJson(), ","); // Field Notes
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_outcomelistsrch", $filters);
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

		// Field outcomeDate
		$this->outcomeDate->AdvancedSearch->SearchValue = @$filter["x_outcomeDate"];
		$this->outcomeDate->AdvancedSearch->SearchOperator = @$filter["z_outcomeDate"];
		$this->outcomeDate->AdvancedSearch->SearchCondition = @$filter["v_outcomeDate"];
		$this->outcomeDate->AdvancedSearch->SearchValue2 = @$filter["y_outcomeDate"];
		$this->outcomeDate->AdvancedSearch->SearchOperator2 = @$filter["w_outcomeDate"];
		$this->outcomeDate->AdvancedSearch->save();

		// Field outcomeDay
		$this->outcomeDay->AdvancedSearch->SearchValue = @$filter["x_outcomeDay"];
		$this->outcomeDay->AdvancedSearch->SearchOperator = @$filter["z_outcomeDay"];
		$this->outcomeDay->AdvancedSearch->SearchCondition = @$filter["v_outcomeDay"];
		$this->outcomeDay->AdvancedSearch->SearchValue2 = @$filter["y_outcomeDay"];
		$this->outcomeDay->AdvancedSearch->SearchOperator2 = @$filter["w_outcomeDay"];
		$this->outcomeDay->AdvancedSearch->save();

		// Field OPResult
		$this->OPResult->AdvancedSearch->SearchValue = @$filter["x_OPResult"];
		$this->OPResult->AdvancedSearch->SearchOperator = @$filter["z_OPResult"];
		$this->OPResult->AdvancedSearch->SearchCondition = @$filter["v_OPResult"];
		$this->OPResult->AdvancedSearch->SearchValue2 = @$filter["y_OPResult"];
		$this->OPResult->AdvancedSearch->SearchOperator2 = @$filter["w_OPResult"];
		$this->OPResult->AdvancedSearch->save();

		// Field Gestation
		$this->Gestation->AdvancedSearch->SearchValue = @$filter["x_Gestation"];
		$this->Gestation->AdvancedSearch->SearchOperator = @$filter["z_Gestation"];
		$this->Gestation->AdvancedSearch->SearchCondition = @$filter["v_Gestation"];
		$this->Gestation->AdvancedSearch->SearchValue2 = @$filter["y_Gestation"];
		$this->Gestation->AdvancedSearch->SearchOperator2 = @$filter["w_Gestation"];
		$this->Gestation->AdvancedSearch->save();

		// Field TransferdEmbryos
		$this->TransferdEmbryos->AdvancedSearch->SearchValue = @$filter["x_TransferdEmbryos"];
		$this->TransferdEmbryos->AdvancedSearch->SearchOperator = @$filter["z_TransferdEmbryos"];
		$this->TransferdEmbryos->AdvancedSearch->SearchCondition = @$filter["v_TransferdEmbryos"];
		$this->TransferdEmbryos->AdvancedSearch->SearchValue2 = @$filter["y_TransferdEmbryos"];
		$this->TransferdEmbryos->AdvancedSearch->SearchOperator2 = @$filter["w_TransferdEmbryos"];
		$this->TransferdEmbryos->AdvancedSearch->save();

		// Field InitalOfSacs
		$this->InitalOfSacs->AdvancedSearch->SearchValue = @$filter["x_InitalOfSacs"];
		$this->InitalOfSacs->AdvancedSearch->SearchOperator = @$filter["z_InitalOfSacs"];
		$this->InitalOfSacs->AdvancedSearch->SearchCondition = @$filter["v_InitalOfSacs"];
		$this->InitalOfSacs->AdvancedSearch->SearchValue2 = @$filter["y_InitalOfSacs"];
		$this->InitalOfSacs->AdvancedSearch->SearchOperator2 = @$filter["w_InitalOfSacs"];
		$this->InitalOfSacs->AdvancedSearch->save();

		// Field ImplimentationRate
		$this->ImplimentationRate->AdvancedSearch->SearchValue = @$filter["x_ImplimentationRate"];
		$this->ImplimentationRate->AdvancedSearch->SearchOperator = @$filter["z_ImplimentationRate"];
		$this->ImplimentationRate->AdvancedSearch->SearchCondition = @$filter["v_ImplimentationRate"];
		$this->ImplimentationRate->AdvancedSearch->SearchValue2 = @$filter["y_ImplimentationRate"];
		$this->ImplimentationRate->AdvancedSearch->SearchOperator2 = @$filter["w_ImplimentationRate"];
		$this->ImplimentationRate->AdvancedSearch->save();

		// Field EmbryoNo
		$this->EmbryoNo->AdvancedSearch->SearchValue = @$filter["x_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchOperator = @$filter["z_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchCondition = @$filter["v_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchValue2 = @$filter["y_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryoNo"];
		$this->EmbryoNo->AdvancedSearch->save();

		// Field ExtrauterineSac
		$this->ExtrauterineSac->AdvancedSearch->SearchValue = @$filter["x_ExtrauterineSac"];
		$this->ExtrauterineSac->AdvancedSearch->SearchOperator = @$filter["z_ExtrauterineSac"];
		$this->ExtrauterineSac->AdvancedSearch->SearchCondition = @$filter["v_ExtrauterineSac"];
		$this->ExtrauterineSac->AdvancedSearch->SearchValue2 = @$filter["y_ExtrauterineSac"];
		$this->ExtrauterineSac->AdvancedSearch->SearchOperator2 = @$filter["w_ExtrauterineSac"];
		$this->ExtrauterineSac->AdvancedSearch->save();

		// Field PregnancyMonozygotic
		$this->PregnancyMonozygotic->AdvancedSearch->SearchValue = @$filter["x_PregnancyMonozygotic"];
		$this->PregnancyMonozygotic->AdvancedSearch->SearchOperator = @$filter["z_PregnancyMonozygotic"];
		$this->PregnancyMonozygotic->AdvancedSearch->SearchCondition = @$filter["v_PregnancyMonozygotic"];
		$this->PregnancyMonozygotic->AdvancedSearch->SearchValue2 = @$filter["y_PregnancyMonozygotic"];
		$this->PregnancyMonozygotic->AdvancedSearch->SearchOperator2 = @$filter["w_PregnancyMonozygotic"];
		$this->PregnancyMonozygotic->AdvancedSearch->save();

		// Field TypeGestation
		$this->TypeGestation->AdvancedSearch->SearchValue = @$filter["x_TypeGestation"];
		$this->TypeGestation->AdvancedSearch->SearchOperator = @$filter["z_TypeGestation"];
		$this->TypeGestation->AdvancedSearch->SearchCondition = @$filter["v_TypeGestation"];
		$this->TypeGestation->AdvancedSearch->SearchValue2 = @$filter["y_TypeGestation"];
		$this->TypeGestation->AdvancedSearch->SearchOperator2 = @$filter["w_TypeGestation"];
		$this->TypeGestation->AdvancedSearch->save();

		// Field Urine
		$this->Urine->AdvancedSearch->SearchValue = @$filter["x_Urine"];
		$this->Urine->AdvancedSearch->SearchOperator = @$filter["z_Urine"];
		$this->Urine->AdvancedSearch->SearchCondition = @$filter["v_Urine"];
		$this->Urine->AdvancedSearch->SearchValue2 = @$filter["y_Urine"];
		$this->Urine->AdvancedSearch->SearchOperator2 = @$filter["w_Urine"];
		$this->Urine->AdvancedSearch->save();

		// Field PTdate
		$this->PTdate->AdvancedSearch->SearchValue = @$filter["x_PTdate"];
		$this->PTdate->AdvancedSearch->SearchOperator = @$filter["z_PTdate"];
		$this->PTdate->AdvancedSearch->SearchCondition = @$filter["v_PTdate"];
		$this->PTdate->AdvancedSearch->SearchValue2 = @$filter["y_PTdate"];
		$this->PTdate->AdvancedSearch->SearchOperator2 = @$filter["w_PTdate"];
		$this->PTdate->AdvancedSearch->save();

		// Field Reduced
		$this->Reduced->AdvancedSearch->SearchValue = @$filter["x_Reduced"];
		$this->Reduced->AdvancedSearch->SearchOperator = @$filter["z_Reduced"];
		$this->Reduced->AdvancedSearch->SearchCondition = @$filter["v_Reduced"];
		$this->Reduced->AdvancedSearch->SearchValue2 = @$filter["y_Reduced"];
		$this->Reduced->AdvancedSearch->SearchOperator2 = @$filter["w_Reduced"];
		$this->Reduced->AdvancedSearch->save();

		// Field INduced
		$this->INduced->AdvancedSearch->SearchValue = @$filter["x_INduced"];
		$this->INduced->AdvancedSearch->SearchOperator = @$filter["z_INduced"];
		$this->INduced->AdvancedSearch->SearchCondition = @$filter["v_INduced"];
		$this->INduced->AdvancedSearch->SearchValue2 = @$filter["y_INduced"];
		$this->INduced->AdvancedSearch->SearchOperator2 = @$filter["w_INduced"];
		$this->INduced->AdvancedSearch->save();

		// Field INducedDate
		$this->INducedDate->AdvancedSearch->SearchValue = @$filter["x_INducedDate"];
		$this->INducedDate->AdvancedSearch->SearchOperator = @$filter["z_INducedDate"];
		$this->INducedDate->AdvancedSearch->SearchCondition = @$filter["v_INducedDate"];
		$this->INducedDate->AdvancedSearch->SearchValue2 = @$filter["y_INducedDate"];
		$this->INducedDate->AdvancedSearch->SearchOperator2 = @$filter["w_INducedDate"];
		$this->INducedDate->AdvancedSearch->save();

		// Field Miscarriage
		$this->Miscarriage->AdvancedSearch->SearchValue = @$filter["x_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchOperator = @$filter["z_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchCondition = @$filter["v_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchValue2 = @$filter["y_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchOperator2 = @$filter["w_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->save();

		// Field Induced1
		$this->Induced1->AdvancedSearch->SearchValue = @$filter["x_Induced1"];
		$this->Induced1->AdvancedSearch->SearchOperator = @$filter["z_Induced1"];
		$this->Induced1->AdvancedSearch->SearchCondition = @$filter["v_Induced1"];
		$this->Induced1->AdvancedSearch->SearchValue2 = @$filter["y_Induced1"];
		$this->Induced1->AdvancedSearch->SearchOperator2 = @$filter["w_Induced1"];
		$this->Induced1->AdvancedSearch->save();

		// Field Type
		$this->Type->AdvancedSearch->SearchValue = @$filter["x_Type"];
		$this->Type->AdvancedSearch->SearchOperator = @$filter["z_Type"];
		$this->Type->AdvancedSearch->SearchCondition = @$filter["v_Type"];
		$this->Type->AdvancedSearch->SearchValue2 = @$filter["y_Type"];
		$this->Type->AdvancedSearch->SearchOperator2 = @$filter["w_Type"];
		$this->Type->AdvancedSearch->save();

		// Field IfClinical
		$this->IfClinical->AdvancedSearch->SearchValue = @$filter["x_IfClinical"];
		$this->IfClinical->AdvancedSearch->SearchOperator = @$filter["z_IfClinical"];
		$this->IfClinical->AdvancedSearch->SearchCondition = @$filter["v_IfClinical"];
		$this->IfClinical->AdvancedSearch->SearchValue2 = @$filter["y_IfClinical"];
		$this->IfClinical->AdvancedSearch->SearchOperator2 = @$filter["w_IfClinical"];
		$this->IfClinical->AdvancedSearch->save();

		// Field GADate
		$this->GADate->AdvancedSearch->SearchValue = @$filter["x_GADate"];
		$this->GADate->AdvancedSearch->SearchOperator = @$filter["z_GADate"];
		$this->GADate->AdvancedSearch->SearchCondition = @$filter["v_GADate"];
		$this->GADate->AdvancedSearch->SearchValue2 = @$filter["y_GADate"];
		$this->GADate->AdvancedSearch->SearchOperator2 = @$filter["w_GADate"];
		$this->GADate->AdvancedSearch->save();

		// Field GA
		$this->GA->AdvancedSearch->SearchValue = @$filter["x_GA"];
		$this->GA->AdvancedSearch->SearchOperator = @$filter["z_GA"];
		$this->GA->AdvancedSearch->SearchCondition = @$filter["v_GA"];
		$this->GA->AdvancedSearch->SearchValue2 = @$filter["y_GA"];
		$this->GA->AdvancedSearch->SearchOperator2 = @$filter["w_GA"];
		$this->GA->AdvancedSearch->save();

		// Field FoetalDeath
		$this->FoetalDeath->AdvancedSearch->SearchValue = @$filter["x_FoetalDeath"];
		$this->FoetalDeath->AdvancedSearch->SearchOperator = @$filter["z_FoetalDeath"];
		$this->FoetalDeath->AdvancedSearch->SearchCondition = @$filter["v_FoetalDeath"];
		$this->FoetalDeath->AdvancedSearch->SearchValue2 = @$filter["y_FoetalDeath"];
		$this->FoetalDeath->AdvancedSearch->SearchOperator2 = @$filter["w_FoetalDeath"];
		$this->FoetalDeath->AdvancedSearch->save();

		// Field FerinatalDeath
		$this->FerinatalDeath->AdvancedSearch->SearchValue = @$filter["x_FerinatalDeath"];
		$this->FerinatalDeath->AdvancedSearch->SearchOperator = @$filter["z_FerinatalDeath"];
		$this->FerinatalDeath->AdvancedSearch->SearchCondition = @$filter["v_FerinatalDeath"];
		$this->FerinatalDeath->AdvancedSearch->SearchValue2 = @$filter["y_FerinatalDeath"];
		$this->FerinatalDeath->AdvancedSearch->SearchOperator2 = @$filter["w_FerinatalDeath"];
		$this->FerinatalDeath->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field Ectopic
		$this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
		$this->Ectopic->AdvancedSearch->save();

		// Field Extra
		$this->Extra->AdvancedSearch->SearchValue = @$filter["x_Extra"];
		$this->Extra->AdvancedSearch->SearchOperator = @$filter["z_Extra"];
		$this->Extra->AdvancedSearch->SearchCondition = @$filter["v_Extra"];
		$this->Extra->AdvancedSearch->SearchValue2 = @$filter["y_Extra"];
		$this->Extra->AdvancedSearch->SearchOperator2 = @$filter["w_Extra"];
		$this->Extra->AdvancedSearch->save();

		// Field Implantation
		$this->Implantation->AdvancedSearch->SearchValue = @$filter["x_Implantation"];
		$this->Implantation->AdvancedSearch->SearchOperator = @$filter["z_Implantation"];
		$this->Implantation->AdvancedSearch->SearchCondition = @$filter["v_Implantation"];
		$this->Implantation->AdvancedSearch->SearchValue2 = @$filter["y_Implantation"];
		$this->Implantation->AdvancedSearch->SearchOperator2 = @$filter["w_Implantation"];
		$this->Implantation->AdvancedSearch->save();

		// Field DeliveryDate
		$this->DeliveryDate->AdvancedSearch->SearchValue = @$filter["x_DeliveryDate"];
		$this->DeliveryDate->AdvancedSearch->SearchOperator = @$filter["z_DeliveryDate"];
		$this->DeliveryDate->AdvancedSearch->SearchCondition = @$filter["v_DeliveryDate"];
		$this->DeliveryDate->AdvancedSearch->SearchValue2 = @$filter["y_DeliveryDate"];
		$this->DeliveryDate->AdvancedSearch->SearchOperator2 = @$filter["w_DeliveryDate"];
		$this->DeliveryDate->AdvancedSearch->save();

		// Field BabyDetails
		$this->BabyDetails->AdvancedSearch->SearchValue = @$filter["x_BabyDetails"];
		$this->BabyDetails->AdvancedSearch->SearchOperator = @$filter["z_BabyDetails"];
		$this->BabyDetails->AdvancedSearch->SearchCondition = @$filter["v_BabyDetails"];
		$this->BabyDetails->AdvancedSearch->SearchValue2 = @$filter["y_BabyDetails"];
		$this->BabyDetails->AdvancedSearch->SearchOperator2 = @$filter["w_BabyDetails"];
		$this->BabyDetails->AdvancedSearch->save();

		// Field LSCSNormal
		$this->LSCSNormal->AdvancedSearch->SearchValue = @$filter["x_LSCSNormal"];
		$this->LSCSNormal->AdvancedSearch->SearchOperator = @$filter["z_LSCSNormal"];
		$this->LSCSNormal->AdvancedSearch->SearchCondition = @$filter["v_LSCSNormal"];
		$this->LSCSNormal->AdvancedSearch->SearchValue2 = @$filter["y_LSCSNormal"];
		$this->LSCSNormal->AdvancedSearch->SearchOperator2 = @$filter["w_LSCSNormal"];
		$this->LSCSNormal->AdvancedSearch->save();

		// Field Notes
		$this->Notes->AdvancedSearch->SearchValue = @$filter["x_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator = @$filter["z_Notes"];
		$this->Notes->AdvancedSearch->SearchCondition = @$filter["v_Notes"];
		$this->Notes->AdvancedSearch->SearchValue2 = @$filter["y_Notes"];
		$this->Notes->AdvancedSearch->SearchOperator2 = @$filter["w_Notes"];
		$this->Notes->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
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
		$this->buildBasicSearchSql($where, $this->OPResult, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gestation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TransferdEmbryos, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->InitalOfSacs, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ImplimentationRate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EmbryoNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ExtrauterineSac, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PregnancyMonozygotic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeGestation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Urine, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PTdate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Reduced, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INduced, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INducedDate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Miscarriage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Induced1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IfClinical, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GADate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FoetalDeath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FerinatalDeath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Extra, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Implantation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BabyDetails, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LSCSNormal, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Notes, $arKeywords, $type);
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
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->treatment_status); // treatment_status
			$this->updateSort($this->ARTCYCLE); // ARTCYCLE
			$this->updateSort($this->RESULT); // RESULT
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->outcomeDate); // outcomeDate
			$this->updateSort($this->outcomeDay); // outcomeDay
			$this->updateSort($this->OPResult); // OPResult
			$this->updateSort($this->Gestation); // Gestation
			$this->updateSort($this->TransferdEmbryos); // TransferdEmbryos
			$this->updateSort($this->InitalOfSacs); // InitalOfSacs
			$this->updateSort($this->ImplimentationRate); // ImplimentationRate
			$this->updateSort($this->EmbryoNo); // EmbryoNo
			$this->updateSort($this->ExtrauterineSac); // ExtrauterineSac
			$this->updateSort($this->PregnancyMonozygotic); // PregnancyMonozygotic
			$this->updateSort($this->TypeGestation); // TypeGestation
			$this->updateSort($this->Urine); // Urine
			$this->updateSort($this->PTdate); // PTdate
			$this->updateSort($this->Reduced); // Reduced
			$this->updateSort($this->INduced); // INduced
			$this->updateSort($this->INducedDate); // INducedDate
			$this->updateSort($this->Miscarriage); // Miscarriage
			$this->updateSort($this->Induced1); // Induced1
			$this->updateSort($this->Type); // Type
			$this->updateSort($this->IfClinical); // IfClinical
			$this->updateSort($this->GADate); // GADate
			$this->updateSort($this->GA); // GA
			$this->updateSort($this->FoetalDeath); // FoetalDeath
			$this->updateSort($this->FerinatalDeath); // FerinatalDeath
			$this->updateSort($this->TidNo); // TidNo
			$this->updateSort($this->Ectopic); // Ectopic
			$this->updateSort($this->Extra); // Extra
			$this->updateSort($this->Implantation); // Implantation
			$this->updateSort($this->DeliveryDate); // DeliveryDate
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
				$this->RIDNO->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->TidNo->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
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
				$this->outcomeDate->setSort("");
				$this->outcomeDay->setSort("");
				$this->OPResult->setSort("");
				$this->Gestation->setSort("");
				$this->TransferdEmbryos->setSort("");
				$this->InitalOfSacs->setSort("");
				$this->ImplimentationRate->setSort("");
				$this->EmbryoNo->setSort("");
				$this->ExtrauterineSac->setSort("");
				$this->PregnancyMonozygotic->setSort("");
				$this->TypeGestation->setSort("");
				$this->Urine->setSort("");
				$this->PTdate->setSort("");
				$this->Reduced->setSort("");
				$this->INduced->setSort("");
				$this->INducedDate->setSort("");
				$this->Miscarriage->setSort("");
				$this->Induced1->setSort("");
				$this->Type->setSort("");
				$this->IfClinical->setSort("");
				$this->GADate->setSort("");
				$this->GA->setSort("");
				$this->FoetalDeath->setSort("");
				$this->FerinatalDeath->setSort("");
				$this->TidNo->setSort("");
				$this->Ectopic->setSort("");
				$this->Extra->setSort("");
				$this->Implantation->setSort("");
				$this->DeliveryDate->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_outcomelistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_outcomelistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fivf_outcomelist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_outcomelistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->outcomeDate->setDbValue($row['outcomeDate']);
		$this->outcomeDay->setDbValue($row['outcomeDay']);
		$this->OPResult->setDbValue($row['OPResult']);
		$this->Gestation->setDbValue($row['Gestation']);
		$this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
		$this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
		$this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
		$this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
		$this->TypeGestation->setDbValue($row['TypeGestation']);
		$this->Urine->setDbValue($row['Urine']);
		$this->PTdate->setDbValue($row['PTdate']);
		$this->Reduced->setDbValue($row['Reduced']);
		$this->INduced->setDbValue($row['INduced']);
		$this->INducedDate->setDbValue($row['INducedDate']);
		$this->Miscarriage->setDbValue($row['Miscarriage']);
		$this->Induced1->setDbValue($row['Induced1']);
		$this->Type->setDbValue($row['Type']);
		$this->IfClinical->setDbValue($row['IfClinical']);
		$this->GADate->setDbValue($row['GADate']);
		$this->GA->setDbValue($row['GA']);
		$this->FoetalDeath->setDbValue($row['FoetalDeath']);
		$this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Extra->setDbValue($row['Extra']);
		$this->Implantation->setDbValue($row['Implantation']);
		$this->DeliveryDate->setDbValue($row['DeliveryDate']);
		$this->BabyDetails->setDbValue($row['BabyDetails']);
		$this->LSCSNormal->setDbValue($row['LSCSNormal']);
		$this->Notes->setDbValue($row['Notes']);
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
		$row['outcomeDate'] = NULL;
		$row['outcomeDay'] = NULL;
		$row['OPResult'] = NULL;
		$row['Gestation'] = NULL;
		$row['TransferdEmbryos'] = NULL;
		$row['InitalOfSacs'] = NULL;
		$row['ImplimentationRate'] = NULL;
		$row['EmbryoNo'] = NULL;
		$row['ExtrauterineSac'] = NULL;
		$row['PregnancyMonozygotic'] = NULL;
		$row['TypeGestation'] = NULL;
		$row['Urine'] = NULL;
		$row['PTdate'] = NULL;
		$row['Reduced'] = NULL;
		$row['INduced'] = NULL;
		$row['INducedDate'] = NULL;
		$row['Miscarriage'] = NULL;
		$row['Induced1'] = NULL;
		$row['Type'] = NULL;
		$row['IfClinical'] = NULL;
		$row['GADate'] = NULL;
		$row['GA'] = NULL;
		$row['FoetalDeath'] = NULL;
		$row['FerinatalDeath'] = NULL;
		$row['TidNo'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Extra'] = NULL;
		$row['Implantation'] = NULL;
		$row['DeliveryDate'] = NULL;
		$row['BabyDetails'] = NULL;
		$row['LSCSNormal'] = NULL;
		$row['Notes'] = NULL;
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
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// outcomeDate
		// outcomeDay
		// OPResult
		// Gestation
		// TransferdEmbryos
		// InitalOfSacs
		// ImplimentationRate
		// EmbryoNo
		// ExtrauterineSac
		// PregnancyMonozygotic
		// TypeGestation
		// Urine
		// PTdate
		// Reduced
		// INduced
		// INducedDate
		// Miscarriage
		// Induced1
		// Type
		// IfClinical
		// GADate
		// GA
		// FoetalDeath
		// FerinatalDeath
		// TidNo
		// Ectopic
		// Extra
		// Implantation
		// DeliveryDate
		// BabyDetails
		// LSCSNormal
		// Notes

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

			// outcomeDate
			$this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
			$this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
			$this->outcomeDate->ViewCustomAttributes = "";

			// outcomeDay
			$this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
			$this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
			$this->outcomeDay->ViewCustomAttributes = "";

			// OPResult
			$this->OPResult->ViewValue = $this->OPResult->CurrentValue;
			$this->OPResult->ViewCustomAttributes = "";

			// Gestation
			if (strval($this->Gestation->CurrentValue) <> "") {
				$this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
			} else {
				$this->Gestation->ViewValue = NULL;
			}
			$this->Gestation->ViewCustomAttributes = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
			$this->TransferdEmbryos->ViewCustomAttributes = "";

			// InitalOfSacs
			$this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
			$this->InitalOfSacs->ViewCustomAttributes = "";

			// ImplimentationRate
			$this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
			$this->ImplimentationRate->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
			$this->ExtrauterineSac->ViewCustomAttributes = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
			$this->PregnancyMonozygotic->ViewCustomAttributes = "";

			// TypeGestation
			$this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
			$this->TypeGestation->ViewCustomAttributes = "";

			// Urine
			if (strval($this->Urine->CurrentValue) <> "") {
				$this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
			} else {
				$this->Urine->ViewValue = NULL;
			}
			$this->Urine->ViewCustomAttributes = "";

			// PTdate
			$this->PTdate->ViewValue = $this->PTdate->CurrentValue;
			$this->PTdate->ViewCustomAttributes = "";

			// Reduced
			$this->Reduced->ViewValue = $this->Reduced->CurrentValue;
			$this->Reduced->ViewCustomAttributes = "";

			// INduced
			$this->INduced->ViewValue = $this->INduced->CurrentValue;
			$this->INduced->ViewCustomAttributes = "";

			// INducedDate
			$this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
			$this->INducedDate->ViewCustomAttributes = "";

			// Miscarriage
			if (strval($this->Miscarriage->CurrentValue) <> "") {
				$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
			} else {
				$this->Miscarriage->ViewValue = NULL;
			}
			$this->Miscarriage->ViewCustomAttributes = "";

			// Induced1
			if (strval($this->Induced1->CurrentValue) <> "") {
				$this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
			} else {
				$this->Induced1->ViewValue = NULL;
			}
			$this->Induced1->ViewCustomAttributes = "";

			// Type
			if (strval($this->Type->CurrentValue) <> "") {
				$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
			} else {
				$this->Type->ViewValue = NULL;
			}
			$this->Type->ViewCustomAttributes = "";

			// IfClinical
			$this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
			$this->IfClinical->ViewCustomAttributes = "";

			// GADate
			$this->GADate->ViewValue = $this->GADate->CurrentValue;
			$this->GADate->ViewCustomAttributes = "";

			// GA
			$this->GA->ViewValue = $this->GA->CurrentValue;
			$this->GA->ViewCustomAttributes = "";

			// FoetalDeath
			if (strval($this->FoetalDeath->CurrentValue) <> "") {
				$this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
			} else {
				$this->FoetalDeath->ViewValue = NULL;
			}
			$this->FoetalDeath->ViewCustomAttributes = "";

			// FerinatalDeath
			if (strval($this->FerinatalDeath->CurrentValue) <> "") {
				$this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
			} else {
				$this->FerinatalDeath->ViewValue = NULL;
			}
			$this->FerinatalDeath->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Ectopic
			if (strval($this->Ectopic->CurrentValue) <> "") {
				$this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
			} else {
				$this->Ectopic->ViewValue = NULL;
			}
			$this->Ectopic->ViewCustomAttributes = "";

			// Extra
			if (strval($this->Extra->CurrentValue) <> "") {
				$this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
			} else {
				$this->Extra->ViewValue = NULL;
			}
			$this->Extra->ViewCustomAttributes = "";

			// Implantation
			$this->Implantation->ViewValue = $this->Implantation->CurrentValue;
			$this->Implantation->ViewCustomAttributes = "";

			// DeliveryDate
			$this->DeliveryDate->ViewValue = $this->DeliveryDate->CurrentValue;
			$this->DeliveryDate->ViewValue = FormatDateTime($this->DeliveryDate->ViewValue, 7);
			$this->DeliveryDate->ViewCustomAttributes = "";

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

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

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

			// outcomeDate
			$this->outcomeDate->LinkCustomAttributes = "";
			$this->outcomeDate->HrefValue = "";
			$this->outcomeDate->TooltipValue = "";

			// outcomeDay
			$this->outcomeDay->LinkCustomAttributes = "";
			$this->outcomeDay->HrefValue = "";
			$this->outcomeDay->TooltipValue = "";

			// OPResult
			$this->OPResult->LinkCustomAttributes = "";
			$this->OPResult->HrefValue = "";
			$this->OPResult->TooltipValue = "";

			// Gestation
			$this->Gestation->LinkCustomAttributes = "";
			$this->Gestation->HrefValue = "";
			$this->Gestation->TooltipValue = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->LinkCustomAttributes = "";
			$this->TransferdEmbryos->HrefValue = "";
			$this->TransferdEmbryos->TooltipValue = "";

			// InitalOfSacs
			$this->InitalOfSacs->LinkCustomAttributes = "";
			$this->InitalOfSacs->HrefValue = "";
			$this->InitalOfSacs->TooltipValue = "";

			// ImplimentationRate
			$this->ImplimentationRate->LinkCustomAttributes = "";
			$this->ImplimentationRate->HrefValue = "";
			$this->ImplimentationRate->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->LinkCustomAttributes = "";
			$this->ExtrauterineSac->HrefValue = "";
			$this->ExtrauterineSac->TooltipValue = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->LinkCustomAttributes = "";
			$this->PregnancyMonozygotic->HrefValue = "";
			$this->PregnancyMonozygotic->TooltipValue = "";

			// TypeGestation
			$this->TypeGestation->LinkCustomAttributes = "";
			$this->TypeGestation->HrefValue = "";
			$this->TypeGestation->TooltipValue = "";

			// Urine
			$this->Urine->LinkCustomAttributes = "";
			$this->Urine->HrefValue = "";
			$this->Urine->TooltipValue = "";

			// PTdate
			$this->PTdate->LinkCustomAttributes = "";
			$this->PTdate->HrefValue = "";
			$this->PTdate->TooltipValue = "";

			// Reduced
			$this->Reduced->LinkCustomAttributes = "";
			$this->Reduced->HrefValue = "";
			$this->Reduced->TooltipValue = "";

			// INduced
			$this->INduced->LinkCustomAttributes = "";
			$this->INduced->HrefValue = "";
			$this->INduced->TooltipValue = "";

			// INducedDate
			$this->INducedDate->LinkCustomAttributes = "";
			$this->INducedDate->HrefValue = "";
			$this->INducedDate->TooltipValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";
			$this->Miscarriage->TooltipValue = "";

			// Induced1
			$this->Induced1->LinkCustomAttributes = "";
			$this->Induced1->HrefValue = "";
			$this->Induced1->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// IfClinical
			$this->IfClinical->LinkCustomAttributes = "";
			$this->IfClinical->HrefValue = "";
			$this->IfClinical->TooltipValue = "";

			// GADate
			$this->GADate->LinkCustomAttributes = "";
			$this->GADate->HrefValue = "";
			$this->GADate->TooltipValue = "";

			// GA
			$this->GA->LinkCustomAttributes = "";
			$this->GA->HrefValue = "";
			$this->GA->TooltipValue = "";

			// FoetalDeath
			$this->FoetalDeath->LinkCustomAttributes = "";
			$this->FoetalDeath->HrefValue = "";
			$this->FoetalDeath->TooltipValue = "";

			// FerinatalDeath
			$this->FerinatalDeath->LinkCustomAttributes = "";
			$this->FerinatalDeath->HrefValue = "";
			$this->FerinatalDeath->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";
			$this->Ectopic->TooltipValue = "";

			// Extra
			$this->Extra->LinkCustomAttributes = "";
			$this->Extra->HrefValue = "";
			$this->Extra->TooltipValue = "";

			// Implantation
			$this->Implantation->LinkCustomAttributes = "";
			$this->Implantation->HrefValue = "";
			$this->Implantation->TooltipValue = "";

			// DeliveryDate
			$this->DeliveryDate->LinkCustomAttributes = "";
			$this->DeliveryDate->HrefValue = "";
			$this->DeliveryDate->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_outcomelist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_outcomelist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_outcomelist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_ivf_outcome\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_outcome',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_outcomelist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
			global $ivf_treatment_plan;
			if (!isset($ivf_treatment_plan))
				$ivf_treatment_plan = new ivf_treatment_plan();
			$rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$ivf_treatment_plan;
					$ivf_treatment_plan->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Get("fk_RIDNO") !== NULL) {
					$this->RIDNO->setQueryStringValue(Get("fk_RIDNO"));
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($this->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Name"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_id") !== NULL) {
					$this->TidNo->setQueryStringValue(Get("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($this->TidNo->QueryStringValue))
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Post("fk_RIDNO") !== NULL) {
					$this->RIDNO->setFormValue(Post("fk_RIDNO"));
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($this->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->Name->setFormValue(Post("fk_Name"));
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_id") !== NULL) {
					$this->TidNo->setFormValue(Post("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($this->TidNo->FormValue))
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
			if ($masterTblVar <> "ivf_treatment_plan") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
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
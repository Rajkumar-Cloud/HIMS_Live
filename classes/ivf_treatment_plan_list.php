<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_treatment_plan_list extends ivf_treatment_plan
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_treatment_plan';

	// Page object name
	public $PageObjName = "ivf_treatment_plan_list";

	// Grid form hidden field names
	public $FormName = "fivf_treatment_planlist";
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

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS["ivf_treatment_plan"]) || get_class($GLOBALS["ivf_treatment_plan"]) == PROJECT_NAMESPACE . "ivf_treatment_plan") {
			$GLOBALS["ivf_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_treatment_plan"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "ivf_treatment_planadd.php?" . TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_treatment_plandelete.php";
		$this->MultiUpdateUrl = "ivf_treatment_planupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf)
		if (!isset($GLOBALS['ivf']))
			$GLOBALS['ivf'] = new ivf();

		// Table object (view_donor_ivf)
		if (!isset($GLOBALS['view_donor_ivf']))
			$GLOBALS['view_donor_ivf'] = new view_donor_ivf();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_treatment_plan');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_treatment_planlistsrch";

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
		global $EXPORT, $ivf_treatment_plan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_treatment_plan);
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
		$this->id->Visible = FALSE;
		$this->RIDNO->Visible = FALSE;
		$this->Name->Visible = FALSE;
		$this->TreatmentStartDate->setVisibility();
		$this->Age->Visible = FALSE;
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->IVFCycleNO->setVisibility();
		$this->RESULT->Visible = FALSE;
		$this->status->Visible = FALSE;
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->TreatementStopDate->Visible = FALSE;
		$this->TypePatient->Visible = FALSE;
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
		$this->MaleIndications->setVisibility();
		$this->FemaleIndications->setVisibility();
		$this->UseOfThe->Visible = FALSE;
		$this->Ectopic->Visible = FALSE;
		$this->Heterotopic->Visible = FALSE;
		$this->TransferDFE->Visible = FALSE;
		$this->Evolutive->Visible = FALSE;
		$this->Number->Visible = FALSE;
		$this->SequentialCult->Visible = FALSE;
		$this->TineLapse->Visible = FALSE;
		$this->PatientName->Visible = FALSE;
		$this->PatientID->Visible = FALSE;
		$this->PartnerName->Visible = FALSE;
		$this->PartnerID->Visible = FALSE;
		$this->WifeCell->Visible = FALSE;
		$this->HusbandCell->Visible = FALSE;
		$this->CoupleID->Visible = FALSE;
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
		$this->setupLookupOptions($this->status);

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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf") {
			global $ivf;
			$rsmaster = $ivf->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ivflist.php"); // Return to master page
			} else {
				$ivf->loadListRowValues($rsmaster);
				$ivf->RowType = ROWTYPE_MASTER; // Master row
				$ivf->renderListRow();
				$rsmaster->close();
			}
		}

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "view_donor_ivf") {
			global $view_donor_ivf;
			$rsmaster = $view_donor_ivf->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("view_donor_ivflist.php"); // Return to master page
			} else {
				$view_donor_ivf->loadListRowValues($rsmaster);
				$view_donor_ivf->RowType = ROWTYPE_MASTER; // Master row
				$view_donor_ivf->renderListRow();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_treatment_planlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->TreatmentStartDate->AdvancedSearch->toJson(), ","); // Field TreatmentStartDate
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
		$filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
		$filterList = Concat($filterList, $this->IVFCycleNO->AdvancedSearch->toJson(), ","); // Field IVFCycleNO
		$filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
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
		$filterList = Concat($filterList, $this->MaleIndications->AdvancedSearch->toJson(), ","); // Field MaleIndications
		$filterList = Concat($filterList, $this->FemaleIndications->AdvancedSearch->toJson(), ","); // Field FemaleIndications
		$filterList = Concat($filterList, $this->UseOfThe->AdvancedSearch->toJson(), ","); // Field UseOfThe
		$filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
		$filterList = Concat($filterList, $this->Heterotopic->AdvancedSearch->toJson(), ","); // Field Heterotopic
		$filterList = Concat($filterList, $this->TransferDFE->AdvancedSearch->toJson(), ","); // Field TransferDFE
		$filterList = Concat($filterList, $this->Evolutive->AdvancedSearch->toJson(), ","); // Field Evolutive
		$filterList = Concat($filterList, $this->Number->AdvancedSearch->toJson(), ","); // Field Number
		$filterList = Concat($filterList, $this->SequentialCult->AdvancedSearch->toJson(), ","); // Field SequentialCult
		$filterList = Concat($filterList, $this->TineLapse->AdvancedSearch->toJson(), ","); // Field TineLapse
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
		$filterList = Concat($filterList, $this->WifeCell->AdvancedSearch->toJson(), ","); // Field WifeCell
		$filterList = Concat($filterList, $this->HusbandCell->AdvancedSearch->toJson(), ","); // Field HusbandCell
		$filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_treatment_planlistsrch", $filters);
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

		// Field TreatmentStartDate
		$this->TreatmentStartDate->AdvancedSearch->SearchValue = @$filter["x_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator = @$filter["z_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchCondition = @$filter["v_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->save();

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

		// Field IVFCycleNO
		$this->IVFCycleNO->AdvancedSearch->SearchValue = @$filter["x_IVFCycleNO"];
		$this->IVFCycleNO->AdvancedSearch->SearchOperator = @$filter["z_IVFCycleNO"];
		$this->IVFCycleNO->AdvancedSearch->SearchCondition = @$filter["v_IVFCycleNO"];
		$this->IVFCycleNO->AdvancedSearch->SearchValue2 = @$filter["y_IVFCycleNO"];
		$this->IVFCycleNO->AdvancedSearch->SearchOperator2 = @$filter["w_IVFCycleNO"];
		$this->IVFCycleNO->AdvancedSearch->save();

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

		// Field UseOfThe
		$this->UseOfThe->AdvancedSearch->SearchValue = @$filter["x_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchOperator = @$filter["z_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchCondition = @$filter["v_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchValue2 = @$filter["y_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchOperator2 = @$filter["w_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->save();

		// Field Ectopic
		$this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
		$this->Ectopic->AdvancedSearch->save();

		// Field Heterotopic
		$this->Heterotopic->AdvancedSearch->SearchValue = @$filter["x_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchOperator = @$filter["z_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchCondition = @$filter["v_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchValue2 = @$filter["y_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchOperator2 = @$filter["w_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->save();

		// Field TransferDFE
		$this->TransferDFE->AdvancedSearch->SearchValue = @$filter["x_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchOperator = @$filter["z_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchCondition = @$filter["v_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchValue2 = @$filter["y_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchOperator2 = @$filter["w_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->save();

		// Field Evolutive
		$this->Evolutive->AdvancedSearch->SearchValue = @$filter["x_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchOperator = @$filter["z_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchCondition = @$filter["v_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchValue2 = @$filter["y_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchOperator2 = @$filter["w_Evolutive"];
		$this->Evolutive->AdvancedSearch->save();

		// Field Number
		$this->Number->AdvancedSearch->SearchValue = @$filter["x_Number"];
		$this->Number->AdvancedSearch->SearchOperator = @$filter["z_Number"];
		$this->Number->AdvancedSearch->SearchCondition = @$filter["v_Number"];
		$this->Number->AdvancedSearch->SearchValue2 = @$filter["y_Number"];
		$this->Number->AdvancedSearch->SearchOperator2 = @$filter["w_Number"];
		$this->Number->AdvancedSearch->save();

		// Field SequentialCult
		$this->SequentialCult->AdvancedSearch->SearchValue = @$filter["x_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchOperator = @$filter["z_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchCondition = @$filter["v_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->save();

		// Field TineLapse
		$this->TineLapse->AdvancedSearch->SearchValue = @$filter["x_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchOperator = @$filter["z_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchCondition = @$filter["v_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchValue2 = @$filter["y_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TineLapse"];
		$this->TineLapse->AdvancedSearch->save();

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

		// Field WifeCell
		$this->WifeCell->AdvancedSearch->SearchValue = @$filter["x_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator = @$filter["z_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchCondition = @$filter["v_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchValue2 = @$filter["y_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator2 = @$filter["w_WifeCell"];
		$this->WifeCell->AdvancedSearch->save();

		// Field HusbandCell
		$this->HusbandCell->AdvancedSearch->SearchValue = @$filter["x_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator = @$filter["z_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchCondition = @$filter["v_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchValue2 = @$filter["y_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->save();

		// Field CoupleID
		$this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
		$this->CoupleID->AdvancedSearch->save();
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
		$this->buildBasicSearchSql($where, $this->IVFCycleNO, $arKeywords, $type);
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
		$this->buildBasicSearchSql($where, $this->MaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FemaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UseOfThe, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Heterotopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TransferDFE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Evolutive, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Number, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SequentialCult, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TineLapse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeCell, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandCell, $arKeywords, $type);
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
			$this->updateSort($this->TreatmentStartDate); // TreatmentStartDate
			$this->updateSort($this->treatment_status); // treatment_status
			$this->updateSort($this->ARTCYCLE); // ARTCYCLE
			$this->updateSort($this->IVFCycleNO); // IVFCycleNO
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
			$this->updateSort($this->MaleIndications); // MaleIndications
			$this->updateSort($this->FemaleIndications); // FemaleIndications
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
				$this->RIDNO->setSessionValue("");
				$this->Name->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->TreatmentStartDate->setSort("");
				$this->treatment_status->setSort("");
				$this->ARTCYCLE->setSort("");
				$this->IVFCycleNO->setSort("");
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
				$this->MaleIndications->setSort("");
				$this->FemaleIndications->setSort("");
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

		// "detail_ivf_outcome"
		$item = &$this->ListOptions->add("detail_ivf_outcome");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_outcome') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_outcome_grid"]))
			$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid();

		// "detail_ivf_stimulation_chart"
		$item = &$this->ListOptions->add("detail_ivf_stimulation_chart");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_stimulation_chart') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
			$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid();

		// "detail_ivf_semenanalysisreport"
		$item = &$this->ListOptions->add("detail_ivf_semenanalysisreport");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
			$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();

		// "detail_ivf_embryology_chart"
		$item = &$this->ListOptions->add("detail_ivf_embryology_chart");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_embryology_chart') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
			$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();

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
		$pages->add("ivf_outcome");
		$pages->add("ivf_stimulation_chart");
		$pages->add("ivf_semenanalysisreport");
		$pages->add("ivf_embryology_chart");
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
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_ivf_outcome"
		$opt = &$this->ListOptions->Items["detail_ivf_outcome"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_outcome')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_outcome", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_outcomelist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_outcome_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_outcome";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "ivf_outcome";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "ivf_outcome";
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

		// "detail_ivf_stimulation_chart"
		$opt = &$this->ListOptions->Items["detail_ivf_stimulation_chart"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_chart')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_stimulation_chart", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_stimulation_chartlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_stimulation_chart";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "ivf_stimulation_chart";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "ivf_stimulation_chart";
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

		// "detail_ivf_semenanalysisreport"
		$opt = &$this->ListOptions->Items["detail_ivf_semenanalysisreport"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_semenanalysisreportlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_semenanalysisreport";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "ivf_semenanalysisreport";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "ivf_semenanalysisreport";
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

		// "detail_ivf_embryology_chart"
		$opt = &$this->ListOptions->Items["detail_ivf_embryology_chart"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_embryology_chart')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_embryology_chartlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar <> "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_embryology_chart";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar <> "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "ivf_embryology_chart";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar <> "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "ivf_embryology_chart";
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
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_ivf_outcome");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["ivf_outcome"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["ivf_outcome"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ivf_outcome') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_outcome";
		}
		$item = &$option->add("detailadd_ivf_stimulation_chart");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["ivf_stimulation_chart"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["ivf_stimulation_chart"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ivf_stimulation_chart') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_stimulation_chart";
		}
		$item = &$option->add("detailadd_ivf_semenanalysisreport");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["ivf_semenanalysisreport"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["ivf_semenanalysisreport"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ivf_semenanalysisreport') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_semenanalysisreport";
		}
		$item = &$option->add("detailadd_ivf_embryology_chart");
		$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["ivf_embryology_chart"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["ivf_embryology_chart"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ivf_embryology_chart') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink <> "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_embryology_chart";
		}

		// Add multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$option->add("detailsadd");
			$url = $this->getAddUrl(TABLE_SHOW_DETAIL . "=" . $detailTableLink);
			$caption = $Language->phrase("AddMasterDetailLink");
			$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
			$item->Visible = ($detailTableLink <> "" && $Security->canAdd());

			// Hide single master/detail items
			$ar = explode(",", $detailTableLink);
			$cnt = count($ar);
			for ($i = 0; $i < $cnt; $i++) {
				if ($item = &$option->getItem("detailadd_" . $ar[$i]))
					$item->Visible = FALSE;
			}
		}
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_treatment_planlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_treatment_planlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fivf_treatment_planlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_treatment_planlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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
		$links = "";
		$btngrps = "";
		$sqlwrk = "`RIDNO`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_outcome"
		if ($this->DetailPages->Items["ivf_outcome"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_outcome"];
			$url = "ivf_outcomepreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_outcome\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_outcome')) {
				$label = $Language->TablePhrase("ivf_outcome", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_outcome\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_outcomelist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_outcome", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_outcome_grid"]))
				$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid();
			if ($GLOBALS["ivf_outcome_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_outcome')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_stimulation_chart"
		if ($this->DetailPages->Items["ivf_stimulation_chart"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_stimulation_chart"];
			$url = "ivf_stimulation_chartpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_stimulation_chart\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$label = $Language->TablePhrase("ivf_stimulation_chart", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_stimulation_chart\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_stimulation_chartlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_stimulation_chart", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
				$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid();
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_stimulation_chart')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`PatientName`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_semenanalysisreport"
		if ($this->DetailPages->Items["ivf_semenanalysisreport"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_semenanalysisreport"];
			$url = "ivf_semenanalysisreportpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$label = $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_semenanalysisreportlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
				$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_semenanalysisreport')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link <> "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_embryology_chart"
		if ($this->DetailPages->Items["ivf_embryology_chart"]->Visible) {
			$link = "";
			$option = &$this->ListOptions->Items["detail_ivf_embryology_chart"];
			$url = "ivf_embryology_chartpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_embryology_chart')) {
				$label = $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_embryology_chartlist.php?" . TABLE_SHOW_MASTER . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_embryology_chart", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "'\">" . $Language->Phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
				$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->Phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->Phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "'\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_embryology_chart')) {
				$caption = $Language->Phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(TABLE_SHOW_DETAIL . "=ivf_embryology_chart");
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
		$this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
		$this->Age->setDbValue($row['Age']);
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->IVFCycleNO->setDbValue($row['IVFCycleNO']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
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
		$this->MaleIndications->setDbValue($row['MaleIndications']);
		$this->FemaleIndications->setDbValue($row['FemaleIndications']);
		$this->UseOfThe->setDbValue($row['UseOfThe']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Heterotopic->setDbValue($row['Heterotopic']);
		$this->TransferDFE->setDbValue($row['TransferDFE']);
		$this->Evolutive->setDbValue($row['Evolutive']);
		$this->Number->setDbValue($row['Number']);
		$this->SequentialCult->setDbValue($row['SequentialCult']);
		$this->TineLapse->setDbValue($row['TineLapse']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->CoupleID->setDbValue($row['CoupleID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['TreatmentStartDate'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['IVFCycleNO'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
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
		$row['MaleIndications'] = NULL;
		$row['FemaleIndications'] = NULL;
		$row['UseOfThe'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Heterotopic'] = NULL;
		$row['TransferDFE'] = NULL;
		$row['Evolutive'] = NULL;
		$row['Number'] = NULL;
		$row['SequentialCult'] = NULL;
		$row['TineLapse'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['CoupleID'] = NULL;
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
		// TreatmentStartDate
		// Age
		// treatment_status
		// ARTCYCLE
		// IVFCycleNO
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
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
		// MaleIndications
		// FemaleIndications
		// UseOfThe
		// Ectopic
		// Heterotopic
		// TransferDFE
		// Evolutive
		// Number
		// SequentialCult
		// TineLapse
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// WifeCell
		// HusbandCell
		// CoupleID

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

			// TreatmentStartDate
			$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
			$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 7);
			$this->TreatmentStartDate->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			if (strval($this->treatment_status->CurrentValue) <> "") {
				$this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
			} else {
				$this->treatment_status->ViewValue = NULL;
			}
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) <> "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// IVFCycleNO
			$this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
			$this->IVFCycleNO->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) <> "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal <> "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
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

			// TreatementStopDate
			$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
			$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 7);
			$this->TreatementStopDate->ViewCustomAttributes = "";

			// TypePatient
			$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
			$this->TypePatient->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) <> "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			if (strval($this->TypeOfCycle->CurrentValue) <> "") {
				$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
			} else {
				$this->TypeOfCycle->ViewValue = NULL;
			}
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			if (strval($this->SpermOrgin->CurrentValue) <> "") {
				$this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
			} else {
				$this->SpermOrgin->ViewValue = NULL;
			}
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			if (strval($this->State->CurrentValue) <> "") {
				$this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
			} else {
				$this->State->ViewValue = NULL;
			}
			$this->State->ViewCustomAttributes = "";

			// Origin
			if (strval($this->Origin->CurrentValue) <> "") {
				$this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
			} else {
				$this->Origin->ViewValue = NULL;
			}
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			if (strval($this->MACS->CurrentValue) <> "") {
				$this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
			} else {
				$this->MACS->ViewValue = NULL;
			}
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			if (strval($this->PgdPlanning->CurrentValue) <> "") {
				$this->PgdPlanning->ViewValue = $this->PgdPlanning->optionCaption($this->PgdPlanning->CurrentValue);
			} else {
				$this->PgdPlanning->ViewValue = NULL;
			}
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

			// MaleIndications
			if (strval($this->MaleIndications->CurrentValue) <> "") {
				$this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
			} else {
				$this->MaleIndications->ViewValue = NULL;
			}
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			if (strval($this->FemaleIndications->CurrentValue) <> "") {
				$this->FemaleIndications->ViewValue = $this->FemaleIndications->optionCaption($this->FemaleIndications->CurrentValue);
			} else {
				$this->FemaleIndications->ViewValue = NULL;
			}
			$this->FemaleIndications->ViewCustomAttributes = "";

			// UseOfThe
			$this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
			$this->UseOfThe->ViewCustomAttributes = "";

			// Ectopic
			$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
			$this->Ectopic->ViewCustomAttributes = "";

			// Heterotopic
			if (strval($this->Heterotopic->CurrentValue) <> "") {
				$this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
			} else {
				$this->Heterotopic->ViewValue = NULL;
			}
			$this->Heterotopic->ViewCustomAttributes = "";

			// TransferDFE
			if (strval($this->TransferDFE->CurrentValue) <> "") {
				$this->TransferDFE->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->TransferDFE->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->TransferDFE->ViewValue->add($this->TransferDFE->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->TransferDFE->ViewValue = NULL;
			}
			$this->TransferDFE->ViewCustomAttributes = "";

			// Evolutive
			$this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
			$this->Evolutive->ViewCustomAttributes = "";

			// Number
			$this->Number->ViewValue = $this->Number->CurrentValue;
			$this->Number->ViewCustomAttributes = "";

			// SequentialCult
			$this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
			$this->SequentialCult->ViewCustomAttributes = "";

			// TineLapse
			if (strval($this->TineLapse->CurrentValue) <> "") {
				$this->TineLapse->ViewValue = $this->TineLapse->optionCaption($this->TineLapse->CurrentValue);
			} else {
				$this->TineLapse->ViewValue = NULL;
			}
			$this->TineLapse->ViewCustomAttributes = "";

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

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";
			$this->TreatmentStartDate->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";
			$this->IVFCycleNO->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";
			$this->TreatmentTec->TooltipValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";
			$this->TypeOfCycle->TooltipValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";
			$this->SpermOrgin->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";
			$this->Technique->TooltipValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";
			$this->PgdPlanning->TooltipValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";
			$this->IMSI->TooltipValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";
			$this->SequentialCulture->TooltipValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";
			$this->TimeLapse->TooltipValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";
			$this->AH->TooltipValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";
			$this->Weight->TooltipValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";
			$this->BMI->TooltipValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";
			$this->MaleIndications->TooltipValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
			$this->FemaleIndications->TooltipValue = "";
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
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fivf_treatment_planlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fivf_treatment_planlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fivf_treatment_planlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_ivf_treatment_plan\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_ivf_treatment_plan',hdr:ew.language.phrase('ExportToEmailText'),f:document.fivf_treatment_planlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
		$item->Visible = TRUE;

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
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf") {
			global $ivf;
			if (!isset($ivf))
				$ivf = new ivf();
			$rsmaster = $ivf->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$ivf;
					$ivf->exportDocument($doc, $rsmaster);
					$doc->exportEmptyRow();
					$doc->Table = &$this;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsmaster->close();
			}
		}

		// Export master record
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "view_donor_ivf") {
			global $view_donor_ivf;
			if (!isset($view_donor_ivf))
				$view_donor_ivf = new view_donor_ivf();
			$rsmaster = $view_donor_ivf->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$view_donor_ivf;
					$view_donor_ivf->exportDocument($doc, $rsmaster);
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
			if ($return)
				return $doc->Text; // Return email content
			else
				echo $this->exportEmail($doc->Text); // Send email
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

	// Export email
	protected function exportEmail($emailContent)
	{
		global $TempImages, $Language;
		$sender = Post("sender", "");
		$recipient = Post("recipient", "");
		$cc = Post("cc", "");
		$bcc = Post("bcc", "");

		// Subject
		$subject = Post("subject", "");
		$emailSubject = $subject;

		// Message
		$content = Post("message", "");
		$emailMessage = $content;

		// Check sender
		if ($sender == "") {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterSenderEmail") . "</p>";
		}
		if (!CheckEmail($sender)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
		}

		// Check recipient
		if (!CheckEmailList($recipient, MAX_EMAIL_RECIPIENT)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
		}

		// Check cc
		if (!CheckEmailList($cc, MAX_EMAIL_RECIPIENT)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
		}

		// Check bcc
		if (!CheckEmailList($bcc, MAX_EMAIL_RECIPIENT)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
		}

		// Check email sent count
		if (!isset($_SESSION[EXPORT_EMAIL_COUNTER]))
			$_SESSION[EXPORT_EMAIL_COUNTER] = 0;
		if ((int)$_SESSION[EXPORT_EMAIL_COUNTER] > MAX_EMAIL_SENT_COUNT) {
			return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Format = "html";
		if ($emailMessage <> "")
			$emailMessage = RemoveXss($emailMessage) . "<br><br>";
		foreach ($TempImages as $tmpImage)
			$email->addEmbeddedImage($tmpImage);
		$email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
		$eventArgs = [];
		if ($this->Recordset) {
			$this->RecCnt = $this->StartRec - 1;
			$this->Recordset->moveFirst();
			if ($this->StartRec > 1)
				$this->Recordset->move($this->StartRec - 1);
			$eventArgs["rs"] = &$this->Recordset;
		}
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();

		// Check email sent status
		if ($emailSent) {

			// Update email sent count
			$_SESSION[EXPORT_EMAIL_COUNTER]++;

			// Sent email success
			return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
		} else {

			// Sent email failure
			return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->RIDNO->setQueryStringValue(Get("fk_id"));
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($this->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Female") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Female"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($this->Name->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->RIDNO->setQueryStringValue(Get("fk_id"));
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($this->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Female") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Female"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($this->Name->QueryStringValue))
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->RIDNO->setFormValue(Post("fk_id"));
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($this->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Female") !== NULL) {
					$this->Name->setFormValue(Post("fk_Female"));
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($this->Name->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->RIDNO->setFormValue(Post("fk_id"));
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($this->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Female") !== NULL) {
					$this->Name->setFormValue(Post("fk_Female"));
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($this->Name->FormValue))
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
			if ($masterTblVar <> "ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
			if ($masterTblVar <> "view_donor_ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
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
						case "x_status":
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
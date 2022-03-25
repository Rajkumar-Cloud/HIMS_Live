<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_ovum_pick_up_chart_grid extends ivf_ovum_pick_up_chart
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_ovum_pick_up_chart';

	// Page object name
	public $PageObjName = "ivf_ovum_pick_up_chart_grid";

	// Grid form hidden field names
	public $FormName = "fivf_ovum_pick_up_chartgrid";
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
		$this->FormActionName .= "_" . $this->FormName;
		$this->FormKeyName .= "_" . $this->FormName;
		$this->FormOldKeyName .= "_" . $this->FormName;
		$this->FormBlankRowName .= "_" . $this->FormName;
		$this->FormKeyCountName .= "_" . $this->FormName;
		$GLOBALS["Grid"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (ivf_ovum_pick_up_chart)
		if (!isset($GLOBALS["ivf_ovum_pick_up_chart"]) || get_class($GLOBALS["ivf_ovum_pick_up_chart"]) == PROJECT_NAMESPACE . "ivf_ovum_pick_up_chart") {
			$GLOBALS["ivf_ovum_pick_up_chart"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["ivf_ovum_pick_up_chart"];

		}
		$this->AddUrl = "ivf_ovum_pick_up_chartadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_ovum_pick_up_chart');

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

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Export
		global $EXPORT, $ivf_ovum_pick_up_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_ovum_pick_up_chart);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}

//		$GLOBALS["Table"] = &$GLOBALS["MasterTable"];
		unset($GLOBALS["Grid"]);
		if ($url === "")
			return;
		if (!IsApi())
			$this->Page_Redirecting($url);

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
	public $ShowOtherOptions = FALSE;
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

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->Consultant->setVisibility();
		$this->TotalDoseOfStimulation->setVisibility();
		$this->Protocol->setVisibility();
		$this->NumberOfDaysOfStimulation->setVisibility();
		$this->TriggerDateTime->setVisibility();
		$this->OPUDateTime->setVisibility();
		$this->HoursAfterTrigger->setVisibility();
		$this->SerumE2->setVisibility();
		$this->SerumP4->setVisibility();
		$this->FORT->setVisibility();
		$this->ExperctedOocytes->setVisibility();
		$this->NoOfOocytesRetrieved->setVisibility();
		$this->OocytesRetreivalRate->setVisibility();
		$this->Anesthesia->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->UCL->setVisibility();
		$this->Angle->setVisibility();
		$this->EMS->setVisibility();
		$this->Cannulation->setVisibility();
		$this->ProcedureT->Visible = FALSE;
		$this->NoOfOocytesRetrievedd->setVisibility();
		$this->CourseInHospital->Visible = FALSE;
		$this->DischargeAdvise->Visible = FALSE;
		$this->FollowUpAdvise->Visible = FALSE;
		$this->PlanT->setVisibility();
		$this->ReviewDate->setVisibility();
		$this->ReviewDoctor->setVisibility();
		$this->TemplateProcedure->Visible = FALSE;
		$this->TemplateCourseInHospital->Visible = FALSE;
		$this->TemplateDischargeAdvise->Visible = FALSE;
		$this->TemplateFollowUpAdvise->Visible = FALSE;
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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->TemplateProcedure);
		$this->setupLookupOptions($this->TemplateCourseInHospital);
		$this->setupLookupOptions($this->TemplateDischargeAdvise);
		$this->setupLookupOptions($this->TemplateFollowUpAdvise);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
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
		if ($this->isGridAdd()) {
			if ($this->CurrentMode == "copy") {
				$selectLimit = $this->UseSelectLimit;
				if ($selectLimit) {
					$this->TotalRecs = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecs = $this->Recordset->RecordCount();
				}
				$this->StartRec = 1;
				$this->DisplayRecs = $this->TotalRecs;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRec = 1;
				$this->DisplayRecs = $this->GridAddRowCount;
			}
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
			$this->DisplayRecs = $this->TotalRecs; // Display all records
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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
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

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = &$this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
				$this->loadOldRecord(); // Load old record
			}
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->clearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($gridInsert) {

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_RIDNo") && $CurrentForm->hasValue("o_RIDNo") && $this->RIDNo->CurrentValue <> $this->RIDNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue <> $this->Name->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ARTCycle") && $CurrentForm->hasValue("o_ARTCycle") && $this->ARTCycle->CurrentValue <> $this->ARTCycle->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Consultant") && $CurrentForm->hasValue("o_Consultant") && $this->Consultant->CurrentValue <> $this->Consultant->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TotalDoseOfStimulation") && $CurrentForm->hasValue("o_TotalDoseOfStimulation") && $this->TotalDoseOfStimulation->CurrentValue <> $this->TotalDoseOfStimulation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Protocol") && $CurrentForm->hasValue("o_Protocol") && $this->Protocol->CurrentValue <> $this->Protocol->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NumberOfDaysOfStimulation") && $CurrentForm->hasValue("o_NumberOfDaysOfStimulation") && $this->NumberOfDaysOfStimulation->CurrentValue <> $this->NumberOfDaysOfStimulation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TriggerDateTime") && $CurrentForm->hasValue("o_TriggerDateTime") && $this->TriggerDateTime->CurrentValue <> $this->TriggerDateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OPUDateTime") && $CurrentForm->hasValue("o_OPUDateTime") && $this->OPUDateTime->CurrentValue <> $this->OPUDateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HoursAfterTrigger") && $CurrentForm->hasValue("o_HoursAfterTrigger") && $this->HoursAfterTrigger->CurrentValue <> $this->HoursAfterTrigger->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SerumE2") && $CurrentForm->hasValue("o_SerumE2") && $this->SerumE2->CurrentValue <> $this->SerumE2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SerumP4") && $CurrentForm->hasValue("o_SerumP4") && $this->SerumP4->CurrentValue <> $this->SerumP4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FORT") && $CurrentForm->hasValue("o_FORT") && $this->FORT->CurrentValue <> $this->FORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ExperctedOocytes") && $CurrentForm->hasValue("o_ExperctedOocytes") && $this->ExperctedOocytes->CurrentValue <> $this->ExperctedOocytes->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfOocytesRetrieved") && $CurrentForm->hasValue("o_NoOfOocytesRetrieved") && $this->NoOfOocytesRetrieved->CurrentValue <> $this->NoOfOocytesRetrieved->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OocytesRetreivalRate") && $CurrentForm->hasValue("o_OocytesRetreivalRate") && $this->OocytesRetreivalRate->CurrentValue <> $this->OocytesRetreivalRate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Anesthesia") && $CurrentForm->hasValue("o_Anesthesia") && $this->Anesthesia->CurrentValue <> $this->Anesthesia->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TrialCannulation") && $CurrentForm->hasValue("o_TrialCannulation") && $this->TrialCannulation->CurrentValue <> $this->TrialCannulation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UCL") && $CurrentForm->hasValue("o_UCL") && $this->UCL->CurrentValue <> $this->UCL->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Angle") && $CurrentForm->hasValue("o_Angle") && $this->Angle->CurrentValue <> $this->Angle->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EMS") && $CurrentForm->hasValue("o_EMS") && $this->EMS->CurrentValue <> $this->EMS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Cannulation") && $CurrentForm->hasValue("o_Cannulation") && $this->Cannulation->CurrentValue <> $this->Cannulation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfOocytesRetrievedd") && $CurrentForm->hasValue("o_NoOfOocytesRetrievedd") && $this->NoOfOocytesRetrievedd->CurrentValue <> $this->NoOfOocytesRetrievedd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PlanT") && $CurrentForm->hasValue("o_PlanT") && $this->PlanT->CurrentValue <> $this->PlanT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReviewDate") && $CurrentForm->hasValue("o_ReviewDate") && $this->ReviewDate->CurrentValue <> $this->ReviewDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReviewDoctor") && $CurrentForm->hasValue("o_ReviewDoctor") && $this->ReviewDoctor->CurrentValue <> $this->ReviewDoctor->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue <> $this->TidNo->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->RIDNo->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->TidNo->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
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

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

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

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode

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
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = &$this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = &$options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = &$options["addedit"];
			$item = &$option->getItem("add");
			$this->ShowOtherOptions = $item && $item->Visible;
		}
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

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->ARTCycle->CurrentValue = NULL;
		$this->ARTCycle->OldValue = $this->ARTCycle->CurrentValue;
		$this->Consultant->CurrentValue = NULL;
		$this->Consultant->OldValue = $this->Consultant->CurrentValue;
		$this->TotalDoseOfStimulation->CurrentValue = NULL;
		$this->TotalDoseOfStimulation->OldValue = $this->TotalDoseOfStimulation->CurrentValue;
		$this->Protocol->CurrentValue = NULL;
		$this->Protocol->OldValue = $this->Protocol->CurrentValue;
		$this->NumberOfDaysOfStimulation->CurrentValue = NULL;
		$this->NumberOfDaysOfStimulation->OldValue = $this->NumberOfDaysOfStimulation->CurrentValue;
		$this->TriggerDateTime->CurrentValue = NULL;
		$this->TriggerDateTime->OldValue = $this->TriggerDateTime->CurrentValue;
		$this->OPUDateTime->CurrentValue = NULL;
		$this->OPUDateTime->OldValue = $this->OPUDateTime->CurrentValue;
		$this->HoursAfterTrigger->CurrentValue = NULL;
		$this->HoursAfterTrigger->OldValue = $this->HoursAfterTrigger->CurrentValue;
		$this->SerumE2->CurrentValue = NULL;
		$this->SerumE2->OldValue = $this->SerumE2->CurrentValue;
		$this->SerumP4->CurrentValue = NULL;
		$this->SerumP4->OldValue = $this->SerumP4->CurrentValue;
		$this->FORT->CurrentValue = NULL;
		$this->FORT->OldValue = $this->FORT->CurrentValue;
		$this->ExperctedOocytes->CurrentValue = NULL;
		$this->ExperctedOocytes->OldValue = $this->ExperctedOocytes->CurrentValue;
		$this->NoOfOocytesRetrieved->CurrentValue = NULL;
		$this->NoOfOocytesRetrieved->OldValue = $this->NoOfOocytesRetrieved->CurrentValue;
		$this->OocytesRetreivalRate->CurrentValue = NULL;
		$this->OocytesRetreivalRate->OldValue = $this->OocytesRetreivalRate->CurrentValue;
		$this->Anesthesia->CurrentValue = NULL;
		$this->Anesthesia->OldValue = $this->Anesthesia->CurrentValue;
		$this->TrialCannulation->CurrentValue = NULL;
		$this->TrialCannulation->OldValue = $this->TrialCannulation->CurrentValue;
		$this->UCL->CurrentValue = NULL;
		$this->UCL->OldValue = $this->UCL->CurrentValue;
		$this->Angle->CurrentValue = NULL;
		$this->Angle->OldValue = $this->Angle->CurrentValue;
		$this->EMS->CurrentValue = NULL;
		$this->EMS->OldValue = $this->EMS->CurrentValue;
		$this->Cannulation->CurrentValue = NULL;
		$this->Cannulation->OldValue = $this->Cannulation->CurrentValue;
		$this->ProcedureT->CurrentValue = NULL;
		$this->ProcedureT->OldValue = $this->ProcedureT->CurrentValue;
		$this->NoOfOocytesRetrievedd->CurrentValue = NULL;
		$this->NoOfOocytesRetrievedd->OldValue = $this->NoOfOocytesRetrievedd->CurrentValue;
		$this->CourseInHospital->CurrentValue = NULL;
		$this->CourseInHospital->OldValue = $this->CourseInHospital->CurrentValue;
		$this->DischargeAdvise->CurrentValue = NULL;
		$this->DischargeAdvise->OldValue = $this->DischargeAdvise->CurrentValue;
		$this->FollowUpAdvise->CurrentValue = NULL;
		$this->FollowUpAdvise->OldValue = $this->FollowUpAdvise->CurrentValue;
		$this->PlanT->CurrentValue = NULL;
		$this->PlanT->OldValue = $this->PlanT->CurrentValue;
		$this->ReviewDate->CurrentValue = NULL;
		$this->ReviewDate->OldValue = $this->ReviewDate->CurrentValue;
		$this->ReviewDoctor->CurrentValue = NULL;
		$this->ReviewDoctor->OldValue = $this->ReviewDoctor->CurrentValue;
		$this->TemplateProcedure->CurrentValue = NULL;
		$this->TemplateProcedure->OldValue = $this->TemplateProcedure->CurrentValue;
		$this->TemplateCourseInHospital->CurrentValue = NULL;
		$this->TemplateCourseInHospital->OldValue = $this->TemplateCourseInHospital->CurrentValue;
		$this->TemplateDischargeAdvise->CurrentValue = NULL;
		$this->TemplateDischargeAdvise->OldValue = $this->TemplateDischargeAdvise->CurrentValue;
		$this->TemplateFollowUpAdvise->CurrentValue = NULL;
		$this->TemplateFollowUpAdvise->OldValue = $this->TemplateFollowUpAdvise->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}
		$this->RIDNo->setOldValue($CurrentForm->getValue("o_RIDNo"));

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}
		$this->Name->setOldValue($CurrentForm->getValue("o_Name"));

		// Check field name 'ARTCycle' first before field var 'x_ARTCycle'
		$val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
		if (!$this->ARTCycle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ARTCycle->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCycle->setFormValue($val);
		}
		$this->ARTCycle->setOldValue($CurrentForm->getValue("o_ARTCycle"));

		// Check field name 'Consultant' first before field var 'x_Consultant'
		$val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
		if (!$this->Consultant->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Consultant->Visible = FALSE; // Disable update for API request
			else
				$this->Consultant->setFormValue($val);
		}
		$this->Consultant->setOldValue($CurrentForm->getValue("o_Consultant"));

		// Check field name 'TotalDoseOfStimulation' first before field var 'x_TotalDoseOfStimulation'
		$val = $CurrentForm->hasValue("TotalDoseOfStimulation") ? $CurrentForm->getValue("TotalDoseOfStimulation") : $CurrentForm->getValue("x_TotalDoseOfStimulation");
		if (!$this->TotalDoseOfStimulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TotalDoseOfStimulation->Visible = FALSE; // Disable update for API request
			else
				$this->TotalDoseOfStimulation->setFormValue($val);
		}
		$this->TotalDoseOfStimulation->setOldValue($CurrentForm->getValue("o_TotalDoseOfStimulation"));

		// Check field name 'Protocol' first before field var 'x_Protocol'
		$val = $CurrentForm->hasValue("Protocol") ? $CurrentForm->getValue("Protocol") : $CurrentForm->getValue("x_Protocol");
		if (!$this->Protocol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Protocol->Visible = FALSE; // Disable update for API request
			else
				$this->Protocol->setFormValue($val);
		}
		$this->Protocol->setOldValue($CurrentForm->getValue("o_Protocol"));

		// Check field name 'NumberOfDaysOfStimulation' first before field var 'x_NumberOfDaysOfStimulation'
		$val = $CurrentForm->hasValue("NumberOfDaysOfStimulation") ? $CurrentForm->getValue("NumberOfDaysOfStimulation") : $CurrentForm->getValue("x_NumberOfDaysOfStimulation");
		if (!$this->NumberOfDaysOfStimulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NumberOfDaysOfStimulation->Visible = FALSE; // Disable update for API request
			else
				$this->NumberOfDaysOfStimulation->setFormValue($val);
		}
		$this->NumberOfDaysOfStimulation->setOldValue($CurrentForm->getValue("o_NumberOfDaysOfStimulation"));

		// Check field name 'TriggerDateTime' first before field var 'x_TriggerDateTime'
		$val = $CurrentForm->hasValue("TriggerDateTime") ? $CurrentForm->getValue("TriggerDateTime") : $CurrentForm->getValue("x_TriggerDateTime");
		if (!$this->TriggerDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TriggerDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->TriggerDateTime->setFormValue($val);
			$this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
		}
		$this->TriggerDateTime->setOldValue($CurrentForm->getValue("o_TriggerDateTime"));

		// Check field name 'OPUDateTime' first before field var 'x_OPUDateTime'
		$val = $CurrentForm->hasValue("OPUDateTime") ? $CurrentForm->getValue("OPUDateTime") : $CurrentForm->getValue("x_OPUDateTime");
		if (!$this->OPUDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OPUDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->OPUDateTime->setFormValue($val);
			$this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
		}
		$this->OPUDateTime->setOldValue($CurrentForm->getValue("o_OPUDateTime"));

		// Check field name 'HoursAfterTrigger' first before field var 'x_HoursAfterTrigger'
		$val = $CurrentForm->hasValue("HoursAfterTrigger") ? $CurrentForm->getValue("HoursAfterTrigger") : $CurrentForm->getValue("x_HoursAfterTrigger");
		if (!$this->HoursAfterTrigger->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HoursAfterTrigger->Visible = FALSE; // Disable update for API request
			else
				$this->HoursAfterTrigger->setFormValue($val);
		}
		$this->HoursAfterTrigger->setOldValue($CurrentForm->getValue("o_HoursAfterTrigger"));

		// Check field name 'SerumE2' first before field var 'x_SerumE2'
		$val = $CurrentForm->hasValue("SerumE2") ? $CurrentForm->getValue("SerumE2") : $CurrentForm->getValue("x_SerumE2");
		if (!$this->SerumE2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerumE2->Visible = FALSE; // Disable update for API request
			else
				$this->SerumE2->setFormValue($val);
		}
		$this->SerumE2->setOldValue($CurrentForm->getValue("o_SerumE2"));

		// Check field name 'SerumP4' first before field var 'x_SerumP4'
		$val = $CurrentForm->hasValue("SerumP4") ? $CurrentForm->getValue("SerumP4") : $CurrentForm->getValue("x_SerumP4");
		if (!$this->SerumP4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerumP4->Visible = FALSE; // Disable update for API request
			else
				$this->SerumP4->setFormValue($val);
		}
		$this->SerumP4->setOldValue($CurrentForm->getValue("o_SerumP4"));

		// Check field name 'FORT' first before field var 'x_FORT'
		$val = $CurrentForm->hasValue("FORT") ? $CurrentForm->getValue("FORT") : $CurrentForm->getValue("x_FORT");
		if (!$this->FORT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FORT->Visible = FALSE; // Disable update for API request
			else
				$this->FORT->setFormValue($val);
		}
		$this->FORT->setOldValue($CurrentForm->getValue("o_FORT"));

		// Check field name 'ExperctedOocytes' first before field var 'x_ExperctedOocytes'
		$val = $CurrentForm->hasValue("ExperctedOocytes") ? $CurrentForm->getValue("ExperctedOocytes") : $CurrentForm->getValue("x_ExperctedOocytes");
		if (!$this->ExperctedOocytes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExperctedOocytes->Visible = FALSE; // Disable update for API request
			else
				$this->ExperctedOocytes->setFormValue($val);
		}
		$this->ExperctedOocytes->setOldValue($CurrentForm->getValue("o_ExperctedOocytes"));

		// Check field name 'NoOfOocytesRetrieved' first before field var 'x_NoOfOocytesRetrieved'
		$val = $CurrentForm->hasValue("NoOfOocytesRetrieved") ? $CurrentForm->getValue("NoOfOocytesRetrieved") : $CurrentForm->getValue("x_NoOfOocytesRetrieved");
		if (!$this->NoOfOocytesRetrieved->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfOocytesRetrieved->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytesRetrieved->setFormValue($val);
		}
		$this->NoOfOocytesRetrieved->setOldValue($CurrentForm->getValue("o_NoOfOocytesRetrieved"));

		// Check field name 'OocytesRetreivalRate' first before field var 'x_OocytesRetreivalRate'
		$val = $CurrentForm->hasValue("OocytesRetreivalRate") ? $CurrentForm->getValue("OocytesRetreivalRate") : $CurrentForm->getValue("x_OocytesRetreivalRate");
		if (!$this->OocytesRetreivalRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesRetreivalRate->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesRetreivalRate->setFormValue($val);
		}
		$this->OocytesRetreivalRate->setOldValue($CurrentForm->getValue("o_OocytesRetreivalRate"));

		// Check field name 'Anesthesia' first before field var 'x_Anesthesia'
		$val = $CurrentForm->hasValue("Anesthesia") ? $CurrentForm->getValue("Anesthesia") : $CurrentForm->getValue("x_Anesthesia");
		if (!$this->Anesthesia->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Anesthesia->Visible = FALSE; // Disable update for API request
			else
				$this->Anesthesia->setFormValue($val);
		}
		$this->Anesthesia->setOldValue($CurrentForm->getValue("o_Anesthesia"));

		// Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
		$val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
		if (!$this->TrialCannulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TrialCannulation->Visible = FALSE; // Disable update for API request
			else
				$this->TrialCannulation->setFormValue($val);
		}
		$this->TrialCannulation->setOldValue($CurrentForm->getValue("o_TrialCannulation"));

		// Check field name 'UCL' first before field var 'x_UCL'
		$val = $CurrentForm->hasValue("UCL") ? $CurrentForm->getValue("UCL") : $CurrentForm->getValue("x_UCL");
		if (!$this->UCL->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UCL->Visible = FALSE; // Disable update for API request
			else
				$this->UCL->setFormValue($val);
		}
		$this->UCL->setOldValue($CurrentForm->getValue("o_UCL"));

		// Check field name 'Angle' first before field var 'x_Angle'
		$val = $CurrentForm->hasValue("Angle") ? $CurrentForm->getValue("Angle") : $CurrentForm->getValue("x_Angle");
		if (!$this->Angle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Angle->Visible = FALSE; // Disable update for API request
			else
				$this->Angle->setFormValue($val);
		}
		$this->Angle->setOldValue($CurrentForm->getValue("o_Angle"));

		// Check field name 'EMS' first before field var 'x_EMS'
		$val = $CurrentForm->hasValue("EMS") ? $CurrentForm->getValue("EMS") : $CurrentForm->getValue("x_EMS");
		if (!$this->EMS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EMS->Visible = FALSE; // Disable update for API request
			else
				$this->EMS->setFormValue($val);
		}
		$this->EMS->setOldValue($CurrentForm->getValue("o_EMS"));

		// Check field name 'Cannulation' first before field var 'x_Cannulation'
		$val = $CurrentForm->hasValue("Cannulation") ? $CurrentForm->getValue("Cannulation") : $CurrentForm->getValue("x_Cannulation");
		if (!$this->Cannulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cannulation->Visible = FALSE; // Disable update for API request
			else
				$this->Cannulation->setFormValue($val);
		}
		$this->Cannulation->setOldValue($CurrentForm->getValue("o_Cannulation"));

		// Check field name 'NoOfOocytesRetrievedd' first before field var 'x_NoOfOocytesRetrievedd'
		$val = $CurrentForm->hasValue("NoOfOocytesRetrievedd") ? $CurrentForm->getValue("NoOfOocytesRetrievedd") : $CurrentForm->getValue("x_NoOfOocytesRetrievedd");
		if (!$this->NoOfOocytesRetrievedd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfOocytesRetrievedd->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytesRetrievedd->setFormValue($val);
		}
		$this->NoOfOocytesRetrievedd->setOldValue($CurrentForm->getValue("o_NoOfOocytesRetrievedd"));

		// Check field name 'PlanT' first before field var 'x_PlanT'
		$val = $CurrentForm->hasValue("PlanT") ? $CurrentForm->getValue("PlanT") : $CurrentForm->getValue("x_PlanT");
		if (!$this->PlanT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PlanT->Visible = FALSE; // Disable update for API request
			else
				$this->PlanT->setFormValue($val);
		}
		$this->PlanT->setOldValue($CurrentForm->getValue("o_PlanT"));

		// Check field name 'ReviewDate' first before field var 'x_ReviewDate'
		$val = $CurrentForm->hasValue("ReviewDate") ? $CurrentForm->getValue("ReviewDate") : $CurrentForm->getValue("x_ReviewDate");
		if (!$this->ReviewDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReviewDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReviewDate->setFormValue($val);
			$this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
		}
		$this->ReviewDate->setOldValue($CurrentForm->getValue("o_ReviewDate"));

		// Check field name 'ReviewDoctor' first before field var 'x_ReviewDoctor'
		$val = $CurrentForm->hasValue("ReviewDoctor") ? $CurrentForm->getValue("ReviewDoctor") : $CurrentForm->getValue("x_ReviewDoctor");
		if (!$this->ReviewDoctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReviewDoctor->Visible = FALSE; // Disable update for API request
			else
				$this->ReviewDoctor->setFormValue($val);
		}
		$this->ReviewDoctor->setOldValue($CurrentForm->getValue("o_ReviewDoctor"));

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
		$this->TidNo->setOldValue($CurrentForm->getValue("o_TidNo"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->TotalDoseOfStimulation->CurrentValue = $this->TotalDoseOfStimulation->FormValue;
		$this->Protocol->CurrentValue = $this->Protocol->FormValue;
		$this->NumberOfDaysOfStimulation->CurrentValue = $this->NumberOfDaysOfStimulation->FormValue;
		$this->TriggerDateTime->CurrentValue = $this->TriggerDateTime->FormValue;
		$this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
		$this->OPUDateTime->CurrentValue = $this->OPUDateTime->FormValue;
		$this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
		$this->HoursAfterTrigger->CurrentValue = $this->HoursAfterTrigger->FormValue;
		$this->SerumE2->CurrentValue = $this->SerumE2->FormValue;
		$this->SerumP4->CurrentValue = $this->SerumP4->FormValue;
		$this->FORT->CurrentValue = $this->FORT->FormValue;
		$this->ExperctedOocytes->CurrentValue = $this->ExperctedOocytes->FormValue;
		$this->NoOfOocytesRetrieved->CurrentValue = $this->NoOfOocytesRetrieved->FormValue;
		$this->OocytesRetreivalRate->CurrentValue = $this->OocytesRetreivalRate->FormValue;
		$this->Anesthesia->CurrentValue = $this->Anesthesia->FormValue;
		$this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
		$this->UCL->CurrentValue = $this->UCL->FormValue;
		$this->Angle->CurrentValue = $this->Angle->FormValue;
		$this->EMS->CurrentValue = $this->EMS->FormValue;
		$this->Cannulation->CurrentValue = $this->Cannulation->FormValue;
		$this->NoOfOocytesRetrievedd->CurrentValue = $this->NoOfOocytesRetrievedd->FormValue;
		$this->PlanT->CurrentValue = $this->PlanT->FormValue;
		$this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
		$this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
		$this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
		$this->TotalDoseOfStimulation->setDbValue($row['TotalDoseOfStimulation']);
		$this->Protocol->setDbValue($row['Protocol']);
		$this->NumberOfDaysOfStimulation->setDbValue($row['NumberOfDaysOfStimulation']);
		$this->TriggerDateTime->setDbValue($row['TriggerDateTime']);
		$this->OPUDateTime->setDbValue($row['OPUDateTime']);
		$this->HoursAfterTrigger->setDbValue($row['HoursAfterTrigger']);
		$this->SerumE2->setDbValue($row['SerumE2']);
		$this->SerumP4->setDbValue($row['SerumP4']);
		$this->FORT->setDbValue($row['FORT']);
		$this->ExperctedOocytes->setDbValue($row['ExperctedOocytes']);
		$this->NoOfOocytesRetrieved->setDbValue($row['NoOfOocytesRetrieved']);
		$this->OocytesRetreivalRate->setDbValue($row['OocytesRetreivalRate']);
		$this->Anesthesia->setDbValue($row['Anesthesia']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->UCL->setDbValue($row['UCL']);
		$this->Angle->setDbValue($row['Angle']);
		$this->EMS->setDbValue($row['EMS']);
		$this->Cannulation->setDbValue($row['Cannulation']);
		$this->ProcedureT->setDbValue($row['ProcedureT']);
		$this->NoOfOocytesRetrievedd->setDbValue($row['NoOfOocytesRetrievedd']);
		$this->CourseInHospital->setDbValue($row['CourseInHospital']);
		$this->DischargeAdvise->setDbValue($row['DischargeAdvise']);
		$this->FollowUpAdvise->setDbValue($row['FollowUpAdvise']);
		$this->PlanT->setDbValue($row['PlanT']);
		$this->ReviewDate->setDbValue($row['ReviewDate']);
		$this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
		$this->TemplateProcedure->setDbValue($row['TemplateProcedure']);
		$this->TemplateCourseInHospital->setDbValue($row['TemplateCourseInHospital']);
		$this->TemplateDischargeAdvise->setDbValue($row['TemplateDischargeAdvise']);
		$this->TemplateFollowUpAdvise->setDbValue($row['TemplateFollowUpAdvise']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['ARTCycle'] = $this->ARTCycle->CurrentValue;
		$row['Consultant'] = $this->Consultant->CurrentValue;
		$row['TotalDoseOfStimulation'] = $this->TotalDoseOfStimulation->CurrentValue;
		$row['Protocol'] = $this->Protocol->CurrentValue;
		$row['NumberOfDaysOfStimulation'] = $this->NumberOfDaysOfStimulation->CurrentValue;
		$row['TriggerDateTime'] = $this->TriggerDateTime->CurrentValue;
		$row['OPUDateTime'] = $this->OPUDateTime->CurrentValue;
		$row['HoursAfterTrigger'] = $this->HoursAfterTrigger->CurrentValue;
		$row['SerumE2'] = $this->SerumE2->CurrentValue;
		$row['SerumP4'] = $this->SerumP4->CurrentValue;
		$row['FORT'] = $this->FORT->CurrentValue;
		$row['ExperctedOocytes'] = $this->ExperctedOocytes->CurrentValue;
		$row['NoOfOocytesRetrieved'] = $this->NoOfOocytesRetrieved->CurrentValue;
		$row['OocytesRetreivalRate'] = $this->OocytesRetreivalRate->CurrentValue;
		$row['Anesthesia'] = $this->Anesthesia->CurrentValue;
		$row['TrialCannulation'] = $this->TrialCannulation->CurrentValue;
		$row['UCL'] = $this->UCL->CurrentValue;
		$row['Angle'] = $this->Angle->CurrentValue;
		$row['EMS'] = $this->EMS->CurrentValue;
		$row['Cannulation'] = $this->Cannulation->CurrentValue;
		$row['ProcedureT'] = $this->ProcedureT->CurrentValue;
		$row['NoOfOocytesRetrievedd'] = $this->NoOfOocytesRetrievedd->CurrentValue;
		$row['CourseInHospital'] = $this->CourseInHospital->CurrentValue;
		$row['DischargeAdvise'] = $this->DischargeAdvise->CurrentValue;
		$row['FollowUpAdvise'] = $this->FollowUpAdvise->CurrentValue;
		$row['PlanT'] = $this->PlanT->CurrentValue;
		$row['ReviewDate'] = $this->ReviewDate->CurrentValue;
		$row['ReviewDoctor'] = $this->ReviewDoctor->CurrentValue;
		$row['TemplateProcedure'] = $this->TemplateProcedure->CurrentValue;
		$row['TemplateCourseInHospital'] = $this->TemplateCourseInHospital->CurrentValue;
		$row['TemplateDischargeAdvise'] = $this->TemplateDischargeAdvise->CurrentValue;
		$row['TemplateFollowUpAdvise'] = $this->TemplateFollowUpAdvise->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$this->id->CurrentValue = strval($arKeys[0]); // id
			else
				$validKey = FALSE;
		} else {
			$validKey = FALSE;
		}

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
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// RIDNo
		// Name
		// ARTCycle
		// Consultant
		// TotalDoseOfStimulation
		// Protocol
		// NumberOfDaysOfStimulation
		// TriggerDateTime
		// OPUDateTime
		// HoursAfterTrigger
		// SerumE2
		// SerumP4
		// FORT
		// ExperctedOocytes
		// NoOfOocytesRetrieved
		// OocytesRetreivalRate
		// Anesthesia
		// TrialCannulation
		// UCL
		// Angle
		// EMS
		// Cannulation
		// ProcedureT
		// NoOfOocytesRetrievedd
		// CourseInHospital
		// DischargeAdvise
		// FollowUpAdvise
		// PlanT
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedure
		// TemplateCourseInHospital
		// TemplateDischargeAdvise
		// TemplateFollowUpAdvise
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
			$this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
			$this->ARTCycle->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
			$this->TotalDoseOfStimulation->ViewCustomAttributes = "";

			// Protocol
			if (strval($this->Protocol->CurrentValue) <> "") {
				$this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
			} else {
				$this->Protocol->ViewValue = NULL;
			}
			$this->Protocol->ViewCustomAttributes = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
			$this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

			// TriggerDateTime
			$this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
			$this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
			$this->TriggerDateTime->ViewCustomAttributes = "";

			// OPUDateTime
			$this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
			$this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
			$this->OPUDateTime->ViewCustomAttributes = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
			$this->HoursAfterTrigger->ViewCustomAttributes = "";

			// SerumE2
			$this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
			$this->SerumE2->ViewCustomAttributes = "";

			// SerumP4
			$this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
			$this->SerumP4->ViewCustomAttributes = "";

			// FORT
			$this->FORT->ViewValue = $this->FORT->CurrentValue;
			$this->FORT->ViewCustomAttributes = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
			$this->ExperctedOocytes->ViewCustomAttributes = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
			$this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
			$this->OocytesRetreivalRate->ViewCustomAttributes = "";

			// Anesthesia
			$this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
			$this->Anesthesia->ViewCustomAttributes = "";

			// TrialCannulation
			$this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
			$this->TrialCannulation->ViewCustomAttributes = "";

			// UCL
			$this->UCL->ViewValue = $this->UCL->CurrentValue;
			$this->UCL->ViewCustomAttributes = "";

			// Angle
			$this->Angle->ViewValue = $this->Angle->CurrentValue;
			$this->Angle->ViewCustomAttributes = "";

			// EMS
			$this->EMS->ViewValue = $this->EMS->CurrentValue;
			$this->EMS->ViewCustomAttributes = "";

			// Cannulation
			if (strval($this->Cannulation->CurrentValue) <> "") {
				$this->Cannulation->ViewValue = $this->Cannulation->optionCaption($this->Cannulation->CurrentValue);
			} else {
				$this->Cannulation->ViewValue = NULL;
			}
			$this->Cannulation->ViewCustomAttributes = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
			$this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

			// PlanT
			if (strval($this->PlanT->CurrentValue) <> "") {
				$this->PlanT->ViewValue = $this->PlanT->optionCaption($this->PlanT->CurrentValue);
			} else {
				$this->PlanT->ViewValue = NULL;
			}
			$this->PlanT->ViewCustomAttributes = "";

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

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
			$this->TotalDoseOfStimulation->HrefValue = "";
			$this->TotalDoseOfStimulation->TooltipValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";
			$this->Protocol->TooltipValue = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
			$this->NumberOfDaysOfStimulation->HrefValue = "";
			$this->NumberOfDaysOfStimulation->TooltipValue = "";

			// TriggerDateTime
			$this->TriggerDateTime->LinkCustomAttributes = "";
			$this->TriggerDateTime->HrefValue = "";
			$this->TriggerDateTime->TooltipValue = "";

			// OPUDateTime
			$this->OPUDateTime->LinkCustomAttributes = "";
			$this->OPUDateTime->HrefValue = "";
			$this->OPUDateTime->TooltipValue = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->LinkCustomAttributes = "";
			$this->HoursAfterTrigger->HrefValue = "";
			$this->HoursAfterTrigger->TooltipValue = "";

			// SerumE2
			$this->SerumE2->LinkCustomAttributes = "";
			$this->SerumE2->HrefValue = "";
			$this->SerumE2->TooltipValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";
			$this->SerumP4->TooltipValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";
			$this->FORT->TooltipValue = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->LinkCustomAttributes = "";
			$this->ExperctedOocytes->HrefValue = "";
			$this->ExperctedOocytes->TooltipValue = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrieved->HrefValue = "";
			$this->NoOfOocytesRetrieved->TooltipValue = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->LinkCustomAttributes = "";
			$this->OocytesRetreivalRate->HrefValue = "";
			$this->OocytesRetreivalRate->TooltipValue = "";

			// Anesthesia
			$this->Anesthesia->LinkCustomAttributes = "";
			$this->Anesthesia->HrefValue = "";
			$this->Anesthesia->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// UCL
			$this->UCL->LinkCustomAttributes = "";
			$this->UCL->HrefValue = "";
			$this->UCL->TooltipValue = "";

			// Angle
			$this->Angle->LinkCustomAttributes = "";
			$this->Angle->HrefValue = "";
			$this->Angle->TooltipValue = "";

			// EMS
			$this->EMS->LinkCustomAttributes = "";
			$this->EMS->HrefValue = "";
			$this->EMS->TooltipValue = "";

			// Cannulation
			$this->Cannulation->LinkCustomAttributes = "";
			$this->Cannulation->HrefValue = "";
			$this->Cannulation->TooltipValue = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrievedd->HrefValue = "";
			$this->NoOfOocytesRetrievedd->TooltipValue = "";

			// PlanT
			$this->PlanT->LinkCustomAttributes = "";
			$this->PlanT->HrefValue = "";
			$this->PlanT->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// RIDNo

			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ARTCycle
			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
			$this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
			$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
			$this->TotalDoseOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->EditValue = HtmlEncode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

			// Protocol
			$this->Protocol->EditAttrs["class"] = "form-control";
			$this->Protocol->EditCustomAttributes = "";
			$this->Protocol->EditValue = $this->Protocol->options(TRUE);

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
			$this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->EditValue = HtmlEncode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

			// TriggerDateTime
			$this->TriggerDateTime->EditAttrs["class"] = "form-control";
			$this->TriggerDateTime->EditCustomAttributes = "";
			$this->TriggerDateTime->EditValue = HtmlEncode(FormatDateTime($this->TriggerDateTime->CurrentValue, 8));
			$this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

			// OPUDateTime
			$this->OPUDateTime->EditAttrs["class"] = "form-control";
			$this->OPUDateTime->EditCustomAttributes = "";
			$this->OPUDateTime->EditValue = HtmlEncode(FormatDateTime($this->OPUDateTime->CurrentValue, 8));
			$this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

			// HoursAfterTrigger
			$this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
			$this->HoursAfterTrigger->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->EditValue = HtmlEncode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

			// SerumE2
			$this->SerumE2->EditAttrs["class"] = "form-control";
			$this->SerumE2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
			$this->SerumE2->EditValue = HtmlEncode($this->SerumE2->CurrentValue);
			$this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

			// SerumP4
			$this->SerumP4->EditAttrs["class"] = "form-control";
			$this->SerumP4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
			$this->SerumP4->EditValue = HtmlEncode($this->SerumP4->CurrentValue);
			$this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

			// FORT
			$this->FORT->EditAttrs["class"] = "form-control";
			$this->FORT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
			$this->FORT->EditValue = HtmlEncode($this->FORT->CurrentValue);
			$this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

			// ExperctedOocytes
			$this->ExperctedOocytes->EditAttrs["class"] = "form-control";
			$this->ExperctedOocytes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->EditValue = HtmlEncode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrieved->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->EditValue = HtmlEncode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
			$this->OocytesRetreivalRate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->EditValue = HtmlEncode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

			// Anesthesia
			$this->Anesthesia->EditAttrs["class"] = "form-control";
			$this->Anesthesia->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->EditValue = HtmlEncode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

			// TrialCannulation
			$this->TrialCannulation->EditAttrs["class"] = "form-control";
			$this->TrialCannulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

			// UCL
			$this->UCL->EditAttrs["class"] = "form-control";
			$this->UCL->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
			$this->UCL->EditValue = HtmlEncode($this->UCL->CurrentValue);
			$this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

			// Angle
			$this->Angle->EditAttrs["class"] = "form-control";
			$this->Angle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
			$this->Angle->EditValue = HtmlEncode($this->Angle->CurrentValue);
			$this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

			// EMS
			$this->EMS->EditAttrs["class"] = "form-control";
			$this->EMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
			$this->EMS->EditValue = HtmlEncode($this->EMS->CurrentValue);
			$this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

			// Cannulation
			$this->Cannulation->EditAttrs["class"] = "form-control";
			$this->Cannulation->EditCustomAttributes = "";
			$this->Cannulation->EditValue = $this->Cannulation->options(TRUE);

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->EditValue = HtmlEncode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

			// PlanT
			$this->PlanT->EditAttrs["class"] = "form-control";
			$this->PlanT->EditCustomAttributes = "";
			$this->PlanT->EditValue = $this->PlanT->options(TRUE);

			// ReviewDate
			$this->ReviewDate->EditAttrs["class"] = "form-control";
			$this->ReviewDate->EditCustomAttributes = "";
			$this->ReviewDate->EditValue = HtmlEncode(FormatDateTime($this->ReviewDate->CurrentValue, 8));
			$this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

			// ReviewDoctor
			$this->ReviewDoctor->EditAttrs["class"] = "form-control";
			$this->ReviewDoctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->EditValue = HtmlEncode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
			$this->TotalDoseOfStimulation->HrefValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
			$this->NumberOfDaysOfStimulation->HrefValue = "";

			// TriggerDateTime
			$this->TriggerDateTime->LinkCustomAttributes = "";
			$this->TriggerDateTime->HrefValue = "";

			// OPUDateTime
			$this->OPUDateTime->LinkCustomAttributes = "";
			$this->OPUDateTime->HrefValue = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->LinkCustomAttributes = "";
			$this->HoursAfterTrigger->HrefValue = "";

			// SerumE2
			$this->SerumE2->LinkCustomAttributes = "";
			$this->SerumE2->HrefValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->LinkCustomAttributes = "";
			$this->ExperctedOocytes->HrefValue = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrieved->HrefValue = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->LinkCustomAttributes = "";
			$this->OocytesRetreivalRate->HrefValue = "";

			// Anesthesia
			$this->Anesthesia->LinkCustomAttributes = "";
			$this->Anesthesia->HrefValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";

			// UCL
			$this->UCL->LinkCustomAttributes = "";
			$this->UCL->HrefValue = "";

			// Angle
			$this->Angle->LinkCustomAttributes = "";
			$this->Angle->HrefValue = "";

			// EMS
			$this->EMS->LinkCustomAttributes = "";
			$this->EMS->HrefValue = "";

			// Cannulation
			$this->Cannulation->LinkCustomAttributes = "";
			$this->Cannulation->HrefValue = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrievedd->HrefValue = "";

			// PlanT
			$this->PlanT->LinkCustomAttributes = "";
			$this->PlanT->HrefValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ARTCycle
			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
			$this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
			$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
			$this->TotalDoseOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->EditValue = HtmlEncode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

			// Protocol
			$this->Protocol->EditAttrs["class"] = "form-control";
			$this->Protocol->EditCustomAttributes = "";
			$this->Protocol->EditValue = $this->Protocol->options(TRUE);

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
			$this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->EditValue = HtmlEncode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

			// TriggerDateTime
			$this->TriggerDateTime->EditAttrs["class"] = "form-control";
			$this->TriggerDateTime->EditCustomAttributes = "";
			$this->TriggerDateTime->EditValue = HtmlEncode(FormatDateTime($this->TriggerDateTime->CurrentValue, 8));
			$this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

			// OPUDateTime
			$this->OPUDateTime->EditAttrs["class"] = "form-control";
			$this->OPUDateTime->EditCustomAttributes = "";
			$this->OPUDateTime->EditValue = HtmlEncode(FormatDateTime($this->OPUDateTime->CurrentValue, 8));
			$this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

			// HoursAfterTrigger
			$this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
			$this->HoursAfterTrigger->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->EditValue = HtmlEncode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

			// SerumE2
			$this->SerumE2->EditAttrs["class"] = "form-control";
			$this->SerumE2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
			$this->SerumE2->EditValue = HtmlEncode($this->SerumE2->CurrentValue);
			$this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

			// SerumP4
			$this->SerumP4->EditAttrs["class"] = "form-control";
			$this->SerumP4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
			$this->SerumP4->EditValue = HtmlEncode($this->SerumP4->CurrentValue);
			$this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

			// FORT
			$this->FORT->EditAttrs["class"] = "form-control";
			$this->FORT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
			$this->FORT->EditValue = HtmlEncode($this->FORT->CurrentValue);
			$this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

			// ExperctedOocytes
			$this->ExperctedOocytes->EditAttrs["class"] = "form-control";
			$this->ExperctedOocytes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->EditValue = HtmlEncode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrieved->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->EditValue = HtmlEncode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
			$this->OocytesRetreivalRate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->EditValue = HtmlEncode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

			// Anesthesia
			$this->Anesthesia->EditAttrs["class"] = "form-control";
			$this->Anesthesia->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->EditValue = HtmlEncode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

			// TrialCannulation
			$this->TrialCannulation->EditAttrs["class"] = "form-control";
			$this->TrialCannulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

			// UCL
			$this->UCL->EditAttrs["class"] = "form-control";
			$this->UCL->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
			$this->UCL->EditValue = HtmlEncode($this->UCL->CurrentValue);
			$this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

			// Angle
			$this->Angle->EditAttrs["class"] = "form-control";
			$this->Angle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
			$this->Angle->EditValue = HtmlEncode($this->Angle->CurrentValue);
			$this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

			// EMS
			$this->EMS->EditAttrs["class"] = "form-control";
			$this->EMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
			$this->EMS->EditValue = HtmlEncode($this->EMS->CurrentValue);
			$this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

			// Cannulation
			$this->Cannulation->EditAttrs["class"] = "form-control";
			$this->Cannulation->EditCustomAttributes = "";
			$this->Cannulation->EditValue = $this->Cannulation->options(TRUE);

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->EditValue = HtmlEncode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

			// PlanT
			$this->PlanT->EditAttrs["class"] = "form-control";
			$this->PlanT->EditCustomAttributes = "";
			$this->PlanT->EditValue = $this->PlanT->options(TRUE);

			// ReviewDate
			$this->ReviewDate->EditAttrs["class"] = "form-control";
			$this->ReviewDate->EditCustomAttributes = "";
			$this->ReviewDate->EditValue = HtmlEncode(FormatDateTime($this->ReviewDate->CurrentValue, 8));
			$this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

			// ReviewDoctor
			$this->ReviewDoctor->EditAttrs["class"] = "form-control";
			$this->ReviewDoctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->EditValue = HtmlEncode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
			$this->TotalDoseOfStimulation->HrefValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
			$this->NumberOfDaysOfStimulation->HrefValue = "";

			// TriggerDateTime
			$this->TriggerDateTime->LinkCustomAttributes = "";
			$this->TriggerDateTime->HrefValue = "";

			// OPUDateTime
			$this->OPUDateTime->LinkCustomAttributes = "";
			$this->OPUDateTime->HrefValue = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->LinkCustomAttributes = "";
			$this->HoursAfterTrigger->HrefValue = "";

			// SerumE2
			$this->SerumE2->LinkCustomAttributes = "";
			$this->SerumE2->HrefValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->LinkCustomAttributes = "";
			$this->ExperctedOocytes->HrefValue = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrieved->HrefValue = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->LinkCustomAttributes = "";
			$this->OocytesRetreivalRate->HrefValue = "";

			// Anesthesia
			$this->Anesthesia->LinkCustomAttributes = "";
			$this->Anesthesia->HrefValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";

			// UCL
			$this->UCL->LinkCustomAttributes = "";
			$this->UCL->HrefValue = "";

			// Angle
			$this->Angle->LinkCustomAttributes = "";
			$this->Angle->HrefValue = "";

			// EMS
			$this->EMS->LinkCustomAttributes = "";
			$this->EMS->HrefValue = "";

			// Cannulation
			$this->Cannulation->LinkCustomAttributes = "";
			$this->Cannulation->HrefValue = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrievedd->HrefValue = "";

			// PlanT
			$this->PlanT->LinkCustomAttributes = "";
			$this->PlanT->HrefValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->ARTCycle->Required) {
			if (!$this->ARTCycle->IsDetailKey && $this->ARTCycle->FormValue != NULL && $this->ARTCycle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
			}
		}
		if ($this->Consultant->Required) {
			if (!$this->Consultant->IsDetailKey && $this->Consultant->FormValue != NULL && $this->Consultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
			}
		}
		if ($this->TotalDoseOfStimulation->Required) {
			if (!$this->TotalDoseOfStimulation->IsDetailKey && $this->TotalDoseOfStimulation->FormValue != NULL && $this->TotalDoseOfStimulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalDoseOfStimulation->caption(), $this->TotalDoseOfStimulation->RequiredErrorMessage));
			}
		}
		if ($this->Protocol->Required) {
			if (!$this->Protocol->IsDetailKey && $this->Protocol->FormValue != NULL && $this->Protocol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Protocol->caption(), $this->Protocol->RequiredErrorMessage));
			}
		}
		if ($this->NumberOfDaysOfStimulation->Required) {
			if (!$this->NumberOfDaysOfStimulation->IsDetailKey && $this->NumberOfDaysOfStimulation->FormValue != NULL && $this->NumberOfDaysOfStimulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NumberOfDaysOfStimulation->caption(), $this->NumberOfDaysOfStimulation->RequiredErrorMessage));
			}
		}
		if ($this->TriggerDateTime->Required) {
			if (!$this->TriggerDateTime->IsDetailKey && $this->TriggerDateTime->FormValue != NULL && $this->TriggerDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TriggerDateTime->caption(), $this->TriggerDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->TriggerDateTime->FormValue)) {
			AddMessage($FormError, $this->TriggerDateTime->errorMessage());
		}
		if ($this->OPUDateTime->Required) {
			if (!$this->OPUDateTime->IsDetailKey && $this->OPUDateTime->FormValue != NULL && $this->OPUDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPUDateTime->caption(), $this->OPUDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->OPUDateTime->FormValue)) {
			AddMessage($FormError, $this->OPUDateTime->errorMessage());
		}
		if ($this->HoursAfterTrigger->Required) {
			if (!$this->HoursAfterTrigger->IsDetailKey && $this->HoursAfterTrigger->FormValue != NULL && $this->HoursAfterTrigger->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HoursAfterTrigger->caption(), $this->HoursAfterTrigger->RequiredErrorMessage));
			}
		}
		if ($this->SerumE2->Required) {
			if (!$this->SerumE2->IsDetailKey && $this->SerumE2->FormValue != NULL && $this->SerumE2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerumE2->caption(), $this->SerumE2->RequiredErrorMessage));
			}
		}
		if ($this->SerumP4->Required) {
			if (!$this->SerumP4->IsDetailKey && $this->SerumP4->FormValue != NULL && $this->SerumP4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerumP4->caption(), $this->SerumP4->RequiredErrorMessage));
			}
		}
		if ($this->FORT->Required) {
			if (!$this->FORT->IsDetailKey && $this->FORT->FormValue != NULL && $this->FORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FORT->caption(), $this->FORT->RequiredErrorMessage));
			}
		}
		if ($this->ExperctedOocytes->Required) {
			if (!$this->ExperctedOocytes->IsDetailKey && $this->ExperctedOocytes->FormValue != NULL && $this->ExperctedOocytes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExperctedOocytes->caption(), $this->ExperctedOocytes->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytesRetrieved->Required) {
			if (!$this->NoOfOocytesRetrieved->IsDetailKey && $this->NoOfOocytesRetrieved->FormValue != NULL && $this->NoOfOocytesRetrieved->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytesRetrieved->caption(), $this->NoOfOocytesRetrieved->RequiredErrorMessage));
			}
		}
		if ($this->OocytesRetreivalRate->Required) {
			if (!$this->OocytesRetreivalRate->IsDetailKey && $this->OocytesRetreivalRate->FormValue != NULL && $this->OocytesRetreivalRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesRetreivalRate->caption(), $this->OocytesRetreivalRate->RequiredErrorMessage));
			}
		}
		if ($this->Anesthesia->Required) {
			if (!$this->Anesthesia->IsDetailKey && $this->Anesthesia->FormValue != NULL && $this->Anesthesia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anesthesia->caption(), $this->Anesthesia->RequiredErrorMessage));
			}
		}
		if ($this->TrialCannulation->Required) {
			if (!$this->TrialCannulation->IsDetailKey && $this->TrialCannulation->FormValue != NULL && $this->TrialCannulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
			}
		}
		if ($this->UCL->Required) {
			if (!$this->UCL->IsDetailKey && $this->UCL->FormValue != NULL && $this->UCL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UCL->caption(), $this->UCL->RequiredErrorMessage));
			}
		}
		if ($this->Angle->Required) {
			if (!$this->Angle->IsDetailKey && $this->Angle->FormValue != NULL && $this->Angle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Angle->caption(), $this->Angle->RequiredErrorMessage));
			}
		}
		if ($this->EMS->Required) {
			if (!$this->EMS->IsDetailKey && $this->EMS->FormValue != NULL && $this->EMS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EMS->caption(), $this->EMS->RequiredErrorMessage));
			}
		}
		if ($this->Cannulation->Required) {
			if (!$this->Cannulation->IsDetailKey && $this->Cannulation->FormValue != NULL && $this->Cannulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cannulation->caption(), $this->Cannulation->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureT->Required) {
			if (!$this->ProcedureT->IsDetailKey && $this->ProcedureT->FormValue != NULL && $this->ProcedureT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureT->caption(), $this->ProcedureT->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytesRetrievedd->Required) {
			if (!$this->NoOfOocytesRetrievedd->IsDetailKey && $this->NoOfOocytesRetrievedd->FormValue != NULL && $this->NoOfOocytesRetrievedd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytesRetrievedd->caption(), $this->NoOfOocytesRetrievedd->RequiredErrorMessage));
			}
		}
		if ($this->CourseInHospital->Required) {
			if (!$this->CourseInHospital->IsDetailKey && $this->CourseInHospital->FormValue != NULL && $this->CourseInHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CourseInHospital->caption(), $this->CourseInHospital->RequiredErrorMessage));
			}
		}
		if ($this->DischargeAdvise->Required) {
			if (!$this->DischargeAdvise->IsDetailKey && $this->DischargeAdvise->FormValue != NULL && $this->DischargeAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DischargeAdvise->caption(), $this->DischargeAdvise->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpAdvise->Required) {
			if (!$this->FollowUpAdvise->IsDetailKey && $this->FollowUpAdvise->FormValue != NULL && $this->FollowUpAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpAdvise->caption(), $this->FollowUpAdvise->RequiredErrorMessage));
			}
		}
		if ($this->PlanT->Required) {
			if (!$this->PlanT->IsDetailKey && $this->PlanT->FormValue != NULL && $this->PlanT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PlanT->caption(), $this->PlanT->RequiredErrorMessage));
			}
		}
		if ($this->ReviewDate->Required) {
			if (!$this->ReviewDate->IsDetailKey && $this->ReviewDate->FormValue != NULL && $this->ReviewDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReviewDate->caption(), $this->ReviewDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReviewDate->FormValue)) {
			AddMessage($FormError, $this->ReviewDate->errorMessage());
		}
		if ($this->ReviewDoctor->Required) {
			if (!$this->ReviewDoctor->IsDetailKey && $this->ReviewDoctor->FormValue != NULL && $this->ReviewDoctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReviewDoctor->caption(), $this->ReviewDoctor->RequiredErrorMessage));
			}
		}
		if ($this->TemplateProcedure->Required) {
			if (!$this->TemplateProcedure->IsDetailKey && $this->TemplateProcedure->FormValue != NULL && $this->TemplateProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateProcedure->caption(), $this->TemplateProcedure->RequiredErrorMessage));
			}
		}
		if ($this->TemplateCourseInHospital->Required) {
			if (!$this->TemplateCourseInHospital->IsDetailKey && $this->TemplateCourseInHospital->FormValue != NULL && $this->TemplateCourseInHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateCourseInHospital->caption(), $this->TemplateCourseInHospital->RequiredErrorMessage));
			}
		}
		if ($this->TemplateDischargeAdvise->Required) {
			if (!$this->TemplateDischargeAdvise->IsDetailKey && $this->TemplateDischargeAdvise->FormValue != NULL && $this->TemplateDischargeAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateDischargeAdvise->caption(), $this->TemplateDischargeAdvise->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpAdvise->Required) {
			if (!$this->TemplateFollowUpAdvise->IsDetailKey && $this->TemplateFollowUpAdvise->FormValue != NULL && $this->TemplateFollowUpAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpAdvise->caption(), $this->TemplateFollowUpAdvise->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// RIDNo
			$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, $this->RIDNo->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// ARTCycle
			$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, $this->ARTCycle->ReadOnly);

			// Consultant
			$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, $this->Consultant->ReadOnly);

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->setDbValueDef($rsnew, $this->TotalDoseOfStimulation->CurrentValue, NULL, $this->TotalDoseOfStimulation->ReadOnly);

			// Protocol
			$this->Protocol->setDbValueDef($rsnew, $this->Protocol->CurrentValue, NULL, $this->Protocol->ReadOnly);

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->setDbValueDef($rsnew, $this->NumberOfDaysOfStimulation->CurrentValue, NULL, $this->NumberOfDaysOfStimulation->ReadOnly);

			// TriggerDateTime
			$this->TriggerDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0), NULL, $this->TriggerDateTime->ReadOnly);

			// OPUDateTime
			$this->OPUDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDateTime->CurrentValue, 0), NULL, $this->OPUDateTime->ReadOnly);

			// HoursAfterTrigger
			$this->HoursAfterTrigger->setDbValueDef($rsnew, $this->HoursAfterTrigger->CurrentValue, NULL, $this->HoursAfterTrigger->ReadOnly);

			// SerumE2
			$this->SerumE2->setDbValueDef($rsnew, $this->SerumE2->CurrentValue, NULL, $this->SerumE2->ReadOnly);

			// SerumP4
			$this->SerumP4->setDbValueDef($rsnew, $this->SerumP4->CurrentValue, NULL, $this->SerumP4->ReadOnly);

			// FORT
			$this->FORT->setDbValueDef($rsnew, $this->FORT->CurrentValue, NULL, $this->FORT->ReadOnly);

			// ExperctedOocytes
			$this->ExperctedOocytes->setDbValueDef($rsnew, $this->ExperctedOocytes->CurrentValue, NULL, $this->ExperctedOocytes->ReadOnly);

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->setDbValueDef($rsnew, $this->NoOfOocytesRetrieved->CurrentValue, NULL, $this->NoOfOocytesRetrieved->ReadOnly);

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->setDbValueDef($rsnew, $this->OocytesRetreivalRate->CurrentValue, NULL, $this->OocytesRetreivalRate->ReadOnly);

			// Anesthesia
			$this->Anesthesia->setDbValueDef($rsnew, $this->Anesthesia->CurrentValue, NULL, $this->Anesthesia->ReadOnly);

			// TrialCannulation
			$this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, NULL, $this->TrialCannulation->ReadOnly);

			// UCL
			$this->UCL->setDbValueDef($rsnew, $this->UCL->CurrentValue, NULL, $this->UCL->ReadOnly);

			// Angle
			$this->Angle->setDbValueDef($rsnew, $this->Angle->CurrentValue, NULL, $this->Angle->ReadOnly);

			// EMS
			$this->EMS->setDbValueDef($rsnew, $this->EMS->CurrentValue, NULL, $this->EMS->ReadOnly);

			// Cannulation
			$this->Cannulation->setDbValueDef($rsnew, $this->Cannulation->CurrentValue, NULL, $this->Cannulation->ReadOnly);

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->setDbValueDef($rsnew, $this->NoOfOocytesRetrievedd->CurrentValue, NULL, $this->NoOfOocytesRetrievedd->ReadOnly);

			// PlanT
			$this->PlanT->setDbValueDef($rsnew, $this->PlanT->CurrentValue, NULL, $this->PlanT->ReadOnly);

			// ReviewDate
			$this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), NULL, $this->ReviewDate->ReadOnly);

			// ReviewDoctor
			$this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, NULL, $this->ReviewDoctor->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Set up foreign key field value from Session
			if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// ARTCycle
		$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, FALSE);

		// Consultant
		$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, FALSE);

		// TotalDoseOfStimulation
		$this->TotalDoseOfStimulation->setDbValueDef($rsnew, $this->TotalDoseOfStimulation->CurrentValue, NULL, FALSE);

		// Protocol
		$this->Protocol->setDbValueDef($rsnew, $this->Protocol->CurrentValue, NULL, FALSE);

		// NumberOfDaysOfStimulation
		$this->NumberOfDaysOfStimulation->setDbValueDef($rsnew, $this->NumberOfDaysOfStimulation->CurrentValue, NULL, FALSE);

		// TriggerDateTime
		$this->TriggerDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0), NULL, FALSE);

		// OPUDateTime
		$this->OPUDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDateTime->CurrentValue, 0), NULL, FALSE);

		// HoursAfterTrigger
		$this->HoursAfterTrigger->setDbValueDef($rsnew, $this->HoursAfterTrigger->CurrentValue, NULL, FALSE);

		// SerumE2
		$this->SerumE2->setDbValueDef($rsnew, $this->SerumE2->CurrentValue, NULL, FALSE);

		// SerumP4
		$this->SerumP4->setDbValueDef($rsnew, $this->SerumP4->CurrentValue, NULL, FALSE);

		// FORT
		$this->FORT->setDbValueDef($rsnew, $this->FORT->CurrentValue, NULL, FALSE);

		// ExperctedOocytes
		$this->ExperctedOocytes->setDbValueDef($rsnew, $this->ExperctedOocytes->CurrentValue, NULL, FALSE);

		// NoOfOocytesRetrieved
		$this->NoOfOocytesRetrieved->setDbValueDef($rsnew, $this->NoOfOocytesRetrieved->CurrentValue, NULL, FALSE);

		// OocytesRetreivalRate
		$this->OocytesRetreivalRate->setDbValueDef($rsnew, $this->OocytesRetreivalRate->CurrentValue, NULL, FALSE);

		// Anesthesia
		$this->Anesthesia->setDbValueDef($rsnew, $this->Anesthesia->CurrentValue, NULL, FALSE);

		// TrialCannulation
		$this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, NULL, FALSE);

		// UCL
		$this->UCL->setDbValueDef($rsnew, $this->UCL->CurrentValue, NULL, FALSE);

		// Angle
		$this->Angle->setDbValueDef($rsnew, $this->Angle->CurrentValue, NULL, FALSE);

		// EMS
		$this->EMS->setDbValueDef($rsnew, $this->EMS->CurrentValue, NULL, FALSE);

		// Cannulation
		$this->Cannulation->setDbValueDef($rsnew, $this->Cannulation->CurrentValue, NULL, FALSE);

		// NoOfOocytesRetrievedd
		$this->NoOfOocytesRetrievedd->setDbValueDef($rsnew, $this->NoOfOocytesRetrievedd->CurrentValue, NULL, FALSE);

		// PlanT
		$this->PlanT->setDbValueDef($rsnew, $this->PlanT->CurrentValue, NULL, FALSE);

		// ReviewDate
		$this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), NULL, FALSE);

		// ReviewDoctor
		$this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{

		// Hide foreign keys
		$masterTblVar = $this->getCurrentMasterTable();
		if ($masterTblVar == "ivf_treatment_plan") {
			$this->RIDNo->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->TidNo->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_TemplateProcedure":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Procedure'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateCourseInHospital":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Course In Hospital'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateDischargeAdvise":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Discharge Advise'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpAdvise":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Follow Up Advise'";
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
						case "x_TemplateProcedure":
							break;
						case "x_TemplateCourseInHospital":
							break;
						case "x_TemplateDischargeAdvise":
							break;
						case "x_TemplateFollowUpAdvise":
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
}
?>
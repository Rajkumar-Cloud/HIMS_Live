<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class _appointment_scheduler_grid extends _appointment_scheduler
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'appointment_scheduler';

	// Page object name
	public $PageObjName = "_appointment_scheduler_grid";

	// Grid form hidden field names
	public $FormName = "f_appointment_schedulergrid";
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

		// Table object (_appointment_scheduler)
		if (!isset($GLOBALS["_appointment_scheduler"]) || get_class($GLOBALS["_appointment_scheduler"]) == PROJECT_NAMESPACE . "_appointment_scheduler") {
			$GLOBALS["_appointment_scheduler"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["_appointment_scheduler"];

		}
		$this->AddUrl = "_appointment_scheduleradd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_scheduler');

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
		global $EXPORT, $_appointment_scheduler;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($_appointment_scheduler);
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
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdDateTime->Visible = FALSE;
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
		$this->start_date->setVisibility();
		$this->end_date->setVisibility();
		$this->patientID->setVisibility();
		$this->patientName->setVisibility();
		$this->DoctorID->setVisibility();
		$this->DoctorName->setVisibility();
		$this->AppointmentStatus->setVisibility();
		$this->status->setVisibility();
		$this->DoctorCode->setVisibility();
		$this->Department->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->text->setVisibility();
		$this->appointment_status->setVisibility();
		$this->PId->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->SchEmail->setVisibility();
		$this->appointment_type->setVisibility();
		$this->Notified->setVisibility();
		$this->Purpose->setVisibility();
		$this->Notes->setVisibility();
		$this->PatientType->setVisibility();
		$this->Referal->setVisibility();
		$this->paymentType->setVisibility();
		$this->tittle->Visible = FALSE;
		$this->gendar->Visible = FALSE;
		$this->Dob->Visible = FALSE;
		$this->Age->Visible = FALSE;
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->createdBy->setVisibility();
		$this->createdDateTime->setVisibility();
		$this->PatientTypee->setVisibility();
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
		$this->setupLookupOptions($this->patientID);
		$this->setupLookupOptions($this->DoctorName);
		$this->setupLookupOptions($this->Referal);
		$this->setupLookupOptions($this->tittle);
		$this->setupLookupOptions($this->gendar);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->PatientTypee);

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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "doctors") {
			global $doctors;
			$rsmaster = $doctors->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("doctorslist.php"); // Return to master page
			} else {
				$doctors->loadListRowValues($rsmaster);
				$doctors->RowType = ROWTYPE_MASTER; // Master row
				$doctors->renderListRow();
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
		if ($CurrentForm->hasValue("x_start_date") && $CurrentForm->hasValue("o_start_date") && $this->start_date->CurrentValue <> $this->start_date->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_end_date") && $CurrentForm->hasValue("o_end_date") && $this->end_date->CurrentValue <> $this->end_date->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patientID") && $CurrentForm->hasValue("o_patientID") && $this->patientID->CurrentValue <> $this->patientID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patientName") && $CurrentForm->hasValue("o_patientName") && $this->patientName->CurrentValue <> $this->patientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DoctorID") && $CurrentForm->hasValue("o_DoctorID") && $this->DoctorID->CurrentValue <> $this->DoctorID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DoctorName") && $CurrentForm->hasValue("o_DoctorName") && $this->DoctorName->CurrentValue <> $this->DoctorName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AppointmentStatus") && $CurrentForm->hasValue("o_AppointmentStatus") && $this->AppointmentStatus->CurrentValue <> $this->AppointmentStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue <> $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DoctorCode") && $CurrentForm->hasValue("o_DoctorCode") && $this->DoctorCode->CurrentValue <> $this->DoctorCode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue <> $this->Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_scheduler_id") && $CurrentForm->hasValue("o_scheduler_id") && $this->scheduler_id->CurrentValue <> $this->scheduler_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_text") && $CurrentForm->hasValue("o_text") && $this->text->CurrentValue <> $this->text->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_appointment_status") && $CurrentForm->hasValue("o_appointment_status") && $this->appointment_status->CurrentValue <> $this->appointment_status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PId") && $CurrentForm->hasValue("o_PId") && $this->PId->CurrentValue <> $this->PId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MobileNumber") && $CurrentForm->hasValue("o_MobileNumber") && $this->MobileNumber->CurrentValue <> $this->MobileNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SchEmail") && $CurrentForm->hasValue("o_SchEmail") && $this->SchEmail->CurrentValue <> $this->SchEmail->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_appointment_type") && $CurrentForm->hasValue("o_appointment_type") && $this->appointment_type->CurrentValue <> $this->appointment_type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Notified") && $CurrentForm->hasValue("o_Notified") && $this->Notified->CurrentValue <> $this->Notified->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Purpose") && $CurrentForm->hasValue("o_Purpose") && $this->Purpose->CurrentValue <> $this->Purpose->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Notes") && $CurrentForm->hasValue("o_Notes") && $this->Notes->CurrentValue <> $this->Notes->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientType") && $CurrentForm->hasValue("o_PatientType") && $this->PatientType->CurrentValue <> $this->PatientType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Referal") && $CurrentForm->hasValue("o_Referal") && $this->Referal->CurrentValue <> $this->Referal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_paymentType") && $CurrentForm->hasValue("o_paymentType") && $this->paymentType->CurrentValue <> $this->paymentType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_WhereDidYouHear") && $CurrentForm->hasValue("o_WhereDidYouHear") && $this->WhereDidYouHear->CurrentValue <> $this->WhereDidYouHear->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientTypee") && $CurrentForm->hasValue("o_PatientTypee") && $this->PatientTypee->CurrentValue <> $this->PatientTypee->OldValue)
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->DoctorID->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->setSessionOrderByList($orderBy);
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
		$this->start_date->CurrentValue = NULL;
		$this->start_date->OldValue = $this->start_date->CurrentValue;
		$this->end_date->CurrentValue = NULL;
		$this->end_date->OldValue = $this->end_date->CurrentValue;
		$this->patientID->CurrentValue = NULL;
		$this->patientID->OldValue = $this->patientID->CurrentValue;
		$this->patientName->CurrentValue = NULL;
		$this->patientName->OldValue = $this->patientName->CurrentValue;
		$this->DoctorID->CurrentValue = NULL;
		$this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
		$this->DoctorName->CurrentValue = NULL;
		$this->DoctorName->OldValue = $this->DoctorName->CurrentValue;
		$this->AppointmentStatus->CurrentValue = NULL;
		$this->AppointmentStatus->OldValue = $this->AppointmentStatus->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->DoctorCode->CurrentValue = NULL;
		$this->DoctorCode->OldValue = $this->DoctorCode->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->scheduler_id->CurrentValue = NULL;
		$this->scheduler_id->OldValue = $this->scheduler_id->CurrentValue;
		$this->text->CurrentValue = NULL;
		$this->text->OldValue = $this->text->CurrentValue;
		$this->appointment_status->CurrentValue = NULL;
		$this->appointment_status->OldValue = $this->appointment_status->CurrentValue;
		$this->PId->CurrentValue = NULL;
		$this->PId->OldValue = $this->PId->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->SchEmail->CurrentValue = NULL;
		$this->SchEmail->OldValue = $this->SchEmail->CurrentValue;
		$this->appointment_type->CurrentValue = NULL;
		$this->appointment_type->OldValue = $this->appointment_type->CurrentValue;
		$this->Notified->CurrentValue = NULL;
		$this->Notified->OldValue = $this->Notified->CurrentValue;
		$this->Purpose->CurrentValue = NULL;
		$this->Purpose->OldValue = $this->Purpose->CurrentValue;
		$this->Notes->CurrentValue = NULL;
		$this->Notes->OldValue = $this->Notes->CurrentValue;
		$this->PatientType->CurrentValue = NULL;
		$this->PatientType->OldValue = $this->PatientType->CurrentValue;
		$this->Referal->CurrentValue = NULL;
		$this->Referal->OldValue = $this->Referal->CurrentValue;
		$this->paymentType->CurrentValue = NULL;
		$this->paymentType->OldValue = $this->paymentType->CurrentValue;
		$this->tittle->CurrentValue = NULL;
		$this->tittle->OldValue = $this->tittle->CurrentValue;
		$this->gendar->CurrentValue = NULL;
		$this->gendar->OldValue = $this->gendar->CurrentValue;
		$this->Dob->CurrentValue = NULL;
		$this->Dob->OldValue = $this->Dob->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->WhereDidYouHear->CurrentValue = NULL;
		$this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->createdBy->CurrentValue = NULL;
		$this->createdBy->OldValue = $this->createdBy->CurrentValue;
		$this->createdDateTime->CurrentValue = NULL;
		$this->createdDateTime->OldValue = $this->createdDateTime->CurrentValue;
		$this->PatientTypee->CurrentValue = NULL;
		$this->PatientTypee->OldValue = $this->PatientTypee->CurrentValue;
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

		// Check field name 'start_date' first before field var 'x_start_date'
		$val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
		if (!$this->start_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_date->Visible = FALSE; // Disable update for API request
			else
				$this->start_date->setFormValue($val);
			$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		}
		$this->start_date->setOldValue($CurrentForm->getValue("o_start_date"));

		// Check field name 'end_date' first before field var 'x_end_date'
		$val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
		if (!$this->end_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_date->Visible = FALSE; // Disable update for API request
			else
				$this->end_date->setFormValue($val);
			$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		}
		$this->end_date->setOldValue($CurrentForm->getValue("o_end_date"));

		// Check field name 'patientID' first before field var 'x_patientID'
		$val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
		if (!$this->patientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientID->Visible = FALSE; // Disable update for API request
			else
				$this->patientID->setFormValue($val);
		}
		$this->patientID->setOldValue($CurrentForm->getValue("o_patientID"));

		// Check field name 'patientName' first before field var 'x_patientName'
		$val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
		if (!$this->patientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientName->Visible = FALSE; // Disable update for API request
			else
				$this->patientName->setFormValue($val);
		}
		$this->patientName->setOldValue($CurrentForm->getValue("o_patientName"));

		// Check field name 'DoctorID' first before field var 'x_DoctorID'
		$val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
		if (!$this->DoctorID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorID->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorID->setFormValue($val);
		}
		$this->DoctorID->setOldValue($CurrentForm->getValue("o_DoctorID"));

		// Check field name 'DoctorName' first before field var 'x_DoctorName'
		$val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
		if (!$this->DoctorName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorName->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorName->setFormValue($val);
		}
		$this->DoctorName->setOldValue($CurrentForm->getValue("o_DoctorName"));

		// Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
		$val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
		if (!$this->AppointmentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AppointmentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->AppointmentStatus->setFormValue($val);
		}
		$this->AppointmentStatus->setOldValue($CurrentForm->getValue("o_AppointmentStatus"));

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->setOldValue($CurrentForm->getValue("o_status"));

		// Check field name 'DoctorCode' first before field var 'x_DoctorCode'
		$val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
		if (!$this->DoctorCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorCode->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorCode->setFormValue($val);
		}
		$this->DoctorCode->setOldValue($CurrentForm->getValue("o_DoctorCode"));

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		$this->Department->setOldValue($CurrentForm->getValue("o_Department"));

		// Check field name 'scheduler_id' first before field var 'x_scheduler_id'
		$val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
		if (!$this->scheduler_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scheduler_id->Visible = FALSE; // Disable update for API request
			else
				$this->scheduler_id->setFormValue($val);
		}
		$this->scheduler_id->setOldValue($CurrentForm->getValue("o_scheduler_id"));

		// Check field name 'text' first before field var 'x_text'
		$val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
		if (!$this->text->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->text->Visible = FALSE; // Disable update for API request
			else
				$this->text->setFormValue($val);
		}
		$this->text->setOldValue($CurrentForm->getValue("o_text"));

		// Check field name 'appointment_status' first before field var 'x_appointment_status'
		$val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
		if (!$this->appointment_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_status->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_status->setFormValue($val);
		}
		$this->appointment_status->setOldValue($CurrentForm->getValue("o_appointment_status"));

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}
		$this->PId->setOldValue($CurrentForm->getValue("o_PId"));

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}
		$this->MobileNumber->setOldValue($CurrentForm->getValue("o_MobileNumber"));

		// Check field name 'SchEmail' first before field var 'x_SchEmail'
		$val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
		if (!$this->SchEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SchEmail->Visible = FALSE; // Disable update for API request
			else
				$this->SchEmail->setFormValue($val);
		}
		$this->SchEmail->setOldValue($CurrentForm->getValue("o_SchEmail"));

		// Check field name 'appointment_type' first before field var 'x_appointment_type'
		$val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
		if (!$this->appointment_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_type->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_type->setFormValue($val);
		}
		$this->appointment_type->setOldValue($CurrentForm->getValue("o_appointment_type"));

		// Check field name 'Notified' first before field var 'x_Notified'
		$val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
		if (!$this->Notified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notified->Visible = FALSE; // Disable update for API request
			else
				$this->Notified->setFormValue($val);
		}
		$this->Notified->setOldValue($CurrentForm->getValue("o_Notified"));

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}
		$this->Purpose->setOldValue($CurrentForm->getValue("o_Purpose"));

		// Check field name 'Notes' first before field var 'x_Notes'
		$val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
		if (!$this->Notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notes->Visible = FALSE; // Disable update for API request
			else
				$this->Notes->setFormValue($val);
		}
		$this->Notes->setOldValue($CurrentForm->getValue("o_Notes"));

		// Check field name 'PatientType' first before field var 'x_PatientType'
		$val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
		if (!$this->PatientType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientType->Visible = FALSE; // Disable update for API request
			else
				$this->PatientType->setFormValue($val);
		}
		$this->PatientType->setOldValue($CurrentForm->getValue("o_PatientType"));

		// Check field name 'Referal' first before field var 'x_Referal'
		$val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
		if (!$this->Referal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Referal->Visible = FALSE; // Disable update for API request
			else
				$this->Referal->setFormValue($val);
		}
		$this->Referal->setOldValue($CurrentForm->getValue("o_Referal"));

		// Check field name 'paymentType' first before field var 'x_paymentType'
		$val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
		if (!$this->paymentType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->paymentType->Visible = FALSE; // Disable update for API request
			else
				$this->paymentType->setFormValue($val);
		}
		$this->paymentType->setOldValue($CurrentForm->getValue("o_paymentType"));

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WhereDidYouHear->Visible = FALSE; // Disable update for API request
			else
				$this->WhereDidYouHear->setFormValue($val);
		}
		$this->WhereDidYouHear->setOldValue($CurrentForm->getValue("o_WhereDidYouHear"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));

		// Check field name 'createdBy' first before field var 'x_createdBy'
		$val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
		if (!$this->createdBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdBy->Visible = FALSE; // Disable update for API request
			else
				$this->createdBy->setFormValue($val);
		}
		$this->createdBy->setOldValue($CurrentForm->getValue("o_createdBy"));

		// Check field name 'createdDateTime' first before field var 'x_createdDateTime'
		$val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
		if (!$this->createdDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDateTime->setFormValue($val);
			$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		}
		$this->createdDateTime->setOldValue($CurrentForm->getValue("o_createdDateTime"));

		// Check field name 'PatientTypee' first before field var 'x_PatientTypee'
		$val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
		if (!$this->PatientTypee->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientTypee->Visible = FALSE; // Disable update for API request
			else
				$this->PatientTypee->setFormValue($val);
		}
		$this->PatientTypee->setOldValue($CurrentForm->getValue("o_PatientTypee"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->start_date->CurrentValue = $this->start_date->FormValue;
		$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		$this->end_date->CurrentValue = $this->end_date->FormValue;
		$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		$this->patientID->CurrentValue = $this->patientID->FormValue;
		$this->patientName->CurrentValue = $this->patientName->FormValue;
		$this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
		$this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
		$this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
		$this->text->CurrentValue = $this->text->FormValue;
		$this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
		$this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
		$this->Notified->CurrentValue = $this->Notified->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->Notes->CurrentValue = $this->Notes->FormValue;
		$this->PatientType->CurrentValue = $this->PatientType->FormValue;
		$this->Referal->CurrentValue = $this->Referal->FormValue;
		$this->paymentType->CurrentValue = $this->paymentType->FormValue;
		$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->createdBy->CurrentValue = $this->createdBy->FormValue;
		$this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
		$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		$this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
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
		$this->start_date->setDbValue($row['start_date']);
		$this->end_date->setDbValue($row['end_date']);
		$this->patientID->setDbValue($row['patientID']);
		if (array_key_exists('EV__patientID', $rs->fields)) {
			$this->patientID->VirtualValue = $rs->fields('EV__patientID'); // Set up virtual field value
		} else {
			$this->patientID->VirtualValue = ""; // Clear value
		}
		$this->patientName->setDbValue($row['patientName']);
		$this->DoctorID->setDbValue($row['DoctorID']);
		$this->DoctorName->setDbValue($row['DoctorName']);
		$this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
		$this->status->setDbValue($row['status']);
		$this->DoctorCode->setDbValue($row['DoctorCode']);
		$this->Department->setDbValue($row['Department']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->text->setDbValue($row['text']);
		$this->appointment_status->setDbValue($row['appointment_status']);
		$this->PId->setDbValue($row['PId']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->SchEmail->setDbValue($row['SchEmail']);
		$this->appointment_type->setDbValue($row['appointment_type']);
		$this->Notified->setDbValue($row['Notified']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->Notes->setDbValue($row['Notes']);
		$this->PatientType->setDbValue($row['PatientType']);
		$this->Referal->setDbValue($row['Referal']);
		if (array_key_exists('EV__Referal', $rs->fields)) {
			$this->Referal->VirtualValue = $rs->fields('EV__Referal'); // Set up virtual field value
		} else {
			$this->Referal->VirtualValue = ""; // Clear value
		}
		$this->paymentType->setDbValue($row['paymentType']);
		$this->tittle->setDbValue($row['tittle']);
		$this->gendar->setDbValue($row['gendar']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Age->setDbValue($row['Age']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdBy->setDbValue($row['createdBy']);
		$this->createdDateTime->setDbValue($row['createdDateTime']);
		$this->PatientTypee->setDbValue($row['PatientTypee']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['start_date'] = $this->start_date->CurrentValue;
		$row['end_date'] = $this->end_date->CurrentValue;
		$row['patientID'] = $this->patientID->CurrentValue;
		$row['patientName'] = $this->patientName->CurrentValue;
		$row['DoctorID'] = $this->DoctorID->CurrentValue;
		$row['DoctorName'] = $this->DoctorName->CurrentValue;
		$row['AppointmentStatus'] = $this->AppointmentStatus->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['DoctorCode'] = $this->DoctorCode->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['scheduler_id'] = $this->scheduler_id->CurrentValue;
		$row['text'] = $this->text->CurrentValue;
		$row['appointment_status'] = $this->appointment_status->CurrentValue;
		$row['PId'] = $this->PId->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['SchEmail'] = $this->SchEmail->CurrentValue;
		$row['appointment_type'] = $this->appointment_type->CurrentValue;
		$row['Notified'] = $this->Notified->CurrentValue;
		$row['Purpose'] = $this->Purpose->CurrentValue;
		$row['Notes'] = $this->Notes->CurrentValue;
		$row['PatientType'] = $this->PatientType->CurrentValue;
		$row['Referal'] = $this->Referal->CurrentValue;
		$row['paymentType'] = $this->paymentType->CurrentValue;
		$row['tittle'] = $this->tittle->CurrentValue;
		$row['gendar'] = $this->gendar->CurrentValue;
		$row['Dob'] = $this->Dob->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['createdBy'] = $this->createdBy->CurrentValue;
		$row['createdDateTime'] = $this->createdDateTime->CurrentValue;
		$row['PatientTypee'] = $this->PatientTypee->CurrentValue;
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
		// start_date
		// end_date
		// patientID
		// patientName
		// DoctorID
		// DoctorName
		// AppointmentStatus
		// status
		// DoctorCode
		// Department
		// scheduler_id
		// text
		// appointment_status
		// PId
		// MobileNumber
		// SchEmail
		// appointment_type
		// Notified
		// Purpose
		// Notes
		// PatientType
		// Referal
		// paymentType
		// tittle
		// gendar
		// Dob
		// Age
		// WhereDidYouHear
		// HospID
		// createdBy
		// createdDateTime
		// PatientTypee

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
			$this->start_date->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
			$this->end_date->ViewCustomAttributes = "";

			// patientID
			if ($this->patientID->VirtualValue <> "") {
				$this->patientID->ViewValue = $this->patientID->VirtualValue;
			} else {
			$curVal = strval($this->patientID->CurrentValue);
			if ($curVal <> "") {
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
				if ($this->patientID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patientID->ViewValue = $this->patientID->CurrentValue;
					}
				}
			} else {
				$this->patientID->ViewValue = NULL;
			}
			}
			$this->patientID->ViewCustomAttributes = "";

			// patientName
			$this->patientName->ViewValue = $this->patientName->CurrentValue;
			$this->patientName->ViewCustomAttributes = "";

			// DoctorID
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";

			// DoctorName
			$curVal = strval($this->DoctorName->CurrentValue);
			if ($curVal <> "") {
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
				if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
					}
				}
			} else {
				$this->DoctorName->ViewValue = NULL;
			}
			$this->DoctorName->ViewCustomAttributes = "";

			// AppointmentStatus
			$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
			$this->AppointmentStatus->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->status->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// DoctorCode
			$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
			$this->DoctorCode->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->ViewValue = $this->text->CurrentValue;
			$this->text->ViewCustomAttributes = "";

			// appointment_status
			$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
			$this->appointment_status->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// SchEmail
			$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
			$this->SchEmail->ViewCustomAttributes = "";

			// appointment_type
			if (strval($this->appointment_type->CurrentValue) <> "") {
				$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
			} else {
				$this->appointment_type->ViewValue = NULL;
			}
			$this->appointment_type->ViewCustomAttributes = "";

			// Notified
			if (strval($this->Notified->CurrentValue) <> "") {
				$this->Notified->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Notified->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Notified->ViewValue = NULL;
			}
			$this->Notified->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// PatientType
			if (strval($this->PatientType->CurrentValue) <> "") {
				$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
			} else {
				$this->PatientType->ViewValue = NULL;
			}
			$this->PatientType->ViewCustomAttributes = "";

			// Referal
			if ($this->Referal->VirtualValue <> "") {
				$this->Referal->ViewValue = $this->Referal->VirtualValue;
			} else {
			$curVal = strval($this->Referal->CurrentValue);
			if ($curVal <> "") {
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
				if ($this->Referal->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Referal->ViewValue = $this->Referal->CurrentValue;
					}
				}
			} else {
				$this->Referal->ViewValue = NULL;
			}
			}
			$this->Referal->ViewCustomAttributes = "";

			// paymentType
			$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
			$this->paymentType->ViewCustomAttributes = "";

			// WhereDidYouHear
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal <> "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
					}
				}
			} else {
				$this->WhereDidYouHear->ViewValue = NULL;
			}
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// createdBy
			$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
			$this->createdBy->ViewCustomAttributes = "";

			// createdDateTime
			$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
			$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
			$this->createdDateTime->ViewCustomAttributes = "";

			// PatientTypee
			$curVal = strval($this->PatientTypee->CurrentValue);
			if ($curVal <> "") {
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
				if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
					}
				}
			} else {
				$this->PatientTypee->ViewValue = NULL;
			}
			$this->PatientTypee->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";
			$this->patientID->TooltipValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";
			$this->patientName->TooltipValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";
			$this->DoctorID->TooltipValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";
			$this->DoctorName->TooltipValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";
			$this->AppointmentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";
			$this->DoctorCode->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";
			$this->text->TooltipValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";
			$this->appointment_status->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";
			$this->SchEmail->TooltipValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";
			$this->appointment_type->TooltipValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";
			$this->Notified->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";
			$this->PatientType->TooltipValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";
			$this->Referal->TooltipValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";
			$this->paymentType->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
			$this->PatientTypee->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// start_date

			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// end_date
			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// patientID
			$this->patientID->EditCustomAttributes = "";
			$curVal = trim(strval($this->patientID->CurrentValue));
			if ($curVal <> "")
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
			else
				$this->patientID->ViewValue = $this->patientID->Lookup !== NULL && is_array($this->patientID->Lookup->Options) ? $curVal : NULL;
			if ($this->patientID->ViewValue !== NULL) { // Load from cache
				$this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
				if ($this->patientID->ViewValue == "")
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->patientID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
				} else {
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patientID->EditValue = $arwrk;
			}

			// patientName
			$this->patientName->EditAttrs["class"] = "form-control";
			$this->patientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
			$this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
			$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

			// DoctorID
			$this->DoctorID->EditAttrs["class"] = "form-control";
			$this->DoctorID->EditCustomAttributes = "";
			if ($this->DoctorID->getSessionValue() <> "") {
				$this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
				$this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";
			} else {
			$this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
			$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
			}

			// DoctorName
			$this->DoctorName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DoctorName->CurrentValue));
			if ($curVal <> "")
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			else
				$this->DoctorName->ViewValue = $this->DoctorName->Lookup !== NULL && is_array($this->DoctorName->Lookup->Options) ? $curVal : NULL;
			if ($this->DoctorName->ViewValue !== NULL) { // Load from cache
				$this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
				if ($this->DoctorName->ViewValue == "")
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DoctorName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
				} else {
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DoctorName->EditValue = $arwrk;
			}

			// AppointmentStatus
			$this->AppointmentStatus->EditAttrs["class"] = "form-control";
			$this->AppointmentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// DoctorCode
			$this->DoctorCode->EditAttrs["class"] = "form-control";
			$this->DoctorCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

			// text
			$this->text->EditAttrs["class"] = "form-control";
			$this->text->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
			$this->text->EditValue = HtmlEncode($this->text->CurrentValue);
			$this->text->PlaceHolder = RemoveHtml($this->text->caption());

			// appointment_status
			$this->appointment_status->EditAttrs["class"] = "form-control";
			$this->appointment_status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
			$this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
			$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// SchEmail
			$this->SchEmail->EditAttrs["class"] = "form-control";
			$this->SchEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
			$this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
			$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

			// appointment_type
			$this->appointment_type->EditCustomAttributes = "";
			$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

			// Notified
			$this->Notified->EditCustomAttributes = "";
			$this->Notified->EditValue = $this->Notified->options(FALSE);

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// PatientType
			$this->PatientType->EditCustomAttributes = "";
			$this->PatientType->EditValue = $this->PatientType->options(FALSE);

			// Referal
			$this->Referal->EditCustomAttributes = "";
			$curVal = trim(strval($this->Referal->CurrentValue));
			if ($curVal <> "")
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			else
				$this->Referal->ViewValue = $this->Referal->Lookup !== NULL && is_array($this->Referal->Lookup->Options) ? $curVal : NULL;
			if ($this->Referal->ViewValue !== NULL) { // Load from cache
				$this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
				if ($this->Referal->ViewValue == "")
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Referal->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
				} else {
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Referal->EditValue = $arwrk;
			}

			// paymentType
			$this->paymentType->EditAttrs["class"] = "form-control";
			$this->paymentType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
			$this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
			$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
			if ($curVal <> "")
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->ViewValue !== NULL) { // Load from cache
				$this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->WhereDidYouHear->EditValue = $arwrk;
			}

			// HospID
			// createdBy
			// createdDateTime
			// PatientTypee

			$this->PatientTypee->EditAttrs["class"] = "form-control";
			$this->PatientTypee->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientTypee->CurrentValue));
			if ($curVal <> "")
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			else
				$this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== NULL && is_array($this->PatientTypee->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientTypee->ViewValue !== NULL) { // Load from cache
				$this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PatientTypee->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientTypee->EditValue = $arwrk;
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// start_date
			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// end_date
			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// patientID
			$this->patientID->EditCustomAttributes = "";
			$curVal = trim(strval($this->patientID->CurrentValue));
			if ($curVal <> "")
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
			else
				$this->patientID->ViewValue = $this->patientID->Lookup !== NULL && is_array($this->patientID->Lookup->Options) ? $curVal : NULL;
			if ($this->patientID->ViewValue !== NULL) { // Load from cache
				$this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
				if ($this->patientID->ViewValue == "")
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->patientID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
				} else {
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patientID->EditValue = $arwrk;
			}

			// patientName
			$this->patientName->EditAttrs["class"] = "form-control";
			$this->patientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
			$this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
			$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

			// DoctorID
			$this->DoctorID->EditAttrs["class"] = "form-control";
			$this->DoctorID->EditCustomAttributes = "";
			if ($this->DoctorID->getSessionValue() <> "") {
				$this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
				$this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";
			} else {
			$this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
			$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
			}

			// DoctorName
			$this->DoctorName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DoctorName->CurrentValue));
			if ($curVal <> "")
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			else
				$this->DoctorName->ViewValue = $this->DoctorName->Lookup !== NULL && is_array($this->DoctorName->Lookup->Options) ? $curVal : NULL;
			if ($this->DoctorName->ViewValue !== NULL) { // Load from cache
				$this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
				if ($this->DoctorName->ViewValue == "")
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DoctorName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
				} else {
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DoctorName->EditValue = $arwrk;
			}

			// AppointmentStatus
			$this->AppointmentStatus->EditAttrs["class"] = "form-control";
			$this->AppointmentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// DoctorCode
			$this->DoctorCode->EditAttrs["class"] = "form-control";
			$this->DoctorCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			$this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->EditAttrs["class"] = "form-control";
			$this->text->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
			$this->text->EditValue = HtmlEncode($this->text->CurrentValue);
			$this->text->PlaceHolder = RemoveHtml($this->text->caption());

			// appointment_status
			$this->appointment_status->EditAttrs["class"] = "form-control";
			$this->appointment_status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
			$this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
			$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// SchEmail
			$this->SchEmail->EditAttrs["class"] = "form-control";
			$this->SchEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
			$this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
			$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

			// appointment_type
			$this->appointment_type->EditCustomAttributes = "";
			$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

			// Notified
			$this->Notified->EditCustomAttributes = "";
			$this->Notified->EditValue = $this->Notified->options(FALSE);

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// PatientType
			$this->PatientType->EditCustomAttributes = "";
			$this->PatientType->EditValue = $this->PatientType->options(FALSE);

			// Referal
			$this->Referal->EditCustomAttributes = "";
			$curVal = trim(strval($this->Referal->CurrentValue));
			if ($curVal <> "")
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			else
				$this->Referal->ViewValue = $this->Referal->Lookup !== NULL && is_array($this->Referal->Lookup->Options) ? $curVal : NULL;
			if ($this->Referal->ViewValue !== NULL) { // Load from cache
				$this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
				if ($this->Referal->ViewValue == "")
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Referal->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
				} else {
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Referal->EditValue = $arwrk;
			}

			// paymentType
			$this->paymentType->EditAttrs["class"] = "form-control";
			$this->paymentType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
			$this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
			$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
			if ($curVal <> "")
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->ViewValue !== NULL) { // Load from cache
				$this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->WhereDidYouHear->EditValue = $arwrk;
			}

			// HospID
			// createdBy
			// createdDateTime
			// PatientTypee

			$this->PatientTypee->EditAttrs["class"] = "form-control";
			$this->PatientTypee->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientTypee->CurrentValue));
			if ($curVal <> "")
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			else
				$this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== NULL && is_array($this->PatientTypee->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientTypee->ViewValue !== NULL) { // Load from cache
				$this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PatientTypee->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientTypee->EditValue = $arwrk;
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
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
		if ($this->start_date->Required) {
			if (!$this->start_date->IsDetailKey && $this->start_date->FormValue != NULL && $this->start_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->start_date->FormValue)) {
			AddMessage($FormError, $this->start_date->errorMessage());
		}
		if ($this->end_date->Required) {
			if (!$this->end_date->IsDetailKey && $this->end_date->FormValue != NULL && $this->end_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->end_date->FormValue)) {
			AddMessage($FormError, $this->end_date->errorMessage());
		}
		if ($this->patientID->Required) {
			if (!$this->patientID->IsDetailKey && $this->patientID->FormValue != NULL && $this->patientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
			}
		}
		if ($this->patientName->Required) {
			if (!$this->patientName->IsDetailKey && $this->patientName->FormValue != NULL && $this->patientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
			}
		}
		if ($this->DoctorID->Required) {
			if (!$this->DoctorID->IsDetailKey && $this->DoctorID->FormValue != NULL && $this->DoctorID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
			}
		}
		if ($this->DoctorName->Required) {
			if (!$this->DoctorName->IsDetailKey && $this->DoctorName->FormValue != NULL && $this->DoctorName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentStatus->Required) {
			if (!$this->AppointmentStatus->IsDetailKey && $this->AppointmentStatus->FormValue != NULL && $this->AppointmentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->DoctorCode->Required) {
			if (!$this->DoctorCode->IsDetailKey && $this->DoctorCode->FormValue != NULL && $this->DoctorCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->scheduler_id->Required) {
			if (!$this->scheduler_id->IsDetailKey && $this->scheduler_id->FormValue != NULL && $this->scheduler_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
			}
		}
		if ($this->text->Required) {
			if (!$this->text->IsDetailKey && $this->text->FormValue != NULL && $this->text->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
			}
		}
		if ($this->appointment_status->Required) {
			if (!$this->appointment_status->IsDetailKey && $this->appointment_status->FormValue != NULL && $this->appointment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
			}
		}
		if ($this->PId->Required) {
			if (!$this->PId->IsDetailKey && $this->PId->FormValue != NULL && $this->PId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PId->FormValue)) {
			AddMessage($FormError, $this->PId->errorMessage());
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->SchEmail->Required) {
			if (!$this->SchEmail->IsDetailKey && $this->SchEmail->FormValue != NULL && $this->SchEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
			}
		}
		if ($this->appointment_type->Required) {
			if ($this->appointment_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
			}
		}
		if ($this->Notified->Required) {
			if ($this->Notified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
			}
		}
		if ($this->Purpose->Required) {
			if (!$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->Notes->Required) {
			if (!$this->Notes->IsDetailKey && $this->Notes->FormValue != NULL && $this->Notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
			}
		}
		if ($this->PatientType->Required) {
			if ($this->PatientType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
			}
		}
		if ($this->Referal->Required) {
			if (!$this->Referal->IsDetailKey && $this->Referal->FormValue != NULL && $this->Referal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
			}
		}
		if ($this->paymentType->Required) {
			if (!$this->paymentType->IsDetailKey && $this->paymentType->FormValue != NULL && $this->paymentType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
			}
		}
		if ($this->tittle->Required) {
			if (!$this->tittle->IsDetailKey && $this->tittle->FormValue != NULL && $this->tittle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tittle->caption(), $this->tittle->RequiredErrorMessage));
			}
		}
		if ($this->gendar->Required) {
			if (!$this->gendar->IsDetailKey && $this->gendar->FormValue != NULL && $this->gendar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gendar->caption(), $this->gendar->RequiredErrorMessage));
			}
		}
		if ($this->Dob->Required) {
			if (!$this->Dob->IsDetailKey && $this->Dob->FormValue != NULL && $this->Dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->WhereDidYouHear->Required) {
			if ($this->WhereDidYouHear->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->createdBy->Required) {
			if (!$this->createdBy->IsDetailKey && $this->createdBy->FormValue != NULL && $this->createdBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
			}
		}
		if ($this->createdDateTime->Required) {
			if (!$this->createdDateTime->IsDetailKey && $this->createdDateTime->FormValue != NULL && $this->createdDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
			}
		}
		if ($this->PatientTypee->Required) {
			if (!$this->PatientTypee->IsDetailKey && $this->PatientTypee->FormValue != NULL && $this->PatientTypee->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
			}
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

			// start_date
			$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), NULL, $this->start_date->ReadOnly);

			// end_date
			$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), NULL, $this->end_date->ReadOnly);

			// patientID
			$this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, NULL, $this->patientID->ReadOnly);

			// patientName
			$this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, NULL, $this->patientName->ReadOnly);

			// DoctorID
			$this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, NULL, $this->DoctorID->ReadOnly);

			// DoctorName
			$this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, NULL, $this->DoctorName->ReadOnly);

			// AppointmentStatus
			$this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, NULL, $this->AppointmentStatus->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// DoctorCode
			$this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, NULL, $this->DoctorCode->ReadOnly);

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly);

			// text
			$this->text->setDbValueDef($rsnew, $this->text->CurrentValue, NULL, $this->text->ReadOnly);

			// appointment_status
			$this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, NULL, $this->appointment_status->ReadOnly);

			// PId
			$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, $this->PId->ReadOnly);

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// SchEmail
			$this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, NULL, $this->SchEmail->ReadOnly);

			// appointment_type
			$this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, NULL, $this->appointment_type->ReadOnly);

			// Notified
			$this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, NULL, $this->Notified->ReadOnly);

			// Purpose
			$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, $this->Purpose->ReadOnly);

			// Notes
			$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, $this->Notes->ReadOnly);

			// PatientType
			$this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, NULL, $this->PatientType->ReadOnly);

			// Referal
			$this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, NULL, $this->Referal->ReadOnly);

			// paymentType
			$this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, NULL, $this->paymentType->ReadOnly);

			// WhereDidYouHear
			$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, $this->WhereDidYouHear->ReadOnly);

			// PatientTypee
			$this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, NULL, $this->PatientTypee->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "doctors") {
				$this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// start_date
		$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), NULL, FALSE);

		// end_date
		$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), NULL, FALSE);

		// patientID
		$this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, NULL, FALSE);

		// patientName
		$this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, NULL, FALSE);

		// DoctorID
		$this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, NULL, FALSE);

		// DoctorName
		$this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, NULL, FALSE);

		// AppointmentStatus
		$this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// DoctorCode
		$this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// scheduler_id
		$this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, NULL, FALSE);

		// text
		$this->text->setDbValueDef($rsnew, $this->text->CurrentValue, NULL, FALSE);

		// appointment_status
		$this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, NULL, FALSE);

		// PId
		$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// SchEmail
		$this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, NULL, FALSE);

		// appointment_type
		$this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, NULL, FALSE);

		// Notified
		$this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, NULL, FALSE);

		// Purpose
		$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, FALSE);

		// Notes
		$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, FALSE);

		// PatientType
		$this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, NULL, FALSE);

		// Referal
		$this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, NULL, FALSE);

		// paymentType
		$this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, NULL, FALSE);

		// WhereDidYouHear
		$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// createdBy
		$this->createdBy->setDbValueDef($rsnew, GetUserName(), NULL);
		$rsnew['createdBy'] = &$this->createdBy->DbValue;

		// createdDateTime
		$this->createdDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createdDateTime'] = &$this->createdDateTime->DbValue;

		// PatientTypee
		$this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, NULL, FALSE);

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
		if ($masterTblVar == "doctors") {
			$this->DoctorID->Visible = FALSE;
			if ($GLOBALS["doctors"]->EventCancelled)
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
						case "x_patientID":
							break;
						case "x_DoctorName":
							break;
						case "x_Referal":
							break;
						case "x_tittle":
							break;
						case "x_gendar":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_PatientTypee":
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
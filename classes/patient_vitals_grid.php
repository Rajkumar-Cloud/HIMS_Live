<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_vitals_grid extends patient_vitals
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_vitals';

	// Page object name
	public $PageObjName = "patient_vitals_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_vitalsgrid";
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

		// Table object (patient_vitals)
		if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
			$GLOBALS["patient_vitals"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_vitals"];

		}
		$this->AddUrl = "patient_vitalsadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');

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
		global $EXPORT, $patient_vitals;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient_vitals);
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
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
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
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatID->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->HT->setVisibility();
		$this->WT->setVisibility();
		$this->SurfaceArea->setVisibility();
		$this->BodyMassIndex->setVisibility();
		$this->ClinicalFindings->Visible = FALSE;
		$this->ClinicalDiagnosis->Visible = FALSE;
		$this->AnticoagulantifAny->setVisibility();
		$this->FoodAllergies->setVisibility();
		$this->GenericAllergies->setVisibility();
		$this->GroupAllergies->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->PR->setVisibility();
		$this->CNS->setVisibility();
		$this->RSA->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->PS->setVisibility();
		$this->PV->setVisibility();
		$this->clinicaldetails->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->PatientSearch->Visible = FALSE;
		$this->PatientId->setVisibility();
		$this->Reception->setVisibility();
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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->AnticoagulantifAny);
		$this->setupLookupOptions($this->GenericAllergies);
		$this->setupLookupOptions($this->GroupAllergies);
		$this->setupLookupOptions($this->clinicaldetails);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->PatientSearch);

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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ip_admissionlist.php"); // Return to master page
			} else {
				$ip_admission->loadListRowValues($rsmaster);
				$ip_admission->RowType = ROWTYPE_MASTER; // Master row
				$ip_admission->renderListRow();
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
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue <> $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue <> $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MobileNumber") && $CurrentForm->hasValue("o_MobileNumber") && $this->MobileNumber->CurrentValue <> $this->MobileNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HT") && $CurrentForm->hasValue("o_HT") && $this->HT->CurrentValue <> $this->HT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_WT") && $CurrentForm->hasValue("o_WT") && $this->WT->CurrentValue <> $this->WT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SurfaceArea") && $CurrentForm->hasValue("o_SurfaceArea") && $this->SurfaceArea->CurrentValue <> $this->SurfaceArea->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BodyMassIndex") && $CurrentForm->hasValue("o_BodyMassIndex") && $this->BodyMassIndex->CurrentValue <> $this->BodyMassIndex->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnticoagulantifAny") && $CurrentForm->hasValue("o_AnticoagulantifAny") && $this->AnticoagulantifAny->CurrentValue <> $this->AnticoagulantifAny->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FoodAllergies") && $CurrentForm->hasValue("o_FoodAllergies") && $this->FoodAllergies->CurrentValue <> $this->FoodAllergies->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GenericAllergies") && $CurrentForm->hasValue("o_GenericAllergies") && $this->GenericAllergies->CurrentValue <> $this->GenericAllergies->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GroupAllergies") && $CurrentForm->hasValue("o_GroupAllergies") && $this->GroupAllergies->CurrentValue <> $this->GroupAllergies->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Temp") && $CurrentForm->hasValue("o_Temp") && $this->Temp->CurrentValue <> $this->Temp->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pulse") && $CurrentForm->hasValue("o_Pulse") && $this->Pulse->CurrentValue <> $this->Pulse->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BP") && $CurrentForm->hasValue("o_BP") && $this->BP->CurrentValue <> $this->BP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PR") && $CurrentForm->hasValue("o_PR") && $this->PR->CurrentValue <> $this->PR->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CNS") && $CurrentForm->hasValue("o_CNS") && $this->CNS->CurrentValue <> $this->CNS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RSA") && $CurrentForm->hasValue("o_RSA") && $this->RSA->CurrentValue <> $this->RSA->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CVS") && $CurrentForm->hasValue("o_CVS") && $this->CVS->CurrentValue <> $this->CVS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PA") && $CurrentForm->hasValue("o_PA") && $this->PA->CurrentValue <> $this->PA->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PS") && $CurrentForm->hasValue("o_PS") && $this->PS->CurrentValue <> $this->PS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PV") && $CurrentForm->hasValue("o_PV") && $this->PV->CurrentValue <> $this->PV->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_clinicaldetails") && $CurrentForm->hasValue("o_clinicaldetails") && $this->clinicaldetails->CurrentValue <> $this->clinicaldetails->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue <> $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue <> $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue <> $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue <> $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue <> $this->Reception->OldValue)
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
				$this->Reception->setSessionValue("");
				$this->PatientId->setSessionValue("");
				$this->mrnno->setSessionValue("");
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
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->HT->CurrentValue = NULL;
		$this->HT->OldValue = $this->HT->CurrentValue;
		$this->WT->CurrentValue = NULL;
		$this->WT->OldValue = $this->WT->CurrentValue;
		$this->SurfaceArea->CurrentValue = NULL;
		$this->SurfaceArea->OldValue = $this->SurfaceArea->CurrentValue;
		$this->BodyMassIndex->CurrentValue = NULL;
		$this->BodyMassIndex->OldValue = $this->BodyMassIndex->CurrentValue;
		$this->ClinicalFindings->CurrentValue = NULL;
		$this->ClinicalFindings->OldValue = $this->ClinicalFindings->CurrentValue;
		$this->ClinicalDiagnosis->CurrentValue = NULL;
		$this->ClinicalDiagnosis->OldValue = $this->ClinicalDiagnosis->CurrentValue;
		$this->AnticoagulantifAny->CurrentValue = NULL;
		$this->AnticoagulantifAny->OldValue = $this->AnticoagulantifAny->CurrentValue;
		$this->FoodAllergies->CurrentValue = NULL;
		$this->FoodAllergies->OldValue = $this->FoodAllergies->CurrentValue;
		$this->GenericAllergies->CurrentValue = NULL;
		$this->GenericAllergies->OldValue = $this->GenericAllergies->CurrentValue;
		$this->GroupAllergies->CurrentValue = NULL;
		$this->GroupAllergies->OldValue = $this->GroupAllergies->CurrentValue;
		$this->Temp->CurrentValue = NULL;
		$this->Temp->OldValue = $this->Temp->CurrentValue;
		$this->Pulse->CurrentValue = NULL;
		$this->Pulse->OldValue = $this->Pulse->CurrentValue;
		$this->BP->CurrentValue = NULL;
		$this->BP->OldValue = $this->BP->CurrentValue;
		$this->PR->CurrentValue = NULL;
		$this->PR->OldValue = $this->PR->CurrentValue;
		$this->CNS->CurrentValue = NULL;
		$this->CNS->OldValue = $this->CNS->CurrentValue;
		$this->RSA->CurrentValue = NULL;
		$this->RSA->OldValue = $this->RSA->CurrentValue;
		$this->CVS->CurrentValue = NULL;
		$this->CVS->OldValue = $this->CVS->CurrentValue;
		$this->PA->CurrentValue = NULL;
		$this->PA->OldValue = $this->PA->CurrentValue;
		$this->PS->CurrentValue = NULL;
		$this->PS->OldValue = $this->PS->CurrentValue;
		$this->PV->CurrentValue = NULL;
		$this->PV->OldValue = $this->PV->CurrentValue;
		$this->clinicaldetails->CurrentValue = NULL;
		$this->clinicaldetails->OldValue = $this->clinicaldetails->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->PatientSearch->CurrentValue = NULL;
		$this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}
		$this->PatID->setOldValue($CurrentForm->getValue("o_PatID"));

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}
		$this->MobileNumber->setOldValue($CurrentForm->getValue("o_MobileNumber"));

		// Check field name 'HT' first before field var 'x_HT'
		$val = $CurrentForm->hasValue("HT") ? $CurrentForm->getValue("HT") : $CurrentForm->getValue("x_HT");
		if (!$this->HT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HT->Visible = FALSE; // Disable update for API request
			else
				$this->HT->setFormValue($val);
		}
		$this->HT->setOldValue($CurrentForm->getValue("o_HT"));

		// Check field name 'WT' first before field var 'x_WT'
		$val = $CurrentForm->hasValue("WT") ? $CurrentForm->getValue("WT") : $CurrentForm->getValue("x_WT");
		if (!$this->WT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WT->Visible = FALSE; // Disable update for API request
			else
				$this->WT->setFormValue($val);
		}
		$this->WT->setOldValue($CurrentForm->getValue("o_WT"));

		// Check field name 'SurfaceArea' first before field var 'x_SurfaceArea'
		$val = $CurrentForm->hasValue("SurfaceArea") ? $CurrentForm->getValue("SurfaceArea") : $CurrentForm->getValue("x_SurfaceArea");
		if (!$this->SurfaceArea->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SurfaceArea->Visible = FALSE; // Disable update for API request
			else
				$this->SurfaceArea->setFormValue($val);
		}
		$this->SurfaceArea->setOldValue($CurrentForm->getValue("o_SurfaceArea"));

		// Check field name 'BodyMassIndex' first before field var 'x_BodyMassIndex'
		$val = $CurrentForm->hasValue("BodyMassIndex") ? $CurrentForm->getValue("BodyMassIndex") : $CurrentForm->getValue("x_BodyMassIndex");
		if (!$this->BodyMassIndex->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BodyMassIndex->Visible = FALSE; // Disable update for API request
			else
				$this->BodyMassIndex->setFormValue($val);
		}
		$this->BodyMassIndex->setOldValue($CurrentForm->getValue("o_BodyMassIndex"));

		// Check field name 'AnticoagulantifAny' first before field var 'x_AnticoagulantifAny'
		$val = $CurrentForm->hasValue("AnticoagulantifAny") ? $CurrentForm->getValue("AnticoagulantifAny") : $CurrentForm->getValue("x_AnticoagulantifAny");
		if (!$this->AnticoagulantifAny->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnticoagulantifAny->Visible = FALSE; // Disable update for API request
			else
				$this->AnticoagulantifAny->setFormValue($val);
		}
		$this->AnticoagulantifAny->setOldValue($CurrentForm->getValue("o_AnticoagulantifAny"));

		// Check field name 'FoodAllergies' first before field var 'x_FoodAllergies'
		$val = $CurrentForm->hasValue("FoodAllergies") ? $CurrentForm->getValue("FoodAllergies") : $CurrentForm->getValue("x_FoodAllergies");
		if (!$this->FoodAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FoodAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->FoodAllergies->setFormValue($val);
		}
		$this->FoodAllergies->setOldValue($CurrentForm->getValue("o_FoodAllergies"));

		// Check field name 'GenericAllergies' first before field var 'x_GenericAllergies'
		$val = $CurrentForm->hasValue("GenericAllergies") ? $CurrentForm->getValue("GenericAllergies") : $CurrentForm->getValue("x_GenericAllergies");
		if (!$this->GenericAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GenericAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GenericAllergies->setFormValue($val);
		}
		$this->GenericAllergies->setOldValue($CurrentForm->getValue("o_GenericAllergies"));

		// Check field name 'GroupAllergies' first before field var 'x_GroupAllergies'
		$val = $CurrentForm->hasValue("GroupAllergies") ? $CurrentForm->getValue("GroupAllergies") : $CurrentForm->getValue("x_GroupAllergies");
		if (!$this->GroupAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GroupAllergies->setFormValue($val);
		}
		$this->GroupAllergies->setOldValue($CurrentForm->getValue("o_GroupAllergies"));

		// Check field name 'Temp' first before field var 'x_Temp'
		$val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
		if (!$this->Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Temp->setFormValue($val);
		}
		$this->Temp->setOldValue($CurrentForm->getValue("o_Temp"));

		// Check field name 'Pulse' first before field var 'x_Pulse'
		$val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
		if (!$this->Pulse->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pulse->Visible = FALSE; // Disable update for API request
			else
				$this->Pulse->setFormValue($val);
		}
		$this->Pulse->setOldValue($CurrentForm->getValue("o_Pulse"));

		// Check field name 'BP' first before field var 'x_BP'
		$val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
		if (!$this->BP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BP->Visible = FALSE; // Disable update for API request
			else
				$this->BP->setFormValue($val);
		}
		$this->BP->setOldValue($CurrentForm->getValue("o_BP"));

		// Check field name 'PR' first before field var 'x_PR'
		$val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
		if (!$this->PR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PR->Visible = FALSE; // Disable update for API request
			else
				$this->PR->setFormValue($val);
		}
		$this->PR->setOldValue($CurrentForm->getValue("o_PR"));

		// Check field name 'CNS' first before field var 'x_CNS'
		$val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
		if (!$this->CNS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CNS->Visible = FALSE; // Disable update for API request
			else
				$this->CNS->setFormValue($val);
		}
		$this->CNS->setOldValue($CurrentForm->getValue("o_CNS"));

		// Check field name 'RSA' first before field var 'x_RSA'
		$val = $CurrentForm->hasValue("RSA") ? $CurrentForm->getValue("RSA") : $CurrentForm->getValue("x_RSA");
		if (!$this->RSA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RSA->Visible = FALSE; // Disable update for API request
			else
				$this->RSA->setFormValue($val);
		}
		$this->RSA->setOldValue($CurrentForm->getValue("o_RSA"));

		// Check field name 'CVS' first before field var 'x_CVS'
		$val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
		if (!$this->CVS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CVS->Visible = FALSE; // Disable update for API request
			else
				$this->CVS->setFormValue($val);
		}
		$this->CVS->setOldValue($CurrentForm->getValue("o_CVS"));

		// Check field name 'PA' first before field var 'x_PA'
		$val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
		if (!$this->PA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PA->Visible = FALSE; // Disable update for API request
			else
				$this->PA->setFormValue($val);
		}
		$this->PA->setOldValue($CurrentForm->getValue("o_PA"));

		// Check field name 'PS' first before field var 'x_PS'
		$val = $CurrentForm->hasValue("PS") ? $CurrentForm->getValue("PS") : $CurrentForm->getValue("x_PS");
		if (!$this->PS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PS->Visible = FALSE; // Disable update for API request
			else
				$this->PS->setFormValue($val);
		}
		$this->PS->setOldValue($CurrentForm->getValue("o_PS"));

		// Check field name 'PV' first before field var 'x_PV'
		$val = $CurrentForm->hasValue("PV") ? $CurrentForm->getValue("PV") : $CurrentForm->getValue("x_PV");
		if (!$this->PV->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PV->Visible = FALSE; // Disable update for API request
			else
				$this->PV->setFormValue($val);
		}
		$this->PV->setOldValue($CurrentForm->getValue("o_PV"));

		// Check field name 'clinicaldetails' first before field var 'x_clinicaldetails'
		$val = $CurrentForm->hasValue("clinicaldetails") ? $CurrentForm->getValue("clinicaldetails") : $CurrentForm->getValue("x_clinicaldetails");
		if (!$this->clinicaldetails->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->clinicaldetails->Visible = FALSE; // Disable update for API request
			else
				$this->clinicaldetails->setFormValue($val);
		}
		$this->clinicaldetails->setOldValue($CurrentForm->getValue("o_clinicaldetails"));

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->setOldValue($CurrentForm->getValue("o_status"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		$this->Age->setOldValue($CurrentForm->getValue("o_Age"));

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		$this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		$this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->HT->CurrentValue = $this->HT->FormValue;
		$this->WT->CurrentValue = $this->WT->FormValue;
		$this->SurfaceArea->CurrentValue = $this->SurfaceArea->FormValue;
		$this->BodyMassIndex->CurrentValue = $this->BodyMassIndex->FormValue;
		$this->AnticoagulantifAny->CurrentValue = $this->AnticoagulantifAny->FormValue;
		$this->FoodAllergies->CurrentValue = $this->FoodAllergies->FormValue;
		$this->GenericAllergies->CurrentValue = $this->GenericAllergies->FormValue;
		$this->GroupAllergies->CurrentValue = $this->GroupAllergies->FormValue;
		$this->Temp->CurrentValue = $this->Temp->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->PR->CurrentValue = $this->PR->FormValue;
		$this->CNS->CurrentValue = $this->CNS->FormValue;
		$this->RSA->CurrentValue = $this->RSA->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->PS->CurrentValue = $this->PS->FormValue;
		$this->PV->CurrentValue = $this->PV->FormValue;
		$this->clinicaldetails->CurrentValue = $this->clinicaldetails->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatID->setDbValue($row['PatID']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->HT->setDbValue($row['HT']);
		$this->WT->setDbValue($row['WT']);
		$this->SurfaceArea->setDbValue($row['SurfaceArea']);
		$this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
		$this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
		$this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
		$this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
		$this->FoodAllergies->setDbValue($row['FoodAllergies']);
		$this->GenericAllergies->setDbValue($row['GenericAllergies']);
		$this->GroupAllergies->setDbValue($row['GroupAllergies']);
		if (array_key_exists('EV__GroupAllergies', $rs->fields)) {
			$this->GroupAllergies->VirtualValue = $rs->fields('EV__GroupAllergies'); // Set up virtual field value
		} else {
			$this->GroupAllergies->VirtualValue = ""; // Clear value
		}
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->PR->setDbValue($row['PR']);
		$this->CNS->setDbValue($row['CNS']);
		$this->RSA->setDbValue($row['RSA']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->PS->setDbValue($row['PS']);
		$this->PV->setDbValue($row['PV']);
		$this->clinicaldetails->setDbValue($row['clinicaldetails']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Reception->setDbValue($row['Reception']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['HT'] = $this->HT->CurrentValue;
		$row['WT'] = $this->WT->CurrentValue;
		$row['SurfaceArea'] = $this->SurfaceArea->CurrentValue;
		$row['BodyMassIndex'] = $this->BodyMassIndex->CurrentValue;
		$row['ClinicalFindings'] = $this->ClinicalFindings->CurrentValue;
		$row['ClinicalDiagnosis'] = $this->ClinicalDiagnosis->CurrentValue;
		$row['AnticoagulantifAny'] = $this->AnticoagulantifAny->CurrentValue;
		$row['FoodAllergies'] = $this->FoodAllergies->CurrentValue;
		$row['GenericAllergies'] = $this->GenericAllergies->CurrentValue;
		$row['GroupAllergies'] = $this->GroupAllergies->CurrentValue;
		$row['Temp'] = $this->Temp->CurrentValue;
		$row['Pulse'] = $this->Pulse->CurrentValue;
		$row['BP'] = $this->BP->CurrentValue;
		$row['PR'] = $this->PR->CurrentValue;
		$row['CNS'] = $this->CNS->CurrentValue;
		$row['RSA'] = $this->RSA->CurrentValue;
		$row['CVS'] = $this->CVS->CurrentValue;
		$row['PA'] = $this->PA->CurrentValue;
		$row['PS'] = $this->PS->CurrentValue;
		$row['PV'] = $this->PV->CurrentValue;
		$row['clinicaldetails'] = $this->clinicaldetails->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['PatientSearch'] = $this->PatientSearch->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
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
		// mrnno
		// PatientName
		// PatID
		// MobileNumber
		// profilePic
		// HT
		// WT
		// SurfaceArea
		// BodyMassIndex
		// ClinicalFindings
		// ClinicalDiagnosis
		// AnticoagulantifAny
		// FoodAllergies
		// GenericAllergies
		// GroupAllergies
		// Temp
		// Pulse
		// BP
		// PR
		// CNS
		// RSA
		// CVS
		// PA
		// PS
		// PV
		// clinicaldetails
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Age
		// Gender
		// PatientSearch
		// PatientId
		// Reception
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// HT
			$this->HT->ViewValue = $this->HT->CurrentValue;
			$this->HT->ViewCustomAttributes = "";

			// WT
			$this->WT->ViewValue = $this->WT->CurrentValue;
			$this->WT->ViewCustomAttributes = "";

			// SurfaceArea
			$this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
			$this->SurfaceArea->ViewCustomAttributes = "";

			// BodyMassIndex
			$this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
			$this->BodyMassIndex->ViewCustomAttributes = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal <> "") {
				$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
					}
				}
			} else {
				$this->AnticoagulantifAny->ViewValue = NULL;
			}
			$this->AnticoagulantifAny->ViewCustomAttributes = "";

			// FoodAllergies
			$this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
			$this->FoodAllergies->ViewCustomAttributes = "";

			// GenericAllergies
			$curVal = strval($this->GenericAllergies->CurrentValue);
			if ($curVal <> "") {
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
				if ($this->GenericAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GenericAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GenericAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
					}
				}
			} else {
				$this->GenericAllergies->ViewValue = NULL;
			}
			$this->GenericAllergies->ViewCustomAttributes = "";

			// GroupAllergies
			if ($this->GroupAllergies->VirtualValue <> "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
			} else {
			$curVal = strval($this->GroupAllergies->CurrentValue);
			if ($curVal <> "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
				if ($this->GroupAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GroupAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GroupAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
					}
				}
			} else {
				$this->GroupAllergies->ViewValue = NULL;
			}
			}
			$this->GroupAllergies->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// PR
			$this->PR->ViewValue = $this->PR->CurrentValue;
			$this->PR->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RSA
			$this->RSA->ViewValue = $this->RSA->CurrentValue;
			$this->RSA->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// PS
			$this->PS->ViewValue = $this->PS->CurrentValue;
			$this->PS->ViewCustomAttributes = "";

			// PV
			$this->PV->ViewValue = $this->PV->CurrentValue;
			$this->PV->ViewCustomAttributes = "";

			// clinicaldetails
			$curVal = strval($this->clinicaldetails->CurrentValue);
			if ($curVal <> "") {
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
				if ($this->clinicaldetails->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->clinicaldetails->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->clinicaldetails->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
					}
				}
			} else {
				$this->clinicaldetails->ViewValue = NULL;
			}
			$this->clinicaldetails->ViewCustomAttributes = "";

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
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";
			if (!$this->isExport())
				$this->mrnno->ViewValue = $this->highlightValue($this->mrnno);

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientName->ViewValue = $this->highlightValue($this->PatientName);

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";
			if (!$this->isExport())
				$this->PatID->ViewValue = $this->highlightValue($this->PatID);

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";
			if (!$this->isExport())
				$this->MobileNumber->ViewValue = $this->highlightValue($this->MobileNumber);

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";
			$this->HT->TooltipValue = "";
			if (!$this->isExport())
				$this->HT->ViewValue = $this->highlightValue($this->HT);

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";
			$this->WT->TooltipValue = "";
			if (!$this->isExport())
				$this->WT->ViewValue = $this->highlightValue($this->WT);

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";
			$this->SurfaceArea->TooltipValue = "";
			if (!$this->isExport())
				$this->SurfaceArea->ViewValue = $this->highlightValue($this->SurfaceArea);

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";
			$this->BodyMassIndex->TooltipValue = "";
			if (!$this->isExport())
				$this->BodyMassIndex->ViewValue = $this->highlightValue($this->BodyMassIndex);

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";
			$this->AnticoagulantifAny->TooltipValue = "";
			if (!$this->isExport())
				$this->AnticoagulantifAny->ViewValue = $this->highlightValue($this->AnticoagulantifAny);

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";
			$this->FoodAllergies->TooltipValue = "";
			if (!$this->isExport())
				$this->FoodAllergies->ViewValue = $this->highlightValue($this->FoodAllergies);

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";
			$this->GenericAllergies->TooltipValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";
			$this->GroupAllergies->TooltipValue = "";
			if (!$this->isExport())
				$this->GroupAllergies->ViewValue = $this->highlightValue($this->GroupAllergies);

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";
			$this->Temp->TooltipValue = "";
			if (!$this->isExport())
				$this->Temp->ViewValue = $this->highlightValue($this->Temp);

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";
			$this->Pulse->TooltipValue = "";
			if (!$this->isExport())
				$this->Pulse->ViewValue = $this->highlightValue($this->Pulse);

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";
			$this->BP->TooltipValue = "";
			if (!$this->isExport())
				$this->BP->ViewValue = $this->highlightValue($this->BP);

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";
			$this->PR->TooltipValue = "";
			if (!$this->isExport())
				$this->PR->ViewValue = $this->highlightValue($this->PR);

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";
			if (!$this->isExport())
				$this->CNS->ViewValue = $this->highlightValue($this->CNS);

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";
			$this->RSA->TooltipValue = "";
			if (!$this->isExport())
				$this->RSA->ViewValue = $this->highlightValue($this->RSA);

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";
			if (!$this->isExport())
				$this->CVS->ViewValue = $this->highlightValue($this->CVS);

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";
			if (!$this->isExport())
				$this->PA->ViewValue = $this->highlightValue($this->PA);

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";
			$this->PS->TooltipValue = "";
			if (!$this->isExport())
				$this->PS->ViewValue = $this->highlightValue($this->PS);

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";
			$this->PV->TooltipValue = "";
			if (!$this->isExport())
				$this->PV->ViewValue = $this->highlightValue($this->PV);

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";
			$this->clinicaldetails->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";
			if (!$this->isExport())
				$this->createdby->ViewValue = $this->highlightValue($this->createdby);

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";
			if (!$this->isExport())
				$this->modifiedby->ViewValue = $this->highlightValue($this->modifiedby);

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";
			if (!$this->isExport())
				$this->Age->ViewValue = $this->highlightValue($this->Age);

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";
			if (!$this->isExport())
				$this->Gender->ViewValue = $this->highlightValue($this->Gender);

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientId->ViewValue = $this->highlightValue($this->PatientId);

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// mrnno

			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() <> "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->OldValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// HT
			$this->HT->EditAttrs["class"] = "form-control";
			$this->HT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
			$this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
			$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

			// WT
			$this->WT->EditAttrs["class"] = "form-control";
			$this->WT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
			$this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
			$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

			// SurfaceArea
			$this->SurfaceArea->EditAttrs["class"] = "form-control";
			$this->SurfaceArea->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

			// BodyMassIndex
			$this->BodyMassIndex->EditAttrs["class"] = "form-control";
			$this->BodyMassIndex->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

			// AnticoagulantifAny
			$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
			$this->AnticoagulantifAny->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
			$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal <> "") {
				$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
					}
				}
			} else {
				$this->AnticoagulantifAny->EditValue = NULL;
			}
			$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

			// FoodAllergies
			$this->FoodAllergies->EditAttrs["class"] = "form-control";
			$this->FoodAllergies->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

			// GenericAllergies
			$this->GenericAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GenericAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
			else
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== NULL && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GenericAllergies->ViewValue !== NULL) { // Load from cache
				$this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
				if ($this->GenericAllergies->ViewValue == "")
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GenericAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GenericAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GenericAllergies->EditValue = $arwrk;
			}

			// GroupAllergies
			$this->GroupAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GroupAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
			else
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== NULL && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GroupAllergies->ViewValue !== NULL) { // Load from cache
				$this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
				if ($this->GroupAllergies->ViewValue == "")
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GroupAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GroupAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GroupAllergies->EditValue = $arwrk;
			}

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
			$this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RSA
			$this->RSA->EditAttrs["class"] = "form-control";
			$this->RSA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
			$this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
			$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PS
			$this->PS->EditAttrs["class"] = "form-control";
			$this->PS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
			$this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
			$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

			// PV
			$this->PV->EditAttrs["class"] = "form-control";
			$this->PV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
			$this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
			$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

			// clinicaldetails
			$this->clinicaldetails->EditCustomAttributes = "";
			$curVal = trim(strval($this->clinicaldetails->CurrentValue));
			if ($curVal <> "")
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
			else
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== NULL && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : NULL;
			if ($this->clinicaldetails->ViewValue !== NULL) { // Load from cache
				$this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->clinicaldetails->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->clinicaldetails->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal <> "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// Age

			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() <> "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->PatientId->OldValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";
			} else {
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() <> "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
				$this->Reception->OldValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";
			} else {
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// HospID
			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// HT
			$this->HT->EditAttrs["class"] = "form-control";
			$this->HT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
			$this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
			$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

			// WT
			$this->WT->EditAttrs["class"] = "form-control";
			$this->WT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
			$this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
			$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

			// SurfaceArea
			$this->SurfaceArea->EditAttrs["class"] = "form-control";
			$this->SurfaceArea->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

			// BodyMassIndex
			$this->BodyMassIndex->EditAttrs["class"] = "form-control";
			$this->BodyMassIndex->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

			// AnticoagulantifAny
			$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
			$this->AnticoagulantifAny->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
			$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal <> "") {
				$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
					}
				}
			} else {
				$this->AnticoagulantifAny->EditValue = NULL;
			}
			$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

			// FoodAllergies
			$this->FoodAllergies->EditAttrs["class"] = "form-control";
			$this->FoodAllergies->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

			// GenericAllergies
			$this->GenericAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GenericAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
			else
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== NULL && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GenericAllergies->ViewValue !== NULL) { // Load from cache
				$this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
				if ($this->GenericAllergies->ViewValue == "")
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GenericAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GenericAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GenericAllergies->EditValue = $arwrk;
			}

			// GroupAllergies
			$this->GroupAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GroupAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
			else
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== NULL && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GroupAllergies->ViewValue !== NULL) { // Load from cache
				$this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
				if ($this->GroupAllergies->ViewValue == "")
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GroupAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GroupAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GroupAllergies->EditValue = $arwrk;
			}

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
			$this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RSA
			$this->RSA->EditAttrs["class"] = "form-control";
			$this->RSA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
			$this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
			$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PS
			$this->PS->EditAttrs["class"] = "form-control";
			$this->PS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
			$this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
			$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

			// PV
			$this->PV->EditAttrs["class"] = "form-control";
			$this->PV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
			$this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
			$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

			// clinicaldetails
			$this->clinicaldetails->EditCustomAttributes = "";
			$curVal = trim(strval($this->clinicaldetails->CurrentValue));
			if ($curVal <> "")
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
			else
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== NULL && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : NULL;
			if ($this->clinicaldetails->ViewValue !== NULL) { // Load from cache
				$this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->clinicaldetails->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->clinicaldetails->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal <> "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// Age

			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// HospID
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

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

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->HT->Required) {
			if (!$this->HT->IsDetailKey && $this->HT->FormValue != NULL && $this->HT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HT->caption(), $this->HT->RequiredErrorMessage));
			}
		}
		if ($this->WT->Required) {
			if (!$this->WT->IsDetailKey && $this->WT->FormValue != NULL && $this->WT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WT->caption(), $this->WT->RequiredErrorMessage));
			}
		}
		if ($this->SurfaceArea->Required) {
			if (!$this->SurfaceArea->IsDetailKey && $this->SurfaceArea->FormValue != NULL && $this->SurfaceArea->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurfaceArea->caption(), $this->SurfaceArea->RequiredErrorMessage));
			}
		}
		if ($this->BodyMassIndex->Required) {
			if (!$this->BodyMassIndex->IsDetailKey && $this->BodyMassIndex->FormValue != NULL && $this->BodyMassIndex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BodyMassIndex->caption(), $this->BodyMassIndex->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalFindings->Required) {
			if (!$this->ClinicalFindings->IsDetailKey && $this->ClinicalFindings->FormValue != NULL && $this->ClinicalFindings->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalFindings->caption(), $this->ClinicalFindings->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalDiagnosis->Required) {
			if (!$this->ClinicalDiagnosis->IsDetailKey && $this->ClinicalDiagnosis->FormValue != NULL && $this->ClinicalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalDiagnosis->caption(), $this->ClinicalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->AnticoagulantifAny->Required) {
			if (!$this->AnticoagulantifAny->IsDetailKey && $this->AnticoagulantifAny->FormValue != NULL && $this->AnticoagulantifAny->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnticoagulantifAny->caption(), $this->AnticoagulantifAny->RequiredErrorMessage));
			}
		}
		if ($this->FoodAllergies->Required) {
			if (!$this->FoodAllergies->IsDetailKey && $this->FoodAllergies->FormValue != NULL && $this->FoodAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FoodAllergies->caption(), $this->FoodAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GenericAllergies->Required) {
			if ($this->GenericAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GenericAllergies->caption(), $this->GenericAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GroupAllergies->Required) {
			if ($this->GroupAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupAllergies->caption(), $this->GroupAllergies->RequiredErrorMessage));
			}
		}
		if ($this->Temp->Required) {
			if (!$this->Temp->IsDetailKey && $this->Temp->FormValue != NULL && $this->Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
			}
		}
		if ($this->Pulse->Required) {
			if (!$this->Pulse->IsDetailKey && $this->Pulse->FormValue != NULL && $this->Pulse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
			}
		}
		if ($this->BP->Required) {
			if (!$this->BP->IsDetailKey && $this->BP->FormValue != NULL && $this->BP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
			}
		}
		if ($this->PR->Required) {
			if (!$this->PR->IsDetailKey && $this->PR->FormValue != NULL && $this->PR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
			}
		}
		if ($this->CNS->Required) {
			if (!$this->CNS->IsDetailKey && $this->CNS->FormValue != NULL && $this->CNS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
			}
		}
		if ($this->RSA->Required) {
			if (!$this->RSA->IsDetailKey && $this->RSA->FormValue != NULL && $this->RSA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RSA->caption(), $this->RSA->RequiredErrorMessage));
			}
		}
		if ($this->CVS->Required) {
			if (!$this->CVS->IsDetailKey && $this->CVS->FormValue != NULL && $this->CVS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
			}
		}
		if ($this->PA->Required) {
			if (!$this->PA->IsDetailKey && $this->PA->FormValue != NULL && $this->PA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
			}
		}
		if ($this->PS->Required) {
			if (!$this->PS->IsDetailKey && $this->PS->FormValue != NULL && $this->PS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PS->caption(), $this->PS->RequiredErrorMessage));
			}
		}
		if ($this->PV->Required) {
			if (!$this->PV->IsDetailKey && $this->PV->FormValue != NULL && $this->PV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PV->caption(), $this->PV->RequiredErrorMessage));
			}
		}
		if ($this->clinicaldetails->Required) {
			if ($this->clinicaldetails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->clinicaldetails->caption(), $this->clinicaldetails->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// HT
			$this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, NULL, $this->HT->ReadOnly);

			// WT
			$this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, NULL, $this->WT->ReadOnly);

			// SurfaceArea
			$this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, NULL, $this->SurfaceArea->ReadOnly);

			// BodyMassIndex
			$this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, NULL, $this->BodyMassIndex->ReadOnly);

			// AnticoagulantifAny
			$this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, NULL, $this->AnticoagulantifAny->ReadOnly);

			// FoodAllergies
			$this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, NULL, $this->FoodAllergies->ReadOnly);

			// GenericAllergies
			$this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, NULL, $this->GenericAllergies->ReadOnly);

			// GroupAllergies
			$this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, NULL, $this->GroupAllergies->ReadOnly);

			// Temp
			$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, $this->Temp->ReadOnly);

			// Pulse
			$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, $this->Pulse->ReadOnly);

			// BP
			$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, $this->BP->ReadOnly);

			// PR
			$this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, NULL, $this->PR->ReadOnly);

			// CNS
			$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, $this->CNS->ReadOnly);

			// RSA
			$this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, NULL, $this->RSA->ReadOnly);

			// CVS
			$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, $this->CVS->ReadOnly);

			// PA
			$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, $this->PA->ReadOnly);

			// PS
			$this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, NULL, $this->PS->ReadOnly);

			// PV
			$this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, NULL, $this->PV->ReadOnly);

			// clinicaldetails
			$this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, NULL, $this->clinicaldetails->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "ip_admission") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// HT
		$this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, NULL, FALSE);

		// WT
		$this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, NULL, FALSE);

		// SurfaceArea
		$this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, NULL, FALSE);

		// BodyMassIndex
		$this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, NULL, FALSE);

		// AnticoagulantifAny
		$this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, NULL, FALSE);

		// FoodAllergies
		$this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, NULL, FALSE);

		// GenericAllergies
		$this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, NULL, FALSE);

		// GroupAllergies
		$this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, NULL, FALSE);

		// Temp
		$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, FALSE);

		// Pulse
		$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, FALSE);

		// BP
		$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, FALSE);

		// PR
		$this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, NULL, FALSE);

		// CNS
		$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, FALSE);

		// RSA
		$this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, NULL, FALSE);

		// CVS
		$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, FALSE);

		// PA
		$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, FALSE);

		// PS
		$this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, NULL, FALSE);

		// PV
		$this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, NULL, FALSE);

		// clinicaldetails
		$this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

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
		if ($masterTblVar == "ip_admission") {
			$this->Reception->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->PatientId->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->mrnno->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
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
						case "x_AnticoagulantifAny":
							break;
						case "x_GenericAllergies":
							break;
						case "x_GroupAllergies":
							break;
						case "x_clinicaldetails":
							break;
						case "x_status":
							break;
						case "x_PatientSearch":
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
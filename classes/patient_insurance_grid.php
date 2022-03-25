<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_insurance_grid extends patient_insurance
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_insurance';

	// Page object name
	public $PageObjName = "patient_insurance_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_insurancegrid";
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

		// Table object (patient_insurance)
		if (!isset($GLOBALS["patient_insurance"]) || get_class($GLOBALS["patient_insurance"]) == PROJECT_NAMESPACE . "patient_insurance") {
			$GLOBALS["patient_insurance"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_insurance"];

		}
		$this->AddUrl = "patient_insuranceadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_insurance');

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
		global $EXPORT, $patient_insurance;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient_insurance);
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
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Company->setVisibility();
		$this->AddressInsuranceCarierName->setVisibility();
		$this->ContactName->setVisibility();
		$this->ContactMobile->setVisibility();
		$this->PolicyType->setVisibility();
		$this->PolicyName->setVisibility();
		$this->PolicyNo->setVisibility();
		$this->PolicyAmount->setVisibility();
		$this->RefLetterNo->setVisibility();
		$this->ReferenceBy->setVisibility();
		$this->ReferenceDate->setVisibility();
		$this->DocumentAttatch->Visible = FALSE;
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->mrnno->setVisibility();
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
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue <> $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue <> $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Company") && $CurrentForm->hasValue("o_Company") && $this->Company->CurrentValue <> $this->Company->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AddressInsuranceCarierName") && $CurrentForm->hasValue("o_AddressInsuranceCarierName") && $this->AddressInsuranceCarierName->CurrentValue <> $this->AddressInsuranceCarierName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ContactName") && $CurrentForm->hasValue("o_ContactName") && $this->ContactName->CurrentValue <> $this->ContactName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ContactMobile") && $CurrentForm->hasValue("o_ContactMobile") && $this->ContactMobile->CurrentValue <> $this->ContactMobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PolicyType") && $CurrentForm->hasValue("o_PolicyType") && $this->PolicyType->CurrentValue <> $this->PolicyType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PolicyName") && $CurrentForm->hasValue("o_PolicyName") && $this->PolicyName->CurrentValue <> $this->PolicyName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PolicyNo") && $CurrentForm->hasValue("o_PolicyNo") && $this->PolicyNo->CurrentValue <> $this->PolicyNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PolicyAmount") && $CurrentForm->hasValue("o_PolicyAmount") && $this->PolicyAmount->CurrentValue <> $this->PolicyAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RefLetterNo") && $CurrentForm->hasValue("o_RefLetterNo") && $this->RefLetterNo->CurrentValue <> $this->RefLetterNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReferenceBy") && $CurrentForm->hasValue("o_ReferenceBy") && $this->ReferenceBy->CurrentValue <> $this->ReferenceBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReferenceDate") && $CurrentForm->hasValue("o_ReferenceDate") && $this->ReferenceDate->CurrentValue <> $this->ReferenceDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue <> $this->mrnno->OldValue)
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Company->CurrentValue = NULL;
		$this->Company->OldValue = $this->Company->CurrentValue;
		$this->AddressInsuranceCarierName->CurrentValue = NULL;
		$this->AddressInsuranceCarierName->OldValue = $this->AddressInsuranceCarierName->CurrentValue;
		$this->ContactName->CurrentValue = NULL;
		$this->ContactName->OldValue = $this->ContactName->CurrentValue;
		$this->ContactMobile->CurrentValue = NULL;
		$this->ContactMobile->OldValue = $this->ContactMobile->CurrentValue;
		$this->PolicyType->CurrentValue = NULL;
		$this->PolicyType->OldValue = $this->PolicyType->CurrentValue;
		$this->PolicyName->CurrentValue = NULL;
		$this->PolicyName->OldValue = $this->PolicyName->CurrentValue;
		$this->PolicyNo->CurrentValue = NULL;
		$this->PolicyNo->OldValue = $this->PolicyNo->CurrentValue;
		$this->PolicyAmount->CurrentValue = NULL;
		$this->PolicyAmount->OldValue = $this->PolicyAmount->CurrentValue;
		$this->RefLetterNo->CurrentValue = NULL;
		$this->RefLetterNo->OldValue = $this->RefLetterNo->CurrentValue;
		$this->ReferenceBy->CurrentValue = NULL;
		$this->ReferenceBy->OldValue = $this->ReferenceBy->CurrentValue;
		$this->ReferenceDate->CurrentValue = NULL;
		$this->ReferenceDate->OldValue = $this->ReferenceDate->CurrentValue;
		$this->DocumentAttatch->Upload->DbValue = NULL;
		$this->DocumentAttatch->OldValue = $this->DocumentAttatch->Upload->DbValue;
		$this->DocumentAttatch->Upload->Index = $this->RowIndex;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
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

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		$this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Company' first before field var 'x_Company'
		$val = $CurrentForm->hasValue("Company") ? $CurrentForm->getValue("Company") : $CurrentForm->getValue("x_Company");
		if (!$this->Company->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Company->Visible = FALSE; // Disable update for API request
			else
				$this->Company->setFormValue($val);
		}
		$this->Company->setOldValue($CurrentForm->getValue("o_Company"));

		// Check field name 'AddressInsuranceCarierName' first before field var 'x_AddressInsuranceCarierName'
		$val = $CurrentForm->hasValue("AddressInsuranceCarierName") ? $CurrentForm->getValue("AddressInsuranceCarierName") : $CurrentForm->getValue("x_AddressInsuranceCarierName");
		if (!$this->AddressInsuranceCarierName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AddressInsuranceCarierName->Visible = FALSE; // Disable update for API request
			else
				$this->AddressInsuranceCarierName->setFormValue($val);
		}
		$this->AddressInsuranceCarierName->setOldValue($CurrentForm->getValue("o_AddressInsuranceCarierName"));

		// Check field name 'ContactName' first before field var 'x_ContactName'
		$val = $CurrentForm->hasValue("ContactName") ? $CurrentForm->getValue("ContactName") : $CurrentForm->getValue("x_ContactName");
		if (!$this->ContactName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ContactName->Visible = FALSE; // Disable update for API request
			else
				$this->ContactName->setFormValue($val);
		}
		$this->ContactName->setOldValue($CurrentForm->getValue("o_ContactName"));

		// Check field name 'ContactMobile' first before field var 'x_ContactMobile'
		$val = $CurrentForm->hasValue("ContactMobile") ? $CurrentForm->getValue("ContactMobile") : $CurrentForm->getValue("x_ContactMobile");
		if (!$this->ContactMobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ContactMobile->Visible = FALSE; // Disable update for API request
			else
				$this->ContactMobile->setFormValue($val);
		}
		$this->ContactMobile->setOldValue($CurrentForm->getValue("o_ContactMobile"));

		// Check field name 'PolicyType' first before field var 'x_PolicyType'
		$val = $CurrentForm->hasValue("PolicyType") ? $CurrentForm->getValue("PolicyType") : $CurrentForm->getValue("x_PolicyType");
		if (!$this->PolicyType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PolicyType->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyType->setFormValue($val);
		}
		$this->PolicyType->setOldValue($CurrentForm->getValue("o_PolicyType"));

		// Check field name 'PolicyName' first before field var 'x_PolicyName'
		$val = $CurrentForm->hasValue("PolicyName") ? $CurrentForm->getValue("PolicyName") : $CurrentForm->getValue("x_PolicyName");
		if (!$this->PolicyName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PolicyName->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyName->setFormValue($val);
		}
		$this->PolicyName->setOldValue($CurrentForm->getValue("o_PolicyName"));

		// Check field name 'PolicyNo' first before field var 'x_PolicyNo'
		$val = $CurrentForm->hasValue("PolicyNo") ? $CurrentForm->getValue("PolicyNo") : $CurrentForm->getValue("x_PolicyNo");
		if (!$this->PolicyNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PolicyNo->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyNo->setFormValue($val);
		}
		$this->PolicyNo->setOldValue($CurrentForm->getValue("o_PolicyNo"));

		// Check field name 'PolicyAmount' first before field var 'x_PolicyAmount'
		$val = $CurrentForm->hasValue("PolicyAmount") ? $CurrentForm->getValue("PolicyAmount") : $CurrentForm->getValue("x_PolicyAmount");
		if (!$this->PolicyAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PolicyAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyAmount->setFormValue($val);
		}
		$this->PolicyAmount->setOldValue($CurrentForm->getValue("o_PolicyAmount"));

		// Check field name 'RefLetterNo' first before field var 'x_RefLetterNo'
		$val = $CurrentForm->hasValue("RefLetterNo") ? $CurrentForm->getValue("RefLetterNo") : $CurrentForm->getValue("x_RefLetterNo");
		if (!$this->RefLetterNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefLetterNo->Visible = FALSE; // Disable update for API request
			else
				$this->RefLetterNo->setFormValue($val);
		}
		$this->RefLetterNo->setOldValue($CurrentForm->getValue("o_RefLetterNo"));

		// Check field name 'ReferenceBy' first before field var 'x_ReferenceBy'
		$val = $CurrentForm->hasValue("ReferenceBy") ? $CurrentForm->getValue("ReferenceBy") : $CurrentForm->getValue("x_ReferenceBy");
		if (!$this->ReferenceBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferenceBy->Visible = FALSE; // Disable update for API request
			else
				$this->ReferenceBy->setFormValue($val);
		}
		$this->ReferenceBy->setOldValue($CurrentForm->getValue("o_ReferenceBy"));

		// Check field name 'ReferenceDate' first before field var 'x_ReferenceDate'
		$val = $CurrentForm->hasValue("ReferenceDate") ? $CurrentForm->getValue("ReferenceDate") : $CurrentForm->getValue("x_ReferenceDate");
		if (!$this->ReferenceDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferenceDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReferenceDate->setFormValue($val);
			$this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
		}
		$this->ReferenceDate->setOldValue($CurrentForm->getValue("o_ReferenceDate"));

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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Company->CurrentValue = $this->Company->FormValue;
		$this->AddressInsuranceCarierName->CurrentValue = $this->AddressInsuranceCarierName->FormValue;
		$this->ContactName->CurrentValue = $this->ContactName->FormValue;
		$this->ContactMobile->CurrentValue = $this->ContactMobile->FormValue;
		$this->PolicyType->CurrentValue = $this->PolicyType->FormValue;
		$this->PolicyName->CurrentValue = $this->PolicyName->FormValue;
		$this->PolicyNo->CurrentValue = $this->PolicyNo->FormValue;
		$this->PolicyAmount->CurrentValue = $this->PolicyAmount->FormValue;
		$this->RefLetterNo->CurrentValue = $this->RefLetterNo->FormValue;
		$this->ReferenceBy->CurrentValue = $this->ReferenceBy->FormValue;
		$this->ReferenceDate->CurrentValue = $this->ReferenceDate->FormValue;
		$this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Company->setDbValue($row['Company']);
		$this->AddressInsuranceCarierName->setDbValue($row['AddressInsuranceCarierName']);
		$this->ContactName->setDbValue($row['ContactName']);
		$this->ContactMobile->setDbValue($row['ContactMobile']);
		$this->PolicyType->setDbValue($row['PolicyType']);
		$this->PolicyName->setDbValue($row['PolicyName']);
		$this->PolicyNo->setDbValue($row['PolicyNo']);
		$this->PolicyAmount->setDbValue($row['PolicyAmount']);
		$this->RefLetterNo->setDbValue($row['RefLetterNo']);
		$this->ReferenceBy->setDbValue($row['ReferenceBy']);
		$this->ReferenceDate->setDbValue($row['ReferenceDate']);
		$this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
		$this->DocumentAttatch->setDbValue($this->DocumentAttatch->Upload->DbValue);
		$this->DocumentAttatch->Upload->Index = $this->RowIndex;
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->mrnno->setDbValue($row['mrnno']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Company'] = $this->Company->CurrentValue;
		$row['AddressInsuranceCarierName'] = $this->AddressInsuranceCarierName->CurrentValue;
		$row['ContactName'] = $this->ContactName->CurrentValue;
		$row['ContactMobile'] = $this->ContactMobile->CurrentValue;
		$row['PolicyType'] = $this->PolicyType->CurrentValue;
		$row['PolicyName'] = $this->PolicyName->CurrentValue;
		$row['PolicyNo'] = $this->PolicyNo->CurrentValue;
		$row['PolicyAmount'] = $this->PolicyAmount->CurrentValue;
		$row['RefLetterNo'] = $this->RefLetterNo->CurrentValue;
		$row['ReferenceBy'] = $this->ReferenceBy->CurrentValue;
		$row['ReferenceDate'] = $this->ReferenceDate->CurrentValue;
		$row['DocumentAttatch'] = $this->DocumentAttatch->Upload->DbValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
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
		// Reception
		// PatientId
		// PatientName
		// Company
		// AddressInsuranceCarierName
		// ContactName
		// ContactMobile
		// PolicyType
		// PolicyName
		// PolicyNo
		// PolicyAmount
		// RefLetterNo
		// ReferenceBy
		// ReferenceDate
		// DocumentAttatch
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Company
			$this->Company->ViewValue = $this->Company->CurrentValue;
			$this->Company->ViewCustomAttributes = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->ViewValue = $this->AddressInsuranceCarierName->CurrentValue;
			$this->AddressInsuranceCarierName->ViewCustomAttributes = "";

			// ContactName
			$this->ContactName->ViewValue = $this->ContactName->CurrentValue;
			$this->ContactName->ViewCustomAttributes = "";

			// ContactMobile
			$this->ContactMobile->ViewValue = $this->ContactMobile->CurrentValue;
			$this->ContactMobile->ViewCustomAttributes = "";

			// PolicyType
			$this->PolicyType->ViewValue = $this->PolicyType->CurrentValue;
			$this->PolicyType->ViewCustomAttributes = "";

			// PolicyName
			$this->PolicyName->ViewValue = $this->PolicyName->CurrentValue;
			$this->PolicyName->ViewCustomAttributes = "";

			// PolicyNo
			$this->PolicyNo->ViewValue = $this->PolicyNo->CurrentValue;
			$this->PolicyNo->ViewCustomAttributes = "";

			// PolicyAmount
			$this->PolicyAmount->ViewValue = $this->PolicyAmount->CurrentValue;
			$this->PolicyAmount->ViewCustomAttributes = "";

			// RefLetterNo
			$this->RefLetterNo->ViewValue = $this->RefLetterNo->CurrentValue;
			$this->RefLetterNo->ViewCustomAttributes = "";

			// ReferenceBy
			$this->ReferenceBy->ViewValue = $this->ReferenceBy->CurrentValue;
			$this->ReferenceBy->ViewCustomAttributes = "";

			// ReferenceDate
			$this->ReferenceDate->ViewValue = $this->ReferenceDate->CurrentValue;
			$this->ReferenceDate->ViewValue = FormatDateTime($this->ReferenceDate->ViewValue, 0);
			$this->ReferenceDate->ViewCustomAttributes = "";

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Company
			$this->Company->LinkCustomAttributes = "";
			$this->Company->HrefValue = "";
			$this->Company->TooltipValue = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
			$this->AddressInsuranceCarierName->HrefValue = "";
			$this->AddressInsuranceCarierName->TooltipValue = "";

			// ContactName
			$this->ContactName->LinkCustomAttributes = "";
			$this->ContactName->HrefValue = "";
			$this->ContactName->TooltipValue = "";

			// ContactMobile
			$this->ContactMobile->LinkCustomAttributes = "";
			$this->ContactMobile->HrefValue = "";
			$this->ContactMobile->TooltipValue = "";

			// PolicyType
			$this->PolicyType->LinkCustomAttributes = "";
			$this->PolicyType->HrefValue = "";
			$this->PolicyType->TooltipValue = "";

			// PolicyName
			$this->PolicyName->LinkCustomAttributes = "";
			$this->PolicyName->HrefValue = "";
			$this->PolicyName->TooltipValue = "";

			// PolicyNo
			$this->PolicyNo->LinkCustomAttributes = "";
			$this->PolicyNo->HrefValue = "";
			$this->PolicyNo->TooltipValue = "";

			// PolicyAmount
			$this->PolicyAmount->LinkCustomAttributes = "";
			$this->PolicyAmount->HrefValue = "";
			$this->PolicyAmount->TooltipValue = "";

			// RefLetterNo
			$this->RefLetterNo->LinkCustomAttributes = "";
			$this->RefLetterNo->HrefValue = "";
			$this->RefLetterNo->TooltipValue = "";

			// ReferenceBy
			$this->ReferenceBy->LinkCustomAttributes = "";
			$this->ReferenceBy->HrefValue = "";
			$this->ReferenceBy->TooltipValue = "";

			// ReferenceDate
			$this->ReferenceDate->LinkCustomAttributes = "";
			$this->ReferenceDate->HrefValue = "";
			$this->ReferenceDate->TooltipValue = "";

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

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
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

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() <> "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->PatientId->OldValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";
			} else {
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Company
			$this->Company->EditAttrs["class"] = "form-control";
			$this->Company->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
			$this->Company->EditValue = HtmlEncode($this->Company->CurrentValue);
			$this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
			$this->AddressInsuranceCarierName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->EditValue = HtmlEncode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

			// ContactName
			$this->ContactName->EditAttrs["class"] = "form-control";
			$this->ContactName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
			$this->ContactName->EditValue = HtmlEncode($this->ContactName->CurrentValue);
			$this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

			// ContactMobile
			$this->ContactMobile->EditAttrs["class"] = "form-control";
			$this->ContactMobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->EditValue = HtmlEncode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

			// PolicyType
			$this->PolicyType->EditAttrs["class"] = "form-control";
			$this->PolicyType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
			$this->PolicyType->EditValue = HtmlEncode($this->PolicyType->CurrentValue);
			$this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

			// PolicyName
			$this->PolicyName->EditAttrs["class"] = "form-control";
			$this->PolicyName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
			$this->PolicyName->EditValue = HtmlEncode($this->PolicyName->CurrentValue);
			$this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

			// PolicyNo
			$this->PolicyNo->EditAttrs["class"] = "form-control";
			$this->PolicyNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->EditValue = HtmlEncode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

			// PolicyAmount
			$this->PolicyAmount->EditAttrs["class"] = "form-control";
			$this->PolicyAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->EditValue = HtmlEncode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

			// RefLetterNo
			$this->RefLetterNo->EditAttrs["class"] = "form-control";
			$this->RefLetterNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->EditValue = HtmlEncode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

			// ReferenceBy
			$this->ReferenceBy->EditAttrs["class"] = "form-control";
			$this->ReferenceBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->EditValue = HtmlEncode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

			// ReferenceDate
			$this->ReferenceDate->EditAttrs["class"] = "form-control";
			$this->ReferenceDate->EditCustomAttributes = "";
			$this->ReferenceDate->EditValue = HtmlEncode(FormatDateTime($this->ReferenceDate->CurrentValue, 8));
			$this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
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

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Company
			$this->Company->LinkCustomAttributes = "";
			$this->Company->HrefValue = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
			$this->AddressInsuranceCarierName->HrefValue = "";

			// ContactName
			$this->ContactName->LinkCustomAttributes = "";
			$this->ContactName->HrefValue = "";

			// ContactMobile
			$this->ContactMobile->LinkCustomAttributes = "";
			$this->ContactMobile->HrefValue = "";

			// PolicyType
			$this->PolicyType->LinkCustomAttributes = "";
			$this->PolicyType->HrefValue = "";

			// PolicyName
			$this->PolicyName->LinkCustomAttributes = "";
			$this->PolicyName->HrefValue = "";

			// PolicyNo
			$this->PolicyNo->LinkCustomAttributes = "";
			$this->PolicyNo->HrefValue = "";

			// PolicyAmount
			$this->PolicyAmount->LinkCustomAttributes = "";
			$this->PolicyAmount->HrefValue = "";

			// RefLetterNo
			$this->RefLetterNo->LinkCustomAttributes = "";
			$this->RefLetterNo->HrefValue = "";

			// ReferenceBy
			$this->ReferenceBy->LinkCustomAttributes = "";
			$this->ReferenceBy->HrefValue = "";

			// ReferenceDate
			$this->ReferenceDate->LinkCustomAttributes = "";
			$this->ReferenceDate->HrefValue = "";

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

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Company
			$this->Company->EditAttrs["class"] = "form-control";
			$this->Company->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
			$this->Company->EditValue = HtmlEncode($this->Company->CurrentValue);
			$this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
			$this->AddressInsuranceCarierName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->EditValue = HtmlEncode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

			// ContactName
			$this->ContactName->EditAttrs["class"] = "form-control";
			$this->ContactName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
			$this->ContactName->EditValue = HtmlEncode($this->ContactName->CurrentValue);
			$this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

			// ContactMobile
			$this->ContactMobile->EditAttrs["class"] = "form-control";
			$this->ContactMobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->EditValue = HtmlEncode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

			// PolicyType
			$this->PolicyType->EditAttrs["class"] = "form-control";
			$this->PolicyType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
			$this->PolicyType->EditValue = HtmlEncode($this->PolicyType->CurrentValue);
			$this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

			// PolicyName
			$this->PolicyName->EditAttrs["class"] = "form-control";
			$this->PolicyName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
			$this->PolicyName->EditValue = HtmlEncode($this->PolicyName->CurrentValue);
			$this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

			// PolicyNo
			$this->PolicyNo->EditAttrs["class"] = "form-control";
			$this->PolicyNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->EditValue = HtmlEncode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

			// PolicyAmount
			$this->PolicyAmount->EditAttrs["class"] = "form-control";
			$this->PolicyAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->EditValue = HtmlEncode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

			// RefLetterNo
			$this->RefLetterNo->EditAttrs["class"] = "form-control";
			$this->RefLetterNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->EditValue = HtmlEncode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

			// ReferenceBy
			$this->ReferenceBy->EditAttrs["class"] = "form-control";
			$this->ReferenceBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->EditValue = HtmlEncode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

			// ReferenceDate
			$this->ReferenceDate->EditAttrs["class"] = "form-control";
			$this->ReferenceDate->EditCustomAttributes = "";
			$this->ReferenceDate->EditValue = HtmlEncode(FormatDateTime($this->ReferenceDate->CurrentValue, 8));
			$this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
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

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Company
			$this->Company->LinkCustomAttributes = "";
			$this->Company->HrefValue = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
			$this->AddressInsuranceCarierName->HrefValue = "";

			// ContactName
			$this->ContactName->LinkCustomAttributes = "";
			$this->ContactName->HrefValue = "";

			// ContactMobile
			$this->ContactMobile->LinkCustomAttributes = "";
			$this->ContactMobile->HrefValue = "";

			// PolicyType
			$this->PolicyType->LinkCustomAttributes = "";
			$this->PolicyType->HrefValue = "";

			// PolicyName
			$this->PolicyName->LinkCustomAttributes = "";
			$this->PolicyName->HrefValue = "";

			// PolicyNo
			$this->PolicyNo->LinkCustomAttributes = "";
			$this->PolicyNo->HrefValue = "";

			// PolicyAmount
			$this->PolicyAmount->LinkCustomAttributes = "";
			$this->PolicyAmount->HrefValue = "";

			// RefLetterNo
			$this->RefLetterNo->LinkCustomAttributes = "";
			$this->RefLetterNo->HrefValue = "";

			// ReferenceBy
			$this->ReferenceBy->LinkCustomAttributes = "";
			$this->ReferenceBy->HrefValue = "";

			// ReferenceDate
			$this->ReferenceDate->LinkCustomAttributes = "";
			$this->ReferenceDate->HrefValue = "";

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

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
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
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Company->Required) {
			if (!$this->Company->IsDetailKey && $this->Company->FormValue != NULL && $this->Company->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Company->caption(), $this->Company->RequiredErrorMessage));
			}
		}
		if ($this->AddressInsuranceCarierName->Required) {
			if (!$this->AddressInsuranceCarierName->IsDetailKey && $this->AddressInsuranceCarierName->FormValue != NULL && $this->AddressInsuranceCarierName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AddressInsuranceCarierName->caption(), $this->AddressInsuranceCarierName->RequiredErrorMessage));
			}
		}
		if ($this->ContactName->Required) {
			if (!$this->ContactName->IsDetailKey && $this->ContactName->FormValue != NULL && $this->ContactName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ContactName->caption(), $this->ContactName->RequiredErrorMessage));
			}
		}
		if ($this->ContactMobile->Required) {
			if (!$this->ContactMobile->IsDetailKey && $this->ContactMobile->FormValue != NULL && $this->ContactMobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ContactMobile->caption(), $this->ContactMobile->RequiredErrorMessage));
			}
		}
		if ($this->PolicyType->Required) {
			if (!$this->PolicyType->IsDetailKey && $this->PolicyType->FormValue != NULL && $this->PolicyType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyType->caption(), $this->PolicyType->RequiredErrorMessage));
			}
		}
		if ($this->PolicyName->Required) {
			if (!$this->PolicyName->IsDetailKey && $this->PolicyName->FormValue != NULL && $this->PolicyName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyName->caption(), $this->PolicyName->RequiredErrorMessage));
			}
		}
		if ($this->PolicyNo->Required) {
			if (!$this->PolicyNo->IsDetailKey && $this->PolicyNo->FormValue != NULL && $this->PolicyNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyNo->caption(), $this->PolicyNo->RequiredErrorMessage));
			}
		}
		if ($this->PolicyAmount->Required) {
			if (!$this->PolicyAmount->IsDetailKey && $this->PolicyAmount->FormValue != NULL && $this->PolicyAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyAmount->caption(), $this->PolicyAmount->RequiredErrorMessage));
			}
		}
		if ($this->RefLetterNo->Required) {
			if (!$this->RefLetterNo->IsDetailKey && $this->RefLetterNo->FormValue != NULL && $this->RefLetterNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefLetterNo->caption(), $this->RefLetterNo->RequiredErrorMessage));
			}
		}
		if ($this->ReferenceBy->Required) {
			if (!$this->ReferenceBy->IsDetailKey && $this->ReferenceBy->FormValue != NULL && $this->ReferenceBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferenceBy->caption(), $this->ReferenceBy->RequiredErrorMessage));
			}
		}
		if ($this->ReferenceDate->Required) {
			if (!$this->ReferenceDate->IsDetailKey && $this->ReferenceDate->FormValue != NULL && $this->ReferenceDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferenceDate->caption(), $this->ReferenceDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReferenceDate->FormValue)) {
			AddMessage($FormError, $this->ReferenceDate->errorMessage());
		}
		if ($this->DocumentAttatch->Required) {
			if ($this->DocumentAttatch->Upload->FileName == "" && !$this->DocumentAttatch->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->DocumentAttatch->caption(), $this->DocumentAttatch->RequiredErrorMessage));
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Company
			$this->Company->setDbValueDef($rsnew, $this->Company->CurrentValue, NULL, $this->Company->ReadOnly);

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->setDbValueDef($rsnew, $this->AddressInsuranceCarierName->CurrentValue, NULL, $this->AddressInsuranceCarierName->ReadOnly);

			// ContactName
			$this->ContactName->setDbValueDef($rsnew, $this->ContactName->CurrentValue, NULL, $this->ContactName->ReadOnly);

			// ContactMobile
			$this->ContactMobile->setDbValueDef($rsnew, $this->ContactMobile->CurrentValue, NULL, $this->ContactMobile->ReadOnly);

			// PolicyType
			$this->PolicyType->setDbValueDef($rsnew, $this->PolicyType->CurrentValue, NULL, $this->PolicyType->ReadOnly);

			// PolicyName
			$this->PolicyName->setDbValueDef($rsnew, $this->PolicyName->CurrentValue, NULL, $this->PolicyName->ReadOnly);

			// PolicyNo
			$this->PolicyNo->setDbValueDef($rsnew, $this->PolicyNo->CurrentValue, NULL, $this->PolicyNo->ReadOnly);

			// PolicyAmount
			$this->PolicyAmount->setDbValueDef($rsnew, $this->PolicyAmount->CurrentValue, NULL, $this->PolicyAmount->ReadOnly);

			// RefLetterNo
			$this->RefLetterNo->setDbValueDef($rsnew, $this->RefLetterNo->CurrentValue, NULL, $this->RefLetterNo->ReadOnly);

			// ReferenceBy
			$this->ReferenceBy->setDbValueDef($rsnew, $this->ReferenceBy->CurrentValue, NULL, $this->ReferenceBy->ReadOnly);

			// ReferenceDate
			$this->ReferenceDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReferenceDate->CurrentValue, 0), NULL, $this->ReferenceDate->ReadOnly);

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

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

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Company
		$this->Company->setDbValueDef($rsnew, $this->Company->CurrentValue, NULL, FALSE);

		// AddressInsuranceCarierName
		$this->AddressInsuranceCarierName->setDbValueDef($rsnew, $this->AddressInsuranceCarierName->CurrentValue, NULL, FALSE);

		// ContactName
		$this->ContactName->setDbValueDef($rsnew, $this->ContactName->CurrentValue, NULL, FALSE);

		// ContactMobile
		$this->ContactMobile->setDbValueDef($rsnew, $this->ContactMobile->CurrentValue, NULL, FALSE);

		// PolicyType
		$this->PolicyType->setDbValueDef($rsnew, $this->PolicyType->CurrentValue, NULL, FALSE);

		// PolicyName
		$this->PolicyName->setDbValueDef($rsnew, $this->PolicyName->CurrentValue, NULL, FALSE);

		// PolicyNo
		$this->PolicyNo->setDbValueDef($rsnew, $this->PolicyNo->CurrentValue, NULL, FALSE);

		// PolicyAmount
		$this->PolicyAmount->setDbValueDef($rsnew, $this->PolicyAmount->CurrentValue, NULL, FALSE);

		// RefLetterNo
		$this->RefLetterNo->setDbValueDef($rsnew, $this->RefLetterNo->CurrentValue, NULL, FALSE);

		// ReferenceBy
		$this->ReferenceBy->setDbValueDef($rsnew, $this->ReferenceBy->CurrentValue, NULL, FALSE);

		// ReferenceDate
		$this->ReferenceDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReferenceDate->CurrentValue, 0), NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

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
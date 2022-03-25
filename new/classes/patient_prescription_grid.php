<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_prescription_grid extends patient_prescription
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_prescription';

	// Page object name
	public $PageObjName = "patient_prescription_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_prescriptiongrid";
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

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
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
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

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
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
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
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
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
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

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

		// Table object (patient_prescription)
		if (!isset($GLOBALS["patient_prescription"]) || get_class($GLOBALS["patient_prescription"]) == PROJECT_NAMESPACE . "patient_prescription") {
			$GLOBALS["patient_prescription"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_prescription"];

		}
		$this->AddUrl = "patient_prescriptionadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_prescription');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (user_login)
		$UserTable = $UserTable ?: new user_login();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Export
		global $patient_prescription;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_prescription);
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
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
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
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
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

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
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
	public $DisplayRecords = 20;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 20; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
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
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
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
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Medicine->setVisibility();
		$this->M->setVisibility();
		$this->A->setVisibility();
		$this->N->setVisibility();
		$this->NoOfDays->setVisibility();
		$this->PreRoute->setVisibility();
		$this->TimeOfTaking->setVisibility();
		$this->Type->setVisibility();
		$this->mrnno->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Status->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreateDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
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
		$this->setupLookupOptions($this->Medicine);
		$this->setupLookupOptions($this->PreRoute);
		$this->setupLookupOptions($this->TimeOfTaking);
		$this->setupLookupOptions($this->Status);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
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
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 20; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ip_admission") {
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
					$this->TotalRecords = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecords = $this->Recordset->RecordCount();
				}
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->TotalRecords;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->GridAddRowCount;
			}
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->TotalRecords; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
		}

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new NumericPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
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
		$conn = $this->getConnection();
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
			if ($rowaction != "insertdelete") { // Skip insert then deleted rows
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
							if ($rowkey != "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key != "")
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
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
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
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
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
		$conn = $this->getConnection();

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
			if ($rowaction != "" && $rowaction != "insert")
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
					if ($key != "")
						$key .= Config("COMPOSITE_KEY_SEPARATOR");
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter != "")
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
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Medicine") && $CurrentForm->hasValue("o_Medicine") && $this->Medicine->CurrentValue != $this->Medicine->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_M") && $CurrentForm->hasValue("o_M") && $this->M->CurrentValue != $this->M->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A") && $CurrentForm->hasValue("o_A") && $this->A->CurrentValue != $this->A->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_N") && $CurrentForm->hasValue("o_N") && $this->N->CurrentValue != $this->N->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfDays") && $CurrentForm->hasValue("o_NoOfDays") && $this->NoOfDays->CurrentValue != $this->NoOfDays->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreRoute") && $CurrentForm->hasValue("o_PreRoute") && $this->PreRoute->CurrentValue != $this->PreRoute->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TimeOfTaking") && $CurrentForm->hasValue("o_TimeOfTaking") && $this->TimeOfTaking->CurrentValue != $this->TimeOfTaking->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Type") && $CurrentForm->hasValue("o_Type") && $this->Type->CurrentValue != $this->Type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_profilePic") && $CurrentForm->hasValue("o_profilePic") && $this->profilePic->CurrentValue != $this->profilePic->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue != $this->Status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CreatedBy") && $CurrentForm->hasValue("o_CreatedBy") && $this->CreatedBy->CurrentValue != $this->CreatedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CreateDateTime") && $CurrentForm->hasValue("o_CreateDateTime") && $this->CreateDateTime->CurrentValue != $this->CreateDateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModifiedBy") && $CurrentForm->hasValue("o_ModifiedBy") && $this->ModifiedBy->CurrentValue != $this->ModifiedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModifiedDateTime") && $CurrentForm->hasValue("o_ModifiedDateTime") && $this->ModifiedDateTime->CurrentValue != $this->ModifiedDateTime->OldValue)
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
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
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
		$rows = [];

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
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
			if ($this->getSqlOrderBy() != "") {
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
		if (StartsString("reset", $this->Command)) {

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
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
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
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
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
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode

		// "view"
		$opt = $this->ListOptions["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . " onclick=\"return ew.confirmDelete(this);\"" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex) && $this->RowAction != "delete") {
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
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = $this->OtherOptions["addedit"];
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
			$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = $options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = $options["addedit"];
			$item = $option["add"];
			$this->ShowOtherOptions = $item && $item->Visible;
		}
	}

// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{

		// Hide detail items for dropdown if necessary
		$this->ListOptions->hideDetailItemsForDropDown();
	}

// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
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
		$this->Medicine->CurrentValue = NULL;
		$this->Medicine->OldValue = $this->Medicine->CurrentValue;
		$this->M->CurrentValue = NULL;
		$this->M->OldValue = $this->M->CurrentValue;
		$this->A->CurrentValue = NULL;
		$this->A->OldValue = $this->A->CurrentValue;
		$this->N->CurrentValue = NULL;
		$this->N->OldValue = $this->N->CurrentValue;
		$this->NoOfDays->CurrentValue = NULL;
		$this->NoOfDays->OldValue = $this->NoOfDays->CurrentValue;
		$this->PreRoute->CurrentValue = NULL;
		$this->PreRoute->OldValue = $this->PreRoute->CurrentValue;
		$this->TimeOfTaking->CurrentValue = NULL;
		$this->TimeOfTaking->OldValue = $this->TimeOfTaking->CurrentValue;
		$this->Type->CurrentValue = NULL;
		$this->Type->OldValue = $this->Type->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->CreateDateTime->CurrentValue = NULL;
		$this->CreateDateTime->OldValue = $this->CreateDateTime->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedDateTime->CurrentValue = NULL;
		$this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
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
			if (IsApi() && $val === NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Reception"))
			$this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatientId"))
			$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatientName"))
			$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Medicine' first before field var 'x_Medicine'
		$val = $CurrentForm->hasValue("Medicine") ? $CurrentForm->getValue("Medicine") : $CurrentForm->getValue("x_Medicine");
		if (!$this->Medicine->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Medicine->Visible = FALSE; // Disable update for API request
			else
				$this->Medicine->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Medicine"))
			$this->Medicine->setOldValue($CurrentForm->getValue("o_Medicine"));

		// Check field name 'M' first before field var 'x_M'
		$val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
		if (!$this->M->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->M->Visible = FALSE; // Disable update for API request
			else
				$this->M->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_M"))
			$this->M->setOldValue($CurrentForm->getValue("o_M"));

		// Check field name 'A' first before field var 'x_A'
		$val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
		if (!$this->A->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A->Visible = FALSE; // Disable update for API request
			else
				$this->A->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A"))
			$this->A->setOldValue($CurrentForm->getValue("o_A"));

		// Check field name 'N' first before field var 'x_N'
		$val = $CurrentForm->hasValue("N") ? $CurrentForm->getValue("N") : $CurrentForm->getValue("x_N");
		if (!$this->N->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->N->Visible = FALSE; // Disable update for API request
			else
				$this->N->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_N"))
			$this->N->setOldValue($CurrentForm->getValue("o_N"));

		// Check field name 'NoOfDays' first before field var 'x_NoOfDays'
		$val = $CurrentForm->hasValue("NoOfDays") ? $CurrentForm->getValue("NoOfDays") : $CurrentForm->getValue("x_NoOfDays");
		if (!$this->NoOfDays->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfDays->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfDays->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoOfDays"))
			$this->NoOfDays->setOldValue($CurrentForm->getValue("o_NoOfDays"));

		// Check field name 'PreRoute' first before field var 'x_PreRoute'
		$val = $CurrentForm->hasValue("PreRoute") ? $CurrentForm->getValue("PreRoute") : $CurrentForm->getValue("x_PreRoute");
		if (!$this->PreRoute->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreRoute->Visible = FALSE; // Disable update for API request
			else
				$this->PreRoute->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreRoute"))
			$this->PreRoute->setOldValue($CurrentForm->getValue("o_PreRoute"));

		// Check field name 'TimeOfTaking' first before field var 'x_TimeOfTaking'
		$val = $CurrentForm->hasValue("TimeOfTaking") ? $CurrentForm->getValue("TimeOfTaking") : $CurrentForm->getValue("x_TimeOfTaking");
		if (!$this->TimeOfTaking->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TimeOfTaking->Visible = FALSE; // Disable update for API request
			else
				$this->TimeOfTaking->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TimeOfTaking"))
			$this->TimeOfTaking->setOldValue($CurrentForm->getValue("o_TimeOfTaking"));

		// Check field name 'Type' first before field var 'x_Type'
		$val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
		if (!$this->Type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Type->Visible = FALSE; // Disable update for API request
			else
				$this->Type->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Type"))
			$this->Type->setOldValue($CurrentForm->getValue("o_Type"));

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_mrnno"))
			$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Age"))
			$this->Age->setOldValue($CurrentForm->getValue("o_Age"));

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Gender"))
			$this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_profilePic"))
			$this->profilePic->setOldValue($CurrentForm->getValue("o_profilePic"));

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Status"))
			$this->Status->setOldValue($CurrentForm->getValue("o_Status"));

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CreatedBy"))
			$this->CreatedBy->setOldValue($CurrentForm->getValue("o_CreatedBy"));

		// Check field name 'CreateDateTime' first before field var 'x_CreateDateTime'
		$val = $CurrentForm->hasValue("CreateDateTime") ? $CurrentForm->getValue("CreateDateTime") : $CurrentForm->getValue("x_CreateDateTime");
		if (!$this->CreateDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreateDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreateDateTime->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CreateDateTime"))
			$this->CreateDateTime->setOldValue($CurrentForm->getValue("o_CreateDateTime"));

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ModifiedBy"))
			$this->ModifiedBy->setOldValue($CurrentForm->getValue("o_ModifiedBy"));

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ModifiedDateTime"))
			$this->ModifiedDateTime->setOldValue($CurrentForm->getValue("o_ModifiedDateTime"));
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
		$this->Medicine->CurrentValue = $this->Medicine->FormValue;
		$this->M->CurrentValue = $this->M->FormValue;
		$this->A->CurrentValue = $this->A->FormValue;
		$this->N->CurrentValue = $this->N->FormValue;
		$this->NoOfDays->CurrentValue = $this->NoOfDays->FormValue;
		$this->PreRoute->CurrentValue = $this->PreRoute->FormValue;
		$this->TimeOfTaking->CurrentValue = $this->TimeOfTaking->FormValue;
		$this->Type->CurrentValue = $this->Type->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreateDateTime->CurrentValue = $this->CreateDateTime->FormValue;
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
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
		$conn = $this->getConnection();
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
		$this->Medicine->setDbValue($row['Medicine']);
		$this->M->setDbValue($row['M']);
		$this->A->setDbValue($row['A']);
		$this->N->setDbValue($row['N']);
		$this->NoOfDays->setDbValue($row['NoOfDays']);
		$this->PreRoute->setDbValue($row['PreRoute']);
		if (array_key_exists('EV__PreRoute', $rs->fields)) {
			$this->PreRoute->VirtualValue = $rs->fields('EV__PreRoute'); // Set up virtual field value
		} else {
			$this->PreRoute->VirtualValue = ""; // Clear value
		}
		$this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
		if (array_key_exists('EV__TimeOfTaking', $rs->fields)) {
			$this->TimeOfTaking->VirtualValue = $rs->fields('EV__TimeOfTaking'); // Set up virtual field value
		} else {
			$this->TimeOfTaking->VirtualValue = ""; // Clear value
		}
		$this->Type->setDbValue($row['Type']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Status->setDbValue($row['Status']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreateDateTime->setDbValue($row['CreateDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
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
		$row['Medicine'] = $this->Medicine->CurrentValue;
		$row['M'] = $this->M->CurrentValue;
		$row['A'] = $this->A->CurrentValue;
		$row['N'] = $this->N->CurrentValue;
		$row['NoOfDays'] = $this->NoOfDays->CurrentValue;
		$row['PreRoute'] = $this->PreRoute->CurrentValue;
		$row['TimeOfTaking'] = $this->TimeOfTaking->CurrentValue;
		$row['Type'] = $this->Type->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['CreateDateTime'] = $this->CreateDateTime->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$keys = [$this->RowOldKey];
		$cnt = count($keys);
		if ($cnt >= 1) {
			if (strval($keys[0]) != "")
				$this->id->OldValue = strval($keys[0]); // id
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
			$conn = $this->getConnection();
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
		// Medicine

		$this->Medicine->CellCssStyle = "width: 20px;";

		// M
		// A
		// N
		// NoOfDays
		// PreRoute
		// TimeOfTaking
		// Type

		$this->Type->CellCssStyle = "width: 12px;";

		// mrnno
		// Age
		// Gender
		// profilePic
		// Status
		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime

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

			// Medicine
			$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal != "") {
				$this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
					}
				}
			} else {
				$this->Medicine->ViewValue = NULL;
			}
			$this->Medicine->ViewCustomAttributes = "";

			// M
			$this->M->ViewValue = $this->M->CurrentValue;
			$this->M->ViewCustomAttributes = "";

			// A
			$this->A->ViewValue = $this->A->CurrentValue;
			$this->A->ViewCustomAttributes = "";

			// N
			$this->N->ViewValue = $this->N->CurrentValue;
			$this->N->ViewCustomAttributes = "";

			// NoOfDays
			$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
			$this->NoOfDays->ViewCustomAttributes = "";

			// PreRoute
			if ($this->PreRoute->VirtualValue != "") {
				$this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
			} else {
				$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
				$curVal = strval($this->PreRoute->CurrentValue);
				if ($curVal != "") {
					$this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
					if ($this->PreRoute->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->PreRoute->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
						}
					}
				} else {
					$this->PreRoute->ViewValue = NULL;
				}
			}
			$this->PreRoute->ViewCustomAttributes = "";

			// TimeOfTaking
			if ($this->TimeOfTaking->VirtualValue != "") {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
			} else {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
				$curVal = strval($this->TimeOfTaking->CurrentValue);
				if ($curVal != "") {
					$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
					if ($this->TimeOfTaking->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->TimeOfTaking->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
						}
					}
				} else {
					$this->TimeOfTaking->ViewValue = NULL;
				}
			}
			$this->TimeOfTaking->ViewCustomAttributes = "";

			// Type
			if (strval($this->Type->CurrentValue) != "") {
				$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
			} else {
				$this->Type->ViewValue = NULL;
			}
			$this->Type->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Status
			$curVal = strval($this->Status->CurrentValue);
			if ($curVal != "") {
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
				if ($this->Status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Status->ViewValue = $this->Status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Status->ViewValue = $this->Status->CurrentValue;
					}
				}
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreateDateTime
			$this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
			$this->CreateDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewCustomAttributes = "";

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

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";
			$this->Medicine->TooltipValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";
			$this->M->TooltipValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";
			$this->A->TooltipValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";
			$this->N->TooltipValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";
			$this->NoOfDays->TooltipValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";
			$this->PreRoute->TooltipValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";
			$this->TimeOfTaking->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";
			$this->CreateDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// Reception

			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() != "") {
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
			if ($this->PatientId->getSessionValue() != "") {
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
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Medicine
			$this->Medicine->EditAttrs["class"] = "form-control";
			$this->Medicine->EditCustomAttributes = "";
			if (!$this->Medicine->Raw)
				$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
			$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal != "") {
				$this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
					}
				}
			} else {
				$this->Medicine->EditValue = NULL;
			}
			$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (!$this->M->Raw)
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// N
			$this->N->EditAttrs["class"] = "form-control";
			$this->N->EditCustomAttributes = "";
			if (!$this->N->Raw)
				$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
			$this->N->EditValue = HtmlEncode($this->N->CurrentValue);
			$this->N->PlaceHolder = RemoveHtml($this->N->caption());

			// NoOfDays
			$this->NoOfDays->EditAttrs["class"] = "form-control";
			$this->NoOfDays->EditCustomAttributes = "";
			if (!$this->NoOfDays->Raw)
				$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

			// PreRoute
			$this->PreRoute->EditAttrs["class"] = "form-control";
			$this->PreRoute->EditCustomAttributes = "";
			if (!$this->PreRoute->Raw)
				$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
			$this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
			$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

			// TimeOfTaking
			$this->TimeOfTaking->EditAttrs["class"] = "form-control";
			$this->TimeOfTaking->EditCustomAttributes = "";
			if (!$this->TimeOfTaking->Raw)
				$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

			// Type
			$this->Type->EditAttrs["class"] = "form-control";
			$this->Type->EditCustomAttributes = "";
			$this->Type->EditValue = $this->Type->options(TRUE);

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() != "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->OldValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewCustomAttributes = "";
			} else {
				if (!$this->mrnno->Raw)
					$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
				$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
				$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->CurrentValue));
			if ($curVal != "")
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Status->EditValue = $arwrk;
			}

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (!$this->CreatedBy->Raw)
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreateDateTime
			$this->CreateDateTime->EditAttrs["class"] = "form-control";
			$this->CreateDateTime->EditCustomAttributes = "";
			if (!$this->CreateDateTime->Raw)
				$this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (!$this->ModifiedBy->Raw)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			if (!$this->ModifiedDateTime->Raw)
				$this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

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

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
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
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Medicine
			$this->Medicine->EditAttrs["class"] = "form-control";
			$this->Medicine->EditCustomAttributes = "";
			if (!$this->Medicine->Raw)
				$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
			$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal != "") {
				$this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
					}
				}
			} else {
				$this->Medicine->EditValue = NULL;
			}
			$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (!$this->M->Raw)
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// N
			$this->N->EditAttrs["class"] = "form-control";
			$this->N->EditCustomAttributes = "";
			if (!$this->N->Raw)
				$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
			$this->N->EditValue = HtmlEncode($this->N->CurrentValue);
			$this->N->PlaceHolder = RemoveHtml($this->N->caption());

			// NoOfDays
			$this->NoOfDays->EditAttrs["class"] = "form-control";
			$this->NoOfDays->EditCustomAttributes = "";
			if (!$this->NoOfDays->Raw)
				$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

			// PreRoute
			$this->PreRoute->EditAttrs["class"] = "form-control";
			$this->PreRoute->EditCustomAttributes = "";
			if (!$this->PreRoute->Raw)
				$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
			$this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
			$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

			// TimeOfTaking
			$this->TimeOfTaking->EditAttrs["class"] = "form-control";
			$this->TimeOfTaking->EditCustomAttributes = "";
			if (!$this->TimeOfTaking->Raw)
				$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

			// Type
			$this->Type->EditAttrs["class"] = "form-control";
			$this->Type->EditCustomAttributes = "";
			$this->Type->EditValue = $this->Type->options(TRUE);

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->CurrentValue));
			if ($curVal != "")
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Status->EditValue = $arwrk;
			}

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (!$this->CreatedBy->Raw)
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreateDateTime
			$this->CreateDateTime->EditAttrs["class"] = "form-control";
			$this->CreateDateTime->EditCustomAttributes = "";
			if (!$this->CreateDateTime->Raw)
				$this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (!$this->ModifiedBy->Raw)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			if (!$this->ModifiedDateTime->Raw)
				$this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

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

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
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
		if ($this->Medicine->Required) {
			if (!$this->Medicine->IsDetailKey && $this->Medicine->FormValue != NULL && $this->Medicine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medicine->caption(), $this->Medicine->RequiredErrorMessage));
			}
		}
		if ($this->M->Required) {
			if (!$this->M->IsDetailKey && $this->M->FormValue != NULL && $this->M->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
			}
		}
		if ($this->A->Required) {
			if (!$this->A->IsDetailKey && $this->A->FormValue != NULL && $this->A->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
			}
		}
		if ($this->N->Required) {
			if (!$this->N->IsDetailKey && $this->N->FormValue != NULL && $this->N->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->N->caption(), $this->N->RequiredErrorMessage));
			}
		}
		if ($this->NoOfDays->Required) {
			if (!$this->NoOfDays->IsDetailKey && $this->NoOfDays->FormValue != NULL && $this->NoOfDays->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfDays->caption(), $this->NoOfDays->RequiredErrorMessage));
			}
		}
		if ($this->PreRoute->Required) {
			if (!$this->PreRoute->IsDetailKey && $this->PreRoute->FormValue != NULL && $this->PreRoute->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreRoute->caption(), $this->PreRoute->RequiredErrorMessage));
			}
		}
		if ($this->TimeOfTaking->Required) {
			if (!$this->TimeOfTaking->IsDetailKey && $this->TimeOfTaking->FormValue != NULL && $this->TimeOfTaking->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TimeOfTaking->caption(), $this->TimeOfTaking->RequiredErrorMessage));
			}
		}
		if ($this->Type->Required) {
			if (!$this->Type->IsDetailKey && $this->Type->FormValue != NULL && $this->Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreateDateTime->Required) {
			if (!$this->CreateDateTime->IsDetailKey && $this->CreateDateTime->FormValue != NULL && $this->CreateDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreateDateTime->caption(), $this->CreateDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
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
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
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
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
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
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
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

			// Medicine
			$this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, NULL, $this->Medicine->ReadOnly);

			// M
			$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, NULL, $this->M->ReadOnly);

			// A
			$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, NULL, $this->A->ReadOnly);

			// N
			$this->N->setDbValueDef($rsnew, $this->N->CurrentValue, NULL, $this->N->ReadOnly);

			// NoOfDays
			$this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, NULL, $this->NoOfDays->ReadOnly);

			// PreRoute
			$this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, NULL, $this->PreRoute->ReadOnly);

			// TimeOfTaking
			$this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, NULL, $this->TimeOfTaking->ReadOnly);

			// Type
			$this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, NULL, $this->Type->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, $this->Status->ReadOnly);

			// CreatedBy
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, $this->CreatedBy->ReadOnly);

			// CreateDateTime
			$this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, NULL, $this->CreateDateTime->ReadOnly);

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, $this->ModifiedBy->ReadOnly);

			// ModifiedDateTime
			$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL, $this->ModifiedDateTime->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
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

		// Clean upload path if any
		if ($editRow) {
		}

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
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, 0, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, 0, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Medicine
		$this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, NULL, FALSE);

		// M
		$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, NULL, FALSE);

		// A
		$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, NULL, FALSE);

		// N
		$this->N->setDbValueDef($rsnew, $this->N->CurrentValue, NULL, FALSE);

		// NoOfDays
		$this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, NULL, FALSE);

		// PreRoute
		$this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, NULL, FALSE);

		// TimeOfTaking
		$this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, NULL, FALSE);

		// Type
		$this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, FALSE);

		// CreatedBy
		$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, FALSE);

		// CreateDateTime
		$this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, NULL, FALSE);

		// ModifiedBy
		$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, FALSE);

		// ModifiedDateTime
		$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
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

		// Clean upload path if any
		if ($addRow) {
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

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_Medicine":
					break;
				case "x_PreRoute":
					break;
				case "x_TimeOfTaking":
					break;
				case "x_Type":
					break;
				case "x_Status":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_Medicine":
							break;
						case "x_PreRoute":
							break;
						case "x_TimeOfTaking":
							break;
						case "x_Status":
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
		$this->GridAddRowCount = 20;
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
		//$this->ListOptions["new"]->Body = "xxx";

	}
} // End class
?>
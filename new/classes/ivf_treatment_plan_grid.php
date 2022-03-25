<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_treatment_plan_grid extends ivf_treatment_plan
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_treatment_plan';

	// Page object name
	public $PageObjName = "ivf_treatment_plan_grid";

	// Grid form hidden field names
	public $FormName = "fivf_treatment_plangrid";
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

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS["ivf_treatment_plan"]) || get_class($GLOBALS["ivf_treatment_plan"]) == PROJECT_NAMESPACE . "ivf_treatment_plan") {
			$GLOBALS["ivf_treatment_plan"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["ivf_treatment_plan"];

		}
		$this->AddUrl = "ivf_treatment_planadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_treatment_plan');

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
		global $ivf_treatment_plan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
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
		if ($this->isAddOrEdit())
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
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
	public $SearchFieldsPerRow = 1; // For extended search
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

		// Set up lookup cache
		$this->setupLookupOptions($this->status);

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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf") {
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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_donor_ivf") {
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
		if ($CurrentForm->hasValue("x_TreatmentStartDate") && $CurrentForm->hasValue("o_TreatmentStartDate") && $this->TreatmentStartDate->CurrentValue != $this->TreatmentStartDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_treatment_status") && $CurrentForm->hasValue("o_treatment_status") && $this->treatment_status->CurrentValue != $this->treatment_status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ARTCYCLE") && $CurrentForm->hasValue("o_ARTCYCLE") && $this->ARTCYCLE->CurrentValue != $this->ARTCYCLE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IVFCycleNO") && $CurrentForm->hasValue("o_IVFCycleNO") && $this->IVFCycleNO->CurrentValue != $this->IVFCycleNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Treatment") && $CurrentForm->hasValue("o_Treatment") && $this->Treatment->CurrentValue != $this->Treatment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TreatmentTec") && $CurrentForm->hasValue("o_TreatmentTec") && $this->TreatmentTec->CurrentValue != $this->TreatmentTec->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TypeOfCycle") && $CurrentForm->hasValue("o_TypeOfCycle") && $this->TypeOfCycle->CurrentValue != $this->TypeOfCycle->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SpermOrgin") && $CurrentForm->hasValue("o_SpermOrgin") && $this->SpermOrgin->CurrentValue != $this->SpermOrgin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State") && $CurrentForm->hasValue("o_State") && $this->State->CurrentValue != $this->State->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Origin") && $CurrentForm->hasValue("o_Origin") && $this->Origin->CurrentValue != $this->Origin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MACS") && $CurrentForm->hasValue("o_MACS") && $this->MACS->CurrentValue != $this->MACS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Technique") && $CurrentForm->hasValue("o_Technique") && $this->Technique->CurrentValue != $this->Technique->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PgdPlanning") && $CurrentForm->hasValue("o_PgdPlanning") && $this->PgdPlanning->CurrentValue != $this->PgdPlanning->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IMSI") && $CurrentForm->hasValue("o_IMSI") && $this->IMSI->CurrentValue != $this->IMSI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SequentialCulture") && $CurrentForm->hasValue("o_SequentialCulture") && $this->SequentialCulture->CurrentValue != $this->SequentialCulture->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TimeLapse") && $CurrentForm->hasValue("o_TimeLapse") && $this->TimeLapse->CurrentValue != $this->TimeLapse->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AH") && $CurrentForm->hasValue("o_AH") && $this->AH->CurrentValue != $this->AH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Weight") && $CurrentForm->hasValue("o_Weight") && $this->Weight->CurrentValue != $this->Weight->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BMI") && $CurrentForm->hasValue("o_BMI") && $this->BMI->CurrentValue != $this->BMI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MaleIndications") && $CurrentForm->hasValue("o_MaleIndications") && $this->MaleIndications->CurrentValue != $this->MaleIndications->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FemaleIndications") && $CurrentForm->hasValue("o_FemaleIndications") && $this->FemaleIndications->CurrentValue != $this->FemaleIndications->OldValue)
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
				$this->RIDNO->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->RIDNO->setSessionValue("");
				$this->Name->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
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

		// "copy"
		$opt = $this->ListOptions["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
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
		$links = "";
		$btngrps = "";
		$sqlwrk = "`RIDNO`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_outcome"
		if ($this->DetailPages && $this->DetailPages["ivf_outcome"] && $this->DetailPages["ivf_outcome"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_ivf_outcome"];
			$url = "ivf_outcomepreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_outcome\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan')) {
				$label = $Language->TablePhrase("ivf_outcome", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_outcome\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_outcomelist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_outcome", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_outcome_grid"]))
				$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid();
			if ($GLOBALS["ivf_outcome_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_outcome_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_outcome");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_stimulation_chart"
		if ($this->DetailPages && $this->DetailPages["ivf_stimulation_chart"] && $this->DetailPages["ivf_stimulation_chart"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_ivf_stimulation_chart"];
			$url = "ivf_stimulation_chartpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_stimulation_chart\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan')) {
				$label = $Language->TablePhrase("ivf_stimulation_chart", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_stimulation_chart\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_stimulation_chartlist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_stimulation_chart", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
				$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid();
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_stimulation_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`PatientName`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_semenanalysisreport"
		if ($this->DetailPages && $this->DetailPages["ivf_semenanalysisreport"] && $this->DetailPages["ivf_semenanalysisreport"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_ivf_semenanalysisreport"];
			$url = "ivf_semenanalysisreportpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan')) {
				$label = $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_semenanalysisreportlist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
				$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_semenanalysisreport");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
		$sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";
		$sqlwrk = $sqlwrk . " AND " . "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_ivf_embryology_chart"
		if ($this->DetailPages && $this->DetailPages["ivf_embryology_chart"] && $this->DetailPages["ivf_embryology_chart"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_ivf_embryology_chart"];
			$url = "ivf_embryology_chartpreview.php?t=ivf_treatment_plan&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan')) {
				$label = $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_embryology_chartlist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_treatment_plan&fk_RIDNO=" . urlencode(strval($this->RIDNO->CurrentValue)) . "&fk_Name=" . urlencode(strval($this->Name->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_embryology_chart", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
				$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_treatment_plan')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}

		// Hide detail items if necessary
		$this->ListOptions->hideDetailItemsForDropDown();

		// Column "preview"
		$option = $this->ListOptions["preview"];
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
				$option->Visible = $links != "";
		}

		// Column "details" (Multiple details)
		$option = $this->ListOptions["details"];
		if ($option) {
			$option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
			if ($option->Visible)
				$option->Visible = $links != "";
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
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->TreatmentStartDate->CurrentValue = NULL;
		$this->TreatmentStartDate->OldValue = $this->TreatmentStartDate->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->treatment_status->CurrentValue = 'On Going';
		$this->treatment_status->OldValue = $this->treatment_status->CurrentValue;
		$this->ARTCYCLE->CurrentValue = NULL;
		$this->ARTCYCLE->OldValue = $this->ARTCYCLE->CurrentValue;
		$this->IVFCycleNO->CurrentValue = NULL;
		$this->IVFCycleNO->OldValue = $this->IVFCycleNO->CurrentValue;
		$this->RESULT->CurrentValue = NULL;
		$this->RESULT->OldValue = $this->RESULT->CurrentValue;
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
		$this->TreatementStopDate->CurrentValue = NULL;
		$this->TreatementStopDate->OldValue = $this->TreatementStopDate->CurrentValue;
		$this->TypePatient->CurrentValue = NULL;
		$this->TypePatient->OldValue = $this->TypePatient->CurrentValue;
		$this->Treatment->CurrentValue = NULL;
		$this->Treatment->OldValue = $this->Treatment->CurrentValue;
		$this->TreatmentTec->CurrentValue = NULL;
		$this->TreatmentTec->OldValue = $this->TreatmentTec->CurrentValue;
		$this->TypeOfCycle->CurrentValue = NULL;
		$this->TypeOfCycle->OldValue = $this->TypeOfCycle->CurrentValue;
		$this->SpermOrgin->CurrentValue = NULL;
		$this->SpermOrgin->OldValue = $this->SpermOrgin->CurrentValue;
		$this->State->CurrentValue = NULL;
		$this->State->OldValue = $this->State->CurrentValue;
		$this->Origin->CurrentValue = NULL;
		$this->Origin->OldValue = $this->Origin->CurrentValue;
		$this->MACS->CurrentValue = NULL;
		$this->MACS->OldValue = $this->MACS->CurrentValue;
		$this->Technique->CurrentValue = NULL;
		$this->Technique->OldValue = $this->Technique->CurrentValue;
		$this->PgdPlanning->CurrentValue = NULL;
		$this->PgdPlanning->OldValue = $this->PgdPlanning->CurrentValue;
		$this->IMSI->CurrentValue = NULL;
		$this->IMSI->OldValue = $this->IMSI->CurrentValue;
		$this->SequentialCulture->CurrentValue = NULL;
		$this->SequentialCulture->OldValue = $this->SequentialCulture->CurrentValue;
		$this->TimeLapse->CurrentValue = NULL;
		$this->TimeLapse->OldValue = $this->TimeLapse->CurrentValue;
		$this->AH->CurrentValue = NULL;
		$this->AH->OldValue = $this->AH->CurrentValue;
		$this->Weight->CurrentValue = NULL;
		$this->Weight->OldValue = $this->Weight->CurrentValue;
		$this->BMI->CurrentValue = NULL;
		$this->BMI->OldValue = $this->BMI->CurrentValue;
		$this->MaleIndications->CurrentValue = NULL;
		$this->MaleIndications->OldValue = $this->MaleIndications->CurrentValue;
		$this->FemaleIndications->CurrentValue = NULL;
		$this->FemaleIndications->OldValue = $this->FemaleIndications->CurrentValue;
		$this->UseOfThe->CurrentValue = NULL;
		$this->UseOfThe->OldValue = $this->UseOfThe->CurrentValue;
		$this->Ectopic->CurrentValue = NULL;
		$this->Ectopic->OldValue = $this->Ectopic->CurrentValue;
		$this->Heterotopic->CurrentValue = NULL;
		$this->Heterotopic->OldValue = $this->Heterotopic->CurrentValue;
		$this->TransferDFE->CurrentValue = NULL;
		$this->TransferDFE->OldValue = $this->TransferDFE->CurrentValue;
		$this->Evolutive->CurrentValue = NULL;
		$this->Evolutive->OldValue = $this->Evolutive->CurrentValue;
		$this->Number->CurrentValue = NULL;
		$this->Number->OldValue = $this->Number->CurrentValue;
		$this->SequentialCult->CurrentValue = NULL;
		$this->SequentialCult->OldValue = $this->SequentialCult->CurrentValue;
		$this->TineLapse->CurrentValue = NULL;
		$this->TineLapse->OldValue = $this->TineLapse->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PartnerID->CurrentValue = NULL;
		$this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
		$this->WifeCell->CurrentValue = NULL;
		$this->WifeCell->OldValue = $this->WifeCell->CurrentValue;
		$this->HusbandCell->CurrentValue = NULL;
		$this->HusbandCell->OldValue = $this->HusbandCell->CurrentValue;
		$this->CoupleID->CurrentValue = NULL;
		$this->CoupleID->OldValue = $this->CoupleID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'TreatmentStartDate' first before field var 'x_TreatmentStartDate'
		$val = $CurrentForm->hasValue("TreatmentStartDate") ? $CurrentForm->getValue("TreatmentStartDate") : $CurrentForm->getValue("x_TreatmentStartDate");
		if (!$this->TreatmentStartDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TreatmentStartDate->Visible = FALSE; // Disable update for API request
			else
				$this->TreatmentStartDate->setFormValue($val);
			$this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7);
		}
		if ($CurrentForm->hasValue("o_TreatmentStartDate"))
			$this->TreatmentStartDate->setOldValue($CurrentForm->getValue("o_TreatmentStartDate"));

		// Check field name 'treatment_status' first before field var 'x_treatment_status'
		$val = $CurrentForm->hasValue("treatment_status") ? $CurrentForm->getValue("treatment_status") : $CurrentForm->getValue("x_treatment_status");
		if (!$this->treatment_status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->treatment_status->Visible = FALSE; // Disable update for API request
			else
				$this->treatment_status->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_treatment_status"))
			$this->treatment_status->setOldValue($CurrentForm->getValue("o_treatment_status"));

		// Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
		$val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
		if (!$this->ARTCYCLE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ARTCYCLE->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCYCLE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ARTCYCLE"))
			$this->ARTCYCLE->setOldValue($CurrentForm->getValue("o_ARTCYCLE"));

		// Check field name 'IVFCycleNO' first before field var 'x_IVFCycleNO'
		$val = $CurrentForm->hasValue("IVFCycleNO") ? $CurrentForm->getValue("IVFCycleNO") : $CurrentForm->getValue("x_IVFCycleNO");
		if (!$this->IVFCycleNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IVFCycleNO->Visible = FALSE; // Disable update for API request
			else
				$this->IVFCycleNO->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_IVFCycleNO"))
			$this->IVFCycleNO->setOldValue($CurrentForm->getValue("o_IVFCycleNO"));

		// Check field name 'Treatment' first before field var 'x_Treatment'
		$val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
		if (!$this->Treatment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Treatment->Visible = FALSE; // Disable update for API request
			else
				$this->Treatment->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Treatment"))
			$this->Treatment->setOldValue($CurrentForm->getValue("o_Treatment"));

		// Check field name 'TreatmentTec' first before field var 'x_TreatmentTec'
		$val = $CurrentForm->hasValue("TreatmentTec") ? $CurrentForm->getValue("TreatmentTec") : $CurrentForm->getValue("x_TreatmentTec");
		if (!$this->TreatmentTec->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TreatmentTec->Visible = FALSE; // Disable update for API request
			else
				$this->TreatmentTec->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TreatmentTec"))
			$this->TreatmentTec->setOldValue($CurrentForm->getValue("o_TreatmentTec"));

		// Check field name 'TypeOfCycle' first before field var 'x_TypeOfCycle'
		$val = $CurrentForm->hasValue("TypeOfCycle") ? $CurrentForm->getValue("TypeOfCycle") : $CurrentForm->getValue("x_TypeOfCycle");
		if (!$this->TypeOfCycle->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TypeOfCycle->Visible = FALSE; // Disable update for API request
			else
				$this->TypeOfCycle->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TypeOfCycle"))
			$this->TypeOfCycle->setOldValue($CurrentForm->getValue("o_TypeOfCycle"));

		// Check field name 'SpermOrgin' first before field var 'x_SpermOrgin'
		$val = $CurrentForm->hasValue("SpermOrgin") ? $CurrentForm->getValue("SpermOrgin") : $CurrentForm->getValue("x_SpermOrgin");
		if (!$this->SpermOrgin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SpermOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->SpermOrgin->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SpermOrgin"))
			$this->SpermOrgin->setOldValue($CurrentForm->getValue("o_SpermOrgin"));

		// Check field name 'State' first before field var 'x_State'
		$val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
		if (!$this->State->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->State->Visible = FALSE; // Disable update for API request
			else
				$this->State->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_State"))
			$this->State->setOldValue($CurrentForm->getValue("o_State"));

		// Check field name 'Origin' first before field var 'x_Origin'
		$val = $CurrentForm->hasValue("Origin") ? $CurrentForm->getValue("Origin") : $CurrentForm->getValue("x_Origin");
		if (!$this->Origin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Origin->Visible = FALSE; // Disable update for API request
			else
				$this->Origin->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Origin"))
			$this->Origin->setOldValue($CurrentForm->getValue("o_Origin"));

		// Check field name 'MACS' first before field var 'x_MACS'
		$val = $CurrentForm->hasValue("MACS") ? $CurrentForm->getValue("MACS") : $CurrentForm->getValue("x_MACS");
		if (!$this->MACS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MACS->Visible = FALSE; // Disable update for API request
			else
				$this->MACS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MACS"))
			$this->MACS->setOldValue($CurrentForm->getValue("o_MACS"));

		// Check field name 'Technique' first before field var 'x_Technique'
		$val = $CurrentForm->hasValue("Technique") ? $CurrentForm->getValue("Technique") : $CurrentForm->getValue("x_Technique");
		if (!$this->Technique->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Technique->Visible = FALSE; // Disable update for API request
			else
				$this->Technique->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Technique"))
			$this->Technique->setOldValue($CurrentForm->getValue("o_Technique"));

		// Check field name 'PgdPlanning' first before field var 'x_PgdPlanning'
		$val = $CurrentForm->hasValue("PgdPlanning") ? $CurrentForm->getValue("PgdPlanning") : $CurrentForm->getValue("x_PgdPlanning");
		if (!$this->PgdPlanning->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PgdPlanning->Visible = FALSE; // Disable update for API request
			else
				$this->PgdPlanning->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PgdPlanning"))
			$this->PgdPlanning->setOldValue($CurrentForm->getValue("o_PgdPlanning"));

		// Check field name 'IMSI' first before field var 'x_IMSI'
		$val = $CurrentForm->hasValue("IMSI") ? $CurrentForm->getValue("IMSI") : $CurrentForm->getValue("x_IMSI");
		if (!$this->IMSI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IMSI->Visible = FALSE; // Disable update for API request
			else
				$this->IMSI->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_IMSI"))
			$this->IMSI->setOldValue($CurrentForm->getValue("o_IMSI"));

		// Check field name 'SequentialCulture' first before field var 'x_SequentialCulture'
		$val = $CurrentForm->hasValue("SequentialCulture") ? $CurrentForm->getValue("SequentialCulture") : $CurrentForm->getValue("x_SequentialCulture");
		if (!$this->SequentialCulture->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SequentialCulture->Visible = FALSE; // Disable update for API request
			else
				$this->SequentialCulture->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SequentialCulture"))
			$this->SequentialCulture->setOldValue($CurrentForm->getValue("o_SequentialCulture"));

		// Check field name 'TimeLapse' first before field var 'x_TimeLapse'
		$val = $CurrentForm->hasValue("TimeLapse") ? $CurrentForm->getValue("TimeLapse") : $CurrentForm->getValue("x_TimeLapse");
		if (!$this->TimeLapse->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TimeLapse->Visible = FALSE; // Disable update for API request
			else
				$this->TimeLapse->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TimeLapse"))
			$this->TimeLapse->setOldValue($CurrentForm->getValue("o_TimeLapse"));

		// Check field name 'AH' first before field var 'x_AH'
		$val = $CurrentForm->hasValue("AH") ? $CurrentForm->getValue("AH") : $CurrentForm->getValue("x_AH");
		if (!$this->AH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AH->Visible = FALSE; // Disable update for API request
			else
				$this->AH->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AH"))
			$this->AH->setOldValue($CurrentForm->getValue("o_AH"));

		// Check field name 'Weight' first before field var 'x_Weight'
		$val = $CurrentForm->hasValue("Weight") ? $CurrentForm->getValue("Weight") : $CurrentForm->getValue("x_Weight");
		if (!$this->Weight->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Weight->Visible = FALSE; // Disable update for API request
			else
				$this->Weight->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Weight"))
			$this->Weight->setOldValue($CurrentForm->getValue("o_Weight"));

		// Check field name 'BMI' first before field var 'x_BMI'
		$val = $CurrentForm->hasValue("BMI") ? $CurrentForm->getValue("BMI") : $CurrentForm->getValue("x_BMI");
		if (!$this->BMI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BMI->Visible = FALSE; // Disable update for API request
			else
				$this->BMI->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BMI"))
			$this->BMI->setOldValue($CurrentForm->getValue("o_BMI"));

		// Check field name 'MaleIndications' first before field var 'x_MaleIndications'
		$val = $CurrentForm->hasValue("MaleIndications") ? $CurrentForm->getValue("MaleIndications") : $CurrentForm->getValue("x_MaleIndications");
		if (!$this->MaleIndications->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MaleIndications->Visible = FALSE; // Disable update for API request
			else
				$this->MaleIndications->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MaleIndications"))
			$this->MaleIndications->setOldValue($CurrentForm->getValue("o_MaleIndications"));

		// Check field name 'FemaleIndications' first before field var 'x_FemaleIndications'
		$val = $CurrentForm->hasValue("FemaleIndications") ? $CurrentForm->getValue("FemaleIndications") : $CurrentForm->getValue("x_FemaleIndications");
		if (!$this->FemaleIndications->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FemaleIndications->Visible = FALSE; // Disable update for API request
			else
				$this->FemaleIndications->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_FemaleIndications"))
			$this->FemaleIndications->setOldValue($CurrentForm->getValue("o_FemaleIndications"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->TreatmentStartDate->CurrentValue = $this->TreatmentStartDate->FormValue;
		$this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7);
		$this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
		$this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
		$this->IVFCycleNO->CurrentValue = $this->IVFCycleNO->FormValue;
		$this->Treatment->CurrentValue = $this->Treatment->FormValue;
		$this->TreatmentTec->CurrentValue = $this->TreatmentTec->FormValue;
		$this->TypeOfCycle->CurrentValue = $this->TypeOfCycle->FormValue;
		$this->SpermOrgin->CurrentValue = $this->SpermOrgin->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Origin->CurrentValue = $this->Origin->FormValue;
		$this->MACS->CurrentValue = $this->MACS->FormValue;
		$this->Technique->CurrentValue = $this->Technique->FormValue;
		$this->PgdPlanning->CurrentValue = $this->PgdPlanning->FormValue;
		$this->IMSI->CurrentValue = $this->IMSI->FormValue;
		$this->SequentialCulture->CurrentValue = $this->SequentialCulture->FormValue;
		$this->TimeLapse->CurrentValue = $this->TimeLapse->FormValue;
		$this->AH->CurrentValue = $this->AH->FormValue;
		$this->Weight->CurrentValue = $this->Weight->FormValue;
		$this->BMI->CurrentValue = $this->BMI->FormValue;
		$this->MaleIndications->CurrentValue = $this->MaleIndications->FormValue;
		$this->FemaleIndications->CurrentValue = $this->FemaleIndications->FormValue;
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
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
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['TreatmentStartDate'] = $this->TreatmentStartDate->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['treatment_status'] = $this->treatment_status->CurrentValue;
		$row['ARTCYCLE'] = $this->ARTCYCLE->CurrentValue;
		$row['IVFCycleNO'] = $this->IVFCycleNO->CurrentValue;
		$row['RESULT'] = $this->RESULT->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['TreatementStopDate'] = $this->TreatementStopDate->CurrentValue;
		$row['TypePatient'] = $this->TypePatient->CurrentValue;
		$row['Treatment'] = $this->Treatment->CurrentValue;
		$row['TreatmentTec'] = $this->TreatmentTec->CurrentValue;
		$row['TypeOfCycle'] = $this->TypeOfCycle->CurrentValue;
		$row['SpermOrgin'] = $this->SpermOrgin->CurrentValue;
		$row['State'] = $this->State->CurrentValue;
		$row['Origin'] = $this->Origin->CurrentValue;
		$row['MACS'] = $this->MACS->CurrentValue;
		$row['Technique'] = $this->Technique->CurrentValue;
		$row['PgdPlanning'] = $this->PgdPlanning->CurrentValue;
		$row['IMSI'] = $this->IMSI->CurrentValue;
		$row['SequentialCulture'] = $this->SequentialCulture->CurrentValue;
		$row['TimeLapse'] = $this->TimeLapse->CurrentValue;
		$row['AH'] = $this->AH->CurrentValue;
		$row['Weight'] = $this->Weight->CurrentValue;
		$row['BMI'] = $this->BMI->CurrentValue;
		$row['MaleIndications'] = $this->MaleIndications->CurrentValue;
		$row['FemaleIndications'] = $this->FemaleIndications->CurrentValue;
		$row['UseOfThe'] = $this->UseOfThe->CurrentValue;
		$row['Ectopic'] = $this->Ectopic->CurrentValue;
		$row['Heterotopic'] = $this->Heterotopic->CurrentValue;
		$row['TransferDFE'] = $this->TransferDFE->CurrentValue;
		$row['Evolutive'] = $this->Evolutive->CurrentValue;
		$row['Number'] = $this->Number->CurrentValue;
		$row['SequentialCult'] = $this->SequentialCult->CurrentValue;
		$row['TineLapse'] = $this->TineLapse->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PartnerID'] = $this->PartnerID->CurrentValue;
		$row['WifeCell'] = $this->WifeCell->CurrentValue;
		$row['HusbandCell'] = $this->HusbandCell->CurrentValue;
		$row['CoupleID'] = $this->CoupleID->CurrentValue;
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
			if (strval($this->treatment_status->CurrentValue) != "") {
				$this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
			} else {
				$this->treatment_status->ViewValue = NULL;
			}
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) != "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// IVFCycleNO
			$this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
			$this->IVFCycleNO->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) != "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal != "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
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
			if (strval($this->Treatment->CurrentValue) != "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			if (strval($this->TypeOfCycle->CurrentValue) != "") {
				$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
			} else {
				$this->TypeOfCycle->ViewValue = NULL;
			}
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			if (strval($this->SpermOrgin->CurrentValue) != "") {
				$this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
			} else {
				$this->SpermOrgin->ViewValue = NULL;
			}
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			if (strval($this->State->CurrentValue) != "") {
				$this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
			} else {
				$this->State->ViewValue = NULL;
			}
			$this->State->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			if (strval($this->MACS->CurrentValue) != "") {
				$this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
			} else {
				$this->MACS->ViewValue = NULL;
			}
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			if (strval($this->PgdPlanning->CurrentValue) != "") {
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
			if (strval($this->MaleIndications->CurrentValue) != "") {
				$this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
			} else {
				$this->MaleIndications->ViewValue = NULL;
			}
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			if (strval($this->FemaleIndications->CurrentValue) != "") {
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
			if (strval($this->Heterotopic->CurrentValue) != "") {
				$this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
			} else {
				$this->Heterotopic->ViewValue = NULL;
			}
			$this->Heterotopic->ViewCustomAttributes = "";

			// TransferDFE
			if (strval($this->TransferDFE->CurrentValue) != "") {
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
			if (strval($this->TineLapse->CurrentValue) != "") {
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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// TreatmentStartDate
			$this->TreatmentStartDate->EditAttrs["class"] = "form-control";
			$this->TreatmentStartDate->EditCustomAttributes = "";
			$this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime($this->TreatmentStartDate->CurrentValue, 7));
			$this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

			// treatment_status
			$this->treatment_status->EditAttrs["class"] = "form-control";
			$this->treatment_status->EditCustomAttributes = "";
			$this->treatment_status->EditValue = $this->treatment_status->options(TRUE);

			// ARTCYCLE
			$this->ARTCYCLE->EditCustomAttributes = "";
			$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(FALSE);

			// IVFCycleNO
			$this->IVFCycleNO->EditAttrs["class"] = "form-control";
			$this->IVFCycleNO->EditCustomAttributes = "";
			if (!$this->IVFCycleNO->Raw)
				$this->IVFCycleNO->CurrentValue = HtmlDecode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->EditValue = HtmlEncode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->PlaceHolder = RemoveHtml($this->IVFCycleNO->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			$this->Treatment->EditValue = $this->Treatment->options(TRUE);

			// TreatmentTec
			$this->TreatmentTec->EditAttrs["class"] = "form-control";
			$this->TreatmentTec->EditCustomAttributes = "";
			if (!$this->TreatmentTec->Raw)
				$this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

			// TypeOfCycle
			$this->TypeOfCycle->EditCustomAttributes = "";
			$this->TypeOfCycle->EditValue = $this->TypeOfCycle->options(FALSE);

			// SpermOrgin
			$this->SpermOrgin->EditAttrs["class"] = "form-control";
			$this->SpermOrgin->EditCustomAttributes = "";
			$this->SpermOrgin->EditValue = $this->SpermOrgin->options(TRUE);

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			$this->State->EditValue = $this->State->options(TRUE);

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			if (!$this->Origin->Raw)
				$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
			$this->Origin->EditValue = HtmlEncode($this->Origin->CurrentValue);
			$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

			// MACS
			$this->MACS->EditCustomAttributes = "";
			$this->MACS->EditValue = $this->MACS->options(FALSE);

			// Technique
			$this->Technique->EditAttrs["class"] = "form-control";
			$this->Technique->EditCustomAttributes = "";
			if (!$this->Technique->Raw)
				$this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
			$this->Technique->EditValue = HtmlEncode($this->Technique->CurrentValue);
			$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

			// PgdPlanning
			$this->PgdPlanning->EditCustomAttributes = "";
			$this->PgdPlanning->EditValue = $this->PgdPlanning->options(FALSE);

			// IMSI
			$this->IMSI->EditAttrs["class"] = "form-control";
			$this->IMSI->EditCustomAttributes = "";
			if (!$this->IMSI->Raw)
				$this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
			$this->IMSI->EditValue = HtmlEncode($this->IMSI->CurrentValue);
			$this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

			// SequentialCulture
			$this->SequentialCulture->EditAttrs["class"] = "form-control";
			$this->SequentialCulture->EditCustomAttributes = "";
			if (!$this->SequentialCulture->Raw)
				$this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

			// TimeLapse
			$this->TimeLapse->EditAttrs["class"] = "form-control";
			$this->TimeLapse->EditCustomAttributes = "";
			if (!$this->TimeLapse->Raw)
				$this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

			// AH
			$this->AH->EditAttrs["class"] = "form-control";
			$this->AH->EditCustomAttributes = "";
			if (!$this->AH->Raw)
				$this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
			$this->AH->EditValue = HtmlEncode($this->AH->CurrentValue);
			$this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

			// Weight
			$this->Weight->EditAttrs["class"] = "form-control";
			$this->Weight->EditCustomAttributes = "";
			if (!$this->Weight->Raw)
				$this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
			$this->Weight->EditValue = HtmlEncode($this->Weight->CurrentValue);
			$this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

			// BMI
			$this->BMI->EditAttrs["class"] = "form-control";
			$this->BMI->EditCustomAttributes = "";
			if (!$this->BMI->Raw)
				$this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
			$this->BMI->EditValue = HtmlEncode($this->BMI->CurrentValue);
			$this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

			// MaleIndications
			$this->MaleIndications->EditAttrs["class"] = "form-control";
			$this->MaleIndications->EditCustomAttributes = "";
			$this->MaleIndications->EditValue = $this->MaleIndications->options(TRUE);

			// FemaleIndications
			$this->FemaleIndications->EditAttrs["class"] = "form-control";
			$this->FemaleIndications->EditCustomAttributes = "";
			$this->FemaleIndications->EditValue = $this->FemaleIndications->options(TRUE);

			// Add refer script
			// TreatmentStartDate

			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// TreatmentStartDate
			$this->TreatmentStartDate->EditAttrs["class"] = "form-control";
			$this->TreatmentStartDate->EditCustomAttributes = "";
			$this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime($this->TreatmentStartDate->CurrentValue, 7));
			$this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

			// treatment_status
			$this->treatment_status->EditAttrs["class"] = "form-control";
			$this->treatment_status->EditCustomAttributes = "";
			$this->treatment_status->EditValue = $this->treatment_status->options(TRUE);

			// ARTCYCLE
			$this->ARTCYCLE->EditCustomAttributes = "";
			$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(FALSE);

			// IVFCycleNO
			$this->IVFCycleNO->EditAttrs["class"] = "form-control";
			$this->IVFCycleNO->EditCustomAttributes = "";
			if (!$this->IVFCycleNO->Raw)
				$this->IVFCycleNO->CurrentValue = HtmlDecode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->EditValue = HtmlEncode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->PlaceHolder = RemoveHtml($this->IVFCycleNO->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			$this->Treatment->EditValue = $this->Treatment->options(TRUE);

			// TreatmentTec
			$this->TreatmentTec->EditAttrs["class"] = "form-control";
			$this->TreatmentTec->EditCustomAttributes = "";
			if (!$this->TreatmentTec->Raw)
				$this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

			// TypeOfCycle
			$this->TypeOfCycle->EditCustomAttributes = "";
			$this->TypeOfCycle->EditValue = $this->TypeOfCycle->options(FALSE);

			// SpermOrgin
			$this->SpermOrgin->EditAttrs["class"] = "form-control";
			$this->SpermOrgin->EditCustomAttributes = "";
			$this->SpermOrgin->EditValue = $this->SpermOrgin->options(TRUE);

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			$this->State->EditValue = $this->State->options(TRUE);

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			if (!$this->Origin->Raw)
				$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
			$this->Origin->EditValue = HtmlEncode($this->Origin->CurrentValue);
			$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

			// MACS
			$this->MACS->EditCustomAttributes = "";
			$this->MACS->EditValue = $this->MACS->options(FALSE);

			// Technique
			$this->Technique->EditAttrs["class"] = "form-control";
			$this->Technique->EditCustomAttributes = "";
			if (!$this->Technique->Raw)
				$this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
			$this->Technique->EditValue = HtmlEncode($this->Technique->CurrentValue);
			$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

			// PgdPlanning
			$this->PgdPlanning->EditCustomAttributes = "";
			$this->PgdPlanning->EditValue = $this->PgdPlanning->options(FALSE);

			// IMSI
			$this->IMSI->EditAttrs["class"] = "form-control";
			$this->IMSI->EditCustomAttributes = "";
			if (!$this->IMSI->Raw)
				$this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
			$this->IMSI->EditValue = HtmlEncode($this->IMSI->CurrentValue);
			$this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

			// SequentialCulture
			$this->SequentialCulture->EditAttrs["class"] = "form-control";
			$this->SequentialCulture->EditCustomAttributes = "";
			if (!$this->SequentialCulture->Raw)
				$this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

			// TimeLapse
			$this->TimeLapse->EditAttrs["class"] = "form-control";
			$this->TimeLapse->EditCustomAttributes = "";
			if (!$this->TimeLapse->Raw)
				$this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

			// AH
			$this->AH->EditAttrs["class"] = "form-control";
			$this->AH->EditCustomAttributes = "";
			if (!$this->AH->Raw)
				$this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
			$this->AH->EditValue = HtmlEncode($this->AH->CurrentValue);
			$this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

			// Weight
			$this->Weight->EditAttrs["class"] = "form-control";
			$this->Weight->EditCustomAttributes = "";
			if (!$this->Weight->Raw)
				$this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
			$this->Weight->EditValue = HtmlEncode($this->Weight->CurrentValue);
			$this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

			// BMI
			$this->BMI->EditAttrs["class"] = "form-control";
			$this->BMI->EditCustomAttributes = "";
			if (!$this->BMI->Raw)
				$this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
			$this->BMI->EditValue = HtmlEncode($this->BMI->CurrentValue);
			$this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

			// MaleIndications
			$this->MaleIndications->EditAttrs["class"] = "form-control";
			$this->MaleIndications->EditCustomAttributes = "";
			$this->MaleIndications->EditValue = $this->MaleIndications->options(TRUE);

			// FemaleIndications
			$this->FemaleIndications->EditAttrs["class"] = "form-control";
			$this->FemaleIndications->EditCustomAttributes = "";
			$this->FemaleIndications->EditValue = $this->FemaleIndications->options(TRUE);

			// Edit refer script
			// TreatmentStartDate

			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
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
		if ($this->TreatmentStartDate->Required) {
			if (!$this->TreatmentStartDate->IsDetailKey && $this->TreatmentStartDate->FormValue != NULL && $this->TreatmentStartDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TreatmentStartDate->caption(), $this->TreatmentStartDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->TreatmentStartDate->FormValue)) {
			AddMessage($FormError, $this->TreatmentStartDate->errorMessage());
		}
		if ($this->treatment_status->Required) {
			if (!$this->treatment_status->IsDetailKey && $this->treatment_status->FormValue != NULL && $this->treatment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
			}
		}
		if ($this->ARTCYCLE->Required) {
			if ($this->ARTCYCLE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
			}
		}
		if ($this->IVFCycleNO->Required) {
			if (!$this->IVFCycleNO->IsDetailKey && $this->IVFCycleNO->FormValue != NULL && $this->IVFCycleNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVFCycleNO->caption(), $this->IVFCycleNO->RequiredErrorMessage));
			}
		}
		if ($this->Treatment->Required) {
			if (!$this->Treatment->IsDetailKey && $this->Treatment->FormValue != NULL && $this->Treatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
			}
		}
		if ($this->TreatmentTec->Required) {
			if (!$this->TreatmentTec->IsDetailKey && $this->TreatmentTec->FormValue != NULL && $this->TreatmentTec->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TreatmentTec->caption(), $this->TreatmentTec->RequiredErrorMessage));
			}
		}
		if ($this->TypeOfCycle->Required) {
			if ($this->TypeOfCycle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypeOfCycle->caption(), $this->TypeOfCycle->RequiredErrorMessage));
			}
		}
		if ($this->SpermOrgin->Required) {
			if (!$this->SpermOrgin->IsDetailKey && $this->SpermOrgin->FormValue != NULL && $this->SpermOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SpermOrgin->caption(), $this->SpermOrgin->RequiredErrorMessage));
			}
		}
		if ($this->State->Required) {
			if (!$this->State->IsDetailKey && $this->State->FormValue != NULL && $this->State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
			}
		}
		if ($this->Origin->Required) {
			if (!$this->Origin->IsDetailKey && $this->Origin->FormValue != NULL && $this->Origin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Origin->caption(), $this->Origin->RequiredErrorMessage));
			}
		}
		if ($this->MACS->Required) {
			if ($this->MACS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MACS->caption(), $this->MACS->RequiredErrorMessage));
			}
		}
		if ($this->Technique->Required) {
			if (!$this->Technique->IsDetailKey && $this->Technique->FormValue != NULL && $this->Technique->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Technique->caption(), $this->Technique->RequiredErrorMessage));
			}
		}
		if ($this->PgdPlanning->Required) {
			if ($this->PgdPlanning->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PgdPlanning->caption(), $this->PgdPlanning->RequiredErrorMessage));
			}
		}
		if ($this->IMSI->Required) {
			if (!$this->IMSI->IsDetailKey && $this->IMSI->FormValue != NULL && $this->IMSI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IMSI->caption(), $this->IMSI->RequiredErrorMessage));
			}
		}
		if ($this->SequentialCulture->Required) {
			if (!$this->SequentialCulture->IsDetailKey && $this->SequentialCulture->FormValue != NULL && $this->SequentialCulture->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SequentialCulture->caption(), $this->SequentialCulture->RequiredErrorMessage));
			}
		}
		if ($this->TimeLapse->Required) {
			if (!$this->TimeLapse->IsDetailKey && $this->TimeLapse->FormValue != NULL && $this->TimeLapse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TimeLapse->caption(), $this->TimeLapse->RequiredErrorMessage));
			}
		}
		if ($this->AH->Required) {
			if (!$this->AH->IsDetailKey && $this->AH->FormValue != NULL && $this->AH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AH->caption(), $this->AH->RequiredErrorMessage));
			}
		}
		if ($this->Weight->Required) {
			if (!$this->Weight->IsDetailKey && $this->Weight->FormValue != NULL && $this->Weight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Weight->caption(), $this->Weight->RequiredErrorMessage));
			}
		}
		if ($this->BMI->Required) {
			if (!$this->BMI->IsDetailKey && $this->BMI->FormValue != NULL && $this->BMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BMI->caption(), $this->BMI->RequiredErrorMessage));
			}
		}
		if ($this->MaleIndications->Required) {
			if (!$this->MaleIndications->IsDetailKey && $this->MaleIndications->FormValue != NULL && $this->MaleIndications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaleIndications->caption(), $this->MaleIndications->RequiredErrorMessage));
			}
		}
		if ($this->FemaleIndications->Required) {
			if (!$this->FemaleIndications->IsDetailKey && $this->FemaleIndications->FormValue != NULL && $this->FemaleIndications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FemaleIndications->caption(), $this->FemaleIndications->RequiredErrorMessage));
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

			// TreatmentStartDate
			$this->TreatmentStartDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7), NULL, $this->TreatmentStartDate->ReadOnly);

			// treatment_status
			$this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, NULL, $this->treatment_status->ReadOnly);

			// ARTCYCLE
			$this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, NULL, $this->ARTCYCLE->ReadOnly);

			// IVFCycleNO
			$this->IVFCycleNO->setDbValueDef($rsnew, $this->IVFCycleNO->CurrentValue, NULL, $this->IVFCycleNO->ReadOnly);

			// Treatment
			$this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, NULL, $this->Treatment->ReadOnly);

			// TreatmentTec
			$this->TreatmentTec->setDbValueDef($rsnew, $this->TreatmentTec->CurrentValue, NULL, $this->TreatmentTec->ReadOnly);

			// TypeOfCycle
			$this->TypeOfCycle->setDbValueDef($rsnew, $this->TypeOfCycle->CurrentValue, NULL, $this->TypeOfCycle->ReadOnly);

			// SpermOrgin
			$this->SpermOrgin->setDbValueDef($rsnew, $this->SpermOrgin->CurrentValue, NULL, $this->SpermOrgin->ReadOnly);

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly);

			// Origin
			$this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, NULL, $this->Origin->ReadOnly);

			// MACS
			$this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, NULL, $this->MACS->ReadOnly);

			// Technique
			$this->Technique->setDbValueDef($rsnew, $this->Technique->CurrentValue, NULL, $this->Technique->ReadOnly);

			// PgdPlanning
			$this->PgdPlanning->setDbValueDef($rsnew, $this->PgdPlanning->CurrentValue, NULL, $this->PgdPlanning->ReadOnly);

			// IMSI
			$this->IMSI->setDbValueDef($rsnew, $this->IMSI->CurrentValue, NULL, $this->IMSI->ReadOnly);

			// SequentialCulture
			$this->SequentialCulture->setDbValueDef($rsnew, $this->SequentialCulture->CurrentValue, NULL, $this->SequentialCulture->ReadOnly);

			// TimeLapse
			$this->TimeLapse->setDbValueDef($rsnew, $this->TimeLapse->CurrentValue, NULL, $this->TimeLapse->ReadOnly);

			// AH
			$this->AH->setDbValueDef($rsnew, $this->AH->CurrentValue, NULL, $this->AH->ReadOnly);

			// Weight
			$this->Weight->setDbValueDef($rsnew, $this->Weight->CurrentValue, NULL, $this->Weight->ReadOnly);

			// BMI
			$this->BMI->setDbValueDef($rsnew, $this->BMI->CurrentValue, NULL, $this->BMI->ReadOnly);

			// MaleIndications
			$this->MaleIndications->setDbValueDef($rsnew, $this->MaleIndications->CurrentValue, NULL, $this->MaleIndications->ReadOnly);

			// FemaleIndications
			$this->FemaleIndications->setDbValueDef($rsnew, $this->FemaleIndications->CurrentValue, NULL, $this->FemaleIndications->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "ivf") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
			}
			if ($this->getCurrentMasterTable() == "view_donor_ivf") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
			}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// TreatmentStartDate
		$this->TreatmentStartDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7), NULL, FALSE);

		// treatment_status
		$this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, NULL, strval($this->treatment_status->CurrentValue) == "");

		// ARTCYCLE
		$this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, NULL, FALSE);

		// IVFCycleNO
		$this->IVFCycleNO->setDbValueDef($rsnew, $this->IVFCycleNO->CurrentValue, NULL, FALSE);

		// Treatment
		$this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, NULL, FALSE);

		// TreatmentTec
		$this->TreatmentTec->setDbValueDef($rsnew, $this->TreatmentTec->CurrentValue, NULL, FALSE);

		// TypeOfCycle
		$this->TypeOfCycle->setDbValueDef($rsnew, $this->TypeOfCycle->CurrentValue, NULL, FALSE);

		// SpermOrgin
		$this->SpermOrgin->setDbValueDef($rsnew, $this->SpermOrgin->CurrentValue, NULL, FALSE);

		// State
		$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, FALSE);

		// Origin
		$this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, NULL, FALSE);

		// MACS
		$this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, NULL, FALSE);

		// Technique
		$this->Technique->setDbValueDef($rsnew, $this->Technique->CurrentValue, NULL, FALSE);

		// PgdPlanning
		$this->PgdPlanning->setDbValueDef($rsnew, $this->PgdPlanning->CurrentValue, NULL, FALSE);

		// IMSI
		$this->IMSI->setDbValueDef($rsnew, $this->IMSI->CurrentValue, NULL, FALSE);

		// SequentialCulture
		$this->SequentialCulture->setDbValueDef($rsnew, $this->SequentialCulture->CurrentValue, NULL, FALSE);

		// TimeLapse
		$this->TimeLapse->setDbValueDef($rsnew, $this->TimeLapse->CurrentValue, NULL, FALSE);

		// AH
		$this->AH->setDbValueDef($rsnew, $this->AH->CurrentValue, NULL, FALSE);

		// Weight
		$this->Weight->setDbValueDef($rsnew, $this->Weight->CurrentValue, NULL, FALSE);

		// BMI
		$this->BMI->setDbValueDef($rsnew, $this->BMI->CurrentValue, NULL, FALSE);

		// MaleIndications
		$this->MaleIndications->setDbValueDef($rsnew, $this->MaleIndications->CurrentValue, NULL, FALSE);

		// FemaleIndications
		$this->FemaleIndications->setDbValueDef($rsnew, $this->FemaleIndications->CurrentValue, NULL, FALSE);

		// RIDNO
		if ($this->RIDNO->getSessionValue() != "") {
			$rsnew['RIDNO'] = $this->RIDNO->getSessionValue();
		}

		// Name
		if ($this->Name->getSessionValue() != "") {
			$rsnew['Name'] = $this->Name->getSessionValue();
		}

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
		if ($masterTblVar == "ivf") {
			$this->RIDNO->Visible = FALSE;
			if ($GLOBALS["ivf"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["ivf"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		if ($masterTblVar == "view_donor_ivf") {
			$this->RIDNO->Visible = FALSE;
			if ($GLOBALS["view_donor_ivf"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["view_donor_ivf"]->EventCancelled)
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
				case "x_treatment_status":
					break;
				case "x_ARTCYCLE":
					break;
				case "x_RESULT":
					break;
				case "x_status":
					break;
				case "x_Treatment":
					break;
				case "x_TypeOfCycle":
					break;
				case "x_SpermOrgin":
					break;
				case "x_State":
					break;
				case "x_MACS":
					break;
				case "x_PgdPlanning":
					break;
				case "x_MaleIndications":
					break;
				case "x_FemaleIndications":
					break;
				case "x_Heterotopic":
					break;
				case "x_TransferDFE":
					break;
				case "x_TineLapse":
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
		//$this->ListOptions["new"]->Body = "xxx";

	}
} // End class
?>
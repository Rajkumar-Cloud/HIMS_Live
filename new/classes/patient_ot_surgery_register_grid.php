<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_ot_surgery_register_grid extends patient_ot_surgery_register
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_ot_surgery_register';

	// Page object name
	public $PageObjName = "patient_ot_surgery_register_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_ot_surgery_registergrid";
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

		// Table object (patient_ot_surgery_register)
		if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
			$GLOBALS["patient_ot_surgery_register"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_ot_surgery_register"];

		}
		$this->AddUrl = "patient_ot_surgery_registeradd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');

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
		global $patient_ot_surgery_register;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_ot_surgery_register);
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
			$this->status->Visible = FALSE;
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
		$this->id->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->mrnno->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->diagnosis->Visible = FALSE;
		$this->proposedSurgery->Visible = FALSE;
		$this->surgeryProcedure->Visible = FALSE;
		$this->typeOfAnaesthesia->Visible = FALSE;
		$this->RecievedTime->setVisibility();
		$this->AnaesthesiaStarted->setVisibility();
		$this->AnaesthesiaEnded->setVisibility();
		$this->surgeryStarted->setVisibility();
		$this->surgeryEnded->setVisibility();
		$this->RecoveryTime->setVisibility();
		$this->ShiftedTime->setVisibility();
		$this->Duration->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AsstSurgeon1->setVisibility();
		$this->AsstSurgeon2->setVisibility();
		$this->paediatric->setVisibility();
		$this->ScrubNurse1->setVisibility();
		$this->ScrubNurse2->setVisibility();
		$this->FloorNurse->setVisibility();
		$this->Technician->setVisibility();
		$this->HouseKeeping->setVisibility();
		$this->countsCheckedMops->setVisibility();
		$this->gauze->setVisibility();
		$this->needles->setVisibility();
		$this->bloodloss->setVisibility();
		$this->bloodtransfusion->setVisibility();
		$this->implantsUsed->Visible = FALSE;
		$this->MaterialsForHPE->Visible = FALSE;
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientSearch->Visible = FALSE;
		$this->Reception->setVisibility();
		$this->PatientID->setVisibility();
		$this->PId->setVisibility();
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
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anaesthetist);
		$this->setupLookupOptions($this->AsstSurgeon1);
		$this->setupLookupOptions($this->AsstSurgeon2);
		$this->setupLookupOptions($this->paediatric);
		$this->setupLookupOptions($this->PatientSearch);

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
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MobileNumber") && $CurrentForm->hasValue("o_MobileNumber") && $this->MobileNumber->CurrentValue != $this->MobileNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RecievedTime") && $CurrentForm->hasValue("o_RecievedTime") && $this->RecievedTime->CurrentValue != $this->RecievedTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnaesthesiaStarted") && $CurrentForm->hasValue("o_AnaesthesiaStarted") && $this->AnaesthesiaStarted->CurrentValue != $this->AnaesthesiaStarted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnaesthesiaEnded") && $CurrentForm->hasValue("o_AnaesthesiaEnded") && $this->AnaesthesiaEnded->CurrentValue != $this->AnaesthesiaEnded->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_surgeryStarted") && $CurrentForm->hasValue("o_surgeryStarted") && $this->surgeryStarted->CurrentValue != $this->surgeryStarted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_surgeryEnded") && $CurrentForm->hasValue("o_surgeryEnded") && $this->surgeryEnded->CurrentValue != $this->surgeryEnded->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RecoveryTime") && $CurrentForm->hasValue("o_RecoveryTime") && $this->RecoveryTime->CurrentValue != $this->RecoveryTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ShiftedTime") && $CurrentForm->hasValue("o_ShiftedTime") && $this->ShiftedTime->CurrentValue != $this->ShiftedTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Duration") && $CurrentForm->hasValue("o_Duration") && $this->Duration->CurrentValue != $this->Duration->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Surgeon") && $CurrentForm->hasValue("o_Surgeon") && $this->Surgeon->CurrentValue != $this->Surgeon->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Anaesthetist") && $CurrentForm->hasValue("o_Anaesthetist") && $this->Anaesthetist->CurrentValue != $this->Anaesthetist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AsstSurgeon1") && $CurrentForm->hasValue("o_AsstSurgeon1") && $this->AsstSurgeon1->CurrentValue != $this->AsstSurgeon1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AsstSurgeon2") && $CurrentForm->hasValue("o_AsstSurgeon2") && $this->AsstSurgeon2->CurrentValue != $this->AsstSurgeon2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_paediatric") && $CurrentForm->hasValue("o_paediatric") && $this->paediatric->CurrentValue != $this->paediatric->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ScrubNurse1") && $CurrentForm->hasValue("o_ScrubNurse1") && $this->ScrubNurse1->CurrentValue != $this->ScrubNurse1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ScrubNurse2") && $CurrentForm->hasValue("o_ScrubNurse2") && $this->ScrubNurse2->CurrentValue != $this->ScrubNurse2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FloorNurse") && $CurrentForm->hasValue("o_FloorNurse") && $this->FloorNurse->CurrentValue != $this->FloorNurse->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Technician") && $CurrentForm->hasValue("o_Technician") && $this->Technician->CurrentValue != $this->Technician->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HouseKeeping") && $CurrentForm->hasValue("o_HouseKeeping") && $this->HouseKeeping->CurrentValue != $this->HouseKeeping->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_countsCheckedMops") && $CurrentForm->hasValue("o_countsCheckedMops") && $this->countsCheckedMops->CurrentValue != $this->countsCheckedMops->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_gauze") && $CurrentForm->hasValue("o_gauze") && $this->gauze->CurrentValue != $this->gauze->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_needles") && $CurrentForm->hasValue("o_needles") && $this->needles->CurrentValue != $this->needles->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_bloodloss") && $CurrentForm->hasValue("o_bloodloss") && $this->bloodloss->CurrentValue != $this->bloodloss->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_bloodtransfusion") && $CurrentForm->hasValue("o_bloodtransfusion") && $this->bloodtransfusion->CurrentValue != $this->bloodtransfusion->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientID") && $CurrentForm->hasValue("o_PatientID") && $this->PatientID->CurrentValue != $this->PatientID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PId") && $CurrentForm->hasValue("o_PId") && $this->PId->CurrentValue != $this->PId->OldValue)
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
				$this->mrnno->setSessionValue("");
				$this->PId->setSessionValue("");
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
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->diagnosis->CurrentValue = NULL;
		$this->diagnosis->OldValue = $this->diagnosis->CurrentValue;
		$this->proposedSurgery->CurrentValue = NULL;
		$this->proposedSurgery->OldValue = $this->proposedSurgery->CurrentValue;
		$this->surgeryProcedure->CurrentValue = NULL;
		$this->surgeryProcedure->OldValue = $this->surgeryProcedure->CurrentValue;
		$this->typeOfAnaesthesia->CurrentValue = NULL;
		$this->typeOfAnaesthesia->OldValue = $this->typeOfAnaesthesia->CurrentValue;
		$this->RecievedTime->CurrentValue = NULL;
		$this->RecievedTime->OldValue = $this->RecievedTime->CurrentValue;
		$this->AnaesthesiaStarted->CurrentValue = NULL;
		$this->AnaesthesiaStarted->OldValue = $this->AnaesthesiaStarted->CurrentValue;
		$this->AnaesthesiaEnded->CurrentValue = NULL;
		$this->AnaesthesiaEnded->OldValue = $this->AnaesthesiaEnded->CurrentValue;
		$this->surgeryStarted->CurrentValue = NULL;
		$this->surgeryStarted->OldValue = $this->surgeryStarted->CurrentValue;
		$this->surgeryEnded->CurrentValue = NULL;
		$this->surgeryEnded->OldValue = $this->surgeryEnded->CurrentValue;
		$this->RecoveryTime->CurrentValue = NULL;
		$this->RecoveryTime->OldValue = $this->RecoveryTime->CurrentValue;
		$this->ShiftedTime->CurrentValue = NULL;
		$this->ShiftedTime->OldValue = $this->ShiftedTime->CurrentValue;
		$this->Duration->CurrentValue = NULL;
		$this->Duration->OldValue = $this->Duration->CurrentValue;
		$this->Surgeon->CurrentValue = NULL;
		$this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
		$this->Anaesthetist->CurrentValue = NULL;
		$this->Anaesthetist->OldValue = $this->Anaesthetist->CurrentValue;
		$this->AsstSurgeon1->CurrentValue = NULL;
		$this->AsstSurgeon1->OldValue = $this->AsstSurgeon1->CurrentValue;
		$this->AsstSurgeon2->CurrentValue = NULL;
		$this->AsstSurgeon2->OldValue = $this->AsstSurgeon2->CurrentValue;
		$this->paediatric->CurrentValue = NULL;
		$this->paediatric->OldValue = $this->paediatric->CurrentValue;
		$this->ScrubNurse1->CurrentValue = NULL;
		$this->ScrubNurse1->OldValue = $this->ScrubNurse1->CurrentValue;
		$this->ScrubNurse2->CurrentValue = NULL;
		$this->ScrubNurse2->OldValue = $this->ScrubNurse2->CurrentValue;
		$this->FloorNurse->CurrentValue = NULL;
		$this->FloorNurse->OldValue = $this->FloorNurse->CurrentValue;
		$this->Technician->CurrentValue = NULL;
		$this->Technician->OldValue = $this->Technician->CurrentValue;
		$this->HouseKeeping->CurrentValue = NULL;
		$this->HouseKeeping->OldValue = $this->HouseKeeping->CurrentValue;
		$this->countsCheckedMops->CurrentValue = NULL;
		$this->countsCheckedMops->OldValue = $this->countsCheckedMops->CurrentValue;
		$this->gauze->CurrentValue = NULL;
		$this->gauze->OldValue = $this->gauze->CurrentValue;
		$this->needles->CurrentValue = NULL;
		$this->needles->OldValue = $this->needles->CurrentValue;
		$this->bloodloss->CurrentValue = NULL;
		$this->bloodloss->OldValue = $this->bloodloss->CurrentValue;
		$this->bloodtransfusion->CurrentValue = NULL;
		$this->bloodtransfusion->OldValue = $this->bloodtransfusion->CurrentValue;
		$this->implantsUsed->CurrentValue = NULL;
		$this->implantsUsed->OldValue = $this->implantsUsed->CurrentValue;
		$this->MaterialsForHPE->CurrentValue = NULL;
		$this->MaterialsForHPE->OldValue = $this->MaterialsForHPE->CurrentValue;
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
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->PatientSearch->CurrentValue = NULL;
		$this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PId->CurrentValue = NULL;
		$this->PId->OldValue = $this->PId->CurrentValue;
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

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatID"))
			$this->PatID->setOldValue($CurrentForm->getValue("o_PatID"));

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

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MobileNumber"))
			$this->MobileNumber->setOldValue($CurrentForm->getValue("o_MobileNumber"));

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

		// Check field name 'RecievedTime' first before field var 'x_RecievedTime'
		$val = $CurrentForm->hasValue("RecievedTime") ? $CurrentForm->getValue("RecievedTime") : $CurrentForm->getValue("x_RecievedTime");
		if (!$this->RecievedTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RecievedTime->Visible = FALSE; // Disable update for API request
			else
				$this->RecievedTime->setFormValue($val);
			$this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_RecievedTime"))
			$this->RecievedTime->setOldValue($CurrentForm->getValue("o_RecievedTime"));

		// Check field name 'AnaesthesiaStarted' first before field var 'x_AnaesthesiaStarted'
		$val = $CurrentForm->hasValue("AnaesthesiaStarted") ? $CurrentForm->getValue("AnaesthesiaStarted") : $CurrentForm->getValue("x_AnaesthesiaStarted");
		if (!$this->AnaesthesiaStarted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnaesthesiaStarted->Visible = FALSE; // Disable update for API request
			else
				$this->AnaesthesiaStarted->setFormValue($val);
			$this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_AnaesthesiaStarted"))
			$this->AnaesthesiaStarted->setOldValue($CurrentForm->getValue("o_AnaesthesiaStarted"));

		// Check field name 'AnaesthesiaEnded' first before field var 'x_AnaesthesiaEnded'
		$val = $CurrentForm->hasValue("AnaesthesiaEnded") ? $CurrentForm->getValue("AnaesthesiaEnded") : $CurrentForm->getValue("x_AnaesthesiaEnded");
		if (!$this->AnaesthesiaEnded->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnaesthesiaEnded->Visible = FALSE; // Disable update for API request
			else
				$this->AnaesthesiaEnded->setFormValue($val);
			$this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_AnaesthesiaEnded"))
			$this->AnaesthesiaEnded->setOldValue($CurrentForm->getValue("o_AnaesthesiaEnded"));

		// Check field name 'surgeryStarted' first before field var 'x_surgeryStarted'
		$val = $CurrentForm->hasValue("surgeryStarted") ? $CurrentForm->getValue("surgeryStarted") : $CurrentForm->getValue("x_surgeryStarted");
		if (!$this->surgeryStarted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->surgeryStarted->Visible = FALSE; // Disable update for API request
			else
				$this->surgeryStarted->setFormValue($val);
			$this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_surgeryStarted"))
			$this->surgeryStarted->setOldValue($CurrentForm->getValue("o_surgeryStarted"));

		// Check field name 'surgeryEnded' first before field var 'x_surgeryEnded'
		$val = $CurrentForm->hasValue("surgeryEnded") ? $CurrentForm->getValue("surgeryEnded") : $CurrentForm->getValue("x_surgeryEnded");
		if (!$this->surgeryEnded->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->surgeryEnded->Visible = FALSE; // Disable update for API request
			else
				$this->surgeryEnded->setFormValue($val);
			$this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
		}
		if ($CurrentForm->hasValue("o_surgeryEnded"))
			$this->surgeryEnded->setOldValue($CurrentForm->getValue("o_surgeryEnded"));

		// Check field name 'RecoveryTime' first before field var 'x_RecoveryTime'
		$val = $CurrentForm->hasValue("RecoveryTime") ? $CurrentForm->getValue("RecoveryTime") : $CurrentForm->getValue("x_RecoveryTime");
		if (!$this->RecoveryTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RecoveryTime->Visible = FALSE; // Disable update for API request
			else
				$this->RecoveryTime->setFormValue($val);
			$this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_RecoveryTime"))
			$this->RecoveryTime->setOldValue($CurrentForm->getValue("o_RecoveryTime"));

		// Check field name 'ShiftedTime' first before field var 'x_ShiftedTime'
		$val = $CurrentForm->hasValue("ShiftedTime") ? $CurrentForm->getValue("ShiftedTime") : $CurrentForm->getValue("x_ShiftedTime");
		if (!$this->ShiftedTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ShiftedTime->Visible = FALSE; // Disable update for API request
			else
				$this->ShiftedTime->setFormValue($val);
			$this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_ShiftedTime"))
			$this->ShiftedTime->setOldValue($CurrentForm->getValue("o_ShiftedTime"));

		// Check field name 'Duration' first before field var 'x_Duration'
		$val = $CurrentForm->hasValue("Duration") ? $CurrentForm->getValue("Duration") : $CurrentForm->getValue("x_Duration");
		if (!$this->Duration->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Duration->Visible = FALSE; // Disable update for API request
			else
				$this->Duration->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Duration"))
			$this->Duration->setOldValue($CurrentForm->getValue("o_Duration"));

		// Check field name 'Surgeon' first before field var 'x_Surgeon'
		$val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
		if (!$this->Surgeon->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Surgeon->Visible = FALSE; // Disable update for API request
			else
				$this->Surgeon->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Surgeon"))
			$this->Surgeon->setOldValue($CurrentForm->getValue("o_Surgeon"));

		// Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
		$val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
		if (!$this->Anaesthetist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Anaesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anaesthetist->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Anaesthetist"))
			$this->Anaesthetist->setOldValue($CurrentForm->getValue("o_Anaesthetist"));

		// Check field name 'AsstSurgeon1' first before field var 'x_AsstSurgeon1'
		$val = $CurrentForm->hasValue("AsstSurgeon1") ? $CurrentForm->getValue("AsstSurgeon1") : $CurrentForm->getValue("x_AsstSurgeon1");
		if (!$this->AsstSurgeon1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AsstSurgeon1->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AsstSurgeon1"))
			$this->AsstSurgeon1->setOldValue($CurrentForm->getValue("o_AsstSurgeon1"));

		// Check field name 'AsstSurgeon2' first before field var 'x_AsstSurgeon2'
		$val = $CurrentForm->hasValue("AsstSurgeon2") ? $CurrentForm->getValue("AsstSurgeon2") : $CurrentForm->getValue("x_AsstSurgeon2");
		if (!$this->AsstSurgeon2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AsstSurgeon2->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AsstSurgeon2"))
			$this->AsstSurgeon2->setOldValue($CurrentForm->getValue("o_AsstSurgeon2"));

		// Check field name 'paediatric' first before field var 'x_paediatric'
		$val = $CurrentForm->hasValue("paediatric") ? $CurrentForm->getValue("paediatric") : $CurrentForm->getValue("x_paediatric");
		if (!$this->paediatric->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->paediatric->Visible = FALSE; // Disable update for API request
			else
				$this->paediatric->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_paediatric"))
			$this->paediatric->setOldValue($CurrentForm->getValue("o_paediatric"));

		// Check field name 'ScrubNurse1' first before field var 'x_ScrubNurse1'
		$val = $CurrentForm->hasValue("ScrubNurse1") ? $CurrentForm->getValue("ScrubNurse1") : $CurrentForm->getValue("x_ScrubNurse1");
		if (!$this->ScrubNurse1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ScrubNurse1->Visible = FALSE; // Disable update for API request
			else
				$this->ScrubNurse1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ScrubNurse1"))
			$this->ScrubNurse1->setOldValue($CurrentForm->getValue("o_ScrubNurse1"));

		// Check field name 'ScrubNurse2' first before field var 'x_ScrubNurse2'
		$val = $CurrentForm->hasValue("ScrubNurse2") ? $CurrentForm->getValue("ScrubNurse2") : $CurrentForm->getValue("x_ScrubNurse2");
		if (!$this->ScrubNurse2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ScrubNurse2->Visible = FALSE; // Disable update for API request
			else
				$this->ScrubNurse2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ScrubNurse2"))
			$this->ScrubNurse2->setOldValue($CurrentForm->getValue("o_ScrubNurse2"));

		// Check field name 'FloorNurse' first before field var 'x_FloorNurse'
		$val = $CurrentForm->hasValue("FloorNurse") ? $CurrentForm->getValue("FloorNurse") : $CurrentForm->getValue("x_FloorNurse");
		if (!$this->FloorNurse->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FloorNurse->Visible = FALSE; // Disable update for API request
			else
				$this->FloorNurse->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_FloorNurse"))
			$this->FloorNurse->setOldValue($CurrentForm->getValue("o_FloorNurse"));

		// Check field name 'Technician' first before field var 'x_Technician'
		$val = $CurrentForm->hasValue("Technician") ? $CurrentForm->getValue("Technician") : $CurrentForm->getValue("x_Technician");
		if (!$this->Technician->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Technician->Visible = FALSE; // Disable update for API request
			else
				$this->Technician->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Technician"))
			$this->Technician->setOldValue($CurrentForm->getValue("o_Technician"));

		// Check field name 'HouseKeeping' first before field var 'x_HouseKeeping'
		$val = $CurrentForm->hasValue("HouseKeeping") ? $CurrentForm->getValue("HouseKeeping") : $CurrentForm->getValue("x_HouseKeeping");
		if (!$this->HouseKeeping->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HouseKeeping->Visible = FALSE; // Disable update for API request
			else
				$this->HouseKeeping->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HouseKeeping"))
			$this->HouseKeeping->setOldValue($CurrentForm->getValue("o_HouseKeeping"));

		// Check field name 'countsCheckedMops' first before field var 'x_countsCheckedMops'
		$val = $CurrentForm->hasValue("countsCheckedMops") ? $CurrentForm->getValue("countsCheckedMops") : $CurrentForm->getValue("x_countsCheckedMops");
		if (!$this->countsCheckedMops->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->countsCheckedMops->Visible = FALSE; // Disable update for API request
			else
				$this->countsCheckedMops->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_countsCheckedMops"))
			$this->countsCheckedMops->setOldValue($CurrentForm->getValue("o_countsCheckedMops"));

		// Check field name 'gauze' first before field var 'x_gauze'
		$val = $CurrentForm->hasValue("gauze") ? $CurrentForm->getValue("gauze") : $CurrentForm->getValue("x_gauze");
		if (!$this->gauze->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->gauze->Visible = FALSE; // Disable update for API request
			else
				$this->gauze->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_gauze"))
			$this->gauze->setOldValue($CurrentForm->getValue("o_gauze"));

		// Check field name 'needles' first before field var 'x_needles'
		$val = $CurrentForm->hasValue("needles") ? $CurrentForm->getValue("needles") : $CurrentForm->getValue("x_needles");
		if (!$this->needles->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->needles->Visible = FALSE; // Disable update for API request
			else
				$this->needles->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_needles"))
			$this->needles->setOldValue($CurrentForm->getValue("o_needles"));

		// Check field name 'bloodloss' first before field var 'x_bloodloss'
		$val = $CurrentForm->hasValue("bloodloss") ? $CurrentForm->getValue("bloodloss") : $CurrentForm->getValue("x_bloodloss");
		if (!$this->bloodloss->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->bloodloss->Visible = FALSE; // Disable update for API request
			else
				$this->bloodloss->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_bloodloss"))
			$this->bloodloss->setOldValue($CurrentForm->getValue("o_bloodloss"));

		// Check field name 'bloodtransfusion' first before field var 'x_bloodtransfusion'
		$val = $CurrentForm->hasValue("bloodtransfusion") ? $CurrentForm->getValue("bloodtransfusion") : $CurrentForm->getValue("x_bloodtransfusion");
		if (!$this->bloodtransfusion->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->bloodtransfusion->Visible = FALSE; // Disable update for API request
			else
				$this->bloodtransfusion->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_bloodtransfusion"))
			$this->bloodtransfusion->setOldValue($CurrentForm->getValue("o_bloodtransfusion"));

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_status"))
			$this->status->setOldValue($CurrentForm->getValue("o_status"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_createdby"))
			$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_createddatetime"))
			$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_modifiedby"))
			$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_modifieddatetime"))
			$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospID"))
			$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));

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

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatientID"))
			$this->PatientID->setOldValue($CurrentForm->getValue("o_PatientID"));

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PId"))
			$this->PId->setOldValue($CurrentForm->getValue("o_PId"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->RecievedTime->CurrentValue = $this->RecievedTime->FormValue;
		$this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
		$this->AnaesthesiaStarted->CurrentValue = $this->AnaesthesiaStarted->FormValue;
		$this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
		$this->AnaesthesiaEnded->CurrentValue = $this->AnaesthesiaEnded->FormValue;
		$this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
		$this->surgeryStarted->CurrentValue = $this->surgeryStarted->FormValue;
		$this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
		$this->surgeryEnded->CurrentValue = $this->surgeryEnded->FormValue;
		$this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
		$this->RecoveryTime->CurrentValue = $this->RecoveryTime->FormValue;
		$this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
		$this->ShiftedTime->CurrentValue = $this->ShiftedTime->FormValue;
		$this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
		$this->Duration->CurrentValue = $this->Duration->FormValue;
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
		$this->AsstSurgeon1->CurrentValue = $this->AsstSurgeon1->FormValue;
		$this->AsstSurgeon2->CurrentValue = $this->AsstSurgeon2->FormValue;
		$this->paediatric->CurrentValue = $this->paediatric->FormValue;
		$this->ScrubNurse1->CurrentValue = $this->ScrubNurse1->FormValue;
		$this->ScrubNurse2->CurrentValue = $this->ScrubNurse2->FormValue;
		$this->FloorNurse->CurrentValue = $this->FloorNurse->FormValue;
		$this->Technician->CurrentValue = $this->Technician->FormValue;
		$this->HouseKeeping->CurrentValue = $this->HouseKeeping->FormValue;
		$this->countsCheckedMops->CurrentValue = $this->countsCheckedMops->FormValue;
		$this->gauze->CurrentValue = $this->gauze->FormValue;
		$this->needles->CurrentValue = $this->needles->FormValue;
		$this->bloodloss->CurrentValue = $this->bloodloss->FormValue;
		$this->bloodtransfusion->CurrentValue = $this->bloodtransfusion->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->diagnosis->setDbValue($row['diagnosis']);
		$this->proposedSurgery->setDbValue($row['proposedSurgery']);
		$this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
		$this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
		$this->RecievedTime->setDbValue($row['RecievedTime']);
		$this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
		$this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
		$this->surgeryStarted->setDbValue($row['surgeryStarted']);
		$this->surgeryEnded->setDbValue($row['surgeryEnded']);
		$this->RecoveryTime->setDbValue($row['RecoveryTime']);
		$this->ShiftedTime->setDbValue($row['ShiftedTime']);
		$this->Duration->setDbValue($row['Duration']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
		$this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
		$this->paediatric->setDbValue($row['paediatric']);
		$this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
		$this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
		$this->FloorNurse->setDbValue($row['FloorNurse']);
		$this->Technician->setDbValue($row['Technician']);
		$this->HouseKeeping->setDbValue($row['HouseKeeping']);
		$this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
		$this->gauze->setDbValue($row['gauze']);
		$this->needles->setDbValue($row['needles']);
		$this->bloodloss->setDbValue($row['bloodloss']);
		$this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
		$this->implantsUsed->setDbValue($row['implantsUsed']);
		$this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PId->setDbValue($row['PId']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['diagnosis'] = $this->diagnosis->CurrentValue;
		$row['proposedSurgery'] = $this->proposedSurgery->CurrentValue;
		$row['surgeryProcedure'] = $this->surgeryProcedure->CurrentValue;
		$row['typeOfAnaesthesia'] = $this->typeOfAnaesthesia->CurrentValue;
		$row['RecievedTime'] = $this->RecievedTime->CurrentValue;
		$row['AnaesthesiaStarted'] = $this->AnaesthesiaStarted->CurrentValue;
		$row['AnaesthesiaEnded'] = $this->AnaesthesiaEnded->CurrentValue;
		$row['surgeryStarted'] = $this->surgeryStarted->CurrentValue;
		$row['surgeryEnded'] = $this->surgeryEnded->CurrentValue;
		$row['RecoveryTime'] = $this->RecoveryTime->CurrentValue;
		$row['ShiftedTime'] = $this->ShiftedTime->CurrentValue;
		$row['Duration'] = $this->Duration->CurrentValue;
		$row['Surgeon'] = $this->Surgeon->CurrentValue;
		$row['Anaesthetist'] = $this->Anaesthetist->CurrentValue;
		$row['AsstSurgeon1'] = $this->AsstSurgeon1->CurrentValue;
		$row['AsstSurgeon2'] = $this->AsstSurgeon2->CurrentValue;
		$row['paediatric'] = $this->paediatric->CurrentValue;
		$row['ScrubNurse1'] = $this->ScrubNurse1->CurrentValue;
		$row['ScrubNurse2'] = $this->ScrubNurse2->CurrentValue;
		$row['FloorNurse'] = $this->FloorNurse->CurrentValue;
		$row['Technician'] = $this->Technician->CurrentValue;
		$row['HouseKeeping'] = $this->HouseKeeping->CurrentValue;
		$row['countsCheckedMops'] = $this->countsCheckedMops->CurrentValue;
		$row['gauze'] = $this->gauze->CurrentValue;
		$row['needles'] = $this->needles->CurrentValue;
		$row['bloodloss'] = $this->bloodloss->CurrentValue;
		$row['bloodtransfusion'] = $this->bloodtransfusion->CurrentValue;
		$row['implantsUsed'] = $this->implantsUsed->CurrentValue;
		$row['MaterialsForHPE'] = $this->MaterialsForHPE->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['PatientSearch'] = $this->PatientSearch->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PId'] = $this->PId->CurrentValue;
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
		// PatID
		// PatientName
		// mrnno
		// MobileNumber
		// Age
		// Gender
		// profilePic
		// diagnosis
		// proposedSurgery
		// surgeryProcedure
		// typeOfAnaesthesia
		// RecievedTime
		// AnaesthesiaStarted
		// AnaesthesiaEnded
		// surgeryStarted
		// surgeryEnded
		// RecoveryTime
		// ShiftedTime
		// Duration
		// Surgeon
		// Anaesthetist
		// AsstSurgeon1
		// AsstSurgeon2
		// paediatric
		// ScrubNurse1
		// ScrubNurse2
		// FloorNurse
		// Technician
		// HouseKeeping
		// countsCheckedMops
		// gauze
		// needles
		// bloodloss
		// bloodtransfusion
		// implantsUsed
		// MaterialsForHPE
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// PatientSearch
		// Reception
		// PatientID
		// PId

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// RecievedTime
			$this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
			$this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
			$this->RecievedTime->ViewCustomAttributes = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
			$this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
			$this->AnaesthesiaStarted->ViewCustomAttributes = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
			$this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
			$this->AnaesthesiaEnded->ViewCustomAttributes = "";

			// surgeryStarted
			$this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
			$this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
			$this->surgeryStarted->ViewCustomAttributes = "";

			// surgeryEnded
			$this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
			$this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 17);
			$this->surgeryEnded->ViewCustomAttributes = "";

			// RecoveryTime
			$this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
			$this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
			$this->RecoveryTime->ViewCustomAttributes = "";

			// ShiftedTime
			$this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
			$this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
			$this->ShiftedTime->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// Surgeon
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal != "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
					}
				}
			} else {
				$this->Surgeon->ViewValue = NULL;
			}
			$this->Surgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$curVal = strval($this->Anaesthetist->CurrentValue);
			if ($curVal != "") {
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
				if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anaesthetist->ViewValue = NULL;
			}
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AsstSurgeon1
			$curVal = strval($this->AsstSurgeon1->CurrentValue);
			if ($curVal != "") {
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
				if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon1->ViewValue = NULL;
			}
			$this->AsstSurgeon1->ViewCustomAttributes = "";

			// AsstSurgeon2
			$curVal = strval($this->AsstSurgeon2->CurrentValue);
			if ($curVal != "") {
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
				if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon2->ViewValue = NULL;
			}
			$this->AsstSurgeon2->ViewCustomAttributes = "";

			// paediatric
			$curVal = strval($this->paediatric->CurrentValue);
			if ($curVal != "") {
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
				if ($this->paediatric->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
					}
				}
			} else {
				$this->paediatric->ViewValue = NULL;
			}
			$this->paediatric->ViewCustomAttributes = "";

			// ScrubNurse1
			$this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
			$this->ScrubNurse1->ViewCustomAttributes = "";

			// ScrubNurse2
			$this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
			$this->ScrubNurse2->ViewCustomAttributes = "";

			// FloorNurse
			$this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
			$this->FloorNurse->ViewCustomAttributes = "";

			// Technician
			$this->Technician->ViewValue = $this->Technician->CurrentValue;
			$this->Technician->ViewCustomAttributes = "";

			// HouseKeeping
			$this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
			$this->HouseKeeping->ViewCustomAttributes = "";

			// countsCheckedMops
			$this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
			$this->countsCheckedMops->ViewCustomAttributes = "";

			// gauze
			$this->gauze->ViewValue = $this->gauze->CurrentValue;
			$this->gauze->ViewCustomAttributes = "";

			// needles
			$this->needles->ViewValue = $this->needles->CurrentValue;
			$this->needles->ViewCustomAttributes = "";

			// bloodloss
			$this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
			$this->bloodloss->ViewCustomAttributes = "";

			// bloodtransfusion
			$this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
			$this->bloodtransfusion->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";
			$this->RecievedTime->TooltipValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";
			$this->AnaesthesiaStarted->TooltipValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";
			$this->AnaesthesiaEnded->TooltipValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";
			$this->surgeryStarted->TooltipValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";
			$this->surgeryEnded->TooltipValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";
			$this->RecoveryTime->TooltipValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";
			$this->ShiftedTime->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";
			$this->AsstSurgeon1->TooltipValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";
			$this->AsstSurgeon2->TooltipValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";
			$this->paediatric->TooltipValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";
			$this->ScrubNurse1->TooltipValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";
			$this->ScrubNurse2->TooltipValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";
			$this->FloorNurse->TooltipValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";
			$this->Technician->TooltipValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";
			$this->HouseKeeping->TooltipValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";
			$this->countsCheckedMops->TooltipValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";
			$this->gauze->TooltipValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";
			$this->needles->TooltipValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";
			$this->bloodloss->TooltipValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";
			$this->bloodtransfusion->TooltipValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// PatID

			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (!$this->PatID->Raw)
				$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

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

			// RecievedTime
			$this->RecievedTime->EditAttrs["class"] = "form-control";
			$this->RecievedTime->EditCustomAttributes = "";
			$this->RecievedTime->EditValue = HtmlEncode(FormatDateTime($this->RecievedTime->CurrentValue, 11));
			$this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaStarted->EditCustomAttributes = "";
			$this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11));
			$this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaEnded->EditCustomAttributes = "";
			$this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11));
			$this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

			// surgeryStarted
			$this->surgeryStarted->EditAttrs["class"] = "form-control";
			$this->surgeryStarted->EditCustomAttributes = "";
			$this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime($this->surgeryStarted->CurrentValue, 11));
			$this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

			// surgeryEnded
			$this->surgeryEnded->EditAttrs["class"] = "form-control";
			$this->surgeryEnded->EditCustomAttributes = "";
			$this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 17));
			$this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

			// RecoveryTime
			$this->RecoveryTime->EditAttrs["class"] = "form-control";
			$this->RecoveryTime->EditCustomAttributes = "";
			$this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime($this->RecoveryTime->CurrentValue, 11));
			$this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

			// ShiftedTime
			$this->ShiftedTime->EditAttrs["class"] = "form-control";
			$this->ShiftedTime->EditCustomAttributes = "";
			$this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime($this->ShiftedTime->CurrentValue, 11));
			$this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

			// Duration
			$this->Duration->EditAttrs["class"] = "form-control";
			$this->Duration->EditCustomAttributes = "";
			if (!$this->Duration->Raw)
				$this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
			$this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
			$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal != "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anaesthetist->CurrentValue));
			if ($curVal != "")
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
			else
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->Lookup !== NULL && is_array($this->Anaesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anaesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anaesthetist->EditValue = array_values($this->Anaesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anaesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anaesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Anaesthetist->EditValue = $arwrk;
			}

			// AsstSurgeon1
			$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon1->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
			if ($curVal != "")
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->Lookup !== NULL && is_array($this->AsstSurgeon1->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon1->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon1->EditValue = array_values($this->AsstSurgeon1->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon1->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AsstSurgeon1->EditValue = $arwrk;
			}

			// AsstSurgeon2
			$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon2->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
			if ($curVal != "")
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->Lookup !== NULL && is_array($this->AsstSurgeon2->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon2->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon2->EditValue = array_values($this->AsstSurgeon2->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon2->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AsstSurgeon2->EditValue = $arwrk;
			}

			// paediatric
			$this->paediatric->EditAttrs["class"] = "form-control";
			$this->paediatric->EditCustomAttributes = "";
			$curVal = trim(strval($this->paediatric->CurrentValue));
			if ($curVal != "")
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
			else
				$this->paediatric->ViewValue = $this->paediatric->Lookup !== NULL && is_array($this->paediatric->Lookup->Options) ? $curVal : NULL;
			if ($this->paediatric->ViewValue !== NULL) { // Load from cache
				$this->paediatric->EditValue = array_values($this->paediatric->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->paediatric->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->paediatric->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->paediatric->EditValue = $arwrk;
			}

			// ScrubNurse1
			$this->ScrubNurse1->EditAttrs["class"] = "form-control";
			$this->ScrubNurse1->EditCustomAttributes = "";
			if (!$this->ScrubNurse1->Raw)
				$this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

			// ScrubNurse2
			$this->ScrubNurse2->EditAttrs["class"] = "form-control";
			$this->ScrubNurse2->EditCustomAttributes = "";
			if (!$this->ScrubNurse2->Raw)
				$this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

			// FloorNurse
			$this->FloorNurse->EditAttrs["class"] = "form-control";
			$this->FloorNurse->EditCustomAttributes = "";
			if (!$this->FloorNurse->Raw)
				$this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

			// Technician
			$this->Technician->EditAttrs["class"] = "form-control";
			$this->Technician->EditCustomAttributes = "";
			if (!$this->Technician->Raw)
				$this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
			$this->Technician->EditValue = HtmlEncode($this->Technician->CurrentValue);
			$this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

			// HouseKeeping
			$this->HouseKeeping->EditAttrs["class"] = "form-control";
			$this->HouseKeeping->EditCustomAttributes = "";
			if (!$this->HouseKeeping->Raw)
				$this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

			// countsCheckedMops
			$this->countsCheckedMops->EditAttrs["class"] = "form-control";
			$this->countsCheckedMops->EditCustomAttributes = "";
			if (!$this->countsCheckedMops->Raw)
				$this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

			// gauze
			$this->gauze->EditAttrs["class"] = "form-control";
			$this->gauze->EditCustomAttributes = "";
			if (!$this->gauze->Raw)
				$this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
			$this->gauze->EditValue = HtmlEncode($this->gauze->CurrentValue);
			$this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

			// needles
			$this->needles->EditAttrs["class"] = "form-control";
			$this->needles->EditCustomAttributes = "";
			if (!$this->needles->Raw)
				$this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
			$this->needles->EditValue = HtmlEncode($this->needles->CurrentValue);
			$this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

			// bloodloss
			$this->bloodloss->EditAttrs["class"] = "form-control";
			$this->bloodloss->EditCustomAttributes = "";
			if (!$this->bloodloss->Raw)
				$this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
			$this->bloodloss->EditValue = HtmlEncode($this->bloodloss->CurrentValue);
			$this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

			// bloodtransfusion
			$this->bloodtransfusion->EditAttrs["class"] = "form-control";
			$this->bloodtransfusion->EditCustomAttributes = "";
			if (!$this->bloodtransfusion->Raw)
				$this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

			// status
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// HospID
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

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			if ($this->PId->getSessionValue() != "") {
				$this->PId->CurrentValue = $this->PId->getSessionValue();
				$this->PId->OldValue = $this->PId->CurrentValue;
				$this->PId->ViewValue = $this->PId->CurrentValue;
				$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
				$this->PId->ViewCustomAttributes = "";
			} else {
				$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
				$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (!$this->PatID->Raw)
				$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

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

			// RecievedTime
			$this->RecievedTime->EditAttrs["class"] = "form-control";
			$this->RecievedTime->EditCustomAttributes = "";
			$this->RecievedTime->EditValue = HtmlEncode(FormatDateTime($this->RecievedTime->CurrentValue, 11));
			$this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaStarted->EditCustomAttributes = "";
			$this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11));
			$this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaEnded->EditCustomAttributes = "";
			$this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11));
			$this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

			// surgeryStarted
			$this->surgeryStarted->EditAttrs["class"] = "form-control";
			$this->surgeryStarted->EditCustomAttributes = "";
			$this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime($this->surgeryStarted->CurrentValue, 11));
			$this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

			// surgeryEnded
			$this->surgeryEnded->EditAttrs["class"] = "form-control";
			$this->surgeryEnded->EditCustomAttributes = "";
			$this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 17));
			$this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

			// RecoveryTime
			$this->RecoveryTime->EditAttrs["class"] = "form-control";
			$this->RecoveryTime->EditCustomAttributes = "";
			$this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime($this->RecoveryTime->CurrentValue, 11));
			$this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

			// ShiftedTime
			$this->ShiftedTime->EditAttrs["class"] = "form-control";
			$this->ShiftedTime->EditCustomAttributes = "";
			$this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime($this->ShiftedTime->CurrentValue, 11));
			$this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

			// Duration
			$this->Duration->EditAttrs["class"] = "form-control";
			$this->Duration->EditCustomAttributes = "";
			if (!$this->Duration->Raw)
				$this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
			$this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
			$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal != "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anaesthetist->CurrentValue));
			if ($curVal != "")
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
			else
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->Lookup !== NULL && is_array($this->Anaesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anaesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anaesthetist->EditValue = array_values($this->Anaesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anaesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anaesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Anaesthetist->EditValue = $arwrk;
			}

			// AsstSurgeon1
			$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon1->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
			if ($curVal != "")
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->Lookup !== NULL && is_array($this->AsstSurgeon1->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon1->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon1->EditValue = array_values($this->AsstSurgeon1->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon1->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AsstSurgeon1->EditValue = $arwrk;
			}

			// AsstSurgeon2
			$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon2->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
			if ($curVal != "")
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->Lookup !== NULL && is_array($this->AsstSurgeon2->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon2->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon2->EditValue = array_values($this->AsstSurgeon2->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon2->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AsstSurgeon2->EditValue = $arwrk;
			}

			// paediatric
			$this->paediatric->EditAttrs["class"] = "form-control";
			$this->paediatric->EditCustomAttributes = "";
			$curVal = trim(strval($this->paediatric->CurrentValue));
			if ($curVal != "")
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
			else
				$this->paediatric->ViewValue = $this->paediatric->Lookup !== NULL && is_array($this->paediatric->Lookup->Options) ? $curVal : NULL;
			if ($this->paediatric->ViewValue !== NULL) { // Load from cache
				$this->paediatric->EditValue = array_values($this->paediatric->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->paediatric->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->paediatric->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->paediatric->EditValue = $arwrk;
			}

			// ScrubNurse1
			$this->ScrubNurse1->EditAttrs["class"] = "form-control";
			$this->ScrubNurse1->EditCustomAttributes = "";
			if (!$this->ScrubNurse1->Raw)
				$this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

			// ScrubNurse2
			$this->ScrubNurse2->EditAttrs["class"] = "form-control";
			$this->ScrubNurse2->EditCustomAttributes = "";
			if (!$this->ScrubNurse2->Raw)
				$this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

			// FloorNurse
			$this->FloorNurse->EditAttrs["class"] = "form-control";
			$this->FloorNurse->EditCustomAttributes = "";
			if (!$this->FloorNurse->Raw)
				$this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

			// Technician
			$this->Technician->EditAttrs["class"] = "form-control";
			$this->Technician->EditCustomAttributes = "";
			if (!$this->Technician->Raw)
				$this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
			$this->Technician->EditValue = HtmlEncode($this->Technician->CurrentValue);
			$this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

			// HouseKeeping
			$this->HouseKeeping->EditAttrs["class"] = "form-control";
			$this->HouseKeeping->EditCustomAttributes = "";
			if (!$this->HouseKeeping->Raw)
				$this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

			// countsCheckedMops
			$this->countsCheckedMops->EditAttrs["class"] = "form-control";
			$this->countsCheckedMops->EditCustomAttributes = "";
			if (!$this->countsCheckedMops->Raw)
				$this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

			// gauze
			$this->gauze->EditAttrs["class"] = "form-control";
			$this->gauze->EditCustomAttributes = "";
			if (!$this->gauze->Raw)
				$this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
			$this->gauze->EditValue = HtmlEncode($this->gauze->CurrentValue);
			$this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

			// needles
			$this->needles->EditAttrs["class"] = "form-control";
			$this->needles->EditCustomAttributes = "";
			if (!$this->needles->Raw)
				$this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
			$this->needles->EditValue = HtmlEncode($this->needles->CurrentValue);
			$this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

			// bloodloss
			$this->bloodloss->EditAttrs["class"] = "form-control";
			$this->bloodloss->EditCustomAttributes = "";
			if (!$this->bloodloss->Raw)
				$this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
			$this->bloodloss->EditValue = HtmlEncode($this->bloodloss->CurrentValue);
			$this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

			// bloodtransfusion
			$this->bloodtransfusion->EditAttrs["class"] = "form-control";
			$this->bloodtransfusion->EditCustomAttributes = "";
			if (!$this->bloodtransfusion->Raw)
				$this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

			// status
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// HospID
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

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			if ($this->PId->getSessionValue() != "") {
				$this->PId->CurrentValue = $this->PId->getSessionValue();
				$this->PId->OldValue = $this->PId->CurrentValue;
				$this->PId->ViewValue = $this->PId->CurrentValue;
				$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
				$this->PId->ViewCustomAttributes = "";
			} else {
				$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
				$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
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
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
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
		if ($this->RecievedTime->Required) {
			if (!$this->RecievedTime->IsDetailKey && $this->RecievedTime->FormValue != NULL && $this->RecievedTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecievedTime->caption(), $this->RecievedTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->RecievedTime->FormValue)) {
			AddMessage($FormError, $this->RecievedTime->errorMessage());
		}
		if ($this->AnaesthesiaStarted->Required) {
			if (!$this->AnaesthesiaStarted->IsDetailKey && $this->AnaesthesiaStarted->FormValue != NULL && $this->AnaesthesiaStarted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaesthesiaStarted->caption(), $this->AnaesthesiaStarted->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->AnaesthesiaStarted->FormValue)) {
			AddMessage($FormError, $this->AnaesthesiaStarted->errorMessage());
		}
		if ($this->AnaesthesiaEnded->Required) {
			if (!$this->AnaesthesiaEnded->IsDetailKey && $this->AnaesthesiaEnded->FormValue != NULL && $this->AnaesthesiaEnded->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaesthesiaEnded->caption(), $this->AnaesthesiaEnded->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->AnaesthesiaEnded->FormValue)) {
			AddMessage($FormError, $this->AnaesthesiaEnded->errorMessage());
		}
		if ($this->surgeryStarted->Required) {
			if (!$this->surgeryStarted->IsDetailKey && $this->surgeryStarted->FormValue != NULL && $this->surgeryStarted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surgeryStarted->caption(), $this->surgeryStarted->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->surgeryStarted->FormValue)) {
			AddMessage($FormError, $this->surgeryStarted->errorMessage());
		}
		if ($this->surgeryEnded->Required) {
			if (!$this->surgeryEnded->IsDetailKey && $this->surgeryEnded->FormValue != NULL && $this->surgeryEnded->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surgeryEnded->caption(), $this->surgeryEnded->RequiredErrorMessage));
			}
		}
		if (!CheckShortEuroDate($this->surgeryEnded->FormValue)) {
			AddMessage($FormError, $this->surgeryEnded->errorMessage());
		}
		if ($this->RecoveryTime->Required) {
			if (!$this->RecoveryTime->IsDetailKey && $this->RecoveryTime->FormValue != NULL && $this->RecoveryTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecoveryTime->caption(), $this->RecoveryTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->RecoveryTime->FormValue)) {
			AddMessage($FormError, $this->RecoveryTime->errorMessage());
		}
		if ($this->ShiftedTime->Required) {
			if (!$this->ShiftedTime->IsDetailKey && $this->ShiftedTime->FormValue != NULL && $this->ShiftedTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ShiftedTime->caption(), $this->ShiftedTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ShiftedTime->FormValue)) {
			AddMessage($FormError, $this->ShiftedTime->errorMessage());
		}
		if ($this->Duration->Required) {
			if (!$this->Duration->IsDetailKey && $this->Duration->FormValue != NULL && $this->Duration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
			}
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anaesthetist->Required) {
			if (!$this->Anaesthetist->IsDetailKey && $this->Anaesthetist->FormValue != NULL && $this->Anaesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon1->Required) {
			if (!$this->AsstSurgeon1->IsDetailKey && $this->AsstSurgeon1->FormValue != NULL && $this->AsstSurgeon1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon1->caption(), $this->AsstSurgeon1->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon2->Required) {
			if (!$this->AsstSurgeon2->IsDetailKey && $this->AsstSurgeon2->FormValue != NULL && $this->AsstSurgeon2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon2->caption(), $this->AsstSurgeon2->RequiredErrorMessage));
			}
		}
		if ($this->paediatric->Required) {
			if (!$this->paediatric->IsDetailKey && $this->paediatric->FormValue != NULL && $this->paediatric->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paediatric->caption(), $this->paediatric->RequiredErrorMessage));
			}
		}
		if ($this->ScrubNurse1->Required) {
			if (!$this->ScrubNurse1->IsDetailKey && $this->ScrubNurse1->FormValue != NULL && $this->ScrubNurse1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ScrubNurse1->caption(), $this->ScrubNurse1->RequiredErrorMessage));
			}
		}
		if ($this->ScrubNurse2->Required) {
			if (!$this->ScrubNurse2->IsDetailKey && $this->ScrubNurse2->FormValue != NULL && $this->ScrubNurse2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ScrubNurse2->caption(), $this->ScrubNurse2->RequiredErrorMessage));
			}
		}
		if ($this->FloorNurse->Required) {
			if (!$this->FloorNurse->IsDetailKey && $this->FloorNurse->FormValue != NULL && $this->FloorNurse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FloorNurse->caption(), $this->FloorNurse->RequiredErrorMessage));
			}
		}
		if ($this->Technician->Required) {
			if (!$this->Technician->IsDetailKey && $this->Technician->FormValue != NULL && $this->Technician->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Technician->caption(), $this->Technician->RequiredErrorMessage));
			}
		}
		if ($this->HouseKeeping->Required) {
			if (!$this->HouseKeeping->IsDetailKey && $this->HouseKeeping->FormValue != NULL && $this->HouseKeeping->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HouseKeeping->caption(), $this->HouseKeeping->RequiredErrorMessage));
			}
		}
		if ($this->countsCheckedMops->Required) {
			if (!$this->countsCheckedMops->IsDetailKey && $this->countsCheckedMops->FormValue != NULL && $this->countsCheckedMops->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->countsCheckedMops->caption(), $this->countsCheckedMops->RequiredErrorMessage));
			}
		}
		if ($this->gauze->Required) {
			if (!$this->gauze->IsDetailKey && $this->gauze->FormValue != NULL && $this->gauze->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gauze->caption(), $this->gauze->RequiredErrorMessage));
			}
		}
		if ($this->needles->Required) {
			if (!$this->needles->IsDetailKey && $this->needles->FormValue != NULL && $this->needles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->needles->caption(), $this->needles->RequiredErrorMessage));
			}
		}
		if ($this->bloodloss->Required) {
			if (!$this->bloodloss->IsDetailKey && $this->bloodloss->FormValue != NULL && $this->bloodloss->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bloodloss->caption(), $this->bloodloss->RequiredErrorMessage));
			}
		}
		if ($this->bloodtransfusion->Required) {
			if (!$this->bloodtransfusion->IsDetailKey && $this->bloodtransfusion->FormValue != NULL && $this->bloodtransfusion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bloodtransfusion->caption(), $this->bloodtransfusion->RequiredErrorMessage));
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
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
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

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// RecievedTime
			$this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 11), NULL, $this->RecievedTime->ReadOnly);

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11), NULL, $this->AnaesthesiaStarted->ReadOnly);

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11), NULL, $this->AnaesthesiaEnded->ReadOnly);

			// surgeryStarted
			$this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 11), NULL, $this->surgeryStarted->ReadOnly);

			// surgeryEnded
			$this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 17), NULL, $this->surgeryEnded->ReadOnly);

			// RecoveryTime
			$this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 11), NULL, $this->RecoveryTime->ReadOnly);

			// ShiftedTime
			$this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 11), NULL, $this->ShiftedTime->ReadOnly);

			// Duration
			$this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, NULL, $this->Duration->ReadOnly);

			// Surgeon
			$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, $this->Surgeon->ReadOnly);

			// Anaesthetist
			$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, $this->Anaesthetist->ReadOnly);

			// AsstSurgeon1
			$this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, NULL, $this->AsstSurgeon1->ReadOnly);

			// AsstSurgeon2
			$this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, NULL, $this->AsstSurgeon2->ReadOnly);

			// paediatric
			$this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, NULL, $this->paediatric->ReadOnly);

			// ScrubNurse1
			$this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, NULL, $this->ScrubNurse1->ReadOnly);

			// ScrubNurse2
			$this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, NULL, $this->ScrubNurse2->ReadOnly);

			// FloorNurse
			$this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, NULL, $this->FloorNurse->ReadOnly);

			// Technician
			$this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, NULL, $this->Technician->ReadOnly);

			// HouseKeeping
			$this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, NULL, $this->HouseKeeping->ReadOnly);

			// countsCheckedMops
			$this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, NULL, $this->countsCheckedMops->ReadOnly);

			// gauze
			$this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, NULL, $this->gauze->ReadOnly);

			// needles
			$this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, NULL, $this->needles->ReadOnly);

			// bloodloss
			$this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, NULL, $this->bloodloss->ReadOnly);

			// bloodtransfusion
			$this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, NULL, $this->bloodtransfusion->ReadOnly);

			// status
			$this->status->CurrentValue = ActiveStatusbit();
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL);

			// createdby
			$this->createdby->CurrentValue = CurrentUserName();
			$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

			// createddatetime
			$this->createddatetime->CurrentValue = CurrentDateTime();
			$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserName();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

			// Reception
			$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, $this->Reception->ReadOnly);

			// PatientID
			$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, $this->PatientID->ReadOnly);

			// PId
			$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, $this->PId->ReadOnly);

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
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->PId->CurrentValue = $this->PId->getSessionValue();
			}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// RecievedTime
		$this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 11), NULL, FALSE);

		// AnaesthesiaStarted
		$this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11), NULL, FALSE);

		// AnaesthesiaEnded
		$this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11), NULL, FALSE);

		// surgeryStarted
		$this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 11), NULL, FALSE);

		// surgeryEnded
		$this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 17), NULL, FALSE);

		// RecoveryTime
		$this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 11), NULL, FALSE);

		// ShiftedTime
		$this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 11), NULL, FALSE);

		// Duration
		$this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, NULL, FALSE);

		// Surgeon
		$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, FALSE);

		// Anaesthetist
		$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, FALSE);

		// AsstSurgeon1
		$this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, NULL, FALSE);

		// AsstSurgeon2
		$this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, NULL, FALSE);

		// paediatric
		$this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, NULL, FALSE);

		// ScrubNurse1
		$this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, NULL, FALSE);

		// ScrubNurse2
		$this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, NULL, FALSE);

		// FloorNurse
		$this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, NULL, FALSE);

		// Technician
		$this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, NULL, FALSE);

		// HouseKeeping
		$this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, NULL, FALSE);

		// countsCheckedMops
		$this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, NULL, FALSE);

		// gauze
		$this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, NULL, FALSE);

		// needles
		$this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, NULL, FALSE);

		// bloodloss
		$this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, NULL, FALSE);

		// bloodtransfusion
		$this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, NULL, FALSE);

		// status
		$this->status->CurrentValue = ActiveStatusbit();
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL);

		// createdby
		$this->createdby->CurrentValue = CurrentUserName();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// modifiedby
		$this->modifiedby->CurrentValue = CurrentUserName();
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

		// modifieddatetime
		$this->modifieddatetime->CurrentValue = CurrentDateTime();
		$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// PId
		$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, FALSE);

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
			$this->mrnno->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->PId->Visible = FALSE;
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
				case "x_Surgeon":
					break;
				case "x_Anaesthetist":
					break;
				case "x_AsstSurgeon1":
					break;
				case "x_AsstSurgeon2":
					break;
				case "x_paediatric":
					break;
				case "x_PatientSearch":
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
						case "x_Surgeon":
							break;
						case "x_Anaesthetist":
							break;
						case "x_AsstSurgeon1":
							break;
						case "x_AsstSurgeon2":
							break;
						case "x_paediatric":
							break;
						case "x_PatientSearch":
							$row[3] = FormatNumber($row[3], 0, -2, -2, -2);
							$row['df3'] = $row[3];
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
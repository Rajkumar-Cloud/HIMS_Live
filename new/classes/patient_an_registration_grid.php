<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_an_registration_grid extends patient_an_registration
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_an_registration';

	// Page object name
	public $PageObjName = "patient_an_registration_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_an_registrationgrid";
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

		// Table object (patient_an_registration)
		if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
			$GLOBALS["patient_an_registration"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_an_registration"];

		}
		$this->AddUrl = "patient_an_registrationadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_an_registration');

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
		global $patient_an_registration;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_an_registration);
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
		$this->pid->setVisibility();
		$this->fid->setVisibility();
		$this->G->setVisibility();
		$this->P->setVisibility();
		$this->L->setVisibility();
		$this->A->setVisibility();
		$this->E->setVisibility();
		$this->M->setVisibility();
		$this->LMP->setVisibility();
		$this->EDO->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->MaritalHistory->setVisibility();
		$this->ObstetricHistory->setVisibility();
		$this->PreviousHistoryofGDM->setVisibility();
		$this->PreviousHistorofPIH->setVisibility();
		$this->PreviousHistoryofIUGR->setVisibility();
		$this->PreviousHistoryofOligohydramnios->setVisibility();
		$this->PreviousHistoryofPreterm->setVisibility();
		$this->G1->setVisibility();
		$this->G2->setVisibility();
		$this->G3->setVisibility();
		$this->DeliveryNDLSCS1->setVisibility();
		$this->DeliveryNDLSCS2->setVisibility();
		$this->DeliveryNDLSCS3->setVisibility();
		$this->BabySexweight1->setVisibility();
		$this->BabySexweight2->setVisibility();
		$this->BabySexweight3->setVisibility();
		$this->PastMedicalHistory->setVisibility();
		$this->PastSurgicalHistory->setVisibility();
		$this->FamilyHistory->setVisibility();
		$this->Viability->setVisibility();
		$this->ViabilityDATE->setVisibility();
		$this->ViabilityREPORT->setVisibility();
		$this->Viability2->setVisibility();
		$this->Viability2DATE->setVisibility();
		$this->Viability2REPORT->setVisibility();
		$this->NTscan->setVisibility();
		$this->NTscanDATE->setVisibility();
		$this->NTscanREPORT->setVisibility();
		$this->EarlyTarget->setVisibility();
		$this->EarlyTargetDATE->setVisibility();
		$this->EarlyTargetREPORT->setVisibility();
		$this->Anomaly->setVisibility();
		$this->AnomalyDATE->setVisibility();
		$this->AnomalyREPORT->setVisibility();
		$this->Growth->setVisibility();
		$this->GrowthDATE->setVisibility();
		$this->GrowthREPORT->setVisibility();
		$this->Growth1->setVisibility();
		$this->Growth1DATE->setVisibility();
		$this->Growth1REPORT->setVisibility();
		$this->ANProfile->setVisibility();
		$this->ANProfileDATE->setVisibility();
		$this->ANProfileINHOUSE->setVisibility();
		$this->ANProfileREPORT->setVisibility();
		$this->DualMarker->setVisibility();
		$this->DualMarkerDATE->setVisibility();
		$this->DualMarkerINHOUSE->setVisibility();
		$this->DualMarkerREPORT->setVisibility();
		$this->Quadruple->setVisibility();
		$this->QuadrupleDATE->setVisibility();
		$this->QuadrupleINHOUSE->setVisibility();
		$this->QuadrupleREPORT->setVisibility();
		$this->A5month->setVisibility();
		$this->A5monthDATE->setVisibility();
		$this->A5monthINHOUSE->setVisibility();
		$this->A5monthREPORT->setVisibility();
		$this->A7month->setVisibility();
		$this->A7monthDATE->setVisibility();
		$this->A7monthINHOUSE->setVisibility();
		$this->A7monthREPORT->setVisibility();
		$this->A9month->setVisibility();
		$this->A9monthDATE->setVisibility();
		$this->A9monthINHOUSE->setVisibility();
		$this->A9monthREPORT->setVisibility();
		$this->INJ->setVisibility();
		$this->INJDATE->setVisibility();
		$this->INJINHOUSE->setVisibility();
		$this->INJREPORT->setVisibility();
		$this->Bleeding->setVisibility();
		$this->Hypothyroidism->setVisibility();
		$this->PICMENumber->setVisibility();
		$this->Outcome->setVisibility();
		$this->DateofAdmission->setVisibility();
		$this->DateodProcedure->setVisibility();
		$this->Miscarriage->setVisibility();
		$this->ModeOfDelivery->setVisibility();
		$this->ND->setVisibility();
		$this->NDS->setVisibility();
		$this->NDP->setVisibility();
		$this->Vaccum->setVisibility();
		$this->VaccumS->setVisibility();
		$this->VaccumP->setVisibility();
		$this->Forceps->setVisibility();
		$this->ForcepsS->setVisibility();
		$this->ForcepsP->setVisibility();
		$this->Elective->setVisibility();
		$this->ElectiveS->setVisibility();
		$this->ElectiveP->setVisibility();
		$this->Emergency->setVisibility();
		$this->EmergencyS->setVisibility();
		$this->EmergencyP->setVisibility();
		$this->Maturity->setVisibility();
		$this->Baby1->setVisibility();
		$this->Baby2->setVisibility();
		$this->sex1->setVisibility();
		$this->sex2->setVisibility();
		$this->weight1->setVisibility();
		$this->weight2->setVisibility();
		$this->NICU1->setVisibility();
		$this->NICU2->setVisibility();
		$this->Jaundice1->setVisibility();
		$this->Jaundice2->setVisibility();
		$this->Others1->setVisibility();
		$this->Others2->setVisibility();
		$this->SpillOverReasons->setVisibility();
		$this->ANClosed->setVisibility();
		$this->ANClosedDATE->setVisibility();
		$this->PastMedicalHistoryOthers->setVisibility();
		$this->PastSurgicalHistoryOthers->setVisibility();
		$this->FamilyHistoryOthers->setVisibility();
		$this->PresentPregnancyComplicationsOthers->setVisibility();
		$this->ETdate->setVisibility();
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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "patient_opd_follow_up") {
			global $patient_opd_follow_up;
			$rsmaster = $patient_opd_follow_up->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("patient_opd_follow_uplist.php"); // Return to master page
			} else {
				$patient_opd_follow_up->loadListRowValues($rsmaster);
				$patient_opd_follow_up->RowType = ROWTYPE_MASTER; // Master row
				$patient_opd_follow_up->renderListRow();
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
		if ($CurrentForm->hasValue("x_pid") && $CurrentForm->hasValue("o_pid") && $this->pid->CurrentValue != $this->pid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_fid") && $CurrentForm->hasValue("o_fid") && $this->fid->CurrentValue != $this->fid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_G") && $CurrentForm->hasValue("o_G") && $this->G->CurrentValue != $this->G->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_P") && $CurrentForm->hasValue("o_P") && $this->P->CurrentValue != $this->P->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_L") && $CurrentForm->hasValue("o_L") && $this->L->CurrentValue != $this->L->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A") && $CurrentForm->hasValue("o_A") && $this->A->CurrentValue != $this->A->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_E") && $CurrentForm->hasValue("o_E") && $this->E->CurrentValue != $this->E->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_M") && $CurrentForm->hasValue("o_M") && $this->M->CurrentValue != $this->M->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LMP") && $CurrentForm->hasValue("o_LMP") && $this->LMP->CurrentValue != $this->LMP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EDO") && $CurrentForm->hasValue("o_EDO") && $this->EDO->CurrentValue != $this->EDO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MenstrualHistory") && $CurrentForm->hasValue("o_MenstrualHistory") && $this->MenstrualHistory->CurrentValue != $this->MenstrualHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MaritalHistory") && $CurrentForm->hasValue("o_MaritalHistory") && $this->MaritalHistory->CurrentValue != $this->MaritalHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ObstetricHistory") && $CurrentForm->hasValue("o_ObstetricHistory") && $this->ObstetricHistory->CurrentValue != $this->ObstetricHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreviousHistoryofGDM") && $CurrentForm->hasValue("o_PreviousHistoryofGDM") && $this->PreviousHistoryofGDM->CurrentValue != $this->PreviousHistoryofGDM->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreviousHistorofPIH") && $CurrentForm->hasValue("o_PreviousHistorofPIH") && $this->PreviousHistorofPIH->CurrentValue != $this->PreviousHistorofPIH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreviousHistoryofIUGR") && $CurrentForm->hasValue("o_PreviousHistoryofIUGR") && $this->PreviousHistoryofIUGR->CurrentValue != $this->PreviousHistoryofIUGR->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreviousHistoryofOligohydramnios") && $CurrentForm->hasValue("o_PreviousHistoryofOligohydramnios") && $this->PreviousHistoryofOligohydramnios->CurrentValue != $this->PreviousHistoryofOligohydramnios->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PreviousHistoryofPreterm") && $CurrentForm->hasValue("o_PreviousHistoryofPreterm") && $this->PreviousHistoryofPreterm->CurrentValue != $this->PreviousHistoryofPreterm->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_G1") && $CurrentForm->hasValue("o_G1") && $this->G1->CurrentValue != $this->G1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_G2") && $CurrentForm->hasValue("o_G2") && $this->G2->CurrentValue != $this->G2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_G3") && $CurrentForm->hasValue("o_G3") && $this->G3->CurrentValue != $this->G3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeliveryNDLSCS1") && $CurrentForm->hasValue("o_DeliveryNDLSCS1") && $this->DeliveryNDLSCS1->CurrentValue != $this->DeliveryNDLSCS1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeliveryNDLSCS2") && $CurrentForm->hasValue("o_DeliveryNDLSCS2") && $this->DeliveryNDLSCS2->CurrentValue != $this->DeliveryNDLSCS2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeliveryNDLSCS3") && $CurrentForm->hasValue("o_DeliveryNDLSCS3") && $this->DeliveryNDLSCS3->CurrentValue != $this->DeliveryNDLSCS3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BabySexweight1") && $CurrentForm->hasValue("o_BabySexweight1") && $this->BabySexweight1->CurrentValue != $this->BabySexweight1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BabySexweight2") && $CurrentForm->hasValue("o_BabySexweight2") && $this->BabySexweight2->CurrentValue != $this->BabySexweight2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BabySexweight3") && $CurrentForm->hasValue("o_BabySexweight3") && $this->BabySexweight3->CurrentValue != $this->BabySexweight3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PastMedicalHistory") && $CurrentForm->hasValue("o_PastMedicalHistory") && $this->PastMedicalHistory->CurrentValue != $this->PastMedicalHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PastSurgicalHistory") && $CurrentForm->hasValue("o_PastSurgicalHistory") && $this->PastSurgicalHistory->CurrentValue != $this->PastSurgicalHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FamilyHistory") && $CurrentForm->hasValue("o_FamilyHistory") && $this->FamilyHistory->CurrentValue != $this->FamilyHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Viability") && $CurrentForm->hasValue("o_Viability") && $this->Viability->CurrentValue != $this->Viability->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ViabilityDATE") && $CurrentForm->hasValue("o_ViabilityDATE") && $this->ViabilityDATE->CurrentValue != $this->ViabilityDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ViabilityREPORT") && $CurrentForm->hasValue("o_ViabilityREPORT") && $this->ViabilityREPORT->CurrentValue != $this->ViabilityREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Viability2") && $CurrentForm->hasValue("o_Viability2") && $this->Viability2->CurrentValue != $this->Viability2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Viability2DATE") && $CurrentForm->hasValue("o_Viability2DATE") && $this->Viability2DATE->CurrentValue != $this->Viability2DATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Viability2REPORT") && $CurrentForm->hasValue("o_Viability2REPORT") && $this->Viability2REPORT->CurrentValue != $this->Viability2REPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NTscan") && $CurrentForm->hasValue("o_NTscan") && $this->NTscan->CurrentValue != $this->NTscan->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NTscanDATE") && $CurrentForm->hasValue("o_NTscanDATE") && $this->NTscanDATE->CurrentValue != $this->NTscanDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NTscanREPORT") && $CurrentForm->hasValue("o_NTscanREPORT") && $this->NTscanREPORT->CurrentValue != $this->NTscanREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EarlyTarget") && $CurrentForm->hasValue("o_EarlyTarget") && $this->EarlyTarget->CurrentValue != $this->EarlyTarget->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EarlyTargetDATE") && $CurrentForm->hasValue("o_EarlyTargetDATE") && $this->EarlyTargetDATE->CurrentValue != $this->EarlyTargetDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EarlyTargetREPORT") && $CurrentForm->hasValue("o_EarlyTargetREPORT") && $this->EarlyTargetREPORT->CurrentValue != $this->EarlyTargetREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Anomaly") && $CurrentForm->hasValue("o_Anomaly") && $this->Anomaly->CurrentValue != $this->Anomaly->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnomalyDATE") && $CurrentForm->hasValue("o_AnomalyDATE") && $this->AnomalyDATE->CurrentValue != $this->AnomalyDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnomalyREPORT") && $CurrentForm->hasValue("o_AnomalyREPORT") && $this->AnomalyREPORT->CurrentValue != $this->AnomalyREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Growth") && $CurrentForm->hasValue("o_Growth") && $this->Growth->CurrentValue != $this->Growth->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GrowthDATE") && $CurrentForm->hasValue("o_GrowthDATE") && $this->GrowthDATE->CurrentValue != $this->GrowthDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GrowthREPORT") && $CurrentForm->hasValue("o_GrowthREPORT") && $this->GrowthREPORT->CurrentValue != $this->GrowthREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Growth1") && $CurrentForm->hasValue("o_Growth1") && $this->Growth1->CurrentValue != $this->Growth1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Growth1DATE") && $CurrentForm->hasValue("o_Growth1DATE") && $this->Growth1DATE->CurrentValue != $this->Growth1DATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Growth1REPORT") && $CurrentForm->hasValue("o_Growth1REPORT") && $this->Growth1REPORT->CurrentValue != $this->Growth1REPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANProfile") && $CurrentForm->hasValue("o_ANProfile") && $this->ANProfile->CurrentValue != $this->ANProfile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANProfileDATE") && $CurrentForm->hasValue("o_ANProfileDATE") && $this->ANProfileDATE->CurrentValue != $this->ANProfileDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANProfileINHOUSE") && $CurrentForm->hasValue("o_ANProfileINHOUSE") && $this->ANProfileINHOUSE->CurrentValue != $this->ANProfileINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANProfileREPORT") && $CurrentForm->hasValue("o_ANProfileREPORT") && $this->ANProfileREPORT->CurrentValue != $this->ANProfileREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DualMarker") && $CurrentForm->hasValue("o_DualMarker") && $this->DualMarker->CurrentValue != $this->DualMarker->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DualMarkerDATE") && $CurrentForm->hasValue("o_DualMarkerDATE") && $this->DualMarkerDATE->CurrentValue != $this->DualMarkerDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DualMarkerINHOUSE") && $CurrentForm->hasValue("o_DualMarkerINHOUSE") && $this->DualMarkerINHOUSE->CurrentValue != $this->DualMarkerINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DualMarkerREPORT") && $CurrentForm->hasValue("o_DualMarkerREPORT") && $this->DualMarkerREPORT->CurrentValue != $this->DualMarkerREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Quadruple") && $CurrentForm->hasValue("o_Quadruple") && $this->Quadruple->CurrentValue != $this->Quadruple->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_QuadrupleDATE") && $CurrentForm->hasValue("o_QuadrupleDATE") && $this->QuadrupleDATE->CurrentValue != $this->QuadrupleDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_QuadrupleINHOUSE") && $CurrentForm->hasValue("o_QuadrupleINHOUSE") && $this->QuadrupleINHOUSE->CurrentValue != $this->QuadrupleINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_QuadrupleREPORT") && $CurrentForm->hasValue("o_QuadrupleREPORT") && $this->QuadrupleREPORT->CurrentValue != $this->QuadrupleREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A5month") && $CurrentForm->hasValue("o_A5month") && $this->A5month->CurrentValue != $this->A5month->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A5monthDATE") && $CurrentForm->hasValue("o_A5monthDATE") && $this->A5monthDATE->CurrentValue != $this->A5monthDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A5monthINHOUSE") && $CurrentForm->hasValue("o_A5monthINHOUSE") && $this->A5monthINHOUSE->CurrentValue != $this->A5monthINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A5monthREPORT") && $CurrentForm->hasValue("o_A5monthREPORT") && $this->A5monthREPORT->CurrentValue != $this->A5monthREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A7month") && $CurrentForm->hasValue("o_A7month") && $this->A7month->CurrentValue != $this->A7month->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A7monthDATE") && $CurrentForm->hasValue("o_A7monthDATE") && $this->A7monthDATE->CurrentValue != $this->A7monthDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A7monthINHOUSE") && $CurrentForm->hasValue("o_A7monthINHOUSE") && $this->A7monthINHOUSE->CurrentValue != $this->A7monthINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A7monthREPORT") && $CurrentForm->hasValue("o_A7monthREPORT") && $this->A7monthREPORT->CurrentValue != $this->A7monthREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A9month") && $CurrentForm->hasValue("o_A9month") && $this->A9month->CurrentValue != $this->A9month->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A9monthDATE") && $CurrentForm->hasValue("o_A9monthDATE") && $this->A9monthDATE->CurrentValue != $this->A9monthDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A9monthINHOUSE") && $CurrentForm->hasValue("o_A9monthINHOUSE") && $this->A9monthINHOUSE->CurrentValue != $this->A9monthINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_A9monthREPORT") && $CurrentForm->hasValue("o_A9monthREPORT") && $this->A9monthREPORT->CurrentValue != $this->A9monthREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_INJ") && $CurrentForm->hasValue("o_INJ") && $this->INJ->CurrentValue != $this->INJ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_INJDATE") && $CurrentForm->hasValue("o_INJDATE") && $this->INJDATE->CurrentValue != $this->INJDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_INJINHOUSE") && $CurrentForm->hasValue("o_INJINHOUSE") && $this->INJINHOUSE->CurrentValue != $this->INJINHOUSE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_INJREPORT") && $CurrentForm->hasValue("o_INJREPORT") && $this->INJREPORT->CurrentValue != $this->INJREPORT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Bleeding") && $CurrentForm->hasValue("o_Bleeding") && $this->Bleeding->CurrentValue != $this->Bleeding->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Hypothyroidism") && $CurrentForm->hasValue("o_Hypothyroidism") && $this->Hypothyroidism->CurrentValue != $this->Hypothyroidism->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PICMENumber") && $CurrentForm->hasValue("o_PICMENumber") && $this->PICMENumber->CurrentValue != $this->PICMENumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Outcome") && $CurrentForm->hasValue("o_Outcome") && $this->Outcome->CurrentValue != $this->Outcome->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofAdmission") && $CurrentForm->hasValue("o_DateofAdmission") && $this->DateofAdmission->CurrentValue != $this->DateofAdmission->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateodProcedure") && $CurrentForm->hasValue("o_DateodProcedure") && $this->DateodProcedure->CurrentValue != $this->DateodProcedure->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Miscarriage") && $CurrentForm->hasValue("o_Miscarriage") && $this->Miscarriage->CurrentValue != $this->Miscarriage->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModeOfDelivery") && $CurrentForm->hasValue("o_ModeOfDelivery") && $this->ModeOfDelivery->CurrentValue != $this->ModeOfDelivery->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ND") && $CurrentForm->hasValue("o_ND") && $this->ND->CurrentValue != $this->ND->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NDS") && $CurrentForm->hasValue("o_NDS") && $this->NDS->CurrentValue != $this->NDS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NDP") && $CurrentForm->hasValue("o_NDP") && $this->NDP->CurrentValue != $this->NDP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vaccum") && $CurrentForm->hasValue("o_Vaccum") && $this->Vaccum->CurrentValue != $this->Vaccum->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VaccumS") && $CurrentForm->hasValue("o_VaccumS") && $this->VaccumS->CurrentValue != $this->VaccumS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VaccumP") && $CurrentForm->hasValue("o_VaccumP") && $this->VaccumP->CurrentValue != $this->VaccumP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Forceps") && $CurrentForm->hasValue("o_Forceps") && $this->Forceps->CurrentValue != $this->Forceps->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ForcepsS") && $CurrentForm->hasValue("o_ForcepsS") && $this->ForcepsS->CurrentValue != $this->ForcepsS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ForcepsP") && $CurrentForm->hasValue("o_ForcepsP") && $this->ForcepsP->CurrentValue != $this->ForcepsP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Elective") && $CurrentForm->hasValue("o_Elective") && $this->Elective->CurrentValue != $this->Elective->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ElectiveS") && $CurrentForm->hasValue("o_ElectiveS") && $this->ElectiveS->CurrentValue != $this->ElectiveS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ElectiveP") && $CurrentForm->hasValue("o_ElectiveP") && $this->ElectiveP->CurrentValue != $this->ElectiveP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Emergency") && $CurrentForm->hasValue("o_Emergency") && $this->Emergency->CurrentValue != $this->Emergency->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmergencyS") && $CurrentForm->hasValue("o_EmergencyS") && $this->EmergencyS->CurrentValue != $this->EmergencyS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmergencyP") && $CurrentForm->hasValue("o_EmergencyP") && $this->EmergencyP->CurrentValue != $this->EmergencyP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Maturity") && $CurrentForm->hasValue("o_Maturity") && $this->Maturity->CurrentValue != $this->Maturity->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Baby1") && $CurrentForm->hasValue("o_Baby1") && $this->Baby1->CurrentValue != $this->Baby1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Baby2") && $CurrentForm->hasValue("o_Baby2") && $this->Baby2->CurrentValue != $this->Baby2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sex1") && $CurrentForm->hasValue("o_sex1") && $this->sex1->CurrentValue != $this->sex1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sex2") && $CurrentForm->hasValue("o_sex2") && $this->sex2->CurrentValue != $this->sex2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_weight1") && $CurrentForm->hasValue("o_weight1") && $this->weight1->CurrentValue != $this->weight1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_weight2") && $CurrentForm->hasValue("o_weight2") && $this->weight2->CurrentValue != $this->weight2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NICU1") && $CurrentForm->hasValue("o_NICU1") && $this->NICU1->CurrentValue != $this->NICU1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NICU2") && $CurrentForm->hasValue("o_NICU2") && $this->NICU2->CurrentValue != $this->NICU2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jaundice1") && $CurrentForm->hasValue("o_Jaundice1") && $this->Jaundice1->CurrentValue != $this->Jaundice1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Jaundice2") && $CurrentForm->hasValue("o_Jaundice2") && $this->Jaundice2->CurrentValue != $this->Jaundice2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Others1") && $CurrentForm->hasValue("o_Others1") && $this->Others1->CurrentValue != $this->Others1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Others2") && $CurrentForm->hasValue("o_Others2") && $this->Others2->CurrentValue != $this->Others2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SpillOverReasons") && $CurrentForm->hasValue("o_SpillOverReasons") && $this->SpillOverReasons->CurrentValue != $this->SpillOverReasons->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANClosed") && $CurrentForm->hasValue("o_ANClosed") && $this->ANClosed->CurrentValue != $this->ANClosed->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ANClosedDATE") && $CurrentForm->hasValue("o_ANClosedDATE") && $this->ANClosedDATE->CurrentValue != $this->ANClosedDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PastMedicalHistoryOthers") && $CurrentForm->hasValue("o_PastMedicalHistoryOthers") && $this->PastMedicalHistoryOthers->CurrentValue != $this->PastMedicalHistoryOthers->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PastSurgicalHistoryOthers") && $CurrentForm->hasValue("o_PastSurgicalHistoryOthers") && $this->PastSurgicalHistoryOthers->CurrentValue != $this->PastSurgicalHistoryOthers->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FamilyHistoryOthers") && $CurrentForm->hasValue("o_FamilyHistoryOthers") && $this->FamilyHistoryOthers->CurrentValue != $this->FamilyHistoryOthers->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PresentPregnancyComplicationsOthers") && $CurrentForm->hasValue("o_PresentPregnancyComplicationsOthers") && $this->PresentPregnancyComplicationsOthers->CurrentValue != $this->PresentPregnancyComplicationsOthers->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ETdate") && $CurrentForm->hasValue("o_ETdate") && $this->ETdate->CurrentValue != $this->ETdate->OldValue)
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
				$this->fid->setSessionValue("");
				$this->pid->setSessionValue("");
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
		$this->pid->CurrentValue = NULL;
		$this->pid->OldValue = $this->pid->CurrentValue;
		$this->fid->CurrentValue = NULL;
		$this->fid->OldValue = $this->fid->CurrentValue;
		$this->G->CurrentValue = NULL;
		$this->G->OldValue = $this->G->CurrentValue;
		$this->P->CurrentValue = NULL;
		$this->P->OldValue = $this->P->CurrentValue;
		$this->L->CurrentValue = NULL;
		$this->L->OldValue = $this->L->CurrentValue;
		$this->A->CurrentValue = NULL;
		$this->A->OldValue = $this->A->CurrentValue;
		$this->E->CurrentValue = NULL;
		$this->E->OldValue = $this->E->CurrentValue;
		$this->M->CurrentValue = NULL;
		$this->M->OldValue = $this->M->CurrentValue;
		$this->LMP->CurrentValue = NULL;
		$this->LMP->OldValue = $this->LMP->CurrentValue;
		$this->EDO->CurrentValue = NULL;
		$this->EDO->OldValue = $this->EDO->CurrentValue;
		$this->MenstrualHistory->CurrentValue = NULL;
		$this->MenstrualHistory->OldValue = $this->MenstrualHistory->CurrentValue;
		$this->MaritalHistory->CurrentValue = NULL;
		$this->MaritalHistory->OldValue = $this->MaritalHistory->CurrentValue;
		$this->ObstetricHistory->CurrentValue = NULL;
		$this->ObstetricHistory->OldValue = $this->ObstetricHistory->CurrentValue;
		$this->PreviousHistoryofGDM->CurrentValue = NULL;
		$this->PreviousHistoryofGDM->OldValue = $this->PreviousHistoryofGDM->CurrentValue;
		$this->PreviousHistorofPIH->CurrentValue = NULL;
		$this->PreviousHistorofPIH->OldValue = $this->PreviousHistorofPIH->CurrentValue;
		$this->PreviousHistoryofIUGR->CurrentValue = NULL;
		$this->PreviousHistoryofIUGR->OldValue = $this->PreviousHistoryofIUGR->CurrentValue;
		$this->PreviousHistoryofOligohydramnios->CurrentValue = NULL;
		$this->PreviousHistoryofOligohydramnios->OldValue = $this->PreviousHistoryofOligohydramnios->CurrentValue;
		$this->PreviousHistoryofPreterm->CurrentValue = NULL;
		$this->PreviousHistoryofPreterm->OldValue = $this->PreviousHistoryofPreterm->CurrentValue;
		$this->G1->CurrentValue = NULL;
		$this->G1->OldValue = $this->G1->CurrentValue;
		$this->G2->CurrentValue = NULL;
		$this->G2->OldValue = $this->G2->CurrentValue;
		$this->G3->CurrentValue = NULL;
		$this->G3->OldValue = $this->G3->CurrentValue;
		$this->DeliveryNDLSCS1->CurrentValue = NULL;
		$this->DeliveryNDLSCS1->OldValue = $this->DeliveryNDLSCS1->CurrentValue;
		$this->DeliveryNDLSCS2->CurrentValue = NULL;
		$this->DeliveryNDLSCS2->OldValue = $this->DeliveryNDLSCS2->CurrentValue;
		$this->DeliveryNDLSCS3->CurrentValue = NULL;
		$this->DeliveryNDLSCS3->OldValue = $this->DeliveryNDLSCS3->CurrentValue;
		$this->BabySexweight1->CurrentValue = NULL;
		$this->BabySexweight1->OldValue = $this->BabySexweight1->CurrentValue;
		$this->BabySexweight2->CurrentValue = NULL;
		$this->BabySexweight2->OldValue = $this->BabySexweight2->CurrentValue;
		$this->BabySexweight3->CurrentValue = NULL;
		$this->BabySexweight3->OldValue = $this->BabySexweight3->CurrentValue;
		$this->PastMedicalHistory->CurrentValue = NULL;
		$this->PastMedicalHistory->OldValue = $this->PastMedicalHistory->CurrentValue;
		$this->PastSurgicalHistory->CurrentValue = NULL;
		$this->PastSurgicalHistory->OldValue = $this->PastSurgicalHistory->CurrentValue;
		$this->FamilyHistory->CurrentValue = NULL;
		$this->FamilyHistory->OldValue = $this->FamilyHistory->CurrentValue;
		$this->Viability->CurrentValue = NULL;
		$this->Viability->OldValue = $this->Viability->CurrentValue;
		$this->ViabilityDATE->CurrentValue = NULL;
		$this->ViabilityDATE->OldValue = $this->ViabilityDATE->CurrentValue;
		$this->ViabilityREPORT->CurrentValue = NULL;
		$this->ViabilityREPORT->OldValue = $this->ViabilityREPORT->CurrentValue;
		$this->Viability2->CurrentValue = NULL;
		$this->Viability2->OldValue = $this->Viability2->CurrentValue;
		$this->Viability2DATE->CurrentValue = NULL;
		$this->Viability2DATE->OldValue = $this->Viability2DATE->CurrentValue;
		$this->Viability2REPORT->CurrentValue = NULL;
		$this->Viability2REPORT->OldValue = $this->Viability2REPORT->CurrentValue;
		$this->NTscan->CurrentValue = NULL;
		$this->NTscan->OldValue = $this->NTscan->CurrentValue;
		$this->NTscanDATE->CurrentValue = NULL;
		$this->NTscanDATE->OldValue = $this->NTscanDATE->CurrentValue;
		$this->NTscanREPORT->CurrentValue = NULL;
		$this->NTscanREPORT->OldValue = $this->NTscanREPORT->CurrentValue;
		$this->EarlyTarget->CurrentValue = NULL;
		$this->EarlyTarget->OldValue = $this->EarlyTarget->CurrentValue;
		$this->EarlyTargetDATE->CurrentValue = NULL;
		$this->EarlyTargetDATE->OldValue = $this->EarlyTargetDATE->CurrentValue;
		$this->EarlyTargetREPORT->CurrentValue = NULL;
		$this->EarlyTargetREPORT->OldValue = $this->EarlyTargetREPORT->CurrentValue;
		$this->Anomaly->CurrentValue = NULL;
		$this->Anomaly->OldValue = $this->Anomaly->CurrentValue;
		$this->AnomalyDATE->CurrentValue = NULL;
		$this->AnomalyDATE->OldValue = $this->AnomalyDATE->CurrentValue;
		$this->AnomalyREPORT->CurrentValue = NULL;
		$this->AnomalyREPORT->OldValue = $this->AnomalyREPORT->CurrentValue;
		$this->Growth->CurrentValue = NULL;
		$this->Growth->OldValue = $this->Growth->CurrentValue;
		$this->GrowthDATE->CurrentValue = NULL;
		$this->GrowthDATE->OldValue = $this->GrowthDATE->CurrentValue;
		$this->GrowthREPORT->CurrentValue = NULL;
		$this->GrowthREPORT->OldValue = $this->GrowthREPORT->CurrentValue;
		$this->Growth1->CurrentValue = NULL;
		$this->Growth1->OldValue = $this->Growth1->CurrentValue;
		$this->Growth1DATE->CurrentValue = NULL;
		$this->Growth1DATE->OldValue = $this->Growth1DATE->CurrentValue;
		$this->Growth1REPORT->CurrentValue = NULL;
		$this->Growth1REPORT->OldValue = $this->Growth1REPORT->CurrentValue;
		$this->ANProfile->CurrentValue = NULL;
		$this->ANProfile->OldValue = $this->ANProfile->CurrentValue;
		$this->ANProfileDATE->CurrentValue = NULL;
		$this->ANProfileDATE->OldValue = $this->ANProfileDATE->CurrentValue;
		$this->ANProfileINHOUSE->CurrentValue = NULL;
		$this->ANProfileINHOUSE->OldValue = $this->ANProfileINHOUSE->CurrentValue;
		$this->ANProfileREPORT->CurrentValue = NULL;
		$this->ANProfileREPORT->OldValue = $this->ANProfileREPORT->CurrentValue;
		$this->DualMarker->CurrentValue = NULL;
		$this->DualMarker->OldValue = $this->DualMarker->CurrentValue;
		$this->DualMarkerDATE->CurrentValue = NULL;
		$this->DualMarkerDATE->OldValue = $this->DualMarkerDATE->CurrentValue;
		$this->DualMarkerINHOUSE->CurrentValue = NULL;
		$this->DualMarkerINHOUSE->OldValue = $this->DualMarkerINHOUSE->CurrentValue;
		$this->DualMarkerREPORT->CurrentValue = NULL;
		$this->DualMarkerREPORT->OldValue = $this->DualMarkerREPORT->CurrentValue;
		$this->Quadruple->CurrentValue = NULL;
		$this->Quadruple->OldValue = $this->Quadruple->CurrentValue;
		$this->QuadrupleDATE->CurrentValue = NULL;
		$this->QuadrupleDATE->OldValue = $this->QuadrupleDATE->CurrentValue;
		$this->QuadrupleINHOUSE->CurrentValue = NULL;
		$this->QuadrupleINHOUSE->OldValue = $this->QuadrupleINHOUSE->CurrentValue;
		$this->QuadrupleREPORT->CurrentValue = NULL;
		$this->QuadrupleREPORT->OldValue = $this->QuadrupleREPORT->CurrentValue;
		$this->A5month->CurrentValue = NULL;
		$this->A5month->OldValue = $this->A5month->CurrentValue;
		$this->A5monthDATE->CurrentValue = NULL;
		$this->A5monthDATE->OldValue = $this->A5monthDATE->CurrentValue;
		$this->A5monthINHOUSE->CurrentValue = NULL;
		$this->A5monthINHOUSE->OldValue = $this->A5monthINHOUSE->CurrentValue;
		$this->A5monthREPORT->CurrentValue = NULL;
		$this->A5monthREPORT->OldValue = $this->A5monthREPORT->CurrentValue;
		$this->A7month->CurrentValue = NULL;
		$this->A7month->OldValue = $this->A7month->CurrentValue;
		$this->A7monthDATE->CurrentValue = NULL;
		$this->A7monthDATE->OldValue = $this->A7monthDATE->CurrentValue;
		$this->A7monthINHOUSE->CurrentValue = NULL;
		$this->A7monthINHOUSE->OldValue = $this->A7monthINHOUSE->CurrentValue;
		$this->A7monthREPORT->CurrentValue = NULL;
		$this->A7monthREPORT->OldValue = $this->A7monthREPORT->CurrentValue;
		$this->A9month->CurrentValue = NULL;
		$this->A9month->OldValue = $this->A9month->CurrentValue;
		$this->A9monthDATE->CurrentValue = NULL;
		$this->A9monthDATE->OldValue = $this->A9monthDATE->CurrentValue;
		$this->A9monthINHOUSE->CurrentValue = NULL;
		$this->A9monthINHOUSE->OldValue = $this->A9monthINHOUSE->CurrentValue;
		$this->A9monthREPORT->CurrentValue = NULL;
		$this->A9monthREPORT->OldValue = $this->A9monthREPORT->CurrentValue;
		$this->INJ->CurrentValue = NULL;
		$this->INJ->OldValue = $this->INJ->CurrentValue;
		$this->INJDATE->CurrentValue = NULL;
		$this->INJDATE->OldValue = $this->INJDATE->CurrentValue;
		$this->INJINHOUSE->CurrentValue = NULL;
		$this->INJINHOUSE->OldValue = $this->INJINHOUSE->CurrentValue;
		$this->INJREPORT->CurrentValue = NULL;
		$this->INJREPORT->OldValue = $this->INJREPORT->CurrentValue;
		$this->Bleeding->CurrentValue = NULL;
		$this->Bleeding->OldValue = $this->Bleeding->CurrentValue;
		$this->Hypothyroidism->CurrentValue = NULL;
		$this->Hypothyroidism->OldValue = $this->Hypothyroidism->CurrentValue;
		$this->PICMENumber->CurrentValue = NULL;
		$this->PICMENumber->OldValue = $this->PICMENumber->CurrentValue;
		$this->Outcome->CurrentValue = NULL;
		$this->Outcome->OldValue = $this->Outcome->CurrentValue;
		$this->DateofAdmission->CurrentValue = NULL;
		$this->DateofAdmission->OldValue = $this->DateofAdmission->CurrentValue;
		$this->DateodProcedure->CurrentValue = NULL;
		$this->DateodProcedure->OldValue = $this->DateodProcedure->CurrentValue;
		$this->Miscarriage->CurrentValue = NULL;
		$this->Miscarriage->OldValue = $this->Miscarriage->CurrentValue;
		$this->ModeOfDelivery->CurrentValue = NULL;
		$this->ModeOfDelivery->OldValue = $this->ModeOfDelivery->CurrentValue;
		$this->ND->CurrentValue = NULL;
		$this->ND->OldValue = $this->ND->CurrentValue;
		$this->NDS->CurrentValue = NULL;
		$this->NDS->OldValue = $this->NDS->CurrentValue;
		$this->NDP->CurrentValue = NULL;
		$this->NDP->OldValue = $this->NDP->CurrentValue;
		$this->Vaccum->CurrentValue = NULL;
		$this->Vaccum->OldValue = $this->Vaccum->CurrentValue;
		$this->VaccumS->CurrentValue = NULL;
		$this->VaccumS->OldValue = $this->VaccumS->CurrentValue;
		$this->VaccumP->CurrentValue = NULL;
		$this->VaccumP->OldValue = $this->VaccumP->CurrentValue;
		$this->Forceps->CurrentValue = NULL;
		$this->Forceps->OldValue = $this->Forceps->CurrentValue;
		$this->ForcepsS->CurrentValue = NULL;
		$this->ForcepsS->OldValue = $this->ForcepsS->CurrentValue;
		$this->ForcepsP->CurrentValue = NULL;
		$this->ForcepsP->OldValue = $this->ForcepsP->CurrentValue;
		$this->Elective->CurrentValue = NULL;
		$this->Elective->OldValue = $this->Elective->CurrentValue;
		$this->ElectiveS->CurrentValue = NULL;
		$this->ElectiveS->OldValue = $this->ElectiveS->CurrentValue;
		$this->ElectiveP->CurrentValue = NULL;
		$this->ElectiveP->OldValue = $this->ElectiveP->CurrentValue;
		$this->Emergency->CurrentValue = NULL;
		$this->Emergency->OldValue = $this->Emergency->CurrentValue;
		$this->EmergencyS->CurrentValue = NULL;
		$this->EmergencyS->OldValue = $this->EmergencyS->CurrentValue;
		$this->EmergencyP->CurrentValue = NULL;
		$this->EmergencyP->OldValue = $this->EmergencyP->CurrentValue;
		$this->Maturity->CurrentValue = NULL;
		$this->Maturity->OldValue = $this->Maturity->CurrentValue;
		$this->Baby1->CurrentValue = NULL;
		$this->Baby1->OldValue = $this->Baby1->CurrentValue;
		$this->Baby2->CurrentValue = NULL;
		$this->Baby2->OldValue = $this->Baby2->CurrentValue;
		$this->sex1->CurrentValue = NULL;
		$this->sex1->OldValue = $this->sex1->CurrentValue;
		$this->sex2->CurrentValue = NULL;
		$this->sex2->OldValue = $this->sex2->CurrentValue;
		$this->weight1->CurrentValue = NULL;
		$this->weight1->OldValue = $this->weight1->CurrentValue;
		$this->weight2->CurrentValue = NULL;
		$this->weight2->OldValue = $this->weight2->CurrentValue;
		$this->NICU1->CurrentValue = NULL;
		$this->NICU1->OldValue = $this->NICU1->CurrentValue;
		$this->NICU2->CurrentValue = NULL;
		$this->NICU2->OldValue = $this->NICU2->CurrentValue;
		$this->Jaundice1->CurrentValue = NULL;
		$this->Jaundice1->OldValue = $this->Jaundice1->CurrentValue;
		$this->Jaundice2->CurrentValue = NULL;
		$this->Jaundice2->OldValue = $this->Jaundice2->CurrentValue;
		$this->Others1->CurrentValue = NULL;
		$this->Others1->OldValue = $this->Others1->CurrentValue;
		$this->Others2->CurrentValue = NULL;
		$this->Others2->OldValue = $this->Others2->CurrentValue;
		$this->SpillOverReasons->CurrentValue = NULL;
		$this->SpillOverReasons->OldValue = $this->SpillOverReasons->CurrentValue;
		$this->ANClosed->CurrentValue = NULL;
		$this->ANClosed->OldValue = $this->ANClosed->CurrentValue;
		$this->ANClosedDATE->CurrentValue = NULL;
		$this->ANClosedDATE->OldValue = $this->ANClosedDATE->CurrentValue;
		$this->PastMedicalHistoryOthers->CurrentValue = NULL;
		$this->PastMedicalHistoryOthers->OldValue = $this->PastMedicalHistoryOthers->CurrentValue;
		$this->PastSurgicalHistoryOthers->CurrentValue = NULL;
		$this->PastSurgicalHistoryOthers->OldValue = $this->PastSurgicalHistoryOthers->CurrentValue;
		$this->FamilyHistoryOthers->CurrentValue = NULL;
		$this->FamilyHistoryOthers->OldValue = $this->FamilyHistoryOthers->CurrentValue;
		$this->PresentPregnancyComplicationsOthers->CurrentValue = NULL;
		$this->PresentPregnancyComplicationsOthers->OldValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
		$this->ETdate->CurrentValue = NULL;
		$this->ETdate->OldValue = $this->ETdate->CurrentValue;
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

		// Check field name 'pid' first before field var 'x_pid'
		$val = $CurrentForm->hasValue("pid") ? $CurrentForm->getValue("pid") : $CurrentForm->getValue("x_pid");
		if (!$this->pid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pid->Visible = FALSE; // Disable update for API request
			else
				$this->pid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_pid"))
			$this->pid->setOldValue($CurrentForm->getValue("o_pid"));

		// Check field name 'fid' first before field var 'x_fid'
		$val = $CurrentForm->hasValue("fid") ? $CurrentForm->getValue("fid") : $CurrentForm->getValue("x_fid");
		if (!$this->fid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->fid->Visible = FALSE; // Disable update for API request
			else
				$this->fid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_fid"))
			$this->fid->setOldValue($CurrentForm->getValue("o_fid"));

		// Check field name 'G' first before field var 'x_G'
		$val = $CurrentForm->hasValue("G") ? $CurrentForm->getValue("G") : $CurrentForm->getValue("x_G");
		if (!$this->G->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->G->Visible = FALSE; // Disable update for API request
			else
				$this->G->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_G"))
			$this->G->setOldValue($CurrentForm->getValue("o_G"));

		// Check field name 'P' first before field var 'x_P'
		$val = $CurrentForm->hasValue("P") ? $CurrentForm->getValue("P") : $CurrentForm->getValue("x_P");
		if (!$this->P->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->P->Visible = FALSE; // Disable update for API request
			else
				$this->P->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_P"))
			$this->P->setOldValue($CurrentForm->getValue("o_P"));

		// Check field name 'L' first before field var 'x_L'
		$val = $CurrentForm->hasValue("L") ? $CurrentForm->getValue("L") : $CurrentForm->getValue("x_L");
		if (!$this->L->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->L->Visible = FALSE; // Disable update for API request
			else
				$this->L->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_L"))
			$this->L->setOldValue($CurrentForm->getValue("o_L"));

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

		// Check field name 'E' first before field var 'x_E'
		$val = $CurrentForm->hasValue("E") ? $CurrentForm->getValue("E") : $CurrentForm->getValue("x_E");
		if (!$this->E->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->E->Visible = FALSE; // Disable update for API request
			else
				$this->E->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_E"))
			$this->E->setOldValue($CurrentForm->getValue("o_E"));

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

		// Check field name 'LMP' first before field var 'x_LMP'
		$val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
		if (!$this->LMP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LMP->Visible = FALSE; // Disable update for API request
			else
				$this->LMP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_LMP"))
			$this->LMP->setOldValue($CurrentForm->getValue("o_LMP"));

		// Check field name 'EDO' first before field var 'x_EDO'
		$val = $CurrentForm->hasValue("EDO") ? $CurrentForm->getValue("EDO") : $CurrentForm->getValue("x_EDO");
		if (!$this->EDO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EDO->Visible = FALSE; // Disable update for API request
			else
				$this->EDO->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EDO"))
			$this->EDO->setOldValue($CurrentForm->getValue("o_EDO"));

		// Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
		$val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
		if (!$this->MenstrualHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MenstrualHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MenstrualHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MenstrualHistory"))
			$this->MenstrualHistory->setOldValue($CurrentForm->getValue("o_MenstrualHistory"));

		// Check field name 'MaritalHistory' first before field var 'x_MaritalHistory'
		$val = $CurrentForm->hasValue("MaritalHistory") ? $CurrentForm->getValue("MaritalHistory") : $CurrentForm->getValue("x_MaritalHistory");
		if (!$this->MaritalHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MaritalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MaritalHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MaritalHistory"))
			$this->MaritalHistory->setOldValue($CurrentForm->getValue("o_MaritalHistory"));

		// Check field name 'ObstetricHistory' first before field var 'x_ObstetricHistory'
		$val = $CurrentForm->hasValue("ObstetricHistory") ? $CurrentForm->getValue("ObstetricHistory") : $CurrentForm->getValue("x_ObstetricHistory");
		if (!$this->ObstetricHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ObstetricHistory->Visible = FALSE; // Disable update for API request
			else
				$this->ObstetricHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ObstetricHistory"))
			$this->ObstetricHistory->setOldValue($CurrentForm->getValue("o_ObstetricHistory"));

		// Check field name 'PreviousHistoryofGDM' first before field var 'x_PreviousHistoryofGDM'
		$val = $CurrentForm->hasValue("PreviousHistoryofGDM") ? $CurrentForm->getValue("PreviousHistoryofGDM") : $CurrentForm->getValue("x_PreviousHistoryofGDM");
		if (!$this->PreviousHistoryofGDM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreviousHistoryofGDM->Visible = FALSE; // Disable update for API request
			else
				$this->PreviousHistoryofGDM->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreviousHistoryofGDM"))
			$this->PreviousHistoryofGDM->setOldValue($CurrentForm->getValue("o_PreviousHistoryofGDM"));

		// Check field name 'PreviousHistorofPIH' first before field var 'x_PreviousHistorofPIH'
		$val = $CurrentForm->hasValue("PreviousHistorofPIH") ? $CurrentForm->getValue("PreviousHistorofPIH") : $CurrentForm->getValue("x_PreviousHistorofPIH");
		if (!$this->PreviousHistorofPIH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreviousHistorofPIH->Visible = FALSE; // Disable update for API request
			else
				$this->PreviousHistorofPIH->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreviousHistorofPIH"))
			$this->PreviousHistorofPIH->setOldValue($CurrentForm->getValue("o_PreviousHistorofPIH"));

		// Check field name 'PreviousHistoryofIUGR' first before field var 'x_PreviousHistoryofIUGR'
		$val = $CurrentForm->hasValue("PreviousHistoryofIUGR") ? $CurrentForm->getValue("PreviousHistoryofIUGR") : $CurrentForm->getValue("x_PreviousHistoryofIUGR");
		if (!$this->PreviousHistoryofIUGR->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreviousHistoryofIUGR->Visible = FALSE; // Disable update for API request
			else
				$this->PreviousHistoryofIUGR->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreviousHistoryofIUGR"))
			$this->PreviousHistoryofIUGR->setOldValue($CurrentForm->getValue("o_PreviousHistoryofIUGR"));

		// Check field name 'PreviousHistoryofOligohydramnios' first before field var 'x_PreviousHistoryofOligohydramnios'
		$val = $CurrentForm->hasValue("PreviousHistoryofOligohydramnios") ? $CurrentForm->getValue("PreviousHistoryofOligohydramnios") : $CurrentForm->getValue("x_PreviousHistoryofOligohydramnios");
		if (!$this->PreviousHistoryofOligohydramnios->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreviousHistoryofOligohydramnios->Visible = FALSE; // Disable update for API request
			else
				$this->PreviousHistoryofOligohydramnios->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreviousHistoryofOligohydramnios"))
			$this->PreviousHistoryofOligohydramnios->setOldValue($CurrentForm->getValue("o_PreviousHistoryofOligohydramnios"));

		// Check field name 'PreviousHistoryofPreterm' first before field var 'x_PreviousHistoryofPreterm'
		$val = $CurrentForm->hasValue("PreviousHistoryofPreterm") ? $CurrentForm->getValue("PreviousHistoryofPreterm") : $CurrentForm->getValue("x_PreviousHistoryofPreterm");
		if (!$this->PreviousHistoryofPreterm->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreviousHistoryofPreterm->Visible = FALSE; // Disable update for API request
			else
				$this->PreviousHistoryofPreterm->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PreviousHistoryofPreterm"))
			$this->PreviousHistoryofPreterm->setOldValue($CurrentForm->getValue("o_PreviousHistoryofPreterm"));

		// Check field name 'G1' first before field var 'x_G1'
		$val = $CurrentForm->hasValue("G1") ? $CurrentForm->getValue("G1") : $CurrentForm->getValue("x_G1");
		if (!$this->G1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->G1->Visible = FALSE; // Disable update for API request
			else
				$this->G1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_G1"))
			$this->G1->setOldValue($CurrentForm->getValue("o_G1"));

		// Check field name 'G2' first before field var 'x_G2'
		$val = $CurrentForm->hasValue("G2") ? $CurrentForm->getValue("G2") : $CurrentForm->getValue("x_G2");
		if (!$this->G2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->G2->Visible = FALSE; // Disable update for API request
			else
				$this->G2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_G2"))
			$this->G2->setOldValue($CurrentForm->getValue("o_G2"));

		// Check field name 'G3' first before field var 'x_G3'
		$val = $CurrentForm->hasValue("G3") ? $CurrentForm->getValue("G3") : $CurrentForm->getValue("x_G3");
		if (!$this->G3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->G3->Visible = FALSE; // Disable update for API request
			else
				$this->G3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_G3"))
			$this->G3->setOldValue($CurrentForm->getValue("o_G3"));

		// Check field name 'DeliveryNDLSCS1' first before field var 'x_DeliveryNDLSCS1'
		$val = $CurrentForm->hasValue("DeliveryNDLSCS1") ? $CurrentForm->getValue("DeliveryNDLSCS1") : $CurrentForm->getValue("x_DeliveryNDLSCS1");
		if (!$this->DeliveryNDLSCS1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeliveryNDLSCS1->Visible = FALSE; // Disable update for API request
			else
				$this->DeliveryNDLSCS1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeliveryNDLSCS1"))
			$this->DeliveryNDLSCS1->setOldValue($CurrentForm->getValue("o_DeliveryNDLSCS1"));

		// Check field name 'DeliveryNDLSCS2' first before field var 'x_DeliveryNDLSCS2'
		$val = $CurrentForm->hasValue("DeliveryNDLSCS2") ? $CurrentForm->getValue("DeliveryNDLSCS2") : $CurrentForm->getValue("x_DeliveryNDLSCS2");
		if (!$this->DeliveryNDLSCS2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeliveryNDLSCS2->Visible = FALSE; // Disable update for API request
			else
				$this->DeliveryNDLSCS2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeliveryNDLSCS2"))
			$this->DeliveryNDLSCS2->setOldValue($CurrentForm->getValue("o_DeliveryNDLSCS2"));

		// Check field name 'DeliveryNDLSCS3' first before field var 'x_DeliveryNDLSCS3'
		$val = $CurrentForm->hasValue("DeliveryNDLSCS3") ? $CurrentForm->getValue("DeliveryNDLSCS3") : $CurrentForm->getValue("x_DeliveryNDLSCS3");
		if (!$this->DeliveryNDLSCS3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeliveryNDLSCS3->Visible = FALSE; // Disable update for API request
			else
				$this->DeliveryNDLSCS3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeliveryNDLSCS3"))
			$this->DeliveryNDLSCS3->setOldValue($CurrentForm->getValue("o_DeliveryNDLSCS3"));

		// Check field name 'BabySexweight1' first before field var 'x_BabySexweight1'
		$val = $CurrentForm->hasValue("BabySexweight1") ? $CurrentForm->getValue("BabySexweight1") : $CurrentForm->getValue("x_BabySexweight1");
		if (!$this->BabySexweight1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BabySexweight1->Visible = FALSE; // Disable update for API request
			else
				$this->BabySexweight1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BabySexweight1"))
			$this->BabySexweight1->setOldValue($CurrentForm->getValue("o_BabySexweight1"));

		// Check field name 'BabySexweight2' first before field var 'x_BabySexweight2'
		$val = $CurrentForm->hasValue("BabySexweight2") ? $CurrentForm->getValue("BabySexweight2") : $CurrentForm->getValue("x_BabySexweight2");
		if (!$this->BabySexweight2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BabySexweight2->Visible = FALSE; // Disable update for API request
			else
				$this->BabySexweight2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BabySexweight2"))
			$this->BabySexweight2->setOldValue($CurrentForm->getValue("o_BabySexweight2"));

		// Check field name 'BabySexweight3' first before field var 'x_BabySexweight3'
		$val = $CurrentForm->hasValue("BabySexweight3") ? $CurrentForm->getValue("BabySexweight3") : $CurrentForm->getValue("x_BabySexweight3");
		if (!$this->BabySexweight3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BabySexweight3->Visible = FALSE; // Disable update for API request
			else
				$this->BabySexweight3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BabySexweight3"))
			$this->BabySexweight3->setOldValue($CurrentForm->getValue("o_BabySexweight3"));

		// Check field name 'PastMedicalHistory' first before field var 'x_PastMedicalHistory'
		$val = $CurrentForm->hasValue("PastMedicalHistory") ? $CurrentForm->getValue("PastMedicalHistory") : $CurrentForm->getValue("x_PastMedicalHistory");
		if (!$this->PastMedicalHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PastMedicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->PastMedicalHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PastMedicalHistory"))
			$this->PastMedicalHistory->setOldValue($CurrentForm->getValue("o_PastMedicalHistory"));

		// Check field name 'PastSurgicalHistory' first before field var 'x_PastSurgicalHistory'
		$val = $CurrentForm->hasValue("PastSurgicalHistory") ? $CurrentForm->getValue("PastSurgicalHistory") : $CurrentForm->getValue("x_PastSurgicalHistory");
		if (!$this->PastSurgicalHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PastSurgicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->PastSurgicalHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PastSurgicalHistory"))
			$this->PastSurgicalHistory->setOldValue($CurrentForm->getValue("o_PastSurgicalHistory"));

		// Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
		$val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
		if (!$this->FamilyHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FamilyHistory->Visible = FALSE; // Disable update for API request
			else
				$this->FamilyHistory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_FamilyHistory"))
			$this->FamilyHistory->setOldValue($CurrentForm->getValue("o_FamilyHistory"));

		// Check field name 'Viability' first before field var 'x_Viability'
		$val = $CurrentForm->hasValue("Viability") ? $CurrentForm->getValue("Viability") : $CurrentForm->getValue("x_Viability");
		if (!$this->Viability->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Viability->Visible = FALSE; // Disable update for API request
			else
				$this->Viability->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Viability"))
			$this->Viability->setOldValue($CurrentForm->getValue("o_Viability"));

		// Check field name 'ViabilityDATE' first before field var 'x_ViabilityDATE'
		$val = $CurrentForm->hasValue("ViabilityDATE") ? $CurrentForm->getValue("ViabilityDATE") : $CurrentForm->getValue("x_ViabilityDATE");
		if (!$this->ViabilityDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ViabilityDATE->Visible = FALSE; // Disable update for API request
			else
				$this->ViabilityDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ViabilityDATE"))
			$this->ViabilityDATE->setOldValue($CurrentForm->getValue("o_ViabilityDATE"));

		// Check field name 'ViabilityREPORT' first before field var 'x_ViabilityREPORT'
		$val = $CurrentForm->hasValue("ViabilityREPORT") ? $CurrentForm->getValue("ViabilityREPORT") : $CurrentForm->getValue("x_ViabilityREPORT");
		if (!$this->ViabilityREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ViabilityREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->ViabilityREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ViabilityREPORT"))
			$this->ViabilityREPORT->setOldValue($CurrentForm->getValue("o_ViabilityREPORT"));

		// Check field name 'Viability2' first before field var 'x_Viability2'
		$val = $CurrentForm->hasValue("Viability2") ? $CurrentForm->getValue("Viability2") : $CurrentForm->getValue("x_Viability2");
		if (!$this->Viability2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Viability2->Visible = FALSE; // Disable update for API request
			else
				$this->Viability2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Viability2"))
			$this->Viability2->setOldValue($CurrentForm->getValue("o_Viability2"));

		// Check field name 'Viability2DATE' first before field var 'x_Viability2DATE'
		$val = $CurrentForm->hasValue("Viability2DATE") ? $CurrentForm->getValue("Viability2DATE") : $CurrentForm->getValue("x_Viability2DATE");
		if (!$this->Viability2DATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Viability2DATE->Visible = FALSE; // Disable update for API request
			else
				$this->Viability2DATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Viability2DATE"))
			$this->Viability2DATE->setOldValue($CurrentForm->getValue("o_Viability2DATE"));

		// Check field name 'Viability2REPORT' first before field var 'x_Viability2REPORT'
		$val = $CurrentForm->hasValue("Viability2REPORT") ? $CurrentForm->getValue("Viability2REPORT") : $CurrentForm->getValue("x_Viability2REPORT");
		if (!$this->Viability2REPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Viability2REPORT->Visible = FALSE; // Disable update for API request
			else
				$this->Viability2REPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Viability2REPORT"))
			$this->Viability2REPORT->setOldValue($CurrentForm->getValue("o_Viability2REPORT"));

		// Check field name 'NTscan' first before field var 'x_NTscan'
		$val = $CurrentForm->hasValue("NTscan") ? $CurrentForm->getValue("NTscan") : $CurrentForm->getValue("x_NTscan");
		if (!$this->NTscan->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NTscan->Visible = FALSE; // Disable update for API request
			else
				$this->NTscan->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NTscan"))
			$this->NTscan->setOldValue($CurrentForm->getValue("o_NTscan"));

		// Check field name 'NTscanDATE' first before field var 'x_NTscanDATE'
		$val = $CurrentForm->hasValue("NTscanDATE") ? $CurrentForm->getValue("NTscanDATE") : $CurrentForm->getValue("x_NTscanDATE");
		if (!$this->NTscanDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NTscanDATE->Visible = FALSE; // Disable update for API request
			else
				$this->NTscanDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NTscanDATE"))
			$this->NTscanDATE->setOldValue($CurrentForm->getValue("o_NTscanDATE"));

		// Check field name 'NTscanREPORT' first before field var 'x_NTscanREPORT'
		$val = $CurrentForm->hasValue("NTscanREPORT") ? $CurrentForm->getValue("NTscanREPORT") : $CurrentForm->getValue("x_NTscanREPORT");
		if (!$this->NTscanREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NTscanREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->NTscanREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NTscanREPORT"))
			$this->NTscanREPORT->setOldValue($CurrentForm->getValue("o_NTscanREPORT"));

		// Check field name 'EarlyTarget' first before field var 'x_EarlyTarget'
		$val = $CurrentForm->hasValue("EarlyTarget") ? $CurrentForm->getValue("EarlyTarget") : $CurrentForm->getValue("x_EarlyTarget");
		if (!$this->EarlyTarget->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EarlyTarget->Visible = FALSE; // Disable update for API request
			else
				$this->EarlyTarget->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EarlyTarget"))
			$this->EarlyTarget->setOldValue($CurrentForm->getValue("o_EarlyTarget"));

		// Check field name 'EarlyTargetDATE' first before field var 'x_EarlyTargetDATE'
		$val = $CurrentForm->hasValue("EarlyTargetDATE") ? $CurrentForm->getValue("EarlyTargetDATE") : $CurrentForm->getValue("x_EarlyTargetDATE");
		if (!$this->EarlyTargetDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EarlyTargetDATE->Visible = FALSE; // Disable update for API request
			else
				$this->EarlyTargetDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EarlyTargetDATE"))
			$this->EarlyTargetDATE->setOldValue($CurrentForm->getValue("o_EarlyTargetDATE"));

		// Check field name 'EarlyTargetREPORT' first before field var 'x_EarlyTargetREPORT'
		$val = $CurrentForm->hasValue("EarlyTargetREPORT") ? $CurrentForm->getValue("EarlyTargetREPORT") : $CurrentForm->getValue("x_EarlyTargetREPORT");
		if (!$this->EarlyTargetREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EarlyTargetREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->EarlyTargetREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EarlyTargetREPORT"))
			$this->EarlyTargetREPORT->setOldValue($CurrentForm->getValue("o_EarlyTargetREPORT"));

		// Check field name 'Anomaly' first before field var 'x_Anomaly'
		$val = $CurrentForm->hasValue("Anomaly") ? $CurrentForm->getValue("Anomaly") : $CurrentForm->getValue("x_Anomaly");
		if (!$this->Anomaly->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Anomaly->Visible = FALSE; // Disable update for API request
			else
				$this->Anomaly->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Anomaly"))
			$this->Anomaly->setOldValue($CurrentForm->getValue("o_Anomaly"));

		// Check field name 'AnomalyDATE' first before field var 'x_AnomalyDATE'
		$val = $CurrentForm->hasValue("AnomalyDATE") ? $CurrentForm->getValue("AnomalyDATE") : $CurrentForm->getValue("x_AnomalyDATE");
		if (!$this->AnomalyDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnomalyDATE->Visible = FALSE; // Disable update for API request
			else
				$this->AnomalyDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AnomalyDATE"))
			$this->AnomalyDATE->setOldValue($CurrentForm->getValue("o_AnomalyDATE"));

		// Check field name 'AnomalyREPORT' first before field var 'x_AnomalyREPORT'
		$val = $CurrentForm->hasValue("AnomalyREPORT") ? $CurrentForm->getValue("AnomalyREPORT") : $CurrentForm->getValue("x_AnomalyREPORT");
		if (!$this->AnomalyREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnomalyREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->AnomalyREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AnomalyREPORT"))
			$this->AnomalyREPORT->setOldValue($CurrentForm->getValue("o_AnomalyREPORT"));

		// Check field name 'Growth' first before field var 'x_Growth'
		$val = $CurrentForm->hasValue("Growth") ? $CurrentForm->getValue("Growth") : $CurrentForm->getValue("x_Growth");
		if (!$this->Growth->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Growth->Visible = FALSE; // Disable update for API request
			else
				$this->Growth->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Growth"))
			$this->Growth->setOldValue($CurrentForm->getValue("o_Growth"));

		// Check field name 'GrowthDATE' first before field var 'x_GrowthDATE'
		$val = $CurrentForm->hasValue("GrowthDATE") ? $CurrentForm->getValue("GrowthDATE") : $CurrentForm->getValue("x_GrowthDATE");
		if (!$this->GrowthDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GrowthDATE->Visible = FALSE; // Disable update for API request
			else
				$this->GrowthDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_GrowthDATE"))
			$this->GrowthDATE->setOldValue($CurrentForm->getValue("o_GrowthDATE"));

		// Check field name 'GrowthREPORT' first before field var 'x_GrowthREPORT'
		$val = $CurrentForm->hasValue("GrowthREPORT") ? $CurrentForm->getValue("GrowthREPORT") : $CurrentForm->getValue("x_GrowthREPORT");
		if (!$this->GrowthREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GrowthREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->GrowthREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_GrowthREPORT"))
			$this->GrowthREPORT->setOldValue($CurrentForm->getValue("o_GrowthREPORT"));

		// Check field name 'Growth1' first before field var 'x_Growth1'
		$val = $CurrentForm->hasValue("Growth1") ? $CurrentForm->getValue("Growth1") : $CurrentForm->getValue("x_Growth1");
		if (!$this->Growth1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Growth1->Visible = FALSE; // Disable update for API request
			else
				$this->Growth1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Growth1"))
			$this->Growth1->setOldValue($CurrentForm->getValue("o_Growth1"));

		// Check field name 'Growth1DATE' first before field var 'x_Growth1DATE'
		$val = $CurrentForm->hasValue("Growth1DATE") ? $CurrentForm->getValue("Growth1DATE") : $CurrentForm->getValue("x_Growth1DATE");
		if (!$this->Growth1DATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Growth1DATE->Visible = FALSE; // Disable update for API request
			else
				$this->Growth1DATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Growth1DATE"))
			$this->Growth1DATE->setOldValue($CurrentForm->getValue("o_Growth1DATE"));

		// Check field name 'Growth1REPORT' first before field var 'x_Growth1REPORT'
		$val = $CurrentForm->hasValue("Growth1REPORT") ? $CurrentForm->getValue("Growth1REPORT") : $CurrentForm->getValue("x_Growth1REPORT");
		if (!$this->Growth1REPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Growth1REPORT->Visible = FALSE; // Disable update for API request
			else
				$this->Growth1REPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Growth1REPORT"))
			$this->Growth1REPORT->setOldValue($CurrentForm->getValue("o_Growth1REPORT"));

		// Check field name 'ANProfile' first before field var 'x_ANProfile'
		$val = $CurrentForm->hasValue("ANProfile") ? $CurrentForm->getValue("ANProfile") : $CurrentForm->getValue("x_ANProfile");
		if (!$this->ANProfile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANProfile->Visible = FALSE; // Disable update for API request
			else
				$this->ANProfile->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANProfile"))
			$this->ANProfile->setOldValue($CurrentForm->getValue("o_ANProfile"));

		// Check field name 'ANProfileDATE' first before field var 'x_ANProfileDATE'
		$val = $CurrentForm->hasValue("ANProfileDATE") ? $CurrentForm->getValue("ANProfileDATE") : $CurrentForm->getValue("x_ANProfileDATE");
		if (!$this->ANProfileDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANProfileDATE->Visible = FALSE; // Disable update for API request
			else
				$this->ANProfileDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANProfileDATE"))
			$this->ANProfileDATE->setOldValue($CurrentForm->getValue("o_ANProfileDATE"));

		// Check field name 'ANProfileINHOUSE' first before field var 'x_ANProfileINHOUSE'
		$val = $CurrentForm->hasValue("ANProfileINHOUSE") ? $CurrentForm->getValue("ANProfileINHOUSE") : $CurrentForm->getValue("x_ANProfileINHOUSE");
		if (!$this->ANProfileINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANProfileINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->ANProfileINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANProfileINHOUSE"))
			$this->ANProfileINHOUSE->setOldValue($CurrentForm->getValue("o_ANProfileINHOUSE"));

		// Check field name 'ANProfileREPORT' first before field var 'x_ANProfileREPORT'
		$val = $CurrentForm->hasValue("ANProfileREPORT") ? $CurrentForm->getValue("ANProfileREPORT") : $CurrentForm->getValue("x_ANProfileREPORT");
		if (!$this->ANProfileREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANProfileREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->ANProfileREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANProfileREPORT"))
			$this->ANProfileREPORT->setOldValue($CurrentForm->getValue("o_ANProfileREPORT"));

		// Check field name 'DualMarker' first before field var 'x_DualMarker'
		$val = $CurrentForm->hasValue("DualMarker") ? $CurrentForm->getValue("DualMarker") : $CurrentForm->getValue("x_DualMarker");
		if (!$this->DualMarker->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DualMarker->Visible = FALSE; // Disable update for API request
			else
				$this->DualMarker->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DualMarker"))
			$this->DualMarker->setOldValue($CurrentForm->getValue("o_DualMarker"));

		// Check field name 'DualMarkerDATE' first before field var 'x_DualMarkerDATE'
		$val = $CurrentForm->hasValue("DualMarkerDATE") ? $CurrentForm->getValue("DualMarkerDATE") : $CurrentForm->getValue("x_DualMarkerDATE");
		if (!$this->DualMarkerDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DualMarkerDATE->Visible = FALSE; // Disable update for API request
			else
				$this->DualMarkerDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DualMarkerDATE"))
			$this->DualMarkerDATE->setOldValue($CurrentForm->getValue("o_DualMarkerDATE"));

		// Check field name 'DualMarkerINHOUSE' first before field var 'x_DualMarkerINHOUSE'
		$val = $CurrentForm->hasValue("DualMarkerINHOUSE") ? $CurrentForm->getValue("DualMarkerINHOUSE") : $CurrentForm->getValue("x_DualMarkerINHOUSE");
		if (!$this->DualMarkerINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DualMarkerINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->DualMarkerINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DualMarkerINHOUSE"))
			$this->DualMarkerINHOUSE->setOldValue($CurrentForm->getValue("o_DualMarkerINHOUSE"));

		// Check field name 'DualMarkerREPORT' first before field var 'x_DualMarkerREPORT'
		$val = $CurrentForm->hasValue("DualMarkerREPORT") ? $CurrentForm->getValue("DualMarkerREPORT") : $CurrentForm->getValue("x_DualMarkerREPORT");
		if (!$this->DualMarkerREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DualMarkerREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->DualMarkerREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DualMarkerREPORT"))
			$this->DualMarkerREPORT->setOldValue($CurrentForm->getValue("o_DualMarkerREPORT"));

		// Check field name 'Quadruple' first before field var 'x_Quadruple'
		$val = $CurrentForm->hasValue("Quadruple") ? $CurrentForm->getValue("Quadruple") : $CurrentForm->getValue("x_Quadruple");
		if (!$this->Quadruple->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Quadruple->Visible = FALSE; // Disable update for API request
			else
				$this->Quadruple->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Quadruple"))
			$this->Quadruple->setOldValue($CurrentForm->getValue("o_Quadruple"));

		// Check field name 'QuadrupleDATE' first before field var 'x_QuadrupleDATE'
		$val = $CurrentForm->hasValue("QuadrupleDATE") ? $CurrentForm->getValue("QuadrupleDATE") : $CurrentForm->getValue("x_QuadrupleDATE");
		if (!$this->QuadrupleDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QuadrupleDATE->Visible = FALSE; // Disable update for API request
			else
				$this->QuadrupleDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_QuadrupleDATE"))
			$this->QuadrupleDATE->setOldValue($CurrentForm->getValue("o_QuadrupleDATE"));

		// Check field name 'QuadrupleINHOUSE' first before field var 'x_QuadrupleINHOUSE'
		$val = $CurrentForm->hasValue("QuadrupleINHOUSE") ? $CurrentForm->getValue("QuadrupleINHOUSE") : $CurrentForm->getValue("x_QuadrupleINHOUSE");
		if (!$this->QuadrupleINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QuadrupleINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->QuadrupleINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_QuadrupleINHOUSE"))
			$this->QuadrupleINHOUSE->setOldValue($CurrentForm->getValue("o_QuadrupleINHOUSE"));

		// Check field name 'QuadrupleREPORT' first before field var 'x_QuadrupleREPORT'
		$val = $CurrentForm->hasValue("QuadrupleREPORT") ? $CurrentForm->getValue("QuadrupleREPORT") : $CurrentForm->getValue("x_QuadrupleREPORT");
		if (!$this->QuadrupleREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QuadrupleREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->QuadrupleREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_QuadrupleREPORT"))
			$this->QuadrupleREPORT->setOldValue($CurrentForm->getValue("o_QuadrupleREPORT"));

		// Check field name 'A5month' first before field var 'x_A5month'
		$val = $CurrentForm->hasValue("A5month") ? $CurrentForm->getValue("A5month") : $CurrentForm->getValue("x_A5month");
		if (!$this->A5month->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A5month->Visible = FALSE; // Disable update for API request
			else
				$this->A5month->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A5month"))
			$this->A5month->setOldValue($CurrentForm->getValue("o_A5month"));

		// Check field name 'A5monthDATE' first before field var 'x_A5monthDATE'
		$val = $CurrentForm->hasValue("A5monthDATE") ? $CurrentForm->getValue("A5monthDATE") : $CurrentForm->getValue("x_A5monthDATE");
		if (!$this->A5monthDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A5monthDATE->Visible = FALSE; // Disable update for API request
			else
				$this->A5monthDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A5monthDATE"))
			$this->A5monthDATE->setOldValue($CurrentForm->getValue("o_A5monthDATE"));

		// Check field name 'A5monthINHOUSE' first before field var 'x_A5monthINHOUSE'
		$val = $CurrentForm->hasValue("A5monthINHOUSE") ? $CurrentForm->getValue("A5monthINHOUSE") : $CurrentForm->getValue("x_A5monthINHOUSE");
		if (!$this->A5monthINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A5monthINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->A5monthINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A5monthINHOUSE"))
			$this->A5monthINHOUSE->setOldValue($CurrentForm->getValue("o_A5monthINHOUSE"));

		// Check field name 'A5monthREPORT' first before field var 'x_A5monthREPORT'
		$val = $CurrentForm->hasValue("A5monthREPORT") ? $CurrentForm->getValue("A5monthREPORT") : $CurrentForm->getValue("x_A5monthREPORT");
		if (!$this->A5monthREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A5monthREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->A5monthREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A5monthREPORT"))
			$this->A5monthREPORT->setOldValue($CurrentForm->getValue("o_A5monthREPORT"));

		// Check field name 'A7month' first before field var 'x_A7month'
		$val = $CurrentForm->hasValue("A7month") ? $CurrentForm->getValue("A7month") : $CurrentForm->getValue("x_A7month");
		if (!$this->A7month->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A7month->Visible = FALSE; // Disable update for API request
			else
				$this->A7month->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A7month"))
			$this->A7month->setOldValue($CurrentForm->getValue("o_A7month"));

		// Check field name 'A7monthDATE' first before field var 'x_A7monthDATE'
		$val = $CurrentForm->hasValue("A7monthDATE") ? $CurrentForm->getValue("A7monthDATE") : $CurrentForm->getValue("x_A7monthDATE");
		if (!$this->A7monthDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A7monthDATE->Visible = FALSE; // Disable update for API request
			else
				$this->A7monthDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A7monthDATE"))
			$this->A7monthDATE->setOldValue($CurrentForm->getValue("o_A7monthDATE"));

		// Check field name 'A7monthINHOUSE' first before field var 'x_A7monthINHOUSE'
		$val = $CurrentForm->hasValue("A7monthINHOUSE") ? $CurrentForm->getValue("A7monthINHOUSE") : $CurrentForm->getValue("x_A7monthINHOUSE");
		if (!$this->A7monthINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A7monthINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->A7monthINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A7monthINHOUSE"))
			$this->A7monthINHOUSE->setOldValue($CurrentForm->getValue("o_A7monthINHOUSE"));

		// Check field name 'A7monthREPORT' first before field var 'x_A7monthREPORT'
		$val = $CurrentForm->hasValue("A7monthREPORT") ? $CurrentForm->getValue("A7monthREPORT") : $CurrentForm->getValue("x_A7monthREPORT");
		if (!$this->A7monthREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A7monthREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->A7monthREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A7monthREPORT"))
			$this->A7monthREPORT->setOldValue($CurrentForm->getValue("o_A7monthREPORT"));

		// Check field name 'A9month' first before field var 'x_A9month'
		$val = $CurrentForm->hasValue("A9month") ? $CurrentForm->getValue("A9month") : $CurrentForm->getValue("x_A9month");
		if (!$this->A9month->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A9month->Visible = FALSE; // Disable update for API request
			else
				$this->A9month->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A9month"))
			$this->A9month->setOldValue($CurrentForm->getValue("o_A9month"));

		// Check field name 'A9monthDATE' first before field var 'x_A9monthDATE'
		$val = $CurrentForm->hasValue("A9monthDATE") ? $CurrentForm->getValue("A9monthDATE") : $CurrentForm->getValue("x_A9monthDATE");
		if (!$this->A9monthDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A9monthDATE->Visible = FALSE; // Disable update for API request
			else
				$this->A9monthDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A9monthDATE"))
			$this->A9monthDATE->setOldValue($CurrentForm->getValue("o_A9monthDATE"));

		// Check field name 'A9monthINHOUSE' first before field var 'x_A9monthINHOUSE'
		$val = $CurrentForm->hasValue("A9monthINHOUSE") ? $CurrentForm->getValue("A9monthINHOUSE") : $CurrentForm->getValue("x_A9monthINHOUSE");
		if (!$this->A9monthINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A9monthINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->A9monthINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A9monthINHOUSE"))
			$this->A9monthINHOUSE->setOldValue($CurrentForm->getValue("o_A9monthINHOUSE"));

		// Check field name 'A9monthREPORT' first before field var 'x_A9monthREPORT'
		$val = $CurrentForm->hasValue("A9monthREPORT") ? $CurrentForm->getValue("A9monthREPORT") : $CurrentForm->getValue("x_A9monthREPORT");
		if (!$this->A9monthREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A9monthREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->A9monthREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_A9monthREPORT"))
			$this->A9monthREPORT->setOldValue($CurrentForm->getValue("o_A9monthREPORT"));

		// Check field name 'INJ' first before field var 'x_INJ'
		$val = $CurrentForm->hasValue("INJ") ? $CurrentForm->getValue("INJ") : $CurrentForm->getValue("x_INJ");
		if (!$this->INJ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INJ->Visible = FALSE; // Disable update for API request
			else
				$this->INJ->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_INJ"))
			$this->INJ->setOldValue($CurrentForm->getValue("o_INJ"));

		// Check field name 'INJDATE' first before field var 'x_INJDATE'
		$val = $CurrentForm->hasValue("INJDATE") ? $CurrentForm->getValue("INJDATE") : $CurrentForm->getValue("x_INJDATE");
		if (!$this->INJDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INJDATE->Visible = FALSE; // Disable update for API request
			else
				$this->INJDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_INJDATE"))
			$this->INJDATE->setOldValue($CurrentForm->getValue("o_INJDATE"));

		// Check field name 'INJINHOUSE' first before field var 'x_INJINHOUSE'
		$val = $CurrentForm->hasValue("INJINHOUSE") ? $CurrentForm->getValue("INJINHOUSE") : $CurrentForm->getValue("x_INJINHOUSE");
		if (!$this->INJINHOUSE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INJINHOUSE->Visible = FALSE; // Disable update for API request
			else
				$this->INJINHOUSE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_INJINHOUSE"))
			$this->INJINHOUSE->setOldValue($CurrentForm->getValue("o_INJINHOUSE"));

		// Check field name 'INJREPORT' first before field var 'x_INJREPORT'
		$val = $CurrentForm->hasValue("INJREPORT") ? $CurrentForm->getValue("INJREPORT") : $CurrentForm->getValue("x_INJREPORT");
		if (!$this->INJREPORT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INJREPORT->Visible = FALSE; // Disable update for API request
			else
				$this->INJREPORT->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_INJREPORT"))
			$this->INJREPORT->setOldValue($CurrentForm->getValue("o_INJREPORT"));

		// Check field name 'Bleeding' first before field var 'x_Bleeding'
		$val = $CurrentForm->hasValue("Bleeding") ? $CurrentForm->getValue("Bleeding") : $CurrentForm->getValue("x_Bleeding");
		if (!$this->Bleeding->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Bleeding->Visible = FALSE; // Disable update for API request
			else
				$this->Bleeding->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Bleeding"))
			$this->Bleeding->setOldValue($CurrentForm->getValue("o_Bleeding"));

		// Check field name 'Hypothyroidism' first before field var 'x_Hypothyroidism'
		$val = $CurrentForm->hasValue("Hypothyroidism") ? $CurrentForm->getValue("Hypothyroidism") : $CurrentForm->getValue("x_Hypothyroidism");
		if (!$this->Hypothyroidism->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Hypothyroidism->Visible = FALSE; // Disable update for API request
			else
				$this->Hypothyroidism->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Hypothyroidism"))
			$this->Hypothyroidism->setOldValue($CurrentForm->getValue("o_Hypothyroidism"));

		// Check field name 'PICMENumber' first before field var 'x_PICMENumber'
		$val = $CurrentForm->hasValue("PICMENumber") ? $CurrentForm->getValue("PICMENumber") : $CurrentForm->getValue("x_PICMENumber");
		if (!$this->PICMENumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PICMENumber->Visible = FALSE; // Disable update for API request
			else
				$this->PICMENumber->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PICMENumber"))
			$this->PICMENumber->setOldValue($CurrentForm->getValue("o_PICMENumber"));

		// Check field name 'Outcome' first before field var 'x_Outcome'
		$val = $CurrentForm->hasValue("Outcome") ? $CurrentForm->getValue("Outcome") : $CurrentForm->getValue("x_Outcome");
		if (!$this->Outcome->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Outcome->Visible = FALSE; // Disable update for API request
			else
				$this->Outcome->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Outcome"))
			$this->Outcome->setOldValue($CurrentForm->getValue("o_Outcome"));

		// Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
		$val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
		if (!$this->DateofAdmission->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateofAdmission->Visible = FALSE; // Disable update for API request
			else
				$this->DateofAdmission->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DateofAdmission"))
			$this->DateofAdmission->setOldValue($CurrentForm->getValue("o_DateofAdmission"));

		// Check field name 'DateodProcedure' first before field var 'x_DateodProcedure'
		$val = $CurrentForm->hasValue("DateodProcedure") ? $CurrentForm->getValue("DateodProcedure") : $CurrentForm->getValue("x_DateodProcedure");
		if (!$this->DateodProcedure->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateodProcedure->Visible = FALSE; // Disable update for API request
			else
				$this->DateodProcedure->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DateodProcedure"))
			$this->DateodProcedure->setOldValue($CurrentForm->getValue("o_DateodProcedure"));

		// Check field name 'Miscarriage' first before field var 'x_Miscarriage'
		$val = $CurrentForm->hasValue("Miscarriage") ? $CurrentForm->getValue("Miscarriage") : $CurrentForm->getValue("x_Miscarriage");
		if (!$this->Miscarriage->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Miscarriage->Visible = FALSE; // Disable update for API request
			else
				$this->Miscarriage->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Miscarriage"))
			$this->Miscarriage->setOldValue($CurrentForm->getValue("o_Miscarriage"));

		// Check field name 'ModeOfDelivery' first before field var 'x_ModeOfDelivery'
		$val = $CurrentForm->hasValue("ModeOfDelivery") ? $CurrentForm->getValue("ModeOfDelivery") : $CurrentForm->getValue("x_ModeOfDelivery");
		if (!$this->ModeOfDelivery->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModeOfDelivery->Visible = FALSE; // Disable update for API request
			else
				$this->ModeOfDelivery->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ModeOfDelivery"))
			$this->ModeOfDelivery->setOldValue($CurrentForm->getValue("o_ModeOfDelivery"));

		// Check field name 'ND' first before field var 'x_ND'
		$val = $CurrentForm->hasValue("ND") ? $CurrentForm->getValue("ND") : $CurrentForm->getValue("x_ND");
		if (!$this->ND->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ND->Visible = FALSE; // Disable update for API request
			else
				$this->ND->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ND"))
			$this->ND->setOldValue($CurrentForm->getValue("o_ND"));

		// Check field name 'NDS' first before field var 'x_NDS'
		$val = $CurrentForm->hasValue("NDS") ? $CurrentForm->getValue("NDS") : $CurrentForm->getValue("x_NDS");
		if (!$this->NDS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NDS->Visible = FALSE; // Disable update for API request
			else
				$this->NDS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NDS"))
			$this->NDS->setOldValue($CurrentForm->getValue("o_NDS"));

		// Check field name 'NDP' first before field var 'x_NDP'
		$val = $CurrentForm->hasValue("NDP") ? $CurrentForm->getValue("NDP") : $CurrentForm->getValue("x_NDP");
		if (!$this->NDP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NDP->Visible = FALSE; // Disable update for API request
			else
				$this->NDP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NDP"))
			$this->NDP->setOldValue($CurrentForm->getValue("o_NDP"));

		// Check field name 'Vaccum' first before field var 'x_Vaccum'
		$val = $CurrentForm->hasValue("Vaccum") ? $CurrentForm->getValue("Vaccum") : $CurrentForm->getValue("x_Vaccum");
		if (!$this->Vaccum->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Vaccum->Visible = FALSE; // Disable update for API request
			else
				$this->Vaccum->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Vaccum"))
			$this->Vaccum->setOldValue($CurrentForm->getValue("o_Vaccum"));

		// Check field name 'VaccumS' first before field var 'x_VaccumS'
		$val = $CurrentForm->hasValue("VaccumS") ? $CurrentForm->getValue("VaccumS") : $CurrentForm->getValue("x_VaccumS");
		if (!$this->VaccumS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->VaccumS->Visible = FALSE; // Disable update for API request
			else
				$this->VaccumS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_VaccumS"))
			$this->VaccumS->setOldValue($CurrentForm->getValue("o_VaccumS"));

		// Check field name 'VaccumP' first before field var 'x_VaccumP'
		$val = $CurrentForm->hasValue("VaccumP") ? $CurrentForm->getValue("VaccumP") : $CurrentForm->getValue("x_VaccumP");
		if (!$this->VaccumP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->VaccumP->Visible = FALSE; // Disable update for API request
			else
				$this->VaccumP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_VaccumP"))
			$this->VaccumP->setOldValue($CurrentForm->getValue("o_VaccumP"));

		// Check field name 'Forceps' first before field var 'x_Forceps'
		$val = $CurrentForm->hasValue("Forceps") ? $CurrentForm->getValue("Forceps") : $CurrentForm->getValue("x_Forceps");
		if (!$this->Forceps->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Forceps->Visible = FALSE; // Disable update for API request
			else
				$this->Forceps->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Forceps"))
			$this->Forceps->setOldValue($CurrentForm->getValue("o_Forceps"));

		// Check field name 'ForcepsS' first before field var 'x_ForcepsS'
		$val = $CurrentForm->hasValue("ForcepsS") ? $CurrentForm->getValue("ForcepsS") : $CurrentForm->getValue("x_ForcepsS");
		if (!$this->ForcepsS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ForcepsS->Visible = FALSE; // Disable update for API request
			else
				$this->ForcepsS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ForcepsS"))
			$this->ForcepsS->setOldValue($CurrentForm->getValue("o_ForcepsS"));

		// Check field name 'ForcepsP' first before field var 'x_ForcepsP'
		$val = $CurrentForm->hasValue("ForcepsP") ? $CurrentForm->getValue("ForcepsP") : $CurrentForm->getValue("x_ForcepsP");
		if (!$this->ForcepsP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ForcepsP->Visible = FALSE; // Disable update for API request
			else
				$this->ForcepsP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ForcepsP"))
			$this->ForcepsP->setOldValue($CurrentForm->getValue("o_ForcepsP"));

		// Check field name 'Elective' first before field var 'x_Elective'
		$val = $CurrentForm->hasValue("Elective") ? $CurrentForm->getValue("Elective") : $CurrentForm->getValue("x_Elective");
		if (!$this->Elective->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Elective->Visible = FALSE; // Disable update for API request
			else
				$this->Elective->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Elective"))
			$this->Elective->setOldValue($CurrentForm->getValue("o_Elective"));

		// Check field name 'ElectiveS' first before field var 'x_ElectiveS'
		$val = $CurrentForm->hasValue("ElectiveS") ? $CurrentForm->getValue("ElectiveS") : $CurrentForm->getValue("x_ElectiveS");
		if (!$this->ElectiveS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ElectiveS->Visible = FALSE; // Disable update for API request
			else
				$this->ElectiveS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ElectiveS"))
			$this->ElectiveS->setOldValue($CurrentForm->getValue("o_ElectiveS"));

		// Check field name 'ElectiveP' first before field var 'x_ElectiveP'
		$val = $CurrentForm->hasValue("ElectiveP") ? $CurrentForm->getValue("ElectiveP") : $CurrentForm->getValue("x_ElectiveP");
		if (!$this->ElectiveP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ElectiveP->Visible = FALSE; // Disable update for API request
			else
				$this->ElectiveP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ElectiveP"))
			$this->ElectiveP->setOldValue($CurrentForm->getValue("o_ElectiveP"));

		// Check field name 'Emergency' first before field var 'x_Emergency'
		$val = $CurrentForm->hasValue("Emergency") ? $CurrentForm->getValue("Emergency") : $CurrentForm->getValue("x_Emergency");
		if (!$this->Emergency->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Emergency->Visible = FALSE; // Disable update for API request
			else
				$this->Emergency->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Emergency"))
			$this->Emergency->setOldValue($CurrentForm->getValue("o_Emergency"));

		// Check field name 'EmergencyS' first before field var 'x_EmergencyS'
		$val = $CurrentForm->hasValue("EmergencyS") ? $CurrentForm->getValue("EmergencyS") : $CurrentForm->getValue("x_EmergencyS");
		if (!$this->EmergencyS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EmergencyS->Visible = FALSE; // Disable update for API request
			else
				$this->EmergencyS->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EmergencyS"))
			$this->EmergencyS->setOldValue($CurrentForm->getValue("o_EmergencyS"));

		// Check field name 'EmergencyP' first before field var 'x_EmergencyP'
		$val = $CurrentForm->hasValue("EmergencyP") ? $CurrentForm->getValue("EmergencyP") : $CurrentForm->getValue("x_EmergencyP");
		if (!$this->EmergencyP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EmergencyP->Visible = FALSE; // Disable update for API request
			else
				$this->EmergencyP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EmergencyP"))
			$this->EmergencyP->setOldValue($CurrentForm->getValue("o_EmergencyP"));

		// Check field name 'Maturity' first before field var 'x_Maturity'
		$val = $CurrentForm->hasValue("Maturity") ? $CurrentForm->getValue("Maturity") : $CurrentForm->getValue("x_Maturity");
		if (!$this->Maturity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Maturity->Visible = FALSE; // Disable update for API request
			else
				$this->Maturity->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Maturity"))
			$this->Maturity->setOldValue($CurrentForm->getValue("o_Maturity"));

		// Check field name 'Baby1' first before field var 'x_Baby1'
		$val = $CurrentForm->hasValue("Baby1") ? $CurrentForm->getValue("Baby1") : $CurrentForm->getValue("x_Baby1");
		if (!$this->Baby1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Baby1->Visible = FALSE; // Disable update for API request
			else
				$this->Baby1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Baby1"))
			$this->Baby1->setOldValue($CurrentForm->getValue("o_Baby1"));

		// Check field name 'Baby2' first before field var 'x_Baby2'
		$val = $CurrentForm->hasValue("Baby2") ? $CurrentForm->getValue("Baby2") : $CurrentForm->getValue("x_Baby2");
		if (!$this->Baby2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Baby2->Visible = FALSE; // Disable update for API request
			else
				$this->Baby2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Baby2"))
			$this->Baby2->setOldValue($CurrentForm->getValue("o_Baby2"));

		// Check field name 'sex1' first before field var 'x_sex1'
		$val = $CurrentForm->hasValue("sex1") ? $CurrentForm->getValue("sex1") : $CurrentForm->getValue("x_sex1");
		if (!$this->sex1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sex1->Visible = FALSE; // Disable update for API request
			else
				$this->sex1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sex1"))
			$this->sex1->setOldValue($CurrentForm->getValue("o_sex1"));

		// Check field name 'sex2' first before field var 'x_sex2'
		$val = $CurrentForm->hasValue("sex2") ? $CurrentForm->getValue("sex2") : $CurrentForm->getValue("x_sex2");
		if (!$this->sex2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sex2->Visible = FALSE; // Disable update for API request
			else
				$this->sex2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sex2"))
			$this->sex2->setOldValue($CurrentForm->getValue("o_sex2"));

		// Check field name 'weight1' first before field var 'x_weight1'
		$val = $CurrentForm->hasValue("weight1") ? $CurrentForm->getValue("weight1") : $CurrentForm->getValue("x_weight1");
		if (!$this->weight1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->weight1->Visible = FALSE; // Disable update for API request
			else
				$this->weight1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_weight1"))
			$this->weight1->setOldValue($CurrentForm->getValue("o_weight1"));

		// Check field name 'weight2' first before field var 'x_weight2'
		$val = $CurrentForm->hasValue("weight2") ? $CurrentForm->getValue("weight2") : $CurrentForm->getValue("x_weight2");
		if (!$this->weight2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->weight2->Visible = FALSE; // Disable update for API request
			else
				$this->weight2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_weight2"))
			$this->weight2->setOldValue($CurrentForm->getValue("o_weight2"));

		// Check field name 'NICU1' first before field var 'x_NICU1'
		$val = $CurrentForm->hasValue("NICU1") ? $CurrentForm->getValue("NICU1") : $CurrentForm->getValue("x_NICU1");
		if (!$this->NICU1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NICU1->Visible = FALSE; // Disable update for API request
			else
				$this->NICU1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NICU1"))
			$this->NICU1->setOldValue($CurrentForm->getValue("o_NICU1"));

		// Check field name 'NICU2' first before field var 'x_NICU2'
		$val = $CurrentForm->hasValue("NICU2") ? $CurrentForm->getValue("NICU2") : $CurrentForm->getValue("x_NICU2");
		if (!$this->NICU2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NICU2->Visible = FALSE; // Disable update for API request
			else
				$this->NICU2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NICU2"))
			$this->NICU2->setOldValue($CurrentForm->getValue("o_NICU2"));

		// Check field name 'Jaundice1' first before field var 'x_Jaundice1'
		$val = $CurrentForm->hasValue("Jaundice1") ? $CurrentForm->getValue("Jaundice1") : $CurrentForm->getValue("x_Jaundice1");
		if (!$this->Jaundice1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Jaundice1->Visible = FALSE; // Disable update for API request
			else
				$this->Jaundice1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Jaundice1"))
			$this->Jaundice1->setOldValue($CurrentForm->getValue("o_Jaundice1"));

		// Check field name 'Jaundice2' first before field var 'x_Jaundice2'
		$val = $CurrentForm->hasValue("Jaundice2") ? $CurrentForm->getValue("Jaundice2") : $CurrentForm->getValue("x_Jaundice2");
		if (!$this->Jaundice2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Jaundice2->Visible = FALSE; // Disable update for API request
			else
				$this->Jaundice2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Jaundice2"))
			$this->Jaundice2->setOldValue($CurrentForm->getValue("o_Jaundice2"));

		// Check field name 'Others1' first before field var 'x_Others1'
		$val = $CurrentForm->hasValue("Others1") ? $CurrentForm->getValue("Others1") : $CurrentForm->getValue("x_Others1");
		if (!$this->Others1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Others1->Visible = FALSE; // Disable update for API request
			else
				$this->Others1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Others1"))
			$this->Others1->setOldValue($CurrentForm->getValue("o_Others1"));

		// Check field name 'Others2' first before field var 'x_Others2'
		$val = $CurrentForm->hasValue("Others2") ? $CurrentForm->getValue("Others2") : $CurrentForm->getValue("x_Others2");
		if (!$this->Others2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Others2->Visible = FALSE; // Disable update for API request
			else
				$this->Others2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Others2"))
			$this->Others2->setOldValue($CurrentForm->getValue("o_Others2"));

		// Check field name 'SpillOverReasons' first before field var 'x_SpillOverReasons'
		$val = $CurrentForm->hasValue("SpillOverReasons") ? $CurrentForm->getValue("SpillOverReasons") : $CurrentForm->getValue("x_SpillOverReasons");
		if (!$this->SpillOverReasons->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SpillOverReasons->Visible = FALSE; // Disable update for API request
			else
				$this->SpillOverReasons->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SpillOverReasons"))
			$this->SpillOverReasons->setOldValue($CurrentForm->getValue("o_SpillOverReasons"));

		// Check field name 'ANClosed' first before field var 'x_ANClosed'
		$val = $CurrentForm->hasValue("ANClosed") ? $CurrentForm->getValue("ANClosed") : $CurrentForm->getValue("x_ANClosed");
		if (!$this->ANClosed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANClosed->Visible = FALSE; // Disable update for API request
			else
				$this->ANClosed->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANClosed"))
			$this->ANClosed->setOldValue($CurrentForm->getValue("o_ANClosed"));

		// Check field name 'ANClosedDATE' first before field var 'x_ANClosedDATE'
		$val = $CurrentForm->hasValue("ANClosedDATE") ? $CurrentForm->getValue("ANClosedDATE") : $CurrentForm->getValue("x_ANClosedDATE");
		if (!$this->ANClosedDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ANClosedDATE->Visible = FALSE; // Disable update for API request
			else
				$this->ANClosedDATE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ANClosedDATE"))
			$this->ANClosedDATE->setOldValue($CurrentForm->getValue("o_ANClosedDATE"));

		// Check field name 'PastMedicalHistoryOthers' first before field var 'x_PastMedicalHistoryOthers'
		$val = $CurrentForm->hasValue("PastMedicalHistoryOthers") ? $CurrentForm->getValue("PastMedicalHistoryOthers") : $CurrentForm->getValue("x_PastMedicalHistoryOthers");
		if (!$this->PastMedicalHistoryOthers->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PastMedicalHistoryOthers->Visible = FALSE; // Disable update for API request
			else
				$this->PastMedicalHistoryOthers->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PastMedicalHistoryOthers"))
			$this->PastMedicalHistoryOthers->setOldValue($CurrentForm->getValue("o_PastMedicalHistoryOthers"));

		// Check field name 'PastSurgicalHistoryOthers' first before field var 'x_PastSurgicalHistoryOthers'
		$val = $CurrentForm->hasValue("PastSurgicalHistoryOthers") ? $CurrentForm->getValue("PastSurgicalHistoryOthers") : $CurrentForm->getValue("x_PastSurgicalHistoryOthers");
		if (!$this->PastSurgicalHistoryOthers->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PastSurgicalHistoryOthers->Visible = FALSE; // Disable update for API request
			else
				$this->PastSurgicalHistoryOthers->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PastSurgicalHistoryOthers"))
			$this->PastSurgicalHistoryOthers->setOldValue($CurrentForm->getValue("o_PastSurgicalHistoryOthers"));

		// Check field name 'FamilyHistoryOthers' first before field var 'x_FamilyHistoryOthers'
		$val = $CurrentForm->hasValue("FamilyHistoryOthers") ? $CurrentForm->getValue("FamilyHistoryOthers") : $CurrentForm->getValue("x_FamilyHistoryOthers");
		if (!$this->FamilyHistoryOthers->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FamilyHistoryOthers->Visible = FALSE; // Disable update for API request
			else
				$this->FamilyHistoryOthers->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_FamilyHistoryOthers"))
			$this->FamilyHistoryOthers->setOldValue($CurrentForm->getValue("o_FamilyHistoryOthers"));

		// Check field name 'PresentPregnancyComplicationsOthers' first before field var 'x_PresentPregnancyComplicationsOthers'
		$val = $CurrentForm->hasValue("PresentPregnancyComplicationsOthers") ? $CurrentForm->getValue("PresentPregnancyComplicationsOthers") : $CurrentForm->getValue("x_PresentPregnancyComplicationsOthers");
		if (!$this->PresentPregnancyComplicationsOthers->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PresentPregnancyComplicationsOthers->Visible = FALSE; // Disable update for API request
			else
				$this->PresentPregnancyComplicationsOthers->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PresentPregnancyComplicationsOthers"))
			$this->PresentPregnancyComplicationsOthers->setOldValue($CurrentForm->getValue("o_PresentPregnancyComplicationsOthers"));

		// Check field name 'ETdate' first before field var 'x_ETdate'
		$val = $CurrentForm->hasValue("ETdate") ? $CurrentForm->getValue("ETdate") : $CurrentForm->getValue("x_ETdate");
		if (!$this->ETdate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ETdate->Visible = FALSE; // Disable update for API request
			else
				$this->ETdate->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ETdate"))
			$this->ETdate->setOldValue($CurrentForm->getValue("o_ETdate"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->pid->CurrentValue = $this->pid->FormValue;
		$this->fid->CurrentValue = $this->fid->FormValue;
		$this->G->CurrentValue = $this->G->FormValue;
		$this->P->CurrentValue = $this->P->FormValue;
		$this->L->CurrentValue = $this->L->FormValue;
		$this->A->CurrentValue = $this->A->FormValue;
		$this->E->CurrentValue = $this->E->FormValue;
		$this->M->CurrentValue = $this->M->FormValue;
		$this->LMP->CurrentValue = $this->LMP->FormValue;
		$this->EDO->CurrentValue = $this->EDO->FormValue;
		$this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
		$this->MaritalHistory->CurrentValue = $this->MaritalHistory->FormValue;
		$this->ObstetricHistory->CurrentValue = $this->ObstetricHistory->FormValue;
		$this->PreviousHistoryofGDM->CurrentValue = $this->PreviousHistoryofGDM->FormValue;
		$this->PreviousHistorofPIH->CurrentValue = $this->PreviousHistorofPIH->FormValue;
		$this->PreviousHistoryofIUGR->CurrentValue = $this->PreviousHistoryofIUGR->FormValue;
		$this->PreviousHistoryofOligohydramnios->CurrentValue = $this->PreviousHistoryofOligohydramnios->FormValue;
		$this->PreviousHistoryofPreterm->CurrentValue = $this->PreviousHistoryofPreterm->FormValue;
		$this->G1->CurrentValue = $this->G1->FormValue;
		$this->G2->CurrentValue = $this->G2->FormValue;
		$this->G3->CurrentValue = $this->G3->FormValue;
		$this->DeliveryNDLSCS1->CurrentValue = $this->DeliveryNDLSCS1->FormValue;
		$this->DeliveryNDLSCS2->CurrentValue = $this->DeliveryNDLSCS2->FormValue;
		$this->DeliveryNDLSCS3->CurrentValue = $this->DeliveryNDLSCS3->FormValue;
		$this->BabySexweight1->CurrentValue = $this->BabySexweight1->FormValue;
		$this->BabySexweight2->CurrentValue = $this->BabySexweight2->FormValue;
		$this->BabySexweight3->CurrentValue = $this->BabySexweight3->FormValue;
		$this->PastMedicalHistory->CurrentValue = $this->PastMedicalHistory->FormValue;
		$this->PastSurgicalHistory->CurrentValue = $this->PastSurgicalHistory->FormValue;
		$this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
		$this->Viability->CurrentValue = $this->Viability->FormValue;
		$this->ViabilityDATE->CurrentValue = $this->ViabilityDATE->FormValue;
		$this->ViabilityREPORT->CurrentValue = $this->ViabilityREPORT->FormValue;
		$this->Viability2->CurrentValue = $this->Viability2->FormValue;
		$this->Viability2DATE->CurrentValue = $this->Viability2DATE->FormValue;
		$this->Viability2REPORT->CurrentValue = $this->Viability2REPORT->FormValue;
		$this->NTscan->CurrentValue = $this->NTscan->FormValue;
		$this->NTscanDATE->CurrentValue = $this->NTscanDATE->FormValue;
		$this->NTscanREPORT->CurrentValue = $this->NTscanREPORT->FormValue;
		$this->EarlyTarget->CurrentValue = $this->EarlyTarget->FormValue;
		$this->EarlyTargetDATE->CurrentValue = $this->EarlyTargetDATE->FormValue;
		$this->EarlyTargetREPORT->CurrentValue = $this->EarlyTargetREPORT->FormValue;
		$this->Anomaly->CurrentValue = $this->Anomaly->FormValue;
		$this->AnomalyDATE->CurrentValue = $this->AnomalyDATE->FormValue;
		$this->AnomalyREPORT->CurrentValue = $this->AnomalyREPORT->FormValue;
		$this->Growth->CurrentValue = $this->Growth->FormValue;
		$this->GrowthDATE->CurrentValue = $this->GrowthDATE->FormValue;
		$this->GrowthREPORT->CurrentValue = $this->GrowthREPORT->FormValue;
		$this->Growth1->CurrentValue = $this->Growth1->FormValue;
		$this->Growth1DATE->CurrentValue = $this->Growth1DATE->FormValue;
		$this->Growth1REPORT->CurrentValue = $this->Growth1REPORT->FormValue;
		$this->ANProfile->CurrentValue = $this->ANProfile->FormValue;
		$this->ANProfileDATE->CurrentValue = $this->ANProfileDATE->FormValue;
		$this->ANProfileINHOUSE->CurrentValue = $this->ANProfileINHOUSE->FormValue;
		$this->ANProfileREPORT->CurrentValue = $this->ANProfileREPORT->FormValue;
		$this->DualMarker->CurrentValue = $this->DualMarker->FormValue;
		$this->DualMarkerDATE->CurrentValue = $this->DualMarkerDATE->FormValue;
		$this->DualMarkerINHOUSE->CurrentValue = $this->DualMarkerINHOUSE->FormValue;
		$this->DualMarkerREPORT->CurrentValue = $this->DualMarkerREPORT->FormValue;
		$this->Quadruple->CurrentValue = $this->Quadruple->FormValue;
		$this->QuadrupleDATE->CurrentValue = $this->QuadrupleDATE->FormValue;
		$this->QuadrupleINHOUSE->CurrentValue = $this->QuadrupleINHOUSE->FormValue;
		$this->QuadrupleREPORT->CurrentValue = $this->QuadrupleREPORT->FormValue;
		$this->A5month->CurrentValue = $this->A5month->FormValue;
		$this->A5monthDATE->CurrentValue = $this->A5monthDATE->FormValue;
		$this->A5monthINHOUSE->CurrentValue = $this->A5monthINHOUSE->FormValue;
		$this->A5monthREPORT->CurrentValue = $this->A5monthREPORT->FormValue;
		$this->A7month->CurrentValue = $this->A7month->FormValue;
		$this->A7monthDATE->CurrentValue = $this->A7monthDATE->FormValue;
		$this->A7monthINHOUSE->CurrentValue = $this->A7monthINHOUSE->FormValue;
		$this->A7monthREPORT->CurrentValue = $this->A7monthREPORT->FormValue;
		$this->A9month->CurrentValue = $this->A9month->FormValue;
		$this->A9monthDATE->CurrentValue = $this->A9monthDATE->FormValue;
		$this->A9monthINHOUSE->CurrentValue = $this->A9monthINHOUSE->FormValue;
		$this->A9monthREPORT->CurrentValue = $this->A9monthREPORT->FormValue;
		$this->INJ->CurrentValue = $this->INJ->FormValue;
		$this->INJDATE->CurrentValue = $this->INJDATE->FormValue;
		$this->INJINHOUSE->CurrentValue = $this->INJINHOUSE->FormValue;
		$this->INJREPORT->CurrentValue = $this->INJREPORT->FormValue;
		$this->Bleeding->CurrentValue = $this->Bleeding->FormValue;
		$this->Hypothyroidism->CurrentValue = $this->Hypothyroidism->FormValue;
		$this->PICMENumber->CurrentValue = $this->PICMENumber->FormValue;
		$this->Outcome->CurrentValue = $this->Outcome->FormValue;
		$this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
		$this->DateodProcedure->CurrentValue = $this->DateodProcedure->FormValue;
		$this->Miscarriage->CurrentValue = $this->Miscarriage->FormValue;
		$this->ModeOfDelivery->CurrentValue = $this->ModeOfDelivery->FormValue;
		$this->ND->CurrentValue = $this->ND->FormValue;
		$this->NDS->CurrentValue = $this->NDS->FormValue;
		$this->NDP->CurrentValue = $this->NDP->FormValue;
		$this->Vaccum->CurrentValue = $this->Vaccum->FormValue;
		$this->VaccumS->CurrentValue = $this->VaccumS->FormValue;
		$this->VaccumP->CurrentValue = $this->VaccumP->FormValue;
		$this->Forceps->CurrentValue = $this->Forceps->FormValue;
		$this->ForcepsS->CurrentValue = $this->ForcepsS->FormValue;
		$this->ForcepsP->CurrentValue = $this->ForcepsP->FormValue;
		$this->Elective->CurrentValue = $this->Elective->FormValue;
		$this->ElectiveS->CurrentValue = $this->ElectiveS->FormValue;
		$this->ElectiveP->CurrentValue = $this->ElectiveP->FormValue;
		$this->Emergency->CurrentValue = $this->Emergency->FormValue;
		$this->EmergencyS->CurrentValue = $this->EmergencyS->FormValue;
		$this->EmergencyP->CurrentValue = $this->EmergencyP->FormValue;
		$this->Maturity->CurrentValue = $this->Maturity->FormValue;
		$this->Baby1->CurrentValue = $this->Baby1->FormValue;
		$this->Baby2->CurrentValue = $this->Baby2->FormValue;
		$this->sex1->CurrentValue = $this->sex1->FormValue;
		$this->sex2->CurrentValue = $this->sex2->FormValue;
		$this->weight1->CurrentValue = $this->weight1->FormValue;
		$this->weight2->CurrentValue = $this->weight2->FormValue;
		$this->NICU1->CurrentValue = $this->NICU1->FormValue;
		$this->NICU2->CurrentValue = $this->NICU2->FormValue;
		$this->Jaundice1->CurrentValue = $this->Jaundice1->FormValue;
		$this->Jaundice2->CurrentValue = $this->Jaundice2->FormValue;
		$this->Others1->CurrentValue = $this->Others1->FormValue;
		$this->Others2->CurrentValue = $this->Others2->FormValue;
		$this->SpillOverReasons->CurrentValue = $this->SpillOverReasons->FormValue;
		$this->ANClosed->CurrentValue = $this->ANClosed->FormValue;
		$this->ANClosedDATE->CurrentValue = $this->ANClosedDATE->FormValue;
		$this->PastMedicalHistoryOthers->CurrentValue = $this->PastMedicalHistoryOthers->FormValue;
		$this->PastSurgicalHistoryOthers->CurrentValue = $this->PastSurgicalHistoryOthers->FormValue;
		$this->FamilyHistoryOthers->CurrentValue = $this->FamilyHistoryOthers->FormValue;
		$this->PresentPregnancyComplicationsOthers->CurrentValue = $this->PresentPregnancyComplicationsOthers->FormValue;
		$this->ETdate->CurrentValue = $this->ETdate->FormValue;
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
		$this->pid->setDbValue($row['pid']);
		$this->fid->setDbValue($row['fid']);
		$this->G->setDbValue($row['G']);
		$this->P->setDbValue($row['P']);
		$this->L->setDbValue($row['L']);
		$this->A->setDbValue($row['A']);
		$this->E->setDbValue($row['E']);
		$this->M->setDbValue($row['M']);
		$this->LMP->setDbValue($row['LMP']);
		$this->EDO->setDbValue($row['EDO']);
		$this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
		$this->MaritalHistory->setDbValue($row['MaritalHistory']);
		$this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
		$this->PreviousHistoryofGDM->setDbValue($row['PreviousHistoryofGDM']);
		$this->PreviousHistorofPIH->setDbValue($row['PreviousHistorofPIH']);
		$this->PreviousHistoryofIUGR->setDbValue($row['PreviousHistoryofIUGR']);
		$this->PreviousHistoryofOligohydramnios->setDbValue($row['PreviousHistoryofOligohydramnios']);
		$this->PreviousHistoryofPreterm->setDbValue($row['PreviousHistoryofPreterm']);
		$this->G1->setDbValue($row['G1']);
		$this->G2->setDbValue($row['G2']);
		$this->G3->setDbValue($row['G3']);
		$this->DeliveryNDLSCS1->setDbValue($row['DeliveryNDLSCS1']);
		$this->DeliveryNDLSCS2->setDbValue($row['DeliveryNDLSCS2']);
		$this->DeliveryNDLSCS3->setDbValue($row['DeliveryNDLSCS3']);
		$this->BabySexweight1->setDbValue($row['BabySexweight1']);
		$this->BabySexweight2->setDbValue($row['BabySexweight2']);
		$this->BabySexweight3->setDbValue($row['BabySexweight3']);
		$this->PastMedicalHistory->setDbValue($row['PastMedicalHistory']);
		$this->PastSurgicalHistory->setDbValue($row['PastSurgicalHistory']);
		$this->FamilyHistory->setDbValue($row['FamilyHistory']);
		$this->Viability->setDbValue($row['Viability']);
		$this->ViabilityDATE->setDbValue($row['ViabilityDATE']);
		$this->ViabilityREPORT->setDbValue($row['ViabilityREPORT']);
		$this->Viability2->setDbValue($row['Viability2']);
		$this->Viability2DATE->setDbValue($row['Viability2DATE']);
		$this->Viability2REPORT->setDbValue($row['Viability2REPORT']);
		$this->NTscan->setDbValue($row['NTscan']);
		$this->NTscanDATE->setDbValue($row['NTscanDATE']);
		$this->NTscanREPORT->setDbValue($row['NTscanREPORT']);
		$this->EarlyTarget->setDbValue($row['EarlyTarget']);
		$this->EarlyTargetDATE->setDbValue($row['EarlyTargetDATE']);
		$this->EarlyTargetREPORT->setDbValue($row['EarlyTargetREPORT']);
		$this->Anomaly->setDbValue($row['Anomaly']);
		$this->AnomalyDATE->setDbValue($row['AnomalyDATE']);
		$this->AnomalyREPORT->setDbValue($row['AnomalyREPORT']);
		$this->Growth->setDbValue($row['Growth']);
		$this->GrowthDATE->setDbValue($row['GrowthDATE']);
		$this->GrowthREPORT->setDbValue($row['GrowthREPORT']);
		$this->Growth1->setDbValue($row['Growth1']);
		$this->Growth1DATE->setDbValue($row['Growth1DATE']);
		$this->Growth1REPORT->setDbValue($row['Growth1REPORT']);
		$this->ANProfile->setDbValue($row['ANProfile']);
		$this->ANProfileDATE->setDbValue($row['ANProfileDATE']);
		$this->ANProfileINHOUSE->setDbValue($row['ANProfileINHOUSE']);
		$this->ANProfileREPORT->setDbValue($row['ANProfileREPORT']);
		$this->DualMarker->setDbValue($row['DualMarker']);
		$this->DualMarkerDATE->setDbValue($row['DualMarkerDATE']);
		$this->DualMarkerINHOUSE->setDbValue($row['DualMarkerINHOUSE']);
		$this->DualMarkerREPORT->setDbValue($row['DualMarkerREPORT']);
		$this->Quadruple->setDbValue($row['Quadruple']);
		$this->QuadrupleDATE->setDbValue($row['QuadrupleDATE']);
		$this->QuadrupleINHOUSE->setDbValue($row['QuadrupleINHOUSE']);
		$this->QuadrupleREPORT->setDbValue($row['QuadrupleREPORT']);
		$this->A5month->setDbValue($row['A5month']);
		$this->A5monthDATE->setDbValue($row['A5monthDATE']);
		$this->A5monthINHOUSE->setDbValue($row['A5monthINHOUSE']);
		$this->A5monthREPORT->setDbValue($row['A5monthREPORT']);
		$this->A7month->setDbValue($row['A7month']);
		$this->A7monthDATE->setDbValue($row['A7monthDATE']);
		$this->A7monthINHOUSE->setDbValue($row['A7monthINHOUSE']);
		$this->A7monthREPORT->setDbValue($row['A7monthREPORT']);
		$this->A9month->setDbValue($row['A9month']);
		$this->A9monthDATE->setDbValue($row['A9monthDATE']);
		$this->A9monthINHOUSE->setDbValue($row['A9monthINHOUSE']);
		$this->A9monthREPORT->setDbValue($row['A9monthREPORT']);
		$this->INJ->setDbValue($row['INJ']);
		$this->INJDATE->setDbValue($row['INJDATE']);
		$this->INJINHOUSE->setDbValue($row['INJINHOUSE']);
		$this->INJREPORT->setDbValue($row['INJREPORT']);
		$this->Bleeding->setDbValue($row['Bleeding']);
		$this->Hypothyroidism->setDbValue($row['Hypothyroidism']);
		$this->PICMENumber->setDbValue($row['PICMENumber']);
		$this->Outcome->setDbValue($row['Outcome']);
		$this->DateofAdmission->setDbValue($row['DateofAdmission']);
		$this->DateodProcedure->setDbValue($row['DateodProcedure']);
		$this->Miscarriage->setDbValue($row['Miscarriage']);
		$this->ModeOfDelivery->setDbValue($row['ModeOfDelivery']);
		$this->ND->setDbValue($row['ND']);
		$this->NDS->setDbValue($row['NDS']);
		$this->NDP->setDbValue($row['NDP']);
		$this->Vaccum->setDbValue($row['Vaccum']);
		$this->VaccumS->setDbValue($row['VaccumS']);
		$this->VaccumP->setDbValue($row['VaccumP']);
		$this->Forceps->setDbValue($row['Forceps']);
		$this->ForcepsS->setDbValue($row['ForcepsS']);
		$this->ForcepsP->setDbValue($row['ForcepsP']);
		$this->Elective->setDbValue($row['Elective']);
		$this->ElectiveS->setDbValue($row['ElectiveS']);
		$this->ElectiveP->setDbValue($row['ElectiveP']);
		$this->Emergency->setDbValue($row['Emergency']);
		$this->EmergencyS->setDbValue($row['EmergencyS']);
		$this->EmergencyP->setDbValue($row['EmergencyP']);
		$this->Maturity->setDbValue($row['Maturity']);
		$this->Baby1->setDbValue($row['Baby1']);
		$this->Baby2->setDbValue($row['Baby2']);
		$this->sex1->setDbValue($row['sex1']);
		$this->sex2->setDbValue($row['sex2']);
		$this->weight1->setDbValue($row['weight1']);
		$this->weight2->setDbValue($row['weight2']);
		$this->NICU1->setDbValue($row['NICU1']);
		$this->NICU2->setDbValue($row['NICU2']);
		$this->Jaundice1->setDbValue($row['Jaundice1']);
		$this->Jaundice2->setDbValue($row['Jaundice2']);
		$this->Others1->setDbValue($row['Others1']);
		$this->Others2->setDbValue($row['Others2']);
		$this->SpillOverReasons->setDbValue($row['SpillOverReasons']);
		$this->ANClosed->setDbValue($row['ANClosed']);
		$this->ANClosedDATE->setDbValue($row['ANClosedDATE']);
		$this->PastMedicalHistoryOthers->setDbValue($row['PastMedicalHistoryOthers']);
		$this->PastSurgicalHistoryOthers->setDbValue($row['PastSurgicalHistoryOthers']);
		$this->FamilyHistoryOthers->setDbValue($row['FamilyHistoryOthers']);
		$this->PresentPregnancyComplicationsOthers->setDbValue($row['PresentPregnancyComplicationsOthers']);
		$this->ETdate->setDbValue($row['ETdate']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['pid'] = $this->pid->CurrentValue;
		$row['fid'] = $this->fid->CurrentValue;
		$row['G'] = $this->G->CurrentValue;
		$row['P'] = $this->P->CurrentValue;
		$row['L'] = $this->L->CurrentValue;
		$row['A'] = $this->A->CurrentValue;
		$row['E'] = $this->E->CurrentValue;
		$row['M'] = $this->M->CurrentValue;
		$row['LMP'] = $this->LMP->CurrentValue;
		$row['EDO'] = $this->EDO->CurrentValue;
		$row['MenstrualHistory'] = $this->MenstrualHistory->CurrentValue;
		$row['MaritalHistory'] = $this->MaritalHistory->CurrentValue;
		$row['ObstetricHistory'] = $this->ObstetricHistory->CurrentValue;
		$row['PreviousHistoryofGDM'] = $this->PreviousHistoryofGDM->CurrentValue;
		$row['PreviousHistorofPIH'] = $this->PreviousHistorofPIH->CurrentValue;
		$row['PreviousHistoryofIUGR'] = $this->PreviousHistoryofIUGR->CurrentValue;
		$row['PreviousHistoryofOligohydramnios'] = $this->PreviousHistoryofOligohydramnios->CurrentValue;
		$row['PreviousHistoryofPreterm'] = $this->PreviousHistoryofPreterm->CurrentValue;
		$row['G1'] = $this->G1->CurrentValue;
		$row['G2'] = $this->G2->CurrentValue;
		$row['G3'] = $this->G3->CurrentValue;
		$row['DeliveryNDLSCS1'] = $this->DeliveryNDLSCS1->CurrentValue;
		$row['DeliveryNDLSCS2'] = $this->DeliveryNDLSCS2->CurrentValue;
		$row['DeliveryNDLSCS3'] = $this->DeliveryNDLSCS3->CurrentValue;
		$row['BabySexweight1'] = $this->BabySexweight1->CurrentValue;
		$row['BabySexweight2'] = $this->BabySexweight2->CurrentValue;
		$row['BabySexweight3'] = $this->BabySexweight3->CurrentValue;
		$row['PastMedicalHistory'] = $this->PastMedicalHistory->CurrentValue;
		$row['PastSurgicalHistory'] = $this->PastSurgicalHistory->CurrentValue;
		$row['FamilyHistory'] = $this->FamilyHistory->CurrentValue;
		$row['Viability'] = $this->Viability->CurrentValue;
		$row['ViabilityDATE'] = $this->ViabilityDATE->CurrentValue;
		$row['ViabilityREPORT'] = $this->ViabilityREPORT->CurrentValue;
		$row['Viability2'] = $this->Viability2->CurrentValue;
		$row['Viability2DATE'] = $this->Viability2DATE->CurrentValue;
		$row['Viability2REPORT'] = $this->Viability2REPORT->CurrentValue;
		$row['NTscan'] = $this->NTscan->CurrentValue;
		$row['NTscanDATE'] = $this->NTscanDATE->CurrentValue;
		$row['NTscanREPORT'] = $this->NTscanREPORT->CurrentValue;
		$row['EarlyTarget'] = $this->EarlyTarget->CurrentValue;
		$row['EarlyTargetDATE'] = $this->EarlyTargetDATE->CurrentValue;
		$row['EarlyTargetREPORT'] = $this->EarlyTargetREPORT->CurrentValue;
		$row['Anomaly'] = $this->Anomaly->CurrentValue;
		$row['AnomalyDATE'] = $this->AnomalyDATE->CurrentValue;
		$row['AnomalyREPORT'] = $this->AnomalyREPORT->CurrentValue;
		$row['Growth'] = $this->Growth->CurrentValue;
		$row['GrowthDATE'] = $this->GrowthDATE->CurrentValue;
		$row['GrowthREPORT'] = $this->GrowthREPORT->CurrentValue;
		$row['Growth1'] = $this->Growth1->CurrentValue;
		$row['Growth1DATE'] = $this->Growth1DATE->CurrentValue;
		$row['Growth1REPORT'] = $this->Growth1REPORT->CurrentValue;
		$row['ANProfile'] = $this->ANProfile->CurrentValue;
		$row['ANProfileDATE'] = $this->ANProfileDATE->CurrentValue;
		$row['ANProfileINHOUSE'] = $this->ANProfileINHOUSE->CurrentValue;
		$row['ANProfileREPORT'] = $this->ANProfileREPORT->CurrentValue;
		$row['DualMarker'] = $this->DualMarker->CurrentValue;
		$row['DualMarkerDATE'] = $this->DualMarkerDATE->CurrentValue;
		$row['DualMarkerINHOUSE'] = $this->DualMarkerINHOUSE->CurrentValue;
		$row['DualMarkerREPORT'] = $this->DualMarkerREPORT->CurrentValue;
		$row['Quadruple'] = $this->Quadruple->CurrentValue;
		$row['QuadrupleDATE'] = $this->QuadrupleDATE->CurrentValue;
		$row['QuadrupleINHOUSE'] = $this->QuadrupleINHOUSE->CurrentValue;
		$row['QuadrupleREPORT'] = $this->QuadrupleREPORT->CurrentValue;
		$row['A5month'] = $this->A5month->CurrentValue;
		$row['A5monthDATE'] = $this->A5monthDATE->CurrentValue;
		$row['A5monthINHOUSE'] = $this->A5monthINHOUSE->CurrentValue;
		$row['A5monthREPORT'] = $this->A5monthREPORT->CurrentValue;
		$row['A7month'] = $this->A7month->CurrentValue;
		$row['A7monthDATE'] = $this->A7monthDATE->CurrentValue;
		$row['A7monthINHOUSE'] = $this->A7monthINHOUSE->CurrentValue;
		$row['A7monthREPORT'] = $this->A7monthREPORT->CurrentValue;
		$row['A9month'] = $this->A9month->CurrentValue;
		$row['A9monthDATE'] = $this->A9monthDATE->CurrentValue;
		$row['A9monthINHOUSE'] = $this->A9monthINHOUSE->CurrentValue;
		$row['A9monthREPORT'] = $this->A9monthREPORT->CurrentValue;
		$row['INJ'] = $this->INJ->CurrentValue;
		$row['INJDATE'] = $this->INJDATE->CurrentValue;
		$row['INJINHOUSE'] = $this->INJINHOUSE->CurrentValue;
		$row['INJREPORT'] = $this->INJREPORT->CurrentValue;
		$row['Bleeding'] = $this->Bleeding->CurrentValue;
		$row['Hypothyroidism'] = $this->Hypothyroidism->CurrentValue;
		$row['PICMENumber'] = $this->PICMENumber->CurrentValue;
		$row['Outcome'] = $this->Outcome->CurrentValue;
		$row['DateofAdmission'] = $this->DateofAdmission->CurrentValue;
		$row['DateodProcedure'] = $this->DateodProcedure->CurrentValue;
		$row['Miscarriage'] = $this->Miscarriage->CurrentValue;
		$row['ModeOfDelivery'] = $this->ModeOfDelivery->CurrentValue;
		$row['ND'] = $this->ND->CurrentValue;
		$row['NDS'] = $this->NDS->CurrentValue;
		$row['NDP'] = $this->NDP->CurrentValue;
		$row['Vaccum'] = $this->Vaccum->CurrentValue;
		$row['VaccumS'] = $this->VaccumS->CurrentValue;
		$row['VaccumP'] = $this->VaccumP->CurrentValue;
		$row['Forceps'] = $this->Forceps->CurrentValue;
		$row['ForcepsS'] = $this->ForcepsS->CurrentValue;
		$row['ForcepsP'] = $this->ForcepsP->CurrentValue;
		$row['Elective'] = $this->Elective->CurrentValue;
		$row['ElectiveS'] = $this->ElectiveS->CurrentValue;
		$row['ElectiveP'] = $this->ElectiveP->CurrentValue;
		$row['Emergency'] = $this->Emergency->CurrentValue;
		$row['EmergencyS'] = $this->EmergencyS->CurrentValue;
		$row['EmergencyP'] = $this->EmergencyP->CurrentValue;
		$row['Maturity'] = $this->Maturity->CurrentValue;
		$row['Baby1'] = $this->Baby1->CurrentValue;
		$row['Baby2'] = $this->Baby2->CurrentValue;
		$row['sex1'] = $this->sex1->CurrentValue;
		$row['sex2'] = $this->sex2->CurrentValue;
		$row['weight1'] = $this->weight1->CurrentValue;
		$row['weight2'] = $this->weight2->CurrentValue;
		$row['NICU1'] = $this->NICU1->CurrentValue;
		$row['NICU2'] = $this->NICU2->CurrentValue;
		$row['Jaundice1'] = $this->Jaundice1->CurrentValue;
		$row['Jaundice2'] = $this->Jaundice2->CurrentValue;
		$row['Others1'] = $this->Others1->CurrentValue;
		$row['Others2'] = $this->Others2->CurrentValue;
		$row['SpillOverReasons'] = $this->SpillOverReasons->CurrentValue;
		$row['ANClosed'] = $this->ANClosed->CurrentValue;
		$row['ANClosedDATE'] = $this->ANClosedDATE->CurrentValue;
		$row['PastMedicalHistoryOthers'] = $this->PastMedicalHistoryOthers->CurrentValue;
		$row['PastSurgicalHistoryOthers'] = $this->PastSurgicalHistoryOthers->CurrentValue;
		$row['FamilyHistoryOthers'] = $this->FamilyHistoryOthers->CurrentValue;
		$row['PresentPregnancyComplicationsOthers'] = $this->PresentPregnancyComplicationsOthers->CurrentValue;
		$row['ETdate'] = $this->ETdate->CurrentValue;
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
		// pid
		// fid
		// G
		// P
		// L
		// A
		// E
		// M
		// LMP
		// EDO
		// MenstrualHistory
		// MaritalHistory
		// ObstetricHistory
		// PreviousHistoryofGDM
		// PreviousHistorofPIH
		// PreviousHistoryofIUGR
		// PreviousHistoryofOligohydramnios
		// PreviousHistoryofPreterm
		// G1
		// G2
		// G3
		// DeliveryNDLSCS1
		// DeliveryNDLSCS2
		// DeliveryNDLSCS3
		// BabySexweight1
		// BabySexweight2
		// BabySexweight3
		// PastMedicalHistory
		// PastSurgicalHistory
		// FamilyHistory
		// Viability
		// ViabilityDATE
		// ViabilityREPORT
		// Viability2
		// Viability2DATE
		// Viability2REPORT
		// NTscan
		// NTscanDATE
		// NTscanREPORT
		// EarlyTarget
		// EarlyTargetDATE
		// EarlyTargetREPORT
		// Anomaly
		// AnomalyDATE
		// AnomalyREPORT
		// Growth
		// GrowthDATE
		// GrowthREPORT
		// Growth1
		// Growth1DATE
		// Growth1REPORT
		// ANProfile
		// ANProfileDATE
		// ANProfileINHOUSE
		// ANProfileREPORT
		// DualMarker
		// DualMarkerDATE
		// DualMarkerINHOUSE
		// DualMarkerREPORT
		// Quadruple
		// QuadrupleDATE
		// QuadrupleINHOUSE
		// QuadrupleREPORT
		// A5month
		// A5monthDATE
		// A5monthINHOUSE
		// A5monthREPORT
		// A7month
		// A7monthDATE
		// A7monthINHOUSE
		// A7monthREPORT
		// A9month
		// A9monthDATE
		// A9monthINHOUSE
		// A9monthREPORT
		// INJ
		// INJDATE
		// INJINHOUSE
		// INJREPORT
		// Bleeding
		// Hypothyroidism
		// PICMENumber
		// Outcome
		// DateofAdmission
		// DateodProcedure
		// Miscarriage
		// ModeOfDelivery
		// ND
		// NDS
		// NDP
		// Vaccum
		// VaccumS
		// VaccumP
		// Forceps
		// ForcepsS
		// ForcepsP
		// Elective
		// ElectiveS
		// ElectiveP
		// Emergency
		// EmergencyS
		// EmergencyP
		// Maturity
		// Baby1
		// Baby2
		// sex1
		// sex2
		// weight1
		// weight2
		// NICU1
		// NICU2
		// Jaundice1
		// Jaundice2
		// Others1
		// Others2
		// SpillOverReasons
		// ANClosed
		// ANClosedDATE
		// PastMedicalHistoryOthers
		// PastSurgicalHistoryOthers
		// FamilyHistoryOthers
		// PresentPregnancyComplicationsOthers
		// ETdate

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->ViewValue = $this->pid->CurrentValue;
			$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
			$this->pid->ViewCustomAttributes = "";

			// fid
			$this->fid->ViewValue = $this->fid->CurrentValue;
			$this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
			$this->fid->ViewCustomAttributes = "";

			// G
			$this->G->ViewValue = $this->G->CurrentValue;
			$this->G->ViewCustomAttributes = "";

			// P
			$this->P->ViewValue = $this->P->CurrentValue;
			$this->P->ViewCustomAttributes = "";

			// L
			$this->L->ViewValue = $this->L->CurrentValue;
			$this->L->ViewCustomAttributes = "";

			// A
			$this->A->ViewValue = $this->A->CurrentValue;
			$this->A->ViewCustomAttributes = "";

			// E
			$this->E->ViewValue = $this->E->CurrentValue;
			$this->E->ViewCustomAttributes = "";

			// M
			$this->M->ViewValue = $this->M->CurrentValue;
			$this->M->ViewCustomAttributes = "";

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewCustomAttributes = "";

			// EDO
			$this->EDO->ViewValue = $this->EDO->CurrentValue;
			$this->EDO->ViewCustomAttributes = "";

			// MenstrualHistory
			if (strval($this->MenstrualHistory->CurrentValue) != "") {
				$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->optionCaption($this->MenstrualHistory->CurrentValue);
			} else {
				$this->MenstrualHistory->ViewValue = NULL;
			}
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// MaritalHistory
			$this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
			$this->MaritalHistory->ViewCustomAttributes = "";

			// ObstetricHistory
			$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
			$this->ObstetricHistory->ViewCustomAttributes = "";

			// PreviousHistoryofGDM
			if (strval($this->PreviousHistoryofGDM->CurrentValue) != "") {
				$this->PreviousHistoryofGDM->ViewValue = $this->PreviousHistoryofGDM->optionCaption($this->PreviousHistoryofGDM->CurrentValue);
			} else {
				$this->PreviousHistoryofGDM->ViewValue = NULL;
			}
			$this->PreviousHistoryofGDM->ViewCustomAttributes = "";

			// PreviousHistorofPIH
			if (strval($this->PreviousHistorofPIH->CurrentValue) != "") {
				$this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->optionCaption($this->PreviousHistorofPIH->CurrentValue);
			} else {
				$this->PreviousHistorofPIH->ViewValue = NULL;
			}
			$this->PreviousHistorofPIH->ViewCustomAttributes = "";

			// PreviousHistoryofIUGR
			if (strval($this->PreviousHistoryofIUGR->CurrentValue) != "") {
				$this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->optionCaption($this->PreviousHistoryofIUGR->CurrentValue);
			} else {
				$this->PreviousHistoryofIUGR->ViewValue = NULL;
			}
			$this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

			// PreviousHistoryofOligohydramnios
			if (strval($this->PreviousHistoryofOligohydramnios->CurrentValue) != "") {
				$this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->optionCaption($this->PreviousHistoryofOligohydramnios->CurrentValue);
			} else {
				$this->PreviousHistoryofOligohydramnios->ViewValue = NULL;
			}
			$this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

			// PreviousHistoryofPreterm
			if (strval($this->PreviousHistoryofPreterm->CurrentValue) != "") {
				$this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->optionCaption($this->PreviousHistoryofPreterm->CurrentValue);
			} else {
				$this->PreviousHistoryofPreterm->ViewValue = NULL;
			}
			$this->PreviousHistoryofPreterm->ViewCustomAttributes = "";

			// G1
			$this->G1->ViewValue = $this->G1->CurrentValue;
			$this->G1->ViewCustomAttributes = "";

			// G2
			$this->G2->ViewValue = $this->G2->CurrentValue;
			$this->G2->ViewCustomAttributes = "";

			// G3
			$this->G3->ViewValue = $this->G3->CurrentValue;
			$this->G3->ViewCustomAttributes = "";

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->ViewValue = $this->DeliveryNDLSCS1->CurrentValue;
			$this->DeliveryNDLSCS1->ViewCustomAttributes = "";

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->ViewValue = $this->DeliveryNDLSCS2->CurrentValue;
			$this->DeliveryNDLSCS2->ViewCustomAttributes = "";

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->ViewValue = $this->DeliveryNDLSCS3->CurrentValue;
			$this->DeliveryNDLSCS3->ViewCustomAttributes = "";

			// BabySexweight1
			$this->BabySexweight1->ViewValue = $this->BabySexweight1->CurrentValue;
			$this->BabySexweight1->ViewCustomAttributes = "";

			// BabySexweight2
			$this->BabySexweight2->ViewValue = $this->BabySexweight2->CurrentValue;
			$this->BabySexweight2->ViewCustomAttributes = "";

			// BabySexweight3
			$this->BabySexweight3->ViewValue = $this->BabySexweight3->CurrentValue;
			$this->BabySexweight3->ViewCustomAttributes = "";

			// PastMedicalHistory
			if (strval($this->PastMedicalHistory->CurrentValue) != "") {
				$this->PastMedicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PastMedicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PastMedicalHistory->ViewValue->add($this->PastMedicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PastMedicalHistory->ViewValue = NULL;
			}
			$this->PastMedicalHistory->ViewCustomAttributes = "";

			// PastSurgicalHistory
			if (strval($this->PastSurgicalHistory->CurrentValue) != "") {
				$this->PastSurgicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PastSurgicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PastSurgicalHistory->ViewValue->add($this->PastSurgicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PastSurgicalHistory->ViewValue = NULL;
			}
			$this->PastSurgicalHistory->ViewCustomAttributes = "";

			// FamilyHistory
			if (strval($this->FamilyHistory->CurrentValue) != "") {
				$this->FamilyHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FamilyHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FamilyHistory->ViewValue->add($this->FamilyHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FamilyHistory->ViewValue = NULL;
			}
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Viability
			$this->Viability->ViewValue = $this->Viability->CurrentValue;
			$this->Viability->ViewCustomAttributes = "";

			// ViabilityDATE
			$this->ViabilityDATE->ViewValue = $this->ViabilityDATE->CurrentValue;
			$this->ViabilityDATE->ViewCustomAttributes = "";

			// ViabilityREPORT
			$this->ViabilityREPORT->ViewValue = $this->ViabilityREPORT->CurrentValue;
			$this->ViabilityREPORT->ViewCustomAttributes = "";

			// Viability2
			$this->Viability2->ViewValue = $this->Viability2->CurrentValue;
			$this->Viability2->ViewCustomAttributes = "";

			// Viability2DATE
			$this->Viability2DATE->ViewValue = $this->Viability2DATE->CurrentValue;
			$this->Viability2DATE->ViewCustomAttributes = "";

			// Viability2REPORT
			$this->Viability2REPORT->ViewValue = $this->Viability2REPORT->CurrentValue;
			$this->Viability2REPORT->ViewCustomAttributes = "";

			// NTscan
			$this->NTscan->ViewValue = $this->NTscan->CurrentValue;
			$this->NTscan->ViewCustomAttributes = "";

			// NTscanDATE
			$this->NTscanDATE->ViewValue = $this->NTscanDATE->CurrentValue;
			$this->NTscanDATE->ViewCustomAttributes = "";

			// NTscanREPORT
			$this->NTscanREPORT->ViewValue = $this->NTscanREPORT->CurrentValue;
			$this->NTscanREPORT->ViewCustomAttributes = "";

			// EarlyTarget
			$this->EarlyTarget->ViewValue = $this->EarlyTarget->CurrentValue;
			$this->EarlyTarget->ViewCustomAttributes = "";

			// EarlyTargetDATE
			$this->EarlyTargetDATE->ViewValue = $this->EarlyTargetDATE->CurrentValue;
			$this->EarlyTargetDATE->ViewCustomAttributes = "";

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->ViewValue = $this->EarlyTargetREPORT->CurrentValue;
			$this->EarlyTargetREPORT->ViewCustomAttributes = "";

			// Anomaly
			$this->Anomaly->ViewValue = $this->Anomaly->CurrentValue;
			$this->Anomaly->ViewCustomAttributes = "";

			// AnomalyDATE
			$this->AnomalyDATE->ViewValue = $this->AnomalyDATE->CurrentValue;
			$this->AnomalyDATE->ViewCustomAttributes = "";

			// AnomalyREPORT
			$this->AnomalyREPORT->ViewValue = $this->AnomalyREPORT->CurrentValue;
			$this->AnomalyREPORT->ViewCustomAttributes = "";

			// Growth
			$this->Growth->ViewValue = $this->Growth->CurrentValue;
			$this->Growth->ViewCustomAttributes = "";

			// GrowthDATE
			$this->GrowthDATE->ViewValue = $this->GrowthDATE->CurrentValue;
			$this->GrowthDATE->ViewCustomAttributes = "";

			// GrowthREPORT
			$this->GrowthREPORT->ViewValue = $this->GrowthREPORT->CurrentValue;
			$this->GrowthREPORT->ViewCustomAttributes = "";

			// Growth1
			$this->Growth1->ViewValue = $this->Growth1->CurrentValue;
			$this->Growth1->ViewCustomAttributes = "";

			// Growth1DATE
			$this->Growth1DATE->ViewValue = $this->Growth1DATE->CurrentValue;
			$this->Growth1DATE->ViewCustomAttributes = "";

			// Growth1REPORT
			$this->Growth1REPORT->ViewValue = $this->Growth1REPORT->CurrentValue;
			$this->Growth1REPORT->ViewCustomAttributes = "";

			// ANProfile
			$this->ANProfile->ViewValue = $this->ANProfile->CurrentValue;
			$this->ANProfile->ViewCustomAttributes = "";

			// ANProfileDATE
			$this->ANProfileDATE->ViewValue = $this->ANProfileDATE->CurrentValue;
			$this->ANProfileDATE->ViewCustomAttributes = "";

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->ViewValue = $this->ANProfileINHOUSE->CurrentValue;
			$this->ANProfileINHOUSE->ViewCustomAttributes = "";

			// ANProfileREPORT
			$this->ANProfileREPORT->ViewValue = $this->ANProfileREPORT->CurrentValue;
			$this->ANProfileREPORT->ViewCustomAttributes = "";

			// DualMarker
			$this->DualMarker->ViewValue = $this->DualMarker->CurrentValue;
			$this->DualMarker->ViewCustomAttributes = "";

			// DualMarkerDATE
			$this->DualMarkerDATE->ViewValue = $this->DualMarkerDATE->CurrentValue;
			$this->DualMarkerDATE->ViewCustomAttributes = "";

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->ViewValue = $this->DualMarkerINHOUSE->CurrentValue;
			$this->DualMarkerINHOUSE->ViewCustomAttributes = "";

			// DualMarkerREPORT
			$this->DualMarkerREPORT->ViewValue = $this->DualMarkerREPORT->CurrentValue;
			$this->DualMarkerREPORT->ViewCustomAttributes = "";

			// Quadruple
			$this->Quadruple->ViewValue = $this->Quadruple->CurrentValue;
			$this->Quadruple->ViewCustomAttributes = "";

			// QuadrupleDATE
			$this->QuadrupleDATE->ViewValue = $this->QuadrupleDATE->CurrentValue;
			$this->QuadrupleDATE->ViewCustomAttributes = "";

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->ViewValue = $this->QuadrupleINHOUSE->CurrentValue;
			$this->QuadrupleINHOUSE->ViewCustomAttributes = "";

			// QuadrupleREPORT
			$this->QuadrupleREPORT->ViewValue = $this->QuadrupleREPORT->CurrentValue;
			$this->QuadrupleREPORT->ViewCustomAttributes = "";

			// A5month
			$this->A5month->ViewValue = $this->A5month->CurrentValue;
			$this->A5month->ViewCustomAttributes = "";

			// A5monthDATE
			$this->A5monthDATE->ViewValue = $this->A5monthDATE->CurrentValue;
			$this->A5monthDATE->ViewCustomAttributes = "";

			// A5monthINHOUSE
			$this->A5monthINHOUSE->ViewValue = $this->A5monthINHOUSE->CurrentValue;
			$this->A5monthINHOUSE->ViewCustomAttributes = "";

			// A5monthREPORT
			$this->A5monthREPORT->ViewValue = $this->A5monthREPORT->CurrentValue;
			$this->A5monthREPORT->ViewCustomAttributes = "";

			// A7month
			$this->A7month->ViewValue = $this->A7month->CurrentValue;
			$this->A7month->ViewCustomAttributes = "";

			// A7monthDATE
			$this->A7monthDATE->ViewValue = $this->A7monthDATE->CurrentValue;
			$this->A7monthDATE->ViewCustomAttributes = "";

			// A7monthINHOUSE
			$this->A7monthINHOUSE->ViewValue = $this->A7monthINHOUSE->CurrentValue;
			$this->A7monthINHOUSE->ViewCustomAttributes = "";

			// A7monthREPORT
			$this->A7monthREPORT->ViewValue = $this->A7monthREPORT->CurrentValue;
			$this->A7monthREPORT->ViewCustomAttributes = "";

			// A9month
			$this->A9month->ViewValue = $this->A9month->CurrentValue;
			$this->A9month->ViewCustomAttributes = "";

			// A9monthDATE
			$this->A9monthDATE->ViewValue = $this->A9monthDATE->CurrentValue;
			$this->A9monthDATE->ViewCustomAttributes = "";

			// A9monthINHOUSE
			$this->A9monthINHOUSE->ViewValue = $this->A9monthINHOUSE->CurrentValue;
			$this->A9monthINHOUSE->ViewCustomAttributes = "";

			// A9monthREPORT
			$this->A9monthREPORT->ViewValue = $this->A9monthREPORT->CurrentValue;
			$this->A9monthREPORT->ViewCustomAttributes = "";

			// INJ
			$this->INJ->ViewValue = $this->INJ->CurrentValue;
			$this->INJ->ViewCustomAttributes = "";

			// INJDATE
			$this->INJDATE->ViewValue = $this->INJDATE->CurrentValue;
			$this->INJDATE->ViewCustomAttributes = "";

			// INJINHOUSE
			$this->INJINHOUSE->ViewValue = $this->INJINHOUSE->CurrentValue;
			$this->INJINHOUSE->ViewCustomAttributes = "";

			// INJREPORT
			$this->INJREPORT->ViewValue = $this->INJREPORT->CurrentValue;
			$this->INJREPORT->ViewCustomAttributes = "";

			// Bleeding
			if (strval($this->Bleeding->CurrentValue) != "") {
				$this->Bleeding->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Bleeding->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Bleeding->ViewValue->add($this->Bleeding->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Bleeding->ViewValue = NULL;
			}
			$this->Bleeding->ViewCustomAttributes = "";

			// Hypothyroidism
			$this->Hypothyroidism->ViewValue = $this->Hypothyroidism->CurrentValue;
			$this->Hypothyroidism->ViewCustomAttributes = "";

			// PICMENumber
			$this->PICMENumber->ViewValue = $this->PICMENumber->CurrentValue;
			$this->PICMENumber->ViewCustomAttributes = "";

			// Outcome
			$this->Outcome->ViewValue = $this->Outcome->CurrentValue;
			$this->Outcome->ViewCustomAttributes = "";

			// DateofAdmission
			$this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
			$this->DateofAdmission->ViewCustomAttributes = "";

			// DateodProcedure
			$this->DateodProcedure->ViewValue = $this->DateodProcedure->CurrentValue;
			$this->DateodProcedure->ViewCustomAttributes = "";

			// Miscarriage
			if (strval($this->Miscarriage->CurrentValue) != "") {
				$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
			} else {
				$this->Miscarriage->ViewValue = NULL;
			}
			$this->Miscarriage->ViewCustomAttributes = "";

			// ModeOfDelivery
			if (strval($this->ModeOfDelivery->CurrentValue) != "") {
				$this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->optionCaption($this->ModeOfDelivery->CurrentValue);
			} else {
				$this->ModeOfDelivery->ViewValue = NULL;
			}
			$this->ModeOfDelivery->ViewCustomAttributes = "";

			// ND
			$this->ND->ViewValue = $this->ND->CurrentValue;
			$this->ND->ViewCustomAttributes = "";

			// NDS
			if (strval($this->NDS->CurrentValue) != "") {
				$this->NDS->ViewValue = $this->NDS->optionCaption($this->NDS->CurrentValue);
			} else {
				$this->NDS->ViewValue = NULL;
			}
			$this->NDS->ViewCustomAttributes = "";

			// NDP
			if (strval($this->NDP->CurrentValue) != "") {
				$this->NDP->ViewValue = $this->NDP->optionCaption($this->NDP->CurrentValue);
			} else {
				$this->NDP->ViewValue = NULL;
			}
			$this->NDP->ViewCustomAttributes = "";

			// Vaccum
			$this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
			$this->Vaccum->ViewCustomAttributes = "";

			// VaccumS
			if (strval($this->VaccumS->CurrentValue) != "") {
				$this->VaccumS->ViewValue = $this->VaccumS->optionCaption($this->VaccumS->CurrentValue);
			} else {
				$this->VaccumS->ViewValue = NULL;
			}
			$this->VaccumS->ViewCustomAttributes = "";

			// VaccumP
			if (strval($this->VaccumP->CurrentValue) != "") {
				$this->VaccumP->ViewValue = $this->VaccumP->optionCaption($this->VaccumP->CurrentValue);
			} else {
				$this->VaccumP->ViewValue = NULL;
			}
			$this->VaccumP->ViewCustomAttributes = "";

			// Forceps
			$this->Forceps->ViewValue = $this->Forceps->CurrentValue;
			$this->Forceps->ViewCustomAttributes = "";

			// ForcepsS
			if (strval($this->ForcepsS->CurrentValue) != "") {
				$this->ForcepsS->ViewValue = $this->ForcepsS->optionCaption($this->ForcepsS->CurrentValue);
			} else {
				$this->ForcepsS->ViewValue = NULL;
			}
			$this->ForcepsS->ViewCustomAttributes = "";

			// ForcepsP
			if (strval($this->ForcepsP->CurrentValue) != "") {
				$this->ForcepsP->ViewValue = $this->ForcepsP->optionCaption($this->ForcepsP->CurrentValue);
			} else {
				$this->ForcepsP->ViewValue = NULL;
			}
			$this->ForcepsP->ViewCustomAttributes = "";

			// Elective
			$this->Elective->ViewValue = $this->Elective->CurrentValue;
			$this->Elective->ViewCustomAttributes = "";

			// ElectiveS
			if (strval($this->ElectiveS->CurrentValue) != "") {
				$this->ElectiveS->ViewValue = $this->ElectiveS->optionCaption($this->ElectiveS->CurrentValue);
			} else {
				$this->ElectiveS->ViewValue = NULL;
			}
			$this->ElectiveS->ViewCustomAttributes = "";

			// ElectiveP
			if (strval($this->ElectiveP->CurrentValue) != "") {
				$this->ElectiveP->ViewValue = $this->ElectiveP->optionCaption($this->ElectiveP->CurrentValue);
			} else {
				$this->ElectiveP->ViewValue = NULL;
			}
			$this->ElectiveP->ViewCustomAttributes = "";

			// Emergency
			$this->Emergency->ViewValue = $this->Emergency->CurrentValue;
			$this->Emergency->ViewCustomAttributes = "";

			// EmergencyS
			if (strval($this->EmergencyS->CurrentValue) != "") {
				$this->EmergencyS->ViewValue = $this->EmergencyS->optionCaption($this->EmergencyS->CurrentValue);
			} else {
				$this->EmergencyS->ViewValue = NULL;
			}
			$this->EmergencyS->ViewCustomAttributes = "";

			// EmergencyP
			if (strval($this->EmergencyP->CurrentValue) != "") {
				$this->EmergencyP->ViewValue = $this->EmergencyP->optionCaption($this->EmergencyP->CurrentValue);
			} else {
				$this->EmergencyP->ViewValue = NULL;
			}
			$this->EmergencyP->ViewCustomAttributes = "";

			// Maturity
			if (strval($this->Maturity->CurrentValue) != "") {
				$this->Maturity->ViewValue = $this->Maturity->optionCaption($this->Maturity->CurrentValue);
			} else {
				$this->Maturity->ViewValue = NULL;
			}
			$this->Maturity->ViewCustomAttributes = "";

			// Baby1
			$this->Baby1->ViewValue = $this->Baby1->CurrentValue;
			$this->Baby1->ViewCustomAttributes = "";

			// Baby2
			$this->Baby2->ViewValue = $this->Baby2->CurrentValue;
			$this->Baby2->ViewCustomAttributes = "";

			// sex1
			$this->sex1->ViewValue = $this->sex1->CurrentValue;
			$this->sex1->ViewCustomAttributes = "";

			// sex2
			$this->sex2->ViewValue = $this->sex2->CurrentValue;
			$this->sex2->ViewCustomAttributes = "";

			// weight1
			$this->weight1->ViewValue = $this->weight1->CurrentValue;
			$this->weight1->ViewCustomAttributes = "";

			// weight2
			$this->weight2->ViewValue = $this->weight2->CurrentValue;
			$this->weight2->ViewCustomAttributes = "";

			// NICU1
			$this->NICU1->ViewValue = $this->NICU1->CurrentValue;
			$this->NICU1->ViewCustomAttributes = "";

			// NICU2
			$this->NICU2->ViewValue = $this->NICU2->CurrentValue;
			$this->NICU2->ViewCustomAttributes = "";

			// Jaundice1
			$this->Jaundice1->ViewValue = $this->Jaundice1->CurrentValue;
			$this->Jaundice1->ViewCustomAttributes = "";

			// Jaundice2
			$this->Jaundice2->ViewValue = $this->Jaundice2->CurrentValue;
			$this->Jaundice2->ViewCustomAttributes = "";

			// Others1
			$this->Others1->ViewValue = $this->Others1->CurrentValue;
			$this->Others1->ViewCustomAttributes = "";

			// Others2
			$this->Others2->ViewValue = $this->Others2->CurrentValue;
			$this->Others2->ViewCustomAttributes = "";

			// SpillOverReasons
			if (strval($this->SpillOverReasons->CurrentValue) != "") {
				$this->SpillOverReasons->ViewValue = $this->SpillOverReasons->optionCaption($this->SpillOverReasons->CurrentValue);
			} else {
				$this->SpillOverReasons->ViewValue = NULL;
			}
			$this->SpillOverReasons->ViewCustomAttributes = "";

			// ANClosed
			if (strval($this->ANClosed->CurrentValue) != "") {
				$this->ANClosed->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ANClosed->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ANClosed->ViewValue->add($this->ANClosed->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ANClosed->ViewValue = NULL;
			}
			$this->ANClosed->ViewCustomAttributes = "";

			// ANClosedDATE
			$this->ANClosedDATE->ViewValue = $this->ANClosedDATE->CurrentValue;
			$this->ANClosedDATE->ViewCustomAttributes = "";

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->ViewValue = $this->PastMedicalHistoryOthers->CurrentValue;
			$this->PastMedicalHistoryOthers->ViewCustomAttributes = "";

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->ViewValue = $this->PastSurgicalHistoryOthers->CurrentValue;
			$this->PastSurgicalHistoryOthers->ViewCustomAttributes = "";

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->ViewValue = $this->FamilyHistoryOthers->CurrentValue;
			$this->FamilyHistoryOthers->ViewCustomAttributes = "";

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->ViewValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
			$this->PresentPregnancyComplicationsOthers->ViewCustomAttributes = "";

			// ETdate
			$this->ETdate->ViewValue = $this->ETdate->CurrentValue;
			$this->ETdate->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// pid
			$this->pid->LinkCustomAttributes = "";
			$this->pid->HrefValue = "";
			$this->pid->TooltipValue = "";

			// fid
			$this->fid->LinkCustomAttributes = "";
			$this->fid->HrefValue = "";
			$this->fid->TooltipValue = "";

			// G
			$this->G->LinkCustomAttributes = "";
			$this->G->HrefValue = "";
			$this->G->TooltipValue = "";

			// P
			$this->P->LinkCustomAttributes = "";
			$this->P->HrefValue = "";
			$this->P->TooltipValue = "";

			// L
			$this->L->LinkCustomAttributes = "";
			$this->L->HrefValue = "";
			$this->L->TooltipValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";
			$this->A->TooltipValue = "";

			// E
			$this->E->LinkCustomAttributes = "";
			$this->E->HrefValue = "";
			$this->E->TooltipValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";
			$this->M->TooltipValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// EDO
			$this->EDO->LinkCustomAttributes = "";
			$this->EDO->HrefValue = "";
			$this->EDO->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// MaritalHistory
			$this->MaritalHistory->LinkCustomAttributes = "";
			$this->MaritalHistory->HrefValue = "";
			$this->MaritalHistory->TooltipValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";
			$this->ObstetricHistory->TooltipValue = "";

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->LinkCustomAttributes = "";
			$this->PreviousHistoryofGDM->HrefValue = "";
			$this->PreviousHistoryofGDM->TooltipValue = "";

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->LinkCustomAttributes = "";
			$this->PreviousHistorofPIH->HrefValue = "";
			$this->PreviousHistorofPIH->TooltipValue = "";

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
			$this->PreviousHistoryofIUGR->HrefValue = "";
			$this->PreviousHistoryofIUGR->TooltipValue = "";

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
			$this->PreviousHistoryofOligohydramnios->HrefValue = "";
			$this->PreviousHistoryofOligohydramnios->TooltipValue = "";

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
			$this->PreviousHistoryofPreterm->HrefValue = "";
			$this->PreviousHistoryofPreterm->TooltipValue = "";

			// G1
			$this->G1->LinkCustomAttributes = "";
			$this->G1->HrefValue = "";
			$this->G1->TooltipValue = "";

			// G2
			$this->G2->LinkCustomAttributes = "";
			$this->G2->HrefValue = "";
			$this->G2->TooltipValue = "";

			// G3
			$this->G3->LinkCustomAttributes = "";
			$this->G3->HrefValue = "";
			$this->G3->TooltipValue = "";

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS1->HrefValue = "";
			$this->DeliveryNDLSCS1->TooltipValue = "";

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS2->HrefValue = "";
			$this->DeliveryNDLSCS2->TooltipValue = "";

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS3->HrefValue = "";
			$this->DeliveryNDLSCS3->TooltipValue = "";

			// BabySexweight1
			$this->BabySexweight1->LinkCustomAttributes = "";
			$this->BabySexweight1->HrefValue = "";
			$this->BabySexweight1->TooltipValue = "";

			// BabySexweight2
			$this->BabySexweight2->LinkCustomAttributes = "";
			$this->BabySexweight2->HrefValue = "";
			$this->BabySexweight2->TooltipValue = "";

			// BabySexweight3
			$this->BabySexweight3->LinkCustomAttributes = "";
			$this->BabySexweight3->HrefValue = "";
			$this->BabySexweight3->TooltipValue = "";

			// PastMedicalHistory
			$this->PastMedicalHistory->LinkCustomAttributes = "";
			$this->PastMedicalHistory->HrefValue = "";
			$this->PastMedicalHistory->TooltipValue = "";

			// PastSurgicalHistory
			$this->PastSurgicalHistory->LinkCustomAttributes = "";
			$this->PastSurgicalHistory->HrefValue = "";
			$this->PastSurgicalHistory->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

			// Viability
			$this->Viability->LinkCustomAttributes = "";
			$this->Viability->HrefValue = "";
			$this->Viability->TooltipValue = "";

			// ViabilityDATE
			$this->ViabilityDATE->LinkCustomAttributes = "";
			$this->ViabilityDATE->HrefValue = "";
			$this->ViabilityDATE->TooltipValue = "";

			// ViabilityREPORT
			$this->ViabilityREPORT->LinkCustomAttributes = "";
			$this->ViabilityREPORT->HrefValue = "";
			$this->ViabilityREPORT->TooltipValue = "";

			// Viability2
			$this->Viability2->LinkCustomAttributes = "";
			$this->Viability2->HrefValue = "";
			$this->Viability2->TooltipValue = "";

			// Viability2DATE
			$this->Viability2DATE->LinkCustomAttributes = "";
			$this->Viability2DATE->HrefValue = "";
			$this->Viability2DATE->TooltipValue = "";

			// Viability2REPORT
			$this->Viability2REPORT->LinkCustomAttributes = "";
			$this->Viability2REPORT->HrefValue = "";
			$this->Viability2REPORT->TooltipValue = "";

			// NTscan
			$this->NTscan->LinkCustomAttributes = "";
			$this->NTscan->HrefValue = "";
			$this->NTscan->TooltipValue = "";

			// NTscanDATE
			$this->NTscanDATE->LinkCustomAttributes = "";
			$this->NTscanDATE->HrefValue = "";
			$this->NTscanDATE->TooltipValue = "";

			// NTscanREPORT
			$this->NTscanREPORT->LinkCustomAttributes = "";
			$this->NTscanREPORT->HrefValue = "";
			$this->NTscanREPORT->TooltipValue = "";

			// EarlyTarget
			$this->EarlyTarget->LinkCustomAttributes = "";
			$this->EarlyTarget->HrefValue = "";
			$this->EarlyTarget->TooltipValue = "";

			// EarlyTargetDATE
			$this->EarlyTargetDATE->LinkCustomAttributes = "";
			$this->EarlyTargetDATE->HrefValue = "";
			$this->EarlyTargetDATE->TooltipValue = "";

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->LinkCustomAttributes = "";
			$this->EarlyTargetREPORT->HrefValue = "";
			$this->EarlyTargetREPORT->TooltipValue = "";

			// Anomaly
			$this->Anomaly->LinkCustomAttributes = "";
			$this->Anomaly->HrefValue = "";
			$this->Anomaly->TooltipValue = "";

			// AnomalyDATE
			$this->AnomalyDATE->LinkCustomAttributes = "";
			$this->AnomalyDATE->HrefValue = "";
			$this->AnomalyDATE->TooltipValue = "";

			// AnomalyREPORT
			$this->AnomalyREPORT->LinkCustomAttributes = "";
			$this->AnomalyREPORT->HrefValue = "";
			$this->AnomalyREPORT->TooltipValue = "";

			// Growth
			$this->Growth->LinkCustomAttributes = "";
			$this->Growth->HrefValue = "";
			$this->Growth->TooltipValue = "";

			// GrowthDATE
			$this->GrowthDATE->LinkCustomAttributes = "";
			$this->GrowthDATE->HrefValue = "";
			$this->GrowthDATE->TooltipValue = "";

			// GrowthREPORT
			$this->GrowthREPORT->LinkCustomAttributes = "";
			$this->GrowthREPORT->HrefValue = "";
			$this->GrowthREPORT->TooltipValue = "";

			// Growth1
			$this->Growth1->LinkCustomAttributes = "";
			$this->Growth1->HrefValue = "";
			$this->Growth1->TooltipValue = "";

			// Growth1DATE
			$this->Growth1DATE->LinkCustomAttributes = "";
			$this->Growth1DATE->HrefValue = "";
			$this->Growth1DATE->TooltipValue = "";

			// Growth1REPORT
			$this->Growth1REPORT->LinkCustomAttributes = "";
			$this->Growth1REPORT->HrefValue = "";
			$this->Growth1REPORT->TooltipValue = "";

			// ANProfile
			$this->ANProfile->LinkCustomAttributes = "";
			$this->ANProfile->HrefValue = "";
			$this->ANProfile->TooltipValue = "";

			// ANProfileDATE
			$this->ANProfileDATE->LinkCustomAttributes = "";
			$this->ANProfileDATE->HrefValue = "";
			$this->ANProfileDATE->TooltipValue = "";

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->LinkCustomAttributes = "";
			$this->ANProfileINHOUSE->HrefValue = "";
			$this->ANProfileINHOUSE->TooltipValue = "";

			// ANProfileREPORT
			$this->ANProfileREPORT->LinkCustomAttributes = "";
			$this->ANProfileREPORT->HrefValue = "";
			$this->ANProfileREPORT->TooltipValue = "";

			// DualMarker
			$this->DualMarker->LinkCustomAttributes = "";
			$this->DualMarker->HrefValue = "";
			$this->DualMarker->TooltipValue = "";

			// DualMarkerDATE
			$this->DualMarkerDATE->LinkCustomAttributes = "";
			$this->DualMarkerDATE->HrefValue = "";
			$this->DualMarkerDATE->TooltipValue = "";

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->LinkCustomAttributes = "";
			$this->DualMarkerINHOUSE->HrefValue = "";
			$this->DualMarkerINHOUSE->TooltipValue = "";

			// DualMarkerREPORT
			$this->DualMarkerREPORT->LinkCustomAttributes = "";
			$this->DualMarkerREPORT->HrefValue = "";
			$this->DualMarkerREPORT->TooltipValue = "";

			// Quadruple
			$this->Quadruple->LinkCustomAttributes = "";
			$this->Quadruple->HrefValue = "";
			$this->Quadruple->TooltipValue = "";

			// QuadrupleDATE
			$this->QuadrupleDATE->LinkCustomAttributes = "";
			$this->QuadrupleDATE->HrefValue = "";
			$this->QuadrupleDATE->TooltipValue = "";

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->LinkCustomAttributes = "";
			$this->QuadrupleINHOUSE->HrefValue = "";
			$this->QuadrupleINHOUSE->TooltipValue = "";

			// QuadrupleREPORT
			$this->QuadrupleREPORT->LinkCustomAttributes = "";
			$this->QuadrupleREPORT->HrefValue = "";
			$this->QuadrupleREPORT->TooltipValue = "";

			// A5month
			$this->A5month->LinkCustomAttributes = "";
			$this->A5month->HrefValue = "";
			$this->A5month->TooltipValue = "";

			// A5monthDATE
			$this->A5monthDATE->LinkCustomAttributes = "";
			$this->A5monthDATE->HrefValue = "";
			$this->A5monthDATE->TooltipValue = "";

			// A5monthINHOUSE
			$this->A5monthINHOUSE->LinkCustomAttributes = "";
			$this->A5monthINHOUSE->HrefValue = "";
			$this->A5monthINHOUSE->TooltipValue = "";

			// A5monthREPORT
			$this->A5monthREPORT->LinkCustomAttributes = "";
			$this->A5monthREPORT->HrefValue = "";
			$this->A5monthREPORT->TooltipValue = "";

			// A7month
			$this->A7month->LinkCustomAttributes = "";
			$this->A7month->HrefValue = "";
			$this->A7month->TooltipValue = "";

			// A7monthDATE
			$this->A7monthDATE->LinkCustomAttributes = "";
			$this->A7monthDATE->HrefValue = "";
			$this->A7monthDATE->TooltipValue = "";

			// A7monthINHOUSE
			$this->A7monthINHOUSE->LinkCustomAttributes = "";
			$this->A7monthINHOUSE->HrefValue = "";
			$this->A7monthINHOUSE->TooltipValue = "";

			// A7monthREPORT
			$this->A7monthREPORT->LinkCustomAttributes = "";
			$this->A7monthREPORT->HrefValue = "";
			$this->A7monthREPORT->TooltipValue = "";

			// A9month
			$this->A9month->LinkCustomAttributes = "";
			$this->A9month->HrefValue = "";
			$this->A9month->TooltipValue = "";

			// A9monthDATE
			$this->A9monthDATE->LinkCustomAttributes = "";
			$this->A9monthDATE->HrefValue = "";
			$this->A9monthDATE->TooltipValue = "";

			// A9monthINHOUSE
			$this->A9monthINHOUSE->LinkCustomAttributes = "";
			$this->A9monthINHOUSE->HrefValue = "";
			$this->A9monthINHOUSE->TooltipValue = "";

			// A9monthREPORT
			$this->A9monthREPORT->LinkCustomAttributes = "";
			$this->A9monthREPORT->HrefValue = "";
			$this->A9monthREPORT->TooltipValue = "";

			// INJ
			$this->INJ->LinkCustomAttributes = "";
			$this->INJ->HrefValue = "";
			$this->INJ->TooltipValue = "";

			// INJDATE
			$this->INJDATE->LinkCustomAttributes = "";
			$this->INJDATE->HrefValue = "";
			$this->INJDATE->TooltipValue = "";

			// INJINHOUSE
			$this->INJINHOUSE->LinkCustomAttributes = "";
			$this->INJINHOUSE->HrefValue = "";
			$this->INJINHOUSE->TooltipValue = "";

			// INJREPORT
			$this->INJREPORT->LinkCustomAttributes = "";
			$this->INJREPORT->HrefValue = "";
			$this->INJREPORT->TooltipValue = "";

			// Bleeding
			$this->Bleeding->LinkCustomAttributes = "";
			$this->Bleeding->HrefValue = "";
			$this->Bleeding->TooltipValue = "";

			// Hypothyroidism
			$this->Hypothyroidism->LinkCustomAttributes = "";
			$this->Hypothyroidism->HrefValue = "";
			$this->Hypothyroidism->TooltipValue = "";

			// PICMENumber
			$this->PICMENumber->LinkCustomAttributes = "";
			$this->PICMENumber->HrefValue = "";
			$this->PICMENumber->TooltipValue = "";

			// Outcome
			$this->Outcome->LinkCustomAttributes = "";
			$this->Outcome->HrefValue = "";
			$this->Outcome->TooltipValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";
			$this->DateofAdmission->TooltipValue = "";

			// DateodProcedure
			$this->DateodProcedure->LinkCustomAttributes = "";
			$this->DateodProcedure->HrefValue = "";
			$this->DateodProcedure->TooltipValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";
			$this->Miscarriage->TooltipValue = "";

			// ModeOfDelivery
			$this->ModeOfDelivery->LinkCustomAttributes = "";
			$this->ModeOfDelivery->HrefValue = "";
			$this->ModeOfDelivery->TooltipValue = "";

			// ND
			$this->ND->LinkCustomAttributes = "";
			$this->ND->HrefValue = "";
			$this->ND->TooltipValue = "";

			// NDS
			$this->NDS->LinkCustomAttributes = "";
			$this->NDS->HrefValue = "";
			$this->NDS->TooltipValue = "";

			// NDP
			$this->NDP->LinkCustomAttributes = "";
			$this->NDP->HrefValue = "";
			$this->NDP->TooltipValue = "";

			// Vaccum
			$this->Vaccum->LinkCustomAttributes = "";
			$this->Vaccum->HrefValue = "";
			$this->Vaccum->TooltipValue = "";

			// VaccumS
			$this->VaccumS->LinkCustomAttributes = "";
			$this->VaccumS->HrefValue = "";
			$this->VaccumS->TooltipValue = "";

			// VaccumP
			$this->VaccumP->LinkCustomAttributes = "";
			$this->VaccumP->HrefValue = "";
			$this->VaccumP->TooltipValue = "";

			// Forceps
			$this->Forceps->LinkCustomAttributes = "";
			$this->Forceps->HrefValue = "";
			$this->Forceps->TooltipValue = "";

			// ForcepsS
			$this->ForcepsS->LinkCustomAttributes = "";
			$this->ForcepsS->HrefValue = "";
			$this->ForcepsS->TooltipValue = "";

			// ForcepsP
			$this->ForcepsP->LinkCustomAttributes = "";
			$this->ForcepsP->HrefValue = "";
			$this->ForcepsP->TooltipValue = "";

			// Elective
			$this->Elective->LinkCustomAttributes = "";
			$this->Elective->HrefValue = "";
			$this->Elective->TooltipValue = "";

			// ElectiveS
			$this->ElectiveS->LinkCustomAttributes = "";
			$this->ElectiveS->HrefValue = "";
			$this->ElectiveS->TooltipValue = "";

			// ElectiveP
			$this->ElectiveP->LinkCustomAttributes = "";
			$this->ElectiveP->HrefValue = "";
			$this->ElectiveP->TooltipValue = "";

			// Emergency
			$this->Emergency->LinkCustomAttributes = "";
			$this->Emergency->HrefValue = "";
			$this->Emergency->TooltipValue = "";

			// EmergencyS
			$this->EmergencyS->LinkCustomAttributes = "";
			$this->EmergencyS->HrefValue = "";
			$this->EmergencyS->TooltipValue = "";

			// EmergencyP
			$this->EmergencyP->LinkCustomAttributes = "";
			$this->EmergencyP->HrefValue = "";
			$this->EmergencyP->TooltipValue = "";

			// Maturity
			$this->Maturity->LinkCustomAttributes = "";
			$this->Maturity->HrefValue = "";
			$this->Maturity->TooltipValue = "";

			// Baby1
			$this->Baby1->LinkCustomAttributes = "";
			$this->Baby1->HrefValue = "";
			$this->Baby1->TooltipValue = "";

			// Baby2
			$this->Baby2->LinkCustomAttributes = "";
			$this->Baby2->HrefValue = "";
			$this->Baby2->TooltipValue = "";

			// sex1
			$this->sex1->LinkCustomAttributes = "";
			$this->sex1->HrefValue = "";
			$this->sex1->TooltipValue = "";

			// sex2
			$this->sex2->LinkCustomAttributes = "";
			$this->sex2->HrefValue = "";
			$this->sex2->TooltipValue = "";

			// weight1
			$this->weight1->LinkCustomAttributes = "";
			$this->weight1->HrefValue = "";
			$this->weight1->TooltipValue = "";

			// weight2
			$this->weight2->LinkCustomAttributes = "";
			$this->weight2->HrefValue = "";
			$this->weight2->TooltipValue = "";

			// NICU1
			$this->NICU1->LinkCustomAttributes = "";
			$this->NICU1->HrefValue = "";
			$this->NICU1->TooltipValue = "";

			// NICU2
			$this->NICU2->LinkCustomAttributes = "";
			$this->NICU2->HrefValue = "";
			$this->NICU2->TooltipValue = "";

			// Jaundice1
			$this->Jaundice1->LinkCustomAttributes = "";
			$this->Jaundice1->HrefValue = "";
			$this->Jaundice1->TooltipValue = "";

			// Jaundice2
			$this->Jaundice2->LinkCustomAttributes = "";
			$this->Jaundice2->HrefValue = "";
			$this->Jaundice2->TooltipValue = "";

			// Others1
			$this->Others1->LinkCustomAttributes = "";
			$this->Others1->HrefValue = "";
			$this->Others1->TooltipValue = "";

			// Others2
			$this->Others2->LinkCustomAttributes = "";
			$this->Others2->HrefValue = "";
			$this->Others2->TooltipValue = "";

			// SpillOverReasons
			$this->SpillOverReasons->LinkCustomAttributes = "";
			$this->SpillOverReasons->HrefValue = "";
			$this->SpillOverReasons->TooltipValue = "";

			// ANClosed
			$this->ANClosed->LinkCustomAttributes = "";
			$this->ANClosed->HrefValue = "";
			$this->ANClosed->TooltipValue = "";

			// ANClosedDATE
			$this->ANClosedDATE->LinkCustomAttributes = "";
			$this->ANClosedDATE->HrefValue = "";
			$this->ANClosedDATE->TooltipValue = "";

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastMedicalHistoryOthers->HrefValue = "";
			$this->PastMedicalHistoryOthers->TooltipValue = "";

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastSurgicalHistoryOthers->HrefValue = "";
			$this->PastSurgicalHistoryOthers->TooltipValue = "";

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->LinkCustomAttributes = "";
			$this->FamilyHistoryOthers->HrefValue = "";
			$this->FamilyHistoryOthers->TooltipValue = "";

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
			$this->PresentPregnancyComplicationsOthers->HrefValue = "";
			$this->PresentPregnancyComplicationsOthers->TooltipValue = "";

			// ETdate
			$this->ETdate->LinkCustomAttributes = "";
			$this->ETdate->HrefValue = "";
			$this->ETdate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// pid

			$this->pid->EditAttrs["class"] = "form-control";
			$this->pid->EditCustomAttributes = "";
			if ($this->pid->getSessionValue() != "") {
				$this->pid->CurrentValue = $this->pid->getSessionValue();
				$this->pid->OldValue = $this->pid->CurrentValue;
				$this->pid->ViewValue = $this->pid->CurrentValue;
				$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
				$this->pid->ViewCustomAttributes = "";
			} else {
				$this->pid->EditValue = HtmlEncode($this->pid->CurrentValue);
				$this->pid->PlaceHolder = RemoveHtml($this->pid->caption());
			}

			// fid
			$this->fid->EditAttrs["class"] = "form-control";
			$this->fid->EditCustomAttributes = "";
			if ($this->fid->getSessionValue() != "") {
				$this->fid->CurrentValue = $this->fid->getSessionValue();
				$this->fid->OldValue = $this->fid->CurrentValue;
				$this->fid->ViewValue = $this->fid->CurrentValue;
				$this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
				$this->fid->ViewCustomAttributes = "";
			} else {
				$this->fid->EditValue = HtmlEncode($this->fid->CurrentValue);
				$this->fid->PlaceHolder = RemoveHtml($this->fid->caption());
			}

			// G
			$this->G->EditAttrs["class"] = "form-control";
			$this->G->EditCustomAttributes = "";
			if (!$this->G->Raw)
				$this->G->CurrentValue = HtmlDecode($this->G->CurrentValue);
			$this->G->EditValue = HtmlEncode($this->G->CurrentValue);
			$this->G->PlaceHolder = RemoveHtml($this->G->caption());

			// P
			$this->P->EditAttrs["class"] = "form-control";
			$this->P->EditCustomAttributes = "";
			if (!$this->P->Raw)
				$this->P->CurrentValue = HtmlDecode($this->P->CurrentValue);
			$this->P->EditValue = HtmlEncode($this->P->CurrentValue);
			$this->P->PlaceHolder = RemoveHtml($this->P->caption());

			// L
			$this->L->EditAttrs["class"] = "form-control";
			$this->L->EditCustomAttributes = "";
			if (!$this->L->Raw)
				$this->L->CurrentValue = HtmlDecode($this->L->CurrentValue);
			$this->L->EditValue = HtmlEncode($this->L->CurrentValue);
			$this->L->PlaceHolder = RemoveHtml($this->L->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// E
			$this->E->EditAttrs["class"] = "form-control";
			$this->E->EditCustomAttributes = "";
			if (!$this->E->Raw)
				$this->E->CurrentValue = HtmlDecode($this->E->CurrentValue);
			$this->E->EditValue = HtmlEncode($this->E->CurrentValue);
			$this->E->PlaceHolder = RemoveHtml($this->E->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (!$this->M->Raw)
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// LMP
			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			if (!$this->LMP->Raw)
				$this->LMP->CurrentValue = HtmlDecode($this->LMP->CurrentValue);
			$this->LMP->EditValue = HtmlEncode($this->LMP->CurrentValue);
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// EDO
			$this->EDO->EditAttrs["class"] = "form-control";
			$this->EDO->EditCustomAttributes = "";
			if (!$this->EDO->Raw)
				$this->EDO->CurrentValue = HtmlDecode($this->EDO->CurrentValue);
			$this->EDO->EditValue = HtmlEncode($this->EDO->CurrentValue);
			$this->EDO->PlaceHolder = RemoveHtml($this->EDO->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			$this->MenstrualHistory->EditValue = $this->MenstrualHistory->options(TRUE);

			// MaritalHistory
			$this->MaritalHistory->EditAttrs["class"] = "form-control";
			$this->MaritalHistory->EditCustomAttributes = "";
			if (!$this->MaritalHistory->Raw)
				$this->MaritalHistory->CurrentValue = HtmlDecode($this->MaritalHistory->CurrentValue);
			$this->MaritalHistory->EditValue = HtmlEncode($this->MaritalHistory->CurrentValue);
			$this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

			// ObstetricHistory
			$this->ObstetricHistory->EditAttrs["class"] = "form-control";
			$this->ObstetricHistory->EditCustomAttributes = "";
			if (!$this->ObstetricHistory->Raw)
				$this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
			$this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->CurrentValue);
			$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofGDM->EditCustomAttributes = "";
			$this->PreviousHistoryofGDM->EditValue = $this->PreviousHistoryofGDM->options(TRUE);

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->EditAttrs["class"] = "form-control";
			$this->PreviousHistorofPIH->EditCustomAttributes = "";
			$this->PreviousHistorofPIH->EditValue = $this->PreviousHistorofPIH->options(TRUE);

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofIUGR->EditCustomAttributes = "";
			$this->PreviousHistoryofIUGR->EditValue = $this->PreviousHistoryofIUGR->options(TRUE);

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofOligohydramnios->EditCustomAttributes = "";
			$this->PreviousHistoryofOligohydramnios->EditValue = $this->PreviousHistoryofOligohydramnios->options(TRUE);

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofPreterm->EditCustomAttributes = "";
			$this->PreviousHistoryofPreterm->EditValue = $this->PreviousHistoryofPreterm->options(TRUE);

			// G1
			$this->G1->EditAttrs["class"] = "form-control";
			$this->G1->EditCustomAttributes = "";
			if (!$this->G1->Raw)
				$this->G1->CurrentValue = HtmlDecode($this->G1->CurrentValue);
			$this->G1->EditValue = HtmlEncode($this->G1->CurrentValue);
			$this->G1->PlaceHolder = RemoveHtml($this->G1->caption());

			// G2
			$this->G2->EditAttrs["class"] = "form-control";
			$this->G2->EditCustomAttributes = "";
			if (!$this->G2->Raw)
				$this->G2->CurrentValue = HtmlDecode($this->G2->CurrentValue);
			$this->G2->EditValue = HtmlEncode($this->G2->CurrentValue);
			$this->G2->PlaceHolder = RemoveHtml($this->G2->caption());

			// G3
			$this->G3->EditAttrs["class"] = "form-control";
			$this->G3->EditCustomAttributes = "";
			if (!$this->G3->Raw)
				$this->G3->CurrentValue = HtmlDecode($this->G3->CurrentValue);
			$this->G3->EditValue = HtmlEncode($this->G3->CurrentValue);
			$this->G3->PlaceHolder = RemoveHtml($this->G3->caption());

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS1->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS1->Raw)
				$this->DeliveryNDLSCS1->CurrentValue = HtmlDecode($this->DeliveryNDLSCS1->CurrentValue);
			$this->DeliveryNDLSCS1->EditValue = HtmlEncode($this->DeliveryNDLSCS1->CurrentValue);
			$this->DeliveryNDLSCS1->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS1->caption());

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS2->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS2->Raw)
				$this->DeliveryNDLSCS2->CurrentValue = HtmlDecode($this->DeliveryNDLSCS2->CurrentValue);
			$this->DeliveryNDLSCS2->EditValue = HtmlEncode($this->DeliveryNDLSCS2->CurrentValue);
			$this->DeliveryNDLSCS2->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS2->caption());

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS3->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS3->Raw)
				$this->DeliveryNDLSCS3->CurrentValue = HtmlDecode($this->DeliveryNDLSCS3->CurrentValue);
			$this->DeliveryNDLSCS3->EditValue = HtmlEncode($this->DeliveryNDLSCS3->CurrentValue);
			$this->DeliveryNDLSCS3->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS3->caption());

			// BabySexweight1
			$this->BabySexweight1->EditAttrs["class"] = "form-control";
			$this->BabySexweight1->EditCustomAttributes = "";
			if (!$this->BabySexweight1->Raw)
				$this->BabySexweight1->CurrentValue = HtmlDecode($this->BabySexweight1->CurrentValue);
			$this->BabySexweight1->EditValue = HtmlEncode($this->BabySexweight1->CurrentValue);
			$this->BabySexweight1->PlaceHolder = RemoveHtml($this->BabySexweight1->caption());

			// BabySexweight2
			$this->BabySexweight2->EditAttrs["class"] = "form-control";
			$this->BabySexweight2->EditCustomAttributes = "";
			if (!$this->BabySexweight2->Raw)
				$this->BabySexweight2->CurrentValue = HtmlDecode($this->BabySexweight2->CurrentValue);
			$this->BabySexweight2->EditValue = HtmlEncode($this->BabySexweight2->CurrentValue);
			$this->BabySexweight2->PlaceHolder = RemoveHtml($this->BabySexweight2->caption());

			// BabySexweight3
			$this->BabySexweight3->EditAttrs["class"] = "form-control";
			$this->BabySexweight3->EditCustomAttributes = "";
			if (!$this->BabySexweight3->Raw)
				$this->BabySexweight3->CurrentValue = HtmlDecode($this->BabySexweight3->CurrentValue);
			$this->BabySexweight3->EditValue = HtmlEncode($this->BabySexweight3->CurrentValue);
			$this->BabySexweight3->PlaceHolder = RemoveHtml($this->BabySexweight3->caption());

			// PastMedicalHistory
			$this->PastMedicalHistory->EditCustomAttributes = "";
			$this->PastMedicalHistory->EditValue = $this->PastMedicalHistory->options(FALSE);

			// PastSurgicalHistory
			$this->PastSurgicalHistory->EditCustomAttributes = "";
			$this->PastSurgicalHistory->EditValue = $this->PastSurgicalHistory->options(FALSE);

			// FamilyHistory
			$this->FamilyHistory->EditCustomAttributes = "";
			$this->FamilyHistory->EditValue = $this->FamilyHistory->options(FALSE);

			// Viability
			$this->Viability->EditAttrs["class"] = "form-control";
			$this->Viability->EditCustomAttributes = "";
			if (!$this->Viability->Raw)
				$this->Viability->CurrentValue = HtmlDecode($this->Viability->CurrentValue);
			$this->Viability->EditValue = HtmlEncode($this->Viability->CurrentValue);
			$this->Viability->PlaceHolder = RemoveHtml($this->Viability->caption());

			// ViabilityDATE
			$this->ViabilityDATE->EditAttrs["class"] = "form-control";
			$this->ViabilityDATE->EditCustomAttributes = "";
			if (!$this->ViabilityDATE->Raw)
				$this->ViabilityDATE->CurrentValue = HtmlDecode($this->ViabilityDATE->CurrentValue);
			$this->ViabilityDATE->EditValue = HtmlEncode($this->ViabilityDATE->CurrentValue);
			$this->ViabilityDATE->PlaceHolder = RemoveHtml($this->ViabilityDATE->caption());

			// ViabilityREPORT
			$this->ViabilityREPORT->EditAttrs["class"] = "form-control";
			$this->ViabilityREPORT->EditCustomAttributes = "";
			if (!$this->ViabilityREPORT->Raw)
				$this->ViabilityREPORT->CurrentValue = HtmlDecode($this->ViabilityREPORT->CurrentValue);
			$this->ViabilityREPORT->EditValue = HtmlEncode($this->ViabilityREPORT->CurrentValue);
			$this->ViabilityREPORT->PlaceHolder = RemoveHtml($this->ViabilityREPORT->caption());

			// Viability2
			$this->Viability2->EditAttrs["class"] = "form-control";
			$this->Viability2->EditCustomAttributes = "";
			if (!$this->Viability2->Raw)
				$this->Viability2->CurrentValue = HtmlDecode($this->Viability2->CurrentValue);
			$this->Viability2->EditValue = HtmlEncode($this->Viability2->CurrentValue);
			$this->Viability2->PlaceHolder = RemoveHtml($this->Viability2->caption());

			// Viability2DATE
			$this->Viability2DATE->EditAttrs["class"] = "form-control";
			$this->Viability2DATE->EditCustomAttributes = "";
			if (!$this->Viability2DATE->Raw)
				$this->Viability2DATE->CurrentValue = HtmlDecode($this->Viability2DATE->CurrentValue);
			$this->Viability2DATE->EditValue = HtmlEncode($this->Viability2DATE->CurrentValue);
			$this->Viability2DATE->PlaceHolder = RemoveHtml($this->Viability2DATE->caption());

			// Viability2REPORT
			$this->Viability2REPORT->EditAttrs["class"] = "form-control";
			$this->Viability2REPORT->EditCustomAttributes = "";
			if (!$this->Viability2REPORT->Raw)
				$this->Viability2REPORT->CurrentValue = HtmlDecode($this->Viability2REPORT->CurrentValue);
			$this->Viability2REPORT->EditValue = HtmlEncode($this->Viability2REPORT->CurrentValue);
			$this->Viability2REPORT->PlaceHolder = RemoveHtml($this->Viability2REPORT->caption());

			// NTscan
			$this->NTscan->EditAttrs["class"] = "form-control";
			$this->NTscan->EditCustomAttributes = "";
			if (!$this->NTscan->Raw)
				$this->NTscan->CurrentValue = HtmlDecode($this->NTscan->CurrentValue);
			$this->NTscan->EditValue = HtmlEncode($this->NTscan->CurrentValue);
			$this->NTscan->PlaceHolder = RemoveHtml($this->NTscan->caption());

			// NTscanDATE
			$this->NTscanDATE->EditAttrs["class"] = "form-control";
			$this->NTscanDATE->EditCustomAttributes = "";
			if (!$this->NTscanDATE->Raw)
				$this->NTscanDATE->CurrentValue = HtmlDecode($this->NTscanDATE->CurrentValue);
			$this->NTscanDATE->EditValue = HtmlEncode($this->NTscanDATE->CurrentValue);
			$this->NTscanDATE->PlaceHolder = RemoveHtml($this->NTscanDATE->caption());

			// NTscanREPORT
			$this->NTscanREPORT->EditAttrs["class"] = "form-control";
			$this->NTscanREPORT->EditCustomAttributes = "";
			if (!$this->NTscanREPORT->Raw)
				$this->NTscanREPORT->CurrentValue = HtmlDecode($this->NTscanREPORT->CurrentValue);
			$this->NTscanREPORT->EditValue = HtmlEncode($this->NTscanREPORT->CurrentValue);
			$this->NTscanREPORT->PlaceHolder = RemoveHtml($this->NTscanREPORT->caption());

			// EarlyTarget
			$this->EarlyTarget->EditAttrs["class"] = "form-control";
			$this->EarlyTarget->EditCustomAttributes = "";
			if (!$this->EarlyTarget->Raw)
				$this->EarlyTarget->CurrentValue = HtmlDecode($this->EarlyTarget->CurrentValue);
			$this->EarlyTarget->EditValue = HtmlEncode($this->EarlyTarget->CurrentValue);
			$this->EarlyTarget->PlaceHolder = RemoveHtml($this->EarlyTarget->caption());

			// EarlyTargetDATE
			$this->EarlyTargetDATE->EditAttrs["class"] = "form-control";
			$this->EarlyTargetDATE->EditCustomAttributes = "";
			if (!$this->EarlyTargetDATE->Raw)
				$this->EarlyTargetDATE->CurrentValue = HtmlDecode($this->EarlyTargetDATE->CurrentValue);
			$this->EarlyTargetDATE->EditValue = HtmlEncode($this->EarlyTargetDATE->CurrentValue);
			$this->EarlyTargetDATE->PlaceHolder = RemoveHtml($this->EarlyTargetDATE->caption());

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->EditAttrs["class"] = "form-control";
			$this->EarlyTargetREPORT->EditCustomAttributes = "";
			if (!$this->EarlyTargetREPORT->Raw)
				$this->EarlyTargetREPORT->CurrentValue = HtmlDecode($this->EarlyTargetREPORT->CurrentValue);
			$this->EarlyTargetREPORT->EditValue = HtmlEncode($this->EarlyTargetREPORT->CurrentValue);
			$this->EarlyTargetREPORT->PlaceHolder = RemoveHtml($this->EarlyTargetREPORT->caption());

			// Anomaly
			$this->Anomaly->EditAttrs["class"] = "form-control";
			$this->Anomaly->EditCustomAttributes = "";
			if (!$this->Anomaly->Raw)
				$this->Anomaly->CurrentValue = HtmlDecode($this->Anomaly->CurrentValue);
			$this->Anomaly->EditValue = HtmlEncode($this->Anomaly->CurrentValue);
			$this->Anomaly->PlaceHolder = RemoveHtml($this->Anomaly->caption());

			// AnomalyDATE
			$this->AnomalyDATE->EditAttrs["class"] = "form-control";
			$this->AnomalyDATE->EditCustomAttributes = "";
			if (!$this->AnomalyDATE->Raw)
				$this->AnomalyDATE->CurrentValue = HtmlDecode($this->AnomalyDATE->CurrentValue);
			$this->AnomalyDATE->EditValue = HtmlEncode($this->AnomalyDATE->CurrentValue);
			$this->AnomalyDATE->PlaceHolder = RemoveHtml($this->AnomalyDATE->caption());

			// AnomalyREPORT
			$this->AnomalyREPORT->EditAttrs["class"] = "form-control";
			$this->AnomalyREPORT->EditCustomAttributes = "";
			if (!$this->AnomalyREPORT->Raw)
				$this->AnomalyREPORT->CurrentValue = HtmlDecode($this->AnomalyREPORT->CurrentValue);
			$this->AnomalyREPORT->EditValue = HtmlEncode($this->AnomalyREPORT->CurrentValue);
			$this->AnomalyREPORT->PlaceHolder = RemoveHtml($this->AnomalyREPORT->caption());

			// Growth
			$this->Growth->EditAttrs["class"] = "form-control";
			$this->Growth->EditCustomAttributes = "";
			if (!$this->Growth->Raw)
				$this->Growth->CurrentValue = HtmlDecode($this->Growth->CurrentValue);
			$this->Growth->EditValue = HtmlEncode($this->Growth->CurrentValue);
			$this->Growth->PlaceHolder = RemoveHtml($this->Growth->caption());

			// GrowthDATE
			$this->GrowthDATE->EditAttrs["class"] = "form-control";
			$this->GrowthDATE->EditCustomAttributes = "";
			if (!$this->GrowthDATE->Raw)
				$this->GrowthDATE->CurrentValue = HtmlDecode($this->GrowthDATE->CurrentValue);
			$this->GrowthDATE->EditValue = HtmlEncode($this->GrowthDATE->CurrentValue);
			$this->GrowthDATE->PlaceHolder = RemoveHtml($this->GrowthDATE->caption());

			// GrowthREPORT
			$this->GrowthREPORT->EditAttrs["class"] = "form-control";
			$this->GrowthREPORT->EditCustomAttributes = "";
			if (!$this->GrowthREPORT->Raw)
				$this->GrowthREPORT->CurrentValue = HtmlDecode($this->GrowthREPORT->CurrentValue);
			$this->GrowthREPORT->EditValue = HtmlEncode($this->GrowthREPORT->CurrentValue);
			$this->GrowthREPORT->PlaceHolder = RemoveHtml($this->GrowthREPORT->caption());

			// Growth1
			$this->Growth1->EditAttrs["class"] = "form-control";
			$this->Growth1->EditCustomAttributes = "";
			if (!$this->Growth1->Raw)
				$this->Growth1->CurrentValue = HtmlDecode($this->Growth1->CurrentValue);
			$this->Growth1->EditValue = HtmlEncode($this->Growth1->CurrentValue);
			$this->Growth1->PlaceHolder = RemoveHtml($this->Growth1->caption());

			// Growth1DATE
			$this->Growth1DATE->EditAttrs["class"] = "form-control";
			$this->Growth1DATE->EditCustomAttributes = "";
			if (!$this->Growth1DATE->Raw)
				$this->Growth1DATE->CurrentValue = HtmlDecode($this->Growth1DATE->CurrentValue);
			$this->Growth1DATE->EditValue = HtmlEncode($this->Growth1DATE->CurrentValue);
			$this->Growth1DATE->PlaceHolder = RemoveHtml($this->Growth1DATE->caption());

			// Growth1REPORT
			$this->Growth1REPORT->EditAttrs["class"] = "form-control";
			$this->Growth1REPORT->EditCustomAttributes = "";
			if (!$this->Growth1REPORT->Raw)
				$this->Growth1REPORT->CurrentValue = HtmlDecode($this->Growth1REPORT->CurrentValue);
			$this->Growth1REPORT->EditValue = HtmlEncode($this->Growth1REPORT->CurrentValue);
			$this->Growth1REPORT->PlaceHolder = RemoveHtml($this->Growth1REPORT->caption());

			// ANProfile
			$this->ANProfile->EditAttrs["class"] = "form-control";
			$this->ANProfile->EditCustomAttributes = "";
			if (!$this->ANProfile->Raw)
				$this->ANProfile->CurrentValue = HtmlDecode($this->ANProfile->CurrentValue);
			$this->ANProfile->EditValue = HtmlEncode($this->ANProfile->CurrentValue);
			$this->ANProfile->PlaceHolder = RemoveHtml($this->ANProfile->caption());

			// ANProfileDATE
			$this->ANProfileDATE->EditAttrs["class"] = "form-control";
			$this->ANProfileDATE->EditCustomAttributes = "";
			if (!$this->ANProfileDATE->Raw)
				$this->ANProfileDATE->CurrentValue = HtmlDecode($this->ANProfileDATE->CurrentValue);
			$this->ANProfileDATE->EditValue = HtmlEncode($this->ANProfileDATE->CurrentValue);
			$this->ANProfileDATE->PlaceHolder = RemoveHtml($this->ANProfileDATE->caption());

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->EditAttrs["class"] = "form-control";
			$this->ANProfileINHOUSE->EditCustomAttributes = "";
			if (!$this->ANProfileINHOUSE->Raw)
				$this->ANProfileINHOUSE->CurrentValue = HtmlDecode($this->ANProfileINHOUSE->CurrentValue);
			$this->ANProfileINHOUSE->EditValue = HtmlEncode($this->ANProfileINHOUSE->CurrentValue);
			$this->ANProfileINHOUSE->PlaceHolder = RemoveHtml($this->ANProfileINHOUSE->caption());

			// ANProfileREPORT
			$this->ANProfileREPORT->EditAttrs["class"] = "form-control";
			$this->ANProfileREPORT->EditCustomAttributes = "";
			if (!$this->ANProfileREPORT->Raw)
				$this->ANProfileREPORT->CurrentValue = HtmlDecode($this->ANProfileREPORT->CurrentValue);
			$this->ANProfileREPORT->EditValue = HtmlEncode($this->ANProfileREPORT->CurrentValue);
			$this->ANProfileREPORT->PlaceHolder = RemoveHtml($this->ANProfileREPORT->caption());

			// DualMarker
			$this->DualMarker->EditAttrs["class"] = "form-control";
			$this->DualMarker->EditCustomAttributes = "";
			if (!$this->DualMarker->Raw)
				$this->DualMarker->CurrentValue = HtmlDecode($this->DualMarker->CurrentValue);
			$this->DualMarker->EditValue = HtmlEncode($this->DualMarker->CurrentValue);
			$this->DualMarker->PlaceHolder = RemoveHtml($this->DualMarker->caption());

			// DualMarkerDATE
			$this->DualMarkerDATE->EditAttrs["class"] = "form-control";
			$this->DualMarkerDATE->EditCustomAttributes = "";
			if (!$this->DualMarkerDATE->Raw)
				$this->DualMarkerDATE->CurrentValue = HtmlDecode($this->DualMarkerDATE->CurrentValue);
			$this->DualMarkerDATE->EditValue = HtmlEncode($this->DualMarkerDATE->CurrentValue);
			$this->DualMarkerDATE->PlaceHolder = RemoveHtml($this->DualMarkerDATE->caption());

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->EditAttrs["class"] = "form-control";
			$this->DualMarkerINHOUSE->EditCustomAttributes = "";
			if (!$this->DualMarkerINHOUSE->Raw)
				$this->DualMarkerINHOUSE->CurrentValue = HtmlDecode($this->DualMarkerINHOUSE->CurrentValue);
			$this->DualMarkerINHOUSE->EditValue = HtmlEncode($this->DualMarkerINHOUSE->CurrentValue);
			$this->DualMarkerINHOUSE->PlaceHolder = RemoveHtml($this->DualMarkerINHOUSE->caption());

			// DualMarkerREPORT
			$this->DualMarkerREPORT->EditAttrs["class"] = "form-control";
			$this->DualMarkerREPORT->EditCustomAttributes = "";
			if (!$this->DualMarkerREPORT->Raw)
				$this->DualMarkerREPORT->CurrentValue = HtmlDecode($this->DualMarkerREPORT->CurrentValue);
			$this->DualMarkerREPORT->EditValue = HtmlEncode($this->DualMarkerREPORT->CurrentValue);
			$this->DualMarkerREPORT->PlaceHolder = RemoveHtml($this->DualMarkerREPORT->caption());

			// Quadruple
			$this->Quadruple->EditAttrs["class"] = "form-control";
			$this->Quadruple->EditCustomAttributes = "";
			if (!$this->Quadruple->Raw)
				$this->Quadruple->CurrentValue = HtmlDecode($this->Quadruple->CurrentValue);
			$this->Quadruple->EditValue = HtmlEncode($this->Quadruple->CurrentValue);
			$this->Quadruple->PlaceHolder = RemoveHtml($this->Quadruple->caption());

			// QuadrupleDATE
			$this->QuadrupleDATE->EditAttrs["class"] = "form-control";
			$this->QuadrupleDATE->EditCustomAttributes = "";
			if (!$this->QuadrupleDATE->Raw)
				$this->QuadrupleDATE->CurrentValue = HtmlDecode($this->QuadrupleDATE->CurrentValue);
			$this->QuadrupleDATE->EditValue = HtmlEncode($this->QuadrupleDATE->CurrentValue);
			$this->QuadrupleDATE->PlaceHolder = RemoveHtml($this->QuadrupleDATE->caption());

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->EditAttrs["class"] = "form-control";
			$this->QuadrupleINHOUSE->EditCustomAttributes = "";
			if (!$this->QuadrupleINHOUSE->Raw)
				$this->QuadrupleINHOUSE->CurrentValue = HtmlDecode($this->QuadrupleINHOUSE->CurrentValue);
			$this->QuadrupleINHOUSE->EditValue = HtmlEncode($this->QuadrupleINHOUSE->CurrentValue);
			$this->QuadrupleINHOUSE->PlaceHolder = RemoveHtml($this->QuadrupleINHOUSE->caption());

			// QuadrupleREPORT
			$this->QuadrupleREPORT->EditAttrs["class"] = "form-control";
			$this->QuadrupleREPORT->EditCustomAttributes = "";
			if (!$this->QuadrupleREPORT->Raw)
				$this->QuadrupleREPORT->CurrentValue = HtmlDecode($this->QuadrupleREPORT->CurrentValue);
			$this->QuadrupleREPORT->EditValue = HtmlEncode($this->QuadrupleREPORT->CurrentValue);
			$this->QuadrupleREPORT->PlaceHolder = RemoveHtml($this->QuadrupleREPORT->caption());

			// A5month
			$this->A5month->EditAttrs["class"] = "form-control";
			$this->A5month->EditCustomAttributes = "";
			if (!$this->A5month->Raw)
				$this->A5month->CurrentValue = HtmlDecode($this->A5month->CurrentValue);
			$this->A5month->EditValue = HtmlEncode($this->A5month->CurrentValue);
			$this->A5month->PlaceHolder = RemoveHtml($this->A5month->caption());

			// A5monthDATE
			$this->A5monthDATE->EditAttrs["class"] = "form-control";
			$this->A5monthDATE->EditCustomAttributes = "";
			if (!$this->A5monthDATE->Raw)
				$this->A5monthDATE->CurrentValue = HtmlDecode($this->A5monthDATE->CurrentValue);
			$this->A5monthDATE->EditValue = HtmlEncode($this->A5monthDATE->CurrentValue);
			$this->A5monthDATE->PlaceHolder = RemoveHtml($this->A5monthDATE->caption());

			// A5monthINHOUSE
			$this->A5monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A5monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A5monthINHOUSE->Raw)
				$this->A5monthINHOUSE->CurrentValue = HtmlDecode($this->A5monthINHOUSE->CurrentValue);
			$this->A5monthINHOUSE->EditValue = HtmlEncode($this->A5monthINHOUSE->CurrentValue);
			$this->A5monthINHOUSE->PlaceHolder = RemoveHtml($this->A5monthINHOUSE->caption());

			// A5monthREPORT
			$this->A5monthREPORT->EditAttrs["class"] = "form-control";
			$this->A5monthREPORT->EditCustomAttributes = "";
			if (!$this->A5monthREPORT->Raw)
				$this->A5monthREPORT->CurrentValue = HtmlDecode($this->A5monthREPORT->CurrentValue);
			$this->A5monthREPORT->EditValue = HtmlEncode($this->A5monthREPORT->CurrentValue);
			$this->A5monthREPORT->PlaceHolder = RemoveHtml($this->A5monthREPORT->caption());

			// A7month
			$this->A7month->EditAttrs["class"] = "form-control";
			$this->A7month->EditCustomAttributes = "";
			if (!$this->A7month->Raw)
				$this->A7month->CurrentValue = HtmlDecode($this->A7month->CurrentValue);
			$this->A7month->EditValue = HtmlEncode($this->A7month->CurrentValue);
			$this->A7month->PlaceHolder = RemoveHtml($this->A7month->caption());

			// A7monthDATE
			$this->A7monthDATE->EditAttrs["class"] = "form-control";
			$this->A7monthDATE->EditCustomAttributes = "";
			if (!$this->A7monthDATE->Raw)
				$this->A7monthDATE->CurrentValue = HtmlDecode($this->A7monthDATE->CurrentValue);
			$this->A7monthDATE->EditValue = HtmlEncode($this->A7monthDATE->CurrentValue);
			$this->A7monthDATE->PlaceHolder = RemoveHtml($this->A7monthDATE->caption());

			// A7monthINHOUSE
			$this->A7monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A7monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A7monthINHOUSE->Raw)
				$this->A7monthINHOUSE->CurrentValue = HtmlDecode($this->A7monthINHOUSE->CurrentValue);
			$this->A7monthINHOUSE->EditValue = HtmlEncode($this->A7monthINHOUSE->CurrentValue);
			$this->A7monthINHOUSE->PlaceHolder = RemoveHtml($this->A7monthINHOUSE->caption());

			// A7monthREPORT
			$this->A7monthREPORT->EditAttrs["class"] = "form-control";
			$this->A7monthREPORT->EditCustomAttributes = "";
			if (!$this->A7monthREPORT->Raw)
				$this->A7monthREPORT->CurrentValue = HtmlDecode($this->A7monthREPORT->CurrentValue);
			$this->A7monthREPORT->EditValue = HtmlEncode($this->A7monthREPORT->CurrentValue);
			$this->A7monthREPORT->PlaceHolder = RemoveHtml($this->A7monthREPORT->caption());

			// A9month
			$this->A9month->EditAttrs["class"] = "form-control";
			$this->A9month->EditCustomAttributes = "";
			if (!$this->A9month->Raw)
				$this->A9month->CurrentValue = HtmlDecode($this->A9month->CurrentValue);
			$this->A9month->EditValue = HtmlEncode($this->A9month->CurrentValue);
			$this->A9month->PlaceHolder = RemoveHtml($this->A9month->caption());

			// A9monthDATE
			$this->A9monthDATE->EditAttrs["class"] = "form-control";
			$this->A9monthDATE->EditCustomAttributes = "";
			if (!$this->A9monthDATE->Raw)
				$this->A9monthDATE->CurrentValue = HtmlDecode($this->A9monthDATE->CurrentValue);
			$this->A9monthDATE->EditValue = HtmlEncode($this->A9monthDATE->CurrentValue);
			$this->A9monthDATE->PlaceHolder = RemoveHtml($this->A9monthDATE->caption());

			// A9monthINHOUSE
			$this->A9monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A9monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A9monthINHOUSE->Raw)
				$this->A9monthINHOUSE->CurrentValue = HtmlDecode($this->A9monthINHOUSE->CurrentValue);
			$this->A9monthINHOUSE->EditValue = HtmlEncode($this->A9monthINHOUSE->CurrentValue);
			$this->A9monthINHOUSE->PlaceHolder = RemoveHtml($this->A9monthINHOUSE->caption());

			// A9monthREPORT
			$this->A9monthREPORT->EditAttrs["class"] = "form-control";
			$this->A9monthREPORT->EditCustomAttributes = "";
			if (!$this->A9monthREPORT->Raw)
				$this->A9monthREPORT->CurrentValue = HtmlDecode($this->A9monthREPORT->CurrentValue);
			$this->A9monthREPORT->EditValue = HtmlEncode($this->A9monthREPORT->CurrentValue);
			$this->A9monthREPORT->PlaceHolder = RemoveHtml($this->A9monthREPORT->caption());

			// INJ
			$this->INJ->EditAttrs["class"] = "form-control";
			$this->INJ->EditCustomAttributes = "";
			if (!$this->INJ->Raw)
				$this->INJ->CurrentValue = HtmlDecode($this->INJ->CurrentValue);
			$this->INJ->EditValue = HtmlEncode($this->INJ->CurrentValue);
			$this->INJ->PlaceHolder = RemoveHtml($this->INJ->caption());

			// INJDATE
			$this->INJDATE->EditAttrs["class"] = "form-control";
			$this->INJDATE->EditCustomAttributes = "";
			if (!$this->INJDATE->Raw)
				$this->INJDATE->CurrentValue = HtmlDecode($this->INJDATE->CurrentValue);
			$this->INJDATE->EditValue = HtmlEncode($this->INJDATE->CurrentValue);
			$this->INJDATE->PlaceHolder = RemoveHtml($this->INJDATE->caption());

			// INJINHOUSE
			$this->INJINHOUSE->EditAttrs["class"] = "form-control";
			$this->INJINHOUSE->EditCustomAttributes = "";
			if (!$this->INJINHOUSE->Raw)
				$this->INJINHOUSE->CurrentValue = HtmlDecode($this->INJINHOUSE->CurrentValue);
			$this->INJINHOUSE->EditValue = HtmlEncode($this->INJINHOUSE->CurrentValue);
			$this->INJINHOUSE->PlaceHolder = RemoveHtml($this->INJINHOUSE->caption());

			// INJREPORT
			$this->INJREPORT->EditAttrs["class"] = "form-control";
			$this->INJREPORT->EditCustomAttributes = "";
			if (!$this->INJREPORT->Raw)
				$this->INJREPORT->CurrentValue = HtmlDecode($this->INJREPORT->CurrentValue);
			$this->INJREPORT->EditValue = HtmlEncode($this->INJREPORT->CurrentValue);
			$this->INJREPORT->PlaceHolder = RemoveHtml($this->INJREPORT->caption());

			// Bleeding
			$this->Bleeding->EditCustomAttributes = "";
			$this->Bleeding->EditValue = $this->Bleeding->options(FALSE);

			// Hypothyroidism
			$this->Hypothyroidism->EditAttrs["class"] = "form-control";
			$this->Hypothyroidism->EditCustomAttributes = "";
			if (!$this->Hypothyroidism->Raw)
				$this->Hypothyroidism->CurrentValue = HtmlDecode($this->Hypothyroidism->CurrentValue);
			$this->Hypothyroidism->EditValue = HtmlEncode($this->Hypothyroidism->CurrentValue);
			$this->Hypothyroidism->PlaceHolder = RemoveHtml($this->Hypothyroidism->caption());

			// PICMENumber
			$this->PICMENumber->EditAttrs["class"] = "form-control";
			$this->PICMENumber->EditCustomAttributes = "";
			if (!$this->PICMENumber->Raw)
				$this->PICMENumber->CurrentValue = HtmlDecode($this->PICMENumber->CurrentValue);
			$this->PICMENumber->EditValue = HtmlEncode($this->PICMENumber->CurrentValue);
			$this->PICMENumber->PlaceHolder = RemoveHtml($this->PICMENumber->caption());

			// Outcome
			$this->Outcome->EditAttrs["class"] = "form-control";
			$this->Outcome->EditCustomAttributes = "";
			if (!$this->Outcome->Raw)
				$this->Outcome->CurrentValue = HtmlDecode($this->Outcome->CurrentValue);
			$this->Outcome->EditValue = HtmlEncode($this->Outcome->CurrentValue);
			$this->Outcome->PlaceHolder = RemoveHtml($this->Outcome->caption());

			// DateofAdmission
			$this->DateofAdmission->EditAttrs["class"] = "form-control";
			$this->DateofAdmission->EditCustomAttributes = "";
			if (!$this->DateofAdmission->Raw)
				$this->DateofAdmission->CurrentValue = HtmlDecode($this->DateofAdmission->CurrentValue);
			$this->DateofAdmission->EditValue = HtmlEncode($this->DateofAdmission->CurrentValue);
			$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

			// DateodProcedure
			$this->DateodProcedure->EditAttrs["class"] = "form-control";
			$this->DateodProcedure->EditCustomAttributes = "";
			if (!$this->DateodProcedure->Raw)
				$this->DateodProcedure->CurrentValue = HtmlDecode($this->DateodProcedure->CurrentValue);
			$this->DateodProcedure->EditValue = HtmlEncode($this->DateodProcedure->CurrentValue);
			$this->DateodProcedure->PlaceHolder = RemoveHtml($this->DateodProcedure->caption());

			// Miscarriage
			$this->Miscarriage->EditAttrs["class"] = "form-control";
			$this->Miscarriage->EditCustomAttributes = "";
			$this->Miscarriage->EditValue = $this->Miscarriage->options(TRUE);

			// ModeOfDelivery
			$this->ModeOfDelivery->EditAttrs["class"] = "form-control";
			$this->ModeOfDelivery->EditCustomAttributes = "";
			$this->ModeOfDelivery->EditValue = $this->ModeOfDelivery->options(TRUE);

			// ND
			$this->ND->EditAttrs["class"] = "form-control";
			$this->ND->EditCustomAttributes = "";
			if (!$this->ND->Raw)
				$this->ND->CurrentValue = HtmlDecode($this->ND->CurrentValue);
			$this->ND->EditValue = HtmlEncode($this->ND->CurrentValue);
			$this->ND->PlaceHolder = RemoveHtml($this->ND->caption());

			// NDS
			$this->NDS->EditAttrs["class"] = "form-control";
			$this->NDS->EditCustomAttributes = "";
			$this->NDS->EditValue = $this->NDS->options(TRUE);

			// NDP
			$this->NDP->EditAttrs["class"] = "form-control";
			$this->NDP->EditCustomAttributes = "";
			$this->NDP->EditValue = $this->NDP->options(TRUE);

			// Vaccum
			$this->Vaccum->EditAttrs["class"] = "form-control";
			$this->Vaccum->EditCustomAttributes = "";
			if (!$this->Vaccum->Raw)
				$this->Vaccum->CurrentValue = HtmlDecode($this->Vaccum->CurrentValue);
			$this->Vaccum->EditValue = HtmlEncode($this->Vaccum->CurrentValue);
			$this->Vaccum->PlaceHolder = RemoveHtml($this->Vaccum->caption());

			// VaccumS
			$this->VaccumS->EditAttrs["class"] = "form-control";
			$this->VaccumS->EditCustomAttributes = "";
			$this->VaccumS->EditValue = $this->VaccumS->options(TRUE);

			// VaccumP
			$this->VaccumP->EditAttrs["class"] = "form-control";
			$this->VaccumP->EditCustomAttributes = "";
			$this->VaccumP->EditValue = $this->VaccumP->options(TRUE);

			// Forceps
			$this->Forceps->EditAttrs["class"] = "form-control";
			$this->Forceps->EditCustomAttributes = "";
			if (!$this->Forceps->Raw)
				$this->Forceps->CurrentValue = HtmlDecode($this->Forceps->CurrentValue);
			$this->Forceps->EditValue = HtmlEncode($this->Forceps->CurrentValue);
			$this->Forceps->PlaceHolder = RemoveHtml($this->Forceps->caption());

			// ForcepsS
			$this->ForcepsS->EditAttrs["class"] = "form-control";
			$this->ForcepsS->EditCustomAttributes = "";
			$this->ForcepsS->EditValue = $this->ForcepsS->options(TRUE);

			// ForcepsP
			$this->ForcepsP->EditAttrs["class"] = "form-control";
			$this->ForcepsP->EditCustomAttributes = "";
			$this->ForcepsP->EditValue = $this->ForcepsP->options(TRUE);

			// Elective
			$this->Elective->EditAttrs["class"] = "form-control";
			$this->Elective->EditCustomAttributes = "";
			if (!$this->Elective->Raw)
				$this->Elective->CurrentValue = HtmlDecode($this->Elective->CurrentValue);
			$this->Elective->EditValue = HtmlEncode($this->Elective->CurrentValue);
			$this->Elective->PlaceHolder = RemoveHtml($this->Elective->caption());

			// ElectiveS
			$this->ElectiveS->EditAttrs["class"] = "form-control";
			$this->ElectiveS->EditCustomAttributes = "";
			$this->ElectiveS->EditValue = $this->ElectiveS->options(TRUE);

			// ElectiveP
			$this->ElectiveP->EditAttrs["class"] = "form-control";
			$this->ElectiveP->EditCustomAttributes = "";
			$this->ElectiveP->EditValue = $this->ElectiveP->options(TRUE);

			// Emergency
			$this->Emergency->EditAttrs["class"] = "form-control";
			$this->Emergency->EditCustomAttributes = "";
			if (!$this->Emergency->Raw)
				$this->Emergency->CurrentValue = HtmlDecode($this->Emergency->CurrentValue);
			$this->Emergency->EditValue = HtmlEncode($this->Emergency->CurrentValue);
			$this->Emergency->PlaceHolder = RemoveHtml($this->Emergency->caption());

			// EmergencyS
			$this->EmergencyS->EditAttrs["class"] = "form-control";
			$this->EmergencyS->EditCustomAttributes = "";
			$this->EmergencyS->EditValue = $this->EmergencyS->options(TRUE);

			// EmergencyP
			$this->EmergencyP->EditAttrs["class"] = "form-control";
			$this->EmergencyP->EditCustomAttributes = "";
			$this->EmergencyP->EditValue = $this->EmergencyP->options(TRUE);

			// Maturity
			$this->Maturity->EditAttrs["class"] = "form-control";
			$this->Maturity->EditCustomAttributes = "";
			$this->Maturity->EditValue = $this->Maturity->options(TRUE);

			// Baby1
			$this->Baby1->EditAttrs["class"] = "form-control";
			$this->Baby1->EditCustomAttributes = "";
			if (!$this->Baby1->Raw)
				$this->Baby1->CurrentValue = HtmlDecode($this->Baby1->CurrentValue);
			$this->Baby1->EditValue = HtmlEncode($this->Baby1->CurrentValue);
			$this->Baby1->PlaceHolder = RemoveHtml($this->Baby1->caption());

			// Baby2
			$this->Baby2->EditAttrs["class"] = "form-control";
			$this->Baby2->EditCustomAttributes = "";
			if (!$this->Baby2->Raw)
				$this->Baby2->CurrentValue = HtmlDecode($this->Baby2->CurrentValue);
			$this->Baby2->EditValue = HtmlEncode($this->Baby2->CurrentValue);
			$this->Baby2->PlaceHolder = RemoveHtml($this->Baby2->caption());

			// sex1
			$this->sex1->EditAttrs["class"] = "form-control";
			$this->sex1->EditCustomAttributes = "";
			if (!$this->sex1->Raw)
				$this->sex1->CurrentValue = HtmlDecode($this->sex1->CurrentValue);
			$this->sex1->EditValue = HtmlEncode($this->sex1->CurrentValue);
			$this->sex1->PlaceHolder = RemoveHtml($this->sex1->caption());

			// sex2
			$this->sex2->EditAttrs["class"] = "form-control";
			$this->sex2->EditCustomAttributes = "";
			if (!$this->sex2->Raw)
				$this->sex2->CurrentValue = HtmlDecode($this->sex2->CurrentValue);
			$this->sex2->EditValue = HtmlEncode($this->sex2->CurrentValue);
			$this->sex2->PlaceHolder = RemoveHtml($this->sex2->caption());

			// weight1
			$this->weight1->EditAttrs["class"] = "form-control";
			$this->weight1->EditCustomAttributes = "";
			if (!$this->weight1->Raw)
				$this->weight1->CurrentValue = HtmlDecode($this->weight1->CurrentValue);
			$this->weight1->EditValue = HtmlEncode($this->weight1->CurrentValue);
			$this->weight1->PlaceHolder = RemoveHtml($this->weight1->caption());

			// weight2
			$this->weight2->EditAttrs["class"] = "form-control";
			$this->weight2->EditCustomAttributes = "";
			if (!$this->weight2->Raw)
				$this->weight2->CurrentValue = HtmlDecode($this->weight2->CurrentValue);
			$this->weight2->EditValue = HtmlEncode($this->weight2->CurrentValue);
			$this->weight2->PlaceHolder = RemoveHtml($this->weight2->caption());

			// NICU1
			$this->NICU1->EditAttrs["class"] = "form-control";
			$this->NICU1->EditCustomAttributes = "";
			if (!$this->NICU1->Raw)
				$this->NICU1->CurrentValue = HtmlDecode($this->NICU1->CurrentValue);
			$this->NICU1->EditValue = HtmlEncode($this->NICU1->CurrentValue);
			$this->NICU1->PlaceHolder = RemoveHtml($this->NICU1->caption());

			// NICU2
			$this->NICU2->EditAttrs["class"] = "form-control";
			$this->NICU2->EditCustomAttributes = "";
			if (!$this->NICU2->Raw)
				$this->NICU2->CurrentValue = HtmlDecode($this->NICU2->CurrentValue);
			$this->NICU2->EditValue = HtmlEncode($this->NICU2->CurrentValue);
			$this->NICU2->PlaceHolder = RemoveHtml($this->NICU2->caption());

			// Jaundice1
			$this->Jaundice1->EditAttrs["class"] = "form-control";
			$this->Jaundice1->EditCustomAttributes = "";
			if (!$this->Jaundice1->Raw)
				$this->Jaundice1->CurrentValue = HtmlDecode($this->Jaundice1->CurrentValue);
			$this->Jaundice1->EditValue = HtmlEncode($this->Jaundice1->CurrentValue);
			$this->Jaundice1->PlaceHolder = RemoveHtml($this->Jaundice1->caption());

			// Jaundice2
			$this->Jaundice2->EditAttrs["class"] = "form-control";
			$this->Jaundice2->EditCustomAttributes = "";
			if (!$this->Jaundice2->Raw)
				$this->Jaundice2->CurrentValue = HtmlDecode($this->Jaundice2->CurrentValue);
			$this->Jaundice2->EditValue = HtmlEncode($this->Jaundice2->CurrentValue);
			$this->Jaundice2->PlaceHolder = RemoveHtml($this->Jaundice2->caption());

			// Others1
			$this->Others1->EditAttrs["class"] = "form-control";
			$this->Others1->EditCustomAttributes = "";
			if (!$this->Others1->Raw)
				$this->Others1->CurrentValue = HtmlDecode($this->Others1->CurrentValue);
			$this->Others1->EditValue = HtmlEncode($this->Others1->CurrentValue);
			$this->Others1->PlaceHolder = RemoveHtml($this->Others1->caption());

			// Others2
			$this->Others2->EditAttrs["class"] = "form-control";
			$this->Others2->EditCustomAttributes = "";
			if (!$this->Others2->Raw)
				$this->Others2->CurrentValue = HtmlDecode($this->Others2->CurrentValue);
			$this->Others2->EditValue = HtmlEncode($this->Others2->CurrentValue);
			$this->Others2->PlaceHolder = RemoveHtml($this->Others2->caption());

			// SpillOverReasons
			$this->SpillOverReasons->EditAttrs["class"] = "form-control";
			$this->SpillOverReasons->EditCustomAttributes = "";
			$this->SpillOverReasons->EditValue = $this->SpillOverReasons->options(TRUE);

			// ANClosed
			$this->ANClosed->EditCustomAttributes = "";
			$this->ANClosed->EditValue = $this->ANClosed->options(FALSE);

			// ANClosedDATE
			$this->ANClosedDATE->EditAttrs["class"] = "form-control";
			$this->ANClosedDATE->EditCustomAttributes = "";
			if (!$this->ANClosedDATE->Raw)
				$this->ANClosedDATE->CurrentValue = HtmlDecode($this->ANClosedDATE->CurrentValue);
			$this->ANClosedDATE->EditValue = HtmlEncode($this->ANClosedDATE->CurrentValue);
			$this->ANClosedDATE->PlaceHolder = RemoveHtml($this->ANClosedDATE->caption());

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->EditAttrs["class"] = "form-control";
			$this->PastMedicalHistoryOthers->EditCustomAttributes = "";
			if (!$this->PastMedicalHistoryOthers->Raw)
				$this->PastMedicalHistoryOthers->CurrentValue = HtmlDecode($this->PastMedicalHistoryOthers->CurrentValue);
			$this->PastMedicalHistoryOthers->EditValue = HtmlEncode($this->PastMedicalHistoryOthers->CurrentValue);
			$this->PastMedicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastMedicalHistoryOthers->caption());

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->EditAttrs["class"] = "form-control";
			$this->PastSurgicalHistoryOthers->EditCustomAttributes = "";
			if (!$this->PastSurgicalHistoryOthers->Raw)
				$this->PastSurgicalHistoryOthers->CurrentValue = HtmlDecode($this->PastSurgicalHistoryOthers->CurrentValue);
			$this->PastSurgicalHistoryOthers->EditValue = HtmlEncode($this->PastSurgicalHistoryOthers->CurrentValue);
			$this->PastSurgicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastSurgicalHistoryOthers->caption());

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->EditAttrs["class"] = "form-control";
			$this->FamilyHistoryOthers->EditCustomAttributes = "";
			if (!$this->FamilyHistoryOthers->Raw)
				$this->FamilyHistoryOthers->CurrentValue = HtmlDecode($this->FamilyHistoryOthers->CurrentValue);
			$this->FamilyHistoryOthers->EditValue = HtmlEncode($this->FamilyHistoryOthers->CurrentValue);
			$this->FamilyHistoryOthers->PlaceHolder = RemoveHtml($this->FamilyHistoryOthers->caption());

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->EditAttrs["class"] = "form-control";
			$this->PresentPregnancyComplicationsOthers->EditCustomAttributes = "";
			if (!$this->PresentPregnancyComplicationsOthers->Raw)
				$this->PresentPregnancyComplicationsOthers->CurrentValue = HtmlDecode($this->PresentPregnancyComplicationsOthers->CurrentValue);
			$this->PresentPregnancyComplicationsOthers->EditValue = HtmlEncode($this->PresentPregnancyComplicationsOthers->CurrentValue);
			$this->PresentPregnancyComplicationsOthers->PlaceHolder = RemoveHtml($this->PresentPregnancyComplicationsOthers->caption());

			// ETdate
			$this->ETdate->EditAttrs["class"] = "form-control";
			$this->ETdate->EditCustomAttributes = "";
			if (!$this->ETdate->Raw)
				$this->ETdate->CurrentValue = HtmlDecode($this->ETdate->CurrentValue);
			$this->ETdate->EditValue = HtmlEncode($this->ETdate->CurrentValue);
			$this->ETdate->PlaceHolder = RemoveHtml($this->ETdate->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// pid
			$this->pid->LinkCustomAttributes = "";
			$this->pid->HrefValue = "";

			// fid
			$this->fid->LinkCustomAttributes = "";
			$this->fid->HrefValue = "";

			// G
			$this->G->LinkCustomAttributes = "";
			$this->G->HrefValue = "";

			// P
			$this->P->LinkCustomAttributes = "";
			$this->P->HrefValue = "";

			// L
			$this->L->LinkCustomAttributes = "";
			$this->L->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// E
			$this->E->LinkCustomAttributes = "";
			$this->E->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";

			// EDO
			$this->EDO->LinkCustomAttributes = "";
			$this->EDO->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// MaritalHistory
			$this->MaritalHistory->LinkCustomAttributes = "";
			$this->MaritalHistory->HrefValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->LinkCustomAttributes = "";
			$this->PreviousHistoryofGDM->HrefValue = "";

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->LinkCustomAttributes = "";
			$this->PreviousHistorofPIH->HrefValue = "";

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
			$this->PreviousHistoryofIUGR->HrefValue = "";

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
			$this->PreviousHistoryofOligohydramnios->HrefValue = "";

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
			$this->PreviousHistoryofPreterm->HrefValue = "";

			// G1
			$this->G1->LinkCustomAttributes = "";
			$this->G1->HrefValue = "";

			// G2
			$this->G2->LinkCustomAttributes = "";
			$this->G2->HrefValue = "";

			// G3
			$this->G3->LinkCustomAttributes = "";
			$this->G3->HrefValue = "";

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS1->HrefValue = "";

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS2->HrefValue = "";

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS3->HrefValue = "";

			// BabySexweight1
			$this->BabySexweight1->LinkCustomAttributes = "";
			$this->BabySexweight1->HrefValue = "";

			// BabySexweight2
			$this->BabySexweight2->LinkCustomAttributes = "";
			$this->BabySexweight2->HrefValue = "";

			// BabySexweight3
			$this->BabySexweight3->LinkCustomAttributes = "";
			$this->BabySexweight3->HrefValue = "";

			// PastMedicalHistory
			$this->PastMedicalHistory->LinkCustomAttributes = "";
			$this->PastMedicalHistory->HrefValue = "";

			// PastSurgicalHistory
			$this->PastSurgicalHistory->LinkCustomAttributes = "";
			$this->PastSurgicalHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// Viability
			$this->Viability->LinkCustomAttributes = "";
			$this->Viability->HrefValue = "";

			// ViabilityDATE
			$this->ViabilityDATE->LinkCustomAttributes = "";
			$this->ViabilityDATE->HrefValue = "";

			// ViabilityREPORT
			$this->ViabilityREPORT->LinkCustomAttributes = "";
			$this->ViabilityREPORT->HrefValue = "";

			// Viability2
			$this->Viability2->LinkCustomAttributes = "";
			$this->Viability2->HrefValue = "";

			// Viability2DATE
			$this->Viability2DATE->LinkCustomAttributes = "";
			$this->Viability2DATE->HrefValue = "";

			// Viability2REPORT
			$this->Viability2REPORT->LinkCustomAttributes = "";
			$this->Viability2REPORT->HrefValue = "";

			// NTscan
			$this->NTscan->LinkCustomAttributes = "";
			$this->NTscan->HrefValue = "";

			// NTscanDATE
			$this->NTscanDATE->LinkCustomAttributes = "";
			$this->NTscanDATE->HrefValue = "";

			// NTscanREPORT
			$this->NTscanREPORT->LinkCustomAttributes = "";
			$this->NTscanREPORT->HrefValue = "";

			// EarlyTarget
			$this->EarlyTarget->LinkCustomAttributes = "";
			$this->EarlyTarget->HrefValue = "";

			// EarlyTargetDATE
			$this->EarlyTargetDATE->LinkCustomAttributes = "";
			$this->EarlyTargetDATE->HrefValue = "";

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->LinkCustomAttributes = "";
			$this->EarlyTargetREPORT->HrefValue = "";

			// Anomaly
			$this->Anomaly->LinkCustomAttributes = "";
			$this->Anomaly->HrefValue = "";

			// AnomalyDATE
			$this->AnomalyDATE->LinkCustomAttributes = "";
			$this->AnomalyDATE->HrefValue = "";

			// AnomalyREPORT
			$this->AnomalyREPORT->LinkCustomAttributes = "";
			$this->AnomalyREPORT->HrefValue = "";

			// Growth
			$this->Growth->LinkCustomAttributes = "";
			$this->Growth->HrefValue = "";

			// GrowthDATE
			$this->GrowthDATE->LinkCustomAttributes = "";
			$this->GrowthDATE->HrefValue = "";

			// GrowthREPORT
			$this->GrowthREPORT->LinkCustomAttributes = "";
			$this->GrowthREPORT->HrefValue = "";

			// Growth1
			$this->Growth1->LinkCustomAttributes = "";
			$this->Growth1->HrefValue = "";

			// Growth1DATE
			$this->Growth1DATE->LinkCustomAttributes = "";
			$this->Growth1DATE->HrefValue = "";

			// Growth1REPORT
			$this->Growth1REPORT->LinkCustomAttributes = "";
			$this->Growth1REPORT->HrefValue = "";

			// ANProfile
			$this->ANProfile->LinkCustomAttributes = "";
			$this->ANProfile->HrefValue = "";

			// ANProfileDATE
			$this->ANProfileDATE->LinkCustomAttributes = "";
			$this->ANProfileDATE->HrefValue = "";

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->LinkCustomAttributes = "";
			$this->ANProfileINHOUSE->HrefValue = "";

			// ANProfileREPORT
			$this->ANProfileREPORT->LinkCustomAttributes = "";
			$this->ANProfileREPORT->HrefValue = "";

			// DualMarker
			$this->DualMarker->LinkCustomAttributes = "";
			$this->DualMarker->HrefValue = "";

			// DualMarkerDATE
			$this->DualMarkerDATE->LinkCustomAttributes = "";
			$this->DualMarkerDATE->HrefValue = "";

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->LinkCustomAttributes = "";
			$this->DualMarkerINHOUSE->HrefValue = "";

			// DualMarkerREPORT
			$this->DualMarkerREPORT->LinkCustomAttributes = "";
			$this->DualMarkerREPORT->HrefValue = "";

			// Quadruple
			$this->Quadruple->LinkCustomAttributes = "";
			$this->Quadruple->HrefValue = "";

			// QuadrupleDATE
			$this->QuadrupleDATE->LinkCustomAttributes = "";
			$this->QuadrupleDATE->HrefValue = "";

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->LinkCustomAttributes = "";
			$this->QuadrupleINHOUSE->HrefValue = "";

			// QuadrupleREPORT
			$this->QuadrupleREPORT->LinkCustomAttributes = "";
			$this->QuadrupleREPORT->HrefValue = "";

			// A5month
			$this->A5month->LinkCustomAttributes = "";
			$this->A5month->HrefValue = "";

			// A5monthDATE
			$this->A5monthDATE->LinkCustomAttributes = "";
			$this->A5monthDATE->HrefValue = "";

			// A5monthINHOUSE
			$this->A5monthINHOUSE->LinkCustomAttributes = "";
			$this->A5monthINHOUSE->HrefValue = "";

			// A5monthREPORT
			$this->A5monthREPORT->LinkCustomAttributes = "";
			$this->A5monthREPORT->HrefValue = "";

			// A7month
			$this->A7month->LinkCustomAttributes = "";
			$this->A7month->HrefValue = "";

			// A7monthDATE
			$this->A7monthDATE->LinkCustomAttributes = "";
			$this->A7monthDATE->HrefValue = "";

			// A7monthINHOUSE
			$this->A7monthINHOUSE->LinkCustomAttributes = "";
			$this->A7monthINHOUSE->HrefValue = "";

			// A7monthREPORT
			$this->A7monthREPORT->LinkCustomAttributes = "";
			$this->A7monthREPORT->HrefValue = "";

			// A9month
			$this->A9month->LinkCustomAttributes = "";
			$this->A9month->HrefValue = "";

			// A9monthDATE
			$this->A9monthDATE->LinkCustomAttributes = "";
			$this->A9monthDATE->HrefValue = "";

			// A9monthINHOUSE
			$this->A9monthINHOUSE->LinkCustomAttributes = "";
			$this->A9monthINHOUSE->HrefValue = "";

			// A9monthREPORT
			$this->A9monthREPORT->LinkCustomAttributes = "";
			$this->A9monthREPORT->HrefValue = "";

			// INJ
			$this->INJ->LinkCustomAttributes = "";
			$this->INJ->HrefValue = "";

			// INJDATE
			$this->INJDATE->LinkCustomAttributes = "";
			$this->INJDATE->HrefValue = "";

			// INJINHOUSE
			$this->INJINHOUSE->LinkCustomAttributes = "";
			$this->INJINHOUSE->HrefValue = "";

			// INJREPORT
			$this->INJREPORT->LinkCustomAttributes = "";
			$this->INJREPORT->HrefValue = "";

			// Bleeding
			$this->Bleeding->LinkCustomAttributes = "";
			$this->Bleeding->HrefValue = "";

			// Hypothyroidism
			$this->Hypothyroidism->LinkCustomAttributes = "";
			$this->Hypothyroidism->HrefValue = "";

			// PICMENumber
			$this->PICMENumber->LinkCustomAttributes = "";
			$this->PICMENumber->HrefValue = "";

			// Outcome
			$this->Outcome->LinkCustomAttributes = "";
			$this->Outcome->HrefValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";

			// DateodProcedure
			$this->DateodProcedure->LinkCustomAttributes = "";
			$this->DateodProcedure->HrefValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";

			// ModeOfDelivery
			$this->ModeOfDelivery->LinkCustomAttributes = "";
			$this->ModeOfDelivery->HrefValue = "";

			// ND
			$this->ND->LinkCustomAttributes = "";
			$this->ND->HrefValue = "";

			// NDS
			$this->NDS->LinkCustomAttributes = "";
			$this->NDS->HrefValue = "";

			// NDP
			$this->NDP->LinkCustomAttributes = "";
			$this->NDP->HrefValue = "";

			// Vaccum
			$this->Vaccum->LinkCustomAttributes = "";
			$this->Vaccum->HrefValue = "";

			// VaccumS
			$this->VaccumS->LinkCustomAttributes = "";
			$this->VaccumS->HrefValue = "";

			// VaccumP
			$this->VaccumP->LinkCustomAttributes = "";
			$this->VaccumP->HrefValue = "";

			// Forceps
			$this->Forceps->LinkCustomAttributes = "";
			$this->Forceps->HrefValue = "";

			// ForcepsS
			$this->ForcepsS->LinkCustomAttributes = "";
			$this->ForcepsS->HrefValue = "";

			// ForcepsP
			$this->ForcepsP->LinkCustomAttributes = "";
			$this->ForcepsP->HrefValue = "";

			// Elective
			$this->Elective->LinkCustomAttributes = "";
			$this->Elective->HrefValue = "";

			// ElectiveS
			$this->ElectiveS->LinkCustomAttributes = "";
			$this->ElectiveS->HrefValue = "";

			// ElectiveP
			$this->ElectiveP->LinkCustomAttributes = "";
			$this->ElectiveP->HrefValue = "";

			// Emergency
			$this->Emergency->LinkCustomAttributes = "";
			$this->Emergency->HrefValue = "";

			// EmergencyS
			$this->EmergencyS->LinkCustomAttributes = "";
			$this->EmergencyS->HrefValue = "";

			// EmergencyP
			$this->EmergencyP->LinkCustomAttributes = "";
			$this->EmergencyP->HrefValue = "";

			// Maturity
			$this->Maturity->LinkCustomAttributes = "";
			$this->Maturity->HrefValue = "";

			// Baby1
			$this->Baby1->LinkCustomAttributes = "";
			$this->Baby1->HrefValue = "";

			// Baby2
			$this->Baby2->LinkCustomAttributes = "";
			$this->Baby2->HrefValue = "";

			// sex1
			$this->sex1->LinkCustomAttributes = "";
			$this->sex1->HrefValue = "";

			// sex2
			$this->sex2->LinkCustomAttributes = "";
			$this->sex2->HrefValue = "";

			// weight1
			$this->weight1->LinkCustomAttributes = "";
			$this->weight1->HrefValue = "";

			// weight2
			$this->weight2->LinkCustomAttributes = "";
			$this->weight2->HrefValue = "";

			// NICU1
			$this->NICU1->LinkCustomAttributes = "";
			$this->NICU1->HrefValue = "";

			// NICU2
			$this->NICU2->LinkCustomAttributes = "";
			$this->NICU2->HrefValue = "";

			// Jaundice1
			$this->Jaundice1->LinkCustomAttributes = "";
			$this->Jaundice1->HrefValue = "";

			// Jaundice2
			$this->Jaundice2->LinkCustomAttributes = "";
			$this->Jaundice2->HrefValue = "";

			// Others1
			$this->Others1->LinkCustomAttributes = "";
			$this->Others1->HrefValue = "";

			// Others2
			$this->Others2->LinkCustomAttributes = "";
			$this->Others2->HrefValue = "";

			// SpillOverReasons
			$this->SpillOverReasons->LinkCustomAttributes = "";
			$this->SpillOverReasons->HrefValue = "";

			// ANClosed
			$this->ANClosed->LinkCustomAttributes = "";
			$this->ANClosed->HrefValue = "";

			// ANClosedDATE
			$this->ANClosedDATE->LinkCustomAttributes = "";
			$this->ANClosedDATE->HrefValue = "";

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastMedicalHistoryOthers->HrefValue = "";

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastSurgicalHistoryOthers->HrefValue = "";

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->LinkCustomAttributes = "";
			$this->FamilyHistoryOthers->HrefValue = "";

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
			$this->PresentPregnancyComplicationsOthers->HrefValue = "";

			// ETdate
			$this->ETdate->LinkCustomAttributes = "";
			$this->ETdate->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pid
			$this->pid->EditAttrs["class"] = "form-control";
			$this->pid->EditCustomAttributes = "";
			if ($this->pid->getSessionValue() != "") {
				$this->pid->CurrentValue = $this->pid->getSessionValue();
				$this->pid->OldValue = $this->pid->CurrentValue;
				$this->pid->ViewValue = $this->pid->CurrentValue;
				$this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
				$this->pid->ViewCustomAttributes = "";
			} else {
				$this->pid->EditValue = HtmlEncode($this->pid->CurrentValue);
				$this->pid->PlaceHolder = RemoveHtml($this->pid->caption());
			}

			// fid
			$this->fid->EditAttrs["class"] = "form-control";
			$this->fid->EditCustomAttributes = "";
			if ($this->fid->getSessionValue() != "") {
				$this->fid->CurrentValue = $this->fid->getSessionValue();
				$this->fid->OldValue = $this->fid->CurrentValue;
				$this->fid->ViewValue = $this->fid->CurrentValue;
				$this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
				$this->fid->ViewCustomAttributes = "";
			} else {
				$this->fid->EditValue = HtmlEncode($this->fid->CurrentValue);
				$this->fid->PlaceHolder = RemoveHtml($this->fid->caption());
			}

			// G
			$this->G->EditAttrs["class"] = "form-control";
			$this->G->EditCustomAttributes = "";
			if (!$this->G->Raw)
				$this->G->CurrentValue = HtmlDecode($this->G->CurrentValue);
			$this->G->EditValue = HtmlEncode($this->G->CurrentValue);
			$this->G->PlaceHolder = RemoveHtml($this->G->caption());

			// P
			$this->P->EditAttrs["class"] = "form-control";
			$this->P->EditCustomAttributes = "";
			if (!$this->P->Raw)
				$this->P->CurrentValue = HtmlDecode($this->P->CurrentValue);
			$this->P->EditValue = HtmlEncode($this->P->CurrentValue);
			$this->P->PlaceHolder = RemoveHtml($this->P->caption());

			// L
			$this->L->EditAttrs["class"] = "form-control";
			$this->L->EditCustomAttributes = "";
			if (!$this->L->Raw)
				$this->L->CurrentValue = HtmlDecode($this->L->CurrentValue);
			$this->L->EditValue = HtmlEncode($this->L->CurrentValue);
			$this->L->PlaceHolder = RemoveHtml($this->L->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// E
			$this->E->EditAttrs["class"] = "form-control";
			$this->E->EditCustomAttributes = "";
			if (!$this->E->Raw)
				$this->E->CurrentValue = HtmlDecode($this->E->CurrentValue);
			$this->E->EditValue = HtmlEncode($this->E->CurrentValue);
			$this->E->PlaceHolder = RemoveHtml($this->E->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (!$this->M->Raw)
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// LMP
			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			if (!$this->LMP->Raw)
				$this->LMP->CurrentValue = HtmlDecode($this->LMP->CurrentValue);
			$this->LMP->EditValue = HtmlEncode($this->LMP->CurrentValue);
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// EDO
			$this->EDO->EditAttrs["class"] = "form-control";
			$this->EDO->EditCustomAttributes = "";
			if (!$this->EDO->Raw)
				$this->EDO->CurrentValue = HtmlDecode($this->EDO->CurrentValue);
			$this->EDO->EditValue = HtmlEncode($this->EDO->CurrentValue);
			$this->EDO->PlaceHolder = RemoveHtml($this->EDO->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			$this->MenstrualHistory->EditValue = $this->MenstrualHistory->options(TRUE);

			// MaritalHistory
			$this->MaritalHistory->EditAttrs["class"] = "form-control";
			$this->MaritalHistory->EditCustomAttributes = "";
			if (!$this->MaritalHistory->Raw)
				$this->MaritalHistory->CurrentValue = HtmlDecode($this->MaritalHistory->CurrentValue);
			$this->MaritalHistory->EditValue = HtmlEncode($this->MaritalHistory->CurrentValue);
			$this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

			// ObstetricHistory
			$this->ObstetricHistory->EditAttrs["class"] = "form-control";
			$this->ObstetricHistory->EditCustomAttributes = "";
			if (!$this->ObstetricHistory->Raw)
				$this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
			$this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->CurrentValue);
			$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofGDM->EditCustomAttributes = "";
			$this->PreviousHistoryofGDM->EditValue = $this->PreviousHistoryofGDM->options(TRUE);

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->EditAttrs["class"] = "form-control";
			$this->PreviousHistorofPIH->EditCustomAttributes = "";
			$this->PreviousHistorofPIH->EditValue = $this->PreviousHistorofPIH->options(TRUE);

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofIUGR->EditCustomAttributes = "";
			$this->PreviousHistoryofIUGR->EditValue = $this->PreviousHistoryofIUGR->options(TRUE);

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofOligohydramnios->EditCustomAttributes = "";
			$this->PreviousHistoryofOligohydramnios->EditValue = $this->PreviousHistoryofOligohydramnios->options(TRUE);

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->EditAttrs["class"] = "form-control";
			$this->PreviousHistoryofPreterm->EditCustomAttributes = "";
			$this->PreviousHistoryofPreterm->EditValue = $this->PreviousHistoryofPreterm->options(TRUE);

			// G1
			$this->G1->EditAttrs["class"] = "form-control";
			$this->G1->EditCustomAttributes = "";
			if (!$this->G1->Raw)
				$this->G1->CurrentValue = HtmlDecode($this->G1->CurrentValue);
			$this->G1->EditValue = HtmlEncode($this->G1->CurrentValue);
			$this->G1->PlaceHolder = RemoveHtml($this->G1->caption());

			// G2
			$this->G2->EditAttrs["class"] = "form-control";
			$this->G2->EditCustomAttributes = "";
			if (!$this->G2->Raw)
				$this->G2->CurrentValue = HtmlDecode($this->G2->CurrentValue);
			$this->G2->EditValue = HtmlEncode($this->G2->CurrentValue);
			$this->G2->PlaceHolder = RemoveHtml($this->G2->caption());

			// G3
			$this->G3->EditAttrs["class"] = "form-control";
			$this->G3->EditCustomAttributes = "";
			if (!$this->G3->Raw)
				$this->G3->CurrentValue = HtmlDecode($this->G3->CurrentValue);
			$this->G3->EditValue = HtmlEncode($this->G3->CurrentValue);
			$this->G3->PlaceHolder = RemoveHtml($this->G3->caption());

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS1->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS1->Raw)
				$this->DeliveryNDLSCS1->CurrentValue = HtmlDecode($this->DeliveryNDLSCS1->CurrentValue);
			$this->DeliveryNDLSCS1->EditValue = HtmlEncode($this->DeliveryNDLSCS1->CurrentValue);
			$this->DeliveryNDLSCS1->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS1->caption());

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS2->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS2->Raw)
				$this->DeliveryNDLSCS2->CurrentValue = HtmlDecode($this->DeliveryNDLSCS2->CurrentValue);
			$this->DeliveryNDLSCS2->EditValue = HtmlEncode($this->DeliveryNDLSCS2->CurrentValue);
			$this->DeliveryNDLSCS2->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS2->caption());

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->EditAttrs["class"] = "form-control";
			$this->DeliveryNDLSCS3->EditCustomAttributes = "";
			if (!$this->DeliveryNDLSCS3->Raw)
				$this->DeliveryNDLSCS3->CurrentValue = HtmlDecode($this->DeliveryNDLSCS3->CurrentValue);
			$this->DeliveryNDLSCS3->EditValue = HtmlEncode($this->DeliveryNDLSCS3->CurrentValue);
			$this->DeliveryNDLSCS3->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS3->caption());

			// BabySexweight1
			$this->BabySexweight1->EditAttrs["class"] = "form-control";
			$this->BabySexweight1->EditCustomAttributes = "";
			if (!$this->BabySexweight1->Raw)
				$this->BabySexweight1->CurrentValue = HtmlDecode($this->BabySexweight1->CurrentValue);
			$this->BabySexweight1->EditValue = HtmlEncode($this->BabySexweight1->CurrentValue);
			$this->BabySexweight1->PlaceHolder = RemoveHtml($this->BabySexweight1->caption());

			// BabySexweight2
			$this->BabySexweight2->EditAttrs["class"] = "form-control";
			$this->BabySexweight2->EditCustomAttributes = "";
			if (!$this->BabySexweight2->Raw)
				$this->BabySexweight2->CurrentValue = HtmlDecode($this->BabySexweight2->CurrentValue);
			$this->BabySexweight2->EditValue = HtmlEncode($this->BabySexweight2->CurrentValue);
			$this->BabySexweight2->PlaceHolder = RemoveHtml($this->BabySexweight2->caption());

			// BabySexweight3
			$this->BabySexweight3->EditAttrs["class"] = "form-control";
			$this->BabySexweight3->EditCustomAttributes = "";
			if (!$this->BabySexweight3->Raw)
				$this->BabySexweight3->CurrentValue = HtmlDecode($this->BabySexweight3->CurrentValue);
			$this->BabySexweight3->EditValue = HtmlEncode($this->BabySexweight3->CurrentValue);
			$this->BabySexweight3->PlaceHolder = RemoveHtml($this->BabySexweight3->caption());

			// PastMedicalHistory
			$this->PastMedicalHistory->EditCustomAttributes = "";
			$this->PastMedicalHistory->EditValue = $this->PastMedicalHistory->options(FALSE);

			// PastSurgicalHistory
			$this->PastSurgicalHistory->EditCustomAttributes = "";
			$this->PastSurgicalHistory->EditValue = $this->PastSurgicalHistory->options(FALSE);

			// FamilyHistory
			$this->FamilyHistory->EditCustomAttributes = "";
			$this->FamilyHistory->EditValue = $this->FamilyHistory->options(FALSE);

			// Viability
			$this->Viability->EditAttrs["class"] = "form-control";
			$this->Viability->EditCustomAttributes = "";
			if (!$this->Viability->Raw)
				$this->Viability->CurrentValue = HtmlDecode($this->Viability->CurrentValue);
			$this->Viability->EditValue = HtmlEncode($this->Viability->CurrentValue);
			$this->Viability->PlaceHolder = RemoveHtml($this->Viability->caption());

			// ViabilityDATE
			$this->ViabilityDATE->EditAttrs["class"] = "form-control";
			$this->ViabilityDATE->EditCustomAttributes = "";
			if (!$this->ViabilityDATE->Raw)
				$this->ViabilityDATE->CurrentValue = HtmlDecode($this->ViabilityDATE->CurrentValue);
			$this->ViabilityDATE->EditValue = HtmlEncode($this->ViabilityDATE->CurrentValue);
			$this->ViabilityDATE->PlaceHolder = RemoveHtml($this->ViabilityDATE->caption());

			// ViabilityREPORT
			$this->ViabilityREPORT->EditAttrs["class"] = "form-control";
			$this->ViabilityREPORT->EditCustomAttributes = "";
			if (!$this->ViabilityREPORT->Raw)
				$this->ViabilityREPORT->CurrentValue = HtmlDecode($this->ViabilityREPORT->CurrentValue);
			$this->ViabilityREPORT->EditValue = HtmlEncode($this->ViabilityREPORT->CurrentValue);
			$this->ViabilityREPORT->PlaceHolder = RemoveHtml($this->ViabilityREPORT->caption());

			// Viability2
			$this->Viability2->EditAttrs["class"] = "form-control";
			$this->Viability2->EditCustomAttributes = "";
			if (!$this->Viability2->Raw)
				$this->Viability2->CurrentValue = HtmlDecode($this->Viability2->CurrentValue);
			$this->Viability2->EditValue = HtmlEncode($this->Viability2->CurrentValue);
			$this->Viability2->PlaceHolder = RemoveHtml($this->Viability2->caption());

			// Viability2DATE
			$this->Viability2DATE->EditAttrs["class"] = "form-control";
			$this->Viability2DATE->EditCustomAttributes = "";
			if (!$this->Viability2DATE->Raw)
				$this->Viability2DATE->CurrentValue = HtmlDecode($this->Viability2DATE->CurrentValue);
			$this->Viability2DATE->EditValue = HtmlEncode($this->Viability2DATE->CurrentValue);
			$this->Viability2DATE->PlaceHolder = RemoveHtml($this->Viability2DATE->caption());

			// Viability2REPORT
			$this->Viability2REPORT->EditAttrs["class"] = "form-control";
			$this->Viability2REPORT->EditCustomAttributes = "";
			if (!$this->Viability2REPORT->Raw)
				$this->Viability2REPORT->CurrentValue = HtmlDecode($this->Viability2REPORT->CurrentValue);
			$this->Viability2REPORT->EditValue = HtmlEncode($this->Viability2REPORT->CurrentValue);
			$this->Viability2REPORT->PlaceHolder = RemoveHtml($this->Viability2REPORT->caption());

			// NTscan
			$this->NTscan->EditAttrs["class"] = "form-control";
			$this->NTscan->EditCustomAttributes = "";
			if (!$this->NTscan->Raw)
				$this->NTscan->CurrentValue = HtmlDecode($this->NTscan->CurrentValue);
			$this->NTscan->EditValue = HtmlEncode($this->NTscan->CurrentValue);
			$this->NTscan->PlaceHolder = RemoveHtml($this->NTscan->caption());

			// NTscanDATE
			$this->NTscanDATE->EditAttrs["class"] = "form-control";
			$this->NTscanDATE->EditCustomAttributes = "";
			if (!$this->NTscanDATE->Raw)
				$this->NTscanDATE->CurrentValue = HtmlDecode($this->NTscanDATE->CurrentValue);
			$this->NTscanDATE->EditValue = HtmlEncode($this->NTscanDATE->CurrentValue);
			$this->NTscanDATE->PlaceHolder = RemoveHtml($this->NTscanDATE->caption());

			// NTscanREPORT
			$this->NTscanREPORT->EditAttrs["class"] = "form-control";
			$this->NTscanREPORT->EditCustomAttributes = "";
			if (!$this->NTscanREPORT->Raw)
				$this->NTscanREPORT->CurrentValue = HtmlDecode($this->NTscanREPORT->CurrentValue);
			$this->NTscanREPORT->EditValue = HtmlEncode($this->NTscanREPORT->CurrentValue);
			$this->NTscanREPORT->PlaceHolder = RemoveHtml($this->NTscanREPORT->caption());

			// EarlyTarget
			$this->EarlyTarget->EditAttrs["class"] = "form-control";
			$this->EarlyTarget->EditCustomAttributes = "";
			if (!$this->EarlyTarget->Raw)
				$this->EarlyTarget->CurrentValue = HtmlDecode($this->EarlyTarget->CurrentValue);
			$this->EarlyTarget->EditValue = HtmlEncode($this->EarlyTarget->CurrentValue);
			$this->EarlyTarget->PlaceHolder = RemoveHtml($this->EarlyTarget->caption());

			// EarlyTargetDATE
			$this->EarlyTargetDATE->EditAttrs["class"] = "form-control";
			$this->EarlyTargetDATE->EditCustomAttributes = "";
			if (!$this->EarlyTargetDATE->Raw)
				$this->EarlyTargetDATE->CurrentValue = HtmlDecode($this->EarlyTargetDATE->CurrentValue);
			$this->EarlyTargetDATE->EditValue = HtmlEncode($this->EarlyTargetDATE->CurrentValue);
			$this->EarlyTargetDATE->PlaceHolder = RemoveHtml($this->EarlyTargetDATE->caption());

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->EditAttrs["class"] = "form-control";
			$this->EarlyTargetREPORT->EditCustomAttributes = "";
			if (!$this->EarlyTargetREPORT->Raw)
				$this->EarlyTargetREPORT->CurrentValue = HtmlDecode($this->EarlyTargetREPORT->CurrentValue);
			$this->EarlyTargetREPORT->EditValue = HtmlEncode($this->EarlyTargetREPORT->CurrentValue);
			$this->EarlyTargetREPORT->PlaceHolder = RemoveHtml($this->EarlyTargetREPORT->caption());

			// Anomaly
			$this->Anomaly->EditAttrs["class"] = "form-control";
			$this->Anomaly->EditCustomAttributes = "";
			if (!$this->Anomaly->Raw)
				$this->Anomaly->CurrentValue = HtmlDecode($this->Anomaly->CurrentValue);
			$this->Anomaly->EditValue = HtmlEncode($this->Anomaly->CurrentValue);
			$this->Anomaly->PlaceHolder = RemoveHtml($this->Anomaly->caption());

			// AnomalyDATE
			$this->AnomalyDATE->EditAttrs["class"] = "form-control";
			$this->AnomalyDATE->EditCustomAttributes = "";
			if (!$this->AnomalyDATE->Raw)
				$this->AnomalyDATE->CurrentValue = HtmlDecode($this->AnomalyDATE->CurrentValue);
			$this->AnomalyDATE->EditValue = HtmlEncode($this->AnomalyDATE->CurrentValue);
			$this->AnomalyDATE->PlaceHolder = RemoveHtml($this->AnomalyDATE->caption());

			// AnomalyREPORT
			$this->AnomalyREPORT->EditAttrs["class"] = "form-control";
			$this->AnomalyREPORT->EditCustomAttributes = "";
			if (!$this->AnomalyREPORT->Raw)
				$this->AnomalyREPORT->CurrentValue = HtmlDecode($this->AnomalyREPORT->CurrentValue);
			$this->AnomalyREPORT->EditValue = HtmlEncode($this->AnomalyREPORT->CurrentValue);
			$this->AnomalyREPORT->PlaceHolder = RemoveHtml($this->AnomalyREPORT->caption());

			// Growth
			$this->Growth->EditAttrs["class"] = "form-control";
			$this->Growth->EditCustomAttributes = "";
			if (!$this->Growth->Raw)
				$this->Growth->CurrentValue = HtmlDecode($this->Growth->CurrentValue);
			$this->Growth->EditValue = HtmlEncode($this->Growth->CurrentValue);
			$this->Growth->PlaceHolder = RemoveHtml($this->Growth->caption());

			// GrowthDATE
			$this->GrowthDATE->EditAttrs["class"] = "form-control";
			$this->GrowthDATE->EditCustomAttributes = "";
			if (!$this->GrowthDATE->Raw)
				$this->GrowthDATE->CurrentValue = HtmlDecode($this->GrowthDATE->CurrentValue);
			$this->GrowthDATE->EditValue = HtmlEncode($this->GrowthDATE->CurrentValue);
			$this->GrowthDATE->PlaceHolder = RemoveHtml($this->GrowthDATE->caption());

			// GrowthREPORT
			$this->GrowthREPORT->EditAttrs["class"] = "form-control";
			$this->GrowthREPORT->EditCustomAttributes = "";
			if (!$this->GrowthREPORT->Raw)
				$this->GrowthREPORT->CurrentValue = HtmlDecode($this->GrowthREPORT->CurrentValue);
			$this->GrowthREPORT->EditValue = HtmlEncode($this->GrowthREPORT->CurrentValue);
			$this->GrowthREPORT->PlaceHolder = RemoveHtml($this->GrowthREPORT->caption());

			// Growth1
			$this->Growth1->EditAttrs["class"] = "form-control";
			$this->Growth1->EditCustomAttributes = "";
			if (!$this->Growth1->Raw)
				$this->Growth1->CurrentValue = HtmlDecode($this->Growth1->CurrentValue);
			$this->Growth1->EditValue = HtmlEncode($this->Growth1->CurrentValue);
			$this->Growth1->PlaceHolder = RemoveHtml($this->Growth1->caption());

			// Growth1DATE
			$this->Growth1DATE->EditAttrs["class"] = "form-control";
			$this->Growth1DATE->EditCustomAttributes = "";
			if (!$this->Growth1DATE->Raw)
				$this->Growth1DATE->CurrentValue = HtmlDecode($this->Growth1DATE->CurrentValue);
			$this->Growth1DATE->EditValue = HtmlEncode($this->Growth1DATE->CurrentValue);
			$this->Growth1DATE->PlaceHolder = RemoveHtml($this->Growth1DATE->caption());

			// Growth1REPORT
			$this->Growth1REPORT->EditAttrs["class"] = "form-control";
			$this->Growth1REPORT->EditCustomAttributes = "";
			if (!$this->Growth1REPORT->Raw)
				$this->Growth1REPORT->CurrentValue = HtmlDecode($this->Growth1REPORT->CurrentValue);
			$this->Growth1REPORT->EditValue = HtmlEncode($this->Growth1REPORT->CurrentValue);
			$this->Growth1REPORT->PlaceHolder = RemoveHtml($this->Growth1REPORT->caption());

			// ANProfile
			$this->ANProfile->EditAttrs["class"] = "form-control";
			$this->ANProfile->EditCustomAttributes = "";
			if (!$this->ANProfile->Raw)
				$this->ANProfile->CurrentValue = HtmlDecode($this->ANProfile->CurrentValue);
			$this->ANProfile->EditValue = HtmlEncode($this->ANProfile->CurrentValue);
			$this->ANProfile->PlaceHolder = RemoveHtml($this->ANProfile->caption());

			// ANProfileDATE
			$this->ANProfileDATE->EditAttrs["class"] = "form-control";
			$this->ANProfileDATE->EditCustomAttributes = "";
			if (!$this->ANProfileDATE->Raw)
				$this->ANProfileDATE->CurrentValue = HtmlDecode($this->ANProfileDATE->CurrentValue);
			$this->ANProfileDATE->EditValue = HtmlEncode($this->ANProfileDATE->CurrentValue);
			$this->ANProfileDATE->PlaceHolder = RemoveHtml($this->ANProfileDATE->caption());

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->EditAttrs["class"] = "form-control";
			$this->ANProfileINHOUSE->EditCustomAttributes = "";
			if (!$this->ANProfileINHOUSE->Raw)
				$this->ANProfileINHOUSE->CurrentValue = HtmlDecode($this->ANProfileINHOUSE->CurrentValue);
			$this->ANProfileINHOUSE->EditValue = HtmlEncode($this->ANProfileINHOUSE->CurrentValue);
			$this->ANProfileINHOUSE->PlaceHolder = RemoveHtml($this->ANProfileINHOUSE->caption());

			// ANProfileREPORT
			$this->ANProfileREPORT->EditAttrs["class"] = "form-control";
			$this->ANProfileREPORT->EditCustomAttributes = "";
			if (!$this->ANProfileREPORT->Raw)
				$this->ANProfileREPORT->CurrentValue = HtmlDecode($this->ANProfileREPORT->CurrentValue);
			$this->ANProfileREPORT->EditValue = HtmlEncode($this->ANProfileREPORT->CurrentValue);
			$this->ANProfileREPORT->PlaceHolder = RemoveHtml($this->ANProfileREPORT->caption());

			// DualMarker
			$this->DualMarker->EditAttrs["class"] = "form-control";
			$this->DualMarker->EditCustomAttributes = "";
			if (!$this->DualMarker->Raw)
				$this->DualMarker->CurrentValue = HtmlDecode($this->DualMarker->CurrentValue);
			$this->DualMarker->EditValue = HtmlEncode($this->DualMarker->CurrentValue);
			$this->DualMarker->PlaceHolder = RemoveHtml($this->DualMarker->caption());

			// DualMarkerDATE
			$this->DualMarkerDATE->EditAttrs["class"] = "form-control";
			$this->DualMarkerDATE->EditCustomAttributes = "";
			if (!$this->DualMarkerDATE->Raw)
				$this->DualMarkerDATE->CurrentValue = HtmlDecode($this->DualMarkerDATE->CurrentValue);
			$this->DualMarkerDATE->EditValue = HtmlEncode($this->DualMarkerDATE->CurrentValue);
			$this->DualMarkerDATE->PlaceHolder = RemoveHtml($this->DualMarkerDATE->caption());

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->EditAttrs["class"] = "form-control";
			$this->DualMarkerINHOUSE->EditCustomAttributes = "";
			if (!$this->DualMarkerINHOUSE->Raw)
				$this->DualMarkerINHOUSE->CurrentValue = HtmlDecode($this->DualMarkerINHOUSE->CurrentValue);
			$this->DualMarkerINHOUSE->EditValue = HtmlEncode($this->DualMarkerINHOUSE->CurrentValue);
			$this->DualMarkerINHOUSE->PlaceHolder = RemoveHtml($this->DualMarkerINHOUSE->caption());

			// DualMarkerREPORT
			$this->DualMarkerREPORT->EditAttrs["class"] = "form-control";
			$this->DualMarkerREPORT->EditCustomAttributes = "";
			if (!$this->DualMarkerREPORT->Raw)
				$this->DualMarkerREPORT->CurrentValue = HtmlDecode($this->DualMarkerREPORT->CurrentValue);
			$this->DualMarkerREPORT->EditValue = HtmlEncode($this->DualMarkerREPORT->CurrentValue);
			$this->DualMarkerREPORT->PlaceHolder = RemoveHtml($this->DualMarkerREPORT->caption());

			// Quadruple
			$this->Quadruple->EditAttrs["class"] = "form-control";
			$this->Quadruple->EditCustomAttributes = "";
			if (!$this->Quadruple->Raw)
				$this->Quadruple->CurrentValue = HtmlDecode($this->Quadruple->CurrentValue);
			$this->Quadruple->EditValue = HtmlEncode($this->Quadruple->CurrentValue);
			$this->Quadruple->PlaceHolder = RemoveHtml($this->Quadruple->caption());

			// QuadrupleDATE
			$this->QuadrupleDATE->EditAttrs["class"] = "form-control";
			$this->QuadrupleDATE->EditCustomAttributes = "";
			if (!$this->QuadrupleDATE->Raw)
				$this->QuadrupleDATE->CurrentValue = HtmlDecode($this->QuadrupleDATE->CurrentValue);
			$this->QuadrupleDATE->EditValue = HtmlEncode($this->QuadrupleDATE->CurrentValue);
			$this->QuadrupleDATE->PlaceHolder = RemoveHtml($this->QuadrupleDATE->caption());

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->EditAttrs["class"] = "form-control";
			$this->QuadrupleINHOUSE->EditCustomAttributes = "";
			if (!$this->QuadrupleINHOUSE->Raw)
				$this->QuadrupleINHOUSE->CurrentValue = HtmlDecode($this->QuadrupleINHOUSE->CurrentValue);
			$this->QuadrupleINHOUSE->EditValue = HtmlEncode($this->QuadrupleINHOUSE->CurrentValue);
			$this->QuadrupleINHOUSE->PlaceHolder = RemoveHtml($this->QuadrupleINHOUSE->caption());

			// QuadrupleREPORT
			$this->QuadrupleREPORT->EditAttrs["class"] = "form-control";
			$this->QuadrupleREPORT->EditCustomAttributes = "";
			if (!$this->QuadrupleREPORT->Raw)
				$this->QuadrupleREPORT->CurrentValue = HtmlDecode($this->QuadrupleREPORT->CurrentValue);
			$this->QuadrupleREPORT->EditValue = HtmlEncode($this->QuadrupleREPORT->CurrentValue);
			$this->QuadrupleREPORT->PlaceHolder = RemoveHtml($this->QuadrupleREPORT->caption());

			// A5month
			$this->A5month->EditAttrs["class"] = "form-control";
			$this->A5month->EditCustomAttributes = "";
			if (!$this->A5month->Raw)
				$this->A5month->CurrentValue = HtmlDecode($this->A5month->CurrentValue);
			$this->A5month->EditValue = HtmlEncode($this->A5month->CurrentValue);
			$this->A5month->PlaceHolder = RemoveHtml($this->A5month->caption());

			// A5monthDATE
			$this->A5monthDATE->EditAttrs["class"] = "form-control";
			$this->A5monthDATE->EditCustomAttributes = "";
			if (!$this->A5monthDATE->Raw)
				$this->A5monthDATE->CurrentValue = HtmlDecode($this->A5monthDATE->CurrentValue);
			$this->A5monthDATE->EditValue = HtmlEncode($this->A5monthDATE->CurrentValue);
			$this->A5monthDATE->PlaceHolder = RemoveHtml($this->A5monthDATE->caption());

			// A5monthINHOUSE
			$this->A5monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A5monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A5monthINHOUSE->Raw)
				$this->A5monthINHOUSE->CurrentValue = HtmlDecode($this->A5monthINHOUSE->CurrentValue);
			$this->A5monthINHOUSE->EditValue = HtmlEncode($this->A5monthINHOUSE->CurrentValue);
			$this->A5monthINHOUSE->PlaceHolder = RemoveHtml($this->A5monthINHOUSE->caption());

			// A5monthREPORT
			$this->A5monthREPORT->EditAttrs["class"] = "form-control";
			$this->A5monthREPORT->EditCustomAttributes = "";
			if (!$this->A5monthREPORT->Raw)
				$this->A5monthREPORT->CurrentValue = HtmlDecode($this->A5monthREPORT->CurrentValue);
			$this->A5monthREPORT->EditValue = HtmlEncode($this->A5monthREPORT->CurrentValue);
			$this->A5monthREPORT->PlaceHolder = RemoveHtml($this->A5monthREPORT->caption());

			// A7month
			$this->A7month->EditAttrs["class"] = "form-control";
			$this->A7month->EditCustomAttributes = "";
			if (!$this->A7month->Raw)
				$this->A7month->CurrentValue = HtmlDecode($this->A7month->CurrentValue);
			$this->A7month->EditValue = HtmlEncode($this->A7month->CurrentValue);
			$this->A7month->PlaceHolder = RemoveHtml($this->A7month->caption());

			// A7monthDATE
			$this->A7monthDATE->EditAttrs["class"] = "form-control";
			$this->A7monthDATE->EditCustomAttributes = "";
			if (!$this->A7monthDATE->Raw)
				$this->A7monthDATE->CurrentValue = HtmlDecode($this->A7monthDATE->CurrentValue);
			$this->A7monthDATE->EditValue = HtmlEncode($this->A7monthDATE->CurrentValue);
			$this->A7monthDATE->PlaceHolder = RemoveHtml($this->A7monthDATE->caption());

			// A7monthINHOUSE
			$this->A7monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A7monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A7monthINHOUSE->Raw)
				$this->A7monthINHOUSE->CurrentValue = HtmlDecode($this->A7monthINHOUSE->CurrentValue);
			$this->A7monthINHOUSE->EditValue = HtmlEncode($this->A7monthINHOUSE->CurrentValue);
			$this->A7monthINHOUSE->PlaceHolder = RemoveHtml($this->A7monthINHOUSE->caption());

			// A7monthREPORT
			$this->A7monthREPORT->EditAttrs["class"] = "form-control";
			$this->A7monthREPORT->EditCustomAttributes = "";
			if (!$this->A7monthREPORT->Raw)
				$this->A7monthREPORT->CurrentValue = HtmlDecode($this->A7monthREPORT->CurrentValue);
			$this->A7monthREPORT->EditValue = HtmlEncode($this->A7monthREPORT->CurrentValue);
			$this->A7monthREPORT->PlaceHolder = RemoveHtml($this->A7monthREPORT->caption());

			// A9month
			$this->A9month->EditAttrs["class"] = "form-control";
			$this->A9month->EditCustomAttributes = "";
			if (!$this->A9month->Raw)
				$this->A9month->CurrentValue = HtmlDecode($this->A9month->CurrentValue);
			$this->A9month->EditValue = HtmlEncode($this->A9month->CurrentValue);
			$this->A9month->PlaceHolder = RemoveHtml($this->A9month->caption());

			// A9monthDATE
			$this->A9monthDATE->EditAttrs["class"] = "form-control";
			$this->A9monthDATE->EditCustomAttributes = "";
			if (!$this->A9monthDATE->Raw)
				$this->A9monthDATE->CurrentValue = HtmlDecode($this->A9monthDATE->CurrentValue);
			$this->A9monthDATE->EditValue = HtmlEncode($this->A9monthDATE->CurrentValue);
			$this->A9monthDATE->PlaceHolder = RemoveHtml($this->A9monthDATE->caption());

			// A9monthINHOUSE
			$this->A9monthINHOUSE->EditAttrs["class"] = "form-control";
			$this->A9monthINHOUSE->EditCustomAttributes = "";
			if (!$this->A9monthINHOUSE->Raw)
				$this->A9monthINHOUSE->CurrentValue = HtmlDecode($this->A9monthINHOUSE->CurrentValue);
			$this->A9monthINHOUSE->EditValue = HtmlEncode($this->A9monthINHOUSE->CurrentValue);
			$this->A9monthINHOUSE->PlaceHolder = RemoveHtml($this->A9monthINHOUSE->caption());

			// A9monthREPORT
			$this->A9monthREPORT->EditAttrs["class"] = "form-control";
			$this->A9monthREPORT->EditCustomAttributes = "";
			if (!$this->A9monthREPORT->Raw)
				$this->A9monthREPORT->CurrentValue = HtmlDecode($this->A9monthREPORT->CurrentValue);
			$this->A9monthREPORT->EditValue = HtmlEncode($this->A9monthREPORT->CurrentValue);
			$this->A9monthREPORT->PlaceHolder = RemoveHtml($this->A9monthREPORT->caption());

			// INJ
			$this->INJ->EditAttrs["class"] = "form-control";
			$this->INJ->EditCustomAttributes = "";
			if (!$this->INJ->Raw)
				$this->INJ->CurrentValue = HtmlDecode($this->INJ->CurrentValue);
			$this->INJ->EditValue = HtmlEncode($this->INJ->CurrentValue);
			$this->INJ->PlaceHolder = RemoveHtml($this->INJ->caption());

			// INJDATE
			$this->INJDATE->EditAttrs["class"] = "form-control";
			$this->INJDATE->EditCustomAttributes = "";
			if (!$this->INJDATE->Raw)
				$this->INJDATE->CurrentValue = HtmlDecode($this->INJDATE->CurrentValue);
			$this->INJDATE->EditValue = HtmlEncode($this->INJDATE->CurrentValue);
			$this->INJDATE->PlaceHolder = RemoveHtml($this->INJDATE->caption());

			// INJINHOUSE
			$this->INJINHOUSE->EditAttrs["class"] = "form-control";
			$this->INJINHOUSE->EditCustomAttributes = "";
			if (!$this->INJINHOUSE->Raw)
				$this->INJINHOUSE->CurrentValue = HtmlDecode($this->INJINHOUSE->CurrentValue);
			$this->INJINHOUSE->EditValue = HtmlEncode($this->INJINHOUSE->CurrentValue);
			$this->INJINHOUSE->PlaceHolder = RemoveHtml($this->INJINHOUSE->caption());

			// INJREPORT
			$this->INJREPORT->EditAttrs["class"] = "form-control";
			$this->INJREPORT->EditCustomAttributes = "";
			if (!$this->INJREPORT->Raw)
				$this->INJREPORT->CurrentValue = HtmlDecode($this->INJREPORT->CurrentValue);
			$this->INJREPORT->EditValue = HtmlEncode($this->INJREPORT->CurrentValue);
			$this->INJREPORT->PlaceHolder = RemoveHtml($this->INJREPORT->caption());

			// Bleeding
			$this->Bleeding->EditCustomAttributes = "";
			$this->Bleeding->EditValue = $this->Bleeding->options(FALSE);

			// Hypothyroidism
			$this->Hypothyroidism->EditAttrs["class"] = "form-control";
			$this->Hypothyroidism->EditCustomAttributes = "";
			if (!$this->Hypothyroidism->Raw)
				$this->Hypothyroidism->CurrentValue = HtmlDecode($this->Hypothyroidism->CurrentValue);
			$this->Hypothyroidism->EditValue = HtmlEncode($this->Hypothyroidism->CurrentValue);
			$this->Hypothyroidism->PlaceHolder = RemoveHtml($this->Hypothyroidism->caption());

			// PICMENumber
			$this->PICMENumber->EditAttrs["class"] = "form-control";
			$this->PICMENumber->EditCustomAttributes = "";
			if (!$this->PICMENumber->Raw)
				$this->PICMENumber->CurrentValue = HtmlDecode($this->PICMENumber->CurrentValue);
			$this->PICMENumber->EditValue = HtmlEncode($this->PICMENumber->CurrentValue);
			$this->PICMENumber->PlaceHolder = RemoveHtml($this->PICMENumber->caption());

			// Outcome
			$this->Outcome->EditAttrs["class"] = "form-control";
			$this->Outcome->EditCustomAttributes = "";
			if (!$this->Outcome->Raw)
				$this->Outcome->CurrentValue = HtmlDecode($this->Outcome->CurrentValue);
			$this->Outcome->EditValue = HtmlEncode($this->Outcome->CurrentValue);
			$this->Outcome->PlaceHolder = RemoveHtml($this->Outcome->caption());

			// DateofAdmission
			$this->DateofAdmission->EditAttrs["class"] = "form-control";
			$this->DateofAdmission->EditCustomAttributes = "";
			if (!$this->DateofAdmission->Raw)
				$this->DateofAdmission->CurrentValue = HtmlDecode($this->DateofAdmission->CurrentValue);
			$this->DateofAdmission->EditValue = HtmlEncode($this->DateofAdmission->CurrentValue);
			$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

			// DateodProcedure
			$this->DateodProcedure->EditAttrs["class"] = "form-control";
			$this->DateodProcedure->EditCustomAttributes = "";
			if (!$this->DateodProcedure->Raw)
				$this->DateodProcedure->CurrentValue = HtmlDecode($this->DateodProcedure->CurrentValue);
			$this->DateodProcedure->EditValue = HtmlEncode($this->DateodProcedure->CurrentValue);
			$this->DateodProcedure->PlaceHolder = RemoveHtml($this->DateodProcedure->caption());

			// Miscarriage
			$this->Miscarriage->EditAttrs["class"] = "form-control";
			$this->Miscarriage->EditCustomAttributes = "";
			$this->Miscarriage->EditValue = $this->Miscarriage->options(TRUE);

			// ModeOfDelivery
			$this->ModeOfDelivery->EditAttrs["class"] = "form-control";
			$this->ModeOfDelivery->EditCustomAttributes = "";
			$this->ModeOfDelivery->EditValue = $this->ModeOfDelivery->options(TRUE);

			// ND
			$this->ND->EditAttrs["class"] = "form-control";
			$this->ND->EditCustomAttributes = "";
			if (!$this->ND->Raw)
				$this->ND->CurrentValue = HtmlDecode($this->ND->CurrentValue);
			$this->ND->EditValue = HtmlEncode($this->ND->CurrentValue);
			$this->ND->PlaceHolder = RemoveHtml($this->ND->caption());

			// NDS
			$this->NDS->EditAttrs["class"] = "form-control";
			$this->NDS->EditCustomAttributes = "";
			$this->NDS->EditValue = $this->NDS->options(TRUE);

			// NDP
			$this->NDP->EditAttrs["class"] = "form-control";
			$this->NDP->EditCustomAttributes = "";
			$this->NDP->EditValue = $this->NDP->options(TRUE);

			// Vaccum
			$this->Vaccum->EditAttrs["class"] = "form-control";
			$this->Vaccum->EditCustomAttributes = "";
			if (!$this->Vaccum->Raw)
				$this->Vaccum->CurrentValue = HtmlDecode($this->Vaccum->CurrentValue);
			$this->Vaccum->EditValue = HtmlEncode($this->Vaccum->CurrentValue);
			$this->Vaccum->PlaceHolder = RemoveHtml($this->Vaccum->caption());

			// VaccumS
			$this->VaccumS->EditAttrs["class"] = "form-control";
			$this->VaccumS->EditCustomAttributes = "";
			$this->VaccumS->EditValue = $this->VaccumS->options(TRUE);

			// VaccumP
			$this->VaccumP->EditAttrs["class"] = "form-control";
			$this->VaccumP->EditCustomAttributes = "";
			$this->VaccumP->EditValue = $this->VaccumP->options(TRUE);

			// Forceps
			$this->Forceps->EditAttrs["class"] = "form-control";
			$this->Forceps->EditCustomAttributes = "";
			if (!$this->Forceps->Raw)
				$this->Forceps->CurrentValue = HtmlDecode($this->Forceps->CurrentValue);
			$this->Forceps->EditValue = HtmlEncode($this->Forceps->CurrentValue);
			$this->Forceps->PlaceHolder = RemoveHtml($this->Forceps->caption());

			// ForcepsS
			$this->ForcepsS->EditAttrs["class"] = "form-control";
			$this->ForcepsS->EditCustomAttributes = "";
			$this->ForcepsS->EditValue = $this->ForcepsS->options(TRUE);

			// ForcepsP
			$this->ForcepsP->EditAttrs["class"] = "form-control";
			$this->ForcepsP->EditCustomAttributes = "";
			$this->ForcepsP->EditValue = $this->ForcepsP->options(TRUE);

			// Elective
			$this->Elective->EditAttrs["class"] = "form-control";
			$this->Elective->EditCustomAttributes = "";
			if (!$this->Elective->Raw)
				$this->Elective->CurrentValue = HtmlDecode($this->Elective->CurrentValue);
			$this->Elective->EditValue = HtmlEncode($this->Elective->CurrentValue);
			$this->Elective->PlaceHolder = RemoveHtml($this->Elective->caption());

			// ElectiveS
			$this->ElectiveS->EditAttrs["class"] = "form-control";
			$this->ElectiveS->EditCustomAttributes = "";
			$this->ElectiveS->EditValue = $this->ElectiveS->options(TRUE);

			// ElectiveP
			$this->ElectiveP->EditAttrs["class"] = "form-control";
			$this->ElectiveP->EditCustomAttributes = "";
			$this->ElectiveP->EditValue = $this->ElectiveP->options(TRUE);

			// Emergency
			$this->Emergency->EditAttrs["class"] = "form-control";
			$this->Emergency->EditCustomAttributes = "";
			if (!$this->Emergency->Raw)
				$this->Emergency->CurrentValue = HtmlDecode($this->Emergency->CurrentValue);
			$this->Emergency->EditValue = HtmlEncode($this->Emergency->CurrentValue);
			$this->Emergency->PlaceHolder = RemoveHtml($this->Emergency->caption());

			// EmergencyS
			$this->EmergencyS->EditAttrs["class"] = "form-control";
			$this->EmergencyS->EditCustomAttributes = "";
			$this->EmergencyS->EditValue = $this->EmergencyS->options(TRUE);

			// EmergencyP
			$this->EmergencyP->EditAttrs["class"] = "form-control";
			$this->EmergencyP->EditCustomAttributes = "";
			$this->EmergencyP->EditValue = $this->EmergencyP->options(TRUE);

			// Maturity
			$this->Maturity->EditAttrs["class"] = "form-control";
			$this->Maturity->EditCustomAttributes = "";
			$this->Maturity->EditValue = $this->Maturity->options(TRUE);

			// Baby1
			$this->Baby1->EditAttrs["class"] = "form-control";
			$this->Baby1->EditCustomAttributes = "";
			if (!$this->Baby1->Raw)
				$this->Baby1->CurrentValue = HtmlDecode($this->Baby1->CurrentValue);
			$this->Baby1->EditValue = HtmlEncode($this->Baby1->CurrentValue);
			$this->Baby1->PlaceHolder = RemoveHtml($this->Baby1->caption());

			// Baby2
			$this->Baby2->EditAttrs["class"] = "form-control";
			$this->Baby2->EditCustomAttributes = "";
			if (!$this->Baby2->Raw)
				$this->Baby2->CurrentValue = HtmlDecode($this->Baby2->CurrentValue);
			$this->Baby2->EditValue = HtmlEncode($this->Baby2->CurrentValue);
			$this->Baby2->PlaceHolder = RemoveHtml($this->Baby2->caption());

			// sex1
			$this->sex1->EditAttrs["class"] = "form-control";
			$this->sex1->EditCustomAttributes = "";
			if (!$this->sex1->Raw)
				$this->sex1->CurrentValue = HtmlDecode($this->sex1->CurrentValue);
			$this->sex1->EditValue = HtmlEncode($this->sex1->CurrentValue);
			$this->sex1->PlaceHolder = RemoveHtml($this->sex1->caption());

			// sex2
			$this->sex2->EditAttrs["class"] = "form-control";
			$this->sex2->EditCustomAttributes = "";
			if (!$this->sex2->Raw)
				$this->sex2->CurrentValue = HtmlDecode($this->sex2->CurrentValue);
			$this->sex2->EditValue = HtmlEncode($this->sex2->CurrentValue);
			$this->sex2->PlaceHolder = RemoveHtml($this->sex2->caption());

			// weight1
			$this->weight1->EditAttrs["class"] = "form-control";
			$this->weight1->EditCustomAttributes = "";
			if (!$this->weight1->Raw)
				$this->weight1->CurrentValue = HtmlDecode($this->weight1->CurrentValue);
			$this->weight1->EditValue = HtmlEncode($this->weight1->CurrentValue);
			$this->weight1->PlaceHolder = RemoveHtml($this->weight1->caption());

			// weight2
			$this->weight2->EditAttrs["class"] = "form-control";
			$this->weight2->EditCustomAttributes = "";
			if (!$this->weight2->Raw)
				$this->weight2->CurrentValue = HtmlDecode($this->weight2->CurrentValue);
			$this->weight2->EditValue = HtmlEncode($this->weight2->CurrentValue);
			$this->weight2->PlaceHolder = RemoveHtml($this->weight2->caption());

			// NICU1
			$this->NICU1->EditAttrs["class"] = "form-control";
			$this->NICU1->EditCustomAttributes = "";
			if (!$this->NICU1->Raw)
				$this->NICU1->CurrentValue = HtmlDecode($this->NICU1->CurrentValue);
			$this->NICU1->EditValue = HtmlEncode($this->NICU1->CurrentValue);
			$this->NICU1->PlaceHolder = RemoveHtml($this->NICU1->caption());

			// NICU2
			$this->NICU2->EditAttrs["class"] = "form-control";
			$this->NICU2->EditCustomAttributes = "";
			if (!$this->NICU2->Raw)
				$this->NICU2->CurrentValue = HtmlDecode($this->NICU2->CurrentValue);
			$this->NICU2->EditValue = HtmlEncode($this->NICU2->CurrentValue);
			$this->NICU2->PlaceHolder = RemoveHtml($this->NICU2->caption());

			// Jaundice1
			$this->Jaundice1->EditAttrs["class"] = "form-control";
			$this->Jaundice1->EditCustomAttributes = "";
			if (!$this->Jaundice1->Raw)
				$this->Jaundice1->CurrentValue = HtmlDecode($this->Jaundice1->CurrentValue);
			$this->Jaundice1->EditValue = HtmlEncode($this->Jaundice1->CurrentValue);
			$this->Jaundice1->PlaceHolder = RemoveHtml($this->Jaundice1->caption());

			// Jaundice2
			$this->Jaundice2->EditAttrs["class"] = "form-control";
			$this->Jaundice2->EditCustomAttributes = "";
			if (!$this->Jaundice2->Raw)
				$this->Jaundice2->CurrentValue = HtmlDecode($this->Jaundice2->CurrentValue);
			$this->Jaundice2->EditValue = HtmlEncode($this->Jaundice2->CurrentValue);
			$this->Jaundice2->PlaceHolder = RemoveHtml($this->Jaundice2->caption());

			// Others1
			$this->Others1->EditAttrs["class"] = "form-control";
			$this->Others1->EditCustomAttributes = "";
			if (!$this->Others1->Raw)
				$this->Others1->CurrentValue = HtmlDecode($this->Others1->CurrentValue);
			$this->Others1->EditValue = HtmlEncode($this->Others1->CurrentValue);
			$this->Others1->PlaceHolder = RemoveHtml($this->Others1->caption());

			// Others2
			$this->Others2->EditAttrs["class"] = "form-control";
			$this->Others2->EditCustomAttributes = "";
			if (!$this->Others2->Raw)
				$this->Others2->CurrentValue = HtmlDecode($this->Others2->CurrentValue);
			$this->Others2->EditValue = HtmlEncode($this->Others2->CurrentValue);
			$this->Others2->PlaceHolder = RemoveHtml($this->Others2->caption());

			// SpillOverReasons
			$this->SpillOverReasons->EditAttrs["class"] = "form-control";
			$this->SpillOverReasons->EditCustomAttributes = "";
			$this->SpillOverReasons->EditValue = $this->SpillOverReasons->options(TRUE);

			// ANClosed
			$this->ANClosed->EditCustomAttributes = "";
			$this->ANClosed->EditValue = $this->ANClosed->options(FALSE);

			// ANClosedDATE
			$this->ANClosedDATE->EditAttrs["class"] = "form-control";
			$this->ANClosedDATE->EditCustomAttributes = "";
			if (!$this->ANClosedDATE->Raw)
				$this->ANClosedDATE->CurrentValue = HtmlDecode($this->ANClosedDATE->CurrentValue);
			$this->ANClosedDATE->EditValue = HtmlEncode($this->ANClosedDATE->CurrentValue);
			$this->ANClosedDATE->PlaceHolder = RemoveHtml($this->ANClosedDATE->caption());

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->EditAttrs["class"] = "form-control";
			$this->PastMedicalHistoryOthers->EditCustomAttributes = "";
			if (!$this->PastMedicalHistoryOthers->Raw)
				$this->PastMedicalHistoryOthers->CurrentValue = HtmlDecode($this->PastMedicalHistoryOthers->CurrentValue);
			$this->PastMedicalHistoryOthers->EditValue = HtmlEncode($this->PastMedicalHistoryOthers->CurrentValue);
			$this->PastMedicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastMedicalHistoryOthers->caption());

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->EditAttrs["class"] = "form-control";
			$this->PastSurgicalHistoryOthers->EditCustomAttributes = "";
			if (!$this->PastSurgicalHistoryOthers->Raw)
				$this->PastSurgicalHistoryOthers->CurrentValue = HtmlDecode($this->PastSurgicalHistoryOthers->CurrentValue);
			$this->PastSurgicalHistoryOthers->EditValue = HtmlEncode($this->PastSurgicalHistoryOthers->CurrentValue);
			$this->PastSurgicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastSurgicalHistoryOthers->caption());

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->EditAttrs["class"] = "form-control";
			$this->FamilyHistoryOthers->EditCustomAttributes = "";
			if (!$this->FamilyHistoryOthers->Raw)
				$this->FamilyHistoryOthers->CurrentValue = HtmlDecode($this->FamilyHistoryOthers->CurrentValue);
			$this->FamilyHistoryOthers->EditValue = HtmlEncode($this->FamilyHistoryOthers->CurrentValue);
			$this->FamilyHistoryOthers->PlaceHolder = RemoveHtml($this->FamilyHistoryOthers->caption());

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->EditAttrs["class"] = "form-control";
			$this->PresentPregnancyComplicationsOthers->EditCustomAttributes = "";
			if (!$this->PresentPregnancyComplicationsOthers->Raw)
				$this->PresentPregnancyComplicationsOthers->CurrentValue = HtmlDecode($this->PresentPregnancyComplicationsOthers->CurrentValue);
			$this->PresentPregnancyComplicationsOthers->EditValue = HtmlEncode($this->PresentPregnancyComplicationsOthers->CurrentValue);
			$this->PresentPregnancyComplicationsOthers->PlaceHolder = RemoveHtml($this->PresentPregnancyComplicationsOthers->caption());

			// ETdate
			$this->ETdate->EditAttrs["class"] = "form-control";
			$this->ETdate->EditCustomAttributes = "";
			if (!$this->ETdate->Raw)
				$this->ETdate->CurrentValue = HtmlDecode($this->ETdate->CurrentValue);
			$this->ETdate->EditValue = HtmlEncode($this->ETdate->CurrentValue);
			$this->ETdate->PlaceHolder = RemoveHtml($this->ETdate->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// pid
			$this->pid->LinkCustomAttributes = "";
			$this->pid->HrefValue = "";

			// fid
			$this->fid->LinkCustomAttributes = "";
			$this->fid->HrefValue = "";

			// G
			$this->G->LinkCustomAttributes = "";
			$this->G->HrefValue = "";

			// P
			$this->P->LinkCustomAttributes = "";
			$this->P->HrefValue = "";

			// L
			$this->L->LinkCustomAttributes = "";
			$this->L->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// E
			$this->E->LinkCustomAttributes = "";
			$this->E->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";

			// EDO
			$this->EDO->LinkCustomAttributes = "";
			$this->EDO->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// MaritalHistory
			$this->MaritalHistory->LinkCustomAttributes = "";
			$this->MaritalHistory->HrefValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->LinkCustomAttributes = "";
			$this->PreviousHistoryofGDM->HrefValue = "";

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->LinkCustomAttributes = "";
			$this->PreviousHistorofPIH->HrefValue = "";

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
			$this->PreviousHistoryofIUGR->HrefValue = "";

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
			$this->PreviousHistoryofOligohydramnios->HrefValue = "";

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
			$this->PreviousHistoryofPreterm->HrefValue = "";

			// G1
			$this->G1->LinkCustomAttributes = "";
			$this->G1->HrefValue = "";

			// G2
			$this->G2->LinkCustomAttributes = "";
			$this->G2->HrefValue = "";

			// G3
			$this->G3->LinkCustomAttributes = "";
			$this->G3->HrefValue = "";

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS1->HrefValue = "";

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS2->HrefValue = "";

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->LinkCustomAttributes = "";
			$this->DeliveryNDLSCS3->HrefValue = "";

			// BabySexweight1
			$this->BabySexweight1->LinkCustomAttributes = "";
			$this->BabySexweight1->HrefValue = "";

			// BabySexweight2
			$this->BabySexweight2->LinkCustomAttributes = "";
			$this->BabySexweight2->HrefValue = "";

			// BabySexweight3
			$this->BabySexweight3->LinkCustomAttributes = "";
			$this->BabySexweight3->HrefValue = "";

			// PastMedicalHistory
			$this->PastMedicalHistory->LinkCustomAttributes = "";
			$this->PastMedicalHistory->HrefValue = "";

			// PastSurgicalHistory
			$this->PastSurgicalHistory->LinkCustomAttributes = "";
			$this->PastSurgicalHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// Viability
			$this->Viability->LinkCustomAttributes = "";
			$this->Viability->HrefValue = "";

			// ViabilityDATE
			$this->ViabilityDATE->LinkCustomAttributes = "";
			$this->ViabilityDATE->HrefValue = "";

			// ViabilityREPORT
			$this->ViabilityREPORT->LinkCustomAttributes = "";
			$this->ViabilityREPORT->HrefValue = "";

			// Viability2
			$this->Viability2->LinkCustomAttributes = "";
			$this->Viability2->HrefValue = "";

			// Viability2DATE
			$this->Viability2DATE->LinkCustomAttributes = "";
			$this->Viability2DATE->HrefValue = "";

			// Viability2REPORT
			$this->Viability2REPORT->LinkCustomAttributes = "";
			$this->Viability2REPORT->HrefValue = "";

			// NTscan
			$this->NTscan->LinkCustomAttributes = "";
			$this->NTscan->HrefValue = "";

			// NTscanDATE
			$this->NTscanDATE->LinkCustomAttributes = "";
			$this->NTscanDATE->HrefValue = "";

			// NTscanREPORT
			$this->NTscanREPORT->LinkCustomAttributes = "";
			$this->NTscanREPORT->HrefValue = "";

			// EarlyTarget
			$this->EarlyTarget->LinkCustomAttributes = "";
			$this->EarlyTarget->HrefValue = "";

			// EarlyTargetDATE
			$this->EarlyTargetDATE->LinkCustomAttributes = "";
			$this->EarlyTargetDATE->HrefValue = "";

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->LinkCustomAttributes = "";
			$this->EarlyTargetREPORT->HrefValue = "";

			// Anomaly
			$this->Anomaly->LinkCustomAttributes = "";
			$this->Anomaly->HrefValue = "";

			// AnomalyDATE
			$this->AnomalyDATE->LinkCustomAttributes = "";
			$this->AnomalyDATE->HrefValue = "";

			// AnomalyREPORT
			$this->AnomalyREPORT->LinkCustomAttributes = "";
			$this->AnomalyREPORT->HrefValue = "";

			// Growth
			$this->Growth->LinkCustomAttributes = "";
			$this->Growth->HrefValue = "";

			// GrowthDATE
			$this->GrowthDATE->LinkCustomAttributes = "";
			$this->GrowthDATE->HrefValue = "";

			// GrowthREPORT
			$this->GrowthREPORT->LinkCustomAttributes = "";
			$this->GrowthREPORT->HrefValue = "";

			// Growth1
			$this->Growth1->LinkCustomAttributes = "";
			$this->Growth1->HrefValue = "";

			// Growth1DATE
			$this->Growth1DATE->LinkCustomAttributes = "";
			$this->Growth1DATE->HrefValue = "";

			// Growth1REPORT
			$this->Growth1REPORT->LinkCustomAttributes = "";
			$this->Growth1REPORT->HrefValue = "";

			// ANProfile
			$this->ANProfile->LinkCustomAttributes = "";
			$this->ANProfile->HrefValue = "";

			// ANProfileDATE
			$this->ANProfileDATE->LinkCustomAttributes = "";
			$this->ANProfileDATE->HrefValue = "";

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->LinkCustomAttributes = "";
			$this->ANProfileINHOUSE->HrefValue = "";

			// ANProfileREPORT
			$this->ANProfileREPORT->LinkCustomAttributes = "";
			$this->ANProfileREPORT->HrefValue = "";

			// DualMarker
			$this->DualMarker->LinkCustomAttributes = "";
			$this->DualMarker->HrefValue = "";

			// DualMarkerDATE
			$this->DualMarkerDATE->LinkCustomAttributes = "";
			$this->DualMarkerDATE->HrefValue = "";

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->LinkCustomAttributes = "";
			$this->DualMarkerINHOUSE->HrefValue = "";

			// DualMarkerREPORT
			$this->DualMarkerREPORT->LinkCustomAttributes = "";
			$this->DualMarkerREPORT->HrefValue = "";

			// Quadruple
			$this->Quadruple->LinkCustomAttributes = "";
			$this->Quadruple->HrefValue = "";

			// QuadrupleDATE
			$this->QuadrupleDATE->LinkCustomAttributes = "";
			$this->QuadrupleDATE->HrefValue = "";

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->LinkCustomAttributes = "";
			$this->QuadrupleINHOUSE->HrefValue = "";

			// QuadrupleREPORT
			$this->QuadrupleREPORT->LinkCustomAttributes = "";
			$this->QuadrupleREPORT->HrefValue = "";

			// A5month
			$this->A5month->LinkCustomAttributes = "";
			$this->A5month->HrefValue = "";

			// A5monthDATE
			$this->A5monthDATE->LinkCustomAttributes = "";
			$this->A5monthDATE->HrefValue = "";

			// A5monthINHOUSE
			$this->A5monthINHOUSE->LinkCustomAttributes = "";
			$this->A5monthINHOUSE->HrefValue = "";

			// A5monthREPORT
			$this->A5monthREPORT->LinkCustomAttributes = "";
			$this->A5monthREPORT->HrefValue = "";

			// A7month
			$this->A7month->LinkCustomAttributes = "";
			$this->A7month->HrefValue = "";

			// A7monthDATE
			$this->A7monthDATE->LinkCustomAttributes = "";
			$this->A7monthDATE->HrefValue = "";

			// A7monthINHOUSE
			$this->A7monthINHOUSE->LinkCustomAttributes = "";
			$this->A7monthINHOUSE->HrefValue = "";

			// A7monthREPORT
			$this->A7monthREPORT->LinkCustomAttributes = "";
			$this->A7monthREPORT->HrefValue = "";

			// A9month
			$this->A9month->LinkCustomAttributes = "";
			$this->A9month->HrefValue = "";

			// A9monthDATE
			$this->A9monthDATE->LinkCustomAttributes = "";
			$this->A9monthDATE->HrefValue = "";

			// A9monthINHOUSE
			$this->A9monthINHOUSE->LinkCustomAttributes = "";
			$this->A9monthINHOUSE->HrefValue = "";

			// A9monthREPORT
			$this->A9monthREPORT->LinkCustomAttributes = "";
			$this->A9monthREPORT->HrefValue = "";

			// INJ
			$this->INJ->LinkCustomAttributes = "";
			$this->INJ->HrefValue = "";

			// INJDATE
			$this->INJDATE->LinkCustomAttributes = "";
			$this->INJDATE->HrefValue = "";

			// INJINHOUSE
			$this->INJINHOUSE->LinkCustomAttributes = "";
			$this->INJINHOUSE->HrefValue = "";

			// INJREPORT
			$this->INJREPORT->LinkCustomAttributes = "";
			$this->INJREPORT->HrefValue = "";

			// Bleeding
			$this->Bleeding->LinkCustomAttributes = "";
			$this->Bleeding->HrefValue = "";

			// Hypothyroidism
			$this->Hypothyroidism->LinkCustomAttributes = "";
			$this->Hypothyroidism->HrefValue = "";

			// PICMENumber
			$this->PICMENumber->LinkCustomAttributes = "";
			$this->PICMENumber->HrefValue = "";

			// Outcome
			$this->Outcome->LinkCustomAttributes = "";
			$this->Outcome->HrefValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";

			// DateodProcedure
			$this->DateodProcedure->LinkCustomAttributes = "";
			$this->DateodProcedure->HrefValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";

			// ModeOfDelivery
			$this->ModeOfDelivery->LinkCustomAttributes = "";
			$this->ModeOfDelivery->HrefValue = "";

			// ND
			$this->ND->LinkCustomAttributes = "";
			$this->ND->HrefValue = "";

			// NDS
			$this->NDS->LinkCustomAttributes = "";
			$this->NDS->HrefValue = "";

			// NDP
			$this->NDP->LinkCustomAttributes = "";
			$this->NDP->HrefValue = "";

			// Vaccum
			$this->Vaccum->LinkCustomAttributes = "";
			$this->Vaccum->HrefValue = "";

			// VaccumS
			$this->VaccumS->LinkCustomAttributes = "";
			$this->VaccumS->HrefValue = "";

			// VaccumP
			$this->VaccumP->LinkCustomAttributes = "";
			$this->VaccumP->HrefValue = "";

			// Forceps
			$this->Forceps->LinkCustomAttributes = "";
			$this->Forceps->HrefValue = "";

			// ForcepsS
			$this->ForcepsS->LinkCustomAttributes = "";
			$this->ForcepsS->HrefValue = "";

			// ForcepsP
			$this->ForcepsP->LinkCustomAttributes = "";
			$this->ForcepsP->HrefValue = "";

			// Elective
			$this->Elective->LinkCustomAttributes = "";
			$this->Elective->HrefValue = "";

			// ElectiveS
			$this->ElectiveS->LinkCustomAttributes = "";
			$this->ElectiveS->HrefValue = "";

			// ElectiveP
			$this->ElectiveP->LinkCustomAttributes = "";
			$this->ElectiveP->HrefValue = "";

			// Emergency
			$this->Emergency->LinkCustomAttributes = "";
			$this->Emergency->HrefValue = "";

			// EmergencyS
			$this->EmergencyS->LinkCustomAttributes = "";
			$this->EmergencyS->HrefValue = "";

			// EmergencyP
			$this->EmergencyP->LinkCustomAttributes = "";
			$this->EmergencyP->HrefValue = "";

			// Maturity
			$this->Maturity->LinkCustomAttributes = "";
			$this->Maturity->HrefValue = "";

			// Baby1
			$this->Baby1->LinkCustomAttributes = "";
			$this->Baby1->HrefValue = "";

			// Baby2
			$this->Baby2->LinkCustomAttributes = "";
			$this->Baby2->HrefValue = "";

			// sex1
			$this->sex1->LinkCustomAttributes = "";
			$this->sex1->HrefValue = "";

			// sex2
			$this->sex2->LinkCustomAttributes = "";
			$this->sex2->HrefValue = "";

			// weight1
			$this->weight1->LinkCustomAttributes = "";
			$this->weight1->HrefValue = "";

			// weight2
			$this->weight2->LinkCustomAttributes = "";
			$this->weight2->HrefValue = "";

			// NICU1
			$this->NICU1->LinkCustomAttributes = "";
			$this->NICU1->HrefValue = "";

			// NICU2
			$this->NICU2->LinkCustomAttributes = "";
			$this->NICU2->HrefValue = "";

			// Jaundice1
			$this->Jaundice1->LinkCustomAttributes = "";
			$this->Jaundice1->HrefValue = "";

			// Jaundice2
			$this->Jaundice2->LinkCustomAttributes = "";
			$this->Jaundice2->HrefValue = "";

			// Others1
			$this->Others1->LinkCustomAttributes = "";
			$this->Others1->HrefValue = "";

			// Others2
			$this->Others2->LinkCustomAttributes = "";
			$this->Others2->HrefValue = "";

			// SpillOverReasons
			$this->SpillOverReasons->LinkCustomAttributes = "";
			$this->SpillOverReasons->HrefValue = "";

			// ANClosed
			$this->ANClosed->LinkCustomAttributes = "";
			$this->ANClosed->HrefValue = "";

			// ANClosedDATE
			$this->ANClosedDATE->LinkCustomAttributes = "";
			$this->ANClosedDATE->HrefValue = "";

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastMedicalHistoryOthers->HrefValue = "";

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
			$this->PastSurgicalHistoryOthers->HrefValue = "";

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->LinkCustomAttributes = "";
			$this->FamilyHistoryOthers->HrefValue = "";

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
			$this->PresentPregnancyComplicationsOthers->HrefValue = "";

			// ETdate
			$this->ETdate->LinkCustomAttributes = "";
			$this->ETdate->HrefValue = "";
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
		if ($this->pid->Required) {
			if (!$this->pid->IsDetailKey && $this->pid->FormValue != NULL && $this->pid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pid->caption(), $this->pid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pid->FormValue)) {
			AddMessage($FormError, $this->pid->errorMessage());
		}
		if ($this->fid->Required) {
			if (!$this->fid->IsDetailKey && $this->fid->FormValue != NULL && $this->fid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fid->caption(), $this->fid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->fid->FormValue)) {
			AddMessage($FormError, $this->fid->errorMessage());
		}
		if ($this->G->Required) {
			if (!$this->G->IsDetailKey && $this->G->FormValue != NULL && $this->G->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->G->caption(), $this->G->RequiredErrorMessage));
			}
		}
		if ($this->P->Required) {
			if (!$this->P->IsDetailKey && $this->P->FormValue != NULL && $this->P->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P->caption(), $this->P->RequiredErrorMessage));
			}
		}
		if ($this->L->Required) {
			if (!$this->L->IsDetailKey && $this->L->FormValue != NULL && $this->L->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->L->caption(), $this->L->RequiredErrorMessage));
			}
		}
		if ($this->A->Required) {
			if (!$this->A->IsDetailKey && $this->A->FormValue != NULL && $this->A->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
			}
		}
		if ($this->E->Required) {
			if (!$this->E->IsDetailKey && $this->E->FormValue != NULL && $this->E->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->E->caption(), $this->E->RequiredErrorMessage));
			}
		}
		if ($this->M->Required) {
			if (!$this->M->IsDetailKey && $this->M->FormValue != NULL && $this->M->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
			}
		}
		if ($this->LMP->Required) {
			if (!$this->LMP->IsDetailKey && $this->LMP->FormValue != NULL && $this->LMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
			}
		}
		if ($this->EDO->Required) {
			if (!$this->EDO->IsDetailKey && $this->EDO->FormValue != NULL && $this->EDO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EDO->caption(), $this->EDO->RequiredErrorMessage));
			}
		}
		if ($this->MenstrualHistory->Required) {
			if (!$this->MenstrualHistory->IsDetailKey && $this->MenstrualHistory->FormValue != NULL && $this->MenstrualHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
			}
		}
		if ($this->MaritalHistory->Required) {
			if (!$this->MaritalHistory->IsDetailKey && $this->MaritalHistory->FormValue != NULL && $this->MaritalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaritalHistory->caption(), $this->MaritalHistory->RequiredErrorMessage));
			}
		}
		if ($this->ObstetricHistory->Required) {
			if (!$this->ObstetricHistory->IsDetailKey && $this->ObstetricHistory->FormValue != NULL && $this->ObstetricHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ObstetricHistory->caption(), $this->ObstetricHistory->RequiredErrorMessage));
			}
		}
		if ($this->PreviousHistoryofGDM->Required) {
			if (!$this->PreviousHistoryofGDM->IsDetailKey && $this->PreviousHistoryofGDM->FormValue != NULL && $this->PreviousHistoryofGDM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreviousHistoryofGDM->caption(), $this->PreviousHistoryofGDM->RequiredErrorMessage));
			}
		}
		if ($this->PreviousHistorofPIH->Required) {
			if (!$this->PreviousHistorofPIH->IsDetailKey && $this->PreviousHistorofPIH->FormValue != NULL && $this->PreviousHistorofPIH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreviousHistorofPIH->caption(), $this->PreviousHistorofPIH->RequiredErrorMessage));
			}
		}
		if ($this->PreviousHistoryofIUGR->Required) {
			if (!$this->PreviousHistoryofIUGR->IsDetailKey && $this->PreviousHistoryofIUGR->FormValue != NULL && $this->PreviousHistoryofIUGR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreviousHistoryofIUGR->caption(), $this->PreviousHistoryofIUGR->RequiredErrorMessage));
			}
		}
		if ($this->PreviousHistoryofOligohydramnios->Required) {
			if (!$this->PreviousHistoryofOligohydramnios->IsDetailKey && $this->PreviousHistoryofOligohydramnios->FormValue != NULL && $this->PreviousHistoryofOligohydramnios->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreviousHistoryofOligohydramnios->caption(), $this->PreviousHistoryofOligohydramnios->RequiredErrorMessage));
			}
		}
		if ($this->PreviousHistoryofPreterm->Required) {
			if (!$this->PreviousHistoryofPreterm->IsDetailKey && $this->PreviousHistoryofPreterm->FormValue != NULL && $this->PreviousHistoryofPreterm->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreviousHistoryofPreterm->caption(), $this->PreviousHistoryofPreterm->RequiredErrorMessage));
			}
		}
		if ($this->G1->Required) {
			if (!$this->G1->IsDetailKey && $this->G1->FormValue != NULL && $this->G1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->G1->caption(), $this->G1->RequiredErrorMessage));
			}
		}
		if ($this->G2->Required) {
			if (!$this->G2->IsDetailKey && $this->G2->FormValue != NULL && $this->G2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->G2->caption(), $this->G2->RequiredErrorMessage));
			}
		}
		if ($this->G3->Required) {
			if (!$this->G3->IsDetailKey && $this->G3->FormValue != NULL && $this->G3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->G3->caption(), $this->G3->RequiredErrorMessage));
			}
		}
		if ($this->DeliveryNDLSCS1->Required) {
			if (!$this->DeliveryNDLSCS1->IsDetailKey && $this->DeliveryNDLSCS1->FormValue != NULL && $this->DeliveryNDLSCS1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeliveryNDLSCS1->caption(), $this->DeliveryNDLSCS1->RequiredErrorMessage));
			}
		}
		if ($this->DeliveryNDLSCS2->Required) {
			if (!$this->DeliveryNDLSCS2->IsDetailKey && $this->DeliveryNDLSCS2->FormValue != NULL && $this->DeliveryNDLSCS2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeliveryNDLSCS2->caption(), $this->DeliveryNDLSCS2->RequiredErrorMessage));
			}
		}
		if ($this->DeliveryNDLSCS3->Required) {
			if (!$this->DeliveryNDLSCS3->IsDetailKey && $this->DeliveryNDLSCS3->FormValue != NULL && $this->DeliveryNDLSCS3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeliveryNDLSCS3->caption(), $this->DeliveryNDLSCS3->RequiredErrorMessage));
			}
		}
		if ($this->BabySexweight1->Required) {
			if (!$this->BabySexweight1->IsDetailKey && $this->BabySexweight1->FormValue != NULL && $this->BabySexweight1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BabySexweight1->caption(), $this->BabySexweight1->RequiredErrorMessage));
			}
		}
		if ($this->BabySexweight2->Required) {
			if (!$this->BabySexweight2->IsDetailKey && $this->BabySexweight2->FormValue != NULL && $this->BabySexweight2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BabySexweight2->caption(), $this->BabySexweight2->RequiredErrorMessage));
			}
		}
		if ($this->BabySexweight3->Required) {
			if (!$this->BabySexweight3->IsDetailKey && $this->BabySexweight3->FormValue != NULL && $this->BabySexweight3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BabySexweight3->caption(), $this->BabySexweight3->RequiredErrorMessage));
			}
		}
		if ($this->PastMedicalHistory->Required) {
			if ($this->PastMedicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastMedicalHistory->caption(), $this->PastMedicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->PastSurgicalHistory->Required) {
			if ($this->PastSurgicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastSurgicalHistory->caption(), $this->PastSurgicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->FamilyHistory->Required) {
			if ($this->FamilyHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
			}
		}
		if ($this->Viability->Required) {
			if (!$this->Viability->IsDetailKey && $this->Viability->FormValue != NULL && $this->Viability->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Viability->caption(), $this->Viability->RequiredErrorMessage));
			}
		}
		if ($this->ViabilityDATE->Required) {
			if (!$this->ViabilityDATE->IsDetailKey && $this->ViabilityDATE->FormValue != NULL && $this->ViabilityDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ViabilityDATE->caption(), $this->ViabilityDATE->RequiredErrorMessage));
			}
		}
		if ($this->ViabilityREPORT->Required) {
			if (!$this->ViabilityREPORT->IsDetailKey && $this->ViabilityREPORT->FormValue != NULL && $this->ViabilityREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ViabilityREPORT->caption(), $this->ViabilityREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Viability2->Required) {
			if (!$this->Viability2->IsDetailKey && $this->Viability2->FormValue != NULL && $this->Viability2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Viability2->caption(), $this->Viability2->RequiredErrorMessage));
			}
		}
		if ($this->Viability2DATE->Required) {
			if (!$this->Viability2DATE->IsDetailKey && $this->Viability2DATE->FormValue != NULL && $this->Viability2DATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Viability2DATE->caption(), $this->Viability2DATE->RequiredErrorMessage));
			}
		}
		if ($this->Viability2REPORT->Required) {
			if (!$this->Viability2REPORT->IsDetailKey && $this->Viability2REPORT->FormValue != NULL && $this->Viability2REPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Viability2REPORT->caption(), $this->Viability2REPORT->RequiredErrorMessage));
			}
		}
		if ($this->NTscan->Required) {
			if (!$this->NTscan->IsDetailKey && $this->NTscan->FormValue != NULL && $this->NTscan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NTscan->caption(), $this->NTscan->RequiredErrorMessage));
			}
		}
		if ($this->NTscanDATE->Required) {
			if (!$this->NTscanDATE->IsDetailKey && $this->NTscanDATE->FormValue != NULL && $this->NTscanDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NTscanDATE->caption(), $this->NTscanDATE->RequiredErrorMessage));
			}
		}
		if ($this->NTscanREPORT->Required) {
			if (!$this->NTscanREPORT->IsDetailKey && $this->NTscanREPORT->FormValue != NULL && $this->NTscanREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NTscanREPORT->caption(), $this->NTscanREPORT->RequiredErrorMessage));
			}
		}
		if ($this->EarlyTarget->Required) {
			if (!$this->EarlyTarget->IsDetailKey && $this->EarlyTarget->FormValue != NULL && $this->EarlyTarget->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EarlyTarget->caption(), $this->EarlyTarget->RequiredErrorMessage));
			}
		}
		if ($this->EarlyTargetDATE->Required) {
			if (!$this->EarlyTargetDATE->IsDetailKey && $this->EarlyTargetDATE->FormValue != NULL && $this->EarlyTargetDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EarlyTargetDATE->caption(), $this->EarlyTargetDATE->RequiredErrorMessage));
			}
		}
		if ($this->EarlyTargetREPORT->Required) {
			if (!$this->EarlyTargetREPORT->IsDetailKey && $this->EarlyTargetREPORT->FormValue != NULL && $this->EarlyTargetREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EarlyTargetREPORT->caption(), $this->EarlyTargetREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Anomaly->Required) {
			if (!$this->Anomaly->IsDetailKey && $this->Anomaly->FormValue != NULL && $this->Anomaly->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anomaly->caption(), $this->Anomaly->RequiredErrorMessage));
			}
		}
		if ($this->AnomalyDATE->Required) {
			if (!$this->AnomalyDATE->IsDetailKey && $this->AnomalyDATE->FormValue != NULL && $this->AnomalyDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnomalyDATE->caption(), $this->AnomalyDATE->RequiredErrorMessage));
			}
		}
		if ($this->AnomalyREPORT->Required) {
			if (!$this->AnomalyREPORT->IsDetailKey && $this->AnomalyREPORT->FormValue != NULL && $this->AnomalyREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnomalyREPORT->caption(), $this->AnomalyREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Growth->Required) {
			if (!$this->Growth->IsDetailKey && $this->Growth->FormValue != NULL && $this->Growth->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Growth->caption(), $this->Growth->RequiredErrorMessage));
			}
		}
		if ($this->GrowthDATE->Required) {
			if (!$this->GrowthDATE->IsDetailKey && $this->GrowthDATE->FormValue != NULL && $this->GrowthDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrowthDATE->caption(), $this->GrowthDATE->RequiredErrorMessage));
			}
		}
		if ($this->GrowthREPORT->Required) {
			if (!$this->GrowthREPORT->IsDetailKey && $this->GrowthREPORT->FormValue != NULL && $this->GrowthREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrowthREPORT->caption(), $this->GrowthREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Growth1->Required) {
			if (!$this->Growth1->IsDetailKey && $this->Growth1->FormValue != NULL && $this->Growth1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Growth1->caption(), $this->Growth1->RequiredErrorMessage));
			}
		}
		if ($this->Growth1DATE->Required) {
			if (!$this->Growth1DATE->IsDetailKey && $this->Growth1DATE->FormValue != NULL && $this->Growth1DATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Growth1DATE->caption(), $this->Growth1DATE->RequiredErrorMessage));
			}
		}
		if ($this->Growth1REPORT->Required) {
			if (!$this->Growth1REPORT->IsDetailKey && $this->Growth1REPORT->FormValue != NULL && $this->Growth1REPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Growth1REPORT->caption(), $this->Growth1REPORT->RequiredErrorMessage));
			}
		}
		if ($this->ANProfile->Required) {
			if (!$this->ANProfile->IsDetailKey && $this->ANProfile->FormValue != NULL && $this->ANProfile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANProfile->caption(), $this->ANProfile->RequiredErrorMessage));
			}
		}
		if ($this->ANProfileDATE->Required) {
			if (!$this->ANProfileDATE->IsDetailKey && $this->ANProfileDATE->FormValue != NULL && $this->ANProfileDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANProfileDATE->caption(), $this->ANProfileDATE->RequiredErrorMessage));
			}
		}
		if ($this->ANProfileINHOUSE->Required) {
			if (!$this->ANProfileINHOUSE->IsDetailKey && $this->ANProfileINHOUSE->FormValue != NULL && $this->ANProfileINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANProfileINHOUSE->caption(), $this->ANProfileINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->ANProfileREPORT->Required) {
			if (!$this->ANProfileREPORT->IsDetailKey && $this->ANProfileREPORT->FormValue != NULL && $this->ANProfileREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANProfileREPORT->caption(), $this->ANProfileREPORT->RequiredErrorMessage));
			}
		}
		if ($this->DualMarker->Required) {
			if (!$this->DualMarker->IsDetailKey && $this->DualMarker->FormValue != NULL && $this->DualMarker->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DualMarker->caption(), $this->DualMarker->RequiredErrorMessage));
			}
		}
		if ($this->DualMarkerDATE->Required) {
			if (!$this->DualMarkerDATE->IsDetailKey && $this->DualMarkerDATE->FormValue != NULL && $this->DualMarkerDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DualMarkerDATE->caption(), $this->DualMarkerDATE->RequiredErrorMessage));
			}
		}
		if ($this->DualMarkerINHOUSE->Required) {
			if (!$this->DualMarkerINHOUSE->IsDetailKey && $this->DualMarkerINHOUSE->FormValue != NULL && $this->DualMarkerINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DualMarkerINHOUSE->caption(), $this->DualMarkerINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->DualMarkerREPORT->Required) {
			if (!$this->DualMarkerREPORT->IsDetailKey && $this->DualMarkerREPORT->FormValue != NULL && $this->DualMarkerREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DualMarkerREPORT->caption(), $this->DualMarkerREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Quadruple->Required) {
			if (!$this->Quadruple->IsDetailKey && $this->Quadruple->FormValue != NULL && $this->Quadruple->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quadruple->caption(), $this->Quadruple->RequiredErrorMessage));
			}
		}
		if ($this->QuadrupleDATE->Required) {
			if (!$this->QuadrupleDATE->IsDetailKey && $this->QuadrupleDATE->FormValue != NULL && $this->QuadrupleDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QuadrupleDATE->caption(), $this->QuadrupleDATE->RequiredErrorMessage));
			}
		}
		if ($this->QuadrupleINHOUSE->Required) {
			if (!$this->QuadrupleINHOUSE->IsDetailKey && $this->QuadrupleINHOUSE->FormValue != NULL && $this->QuadrupleINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QuadrupleINHOUSE->caption(), $this->QuadrupleINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->QuadrupleREPORT->Required) {
			if (!$this->QuadrupleREPORT->IsDetailKey && $this->QuadrupleREPORT->FormValue != NULL && $this->QuadrupleREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QuadrupleREPORT->caption(), $this->QuadrupleREPORT->RequiredErrorMessage));
			}
		}
		if ($this->A5month->Required) {
			if (!$this->A5month->IsDetailKey && $this->A5month->FormValue != NULL && $this->A5month->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A5month->caption(), $this->A5month->RequiredErrorMessage));
			}
		}
		if ($this->A5monthDATE->Required) {
			if (!$this->A5monthDATE->IsDetailKey && $this->A5monthDATE->FormValue != NULL && $this->A5monthDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A5monthDATE->caption(), $this->A5monthDATE->RequiredErrorMessage));
			}
		}
		if ($this->A5monthINHOUSE->Required) {
			if (!$this->A5monthINHOUSE->IsDetailKey && $this->A5monthINHOUSE->FormValue != NULL && $this->A5monthINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A5monthINHOUSE->caption(), $this->A5monthINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->A5monthREPORT->Required) {
			if (!$this->A5monthREPORT->IsDetailKey && $this->A5monthREPORT->FormValue != NULL && $this->A5monthREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A5monthREPORT->caption(), $this->A5monthREPORT->RequiredErrorMessage));
			}
		}
		if ($this->A7month->Required) {
			if (!$this->A7month->IsDetailKey && $this->A7month->FormValue != NULL && $this->A7month->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A7month->caption(), $this->A7month->RequiredErrorMessage));
			}
		}
		if ($this->A7monthDATE->Required) {
			if (!$this->A7monthDATE->IsDetailKey && $this->A7monthDATE->FormValue != NULL && $this->A7monthDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A7monthDATE->caption(), $this->A7monthDATE->RequiredErrorMessage));
			}
		}
		if ($this->A7monthINHOUSE->Required) {
			if (!$this->A7monthINHOUSE->IsDetailKey && $this->A7monthINHOUSE->FormValue != NULL && $this->A7monthINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A7monthINHOUSE->caption(), $this->A7monthINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->A7monthREPORT->Required) {
			if (!$this->A7monthREPORT->IsDetailKey && $this->A7monthREPORT->FormValue != NULL && $this->A7monthREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A7monthREPORT->caption(), $this->A7monthREPORT->RequiredErrorMessage));
			}
		}
		if ($this->A9month->Required) {
			if (!$this->A9month->IsDetailKey && $this->A9month->FormValue != NULL && $this->A9month->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A9month->caption(), $this->A9month->RequiredErrorMessage));
			}
		}
		if ($this->A9monthDATE->Required) {
			if (!$this->A9monthDATE->IsDetailKey && $this->A9monthDATE->FormValue != NULL && $this->A9monthDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A9monthDATE->caption(), $this->A9monthDATE->RequiredErrorMessage));
			}
		}
		if ($this->A9monthINHOUSE->Required) {
			if (!$this->A9monthINHOUSE->IsDetailKey && $this->A9monthINHOUSE->FormValue != NULL && $this->A9monthINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A9monthINHOUSE->caption(), $this->A9monthINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->A9monthREPORT->Required) {
			if (!$this->A9monthREPORT->IsDetailKey && $this->A9monthREPORT->FormValue != NULL && $this->A9monthREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A9monthREPORT->caption(), $this->A9monthREPORT->RequiredErrorMessage));
			}
		}
		if ($this->INJ->Required) {
			if (!$this->INJ->IsDetailKey && $this->INJ->FormValue != NULL && $this->INJ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INJ->caption(), $this->INJ->RequiredErrorMessage));
			}
		}
		if ($this->INJDATE->Required) {
			if (!$this->INJDATE->IsDetailKey && $this->INJDATE->FormValue != NULL && $this->INJDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INJDATE->caption(), $this->INJDATE->RequiredErrorMessage));
			}
		}
		if ($this->INJINHOUSE->Required) {
			if (!$this->INJINHOUSE->IsDetailKey && $this->INJINHOUSE->FormValue != NULL && $this->INJINHOUSE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INJINHOUSE->caption(), $this->INJINHOUSE->RequiredErrorMessage));
			}
		}
		if ($this->INJREPORT->Required) {
			if (!$this->INJREPORT->IsDetailKey && $this->INJREPORT->FormValue != NULL && $this->INJREPORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INJREPORT->caption(), $this->INJREPORT->RequiredErrorMessage));
			}
		}
		if ($this->Bleeding->Required) {
			if ($this->Bleeding->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Bleeding->caption(), $this->Bleeding->RequiredErrorMessage));
			}
		}
		if ($this->Hypothyroidism->Required) {
			if (!$this->Hypothyroidism->IsDetailKey && $this->Hypothyroidism->FormValue != NULL && $this->Hypothyroidism->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Hypothyroidism->caption(), $this->Hypothyroidism->RequiredErrorMessage));
			}
		}
		if ($this->PICMENumber->Required) {
			if (!$this->PICMENumber->IsDetailKey && $this->PICMENumber->FormValue != NULL && $this->PICMENumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PICMENumber->caption(), $this->PICMENumber->RequiredErrorMessage));
			}
		}
		if ($this->Outcome->Required) {
			if (!$this->Outcome->IsDetailKey && $this->Outcome->FormValue != NULL && $this->Outcome->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Outcome->caption(), $this->Outcome->RequiredErrorMessage));
			}
		}
		if ($this->DateofAdmission->Required) {
			if (!$this->DateofAdmission->IsDetailKey && $this->DateofAdmission->FormValue != NULL && $this->DateofAdmission->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
			}
		}
		if ($this->DateodProcedure->Required) {
			if (!$this->DateodProcedure->IsDetailKey && $this->DateodProcedure->FormValue != NULL && $this->DateodProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateodProcedure->caption(), $this->DateodProcedure->RequiredErrorMessage));
			}
		}
		if ($this->Miscarriage->Required) {
			if (!$this->Miscarriage->IsDetailKey && $this->Miscarriage->FormValue != NULL && $this->Miscarriage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Miscarriage->caption(), $this->Miscarriage->RequiredErrorMessage));
			}
		}
		if ($this->ModeOfDelivery->Required) {
			if (!$this->ModeOfDelivery->IsDetailKey && $this->ModeOfDelivery->FormValue != NULL && $this->ModeOfDelivery->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModeOfDelivery->caption(), $this->ModeOfDelivery->RequiredErrorMessage));
			}
		}
		if ($this->ND->Required) {
			if (!$this->ND->IsDetailKey && $this->ND->FormValue != NULL && $this->ND->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ND->caption(), $this->ND->RequiredErrorMessage));
			}
		}
		if ($this->NDS->Required) {
			if (!$this->NDS->IsDetailKey && $this->NDS->FormValue != NULL && $this->NDS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NDS->caption(), $this->NDS->RequiredErrorMessage));
			}
		}
		if ($this->NDP->Required) {
			if (!$this->NDP->IsDetailKey && $this->NDP->FormValue != NULL && $this->NDP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NDP->caption(), $this->NDP->RequiredErrorMessage));
			}
		}
		if ($this->Vaccum->Required) {
			if (!$this->Vaccum->IsDetailKey && $this->Vaccum->FormValue != NULL && $this->Vaccum->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vaccum->caption(), $this->Vaccum->RequiredErrorMessage));
			}
		}
		if ($this->VaccumS->Required) {
			if (!$this->VaccumS->IsDetailKey && $this->VaccumS->FormValue != NULL && $this->VaccumS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VaccumS->caption(), $this->VaccumS->RequiredErrorMessage));
			}
		}
		if ($this->VaccumP->Required) {
			if (!$this->VaccumP->IsDetailKey && $this->VaccumP->FormValue != NULL && $this->VaccumP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VaccumP->caption(), $this->VaccumP->RequiredErrorMessage));
			}
		}
		if ($this->Forceps->Required) {
			if (!$this->Forceps->IsDetailKey && $this->Forceps->FormValue != NULL && $this->Forceps->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Forceps->caption(), $this->Forceps->RequiredErrorMessage));
			}
		}
		if ($this->ForcepsS->Required) {
			if (!$this->ForcepsS->IsDetailKey && $this->ForcepsS->FormValue != NULL && $this->ForcepsS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ForcepsS->caption(), $this->ForcepsS->RequiredErrorMessage));
			}
		}
		if ($this->ForcepsP->Required) {
			if (!$this->ForcepsP->IsDetailKey && $this->ForcepsP->FormValue != NULL && $this->ForcepsP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ForcepsP->caption(), $this->ForcepsP->RequiredErrorMessage));
			}
		}
		if ($this->Elective->Required) {
			if (!$this->Elective->IsDetailKey && $this->Elective->FormValue != NULL && $this->Elective->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Elective->caption(), $this->Elective->RequiredErrorMessage));
			}
		}
		if ($this->ElectiveS->Required) {
			if (!$this->ElectiveS->IsDetailKey && $this->ElectiveS->FormValue != NULL && $this->ElectiveS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ElectiveS->caption(), $this->ElectiveS->RequiredErrorMessage));
			}
		}
		if ($this->ElectiveP->Required) {
			if (!$this->ElectiveP->IsDetailKey && $this->ElectiveP->FormValue != NULL && $this->ElectiveP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ElectiveP->caption(), $this->ElectiveP->RequiredErrorMessage));
			}
		}
		if ($this->Emergency->Required) {
			if (!$this->Emergency->IsDetailKey && $this->Emergency->FormValue != NULL && $this->Emergency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Emergency->caption(), $this->Emergency->RequiredErrorMessage));
			}
		}
		if ($this->EmergencyS->Required) {
			if (!$this->EmergencyS->IsDetailKey && $this->EmergencyS->FormValue != NULL && $this->EmergencyS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmergencyS->caption(), $this->EmergencyS->RequiredErrorMessage));
			}
		}
		if ($this->EmergencyP->Required) {
			if (!$this->EmergencyP->IsDetailKey && $this->EmergencyP->FormValue != NULL && $this->EmergencyP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmergencyP->caption(), $this->EmergencyP->RequiredErrorMessage));
			}
		}
		if ($this->Maturity->Required) {
			if (!$this->Maturity->IsDetailKey && $this->Maturity->FormValue != NULL && $this->Maturity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Maturity->caption(), $this->Maturity->RequiredErrorMessage));
			}
		}
		if ($this->Baby1->Required) {
			if (!$this->Baby1->IsDetailKey && $this->Baby1->FormValue != NULL && $this->Baby1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Baby1->caption(), $this->Baby1->RequiredErrorMessage));
			}
		}
		if ($this->Baby2->Required) {
			if (!$this->Baby2->IsDetailKey && $this->Baby2->FormValue != NULL && $this->Baby2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Baby2->caption(), $this->Baby2->RequiredErrorMessage));
			}
		}
		if ($this->sex1->Required) {
			if (!$this->sex1->IsDetailKey && $this->sex1->FormValue != NULL && $this->sex1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sex1->caption(), $this->sex1->RequiredErrorMessage));
			}
		}
		if ($this->sex2->Required) {
			if (!$this->sex2->IsDetailKey && $this->sex2->FormValue != NULL && $this->sex2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sex2->caption(), $this->sex2->RequiredErrorMessage));
			}
		}
		if ($this->weight1->Required) {
			if (!$this->weight1->IsDetailKey && $this->weight1->FormValue != NULL && $this->weight1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->weight1->caption(), $this->weight1->RequiredErrorMessage));
			}
		}
		if ($this->weight2->Required) {
			if (!$this->weight2->IsDetailKey && $this->weight2->FormValue != NULL && $this->weight2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->weight2->caption(), $this->weight2->RequiredErrorMessage));
			}
		}
		if ($this->NICU1->Required) {
			if (!$this->NICU1->IsDetailKey && $this->NICU1->FormValue != NULL && $this->NICU1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NICU1->caption(), $this->NICU1->RequiredErrorMessage));
			}
		}
		if ($this->NICU2->Required) {
			if (!$this->NICU2->IsDetailKey && $this->NICU2->FormValue != NULL && $this->NICU2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NICU2->caption(), $this->NICU2->RequiredErrorMessage));
			}
		}
		if ($this->Jaundice1->Required) {
			if (!$this->Jaundice1->IsDetailKey && $this->Jaundice1->FormValue != NULL && $this->Jaundice1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jaundice1->caption(), $this->Jaundice1->RequiredErrorMessage));
			}
		}
		if ($this->Jaundice2->Required) {
			if (!$this->Jaundice2->IsDetailKey && $this->Jaundice2->FormValue != NULL && $this->Jaundice2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Jaundice2->caption(), $this->Jaundice2->RequiredErrorMessage));
			}
		}
		if ($this->Others1->Required) {
			if (!$this->Others1->IsDetailKey && $this->Others1->FormValue != NULL && $this->Others1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Others1->caption(), $this->Others1->RequiredErrorMessage));
			}
		}
		if ($this->Others2->Required) {
			if (!$this->Others2->IsDetailKey && $this->Others2->FormValue != NULL && $this->Others2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Others2->caption(), $this->Others2->RequiredErrorMessage));
			}
		}
		if ($this->SpillOverReasons->Required) {
			if (!$this->SpillOverReasons->IsDetailKey && $this->SpillOverReasons->FormValue != NULL && $this->SpillOverReasons->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SpillOverReasons->caption(), $this->SpillOverReasons->RequiredErrorMessage));
			}
		}
		if ($this->ANClosed->Required) {
			if ($this->ANClosed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANClosed->caption(), $this->ANClosed->RequiredErrorMessage));
			}
		}
		if ($this->ANClosedDATE->Required) {
			if (!$this->ANClosedDATE->IsDetailKey && $this->ANClosedDATE->FormValue != NULL && $this->ANClosedDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ANClosedDATE->caption(), $this->ANClosedDATE->RequiredErrorMessage));
			}
		}
		if ($this->PastMedicalHistoryOthers->Required) {
			if (!$this->PastMedicalHistoryOthers->IsDetailKey && $this->PastMedicalHistoryOthers->FormValue != NULL && $this->PastMedicalHistoryOthers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastMedicalHistoryOthers->caption(), $this->PastMedicalHistoryOthers->RequiredErrorMessage));
			}
		}
		if ($this->PastSurgicalHistoryOthers->Required) {
			if (!$this->PastSurgicalHistoryOthers->IsDetailKey && $this->PastSurgicalHistoryOthers->FormValue != NULL && $this->PastSurgicalHistoryOthers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastSurgicalHistoryOthers->caption(), $this->PastSurgicalHistoryOthers->RequiredErrorMessage));
			}
		}
		if ($this->FamilyHistoryOthers->Required) {
			if (!$this->FamilyHistoryOthers->IsDetailKey && $this->FamilyHistoryOthers->FormValue != NULL && $this->FamilyHistoryOthers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FamilyHistoryOthers->caption(), $this->FamilyHistoryOthers->RequiredErrorMessage));
			}
		}
		if ($this->PresentPregnancyComplicationsOthers->Required) {
			if (!$this->PresentPregnancyComplicationsOthers->IsDetailKey && $this->PresentPregnancyComplicationsOthers->FormValue != NULL && $this->PresentPregnancyComplicationsOthers->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PresentPregnancyComplicationsOthers->caption(), $this->PresentPregnancyComplicationsOthers->RequiredErrorMessage));
			}
		}
		if ($this->ETdate->Required) {
			if (!$this->ETdate->IsDetailKey && $this->ETdate->FormValue != NULL && $this->ETdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETdate->caption(), $this->ETdate->RequiredErrorMessage));
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

			// pid
			$this->pid->setDbValueDef($rsnew, $this->pid->CurrentValue, NULL, $this->pid->ReadOnly);

			// fid
			$this->fid->setDbValueDef($rsnew, $this->fid->CurrentValue, NULL, $this->fid->ReadOnly);

			// G
			$this->G->setDbValueDef($rsnew, $this->G->CurrentValue, NULL, $this->G->ReadOnly);

			// P
			$this->P->setDbValueDef($rsnew, $this->P->CurrentValue, NULL, $this->P->ReadOnly);

			// L
			$this->L->setDbValueDef($rsnew, $this->L->CurrentValue, NULL, $this->L->ReadOnly);

			// A
			$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, NULL, $this->A->ReadOnly);

			// E
			$this->E->setDbValueDef($rsnew, $this->E->CurrentValue, NULL, $this->E->ReadOnly);

			// M
			$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, NULL, $this->M->ReadOnly);

			// LMP
			$this->LMP->setDbValueDef($rsnew, $this->LMP->CurrentValue, NULL, $this->LMP->ReadOnly);

			// EDO
			$this->EDO->setDbValueDef($rsnew, $this->EDO->CurrentValue, NULL, $this->EDO->ReadOnly);

			// MenstrualHistory
			$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, $this->MenstrualHistory->ReadOnly);

			// MaritalHistory
			$this->MaritalHistory->setDbValueDef($rsnew, $this->MaritalHistory->CurrentValue, NULL, $this->MaritalHistory->ReadOnly);

			// ObstetricHistory
			$this->ObstetricHistory->setDbValueDef($rsnew, $this->ObstetricHistory->CurrentValue, NULL, $this->ObstetricHistory->ReadOnly);

			// PreviousHistoryofGDM
			$this->PreviousHistoryofGDM->setDbValueDef($rsnew, $this->PreviousHistoryofGDM->CurrentValue, NULL, $this->PreviousHistoryofGDM->ReadOnly);

			// PreviousHistorofPIH
			$this->PreviousHistorofPIH->setDbValueDef($rsnew, $this->PreviousHistorofPIH->CurrentValue, NULL, $this->PreviousHistorofPIH->ReadOnly);

			// PreviousHistoryofIUGR
			$this->PreviousHistoryofIUGR->setDbValueDef($rsnew, $this->PreviousHistoryofIUGR->CurrentValue, NULL, $this->PreviousHistoryofIUGR->ReadOnly);

			// PreviousHistoryofOligohydramnios
			$this->PreviousHistoryofOligohydramnios->setDbValueDef($rsnew, $this->PreviousHistoryofOligohydramnios->CurrentValue, NULL, $this->PreviousHistoryofOligohydramnios->ReadOnly);

			// PreviousHistoryofPreterm
			$this->PreviousHistoryofPreterm->setDbValueDef($rsnew, $this->PreviousHistoryofPreterm->CurrentValue, NULL, $this->PreviousHistoryofPreterm->ReadOnly);

			// G1
			$this->G1->setDbValueDef($rsnew, $this->G1->CurrentValue, NULL, $this->G1->ReadOnly);

			// G2
			$this->G2->setDbValueDef($rsnew, $this->G2->CurrentValue, NULL, $this->G2->ReadOnly);

			// G3
			$this->G3->setDbValueDef($rsnew, $this->G3->CurrentValue, NULL, $this->G3->ReadOnly);

			// DeliveryNDLSCS1
			$this->DeliveryNDLSCS1->setDbValueDef($rsnew, $this->DeliveryNDLSCS1->CurrentValue, NULL, $this->DeliveryNDLSCS1->ReadOnly);

			// DeliveryNDLSCS2
			$this->DeliveryNDLSCS2->setDbValueDef($rsnew, $this->DeliveryNDLSCS2->CurrentValue, NULL, $this->DeliveryNDLSCS2->ReadOnly);

			// DeliveryNDLSCS3
			$this->DeliveryNDLSCS3->setDbValueDef($rsnew, $this->DeliveryNDLSCS3->CurrentValue, NULL, $this->DeliveryNDLSCS3->ReadOnly);

			// BabySexweight1
			$this->BabySexweight1->setDbValueDef($rsnew, $this->BabySexweight1->CurrentValue, NULL, $this->BabySexweight1->ReadOnly);

			// BabySexweight2
			$this->BabySexweight2->setDbValueDef($rsnew, $this->BabySexweight2->CurrentValue, NULL, $this->BabySexweight2->ReadOnly);

			// BabySexweight3
			$this->BabySexweight3->setDbValueDef($rsnew, $this->BabySexweight3->CurrentValue, NULL, $this->BabySexweight3->ReadOnly);

			// PastMedicalHistory
			$this->PastMedicalHistory->setDbValueDef($rsnew, $this->PastMedicalHistory->CurrentValue, NULL, $this->PastMedicalHistory->ReadOnly);

			// PastSurgicalHistory
			$this->PastSurgicalHistory->setDbValueDef($rsnew, $this->PastSurgicalHistory->CurrentValue, NULL, $this->PastSurgicalHistory->ReadOnly);

			// FamilyHistory
			$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, $this->FamilyHistory->ReadOnly);

			// Viability
			$this->Viability->setDbValueDef($rsnew, $this->Viability->CurrentValue, NULL, $this->Viability->ReadOnly);

			// ViabilityDATE
			$this->ViabilityDATE->setDbValueDef($rsnew, $this->ViabilityDATE->CurrentValue, NULL, $this->ViabilityDATE->ReadOnly);

			// ViabilityREPORT
			$this->ViabilityREPORT->setDbValueDef($rsnew, $this->ViabilityREPORT->CurrentValue, NULL, $this->ViabilityREPORT->ReadOnly);

			// Viability2
			$this->Viability2->setDbValueDef($rsnew, $this->Viability2->CurrentValue, NULL, $this->Viability2->ReadOnly);

			// Viability2DATE
			$this->Viability2DATE->setDbValueDef($rsnew, $this->Viability2DATE->CurrentValue, NULL, $this->Viability2DATE->ReadOnly);

			// Viability2REPORT
			$this->Viability2REPORT->setDbValueDef($rsnew, $this->Viability2REPORT->CurrentValue, NULL, $this->Viability2REPORT->ReadOnly);

			// NTscan
			$this->NTscan->setDbValueDef($rsnew, $this->NTscan->CurrentValue, NULL, $this->NTscan->ReadOnly);

			// NTscanDATE
			$this->NTscanDATE->setDbValueDef($rsnew, $this->NTscanDATE->CurrentValue, NULL, $this->NTscanDATE->ReadOnly);

			// NTscanREPORT
			$this->NTscanREPORT->setDbValueDef($rsnew, $this->NTscanREPORT->CurrentValue, NULL, $this->NTscanREPORT->ReadOnly);

			// EarlyTarget
			$this->EarlyTarget->setDbValueDef($rsnew, $this->EarlyTarget->CurrentValue, NULL, $this->EarlyTarget->ReadOnly);

			// EarlyTargetDATE
			$this->EarlyTargetDATE->setDbValueDef($rsnew, $this->EarlyTargetDATE->CurrentValue, NULL, $this->EarlyTargetDATE->ReadOnly);

			// EarlyTargetREPORT
			$this->EarlyTargetREPORT->setDbValueDef($rsnew, $this->EarlyTargetREPORT->CurrentValue, NULL, $this->EarlyTargetREPORT->ReadOnly);

			// Anomaly
			$this->Anomaly->setDbValueDef($rsnew, $this->Anomaly->CurrentValue, NULL, $this->Anomaly->ReadOnly);

			// AnomalyDATE
			$this->AnomalyDATE->setDbValueDef($rsnew, $this->AnomalyDATE->CurrentValue, NULL, $this->AnomalyDATE->ReadOnly);

			// AnomalyREPORT
			$this->AnomalyREPORT->setDbValueDef($rsnew, $this->AnomalyREPORT->CurrentValue, NULL, $this->AnomalyREPORT->ReadOnly);

			// Growth
			$this->Growth->setDbValueDef($rsnew, $this->Growth->CurrentValue, NULL, $this->Growth->ReadOnly);

			// GrowthDATE
			$this->GrowthDATE->setDbValueDef($rsnew, $this->GrowthDATE->CurrentValue, NULL, $this->GrowthDATE->ReadOnly);

			// GrowthREPORT
			$this->GrowthREPORT->setDbValueDef($rsnew, $this->GrowthREPORT->CurrentValue, NULL, $this->GrowthREPORT->ReadOnly);

			// Growth1
			$this->Growth1->setDbValueDef($rsnew, $this->Growth1->CurrentValue, NULL, $this->Growth1->ReadOnly);

			// Growth1DATE
			$this->Growth1DATE->setDbValueDef($rsnew, $this->Growth1DATE->CurrentValue, NULL, $this->Growth1DATE->ReadOnly);

			// Growth1REPORT
			$this->Growth1REPORT->setDbValueDef($rsnew, $this->Growth1REPORT->CurrentValue, NULL, $this->Growth1REPORT->ReadOnly);

			// ANProfile
			$this->ANProfile->setDbValueDef($rsnew, $this->ANProfile->CurrentValue, NULL, $this->ANProfile->ReadOnly);

			// ANProfileDATE
			$this->ANProfileDATE->setDbValueDef($rsnew, $this->ANProfileDATE->CurrentValue, NULL, $this->ANProfileDATE->ReadOnly);

			// ANProfileINHOUSE
			$this->ANProfileINHOUSE->setDbValueDef($rsnew, $this->ANProfileINHOUSE->CurrentValue, NULL, $this->ANProfileINHOUSE->ReadOnly);

			// ANProfileREPORT
			$this->ANProfileREPORT->setDbValueDef($rsnew, $this->ANProfileREPORT->CurrentValue, NULL, $this->ANProfileREPORT->ReadOnly);

			// DualMarker
			$this->DualMarker->setDbValueDef($rsnew, $this->DualMarker->CurrentValue, NULL, $this->DualMarker->ReadOnly);

			// DualMarkerDATE
			$this->DualMarkerDATE->setDbValueDef($rsnew, $this->DualMarkerDATE->CurrentValue, NULL, $this->DualMarkerDATE->ReadOnly);

			// DualMarkerINHOUSE
			$this->DualMarkerINHOUSE->setDbValueDef($rsnew, $this->DualMarkerINHOUSE->CurrentValue, NULL, $this->DualMarkerINHOUSE->ReadOnly);

			// DualMarkerREPORT
			$this->DualMarkerREPORT->setDbValueDef($rsnew, $this->DualMarkerREPORT->CurrentValue, NULL, $this->DualMarkerREPORT->ReadOnly);

			// Quadruple
			$this->Quadruple->setDbValueDef($rsnew, $this->Quadruple->CurrentValue, NULL, $this->Quadruple->ReadOnly);

			// QuadrupleDATE
			$this->QuadrupleDATE->setDbValueDef($rsnew, $this->QuadrupleDATE->CurrentValue, NULL, $this->QuadrupleDATE->ReadOnly);

			// QuadrupleINHOUSE
			$this->QuadrupleINHOUSE->setDbValueDef($rsnew, $this->QuadrupleINHOUSE->CurrentValue, NULL, $this->QuadrupleINHOUSE->ReadOnly);

			// QuadrupleREPORT
			$this->QuadrupleREPORT->setDbValueDef($rsnew, $this->QuadrupleREPORT->CurrentValue, NULL, $this->QuadrupleREPORT->ReadOnly);

			// A5month
			$this->A5month->setDbValueDef($rsnew, $this->A5month->CurrentValue, NULL, $this->A5month->ReadOnly);

			// A5monthDATE
			$this->A5monthDATE->setDbValueDef($rsnew, $this->A5monthDATE->CurrentValue, NULL, $this->A5monthDATE->ReadOnly);

			// A5monthINHOUSE
			$this->A5monthINHOUSE->setDbValueDef($rsnew, $this->A5monthINHOUSE->CurrentValue, NULL, $this->A5monthINHOUSE->ReadOnly);

			// A5monthREPORT
			$this->A5monthREPORT->setDbValueDef($rsnew, $this->A5monthREPORT->CurrentValue, NULL, $this->A5monthREPORT->ReadOnly);

			// A7month
			$this->A7month->setDbValueDef($rsnew, $this->A7month->CurrentValue, NULL, $this->A7month->ReadOnly);

			// A7monthDATE
			$this->A7monthDATE->setDbValueDef($rsnew, $this->A7monthDATE->CurrentValue, NULL, $this->A7monthDATE->ReadOnly);

			// A7monthINHOUSE
			$this->A7monthINHOUSE->setDbValueDef($rsnew, $this->A7monthINHOUSE->CurrentValue, NULL, $this->A7monthINHOUSE->ReadOnly);

			// A7monthREPORT
			$this->A7monthREPORT->setDbValueDef($rsnew, $this->A7monthREPORT->CurrentValue, NULL, $this->A7monthREPORT->ReadOnly);

			// A9month
			$this->A9month->setDbValueDef($rsnew, $this->A9month->CurrentValue, NULL, $this->A9month->ReadOnly);

			// A9monthDATE
			$this->A9monthDATE->setDbValueDef($rsnew, $this->A9monthDATE->CurrentValue, NULL, $this->A9monthDATE->ReadOnly);

			// A9monthINHOUSE
			$this->A9monthINHOUSE->setDbValueDef($rsnew, $this->A9monthINHOUSE->CurrentValue, NULL, $this->A9monthINHOUSE->ReadOnly);

			// A9monthREPORT
			$this->A9monthREPORT->setDbValueDef($rsnew, $this->A9monthREPORT->CurrentValue, NULL, $this->A9monthREPORT->ReadOnly);

			// INJ
			$this->INJ->setDbValueDef($rsnew, $this->INJ->CurrentValue, NULL, $this->INJ->ReadOnly);

			// INJDATE
			$this->INJDATE->setDbValueDef($rsnew, $this->INJDATE->CurrentValue, NULL, $this->INJDATE->ReadOnly);

			// INJINHOUSE
			$this->INJINHOUSE->setDbValueDef($rsnew, $this->INJINHOUSE->CurrentValue, NULL, $this->INJINHOUSE->ReadOnly);

			// INJREPORT
			$this->INJREPORT->setDbValueDef($rsnew, $this->INJREPORT->CurrentValue, NULL, $this->INJREPORT->ReadOnly);

			// Bleeding
			$this->Bleeding->setDbValueDef($rsnew, $this->Bleeding->CurrentValue, NULL, $this->Bleeding->ReadOnly);

			// Hypothyroidism
			$this->Hypothyroidism->setDbValueDef($rsnew, $this->Hypothyroidism->CurrentValue, NULL, $this->Hypothyroidism->ReadOnly);

			// PICMENumber
			$this->PICMENumber->setDbValueDef($rsnew, $this->PICMENumber->CurrentValue, NULL, $this->PICMENumber->ReadOnly);

			// Outcome
			$this->Outcome->setDbValueDef($rsnew, $this->Outcome->CurrentValue, NULL, $this->Outcome->ReadOnly);

			// DateofAdmission
			$this->DateofAdmission->setDbValueDef($rsnew, $this->DateofAdmission->CurrentValue, NULL, $this->DateofAdmission->ReadOnly);

			// DateodProcedure
			$this->DateodProcedure->setDbValueDef($rsnew, $this->DateodProcedure->CurrentValue, NULL, $this->DateodProcedure->ReadOnly);

			// Miscarriage
			$this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, NULL, $this->Miscarriage->ReadOnly);

			// ModeOfDelivery
			$this->ModeOfDelivery->setDbValueDef($rsnew, $this->ModeOfDelivery->CurrentValue, NULL, $this->ModeOfDelivery->ReadOnly);

			// ND
			$this->ND->setDbValueDef($rsnew, $this->ND->CurrentValue, NULL, $this->ND->ReadOnly);

			// NDS
			$this->NDS->setDbValueDef($rsnew, $this->NDS->CurrentValue, NULL, $this->NDS->ReadOnly);

			// NDP
			$this->NDP->setDbValueDef($rsnew, $this->NDP->CurrentValue, NULL, $this->NDP->ReadOnly);

			// Vaccum
			$this->Vaccum->setDbValueDef($rsnew, $this->Vaccum->CurrentValue, NULL, $this->Vaccum->ReadOnly);

			// VaccumS
			$this->VaccumS->setDbValueDef($rsnew, $this->VaccumS->CurrentValue, NULL, $this->VaccumS->ReadOnly);

			// VaccumP
			$this->VaccumP->setDbValueDef($rsnew, $this->VaccumP->CurrentValue, NULL, $this->VaccumP->ReadOnly);

			// Forceps
			$this->Forceps->setDbValueDef($rsnew, $this->Forceps->CurrentValue, NULL, $this->Forceps->ReadOnly);

			// ForcepsS
			$this->ForcepsS->setDbValueDef($rsnew, $this->ForcepsS->CurrentValue, NULL, $this->ForcepsS->ReadOnly);

			// ForcepsP
			$this->ForcepsP->setDbValueDef($rsnew, $this->ForcepsP->CurrentValue, NULL, $this->ForcepsP->ReadOnly);

			// Elective
			$this->Elective->setDbValueDef($rsnew, $this->Elective->CurrentValue, NULL, $this->Elective->ReadOnly);

			// ElectiveS
			$this->ElectiveS->setDbValueDef($rsnew, $this->ElectiveS->CurrentValue, NULL, $this->ElectiveS->ReadOnly);

			// ElectiveP
			$this->ElectiveP->setDbValueDef($rsnew, $this->ElectiveP->CurrentValue, NULL, $this->ElectiveP->ReadOnly);

			// Emergency
			$this->Emergency->setDbValueDef($rsnew, $this->Emergency->CurrentValue, NULL, $this->Emergency->ReadOnly);

			// EmergencyS
			$this->EmergencyS->setDbValueDef($rsnew, $this->EmergencyS->CurrentValue, NULL, $this->EmergencyS->ReadOnly);

			// EmergencyP
			$this->EmergencyP->setDbValueDef($rsnew, $this->EmergencyP->CurrentValue, NULL, $this->EmergencyP->ReadOnly);

			// Maturity
			$this->Maturity->setDbValueDef($rsnew, $this->Maturity->CurrentValue, NULL, $this->Maturity->ReadOnly);

			// Baby1
			$this->Baby1->setDbValueDef($rsnew, $this->Baby1->CurrentValue, NULL, $this->Baby1->ReadOnly);

			// Baby2
			$this->Baby2->setDbValueDef($rsnew, $this->Baby2->CurrentValue, NULL, $this->Baby2->ReadOnly);

			// sex1
			$this->sex1->setDbValueDef($rsnew, $this->sex1->CurrentValue, NULL, $this->sex1->ReadOnly);

			// sex2
			$this->sex2->setDbValueDef($rsnew, $this->sex2->CurrentValue, NULL, $this->sex2->ReadOnly);

			// weight1
			$this->weight1->setDbValueDef($rsnew, $this->weight1->CurrentValue, NULL, $this->weight1->ReadOnly);

			// weight2
			$this->weight2->setDbValueDef($rsnew, $this->weight2->CurrentValue, NULL, $this->weight2->ReadOnly);

			// NICU1
			$this->NICU1->setDbValueDef($rsnew, $this->NICU1->CurrentValue, NULL, $this->NICU1->ReadOnly);

			// NICU2
			$this->NICU2->setDbValueDef($rsnew, $this->NICU2->CurrentValue, NULL, $this->NICU2->ReadOnly);

			// Jaundice1
			$this->Jaundice1->setDbValueDef($rsnew, $this->Jaundice1->CurrentValue, NULL, $this->Jaundice1->ReadOnly);

			// Jaundice2
			$this->Jaundice2->setDbValueDef($rsnew, $this->Jaundice2->CurrentValue, NULL, $this->Jaundice2->ReadOnly);

			// Others1
			$this->Others1->setDbValueDef($rsnew, $this->Others1->CurrentValue, NULL, $this->Others1->ReadOnly);

			// Others2
			$this->Others2->setDbValueDef($rsnew, $this->Others2->CurrentValue, NULL, $this->Others2->ReadOnly);

			// SpillOverReasons
			$this->SpillOverReasons->setDbValueDef($rsnew, $this->SpillOverReasons->CurrentValue, NULL, $this->SpillOverReasons->ReadOnly);

			// ANClosed
			$this->ANClosed->setDbValueDef($rsnew, $this->ANClosed->CurrentValue, NULL, $this->ANClosed->ReadOnly);

			// ANClosedDATE
			$this->ANClosedDATE->setDbValueDef($rsnew, $this->ANClosedDATE->CurrentValue, NULL, $this->ANClosedDATE->ReadOnly);

			// PastMedicalHistoryOthers
			$this->PastMedicalHistoryOthers->setDbValueDef($rsnew, $this->PastMedicalHistoryOthers->CurrentValue, NULL, $this->PastMedicalHistoryOthers->ReadOnly);

			// PastSurgicalHistoryOthers
			$this->PastSurgicalHistoryOthers->setDbValueDef($rsnew, $this->PastSurgicalHistoryOthers->CurrentValue, NULL, $this->PastSurgicalHistoryOthers->ReadOnly);

			// FamilyHistoryOthers
			$this->FamilyHistoryOthers->setDbValueDef($rsnew, $this->FamilyHistoryOthers->CurrentValue, NULL, $this->FamilyHistoryOthers->ReadOnly);

			// PresentPregnancyComplicationsOthers
			$this->PresentPregnancyComplicationsOthers->setDbValueDef($rsnew, $this->PresentPregnancyComplicationsOthers->CurrentValue, NULL, $this->PresentPregnancyComplicationsOthers->ReadOnly);

			// ETdate
			$this->ETdate->setDbValueDef($rsnew, $this->ETdate->CurrentValue, NULL, $this->ETdate->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "patient_opd_follow_up") {
				$this->fid->CurrentValue = $this->fid->getSessionValue();
				$this->pid->CurrentValue = $this->pid->getSessionValue();
			}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// pid
		$this->pid->setDbValueDef($rsnew, $this->pid->CurrentValue, NULL, FALSE);

		// fid
		$this->fid->setDbValueDef($rsnew, $this->fid->CurrentValue, NULL, FALSE);

		// G
		$this->G->setDbValueDef($rsnew, $this->G->CurrentValue, NULL, FALSE);

		// P
		$this->P->setDbValueDef($rsnew, $this->P->CurrentValue, NULL, FALSE);

		// L
		$this->L->setDbValueDef($rsnew, $this->L->CurrentValue, NULL, FALSE);

		// A
		$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, NULL, FALSE);

		// E
		$this->E->setDbValueDef($rsnew, $this->E->CurrentValue, NULL, FALSE);

		// M
		$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, NULL, FALSE);

		// LMP
		$this->LMP->setDbValueDef($rsnew, $this->LMP->CurrentValue, NULL, FALSE);

		// EDO
		$this->EDO->setDbValueDef($rsnew, $this->EDO->CurrentValue, NULL, FALSE);

		// MenstrualHistory
		$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, FALSE);

		// MaritalHistory
		$this->MaritalHistory->setDbValueDef($rsnew, $this->MaritalHistory->CurrentValue, NULL, FALSE);

		// ObstetricHistory
		$this->ObstetricHistory->setDbValueDef($rsnew, $this->ObstetricHistory->CurrentValue, NULL, FALSE);

		// PreviousHistoryofGDM
		$this->PreviousHistoryofGDM->setDbValueDef($rsnew, $this->PreviousHistoryofGDM->CurrentValue, NULL, FALSE);

		// PreviousHistorofPIH
		$this->PreviousHistorofPIH->setDbValueDef($rsnew, $this->PreviousHistorofPIH->CurrentValue, NULL, FALSE);

		// PreviousHistoryofIUGR
		$this->PreviousHistoryofIUGR->setDbValueDef($rsnew, $this->PreviousHistoryofIUGR->CurrentValue, NULL, FALSE);

		// PreviousHistoryofOligohydramnios
		$this->PreviousHistoryofOligohydramnios->setDbValueDef($rsnew, $this->PreviousHistoryofOligohydramnios->CurrentValue, NULL, FALSE);

		// PreviousHistoryofPreterm
		$this->PreviousHistoryofPreterm->setDbValueDef($rsnew, $this->PreviousHistoryofPreterm->CurrentValue, NULL, FALSE);

		// G1
		$this->G1->setDbValueDef($rsnew, $this->G1->CurrentValue, NULL, FALSE);

		// G2
		$this->G2->setDbValueDef($rsnew, $this->G2->CurrentValue, NULL, FALSE);

		// G3
		$this->G3->setDbValueDef($rsnew, $this->G3->CurrentValue, NULL, FALSE);

		// DeliveryNDLSCS1
		$this->DeliveryNDLSCS1->setDbValueDef($rsnew, $this->DeliveryNDLSCS1->CurrentValue, NULL, FALSE);

		// DeliveryNDLSCS2
		$this->DeliveryNDLSCS2->setDbValueDef($rsnew, $this->DeliveryNDLSCS2->CurrentValue, NULL, FALSE);

		// DeliveryNDLSCS3
		$this->DeliveryNDLSCS3->setDbValueDef($rsnew, $this->DeliveryNDLSCS3->CurrentValue, NULL, FALSE);

		// BabySexweight1
		$this->BabySexweight1->setDbValueDef($rsnew, $this->BabySexweight1->CurrentValue, NULL, FALSE);

		// BabySexweight2
		$this->BabySexweight2->setDbValueDef($rsnew, $this->BabySexweight2->CurrentValue, NULL, FALSE);

		// BabySexweight3
		$this->BabySexweight3->setDbValueDef($rsnew, $this->BabySexweight3->CurrentValue, NULL, FALSE);

		// PastMedicalHistory
		$this->PastMedicalHistory->setDbValueDef($rsnew, $this->PastMedicalHistory->CurrentValue, NULL, FALSE);

		// PastSurgicalHistory
		$this->PastSurgicalHistory->setDbValueDef($rsnew, $this->PastSurgicalHistory->CurrentValue, NULL, FALSE);

		// FamilyHistory
		$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, FALSE);

		// Viability
		$this->Viability->setDbValueDef($rsnew, $this->Viability->CurrentValue, NULL, FALSE);

		// ViabilityDATE
		$this->ViabilityDATE->setDbValueDef($rsnew, $this->ViabilityDATE->CurrentValue, NULL, FALSE);

		// ViabilityREPORT
		$this->ViabilityREPORT->setDbValueDef($rsnew, $this->ViabilityREPORT->CurrentValue, NULL, FALSE);

		// Viability2
		$this->Viability2->setDbValueDef($rsnew, $this->Viability2->CurrentValue, NULL, FALSE);

		// Viability2DATE
		$this->Viability2DATE->setDbValueDef($rsnew, $this->Viability2DATE->CurrentValue, NULL, FALSE);

		// Viability2REPORT
		$this->Viability2REPORT->setDbValueDef($rsnew, $this->Viability2REPORT->CurrentValue, NULL, FALSE);

		// NTscan
		$this->NTscan->setDbValueDef($rsnew, $this->NTscan->CurrentValue, NULL, FALSE);

		// NTscanDATE
		$this->NTscanDATE->setDbValueDef($rsnew, $this->NTscanDATE->CurrentValue, NULL, FALSE);

		// NTscanREPORT
		$this->NTscanREPORT->setDbValueDef($rsnew, $this->NTscanREPORT->CurrentValue, NULL, FALSE);

		// EarlyTarget
		$this->EarlyTarget->setDbValueDef($rsnew, $this->EarlyTarget->CurrentValue, NULL, FALSE);

		// EarlyTargetDATE
		$this->EarlyTargetDATE->setDbValueDef($rsnew, $this->EarlyTargetDATE->CurrentValue, NULL, FALSE);

		// EarlyTargetREPORT
		$this->EarlyTargetREPORT->setDbValueDef($rsnew, $this->EarlyTargetREPORT->CurrentValue, NULL, FALSE);

		// Anomaly
		$this->Anomaly->setDbValueDef($rsnew, $this->Anomaly->CurrentValue, NULL, FALSE);

		// AnomalyDATE
		$this->AnomalyDATE->setDbValueDef($rsnew, $this->AnomalyDATE->CurrentValue, NULL, FALSE);

		// AnomalyREPORT
		$this->AnomalyREPORT->setDbValueDef($rsnew, $this->AnomalyREPORT->CurrentValue, NULL, FALSE);

		// Growth
		$this->Growth->setDbValueDef($rsnew, $this->Growth->CurrentValue, NULL, FALSE);

		// GrowthDATE
		$this->GrowthDATE->setDbValueDef($rsnew, $this->GrowthDATE->CurrentValue, NULL, FALSE);

		// GrowthREPORT
		$this->GrowthREPORT->setDbValueDef($rsnew, $this->GrowthREPORT->CurrentValue, NULL, FALSE);

		// Growth1
		$this->Growth1->setDbValueDef($rsnew, $this->Growth1->CurrentValue, NULL, FALSE);

		// Growth1DATE
		$this->Growth1DATE->setDbValueDef($rsnew, $this->Growth1DATE->CurrentValue, NULL, FALSE);

		// Growth1REPORT
		$this->Growth1REPORT->setDbValueDef($rsnew, $this->Growth1REPORT->CurrentValue, NULL, FALSE);

		// ANProfile
		$this->ANProfile->setDbValueDef($rsnew, $this->ANProfile->CurrentValue, NULL, FALSE);

		// ANProfileDATE
		$this->ANProfileDATE->setDbValueDef($rsnew, $this->ANProfileDATE->CurrentValue, NULL, FALSE);

		// ANProfileINHOUSE
		$this->ANProfileINHOUSE->setDbValueDef($rsnew, $this->ANProfileINHOUSE->CurrentValue, NULL, FALSE);

		// ANProfileREPORT
		$this->ANProfileREPORT->setDbValueDef($rsnew, $this->ANProfileREPORT->CurrentValue, NULL, FALSE);

		// DualMarker
		$this->DualMarker->setDbValueDef($rsnew, $this->DualMarker->CurrentValue, NULL, FALSE);

		// DualMarkerDATE
		$this->DualMarkerDATE->setDbValueDef($rsnew, $this->DualMarkerDATE->CurrentValue, NULL, FALSE);

		// DualMarkerINHOUSE
		$this->DualMarkerINHOUSE->setDbValueDef($rsnew, $this->DualMarkerINHOUSE->CurrentValue, NULL, FALSE);

		// DualMarkerREPORT
		$this->DualMarkerREPORT->setDbValueDef($rsnew, $this->DualMarkerREPORT->CurrentValue, NULL, FALSE);

		// Quadruple
		$this->Quadruple->setDbValueDef($rsnew, $this->Quadruple->CurrentValue, NULL, FALSE);

		// QuadrupleDATE
		$this->QuadrupleDATE->setDbValueDef($rsnew, $this->QuadrupleDATE->CurrentValue, NULL, FALSE);

		// QuadrupleINHOUSE
		$this->QuadrupleINHOUSE->setDbValueDef($rsnew, $this->QuadrupleINHOUSE->CurrentValue, NULL, FALSE);

		// QuadrupleREPORT
		$this->QuadrupleREPORT->setDbValueDef($rsnew, $this->QuadrupleREPORT->CurrentValue, NULL, FALSE);

		// A5month
		$this->A5month->setDbValueDef($rsnew, $this->A5month->CurrentValue, NULL, FALSE);

		// A5monthDATE
		$this->A5monthDATE->setDbValueDef($rsnew, $this->A5monthDATE->CurrentValue, NULL, FALSE);

		// A5monthINHOUSE
		$this->A5monthINHOUSE->setDbValueDef($rsnew, $this->A5monthINHOUSE->CurrentValue, NULL, FALSE);

		// A5monthREPORT
		$this->A5monthREPORT->setDbValueDef($rsnew, $this->A5monthREPORT->CurrentValue, NULL, FALSE);

		// A7month
		$this->A7month->setDbValueDef($rsnew, $this->A7month->CurrentValue, NULL, FALSE);

		// A7monthDATE
		$this->A7monthDATE->setDbValueDef($rsnew, $this->A7monthDATE->CurrentValue, NULL, FALSE);

		// A7monthINHOUSE
		$this->A7monthINHOUSE->setDbValueDef($rsnew, $this->A7monthINHOUSE->CurrentValue, NULL, FALSE);

		// A7monthREPORT
		$this->A7monthREPORT->setDbValueDef($rsnew, $this->A7monthREPORT->CurrentValue, NULL, FALSE);

		// A9month
		$this->A9month->setDbValueDef($rsnew, $this->A9month->CurrentValue, NULL, FALSE);

		// A9monthDATE
		$this->A9monthDATE->setDbValueDef($rsnew, $this->A9monthDATE->CurrentValue, NULL, FALSE);

		// A9monthINHOUSE
		$this->A9monthINHOUSE->setDbValueDef($rsnew, $this->A9monthINHOUSE->CurrentValue, NULL, FALSE);

		// A9monthREPORT
		$this->A9monthREPORT->setDbValueDef($rsnew, $this->A9monthREPORT->CurrentValue, NULL, FALSE);

		// INJ
		$this->INJ->setDbValueDef($rsnew, $this->INJ->CurrentValue, NULL, FALSE);

		// INJDATE
		$this->INJDATE->setDbValueDef($rsnew, $this->INJDATE->CurrentValue, NULL, FALSE);

		// INJINHOUSE
		$this->INJINHOUSE->setDbValueDef($rsnew, $this->INJINHOUSE->CurrentValue, NULL, FALSE);

		// INJREPORT
		$this->INJREPORT->setDbValueDef($rsnew, $this->INJREPORT->CurrentValue, NULL, FALSE);

		// Bleeding
		$this->Bleeding->setDbValueDef($rsnew, $this->Bleeding->CurrentValue, NULL, FALSE);

		// Hypothyroidism
		$this->Hypothyroidism->setDbValueDef($rsnew, $this->Hypothyroidism->CurrentValue, NULL, FALSE);

		// PICMENumber
		$this->PICMENumber->setDbValueDef($rsnew, $this->PICMENumber->CurrentValue, NULL, FALSE);

		// Outcome
		$this->Outcome->setDbValueDef($rsnew, $this->Outcome->CurrentValue, NULL, FALSE);

		// DateofAdmission
		$this->DateofAdmission->setDbValueDef($rsnew, $this->DateofAdmission->CurrentValue, NULL, FALSE);

		// DateodProcedure
		$this->DateodProcedure->setDbValueDef($rsnew, $this->DateodProcedure->CurrentValue, NULL, FALSE);

		// Miscarriage
		$this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, NULL, FALSE);

		// ModeOfDelivery
		$this->ModeOfDelivery->setDbValueDef($rsnew, $this->ModeOfDelivery->CurrentValue, NULL, FALSE);

		// ND
		$this->ND->setDbValueDef($rsnew, $this->ND->CurrentValue, NULL, FALSE);

		// NDS
		$this->NDS->setDbValueDef($rsnew, $this->NDS->CurrentValue, NULL, FALSE);

		// NDP
		$this->NDP->setDbValueDef($rsnew, $this->NDP->CurrentValue, NULL, FALSE);

		// Vaccum
		$this->Vaccum->setDbValueDef($rsnew, $this->Vaccum->CurrentValue, NULL, FALSE);

		// VaccumS
		$this->VaccumS->setDbValueDef($rsnew, $this->VaccumS->CurrentValue, NULL, FALSE);

		// VaccumP
		$this->VaccumP->setDbValueDef($rsnew, $this->VaccumP->CurrentValue, NULL, FALSE);

		// Forceps
		$this->Forceps->setDbValueDef($rsnew, $this->Forceps->CurrentValue, NULL, FALSE);

		// ForcepsS
		$this->ForcepsS->setDbValueDef($rsnew, $this->ForcepsS->CurrentValue, NULL, FALSE);

		// ForcepsP
		$this->ForcepsP->setDbValueDef($rsnew, $this->ForcepsP->CurrentValue, NULL, FALSE);

		// Elective
		$this->Elective->setDbValueDef($rsnew, $this->Elective->CurrentValue, NULL, FALSE);

		// ElectiveS
		$this->ElectiveS->setDbValueDef($rsnew, $this->ElectiveS->CurrentValue, NULL, FALSE);

		// ElectiveP
		$this->ElectiveP->setDbValueDef($rsnew, $this->ElectiveP->CurrentValue, NULL, FALSE);

		// Emergency
		$this->Emergency->setDbValueDef($rsnew, $this->Emergency->CurrentValue, NULL, FALSE);

		// EmergencyS
		$this->EmergencyS->setDbValueDef($rsnew, $this->EmergencyS->CurrentValue, NULL, FALSE);

		// EmergencyP
		$this->EmergencyP->setDbValueDef($rsnew, $this->EmergencyP->CurrentValue, NULL, FALSE);

		// Maturity
		$this->Maturity->setDbValueDef($rsnew, $this->Maturity->CurrentValue, NULL, FALSE);

		// Baby1
		$this->Baby1->setDbValueDef($rsnew, $this->Baby1->CurrentValue, NULL, FALSE);

		// Baby2
		$this->Baby2->setDbValueDef($rsnew, $this->Baby2->CurrentValue, NULL, FALSE);

		// sex1
		$this->sex1->setDbValueDef($rsnew, $this->sex1->CurrentValue, NULL, FALSE);

		// sex2
		$this->sex2->setDbValueDef($rsnew, $this->sex2->CurrentValue, NULL, FALSE);

		// weight1
		$this->weight1->setDbValueDef($rsnew, $this->weight1->CurrentValue, NULL, FALSE);

		// weight2
		$this->weight2->setDbValueDef($rsnew, $this->weight2->CurrentValue, NULL, FALSE);

		// NICU1
		$this->NICU1->setDbValueDef($rsnew, $this->NICU1->CurrentValue, NULL, FALSE);

		// NICU2
		$this->NICU2->setDbValueDef($rsnew, $this->NICU2->CurrentValue, NULL, FALSE);

		// Jaundice1
		$this->Jaundice1->setDbValueDef($rsnew, $this->Jaundice1->CurrentValue, NULL, FALSE);

		// Jaundice2
		$this->Jaundice2->setDbValueDef($rsnew, $this->Jaundice2->CurrentValue, NULL, FALSE);

		// Others1
		$this->Others1->setDbValueDef($rsnew, $this->Others1->CurrentValue, NULL, FALSE);

		// Others2
		$this->Others2->setDbValueDef($rsnew, $this->Others2->CurrentValue, NULL, FALSE);

		// SpillOverReasons
		$this->SpillOverReasons->setDbValueDef($rsnew, $this->SpillOverReasons->CurrentValue, NULL, FALSE);

		// ANClosed
		$this->ANClosed->setDbValueDef($rsnew, $this->ANClosed->CurrentValue, NULL, FALSE);

		// ANClosedDATE
		$this->ANClosedDATE->setDbValueDef($rsnew, $this->ANClosedDATE->CurrentValue, NULL, FALSE);

		// PastMedicalHistoryOthers
		$this->PastMedicalHistoryOthers->setDbValueDef($rsnew, $this->PastMedicalHistoryOthers->CurrentValue, NULL, FALSE);

		// PastSurgicalHistoryOthers
		$this->PastSurgicalHistoryOthers->setDbValueDef($rsnew, $this->PastSurgicalHistoryOthers->CurrentValue, NULL, FALSE);

		// FamilyHistoryOthers
		$this->FamilyHistoryOthers->setDbValueDef($rsnew, $this->FamilyHistoryOthers->CurrentValue, NULL, FALSE);

		// PresentPregnancyComplicationsOthers
		$this->PresentPregnancyComplicationsOthers->setDbValueDef($rsnew, $this->PresentPregnancyComplicationsOthers->CurrentValue, NULL, FALSE);

		// ETdate
		$this->ETdate->setDbValueDef($rsnew, $this->ETdate->CurrentValue, NULL, FALSE);

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
		if ($masterTblVar == "patient_opd_follow_up") {
			$this->fid->Visible = FALSE;
			if ($GLOBALS["patient_opd_follow_up"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->pid->Visible = FALSE;
			if ($GLOBALS["patient_opd_follow_up"]->EventCancelled)
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
				case "x_MenstrualHistory":
					break;
				case "x_PreviousHistoryofGDM":
					break;
				case "x_PreviousHistorofPIH":
					break;
				case "x_PreviousHistoryofIUGR":
					break;
				case "x_PreviousHistoryofOligohydramnios":
					break;
				case "x_PreviousHistoryofPreterm":
					break;
				case "x_PastMedicalHistory":
					break;
				case "x_PastSurgicalHistory":
					break;
				case "x_FamilyHistory":
					break;
				case "x_Bleeding":
					break;
				case "x_Miscarriage":
					break;
				case "x_ModeOfDelivery":
					break;
				case "x_NDS":
					break;
				case "x_NDP":
					break;
				case "x_VaccumS":
					break;
				case "x_VaccumP":
					break;
				case "x_ForcepsS":
					break;
				case "x_ForcepsP":
					break;
				case "x_ElectiveS":
					break;
				case "x_ElectiveP":
					break;
				case "x_EmergencyS":
					break;
				case "x_EmergencyP":
					break;
				case "x_Maturity":
					break;
				case "x_SpillOverReasons":
					break;
				case "x_ANClosed":
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
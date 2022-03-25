<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_services_grid extends patient_services
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_services';

	// Page object name
	public $PageObjName = "patient_services_grid";

	// Grid form hidden field names
	public $FormName = "fpatient_servicesgrid";
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

		// Table object (patient_services)
		if (!isset($GLOBALS["patient_services"]) || get_class($GLOBALS["patient_services"]) == PROJECT_NAMESPACE . "patient_services") {
			$GLOBALS["patient_services"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["patient_services"];

		}
		$this->AddUrl = "patient_servicesadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_services');

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
		global $patient_services;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_services);
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
			$this->charged_date->Visible = FALSE;
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
		$this->Reception->setVisibility();
		$this->Services->setVisibility();
		$this->amount->setVisibility();
		$this->description->setVisibility();
		$this->patient_type->setVisibility();
		$this->charged_date->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->Unit->setVisibility();
		$this->Quantity->setVisibility();
		$this->Discount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->ServiceSelect->setVisibility();
		$this->Aid->setVisibility();
		$this->Vid->setVisibility();
		$this->DrID->setVisibility();
		$this->DrCODE->setVisibility();
		$this->DrName->setVisibility();
		$this->Department->setVisibility();
		$this->DrSharePres->setVisibility();
		$this->HospSharePres->setVisibility();
		$this->DrShareAmount->setVisibility();
		$this->HospShareAmount->setVisibility();
		$this->DrShareSettiledAmount->setVisibility();
		$this->DrShareSettledId->setVisibility();
		$this->DrShareSettiledStatus->setVisibility();
		$this->invoiceId->setVisibility();
		$this->invoiceAmount->setVisibility();
		$this->invoiceStatus->setVisibility();
		$this->modeOfPayment->setVisibility();
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->setVisibility();
		$this->DiscountCategory->setVisibility();
		$this->sid->setVisibility();
		$this->ItemCode->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->DEptCd->setVisibility();
		$this->ProfCd->setVisibility();
		$this->LabReport->Visible = FALSE;
		$this->Comments->setVisibility();
		$this->Method->setVisibility();
		$this->Specimen->setVisibility();
		$this->Abnormal->setVisibility();
		$this->RefValue->Visible = FALSE;
		$this->TestUnit->setVisibility();
		$this->LOWHIGH->setVisibility();
		$this->Branch->setVisibility();
		$this->Dispatch->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->GraphPath->setVisibility();
		$this->MachineCD->setVisibility();
		$this->TestCancel->setVisibility();
		$this->OutSource->setVisibility();
		$this->Printed->setVisibility();
		$this->PrintBy->setVisibility();
		$this->PrintDate->setVisibility();
		$this->BillingDate->setVisibility();
		$this->BilledBy->setVisibility();
		$this->Resulted->setVisibility();
		$this->ResultDate->setVisibility();
		$this->ResultedBy->setVisibility();
		$this->SampleDate->setVisibility();
		$this->SampleUser->setVisibility();
		$this->Sampled->setVisibility();
		$this->ReceivedDate->setVisibility();
		$this->ReceivedUser->setVisibility();
		$this->Recevied->setVisibility();
		$this->DeptRecvDate->setVisibility();
		$this->DeptRecvUser->setVisibility();
		$this->DeptRecived->setVisibility();
		$this->SAuthDate->setVisibility();
		$this->SAuthBy->setVisibility();
		$this->SAuthendicate->setVisibility();
		$this->AuthDate->setVisibility();
		$this->AuthBy->setVisibility();
		$this->Authencate->setVisibility();
		$this->EditDate->setVisibility();
		$this->EditBy->setVisibility();
		$this->Editted->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientId->setVisibility();
		$this->Mobile->setVisibility();
		$this->CId->setVisibility();
		$this->Order->setVisibility();
		$this->Form->Visible = FALSE;
		$this->ResType->setVisibility();
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->Visible = FALSE;
		$this->Inactive->setVisibility();
		$this->CollSample->setVisibility();
		$this->TestType->setVisibility();
		$this->Repeated->setVisibility();
		$this->RepeatedBy->setVisibility();
		$this->RepeatedDate->setVisibility();
		$this->serviceID->setVisibility();
		$this->Service_Type->setVisibility();
		$this->Service_Department->setVisibility();
		$this->RequestNo->setVisibility();
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
		$this->setupLookupOptions($this->Services);
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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "billing_voucher") {
			global $billing_voucher;
			$rsmaster = $billing_voucher->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("billing_voucherlist.php"); // Return to master page
			} else {
				$billing_voucher->loadListRowValues($rsmaster);
				$billing_voucher->RowType = ROWTYPE_MASTER; // Master row
				$billing_voucher->renderListRow();
				$rsmaster->close();
			}
		}

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
		$this->amount->FormValue = ""; // Clear form value
		$this->Discount->FormValue = ""; // Clear form value
		$this->SubTotal->FormValue = ""; // Clear form value
		$this->DrSharePres->FormValue = ""; // Clear form value
		$this->HospSharePres->FormValue = ""; // Clear form value
		$this->DrShareAmount->FormValue = ""; // Clear form value
		$this->HospShareAmount->FormValue = ""; // Clear form value
		$this->DrShareSettiledAmount->FormValue = ""; // Clear form value
		$this->invoiceAmount->FormValue = ""; // Clear form value
		$this->Order->FormValue = ""; // Clear form value
		$this->NoD->FormValue = ""; // Clear form value
		$this->BillOrder->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_Services") && $CurrentForm->hasValue("o_Services") && $this->Services->CurrentValue != $this->Services->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_amount") && $CurrentForm->hasValue("o_amount") && $this->amount->CurrentValue != $this->amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_description") && $CurrentForm->hasValue("o_description") && $this->description->CurrentValue != $this->description->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patient_type") && $CurrentForm->hasValue("o_patient_type") && $this->patient_type->CurrentValue != $this->patient_type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Unit") && $CurrentForm->hasValue("o_Unit") && $this->Unit->CurrentValue != $this->Unit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Discount") && $CurrentForm->hasValue("o_Discount") && $this->Discount->CurrentValue != $this->Discount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SubTotal") && $CurrentForm->hasValue("o_SubTotal") && $this->SubTotal->CurrentValue != $this->SubTotal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ServiceSelect") && $CurrentForm->hasValue("o_ServiceSelect") && $this->ServiceSelect->CurrentValue != $this->ServiceSelect->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Aid") && $CurrentForm->hasValue("o_Aid") && $this->Aid->CurrentValue != $this->Aid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vid") && $CurrentForm->hasValue("o_Vid") && $this->Vid->CurrentValue != $this->Vid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrID") && $CurrentForm->hasValue("o_DrID") && $this->DrID->CurrentValue != $this->DrID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrCODE") && $CurrentForm->hasValue("o_DrCODE") && $this->DrCODE->CurrentValue != $this->DrCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrName") && $CurrentForm->hasValue("o_DrName") && $this->DrName->CurrentValue != $this->DrName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue != $this->Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrSharePres") && $CurrentForm->hasValue("o_DrSharePres") && $this->DrSharePres->CurrentValue != $this->DrSharePres->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospSharePres") && $CurrentForm->hasValue("o_HospSharePres") && $this->HospSharePres->CurrentValue != $this->HospSharePres->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareAmount") && $CurrentForm->hasValue("o_DrShareAmount") && $this->DrShareAmount->CurrentValue != $this->DrShareAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospShareAmount") && $CurrentForm->hasValue("o_HospShareAmount") && $this->HospShareAmount->CurrentValue != $this->HospShareAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettiledAmount") && $CurrentForm->hasValue("o_DrShareSettiledAmount") && $this->DrShareSettiledAmount->CurrentValue != $this->DrShareSettiledAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettledId") && $CurrentForm->hasValue("o_DrShareSettledId") && $this->DrShareSettledId->CurrentValue != $this->DrShareSettledId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettiledStatus") && $CurrentForm->hasValue("o_DrShareSettiledStatus") && $this->DrShareSettiledStatus->CurrentValue != $this->DrShareSettiledStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceId") && $CurrentForm->hasValue("o_invoiceId") && $this->invoiceId->CurrentValue != $this->invoiceId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceAmount") && $CurrentForm->hasValue("o_invoiceAmount") && $this->invoiceAmount->CurrentValue != $this->invoiceAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceStatus") && $CurrentForm->hasValue("o_invoiceStatus") && $this->invoiceStatus->CurrentValue != $this->invoiceStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modeOfPayment") && $CurrentForm->hasValue("o_modeOfPayment") && $this->modeOfPayment->CurrentValue != $this->modeOfPayment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RIDNO") && $CurrentForm->hasValue("o_RIDNO") && $this->RIDNO->CurrentValue != $this->RIDNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DiscountCategory") && $CurrentForm->hasValue("o_DiscountCategory") && $this->DiscountCategory->CurrentValue != $this->DiscountCategory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue != $this->sid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ItemCode") && $CurrentForm->hasValue("o_ItemCode") && $this->ItemCode->CurrentValue != $this->ItemCode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestSubCd") && $CurrentForm->hasValue("o_TestSubCd") && $this->TestSubCd->CurrentValue != $this->TestSubCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue != $this->DEptCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProfCd") && $CurrentForm->hasValue("o_ProfCd") && $this->ProfCd->CurrentValue != $this->ProfCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Comments") && $CurrentForm->hasValue("o_Comments") && $this->Comments->CurrentValue != $this->Comments->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue != $this->Method->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Specimen") && $CurrentForm->hasValue("o_Specimen") && $this->Specimen->CurrentValue != $this->Specimen->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Abnormal") && $CurrentForm->hasValue("o_Abnormal") && $this->Abnormal->CurrentValue != $this->Abnormal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestUnit") && $CurrentForm->hasValue("o_TestUnit") && $this->TestUnit->CurrentValue != $this->TestUnit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LOWHIGH") && $CurrentForm->hasValue("o_LOWHIGH") && $this->LOWHIGH->CurrentValue != $this->LOWHIGH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Branch") && $CurrentForm->hasValue("o_Branch") && $this->Branch->CurrentValue != $this->Branch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dispatch") && $CurrentForm->hasValue("o_Dispatch") && $this->Dispatch->CurrentValue != $this->Dispatch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic1") && $CurrentForm->hasValue("o_Pic1") && $this->Pic1->CurrentValue != $this->Pic1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic2") && $CurrentForm->hasValue("o_Pic2") && $this->Pic2->CurrentValue != $this->Pic2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GraphPath") && $CurrentForm->hasValue("o_GraphPath") && $this->GraphPath->CurrentValue != $this->GraphPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MachineCD") && $CurrentForm->hasValue("o_MachineCD") && $this->MachineCD->CurrentValue != $this->MachineCD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestCancel") && $CurrentForm->hasValue("o_TestCancel") && $this->TestCancel->CurrentValue != $this->TestCancel->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OutSource") && $CurrentForm->hasValue("o_OutSource") && $this->OutSource->CurrentValue != $this->OutSource->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Printed") && $CurrentForm->hasValue("o_Printed") && $this->Printed->CurrentValue != $this->Printed->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintBy") && $CurrentForm->hasValue("o_PrintBy") && $this->PrintBy->CurrentValue != $this->PrintBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintDate") && $CurrentForm->hasValue("o_PrintDate") && $this->PrintDate->CurrentValue != $this->PrintDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillingDate") && $CurrentForm->hasValue("o_BillingDate") && $this->BillingDate->CurrentValue != $this->BillingDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BilledBy") && $CurrentForm->hasValue("o_BilledBy") && $this->BilledBy->CurrentValue != $this->BilledBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Resulted") && $CurrentForm->hasValue("o_Resulted") && $this->Resulted->CurrentValue != $this->Resulted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultedBy") && $CurrentForm->hasValue("o_ResultedBy") && $this->ResultedBy->CurrentValue != $this->ResultedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleDate") && $CurrentForm->hasValue("o_SampleDate") && $this->SampleDate->CurrentValue != $this->SampleDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleUser") && $CurrentForm->hasValue("o_SampleUser") && $this->SampleUser->CurrentValue != $this->SampleUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Sampled") && $CurrentForm->hasValue("o_Sampled") && $this->Sampled->CurrentValue != $this->Sampled->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedDate") && $CurrentForm->hasValue("o_ReceivedDate") && $this->ReceivedDate->CurrentValue != $this->ReceivedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedUser") && $CurrentForm->hasValue("o_ReceivedUser") && $this->ReceivedUser->CurrentValue != $this->ReceivedUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Recevied") && $CurrentForm->hasValue("o_Recevied") && $this->Recevied->CurrentValue != $this->Recevied->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvDate") && $CurrentForm->hasValue("o_DeptRecvDate") && $this->DeptRecvDate->CurrentValue != $this->DeptRecvDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvUser") && $CurrentForm->hasValue("o_DeptRecvUser") && $this->DeptRecvUser->CurrentValue != $this->DeptRecvUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecived") && $CurrentForm->hasValue("o_DeptRecived") && $this->DeptRecived->CurrentValue != $this->DeptRecived->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthDate") && $CurrentForm->hasValue("o_SAuthDate") && $this->SAuthDate->CurrentValue != $this->SAuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthBy") && $CurrentForm->hasValue("o_SAuthBy") && $this->SAuthBy->CurrentValue != $this->SAuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthendicate") && $CurrentForm->hasValue("o_SAuthendicate") && $this->SAuthendicate->CurrentValue != $this->SAuthendicate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthDate") && $CurrentForm->hasValue("o_AuthDate") && $this->AuthDate->CurrentValue != $this->AuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthBy") && $CurrentForm->hasValue("o_AuthBy") && $this->AuthBy->CurrentValue != $this->AuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Authencate") && $CurrentForm->hasValue("o_Authencate") && $this->Authencate->CurrentValue != $this->Authencate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EditDate") && $CurrentForm->hasValue("o_EditDate") && $this->EditDate->CurrentValue != $this->EditDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EditBy") && $CurrentForm->hasValue("o_EditBy") && $this->EditBy->CurrentValue != $this->EditBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Editted") && $CurrentForm->hasValue("o_Editted") && $this->Editted->CurrentValue != $this->Editted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CId") && $CurrentForm->hasValue("o_CId") && $this->CId->CurrentValue != $this->CId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Order") && $CurrentForm->hasValue("o_Order") && $this->Order->CurrentValue != $this->Order->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResType") && $CurrentForm->hasValue("o_ResType") && $this->ResType->CurrentValue != $this->ResType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Sample") && $CurrentForm->hasValue("o_Sample") && $this->Sample->CurrentValue != $this->Sample->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoD") && $CurrentForm->hasValue("o_NoD") && $this->NoD->CurrentValue != $this->NoD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillOrder") && $CurrentForm->hasValue("o_BillOrder") && $this->BillOrder->CurrentValue != $this->BillOrder->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Inactive") && $CurrentForm->hasValue("o_Inactive") && $this->Inactive->CurrentValue != $this->Inactive->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CollSample") && $CurrentForm->hasValue("o_CollSample") && $this->CollSample->CurrentValue != $this->CollSample->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestType") && $CurrentForm->hasValue("o_TestType") && $this->TestType->CurrentValue != $this->TestType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Repeated") && $CurrentForm->hasValue("o_Repeated") && $this->Repeated->CurrentValue != $this->Repeated->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RepeatedBy") && $CurrentForm->hasValue("o_RepeatedBy") && $this->RepeatedBy->CurrentValue != $this->RepeatedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RepeatedDate") && $CurrentForm->hasValue("o_RepeatedDate") && $this->RepeatedDate->CurrentValue != $this->RepeatedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_serviceID") && $CurrentForm->hasValue("o_serviceID") && $this->serviceID->CurrentValue != $this->serviceID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Service_Type") && $CurrentForm->hasValue("o_Service_Type") && $this->Service_Type->CurrentValue != $this->Service_Type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Service_Department") && $CurrentForm->hasValue("o_Service_Department") && $this->Service_Department->CurrentValue != $this->Service_Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RequestNo") && $CurrentForm->hasValue("o_RequestNo") && $this->RequestNo->CurrentValue != $this->RequestNo->OldValue)
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
				$this->Vid->setSessionValue("");
				$this->Reception->setSessionValue("");
				$this->mrnno->setSessionValue("");
				$this->PatID->setSessionValue("");
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->Services->CurrentValue = NULL;
		$this->Services->OldValue = $this->Services->CurrentValue;
		$this->amount->CurrentValue = NULL;
		$this->amount->OldValue = $this->amount->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->patient_type->CurrentValue = NULL;
		$this->patient_type->OldValue = $this->patient_type->CurrentValue;
		$this->charged_date->CurrentValue = NULL;
		$this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Unit->CurrentValue = NULL;
		$this->Unit->OldValue = $this->Unit->CurrentValue;
		$this->Quantity->CurrentValue = NULL;
		$this->Quantity->OldValue = $this->Quantity->CurrentValue;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->SubTotal->CurrentValue = NULL;
		$this->SubTotal->OldValue = $this->SubTotal->CurrentValue;
		$this->ServiceSelect->CurrentValue = NULL;
		$this->ServiceSelect->OldValue = $this->ServiceSelect->CurrentValue;
		$this->Aid->CurrentValue = NULL;
		$this->Aid->OldValue = $this->Aid->CurrentValue;
		$this->Vid->CurrentValue = NULL;
		$this->Vid->OldValue = $this->Vid->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->DrCODE->CurrentValue = NULL;
		$this->DrCODE->OldValue = $this->DrCODE->CurrentValue;
		$this->DrName->CurrentValue = NULL;
		$this->DrName->OldValue = $this->DrName->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->DrSharePres->CurrentValue = NULL;
		$this->DrSharePres->OldValue = $this->DrSharePres->CurrentValue;
		$this->HospSharePres->CurrentValue = NULL;
		$this->HospSharePres->OldValue = $this->HospSharePres->CurrentValue;
		$this->DrShareAmount->CurrentValue = NULL;
		$this->DrShareAmount->OldValue = $this->DrShareAmount->CurrentValue;
		$this->HospShareAmount->CurrentValue = NULL;
		$this->HospShareAmount->OldValue = $this->HospShareAmount->CurrentValue;
		$this->DrShareSettiledAmount->CurrentValue = NULL;
		$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->CurrentValue;
		$this->DrShareSettledId->CurrentValue = NULL;
		$this->DrShareSettledId->OldValue = $this->DrShareSettledId->CurrentValue;
		$this->DrShareSettiledStatus->CurrentValue = NULL;
		$this->DrShareSettiledStatus->OldValue = $this->DrShareSettiledStatus->CurrentValue;
		$this->invoiceId->CurrentValue = NULL;
		$this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
		$this->invoiceAmount->CurrentValue = NULL;
		$this->invoiceAmount->OldValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceStatus->CurrentValue = NULL;
		$this->invoiceStatus->OldValue = $this->invoiceStatus->CurrentValue;
		$this->modeOfPayment->CurrentValue = NULL;
		$this->modeOfPayment->OldValue = $this->modeOfPayment->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->DiscountCategory->CurrentValue = NULL;
		$this->DiscountCategory->OldValue = $this->DiscountCategory->CurrentValue;
		$this->sid->CurrentValue = NULL;
		$this->sid->OldValue = $this->sid->CurrentValue;
		$this->ItemCode->CurrentValue = NULL;
		$this->ItemCode->OldValue = $this->ItemCode->CurrentValue;
		$this->TestSubCd->CurrentValue = NULL;
		$this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
		$this->DEptCd->CurrentValue = NULL;
		$this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
		$this->ProfCd->CurrentValue = NULL;
		$this->ProfCd->OldValue = $this->ProfCd->CurrentValue;
		$this->LabReport->CurrentValue = NULL;
		$this->LabReport->OldValue = $this->LabReport->CurrentValue;
		$this->Comments->CurrentValue = NULL;
		$this->Comments->OldValue = $this->Comments->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->Specimen->CurrentValue = NULL;
		$this->Specimen->OldValue = $this->Specimen->CurrentValue;
		$this->Abnormal->CurrentValue = NULL;
		$this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->TestUnit->CurrentValue = NULL;
		$this->TestUnit->OldValue = $this->TestUnit->CurrentValue;
		$this->LOWHIGH->CurrentValue = NULL;
		$this->LOWHIGH->OldValue = $this->LOWHIGH->CurrentValue;
		$this->Branch->CurrentValue = NULL;
		$this->Branch->OldValue = $this->Branch->CurrentValue;
		$this->Dispatch->CurrentValue = NULL;
		$this->Dispatch->OldValue = $this->Dispatch->CurrentValue;
		$this->Pic1->CurrentValue = NULL;
		$this->Pic1->OldValue = $this->Pic1->CurrentValue;
		$this->Pic2->CurrentValue = NULL;
		$this->Pic2->OldValue = $this->Pic2->CurrentValue;
		$this->GraphPath->CurrentValue = NULL;
		$this->GraphPath->OldValue = $this->GraphPath->CurrentValue;
		$this->MachineCD->CurrentValue = NULL;
		$this->MachineCD->OldValue = $this->MachineCD->CurrentValue;
		$this->TestCancel->CurrentValue = NULL;
		$this->TestCancel->OldValue = $this->TestCancel->CurrentValue;
		$this->OutSource->CurrentValue = NULL;
		$this->OutSource->OldValue = $this->OutSource->CurrentValue;
		$this->Printed->CurrentValue = NULL;
		$this->Printed->OldValue = $this->Printed->CurrentValue;
		$this->PrintBy->CurrentValue = NULL;
		$this->PrintBy->OldValue = $this->PrintBy->CurrentValue;
		$this->PrintDate->CurrentValue = NULL;
		$this->PrintDate->OldValue = $this->PrintDate->CurrentValue;
		$this->BillingDate->CurrentValue = NULL;
		$this->BillingDate->OldValue = $this->BillingDate->CurrentValue;
		$this->BilledBy->CurrentValue = NULL;
		$this->BilledBy->OldValue = $this->BilledBy->CurrentValue;
		$this->Resulted->CurrentValue = NULL;
		$this->Resulted->OldValue = $this->Resulted->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->ResultedBy->CurrentValue = NULL;
		$this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
		$this->SampleDate->CurrentValue = NULL;
		$this->SampleDate->OldValue = $this->SampleDate->CurrentValue;
		$this->SampleUser->CurrentValue = NULL;
		$this->SampleUser->OldValue = $this->SampleUser->CurrentValue;
		$this->Sampled->CurrentValue = NULL;
		$this->Sampled->OldValue = $this->Sampled->CurrentValue;
		$this->ReceivedDate->CurrentValue = NULL;
		$this->ReceivedDate->OldValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedUser->CurrentValue = NULL;
		$this->ReceivedUser->OldValue = $this->ReceivedUser->CurrentValue;
		$this->Recevied->CurrentValue = NULL;
		$this->Recevied->OldValue = $this->Recevied->CurrentValue;
		$this->DeptRecvDate->CurrentValue = NULL;
		$this->DeptRecvDate->OldValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvUser->CurrentValue = NULL;
		$this->DeptRecvUser->OldValue = $this->DeptRecvUser->CurrentValue;
		$this->DeptRecived->CurrentValue = NULL;
		$this->DeptRecived->OldValue = $this->DeptRecived->CurrentValue;
		$this->SAuthDate->CurrentValue = NULL;
		$this->SAuthDate->OldValue = $this->SAuthDate->CurrentValue;
		$this->SAuthBy->CurrentValue = NULL;
		$this->SAuthBy->OldValue = $this->SAuthBy->CurrentValue;
		$this->SAuthendicate->CurrentValue = NULL;
		$this->SAuthendicate->OldValue = $this->SAuthendicate->CurrentValue;
		$this->AuthDate->CurrentValue = NULL;
		$this->AuthDate->OldValue = $this->AuthDate->CurrentValue;
		$this->AuthBy->CurrentValue = NULL;
		$this->AuthBy->OldValue = $this->AuthBy->CurrentValue;
		$this->Authencate->CurrentValue = NULL;
		$this->Authencate->OldValue = $this->Authencate->CurrentValue;
		$this->EditDate->CurrentValue = NULL;
		$this->EditDate->OldValue = $this->EditDate->CurrentValue;
		$this->EditBy->CurrentValue = NULL;
		$this->EditBy->OldValue = $this->EditBy->CurrentValue;
		$this->Editted->CurrentValue = NULL;
		$this->Editted->OldValue = $this->Editted->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->CId->CurrentValue = NULL;
		$this->CId->OldValue = $this->CId->CurrentValue;
		$this->Order->CurrentValue = NULL;
		$this->Order->OldValue = $this->Order->CurrentValue;
		$this->Form->CurrentValue = NULL;
		$this->Form->OldValue = $this->Form->CurrentValue;
		$this->ResType->CurrentValue = NULL;
		$this->ResType->OldValue = $this->ResType->CurrentValue;
		$this->Sample->CurrentValue = NULL;
		$this->Sample->OldValue = $this->Sample->CurrentValue;
		$this->NoD->CurrentValue = NULL;
		$this->NoD->OldValue = $this->NoD->CurrentValue;
		$this->BillOrder->CurrentValue = NULL;
		$this->BillOrder->OldValue = $this->BillOrder->CurrentValue;
		$this->Formula->CurrentValue = NULL;
		$this->Formula->OldValue = $this->Formula->CurrentValue;
		$this->Inactive->CurrentValue = NULL;
		$this->Inactive->OldValue = $this->Inactive->CurrentValue;
		$this->CollSample->CurrentValue = NULL;
		$this->CollSample->OldValue = $this->CollSample->CurrentValue;
		$this->TestType->CurrentValue = NULL;
		$this->TestType->OldValue = $this->TestType->CurrentValue;
		$this->Repeated->CurrentValue = NULL;
		$this->Repeated->OldValue = $this->Repeated->CurrentValue;
		$this->RepeatedBy->CurrentValue = NULL;
		$this->RepeatedBy->OldValue = $this->RepeatedBy->CurrentValue;
		$this->RepeatedDate->CurrentValue = NULL;
		$this->RepeatedDate->OldValue = $this->RepeatedDate->CurrentValue;
		$this->serviceID->CurrentValue = NULL;
		$this->serviceID->OldValue = $this->serviceID->CurrentValue;
		$this->Service_Type->CurrentValue = NULL;
		$this->Service_Type->OldValue = $this->Service_Type->CurrentValue;
		$this->Service_Department->CurrentValue = NULL;
		$this->Service_Department->OldValue = $this->Service_Department->CurrentValue;
		$this->RequestNo->CurrentValue = 0;
		$this->RequestNo->OldValue = $this->RequestNo->CurrentValue;
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

		// Check field name 'Services' first before field var 'x_Services'
		$val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
		if (!$this->Services->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Services->Visible = FALSE; // Disable update for API request
			else
				$this->Services->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Services"))
			$this->Services->setOldValue($CurrentForm->getValue("o_Services"));

		// Check field name 'amount' first before field var 'x_amount'
		$val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
		if (!$this->amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->amount->Visible = FALSE; // Disable update for API request
			else
				$this->amount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_amount"))
			$this->amount->setOldValue($CurrentForm->getValue("o_amount"));

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_description"))
			$this->description->setOldValue($CurrentForm->getValue("o_description"));

		// Check field name 'patient_type' first before field var 'x_patient_type'
		$val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
		if (!$this->patient_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_type->Visible = FALSE; // Disable update for API request
			else
				$this->patient_type->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_patient_type"))
			$this->patient_type->setOldValue($CurrentForm->getValue("o_patient_type"));

		// Check field name 'charged_date' first before field var 'x_charged_date'
		$val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
		if (!$this->charged_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->charged_date->Visible = FALSE; // Disable update for API request
			else
				$this->charged_date->setFormValue($val);
			$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_charged_date"))
			$this->charged_date->setOldValue($CurrentForm->getValue("o_charged_date"));

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

		// Check field name 'Unit' first before field var 'x_Unit'
		$val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
		if (!$this->Unit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit->Visible = FALSE; // Disable update for API request
			else
				$this->Unit->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Unit"))
			$this->Unit->setOldValue($CurrentForm->getValue("o_Unit"));

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Quantity"))
			$this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));

		// Check field name 'Discount' first before field var 'x_Discount'
		$val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
		if (!$this->Discount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Discount->Visible = FALSE; // Disable update for API request
			else
				$this->Discount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Discount"))
			$this->Discount->setOldValue($CurrentForm->getValue("o_Discount"));

		// Check field name 'SubTotal' first before field var 'x_SubTotal'
		$val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
		if (!$this->SubTotal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubTotal->Visible = FALSE; // Disable update for API request
			else
				$this->SubTotal->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SubTotal"))
			$this->SubTotal->setOldValue($CurrentForm->getValue("o_SubTotal"));

		// Check field name 'ServiceSelect' first before field var 'x_ServiceSelect'
		$val = $CurrentForm->hasValue("ServiceSelect") ? $CurrentForm->getValue("ServiceSelect") : $CurrentForm->getValue("x_ServiceSelect");
		if (!$this->ServiceSelect->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ServiceSelect->Visible = FALSE; // Disable update for API request
			else
				$this->ServiceSelect->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ServiceSelect"))
			$this->ServiceSelect->setOldValue($CurrentForm->getValue("o_ServiceSelect"));

		// Check field name 'Aid' first before field var 'x_Aid'
		$val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
		if (!$this->Aid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Aid->Visible = FALSE; // Disable update for API request
			else
				$this->Aid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Aid"))
			$this->Aid->setOldValue($CurrentForm->getValue("o_Aid"));

		// Check field name 'Vid' first before field var 'x_Vid'
		$val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
		if (!$this->Vid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Vid->Visible = FALSE; // Disable update for API request
			else
				$this->Vid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Vid"))
			$this->Vid->setOldValue($CurrentForm->getValue("o_Vid"));

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrID"))
			$this->DrID->setOldValue($CurrentForm->getValue("o_DrID"));

		// Check field name 'DrCODE' first before field var 'x_DrCODE'
		$val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
		if (!$this->DrCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrCODE->Visible = FALSE; // Disable update for API request
			else
				$this->DrCODE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrCODE"))
			$this->DrCODE->setOldValue($CurrentForm->getValue("o_DrCODE"));

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrName"))
			$this->DrName->setOldValue($CurrentForm->getValue("o_DrName"));

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Department"))
			$this->Department->setOldValue($CurrentForm->getValue("o_Department"));

		// Check field name 'DrSharePres' first before field var 'x_DrSharePres'
		$val = $CurrentForm->hasValue("DrSharePres") ? $CurrentForm->getValue("DrSharePres") : $CurrentForm->getValue("x_DrSharePres");
		if (!$this->DrSharePres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->DrSharePres->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrSharePres"))
			$this->DrSharePres->setOldValue($CurrentForm->getValue("o_DrSharePres"));

		// Check field name 'HospSharePres' first before field var 'x_HospSharePres'
		$val = $CurrentForm->hasValue("HospSharePres") ? $CurrentForm->getValue("HospSharePres") : $CurrentForm->getValue("x_HospSharePres");
		if (!$this->HospSharePres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->HospSharePres->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospSharePres"))
			$this->HospSharePres->setOldValue($CurrentForm->getValue("o_HospSharePres"));

		// Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
		$val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
		if (!$this->DrShareAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareAmount"))
			$this->DrShareAmount->setOldValue($CurrentForm->getValue("o_DrShareAmount"));

		// Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
		$val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
		if (!$this->HospShareAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->HospShareAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospShareAmount"))
			$this->HospShareAmount->setOldValue($CurrentForm->getValue("o_HospShareAmount"));

		// Check field name 'DrShareSettiledAmount' first before field var 'x_DrShareSettiledAmount'
		$val = $CurrentForm->hasValue("DrShareSettiledAmount") ? $CurrentForm->getValue("DrShareSettiledAmount") : $CurrentForm->getValue("x_DrShareSettiledAmount");
		if (!$this->DrShareSettiledAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettiledAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettiledAmount"))
			$this->DrShareSettiledAmount->setOldValue($CurrentForm->getValue("o_DrShareSettiledAmount"));

		// Check field name 'DrShareSettledId' first before field var 'x_DrShareSettledId'
		$val = $CurrentForm->hasValue("DrShareSettledId") ? $CurrentForm->getValue("DrShareSettledId") : $CurrentForm->getValue("x_DrShareSettledId");
		if (!$this->DrShareSettledId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettledId->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettledId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettledId"))
			$this->DrShareSettledId->setOldValue($CurrentForm->getValue("o_DrShareSettledId"));

		// Check field name 'DrShareSettiledStatus' first before field var 'x_DrShareSettiledStatus'
		$val = $CurrentForm->hasValue("DrShareSettiledStatus") ? $CurrentForm->getValue("DrShareSettiledStatus") : $CurrentForm->getValue("x_DrShareSettiledStatus");
		if (!$this->DrShareSettiledStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettiledStatus->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledStatus->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettiledStatus"))
			$this->DrShareSettiledStatus->setOldValue($CurrentForm->getValue("o_DrShareSettiledStatus"));

		// Check field name 'invoiceId' first before field var 'x_invoiceId'
		$val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
		if (!$this->invoiceId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceId->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceId"))
			$this->invoiceId->setOldValue($CurrentForm->getValue("o_invoiceId"));

		// Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
		$val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
		if (!$this->invoiceAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceAmount->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceAmount"))
			$this->invoiceAmount->setOldValue($CurrentForm->getValue("o_invoiceAmount"));

		// Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
		$val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
		if (!$this->invoiceStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceStatus->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceStatus->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceStatus"))
			$this->invoiceStatus->setOldValue($CurrentForm->getValue("o_invoiceStatus"));

		// Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
		$val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
		if (!$this->modeOfPayment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->modeOfPayment->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_modeOfPayment"))
			$this->modeOfPayment->setOldValue($CurrentForm->getValue("o_modeOfPayment"));

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

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RIDNO"))
			$this->RIDNO->setOldValue($CurrentForm->getValue("o_RIDNO"));

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TidNo"))
			$this->TidNo->setOldValue($CurrentForm->getValue("o_TidNo"));

		// Check field name 'DiscountCategory' first before field var 'x_DiscountCategory'
		$val = $CurrentForm->hasValue("DiscountCategory") ? $CurrentForm->getValue("DiscountCategory") : $CurrentForm->getValue("x_DiscountCategory");
		if (!$this->DiscountCategory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DiscountCategory->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountCategory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DiscountCategory"))
			$this->DiscountCategory->setOldValue($CurrentForm->getValue("o_DiscountCategory"));

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sid"))
			$this->sid->setOldValue($CurrentForm->getValue("o_sid"));

		// Check field name 'ItemCode' first before field var 'x_ItemCode'
		$val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
		if (!$this->ItemCode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ItemCode->Visible = FALSE; // Disable update for API request
			else
				$this->ItemCode->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ItemCode"))
			$this->ItemCode->setOldValue($CurrentForm->getValue("o_ItemCode"));

		// Check field name 'TestSubCd' first before field var 'x_TestSubCd'
		$val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
		if (!$this->TestSubCd->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestSubCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestSubCd->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestSubCd"))
			$this->TestSubCd->setOldValue($CurrentForm->getValue("o_TestSubCd"));

		// Check field name 'DEptCd' first before field var 'x_DEptCd'
		$val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
		if (!$this->DEptCd->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DEptCd->Visible = FALSE; // Disable update for API request
			else
				$this->DEptCd->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DEptCd"))
			$this->DEptCd->setOldValue($CurrentForm->getValue("o_DEptCd"));

		// Check field name 'ProfCd' first before field var 'x_ProfCd'
		$val = $CurrentForm->hasValue("ProfCd") ? $CurrentForm->getValue("ProfCd") : $CurrentForm->getValue("x_ProfCd");
		if (!$this->ProfCd->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfCd->Visible = FALSE; // Disable update for API request
			else
				$this->ProfCd->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ProfCd"))
			$this->ProfCd->setOldValue($CurrentForm->getValue("o_ProfCd"));

		// Check field name 'Comments' first before field var 'x_Comments'
		$val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
		if (!$this->Comments->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Comments->Visible = FALSE; // Disable update for API request
			else
				$this->Comments->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Comments"))
			$this->Comments->setOldValue($CurrentForm->getValue("o_Comments"));

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Method"))
			$this->Method->setOldValue($CurrentForm->getValue("o_Method"));

		// Check field name 'Specimen' first before field var 'x_Specimen'
		$val = $CurrentForm->hasValue("Specimen") ? $CurrentForm->getValue("Specimen") : $CurrentForm->getValue("x_Specimen");
		if (!$this->Specimen->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Specimen->Visible = FALSE; // Disable update for API request
			else
				$this->Specimen->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Specimen"))
			$this->Specimen->setOldValue($CurrentForm->getValue("o_Specimen"));

		// Check field name 'Abnormal' first before field var 'x_Abnormal'
		$val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
		if (!$this->Abnormal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Abnormal->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormal->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Abnormal"))
			$this->Abnormal->setOldValue($CurrentForm->getValue("o_Abnormal"));

		// Check field name 'TestUnit' first before field var 'x_TestUnit'
		$val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
		if (!$this->TestUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestUnit->Visible = FALSE; // Disable update for API request
			else
				$this->TestUnit->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestUnit"))
			$this->TestUnit->setOldValue($CurrentForm->getValue("o_TestUnit"));

		// Check field name 'LOWHIGH' first before field var 'x_LOWHIGH'
		$val = $CurrentForm->hasValue("LOWHIGH") ? $CurrentForm->getValue("LOWHIGH") : $CurrentForm->getValue("x_LOWHIGH");
		if (!$this->LOWHIGH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LOWHIGH->Visible = FALSE; // Disable update for API request
			else
				$this->LOWHIGH->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_LOWHIGH"))
			$this->LOWHIGH->setOldValue($CurrentForm->getValue("o_LOWHIGH"));

		// Check field name 'Branch' first before field var 'x_Branch'
		$val = $CurrentForm->hasValue("Branch") ? $CurrentForm->getValue("Branch") : $CurrentForm->getValue("x_Branch");
		if (!$this->Branch->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Branch->Visible = FALSE; // Disable update for API request
			else
				$this->Branch->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Branch"))
			$this->Branch->setOldValue($CurrentForm->getValue("o_Branch"));

		// Check field name 'Dispatch' first before field var 'x_Dispatch'
		$val = $CurrentForm->hasValue("Dispatch") ? $CurrentForm->getValue("Dispatch") : $CurrentForm->getValue("x_Dispatch");
		if (!$this->Dispatch->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dispatch->Visible = FALSE; // Disable update for API request
			else
				$this->Dispatch->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Dispatch"))
			$this->Dispatch->setOldValue($CurrentForm->getValue("o_Dispatch"));

		// Check field name 'Pic1' first before field var 'x_Pic1'
		$val = $CurrentForm->hasValue("Pic1") ? $CurrentForm->getValue("Pic1") : $CurrentForm->getValue("x_Pic1");
		if (!$this->Pic1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Pic1->Visible = FALSE; // Disable update for API request
			else
				$this->Pic1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Pic1"))
			$this->Pic1->setOldValue($CurrentForm->getValue("o_Pic1"));

		// Check field name 'Pic2' first before field var 'x_Pic2'
		$val = $CurrentForm->hasValue("Pic2") ? $CurrentForm->getValue("Pic2") : $CurrentForm->getValue("x_Pic2");
		if (!$this->Pic2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Pic2->Visible = FALSE; // Disable update for API request
			else
				$this->Pic2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Pic2"))
			$this->Pic2->setOldValue($CurrentForm->getValue("o_Pic2"));

		// Check field name 'GraphPath' first before field var 'x_GraphPath'
		$val = $CurrentForm->hasValue("GraphPath") ? $CurrentForm->getValue("GraphPath") : $CurrentForm->getValue("x_GraphPath");
		if (!$this->GraphPath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GraphPath->Visible = FALSE; // Disable update for API request
			else
				$this->GraphPath->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_GraphPath"))
			$this->GraphPath->setOldValue($CurrentForm->getValue("o_GraphPath"));

		// Check field name 'MachineCD' first before field var 'x_MachineCD'
		$val = $CurrentForm->hasValue("MachineCD") ? $CurrentForm->getValue("MachineCD") : $CurrentForm->getValue("x_MachineCD");
		if (!$this->MachineCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MachineCD->Visible = FALSE; // Disable update for API request
			else
				$this->MachineCD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MachineCD"))
			$this->MachineCD->setOldValue($CurrentForm->getValue("o_MachineCD"));

		// Check field name 'TestCancel' first before field var 'x_TestCancel'
		$val = $CurrentForm->hasValue("TestCancel") ? $CurrentForm->getValue("TestCancel") : $CurrentForm->getValue("x_TestCancel");
		if (!$this->TestCancel->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestCancel->Visible = FALSE; // Disable update for API request
			else
				$this->TestCancel->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestCancel"))
			$this->TestCancel->setOldValue($CurrentForm->getValue("o_TestCancel"));

		// Check field name 'OutSource' first before field var 'x_OutSource'
		$val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
		if (!$this->OutSource->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OutSource->Visible = FALSE; // Disable update for API request
			else
				$this->OutSource->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OutSource"))
			$this->OutSource->setOldValue($CurrentForm->getValue("o_OutSource"));

		// Check field name 'Printed' first before field var 'x_Printed'
		$val = $CurrentForm->hasValue("Printed") ? $CurrentForm->getValue("Printed") : $CurrentForm->getValue("x_Printed");
		if (!$this->Printed->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Printed->Visible = FALSE; // Disable update for API request
			else
				$this->Printed->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Printed"))
			$this->Printed->setOldValue($CurrentForm->getValue("o_Printed"));

		// Check field name 'PrintBy' first before field var 'x_PrintBy'
		$val = $CurrentForm->hasValue("PrintBy") ? $CurrentForm->getValue("PrintBy") : $CurrentForm->getValue("x_PrintBy");
		if (!$this->PrintBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrintBy->Visible = FALSE; // Disable update for API request
			else
				$this->PrintBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PrintBy"))
			$this->PrintBy->setOldValue($CurrentForm->getValue("o_PrintBy"));

		// Check field name 'PrintDate' first before field var 'x_PrintDate'
		$val = $CurrentForm->hasValue("PrintDate") ? $CurrentForm->getValue("PrintDate") : $CurrentForm->getValue("x_PrintDate");
		if (!$this->PrintDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrintDate->Visible = FALSE; // Disable update for API request
			else
				$this->PrintDate->setFormValue($val);
			$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_PrintDate"))
			$this->PrintDate->setOldValue($CurrentForm->getValue("o_PrintDate"));

		// Check field name 'BillingDate' first before field var 'x_BillingDate'
		$val = $CurrentForm->hasValue("BillingDate") ? $CurrentForm->getValue("BillingDate") : $CurrentForm->getValue("x_BillingDate");
		if (!$this->BillingDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillingDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillingDate->setFormValue($val);
			$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_BillingDate"))
			$this->BillingDate->setOldValue($CurrentForm->getValue("o_BillingDate"));

		// Check field name 'BilledBy' first before field var 'x_BilledBy'
		$val = $CurrentForm->hasValue("BilledBy") ? $CurrentForm->getValue("BilledBy") : $CurrentForm->getValue("x_BilledBy");
		if (!$this->BilledBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BilledBy->Visible = FALSE; // Disable update for API request
			else
				$this->BilledBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BilledBy"))
			$this->BilledBy->setOldValue($CurrentForm->getValue("o_BilledBy"));

		// Check field name 'Resulted' first before field var 'x_Resulted'
		$val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
		if (!$this->Resulted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Resulted->Visible = FALSE; // Disable update for API request
			else
				$this->Resulted->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Resulted"))
			$this->Resulted->setOldValue($CurrentForm->getValue("o_Resulted"));

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_ResultDate"))
			$this->ResultDate->setOldValue($CurrentForm->getValue("o_ResultDate"));

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ResultedBy"))
			$this->ResultedBy->setOldValue($CurrentForm->getValue("o_ResultedBy"));

		// Check field name 'SampleDate' first before field var 'x_SampleDate'
		$val = $CurrentForm->hasValue("SampleDate") ? $CurrentForm->getValue("SampleDate") : $CurrentForm->getValue("x_SampleDate");
		if (!$this->SampleDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SampleDate->Visible = FALSE; // Disable update for API request
			else
				$this->SampleDate->setFormValue($val);
			$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_SampleDate"))
			$this->SampleDate->setOldValue($CurrentForm->getValue("o_SampleDate"));

		// Check field name 'SampleUser' first before field var 'x_SampleUser'
		$val = $CurrentForm->hasValue("SampleUser") ? $CurrentForm->getValue("SampleUser") : $CurrentForm->getValue("x_SampleUser");
		if (!$this->SampleUser->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SampleUser->Visible = FALSE; // Disable update for API request
			else
				$this->SampleUser->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SampleUser"))
			$this->SampleUser->setOldValue($CurrentForm->getValue("o_SampleUser"));

		// Check field name 'Sampled' first before field var 'x_Sampled'
		$val = $CurrentForm->hasValue("Sampled") ? $CurrentForm->getValue("Sampled") : $CurrentForm->getValue("x_Sampled");
		if (!$this->Sampled->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sampled->Visible = FALSE; // Disable update for API request
			else
				$this->Sampled->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Sampled"))
			$this->Sampled->setOldValue($CurrentForm->getValue("o_Sampled"));

		// Check field name 'ReceivedDate' first before field var 'x_ReceivedDate'
		$val = $CurrentForm->hasValue("ReceivedDate") ? $CurrentForm->getValue("ReceivedDate") : $CurrentForm->getValue("x_ReceivedDate");
		if (!$this->ReceivedDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReceivedDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedDate->setFormValue($val);
			$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_ReceivedDate"))
			$this->ReceivedDate->setOldValue($CurrentForm->getValue("o_ReceivedDate"));

		// Check field name 'ReceivedUser' first before field var 'x_ReceivedUser'
		$val = $CurrentForm->hasValue("ReceivedUser") ? $CurrentForm->getValue("ReceivedUser") : $CurrentForm->getValue("x_ReceivedUser");
		if (!$this->ReceivedUser->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReceivedUser->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedUser->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ReceivedUser"))
			$this->ReceivedUser->setOldValue($CurrentForm->getValue("o_ReceivedUser"));

		// Check field name 'Recevied' first before field var 'x_Recevied'
		$val = $CurrentForm->hasValue("Recevied") ? $CurrentForm->getValue("Recevied") : $CurrentForm->getValue("x_Recevied");
		if (!$this->Recevied->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Recevied->Visible = FALSE; // Disable update for API request
			else
				$this->Recevied->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Recevied"))
			$this->Recevied->setOldValue($CurrentForm->getValue("o_Recevied"));

		// Check field name 'DeptRecvDate' first before field var 'x_DeptRecvDate'
		$val = $CurrentForm->hasValue("DeptRecvDate") ? $CurrentForm->getValue("DeptRecvDate") : $CurrentForm->getValue("x_DeptRecvDate");
		if (!$this->DeptRecvDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeptRecvDate->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvDate->setFormValue($val);
			$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_DeptRecvDate"))
			$this->DeptRecvDate->setOldValue($CurrentForm->getValue("o_DeptRecvDate"));

		// Check field name 'DeptRecvUser' first before field var 'x_DeptRecvUser'
		$val = $CurrentForm->hasValue("DeptRecvUser") ? $CurrentForm->getValue("DeptRecvUser") : $CurrentForm->getValue("x_DeptRecvUser");
		if (!$this->DeptRecvUser->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeptRecvUser->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvUser->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeptRecvUser"))
			$this->DeptRecvUser->setOldValue($CurrentForm->getValue("o_DeptRecvUser"));

		// Check field name 'DeptRecived' first before field var 'x_DeptRecived'
		$val = $CurrentForm->hasValue("DeptRecived") ? $CurrentForm->getValue("DeptRecived") : $CurrentForm->getValue("x_DeptRecived");
		if (!$this->DeptRecived->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeptRecived->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecived->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeptRecived"))
			$this->DeptRecived->setOldValue($CurrentForm->getValue("o_DeptRecived"));

		// Check field name 'SAuthDate' first before field var 'x_SAuthDate'
		$val = $CurrentForm->hasValue("SAuthDate") ? $CurrentForm->getValue("SAuthDate") : $CurrentForm->getValue("x_SAuthDate");
		if (!$this->SAuthDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SAuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthDate->setFormValue($val);
			$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_SAuthDate"))
			$this->SAuthDate->setOldValue($CurrentForm->getValue("o_SAuthDate"));

		// Check field name 'SAuthBy' first before field var 'x_SAuthBy'
		$val = $CurrentForm->hasValue("SAuthBy") ? $CurrentForm->getValue("SAuthBy") : $CurrentForm->getValue("x_SAuthBy");
		if (!$this->SAuthBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SAuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SAuthBy"))
			$this->SAuthBy->setOldValue($CurrentForm->getValue("o_SAuthBy"));

		// Check field name 'SAuthendicate' first before field var 'x_SAuthendicate'
		$val = $CurrentForm->hasValue("SAuthendicate") ? $CurrentForm->getValue("SAuthendicate") : $CurrentForm->getValue("x_SAuthendicate");
		if (!$this->SAuthendicate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SAuthendicate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthendicate->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SAuthendicate"))
			$this->SAuthendicate->setOldValue($CurrentForm->getValue("o_SAuthendicate"));

		// Check field name 'AuthDate' first before field var 'x_AuthDate'
		$val = $CurrentForm->hasValue("AuthDate") ? $CurrentForm->getValue("AuthDate") : $CurrentForm->getValue("x_AuthDate");
		if (!$this->AuthDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->AuthDate->setFormValue($val);
			$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_AuthDate"))
			$this->AuthDate->setOldValue($CurrentForm->getValue("o_AuthDate"));

		// Check field name 'AuthBy' first before field var 'x_AuthBy'
		$val = $CurrentForm->hasValue("AuthBy") ? $CurrentForm->getValue("AuthBy") : $CurrentForm->getValue("x_AuthBy");
		if (!$this->AuthBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->AuthBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AuthBy"))
			$this->AuthBy->setOldValue($CurrentForm->getValue("o_AuthBy"));

		// Check field name 'Authencate' first before field var 'x_Authencate'
		$val = $CurrentForm->hasValue("Authencate") ? $CurrentForm->getValue("Authencate") : $CurrentForm->getValue("x_Authencate");
		if (!$this->Authencate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Authencate->Visible = FALSE; // Disable update for API request
			else
				$this->Authencate->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Authencate"))
			$this->Authencate->setOldValue($CurrentForm->getValue("o_Authencate"));

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_EditDate"))
			$this->EditDate->setOldValue($CurrentForm->getValue("o_EditDate"));

		// Check field name 'EditBy' first before field var 'x_EditBy'
		$val = $CurrentForm->hasValue("EditBy") ? $CurrentForm->getValue("EditBy") : $CurrentForm->getValue("x_EditBy");
		if (!$this->EditBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditBy->Visible = FALSE; // Disable update for API request
			else
				$this->EditBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EditBy"))
			$this->EditBy->setOldValue($CurrentForm->getValue("o_EditBy"));

		// Check field name 'Editted' first before field var 'x_Editted'
		$val = $CurrentForm->hasValue("Editted") ? $CurrentForm->getValue("Editted") : $CurrentForm->getValue("x_Editted");
		if (!$this->Editted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Editted->Visible = FALSE; // Disable update for API request
			else
				$this->Editted->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Editted"))
			$this->Editted->setOldValue($CurrentForm->getValue("o_Editted"));

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

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Mobile"))
			$this->Mobile->setOldValue($CurrentForm->getValue("o_Mobile"));

		// Check field name 'CId' first before field var 'x_CId'
		$val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
		if (!$this->CId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CId->Visible = FALSE; // Disable update for API request
			else
				$this->CId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CId"))
			$this->CId->setOldValue($CurrentForm->getValue("o_CId"));

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Order"))
			$this->Order->setOldValue($CurrentForm->getValue("o_Order"));

		// Check field name 'ResType' first before field var 'x_ResType'
		$val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
		if (!$this->ResType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResType->Visible = FALSE; // Disable update for API request
			else
				$this->ResType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ResType"))
			$this->ResType->setOldValue($CurrentForm->getValue("o_ResType"));

		// Check field name 'Sample' first before field var 'x_Sample'
		$val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
		if (!$this->Sample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sample->Visible = FALSE; // Disable update for API request
			else
				$this->Sample->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Sample"))
			$this->Sample->setOldValue($CurrentForm->getValue("o_Sample"));

		// Check field name 'NoD' first before field var 'x_NoD'
		$val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
		if (!$this->NoD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoD->Visible = FALSE; // Disable update for API request
			else
				$this->NoD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoD"))
			$this->NoD->setOldValue($CurrentForm->getValue("o_NoD"));

		// Check field name 'BillOrder' first before field var 'x_BillOrder'
		$val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
		if (!$this->BillOrder->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillOrder->Visible = FALSE; // Disable update for API request
			else
				$this->BillOrder->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BillOrder"))
			$this->BillOrder->setOldValue($CurrentForm->getValue("o_BillOrder"));

		// Check field name 'Inactive' first before field var 'x_Inactive'
		$val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
		if (!$this->Inactive->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Inactive->Visible = FALSE; // Disable update for API request
			else
				$this->Inactive->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Inactive"))
			$this->Inactive->setOldValue($CurrentForm->getValue("o_Inactive"));

		// Check field name 'CollSample' first before field var 'x_CollSample'
		$val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
		if (!$this->CollSample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CollSample->Visible = FALSE; // Disable update for API request
			else
				$this->CollSample->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CollSample"))
			$this->CollSample->setOldValue($CurrentForm->getValue("o_CollSample"));

		// Check field name 'TestType' first before field var 'x_TestType'
		$val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
		if (!$this->TestType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestType->Visible = FALSE; // Disable update for API request
			else
				$this->TestType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestType"))
			$this->TestType->setOldValue($CurrentForm->getValue("o_TestType"));

		// Check field name 'Repeated' first before field var 'x_Repeated'
		$val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
		if (!$this->Repeated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Repeated->Visible = FALSE; // Disable update for API request
			else
				$this->Repeated->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Repeated"))
			$this->Repeated->setOldValue($CurrentForm->getValue("o_Repeated"));

		// Check field name 'RepeatedBy' first before field var 'x_RepeatedBy'
		$val = $CurrentForm->hasValue("RepeatedBy") ? $CurrentForm->getValue("RepeatedBy") : $CurrentForm->getValue("x_RepeatedBy");
		if (!$this->RepeatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RepeatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RepeatedBy"))
			$this->RepeatedBy->setOldValue($CurrentForm->getValue("o_RepeatedBy"));

		// Check field name 'RepeatedDate' first before field var 'x_RepeatedDate'
		$val = $CurrentForm->hasValue("RepeatedDate") ? $CurrentForm->getValue("RepeatedDate") : $CurrentForm->getValue("x_RepeatedDate");
		if (!$this->RepeatedDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RepeatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedDate->setFormValue($val);
			$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_RepeatedDate"))
			$this->RepeatedDate->setOldValue($CurrentForm->getValue("o_RepeatedDate"));

		// Check field name 'serviceID' first before field var 'x_serviceID'
		$val = $CurrentForm->hasValue("serviceID") ? $CurrentForm->getValue("serviceID") : $CurrentForm->getValue("x_serviceID");
		if (!$this->serviceID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->serviceID->Visible = FALSE; // Disable update for API request
			else
				$this->serviceID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_serviceID"))
			$this->serviceID->setOldValue($CurrentForm->getValue("o_serviceID"));

		// Check field name 'Service_Type' first before field var 'x_Service_Type'
		$val = $CurrentForm->hasValue("Service_Type") ? $CurrentForm->getValue("Service_Type") : $CurrentForm->getValue("x_Service_Type");
		if (!$this->Service_Type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Service_Type->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Type->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Service_Type"))
			$this->Service_Type->setOldValue($CurrentForm->getValue("o_Service_Type"));

		// Check field name 'Service_Department' first before field var 'x_Service_Department'
		$val = $CurrentForm->hasValue("Service_Department") ? $CurrentForm->getValue("Service_Department") : $CurrentForm->getValue("x_Service_Department");
		if (!$this->Service_Department->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Service_Department->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Department->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Service_Department"))
			$this->Service_Department->setOldValue($CurrentForm->getValue("o_Service_Department"));

		// Check field name 'RequestNo' first before field var 'x_RequestNo'
		$val = $CurrentForm->hasValue("RequestNo") ? $CurrentForm->getValue("RequestNo") : $CurrentForm->getValue("x_RequestNo");
		if (!$this->RequestNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RequestNo->Visible = FALSE; // Disable update for API request
			else
				$this->RequestNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RequestNo"))
			$this->RequestNo->setOldValue($CurrentForm->getValue("o_RequestNo"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->Services->CurrentValue = $this->Services->FormValue;
		$this->amount->CurrentValue = $this->amount->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->patient_type->CurrentValue = $this->patient_type->FormValue;
		$this->charged_date->CurrentValue = $this->charged_date->FormValue;
		$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->Discount->CurrentValue = $this->Discount->FormValue;
		$this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
		$this->ServiceSelect->CurrentValue = $this->ServiceSelect->FormValue;
		$this->Aid->CurrentValue = $this->Aid->FormValue;
		$this->Vid->CurrentValue = $this->Vid->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->DrSharePres->CurrentValue = $this->DrSharePres->FormValue;
		$this->HospSharePres->CurrentValue = $this->HospSharePres->FormValue;
		$this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
		$this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
		$this->DrShareSettiledAmount->CurrentValue = $this->DrShareSettiledAmount->FormValue;
		$this->DrShareSettledId->CurrentValue = $this->DrShareSettledId->FormValue;
		$this->DrShareSettiledStatus->CurrentValue = $this->DrShareSettiledStatus->FormValue;
		$this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
		$this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
		$this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
		$this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->DiscountCategory->CurrentValue = $this->DiscountCategory->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
		$this->Comments->CurrentValue = $this->Comments->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Specimen->CurrentValue = $this->Specimen->FormValue;
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
		$this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
		$this->Branch->CurrentValue = $this->Branch->FormValue;
		$this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
		$this->Pic1->CurrentValue = $this->Pic1->FormValue;
		$this->Pic2->CurrentValue = $this->Pic2->FormValue;
		$this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
		$this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
		$this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
		$this->Printed->CurrentValue = $this->Printed->FormValue;
		$this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
		$this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
		$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		$this->BillingDate->CurrentValue = $this->BillingDate->FormValue;
		$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		$this->BilledBy->CurrentValue = $this->BilledBy->FormValue;
		$this->Resulted->CurrentValue = $this->Resulted->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
		$this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
		$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		$this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
		$this->Sampled->CurrentValue = $this->Sampled->FormValue;
		$this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
		$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		$this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
		$this->Recevied->CurrentValue = $this->Recevied->FormValue;
		$this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
		$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		$this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
		$this->DeptRecived->CurrentValue = $this->DeptRecived->FormValue;
		$this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
		$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		$this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
		$this->SAuthendicate->CurrentValue = $this->SAuthendicate->FormValue;
		$this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
		$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		$this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
		$this->Authencate->CurrentValue = $this->Authencate->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->EditBy->CurrentValue = $this->EditBy->FormValue;
		$this->Editted->CurrentValue = $this->Editted->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->ResType->CurrentValue = $this->ResType->FormValue;
		$this->Sample->CurrentValue = $this->Sample->FormValue;
		$this->NoD->CurrentValue = $this->NoD->FormValue;
		$this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
		$this->Inactive->CurrentValue = $this->Inactive->FormValue;
		$this->CollSample->CurrentValue = $this->CollSample->FormValue;
		$this->TestType->CurrentValue = $this->TestType->FormValue;
		$this->Repeated->CurrentValue = $this->Repeated->FormValue;
		$this->RepeatedBy->CurrentValue = $this->RepeatedBy->FormValue;
		$this->RepeatedDate->CurrentValue = $this->RepeatedDate->FormValue;
		$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		$this->serviceID->CurrentValue = $this->serviceID->FormValue;
		$this->Service_Type->CurrentValue = $this->Service_Type->FormValue;
		$this->Service_Department->CurrentValue = $this->Service_Department->FormValue;
		$this->RequestNo->CurrentValue = $this->RequestNo->FormValue;
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
		$this->Services->setDbValue($row['Services']);
		if (array_key_exists('EV__Services', $rs->fields)) {
			$this->Services->VirtualValue = $rs->fields('EV__Services'); // Set up virtual field value
		} else {
			$this->Services->VirtualValue = ""; // Clear value
		}
		$this->amount->setDbValue($row['amount']);
		$this->description->setDbValue($row['description']);
		$this->patient_type->setDbValue($row['patient_type']);
		$this->charged_date->setDbValue($row['charged_date']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Unit->setDbValue($row['Unit']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SubTotal->setDbValue($row['SubTotal']);
		$this->ServiceSelect->setDbValue($row['ServiceSelect']);
		$this->Aid->setDbValue($row['Aid']);
		$this->Vid->setDbValue($row['Vid']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrCODE->setDbValue($row['DrCODE']);
		$this->DrName->setDbValue($row['DrName']);
		$this->Department->setDbValue($row['Department']);
		$this->DrSharePres->setDbValue($row['DrSharePres']);
		$this->HospSharePres->setDbValue($row['HospSharePres']);
		$this->DrShareAmount->setDbValue($row['DrShareAmount']);
		$this->HospShareAmount->setDbValue($row['HospShareAmount']);
		$this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
		$this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
		$this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
		$this->invoiceId->setDbValue($row['invoiceId']);
		$this->invoiceAmount->setDbValue($row['invoiceAmount']);
		$this->invoiceStatus->setDbValue($row['invoiceStatus']);
		$this->modeOfPayment->setDbValue($row['modeOfPayment']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->DiscountCategory->setDbValue($row['DiscountCategory']);
		$this->sid->setDbValue($row['sid']);
		$this->ItemCode->setDbValue($row['ItemCode']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->ProfCd->setDbValue($row['ProfCd']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Method->setDbValue($row['Method']);
		$this->Specimen->setDbValue($row['Specimen']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->TestUnit->setDbValue($row['TestUnit']);
		$this->LOWHIGH->setDbValue($row['LOWHIGH']);
		$this->Branch->setDbValue($row['Branch']);
		$this->Dispatch->setDbValue($row['Dispatch']);
		$this->Pic1->setDbValue($row['Pic1']);
		$this->Pic2->setDbValue($row['Pic2']);
		$this->GraphPath->setDbValue($row['GraphPath']);
		$this->MachineCD->setDbValue($row['MachineCD']);
		$this->TestCancel->setDbValue($row['TestCancel']);
		$this->OutSource->setDbValue($row['OutSource']);
		$this->Printed->setDbValue($row['Printed']);
		$this->PrintBy->setDbValue($row['PrintBy']);
		$this->PrintDate->setDbValue($row['PrintDate']);
		$this->BillingDate->setDbValue($row['BillingDate']);
		$this->BilledBy->setDbValue($row['BilledBy']);
		$this->Resulted->setDbValue($row['Resulted']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->SampleDate->setDbValue($row['SampleDate']);
		$this->SampleUser->setDbValue($row['SampleUser']);
		$this->Sampled->setDbValue($row['Sampled']);
		$this->ReceivedDate->setDbValue($row['ReceivedDate']);
		$this->ReceivedUser->setDbValue($row['ReceivedUser']);
		$this->Recevied->setDbValue($row['Recevied']);
		$this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
		$this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
		$this->DeptRecived->setDbValue($row['DeptRecived']);
		$this->SAuthDate->setDbValue($row['SAuthDate']);
		$this->SAuthBy->setDbValue($row['SAuthBy']);
		$this->SAuthendicate->setDbValue($row['SAuthendicate']);
		$this->AuthDate->setDbValue($row['AuthDate']);
		$this->AuthBy->setDbValue($row['AuthBy']);
		$this->Authencate->setDbValue($row['Authencate']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->EditBy->setDbValue($row['EditBy']);
		$this->Editted->setDbValue($row['Editted']);
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->CId->setDbValue($row['CId']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->ResType->setDbValue($row['ResType']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->TestType->setDbValue($row['TestType']);
		$this->Repeated->setDbValue($row['Repeated']);
		$this->RepeatedBy->setDbValue($row['RepeatedBy']);
		$this->RepeatedDate->setDbValue($row['RepeatedDate']);
		$this->serviceID->setDbValue($row['serviceID']);
		$this->Service_Type->setDbValue($row['Service_Type']);
		$this->Service_Department->setDbValue($row['Service_Department']);
		$this->RequestNo->setDbValue($row['RequestNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['Services'] = $this->Services->CurrentValue;
		$row['amount'] = $this->amount->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['patient_type'] = $this->patient_type->CurrentValue;
		$row['charged_date'] = $this->charged_date->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Unit'] = $this->Unit->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['SubTotal'] = $this->SubTotal->CurrentValue;
		$row['ServiceSelect'] = $this->ServiceSelect->CurrentValue;
		$row['Aid'] = $this->Aid->CurrentValue;
		$row['Vid'] = $this->Vid->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['DrCODE'] = $this->DrCODE->CurrentValue;
		$row['DrName'] = $this->DrName->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['DrSharePres'] = $this->DrSharePres->CurrentValue;
		$row['HospSharePres'] = $this->HospSharePres->CurrentValue;
		$row['DrShareAmount'] = $this->DrShareAmount->CurrentValue;
		$row['HospShareAmount'] = $this->HospShareAmount->CurrentValue;
		$row['DrShareSettiledAmount'] = $this->DrShareSettiledAmount->CurrentValue;
		$row['DrShareSettledId'] = $this->DrShareSettledId->CurrentValue;
		$row['DrShareSettiledStatus'] = $this->DrShareSettiledStatus->CurrentValue;
		$row['invoiceId'] = $this->invoiceId->CurrentValue;
		$row['invoiceAmount'] = $this->invoiceAmount->CurrentValue;
		$row['invoiceStatus'] = $this->invoiceStatus->CurrentValue;
		$row['modeOfPayment'] = $this->modeOfPayment->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['DiscountCategory'] = $this->DiscountCategory->CurrentValue;
		$row['sid'] = $this->sid->CurrentValue;
		$row['ItemCode'] = $this->ItemCode->CurrentValue;
		$row['TestSubCd'] = $this->TestSubCd->CurrentValue;
		$row['DEptCd'] = $this->DEptCd->CurrentValue;
		$row['ProfCd'] = $this->ProfCd->CurrentValue;
		$row['LabReport'] = $this->LabReport->CurrentValue;
		$row['Comments'] = $this->Comments->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['Specimen'] = $this->Specimen->CurrentValue;
		$row['Abnormal'] = $this->Abnormal->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['TestUnit'] = $this->TestUnit->CurrentValue;
		$row['LOWHIGH'] = $this->LOWHIGH->CurrentValue;
		$row['Branch'] = $this->Branch->CurrentValue;
		$row['Dispatch'] = $this->Dispatch->CurrentValue;
		$row['Pic1'] = $this->Pic1->CurrentValue;
		$row['Pic2'] = $this->Pic2->CurrentValue;
		$row['GraphPath'] = $this->GraphPath->CurrentValue;
		$row['MachineCD'] = $this->MachineCD->CurrentValue;
		$row['TestCancel'] = $this->TestCancel->CurrentValue;
		$row['OutSource'] = $this->OutSource->CurrentValue;
		$row['Printed'] = $this->Printed->CurrentValue;
		$row['PrintBy'] = $this->PrintBy->CurrentValue;
		$row['PrintDate'] = $this->PrintDate->CurrentValue;
		$row['BillingDate'] = $this->BillingDate->CurrentValue;
		$row['BilledBy'] = $this->BilledBy->CurrentValue;
		$row['Resulted'] = $this->Resulted->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['ResultedBy'] = $this->ResultedBy->CurrentValue;
		$row['SampleDate'] = $this->SampleDate->CurrentValue;
		$row['SampleUser'] = $this->SampleUser->CurrentValue;
		$row['Sampled'] = $this->Sampled->CurrentValue;
		$row['ReceivedDate'] = $this->ReceivedDate->CurrentValue;
		$row['ReceivedUser'] = $this->ReceivedUser->CurrentValue;
		$row['Recevied'] = $this->Recevied->CurrentValue;
		$row['DeptRecvDate'] = $this->DeptRecvDate->CurrentValue;
		$row['DeptRecvUser'] = $this->DeptRecvUser->CurrentValue;
		$row['DeptRecived'] = $this->DeptRecived->CurrentValue;
		$row['SAuthDate'] = $this->SAuthDate->CurrentValue;
		$row['SAuthBy'] = $this->SAuthBy->CurrentValue;
		$row['SAuthendicate'] = $this->SAuthendicate->CurrentValue;
		$row['AuthDate'] = $this->AuthDate->CurrentValue;
		$row['AuthBy'] = $this->AuthBy->CurrentValue;
		$row['Authencate'] = $this->Authencate->CurrentValue;
		$row['EditDate'] = $this->EditDate->CurrentValue;
		$row['EditBy'] = $this->EditBy->CurrentValue;
		$row['Editted'] = $this->Editted->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['CId'] = $this->CId->CurrentValue;
		$row['Order'] = $this->Order->CurrentValue;
		$row['Form'] = $this->Form->CurrentValue;
		$row['ResType'] = $this->ResType->CurrentValue;
		$row['Sample'] = $this->Sample->CurrentValue;
		$row['NoD'] = $this->NoD->CurrentValue;
		$row['BillOrder'] = $this->BillOrder->CurrentValue;
		$row['Formula'] = $this->Formula->CurrentValue;
		$row['Inactive'] = $this->Inactive->CurrentValue;
		$row['CollSample'] = $this->CollSample->CurrentValue;
		$row['TestType'] = $this->TestType->CurrentValue;
		$row['Repeated'] = $this->Repeated->CurrentValue;
		$row['RepeatedBy'] = $this->RepeatedBy->CurrentValue;
		$row['RepeatedDate'] = $this->RepeatedDate->CurrentValue;
		$row['serviceID'] = $this->serviceID->CurrentValue;
		$row['Service_Type'] = $this->Service_Type->CurrentValue;
		$row['Service_Department'] = $this->Service_Department->CurrentValue;
		$row['RequestNo'] = $this->RequestNo->CurrentValue;
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

		// Convert decimal values if posted back
		if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue)))
			$this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue)))
			$this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue)))
			$this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue)))
			$this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue)))
			$this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue)))
			$this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue)))
			$this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue)))
			$this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue)))
			$this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue)))
			$this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue)))
			$this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// Services
		// amount
		// description
		// patient_type
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Unit
		// Quantity
		// Discount
		// SubTotal
		// ServiceSelect
		// Aid
		// Vid
		// DrID
		// DrCODE
		// DrName
		// Department
		// DrSharePres
		// HospSharePres
		// DrShareAmount
		// HospShareAmount
		// DrShareSettiledAmount
		// DrShareSettledId
		// DrShareSettiledStatus
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// HospID
		// RIDNO
		// TidNo
		// DiscountCategory
		// sid
		// ItemCode
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// Comments
		// Method
		// Specimen
		// Abnormal
		// RefValue
		// TestUnit
		// LOWHIGH
		// Branch
		// Dispatch
		// Pic1
		// Pic2
		// GraphPath
		// MachineCD
		// TestCancel
		// OutSource
		// Printed
		// PrintBy
		// PrintDate
		// BillingDate
		// BilledBy
		// Resulted
		// ResultDate
		// ResultedBy
		// SampleDate
		// SampleUser
		// Sampled
		// ReceivedDate
		// ReceivedUser
		// Recevied
		// DeptRecvDate
		// DeptRecvUser
		// DeptRecived
		// SAuthDate
		// SAuthBy
		// SAuthendicate
		// AuthDate
		// AuthBy
		// Authencate
		// EditDate
		// EditBy
		// Editted
		// PatID
		// PatientId
		// Mobile
		// CId
		// Order
		// Form
		// ResType
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// CollSample
		// TestType
		// Repeated
		// RepeatedBy
		// RepeatedDate
		// serviceID
		// Service_Type
		// Service_Department
		// RequestNo
		// Accumulate aggregate value

		if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
			if (is_numeric($this->SubTotal->CurrentValue))
				$this->SubTotal->Total += $this->SubTotal->CurrentValue; // Accumulate total
		}
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Services
			if ($this->Services->VirtualValue != "") {
				$this->Services->ViewValue = $this->Services->VirtualValue;
			} else {
				$this->Services->ViewValue = $this->Services->CurrentValue;
				$curVal = strval($this->Services->CurrentValue);
				if ($curVal != "") {
					$this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
					if ($this->Services->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$lookupFilter = function() {
							return "`Inactive` != 'Y'";
						};
						$lookupFilter = $lookupFilter->bindTo($this);
						$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->Services->ViewValue = $this->Services->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->Services->ViewValue = $this->Services->CurrentValue;
						}
					}
				} else {
					$this->Services->ViewValue = NULL;
				}
			}
			$this->Services->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// patient_type
			$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
			$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
			$this->patient_type->ViewCustomAttributes = "";

			// charged_date
			$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
			$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
			$this->charged_date->ViewCustomAttributes = "";

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// Unit
			$this->Unit->ViewValue = $this->Unit->CurrentValue;
			$this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
			$this->Unit->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";

			// ServiceSelect
			if (strval($this->ServiceSelect->CurrentValue) != "") {
				$this->ServiceSelect->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ServiceSelect->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ServiceSelect->ViewValue->add($this->ServiceSelect->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ServiceSelect->ViewValue = NULL;
			}
			$this->ServiceSelect->ViewCustomAttributes = "";

			// Aid
			$this->Aid->ViewValue = $this->Aid->CurrentValue;
			$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
			$this->Aid->ViewCustomAttributes = "";

			// Vid
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";

			// DrID
			$this->DrID->ViewValue = $this->DrID->CurrentValue;
			$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
			$this->DrID->ViewCustomAttributes = "";

			// DrCODE
			$this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
			$this->DrCODE->ViewCustomAttributes = "";

			// DrName
			$this->DrName->ViewValue = $this->DrName->CurrentValue;
			$this->DrName->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// DrSharePres
			$this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
			$this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
			$this->DrSharePres->ViewCustomAttributes = "";

			// HospSharePres
			$this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
			$this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
			$this->HospSharePres->ViewCustomAttributes = "";

			// DrShareAmount
			$this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
			$this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareAmount->ViewCustomAttributes = "";

			// HospShareAmount
			$this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
			$this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
			$this->HospShareAmount->ViewCustomAttributes = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
			$this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareSettiledAmount->ViewCustomAttributes = "";

			// DrShareSettledId
			$this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
			$this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettledId->ViewCustomAttributes = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
			$this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettiledStatus->ViewCustomAttributes = "";

			// invoiceId
			$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
			$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
			$this->invoiceId->ViewCustomAttributes = "";

			// invoiceAmount
			$this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
			$this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
			$this->invoiceAmount->ViewCustomAttributes = "";

			// invoiceStatus
			$this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
			$this->invoiceStatus->ViewCustomAttributes = "";

			// modeOfPayment
			$this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
			$this->modeOfPayment->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DiscountCategory
			$this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
			$this->DiscountCategory->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// ProfCd
			$this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
			$this->ProfCd->ViewCustomAttributes = "";

			// Comments
			$this->Comments->ViewValue = $this->Comments->CurrentValue;
			$this->Comments->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Specimen
			$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
			$this->Specimen->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// TestUnit
			$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
			$this->TestUnit->ViewCustomAttributes = "";

			// LOWHIGH
			$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
			$this->LOWHIGH->ViewCustomAttributes = "";

			// Branch
			$this->Branch->ViewValue = $this->Branch->CurrentValue;
			$this->Branch->ViewCustomAttributes = "";

			// Dispatch
			$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
			$this->Dispatch->ViewCustomAttributes = "";

			// Pic1
			$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
			$this->Pic2->ViewCustomAttributes = "";

			// GraphPath
			$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
			$this->GraphPath->ViewCustomAttributes = "";

			// MachineCD
			$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
			$this->MachineCD->ViewCustomAttributes = "";

			// TestCancel
			$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
			$this->TestCancel->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// Printed
			$this->Printed->ViewValue = $this->Printed->CurrentValue;
			$this->Printed->ViewCustomAttributes = "";

			// PrintBy
			$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
			$this->PrintBy->ViewCustomAttributes = "";

			// PrintDate
			$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
			$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
			$this->PrintDate->ViewCustomAttributes = "";

			// BillingDate
			$this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
			$this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
			$this->BillingDate->ViewCustomAttributes = "";

			// BilledBy
			$this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
			$this->BilledBy->ViewCustomAttributes = "";

			// Resulted
			$this->Resulted->ViewValue = $this->Resulted->CurrentValue;
			$this->Resulted->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// SampleDate
			$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
			$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
			$this->SampleDate->ViewCustomAttributes = "";

			// SampleUser
			$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
			$this->SampleUser->ViewCustomAttributes = "";

			// Sampled
			$this->Sampled->ViewValue = $this->Sampled->CurrentValue;
			$this->Sampled->ViewCustomAttributes = "";

			// ReceivedDate
			$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
			$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
			$this->ReceivedDate->ViewCustomAttributes = "";

			// ReceivedUser
			$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
			$this->ReceivedUser->ViewCustomAttributes = "";

			// Recevied
			$this->Recevied->ViewValue = $this->Recevied->CurrentValue;
			$this->Recevied->ViewCustomAttributes = "";

			// DeptRecvDate
			$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
			$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
			$this->DeptRecvDate->ViewCustomAttributes = "";

			// DeptRecvUser
			$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
			$this->DeptRecvUser->ViewCustomAttributes = "";

			// DeptRecived
			$this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
			$this->DeptRecived->ViewCustomAttributes = "";

			// SAuthDate
			$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
			$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
			$this->SAuthDate->ViewCustomAttributes = "";

			// SAuthBy
			$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
			$this->SAuthBy->ViewCustomAttributes = "";

			// SAuthendicate
			$this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
			$this->SAuthendicate->ViewCustomAttributes = "";

			// AuthDate
			$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
			$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
			$this->AuthDate->ViewCustomAttributes = "";

			// AuthBy
			$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
			$this->AuthBy->ViewCustomAttributes = "";

			// Authencate
			$this->Authencate->ViewValue = $this->Authencate->CurrentValue;
			$this->Authencate->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// EditBy
			$this->EditBy->ViewValue = $this->EditBy->CurrentValue;
			$this->EditBy->ViewCustomAttributes = "";

			// Editted
			$this->Editted->ViewValue = $this->Editted->CurrentValue;
			$this->Editted->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// CId
			$this->CId->ViewValue = $this->CId->CurrentValue;
			$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
			$this->CId->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// ResType
			$this->ResType->ViewValue = $this->ResType->CurrentValue;
			$this->ResType->ViewCustomAttributes = "";

			// Sample
			$this->Sample->ViewValue = $this->Sample->CurrentValue;
			$this->Sample->ViewCustomAttributes = "";

			// NoD
			$this->NoD->ViewValue = $this->NoD->CurrentValue;
			$this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
			$this->NoD->ViewCustomAttributes = "";

			// BillOrder
			$this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
			$this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
			$this->BillOrder->ViewCustomAttributes = "";

			// Inactive
			$this->Inactive->ViewValue = $this->Inactive->CurrentValue;
			$this->Inactive->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// TestType
			$this->TestType->ViewValue = $this->TestType->CurrentValue;
			$this->TestType->ViewCustomAttributes = "";

			// Repeated
			$this->Repeated->ViewValue = $this->Repeated->CurrentValue;
			$this->Repeated->ViewCustomAttributes = "";

			// RepeatedBy
			$this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
			$this->RepeatedBy->ViewCustomAttributes = "";

			// RepeatedDate
			$this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
			$this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
			$this->RepeatedDate->ViewCustomAttributes = "";

			// serviceID
			$this->serviceID->ViewValue = $this->serviceID->CurrentValue;
			$this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
			$this->serviceID->ViewCustomAttributes = "";

			// Service_Type
			$this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
			$this->Service_Type->ViewCustomAttributes = "";

			// Service_Department
			$this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
			$this->Service_Department->ViewCustomAttributes = "";

			// RequestNo
			$this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
			$this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
			$this->RequestNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";
			$this->Services->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";
			$this->patient_type->TooltipValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";
			$this->charged_date->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";
			$this->SubTotal->TooltipValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";
			$this->ServiceSelect->TooltipValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";
			$this->Aid->TooltipValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";
			$this->Vid->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";
			$this->DrCODE->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";
			$this->DrSharePres->TooltipValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";
			$this->HospSharePres->TooltipValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";
			$this->DrShareAmount->TooltipValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";
			$this->HospShareAmount->TooltipValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";
			$this->DrShareSettiledAmount->TooltipValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";
			$this->DrShareSettledId->TooltipValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";
			$this->DrShareSettiledStatus->TooltipValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";
			$this->invoiceId->TooltipValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";
			$this->invoiceAmount->TooltipValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";
			$this->invoiceStatus->TooltipValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";
			$this->modeOfPayment->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";
			$this->DiscountCategory->TooltipValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";
			$this->ItemCode->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";
			$this->ProfCd->TooltipValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";
			$this->Comments->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";
			$this->Specimen->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";
			$this->TestUnit->TooltipValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";
			$this->LOWHIGH->TooltipValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";
			$this->Branch->TooltipValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";
			$this->Dispatch->TooltipValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->TooltipValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->TooltipValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";
			$this->GraphPath->TooltipValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";
			$this->MachineCD->TooltipValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";
			$this->TestCancel->TooltipValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";
			$this->Printed->TooltipValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";
			$this->PrintBy->TooltipValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";
			$this->PrintDate->TooltipValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";
			$this->BillingDate->TooltipValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";
			$this->BilledBy->TooltipValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";
			$this->Resulted->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";
			$this->SampleDate->TooltipValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";
			$this->SampleUser->TooltipValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";
			$this->Sampled->TooltipValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";
			$this->ReceivedDate->TooltipValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";
			$this->ReceivedUser->TooltipValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";
			$this->Recevied->TooltipValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";
			$this->DeptRecvDate->TooltipValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";
			$this->DeptRecvUser->TooltipValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";
			$this->DeptRecived->TooltipValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";
			$this->SAuthDate->TooltipValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";
			$this->SAuthBy->TooltipValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";
			$this->SAuthendicate->TooltipValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";
			$this->AuthDate->TooltipValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";
			$this->AuthBy->TooltipValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";
			$this->Authencate->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";
			$this->EditBy->TooltipValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";
			$this->Editted->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";
			$this->ResType->TooltipValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";
			$this->Sample->TooltipValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";
			$this->NoD->TooltipValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";
			$this->BillOrder->TooltipValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";
			$this->Inactive->TooltipValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";
			$this->TestType->TooltipValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";
			$this->Repeated->TooltipValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";
			$this->RepeatedBy->TooltipValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";
			$this->RepeatedDate->TooltipValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";
			$this->serviceID->TooltipValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";
			$this->Service_Type->TooltipValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";
			$this->Service_Department->TooltipValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
			$this->RequestNo->TooltipValue = "";
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

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (!$this->Services->Raw)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal != "") {
				$this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Services->EditValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
					}
				}
			} else {
				$this->Services->EditValue = NULL;
			}
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
				$this->amount->OldValue = $this->amount->EditValue;
			}
			

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
			// status

			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal != "")
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
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

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

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
				$this->Discount->OldValue = $this->Discount->EditValue;
			}
			

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
			if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
				$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
				$this->SubTotal->OldValue = $this->SubTotal->EditValue;
			}
			

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() != "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
				$this->Vid->ViewCustomAttributes = "";
			} else {
				$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
				$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (!$this->DrCODE->Raw)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (!$this->DrName->Raw)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (!$this->Department->Raw)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
			if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
				$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
				$this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
			}
			

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
			if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
				$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
				$this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
			}
			

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
			if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
				$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
			}
			

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
			if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
				$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
				$this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
			}
			

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
			if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
				$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
			}
			

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
			if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
				$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
				$this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
			}
			

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (!$this->invoiceStatus->Raw)
				$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (!$this->modeOfPayment->Raw)
				$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (!$this->DiscountCategory->Raw)
				$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (!$this->ItemCode->Raw)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// TestSubCd
			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (!$this->TestSubCd->Raw)
				$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (!$this->DEptCd->Raw)
				$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// ProfCd
			$this->ProfCd->EditAttrs["class"] = "form-control";
			$this->ProfCd->EditCustomAttributes = "";
			if (!$this->ProfCd->Raw)
				$this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
			$this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
			$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (!$this->Comments->Raw)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (!$this->Method->Raw)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Specimen
			$this->Specimen->EditAttrs["class"] = "form-control";
			$this->Specimen->EditCustomAttributes = "";
			if (!$this->Specimen->Raw)
				$this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
			$this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
			$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (!$this->TestUnit->Raw)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (!$this->Pic1->Raw)
				$this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
			$this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
			$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (!$this->Pic2->Raw)
				$this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
			$this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
			$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

			// GraphPath
			$this->GraphPath->EditAttrs["class"] = "form-control";
			$this->GraphPath->EditCustomAttributes = "";
			if (!$this->GraphPath->Raw)
				$this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
			$this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
			$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

			// MachineCD
			$this->MachineCD->EditAttrs["class"] = "form-control";
			$this->MachineCD->EditCustomAttributes = "";
			if (!$this->MachineCD->Raw)
				$this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
			$this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
			$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

			// TestCancel
			$this->TestCancel->EditAttrs["class"] = "form-control";
			$this->TestCancel->EditCustomAttributes = "";
			if (!$this->TestCancel->Raw)
				$this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
			$this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
			$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (!$this->OutSource->Raw)
				$this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// PrintBy
			$this->PrintBy->EditAttrs["class"] = "form-control";
			$this->PrintBy->EditCustomAttributes = "";
			if (!$this->PrintBy->Raw)
				$this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
			$this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
			$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

			// PrintDate
			$this->PrintDate->EditAttrs["class"] = "form-control";
			$this->PrintDate->EditCustomAttributes = "";
			$this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
			$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (!$this->BilledBy->Raw)
				$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (!$this->Resulted->Raw)
				$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (!$this->ResultedBy->Raw)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// SampleDate
			$this->SampleDate->EditAttrs["class"] = "form-control";
			$this->SampleDate->EditCustomAttributes = "";
			$this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
			$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

			// SampleUser
			$this->SampleUser->EditAttrs["class"] = "form-control";
			$this->SampleUser->EditCustomAttributes = "";
			if (!$this->SampleUser->Raw)
				$this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
			$this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
			$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (!$this->Sampled->Raw)
				$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

			// ReceivedDate
			$this->ReceivedDate->EditAttrs["class"] = "form-control";
			$this->ReceivedDate->EditCustomAttributes = "";
			$this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
			$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

			// ReceivedUser
			$this->ReceivedUser->EditAttrs["class"] = "form-control";
			$this->ReceivedUser->EditCustomAttributes = "";
			if (!$this->ReceivedUser->Raw)
				$this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (!$this->Recevied->Raw)
				$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

			// DeptRecvDate
			$this->DeptRecvDate->EditAttrs["class"] = "form-control";
			$this->DeptRecvDate->EditCustomAttributes = "";
			$this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
			$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

			// DeptRecvUser
			$this->DeptRecvUser->EditAttrs["class"] = "form-control";
			$this->DeptRecvUser->EditCustomAttributes = "";
			if (!$this->DeptRecvUser->Raw)
				$this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (!$this->DeptRecived->Raw)
				$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

			// SAuthDate
			$this->SAuthDate->EditAttrs["class"] = "form-control";
			$this->SAuthDate->EditCustomAttributes = "";
			$this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
			$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

			// SAuthBy
			$this->SAuthBy->EditAttrs["class"] = "form-control";
			$this->SAuthBy->EditCustomAttributes = "";
			if (!$this->SAuthBy->Raw)
				$this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (!$this->SAuthendicate->Raw)
				$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (!$this->Authencate->Raw)
				$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (!$this->EditBy->Raw)
				$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (!$this->Editted->Raw)
				$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() != "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
				$this->PatID->OldValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
				$this->PatID->ViewCustomAttributes = "";
			} else {
				$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
				$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}
			

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (!$this->ResType->Raw)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (!$this->Sample->Raw)
				$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
			if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
				$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
				$this->NoD->OldValue = $this->NoD->EditValue;
			}
			

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
			if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
				$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
				$this->BillOrder->OldValue = $this->BillOrder->EditValue;
			}
			

			// Inactive
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (!$this->Inactive->Raw)
				$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (!$this->CollSample->Raw)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (!$this->TestType->Raw)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (!$this->Repeated->Raw)
				$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (!$this->RepeatedBy->Raw)
				$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (!$this->Service_Type->Raw)
				$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (!$this->Service_Department->Raw)
				$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
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

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (!$this->Services->Raw)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal != "") {
				$this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Services->EditValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
					}
				}
			} else {
				$this->Services->EditValue = NULL;
			}
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
				$this->amount->OldValue = $this->amount->EditValue;
			}
			

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
			// status

			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal != "")
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
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
				$this->Discount->OldValue = $this->Discount->EditValue;
			}
			

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
			if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
				$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
				$this->SubTotal->OldValue = $this->SubTotal->EditValue;
			}
			

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() != "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
				$this->Vid->ViewCustomAttributes = "";
			} else {
				$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
				$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (!$this->DrCODE->Raw)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (!$this->DrName->Raw)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (!$this->Department->Raw)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
			if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
				$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
				$this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
			}
			

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
			if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
				$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
				$this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
			}
			

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
			if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
				$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
			}
			

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
			if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
				$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
				$this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
			}
			

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
			if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
				$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
			}
			

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
			if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
				$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
				$this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
			}
			

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (!$this->invoiceStatus->Raw)
				$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (!$this->modeOfPayment->Raw)
				$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->EditValue = FormatNumber($this->RIDNO->EditValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (!$this->DiscountCategory->Raw)
				$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (!$this->ItemCode->Raw)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// TestSubCd
			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (!$this->TestSubCd->Raw)
				$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (!$this->DEptCd->Raw)
				$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// ProfCd
			$this->ProfCd->EditAttrs["class"] = "form-control";
			$this->ProfCd->EditCustomAttributes = "";
			if (!$this->ProfCd->Raw)
				$this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
			$this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
			$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (!$this->Comments->Raw)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (!$this->Method->Raw)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Specimen
			$this->Specimen->EditAttrs["class"] = "form-control";
			$this->Specimen->EditCustomAttributes = "";
			if (!$this->Specimen->Raw)
				$this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
			$this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
			$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (!$this->TestUnit->Raw)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (!$this->Pic1->Raw)
				$this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
			$this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
			$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (!$this->Pic2->Raw)
				$this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
			$this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
			$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

			// GraphPath
			$this->GraphPath->EditAttrs["class"] = "form-control";
			$this->GraphPath->EditCustomAttributes = "";
			if (!$this->GraphPath->Raw)
				$this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
			$this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
			$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

			// MachineCD
			$this->MachineCD->EditAttrs["class"] = "form-control";
			$this->MachineCD->EditCustomAttributes = "";
			if (!$this->MachineCD->Raw)
				$this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
			$this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
			$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

			// TestCancel
			$this->TestCancel->EditAttrs["class"] = "form-control";
			$this->TestCancel->EditCustomAttributes = "";
			if (!$this->TestCancel->Raw)
				$this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
			$this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
			$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (!$this->OutSource->Raw)
				$this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// PrintBy
			$this->PrintBy->EditAttrs["class"] = "form-control";
			$this->PrintBy->EditCustomAttributes = "";
			if (!$this->PrintBy->Raw)
				$this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
			$this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
			$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

			// PrintDate
			$this->PrintDate->EditAttrs["class"] = "form-control";
			$this->PrintDate->EditCustomAttributes = "";
			$this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
			$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (!$this->BilledBy->Raw)
				$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (!$this->Resulted->Raw)
				$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (!$this->ResultedBy->Raw)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// SampleDate
			$this->SampleDate->EditAttrs["class"] = "form-control";
			$this->SampleDate->EditCustomAttributes = "";
			$this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
			$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

			// SampleUser
			$this->SampleUser->EditAttrs["class"] = "form-control";
			$this->SampleUser->EditCustomAttributes = "";
			if (!$this->SampleUser->Raw)
				$this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
			$this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
			$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (!$this->Sampled->Raw)
				$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

			// ReceivedDate
			$this->ReceivedDate->EditAttrs["class"] = "form-control";
			$this->ReceivedDate->EditCustomAttributes = "";
			$this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
			$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

			// ReceivedUser
			$this->ReceivedUser->EditAttrs["class"] = "form-control";
			$this->ReceivedUser->EditCustomAttributes = "";
			if (!$this->ReceivedUser->Raw)
				$this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (!$this->Recevied->Raw)
				$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

			// DeptRecvDate
			$this->DeptRecvDate->EditAttrs["class"] = "form-control";
			$this->DeptRecvDate->EditCustomAttributes = "";
			$this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
			$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

			// DeptRecvUser
			$this->DeptRecvUser->EditAttrs["class"] = "form-control";
			$this->DeptRecvUser->EditCustomAttributes = "";
			if (!$this->DeptRecvUser->Raw)
				$this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (!$this->DeptRecived->Raw)
				$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

			// SAuthDate
			$this->SAuthDate->EditAttrs["class"] = "form-control";
			$this->SAuthDate->EditCustomAttributes = "";
			$this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
			$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

			// SAuthBy
			$this->SAuthBy->EditAttrs["class"] = "form-control";
			$this->SAuthBy->EditCustomAttributes = "";
			if (!$this->SAuthBy->Raw)
				$this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (!$this->SAuthendicate->Raw)
				$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (!$this->Authencate->Raw)
				$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (!$this->EditBy->Raw)
				$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (!$this->Editted->Raw)
				$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() != "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
				$this->PatID->OldValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
				$this->PatID->ViewCustomAttributes = "";
			} else {
				$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
				$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}
			

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (!$this->ResType->Raw)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (!$this->Sample->Raw)
				$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
			if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
				$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
				$this->NoD->OldValue = $this->NoD->EditValue;
			}
			

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
			if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
				$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
				$this->BillOrder->OldValue = $this->BillOrder->EditValue;
			}
			

			// Inactive
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (!$this->Inactive->Raw)
				$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (!$this->CollSample->Raw)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (!$this->TestType->Raw)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (!$this->Repeated->Raw)
				$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (!$this->RepeatedBy->Raw)
				$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (!$this->Service_Type->Raw)
				$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (!$this->Service_Department->Raw)
				$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
			$this->SubTotal->Total = 0; // Initialize total
		} elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
			$this->SubTotal->CurrentValue = $this->SubTotal->Total;
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";
			$this->SubTotal->HrefValue = ""; // Clear href value
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
		if ($this->Services->Required) {
			if (!$this->Services->IsDetailKey && $this->Services->FormValue != NULL && $this->Services->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
			}
		}
		if ($this->amount->Required) {
			if (!$this->amount->IsDetailKey && $this->amount->FormValue != NULL && $this->amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->amount->FormValue)) {
			AddMessage($FormError, $this->amount->errorMessage());
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->patient_type->Required) {
			if (!$this->patient_type->IsDetailKey && $this->patient_type->FormValue != NULL && $this->patient_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_type->FormValue)) {
			AddMessage($FormError, $this->patient_type->errorMessage());
		}
		if ($this->charged_date->Required) {
			if (!$this->charged_date->IsDetailKey && $this->charged_date->FormValue != NULL && $this->charged_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Unit->FormValue)) {
			AddMessage($FormError, $this->Unit->errorMessage());
		}
		if ($this->Quantity->Required) {
			if (!$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Quantity->FormValue)) {
			AddMessage($FormError, $this->Quantity->errorMessage());
		}
		if ($this->Discount->Required) {
			if (!$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Discount->FormValue)) {
			AddMessage($FormError, $this->Discount->errorMessage());
		}
		if ($this->SubTotal->Required) {
			if (!$this->SubTotal->IsDetailKey && $this->SubTotal->FormValue != NULL && $this->SubTotal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SubTotal->FormValue)) {
			AddMessage($FormError, $this->SubTotal->errorMessage());
		}
		if ($this->ServiceSelect->Required) {
			if ($this->ServiceSelect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ServiceSelect->caption(), $this->ServiceSelect->RequiredErrorMessage));
			}
		}
		if ($this->Aid->Required) {
			if (!$this->Aid->IsDetailKey && $this->Aid->FormValue != NULL && $this->Aid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Aid->FormValue)) {
			AddMessage($FormError, $this->Aid->errorMessage());
		}
		if ($this->Vid->Required) {
			if (!$this->Vid->IsDetailKey && $this->Vid->FormValue != NULL && $this->Vid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Vid->FormValue)) {
			AddMessage($FormError, $this->Vid->errorMessage());
		}
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrID->FormValue)) {
			AddMessage($FormError, $this->DrID->errorMessage());
		}
		if ($this->DrCODE->Required) {
			if (!$this->DrCODE->IsDetailKey && $this->DrCODE->FormValue != NULL && $this->DrCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrCODE->caption(), $this->DrCODE->RequiredErrorMessage));
			}
		}
		if ($this->DrName->Required) {
			if (!$this->DrName->IsDetailKey && $this->DrName->FormValue != NULL && $this->DrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->DrSharePres->Required) {
			if (!$this->DrSharePres->IsDetailKey && $this->DrSharePres->FormValue != NULL && $this->DrSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrSharePres->caption(), $this->DrSharePres->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrSharePres->FormValue)) {
			AddMessage($FormError, $this->DrSharePres->errorMessage());
		}
		if ($this->HospSharePres->Required) {
			if (!$this->HospSharePres->IsDetailKey && $this->HospSharePres->FormValue != NULL && $this->HospSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospSharePres->caption(), $this->HospSharePres->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->HospSharePres->FormValue)) {
			AddMessage($FormError, $this->HospSharePres->errorMessage());
		}
		if ($this->DrShareAmount->Required) {
			if (!$this->DrShareAmount->IsDetailKey && $this->DrShareAmount->FormValue != NULL && $this->DrShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrShareAmount->FormValue)) {
			AddMessage($FormError, $this->DrShareAmount->errorMessage());
		}
		if ($this->HospShareAmount->Required) {
			if (!$this->HospShareAmount->IsDetailKey && $this->HospShareAmount->FormValue != NULL && $this->HospShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->HospShareAmount->FormValue)) {
			AddMessage($FormError, $this->HospShareAmount->errorMessage());
		}
		if ($this->DrShareSettiledAmount->Required) {
			if (!$this->DrShareSettiledAmount->IsDetailKey && $this->DrShareSettiledAmount->FormValue != NULL && $this->DrShareSettiledAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledAmount->caption(), $this->DrShareSettiledAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrShareSettiledAmount->FormValue)) {
			AddMessage($FormError, $this->DrShareSettiledAmount->errorMessage());
		}
		if ($this->DrShareSettledId->Required) {
			if (!$this->DrShareSettledId->IsDetailKey && $this->DrShareSettledId->FormValue != NULL && $this->DrShareSettledId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettledId->caption(), $this->DrShareSettledId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrShareSettledId->FormValue)) {
			AddMessage($FormError, $this->DrShareSettledId->errorMessage());
		}
		if ($this->DrShareSettiledStatus->Required) {
			if (!$this->DrShareSettiledStatus->IsDetailKey && $this->DrShareSettiledStatus->FormValue != NULL && $this->DrShareSettiledStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledStatus->caption(), $this->DrShareSettiledStatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrShareSettiledStatus->FormValue)) {
			AddMessage($FormError, $this->DrShareSettiledStatus->errorMessage());
		}
		if ($this->invoiceId->Required) {
			if (!$this->invoiceId->IsDetailKey && $this->invoiceId->FormValue != NULL && $this->invoiceId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->invoiceId->FormValue)) {
			AddMessage($FormError, $this->invoiceId->errorMessage());
		}
		if ($this->invoiceAmount->Required) {
			if (!$this->invoiceAmount->IsDetailKey && $this->invoiceAmount->FormValue != NULL && $this->invoiceAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->invoiceAmount->FormValue)) {
			AddMessage($FormError, $this->invoiceAmount->errorMessage());
		}
		if ($this->invoiceStatus->Required) {
			if (!$this->invoiceStatus->IsDetailKey && $this->invoiceStatus->FormValue != NULL && $this->invoiceStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
			}
		}
		if ($this->modeOfPayment->Required) {
			if (!$this->modeOfPayment->IsDetailKey && $this->modeOfPayment->FormValue != NULL && $this->modeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if ($this->DiscountCategory->Required) {
			if (!$this->DiscountCategory->IsDetailKey && $this->DiscountCategory->FormValue != NULL && $this->DiscountCategory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountCategory->caption(), $this->DiscountCategory->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if (!$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sid->FormValue)) {
			AddMessage($FormError, $this->sid->errorMessage());
		}
		if ($this->ItemCode->Required) {
			if (!$this->ItemCode->IsDetailKey && $this->ItemCode->FormValue != NULL && $this->ItemCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
			}
		}
		if ($this->TestSubCd->Required) {
			if (!$this->TestSubCd->IsDetailKey && $this->TestSubCd->FormValue != NULL && $this->TestSubCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
			}
		}
		if ($this->DEptCd->Required) {
			if (!$this->DEptCd->IsDetailKey && $this->DEptCd->FormValue != NULL && $this->DEptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
			}
		}
		if ($this->ProfCd->Required) {
			if (!$this->ProfCd->IsDetailKey && $this->ProfCd->FormValue != NULL && $this->ProfCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfCd->caption(), $this->ProfCd->RequiredErrorMessage));
			}
		}
		if ($this->Comments->Required) {
			if (!$this->Comments->IsDetailKey && $this->Comments->FormValue != NULL && $this->Comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Specimen->Required) {
			if (!$this->Specimen->IsDetailKey && $this->Specimen->FormValue != NULL && $this->Specimen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Specimen->caption(), $this->Specimen->RequiredErrorMessage));
			}
		}
		if ($this->Abnormal->Required) {
			if (!$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->TestUnit->Required) {
			if (!$this->TestUnit->IsDetailKey && $this->TestUnit->FormValue != NULL && $this->TestUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
			}
		}
		if ($this->LOWHIGH->Required) {
			if (!$this->LOWHIGH->IsDetailKey && $this->LOWHIGH->FormValue != NULL && $this->LOWHIGH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
			}
		}
		if ($this->Branch->Required) {
			if (!$this->Branch->IsDetailKey && $this->Branch->FormValue != NULL && $this->Branch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
			}
		}
		if ($this->Dispatch->Required) {
			if (!$this->Dispatch->IsDetailKey && $this->Dispatch->FormValue != NULL && $this->Dispatch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
			}
		}
		if ($this->Pic1->Required) {
			if (!$this->Pic1->IsDetailKey && $this->Pic1->FormValue != NULL && $this->Pic1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
			}
		}
		if ($this->Pic2->Required) {
			if (!$this->Pic2->IsDetailKey && $this->Pic2->FormValue != NULL && $this->Pic2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
			}
		}
		if ($this->GraphPath->Required) {
			if (!$this->GraphPath->IsDetailKey && $this->GraphPath->FormValue != NULL && $this->GraphPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GraphPath->caption(), $this->GraphPath->RequiredErrorMessage));
			}
		}
		if ($this->MachineCD->Required) {
			if (!$this->MachineCD->IsDetailKey && $this->MachineCD->FormValue != NULL && $this->MachineCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MachineCD->caption(), $this->MachineCD->RequiredErrorMessage));
			}
		}
		if ($this->TestCancel->Required) {
			if (!$this->TestCancel->IsDetailKey && $this->TestCancel->FormValue != NULL && $this->TestCancel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCancel->caption(), $this->TestCancel->RequiredErrorMessage));
			}
		}
		if ($this->OutSource->Required) {
			if (!$this->OutSource->IsDetailKey && $this->OutSource->FormValue != NULL && $this->OutSource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
			}
		}
		if ($this->Printed->Required) {
			if (!$this->Printed->IsDetailKey && $this->Printed->FormValue != NULL && $this->Printed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
			}
		}
		if ($this->PrintBy->Required) {
			if (!$this->PrintBy->IsDetailKey && $this->PrintBy->FormValue != NULL && $this->PrintBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintBy->caption(), $this->PrintBy->RequiredErrorMessage));
			}
		}
		if ($this->PrintDate->Required) {
			if (!$this->PrintDate->IsDetailKey && $this->PrintDate->FormValue != NULL && $this->PrintDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintDate->caption(), $this->PrintDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->PrintDate->FormValue)) {
			AddMessage($FormError, $this->PrintDate->errorMessage());
		}
		if ($this->BillingDate->Required) {
			if (!$this->BillingDate->IsDetailKey && $this->BillingDate->FormValue != NULL && $this->BillingDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillingDate->caption(), $this->BillingDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillingDate->FormValue)) {
			AddMessage($FormError, $this->BillingDate->errorMessage());
		}
		if ($this->BilledBy->Required) {
			if (!$this->BilledBy->IsDetailKey && $this->BilledBy->FormValue != NULL && $this->BilledBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BilledBy->caption(), $this->BilledBy->RequiredErrorMessage));
			}
		}
		if ($this->Resulted->Required) {
			if (!$this->Resulted->IsDetailKey && $this->Resulted->FormValue != NULL && $this->Resulted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
		}
		if ($this->ResultedBy->Required) {
			if (!$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
			}
		}
		if ($this->SampleDate->Required) {
			if (!$this->SampleDate->IsDetailKey && $this->SampleDate->FormValue != NULL && $this->SampleDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleDate->caption(), $this->SampleDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SampleDate->FormValue)) {
			AddMessage($FormError, $this->SampleDate->errorMessage());
		}
		if ($this->SampleUser->Required) {
			if (!$this->SampleUser->IsDetailKey && $this->SampleUser->FormValue != NULL && $this->SampleUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleUser->caption(), $this->SampleUser->RequiredErrorMessage));
			}
		}
		if ($this->Sampled->Required) {
			if (!$this->Sampled->IsDetailKey && $this->Sampled->FormValue != NULL && $this->Sampled->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sampled->caption(), $this->Sampled->RequiredErrorMessage));
			}
		}
		if ($this->ReceivedDate->Required) {
			if (!$this->ReceivedDate->IsDetailKey && $this->ReceivedDate->FormValue != NULL && $this->ReceivedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedDate->caption(), $this->ReceivedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReceivedDate->FormValue)) {
			AddMessage($FormError, $this->ReceivedDate->errorMessage());
		}
		if ($this->ReceivedUser->Required) {
			if (!$this->ReceivedUser->IsDetailKey && $this->ReceivedUser->FormValue != NULL && $this->ReceivedUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedUser->caption(), $this->ReceivedUser->RequiredErrorMessage));
			}
		}
		if ($this->Recevied->Required) {
			if (!$this->Recevied->IsDetailKey && $this->Recevied->FormValue != NULL && $this->Recevied->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Recevied->caption(), $this->Recevied->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecvDate->Required) {
			if (!$this->DeptRecvDate->IsDetailKey && $this->DeptRecvDate->FormValue != NULL && $this->DeptRecvDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvDate->caption(), $this->DeptRecvDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DeptRecvDate->FormValue)) {
			AddMessage($FormError, $this->DeptRecvDate->errorMessage());
		}
		if ($this->DeptRecvUser->Required) {
			if (!$this->DeptRecvUser->IsDetailKey && $this->DeptRecvUser->FormValue != NULL && $this->DeptRecvUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvUser->caption(), $this->DeptRecvUser->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecived->Required) {
			if (!$this->DeptRecived->IsDetailKey && $this->DeptRecived->FormValue != NULL && $this->DeptRecived->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecived->caption(), $this->DeptRecived->RequiredErrorMessage));
			}
		}
		if ($this->SAuthDate->Required) {
			if (!$this->SAuthDate->IsDetailKey && $this->SAuthDate->FormValue != NULL && $this->SAuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthDate->caption(), $this->SAuthDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SAuthDate->FormValue)) {
			AddMessage($FormError, $this->SAuthDate->errorMessage());
		}
		if ($this->SAuthBy->Required) {
			if (!$this->SAuthBy->IsDetailKey && $this->SAuthBy->FormValue != NULL && $this->SAuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthBy->caption(), $this->SAuthBy->RequiredErrorMessage));
			}
		}
		if ($this->SAuthendicate->Required) {
			if (!$this->SAuthendicate->IsDetailKey && $this->SAuthendicate->FormValue != NULL && $this->SAuthendicate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthendicate->caption(), $this->SAuthendicate->RequiredErrorMessage));
			}
		}
		if ($this->AuthDate->Required) {
			if (!$this->AuthDate->IsDetailKey && $this->AuthDate->FormValue != NULL && $this->AuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthDate->caption(), $this->AuthDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->AuthDate->FormValue)) {
			AddMessage($FormError, $this->AuthDate->errorMessage());
		}
		if ($this->AuthBy->Required) {
			if (!$this->AuthBy->IsDetailKey && $this->AuthBy->FormValue != NULL && $this->AuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
			}
		}
		if ($this->Authencate->Required) {
			if (!$this->Authencate->IsDetailKey && $this->Authencate->FormValue != NULL && $this->Authencate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Authencate->caption(), $this->Authencate->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if (!$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EditDate->FormValue)) {
			AddMessage($FormError, $this->EditDate->errorMessage());
		}
		if ($this->EditBy->Required) {
			if (!$this->EditBy->IsDetailKey && $this->EditBy->FormValue != NULL && $this->EditBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditBy->caption(), $this->EditBy->RequiredErrorMessage));
			}
		}
		if ($this->Editted->Required) {
			if (!$this->Editted->IsDetailKey && $this->Editted->FormValue != NULL && $this->Editted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Editted->caption(), $this->Editted->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PatID->FormValue)) {
			AddMessage($FormError, $this->PatID->errorMessage());
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CId->FormValue)) {
			AddMessage($FormError, $this->CId->errorMessage());
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->ResType->Required) {
			if (!$this->ResType->IsDetailKey && $this->ResType->FormValue != NULL && $this->ResType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
			}
		}
		if ($this->Sample->Required) {
			if (!$this->Sample->IsDetailKey && $this->Sample->FormValue != NULL && $this->Sample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
			}
		}
		if ($this->NoD->Required) {
			if (!$this->NoD->IsDetailKey && $this->NoD->FormValue != NULL && $this->NoD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NoD->FormValue)) {
			AddMessage($FormError, $this->NoD->errorMessage());
		}
		if ($this->BillOrder->Required) {
			if (!$this->BillOrder->IsDetailKey && $this->BillOrder->FormValue != NULL && $this->BillOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillOrder->FormValue)) {
			AddMessage($FormError, $this->BillOrder->errorMessage());
		}
		if ($this->Inactive->Required) {
			if (!$this->Inactive->IsDetailKey && $this->Inactive->FormValue != NULL && $this->Inactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
			}
		}
		if ($this->CollSample->Required) {
			if (!$this->CollSample->IsDetailKey && $this->CollSample->FormValue != NULL && $this->CollSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
			}
		}
		if ($this->TestType->Required) {
			if (!$this->TestType->IsDetailKey && $this->TestType->FormValue != NULL && $this->TestType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
			}
		}
		if ($this->Repeated->Required) {
			if (!$this->Repeated->IsDetailKey && $this->Repeated->FormValue != NULL && $this->Repeated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedBy->Required) {
			if (!$this->RepeatedBy->IsDetailKey && $this->RepeatedBy->FormValue != NULL && $this->RepeatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedBy->caption(), $this->RepeatedBy->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedDate->Required) {
			if (!$this->RepeatedDate->IsDetailKey && $this->RepeatedDate->FormValue != NULL && $this->RepeatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedDate->caption(), $this->RepeatedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->RepeatedDate->FormValue)) {
			AddMessage($FormError, $this->RepeatedDate->errorMessage());
		}
		if ($this->serviceID->Required) {
			if (!$this->serviceID->IsDetailKey && $this->serviceID->FormValue != NULL && $this->serviceID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->serviceID->caption(), $this->serviceID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->serviceID->FormValue)) {
			AddMessage($FormError, $this->serviceID->errorMessage());
		}
		if ($this->Service_Type->Required) {
			if (!$this->Service_Type->IsDetailKey && $this->Service_Type->FormValue != NULL && $this->Service_Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Type->caption(), $this->Service_Type->RequiredErrorMessage));
			}
		}
		if ($this->Service_Department->Required) {
			if (!$this->Service_Department->IsDetailKey && $this->Service_Department->FormValue != NULL && $this->Service_Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Department->caption(), $this->Service_Department->RequiredErrorMessage));
			}
		}
		if ($this->RequestNo->Required) {
			if (!$this->RequestNo->IsDetailKey && $this->RequestNo->FormValue != NULL && $this->RequestNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RequestNo->caption(), $this->RequestNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RequestNo->FormValue)) {
			AddMessage($FormError, $this->RequestNo->errorMessage());
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

			// Services
			$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

			// amount
			$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, $this->amount->ReadOnly);

			// description
			$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, $this->description->ReadOnly);

			// patient_type
			$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, NULL, $this->patient_type->ReadOnly);

			// charged_date
			$this->charged_date->CurrentValue = CurrentDate();
			$this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, NULL);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// Unit
			$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, $this->Unit->ReadOnly);

			// Quantity
			$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, $this->Quantity->ReadOnly);

			// Discount
			$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, $this->Discount->ReadOnly);

			// SubTotal
			$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, $this->SubTotal->ReadOnly);

			// ServiceSelect
			$this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", $this->ServiceSelect->ReadOnly);

			// Aid
			$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, $this->Aid->ReadOnly);

			// Vid
			$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, $this->Vid->ReadOnly);

			// DrID
			$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, $this->DrID->ReadOnly);

			// DrCODE
			$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, $this->DrCODE->ReadOnly);

			// DrName
			$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, $this->DrName->ReadOnly);

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly);

			// DrSharePres
			$this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, NULL, $this->DrSharePres->ReadOnly);

			// HospSharePres
			$this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, NULL, $this->HospSharePres->ReadOnly);

			// DrShareAmount
			$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, $this->DrShareAmount->ReadOnly);

			// HospShareAmount
			$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, $this->HospShareAmount->ReadOnly);

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, NULL, $this->DrShareSettiledAmount->ReadOnly);

			// DrShareSettledId
			$this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, NULL, $this->DrShareSettledId->ReadOnly);

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, NULL, $this->DrShareSettiledStatus->ReadOnly);

			// invoiceId
			$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, $this->invoiceId->ReadOnly);

			// invoiceAmount
			$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, $this->invoiceAmount->ReadOnly);

			// invoiceStatus
			$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, $this->invoiceStatus->ReadOnly);

			// modeOfPayment
			$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, $this->modeOfPayment->ReadOnly);

			// DiscountCategory
			$this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, NULL, $this->DiscountCategory->ReadOnly);

			// sid
			$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, $this->sid->ReadOnly);

			// ItemCode
			$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, $this->ItemCode->ReadOnly);

			// TestSubCd
			$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, $this->TestSubCd->ReadOnly);

			// DEptCd
			$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, $this->DEptCd->ReadOnly);

			// ProfCd
			$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, NULL, $this->ProfCd->ReadOnly);

			// Comments
			$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, $this->Comments->ReadOnly);

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly);

			// Specimen
			$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, NULL, $this->Specimen->ReadOnly);

			// Abnormal
			$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, $this->Abnormal->ReadOnly);

			// TestUnit
			$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, $this->TestUnit->ReadOnly);

			// LOWHIGH
			$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, NULL, $this->LOWHIGH->ReadOnly);

			// Branch
			$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, NULL, $this->Branch->ReadOnly);

			// Dispatch
			$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, NULL, $this->Dispatch->ReadOnly);

			// Pic1
			$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, NULL, $this->Pic1->ReadOnly);

			// Pic2
			$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, NULL, $this->Pic2->ReadOnly);

			// GraphPath
			$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, NULL, $this->GraphPath->ReadOnly);

			// MachineCD
			$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, NULL, $this->MachineCD->ReadOnly);

			// TestCancel
			$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, NULL, $this->TestCancel->ReadOnly);

			// OutSource
			$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, NULL, $this->OutSource->ReadOnly);

			// Printed
			$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, NULL, $this->Printed->ReadOnly);

			// PrintBy
			$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, NULL, $this->PrintBy->ReadOnly);

			// PrintDate
			$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, $this->PrintDate->ReadOnly);

			// BillingDate
			$this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), NULL, $this->BillingDate->ReadOnly);

			// BilledBy
			$this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, NULL, $this->BilledBy->ReadOnly);

			// Resulted
			$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, $this->Resulted->ReadOnly);

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, $this->ResultDate->ReadOnly);

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, $this->ResultedBy->ReadOnly);

			// SampleDate
			$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, $this->SampleDate->ReadOnly);

			// SampleUser
			$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, NULL, $this->SampleUser->ReadOnly);

			// Sampled
			$this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, NULL, $this->Sampled->ReadOnly);

			// ReceivedDate
			$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, $this->ReceivedDate->ReadOnly);

			// ReceivedUser
			$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, NULL, $this->ReceivedUser->ReadOnly);

			// Recevied
			$this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, NULL, $this->Recevied->ReadOnly);

			// DeptRecvDate
			$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, $this->DeptRecvDate->ReadOnly);

			// DeptRecvUser
			$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, NULL, $this->DeptRecvUser->ReadOnly);

			// DeptRecived
			$this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, NULL, $this->DeptRecived->ReadOnly);

			// SAuthDate
			$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, $this->SAuthDate->ReadOnly);

			// SAuthBy
			$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, NULL, $this->SAuthBy->ReadOnly);

			// SAuthendicate
			$this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, NULL, $this->SAuthendicate->ReadOnly);

			// AuthDate
			$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, $this->AuthDate->ReadOnly);

			// AuthBy
			$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, NULL, $this->AuthBy->ReadOnly);

			// Authencate
			$this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, NULL, $this->Authencate->ReadOnly);

			// EditDate
			$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, $this->EditDate->ReadOnly);

			// EditBy
			$this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, NULL, $this->EditBy->ReadOnly);

			// Editted
			$this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, NULL, $this->Editted->ReadOnly);

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly);

			// Mobile
			$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, $this->Mobile->ReadOnly);

			// CId
			$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, $this->CId->ReadOnly);

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, $this->Order->ReadOnly);

			// ResType
			$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, $this->ResType->ReadOnly);

			// Sample
			$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, $this->Sample->ReadOnly);

			// NoD
			$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, $this->NoD->ReadOnly);

			// BillOrder
			$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, $this->BillOrder->ReadOnly);

			// Inactive
			$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, $this->Inactive->ReadOnly);

			// CollSample
			$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, $this->CollSample->ReadOnly);

			// TestType
			$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, $this->TestType->ReadOnly);

			// Repeated
			$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, $this->Repeated->ReadOnly);

			// RepeatedBy
			$this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, NULL, $this->RepeatedBy->ReadOnly);

			// RepeatedDate
			$this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), NULL, $this->RepeatedDate->ReadOnly);

			// serviceID
			$this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, NULL, $this->serviceID->ReadOnly);

			// Service_Type
			$this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, NULL, $this->Service_Type->ReadOnly);

			// Service_Department
			$this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, NULL, $this->Service_Department->ReadOnly);

			// RequestNo
			$this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, NULL, $this->RequestNo->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "billing_voucher") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
			}
			if ($this->getCurrentMasterTable() == "ip_admission") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
			}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// Services
		$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", FALSE);

		// amount
		$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// patient_type
		$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, NULL, FALSE);

		// charged_date
		$this->charged_date->CurrentValue = CurrentDate();
		$this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, NULL);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// Unit
		$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, FALSE);

		// Quantity
		$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, FALSE);

		// Discount
		$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, FALSE);

		// SubTotal
		$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, FALSE);

		// ServiceSelect
		$this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", FALSE);

		// Aid
		$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, FALSE);

		// Vid
		$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, FALSE);

		// DrID
		$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, FALSE);

		// DrCODE
		$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, FALSE);

		// DrName
		$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// DrSharePres
		$this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, NULL, FALSE);

		// HospSharePres
		$this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, NULL, FALSE);

		// DrShareAmount
		$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, FALSE);

		// HospShareAmount
		$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, FALSE);

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, NULL, FALSE);

		// DrShareSettledId
		$this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, NULL, FALSE);

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, NULL, FALSE);

		// invoiceId
		$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, FALSE);

		// invoiceAmount
		$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, FALSE);

		// invoiceStatus
		$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, FALSE);

		// modeOfPayment
		$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// RIDNO
		$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// DiscountCategory
		$this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, NULL, FALSE);

		// sid
		$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, FALSE);

		// ItemCode
		$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, FALSE);

		// TestSubCd
		$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, FALSE);

		// DEptCd
		$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, FALSE);

		// ProfCd
		$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, NULL, FALSE);

		// Comments
		$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, FALSE);

		// Specimen
		$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, NULL, FALSE);

		// Abnormal
		$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, FALSE);

		// TestUnit
		$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, FALSE);

		// LOWHIGH
		$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, NULL, FALSE);

		// Branch
		$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, NULL, FALSE);

		// Dispatch
		$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, NULL, FALSE);

		// Pic1
		$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, NULL, FALSE);

		// Pic2
		$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, NULL, FALSE);

		// GraphPath
		$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, NULL, FALSE);

		// MachineCD
		$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, NULL, FALSE);

		// TestCancel
		$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, NULL, FALSE);

		// OutSource
		$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, NULL, FALSE);

		// Printed
		$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, NULL, FALSE);

		// PrintBy
		$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, NULL, FALSE);

		// PrintDate
		$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, FALSE);

		// BillingDate
		$this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), NULL, FALSE);

		// BilledBy
		$this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, NULL, FALSE);

		// Resulted
		$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, FALSE);

		// ResultedBy
		$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, FALSE);

		// SampleDate
		$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, FALSE);

		// SampleUser
		$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, NULL, FALSE);

		// Sampled
		$this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, NULL, FALSE);

		// ReceivedDate
		$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, FALSE);

		// ReceivedUser
		$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, NULL, FALSE);

		// Recevied
		$this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, NULL, FALSE);

		// DeptRecvDate
		$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, FALSE);

		// DeptRecvUser
		$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, NULL, FALSE);

		// DeptRecived
		$this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, NULL, FALSE);

		// SAuthDate
		$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, FALSE);

		// SAuthBy
		$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, NULL, FALSE);

		// SAuthendicate
		$this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, NULL, FALSE);

		// AuthDate
		$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, FALSE);

		// AuthBy
		$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, NULL, FALSE);

		// Authencate
		$this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, NULL, FALSE);

		// EditDate
		$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, FALSE);

		// EditBy
		$this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, NULL, FALSE);

		// Editted
		$this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, NULL, FALSE);

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// CId
		$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, FALSE);

		// Order
		$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, FALSE);

		// ResType
		$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, FALSE);

		// Sample
		$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, FALSE);

		// NoD
		$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, FALSE);

		// BillOrder
		$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, FALSE);

		// Inactive
		$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, FALSE);

		// CollSample
		$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, FALSE);

		// TestType
		$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, strval($this->TestType->CurrentValue) == "");

		// Repeated
		$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, FALSE);

		// RepeatedBy
		$this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, NULL, FALSE);

		// RepeatedDate
		$this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), NULL, FALSE);

		// serviceID
		$this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, NULL, FALSE);

		// Service_Type
		$this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, NULL, FALSE);

		// Service_Department
		$this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, NULL, FALSE);

		// RequestNo
		$this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, NULL, strval($this->RequestNo->CurrentValue) == "");

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
		if ($masterTblVar == "billing_voucher") {
			$this->Vid->Visible = FALSE;
			if ($GLOBALS["billing_voucher"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		if ($masterTblVar == "ip_admission") {
			$this->Reception->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->mrnno->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->PatID->Visible = FALSE;
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
				case "x_Services":
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_status":
					break;
				case "x_ServiceSelect":
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
						case "x_Services":
							break;
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
		$curPage = $_GET['showmaster'];
		if( $curPage == 'view_appointment_scheduler')
		{

		//	$this->GridAddRowCount = 40;
		}
		else{

		//	$this->GridAddRowCount = 40;
		}
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
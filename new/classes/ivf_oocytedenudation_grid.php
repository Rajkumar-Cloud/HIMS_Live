<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_oocytedenudation_grid extends ivf_oocytedenudation
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_oocytedenudation';

	// Page object name
	public $PageObjName = "ivf_oocytedenudation_grid";

	// Grid form hidden field names
	public $FormName = "fivf_oocytedenudationgrid";
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

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
			$GLOBALS["ivf_oocytedenudation"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["ivf_oocytedenudation"];

		}
		$this->AddUrl = "ivf_oocytedenudationadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_oocytedenudation');

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
		global $ivf_oocytedenudation;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_oocytedenudation);
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
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ResultDate->setVisibility();
		$this->Surgeon->setVisibility();
		$this->AsstSurgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AnaestheiaType->setVisibility();
		$this->PrimaryEmbryologist->setVisibility();
		$this->SecondaryEmbryologist->setVisibility();
		$this->OPUNotes->Visible = FALSE;
		$this->NoOfFolliclesRight->setVisibility();
		$this->NoOfFolliclesLeft->setVisibility();
		$this->NoOfOocytes->setVisibility();
		$this->RecordOocyteDenudation->setVisibility();
		$this->DateOfDenudation->setVisibility();
		$this->DenudationDoneBy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TidNo->setVisibility();
		$this->ExpFollicles->setVisibility();
		$this->SecondaryDenudationDoneBy->setVisibility();
		$this->patient2->Visible = FALSE;
		$this->OocytesDonate1->Visible = FALSE;
		$this->OocytesDonate2->Visible = FALSE;
		$this->ETDonate->Visible = FALSE;
		$this->OocyteOrgin->setVisibility();
		$this->patient1->setVisibility();
		$this->OocyteType->setVisibility();
		$this->MIOocytesDonate1->setVisibility();
		$this->MIOocytesDonate2->setVisibility();
		$this->SelfMI->setVisibility();
		$this->SelfMII->setVisibility();
		$this->patient3->setVisibility();
		$this->patient4->setVisibility();
		$this->OocytesDonate3->setVisibility();
		$this->OocytesDonate4->setVisibility();
		$this->MIOocytesDonate3->setVisibility();
		$this->MIOocytesDonate4->setVisibility();
		$this->SelfOocytesMI->setVisibility();
		$this->SelfOocytesMII->setVisibility();
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
		$this->setupLookupOptions($this->patient2);
		$this->setupLookupOptions($this->patient1);
		$this->setupLookupOptions($this->patient3);
		$this->setupLookupOptions($this->patient4);

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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_ivf_treatment") {
			global $view_ivf_treatment;
			$rsmaster = $view_ivf_treatment->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("view_ivf_treatmentlist.php"); // Return to master page
			} else {
				$view_ivf_treatment->loadListRowValues($rsmaster);
				$view_ivf_treatment->RowType = ROWTYPE_MASTER; // Master row
				$view_ivf_treatment->renderListRow();
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
		if ($CurrentForm->hasValue("x_RIDNo") && $CurrentForm->hasValue("o_RIDNo") && $this->RIDNo->CurrentValue != $this->RIDNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue != $this->Name->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Surgeon") && $CurrentForm->hasValue("o_Surgeon") && $this->Surgeon->CurrentValue != $this->Surgeon->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AsstSurgeon") && $CurrentForm->hasValue("o_AsstSurgeon") && $this->AsstSurgeon->CurrentValue != $this->AsstSurgeon->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Anaesthetist") && $CurrentForm->hasValue("o_Anaesthetist") && $this->Anaesthetist->CurrentValue != $this->Anaesthetist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnaestheiaType") && $CurrentForm->hasValue("o_AnaestheiaType") && $this->AnaestheiaType->CurrentValue != $this->AnaestheiaType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrimaryEmbryologist") && $CurrentForm->hasValue("o_PrimaryEmbryologist") && $this->PrimaryEmbryologist->CurrentValue != $this->PrimaryEmbryologist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SecondaryEmbryologist") && $CurrentForm->hasValue("o_SecondaryEmbryologist") && $this->SecondaryEmbryologist->CurrentValue != $this->SecondaryEmbryologist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfFolliclesRight") && $CurrentForm->hasValue("o_NoOfFolliclesRight") && $this->NoOfFolliclesRight->CurrentValue != $this->NoOfFolliclesRight->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfFolliclesLeft") && $CurrentForm->hasValue("o_NoOfFolliclesLeft") && $this->NoOfFolliclesLeft->CurrentValue != $this->NoOfFolliclesLeft->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoOfOocytes") && $CurrentForm->hasValue("o_NoOfOocytes") && $this->NoOfOocytes->CurrentValue != $this->NoOfOocytes->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RecordOocyteDenudation") && $CurrentForm->hasValue("o_RecordOocyteDenudation") && $this->RecordOocyteDenudation->CurrentValue != $this->RecordOocyteDenudation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateOfDenudation") && $CurrentForm->hasValue("o_DateOfDenudation") && $this->DateOfDenudation->CurrentValue != $this->DateOfDenudation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DenudationDoneBy") && $CurrentForm->hasValue("o_DenudationDoneBy") && $this->DenudationDoneBy->CurrentValue != $this->DenudationDoneBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ExpFollicles") && $CurrentForm->hasValue("o_ExpFollicles") && $this->ExpFollicles->CurrentValue != $this->ExpFollicles->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SecondaryDenudationDoneBy") && $CurrentForm->hasValue("o_SecondaryDenudationDoneBy") && $this->SecondaryDenudationDoneBy->CurrentValue != $this->SecondaryDenudationDoneBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OocyteOrgin") && $CurrentForm->hasValue("o_OocyteOrgin") && $this->OocyteOrgin->CurrentValue != $this->OocyteOrgin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patient1") && $CurrentForm->hasValue("o_patient1") && $this->patient1->CurrentValue != $this->patient1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OocyteType") && $CurrentForm->hasValue("o_OocyteType") && $this->OocyteType->CurrentValue != $this->OocyteType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MIOocytesDonate1") && $CurrentForm->hasValue("o_MIOocytesDonate1") && $this->MIOocytesDonate1->CurrentValue != $this->MIOocytesDonate1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MIOocytesDonate2") && $CurrentForm->hasValue("o_MIOocytesDonate2") && $this->MIOocytesDonate2->CurrentValue != $this->MIOocytesDonate2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SelfMI") && $CurrentForm->hasValue("o_SelfMI") && $this->SelfMI->CurrentValue != $this->SelfMI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SelfMII") && $CurrentForm->hasValue("o_SelfMII") && $this->SelfMII->CurrentValue != $this->SelfMII->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patient3") && $CurrentForm->hasValue("o_patient3") && $this->patient3->CurrentValue != $this->patient3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patient4") && $CurrentForm->hasValue("o_patient4") && $this->patient4->CurrentValue != $this->patient4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OocytesDonate3") && $CurrentForm->hasValue("o_OocytesDonate3") && $this->OocytesDonate3->CurrentValue != $this->OocytesDonate3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OocytesDonate4") && $CurrentForm->hasValue("o_OocytesDonate4") && $this->OocytesDonate4->CurrentValue != $this->OocytesDonate4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MIOocytesDonate3") && $CurrentForm->hasValue("o_MIOocytesDonate3") && $this->MIOocytesDonate3->CurrentValue != $this->MIOocytesDonate3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MIOocytesDonate4") && $CurrentForm->hasValue("o_MIOocytesDonate4") && $this->MIOocytesDonate4->CurrentValue != $this->MIOocytesDonate4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SelfOocytesMI") && $CurrentForm->hasValue("o_SelfOocytesMI") && $this->SelfOocytesMI->CurrentValue != $this->SelfOocytesMI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SelfOocytesMII") && $CurrentForm->hasValue("o_SelfOocytesMII") && $this->SelfOocytesMII->CurrentValue != $this->SelfOocytesMII->OldValue)
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
				$this->TidNo->setSessionValue("");
				$this->RIDNo->setSessionValue("");
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
		$sqlwrk = "`DidNO`='" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "'";

		// Column "detail_ivf_embryology_chart"
		if ($this->DetailPages && $this->DetailPages["ivf_embryology_chart"] && $this->DetailPages["ivf_embryology_chart"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_ivf_embryology_chart"];
			$url = "ivf_embryology_chartpreview.php?t=ivf_oocytedenudation&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$label = $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_embryology_chart\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("ivf_embryology_chartlist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_oocytedenudation&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_embryology_chart", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
				$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_oocytedenudation')) {
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
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->Surgeon->CurrentValue = NULL;
		$this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
		$this->AsstSurgeon->CurrentValue = NULL;
		$this->AsstSurgeon->OldValue = $this->AsstSurgeon->CurrentValue;
		$this->Anaesthetist->CurrentValue = NULL;
		$this->Anaesthetist->OldValue = $this->Anaesthetist->CurrentValue;
		$this->AnaestheiaType->CurrentValue = NULL;
		$this->AnaestheiaType->OldValue = $this->AnaestheiaType->CurrentValue;
		$this->PrimaryEmbryologist->CurrentValue = NULL;
		$this->PrimaryEmbryologist->OldValue = $this->PrimaryEmbryologist->CurrentValue;
		$this->SecondaryEmbryologist->CurrentValue = NULL;
		$this->SecondaryEmbryologist->OldValue = $this->SecondaryEmbryologist->CurrentValue;
		$this->OPUNotes->CurrentValue = NULL;
		$this->OPUNotes->OldValue = $this->OPUNotes->CurrentValue;
		$this->NoOfFolliclesRight->CurrentValue = NULL;
		$this->NoOfFolliclesRight->OldValue = $this->NoOfFolliclesRight->CurrentValue;
		$this->NoOfFolliclesLeft->CurrentValue = NULL;
		$this->NoOfFolliclesLeft->OldValue = $this->NoOfFolliclesLeft->CurrentValue;
		$this->NoOfOocytes->CurrentValue = NULL;
		$this->NoOfOocytes->OldValue = $this->NoOfOocytes->CurrentValue;
		$this->RecordOocyteDenudation->CurrentValue = NULL;
		$this->RecordOocyteDenudation->OldValue = $this->RecordOocyteDenudation->CurrentValue;
		$this->DateOfDenudation->CurrentValue = NULL;
		$this->DateOfDenudation->OldValue = $this->DateOfDenudation->CurrentValue;
		$this->DenudationDoneBy->CurrentValue = NULL;
		$this->DenudationDoneBy->OldValue = $this->DenudationDoneBy->CurrentValue;
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
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->ExpFollicles->CurrentValue = NULL;
		$this->ExpFollicles->OldValue = $this->ExpFollicles->CurrentValue;
		$this->SecondaryDenudationDoneBy->CurrentValue = NULL;
		$this->SecondaryDenudationDoneBy->OldValue = $this->SecondaryDenudationDoneBy->CurrentValue;
		$this->patient2->CurrentValue = NULL;
		$this->patient2->OldValue = $this->patient2->CurrentValue;
		$this->OocytesDonate1->CurrentValue = NULL;
		$this->OocytesDonate1->OldValue = $this->OocytesDonate1->CurrentValue;
		$this->OocytesDonate2->CurrentValue = NULL;
		$this->OocytesDonate2->OldValue = $this->OocytesDonate2->CurrentValue;
		$this->ETDonate->CurrentValue = NULL;
		$this->ETDonate->OldValue = $this->ETDonate->CurrentValue;
		$this->OocyteOrgin->CurrentValue = NULL;
		$this->OocyteOrgin->OldValue = $this->OocyteOrgin->CurrentValue;
		$this->patient1->CurrentValue = NULL;
		$this->patient1->OldValue = $this->patient1->CurrentValue;
		$this->OocyteType->CurrentValue = NULL;
		$this->OocyteType->OldValue = $this->OocyteType->CurrentValue;
		$this->MIOocytesDonate1->CurrentValue = NULL;
		$this->MIOocytesDonate1->OldValue = $this->MIOocytesDonate1->CurrentValue;
		$this->MIOocytesDonate2->CurrentValue = NULL;
		$this->MIOocytesDonate2->OldValue = $this->MIOocytesDonate2->CurrentValue;
		$this->SelfMI->CurrentValue = NULL;
		$this->SelfMI->OldValue = $this->SelfMI->CurrentValue;
		$this->SelfMII->CurrentValue = NULL;
		$this->SelfMII->OldValue = $this->SelfMII->CurrentValue;
		$this->patient3->CurrentValue = NULL;
		$this->patient3->OldValue = $this->patient3->CurrentValue;
		$this->patient4->CurrentValue = NULL;
		$this->patient4->OldValue = $this->patient4->CurrentValue;
		$this->OocytesDonate3->CurrentValue = NULL;
		$this->OocytesDonate3->OldValue = $this->OocytesDonate3->CurrentValue;
		$this->OocytesDonate4->CurrentValue = NULL;
		$this->OocytesDonate4->OldValue = $this->OocytesDonate4->CurrentValue;
		$this->MIOocytesDonate3->CurrentValue = NULL;
		$this->MIOocytesDonate3->OldValue = $this->MIOocytesDonate3->CurrentValue;
		$this->MIOocytesDonate4->CurrentValue = NULL;
		$this->MIOocytesDonate4->OldValue = $this->MIOocytesDonate4->CurrentValue;
		$this->SelfOocytesMI->CurrentValue = NULL;
		$this->SelfOocytesMI->OldValue = $this->SelfOocytesMI->CurrentValue;
		$this->SelfOocytesMII->CurrentValue = NULL;
		$this->SelfOocytesMII->OldValue = $this->SelfOocytesMII->CurrentValue;
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
			if (IsApi() && $val === NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RIDNo"))
			$this->RIDNo->setOldValue($CurrentForm->getValue("o_RIDNo"));

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Name"))
			$this->Name->setOldValue($CurrentForm->getValue("o_Name"));

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_ResultDate"))
			$this->ResultDate->setOldValue($CurrentForm->getValue("o_ResultDate"));

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

		// Check field name 'AsstSurgeon' first before field var 'x_AsstSurgeon'
		$val = $CurrentForm->hasValue("AsstSurgeon") ? $CurrentForm->getValue("AsstSurgeon") : $CurrentForm->getValue("x_AsstSurgeon");
		if (!$this->AsstSurgeon->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AsstSurgeon->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AsstSurgeon"))
			$this->AsstSurgeon->setOldValue($CurrentForm->getValue("o_AsstSurgeon"));

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

		// Check field name 'AnaestheiaType' first before field var 'x_AnaestheiaType'
		$val = $CurrentForm->hasValue("AnaestheiaType") ? $CurrentForm->getValue("AnaestheiaType") : $CurrentForm->getValue("x_AnaestheiaType");
		if (!$this->AnaestheiaType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnaestheiaType->Visible = FALSE; // Disable update for API request
			else
				$this->AnaestheiaType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AnaestheiaType"))
			$this->AnaestheiaType->setOldValue($CurrentForm->getValue("o_AnaestheiaType"));

		// Check field name 'PrimaryEmbryologist' first before field var 'x_PrimaryEmbryologist'
		$val = $CurrentForm->hasValue("PrimaryEmbryologist") ? $CurrentForm->getValue("PrimaryEmbryologist") : $CurrentForm->getValue("x_PrimaryEmbryologist");
		if (!$this->PrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->PrimaryEmbryologist->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PrimaryEmbryologist"))
			$this->PrimaryEmbryologist->setOldValue($CurrentForm->getValue("o_PrimaryEmbryologist"));

		// Check field name 'SecondaryEmbryologist' first before field var 'x_SecondaryEmbryologist'
		$val = $CurrentForm->hasValue("SecondaryEmbryologist") ? $CurrentForm->getValue("SecondaryEmbryologist") : $CurrentForm->getValue("x_SecondaryEmbryologist");
		if (!$this->SecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryEmbryologist->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SecondaryEmbryologist"))
			$this->SecondaryEmbryologist->setOldValue($CurrentForm->getValue("o_SecondaryEmbryologist"));

		// Check field name 'NoOfFolliclesRight' first before field var 'x_NoOfFolliclesRight'
		$val = $CurrentForm->hasValue("NoOfFolliclesRight") ? $CurrentForm->getValue("NoOfFolliclesRight") : $CurrentForm->getValue("x_NoOfFolliclesRight");
		if (!$this->NoOfFolliclesRight->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfFolliclesRight->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfFolliclesRight->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoOfFolliclesRight"))
			$this->NoOfFolliclesRight->setOldValue($CurrentForm->getValue("o_NoOfFolliclesRight"));

		// Check field name 'NoOfFolliclesLeft' first before field var 'x_NoOfFolliclesLeft'
		$val = $CurrentForm->hasValue("NoOfFolliclesLeft") ? $CurrentForm->getValue("NoOfFolliclesLeft") : $CurrentForm->getValue("x_NoOfFolliclesLeft");
		if (!$this->NoOfFolliclesLeft->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfFolliclesLeft->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfFolliclesLeft->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoOfFolliclesLeft"))
			$this->NoOfFolliclesLeft->setOldValue($CurrentForm->getValue("o_NoOfFolliclesLeft"));

		// Check field name 'NoOfOocytes' first before field var 'x_NoOfOocytes'
		$val = $CurrentForm->hasValue("NoOfOocytes") ? $CurrentForm->getValue("NoOfOocytes") : $CurrentForm->getValue("x_NoOfOocytes");
		if (!$this->NoOfOocytes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfOocytes->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytes->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoOfOocytes"))
			$this->NoOfOocytes->setOldValue($CurrentForm->getValue("o_NoOfOocytes"));

		// Check field name 'RecordOocyteDenudation' first before field var 'x_RecordOocyteDenudation'
		$val = $CurrentForm->hasValue("RecordOocyteDenudation") ? $CurrentForm->getValue("RecordOocyteDenudation") : $CurrentForm->getValue("x_RecordOocyteDenudation");
		if (!$this->RecordOocyteDenudation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RecordOocyteDenudation->Visible = FALSE; // Disable update for API request
			else
				$this->RecordOocyteDenudation->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RecordOocyteDenudation"))
			$this->RecordOocyteDenudation->setOldValue($CurrentForm->getValue("o_RecordOocyteDenudation"));

		// Check field name 'DateOfDenudation' first before field var 'x_DateOfDenudation'
		$val = $CurrentForm->hasValue("DateOfDenudation") ? $CurrentForm->getValue("DateOfDenudation") : $CurrentForm->getValue("x_DateOfDenudation");
		if (!$this->DateOfDenudation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateOfDenudation->Visible = FALSE; // Disable update for API request
			else
				$this->DateOfDenudation->setFormValue($val);
			$this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11);
		}
		if ($CurrentForm->hasValue("o_DateOfDenudation"))
			$this->DateOfDenudation->setOldValue($CurrentForm->getValue("o_DateOfDenudation"));

		// Check field name 'DenudationDoneBy' first before field var 'x_DenudationDoneBy'
		$val = $CurrentForm->hasValue("DenudationDoneBy") ? $CurrentForm->getValue("DenudationDoneBy") : $CurrentForm->getValue("x_DenudationDoneBy");
		if (!$this->DenudationDoneBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DenudationDoneBy->Visible = FALSE; // Disable update for API request
			else
				$this->DenudationDoneBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DenudationDoneBy"))
			$this->DenudationDoneBy->setOldValue($CurrentForm->getValue("o_DenudationDoneBy"));

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

		// Check field name 'ExpFollicles' first before field var 'x_ExpFollicles'
		$val = $CurrentForm->hasValue("ExpFollicles") ? $CurrentForm->getValue("ExpFollicles") : $CurrentForm->getValue("x_ExpFollicles");
		if (!$this->ExpFollicles->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ExpFollicles->Visible = FALSE; // Disable update for API request
			else
				$this->ExpFollicles->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ExpFollicles"))
			$this->ExpFollicles->setOldValue($CurrentForm->getValue("o_ExpFollicles"));

		// Check field name 'SecondaryDenudationDoneBy' first before field var 'x_SecondaryDenudationDoneBy'
		$val = $CurrentForm->hasValue("SecondaryDenudationDoneBy") ? $CurrentForm->getValue("SecondaryDenudationDoneBy") : $CurrentForm->getValue("x_SecondaryDenudationDoneBy");
		if (!$this->SecondaryDenudationDoneBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SecondaryDenudationDoneBy->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryDenudationDoneBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SecondaryDenudationDoneBy"))
			$this->SecondaryDenudationDoneBy->setOldValue($CurrentForm->getValue("o_SecondaryDenudationDoneBy"));

		// Check field name 'OocyteOrgin' first before field var 'x_OocyteOrgin'
		$val = $CurrentForm->hasValue("OocyteOrgin") ? $CurrentForm->getValue("OocyteOrgin") : $CurrentForm->getValue("x_OocyteOrgin");
		if (!$this->OocyteOrgin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OocyteOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->OocyteOrgin->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OocyteOrgin"))
			$this->OocyteOrgin->setOldValue($CurrentForm->getValue("o_OocyteOrgin"));

		// Check field name 'patient1' first before field var 'x_patient1'
		$val = $CurrentForm->hasValue("patient1") ? $CurrentForm->getValue("patient1") : $CurrentForm->getValue("x_patient1");
		if (!$this->patient1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient1->Visible = FALSE; // Disable update for API request
			else
				$this->patient1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_patient1"))
			$this->patient1->setOldValue($CurrentForm->getValue("o_patient1"));

		// Check field name 'OocyteType' first before field var 'x_OocyteType'
		$val = $CurrentForm->hasValue("OocyteType") ? $CurrentForm->getValue("OocyteType") : $CurrentForm->getValue("x_OocyteType");
		if (!$this->OocyteType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OocyteType->Visible = FALSE; // Disable update for API request
			else
				$this->OocyteType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OocyteType"))
			$this->OocyteType->setOldValue($CurrentForm->getValue("o_OocyteType"));

		// Check field name 'MIOocytesDonate1' first before field var 'x_MIOocytesDonate1'
		$val = $CurrentForm->hasValue("MIOocytesDonate1") ? $CurrentForm->getValue("MIOocytesDonate1") : $CurrentForm->getValue("x_MIOocytesDonate1");
		if (!$this->MIOocytesDonate1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MIOocytesDonate1->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MIOocytesDonate1"))
			$this->MIOocytesDonate1->setOldValue($CurrentForm->getValue("o_MIOocytesDonate1"));

		// Check field name 'MIOocytesDonate2' first before field var 'x_MIOocytesDonate2'
		$val = $CurrentForm->hasValue("MIOocytesDonate2") ? $CurrentForm->getValue("MIOocytesDonate2") : $CurrentForm->getValue("x_MIOocytesDonate2");
		if (!$this->MIOocytesDonate2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MIOocytesDonate2->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MIOocytesDonate2"))
			$this->MIOocytesDonate2->setOldValue($CurrentForm->getValue("o_MIOocytesDonate2"));

		// Check field name 'SelfMI' first before field var 'x_SelfMI'
		$val = $CurrentForm->hasValue("SelfMI") ? $CurrentForm->getValue("SelfMI") : $CurrentForm->getValue("x_SelfMI");
		if (!$this->SelfMI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SelfMI->Visible = FALSE; // Disable update for API request
			else
				$this->SelfMI->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SelfMI"))
			$this->SelfMI->setOldValue($CurrentForm->getValue("o_SelfMI"));

		// Check field name 'SelfMII' first before field var 'x_SelfMII'
		$val = $CurrentForm->hasValue("SelfMII") ? $CurrentForm->getValue("SelfMII") : $CurrentForm->getValue("x_SelfMII");
		if (!$this->SelfMII->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SelfMII->Visible = FALSE; // Disable update for API request
			else
				$this->SelfMII->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SelfMII"))
			$this->SelfMII->setOldValue($CurrentForm->getValue("o_SelfMII"));

		// Check field name 'patient3' first before field var 'x_patient3'
		$val = $CurrentForm->hasValue("patient3") ? $CurrentForm->getValue("patient3") : $CurrentForm->getValue("x_patient3");
		if (!$this->patient3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient3->Visible = FALSE; // Disable update for API request
			else
				$this->patient3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_patient3"))
			$this->patient3->setOldValue($CurrentForm->getValue("o_patient3"));

		// Check field name 'patient4' first before field var 'x_patient4'
		$val = $CurrentForm->hasValue("patient4") ? $CurrentForm->getValue("patient4") : $CurrentForm->getValue("x_patient4");
		if (!$this->patient4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient4->Visible = FALSE; // Disable update for API request
			else
				$this->patient4->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_patient4"))
			$this->patient4->setOldValue($CurrentForm->getValue("o_patient4"));

		// Check field name 'OocytesDonate3' first before field var 'x_OocytesDonate3'
		$val = $CurrentForm->hasValue("OocytesDonate3") ? $CurrentForm->getValue("OocytesDonate3") : $CurrentForm->getValue("x_OocytesDonate3");
		if (!$this->OocytesDonate3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OocytesDonate3->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OocytesDonate3"))
			$this->OocytesDonate3->setOldValue($CurrentForm->getValue("o_OocytesDonate3"));

		// Check field name 'OocytesDonate4' first before field var 'x_OocytesDonate4'
		$val = $CurrentForm->hasValue("OocytesDonate4") ? $CurrentForm->getValue("OocytesDonate4") : $CurrentForm->getValue("x_OocytesDonate4");
		if (!$this->OocytesDonate4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OocytesDonate4->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate4->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OocytesDonate4"))
			$this->OocytesDonate4->setOldValue($CurrentForm->getValue("o_OocytesDonate4"));

		// Check field name 'MIOocytesDonate3' first before field var 'x_MIOocytesDonate3'
		$val = $CurrentForm->hasValue("MIOocytesDonate3") ? $CurrentForm->getValue("MIOocytesDonate3") : $CurrentForm->getValue("x_MIOocytesDonate3");
		if (!$this->MIOocytesDonate3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MIOocytesDonate3->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate3->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MIOocytesDonate3"))
			$this->MIOocytesDonate3->setOldValue($CurrentForm->getValue("o_MIOocytesDonate3"));

		// Check field name 'MIOocytesDonate4' first before field var 'x_MIOocytesDonate4'
		$val = $CurrentForm->hasValue("MIOocytesDonate4") ? $CurrentForm->getValue("MIOocytesDonate4") : $CurrentForm->getValue("x_MIOocytesDonate4");
		if (!$this->MIOocytesDonate4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MIOocytesDonate4->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate4->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_MIOocytesDonate4"))
			$this->MIOocytesDonate4->setOldValue($CurrentForm->getValue("o_MIOocytesDonate4"));

		// Check field name 'SelfOocytesMI' first before field var 'x_SelfOocytesMI'
		$val = $CurrentForm->hasValue("SelfOocytesMI") ? $CurrentForm->getValue("SelfOocytesMI") : $CurrentForm->getValue("x_SelfOocytesMI");
		if (!$this->SelfOocytesMI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SelfOocytesMI->Visible = FALSE; // Disable update for API request
			else
				$this->SelfOocytesMI->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SelfOocytesMI"))
			$this->SelfOocytesMI->setOldValue($CurrentForm->getValue("o_SelfOocytesMI"));

		// Check field name 'SelfOocytesMII' first before field var 'x_SelfOocytesMII'
		$val = $CurrentForm->hasValue("SelfOocytesMII") ? $CurrentForm->getValue("SelfOocytesMII") : $CurrentForm->getValue("x_SelfOocytesMII");
		if (!$this->SelfOocytesMII->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SelfOocytesMII->Visible = FALSE; // Disable update for API request
			else
				$this->SelfOocytesMII->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SelfOocytesMII"))
			$this->SelfOocytesMII->setOldValue($CurrentForm->getValue("o_SelfOocytesMII"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 11);
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->AsstSurgeon->CurrentValue = $this->AsstSurgeon->FormValue;
		$this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
		$this->AnaestheiaType->CurrentValue = $this->AnaestheiaType->FormValue;
		$this->PrimaryEmbryologist->CurrentValue = $this->PrimaryEmbryologist->FormValue;
		$this->SecondaryEmbryologist->CurrentValue = $this->SecondaryEmbryologist->FormValue;
		$this->NoOfFolliclesRight->CurrentValue = $this->NoOfFolliclesRight->FormValue;
		$this->NoOfFolliclesLeft->CurrentValue = $this->NoOfFolliclesLeft->FormValue;
		$this->NoOfOocytes->CurrentValue = $this->NoOfOocytes->FormValue;
		$this->RecordOocyteDenudation->CurrentValue = $this->RecordOocyteDenudation->FormValue;
		$this->DateOfDenudation->CurrentValue = $this->DateOfDenudation->FormValue;
		$this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11);
		$this->DenudationDoneBy->CurrentValue = $this->DenudationDoneBy->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->ExpFollicles->CurrentValue = $this->ExpFollicles->FormValue;
		$this->SecondaryDenudationDoneBy->CurrentValue = $this->SecondaryDenudationDoneBy->FormValue;
		$this->OocyteOrgin->CurrentValue = $this->OocyteOrgin->FormValue;
		$this->patient1->CurrentValue = $this->patient1->FormValue;
		$this->OocyteType->CurrentValue = $this->OocyteType->FormValue;
		$this->MIOocytesDonate1->CurrentValue = $this->MIOocytesDonate1->FormValue;
		$this->MIOocytesDonate2->CurrentValue = $this->MIOocytesDonate2->FormValue;
		$this->SelfMI->CurrentValue = $this->SelfMI->FormValue;
		$this->SelfMII->CurrentValue = $this->SelfMII->FormValue;
		$this->patient3->CurrentValue = $this->patient3->FormValue;
		$this->patient4->CurrentValue = $this->patient4->FormValue;
		$this->OocytesDonate3->CurrentValue = $this->OocytesDonate3->FormValue;
		$this->OocytesDonate4->CurrentValue = $this->OocytesDonate4->FormValue;
		$this->MIOocytesDonate3->CurrentValue = $this->MIOocytesDonate3->FormValue;
		$this->MIOocytesDonate4->CurrentValue = $this->MIOocytesDonate4->FormValue;
		$this->SelfOocytesMI->CurrentValue = $this->SelfOocytesMI->FormValue;
		$this->SelfOocytesMII->CurrentValue = $this->SelfOocytesMII->FormValue;
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->OPUNotes->setDbValue($row['OPUNotes']);
		$this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
		$this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
		$this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
		$this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
		$this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
		$this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->ExpFollicles->setDbValue($row['ExpFollicles']);
		$this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
		$this->patient2->setDbValue($row['patient2']);
		$this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
		$this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
		$this->ETDonate->setDbValue($row['ETDonate']);
		$this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
		$this->patient1->setDbValue($row['patient1']);
		$this->OocyteType->setDbValue($row['OocyteType']);
		$this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
		$this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
		$this->SelfMI->setDbValue($row['SelfMI']);
		$this->SelfMII->setDbValue($row['SelfMII']);
		$this->patient3->setDbValue($row['patient3']);
		$this->patient4->setDbValue($row['patient4']);
		$this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
		$this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
		$this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
		$this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
		$this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
		$this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['Surgeon'] = $this->Surgeon->CurrentValue;
		$row['AsstSurgeon'] = $this->AsstSurgeon->CurrentValue;
		$row['Anaesthetist'] = $this->Anaesthetist->CurrentValue;
		$row['AnaestheiaType'] = $this->AnaestheiaType->CurrentValue;
		$row['PrimaryEmbryologist'] = $this->PrimaryEmbryologist->CurrentValue;
		$row['SecondaryEmbryologist'] = $this->SecondaryEmbryologist->CurrentValue;
		$row['OPUNotes'] = $this->OPUNotes->CurrentValue;
		$row['NoOfFolliclesRight'] = $this->NoOfFolliclesRight->CurrentValue;
		$row['NoOfFolliclesLeft'] = $this->NoOfFolliclesLeft->CurrentValue;
		$row['NoOfOocytes'] = $this->NoOfOocytes->CurrentValue;
		$row['RecordOocyteDenudation'] = $this->RecordOocyteDenudation->CurrentValue;
		$row['DateOfDenudation'] = $this->DateOfDenudation->CurrentValue;
		$row['DenudationDoneBy'] = $this->DenudationDoneBy->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['ExpFollicles'] = $this->ExpFollicles->CurrentValue;
		$row['SecondaryDenudationDoneBy'] = $this->SecondaryDenudationDoneBy->CurrentValue;
		$row['patient2'] = $this->patient2->CurrentValue;
		$row['OocytesDonate1'] = $this->OocytesDonate1->CurrentValue;
		$row['OocytesDonate2'] = $this->OocytesDonate2->CurrentValue;
		$row['ETDonate'] = $this->ETDonate->CurrentValue;
		$row['OocyteOrgin'] = $this->OocyteOrgin->CurrentValue;
		$row['patient1'] = $this->patient1->CurrentValue;
		$row['OocyteType'] = $this->OocyteType->CurrentValue;
		$row['MIOocytesDonate1'] = $this->MIOocytesDonate1->CurrentValue;
		$row['MIOocytesDonate2'] = $this->MIOocytesDonate2->CurrentValue;
		$row['SelfMI'] = $this->SelfMI->CurrentValue;
		$row['SelfMII'] = $this->SelfMII->CurrentValue;
		$row['patient3'] = $this->patient3->CurrentValue;
		$row['patient4'] = $this->patient4->CurrentValue;
		$row['OocytesDonate3'] = $this->OocytesDonate3->CurrentValue;
		$row['OocytesDonate4'] = $this->OocytesDonate4->CurrentValue;
		$row['MIOocytesDonate3'] = $this->MIOocytesDonate3->CurrentValue;
		$row['MIOocytesDonate4'] = $this->MIOocytesDonate4->CurrentValue;
		$row['SelfOocytesMI'] = $this->SelfOocytesMI->CurrentValue;
		$row['SelfOocytesMII'] = $this->SelfOocytesMII->CurrentValue;
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
		// RIDNo
		// Name
		// ResultDate
		// Surgeon
		// AsstSurgeon
		// Anaesthetist
		// AnaestheiaType
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// OPUNotes
		// NoOfFolliclesRight
		// NoOfFolliclesLeft
		// NoOfOocytes
		// RecordOocyteDenudation
		// DateOfDenudation
		// DenudationDoneBy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TidNo
		// ExpFollicles
		// SecondaryDenudationDoneBy
		// patient2
		// OocytesDonate1
		// OocytesDonate2
		// ETDonate
		// OocyteOrgin
		// patient1
		// OocyteType
		// MIOocytesDonate1
		// MIOocytesDonate2
		// SelfMI
		// SelfMII
		// patient3
		// patient4
		// OocytesDonate3
		// OocytesDonate4
		// MIOocytesDonate3
		// MIOocytesDonate4
		// SelfOocytesMI
		// SelfOocytesMII

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

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 11);
			$this->ResultDate->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$this->Surgeon->ViewCustomAttributes = "";

			// AsstSurgeon
			$this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
			$this->AsstSurgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AnaestheiaType
			$this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
			$this->AnaestheiaType->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
			$this->NoOfFolliclesRight->ViewCustomAttributes = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
			$this->NoOfFolliclesLeft->ViewCustomAttributes = "";

			// NoOfOocytes
			$this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
			$this->NoOfOocytes->ViewCustomAttributes = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
			$this->RecordOocyteDenudation->ViewCustomAttributes = "";

			// DateOfDenudation
			$this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
			$this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 11);
			$this->DateOfDenudation->ViewCustomAttributes = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
			$this->DenudationDoneBy->ViewCustomAttributes = "";

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

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// ExpFollicles
			$this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
			$this->ExpFollicles->ViewCustomAttributes = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
			$this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

			// OocyteOrgin
			if (strval($this->OocyteOrgin->CurrentValue) != "") {
				$this->OocyteOrgin->ViewValue = $this->OocyteOrgin->optionCaption($this->OocyteOrgin->CurrentValue);
			} else {
				$this->OocyteOrgin->ViewValue = NULL;
			}
			$this->OocyteOrgin->ViewCustomAttributes = "";

			// patient1
			$curVal = strval($this->patient1->CurrentValue);
			if ($curVal != "") {
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
				if ($this->patient1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient1->ViewValue = $this->patient1->CurrentValue;
					}
				}
			} else {
				$this->patient1->ViewValue = NULL;
			}
			$this->patient1->ViewCustomAttributes = "";

			// OocyteType
			if (strval($this->OocyteType->CurrentValue) != "") {
				$this->OocyteType->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OocyteType->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OocyteType->ViewValue->add($this->OocyteType->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OocyteType->ViewValue = NULL;
			}
			$this->OocyteType->ViewCustomAttributes = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
			$this->MIOocytesDonate1->ViewCustomAttributes = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
			$this->MIOocytesDonate2->ViewCustomAttributes = "";

			// SelfMI
			$this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
			$this->SelfMI->ViewCustomAttributes = "";

			// SelfMII
			$this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
			$this->SelfMII->ViewCustomAttributes = "";

			// patient3
			$curVal = strval($this->patient3->CurrentValue);
			if ($curVal != "") {
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
				if ($this->patient3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient3->ViewValue = $this->patient3->CurrentValue;
					}
				}
			} else {
				$this->patient3->ViewValue = NULL;
			}
			$this->patient3->ViewCustomAttributes = "";

			// patient4
			$curVal = strval($this->patient4->CurrentValue);
			if ($curVal != "") {
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
				if ($this->patient4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient4->ViewValue = $this->patient4->CurrentValue;
					}
				}
			} else {
				$this->patient4->ViewValue = NULL;
			}
			$this->patient4->ViewCustomAttributes = "";

			// OocytesDonate3
			$this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
			$this->OocytesDonate3->ViewCustomAttributes = "";

			// OocytesDonate4
			$this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
			$this->OocytesDonate4->ViewCustomAttributes = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
			$this->MIOocytesDonate3->ViewCustomAttributes = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
			$this->MIOocytesDonate4->ViewCustomAttributes = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
			$this->SelfOocytesMI->ViewCustomAttributes = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
			$this->SelfOocytesMII->ViewCustomAttributes = "";

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";
			$this->AsstSurgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";
			$this->AnaestheiaType->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";
			$this->NoOfFolliclesRight->TooltipValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";
			$this->NoOfFolliclesLeft->TooltipValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";
			$this->NoOfOocytes->TooltipValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";
			$this->RecordOocyteDenudation->TooltipValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";
			$this->DateOfDenudation->TooltipValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";
			$this->DenudationDoneBy->TooltipValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";
			$this->ExpFollicles->TooltipValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";
			$this->SecondaryDenudationDoneBy->TooltipValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";
			$this->OocyteOrgin->TooltipValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";
			$this->patient1->TooltipValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";
			$this->OocyteType->TooltipValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";
			$this->MIOocytesDonate1->TooltipValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";
			$this->MIOocytesDonate2->TooltipValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";
			$this->SelfMI->TooltipValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";
			$this->SelfMII->TooltipValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";
			$this->patient3->TooltipValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";
			$this->patient4->TooltipValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";
			$this->OocytesDonate3->TooltipValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";
			$this->OocytesDonate4->TooltipValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";
			$this->MIOocytesDonate3->TooltipValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";
			$this->MIOocytesDonate4->TooltipValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";
			$this->SelfOocytesMI->TooltipValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
			$this->SelfOocytesMII->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// RIDNo

			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() != "") {
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
			if ($this->Name->getSessionValue() != "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
				$this->Name->ViewValue = $this->Name->CurrentValue;
				$this->Name->ViewCustomAttributes = "";
			} else {
				if (!$this->Name->Raw)
					$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
				$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
				$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 11));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			if (!$this->Surgeon->Raw)
				$this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
			$this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
			$this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

			// AsstSurgeon
			$this->AsstSurgeon->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon->EditCustomAttributes = "";
			if (!$this->AsstSurgeon->Raw)
				$this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->EditValue = HtmlEncode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			if (!$this->Anaesthetist->Raw)
				$this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

			// AnaestheiaType
			$this->AnaestheiaType->EditAttrs["class"] = "form-control";
			$this->AnaestheiaType->EditCustomAttributes = "";
			if (!$this->AnaestheiaType->Raw)
				$this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->EditValue = HtmlEncode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->PrimaryEmbryologist->EditCustomAttributes = "";
			if (!$this->PrimaryEmbryologist->Raw)
				$this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->EditValue = HtmlEncode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->SecondaryEmbryologist->EditCustomAttributes = "";
			if (!$this->SecondaryEmbryologist->Raw)
				$this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->EditValue = HtmlEncode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesRight->EditCustomAttributes = "";
			if (!$this->NoOfFolliclesRight->Raw)
				$this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->EditValue = HtmlEncode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesLeft->EditCustomAttributes = "";
			if (!$this->NoOfFolliclesLeft->Raw)
				$this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->EditValue = HtmlEncode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

			// NoOfOocytes
			$this->NoOfOocytes->EditAttrs["class"] = "form-control";
			$this->NoOfOocytes->EditCustomAttributes = "";
			if (!$this->NoOfOocytes->Raw)
				$this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->EditValue = HtmlEncode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
			$this->RecordOocyteDenudation->EditCustomAttributes = "";
			if (!$this->RecordOocyteDenudation->Raw)
				$this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->EditValue = HtmlEncode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

			// DateOfDenudation
			$this->DateOfDenudation->EditAttrs["class"] = "form-control";
			$this->DateOfDenudation->EditCustomAttributes = "";
			$this->DateOfDenudation->EditValue = HtmlEncode(FormatDateTime($this->DateOfDenudation->CurrentValue, 11));
			$this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

			// DenudationDoneBy
			$this->DenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->DenudationDoneBy->EditCustomAttributes = "";
			if (!$this->DenudationDoneBy->Raw)
				$this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->EditValue = HtmlEncode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// TidNo

			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() != "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
				$this->TidNo->ViewCustomAttributes = "";
			} else {
				$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
				$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// ExpFollicles
			$this->ExpFollicles->EditAttrs["class"] = "form-control";
			$this->ExpFollicles->EditCustomAttributes = "";
			if (!$this->ExpFollicles->Raw)
				$this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->EditValue = HtmlEncode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
			if (!$this->SecondaryDenudationDoneBy->Raw)
				$this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->EditValue = HtmlEncode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

			// OocyteOrgin
			$this->OocyteOrgin->EditAttrs["class"] = "form-control";
			$this->OocyteOrgin->EditCustomAttributes = "";
			$this->OocyteOrgin->EditValue = $this->OocyteOrgin->options(TRUE);

			// patient1
			$this->patient1->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient1->CurrentValue));
			if ($curVal != "")
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
			else
				$this->patient1->ViewValue = $this->patient1->Lookup !== NULL && is_array($this->patient1->Lookup->Options) ? $curVal : NULL;
			if ($this->patient1->ViewValue !== NULL) { // Load from cache
				$this->patient1->EditValue = array_values($this->patient1->Lookup->Options);
				if ($this->patient1->ViewValue == "")
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
				} else {
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient1->EditValue = $arwrk;
			}

			// OocyteType
			$this->OocyteType->EditCustomAttributes = "";
			$this->OocyteType->EditValue = $this->OocyteType->options(FALSE);

			// MIOocytesDonate1
			$this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate1->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate1->Raw)
				$this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->EditValue = HtmlEncode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

			// MIOocytesDonate2
			$this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate2->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate2->Raw)
				$this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->EditValue = HtmlEncode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

			// SelfMI
			$this->SelfMI->EditAttrs["class"] = "form-control";
			$this->SelfMI->EditCustomAttributes = "";
			if (!$this->SelfMI->Raw)
				$this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
			$this->SelfMI->EditValue = HtmlEncode($this->SelfMI->CurrentValue);
			$this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

			// SelfMII
			$this->SelfMII->EditAttrs["class"] = "form-control";
			$this->SelfMII->EditCustomAttributes = "";
			if (!$this->SelfMII->Raw)
				$this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
			$this->SelfMII->EditValue = HtmlEncode($this->SelfMII->CurrentValue);
			$this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

			// patient3
			$this->patient3->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient3->CurrentValue));
			if ($curVal != "")
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
			else
				$this->patient3->ViewValue = $this->patient3->Lookup !== NULL && is_array($this->patient3->Lookup->Options) ? $curVal : NULL;
			if ($this->patient3->ViewValue !== NULL) { // Load from cache
				$this->patient3->EditValue = array_values($this->patient3->Lookup->Options);
				if ($this->patient3->ViewValue == "")
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
				} else {
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient3->EditValue = $arwrk;
			}

			// patient4
			$this->patient4->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient4->CurrentValue));
			if ($curVal != "")
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
			else
				$this->patient4->ViewValue = $this->patient4->Lookup !== NULL && is_array($this->patient4->Lookup->Options) ? $curVal : NULL;
			if ($this->patient4->ViewValue !== NULL) { // Load from cache
				$this->patient4->EditValue = array_values($this->patient4->Lookup->Options);
				if ($this->patient4->ViewValue == "")
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
				} else {
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient4->EditValue = $arwrk;
			}

			// OocytesDonate3
			$this->OocytesDonate3->EditAttrs["class"] = "form-control";
			$this->OocytesDonate3->EditCustomAttributes = "";
			if (!$this->OocytesDonate3->Raw)
				$this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->EditValue = HtmlEncode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

			// OocytesDonate4
			$this->OocytesDonate4->EditAttrs["class"] = "form-control";
			$this->OocytesDonate4->EditCustomAttributes = "";
			if (!$this->OocytesDonate4->Raw)
				$this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->EditValue = HtmlEncode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

			// MIOocytesDonate3
			$this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate3->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate3->Raw)
				$this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->EditValue = HtmlEncode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

			// MIOocytesDonate4
			$this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate4->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate4->Raw)
				$this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->EditValue = HtmlEncode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

			// SelfOocytesMI
			$this->SelfOocytesMI->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMI->EditCustomAttributes = "";
			if (!$this->SelfOocytesMI->Raw)
				$this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->EditValue = HtmlEncode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

			// SelfOocytesMII
			$this->SelfOocytesMII->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMII->EditCustomAttributes = "";
			if (!$this->SelfOocytesMII->Raw)
				$this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->EditValue = HtmlEncode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() != "") {
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
			if ($this->Name->getSessionValue() != "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
				$this->Name->ViewValue = $this->Name->CurrentValue;
				$this->Name->ViewCustomAttributes = "";
			} else {
				if (!$this->Name->Raw)
					$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
				$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
				$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 11));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			if (!$this->Surgeon->Raw)
				$this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
			$this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
			$this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

			// AsstSurgeon
			$this->AsstSurgeon->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon->EditCustomAttributes = "";
			if (!$this->AsstSurgeon->Raw)
				$this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->EditValue = HtmlEncode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			if (!$this->Anaesthetist->Raw)
				$this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

			// AnaestheiaType
			$this->AnaestheiaType->EditAttrs["class"] = "form-control";
			$this->AnaestheiaType->EditCustomAttributes = "";
			if (!$this->AnaestheiaType->Raw)
				$this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->EditValue = HtmlEncode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->PrimaryEmbryologist->EditCustomAttributes = "";
			if (!$this->PrimaryEmbryologist->Raw)
				$this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->EditValue = HtmlEncode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->SecondaryEmbryologist->EditCustomAttributes = "";
			if (!$this->SecondaryEmbryologist->Raw)
				$this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->EditValue = HtmlEncode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesRight->EditCustomAttributes = "";
			if (!$this->NoOfFolliclesRight->Raw)
				$this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->EditValue = HtmlEncode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesLeft->EditCustomAttributes = "";
			if (!$this->NoOfFolliclesLeft->Raw)
				$this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->EditValue = HtmlEncode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

			// NoOfOocytes
			$this->NoOfOocytes->EditAttrs["class"] = "form-control";
			$this->NoOfOocytes->EditCustomAttributes = "";
			if (!$this->NoOfOocytes->Raw)
				$this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->EditValue = HtmlEncode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
			$this->RecordOocyteDenudation->EditCustomAttributes = "";
			if (!$this->RecordOocyteDenudation->Raw)
				$this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->EditValue = HtmlEncode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

			// DateOfDenudation
			$this->DateOfDenudation->EditAttrs["class"] = "form-control";
			$this->DateOfDenudation->EditCustomAttributes = "";
			$this->DateOfDenudation->EditValue = HtmlEncode(FormatDateTime($this->DateOfDenudation->CurrentValue, 11));
			$this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

			// DenudationDoneBy
			$this->DenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->DenudationDoneBy->EditCustomAttributes = "";
			if (!$this->DenudationDoneBy->Raw)
				$this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->EditValue = HtmlEncode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// TidNo

			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() != "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
				$this->TidNo->ViewCustomAttributes = "";
			} else {
				$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
				$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// ExpFollicles
			$this->ExpFollicles->EditAttrs["class"] = "form-control";
			$this->ExpFollicles->EditCustomAttributes = "";
			if (!$this->ExpFollicles->Raw)
				$this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->EditValue = HtmlEncode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
			if (!$this->SecondaryDenudationDoneBy->Raw)
				$this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->EditValue = HtmlEncode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

			// OocyteOrgin
			$this->OocyteOrgin->EditAttrs["class"] = "form-control";
			$this->OocyteOrgin->EditCustomAttributes = "";
			$this->OocyteOrgin->EditValue = $this->OocyteOrgin->options(TRUE);

			// patient1
			$this->patient1->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient1->CurrentValue));
			if ($curVal != "")
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
			else
				$this->patient1->ViewValue = $this->patient1->Lookup !== NULL && is_array($this->patient1->Lookup->Options) ? $curVal : NULL;
			if ($this->patient1->ViewValue !== NULL) { // Load from cache
				$this->patient1->EditValue = array_values($this->patient1->Lookup->Options);
				if ($this->patient1->ViewValue == "")
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
				} else {
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient1->EditValue = $arwrk;
			}

			// OocyteType
			$this->OocyteType->EditCustomAttributes = "";
			$this->OocyteType->EditValue = $this->OocyteType->options(FALSE);

			// MIOocytesDonate1
			$this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate1->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate1->Raw)
				$this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->EditValue = HtmlEncode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

			// MIOocytesDonate2
			$this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate2->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate2->Raw)
				$this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->EditValue = HtmlEncode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

			// SelfMI
			$this->SelfMI->EditAttrs["class"] = "form-control";
			$this->SelfMI->EditCustomAttributes = "";
			if (!$this->SelfMI->Raw)
				$this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
			$this->SelfMI->EditValue = HtmlEncode($this->SelfMI->CurrentValue);
			$this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

			// SelfMII
			$this->SelfMII->EditAttrs["class"] = "form-control";
			$this->SelfMII->EditCustomAttributes = "";
			if (!$this->SelfMII->Raw)
				$this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
			$this->SelfMII->EditValue = HtmlEncode($this->SelfMII->CurrentValue);
			$this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

			// patient3
			$this->patient3->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient3->CurrentValue));
			if ($curVal != "")
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
			else
				$this->patient3->ViewValue = $this->patient3->Lookup !== NULL && is_array($this->patient3->Lookup->Options) ? $curVal : NULL;
			if ($this->patient3->ViewValue !== NULL) { // Load from cache
				$this->patient3->EditValue = array_values($this->patient3->Lookup->Options);
				if ($this->patient3->ViewValue == "")
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
				} else {
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient3->EditValue = $arwrk;
			}

			// patient4
			$this->patient4->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient4->CurrentValue));
			if ($curVal != "")
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
			else
				$this->patient4->ViewValue = $this->patient4->Lookup !== NULL && is_array($this->patient4->Lookup->Options) ? $curVal : NULL;
			if ($this->patient4->ViewValue !== NULL) { // Load from cache
				$this->patient4->EditValue = array_values($this->patient4->Lookup->Options);
				if ($this->patient4->ViewValue == "")
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
				} else {
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient4->EditValue = $arwrk;
			}

			// OocytesDonate3
			$this->OocytesDonate3->EditAttrs["class"] = "form-control";
			$this->OocytesDonate3->EditCustomAttributes = "";
			if (!$this->OocytesDonate3->Raw)
				$this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->EditValue = HtmlEncode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

			// OocytesDonate4
			$this->OocytesDonate4->EditAttrs["class"] = "form-control";
			$this->OocytesDonate4->EditCustomAttributes = "";
			if (!$this->OocytesDonate4->Raw)
				$this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->EditValue = HtmlEncode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

			// MIOocytesDonate3
			$this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate3->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate3->Raw)
				$this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->EditValue = HtmlEncode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

			// MIOocytesDonate4
			$this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate4->EditCustomAttributes = "";
			if (!$this->MIOocytesDonate4->Raw)
				$this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->EditValue = HtmlEncode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

			// SelfOocytesMI
			$this->SelfOocytesMI->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMI->EditCustomAttributes = "";
			if (!$this->SelfOocytesMI->Raw)
				$this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->EditValue = HtmlEncode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

			// SelfOocytesMII
			$this->SelfOocytesMII->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMII->EditCustomAttributes = "";
			if (!$this->SelfOocytesMII->Raw)
				$this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->EditValue = HtmlEncode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
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
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon->Required) {
			if (!$this->AsstSurgeon->IsDetailKey && $this->AsstSurgeon->FormValue != NULL && $this->AsstSurgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon->caption(), $this->AsstSurgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anaesthetist->Required) {
			if (!$this->Anaesthetist->IsDetailKey && $this->Anaesthetist->FormValue != NULL && $this->Anaesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
			}
		}
		if ($this->AnaestheiaType->Required) {
			if (!$this->AnaestheiaType->IsDetailKey && $this->AnaestheiaType->FormValue != NULL && $this->AnaestheiaType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaestheiaType->caption(), $this->AnaestheiaType->RequiredErrorMessage));
			}
		}
		if ($this->PrimaryEmbryologist->Required) {
			if (!$this->PrimaryEmbryologist->IsDetailKey && $this->PrimaryEmbryologist->FormValue != NULL && $this->PrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrimaryEmbryologist->caption(), $this->PrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryEmbryologist->Required) {
			if (!$this->SecondaryEmbryologist->IsDetailKey && $this->SecondaryEmbryologist->FormValue != NULL && $this->SecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryEmbryologist->caption(), $this->SecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->NoOfFolliclesRight->Required) {
			if (!$this->NoOfFolliclesRight->IsDetailKey && $this->NoOfFolliclesRight->FormValue != NULL && $this->NoOfFolliclesRight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfFolliclesRight->caption(), $this->NoOfFolliclesRight->RequiredErrorMessage));
			}
		}
		if ($this->NoOfFolliclesLeft->Required) {
			if (!$this->NoOfFolliclesLeft->IsDetailKey && $this->NoOfFolliclesLeft->FormValue != NULL && $this->NoOfFolliclesLeft->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfFolliclesLeft->caption(), $this->NoOfFolliclesLeft->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytes->Required) {
			if (!$this->NoOfOocytes->IsDetailKey && $this->NoOfOocytes->FormValue != NULL && $this->NoOfOocytes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytes->caption(), $this->NoOfOocytes->RequiredErrorMessage));
			}
		}
		if ($this->RecordOocyteDenudation->Required) {
			if (!$this->RecordOocyteDenudation->IsDetailKey && $this->RecordOocyteDenudation->FormValue != NULL && $this->RecordOocyteDenudation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecordOocyteDenudation->caption(), $this->RecordOocyteDenudation->RequiredErrorMessage));
			}
		}
		if ($this->DateOfDenudation->Required) {
			if (!$this->DateOfDenudation->IsDetailKey && $this->DateOfDenudation->FormValue != NULL && $this->DateOfDenudation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateOfDenudation->caption(), $this->DateOfDenudation->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DateOfDenudation->FormValue)) {
			AddMessage($FormError, $this->DateOfDenudation->errorMessage());
		}
		if ($this->DenudationDoneBy->Required) {
			if (!$this->DenudationDoneBy->IsDetailKey && $this->DenudationDoneBy->FormValue != NULL && $this->DenudationDoneBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DenudationDoneBy->caption(), $this->DenudationDoneBy->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
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
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->ExpFollicles->Required) {
			if (!$this->ExpFollicles->IsDetailKey && $this->ExpFollicles->FormValue != NULL && $this->ExpFollicles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExpFollicles->caption(), $this->ExpFollicles->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryDenudationDoneBy->Required) {
			if (!$this->SecondaryDenudationDoneBy->IsDetailKey && $this->SecondaryDenudationDoneBy->FormValue != NULL && $this->SecondaryDenudationDoneBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryDenudationDoneBy->caption(), $this->SecondaryDenudationDoneBy->RequiredErrorMessage));
			}
		}
		if ($this->OocyteOrgin->Required) {
			if (!$this->OocyteOrgin->IsDetailKey && $this->OocyteOrgin->FormValue != NULL && $this->OocyteOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocyteOrgin->caption(), $this->OocyteOrgin->RequiredErrorMessage));
			}
		}
		if ($this->patient1->Required) {
			if (!$this->patient1->IsDetailKey && $this->patient1->FormValue != NULL && $this->patient1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient1->caption(), $this->patient1->RequiredErrorMessage));
			}
		}
		if ($this->OocyteType->Required) {
			if ($this->OocyteType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocyteType->caption(), $this->OocyteType->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate1->Required) {
			if (!$this->MIOocytesDonate1->IsDetailKey && $this->MIOocytesDonate1->FormValue != NULL && $this->MIOocytesDonate1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate1->caption(), $this->MIOocytesDonate1->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate2->Required) {
			if (!$this->MIOocytesDonate2->IsDetailKey && $this->MIOocytesDonate2->FormValue != NULL && $this->MIOocytesDonate2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate2->caption(), $this->MIOocytesDonate2->RequiredErrorMessage));
			}
		}
		if ($this->SelfMI->Required) {
			if (!$this->SelfMI->IsDetailKey && $this->SelfMI->FormValue != NULL && $this->SelfMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfMI->caption(), $this->SelfMI->RequiredErrorMessage));
			}
		}
		if ($this->SelfMII->Required) {
			if (!$this->SelfMII->IsDetailKey && $this->SelfMII->FormValue != NULL && $this->SelfMII->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfMII->caption(), $this->SelfMII->RequiredErrorMessage));
			}
		}
		if ($this->patient3->Required) {
			if (!$this->patient3->IsDetailKey && $this->patient3->FormValue != NULL && $this->patient3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient3->caption(), $this->patient3->RequiredErrorMessage));
			}
		}
		if ($this->patient4->Required) {
			if (!$this->patient4->IsDetailKey && $this->patient4->FormValue != NULL && $this->patient4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient4->caption(), $this->patient4->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate3->Required) {
			if (!$this->OocytesDonate3->IsDetailKey && $this->OocytesDonate3->FormValue != NULL && $this->OocytesDonate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate3->caption(), $this->OocytesDonate3->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate4->Required) {
			if (!$this->OocytesDonate4->IsDetailKey && $this->OocytesDonate4->FormValue != NULL && $this->OocytesDonate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate4->caption(), $this->OocytesDonate4->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate3->Required) {
			if (!$this->MIOocytesDonate3->IsDetailKey && $this->MIOocytesDonate3->FormValue != NULL && $this->MIOocytesDonate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate3->caption(), $this->MIOocytesDonate3->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate4->Required) {
			if (!$this->MIOocytesDonate4->IsDetailKey && $this->MIOocytesDonate4->FormValue != NULL && $this->MIOocytesDonate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate4->caption(), $this->MIOocytesDonate4->RequiredErrorMessage));
			}
		}
		if ($this->SelfOocytesMI->Required) {
			if (!$this->SelfOocytesMI->IsDetailKey && $this->SelfOocytesMI->FormValue != NULL && $this->SelfOocytesMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfOocytesMI->caption(), $this->SelfOocytesMI->RequiredErrorMessage));
			}
		}
		if ($this->SelfOocytesMII->Required) {
			if (!$this->SelfOocytesMII->IsDetailKey && $this->SelfOocytesMII->FormValue != NULL && $this->SelfOocytesMII->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfOocytesMII->caption(), $this->SelfOocytesMII->RequiredErrorMessage));
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

			// RIDNo
			$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, $this->RIDNo->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 11), NULL, $this->ResultDate->ReadOnly);

			// Surgeon
			$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, $this->Surgeon->ReadOnly);

			// AsstSurgeon
			$this->AsstSurgeon->setDbValueDef($rsnew, $this->AsstSurgeon->CurrentValue, NULL, $this->AsstSurgeon->ReadOnly);

			// Anaesthetist
			$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, $this->Anaesthetist->ReadOnly);

			// AnaestheiaType
			$this->AnaestheiaType->setDbValueDef($rsnew, $this->AnaestheiaType->CurrentValue, NULL, $this->AnaestheiaType->ReadOnly);

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->setDbValueDef($rsnew, $this->PrimaryEmbryologist->CurrentValue, NULL, $this->PrimaryEmbryologist->ReadOnly);

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->setDbValueDef($rsnew, $this->SecondaryEmbryologist->CurrentValue, NULL, $this->SecondaryEmbryologist->ReadOnly);

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->setDbValueDef($rsnew, $this->NoOfFolliclesRight->CurrentValue, NULL, $this->NoOfFolliclesRight->ReadOnly);

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->setDbValueDef($rsnew, $this->NoOfFolliclesLeft->CurrentValue, NULL, $this->NoOfFolliclesLeft->ReadOnly);

			// NoOfOocytes
			$this->NoOfOocytes->setDbValueDef($rsnew, $this->NoOfOocytes->CurrentValue, NULL, $this->NoOfOocytes->ReadOnly);

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->setDbValueDef($rsnew, $this->RecordOocyteDenudation->CurrentValue, NULL, $this->RecordOocyteDenudation->ReadOnly);

			// DateOfDenudation
			$this->DateOfDenudation->setDbValueDef($rsnew, UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11), NULL, $this->DateOfDenudation->ReadOnly);

			// DenudationDoneBy
			$this->DenudationDoneBy->setDbValueDef($rsnew, $this->DenudationDoneBy->CurrentValue, NULL, $this->DenudationDoneBy->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

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

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// ExpFollicles
			$this->ExpFollicles->setDbValueDef($rsnew, $this->ExpFollicles->CurrentValue, NULL, $this->ExpFollicles->ReadOnly);

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->setDbValueDef($rsnew, $this->SecondaryDenudationDoneBy->CurrentValue, NULL, $this->SecondaryDenudationDoneBy->ReadOnly);

			// OocyteOrgin
			$this->OocyteOrgin->setDbValueDef($rsnew, $this->OocyteOrgin->CurrentValue, NULL, $this->OocyteOrgin->ReadOnly);

			// patient1
			$this->patient1->setDbValueDef($rsnew, $this->patient1->CurrentValue, NULL, $this->patient1->ReadOnly);

			// OocyteType
			$this->OocyteType->setDbValueDef($rsnew, $this->OocyteType->CurrentValue, NULL, $this->OocyteType->ReadOnly);

			// MIOocytesDonate1
			$this->MIOocytesDonate1->setDbValueDef($rsnew, $this->MIOocytesDonate1->CurrentValue, NULL, $this->MIOocytesDonate1->ReadOnly);

			// MIOocytesDonate2
			$this->MIOocytesDonate2->setDbValueDef($rsnew, $this->MIOocytesDonate2->CurrentValue, NULL, $this->MIOocytesDonate2->ReadOnly);

			// SelfMI
			$this->SelfMI->setDbValueDef($rsnew, $this->SelfMI->CurrentValue, NULL, $this->SelfMI->ReadOnly);

			// SelfMII
			$this->SelfMII->setDbValueDef($rsnew, $this->SelfMII->CurrentValue, NULL, $this->SelfMII->ReadOnly);

			// patient3
			$this->patient3->setDbValueDef($rsnew, $this->patient3->CurrentValue, NULL, $this->patient3->ReadOnly);

			// patient4
			$this->patient4->setDbValueDef($rsnew, $this->patient4->CurrentValue, NULL, $this->patient4->ReadOnly);

			// OocytesDonate3
			$this->OocytesDonate3->setDbValueDef($rsnew, $this->OocytesDonate3->CurrentValue, NULL, $this->OocytesDonate3->ReadOnly);

			// OocytesDonate4
			$this->OocytesDonate4->setDbValueDef($rsnew, $this->OocytesDonate4->CurrentValue, NULL, $this->OocytesDonate4->ReadOnly);

			// MIOocytesDonate3
			$this->MIOocytesDonate3->setDbValueDef($rsnew, $this->MIOocytesDonate3->CurrentValue, NULL, $this->MIOocytesDonate3->ReadOnly);

			// MIOocytesDonate4
			$this->MIOocytesDonate4->setDbValueDef($rsnew, $this->MIOocytesDonate4->CurrentValue, NULL, $this->MIOocytesDonate4->ReadOnly);

			// SelfOocytesMI
			$this->SelfOocytesMI->setDbValueDef($rsnew, $this->SelfOocytesMI->CurrentValue, NULL, $this->SelfOocytesMI->ReadOnly);

			// SelfOocytesMII
			$this->SelfOocytesMII->setDbValueDef($rsnew, $this->SelfOocytesMII->CurrentValue, NULL, $this->SelfOocytesMII->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
			}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 11), NULL, FALSE);

		// Surgeon
		$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, FALSE);

		// AsstSurgeon
		$this->AsstSurgeon->setDbValueDef($rsnew, $this->AsstSurgeon->CurrentValue, NULL, FALSE);

		// Anaesthetist
		$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, FALSE);

		// AnaestheiaType
		$this->AnaestheiaType->setDbValueDef($rsnew, $this->AnaestheiaType->CurrentValue, NULL, FALSE);

		// PrimaryEmbryologist
		$this->PrimaryEmbryologist->setDbValueDef($rsnew, $this->PrimaryEmbryologist->CurrentValue, NULL, FALSE);

		// SecondaryEmbryologist
		$this->SecondaryEmbryologist->setDbValueDef($rsnew, $this->SecondaryEmbryologist->CurrentValue, NULL, FALSE);

		// NoOfFolliclesRight
		$this->NoOfFolliclesRight->setDbValueDef($rsnew, $this->NoOfFolliclesRight->CurrentValue, NULL, FALSE);

		// NoOfFolliclesLeft
		$this->NoOfFolliclesLeft->setDbValueDef($rsnew, $this->NoOfFolliclesLeft->CurrentValue, NULL, FALSE);

		// NoOfOocytes
		$this->NoOfOocytes->setDbValueDef($rsnew, $this->NoOfOocytes->CurrentValue, NULL, FALSE);

		// RecordOocyteDenudation
		$this->RecordOocyteDenudation->setDbValueDef($rsnew, $this->RecordOocyteDenudation->CurrentValue, NULL, FALSE);

		// DateOfDenudation
		$this->DateOfDenudation->setDbValueDef($rsnew, UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11), NULL, FALSE);

		// DenudationDoneBy
		$this->DenudationDoneBy->setDbValueDef($rsnew, $this->DenudationDoneBy->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

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

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// ExpFollicles
		$this->ExpFollicles->setDbValueDef($rsnew, $this->ExpFollicles->CurrentValue, NULL, FALSE);

		// SecondaryDenudationDoneBy
		$this->SecondaryDenudationDoneBy->setDbValueDef($rsnew, $this->SecondaryDenudationDoneBy->CurrentValue, NULL, FALSE);

		// OocyteOrgin
		$this->OocyteOrgin->setDbValueDef($rsnew, $this->OocyteOrgin->CurrentValue, NULL, FALSE);

		// patient1
		$this->patient1->setDbValueDef($rsnew, $this->patient1->CurrentValue, NULL, FALSE);

		// OocyteType
		$this->OocyteType->setDbValueDef($rsnew, $this->OocyteType->CurrentValue, NULL, FALSE);

		// MIOocytesDonate1
		$this->MIOocytesDonate1->setDbValueDef($rsnew, $this->MIOocytesDonate1->CurrentValue, NULL, FALSE);

		// MIOocytesDonate2
		$this->MIOocytesDonate2->setDbValueDef($rsnew, $this->MIOocytesDonate2->CurrentValue, NULL, FALSE);

		// SelfMI
		$this->SelfMI->setDbValueDef($rsnew, $this->SelfMI->CurrentValue, NULL, FALSE);

		// SelfMII
		$this->SelfMII->setDbValueDef($rsnew, $this->SelfMII->CurrentValue, NULL, FALSE);

		// patient3
		$this->patient3->setDbValueDef($rsnew, $this->patient3->CurrentValue, NULL, FALSE);

		// patient4
		$this->patient4->setDbValueDef($rsnew, $this->patient4->CurrentValue, NULL, FALSE);

		// OocytesDonate3
		$this->OocytesDonate3->setDbValueDef($rsnew, $this->OocytesDonate3->CurrentValue, NULL, FALSE);

		// OocytesDonate4
		$this->OocytesDonate4->setDbValueDef($rsnew, $this->OocytesDonate4->CurrentValue, NULL, FALSE);

		// MIOocytesDonate3
		$this->MIOocytesDonate3->setDbValueDef($rsnew, $this->MIOocytesDonate3->CurrentValue, NULL, FALSE);

		// MIOocytesDonate4
		$this->MIOocytesDonate4->setDbValueDef($rsnew, $this->MIOocytesDonate4->CurrentValue, NULL, FALSE);

		// SelfOocytesMI
		$this->SelfOocytesMI->setDbValueDef($rsnew, $this->SelfOocytesMI->CurrentValue, NULL, FALSE);

		// SelfOocytesMII
		$this->SelfOocytesMII->setDbValueDef($rsnew, $this->SelfOocytesMII->CurrentValue, NULL, FALSE);

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
		if ($masterTblVar == "view_ivf_treatment") {
			$this->TidNo->Visible = FALSE;
			if ($GLOBALS["view_ivf_treatment"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->RIDNo->Visible = FALSE;
			if ($GLOBALS["view_ivf_treatment"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["view_ivf_treatment"]->EventCancelled)
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
				case "x_patient2":
					break;
				case "x_OocyteOrgin":
					break;
				case "x_patient1":
					break;
				case "x_OocyteType":
					break;
				case "x_patient3":
					break;
				case "x_patient4":
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
						case "x_patient2":
							break;
						case "x_patient1":
							break;
						case "x_patient3":
							break;
						case "x_patient4":
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
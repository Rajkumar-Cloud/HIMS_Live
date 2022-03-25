<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_an_registration_list extends patient_an_registration
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_an_registration';

	// Page object name
	public $PageObjName = "patient_an_registration_list";

	// Grid form hidden field names
	public $FormName = "fpatient_an_registrationlist";
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

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (patient_an_registration)
		if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
			$GLOBALS["patient_an_registration"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_an_registration"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "patient_an_registrationadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patient_an_registrationdelete.php";
		$this->MultiUpdateUrl = "patient_an_registrationupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (patient_opd_follow_up)
		if (!isset($GLOBALS['patient_opd_follow_up']))
			$GLOBALS['patient_opd_follow_up'] = new patient_opd_follow_up();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option fpatient_an_registrationlistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

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
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

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
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
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
			if (!$Security->canList()) {
				SetStatus(401); // Unauthorized
				return;
			}
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

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
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

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		// Search filters

		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

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

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();
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

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

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

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
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
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

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

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_an_registrationlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->pid->AdvancedSearch->toJson(), ","); // Field pid
		$filterList = Concat($filterList, $this->fid->AdvancedSearch->toJson(), ","); // Field fid
		$filterList = Concat($filterList, $this->G->AdvancedSearch->toJson(), ","); // Field G
		$filterList = Concat($filterList, $this->P->AdvancedSearch->toJson(), ","); // Field P
		$filterList = Concat($filterList, $this->L->AdvancedSearch->toJson(), ","); // Field L
		$filterList = Concat($filterList, $this->A->AdvancedSearch->toJson(), ","); // Field A
		$filterList = Concat($filterList, $this->E->AdvancedSearch->toJson(), ","); // Field E
		$filterList = Concat($filterList, $this->M->AdvancedSearch->toJson(), ","); // Field M
		$filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
		$filterList = Concat($filterList, $this->EDO->AdvancedSearch->toJson(), ","); // Field EDO
		$filterList = Concat($filterList, $this->MenstrualHistory->AdvancedSearch->toJson(), ","); // Field MenstrualHistory
		$filterList = Concat($filterList, $this->MaritalHistory->AdvancedSearch->toJson(), ","); // Field MaritalHistory
		$filterList = Concat($filterList, $this->ObstetricHistory->AdvancedSearch->toJson(), ","); // Field ObstetricHistory
		$filterList = Concat($filterList, $this->PreviousHistoryofGDM->AdvancedSearch->toJson(), ","); // Field PreviousHistoryofGDM
		$filterList = Concat($filterList, $this->PreviousHistorofPIH->AdvancedSearch->toJson(), ","); // Field PreviousHistorofPIH
		$filterList = Concat($filterList, $this->PreviousHistoryofIUGR->AdvancedSearch->toJson(), ","); // Field PreviousHistoryofIUGR
		$filterList = Concat($filterList, $this->PreviousHistoryofOligohydramnios->AdvancedSearch->toJson(), ","); // Field PreviousHistoryofOligohydramnios
		$filterList = Concat($filterList, $this->PreviousHistoryofPreterm->AdvancedSearch->toJson(), ","); // Field PreviousHistoryofPreterm
		$filterList = Concat($filterList, $this->G1->AdvancedSearch->toJson(), ","); // Field G1
		$filterList = Concat($filterList, $this->G2->AdvancedSearch->toJson(), ","); // Field G2
		$filterList = Concat($filterList, $this->G3->AdvancedSearch->toJson(), ","); // Field G3
		$filterList = Concat($filterList, $this->DeliveryNDLSCS1->AdvancedSearch->toJson(), ","); // Field DeliveryNDLSCS1
		$filterList = Concat($filterList, $this->DeliveryNDLSCS2->AdvancedSearch->toJson(), ","); // Field DeliveryNDLSCS2
		$filterList = Concat($filterList, $this->DeliveryNDLSCS3->AdvancedSearch->toJson(), ","); // Field DeliveryNDLSCS3
		$filterList = Concat($filterList, $this->BabySexweight1->AdvancedSearch->toJson(), ","); // Field BabySexweight1
		$filterList = Concat($filterList, $this->BabySexweight2->AdvancedSearch->toJson(), ","); // Field BabySexweight2
		$filterList = Concat($filterList, $this->BabySexweight3->AdvancedSearch->toJson(), ","); // Field BabySexweight3
		$filterList = Concat($filterList, $this->PastMedicalHistory->AdvancedSearch->toJson(), ","); // Field PastMedicalHistory
		$filterList = Concat($filterList, $this->PastSurgicalHistory->AdvancedSearch->toJson(), ","); // Field PastSurgicalHistory
		$filterList = Concat($filterList, $this->FamilyHistory->AdvancedSearch->toJson(), ","); // Field FamilyHistory
		$filterList = Concat($filterList, $this->Viability->AdvancedSearch->toJson(), ","); // Field Viability
		$filterList = Concat($filterList, $this->ViabilityDATE->AdvancedSearch->toJson(), ","); // Field ViabilityDATE
		$filterList = Concat($filterList, $this->ViabilityREPORT->AdvancedSearch->toJson(), ","); // Field ViabilityREPORT
		$filterList = Concat($filterList, $this->Viability2->AdvancedSearch->toJson(), ","); // Field Viability2
		$filterList = Concat($filterList, $this->Viability2DATE->AdvancedSearch->toJson(), ","); // Field Viability2DATE
		$filterList = Concat($filterList, $this->Viability2REPORT->AdvancedSearch->toJson(), ","); // Field Viability2REPORT
		$filterList = Concat($filterList, $this->NTscan->AdvancedSearch->toJson(), ","); // Field NTscan
		$filterList = Concat($filterList, $this->NTscanDATE->AdvancedSearch->toJson(), ","); // Field NTscanDATE
		$filterList = Concat($filterList, $this->NTscanREPORT->AdvancedSearch->toJson(), ","); // Field NTscanREPORT
		$filterList = Concat($filterList, $this->EarlyTarget->AdvancedSearch->toJson(), ","); // Field EarlyTarget
		$filterList = Concat($filterList, $this->EarlyTargetDATE->AdvancedSearch->toJson(), ","); // Field EarlyTargetDATE
		$filterList = Concat($filterList, $this->EarlyTargetREPORT->AdvancedSearch->toJson(), ","); // Field EarlyTargetREPORT
		$filterList = Concat($filterList, $this->Anomaly->AdvancedSearch->toJson(), ","); // Field Anomaly
		$filterList = Concat($filterList, $this->AnomalyDATE->AdvancedSearch->toJson(), ","); // Field AnomalyDATE
		$filterList = Concat($filterList, $this->AnomalyREPORT->AdvancedSearch->toJson(), ","); // Field AnomalyREPORT
		$filterList = Concat($filterList, $this->Growth->AdvancedSearch->toJson(), ","); // Field Growth
		$filterList = Concat($filterList, $this->GrowthDATE->AdvancedSearch->toJson(), ","); // Field GrowthDATE
		$filterList = Concat($filterList, $this->GrowthREPORT->AdvancedSearch->toJson(), ","); // Field GrowthREPORT
		$filterList = Concat($filterList, $this->Growth1->AdvancedSearch->toJson(), ","); // Field Growth1
		$filterList = Concat($filterList, $this->Growth1DATE->AdvancedSearch->toJson(), ","); // Field Growth1DATE
		$filterList = Concat($filterList, $this->Growth1REPORT->AdvancedSearch->toJson(), ","); // Field Growth1REPORT
		$filterList = Concat($filterList, $this->ANProfile->AdvancedSearch->toJson(), ","); // Field ANProfile
		$filterList = Concat($filterList, $this->ANProfileDATE->AdvancedSearch->toJson(), ","); // Field ANProfileDATE
		$filterList = Concat($filterList, $this->ANProfileINHOUSE->AdvancedSearch->toJson(), ","); // Field ANProfileINHOUSE
		$filterList = Concat($filterList, $this->ANProfileREPORT->AdvancedSearch->toJson(), ","); // Field ANProfileREPORT
		$filterList = Concat($filterList, $this->DualMarker->AdvancedSearch->toJson(), ","); // Field DualMarker
		$filterList = Concat($filterList, $this->DualMarkerDATE->AdvancedSearch->toJson(), ","); // Field DualMarkerDATE
		$filterList = Concat($filterList, $this->DualMarkerINHOUSE->AdvancedSearch->toJson(), ","); // Field DualMarkerINHOUSE
		$filterList = Concat($filterList, $this->DualMarkerREPORT->AdvancedSearch->toJson(), ","); // Field DualMarkerREPORT
		$filterList = Concat($filterList, $this->Quadruple->AdvancedSearch->toJson(), ","); // Field Quadruple
		$filterList = Concat($filterList, $this->QuadrupleDATE->AdvancedSearch->toJson(), ","); // Field QuadrupleDATE
		$filterList = Concat($filterList, $this->QuadrupleINHOUSE->AdvancedSearch->toJson(), ","); // Field QuadrupleINHOUSE
		$filterList = Concat($filterList, $this->QuadrupleREPORT->AdvancedSearch->toJson(), ","); // Field QuadrupleREPORT
		$filterList = Concat($filterList, $this->A5month->AdvancedSearch->toJson(), ","); // Field A5month
		$filterList = Concat($filterList, $this->A5monthDATE->AdvancedSearch->toJson(), ","); // Field A5monthDATE
		$filterList = Concat($filterList, $this->A5monthINHOUSE->AdvancedSearch->toJson(), ","); // Field A5monthINHOUSE
		$filterList = Concat($filterList, $this->A5monthREPORT->AdvancedSearch->toJson(), ","); // Field A5monthREPORT
		$filterList = Concat($filterList, $this->A7month->AdvancedSearch->toJson(), ","); // Field A7month
		$filterList = Concat($filterList, $this->A7monthDATE->AdvancedSearch->toJson(), ","); // Field A7monthDATE
		$filterList = Concat($filterList, $this->A7monthINHOUSE->AdvancedSearch->toJson(), ","); // Field A7monthINHOUSE
		$filterList = Concat($filterList, $this->A7monthREPORT->AdvancedSearch->toJson(), ","); // Field A7monthREPORT
		$filterList = Concat($filterList, $this->A9month->AdvancedSearch->toJson(), ","); // Field A9month
		$filterList = Concat($filterList, $this->A9monthDATE->AdvancedSearch->toJson(), ","); // Field A9monthDATE
		$filterList = Concat($filterList, $this->A9monthINHOUSE->AdvancedSearch->toJson(), ","); // Field A9monthINHOUSE
		$filterList = Concat($filterList, $this->A9monthREPORT->AdvancedSearch->toJson(), ","); // Field A9monthREPORT
		$filterList = Concat($filterList, $this->INJ->AdvancedSearch->toJson(), ","); // Field INJ
		$filterList = Concat($filterList, $this->INJDATE->AdvancedSearch->toJson(), ","); // Field INJDATE
		$filterList = Concat($filterList, $this->INJINHOUSE->AdvancedSearch->toJson(), ","); // Field INJINHOUSE
		$filterList = Concat($filterList, $this->INJREPORT->AdvancedSearch->toJson(), ","); // Field INJREPORT
		$filterList = Concat($filterList, $this->Bleeding->AdvancedSearch->toJson(), ","); // Field Bleeding
		$filterList = Concat($filterList, $this->Hypothyroidism->AdvancedSearch->toJson(), ","); // Field Hypothyroidism
		$filterList = Concat($filterList, $this->PICMENumber->AdvancedSearch->toJson(), ","); // Field PICMENumber
		$filterList = Concat($filterList, $this->Outcome->AdvancedSearch->toJson(), ","); // Field Outcome
		$filterList = Concat($filterList, $this->DateofAdmission->AdvancedSearch->toJson(), ","); // Field DateofAdmission
		$filterList = Concat($filterList, $this->DateodProcedure->AdvancedSearch->toJson(), ","); // Field DateodProcedure
		$filterList = Concat($filterList, $this->Miscarriage->AdvancedSearch->toJson(), ","); // Field Miscarriage
		$filterList = Concat($filterList, $this->ModeOfDelivery->AdvancedSearch->toJson(), ","); // Field ModeOfDelivery
		$filterList = Concat($filterList, $this->ND->AdvancedSearch->toJson(), ","); // Field ND
		$filterList = Concat($filterList, $this->NDS->AdvancedSearch->toJson(), ","); // Field NDS
		$filterList = Concat($filterList, $this->NDP->AdvancedSearch->toJson(), ","); // Field NDP
		$filterList = Concat($filterList, $this->Vaccum->AdvancedSearch->toJson(), ","); // Field Vaccum
		$filterList = Concat($filterList, $this->VaccumS->AdvancedSearch->toJson(), ","); // Field VaccumS
		$filterList = Concat($filterList, $this->VaccumP->AdvancedSearch->toJson(), ","); // Field VaccumP
		$filterList = Concat($filterList, $this->Forceps->AdvancedSearch->toJson(), ","); // Field Forceps
		$filterList = Concat($filterList, $this->ForcepsS->AdvancedSearch->toJson(), ","); // Field ForcepsS
		$filterList = Concat($filterList, $this->ForcepsP->AdvancedSearch->toJson(), ","); // Field ForcepsP
		$filterList = Concat($filterList, $this->Elective->AdvancedSearch->toJson(), ","); // Field Elective
		$filterList = Concat($filterList, $this->ElectiveS->AdvancedSearch->toJson(), ","); // Field ElectiveS
		$filterList = Concat($filterList, $this->ElectiveP->AdvancedSearch->toJson(), ","); // Field ElectiveP
		$filterList = Concat($filterList, $this->Emergency->AdvancedSearch->toJson(), ","); // Field Emergency
		$filterList = Concat($filterList, $this->EmergencyS->AdvancedSearch->toJson(), ","); // Field EmergencyS
		$filterList = Concat($filterList, $this->EmergencyP->AdvancedSearch->toJson(), ","); // Field EmergencyP
		$filterList = Concat($filterList, $this->Maturity->AdvancedSearch->toJson(), ","); // Field Maturity
		$filterList = Concat($filterList, $this->Baby1->AdvancedSearch->toJson(), ","); // Field Baby1
		$filterList = Concat($filterList, $this->Baby2->AdvancedSearch->toJson(), ","); // Field Baby2
		$filterList = Concat($filterList, $this->sex1->AdvancedSearch->toJson(), ","); // Field sex1
		$filterList = Concat($filterList, $this->sex2->AdvancedSearch->toJson(), ","); // Field sex2
		$filterList = Concat($filterList, $this->weight1->AdvancedSearch->toJson(), ","); // Field weight1
		$filterList = Concat($filterList, $this->weight2->AdvancedSearch->toJson(), ","); // Field weight2
		$filterList = Concat($filterList, $this->NICU1->AdvancedSearch->toJson(), ","); // Field NICU1
		$filterList = Concat($filterList, $this->NICU2->AdvancedSearch->toJson(), ","); // Field NICU2
		$filterList = Concat($filterList, $this->Jaundice1->AdvancedSearch->toJson(), ","); // Field Jaundice1
		$filterList = Concat($filterList, $this->Jaundice2->AdvancedSearch->toJson(), ","); // Field Jaundice2
		$filterList = Concat($filterList, $this->Others1->AdvancedSearch->toJson(), ","); // Field Others1
		$filterList = Concat($filterList, $this->Others2->AdvancedSearch->toJson(), ","); // Field Others2
		$filterList = Concat($filterList, $this->SpillOverReasons->AdvancedSearch->toJson(), ","); // Field SpillOverReasons
		$filterList = Concat($filterList, $this->ANClosed->AdvancedSearch->toJson(), ","); // Field ANClosed
		$filterList = Concat($filterList, $this->ANClosedDATE->AdvancedSearch->toJson(), ","); // Field ANClosedDATE
		$filterList = Concat($filterList, $this->PastMedicalHistoryOthers->AdvancedSearch->toJson(), ","); // Field PastMedicalHistoryOthers
		$filterList = Concat($filterList, $this->PastSurgicalHistoryOthers->AdvancedSearch->toJson(), ","); // Field PastSurgicalHistoryOthers
		$filterList = Concat($filterList, $this->FamilyHistoryOthers->AdvancedSearch->toJson(), ","); // Field FamilyHistoryOthers
		$filterList = Concat($filterList, $this->PresentPregnancyComplicationsOthers->AdvancedSearch->toJson(), ","); // Field PresentPregnancyComplicationsOthers
		$filterList = Concat($filterList, $this->ETdate->AdvancedSearch->toJson(), ","); // Field ETdate
		if ($this->BasicSearch->Keyword != "") {
			$wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatient_an_registrationlistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field pid
		$this->pid->AdvancedSearch->SearchValue = @$filter["x_pid"];
		$this->pid->AdvancedSearch->SearchOperator = @$filter["z_pid"];
		$this->pid->AdvancedSearch->SearchCondition = @$filter["v_pid"];
		$this->pid->AdvancedSearch->SearchValue2 = @$filter["y_pid"];
		$this->pid->AdvancedSearch->SearchOperator2 = @$filter["w_pid"];
		$this->pid->AdvancedSearch->save();

		// Field fid
		$this->fid->AdvancedSearch->SearchValue = @$filter["x_fid"];
		$this->fid->AdvancedSearch->SearchOperator = @$filter["z_fid"];
		$this->fid->AdvancedSearch->SearchCondition = @$filter["v_fid"];
		$this->fid->AdvancedSearch->SearchValue2 = @$filter["y_fid"];
		$this->fid->AdvancedSearch->SearchOperator2 = @$filter["w_fid"];
		$this->fid->AdvancedSearch->save();

		// Field G
		$this->G->AdvancedSearch->SearchValue = @$filter["x_G"];
		$this->G->AdvancedSearch->SearchOperator = @$filter["z_G"];
		$this->G->AdvancedSearch->SearchCondition = @$filter["v_G"];
		$this->G->AdvancedSearch->SearchValue2 = @$filter["y_G"];
		$this->G->AdvancedSearch->SearchOperator2 = @$filter["w_G"];
		$this->G->AdvancedSearch->save();

		// Field P
		$this->P->AdvancedSearch->SearchValue = @$filter["x_P"];
		$this->P->AdvancedSearch->SearchOperator = @$filter["z_P"];
		$this->P->AdvancedSearch->SearchCondition = @$filter["v_P"];
		$this->P->AdvancedSearch->SearchValue2 = @$filter["y_P"];
		$this->P->AdvancedSearch->SearchOperator2 = @$filter["w_P"];
		$this->P->AdvancedSearch->save();

		// Field L
		$this->L->AdvancedSearch->SearchValue = @$filter["x_L"];
		$this->L->AdvancedSearch->SearchOperator = @$filter["z_L"];
		$this->L->AdvancedSearch->SearchCondition = @$filter["v_L"];
		$this->L->AdvancedSearch->SearchValue2 = @$filter["y_L"];
		$this->L->AdvancedSearch->SearchOperator2 = @$filter["w_L"];
		$this->L->AdvancedSearch->save();

		// Field A
		$this->A->AdvancedSearch->SearchValue = @$filter["x_A"];
		$this->A->AdvancedSearch->SearchOperator = @$filter["z_A"];
		$this->A->AdvancedSearch->SearchCondition = @$filter["v_A"];
		$this->A->AdvancedSearch->SearchValue2 = @$filter["y_A"];
		$this->A->AdvancedSearch->SearchOperator2 = @$filter["w_A"];
		$this->A->AdvancedSearch->save();

		// Field E
		$this->E->AdvancedSearch->SearchValue = @$filter["x_E"];
		$this->E->AdvancedSearch->SearchOperator = @$filter["z_E"];
		$this->E->AdvancedSearch->SearchCondition = @$filter["v_E"];
		$this->E->AdvancedSearch->SearchValue2 = @$filter["y_E"];
		$this->E->AdvancedSearch->SearchOperator2 = @$filter["w_E"];
		$this->E->AdvancedSearch->save();

		// Field M
		$this->M->AdvancedSearch->SearchValue = @$filter["x_M"];
		$this->M->AdvancedSearch->SearchOperator = @$filter["z_M"];
		$this->M->AdvancedSearch->SearchCondition = @$filter["v_M"];
		$this->M->AdvancedSearch->SearchValue2 = @$filter["y_M"];
		$this->M->AdvancedSearch->SearchOperator2 = @$filter["w_M"];
		$this->M->AdvancedSearch->save();

		// Field LMP
		$this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
		$this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
		$this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
		$this->LMP->AdvancedSearch->save();

		// Field EDO
		$this->EDO->AdvancedSearch->SearchValue = @$filter["x_EDO"];
		$this->EDO->AdvancedSearch->SearchOperator = @$filter["z_EDO"];
		$this->EDO->AdvancedSearch->SearchCondition = @$filter["v_EDO"];
		$this->EDO->AdvancedSearch->SearchValue2 = @$filter["y_EDO"];
		$this->EDO->AdvancedSearch->SearchOperator2 = @$filter["w_EDO"];
		$this->EDO->AdvancedSearch->save();

		// Field MenstrualHistory
		$this->MenstrualHistory->AdvancedSearch->SearchValue = @$filter["x_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator = @$filter["z_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchCondition = @$filter["v_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchValue2 = @$filter["y_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->save();

		// Field MaritalHistory
		$this->MaritalHistory->AdvancedSearch->SearchValue = @$filter["x_MaritalHistory"];
		$this->MaritalHistory->AdvancedSearch->SearchOperator = @$filter["z_MaritalHistory"];
		$this->MaritalHistory->AdvancedSearch->SearchCondition = @$filter["v_MaritalHistory"];
		$this->MaritalHistory->AdvancedSearch->SearchValue2 = @$filter["y_MaritalHistory"];
		$this->MaritalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MaritalHistory"];
		$this->MaritalHistory->AdvancedSearch->save();

		// Field ObstetricHistory
		$this->ObstetricHistory->AdvancedSearch->SearchValue = @$filter["x_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchOperator = @$filter["z_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchCondition = @$filter["v_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchValue2 = @$filter["y_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchOperator2 = @$filter["w_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->save();

		// Field PreviousHistoryofGDM
		$this->PreviousHistoryofGDM->AdvancedSearch->SearchValue = @$filter["x_PreviousHistoryofGDM"];
		$this->PreviousHistoryofGDM->AdvancedSearch->SearchOperator = @$filter["z_PreviousHistoryofGDM"];
		$this->PreviousHistoryofGDM->AdvancedSearch->SearchCondition = @$filter["v_PreviousHistoryofGDM"];
		$this->PreviousHistoryofGDM->AdvancedSearch->SearchValue2 = @$filter["y_PreviousHistoryofGDM"];
		$this->PreviousHistoryofGDM->AdvancedSearch->SearchOperator2 = @$filter["w_PreviousHistoryofGDM"];
		$this->PreviousHistoryofGDM->AdvancedSearch->save();

		// Field PreviousHistorofPIH
		$this->PreviousHistorofPIH->AdvancedSearch->SearchValue = @$filter["x_PreviousHistorofPIH"];
		$this->PreviousHistorofPIH->AdvancedSearch->SearchOperator = @$filter["z_PreviousHistorofPIH"];
		$this->PreviousHistorofPIH->AdvancedSearch->SearchCondition = @$filter["v_PreviousHistorofPIH"];
		$this->PreviousHistorofPIH->AdvancedSearch->SearchValue2 = @$filter["y_PreviousHistorofPIH"];
		$this->PreviousHistorofPIH->AdvancedSearch->SearchOperator2 = @$filter["w_PreviousHistorofPIH"];
		$this->PreviousHistorofPIH->AdvancedSearch->save();

		// Field PreviousHistoryofIUGR
		$this->PreviousHistoryofIUGR->AdvancedSearch->SearchValue = @$filter["x_PreviousHistoryofIUGR"];
		$this->PreviousHistoryofIUGR->AdvancedSearch->SearchOperator = @$filter["z_PreviousHistoryofIUGR"];
		$this->PreviousHistoryofIUGR->AdvancedSearch->SearchCondition = @$filter["v_PreviousHistoryofIUGR"];
		$this->PreviousHistoryofIUGR->AdvancedSearch->SearchValue2 = @$filter["y_PreviousHistoryofIUGR"];
		$this->PreviousHistoryofIUGR->AdvancedSearch->SearchOperator2 = @$filter["w_PreviousHistoryofIUGR"];
		$this->PreviousHistoryofIUGR->AdvancedSearch->save();

		// Field PreviousHistoryofOligohydramnios
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->SearchValue = @$filter["x_PreviousHistoryofOligohydramnios"];
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->SearchOperator = @$filter["z_PreviousHistoryofOligohydramnios"];
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->SearchCondition = @$filter["v_PreviousHistoryofOligohydramnios"];
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->SearchValue2 = @$filter["y_PreviousHistoryofOligohydramnios"];
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->SearchOperator2 = @$filter["w_PreviousHistoryofOligohydramnios"];
		$this->PreviousHistoryofOligohydramnios->AdvancedSearch->save();

		// Field PreviousHistoryofPreterm
		$this->PreviousHistoryofPreterm->AdvancedSearch->SearchValue = @$filter["x_PreviousHistoryofPreterm"];
		$this->PreviousHistoryofPreterm->AdvancedSearch->SearchOperator = @$filter["z_PreviousHistoryofPreterm"];
		$this->PreviousHistoryofPreterm->AdvancedSearch->SearchCondition = @$filter["v_PreviousHistoryofPreterm"];
		$this->PreviousHistoryofPreterm->AdvancedSearch->SearchValue2 = @$filter["y_PreviousHistoryofPreterm"];
		$this->PreviousHistoryofPreterm->AdvancedSearch->SearchOperator2 = @$filter["w_PreviousHistoryofPreterm"];
		$this->PreviousHistoryofPreterm->AdvancedSearch->save();

		// Field G1
		$this->G1->AdvancedSearch->SearchValue = @$filter["x_G1"];
		$this->G1->AdvancedSearch->SearchOperator = @$filter["z_G1"];
		$this->G1->AdvancedSearch->SearchCondition = @$filter["v_G1"];
		$this->G1->AdvancedSearch->SearchValue2 = @$filter["y_G1"];
		$this->G1->AdvancedSearch->SearchOperator2 = @$filter["w_G1"];
		$this->G1->AdvancedSearch->save();

		// Field G2
		$this->G2->AdvancedSearch->SearchValue = @$filter["x_G2"];
		$this->G2->AdvancedSearch->SearchOperator = @$filter["z_G2"];
		$this->G2->AdvancedSearch->SearchCondition = @$filter["v_G2"];
		$this->G2->AdvancedSearch->SearchValue2 = @$filter["y_G2"];
		$this->G2->AdvancedSearch->SearchOperator2 = @$filter["w_G2"];
		$this->G2->AdvancedSearch->save();

		// Field G3
		$this->G3->AdvancedSearch->SearchValue = @$filter["x_G3"];
		$this->G3->AdvancedSearch->SearchOperator = @$filter["z_G3"];
		$this->G3->AdvancedSearch->SearchCondition = @$filter["v_G3"];
		$this->G3->AdvancedSearch->SearchValue2 = @$filter["y_G3"];
		$this->G3->AdvancedSearch->SearchOperator2 = @$filter["w_G3"];
		$this->G3->AdvancedSearch->save();

		// Field DeliveryNDLSCS1
		$this->DeliveryNDLSCS1->AdvancedSearch->SearchValue = @$filter["x_DeliveryNDLSCS1"];
		$this->DeliveryNDLSCS1->AdvancedSearch->SearchOperator = @$filter["z_DeliveryNDLSCS1"];
		$this->DeliveryNDLSCS1->AdvancedSearch->SearchCondition = @$filter["v_DeliveryNDLSCS1"];
		$this->DeliveryNDLSCS1->AdvancedSearch->SearchValue2 = @$filter["y_DeliveryNDLSCS1"];
		$this->DeliveryNDLSCS1->AdvancedSearch->SearchOperator2 = @$filter["w_DeliveryNDLSCS1"];
		$this->DeliveryNDLSCS1->AdvancedSearch->save();

		// Field DeliveryNDLSCS2
		$this->DeliveryNDLSCS2->AdvancedSearch->SearchValue = @$filter["x_DeliveryNDLSCS2"];
		$this->DeliveryNDLSCS2->AdvancedSearch->SearchOperator = @$filter["z_DeliveryNDLSCS2"];
		$this->DeliveryNDLSCS2->AdvancedSearch->SearchCondition = @$filter["v_DeliveryNDLSCS2"];
		$this->DeliveryNDLSCS2->AdvancedSearch->SearchValue2 = @$filter["y_DeliveryNDLSCS2"];
		$this->DeliveryNDLSCS2->AdvancedSearch->SearchOperator2 = @$filter["w_DeliveryNDLSCS2"];
		$this->DeliveryNDLSCS2->AdvancedSearch->save();

		// Field DeliveryNDLSCS3
		$this->DeliveryNDLSCS3->AdvancedSearch->SearchValue = @$filter["x_DeliveryNDLSCS3"];
		$this->DeliveryNDLSCS3->AdvancedSearch->SearchOperator = @$filter["z_DeliveryNDLSCS3"];
		$this->DeliveryNDLSCS3->AdvancedSearch->SearchCondition = @$filter["v_DeliveryNDLSCS3"];
		$this->DeliveryNDLSCS3->AdvancedSearch->SearchValue2 = @$filter["y_DeliveryNDLSCS3"];
		$this->DeliveryNDLSCS3->AdvancedSearch->SearchOperator2 = @$filter["w_DeliveryNDLSCS3"];
		$this->DeliveryNDLSCS3->AdvancedSearch->save();

		// Field BabySexweight1
		$this->BabySexweight1->AdvancedSearch->SearchValue = @$filter["x_BabySexweight1"];
		$this->BabySexweight1->AdvancedSearch->SearchOperator = @$filter["z_BabySexweight1"];
		$this->BabySexweight1->AdvancedSearch->SearchCondition = @$filter["v_BabySexweight1"];
		$this->BabySexweight1->AdvancedSearch->SearchValue2 = @$filter["y_BabySexweight1"];
		$this->BabySexweight1->AdvancedSearch->SearchOperator2 = @$filter["w_BabySexweight1"];
		$this->BabySexweight1->AdvancedSearch->save();

		// Field BabySexweight2
		$this->BabySexweight2->AdvancedSearch->SearchValue = @$filter["x_BabySexweight2"];
		$this->BabySexweight2->AdvancedSearch->SearchOperator = @$filter["z_BabySexweight2"];
		$this->BabySexweight2->AdvancedSearch->SearchCondition = @$filter["v_BabySexweight2"];
		$this->BabySexweight2->AdvancedSearch->SearchValue2 = @$filter["y_BabySexweight2"];
		$this->BabySexweight2->AdvancedSearch->SearchOperator2 = @$filter["w_BabySexweight2"];
		$this->BabySexweight2->AdvancedSearch->save();

		// Field BabySexweight3
		$this->BabySexweight3->AdvancedSearch->SearchValue = @$filter["x_BabySexweight3"];
		$this->BabySexweight3->AdvancedSearch->SearchOperator = @$filter["z_BabySexweight3"];
		$this->BabySexweight3->AdvancedSearch->SearchCondition = @$filter["v_BabySexweight3"];
		$this->BabySexweight3->AdvancedSearch->SearchValue2 = @$filter["y_BabySexweight3"];
		$this->BabySexweight3->AdvancedSearch->SearchOperator2 = @$filter["w_BabySexweight3"];
		$this->BabySexweight3->AdvancedSearch->save();

		// Field PastMedicalHistory
		$this->PastMedicalHistory->AdvancedSearch->SearchValue = @$filter["x_PastMedicalHistory"];
		$this->PastMedicalHistory->AdvancedSearch->SearchOperator = @$filter["z_PastMedicalHistory"];
		$this->PastMedicalHistory->AdvancedSearch->SearchCondition = @$filter["v_PastMedicalHistory"];
		$this->PastMedicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_PastMedicalHistory"];
		$this->PastMedicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_PastMedicalHistory"];
		$this->PastMedicalHistory->AdvancedSearch->save();

		// Field PastSurgicalHistory
		$this->PastSurgicalHistory->AdvancedSearch->SearchValue = @$filter["x_PastSurgicalHistory"];
		$this->PastSurgicalHistory->AdvancedSearch->SearchOperator = @$filter["z_PastSurgicalHistory"];
		$this->PastSurgicalHistory->AdvancedSearch->SearchCondition = @$filter["v_PastSurgicalHistory"];
		$this->PastSurgicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_PastSurgicalHistory"];
		$this->PastSurgicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_PastSurgicalHistory"];
		$this->PastSurgicalHistory->AdvancedSearch->save();

		// Field FamilyHistory
		$this->FamilyHistory->AdvancedSearch->SearchValue = @$filter["x_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->save();

		// Field Viability
		$this->Viability->AdvancedSearch->SearchValue = @$filter["x_Viability"];
		$this->Viability->AdvancedSearch->SearchOperator = @$filter["z_Viability"];
		$this->Viability->AdvancedSearch->SearchCondition = @$filter["v_Viability"];
		$this->Viability->AdvancedSearch->SearchValue2 = @$filter["y_Viability"];
		$this->Viability->AdvancedSearch->SearchOperator2 = @$filter["w_Viability"];
		$this->Viability->AdvancedSearch->save();

		// Field ViabilityDATE
		$this->ViabilityDATE->AdvancedSearch->SearchValue = @$filter["x_ViabilityDATE"];
		$this->ViabilityDATE->AdvancedSearch->SearchOperator = @$filter["z_ViabilityDATE"];
		$this->ViabilityDATE->AdvancedSearch->SearchCondition = @$filter["v_ViabilityDATE"];
		$this->ViabilityDATE->AdvancedSearch->SearchValue2 = @$filter["y_ViabilityDATE"];
		$this->ViabilityDATE->AdvancedSearch->SearchOperator2 = @$filter["w_ViabilityDATE"];
		$this->ViabilityDATE->AdvancedSearch->save();

		// Field ViabilityREPORT
		$this->ViabilityREPORT->AdvancedSearch->SearchValue = @$filter["x_ViabilityREPORT"];
		$this->ViabilityREPORT->AdvancedSearch->SearchOperator = @$filter["z_ViabilityREPORT"];
		$this->ViabilityREPORT->AdvancedSearch->SearchCondition = @$filter["v_ViabilityREPORT"];
		$this->ViabilityREPORT->AdvancedSearch->SearchValue2 = @$filter["y_ViabilityREPORT"];
		$this->ViabilityREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_ViabilityREPORT"];
		$this->ViabilityREPORT->AdvancedSearch->save();

		// Field Viability2
		$this->Viability2->AdvancedSearch->SearchValue = @$filter["x_Viability2"];
		$this->Viability2->AdvancedSearch->SearchOperator = @$filter["z_Viability2"];
		$this->Viability2->AdvancedSearch->SearchCondition = @$filter["v_Viability2"];
		$this->Viability2->AdvancedSearch->SearchValue2 = @$filter["y_Viability2"];
		$this->Viability2->AdvancedSearch->SearchOperator2 = @$filter["w_Viability2"];
		$this->Viability2->AdvancedSearch->save();

		// Field Viability2DATE
		$this->Viability2DATE->AdvancedSearch->SearchValue = @$filter["x_Viability2DATE"];
		$this->Viability2DATE->AdvancedSearch->SearchOperator = @$filter["z_Viability2DATE"];
		$this->Viability2DATE->AdvancedSearch->SearchCondition = @$filter["v_Viability2DATE"];
		$this->Viability2DATE->AdvancedSearch->SearchValue2 = @$filter["y_Viability2DATE"];
		$this->Viability2DATE->AdvancedSearch->SearchOperator2 = @$filter["w_Viability2DATE"];
		$this->Viability2DATE->AdvancedSearch->save();

		// Field Viability2REPORT
		$this->Viability2REPORT->AdvancedSearch->SearchValue = @$filter["x_Viability2REPORT"];
		$this->Viability2REPORT->AdvancedSearch->SearchOperator = @$filter["z_Viability2REPORT"];
		$this->Viability2REPORT->AdvancedSearch->SearchCondition = @$filter["v_Viability2REPORT"];
		$this->Viability2REPORT->AdvancedSearch->SearchValue2 = @$filter["y_Viability2REPORT"];
		$this->Viability2REPORT->AdvancedSearch->SearchOperator2 = @$filter["w_Viability2REPORT"];
		$this->Viability2REPORT->AdvancedSearch->save();

		// Field NTscan
		$this->NTscan->AdvancedSearch->SearchValue = @$filter["x_NTscan"];
		$this->NTscan->AdvancedSearch->SearchOperator = @$filter["z_NTscan"];
		$this->NTscan->AdvancedSearch->SearchCondition = @$filter["v_NTscan"];
		$this->NTscan->AdvancedSearch->SearchValue2 = @$filter["y_NTscan"];
		$this->NTscan->AdvancedSearch->SearchOperator2 = @$filter["w_NTscan"];
		$this->NTscan->AdvancedSearch->save();

		// Field NTscanDATE
		$this->NTscanDATE->AdvancedSearch->SearchValue = @$filter["x_NTscanDATE"];
		$this->NTscanDATE->AdvancedSearch->SearchOperator = @$filter["z_NTscanDATE"];
		$this->NTscanDATE->AdvancedSearch->SearchCondition = @$filter["v_NTscanDATE"];
		$this->NTscanDATE->AdvancedSearch->SearchValue2 = @$filter["y_NTscanDATE"];
		$this->NTscanDATE->AdvancedSearch->SearchOperator2 = @$filter["w_NTscanDATE"];
		$this->NTscanDATE->AdvancedSearch->save();

		// Field NTscanREPORT
		$this->NTscanREPORT->AdvancedSearch->SearchValue = @$filter["x_NTscanREPORT"];
		$this->NTscanREPORT->AdvancedSearch->SearchOperator = @$filter["z_NTscanREPORT"];
		$this->NTscanREPORT->AdvancedSearch->SearchCondition = @$filter["v_NTscanREPORT"];
		$this->NTscanREPORT->AdvancedSearch->SearchValue2 = @$filter["y_NTscanREPORT"];
		$this->NTscanREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_NTscanREPORT"];
		$this->NTscanREPORT->AdvancedSearch->save();

		// Field EarlyTarget
		$this->EarlyTarget->AdvancedSearch->SearchValue = @$filter["x_EarlyTarget"];
		$this->EarlyTarget->AdvancedSearch->SearchOperator = @$filter["z_EarlyTarget"];
		$this->EarlyTarget->AdvancedSearch->SearchCondition = @$filter["v_EarlyTarget"];
		$this->EarlyTarget->AdvancedSearch->SearchValue2 = @$filter["y_EarlyTarget"];
		$this->EarlyTarget->AdvancedSearch->SearchOperator2 = @$filter["w_EarlyTarget"];
		$this->EarlyTarget->AdvancedSearch->save();

		// Field EarlyTargetDATE
		$this->EarlyTargetDATE->AdvancedSearch->SearchValue = @$filter["x_EarlyTargetDATE"];
		$this->EarlyTargetDATE->AdvancedSearch->SearchOperator = @$filter["z_EarlyTargetDATE"];
		$this->EarlyTargetDATE->AdvancedSearch->SearchCondition = @$filter["v_EarlyTargetDATE"];
		$this->EarlyTargetDATE->AdvancedSearch->SearchValue2 = @$filter["y_EarlyTargetDATE"];
		$this->EarlyTargetDATE->AdvancedSearch->SearchOperator2 = @$filter["w_EarlyTargetDATE"];
		$this->EarlyTargetDATE->AdvancedSearch->save();

		// Field EarlyTargetREPORT
		$this->EarlyTargetREPORT->AdvancedSearch->SearchValue = @$filter["x_EarlyTargetREPORT"];
		$this->EarlyTargetREPORT->AdvancedSearch->SearchOperator = @$filter["z_EarlyTargetREPORT"];
		$this->EarlyTargetREPORT->AdvancedSearch->SearchCondition = @$filter["v_EarlyTargetREPORT"];
		$this->EarlyTargetREPORT->AdvancedSearch->SearchValue2 = @$filter["y_EarlyTargetREPORT"];
		$this->EarlyTargetREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_EarlyTargetREPORT"];
		$this->EarlyTargetREPORT->AdvancedSearch->save();

		// Field Anomaly
		$this->Anomaly->AdvancedSearch->SearchValue = @$filter["x_Anomaly"];
		$this->Anomaly->AdvancedSearch->SearchOperator = @$filter["z_Anomaly"];
		$this->Anomaly->AdvancedSearch->SearchCondition = @$filter["v_Anomaly"];
		$this->Anomaly->AdvancedSearch->SearchValue2 = @$filter["y_Anomaly"];
		$this->Anomaly->AdvancedSearch->SearchOperator2 = @$filter["w_Anomaly"];
		$this->Anomaly->AdvancedSearch->save();

		// Field AnomalyDATE
		$this->AnomalyDATE->AdvancedSearch->SearchValue = @$filter["x_AnomalyDATE"];
		$this->AnomalyDATE->AdvancedSearch->SearchOperator = @$filter["z_AnomalyDATE"];
		$this->AnomalyDATE->AdvancedSearch->SearchCondition = @$filter["v_AnomalyDATE"];
		$this->AnomalyDATE->AdvancedSearch->SearchValue2 = @$filter["y_AnomalyDATE"];
		$this->AnomalyDATE->AdvancedSearch->SearchOperator2 = @$filter["w_AnomalyDATE"];
		$this->AnomalyDATE->AdvancedSearch->save();

		// Field AnomalyREPORT
		$this->AnomalyREPORT->AdvancedSearch->SearchValue = @$filter["x_AnomalyREPORT"];
		$this->AnomalyREPORT->AdvancedSearch->SearchOperator = @$filter["z_AnomalyREPORT"];
		$this->AnomalyREPORT->AdvancedSearch->SearchCondition = @$filter["v_AnomalyREPORT"];
		$this->AnomalyREPORT->AdvancedSearch->SearchValue2 = @$filter["y_AnomalyREPORT"];
		$this->AnomalyREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_AnomalyREPORT"];
		$this->AnomalyREPORT->AdvancedSearch->save();

		// Field Growth
		$this->Growth->AdvancedSearch->SearchValue = @$filter["x_Growth"];
		$this->Growth->AdvancedSearch->SearchOperator = @$filter["z_Growth"];
		$this->Growth->AdvancedSearch->SearchCondition = @$filter["v_Growth"];
		$this->Growth->AdvancedSearch->SearchValue2 = @$filter["y_Growth"];
		$this->Growth->AdvancedSearch->SearchOperator2 = @$filter["w_Growth"];
		$this->Growth->AdvancedSearch->save();

		// Field GrowthDATE
		$this->GrowthDATE->AdvancedSearch->SearchValue = @$filter["x_GrowthDATE"];
		$this->GrowthDATE->AdvancedSearch->SearchOperator = @$filter["z_GrowthDATE"];
		$this->GrowthDATE->AdvancedSearch->SearchCondition = @$filter["v_GrowthDATE"];
		$this->GrowthDATE->AdvancedSearch->SearchValue2 = @$filter["y_GrowthDATE"];
		$this->GrowthDATE->AdvancedSearch->SearchOperator2 = @$filter["w_GrowthDATE"];
		$this->GrowthDATE->AdvancedSearch->save();

		// Field GrowthREPORT
		$this->GrowthREPORT->AdvancedSearch->SearchValue = @$filter["x_GrowthREPORT"];
		$this->GrowthREPORT->AdvancedSearch->SearchOperator = @$filter["z_GrowthREPORT"];
		$this->GrowthREPORT->AdvancedSearch->SearchCondition = @$filter["v_GrowthREPORT"];
		$this->GrowthREPORT->AdvancedSearch->SearchValue2 = @$filter["y_GrowthREPORT"];
		$this->GrowthREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_GrowthREPORT"];
		$this->GrowthREPORT->AdvancedSearch->save();

		// Field Growth1
		$this->Growth1->AdvancedSearch->SearchValue = @$filter["x_Growth1"];
		$this->Growth1->AdvancedSearch->SearchOperator = @$filter["z_Growth1"];
		$this->Growth1->AdvancedSearch->SearchCondition = @$filter["v_Growth1"];
		$this->Growth1->AdvancedSearch->SearchValue2 = @$filter["y_Growth1"];
		$this->Growth1->AdvancedSearch->SearchOperator2 = @$filter["w_Growth1"];
		$this->Growth1->AdvancedSearch->save();

		// Field Growth1DATE
		$this->Growth1DATE->AdvancedSearch->SearchValue = @$filter["x_Growth1DATE"];
		$this->Growth1DATE->AdvancedSearch->SearchOperator = @$filter["z_Growth1DATE"];
		$this->Growth1DATE->AdvancedSearch->SearchCondition = @$filter["v_Growth1DATE"];
		$this->Growth1DATE->AdvancedSearch->SearchValue2 = @$filter["y_Growth1DATE"];
		$this->Growth1DATE->AdvancedSearch->SearchOperator2 = @$filter["w_Growth1DATE"];
		$this->Growth1DATE->AdvancedSearch->save();

		// Field Growth1REPORT
		$this->Growth1REPORT->AdvancedSearch->SearchValue = @$filter["x_Growth1REPORT"];
		$this->Growth1REPORT->AdvancedSearch->SearchOperator = @$filter["z_Growth1REPORT"];
		$this->Growth1REPORT->AdvancedSearch->SearchCondition = @$filter["v_Growth1REPORT"];
		$this->Growth1REPORT->AdvancedSearch->SearchValue2 = @$filter["y_Growth1REPORT"];
		$this->Growth1REPORT->AdvancedSearch->SearchOperator2 = @$filter["w_Growth1REPORT"];
		$this->Growth1REPORT->AdvancedSearch->save();

		// Field ANProfile
		$this->ANProfile->AdvancedSearch->SearchValue = @$filter["x_ANProfile"];
		$this->ANProfile->AdvancedSearch->SearchOperator = @$filter["z_ANProfile"];
		$this->ANProfile->AdvancedSearch->SearchCondition = @$filter["v_ANProfile"];
		$this->ANProfile->AdvancedSearch->SearchValue2 = @$filter["y_ANProfile"];
		$this->ANProfile->AdvancedSearch->SearchOperator2 = @$filter["w_ANProfile"];
		$this->ANProfile->AdvancedSearch->save();

		// Field ANProfileDATE
		$this->ANProfileDATE->AdvancedSearch->SearchValue = @$filter["x_ANProfileDATE"];
		$this->ANProfileDATE->AdvancedSearch->SearchOperator = @$filter["z_ANProfileDATE"];
		$this->ANProfileDATE->AdvancedSearch->SearchCondition = @$filter["v_ANProfileDATE"];
		$this->ANProfileDATE->AdvancedSearch->SearchValue2 = @$filter["y_ANProfileDATE"];
		$this->ANProfileDATE->AdvancedSearch->SearchOperator2 = @$filter["w_ANProfileDATE"];
		$this->ANProfileDATE->AdvancedSearch->save();

		// Field ANProfileINHOUSE
		$this->ANProfileINHOUSE->AdvancedSearch->SearchValue = @$filter["x_ANProfileINHOUSE"];
		$this->ANProfileINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_ANProfileINHOUSE"];
		$this->ANProfileINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_ANProfileINHOUSE"];
		$this->ANProfileINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_ANProfileINHOUSE"];
		$this->ANProfileINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_ANProfileINHOUSE"];
		$this->ANProfileINHOUSE->AdvancedSearch->save();

		// Field ANProfileREPORT
		$this->ANProfileREPORT->AdvancedSearch->SearchValue = @$filter["x_ANProfileREPORT"];
		$this->ANProfileREPORT->AdvancedSearch->SearchOperator = @$filter["z_ANProfileREPORT"];
		$this->ANProfileREPORT->AdvancedSearch->SearchCondition = @$filter["v_ANProfileREPORT"];
		$this->ANProfileREPORT->AdvancedSearch->SearchValue2 = @$filter["y_ANProfileREPORT"];
		$this->ANProfileREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_ANProfileREPORT"];
		$this->ANProfileREPORT->AdvancedSearch->save();

		// Field DualMarker
		$this->DualMarker->AdvancedSearch->SearchValue = @$filter["x_DualMarker"];
		$this->DualMarker->AdvancedSearch->SearchOperator = @$filter["z_DualMarker"];
		$this->DualMarker->AdvancedSearch->SearchCondition = @$filter["v_DualMarker"];
		$this->DualMarker->AdvancedSearch->SearchValue2 = @$filter["y_DualMarker"];
		$this->DualMarker->AdvancedSearch->SearchOperator2 = @$filter["w_DualMarker"];
		$this->DualMarker->AdvancedSearch->save();

		// Field DualMarkerDATE
		$this->DualMarkerDATE->AdvancedSearch->SearchValue = @$filter["x_DualMarkerDATE"];
		$this->DualMarkerDATE->AdvancedSearch->SearchOperator = @$filter["z_DualMarkerDATE"];
		$this->DualMarkerDATE->AdvancedSearch->SearchCondition = @$filter["v_DualMarkerDATE"];
		$this->DualMarkerDATE->AdvancedSearch->SearchValue2 = @$filter["y_DualMarkerDATE"];
		$this->DualMarkerDATE->AdvancedSearch->SearchOperator2 = @$filter["w_DualMarkerDATE"];
		$this->DualMarkerDATE->AdvancedSearch->save();

		// Field DualMarkerINHOUSE
		$this->DualMarkerINHOUSE->AdvancedSearch->SearchValue = @$filter["x_DualMarkerINHOUSE"];
		$this->DualMarkerINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_DualMarkerINHOUSE"];
		$this->DualMarkerINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_DualMarkerINHOUSE"];
		$this->DualMarkerINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_DualMarkerINHOUSE"];
		$this->DualMarkerINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_DualMarkerINHOUSE"];
		$this->DualMarkerINHOUSE->AdvancedSearch->save();

		// Field DualMarkerREPORT
		$this->DualMarkerREPORT->AdvancedSearch->SearchValue = @$filter["x_DualMarkerREPORT"];
		$this->DualMarkerREPORT->AdvancedSearch->SearchOperator = @$filter["z_DualMarkerREPORT"];
		$this->DualMarkerREPORT->AdvancedSearch->SearchCondition = @$filter["v_DualMarkerREPORT"];
		$this->DualMarkerREPORT->AdvancedSearch->SearchValue2 = @$filter["y_DualMarkerREPORT"];
		$this->DualMarkerREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_DualMarkerREPORT"];
		$this->DualMarkerREPORT->AdvancedSearch->save();

		// Field Quadruple
		$this->Quadruple->AdvancedSearch->SearchValue = @$filter["x_Quadruple"];
		$this->Quadruple->AdvancedSearch->SearchOperator = @$filter["z_Quadruple"];
		$this->Quadruple->AdvancedSearch->SearchCondition = @$filter["v_Quadruple"];
		$this->Quadruple->AdvancedSearch->SearchValue2 = @$filter["y_Quadruple"];
		$this->Quadruple->AdvancedSearch->SearchOperator2 = @$filter["w_Quadruple"];
		$this->Quadruple->AdvancedSearch->save();

		// Field QuadrupleDATE
		$this->QuadrupleDATE->AdvancedSearch->SearchValue = @$filter["x_QuadrupleDATE"];
		$this->QuadrupleDATE->AdvancedSearch->SearchOperator = @$filter["z_QuadrupleDATE"];
		$this->QuadrupleDATE->AdvancedSearch->SearchCondition = @$filter["v_QuadrupleDATE"];
		$this->QuadrupleDATE->AdvancedSearch->SearchValue2 = @$filter["y_QuadrupleDATE"];
		$this->QuadrupleDATE->AdvancedSearch->SearchOperator2 = @$filter["w_QuadrupleDATE"];
		$this->QuadrupleDATE->AdvancedSearch->save();

		// Field QuadrupleINHOUSE
		$this->QuadrupleINHOUSE->AdvancedSearch->SearchValue = @$filter["x_QuadrupleINHOUSE"];
		$this->QuadrupleINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_QuadrupleINHOUSE"];
		$this->QuadrupleINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_QuadrupleINHOUSE"];
		$this->QuadrupleINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_QuadrupleINHOUSE"];
		$this->QuadrupleINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_QuadrupleINHOUSE"];
		$this->QuadrupleINHOUSE->AdvancedSearch->save();

		// Field QuadrupleREPORT
		$this->QuadrupleREPORT->AdvancedSearch->SearchValue = @$filter["x_QuadrupleREPORT"];
		$this->QuadrupleREPORT->AdvancedSearch->SearchOperator = @$filter["z_QuadrupleREPORT"];
		$this->QuadrupleREPORT->AdvancedSearch->SearchCondition = @$filter["v_QuadrupleREPORT"];
		$this->QuadrupleREPORT->AdvancedSearch->SearchValue2 = @$filter["y_QuadrupleREPORT"];
		$this->QuadrupleREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_QuadrupleREPORT"];
		$this->QuadrupleREPORT->AdvancedSearch->save();

		// Field A5month
		$this->A5month->AdvancedSearch->SearchValue = @$filter["x_A5month"];
		$this->A5month->AdvancedSearch->SearchOperator = @$filter["z_A5month"];
		$this->A5month->AdvancedSearch->SearchCondition = @$filter["v_A5month"];
		$this->A5month->AdvancedSearch->SearchValue2 = @$filter["y_A5month"];
		$this->A5month->AdvancedSearch->SearchOperator2 = @$filter["w_A5month"];
		$this->A5month->AdvancedSearch->save();

		// Field A5monthDATE
		$this->A5monthDATE->AdvancedSearch->SearchValue = @$filter["x_A5monthDATE"];
		$this->A5monthDATE->AdvancedSearch->SearchOperator = @$filter["z_A5monthDATE"];
		$this->A5monthDATE->AdvancedSearch->SearchCondition = @$filter["v_A5monthDATE"];
		$this->A5monthDATE->AdvancedSearch->SearchValue2 = @$filter["y_A5monthDATE"];
		$this->A5monthDATE->AdvancedSearch->SearchOperator2 = @$filter["w_A5monthDATE"];
		$this->A5monthDATE->AdvancedSearch->save();

		// Field A5monthINHOUSE
		$this->A5monthINHOUSE->AdvancedSearch->SearchValue = @$filter["x_A5monthINHOUSE"];
		$this->A5monthINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_A5monthINHOUSE"];
		$this->A5monthINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_A5monthINHOUSE"];
		$this->A5monthINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_A5monthINHOUSE"];
		$this->A5monthINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_A5monthINHOUSE"];
		$this->A5monthINHOUSE->AdvancedSearch->save();

		// Field A5monthREPORT
		$this->A5monthREPORT->AdvancedSearch->SearchValue = @$filter["x_A5monthREPORT"];
		$this->A5monthREPORT->AdvancedSearch->SearchOperator = @$filter["z_A5monthREPORT"];
		$this->A5monthREPORT->AdvancedSearch->SearchCondition = @$filter["v_A5monthREPORT"];
		$this->A5monthREPORT->AdvancedSearch->SearchValue2 = @$filter["y_A5monthREPORT"];
		$this->A5monthREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_A5monthREPORT"];
		$this->A5monthREPORT->AdvancedSearch->save();

		// Field A7month
		$this->A7month->AdvancedSearch->SearchValue = @$filter["x_A7month"];
		$this->A7month->AdvancedSearch->SearchOperator = @$filter["z_A7month"];
		$this->A7month->AdvancedSearch->SearchCondition = @$filter["v_A7month"];
		$this->A7month->AdvancedSearch->SearchValue2 = @$filter["y_A7month"];
		$this->A7month->AdvancedSearch->SearchOperator2 = @$filter["w_A7month"];
		$this->A7month->AdvancedSearch->save();

		// Field A7monthDATE
		$this->A7monthDATE->AdvancedSearch->SearchValue = @$filter["x_A7monthDATE"];
		$this->A7monthDATE->AdvancedSearch->SearchOperator = @$filter["z_A7monthDATE"];
		$this->A7monthDATE->AdvancedSearch->SearchCondition = @$filter["v_A7monthDATE"];
		$this->A7monthDATE->AdvancedSearch->SearchValue2 = @$filter["y_A7monthDATE"];
		$this->A7monthDATE->AdvancedSearch->SearchOperator2 = @$filter["w_A7monthDATE"];
		$this->A7monthDATE->AdvancedSearch->save();

		// Field A7monthINHOUSE
		$this->A7monthINHOUSE->AdvancedSearch->SearchValue = @$filter["x_A7monthINHOUSE"];
		$this->A7monthINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_A7monthINHOUSE"];
		$this->A7monthINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_A7monthINHOUSE"];
		$this->A7monthINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_A7monthINHOUSE"];
		$this->A7monthINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_A7monthINHOUSE"];
		$this->A7monthINHOUSE->AdvancedSearch->save();

		// Field A7monthREPORT
		$this->A7monthREPORT->AdvancedSearch->SearchValue = @$filter["x_A7monthREPORT"];
		$this->A7monthREPORT->AdvancedSearch->SearchOperator = @$filter["z_A7monthREPORT"];
		$this->A7monthREPORT->AdvancedSearch->SearchCondition = @$filter["v_A7monthREPORT"];
		$this->A7monthREPORT->AdvancedSearch->SearchValue2 = @$filter["y_A7monthREPORT"];
		$this->A7monthREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_A7monthREPORT"];
		$this->A7monthREPORT->AdvancedSearch->save();

		// Field A9month
		$this->A9month->AdvancedSearch->SearchValue = @$filter["x_A9month"];
		$this->A9month->AdvancedSearch->SearchOperator = @$filter["z_A9month"];
		$this->A9month->AdvancedSearch->SearchCondition = @$filter["v_A9month"];
		$this->A9month->AdvancedSearch->SearchValue2 = @$filter["y_A9month"];
		$this->A9month->AdvancedSearch->SearchOperator2 = @$filter["w_A9month"];
		$this->A9month->AdvancedSearch->save();

		// Field A9monthDATE
		$this->A9monthDATE->AdvancedSearch->SearchValue = @$filter["x_A9monthDATE"];
		$this->A9monthDATE->AdvancedSearch->SearchOperator = @$filter["z_A9monthDATE"];
		$this->A9monthDATE->AdvancedSearch->SearchCondition = @$filter["v_A9monthDATE"];
		$this->A9monthDATE->AdvancedSearch->SearchValue2 = @$filter["y_A9monthDATE"];
		$this->A9monthDATE->AdvancedSearch->SearchOperator2 = @$filter["w_A9monthDATE"];
		$this->A9monthDATE->AdvancedSearch->save();

		// Field A9monthINHOUSE
		$this->A9monthINHOUSE->AdvancedSearch->SearchValue = @$filter["x_A9monthINHOUSE"];
		$this->A9monthINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_A9monthINHOUSE"];
		$this->A9monthINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_A9monthINHOUSE"];
		$this->A9monthINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_A9monthINHOUSE"];
		$this->A9monthINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_A9monthINHOUSE"];
		$this->A9monthINHOUSE->AdvancedSearch->save();

		// Field A9monthREPORT
		$this->A9monthREPORT->AdvancedSearch->SearchValue = @$filter["x_A9monthREPORT"];
		$this->A9monthREPORT->AdvancedSearch->SearchOperator = @$filter["z_A9monthREPORT"];
		$this->A9monthREPORT->AdvancedSearch->SearchCondition = @$filter["v_A9monthREPORT"];
		$this->A9monthREPORT->AdvancedSearch->SearchValue2 = @$filter["y_A9monthREPORT"];
		$this->A9monthREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_A9monthREPORT"];
		$this->A9monthREPORT->AdvancedSearch->save();

		// Field INJ
		$this->INJ->AdvancedSearch->SearchValue = @$filter["x_INJ"];
		$this->INJ->AdvancedSearch->SearchOperator = @$filter["z_INJ"];
		$this->INJ->AdvancedSearch->SearchCondition = @$filter["v_INJ"];
		$this->INJ->AdvancedSearch->SearchValue2 = @$filter["y_INJ"];
		$this->INJ->AdvancedSearch->SearchOperator2 = @$filter["w_INJ"];
		$this->INJ->AdvancedSearch->save();

		// Field INJDATE
		$this->INJDATE->AdvancedSearch->SearchValue = @$filter["x_INJDATE"];
		$this->INJDATE->AdvancedSearch->SearchOperator = @$filter["z_INJDATE"];
		$this->INJDATE->AdvancedSearch->SearchCondition = @$filter["v_INJDATE"];
		$this->INJDATE->AdvancedSearch->SearchValue2 = @$filter["y_INJDATE"];
		$this->INJDATE->AdvancedSearch->SearchOperator2 = @$filter["w_INJDATE"];
		$this->INJDATE->AdvancedSearch->save();

		// Field INJINHOUSE
		$this->INJINHOUSE->AdvancedSearch->SearchValue = @$filter["x_INJINHOUSE"];
		$this->INJINHOUSE->AdvancedSearch->SearchOperator = @$filter["z_INJINHOUSE"];
		$this->INJINHOUSE->AdvancedSearch->SearchCondition = @$filter["v_INJINHOUSE"];
		$this->INJINHOUSE->AdvancedSearch->SearchValue2 = @$filter["y_INJINHOUSE"];
		$this->INJINHOUSE->AdvancedSearch->SearchOperator2 = @$filter["w_INJINHOUSE"];
		$this->INJINHOUSE->AdvancedSearch->save();

		// Field INJREPORT
		$this->INJREPORT->AdvancedSearch->SearchValue = @$filter["x_INJREPORT"];
		$this->INJREPORT->AdvancedSearch->SearchOperator = @$filter["z_INJREPORT"];
		$this->INJREPORT->AdvancedSearch->SearchCondition = @$filter["v_INJREPORT"];
		$this->INJREPORT->AdvancedSearch->SearchValue2 = @$filter["y_INJREPORT"];
		$this->INJREPORT->AdvancedSearch->SearchOperator2 = @$filter["w_INJREPORT"];
		$this->INJREPORT->AdvancedSearch->save();

		// Field Bleeding
		$this->Bleeding->AdvancedSearch->SearchValue = @$filter["x_Bleeding"];
		$this->Bleeding->AdvancedSearch->SearchOperator = @$filter["z_Bleeding"];
		$this->Bleeding->AdvancedSearch->SearchCondition = @$filter["v_Bleeding"];
		$this->Bleeding->AdvancedSearch->SearchValue2 = @$filter["y_Bleeding"];
		$this->Bleeding->AdvancedSearch->SearchOperator2 = @$filter["w_Bleeding"];
		$this->Bleeding->AdvancedSearch->save();

		// Field Hypothyroidism
		$this->Hypothyroidism->AdvancedSearch->SearchValue = @$filter["x_Hypothyroidism"];
		$this->Hypothyroidism->AdvancedSearch->SearchOperator = @$filter["z_Hypothyroidism"];
		$this->Hypothyroidism->AdvancedSearch->SearchCondition = @$filter["v_Hypothyroidism"];
		$this->Hypothyroidism->AdvancedSearch->SearchValue2 = @$filter["y_Hypothyroidism"];
		$this->Hypothyroidism->AdvancedSearch->SearchOperator2 = @$filter["w_Hypothyroidism"];
		$this->Hypothyroidism->AdvancedSearch->save();

		// Field PICMENumber
		$this->PICMENumber->AdvancedSearch->SearchValue = @$filter["x_PICMENumber"];
		$this->PICMENumber->AdvancedSearch->SearchOperator = @$filter["z_PICMENumber"];
		$this->PICMENumber->AdvancedSearch->SearchCondition = @$filter["v_PICMENumber"];
		$this->PICMENumber->AdvancedSearch->SearchValue2 = @$filter["y_PICMENumber"];
		$this->PICMENumber->AdvancedSearch->SearchOperator2 = @$filter["w_PICMENumber"];
		$this->PICMENumber->AdvancedSearch->save();

		// Field Outcome
		$this->Outcome->AdvancedSearch->SearchValue = @$filter["x_Outcome"];
		$this->Outcome->AdvancedSearch->SearchOperator = @$filter["z_Outcome"];
		$this->Outcome->AdvancedSearch->SearchCondition = @$filter["v_Outcome"];
		$this->Outcome->AdvancedSearch->SearchValue2 = @$filter["y_Outcome"];
		$this->Outcome->AdvancedSearch->SearchOperator2 = @$filter["w_Outcome"];
		$this->Outcome->AdvancedSearch->save();

		// Field DateofAdmission
		$this->DateofAdmission->AdvancedSearch->SearchValue = @$filter["x_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchOperator = @$filter["z_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchCondition = @$filter["v_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchValue2 = @$filter["y_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->SearchOperator2 = @$filter["w_DateofAdmission"];
		$this->DateofAdmission->AdvancedSearch->save();

		// Field DateodProcedure
		$this->DateodProcedure->AdvancedSearch->SearchValue = @$filter["x_DateodProcedure"];
		$this->DateodProcedure->AdvancedSearch->SearchOperator = @$filter["z_DateodProcedure"];
		$this->DateodProcedure->AdvancedSearch->SearchCondition = @$filter["v_DateodProcedure"];
		$this->DateodProcedure->AdvancedSearch->SearchValue2 = @$filter["y_DateodProcedure"];
		$this->DateodProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_DateodProcedure"];
		$this->DateodProcedure->AdvancedSearch->save();

		// Field Miscarriage
		$this->Miscarriage->AdvancedSearch->SearchValue = @$filter["x_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchOperator = @$filter["z_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchCondition = @$filter["v_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchValue2 = @$filter["y_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->SearchOperator2 = @$filter["w_Miscarriage"];
		$this->Miscarriage->AdvancedSearch->save();

		// Field ModeOfDelivery
		$this->ModeOfDelivery->AdvancedSearch->SearchValue = @$filter["x_ModeOfDelivery"];
		$this->ModeOfDelivery->AdvancedSearch->SearchOperator = @$filter["z_ModeOfDelivery"];
		$this->ModeOfDelivery->AdvancedSearch->SearchCondition = @$filter["v_ModeOfDelivery"];
		$this->ModeOfDelivery->AdvancedSearch->SearchValue2 = @$filter["y_ModeOfDelivery"];
		$this->ModeOfDelivery->AdvancedSearch->SearchOperator2 = @$filter["w_ModeOfDelivery"];
		$this->ModeOfDelivery->AdvancedSearch->save();

		// Field ND
		$this->ND->AdvancedSearch->SearchValue = @$filter["x_ND"];
		$this->ND->AdvancedSearch->SearchOperator = @$filter["z_ND"];
		$this->ND->AdvancedSearch->SearchCondition = @$filter["v_ND"];
		$this->ND->AdvancedSearch->SearchValue2 = @$filter["y_ND"];
		$this->ND->AdvancedSearch->SearchOperator2 = @$filter["w_ND"];
		$this->ND->AdvancedSearch->save();

		// Field NDS
		$this->NDS->AdvancedSearch->SearchValue = @$filter["x_NDS"];
		$this->NDS->AdvancedSearch->SearchOperator = @$filter["z_NDS"];
		$this->NDS->AdvancedSearch->SearchCondition = @$filter["v_NDS"];
		$this->NDS->AdvancedSearch->SearchValue2 = @$filter["y_NDS"];
		$this->NDS->AdvancedSearch->SearchOperator2 = @$filter["w_NDS"];
		$this->NDS->AdvancedSearch->save();

		// Field NDP
		$this->NDP->AdvancedSearch->SearchValue = @$filter["x_NDP"];
		$this->NDP->AdvancedSearch->SearchOperator = @$filter["z_NDP"];
		$this->NDP->AdvancedSearch->SearchCondition = @$filter["v_NDP"];
		$this->NDP->AdvancedSearch->SearchValue2 = @$filter["y_NDP"];
		$this->NDP->AdvancedSearch->SearchOperator2 = @$filter["w_NDP"];
		$this->NDP->AdvancedSearch->save();

		// Field Vaccum
		$this->Vaccum->AdvancedSearch->SearchValue = @$filter["x_Vaccum"];
		$this->Vaccum->AdvancedSearch->SearchOperator = @$filter["z_Vaccum"];
		$this->Vaccum->AdvancedSearch->SearchCondition = @$filter["v_Vaccum"];
		$this->Vaccum->AdvancedSearch->SearchValue2 = @$filter["y_Vaccum"];
		$this->Vaccum->AdvancedSearch->SearchOperator2 = @$filter["w_Vaccum"];
		$this->Vaccum->AdvancedSearch->save();

		// Field VaccumS
		$this->VaccumS->AdvancedSearch->SearchValue = @$filter["x_VaccumS"];
		$this->VaccumS->AdvancedSearch->SearchOperator = @$filter["z_VaccumS"];
		$this->VaccumS->AdvancedSearch->SearchCondition = @$filter["v_VaccumS"];
		$this->VaccumS->AdvancedSearch->SearchValue2 = @$filter["y_VaccumS"];
		$this->VaccumS->AdvancedSearch->SearchOperator2 = @$filter["w_VaccumS"];
		$this->VaccumS->AdvancedSearch->save();

		// Field VaccumP
		$this->VaccumP->AdvancedSearch->SearchValue = @$filter["x_VaccumP"];
		$this->VaccumP->AdvancedSearch->SearchOperator = @$filter["z_VaccumP"];
		$this->VaccumP->AdvancedSearch->SearchCondition = @$filter["v_VaccumP"];
		$this->VaccumP->AdvancedSearch->SearchValue2 = @$filter["y_VaccumP"];
		$this->VaccumP->AdvancedSearch->SearchOperator2 = @$filter["w_VaccumP"];
		$this->VaccumP->AdvancedSearch->save();

		// Field Forceps
		$this->Forceps->AdvancedSearch->SearchValue = @$filter["x_Forceps"];
		$this->Forceps->AdvancedSearch->SearchOperator = @$filter["z_Forceps"];
		$this->Forceps->AdvancedSearch->SearchCondition = @$filter["v_Forceps"];
		$this->Forceps->AdvancedSearch->SearchValue2 = @$filter["y_Forceps"];
		$this->Forceps->AdvancedSearch->SearchOperator2 = @$filter["w_Forceps"];
		$this->Forceps->AdvancedSearch->save();

		// Field ForcepsS
		$this->ForcepsS->AdvancedSearch->SearchValue = @$filter["x_ForcepsS"];
		$this->ForcepsS->AdvancedSearch->SearchOperator = @$filter["z_ForcepsS"];
		$this->ForcepsS->AdvancedSearch->SearchCondition = @$filter["v_ForcepsS"];
		$this->ForcepsS->AdvancedSearch->SearchValue2 = @$filter["y_ForcepsS"];
		$this->ForcepsS->AdvancedSearch->SearchOperator2 = @$filter["w_ForcepsS"];
		$this->ForcepsS->AdvancedSearch->save();

		// Field ForcepsP
		$this->ForcepsP->AdvancedSearch->SearchValue = @$filter["x_ForcepsP"];
		$this->ForcepsP->AdvancedSearch->SearchOperator = @$filter["z_ForcepsP"];
		$this->ForcepsP->AdvancedSearch->SearchCondition = @$filter["v_ForcepsP"];
		$this->ForcepsP->AdvancedSearch->SearchValue2 = @$filter["y_ForcepsP"];
		$this->ForcepsP->AdvancedSearch->SearchOperator2 = @$filter["w_ForcepsP"];
		$this->ForcepsP->AdvancedSearch->save();

		// Field Elective
		$this->Elective->AdvancedSearch->SearchValue = @$filter["x_Elective"];
		$this->Elective->AdvancedSearch->SearchOperator = @$filter["z_Elective"];
		$this->Elective->AdvancedSearch->SearchCondition = @$filter["v_Elective"];
		$this->Elective->AdvancedSearch->SearchValue2 = @$filter["y_Elective"];
		$this->Elective->AdvancedSearch->SearchOperator2 = @$filter["w_Elective"];
		$this->Elective->AdvancedSearch->save();

		// Field ElectiveS
		$this->ElectiveS->AdvancedSearch->SearchValue = @$filter["x_ElectiveS"];
		$this->ElectiveS->AdvancedSearch->SearchOperator = @$filter["z_ElectiveS"];
		$this->ElectiveS->AdvancedSearch->SearchCondition = @$filter["v_ElectiveS"];
		$this->ElectiveS->AdvancedSearch->SearchValue2 = @$filter["y_ElectiveS"];
		$this->ElectiveS->AdvancedSearch->SearchOperator2 = @$filter["w_ElectiveS"];
		$this->ElectiveS->AdvancedSearch->save();

		// Field ElectiveP
		$this->ElectiveP->AdvancedSearch->SearchValue = @$filter["x_ElectiveP"];
		$this->ElectiveP->AdvancedSearch->SearchOperator = @$filter["z_ElectiveP"];
		$this->ElectiveP->AdvancedSearch->SearchCondition = @$filter["v_ElectiveP"];
		$this->ElectiveP->AdvancedSearch->SearchValue2 = @$filter["y_ElectiveP"];
		$this->ElectiveP->AdvancedSearch->SearchOperator2 = @$filter["w_ElectiveP"];
		$this->ElectiveP->AdvancedSearch->save();

		// Field Emergency
		$this->Emergency->AdvancedSearch->SearchValue = @$filter["x_Emergency"];
		$this->Emergency->AdvancedSearch->SearchOperator = @$filter["z_Emergency"];
		$this->Emergency->AdvancedSearch->SearchCondition = @$filter["v_Emergency"];
		$this->Emergency->AdvancedSearch->SearchValue2 = @$filter["y_Emergency"];
		$this->Emergency->AdvancedSearch->SearchOperator2 = @$filter["w_Emergency"];
		$this->Emergency->AdvancedSearch->save();

		// Field EmergencyS
		$this->EmergencyS->AdvancedSearch->SearchValue = @$filter["x_EmergencyS"];
		$this->EmergencyS->AdvancedSearch->SearchOperator = @$filter["z_EmergencyS"];
		$this->EmergencyS->AdvancedSearch->SearchCondition = @$filter["v_EmergencyS"];
		$this->EmergencyS->AdvancedSearch->SearchValue2 = @$filter["y_EmergencyS"];
		$this->EmergencyS->AdvancedSearch->SearchOperator2 = @$filter["w_EmergencyS"];
		$this->EmergencyS->AdvancedSearch->save();

		// Field EmergencyP
		$this->EmergencyP->AdvancedSearch->SearchValue = @$filter["x_EmergencyP"];
		$this->EmergencyP->AdvancedSearch->SearchOperator = @$filter["z_EmergencyP"];
		$this->EmergencyP->AdvancedSearch->SearchCondition = @$filter["v_EmergencyP"];
		$this->EmergencyP->AdvancedSearch->SearchValue2 = @$filter["y_EmergencyP"];
		$this->EmergencyP->AdvancedSearch->SearchOperator2 = @$filter["w_EmergencyP"];
		$this->EmergencyP->AdvancedSearch->save();

		// Field Maturity
		$this->Maturity->AdvancedSearch->SearchValue = @$filter["x_Maturity"];
		$this->Maturity->AdvancedSearch->SearchOperator = @$filter["z_Maturity"];
		$this->Maturity->AdvancedSearch->SearchCondition = @$filter["v_Maturity"];
		$this->Maturity->AdvancedSearch->SearchValue2 = @$filter["y_Maturity"];
		$this->Maturity->AdvancedSearch->SearchOperator2 = @$filter["w_Maturity"];
		$this->Maturity->AdvancedSearch->save();

		// Field Baby1
		$this->Baby1->AdvancedSearch->SearchValue = @$filter["x_Baby1"];
		$this->Baby1->AdvancedSearch->SearchOperator = @$filter["z_Baby1"];
		$this->Baby1->AdvancedSearch->SearchCondition = @$filter["v_Baby1"];
		$this->Baby1->AdvancedSearch->SearchValue2 = @$filter["y_Baby1"];
		$this->Baby1->AdvancedSearch->SearchOperator2 = @$filter["w_Baby1"];
		$this->Baby1->AdvancedSearch->save();

		// Field Baby2
		$this->Baby2->AdvancedSearch->SearchValue = @$filter["x_Baby2"];
		$this->Baby2->AdvancedSearch->SearchOperator = @$filter["z_Baby2"];
		$this->Baby2->AdvancedSearch->SearchCondition = @$filter["v_Baby2"];
		$this->Baby2->AdvancedSearch->SearchValue2 = @$filter["y_Baby2"];
		$this->Baby2->AdvancedSearch->SearchOperator2 = @$filter["w_Baby2"];
		$this->Baby2->AdvancedSearch->save();

		// Field sex1
		$this->sex1->AdvancedSearch->SearchValue = @$filter["x_sex1"];
		$this->sex1->AdvancedSearch->SearchOperator = @$filter["z_sex1"];
		$this->sex1->AdvancedSearch->SearchCondition = @$filter["v_sex1"];
		$this->sex1->AdvancedSearch->SearchValue2 = @$filter["y_sex1"];
		$this->sex1->AdvancedSearch->SearchOperator2 = @$filter["w_sex1"];
		$this->sex1->AdvancedSearch->save();

		// Field sex2
		$this->sex2->AdvancedSearch->SearchValue = @$filter["x_sex2"];
		$this->sex2->AdvancedSearch->SearchOperator = @$filter["z_sex2"];
		$this->sex2->AdvancedSearch->SearchCondition = @$filter["v_sex2"];
		$this->sex2->AdvancedSearch->SearchValue2 = @$filter["y_sex2"];
		$this->sex2->AdvancedSearch->SearchOperator2 = @$filter["w_sex2"];
		$this->sex2->AdvancedSearch->save();

		// Field weight1
		$this->weight1->AdvancedSearch->SearchValue = @$filter["x_weight1"];
		$this->weight1->AdvancedSearch->SearchOperator = @$filter["z_weight1"];
		$this->weight1->AdvancedSearch->SearchCondition = @$filter["v_weight1"];
		$this->weight1->AdvancedSearch->SearchValue2 = @$filter["y_weight1"];
		$this->weight1->AdvancedSearch->SearchOperator2 = @$filter["w_weight1"];
		$this->weight1->AdvancedSearch->save();

		// Field weight2
		$this->weight2->AdvancedSearch->SearchValue = @$filter["x_weight2"];
		$this->weight2->AdvancedSearch->SearchOperator = @$filter["z_weight2"];
		$this->weight2->AdvancedSearch->SearchCondition = @$filter["v_weight2"];
		$this->weight2->AdvancedSearch->SearchValue2 = @$filter["y_weight2"];
		$this->weight2->AdvancedSearch->SearchOperator2 = @$filter["w_weight2"];
		$this->weight2->AdvancedSearch->save();

		// Field NICU1
		$this->NICU1->AdvancedSearch->SearchValue = @$filter["x_NICU1"];
		$this->NICU1->AdvancedSearch->SearchOperator = @$filter["z_NICU1"];
		$this->NICU1->AdvancedSearch->SearchCondition = @$filter["v_NICU1"];
		$this->NICU1->AdvancedSearch->SearchValue2 = @$filter["y_NICU1"];
		$this->NICU1->AdvancedSearch->SearchOperator2 = @$filter["w_NICU1"];
		$this->NICU1->AdvancedSearch->save();

		// Field NICU2
		$this->NICU2->AdvancedSearch->SearchValue = @$filter["x_NICU2"];
		$this->NICU2->AdvancedSearch->SearchOperator = @$filter["z_NICU2"];
		$this->NICU2->AdvancedSearch->SearchCondition = @$filter["v_NICU2"];
		$this->NICU2->AdvancedSearch->SearchValue2 = @$filter["y_NICU2"];
		$this->NICU2->AdvancedSearch->SearchOperator2 = @$filter["w_NICU2"];
		$this->NICU2->AdvancedSearch->save();

		// Field Jaundice1
		$this->Jaundice1->AdvancedSearch->SearchValue = @$filter["x_Jaundice1"];
		$this->Jaundice1->AdvancedSearch->SearchOperator = @$filter["z_Jaundice1"];
		$this->Jaundice1->AdvancedSearch->SearchCondition = @$filter["v_Jaundice1"];
		$this->Jaundice1->AdvancedSearch->SearchValue2 = @$filter["y_Jaundice1"];
		$this->Jaundice1->AdvancedSearch->SearchOperator2 = @$filter["w_Jaundice1"];
		$this->Jaundice1->AdvancedSearch->save();

		// Field Jaundice2
		$this->Jaundice2->AdvancedSearch->SearchValue = @$filter["x_Jaundice2"];
		$this->Jaundice2->AdvancedSearch->SearchOperator = @$filter["z_Jaundice2"];
		$this->Jaundice2->AdvancedSearch->SearchCondition = @$filter["v_Jaundice2"];
		$this->Jaundice2->AdvancedSearch->SearchValue2 = @$filter["y_Jaundice2"];
		$this->Jaundice2->AdvancedSearch->SearchOperator2 = @$filter["w_Jaundice2"];
		$this->Jaundice2->AdvancedSearch->save();

		// Field Others1
		$this->Others1->AdvancedSearch->SearchValue = @$filter["x_Others1"];
		$this->Others1->AdvancedSearch->SearchOperator = @$filter["z_Others1"];
		$this->Others1->AdvancedSearch->SearchCondition = @$filter["v_Others1"];
		$this->Others1->AdvancedSearch->SearchValue2 = @$filter["y_Others1"];
		$this->Others1->AdvancedSearch->SearchOperator2 = @$filter["w_Others1"];
		$this->Others1->AdvancedSearch->save();

		// Field Others2
		$this->Others2->AdvancedSearch->SearchValue = @$filter["x_Others2"];
		$this->Others2->AdvancedSearch->SearchOperator = @$filter["z_Others2"];
		$this->Others2->AdvancedSearch->SearchCondition = @$filter["v_Others2"];
		$this->Others2->AdvancedSearch->SearchValue2 = @$filter["y_Others2"];
		$this->Others2->AdvancedSearch->SearchOperator2 = @$filter["w_Others2"];
		$this->Others2->AdvancedSearch->save();

		// Field SpillOverReasons
		$this->SpillOverReasons->AdvancedSearch->SearchValue = @$filter["x_SpillOverReasons"];
		$this->SpillOverReasons->AdvancedSearch->SearchOperator = @$filter["z_SpillOverReasons"];
		$this->SpillOverReasons->AdvancedSearch->SearchCondition = @$filter["v_SpillOverReasons"];
		$this->SpillOverReasons->AdvancedSearch->SearchValue2 = @$filter["y_SpillOverReasons"];
		$this->SpillOverReasons->AdvancedSearch->SearchOperator2 = @$filter["w_SpillOverReasons"];
		$this->SpillOverReasons->AdvancedSearch->save();

		// Field ANClosed
		$this->ANClosed->AdvancedSearch->SearchValue = @$filter["x_ANClosed"];
		$this->ANClosed->AdvancedSearch->SearchOperator = @$filter["z_ANClosed"];
		$this->ANClosed->AdvancedSearch->SearchCondition = @$filter["v_ANClosed"];
		$this->ANClosed->AdvancedSearch->SearchValue2 = @$filter["y_ANClosed"];
		$this->ANClosed->AdvancedSearch->SearchOperator2 = @$filter["w_ANClosed"];
		$this->ANClosed->AdvancedSearch->save();

		// Field ANClosedDATE
		$this->ANClosedDATE->AdvancedSearch->SearchValue = @$filter["x_ANClosedDATE"];
		$this->ANClosedDATE->AdvancedSearch->SearchOperator = @$filter["z_ANClosedDATE"];
		$this->ANClosedDATE->AdvancedSearch->SearchCondition = @$filter["v_ANClosedDATE"];
		$this->ANClosedDATE->AdvancedSearch->SearchValue2 = @$filter["y_ANClosedDATE"];
		$this->ANClosedDATE->AdvancedSearch->SearchOperator2 = @$filter["w_ANClosedDATE"];
		$this->ANClosedDATE->AdvancedSearch->save();

		// Field PastMedicalHistoryOthers
		$this->PastMedicalHistoryOthers->AdvancedSearch->SearchValue = @$filter["x_PastMedicalHistoryOthers"];
		$this->PastMedicalHistoryOthers->AdvancedSearch->SearchOperator = @$filter["z_PastMedicalHistoryOthers"];
		$this->PastMedicalHistoryOthers->AdvancedSearch->SearchCondition = @$filter["v_PastMedicalHistoryOthers"];
		$this->PastMedicalHistoryOthers->AdvancedSearch->SearchValue2 = @$filter["y_PastMedicalHistoryOthers"];
		$this->PastMedicalHistoryOthers->AdvancedSearch->SearchOperator2 = @$filter["w_PastMedicalHistoryOthers"];
		$this->PastMedicalHistoryOthers->AdvancedSearch->save();

		// Field PastSurgicalHistoryOthers
		$this->PastSurgicalHistoryOthers->AdvancedSearch->SearchValue = @$filter["x_PastSurgicalHistoryOthers"];
		$this->PastSurgicalHistoryOthers->AdvancedSearch->SearchOperator = @$filter["z_PastSurgicalHistoryOthers"];
		$this->PastSurgicalHistoryOthers->AdvancedSearch->SearchCondition = @$filter["v_PastSurgicalHistoryOthers"];
		$this->PastSurgicalHistoryOthers->AdvancedSearch->SearchValue2 = @$filter["y_PastSurgicalHistoryOthers"];
		$this->PastSurgicalHistoryOthers->AdvancedSearch->SearchOperator2 = @$filter["w_PastSurgicalHistoryOthers"];
		$this->PastSurgicalHistoryOthers->AdvancedSearch->save();

		// Field FamilyHistoryOthers
		$this->FamilyHistoryOthers->AdvancedSearch->SearchValue = @$filter["x_FamilyHistoryOthers"];
		$this->FamilyHistoryOthers->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistoryOthers"];
		$this->FamilyHistoryOthers->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistoryOthers"];
		$this->FamilyHistoryOthers->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistoryOthers"];
		$this->FamilyHistoryOthers->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistoryOthers"];
		$this->FamilyHistoryOthers->AdvancedSearch->save();

		// Field PresentPregnancyComplicationsOthers
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->SearchValue = @$filter["x_PresentPregnancyComplicationsOthers"];
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->SearchOperator = @$filter["z_PresentPregnancyComplicationsOthers"];
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->SearchCondition = @$filter["v_PresentPregnancyComplicationsOthers"];
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->SearchValue2 = @$filter["y_PresentPregnancyComplicationsOthers"];
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->SearchOperator2 = @$filter["w_PresentPregnancyComplicationsOthers"];
		$this->PresentPregnancyComplicationsOthers->AdvancedSearch->save();

		// Field ETdate
		$this->ETdate->AdvancedSearch->SearchValue = @$filter["x_ETdate"];
		$this->ETdate->AdvancedSearch->SearchOperator = @$filter["z_ETdate"];
		$this->ETdate->AdvancedSearch->SearchCondition = @$filter["v_ETdate"];
		$this->ETdate->AdvancedSearch->SearchValue2 = @$filter["y_ETdate"];
		$this->ETdate->AdvancedSearch->SearchOperator2 = @$filter["w_ETdate"];
		$this->ETdate->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->G, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->L, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->M, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LMP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EDO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MenstrualHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaritalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ObstetricHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreviousHistoryofGDM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreviousHistorofPIH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreviousHistoryofIUGR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreviousHistoryofOligohydramnios, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreviousHistoryofPreterm, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->G1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->G2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->G3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeliveryNDLSCS1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeliveryNDLSCS2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeliveryNDLSCS3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BabySexweight1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BabySexweight2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BabySexweight3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PastMedicalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PastSurgicalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FamilyHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Viability, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ViabilityDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ViabilityREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Viability2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Viability2DATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Viability2REPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NTscan, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NTscanDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NTscanREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EarlyTarget, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EarlyTargetDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EarlyTargetREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Anomaly, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnomalyDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnomalyREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Growth, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GrowthDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GrowthREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Growth1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Growth1DATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Growth1REPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANProfile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANProfileDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANProfileINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANProfileREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DualMarker, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DualMarkerDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DualMarkerINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DualMarkerREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Quadruple, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->QuadrupleDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->QuadrupleINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->QuadrupleREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A5month, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A5monthDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A5monthINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A5monthREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A7month, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A7monthDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A7monthINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A7monthREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A9month, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A9monthDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A9monthINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A9monthREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJ, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJINHOUSE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJREPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Bleeding, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Hypothyroidism, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PICMENumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Outcome, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DateofAdmission, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DateodProcedure, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Miscarriage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModeOfDelivery, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ND, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NDS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NDP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Vaccum, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VaccumS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VaccumP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Forceps, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ForcepsS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ForcepsP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Elective, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ElectiveS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ElectiveP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Emergency, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EmergencyS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EmergencyP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Maturity, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Baby1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Baby2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sex1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->sex2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->weight1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->weight2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NICU1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NICU2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Jaundice1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Jaundice2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpillOverReasons, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANClosed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANClosedDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PastMedicalHistoryOthers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PastSurgicalHistoryOthers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FamilyHistoryOthers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PresentPregnancyComplicationsOthers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ETdate, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = []; // Array for SQL parts
		$arCond = []; // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
				$keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = [$keyword];
			}
			foreach ($ar as $keyword) {
				if ($keyword != "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == Config("NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == Config("NOT_NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk != "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] != "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql != "") {
			if ($where != "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword != "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword != "") {
						if ($searchStr != "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, ["", "reset", "resetall"]))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->pid); // pid
			$this->updateSort($this->fid); // fid
			$this->updateSort($this->G); // G
			$this->updateSort($this->P); // P
			$this->updateSort($this->L); // L
			$this->updateSort($this->A); // A
			$this->updateSort($this->E); // E
			$this->updateSort($this->M); // M
			$this->updateSort($this->LMP); // LMP
			$this->updateSort($this->EDO); // EDO
			$this->updateSort($this->MenstrualHistory); // MenstrualHistory
			$this->updateSort($this->MaritalHistory); // MaritalHistory
			$this->updateSort($this->ObstetricHistory); // ObstetricHistory
			$this->updateSort($this->PreviousHistoryofGDM); // PreviousHistoryofGDM
			$this->updateSort($this->PreviousHistorofPIH); // PreviousHistorofPIH
			$this->updateSort($this->PreviousHistoryofIUGR); // PreviousHistoryofIUGR
			$this->updateSort($this->PreviousHistoryofOligohydramnios); // PreviousHistoryofOligohydramnios
			$this->updateSort($this->PreviousHistoryofPreterm); // PreviousHistoryofPreterm
			$this->updateSort($this->G1); // G1
			$this->updateSort($this->G2); // G2
			$this->updateSort($this->G3); // G3
			$this->updateSort($this->DeliveryNDLSCS1); // DeliveryNDLSCS1
			$this->updateSort($this->DeliveryNDLSCS2); // DeliveryNDLSCS2
			$this->updateSort($this->DeliveryNDLSCS3); // DeliveryNDLSCS3
			$this->updateSort($this->BabySexweight1); // BabySexweight1
			$this->updateSort($this->BabySexweight2); // BabySexweight2
			$this->updateSort($this->BabySexweight3); // BabySexweight3
			$this->updateSort($this->PastMedicalHistory); // PastMedicalHistory
			$this->updateSort($this->PastSurgicalHistory); // PastSurgicalHistory
			$this->updateSort($this->FamilyHistory); // FamilyHistory
			$this->updateSort($this->Viability); // Viability
			$this->updateSort($this->ViabilityDATE); // ViabilityDATE
			$this->updateSort($this->ViabilityREPORT); // ViabilityREPORT
			$this->updateSort($this->Viability2); // Viability2
			$this->updateSort($this->Viability2DATE); // Viability2DATE
			$this->updateSort($this->Viability2REPORT); // Viability2REPORT
			$this->updateSort($this->NTscan); // NTscan
			$this->updateSort($this->NTscanDATE); // NTscanDATE
			$this->updateSort($this->NTscanREPORT); // NTscanREPORT
			$this->updateSort($this->EarlyTarget); // EarlyTarget
			$this->updateSort($this->EarlyTargetDATE); // EarlyTargetDATE
			$this->updateSort($this->EarlyTargetREPORT); // EarlyTargetREPORT
			$this->updateSort($this->Anomaly); // Anomaly
			$this->updateSort($this->AnomalyDATE); // AnomalyDATE
			$this->updateSort($this->AnomalyREPORT); // AnomalyREPORT
			$this->updateSort($this->Growth); // Growth
			$this->updateSort($this->GrowthDATE); // GrowthDATE
			$this->updateSort($this->GrowthREPORT); // GrowthREPORT
			$this->updateSort($this->Growth1); // Growth1
			$this->updateSort($this->Growth1DATE); // Growth1DATE
			$this->updateSort($this->Growth1REPORT); // Growth1REPORT
			$this->updateSort($this->ANProfile); // ANProfile
			$this->updateSort($this->ANProfileDATE); // ANProfileDATE
			$this->updateSort($this->ANProfileINHOUSE); // ANProfileINHOUSE
			$this->updateSort($this->ANProfileREPORT); // ANProfileREPORT
			$this->updateSort($this->DualMarker); // DualMarker
			$this->updateSort($this->DualMarkerDATE); // DualMarkerDATE
			$this->updateSort($this->DualMarkerINHOUSE); // DualMarkerINHOUSE
			$this->updateSort($this->DualMarkerREPORT); // DualMarkerREPORT
			$this->updateSort($this->Quadruple); // Quadruple
			$this->updateSort($this->QuadrupleDATE); // QuadrupleDATE
			$this->updateSort($this->QuadrupleINHOUSE); // QuadrupleINHOUSE
			$this->updateSort($this->QuadrupleREPORT); // QuadrupleREPORT
			$this->updateSort($this->A5month); // A5month
			$this->updateSort($this->A5monthDATE); // A5monthDATE
			$this->updateSort($this->A5monthINHOUSE); // A5monthINHOUSE
			$this->updateSort($this->A5monthREPORT); // A5monthREPORT
			$this->updateSort($this->A7month); // A7month
			$this->updateSort($this->A7monthDATE); // A7monthDATE
			$this->updateSort($this->A7monthINHOUSE); // A7monthINHOUSE
			$this->updateSort($this->A7monthREPORT); // A7monthREPORT
			$this->updateSort($this->A9month); // A9month
			$this->updateSort($this->A9monthDATE); // A9monthDATE
			$this->updateSort($this->A9monthINHOUSE); // A9monthINHOUSE
			$this->updateSort($this->A9monthREPORT); // A9monthREPORT
			$this->updateSort($this->INJ); // INJ
			$this->updateSort($this->INJDATE); // INJDATE
			$this->updateSort($this->INJINHOUSE); // INJINHOUSE
			$this->updateSort($this->INJREPORT); // INJREPORT
			$this->updateSort($this->Bleeding); // Bleeding
			$this->updateSort($this->Hypothyroidism); // Hypothyroidism
			$this->updateSort($this->PICMENumber); // PICMENumber
			$this->updateSort($this->Outcome); // Outcome
			$this->updateSort($this->DateofAdmission); // DateofAdmission
			$this->updateSort($this->DateodProcedure); // DateodProcedure
			$this->updateSort($this->Miscarriage); // Miscarriage
			$this->updateSort($this->ModeOfDelivery); // ModeOfDelivery
			$this->updateSort($this->ND); // ND
			$this->updateSort($this->NDS); // NDS
			$this->updateSort($this->NDP); // NDP
			$this->updateSort($this->Vaccum); // Vaccum
			$this->updateSort($this->VaccumS); // VaccumS
			$this->updateSort($this->VaccumP); // VaccumP
			$this->updateSort($this->Forceps); // Forceps
			$this->updateSort($this->ForcepsS); // ForcepsS
			$this->updateSort($this->ForcepsP); // ForcepsP
			$this->updateSort($this->Elective); // Elective
			$this->updateSort($this->ElectiveS); // ElectiveS
			$this->updateSort($this->ElectiveP); // ElectiveP
			$this->updateSort($this->Emergency); // Emergency
			$this->updateSort($this->EmergencyS); // EmergencyS
			$this->updateSort($this->EmergencyP); // EmergencyP
			$this->updateSort($this->Maturity); // Maturity
			$this->updateSort($this->Baby1); // Baby1
			$this->updateSort($this->Baby2); // Baby2
			$this->updateSort($this->sex1); // sex1
			$this->updateSort($this->sex2); // sex2
			$this->updateSort($this->weight1); // weight1
			$this->updateSort($this->weight2); // weight2
			$this->updateSort($this->NICU1); // NICU1
			$this->updateSort($this->NICU2); // NICU2
			$this->updateSort($this->Jaundice1); // Jaundice1
			$this->updateSort($this->Jaundice2); // Jaundice2
			$this->updateSort($this->Others1); // Others1
			$this->updateSort($this->Others2); // Others2
			$this->updateSort($this->SpillOverReasons); // SpillOverReasons
			$this->updateSort($this->ANClosed); // ANClosed
			$this->updateSort($this->ANClosedDATE); // ANClosedDATE
			$this->updateSort($this->PastMedicalHistoryOthers); // PastMedicalHistoryOthers
			$this->updateSort($this->PastSurgicalHistoryOthers); // PastSurgicalHistoryOthers
			$this->updateSort($this->FamilyHistoryOthers); // FamilyHistoryOthers
			$this->updateSort($this->PresentPregnancyComplicationsOthers); // PresentPregnancyComplicationsOthers
			$this->updateSort($this->ETdate); // ETdate
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

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

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
				$this->id->setSort("");
				$this->pid->setSort("");
				$this->fid->setSort("");
				$this->G->setSort("");
				$this->P->setSort("");
				$this->L->setSort("");
				$this->A->setSort("");
				$this->E->setSort("");
				$this->M->setSort("");
				$this->LMP->setSort("");
				$this->EDO->setSort("");
				$this->MenstrualHistory->setSort("");
				$this->MaritalHistory->setSort("");
				$this->ObstetricHistory->setSort("");
				$this->PreviousHistoryofGDM->setSort("");
				$this->PreviousHistorofPIH->setSort("");
				$this->PreviousHistoryofIUGR->setSort("");
				$this->PreviousHistoryofOligohydramnios->setSort("");
				$this->PreviousHistoryofPreterm->setSort("");
				$this->G1->setSort("");
				$this->G2->setSort("");
				$this->G3->setSort("");
				$this->DeliveryNDLSCS1->setSort("");
				$this->DeliveryNDLSCS2->setSort("");
				$this->DeliveryNDLSCS3->setSort("");
				$this->BabySexweight1->setSort("");
				$this->BabySexweight2->setSort("");
				$this->BabySexweight3->setSort("");
				$this->PastMedicalHistory->setSort("");
				$this->PastSurgicalHistory->setSort("");
				$this->FamilyHistory->setSort("");
				$this->Viability->setSort("");
				$this->ViabilityDATE->setSort("");
				$this->ViabilityREPORT->setSort("");
				$this->Viability2->setSort("");
				$this->Viability2DATE->setSort("");
				$this->Viability2REPORT->setSort("");
				$this->NTscan->setSort("");
				$this->NTscanDATE->setSort("");
				$this->NTscanREPORT->setSort("");
				$this->EarlyTarget->setSort("");
				$this->EarlyTargetDATE->setSort("");
				$this->EarlyTargetREPORT->setSort("");
				$this->Anomaly->setSort("");
				$this->AnomalyDATE->setSort("");
				$this->AnomalyREPORT->setSort("");
				$this->Growth->setSort("");
				$this->GrowthDATE->setSort("");
				$this->GrowthREPORT->setSort("");
				$this->Growth1->setSort("");
				$this->Growth1DATE->setSort("");
				$this->Growth1REPORT->setSort("");
				$this->ANProfile->setSort("");
				$this->ANProfileDATE->setSort("");
				$this->ANProfileINHOUSE->setSort("");
				$this->ANProfileREPORT->setSort("");
				$this->DualMarker->setSort("");
				$this->DualMarkerDATE->setSort("");
				$this->DualMarkerINHOUSE->setSort("");
				$this->DualMarkerREPORT->setSort("");
				$this->Quadruple->setSort("");
				$this->QuadrupleDATE->setSort("");
				$this->QuadrupleINHOUSE->setSort("");
				$this->QuadrupleREPORT->setSort("");
				$this->A5month->setSort("");
				$this->A5monthDATE->setSort("");
				$this->A5monthINHOUSE->setSort("");
				$this->A5monthREPORT->setSort("");
				$this->A7month->setSort("");
				$this->A7monthDATE->setSort("");
				$this->A7monthINHOUSE->setSort("");
				$this->A7monthREPORT->setSort("");
				$this->A9month->setSort("");
				$this->A9monthDATE->setSort("");
				$this->A9monthINHOUSE->setSort("");
				$this->A9monthREPORT->setSort("");
				$this->INJ->setSort("");
				$this->INJDATE->setSort("");
				$this->INJINHOUSE->setSort("");
				$this->INJREPORT->setSort("");
				$this->Bleeding->setSort("");
				$this->Hypothyroidism->setSort("");
				$this->PICMENumber->setSort("");
				$this->Outcome->setSort("");
				$this->DateofAdmission->setSort("");
				$this->DateodProcedure->setSort("");
				$this->Miscarriage->setSort("");
				$this->ModeOfDelivery->setSort("");
				$this->ND->setSort("");
				$this->NDS->setSort("");
				$this->NDP->setSort("");
				$this->Vaccum->setSort("");
				$this->VaccumS->setSort("");
				$this->VaccumP->setSort("");
				$this->Forceps->setSort("");
				$this->ForcepsS->setSort("");
				$this->ForcepsP->setSort("");
				$this->Elective->setSort("");
				$this->ElectiveS->setSort("");
				$this->ElectiveP->setSort("");
				$this->Emergency->setSort("");
				$this->EmergencyS->setSort("");
				$this->EmergencyP->setSort("");
				$this->Maturity->setSort("");
				$this->Baby1->setSort("");
				$this->Baby2->setSort("");
				$this->sex1->setSort("");
				$this->sex2->setSort("");
				$this->weight1->setSort("");
				$this->weight2->setSort("");
				$this->NICU1->setSort("");
				$this->NICU2->setSort("");
				$this->Jaundice1->setSort("");
				$this->Jaundice2->setSort("");
				$this->Others1->setSort("");
				$this->Others2->setSort("");
				$this->SpillOverReasons->setSort("");
				$this->ANClosed->setSort("");
				$this->ANClosedDATE->setSort("");
				$this->PastMedicalHistoryOthers->setSort("");
				$this->PastSurgicalHistoryOthers->setSort("");
				$this->FamilyHistoryOthers->setSort("");
				$this->PresentPregnancyComplicationsOthers->setSort("");
				$this->ETdate->setSort("");
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

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = TRUE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
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

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = TRUE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_an_registrationlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_an_registrationlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpatient_an_registrationlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
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
		$row = [];
		$row['id'] = NULL;
		$row['pid'] = NULL;
		$row['fid'] = NULL;
		$row['G'] = NULL;
		$row['P'] = NULL;
		$row['L'] = NULL;
		$row['A'] = NULL;
		$row['E'] = NULL;
		$row['M'] = NULL;
		$row['LMP'] = NULL;
		$row['EDO'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['MaritalHistory'] = NULL;
		$row['ObstetricHistory'] = NULL;
		$row['PreviousHistoryofGDM'] = NULL;
		$row['PreviousHistorofPIH'] = NULL;
		$row['PreviousHistoryofIUGR'] = NULL;
		$row['PreviousHistoryofOligohydramnios'] = NULL;
		$row['PreviousHistoryofPreterm'] = NULL;
		$row['G1'] = NULL;
		$row['G2'] = NULL;
		$row['G3'] = NULL;
		$row['DeliveryNDLSCS1'] = NULL;
		$row['DeliveryNDLSCS2'] = NULL;
		$row['DeliveryNDLSCS3'] = NULL;
		$row['BabySexweight1'] = NULL;
		$row['BabySexweight2'] = NULL;
		$row['BabySexweight3'] = NULL;
		$row['PastMedicalHistory'] = NULL;
		$row['PastSurgicalHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['Viability'] = NULL;
		$row['ViabilityDATE'] = NULL;
		$row['ViabilityREPORT'] = NULL;
		$row['Viability2'] = NULL;
		$row['Viability2DATE'] = NULL;
		$row['Viability2REPORT'] = NULL;
		$row['NTscan'] = NULL;
		$row['NTscanDATE'] = NULL;
		$row['NTscanREPORT'] = NULL;
		$row['EarlyTarget'] = NULL;
		$row['EarlyTargetDATE'] = NULL;
		$row['EarlyTargetREPORT'] = NULL;
		$row['Anomaly'] = NULL;
		$row['AnomalyDATE'] = NULL;
		$row['AnomalyREPORT'] = NULL;
		$row['Growth'] = NULL;
		$row['GrowthDATE'] = NULL;
		$row['GrowthREPORT'] = NULL;
		$row['Growth1'] = NULL;
		$row['Growth1DATE'] = NULL;
		$row['Growth1REPORT'] = NULL;
		$row['ANProfile'] = NULL;
		$row['ANProfileDATE'] = NULL;
		$row['ANProfileINHOUSE'] = NULL;
		$row['ANProfileREPORT'] = NULL;
		$row['DualMarker'] = NULL;
		$row['DualMarkerDATE'] = NULL;
		$row['DualMarkerINHOUSE'] = NULL;
		$row['DualMarkerREPORT'] = NULL;
		$row['Quadruple'] = NULL;
		$row['QuadrupleDATE'] = NULL;
		$row['QuadrupleINHOUSE'] = NULL;
		$row['QuadrupleREPORT'] = NULL;
		$row['A5month'] = NULL;
		$row['A5monthDATE'] = NULL;
		$row['A5monthINHOUSE'] = NULL;
		$row['A5monthREPORT'] = NULL;
		$row['A7month'] = NULL;
		$row['A7monthDATE'] = NULL;
		$row['A7monthINHOUSE'] = NULL;
		$row['A7monthREPORT'] = NULL;
		$row['A9month'] = NULL;
		$row['A9monthDATE'] = NULL;
		$row['A9monthINHOUSE'] = NULL;
		$row['A9monthREPORT'] = NULL;
		$row['INJ'] = NULL;
		$row['INJDATE'] = NULL;
		$row['INJINHOUSE'] = NULL;
		$row['INJREPORT'] = NULL;
		$row['Bleeding'] = NULL;
		$row['Hypothyroidism'] = NULL;
		$row['PICMENumber'] = NULL;
		$row['Outcome'] = NULL;
		$row['DateofAdmission'] = NULL;
		$row['DateodProcedure'] = NULL;
		$row['Miscarriage'] = NULL;
		$row['ModeOfDelivery'] = NULL;
		$row['ND'] = NULL;
		$row['NDS'] = NULL;
		$row['NDP'] = NULL;
		$row['Vaccum'] = NULL;
		$row['VaccumS'] = NULL;
		$row['VaccumP'] = NULL;
		$row['Forceps'] = NULL;
		$row['ForcepsS'] = NULL;
		$row['ForcepsP'] = NULL;
		$row['Elective'] = NULL;
		$row['ElectiveS'] = NULL;
		$row['ElectiveP'] = NULL;
		$row['Emergency'] = NULL;
		$row['EmergencyS'] = NULL;
		$row['EmergencyP'] = NULL;
		$row['Maturity'] = NULL;
		$row['Baby1'] = NULL;
		$row['Baby2'] = NULL;
		$row['sex1'] = NULL;
		$row['sex2'] = NULL;
		$row['weight1'] = NULL;
		$row['weight2'] = NULL;
		$row['NICU1'] = NULL;
		$row['NICU2'] = NULL;
		$row['Jaundice1'] = NULL;
		$row['Jaundice2'] = NULL;
		$row['Others1'] = NULL;
		$row['Others2'] = NULL;
		$row['SpillOverReasons'] = NULL;
		$row['ANClosed'] = NULL;
		$row['ANClosedDATE'] = NULL;
		$row['PastMedicalHistoryOthers'] = NULL;
		$row['PastSurgicalHistoryOthers'] = NULL;
		$row['FamilyHistoryOthers'] = NULL;
		$row['PresentPregnancyComplicationsOthers'] = NULL;
		$row['ETdate'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

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
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_an_registrationlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_an_registrationlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_an_registrationlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_patient_an_registration" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_an_registration\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_an_registrationlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = TRUE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = TRUE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = TRUE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = TRUE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = TRUE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = TRUE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_an_registrationlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();

		// Export master record
		if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "patient_opd_follow_up") {
			global $patient_opd_follow_up;
			if (!isset($patient_opd_follow_up))
				$patient_opd_follow_up = new patient_opd_follow_up();
			$rsmaster = $patient_opd_follow_up->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
					$doc->Table = &$patient_opd_follow_up;
					$patient_opd_follow_up->exportDocument($doc, $rsmaster);
					$doc->exportEmptyRow();
					$doc->Table = &$this;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsmaster->close();
			}
		}
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {
			if ($return)
				return $doc->Text; // Return email content
			else
				echo $this->exportEmail($doc->Text); // Send email
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Export email
	protected function exportEmail($emailContent)
	{
		global $TempImages, $Language;
		$sender = Post("sender", "");
		$recipient = Post("recipient", "");
		$cc = Post("cc", "");
		$bcc = Post("bcc", "");

		// Subject
		$subject = Post("subject", "");
		$emailSubject = $subject;

		// Message
		$content = Post("message", "");
		$emailMessage = $content;

		// Check sender
		if ($sender == "") {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterSenderEmail") . "</p>";
		}
		if (!CheckEmail($sender)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
		}

		// Check recipient
		if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
		}

		// Check cc
		if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
		}

		// Check bcc
		if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
		}

		// Check email sent count
		if (!isset($_SESSION[Config("EXPORT_EMAIL_COUNTER")]))
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")] = 0;
		if ((int)$_SESSION[Config("EXPORT_EMAIL_COUNTER")] > Config("MAX_EMAIL_SENT_COUNT")) {
			return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Format = "html";
		if ($emailMessage != "")
			$emailMessage = RemoveXss($emailMessage) . "<br><br>";
		foreach ($TempImages as $tmpImage)
			$email->addEmbeddedImage($tmpImage);
		$email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
		$eventArgs = [];
		if ($this->Recordset)
			$eventArgs["rs"] = &$this->Recordset;
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();

		// Check email sent status
		if ($emailSent) {

			// Update email sent count
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

			// Sent email success
			return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
		} else {

			// Sent email failure
			return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
		}
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "patient_opd_follow_up") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("fid"))) !== NULL) {
					$GLOBALS["patient_opd_follow_up"]->id->setQueryStringValue($parm);
					$this->fid->setQueryStringValue($GLOBALS["patient_opd_follow_up"]->id->QueryStringValue);
					$this->fid->setSessionValue($this->fid->QueryStringValue);
					if (!is_numeric($GLOBALS["patient_opd_follow_up"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_PatientId", Get("pid"))) !== NULL) {
					$GLOBALS["patient_opd_follow_up"]->PatientId->setQueryStringValue($parm);
					$this->pid->setQueryStringValue($GLOBALS["patient_opd_follow_up"]->PatientId->QueryStringValue);
					$this->pid->setSessionValue($this->pid->QueryStringValue);
					if (!is_numeric($GLOBALS["patient_opd_follow_up"]->PatientId->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "patient_opd_follow_up") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("fid"))) !== NULL) {
					$GLOBALS["patient_opd_follow_up"]->id->setFormValue($parm);
					$this->fid->setFormValue($GLOBALS["patient_opd_follow_up"]->id->FormValue);
					$this->fid->setSessionValue($this->fid->FormValue);
					if (!is_numeric($GLOBALS["patient_opd_follow_up"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_PatientId", Post("pid"))) !== NULL) {
					$GLOBALS["patient_opd_follow_up"]->PatientId->setFormValue($parm);
					$this->pid->setFormValue($GLOBALS["patient_opd_follow_up"]->PatientId->FormValue);
					$this->pid->setSessionValue($this->pid->FormValue);
					if (!is_numeric($GLOBALS["patient_opd_follow_up"]->PatientId->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Update URL
			$this->AddUrl = $this->addMasterUrl($this->AddUrl);
			$this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
			$this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
			$this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "patient_opd_follow_up") {
				if ($this->fid->CurrentValue == "")
					$this->fid->setSessionValue("");
				if ($this->pid->CurrentValue == "")
					$this->pid->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
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

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>
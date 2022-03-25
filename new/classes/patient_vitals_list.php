<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_vitals_list extends patient_vitals
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_vitals';

	// Page object name
	public $PageObjName = "patient_vitals_list";

	// Grid form hidden field names
	public $FormName = "fpatient_vitalslist";
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

		// Table object (patient_vitals)
		if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
			$GLOBALS["patient_vitals"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_vitals"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "patient_vitalsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patient_vitalsdelete.php";
		$this->MultiUpdateUrl = "patient_vitalsupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpatient_vitalslistsrch";

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
		global $patient_vitals;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
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
	public $SearchFieldsPerRow = 2; // For extended search
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
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

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

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
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

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_vitalslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
		$filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->HT->AdvancedSearch->toJson(), ","); // Field HT
		$filterList = Concat($filterList, $this->WT->AdvancedSearch->toJson(), ","); // Field WT
		$filterList = Concat($filterList, $this->SurfaceArea->AdvancedSearch->toJson(), ","); // Field SurfaceArea
		$filterList = Concat($filterList, $this->BodyMassIndex->AdvancedSearch->toJson(), ","); // Field BodyMassIndex
		$filterList = Concat($filterList, $this->ClinicalFindings->AdvancedSearch->toJson(), ","); // Field ClinicalFindings
		$filterList = Concat($filterList, $this->ClinicalDiagnosis->AdvancedSearch->toJson(), ","); // Field ClinicalDiagnosis
		$filterList = Concat($filterList, $this->AnticoagulantifAny->AdvancedSearch->toJson(), ","); // Field AnticoagulantifAny
		$filterList = Concat($filterList, $this->FoodAllergies->AdvancedSearch->toJson(), ","); // Field FoodAllergies
		$filterList = Concat($filterList, $this->GenericAllergies->AdvancedSearch->toJson(), ","); // Field GenericAllergies
		$filterList = Concat($filterList, $this->GroupAllergies->AdvancedSearch->toJson(), ","); // Field GroupAllergies
		$filterList = Concat($filterList, $this->Temp->AdvancedSearch->toJson(), ","); // Field Temp
		$filterList = Concat($filterList, $this->Pulse->AdvancedSearch->toJson(), ","); // Field Pulse
		$filterList = Concat($filterList, $this->BP->AdvancedSearch->toJson(), ","); // Field BP
		$filterList = Concat($filterList, $this->PR->AdvancedSearch->toJson(), ","); // Field PR
		$filterList = Concat($filterList, $this->CNS->AdvancedSearch->toJson(), ","); // Field CNS
		$filterList = Concat($filterList, $this->RSA->AdvancedSearch->toJson(), ","); // Field RSA
		$filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
		$filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
		$filterList = Concat($filterList, $this->PS->AdvancedSearch->toJson(), ","); // Field PS
		$filterList = Concat($filterList, $this->PV->AdvancedSearch->toJson(), ","); // Field PV
		$filterList = Concat($filterList, $this->clinicaldetails->AdvancedSearch->toJson(), ","); // Field clinicaldetails
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->PatientSearch->AdvancedSearch->toJson(), ","); // Field PatientSearch
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatient_vitalslistsrch", $filters);
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

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field PatID
		$this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
		$this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
		$this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
		$this->PatID->AdvancedSearch->save();

		// Field MobileNumber
		$this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field HT
		$this->HT->AdvancedSearch->SearchValue = @$filter["x_HT"];
		$this->HT->AdvancedSearch->SearchOperator = @$filter["z_HT"];
		$this->HT->AdvancedSearch->SearchCondition = @$filter["v_HT"];
		$this->HT->AdvancedSearch->SearchValue2 = @$filter["y_HT"];
		$this->HT->AdvancedSearch->SearchOperator2 = @$filter["w_HT"];
		$this->HT->AdvancedSearch->save();

		// Field WT
		$this->WT->AdvancedSearch->SearchValue = @$filter["x_WT"];
		$this->WT->AdvancedSearch->SearchOperator = @$filter["z_WT"];
		$this->WT->AdvancedSearch->SearchCondition = @$filter["v_WT"];
		$this->WT->AdvancedSearch->SearchValue2 = @$filter["y_WT"];
		$this->WT->AdvancedSearch->SearchOperator2 = @$filter["w_WT"];
		$this->WT->AdvancedSearch->save();

		// Field SurfaceArea
		$this->SurfaceArea->AdvancedSearch->SearchValue = @$filter["x_SurfaceArea"];
		$this->SurfaceArea->AdvancedSearch->SearchOperator = @$filter["z_SurfaceArea"];
		$this->SurfaceArea->AdvancedSearch->SearchCondition = @$filter["v_SurfaceArea"];
		$this->SurfaceArea->AdvancedSearch->SearchValue2 = @$filter["y_SurfaceArea"];
		$this->SurfaceArea->AdvancedSearch->SearchOperator2 = @$filter["w_SurfaceArea"];
		$this->SurfaceArea->AdvancedSearch->save();

		// Field BodyMassIndex
		$this->BodyMassIndex->AdvancedSearch->SearchValue = @$filter["x_BodyMassIndex"];
		$this->BodyMassIndex->AdvancedSearch->SearchOperator = @$filter["z_BodyMassIndex"];
		$this->BodyMassIndex->AdvancedSearch->SearchCondition = @$filter["v_BodyMassIndex"];
		$this->BodyMassIndex->AdvancedSearch->SearchValue2 = @$filter["y_BodyMassIndex"];
		$this->BodyMassIndex->AdvancedSearch->SearchOperator2 = @$filter["w_BodyMassIndex"];
		$this->BodyMassIndex->AdvancedSearch->save();

		// Field ClinicalFindings
		$this->ClinicalFindings->AdvancedSearch->SearchValue = @$filter["x_ClinicalFindings"];
		$this->ClinicalFindings->AdvancedSearch->SearchOperator = @$filter["z_ClinicalFindings"];
		$this->ClinicalFindings->AdvancedSearch->SearchCondition = @$filter["v_ClinicalFindings"];
		$this->ClinicalFindings->AdvancedSearch->SearchValue2 = @$filter["y_ClinicalFindings"];
		$this->ClinicalFindings->AdvancedSearch->SearchOperator2 = @$filter["w_ClinicalFindings"];
		$this->ClinicalFindings->AdvancedSearch->save();

		// Field ClinicalDiagnosis
		$this->ClinicalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_ClinicalDiagnosis"];
		$this->ClinicalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_ClinicalDiagnosis"];
		$this->ClinicalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_ClinicalDiagnosis"];
		$this->ClinicalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_ClinicalDiagnosis"];
		$this->ClinicalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_ClinicalDiagnosis"];
		$this->ClinicalDiagnosis->AdvancedSearch->save();

		// Field AnticoagulantifAny
		$this->AnticoagulantifAny->AdvancedSearch->SearchValue = @$filter["x_AnticoagulantifAny"];
		$this->AnticoagulantifAny->AdvancedSearch->SearchOperator = @$filter["z_AnticoagulantifAny"];
		$this->AnticoagulantifAny->AdvancedSearch->SearchCondition = @$filter["v_AnticoagulantifAny"];
		$this->AnticoagulantifAny->AdvancedSearch->SearchValue2 = @$filter["y_AnticoagulantifAny"];
		$this->AnticoagulantifAny->AdvancedSearch->SearchOperator2 = @$filter["w_AnticoagulantifAny"];
		$this->AnticoagulantifAny->AdvancedSearch->save();

		// Field FoodAllergies
		$this->FoodAllergies->AdvancedSearch->SearchValue = @$filter["x_FoodAllergies"];
		$this->FoodAllergies->AdvancedSearch->SearchOperator = @$filter["z_FoodAllergies"];
		$this->FoodAllergies->AdvancedSearch->SearchCondition = @$filter["v_FoodAllergies"];
		$this->FoodAllergies->AdvancedSearch->SearchValue2 = @$filter["y_FoodAllergies"];
		$this->FoodAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_FoodAllergies"];
		$this->FoodAllergies->AdvancedSearch->save();

		// Field GenericAllergies
		$this->GenericAllergies->AdvancedSearch->SearchValue = @$filter["x_GenericAllergies"];
		$this->GenericAllergies->AdvancedSearch->SearchOperator = @$filter["z_GenericAllergies"];
		$this->GenericAllergies->AdvancedSearch->SearchCondition = @$filter["v_GenericAllergies"];
		$this->GenericAllergies->AdvancedSearch->SearchValue2 = @$filter["y_GenericAllergies"];
		$this->GenericAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_GenericAllergies"];
		$this->GenericAllergies->AdvancedSearch->save();

		// Field GroupAllergies
		$this->GroupAllergies->AdvancedSearch->SearchValue = @$filter["x_GroupAllergies"];
		$this->GroupAllergies->AdvancedSearch->SearchOperator = @$filter["z_GroupAllergies"];
		$this->GroupAllergies->AdvancedSearch->SearchCondition = @$filter["v_GroupAllergies"];
		$this->GroupAllergies->AdvancedSearch->SearchValue2 = @$filter["y_GroupAllergies"];
		$this->GroupAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_GroupAllergies"];
		$this->GroupAllergies->AdvancedSearch->save();

		// Field Temp
		$this->Temp->AdvancedSearch->SearchValue = @$filter["x_Temp"];
		$this->Temp->AdvancedSearch->SearchOperator = @$filter["z_Temp"];
		$this->Temp->AdvancedSearch->SearchCondition = @$filter["v_Temp"];
		$this->Temp->AdvancedSearch->SearchValue2 = @$filter["y_Temp"];
		$this->Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Temp"];
		$this->Temp->AdvancedSearch->save();

		// Field Pulse
		$this->Pulse->AdvancedSearch->SearchValue = @$filter["x_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator = @$filter["z_Pulse"];
		$this->Pulse->AdvancedSearch->SearchCondition = @$filter["v_Pulse"];
		$this->Pulse->AdvancedSearch->SearchValue2 = @$filter["y_Pulse"];
		$this->Pulse->AdvancedSearch->SearchOperator2 = @$filter["w_Pulse"];
		$this->Pulse->AdvancedSearch->save();

		// Field BP
		$this->BP->AdvancedSearch->SearchValue = @$filter["x_BP"];
		$this->BP->AdvancedSearch->SearchOperator = @$filter["z_BP"];
		$this->BP->AdvancedSearch->SearchCondition = @$filter["v_BP"];
		$this->BP->AdvancedSearch->SearchValue2 = @$filter["y_BP"];
		$this->BP->AdvancedSearch->SearchOperator2 = @$filter["w_BP"];
		$this->BP->AdvancedSearch->save();

		// Field PR
		$this->PR->AdvancedSearch->SearchValue = @$filter["x_PR"];
		$this->PR->AdvancedSearch->SearchOperator = @$filter["z_PR"];
		$this->PR->AdvancedSearch->SearchCondition = @$filter["v_PR"];
		$this->PR->AdvancedSearch->SearchValue2 = @$filter["y_PR"];
		$this->PR->AdvancedSearch->SearchOperator2 = @$filter["w_PR"];
		$this->PR->AdvancedSearch->save();

		// Field CNS
		$this->CNS->AdvancedSearch->SearchValue = @$filter["x_CNS"];
		$this->CNS->AdvancedSearch->SearchOperator = @$filter["z_CNS"];
		$this->CNS->AdvancedSearch->SearchCondition = @$filter["v_CNS"];
		$this->CNS->AdvancedSearch->SearchValue2 = @$filter["y_CNS"];
		$this->CNS->AdvancedSearch->SearchOperator2 = @$filter["w_CNS"];
		$this->CNS->AdvancedSearch->save();

		// Field RSA
		$this->RSA->AdvancedSearch->SearchValue = @$filter["x_RSA"];
		$this->RSA->AdvancedSearch->SearchOperator = @$filter["z_RSA"];
		$this->RSA->AdvancedSearch->SearchCondition = @$filter["v_RSA"];
		$this->RSA->AdvancedSearch->SearchValue2 = @$filter["y_RSA"];
		$this->RSA->AdvancedSearch->SearchOperator2 = @$filter["w_RSA"];
		$this->RSA->AdvancedSearch->save();

		// Field CVS
		$this->CVS->AdvancedSearch->SearchValue = @$filter["x_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator = @$filter["z_CVS"];
		$this->CVS->AdvancedSearch->SearchCondition = @$filter["v_CVS"];
		$this->CVS->AdvancedSearch->SearchValue2 = @$filter["y_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator2 = @$filter["w_CVS"];
		$this->CVS->AdvancedSearch->save();

		// Field PA
		$this->PA->AdvancedSearch->SearchValue = @$filter["x_PA"];
		$this->PA->AdvancedSearch->SearchOperator = @$filter["z_PA"];
		$this->PA->AdvancedSearch->SearchCondition = @$filter["v_PA"];
		$this->PA->AdvancedSearch->SearchValue2 = @$filter["y_PA"];
		$this->PA->AdvancedSearch->SearchOperator2 = @$filter["w_PA"];
		$this->PA->AdvancedSearch->save();

		// Field PS
		$this->PS->AdvancedSearch->SearchValue = @$filter["x_PS"];
		$this->PS->AdvancedSearch->SearchOperator = @$filter["z_PS"];
		$this->PS->AdvancedSearch->SearchCondition = @$filter["v_PS"];
		$this->PS->AdvancedSearch->SearchValue2 = @$filter["y_PS"];
		$this->PS->AdvancedSearch->SearchOperator2 = @$filter["w_PS"];
		$this->PS->AdvancedSearch->save();

		// Field PV
		$this->PV->AdvancedSearch->SearchValue = @$filter["x_PV"];
		$this->PV->AdvancedSearch->SearchOperator = @$filter["z_PV"];
		$this->PV->AdvancedSearch->SearchCondition = @$filter["v_PV"];
		$this->PV->AdvancedSearch->SearchValue2 = @$filter["y_PV"];
		$this->PV->AdvancedSearch->SearchOperator2 = @$filter["w_PV"];
		$this->PV->AdvancedSearch->save();

		// Field clinicaldetails
		$this->clinicaldetails->AdvancedSearch->SearchValue = @$filter["x_clinicaldetails"];
		$this->clinicaldetails->AdvancedSearch->SearchOperator = @$filter["z_clinicaldetails"];
		$this->clinicaldetails->AdvancedSearch->SearchCondition = @$filter["v_clinicaldetails"];
		$this->clinicaldetails->AdvancedSearch->SearchValue2 = @$filter["y_clinicaldetails"];
		$this->clinicaldetails->AdvancedSearch->SearchOperator2 = @$filter["w_clinicaldetails"];
		$this->clinicaldetails->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field createdby
		$this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
		$this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
		$this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
		$this->createdby->AdvancedSearch->save();

		// Field createddatetime
		$this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
		$this->createddatetime->AdvancedSearch->save();

		// Field modifiedby
		$this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
		$this->modifiedby->AdvancedSearch->save();

		// Field modifieddatetime
		$this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field Gender
		$this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
		$this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
		$this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
		$this->Gender->AdvancedSearch->save();

		// Field PatientSearch
		$this->PatientSearch->AdvancedSearch->SearchValue = @$filter["x_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchOperator = @$filter["z_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchCondition = @$filter["v_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchValue2 = @$filter["y_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchOperator2 = @$filter["w_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->save();

		// Field PatientId
		$this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
		$this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
		$this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
		$this->PatientId->AdvancedSearch->save();

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->mrnno, $default, FALSE); // mrnno
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->PatID, $default, FALSE); // PatID
		$this->buildSearchSql($where, $this->MobileNumber, $default, FALSE); // MobileNumber
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->HT, $default, FALSE); // HT
		$this->buildSearchSql($where, $this->WT, $default, FALSE); // WT
		$this->buildSearchSql($where, $this->SurfaceArea, $default, FALSE); // SurfaceArea
		$this->buildSearchSql($where, $this->BodyMassIndex, $default, FALSE); // BodyMassIndex
		$this->buildSearchSql($where, $this->ClinicalFindings, $default, FALSE); // ClinicalFindings
		$this->buildSearchSql($where, $this->ClinicalDiagnosis, $default, FALSE); // ClinicalDiagnosis
		$this->buildSearchSql($where, $this->AnticoagulantifAny, $default, FALSE); // AnticoagulantifAny
		$this->buildSearchSql($where, $this->FoodAllergies, $default, FALSE); // FoodAllergies
		$this->buildSearchSql($where, $this->GenericAllergies, $default, TRUE); // GenericAllergies
		$this->buildSearchSql($where, $this->GroupAllergies, $default, TRUE); // GroupAllergies
		$this->buildSearchSql($where, $this->Temp, $default, FALSE); // Temp
		$this->buildSearchSql($where, $this->Pulse, $default, FALSE); // Pulse
		$this->buildSearchSql($where, $this->BP, $default, FALSE); // BP
		$this->buildSearchSql($where, $this->PR, $default, FALSE); // PR
		$this->buildSearchSql($where, $this->CNS, $default, FALSE); // CNS
		$this->buildSearchSql($where, $this->RSA, $default, FALSE); // RSA
		$this->buildSearchSql($where, $this->CVS, $default, FALSE); // CVS
		$this->buildSearchSql($where, $this->PA, $default, FALSE); // PA
		$this->buildSearchSql($where, $this->PS, $default, FALSE); // PS
		$this->buildSearchSql($where, $this->PV, $default, FALSE); // PV
		$this->buildSearchSql($where, $this->clinicaldetails, $default, TRUE); // clinicaldetails
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->Gender, $default, FALSE); // Gender
		$this->buildSearchSql($where, $this->PatientSearch, $default, FALSE); // PatientSearch
		$this->buildSearchSql($where, $this->PatientId, $default, FALSE); // PatientId
		$this->buildSearchSql($where, $this->Reception, $default, FALSE); // Reception
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->mrnno->AdvancedSearch->save(); // mrnno
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->PatID->AdvancedSearch->save(); // PatID
			$this->MobileNumber->AdvancedSearch->save(); // MobileNumber
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->HT->AdvancedSearch->save(); // HT
			$this->WT->AdvancedSearch->save(); // WT
			$this->SurfaceArea->AdvancedSearch->save(); // SurfaceArea
			$this->BodyMassIndex->AdvancedSearch->save(); // BodyMassIndex
			$this->ClinicalFindings->AdvancedSearch->save(); // ClinicalFindings
			$this->ClinicalDiagnosis->AdvancedSearch->save(); // ClinicalDiagnosis
			$this->AnticoagulantifAny->AdvancedSearch->save(); // AnticoagulantifAny
			$this->FoodAllergies->AdvancedSearch->save(); // FoodAllergies
			$this->GenericAllergies->AdvancedSearch->save(); // GenericAllergies
			$this->GroupAllergies->AdvancedSearch->save(); // GroupAllergies
			$this->Temp->AdvancedSearch->save(); // Temp
			$this->Pulse->AdvancedSearch->save(); // Pulse
			$this->BP->AdvancedSearch->save(); // BP
			$this->PR->AdvancedSearch->save(); // PR
			$this->CNS->AdvancedSearch->save(); // CNS
			$this->RSA->AdvancedSearch->save(); // RSA
			$this->CVS->AdvancedSearch->save(); // CVS
			$this->PA->AdvancedSearch->save(); // PA
			$this->PS->AdvancedSearch->save(); // PS
			$this->PV->AdvancedSearch->save(); // PV
			$this->clinicaldetails->AdvancedSearch->save(); // clinicaldetails
			$this->status->AdvancedSearch->save(); // status
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->Age->AdvancedSearch->save(); // Age
			$this->Gender->AdvancedSearch->save(); // Gender
			$this->PatientSearch->AdvancedSearch->save(); // PatientSearch
			$this->PatientId->AdvancedSearch->save(); // PatientId
			$this->Reception->AdvancedSearch->save(); // Reception
			$this->HospID->AdvancedSearch->save(); // HospID
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SurfaceArea, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BodyMassIndex, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ClinicalFindings, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ClinicalDiagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnticoagulantifAny, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FoodAllergies, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GenericAllergies, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GroupAllergies, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Temp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pulse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CNS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RSA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PV, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->clinicaldetails, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientSearch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
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
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mrnno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SurfaceArea->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BodyMassIndex->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ClinicalFindings->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ClinicalDiagnosis->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AnticoagulantifAny->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FoodAllergies->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GenericAllergies->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GroupAllergies->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Temp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pulse->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BP->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PR->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CNS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RSA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CVS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PV->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->clinicaldetails->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifieddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientSearch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reception->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
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

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
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

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->id->AdvancedSearch->unsetSession();
		$this->mrnno->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->PatID->AdvancedSearch->unsetSession();
		$this->MobileNumber->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->HT->AdvancedSearch->unsetSession();
		$this->WT->AdvancedSearch->unsetSession();
		$this->SurfaceArea->AdvancedSearch->unsetSession();
		$this->BodyMassIndex->AdvancedSearch->unsetSession();
		$this->ClinicalFindings->AdvancedSearch->unsetSession();
		$this->ClinicalDiagnosis->AdvancedSearch->unsetSession();
		$this->AnticoagulantifAny->AdvancedSearch->unsetSession();
		$this->FoodAllergies->AdvancedSearch->unsetSession();
		$this->GenericAllergies->AdvancedSearch->unsetSession();
		$this->GroupAllergies->AdvancedSearch->unsetSession();
		$this->Temp->AdvancedSearch->unsetSession();
		$this->Pulse->AdvancedSearch->unsetSession();
		$this->BP->AdvancedSearch->unsetSession();
		$this->PR->AdvancedSearch->unsetSession();
		$this->CNS->AdvancedSearch->unsetSession();
		$this->RSA->AdvancedSearch->unsetSession();
		$this->CVS->AdvancedSearch->unsetSession();
		$this->PA->AdvancedSearch->unsetSession();
		$this->PS->AdvancedSearch->unsetSession();
		$this->PV->AdvancedSearch->unsetSession();
		$this->clinicaldetails->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->Gender->AdvancedSearch->unsetSession();
		$this->PatientSearch->AdvancedSearch->unsetSession();
		$this->PatientId->AdvancedSearch->unsetSession();
		$this->Reception->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->HT->AdvancedSearch->load();
		$this->WT->AdvancedSearch->load();
		$this->SurfaceArea->AdvancedSearch->load();
		$this->BodyMassIndex->AdvancedSearch->load();
		$this->ClinicalFindings->AdvancedSearch->load();
		$this->ClinicalDiagnosis->AdvancedSearch->load();
		$this->AnticoagulantifAny->AdvancedSearch->load();
		$this->FoodAllergies->AdvancedSearch->load();
		$this->GenericAllergies->AdvancedSearch->load();
		$this->GroupAllergies->AdvancedSearch->load();
		$this->Temp->AdvancedSearch->load();
		$this->Pulse->AdvancedSearch->load();
		$this->BP->AdvancedSearch->load();
		$this->PR->AdvancedSearch->load();
		$this->CNS->AdvancedSearch->load();
		$this->RSA->AdvancedSearch->load();
		$this->CVS->AdvancedSearch->load();
		$this->PA->AdvancedSearch->load();
		$this->PS->AdvancedSearch->load();
		$this->PV->AdvancedSearch->load();
		$this->clinicaldetails->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->PatientSearch->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->PatID); // PatID
			$this->updateSort($this->MobileNumber); // MobileNumber
			$this->updateSort($this->HT); // HT
			$this->updateSort($this->WT); // WT
			$this->updateSort($this->SurfaceArea); // SurfaceArea
			$this->updateSort($this->BodyMassIndex); // BodyMassIndex
			$this->updateSort($this->AnticoagulantifAny); // AnticoagulantifAny
			$this->updateSort($this->FoodAllergies); // FoodAllergies
			$this->updateSort($this->GenericAllergies); // GenericAllergies
			$this->updateSort($this->GroupAllergies); // GroupAllergies
			$this->updateSort($this->Temp); // Temp
			$this->updateSort($this->Pulse); // Pulse
			$this->updateSort($this->BP); // BP
			$this->updateSort($this->PR); // PR
			$this->updateSort($this->CNS); // CNS
			$this->updateSort($this->RSA); // RSA
			$this->updateSort($this->CVS); // CVS
			$this->updateSort($this->PA); // PA
			$this->updateSort($this->PS); // PS
			$this->updateSort($this->PV); // PV
			$this->updateSort($this->clinicaldetails); // clinicaldetails
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->Gender); // Gender
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->Reception); // Reception
			$this->updateSort($this->HospID); // HospID
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

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

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
				$this->id->setSort("");
				$this->mrnno->setSort("");
				$this->PatientName->setSort("");
				$this->PatID->setSort("");
				$this->MobileNumber->setSort("");
				$this->HT->setSort("");
				$this->WT->setSort("");
				$this->SurfaceArea->setSort("");
				$this->BodyMassIndex->setSort("");
				$this->AnticoagulantifAny->setSort("");
				$this->FoodAllergies->setSort("");
				$this->GenericAllergies->setSort("");
				$this->GroupAllergies->setSort("");
				$this->Temp->setSort("");
				$this->Pulse->setSort("");
				$this->BP->setSort("");
				$this->PR->setSort("");
				$this->CNS->setSort("");
				$this->RSA->setSort("");
				$this->CVS->setSort("");
				$this->PA->setSort("");
				$this->PS->setSort("");
				$this->PV->setSort("");
				$this->clinicaldetails->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->Age->setSort("");
				$this->Gender->setSort("");
				$this->PatientId->setSort("");
				$this->Reception->setSort("");
				$this->HospID->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_vitalslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_vitalslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpatient_vitalslist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// id
		if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mrnno
		if (!$this->isAddOrEdit() && $this->mrnno->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mrnno->AdvancedSearch->SearchValue != "" || $this->mrnno->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatientName
		if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatID
		if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// MobileNumber
		if (!$this->isAddOrEdit() && $this->MobileNumber->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->MobileNumber->AdvancedSearch->SearchValue != "" || $this->MobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// profilePic
		if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HT
		if (!$this->isAddOrEdit() && $this->HT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HT->AdvancedSearch->SearchValue != "" || $this->HT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// WT
		if (!$this->isAddOrEdit() && $this->WT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->WT->AdvancedSearch->SearchValue != "" || $this->WT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SurfaceArea
		if (!$this->isAddOrEdit() && $this->SurfaceArea->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SurfaceArea->AdvancedSearch->SearchValue != "" || $this->SurfaceArea->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BodyMassIndex
		if (!$this->isAddOrEdit() && $this->BodyMassIndex->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BodyMassIndex->AdvancedSearch->SearchValue != "" || $this->BodyMassIndex->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ClinicalFindings
		if (!$this->isAddOrEdit() && $this->ClinicalFindings->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ClinicalFindings->AdvancedSearch->SearchValue != "" || $this->ClinicalFindings->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ClinicalDiagnosis
		if (!$this->isAddOrEdit() && $this->ClinicalDiagnosis->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ClinicalDiagnosis->AdvancedSearch->SearchValue != "" || $this->ClinicalDiagnosis->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AnticoagulantifAny
		if (!$this->isAddOrEdit() && $this->AnticoagulantifAny->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AnticoagulantifAny->AdvancedSearch->SearchValue != "" || $this->AnticoagulantifAny->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// FoodAllergies
		if (!$this->isAddOrEdit() && $this->FoodAllergies->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->FoodAllergies->AdvancedSearch->SearchValue != "" || $this->FoodAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// GenericAllergies
		if (!$this->isAddOrEdit() && $this->GenericAllergies->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->GenericAllergies->AdvancedSearch->SearchValue != "" || $this->GenericAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue))
			$this->GenericAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue);
		if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue2))
			$this->GenericAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue2);

		// GroupAllergies
		if (!$this->isAddOrEdit() && $this->GroupAllergies->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->GroupAllergies->AdvancedSearch->SearchValue != "" || $this->GroupAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue))
			$this->GroupAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue);
		if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue2))
			$this->GroupAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue2);

		// Temp
		if (!$this->isAddOrEdit() && $this->Temp->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Temp->AdvancedSearch->SearchValue != "" || $this->Temp->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Pulse
		if (!$this->isAddOrEdit() && $this->Pulse->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Pulse->AdvancedSearch->SearchValue != "" || $this->Pulse->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BP
		if (!$this->isAddOrEdit() && $this->BP->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BP->AdvancedSearch->SearchValue != "" || $this->BP->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PR
		if (!$this->isAddOrEdit() && $this->PR->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PR->AdvancedSearch->SearchValue != "" || $this->PR->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CNS
		if (!$this->isAddOrEdit() && $this->CNS->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CNS->AdvancedSearch->SearchValue != "" || $this->CNS->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RSA
		if (!$this->isAddOrEdit() && $this->RSA->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RSA->AdvancedSearch->SearchValue != "" || $this->RSA->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CVS
		if (!$this->isAddOrEdit() && $this->CVS->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CVS->AdvancedSearch->SearchValue != "" || $this->CVS->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PA
		if (!$this->isAddOrEdit() && $this->PA->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PA->AdvancedSearch->SearchValue != "" || $this->PA->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PS
		if (!$this->isAddOrEdit() && $this->PS->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PS->AdvancedSearch->SearchValue != "" || $this->PS->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PV
		if (!$this->isAddOrEdit() && $this->PV->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PV->AdvancedSearch->SearchValue != "" || $this->PV->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// clinicaldetails
		if (!$this->isAddOrEdit() && $this->clinicaldetails->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->clinicaldetails->AdvancedSearch->SearchValue != "" || $this->clinicaldetails->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue))
			$this->clinicaldetails->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue);
		if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue2))
			$this->clinicaldetails->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue2);

		// status
		if (!$this->isAddOrEdit() && $this->status->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->status->AdvancedSearch->SearchValue != "" || $this->status->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// createdby
		if (!$this->isAddOrEdit() && $this->createdby->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->createdby->AdvancedSearch->SearchValue != "" || $this->createdby->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// createddatetime
		if (!$this->isAddOrEdit() && $this->createddatetime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->createddatetime->AdvancedSearch->SearchValue != "" || $this->createddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// modifiedby
		if (!$this->isAddOrEdit() && $this->modifiedby->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->modifiedby->AdvancedSearch->SearchValue != "" || $this->modifiedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// modifieddatetime
		if (!$this->isAddOrEdit() && $this->modifieddatetime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->modifieddatetime->AdvancedSearch->SearchValue != "" || $this->modifieddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Age
		if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Gender
		if (!$this->isAddOrEdit() && $this->Gender->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Gender->AdvancedSearch->SearchValue != "" || $this->Gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatientSearch
		if (!$this->isAddOrEdit() && $this->PatientSearch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatientSearch->AdvancedSearch->SearchValue != "" || $this->PatientSearch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatientId
		if (!$this->isAddOrEdit() && $this->PatientId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatientId->AdvancedSearch->SearchValue != "" || $this->PatientId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Reception
		if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospID
		if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
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
		$row = [];
		$row['id'] = NULL;
		$row['mrnno'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatID'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['profilePic'] = NULL;
		$row['HT'] = NULL;
		$row['WT'] = NULL;
		$row['SurfaceArea'] = NULL;
		$row['BodyMassIndex'] = NULL;
		$row['ClinicalFindings'] = NULL;
		$row['ClinicalDiagnosis'] = NULL;
		$row['AnticoagulantifAny'] = NULL;
		$row['FoodAllergies'] = NULL;
		$row['GenericAllergies'] = NULL;
		$row['GroupAllergies'] = NULL;
		$row['Temp'] = NULL;
		$row['Pulse'] = NULL;
		$row['BP'] = NULL;
		$row['PR'] = NULL;
		$row['CNS'] = NULL;
		$row['RSA'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['PS'] = NULL;
		$row['PV'] = NULL;
		$row['clinicaldetails'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['PatientSearch'] = NULL;
		$row['PatientId'] = NULL;
		$row['Reception'] = NULL;
		$row['HospID'] = NULL;
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
			if ($curVal != "") {
				$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
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
			if ($curVal != "") {
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
				if ($this->GenericAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GenericAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GenericAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
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
			if ($this->GroupAllergies->VirtualValue != "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
			} else {
				$curVal = strval($this->GroupAllergies->CurrentValue);
				if ($curVal != "") {
					$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
					if ($this->GroupAllergies->ViewValue === NULL) { // Lookup from database
						$arwrk = explode(",", $curVal);
						$filterWrk = "";
						foreach ($arwrk as $wrk) {
							if ($filterWrk != "")
								$filterWrk .= " OR ";
							$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
						}
						$sqlWrk = $this->GroupAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$this->GroupAllergies->ViewValue = new OptionValues();
							$ari = 0;
							while (!$rswrk->EOF) {
								$arwrk = [];
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
			if ($curVal != "") {
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
				if ($this->clinicaldetails->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->clinicaldetails->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->clinicaldetails->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (!$this->mrnno->Raw)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (!$this->PatID->Raw)
				$this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// HT
			$this->HT->EditAttrs["class"] = "form-control";
			$this->HT->EditCustomAttributes = "";
			if (!$this->HT->Raw)
				$this->HT->AdvancedSearch->SearchValue = HtmlDecode($this->HT->AdvancedSearch->SearchValue);
			$this->HT->EditValue = HtmlEncode($this->HT->AdvancedSearch->SearchValue);
			$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

			// WT
			$this->WT->EditAttrs["class"] = "form-control";
			$this->WT->EditCustomAttributes = "";
			if (!$this->WT->Raw)
				$this->WT->AdvancedSearch->SearchValue = HtmlDecode($this->WT->AdvancedSearch->SearchValue);
			$this->WT->EditValue = HtmlEncode($this->WT->AdvancedSearch->SearchValue);
			$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

			// SurfaceArea
			$this->SurfaceArea->EditAttrs["class"] = "form-control";
			$this->SurfaceArea->EditCustomAttributes = "";
			if (!$this->SurfaceArea->Raw)
				$this->SurfaceArea->AdvancedSearch->SearchValue = HtmlDecode($this->SurfaceArea->AdvancedSearch->SearchValue);
			$this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->AdvancedSearch->SearchValue);
			$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

			// BodyMassIndex
			$this->BodyMassIndex->EditAttrs["class"] = "form-control";
			$this->BodyMassIndex->EditCustomAttributes = "";
			if (!$this->BodyMassIndex->Raw)
				$this->BodyMassIndex->AdvancedSearch->SearchValue = HtmlDecode($this->BodyMassIndex->AdvancedSearch->SearchValue);
			$this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->AdvancedSearch->SearchValue);
			$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

			// AnticoagulantifAny
			$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
			$this->AnticoagulantifAny->EditCustomAttributes = "";
			if (!$this->AnticoagulantifAny->Raw)
				$this->AnticoagulantifAny->AdvancedSearch->SearchValue = HtmlDecode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
			$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
			$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

			// FoodAllergies
			$this->FoodAllergies->EditAttrs["class"] = "form-control";
			$this->FoodAllergies->EditCustomAttributes = "";
			if (!$this->FoodAllergies->Raw)
				$this->FoodAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->FoodAllergies->AdvancedSearch->SearchValue);
			$this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->AdvancedSearch->SearchValue);
			$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

			// GenericAllergies
			$this->GenericAllergies->EditAttrs["class"] = "form-control";
			$this->GenericAllergies->EditCustomAttributes = "";

			// GroupAllergies
			$this->GroupAllergies->EditAttrs["class"] = "form-control";
			$this->GroupAllergies->EditCustomAttributes = "";
			if (!$this->GroupAllergies->Raw)
				$this->GroupAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->GroupAllergies->AdvancedSearch->SearchValue);
			$this->GroupAllergies->EditValue = HtmlEncode($this->GroupAllergies->AdvancedSearch->SearchValue);
			$this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (!$this->Temp->Raw)
				$this->Temp->AdvancedSearch->SearchValue = HtmlDecode($this->Temp->AdvancedSearch->SearchValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->AdvancedSearch->SearchValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (!$this->Pulse->Raw)
				$this->Pulse->AdvancedSearch->SearchValue = HtmlDecode($this->Pulse->AdvancedSearch->SearchValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->AdvancedSearch->SearchValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (!$this->BP->Raw)
				$this->BP->AdvancedSearch->SearchValue = HtmlDecode($this->BP->AdvancedSearch->SearchValue);
			$this->BP->EditValue = HtmlEncode($this->BP->AdvancedSearch->SearchValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (!$this->PR->Raw)
				$this->PR->AdvancedSearch->SearchValue = HtmlDecode($this->PR->AdvancedSearch->SearchValue);
			$this->PR->EditValue = HtmlEncode($this->PR->AdvancedSearch->SearchValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (!$this->CNS->Raw)
				$this->CNS->AdvancedSearch->SearchValue = HtmlDecode($this->CNS->AdvancedSearch->SearchValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->AdvancedSearch->SearchValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RSA
			$this->RSA->EditAttrs["class"] = "form-control";
			$this->RSA->EditCustomAttributes = "";
			if (!$this->RSA->Raw)
				$this->RSA->AdvancedSearch->SearchValue = HtmlDecode($this->RSA->AdvancedSearch->SearchValue);
			$this->RSA->EditValue = HtmlEncode($this->RSA->AdvancedSearch->SearchValue);
			$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (!$this->CVS->Raw)
				$this->CVS->AdvancedSearch->SearchValue = HtmlDecode($this->CVS->AdvancedSearch->SearchValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->AdvancedSearch->SearchValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (!$this->PA->Raw)
				$this->PA->AdvancedSearch->SearchValue = HtmlDecode($this->PA->AdvancedSearch->SearchValue);
			$this->PA->EditValue = HtmlEncode($this->PA->AdvancedSearch->SearchValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PS
			$this->PS->EditAttrs["class"] = "form-control";
			$this->PS->EditCustomAttributes = "";
			if (!$this->PS->Raw)
				$this->PS->AdvancedSearch->SearchValue = HtmlDecode($this->PS->AdvancedSearch->SearchValue);
			$this->PS->EditValue = HtmlEncode($this->PS->AdvancedSearch->SearchValue);
			$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

			// PV
			$this->PV->EditAttrs["class"] = "form-control";
			$this->PV->EditCustomAttributes = "";
			if (!$this->PV->Raw)
				$this->PV->AdvancedSearch->SearchValue = HtmlDecode($this->PV->AdvancedSearch->SearchValue);
			$this->PV->EditValue = HtmlEncode($this->PV->AdvancedSearch->SearchValue);
			$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

			// clinicaldetails
			$this->clinicaldetails->EditCustomAttributes = "";

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (!$this->createdby->Raw)
				$this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (!$this->modifiedby->Raw)
				$this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->HT->AdvancedSearch->load();
		$this->WT->AdvancedSearch->load();
		$this->SurfaceArea->AdvancedSearch->load();
		$this->BodyMassIndex->AdvancedSearch->load();
		$this->ClinicalFindings->AdvancedSearch->load();
		$this->ClinicalDiagnosis->AdvancedSearch->load();
		$this->AnticoagulantifAny->AdvancedSearch->load();
		$this->FoodAllergies->AdvancedSearch->load();
		$this->GenericAllergies->AdvancedSearch->load();
		$this->GroupAllergies->AdvancedSearch->load();
		$this->Temp->AdvancedSearch->load();
		$this->Pulse->AdvancedSearch->load();
		$this->BP->AdvancedSearch->load();
		$this->PR->AdvancedSearch->load();
		$this->CNS->AdvancedSearch->load();
		$this->RSA->AdvancedSearch->load();
		$this->CVS->AdvancedSearch->load();
		$this->PA->AdvancedSearch->load();
		$this->PS->AdvancedSearch->load();
		$this->PV->AdvancedSearch->load();
		$this->clinicaldetails->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->PatientSearch->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_patient_vitals" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_vitals\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_vitalslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Visible = TRUE;

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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_vitalslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"patient_vitalssrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpatient_vitalslistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != "" && $this->TotalRecords > 0);

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
		if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			if (!isset($ip_admission))
				$ip_admission = new ip_admission();
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
					$doc->Table = &$ip_admission;
					$ip_admission->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setQueryStringValue($parm);
					$this->Reception->setQueryStringValue($GLOBALS["ip_admission"]->id->QueryStringValue);
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setQueryStringValue($parm);
					$this->PatientId->setQueryStringValue($GLOBALS["ip_admission"]->patient_id->QueryStringValue);
					$this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setQueryStringValue($parm);
					$this->mrnno->setQueryStringValue($GLOBALS["ip_admission"]->mrnNo->QueryStringValue);
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setFormValue($parm);
					$this->Reception->setFormValue($GLOBALS["ip_admission"]->id->FormValue);
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setFormValue($parm);
					$this->PatientId->setFormValue($GLOBALS["ip_admission"]->patient_id->FormValue);
					$this->PatientId->setSessionValue($this->PatientId->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setFormValue($parm);
					$this->mrnno->setFormValue($GLOBALS["ip_admission"]->mrnNo->FormValue);
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
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
			if ($masterTblVar != "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->PatientId->CurrentValue == "")
					$this->PatientId->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
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
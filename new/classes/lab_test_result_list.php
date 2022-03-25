<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class lab_test_result_list extends lab_test_result
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_test_result';

	// Page object name
	public $PageObjName = "lab_test_result_list";

	// Grid form hidden field names
	public $FormName = "flab_test_resultlist";
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

		// Table object (lab_test_result)
		if (!isset($GLOBALS["lab_test_result"]) || get_class($GLOBALS["lab_test_result"]) == PROJECT_NAMESPACE . "lab_test_result") {
			$GLOBALS["lab_test_result"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_test_result"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "lab_test_resultadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "lab_test_resultdelete.php";
		$this->MultiUpdateUrl = "lab_test_resultupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_result');

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
		$this->FilterOptions->TagClassName = "ew-filter-option flab_test_resultlistsrch";

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
		global $lab_test_result;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($lab_test_result);
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

		// Create form object
		$CurrentForm = new HttpForm();

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
		$this->Branch->setVisibility();
		$this->SidNo->setVisibility();
		$this->SidDate->setVisibility();
		$this->TestCd->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->DEptCd->setVisibility();
		$this->ProfCd->setVisibility();
		$this->LabReport->Visible = FALSE;
		$this->ResultDate->setVisibility();
		$this->Comments->Visible = FALSE;
		$this->Method->setVisibility();
		$this->Specimen->setVisibility();
		$this->Amount->setVisibility();
		$this->ResultBy->setVisibility();
		$this->AuthBy->setVisibility();
		$this->AuthDate->setVisibility();
		$this->Abnormal->setVisibility();
		$this->Printed->setVisibility();
		$this->Dispatch->setVisibility();
		$this->LOWHIGH->setVisibility();
		$this->RefValue->Visible = FALSE;
		$this->Unit->setVisibility();
		$this->ResDate->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->GraphPath->setVisibility();
		$this->SampleDate->setVisibility();
		$this->SampleUser->setVisibility();
		$this->ReceivedDate->setVisibility();
		$this->ReceivedUser->setVisibility();
		$this->DeptRecvDate->setVisibility();
		$this->DeptRecvUser->setVisibility();
		$this->PrintBy->setVisibility();
		$this->PrintDate->setVisibility();
		$this->MachineCD->setVisibility();
		$this->TestCancel->setVisibility();
		$this->OutSource->setVisibility();
		$this->Tariff->setVisibility();
		$this->EDITDATE->setVisibility();
		$this->UPLOAD->setVisibility();
		$this->SAuthDate->setVisibility();
		$this->SAuthBy->setVisibility();
		$this->NoRC->setVisibility();
		$this->DispDt->setVisibility();
		$this->DispUser->setVisibility();
		$this->DispRemarks->setVisibility();
		$this->DispMode->setVisibility();
		$this->ProductCD->setVisibility();
		$this->Nos->setVisibility();
		$this->WBCPath->setVisibility();
		$this->RBCPath->setVisibility();
		$this->PTPath->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->NoSign->setVisibility();
		$this->_Barcode->setVisibility();
		$this->ReadTime->setVisibility();
		$this->Result->Visible = FALSE;
		$this->VailID->setVisibility();
		$this->ReadMachine->setVisibility();
		$this->LabCD->setVisibility();
		$this->OutLabAmt->setVisibility();
		$this->ProductQty->setVisibility();
		$this->Repeat->setVisibility();
		$this->DeptNo->setVisibility();
		$this->Desc1->setVisibility();
		$this->Desc2->setVisibility();
		$this->RptResult->setVisibility();
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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Insert
					if ($this->isGridInsert() && @$_SESSION[SESSION_INLINE_MODE] == "gridadd") {
						if ($this->validateGridForm()) {
							$gridInsert = $this->gridInsert();
						} else {
							$gridInsert = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridInsert) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridAddMode(); // Stay in Grid add mode
						}
					}
				}
			}

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

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
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->Amount->FormValue = ""; // Clear form value
		$this->Tariff->FormValue = ""; // Clear form value
		$this->Nos->FormValue = ""; // Clear form value
		$this->ActualAmt->FormValue = ""; // Clear form value
		$this->OutLabAmt->FormValue = ""; // Clear form value
		$this->ProductQty->FormValue = ""; // Clear form value
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
		if (count($arKeyFlds) >= 0) {
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

		// Begin transaction
		$conn->beginTrans();

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
			$this->setFailureMessage($Language->phrase("NoAddRecord"));
			$gridInsert = FALSE;
		}
		if ($gridInsert) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_Branch") && $CurrentForm->hasValue("o_Branch") && $this->Branch->CurrentValue != $this->Branch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SidNo") && $CurrentForm->hasValue("o_SidNo") && $this->SidNo->CurrentValue != $this->SidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SidDate") && $CurrentForm->hasValue("o_SidDate") && $this->SidDate->CurrentValue != $this->SidDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestCd") && $CurrentForm->hasValue("o_TestCd") && $this->TestCd->CurrentValue != $this->TestCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestSubCd") && $CurrentForm->hasValue("o_TestSubCd") && $this->TestSubCd->CurrentValue != $this->TestSubCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue != $this->DEptCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProfCd") && $CurrentForm->hasValue("o_ProfCd") && $this->ProfCd->CurrentValue != $this->ProfCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue != $this->Method->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Specimen") && $CurrentForm->hasValue("o_Specimen") && $this->Specimen->CurrentValue != $this->Specimen->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue != $this->Amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultBy") && $CurrentForm->hasValue("o_ResultBy") && $this->ResultBy->CurrentValue != $this->ResultBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthBy") && $CurrentForm->hasValue("o_AuthBy") && $this->AuthBy->CurrentValue != $this->AuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthDate") && $CurrentForm->hasValue("o_AuthDate") && $this->AuthDate->CurrentValue != $this->AuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Abnormal") && $CurrentForm->hasValue("o_Abnormal") && $this->Abnormal->CurrentValue != $this->Abnormal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Printed") && $CurrentForm->hasValue("o_Printed") && $this->Printed->CurrentValue != $this->Printed->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dispatch") && $CurrentForm->hasValue("o_Dispatch") && $this->Dispatch->CurrentValue != $this->Dispatch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LOWHIGH") && $CurrentForm->hasValue("o_LOWHIGH") && $this->LOWHIGH->CurrentValue != $this->LOWHIGH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Unit") && $CurrentForm->hasValue("o_Unit") && $this->Unit->CurrentValue != $this->Unit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResDate") && $CurrentForm->hasValue("o_ResDate") && $this->ResDate->CurrentValue != $this->ResDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic1") && $CurrentForm->hasValue("o_Pic1") && $this->Pic1->CurrentValue != $this->Pic1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic2") && $CurrentForm->hasValue("o_Pic2") && $this->Pic2->CurrentValue != $this->Pic2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GraphPath") && $CurrentForm->hasValue("o_GraphPath") && $this->GraphPath->CurrentValue != $this->GraphPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleDate") && $CurrentForm->hasValue("o_SampleDate") && $this->SampleDate->CurrentValue != $this->SampleDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleUser") && $CurrentForm->hasValue("o_SampleUser") && $this->SampleUser->CurrentValue != $this->SampleUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedDate") && $CurrentForm->hasValue("o_ReceivedDate") && $this->ReceivedDate->CurrentValue != $this->ReceivedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedUser") && $CurrentForm->hasValue("o_ReceivedUser") && $this->ReceivedUser->CurrentValue != $this->ReceivedUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvDate") && $CurrentForm->hasValue("o_DeptRecvDate") && $this->DeptRecvDate->CurrentValue != $this->DeptRecvDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvUser") && $CurrentForm->hasValue("o_DeptRecvUser") && $this->DeptRecvUser->CurrentValue != $this->DeptRecvUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintBy") && $CurrentForm->hasValue("o_PrintBy") && $this->PrintBy->CurrentValue != $this->PrintBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintDate") && $CurrentForm->hasValue("o_PrintDate") && $this->PrintDate->CurrentValue != $this->PrintDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MachineCD") && $CurrentForm->hasValue("o_MachineCD") && $this->MachineCD->CurrentValue != $this->MachineCD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestCancel") && $CurrentForm->hasValue("o_TestCancel") && $this->TestCancel->CurrentValue != $this->TestCancel->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OutSource") && $CurrentForm->hasValue("o_OutSource") && $this->OutSource->CurrentValue != $this->OutSource->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Tariff") && $CurrentForm->hasValue("o_Tariff") && $this->Tariff->CurrentValue != $this->Tariff->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EDITDATE") && $CurrentForm->hasValue("o_EDITDATE") && $this->EDITDATE->CurrentValue != $this->EDITDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UPLOAD") && $CurrentForm->hasValue("o_UPLOAD") && $this->UPLOAD->CurrentValue != $this->UPLOAD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthDate") && $CurrentForm->hasValue("o_SAuthDate") && $this->SAuthDate->CurrentValue != $this->SAuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthBy") && $CurrentForm->hasValue("o_SAuthBy") && $this->SAuthBy->CurrentValue != $this->SAuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoRC") && $CurrentForm->hasValue("o_NoRC") && $this->NoRC->CurrentValue != $this->NoRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DispDt") && $CurrentForm->hasValue("o_DispDt") && $this->DispDt->CurrentValue != $this->DispDt->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DispUser") && $CurrentForm->hasValue("o_DispUser") && $this->DispUser->CurrentValue != $this->DispUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DispRemarks") && $CurrentForm->hasValue("o_DispRemarks") && $this->DispRemarks->CurrentValue != $this->DispRemarks->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DispMode") && $CurrentForm->hasValue("o_DispMode") && $this->DispMode->CurrentValue != $this->DispMode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProductCD") && $CurrentForm->hasValue("o_ProductCD") && $this->ProductCD->CurrentValue != $this->ProductCD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Nos") && $CurrentForm->hasValue("o_Nos") && $this->Nos->CurrentValue != $this->Nos->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_WBCPath") && $CurrentForm->hasValue("o_WBCPath") && $this->WBCPath->CurrentValue != $this->WBCPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RBCPath") && $CurrentForm->hasValue("o_RBCPath") && $this->RBCPath->CurrentValue != $this->RBCPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PTPath") && $CurrentForm->hasValue("o_PTPath") && $this->PTPath->CurrentValue != $this->PTPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ActualAmt") && $CurrentForm->hasValue("o_ActualAmt") && $this->ActualAmt->CurrentValue != $this->ActualAmt->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoSign") && $CurrentForm->hasValue("o_NoSign") && $this->NoSign->CurrentValue != $this->NoSign->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__Barcode") && $CurrentForm->hasValue("o__Barcode") && $this->_Barcode->CurrentValue != $this->_Barcode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReadTime") && $CurrentForm->hasValue("o_ReadTime") && $this->ReadTime->CurrentValue != $this->ReadTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_VailID") && $CurrentForm->hasValue("o_VailID") && $this->VailID->CurrentValue != $this->VailID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReadMachine") && $CurrentForm->hasValue("o_ReadMachine") && $this->ReadMachine->CurrentValue != $this->ReadMachine->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LabCD") && $CurrentForm->hasValue("o_LabCD") && $this->LabCD->CurrentValue != $this->LabCD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OutLabAmt") && $CurrentForm->hasValue("o_OutLabAmt") && $this->OutLabAmt->CurrentValue != $this->OutLabAmt->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProductQty") && $CurrentForm->hasValue("o_ProductQty") && $this->ProductQty->CurrentValue != $this->ProductQty->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Repeat") && $CurrentForm->hasValue("o_Repeat") && $this->Repeat->CurrentValue != $this->Repeat->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptNo") && $CurrentForm->hasValue("o_DeptNo") && $this->DeptNo->CurrentValue != $this->DeptNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Desc1") && $CurrentForm->hasValue("o_Desc1") && $this->Desc1->CurrentValue != $this->Desc1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Desc2") && $CurrentForm->hasValue("o_Desc2") && $this->Desc2->CurrentValue != $this->Desc2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RptResult") && $CurrentForm->hasValue("o_RptResult") && $this->RptResult->CurrentValue != $this->RptResult->OldValue)
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

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "flab_test_resultlistsrch");
		$filterList = Concat($filterList, $this->Branch->AdvancedSearch->toJson(), ","); // Field Branch
		$filterList = Concat($filterList, $this->SidNo->AdvancedSearch->toJson(), ","); // Field SidNo
		$filterList = Concat($filterList, $this->SidDate->AdvancedSearch->toJson(), ","); // Field SidDate
		$filterList = Concat($filterList, $this->TestCd->AdvancedSearch->toJson(), ","); // Field TestCd
		$filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
		$filterList = Concat($filterList, $this->DEptCd->AdvancedSearch->toJson(), ","); // Field DEptCd
		$filterList = Concat($filterList, $this->ProfCd->AdvancedSearch->toJson(), ","); // Field ProfCd
		$filterList = Concat($filterList, $this->LabReport->AdvancedSearch->toJson(), ","); // Field LabReport
		$filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
		$filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
		$filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
		$filterList = Concat($filterList, $this->Specimen->AdvancedSearch->toJson(), ","); // Field Specimen
		$filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
		$filterList = Concat($filterList, $this->ResultBy->AdvancedSearch->toJson(), ","); // Field ResultBy
		$filterList = Concat($filterList, $this->AuthBy->AdvancedSearch->toJson(), ","); // Field AuthBy
		$filterList = Concat($filterList, $this->AuthDate->AdvancedSearch->toJson(), ","); // Field AuthDate
		$filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
		$filterList = Concat($filterList, $this->Printed->AdvancedSearch->toJson(), ","); // Field Printed
		$filterList = Concat($filterList, $this->Dispatch->AdvancedSearch->toJson(), ","); // Field Dispatch
		$filterList = Concat($filterList, $this->LOWHIGH->AdvancedSearch->toJson(), ","); // Field LOWHIGH
		$filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
		$filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
		$filterList = Concat($filterList, $this->ResDate->AdvancedSearch->toJson(), ","); // Field ResDate
		$filterList = Concat($filterList, $this->Pic1->AdvancedSearch->toJson(), ","); // Field Pic1
		$filterList = Concat($filterList, $this->Pic2->AdvancedSearch->toJson(), ","); // Field Pic2
		$filterList = Concat($filterList, $this->GraphPath->AdvancedSearch->toJson(), ","); // Field GraphPath
		$filterList = Concat($filterList, $this->SampleDate->AdvancedSearch->toJson(), ","); // Field SampleDate
		$filterList = Concat($filterList, $this->SampleUser->AdvancedSearch->toJson(), ","); // Field SampleUser
		$filterList = Concat($filterList, $this->ReceivedDate->AdvancedSearch->toJson(), ","); // Field ReceivedDate
		$filterList = Concat($filterList, $this->ReceivedUser->AdvancedSearch->toJson(), ","); // Field ReceivedUser
		$filterList = Concat($filterList, $this->DeptRecvDate->AdvancedSearch->toJson(), ","); // Field DeptRecvDate
		$filterList = Concat($filterList, $this->DeptRecvUser->AdvancedSearch->toJson(), ","); // Field DeptRecvUser
		$filterList = Concat($filterList, $this->PrintBy->AdvancedSearch->toJson(), ","); // Field PrintBy
		$filterList = Concat($filterList, $this->PrintDate->AdvancedSearch->toJson(), ","); // Field PrintDate
		$filterList = Concat($filterList, $this->MachineCD->AdvancedSearch->toJson(), ","); // Field MachineCD
		$filterList = Concat($filterList, $this->TestCancel->AdvancedSearch->toJson(), ","); // Field TestCancel
		$filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
		$filterList = Concat($filterList, $this->Tariff->AdvancedSearch->toJson(), ","); // Field Tariff
		$filterList = Concat($filterList, $this->EDITDATE->AdvancedSearch->toJson(), ","); // Field EDITDATE
		$filterList = Concat($filterList, $this->UPLOAD->AdvancedSearch->toJson(), ","); // Field UPLOAD
		$filterList = Concat($filterList, $this->SAuthDate->AdvancedSearch->toJson(), ","); // Field SAuthDate
		$filterList = Concat($filterList, $this->SAuthBy->AdvancedSearch->toJson(), ","); // Field SAuthBy
		$filterList = Concat($filterList, $this->NoRC->AdvancedSearch->toJson(), ","); // Field NoRC
		$filterList = Concat($filterList, $this->DispDt->AdvancedSearch->toJson(), ","); // Field DispDt
		$filterList = Concat($filterList, $this->DispUser->AdvancedSearch->toJson(), ","); // Field DispUser
		$filterList = Concat($filterList, $this->DispRemarks->AdvancedSearch->toJson(), ","); // Field DispRemarks
		$filterList = Concat($filterList, $this->DispMode->AdvancedSearch->toJson(), ","); // Field DispMode
		$filterList = Concat($filterList, $this->ProductCD->AdvancedSearch->toJson(), ","); // Field ProductCD
		$filterList = Concat($filterList, $this->Nos->AdvancedSearch->toJson(), ","); // Field Nos
		$filterList = Concat($filterList, $this->WBCPath->AdvancedSearch->toJson(), ","); // Field WBCPath
		$filterList = Concat($filterList, $this->RBCPath->AdvancedSearch->toJson(), ","); // Field RBCPath
		$filterList = Concat($filterList, $this->PTPath->AdvancedSearch->toJson(), ","); // Field PTPath
		$filterList = Concat($filterList, $this->ActualAmt->AdvancedSearch->toJson(), ","); // Field ActualAmt
		$filterList = Concat($filterList, $this->NoSign->AdvancedSearch->toJson(), ","); // Field NoSign
		$filterList = Concat($filterList, $this->_Barcode->AdvancedSearch->toJson(), ","); // Field Barcode
		$filterList = Concat($filterList, $this->ReadTime->AdvancedSearch->toJson(), ","); // Field ReadTime
		$filterList = Concat($filterList, $this->Result->AdvancedSearch->toJson(), ","); // Field Result
		$filterList = Concat($filterList, $this->VailID->AdvancedSearch->toJson(), ","); // Field VailID
		$filterList = Concat($filterList, $this->ReadMachine->AdvancedSearch->toJson(), ","); // Field ReadMachine
		$filterList = Concat($filterList, $this->LabCD->AdvancedSearch->toJson(), ","); // Field LabCD
		$filterList = Concat($filterList, $this->OutLabAmt->AdvancedSearch->toJson(), ","); // Field OutLabAmt
		$filterList = Concat($filterList, $this->ProductQty->AdvancedSearch->toJson(), ","); // Field ProductQty
		$filterList = Concat($filterList, $this->Repeat->AdvancedSearch->toJson(), ","); // Field Repeat
		$filterList = Concat($filterList, $this->DeptNo->AdvancedSearch->toJson(), ","); // Field DeptNo
		$filterList = Concat($filterList, $this->Desc1->AdvancedSearch->toJson(), ","); // Field Desc1
		$filterList = Concat($filterList, $this->Desc2->AdvancedSearch->toJson(), ","); // Field Desc2
		$filterList = Concat($filterList, $this->RptResult->AdvancedSearch->toJson(), ","); // Field RptResult
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
			$UserProfile->setSearchFilters(CurrentUserName(), "flab_test_resultlistsrch", $filters);
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

		// Field Branch
		$this->Branch->AdvancedSearch->SearchValue = @$filter["x_Branch"];
		$this->Branch->AdvancedSearch->SearchOperator = @$filter["z_Branch"];
		$this->Branch->AdvancedSearch->SearchCondition = @$filter["v_Branch"];
		$this->Branch->AdvancedSearch->SearchValue2 = @$filter["y_Branch"];
		$this->Branch->AdvancedSearch->SearchOperator2 = @$filter["w_Branch"];
		$this->Branch->AdvancedSearch->save();

		// Field SidNo
		$this->SidNo->AdvancedSearch->SearchValue = @$filter["x_SidNo"];
		$this->SidNo->AdvancedSearch->SearchOperator = @$filter["z_SidNo"];
		$this->SidNo->AdvancedSearch->SearchCondition = @$filter["v_SidNo"];
		$this->SidNo->AdvancedSearch->SearchValue2 = @$filter["y_SidNo"];
		$this->SidNo->AdvancedSearch->SearchOperator2 = @$filter["w_SidNo"];
		$this->SidNo->AdvancedSearch->save();

		// Field SidDate
		$this->SidDate->AdvancedSearch->SearchValue = @$filter["x_SidDate"];
		$this->SidDate->AdvancedSearch->SearchOperator = @$filter["z_SidDate"];
		$this->SidDate->AdvancedSearch->SearchCondition = @$filter["v_SidDate"];
		$this->SidDate->AdvancedSearch->SearchValue2 = @$filter["y_SidDate"];
		$this->SidDate->AdvancedSearch->SearchOperator2 = @$filter["w_SidDate"];
		$this->SidDate->AdvancedSearch->save();

		// Field TestCd
		$this->TestCd->AdvancedSearch->SearchValue = @$filter["x_TestCd"];
		$this->TestCd->AdvancedSearch->SearchOperator = @$filter["z_TestCd"];
		$this->TestCd->AdvancedSearch->SearchCondition = @$filter["v_TestCd"];
		$this->TestCd->AdvancedSearch->SearchValue2 = @$filter["y_TestCd"];
		$this->TestCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestCd"];
		$this->TestCd->AdvancedSearch->save();

		// Field TestSubCd
		$this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
		$this->TestSubCd->AdvancedSearch->save();

		// Field DEptCd
		$this->DEptCd->AdvancedSearch->SearchValue = @$filter["x_DEptCd"];
		$this->DEptCd->AdvancedSearch->SearchOperator = @$filter["z_DEptCd"];
		$this->DEptCd->AdvancedSearch->SearchCondition = @$filter["v_DEptCd"];
		$this->DEptCd->AdvancedSearch->SearchValue2 = @$filter["y_DEptCd"];
		$this->DEptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DEptCd"];
		$this->DEptCd->AdvancedSearch->save();

		// Field ProfCd
		$this->ProfCd->AdvancedSearch->SearchValue = @$filter["x_ProfCd"];
		$this->ProfCd->AdvancedSearch->SearchOperator = @$filter["z_ProfCd"];
		$this->ProfCd->AdvancedSearch->SearchCondition = @$filter["v_ProfCd"];
		$this->ProfCd->AdvancedSearch->SearchValue2 = @$filter["y_ProfCd"];
		$this->ProfCd->AdvancedSearch->SearchOperator2 = @$filter["w_ProfCd"];
		$this->ProfCd->AdvancedSearch->save();

		// Field LabReport
		$this->LabReport->AdvancedSearch->SearchValue = @$filter["x_LabReport"];
		$this->LabReport->AdvancedSearch->SearchOperator = @$filter["z_LabReport"];
		$this->LabReport->AdvancedSearch->SearchCondition = @$filter["v_LabReport"];
		$this->LabReport->AdvancedSearch->SearchValue2 = @$filter["y_LabReport"];
		$this->LabReport->AdvancedSearch->SearchOperator2 = @$filter["w_LabReport"];
		$this->LabReport->AdvancedSearch->save();

		// Field ResultDate
		$this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
		$this->ResultDate->AdvancedSearch->save();

		// Field Comments
		$this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
		$this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
		$this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
		$this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
		$this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
		$this->Comments->AdvancedSearch->save();

		// Field Method
		$this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
		$this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
		$this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
		$this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
		$this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
		$this->Method->AdvancedSearch->save();

		// Field Specimen
		$this->Specimen->AdvancedSearch->SearchValue = @$filter["x_Specimen"];
		$this->Specimen->AdvancedSearch->SearchOperator = @$filter["z_Specimen"];
		$this->Specimen->AdvancedSearch->SearchCondition = @$filter["v_Specimen"];
		$this->Specimen->AdvancedSearch->SearchValue2 = @$filter["y_Specimen"];
		$this->Specimen->AdvancedSearch->SearchOperator2 = @$filter["w_Specimen"];
		$this->Specimen->AdvancedSearch->save();

		// Field Amount
		$this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
		$this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
		$this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
		$this->Amount->AdvancedSearch->save();

		// Field ResultBy
		$this->ResultBy->AdvancedSearch->SearchValue = @$filter["x_ResultBy"];
		$this->ResultBy->AdvancedSearch->SearchOperator = @$filter["z_ResultBy"];
		$this->ResultBy->AdvancedSearch->SearchCondition = @$filter["v_ResultBy"];
		$this->ResultBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultBy"];
		$this->ResultBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultBy"];
		$this->ResultBy->AdvancedSearch->save();

		// Field AuthBy
		$this->AuthBy->AdvancedSearch->SearchValue = @$filter["x_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchOperator = @$filter["z_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchCondition = @$filter["v_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchValue2 = @$filter["y_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_AuthBy"];
		$this->AuthBy->AdvancedSearch->save();

		// Field AuthDate
		$this->AuthDate->AdvancedSearch->SearchValue = @$filter["x_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchOperator = @$filter["z_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchCondition = @$filter["v_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchValue2 = @$filter["y_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_AuthDate"];
		$this->AuthDate->AdvancedSearch->save();

		// Field Abnormal
		$this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
		$this->Abnormal->AdvancedSearch->save();

		// Field Printed
		$this->Printed->AdvancedSearch->SearchValue = @$filter["x_Printed"];
		$this->Printed->AdvancedSearch->SearchOperator = @$filter["z_Printed"];
		$this->Printed->AdvancedSearch->SearchCondition = @$filter["v_Printed"];
		$this->Printed->AdvancedSearch->SearchValue2 = @$filter["y_Printed"];
		$this->Printed->AdvancedSearch->SearchOperator2 = @$filter["w_Printed"];
		$this->Printed->AdvancedSearch->save();

		// Field Dispatch
		$this->Dispatch->AdvancedSearch->SearchValue = @$filter["x_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchOperator = @$filter["z_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchCondition = @$filter["v_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchValue2 = @$filter["y_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchOperator2 = @$filter["w_Dispatch"];
		$this->Dispatch->AdvancedSearch->save();

		// Field LOWHIGH
		$this->LOWHIGH->AdvancedSearch->SearchValue = @$filter["x_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchOperator = @$filter["z_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchCondition = @$filter["v_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchValue2 = @$filter["y_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchOperator2 = @$filter["w_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->save();

		// Field RefValue
		$this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
		$this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
		$this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
		$this->RefValue->AdvancedSearch->save();

		// Field Unit
		$this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
		$this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
		$this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
		$this->Unit->AdvancedSearch->save();

		// Field ResDate
		$this->ResDate->AdvancedSearch->SearchValue = @$filter["x_ResDate"];
		$this->ResDate->AdvancedSearch->SearchOperator = @$filter["z_ResDate"];
		$this->ResDate->AdvancedSearch->SearchCondition = @$filter["v_ResDate"];
		$this->ResDate->AdvancedSearch->SearchValue2 = @$filter["y_ResDate"];
		$this->ResDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResDate"];
		$this->ResDate->AdvancedSearch->save();

		// Field Pic1
		$this->Pic1->AdvancedSearch->SearchValue = @$filter["x_Pic1"];
		$this->Pic1->AdvancedSearch->SearchOperator = @$filter["z_Pic1"];
		$this->Pic1->AdvancedSearch->SearchCondition = @$filter["v_Pic1"];
		$this->Pic1->AdvancedSearch->SearchValue2 = @$filter["y_Pic1"];
		$this->Pic1->AdvancedSearch->SearchOperator2 = @$filter["w_Pic1"];
		$this->Pic1->AdvancedSearch->save();

		// Field Pic2
		$this->Pic2->AdvancedSearch->SearchValue = @$filter["x_Pic2"];
		$this->Pic2->AdvancedSearch->SearchOperator = @$filter["z_Pic2"];
		$this->Pic2->AdvancedSearch->SearchCondition = @$filter["v_Pic2"];
		$this->Pic2->AdvancedSearch->SearchValue2 = @$filter["y_Pic2"];
		$this->Pic2->AdvancedSearch->SearchOperator2 = @$filter["w_Pic2"];
		$this->Pic2->AdvancedSearch->save();

		// Field GraphPath
		$this->GraphPath->AdvancedSearch->SearchValue = @$filter["x_GraphPath"];
		$this->GraphPath->AdvancedSearch->SearchOperator = @$filter["z_GraphPath"];
		$this->GraphPath->AdvancedSearch->SearchCondition = @$filter["v_GraphPath"];
		$this->GraphPath->AdvancedSearch->SearchValue2 = @$filter["y_GraphPath"];
		$this->GraphPath->AdvancedSearch->SearchOperator2 = @$filter["w_GraphPath"];
		$this->GraphPath->AdvancedSearch->save();

		// Field SampleDate
		$this->SampleDate->AdvancedSearch->SearchValue = @$filter["x_SampleDate"];
		$this->SampleDate->AdvancedSearch->SearchOperator = @$filter["z_SampleDate"];
		$this->SampleDate->AdvancedSearch->SearchCondition = @$filter["v_SampleDate"];
		$this->SampleDate->AdvancedSearch->SearchValue2 = @$filter["y_SampleDate"];
		$this->SampleDate->AdvancedSearch->SearchOperator2 = @$filter["w_SampleDate"];
		$this->SampleDate->AdvancedSearch->save();

		// Field SampleUser
		$this->SampleUser->AdvancedSearch->SearchValue = @$filter["x_SampleUser"];
		$this->SampleUser->AdvancedSearch->SearchOperator = @$filter["z_SampleUser"];
		$this->SampleUser->AdvancedSearch->SearchCondition = @$filter["v_SampleUser"];
		$this->SampleUser->AdvancedSearch->SearchValue2 = @$filter["y_SampleUser"];
		$this->SampleUser->AdvancedSearch->SearchOperator2 = @$filter["w_SampleUser"];
		$this->SampleUser->AdvancedSearch->save();

		// Field ReceivedDate
		$this->ReceivedDate->AdvancedSearch->SearchValue = @$filter["x_ReceivedDate"];
		$this->ReceivedDate->AdvancedSearch->SearchOperator = @$filter["z_ReceivedDate"];
		$this->ReceivedDate->AdvancedSearch->SearchCondition = @$filter["v_ReceivedDate"];
		$this->ReceivedDate->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedDate"];
		$this->ReceivedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedDate"];
		$this->ReceivedDate->AdvancedSearch->save();

		// Field ReceivedUser
		$this->ReceivedUser->AdvancedSearch->SearchValue = @$filter["x_ReceivedUser"];
		$this->ReceivedUser->AdvancedSearch->SearchOperator = @$filter["z_ReceivedUser"];
		$this->ReceivedUser->AdvancedSearch->SearchCondition = @$filter["v_ReceivedUser"];
		$this->ReceivedUser->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedUser"];
		$this->ReceivedUser->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedUser"];
		$this->ReceivedUser->AdvancedSearch->save();

		// Field DeptRecvDate
		$this->DeptRecvDate->AdvancedSearch->SearchValue = @$filter["x_DeptRecvDate"];
		$this->DeptRecvDate->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvDate"];
		$this->DeptRecvDate->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvDate"];
		$this->DeptRecvDate->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvDate"];
		$this->DeptRecvDate->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvDate"];
		$this->DeptRecvDate->AdvancedSearch->save();

		// Field DeptRecvUser
		$this->DeptRecvUser->AdvancedSearch->SearchValue = @$filter["x_DeptRecvUser"];
		$this->DeptRecvUser->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvUser"];
		$this->DeptRecvUser->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvUser"];
		$this->DeptRecvUser->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvUser"];
		$this->DeptRecvUser->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvUser"];
		$this->DeptRecvUser->AdvancedSearch->save();

		// Field PrintBy
		$this->PrintBy->AdvancedSearch->SearchValue = @$filter["x_PrintBy"];
		$this->PrintBy->AdvancedSearch->SearchOperator = @$filter["z_PrintBy"];
		$this->PrintBy->AdvancedSearch->SearchCondition = @$filter["v_PrintBy"];
		$this->PrintBy->AdvancedSearch->SearchValue2 = @$filter["y_PrintBy"];
		$this->PrintBy->AdvancedSearch->SearchOperator2 = @$filter["w_PrintBy"];
		$this->PrintBy->AdvancedSearch->save();

		// Field PrintDate
		$this->PrintDate->AdvancedSearch->SearchValue = @$filter["x_PrintDate"];
		$this->PrintDate->AdvancedSearch->SearchOperator = @$filter["z_PrintDate"];
		$this->PrintDate->AdvancedSearch->SearchCondition = @$filter["v_PrintDate"];
		$this->PrintDate->AdvancedSearch->SearchValue2 = @$filter["y_PrintDate"];
		$this->PrintDate->AdvancedSearch->SearchOperator2 = @$filter["w_PrintDate"];
		$this->PrintDate->AdvancedSearch->save();

		// Field MachineCD
		$this->MachineCD->AdvancedSearch->SearchValue = @$filter["x_MachineCD"];
		$this->MachineCD->AdvancedSearch->SearchOperator = @$filter["z_MachineCD"];
		$this->MachineCD->AdvancedSearch->SearchCondition = @$filter["v_MachineCD"];
		$this->MachineCD->AdvancedSearch->SearchValue2 = @$filter["y_MachineCD"];
		$this->MachineCD->AdvancedSearch->SearchOperator2 = @$filter["w_MachineCD"];
		$this->MachineCD->AdvancedSearch->save();

		// Field TestCancel
		$this->TestCancel->AdvancedSearch->SearchValue = @$filter["x_TestCancel"];
		$this->TestCancel->AdvancedSearch->SearchOperator = @$filter["z_TestCancel"];
		$this->TestCancel->AdvancedSearch->SearchCondition = @$filter["v_TestCancel"];
		$this->TestCancel->AdvancedSearch->SearchValue2 = @$filter["y_TestCancel"];
		$this->TestCancel->AdvancedSearch->SearchOperator2 = @$filter["w_TestCancel"];
		$this->TestCancel->AdvancedSearch->save();

		// Field OutSource
		$this->OutSource->AdvancedSearch->SearchValue = @$filter["x_OutSource"];
		$this->OutSource->AdvancedSearch->SearchOperator = @$filter["z_OutSource"];
		$this->OutSource->AdvancedSearch->SearchCondition = @$filter["v_OutSource"];
		$this->OutSource->AdvancedSearch->SearchValue2 = @$filter["y_OutSource"];
		$this->OutSource->AdvancedSearch->SearchOperator2 = @$filter["w_OutSource"];
		$this->OutSource->AdvancedSearch->save();

		// Field Tariff
		$this->Tariff->AdvancedSearch->SearchValue = @$filter["x_Tariff"];
		$this->Tariff->AdvancedSearch->SearchOperator = @$filter["z_Tariff"];
		$this->Tariff->AdvancedSearch->SearchCondition = @$filter["v_Tariff"];
		$this->Tariff->AdvancedSearch->SearchValue2 = @$filter["y_Tariff"];
		$this->Tariff->AdvancedSearch->SearchOperator2 = @$filter["w_Tariff"];
		$this->Tariff->AdvancedSearch->save();

		// Field EDITDATE
		$this->EDITDATE->AdvancedSearch->SearchValue = @$filter["x_EDITDATE"];
		$this->EDITDATE->AdvancedSearch->SearchOperator = @$filter["z_EDITDATE"];
		$this->EDITDATE->AdvancedSearch->SearchCondition = @$filter["v_EDITDATE"];
		$this->EDITDATE->AdvancedSearch->SearchValue2 = @$filter["y_EDITDATE"];
		$this->EDITDATE->AdvancedSearch->SearchOperator2 = @$filter["w_EDITDATE"];
		$this->EDITDATE->AdvancedSearch->save();

		// Field UPLOAD
		$this->UPLOAD->AdvancedSearch->SearchValue = @$filter["x_UPLOAD"];
		$this->UPLOAD->AdvancedSearch->SearchOperator = @$filter["z_UPLOAD"];
		$this->UPLOAD->AdvancedSearch->SearchCondition = @$filter["v_UPLOAD"];
		$this->UPLOAD->AdvancedSearch->SearchValue2 = @$filter["y_UPLOAD"];
		$this->UPLOAD->AdvancedSearch->SearchOperator2 = @$filter["w_UPLOAD"];
		$this->UPLOAD->AdvancedSearch->save();

		// Field SAuthDate
		$this->SAuthDate->AdvancedSearch->SearchValue = @$filter["x_SAuthDate"];
		$this->SAuthDate->AdvancedSearch->SearchOperator = @$filter["z_SAuthDate"];
		$this->SAuthDate->AdvancedSearch->SearchCondition = @$filter["v_SAuthDate"];
		$this->SAuthDate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthDate"];
		$this->SAuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthDate"];
		$this->SAuthDate->AdvancedSearch->save();

		// Field SAuthBy
		$this->SAuthBy->AdvancedSearch->SearchValue = @$filter["x_SAuthBy"];
		$this->SAuthBy->AdvancedSearch->SearchOperator = @$filter["z_SAuthBy"];
		$this->SAuthBy->AdvancedSearch->SearchCondition = @$filter["v_SAuthBy"];
		$this->SAuthBy->AdvancedSearch->SearchValue2 = @$filter["y_SAuthBy"];
		$this->SAuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthBy"];
		$this->SAuthBy->AdvancedSearch->save();

		// Field NoRC
		$this->NoRC->AdvancedSearch->SearchValue = @$filter["x_NoRC"];
		$this->NoRC->AdvancedSearch->SearchOperator = @$filter["z_NoRC"];
		$this->NoRC->AdvancedSearch->SearchCondition = @$filter["v_NoRC"];
		$this->NoRC->AdvancedSearch->SearchValue2 = @$filter["y_NoRC"];
		$this->NoRC->AdvancedSearch->SearchOperator2 = @$filter["w_NoRC"];
		$this->NoRC->AdvancedSearch->save();

		// Field DispDt
		$this->DispDt->AdvancedSearch->SearchValue = @$filter["x_DispDt"];
		$this->DispDt->AdvancedSearch->SearchOperator = @$filter["z_DispDt"];
		$this->DispDt->AdvancedSearch->SearchCondition = @$filter["v_DispDt"];
		$this->DispDt->AdvancedSearch->SearchValue2 = @$filter["y_DispDt"];
		$this->DispDt->AdvancedSearch->SearchOperator2 = @$filter["w_DispDt"];
		$this->DispDt->AdvancedSearch->save();

		// Field DispUser
		$this->DispUser->AdvancedSearch->SearchValue = @$filter["x_DispUser"];
		$this->DispUser->AdvancedSearch->SearchOperator = @$filter["z_DispUser"];
		$this->DispUser->AdvancedSearch->SearchCondition = @$filter["v_DispUser"];
		$this->DispUser->AdvancedSearch->SearchValue2 = @$filter["y_DispUser"];
		$this->DispUser->AdvancedSearch->SearchOperator2 = @$filter["w_DispUser"];
		$this->DispUser->AdvancedSearch->save();

		// Field DispRemarks
		$this->DispRemarks->AdvancedSearch->SearchValue = @$filter["x_DispRemarks"];
		$this->DispRemarks->AdvancedSearch->SearchOperator = @$filter["z_DispRemarks"];
		$this->DispRemarks->AdvancedSearch->SearchCondition = @$filter["v_DispRemarks"];
		$this->DispRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DispRemarks"];
		$this->DispRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DispRemarks"];
		$this->DispRemarks->AdvancedSearch->save();

		// Field DispMode
		$this->DispMode->AdvancedSearch->SearchValue = @$filter["x_DispMode"];
		$this->DispMode->AdvancedSearch->SearchOperator = @$filter["z_DispMode"];
		$this->DispMode->AdvancedSearch->SearchCondition = @$filter["v_DispMode"];
		$this->DispMode->AdvancedSearch->SearchValue2 = @$filter["y_DispMode"];
		$this->DispMode->AdvancedSearch->SearchOperator2 = @$filter["w_DispMode"];
		$this->DispMode->AdvancedSearch->save();

		// Field ProductCD
		$this->ProductCD->AdvancedSearch->SearchValue = @$filter["x_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchOperator = @$filter["z_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchCondition = @$filter["v_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchValue2 = @$filter["y_ProductCD"];
		$this->ProductCD->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCD"];
		$this->ProductCD->AdvancedSearch->save();

		// Field Nos
		$this->Nos->AdvancedSearch->SearchValue = @$filter["x_Nos"];
		$this->Nos->AdvancedSearch->SearchOperator = @$filter["z_Nos"];
		$this->Nos->AdvancedSearch->SearchCondition = @$filter["v_Nos"];
		$this->Nos->AdvancedSearch->SearchValue2 = @$filter["y_Nos"];
		$this->Nos->AdvancedSearch->SearchOperator2 = @$filter["w_Nos"];
		$this->Nos->AdvancedSearch->save();

		// Field WBCPath
		$this->WBCPath->AdvancedSearch->SearchValue = @$filter["x_WBCPath"];
		$this->WBCPath->AdvancedSearch->SearchOperator = @$filter["z_WBCPath"];
		$this->WBCPath->AdvancedSearch->SearchCondition = @$filter["v_WBCPath"];
		$this->WBCPath->AdvancedSearch->SearchValue2 = @$filter["y_WBCPath"];
		$this->WBCPath->AdvancedSearch->SearchOperator2 = @$filter["w_WBCPath"];
		$this->WBCPath->AdvancedSearch->save();

		// Field RBCPath
		$this->RBCPath->AdvancedSearch->SearchValue = @$filter["x_RBCPath"];
		$this->RBCPath->AdvancedSearch->SearchOperator = @$filter["z_RBCPath"];
		$this->RBCPath->AdvancedSearch->SearchCondition = @$filter["v_RBCPath"];
		$this->RBCPath->AdvancedSearch->SearchValue2 = @$filter["y_RBCPath"];
		$this->RBCPath->AdvancedSearch->SearchOperator2 = @$filter["w_RBCPath"];
		$this->RBCPath->AdvancedSearch->save();

		// Field PTPath
		$this->PTPath->AdvancedSearch->SearchValue = @$filter["x_PTPath"];
		$this->PTPath->AdvancedSearch->SearchOperator = @$filter["z_PTPath"];
		$this->PTPath->AdvancedSearch->SearchCondition = @$filter["v_PTPath"];
		$this->PTPath->AdvancedSearch->SearchValue2 = @$filter["y_PTPath"];
		$this->PTPath->AdvancedSearch->SearchOperator2 = @$filter["w_PTPath"];
		$this->PTPath->AdvancedSearch->save();

		// Field ActualAmt
		$this->ActualAmt->AdvancedSearch->SearchValue = @$filter["x_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchOperator = @$filter["z_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchCondition = @$filter["v_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchValue2 = @$filter["y_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ActualAmt"];
		$this->ActualAmt->AdvancedSearch->save();

		// Field NoSign
		$this->NoSign->AdvancedSearch->SearchValue = @$filter["x_NoSign"];
		$this->NoSign->AdvancedSearch->SearchOperator = @$filter["z_NoSign"];
		$this->NoSign->AdvancedSearch->SearchCondition = @$filter["v_NoSign"];
		$this->NoSign->AdvancedSearch->SearchValue2 = @$filter["y_NoSign"];
		$this->NoSign->AdvancedSearch->SearchOperator2 = @$filter["w_NoSign"];
		$this->NoSign->AdvancedSearch->save();

		// Field Barcode
		$this->_Barcode->AdvancedSearch->SearchValue = @$filter["x__Barcode"];
		$this->_Barcode->AdvancedSearch->SearchOperator = @$filter["z__Barcode"];
		$this->_Barcode->AdvancedSearch->SearchCondition = @$filter["v__Barcode"];
		$this->_Barcode->AdvancedSearch->SearchValue2 = @$filter["y__Barcode"];
		$this->_Barcode->AdvancedSearch->SearchOperator2 = @$filter["w__Barcode"];
		$this->_Barcode->AdvancedSearch->save();

		// Field ReadTime
		$this->ReadTime->AdvancedSearch->SearchValue = @$filter["x_ReadTime"];
		$this->ReadTime->AdvancedSearch->SearchOperator = @$filter["z_ReadTime"];
		$this->ReadTime->AdvancedSearch->SearchCondition = @$filter["v_ReadTime"];
		$this->ReadTime->AdvancedSearch->SearchValue2 = @$filter["y_ReadTime"];
		$this->ReadTime->AdvancedSearch->SearchOperator2 = @$filter["w_ReadTime"];
		$this->ReadTime->AdvancedSearch->save();

		// Field Result
		$this->Result->AdvancedSearch->SearchValue = @$filter["x_Result"];
		$this->Result->AdvancedSearch->SearchOperator = @$filter["z_Result"];
		$this->Result->AdvancedSearch->SearchCondition = @$filter["v_Result"];
		$this->Result->AdvancedSearch->SearchValue2 = @$filter["y_Result"];
		$this->Result->AdvancedSearch->SearchOperator2 = @$filter["w_Result"];
		$this->Result->AdvancedSearch->save();

		// Field VailID
		$this->VailID->AdvancedSearch->SearchValue = @$filter["x_VailID"];
		$this->VailID->AdvancedSearch->SearchOperator = @$filter["z_VailID"];
		$this->VailID->AdvancedSearch->SearchCondition = @$filter["v_VailID"];
		$this->VailID->AdvancedSearch->SearchValue2 = @$filter["y_VailID"];
		$this->VailID->AdvancedSearch->SearchOperator2 = @$filter["w_VailID"];
		$this->VailID->AdvancedSearch->save();

		// Field ReadMachine
		$this->ReadMachine->AdvancedSearch->SearchValue = @$filter["x_ReadMachine"];
		$this->ReadMachine->AdvancedSearch->SearchOperator = @$filter["z_ReadMachine"];
		$this->ReadMachine->AdvancedSearch->SearchCondition = @$filter["v_ReadMachine"];
		$this->ReadMachine->AdvancedSearch->SearchValue2 = @$filter["y_ReadMachine"];
		$this->ReadMachine->AdvancedSearch->SearchOperator2 = @$filter["w_ReadMachine"];
		$this->ReadMachine->AdvancedSearch->save();

		// Field LabCD
		$this->LabCD->AdvancedSearch->SearchValue = @$filter["x_LabCD"];
		$this->LabCD->AdvancedSearch->SearchOperator = @$filter["z_LabCD"];
		$this->LabCD->AdvancedSearch->SearchCondition = @$filter["v_LabCD"];
		$this->LabCD->AdvancedSearch->SearchValue2 = @$filter["y_LabCD"];
		$this->LabCD->AdvancedSearch->SearchOperator2 = @$filter["w_LabCD"];
		$this->LabCD->AdvancedSearch->save();

		// Field OutLabAmt
		$this->OutLabAmt->AdvancedSearch->SearchValue = @$filter["x_OutLabAmt"];
		$this->OutLabAmt->AdvancedSearch->SearchOperator = @$filter["z_OutLabAmt"];
		$this->OutLabAmt->AdvancedSearch->SearchCondition = @$filter["v_OutLabAmt"];
		$this->OutLabAmt->AdvancedSearch->SearchValue2 = @$filter["y_OutLabAmt"];
		$this->OutLabAmt->AdvancedSearch->SearchOperator2 = @$filter["w_OutLabAmt"];
		$this->OutLabAmt->AdvancedSearch->save();

		// Field ProductQty
		$this->ProductQty->AdvancedSearch->SearchValue = @$filter["x_ProductQty"];
		$this->ProductQty->AdvancedSearch->SearchOperator = @$filter["z_ProductQty"];
		$this->ProductQty->AdvancedSearch->SearchCondition = @$filter["v_ProductQty"];
		$this->ProductQty->AdvancedSearch->SearchValue2 = @$filter["y_ProductQty"];
		$this->ProductQty->AdvancedSearch->SearchOperator2 = @$filter["w_ProductQty"];
		$this->ProductQty->AdvancedSearch->save();

		// Field Repeat
		$this->Repeat->AdvancedSearch->SearchValue = @$filter["x_Repeat"];
		$this->Repeat->AdvancedSearch->SearchOperator = @$filter["z_Repeat"];
		$this->Repeat->AdvancedSearch->SearchCondition = @$filter["v_Repeat"];
		$this->Repeat->AdvancedSearch->SearchValue2 = @$filter["y_Repeat"];
		$this->Repeat->AdvancedSearch->SearchOperator2 = @$filter["w_Repeat"];
		$this->Repeat->AdvancedSearch->save();

		// Field DeptNo
		$this->DeptNo->AdvancedSearch->SearchValue = @$filter["x_DeptNo"];
		$this->DeptNo->AdvancedSearch->SearchOperator = @$filter["z_DeptNo"];
		$this->DeptNo->AdvancedSearch->SearchCondition = @$filter["v_DeptNo"];
		$this->DeptNo->AdvancedSearch->SearchValue2 = @$filter["y_DeptNo"];
		$this->DeptNo->AdvancedSearch->SearchOperator2 = @$filter["w_DeptNo"];
		$this->DeptNo->AdvancedSearch->save();

		// Field Desc1
		$this->Desc1->AdvancedSearch->SearchValue = @$filter["x_Desc1"];
		$this->Desc1->AdvancedSearch->SearchOperator = @$filter["z_Desc1"];
		$this->Desc1->AdvancedSearch->SearchCondition = @$filter["v_Desc1"];
		$this->Desc1->AdvancedSearch->SearchValue2 = @$filter["y_Desc1"];
		$this->Desc1->AdvancedSearch->SearchOperator2 = @$filter["w_Desc1"];
		$this->Desc1->AdvancedSearch->save();

		// Field Desc2
		$this->Desc2->AdvancedSearch->SearchValue = @$filter["x_Desc2"];
		$this->Desc2->AdvancedSearch->SearchOperator = @$filter["z_Desc2"];
		$this->Desc2->AdvancedSearch->SearchCondition = @$filter["v_Desc2"];
		$this->Desc2->AdvancedSearch->SearchValue2 = @$filter["y_Desc2"];
		$this->Desc2->AdvancedSearch->SearchOperator2 = @$filter["w_Desc2"];
		$this->Desc2->AdvancedSearch->save();

		// Field RptResult
		$this->RptResult->AdvancedSearch->SearchValue = @$filter["x_RptResult"];
		$this->RptResult->AdvancedSearch->SearchOperator = @$filter["z_RptResult"];
		$this->RptResult->AdvancedSearch->SearchCondition = @$filter["v_RptResult"];
		$this->RptResult->AdvancedSearch->SearchValue2 = @$filter["y_RptResult"];
		$this->RptResult->AdvancedSearch->SearchOperator2 = @$filter["w_RptResult"];
		$this->RptResult->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->Branch, $default, FALSE); // Branch
		$this->buildSearchSql($where, $this->SidNo, $default, FALSE); // SidNo
		$this->buildSearchSql($where, $this->SidDate, $default, FALSE); // SidDate
		$this->buildSearchSql($where, $this->TestCd, $default, FALSE); // TestCd
		$this->buildSearchSql($where, $this->TestSubCd, $default, FALSE); // TestSubCd
		$this->buildSearchSql($where, $this->DEptCd, $default, FALSE); // DEptCd
		$this->buildSearchSql($where, $this->ProfCd, $default, FALSE); // ProfCd
		$this->buildSearchSql($where, $this->LabReport, $default, FALSE); // LabReport
		$this->buildSearchSql($where, $this->ResultDate, $default, FALSE); // ResultDate
		$this->buildSearchSql($where, $this->Comments, $default, FALSE); // Comments
		$this->buildSearchSql($where, $this->Method, $default, FALSE); // Method
		$this->buildSearchSql($where, $this->Specimen, $default, FALSE); // Specimen
		$this->buildSearchSql($where, $this->Amount, $default, FALSE); // Amount
		$this->buildSearchSql($where, $this->ResultBy, $default, FALSE); // ResultBy
		$this->buildSearchSql($where, $this->AuthBy, $default, FALSE); // AuthBy
		$this->buildSearchSql($where, $this->AuthDate, $default, FALSE); // AuthDate
		$this->buildSearchSql($where, $this->Abnormal, $default, FALSE); // Abnormal
		$this->buildSearchSql($where, $this->Printed, $default, FALSE); // Printed
		$this->buildSearchSql($where, $this->Dispatch, $default, FALSE); // Dispatch
		$this->buildSearchSql($where, $this->LOWHIGH, $default, FALSE); // LOWHIGH
		$this->buildSearchSql($where, $this->RefValue, $default, FALSE); // RefValue
		$this->buildSearchSql($where, $this->Unit, $default, FALSE); // Unit
		$this->buildSearchSql($where, $this->ResDate, $default, FALSE); // ResDate
		$this->buildSearchSql($where, $this->Pic1, $default, FALSE); // Pic1
		$this->buildSearchSql($where, $this->Pic2, $default, FALSE); // Pic2
		$this->buildSearchSql($where, $this->GraphPath, $default, FALSE); // GraphPath
		$this->buildSearchSql($where, $this->SampleDate, $default, FALSE); // SampleDate
		$this->buildSearchSql($where, $this->SampleUser, $default, FALSE); // SampleUser
		$this->buildSearchSql($where, $this->ReceivedDate, $default, FALSE); // ReceivedDate
		$this->buildSearchSql($where, $this->ReceivedUser, $default, FALSE); // ReceivedUser
		$this->buildSearchSql($where, $this->DeptRecvDate, $default, FALSE); // DeptRecvDate
		$this->buildSearchSql($where, $this->DeptRecvUser, $default, FALSE); // DeptRecvUser
		$this->buildSearchSql($where, $this->PrintBy, $default, FALSE); // PrintBy
		$this->buildSearchSql($where, $this->PrintDate, $default, FALSE); // PrintDate
		$this->buildSearchSql($where, $this->MachineCD, $default, FALSE); // MachineCD
		$this->buildSearchSql($where, $this->TestCancel, $default, FALSE); // TestCancel
		$this->buildSearchSql($where, $this->OutSource, $default, FALSE); // OutSource
		$this->buildSearchSql($where, $this->Tariff, $default, FALSE); // Tariff
		$this->buildSearchSql($where, $this->EDITDATE, $default, FALSE); // EDITDATE
		$this->buildSearchSql($where, $this->UPLOAD, $default, FALSE); // UPLOAD
		$this->buildSearchSql($where, $this->SAuthDate, $default, FALSE); // SAuthDate
		$this->buildSearchSql($where, $this->SAuthBy, $default, FALSE); // SAuthBy
		$this->buildSearchSql($where, $this->NoRC, $default, FALSE); // NoRC
		$this->buildSearchSql($where, $this->DispDt, $default, FALSE); // DispDt
		$this->buildSearchSql($where, $this->DispUser, $default, FALSE); // DispUser
		$this->buildSearchSql($where, $this->DispRemarks, $default, FALSE); // DispRemarks
		$this->buildSearchSql($where, $this->DispMode, $default, FALSE); // DispMode
		$this->buildSearchSql($where, $this->ProductCD, $default, FALSE); // ProductCD
		$this->buildSearchSql($where, $this->Nos, $default, FALSE); // Nos
		$this->buildSearchSql($where, $this->WBCPath, $default, FALSE); // WBCPath
		$this->buildSearchSql($where, $this->RBCPath, $default, FALSE); // RBCPath
		$this->buildSearchSql($where, $this->PTPath, $default, FALSE); // PTPath
		$this->buildSearchSql($where, $this->ActualAmt, $default, FALSE); // ActualAmt
		$this->buildSearchSql($where, $this->NoSign, $default, FALSE); // NoSign
		$this->buildSearchSql($where, $this->_Barcode, $default, FALSE); // Barcode
		$this->buildSearchSql($where, $this->ReadTime, $default, FALSE); // ReadTime
		$this->buildSearchSql($where, $this->Result, $default, FALSE); // Result
		$this->buildSearchSql($where, $this->VailID, $default, FALSE); // VailID
		$this->buildSearchSql($where, $this->ReadMachine, $default, FALSE); // ReadMachine
		$this->buildSearchSql($where, $this->LabCD, $default, FALSE); // LabCD
		$this->buildSearchSql($where, $this->OutLabAmt, $default, FALSE); // OutLabAmt
		$this->buildSearchSql($where, $this->ProductQty, $default, FALSE); // ProductQty
		$this->buildSearchSql($where, $this->Repeat, $default, FALSE); // Repeat
		$this->buildSearchSql($where, $this->DeptNo, $default, FALSE); // DeptNo
		$this->buildSearchSql($where, $this->Desc1, $default, FALSE); // Desc1
		$this->buildSearchSql($where, $this->Desc2, $default, FALSE); // Desc2
		$this->buildSearchSql($where, $this->RptResult, $default, FALSE); // RptResult

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->Branch->AdvancedSearch->save(); // Branch
			$this->SidNo->AdvancedSearch->save(); // SidNo
			$this->SidDate->AdvancedSearch->save(); // SidDate
			$this->TestCd->AdvancedSearch->save(); // TestCd
			$this->TestSubCd->AdvancedSearch->save(); // TestSubCd
			$this->DEptCd->AdvancedSearch->save(); // DEptCd
			$this->ProfCd->AdvancedSearch->save(); // ProfCd
			$this->LabReport->AdvancedSearch->save(); // LabReport
			$this->ResultDate->AdvancedSearch->save(); // ResultDate
			$this->Comments->AdvancedSearch->save(); // Comments
			$this->Method->AdvancedSearch->save(); // Method
			$this->Specimen->AdvancedSearch->save(); // Specimen
			$this->Amount->AdvancedSearch->save(); // Amount
			$this->ResultBy->AdvancedSearch->save(); // ResultBy
			$this->AuthBy->AdvancedSearch->save(); // AuthBy
			$this->AuthDate->AdvancedSearch->save(); // AuthDate
			$this->Abnormal->AdvancedSearch->save(); // Abnormal
			$this->Printed->AdvancedSearch->save(); // Printed
			$this->Dispatch->AdvancedSearch->save(); // Dispatch
			$this->LOWHIGH->AdvancedSearch->save(); // LOWHIGH
			$this->RefValue->AdvancedSearch->save(); // RefValue
			$this->Unit->AdvancedSearch->save(); // Unit
			$this->ResDate->AdvancedSearch->save(); // ResDate
			$this->Pic1->AdvancedSearch->save(); // Pic1
			$this->Pic2->AdvancedSearch->save(); // Pic2
			$this->GraphPath->AdvancedSearch->save(); // GraphPath
			$this->SampleDate->AdvancedSearch->save(); // SampleDate
			$this->SampleUser->AdvancedSearch->save(); // SampleUser
			$this->ReceivedDate->AdvancedSearch->save(); // ReceivedDate
			$this->ReceivedUser->AdvancedSearch->save(); // ReceivedUser
			$this->DeptRecvDate->AdvancedSearch->save(); // DeptRecvDate
			$this->DeptRecvUser->AdvancedSearch->save(); // DeptRecvUser
			$this->PrintBy->AdvancedSearch->save(); // PrintBy
			$this->PrintDate->AdvancedSearch->save(); // PrintDate
			$this->MachineCD->AdvancedSearch->save(); // MachineCD
			$this->TestCancel->AdvancedSearch->save(); // TestCancel
			$this->OutSource->AdvancedSearch->save(); // OutSource
			$this->Tariff->AdvancedSearch->save(); // Tariff
			$this->EDITDATE->AdvancedSearch->save(); // EDITDATE
			$this->UPLOAD->AdvancedSearch->save(); // UPLOAD
			$this->SAuthDate->AdvancedSearch->save(); // SAuthDate
			$this->SAuthBy->AdvancedSearch->save(); // SAuthBy
			$this->NoRC->AdvancedSearch->save(); // NoRC
			$this->DispDt->AdvancedSearch->save(); // DispDt
			$this->DispUser->AdvancedSearch->save(); // DispUser
			$this->DispRemarks->AdvancedSearch->save(); // DispRemarks
			$this->DispMode->AdvancedSearch->save(); // DispMode
			$this->ProductCD->AdvancedSearch->save(); // ProductCD
			$this->Nos->AdvancedSearch->save(); // Nos
			$this->WBCPath->AdvancedSearch->save(); // WBCPath
			$this->RBCPath->AdvancedSearch->save(); // RBCPath
			$this->PTPath->AdvancedSearch->save(); // PTPath
			$this->ActualAmt->AdvancedSearch->save(); // ActualAmt
			$this->NoSign->AdvancedSearch->save(); // NoSign
			$this->_Barcode->AdvancedSearch->save(); // Barcode
			$this->ReadTime->AdvancedSearch->save(); // ReadTime
			$this->Result->AdvancedSearch->save(); // Result
			$this->VailID->AdvancedSearch->save(); // VailID
			$this->ReadMachine->AdvancedSearch->save(); // ReadMachine
			$this->LabCD->AdvancedSearch->save(); // LabCD
			$this->OutLabAmt->AdvancedSearch->save(); // OutLabAmt
			$this->ProductQty->AdvancedSearch->save(); // ProductQty
			$this->Repeat->AdvancedSearch->save(); // Repeat
			$this->DeptNo->AdvancedSearch->save(); // DeptNo
			$this->Desc1->AdvancedSearch->save(); // Desc1
			$this->Desc2->AdvancedSearch->save(); // Desc2
			$this->RptResult->AdvancedSearch->save(); // RptResult
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
		$this->buildBasicSearchSql($where, $this->Branch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SidNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DEptCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProfCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LabReport, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Specimen, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ResultBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AuthBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Printed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Dispatch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LOWHIGH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Unit, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pic1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pic2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GraphPath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SampleUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReceivedUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeptRecvUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrintBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MachineCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestCancel, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UPLOAD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SAuthBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DispUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DispRemarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DispMode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProductCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WBCPath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RBCPath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PTPath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoSign, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->_Barcode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Result, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VailID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReadMachine, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LabCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Repeat, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeptNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Desc1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Desc2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RptResult, $arKeywords, $type);
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
		if ($this->Branch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SidNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SidDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestSubCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DEptCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProfCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LabReport->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResultDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Comments->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Method->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Specimen->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResultBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AuthBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AuthDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Abnormal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Printed->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dispatch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LOWHIGH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RefValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pic1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pic2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GraphPath->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SampleDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SampleUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReceivedDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReceivedUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptRecvDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptRecvUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrintBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrintDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MachineCD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestCancel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OutSource->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Tariff->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EDITDATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UPLOAD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAuthDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAuthBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DispDt->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DispUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DispRemarks->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DispMode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProductCD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nos->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WBCPath->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RBCPath->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PTPath->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ActualAmt->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoSign->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->_Barcode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReadTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Result->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VailID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReadMachine->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LabCD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OutLabAmt->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProductQty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Repeat->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Desc1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Desc2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RptResult->AdvancedSearch->issetSession())
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
		$this->Branch->AdvancedSearch->unsetSession();
		$this->SidNo->AdvancedSearch->unsetSession();
		$this->SidDate->AdvancedSearch->unsetSession();
		$this->TestCd->AdvancedSearch->unsetSession();
		$this->TestSubCd->AdvancedSearch->unsetSession();
		$this->DEptCd->AdvancedSearch->unsetSession();
		$this->ProfCd->AdvancedSearch->unsetSession();
		$this->LabReport->AdvancedSearch->unsetSession();
		$this->ResultDate->AdvancedSearch->unsetSession();
		$this->Comments->AdvancedSearch->unsetSession();
		$this->Method->AdvancedSearch->unsetSession();
		$this->Specimen->AdvancedSearch->unsetSession();
		$this->Amount->AdvancedSearch->unsetSession();
		$this->ResultBy->AdvancedSearch->unsetSession();
		$this->AuthBy->AdvancedSearch->unsetSession();
		$this->AuthDate->AdvancedSearch->unsetSession();
		$this->Abnormal->AdvancedSearch->unsetSession();
		$this->Printed->AdvancedSearch->unsetSession();
		$this->Dispatch->AdvancedSearch->unsetSession();
		$this->LOWHIGH->AdvancedSearch->unsetSession();
		$this->RefValue->AdvancedSearch->unsetSession();
		$this->Unit->AdvancedSearch->unsetSession();
		$this->ResDate->AdvancedSearch->unsetSession();
		$this->Pic1->AdvancedSearch->unsetSession();
		$this->Pic2->AdvancedSearch->unsetSession();
		$this->GraphPath->AdvancedSearch->unsetSession();
		$this->SampleDate->AdvancedSearch->unsetSession();
		$this->SampleUser->AdvancedSearch->unsetSession();
		$this->ReceivedDate->AdvancedSearch->unsetSession();
		$this->ReceivedUser->AdvancedSearch->unsetSession();
		$this->DeptRecvDate->AdvancedSearch->unsetSession();
		$this->DeptRecvUser->AdvancedSearch->unsetSession();
		$this->PrintBy->AdvancedSearch->unsetSession();
		$this->PrintDate->AdvancedSearch->unsetSession();
		$this->MachineCD->AdvancedSearch->unsetSession();
		$this->TestCancel->AdvancedSearch->unsetSession();
		$this->OutSource->AdvancedSearch->unsetSession();
		$this->Tariff->AdvancedSearch->unsetSession();
		$this->EDITDATE->AdvancedSearch->unsetSession();
		$this->UPLOAD->AdvancedSearch->unsetSession();
		$this->SAuthDate->AdvancedSearch->unsetSession();
		$this->SAuthBy->AdvancedSearch->unsetSession();
		$this->NoRC->AdvancedSearch->unsetSession();
		$this->DispDt->AdvancedSearch->unsetSession();
		$this->DispUser->AdvancedSearch->unsetSession();
		$this->DispRemarks->AdvancedSearch->unsetSession();
		$this->DispMode->AdvancedSearch->unsetSession();
		$this->ProductCD->AdvancedSearch->unsetSession();
		$this->Nos->AdvancedSearch->unsetSession();
		$this->WBCPath->AdvancedSearch->unsetSession();
		$this->RBCPath->AdvancedSearch->unsetSession();
		$this->PTPath->AdvancedSearch->unsetSession();
		$this->ActualAmt->AdvancedSearch->unsetSession();
		$this->NoSign->AdvancedSearch->unsetSession();
		$this->_Barcode->AdvancedSearch->unsetSession();
		$this->ReadTime->AdvancedSearch->unsetSession();
		$this->Result->AdvancedSearch->unsetSession();
		$this->VailID->AdvancedSearch->unsetSession();
		$this->ReadMachine->AdvancedSearch->unsetSession();
		$this->LabCD->AdvancedSearch->unsetSession();
		$this->OutLabAmt->AdvancedSearch->unsetSession();
		$this->ProductQty->AdvancedSearch->unsetSession();
		$this->Repeat->AdvancedSearch->unsetSession();
		$this->DeptNo->AdvancedSearch->unsetSession();
		$this->Desc1->AdvancedSearch->unsetSession();
		$this->Desc2->AdvancedSearch->unsetSession();
		$this->RptResult->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->Branch->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->SidDate->AdvancedSearch->load();
		$this->TestCd->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->ResultBy->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->ResDate->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Tariff->AdvancedSearch->load();
		$this->EDITDATE->AdvancedSearch->load();
		$this->UPLOAD->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->NoRC->AdvancedSearch->load();
		$this->DispDt->AdvancedSearch->load();
		$this->DispUser->AdvancedSearch->load();
		$this->DispRemarks->AdvancedSearch->load();
		$this->DispMode->AdvancedSearch->load();
		$this->ProductCD->AdvancedSearch->load();
		$this->Nos->AdvancedSearch->load();
		$this->WBCPath->AdvancedSearch->load();
		$this->RBCPath->AdvancedSearch->load();
		$this->PTPath->AdvancedSearch->load();
		$this->ActualAmt->AdvancedSearch->load();
		$this->NoSign->AdvancedSearch->load();
		$this->_Barcode->AdvancedSearch->load();
		$this->ReadTime->AdvancedSearch->load();
		$this->Result->AdvancedSearch->load();
		$this->VailID->AdvancedSearch->load();
		$this->ReadMachine->AdvancedSearch->load();
		$this->LabCD->AdvancedSearch->load();
		$this->OutLabAmt->AdvancedSearch->load();
		$this->ProductQty->AdvancedSearch->load();
		$this->Repeat->AdvancedSearch->load();
		$this->DeptNo->AdvancedSearch->load();
		$this->Desc1->AdvancedSearch->load();
		$this->Desc2->AdvancedSearch->load();
		$this->RptResult->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->Branch); // Branch
			$this->updateSort($this->SidNo); // SidNo
			$this->updateSort($this->SidDate); // SidDate
			$this->updateSort($this->TestCd); // TestCd
			$this->updateSort($this->TestSubCd); // TestSubCd
			$this->updateSort($this->DEptCd); // DEptCd
			$this->updateSort($this->ProfCd); // ProfCd
			$this->updateSort($this->ResultDate); // ResultDate
			$this->updateSort($this->Method); // Method
			$this->updateSort($this->Specimen); // Specimen
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->ResultBy); // ResultBy
			$this->updateSort($this->AuthBy); // AuthBy
			$this->updateSort($this->AuthDate); // AuthDate
			$this->updateSort($this->Abnormal); // Abnormal
			$this->updateSort($this->Printed); // Printed
			$this->updateSort($this->Dispatch); // Dispatch
			$this->updateSort($this->LOWHIGH); // LOWHIGH
			$this->updateSort($this->Unit); // Unit
			$this->updateSort($this->ResDate); // ResDate
			$this->updateSort($this->Pic1); // Pic1
			$this->updateSort($this->Pic2); // Pic2
			$this->updateSort($this->GraphPath); // GraphPath
			$this->updateSort($this->SampleDate); // SampleDate
			$this->updateSort($this->SampleUser); // SampleUser
			$this->updateSort($this->ReceivedDate); // ReceivedDate
			$this->updateSort($this->ReceivedUser); // ReceivedUser
			$this->updateSort($this->DeptRecvDate); // DeptRecvDate
			$this->updateSort($this->DeptRecvUser); // DeptRecvUser
			$this->updateSort($this->PrintBy); // PrintBy
			$this->updateSort($this->PrintDate); // PrintDate
			$this->updateSort($this->MachineCD); // MachineCD
			$this->updateSort($this->TestCancel); // TestCancel
			$this->updateSort($this->OutSource); // OutSource
			$this->updateSort($this->Tariff); // Tariff
			$this->updateSort($this->EDITDATE); // EDITDATE
			$this->updateSort($this->UPLOAD); // UPLOAD
			$this->updateSort($this->SAuthDate); // SAuthDate
			$this->updateSort($this->SAuthBy); // SAuthBy
			$this->updateSort($this->NoRC); // NoRC
			$this->updateSort($this->DispDt); // DispDt
			$this->updateSort($this->DispUser); // DispUser
			$this->updateSort($this->DispRemarks); // DispRemarks
			$this->updateSort($this->DispMode); // DispMode
			$this->updateSort($this->ProductCD); // ProductCD
			$this->updateSort($this->Nos); // Nos
			$this->updateSort($this->WBCPath); // WBCPath
			$this->updateSort($this->RBCPath); // RBCPath
			$this->updateSort($this->PTPath); // PTPath
			$this->updateSort($this->ActualAmt); // ActualAmt
			$this->updateSort($this->NoSign); // NoSign
			$this->updateSort($this->_Barcode); // Barcode
			$this->updateSort($this->ReadTime); // ReadTime
			$this->updateSort($this->VailID); // VailID
			$this->updateSort($this->ReadMachine); // ReadMachine
			$this->updateSort($this->LabCD); // LabCD
			$this->updateSort($this->OutLabAmt); // OutLabAmt
			$this->updateSort($this->ProductQty); // ProductQty
			$this->updateSort($this->Repeat); // Repeat
			$this->updateSort($this->DeptNo); // DeptNo
			$this->updateSort($this->Desc1); // Desc1
			$this->updateSort($this->Desc2); // Desc2
			$this->updateSort($this->RptResult); // RptResult
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

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->Branch->setSort("");
				$this->SidNo->setSort("");
				$this->SidDate->setSort("");
				$this->TestCd->setSort("");
				$this->TestSubCd->setSort("");
				$this->DEptCd->setSort("");
				$this->ProfCd->setSort("");
				$this->ResultDate->setSort("");
				$this->Method->setSort("");
				$this->Specimen->setSort("");
				$this->Amount->setSort("");
				$this->ResultBy->setSort("");
				$this->AuthBy->setSort("");
				$this->AuthDate->setSort("");
				$this->Abnormal->setSort("");
				$this->Printed->setSort("");
				$this->Dispatch->setSort("");
				$this->LOWHIGH->setSort("");
				$this->Unit->setSort("");
				$this->ResDate->setSort("");
				$this->Pic1->setSort("");
				$this->Pic2->setSort("");
				$this->GraphPath->setSort("");
				$this->SampleDate->setSort("");
				$this->SampleUser->setSort("");
				$this->ReceivedDate->setSort("");
				$this->ReceivedUser->setSort("");
				$this->DeptRecvDate->setSort("");
				$this->DeptRecvUser->setSort("");
				$this->PrintBy->setSort("");
				$this->PrintDate->setSort("");
				$this->MachineCD->setSort("");
				$this->TestCancel->setSort("");
				$this->OutSource->setSort("");
				$this->Tariff->setSort("");
				$this->EDITDATE->setSort("");
				$this->UPLOAD->setSort("");
				$this->SAuthDate->setSort("");
				$this->SAuthBy->setSort("");
				$this->NoRC->setSort("");
				$this->DispDt->setSort("");
				$this->DispUser->setSort("");
				$this->DispRemarks->setSort("");
				$this->DispMode->setSort("");
				$this->ProductCD->setSort("");
				$this->Nos->setSort("");
				$this->WBCPath->setSort("");
				$this->RBCPath->setSort("");
				$this->PTPath->setSort("");
				$this->ActualAmt->setSort("");
				$this->NoSign->setSort("");
				$this->_Barcode->setSort("");
				$this->ReadTime->setSort("");
				$this->VailID->setSort("");
				$this->ReadMachine->setSort("");
				$this->LabCD->setSort("");
				$this->OutLabAmt->setSort("");
				$this->ProductQty->setSort("");
				$this->Repeat->setSort("");
				$this->DeptNo->setSort("");
				$this->Desc1->setSort("");
				$this->Desc2->setSort("");
				$this->RptResult->setSort("");
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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
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
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

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
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = $this->GridAddUrl != "" && $Security->canAdd();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"flab_test_resultlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"flab_test_resultlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.flab_test_resultlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as $option)
				$option->hideAllOptions();

			// Grid-Add
			if ($this->isGridAdd()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;

				// Add grid insert
				$item = &$option->add("gridinsert");
				$item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridInsertLink") . "</a>";

				// Add grid cancel
				$item = &$option->add("gridcancel");
				$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
				$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->Branch->CurrentValue = NULL;
		$this->Branch->OldValue = $this->Branch->CurrentValue;
		$this->SidNo->CurrentValue = NULL;
		$this->SidNo->OldValue = $this->SidNo->CurrentValue;
		$this->SidDate->CurrentValue = NULL;
		$this->SidDate->OldValue = $this->SidDate->CurrentValue;
		$this->TestCd->CurrentValue = NULL;
		$this->TestCd->OldValue = $this->TestCd->CurrentValue;
		$this->TestSubCd->CurrentValue = NULL;
		$this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
		$this->DEptCd->CurrentValue = NULL;
		$this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
		$this->ProfCd->CurrentValue = NULL;
		$this->ProfCd->OldValue = $this->ProfCd->CurrentValue;
		$this->LabReport->CurrentValue = NULL;
		$this->LabReport->OldValue = $this->LabReport->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->Comments->CurrentValue = NULL;
		$this->Comments->OldValue = $this->Comments->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->Specimen->CurrentValue = NULL;
		$this->Specimen->OldValue = $this->Specimen->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->ResultBy->CurrentValue = NULL;
		$this->ResultBy->OldValue = $this->ResultBy->CurrentValue;
		$this->AuthBy->CurrentValue = NULL;
		$this->AuthBy->OldValue = $this->AuthBy->CurrentValue;
		$this->AuthDate->CurrentValue = NULL;
		$this->AuthDate->OldValue = $this->AuthDate->CurrentValue;
		$this->Abnormal->CurrentValue = NULL;
		$this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
		$this->Printed->CurrentValue = NULL;
		$this->Printed->OldValue = $this->Printed->CurrentValue;
		$this->Dispatch->CurrentValue = NULL;
		$this->Dispatch->OldValue = $this->Dispatch->CurrentValue;
		$this->LOWHIGH->CurrentValue = NULL;
		$this->LOWHIGH->OldValue = $this->LOWHIGH->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->Unit->CurrentValue = NULL;
		$this->Unit->OldValue = $this->Unit->CurrentValue;
		$this->ResDate->CurrentValue = NULL;
		$this->ResDate->OldValue = $this->ResDate->CurrentValue;
		$this->Pic1->CurrentValue = NULL;
		$this->Pic1->OldValue = $this->Pic1->CurrentValue;
		$this->Pic2->CurrentValue = NULL;
		$this->Pic2->OldValue = $this->Pic2->CurrentValue;
		$this->GraphPath->CurrentValue = NULL;
		$this->GraphPath->OldValue = $this->GraphPath->CurrentValue;
		$this->SampleDate->CurrentValue = NULL;
		$this->SampleDate->OldValue = $this->SampleDate->CurrentValue;
		$this->SampleUser->CurrentValue = NULL;
		$this->SampleUser->OldValue = $this->SampleUser->CurrentValue;
		$this->ReceivedDate->CurrentValue = NULL;
		$this->ReceivedDate->OldValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedUser->CurrentValue = NULL;
		$this->ReceivedUser->OldValue = $this->ReceivedUser->CurrentValue;
		$this->DeptRecvDate->CurrentValue = NULL;
		$this->DeptRecvDate->OldValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvUser->CurrentValue = NULL;
		$this->DeptRecvUser->OldValue = $this->DeptRecvUser->CurrentValue;
		$this->PrintBy->CurrentValue = NULL;
		$this->PrintBy->OldValue = $this->PrintBy->CurrentValue;
		$this->PrintDate->CurrentValue = NULL;
		$this->PrintDate->OldValue = $this->PrintDate->CurrentValue;
		$this->MachineCD->CurrentValue = NULL;
		$this->MachineCD->OldValue = $this->MachineCD->CurrentValue;
		$this->TestCancel->CurrentValue = NULL;
		$this->TestCancel->OldValue = $this->TestCancel->CurrentValue;
		$this->OutSource->CurrentValue = NULL;
		$this->OutSource->OldValue = $this->OutSource->CurrentValue;
		$this->Tariff->CurrentValue = NULL;
		$this->Tariff->OldValue = $this->Tariff->CurrentValue;
		$this->EDITDATE->CurrentValue = NULL;
		$this->EDITDATE->OldValue = $this->EDITDATE->CurrentValue;
		$this->UPLOAD->CurrentValue = NULL;
		$this->UPLOAD->OldValue = $this->UPLOAD->CurrentValue;
		$this->SAuthDate->CurrentValue = NULL;
		$this->SAuthDate->OldValue = $this->SAuthDate->CurrentValue;
		$this->SAuthBy->CurrentValue = NULL;
		$this->SAuthBy->OldValue = $this->SAuthBy->CurrentValue;
		$this->NoRC->CurrentValue = NULL;
		$this->NoRC->OldValue = $this->NoRC->CurrentValue;
		$this->DispDt->CurrentValue = NULL;
		$this->DispDt->OldValue = $this->DispDt->CurrentValue;
		$this->DispUser->CurrentValue = NULL;
		$this->DispUser->OldValue = $this->DispUser->CurrentValue;
		$this->DispRemarks->CurrentValue = NULL;
		$this->DispRemarks->OldValue = $this->DispRemarks->CurrentValue;
		$this->DispMode->CurrentValue = NULL;
		$this->DispMode->OldValue = $this->DispMode->CurrentValue;
		$this->ProductCD->CurrentValue = NULL;
		$this->ProductCD->OldValue = $this->ProductCD->CurrentValue;
		$this->Nos->CurrentValue = NULL;
		$this->Nos->OldValue = $this->Nos->CurrentValue;
		$this->WBCPath->CurrentValue = NULL;
		$this->WBCPath->OldValue = $this->WBCPath->CurrentValue;
		$this->RBCPath->CurrentValue = NULL;
		$this->RBCPath->OldValue = $this->RBCPath->CurrentValue;
		$this->PTPath->CurrentValue = NULL;
		$this->PTPath->OldValue = $this->PTPath->CurrentValue;
		$this->ActualAmt->CurrentValue = NULL;
		$this->ActualAmt->OldValue = $this->ActualAmt->CurrentValue;
		$this->NoSign->CurrentValue = NULL;
		$this->NoSign->OldValue = $this->NoSign->CurrentValue;
		$this->_Barcode->CurrentValue = NULL;
		$this->_Barcode->OldValue = $this->_Barcode->CurrentValue;
		$this->ReadTime->CurrentValue = NULL;
		$this->ReadTime->OldValue = $this->ReadTime->CurrentValue;
		$this->Result->CurrentValue = NULL;
		$this->Result->OldValue = $this->Result->CurrentValue;
		$this->VailID->CurrentValue = NULL;
		$this->VailID->OldValue = $this->VailID->CurrentValue;
		$this->ReadMachine->CurrentValue = NULL;
		$this->ReadMachine->OldValue = $this->ReadMachine->CurrentValue;
		$this->LabCD->CurrentValue = NULL;
		$this->LabCD->OldValue = $this->LabCD->CurrentValue;
		$this->OutLabAmt->CurrentValue = NULL;
		$this->OutLabAmt->OldValue = $this->OutLabAmt->CurrentValue;
		$this->ProductQty->CurrentValue = NULL;
		$this->ProductQty->OldValue = $this->ProductQty->CurrentValue;
		$this->Repeat->CurrentValue = NULL;
		$this->Repeat->OldValue = $this->Repeat->CurrentValue;
		$this->DeptNo->CurrentValue = NULL;
		$this->DeptNo->OldValue = $this->DeptNo->CurrentValue;
		$this->Desc1->CurrentValue = NULL;
		$this->Desc1->OldValue = $this->Desc1->CurrentValue;
		$this->Desc2->CurrentValue = NULL;
		$this->Desc2->OldValue = $this->Desc2->CurrentValue;
		$this->RptResult->CurrentValue = NULL;
		$this->RptResult->OldValue = $this->RptResult->CurrentValue;
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

		// Branch
		if (!$this->isAddOrEdit() && $this->Branch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Branch->AdvancedSearch->SearchValue != "" || $this->Branch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SidNo
		if (!$this->isAddOrEdit() && $this->SidNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SidNo->AdvancedSearch->SearchValue != "" || $this->SidNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SidDate
		if (!$this->isAddOrEdit() && $this->SidDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SidDate->AdvancedSearch->SearchValue != "" || $this->SidDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TestCd
		if (!$this->isAddOrEdit() && $this->TestCd->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TestCd->AdvancedSearch->SearchValue != "" || $this->TestCd->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TestSubCd
		if (!$this->isAddOrEdit() && $this->TestSubCd->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TestSubCd->AdvancedSearch->SearchValue != "" || $this->TestSubCd->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DEptCd
		if (!$this->isAddOrEdit() && $this->DEptCd->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DEptCd->AdvancedSearch->SearchValue != "" || $this->DEptCd->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ProfCd
		if (!$this->isAddOrEdit() && $this->ProfCd->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ProfCd->AdvancedSearch->SearchValue != "" || $this->ProfCd->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// LabReport
		if (!$this->isAddOrEdit() && $this->LabReport->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->LabReport->AdvancedSearch->SearchValue != "" || $this->LabReport->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResultDate
		if (!$this->isAddOrEdit() && $this->ResultDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResultDate->AdvancedSearch->SearchValue != "" || $this->ResultDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Comments
		if (!$this->isAddOrEdit() && $this->Comments->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Comments->AdvancedSearch->SearchValue != "" || $this->Comments->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Method
		if (!$this->isAddOrEdit() && $this->Method->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Method->AdvancedSearch->SearchValue != "" || $this->Method->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Specimen
		if (!$this->isAddOrEdit() && $this->Specimen->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Specimen->AdvancedSearch->SearchValue != "" || $this->Specimen->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Amount
		if (!$this->isAddOrEdit() && $this->Amount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Amount->AdvancedSearch->SearchValue != "" || $this->Amount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResultBy
		if (!$this->isAddOrEdit() && $this->ResultBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResultBy->AdvancedSearch->SearchValue != "" || $this->ResultBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AuthBy
		if (!$this->isAddOrEdit() && $this->AuthBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AuthBy->AdvancedSearch->SearchValue != "" || $this->AuthBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AuthDate
		if (!$this->isAddOrEdit() && $this->AuthDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AuthDate->AdvancedSearch->SearchValue != "" || $this->AuthDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Abnormal
		if (!$this->isAddOrEdit() && $this->Abnormal->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Abnormal->AdvancedSearch->SearchValue != "" || $this->Abnormal->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Printed
		if (!$this->isAddOrEdit() && $this->Printed->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Printed->AdvancedSearch->SearchValue != "" || $this->Printed->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Dispatch
		if (!$this->isAddOrEdit() && $this->Dispatch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Dispatch->AdvancedSearch->SearchValue != "" || $this->Dispatch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// LOWHIGH
		if (!$this->isAddOrEdit() && $this->LOWHIGH->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->LOWHIGH->AdvancedSearch->SearchValue != "" || $this->LOWHIGH->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RefValue
		if (!$this->isAddOrEdit() && $this->RefValue->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RefValue->AdvancedSearch->SearchValue != "" || $this->RefValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Unit
		if (!$this->isAddOrEdit() && $this->Unit->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Unit->AdvancedSearch->SearchValue != "" || $this->Unit->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResDate
		if (!$this->isAddOrEdit() && $this->ResDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResDate->AdvancedSearch->SearchValue != "" || $this->ResDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Pic1
		if (!$this->isAddOrEdit() && $this->Pic1->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Pic1->AdvancedSearch->SearchValue != "" || $this->Pic1->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Pic2
		if (!$this->isAddOrEdit() && $this->Pic2->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Pic2->AdvancedSearch->SearchValue != "" || $this->Pic2->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// GraphPath
		if (!$this->isAddOrEdit() && $this->GraphPath->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->GraphPath->AdvancedSearch->SearchValue != "" || $this->GraphPath->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SampleDate
		if (!$this->isAddOrEdit() && $this->SampleDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SampleDate->AdvancedSearch->SearchValue != "" || $this->SampleDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SampleUser
		if (!$this->isAddOrEdit() && $this->SampleUser->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SampleUser->AdvancedSearch->SearchValue != "" || $this->SampleUser->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReceivedDate
		if (!$this->isAddOrEdit() && $this->ReceivedDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReceivedDate->AdvancedSearch->SearchValue != "" || $this->ReceivedDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReceivedUser
		if (!$this->isAddOrEdit() && $this->ReceivedUser->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReceivedUser->AdvancedSearch->SearchValue != "" || $this->ReceivedUser->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DeptRecvDate
		if (!$this->isAddOrEdit() && $this->DeptRecvDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DeptRecvDate->AdvancedSearch->SearchValue != "" || $this->DeptRecvDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DeptRecvUser
		if (!$this->isAddOrEdit() && $this->DeptRecvUser->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DeptRecvUser->AdvancedSearch->SearchValue != "" || $this->DeptRecvUser->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PrintBy
		if (!$this->isAddOrEdit() && $this->PrintBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PrintBy->AdvancedSearch->SearchValue != "" || $this->PrintBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PrintDate
		if (!$this->isAddOrEdit() && $this->PrintDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PrintDate->AdvancedSearch->SearchValue != "" || $this->PrintDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// MachineCD
		if (!$this->isAddOrEdit() && $this->MachineCD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->MachineCD->AdvancedSearch->SearchValue != "" || $this->MachineCD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TestCancel
		if (!$this->isAddOrEdit() && $this->TestCancel->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TestCancel->AdvancedSearch->SearchValue != "" || $this->TestCancel->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// OutSource
		if (!$this->isAddOrEdit() && $this->OutSource->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->OutSource->AdvancedSearch->SearchValue != "" || $this->OutSource->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Tariff
		if (!$this->isAddOrEdit() && $this->Tariff->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Tariff->AdvancedSearch->SearchValue != "" || $this->Tariff->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// EDITDATE
		if (!$this->isAddOrEdit() && $this->EDITDATE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->EDITDATE->AdvancedSearch->SearchValue != "" || $this->EDITDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// UPLOAD
		if (!$this->isAddOrEdit() && $this->UPLOAD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->UPLOAD->AdvancedSearch->SearchValue != "" || $this->UPLOAD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SAuthDate
		if (!$this->isAddOrEdit() && $this->SAuthDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SAuthDate->AdvancedSearch->SearchValue != "" || $this->SAuthDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SAuthBy
		if (!$this->isAddOrEdit() && $this->SAuthBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SAuthBy->AdvancedSearch->SearchValue != "" || $this->SAuthBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoRC
		if (!$this->isAddOrEdit() && $this->NoRC->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoRC->AdvancedSearch->SearchValue != "" || $this->NoRC->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DispDt
		if (!$this->isAddOrEdit() && $this->DispDt->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DispDt->AdvancedSearch->SearchValue != "" || $this->DispDt->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DispUser
		if (!$this->isAddOrEdit() && $this->DispUser->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DispUser->AdvancedSearch->SearchValue != "" || $this->DispUser->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DispRemarks
		if (!$this->isAddOrEdit() && $this->DispRemarks->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DispRemarks->AdvancedSearch->SearchValue != "" || $this->DispRemarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DispMode
		if (!$this->isAddOrEdit() && $this->DispMode->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DispMode->AdvancedSearch->SearchValue != "" || $this->DispMode->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ProductCD
		if (!$this->isAddOrEdit() && $this->ProductCD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ProductCD->AdvancedSearch->SearchValue != "" || $this->ProductCD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Nos
		if (!$this->isAddOrEdit() && $this->Nos->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Nos->AdvancedSearch->SearchValue != "" || $this->Nos->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// WBCPath
		if (!$this->isAddOrEdit() && $this->WBCPath->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->WBCPath->AdvancedSearch->SearchValue != "" || $this->WBCPath->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RBCPath
		if (!$this->isAddOrEdit() && $this->RBCPath->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RBCPath->AdvancedSearch->SearchValue != "" || $this->RBCPath->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PTPath
		if (!$this->isAddOrEdit() && $this->PTPath->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PTPath->AdvancedSearch->SearchValue != "" || $this->PTPath->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ActualAmt
		if (!$this->isAddOrEdit() && $this->ActualAmt->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ActualAmt->AdvancedSearch->SearchValue != "" || $this->ActualAmt->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoSign
		if (!$this->isAddOrEdit() && $this->NoSign->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoSign->AdvancedSearch->SearchValue != "" || $this->NoSign->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Barcode
		if (!$this->isAddOrEdit() && $this->_Barcode->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->_Barcode->AdvancedSearch->SearchValue != "" || $this->_Barcode->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReadTime
		if (!$this->isAddOrEdit() && $this->ReadTime->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReadTime->AdvancedSearch->SearchValue != "" || $this->ReadTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Result
		if (!$this->isAddOrEdit() && $this->Result->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Result->AdvancedSearch->SearchValue != "" || $this->Result->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// VailID
		if (!$this->isAddOrEdit() && $this->VailID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->VailID->AdvancedSearch->SearchValue != "" || $this->VailID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReadMachine
		if (!$this->isAddOrEdit() && $this->ReadMachine->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReadMachine->AdvancedSearch->SearchValue != "" || $this->ReadMachine->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// LabCD
		if (!$this->isAddOrEdit() && $this->LabCD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->LabCD->AdvancedSearch->SearchValue != "" || $this->LabCD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// OutLabAmt
		if (!$this->isAddOrEdit() && $this->OutLabAmt->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->OutLabAmt->AdvancedSearch->SearchValue != "" || $this->OutLabAmt->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ProductQty
		if (!$this->isAddOrEdit() && $this->ProductQty->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ProductQty->AdvancedSearch->SearchValue != "" || $this->ProductQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Repeat
		if (!$this->isAddOrEdit() && $this->Repeat->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Repeat->AdvancedSearch->SearchValue != "" || $this->Repeat->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DeptNo
		if (!$this->isAddOrEdit() && $this->DeptNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DeptNo->AdvancedSearch->SearchValue != "" || $this->DeptNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Desc1
		if (!$this->isAddOrEdit() && $this->Desc1->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Desc1->AdvancedSearch->SearchValue != "" || $this->Desc1->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Desc2
		if (!$this->isAddOrEdit() && $this->Desc2->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Desc2->AdvancedSearch->SearchValue != "" || $this->Desc2->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RptResult
		if (!$this->isAddOrEdit() && $this->RptResult->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RptResult->AdvancedSearch->SearchValue != "" || $this->RptResult->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

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

		// Check field name 'SidNo' first before field var 'x_SidNo'
		$val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
		if (!$this->SidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SidNo->Visible = FALSE; // Disable update for API request
			else
				$this->SidNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SidNo"))
			$this->SidNo->setOldValue($CurrentForm->getValue("o_SidNo"));

		// Check field name 'SidDate' first before field var 'x_SidDate'
		$val = $CurrentForm->hasValue("SidDate") ? $CurrentForm->getValue("SidDate") : $CurrentForm->getValue("x_SidDate");
		if (!$this->SidDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SidDate->Visible = FALSE; // Disable update for API request
			else
				$this->SidDate->setFormValue($val);
			$this->SidDate->CurrentValue = UnFormatDateTime($this->SidDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_SidDate"))
			$this->SidDate->setOldValue($CurrentForm->getValue("o_SidDate"));

		// Check field name 'TestCd' first before field var 'x_TestCd'
		$val = $CurrentForm->hasValue("TestCd") ? $CurrentForm->getValue("TestCd") : $CurrentForm->getValue("x_TestCd");
		if (!$this->TestCd->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestCd->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestCd"))
			$this->TestCd->setOldValue($CurrentForm->getValue("o_TestCd"));

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

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Amount"))
			$this->Amount->setOldValue($CurrentForm->getValue("o_Amount"));

		// Check field name 'ResultBy' first before field var 'x_ResultBy'
		$val = $CurrentForm->hasValue("ResultBy") ? $CurrentForm->getValue("ResultBy") : $CurrentForm->getValue("x_ResultBy");
		if (!$this->ResultBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ResultBy"))
			$this->ResultBy->setOldValue($CurrentForm->getValue("o_ResultBy"));

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

		// Check field name 'ResDate' first before field var 'x_ResDate'
		$val = $CurrentForm->hasValue("ResDate") ? $CurrentForm->getValue("ResDate") : $CurrentForm->getValue("x_ResDate");
		if (!$this->ResDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResDate->setFormValue($val);
			$this->ResDate->CurrentValue = UnFormatDateTime($this->ResDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_ResDate"))
			$this->ResDate->setOldValue($CurrentForm->getValue("o_ResDate"));

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

		// Check field name 'Tariff' first before field var 'x_Tariff'
		$val = $CurrentForm->hasValue("Tariff") ? $CurrentForm->getValue("Tariff") : $CurrentForm->getValue("x_Tariff");
		if (!$this->Tariff->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Tariff->Visible = FALSE; // Disable update for API request
			else
				$this->Tariff->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Tariff"))
			$this->Tariff->setOldValue($CurrentForm->getValue("o_Tariff"));

		// Check field name 'EDITDATE' first before field var 'x_EDITDATE'
		$val = $CurrentForm->hasValue("EDITDATE") ? $CurrentForm->getValue("EDITDATE") : $CurrentForm->getValue("x_EDITDATE");
		if (!$this->EDITDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EDITDATE->Visible = FALSE; // Disable update for API request
			else
				$this->EDITDATE->setFormValue($val);
			$this->EDITDATE->CurrentValue = UnFormatDateTime($this->EDITDATE->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_EDITDATE"))
			$this->EDITDATE->setOldValue($CurrentForm->getValue("o_EDITDATE"));

		// Check field name 'UPLOAD' first before field var 'x_UPLOAD'
		$val = $CurrentForm->hasValue("UPLOAD") ? $CurrentForm->getValue("UPLOAD") : $CurrentForm->getValue("x_UPLOAD");
		if (!$this->UPLOAD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPLOAD->Visible = FALSE; // Disable update for API request
			else
				$this->UPLOAD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_UPLOAD"))
			$this->UPLOAD->setOldValue($CurrentForm->getValue("o_UPLOAD"));

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

		// Check field name 'NoRC' first before field var 'x_NoRC'
		$val = $CurrentForm->hasValue("NoRC") ? $CurrentForm->getValue("NoRC") : $CurrentForm->getValue("x_NoRC");
		if (!$this->NoRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoRC->Visible = FALSE; // Disable update for API request
			else
				$this->NoRC->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoRC"))
			$this->NoRC->setOldValue($CurrentForm->getValue("o_NoRC"));

		// Check field name 'DispDt' first before field var 'x_DispDt'
		$val = $CurrentForm->hasValue("DispDt") ? $CurrentForm->getValue("DispDt") : $CurrentForm->getValue("x_DispDt");
		if (!$this->DispDt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DispDt->Visible = FALSE; // Disable update for API request
			else
				$this->DispDt->setFormValue($val);
			$this->DispDt->CurrentValue = UnFormatDateTime($this->DispDt->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_DispDt"))
			$this->DispDt->setOldValue($CurrentForm->getValue("o_DispDt"));

		// Check field name 'DispUser' first before field var 'x_DispUser'
		$val = $CurrentForm->hasValue("DispUser") ? $CurrentForm->getValue("DispUser") : $CurrentForm->getValue("x_DispUser");
		if (!$this->DispUser->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DispUser->Visible = FALSE; // Disable update for API request
			else
				$this->DispUser->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DispUser"))
			$this->DispUser->setOldValue($CurrentForm->getValue("o_DispUser"));

		// Check field name 'DispRemarks' first before field var 'x_DispRemarks'
		$val = $CurrentForm->hasValue("DispRemarks") ? $CurrentForm->getValue("DispRemarks") : $CurrentForm->getValue("x_DispRemarks");
		if (!$this->DispRemarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DispRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->DispRemarks->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DispRemarks"))
			$this->DispRemarks->setOldValue($CurrentForm->getValue("o_DispRemarks"));

		// Check field name 'DispMode' first before field var 'x_DispMode'
		$val = $CurrentForm->hasValue("DispMode") ? $CurrentForm->getValue("DispMode") : $CurrentForm->getValue("x_DispMode");
		if (!$this->DispMode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DispMode->Visible = FALSE; // Disable update for API request
			else
				$this->DispMode->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DispMode"))
			$this->DispMode->setOldValue($CurrentForm->getValue("o_DispMode"));

		// Check field name 'ProductCD' first before field var 'x_ProductCD'
		$val = $CurrentForm->hasValue("ProductCD") ? $CurrentForm->getValue("ProductCD") : $CurrentForm->getValue("x_ProductCD");
		if (!$this->ProductCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProductCD->Visible = FALSE; // Disable update for API request
			else
				$this->ProductCD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ProductCD"))
			$this->ProductCD->setOldValue($CurrentForm->getValue("o_ProductCD"));

		// Check field name 'Nos' first before field var 'x_Nos'
		$val = $CurrentForm->hasValue("Nos") ? $CurrentForm->getValue("Nos") : $CurrentForm->getValue("x_Nos");
		if (!$this->Nos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Nos->Visible = FALSE; // Disable update for API request
			else
				$this->Nos->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Nos"))
			$this->Nos->setOldValue($CurrentForm->getValue("o_Nos"));

		// Check field name 'WBCPath' first before field var 'x_WBCPath'
		$val = $CurrentForm->hasValue("WBCPath") ? $CurrentForm->getValue("WBCPath") : $CurrentForm->getValue("x_WBCPath");
		if (!$this->WBCPath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->WBCPath->Visible = FALSE; // Disable update for API request
			else
				$this->WBCPath->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_WBCPath"))
			$this->WBCPath->setOldValue($CurrentForm->getValue("o_WBCPath"));

		// Check field name 'RBCPath' first before field var 'x_RBCPath'
		$val = $CurrentForm->hasValue("RBCPath") ? $CurrentForm->getValue("RBCPath") : $CurrentForm->getValue("x_RBCPath");
		if (!$this->RBCPath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RBCPath->Visible = FALSE; // Disable update for API request
			else
				$this->RBCPath->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RBCPath"))
			$this->RBCPath->setOldValue($CurrentForm->getValue("o_RBCPath"));

		// Check field name 'PTPath' first before field var 'x_PTPath'
		$val = $CurrentForm->hasValue("PTPath") ? $CurrentForm->getValue("PTPath") : $CurrentForm->getValue("x_PTPath");
		if (!$this->PTPath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PTPath->Visible = FALSE; // Disable update for API request
			else
				$this->PTPath->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PTPath"))
			$this->PTPath->setOldValue($CurrentForm->getValue("o_PTPath"));

		// Check field name 'ActualAmt' first before field var 'x_ActualAmt'
		$val = $CurrentForm->hasValue("ActualAmt") ? $CurrentForm->getValue("ActualAmt") : $CurrentForm->getValue("x_ActualAmt");
		if (!$this->ActualAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ActualAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ActualAmt->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ActualAmt"))
			$this->ActualAmt->setOldValue($CurrentForm->getValue("o_ActualAmt"));

		// Check field name 'NoSign' first before field var 'x_NoSign'
		$val = $CurrentForm->hasValue("NoSign") ? $CurrentForm->getValue("NoSign") : $CurrentForm->getValue("x_NoSign");
		if (!$this->NoSign->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoSign->Visible = FALSE; // Disable update for API request
			else
				$this->NoSign->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoSign"))
			$this->NoSign->setOldValue($CurrentForm->getValue("o_NoSign"));

		// Check field name 'Barcode' first before field var 'x__Barcode'
		$val = $CurrentForm->hasValue("Barcode") ? $CurrentForm->getValue("Barcode") : $CurrentForm->getValue("x__Barcode");
		if (!$this->_Barcode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_Barcode->Visible = FALSE; // Disable update for API request
			else
				$this->_Barcode->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o__Barcode"))
			$this->_Barcode->setOldValue($CurrentForm->getValue("o__Barcode"));

		// Check field name 'ReadTime' first before field var 'x_ReadTime'
		$val = $CurrentForm->hasValue("ReadTime") ? $CurrentForm->getValue("ReadTime") : $CurrentForm->getValue("x_ReadTime");
		if (!$this->ReadTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReadTime->Visible = FALSE; // Disable update for API request
			else
				$this->ReadTime->setFormValue($val);
			$this->ReadTime->CurrentValue = UnFormatDateTime($this->ReadTime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_ReadTime"))
			$this->ReadTime->setOldValue($CurrentForm->getValue("o_ReadTime"));

		// Check field name 'VailID' first before field var 'x_VailID'
		$val = $CurrentForm->hasValue("VailID") ? $CurrentForm->getValue("VailID") : $CurrentForm->getValue("x_VailID");
		if (!$this->VailID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->VailID->Visible = FALSE; // Disable update for API request
			else
				$this->VailID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_VailID"))
			$this->VailID->setOldValue($CurrentForm->getValue("o_VailID"));

		// Check field name 'ReadMachine' first before field var 'x_ReadMachine'
		$val = $CurrentForm->hasValue("ReadMachine") ? $CurrentForm->getValue("ReadMachine") : $CurrentForm->getValue("x_ReadMachine");
		if (!$this->ReadMachine->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReadMachine->Visible = FALSE; // Disable update for API request
			else
				$this->ReadMachine->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ReadMachine"))
			$this->ReadMachine->setOldValue($CurrentForm->getValue("o_ReadMachine"));

		// Check field name 'LabCD' first before field var 'x_LabCD'
		$val = $CurrentForm->hasValue("LabCD") ? $CurrentForm->getValue("LabCD") : $CurrentForm->getValue("x_LabCD");
		if (!$this->LabCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LabCD->Visible = FALSE; // Disable update for API request
			else
				$this->LabCD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_LabCD"))
			$this->LabCD->setOldValue($CurrentForm->getValue("o_LabCD"));

		// Check field name 'OutLabAmt' first before field var 'x_OutLabAmt'
		$val = $CurrentForm->hasValue("OutLabAmt") ? $CurrentForm->getValue("OutLabAmt") : $CurrentForm->getValue("x_OutLabAmt");
		if (!$this->OutLabAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OutLabAmt->Visible = FALSE; // Disable update for API request
			else
				$this->OutLabAmt->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_OutLabAmt"))
			$this->OutLabAmt->setOldValue($CurrentForm->getValue("o_OutLabAmt"));

		// Check field name 'ProductQty' first before field var 'x_ProductQty'
		$val = $CurrentForm->hasValue("ProductQty") ? $CurrentForm->getValue("ProductQty") : $CurrentForm->getValue("x_ProductQty");
		if (!$this->ProductQty->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProductQty->Visible = FALSE; // Disable update for API request
			else
				$this->ProductQty->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ProductQty"))
			$this->ProductQty->setOldValue($CurrentForm->getValue("o_ProductQty"));

		// Check field name 'Repeat' first before field var 'x_Repeat'
		$val = $CurrentForm->hasValue("Repeat") ? $CurrentForm->getValue("Repeat") : $CurrentForm->getValue("x_Repeat");
		if (!$this->Repeat->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Repeat->Visible = FALSE; // Disable update for API request
			else
				$this->Repeat->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Repeat"))
			$this->Repeat->setOldValue($CurrentForm->getValue("o_Repeat"));

		// Check field name 'DeptNo' first before field var 'x_DeptNo'
		$val = $CurrentForm->hasValue("DeptNo") ? $CurrentForm->getValue("DeptNo") : $CurrentForm->getValue("x_DeptNo");
		if (!$this->DeptNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeptNo->Visible = FALSE; // Disable update for API request
			else
				$this->DeptNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeptNo"))
			$this->DeptNo->setOldValue($CurrentForm->getValue("o_DeptNo"));

		// Check field name 'Desc1' first before field var 'x_Desc1'
		$val = $CurrentForm->hasValue("Desc1") ? $CurrentForm->getValue("Desc1") : $CurrentForm->getValue("x_Desc1");
		if (!$this->Desc1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Desc1->Visible = FALSE; // Disable update for API request
			else
				$this->Desc1->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Desc1"))
			$this->Desc1->setOldValue($CurrentForm->getValue("o_Desc1"));

		// Check field name 'Desc2' first before field var 'x_Desc2'
		$val = $CurrentForm->hasValue("Desc2") ? $CurrentForm->getValue("Desc2") : $CurrentForm->getValue("x_Desc2");
		if (!$this->Desc2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Desc2->Visible = FALSE; // Disable update for API request
			else
				$this->Desc2->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Desc2"))
			$this->Desc2->setOldValue($CurrentForm->getValue("o_Desc2"));

		// Check field name 'RptResult' first before field var 'x_RptResult'
		$val = $CurrentForm->hasValue("RptResult") ? $CurrentForm->getValue("RptResult") : $CurrentForm->getValue("x_RptResult");
		if (!$this->RptResult->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RptResult->Visible = FALSE; // Disable update for API request
			else
				$this->RptResult->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RptResult"))
			$this->RptResult->setOldValue($CurrentForm->getValue("o_RptResult"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Branch->CurrentValue = $this->Branch->FormValue;
		$this->SidNo->CurrentValue = $this->SidNo->FormValue;
		$this->SidDate->CurrentValue = $this->SidDate->FormValue;
		$this->SidDate->CurrentValue = UnFormatDateTime($this->SidDate->CurrentValue, 0);
		$this->TestCd->CurrentValue = $this->TestCd->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Specimen->CurrentValue = $this->Specimen->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->ResultBy->CurrentValue = $this->ResultBy->FormValue;
		$this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
		$this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
		$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->Printed->CurrentValue = $this->Printed->FormValue;
		$this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
		$this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->ResDate->CurrentValue = $this->ResDate->FormValue;
		$this->ResDate->CurrentValue = UnFormatDateTime($this->ResDate->CurrentValue, 0);
		$this->Pic1->CurrentValue = $this->Pic1->FormValue;
		$this->Pic2->CurrentValue = $this->Pic2->FormValue;
		$this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
		$this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
		$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		$this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
		$this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
		$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		$this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
		$this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
		$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		$this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
		$this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
		$this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
		$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		$this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
		$this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
		$this->Tariff->CurrentValue = $this->Tariff->FormValue;
		$this->EDITDATE->CurrentValue = $this->EDITDATE->FormValue;
		$this->EDITDATE->CurrentValue = UnFormatDateTime($this->EDITDATE->CurrentValue, 0);
		$this->UPLOAD->CurrentValue = $this->UPLOAD->FormValue;
		$this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
		$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		$this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
		$this->NoRC->CurrentValue = $this->NoRC->FormValue;
		$this->DispDt->CurrentValue = $this->DispDt->FormValue;
		$this->DispDt->CurrentValue = UnFormatDateTime($this->DispDt->CurrentValue, 0);
		$this->DispUser->CurrentValue = $this->DispUser->FormValue;
		$this->DispRemarks->CurrentValue = $this->DispRemarks->FormValue;
		$this->DispMode->CurrentValue = $this->DispMode->FormValue;
		$this->ProductCD->CurrentValue = $this->ProductCD->FormValue;
		$this->Nos->CurrentValue = $this->Nos->FormValue;
		$this->WBCPath->CurrentValue = $this->WBCPath->FormValue;
		$this->RBCPath->CurrentValue = $this->RBCPath->FormValue;
		$this->PTPath->CurrentValue = $this->PTPath->FormValue;
		$this->ActualAmt->CurrentValue = $this->ActualAmt->FormValue;
		$this->NoSign->CurrentValue = $this->NoSign->FormValue;
		$this->_Barcode->CurrentValue = $this->_Barcode->FormValue;
		$this->ReadTime->CurrentValue = $this->ReadTime->FormValue;
		$this->ReadTime->CurrentValue = UnFormatDateTime($this->ReadTime->CurrentValue, 0);
		$this->VailID->CurrentValue = $this->VailID->FormValue;
		$this->ReadMachine->CurrentValue = $this->ReadMachine->FormValue;
		$this->LabCD->CurrentValue = $this->LabCD->FormValue;
		$this->OutLabAmt->CurrentValue = $this->OutLabAmt->FormValue;
		$this->ProductQty->CurrentValue = $this->ProductQty->FormValue;
		$this->Repeat->CurrentValue = $this->Repeat->FormValue;
		$this->DeptNo->CurrentValue = $this->DeptNo->FormValue;
		$this->Desc1->CurrentValue = $this->Desc1->FormValue;
		$this->Desc2->CurrentValue = $this->Desc2->FormValue;
		$this->RptResult->CurrentValue = $this->RptResult->FormValue;
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
		$this->Branch->setDbValue($row['Branch']);
		$this->SidNo->setDbValue($row['SidNo']);
		$this->SidDate->setDbValue($row['SidDate']);
		$this->TestCd->setDbValue($row['TestCd']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->ProfCd->setDbValue($row['ProfCd']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Method->setDbValue($row['Method']);
		$this->Specimen->setDbValue($row['Specimen']);
		$this->Amount->setDbValue($row['Amount']);
		$this->ResultBy->setDbValue($row['ResultBy']);
		$this->AuthBy->setDbValue($row['AuthBy']);
		$this->AuthDate->setDbValue($row['AuthDate']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->Printed->setDbValue($row['Printed']);
		$this->Dispatch->setDbValue($row['Dispatch']);
		$this->LOWHIGH->setDbValue($row['LOWHIGH']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Unit->setDbValue($row['Unit']);
		$this->ResDate->setDbValue($row['ResDate']);
		$this->Pic1->setDbValue($row['Pic1']);
		$this->Pic2->setDbValue($row['Pic2']);
		$this->GraphPath->setDbValue($row['GraphPath']);
		$this->SampleDate->setDbValue($row['SampleDate']);
		$this->SampleUser->setDbValue($row['SampleUser']);
		$this->ReceivedDate->setDbValue($row['ReceivedDate']);
		$this->ReceivedUser->setDbValue($row['ReceivedUser']);
		$this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
		$this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
		$this->PrintBy->setDbValue($row['PrintBy']);
		$this->PrintDate->setDbValue($row['PrintDate']);
		$this->MachineCD->setDbValue($row['MachineCD']);
		$this->TestCancel->setDbValue($row['TestCancel']);
		$this->OutSource->setDbValue($row['OutSource']);
		$this->Tariff->setDbValue($row['Tariff']);
		$this->EDITDATE->setDbValue($row['EDITDATE']);
		$this->UPLOAD->setDbValue($row['UPLOAD']);
		$this->SAuthDate->setDbValue($row['SAuthDate']);
		$this->SAuthBy->setDbValue($row['SAuthBy']);
		$this->NoRC->setDbValue($row['NoRC']);
		$this->DispDt->setDbValue($row['DispDt']);
		$this->DispUser->setDbValue($row['DispUser']);
		$this->DispRemarks->setDbValue($row['DispRemarks']);
		$this->DispMode->setDbValue($row['DispMode']);
		$this->ProductCD->setDbValue($row['ProductCD']);
		$this->Nos->setDbValue($row['Nos']);
		$this->WBCPath->setDbValue($row['WBCPath']);
		$this->RBCPath->setDbValue($row['RBCPath']);
		$this->PTPath->setDbValue($row['PTPath']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->NoSign->setDbValue($row['NoSign']);
		$this->_Barcode->setDbValue($row['Barcode']);
		$this->ReadTime->setDbValue($row['ReadTime']);
		$this->Result->setDbValue($row['Result']);
		$this->VailID->setDbValue($row['VailID']);
		$this->ReadMachine->setDbValue($row['ReadMachine']);
		$this->LabCD->setDbValue($row['LabCD']);
		$this->OutLabAmt->setDbValue($row['OutLabAmt']);
		$this->ProductQty->setDbValue($row['ProductQty']);
		$this->Repeat->setDbValue($row['Repeat']);
		$this->DeptNo->setDbValue($row['DeptNo']);
		$this->Desc1->setDbValue($row['Desc1']);
		$this->Desc2->setDbValue($row['Desc2']);
		$this->RptResult->setDbValue($row['RptResult']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Branch'] = $this->Branch->CurrentValue;
		$row['SidNo'] = $this->SidNo->CurrentValue;
		$row['SidDate'] = $this->SidDate->CurrentValue;
		$row['TestCd'] = $this->TestCd->CurrentValue;
		$row['TestSubCd'] = $this->TestSubCd->CurrentValue;
		$row['DEptCd'] = $this->DEptCd->CurrentValue;
		$row['ProfCd'] = $this->ProfCd->CurrentValue;
		$row['LabReport'] = $this->LabReport->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['Comments'] = $this->Comments->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['Specimen'] = $this->Specimen->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['ResultBy'] = $this->ResultBy->CurrentValue;
		$row['AuthBy'] = $this->AuthBy->CurrentValue;
		$row['AuthDate'] = $this->AuthDate->CurrentValue;
		$row['Abnormal'] = $this->Abnormal->CurrentValue;
		$row['Printed'] = $this->Printed->CurrentValue;
		$row['Dispatch'] = $this->Dispatch->CurrentValue;
		$row['LOWHIGH'] = $this->LOWHIGH->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['Unit'] = $this->Unit->CurrentValue;
		$row['ResDate'] = $this->ResDate->CurrentValue;
		$row['Pic1'] = $this->Pic1->CurrentValue;
		$row['Pic2'] = $this->Pic2->CurrentValue;
		$row['GraphPath'] = $this->GraphPath->CurrentValue;
		$row['SampleDate'] = $this->SampleDate->CurrentValue;
		$row['SampleUser'] = $this->SampleUser->CurrentValue;
		$row['ReceivedDate'] = $this->ReceivedDate->CurrentValue;
		$row['ReceivedUser'] = $this->ReceivedUser->CurrentValue;
		$row['DeptRecvDate'] = $this->DeptRecvDate->CurrentValue;
		$row['DeptRecvUser'] = $this->DeptRecvUser->CurrentValue;
		$row['PrintBy'] = $this->PrintBy->CurrentValue;
		$row['PrintDate'] = $this->PrintDate->CurrentValue;
		$row['MachineCD'] = $this->MachineCD->CurrentValue;
		$row['TestCancel'] = $this->TestCancel->CurrentValue;
		$row['OutSource'] = $this->OutSource->CurrentValue;
		$row['Tariff'] = $this->Tariff->CurrentValue;
		$row['EDITDATE'] = $this->EDITDATE->CurrentValue;
		$row['UPLOAD'] = $this->UPLOAD->CurrentValue;
		$row['SAuthDate'] = $this->SAuthDate->CurrentValue;
		$row['SAuthBy'] = $this->SAuthBy->CurrentValue;
		$row['NoRC'] = $this->NoRC->CurrentValue;
		$row['DispDt'] = $this->DispDt->CurrentValue;
		$row['DispUser'] = $this->DispUser->CurrentValue;
		$row['DispRemarks'] = $this->DispRemarks->CurrentValue;
		$row['DispMode'] = $this->DispMode->CurrentValue;
		$row['ProductCD'] = $this->ProductCD->CurrentValue;
		$row['Nos'] = $this->Nos->CurrentValue;
		$row['WBCPath'] = $this->WBCPath->CurrentValue;
		$row['RBCPath'] = $this->RBCPath->CurrentValue;
		$row['PTPath'] = $this->PTPath->CurrentValue;
		$row['ActualAmt'] = $this->ActualAmt->CurrentValue;
		$row['NoSign'] = $this->NoSign->CurrentValue;
		$row['Barcode'] = $this->_Barcode->CurrentValue;
		$row['ReadTime'] = $this->ReadTime->CurrentValue;
		$row['Result'] = $this->Result->CurrentValue;
		$row['VailID'] = $this->VailID->CurrentValue;
		$row['ReadMachine'] = $this->ReadMachine->CurrentValue;
		$row['LabCD'] = $this->LabCD->CurrentValue;
		$row['OutLabAmt'] = $this->OutLabAmt->CurrentValue;
		$row['ProductQty'] = $this->ProductQty->CurrentValue;
		$row['Repeat'] = $this->Repeat->CurrentValue;
		$row['DeptNo'] = $this->DeptNo->CurrentValue;
		$row['Desc1'] = $this->Desc1->CurrentValue;
		$row['Desc2'] = $this->Desc2->CurrentValue;
		$row['RptResult'] = $this->RptResult->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{
		return FALSE;
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

		// Convert decimal values if posted back
		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Tariff->FormValue == $this->Tariff->CurrentValue && is_numeric(ConvertToFloatString($this->Tariff->CurrentValue)))
			$this->Tariff->CurrentValue = ConvertToFloatString($this->Tariff->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Nos->FormValue == $this->Nos->CurrentValue && is_numeric(ConvertToFloatString($this->Nos->CurrentValue)))
			$this->Nos->CurrentValue = ConvertToFloatString($this->Nos->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OutLabAmt->FormValue == $this->OutLabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->OutLabAmt->CurrentValue)))
			$this->OutLabAmt->CurrentValue = ConvertToFloatString($this->OutLabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProductQty->FormValue == $this->ProductQty->CurrentValue && is_numeric(ConvertToFloatString($this->ProductQty->CurrentValue)))
			$this->ProductQty->CurrentValue = ConvertToFloatString($this->ProductQty->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Branch
		// SidNo
		// SidDate
		// TestCd
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// ResultDate
		// Comments
		// Method
		// Specimen
		// Amount
		// ResultBy
		// AuthBy
		// AuthDate
		// Abnormal
		// Printed
		// Dispatch
		// LOWHIGH
		// RefValue
		// Unit
		// ResDate
		// Pic1
		// Pic2
		// GraphPath
		// SampleDate
		// SampleUser
		// ReceivedDate
		// ReceivedUser
		// DeptRecvDate
		// DeptRecvUser
		// PrintBy
		// PrintDate
		// MachineCD
		// TestCancel
		// OutSource
		// Tariff
		// EDITDATE
		// UPLOAD
		// SAuthDate
		// SAuthBy
		// NoRC
		// DispDt
		// DispUser
		// DispRemarks
		// DispMode
		// ProductCD
		// Nos
		// WBCPath
		// RBCPath
		// PTPath
		// ActualAmt
		// NoSign
		// Barcode
		// ReadTime
		// Result
		// VailID
		// ReadMachine
		// LabCD
		// OutLabAmt
		// ProductQty
		// Repeat
		// DeptNo
		// Desc1
		// Desc2
		// RptResult

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Branch
			$this->Branch->ViewValue = $this->Branch->CurrentValue;
			$this->Branch->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

			// SidDate
			$this->SidDate->ViewValue = $this->SidDate->CurrentValue;
			$this->SidDate->ViewValue = FormatDateTime($this->SidDate->ViewValue, 0);
			$this->SidDate->ViewCustomAttributes = "";

			// TestCd
			$this->TestCd->ViewValue = $this->TestCd->CurrentValue;
			$this->TestCd->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// ProfCd
			$this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
			$this->ProfCd->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Specimen
			$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
			$this->Specimen->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// ResultBy
			$this->ResultBy->ViewValue = $this->ResultBy->CurrentValue;
			$this->ResultBy->ViewCustomAttributes = "";

			// AuthBy
			$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
			$this->AuthBy->ViewCustomAttributes = "";

			// AuthDate
			$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
			$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
			$this->AuthDate->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// Printed
			$this->Printed->ViewValue = $this->Printed->CurrentValue;
			$this->Printed->ViewCustomAttributes = "";

			// Dispatch
			$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
			$this->Dispatch->ViewCustomAttributes = "";

			// LOWHIGH
			$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
			$this->LOWHIGH->ViewCustomAttributes = "";

			// Unit
			$this->Unit->ViewValue = $this->Unit->CurrentValue;
			$this->Unit->ViewCustomAttributes = "";

			// ResDate
			$this->ResDate->ViewValue = $this->ResDate->CurrentValue;
			$this->ResDate->ViewValue = FormatDateTime($this->ResDate->ViewValue, 0);
			$this->ResDate->ViewCustomAttributes = "";

			// Pic1
			$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
			$this->Pic2->ViewCustomAttributes = "";

			// GraphPath
			$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
			$this->GraphPath->ViewCustomAttributes = "";

			// SampleDate
			$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
			$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
			$this->SampleDate->ViewCustomAttributes = "";

			// SampleUser
			$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
			$this->SampleUser->ViewCustomAttributes = "";

			// ReceivedDate
			$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
			$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
			$this->ReceivedDate->ViewCustomAttributes = "";

			// ReceivedUser
			$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
			$this->ReceivedUser->ViewCustomAttributes = "";

			// DeptRecvDate
			$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
			$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
			$this->DeptRecvDate->ViewCustomAttributes = "";

			// DeptRecvUser
			$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
			$this->DeptRecvUser->ViewCustomAttributes = "";

			// PrintBy
			$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
			$this->PrintBy->ViewCustomAttributes = "";

			// PrintDate
			$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
			$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
			$this->PrintDate->ViewCustomAttributes = "";

			// MachineCD
			$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
			$this->MachineCD->ViewCustomAttributes = "";

			// TestCancel
			$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
			$this->TestCancel->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// Tariff
			$this->Tariff->ViewValue = $this->Tariff->CurrentValue;
			$this->Tariff->ViewValue = FormatNumber($this->Tariff->ViewValue, 2, -2, -2, -2);
			$this->Tariff->ViewCustomAttributes = "";

			// EDITDATE
			$this->EDITDATE->ViewValue = $this->EDITDATE->CurrentValue;
			$this->EDITDATE->ViewValue = FormatDateTime($this->EDITDATE->ViewValue, 0);
			$this->EDITDATE->ViewCustomAttributes = "";

			// UPLOAD
			$this->UPLOAD->ViewValue = $this->UPLOAD->CurrentValue;
			$this->UPLOAD->ViewCustomAttributes = "";

			// SAuthDate
			$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
			$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
			$this->SAuthDate->ViewCustomAttributes = "";

			// SAuthBy
			$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
			$this->SAuthBy->ViewCustomAttributes = "";

			// NoRC
			$this->NoRC->ViewValue = $this->NoRC->CurrentValue;
			$this->NoRC->ViewCustomAttributes = "";

			// DispDt
			$this->DispDt->ViewValue = $this->DispDt->CurrentValue;
			$this->DispDt->ViewValue = FormatDateTime($this->DispDt->ViewValue, 0);
			$this->DispDt->ViewCustomAttributes = "";

			// DispUser
			$this->DispUser->ViewValue = $this->DispUser->CurrentValue;
			$this->DispUser->ViewCustomAttributes = "";

			// DispRemarks
			$this->DispRemarks->ViewValue = $this->DispRemarks->CurrentValue;
			$this->DispRemarks->ViewCustomAttributes = "";

			// DispMode
			$this->DispMode->ViewValue = $this->DispMode->CurrentValue;
			$this->DispMode->ViewCustomAttributes = "";

			// ProductCD
			$this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
			$this->ProductCD->ViewCustomAttributes = "";

			// Nos
			$this->Nos->ViewValue = $this->Nos->CurrentValue;
			$this->Nos->ViewValue = FormatNumber($this->Nos->ViewValue, 2, -2, -2, -2);
			$this->Nos->ViewCustomAttributes = "";

			// WBCPath
			$this->WBCPath->ViewValue = $this->WBCPath->CurrentValue;
			$this->WBCPath->ViewCustomAttributes = "";

			// RBCPath
			$this->RBCPath->ViewValue = $this->RBCPath->CurrentValue;
			$this->RBCPath->ViewCustomAttributes = "";

			// PTPath
			$this->PTPath->ViewValue = $this->PTPath->CurrentValue;
			$this->PTPath->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// NoSign
			$this->NoSign->ViewValue = $this->NoSign->CurrentValue;
			$this->NoSign->ViewCustomAttributes = "";

			// Barcode
			$this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
			$this->_Barcode->ViewCustomAttributes = "";

			// ReadTime
			$this->ReadTime->ViewValue = $this->ReadTime->CurrentValue;
			$this->ReadTime->ViewValue = FormatDateTime($this->ReadTime->ViewValue, 0);
			$this->ReadTime->ViewCustomAttributes = "";

			// VailID
			$this->VailID->ViewValue = $this->VailID->CurrentValue;
			$this->VailID->ViewCustomAttributes = "";

			// ReadMachine
			$this->ReadMachine->ViewValue = $this->ReadMachine->CurrentValue;
			$this->ReadMachine->ViewCustomAttributes = "";

			// LabCD
			$this->LabCD->ViewValue = $this->LabCD->CurrentValue;
			$this->LabCD->ViewCustomAttributes = "";

			// OutLabAmt
			$this->OutLabAmt->ViewValue = $this->OutLabAmt->CurrentValue;
			$this->OutLabAmt->ViewValue = FormatNumber($this->OutLabAmt->ViewValue, 2, -2, -2, -2);
			$this->OutLabAmt->ViewCustomAttributes = "";

			// ProductQty
			$this->ProductQty->ViewValue = $this->ProductQty->CurrentValue;
			$this->ProductQty->ViewValue = FormatNumber($this->ProductQty->ViewValue, 2, -2, -2, -2);
			$this->ProductQty->ViewCustomAttributes = "";

			// Repeat
			$this->Repeat->ViewValue = $this->Repeat->CurrentValue;
			$this->Repeat->ViewCustomAttributes = "";

			// DeptNo
			$this->DeptNo->ViewValue = $this->DeptNo->CurrentValue;
			$this->DeptNo->ViewCustomAttributes = "";

			// Desc1
			$this->Desc1->ViewValue = $this->Desc1->CurrentValue;
			$this->Desc1->ViewCustomAttributes = "";

			// Desc2
			$this->Desc2->ViewValue = $this->Desc2->CurrentValue;
			$this->Desc2->ViewCustomAttributes = "";

			// RptResult
			$this->RptResult->ViewValue = $this->RptResult->CurrentValue;
			$this->RptResult->ViewCustomAttributes = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";
			$this->Branch->TooltipValue = "";
			if (!$this->isExport())
				$this->Branch->ViewValue = $this->highlightValue($this->Branch);

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";
			if (!$this->isExport())
				$this->SidNo->ViewValue = $this->highlightValue($this->SidNo);

			// SidDate
			$this->SidDate->LinkCustomAttributes = "";
			$this->SidDate->HrefValue = "";
			$this->SidDate->TooltipValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";
			$this->TestCd->TooltipValue = "";
			if (!$this->isExport())
				$this->TestCd->ViewValue = $this->highlightValue($this->TestCd);

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";
			if (!$this->isExport())
				$this->TestSubCd->ViewValue = $this->highlightValue($this->TestSubCd);

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";
			if (!$this->isExport())
				$this->DEptCd->ViewValue = $this->highlightValue($this->DEptCd);

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";
			$this->ProfCd->TooltipValue = "";
			if (!$this->isExport())
				$this->ProfCd->ViewValue = $this->highlightValue($this->ProfCd);

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";
			if (!$this->isExport())
				$this->Method->ViewValue = $this->highlightValue($this->Method);

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";
			$this->Specimen->TooltipValue = "";
			if (!$this->isExport())
				$this->Specimen->ViewValue = $this->highlightValue($this->Specimen);

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// ResultBy
			$this->ResultBy->LinkCustomAttributes = "";
			$this->ResultBy->HrefValue = "";
			$this->ResultBy->TooltipValue = "";
			if (!$this->isExport())
				$this->ResultBy->ViewValue = $this->highlightValue($this->ResultBy);

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";
			$this->AuthBy->TooltipValue = "";
			if (!$this->isExport())
				$this->AuthBy->ViewValue = $this->highlightValue($this->AuthBy);

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";
			$this->AuthDate->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";
			if (!$this->isExport())
				$this->Abnormal->ViewValue = $this->highlightValue($this->Abnormal);

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";
			$this->Printed->TooltipValue = "";
			if (!$this->isExport())
				$this->Printed->ViewValue = $this->highlightValue($this->Printed);

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";
			$this->Dispatch->TooltipValue = "";
			if (!$this->isExport())
				$this->Dispatch->ViewValue = $this->highlightValue($this->Dispatch);

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";
			$this->LOWHIGH->TooltipValue = "";
			if (!$this->isExport())
				$this->LOWHIGH->ViewValue = $this->highlightValue($this->LOWHIGH);

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";
			if (!$this->isExport())
				$this->Unit->ViewValue = $this->highlightValue($this->Unit);

			// ResDate
			$this->ResDate->LinkCustomAttributes = "";
			$this->ResDate->HrefValue = "";
			$this->ResDate->TooltipValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->TooltipValue = "";
			if (!$this->isExport())
				$this->Pic1->ViewValue = $this->highlightValue($this->Pic1);

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->TooltipValue = "";
			if (!$this->isExport())
				$this->Pic2->ViewValue = $this->highlightValue($this->Pic2);

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";
			$this->GraphPath->TooltipValue = "";
			if (!$this->isExport())
				$this->GraphPath->ViewValue = $this->highlightValue($this->GraphPath);

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";
			$this->SampleDate->TooltipValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";
			$this->SampleUser->TooltipValue = "";
			if (!$this->isExport())
				$this->SampleUser->ViewValue = $this->highlightValue($this->SampleUser);

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";
			$this->ReceivedDate->TooltipValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";
			$this->ReceivedUser->TooltipValue = "";
			if (!$this->isExport())
				$this->ReceivedUser->ViewValue = $this->highlightValue($this->ReceivedUser);

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";
			$this->DeptRecvDate->TooltipValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";
			$this->DeptRecvUser->TooltipValue = "";
			if (!$this->isExport())
				$this->DeptRecvUser->ViewValue = $this->highlightValue($this->DeptRecvUser);

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";
			$this->PrintBy->TooltipValue = "";
			if (!$this->isExport())
				$this->PrintBy->ViewValue = $this->highlightValue($this->PrintBy);

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";
			$this->PrintDate->TooltipValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";
			$this->MachineCD->TooltipValue = "";
			if (!$this->isExport())
				$this->MachineCD->ViewValue = $this->highlightValue($this->MachineCD);

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";
			$this->TestCancel->TooltipValue = "";
			if (!$this->isExport())
				$this->TestCancel->ViewValue = $this->highlightValue($this->TestCancel);

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";
			if (!$this->isExport())
				$this->OutSource->ViewValue = $this->highlightValue($this->OutSource);

			// Tariff
			$this->Tariff->LinkCustomAttributes = "";
			$this->Tariff->HrefValue = "";
			$this->Tariff->TooltipValue = "";

			// EDITDATE
			$this->EDITDATE->LinkCustomAttributes = "";
			$this->EDITDATE->HrefValue = "";
			$this->EDITDATE->TooltipValue = "";

			// UPLOAD
			$this->UPLOAD->LinkCustomAttributes = "";
			$this->UPLOAD->HrefValue = "";
			$this->UPLOAD->TooltipValue = "";
			if (!$this->isExport())
				$this->UPLOAD->ViewValue = $this->highlightValue($this->UPLOAD);

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";
			$this->SAuthDate->TooltipValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";
			$this->SAuthBy->TooltipValue = "";
			if (!$this->isExport())
				$this->SAuthBy->ViewValue = $this->highlightValue($this->SAuthBy);

			// NoRC
			$this->NoRC->LinkCustomAttributes = "";
			$this->NoRC->HrefValue = "";
			$this->NoRC->TooltipValue = "";
			if (!$this->isExport())
				$this->NoRC->ViewValue = $this->highlightValue($this->NoRC);

			// DispDt
			$this->DispDt->LinkCustomAttributes = "";
			$this->DispDt->HrefValue = "";
			$this->DispDt->TooltipValue = "";

			// DispUser
			$this->DispUser->LinkCustomAttributes = "";
			$this->DispUser->HrefValue = "";
			$this->DispUser->TooltipValue = "";
			if (!$this->isExport())
				$this->DispUser->ViewValue = $this->highlightValue($this->DispUser);

			// DispRemarks
			$this->DispRemarks->LinkCustomAttributes = "";
			$this->DispRemarks->HrefValue = "";
			$this->DispRemarks->TooltipValue = "";
			if (!$this->isExport())
				$this->DispRemarks->ViewValue = $this->highlightValue($this->DispRemarks);

			// DispMode
			$this->DispMode->LinkCustomAttributes = "";
			$this->DispMode->HrefValue = "";
			$this->DispMode->TooltipValue = "";
			if (!$this->isExport())
				$this->DispMode->ViewValue = $this->highlightValue($this->DispMode);

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";
			$this->ProductCD->TooltipValue = "";
			if (!$this->isExport())
				$this->ProductCD->ViewValue = $this->highlightValue($this->ProductCD);

			// Nos
			$this->Nos->LinkCustomAttributes = "";
			$this->Nos->HrefValue = "";
			$this->Nos->TooltipValue = "";

			// WBCPath
			$this->WBCPath->LinkCustomAttributes = "";
			$this->WBCPath->HrefValue = "";
			$this->WBCPath->TooltipValue = "";
			if (!$this->isExport())
				$this->WBCPath->ViewValue = $this->highlightValue($this->WBCPath);

			// RBCPath
			$this->RBCPath->LinkCustomAttributes = "";
			$this->RBCPath->HrefValue = "";
			$this->RBCPath->TooltipValue = "";
			if (!$this->isExport())
				$this->RBCPath->ViewValue = $this->highlightValue($this->RBCPath);

			// PTPath
			$this->PTPath->LinkCustomAttributes = "";
			$this->PTPath->HrefValue = "";
			$this->PTPath->TooltipValue = "";
			if (!$this->isExport())
				$this->PTPath->ViewValue = $this->highlightValue($this->PTPath);

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// NoSign
			$this->NoSign->LinkCustomAttributes = "";
			$this->NoSign->HrefValue = "";
			$this->NoSign->TooltipValue = "";
			if (!$this->isExport())
				$this->NoSign->ViewValue = $this->highlightValue($this->NoSign);

			// Barcode
			$this->_Barcode->LinkCustomAttributes = "";
			$this->_Barcode->HrefValue = "";
			$this->_Barcode->TooltipValue = "";
			if (!$this->isExport())
				$this->_Barcode->ViewValue = $this->highlightValue($this->_Barcode);

			// ReadTime
			$this->ReadTime->LinkCustomAttributes = "";
			$this->ReadTime->HrefValue = "";
			$this->ReadTime->TooltipValue = "";

			// VailID
			$this->VailID->LinkCustomAttributes = "";
			$this->VailID->HrefValue = "";
			$this->VailID->TooltipValue = "";
			if (!$this->isExport())
				$this->VailID->ViewValue = $this->highlightValue($this->VailID);

			// ReadMachine
			$this->ReadMachine->LinkCustomAttributes = "";
			$this->ReadMachine->HrefValue = "";
			$this->ReadMachine->TooltipValue = "";
			if (!$this->isExport())
				$this->ReadMachine->ViewValue = $this->highlightValue($this->ReadMachine);

			// LabCD
			$this->LabCD->LinkCustomAttributes = "";
			$this->LabCD->HrefValue = "";
			$this->LabCD->TooltipValue = "";
			if (!$this->isExport())
				$this->LabCD->ViewValue = $this->highlightValue($this->LabCD);

			// OutLabAmt
			$this->OutLabAmt->LinkCustomAttributes = "";
			$this->OutLabAmt->HrefValue = "";
			$this->OutLabAmt->TooltipValue = "";

			// ProductQty
			$this->ProductQty->LinkCustomAttributes = "";
			$this->ProductQty->HrefValue = "";
			$this->ProductQty->TooltipValue = "";

			// Repeat
			$this->Repeat->LinkCustomAttributes = "";
			$this->Repeat->HrefValue = "";
			$this->Repeat->TooltipValue = "";
			if (!$this->isExport())
				$this->Repeat->ViewValue = $this->highlightValue($this->Repeat);

			// DeptNo
			$this->DeptNo->LinkCustomAttributes = "";
			$this->DeptNo->HrefValue = "";
			$this->DeptNo->TooltipValue = "";
			if (!$this->isExport())
				$this->DeptNo->ViewValue = $this->highlightValue($this->DeptNo);

			// Desc1
			$this->Desc1->LinkCustomAttributes = "";
			$this->Desc1->HrefValue = "";
			$this->Desc1->TooltipValue = "";
			if (!$this->isExport())
				$this->Desc1->ViewValue = $this->highlightValue($this->Desc1);

			// Desc2
			$this->Desc2->LinkCustomAttributes = "";
			$this->Desc2->HrefValue = "";
			$this->Desc2->TooltipValue = "";
			if (!$this->isExport())
				$this->Desc2->ViewValue = $this->highlightValue($this->Desc2);

			// RptResult
			$this->RptResult->LinkCustomAttributes = "";
			$this->RptResult->HrefValue = "";
			$this->RptResult->TooltipValue = "";
			if (!$this->isExport())
				$this->RptResult->ViewValue = $this->highlightValue($this->RptResult);
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (!$this->SidNo->Raw)
				$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// SidDate
			$this->SidDate->EditAttrs["class"] = "form-control";
			$this->SidDate->EditCustomAttributes = "";
			$this->SidDate->EditValue = HtmlEncode(FormatDateTime($this->SidDate->CurrentValue, 8));
			$this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

			// TestCd
			$this->TestCd->EditAttrs["class"] = "form-control";
			$this->TestCd->EditCustomAttributes = "";
			if (!$this->TestCd->Raw)
				$this->TestCd->CurrentValue = HtmlDecode($this->TestCd->CurrentValue);
			$this->TestCd->EditValue = HtmlEncode($this->TestCd->CurrentValue);
			$this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

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

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

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

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
				$this->Amount->OldValue = $this->Amount->EditValue;
			}
			

			// ResultBy
			$this->ResultBy->EditAttrs["class"] = "form-control";
			$this->ResultBy->EditCustomAttributes = "";
			if (!$this->ResultBy->Raw)
				$this->ResultBy->CurrentValue = HtmlDecode($this->ResultBy->CurrentValue);
			$this->ResultBy->EditValue = HtmlEncode($this->ResultBy->CurrentValue);
			$this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			if (!$this->Unit->Raw)
				$this->Unit->CurrentValue = HtmlDecode($this->Unit->CurrentValue);
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// ResDate
			$this->ResDate->EditAttrs["class"] = "form-control";
			$this->ResDate->EditCustomAttributes = "";
			$this->ResDate->EditValue = HtmlEncode(FormatDateTime($this->ResDate->CurrentValue, 8));
			$this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

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

			// Tariff
			$this->Tariff->EditAttrs["class"] = "form-control";
			$this->Tariff->EditCustomAttributes = "";
			$this->Tariff->EditValue = HtmlEncode($this->Tariff->CurrentValue);
			$this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());
			if (strval($this->Tariff->EditValue) != "" && is_numeric($this->Tariff->EditValue)) {
				$this->Tariff->EditValue = FormatNumber($this->Tariff->EditValue, -2, -2, -2, -2);
				$this->Tariff->OldValue = $this->Tariff->EditValue;
			}
			

			// EDITDATE
			$this->EDITDATE->EditAttrs["class"] = "form-control";
			$this->EDITDATE->EditCustomAttributes = "";
			$this->EDITDATE->EditValue = HtmlEncode(FormatDateTime($this->EDITDATE->CurrentValue, 8));
			$this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

			// UPLOAD
			$this->UPLOAD->EditAttrs["class"] = "form-control";
			$this->UPLOAD->EditCustomAttributes = "";
			if (!$this->UPLOAD->Raw)
				$this->UPLOAD->CurrentValue = HtmlDecode($this->UPLOAD->CurrentValue);
			$this->UPLOAD->EditValue = HtmlEncode($this->UPLOAD->CurrentValue);
			$this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

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

			// NoRC
			$this->NoRC->EditAttrs["class"] = "form-control";
			$this->NoRC->EditCustomAttributes = "";
			if (!$this->NoRC->Raw)
				$this->NoRC->CurrentValue = HtmlDecode($this->NoRC->CurrentValue);
			$this->NoRC->EditValue = HtmlEncode($this->NoRC->CurrentValue);
			$this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

			// DispDt
			$this->DispDt->EditAttrs["class"] = "form-control";
			$this->DispDt->EditCustomAttributes = "";
			$this->DispDt->EditValue = HtmlEncode(FormatDateTime($this->DispDt->CurrentValue, 8));
			$this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

			// DispUser
			$this->DispUser->EditAttrs["class"] = "form-control";
			$this->DispUser->EditCustomAttributes = "";
			if (!$this->DispUser->Raw)
				$this->DispUser->CurrentValue = HtmlDecode($this->DispUser->CurrentValue);
			$this->DispUser->EditValue = HtmlEncode($this->DispUser->CurrentValue);
			$this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

			// DispRemarks
			$this->DispRemarks->EditAttrs["class"] = "form-control";
			$this->DispRemarks->EditCustomAttributes = "";
			if (!$this->DispRemarks->Raw)
				$this->DispRemarks->CurrentValue = HtmlDecode($this->DispRemarks->CurrentValue);
			$this->DispRemarks->EditValue = HtmlEncode($this->DispRemarks->CurrentValue);
			$this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

			// DispMode
			$this->DispMode->EditAttrs["class"] = "form-control";
			$this->DispMode->EditCustomAttributes = "";
			if (!$this->DispMode->Raw)
				$this->DispMode->CurrentValue = HtmlDecode($this->DispMode->CurrentValue);
			$this->DispMode->EditValue = HtmlEncode($this->DispMode->CurrentValue);
			$this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

			// ProductCD
			$this->ProductCD->EditAttrs["class"] = "form-control";
			$this->ProductCD->EditCustomAttributes = "";
			if (!$this->ProductCD->Raw)
				$this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
			$this->ProductCD->EditValue = HtmlEncode($this->ProductCD->CurrentValue);
			$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

			// Nos
			$this->Nos->EditAttrs["class"] = "form-control";
			$this->Nos->EditCustomAttributes = "";
			$this->Nos->EditValue = HtmlEncode($this->Nos->CurrentValue);
			$this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());
			if (strval($this->Nos->EditValue) != "" && is_numeric($this->Nos->EditValue)) {
				$this->Nos->EditValue = FormatNumber($this->Nos->EditValue, -2, -2, -2, -2);
				$this->Nos->OldValue = $this->Nos->EditValue;
			}
			

			// WBCPath
			$this->WBCPath->EditAttrs["class"] = "form-control";
			$this->WBCPath->EditCustomAttributes = "";
			if (!$this->WBCPath->Raw)
				$this->WBCPath->CurrentValue = HtmlDecode($this->WBCPath->CurrentValue);
			$this->WBCPath->EditValue = HtmlEncode($this->WBCPath->CurrentValue);
			$this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

			// RBCPath
			$this->RBCPath->EditAttrs["class"] = "form-control";
			$this->RBCPath->EditCustomAttributes = "";
			if (!$this->RBCPath->Raw)
				$this->RBCPath->CurrentValue = HtmlDecode($this->RBCPath->CurrentValue);
			$this->RBCPath->EditValue = HtmlEncode($this->RBCPath->CurrentValue);
			$this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

			// PTPath
			$this->PTPath->EditAttrs["class"] = "form-control";
			$this->PTPath->EditCustomAttributes = "";
			if (!$this->PTPath->Raw)
				$this->PTPath->CurrentValue = HtmlDecode($this->PTPath->CurrentValue);
			$this->PTPath->EditValue = HtmlEncode($this->PTPath->CurrentValue);
			$this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->CurrentValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
			if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue)) {
				$this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
				$this->ActualAmt->OldValue = $this->ActualAmt->EditValue;
			}
			

			// NoSign
			$this->NoSign->EditAttrs["class"] = "form-control";
			$this->NoSign->EditCustomAttributes = "";
			if (!$this->NoSign->Raw)
				$this->NoSign->CurrentValue = HtmlDecode($this->NoSign->CurrentValue);
			$this->NoSign->EditValue = HtmlEncode($this->NoSign->CurrentValue);
			$this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

			// Barcode
			$this->_Barcode->EditAttrs["class"] = "form-control";
			$this->_Barcode->EditCustomAttributes = "";
			if (!$this->_Barcode->Raw)
				$this->_Barcode->CurrentValue = HtmlDecode($this->_Barcode->CurrentValue);
			$this->_Barcode->EditValue = HtmlEncode($this->_Barcode->CurrentValue);
			$this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

			// ReadTime
			$this->ReadTime->EditAttrs["class"] = "form-control";
			$this->ReadTime->EditCustomAttributes = "";
			$this->ReadTime->EditValue = HtmlEncode(FormatDateTime($this->ReadTime->CurrentValue, 8));
			$this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

			// VailID
			$this->VailID->EditAttrs["class"] = "form-control";
			$this->VailID->EditCustomAttributes = "";
			if (!$this->VailID->Raw)
				$this->VailID->CurrentValue = HtmlDecode($this->VailID->CurrentValue);
			$this->VailID->EditValue = HtmlEncode($this->VailID->CurrentValue);
			$this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

			// ReadMachine
			$this->ReadMachine->EditAttrs["class"] = "form-control";
			$this->ReadMachine->EditCustomAttributes = "";
			if (!$this->ReadMachine->Raw)
				$this->ReadMachine->CurrentValue = HtmlDecode($this->ReadMachine->CurrentValue);
			$this->ReadMachine->EditValue = HtmlEncode($this->ReadMachine->CurrentValue);
			$this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

			// LabCD
			$this->LabCD->EditAttrs["class"] = "form-control";
			$this->LabCD->EditCustomAttributes = "";
			if (!$this->LabCD->Raw)
				$this->LabCD->CurrentValue = HtmlDecode($this->LabCD->CurrentValue);
			$this->LabCD->EditValue = HtmlEncode($this->LabCD->CurrentValue);
			$this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

			// OutLabAmt
			$this->OutLabAmt->EditAttrs["class"] = "form-control";
			$this->OutLabAmt->EditCustomAttributes = "";
			$this->OutLabAmt->EditValue = HtmlEncode($this->OutLabAmt->CurrentValue);
			$this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());
			if (strval($this->OutLabAmt->EditValue) != "" && is_numeric($this->OutLabAmt->EditValue)) {
				$this->OutLabAmt->EditValue = FormatNumber($this->OutLabAmt->EditValue, -2, -2, -2, -2);
				$this->OutLabAmt->OldValue = $this->OutLabAmt->EditValue;
			}
			

			// ProductQty
			$this->ProductQty->EditAttrs["class"] = "form-control";
			$this->ProductQty->EditCustomAttributes = "";
			$this->ProductQty->EditValue = HtmlEncode($this->ProductQty->CurrentValue);
			$this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());
			if (strval($this->ProductQty->EditValue) != "" && is_numeric($this->ProductQty->EditValue)) {
				$this->ProductQty->EditValue = FormatNumber($this->ProductQty->EditValue, -2, -2, -2, -2);
				$this->ProductQty->OldValue = $this->ProductQty->EditValue;
			}
			

			// Repeat
			$this->Repeat->EditAttrs["class"] = "form-control";
			$this->Repeat->EditCustomAttributes = "";
			if (!$this->Repeat->Raw)
				$this->Repeat->CurrentValue = HtmlDecode($this->Repeat->CurrentValue);
			$this->Repeat->EditValue = HtmlEncode($this->Repeat->CurrentValue);
			$this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

			// DeptNo
			$this->DeptNo->EditAttrs["class"] = "form-control";
			$this->DeptNo->EditCustomAttributes = "";
			if (!$this->DeptNo->Raw)
				$this->DeptNo->CurrentValue = HtmlDecode($this->DeptNo->CurrentValue);
			$this->DeptNo->EditValue = HtmlEncode($this->DeptNo->CurrentValue);
			$this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

			// Desc1
			$this->Desc1->EditAttrs["class"] = "form-control";
			$this->Desc1->EditCustomAttributes = "";
			if (!$this->Desc1->Raw)
				$this->Desc1->CurrentValue = HtmlDecode($this->Desc1->CurrentValue);
			$this->Desc1->EditValue = HtmlEncode($this->Desc1->CurrentValue);
			$this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

			// Desc2
			$this->Desc2->EditAttrs["class"] = "form-control";
			$this->Desc2->EditCustomAttributes = "";
			if (!$this->Desc2->Raw)
				$this->Desc2->CurrentValue = HtmlDecode($this->Desc2->CurrentValue);
			$this->Desc2->EditValue = HtmlEncode($this->Desc2->CurrentValue);
			$this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

			// RptResult
			$this->RptResult->EditAttrs["class"] = "form-control";
			$this->RptResult->EditCustomAttributes = "";
			if (!$this->RptResult->Raw)
				$this->RptResult->CurrentValue = HtmlDecode($this->RptResult->CurrentValue);
			$this->RptResult->EditValue = HtmlEncode($this->RptResult->CurrentValue);
			$this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());

			// Add refer script
			// Branch

			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";

			// SidDate
			$this->SidDate->LinkCustomAttributes = "";
			$this->SidDate->HrefValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// ResultBy
			$this->ResultBy->LinkCustomAttributes = "";
			$this->ResultBy->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// ResDate
			$this->ResDate->LinkCustomAttributes = "";
			$this->ResDate->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Tariff
			$this->Tariff->LinkCustomAttributes = "";
			$this->Tariff->HrefValue = "";

			// EDITDATE
			$this->EDITDATE->LinkCustomAttributes = "";
			$this->EDITDATE->HrefValue = "";

			// UPLOAD
			$this->UPLOAD->LinkCustomAttributes = "";
			$this->UPLOAD->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// NoRC
			$this->NoRC->LinkCustomAttributes = "";
			$this->NoRC->HrefValue = "";

			// DispDt
			$this->DispDt->LinkCustomAttributes = "";
			$this->DispDt->HrefValue = "";

			// DispUser
			$this->DispUser->LinkCustomAttributes = "";
			$this->DispUser->HrefValue = "";

			// DispRemarks
			$this->DispRemarks->LinkCustomAttributes = "";
			$this->DispRemarks->HrefValue = "";

			// DispMode
			$this->DispMode->LinkCustomAttributes = "";
			$this->DispMode->HrefValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";

			// Nos
			$this->Nos->LinkCustomAttributes = "";
			$this->Nos->HrefValue = "";

			// WBCPath
			$this->WBCPath->LinkCustomAttributes = "";
			$this->WBCPath->HrefValue = "";

			// RBCPath
			$this->RBCPath->LinkCustomAttributes = "";
			$this->RBCPath->HrefValue = "";

			// PTPath
			$this->PTPath->LinkCustomAttributes = "";
			$this->PTPath->HrefValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";

			// NoSign
			$this->NoSign->LinkCustomAttributes = "";
			$this->NoSign->HrefValue = "";

			// Barcode
			$this->_Barcode->LinkCustomAttributes = "";
			$this->_Barcode->HrefValue = "";

			// ReadTime
			$this->ReadTime->LinkCustomAttributes = "";
			$this->ReadTime->HrefValue = "";

			// VailID
			$this->VailID->LinkCustomAttributes = "";
			$this->VailID->HrefValue = "";

			// ReadMachine
			$this->ReadMachine->LinkCustomAttributes = "";
			$this->ReadMachine->HrefValue = "";

			// LabCD
			$this->LabCD->LinkCustomAttributes = "";
			$this->LabCD->HrefValue = "";

			// OutLabAmt
			$this->OutLabAmt->LinkCustomAttributes = "";
			$this->OutLabAmt->HrefValue = "";

			// ProductQty
			$this->ProductQty->LinkCustomAttributes = "";
			$this->ProductQty->HrefValue = "";

			// Repeat
			$this->Repeat->LinkCustomAttributes = "";
			$this->Repeat->HrefValue = "";

			// DeptNo
			$this->DeptNo->LinkCustomAttributes = "";
			$this->DeptNo->HrefValue = "";

			// Desc1
			$this->Desc1->LinkCustomAttributes = "";
			$this->Desc1->HrefValue = "";

			// Desc2
			$this->Desc2->LinkCustomAttributes = "";
			$this->Desc2->HrefValue = "";

			// RptResult
			$this->RptResult->LinkCustomAttributes = "";
			$this->RptResult->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->AdvancedSearch->SearchValue = HtmlDecode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (!$this->SidNo->Raw)
				$this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// SidDate
			$this->SidDate->EditAttrs["class"] = "form-control";
			$this->SidDate->EditCustomAttributes = "";
			$this->SidDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SidDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

			// TestCd
			$this->TestCd->EditAttrs["class"] = "form-control";
			$this->TestCd->EditCustomAttributes = "";
			if (!$this->TestCd->Raw)
				$this->TestCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestCd->AdvancedSearch->SearchValue);
			$this->TestCd->EditValue = HtmlEncode($this->TestCd->AdvancedSearch->SearchValue);
			$this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

			// TestSubCd
			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (!$this->TestSubCd->Raw)
				$this->TestSubCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestSubCd->AdvancedSearch->SearchValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->AdvancedSearch->SearchValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (!$this->DEptCd->Raw)
				$this->DEptCd->AdvancedSearch->SearchValue = HtmlDecode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// ProfCd
			$this->ProfCd->EditAttrs["class"] = "form-control";
			$this->ProfCd->EditCustomAttributes = "";
			if (!$this->ProfCd->Raw)
				$this->ProfCd->AdvancedSearch->SearchValue = HtmlDecode($this->ProfCd->AdvancedSearch->SearchValue);
			$this->ProfCd->EditValue = HtmlEncode($this->ProfCd->AdvancedSearch->SearchValue);
			$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (!$this->Method->Raw)
				$this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Specimen
			$this->Specimen->EditAttrs["class"] = "form-control";
			$this->Specimen->EditCustomAttributes = "";
			if (!$this->Specimen->Raw)
				$this->Specimen->AdvancedSearch->SearchValue = HtmlDecode($this->Specimen->AdvancedSearch->SearchValue);
			$this->Specimen->EditValue = HtmlEncode($this->Specimen->AdvancedSearch->SearchValue);
			$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// ResultBy
			$this->ResultBy->EditAttrs["class"] = "form-control";
			$this->ResultBy->EditCustomAttributes = "";
			if (!$this->ResultBy->Raw)
				$this->ResultBy->AdvancedSearch->SearchValue = HtmlDecode($this->ResultBy->AdvancedSearch->SearchValue);
			$this->ResultBy->EditValue = HtmlEncode($this->ResultBy->AdvancedSearch->SearchValue);
			$this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AuthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->AdvancedSearch->SearchValue = HtmlDecode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->AdvancedSearch->SearchValue = HtmlDecode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->AdvancedSearch->SearchValue = HtmlDecode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			if (!$this->Unit->Raw)
				$this->Unit->AdvancedSearch->SearchValue = HtmlDecode($this->Unit->AdvancedSearch->SearchValue);
			$this->Unit->EditValue = HtmlEncode($this->Unit->AdvancedSearch->SearchValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// ResDate
			$this->ResDate->EditAttrs["class"] = "form-control";
			$this->ResDate->EditCustomAttributes = "";
			$this->ResDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (!$this->Pic1->Raw)
				$this->Pic1->AdvancedSearch->SearchValue = HtmlDecode($this->Pic1->AdvancedSearch->SearchValue);
			$this->Pic1->EditValue = HtmlEncode($this->Pic1->AdvancedSearch->SearchValue);
			$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (!$this->Pic2->Raw)
				$this->Pic2->AdvancedSearch->SearchValue = HtmlDecode($this->Pic2->AdvancedSearch->SearchValue);
			$this->Pic2->EditValue = HtmlEncode($this->Pic2->AdvancedSearch->SearchValue);
			$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

			// GraphPath
			$this->GraphPath->EditAttrs["class"] = "form-control";
			$this->GraphPath->EditCustomAttributes = "";
			if (!$this->GraphPath->Raw)
				$this->GraphPath->AdvancedSearch->SearchValue = HtmlDecode($this->GraphPath->AdvancedSearch->SearchValue);
			$this->GraphPath->EditValue = HtmlEncode($this->GraphPath->AdvancedSearch->SearchValue);
			$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

			// SampleDate
			$this->SampleDate->EditAttrs["class"] = "form-control";
			$this->SampleDate->EditCustomAttributes = "";
			$this->SampleDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SampleDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

			// SampleUser
			$this->SampleUser->EditAttrs["class"] = "form-control";
			$this->SampleUser->EditCustomAttributes = "";
			if (!$this->SampleUser->Raw)
				$this->SampleUser->AdvancedSearch->SearchValue = HtmlDecode($this->SampleUser->AdvancedSearch->SearchValue);
			$this->SampleUser->EditValue = HtmlEncode($this->SampleUser->AdvancedSearch->SearchValue);
			$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

			// ReceivedDate
			$this->ReceivedDate->EditAttrs["class"] = "form-control";
			$this->ReceivedDate->EditCustomAttributes = "";
			$this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReceivedDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

			// ReceivedUser
			$this->ReceivedUser->EditAttrs["class"] = "form-control";
			$this->ReceivedUser->EditCustomAttributes = "";
			if (!$this->ReceivedUser->Raw)
				$this->ReceivedUser->AdvancedSearch->SearchValue = HtmlDecode($this->ReceivedUser->AdvancedSearch->SearchValue);
			$this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->AdvancedSearch->SearchValue);
			$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

			// DeptRecvDate
			$this->DeptRecvDate->EditAttrs["class"] = "form-control";
			$this->DeptRecvDate->EditCustomAttributes = "";
			$this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DeptRecvDate->AdvancedSearch->SearchValue, 0), 8));
			$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

			// DeptRecvUser
			$this->DeptRecvUser->EditAttrs["class"] = "form-control";
			$this->DeptRecvUser->EditCustomAttributes = "";
			if (!$this->DeptRecvUser->Raw)
				$this->DeptRecvUser->AdvancedSearch->SearchValue = HtmlDecode($this->DeptRecvUser->AdvancedSearch->SearchValue);
			$this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->AdvancedSearch->SearchValue);
			$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

			// PrintBy
			$this->PrintBy->EditAttrs["class"] = "form-control";
			$this->PrintBy->EditCustomAttributes = "";
			if (!$this->PrintBy->Raw)
				$this->PrintBy->AdvancedSearch->SearchValue = HtmlDecode($this->PrintBy->AdvancedSearch->SearchValue);
			$this->PrintBy->EditValue = HtmlEncode($this->PrintBy->AdvancedSearch->SearchValue);
			$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

			// PrintDate
			$this->PrintDate->EditAttrs["class"] = "form-control";
			$this->PrintDate->EditCustomAttributes = "";
			$this->PrintDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PrintDate->AdvancedSearch->SearchValue, 0), 8));
			$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

			// MachineCD
			$this->MachineCD->EditAttrs["class"] = "form-control";
			$this->MachineCD->EditCustomAttributes = "";
			if (!$this->MachineCD->Raw)
				$this->MachineCD->AdvancedSearch->SearchValue = HtmlDecode($this->MachineCD->AdvancedSearch->SearchValue);
			$this->MachineCD->EditValue = HtmlEncode($this->MachineCD->AdvancedSearch->SearchValue);
			$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

			// TestCancel
			$this->TestCancel->EditAttrs["class"] = "form-control";
			$this->TestCancel->EditCustomAttributes = "";
			if (!$this->TestCancel->Raw)
				$this->TestCancel->AdvancedSearch->SearchValue = HtmlDecode($this->TestCancel->AdvancedSearch->SearchValue);
			$this->TestCancel->EditValue = HtmlEncode($this->TestCancel->AdvancedSearch->SearchValue);
			$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (!$this->OutSource->Raw)
				$this->OutSource->AdvancedSearch->SearchValue = HtmlDecode($this->OutSource->AdvancedSearch->SearchValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->AdvancedSearch->SearchValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Tariff
			$this->Tariff->EditAttrs["class"] = "form-control";
			$this->Tariff->EditCustomAttributes = "";
			$this->Tariff->EditValue = HtmlEncode($this->Tariff->AdvancedSearch->SearchValue);
			$this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());

			// EDITDATE
			$this->EDITDATE->EditAttrs["class"] = "form-control";
			$this->EDITDATE->EditCustomAttributes = "";
			$this->EDITDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDITDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

			// UPLOAD
			$this->UPLOAD->EditAttrs["class"] = "form-control";
			$this->UPLOAD->EditCustomAttributes = "";
			if (!$this->UPLOAD->Raw)
				$this->UPLOAD->AdvancedSearch->SearchValue = HtmlDecode($this->UPLOAD->AdvancedSearch->SearchValue);
			$this->UPLOAD->EditValue = HtmlEncode($this->UPLOAD->AdvancedSearch->SearchValue);
			$this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

			// SAuthDate
			$this->SAuthDate->EditAttrs["class"] = "form-control";
			$this->SAuthDate->EditCustomAttributes = "";
			$this->SAuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SAuthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

			// SAuthBy
			$this->SAuthBy->EditAttrs["class"] = "form-control";
			$this->SAuthBy->EditCustomAttributes = "";
			if (!$this->SAuthBy->Raw)
				$this->SAuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->SAuthBy->AdvancedSearch->SearchValue);
			$this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->AdvancedSearch->SearchValue);
			$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

			// NoRC
			$this->NoRC->EditAttrs["class"] = "form-control";
			$this->NoRC->EditCustomAttributes = "";
			if (!$this->NoRC->Raw)
				$this->NoRC->AdvancedSearch->SearchValue = HtmlDecode($this->NoRC->AdvancedSearch->SearchValue);
			$this->NoRC->EditValue = HtmlEncode($this->NoRC->AdvancedSearch->SearchValue);
			$this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

			// DispDt
			$this->DispDt->EditAttrs["class"] = "form-control";
			$this->DispDt->EditCustomAttributes = "";
			$this->DispDt->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DispDt->AdvancedSearch->SearchValue, 0), 8));
			$this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

			// DispUser
			$this->DispUser->EditAttrs["class"] = "form-control";
			$this->DispUser->EditCustomAttributes = "";
			if (!$this->DispUser->Raw)
				$this->DispUser->AdvancedSearch->SearchValue = HtmlDecode($this->DispUser->AdvancedSearch->SearchValue);
			$this->DispUser->EditValue = HtmlEncode($this->DispUser->AdvancedSearch->SearchValue);
			$this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

			// DispRemarks
			$this->DispRemarks->EditAttrs["class"] = "form-control";
			$this->DispRemarks->EditCustomAttributes = "";
			if (!$this->DispRemarks->Raw)
				$this->DispRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->DispRemarks->AdvancedSearch->SearchValue);
			$this->DispRemarks->EditValue = HtmlEncode($this->DispRemarks->AdvancedSearch->SearchValue);
			$this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

			// DispMode
			$this->DispMode->EditAttrs["class"] = "form-control";
			$this->DispMode->EditCustomAttributes = "";
			if (!$this->DispMode->Raw)
				$this->DispMode->AdvancedSearch->SearchValue = HtmlDecode($this->DispMode->AdvancedSearch->SearchValue);
			$this->DispMode->EditValue = HtmlEncode($this->DispMode->AdvancedSearch->SearchValue);
			$this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

			// ProductCD
			$this->ProductCD->EditAttrs["class"] = "form-control";
			$this->ProductCD->EditCustomAttributes = "";
			if (!$this->ProductCD->Raw)
				$this->ProductCD->AdvancedSearch->SearchValue = HtmlDecode($this->ProductCD->AdvancedSearch->SearchValue);
			$this->ProductCD->EditValue = HtmlEncode($this->ProductCD->AdvancedSearch->SearchValue);
			$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

			// Nos
			$this->Nos->EditAttrs["class"] = "form-control";
			$this->Nos->EditCustomAttributes = "";
			$this->Nos->EditValue = HtmlEncode($this->Nos->AdvancedSearch->SearchValue);
			$this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());

			// WBCPath
			$this->WBCPath->EditAttrs["class"] = "form-control";
			$this->WBCPath->EditCustomAttributes = "";
			if (!$this->WBCPath->Raw)
				$this->WBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->WBCPath->AdvancedSearch->SearchValue);
			$this->WBCPath->EditValue = HtmlEncode($this->WBCPath->AdvancedSearch->SearchValue);
			$this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

			// RBCPath
			$this->RBCPath->EditAttrs["class"] = "form-control";
			$this->RBCPath->EditCustomAttributes = "";
			if (!$this->RBCPath->Raw)
				$this->RBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->RBCPath->AdvancedSearch->SearchValue);
			$this->RBCPath->EditValue = HtmlEncode($this->RBCPath->AdvancedSearch->SearchValue);
			$this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

			// PTPath
			$this->PTPath->EditAttrs["class"] = "form-control";
			$this->PTPath->EditCustomAttributes = "";
			if (!$this->PTPath->Raw)
				$this->PTPath->AdvancedSearch->SearchValue = HtmlDecode($this->PTPath->AdvancedSearch->SearchValue);
			$this->PTPath->EditValue = HtmlEncode($this->PTPath->AdvancedSearch->SearchValue);
			$this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->AdvancedSearch->SearchValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());

			// NoSign
			$this->NoSign->EditAttrs["class"] = "form-control";
			$this->NoSign->EditCustomAttributes = "";
			if (!$this->NoSign->Raw)
				$this->NoSign->AdvancedSearch->SearchValue = HtmlDecode($this->NoSign->AdvancedSearch->SearchValue);
			$this->NoSign->EditValue = HtmlEncode($this->NoSign->AdvancedSearch->SearchValue);
			$this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

			// Barcode
			$this->_Barcode->EditAttrs["class"] = "form-control";
			$this->_Barcode->EditCustomAttributes = "";
			if (!$this->_Barcode->Raw)
				$this->_Barcode->AdvancedSearch->SearchValue = HtmlDecode($this->_Barcode->AdvancedSearch->SearchValue);
			$this->_Barcode->EditValue = HtmlEncode($this->_Barcode->AdvancedSearch->SearchValue);
			$this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

			// ReadTime
			$this->ReadTime->EditAttrs["class"] = "form-control";
			$this->ReadTime->EditCustomAttributes = "";
			$this->ReadTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReadTime->AdvancedSearch->SearchValue, 0), 8));
			$this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

			// VailID
			$this->VailID->EditAttrs["class"] = "form-control";
			$this->VailID->EditCustomAttributes = "";
			if (!$this->VailID->Raw)
				$this->VailID->AdvancedSearch->SearchValue = HtmlDecode($this->VailID->AdvancedSearch->SearchValue);
			$this->VailID->EditValue = HtmlEncode($this->VailID->AdvancedSearch->SearchValue);
			$this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

			// ReadMachine
			$this->ReadMachine->EditAttrs["class"] = "form-control";
			$this->ReadMachine->EditCustomAttributes = "";
			if (!$this->ReadMachine->Raw)
				$this->ReadMachine->AdvancedSearch->SearchValue = HtmlDecode($this->ReadMachine->AdvancedSearch->SearchValue);
			$this->ReadMachine->EditValue = HtmlEncode($this->ReadMachine->AdvancedSearch->SearchValue);
			$this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

			// LabCD
			$this->LabCD->EditAttrs["class"] = "form-control";
			$this->LabCD->EditCustomAttributes = "";
			if (!$this->LabCD->Raw)
				$this->LabCD->AdvancedSearch->SearchValue = HtmlDecode($this->LabCD->AdvancedSearch->SearchValue);
			$this->LabCD->EditValue = HtmlEncode($this->LabCD->AdvancedSearch->SearchValue);
			$this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

			// OutLabAmt
			$this->OutLabAmt->EditAttrs["class"] = "form-control";
			$this->OutLabAmt->EditCustomAttributes = "";
			$this->OutLabAmt->EditValue = HtmlEncode($this->OutLabAmt->AdvancedSearch->SearchValue);
			$this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());

			// ProductQty
			$this->ProductQty->EditAttrs["class"] = "form-control";
			$this->ProductQty->EditCustomAttributes = "";
			$this->ProductQty->EditValue = HtmlEncode($this->ProductQty->AdvancedSearch->SearchValue);
			$this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());

			// Repeat
			$this->Repeat->EditAttrs["class"] = "form-control";
			$this->Repeat->EditCustomAttributes = "";
			if (!$this->Repeat->Raw)
				$this->Repeat->AdvancedSearch->SearchValue = HtmlDecode($this->Repeat->AdvancedSearch->SearchValue);
			$this->Repeat->EditValue = HtmlEncode($this->Repeat->AdvancedSearch->SearchValue);
			$this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

			// DeptNo
			$this->DeptNo->EditAttrs["class"] = "form-control";
			$this->DeptNo->EditCustomAttributes = "";
			if (!$this->DeptNo->Raw)
				$this->DeptNo->AdvancedSearch->SearchValue = HtmlDecode($this->DeptNo->AdvancedSearch->SearchValue);
			$this->DeptNo->EditValue = HtmlEncode($this->DeptNo->AdvancedSearch->SearchValue);
			$this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

			// Desc1
			$this->Desc1->EditAttrs["class"] = "form-control";
			$this->Desc1->EditCustomAttributes = "";
			if (!$this->Desc1->Raw)
				$this->Desc1->AdvancedSearch->SearchValue = HtmlDecode($this->Desc1->AdvancedSearch->SearchValue);
			$this->Desc1->EditValue = HtmlEncode($this->Desc1->AdvancedSearch->SearchValue);
			$this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

			// Desc2
			$this->Desc2->EditAttrs["class"] = "form-control";
			$this->Desc2->EditCustomAttributes = "";
			if (!$this->Desc2->Raw)
				$this->Desc2->AdvancedSearch->SearchValue = HtmlDecode($this->Desc2->AdvancedSearch->SearchValue);
			$this->Desc2->EditValue = HtmlEncode($this->Desc2->AdvancedSearch->SearchValue);
			$this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

			// RptResult
			$this->RptResult->EditAttrs["class"] = "form-control";
			$this->RptResult->EditCustomAttributes = "";
			if (!$this->RptResult->Raw)
				$this->RptResult->AdvancedSearch->SearchValue = HtmlDecode($this->RptResult->AdvancedSearch->SearchValue);
			$this->RptResult->EditValue = HtmlEncode($this->RptResult->AdvancedSearch->SearchValue);
			$this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());
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
		if (!CheckDate($this->SidDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SidDate->errorMessage());
		}

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

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->Branch->Required) {
			if (!$this->Branch->IsDetailKey && $this->Branch->FormValue != NULL && $this->Branch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
			}
		}
		if ($this->SidNo->Required) {
			if (!$this->SidNo->IsDetailKey && $this->SidNo->FormValue != NULL && $this->SidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
			}
		}
		if ($this->SidDate->Required) {
			if (!$this->SidDate->IsDetailKey && $this->SidDate->FormValue != NULL && $this->SidDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidDate->caption(), $this->SidDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SidDate->FormValue)) {
			AddMessage($FormError, $this->SidDate->errorMessage());
		}
		if ($this->TestCd->Required) {
			if (!$this->TestCd->IsDetailKey && $this->TestCd->FormValue != NULL && $this->TestCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCd->caption(), $this->TestCd->RequiredErrorMessage));
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
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
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
		if ($this->Amount->Required) {
			if (!$this->Amount->IsDetailKey && $this->Amount->FormValue != NULL && $this->Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Amount->FormValue)) {
			AddMessage($FormError, $this->Amount->errorMessage());
		}
		if ($this->ResultBy->Required) {
			if (!$this->ResultBy->IsDetailKey && $this->ResultBy->FormValue != NULL && $this->ResultBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultBy->caption(), $this->ResultBy->RequiredErrorMessage));
			}
		}
		if ($this->AuthBy->Required) {
			if (!$this->AuthBy->IsDetailKey && $this->AuthBy->FormValue != NULL && $this->AuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
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
		if ($this->Abnormal->Required) {
			if (!$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->Printed->Required) {
			if (!$this->Printed->IsDetailKey && $this->Printed->FormValue != NULL && $this->Printed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
			}
		}
		if ($this->Dispatch->Required) {
			if (!$this->Dispatch->IsDetailKey && $this->Dispatch->FormValue != NULL && $this->Dispatch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
			}
		}
		if ($this->LOWHIGH->Required) {
			if (!$this->LOWHIGH->IsDetailKey && $this->LOWHIGH->FormValue != NULL && $this->LOWHIGH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if ($this->ResDate->Required) {
			if (!$this->ResDate->IsDetailKey && $this->ResDate->FormValue != NULL && $this->ResDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResDate->caption(), $this->ResDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResDate->FormValue)) {
			AddMessage($FormError, $this->ResDate->errorMessage());
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
		if ($this->Tariff->Required) {
			if (!$this->Tariff->IsDetailKey && $this->Tariff->FormValue != NULL && $this->Tariff->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tariff->caption(), $this->Tariff->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Tariff->FormValue)) {
			AddMessage($FormError, $this->Tariff->errorMessage());
		}
		if ($this->EDITDATE->Required) {
			if (!$this->EDITDATE->IsDetailKey && $this->EDITDATE->FormValue != NULL && $this->EDITDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EDITDATE->caption(), $this->EDITDATE->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EDITDATE->FormValue)) {
			AddMessage($FormError, $this->EDITDATE->errorMessage());
		}
		if ($this->UPLOAD->Required) {
			if (!$this->UPLOAD->IsDetailKey && $this->UPLOAD->FormValue != NULL && $this->UPLOAD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPLOAD->caption(), $this->UPLOAD->RequiredErrorMessage));
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
		if ($this->NoRC->Required) {
			if (!$this->NoRC->IsDetailKey && $this->NoRC->FormValue != NULL && $this->NoRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoRC->caption(), $this->NoRC->RequiredErrorMessage));
			}
		}
		if ($this->DispDt->Required) {
			if (!$this->DispDt->IsDetailKey && $this->DispDt->FormValue != NULL && $this->DispDt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispDt->caption(), $this->DispDt->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DispDt->FormValue)) {
			AddMessage($FormError, $this->DispDt->errorMessage());
		}
		if ($this->DispUser->Required) {
			if (!$this->DispUser->IsDetailKey && $this->DispUser->FormValue != NULL && $this->DispUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispUser->caption(), $this->DispUser->RequiredErrorMessage));
			}
		}
		if ($this->DispRemarks->Required) {
			if (!$this->DispRemarks->IsDetailKey && $this->DispRemarks->FormValue != NULL && $this->DispRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispRemarks->caption(), $this->DispRemarks->RequiredErrorMessage));
			}
		}
		if ($this->DispMode->Required) {
			if (!$this->DispMode->IsDetailKey && $this->DispMode->FormValue != NULL && $this->DispMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispMode->caption(), $this->DispMode->RequiredErrorMessage));
			}
		}
		if ($this->ProductCD->Required) {
			if (!$this->ProductCD->IsDetailKey && $this->ProductCD->FormValue != NULL && $this->ProductCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductCD->caption(), $this->ProductCD->RequiredErrorMessage));
			}
		}
		if ($this->Nos->Required) {
			if (!$this->Nos->IsDetailKey && $this->Nos->FormValue != NULL && $this->Nos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nos->caption(), $this->Nos->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Nos->FormValue)) {
			AddMessage($FormError, $this->Nos->errorMessage());
		}
		if ($this->WBCPath->Required) {
			if (!$this->WBCPath->IsDetailKey && $this->WBCPath->FormValue != NULL && $this->WBCPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WBCPath->caption(), $this->WBCPath->RequiredErrorMessage));
			}
		}
		if ($this->RBCPath->Required) {
			if (!$this->RBCPath->IsDetailKey && $this->RBCPath->FormValue != NULL && $this->RBCPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RBCPath->caption(), $this->RBCPath->RequiredErrorMessage));
			}
		}
		if ($this->PTPath->Required) {
			if (!$this->PTPath->IsDetailKey && $this->PTPath->FormValue != NULL && $this->PTPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTPath->caption(), $this->PTPath->RequiredErrorMessage));
			}
		}
		if ($this->ActualAmt->Required) {
			if (!$this->ActualAmt->IsDetailKey && $this->ActualAmt->FormValue != NULL && $this->ActualAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ActualAmt->caption(), $this->ActualAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ActualAmt->FormValue)) {
			AddMessage($FormError, $this->ActualAmt->errorMessage());
		}
		if ($this->NoSign->Required) {
			if (!$this->NoSign->IsDetailKey && $this->NoSign->FormValue != NULL && $this->NoSign->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoSign->caption(), $this->NoSign->RequiredErrorMessage));
			}
		}
		if ($this->_Barcode->Required) {
			if (!$this->_Barcode->IsDetailKey && $this->_Barcode->FormValue != NULL && $this->_Barcode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Barcode->caption(), $this->_Barcode->RequiredErrorMessage));
			}
		}
		if ($this->ReadTime->Required) {
			if (!$this->ReadTime->IsDetailKey && $this->ReadTime->FormValue != NULL && $this->ReadTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReadTime->caption(), $this->ReadTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReadTime->FormValue)) {
			AddMessage($FormError, $this->ReadTime->errorMessage());
		}
		if ($this->VailID->Required) {
			if (!$this->VailID->IsDetailKey && $this->VailID->FormValue != NULL && $this->VailID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VailID->caption(), $this->VailID->RequiredErrorMessage));
			}
		}
		if ($this->ReadMachine->Required) {
			if (!$this->ReadMachine->IsDetailKey && $this->ReadMachine->FormValue != NULL && $this->ReadMachine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReadMachine->caption(), $this->ReadMachine->RequiredErrorMessage));
			}
		}
		if ($this->LabCD->Required) {
			if (!$this->LabCD->IsDetailKey && $this->LabCD->FormValue != NULL && $this->LabCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabCD->caption(), $this->LabCD->RequiredErrorMessage));
			}
		}
		if ($this->OutLabAmt->Required) {
			if (!$this->OutLabAmt->IsDetailKey && $this->OutLabAmt->FormValue != NULL && $this->OutLabAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutLabAmt->caption(), $this->OutLabAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OutLabAmt->FormValue)) {
			AddMessage($FormError, $this->OutLabAmt->errorMessage());
		}
		if ($this->ProductQty->Required) {
			if (!$this->ProductQty->IsDetailKey && $this->ProductQty->FormValue != NULL && $this->ProductQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductQty->caption(), $this->ProductQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProductQty->FormValue)) {
			AddMessage($FormError, $this->ProductQty->errorMessage());
		}
		if ($this->Repeat->Required) {
			if (!$this->Repeat->IsDetailKey && $this->Repeat->FormValue != NULL && $this->Repeat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeat->caption(), $this->Repeat->RequiredErrorMessage));
			}
		}
		if ($this->DeptNo->Required) {
			if (!$this->DeptNo->IsDetailKey && $this->DeptNo->FormValue != NULL && $this->DeptNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptNo->caption(), $this->DeptNo->RequiredErrorMessage));
			}
		}
		if ($this->Desc1->Required) {
			if (!$this->Desc1->IsDetailKey && $this->Desc1->FormValue != NULL && $this->Desc1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Desc1->caption(), $this->Desc1->RequiredErrorMessage));
			}
		}
		if ($this->Desc2->Required) {
			if (!$this->Desc2->IsDetailKey && $this->Desc2->FormValue != NULL && $this->Desc2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Desc2->caption(), $this->Desc2->RequiredErrorMessage));
			}
		}
		if ($this->RptResult->Required) {
			if (!$this->RptResult->IsDetailKey && $this->RptResult->FormValue != NULL && $this->RptResult->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RptResult->caption(), $this->RptResult->RequiredErrorMessage));
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Branch
		$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, "", FALSE);

		// SidNo
		$this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, "", FALSE);

		// SidDate
		$this->SidDate->setDbValueDef($rsnew, UnFormatDateTime($this->SidDate->CurrentValue, 0), NULL, FALSE);

		// TestCd
		$this->TestCd->setDbValueDef($rsnew, $this->TestCd->CurrentValue, "", FALSE);

		// TestSubCd
		$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, "", FALSE);

		// DEptCd
		$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, "", FALSE);

		// ProfCd
		$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, "", FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, "", FALSE);

		// Specimen
		$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, "", FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, 0, FALSE);

		// ResultBy
		$this->ResultBy->setDbValueDef($rsnew, $this->ResultBy->CurrentValue, "", FALSE);

		// AuthBy
		$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, "", FALSE);

		// AuthDate
		$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, FALSE);

		// Abnormal
		$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, "", FALSE);

		// Printed
		$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, "", FALSE);

		// Dispatch
		$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, "", FALSE);

		// LOWHIGH
		$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, "", FALSE);

		// Unit
		$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, "", FALSE);

		// ResDate
		$this->ResDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResDate->CurrentValue, 0), NULL, FALSE);

		// Pic1
		$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, "", FALSE);

		// Pic2
		$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, "", FALSE);

		// GraphPath
		$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, "", FALSE);

		// SampleDate
		$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, FALSE);

		// SampleUser
		$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, "", FALSE);

		// ReceivedDate
		$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, FALSE);

		// ReceivedUser
		$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, "", FALSE);

		// DeptRecvDate
		$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, FALSE);

		// DeptRecvUser
		$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, "", FALSE);

		// PrintBy
		$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, "", FALSE);

		// PrintDate
		$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, FALSE);

		// MachineCD
		$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, "", FALSE);

		// TestCancel
		$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, "", FALSE);

		// OutSource
		$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, "", FALSE);

		// Tariff
		$this->Tariff->setDbValueDef($rsnew, $this->Tariff->CurrentValue, 0, FALSE);

		// EDITDATE
		$this->EDITDATE->setDbValueDef($rsnew, UnFormatDateTime($this->EDITDATE->CurrentValue, 0), NULL, FALSE);

		// UPLOAD
		$this->UPLOAD->setDbValueDef($rsnew, $this->UPLOAD->CurrentValue, "", FALSE);

		// SAuthDate
		$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, FALSE);

		// SAuthBy
		$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, "", FALSE);

		// NoRC
		$this->NoRC->setDbValueDef($rsnew, $this->NoRC->CurrentValue, "", FALSE);

		// DispDt
		$this->DispDt->setDbValueDef($rsnew, UnFormatDateTime($this->DispDt->CurrentValue, 0), NULL, FALSE);

		// DispUser
		$this->DispUser->setDbValueDef($rsnew, $this->DispUser->CurrentValue, "", FALSE);

		// DispRemarks
		$this->DispRemarks->setDbValueDef($rsnew, $this->DispRemarks->CurrentValue, "", FALSE);

		// DispMode
		$this->DispMode->setDbValueDef($rsnew, $this->DispMode->CurrentValue, "", FALSE);

		// ProductCD
		$this->ProductCD->setDbValueDef($rsnew, $this->ProductCD->CurrentValue, "", FALSE);

		// Nos
		$this->Nos->setDbValueDef($rsnew, $this->Nos->CurrentValue, NULL, FALSE);

		// WBCPath
		$this->WBCPath->setDbValueDef($rsnew, $this->WBCPath->CurrentValue, "", FALSE);

		// RBCPath
		$this->RBCPath->setDbValueDef($rsnew, $this->RBCPath->CurrentValue, "", FALSE);

		// PTPath
		$this->PTPath->setDbValueDef($rsnew, $this->PTPath->CurrentValue, "", FALSE);

		// ActualAmt
		$this->ActualAmt->setDbValueDef($rsnew, $this->ActualAmt->CurrentValue, 0, FALSE);

		// NoSign
		$this->NoSign->setDbValueDef($rsnew, $this->NoSign->CurrentValue, "", FALSE);

		// Barcode
		$this->_Barcode->setDbValueDef($rsnew, $this->_Barcode->CurrentValue, "", FALSE);

		// ReadTime
		$this->ReadTime->setDbValueDef($rsnew, UnFormatDateTime($this->ReadTime->CurrentValue, 0), NULL, FALSE);

		// VailID
		$this->VailID->setDbValueDef($rsnew, $this->VailID->CurrentValue, "", FALSE);

		// ReadMachine
		$this->ReadMachine->setDbValueDef($rsnew, $this->ReadMachine->CurrentValue, "", FALSE);

		// LabCD
		$this->LabCD->setDbValueDef($rsnew, $this->LabCD->CurrentValue, "", FALSE);

		// OutLabAmt
		$this->OutLabAmt->setDbValueDef($rsnew, $this->OutLabAmt->CurrentValue, 0, FALSE);

		// ProductQty
		$this->ProductQty->setDbValueDef($rsnew, $this->ProductQty->CurrentValue, 0, FALSE);

		// Repeat
		$this->Repeat->setDbValueDef($rsnew, $this->Repeat->CurrentValue, "", FALSE);

		// DeptNo
		$this->DeptNo->setDbValueDef($rsnew, $this->DeptNo->CurrentValue, "", FALSE);

		// Desc1
		$this->Desc1->setDbValueDef($rsnew, $this->Desc1->CurrentValue, "", FALSE);

		// Desc2
		$this->Desc2->setDbValueDef($rsnew, $this->Desc2->CurrentValue, "", FALSE);

		// RptResult
		$this->RptResult->setDbValueDef($rsnew, $this->RptResult->CurrentValue, "", FALSE);

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

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->Branch->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->SidDate->AdvancedSearch->load();
		$this->TestCd->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->ResultBy->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->ResDate->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Tariff->AdvancedSearch->load();
		$this->EDITDATE->AdvancedSearch->load();
		$this->UPLOAD->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->NoRC->AdvancedSearch->load();
		$this->DispDt->AdvancedSearch->load();
		$this->DispUser->AdvancedSearch->load();
		$this->DispRemarks->AdvancedSearch->load();
		$this->DispMode->AdvancedSearch->load();
		$this->ProductCD->AdvancedSearch->load();
		$this->Nos->AdvancedSearch->load();
		$this->WBCPath->AdvancedSearch->load();
		$this->RBCPath->AdvancedSearch->load();
		$this->PTPath->AdvancedSearch->load();
		$this->ActualAmt->AdvancedSearch->load();
		$this->NoSign->AdvancedSearch->load();
		$this->_Barcode->AdvancedSearch->load();
		$this->ReadTime->AdvancedSearch->load();
		$this->Result->AdvancedSearch->load();
		$this->VailID->AdvancedSearch->load();
		$this->ReadMachine->AdvancedSearch->load();
		$this->LabCD->AdvancedSearch->load();
		$this->OutLabAmt->AdvancedSearch->load();
		$this->ProductQty->AdvancedSearch->load();
		$this->Repeat->AdvancedSearch->load();
		$this->DeptNo->AdvancedSearch->load();
		$this->Desc1->AdvancedSearch->load();
		$this->Desc2->AdvancedSearch->load();
		$this->RptResult->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.flab_test_resultlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.flab_test_resultlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.flab_test_resultlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_lab_test_result" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_lab_test_result\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.flab_test_resultlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"flab_test_resultlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"lab_test_resultsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"lab_test_result\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'lab_test_resultsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"flab_test_resultlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
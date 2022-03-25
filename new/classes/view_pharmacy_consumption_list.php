<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_pharmacy_consumption_list extends view_pharmacy_consumption
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_pharmacy_consumption';

	// Page object name
	public $PageObjName = "view_pharmacy_consumption_list";

	// Grid form hidden field names
	public $FormName = "fview_pharmacy_consumptionlist";
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

		// Table object (view_pharmacy_consumption)
		if (!isset($GLOBALS["view_pharmacy_consumption"]) || get_class($GLOBALS["view_pharmacy_consumption"]) == PROJECT_NAMESPACE . "view_pharmacy_consumption") {
			$GLOBALS["view_pharmacy_consumption"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_pharmacy_consumption"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "view_pharmacy_consumptionadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_pharmacy_consumptiondelete.php";
		$this->MultiUpdateUrl = "view_pharmacy_consumptionupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_consumption');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacy_consumptionlistsrch";

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
		global $view_pharmacy_consumption;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($view_pharmacy_consumption);
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
		$this->id->setVisibility();
		$this->PRC->setVisibility();
		$this->DES->setVisibility();
		$this->BATCH->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->Stock->setVisibility();
		$this->EXPDT->setVisibility();
		$this->BILLDATE->setVisibility();
		$this->GENNAME->Visible = FALSE;
		$this->UNIT->Visible = FALSE;
		$this->RT->Visible = FALSE;
		$this->SSGST->Visible = FALSE;
		$this->SCGST->Visible = FALSE;
		$this->MFRCODE->setVisibility();
		$this->BRCODE->Visible = FALSE;
		$this->HospID->Visible = FALSE;
		$this->Select->setVisibility();
		$this->ConsQTY->setVisibility();
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

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(Config("TABLE_START_REC")) !== NULL || Get(Config("TABLE_PAGE_NO")) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
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
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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

		// Begin transaction
		$conn->beginTrans();
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
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
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

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DES") && $CurrentForm->hasValue("o_DES") && $this->DES->CurrentValue != $this->DES->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BATCH") && $CurrentForm->hasValue("o_BATCH") && $this->BATCH->CurrentValue != $this->BATCH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Stock") && $CurrentForm->hasValue("o_Stock") && $this->Stock->CurrentValue != $this->Stock->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue != $this->EXPDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BILLDATE") && $CurrentForm->hasValue("o_BILLDATE") && $this->BILLDATE->CurrentValue != $this->BILLDATE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MFRCODE") && $CurrentForm->hasValue("o_MFRCODE") && $this->MFRCODE->CurrentValue != $this->MFRCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Select") && $CurrentForm->hasValue("o_Select") && $this->Select->CurrentValue != $this->Select->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ConsQTY") && $CurrentForm->hasValue("o_ConsQTY") && $this->ConsQTY->CurrentValue != $this->ConsQTY->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacy_consumptionlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
		$filterList = Concat($filterList, $this->DES->AdvancedSearch->toJson(), ","); // Field DES
		$filterList = Concat($filterList, $this->BATCH->AdvancedSearch->toJson(), ","); // Field BATCH
		$filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
		$filterList = Concat($filterList, $this->Stock->AdvancedSearch->toJson(), ","); // Field Stock
		$filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
		$filterList = Concat($filterList, $this->BILLDATE->AdvancedSearch->toJson(), ","); // Field BILLDATE
		$filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
		$filterList = Concat($filterList, $this->UNIT->AdvancedSearch->toJson(), ","); // Field UNIT
		$filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
		$filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
		$filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
		$filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
		$filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->Select->AdvancedSearch->toJson(), ","); // Field Select
		$filterList = Concat($filterList, $this->ConsQTY->AdvancedSearch->toJson(), ","); // Field ConsQTY
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacy_consumptionlistsrch", $filters);
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

		// Field PRC
		$this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
		$this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
		$this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
		$this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
		$this->PRC->AdvancedSearch->save();

		// Field DES
		$this->DES->AdvancedSearch->SearchValue = @$filter["x_DES"];
		$this->DES->AdvancedSearch->SearchOperator = @$filter["z_DES"];
		$this->DES->AdvancedSearch->SearchCondition = @$filter["v_DES"];
		$this->DES->AdvancedSearch->SearchValue2 = @$filter["y_DES"];
		$this->DES->AdvancedSearch->SearchOperator2 = @$filter["w_DES"];
		$this->DES->AdvancedSearch->save();

		// Field BATCH
		$this->BATCH->AdvancedSearch->SearchValue = @$filter["x_BATCH"];
		$this->BATCH->AdvancedSearch->SearchOperator = @$filter["z_BATCH"];
		$this->BATCH->AdvancedSearch->SearchCondition = @$filter["v_BATCH"];
		$this->BATCH->AdvancedSearch->SearchValue2 = @$filter["y_BATCH"];
		$this->BATCH->AdvancedSearch->SearchOperator2 = @$filter["w_BATCH"];
		$this->BATCH->AdvancedSearch->save();

		// Field OQ
		$this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
		$this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
		$this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
		$this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
		$this->OQ->AdvancedSearch->save();

		// Field Stock
		$this->Stock->AdvancedSearch->SearchValue = @$filter["x_Stock"];
		$this->Stock->AdvancedSearch->SearchOperator = @$filter["z_Stock"];
		$this->Stock->AdvancedSearch->SearchCondition = @$filter["v_Stock"];
		$this->Stock->AdvancedSearch->SearchValue2 = @$filter["y_Stock"];
		$this->Stock->AdvancedSearch->SearchOperator2 = @$filter["w_Stock"];
		$this->Stock->AdvancedSearch->save();

		// Field EXPDT
		$this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
		$this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
		$this->EXPDT->AdvancedSearch->save();

		// Field BILLDATE
		$this->BILLDATE->AdvancedSearch->SearchValue = @$filter["x_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchOperator = @$filter["z_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchCondition = @$filter["v_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchValue2 = @$filter["y_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDATE"];
		$this->BILLDATE->AdvancedSearch->save();

		// Field GENNAME
		$this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
		$this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
		$this->GENNAME->AdvancedSearch->save();

		// Field UNIT
		$this->UNIT->AdvancedSearch->SearchValue = @$filter["x_UNIT"];
		$this->UNIT->AdvancedSearch->SearchOperator = @$filter["z_UNIT"];
		$this->UNIT->AdvancedSearch->SearchCondition = @$filter["v_UNIT"];
		$this->UNIT->AdvancedSearch->SearchValue2 = @$filter["y_UNIT"];
		$this->UNIT->AdvancedSearch->SearchOperator2 = @$filter["w_UNIT"];
		$this->UNIT->AdvancedSearch->save();

		// Field RT
		$this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
		$this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
		$this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
		$this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
		$this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
		$this->RT->AdvancedSearch->save();

		// Field SSGST
		$this->SSGST->AdvancedSearch->SearchValue = @$filter["x_SSGST"];
		$this->SSGST->AdvancedSearch->SearchOperator = @$filter["z_SSGST"];
		$this->SSGST->AdvancedSearch->SearchCondition = @$filter["v_SSGST"];
		$this->SSGST->AdvancedSearch->SearchValue2 = @$filter["y_SSGST"];
		$this->SSGST->AdvancedSearch->SearchOperator2 = @$filter["w_SSGST"];
		$this->SSGST->AdvancedSearch->save();

		// Field SCGST
		$this->SCGST->AdvancedSearch->SearchValue = @$filter["x_SCGST"];
		$this->SCGST->AdvancedSearch->SearchOperator = @$filter["z_SCGST"];
		$this->SCGST->AdvancedSearch->SearchCondition = @$filter["v_SCGST"];
		$this->SCGST->AdvancedSearch->SearchValue2 = @$filter["y_SCGST"];
		$this->SCGST->AdvancedSearch->SearchOperator2 = @$filter["w_SCGST"];
		$this->SCGST->AdvancedSearch->save();

		// Field MFRCODE
		$this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
		$this->MFRCODE->AdvancedSearch->save();

		// Field BRCODE
		$this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
		$this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
		$this->BRCODE->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field Select
		$this->Select->AdvancedSearch->SearchValue = @$filter["x_Select"];
		$this->Select->AdvancedSearch->SearchOperator = @$filter["z_Select"];
		$this->Select->AdvancedSearch->SearchCondition = @$filter["v_Select"];
		$this->Select->AdvancedSearch->SearchValue2 = @$filter["y_Select"];
		$this->Select->AdvancedSearch->SearchOperator2 = @$filter["w_Select"];
		$this->Select->AdvancedSearch->save();

		// Field ConsQTY
		$this->ConsQTY->AdvancedSearch->SearchValue = @$filter["x_ConsQTY"];
		$this->ConsQTY->AdvancedSearch->SearchOperator = @$filter["z_ConsQTY"];
		$this->ConsQTY->AdvancedSearch->SearchCondition = @$filter["v_ConsQTY"];
		$this->ConsQTY->AdvancedSearch->SearchValue2 = @$filter["y_ConsQTY"];
		$this->ConsQTY->AdvancedSearch->SearchOperator2 = @$filter["w_ConsQTY"];
		$this->ConsQTY->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->PRC, $default, FALSE); // PRC
		$this->buildSearchSql($where, $this->DES, $default, FALSE); // DES
		$this->buildSearchSql($where, $this->BATCH, $default, FALSE); // BATCH
		$this->buildSearchSql($where, $this->OQ, $default, FALSE); // OQ
		$this->buildSearchSql($where, $this->Stock, $default, FALSE); // Stock
		$this->buildSearchSql($where, $this->EXPDT, $default, FALSE); // EXPDT
		$this->buildSearchSql($where, $this->BILLDATE, $default, FALSE); // BILLDATE
		$this->buildSearchSql($where, $this->GENNAME, $default, FALSE); // GENNAME
		$this->buildSearchSql($where, $this->UNIT, $default, FALSE); // UNIT
		$this->buildSearchSql($where, $this->RT, $default, FALSE); // RT
		$this->buildSearchSql($where, $this->SSGST, $default, FALSE); // SSGST
		$this->buildSearchSql($where, $this->SCGST, $default, FALSE); // SCGST
		$this->buildSearchSql($where, $this->MFRCODE, $default, FALSE); // MFRCODE
		$this->buildSearchSql($where, $this->BRCODE, $default, FALSE); // BRCODE
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->Select, $default, TRUE); // Select
		$this->buildSearchSql($where, $this->ConsQTY, $default, FALSE); // ConsQTY

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->PRC->AdvancedSearch->save(); // PRC
			$this->DES->AdvancedSearch->save(); // DES
			$this->BATCH->AdvancedSearch->save(); // BATCH
			$this->OQ->AdvancedSearch->save(); // OQ
			$this->Stock->AdvancedSearch->save(); // Stock
			$this->EXPDT->AdvancedSearch->save(); // EXPDT
			$this->BILLDATE->AdvancedSearch->save(); // BILLDATE
			$this->GENNAME->AdvancedSearch->save(); // GENNAME
			$this->UNIT->AdvancedSearch->save(); // UNIT
			$this->RT->AdvancedSearch->save(); // RT
			$this->SSGST->AdvancedSearch->save(); // SSGST
			$this->SCGST->AdvancedSearch->save(); // SCGST
			$this->MFRCODE->AdvancedSearch->save(); // MFRCODE
			$this->BRCODE->AdvancedSearch->save(); // BRCODE
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->Select->AdvancedSearch->save(); // Select
			$this->ConsQTY->AdvancedSearch->save(); // ConsQTY
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
		$this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DES, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BATCH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UNIT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Select, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ConsQTY, $arKeywords, $type);
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
		if ($this->PRC->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DES->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BATCH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OQ->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Stock->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EXPDT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BILLDATE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GENNAME->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UNIT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SSGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SCGST->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MFRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BRCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Select->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ConsQTY->AdvancedSearch->issetSession())
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
		$this->PRC->AdvancedSearch->unsetSession();
		$this->DES->AdvancedSearch->unsetSession();
		$this->BATCH->AdvancedSearch->unsetSession();
		$this->OQ->AdvancedSearch->unsetSession();
		$this->Stock->AdvancedSearch->unsetSession();
		$this->EXPDT->AdvancedSearch->unsetSession();
		$this->BILLDATE->AdvancedSearch->unsetSession();
		$this->GENNAME->AdvancedSearch->unsetSession();
		$this->UNIT->AdvancedSearch->unsetSession();
		$this->RT->AdvancedSearch->unsetSession();
		$this->SSGST->AdvancedSearch->unsetSession();
		$this->SCGST->AdvancedSearch->unsetSession();
		$this->MFRCODE->AdvancedSearch->unsetSession();
		$this->BRCODE->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->Select->AdvancedSearch->unsetSession();
		$this->ConsQTY->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->DES->AdvancedSearch->load();
		$this->BATCH->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->Stock->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->BILLDATE->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->UNIT->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Select->AdvancedSearch->load();
		$this->ConsQTY->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->PRC); // PRC
			$this->updateSort($this->DES); // DES
			$this->updateSort($this->BATCH); // BATCH
			$this->updateSort($this->Stock); // Stock
			$this->updateSort($this->EXPDT); // EXPDT
			$this->updateSort($this->BILLDATE); // BILLDATE
			$this->updateSort($this->MFRCODE); // MFRCODE
			$this->updateSort($this->Select); // Select
			$this->updateSort($this->ConsQTY); // ConsQTY
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
				$this->id->setSort("");
				$this->PRC->setSort("");
				$this->DES->setSort("");
				$this->BATCH->setSort("");
				$this->Stock->setSort("");
				$this->EXPDT->setSort("");
				$this->BILLDATE->setSort("");
				$this->MFRCODE->setSort("");
				$this->Select->setSort("");
				$this->ConsQTY->setSort("");
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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacy_consumptionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacy_consumptionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fview_pharmacy_consumptionlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

			// Grid-Edit
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = FALSE;
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
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
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->DES->CurrentValue = NULL;
		$this->DES->OldValue = $this->DES->CurrentValue;
		$this->BATCH->CurrentValue = NULL;
		$this->BATCH->OldValue = $this->BATCH->CurrentValue;
		$this->OQ->CurrentValue = 0.00;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->Stock->CurrentValue = 0;
		$this->Stock->OldValue = $this->Stock->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->BILLDATE->CurrentValue = NULL;
		$this->BILLDATE->OldValue = $this->BILLDATE->CurrentValue;
		$this->GENNAME->CurrentValue = NULL;
		$this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
		$this->UNIT->CurrentValue = NULL;
		$this->UNIT->OldValue = $this->UNIT->CurrentValue;
		$this->RT->CurrentValue = 0.00;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->SSGST->CurrentValue = 0.00;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = 0.00;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->Select->CurrentValue = NULL;
		$this->Select->OldValue = $this->Select->CurrentValue;
		$this->ConsQTY->CurrentValue = 0;
		$this->ConsQTY->OldValue = $this->ConsQTY->CurrentValue;
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

		// PRC
		if (!$this->isAddOrEdit() && $this->PRC->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PRC->AdvancedSearch->SearchValue != "" || $this->PRC->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DES
		if (!$this->isAddOrEdit() && $this->DES->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DES->AdvancedSearch->SearchValue != "" || $this->DES->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BATCH
		if (!$this->isAddOrEdit() && $this->BATCH->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BATCH->AdvancedSearch->SearchValue != "" || $this->BATCH->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// OQ
		if (!$this->isAddOrEdit() && $this->OQ->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->OQ->AdvancedSearch->SearchValue != "" || $this->OQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Stock
		if (!$this->isAddOrEdit() && $this->Stock->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Stock->AdvancedSearch->SearchValue != "" || $this->Stock->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// EXPDT
		if (!$this->isAddOrEdit() && $this->EXPDT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->EXPDT->AdvancedSearch->SearchValue != "" || $this->EXPDT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BILLDATE
		if (!$this->isAddOrEdit() && $this->BILLDATE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BILLDATE->AdvancedSearch->SearchValue != "" || $this->BILLDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// GENNAME
		if (!$this->isAddOrEdit() && $this->GENNAME->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->GENNAME->AdvancedSearch->SearchValue != "" || $this->GENNAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// UNIT
		if (!$this->isAddOrEdit() && $this->UNIT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->UNIT->AdvancedSearch->SearchValue != "" || $this->UNIT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RT
		if (!$this->isAddOrEdit() && $this->RT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RT->AdvancedSearch->SearchValue != "" || $this->RT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SSGST
		if (!$this->isAddOrEdit() && $this->SSGST->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SSGST->AdvancedSearch->SearchValue != "" || $this->SSGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SCGST
		if (!$this->isAddOrEdit() && $this->SCGST->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SCGST->AdvancedSearch->SearchValue != "" || $this->SCGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// MFRCODE
		if (!$this->isAddOrEdit() && $this->MFRCODE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->MFRCODE->AdvancedSearch->SearchValue != "" || $this->MFRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BRCODE
		if (!$this->isAddOrEdit() && $this->BRCODE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BRCODE->AdvancedSearch->SearchValue != "" || $this->BRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospID
		if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Select
		if (!$this->isAddOrEdit() && $this->Select->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Select->AdvancedSearch->SearchValue != "" || $this->Select->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->Select->AdvancedSearch->SearchValue))
			$this->Select->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Select->AdvancedSearch->SearchValue);
		if (is_array($this->Select->AdvancedSearch->SearchValue2))
			$this->Select->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Select->AdvancedSearch->SearchValue2);

		// ConsQTY
		if (!$this->isAddOrEdit() && $this->ConsQTY->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ConsQTY->AdvancedSearch->SearchValue != "" || $this->ConsQTY->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'DES' first before field var 'x_DES'
		$val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
		if (!$this->DES->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DES->Visible = FALSE; // Disable update for API request
			else
				$this->DES->setFormValue($val);
		}

		// Check field name 'BATCH' first before field var 'x_BATCH'
		$val = $CurrentForm->hasValue("BATCH") ? $CurrentForm->getValue("BATCH") : $CurrentForm->getValue("x_BATCH");
		if (!$this->BATCH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BATCH->Visible = FALSE; // Disable update for API request
			else
				$this->BATCH->setFormValue($val);
		}

		// Check field name 'Stock' first before field var 'x_Stock'
		$val = $CurrentForm->hasValue("Stock") ? $CurrentForm->getValue("Stock") : $CurrentForm->getValue("x_Stock");
		if (!$this->Stock->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Stock->Visible = FALSE; // Disable update for API request
			else
				$this->Stock->setFormValue($val);
		}

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}

		// Check field name 'BILLDATE' first before field var 'x_BILLDATE'
		$val = $CurrentForm->hasValue("BILLDATE") ? $CurrentForm->getValue("BILLDATE") : $CurrentForm->getValue("x_BILLDATE");
		if (!$this->BILLDATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BILLDATE->Visible = FALSE; // Disable update for API request
			else
				$this->BILLDATE->setFormValue($val);
			$this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'Select' first before field var 'x_Select'
		$val = $CurrentForm->hasValue("Select") ? $CurrentForm->getValue("Select") : $CurrentForm->getValue("x_Select");
		if (!$this->Select->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Select->Visible = FALSE; // Disable update for API request
			else
				$this->Select->setFormValue($val);
		}

		// Check field name 'ConsQTY' first before field var 'x_ConsQTY'
		$val = $CurrentForm->hasValue("ConsQTY") ? $CurrentForm->getValue("ConsQTY") : $CurrentForm->getValue("x_ConsQTY");
		if (!$this->ConsQTY->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ConsQTY->Visible = FALSE; // Disable update for API request
			else
				$this->ConsQTY->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->DES->CurrentValue = $this->DES->FormValue;
		$this->BATCH->CurrentValue = $this->BATCH->FormValue;
		$this->Stock->CurrentValue = $this->Stock->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->BILLDATE->CurrentValue = $this->BILLDATE->FormValue;
		$this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->Select->CurrentValue = $this->Select->FormValue;
		$this->ConsQTY->CurrentValue = $this->ConsQTY->FormValue;
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
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
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
		$this->PRC->setDbValue($row['PRC']);
		$this->DES->setDbValue($row['DES']);
		$this->BATCH->setDbValue($row['BATCH']);
		$this->OQ->setDbValue($row['OQ']);
		$this->Stock->setDbValue($row['Stock']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->BILLDATE->setDbValue($row['BILLDATE']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->UNIT->setDbValue($row['UNIT']);
		$this->RT->setDbValue($row['RT']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Select->setDbValue($row['Select']);
		$this->ConsQTY->setDbValue($row['ConsQTY']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['DES'] = $this->DES->CurrentValue;
		$row['BATCH'] = $this->BATCH->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['Stock'] = $this->Stock->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['BILLDATE'] = $this->BILLDATE->CurrentValue;
		$row['GENNAME'] = $this->GENNAME->CurrentValue;
		$row['UNIT'] = $this->UNIT->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['Select'] = $this->Select->CurrentValue;
		$row['ConsQTY'] = $this->ConsQTY->CurrentValue;
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
		// PRC
		// DES
		// BATCH
		// OQ
		// Stock
		// EXPDT
		// BILLDATE
		// GENNAME
		// UNIT
		// RT
		// SSGST
		// SCGST
		// MFRCODE
		// BRCODE
		// HospID
		// Select
		// ConsQTY

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// DES
			$this->DES->ViewValue = $this->DES->CurrentValue;
			$this->DES->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->ViewValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// BILLDATE
			$this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
			$this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
			$this->BILLDATE->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Select
			if (strval($this->Select->CurrentValue) != "") {
				$this->Select->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Select->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Select->ViewValue->add($this->Select->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Select->ViewValue = NULL;
			}
			$this->Select->ViewCustomAttributes = "";

			// ConsQTY
			$this->ConsQTY->ViewValue = $this->ConsQTY->CurrentValue;
			$this->ConsQTY->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";
			if (!$this->isExport())
				$this->PRC->ViewValue = $this->highlightValue($this->PRC);

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";
			$this->DES->TooltipValue = "";
			if (!$this->isExport())
				$this->DES->ViewValue = $this->highlightValue($this->DES);

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";
			if (!$this->isExport())
				$this->BATCH->ViewValue = $this->highlightValue($this->BATCH);

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";
			$this->Stock->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";
			$this->BILLDATE->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";
			if (!$this->isExport())
				$this->MFRCODE->ViewValue = $this->highlightValue($this->MFRCODE);

			// Select
			$this->Select->LinkCustomAttributes = "";
			$this->Select->HrefValue = "";
			$this->Select->TooltipValue = "";

			// ConsQTY
			$this->ConsQTY->LinkCustomAttributes = "";
			$this->ConsQTY->HrefValue = "";
			$this->ConsQTY->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (!$this->DES->Raw)
				$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
			$this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (!$this->BATCH->Raw)
				$this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->CurrentValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// BILLDATE
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue = HtmlEncode(FormatDateTime($this->BILLDATE->CurrentValue, 8));
			$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (!$this->MFRCODE->Raw)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// Select
			$this->Select->EditCustomAttributes = "";
			$this->Select->EditValue = $this->Select->options(FALSE);

			// ConsQTY
			$this->ConsQTY->EditAttrs["class"] = "form-control";
			$this->ConsQTY->EditCustomAttributes = "";
			if (!$this->ConsQTY->Raw)
				$this->ConsQTY->CurrentValue = HtmlDecode($this->ConsQTY->CurrentValue);
			$this->ConsQTY->EditValue = HtmlEncode($this->ConsQTY->CurrentValue);
			$this->ConsQTY->PlaceHolder = RemoveHtml($this->ConsQTY->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// Select
			$this->Select->LinkCustomAttributes = "";
			$this->Select->HrefValue = "";

			// ConsQTY
			$this->ConsQTY->LinkCustomAttributes = "";
			$this->ConsQTY->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			$this->PRC->EditValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			$this->DES->EditValue = $this->DES->CurrentValue;
			$this->DES->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			$this->BATCH->EditValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = $this->Stock->CurrentValue;
			$this->Stock->EditValue = FormatNumber($this->Stock->EditValue, 0, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->EditValue = FormatDateTime($this->EXPDT->EditValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// BILLDATE
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue = $this->BILLDATE->CurrentValue;
			$this->BILLDATE->EditValue = FormatDateTime($this->BILLDATE->EditValue, 0);
			$this->BILLDATE->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			$this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Select
			$this->Select->EditCustomAttributes = "";
			$this->Select->EditValue = $this->Select->options(FALSE);

			// ConsQTY
			$this->ConsQTY->EditAttrs["class"] = "form-control";
			$this->ConsQTY->EditCustomAttributes = "";
			if (!$this->ConsQTY->Raw)
				$this->ConsQTY->CurrentValue = HtmlDecode($this->ConsQTY->CurrentValue);
			$this->ConsQTY->EditValue = HtmlEncode($this->ConsQTY->CurrentValue);
			$this->ConsQTY->PlaceHolder = RemoveHtml($this->ConsQTY->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";
			$this->DES->TooltipValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";
			$this->Stock->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";
			$this->BILLDATE->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// Select
			$this->Select->LinkCustomAttributes = "";
			$this->Select->HrefValue = "";

			// ConsQTY
			$this->ConsQTY->LinkCustomAttributes = "";
			$this->ConsQTY->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (!$this->DES->Raw)
				$this->DES->AdvancedSearch->SearchValue = HtmlDecode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->EditValue = HtmlEncode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (!$this->BATCH->Raw)
				$this->BATCH->AdvancedSearch->SearchValue = HtmlDecode($this->BATCH->AdvancedSearch->SearchValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->AdvancedSearch->SearchValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->AdvancedSearch->SearchValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue2 = HtmlEncode($this->Stock->AdvancedSearch->SearchValue2);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue2, 0), 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// BILLDATE
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue2, 0), 8));
			$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (!$this->MFRCODE->Raw)
				$this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// Select
			$this->Select->EditCustomAttributes = "";
			$this->Select->EditValue = $this->Select->options(FALSE);

			// ConsQTY
			$this->ConsQTY->EditAttrs["class"] = "form-control";
			$this->ConsQTY->EditCustomAttributes = "";
			if (!$this->ConsQTY->Raw)
				$this->ConsQTY->AdvancedSearch->SearchValue = HtmlDecode($this->ConsQTY->AdvancedSearch->SearchValue);
			$this->ConsQTY->EditValue = HtmlEncode($this->ConsQTY->AdvancedSearch->SearchValue);
			$this->ConsQTY->PlaceHolder = RemoveHtml($this->ConsQTY->caption());
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
		if (!CheckInteger($this->Stock->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Stock->errorMessage());
		}
		if (!CheckInteger($this->Stock->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->Stock->errorMessage());
		}
		if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EXPDT->errorMessage());
		}
		if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->EXPDT->errorMessage());
		}
		if (!CheckDate($this->BILLDATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BILLDATE->errorMessage());
		}
		if (!CheckDate($this->BILLDATE->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->BILLDATE->errorMessage());
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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->DES->Required) {
			if (!$this->DES->IsDetailKey && $this->DES->FormValue != NULL && $this->DES->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DES->caption(), $this->DES->RequiredErrorMessage));
			}
		}
		if ($this->BATCH->Required) {
			if (!$this->BATCH->IsDetailKey && $this->BATCH->FormValue != NULL && $this->BATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCH->caption(), $this->BATCH->RequiredErrorMessage));
			}
		}
		if ($this->Stock->Required) {
			if (!$this->Stock->IsDetailKey && $this->Stock->FormValue != NULL && $this->Stock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
			}
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if ($this->BILLDATE->Required) {
			if (!$this->BILLDATE->IsDetailKey && $this->BILLDATE->FormValue != NULL && $this->BILLDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDATE->caption(), $this->BILLDATE->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->Select->Required) {
			if ($this->Select->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Select->caption(), $this->Select->RequiredErrorMessage));
			}
		}
		if ($this->ConsQTY->Required) {
			if (!$this->ConsQTY->IsDetailKey && $this->ConsQTY->FormValue != NULL && $this->ConsQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ConsQTY->caption(), $this->ConsQTY->RequiredErrorMessage));
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

			// Select
			$this->Select->setDbValueDef($rsnew, $this->Select->CurrentValue, NULL, $this->Select->ReadOnly);

			// ConsQTY
			$this->ConsQTY->setDbValueDef($rsnew, $this->ConsQTY->CurrentValue, NULL, $this->ConsQTY->ReadOnly);

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

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('Select')); // Select
		$hash .= GetFieldHash($rs->fields('ConsQTY')); // ConsQTY
		return md5($hash);
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

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// DES
		$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, FALSE);

		// BATCH
		$this->BATCH->setDbValueDef($rsnew, $this->BATCH->CurrentValue, NULL, FALSE);

		// Stock
		$this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, NULL, FALSE);

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// BILLDATE
		$this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// Select
		$this->Select->setDbValueDef($rsnew, $this->Select->CurrentValue, NULL, FALSE);

		// ConsQTY
		$this->ConsQTY->setDbValueDef($rsnew, $this->ConsQTY->CurrentValue, NULL, FALSE);

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
		$this->id->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->DES->AdvancedSearch->load();
		$this->BATCH->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->Stock->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->BILLDATE->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->UNIT->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->Select->AdvancedSearch->load();
		$this->ConsQTY->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_consumptionlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_consumptionlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_consumptionlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_view_pharmacy_consumption" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_pharmacy_consumption\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_pharmacy_consumptionlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacy_consumptionlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"view_pharmacy_consumptionsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_pharmacy_consumption\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'view_pharmacy_consumptionsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_pharmacy_consumptionlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
				case "x_Select":
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
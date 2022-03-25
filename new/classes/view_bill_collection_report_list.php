<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_bill_collection_report_list extends view_bill_collection_report
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_bill_collection_report';

	// Page object name
	public $PageObjName = "view_bill_collection_report_list";

	// Grid form hidden field names
	public $FormName = "fview_bill_collection_reportlist";
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
	public $ExportExcelCustom = TRUE;
	public $ExportWordCustom = TRUE;
	public $ExportPdfCustom = TRUE;
	public $ExportEmailCustom = TRUE;

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

		// Table object (view_bill_collection_report)
		if (!isset($GLOBALS["view_bill_collection_report"]) || get_class($GLOBALS["view_bill_collection_report"]) == PROJECT_NAMESPACE . "view_bill_collection_report") {
			$GLOBALS["view_bill_collection_report"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_bill_collection_report"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "view_bill_collection_reportadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_bill_collection_reportdelete.php";
		$this->MultiUpdateUrl = "view_bill_collection_reportupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_bill_collection_report');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_bill_collection_reportlistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $view_bill_collection_report;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($view_bill_collection_report);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
	public $DisplayRecords = 40000;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "40000,-1"; // Page sizes (comma separated)
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

		// Custom export (post back from ew.applyTemplate), export and terminate page
		if (Post("customexport") !== NULL) {
			$this->CustomExport = Post("customexport");
			$this->Export = $this->CustomExport;
			$this->terminate();
		}

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
		$this->createddate->setVisibility();
		$this->UserName->setVisibility();
		$this->CARD->setVisibility();
		$this->CASH->setVisibility();
		$this->NEFT->setVisibility();
		$this->PAYTM->setVisibility();
		$this->CHEQUE->setVisibility();
		$this->RTGS->setVisibility();
		$this->NotSelected->setVisibility();
		$this->REFUND->setVisibility();
		$this->CANCEL->setVisibility();
		$this->Total->setVisibility();
		$this->HospID->setVisibility();
		$this->BillType->setVisibility();
		$this->AdjAdvance->setVisibility();
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
		$this->AllowAddDeleteRow = FALSE; // Do not allow add/delete row

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
			$this->DisplayRecords = 40000; // Load default
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
					$this->DisplayRecords = 40000; // Non-numeric, load default
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
		if (count($arKeyFlds) >= 0) {
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_bill_collection_reportlistsrch");
		$filterList = Concat($filterList, $this->createddate->AdvancedSearch->toJson(), ","); // Field createddate
		$filterList = Concat($filterList, $this->UserName->AdvancedSearch->toJson(), ","); // Field UserName
		$filterList = Concat($filterList, $this->CARD->AdvancedSearch->toJson(), ","); // Field CARD
		$filterList = Concat($filterList, $this->CASH->AdvancedSearch->toJson(), ","); // Field CASH
		$filterList = Concat($filterList, $this->NEFT->AdvancedSearch->toJson(), ","); // Field NEFT
		$filterList = Concat($filterList, $this->PAYTM->AdvancedSearch->toJson(), ","); // Field PAYTM
		$filterList = Concat($filterList, $this->CHEQUE->AdvancedSearch->toJson(), ","); // Field CHEQUE
		$filterList = Concat($filterList, $this->RTGS->AdvancedSearch->toJson(), ","); // Field RTGS
		$filterList = Concat($filterList, $this->NotSelected->AdvancedSearch->toJson(), ","); // Field NotSelected
		$filterList = Concat($filterList, $this->REFUND->AdvancedSearch->toJson(), ","); // Field REFUND
		$filterList = Concat($filterList, $this->CANCEL->AdvancedSearch->toJson(), ","); // Field CANCEL
		$filterList = Concat($filterList, $this->Total->AdvancedSearch->toJson(), ","); // Field Total
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->BillType->AdvancedSearch->toJson(), ","); // Field BillType
		$filterList = Concat($filterList, $this->AdjAdvance->AdvancedSearch->toJson(), ","); // Field AdjAdvance
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_bill_collection_reportlistsrch", $filters);
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

		// Field createddate
		$this->createddate->AdvancedSearch->SearchValue = @$filter["x_createddate"];
		$this->createddate->AdvancedSearch->SearchOperator = @$filter["z_createddate"];
		$this->createddate->AdvancedSearch->SearchCondition = @$filter["v_createddate"];
		$this->createddate->AdvancedSearch->SearchValue2 = @$filter["y_createddate"];
		$this->createddate->AdvancedSearch->SearchOperator2 = @$filter["w_createddate"];
		$this->createddate->AdvancedSearch->save();

		// Field UserName
		$this->UserName->AdvancedSearch->SearchValue = @$filter["x_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator = @$filter["z_UserName"];
		$this->UserName->AdvancedSearch->SearchCondition = @$filter["v_UserName"];
		$this->UserName->AdvancedSearch->SearchValue2 = @$filter["y_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator2 = @$filter["w_UserName"];
		$this->UserName->AdvancedSearch->save();

		// Field CARD
		$this->CARD->AdvancedSearch->SearchValue = @$filter["x_CARD"];
		$this->CARD->AdvancedSearch->SearchOperator = @$filter["z_CARD"];
		$this->CARD->AdvancedSearch->SearchCondition = @$filter["v_CARD"];
		$this->CARD->AdvancedSearch->SearchValue2 = @$filter["y_CARD"];
		$this->CARD->AdvancedSearch->SearchOperator2 = @$filter["w_CARD"];
		$this->CARD->AdvancedSearch->save();

		// Field CASH
		$this->CASH->AdvancedSearch->SearchValue = @$filter["x_CASH"];
		$this->CASH->AdvancedSearch->SearchOperator = @$filter["z_CASH"];
		$this->CASH->AdvancedSearch->SearchCondition = @$filter["v_CASH"];
		$this->CASH->AdvancedSearch->SearchValue2 = @$filter["y_CASH"];
		$this->CASH->AdvancedSearch->SearchOperator2 = @$filter["w_CASH"];
		$this->CASH->AdvancedSearch->save();

		// Field NEFT
		$this->NEFT->AdvancedSearch->SearchValue = @$filter["x_NEFT"];
		$this->NEFT->AdvancedSearch->SearchOperator = @$filter["z_NEFT"];
		$this->NEFT->AdvancedSearch->SearchCondition = @$filter["v_NEFT"];
		$this->NEFT->AdvancedSearch->SearchValue2 = @$filter["y_NEFT"];
		$this->NEFT->AdvancedSearch->SearchOperator2 = @$filter["w_NEFT"];
		$this->NEFT->AdvancedSearch->save();

		// Field PAYTM
		$this->PAYTM->AdvancedSearch->SearchValue = @$filter["x_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchOperator = @$filter["z_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchCondition = @$filter["v_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchValue2 = @$filter["y_PAYTM"];
		$this->PAYTM->AdvancedSearch->SearchOperator2 = @$filter["w_PAYTM"];
		$this->PAYTM->AdvancedSearch->save();

		// Field CHEQUE
		$this->CHEQUE->AdvancedSearch->SearchValue = @$filter["x_CHEQUE"];
		$this->CHEQUE->AdvancedSearch->SearchOperator = @$filter["z_CHEQUE"];
		$this->CHEQUE->AdvancedSearch->SearchCondition = @$filter["v_CHEQUE"];
		$this->CHEQUE->AdvancedSearch->SearchValue2 = @$filter["y_CHEQUE"];
		$this->CHEQUE->AdvancedSearch->SearchOperator2 = @$filter["w_CHEQUE"];
		$this->CHEQUE->AdvancedSearch->save();

		// Field RTGS
		$this->RTGS->AdvancedSearch->SearchValue = @$filter["x_RTGS"];
		$this->RTGS->AdvancedSearch->SearchOperator = @$filter["z_RTGS"];
		$this->RTGS->AdvancedSearch->SearchCondition = @$filter["v_RTGS"];
		$this->RTGS->AdvancedSearch->SearchValue2 = @$filter["y_RTGS"];
		$this->RTGS->AdvancedSearch->SearchOperator2 = @$filter["w_RTGS"];
		$this->RTGS->AdvancedSearch->save();

		// Field NotSelected
		$this->NotSelected->AdvancedSearch->SearchValue = @$filter["x_NotSelected"];
		$this->NotSelected->AdvancedSearch->SearchOperator = @$filter["z_NotSelected"];
		$this->NotSelected->AdvancedSearch->SearchCondition = @$filter["v_NotSelected"];
		$this->NotSelected->AdvancedSearch->SearchValue2 = @$filter["y_NotSelected"];
		$this->NotSelected->AdvancedSearch->SearchOperator2 = @$filter["w_NotSelected"];
		$this->NotSelected->AdvancedSearch->save();

		// Field REFUND
		$this->REFUND->AdvancedSearch->SearchValue = @$filter["x_REFUND"];
		$this->REFUND->AdvancedSearch->SearchOperator = @$filter["z_REFUND"];
		$this->REFUND->AdvancedSearch->SearchCondition = @$filter["v_REFUND"];
		$this->REFUND->AdvancedSearch->SearchValue2 = @$filter["y_REFUND"];
		$this->REFUND->AdvancedSearch->SearchOperator2 = @$filter["w_REFUND"];
		$this->REFUND->AdvancedSearch->save();

		// Field CANCEL
		$this->CANCEL->AdvancedSearch->SearchValue = @$filter["x_CANCEL"];
		$this->CANCEL->AdvancedSearch->SearchOperator = @$filter["z_CANCEL"];
		$this->CANCEL->AdvancedSearch->SearchCondition = @$filter["v_CANCEL"];
		$this->CANCEL->AdvancedSearch->SearchValue2 = @$filter["y_CANCEL"];
		$this->CANCEL->AdvancedSearch->SearchOperator2 = @$filter["w_CANCEL"];
		$this->CANCEL->AdvancedSearch->save();

		// Field Total
		$this->Total->AdvancedSearch->SearchValue = @$filter["x_Total"];
		$this->Total->AdvancedSearch->SearchOperator = @$filter["z_Total"];
		$this->Total->AdvancedSearch->SearchCondition = @$filter["v_Total"];
		$this->Total->AdvancedSearch->SearchValue2 = @$filter["y_Total"];
		$this->Total->AdvancedSearch->SearchOperator2 = @$filter["w_Total"];
		$this->Total->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field BillType
		$this->BillType->AdvancedSearch->SearchValue = @$filter["x_BillType"];
		$this->BillType->AdvancedSearch->SearchOperator = @$filter["z_BillType"];
		$this->BillType->AdvancedSearch->SearchCondition = @$filter["v_BillType"];
		$this->BillType->AdvancedSearch->SearchValue2 = @$filter["y_BillType"];
		$this->BillType->AdvancedSearch->SearchOperator2 = @$filter["w_BillType"];
		$this->BillType->AdvancedSearch->save();

		// Field AdjAdvance
		$this->AdjAdvance->AdvancedSearch->SearchValue = @$filter["x_AdjAdvance"];
		$this->AdjAdvance->AdvancedSearch->SearchOperator = @$filter["z_AdjAdvance"];
		$this->AdjAdvance->AdvancedSearch->SearchCondition = @$filter["v_AdjAdvance"];
		$this->AdjAdvance->AdvancedSearch->SearchValue2 = @$filter["y_AdjAdvance"];
		$this->AdjAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_AdjAdvance"];
		$this->AdjAdvance->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->createddate, $default, FALSE); // createddate
		$this->buildSearchSql($where, $this->UserName, $default, FALSE); // UserName
		$this->buildSearchSql($where, $this->CARD, $default, FALSE); // CARD
		$this->buildSearchSql($where, $this->CASH, $default, FALSE); // CASH
		$this->buildSearchSql($where, $this->NEFT, $default, FALSE); // NEFT
		$this->buildSearchSql($where, $this->PAYTM, $default, FALSE); // PAYTM
		$this->buildSearchSql($where, $this->CHEQUE, $default, FALSE); // CHEQUE
		$this->buildSearchSql($where, $this->RTGS, $default, FALSE); // RTGS
		$this->buildSearchSql($where, $this->NotSelected, $default, FALSE); // NotSelected
		$this->buildSearchSql($where, $this->REFUND, $default, FALSE); // REFUND
		$this->buildSearchSql($where, $this->CANCEL, $default, FALSE); // CANCEL
		$this->buildSearchSql($where, $this->Total, $default, FALSE); // Total
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->BillType, $default, FALSE); // BillType
		$this->buildSearchSql($where, $this->AdjAdvance, $default, FALSE); // AdjAdvance

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->createddate->AdvancedSearch->save(); // createddate
			$this->UserName->AdvancedSearch->save(); // UserName
			$this->CARD->AdvancedSearch->save(); // CARD
			$this->CASH->AdvancedSearch->save(); // CASH
			$this->NEFT->AdvancedSearch->save(); // NEFT
			$this->PAYTM->AdvancedSearch->save(); // PAYTM
			$this->CHEQUE->AdvancedSearch->save(); // CHEQUE
			$this->RTGS->AdvancedSearch->save(); // RTGS
			$this->NotSelected->AdvancedSearch->save(); // NotSelected
			$this->REFUND->AdvancedSearch->save(); // REFUND
			$this->CANCEL->AdvancedSearch->save(); // CANCEL
			$this->Total->AdvancedSearch->save(); // Total
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->BillType->AdvancedSearch->save(); // BillType
			$this->AdjAdvance->AdvancedSearch->save(); // AdjAdvance
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
		$this->buildBasicSearchSql($where, $this->UserName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BillType, $arKeywords, $type);
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
		if ($this->createddate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->UserName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CARD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CASH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NEFT->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PAYTM->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CHEQUE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RTGS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NotSelected->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->REFUND->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CANCEL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Total->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AdjAdvance->AdvancedSearch->issetSession())
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
		$this->createddate->AdvancedSearch->unsetSession();
		$this->UserName->AdvancedSearch->unsetSession();
		$this->CARD->AdvancedSearch->unsetSession();
		$this->CASH->AdvancedSearch->unsetSession();
		$this->NEFT->AdvancedSearch->unsetSession();
		$this->PAYTM->AdvancedSearch->unsetSession();
		$this->CHEQUE->AdvancedSearch->unsetSession();
		$this->RTGS->AdvancedSearch->unsetSession();
		$this->NotSelected->AdvancedSearch->unsetSession();
		$this->REFUND->AdvancedSearch->unsetSession();
		$this->CANCEL->AdvancedSearch->unsetSession();
		$this->Total->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->BillType->AdvancedSearch->unsetSession();
		$this->AdjAdvance->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->createddate->AdvancedSearch->load();
		$this->UserName->AdvancedSearch->load();
		$this->CARD->AdvancedSearch->load();
		$this->CASH->AdvancedSearch->load();
		$this->NEFT->AdvancedSearch->load();
		$this->PAYTM->AdvancedSearch->load();
		$this->CHEQUE->AdvancedSearch->load();
		$this->RTGS->AdvancedSearch->load();
		$this->NotSelected->AdvancedSearch->load();
		$this->REFUND->AdvancedSearch->load();
		$this->CANCEL->AdvancedSearch->load();
		$this->Total->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->BillType->AdvancedSearch->load();
		$this->AdjAdvance->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->createddate); // createddate
			$this->updateSort($this->UserName); // UserName
			$this->updateSort($this->CARD); // CARD
			$this->updateSort($this->CASH); // CASH
			$this->updateSort($this->NEFT); // NEFT
			$this->updateSort($this->PAYTM); // PAYTM
			$this->updateSort($this->CHEQUE); // CHEQUE
			$this->updateSort($this->RTGS); // RTGS
			$this->updateSort($this->NotSelected); // NotSelected
			$this->updateSort($this->REFUND); // REFUND
			$this->updateSort($this->CANCEL); // CANCEL
			$this->updateSort($this->Total); // Total
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->BillType); // BillType
			$this->updateSort($this->AdjAdvance); // AdjAdvance
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
				$this->createddate->setSort("DESC");
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
				$this->createddate->setSort("");
				$this->UserName->setSort("");
				$this->CARD->setSort("");
				$this->CASH->setSort("");
				$this->NEFT->setSort("");
				$this->PAYTM->setSort("");
				$this->CHEQUE->setSort("");
				$this->RTGS->setSort("");
				$this->NotSelected->setSort("");
				$this->REFUND->setSort("");
				$this->CANCEL->setSort("");
				$this->Total->setSort("");
				$this->HospID->setSort("");
				$this->BillType->setSort("");
				$this->AdjAdvance->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_bill_collection_reportlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_bill_collection_reportlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fview_bill_collection_reportlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

		// createddate
		if (!$this->isAddOrEdit() && $this->createddate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->createddate->AdvancedSearch->SearchValue != "" || $this->createddate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// UserName
		if (!$this->isAddOrEdit() && $this->UserName->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->UserName->AdvancedSearch->SearchValue != "" || $this->UserName->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CARD
		if (!$this->isAddOrEdit() && $this->CARD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CARD->AdvancedSearch->SearchValue != "" || $this->CARD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CASH
		if (!$this->isAddOrEdit() && $this->CASH->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CASH->AdvancedSearch->SearchValue != "" || $this->CASH->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NEFT
		if (!$this->isAddOrEdit() && $this->NEFT->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NEFT->AdvancedSearch->SearchValue != "" || $this->NEFT->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PAYTM
		if (!$this->isAddOrEdit() && $this->PAYTM->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PAYTM->AdvancedSearch->SearchValue != "" || $this->PAYTM->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CHEQUE
		if (!$this->isAddOrEdit() && $this->CHEQUE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CHEQUE->AdvancedSearch->SearchValue != "" || $this->CHEQUE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RTGS
		if (!$this->isAddOrEdit() && $this->RTGS->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RTGS->AdvancedSearch->SearchValue != "" || $this->RTGS->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NotSelected
		if (!$this->isAddOrEdit() && $this->NotSelected->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NotSelected->AdvancedSearch->SearchValue != "" || $this->NotSelected->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// REFUND
		if (!$this->isAddOrEdit() && $this->REFUND->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->REFUND->AdvancedSearch->SearchValue != "" || $this->REFUND->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CANCEL
		if (!$this->isAddOrEdit() && $this->CANCEL->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CANCEL->AdvancedSearch->SearchValue != "" || $this->CANCEL->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Total
		if (!$this->isAddOrEdit() && $this->Total->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Total->AdvancedSearch->SearchValue != "" || $this->Total->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospID
		if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BillType
		if (!$this->isAddOrEdit() && $this->BillType->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BillType->AdvancedSearch->SearchValue != "" || $this->BillType->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AdjAdvance
		if (!$this->isAddOrEdit() && $this->AdjAdvance->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AdjAdvance->AdvancedSearch->SearchValue != "" || $this->AdjAdvance->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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
		$this->createddate->setDbValue($row['createddate']);
		$this->UserName->setDbValue($row['UserName']);
		$this->CARD->setDbValue($row['CARD']);
		$this->CASH->setDbValue($row['CASH']);
		$this->NEFT->setDbValue($row['NEFT']);
		$this->PAYTM->setDbValue($row['PAYTM']);
		$this->CHEQUE->setDbValue($row['CHEQUE']);
		$this->RTGS->setDbValue($row['RTGS']);
		$this->NotSelected->setDbValue($row['NotSelected']);
		$this->REFUND->setDbValue($row['REFUND']);
		$this->CANCEL->setDbValue($row['CANCEL']);
		$this->Total->setDbValue($row['Total']);
		$this->HospID->setDbValue($row['HospID']);
		$this->BillType->setDbValue($row['BillType']);
		$this->AdjAdvance->setDbValue($row['AdjAdvance']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['createddate'] = NULL;
		$row['UserName'] = NULL;
		$row['CARD'] = NULL;
		$row['CASH'] = NULL;
		$row['NEFT'] = NULL;
		$row['PAYTM'] = NULL;
		$row['CHEQUE'] = NULL;
		$row['RTGS'] = NULL;
		$row['NotSelected'] = NULL;
		$row['REFUND'] = NULL;
		$row['CANCEL'] = NULL;
		$row['Total'] = NULL;
		$row['HospID'] = NULL;
		$row['BillType'] = NULL;
		$row['AdjAdvance'] = NULL;
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
		if ($this->CARD->FormValue == $this->CARD->CurrentValue && is_numeric(ConvertToFloatString($this->CARD->CurrentValue)))
			$this->CARD->CurrentValue = ConvertToFloatString($this->CARD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CASH->FormValue == $this->CASH->CurrentValue && is_numeric(ConvertToFloatString($this->CASH->CurrentValue)))
			$this->CASH->CurrentValue = ConvertToFloatString($this->CASH->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEFT->FormValue == $this->NEFT->CurrentValue && is_numeric(ConvertToFloatString($this->NEFT->CurrentValue)))
			$this->NEFT->CurrentValue = ConvertToFloatString($this->NEFT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue)))
			$this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CHEQUE->FormValue == $this->CHEQUE->CurrentValue && is_numeric(ConvertToFloatString($this->CHEQUE->CurrentValue)))
			$this->CHEQUE->CurrentValue = ConvertToFloatString($this->CHEQUE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue)))
			$this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NotSelected->FormValue == $this->NotSelected->CurrentValue && is_numeric(ConvertToFloatString($this->NotSelected->CurrentValue)))
			$this->NotSelected->CurrentValue = ConvertToFloatString($this->NotSelected->CurrentValue);

		// Convert decimal values if posted back
		if ($this->REFUND->FormValue == $this->REFUND->CurrentValue && is_numeric(ConvertToFloatString($this->REFUND->CurrentValue)))
			$this->REFUND->CurrentValue = ConvertToFloatString($this->REFUND->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CANCEL->FormValue == $this->CANCEL->CurrentValue && is_numeric(ConvertToFloatString($this->CANCEL->CurrentValue)))
			$this->CANCEL->CurrentValue = ConvertToFloatString($this->CANCEL->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Total->FormValue == $this->Total->CurrentValue && is_numeric(ConvertToFloatString($this->Total->CurrentValue)))
			$this->Total->CurrentValue = ConvertToFloatString($this->Total->CurrentValue);

		// Convert decimal values if posted back
		if ($this->AdjAdvance->FormValue == $this->AdjAdvance->CurrentValue && is_numeric(ConvertToFloatString($this->AdjAdvance->CurrentValue)))
			$this->AdjAdvance->CurrentValue = ConvertToFloatString($this->AdjAdvance->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// createddate
		// UserName
		// CARD
		// CASH
		// NEFT
		// PAYTM
		// CHEQUE
		// RTGS
		// NotSelected
		// REFUND
		// CANCEL
		// Total
		// HospID
		// BillType
		// AdjAdvance
		// Accumulate aggregate value

		if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
			if (is_numeric($this->CARD->CurrentValue))
				$this->CARD->Total += $this->CARD->CurrentValue; // Accumulate total
			if (is_numeric($this->CASH->CurrentValue))
				$this->CASH->Total += $this->CASH->CurrentValue; // Accumulate total
			if (is_numeric($this->NEFT->CurrentValue))
				$this->NEFT->Total += $this->NEFT->CurrentValue; // Accumulate total
			if (is_numeric($this->PAYTM->CurrentValue))
				$this->PAYTM->Total += $this->PAYTM->CurrentValue; // Accumulate total
			if (is_numeric($this->CHEQUE->CurrentValue))
				$this->CHEQUE->Total += $this->CHEQUE->CurrentValue; // Accumulate total
			if (is_numeric($this->RTGS->CurrentValue))
				$this->RTGS->Total += $this->RTGS->CurrentValue; // Accumulate total
			if (is_numeric($this->REFUND->CurrentValue))
				$this->REFUND->Total += $this->REFUND->CurrentValue; // Accumulate total
			if (is_numeric($this->Total->CurrentValue))
				$this->Total->Total += $this->Total->CurrentValue; // Accumulate total
		}
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// createddate
			$this->createddate->ViewValue = $this->createddate->CurrentValue;
			$this->createddate->ViewValue = FormatDateTime($this->createddate->ViewValue, 7);
			$this->createddate->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// CARD
			$this->CARD->ViewValue = $this->CARD->CurrentValue;
			$this->CARD->ViewValue = FormatNumber($this->CARD->ViewValue, 2, -2, -2, -2);
			$this->CARD->ViewCustomAttributes = "";

			// CASH
			$this->CASH->ViewValue = $this->CASH->CurrentValue;
			$this->CASH->ViewValue = FormatNumber($this->CASH->ViewValue, 2, -2, -2, -2);
			$this->CASH->ViewCustomAttributes = "";

			// NEFT
			$this->NEFT->ViewValue = $this->NEFT->CurrentValue;
			$this->NEFT->ViewValue = FormatNumber($this->NEFT->ViewValue, 2, -2, -2, -2);
			$this->NEFT->ViewCustomAttributes = "";

			// PAYTM
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";

			// CHEQUE
			$this->CHEQUE->ViewValue = $this->CHEQUE->CurrentValue;
			$this->CHEQUE->ViewValue = FormatNumber($this->CHEQUE->ViewValue, 2, -2, -2, -2);
			$this->CHEQUE->ViewCustomAttributes = "";

			// RTGS
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";

			// NotSelected
			$this->NotSelected->ViewValue = $this->NotSelected->CurrentValue;
			$this->NotSelected->ViewValue = FormatNumber($this->NotSelected->ViewValue, 2, -2, -2, -2);
			$this->NotSelected->ViewCustomAttributes = "";

			// REFUND
			$this->REFUND->ViewValue = $this->REFUND->CurrentValue;
			$this->REFUND->ViewValue = FormatNumber($this->REFUND->ViewValue, 2, -2, -2, -2);
			$this->REFUND->ViewCustomAttributes = "";

			// CANCEL
			$this->CANCEL->ViewValue = $this->CANCEL->CurrentValue;
			$this->CANCEL->ViewValue = FormatNumber($this->CANCEL->ViewValue, 2, -2, -2, -2);
			$this->CANCEL->ViewCustomAttributes = "";

			// Total
			$this->Total->ViewValue = $this->Total->CurrentValue;
			$this->Total->ViewValue = FormatNumber($this->Total->ViewValue, 2, -2, -2, -2);
			$this->Total->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// BillType
			$this->BillType->ViewValue = $this->BillType->CurrentValue;
			$this->BillType->ViewCustomAttributes = "";

			// AdjAdvance
			$this->AdjAdvance->ViewValue = $this->AdjAdvance->CurrentValue;
			$this->AdjAdvance->ViewValue = FormatNumber($this->AdjAdvance->ViewValue, 2, -2, -2, -2);
			$this->AdjAdvance->ViewCustomAttributes = "";

			// createddate
			$this->createddate->LinkCustomAttributes = "";
			$this->createddate->HrefValue = "";
			$this->createddate->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";

			// CARD
			$this->CARD->LinkCustomAttributes = "";
			$this->CARD->HrefValue = "";
			$this->CARD->TooltipValue = "";

			// CASH
			$this->CASH->LinkCustomAttributes = "";
			$this->CASH->HrefValue = "";
			$this->CASH->TooltipValue = "";

			// NEFT
			$this->NEFT->LinkCustomAttributes = "";
			$this->NEFT->HrefValue = "";
			$this->NEFT->TooltipValue = "";

			// PAYTM
			$this->PAYTM->LinkCustomAttributes = "";
			$this->PAYTM->HrefValue = "";
			$this->PAYTM->TooltipValue = "";

			// CHEQUE
			$this->CHEQUE->LinkCustomAttributes = "";
			$this->CHEQUE->HrefValue = "";
			$this->CHEQUE->TooltipValue = "";

			// RTGS
			$this->RTGS->LinkCustomAttributes = "";
			$this->RTGS->HrefValue = "";
			$this->RTGS->TooltipValue = "";

			// NotSelected
			$this->NotSelected->LinkCustomAttributes = "";
			$this->NotSelected->HrefValue = "";
			$this->NotSelected->TooltipValue = "";

			// REFUND
			$this->REFUND->LinkCustomAttributes = "";
			$this->REFUND->HrefValue = "";
			$this->REFUND->TooltipValue = "";

			// CANCEL
			$this->CANCEL->LinkCustomAttributes = "";
			$this->CANCEL->HrefValue = "";
			$this->CANCEL->TooltipValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";
			$this->Total->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";
			$this->BillType->TooltipValue = "";

			// AdjAdvance
			$this->AdjAdvance->LinkCustomAttributes = "";
			$this->AdjAdvance->HrefValue = "";
			$this->AdjAdvance->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// createddate
			$this->createddate->EditAttrs["class"] = "form-control";
			$this->createddate->EditCustomAttributes = "";
			$this->createddate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddate->AdvancedSearch->SearchValue, 7), 7));
			$this->createddate->PlaceHolder = RemoveHtml($this->createddate->caption());
			$this->createddate->EditAttrs["class"] = "form-control";
			$this->createddate->EditCustomAttributes = "";
			$this->createddate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddate->AdvancedSearch->SearchValue2, 7), 7));
			$this->createddate->PlaceHolder = RemoveHtml($this->createddate->caption());

			// UserName
			$this->UserName->EditAttrs["class"] = "form-control";
			$this->UserName->EditCustomAttributes = "";
			if (!$this->UserName->Raw)
				$this->UserName->AdvancedSearch->SearchValue = HtmlDecode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->EditValue = HtmlEncode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->PlaceHolder = RemoveHtml($this->UserName->caption());

			// CARD
			$this->CARD->EditAttrs["class"] = "form-control";
			$this->CARD->EditCustomAttributes = "";
			$this->CARD->EditValue = HtmlEncode($this->CARD->AdvancedSearch->SearchValue);
			$this->CARD->PlaceHolder = RemoveHtml($this->CARD->caption());

			// CASH
			$this->CASH->EditAttrs["class"] = "form-control";
			$this->CASH->EditCustomAttributes = "";
			$this->CASH->EditValue = HtmlEncode($this->CASH->AdvancedSearch->SearchValue);
			$this->CASH->PlaceHolder = RemoveHtml($this->CASH->caption());

			// NEFT
			$this->NEFT->EditAttrs["class"] = "form-control";
			$this->NEFT->EditCustomAttributes = "";
			$this->NEFT->EditValue = HtmlEncode($this->NEFT->AdvancedSearch->SearchValue);
			$this->NEFT->PlaceHolder = RemoveHtml($this->NEFT->caption());

			// PAYTM
			$this->PAYTM->EditAttrs["class"] = "form-control";
			$this->PAYTM->EditCustomAttributes = "";
			$this->PAYTM->EditValue = HtmlEncode($this->PAYTM->AdvancedSearch->SearchValue);
			$this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());

			// CHEQUE
			$this->CHEQUE->EditAttrs["class"] = "form-control";
			$this->CHEQUE->EditCustomAttributes = "";
			$this->CHEQUE->EditValue = HtmlEncode($this->CHEQUE->AdvancedSearch->SearchValue);
			$this->CHEQUE->PlaceHolder = RemoveHtml($this->CHEQUE->caption());

			// RTGS
			$this->RTGS->EditAttrs["class"] = "form-control";
			$this->RTGS->EditCustomAttributes = "";
			$this->RTGS->EditValue = HtmlEncode($this->RTGS->AdvancedSearch->SearchValue);
			$this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());

			// NotSelected
			$this->NotSelected->EditAttrs["class"] = "form-control";
			$this->NotSelected->EditCustomAttributes = "";
			$this->NotSelected->EditValue = HtmlEncode($this->NotSelected->AdvancedSearch->SearchValue);
			$this->NotSelected->PlaceHolder = RemoveHtml($this->NotSelected->caption());

			// REFUND
			$this->REFUND->EditAttrs["class"] = "form-control";
			$this->REFUND->EditCustomAttributes = "";
			$this->REFUND->EditValue = HtmlEncode($this->REFUND->AdvancedSearch->SearchValue);
			$this->REFUND->PlaceHolder = RemoveHtml($this->REFUND->caption());

			// CANCEL
			$this->CANCEL->EditAttrs["class"] = "form-control";
			$this->CANCEL->EditCustomAttributes = "";
			$this->CANCEL->EditValue = HtmlEncode($this->CANCEL->AdvancedSearch->SearchValue);
			$this->CANCEL->PlaceHolder = RemoveHtml($this->CANCEL->caption());

			// Total
			$this->Total->EditAttrs["class"] = "form-control";
			$this->Total->EditCustomAttributes = "";
			$this->Total->EditValue = HtmlEncode($this->Total->AdvancedSearch->SearchValue);
			$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// BillType
			$this->BillType->EditAttrs["class"] = "form-control";
			$this->BillType->EditCustomAttributes = "";
			if (!$this->BillType->Raw)
				$this->BillType->AdvancedSearch->SearchValue = HtmlDecode($this->BillType->AdvancedSearch->SearchValue);
			$this->BillType->EditValue = HtmlEncode($this->BillType->AdvancedSearch->SearchValue);
			$this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

			// AdjAdvance
			$this->AdjAdvance->EditAttrs["class"] = "form-control";
			$this->AdjAdvance->EditCustomAttributes = "";
			$this->AdjAdvance->EditValue = HtmlEncode($this->AdjAdvance->AdvancedSearch->SearchValue);
			$this->AdjAdvance->PlaceHolder = RemoveHtml($this->AdjAdvance->caption());
		} elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
			$this->CARD->Total = 0; // Initialize total
			$this->CASH->Total = 0; // Initialize total
			$this->NEFT->Total = 0; // Initialize total
			$this->PAYTM->Total = 0; // Initialize total
			$this->CHEQUE->Total = 0; // Initialize total
			$this->RTGS->Total = 0; // Initialize total
			$this->REFUND->Total = 0; // Initialize total
			$this->Total->Total = 0; // Initialize total
		} elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
			$this->CARD->CurrentValue = $this->CARD->Total;
			$this->CARD->ViewValue = $this->CARD->CurrentValue;
			$this->CARD->ViewValue = FormatNumber($this->CARD->ViewValue, 2, -2, -2, -2);
			$this->CARD->ViewCustomAttributes = "";
			$this->CARD->HrefValue = ""; // Clear href value
			$this->CASH->CurrentValue = $this->CASH->Total;
			$this->CASH->ViewValue = $this->CASH->CurrentValue;
			$this->CASH->ViewValue = FormatNumber($this->CASH->ViewValue, 2, -2, -2, -2);
			$this->CASH->ViewCustomAttributes = "";
			$this->CASH->HrefValue = ""; // Clear href value
			$this->NEFT->CurrentValue = $this->NEFT->Total;
			$this->NEFT->ViewValue = $this->NEFT->CurrentValue;
			$this->NEFT->ViewValue = FormatNumber($this->NEFT->ViewValue, 2, -2, -2, -2);
			$this->NEFT->ViewCustomAttributes = "";
			$this->NEFT->HrefValue = ""; // Clear href value
			$this->PAYTM->CurrentValue = $this->PAYTM->Total;
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";
			$this->PAYTM->HrefValue = ""; // Clear href value
			$this->CHEQUE->CurrentValue = $this->CHEQUE->Total;
			$this->CHEQUE->ViewValue = $this->CHEQUE->CurrentValue;
			$this->CHEQUE->ViewValue = FormatNumber($this->CHEQUE->ViewValue, 2, -2, -2, -2);
			$this->CHEQUE->ViewCustomAttributes = "";
			$this->CHEQUE->HrefValue = ""; // Clear href value
			$this->RTGS->CurrentValue = $this->RTGS->Total;
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";
			$this->RTGS->HrefValue = ""; // Clear href value
			$this->REFUND->CurrentValue = $this->REFUND->Total;
			$this->REFUND->ViewValue = $this->REFUND->CurrentValue;
			$this->REFUND->ViewValue = FormatNumber($this->REFUND->ViewValue, 2, -2, -2, -2);
			$this->REFUND->ViewCustomAttributes = "";
			$this->REFUND->HrefValue = ""; // Clear href value
			$this->Total->CurrentValue = $this->Total->Total;
			$this->Total->ViewValue = $this->Total->CurrentValue;
			$this->Total->ViewValue = FormatNumber($this->Total->ViewValue, 2, -2, -2, -2);
			$this->Total->ViewCustomAttributes = "";
			$this->Total->HrefValue = ""; // Clear href value
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if (!CheckEuroDate($this->createddate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddate->errorMessage());
		}
		if (!CheckEuroDate($this->createddate->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddate->errorMessage());
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

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->createddate->AdvancedSearch->load();
		$this->UserName->AdvancedSearch->load();
		$this->CARD->AdvancedSearch->load();
		$this->CASH->AdvancedSearch->load();
		$this->NEFT->AdvancedSearch->load();
		$this->PAYTM->AdvancedSearch->load();
		$this->CHEQUE->AdvancedSearch->load();
		$this->RTGS->AdvancedSearch->load();
		$this->NotSelected->AdvancedSearch->load();
		$this->REFUND->AdvancedSearch->load();
		$this->CANCEL->AdvancedSearch->load();
		$this->Total->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->BillType->AdvancedSearch->load();
		$this->AdjAdvance->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_bill_collection_reportlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_bill_collection_reportlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_bill_collection_reportlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_view_bill_collection_report" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_bill_collection_report\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_bill_collection_reportlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word", $this->ExportWordCustom);
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
		$item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_bill_collection_reportlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
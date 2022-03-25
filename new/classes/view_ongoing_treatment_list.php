<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_ongoing_treatment_list extends view_ongoing_treatment
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_ongoing_treatment';

	// Page object name
	public $PageObjName = "view_ongoing_treatment_list";

	// Grid form hidden field names
	public $FormName = "fview_ongoing_treatmentlist";
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

		// Table object (view_ongoing_treatment)
		if (!isset($GLOBALS["view_ongoing_treatment"]) || get_class($GLOBALS["view_ongoing_treatment"]) == PROJECT_NAMESPACE . "view_ongoing_treatment") {
			$GLOBALS["view_ongoing_treatment"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_ongoing_treatment"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "view_ongoing_treatmentadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_ongoing_treatmentdelete.php";
		$this->MultiUpdateUrl = "view_ongoing_treatmentupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ongoing_treatment');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_ongoing_treatmentlistsrch";

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
		global $view_ongoing_treatment;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($view_ongoing_treatment);
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
			$key .= @$ar['bid'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['bPatientID'] . Config("COMPOSITE_KEY_SEPARATOR");
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
			$this->bid->Visible = FALSE;
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
		$this->bid->setVisibility();
		$this->bPatientID->setVisibility();
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->bAge->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->description->Visible = FALSE;
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->Nationality->setVisibility();
		$this->profilePic->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->spouse_title->setVisibility();
		$this->spouse_first_name->setVisibility();
		$this->spouse_middle_name->setVisibility();
		$this->spouse_last_name->setVisibility();
		$this->spouse_gender->setVisibility();
		$this->spouse_dob->setVisibility();
		$this->spouse_Age->setVisibility();
		$this->spouse_blood_group->setVisibility();
		$this->spouse_mobile_no->setVisibility();
		$this->Maritalstatus->setVisibility();
		$this->Business->setVisibility();
		$this->Patient_Language->setVisibility();
		$this->Passport->setVisibility();
		$this->VisaNo->setVisibility();
		$this->ValidityOfVisa->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();
		$this->occupation->setVisibility();
		$this->spouse_occupation->setVisibility();
		$this->WhatsApp->setVisibility();
		$this->CouppleID->setVisibility();
		$this->MaleID->setVisibility();
		$this->FemaleID->setVisibility();
		$this->GroupID->setVisibility();
		$this->Relationship->setVisibility();
		$this->FacebookID->setVisibility();
		$this->id->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TreatmentStartDate->setVisibility();
		$this->TreatementStopDate->setVisibility();
		$this->TypePatient->setVisibility();
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
		$this->UseOfThe->setVisibility();
		$this->Ectopic->setVisibility();
		$this->Heterotopic->setVisibility();
		$this->TransferDFE->setVisibility();
		$this->Evolutive->setVisibility();
		$this->Number->setVisibility();
		$this->SequentialCult->setVisibility();
		$this->TineLapse->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->WifeCell->setVisibility();
		$this->HusbandCell->setVisibility();
		$this->CoupleID->setVisibility();
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
		if (count($arKeyFlds) >= 3) {
			$this->bid->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->bid->OldValue))
				return FALSE;
			$this->bPatientID->setOldValue($arKeyFlds[1]);
			$this->id->setOldValue($arKeyFlds[2]);
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_ongoing_treatmentlistsrch");
		$filterList = Concat($filterList, $this->bid->AdvancedSearch->toJson(), ","); // Field bid
		$filterList = Concat($filterList, $this->bPatientID->AdvancedSearch->toJson(), ","); // Field bPatientID
		$filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
		$filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
		$filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
		$filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
		$filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
		$filterList = Concat($filterList, $this->dob->AdvancedSearch->toJson(), ","); // Field dob
		$filterList = Concat($filterList, $this->bAge->AdvancedSearch->toJson(), ","); // Field bAge
		$filterList = Concat($filterList, $this->blood_group->AdvancedSearch->toJson(), ","); // Field blood_group
		$filterList = Concat($filterList, $this->mobile_no->AdvancedSearch->toJson(), ","); // Field mobile_no
		$filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
		$filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
		$filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
		$filterList = Concat($filterList, $this->Nationality->AdvancedSearch->toJson(), ","); // Field Nationality
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->ReferedByDr->AdvancedSearch->toJson(), ","); // Field ReferedByDr
		$filterList = Concat($filterList, $this->ReferClinicname->AdvancedSearch->toJson(), ","); // Field ReferClinicname
		$filterList = Concat($filterList, $this->ReferCity->AdvancedSearch->toJson(), ","); // Field ReferCity
		$filterList = Concat($filterList, $this->ReferMobileNo->AdvancedSearch->toJson(), ","); // Field ReferMobileNo
		$filterList = Concat($filterList, $this->ReferA4TreatingConsultant->AdvancedSearch->toJson(), ","); // Field ReferA4TreatingConsultant
		$filterList = Concat($filterList, $this->PurposreReferredfor->AdvancedSearch->toJson(), ","); // Field PurposreReferredfor
		$filterList = Concat($filterList, $this->spouse_title->AdvancedSearch->toJson(), ","); // Field spouse_title
		$filterList = Concat($filterList, $this->spouse_first_name->AdvancedSearch->toJson(), ","); // Field spouse_first_name
		$filterList = Concat($filterList, $this->spouse_middle_name->AdvancedSearch->toJson(), ","); // Field spouse_middle_name
		$filterList = Concat($filterList, $this->spouse_last_name->AdvancedSearch->toJson(), ","); // Field spouse_last_name
		$filterList = Concat($filterList, $this->spouse_gender->AdvancedSearch->toJson(), ","); // Field spouse_gender
		$filterList = Concat($filterList, $this->spouse_dob->AdvancedSearch->toJson(), ","); // Field spouse_dob
		$filterList = Concat($filterList, $this->spouse_Age->AdvancedSearch->toJson(), ","); // Field spouse_Age
		$filterList = Concat($filterList, $this->spouse_blood_group->AdvancedSearch->toJson(), ","); // Field spouse_blood_group
		$filterList = Concat($filterList, $this->spouse_mobile_no->AdvancedSearch->toJson(), ","); // Field spouse_mobile_no
		$filterList = Concat($filterList, $this->Maritalstatus->AdvancedSearch->toJson(), ","); // Field Maritalstatus
		$filterList = Concat($filterList, $this->Business->AdvancedSearch->toJson(), ","); // Field Business
		$filterList = Concat($filterList, $this->Patient_Language->AdvancedSearch->toJson(), ","); // Field Patient_Language
		$filterList = Concat($filterList, $this->Passport->AdvancedSearch->toJson(), ","); // Field Passport
		$filterList = Concat($filterList, $this->VisaNo->AdvancedSearch->toJson(), ","); // Field VisaNo
		$filterList = Concat($filterList, $this->ValidityOfVisa->AdvancedSearch->toJson(), ","); // Field ValidityOfVisa
		$filterList = Concat($filterList, $this->WhereDidYouHear->AdvancedSearch->toJson(), ","); // Field WhereDidYouHear
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->street->AdvancedSearch->toJson(), ","); // Field street
		$filterList = Concat($filterList, $this->town->AdvancedSearch->toJson(), ","); // Field town
		$filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
		$filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
		$filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
		$filterList = Concat($filterList, $this->PEmail->AdvancedSearch->toJson(), ","); // Field PEmail
		$filterList = Concat($filterList, $this->PEmergencyContact->AdvancedSearch->toJson(), ","); // Field PEmergencyContact
		$filterList = Concat($filterList, $this->occupation->AdvancedSearch->toJson(), ","); // Field occupation
		$filterList = Concat($filterList, $this->spouse_occupation->AdvancedSearch->toJson(), ","); // Field spouse_occupation
		$filterList = Concat($filterList, $this->WhatsApp->AdvancedSearch->toJson(), ","); // Field WhatsApp
		$filterList = Concat($filterList, $this->CouppleID->AdvancedSearch->toJson(), ","); // Field CouppleID
		$filterList = Concat($filterList, $this->MaleID->AdvancedSearch->toJson(), ","); // Field MaleID
		$filterList = Concat($filterList, $this->FemaleID->AdvancedSearch->toJson(), ","); // Field FemaleID
		$filterList = Concat($filterList, $this->GroupID->AdvancedSearch->toJson(), ","); // Field GroupID
		$filterList = Concat($filterList, $this->Relationship->AdvancedSearch->toJson(), ","); // Field Relationship
		$filterList = Concat($filterList, $this->FacebookID->AdvancedSearch->toJson(), ","); // Field FacebookID
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
		$filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
		$filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->TreatmentStartDate->AdvancedSearch->toJson(), ","); // Field TreatmentStartDate
		$filterList = Concat($filterList, $this->TreatementStopDate->AdvancedSearch->toJson(), ","); // Field TreatementStopDate
		$filterList = Concat($filterList, $this->TypePatient->AdvancedSearch->toJson(), ","); // Field TypePatient
		$filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
		$filterList = Concat($filterList, $this->TreatmentTec->AdvancedSearch->toJson(), ","); // Field TreatmentTec
		$filterList = Concat($filterList, $this->TypeOfCycle->AdvancedSearch->toJson(), ","); // Field TypeOfCycle
		$filterList = Concat($filterList, $this->SpermOrgin->AdvancedSearch->toJson(), ","); // Field SpermOrgin
		$filterList = Concat($filterList, $this->State->AdvancedSearch->toJson(), ","); // Field State
		$filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
		$filterList = Concat($filterList, $this->MACS->AdvancedSearch->toJson(), ","); // Field MACS
		$filterList = Concat($filterList, $this->Technique->AdvancedSearch->toJson(), ","); // Field Technique
		$filterList = Concat($filterList, $this->PgdPlanning->AdvancedSearch->toJson(), ","); // Field PgdPlanning
		$filterList = Concat($filterList, $this->IMSI->AdvancedSearch->toJson(), ","); // Field IMSI
		$filterList = Concat($filterList, $this->SequentialCulture->AdvancedSearch->toJson(), ","); // Field SequentialCulture
		$filterList = Concat($filterList, $this->TimeLapse->AdvancedSearch->toJson(), ","); // Field TimeLapse
		$filterList = Concat($filterList, $this->AH->AdvancedSearch->toJson(), ","); // Field AH
		$filterList = Concat($filterList, $this->Weight->AdvancedSearch->toJson(), ","); // Field Weight
		$filterList = Concat($filterList, $this->BMI->AdvancedSearch->toJson(), ","); // Field BMI
		$filterList = Concat($filterList, $this->MaleIndications->AdvancedSearch->toJson(), ","); // Field MaleIndications
		$filterList = Concat($filterList, $this->FemaleIndications->AdvancedSearch->toJson(), ","); // Field FemaleIndications
		$filterList = Concat($filterList, $this->UseOfThe->AdvancedSearch->toJson(), ","); // Field UseOfThe
		$filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
		$filterList = Concat($filterList, $this->Heterotopic->AdvancedSearch->toJson(), ","); // Field Heterotopic
		$filterList = Concat($filterList, $this->TransferDFE->AdvancedSearch->toJson(), ","); // Field TransferDFE
		$filterList = Concat($filterList, $this->Evolutive->AdvancedSearch->toJson(), ","); // Field Evolutive
		$filterList = Concat($filterList, $this->Number->AdvancedSearch->toJson(), ","); // Field Number
		$filterList = Concat($filterList, $this->SequentialCult->AdvancedSearch->toJson(), ","); // Field SequentialCult
		$filterList = Concat($filterList, $this->TineLapse->AdvancedSearch->toJson(), ","); // Field TineLapse
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
		$filterList = Concat($filterList, $this->WifeCell->AdvancedSearch->toJson(), ","); // Field WifeCell
		$filterList = Concat($filterList, $this->HusbandCell->AdvancedSearch->toJson(), ","); // Field HusbandCell
		$filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_ongoing_treatmentlistsrch", $filters);
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

		// Field bid
		$this->bid->AdvancedSearch->SearchValue = @$filter["x_bid"];
		$this->bid->AdvancedSearch->SearchOperator = @$filter["z_bid"];
		$this->bid->AdvancedSearch->SearchCondition = @$filter["v_bid"];
		$this->bid->AdvancedSearch->SearchValue2 = @$filter["y_bid"];
		$this->bid->AdvancedSearch->SearchOperator2 = @$filter["w_bid"];
		$this->bid->AdvancedSearch->save();

		// Field bPatientID
		$this->bPatientID->AdvancedSearch->SearchValue = @$filter["x_bPatientID"];
		$this->bPatientID->AdvancedSearch->SearchOperator = @$filter["z_bPatientID"];
		$this->bPatientID->AdvancedSearch->SearchCondition = @$filter["v_bPatientID"];
		$this->bPatientID->AdvancedSearch->SearchValue2 = @$filter["y_bPatientID"];
		$this->bPatientID->AdvancedSearch->SearchOperator2 = @$filter["w_bPatientID"];
		$this->bPatientID->AdvancedSearch->save();

		// Field title
		$this->title->AdvancedSearch->SearchValue = @$filter["x_title"];
		$this->title->AdvancedSearch->SearchOperator = @$filter["z_title"];
		$this->title->AdvancedSearch->SearchCondition = @$filter["v_title"];
		$this->title->AdvancedSearch->SearchValue2 = @$filter["y_title"];
		$this->title->AdvancedSearch->SearchOperator2 = @$filter["w_title"];
		$this->title->AdvancedSearch->save();

		// Field first_name
		$this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
		$this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
		$this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
		$this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
		$this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
		$this->first_name->AdvancedSearch->save();

		// Field middle_name
		$this->middle_name->AdvancedSearch->SearchValue = @$filter["x_middle_name"];
		$this->middle_name->AdvancedSearch->SearchOperator = @$filter["z_middle_name"];
		$this->middle_name->AdvancedSearch->SearchCondition = @$filter["v_middle_name"];
		$this->middle_name->AdvancedSearch->SearchValue2 = @$filter["y_middle_name"];
		$this->middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_middle_name"];
		$this->middle_name->AdvancedSearch->save();

		// Field last_name
		$this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
		$this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
		$this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
		$this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
		$this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
		$this->last_name->AdvancedSearch->save();

		// Field gender
		$this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
		$this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
		$this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
		$this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
		$this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
		$this->gender->AdvancedSearch->save();

		// Field dob
		$this->dob->AdvancedSearch->SearchValue = @$filter["x_dob"];
		$this->dob->AdvancedSearch->SearchOperator = @$filter["z_dob"];
		$this->dob->AdvancedSearch->SearchCondition = @$filter["v_dob"];
		$this->dob->AdvancedSearch->SearchValue2 = @$filter["y_dob"];
		$this->dob->AdvancedSearch->SearchOperator2 = @$filter["w_dob"];
		$this->dob->AdvancedSearch->save();

		// Field bAge
		$this->bAge->AdvancedSearch->SearchValue = @$filter["x_bAge"];
		$this->bAge->AdvancedSearch->SearchOperator = @$filter["z_bAge"];
		$this->bAge->AdvancedSearch->SearchCondition = @$filter["v_bAge"];
		$this->bAge->AdvancedSearch->SearchValue2 = @$filter["y_bAge"];
		$this->bAge->AdvancedSearch->SearchOperator2 = @$filter["w_bAge"];
		$this->bAge->AdvancedSearch->save();

		// Field blood_group
		$this->blood_group->AdvancedSearch->SearchValue = @$filter["x_blood_group"];
		$this->blood_group->AdvancedSearch->SearchOperator = @$filter["z_blood_group"];
		$this->blood_group->AdvancedSearch->SearchCondition = @$filter["v_blood_group"];
		$this->blood_group->AdvancedSearch->SearchValue2 = @$filter["y_blood_group"];
		$this->blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_blood_group"];
		$this->blood_group->AdvancedSearch->save();

		// Field mobile_no
		$this->mobile_no->AdvancedSearch->SearchValue = @$filter["x_mobile_no"];
		$this->mobile_no->AdvancedSearch->SearchOperator = @$filter["z_mobile_no"];
		$this->mobile_no->AdvancedSearch->SearchCondition = @$filter["v_mobile_no"];
		$this->mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_mobile_no"];
		$this->mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_no"];
		$this->mobile_no->AdvancedSearch->save();

		// Field description
		$this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
		$this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
		$this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
		$this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
		$this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
		$this->description->AdvancedSearch->save();

		// Field IdentificationMark
		$this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->save();

		// Field Religion
		$this->Religion->AdvancedSearch->SearchValue = @$filter["x_Religion"];
		$this->Religion->AdvancedSearch->SearchOperator = @$filter["z_Religion"];
		$this->Religion->AdvancedSearch->SearchCondition = @$filter["v_Religion"];
		$this->Religion->AdvancedSearch->SearchValue2 = @$filter["y_Religion"];
		$this->Religion->AdvancedSearch->SearchOperator2 = @$filter["w_Religion"];
		$this->Religion->AdvancedSearch->save();

		// Field Nationality
		$this->Nationality->AdvancedSearch->SearchValue = @$filter["x_Nationality"];
		$this->Nationality->AdvancedSearch->SearchOperator = @$filter["z_Nationality"];
		$this->Nationality->AdvancedSearch->SearchCondition = @$filter["v_Nationality"];
		$this->Nationality->AdvancedSearch->SearchValue2 = @$filter["y_Nationality"];
		$this->Nationality->AdvancedSearch->SearchOperator2 = @$filter["w_Nationality"];
		$this->Nationality->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field ReferedByDr
		$this->ReferedByDr->AdvancedSearch->SearchValue = @$filter["x_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchOperator = @$filter["z_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchCondition = @$filter["v_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchValue2 = @$filter["y_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedByDr"];
		$this->ReferedByDr->AdvancedSearch->save();

		// Field ReferClinicname
		$this->ReferClinicname->AdvancedSearch->SearchValue = @$filter["x_ReferClinicname"];
		$this->ReferClinicname->AdvancedSearch->SearchOperator = @$filter["z_ReferClinicname"];
		$this->ReferClinicname->AdvancedSearch->SearchCondition = @$filter["v_ReferClinicname"];
		$this->ReferClinicname->AdvancedSearch->SearchValue2 = @$filter["y_ReferClinicname"];
		$this->ReferClinicname->AdvancedSearch->SearchOperator2 = @$filter["w_ReferClinicname"];
		$this->ReferClinicname->AdvancedSearch->save();

		// Field ReferCity
		$this->ReferCity->AdvancedSearch->SearchValue = @$filter["x_ReferCity"];
		$this->ReferCity->AdvancedSearch->SearchOperator = @$filter["z_ReferCity"];
		$this->ReferCity->AdvancedSearch->SearchCondition = @$filter["v_ReferCity"];
		$this->ReferCity->AdvancedSearch->SearchValue2 = @$filter["y_ReferCity"];
		$this->ReferCity->AdvancedSearch->SearchOperator2 = @$filter["w_ReferCity"];
		$this->ReferCity->AdvancedSearch->save();

		// Field ReferMobileNo
		$this->ReferMobileNo->AdvancedSearch->SearchValue = @$filter["x_ReferMobileNo"];
		$this->ReferMobileNo->AdvancedSearch->SearchOperator = @$filter["z_ReferMobileNo"];
		$this->ReferMobileNo->AdvancedSearch->SearchCondition = @$filter["v_ReferMobileNo"];
		$this->ReferMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferMobileNo"];
		$this->ReferMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferMobileNo"];
		$this->ReferMobileNo->AdvancedSearch->save();

		// Field ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = @$filter["x_ReferA4TreatingConsultant"];
		$this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator = @$filter["z_ReferA4TreatingConsultant"];
		$this->ReferA4TreatingConsultant->AdvancedSearch->SearchCondition = @$filter["v_ReferA4TreatingConsultant"];
		$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 = @$filter["y_ReferA4TreatingConsultant"];
		$this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator2 = @$filter["w_ReferA4TreatingConsultant"];
		$this->ReferA4TreatingConsultant->AdvancedSearch->save();

		// Field PurposreReferredfor
		$this->PurposreReferredfor->AdvancedSearch->SearchValue = @$filter["x_PurposreReferredfor"];
		$this->PurposreReferredfor->AdvancedSearch->SearchOperator = @$filter["z_PurposreReferredfor"];
		$this->PurposreReferredfor->AdvancedSearch->SearchCondition = @$filter["v_PurposreReferredfor"];
		$this->PurposreReferredfor->AdvancedSearch->SearchValue2 = @$filter["y_PurposreReferredfor"];
		$this->PurposreReferredfor->AdvancedSearch->SearchOperator2 = @$filter["w_PurposreReferredfor"];
		$this->PurposreReferredfor->AdvancedSearch->save();

		// Field spouse_title
		$this->spouse_title->AdvancedSearch->SearchValue = @$filter["x_spouse_title"];
		$this->spouse_title->AdvancedSearch->SearchOperator = @$filter["z_spouse_title"];
		$this->spouse_title->AdvancedSearch->SearchCondition = @$filter["v_spouse_title"];
		$this->spouse_title->AdvancedSearch->SearchValue2 = @$filter["y_spouse_title"];
		$this->spouse_title->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_title"];
		$this->spouse_title->AdvancedSearch->save();

		// Field spouse_first_name
		$this->spouse_first_name->AdvancedSearch->SearchValue = @$filter["x_spouse_first_name"];
		$this->spouse_first_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_first_name"];
		$this->spouse_first_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_first_name"];
		$this->spouse_first_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_first_name"];
		$this->spouse_first_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_first_name"];
		$this->spouse_first_name->AdvancedSearch->save();

		// Field spouse_middle_name
		$this->spouse_middle_name->AdvancedSearch->SearchValue = @$filter["x_spouse_middle_name"];
		$this->spouse_middle_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_middle_name"];
		$this->spouse_middle_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_middle_name"];
		$this->spouse_middle_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_middle_name"];
		$this->spouse_middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_middle_name"];
		$this->spouse_middle_name->AdvancedSearch->save();

		// Field spouse_last_name
		$this->spouse_last_name->AdvancedSearch->SearchValue = @$filter["x_spouse_last_name"];
		$this->spouse_last_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_last_name"];
		$this->spouse_last_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_last_name"];
		$this->spouse_last_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_last_name"];
		$this->spouse_last_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_last_name"];
		$this->spouse_last_name->AdvancedSearch->save();

		// Field spouse_gender
		$this->spouse_gender->AdvancedSearch->SearchValue = @$filter["x_spouse_gender"];
		$this->spouse_gender->AdvancedSearch->SearchOperator = @$filter["z_spouse_gender"];
		$this->spouse_gender->AdvancedSearch->SearchCondition = @$filter["v_spouse_gender"];
		$this->spouse_gender->AdvancedSearch->SearchValue2 = @$filter["y_spouse_gender"];
		$this->spouse_gender->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_gender"];
		$this->spouse_gender->AdvancedSearch->save();

		// Field spouse_dob
		$this->spouse_dob->AdvancedSearch->SearchValue = @$filter["x_spouse_dob"];
		$this->spouse_dob->AdvancedSearch->SearchOperator = @$filter["z_spouse_dob"];
		$this->spouse_dob->AdvancedSearch->SearchCondition = @$filter["v_spouse_dob"];
		$this->spouse_dob->AdvancedSearch->SearchValue2 = @$filter["y_spouse_dob"];
		$this->spouse_dob->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_dob"];
		$this->spouse_dob->AdvancedSearch->save();

		// Field spouse_Age
		$this->spouse_Age->AdvancedSearch->SearchValue = @$filter["x_spouse_Age"];
		$this->spouse_Age->AdvancedSearch->SearchOperator = @$filter["z_spouse_Age"];
		$this->spouse_Age->AdvancedSearch->SearchCondition = @$filter["v_spouse_Age"];
		$this->spouse_Age->AdvancedSearch->SearchValue2 = @$filter["y_spouse_Age"];
		$this->spouse_Age->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_Age"];
		$this->spouse_Age->AdvancedSearch->save();

		// Field spouse_blood_group
		$this->spouse_blood_group->AdvancedSearch->SearchValue = @$filter["x_spouse_blood_group"];
		$this->spouse_blood_group->AdvancedSearch->SearchOperator = @$filter["z_spouse_blood_group"];
		$this->spouse_blood_group->AdvancedSearch->SearchCondition = @$filter["v_spouse_blood_group"];
		$this->spouse_blood_group->AdvancedSearch->SearchValue2 = @$filter["y_spouse_blood_group"];
		$this->spouse_blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_blood_group"];
		$this->spouse_blood_group->AdvancedSearch->save();

		// Field spouse_mobile_no
		$this->spouse_mobile_no->AdvancedSearch->SearchValue = @$filter["x_spouse_mobile_no"];
		$this->spouse_mobile_no->AdvancedSearch->SearchOperator = @$filter["z_spouse_mobile_no"];
		$this->spouse_mobile_no->AdvancedSearch->SearchCondition = @$filter["v_spouse_mobile_no"];
		$this->spouse_mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_spouse_mobile_no"];
		$this->spouse_mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_mobile_no"];
		$this->spouse_mobile_no->AdvancedSearch->save();

		// Field Maritalstatus
		$this->Maritalstatus->AdvancedSearch->SearchValue = @$filter["x_Maritalstatus"];
		$this->Maritalstatus->AdvancedSearch->SearchOperator = @$filter["z_Maritalstatus"];
		$this->Maritalstatus->AdvancedSearch->SearchCondition = @$filter["v_Maritalstatus"];
		$this->Maritalstatus->AdvancedSearch->SearchValue2 = @$filter["y_Maritalstatus"];
		$this->Maritalstatus->AdvancedSearch->SearchOperator2 = @$filter["w_Maritalstatus"];
		$this->Maritalstatus->AdvancedSearch->save();

		// Field Business
		$this->Business->AdvancedSearch->SearchValue = @$filter["x_Business"];
		$this->Business->AdvancedSearch->SearchOperator = @$filter["z_Business"];
		$this->Business->AdvancedSearch->SearchCondition = @$filter["v_Business"];
		$this->Business->AdvancedSearch->SearchValue2 = @$filter["y_Business"];
		$this->Business->AdvancedSearch->SearchOperator2 = @$filter["w_Business"];
		$this->Business->AdvancedSearch->save();

		// Field Patient_Language
		$this->Patient_Language->AdvancedSearch->SearchValue = @$filter["x_Patient_Language"];
		$this->Patient_Language->AdvancedSearch->SearchOperator = @$filter["z_Patient_Language"];
		$this->Patient_Language->AdvancedSearch->SearchCondition = @$filter["v_Patient_Language"];
		$this->Patient_Language->AdvancedSearch->SearchValue2 = @$filter["y_Patient_Language"];
		$this->Patient_Language->AdvancedSearch->SearchOperator2 = @$filter["w_Patient_Language"];
		$this->Patient_Language->AdvancedSearch->save();

		// Field Passport
		$this->Passport->AdvancedSearch->SearchValue = @$filter["x_Passport"];
		$this->Passport->AdvancedSearch->SearchOperator = @$filter["z_Passport"];
		$this->Passport->AdvancedSearch->SearchCondition = @$filter["v_Passport"];
		$this->Passport->AdvancedSearch->SearchValue2 = @$filter["y_Passport"];
		$this->Passport->AdvancedSearch->SearchOperator2 = @$filter["w_Passport"];
		$this->Passport->AdvancedSearch->save();

		// Field VisaNo
		$this->VisaNo->AdvancedSearch->SearchValue = @$filter["x_VisaNo"];
		$this->VisaNo->AdvancedSearch->SearchOperator = @$filter["z_VisaNo"];
		$this->VisaNo->AdvancedSearch->SearchCondition = @$filter["v_VisaNo"];
		$this->VisaNo->AdvancedSearch->SearchValue2 = @$filter["y_VisaNo"];
		$this->VisaNo->AdvancedSearch->SearchOperator2 = @$filter["w_VisaNo"];
		$this->VisaNo->AdvancedSearch->save();

		// Field ValidityOfVisa
		$this->ValidityOfVisa->AdvancedSearch->SearchValue = @$filter["x_ValidityOfVisa"];
		$this->ValidityOfVisa->AdvancedSearch->SearchOperator = @$filter["z_ValidityOfVisa"];
		$this->ValidityOfVisa->AdvancedSearch->SearchCondition = @$filter["v_ValidityOfVisa"];
		$this->ValidityOfVisa->AdvancedSearch->SearchValue2 = @$filter["y_ValidityOfVisa"];
		$this->ValidityOfVisa->AdvancedSearch->SearchOperator2 = @$filter["w_ValidityOfVisa"];
		$this->ValidityOfVisa->AdvancedSearch->save();

		// Field WhereDidYouHear
		$this->WhereDidYouHear->AdvancedSearch->SearchValue = @$filter["x_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchOperator = @$filter["z_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchCondition = @$filter["v_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchValue2 = @$filter["y_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->SearchOperator2 = @$filter["w_WhereDidYouHear"];
		$this->WhereDidYouHear->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field street
		$this->street->AdvancedSearch->SearchValue = @$filter["x_street"];
		$this->street->AdvancedSearch->SearchOperator = @$filter["z_street"];
		$this->street->AdvancedSearch->SearchCondition = @$filter["v_street"];
		$this->street->AdvancedSearch->SearchValue2 = @$filter["y_street"];
		$this->street->AdvancedSearch->SearchOperator2 = @$filter["w_street"];
		$this->street->AdvancedSearch->save();

		// Field town
		$this->town->AdvancedSearch->SearchValue = @$filter["x_town"];
		$this->town->AdvancedSearch->SearchOperator = @$filter["z_town"];
		$this->town->AdvancedSearch->SearchCondition = @$filter["v_town"];
		$this->town->AdvancedSearch->SearchValue2 = @$filter["y_town"];
		$this->town->AdvancedSearch->SearchOperator2 = @$filter["w_town"];
		$this->town->AdvancedSearch->save();

		// Field province
		$this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
		$this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
		$this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
		$this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
		$this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
		$this->province->AdvancedSearch->save();

		// Field country
		$this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
		$this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
		$this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
		$this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
		$this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
		$this->country->AdvancedSearch->save();

		// Field postal_code
		$this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
		$this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
		$this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
		$this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
		$this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
		$this->postal_code->AdvancedSearch->save();

		// Field PEmail
		$this->PEmail->AdvancedSearch->SearchValue = @$filter["x_PEmail"];
		$this->PEmail->AdvancedSearch->SearchOperator = @$filter["z_PEmail"];
		$this->PEmail->AdvancedSearch->SearchCondition = @$filter["v_PEmail"];
		$this->PEmail->AdvancedSearch->SearchValue2 = @$filter["y_PEmail"];
		$this->PEmail->AdvancedSearch->SearchOperator2 = @$filter["w_PEmail"];
		$this->PEmail->AdvancedSearch->save();

		// Field PEmergencyContact
		$this->PEmergencyContact->AdvancedSearch->SearchValue = @$filter["x_PEmergencyContact"];
		$this->PEmergencyContact->AdvancedSearch->SearchOperator = @$filter["z_PEmergencyContact"];
		$this->PEmergencyContact->AdvancedSearch->SearchCondition = @$filter["v_PEmergencyContact"];
		$this->PEmergencyContact->AdvancedSearch->SearchValue2 = @$filter["y_PEmergencyContact"];
		$this->PEmergencyContact->AdvancedSearch->SearchOperator2 = @$filter["w_PEmergencyContact"];
		$this->PEmergencyContact->AdvancedSearch->save();

		// Field occupation
		$this->occupation->AdvancedSearch->SearchValue = @$filter["x_occupation"];
		$this->occupation->AdvancedSearch->SearchOperator = @$filter["z_occupation"];
		$this->occupation->AdvancedSearch->SearchCondition = @$filter["v_occupation"];
		$this->occupation->AdvancedSearch->SearchValue2 = @$filter["y_occupation"];
		$this->occupation->AdvancedSearch->SearchOperator2 = @$filter["w_occupation"];
		$this->occupation->AdvancedSearch->save();

		// Field spouse_occupation
		$this->spouse_occupation->AdvancedSearch->SearchValue = @$filter["x_spouse_occupation"];
		$this->spouse_occupation->AdvancedSearch->SearchOperator = @$filter["z_spouse_occupation"];
		$this->spouse_occupation->AdvancedSearch->SearchCondition = @$filter["v_spouse_occupation"];
		$this->spouse_occupation->AdvancedSearch->SearchValue2 = @$filter["y_spouse_occupation"];
		$this->spouse_occupation->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_occupation"];
		$this->spouse_occupation->AdvancedSearch->save();

		// Field WhatsApp
		$this->WhatsApp->AdvancedSearch->SearchValue = @$filter["x_WhatsApp"];
		$this->WhatsApp->AdvancedSearch->SearchOperator = @$filter["z_WhatsApp"];
		$this->WhatsApp->AdvancedSearch->SearchCondition = @$filter["v_WhatsApp"];
		$this->WhatsApp->AdvancedSearch->SearchValue2 = @$filter["y_WhatsApp"];
		$this->WhatsApp->AdvancedSearch->SearchOperator2 = @$filter["w_WhatsApp"];
		$this->WhatsApp->AdvancedSearch->save();

		// Field CouppleID
		$this->CouppleID->AdvancedSearch->SearchValue = @$filter["x_CouppleID"];
		$this->CouppleID->AdvancedSearch->SearchOperator = @$filter["z_CouppleID"];
		$this->CouppleID->AdvancedSearch->SearchCondition = @$filter["v_CouppleID"];
		$this->CouppleID->AdvancedSearch->SearchValue2 = @$filter["y_CouppleID"];
		$this->CouppleID->AdvancedSearch->SearchOperator2 = @$filter["w_CouppleID"];
		$this->CouppleID->AdvancedSearch->save();

		// Field MaleID
		$this->MaleID->AdvancedSearch->SearchValue = @$filter["x_MaleID"];
		$this->MaleID->AdvancedSearch->SearchOperator = @$filter["z_MaleID"];
		$this->MaleID->AdvancedSearch->SearchCondition = @$filter["v_MaleID"];
		$this->MaleID->AdvancedSearch->SearchValue2 = @$filter["y_MaleID"];
		$this->MaleID->AdvancedSearch->SearchOperator2 = @$filter["w_MaleID"];
		$this->MaleID->AdvancedSearch->save();

		// Field FemaleID
		$this->FemaleID->AdvancedSearch->SearchValue = @$filter["x_FemaleID"];
		$this->FemaleID->AdvancedSearch->SearchOperator = @$filter["z_FemaleID"];
		$this->FemaleID->AdvancedSearch->SearchCondition = @$filter["v_FemaleID"];
		$this->FemaleID->AdvancedSearch->SearchValue2 = @$filter["y_FemaleID"];
		$this->FemaleID->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleID"];
		$this->FemaleID->AdvancedSearch->save();

		// Field GroupID
		$this->GroupID->AdvancedSearch->SearchValue = @$filter["x_GroupID"];
		$this->GroupID->AdvancedSearch->SearchOperator = @$filter["z_GroupID"];
		$this->GroupID->AdvancedSearch->SearchCondition = @$filter["v_GroupID"];
		$this->GroupID->AdvancedSearch->SearchValue2 = @$filter["y_GroupID"];
		$this->GroupID->AdvancedSearch->SearchOperator2 = @$filter["w_GroupID"];
		$this->GroupID->AdvancedSearch->save();

		// Field Relationship
		$this->Relationship->AdvancedSearch->SearchValue = @$filter["x_Relationship"];
		$this->Relationship->AdvancedSearch->SearchOperator = @$filter["z_Relationship"];
		$this->Relationship->AdvancedSearch->SearchCondition = @$filter["v_Relationship"];
		$this->Relationship->AdvancedSearch->SearchValue2 = @$filter["y_Relationship"];
		$this->Relationship->AdvancedSearch->SearchOperator2 = @$filter["w_Relationship"];
		$this->Relationship->AdvancedSearch->save();

		// Field FacebookID
		$this->FacebookID->AdvancedSearch->SearchValue = @$filter["x_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchOperator = @$filter["z_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchCondition = @$filter["v_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchValue2 = @$filter["y_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchOperator2 = @$filter["w_FacebookID"];
		$this->FacebookID->AdvancedSearch->save();

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field RIDNO
		$this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
		$this->RIDNO->AdvancedSearch->save();

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field treatment_status
		$this->treatment_status->AdvancedSearch->SearchValue = @$filter["x_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchOperator = @$filter["z_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchCondition = @$filter["v_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchValue2 = @$filter["y_treatment_status"];
		$this->treatment_status->AdvancedSearch->SearchOperator2 = @$filter["w_treatment_status"];
		$this->treatment_status->AdvancedSearch->save();

		// Field ARTCYCLE
		$this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->save();

		// Field RESULT
		$this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
		$this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
		$this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
		$this->RESULT->AdvancedSearch->save();

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

		// Field TreatmentStartDate
		$this->TreatmentStartDate->AdvancedSearch->SearchValue = @$filter["x_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator = @$filter["z_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchCondition = @$filter["v_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentStartDate"];
		$this->TreatmentStartDate->AdvancedSearch->save();

		// Field TreatementStopDate
		$this->TreatementStopDate->AdvancedSearch->SearchValue = @$filter["x_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchOperator = @$filter["z_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchCondition = @$filter["v_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatementStopDate"];
		$this->TreatementStopDate->AdvancedSearch->save();

		// Field TypePatient
		$this->TypePatient->AdvancedSearch->SearchValue = @$filter["x_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchOperator = @$filter["z_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchCondition = @$filter["v_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchValue2 = @$filter["y_TypePatient"];
		$this->TypePatient->AdvancedSearch->SearchOperator2 = @$filter["w_TypePatient"];
		$this->TypePatient->AdvancedSearch->save();

		// Field Treatment
		$this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
		$this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
		$this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
		$this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
		$this->Treatment->AdvancedSearch->save();

		// Field TreatmentTec
		$this->TreatmentTec->AdvancedSearch->SearchValue = @$filter["x_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchOperator = @$filter["z_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchCondition = @$filter["v_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentTec"];
		$this->TreatmentTec->AdvancedSearch->save();

		// Field TypeOfCycle
		$this->TypeOfCycle->AdvancedSearch->SearchValue = @$filter["x_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchOperator = @$filter["z_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchCondition = @$filter["v_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfCycle"];
		$this->TypeOfCycle->AdvancedSearch->save();

		// Field SpermOrgin
		$this->SpermOrgin->AdvancedSearch->SearchValue = @$filter["x_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchOperator = @$filter["z_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchCondition = @$filter["v_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchValue2 = @$filter["y_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_SpermOrgin"];
		$this->SpermOrgin->AdvancedSearch->save();

		// Field State
		$this->State->AdvancedSearch->SearchValue = @$filter["x_State"];
		$this->State->AdvancedSearch->SearchOperator = @$filter["z_State"];
		$this->State->AdvancedSearch->SearchCondition = @$filter["v_State"];
		$this->State->AdvancedSearch->SearchValue2 = @$filter["y_State"];
		$this->State->AdvancedSearch->SearchOperator2 = @$filter["w_State"];
		$this->State->AdvancedSearch->save();

		// Field Origin
		$this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
		$this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
		$this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
		$this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
		$this->Origin->AdvancedSearch->save();

		// Field MACS
		$this->MACS->AdvancedSearch->SearchValue = @$filter["x_MACS"];
		$this->MACS->AdvancedSearch->SearchOperator = @$filter["z_MACS"];
		$this->MACS->AdvancedSearch->SearchCondition = @$filter["v_MACS"];
		$this->MACS->AdvancedSearch->SearchValue2 = @$filter["y_MACS"];
		$this->MACS->AdvancedSearch->SearchOperator2 = @$filter["w_MACS"];
		$this->MACS->AdvancedSearch->save();

		// Field Technique
		$this->Technique->AdvancedSearch->SearchValue = @$filter["x_Technique"];
		$this->Technique->AdvancedSearch->SearchOperator = @$filter["z_Technique"];
		$this->Technique->AdvancedSearch->SearchCondition = @$filter["v_Technique"];
		$this->Technique->AdvancedSearch->SearchValue2 = @$filter["y_Technique"];
		$this->Technique->AdvancedSearch->SearchOperator2 = @$filter["w_Technique"];
		$this->Technique->AdvancedSearch->save();

		// Field PgdPlanning
		$this->PgdPlanning->AdvancedSearch->SearchValue = @$filter["x_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchOperator = @$filter["z_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchCondition = @$filter["v_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchValue2 = @$filter["y_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->SearchOperator2 = @$filter["w_PgdPlanning"];
		$this->PgdPlanning->AdvancedSearch->save();

		// Field IMSI
		$this->IMSI->AdvancedSearch->SearchValue = @$filter["x_IMSI"];
		$this->IMSI->AdvancedSearch->SearchOperator = @$filter["z_IMSI"];
		$this->IMSI->AdvancedSearch->SearchCondition = @$filter["v_IMSI"];
		$this->IMSI->AdvancedSearch->SearchValue2 = @$filter["y_IMSI"];
		$this->IMSI->AdvancedSearch->SearchOperator2 = @$filter["w_IMSI"];
		$this->IMSI->AdvancedSearch->save();

		// Field SequentialCulture
		$this->SequentialCulture->AdvancedSearch->SearchValue = @$filter["x_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchOperator = @$filter["z_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchCondition = @$filter["v_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCulture"];
		$this->SequentialCulture->AdvancedSearch->save();

		// Field TimeLapse
		$this->TimeLapse->AdvancedSearch->SearchValue = @$filter["x_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchOperator = @$filter["z_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchCondition = @$filter["v_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchValue2 = @$filter["y_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TimeLapse"];
		$this->TimeLapse->AdvancedSearch->save();

		// Field AH
		$this->AH->AdvancedSearch->SearchValue = @$filter["x_AH"];
		$this->AH->AdvancedSearch->SearchOperator = @$filter["z_AH"];
		$this->AH->AdvancedSearch->SearchCondition = @$filter["v_AH"];
		$this->AH->AdvancedSearch->SearchValue2 = @$filter["y_AH"];
		$this->AH->AdvancedSearch->SearchOperator2 = @$filter["w_AH"];
		$this->AH->AdvancedSearch->save();

		// Field Weight
		$this->Weight->AdvancedSearch->SearchValue = @$filter["x_Weight"];
		$this->Weight->AdvancedSearch->SearchOperator = @$filter["z_Weight"];
		$this->Weight->AdvancedSearch->SearchCondition = @$filter["v_Weight"];
		$this->Weight->AdvancedSearch->SearchValue2 = @$filter["y_Weight"];
		$this->Weight->AdvancedSearch->SearchOperator2 = @$filter["w_Weight"];
		$this->Weight->AdvancedSearch->save();

		// Field BMI
		$this->BMI->AdvancedSearch->SearchValue = @$filter["x_BMI"];
		$this->BMI->AdvancedSearch->SearchOperator = @$filter["z_BMI"];
		$this->BMI->AdvancedSearch->SearchCondition = @$filter["v_BMI"];
		$this->BMI->AdvancedSearch->SearchValue2 = @$filter["y_BMI"];
		$this->BMI->AdvancedSearch->SearchOperator2 = @$filter["w_BMI"];
		$this->BMI->AdvancedSearch->save();

		// Field MaleIndications
		$this->MaleIndications->AdvancedSearch->SearchValue = @$filter["x_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchOperator = @$filter["z_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchCondition = @$filter["v_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_MaleIndications"];
		$this->MaleIndications->AdvancedSearch->save();

		// Field FemaleIndications
		$this->FemaleIndications->AdvancedSearch->SearchValue = @$filter["x_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchOperator = @$filter["z_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchCondition = @$filter["v_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleIndications"];
		$this->FemaleIndications->AdvancedSearch->save();

		// Field UseOfThe
		$this->UseOfThe->AdvancedSearch->SearchValue = @$filter["x_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchOperator = @$filter["z_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchCondition = @$filter["v_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchValue2 = @$filter["y_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->SearchOperator2 = @$filter["w_UseOfThe"];
		$this->UseOfThe->AdvancedSearch->save();

		// Field Ectopic
		$this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
		$this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
		$this->Ectopic->AdvancedSearch->save();

		// Field Heterotopic
		$this->Heterotopic->AdvancedSearch->SearchValue = @$filter["x_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchOperator = @$filter["z_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchCondition = @$filter["v_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchValue2 = @$filter["y_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->SearchOperator2 = @$filter["w_Heterotopic"];
		$this->Heterotopic->AdvancedSearch->save();

		// Field TransferDFE
		$this->TransferDFE->AdvancedSearch->SearchValue = @$filter["x_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchOperator = @$filter["z_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchCondition = @$filter["v_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchValue2 = @$filter["y_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->SearchOperator2 = @$filter["w_TransferDFE"];
		$this->TransferDFE->AdvancedSearch->save();

		// Field Evolutive
		$this->Evolutive->AdvancedSearch->SearchValue = @$filter["x_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchOperator = @$filter["z_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchCondition = @$filter["v_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchValue2 = @$filter["y_Evolutive"];
		$this->Evolutive->AdvancedSearch->SearchOperator2 = @$filter["w_Evolutive"];
		$this->Evolutive->AdvancedSearch->save();

		// Field Number
		$this->Number->AdvancedSearch->SearchValue = @$filter["x_Number"];
		$this->Number->AdvancedSearch->SearchOperator = @$filter["z_Number"];
		$this->Number->AdvancedSearch->SearchCondition = @$filter["v_Number"];
		$this->Number->AdvancedSearch->SearchValue2 = @$filter["y_Number"];
		$this->Number->AdvancedSearch->SearchOperator2 = @$filter["w_Number"];
		$this->Number->AdvancedSearch->save();

		// Field SequentialCult
		$this->SequentialCult->AdvancedSearch->SearchValue = @$filter["x_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchOperator = @$filter["z_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchCondition = @$filter["v_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCult"];
		$this->SequentialCult->AdvancedSearch->save();

		// Field TineLapse
		$this->TineLapse->AdvancedSearch->SearchValue = @$filter["x_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchOperator = @$filter["z_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchCondition = @$filter["v_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchValue2 = @$filter["y_TineLapse"];
		$this->TineLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TineLapse"];
		$this->TineLapse->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field PartnerName
		$this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
		$this->PartnerName->AdvancedSearch->save();

		// Field PartnerID
		$this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
		$this->PartnerID->AdvancedSearch->save();

		// Field WifeCell
		$this->WifeCell->AdvancedSearch->SearchValue = @$filter["x_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator = @$filter["z_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchCondition = @$filter["v_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchValue2 = @$filter["y_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator2 = @$filter["w_WifeCell"];
		$this->WifeCell->AdvancedSearch->save();

		// Field HusbandCell
		$this->HusbandCell->AdvancedSearch->SearchValue = @$filter["x_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator = @$filter["z_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchCondition = @$filter["v_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchValue2 = @$filter["y_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->save();

		// Field CoupleID
		$this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
		$this->CoupleID->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->bPatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->bAge, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->blood_group, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mobile_no, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nationality, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferedByDr, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferClinicname, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferCity, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferMobileNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferA4TreatingConsultant, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PurposreReferredfor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_title, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_first_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_middle_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_last_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_blood_group, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_mobile_no, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Maritalstatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Business, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Patient_Language, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Passport, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VisaNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ValidityOfVisa, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WhereDidYouHear, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->street, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->town, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->province, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PEmail, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PEmergencyContact, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->occupation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->spouse_occupation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WhatsApp, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Relationship, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FacebookID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->treatment_status, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypePatient, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TreatmentTec, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeOfCycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SpermOrgin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->State, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MACS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Technique, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PgdPlanning, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IMSI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SequentialCulture, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TimeLapse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Weight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FemaleIndications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UseOfThe, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Heterotopic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TransferDFE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Evolutive, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Number, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SequentialCult, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TineLapse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeCell, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandCell, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
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
			$this->updateSort($this->bid); // bid
			$this->updateSort($this->bPatientID); // bPatientID
			$this->updateSort($this->title); // title
			$this->updateSort($this->first_name); // first_name
			$this->updateSort($this->middle_name); // middle_name
			$this->updateSort($this->last_name); // last_name
			$this->updateSort($this->gender); // gender
			$this->updateSort($this->dob); // dob
			$this->updateSort($this->bAge); // bAge
			$this->updateSort($this->blood_group); // blood_group
			$this->updateSort($this->mobile_no); // mobile_no
			$this->updateSort($this->IdentificationMark); // IdentificationMark
			$this->updateSort($this->Religion); // Religion
			$this->updateSort($this->Nationality); // Nationality
			$this->updateSort($this->profilePic); // profilePic
			$this->updateSort($this->ReferedByDr); // ReferedByDr
			$this->updateSort($this->ReferClinicname); // ReferClinicname
			$this->updateSort($this->ReferCity); // ReferCity
			$this->updateSort($this->ReferMobileNo); // ReferMobileNo
			$this->updateSort($this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
			$this->updateSort($this->PurposreReferredfor); // PurposreReferredfor
			$this->updateSort($this->spouse_title); // spouse_title
			$this->updateSort($this->spouse_first_name); // spouse_first_name
			$this->updateSort($this->spouse_middle_name); // spouse_middle_name
			$this->updateSort($this->spouse_last_name); // spouse_last_name
			$this->updateSort($this->spouse_gender); // spouse_gender
			$this->updateSort($this->spouse_dob); // spouse_dob
			$this->updateSort($this->spouse_Age); // spouse_Age
			$this->updateSort($this->spouse_blood_group); // spouse_blood_group
			$this->updateSort($this->spouse_mobile_no); // spouse_mobile_no
			$this->updateSort($this->Maritalstatus); // Maritalstatus
			$this->updateSort($this->Business); // Business
			$this->updateSort($this->Patient_Language); // Patient_Language
			$this->updateSort($this->Passport); // Passport
			$this->updateSort($this->VisaNo); // VisaNo
			$this->updateSort($this->ValidityOfVisa); // ValidityOfVisa
			$this->updateSort($this->WhereDidYouHear); // WhereDidYouHear
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->street); // street
			$this->updateSort($this->town); // town
			$this->updateSort($this->province); // province
			$this->updateSort($this->country); // country
			$this->updateSort($this->postal_code); // postal_code
			$this->updateSort($this->PEmail); // PEmail
			$this->updateSort($this->PEmergencyContact); // PEmergencyContact
			$this->updateSort($this->occupation); // occupation
			$this->updateSort($this->spouse_occupation); // spouse_occupation
			$this->updateSort($this->WhatsApp); // WhatsApp
			$this->updateSort($this->CouppleID); // CouppleID
			$this->updateSort($this->MaleID); // MaleID
			$this->updateSort($this->FemaleID); // FemaleID
			$this->updateSort($this->GroupID); // GroupID
			$this->updateSort($this->Relationship); // Relationship
			$this->updateSort($this->FacebookID); // FacebookID
			$this->updateSort($this->id); // id
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->Name); // Name
			$this->updateSort($this->treatment_status); // treatment_status
			$this->updateSort($this->ARTCYCLE); // ARTCYCLE
			$this->updateSort($this->RESULT); // RESULT
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->TreatmentStartDate); // TreatmentStartDate
			$this->updateSort($this->TreatementStopDate); // TreatementStopDate
			$this->updateSort($this->TypePatient); // TypePatient
			$this->updateSort($this->Treatment); // Treatment
			$this->updateSort($this->TreatmentTec); // TreatmentTec
			$this->updateSort($this->TypeOfCycle); // TypeOfCycle
			$this->updateSort($this->SpermOrgin); // SpermOrgin
			$this->updateSort($this->State); // State
			$this->updateSort($this->Origin); // Origin
			$this->updateSort($this->MACS); // MACS
			$this->updateSort($this->Technique); // Technique
			$this->updateSort($this->PgdPlanning); // PgdPlanning
			$this->updateSort($this->IMSI); // IMSI
			$this->updateSort($this->SequentialCulture); // SequentialCulture
			$this->updateSort($this->TimeLapse); // TimeLapse
			$this->updateSort($this->AH); // AH
			$this->updateSort($this->Weight); // Weight
			$this->updateSort($this->BMI); // BMI
			$this->updateSort($this->MaleIndications); // MaleIndications
			$this->updateSort($this->FemaleIndications); // FemaleIndications
			$this->updateSort($this->UseOfThe); // UseOfThe
			$this->updateSort($this->Ectopic); // Ectopic
			$this->updateSort($this->Heterotopic); // Heterotopic
			$this->updateSort($this->TransferDFE); // TransferDFE
			$this->updateSort($this->Evolutive); // Evolutive
			$this->updateSort($this->Number); // Number
			$this->updateSort($this->SequentialCult); // SequentialCult
			$this->updateSort($this->TineLapse); // TineLapse
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->PartnerName); // PartnerName
			$this->updateSort($this->PartnerID); // PartnerID
			$this->updateSort($this->WifeCell); // WifeCell
			$this->updateSort($this->HusbandCell); // HusbandCell
			$this->updateSort($this->CoupleID); // CoupleID
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
				$this->bid->setSort("");
				$this->bPatientID->setSort("");
				$this->title->setSort("");
				$this->first_name->setSort("");
				$this->middle_name->setSort("");
				$this->last_name->setSort("");
				$this->gender->setSort("");
				$this->dob->setSort("");
				$this->bAge->setSort("");
				$this->blood_group->setSort("");
				$this->mobile_no->setSort("");
				$this->IdentificationMark->setSort("");
				$this->Religion->setSort("");
				$this->Nationality->setSort("");
				$this->profilePic->setSort("");
				$this->ReferedByDr->setSort("");
				$this->ReferClinicname->setSort("");
				$this->ReferCity->setSort("");
				$this->ReferMobileNo->setSort("");
				$this->ReferA4TreatingConsultant->setSort("");
				$this->PurposreReferredfor->setSort("");
				$this->spouse_title->setSort("");
				$this->spouse_first_name->setSort("");
				$this->spouse_middle_name->setSort("");
				$this->spouse_last_name->setSort("");
				$this->spouse_gender->setSort("");
				$this->spouse_dob->setSort("");
				$this->spouse_Age->setSort("");
				$this->spouse_blood_group->setSort("");
				$this->spouse_mobile_no->setSort("");
				$this->Maritalstatus->setSort("");
				$this->Business->setSort("");
				$this->Patient_Language->setSort("");
				$this->Passport->setSort("");
				$this->VisaNo->setSort("");
				$this->ValidityOfVisa->setSort("");
				$this->WhereDidYouHear->setSort("");
				$this->HospID->setSort("");
				$this->street->setSort("");
				$this->town->setSort("");
				$this->province->setSort("");
				$this->country->setSort("");
				$this->postal_code->setSort("");
				$this->PEmail->setSort("");
				$this->PEmergencyContact->setSort("");
				$this->occupation->setSort("");
				$this->spouse_occupation->setSort("");
				$this->WhatsApp->setSort("");
				$this->CouppleID->setSort("");
				$this->MaleID->setSort("");
				$this->FemaleID->setSort("");
				$this->GroupID->setSort("");
				$this->Relationship->setSort("");
				$this->FacebookID->setSort("");
				$this->id->setSort("");
				$this->RIDNO->setSort("");
				$this->Name->setSort("");
				$this->treatment_status->setSort("");
				$this->ARTCYCLE->setSort("");
				$this->RESULT->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->TreatmentStartDate->setSort("");
				$this->TreatementStopDate->setSort("");
				$this->TypePatient->setSort("");
				$this->Treatment->setSort("");
				$this->TreatmentTec->setSort("");
				$this->TypeOfCycle->setSort("");
				$this->SpermOrgin->setSort("");
				$this->State->setSort("");
				$this->Origin->setSort("");
				$this->MACS->setSort("");
				$this->Technique->setSort("");
				$this->PgdPlanning->setSort("");
				$this->IMSI->setSort("");
				$this->SequentialCulture->setSort("");
				$this->TimeLapse->setSort("");
				$this->AH->setSort("");
				$this->Weight->setSort("");
				$this->BMI->setSort("");
				$this->MaleIndications->setSort("");
				$this->FemaleIndications->setSort("");
				$this->UseOfThe->setSort("");
				$this->Ectopic->setSort("");
				$this->Heterotopic->setSort("");
				$this->TransferDFE->setSort("");
				$this->Evolutive->setSort("");
				$this->Number->setSort("");
				$this->SequentialCult->setSort("");
				$this->TineLapse->setSort("");
				$this->PatientName->setSort("");
				$this->PatientID->setSort("");
				$this->PartnerName->setSort("");
				$this->PartnerID->setSort("");
				$this->WifeCell->setSort("");
				$this->HusbandCell->setSort("");
				$this->CoupleID->setSort("");
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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->bid->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->bPatientID->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_ongoing_treatmentlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_ongoing_treatmentlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fview_ongoing_treatmentlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$this->bid->setDbValue($row['bid']);
		$this->bPatientID->setDbValue($row['bPatientID']);
		$this->title->setDbValue($row['title']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->bAge->setDbValue($row['bAge']);
		$this->blood_group->setDbValue($row['blood_group']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->description->setDbValue($row['description']);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Nationality->setDbValue($row['Nationality']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->spouse_title->setDbValue($row['spouse_title']);
		$this->spouse_first_name->setDbValue($row['spouse_first_name']);
		$this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
		$this->spouse_last_name->setDbValue($row['spouse_last_name']);
		$this->spouse_gender->setDbValue($row['spouse_gender']);
		$this->spouse_dob->setDbValue($row['spouse_dob']);
		$this->spouse_Age->setDbValue($row['spouse_Age']);
		$this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
		$this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
		$this->Maritalstatus->setDbValue($row['Maritalstatus']);
		$this->Business->setDbValue($row['Business']);
		$this->Patient_Language->setDbValue($row['Patient_Language']);
		$this->Passport->setDbValue($row['Passport']);
		$this->VisaNo->setDbValue($row['VisaNo']);
		$this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->street->setDbValue($row['street']);
		$this->town->setDbValue($row['town']);
		$this->province->setDbValue($row['province']);
		$this->country->setDbValue($row['country']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->PEmail->setDbValue($row['PEmail']);
		$this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
		$this->occupation->setDbValue($row['occupation']);
		$this->spouse_occupation->setDbValue($row['spouse_occupation']);
		$this->WhatsApp->setDbValue($row['WhatsApp']);
		$this->CouppleID->setDbValue($row['CouppleID']);
		$this->MaleID->setDbValue($row['MaleID']);
		$this->FemaleID->setDbValue($row['FemaleID']);
		$this->GroupID->setDbValue($row['GroupID']);
		$this->Relationship->setDbValue($row['Relationship']);
		$this->FacebookID->setDbValue($row['FacebookID']);
		$this->id->setDbValue($row['id']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
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
		$row = [];
		$row['bid'] = NULL;
		$row['bPatientID'] = NULL;
		$row['title'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['dob'] = NULL;
		$row['bAge'] = NULL;
		$row['blood_group'] = NULL;
		$row['mobile_no'] = NULL;
		$row['description'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['Religion'] = NULL;
		$row['Nationality'] = NULL;
		$row['profilePic'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['ReferClinicname'] = NULL;
		$row['ReferCity'] = NULL;
		$row['ReferMobileNo'] = NULL;
		$row['ReferA4TreatingConsultant'] = NULL;
		$row['PurposreReferredfor'] = NULL;
		$row['spouse_title'] = NULL;
		$row['spouse_first_name'] = NULL;
		$row['spouse_middle_name'] = NULL;
		$row['spouse_last_name'] = NULL;
		$row['spouse_gender'] = NULL;
		$row['spouse_dob'] = NULL;
		$row['spouse_Age'] = NULL;
		$row['spouse_blood_group'] = NULL;
		$row['spouse_mobile_no'] = NULL;
		$row['Maritalstatus'] = NULL;
		$row['Business'] = NULL;
		$row['Patient_Language'] = NULL;
		$row['Passport'] = NULL;
		$row['VisaNo'] = NULL;
		$row['ValidityOfVisa'] = NULL;
		$row['WhereDidYouHear'] = NULL;
		$row['HospID'] = NULL;
		$row['street'] = NULL;
		$row['town'] = NULL;
		$row['province'] = NULL;
		$row['country'] = NULL;
		$row['postal_code'] = NULL;
		$row['PEmail'] = NULL;
		$row['PEmergencyContact'] = NULL;
		$row['occupation'] = NULL;
		$row['spouse_occupation'] = NULL;
		$row['WhatsApp'] = NULL;
		$row['CouppleID'] = NULL;
		$row['MaleID'] = NULL;
		$row['FemaleID'] = NULL;
		$row['GroupID'] = NULL;
		$row['Relationship'] = NULL;
		$row['FacebookID'] = NULL;
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TreatmentStartDate'] = NULL;
		$row['TreatementStopDate'] = NULL;
		$row['TypePatient'] = NULL;
		$row['Treatment'] = NULL;
		$row['TreatmentTec'] = NULL;
		$row['TypeOfCycle'] = NULL;
		$row['SpermOrgin'] = NULL;
		$row['State'] = NULL;
		$row['Origin'] = NULL;
		$row['MACS'] = NULL;
		$row['Technique'] = NULL;
		$row['PgdPlanning'] = NULL;
		$row['IMSI'] = NULL;
		$row['SequentialCulture'] = NULL;
		$row['TimeLapse'] = NULL;
		$row['AH'] = NULL;
		$row['Weight'] = NULL;
		$row['BMI'] = NULL;
		$row['MaleIndications'] = NULL;
		$row['FemaleIndications'] = NULL;
		$row['UseOfThe'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Heterotopic'] = NULL;
		$row['TransferDFE'] = NULL;
		$row['Evolutive'] = NULL;
		$row['Number'] = NULL;
		$row['SequentialCult'] = NULL;
		$row['TineLapse'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['CoupleID'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("bid")) != "")
			$this->bid->OldValue = $this->getKey("bid"); // bid
		else
			$validKey = FALSE;
		if (strval($this->getKey("bPatientID")) != "")
			$this->bPatientID->OldValue = $this->getKey("bPatientID"); // bPatientID
		else
			$validKey = FALSE;
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
		// bid
		// bPatientID
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// bAge
		// blood_group
		// mobile_no
		// description
		// IdentificationMark
		// Religion
		// Nationality
		// profilePic
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// spouse_title
		// spouse_first_name
		// spouse_middle_name
		// spouse_last_name
		// spouse_gender
		// spouse_dob
		// spouse_Age
		// spouse_blood_group
		// spouse_mobile_no
		// Maritalstatus
		// Business
		// Patient_Language
		// Passport
		// VisaNo
		// ValidityOfVisa
		// WhereDidYouHear
		// HospID
		// street
		// town
		// province
		// country
		// postal_code
		// PEmail
		// PEmergencyContact
		// occupation
		// spouse_occupation
		// WhatsApp
		// CouppleID
		// MaleID
		// FemaleID
		// GroupID
		// Relationship
		// FacebookID
		// id
		// RIDNO
		// Name
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TreatmentStartDate
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

			// bid
			$this->bid->ViewValue = $this->bid->CurrentValue;
			$this->bid->ViewCustomAttributes = "";

			// bPatientID
			$this->bPatientID->ViewValue = $this->bPatientID->CurrentValue;
			$this->bPatientID->ViewCustomAttributes = "";

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
			$this->title->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
			$this->dob->ViewCustomAttributes = "";

			// bAge
			$this->bAge->ViewValue = $this->bAge->CurrentValue;
			$this->bAge->ViewCustomAttributes = "";

			// blood_group
			$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
			$this->blood_group->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Nationality
			$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
			$this->Nationality->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// ReferedByDr
			$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// spouse_title
			$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
			$this->spouse_title->ViewCustomAttributes = "";

			// spouse_first_name
			$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
			$this->spouse_first_name->ViewCustomAttributes = "";

			// spouse_middle_name
			$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
			$this->spouse_middle_name->ViewCustomAttributes = "";

			// spouse_last_name
			$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
			$this->spouse_last_name->ViewCustomAttributes = "";

			// spouse_gender
			$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
			$this->spouse_gender->ViewCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
			$this->spouse_dob->ViewCustomAttributes = "";

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->ViewCustomAttributes = "";

			// spouse_blood_group
			$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
			$this->spouse_blood_group->ViewCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->ViewCustomAttributes = "";

			// Maritalstatus
			$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
			$this->Maritalstatus->ViewCustomAttributes = "";

			// Business
			$this->Business->ViewValue = $this->Business->CurrentValue;
			$this->Business->ViewCustomAttributes = "";

			// Patient_Language
			$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
			$this->Patient_Language->ViewCustomAttributes = "";

			// Passport
			$this->Passport->ViewValue = $this->Passport->CurrentValue;
			$this->Passport->ViewCustomAttributes = "";

			// VisaNo
			$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
			$this->VisaNo->ViewCustomAttributes = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
			$this->ValidityOfVisa->ViewCustomAttributes = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->ViewCustomAttributes = "";

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->ViewCustomAttributes = "";

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->ViewCustomAttributes = "";

			// occupation
			$this->occupation->ViewValue = $this->occupation->CurrentValue;
			$this->occupation->ViewCustomAttributes = "";

			// spouse_occupation
			$this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
			$this->spouse_occupation->ViewCustomAttributes = "";

			// WhatsApp
			$this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
			$this->WhatsApp->ViewCustomAttributes = "";

			// CouppleID
			$this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
			$this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
			$this->CouppleID->ViewCustomAttributes = "";

			// MaleID
			$this->MaleID->ViewValue = $this->MaleID->CurrentValue;
			$this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
			$this->MaleID->ViewCustomAttributes = "";

			// FemaleID
			$this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
			$this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
			$this->FemaleID->ViewCustomAttributes = "";

			// GroupID
			$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
			$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
			$this->GroupID->ViewCustomAttributes = "";

			// Relationship
			$this->Relationship->ViewValue = $this->Relationship->CurrentValue;
			$this->Relationship->ViewCustomAttributes = "";

			// FacebookID
			$this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
			$this->FacebookID->ViewCustomAttributes = "";

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

			// treatment_status
			$this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
			$this->RESULT->ViewCustomAttributes = "";

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

			// TreatmentStartDate
			$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
			$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
			$this->TreatmentStartDate->ViewCustomAttributes = "";

			// TreatementStopDate
			$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
			$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
			$this->TreatementStopDate->ViewCustomAttributes = "";

			// TypePatient
			$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
			$this->TypePatient->ViewCustomAttributes = "";

			// Treatment
			$this->Treatment->ViewValue = $this->Treatment->CurrentValue;
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			$this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			$this->MACS->ViewValue = $this->MACS->CurrentValue;
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			$this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
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
			$this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			$this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
			$this->FemaleIndications->ViewCustomAttributes = "";

			// UseOfThe
			$this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
			$this->UseOfThe->ViewCustomAttributes = "";

			// Ectopic
			$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
			$this->Ectopic->ViewCustomAttributes = "";

			// Heterotopic
			$this->Heterotopic->ViewValue = $this->Heterotopic->CurrentValue;
			$this->Heterotopic->ViewCustomAttributes = "";

			// TransferDFE
			$this->TransferDFE->ViewValue = $this->TransferDFE->CurrentValue;
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
			$this->TineLapse->ViewValue = $this->TineLapse->CurrentValue;
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

			// bid
			$this->bid->LinkCustomAttributes = "";
			$this->bid->HrefValue = "";
			$this->bid->TooltipValue = "";

			// bPatientID
			$this->bPatientID->LinkCustomAttributes = "";
			$this->bPatientID->HrefValue = "";
			$this->bPatientID->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";
			$this->middle_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";
			$this->dob->TooltipValue = "";

			// bAge
			$this->bAge->LinkCustomAttributes = "";
			$this->bAge->HrefValue = "";
			$this->bAge->TooltipValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";
			$this->blood_group->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";
			$this->Nationality->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";
			$this->spouse_title->TooltipValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";
			$this->spouse_first_name->TooltipValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";
			$this->spouse_middle_name->TooltipValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";
			$this->spouse_last_name->TooltipValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";
			$this->spouse_gender->TooltipValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";
			$this->spouse_dob->TooltipValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";
			$this->spouse_Age->TooltipValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";
			$this->spouse_blood_group->TooltipValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";
			$this->spouse_mobile_no->TooltipValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";
			$this->Maritalstatus->TooltipValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";
			$this->Business->TooltipValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";
			$this->Patient_Language->TooltipValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";
			$this->Passport->TooltipValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";
			$this->VisaNo->TooltipValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";
			$this->ValidityOfVisa->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";
			$this->street->TooltipValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";
			$this->town->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";
			$this->PEmail->TooltipValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";
			$this->PEmergencyContact->TooltipValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";
			$this->occupation->TooltipValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";
			$this->spouse_occupation->TooltipValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";
			$this->WhatsApp->TooltipValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";
			$this->CouppleID->TooltipValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";
			$this->MaleID->TooltipValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";
			$this->FemaleID->TooltipValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";
			$this->GroupID->TooltipValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";
			$this->Relationship->TooltipValue = "";

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";
			$this->FacebookID->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

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

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";
			$this->TreatmentStartDate->TooltipValue = "";

			// TreatementStopDate
			$this->TreatementStopDate->LinkCustomAttributes = "";
			$this->TreatementStopDate->HrefValue = "";
			$this->TreatementStopDate->TooltipValue = "";

			// TypePatient
			$this->TypePatient->LinkCustomAttributes = "";
			$this->TypePatient->HrefValue = "";
			$this->TypePatient->TooltipValue = "";

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

			// UseOfThe
			$this->UseOfThe->LinkCustomAttributes = "";
			$this->UseOfThe->HrefValue = "";
			$this->UseOfThe->TooltipValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";
			$this->Ectopic->TooltipValue = "";

			// Heterotopic
			$this->Heterotopic->LinkCustomAttributes = "";
			$this->Heterotopic->HrefValue = "";
			$this->Heterotopic->TooltipValue = "";

			// TransferDFE
			$this->TransferDFE->LinkCustomAttributes = "";
			$this->TransferDFE->HrefValue = "";
			$this->TransferDFE->TooltipValue = "";

			// Evolutive
			$this->Evolutive->LinkCustomAttributes = "";
			$this->Evolutive->HrefValue = "";
			$this->Evolutive->TooltipValue = "";

			// Number
			$this->Number->LinkCustomAttributes = "";
			$this->Number->HrefValue = "";
			$this->Number->TooltipValue = "";

			// SequentialCult
			$this->SequentialCult->LinkCustomAttributes = "";
			$this->SequentialCult->HrefValue = "";
			$this->SequentialCult->TooltipValue = "";

			// TineLapse
			$this->TineLapse->LinkCustomAttributes = "";
			$this->TineLapse->HrefValue = "";
			$this->TineLapse->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";
			$this->WifeCell->TooltipValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";
			$this->HusbandCell->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";
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
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_ongoing_treatmentlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_ongoing_treatmentlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_ongoing_treatmentlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_view_ongoing_treatment" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_ongoing_treatment\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_ongoing_treatmentlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_ongoing_treatmentlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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